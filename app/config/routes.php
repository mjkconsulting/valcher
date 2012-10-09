<?php
/* SVN FILE: $Id$ */
/**
 * Short description for file.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       mobilegates
 * @subpackage    mobilegates.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * parse extensions
 */
Router::parseExtensions();
//Router::mapResources('service');

/**
 * API routes
 */

// default
Router::connect('/', array('controller' => 'valcher', 'action' => 'index'));
// login
Router::connect('/valcher/login', array('controller' => 'gmez', 'action' => 'login'));
// wsdl
Router::connect('/service/wsdl', array('controller' => 'service', 'action' => 'wsdl'));
// call
Router::connect('/service/call', array('controller' => 'service', 'action' => 'call'));
// multi
Router::connect('/valcher/multi', array('controller' => 'service', 'action' => 'multi'));
// register
Router::connect('/valcher/register-gem', array('controller' => 'valcher', 'action' => 'register_gem'));
// register user
Router::connect('/valcher/register', array('controller' => 'valcher', 'action' => 'register'));
// get pouches
Router::connect('/valcher/getPouches', array('controller' => 'valcher', 'action' => 'getPouches'));
// get valcher in pouches
Router::connect('/valcher/getPouchvalcher/*', array('controller' => 'valcher', 'action' => 'getPouchvalcher'));
// radiotime
Router::connect('/valcher/radiotime', array('controller' => 'valcher', 'action' => 'radiotime'));

/* map REST routes
Router::connect("/:controller/:email/:passwd/:output/",
	array("action" => "login", "[method]" => "PUT"),
	array("email" => "^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$"), 
	array("passwd" => "[\.]{5,9}"), 
	array("output" => "[\.]+")
);
*/

?>
