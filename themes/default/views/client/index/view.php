<h1>Профиль пользователя</h1>
<div class='row'>
	<div class='span6'>
	<h2>Личные данные</h2>
	<?php $this->widget('zii.widgets.CDetailView', 
		array(
			'data' => $model,
			'attributes' => array(
				'nick_name',
				'first_name',
				'email',
				'phone',
				'number',
				'experience',
				'area',
				'is_company',
				'company_name',
				'work_types',
				'about',
			),
	)); ?>
	</div>
	<div class='span6'>
		<h2>Отзывы</h2>
		<?php $this->widget('application.modules.response.widgets.ResponseListWidget', array('id' => $model->id)); ?>
	</div>
</div>