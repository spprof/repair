<div class='row'>
	<div class='span6'>
	<h2>Личные данные</h2>
		<?php $this->widget('zii.widgets.CDetailView', 
			array(
				'data' => $model,
				'attributes' => array(
					'user.nick_name',
				),
		)); ?>
	</div>
</div>