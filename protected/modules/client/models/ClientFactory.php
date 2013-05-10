<?php 
class ClientFactory {
	
	public $registration_form = null;
	
	public $model = null;
	
	public function __construct($name) {
		switch ($name) {
			
			case 'customer' : {
				$this->registration_form = new CustomerRegistrationForm();
				$this->model = new Customer();
				break;
			}
			
			case 'performer' : {
				$this->registration_form = new PerformerRegistrationForm();
				$this->model = new Performer();
				break;
			}
			
			default :
				throw new CHttpException(404, Yii::t('Client.registration', 'Страница не найдена!'));
		}
		
	}
	
}