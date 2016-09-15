<?php
class Model_Table_EpcgGoodsSector extends Zend_Db_Table_Abstract{
	protected $_name = "epcg_goods_sector";

	public function getAllGoodsSector(){
		$sql = $this->select();
		$sql->order('id ASC');
		return $this->fetchAll($sql);
	}

	public function getById($id){
		return $this->fetchRow("id = '".$id."'");
	}
}