<?php
class Application_Models_DAO_WbpNewsCategories
{
	
	public function insert(Application_Models_WbpNewsCategory $p_oWbpNewsCategory)
	{

	}
	
	public function update()
	{
		
	}
	
	public function delete()
	{
		
	}
	
	
	public function fetchRow()
	{
		
	}
	
	public function fetchAll($where = null, $order = null, $offset = 0, $count = null)
	{
		$aoWbpNewsCategories = array();
		$sql = 'SELECT * FROM wbp_news_categories';
		
		$rows = Manager_Db::getInstance()->fetch($sql);
		foreach ($rows as $row)
		{
			$oWbpNewsCat = new Application_Models_WbpNewsCategory();
			$oWbpNewsCat->populate($row);

			array_push($aoWbpNewsCategories, $oWbpNewsCat);
		}
		
		return $aoWbpNewsCategories;
	}
	
	
	
}