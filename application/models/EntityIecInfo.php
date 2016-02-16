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
	
	public static function getAllSavedEntities(){
		return self::getTableInstance()->getAllSavedEntities();
	}
	
	public static function updateImageInIecForm($id,$target_filename){
		return self::getTableInstance()->updateImageInIecForm($id,$target_filename);
	}
	
	public static function getEntityInfobyId($id){
		return self::getTableInstance()->getEntityInfobyId($id);
	}
	
	public static function updateIecNumber($id,$iec_no){
		return self::getTableInstance()->updateIecNumber($id,$iec_no);
	}
}