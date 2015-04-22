<?php
$installer = $this;
$installer->startSetup();
$installer->run("-- DROP TABLE IF EXISTS {$this->getTable('royal_categories')};
CREATE TABLE {$this->getTable('royal_categories')} (
      `id` int(11) unsigned NOT NULL auto_increment,
      `name` varchar(255) NOT NULL default '',
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");
$installer->run("-- DROP TABLE IF EXISTS {$this->getTable('royal_testimonials')};
CREATE TABLE {$this->getTable('royal_testimonials')} (
      `id_royal_testimonials` int(11) unsigned NOT NULL auto_increment,
      `name` varchar(255) NOT NULL default '',
	`description` varchar(255) NOT NULL default '',
	`image` varchar(255) NOT NULL default '',
	`category` varchar(255) NOT NULL default '',
      PRIMARY KEY (`id_royal_testimonials`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");
    $installer->endSetup();
