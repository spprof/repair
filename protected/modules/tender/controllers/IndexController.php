<?php

class IndexController extends YFrontController
{
	public function filters() {
		return array(
			array('application.components.FrontAccessControl - index,view'),
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
    	$criteria->order = 'create_date desc';
    	$criteria->with = array('owner','work_type');
    	//$criteria->together = true;
    	$criteria->group = 't.id';
		$data_provider = new CActiveDataProvider(
				$model, array('criteria' => $criteria, 'pagination'=>array('pageSize'=>7)));
		$this->render('index', array('data_provider' => $data_provider));
	}
	
	public function actionCreate() {
		$model = $this->_model;
		$model_class = get_class($model);
		if (isset($_POST[$model_class])) {
			$model->attributes = $_POST[$model_class];
			if ($model->save()) {
				
				$module = Yii::app()->getModule('client');
				
				$emailBody = $this->renderPartial('tenderCreatedEmailToAdmin', array('model' => $model), true);
				
				Yii::app()->mail->send(
					$module->notifyEmailFrom,
					$module->adminEmail,
					Yii::t('UserModule.user', 'Новый тендер на сайте {site} !', array('{site}' => Yii::app()->name)),
					$emailBody
				);
				
				$this->redirect(array('/tender/index/index/'));
			}
		}
		$this->render('create',array('model' => $model));
	}
	
	public function loadModel($id, $model=null)
	{
		$model = ($model) ? $model : $this->_model;
		$model = $model->with('work_type')->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, Yii::t('tournament_stat', 'Запрошенная страница не найдена.'));
		return $model;
	}
	
	public function actionView($id) {
		$criteria=new CDbCriteria();
		$criteria->with = array('owner','work_type');
		$model = $this->loadModel($id, $this->_model->setDbCriteria($criteria));
		$this->render('view', array('model' => $model));
	}
	
}