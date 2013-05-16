<?php 
if ($unread)
	echo CHtml::link(MessageModule::t('Мои сообщения({unread})', array('{unread}' => $unread)),
		$this->url
	);
else
	echo CHtml::link(MessageModule::t('Мои сообщения'), $this->url);
?>
