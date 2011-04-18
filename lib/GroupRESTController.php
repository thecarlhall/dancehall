<?php
class GroupRESTController extends WPAPIRESTController {
	protected function __construct() {}
	
	protected function getGroups() {
		return groups_get_groups();
	}
	
	protected function getGroup($groupId = 0) {
		return groups_get_group(array('group_id' => $groupId));
	}
}
