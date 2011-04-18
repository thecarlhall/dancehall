<?php
class MessageRESTController extends WPAPIRESTController {
	protected function __construct() {}
	
	protected function getMessages() {
		return BP_Messages_Thread::get_current_threads_for_user($_GET['user_id']);
	}
	
	protected function getMessage($message = null) {
		return BP_Messages_Message($message);
	}
}
