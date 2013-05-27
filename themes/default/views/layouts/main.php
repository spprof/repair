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
    <script type="text/javascript" src="/web/vendor/jquery/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/web/vendor/bootstrap/js/bootstrap.js"></script> 
    <script type="text/javascript" src="/web/vendor/modernizr/modernizr.min.js"></script> 
    <script type="text/javascript">
    	$.browser = new Object();
	</script> 
    <script type="text/javascript" src="/web/vendor/modernizr/modernizr.min.js"></script> 
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    
    <link rel="shortcut icon" href="/favicon.ico"/>
    
    <link rel="stylesheet" type="text/css" href="/web/vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="/web/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/web/css/form.css"/>
    
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
		<div class="row top">
			<div class="span3 text-center">
				<a href="/"><img class="logo" alt='HandsHammer' src="<?php echo Yii::app()->theme->baseUrl; ?>/web/images/logo3.png" /></a>
				<!--<div class="brand"><a href="/">BRS43 - биржа строительных и ремонтных услуг Кирова</a></div>-->
			</div>
			<div class="span6">
				<div class="hero-unit">
					<p><strong>BRS43.RU</strong> &ndash; это биржа строительных и ремонтных услуг Кирова.
						Сервис для общения заказчиков и специалистов в области ремонта квартир, сантехники, электрики,
						строительства, доставки.</p>
					<p><a class="btn btn-warning">Узнать больше &raquo;</a></p>
				</div>
			</div>
			<div class="span3">
				<?php $this->widget('application.modules.user.widgets.MiniLoginFormWidget');?>
			</div>
		</div>
		
		<hr>
		<?php $this->widget('YFlashMessages');?>
		<?=$content; ?>
		
		<footer>
			<div class="row">
				<div class="span3">
					<p> <strong>BRS43.RU</strong> &ndash; биржа строительных и ремонтных услгу &copy; 2013</p>
				</div>
				<div class="span3">
					<a href="#">Специалисты</a><br/>
					<a href="#">Тендеры</a><br/>
					<a href="#">Вопросы и ответы</a><br/>
					<a href="#">Работа</a><br/>
					<a href="#">О проекте</a><br/>
				</div>
				<div class="span3">
					По вопросам рекламы и сотрудничества пишите на 
					<a href="mailto:info@handshammer.ru">info@brs43.ru</a>
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