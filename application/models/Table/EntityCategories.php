<?php
class Model_Table_EntityCategories extends Zend_Db_Table_Abstract{
	protected $_name = "entity_categories";
	
	public function getAllCategories(){
		$sql = $this->select();
		$sql->where('status = 1');
		$sql->order('id ASC');
		return $this->fetchAll($sql)->toArray();
	}
}