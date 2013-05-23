<div class='form'>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'response-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, помеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="field">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text'); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="field">
		<?php echo $form->labelEx($model,'rate'); ?>
		<?php echo $form->dropDownList($model,'rate', array(0,1,2,3,4,5)); ?>
		<?php echo $form->error($model,'rate'); ?>
	</div>


	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-large')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>