<div class="field">
	<?php echo $form->labelEx($model,'is_company'); ?>
	<?php echo $form->radioButtonList($model, 'is_company', $model->getIsCompanyList(), array('separator' => '')); ?>
	<?php echo $form->error($model,'is_company'); ?>
</div>

<div class="field">
    <?php echo $form->labelEx($model, 'company_name'); ?>
    <?php echo $form->textField($model, 'company_name') ?>
    <?php echo $form->error($model, 'company_name'); ?>
</div>

<div class="field">
    <?php echo $form->labelEx($model, 'number'); ?>
    <?php echo $form->textField($model, 'number') ?>
    <?php echo $form->error($model, 'number'); ?>
</div>

<div class="field">
    <?php echo $form->labelEx($model, 'experience'); ?>
    <?php echo $form->textField($model, 'experience') ?>
    <?php echo $form->error($model, 'experience'); ?>
</div>

<div class="field">
    <?php echo $form->labelEx($model, 'area'); ?>
    <?php echo $form->radioButtonList($model, 'area', $model->getAreaList(), array('separator' => '')) ?>
    <?php echo $form->error($model, 'area'); ?>
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
    <?php echo $form->labelEx($model, 'about'); ?>
    <?php echo $form->textArea($model, 'about') ?>
    <?php echo $form->error($model, 'about'); ?>
</div>