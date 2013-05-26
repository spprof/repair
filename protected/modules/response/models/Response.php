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
			array('id, owner_id, forwho_id', 'numerical', 'integerOnly'=>true),
			array('rate', 'numerical', 'min' => 0, 'max' => 5),
			array('status_id', 'numerical', 'min' => 0, 'max' => 1),
			array('rate, text', 'required'),
			array('id, owner_id, forwho_id, text, create_date, rate, status_id', 'safe', 'on'=>'search'),
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