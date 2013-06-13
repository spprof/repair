<?php 

class ClientRegistrationAction extends CAction {
	
	public function run()
	{
		$module = Yii::app()->getModule('client');

		$type = (isset($_GET['type']) ) ? $_GET['type'] : null;
		$factory = new ClientFactory($type);
		
		if ($module->registrationDisabled){
			throw new CHttpException(404, Yii::t('UserModule.user', 'Запрошенная страница не найдена!'));
		}

		$form = $factory->registration_form;
		$form_class = get_class ($form);

		if (Yii::app()->user->isAuthenticated()){
			$this->controller->redirect(Yii::app()->user->returnUrl);
		}

		$event = new CModelEvent($form);

		$module->onBeginRegistration($event);

		if (Yii::app()->request->isPostRequest && !empty($_POST[$form_class]))
		{
			$form->setAttributes($_POST[$form_class]);
			if ($form->validate())
			{
				// если активации не требуется - сразу создаем аккаунт
				$user = new User;
				$user->createAccount($form->nick_name, $form->email, $form->password, null , User::STATUS_ACTIVE, User::EMAIL_CONFIRM_NO, $form->first_name, '', $type);

				if ($user && !$user->hasErrors())
				{
					//Добавление информации о пользователе
					$client = $factory->model;
					$client->setAttributes($form->getAttributes());
					$client->id = $user->id;
					$client->save();
					
					Yii::log(
						Yii::t('UserModule.user', "Создана учетная запись {nick_name} без активации!", array('{nick_name}' => $user->nick_name)),
						CLogger::LEVEL_INFO, UserModule::$logCategory
					);

					// отправить email с сообщением о успешной регистрации
					$emailBody = $this->controller->renderPartial('accountCreatedEmail', array('model' => $user), true);

					Yii::app()->mail->send(
						$module->notifyEmailFrom,
						$user->email,
						Yii::t('UserModule.user', 'Регистрация на сайте {site} !', array('{site}' => Yii::app()->name)),
						$emailBody
					);

					$emailBody = $this->controller->renderPartial('accountCreatedEmailToAdmin', array('model' => $user), true);
					
					Yii::app()->mail->send(
						$module->notifyEmailFrom,
						$module->adminEmail,
						Yii::t('UserModule.user', 'Регистрация на сайте {site} !', array('{site}' => Yii::app()->name)),
						$emailBody
					);
					
					Yii::app()->user->setFlash(
						YFlashMessages::NOTICE_MESSAGE,
						Yii::t('UserModule.user', 'Учетная запись создана! Пожалуйста, авторизуйтесь!')
					);
					$this->controller->redirect(array($module->registrationSucess));
				}
				else
				{
					$form->addErrors($user->getErrors());
					Yii::log(
					Yii::t('UserModule.user', "Ошибка при создании  учетной записи без активации!"),
					CLogger::LEVEL_ERROR, UserModule::$logCategory
					);
				}
			}
		}
		$this->controller->render('registration', array('model' => $form, 'module' => $module, 'type' => $type));
	}
	
}