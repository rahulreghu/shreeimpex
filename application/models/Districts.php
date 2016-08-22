<?php
class Model_Districts{

	private static $_table = NULL;

	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_Districts();
		return self::$_table;
	}

	public static function getByStateId($id){
		return self::getTableInstance()->getByStateId($id);
	}
	
	public static function getById($id){
		return self::getTableInstance()->getById($id);
	}

}