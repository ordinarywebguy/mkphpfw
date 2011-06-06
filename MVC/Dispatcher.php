<?php
/**
 * 
 * @author mitchelle.pascual
 * $date 05/31/2010
 *
 */
class MVC_Dispatcher 
{
	
	private $_controller = 'Index';
	private $_action = 'index';
	
	public function setController($p_sController)
	{
		$this->_controller = $p_sController;
		return $this;
	}
	
	public function setAction($p_sAction)
	{
		$this->_action = $p_sAction;
		return $this;
	}
	
	public function getController()
	{
		return $this->_controller;
	}
	
	public function getAction()
	{
		return $this->_action;
	}
	
	
	private function controllerPath()
	{
		return CONTROLLER_PATH . '/' . $this->getController() . 'Controller.php';
	}
	
	public function dispatch()
	{
		if (is_file($this->controllerPath()))
		{
			require_once $this->controllerPath();
			
			$sController = 'Application_Controllers_' . $this->getController() . 'Controller';
			$oController = new $sController;
			$sAction = $this->getAction() . 'Action';
			
			if (method_exists($sController, $sAction))
			{
				$oController->init();
				$oController->$sAction();
			}
			else
			{
				$this->redirect503('Invalid Controller::Action', 'The controller::action "' . $this->getController() . ':' .$this->getAction(). '" doesn\'t exist.');
			}
		}
		else
		{
			$this->redirect503('Invalid Controller', 'The controller "' . $this->getController(). '" doesn\'t exist.');
		}
	}
	
	private function redirect503($p_sTitle = '', $p_sMessage = '')
	{
		header('HTTP/1.0 503 Not Found');
		echo '<h1>' . $p_sTitle . '</h1>';
		echo $p_sMessage;
		exit;
	}
	
	
}