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
class DanceHallPersonService implements PersonService {

  /**
   * Returns a Person object for person with $id or false on not found
   *
   * @param container specific id $id
   * @param fields set of contact fields to return, as array('fieldName' => 1)
   * @param security token $token
   */
  function getPerson($userId, $groupId, $fields, SecurityToken $token);

  /**
   * Returns a list of people that correspond to the passed in person ids.
   * @param ids The ids of the people to fetch.
   * @param options Request options for filtering/sorting/paging
   * @param fields set of contact fields to return, as array('fieldName' => 1)
   * @return a list of people.
   */
  function getPeople($userId, $groupId, CollectionOptions $options, $fields, SecurityToken $token);
}
