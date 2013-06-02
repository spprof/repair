<div class="form">
<?php 
$form = $this->beginWidget('application.modules.yupe.extensions.booster.widgets.TbActiveForm', array(
	'id'=>'horizontalForm',
	'type'=>'horizontal',
)); ?>
		
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model, 'subject', array()); ?>

	<?php echo $form->textAreaRow($model, 'text', array('class'=>'span8', 'rows'=>5)); ?>
	
	<div class="form-actions">
		<p class="note">Поля, помеченные <span class="required">*</span>, обязательны для заполнения.</p>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Отправить')); ?>
	</div>
	
<?php $this->endWidget(); ?>
</div>
