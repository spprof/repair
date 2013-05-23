<h1>Мои отзывы</h1>
<?php
    $this->breadcrumbs = array(
        'Личный кабинет' => array('/client/account/profile/'),
    	'Мои отзывы'
    );

    $this->pageTitle = 'Мои отзывы';
?>

<?php echo $this->renderPartial('_list', array(	'data_provider' => $data_provider,));?>
