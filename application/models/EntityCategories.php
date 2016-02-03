<?php
class Model_EntityCategories{
	private static $_table = NULL;
	
	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_EntityCategories();
		return self::$_table;
	}
	
	public static function getAllCategories(){
		return self::getTableInstance()->getAllCategories();
	}
}