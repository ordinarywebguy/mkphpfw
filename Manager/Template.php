<?php
/**
 * 
 * @author mitchelle.pascual
 * $date 05/31/2010
 *
 */
class Manager_Template
{
	
	
	public static function parse($template, $p_aVars = array())
	{
		include_once VIEW_PATH . '/MainLayoutHeader.tpl.phtml';
		if (is_file(VIEW_PATH . '/' . $template . '.tpl.phtml'))
		{
			$p_aVars = extract($p_aVars);
			include_once VIEW_PATH . '/' . $template . '.tpl.phtml';
		}
		else
		{
			throw new Exception(VIEW_PATH . '/' . $template . '.tpl.phtml doesn\'t exists.');
		}	
		include_once VIEW_PATH . '/MainLayoutFooter.tpl.phtml';
	}
	
}