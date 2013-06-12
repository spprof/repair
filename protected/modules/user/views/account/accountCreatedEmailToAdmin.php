<html>
<head>
    <title><?php echo Yii::t('UserModule.user', CHtml::encode(Yii::app()->name) . '. Учетная запись создана!'); ?></title>
</head>
<body>
    <?php echo Yii::t('UserModule.user', 'Новый аккаунт на сайте "{site}" успешно создан!', array('{site}' => CHtml::encode(Yii::app()->name))); ?>
    <br/><br/>

    <?php echo Yii::t('UserModule.user', 'С уважением, администрация сайта "{site}" !', array('{site}' => CHtml::encode(Yii::app()->name))); ?>
</body>
</html>