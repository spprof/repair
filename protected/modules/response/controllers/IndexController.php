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
		$criteria->with = array('forwho');
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
			if ($model->prepare()->save()) {
				
				$module = Yii::app()->getModule('client');
				
				$emailBody = $this->renderPartial('responseCreatedEmail', array('model' => $model), true);
				
				Yii::app()->mail->send(
					$module->notifyEmailFrom,
					$performer->user->email,
					Yii::t('UserModule.user', 'Новый отзыв на сайте {site} !', array('{site}' => Yii::app()->name)),
					$emailBody
				);
				
				$emailBody = $this->renderPartial('responseCreatedEmailToAdmin', array('model' => $model), true);
				
				Yii::app()->mail->send(
					$module->notifyEmailFrom,
					$module->adminEmail,
					Yii::t('UserModule.user', 'Новый отзыв на сайте {site} !', array('{site}' => Yii::app()->name)),
					$emailBody
				);
				
				$this->redirect(array('owner'));
			}
		}
		$this->render('create',array('model' => $model, 'performer' => $performer));
	}
	
	public function actionView($id) {
		$criteria=new CDbCriteria();
		$criteria->with = array('forwho', 'owner');
		$model = $this->loadModel($id, $this->_model->setDbCriteria($criteria));
		$this->render('view', array('model' => $model));
	}
	
}