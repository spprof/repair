<html>
<head>
    <title><?php echo Yii::t('MessageModule.response', CHtml::encode(Yii::app()->name) . '. У Вас новое сообщение!'); ?></title>
</head>
<body>
    <?php echo Yii::t('ResponseModule.response', 'У Вас новое сообщение на сайте "{site}"!', array('{site}' => CHtml::encode(Yii::app()->name))); ?>
    <br/><br/>
    <?php echo Yii::t('UserModule.user', 'С уважением, администрация сайта "{site}" !', array('{site}' => CHtml::encode(Yii::app()->name))); ?>
</body>
</html>