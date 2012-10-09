<?php
/**
 * ApiTools Model - handles API calls
 * @author Oren Shepes - 01/10
 * @package valcher
 */

App::import('Vendor', 'nusoap');
App::import('Vendor', 'Curl', array('file' => 'Curl.php'));

class ApiTools extends AppModel {
	
	/** @var string $name */
	var $name = 'ApiTools';
	
	/** @var string $useTable */
	public $useTable = false;

	/** @var array $components */
	public $components = array('Api');
	
	/**
	 * get featured deal
	 * @return object
	 */
	function getFeatureDeal(){ 
		
		$sql = "call valcher.sp_getFeatureDeal()";
		$results = $this->query($sql, array(), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');
		$res = @array_pop($results);
		return $res;
	}
	
	/**
	 * get deal
	 * @return object
	 */
	function getDeal($id){ 
		
		$sql = "call valcher.sp_getDeal(?)";
		$results = $this->query($sql, array($id), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');
		$res = @array_pop($results);
		return $res;
	}
	
	/**
	 * post deal
	 * @return object
	 */
	function postDeal($deal_name, $category_id, $start_date, $start_time, $end_date, $end_time, $price, $discount, $status, $description, $vendor_id, $tipped, $details, $code){ 
		
		$sql = "call valcher.sp_postDeal(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$results = $this->query($sql, array($deal_name, $category_id, $start_date, $start_time, $end_date, $end_time, $price, $discount, $status, $description, $vendor_id, $tipped, $details, $code), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');
		$res = @array_pop($results);
		return $res;
	}
	
	/**
	 * get categories
	 * @return object
	 */
	function getCategories($id){ 
		
		$sql = "call valcher.sp_getCategories(?)";
		$results = $this->query($sql, array($id), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');
		foreach ($results as $r){
			$res[] = $r['categories'];
		}
		return $res;
	}
	
	/**
	 * get deals
	 * @return object
	 */
	function getDeals($userid){ 
		
		$sql = "call valcher.sp_getDeals(?)";
		$results = $this->query($sql, array($userid), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');

		$res = $results;
		return $res;
	}
	
	/**
	 * getAllDeals
	 *
	 * @return mixed
	 */
	function getAllDeals(){ 
		
		$sql = "call valcher.sp_getAllDeals()";
		$results = $this->query($sql, array(), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');

		return $results;
	}
	
	/**
	 * getDealsByDate
	 *
	 * @param int $userid
	 * @return mixed
	 */
	function getDealsByDateRange($start, $end){ 
		
		$sql = "call valcher.sp_getDealsByDateRange(?,?)";
		$results = $this->query($sql, array($start, $end), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');

		return $results;
	}
	
	/**
	 * getDealOfTheDay
	 *
	 * @param int $date
	 * @return mixed
	 */
	function getDealOfTheDay($date){ 
		
		$sql = "call valcher.sp_getDealOfTheDay(?)";
		$results = $this->query($sql, array($date), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');

		return $results;
	}
	
	/**
	 * get expired deals
	 * @return object
	 */
	function getExpiredDeals($userid){ 
		
		$sql = "call valcher.sp_getExpiredDeals(?)";
		$results = $this->query($sql, array($userid), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');

		$res = $results;
		return $res;
	}
	
	/**
	 * get available deals
	 * @return object
	 */
	function getAvailableDeals($userid){ 
		
		$sql = "call valcher.sp_getAvailableDeals(?)";
		$results = $this->query($sql, array($userid), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');

		$res = $results;
		return $res;
	}
	
	/**
	 * get vendor deal
	 * @return object
	 */
	function getVendorDeals($vendor_id){ 
		
		$sql = "call valcher.sp_getVendorDeals(?)";
		$results = $this->query($sql, array($vendor_id), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');
		$res = @array_pop($results);
		return $res;
	}
	
	/**
	 * update vendor data
	 * @return object
	 */
	function updateVendor($vendor_id, $company, $category_id, $fullname, $contact_name, $url, $email, $type, $phone, $address, $city, $state, $country, $cell, $zipcode, $passwd){ 

		$sql = "call valcher.sp_updateVendor(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$results = $this->query($sql, array($vendor_id, $company, $category_id, $fullname, $contact_name, $url, $email, $type, $phone, $address, $city, $state, $country, $cell, $zipcode, $passwd), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');
		
		return $results;
	}
	
	/**
	 * update vendor data
	 * @return object
	 */
	function updateUserData($user_id, $fname, $lname, $email, $phone, $cell, $address, $city, $state, $country, $zipcode, $passwd){ 

		$sql = "call valcher.sp_updateUser(?,?,?,?,?,?,?,?,?,?,?,?)";
		$results = $this->query($sql, array($user_id, $fname, $lname, $email, $phone, $cell, $address, $city, $state, $country, $zipcode, $passwd), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');
		
		return $results;
	}
	
	/**
	 * get vendor data
	 * @return object
	 */
	function getVendorData($vendor_id){ 
		
		$sql = "call valcher.sp_getVendorData(?)";
		$results = $this->query($sql, array($vendor_id), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');
		$res = @array_pop($results);
		return $res;
	}
	
	/**
	 * get user data
	 * @return object
	 */
	function getUserData($user_id){ 
		
		$sql = "call valcher.sp_getUserData(?)";
		$results = $this->query($sql, array($user_id), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');
		$res = @array_pop($results);
		return $res;
	}
	
	/**
	 * subscribe
	 * @return object
	 */
	function subscribe($email){ 
		
		$sql = "call valcher.sp_subscribe(?)";
		$results = $this->query($sql, array($email), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');
		$res = @array_pop($results);
		return $res;
	}
	
	/**
	 * get deal details
	 * @return object
	 */
	function getDealDetails($id){ 
		
		$sql = "call valcher.sp_getDealDetails(?)";
		$results = $this->query($sql, array($id), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . $id);
		
		return $results;
	}
	
	/**
	 * update zip
	 * @return object
	 */
	function updateZip($email, $zip){ 
		
		$sql = "call valcher.sp_updateZip(?,?)";
		$results = $this->query($sql, array($email, $zip), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');
		$res = @array_pop($results);
		return $res;
	}
	
	/**
	 * set profile data
	 * @return object
	 */
	function setProfileData($user_id, $gender, $dob, $zip){ 
		
		$sql = "call valcher.sp_setProfileData(?,?,?,?)";
		$results = $this->query($sql, array($user_id, $gender, $dob, $zip), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');
		$res = @array_pop($results);
		return $res;
	}
	
	/**
	 * set profile data
	 * @return object
	 */
	function getProfileData($user_id){ 
		
		$sql = "call valcher.sp_getProfileData(?)";
		$results = $this->query($sql, array($user_id), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');
		
		return $results;
	}
	
	/**
	 * get deal count
	 * @return object
	 */
	function getDealCount($id){ 
		
		$sql = "call valcher.sp_getDealCount(?)";
		$results = $this->query($sql, array($id), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . $id);
		
		return $results;
	}
	
	/**
	 * get deal tipped
	 * @return object
	 */
	function getDealTipped($id){ 
		
		$sql = "call valcher.sp_getDealTipped(?)";
		$results = $this->query($sql, array($id), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . $id);
		
		return $results;
	}
	
	/**
	 * get deals locations
	 * @return object
	 */
	function getDealLocations(){ 
		
		$sql = "call valcher.sp_getDealLocations()";
		$results = $this->query($sql, array(), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ');
		
		return $results;
	}
	
	/**
	 * login
	 * @param string $email
	 * @param string $passwd
	 * @return int
	 */
	function login($email, $passwd){ 
		
		$sql = "call valcher.sp_login(?,?)";
		$results = $this->query($sql, array($email,$passwd), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . $email . "," . $passwd);
		$res = @array_pop($results);
		return $res;
	}
	
	/**
	 * login vendor
	 * @param string $email
	 * @param string $passwd
	 * @return int
	 */
	function loginVendor($email, $passwd){ 
		
		$sql = "call valcher.sp_loginVendor(?,?)";
		$results = $this->query($sql, array($email, $passwd), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . $email . "," . $passwd);
		$res = @array_pop($results);
		return $res;
	}
	
	/**
	 * insert deal
	 * @param string $email
	 * @param string $passwd
	 * @param int $deal_id
	 * @param float $price
	 * @param string $status
	 * @param string $trans_id
	 * @return int
	 */
	function insertDeal($email, $passwd, $deal_id, $price, $status, $trans_id, $trans_code, $trans_text){ 
		
		$sql = "call valcher.sp_insertDeal(?,?,?,?,?,?,?,?)";
		$results = $this->query($sql, array($email, $passwd, $deal_id, $price, $status, $trans_id, $trans_code, $trans_text), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . $email . "," . $passwd);
		$res = @array_pop($results);
		return $res;
	}
	
	/**
	 * register a user - short form
	 * @param array $params
	 * @return array
	 */
	function registerShort($params){
		
		$sql = "call valcher.sp_registerShort(?,?,?,?)";
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . @join(",",$params));
		$results = $this->query($sql, $params, $cachequeries = false);
		return @array_pop($results);
	}
	
	/**
	 * register a user
	 * @param array $params
	 * @return array
	 */
	function registerUser($params){
		
		$sql = "call valcher.sp_registerUser(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . @join(",",$params));
		$results = $this->query($sql, $params, $cachequeries = false);
		return @array_pop($results);
	}
	
	/**
	 * register a vendor
	 * @param array $params
	 * @return array
	 */
	function registerVendor($params){
		
		$sql = "call valcher.sp_registerVendor(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . @join(",",$params));
		$results = $this->query($sql, $params, $cachequeries = false);
		return @array_pop($results);
	}
	
	/**
	 * activate
	 * @param string $email
	 * @param int $user_id
	 * @return int the user_id if successful -1 if fails
	 */
	function activate($email){ 
		
		$sql = "call valcher.sp_activate(?)";
		$results = $this->query($sql, array($email), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . $email . "," . $user_id);
		$res = @array_pop($results);
		return $res;
	}
	
	/**
	 * activate vendor
	 * @param string $email
	 * @return int the user_id if successful -1 if fails
	 */
	function activateVendor($email){ 
		
		$sql = "call valcher.sp_activateVendor(?)";
		$results = $this->query($sql, array($email), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . $email);
		$res = @array_pop($results);
		return $res;
	}
	
	/**
	 * resetPassword
	 * @param string $email
	 * @param string $passwd
	 * @return int the user_id if successful -1 if fails
	 */
	function resetPassword($email, $passwd){ 
		
		$sql = "call valcher.sp_resetPassword(?,?)";
		$results = $this->query($sql, array($email, $passwd), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . $email);
		$res = @array_pop($results);
		return $res;
	}
	
	
	/**
	 *  TODO: when API is ready switch to these
	 */
	
	function registerBuyer($params){
		
		$sql = "call valcher.sp_registerBuyer(?,?,?)";
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . @join(",",$params));
		$results = $this->query($sql, $params, $cachequeries = false);
		return @array_pop($results);
	}
	
	/**
	 * insert billing data
	 *
	 * @param int $user_id
	 * @param string $card_type
	 * @param string $card_number
	 * @param string $card_exp
	 * @param string $card_cvv
	 * @param int $address_id
	 * @param int $status
	 * @param string $address
	 * @param string $city
	 * @param string $state
	 * @param string $zipcode
	 * @return int
	 */
	function insertBillingData($user_id, $card_type, $card_number, $card_exp, $card_cvv, $card_name, $status=1, $address, $city, $state, $zipcode){
		
		$sql = "call valcher.sp_addCreditCard(?,?,?,?,?,?,?,?,?,?,?)";
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . @join(",",$params));
		$results = $this->query($sql, array($user_id, $card_type, $card_number, $card_exp, $card_cvv, $card_name, $status=1, $address, $city, $state, $zipcode), $cachequeries = false);
		return @array_pop($results);
	}
	
	/**
	 * update billing info
	 *
	 * @param int $user_id
	 * @param string $fname
	 * @param string $lname
	 * @param string $card_type
	 * @param string $card_number
	 * @param string $card_exp
	 * @param string $card_cvv
	 * @param string $card_name
	 * @param string $address
	 * @param string $city
	 * @param string $state
	 * @param string $zipcode
	 * @param string $passwd
	 * @return int
	 */
	function updateBillingData($user_id, $fname, $lname, $card_type, $card_number, $card_exp, $card_cvv, $card_name, $address, $city, $state, $zipcode, $passwd){
		
		$sql = "call valcher.sp_updateBillingData(?,?,?,?,?,?,?,?,?,?,?,?,?)";
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . @join(",",$params));
		$results = $this->query($sql, array($user_id, $fname, $lname, $card_type, $card_number, $card_exp, $card_cvv, $card_name, $address, $city, $state, $zipcode, $passwd), $cachequeries = false);
		return @array_pop($results);
	}
	
	/**
	 * updateCreditCard
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
	 * @return unknown
	 */
	function updateCreditCard($bid, $card_type, $card_number, $card_exp, $card_cvv, $card_name, $status=1, $address, $city, $state, $zipcode){
		
		$sql = "call valcher.sp_updateCreditCard(?,?,?,?,?,?,?,?,?,?,?)";
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . @join(",",$params));
		$results = $this->query($sql, array($bid, $card_type, $card_number, $card_exp, $card_cvv, $card_name, $status=1, $address, $city, $state, $zipcode), $cachequeries = false);
		return @array_pop($results);
	}
	
	/**
	 * getBillingData
	 * @param int $user_id
	 * @return array billing data array
	 */
	function getBillingData($user_id){ 
		
		$sql = "call valcher.sp_getBillingData(?)";
		$results = $this->query($sql, array($user_id), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . $email);
		
		return $results;
	}
	
	/**
	 * getBillingIDs
	 * @param int $user_id
	 * @return array billing data array
	 */
	function getBillingIDs($user_id){ 
		
		$sql = "call valcher.sp_getBillingIDs(?)";
		$results = $this->query($sql, array($user_id), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . $email);
		
		return $results;
	}
	
	/**
	 * getDealReviews
	 * @param int $deal_id
	 * @return array reviews
	 */
	function getDealReviews($deal_id){ 
		
		$sql = "call valcher.sp_getDealReviews(?)";
		$results = $this->query($sql, array($deal_id), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . $email);
		$res = @array_pop($results);
		return $res;
	}
	
	/**
	 * trackDeal
	 *
	 * @param int $deal_id
	 * @param int $user_id
	 * @param int $ref_url
	 * @param int $orig_user_id
	 * @param int $status
	 * @return void
	 */
	function trackDeal($deal_id, $user_id, $ref_url, $orig_user_id, $credit, $status){ 
		
		$sql = "call valcher.sp_trackDeal(?,?,?,?,?,?)";
		$results = $this->query($sql, array($deal_id, $user_id, $ref_url, $orig_user_id, $credit, $status), $cachequeries = false);
		if(Configure::read('debug') > 1) $this->log($sql . ' args: ' . $email);
		$res = @array_pop($results);
		return $res;
	}
}
?>