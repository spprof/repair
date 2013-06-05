<div class="container">
	<br/>
	<div class='row'>

		<div class='span4'>
			<img src='<?php echo Yii::app()->theme->baseUrl; ?>/web/images/rem.jpg' width="250" alt=''/>
		</div>
		<div class='span8'>
			<div style=' padding: 25px;'>
				<p>
				Для того чтобы начать пользоваться всеми сервисами нашего сайта в качестве <b>заказчика</b> или <b>специалиста по ремонту и строительству</b> пройдите процедуру регистрации
				</p>
				<br/>
				<div class='text-center'>
					<div class="btn-group">
					  <a class="btn dropdown-toggle btn-primary btn-large" data-toggle="dropdown" href="#">
					    Регистрация
					    <span class="caret"></span>
					  </a>
					  <ul class="dropdown-menu">
					     <li><a href="/client/account/registration?type=customer">Я заказчик</a></li>
		     			 <li><a href="/client/account/registration?type=performer">Я исполнитель</a></li>
					  </ul>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<br/>
</div>

<div style='background-color: #eee; padding: 25px 0'>
	<div class="container">
		<p class='clearfix'>
				Если вам нужен <b>ремонт</b>, какие-либо <b>строительные работы</b>, и вы хотите найти подходящих <b>мастеров</b> - 
				воспользуйтесь формой ниже. 
		</p>
	</div>
</div>


<div >
	<div class="container">
		<br/>
		<h2>Выберите вид работ</h2>
		<?php $this->widget('application.modules.client.widgets.PerformerSearchWidget', array('params' =>array(), 'view' => 'main'));?>
	</div>
</div>

<br/>

<div style='background-color: #eee'>
	<div class='container'>
		<div class='row'>
		
			<div class='span3'>
				<h4>Последние заказы</h4>
				<br/>				
				<?php $this->widget('application.modules.tender.widgets.TenderBarWidget', array());?>
				
			</div>
			
			<div class='span6' style='background-color: #fff'>
				<div style='padding: 25px;'>
					<div style='padding-bottom: 20px; margin-bottom: 20px; border-bottom: 8px dotted #ccc'>
						<p>
							Вам нужен комплексный ремонт или у вас нестандартная и сложная задача? Создайте заказ(нужна регистрация) – открытый конкурс для всех специалистов, зарегистрированных на нашем сайте. 
						</p>
						<p class='text-center'>
							<a href='/tender/index/create' class="btn btn-inverse btn-large">Создать заказ</a>
						</p>
					</div>
					<br/>
					<div >
						<p>
						Мастера, бригады, организации, сервис BRS43.ru создан специально для вас. Заполните минимальную инфрмацию о себе и тысячи потеницальных клиентов Кирова и области будут знать о вас и ваших работах!
						</p>
						<br/>
						<p class='text-center'>
							<a href='/client/account/registration?type=performer' class="btn btn-inverse btn-large">Регистрация</a>
						</p>
					</div>							
				</div>
				<br/>
			</div>
			
			<div class='span3'>
				<h4>Лучшие специалисты</h4>
				<br/>
				
				<?php $this->widget('application.modules.client.widgets.PerformerBarWidget', array());?>
				
			</div>
			
		</div>
	</div>
</div>
	
