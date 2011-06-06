<?php
/**
 * 
 * @author mitchelle.pascual
 * $date 05/31/2010
 *
 */
class Application_Controllers_AuthController
{
	
	public function init()
	{	
	}
	
	
	public function indexAction()
	{
		
		Manager_Template::parse('auth/form');
	}
	
	
	
	public function processAction()
	{
		$error = false;
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			
			if (empty($_POST['username']))
			{
				$_SESSION['formErrors'][] = 'Username is required.';
				$error = true;
			}
			
			if (empty($_POST['password']))
			{
				$_SESSION['formErrors'][] = 'Password is required.';
				$error = true;
			}
			
			if ($error == false)
			{
				$username = Manager_Variable::check($_POST['username']);
				$password = Manager_Variable::check($_POST['password']);
				
				$auth = new Manager_Auth();
				$auth->setUsername($username)->setPassword($password);
				
				if ($auth->isValid())
				{
					
					header('Location: /index/');
					exit;
				}
				else
				{
					$_SESSION['formErrors'][] = 'Invalid username or password.';
					header('Location: /auth');
					exit;
				}
			} 
			else 
			{
				header('Location: /auth');
				exit;	
			}			
		}	
	}
	
	
	
	public function logoutAction()
	{
		Manager_Auth::clearIdentity();
		header('Location: /auth');
		exit;
	}
	
	
}