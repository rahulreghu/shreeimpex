<?php
class Model_Table_EmailCategories extends Zend_Db_Table_Abstract{

	protected $_name = "email_categories";

	public function getAllEmailCategories(){
		$sql = $this->select('email_category','email_html');
		$sql->order('email_category ASC');
		return $this->fetchAll($sql)->toArray();;
	}
	
	public function getEmailCategoryById(){
		//return self::getTableInstance()->getEmailCategoryById();
	}
}