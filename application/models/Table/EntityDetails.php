<?php
class Model_Table_EntityDetails extends Zend_Db_Table_Abstract{
	
	protected $_name = "entity_details";
	
	/*
	public function addBranchDetails($data,$id){
		foreach($data as $row){
			$row['entity_category_id'] = 0;
			$row['entity_iec_id'] = $id;
			$affectedRows =  $this->insert($row);
		}
		return $affectedRows;
	}
	*/
	public function addEntityDetails($data,$cat_id,$iec_id){
		foreach($data as $row){
			if(!empty($row['dob'])){
				$row['dob'] = DateTime::createFromFormat("d/m/Y", "{$row['dob']}")->format('Y-m-d');
			}
			$row['entity_category_id'] = $cat_id;
			$row['entity_iec_id'] = $iec_id;
			$affectedRows =  $this->insert($row);
		}
		return $affectedRows;
	}
	
	public function getIecDetailsByIecId($id){
		return $this->fetchAll("entity_iec_id = '".$id."'");
	}
	
	public function updateEntityDetails($data,$cat_id,$iec_id){
		$this->deleteEntityDetailsByCatIdIecId($cat_id,$iec_id);
		foreach($data as $row){
			if(!empty($row['dob'])){
				$row['dob'] = DateTime::createFromFormat("d/m/Y", "{$row['dob']}")->format('Y-m-d');
			}
			$row['entity_category_id'] = $cat_id;
			$row['entity_iec_id'] = $iec_id;
			$affectedRows =  $this->insert($row);
		}
		return $affectedRows;
	}
	
	public function deleteEntityDetailsByCatIdIecId($cat_id,$iec_id){
		//delete branch details
		$this->delete("entity_iec_id = '".$iec_id."' AND entity_category_id = '".$cat_id."'");
	}
}