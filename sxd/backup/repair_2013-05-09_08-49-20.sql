#	TC`rpr_user_user`utf8_general_ci	;
CREATE TABLE `rpr_user_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creation_date` datetime NOT NULL,
  `change_date` datetime NOT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `middle_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `nick_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `birth_date` date DEFAULT NULL,
  `site` varchar(250) NOT NULL DEFAULT '',
  `about` varchar(250) NOT NULL DEFAULT '',
  `location` varchar(250) NOT NULL DEFAULT '',
  `online_status` varchar(250) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL,
  `salt` char(32) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '2',
  `access_level` int(11) NOT NULL DEFAULT '0',
  `last_visit` datetime DEFAULT NULL,
  `registration_date` datetime NOT NULL,
  `registration_ip` varchar(50) NOT NULL,
  `activation_ip` varchar(50) NOT NULL,
  `avatar` varchar(150) DEFAULT NULL,
  `use_gravatar` tinyint(1) NOT NULL DEFAULT '1',
  `activate_key` char(32) NOT NULL,
  `email_confirm` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_rpr_user_user_nick_name` (`nick_name`),
  UNIQUE KEY `ux_rpr_user_user_email` (`email`),
  KEY `ix_rpr_user_user_status` (`status`),
  KEY `ix_rpr_user_user_email_confirm` (`email_confirm`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8	;
#	TD`rpr_user_user`utf8_general_ci	;
INSERT INTO `rpr_user_user` VALUES 
(1,'2013-05-09 10:51:30','2013-05-09 10:51:30','','','','spprof','spprof@yandex.ru',0,\N,'','','','','f4c88e3eee9d439af0529727c93556d3','317ff971fe124627762d51f4ad962aa3',1,1,'2013-05-09 10:51:30','2013-05-09 10:51:30','127.0.0.1','127.0.0.1',\N,1,'6e0c457861494ea55f0e8de91d1b06ae',1)	;

#	TC`rpr_category_category`utf8_general_ci	;
CREATE TABLE `rpr_category_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `alias` varchar(150) NOT NULL,
  `lang` char(2) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `short_description` text,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_rpr_category_category_alias_lang` (`alias`,`lang`),
  KEY `ix_rpr_category_category_parent_id` (`parent_id`),
  KEY `ix_rpr_category_category_status` (`status`),
  CONSTRAINT `fk_rpr_category_category_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `rpr_category_category` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8	;
#	TC`rpr_comment_comment`utf8_general_ci	;
CREATE TABLE `rpr_comment_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `model` varchar(100) NOT NULL,
  `model_id` int(11) NOT NULL,
  `url` varchar(150) DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `text` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ix_rpr_comment_comment_status` (`status`),
  KEY `ix_rpr_comment_comment_model_model_id` (`model`,`model_id`),
  KEY `ix_rpr_comment_comment_model` (`model`),
  KEY `ix_rpr_comment_comment_model_id` (`model_id`),
  KEY `ix_rpr_comment_comment_user_id` (`user_id`),
  KEY `ix_rpr_comment_comment_parent_id` (`parent_id`),
  CONSTRAINT `fk_rpr_comment_comment_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `rpr_comment_comment` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_rpr_comment_comment_user_id` FOREIGN KEY (`user_id`) REFERENCES `rpr_user_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8	;
#	TC`rpr_contentblock_content_block`utf8_general_ci	;
CREATE TABLE `rpr_contentblock_content_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `content` text NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_rpr_contentblock_content_block_code` (`code`),
  KEY `ix_rpr_contentblock_content_block_type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8	;

