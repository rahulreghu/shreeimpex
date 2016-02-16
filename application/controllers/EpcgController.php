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
		$error = '';
		$response = "";
		$entity_categories = Model_EntityCategories::getAllCategories();
		$this->view->entity_categories = $entity_categories;
		
		$entity_categories = Model_EntityActivities::getAllActivities();
		$this->view->entity_activities = $entity_categories;
		
		$states = Model_States::getAllStates();
		$this->view->states = $states;
		
		if((isset($_POST['submitform']) && $_POST['submitform'] == 'Submit Form') || ( isset($_POST['saveform']) && $_POST['saveform'] == 'Save Form')){
			//$this->validationForm($_POST);
			//echo '<pre>';
			//print_r($_POST);
			$entity_iec_info = array();
			$bank_details = array();
			$branch_details = array();
			$entity_details = array();
			
			//arranging total branches
			$total_branches = $_POST['entity']['total_branches'];
			if($total_branches >= 1){
				$branch_details = $_POST['branch'];
				/*for($i=0; $i<$total_branches; $i++){
					$entity_details[$i] = $_POST['branch'][$i];
					$entity_details[$i]['entity_category_id'] = 0;
				}*/
			}
			//entity activities
			if(!empty($_POST['entity']['activities'])){
				$_POST['entity']['activities'] = implode(",", $_POST['entity']['activities']);
			}
			//if entity is proprietor firm
			if(isset($_POST['prop']) && !empty($_POST['prop'])){
				$_POST['prop']['entity_category_id'] = $_POST['entity']['category'];
				$entity_details[] = $_POST['prop'];
			}
			//if entity is partnership firm;
			if(isset($_POST['entity_partnership']) && !empty($_POST['entity_partnership'])){
				$_POST['entity']['pan_name_entity'] = $_POST['entity_partnership']['pan_name_entity'];
				$_POST['entity']['incorporation_date'] = DateTime::createFromFormat("d/m/Y", "{$_POST['entity_partnership']['incorporation_date']}")->format('Y-m-d');
				$_POST['entity']['pan_entity'] = $_POST['entity_partnership']['pan_entity'];
				$_POST['entity']['total_partners'] = $_POST['entity_partnership']['total_partners'];
				if($_POST['entity']['total_partners'] >= 1){
					$entity_details = $_POST['entity_partnership']['partners'];
				}
			}
			//if entity is private firm;
			if(isset($_POST['entity_privateltd']) && !empty($_POST['entity_privateltd'])){
				$_POST['entity']['pan_name_entity'] = $_POST['entity_privateltd']['pan_name_entity'];
				$_POST['entity']['incorporation_date'] = DateTime::createFromFormat("d/m/Y", "{$_POST['entity_privateltd']['incorporation_date']}")->format('Y-m-d');
				$_POST['entity']['pan_entity'] = $_POST['entity_privateltd']['pan_entity'];
				$_POST['entity']['llpin_cin'] = $_POST['entity_privateltd']['llpin_cin'];
				$_POST['entity']['registration_cert_number'] = $_POST['entity_privateltd']['registration_cert_number'];
				$_POST['entity']['total_partners'] = $_POST['entity_privateltd']['total_partners'];
				if($_POST['entity']['total_partners'] >= 1){
					$entity_details = $_POST['entity_privateltd']['partners'];
				}
			}
			//if entity is society
			if(isset($_POST['entity_society']) && !empty($_POST['entity_society'])){
				$_POST['entity']['pan_name_entity'] = $_POST['entity_society']['pan_name_entity'];
				$_POST['entity']['incorporation_date'] = DateTime::createFromFormat("d/m/Y", "{$_POST['entity_society']['incorporation_date']}")->format('Y-m-d');
				$_POST['entity']['pan_entity'] = $_POST['entity_society']['pan_entity'];
				$_POST['entity']['registration_cert_number'] = $_POST['entity_society']['registration_cert_number'];
				if(!empty($_POST['entity_society']['trustee'])){
					$entity_details[] = $_POST['entity_society']['trustee'];
				}
			}
			//if entity is huf
			if(isset($_POST['entity_huf']) && !empty($_POST['entity_huf'])){
				$_POST['entity']['pan_name_entity'] = $_POST['entity_huf']['pan_name_entity'];
				$_POST['entity']['incorporation_date'] = DateTime::createFromFormat("d/m/Y", "{$_POST['entity_huf']['incorporation_date']}")->format('Y-m-d');
				$_POST['entity']['pan_entity'] = $_POST['entity_huf']['pan_entity'];
				if(!empty($_POST['entity_huf']['karta'])){
					$entity_details[] = $_POST['entity_huf']['karta'];
				}
			}
			//print_r($branch_details);
			//print_r($entity_details);
			
			!empty($_POST['entity']['proof_of_accept']) && $_POST['entity']['proof_of_accept'] == 'on' ? $_POST['entity']['proof_of_accept'] = 1 : $_POST['entity']['proof_of_accept'] = 0;
			$_POST['entity']['created_on'] = date("Y-m-d H:i:s");
			$_POST['entity']['created_by'] = $this->_session->user->user_id;
			if(isset($_POST['saveform']) && $_POST['saveform'] == 'Save Form'){
				$_POST['entity']['status'] = '6';
			}else{
				$_POST['entity']['status'] = '1';
			}
			//print_r($_POST['entity']);
			try{
				//insert in entity_iec_info table
				$iec_id = Model_EntityIecInfo::addIecForm($_POST['entity']);
				if(!empty($iec_id)){
					if(!empty($_POST['bank'])){
						$_POST['bank']['entity_iec_id'] = $iec_id;
						Model_EntityBankDetails::addBankDetails($_POST['bank']);
					}
					if(!empty($branch_details)){
						Model_EntityDetails::addEntityDetails($branch_details,0,$iec_id);
					}
					if(!empty($entity_details)){
						Model_EntityDetails::addEntityDetails($entity_details,$_POST['entity']['category'],$iec_id);
					}
					if(isset($_FILES['user_image_file']) && !empty($_FILES['user_image_file']['name'])){
						$target_filename = $iec_id.basename($_FILES["user_image_file"]["name"]);
						if (move_uploaded_file($_FILES["user_image_file"]["tmp_name"], "user_images/".$target_filename)) {
							Model_EntityIecInfo::updateImageInIecForm($iec_id,$target_filename);
						}else{
							$error .=  "Sorry, there was an error uploading your file.<br/>";
						}
					}
				}else{
					$error .=  "Unknown error. IEC number not generated.<br/>";
				}
			}catch (Exception $e){
				$error .= $e->getMessage();
			}
			if($error){
				$response['status'] = 0;
				$response['message'] = $error;
			}else{
				$response['status'] = 1;
				$response['message'] = 'Success';
			}
		}
		$this->view->response = $response;
	}
	
	public function editepcgAction()
	{
		$entity_categories = Model_EntityCategories::getAllCategories();
		$this->view->entity_categories = $entity_categories;
		
		$entity_activities = Model_EntityActivities::getAllActivities();
		$this->view->entity_activities = $entity_activities;
		
		$states = Model_States::getAllStates();
		$this->view->states = $states;
		
		if(isset($_GET['id']) && !empty($_GET['id'])){
			echo '<pre>';
			$iec_info =  Model_EntityIecinfo::getEntityInfobyId($_GET['id'])->toArray();
			print_r($iec_info);
			$this->view->iec_info = $iec_info;
			
			$iec_bank_details =  Model_EntityBankDetails::getBankDetailsByIecId($_GET['id']);
			if(!empty($iec_bank_details)){
				$this->view->iec_bank_details = $iec_bank_details->toArray();
				print_r($this->view->iec_bank_details);
			}
			
			$iec_branch_details =  Model_EntityDetails::getBranchDetailsByIecId($_GET['id']);
			if(!empty($iec_branch_details)){
				$this->view->iec_branch_details = $iec_branch_details->toArray();
				print_r($this->view->iec_branch_details);
			}
			
			$districts = Model_Districts::getByStateId($iec_info['state']);
			$this->view->districts = $districts;
				
			$cities = Model_Cities::getByDistrictId($iec_info['district']);
			$this->view->cities = $cities;
		}
		
	}
	
	public function listsavedepcgAction()
	{
		$allstatus = Model_Options::getAllIecStatus();
		$allentities = Model_EntityIecInfo::getAllSavedEntities();
		if($allentities){
			$this->view->allentities = $allentities;
			$this->view->allstatus = $allstatus;
		}
	}
	
	public function deleteepcgAction(){
		$response = array();
		$this->_helper->viewRenderer->setNoRender(true);
		$this->_helper->layout->disableLayout();
		if($this->getRequest()->getParam('id') != null){
			$iec_id = $this->getRequest()->getParam('id');
			//$status_id = Model_Options::getIecDeleteStatus();
			Model_EntityIecinfo::changeStatus($iec_id,7);
			$response['status'] = 1;
			$response['message'] = 'Successfully deleted';
		}else{
			$response['status'] = 0;
			$response['message'] = 'No parameters passed';
		}
		echo json_encode($response);
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
		}else{
			$response['status'] = 0;
			$response['message'] = 'No parameters passed';
		}
		echo json_encode($response);
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
		}else{
			$response['status'] = 0;
			$response['message'] = 'No parameters passed';
		}
		echo json_encode($response);
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
	
	//ajax
	public function updateIecNumberAction(){
		$response = array();
		$this->_helper->viewRenderer->setNoRender(true);
		$this->_helper->layout->disableLayout();
		if($this->getRequest()->getParam('id') != null){
			$id = $this->getRequest()->getParam('id');
			$iec_no = $this->getRequest()->getParam('iec_no');
			Model_EntityIecInfo::updateIecNumber($id,$iec_no);
			$response['status'] = 1;
			$response['message'] = "Status has been updated";
		}else{
			$response['status'] = 0;
			$response['message'] = 'No parameters passed';
		}
		echo json_encode($response);
	}
}