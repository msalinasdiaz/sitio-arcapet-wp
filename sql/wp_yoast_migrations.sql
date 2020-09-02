/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_yoast_migrations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_wp_yoast_migrations_version` (`version`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES (1,'20171228151840');
INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES (2,'20171228151841');
INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES (3,'20190529075038');
INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES (4,'20191011111109');
INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES (5,'20200408101900');
INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES (6,'20200420073606');
INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES (7,'20200428123747');
INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES (8,'20200428194858');
INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES (9,'20200429105310');
INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES (10,'20200430075614');
INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES (11,'20200430150130');
INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES (12,'20200507054848');
INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES (13,'20200513133401');
INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES (14,'20200609154515');
INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES (16,'20200616130143');
INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES (15,'20200702141921');
INSERT INTO `wp_yoast_migrations` (`id`, `version`) VALUES (17,'20200728095334');
