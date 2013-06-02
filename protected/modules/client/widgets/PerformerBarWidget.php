<?php 

class PerformerBarWidget extends YWidget {
	
	public $limit = 2;
	
	public $order = 'rating desc';
	
	public function run()
	{
		$criteria = new CDbCriteria();
		$criteria->limit = $this->limit;
    	$criteria->order = $this->order;
    	$criteria->with = array('work_type', 'user');
		$model = Performer::model()->findAll($criteria);
		$this->render('widget', array(
			'model' => $model,
		));
	}
	
}