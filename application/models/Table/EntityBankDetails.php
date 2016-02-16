<?php
class Model_Table_EntityBankDetails extends Zend_Db_Table_Abstract{
	
	protected $_name = "entity_bank_details";
	
	public function addBankDetails($data){
		return $this->insert($data);
	}
	
	public function getBankDetailsByIecId($id){
		return $this->fetchRow("entity_iec_id = '".$id."'");
	}
}