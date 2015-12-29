<?php 
class Model_Table_Users extends Zend_Db_Table_Abstract{
	
	protected $_name = "users";
	
	public function getByUserName($username){
		return $this->fetchRow("user_name = '".$username."'");
	}
}
	