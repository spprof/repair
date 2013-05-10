<h1>Профиль пользователя</h1>
<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'registration-form'));?>
    <?php echo $form->errorSummary($model); ?>
    
    <div class="field">
        <?php echo $form->labelEx($model, 'first_name'); ?>
        <?php echo $form->textField($model, 'first_name') ?>
        <?php echo $form->error($model, 'first_name'); ?>
    </div>
    
    <div class="field">
        <?php echo $form->labelEx($model, 'phone'); ?>
        <?php echo $form->textField($model, 'phone') ?>
        <?php echo $form->error($model, 'phone'); ?>
    </div>
    
    <?php echo $this->renderPartial("_{$type}_form", array('model' => $model, 'form' => $form)); ?> 
    
    <div class="field">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password');?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="field">
        <?php echo $form->labelEx($model, 'cPassword'); ?>
        <?php echo $form->passwordField($model, 'cPassword');?>
        <?php echo $form->error($model, 'cPassword'); ?>
    </div>
    
    <br/>
    <div class="submit">
        <?php echo CHtml::submitButton('Сохранить', array('class' => 'btn btn-large')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->