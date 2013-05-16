<?php
/**
 * @var CActiveDataProvider $dataProvider
 */
?>
<h1><?php echo MessageModule::t('Personal messages'); ?></h1>
<?php if (Yii::app()->user->hasFlash('success')): ?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('success'); ?>
	</div>
<?php elseif (Yii::app()->user->hasFlash('error')): ?>
	<div class="flash-error">
		<?php echo Yii::app()->user->getFlash('error'); ?>
	</div>
<?php endif; ?>

<p><?php echo MessageModule::t('Unread messages');?>: <?php echo (int)$unread; ?></p>

<p><?php echo MessageModule::t('Compose message'); ?>:</p>
<ul>
	<?php foreach ($users as $user): ?>
	<li> 
		<?php echo $this->module->getUserName($user); ?>
		&nbsp;
		(<?php echo CHtml::link(MessageModule::t('Compose message'), array(
			'view', 'id' => $user->getPrimaryKey())
		); ?>)
	</li>
	<?php endforeach; ?>
</ul>

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider' => $dataProvider,
	'columns' => array(
		array(
			'name' => 'interlocutorId',
			'type' => 'text',
			'value' => '$data->getInterlocutorName()'
		),
		'read:boolean',
		'created',
		'subject:text',
		array(
			'class' => 'CButtonColumn',
			'template' => '{view}',
			'viewButtonUrl' => 'array("view", "id" => $data->interlocutorId)'
		)
	),
	'template' => '{items}'
));?>

<br />
<h2><?php echo MessageModule::t('Widget example'); ?></h2>
<?php $this->widget('application.modules.message.components.pmwidget', array(
	'url' => array('/message/thread/unreadList')	
)); ?>
