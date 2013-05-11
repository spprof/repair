<?php 

class PerformerOrderWidget extends YWidget {
	
	public $params = array();
	
	public function run()
	{
		$this->render('widget', array(
				'params' => $this->params,
			));
	}
	
}