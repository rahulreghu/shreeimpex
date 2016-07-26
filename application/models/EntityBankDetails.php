<?php
class Model_EntityBankDetails{
	
	private static $_table = NULL;
	
	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_EntityBankDetails();
		return self::$_table;
	}
	
	public static function addBankDetails($data){
		return self::getTableInstance()->addBankDetails($data);
	}
	
	public static function getBankDetailsByIecId($id){
		return self::getTableInstance()->getBankDetailsByIecId($id);
	}

	public static function updateBankDetails($value,$iec_id){
		return self::getTableInstance()->updateBankDetails($value,$iec_id);
	}
}