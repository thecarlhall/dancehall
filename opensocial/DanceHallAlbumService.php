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
class BpAlbumService implements AlbumService {

  /**
   * Returns a list of Albums that correspond to the passed in User/GroupId
   *
   * @param userId ID of the user to indicate the requestor
   * @param groupId Albums for all of the people in the specific group.
   * @param albumIds album Ids to fetch. Fetch all albums if this is empty
   * @param collectionOptions options for sorting, pagination etc
   * @param fields fields to fetch
   * @param token The gadget token
   * @return a list of albums
   */
  public function getAlbums($userId, $groupId, $albumIds, $collectionOptions, $fields, $token) {
  	
  }

  /**
   * Creates an album for a user. An Album ID is created and provided back in
   * the returned album.
   *
   * @param userId id of the user for whom an album is to be created
   * @param groupId group id for this request
   * @param album album with fields set for a create request. id field is ignored.
   * @param token security token to authorize this request
   * @return the created album with album id set in it
   */
  public function createAlbum($userId, $groupId, $album, $token) {
  	
  }

  /**
   * Updates an album for the fields set in album.
   *
   * @param userId id of user whose album is to be updated
   * @param groupId group id for this request
   * @param album album with id and fields to be updated.
   * @param token security token to authorize this request
   * @return updated album
   */
  public function updateAlbum($userId, $groupId, $album, $token) {
  	
  }

  /**
   * Deletes an album.
   *
   * @param userId id of owner of album
   * @param groupId group id of owner of album
   * @param albumId id of album to be deleted
   * @param token security token to authorize this request
   * @return void on completion
   */
  public function deleteAlbum($userId, $groupId, $albumId, $token) {
  	
  }

}