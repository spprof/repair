<?php if ($data->$type):?>
<div class='row'>
	<div class='span3'>
		<?php if ($type === 'owner'):?>
			Исполнитель: <a href="/client/index/view/id/<?=$data->forwho->id?>"><b><?=$data->forwho->nick_name?></b></a>
		<?php endif?> 
		<?php if ($type === 'forwho'):?>
			Написал: <a href="/client/index/view/id/<?=$data->owner->id?>"><b><?=$data->owner->nick_name?></b></a>
		<?php endif;?>
		<br/>
		<?=$data->create_date?>
	</div>
	<div class='span9'>
	
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
			<?php if (isset($in_list)):?>
				<a href='/response/index/view/id/<?=$data->id?>'>Подробнее</a>
			<?php endif?>
		</p>
		
	</div>
	
	
	
</div>
<br/>
<?php if (! isset($in_list)):?>
	<?php $this->widget('application.modules.comment.widgets.CommentsListWidget', array('label' => 'Комментариев','model' => $data, 'modelId' => $data->id)); ?>
	<br/>
	<?php $this->widget('application.modules.comment.widgets.CommentFormWidget', array('redirectTo' => $this->createUrl('/tender/index/view/', array('id' => $data->id)), 'model' => $data, 'modelId' => $data->id)); ?>
<?php else:?>
	<hr/>
<?php endif?>
<br/>
<?php endif;?>