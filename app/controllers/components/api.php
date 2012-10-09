<?php 
/**
 * API component
 * Oren Shepes - 01/10 
 * @package mobilegates
 */

App::import('Vendor', 'IPReflectionClass', array('file' => 'wshelper' . DS . 'lib' . DS . 'soap' . DS . 'IPReflectionClass.class.php'));


/**
 * Class ApiComponent
 * handles model for API
 */
class ApiComponent extends Component
{
	var $params = array();

	function initialize(&$controller)
	{
		$this->params = $controller->params;
	}
	
	/**
	 * Get model class for specified model id
	 *
	 * @access private
	 * @return string : the model id
	 */
	function __getModelClass($modelId)
	{
		$inflector = new Inflector;
		return ($inflector->camelize($modelId) . 'Tools');
	}

	/**
	 * Get model id for specified model class
	 *
	 * @access private
	 * @return string : the model id
	 */
	function __getModelId($modelClass)
	{
		$inflector = new Inflector;
		return $inflector->underscore(substr($class, 0, -7));
	}

	/**
	 * Get model file for specified model id
	 *
	 * @access private
	 * @return string : the filename
	 */
	function __getModelFile($modelId)
	{
		$modelDir = dirname(dirname(dirname(__FILE__))) . DS . 'models';
		return $modelDir . DS . $modelId . '_tools.php';
	}
}
?>