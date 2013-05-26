<?php
	$this->breadcrumbs += array(MessageModule::t('Входящие сообщения')); 
?>
<h2><?php echo MessageModule::t('Входящие сообщения'); ?></h2>

<?php if (Yii::app()->user->hasFlash('success')): ?>
	<div class="flash-success">
       <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php 
    $this->widget('bootstrap.widgets.TbGridView', array(
    	'type' => 'hover',
	    'dataProvider'=>$dataProvider,
	    'template'=>"{items}",
    	'rowCssClassExpression'=>'$data->read?"row-red":"row-unred"',
    	'htmlOptions'=>array('style'=>'cursor: pointer;'),
    	'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('/message/default/view/', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}",
	    'columns'=> array(
			array(
					'name' => 'sender_id',
					'type' => 'text',
					'value' => '$data->senderName'
			),
			array(
				'name' => 'created',
				'value' => 'Yii::app()->dateFormatter->format("yyy-MM-dd HH:mm:ss", $data->created)'
			),
			'subject:text',
		),
    ));
?>