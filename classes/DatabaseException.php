<?php

/**
 * @package mobilegates
 * @author Oren Shepes - 1/10
 */

class DatabaseException extends Exception {
	
	private $err = '';
	
	/**
	 * getMessage
	 * formats exception message with stack trace and more information
	 * about the error.
	 * @return string
	 */
	function getMessage(){
		$err = sprintf("%s::%s::%s", self::getMessage(), self::getLine(), self::getTraceAsString());
		return $err;
	}
}