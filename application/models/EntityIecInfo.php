<?php
class Model_EntityIecinfo{
	private static $_table = NULL;
	
	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_EntityIecinfo();
		return self::$_table;
	}
	
	public static function getAllEntities(){
		return self::getTableInstance()->getAllEntities();
	}
}