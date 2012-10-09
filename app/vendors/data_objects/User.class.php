<?php
/**
 * Register struct
 * @package mobilegates
 */
class User{
	/** @var int $user_id */
	var $user_id;
	/** @var string $username */
	var $username;
	/** @var string $fname */
	var $fname;
	/** @var string $lname */
	var $lname;
	/** @var string $email */
	var $email;
	/** @var string $phone */
	var $phone;
	/** @var string $address */
	var $address;
	/** @var string $city */
	var $city;
	/** @var string $state */
	var $state;
	/** @var string $country */
	var $country;
	/** @var string $cell */
	var $cell;
	/** @var string $zipcode */
	var $zipcode;
	/** @var int $user_type */
	var $user_type;

	
	function __construct($user_id, $username, $fname, $lname, $email, $phone, $address, $city, $state, $country, $zipcode, $cell, $user_type){
		$this->user_id = $user_id;
		$this->username = $username;
		$this->fname = $fname;
		$this->lname = $lname;
		$this->email = $email;
		$this->phone = $phone;
		$this->address = $address;
		$this->city = $city;
		$this->state = $state;
		$this->country = $country;
		$this->zipcode = $zipcode;
		$this->cell = $cell;
		$this->user_type = $user_type;
	}
}
?>