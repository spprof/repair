<h1>Профиль пользователя</h1>
<div class='row'>
	<div class="span6 form">
	
	    <?php $form = $this->beginWidget('application.modules.yupe.extensions.booster.widgets.TbActiveForm', array(
			'id'=>'horizontalForm',
			'type'=>'horizontal',
		)); ?>

	    <?php echo $form->errorSummary($model); ?>
	    
	    <?php echo $form->textFieldRow($model, 'first_name', array()); ?>
	    
	    <?php echo $form->textFieldRow($model, 'phone', array()); ?>
	    
	    <?php echo $this->renderPartial("_{$type}_form", array('model' => $model, 'form' => $form)); ?> 
	    
	    <?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); ?>
	    
	    <?php echo $form->passwordFieldRow($model, 'cPassword', array('class'=>'span3')); ?>
	    
	    <div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Сохранить')); ?>
		</div>

		<?php $this->endWidget(); ?>
	</div><!-- form -->
</div>