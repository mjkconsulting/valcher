<?php

/**
 * RadioTime component
 * Oren Shepes - 01/10
 * Radio Time API integration
 * @package mobilegates
 */

App::import('Vendor', 'Curl', array('file' => 'Curl.php'));

class RadioTime extends AppModel{
	
	/** @var string $api_key */
	private $_auth_key;
	/** @var string $partner_id */
	private $_partner_id;
	/** @var string api_url */
	private $_api_url; 
	/** @var string $name */
	var $name = 'RadioTime';
	/** @var string $useTable */
	public $useTable = false;
	//public $components = array('Curl'); 
	var $uses = array('Curl');
	/** @var array $components */
	var $components = array('RequestHandler');
	
	/**
	 * constructor
	 *
	 * @param string $partner_id
	 * @param string $api_key
	 */
	function __construct(){
		$this->_auth_key = Configure::read('Radiotime.auth_key');
		$this->_partner_id = Configure::read('Radiotime.partner_id');
		$this->_api_url = Configure::read('Radiotime.api_url');
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
	
	/**
	 * executes an API method
	 *
	 * @param string $method
	 * @param array $options
	 * @param string $render
	 */
	function exec($method, $vars=array()){
		// set partner ID and serial
		$options['partnerId'] = $this->_partner_id;
		$options['serial'] = $this->_auth_key;
		// the rest of the query options
		foreach ($vars as $key => $val) {
			if(!empty($val)){
					$options[strtolower($key)] = $val;
			}
		}
		// avail API methods
		$methods = array('browse', 'search', 'auth', 'account', 'describe', 'options', 'preset', 'tune');
		if(in_array(strtolower($method), $methods)) {
			// set url
			$this->_api_url .= sprintf('%s.ashx', ucfirst(strtolower($method)));	
		}
		
		// set CURL options
		$this->curl = & new Curl();
		$this->curl->url = $this->_api_url;
		$this->curl->post = false;
		$this->curl->postFieldsArray = $options;
		$results = @$this->curl->execute();
		return $results;
	}
	
}
?>