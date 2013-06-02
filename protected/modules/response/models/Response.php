<?php

class Response extends YModel
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{response}}';
	}

	public function rules()
	{
		return array(
			array('text', 'filter', 'filter' => 'trim'),
			array('text', 'filter', 'filter' => array($obj=new CHtmlPurifier(),'purify')),
			array('rate, text, owner_id, forwho_id', 'required'),
			array('id, owner_id, forwho_id, rate, status_id', 'numerical', 'integerOnly'=>true),
			array('owner_id', 'exist', 'className' => 'Customer', 'attributeName' => 'id'),
			array('forwho_id', 'exist', 'className' => 'Performer', 'attributeName' => 'id'),
			array('rate', 'numerical', 'min' => 0, 'max' => 5),
			array('status_id', 'numerical', 'min' => 0, 'max' => 1),
		);
	}
	
	public function relations()
	{
		return array(
			'owner'=>array(self::BELONGS_TO, 'User', 'owner_id'),
			'forwho'=>array(self::BELONGS_TO, 'User', 'forwho_id'),
		);
	}

	public function prepare() {
		$this->owner_id = Yii::app()->user->getId();
		$this->status_id = 0;
		$this->create_date = new CDbExpression('NOW()');
		return $this;
	}
	
	public function afterSave() {
		parent::afterSave();
		if ($this->isNewRecord) {
			//Обновление аггрегации (среднее значение рейтинга)
			$forwho_id = $this->forwho_id;
			$average = Yii::app()->db->createCommand(array(
					'select' => array('AVG(rate)'),
					'from' => $this->tableName(),
					'where' => 'forwho_id=:id and status_id=0',
					'params' => array(':id'=>$forwho_id),
			))->queryScalar();
			$performer = Performer::model()->findByPk($forwho_id);
			$performer->rating = $average;
			$performer->save();
		}
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'owner_id' => 'Автор',
			'forwho_id' => 'На кого',
			'text' => 'Отзыв',
			'datetime' => 'Datetime',
			'rate' => 'Оценка',
		);
	}

}