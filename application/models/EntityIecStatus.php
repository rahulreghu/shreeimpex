<?php
class Model_EntityIecStatus{
	private static $_table = NULL;

	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_EntityIecStatus();
		return self::$_table;
	}

	public static function getAllStatus(){
		return self::getTableInstance()->getAllStatus();
	}

}