<?php /*
<div class="row">
	<div class="span6">
		<h2 >Для заказчиков</h2>
		<div class="alert">
			<h3><!--<i class="icon-search"></i>--> Поиск специалиста</h3>
		  <strong></strong>Если вам нужен <b>ремонт</b>, выполнение <b>строительных работ</b>, и вы хотите 
		  найти подходящих <b>специалистов</b> &ndash; воспользуйтесь формой ниже. 
	 	  <?php $this->widget('application.modules.client.widgets.PerformerSearchWidget', array('params' =>array(), 'view' => 'main'));?>
		</div>
		<br/>
		
			<div class="alert">
				<h3><!--<i class="icon-plus-sign"></i>-->Создание заказа</h3>
				<p>
					Вам нужен комплексный ремонт или у вас нестандартная и сложная задача?
					Создайте <b>заказ</b>(нужна регистрация) &ndash; <b>открытый конкурс</b> для всех специалистов, 
					зарегистрированных на нашем сайте.<br/>
			  		При заполнении заказа подробно опишите ваш проект, укажите сроки выполнения работ, примерный бюджет.
			  		Специалисты нашего сайта сделают вам различные предложения, среди которых вы сможете выбрать оптимальное
			  		и заключить договор.
			 </p>
			<p><button class="btn btn-inverse">Создать заказ</button></p>
			</div>

			<div class="alert">
				<h3>Лучшие специалисты</h3>
				<div class="spec-item">
					<div class="spec-item-info">
						#432 <a href="#">Профиль</a> <a href="#">Отправить сообщение</a>
					</div>	
					<div class="spec-item-rating">
							<a href="#" rel="tooltip" class="label label-warning" title="Общий рейтинг / Количество отзывов">120 / 8</a>
					</div>
					<div class="clear"></div>
					<b>Контактное лицо:</b> Роман<br/>
					<b>Виды работ:</b> установка окон, установка дверей.<br/>
				</div>
				<hr>
				<div class="spec-item">
					<div class="spec-item-info">
						#291 <a href="#">Профиль</a> <a href="#">Отправить сообщение</a>
					</div>	
					<div class="spec-item-rating">
							<a href="#" rel="tooltip" class="label label-warning" title="Общий рейтинг / Количество отзывов">79 / 5</a>
					</div>
					<div class="clear"></div>
					<b>Компания:</b> "Set&Setting"<br/>
					<b>Виды работ:</b> отделка, сантехника, электрика.<br/>
				</div>
			</div>
		
	</div>
	<div class="span6">
		<h2>Для исполнителей</h2>

		<div class="alert">
			<h3><!--<i class="icon-user"></i>--> Зарегистрируйтесь, как специалист</h3>
		  	<p>
			  <strong></strong>Если вы <b>мастер строительных и ремонтных работ</b>, то зарегистрируйтесь
			  на нашем сайте, участвуйте в общем рейтинге, заполняйте портфолио, участвуйте в заказах и мы обеспечим вас
			  <b>стабильной работой</b>.
			</p>
			<a href='/client/account/registration?type=performer' class="btn btn-inverse btn-large">Регистрация</a><br/>
		</div>
		<br/>
		<div class="alert">
			<h3>Последние заказы</h3>

				<div class="tender-item">
					<div class="tender-item-info">
						№12 <a href="#">Профиль автора</a> <a href="#">Отправить сообщение</a>
					</div>	
					<div class="clear"></div>
					<b>Контактное лицо:</b> Роман<br/>
					<b>Виды работ:</b> установка окон, установка дверей.<br/>
					<b>Краткое описание:</b> необходимо установить окна и двери, но не стандартно, а по горизонтали%).<br/>
					<a href="#">Подробнее &rarr;</a>
				</div>
				<hr>
				<div class="tender-item">
					<div class="tender-item-info">
						№12 <a href="#">Профиль автора</a> <a href="#">Отправить сообщение</a>
					</div>	
					<div class="clear"></div>
					<b>Контактное лицо:</b> Роман<br/>
					<b>Виды работ:</b> установка окон, установка дверей.<br/>
					<b>Краткое описание:</b> необходимо установить окна и двери, но не стандартно, а по горизонтали%).<br/>
					<a href="#">Подробнее &rarr;</a>
				</div>
		</div>
			
		<div class="alert">
			<h3><!--<i class="icon-wrench"></i>--> Поиск работы</h3>
			<p>
				Вы отличный специалист в области ремонта и строительства? Возможно именно вас ищут компании и коллективы
				профессионалов нашего города! Заходите в раздел <a href="#">поиск работы</a>, отвечайте на вакансии и возможно имеенно вы
				будете исполнителем следующего заказа. 
			</p>
			<h4>Последние вакансии</h4>
			<ul>
				<li><a href="#"><strong>Специалист отделочных работ</strong></a>. 15 мая. График работы 5х2. Полная занятость. Возможно командировки по Кировкой области.
					Оплата по факту.
				</li>
				<li><a href="#"><strong>Специалист отделочных работ</strong></a>. 14 мая. График работы 5х2. Полная занятость. Возможно командировки по Кировкой области.
					Оплата по факту.
				</li>
			</ul>
		</div>
	</div>
</div>
*/
?>