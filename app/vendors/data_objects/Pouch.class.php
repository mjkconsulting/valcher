<?php
/** pouch struct 
 * @package mobilegates
 */
class Pouch{
	/** @var int $user_id */
	var $user_id;
	/** @var string $name */
	var $name;
	/** @var float $price */
	var $price;
	/** @var int $status */
	var $status;
	/** @var int $priority */
	var $priority;
	/** @var int $parent */
	var $parent;
	
	function __construct($user_id,$name,$price,$status,$priority,$parent){
		$this->user_id = $user_id;
		$this->name = $name;
		$this->price = $price;
		$this->status = $status;
		$this->priority = $priority;
		$this->parent = $parent;
	}
}
?>