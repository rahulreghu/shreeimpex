<?php
class Model_Table_Districts extends Zend_Db_Table_Abstract{
	protected $_name = "districts";

	public function getByStateId($id){
		$sql = $this->select();
		$sql->where('state_id = '.$id);
		$sql->order('name ASC');
		return $this->fetchAll($sql);
	}
	
	public function getById($id){
		return $this->fetchRow("id = '".$id."'");
	}
}