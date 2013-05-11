<?php
class Performer extends YModel
{
	public $work_types;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{performer}}';
	}

	public function rules()
	{
		return array(
			array('id, number, experience, area, rating, status, weight, is_company', 'numerical', 'integerOnly'=>true),
			array('company_name', 'length', 'max'=>100),
			array('phone, work_types', 'safe'),
			array('id, number, experience, area, rating, status, weight, is_company, company_name', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'user'=>array(self::HAS_ONE, 'User', 'id'),
			'work_type'=>array(self::MANY_MANY, 'WorkType',
                'rpr_performer_work_type(performer_id, work_type_id)'),
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

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'number' => 'Number',
			'experience' => 'Experience',
			'area' => 'Area',
			'rating' => 'Rating',
			'status' => 'Status',
			'weight' => 'Weight',
			'is_company' => 'Is Company',
			'company_name' => 'Company Name',
			'work_types' => 'Виды работ',
		);
	}
	
	public function getProfile() {
		$client_id = Yii::app()->user->getId();
		$performer = Performer::model()->with('work_type')->findByPk($client_id);
		
		$work_type = $performer->work_type;
		$work_types = array();
		if (count($work_type)) {
			foreach ($work_type as $item) {
				$work_types[] = $item->id;
			}
		}
		$res = $performer->getAttributes();
		$res['work_types'] = $work_types; 
		return $res;
	}
	
	public function beforeSave() {
		if ($this->id)
			Yii::app()->db->createCommand()
				->delete(	'rpr_performer_work_type', 
							'performer_id=:id', 
							array(':id'=>$this->id));
		return parent::beforeSave();
	}
	
	public function save($runValidation=true,$attributes=null) {
		$criteria = new CDbCriteria();
		$criteria->addInCondition('id', $this->work_types);
		$work_types = WorkType::model()->findAll($criteria);
		$this->work_type = $work_types;
		$this->withRelated->save($runValidation, array('work_type'));
	}
	
	public function getPerformerTypes() {
		return array(
			0 => 'Мастер',
			1 => 'Компания',
		);
	}
}