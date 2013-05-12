<?php
/* @var $this VacancyController */
/* @var $model Vacancy */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vacancy-form-form',
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
	    <?php echo $form->labelEx($model, 'work_types'); ?>
	    <?php $this->widget('application.modules.work.widgets.WorkFormWidget', array(
	    			'model' => $model,
	    			'attribute' => 'work_types',
	    		));
	    ?>
	    <?php echo $form->error($model, 'work_types'); ?>
	</div>

	<div class="field">
		<?php echo $form->labelEx($model,'more'); ?>
		<?php echo $form->textArea($model,'more'); ?>
		<?php echo $form->error($model,'more'); ?>
	</div>

	
	<div class="field">
		<?php echo $form->labelEx($model,'payment'); ?>
		<?php echo $form->textField($model,'payment'); ?>
		<?php echo $form->error($model,'payment'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-large')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->