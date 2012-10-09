<?php
/** RadioTime Options struct 
 * @package mobilegates
 */
class Options{
	/** @var string $c */
	var $c;
	/** @var string $lonlat*/
	var $lonlat;
	/** @var string $country */
	var $country;
	/** @var string $formats */
	var $formats;
	/** @var string $filter */
	var $filter;
	/** @var string $detail */
	var $detail;
	
	public function __construct($c, $lonlat='', $country='', $formats='', $filter='', $detail=''){
		$this->c = $c;
		$this->lonlat = $lonlat;
		$this->country = $country;
		$this->formats = $formats;
		$this->filter = $filter;
		$this->detail = $detail;
	}
	
	public function toArray(){
		return array('c' => $this->c, 
					 'lonlat' => $this->lonlat,
					 'country' => $this->country,
					 'formats' => $this->formats,
					 'filter' => $this->filter,
					 'detail' => $this->detail );
	}
}
?>