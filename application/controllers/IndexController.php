<?php

class IndexController extends Zend_Controller_Action
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
    	if(isset($this->_session->user)){
        	$this->_redirect("home/");
     	}
     	
     	if(isset($_POST['submit']) && $_POST['submit'] == "SIGN IN"){
     		$login_data = $_POST;
     		$user = Model_Users::getByUserName($login_data['username']);
     		if(!empty($user['user_name']) && $user['user_password'] == $login_data['password'] ){
     			Zend_Session::regenerateId();
     			$this->_session->user = $user;
     			$this->_redirect('home');
     		}else{
				$errors['invalid_credentials'] = 'Invalid Credentials!!';
			}
			$this->view->errors = $errors;
     	}
    }
    
    public function logoutAction(){
    	$this->_session->unsetAll();
    	Zend_Session::destroy();
    	$this->_redirect('.');
    }


}

