<?php
class Model_Table_Cities extends Zend_Db_Table_Abstract{
	protected $_name = "cities";

	public function getByDistrictId($id){
		$sql = $this->select();
		$sql->where('district_id = '.$id);
		$sql->order('name ASC');
		return $this->fetchAll($sql);
	}
}