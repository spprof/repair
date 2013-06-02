<div class='tender-mini'>
	<div class='row'>
		<div class='span6 tender-mini-label'><a href='/tender/index/view/id/<?=$data->id?>'><?=$data->label?></a></div>
		<div class='span3 text-right'>
			<a href="/client/index/view/id/<?=$data->owner->id?>"><i class="icon-user"></i> <b><?=$data->owner->nick_name?></b></a>&nbsp;
			<a href='/message/default/create/to/<?=$data->owner->id?>'>Написать</a>
		</div>
		<div class='span3 text-right'><?=$data->create_date?></div>
		
	</div>
	<div class='row'>
		<div class='span4'>
			<?php if ($data->term):?>
				<div><b>Срок:</b> <?=$data->term?></div>
			<?php endif;?>
			<div><?=($data->with_materials) ? '<span class="badge badge-info">Нужны материалы</span>' : '<span class="badge badge-success">Свои материалы</span>'?></div>
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
		</div>
	</div>
</div>
<hr/>
<br/>
<br/>