<?php

/**
 * RadioTime component
 * Oren Shepes - 01/10
 * Radio Time API integration
 * @package mobilegates
 */

class RadioTimeComponent extends Component {
	
	/** @var string $api_key */
	private $api_key;
	/** @var string $partner_id */
	private $partner_id;
	
	/**
	 * constructor
	 *
	 * @param string $partner_id
	 * @param string $api_key
	 */
	function __construct($partner_id, $api_key){
		
	}
	
	/**
	 * initialize controller
	 *
	 * @param Object $controller
	 */
	function initialize(&$controller)
	{
		$this->params = $controller->params;
	}
	
}