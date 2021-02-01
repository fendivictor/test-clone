/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.1.38-MariaDB : Database - ahu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `screensaver` */

DROP TABLE IF EXISTS `screensaver`;

CREATE TABLE `screensaver` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `file` varchar(250) DEFAULT '',
  `file_type` varchar(30) DEFAULT '',
  `insert_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_insert` varchar(60) DEFAULT '',
  `update_at` datetime DEFAULT NULL,
  `user_update` varchar(60) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `screensaver` */

insert  into `screensaver`(`id`,`file`,`file_type`,`insert_at`,`user_insert`,`update_at`,`user_update`) values 
(3,'foto_202102011717361220020166.jpg','foto','2021-02-01 16:00:06','admin','2021-02-01 17:17:36','admin'),
(4,'video_20210201171249480421585.mp4','video','2021-02-01 16:02:21','admin','2021-02-01 17:12:49','admin'),
(10,'video_202102011708141193460154.mp4','video','2021-02-01 17:08:14','admin',NULL,'');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(120) DEFAULT '',
  `password` varchar(250) DEFAULT '',
  `profile_name` varchar(160) DEFAULT '',
  `email` varchar(160) DEFAULT '',
  `last_login` datetime DEFAULT NULL,
  `photo` varchar(120) DEFAULT '',
  `insert_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`profile_name`,`email`,`last_login`,`photo`,`insert_at`,`update_at`) values 
(1,'admin','$2y$10$swSf9BlbFawKOnrGqki9..w0KQNVgpCvR.ztFTXop4c9hElHC47y6','Administrator','fendivictor@gmail.com',NULL,'','2021-02-01 19:58:07','2021-02-01 17:50:31'),
(3,'','','','','2021-02-01 17:51:03','','2021-02-01 23:51:03',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
