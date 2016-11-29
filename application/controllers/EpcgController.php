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
    		$this->redirect('.');
    	}
	}
	
	public function indexAction()
	{
		//print_r($this->_session->user);
	}
	
	public function addepcgAction()
	{
		if($this->getRequest()->getParam('iec_id')){
			$this->view->iec_details = $this->getIecDetailsByIecId($this->getRequest()->getParam('iec_id'));
		}
		if(isset($_POST['submitform']) && $_POST['submitform'] == "Submit Form"){
			print_r($_POST['epcg_export']);
			//echo $_POST['epcg_export']['payment_date'];exit();
			$_POST['epcg_export']['payment_date'] = DateTime::createFromFormat("d/m/Y", "{$_POST['epcg_export']['payment_date']}")->format('Y-m-d');
			try{
			Model_EpcgExportInfo::addEpcgForm($_POST['epcg_export']);
			}catch(Exception $e){
				echo $e->getMessage();
			}
		}
	}
	
	
	public function editepcgAction()
	{
		
		
	}
	
	public function getIecDetailsByIecId($iec_id){
		$iec_info =  Model_EntityIecinfo::getEntityInfobyId($iec_id)->toArray();
		$category = Model_EntityCategories::getCategoryById($iec_info['category'])->toArray();
		$iec_info['category_name'] =  $category['name'];
		$iec_info['bank_details'] =  Model_EntityBankDetails::getBankDetailsByIecId($iec_id)->toArray();;
		$iec_details =  Model_EntityDetails::getIecDetailsByIecId($iec_id)->toArray();
		$iec_info['ports'] = Model_Ports::getAllPorts()->toArray();
		$iec_info['capital_goods'] = Model_EpcgGoodsSector::getAllGoodsSector()->toArray();
		//$primary_branch_flag = false;
		foreach($iec_details as $detail){
			$detail['state'] =  Model_States::getById($detail['state'])->toArray()['name'];
			$detail['district'] =  Model_Districts::getById($detail['district'])->toArray()['name'];
			$detail['city'] =  Model_Cities::getById($detail['city'])->toArray()['name'];
			if($detail['entity_category_id'] == 0){
				if($detail['state'] == 'Karnataka'){ //TO DO: Pick state Karnataka from database from the configuration table
					$iec_info['branch_details_primary'][] = $detail;
					//$primary_branch_flag = true;
				}
				$iec_info['branch_details'][] = $detail;
			}else{
				$iec_info['partner_details'][] = $detail;
			}
		}
		print_r($iec_info);
		return $iec_info;
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