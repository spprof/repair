<div class='row'>
	<div class='span6'>
	<?php $area = $model->getAreaList()?>
	
	<?php $this->beginClip('work_types')?>
		<?php if ($model->work_type):?>
			<?php foreach ($model->work_type as $type):?>
				<span class="label label-warning"><?=$type->label?></span>
			<?php endforeach;?>
		<?php endif;?>
	<?php $this->endClip()?>
	
	<h2>Личные данные</h2>
		<?php $attributes =  array(
				'user.nick_name',
				array(
					'label' => 'Контактный e-mail',
					'value' => $model->user->email,
				),
				'phone',
				'number',
				'experience',
				array(
					'label' => 'География работ',
					'value' => $area[$model->area],
				),
				'company_name',
				array(
					'label' => 'Типы работ',
					'type'  => 'html',
					'value' => $this->clips['work_types'],
				),
				'about',
			);?>
		<?php if ($model->is_company):?>
			unset($attributes['company_name']);
		<?php endif;?>
		<?php $this->widget('zii.widgets.CDetailView', 
				array(
					'data' => $model,
					'attributes' => $attributes,
			  )); 	
		?>
	</div>
	<div class='span6'>
		<h2>Отзывы</h2>
		<?php $this->widget('application.modules.response.widgets.ResponseListWidget', array('id' => $model->id)); ?>
	</div>
</div>