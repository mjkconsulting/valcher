<?php
/**
 * user login struct
 * @package mobilegates
 */
class UserLogin{
	/** @var int */
	var $user_id;
	/** @var string */
	var $status;
	/** @var string[] */
	var $errors;
	
	function __construct($user_id,$status,$errors){
		$this->user_id = $user_id;
		$this->status = $status;
		$this->errors = $errors;
	}
}
?>