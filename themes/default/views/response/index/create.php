<h1>Написать отзыв</h1>
<div>на специалиста: <a href="/client/index/view/id/<?=$performer->user->id?>"><b><?=$performer->user->nick_name?></b></a></div>
<hr/>
<?php
    $this->breadcrumbs = array(
        'Личный кабинет' => array('/client/account/profile/'),
    	'Написать отзыв'
    );

    $this->pageTitle = 'Написать отзыв';
?>

<?php echo $this->renderPartial('_form', array(	'model' => $model,));?>
