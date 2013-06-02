<a href="/client/index/view/id/<?=$data->id?>"><b><?=$data->owner->nick_name?></b></a> <?=$data->create_date?><br/>
<?php $this->widget('CStarRating',array(
                          'model'=>$data,
                          'attribute'=>'rate',
						  'id' => 'rate_' . $data->rate,
                          'minRating'=>1,
                          'maxRating'=>5,
                          'readOnly'=>true,
                        ));
    ?> 
<br/>
<?=$data->text?>
&nbsp;<a href='/response/index/view/id/<?=$data->id?>'>Подробнее</a>
<hr/>
