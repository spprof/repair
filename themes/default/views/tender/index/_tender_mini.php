<div class='tender-mini'>
	<div class='row'>
		<div class='span6 tender-mini-label'><a href='/tender/index/view/id/<?=$data->id?>'><b><?=$data->label?></b></a></div>
		<div class='span3 text-right'>
			<a href="/client/index/view/id/<?=$data->owner->id?>"><i class="icon-user"></i> <b><?=$data->owner->nick_name?></b></a>&nbsp;
			<?php $this->widget('application.modules.message.components.WriteMessageWidget', array('id'=>$data->owner->id));?>
		</div>
		<div class='span3 text-right'><?=$data->create_date?></div>
		
	</div>
	<div class='row'>
		<div class='span4'>
			<?php if ($data->term):?>
				<div><b>Срок:</b> <?=$data->term?></div>
			<?php endif;?>
			<div><?=($data->with_materials) ? '<span class="badge badge-info">Материалы заказчика</span>' : '<span class="badge badge-success">Материалы специалиста</span>'?></div>
			<div><b>Бюджет:</b> <?=$data->budget?></div>
		</div>
		<div class='span8'>
			<p>
				<?=$data->text?>
			</p>
			<?php if ($data->work_type):?>
				<?php foreach ($data->work_type as $type):?>
					<span class="badge badge-warning"><?=$type->label?></span>
				<?php endforeach;?>
			<?php endif;?>
			<br/>
			<a href='/tender/index/view/id/<?=$data->id?>'><b>Смотреть заказ</b></a>
		</div>
	</div>
</div>
<hr/>
<br/>
<br/>