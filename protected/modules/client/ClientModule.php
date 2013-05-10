<?php

class ClientModule extends YWebModule
{
	public $showCaptcha                    = true;
	public $minCaptchaLength               = 5;
	public $minPasswordLength              = 5;
	public $registrationDisabled           = false;
	public $attachedProfileEvents          = array();
	public $loginSuccess;
	public $logoutSuccess;
	
    public function init()
    {
        parent::init();

        $homeUrl = '/' . Yii::app()->defaultController . '/index';

        if (!$this->loginSuccess)
            $this->loginSuccess = $homeUrl;

        if (!$this->logoutSuccess)
            $this->logoutSuccess = $homeUrl;

        $this->setImport(array(
            'user.models.*',
            'user.components.*',
        ));
        
        if (is_array($this->attachedProfileEvents))
        {
            foreach ($this->attachedProfileEvents as $e)
            {
                $this->attachEventHandler("onBeginRegistration", array($e, "onBeginRegistration"));
                $this->attachEventHandler("onBeginProfile", array($e, "onBeginProfile"));
            }
        }
    }

    public function onBeginRegistration($event)
    {
        $this->raiseEvent('onBeginRegistration', $event);
    }

    public function onBeginProfile($event)
    {
        $this->raiseEvent('onBeginProfile', $event);
    }

}
