<?php

class ClientModule extends YWebModule
{
	public $accountActivationSuccess       = '/user/account/login';
	public $accountActivationFailure       = '/user/account/registration';
	public $loginSuccess;
	public $registrationSucess             = '/user/account/login';
	public $logoutSuccess;
	
	public $notifyEmailFrom;
    public $autoRecoveryPassword           = true;
    public $recoveryDisabled               = false;
    public $registrationDisabled           = false;
    public $minPasswordLength              = 5;
    public $emailAccountVerification       = false;
    public $showCaptcha                    = true;
    public $minCaptchaLength               = 5;
    public $documentRoot;
    public $avatarsDir;
    public $avatarMaxSize                  = 10000;
    public $defaultAvatar                  = '/web/images/avatar.png';
    public $avatarExtensions               = array('jpg', 'png', 'gif');

    public $registrationActivateMailEvent  = 'USER_REGISTRATION_ACTIVATE';
    public $registrationMailEvent          = 'USER_REGISTRATION';
    public $passwordAutoRecoveryMailEvent  = 'USER_PASSWORD_AUTO_RECOVERY';
    public $passwordRecoveryMailEvent      = 'USER_PASSWORD_RECOVERY';
    public $passwordSuccessRecoveryMailEvent = 'USER_PASSWORD_SUCCESS_RECOVERY';
    public $userAccountActivationMailEvent   = 'USER_ACCOUNT_ACTIVATION';

    public static $logCategory             = 'application.modules.client';
    public $autoNick                       = false;
    public $profiles                       = array();
    public $attachedProfileEvents          = array();
	
    public function init()
    {
        parent::init();

        $homeUrl = '/' . Yii::app()->defaultController . '/index';

        if (!$this->loginSuccess)
            $this->loginSuccess = $homeUrl;

        if (!$this->logoutSuccess)
            $this->logoutSuccess = $homeUrl;

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
