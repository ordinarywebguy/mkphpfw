<?php
class Application_Models_DAO_WbpUsers
{
	
	public function insert()
	{

	}
	
	public function update()
	{
		
	}
	
	public function delete()
	{
		
	}
	
	
	public function fetchRow($where = null)
	{
		$sql = 'SELECT * FROM wbp_users';
		if (!is_null($where))
		{			
			$sql .= ' WHERE ' . $where;
		}
		
		$row = Manager_Db::getInstance()->fetchRow($sql);
		$oWbpUser = new Application_Models_WbpUser();
		$oWbpUser->populate($row);
			
		return $oWbpUser;
	}
	
	public function fetchByUsernameAndPassword($username, $password)
	{
		$username = Manager_Db::getInstance()->quote($username);
		$password = Manager_Db::getInstance()->quote($password);
		$password = sha1($password);
		
		return $this->fetchRow('username = "' .$username . '" AND password = "' . $password . '"');
	}
	
	
	
}