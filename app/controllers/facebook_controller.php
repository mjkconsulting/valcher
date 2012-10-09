<?php
/**
 * facebook controller
 * @author Oren Shepes - 5/2010
 */

App::import('Helper', 'Xml');
App::import('Vendor', 'Facebook');

class FacebookController extends AppController {
	/**
	* Controller Name
	* @access public
	* @var string
	*/
	var $name = 'Facebook';
	
	/**
	* Components that are used in this controller
	* @access public
	* @var array
	*/
	var $components = array('RequestHandler', 'Facebook');
	
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

  	// facebook api key
  	var $api_key = "2c18e5370aaf03df4ff77b018c6c7f53";
  	// facebook secret
    var $secret = "2a097b6946a386dc1b27f04146fbe1cd";
    
    var $facebook = null;

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
	* feed
	*/
	function feed() {
		  
         // Prevent the 'Undefined index: facebook_config' notice from being thrown.  
         $GLOBALS['facebook_config']['debug'] = NULL;  
         $this->redirect("http://login.facebook.com/login.php?api_key=".$this->api_key."&v=1.0");
         // Create a Facebook client API object.  
         //$this->facebook = new Facebook($this->api_key, $this->secret);   
         
         // Retrieve the user's friends and pass them to the view.  
         //$friends = $this->facebook->api_client->friends_get(540410561);  
         
         //$this->renderResponse($render, $friends);
     }  
	
     function authorize(){
     	$this->facebook = new Facebook($this->api_key, $this->secret); 
     	$key = $this->facebook->api_client->session_key;
     	echo "sess key: $key";
     	
     }
}
?> 