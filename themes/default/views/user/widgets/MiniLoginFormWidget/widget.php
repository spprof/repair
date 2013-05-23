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
		$links[1] = $this->widget('application.modules.message.components.pmwidget', array(), true);
		switch (Yii::app()->user->getState('client_type')) {
			case 'customer' : {
				$links[0] = array( 'label' => '<b>' . Yii::app()->user->nick_name . '</b>', 'url' => '/client/account/profile?type=customer', 'ico' => 'user' );
				$links[5] = array( 'label' => 'Мои тендеры', 'url' => '/tender/index/owner/');
				$links[6] = array( 'label' => 'Избранные исполнители', 'url' => '/tender/index/owner/' );
				$links[7] = array( 'label' => 'Мои отзывы', 'url' => '/response/index/owner/');
				break;
			}
			case 'performer' : {
				$links[0] = array( 'label' => '<b>' . Yii::app()->user->nick_name . '</b>', 'url' => '/client/account/profile?type=performer', 'ico' => 'user' );
				$links[5] = array( 'label' => 'Мои вакансии', 'url' => '/vacancy/index/owner/' );
				$links[6] = array( 'label' => 'Мои клиенты', 'url' => '/tender/index/owner/' );
				$links[7] = array( 'label' => 'Мои отзывы', 'url' => '/response/index/slave/');
				break;
			}
			default :
				$links[0] = array( 'label' => '<b>' . Yii::app()->user->nick_name . '</b>', 'url' => '/profile/', 'ico' => 'user' );
				$links[5] = array( 'label' => 'Админ панель', 'url' => '#', 'ico'=>'eye-open' );
		}
	?>
	<?php $links[99] = array( 'label' => 'Выход', 'url' => '/logout/', 'ico' => 'share-alt' );?>
	<ul class='client-panel'>
	<?php ksort($links)?>
	<?php foreach ($links as $link):?>
		<li>
		<?php if (is_array($link)):?>
			<a href='<?=$link['url']?>'><?php if (isset($link['ico'])):?><i class='icon-<?=$link['ico']?>'></i>&nbsp;<?php endif;?><?=$link['label']?></a>
		<?php else:?>
			<?=$link?>
		<?php endif;?>
		</li>
	<?php endforeach;?>
	</ul>
</div>
<?php endif;?>