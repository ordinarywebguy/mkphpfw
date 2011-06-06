<?php
class Manager_Auth
{
	
	private $_username;
	private $_password;
	
	
	public function setUsername($value)
	{
		$this->username = $value;
		return $this;	
	}
	public function getUsername()
	{
		return $this->username;
	}
	
	public function setPassword($value)
	{
		$this->password = $value;
		return $this;	
	}
	public function getPassword()
	{
		return $this->password;
	}
	
	public function isValid()
	{
		$oUser = new Application_Models_DAO_WbpUsers();		
		$row = $oUser->fetchByUsernameAndPassword($this->getUsername(), $this->getPassword());
		
		if ($row->getId() > 0)
		{
			$_SESSION['auth'] = $row;
			return true;
		}
		
		return false;
	}
	

	public static function clearIdentity()
	{
		unset($_SESSION['auth']);		
	}
	
	
	public static function hasIdentity()
	{
		if (isset($_SESSION['auth']))
		{
			return true;
		}
		
		return false;		
	}
	
	
	
}