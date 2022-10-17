# fictionscore
* Login System
* Dynamic Score Calculator
* CRUD Fictions
* Responsive Design on Index, Login and Sign Up

# create database
CREATE DATABASE `fictionscore`;

USE fictionscore;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `score_list` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `fcat` varchar(255) NOT NULL,
  `fmain` int(11) DEFAULT NULL,
  `fsecond` int(11) DEFAULT NULL,
  `fant` int(11) DEFAULT NULL,
  `fscript` int(11) DEFAULT NULL,
  `fextra` int(11) DEFAULT NULL,
  `fscore` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`fid`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `score_list_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
);
