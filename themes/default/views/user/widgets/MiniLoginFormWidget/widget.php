<?php if (!Yii::app()->user->isAuthenticated()):?>
<div class="form row">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'minilogin-form',
		'enableAjaxValidation'=>false,
		'action' => '/login/',
		'htmlOptions' => array('class' => 'navbar-form pull-right'),
	)); ?>
		
		<?php echo $form->textField($model,'email',array('size'=>32,'maxlength'=>32, 'class'=>'span1', 'placeholder' => 'email')); ?>
		
		<?php echo $form->passwordField($model,'password',array('class'=>'span1', 'placeholder' => 'Пароль')); ?>
		
		<button type="submit" class="btn">Вход</button>
		
	<?php $this->endWidget(); ?>
</div>
<?php else:?>
<div class='pull-right' style='padding-top: 10px;'>
	<?php
		switch (Yii::app()->user->getState('client_type')) {
			case 'customer' : {
				$profile_url = '/client/account/profile?type=customer';
				break;
			}
			case 'performer' : {
				$profile_url = '/client/account/profile?type=performer';
				break;
			}
			default :  
				$profile_url = '/profile/';
		}
	
	?>
	<a href='<?=$profile_url?>'><i class="icon-user"></i> <b><?=Yii::app()->user->nick_name?></b></a>&nbsp;&nbsp;
	<a href='/logout/'><small>Выход</small></a>
</div>
<?php endif;?>