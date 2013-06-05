<?php if ($model):?>
<?php foreach ($model as $item):?>
	<div class="tender-item">
		<?php if ($item->rating != 0):?>
		<div class="tender-item-date">
			<span class='badge badge-inverse'><?=$item->rating;?></span>
		</div>
		<?php endif?>
		<div class="tender-item-info">
			<i class="icon-user"></i> <a href="/client/index/view/id/<?=$item->user->id?>"><b><?=$item->user->nick_name?></b></a>
		</div>	
		<div class="clear"></div>
		
		<?php if ($item->work_type):?>
			<?php $more = false;?>
			<?php if (count($item->work_type) > 4):?>
				<?php $item->work_type = array_slice($item->work_type, 0, 3)?>
				<?php $more = true?>
			<?php endif;?>
			<?php foreach ($item->work_type as $type):?>
				<span class="badge badge-warning"><?=$type->label?></span>
			<?php endforeach;?>
			<?php if ($more):?>
				<a href="/client/index/view/id/<?=$item->user->id?>" class="badge badge-warning">...</a>
			<?php endif;?>
		<?php endif;?>
	
		<div class="tender-item-cont">
			<?=mb_substr($item->about, 0, 200)?>
		</div>
		<a class="tender-item-link" href="/tender/index/view/id/<?=$this->id?>">Подробнее &rarr;</a>
	</div>
<?php endforeach;?>
<div class='text-right'>
	<a href="/client/index/index/" class="tender-all"><b>Все специалисты</b></a>
</div>
<?php endif;?>