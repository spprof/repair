<?php
$this->breadcrumbs += array(MessageModule::t('Новое сообщение')); 
?> 

<h2><?php echo MessageModule::t('Новое сообщение'); ?></h2>

<p>
	<?php echo MessageModule::t('Новое сообщение пользователю'); ?> 
	<b><?php echo CHtml::encode($model->recipientName); ?></b>
</p>

<?php $this->renderPartial('_form', array('model' => $model)); ?>

