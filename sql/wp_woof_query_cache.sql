/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_woof_query_cache` (
  `mkey` varchar(64) NOT NULL,
  `mvalue` text NOT NULL,
  KEY `mkey` (`mkey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
