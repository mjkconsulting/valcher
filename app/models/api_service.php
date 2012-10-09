<?php 
/**
 * API Model
 * @author Oren Shepes - 1/10
 * Provides model function for the API
 * @package mobilegates
 *
 */

App::import('Helper', 'Validation');
App::import('Vendor','UserLogin', array('file' => 'data_objects' . DS . 'UserLogin.class.php'));
App::import('Vendor','Pouch', array('file' => 'data_objects' . DS . 'Pouch.class.php'));
App::import('Vendor','UserRegistrar', array('file' => 'data_objects' . DS . 'UserRegistrar.class.php'));
App::import('Vendor','User', array('file' => 'data_objects' . DS . 'User.class.php'));
App::import('Vendor','UserReg', array('file' => 'data_objects' . DS . 'UserReg.class.php'));
App::import('Vendor','Gem', array('file' => 'data_objects' . DS . 'Gem.class.php'));
App::import('Vendor','GemCategory', array('file' => 'data_objects' . DS . 'GemCategory.class.php'));
App::import('Vendor','Content', array('file' => 'data_objects' . DS . 'Content.class.php'));
App::import('Vendor','AddressType', array('file' => 'data_objects' . DS . 'AddressType.class.php'));
App::import('Vendor','Priority', array('file' => 'data_objects' . DS . 'Priority.class.php'));

define('NULL_ARG', -1);

class ApiService extends AppModel  
{
	/** @var string $name */
    var $name = 'ApiService';
    
    /** @var string $useTable*/
    var $useTable = false;
  
    /**
     * Gets the API version
     * @return string
     */
    function version()
    {
        return '1.0.0';
    }
    
    /**
	 * login - logs in a user in the system
	 * 
	 * @param string $email
	 * @param string $passwd
	 * @return UserLogin
	 */
    function login($email, $passwd) {

    	// validate input data
    	$valid = &Validation::getInstance();
						
    	try {
    		if ((empty($email) or !$valid->email($email) && (empty($passwd) or !$valid->between($passwd,8,12)))) {
    			return new UserLogin(-1,'Failed','Bad userID / Password');		
      		}else{
    			$res = ClassRegistry::init('ApiTools')->login($email,$passwd);
                return new UserLogin($res[0]['user_id'],'Success',$errors);
    		}
    	}catch (Exception $e){
    		$this->log($e->getTraceAsString());
    	}
    }
    
    
    /**
	 * activate - activates an account in the system
	 * 
	 * @param string $email
	 * @param int $user_id
	 * @return int
	 */
    function activate($email, $user_id) {

    	// validate input data
    	$valid = &Validation::getInstance();
						
    	try {
    		if ((empty($email) or !$valid->email($email) && (empty($user_id)))) {
    			return -1;		
      		}else{
    			$res = ClassRegistry::init('ApiTools')->activate($email,$user_id);
                return $res[0]['user_id'];
    		}
    	}catch (Exception $e){
    		$this->log($e->getTraceAsString());
    	}
    }
    
    /**
	 * resetPassword
	 * @param string $passwd
	 * @param string $email
	 * @param int $user_id
	 * @return int
	 */
    function resetPassword($passwd, $email, $user_id) {

    	// validate input data
    	$valid = &Validation::getInstance();
						
    	try {
    		if (empty($email) or empty($user_id) or empty($passwd)) {
    			return -1;		
      		}else{
    			$res = ClassRegistry::init('ApiTools')->resetPassword($passwd,$email,$user_id);
                return $res[0]['user_id'];
    		}
    	}catch (Exception $e){
    		$this->log($e->getTraceAsString());
    	}
    }
    
    /**
	 * checkUser - check if the user exists
	 * 
	 * @param string $email
	 * @return int
	 */
    function checkUser($email) {

    	// validate input data
    	$valid = &Validation::getInstance();
						
    	try {
    		if (!$valid->email($email)) {
    			return -1;		
      		}else{
    			$res = ClassRegistry::init('ApiTools')->checkUser($email);
                return $res[0]['user_id'];
    		}
    	}catch (Exception $e){
    		$this->log($e->getTraceAsString());
    	}
    }
    
