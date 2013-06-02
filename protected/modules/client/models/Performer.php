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
			array('about, phone', 'filter', 'filter' => 'trim'),
			array('about, phone', 'filter', 'filter'=>array($obj=new CHtmlPurifier(),'purify')),
			array('id, number, experience, status, weight, area', 'numerical', 'integerOnly'=>true),
			array('rating', 'numerical', 'min' => 0, 'max' => 5),
			array('area', 'in', 'range'=>array_keys($this->getAreaList())),
			array('is_company', 'boolean', 'allowEmpty'=>false),
			array('company_name', 'length', 'max'=>100),
			array('work_types', 'safe'),
			//array('work_types', 'exist', 'className' => 'WorkType', 'attributeName' => 'id'),
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
			'number' => 'Количество людей в группе',
			'experience' => 'Опыт (лет)',
			'phone' => 'Контактный телефон',
			'area' => 'Area',
			'rating' => 'Rating',
			'status' => 'Status',
			'weight' => 'Weight',
			'is_company' => 'Is Company',
			'company_name' => 'Название компании',
			'work_types' => 'Виды работ',
			'about' => 'Подробнее',
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
	
	public function beforeRelatedSave() {
		if ($this->id)
			Yii::app()->db->createCommand()
				->delete(	'rpr_performer_work_type', 
							'performer_id=:id', 
							array(':id'=>$this->id));
		return parent::beforeSave();
	}
	
	public function save($runValidation=true,$attributes=null) {
		if ($this->work_types) {
			$this->beforeRelatedSave();
			$criteria = new CDbCriteria();
			$criteria->addInCondition('id', $this->work_types);
			$work_types = WorkType::model()->findAll($criteria);
			$this->work_type = $work_types;
			$this->withRelated->save($runValidation, array('work_type'));
		} else {
			parent::save($runValidation,$attributes);
		}
	}
	
	public function getPerformerTypes() {
		return array(
			0 => 'Мастер',
			1 => 'Компания',
		);
	}
	
	public function getAreaList () {
		return array(
				0 => 'Город',
				1 => 'Город + область',
		);
	}
}