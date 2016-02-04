<?php
class SettingsController extends Zend_Controller_Action
{
	protected $session;
	
	public function init()
	{
		$session = new Zend_Session_Namespace("shreeimpex");
		$this->_session = $session;
		$this->view->session = $session;
		$this->_helper->layout()->setLayout('layout');
		if($this->_session->user->user_role != 1){
			$this->_helper->redirector('index', 'index');
		}
	}
	
	public function indexAction()
	{
		$allUsers = Model_Users::getAllUsers();
		$this->view->allUsers = $allUsers;
	}
	
	//ajax
	public function deleteUserAction(){
		$response = array();
		$this->_helper->viewRenderer->setNoRender(true);
		$this->_helper->layout->disableLayout();
		$user_id = $this->getRequest()->getParam('id');
		$action = $this->getRequest()->getParam('execute');
		if($action == "disable" || $action == "enable" || $action == "delete"){
			$response['status'] = 1;
			switch($action){
				case 'enable':
					Model_Users::enableUser($user_id);
					$response['message'] = "Sucessfully enabled";
					break;
				case 'disable':
					Model_Users::disableUser($user_id);
					$response['message'] = "Sucessfully disabled";
					break;
				case 'delete':
					Model_Users::deleteUser($user_id);
					$response['message'] = "Sucessfully deleted";
					break;
				default:
					$response['message'] = "Wrong Parameers";
			}
		}else{
			$response['status'] = 0;
			$response['message'] = 'Action not defined';
		}
		echo json_encode($response);
	}
	
	//ajax
	public function editUserAction(){
		$response = array();
		$this->_helper->viewRenderer->setNoRender(true);
		$this->_helper->layout->disableLayout();
		if($this->getRequest()->getParam('id') != null){
			$user_id = $this->getRequest()->getParam('id');
			$user_details = Model_Users::getByUserId($user_id);
			if($user_details){
				$response['status'] = 1;
				$response['message'] = $user_details->toArray();
			}else{
				$response['status'] = 0;
				$response['message'] = 'No details found';
			}	
			echo json_encode($response);
		}else{
			
		}
	}
	
	public function addUserAction(){
		$data = array();
		$error = false;
		$this->_helper->viewRenderer->setNoRender(true);
		$request = $this->getRequest()->getPost();
		//print_r($request);exit();
		$data['user_name'] =  $request['user_name'];
		$data['user_firstname'] =  $request['user_firstname'];
		$data['user_lastname'] =  $request['user_lastname'];
		$data['user_email'] =  $request['user_email'];
		$data['user_password'] =  $request['user_password'];
		$data['user_role'] =  $request['user_role'];
		$data['user_registered'] = date('Y-m-d H:i:s');
		$data['user_status'] =  1;
		if(Model_Users::getByUserName($data['user_name'])){
			$error .= 'Username already exists'.'</br>';
		}
		if(Model_Users::getByEmail($data['user_email'])){
			$error .= 'Email already exists'.'</br>';
		}
		if(!$error){
			if(Model_Users::addUser($data)){
				$this->view->success = "User details have been added successfully";
			}else{
				$this->view->error .= 'Unexpected error occured'.'</br>';
			}
			
		}else{
			$this->view->error = $error;
		}
		$this->view->activetab = 'add_user';
		self::indexAction();
		$this->render('index');
	}
}