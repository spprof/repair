<?php $this->pageTitle = 'CRS43 - центр ремонта и строительсва в Кирове'; ?>
<?php $this->keywords = 'Ремонт, строительство, строительные работы, ремонтные работы, ремонт квартиры, специалист по ремонту, строительная бригада, строительная компания, строительная организация, услуги ремонта'; ?>
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
		     			 <li><a href="/client/account/registration?type=performer">Я специалист</a></li>
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
							Вам нужен комплексный ремонт или у вас нестандартная и сложная задача? Создайте заказ – открытый конкурс для всех специалистов, зарегистрированных на нашем сайте. 
						</p>
						<p class='text-center'>
							<a href='/tender/index/create' class="btn btn-inverse btn-large">Создать заказ</a>
						</p>
					</div>
					<br/>
					<div >
						<p>
						Мастера, бригады, организации, сервис CRS43.ru создан специально для вас. Заполните информацию о себе и тысячи потеницальных клиентов Кирова и области будут знать о вас и ваших работах!
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