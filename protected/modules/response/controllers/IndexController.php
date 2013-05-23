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
		$this->_model = new Response();
	}
	
	public function actionSlave($id)
	{
		$model = $this->_model;
		$criteria=new CDbCriteria();
		$criteria->compare('forwho_id',$id);
		$data_provider = new CActiveDataProvider(
				$model, array('criteria' => $criteria));
		$this->render('slave', array('data_provider' => $data_provider));
	}
	
	public function actionOwner()
	{
		$model = $this->_model;
		$criteria=new CDbCriteria();
		$criteria->compare('owner_id',Yii::app()->user->getId());
		$data_provider = new CActiveDataProvider(
				$model, array('criteria' => $criteria));
		$this->render('owner', array('data_provider' => $data_provider));
	}
	
	public function actionCreate($id) {
		$performer = $this->loadModel((int)$id, Performer::model()->with('user'));
		$model = $this->_model;
		$model_class = get_class($model);
		if (isset($_POST[$model_class])) {
			$model->attributes = $_POST[$model_class];
			$model->forwho_id = $id;
			if ($model->save()) {
				$this->redirect(array('owner'));
			}
		}
		$this->render('create',array('model' => $model, 'performer' => $performer));
	}
	
}