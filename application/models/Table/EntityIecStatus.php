<?php
class Model_Table_EntityIecStatus extends Zend_Db_Table_Abstract{
	
	protected $_name = "entity_iec_status";
	
	public function getAllStatus(){
		$sql = $this->select();
		$sql->order('id ASC');
		return $this->fetchAll($sql)->toArray();;
	}
	
}