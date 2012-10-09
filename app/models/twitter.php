<?php

/**
 * RadioTime component
 * Oren Shepes - 01/10
 * Radio Time API integration
 * @package mobilegates
 */

App::import('Vendor', 'Curl', array('file' => 'Curl.php'));

class MovieTickets extends AppModel{
	
	/** @var string $api_key */
	private $_auth_key;
	/** @var string $partner_id */
	private $_partner_id;
	/** @var string top movies service url */
	private $_top_movies;
	/** @var string search movies service url */
	private $_search_movies;
	/** @var string movie service url */
	private $_movie;
	/** @var string poster service url */
	private $_poster;
	/** @var string $name */
	var $name = ' MovieTickets';
	/** @var string $useTable */
	public $useTable = false;
	//public $components = array('Curl'); 
	var $uses = array('Curl');
	/** @var array $components */
	var $components = array('RequestHandler');
	
	/**
	 * constructor
	 */
	function __construct(){
	
		$this->_top_movies = Configure::read('Movietickets.top_movies');
		$this->_search_movies = Configure::read('Movietickets.search_movies');
		$this->_poster = Configure::read('Movietickets.poster');
		$this->_movie = Configure::read('Movietickets.movie');
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
	
		// the rest of the query options
		foreach ($vars as $key => $val) {
			if(!empty($val)){
					$options[strtolower($key)] = $val;
			}
		}
		// avail API methods
		$methods = array('top_movies', 'search_movies', 'poster', 'movie');
		if(!in_array(strtolower($method), $methods)) return;
		switch ($method) {
			case 'top_movies':
				$url = $this->_top_movies;
				break;
			case 'search_movies':
				$url = $this->_search_movies;
				break;
			case 'movie':
				$url = $this->_movie;
				break;
			case 'poster':
				$url = $this->_poster;
				break;
			default:
				$url = $this->_top_movies;
				break;
		}
		
		// set CURL options
		$this->curl = & new Curl();
		$this->curl->url = $url;
		$this->curl->post = false;
		$this->curl->postFieldsArray = $options;
		$results = @$this->curl->execute();
		return $results;
	}
	
}
?>