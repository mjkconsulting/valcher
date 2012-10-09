<?php
/**
 *
 * @package       mobilegates
 * @subpackage    mobilegates.cake.libs.controller
 */

/**
 * imports libs
 */
error_reporting('~E_WARNING'); 
ini_set('display_errors', 'Off');
 
class ImageController extends AppController
{
	/** @var string $name */
    public $name = 'Image';
    
    /** @var array $helpers */
    public $components = array('Image');
    
    public $helpers = array('Smarty');
    
    /** @var array $uses */
    public $uses = array();
    
    public $dbTable = false;
    /**
     * resize - resizes an image
     * @para string $src
     * @param int $w
     * @param int $h
     */
	function resize(){
		$src = $this->params['url']['src'];
		$w = $this->params['url']['w'];
		$h = $this->params['url']['h'];
		$this->autoLayout = false;
        $this->autoRender = false;
        
		$fullpath = RADIO;
		$cachefile = RADIO.$w.'x'.$h.'/'.basename($src);
		
		if(@file_exists($cachefile)) {
			$this->Image->resize($cachefile, $w, $h);
		}else{
			$this->save_image($src, $cachefile);
			$this->Image->resize($cachefile, $w, $h);
		}
	}
	
	/**
	 * saves an image from a URL
	 *
	 * @param string $img the image URL to save
	 * @return void
	 */
	function save_image($img, $fullpath){
		$ch = curl_init($img);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
		$rawdata = @curl_exec($ch);
		
		curl_close ($ch);
		if(file_exists($fullpath)){
			@unlink($fullpath);
		}
		
		$fp = fopen($fullpath,'x');
		fwrite($fp, $rawdata);
		fclose($fp);
	}
	
    /**
     * fixes malformed XML
     *
     */
    function afterFilter()
    {
    	if (Configure::read('debug') > 1){
    		Configure::write('debug', 0);
    	}
    }
    
    function beforeFilter()
    {
    	if (Configure::read('debug') > 1){
    		Configure::write('debug', 0);
    	}
    }
}
?>