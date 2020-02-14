/*
SQLyog Community v11.52 (64 bit)
MySQL - 10.1.32-MariaDB : Database - ias
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ias` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ias`;

/*Table structure for table `contactus` */

DROP TABLE IF EXISTS `contactus`;

CREATE TABLE `contactus` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `msg` longtext,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `contactus` */

insert  into `contactus`(`c_id`,`name`,`mobile`,`email`,`subject`,`msg`,`created_at`) values (1,'chinna','8500050944','admin@gmail.com','','testing','2020-02-14 15:39:13');

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `pwd` varchar(250) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `address` text,
  `org_pwd` varchar(250) DEFAULT NULL,
  `p_pic` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_login` int(11) DEFAULT '0',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `customers` */

insert  into `customers`(`c_id`,`role`,`name`,`email`,`pwd`,`mobile`,`address`,`org_pwd`,`p_pic`,`status`,`created_at`,`updated_at`,`user_login`) values (1,'1','Admin','admin@gmail.com','e10adc3949ba59abbe56e057f20f883e','7894561230','testing','123456','1575617105.png',1,'2019-12-06 12:55:05','2019-12-06 12:55:05',0),(11,'2','Vasu','vasu@gmail.com','e10adc3949ba59abbe56e057f20f883e','8500050944','kadapa ','123456','1575113478.jpg',1,'2019-11-30 17:38:13','2019-11-30 17:38:13',0),(12,'3','doctor','doctor@gmail.com','e10adc3949ba59abbe56e057f20f883e','9494346081',NULL,'123456',NULL,1,'2019-12-06 11:38:15','0000-00-00 00:00:00',0),(13,'4','Advocate','advocate@gmail.com','e10adc3949ba59abbe56e057f20f883e','8528528523',NULL,'123456',NULL,1,'2019-12-06 11:38:54','0000-00-00 00:00:00',0),(14,'2','Breading Rams','bb@gmail.com','e10adc3949ba59abbe56e057f20f883e','1234567890','Testing','123456','1581665183.png',1,'2020-02-14 16:08:12','2020-02-14 16:08:12',0);

/*Table structure for table `report_comments` */

DROP TABLE IF EXISTS `report_comments`;

CREATE TABLE `report_comments` (
  `r_c_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) DEFAULT NULL,
  `comment` text,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`r_c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `report_comments` */

/*Table structure for table `report_files` */

DROP TABLE IF EXISTS `report_files`;

CREATE TABLE `report_files` (
  `r_f_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `file_name` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`r_f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `report_files` */

insert  into `report_files`(`r_f_id`,`r_id`,`c_id`,`name`,`file_name`,`status`,`created_at`,`created_by`) values (1,1,11,'sbdjkh','01575267356.jpg',1,'2019-12-02 11:45:56',11),(2,1,11,'xcZXCZXC','01575267356.jpg',1,'2019-12-06 10:37:47',11),(3,2,11,'dsad','01575608943.png',1,'2019-12-06 10:39:02',11),(4,3,11,'Sai med one','01575700000.png',1,'2019-12-07 11:56:39',11);

/*Table structure for table `reports` */

DROP TABLE IF EXISTS `reports`;

CREATE TABLE `reports` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `claim_type` varchar(250) DEFAULT NULL,
  `full_address` text,
  `remarks` text,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `reports` */

insert  into `reports`(`r_id`,`c_id`,`name`,`mobile`,`email`,`claim_type`,`full_address`,`remarks`,`status`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (1,11,'vasu','8500050944','chinnavasu@gmail.com','Medical Negligence',' xcZXCZXC','ZXCzx',1,'2019-12-02 12:21:47','0000-00-00 00:00:00',11,NULL),(2,11,'Vasudevareddy reddem','08500050944','shofu@gmail.com','Dental Negligence',' sadas',' dasdas',1,'2019-12-06 10:39:02','0000-00-00 00:00:00',11,NULL),(3,11,'Sai ','9874563210','saimed@gmail.com','Birth Injury','# 20-5-6\r\nSanjay Gandhi Colony',' ntgra',1,'2019-12-07 11:56:39','0000-00-00 00:00:00',11,NULL);

/*Table structure for table `reupload_report_comment` */

DROP TABLE IF EXISTS `reupload_report_comment`;

CREATE TABLE `reupload_report_comment` (
  `r_r_c_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_u_id` int(11) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `comment` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`r_r_c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `reupload_report_comment` */

insert  into `reupload_report_comment`(`r_r_c_id`,`r_u_id`,`type`,`comment`,`created_at`,`created_by`) values (1,3,'replay','testing  purpose ','2019-12-06 13:27:10',1),(2,3,'replay','bvnbsjkefbdsb','2019-12-06 13:26:55',1),(3,3,'replay','dsfgdgdfg','2019-12-06 15:40:46',1),(4,3,'replay','Testing  purpose it is  a  sample  purose','2019-12-07 10:22:24',1),(5,3,'replay','testig  like  this ','2019-12-07 10:43:33',12);

/*Table structure for table `reupload_report_files` */

DROP TABLE IF EXISTS `reupload_report_files`;

CREATE TABLE `reupload_report_files` (
  `re_u_f_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_u_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `file_name` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`re_u_f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `reupload_report_files` */

insert  into `reupload_report_files`(`re_u_f_id`,`r_u_id`,`name`,`file_name`,`status`,`created_at`,`created_by`) values (4,3,'testing  one ','01575614565.png',1,'2019-12-06 12:12:44',1);

/*Table structure for table `reuplod_reports` */

DROP TABLE IF EXISTS `reuplod_reports`;

CREATE TABLE `reuplod_reports` (
  `r_u_id` int(11) NOT NULL AUTO_INCREMENT,
  `doct_id` int(11) DEFAULT NULL,
  `advocate_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `claim_type` varchar(250) DEFAULT NULL,
  `full_address` text,
  `remarks` text,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`r_u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `reuplod_reports` */

insert  into `reuplod_reports`(`r_u_id`,`doct_id`,`advocate_id`,`name`,`claim_type`,`full_address`,`remarks`,`status`,`created_at`,`updated_at`,`created_by`,`updated_by`) values (3,12,13,'Reddem Vasudevareddy','Medical Negligence','It  is  a  sample  testing  purpose','It  is  a  sample  testing  purpose',1,'2019-12-06 12:12:44','0000-00-00 00:00:00',1,NULL);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `rname` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`r_id`,`rname`,`status`,`created_at`) values (1,'Admin',1,'2019-11-30 16:00:47'),(2,'Customer',1,'2019-11-30 16:00:51'),(3,'Doctor',1,'2019-11-30 16:00:54'),(4,'Advocate',1,'2019-11-30 16:00:58');

/*Table structure for table `upload_report_comment` */

DROP TABLE IF EXISTS `upload_report_comment`;

CREATE TABLE `upload_report_comment` (
  `r_c_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `comment` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`r_c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `upload_report_comment` */

insert  into `upload_report_comment`(`r_c_id`,`r_id`,`type`,`comment`,`created_at`,`created_by`) values (6,3,'replay','testing  purpose  like  this','2019-12-07 12:20:25',11),(7,3,'replay','testing purose ','2019-12-07 12:20:40',11),(8,3,'replay','Testing  like  this ','2019-12-07 12:20:59',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
