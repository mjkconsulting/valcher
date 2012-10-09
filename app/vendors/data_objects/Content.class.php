<?php
/** category struct 
 * @package mobilegates
 */
class Content{
	/** @var int $id */
	var $id;
	/** @var string $type */
	var $type;
	/** @var int $status */
	var $status;
	
	function __construct($id,$type,$status){
		$this->id = $id;
		$this->type = $type;
		$this->status = $status;
	}
}
?>