<?php
/*
Plugin Name: DanceHall
Plugin URI: http://github.com/thecarlhall/dancehall
Description: OpenSocial service implementations for BuddyPress.
Version: 0.1
Author: Carl Hall
Author URI: http://about.me/thecarlhall
License: GPL2

Copyright 2010 Hallway Technologies (http://hallwaytech.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
require_once WP_PLUGIN_DIR.'/dancehall/wp-restful.php';

function dh_fields() {
	return array(
		'Activities' => array(),
		'Albums' => array(),
		'People' => array(
			'personId' => 'Person ID',
			'name' => 'Person Name')
	);
}

function dh_activity_pluralization() {
	return array('Activity' => 'Activities');
}

function dh_person_pluralization() {
	return array('Person' => 'People');
}

wpr_add_plugin('dh_fields');

wpr_add_pluralization('dh_activity_pluralization');
wpr_add_pluralization('dh_person_pluralization');