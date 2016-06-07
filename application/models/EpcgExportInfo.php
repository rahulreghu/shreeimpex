<?php
class Model_EpcgExportInfo{
	private static $_table = NULL;

	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_EpcgExportInfo();
		return self::$_table;
	}

	public static function getAllEpcgByIecNo($id){
		return self::getTableInstance()->getAllEpcgByIecNo($id);
	}
}