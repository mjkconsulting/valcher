<?php
/** addressType struct 
 * @package mobilegates
 */
class AddressType{
	/** @var int $id */
	var $id;
	/** @var string $type */
	var $type;
		
	function __construct($id,$type){
		$this->id = $id;
		$this->type = $type;
	}
}
?>