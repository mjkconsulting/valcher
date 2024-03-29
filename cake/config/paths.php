<?php

/**
 * If the index.php file is used instead of an .htaccess file
 * or if the user can not set the web root to use the public
 * directory we will define ROOT there, otherwise we set it
 * here.
 */
	if (!defined('ROOT')) {
		define('ROOT', '../');
	}
	if (!defined('WEBROOT_DIR')) {
		define('WEBROOT_DIR', 'webroot');
	}
/**
 * Path to the cake directory.
 */
	define('CAKE', CORE_PATH.'cake'.DS);
/**
 * Path to the application's directory.
 */
if (!defined('APP')) {
	define('APP', ROOT.DS.APP_DIR.DS);
}
/**
 * Path to the application's models directory.
 */
	define('MODELS', APP.'models'.DS);
/**
 * Path to model behaviors directory.
 */
	define('BEHAVIORS', MODELS.'behaviors'.DS);
/**
 * Path to the application's controllers directory.
 */
	define('CONTROLLERS', APP.'controllers'.DS);
/**
 * Path to the application's components directory.
 */
	define('COMPONENTS', CONTROLLERS.'components'.DS);
/**
 * Path to the application's views directory.
 */
	define('VIEWS', APP.'views'.DS);
/**
 * Path to the application's helpers directory.
 */
	define('HELPERS', VIEWS.'helpers'.DS);
/**
 * Path to the application's view's layouts directory.
 */
	define('LAYOUTS', VIEWS.'layouts'.DS);
/**
 * Path to the application's view's elements directory.
 * It's supposed to hold pieces of PHP/HTML that are used on multiple pages
 * and are not linked to a particular layout (like polls, footers and so on).
 */
	define('ELEMENTS', VIEWS.'elements'.DS);
/**
 * Path to the configuration files directory.
 */
if (!defined('CONFIGS')) {
	define('CONFIGS', APP.'config'.DS);
}
/**
 * Path to the libs directory.
 */
	define('INFLECTIONS', CAKE.'config'.DS.'inflections'.DS);
/**
 * Path to the libs directory.
 */
	define('LIBS', CAKE.'libs'.DS);
/**
 * Path to the public CSS directory.
 */
	define('CSS', WWW_ROOT.'css'.DS);
/**
 * Path to the public JavaScript directory.
 */
	define('JS', WWW_ROOT.'js'.DS);
/**
 * Path to the public images directory.
 */
	define('IMAGES', WWW_ROOT.'img'.DS);
/**
 * Path to the console libs direcotry.
 */
	define('CONSOLE_LIBS', CAKE.'console'.DS.'libs'.DS);
/**
 * Path to the tests directory.
 */
if (!defined('TESTS')) {
	define('TESTS', APP.'tests'.DS);
}
/**
 * Path to the core tests directory.
 */
if (!defined('CAKE_TESTS')) {
	define('CAKE_TESTS', CAKE.'tests'.DS);
}
/**
 * Path to the test suite.
 */
	define('CAKE_TESTS_LIB', CAKE_TESTS.'lib'.DS);

/**
 * Path to the controller test directory.
 */
	define('CONTROLLER_TESTS', TESTS.'cases'.DS.'controllers'.DS);
/**
 * Path to the components test directory.
 */
	define('COMPONENT_TESTS', TESTS.'cases'.DS.'components'.DS);
/**
 * Path to the helpers test directory.
 */
	define('HELPER_TESTS', TESTS.'cases'.DS.'views'.DS.'helpers'.DS);
/**
 * Path to the models' test directory.
 */
	define('MODEL_TESTS', TESTS.'cases'.DS.'models'.DS);
/**
 * Path to the lib test directory.
 */
	define('LIB_TESTS', CAKE_TESTS.'cases'.DS.'lib'.DS);
/**
 * Path to the temporary files directory.
 */
if (!defined('TMP')) {
	define('TMP', APP.'tmp'.DS);
}
/**
 * Web path to the public images directory.
 */
if (!defined('IMAGES_URL')) {
	define('IMAGES_URL', 'images/');
}
/**
 * RadioTime image directory
 */
if (!defined('RADIO')) {
	define('RADIO', WWW_ROOT.IMAGES_URL.'radiotime'.DS);
}
/**
 * Path to the logs directory.
 */
	define('LOGS', TMP.'logs'.DS);
/**
 * Path to the cache files directory. It can be shared between hosts in a multi-server setup.
 */
	define('CACHE', TMP.'cache'.DS);
/**
 * Path to the vendors directory.
 */
if (!defined('VENDORS')) {
	define('VENDORS', CAKE_CORE_INCLUDE_PATH.DS.'vendors'.DS);
}
/**
 * Path to the Pear directory
 * The purporse is to make it easy porting Pear libs into Cake
 * without setting the include_path PHP variable.
 */
	define('PEAR', VENDORS.'Pear'.DS);
/**
 *  Full url prefix
 */
if (!defined('FULL_BASE_URL')) {
	$s = null;
	if (env('HTTPS')) {
		$s ='s';
	}

	$httpHost = env('HTTP_HOST');

	if (isset($httpHost)) {
		define('FULL_BASE_URL', 'http'.$s.'://'.$httpHost);
	}
	unset($httpHost, $s);
}

/**
 * Web path to the CSS files directory.
 */
if (!defined('CSS_URL')) {
	define('CSS_URL', 'css/');
}
/**
 * Web path to the js files directory.
 */
if (!defined('JS_URL')) {
	define('JS_URL', 'js/');
}
/**
 * Path to thumbnail 50x50
 
if(!define('THUMB')){
	define('THUMB', IMAGES_URL.DS.'radiotime/50x50');
}
*/
?>