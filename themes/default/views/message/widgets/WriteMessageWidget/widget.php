<?php if ( ! Yii::app()->user->isAuthenticated() || (Yii::app()->user->isAuthenticated() && $id != Yii::app()->user->getId() )):?>
	<a href='/message/default/create/to/<?=$id?>'>Написать</a>
<?php endif;?>