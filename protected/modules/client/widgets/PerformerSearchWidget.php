<?php 

class PerformerSearchWidget extends YWidget {
	
	public $params = array();
	
	public function run()
	{
		$criteria = new CDbCriteria();
		$criteria->compare('active',1);
		$criteria->order = 'weight desc';
		
		$work_types = WorkType::model()->findAll($criteria);
		
		$performer_types = Performer::model()->getPerformerTypes();
		
		$this->render('widget', array(
				'work_types' => $work_types, 
				'performer_types' => $performer_types));
	}
	
}