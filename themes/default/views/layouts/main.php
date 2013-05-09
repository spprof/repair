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
						<li class="active"><a href="#">Главная</a></li>
						<li><a href="#about">Исполнители</a></li>
						<li><a href="#contact">Тендеры</a></li>
						<li><a href="#contact">Вопросы</a></li>
						<li><a href="#contact">Найти работу</a></li>
						<li><a href="#contact">О проекте</a></li>
					</ul>
					<form class="navbar-form pull-right">
						<input class="span1" type="text" placeholder="Email">
						<input class="span1" type="password" placeholder="Пароль">
						<button type="submit" class="btn">Вход</button>
					</form>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	
	<div id="content" class="container">
		
		<?=$content; ?>
		
		<hr/>
		
		<footer>
			<p>&copy; Биржа строительных и ремонтных работ 2013</p>
		</footer>
	</div> <!-- /container -->
</body>
</html>