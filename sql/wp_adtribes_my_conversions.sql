/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_adtribes_my_conversions` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `conversion_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `project_hash` varchar(256) NOT NULL,
  `utm_source` varchar(256) NOT NULL,
  `utm_campaign` varchar(256) NOT NULL,
  `utm_medium` varchar(256) NOT NULL,
  `utm_term` varchar(256) NOT NULL,
  `productId` int(128) NOT NULL,
  `orderId` int(128) NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `orderId` (`orderId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
