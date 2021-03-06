<?php
$this->pageTitle = Yii::t('user', 'Авторизация');
$this->breadcrumbs = array('Авторизация');
?>

<div class='row'>
	
	<div class='span3'></div>
	
	<div class='span6'>
		<h1>Авторизация</h1>
		
		<?php $this->widget('application.modules.yupe.widgets.YFlashMessages'); ?>
		
		<div class="form">
		
		    <?php $form = $this->beginWidget('CActiveForm', array(
		                                                         'id' => 'login-form',
		                                                         'enableClientValidation' => true
		                                                    ));?>
		
		    <?php echo $form->errorSummary($model); ?>
		
		    <div class="field">
		        <?php echo $form->labelEx($model, 'email'); ?>
		        <?php echo $form->textField($model, 'email') ?>
		        <?php echo $form->error($model, 'email'); ?>
		    </div>
		
		    <div class="field">
		        <?php echo $form->labelEx($model, 'password'); ?>
		        <?php echo $form->passwordField($model, 'password') ?>
		        <?php echo $form->error($model, 'password'); ?>
		    </div>
		
		    <div class="field">
		        <p class="hint">
		            <?php echo CHtml::link(Yii::t('user', "Регистрация"), array('/user/account/registration')); ?>
		            | <?php echo CHtml::link(Yii::t('user', "Восстановление пароля"), array('/user/account/recovery')) ?>
		        </p>
		    </div>
		
		    <div class="submit">
		        <?php echo CHtml::submitButton('Войти', array('class' => 'btn btn-large btn-primary')); ?>
		    </div>
		
		    <?php $this->endWidget(); ?>
		</div><!-- form -->
    </div>
</div>