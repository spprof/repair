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
				array(
					'label' => 'Имя (никнэйм)',
					'type'  => 'html',
					'value' => '<span class="label label-info">' . $model->user->nick_name . '</span>',
				),
				array(
					'label' => 'Контактный e-mail',
					'value' => $model->user->email,
				),
				'phone',
				array(
					'label' => 'Количество человек в группе',
					'type'  => 'html',
					'value' => '<span class="badge">' . $model->number . '</span>',
				),
				array(
						'label' => 'Опыт (лет)',
						'type'  => 'html',
						'value' => '<span class="badge">' . $model->experience . '</span>',
				),
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