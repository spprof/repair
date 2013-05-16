<?php

/**
 * Personal Messages module for Yii framework
 *
 * @author Pavel Chebotarev <chebotarevp@gmail.com>
 * @version 0.4
 * @license http://www.opensource.org/licenses/bsd-license.php
 */
class MessageModule extends YWebModule
{
	public $userClass = 'User';
	/**
	 * Method for getting user name.
	 * If callback, then user model will be passed as the argument.
	 * @var string|callback
	 */
	public $tableName = 'rpr_message';

	/**
	 * Delete messages from database, not only mark as deleted
	 * @var bool
	 */
	public $reallyDelete = true;

	/**
	 * Messages per page in the outgoing list
	 * @var int
	 */
	public $outgoingPageSize = 10;

	/**
	 * Messages per page in the incoming list
	 * @var int
	 */
	public $incomingPageSize = 10; //

	/**
	 * Enable conversation mode
	 * @var bool
	 */
	public $conversationMode = false;

	/**
	 * Additional models import
	 * @var array
	 */
	public $import = array();

	/**
	 * Module initialization
	 * @return void
	 */
	public function init()
	{
		$this->setImport(array_merge(
			$this->import,
			array(
				'message.models.*',
				'message.components.*',
			)
		));
		return parent::init();
	}

	/**
	 * Translate message
	 *
	 * @param $message
	 * @param array $params
	 * @return string
	 */
	public static function t($message, $params = array())
	{
		return Yii::t('MessageModule.pm', $message, $params);
	}

	/**
	 * Get current user id
	 * @return string
	 */
	public function getUserId()
	{
		return Yii::app()->user->getId();
	}

	/**
	 * Get username for the given user model.
	 * @param CActiveRecord $model  User model
	 * @throws CException
	 * @return string
	 */
	public function getUserName($model)
	{
		return $model->nick_name; 
	}
}
