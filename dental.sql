/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.2.3-MariaDB-log : Database - dental
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dental` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dental`;

/*Table structure for table `accounts` */

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `isAdmin` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `accounts` */

insert  into `accounts`(`id`,`username`,`password`,`created_at`,`updated_at`,`isAdmin`) values (10,'admin@dental.com','1234','2016-07-21 17:08:47','2016-07-21 17:09:15','TRUE'),(16,'john.doe@dental.com','1234','2017-04-08 10:46:55','0000-00-00 00:00:00','FALSE');

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `customers` */

insert  into `customers`(`id`,`lname`,`fname`,`age`,`birthday`,`gender`,`email`) values (9,'Doe','John','','','','john.doe@dental.com');

/*Table structure for table `reservation` */

DROP TABLE IF EXISTS `reservation`;

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(2555) DEFAULT NULL,
  `service_id` varchar(255) DEFAULT NULL,
  `reserved_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `r_date` varchar(255) DEFAULT NULL,
  `r_time` varchar(255) DEFAULT NULL,
  `isApproved` varchar(255) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `reservation` */

insert  into `reservation`(`id`,`customer_id`,`service_id`,`reserved_at`,`r_date`,`r_time`,`isApproved`) values (28,'9','7','2017-04-08 11:00:49','2017-04-10','9:00AM','FALSE');

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `isDeleted` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `services` */

insert  into `services`(`id`,`service`,`description`,`isDeleted`,`price`) values (7,'Consulation','Fee','FALSE','5001');

/*Table structure for table `qryinformation` */

DROP TABLE IF EXISTS `qryinformation`;

/*!50001 DROP VIEW IF EXISTS `qryinformation` */;
/*!50001 DROP TABLE IF EXISTS `qryinformation` */;

/*!50001 CREATE TABLE  `qryinformation`(
 `username` varchar(255) ,
 `password` varchar(255) ,
 `isAdmin` varchar(255) ,
 `acc_id` int(11) ,
 `id` int(11) ,
 `lname` varchar(255) ,
 `fname` varchar(255) ,
 `age` varchar(255) ,
 `birthday` varchar(255) ,
 `gender` varchar(255) ,
 `email` varchar(255) 
)*/;

/*Table structure for table `qrymysummary` */

DROP TABLE IF EXISTS `qrymysummary`;

/*!50001 DROP VIEW IF EXISTS `qrymysummary` */;
/*!50001 DROP TABLE IF EXISTS `qrymysummary` */;

/*!50001 CREATE TABLE  `qrymysummary`(
 `id` int(11) ,
 `age` varchar(255) ,
 `birthday` varchar(255) ,
 `email` varchar(255) ,
 `fname` varchar(255) ,
 `lname` varchar(255) ,
 `gender` varchar(255) ,
 `service` varchar(255) ,
 `price` varchar(255) ,
 `description` varchar(255) ,
 `r_date` varchar(255) ,
 `r_time` varchar(255) ,
 `reserved_at` timestamp ,
 `isApproved` varchar(255) 
)*/;

/*Table structure for table `qryreservation` */

DROP TABLE IF EXISTS `qryreservation`;

/*!50001 DROP VIEW IF EXISTS `qryreservation` */;
/*!50001 DROP TABLE IF EXISTS `qryreservation` */;

/*!50001 CREATE TABLE  `qryreservation`(
 `id` int(11) ,
 `age` varchar(255) ,
 `birthday` varchar(255) ,
 `email` varchar(255) ,
 `fname` varchar(255) ,
 `lname` varchar(255) ,
 `gender` varchar(255) ,
 `service` varchar(255) ,
 `description` varchar(255) ,
 `price` varchar(255) ,
 `r_date` varchar(255) ,
 `r_time` varchar(255) ,
 `reserved_at` timestamp ,
 `isApproved` varchar(255) 
)*/;

/*View structure for view qryinformation */

/*!50001 DROP TABLE IF EXISTS `qryinformation` */;
/*!50001 DROP VIEW IF EXISTS `qryinformation` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qryinformation` AS select `a`.`username` AS `username`,`a`.`password` AS `password`,`a`.`isAdmin` AS `isAdmin`,`c`.`id` AS `acc_id`,`c`.`id` AS `id`,`c`.`lname` AS `lname`,`c`.`fname` AS `fname`,`c`.`age` AS `age`,`c`.`birthday` AS `birthday`,`c`.`gender` AS `gender`,`c`.`email` AS `email` from (`accounts` `a` left join `customers` `c` on(`a`.`username` = `c`.`email`)) */;

/*View structure for view qrymysummary */

/*!50001 DROP TABLE IF EXISTS `qrymysummary` */;
/*!50001 DROP VIEW IF EXISTS `qrymysummary` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qrymysummary` AS select `qryreservation`.`id` AS `id`,`qryreservation`.`age` AS `age`,`qryreservation`.`birthday` AS `birthday`,`qryreservation`.`email` AS `email`,`qryreservation`.`fname` AS `fname`,`qryreservation`.`lname` AS `lname`,`qryreservation`.`gender` AS `gender`,`qryreservation`.`service` AS `service`,`qryreservation`.`price` AS `price`,`qryreservation`.`description` AS `description`,`qryreservation`.`r_date` AS `r_date`,`qryreservation`.`r_time` AS `r_time`,`qryreservation`.`reserved_at` AS `reserved_at`,`qryreservation`.`isApproved` AS `isApproved` from `qryreservation` group by `qryreservation`.`r_date` */;

/*View structure for view qryreservation */

/*!50001 DROP TABLE IF EXISTS `qryreservation` */;
/*!50001 DROP VIEW IF EXISTS `qryreservation` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qryreservation` AS select `customers`.`id` AS `id`,`customers`.`age` AS `age`,`customers`.`birthday` AS `birthday`,`customers`.`email` AS `email`,`customers`.`fname` AS `fname`,`customers`.`lname` AS `lname`,`customers`.`gender` AS `gender`,`services`.`service` AS `service`,`services`.`description` AS `description`,`services`.`price` AS `price`,`reservation`.`r_date` AS `r_date`,`reservation`.`r_time` AS `r_time`,`reservation`.`reserved_at` AS `reserved_at`,`reservation`.`isApproved` AS `isApproved` from ((`customers` join `reservation` on(`customers`.`id` = `reservation`.`customer_id`)) join `services` on(`reservation`.`service_id` = `services`.`id`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
