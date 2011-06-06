<?php
/**
 * 
 * @author mitchelle.pascual
 * $date 05/31/2010
 *
 */
class Application_Controllers_IndexController extends Application_Controllers_BaseController
{
	
	public function indexAction()
	{
		
		$oWbpNewsDao = new Application_Models_DAO_WbpNews();
		$aoNews = $oWbpNewsDao->fetchAll();

		Manager_Template::parse('index/index', array(
				'aoNews' => $aoNews,
			)
		);
	}
	
	public function formAction()
	{
		$oWbpNewsCatDao = new Application_Models_DAO_WbpNewsCategories();
		$aoNewsCategories = $oWbpNewsCatDao->fetchAll();
		
		if ($id = intval($_GET['id']))
		{
			$oWbpNewsDao = new Application_Models_DAO_WbpNews();
			$oNews = $oWbpNewsDao->fetchById($id);
		}
		else
		{
			$oNewsCat = new Application_Models_WbpNewsCategory();
			$oNews = new Application_Models_WbpNews();
			$oNews->setWbpNewsCategory($oNewsCat);
			
		}
		Manager_Template::parse('index/form', array('aoNewsCategories' => $aoNewsCategories, 'oNews' => $oNews));
	}

	
	public function showAction()
	{
		if ($id = intval($_GET['id']))
		{
			$oWbpNewsDao = new Application_Models_DAO_WbpNews();
			$oNews = $oWbpNewsDao->fetchById($id);
			
			
			Manager_Template::parse('index/show', array('oNews' => $oNews));
		}
		
		
	}
	
	public function saveAction()
	{
		$error = false;
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			
			if (empty($_POST['category']))
			{
				$_SESSION['formErrors'][] = 'Category is required.';
				$error = true;
			}
			
			if (empty($_POST['title']))
			{
				$_SESSION['formErrors'][] = 'Title is required.';
				$error = true;
			}
			
			if (empty($_POST['text']))
			{
				$_SESSION['formErrors'][] = 'Text is required.';
				$error = true;
			}
			
			if ($error == false)
			{
			
				$oWbpNews = self::_formToModel();
				try 
				{
					$oWbpNewsDao = new Application_Models_DAO_WbpNews();
					$oWbpNewsDao->insert($oWbpNews);		
				} 
				catch (Exception $e)
				{
				}
				header('Location: /index/');
				exit;
			} 
			else 
			{
				header('Location: /index/form');
				exit;	
			}			
		}	
	}
	
	private function _formToModel()
	{
		$row = new stdClass();
		$row->wbp_news_category_id = Manager_Variable::check($_POST['category'], Manager_Variable::TYPE_INT, 0);
		$row->title = Manager_Variable::check($_POST['title']);
		$row->text = Manager_Variable::check($_POST['text']);		
		
		$oWbpNewsCat = new Application_Models_WbpNewsCategory();
		$oWbpNewsCat->setId($row->wbp_news_category_id);
			
		$oWbpNews = new Application_Models_WbpNews();
		$oWbpNews->populate($row, $oWbpNewsCat);
		
		return $oWbpNews;
	}
	
	
	public function deleteAction()
	{
		
		if ($id = intval($_GET['id']))
		{
			
			try 
			{
				$oWbpNewsDao = new Application_Models_DAO_WbpNews();
				$oWbpNewsDao->delete($id);		
			} 
			catch (Exception $e)
			{
			}
			header('Location: /index/');
			exit;
			
			
		}
	}
}