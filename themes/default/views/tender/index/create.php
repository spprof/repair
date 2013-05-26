<h1>Создать тендер</h1>
<?php
    $this->breadcrumbs = array(
        'Личный кабинет' => array('/client/account/profile/'),
    	'Создать тендер'
    );

    $this->pageTitle = 'Создать тендер';
?>

<a href='/tender/index/owner/'>Мои тендеры</a>
<br/>
<br/>
<?php echo $this->renderPartial('_form', array(	'model' => $model,));?>
