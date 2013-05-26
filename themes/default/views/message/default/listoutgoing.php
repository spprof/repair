<?php
/**
 * @var CActiveDataProvider $dataProvider
 * @var DefaultController $this
 */
$this->breadcrumbs += array(MessageModule::t('Исходящие сообщения'));
?>
<h2><?php echo MessageModule::t('Исходящие сообщения'); ?></h2>

<?php 
    $this->widget('bootstrap.widgets.TbGridView', array(
    	'type' => 'hover',
	    'dataProvider'=>$dataProvider,
    	'rowCssClassExpression'=>'$data->read?"row-red":"row-unred"',
	    'template'=>"{items}",
    	'htmlOptions'=>array('style'=>'cursor: pointer;'),
    	'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('/message/default/view/', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}",
	    'columns'=> array(
			array(
					'name' => 'recipient_id',
					'value' => 'Yii::app()->controller->module->getUserName($data->recipient);'
			),
			array(
					'name' => 'created',
					'value' => 'Yii::app()->dateFormatter->format("yyy-MM-dd HH:mm:ss", $data->created)'
			),
			'subject',
		),
    ));
?>

