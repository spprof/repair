<h1>Создать заказ</h1>
<?php
    $this->breadcrumbs = array(
        'Личный кабинет' => array('/client/account/profile/'),
    	'Создать заказ'
    );

    $this->pageTitle = 'Создать заказ';
?>

<a href='/tender/index/owner/'>Мои заказы</a>
<br/>
<br/>
<?php echo $this->renderPartial('_form', array(	'model' => $model,));?>