#	TC`rpr_dictionary_dictionary_group`utf8_general_ci	;
CREATE TABLE `rpr_dictionary_dictionary_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL DEFAULT '',
  `creation_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_rpr_dictionary_dictionary_group_code` (`code`),
  KEY `ix_rpr_dictionary_dictionary_group_create_user_id` (`create_user_id`),
  KEY `ix_rpr_dictionary_dictionary_group_update_user_id` (`update_user_id`),
  CONSTRAINT `fk_rpr_dictionary_dictionary_group_update_user_id` FOREIGN KEY (`update_user_id`) REFERENCES `rpr_user_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `fk_rpr_dictionary_dictionary_group_create_user_id` FOREIGN KEY (`create_user_id`) REFERENCES `rpr_user_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8	;

#	TC`rpr_dictionary_dictionary_data`utf8_general_ci	;
CREATE TABLE `rpr_dictionary_dictionary_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `value` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL DEFAULT '',
  `creation_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_rpr_dictionary_dictionary_data_code_unique` (`code`),
  KEY `ix_rpr_dictionary_dictionary_data_group_id` (`group_id`),
  KEY `ix_rpr_dictionary_dictionary_data_create_user_id` (`create_user_id`),
  KEY `ix_rpr_dictionary_dictionary_data_update_user_id` (`update_user_id`),
  KEY `ix_rpr_dictionary_dictionary_data_status` (`status`),
  CONSTRAINT `fk_rpr_dictionary_dictionary_data_data_group_id` FOREIGN KEY (`group_id`) REFERENCES `rpr_dictionary_dictionary_group` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_rpr_dictionary_dictionary_data_create_user_id` FOREIGN KEY (`create_user_id`) REFERENCES `rpr_user_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `fk_rpr_dictionary_dictionary_data_update_user_id` FOREIGN KEY (`update_user_id`) REFERENCES `rpr_user_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8	;

#	TC`rpr_feedback_feedback`utf8_general_ci	;
CREATE TABLE `rpr_feedback_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `answer_user` int(11) DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  `change_date` datetime NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `theme` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `answer` text NOT NULL,
  `answer_date` datetime DEFAULT NULL,
  `is_faq` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ix_rpr_feedback_feedback_category` (`category_id`),
  KEY `ix_rpr_feedback_feedback_type` (`type`),
  KEY `ix_rpr_feedback_feedback_status` (`status`),
  KEY `ix_rpr_feedback_feedback_isfaq` (`is_faq`),
  KEY `ix_rpr_feedback_feedback_answer_user` (`answer_user`),
  CONSTRAINT `fk_rpr_feedback_feedback_category` FOREIGN KEY (`category_id`) REFERENCES `rpr_category_category` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `fk_rpr_feedback_feedback_answer_user` FOREIGN KEY (`answer_user`) REFERENCES `rpr_user_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8	;
#	TC`rpr_gallery_gallery`utf8_general_ci	;
CREATE TABLE `rpr_gallery_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ix_rpr_gallery_gallery_status` (`status`),
  KEY `ix_rpr_gallery_gallery_owner` (`owner`),
  CONSTRAINT `fk_rpr_gallery_gallery_owner` FOREIGN KEY (`owner`) REFERENCES `rpr_user_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8	;

#	TC`rpr_image_image`utf8_general_ci	;
CREATE TABLE `rpr_image_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `description` text,
  `file` varchar(250) NOT NULL,
  `creation_date` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `alt` varchar(250) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `ix_rpr_image_image_status` (`status`),
  KEY `ix_rpr_image_image_user` (`user_id`),
  KEY `ix_rpr_image_image_type` (`type`),
  KEY `ix_rpr_image_image_category_id` (`category_id`),
  KEY `fk_rpr_image_image_parent_id` (`parent_id`),
  CONSTRAINT `fk_rpr_image_image_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `rpr_image_image` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `fk_rpr_image_image_category_id` FOREIGN KEY (`category_id`) REFERENCES `rpr_category_category` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `fk_rpr_image_image_user_id` FOREIGN KEY (`user_id`) REFERENCES `rpr_user_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8	;

