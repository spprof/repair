	<div class="field">
        <?php echo $form->labelEx($model, 'city_id'); ?>
        <?php echo $form->dropDownList($model, 'city_id', $model->getCityList()) ?>
        <?php echo $form->error($model, 'city_id'); ?>
    </div>
    
    <div class="field">
        <?php echo $form->labelEx($model, 'address'); ?>
        <?php echo $form->textArea($model, 'address') ?>
        <?php echo $form->error($model, 'address'); ?>
    </div>