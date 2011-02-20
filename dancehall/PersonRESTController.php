<?php
class PersonRESTController extends WPAPIRESTController {
	protected function __construct() {}
	
	protected function getPeople() {
		return $this->_return(array('personId' => '1', 'name' => 'ch1411'));
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