<?php

class WorkType extends YModel
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{work_type}}';
	}

	public function rules()
	{
		return array(
			array('active, weight', 'numerical', 'integerOnly'=>true),
			array('label', 'length', 'max'=>255),
			array('id, label, active, weight', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'performer'=>array(self::MANY_MANY, 'Performer',
                'rpr_performer_work_type(work_type_id,performer_id)'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'label' => 'Label',
			'active' => 'Active',
			'weight' => 'Weight',
		);
	}

}