<?php if ($model):?>
<?php foreach ($model as $item):?>
	<div class="tender-item">
		<div class="tender-item-date">
			<?=$item->create_date?>
		</div>
		<div class="tender-item-info">
			<i class="icon-user"></i> <a href="/client/index/view/id/<?=$item->owner->id?>"><b><?=$item->owner->nick_name?></b></a>
		</div>	
		<div class="clear"></div>
	
		<?php if ($item->work_type):?>
			<?php foreach ($item->work_type as $type):?>
				<span class="badge badge-warning"><?=$type->label?></span>
			<?php endforeach;?>
		<?php endif;?>
	
		<div class="tender-item-cont">
			<?=mb_substr($item->text, 0, 200)?>
		</div>
		<a class="tender-item-link" href="/tender/index/view/id/<?=$this->id?>">Подробнее &rarr;</a>
	</div>
<?php endforeach;?>
<div class='text-right'>
	<a href="/tender/index/index/" class="tender-all"><b>Все заказы</b></a>
</div>
<?php endif;?>