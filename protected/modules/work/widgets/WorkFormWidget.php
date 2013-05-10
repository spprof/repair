<?php 

Yii::import('zii.widgets.jui.CJuiInputWidget');

class WorkFormWidget extends CJuiInputWidget{
	
	//public $scriptFiles = 'bootstrap-multiselect.js';
	public $scriptFiles = null;
	
	public $cssFile = null;
	
	public function run() {
		
		list($name,$id)=$this->resolveNameID();
		
		if(isset($this->htmlOptions['id']))
			$id=$this->htmlOptions['id'];
		else
			$this->htmlOptions['id']=$id;
		if(isset($this->htmlOptions['name']))
			$name=$this->htmlOptions['name'];
		
		$model = WorkType::model();
		
		$criteria = new CDbCriteria();
		$criteria->condition = 'active=1';
		$criteria->order = 'weight desc';
		$res = $model->findAll($criteria);
		$option_list = array();
		if ($res) {
			foreach ($res as $item) {
				$option_list[$item->id] = $item->label;
			}
		}
		
		echo CHtml::activeDropDownList($this->model, $this->attribute, $option_list, array('multiple' => 'multiple'));
		
		$options = CMap::mergeArray($this->options, array(
				'buttonClass' => 'btn',
				'buttonWidth' => 'auto',
				'buttonContainer' => '<div class="btn-group" />',
				'maxHeight' => false,
			)); 
		
		$options=CJavaScript::encode($this->options);
		$js = "jQuery('#{$id}').multiselect($options);";
		
		$cs = Yii::app()->getClientScript();
		
		Yii::app()->clientScript->registerScriptFile( '/web/vendor/bootstrap-multiselect/bootstrap-multiselect.js');
		
		$cs->registerScript(__CLASS__.'#'.$id,$js);
	}
	
}