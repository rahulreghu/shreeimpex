<?php
class Model_States{
	 
	private static $_table = NULL;

	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_States();
		return self::$_table;
	}
	
	public static function getAllStates(){
		return self::getTableInstance()->getAllStates();
	}
	
}