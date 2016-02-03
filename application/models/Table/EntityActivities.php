<?php
class Model_Table_EntityActivities extends Zend_Db_Table_Abstract{
	protected $_name = "entity_activities";
	
	public function getAllActivities(){
		$sql = $this->select();
		$sql->where('status = 1');
		$sql->order('id ASC');
		return $this->fetchAll($sql)->toArray();
	}
}