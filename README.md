# mpwarfwk

CREATE DATABASE mpwarfwk;

CREATE TABLE `Users` (
  `user_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
  ) ENGINE=InnoDB CHARSET=utf8;
