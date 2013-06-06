<h1>Специалисты</h1>

<?php $this->widget('application.modules.client.widgets.PerformerSearchWidget', array('params' =>$params));?>

<?php $this->widget('application.modules.client.widgets.PerformerOrderWidget', array('params' => $params));?>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $data_provider,
    'itemView'     => '_performer_mini',
	'cssFile'=>false,
	'pager' => array(
			'cssFile'=>false,
			'firstPageLabel'=>'<<',
			'prevPageLabel'=>'<',
			'nextPageLabel'=>'>',
			'lastPageLabel'=>'>>'
	)
)); ?>
