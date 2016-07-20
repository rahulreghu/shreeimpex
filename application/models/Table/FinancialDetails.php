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
		
	
}