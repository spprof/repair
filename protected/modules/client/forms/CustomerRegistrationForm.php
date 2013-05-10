<?php 

class CustomerRegistrationForm extends CFormModel{
	
	public $name;
	public $email;
	public $phone;
	public $city_id;
	public $address;
	
	public $password;
	public $cPassword;
	public $verifyCode;
	
	public function rules()
	{
		$module = Yii::app()->getModule('client');
	
		return array(
				array('name, email', 'filter', 'filter' => 'trim'),
				array('name, email', 'filter', 'filter' => array($obj = new CHtmlPurifier(), 'purify')),
				array('name, email, password, cPassword', 'required'),
				array('name, email', 'length', 'max' => 50),
				array('password, cPassword', 'length', 'min' => $module->minPasswordLength),
				array('name', 'match','pattern' => '/^[A-Za-z0-9]{2,50}$/', 'message' => Yii::t('UserModule.user', 'Неверный формат поля "{attribute}" допустимы только буквы и цифры, от 2 до 20 символов')),
				array('name', 'checkNickName'),
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
				'name'  	 => Yii::t('ClientModule.customer', 'Ваше имя'),
				'email'      => Yii::t('ClientModule.customer', 'Email'),
				'phone'      => Yii::t('ClientModule.customer', 'Телефон'),
				'city_id'	 => Yii::t('ClientModule.customer', 'Город'),
				'address'	 => Yii::t('ClientModule.customer', 'Адрес'),
				'password'   => Yii::t('ClientModule.customer', 'Пароль'),
				'cPassword'  => Yii::t('ClientModule.customer', 'Подтверждение пароля'),
				'verifyCode' => Yii::t('ClientModule.customer', 'Код проверки'),
		);
	}

	public function checkNickName($attribute,$params)
	{
		$model = User::model()->find('nick_name = :nick_name', array(':nick_name' => $this->name));
		if ($model)
			$this->addError('name', Yii::t('ClientModule.user', 'Такое имя уже присутствует в системе'));
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
	
	public function getCityList() {
		return array(
			0 => 'Киров',
			1 => 'Кирово-Чепецк',
			2 => 'Слободской',
			3 => 'Котельнич',
			4 => 'Яранск',
			5 => 'Уржум',
			6 => 'Вятские Поляны',
		);
	}
	
}