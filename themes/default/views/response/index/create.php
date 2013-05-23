<h1>Написать отзыв</h1>
<div>на специалиста: <b><?=$performer->user->nick_name?></b>.</div>
<br/>
<br/>
<?php
    $this->breadcrumbs = array(
        'Личный кабинет' => array('/client/account/profile/'),
    	'Написать отзыв'
    );

    $this->pageTitle = 'Написать отзыв';
?>


<?php echo $this->renderPartial('_form', array(	'model' => $model,));?>
