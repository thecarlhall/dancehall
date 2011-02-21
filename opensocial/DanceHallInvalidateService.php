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
class BpInvalidationService implements InvalidateService {
  /**
   * Invalidate a set of cached resources that are part of the application specification itself.
   * This includes gadget specs, manifests and message bundles
   * @param uris of content to invalidate
   * @param token identifying the calling application
   */
  function invalidateApplicationResources(Array $uris, SecurityToken $token) {
  	
  }

  /**
   * Invalidate all cached resources where the specified user ids were used as either the
   * owner or viewer id when a signed or OAuth request was made for the content by the application
   * identified in the security token.
   * @param opensocialIds Set of user ids to invalidate authenticated/signed content for
   * @param token identifying the calling application
   */
  function invalidateUserResources(Array $opensocialIds, SecurityToken $token) {
  	
  }

  /**
   * Is the specified request still valid. If the request is signed or authenticated
   * has its content been invalidated by a call to invalidateUserResource subsequent to the
   * response being cached.
   */
  function isValid(RemoteContentRequest $request) {
  	
  }

  /**
   * Mark the request prior to caching it so that subsequent calls to isValid can detect
   * if it has been invalidated.
   */
  function markResponse(RemoteContentRequest $request) {
  	
  }
}