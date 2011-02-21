<?php
if(in_array("wp-restful/wp-restful.php", get_option('active_plugins'))) {
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
require_once WP_PLUGIN_DIR.'/wp-restful/wp-restful.php';

function dancehall_install() {
	// wpr_activate_plugin
	$wpr_plugins = get_option("wpr_plugins");
	if(!is_array($wpr_plugins))
		$wpr_plugins = array();
	// Add our plugin as active
	$wpr_plugins['dancehall'] = "dancehall";
	update_option("wpr_plugins", $wpr_plugins);
}
function dancehall_uninstall() {
	// wpr_deactivate_plugin
	$wpr_plugins = get_option("wpr_plugins");
	if(!is_array($wpr_plugins))
		$wpr_plugins = array();
	// Remove this plugin as active
	$wpr_active_plugins = array_diff($wpr_plugins, array("dancehall"));
	update_option("wpr_plugins", $wpr_active_plugins);
}

function dancehall_fields() {
	return array(
		'Activities' => array(
			'id' => 'Activity ID',
			'user_id' => 'User ID',
			'component' => 'Component where activity happened',
			'type' => 'Type of activity',
			'action' => 'Action performed',
			'content' => 'Content of activity (if any)',
			'primary_link' => 'Primary link to user',
			'item_id' => 'Item ID',
			'secondary_item_id' => 'Secondary Item ID',
			'date_recorded' => 'Date of activity',
			'hide_sitewide' => 'Whether to hide sitewide',
			'mptt_left' => 'mptt left',
			'mptt_right' => 'mptt right',
			'user_email' => "User's email",
			'user_nicename' => "User's 'nice' name",
			'user_login' => "User's login",
			'display_name' => "User's display name",
			'user_fullname' => "User's full name",
			'total' => 'Total activities returned'
		),
		'Albums' => array(),
		'AppData' => array(),
		'Groups' => array(
			'id' => 'Group ID',
			'creator_id' => "Group's Creator ID",
			'name' => 'Name of the Group',
			'slug' => "Group's Slug",
			'description' => 'Description of the group',
			'status' => 'Status of the group',
			'enable_forum' => 'Whether the forums are enabled',
			'date_created' => 'Date group was created',
			'admins' => 'Admins of the group',
			'total' => 'Total groups returned'),
		'MediaItems' => array(),
		'Messages' => array()
	);
}

function dancehall_pluralization() {
	return array('activity' => 'activities', 'appdata' => 'appdata');
}

wpr_add_plugin('dancehall_fields');

wpr_add_pluralization('dancehall_pluralization');

register_activation_hook(WP_PLUGIN_DIR.'/dancehall/dancehall.php', 'dancehall_install');
register_deactivation_hook(WP_PLUGIN_DIR.'/dancehall/dancehall.php', 'dancehall_uninstall');
}
