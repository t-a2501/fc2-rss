CREATE DATABASE fc_db;
CREATE USER fcuser Identified with mysql_native_password by 'fcuser';
GRANT ALL PRIVILEGES ON *.* TO fcuser WITH GRANT OPTION;
USE fc_db;
DROP TABLE IF EXISTS `fcblogs`;
CREATE TABLE `fcblogs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `userName` VARCHAR(255) NOT NULL,
  `serverNo` INT UNSIGNED NOT NULL,
  `entryNo` INT UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `title` TEXT NOT NULL,
  `description` TEXT NOT NULL,
  `url` VARCHAR(2083) NOT NULL,
  `entryDate` DATETIME NOT NULL,
  `createDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unikey` (`userName`,`serverNo`,`entryNo`),
  INDEX `idxServerNo`(`serverNo`),
  INDEX `idxEntryNo`(`entryNo`),
  INDEX `idxEntryDate`(`entryDate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;