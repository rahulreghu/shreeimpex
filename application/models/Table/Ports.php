<?php
class Model_Table_Ports extends Zend_Db_Table_Abstract{
	protected $_name = "ports";

	public function getAllPorts(){
		$sql = $this->select();
		$sql->order('name ASC');
		return $this->fetchAll($sql);
	}
	
	public function getById($id){
		return $this->fetchRow("id = '".$id."'");
	}
}