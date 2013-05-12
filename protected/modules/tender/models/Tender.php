<?php

/**
 * This is the model class for table "{{tender}}".
 *
 * The followings are the available columns in table '{{tender}}':
 * @property integer $id
 * @property string $label
 * @property string $text
 * @property string $images
 * @property string $create_date
 * @property string $date
 * @property string $term
 * @property integer $with_materials
 * @property integer $budget
 * @property string $more
 * @property integer $status_id
 */
class Tender extends YModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tender the static model class
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
		return '{{tender}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, with_materials, budget, status_id', 'numerical', 'integerOnly'=>true),
			array('label, text, images, create_date, date, term, more', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, label, text, images, create_date, date, term, with_materials, budget, more, status_id', 'safe', 'on'=>'search'),
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
			'label' => 'Label',
			'text' => 'Text',
			'images' => 'Images',
			'create_date' => 'Create Date',
			'date' => 'Date',
			'term' => 'Term',
			'with_materials' => 'With Materials',
			'budget' => 'Budget',
			'more' => 'More',
			'status_id' => 'Status',
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
		$criteria->compare('label',$this->label,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('images',$this->images,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('term',$this->term,true);
		$criteria->compare('with_materials',$this->with_materials);
		$criteria->compare('budget',$this->budget);
		$criteria->compare('more',$this->more,true);
		$criteria->compare('status_id',$this->status_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}