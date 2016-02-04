<?php
class Model_Table_States extends Zend_Db_Table_Abstract{
	protected $_name = "states";
	
	public function getAllStates(){
		$sql = $this->select();
		$sql->order('name ASC');
		return $this->fetchAll($sql)->toArray();
	}
}