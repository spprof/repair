<h1>Список заказов</h1>
<?php
    $this->breadcrumbs = array(
        'Главная' => array('/'),
    	'Список заказов'
    );

    $this->pageTitle = 'Список заказов';
?>

<?php echo $this->renderPartial('_list', array(	'data_provider' => $data_provider,));?>