    /**
	 * getPouches - gets user pouches
	 *
	 * @param int $user_id the user ID
	 * @param int $status status of pouches to fetch
	 * @return Pouch[]
	 */
	public function getPouches($user_id, $status) {
		
		// validate input data
		$valid = &Validation::getInstance();
		$pouch = new Pouch();
		try {
			if (!$valid->numeric($user_id) and $user_id != NULL_ARG) {
				throw new Exception(ERR_BAD_ARGS);
			}else{
				$user_id = $user_id == NULL_ARG ? NULL : $user_id;
				$status = $status == NULL_ARG ? NULL : $status;
				$results = ClassRegistry::init('ApiTools')->getPouches($user_id,$status);
	
				foreach (array_values($results) as $arr){
					$props = @array_pop($arr);
					$pouch = new Pouch($props['p_pouch_id'],
										$props['p_pouch_set_id'],
										$props['p_name'],
										$props['p_description'],
										$props['p_price'],
										$props['p_status_id'],
										$props['p_priority'],
										$props['p_created'],
										$props['p_updated'],
										$props['p_parent_id']);
					$pouches[] = $pouch;
				}
				return $pouches;
			}
		}catch (Exception $e){
			$this->log($e->getTraceAsString());
		}
	}

	/**
	 * register - registers a user in the system
	 *
	 * @param UserRegistrar struct 
	 * @return UserReg 
	 */
	public function registerUser($reg) {
		
		// user input and validation rules
		$keys = array('username' => 'alphaNumeric',
						'fname' => 'alphaNumeric',
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
				$func_args[] = $reg->{$key};
				foreach ($prop as $p) $func_args[] = $p;
			}else{
				$method = $prop;
				$func_args = array($reg->{$key});
			}
			// apply validation method
			$args = @join(",",$func_args);

			if(is_null($method)) {
				$reg_data[] = $reg->{$key};
			}else {
				$valid = $validation->{$method}($args);
				if ($valid) {
					$reg_data[$key] = $reg->{$key} ? $reg->{$key} : '';
				}else{
					$errors[] = "$key ($reg->{$key}): $method validation failed";
				}
			}
			$func_args = array();
		}

