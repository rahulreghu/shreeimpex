<?php
class Model_Table_EntityIecInfo extends Zend_Db_Table_Abstract{
	
	protected $_name = "entity_iec_info";
	
	public function getAllEntities(){
		$sql = $this->select('id','iec_no','name','status');
		$sql->order('created_on DESC');
		return $this->fetchAll($sql)->toArray();;
	}
	
	public function addIecForm($data){
		return $this->insert($data);
	}
	
	public function changeStatus($id,$statusId){
		$this->update(array('status'=>$statusId),'id = '.$id);
	}
}