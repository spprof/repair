<?php 

class PerformerRegistrationForm extends CFormModel {
	
	public $nick_name;
	public $name;
	public $email;
	public $phone;
	public $number;
	public $experience;
	public $area;
	public $is_company;
	public $company_name;
	public $work_types;
	
	public $password;
	public $cPassword;
	public $verifyCode;
	
	public function rules()
	{
		$module = Yii::app()->getModule('client');
	
		return array(
				array('nick_name, name, email', 'filter', 'filter' => 'trim'),
				array('nick_name, name, email', 'filter', 'filter' => array($obj = new CHtmlPurifier(), 'purify')),
				array('nick_name, name, email, password, cPassword', 'required'),
				array('nick_name, name, email', 'length', 'max' => 50),
				array('password, cPassword', 'length', 'min' => $module->minPasswordLength),
				array('nick_name,', 'match','pattern' => '/^[A-Za-z0-9]{2,50}$/', 'message' => Yii::t('UserModule.user', 'Неверный формат поля "{attribute}" допустимы только буквы и цифры, от 2 до 20 символов')),
				array('nick_name,', 'checkNickName'),
				array('cPassword', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('UserModule.user', 'Пароли не совпадают.')),
				array('email', 'email'),
				array('email', 'checkEmail'),
				array('verifyCode', 'YRequiredValidator', 'allowEmpty' => !$module->showCaptcha || !CCaptcha::checkRequirements(), 'message' => Yii::t('UserModule.user', 'Код проверки не корректен.')),
				array('verifyCode', 'captcha', 'allowEmpty' => !$module->showCaptcha || !CCaptcha::checkRequirements()),
				array('verifyCode', 'emptyOnInvalid'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
				'nick_name'  	 => Yii::t('ClientModule.customer', 'Ваш ник-нэйм'),
				'name'  	 => Yii::t('ClientModule.customer', 'Ваше имя'),
				'email'      => Yii::t('ClientModule.customer', 'Email'),
				'phone'      => Yii::t('ClientModule.customer', 'Телефон'),
				'number'     => Yii::t('ClientModule.customer', 'Количество человек в бригаде'),
				'experience' => Yii::t('ClientModule.customer', 'Количество лет опыта'),
				'area'       => Yii::t('ClientModule.customer', 'География работ'),
				'is_company' => Yii::t('ClientModule.customer', 'Фирма'),
				'company_name' => Yii::t('ClientModule.customer', 'Название фирмы'),
				'work_types' => Yii::t('ClientModule.customer', 'Типы работ'),
				
				'password'   => Yii::t('ClientModule.customer', 'Пароль'),
				'cPassword'  => Yii::t('ClientModule.customer', 'Подтверждение пароля'),
				'verifyCode' => Yii::t('ClientModule.customer', 'Код проверки'),
		);
	}
	
	public function checkNickName($attribute,$params)
	{
		$model = User::model()->find('nick_name = :nick_name', array(':nick_name' => $this->name));
		if ($model)
			$this->addError('nick_name', Yii::t('ClientModule.user', 'Ник уже занят'));
	}
	
	public function checkEmail($attribute,$params)
	{
		$model = User::model()->find('email = :email', array(':email' => $this->email));
		if ($model)
			$this->addError('email', Yii::t('UserModule.user', 'Email уже занят'));
	}
	
	public function emptyOnInvalid($attribute, $params)
	{
		if ($this->hasErrors())
			$this->verifyCode = null;
	}
	
	public function getIsCompanyList() {
		return array(
			1 => 'Да',
			0 => 'Нет',
		);
	}
	
	public function getAreaList () {
		return array(
			0 => 'Город',
			1 => 'Город + область',
		);
	}
	
}