#	TC`rpr_gallery_image_to_gallery`utf8_general_ci	;
CREATE TABLE `rpr_gallery_image_to_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_rpr_gallery_image_to_gallery_gallery_to_image` (`image_id`,`gallery_id`),
  KEY `ix_rpr_gallery_image_to_gallery_gallery_to_image_image` (`image_id`),
  KEY `ix_rpr_gallery_image_to_gallery_gallery_to_image_gallery` (`gallery_id`),
  CONSTRAINT `fk_rpr_gallery_image_to_gallery_gallery_to_image_image` FOREIGN KEY (`image_id`) REFERENCES `rpr_image_image` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_rpr_gallery_image_to_gallery_gallery_to_image_gallery` FOREIGN KEY (`gallery_id`) REFERENCES `rpr_gallery_gallery` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8	;

#	TC`rpr_mail_mail_event`utf8_general_ci	;
CREATE TABLE `rpr_mail_mail_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_rpr_mail_mail_event_code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8	;
#	TC`rpr_mail_mail_template`utf8_general_ci	;
CREATE TABLE `rpr_mail_mail_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(150) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text,
  `from` varchar(150) NOT NULL,
  `to` varchar(150) NOT NULL,
  `theme` text NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_rpr_mail_mail_template_code` (`code`),
  KEY `ix_rpr_mail_mail_template_status` (`status`),
  KEY `ix_rpr_mail_mail_template_event_id` (`event_id`),
  CONSTRAINT `fk_rpr_mail_mail_template_event_id` FOREIGN KEY (`event_id`) REFERENCES `rpr_mail_mail_event` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8	;
