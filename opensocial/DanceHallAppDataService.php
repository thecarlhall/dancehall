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
class BpActivityService implements AppDataService {

  /**
   * Fetch data for a list of ids.
   * @param UserId The user id to perform the action for
   * @param GroupId optional grouping ID
   * @param fields The list of fields to fetch
   * @param token The SecurityToken for this request
   * @return ResponseItem a response item with the error code set if
   *     there was a problem
   */
  function getPersonData($userId, GroupId $groupId, $appId, $fields, SecurityToken $token) {
  	
  }

  function deletePersonData($userId, GroupId $groupId, $appId, $fields, SecurityToken $token) {
  	
  }

  /**
   * Updates the data key for the given person with the new value.
   *
   * @param id The person the data is for.
   * @param key The key of the data.
   * @param value The new value of the data.
   * @param token The SecurityToken for this request
   * @return ResponseItem a response item with the error code set if
   *     there was a problem
   */
  function updatePersonData(UserId $userId, GroupId $groupId, $appId, $fields, $values, SecurityToken $token) {
  	
  }
}
