<?php
class Model_Options{
	private static $_table = NULL;

	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_Options();
		return self::$_table;
	}

	public static function getAllIecStatus(){
		return self::getTableInstance()->getAllIecStatus();
	}

}