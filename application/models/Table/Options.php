<?php
class Model_Table_Options extends Zend_Db_Table_Abstract{
	
	protected $_name = "options";
	
	public function getAllIecStatus(){
		$sql = $this->select();
		$sql->where("option_name = 'entity_iec_info' AND enable = 1");
		$sql->order('id ASC');
		return $this->fetchAll($sql)->toArray();;
	}
	
	public function getIecDeleteStatus(){
		return $this->fetchRow("option_name = 'entity_iec_info' AND option_value = 'Deleted'");
	}
	
}