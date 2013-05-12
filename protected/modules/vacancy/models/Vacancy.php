<?php

/**
 * This is the model class for table "{{vacancy}}".
 *
 * The followings are the available columns in table '{{vacancy}}':
 * @property integer $id
 * @property string $label
 * @property integer $payment
 * @property string $more
 * @property integer $owner_id
 * @property integer $status_id
 * @property string $create_date
 */
class Vacancy extends YModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Vacancy the static model class
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
		return '{{vacancy}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('payment, owner_id, status_id', 'numerical', 'integerOnly'=>true),
			array('label, more, create_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, label, payment, more, owner_id, status_id, create_date', 'safe', 'on'=>'search'),
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
			'label' => 'Название',
			'payment' => 'Оплата',
			'more' => 'Дополнительно',
			'owner_id' => 'Разместил',
			'status_id' => 'Статус',
			'create_date' => 'Дата создания',
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