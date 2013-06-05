<div class='text-center'>
	<a class='btn btn-success btn-large' href='/tender/index/create/'>Добавить заказ</a>
</div>
<?php $this->widget('zii.widgets.CListView', array(
		    'dataProvider' => $data_provider,
		    'itemView'     => '_tender_mini',
		)); ?>