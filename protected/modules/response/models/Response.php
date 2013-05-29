<?php

class Response extends YModel
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{response}}';
	}

	public function rules()
	{
		return array(
			array('text', 'filter', 'filter' => 'trim'),
			array('text', 'filter', 'filter' => array($obj=new CHtmlPurifier(),'purify')),
			array('rate, text, owner_id, forwho_id', 'required'),
			array('id, owner_id, forwho_id, rate, status_id', 'numerical', 'integerOnly'=>true),
			array('owner_id', 'exist', 'className' => 'Customer', 'attributeName' => 'id'),
			array('forwho_id', 'exist', 'className' => 'Performer', 'attributeName' => 'id'),
			array('rate', 'numerical', 'min' => 0, 'max' => 5),
			array('status_id', 'numerical', 'min' => 0, 'max' => 1),
			array('create_date', 'date'),
		);
	}
	
	public function relations()
	{
		return array(
			'owner'=>array(self::BELONGS_TO, 'User', 'owner_id'),
			'forwho'=>array(self::BELONGS_TO, 'User', 'forwho_id'),
		);
	}

	public function beforeSave() {
		//Пересчитать рейтинг для исполнителя и занести его в исполнителя
		$this->owner_id = Yii::app()->user->getId();
		$this->status_id = 0;
		$this->create_date = new CDbExpression('NOW()');
		return parent::beforeSave();
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'owner_id' => 'Автор',
			'forwho_id' => 'На кого',
			'text' => 'Отзыв',
			'datetime' => 'Datetime',
			'rate' => 'Оценка',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('owner_id',$this->owner_id);
		$criteria->compare('forwho_id',$this->forwho_id);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('datetime',$this->datetime,true);
		$criteria->compare('rate',$this->rate);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}