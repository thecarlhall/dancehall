<?php
class PersonRESTController extends WPAPIRESTController {
	// filter includes all fields except user_pass and user_activation_key
	var $filter = array('ID', 'user_login', 'display_name', 'user_nicename', 'user_email', 'user_url', 'user_registered', 'user_status');

	protected function __construct() {}
	
	protected function getPeople() {
		return get_users();
		return $this->_return(get_users(), $filter);
	}
	
	protected function getPerson($person = null) {
		return $this->_return(get_users(array('include' => $person)), $filter);
	}
	
	protected function deletePeople() {
		return $this->_return(get_users(array('include' => $_POST['id'])), $filter);
	}
}
