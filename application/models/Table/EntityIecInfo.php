<?php
class Model_Table_EntityIecInfo extends Zend_Db_Table_Abstract{
	
	protected $_name = "entity_iec_info";
	
	public function getAllEntities(){
		$sql = $this->select('id','iec_no','name','status');
		$sql->where('status != 6 AND status != 7');
		$sql->order('created_on DESC');
		return $this->fetchAll($sql)->toArray();;
	}
	
	public function addIecForm($data){
		return $this->insert($data);
	}
	
	public function changeStatus($id,$statusId){
		$this->update(array('status'=>$statusId),'id = '.$id);
	}
	
	public function getAllSavedEntities(){
		$sql = $this->select('id','iec_no','name','status');
		$sql->where('status = 6');
		$sql->order('created_on DESC');
		return $this->fetchAll($sql)->toArray();;
	}

	public function updateImageInIecForm($id,$target_filename){
		$this->update(array('image'=>$target_filename),'id = '.$id);
	}
	
	public function getEntityInfobyId($id){
		return $this->fetchRow("status != 7 AND id = '".$id."'");
	}
	
	public function updateIecNumber($id,$iec_no){
		$this->update(array('iec_number'=>$iec_no),'id = '.$id);
	}
}