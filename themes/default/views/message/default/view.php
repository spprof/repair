<?php
$this->breadcrumbs += array(MessageModule::t('Просмотр сообщения'));
?>

<h2><?php echo MessageModule::t('Просмотр сообщения'); ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		array(
			'name' => 'sender_id',
			'type' => 'text',
			'value' => $model->senderName
		),
		array(
			'name' => 'recipient_id',
			'type' => 'text',
			'value' => $model->recipientName
		),
		'read:boolean',
		'ds:boolean',
		'dr:boolean',
		'created',
		'subject:text',
		'text:ntext'
	)
)); ?>

<?php if ($this->_userId != $model->sender_id)
	echo CHtml::link(MessageModule::t('Ответить'), array('/message/default/reply', 'id' => $model->id));
?>

<?php echo CHtml::link(MessageModule::t('Удалить'), '#', array(
	'submit' => array('/message/default/delete', 'id' => $model->id),
	'confirm' => MessageModule::t('Вы действительно хотите удалить сообщение?')	
)); ?>
	
