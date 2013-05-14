<?php $form = $this->beginWidget('CActiveForm', array(
					'id' => 'performer-search-form',
					'method' => 'get',
					'action' => '/client/index/index/'
				));?>
	<?php $params = $params['search']?>
	<?php if (count($performer_types) && $view !== 'main'):?>
	<h4><?=Performer::model()->getAttributeLabel('is_company');?></h4>
		<?php foreach ($performer_types as $key=>$item):?>
			<label class="checkbox">
				<?php $checked = (isset($params['performer_type'][$key]))?>
				<input type="checkbox" value="<?=$key?>" name="search[performer_type][]" <?=($checked) ? 'checked="checked"' : ''?>/>
				<?=$item?>
			</label>
		<?php endforeach;?>
	<?php endif;?>
	
	<?php if (count($work_types)):?>
	<h4>Выберите вид работ</h4>	
	<?php $columns = ($view !== 'main') ? 2 : 1?>
	<?php $work_types = array_chunk($work_types, $columns);?>
	<div class='row'>
	<?php foreach ($work_types as $group):?>
		<div class='span2'>
		<?php foreach ($group as $item):?>
			<label class="checkbox">
				<?php $checked = (isset($params['work_types']) && in_array($item->id, $params['work_types']))?>
				<input type="checkbox" value="<?=$item->id?>" name="search[work_types][]" <?=($checked) ? 'checked="checked"' : ''?>/>
				<?=$item->label?>
			</label>
		<?php endforeach;?>
		</div>
	<?php endforeach;?>
	</div>
	<?php endif;?>

	<button type='submit' class="btn btn-inverse btn-large">Найти исполнителя</button>

<?php $this->endWidget(); ?>
