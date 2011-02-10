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
class BpMediaItemService implements MediaItemService {
  
  /**
   * Returns mediaItems from an album
   *
   * @param userId The id of the person whose album to fetch
   * @param groupId The group Id
   * @param albumId The id of the album to fetch
   * @param mediaItemIds MediaItemIds to fetch. Fetch all mediaItems if this is empty
   * @param collectionOptions options for sorting, pagination etc
   * @param fields fields to fetch
   * @param token The gadget token
   * @return a list of media items
   */
  public function getMediaItems($userId, $groupId, $albumId, $mediaItemIds, $collectionOptions, $fields, $token) {
  	
  }

  /**
   * Creates a media item in a specified album. The albumId is taken from the
   * mediaItem object. id of the media item object should not be set. A file may
   * be uploaded with the content type 'multipart/form-data', 'image/*', 'video/*'
   * or 'audio/*'. The uploaded file is moved to a temporary location. The file info
   * is stored in the 'file' param. After this method is invoked the file is deleted.
   *
   * @param userId id of the user for whom a media item is to be created
   * @param groupId group id
   * @param mediaItem specifies album-id and media item fields
   * @param An associative array that describes the uploaded file. The array is empty if
   *     there is no uploaded file. It has 'name', 'tmp_name', 'type' and 'size' fields.
   *     i.e. [tmp_name] => /tmp/upload//tmp/php/php1h4j1o, [type] => image/png,
   *     [size] => 123, [name] = user_file_name.png.  
   *     The file is a regular file and should not be moved by the move_uploaded_file method.
   * @param token security token to authorize this request
   * @return the created media item
   */
  public function createMediaItem($userId, $groupId, $mediaItem, $file, $token) {
  	
  }

  /**
   * Updates a media item in an album. Album id and media item id is taken in
   * from albumMediaItem.
   *
   * @param userId id of user whose media item is to be updated
   * @param groupId group id
   * @param mediaItem specifies album id, media-item id, fields to update
   * @param token security token
   * @return updated album media item
   */
  public function updateMediaItem($userId, $groupId, $mediaItem, $token) {
  	
  }

  /**
   * Deletes an album media item.
   *
   * @param id id of user whose media item is to be deleted
   * @param groupId group id
   * @param albumId id of album to update
   * @param mediaItemIds ids of media item to update
   * @param token security token to authorize this update request
   * @return void on successful completion
   */
  public function deleteMediaItems($userId, $groupId, $albumId, $mediaItemIds, $token) {
  	
  }  
}