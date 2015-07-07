<?php

use yii\db\Schema;
use yii\db\Migration;

class m150707_071406_create_item_unit_soldier_provider_tables extends Migration
{
    public function up()
    {
        $this->execute("
CREATE TABLE `item` (
  `id`                  INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title`               TEXT
                        COLLATE utf8_bin NOT NULL,
  `serial`              VARCHAR(255)
                        COLLATE utf8_bin NOT NULL,
  `category_id`         INT(11) UNSIGNED NOT NULL,
  `attached_to`         INT(11) UNSIGNED NOT NULL,
  `attached_to_unit`    INT(11) UNSIGNED          DEFAULT NULL,
  `attached_to_soldier` INT(11) UNSIGNED          DEFAULT NULL,
  `description`         TEXT
                        COLLATE utf8_bin,
  `characteristics`     TEXT
                        COLLATE utf8_bin,
  `doc_links`           TEXT
                        COLLATE utf8_bin,
  `provided_by`         INT(11) UNSIGNED NOT NULL,
  `condition`           INT(11)          NOT NULL,
  `fixed_by`            INT(11) UNSIGNED          DEFAULT NULL,
  `date_added`          INT(11) UNSIGNED NOT NULL,
  `date_updated`        INT(11) UNSIGNED NOT NULL,
  `status`              INT(11)                   DEFAULT NULL,
  `complect`            TEXT
                        COLLATE utf8_bin,
  `photos`              INT(11) UNSIGNED          DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `serial` (`serial`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

CREATE TABLE `unit` (
  `id`          INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`        VARCHAR(255)
                COLLATE utf8_bin NOT NULL,
  `soldier`     INT(11) UNSIGNED NOT NULL,
  `description` TEXT
                COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

CREATE TABLE `soldier` (
  `id`            INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`          VARCHAR(255)
                  COLLATE utf8_bin NOT NULL,
  `nickname`      VARCHAR(255)
                  COLLATE utf8_bin NOT NULL,
  `rank`          INT(11)                   DEFAULT NULL,
  `position`      INT(11)                   DEFAULT NULL,
  `unit`          INT(11) UNSIGNED          DEFAULT NULL,
  `phone`         VARCHAR(255)
                  COLLATE utf8_bin          DEFAULT NULL,
  `photos`        INT(11)                   DEFAULT NULL,
  `primary_photo` INT(11) UNSIGNED          DEFAULT NULL,
  `email`         VARCHAR(255)
                  COLLATE utf8_bin          DEFAULT NULL,
  `password`      VARCHAR(255)
                  COLLATE utf8_bin          DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

CREATE TABLE `provider` (
  `id`       INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type`     INT(11)          NOT NULL,
  `name`     VARCHAR(255)
             COLLATE utf8_bin NOT NULL,
  `phone`    VARCHAR(12)
             COLLATE utf8_bin          DEFAULT NULL,
  `email`    VARCHAR(255)
             COLLATE utf8_bin          DEFAULT NULL,
  `site`     VARCHAR(255)
             COLLATE utf8_bin          DEFAULT NULL,
  `password` VARCHAR(255)
             COLLATE utf8_bin          DEFAULT NULL,
  `photo`    INT(11) UNSIGNED          DEFAULT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;
        ");
    }

    public function down()
    {
        echo "m150707_071406_create_item_unit_soldier_provider_tables cannot be reverted.\n";

        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