		// if we passed validation - register user
		if(empty($errors)){
			try {
				$res = ClassRegistry::init('ApiTools')->registerUser(array_values($reg_data));
				return new UserReg($res[0]['user_id'],'Success',$errors=array());
			} catch (Exception $e){
				$this->log($e->getTraceAsString());
				$errors = array('Registration Failed');
				return new UserReg(-1,'Failed',$errors);
			}
		}else {
			return new UserReg(-1,'Failed',$errors);
		}
	}
	
	/**
	 * radiotime wrapper
	 *
	 * @param string $method
	 * @param string options as key/value pairs Query string style (e.g: c=music&lonlat=34.450044,-120.873433)
	 * @return string
	 */
	function radioTime($method, $options){
		try {
			$args = explode('&', $options);
			$res = ClassRegistry::init('RadioTime')->exec($method, $args);
		}catch (Exception $e){
			$this->log($e->getTraceAsString());
			return array($e->getTraceAsString());
		}
		return $res;
	}
	
	/**
	 * get gemz under a pouch
	 *
	 * @param int $pouch_id
	 * @param int $user_id
	 * @return Gem[]
	 */
	function getPouchGemz($pouch_id, $user_id){
		// validate input data
		$valid = &Validation::getInstance();
		
		try {
			if (!$valid->numeric($pouch_id) and !$valid->numeric($pouch_id)) {
				throw new Exception(ERR_BAD_ARGS);
			}else{
				$results = ClassRegistry::init('ApiTools')->getPouchGemz($pouch_id, $user_id);
	
				foreach (array_values($results) as $arr){
					$props = @array_pop($arr);
					$gem = new Gem($props['gem_id'],
										$props['title'],
										$props['description'],
										$props['focus_icon'],
										$props['disable_icon'],
										$props['price'],
										$props['pri'],
										$props['created'],
										$props['status_id'],
										$props['content'],
										$props['category'],
										$props['author'],
										$props['purchase_url'],
										$props['service_url']);
					$gems[] = $gem;
				}
				return $gems;
			}
		}catch (Exception $e){
			$this->log($e->getTraceAsString());
		}
	}
	
	/**
     * get available gemz categoties
     *
     * @param int $parent_id
     * @return GemCategory[]
     */
    function getGemzCategories($parent_id=0){
    	$categories = array();
		$results = ClassRegistry::init('ApiTools')->getGemzCategories(array($parent_id));
		foreach (array_values($results) as $arr){
			$prop = @array_pop($arr);
			$cat = new GemCategory($prop['gc_category_id'], $prop['gc_category_name'], $prop['gc_category_parent'], $prop['gc_status_id']);
			$categories[] = $cat; 
		}
		return $categories;
    }
    
    /**
     * get available gemz content type
     * @return Content[]
     */
    function getGemzContentType(){
    	$categories = array();
		$results = ClassRegistry::init('ApiTools')->getGemzContentType();
		foreach (array_values($results) as $arr){
			$prop = @array_pop($arr);
			$ct = new Content($prop['ct_content_id'], $prop['ct_type'], $prop['ct_status_id']);
			$ctypes[] = $ct; 
		}
		return $ctypes;
    }
    
    /**
     * get available gemz address type
     * @return AddressType[]
     */
    function getGemzAddressType(){
    	$categories = array();
		$results = ClassRegistry::init('ApiTools')->getGemzAddressType();
		foreach (array_values($results) as $arr){
			$prop = @array_pop($arr);
			$at = new AddressType($prop['at_address_type_id'], $prop['at_address_type']);
			$atypes[] = $at; 
		}
		return $atypes;
    }
    
    /**
     * get available gemz address type
     * @return Priority[]
     */
    function getGemzPriorities(){
    	$categories = array();
		$results = ClassRegistry::init('ApiTools')->getGemzPriorities();
		foreach (array_values($results) as $arr){
			$prop = @array_pop($arr);
			$p = new Priority($prop['p_priority_id'], $prop['p_priority_title'], $prop['p_priority_factor'], $prop['p_priority_status']);
			$priorities[] = $p; 
		}
		return $priorities;
    }
    
    /**
     * get gemz 
     * @param string $category
     * @param string $author
     * @return Gem[]
     */
    function getGemz($category, $author){
    	$gems = array();
		$results = ClassRegistry::init('ApiTools')->getGemz($category, $author);
		foreach (array_values($results) as $arr){
			$props = @array_pop($arr);
			$gem = &new Gem($props['gem_id'],
										$props['title'],
										$props['description'],
										$props['focus_icon'],
										$props['disable_icon'],
										$props['price'],
										$props['pri'],
										$props['created'],
										$props['status_id'],
										$props['content'],
										$props['category'],
										$props['author'],
										$props['purchase_url'],
										$props['service_url']);
			$gems[] = $gem; 
		}
		return $gems;
    }
    
    /**
     * get user data
     * @param int $user_id
     * @return User
     */
    function getUserData($user_id){
    	
		$res = ClassRegistry::init('ApiTools')->getUserData($user_id);
		$props = @array_pop(@array_pop($res));
		$user = &new User($props['user_id'],
							$props['username'],
							$props['fname'],
							$props['lname'],
							$props['email'],
							$props['phone'],
							$props['address'],
							$props['city'],
							$props['state'],
							$props['country'],
							$props['zipcode'],
							$props['cellular'],
							$props['user_type']); 
		return $user;
    }
    
    /**
	 * register pouch
	 *
	 * @param Pouch struct 
	 * @return int
	 */
	public function registerPouch($pouch) {
		
		// user input and validation rules
		$keys = array('name' => 'alphaNumeric',
						'user_id' => 'numeric',
						'parent_id' => 'numeric',
						'priority' => 'numeric',
						'status_id' => 'numeric'
		);

		$reg_data = array();
		$errors = array();

		// validate input data
		$validation = &Validation::getInstance();
		$func_args = array();

		foreach ($keys as $key => $prop){
			if (is_array($prop)) {
				$method = array_shift($prop);
				$func_args[] = $reg->{$key};
				foreach ($prop as $p) $func_args[] = $p;
			}else{
				$method = $prop;
				$func_args = array($reg->{$key});
			}
			// apply validation method
			$args = @join(",",$func_args);

			if(is_null($method)) {
				$reg_data[] = $reg->{$key};
			}else {
				$valid = $validation->{$method}($args);
				if ($valid) {
					$reg_data[$key] = $reg->{$key} ? $reg->{$key} : '';
				}else{
					$errors[] = "$key: $method validation failed";
				}
			}
			$func_args = array();
		}

		// if we passed validation - register user
		if(empty($errors)){
			try {
				$res = ClassRegistry::init('ApiTools')->registerPouch(array_values($reg_data));
				return $res[0]['pouch_id'];
			} catch (Exception $e){
				$this->log($e->getTraceAsString());
				$errors = array('Pouch Registration Failed');
				return -1;
			}
		}else {
			return -1;
		}
	}
}
?>