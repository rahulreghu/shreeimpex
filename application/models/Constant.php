<?php
class Model_Constant
{
	const ACTION_HELPER_PATH = '/controllers/helpers/';
	
	public static function getActionHelpersPath(){
        return realpath(APPLICATION_PATH . self::ACTION_HELPER_PATH).DIRECTORY_SEPARATOR;
    }
}
?>