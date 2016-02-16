<?php
class Model_EntityDetails{
	
	private static $_table = NULL;
	
	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_EntityDetails();
		return self::$_table;
	}
	
	public static function addEntityDetails($data,$cat_id,$id){
		return self::getTableInstance()->addEntityDetails($data,$cat_id,$id);
	}
	
	 public static function getBranchDetailsByIecId($id){
	 	return self::getTableInstance()->getBranchDetailsByIecId($id);
	 }
	 
}