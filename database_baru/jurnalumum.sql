/*
SQLyog Community v12.2.5 (32 bit)
MySQL - 10.1.8-MariaDB : Database - jurnalumum
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jurnalumum` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `jurnalumum`;

/*Table structure for table `tb_buku_besar` */

DROP TABLE IF EXISTS `tb_buku_besar`;

CREATE TABLE `tb_buku_besar` (
  `id_akun` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) DEFAULT NULL,
  `tanggal` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `ref` int(11) DEFAULT NULL,
  `debit` float(20,2) DEFAULT NULL,
  `kredit` float(20,2) DEFAULT NULL,
  `saldo_debed` float(20,2) DEFAULT NULL,
  `saldo_kredit` float(20,2) DEFAULT NULL,
  `tgl_post` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_akun`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_buku_besar` */

/*Table structure for table `tb_kategori` */

DROP TABLE IF EXISTS `tb_kategori`;

CREATE TABLE `tb_kategori` (
  `kode_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `tanggal_post` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=668 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_kategori` */

insert  into `tb_kategori`(`kode_kategori`,`nama`,`tanggal_post`) values 
(111,'kas','2022-06-17 19:56:02'),
(112,'modal','2022-06-17 19:56:31'),
(113,'pendapatan usaha','2022-06-17 19:57:25'),
(114,'beban pajak','2022-06-17 19:58:09'),
(115,'beban operasional','2022-06-17 19:58:26'),
(116,'Biaya Administrasi bank','2022-06-17 19:59:07'),
(117,'Biaya Materai bank','2022-06-17 19:59:34'),
(118,'Beban Gaji Karyawan','2022-06-17 20:00:35'),
(119,'Beban Air, Listrik & Telepon','2022-06-17 20:00:59'),
(120,'Beban Jamsostek','2022-06-17 20:01:21'),
(121,'Beban Bunga Bank','2022-06-17 20:01:40');

/*Table structure for table `tb_money_conv` */

DROP TABLE IF EXISTS `tb_money_conv`;

CREATE TABLE `tb_money_conv` (
  `id_cur` int(11) NOT NULL AUTO_INCREMENT,
  `mata_uang` varchar(50) DEFAULT NULL,
  `nilai_con` float(20,2) DEFAULT NULL,
  PRIMARY KEY (`id_cur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_money_conv` */

insert  into `tb_money_conv`(`id_cur`,`mata_uang`,`nilai_con`) values 
(0,'Rp',0.00),
(1,'USD',14816.50);

/*Table structure for table `tb_rekening` */

DROP TABLE IF EXISTS `tb_rekening`;

CREATE TABLE `tb_rekening` (
  `id_rek` int(11) NOT NULL AUTO_INCREMENT,
  `no_rek` varchar(50) DEFAULT NULL,
  `nama_rek` varchar(100) DEFAULT NULL,
  `nominal` float(20,2) DEFAULT NULL,
  `tgl_post` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_rek`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_rekening` */

insert  into `tb_rekening`(`id_rek`,`no_rek`,`nama_rek`,`nominal`,`tgl_post`) values 
(12,'12345678','BNI',5263120.50,'2022-06-17 20:40:08'),
(13,'11133345','BCA ',22112346.00,'2022-06-17 20:40:34');

/*Table structure for table `tb_transaksi` */

DROP TABLE IF EXISTS `tb_transaksi`;

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `id_kategori` int(11) DEFAULT NULL,
  `id_rek` int(11) NOT NULL,
  `debit` float(20,2) DEFAULT NULL,
  `kredit` float(20,2) DEFAULT NULL,
  `saldo_awal` float(20,2) DEFAULT NULL,
  `saldo_akhir` float(20,2) DEFAULT NULL,
  `tgl_post` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_transaksi` */

insert  into `tb_transaksi`(`id_transaksi`,`tanggal`,`keterangan`,`id_kategori`,`id_rek`,`debit`,`kredit`,`saldo_awal`,`saldo_akhir`,`tgl_post`,`user_id`) values 
(1,'2022-06-17','Pendapatan Bunga Bank ',111,12,0.00,136875.27,5400000.00,5263120.50,'2022-06-17 20:51:23',1);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`username`,`password`,`email`,`level`,`nama_lengkap`) values 
(1,'admin','admin','@demoapp','admin','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
