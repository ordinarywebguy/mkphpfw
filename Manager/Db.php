<?php
/**
 * 
 * @author mitchelle.pascual
 * $date 05/31/2010
 *
 */
class Manager_Db
{
	
	private static $_self = null;
	private $_resourceDb = null;
	
	
	public function __construct()
	{
		$this->connect();
	}
	
	public static function getInstance()
	{
		
		if (is_null(self::$_self))
		{
			self::$_self = new self();
		}
		return self::$_self;
	}
	
	
	public function connect()
	{
		$host = Application_Configs_Db::host();
		$dbname = Application_Configs_Db::dbname();
		$username = Application_Configs_Db::username();
		$password = Application_Configs_Db::password();
		
		$this->_resourceDb = mysql_connect($host, $username, $password);
		
		if (!$this->_resourceDb)
		{
			throw new Exception('Invalid database crendentials.');
		}
		
		mysql_select_db($dbname, $this->_resourceDb);
	}
	
	public function query($p_sSql)
	{
        $query = mysql_query($p_sSql);        
        if (!$query)
        {
        	throw new Exception($p_sSql . ' : ' . mysql_error());	
        }
        
        return $query;
	}
	
	public function quote($p_mVar) 
	{
        if (get_magic_quotes_gpc()) 
            $p_mVar = stripslashes(trim($p_mVar));

        if (!is_numeric($p_mVar)) 
            $p_mVar = mysql_real_escape_string($p_mVar);
		else
		{
			 $p_mVar = intval($p_mVar);
		}
            
        return $p_mVar;
    } 
	
    public function fetch($p_sSql) 
    {
    	$aRows = array();
    	$query = $this->query($p_sSql);
    	 
    	if (count($query) > 0) {
    		while ($row = mysql_fetch_object($query)) 
    		{
    			$aRows[] = $row;
    		} 
    	} 
    	return $aRows;
    } 

    public function fetchRow($p_sSql) 
   	{
    	$oRow = array();
    	$query = $this->query($p_sSql);
    	 
    	if (count($query) > 0) 
    	{
    		$oRow = mysql_fetch_object($query) ;
    	} 
    	return $oRow;
    } 
	
	
    public function insert($p_sSql)
    {
    	$this->query($p_sSql);
    	return mysql_insert_id();
    }
    
    
}