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

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('address',$this->address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}