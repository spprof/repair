<?php
$this->pageTitle = Yii::t('user', 'Регистрация нового пользователя');
$this->breadcrumbs = array('Регистрация нового пользователя');
?>

<h1>Регистрация нового 

	<?php if ($type == 'customer'):?>
		заказчика
	<?php elseif ($type == 'performer'):?>
		специалиста
	<?php else:?>
		пользователя
	<?php endif;?>

</h1>

<div class='hint'>Пожалуйста, имя пользователя и пароль заполняйте только латинскими буквами и цифрами.</div>

<br/><br/>

<?php $this->widget('application.modules.yupe.widgets.YFlashMessages'); ?>

<div class='row'>
<div class="span3">
</div>
<div class="span6 form">

    <?php $form = $this->beginWidget('application.modules.yupe.extensions.booster.widgets.TbActiveForm', array(
			'id'=>'horizontalForm',
			'type'=>'horizontal',
		)); ?>
		
    <?php echo $form->errorSummary($model); ?>
    
    <?php echo $form->textFieldRow($model, 'nick_name', array()); ?>
    
    <?php echo $form->textFieldRow($model, 'first_name', array()); ?>
    
    <?php echo $form->textFieldRow($model, 'email', array()); ?>
    
    <?php echo $form->textFieldRow($model, 'phone', array()); ?>
    
    <?php echo $this->renderPartial("_{$type}_form", array('model' => $model, 'form' => $form)); ?>
    
    <?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); ?>
	    
	<?php echo $form->passwordFieldRow($model, 'cPassword', array('class'=>'span3')); ?>

	<?php if ($module->showCaptcha && CCaptcha::checkRequirements()): ?>
        <div class="field">
            <?php echo $form->labelEx($model, 'verifyCode'); ?>
            <div>
                <?php $this->widget('CCaptcha', array(
                    'showRefreshButton' => true,
                    'clickableImage' => true,
                    'buttonLabel' => 'обновить',
                    'buttonOptions' => array('class' => 'captcha-refresh-link'),
                )); ?>
                <?php echo $form->textField($model, 'verifyCode'); ?>
                <?php echo $form->error($model, 'verifyCode'); ?>
            </div>
            <div class="hint">
                Введите текст указанный на картинке
            </div>
        </div>
    <?php endif; ?>
    
    <div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Зарегистрироваться')); ?>
	</div>
	
    <?php $this->endWidget(); ?>
</div><!-- form -->
</div>