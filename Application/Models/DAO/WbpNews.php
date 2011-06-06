<?php
class Application_Models_DAO_WbpNews
{
	
	public function insert(Application_Models_WbpNews $p_oWbpNews)
	{
		$wbpNewsCatId = Manager_Db::getInstance()->quote($p_oWbpNews->getWbpNewsCategory()->getId());
		$title = Manager_Db::getInstance()->quote($p_oWbpNews->getTitle());
		$text = Manager_Db::getInstance()->quote($p_oWbpNews->getText());
		$created = time();
				
		$sql = 'INSERT INTO wbp_news (wbp_news_category_id, title, text, created) VALUES
			(' . $wbpNewsCatId . ', "' . $title . '", "' . $text . '", ' . $created . ')';
		
		return Manager_Db::getInstance()->insert($sql);
	}
	
	public function update()
	{
		$id = Manager_Db::getInstance()->quote($p_oWbpNews->getId());
		$wbpNewsCatId = Manager_Db::getInstance()->quote($p_oWbpNews->getWbpNewsCategory()->getId());
		$title = Manager_Db::getInstance()->quote($p_oWbpNews->getTitle());
		$text = Manager_Db::getInstance()->quote($p_oWbpNews->getText());
		$modified = time();
		
	}
	
	public function delete($p_iId)
	{
		$p_iId = Manager_Db::getInstance()->quote($p_iId);
		$sql = 'DELETE FROM wbp_news WHERE id = ' . $p_iId . ' LIMIT 1';
		
		return Manager_Db::getInstance()->query($sql);
	}
	
	
	public function fetchRow($where = null)
	{
		$sql = 'SELECT news.*, categories.id cat_id, categories.name FROM wbp_news news INNER JOIN wbp_news_categories categories
		ON news.wbp_news_category_id = categories.id';
		
		
		if (!is_null($where))
		{
			
			$sql .= ' WHERE ' . $where;
		}
		
		$row = Manager_Db::getInstance()->fetchRow($sql);

		$oWbpNewsCat = new Application_Models_WbpNewsCategory();
		$oWbpNewsCat->setId($row->cat_id)
			->setName($row->name);
		
		$oWbpNews = new Application_Models_WbpNews();
		$oWbpNews->populate($row, $oWbpNewsCat);
			
		return $oWbpNews;
	}
	
	public function fetchById($p_iId)
	{
		$p_iId = Manager_Db::getInstance()->quote($p_iId);
		return $this->fetchRow('news.id = ' . $p_iId);	
	}
	
	public function fetchAll($where = null, $order = null, $offset = 0, $count = null)
	{
		$aoWbpNews = array();
		$sql = 'SELECT news.*, categories.id cat_id, categories.name FROM wbp_news news INNER JOIN wbp_news_categories categories
		ON news.wbp_news_category_id = categories.id';
		
		$rows = Manager_Db::getInstance()->fetch($sql);
		foreach ($rows as $row)
		{
			$oWbpNewsCat = new Application_Models_WbpNewsCategory();
			$oWbpNewsCat->setId($row->cat_id)
				->setName($row->name);
			
			$oWbpNews = new Application_Models_WbpNews();
			$oWbpNews->populate($row, $oWbpNewsCat);
			array_push($aoWbpNews, $oWbpNews);
		}
		
		return $aoWbpNews;
	}
	
	
	
}