#	TC`rpr_menu_menu`utf8_general_ci	;
CREATE TABLE `rpr_menu_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_rpr_menu_menu_code` (`code`),
  KEY `ix_rpr_menu_menu_status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8	;
#	TD`rpr_menu_menu`utf8_general_ci	;
INSERT INTO `rpr_menu_menu` VALUES 
(1,'Верхнее меню','top-menu','Основное меню сайта, расположенное сверху в блоке mainmenu.',1)	;
#	TC`rpr_menu_menu_item`utf8_general_ci	;
CREATE TABLE `rpr_menu_menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `regular_link` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(150) NOT NULL,
  `href` varchar(150) NOT NULL,
  `class` varchar(150) NOT NULL,
  `title_attr` varchar(150) NOT NULL,
  `before_link` varchar(150) NOT NULL,
  `after_link` varchar(150) NOT NULL,
  `target` varchar(150) NOT NULL,
  `rel` varchar(150) NOT NULL,
  `condition_name` varchar(150) DEFAULT '0',
  `condition_denial` int(11) DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `ix_rpr_menu_menu_item_menu_id` (`menu_id`),
  KEY `ix_rpr_menu_menu_item_sort` (`sort`),
  KEY `ix_rpr_menu_menu_item_status` (`status`),
  CONSTRAINT `fk_rpr_menu_menu_item_menu_id` FOREIGN KEY (`menu_id`) REFERENCES `rpr_menu_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8	;
#	TD`rpr_menu_menu_item`utf8_general_ci	;
INSERT INTO `rpr_menu_menu_item` VALUES 
(1,0,1,0,'Главная','/site/index','','Главная страница сайта','','','','','',0,1,1),
(2,0,1,0,'Блоги','/blog/blog/index','','Блоги','','','','','',0,2,1),
(4,2,1,0,'Пользователи','/user/people/index','','Пользователи','','','','','',0,3,1),
(6,3,1,0,'Контакты','/feedback/contact/index','','Контакты','','','','','',0,6,1),
(7,0,1,0,'Wiki','/wiki/default/index','','Wiki','','','','','',0,9,0),
(8,0,1,0,'Войти','/user/account/login','login-text','Войти на сайт','','','','','isAuthenticated',1,11,1),
(9,0,1,0,'Выйти','/user/account/logout','login-text','Выйти','','','','','isAuthenticated',0,12,1),
(10,0,1,0,'Регистрация','/user/account/registration','login-text','Регистрация на сайте','','','','','isAuthenticated',1,10,1),
(11,0,1,0,'Панель управления','/yupe/backend/index','login-text','Панель управления сайтом','','','','','isSuperUser',0,13,1),
(12,0,1,0,'FAQ','/feedback/contact/faq','','FAQ','','','','','',0,7,1),
(13,0,1,0,'Контакты','/feedback/index/','','Контакты','','','','','',0,7,1)	;
#	TC`rpr_migrations`utf8_general_ci	;
CREATE TABLE `rpr_migrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_migrations_module` (`module`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8	;
#	TD`rpr_migrations`utf8_general_ci	;
INSERT INTO `rpr_migrations` VALUES 
(1,'user','m000000_000000_user_base',1368081550),
(2,'yupe','m000000_000000_yupe_base',1368081555),
(3,'category','m000000_000000_category_base',1368081558),
(4,'image','m000000_000000_image_base',1368081566),
(5,'page','m000000_000000_page_base',1368081577),
(6,'page','m130115_155600_columns_rename',1368081577),
(7,'mail','m000000_000000_mail_base',1368081582),
(8,'menu','m000000_000000_menu_base',1368081586),
(9,'menu','m121220_001126_menu_test_data',1368081586),
(10,'gallery','m000000_000000_gallery_base',1368081591),
(11,'gallery','m130427_120500_gallery_creation_user',1368081593),
(12,'comment','m000000_000000_comment_base',1368081602),
(13,'contentblock','m000000_000000_contentblock_base',1368081604),
(14,'dictionary','m000000_000000_dictionary_base',1368081615),
(15,'feedback','m000000_000000_feedback_base',1368081621)	;
#	TC`rpr_page_page`utf8_general_ci	;
CREATE TABLE `rpr_page_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `lang` char(2) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  `change_date` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `change_user_id` int(11) DEFAULT NULL,
  `title_short` varchar(150) NOT NULL,
  `title` varchar(250) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `body` text NOT NULL,
  `keywords` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_rpr_page_page_slug_lang` (`slug`,`lang`),
  KEY `ix_rpr_page_page_status` (`status`),
  KEY `ix_rpr_page_page_is_protected` (`is_protected`),
  KEY `ix_rpr_page_page_user_id` (`user_id`),
  KEY `ix_rpr_page_page_change_user_id` (`change_user_id`),
  KEY `ix_rpr_page_page_menu_order` (`order`),
  KEY `ix_rpr_page_page_category_id` (`category_id`),
  CONSTRAINT `fk_rpr_page_page_change_user_id` FOREIGN KEY (`change_user_id`) REFERENCES `rpr_user_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `fk_rpr_page_page_category_id` FOREIGN KEY (`category_id`) REFERENCES `rpr_category_category` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  CONSTRAINT `fk_rpr_page_page_user_id` FOREIGN KEY (`user_id`) REFERENCES `rpr_user_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8	;
#	TC`rpr_user_recovery_password`utf8_general_ci	;
CREATE TABLE `rpr_user_recovery_password` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `code` char(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_rpr_user_recovery_password_code` (`code`),
  KEY `ix_rpr_user_recovery_password_user_id` (`user_id`),
  CONSTRAINT `fk_rpr_user_recovery_password_user_id` FOREIGN KEY (`user_id`) REFERENCES `rpr_user_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8	;

#	TC`rpr_yupe_settings`utf8_general_ci	;
CREATE TABLE `rpr_yupe_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` varchar(100) NOT NULL,
  `param_name` varchar(100) NOT NULL,
  `param_value` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL,
  `change_date` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ux_rpr_yupe_settings_module_id_param_name` (`module_id`,`param_name`),
  KEY `ix_rpr_yupe_settings_module_id` (`module_id`),
  KEY `ix_rpr_yupe_settings_param_name` (`param_name`),
  KEY `fk_rpr_yupe_settings_user_id` (`user_id`),
  CONSTRAINT `fk_rpr_yupe_settings_user_id` FOREIGN KEY (`user_id`) REFERENCES `rpr_user_user` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8	;
#	TD`rpr_yupe_settings`utf8_general_ci	;
INSERT INTO `rpr_yupe_settings` VALUES 
(1,'yupe','siteDescription','Юпи! - самый быстрый способ создать сайт на Yii','2013-05-09 10:51:42','2013-05-09 10:51:42',1,1),
(2,'yupe','siteName','Юпи!','2013-05-09 10:51:42','2013-05-09 10:51:42',1,1),
(3,'yupe','siteKeyWords','Юпи!, yupe, yii, cms, цмс','2013-05-09 10:51:42','2013-05-09 10:51:42',1,1),
(4,'yupe','email','spprof@yandex.ru','2013-05-09 10:51:42','2013-05-09 10:51:42',1,1),
(5,'yupe','theme','default','2013-05-09 10:51:43','2013-05-09 10:51:43',1,1),
(6,'yupe','backendTheme','','2013-05-09 10:51:43','2013-05-09 10:51:43',1,1)	;
