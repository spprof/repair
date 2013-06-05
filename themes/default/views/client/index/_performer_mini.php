<div class="spec-item row">

	<div class='span3'>
		<a href="/client/index/view/id/<?=$data->id?>"><i class="icon-user"></i>&nbsp;<b><?=$data->user->nick_name?></b> <small>смотреть профиль</small></a>
		<br/>
		<?php if ($data->is_company):?>
			<b>Компания:</b> <?=$data->company_name?><br/>
		<?php endif; ?>
		<b>Человек в команде:</b> <?=$data->number?><br/>
		<?php if ( $data->experience !== null):?>
			<b>Стаж работы (лет):</b> <?=$data->experience?><br/>
		<?php endif;?>
		<?php $area_list = $data->getAreaList()?>
		<b>География работ:</b> <?=$area_list[$data->area]?> <br/>
	</div>
	<div class='span9'>
		<div class='row'>
			<div class='span5'>
				<?php if ($data->rating != 0):?>
				Рейтинг: <span class='badge badge-inverse'><?=$data->rating?></span>
				<?php endif;?>
			</div>
			<div class='span4 text-right'>
				<a href="/message/default/create/to/<?=$data->id?>">Написать</a>
				<a href="/response/index/create/id/<?=$data->id?>">Оставить отзыв</a>
			</div>
		</div>
		<?=$data->about?>
		
		<?php if ($data->work_type):?>
		<div>
			<b>Виды работ:</b> 
				<?php foreach ($data->work_type as $item):?>
					<span class='badge badge-warning'><?=$item->label?></span>
				<?php endforeach;?>
		</div>
		<?php endif;?>
		
	</div>
</div>
<hr/>