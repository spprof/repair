<?php
/**
 * @var DefaultController $this
 * @var array $users
 */
?>
<h1><?php echo MessageModule::t('Мои сообщения'); ?></h1>
<?php if (Yii::app()->user->hasFlash('success')): ?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('success'); ?>
	</div>
<?php elseif (Yii::app()->user->hasFlash('error')): ?>
	<div class="flash-error">
		<?php echo Yii::app()->user->getFlash('error'); ?>
	</div>
<?php endif; ?>

<p><?php echo MessageModule::t('Непрочитанных сообщений');?>: <?php echo (int)$unread; ?></p>

<ul>
	<li>
		<?php echo CHtml::link(MessageModule::t('Входящие'), array('/message/default/listincoming')); ?>
	</li>
	<li>
		<?php echo CHtml::link(MessageModule::t('Исходящие'), array('/message/default/listoutgoing')); ?>
	</li>
</ul>

<ul>
	<?php /* foreach ($users as $user): ?>
	<li> 
		<?php echo $this->module->getUserName($user); ?>
		&nbsp;
		(<?php echo CHtml::link('Написать сообщение', array(
			'create', 'to' => $user->getPrimaryKey())
		); ?>)
	</li>
	<?php endforeach; */ ?>
</ul>
