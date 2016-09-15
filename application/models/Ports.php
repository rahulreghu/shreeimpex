<?php
class Model_Ports{

	private static $_table = NULL;

	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_Ports();
		return self::$_table;
	}

	public static function getAllPorts(){
		return self::getTableInstance()->getAllPorts();
	}

	public static function getById($id){
		return self::getTableInstance()->getById($id);
	}

}