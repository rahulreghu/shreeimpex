<?php
class Model_EntityActivities{
	private static $_table = NULL;

	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_EntityActivities();
		return self::$_table;
	}

	public static function getAllActivities(){
		return self::getTableInstance()->getAllActivities();
	}
}