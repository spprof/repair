<h1>Создать тендер</h1>
<?php
    $this->breadcrumbs = array(
        'Личный кабинет' => array('/client/account/profile/'),
    	'Создать тендер'
    );

    $this->pageTitle = 'Создать тендер';
?>

<?php echo $this->renderPartial('_form', array(	'model' => $model,));?>
