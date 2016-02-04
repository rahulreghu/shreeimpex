<?php
class Model_Table_EntityIecinfo extends Zend_Db_Table_Abstract{
	
	protected $_name = "entity_iec_info";
	
	public function getAllEntities(){
		$sql = $this->select('iec_no','name','status');
		$sql->order('created_on DESC');
		return $this->fetchAll($sql)->toArray();;
	}
}