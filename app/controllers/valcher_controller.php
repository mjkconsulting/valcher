<?php
/**
 * @package mobilegates
 * @subpackage    mobilegates.cake.libs.controller
 */

/**
 * imports libs
 */
App::import('Helper', 'Xml');
App::import('Core', 'Sanitize');
App::import('Vendor', 'nusoap');
App::import('Core', 'Validation');

/**
 * Constants
 */
define('ERR_BAD_ARGS', 'Wrong number of arguments');
define('DEFAULT_VIEW', 'xml');
define('NULL_ARG',-1);
define('UID_NODE_OPEN', '<user_id>');
define('UID_NODE_CLOSE', '</user_id>');

class ValcherController extends AppController {
	
	/**
	 * View handler
	 *
	 * @var object
	 */
	var $view = 'Smarty'; 
	
	/**
	 * Helpers
	 *
	 * @var array
	 */
	var $helpers = array('SmartyHtml','SmartySession','Form','Xml','Js'); 
	
	/**
	 * components
	 */
	var $components = array('Api', 'Email', 'RequestHandler', 'AuthorizeNet', 'json', 'simplepie', 'Twitter');
	
	/**
	 * controller name
	 *
	 * @var string
	 */
	var $name = 'Valcher';
	
	
	/**
	 * This controller does not use a model
 	 *
	 * @var array
	 * @access public
	 */
	public $uses = array();
	
	/**
	 * @var boolean $dbTable
	 */
	public $dbTable = false;
	
	
	function index(){
		$path = func_get_args();
		$this->pageTitle = 'MobileGates Valcher API';
		// css
		$this->set('css', 'documents');	
		$this->render(join('/', $path));
	}
	
	/**
	 * register - registers a user in the system
	 *
	 * @param array $params - array of args to the service
	 * @return Object the user new user ID according to requested content type
	 */
	public function registerUser() {
		$path = func_get_args();
		$view = $this->params['url']['view'] ? $this->params['url']['view'] : DEFAULT_VIEW;
		
		// user input and validation rules
		$keys = array('fname' => 'alphaNumeric',
					  'lname' => 'alphaNumeric',
					  'email' => 'email',
					  'phone' => 'phone',
					  'address' => 'notEmpty',
					  'address_type' => 'numeric',
					  'city' => 'notEmpty',
					  'state' => 'notEmpty',
					  'country' => 'notEmpty',
					  'cell' => 'phone',
					  'zipcode' => 'postal',
					  'passwd' => 'alphaNumeric',
					  'user_type' => 'numeric',
					  'device_id' => 'numeric',
					  'lng' => 'notEmpty',
					  'lat' => 'notEmpty'
					  );
			
		$reg_data = array();
		$errors = array();
		
		// validate input data
		$validation = &Validation::getInstance();
		$func_args = array();
		
		foreach ($keys as $key => $prop){
			if (is_array($prop)) {
				$method = array_shift($prop);
				$func_args[] = $this->params['url'][$key];
				foreach ($prop as $p) $func_args[] = $p;
			}else{
				$method = $prop;
				$func_args = array($this->params['url'][$key]);
			}
			// apply validation method
			$args = @join(",",$func_args);
			
			if(is_null($method)) {
				$reg_data[] = strtolower(urldecode($this->params['url'][$key]));
			}else {
				$valid = $validation->{$method}($args);
				if ($valid) {
					$reg_data[] = $this->params['url'][$key] ? strtolower(urldecode($this->params['url'][$key])) : '';
				}else{
					$errors[] = $key .": $method validation failed";
				}
			}
			$func_args = array();
		}
		
		// if we passed validation - register user
		if(empty($errors)){
			try {
				$this->loadModel('ApiTools');
				$res = $this->ApiTools->registerUser($reg_data);
				$out = array('response'=>array('register'=>array(@array_pop($res))));
				$this->renderResponse($view='json', $out);
				
			} catch (Exception $e){
				$this->log($e->getTraceAsString());
			}
		}else {
			$out = array('response'=>array('errors'=>array('error'=>$errors)));
			$this->renderResponse($view, $out);
		}
	}

