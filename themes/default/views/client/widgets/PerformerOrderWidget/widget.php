<div class="navbar navbar-sort">
	<div class="navbar-inner navbar-inner-sort">
		<a class="brand brand-sort" href="#">Сортировать по:</a>
		<ul class="nav nav-sort">
			<li class="active">
				<a href="<?=Yii::app()->createUrl('/client/index/index/',CMap::mergeArray($params, array('order[]'=>'rating')))?>">Популярности</a>
			</li>
			<li>
				<a href="<?=Yii::app()->createUrl('/client/index/index/',CMap::mergeArray($params, array('order[]'=>'creation_date')))?>">Дате регистрации</a>
			</li>
			<li>
				<a href="<?=Yii::app()->createUrl('/client/index/index/',CMap::mergeArray($params, array('order[]'=>'works')))?>">Количеству работ</a>
			</li>
		</ul>
	</div>
</div>	