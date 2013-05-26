<?php 

class IndexController extends YFrontController {
	
	public function actionIndex() {
		
		$params = array();
		$params['search'] = (isset($_GET['search'])) ? $_GET['search'] : null;
		$params['order'] = (isset($_GET['order'])) ? $_GET['order'] : null;
		
		$criteria=new CDbCriteria();
		$criteria->with = array('work_type', 'user');
		if (isset($params['search']['performer_type']))
			$criteria->compare('is_company', $params['search']['performer_type']);
		if (isset($params['search']['work_types'])) {
			$criteria->addInCondition('work_type.id',$params['search']['work_types']);
		}
		if ($params['order']) {
			//$criteria->order = $params['order'] . ' desc';
		}
		$criteria->together = true;
		
		$data_provider = new CActiveDataProvider(
			Performer::model(),
			array(  'criteria' => $criteria, 
					'pagination'=>array('pageSize'=>10))
		);
		
		$this->render('index', array('params' => $params, 'data_provider' => $data_provider));
		
	}
	
	public function actionView($id) {
		$user = $this->loadModel((int)$id, User::model());
		$factory = new ClientFactory($user->client_type);
		$model = $factory->model;
		$model = $model::model()->with('user');
		if ($user->client_type == 'performer') {
			$model = $model->with(array('user', 'work_type'));
		}
		$model = $this->loadModel((int)$id, $model);
		$this->render('view', array('model' => $model));
	}
	
}