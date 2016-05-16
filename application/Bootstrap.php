<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	protected function _initDB()
	{
		// Database
		$db = $this->getOption('db');
		if($db) {
			$dbAdapter = Zend_Db::factory($db['adapter'],$db['params']);
			Zend_Db_Table_Abstract::setDefaultAdapter($dbAdapter);
			Zend_Registry::set('dbAdapter', $dbAdapter);
		}
	}
	
	protected function _initEmailSettings()
	{
		// email settings
		$mailSettings = $this->getOption('resources');
		if($mailSettings) {
			$transport = $mailSettings['mail']['transport']; //new Zend_Mail_Transport_Smtp($mailSettings['mail']['transport']['host'], $mailSettings['mail']['transport']);
			Zend_Registry::set('emailConfig', $mailSettings['mail']);
			return $transport;
		}
	}
	
	protected function _initView(){
		// Initialize view
		$view = new Zend_View();
	//	$view->doctype('XHTML1_STRICT');
	//	$view->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=utf-8');
		$view->config = $this->getOptions();
		Zend_Registry::set('config', $this->getOptions());
	
		// Add it to the ViewRenderer
		$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
				'ViewRenderer'
				);
		$viewRenderer->setView($view);
	
		// Return it, so that it can be stored by the bootstrap
		return $view;
	}
	
	protected function _initModules()
	{
		$frontController = Zend_Controller_Front::getInstance();
		//$frontController->addModuleDirectory(APPLICATION_PATH . '/modules');
		 
		// action helpers
		Zend_Controller_Action_HelperBroker::addPath(APPLICATION_PATH . '/controllers/helpers');
	
		// autoloaders
		$autoloader = Zend_Loader_Autoloader::getInstance();
	
	
		$modules = $frontController->getControllerDirectory();
		$default = $frontController->getDefaultModule();
	
		foreach (array_keys($modules) as $module) {
			$autoloader->pushAutoloader(new Zend_Application_Module_Autoloader(array(
					'namespace' => ucwords($module),
					'basePath' => $frontController->getModuleDirectory($module),
			)));
		}
	
		$resourceLoader = new Zend_Loader_Autoloader_Resource(array(
				'basePath'  => APPLICATION_PATH,
				'namespace' => '',
		));
	
		$resourceLoader->addResourceType('form', 'forms/', 'Form')
		->addResourceType('model', 'models/', 'Model')
		->addResourceType('model_table', 'models/Table/', 'Model_Table');
		//$frontController->getRouter()
		//->addroute('logout',new Zend_Controller_Router_Route('admin/logout',array('module'=>'admin', 'controller'=>'index', 'action'=>'logout')))
		;
		 
	}
	
	protected function _initHelpersAndPartials()
	{
		//ActionHelpers
		Zend_Controller_Action_HelperBroker::addPath(Model_Constant::getActionHelpersPath());
	}
}

