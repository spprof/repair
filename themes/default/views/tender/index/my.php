<h1>Мои тендеры</h1>
<?php
    $this->breadcrumbs = array(
        'Личный кабинет' => array('/client/account/profile/'),
    	'Мои тендеры'
    );

    $this->pageTitle = 'Мои тендеры';
?>

<?php echo $this->renderPartial('_list', array(	'data_provider' => $data_provider,));?>
