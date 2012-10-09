<?php
/** category struct 
 * @package mobilegates
 */
class GemCategory{
	/** @var int $category_id */
	var $category_id;
	/** @var string $category_name */
	var $category_name;
	/** @var int $parent_id */
	var $parent_id;
	/** @var int $status_id */
	var $status_id;
	
	function __construct($category_id,$name,$parent,$status){
		$this->category_id = $category_id;
		$this->category_name = $name;
		$this->parent_id = $parent;
		$this->status_id = $status;
	}
}
?>