<?php
/**
 * Виджет для вывода последних активных пользователей
 */
class TenderBarWidget extends YWidget
{
	public $limit = 2;

	public $order = 'create_date desc';
	
    public function run()
    {
    	$criteria=new CDbCriteria();
    	$criteria->limit = $this->limit;
    	$criteria->order = $this->order;
    	$criteria->with = array('owner','work_type');
    	$model = Tender::model()->findAll($criteria);
    	$this->render('widget', array('model' => $model));
    }
}
