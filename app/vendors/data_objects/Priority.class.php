<?php
/** Priority struct 
 * @package mobilegates
 */
class Priority{
	/** @var int $id */
	var $id;
	/** @var string $title */
	var $title;
	/** @var int $factor */
	var $factor;
	/** @var int $status */
	var $status;
		
	function __construct($id,$title,$factor,$status){
		$this->id = $id;
		$this->title = $title;
		$this->factor = $factor;
		$this->status = $status;
	}
}
?>