/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_ms_snippets` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '',
  `code` longtext NOT NULL DEFAULT '',
  `tags` longtext NOT NULL DEFAULT '',
  `scope` varchar(15) NOT NULL DEFAULT 'global',
  `priority` smallint(6) NOT NULL DEFAULT 10,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
