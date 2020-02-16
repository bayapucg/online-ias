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

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `designation` varchar(250) DEFAULT NULL,
  `dob` varchar(250) DEFAULT NULL,
  `qualification` varchar(250) DEFAULT NULL,
  `pwd` varchar(250) DEFAULT NULL,
  `org_password` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `notes` varchar(250) DEFAULT NULL,
  `profile_pic` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id`,`role`,`name`,`email`,`designation`,`dob`,`qualification`,`pwd`,`org_password`,`address`,`mobile`,`notes`,`profile_pic`,`status`,`created_at`,`updated_at`,`created_by`) values (3,'1','Admin','admin@gmail.com','','','','e10adc3949ba59abbe56e057f20f883e','123456','kothallai','9638527410','texXZ','1581683134.png',1,NULL,'2020-02-14 17:55:33',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `customers` */

insert  into `customers`(`c_id`,`role`,`name`,`email`,`pwd`,`mobile`,`address`,`org_pwd`,`p_pic`,`status`,`created_at`,`updated_at`,`user_login`) values (11,'2','Vasu','vasu@gmail.com','e10adc3949ba59abbe56e057f20f883e','8500050944','kadapa ','123456','1575113478.jpg',1,'2019-11-30 17:38:13','2019-11-30 17:38:13',0),(14,'2','Breading Rams','bb@gmail.com','e10adc3949ba59abbe56e057f20f883e','1234567890','Testing','123456','1581665183.png',1,'2020-02-14 16:08:12','2020-02-14 16:08:12',0),(15,'2','ddd','bbb@gmail.com','e10adc3949ba59abbe56e057f20f883e','8527412365',NULL,'123456',NULL,1,'2020-02-16 18:27:34','0000-00-00 00:00:00',0),(16,'2','bbbbb','bcnc@gmail.com','e10adc3949ba59abbe56e057f20f883e','6547123333',NULL,'123456',NULL,1,'2020-02-16 18:28:27','0000-00-00 00:00:00',0),(17,'2','cvnxb','bxmncbnxbc@gmail.com','e10adc3949ba59abbe56e057f20f883e','98745632112',NULL,'123456',NULL,1,'2020-02-16 18:29:22','0000-00-00 00:00:00',0);

/*Table structure for table `home_banners` */

DROP TABLE IF EXISTS `home_banners`;

CREATE TABLE `home_banners` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `image` varchar(250) DEFAULT NULL,
  `org_image` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `home_banners` */

insert  into `home_banners`(`b_id`,`title`,`image`,`org_image`,`status`,`create_at`,`update_at`,`create_by`) values (4,'Best online IAS Academy','1581683994.jpg','3.jpg',1,'2020-02-14 18:08:57','2020-02-14 18:09:54',3),(5,'Best online IAS Academy	','1581684116.jpg','3.jpg',1,'2020-02-14 18:11:55','2020-02-14 18:11:55',3);

/*Table structure for table `payment_details` */

DROP TABLE IF EXISTS `payment_details`;

CREATE TABLE `payment_details` (
  `p_d_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `total_amt` varchar(250) DEFAULT NULL,
  `paid_amt` varchar(250) DEFAULT NULL,
  `coupon_code` varchar(250) DEFAULT NULL,
  `razorpay_payment_id` varchar(250) DEFAULT NULL,
  `razorpay_order_id` varchar(250) DEFAULT NULL,
  `razorpay_signature` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `payment_details` */

insert  into `payment_details`(`p_d_id`,`c_id`,`p_id`,`total_amt`,`paid_amt`,`coupon_code`,`razorpay_payment_id`,`razorpay_order_id`,`razorpay_signature`,`status`,`created_at`,`created_by`) values (1,17,1,'12000','10000','2000','pay_EHUzzSNxwnHkrp','','',1,'2020-02-16 23:06:42',17);

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `description` longtext,
  `amt` varchar(250) DEFAULT NULL,
  `promo` varchar(250) DEFAULT NULL,
  `promo_amt` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `payments` */

insert  into `payments`(`p_id`,`title`,`description`,`amt`,`promo`,`promo_amt`,`status`,`created_at`,`updated_at`,`created_by`) values (1,'Best online IAS Academy','Best online IAS Academy Best online IAS Academy Best online IAS Academy','12000','VASUREDDEM','2000',1,'2020-02-16 06:42:39','2020-02-16 07:05:38',3),(2,'Few tips for get better results in examination','Few tips for get better results in examination Few tips for get better results in examination','15000','CHINNA','200',1,'2020-02-16 06:58:03','2020-02-16 07:05:56',3),(3,'Best online IAS Academy','Best online IAS Academy Best online IAS Academy Best online IAS Academy','12000','VASUR','2000',1,'2020-02-16 07:04:04',NULL,3);

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

/*Table structure for table `videos` */

DROP TABLE IF EXISTS `videos`;

CREATE TABLE `videos` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `ptype` int(11) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `topic` varchar(250) DEFAULT NULL,
  `teacher` varchar(250) DEFAULT NULL,
  `video` varchar(250) DEFAULT NULL,
  `org_video` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `videos` */

insert  into `videos`(`v_id`,`ptype`,`type`,`title`,`topic`,`teacher`,`video`,`org_video`,`status`,`created_at`,`updated_at`,`created_by`) values (5,1,'demo','Best online IAS Academy','Testing','Vasudevareddy','1581685660.mp4','class1.mp4',1,'2020-02-14 18:37:40','2020-02-16 19:21:28',3),(6,1,'demo','Class 1','Class 1','Class 1','1581685714.mp4','class1.mp4',1,'2020-02-14 18:38:33','2020-02-16 19:21:39',3),(7,1,'demo','Class 1','Class 1','Class 1','1581685730.mp4','class1.mp4',1,'2020-02-14 18:38:49','2020-02-16 19:21:48',3),(8,1,'Live','Class 1','Class 1','Class 1','1581685744.mp4','class1.mp4',1,'2020-02-14 18:39:03','2020-02-16 19:22:00',3),(10,1,'Live','Best online IAS Academy','Class 1','Vasudevareddy','1581687460.mp4','class1.mp4',1,'2020-02-14 19:07:39','2020-02-16 19:22:06',3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
