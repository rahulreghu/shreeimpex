<?php
class Model_EntityBankDetails{
	
	private static $_table = NULL;
	
	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_EntityBankDetails();
		return self::$_table;
	}
}