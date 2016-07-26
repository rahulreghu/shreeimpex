<?php
class Model_Table_FinancialDetails extends Zend_Db_Table_Abstract{
	
	protected $_name = "financial_details";
	
	public function addFinancialDetails($data,$iec_id){
		foreach($data as $row){
			$row['epcg_export_id'] = 0;
			$row['entity_iec_id'] = $iec_id;
			$affectedRows =  $this->insert($row);
		}
		return $affectedRows;
	}
		
	public function getFinancialDetailsByIecId($iec_id){
		return $this->fetchAll("entity_iec_id = '".$iec_id."' AND epcg_export_id = 0");
	}
	
	public function updateFinancialDetails($data,$iec_id){
		$this->deleteFinancialDetailsByIecId($iec_id);
		foreach($data as $row){
			$row['epcg_export_id'] = 0;
			$row['entity_iec_id'] = $iec_id;
			$affectedRows =  $this->insert($row);
		}
		return $affectedRows;
	}
	
	public function deleteFinancialDetailsByIecId($iec_id, $epcg_export_id = 0){
		$this->delete("entity_iec_id = '".$iec_id."' AND epcg_export_id = '".$epcg_export_id."'");
	}
}