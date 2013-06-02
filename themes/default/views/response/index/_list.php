<?php $this->widget('zii.widgets.CListView', array(
		    'dataProvider' => $data_provider,
		    'itemView'     => '_response',
			'viewData'	   => array('type' => $type, 'in_list' => true),
		)); ?>