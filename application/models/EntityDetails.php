<?php
class Model_EntityDetails{
	
	private static $_table = NULL;
	
	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_EntityDetails();
		return self::$_table;
	}
	
}