<?php
class ActivityRESTController extends WPAPIRESTController {
	protected function __construct() {}
	
	protected function getActivities() {
		// required fields: id, name, thumbnailUrl
		$activities = bp_activity_get();
		return $this->_return($activities);
	}
	
	protected function getActivity($activityId = 0) {
		$bpactivity = bp_activity_get_specific(array('activity_ids' => $activityId));
		$activity = array(
			'id' => $bpactivity->id,
			'user_id' => $bpactivity->user_id,
			'component' => $bpactivity->component,
			'type' => $bpactivity->type,
			'action' => $bpactivity->action,
			'content' => $bpactivity->content,
			'primary_link' => $bpactivity->primary_link,
			'item_id' => $bpactivity->item_id,
			'secondary_item_id' => $bpactivity->secondary_item_id,
			'date_recorded' => $bpactivity->date_recorded,
			'hide_sitewide' => $bpactivity->hide_sitewide,
			'mptt_left' => $bpactivity->mptt_left,
			'mptt_right' => $bpactivity->mptt_right,
			'user_email' => $bpactivity->user_email,
			'user_nicename' => $bpactivity->user_nicename,
			'user_login' => $bpactivity->user_login,
			'display_name' => $bpactivity->display_name,
			'user_fullname' => $bpactivity->user_fullname
		);
		return $this->_return($activity);
	}
	
	/**
	 * Apply request filter
	 * 
	 * @since 0.1
	 * 
	 * @return (mixed) filtered content
	 */
	private function _return($content) {
		return wpr_filter_content($content, wpr_get_filter('Activities'));
	}
}
