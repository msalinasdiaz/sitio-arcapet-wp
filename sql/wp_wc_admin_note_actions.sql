/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_wc_admin_note_actions` (
  `action_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `note_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `query` longtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT 0,
  `actioned_text` varchar(255) NOT NULL,
  PRIMARY KEY (`action_id`),
  KEY `note_id` (`note_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `wp_wc_admin_note_actions` (`action_id`, `note_id`, `name`, `label`, `query`, `status`, `is_primary`, `actioned_text`) VALUES (3,3,'connect','Conectar','?page=wc-addons&section=helper','unactioned',0,'');
INSERT INTO `wp_wc_admin_note_actions` (`action_id`, `note_id`, `name`, `label`, `query`, `status`, `is_primary`, `actioned_text`) VALUES (4,4,'continue-profiler','Continue Store Setup','https://arcapet.cl/wp-admin/admin.php?page=wc-admin&enable_onboarding=1','unactioned',1,'');
INSERT INTO `wp_wc_admin_note_actions` (`action_id`, `note_id`, `name`, `label`, `query`, `status`, `is_primary`, `actioned_text`) VALUES (5,4,'skip-profiler','Skip Setup','https://arcapet.cl/wp-admin/admin.php?page=wc-admin&reset_profiler=0','actioned',0,'');
INSERT INTO `wp_wc_admin_note_actions` (`action_id`, `note_id`, `name`, `label`, `query`, `status`, `is_primary`, `actioned_text`) VALUES (6,5,'learn-more','Aprende más','https://woocommerce.com/mobile/','actioned',0,'');
INSERT INTO `wp_wc_admin_note_actions` (`action_id`, `note_id`, `name`, `label`, `query`, `status`, `is_primary`, `actioned_text`) VALUES (7,6,'yes-please','¡Sí, por favor!','https://woocommerce.us8.list-manage.com/subscribe/post?u=2c1434dc56f9506bf3c3ecd21&amp;id=13860df971&amp;SIGNUPPAGE=plugin','actioned',0,'');
INSERT INTO `wp_wc_admin_note_actions` (`action_id`, `note_id`, `name`, `label`, `query`, `status`, `is_primary`, `actioned_text`) VALUES (9,8,'learn-more','Aprende más','https://woocommerce.com/products/facebook/','unactioned',0,'');
INSERT INTO `wp_wc_admin_note_actions` (`action_id`, `note_id`, `name`, `label`, `query`, `status`, `is_primary`, `actioned_text`) VALUES (10,8,'install-now','Instalar ahora','','unactioned',1,'');
INSERT INTO `wp_wc_admin_note_actions` (`action_id`, `note_id`, `name`, `label`, `query`, `status`, `is_primary`, `actioned_text`) VALUES (12,10,'open-marketing-hub','Open marketing hub','https://arcapet.cl/wp-admin/admin.php?page=wc-admin&path=/marketing','actioned',0,'');
INSERT INTO `wp_wc_admin_note_actions` (`action_id`, `note_id`, `name`, `label`, `query`, `status`, `is_primary`, `actioned_text`) VALUES (14,12,'share-feedback','Share feedback','https://automattic.survey.fm/new-onboarding-survey','actioned',0,'');
INSERT INTO `wp_wc_admin_note_actions` (`action_id`, `note_id`, `name`, `label`, `query`, `status`, `is_primary`, `actioned_text`) VALUES (15,13,'learn-more','Aprende más','https://woocommerce.com/mobile/?utm_source=inbox','actioned',0,'');
INSERT INTO `wp_wc_admin_note_actions` (`action_id`, `note_id`, `name`, `label`, `query`, `status`, `is_primary`, `actioned_text`) VALUES (20,18,'browse','Ver','https://woocommerce.com/success-stories/?utm_source=inbox','actioned',0,'');
INSERT INTO `wp_wc_admin_note_actions` (`action_id`, `note_id`, `name`, `label`, `query`, `status`, `is_primary`, `actioned_text`) VALUES (21,19,'view-report','Ver informe','?page=wc-admin&path=/analytics/revenue&period=custom&compare=previous_year&after=2020-08-14&before=2020-08-14','actioned',0,'');
INSERT INTO `wp_wc_admin_note_actions` (`action_id`, `note_id`, `name`, `label`, `query`, `status`, `is_primary`, `actioned_text`) VALUES (22,23,'affirm-insight-first-sale','Sí','','actioned',0,'Thanks for your feedback');
INSERT INTO `wp_wc_admin_note_actions` (`action_id`, `note_id`, `name`, `label`, `query`, `status`, `is_primary`, `actioned_text`) VALUES (23,23,'deny-insight-first-sale','No','','actioned',0,'Thanks for your feedback');
INSERT INTO `wp_wc_admin_note_actions` (`action_id`, `note_id`, `name`, `label`, `query`, `status`, `is_primary`, `actioned_text`) VALUES (24,24,'home-screen-feedback-share-feedback','Compartir comentarios','https://automattic.survey.fm/home-screen-survey','actioned',0,'');
