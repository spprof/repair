<div>
	<a href="/client/index/view/id/<?=$data->id?>"><b><?=$data->owner->nick_name?></b></a>
	<?=$data->create_date?>
	<br/>
	<div class='clearfix'>
	<?php $this->widget('CStarRating',array(
	                          'model'=>$data,
	                          'attribute'=>'rate',
							  'id' => 'rate_' . md5($data->create_date),
	                          'minRating'=>1,
	                          'maxRating'=>5,
	                          'readOnly'=>true,
	                        ));
	    ?> 
	</div>
	<br/>
	<?=$data->text?>
	&nbsp;<a href='/response/index/view/id/<?=$data->id?>'>Подробнее</a>
</div>
<hr/>
