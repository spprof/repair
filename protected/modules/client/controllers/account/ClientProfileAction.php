<?php
class ClientProfileAction extends CAction
{
    public function run()
    {
    	$type = Yii::app()->user->getState('client_type');
    	$factory = new ClientFactory($type);
    	
        $form = $factory->profile_form;
        $form_class = get_class($form); 
        
        $model = $factory->model;

        if (!Yii::app()->user->isAuthenticated())
            $this->controller->redirect(array(Yii::app()->user->loginUrl));

        $user = Yii::app()->user->profile;
        $profile = $model->getProfile();
        $client = $model::model()->findByPk($user->id);
        
        $form->setAttributes(CMap::mergeArray($profile, $user->getAttributes()));
        $form->password = $form->cPassword = null;

        $module = Yii::app()->getModule('client');
        
        $event = new CModelEvent($this->controller);
        $module->onBeginProfile($event);

        if (Yii::app()->request->isPostRequest && !empty($_POST[$form_class]))
        {
            $form->setAttributes($_POST[$form_class]);
            if ($form->validate())
            {
                // скопируем данные формы
                $data = $form->getAttributes();

                $newPass = isset($data['password']) ? $data['password'] : null;
                unset($data['password']);

                $orgMail = $user->email;
                $user->setAttributes($data);
                $client->setAttributes($data);
                if ($newPass)
                {
                    $user->salt     = $user->generateSalt();
                    $user->password = $user->hashPassword($newPass, $user->salt);
                }

                // Если есть ошибки в профиле - перекинем их в форму
                if ($user->hasErrors())
                    $form->addErrors($user->getErrors());

                if (!$form->hasErrors())
                {

                    Yii::log(
                        Yii::t('UserModule.user', "Изменен профиль учетной запись #{id}-{nick_name}!", array(
                            '{id}'        => $user->id,
                            '{nick_name}' => $user->nick_name,
                        )),
                        CLogger::LEVEL_INFO, UserModule::$logCategory
                    );
                    Yii::app()->user->setFlash(
                        YFlashMessages::NOTICE_MESSAGE,
                        Yii::t('UserModule.user', 'Ваш профиль успешно изменен!')
                    );

                    if ($module->emailAccountVerification && ($orgMail != $form->email))
                    {
                        // отправить email с сообщением о подтверждении мыла

                        $user->email_confirm = User::EMAIL_CONFIRM_NO;
                        $user->activate_key  = $user->generateActivationKey();

                        $emailBody = $this->controller->renderPartial('needEmailActivationEmail', array('model' => $user), true);
                        Yii::app()->mail->send(
                            $module->notifyEmailFrom,
                            $user->email,
                            Yii::t('UserModule.user', 'Подтверждение нового e-mail адреса на сайте {site} !', array('{site}' => Yii::app()->name)),
                            $emailBody
                        );

                        Yii::app()->user->setFlash(
                            YFlashMessages::NOTICE_MESSAGE,
                            Yii::t('UserModule.user', 'Вам необходимо продтвердить новый e-mail, проверьте почту!')
                        );
                    }
                    // Сохраняем профиль
                    $user->save();
                    $client->save();
                    $this->controller->redirect(array('/client/account/profile/'));
                }
                else
                    Yii::log(
                        Yii::t('UserModule.user', "Ошибка при сохранении профиля! #{id}", array('{id}' => $user->id)),
                        CLogger::LEVEL_ERROR, UserModule::$logCategory
                     );
            }
        }
        Yii::app()->clientScript->registerScriptFile( '/web/vendor/bootstrap/js/bootstrap.min.js');
        $this->controller->render('profile', array('model' => $form, 'module' => $module, 'type' => $type));
    }
}