<?php 

class PerformerSearchWidget extends YWidget {
	
	public $params = array();
	
	public $view = 'inside';
	
	public function run()
	{
		$criteria = new CDbCriteria();
		$criteria->compare('active',1);
		$criteria->order = 'weight desc, label';
		
		$work_types = WorkType::model()->findAll($criteria);
		
		$performer_types = Performer::model()->getPerformerTypes();
		
		$this->render('widget', array(
				'view' => $this->view,
				'params' => $this->params,
				'work_types' => $work_types, 
				'performer_types' => $performer_types));
	}
	
}