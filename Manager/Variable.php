<?php
/**
 * 
 * 
 * @author mitchelle.pascual
 * $date 05/31/2010
 *
 */
class Manager_Variable
{
	const TYPE_INT = 'int';
	const TYPE_STRING = 'string';
	const TYPE_BOOLEAN = 'boolean';
	const TYPE_HTML =	'html';

	/**
	 * Return variable value according to its type
	 * 
	 * @param mixed $p_mVar
	 * @param string $p_sType
	 * @param mixed $p_mDefaultValue
	 * @return mixed
	 */
	public static function check($p_mVar, $p_sType = self::TYPE_STRING, $p_mDefaultValue = '')
	{
		switch ($p_sType)
		{
			case self::TYPE_INT:
				return (int) self::_setDefaultValue($p_mVar, $p_mDefaultValue);
				break;
				
			case self::TYPE_STRING:
				return (string) strip_tags(self::_setDefaultValue($p_mVar, $p_mDefaultValue));
				break;
								
			case self::TYPE_HTML:
				return (string) self::_setDefaultValue($p_mVar, $p_mDefaultValue);
				break;

			case self::TYPE_BOOLEAN:
				return (boolean) self::_setDefaultValue($p_mVar, $p_mDefaultValue);
				break;				
		}
	}
	
	/**
	 * Set default variable value if empty|null
	 * 
	 * @param mixed $p_mVar
	 * @param mixed $p_mDefaultValue
	 * @return mixed
	 */
	private static function _setDefaultValue($p_mVar, $p_mDefaultValue = '')
	{
		if ($p_mVar == '' || $p_mVar == null)
		{
			return self::stripSlashes($p_mDefaultValue);
		}
		
		return self::stripSlashes($p_mVar);
	}
	
	
	public static function disableMagicQuotes()
    {
        if (get_magic_quotes_gpc()) 
        {
            $_GET = self::stripSlashes($_GET);
            $_POST = self::stripSlashes($_POST);
            $_REQUEST = self::stripSlashes($_REQUEST);
            $_COOKIE = self::stripSlashes($_COOKIE);
        }
    }

    public static function stripSlashes($value)
    {
        if (is_array($value)) 
        {
            $value = array_map(array('Manager_Variable', 'stripSlashes'), $value);
        } 
        else 
        {
            $value = stripslashes(trim($value));
        }
        return $value;
    }  
	
	

	
	
}