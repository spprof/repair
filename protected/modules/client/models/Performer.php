<?php
class Performer extends YModel
{
	public $work_types = array();
	
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
			array('phone, name', 'safe'),
			array('id, number, experience, area, rating, status, weight, is_company, company_name', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'user'=>array(self::HAS_ONE, 'User', 'id'),
			'work_type'=>array(self::MANY_MANY, 'WorkType',
                'rpr_performer_work_type(user_id, work_type_id)'),
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
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('number',$this->number);
		$criteria->compare('experience',$this->experience);
		$criteria->compare('area',$this->area);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('status',$this->status);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('is_company',$this->is_company);
		$criteria->compare('company_name',$this->company_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}