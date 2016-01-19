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
    
    public static function getByEmail($email){
    	return self::getTableInstance()->getByEmail($email);
    }
    
    public static function getAllUsers(){
    	return self::getTableInstance()->getAllUsers();
    }
    
    public static function disableUser($user_id){
    	return self::getTableInstance()->disableUser($user_id);
    }
    
    public static function enableUser($user_id){
    	return self::getTableInstance()->enableUser($user_id);
    }
    
    public static function deleteUser($user_id){
    	return self::getTableInstance()->deleteUser($user_id);
    }
    
    public static function getByUserId($user_id){
    	return self::getTableInstance()->getByUserId($user_id);
    }
    
    public static function addUser($request){
    	return self::getTableInstance()->addUser($request);
    }
}