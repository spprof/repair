<html>
<head>
    <title><?php echo Yii::t('ResponseModule.response', CHtml::encode(Yii::app()->name) . '. Опубликован новый отзыв!'); ?></title>
</head>
<body>
    <?php echo Yii::t('ResponseModule.response', 'Новый отзыв на сайте "{site}" успешно опубликован!', array('{site}' => CHtml::encode(Yii::app()->name))); ?>
    <br/><br/>
	<a href='http://crs43.ru/response/index/view/id/<?=$model->id?>'>Ссылка на отзыв</a>
    <?php echo Yii::t('UserModule.user', 'С уважением, администрация сайта "{site}" !', array('{site}' => CHtml::encode(Yii::app()->name))); ?>
</body>
</html>