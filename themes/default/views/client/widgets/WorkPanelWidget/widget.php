<?php if (Yii::app()->user->isAuthenticated()):?>
	<?php $links = array();?>
	<?php
		$links[1] = $this->widget('application.modules.message.components.pmwidget', array(), true);
		switch (Yii::app()->user->getState('client_type')) {
			case 'customer' : {
				$links[0] = array( 'label' => 'Профиль', 'url' => '/client/account/profile//' );
				$links[5] = array( 'label' => 'Мои заказы', 'url' => '/tender/index/owner/');
				//$links[6] = array( 'label' => 'Избранные специалисты', 'url' => '/tender/index/owner/' );
				$links[7] = array( 'label' => 'Мои отзывы', 'url' => '/response/index/owner/');
				break;
			}
			case 'performer' : {
				$links[0] = array( 'label' => 'Профиль', 'url' => '/client/account/profile/' );
				$links[5] = array( 'label' => 'Мои вакансии', 'url' => '/vacancy/index/owner/' );
				$links[6] = array( 'label' => 'Мои клиенты', 'url' => '/tender/index/owner/' );
				$links[7] = array( 'label' => 'Мои отзывы', 'url' => '/response/index/slave/');
				break;
			}
			default :
				$links[0] = array( 'label' => 'Профиль', 'url' => '/profile/' );
				$links[5] = array( 'label' => 'Админ панель', 'url' => '/yupe/backend' );
		}
	?>
	<?php $links[99] = array( 'label' => 'Выход', 'url' => '/logout/' );?>
	<div class='client-panel container'>
		<div class='row'>
			<div class='span8 text-right'>
			<?php ksort($links)?>
			<?php $first = true?>
			<?php foreach ($links as $link):?>
				<?php if (! $first):?>
				&nbsp;|&nbsp;
				<?php endif;?>
				<?php $first = false?> 
				<?php if (is_array($link)):?>
					<a href='<?=$link['url']?>'><?php if (isset($link['ico'])):?><i class='icon-<?=$link['ico']?>'></i>&nbsp;<?php endif;?><?=$link['label']?></a>
				<?php else:?>
					<?=$link?>
				<?php endif;?>
			<?php endforeach;?>
			</div>
		</div>
	</div>
<?php endif;?>