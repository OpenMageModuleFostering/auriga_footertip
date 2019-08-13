<?php
     
    $installer = $this;
     
    $installer->startSetup();
     
    $installer->run("
     

    CREATE TABLE IF NOT EXISTS footertip(
      `footertip_id` int(11) unsigned NOT NULL auto_increment,
      `footertip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
      `status` VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Enabled',
       PRIMARY KEY (`footertip_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
     
        ");
		$installer->endSetup();