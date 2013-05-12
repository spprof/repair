<?php

class IndexController extends YFrontController
{
	
	public function filters() {
		return array(
			array('application.components.FrontAccessControl'),
		);
	}
	
	public function init() {
		parent::init();
		$this->_model = new Tender();
	}
	
	public function actionOwner()
	{
		$model = $this->_model;
		$criteria=new CDbCriteria();
		$criteria->compare('owner_id',Yii::app()->user->getId());
		$data_provider = new CActiveDataProvider(
				$model, array('criteria' => $criteria));
		$this->render('my', array('data_provider' => $data_provider));
	}
	
	public function actionIndex()
	{
		$model = $this->_model;
		$criteria=new CDbCriteria();
		$data_provider = new CActiveDataProvider(
				$model, array('criteria' => $criteria));
		$this->render('index', array('data_provider' => $data_provider));
	}
	
	public function actionCreate() {
		Yii::app()->clientScript->registerScriptFile( Yii::app()->theme->baseUrl . '/web/tournament/js/create.js');
		$model = $this->_model;
		$model_class = get_class($model);
		if (isset($_POST[$model_class])) {
			$model->attributes = $_POST[$model_class];
			if ($model->save()) {
				$this->redirect(array('owner'));
			}
		}
		$this->render('create',array('model' => $model));
	}
	
	public function actionUpdate($id)
	{
		$model = $this->loadSelfModel((int)$id);
		$model_class = get_class($model);
		if (Yii::app()->request->isPostRequest && isset($_POST[$model_class]))
		{
			$model->setAttributes(Yii::app()->request->getPost($model_class));
			if ($model->save())
			{
				$this->redirect(array('view', 'id' => $model->id));
			}
		}
		$this->render('update',array(
			'model' => $model,
		));
	}
	
}