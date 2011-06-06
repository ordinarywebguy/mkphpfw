<?php
/**
 * 
 * @author mitchelle.pascual
 * $date 05/31/2010
 *
 */
class Application_Models_WbpUser extends Application_Models_Abstract
{
	
	private $m_sUsername = '';
	private $m_sPassword = '';
	
	public function setUsername($value)
	{
		$this->m_sUsername = $value;
		return $this;	
	}
	public function getUsername()
	{
		return $this->m_sUsername;
	}
	
	public function setPassword($value)
	{
		$this->m_sPassword = $value;
		return $this;	
	}
	public function getPassword()
	{
		return $this->m_sPassword;
	}
	
	public function populate($p_oRow)
	{
		$this->setId($p_oRow->id)
			->setUsername($p_oRow->username)
			->setPassword($p_oRow->password)
			->setCreated($p_oRow->created)
			->setModified($p_oRow->modified)			
			;
		return $this;
	}
	
}