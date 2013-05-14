<?php 
	$orders = array(
				'rating' => 'Популярности',
				'creation_date' => 'Дате регистрации',
				'works' => 'Количеству работ',
			);
?>
<div class="navbar navbar-sort">
	<div class="navbar-inner navbar-inner-sort">
		<a class="brand brand-sort" href="#">Сортировать по:</a>
		<ul class="nav nav-sort">
		<?php $first = true;?>
		<?php foreach ($orders as $key=>$label):?>
			<li<?php if(isset($params['order']) && $key === $params['order'] || ! isset($params['order']) && $first):?> class="active"<?php endif;?>>
				<a href="<?=Yii::app()->createUrl('/client/index/index/',CMap::mergeArray($params, array('order'=>$key)))?>"><?=$label?></a>
			</li>
			<?php $first = false;?>
		<?php endforeach;?>
		</ul>
	</div>
</div>	