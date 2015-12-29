<?php
class HomeController extends Zend_Controller_Action
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
	
	public function addAction()
	{
		//print_r($this->_session->user);
		echo 'hai';
	}
}