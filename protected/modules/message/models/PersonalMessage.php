<?php

class PersonalMessage extends YModel
{	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return Yii::app()->getModule('message')->tableName;
	}

	public function rules()
	{
		return array(
			array('text', 'required'),
			array('subject', 'safe'),
			array('id, sender_id, recipient_id, read, created, subject, text', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		$userClass = Yii::app()->getModule('message')->userClass;
		return array(
			'sender' => array(self::BELONGS_TO, $userClass, 'sender_id'),
			'recipient' => array(self::BELONGS_TO, $userClass, 'recipient_id')
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sender_id' => MessageModule::t('Отправитель'),
			'recipient_id' => MessageModule::t('Получатель'),
			'read' => MessageModule::t('Прочитано'),
			'created' => MessageModule::t('Создано'),
			'subject' => MessageModule::t('Тема'),
			'text' => MessageModule::t('Сообщение'),

			'interlocutorId' => MessageModule::t('Interlocutor')
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id,true);
		$criteria->compare('sender_id',$this->sender);
		$criteria->compare('recipient_id',$this->recipient);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	public function scopes()
	{
		return array(
			'unread' => array(
				'condition' => '`read`=0 && `dr`=0'
			),
		);
	}

	public function haveAccess($userId)
	{
		$this->getDbCriteria()->mergeWith(array(
			'condition' => '(sender_id = :user_id AND ds=0) OR (recipient_id = :user_id AND dr=0)',
			'params' => array(
				':user_id' => $userId
			)
		));
		return $this;
	}

	public function byRecipient($recipientId)
	{
		$this->getDbCriteria()->mergeWith(array(
        		'condition' => 'recipient_id=:recipient_id',
			'params' => array(
				'recipient_id' => $recipientId
			)
    		));
    		return $this;
	}

	public function bySender($senderId)
	{
		$this->getDbCriteria()->mergeWith(array(
        		'condition' => 'sender_id=:sender_id',
			'params' => array(
				'sender_id' => $senderId
			)
   	 	));
    		return $this;
	}

	public function byInterlocutorId($interlocutorId)
	{
		$selfId = Yii::app()->getModule('message')->getUserId();

		$this->getDbCriteria()->mergeWith(array(
			'condition' => '(sender_id=:user_id AND recipient_id=:inter_id) 
				OR (recipient_id=:user_id AND sender_id=:inter_id)',

			'params' => array(
				':user_id' => $selfId,
				':inter_id' => $interlocutorId
			)
   	 	));
    		return $this;
	}

	public function getInterlocutorId()
	{	
		$selfId = Yii::app()->getModule('message')->getUserId();
		if ($this->recipient_id == $selfId)
		{
			return $this->sender_id;
		} elseif ($this->sender_id == $selfId)
		{
			return $this->recipient_id;
		} else {
			return false;
		}
	}

	public function getInterlocutorName()
	{
		$selfId = Yii::app()->getModule('message')->getUserId();
		if ($this->recipient_id == $selfId)
		{
			return $this->getSenderName();
		} elseif ($this->sender_id == $selfId)
		{
			return $this->getRecipientName();
		} else {
			return null;
		}
	}

	public function getSenderName()
	{
		if ($this->sender)
		{
			return Yii::app()->getModule('message')->getUserName($this->sender);
		} else {
			return null;
		}
	}

	public function getRecipientName()
	{
		if ($this->recipient)
		{
			return Yii::app()->getModule('message')->getUserName($this->recipient);
		} else {
			return null;
		}
	}

	public function send($recipients)
	{
		if (!is_array($recipients))
		{
			$this->recipient_id = $recipients;
			$this->save();
			return $this;
		} else {

			$this->_errorModels = array();
			foreach ($recipients as $userid)
			{
				$message = $this->clone();
				$message->recipient_id = $userid;
				if (!$message->save())
				{
					$this->errorModels[] = $message;	
				}
			}
			
			return count($this->errorModels) == 0;
		}
	}

	public function getErrorsModels()
	{
		return $this->_errorModels;
	}

	public function markAsRead()
	{
		if (!$this->read)
		{
			$this->read = 1;
			$this->save(false, array('read'));
		}
	}

	public function addReplyPrefix($reply)
	{
		if (substr($reply, 0, 4)=="Re: ")
		{
			return str_replace("Re: ", "Re(2): ", $reply);
		} elseif (substr($reply, 0, 3)=="Re(")
		{
				return preg_replace_callback('~^Re\((\d{1,2})\)~', array($this, '_replaceReplyPrefixCallback'), $reply);
		} else {
			return "Re: $reply";
		}
	}

	private function _replaceReplyPrefixCallback($patterns)
	{
		return str_replace($patterns[1], $patterns[1]+1, $patterns[0]);
	}	
}
