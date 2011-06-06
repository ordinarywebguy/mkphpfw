<?php
/**
 * 
 * @author mitchelle.pascual
 * $date 05/31/2010
 *
 */
class Application_Configs_Db
{
	
	private static $_host = 'localhost';
	private static $_dbname = 'wbp';
	private static $_username = 'root';
	private static $_password = '';
	
	public static function host()
	{
		return self::$_host;
	}
	
	public static function dbname()
	{
		return self::$_dbname;
	}
	
	public static function username()
	{
		return self::$_username;
	}
	
	public static function password()
	{
		return self::$_password;
	}
}