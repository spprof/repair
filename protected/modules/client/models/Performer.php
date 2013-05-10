<?php

/**
 * This is the model class for table "{{performer}}".
 *
 * The followings are the available columns in table '{{performer}}':
 * @property integer $id
 * @property integer $number
 * @property integer $experience
 * @property integer $area
 * @property integer $rating
 * @property integer $status
 * @property integer $weight
 * @property integer $is_company
 * @property string $company_name
 */
class Performer extends YModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Performer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{performer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, number, experience, area, rating, status, weight, is_company', 'numerical', 'integerOnly'=>true),
			array('company_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, number, experience, area, rating, status, weight, is_company, company_name', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
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

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

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