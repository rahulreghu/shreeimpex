<?php
class Model_EpcgGoodsSector{

	private static $_table = NULL;

	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_EpcgGoodsSector();
		return self::$_table;
	}

	public static function getAllGoodsSector(){
		return self::getTableInstance()->getAllGoodsSector();
	}
	
	public static function getById($id){
		return self::getTableInstance()->getById($id);
	}

}