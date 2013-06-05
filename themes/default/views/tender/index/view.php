<h1><?=$model->label?></h1>
<?php $this->beginClip('work_types')?>
	<?php if ($model->work_type):?>
		<?php foreach ($model->work_type as $type):?>
			<span class="badge badge-warning"><?=$type->label?></span>
		<?php endforeach;?>
	<?php endif;?>
<?php $this->endClip()?>
<div class='row'>
	<div class='span3'>
	</div>
	<div class='span6'>
		<?php $this->widget('zii.widgets.CDetailView', 
			array(
				'data' => $model,
				'attributes' => array(
					array(
						'label' => 'Автор',
						'type' 	=> 'html',
						'value' => '<a href="/client/index/view/id/' . $model->owner->id . '">
										<i class="icon-user"></i>&nbsp;<b>' . $model->owner->nick_name . '</b>
									</a>',
					),
					array(
						'label' => 'Дата создания',
						'value' => Yii::app()->dateFormatter->format('d MMMM yyyy H:m', $model->create_date),
					),
					'term',
					array(
						'label' => 'Материалы',
						'value' => ($model->with_materials) ? 'Заказчика' : 'Исполнителя',
					),
					array(
							'label' => 'Типы работ',
							'type'  => 'html',
							'value' => $this->clips['work_types'],
					),
					'budget',
					'text',
					'more',
				),
		)); ?>
	</div>
</div>
<br/>
<?php $this->widget('application.modules.comment.widgets.CommentsListWidget', array('label' => 'Комментариев','model' => $model, 'modelId' => $model->id)); ?>
<br/>
<?php $this->widget('application.modules.comment.widgets.CommentFormWidget', array('redirectTo' => $this->createUrl('/tender/index/view/', array('id' => $model->id)), 'model' => $model, 'modelId' => $model->id)); ?>
<br/>