	/**
	 * register - registers a user in the system - short form
	 *
	 * @param array $params - array of args to the service
	 * @return Object the user new user ID according to requested content type
	 */
	public function register() {
		$path = func_get_args();
		$view = $this->params['url']['view'] ? $this->params['url']['view'] : DEFAULT_VIEW;
		
		// user input and validation rules
		$keys = array('fname' => 'alphaNumeric',
					  'lname' => 'alphaNumeric',
					  'email' => 'email',
					  'passwd' => 'notEmpty'
					  );
			
		$reg_data = array();
		$errors = array();
		
		// validate input data
		$validation = &Validation::getInstance();
		$func_args = array();
		
		foreach ($keys as $key => $prop){
			if (is_array($prop)) {
				$method = array_shift($prop);
				$func_args[] = $this->params['url'][$key];
				foreach ($prop as $p) $func_args[] = $p;
			}else{
				$method = $prop;
				$func_args = array($this->params['url'][$key]);
			}
			// apply validation method
			$args = @join(",",$func_args);
			
			if(is_null($method)) {
				$reg_data[] = strtolower(urldecode($this->params['url'][$key]));
			}else {
				$valid = $validation->{$method}($args);
				if ($valid) {
					$reg_data[] = $this->params['url'][$key] ? strtolower(urldecode($this->params['url'][$key])) : '';
				}else{
					$errors[] = $key .": $method validation failed";
				}
			}
			$func_args = array();
		}
		
		// if we passed validation - register user
		if(empty($errors)){
			try {
				$this->loadModel('ApiTools');
				$res = $this->ApiTools->registerShort($reg_data);
				$out = array('response'=>array('register'=>array(@array_pop($res))));
				$this->renderResponse($view='json', $out);
				
			} catch (Exception $e){
				$this->log($e->getTraceAsString());
			}
		}else {
			$out = array('response'=>array('errors'=>array('error'=>$errors)));
			$this->renderResponse($view='json', $out);
		}
	}
	
	/**
	 * login - logs in a user in the system
	 *
	 * @param array $params - array of args to the service
	 */
	public function login() {
		$path = func_get_args();
		@list($email, $passwd, $view) = $path;

		// load model
		$this->loadModel('ApiTools');
			
		// validate input data
		$valid = &Validation::getInstance();
		
		try {
			if ((empty($email) or !$valid->email($email) && (empty($passwd) or !$valid->between($passwd,8,12)))) {
				throw new Exception(ERR_BAD_ARGS);
			}else{
				$results = $this->ApiTools->login($email,$passwd);
				$res = @array_pop($results);
				$out = array('response'=>array('login'=>array(@array_pop($res))));
				$this->renderResponse($view, $out);
			}
			
		}catch (Exception $e){
			$this->log($e->getTraceAsString());
		}
	}
	
