<?php
class PersonRESTController extends WPAPIRESTController {
	protected function __construct() {}
	
	protected function getPeople() {
		// required fields: id, name, thumbnailUrl
		return $this->_return(array('personId' => '1', 'name' => 'ch1411'));
	}
	
	protected function getPerson($person = 0) {
		return $this->_return(array('personId' => '2', 'name' => 'ch1412'));
	}
	
	/**
	 * Apply request filter
	 * 
	 * @since 0.1
	 * 
	 * @return (mixed) filtered content
	 */
	private function _return($content) {
		return wpr_filter_content($content, wpr_get_filter('People'));
	}
}
