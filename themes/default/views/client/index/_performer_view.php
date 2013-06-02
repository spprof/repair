<div class='row'>
	<div class='span6'>
	<?php $area = $model->getAreaList()?>
	
	<?php $this->beginClip('work_types')?>
		<?php if ($model->work_type):?>
			<?php foreach ($model->work_type as $type):?>
				<span class="badge badge-warning"><?=$type->label?></span>
			<?php endforeach;?>
		<?php endif;?>
	<?php $this->endClip()?>
	
	<h2>Личные данные</h2>
		<?php $attributes =  array(
				array(
					'label' => 'Имя (никнэйм)',
					'type'  => 'html',
					'value' => '<b>' . $model->user->nick_name . '</b>',
				),
				array(
					'label' => 'Контактный e-mail',
					'value' => $model->user->email,
				),
				'phone',
				array(
					'label' => 'Количество человек в группе',
					'type'  => 'html',
					'value' => '<span class="badge badge-inverse">' . $model->number . '</span>',
				),
				array(
						'label' => 'Опыт (лет)',
						'type'  => 'html',
						'value' => '<span class="badge badge-success">' . $model->experience . '</span>',
				),
				array(
					'label' => 'География работ',
					'value' => $area[$model->area],
				),
				'company_name' => 'company_name',
				array(
					'label' => 'Типы работ',
					'type'  => 'html',
					'value' => $this->clips['work_types'],
				),
				'about',
			);?>
		<?php if (! $model->is_company):?>
			<?php unset($attributes['company_name'])?>
		<?php endif;?>
		<?php $this->widget('zii.widgets.CDetailView', 
				array(
					'data' => $model,
					'attributes' => $attributes,
			  )); 	
		?>
		<a href='/message/default/create/to/<?=$model->id?>'>Написать</a>
		<a href='/response/index/create/id/<?=$model->id?>'>Оставить отзыв</a>
	</div>
	<div class='span6'>
		<h2>Отзывы</h2>
		<?php $this->widget('application.modules.response.widgets.ResponseListWidget', array('id' => $model->id)); ?>
		<br/>
	</div>
</div>
<br/>