<?php
class Model_EntityDetails{
	
	private static $_table = NULL;
	
	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_EntityDetails();
		return self::$_table;
	}
	
	public static function addEntityDetails($data,$cat_id,$iec_id){
		return self::getTableInstance()->addEntityDetails($data,$cat_id,$iec_id);
	}
	
	 public static function getIecDetailsByIecId($id){
	 	return self::getTableInstance()->getIecDetailsByIecId($id);
	 }
	 
	 public static function updateEntityDetails($data,$cat_id,$iec_id){
	 	return self::getTableInstance()->updateEntityDetails($data,$cat_id,$iec_id);
	 } 
}