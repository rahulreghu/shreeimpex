<?php
class Model_EntityIecinfo{
	private static $_table = NULL;
	
	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_EntityIecInfo();
		return self::$_table;
	}
	
	public static function getAllEntities(){
		return self::getTableInstance()->getAllEntities();
	}
	
	public static function addIecForm($data){
		return self::getTableInstance()->addIecForm($data);
	}
	
	public static function changeStatus($id,$statusId){
		return self::getTableInstance()->changeStatus($id,$statusId);
	}
}