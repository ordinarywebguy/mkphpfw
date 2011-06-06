<?php
/**
 * 
 * @author mitchelle.pascual
 * $date 05/31/2010
 *
 */
class MVC_Router
{
	const GET_PARAM_KEY = 'q';
	private $_params;
	
	
	public function __construct()
	{
		$this->params();
	}
	
	public function url()
	{
		return @$_GET[self::GET_PARAM_KEY];
	}

	public function params()
	{
		$this->_params = explode('/', $this->url());
		return $this;
	}
	
	public function controller()
	{
		return isset($this->_params[0]) && !empty($this->_params[0]) ? $this->_params[0] : 'Index';
	}

	public function action()
	{
		return isset($this->_params[1]) && !empty($this->_params[1]) ? $this->_params[1] : 'index';
	}
	
	
}