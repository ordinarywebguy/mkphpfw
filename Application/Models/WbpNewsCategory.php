<?php
/**
 * 
 * @author mitchelle.pascual
 * $date 05/31/2010
 *
 */
class Application_Models_WbpNewsCategory extends Application_Models_Abstract
{
	
	private $m_sName = '';
	
	public function setName($value)
	{
		$this->m_sName = $value;
		return $this;	
	}
	public function getName()
	{
		return $this->m_sName;
	}
	
	public function populate($p_oRow)
	{
		$this->setId($p_oRow->id)
			->setName($p_oRow->name)
			->setCreated($p_oRow->created)
			->setModified($p_oRow->modified)			
			;
		return $this;
	}
	
}