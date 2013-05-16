<?php
$this->breadcrumbs += array(
	MessageModule::t('New conversations')
); ?>

<h2><?php echo MessageModule::t('New conversations'); ?></h2>
<?php if (Yii::app()->user->hasFlash('success')): ?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('success'); ?>
	</div>
<?php elseif (Yii::app()->user->hasFlash('error')): ?>
	<div class="flash-error">
		<?php echo Yii::app()->user->getFlash('error'); ?>
	</div>
<?php endif; ?>

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider' => $dataProvider,
	'columns' => array(
		array(
			'name' => 'interlocutorId',
			'type' => 'text',
			'value' => '$data->getInterlocutorName()'
		),
		'created',
		'read:boolean',
		'id',
		'subject:text',
		array(
			'class' => 'CButtonColumn',
			'template' => '{view}',
			'viewButtonUrl' => 'array("view", "id" => $data->interlocutorId)'
		)
	),
	'template' => '{items}'
));?>

