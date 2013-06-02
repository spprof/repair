<h1>Отзыв</h1>
<div>на специалиста: <a href="/client/index/view/id/<?=$model->forwho->id?>"><b><?=$model->forwho->nick_name?></b></a></div>
<br/>
<?php
    $this->breadcrumbs = array(
        'Личный кабинет' => array('/client/account/profile/'),
    	'Мои отзывы' => array('/response/index/owner'),
    	'Написать отзыв',
    );

    $this->pageTitle = 'Написать отзыв';
?>

<?php echo $this->renderPartial('_response', array(	'data' => $model, 'type' => 'forwho'));?>