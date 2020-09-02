/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_snippets` (
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
INSERT INTO `wp_snippets` (`id`, `name`, `description`, `code`, `tags`, `scope`, `priority`, `active`, `modified`) VALUES (1,'Example HTML shortcode','This is an example snippet for demonstrating how to add an HTML shortcode.\n\nYou can remove it, or edit it to add your own content.','\nadd_shortcode( \'shortcode_name\', function () {\n\n	$out = \'<p>write your HTML shortcode content here</p>\';\n\n	return $out;\n} );','shortcode','global',10,0,'2020-04-17 00:58:50');
INSERT INTO `wp_snippets` (`id`, `name`, `description`, `code`, `tags`, `scope`, `priority`, `active`, `modified`) VALUES (2,'Example CSS snippet','This is an example snippet for demonstrating how to add custom CSS code to your website.\n\nYou can remove it, or edit it to add your own content.','\nadd_action( \'wp_head\', function () { ?>\n<style>\n\n	/* write your CSS code here */\n\n</style>\n<?php } );\n','css','front-end',10,0,'2020-04-17 00:58:50');
INSERT INTO `wp_snippets` (`id`, `name`, `description`, `code`, `tags`, `scope`, `priority`, `active`, `modified`) VALUES (3,'Example JavaScript snippet','This is an example snippet for demonstrating how to add custom JavaScript code to your website.\n\nYou can remove it, or edit it to add your own content.','\nadd_action( \'wp_head\', function () { ?>\n<script>\n\n	/* write your JavaScript code here */\n\n</script>\n<?php } );\n','javascript','front-end',10,0,'2020-04-17 00:58:50');
INSERT INTO `wp_snippets` (`id`, `name`, `description`, `code`, `tags`, `scope`, `priority`, `active`, `modified`) VALUES (4,'Order snippets by name','Order snippets by name by default in the snippets table.','\nadd_filter( \'code_snippets/list_table/default_orderby\', function () {\n	return \'name\';\n} );\n','code-snippets-plugin','admin',10,0,'2020-04-17 00:58:50');
INSERT INTO `wp_snippets` (`id`, `name`, `description`, `code`, `tags`, `scope`, `priority`, `active`, `modified`) VALUES (5,'Order snippets by date','Order snippets by last modification date by default in the snippets table.','\nadd_filter( \'code_snippets/list_table/default_orderby\', function () {\n	return \'modified\';\n} );\n\nadd_filter( \'code_snippets/list_table/default_order\', function () {\n	return \'desc\';\n} );\n','code-snippets-plugin','admin',10,0,'2020-04-17 00:58:50');
INSERT INTO `wp_snippets` (`id`, `name`, `description`, `code`, `tags`, `scope`, `priority`, `active`, `modified`) VALUES (6,'Menú','','function disable_wpcomtoolbar ( $modules ) {\r\n    if ( isset( $modules[\'masterbar\'] ) ) {\r\n      unset( $modules[\'masterbar\'] );\r\n    }\r\n    return $modules;\r\n}    \r\nadd_filter( \'jetpack_get_available_modules\', \'disable_wpcomtoolbar\' );','','global',10,1,'2020-04-17 02:57:56');
