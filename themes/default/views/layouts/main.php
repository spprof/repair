<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="UTF-8"/>
    <meta name="keywords" content="<?php echo $this->keywords; ?>"/>
    <meta name="description" content="<?php echo $this->description; ?>"/>
    <meta name="viewport" content="width=device-width">
    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    
    <link rel="shortcut icon" href="/favicon.ico"/>
    
    <link rel="stylesheet" type="text/css" href="/web/vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="/web/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/web/css/form.css"/>
    
    <script type="text/javascript" src="/web/vendor/jquery/jquery-1.9.1.min.js"></script> 
    <script type="text/javascript" src="/web/vendor/bootstrap/js/bootstrap.js"></script> 
    <script type="text/javascript" src="/web/vendor/modernizr/modernizr.min.js"></script> 
    <script type="text/javascript" src="/web/js/common.js"></script>
    
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				   <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li class="active"><a href="/">Главная</a></li>
						<li><a href="/index.php?r=site/specialists">Специалисты</a></li>
						<li><a href="#contact">Тендеры</a></li>
						<li><a href="#contact">Вопросы и ответы</a></li>
						<li><a href="#contact">Найти работу</a></li>
						<li><a href="#contact">О проекте</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>

	<div id="content" class="container">
		<div class="row">
			<div class="span3 text-center">
				<a href="/"><img class="logo" src="<?php echo Yii::app()->theme->baseUrl; ?>/web/images/logo1.png" /></a>
				<div class="brand"><a href="/">HandsHammer - биржа строительных и ремонтных работ г.Кирова</a></div>
			</div>
			<div class="span6">
				<div class="hero-unit">
					<p><strong>HandsHammer</strong> &ndash; это сервис, позволяющий наладить коммуникации между тему, кому нужен 
						качественный ремонт и специалистами в области ремонта и строительства.</p>
					<br/>
					<p><a class="btn btn-warning">Узнать больше &raquo;</a></p>
				</div>
			</div>
			<div class="span3">
				<div class="alert">
					<div style="margin-bottom: 5px;"><strong>Вход на сайт</strong></div>
					<form  class="form-horizontal">
						<div class="control-group">
								<input type="text" id="inputEmail" class="input-medium" placeholder="Email">
						</div>
						<div class="control-group">
						      <input type="password" id="inputPassword" class="input-medium" placeholder="Пароль">
						</div>
						<div class="control-group">
						        <input type="checkbox"> Запомнить
						 </div>
						 <div class="control-group">
						 	<button type="submit" class="btn btn-inverse">Вход</button>
						 	<a href="#" class="btn btn-warning">Регистрация</a>
						 </div>
						 
					</form>
				</div>
			</div>
		</div>
		
		<?=$content; ?>
		
		<hr/>
		
		<footer>
			<div class="row">
				<div class="span6">
					<p> <strong>HandsHammer</strong> &ndash; биржа строительных и ремонтных работ. &copy; 2013</p>
				</div>
				<div class="span3">
					По вопросам рекламы и сотрудничества пишите на <a href="mailto:info@handshammer.ru">info@handshammer.ru</a>
				</div>
				<div class="span3">
				
				<div style="text-align: center;">
					<a href="http://lepotart.ru/" target="_blank">
						<img style="width: 40px;" src="http://lepotart.ru/assets/images/logo.png" alt="Lepoart"></a><br/>
					<a href="http://lepotart.ru/" target="_blank"><small>Разработка сайта – «Lepotart»</small></a>
				</div>
			</div>
			</div>
		</footer>
	</div> <!-- /container -->
</body>
</html>