<?php 

class IndexController extends YFrontController {
	
	public function actionIndex() {
		
		$params = array();
		$params['search'] = (isset($_GET['search'])) ? $_GET['search'] : null;
		$params['order'] = (isset($_GET['order'])) ? $_GET['order'] : null;
		
		$criteria=new CDbCriteria();
		if (isset($params['search']['performer_type']))
			$criteria->compare('is_company', $params['search']['performer_type']);
		if (isset($params['search']['work_types'])) {
			$criteria->with = array('work_type'); 
			$criteria->addInCondition('work_type.id',$params['search']['work_types']);
		}
		$criteria->order = 'experience desc';
		$criteria->together = true;
		
		$data_provider = new CActiveDataProvider(
			Performer::model(),
			array(  'criteria' => $criteria, 
					'pagination'=>array('pageSize'=>10))
		);
		
		$this->render('index', array('params' => $params, 'data_provider' => $data_provider));
		
	}
	
}