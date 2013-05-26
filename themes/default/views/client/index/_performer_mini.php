<div class="spec-item">
	<div class="spec-item-info"> 
		<a href="/client/index/view/id/<?=$data->id?>"><?=$data->user->nick_name?></a> 
		<a href="/message/default/create/to/<?=$data->id?>">Отправить сообщение</a>
		<a href="/response/index/create/id/<?=$data->id?>">Оставить отзыв</a>
	</div>	
	<div class="spec-item-rating">
		<!-- a href="#" rel="tooltip" class="label label-warning" title="Общий рейтинг / Количество отзывов">79 / 5</a-->
	</div>
	<div class="clear"></div>
	<?php if ($data->is_company):?>
		<b>Компания:</b> <?=$data->company_name?><br/>
	<?php endif; ?>
	<?php if ($data->work_type):?>
		<b>Виды работ:</b> 
			<?php foreach ($data->work_type as $item):?>
				<span class='label label-warning'><?=$item->label?></span>
			<?php endforeach;?>
		<br/>
	<?php endif;?>
	<b>Человек в команде:</b> <?=$data->number?><br/>
	<b>Стаж работы:</b> <?=$data->experience?>  год(а)<br/>
	<b>География работ:</b> <?=$data->area?> <br/>
	<?php if($data->about):?>
		<b>Описание:</b> <?=$data->about?>.
	<?php endif;?>
</div>