<?php
/**
 * Виджет для вывода последних активных пользователей
 */
class MiniLoginFormWidget extends YWidget
{
    public function run()
    {
    	$form = new LoginForm;
        $this->render('widget', array('model' => $form));
    }
}
