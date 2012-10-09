<?php
/**
 * API Model
 * Oren Shepes - 01/10
 * @package mobilegates
 *
 */

class UserModel extends Model {
	
	// model name
	var $name = 'User';
	var $useTable = false;

	var $validate = array(
 			'password' => array('rule' => array('minLength', '8'),	'message' => 'Mimimum 8 characters long'),
 			'email' => 'email'
 		);
 		
	/**
	 * login
	 * @param string $email
	 * @param string $passwd
	 * @return int
	 */
	function login($email, $passwd){
		 
		$this->data = Sanitize::clean($this->data, array('encode' => false));
		$sql = "call gemz.sp_login(?,?)";
		$results = $this->query($sql, array($email,$passwd), $cachequeries = false);
		$res = array_pop($results);
		return $res;
	}
	
	/**
	 * register a user
	 * @param array $params
	 */
	function register($params){
		$params = Sanitize::clean($params, array('encode' => false));
		$sql = "call gemz.sp_register(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$results = $this->_execute($sql, $params, $cachequeries = false);
		$res = array_pop($results);
		return $res;
	}
	
	/**
	 * Sanitise data
	 */
	function cleanParams($params){
		return Sanitize::clean($params, array('encode' => false));
	}
	
}
