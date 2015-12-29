<?php
class Model_Users{
       
    private static $_table = NULL;
    
    public static function getTableInstance(){
    	if (!self::$_table) self::$_table = new Model_Table_Users();
    	return self::$_table;
    }
    
    public static function getByUserName($username){
    	return self::getTableInstance()->getByUserName($username);	
    }
    
}