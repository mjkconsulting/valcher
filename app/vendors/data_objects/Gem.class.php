<?php
/** 
 * Gem struct 
 * @package mobilegates
 */
class Gem{
	/** @var int $gem_id */
	var $gem_id;
	/** @var string $title*/
	var $title;
	/** @var string $description*/
	var $description;
	/** @var string $focus_icon*/
	var $focus_icon;
	/** @var string $disable_icon */
	var $disable_icon;
	/** @var float $price */
	var $price;
	/** @var int $priority */
	var $priority;
	/** @var string $created */
	var $created;
	/** @var int $status_id */
	var $status_id;
	/** @var string $content */
	var $content;
	/** @var string $category */
	var $category;
	/** @var string $author */
	var $author;
	/** @var string $purchase_url */
	var $purchase_url;
	/** @var string $service_url */
	var $service_url;
	
	public function __construct($gem_id, $title, $description, $focus_icon, $disable_icon, $price, $priority, $created, $status_id, $content_id, $category_id, $author_id, $purchase_url, $service_url){
		$this->gem_id = $gem_id;
		$this->title = $title;
		$this->description = $description;
		$this->focus_icon = $focus_icon;
		$this->disable_icon = $disable_icon;
		$this->price = $price;
		$this->priority = $priority;
		$this->created = $created;
		$this->status_id = $status_id;
		$this->content = $content_id;
		$this->category = $category_id;
		$this->author = $author_id;
		$this->purchase_url = $purchase_url;
		$this->service_url = $service_url;
	}
}