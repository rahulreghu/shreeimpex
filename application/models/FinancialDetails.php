<?php
class Model_FinancialDetails{
	private static $_table = NULL;

	public static function getTableInstance(){
		if (!self::$_table) self::$_table = new Model_Table_FinancialDetails();
		return self::$_table;
	}
	
	public static function addFinancialDetails($data,$iec_id){
		return self::getTableInstance()->addFinancialDetails($data,$iec_id);
	}
	
	public static function updateFinancialDetails($data,$iec_id){
		return self::getTableInstance()->updateFinancialDetails($data,$iec_id);
	}
	
	public static function getFinancialDetailsByIecId($iec_id){
		return self::getTableInstance()->getFinancialDetailsByIecId($iec_id);
	}
}