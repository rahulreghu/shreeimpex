<?php
class EpcgController extends Zend_Controller_Action
{
	protected $_session;

	public function init()
	{
		$session = new Zend_Session_Namespace("shreeimpex");
		$this->_session = $session;
		$this->_helper->layout()->setLayout('layout');
		$this->view->session = $session;
		if(!isset($this->_session->user)){
			$this->_redirect('.');
		}
	}

	public function indexAction()
	{
		//print_r($this->_session->user);
		
	}
	
	public function addepcgAction()
	{
		$entity_categories = Model_EntityCategories::getAllCategories();
		$this->view->entity_categories = $entity_categories;
		
		$entity_categories = Model_EntityActivities::getAllActivities();
		$this->view->entity_activities = $entity_categories;
		
	}
}