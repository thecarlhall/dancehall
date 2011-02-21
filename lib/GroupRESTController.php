<?php
class GroupRESTController extends WPAPIRESTController {
	protected function __construct() {}
	
	protected function getGroups() {
		// required fields: id, name, thumbnailUrl
		$groups = groups_get_groups();
		return $this->_return($groups);
	}
	
	protected function getGroup($groupId = 0) {
		$bpgroup = groups_get_group(array('group_id' => $groupId));
		$group = array(
			'id' => $bpgroup->id,
			'creator_id' => $bpgroup->creator_id,
			'name' => $bpgroup->name,
			'slug' => $bpgroup->slug,
			'description' => $bpgroup->description,
			'status' => $bpgroup->status,
			'enable_forum' => $bpgroup->enable_forum,
			'date_created' => $bpgroup->date_created
		);
		return $this->_return($group);
	}
	
	/**
	 * Apply request filter
	 * 
	 * @since 0.1
	 * 
	 * @return (mixed) filtered content
	 */
	private function _return($content) {
		return wpr_filter_content($content, wpr_get_filter('Groups'));
	}
}
