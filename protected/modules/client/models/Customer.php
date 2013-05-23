<?php
class Customer extends YModel
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{customer}}';
	}

	public function rules()
	{
		return array(
			array('city_id', 'numerical', 'integerOnly'=>true),
			array('phone', 'length', 'max'=>20),
			array('address', 'safe'),
			array('id, phone, city_id, address', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'user'=>array(self::HAS_ONE, 'User', 'id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'phone' => 'Phone',
			'city_id' => 'City',
			'address' => 'Address',
		);
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
	
	public function getProfile() {
		$client_id = Yii::app()->user->getId();
		$client = Customer::model()->findByPk($client_id);
		return $client->getAttributes();
	}
}