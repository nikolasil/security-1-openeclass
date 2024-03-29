<?
$eclass_version = '2.3';
$version = 2;
$encoding = 'UTF-8';
course_details('TMA100',	// Course code
	'greek',	// Language
	'Computer Security',	// Title
	'ΥΣ13 Προστασία και Ασφάλεια Υπολογιστικών Συστημάτων


',	// Description
	'Τμήμα 1',	// Faculty
	'2',	// Visible?
	'Διαχειριστής Πλατφόρμας',	// Professor
	'pre');	// Type
user('1', 'Πλατφόρμας', 'Διαχειριστής', 'drunkadmin', '1bc164b8e3f024d60eb26f374846a1c5', 'webmaster@localhost', '1', '', '', '1651783160', '1791783160');
query("DROP TABLE IF EXISTS `accueil`");
query("CREATE TABLE `accueil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rubrique` varchar(100) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `visible` tinyint(4) DEFAULT NULL,
  `admin` varchar(200) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL,
  `define_var` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8");
query("INSERT INTO `accueil` (`id`, `rubrique`, `lien`, `image`, `visible`, `admin`, `address`, `define_var`) VALUES
	('1', 'Ατζέντα', '../../modules/agenda/agenda.php', 'calendar', '0', '0', '', 'MODULE_ID_AGENDA'),
	('2', 'Σύνδεσμοι', '../../modules/link/link.php', 'links', '0', '0', '', 'MODULE_ID_LINKS'),
	('3', 'Έγγραφα', '../../modules/document/document.php', 'docs', '0', '0', '', 'MODULE_ID_DOCS'),
	('4', 'Βίντεο', '../../modules/video/video.php', 'videos', '0', '0', '', 'MODULE_ID_VIDEO'),
	('5', 'Εργασίες', '../../modules/work/work.php', 'assignments', '1', '0', '', 'MODULE_ID_ASSIGN'),
	('7', 'Ανακοινώσεις', '../../modules/announcements/announcements.php', 'announcements', '0', '0', '', 'MODULE_ID_ANNOUNCE'),
	('9', 'Περιοχές Συζητήσεων', '../../modules/phpbb/index.php', 'forum', '1', '0', '', 'MODULE_ID_FORUM'),
	('10', 'Ασκήσεις', '../../modules/exercice/exercice.php', 'exercise', '0', '0', '', 'MODULE_ID_EXERCISE'),
	('15', 'Ομάδες Χρηστών', '../../modules/group/group.php', 'groups', '1', '0', '', 'MODULE_ID_GROUPS'),
	('16', 'Ανταλλαγή Αρχείων', '../../modules/dropbox/index.php', 'dropbox', '0', '0', '', 'MODULE_ID_DROPBOX'),
	('19', 'Τηλεσυνεργασία', '../../modules/conference/conference.php', 'conference', '1', '0', '', 'MODULE_ID_CHAT'),
	('20', 'Περιγραφή Μαθήματος', '../../modules/course_description/', 'description', '0', '0', '', 'MODULE_ID_DESCRIPTION'),
	('21', 'Ερωτηματολόγια', '../../modules/questionnaire/questionnaire.php', 'questionnaire', '0', '0', '', 'MODULE_ID_QUESTIONNAIRE'),
	('23', 'Γραμμή Μάθησης', '../../modules/learnPath/learningPathList.php', 'lp', '0', '0', '', 'MODULE_ID_LP'),
	('25', 'Ενεργοποίηση Εργαλείων', '../../modules/course_tools/course_tools.php', 'tooladmin', '0', '1', '', 'MODULE_ID_TOOLADMIN'),
	('26', 'Σύστημα Wiki', '../../modules/wiki/wiki.php', 'wiki', '0', '0', '', 'MODULE_ID_WIKI'),
	('8', 'Διαχείριση Χρηστών', '../../modules/user/user.php', 'users', '0', '1', '', 'MODULE_ID_USERS'),
	('14', 'Διαχείριση Μαθήματος', '../../modules/course_info/infocours.php?', 'course_info', '0', '1', '', 'MODULE_ID_COURSEINFO'),
	('24', 'Στατιστικά Χρήσης', '../../modules/usage/usage.php', 'usage', '0', '1', '', 'MODULE_ID_USAGE'),
	('27', 'Θεματικές ενότητες μαθήματος', '../../modules/units/index.php', 'description', '2', '0', '', 'MODULE_ID_UNITS')
");
query("DROP TABLE IF EXISTS `action_types`");
query("CREATE TABLE `action_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
query("INSERT INTO `action_types` (`id`, `name`) VALUES
	('1', 'access'),
	('2', 'exit')
");
query("DROP TABLE IF EXISTS `actions`");
query("CREATE TABLE `actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `action_type_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `duration` int(11) NOT NULL DEFAULT '900',
  PRIMARY KEY (`id`),
  KEY `actionsindex` (`module_id`,`date_time`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8");
query("INSERT INTO `actions` (`id`, `user_id`, `module_id`, `action_type_id`, `date_time`, `duration`) VALUES
	('1', '1', '27', '1', '2022-05-06 08:08:48', '3'),
	('2', '1', '27', '2', '2022-05-06 08:08:51', '0'),
	('3', '1', '27', '1', '2022-05-06 08:08:53', '1'),
	('4', '1', '5', '1', '2022-05-06 08:08:54', '3'),
	('5', '1', '5', '1', '2022-05-06 08:08:57', '65'),
	('6', '1', '5', '1', '2022-05-06 08:10:02', '5'),
	('7', '1', '5', '1', '2022-05-06 08:10:07', '7'),
	('8', '1', '5', '1', '2022-05-06 08:10:14', '1'),
	('9', '1', '5', '1', '2022-05-06 08:10:15', '4'),
	('10', '1', '5', '1', '2022-05-06 08:10:19', '3'),
	('11', '1', '5', '1', '2022-05-06 08:10:22', '26'),
	('12', '1', '5', '1', '2022-05-06 08:10:48', '2'),
	('13', '1', '5', '1', '2022-05-06 08:10:50', '6'),
	('14', '1', '5', '1', '2022-05-06 08:10:56', '2'),
	('15', '1', '5', '1', '2022-05-06 08:10:58', '11'),
	('16', '1', '5', '1', '2022-05-06 08:11:09', '6'),
	('17', '1', '5', '1', '2022-05-06 08:11:15', '8'),
	('18', '1', '5', '1', '2022-05-06 08:11:23', '2'),
	('19', '1', '5', '1', '2022-05-06 08:11:25', '19'),
	('20', '1', '5', '1', '2022-05-06 08:11:44', '2'),
	('21', '1', '5', '1', '2022-05-06 08:11:46', '8'),
	('22', '1', '5', '1', '2022-05-06 08:11:54', '2'),
	('23', '1', '5', '1', '2022-05-06 08:11:56', '2'),
	('24', '1', '5', '1', '2022-05-06 08:11:58', '8'),
	('25', '1', '5', '1', '2022-05-06 08:12:06', '1'),
	('26', '1', '5', '1', '2022-05-06 08:12:07', '2'),
	('27', '1', '5', '1', '2022-05-06 08:12:09', '5'),
	('28', '1', '5', '1', '2022-05-06 08:12:14', '7'),
	('29', '1', '27', '2', '2022-05-06 08:12:21', '0'),
	('30', '1', '27', '1', '2022-05-06 08:13:08', '3')
");
query("INSERT INTO `actions` (`id`, `user_id`, `module_id`, `action_type_id`, `date_time`, `duration`) VALUES
	('31', '1', '5', '1', '2022-05-06 08:13:11', '34'),
	('32', '1', '5', '1', '2022-05-06 08:13:45', '6'),
	('33', '1', '27', '2', '2022-05-06 08:13:51', '0'),
	('34', '1', '27', '1', '2022-05-06 09:10:31', '900')
");
query("DROP TABLE IF EXISTS `actions_summary`");
query("CREATE TABLE `actions_summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `visits` int(11) NOT NULL,
  `start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `agenda`");
query("CREATE TABLE `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) DEFAULT NULL,
  `contenu` text,
  `day` date NOT NULL DEFAULT '0000-00-00',
  `hour` time NOT NULL DEFAULT '00:00:00',
  `lasting` varchar(20) DEFAULT NULL,
  `visibility` char(1) NOT NULL DEFAULT 'v',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `agenda` (`titre`,`contenu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `assignment_submit`");
query("CREATE TABLE `assignment_submit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `assignment_id` int(11) NOT NULL DEFAULT '0',
  `submission_date` date NOT NULL DEFAULT '0000-00-00',
  `submission_ip` varchar(16) NOT NULL DEFAULT '',
  `file_path` varchar(200) NOT NULL DEFAULT '',
  `file_name` varchar(200) NOT NULL DEFAULT '',
  `comments` text NOT NULL,
  `grade` varchar(50) NOT NULL DEFAULT '',
  `grade_comments` text NOT NULL,
  `grade_submission_date` date NOT NULL DEFAULT '0000-00-00',
  `grade_submission_ip` varchar(16) NOT NULL DEFAULT '',
  `group_id` int(11) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `assignments`");
query("CREATE TABLE `assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `comments` text NOT NULL,
  `deadline` date NOT NULL DEFAULT '0000-00-00',
  `submission_date` date NOT NULL DEFAULT '0000-00-00',
  `active` char(1) NOT NULL DEFAULT '1',
  `secret_directory` varchar(30) NOT NULL,
  `group_submissions` char(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
query("INSERT INTO `assignments` (`id`, `title`, `description`, `comments`, `deadline`, `submission_date`, `active`, `secret_directory`, `group_submissions`) VALUES
	('1', 'Εργασία 1: Defense and Attack', '
Ο στόχος του πρώτου project είναι να παίξετε το ρόλο και του αμυνόμενου και του επιτιθέμενου σε ένα περιβάλλον μιας πραγματικής web εφαρμογής', '', '2022-05-31', '2022-05-06', '1', '87894acf2584d4e6d6a0694015b494', '0')
");
query("DROP TABLE IF EXISTS `catagories`");
query("CREATE TABLE `catagories` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(100) DEFAULT NULL,
  `cat_order` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
query("INSERT INTO `catagories` (`cat_id`, `cat_title`, `cat_order`) VALUES
	('2', 'Αρχή', '')
");
query("DROP TABLE IF EXISTS `course_description`");
query("CREATE TABLE `course_description` (
  `id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `upDate` datetime NOT NULL,
  UNIQUE KEY `id` (`id`),
  FULLTEXT KEY `course_description` (`title`,`content`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `document`");
query("CREATE TABLE `document` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `filename` text,
  `visibility` char(1) NOT NULL DEFAULT 'v',
  `comment` varchar(255) DEFAULT NULL,
  `category` text,
  `title` text,
  `creator` text,
  `date` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `subject` text,
  `description` text,
  `author` text,
  `format` text,
  `language` text,
  `copyrighted` text,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `document` (`filename`,`comment`,`title`,`creator`,`subject`,`description`,`author`,`language`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `dropbox_file`");
query("CREATE TABLE `dropbox_file` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uploaderId` int(11) unsigned NOT NULL DEFAULT '0',
  `filename` varchar(250) NOT NULL DEFAULT '',
  `filesize` int(11) unsigned NOT NULL DEFAULT '0',
  `title` varchar(250) DEFAULT '',
  `description` varchar(250) DEFAULT '',
  `author` varchar(250) DEFAULT '',
  `uploadDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastUploadDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UN_filename` (`filename`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `dropbox_person`");
query("CREATE TABLE `dropbox_person` (
  `fileId` int(11) unsigned NOT NULL DEFAULT '0',
  `personId` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fileId`,`personId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `dropbox_post`");
query("CREATE TABLE `dropbox_post` (
  `fileId` int(11) unsigned NOT NULL DEFAULT '0',
  `recipientId` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fileId`,`recipientId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `exercice_question`");
query("CREATE TABLE `exercice_question` (
  `question_id` int(11) NOT NULL DEFAULT '0',
  `exercice_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`question_id`,`exercice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `exercices`");
query("CREATE TABLE `exercices` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `titre` varchar(250) DEFAULT NULL,
  `description` text,
  `type` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `TimeConstrain` int(11) DEFAULT '0',
  `AttemptsAllowed` int(11) DEFAULT '0',
  `random` smallint(6) NOT NULL DEFAULT '0',
  `active` tinyint(4) DEFAULT NULL,
  `results` tinyint(1) NOT NULL DEFAULT '1',
  `score` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `exercices` (`titre`,`description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `exercise_user_record`");
query("CREATE TABLE `exercise_user_record` (
  `eurid` int(11) NOT NULL AUTO_INCREMENT,
  `eid` tinyint(4) NOT NULL DEFAULT '0',
  `uid` mediumint(8) NOT NULL DEFAULT '0',
  `RecordStartDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `RecordEndDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TotalScore` int(11) NOT NULL DEFAULT '0',
  `TotalWeighting` int(11) DEFAULT '0',
  `attempt` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`eurid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `forums`");
query("CREATE TABLE `forums` (
  `forum_id` int(10) NOT NULL AUTO_INCREMENT,
  `forum_name` varchar(150) DEFAULT NULL,
  `forum_desc` text,
  `forum_access` int(10) DEFAULT '1',
  `forum_moderator` int(10) DEFAULT NULL,
  `forum_topics` int(10) NOT NULL DEFAULT '0',
  `forum_posts` int(10) NOT NULL DEFAULT '0',
  `forum_last_post_id` int(10) NOT NULL DEFAULT '0',
  `cat_id` int(10) DEFAULT NULL,
  `forum_type` int(10) DEFAULT '0',
  PRIMARY KEY (`forum_id`),
  KEY `forum_last_post_id` (`forum_last_post_id`),
  FULLTEXT KEY `forums` (`forum_name`,`forum_desc`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
query("INSERT INTO `forums` (`forum_id`, `forum_name`, `forum_desc`, `forum_access`, `forum_moderator`, `forum_topics`, `forum_posts`, `forum_last_post_id`, `cat_id`, `forum_type`) VALUES
	('1', 'Γενικές συζητήσεις', 'Περιοχή συζητήσεων για κάθε θέμα που αφορά το μάθημα', '2', '1', '0', '0', '0', '2', '0')
");
query("DROP TABLE IF EXISTS `group_documents`");
query("CREATE TABLE `group_documents` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `group_properties`");
query("CREATE TABLE `group_properties` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `self_registration` tinyint(4) DEFAULT '1',
  `private` tinyint(4) DEFAULT '0',
  `forum` tinyint(4) DEFAULT '1',
  `document` tinyint(4) DEFAULT '1',
  `wiki` tinyint(4) DEFAULT '0',
  `agenda` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
query("INSERT INTO `group_properties` (`id`, `self_registration`, `private`, `forum`, `document`, `wiki`, `agenda`) VALUES
	('1', '1', '0', '1', '1', '0', '0')
");
query("DROP TABLE IF EXISTS `liens`");
query("CREATE TABLE `liens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` text,
  `category` int(4) NOT NULL DEFAULT '0',
  `ordre` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `liens` (`url`,`titre`,`description`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
query("INSERT INTO `liens` (`id`, `url`, `titre`, `description`, `category`, `ordre`) VALUES
	('1', 'http://www.google.com', 'Google', 'Γρήγορη και Πανίσχυρη μηχανής αναζήτησης', '0', '0')
");
query("DROP TABLE IF EXISTS `link_categories`");
query("CREATE TABLE `link_categories` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(255) DEFAULT NULL,
  `description` text,
  `ordre` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `logins`");
query("CREATE TABLE `logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ip` char(16) NOT NULL DEFAULT '0.0.0.0',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");
query("INSERT INTO `logins` (`id`, `user_id`, `ip`, `date_time`) VALUES
	('1', '1', '2.86.122.72', '2022-05-06 08:08:48'),
	('2', '1', '2.86.122.72', '2022-05-06 08:08:53'),
	('3', '1', '2.86.122.72', '2022-05-06 08:13:08'),
	('4', '1', '79.166.62.174', '2022-05-06 09:10:31')
");
query("DROP TABLE IF EXISTS `lp_asset`");
query("CREATE TABLE `lp_asset` (
  `asset_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`asset_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `lp_learnPath`");
query("CREATE TABLE `lp_learnPath` (
  `learnPath_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `lock` enum('OPEN','CLOSE') NOT NULL DEFAULT 'OPEN',
  `visibility` enum('HIDE','SHOW') NOT NULL DEFAULT 'SHOW',
  `rank` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`learnPath_id`),
  UNIQUE KEY `rank` (`rank`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `lp_module`");
query("CREATE TABLE `lp_module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `accessibility` enum('PRIVATE','PUBLIC') NOT NULL DEFAULT 'PRIVATE',
  `startAsset_id` int(11) NOT NULL DEFAULT '0',
  `contentType` enum('CLARODOC','DOCUMENT','EXERCISE','HANDMADE','SCORM','SCORM_ASSET','LABEL','COURSE_DESCRIPTION','LINK') NOT NULL,
  `launch_data` text NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `lp_rel_learnPath_module`");
query("CREATE TABLE `lp_rel_learnPath_module` (
  `learnPath_module_id` int(11) NOT NULL AUTO_INCREMENT,
  `learnPath_id` int(11) NOT NULL DEFAULT '0',
  `module_id` int(11) NOT NULL DEFAULT '0',
  `lock` enum('OPEN','CLOSE') NOT NULL DEFAULT 'OPEN',
  `visibility` enum('HIDE','SHOW') NOT NULL DEFAULT 'SHOW',
  `specificComment` text NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  `parent` int(11) NOT NULL DEFAULT '0',
  `raw_to_pass` tinyint(4) NOT NULL DEFAULT '50',
  PRIMARY KEY (`learnPath_module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `lp_user_module_progress`");
query("CREATE TABLE `lp_user_module_progress` (
  `user_module_progress_id` int(22) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(9) NOT NULL DEFAULT '0',
  `learnPath_module_id` int(11) NOT NULL DEFAULT '0',
  `learnPath_id` int(11) NOT NULL DEFAULT '0',
  `lesson_location` varchar(255) NOT NULL DEFAULT '',
  `lesson_status` enum('NOT ATTEMPTED','PASSED','FAILED','COMPLETED','BROWSED','INCOMPLETE','UNKNOWN') NOT NULL DEFAULT 'NOT ATTEMPTED',
  `entry` enum('AB-INITIO','RESUME','') NOT NULL DEFAULT 'AB-INITIO',
  `raw` tinyint(4) NOT NULL DEFAULT '-1',
  `scoreMin` tinyint(4) NOT NULL DEFAULT '-1',
  `scoreMax` tinyint(4) NOT NULL DEFAULT '-1',
  `total_time` varchar(13) NOT NULL DEFAULT '0000:00:00.00',
  `session_time` varchar(13) NOT NULL DEFAULT '0000:00:00.00',
  `suspend_data` text NOT NULL,
  `credit` enum('CREDIT','NO-CREDIT') NOT NULL DEFAULT 'NO-CREDIT',
  PRIMARY KEY (`user_module_progress_id`),
  KEY `optimize` (`user_id`,`learnPath_module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `pages`");
query("CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) DEFAULT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `poll`");
query("CREATE TABLE `poll` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `course_id` varchar(20) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `creation_date` date NOT NULL DEFAULT '0000-00-00',
  `start_date` date NOT NULL DEFAULT '0000-00-00',
  `end_date` date NOT NULL DEFAULT '0000-00-00',
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `poll_answer_record`");
query("CREATE TABLE `poll_answer_record` (
  `arid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `qid` int(11) NOT NULL DEFAULT '0',
  `aid` int(11) NOT NULL DEFAULT '0',
  `answer_text` varchar(255) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `submit_date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`arid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `poll_question`");
query("CREATE TABLE `poll_question` (
  `pqid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `question_text` varchar(250) NOT NULL DEFAULT '',
  `qtype` enum('multiple','fill') NOT NULL,
  PRIMARY KEY (`pqid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `poll_question_answer`");
query("CREATE TABLE `poll_question_answer` (
  `pqaid` int(11) NOT NULL AUTO_INCREMENT,
  `pqid` int(11) NOT NULL DEFAULT '0',
  `answer_text` text NOT NULL,
  PRIMARY KEY (`pqaid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `posts`");
query("CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) NOT NULL DEFAULT '0',
  `forum_id` int(10) NOT NULL DEFAULT '0',
  `poster_id` int(10) NOT NULL DEFAULT '0',
  `post_time` varchar(20) DEFAULT NULL,
  `poster_ip` varchar(16) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `post_id` (`post_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_id` (`topic_id`),
  KEY `poster_id` (`poster_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `posts_text`");
query("CREATE TABLE `posts_text` (
  `post_id` int(10) NOT NULL DEFAULT '0',
  `post_text` text,
  PRIMARY KEY (`post_id`),
  FULLTEXT KEY `posts_text` (`post_text`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `questions`");
query("CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text,
  `description` text,
  `ponderation` float(11,2) DEFAULT NULL,
  `q_position` int(11) DEFAULT '1',
  `type` int(11) DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `reponses`");
query("CREATE TABLE `reponses` (
  `id` int(11) NOT NULL DEFAULT '0',
  `question_id` int(11) NOT NULL DEFAULT '0',
  `reponse` text,
  `correct` int(11) DEFAULT NULL,
  `comment` text,
  `ponderation` float(5,2) DEFAULT NULL,
  `r_position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`question_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `student_group`");
query("CREATE TABLE `student_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `tutor` int(11) DEFAULT NULL,
  `forumId` int(11) DEFAULT NULL,
  `maxStudent` int(11) NOT NULL DEFAULT '0',
  `secretDirectory` varchar(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `survey`");
query("CREATE TABLE `survey` (
  `sid` bigint(14) NOT NULL AUTO_INCREMENT,
  `creator_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `course_id` varchar(20) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `creation_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `survey_answer`");
query("CREATE TABLE `survey_answer` (
  `aid` bigint(12) NOT NULL DEFAULT '0',
  `creator_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `sid` bigint(12) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `survey_answer_record`");
query("CREATE TABLE `survey_answer_record` (
  `arid` int(11) NOT NULL AUTO_INCREMENT,
  `aid` bigint(12) NOT NULL DEFAULT '0',
  `question_text` varchar(250) NOT NULL DEFAULT '',
  `question_answer` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`arid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `survey_question`");
query("CREATE TABLE `survey_question` (
  `sqid` bigint(12) NOT NULL DEFAULT '0',
  `sid` bigint(12) NOT NULL DEFAULT '0',
  `question_text` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`sqid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `survey_question_answer`");
query("CREATE TABLE `survey_question_answer` (
  `sqaid` int(11) NOT NULL AUTO_INCREMENT,
  `sqid` bigint(12) NOT NULL DEFAULT '0',
  `answer_text` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`sqaid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `topics`");
query("CREATE TABLE `topics` (
  `topic_id` int(10) NOT NULL AUTO_INCREMENT,
  `topic_title` varchar(100) DEFAULT NULL,
  `topic_poster` int(10) DEFAULT NULL,
  `topic_time` varchar(20) DEFAULT NULL,
  `topic_views` int(10) NOT NULL DEFAULT '0',
  `topic_replies` int(10) NOT NULL DEFAULT '0',
  `topic_last_post_id` int(10) NOT NULL DEFAULT '0',
  `forum_id` int(10) NOT NULL DEFAULT '0',
  `topic_status` int(10) NOT NULL DEFAULT '0',
  `topic_notify` int(2) DEFAULT '0',
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `topic_id` (`topic_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_last_post_id` (`topic_last_post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `user_group`");
query("CREATE TABLE `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL DEFAULT '0',
  `team` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `role` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `users`");
query("CREATE TABLE `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `user_regdate` varchar(20) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_icq` varchar(15) DEFAULT NULL,
  `user_website` varchar(100) DEFAULT NULL,
  `user_occ` varchar(100) DEFAULT NULL,
  `user_from` varchar(100) DEFAULT NULL,
  `user_intrest` varchar(150) DEFAULT NULL,
  `user_sig` varchar(255) DEFAULT NULL,
  `user_viewemail` tinyint(2) DEFAULT NULL,
  `user_theme` int(10) DEFAULT NULL,
  `user_aim` varchar(18) DEFAULT NULL,
  `user_yim` varchar(25) DEFAULT NULL,
  `user_msnm` varchar(25) DEFAULT NULL,
  `user_posts` int(10) DEFAULT '0',
  `user_attachsig` int(2) DEFAULT '0',
  `user_desmile` int(2) DEFAULT '0',
  `user_html` int(2) DEFAULT '0',
  `user_bbcode` int(2) DEFAULT '0',
  `user_rank` int(10) DEFAULT '0',
  `user_level` int(10) DEFAULT '1',
  `user_lang` varchar(255) DEFAULT NULL,
  `user_actkey` varchar(32) DEFAULT NULL,
  `user_newpasswd` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
query("INSERT INTO `users` (`user_id`, `username`, `user_regdate`, `user_password`, `user_email`, `user_icq`, `user_website`, `user_occ`, `user_from`, `user_intrest`, `user_sig`, `user_viewemail`, `user_theme`, `user_aim`, `user_yim`, `user_msnm`, `user_posts`, `user_attachsig`, `user_desmile`, `user_html`, `user_bbcode`, `user_rank`, `user_level`, `user_lang`, `user_actkey`, `user_newpasswd`) VALUES
	('1', 'Πλατφόρμας Διαχειριστής', '2022-05-06 08:08:46', 'password', 'webmaster@localhost', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '1', '', '', ''),
	('-1', 'Ανώνυμος', '2022-05-06 08:08:46', 'password', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '1', '', '', '')
");
query("DROP TABLE IF EXISTS `video`");
query("CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `description` text,
  `creator` varchar(200) DEFAULT NULL,
  `publisher` varchar(200) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `video` (`url`,`titre`,`description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `videolinks`");
query("CREATE TABLE `videolinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) DEFAULT NULL,
  `titre` varchar(200) DEFAULT NULL,
  `description` text,
  `creator` varchar(200) DEFAULT NULL,
  `publisher` varchar(200) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `videolinks` (`url`,`titre`,`description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `wiki_acls`");
query("CREATE TABLE `wiki_acls` (
  `wiki_id` int(11) unsigned NOT NULL,
  `flag` varchar(255) NOT NULL,
  `value` enum('false','true') NOT NULL DEFAULT 'false'
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `wiki_pages`");
query("CREATE TABLE `wiki_pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `wiki_id` int(11) unsigned NOT NULL DEFAULT '0',
  `owner_id` int(11) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `ctime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_version` int(11) unsigned NOT NULL DEFAULT '0',
  `last_mtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `wiki_pages_content`");
query("CREATE TABLE `wiki_pages_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `editor_id` int(11) NOT NULL DEFAULT '0',
  `mtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
query("DROP TABLE IF EXISTS `wiki_properties`");
query("CREATE TABLE `wiki_properties` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `group_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
?>
