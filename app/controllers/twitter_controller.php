<?php
/**
 * twitter controller
 * @author Oren Shepes - 5/2010
 */

App::import('Helper', 'Xml');

class TwitterController extends AppController {
	/**
	* Controller Name
	* @access public
	* @var string
	*/
	var $name = 'Twitter';
	
	/**
	* Components that are used in this controller
	* @access public
	* @var array
	*/
	var $components = array('Twitter', 'RequestHandler');
	
	/**
	* Models that are used in this controller
	* @access public
	* @var array
	*/
  	var $uses = array();
	
	/**
	* Helpers
	* @access public
	* @var array
	*/
  	var $helpers = array('Text', 'Html', 'Xml');
	
  	/**
	 * render view - sets the view corresponding to request type/client type
	 * @param string $view
	 * @param mixed $out
	 */
	function renderView($view, $out){
		// which response type
		if(Configure::read('debug') > 1){
			Configure::write('debug', 0);
		}
		// @TODO: other content types
		switch ($view){
			case 'xml':
				$view = 'xml'; break;
			case 'json':
				$view = 'json'; break;
			case 'rss':
				$view = 'rss'; break;
			case 'wap':
				$view = 'mobile'; break;
			case 'amf':
				$view = 'amf'; break;
			case 'xhtml':
				$view = 'xhtml'; break;
			default:
				$view = 'xml'; break;
		}

		$this->set('output', $out);
		$this->ext = $view;
		$this->RequestHandler->respondAs($view);
		$this->viewPath .= "/$view";
		$this->layoutPath = $this->layout = $view;
	}
	
	/**
	 * render response
	 *
	 * @param string $view
	 * @param string $out
	 */
	function renderResponse($view, $out, $clientRender=false){
		// which response type
		// @TODO: other content types
		$this->autoLayout = false;
        $this->autoRender = false;
		//$this->RequestHandler->respondAs($view);   
		if(Configure::read('debug') > 1){
			Configure::write('debug', 0);
		}
		
		switch ($view){
			case 'json':
				if(!$clientRender) echo $this->json->encode($out);
				else echo $out;
				break;
			case 'rss':
			case 'wap':
			case 'amf':
			case 'xhtml':
			case 'xml':
				if(!$clientRender) echo ClassRegistry::init('XmlHelper')->serialize($out);
				else echo $out;
				break;
			default:
				if(!$clientRender) echo ClassRegistry::init('XmlHelper')->serialize($out);
				else echo $out;
				break;
		}
		
	}
	
	/**
	* Default action
	*
	* The index function is used as a default action, in this case it will replicate your twitter page
	*/
	function index() {
		
	}
	
	/**
	 * all - returns all twitter data that pertains to a user
	 *
	 * @param string $user
	 * @param string $pass
	 * @param string $render
	 */
	function all($userid=null, $user, $pass, $render='xml'){
		$this->layout = 'twitter';
		if($userid) {
			$this->loadModel('ApiTools');
			$data = $this->ApiTools->getUserCredentials('twitter', $userid);
			$this->Twitter->username = $data['username'];
        	$this->Twitter->password = $data['passwd'];
		}else{
			$this->Twitter->username = $user;
			$this->Twitter->password = $pass;
		}
		$feed = $this->Twitter->statuses_friends_timeline();
		$user_details = $this->Twitter->account_verify_credentials();
		$friends = $this->Twitter->statuses_friends();
		$followers = $this->Twitter->statuses_followers();
		
		$result = array($feed, $user_details, $friends, $followers);
		$this->renderResponse($render, $result);
	}
	
	/**
	 * details - returns the twitter user details 
	 * @param int $userid
	 * @param string $user
	 * @param string $pass
	 * @param string $render
	 */
	function verify($userid=null, $user, $pass, $render='xml'){
		$this->layout = 'twitter';
		if($userid) {
			$this->loadModel('ApiTools');
			$data = $this->ApiTools->getUserCredentials('twitter', $userid);
			$this->Twitter->username = $data['username'];
        	$this->Twitter->password = $data['passwd'];
		}else{
			$this->Twitter->username = $user;
			$this->Twitter->password = $pass;
		}
		
		$user_details = $this->Twitter->account_verify_credentials();
		$this->renderResponse($render, $details);
	}
	
	/**
	 * friends - returns the twitter friends data that pertains to a user
	 *
	 * @param string $user
	 * @param string $pass
	 * @param string $render
	 */
	function friends($userid=null, $user, $pass, $render='xml'){
		$this->layout = 'twitter';
		if($userid) {
			$this->loadModel('ApiTools');
			$data = $this->ApiTools->getUserCredentials('twitter', $userid);
			$this->Twitter->username = $data['username'];
        	$this->Twitter->password = $data['passwd'];
		}else{
			$this->Twitter->username = $user;
			$this->Twitter->password = $pass;
		}
		
		$friends = $this->Twitter->statuses_friends();
		$this->renderResponse($render, $friends);
	}
	
	/**
	 * followers - returns the twitter followers data that pertains to a user
	 *
	 * @param string $user
	 * @param string $pass
	 * @param string $render
	 */
	function followers($userid=null, $user, $pass, $render='xml'){
		$this->layout = 'twitter';
		if($userid) {
			$this->loadModel('ApiTools');
			$data = $this->ApiTools->getUserCredentials('twitter', $userid);
			$this->Twitter->username = $data['username'];
        	$this->Twitter->password = $data['passwd'];
		}else{
			$this->Twitter->username = $user;
			$this->Twitter->password = $pass;
		}
		$followers = $this->Twitter->statuses_followers();

		$this->renderResponse($render, $followers);
	}
	
	/**
	 * feed - returns the twitter data that pertains to a user
	 * @param int $userid
	 * @param string $user
	 * @param string $pass
	 * @param string $render
	 */
	function feed($userid=null, $user, $pass, $render='xml'){
		$this->layout = 'twitter';
		if($userid) {
			$this->loadModel('ApiTools');
			$data = $this->ApiTools->getUserCredentials('twitter', $userid);
			$this->Twitter->username = $data['username'];
        	$this->Twitter->password = $data['passwd'];
		}else{
			$this->Twitter->username = $user;
			$this->Twitter->password = $pass;
		}
		$feed = $this->Twitter->statuses_friends_timeline();

		$this->renderResponse($render, $feed);
	}
	
}
?> 