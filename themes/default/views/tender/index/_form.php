<?php 
$form = $this->beginWidget('application.modules.yupe.extensions.booster.widgets.TbActiveForm', array(
	'id'=>'horizontalForm',
	'type'=>'horizontal',
)); ?>
	
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model, 'label', array()); ?>

	<div class="control-group ">
	    <?php echo $form->labelEx($model, 'work_types', array('class'=>'control-label')); ?>
	    <?php $this->widget('application.modules.work.widgets.WorkFormWidget', array(
	    			'model' => $model,
	    			'attribute' => 'work_types',
	    		));
	    ?>
	    <?php echo $form->error($model, 'work_types'); ?>
	</div>
	
	<?php echo $form->checkBoxRow($model, 'with_materials', array()); ?>
	
	<?php echo $form->textFieldRow($model, 'budget', array()); ?>
	
	<?php echo $form->textAreaRow($model, 'text', array('class'=>'span8', 'rows'=>5)); ?>
	
	<?php echo $form->textFieldRow($model, 'term', array()); ?>
	
	<?php echo $form->textAreaRow($model, 'more', array('class'=>'span8', 'rows'=>5)); ?>
	
	<div class="form-actions">
		<p class="note">Поля, помеченные <span class="required">*</span>, обязательны для заполнения.</p>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Сохранить')); ?>
	</div>
	
<?php $this->endWidget(); ?>