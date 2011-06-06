<?php
/**
 * 
 * @author mitchelle.pascual
 * $date 05/31/2010
 *
 */
class Application_Controllers_BaseController
{
	
	public function init()
	{
		
		if (Manager_Auth::hasIdentity() === false)
		{			
			header('Location: /auth');
			exit;	
		}
		
	}
}