<h1>Список тендеров</h1>
<?php
    $this->breadcrumbs = array(
        'Главная' => array('/'),
    	'Список тендеров'
    );

    $this->pageTitle = 'Список тендеров';
?>

<?php echo $this->renderPartial('_list', array(	'data_provider' => $data_provider,));?>
