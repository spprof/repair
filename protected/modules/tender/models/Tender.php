<?php

class Tender extends YModel
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{tender}}';
	}

	public function rules()
	{
		return array(
			array('id, with_materials, budget, status_id, owner_id, performer_id', 'numerical', 'integerOnly'=>true),
			array('label, text, images, create_date, catch_date, term, more', 'safe'),
			array('id, label, text, images, create_date, catch_date, term, with_materials, budget, more, status_id, owner_id, performer_id', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'label' => 'Название',
			'text' => 'Описание',
			'images' => 'Изображения',
			'create_date' => 'Дата создания',
			'catch_date' => 'Дата начала исполнения',
			'term' => 'Срок исполнения',
			'with_materials' => 'Материалы',
			'budget' => 'Бюджет',
			'more' => 'Дополнительно',
			'status_id' => 'Статус',
			'owner_id' => 'Автор',
			'performer_id' => 'Исполнитель',
		);
	}
	
	public function beforeSave() {
		$this->owner_id = Yii::app()->user->getId();
		$this->status_id = 0;
		$this->create_date = new CDbExpression('NOW()');
		return parent::beforeSave();
	}

}