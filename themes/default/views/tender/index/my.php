<h1>Мои заказы</h1>
<?php
    $this->breadcrumbs = array(
        'Личный кабинет' => array('/client/account/profile/'),
    	'Мои заказы'
    );

    $this->pageTitle = 'Мои заказы';
?>

<a class='btn' href='/tender/index/create'>Добавить заказ</a>

<br/>
<br/>

<?php echo $this->renderPartial('_list', array(	'data_provider' => $data_provider,));?>
