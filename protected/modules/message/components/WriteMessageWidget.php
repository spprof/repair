<?php 

class WriteMessageWidget extends YWidget {
	
	public $id;
	
	public function run() {
		$this->render('widget', array('id' => $this->id));
	}
	
}