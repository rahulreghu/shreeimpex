<?php
class Model_Table_EpcgExportInfo  extends Zend_Db_Table_Abstract{
	protected $_name = "epcg_export_info";
	
	public function getAllEpcgByIecNo($id){
		$sql = $this->select();
		$sql->where('entity_iec_id = '.$id);
		$sql->order('id DESC');
		return $this->fetchAll($sql)->toArray();
		//return $this->fetchAll($sql)->toArray();;
	}
}