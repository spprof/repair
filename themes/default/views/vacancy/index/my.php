<h1>Мои заказы</h1>
<?php
    $this->breadcrumbs = array(
        'Личный кабинет' => array('/client/account/profile/'),
    	'Мои заказы'
    );

    $this->pageTitle = 'Мои заказы';
?>

<?php echo $this->renderPartial('_list', array(	'data_provider' => $data_provider,));?>
