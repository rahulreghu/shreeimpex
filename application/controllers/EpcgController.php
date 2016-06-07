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
		//print_r($this->_session->user);
		//echo 'hai';
	}
	
	public function contactusAction(){
		
	}
	
	//ajax call
	public function getAllEpcgAction(){
		$response = array();
		$this->_helper->viewRenderer->setNoRender(true);
		$this->_helper->layout->disableLayout();
		if($this->getRequest()->getParam('iec_id') != null){
			$iec_id = $this->getRequest()->getParam('iec_id');
			$epcg_list = Model_EpcgExportInfo::getAllEpcgByIecNo($iec_id);
			if(!empty($epcg_list)){
				$response['status'] = 1;
				$response['message'] = $epcg_list;
			}else{
				$response['status'] = 2;
				$response['message'] = 'No data found';
			}
		}else{
			$response['status'] = 0;
			$response['message'] = 'No parameters passed';
		}
		echo json_encode($response);
	}
}