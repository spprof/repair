<?php

class DefaultController extends YFrontController
{
	/**
	 * @var current user ID
	 */
	protected $_userId;

	public function beforeAction($action)
	{	
		if ($this->module->conversationMode)
		{
			$this->redirect(array('thread/index'));
		}
		$this->_userId = Yii::app()->getModule('message')->getUserId();
		$this->breadcrumbs = array(
			MessageModule::t('Личные сообщения') => array('/message/default')
		);
		return parent::beforeAction($action);
	}
	
	/**
	 * Personal messages menu
	 */
	public function actionIndex()
	{		
		$unread = PersonalMessage::model()
			->unread()
			->byRecipient($this->_userId)
			->count();

		$user = new $this->module->userClass;
		$users = $user->findAll(array('limit' => 10));

		$this->render('index', array(
			'unread' => $unread,
			'users' => $users
		));
	}

	/**
	 * View message
	 * @param int $id message ID
	 */
	public function actionView($id)
	{
		$model = PersonalMessage::model()
			->with(array('sender', 'recipient'))
			->haveAccess($this->_userId)
			->findByPk($id);
		if ($model === null)
		{
			throw new CHttpException(404, MessageModule::t("Message not found"));
		}
			
		// mark message as read
		if ($model->recipient_id == $this->_userId)
		{
			$model->markAsRead();
		}
	
		$this->render('view', array(
			'model' => $model
		));
	}

	/**
	 * Compose new message
	 *
	 * $mode - перменная, которая передается в view для определения действия
	 */
	public function actionCreate($to)
	{
		$model = new PersonalMessage;
		$model->sender_id = $this->_userId;
		$model->recipient_id = $to;
		$user = User::model()->findByPk($to);
		
		if ($model->recipient === null || ! $user)
		{
			throw new CHttpException(404, MessageModule::t('User not found'));
		}

		if (isset($_POST['PersonalMessage'])) 
		{
			$model->attributes = $_POST['PersonalMessage'];
			
			if ($model->save()) {
				
				$emailBody = $this->renderPartial('messageCreatedEmail', array('model' => $model), true);

				Yii::app()->mail->send(
					$module->notifyEmailFrom,
					$user->email,
					Yii::t('UserModule.user', 'Новое сообщение на сайте {site} !', array('{site}' => Yii::app()->name)),
					$mailBody
				);
				
				Yii::app()->user->setFlash('success', MessageModule::t('Message has been sent.'));
				$this->redirect(array('/message/default'));					
			}
			
		} else {
			if ($model->sender_id == $model->recipient_id)
			{
				throw new CHttpException(403, "You can't send messages to yourself");
			}
			
			if (isset($_GET['subj']))
			{
				$model->subject = $_GET['subj'];
			}	
		}

		$this->render('create',	array(
				'model' => $model
		));
	} 


	/**
	 * Reply to message
	 *
	 * @param int $id message ID
	 */
	public function actionReply($id)
	{
		$model = PersonalMessage::model()
			->with('sender')
			->haveAccess($this->_userId)
			->findByPk($id);

		if ($model === null)
		{
			throw new CHttpException(404, MessageModule::t("Message not found"));
		}

		if ($model->sender_id == $this->_userId)
		{
			throw new CHttpException(403, "You can't answer to yourself");
		}

		$modelNew = new PersonalMessage;
		$modelNew->sender_id = $this->_userId;
		$modelNew->recipient_id = $model->sender_id == $this->_userId?
		$model->recipient_id:$model->sender_id;
		
		if (isset($_POST['PersonalMessage'])) 
		{
			$modelNew->attributes = $_POST['PersonalMessage'];

			if ($modelNew->save()) {
				Yii::app()->user->setFlash('success', 
					MessageModule::t('Message has been sent'));
				$this->redirect(array('/message/default'));					
			}
		} else	{
			$modelNew->subject = $model->addReplyPrefix($model->subject);	
		}

		$this->render('reply',	array(
				'modelNew' => $modelNew,
				'model' => $model
		));
	}
	 
	/**
	 * Delete message
	 *
	 * @param int $id message ID
	 */
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest)
		{
			$model = PersonalMessage::model()->haveAccess($this->_userId)->findByPk($id);
			if ($model !== null) {
				($this->_userId == $model->sender_id)?$model->ds=1:$model->dr=1;
				if (Yii::app()->getModule('message')->reallyDelete && $model->ds && $model->dr) {
					$model->delete();
				} else {
					$model->save(false, array('dr', 'ds'));
				}
					
				if (!isset($_GET['ajax']))
				{
					Yii::app()->user->setFlash('success', 
						MessageModule::t('Message has been succsefully deleted.'));
					$this->redirect(array('/message/default/listincoming'));
				}
			}
		} else {
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * View incoming messages list
	 */
	public function actionListIncoming()
	{
		$pm = Yii::app()->getModule('message');

		$criteria = new CDbCriteria(array(
			'condition' => 'recipient_id=:recipient_id AND `dr`=0',
			'params' => array(
				':recipient_id' => $this->_userId
			),
			'with' => 'sender',
			'order' => '`t`.`id` DESC'	
		));

		$dataProvider = new CActiveDataProvider('PersonalMessage', array(
			'criteria' => $criteria,
			'pagination' => array(
				'pageSize' => $pm->incomingPageSize
			)
		));

		$this->render('listincoming', array(
			'dataProvider' => $dataProvider,
		));
	}
	
	/**
	 * View outgoing messages list
	 */
	public function actionListOutgoing()
	{
		$criteria=new CDbCriteria(array(
			'condition' => '`sender_id`=:userid AND `ds`=0',
			'params' => array(
				':userid' => $this->_userId
			),
			'order' => '`t`.`id` DESC',
			'with' => 'recipient'
		));

		$dataProvider = new CActiveDataProvider('PersonalMessage', array(
			'criteria' => $criteria,
			'pagination' => array(
				'pageSize' => Yii::app()->getModule('message')->outgoingPageSize
			)
		));

		$this->render('listoutgoing', array(
			'dataProvider' => $dataProvider
		));
	}

	/**
	 * Get current user Id
	 *
	 * @return int
	 */
	public function getUserId()
	{
		return $this->_userId;
	}
}
