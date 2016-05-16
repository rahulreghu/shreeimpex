<?php
class Model_EmailCategories{
	private static $_table = NULL;

	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_EmailCategories();
		return self::$_table;
	}

	public static function getAllEmailCategories(){
		return self::getTableInstance()->getAllEmailCategories();
	}
	
	public static function getEmailCategoryById(){
		return self::getTableInstance()->getEmailCategoryById();
	}
	
	
}