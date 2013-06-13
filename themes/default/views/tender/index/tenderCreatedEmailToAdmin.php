<html>
<head>
    <title><?php echo Yii::t('TenderModule.tender', CHtml::encode(Yii::app()->name) . '. Создан новый тендер!'); ?></title>
</head>
<body>
    <?php echo Yii::t('UserModule.user', 'Новый тендер на сайте "{site}" успешно создан!', array('{site}' => CHtml::encode(Yii::app()->name))); ?>
    <br/><br/>
	<a href='http://crs43.ru/tender/index/view/id/<?=$model->id?>'>Ссылка</a>
    <?php echo Yii::t('UserModule.user', 'С уважением, администрация сайта "{site}" !', array('{site}' => CHtml::encode(Yii::app()->name))); ?>
</body>
</html>