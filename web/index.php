<?php
/**
 * 
 * @author mitchelle.pascual
 * $date 05/31/2010
 *
 */
session_start();
/** paths **/
define('APPLICATION_PATH', dirname(dirname(__FILE__)) . '/Application');
define('CONTROLLER_PATH', APPLICATION_PATH . '/Controllers');
define('MODEL_PATH', APPLICATION_PATH . '/Models');
define('VIEW_PATH', APPLICATION_PATH . '/Views');
define('MVC_PATH', dirname(APPLICATION_PATH) . '/MVC');

function __autoload($p_ClassName) 
{
	$p_ClassName = str_replace('_', '/', $p_ClassName);	
	if (is_file(dirname(APPLICATION_PATH) . '/' . $p_ClassName . '.php'))
	{
	    require_once dirname(APPLICATION_PATH) . '/' . $p_ClassName . '.php';
	}	
}

require_once MVC_PATH . '/Dispatcher.php';
require_once MVC_PATH . '/Router.php';
$router = new MVC_Router();
$dispatcher = new MVC_Dispatcher();
$dispatcher->setController($router->controller())
	->setAction($router->action())
	->dispatch();