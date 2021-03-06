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
    <script type="text/javascript" src="/web/vendor/modernizr/modernizr.min.js"></script> 
    <script type="text/javascript">
    	$.browser = new Object();
	</script>  
    <title><?php echo CHtml::encode($this->pageTitle)?></title>
    
    <link rel="shortcut icon" href="/favicon.ico"/>
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/web/css/normalize.css"/>
    
    <link rel="stylesheet" type="text/css" href="/web/vendor/bootstrap/css/bootstrap-cosmo.css"/>
    
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/web/css/fonts/stylesheet.css">
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/web/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/web/css/style.css"/>
    
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/web/js/main.js"></script>
    
</head>
<body>
	<header>
		<div class="container">
			<div class='row'>
				<div class='span8 text-right'>
					<br/>
					<br/>
					<h1>Центр ремонта и строительства</h1>
					<p class="top-desc">
						 &ndash; это сервис, позволяющий наладить коммуникации между тем, кому нужен 
							качественный ремонт и специалистами в области ремонта и строительства.
					</p>
					
					<br/>

					
					<nav>
						<a href="/">Главная</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="/client/index/index/">Специалисты</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="/tender/index/index/">Заказы</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="/site/about/">О проекте</a>
					</nav>
					
				</div>
				<div class='span4'>
					<div class='text-right top-auth'>
						<?php $this->widget('application.modules.client.widgets.StatusLinkWidget', array());?>
					</div>
					<div class='logo'>
						<a href='/'><img src='<?php echo Yii::app()->theme->baseUrl; ?>/web/images/logo.png' alt=''/></a>
						<br/>
						<div class='logo-desc'>Центр ремонта и строительства</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<?php $this->widget('application.modules.client.widgets.WorkPanelWidget', array());?>
	<br/>
	<?php echo $content?>
	<footer class='container'>
		<div class='row'>
			<div class='span3'>
				<img src='<?php echo Yii::app()->theme->baseUrl; ?>/web/images/nc-home-repair.jpg' width="200" alt=''/>
			</div>
			
			<div class='span6'>
				<ul class="nav">
					<li class="active">
					<a href="/">Главная</a>
					</li>
					<li>
					<a href="/client/index/index/">Специалисты</a>
					</li>
					<li>
					<a href="/tender/index/index/">Заказы</a>
					</li>
					<li>
					<a href="/site/about/">О проекте</a>
					</li>
				</ul>
			</div>
			<div class='span3'>
				<a href="mailto:admin@crs43.ru" class="mail-to">admin@сrs43.ru</a>
				<p class="mail-to-desc">По вопросам рекламы<br> и сотрудничества</p>
			</div>
		</div>
	</footer>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter21526516 = new Ya.Metrika({id:21526516,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/21526516" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>