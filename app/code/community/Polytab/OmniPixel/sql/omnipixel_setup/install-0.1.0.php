<?php

$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();

$installer->run("
DROP TABLE IF EXISTS `{$this->getTable('omnipixel_settings')}`;
CREATE TABLE `{$this->getTable('omnipixel_settings')}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `is_enable` enum('1','0') NOT NULL DEFAULT '0',
  `platform_code` varchar(100) NOT NULL,
  `client_key` varchar(100) NOT NULL,
  `secret_key` varchar(100) NOT NULL,
  `terms` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
");

$installer->run("
INSERT INTO `omnipixel_settings` (`id`, `is_enable`, `platform_code`, `client_key`, `secret_key`, `terms`) VALUES ('1', '0', '', '', '', '0');
");


$installer->endSetup();