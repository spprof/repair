<div class="row">
	<div class="span3">
		<div class="alert">
			<h3>Лучшие специалисты</h3>
			<div class="spec-item">
				<div class="spec-item-info">
					#432 <a href="#">Профиль</a>
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
					#291 <a href="#">Профиль</a>
				</div>	
				<div class="spec-item-rating">
						<a href="#" rel="tooltip" class="label label-warning" title="Общий рейтинг / Количество отзывов">79 / 5</a>
				</div>
				<div class="clear"></div>
				<b>Компания:</b> "Set&Setting"<br/>
				<b>Виды работ:</b> отделка, сантехника, электрика.<br/>
			</div>
			<hr>
			<div class="spec-item">
				<div class="spec-item-info">
					#291 <a href="#">Профиль</a>
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
	<div class="span9">
		<h3>Регистрация</h3>
		
		<ul class="nav nav-tabs" id="registerTab">
		 	<li class="active"><a href="#client">Для заказчиков</a></li>
			<li><a href="#spec">Для специалистов</a></li>
		</ul>

		<div class="tab-content">
		  	<div class="tab-pane active" id="client">
		  		<p>Зарегистрируйтесь, как заказчик, и вы получите возможность общаться со специалистами
		  		через личные сообщения, писать отзывы о мастерах и компаниях, влияя на их рейтинг. Также вы сможете
		  		создавать тендеры для сложных и уникальных проектов. 
		  		</p>
		  		<form class="form-horizontal">
					<div class="control-group">
					    <label class="control-label" for="inputName">Ваше имя*</label>
					    <div class="controls">
					      <input type="text" id="inputName" placeholder="Ваше имя">
					    </div>
				  	</div>
					<div class="control-group">
					    <label class="control-label" for="inputEmail">Email*</label>
					    <div class="controls">
					      <input type="text" id="inputEmail" placeholder="Email">
					    </div>
					</div>
				  	<div class="control-group">
					    <label class="control-label" for="inputType">Телефон</label>
					    <div class="controls">
					      <input type="text" id="inputType" placeholder="Телефон">
					    </div>
				  	</div>	
				  	<div class="control-group">
					    <label class="control-label" for="inputType">Город</label>
					    <div class="controls">
					      <input type="text" id="inputType" placeholder="Город">
					    </div>
				  	</div>
				  	<div class="control-group">
				    <label class="control-label" for="inputPassword">Пароль*</label>
				    <div class="controls">
				      <input type="password" id="inputPassword" placeholder="Пароль">
				    </div>
				  </div>
				  <div class="control-group">
				    <div class="controls">
				      <button type="submit" class="btn btn-inverse">Зарегистрироваться</button>
				    </div>
				  </div>
				</form>
		  	</div>
		  	<div class="tab-pane" id="spec">
		  		<p>
		  			Зарегистрируйтесь, как специалист, и о вас узнает множество потенциальных заказчиков Кирова и области. Вы сможете учавствовать
		  			в конкурсах за тендеры &ndash; сложные, уникальные и дорогие проекты.
		  		</p>
		  		<form class="form-horizontal">
					<div class="control-group">
				    	<label class="control-label" for="inputName">Ваше имя*</label>
				    	<div class="controls">
				     	 <input type="text" id="inputName" placeholder="Ваше имя">
				   		 </div>
				  	</div>
				  	<div class="control-group">
				   		 <label class="control-label" for="inputEmail">Email*</label>
				   		 <div class="controls">
				    	  <input type="text" id="inputEmail" placeholder="Email">
				   		 </div>
				 	 </div>
				  	<div class="control-group">
					    <label class="control-label" for="inputType">Телефон</label>
					    <div class="controls">
					      <input type="text" id="inputType" placeholder="Телефон">
					    </div>
				  	</div>	
				 
				 	<div class="control-group">
					    <label class="control-label" for="inputType">Вид организации</label>
					    <div class="controls">
					      <select  id="inputOrgType" name="inputType">
					      	<option>Мастер</option>
					      	<option>Команда</option>
					      	<option>Официальная компания</option>
					      </select>
					    </div>
				  	</div>
				  	<div class="control-group control-group-org" style="display: none;">
				    	<label class="control-label" for="inputOrg">Название компании</label>
				    	<div class="controls">
				     	 <input type="text" id="inputOrg" placeholder="Название компании">
				   		 </div>
				  	</div>
				  	<div class="control-group control-group-peoples" style="display: none;">
					    <label class="control-label" for="inputPeoples">Человек в команде</label>
					    <div class="controls">
					      <input type="text" id="inputPeoples" placeholder="Человек в команде">
					    </div>
				  	</div>
				  	<div class="control-group">
					    <label class="control-label" for="inputWorkType">Виды работ</label>
					    <div class="controls">
					      	<label class="checkbox">
								<input type="checkbox" value="">Отделка
							</label>
							<label class="checkbox">
								<input type="checkbox" value="">Сантехника
							</label>
							<label class="checkbox">
								<input type="checkbox" value="">Электрика
							</label>

					    </div>
				  	</div>
				  	<div class="control-group">
					    <label class="control-label" for="inputExperience">Опыт работы</label>
					    <div class="controls">
					      <input type="text" id="inputExperience" placeholder="Опыт работы">
					    </div>
				  	</div>
				  	<div class="control-group">
					    <label class="control-label" for="inputType">География работ</label>
					    <div class="controls">
					      <select id="inputCity">
					      	<option>Киров</option>
					      	<option>Киров+область</option>
					      	<option>Белая Холуница</option>
					      	<option>Кирово-Чепецк</option>
					      	<option>Котельнич</option>
					      	<option>Нолинск</option>
							<option>Омутнинск</option>
							<option>Слободской</option>
					      	<option>Советск</option>
					      	<option>Уржум</option>
					      	<option>Яранск</option>
					      </select>
					    </div>
				  	</div>
				 	<div class="control-group">
				   		<label class="control-label" for="inputPassword">Пароль*</label>
				   		<div class="controls">
				      		<input type="password" id="inputPassword" placeholder="Пароль">
				    	</div>
				  	</div>

				  	<div class="control-group">
				   		<label class="control-label" for="inputPassword">Информация о вас</label>
				   		<div class="controls">
				      		<textarea></textarea>
				    	</div>
				  	</div>
				  	
				  	<div class="control-group">
				    	<div class="controls">
				      	<label class="checkbox">
								<input type="checkbox" value=""> Получать email-уведомления о новых <a href="#">тендерах</a>
							</label>
				    	</div>
				  	</div>

				  	<div class="control-group">
				    	<div class="controls">
				      	<button type="submit" class="btn btn-inverse">Зарегистрироваться</button>
				    	</div>
				  	</div>
				</form>

		  	</div>
		</div>		
	</div>
</div>
