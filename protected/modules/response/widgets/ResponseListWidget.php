<?php
/**
 * Виджет для вывода последних активных пользователей
 */
class ResponseListWidget extends YWidget
{
	public $id;
	
    public function run()
    {
    	$model = new Response();
    	$criteria=new CDbCriteria();
    	$criteria->compare('forwho_id',$this->id);
    	$criteria->with = array('owner');
    	$criteria->together = true;
    	$data_provider = new CActiveDataProvider(
    			$model, array('criteria' => $criteria));
    	$this->render('widget', array('data_provider' => $data_provider));
    }
}
