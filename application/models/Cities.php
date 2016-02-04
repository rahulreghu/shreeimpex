<?php
class Model_Cities{

	private static $_table = NULL;

	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_Cities();
		return self::$_table;
	}

	public static function getByDistrictId($id){
		return self::getTableInstance()->getByDistrictId($id);
	}

}