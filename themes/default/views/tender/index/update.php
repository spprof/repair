<h1>Изменить заказ</h1>
<?php
    $this->breadcrumbs = array(
        'Личный кабинет' => array('/client/account/profile/'),
    	'Изменить заказ'
    );

    $this->pageTitle = 'Изменить заказ';
?>

<?php echo $this->renderPartial('_form', array(	'model' => $model,));?>
