<div class="alert">
	<h3>Поиск</h3>
	
	<?php $form = $this->beginWidget('CActiveForm', array(
						'id' => 'performer-search-form',
						'method' => 'get',
						'action' => '/client/index/index/'
					));?>
	
		<?php if (count($performer_types)):?>
		<?=Performer::model()->getAttributeLabel('is_company');?>
			<?php foreach ($performer_types as $key=>$item):?>
				<label class="checkbox">
					<input type="checkbox" value="<?=$key?>" name="search[performer_type][]">
					<?=$item?>
				</label>
			<?php endforeach;?>
		<?php endif;?>
		
		<?php if (count($work_types)):?>	
		<?=Performer::model()->getAttributeLabel('work_types');?>
			<?php foreach ($work_types as $item):?>
				<label class="checkbox">
					<input type="checkbox" value="<?=$item->id?>" name="search[work_types][]">
					<?=$item->label?>
				</label>
			<?php endforeach;?>
		<?php endif;?>
	
		<button class="btn btn-inverse">Найти »</button>
	
	<?php $this->endWidget(); ?>
</div>