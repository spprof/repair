<div class='row'>

	<div class='span3'>
		<?php $this->widget('application.modules.client.widgets.PerformerSearchWidget', array('params' =>$params));?>
	</div>
	
	<div class='span9'>
	
		<h1>Специалисты</h1>
		
		<?php $this->widget('application.modules.client.widgets.PerformerOrderWidget', array('params' => $params));?>
		
		<?php $this->widget('zii.widgets.CListView', array(
		    'dataProvider' => $data_provider,
		    'itemView'     => '_performer_mini',
		)); ?>
		
	</div>

</div>