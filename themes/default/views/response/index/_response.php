<?php if ($data->$type):?>
<div>
	<div>
		<?php if ($type === 'owner'):?>
			Исполнитель: <a href="/client/index/view/id/<?=$data->forwho->id?>"><b><?=$data->forwho->nick_name?></b></a>
		<?php endif?> 
		<?php if ($type === 'forwho'):?>
			Написал: <a href="/client/index/view/id/<?=$data->owner->id?>"><b><?=$data->owner->nick_name?></b></a>
		<?php endif;?>
		<span class="label label-important"><?=$data->create_date?></span>
	</div>
	<?php $this->widget('CStarRating',array(
                          'model'=>$data,
                          'attribute'=>'rate',
						  'id' => 'rate_' . $data->rate,
                          'minRating'=>1,
                          'maxRating'=>5,
                          'readOnly'=>true,
                        ));
    ?>
    <br class='clear'/>
	<p>
		<?=$data->text?>
	</p>
	<a>Удалить отзыв</a>
</div>
<br/>
<br/>
<?php endif;?>