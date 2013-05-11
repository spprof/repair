<?php
class AccountController extends YFrontController
{
    public function actions()
    {
    	Yii::app()->clientScript->registerScriptFile( '/web/vendor/bootstrap/js/bootstrap.min.js');
        return array(
            'captcha' => array(
                'class'     => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
                'testLimit' => 1,
                'minLength' => Yii::app()->getModule('client')->minCaptchaLength,
            ),
            'registration'     => array(
                'class' => 'application.modules.client.controllers.account.ClientRegistrationAction',
            ),
            'profile'          => array(
                'class' => 'application.modules.client.controllers.account.ClientProfileAction'
            ),
        );
    }
}