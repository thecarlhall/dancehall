<?php
/*
 * Copyright 2010 Hallway Technologies (http://hallwaytech.com)
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *  
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *  
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */
class DancePartyPersonService implements PersonService {

  private $allPeople = null;

  /**
   * Returns a Person object for person with $id or false on not found
   *
   * @param container specific id $id
   * @param fields set of contact fields to return, as array('fieldName' => 1)
   * @param security token $token
   */
  public function getPerson($userId, $groupId, $fields, SecurityToken $token) {
    if (! is_object($groupId)) {
      throw new SocialSpiException("Not Implemented", ResponseError::$NOT_IMPLEMENTED);
    }
    $person = $this->getPeople($userId, $groupId, new CollectionOptions(), $fields, $token);
    if (is_array($person->getEntry())) {
      $person = $person->getEntry();
      if (is_array($person) && count($person) == 1) {
        return array_pop($person);
      }
    }
    throw new SocialSpiException("Person not found", ResponseError::$BAD_REQUEST);
  }

  /**
   * Returns a list of people that correspond to the passed in person ids.
   * @param ids The ids of the people to fetch.
   * @param options Request options for filtering/sorting/paging
   * @param fields set of contact fields to return, as array('fieldName' => 1)
   * @return a list of people.
   */
  public function getPeople($userId, $groupId, CollectionOptions $options, $fields, SecurityToken $token) {
    $sortOrder = $options->getSortOrder();
    $filter = $options->getFilterBy();
    $filterOp = $options->getFilterOperation();
    $filterValue = $options->getFilterValue();
    $first = $options->getStartIndex();
    $max = $options->getCount();
    $networkDistance = $options->getNetworkDistance();
    $ids = $this->getIdSet($userId, $groupId, $token);
    $allPeople = $this->getAllPeople();
    if ($filter == "@friends" && $filterOp == "contains" && isset($filterValue)) {
      if ($options->getFilterValue() == '@viewer') {
        $filterValue = $token->getViewerId();
      } elseif ($options->getFilterValue() == '@owner') {
        $filterValue = $token->getOwnerId();
      }
      $ids = $this->getMutualFriends($ids, $filterValue);
    }
    if (! $token->isAnonymous() && $filter == "hasApp") {
      $appId = $token->getAppId();
      $peopleWithApp = $this->getPeopleWithApp($appId);
    }
    $people = array();
    foreach ($ids as $id) {
      if ($filter == "hasApp" && ! in_array($id, $peopleWithApp)) {
        continue;
      }
      $person = null;
      if (is_array($allPeople) && isset($allPeople[$id])) {
        $person = $allPeople[$id];
        if (! $token->isAnonymous() && $id == $token->getViewerId()) {
          $person['isViewer'] = true;
        }
        if (! $token->isAnonymous() && $id == $token->getOwnerId()) {
          $person['isOwner'] = true;
        }   

        $people[] = $person;
      }
    }
    if ($sortOrder == 'name') {
      usort($people, array($this, 'comparator'));
    }

    try {
      $people = $this->filterResults($people, $options);
    } catch (Exception $e) {
      $people['filtered'] = 'false';
    }
    
   if ($fields) { 
        $people = self::adjustFields($people, $fields);
    }

    //TODO: The samplecontainer doesn't support any filters yet. We should fix this.
    $totalSize = count($people);
    $collection = new RestfulCollection($people, $options->getStartIndex(), $totalSize);
    $collection->setItemsPerPage($options->getCount());
    return $collection;
  }

  private function getAllPeople() {
    $db = $this->getDb();
    $peopleTable = $db[self::$PEOPLE_TABLE];
    foreach ($peopleTable as $people) {
      $this->allPeople[$people['id']] = $people;
    }
    $db[self::$PEOPLE_TABLE] = $this->allPeople;
    return $this->allPeople;
  }

  private function getMutualFriends($ids, $friendId) {
    $db = $this->getDb();
    $friendsTable = $db[self::$FRIEND_LINK_TABLE];
    if (is_array($friendsTable) && count($friendsTable) && isset($friendsTable[$friendId])) {
      $friendIds = $friendsTable[$friendId];
      $mutualFriends = array_intersect($ids, $friendIds);
    }
    return $mutualFriends;
  }

  private function getPeopleWithApp($appId) {
    $peopleWithApp = array();
    $db = $this->getDb();
    $userApplicationsTable = $db[self::$USER_APPLICATIONS_TABLE];
    foreach ($userApplicationsTable as $key => $value) {
      if (in_array($appId, $userApplicationsTable[$key])) {
        $peopleWithApp[] = $key;
      }
    }
    return $peopleWithApp;
  }
}
