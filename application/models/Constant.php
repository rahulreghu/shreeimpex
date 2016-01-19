<?php
class Model_Constant
{
	const ACTION_HELPER_PATH = '/controllers/helpers/';
	
	const USER_STATUS_ACTIVE = "1";
	
	const USER_STATUS_INACTIVE = "2";
	
	const USER_STATUS_DELETE = "0";
	
	const USER_ROLE_USER = "2";
	
	const USER_ROLE_ADMIN = "1";
	
	public static function getActionHelpersPath(){
        return realpath(APPLICATION_PATH . self::ACTION_HELPER_PATH).DIRECTORY_SEPARATOR;
    }
}
?>