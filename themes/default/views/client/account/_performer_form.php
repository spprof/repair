<?php echo $form->checkBoxRow($model, 'is_company', array()); ?>

<?php echo $form->textFieldRow($model, 'company_name', array()); ?>

<?php echo $form->textFieldRow($model, 'number', array('append'=>' (человек)')); ?>

<?php echo $form->textFieldRow($model, 'experience', array('append'=>' (лет)')); ?>

<?php echo $form->dropDownListRow($model, 'area', $model->getAreaList()); ?>

<div class="control-group ">
    <?php echo $form->labelEx($model, 'work_types', array('class'=>'control-label')); ?>
    <?php $this->widget('application.modules.work.widgets.WorkFormWidget', array(
    			'model' => $model,
    			'attribute' => 'work_types',
    		));
    ?>
    <?php echo $form->error($model, 'work_types'); ?>
</div>

<?php echo $form->textAreaRow($model, 'about', array('class'=>'span6', 'rows'=>5)); ?>