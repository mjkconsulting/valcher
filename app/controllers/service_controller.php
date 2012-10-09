<?php
/**
 *
 * @package       mobilegates
 * @subpackage    mobilegates.cake.libs.controller
 */

/**
 * imports libs
 */
App::import('Vendor','nusoap');

/**
 * Constants
 */
define('ERR_BAD_ARGS', 'Wrong number of arguments');
define('DEFAULT_VIEW', 'xml');

 
class ServiceController extends AppController
{
	/** @var string $name */
    public $name = 'Service';
    
    /** @var array $uses */
    public $uses = array('ApiService');
    
    /** @var array $helpers */
    public $helpers = array('Xml');
    
    /** @var array $components */
    public $components = array('Soap');

    /**
     * Handle SOAP calls
     */
    function call($model)
    {
        $this->autoRender = FALSE;
        $this->Soap->handle($model, 'wsdl');
    }

    /**
     * Provide WSDL for a model
     */
    function wsdl($model)
    {
        $this->autoRender = false;
        header('Content-Type: text/xml; charset=UTF-8'); 
        echo $this->Soap->getWSDL($model, 'call');
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
}
?>