<?php
class PersonRESTController extends WPAPIRESTController {
	// filter includes all fields except user_pass and user_activation_key
	var $filter = array('ID', 'user_login', 'display_name', 'user_nicename', 'user_email', 'user_url', 'user_registered', 'user_status');

	protected function __construct() {}
	
	protected function getPeople() {
		return wpr_filter_content(get_users(), $this->filter);
	}
	
	protected function getPerson($person = null) {
		return wpr_filter_content(get_users(array('include' => $person)), $this->filter);
	}
	
	protected function deletePeople() {
		return wpr_filter_content(get_users(array('include' => $_POST['id'])), $this->filter);
	}
}
