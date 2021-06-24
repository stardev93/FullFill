/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.14-MariaDB : Database - fulfill
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fulfill` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `fulfill`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1:active, 2: pending: 3: Suspend',
  `is_admin` tinyint(4) NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`birthday`,`phone`,`password`,`remember_token`,`state`,`is_admin`,`last_login`,`created_at`,`updated_at`) values 
(1,'test 123','test@gmail.com',NULL,'2021-02-24','+79133229856','$2y$10$bPwzqrJBHDLyK.6WVp5DSuF3LtSfa0tr6WCyl6.SqnNL6bp.bCvaq',NULL,2,0,NULL,'2021-02-10 01:23:18','2021-02-10 19:34:05'),
(4,'admin','admin@gmail.com',NULL,'2021-02-10',NULL,'$2y$10$q/fAjkUoJZ0UcQwDSpBjYeTgkM8e7sraDrTj1sBh4ZAky.7lsdENO',NULL,2,1,NULL,'2021-02-10 07:30:23','2021-02-10 07:30:23'),
(9,'test2','test2@gmail.com',NULL,'2021-02-10','1231231','$2y$10$Xv.j1mteSCxiJ1p6aKDtJeWiHDdu.RZAEXyIjoCl6wTa1L2BK4onq',NULL,1,0,NULL,'2021-02-10 18:24:14','2021-02-10 18:24:14'),
(10,'test 3','test3@gmail.com',NULL,'2021-02-11','+79133229856','$2y$10$aeXCtYr3Ptkxyiy0OQhlWOtRJG1N9foZiVkSUz3rcwAi.r1q1FNH2',NULL,1,0,NULL,'2021-02-10 18:49:59','2021-02-10 18:49:59'),
(12,'sdfsf sdf','test4@gmail.com',NULL,'2021-02-19','+79133229856','$2y$10$S8QtrQBVKoIU597PHD9e/ueJKiRIkaO0jGFC8jFChEYSyWfRPBUdC',NULL,3,0,NULL,'2021-02-10 19:21:01','2021-02-10 19:27:13'),
(13,'sdf sfs','123123@gmail.com',NULL,'2021-02-25','qweq','$2y$10$9NhH/k0h3zAGY/DxFFYZmu8hiRqsQ2ZiPvchdZl3vPk262KFe1may',NULL,1,0,NULL,'2021-02-10 19:29:17','2021-02-10 19:29:17');

/*Table structure for table `wooapis` */

DROP TABLE IF EXISTS `wooapis`;

CREATE TABLE `wooapis` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `store` varchar(255) NOT NULL,
  `consumer_key` text NOT NULL,
  `consumer_secret` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `wooapis` */

insert  into `wooapis`(`id`,`user_id`,`store`,`consumer_key`,`consumer_secret`,`created_at`,`updated_at`) values 
(1,1,'https://bulkeditor.nappies.co.nz/','ck_f8019647f78b1d092d2e4b1d9022f8c52c2b8eaa','cs_c245908ac474a7faca3979d5912ceef1c596dcbd','2021-04-28 00:46:55','2021-04-28 00:46:55');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
