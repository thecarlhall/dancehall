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
class BpActivityService implements ActivityService {
  /**
   * Returns a list of activities that correspond to the passed in person ids.
   */
  public function getActivities($userIds, $groupId, $appId, $sortBy, $filterBy, $filterOp, $filterValue, $startIndex, $count, $fields, $activityIds, $token) {
  	
  }

  public function getActivity($userId, $groupId, $appdId, $fields, $activityId, SecurityToken $token) {
  	
  }

  public function deleteActivities($userId, $groupId, $appId, $activityIds, SecurityToken $token) {
  	
  }

  /**
   * Creates the passed in activity for the given user. Once createActivity is
   * called, getActivities will be able to return the Activity.
   */
  public function createActivity($userId, $groupId, $appId, $fields, $activity, SecurityToken $token) {
  	
  }
}
