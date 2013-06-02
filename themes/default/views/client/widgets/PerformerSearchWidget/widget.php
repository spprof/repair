<?php $form = $this->beginWidget('CActiveForm', array(
					'id' => 'performer-search-form',
					'method' => 'get',
					'action' => '/client/index/index/'
				));?>
	<?php $params = (isset($params['search'])) ? $params['search'] : array() ?>
	<?php if (count($performer_types) && $view !== 'main'):?>
		<div class='row'>
		<?php foreach ($performer_types as $key=>$item):?>
			<div class='span4'>
				<label class="checkbox">
					<?php $checked = (isset($params['performer_type'][$key]))?>
					<input type="checkbox" value="<?=$key?>" name="search[performer_type][]" <?=($checked) ? 'checked="checked"' : ''?>/>
					<?=$item?>
				</label>
			</div>
		<?php endforeach;?>
		</div>
		<hr/>
	<?php endif;?>
	
	<?php if (count($work_types)):?>
	<?php $col_count = 3;?>
	<?php $groups = array()?>
	<?php $work_types = array_chunk($work_types, 12);?>
	<?php foreach ($work_types as $group):?>
		<?php $group = array_chunk($group, $col_count)?>
		<?php foreach ($group as $subgroup):?>
			<?php $counter = 0;?>
			<?php foreach ($subgroup as $item):?>
				<?php $groups[$counter][] = $item?>
				<?php $counter++?>
				<?php if ($counter == $col_count):?>
					<?php $counter = 0;?>
				<?php endif?>
			<?php endforeach;?>
		<?php endforeach;?>	
	<?php endforeach;?>
	<div class='row'>
	<?php $counter = 0;?>
	<?php foreach ($groups as $group):?>
		<div class='span4'>
		<?php foreach ($group as $item):?>
			<label class="checkbox">
				<?php $checked = (isset($params['work_types']) && in_array($item->id, $params['work_types']))?>
				<input type="checkbox" value="<?=$item->id?>" name="search[work_types][]" <?=($checked) ? 'checked="checked"' : ''?>/>
				<?=$item->label?>
			</label>
		<?php endforeach;?>
		<?php $counter++?>
		<?php if ($col_count == $counter):?>
			<span>Больше</span>
		<?php endif?>
		</div>
	<?php endforeach;?>
	</div>
	<?php endif;?>

	<div class='row'>
		<div class='span2'>
		</div>
		<div class='span8 text-center'>
			<button class="btn btn-primary <?=($view == 'main') ? 'btn-large' : ''?>">Найти исполнителя</button>
		</div>
		<?php if ($view !== 'main'):?>
		<div class='span2 text-right'>
			<a href='/client/index/index/'>Сбросить</a>
		</div>
		<?php endif;?>
	</div>
	<br/>
<?php $this->endWidget(); ?>
