<?php 

class PerformerProfileForm extends CFormModel {

	public $nick_name;
	public $first_name;
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
	
	public function rules()
	{
		$module = Yii::app()->getModule('client');
	
		return array(
				array('nick_name, first_name, email, phone, company_name', 'filter', 'filter' => 'trim'),
				array('nick_name, first_name, email, phone, company_name', 'filter', 'filter' => array($obj = new CHtmlPurifier(), 'purify')),
				array('number, experience, area, is_company', 'numerical', 'integerOnly'=>true),
				array('nick_name, first_name, email,', 'required'),
				array('nick_name, first_name, email, phone', 'length', 'max' => 50),
				array('password, cPassword', 'length', 'min' => $module->minPasswordLength),
				array('nick_name,', 'match','pattern' => '/^[A-Za-z0-9]{2,50}$/', 'message' => Yii::t('UserModule.user', 'Неверный формат поля "{attribute}" допустимы только буквы и цифры, от 2 до 20 символов')),
				array('nick_name,', 'checkNickName'),
				array('cPassword', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('UserModule.user', 'Пароли не совпадают.')),
				array('email', 'email'),
				array('email', 'checkEmail'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
				'nick_name'  	 => Yii::t('ClientModule.customer', 'Ваш ник-нэйм'),
				'first_name'  	 => Yii::t('ClientModule.customer', 'Ваше имя'),
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
		);
	}
	
	public function checkNickName($attribute,$params)
    {
        // Если ник поменяли
        if (Yii::app()->user->profile->nick_name != $this->nick_name)
        {
            $model = User::model()->find('nick_name = :nick_name', array(':nick_name' => $this->nick_name));
            if ($model)
                 $this->addError('nick_name', Yii::t('UserModule.user', 'Ник уже занят'));
        }
    }
	
	public function checkEmail($attribute,$params)
    {
        // Если мыло поменяли
        if (Yii::app()->user->profile->email != $this->email)
        {
            $model = User::model()->find('email = :email', array(':email' => $this->email));
            if ($model)
                $this->addError('email', Yii::t('UserModule.user', 'Email уже занят'));
        }
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