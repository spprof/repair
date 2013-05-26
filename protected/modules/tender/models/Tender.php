<?php

class Tender extends YModel
{
	public $work_types;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{tender}}';
	}

	public function relations()
	{
		return array(
			'work_type'=>array(self::MANY_MANY, 'WorkType',
				'rpr_tender_work_type(tender_id, work_type_id)'),
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
			array('id, with_materials, budget, status_id, owner_id, performer_id', 'numerical', 'integerOnly'=>true),
			array('label, text', 'required'),
			array('label, text, images, create_date, catch_date, term, more, work_types', 'safe'),
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
			'with_materials' => 'Свои материалы',
			'budget' => 'Бюджет',
			'more' => 'Дополнительно',
			'status_id' => 'Статус',
			'owner_id' => 'Автор',
			'performer_id' => 'Исполнитель',
			'work_types' => 'Типы работ',
		);
	}
	
	public function beforeSave() {
		$this->owner_id = Yii::app()->user->getId();
		$this->status_id = 0;
		$this->create_date = new CDbExpression('NOW()');
		$this->catch_date = null;
		if ($this->id)
			Yii::app()->db->createCommand()
			->delete(	'rpr_tender_work_type',
					'tender_id=:id',
					array(':id'=>$this->id));
		return parent::beforeSave();
	}
	
	public function afterFind() {
		$work_types = array();
		if ($this->work_type) {
			foreach ($this->work_type as $item) {
				$work_types[] = $item->id;
			}
		}
		$this->work_types = $work_types;
		parent::afterFind();
	}
	
	public function save($runValidation=true,$attributes=null) {
		$criteria = new CDbCriteria();
		$criteria->addInCondition('id', $this->work_types);
		$work_type = WorkType::model()->findAll($criteria);
		$this->work_type = $work_type;
		$this->withRelated->save($runValidation, array('work_type'));
	}

}