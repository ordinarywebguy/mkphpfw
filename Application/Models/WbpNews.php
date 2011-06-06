<?php
/**
 * 
 * @author mitchelle.pascual
 * $date 05/31/2010
 *
 */
class Application_Models_WbpNews extends Application_Models_Abstract
{
	
	private $m_oWbpNewsCategory = null;
	private $m_sTitle = '';
	private $m_sText = '';
	
	public function setWbpNewsCategory(Application_Models_WbpNewsCategory $value)
	{
		$this->m_oWbpNewsCategory = $value;
		return $this;	
	}
	public function getWbpNewsCategory()
	{
		return $this->m_oWbpNewsCategory;
	}
	
	public function setTitle($value)
	{
		$this->m_sTitle = $value;
		return $this;	
	}
	public function getTitle()
	{
		return $this->m_sTitle;
	}
	
	public function setText($value)
	{
		$this->m_sText = $value;
		return $this;	
	}
	public function getText()
	{
		return $this->m_sText;
	}	
	
	
	public function populate($p_oRow, $p_oWbpNewsCategory)
	{
		$this->setId($p_oRow->id)
			->setWbpNewsCategory($p_oWbpNewsCategory)
			->setTitle($p_oRow->title)
			->setText($p_oRow->text)
			->setCreated($p_oRow->created)
			->setModified($p_oRow->modified)			
			;
		return $this;
	}
	
}