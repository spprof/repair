<?php 

Yii::import('application.modules.user.controllers.account.RegistrationAction');

class ClientRegistrationAction extends RegistrationAction {
	
	public function run()
	{
		$type = (isset($_GET['type']) ) ? $_GET['type'] : null;
		$factory = new ClientFactory($type);
		$this->_model 	= $factory->model;
		$this->_form 	= $factory->registration_form;
		$this->_module 	= Yii::app()->getModule('client');
		$this->_params = array('type' => $type);
		parent::run();
	}
	
}