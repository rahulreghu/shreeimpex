<?php 
class Model_Table_Users extends Zend_Db_Table_Abstract{
	
	protected $_name = "users";
	
	public function getByUserName($username){
		return $this->fetchRow("user_name = '".$username."'");
	}
	
	public  function getByEmail($email){
		return $this->fetchRow("user_email = '".$email."'");
	}
	
	public function getAllUsers(){
		$sql = $this->select();
		$sql->where('user_id != 1 AND user_status != 0');
		$sql->order('user_id ASC');
		return $this->fetchAll($sql)->toArray();
	}
	
	 public function disableUser($user_id){
	 	$this->update(array('user_status'=>Model_Constant::USER_STATUS_INACTIVE),'user_id = '.$user_id);
	 }
	 
	 public function enableUser($user_id){
	 	$this->update(array('user_status'=>Model_Constant::USER_STATUS_ACTIVE),'user_id = '.$user_id);
	 }
	 
	 public function deleteUser($user_id){
	 	$this->update(array('user_status'=>Model_Constant::USER_STATUS_DELETE),'user_id = '.$user_id);
	 }
	 
	 public function getByUserId($user_id){
	 	return $this->fetchRow("user_id = '".$user_id."'");
	 }
	 
	 public function addUser($request){
	 	return $this->insert($request);
	 }
	 
	 
}
	