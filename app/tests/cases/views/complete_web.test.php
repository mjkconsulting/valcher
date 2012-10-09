<?php

class CompleteWebTestCase extends CakeWebTestCase {

	var $data = array("data[Gemz][username]" => "gemuser",
					  "data[Gemz][fname]" => "jermey",
					  "data[Gemz][lname]" => "last",
					  "data[Gemz][email]" => "email@mobilegates.com",
					  "data[Gemz][address_type]" => "1",
					  "data[Gemz][address]" => "30 main st",
					  "data[Gemz][city]" => "Brooklyn",
					  "data[Gemz][state]" => "NY",
					  "data[Gemz][cell]" => "303-343-9454",
					  "data[Gemz][zipcode]" => "91403",
					  "data[Gemz][passwd]" => "pass1",
					  "data[Gemz][user_type]" => "1",
					  "data[Gemz][device_id]" => "1000",
					  "data[Gemz][lng]" => "34.5005",
					  "data[Gemz][lat]" => "45.0304",
					  "data[Gemz][gemz]" => "3,4|1,20|5,6",
					  "data[Gemz][delim]" => "|"
					  );
	
	function CompleteWebTestCase(){
		$this->baseurl = current(split("webroot", $_SERVER['PHP_SELF']));
		$this->post($this->baseurl."/gemz/register", $data);
	}
}