<?php if (!Yii::app()->user->isAuthenticated()):?>


<div class="form alert">
	<div style="margin-bottom: 5px;"><strong>Вход на сайт</strong></div>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'minilogin-form',
		'enableAjaxValidation'=>false,
		'action' => '/login/',
		'htmlOptions' => array('class' => 'form-horizontal'),
	)); ?>
		<div class="control-group">
			<?php echo $form->textField($model,'email',array('size'=>32,'maxlength'=>32, 'class'=>'input-medium', 'placeholder' => 'Email')); ?>
		</div>
		<div class="control-group">
		      <?php echo $form->passwordField($model,'password',array('class'=>'input-medium', 'placeholder' => 'Пароль')); ?>
		</div>
		
		<div class="control-group">
			<input type="checkbox"> Запомнить
		</div>
		 <div class="control-group">
		 	<button type="submit" class="btn btn-inverse">Вход</button>
		 	<a href="#" class="btn btn-warning">Регистрация</a>
		 </div>
		 
	<?php $this->endWidget(); ?>
</div>

<?php else:?>
<div class="alert">

	<?php $links = array();?>
	<?php
		switch (Yii::app()->user->getState('client_type')) {
			case 'customer' : {
				$links[] = array( 'label' => '<b>' . Yii::app()->user->nick_name . '</b>', 'url' => '/client/account/profile?type=customer', 'ico' => 'user' );
				$links[] = array( 'label' => 'Мои сообщения', 'url' => '/client/account/messages/', 'ico' => 'envelope' );
				$links[] = array( 'label' => 'Мои тендеры', 'url' => '/tender/index/owner/', 'ico' => 'home' );
				$links[] = array( 'label' => 'Избранные исполнители', 'url' => '/tender/index/owner/', 'ico' => 'star' );
				break;
			}
			case 'performer' : {
				$links[] = array( 'label' => '<b>' . Yii::app()->user->nick_name . '</b>', 'url' => '/client/account/profile?type=performer', 'ico' => 'user' );
				$links[] = array( 'label' => 'Мои сообщения', 'url' => '/client/account/messages/', 'ico' => 'envelope' );
				$links[] = array( 'label' => 'Мои вакансии', 'url' => '/vacancy/index/owner/', 'ico' => 'volume-up' );
				$links[] = array( 'label' => 'Мои клиенты', 'url' => '/tender/index/owner/', 'ico' => 'star' );
				break;
			}
			default :
				$links[] = array( 'label' => '<b>' . Yii::app()->user->nick_name . '</b>', 'url' => '/profile/', 'ico' => 'user' );
				$links[] = array( 'label' => 'Админ панель', 'url' => '#', 'ico'=>'eye-open' );
				$links[] = array( 'label' => 'Мои сообщения', 'url' => '/client/account/messages/', 'ico' => 'envelope' );
		}
	?>
	<?php $links[] = array( 'label' => 'Выход', 'url' => '/logout/', 'ico' => 'share-alt' );?>
	<ul class='client-panel'>
	<?php foreach ($links as $link):?>
		<li><a href='<?=$link['url']?>'><i class='icon-<?=(isset($link['ico'])) ? $link['ico'] : ''?>'></i>&nbsp;<?=$link['label']?></a></li>
	<?php endforeach;?>
	</ul>
</div>
<?php endif;?>