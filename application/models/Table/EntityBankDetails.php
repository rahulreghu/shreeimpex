<?php
class Model_Table_EntityBankDetails extends Zend_Db_Table_Abstract{
	
	protected $_name = "entity_bank_details";
	
	public function addBankDetails($data){
		return $this->insert($data);
	}
	
	public function getBankDetailsByIecId($iec_id){
		return $this->fetchRow("entity_iec_id = '".$iec_id."'");
	}
	
	public function updateBankDetails($value,$iec_id){
		$this->deleteBankDetailsByIecId($iec_id);
		return $this->insert($value,$iec_id);
	}
	
	public function deleteBankDetailsByIecId($iec_id){
		$this->delete("entity_iec_id = '".$iec_id."'");
	}
}