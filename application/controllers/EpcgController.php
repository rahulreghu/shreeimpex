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
		$allstatus = Model_Options::getAllIecStatus();
		$allentities = Model_EntityIecInfo::getAllEntities();
		if($allentities){
			$this->view->allentities = $allentities;
			$this->view->allstatus = $allstatus;
		}
	}
	
	public function addepcgAction()
	{
		$entity_categories = Model_EntityCategories::getAllCategories();
		$this->view->entity_categories = $entity_categories;
		
		$entity_categories = Model_EntityActivities::getAllActivities();
		$this->view->entity_activities = $entity_categories;
		
		$states = Model_States::getAllStates();
		$this->view->states = $states;
		
		if(isset($_POST['submit']) && $_POST['submit'] == 'Submit Form'){
			$entity_iec_info = array();
			$bank_details = array();
			$branch_details = array();
			echo '<pre>';
			print_r($_POST);
			
			$total_branches = $_POST['entity']['total_branches'];
			for($i=0; $i<$total_branches; $i++){
				$branch_details[] = $_POST['branch'.$i];
			}
			if(!empty($_POST['entity']['activities'])){
				$_POST['entity']['activities'] = implode(",", $_POST['entity']['activities']);
			}
			$_POST['entity']['proof_of_accept'] = 1;
			$_POST['entity']['status'] = '1';
			$_POST['entity']['created_on'] = date("Y-m-d H:i:s");
			$_POST['entity']['created_by'] = $this->_session->user->user_id;
			$entity_iec_info = $_POST['entity'];
			$bank_details = $_POST['bank'];
			
			print_r($entity_iec_info);
			print_r($bank_details);
			print_r($branch_details);
			echo $iec_id = Model_EntityIecInfo::addIecForm($entity_iec_info);
			
		}
		
	}
	
	//ajax
	public function getDistrictsAction(){
		$response = array();
		$this->_helper->viewRenderer->setNoRender(true);
		$this->_helper->layout->disableLayout();
		if($this->getRequest()->getParam('id') != null){
			$state_id = $this->getRequest()->getParam('id');
			$districts = Model_Districts::getByStateId($state_id);
			if($districts){
				$response['status'] = 1;
				$response['message'] = $districts->toArray();
			}else{
				$response['status'] = 0;
				$response['message'] = 'No details found';
			}
			echo json_encode($response);
		}else{
			$response['status'] = 0;
			$response['message'] = 'No parameters passed';
		}
	}
	
	//ajax
	public function getCitiesAction(){
		$response = array();
		$this->_helper->viewRenderer->setNoRender(true);
		$this->_helper->layout->disableLayout();
		if($this->getRequest()->getParam('id') != null){
			$district_id = $this->getRequest()->getParam('id');
			$cities = Model_Cities::getByDistrictId($district_id);
			if($cities){
				$response['status'] = 1;
				$response['message'] = $cities->toArray();
			}else{
				$response['status'] = 0;
				$response['message'] = 'No details found';
			}
			echo json_encode($response);
		}else{
			$response['status'] = 0;
			$response['message'] = 'No parameters passed';
		}
	}
	
	//ajax
	public function changeIecStatusAction(){
		$response = array();
		$this->_helper->viewRenderer->setNoRender(true);
		$this->_helper->layout->disableLayout();
		if($this->getRequest()->getParam('id') != null){
			$id = $this->getRequest()->getParam('id');
			$status_id = $this->getRequest()->getParam('status_id');
			Model_EntityIecInfo::changeStatus($id,$status_id);
			$response['status'] = 1;
			$response['message'] = "Status has been updated";
		}else{
			$response['status'] = 0;
			$response['message'] = 'No parameters passed';
		}
		echo json_encode($response);
	}
}