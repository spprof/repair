<div class='form'>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tender-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, помеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="field">
		<?php echo $form->labelEx($model,'label'); ?>
		<?php echo $form->textField($model,'label'); ?>
		<?php echo $form->error($model,'label'); ?>
	</div>
	
	<div class="field">
		<?php echo $form->labelEx($model,'with_materials'); ?>
		<?php echo $form->radioButtonList($model, 'with_materials', array('1' => 'Да', '0' => 'Нет' ), array('separator' => '')); ?>
		<?php echo $form->error($model,'with_materials'); ?>
	</div>

	<div class="field">
		<?php echo $form->labelEx($model,'budget'); ?>
		<?php echo $form->textField($model,'budget'); ?>
		<?php echo $form->error($model,'budget'); ?>
	</div>

	<div class="field">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text'); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="field">
		<?php echo $form->labelEx($model,'term'); ?>
		<?php echo $form->textField($model,'term'); ?>
		<?php echo $form->error($model,'term'); ?>
	</div>

	<div class="field">
		<?php echo $form->labelEx($model,'more'); ?>
		<?php echo $form->textArea($model,'more'); ?>
		<?php echo $form->error($model,'more'); ?>
	</div>


	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-large')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>