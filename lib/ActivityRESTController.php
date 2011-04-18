<?php
class ActivityRESTController extends WPAPIRESTController {
	protected function __construct() {}
	
	protected function getActivities() {
		return bp_activity_get();
	}
	
	protected function getActivity($activityId = 0) {
		return bp_activity_get_specific(array('activity_ids' => $activityId));
	}
}
