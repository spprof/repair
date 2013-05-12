<h1>Изменить тендер</h1>
<?php
    $this->breadcrumbs = array(
        'Личный кабинет' => array('/client/account/profile/'),
    	'Изменить тендер'
    );

    $this->pageTitle = 'Изменить тендер';
?>

<?php echo $this->renderPartial('_form', array(	'model' => $model,));?>
