/*
SQLyog Ultimate
MySQL - 10.4.21-MariaDB : Database - the_throne
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `daftar_game` */

DROP TABLE IF EXISTS `daftar_game`;

CREATE TABLE `daftar_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `daftar_game` */

insert  into `daftar_game`(`id`,`nama`,`gambar`) values 
(1,'DOTA','dota.png'),
(2,'Mobile Legend','mobilelegend.png'),
(3,'Free Fire','ff.png'),
(4,'PUBG PC','pubg.png'),
(5,'Valorant','valorant.png'),
(6,'PUBG Mobile','pubg2.png'),
(7,'Call Of Duty Mobile','cod.png'),
(8,'Genshin Impact','genshin.png');

/*Table structure for table `game_rank` */

DROP TABLE IF EXISTS `game_rank`;

CREATE TABLE `game_rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) DEFAULT NULL,
  `tier` varchar(50) DEFAULT NULL,
  `bintang_point` int(10) DEFAULT NULL,
  `harga` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `game_rank` */

insert  into `game_rank`(`id`,`game_id`,`tier`,`bintang_point`,`harga`) values 
(1,2,'warrior1',1,1000),
(2,2,'warrior2',1,1500);

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_harga` int(11) DEFAULT NULL,
  `no_pesanan` int(11) DEFAULT NULL,
  `id_game` varchar(10) DEFAULT NULL,
  `id_server` varchar(10) DEFAULT NULL,
  `total` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaksi` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `role_id` int(1) DEFAULT NULL,
  `waktu_gabung` int(11) DEFAULT NULL,
  `aktif` int(1) DEFAULT NULL,
  `tentang` varchar(128) DEFAULT NULL,
  `tempat_tinggal` varchar(128) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id`,`nama`,`email`,`gambar`,`password`,`role_id`,`waktu_gabung`,`aktif`,`tentang`,`tempat_tinggal`,`no_hp`) values 
(4,'Riyan First Tiyanto','riyandotianto2@gmail.com','3600_9_10.jpg','$2y$10$GLfBiFU0YHTEQ3xh2gaxZem0hJASvDrOWuBMhxZcPFJw0dX0q6jbG',1,1635650970,1,'  Web Designer / UX / Graphic Artist  ','Demo Street 123, Demo City 04312, NJ','081311011567'),
(6,'Dodi dadu','dody21@gmail.com','assts.png','$2y$10$M3.miyiKs/Hg5O/abDlbue6Ya8EdZg/RHg3j/iraM3PI5L/NfoRke',2,1635673334,0,' ini catatan   ','coba','coba'),
(9,'bobon','bobon@mail.com','assts.png','$2y$10$M3.miyiKs/Hg5O/abDlbue6Ya8EdZg/RHg3j/iraM3PI5L/NfoRke',3,1635673334,1,' ini catatan   ','coba','coba');

/*Table structure for table `user_akses_menu` */

DROP TABLE IF EXISTS `user_akses_menu`;

CREATE TABLE `user_akses_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_akses_menu` */

insert  into `user_akses_menu`(`id`,`role_id`,`menu_id`) values 
(1,1,1),
(2,1,2),
(3,2,2);

/*Table structure for table `user_menu` */

DROP TABLE IF EXISTS `user_menu`;

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_menu` */

insert  into `user_menu`(`id`,`nama_menu`) values 
(1,'Admin'),
(2,'User');

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_role` */

insert  into `user_role`(`id`,`role`) values 
(1,'Admin'),
(2,'Worker'),
(3,'Client');

/*Table structure for table `user_sub_menu` */

DROP TABLE IF EXISTS `user_sub_menu`;

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_sub_menu` */

insert  into `user_sub_menu`(`id`,`menu_id`,`judul`,`url`,`icon`,`is_active`) values 
(1,1,'Dasboard','admin','fas fa-tachometer-alt',1),
(2,1,'Daftar User','admin/list','fas fa-hat-cowboy-side',1),
(3,2,'Profile','user','fas fa-user',1),
(4,2,'Edit Profile','user/edit','fas fa-user-edit',1),
(5,1,'Pesanan','admin/pesanan','fas fa-shopping-cart',1),
(6,2,'Ubah Password','user/ubahpassword','fas fa-key',1),
(7,2,'Daftar Pekerjaan','user/pekerjaan','fas fa-gamepad',1),
(10,2,'Sedang Raid','user/raid','fab fa-battle-net',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
