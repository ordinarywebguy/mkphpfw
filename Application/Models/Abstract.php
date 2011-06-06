<?php
/**
 * 
 * @author mitchelle.pascual
 * $date 05/31/2010
 *
 */
class Application_Models_Abstract
{
	
	private $m_iId = -1;
	private $m_iCreated = 0;
	private $m_iModified = 0;
	
	public function setId($value)
	{
		$this->m_iId = $value;
		return $this;	
	}
	public function getId()
	{
		return $this->m_iId;
	}
	
	public function setCreated($value)
	{
		$this->m_iCreated = $value;
		return $this;	
	}
	public function getCreated()
	{
		return $this->m_iCreated;
	}
	
	public function setModified($value)
	{
		$this->m_iModified = $value;
		return $this;	
	}
	public function getModified()
	{
		return $this->m_iModified;
	}	
}