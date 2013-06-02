<?php

class Vacancy extends YModel
{
	public $work_types;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{vacancy}}';
	}

	public function relations()
	{
		return array(
			'work_type'=>array(self::MANY_MANY, 'WorkType',
				'rpr_vacancy_work_type(vacancy_id, work_type_id)'),
		);
	}
	
	public function behaviors()
	{
		return array(
			'withRelated'=>array(
				'class'=>'application.components.WithRelatedBehavior',
			),
		);
	}
	
	public function rules()
	{
		return array(
			array('payment, label, more', 'filter', 'filter' => 'trim'),
			array('payment, label, more','filter','filter'=>array($obj=new CHtmlPurifier(),'purify')),
			array('label, owner_id', 'required'),
			array('owner_id, status_id', 'numerical', 'integerOnly'=>true),
			array('owner_id', 'exist', 'className' => 'User', 'attributeName' => 'id'),
			array('create_date', 'date'),
			array('work_types', 'safe'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'label' => 'Название',
			'payment' => 'Оплата',
			'more' => 'Дополнительно',
			'owner_id' => 'Разместил',
			'status_id' => 'Статус',
			'create_date' => 'Дата создания',
		);
	}
	
	public function beforeSave() {
		$this->owner_id = Yii::app()->user->getId();
		$this->status_id = 0;
		$this->create_date = new CDbExpression('NOW()');
		if ($this->id)
			Yii::app()->db->createCommand()
			->delete(	'rpr_vacancy_work_type',
					'vacancy_id=:id',
					array(':id'=>$this->id));
		return parent::beforeSave();
	}
	
	public function save($runValidation=true,$attributes=null) {
		$this->beforeSave();
		$criteria = new CDbCriteria();
		$criteria->addInCondition('id', $this->work_types);
		$work_types = WorkType::model()->findAll($criteria);
		$this->work_type = $work_types;
		$this->withRelated->save($runValidation, array('work_type'));
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('label',$this->label,true);
		$criteria->compare('payment',$this->payment);
		$criteria->compare('more',$this->more,true);
		$criteria->compare('owner_id',$this->owner_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}