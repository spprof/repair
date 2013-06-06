<div class='status-link-line'>
	<?php if (!Yii::app()->user->isAuthenticated()):?>
		<a href='/login/'>Войти</a>&nbsp;&nbsp;&nbsp;
		<div class="btn-group pull-right">
		  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		    Регистрация
		    <span class="caret"></span>
		  </a>
		  <ul class="dropdown-menu">
		     <li><a href="/client/account/registration?type=customer">Я заказчик</a></li>
		     <li><a href="/client/account/registration?type=performer">Я специалист</a></li>
		  </ul>
		</div>
	<?php else:?>
		<a href='/client/account/profile/'><b><?php echo Yii::app()->user->nick_name?></b></a>&nbsp;&nbsp;&nbsp;<a href='/logout/'>Выйти</a>
	<?php endif;?>
</div>