<?php
class EPCGController extends Zend_Controller_Action
{
	protected $_session;

	public function init()
	{
		$session = new Zend_Session_Namespace("shreeimpex");
		$this->_session = $session;
		$this->_helper->layout()->setLayout('layout');
		$this->view->session = $session;
	}

	public function indexAction()
	{
		//print_r($this->_session->user);
		
	}
	
	public function addepcgAction()
	{
		//print_r($this->_session->user);
		
	}
}