	/**
	 * subscribe
	 * @param string $email
	 * @param array $params - array of args to the service
	 */
	public function subscribe() {
		$path = func_get_args();
		@list($email, $view) = $path;

		// load model
		$this->loadModel('ApiTools');
			
		// validate input data
		$valid = &Validation::getInstance();
		
		try {
			if ((empty($email) or !$valid->email($email))) {
				throw new Exception(ERR_BAD_ARGS);
			}else{
				$res = $this->ApiTools->subscribe($email);
				$out = array('response'=>array('subscribe'=> $res));
				$this->renderResponse($view, $out);
			}
			
		}catch (Exception $e){
			$this->log($e->getTraceAsString());
		}
	}

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
				if(!$clientRender) echo $this->json->encode($out);
				else echo $out;
				break;
		}
		
	}

	/**
	 * decodes request POSTed data according to content type
	 * @return void
	 */
	function decodeRequest(){
		if ($this->RequestHandler->isAjax()) {
			$this->data = $this->json->decode($this->data);
		}elseif ($this->RequestHandler->isXml()){
			$this->data = ClassRegistry::init('XmlHelper')->toString($this->data);
		}
	}
	
	/**
	 * Service consumer
	 *
	 * @param string $email
	 * @param string $passwd
	 * @return int
	 */
    function signin($email, $passwd, $view)
    {
        $client = new SoapClient("http://api.mobilegates.oren.selfip.net/service/wsdl/api");

        $params = array('email'     => $email,
                        'passwd'    => $passwd);

        $result = $client->login($params); 
        $this->autoLayout = false;
        $this->autoRender = false;
        $view = $view ? $view : 'xml';
        
        $this->renderResponse($view, array('response'=>array('signin'=>$result)));
    }
    
   /**
    * getDeal
    * @param int $deal_id
    * @return array
    */
    function getDeal($deal_id, $render='json'){
    	$this->loadModel('ApiTools');
		$results = $this->ApiTools->getDeal($deal_id);
		foreach ($results as $key => $val) {
			if(is_array($val)){
				foreach ($val as $k => $v) $deals[$k] = $v;
			}else{
				$deals[$key] = $val;
			}
		}
		$this->renderResponse($render, array('response' => array('deal' => $deals)));
    } 
    
    /**
    * getFeatureDeal
    * @param int $deal_id
    * @return array
    */
    function getFeatureDeal(){
    	$this->loadModel('ApiTools');
		$results = $this->ApiTools->getFeatureDeal();
		foreach ($results as $key => $val) {
			if(is_array($val)){
				foreach ($val as $k => $v) $deals[$k] = $v;
			}else{
				$deals[$key] = $val;
			}
		}
		$this->renderResponse($render, array('response' => array('feature_deal' => $deals)));
    } 
    
    /**
    * getFeaturedDeal
    * @return array
    */
    function getFeaturedDeal(){
    	$this->loadModel('ApiTools');
		$results = $this->ApiTools->getFeatureDeal();
		foreach ($results as $key => $val) {
			if(is_array($val)){
				foreach ($val as $k => $v) $deals[$k] = $v;
			}else{
				$deals[$key] = $val;
			}
		}
		$this->renderResponse($render, array('response' => array('featured_deal' => $deals)));
    } 
    
    /**
    * getVendorData
    * @param int $vendor_id
    * @return array
    */
    function getVendorData($vendor_id, $render='json'){
    	$this->loadModel('ApiTools');
		$results = $this->ApiTools->getVendorData($vendor_id);
		foreach ($results as $key => $val) {
			if(is_array($val)){
				foreach ($val as $k => $v) $vendor[$k] = $v;
			}else{
				$vendor[$key] = $val;
			}
		}
		$this->renderResponse($render, array('response' => array('vendor' => $vendor)));
    } 
    
    /**
    * getDeals
    * @return array
    */
    function getDeals($user_id, $render='json'){
    	$deals = array();
    	$this->loadModel('ApiTools');
		$results = $this->ApiTools->getDeals($user_id); 
		
		$this->renderResponse($render, array('response' => array('deals' => $results)));
    } 
    
    /**
    * getAvailableDeals
    * @return array
    */
    function getAvailableDeals($user_id, $render='json'){
    	$deals = array();
    	$this->loadModel('ApiTools');
		$results = $this->ApiTools->getAvailableDeals($user_id);
		
		$this->renderResponse($render, array('response' => array('deals' => $results)));
    } 
    
     /**
    * getDealStats
    * @return array
    */
    function getDealStats($deal_id){
    	$deals = array();
    	$this->loadModel('ApiTools');
		$results = $this->ApiTools->getDealTipped($deal_id);
		
		$this->renderResponse($render, array('response' => array('deal_stats' => $results)));
    } 
    
    /**
    * getAllDeals
    * @param string $start
    * @param string $end
    * @return array
    */
    function getAllDeals($start=null, $end=null){
    	$deals = array();
    
    	$this->loadModel('ApiTools');
		
		$results = $this->ApiTools->getAllDeals();
	
		$this->renderResponse($render, array('response' => array('deals' => $results)));
    } 
    
    /**
    * getDealsByDate
    * @return array
    */
    function getDealsByDate(){
    	$deals = array();
    	$start_date = $this->params['url']['start_date'];
    	$end_date = $this->params['url']['end_date'];
    	$start_date = $start_date ? $start_date : date('Y-m-d');
    	$end_date = $end_date ? $end_date : mktime(date('Y-m-d', strtotime("+1 week")));
    	$this->loadModel('ApiTools');
		$results = $this->ApiTools->getDealsByDateRange($start_date, $end_date);
		
		$this->renderResponse($render, array('response' => array('deals' => $results)));
    } 
    
    /**
    * getDealOfTheDay
    * @return array
    */
    function getDealOfTheDay($date=''){
    	$deals = array();
    	$date = $date ? $date : date('Y-m-d');
    	$i = 0;
    	$this->loadModel('ApiTools');
		$results = $this->ApiTools->getDealOfTheDay($date);
		
		$this->renderResponse($render, array('response' => array('deals' => $results)));
    } 
    
    /**
     * registerCard
     *
     * @param int $user_id
     * @param string $email
     * @param string $card_type
     * @param string $card_number
     * @param string $card_exp
     * @param string $card_cvv
     * @param string $card_name
     * @param int $address_id
     * @param int $status
     * @param string $address
     * @param string $city
     * @param string $state
     * @param string $zipcode
     */
    function registerCard(){
    	$data = array();
    	$keys = array('user_id', 'card_type', 'card_number', 'card_exp', 'card_cvv', 'card_name', 'address', 'city', 'state', 'zipcode');
    	foreach ($keys as $key){
    		${$key} = urldecode($this->params['url'][$key]);
    	}
    	$this->loadModel('ApiTools');
		$results = $this->ApiTools->insertBillingData($user_id, $card_type, $card_number, $card_exp, $card_cvv, $card_name, $status=1, $address, $city, $state, $zipcode);
		foreach ($results as $key => $val) {
			if(is_array($val)){
				foreach ($val as $k => $v) $data[$k] = $v;
			}else{
				$data[$key] = $val;
			}
		}
		$this->renderResponse($render, array('response' => array('registerCard' => $data)));
    }
    
    /**
     * updateCard
     *
     * @param unknown_type $bid
     * @param unknown_type $card_type
     * @param unknown_type $card_number
     * @param unknown_type $card_exp
     * @param unknown_type $card_cvv
     * @param unknown_type $card_name
     * @param unknown_type $address
     * @param unknown_type $city
     * @param unknown_type $state
     * @param unknown_type $zipcode
     */
    function updateCard($bid, $card_type, $card_number, $card_exp, $card_cvv, $card_name, $address, $city, $state, $zipcode){
    	$data = array();
    	$keys = array('bid', 'card_type', 'card_number', 'card_exp', 'card_cvv', 'card_name', 'address', 'city', 'state', 'zipcode');
    	foreach ($keys as $key){
    		${$key} = urldecode($this->params['url'][$key]);
    	}
    	$this->loadModel('ApiTools');
		$results = $this->ApiTools->updateCreditCard($bid, $card_type, $card_number, $card_exp, $card_cvv, $card_name, 1, $address, $city, $state, $zipcode);
		foreach ($results as $key => $val) {
			if(is_array($val)){
				foreach ($val as $k => $v) $data[$k] = $v;
			}else{
				$data[$key] = $val;
			}
		}
		$this->renderResponse($render, array('response' => array('cardUpdate' => $data)));
    	
    }
    
    /**
    * getExpiredDeals
    * @return array
    */
    function getExpiredDeals($user_id, $render='json'){
    	$deals = array();
    	$this->loadModel('ApiTools');
		$results = $this->ApiTools->getExpiredDeals($user_id);
		foreach ($results as $key => $val) {
			if(is_array($val)){
				foreach ($val as $k => $v) $deals[$k] = $v;
			}else{
				$deals[$key] = $val;
			}
		}
		$this->renderResponse($render, array('response' => array('deals' => $deals)));
    } 
    
    /**
    * getUserData
    * @param int $user_id
    * @return array
    */
    function getUserData($user_id, $render='json'){
    	$this->loadModel('ApiTools');
    	$data = array();
		$results = $this->ApiTools->getUserData($user_id); 
		foreach ($results as $key => $val) {
			if(is_array($val)){
				foreach ($val as $k => $v) $data[$k] = $v;
			}else{
				$data[$key] = $val;
			}
		}
		$this->renderResponse($render, array('response' => array('user' => $data)));
    }  
    
    /**
    * getUserProfile
    * @param int $user_id
    * @return array
    */
    function getProfileData($user_id, $render='json'){
    	$this->loadModel('ApiTools');
    	$data = array();
		$results = $this->ApiTools->getProfileData($user_id); 
		foreach ($results as $key => $val) {
			if(is_array($val)){
				foreach ($val as $k => $v) $data[$k] = $v;
			}else{
				$data[$key] = $val;
			}
		}
		$this->renderResponse($render, array('response' => array('profile' => $data)));
    }  
    
    /**
     * gets user external site credentials
     * @param string $site (facebook, twitter, gmail, mail, digg)
     * @param int $user_id
     * @return mixed array
    */
    function getUserCredentials($site, $user_id, $render='json'){
    	$this->loadModel('ApiTools');
		$this->renderResponse($render, array('response' => array('credentials' => @array_pop($this->ApiTools->getUserCredentials($site, $user_id)))));
    } 
    
    /**
     * insert user external site credentials
     * @param string $site (facebook, twitter, gmail, mail, digg)
     * @param string $username
     * @param string $passwd
     * @param string $url
     * @param int $user_id
     * @return mixed array
    */
    function insertUserCredentials($site, $username, $passwd, $url, $user_id, $render='json'){
    	$this->loadModel('ApiTools');
		$res = $this->ApiTools->insertUserCredentials($site, $username, $passwd, $url, $user_id);
		
		$this->renderResponse($render, array('response' => array('credentials' => @array_pop($res))));
    } 

   /**
    * purchase
    * @param int $price
    * @param int $deal_id
    * @param int $user_id
    * @param string $card_type
    * @param string $card_number
    * @param string $card_cvv
    * @param string $exp_month
    * @param string $exp_year
    * @param string $card_name
    * @param string $address
    * @param string $city
    * @param string $state
    * @param string $zip
    */
    function purchase() {

    	$this->loadModel('ApiTools');
    	$price 	= $this->params['url']['price'];
    	$deal_id = $this->params['url']['deal_id'];
    	$user_id = $this->params['url']['user_id'];

    	$errors = array();
    	    	
    	// if user is logged in
    	if(isset($user_id) && $user_id > 0){
    		$data = array();
    		$res = $this->ApiTools->getBillingData($user_id); 
    		
    		$billing = array_shift($res); 
    		$address = array_shift($res);
    		$user 	 = array_shift($res);
    		$exp_arr = split('/', $billing['b']['card_exp']);
    		$exp_month = $exp_arr[0];
    		$exp_year = $exp_arr[1];

    		$values['card_number'] = $billing['b']['card_number'];
    		$values['exp_month'] = $exp_month;
    		$values['exp_year'] = substr($exp_year,2,2);
    		$values['card_type'] = $billing['b']['card_type'];
    		$values['card_cvv'] = $billing['b']['card_cvv'];
    		$values['card_name'] = $billing['b']['card_name'];
    		$values['fname'] = $user['b']['fname'] ? $user['b']['fname'] : 'Valued';
    		$values['lname'] = $user['b']['lname'] ? $user['b']['lname'] : 'Customer';
    		$values['fullname'] = $values['fname'] . ' ' . $values['lname'];
    		$values['address'] = $billing['a']['address'];
    		$values['city'] = $billing['a']['city'];
    		$values['state'] = $billing['a']['state'];
    		$values['zip'] = $billing['a']['zipcode'];
    		$values['email'] = $billing['u']['email'];
    		$values['passwd'] = null;

    		$record_billing = false;

    	}else{ // if a new user
    		$values['card_number'] = $this->params['url']['card_number'];
    		$exp_arr = split('/', $this->params['url']['card_exp']);
    		$values['exp_month'] = $exp_arr[0];
    		$values['exp_year'] = $exp_arr[1];
    		$values['card_cvv'] = $this->params['url']['card_cvv'];
    		$values['card_name'] = $this->params['url']['card_name'];
    		$values['card_type'] = $this->params['url']['card_type'];
    		$values['fullname'] = $this->params['url']['card_name'];
    		$values['lname'] = $this->params['url']['lname'];
    		$values['address'] = $this->params['url']['address'];
    		$values['city'] = $this->params['url']['city'];
    		$values['state'] = $this->params['url']['state'];
    		$values['zip'] = $this->params['url']['zip'];
    		$values['passwd'] = $this->params['url']['password'];

    		$record_billing = true;
    	}

    	if(!$values['card_number'] || !$values['exp_month'] || !$values['card_cvv']) $errors[] = 'Missing Card Data';
    	
    	// get deal data
    	if($deal_id){
    		$deal = array();
    		$deal = $this->ApiTools->getDeal($deal_id);
    		$deal = array_shift($deal);
    	}else{
    		$this->renderResponse($render, array('response' => array('status' => -1, 'errors' => 'missing deal ID')));
    		exit;
    	}
    	
    	// charge card
    	$billinginfo = array("fname" => $values['fullname'],
    	"lname" => $values['fullname'],
    	"address" => $values['address'],
    	"city" => $values['city'],
    	"state" => $values['state'],
    	"zip" => $values['zip'],
    	"country" => "USA");

    	$shippinginfo = array("fname" => $values['fullname'],
    	"lname" => $values['fullname'],
    	"address" => $values['address'],
    	"city" => $values['city'],
    	"state" => $values['state'],
    	"zip" => $values['zip'],
    	"country" => "USA");

    	$response = $this->AuthorizeNet->chargeCard(Configure::read('Authorize.loginID'), Configure::read('Authorize.key'),
    	$values['card_number'],
    	$values['exp_month'],
    	$values['exp_year'],
    	$values['card_cvv'],
    	false,
    	$this->params['url']['price'],
    	9,
    	0,
    	"Valcher Deal Purchase - # " . $deal['deal_code'],
    	$billinginfo,
    	$this->params['url']['email'],
    	$this->params['url']['phone'] ? $this->params['url']['phone'] : "555-555-5555",
    	$shippinginfo);

    	/**
         * Authorize.net response array
         * 
        $response[1] = Response Code (1 = Approved, 2 = Declined, 3 = Error, 4 = Held for Review)
	    $response[2] = Response Subcode (Code used for Internal Transaction Details)
	    $response[3] = Response Reason Code (Code detailing response code)
	    $response[4] = Response Reason Text (Text detailing response code and response reason code)
	    $response[5] = Authorization Code (Authorization or approval code - 6 characters)
	    $response[6] = AVS Response (Address Verification Service response code - A, B, E, G, N, P, R, S, U, W, X, Y, Z)
	                    (A, P, W, X, Y, Z are default AVS confirmation settings - Use your Authorize.net Merchant Interface to change these settings)
	                    (B, E, G, N, R, S, U are default AVS rejection settings - Use your Authorize.net Merchant Interface to change these settings)
	    $response[7] = Transaction ID (Gateway assigned id number for the transaction)
	    $response[38] = MD5 Hash (Gateway generated MD5 has used to authenticate transaction response)
	    $response[39] = Card Code Response (CCV Card Code Verification response code - M = Match, N = No Match, P = No Processed, S = Should have been present, 
	    U = Issuer unable to process request) 
	    */

    	$trans_reason_text 	= $response[4];
    	$trans_reason_code 	= $response[3];
    	$trans_code 		= $response[1];
    	$trans_id 			= $response[38];
    	$status				= $trans_code ? $trans_code : -1;

    	// check that there was a registration
    	$trans_id 	= $trans_id ? $trans_id : microtime();
    	$passwd		= $values['passwd'];
    	$deal_id	= $this->params['url']['deal_id'];
    	$email		= $this->params['url']['email'] ? $this->params['url']['email'] : $values['email'];

    	// record billing info
    	if($record_billing && $this->params['url']['card_number'] && $this->params['url']['address'] && $this->params['url']['city']){
    		$res = $this->ApiTools->insertBillingData(
    		$this->params['url']['user_id'],
    		$this->params['url']['email'],
    		$this->params['url']['card_type'],
    		$this->params['url']['card_number'],
    		$values['exp_month'].'/'.$values['exp_year'],
    		$this->params['url']['card_cvv'],
    		$this->params['url']['card_name'],
    		null,
    		1,
    		ucwords(strtolower($this->params['url']['address'])),
    		ucwords(strtolower($this->params['url']['city'])),
    		strtoupper($this->params['url']['state']),
    		$this->params['url']['zip']
    		);

    		$id = $res['bid'];
    	}

    	// track in db
    	$res = $this->ApiTools->insertDeal($email, $passwd, $deal_id, $price, $status, $trans_id, $trans_code, $trans_reason_text);


    	if($status == 1){
    		// set layout
    		$layout = 'email';
    		$template = 'default';
    		$this->Email->to = $this->params['url']['email'];
    		$this->Email->subject = 'Your purchase at Valcher.com';
    		$this->Email->replyTo = Configure::read('Email.replyto');
    		$this->Email->from = Configure::read('Email.from');
    		//Send as 'html', 'text' or 'both' (default is 'text')
    		$this->Email->sendAs = 'html';

    		$content = array();
    		$content[] = "Thank you for your purchase,";
    		$content[] = "we appreciate you business.";
    		$content[] = "Please note: your card will not be charged until the deal is on.";
    		$content[] = "In order to view your deals please <a href='" .Configure::read('host') . "/users/login'>log-in to your account</a>";
    		//Set view variables as normal
    		$this->set('content', $content);
    		$this->set('name', $this->Session->read('fullname'));
    		if(!$this->Session->check('sent')) {
    			$this->Email->send($content, $template, $layout);
    			$this->Session->write('sent', '1');
    		}
			// $this->Session->write('deal_id', $deal_id);

			$messages[] = $response[4];
    	}else{
    		$errors[] = $response[4];
    	}
    	
    	$this->renderResponse($render, array('response' => array('status' => $status, 'response_text' => $messages, 'errors' => $errors)));
    }
    
    /**
     * getBillingData
     *
     * @param int $user_id
     */
    function getBillingData($user_id){
    	$data = array();
    	$this->loadModel('ApiTools');
    	$results = $this->ApiTools->getBillingData($user_id);
    	foreach ($results as $key => $val) {
			if(is_array($val)){
				foreach ($val as $k => $v) $data[$k] = $v;
			}else{
				$data[$key] = $val;
			}
		}
    	$this->renderResponse($render, array('response' => array('billing_data' => $data)));
    }
    
    /**
     * getBillingIDs
     *
     * @param int $user_id
     */
    function getBillingIDs($user_id){
    	$data = array();
    	$this->loadModel('ApiTools');
    	$results = $this->ApiTools->getBillingIDs($user_id);
    	foreach ($results as $key => $val) {
			if(is_array($val)){
				foreach ($val as $k => $v) $data[$k] = $v;
			}else{
				$data[$key] = $val;
			}
		}
    	$this->renderResponse($render, array('response' => array('billing_ids' => $data)));
    }
    
    /**
     * share a deal
     */
    function trackDealShare(){
    	$key = $this->params['url']['key'];
    	$password = Configure::read('Encryption.key');
    	$pswdlen = Configure::read('Encryption.length');
    	
    	list($deal_id, $user_id) = split(':', $this->_decrypt($key));
 		
    	$ref_url = $this->params['url']['ref_url'] ? $this->params['url']['ref_url'] : '';
       	$credit = $this->params['url']['credit'] ? $this->params['url']['credit'] : 10;
    	
    	
    	$this->loadModel('ApiTools');
    	$results = $this->ApiTools->trackDeal($deal_id, $user_id, $ref_url, $user_id, $credit, 1);
    	
    	
    	header('Location: http://www.valcher.com/pages/deal/?did='.urlencode($deal_id));
    }


    /**
     * encrypt service
     *
     * @param string $string
     */
    function secret(){
    	$string = $this->params['url']['string'];
    	if($string) {
    		$this->renderResponse($render, array('response' => $this->_encrypt($string)));
    	}else{
    		$this->renderResponse($render, array('response' => $this->_encrypt('')));
    	}
    }
    
    /**
     * decrypt service
     *
     * @param string $string
     */
    function unsecret(){
    	$string = $this->params['url']['string'];
    	if($string) {
    		$this->renderResponse($render, array('response' => $this->_decrypt($string)));
    	}else{
    		$this->renderResponse($render, array('response' => $this->_decrypt('')));
    	}
    }

    /**
     * very simple encrypt function 
     * TODO: replace with real encryption
     *
     * @param string $s
     * @return string
     */
    function _encrypt($s)
    {
    	for( $i = 0; $i < strlen($s); $i++ )
    	$r[] = ord($s[$i]) + 2;
    	return implode(Configure::read('Encryption.key'), $r);
    }

    function _decrypt($s)
    {
    	$s = explode(Configure::read('Encryption.key'), $s);
    	for( $i = 0; $i < count($s); $i++ )
    	$s[$i] = chr($s[$i] - 2);
    	return implode('', $s);
    }


}
?>