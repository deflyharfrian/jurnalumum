/*
SQLyog Professional v13.1.1 (32 bit)
MySQL - 10.4.24-MariaDB : Database - jurnalumum
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jurnalumum` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `jurnalumum`;

/*Table structure for table `tb_buku_besar` */

DROP TABLE IF EXISTS `tb_buku_besar`;

CREATE TABLE `tb_buku_besar` (
  `id_akun` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `ref` int(11) DEFAULT NULL,
  `debit` float(20,2) DEFAULT NULL,
  `kredit` float(20,2) DEFAULT NULL,
  `saldo_debed` float(20,2) DEFAULT NULL,
  `saldo_kredit` float(20,2) DEFAULT NULL,
  `tgl_post` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_akun`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_buku_besar` */

/*Table structure for table `tb_kategori` */

DROP TABLE IF EXISTS `tb_kategori`;

CREATE TABLE `tb_kategori` (
  `kode_kategori` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_kategori` */

insert  into `tb_kategori`(`kode_kategori`,`nama`,`tanggal_post`) values 
(10,'---AKTIVA LANCAR---','0000-00-00 00:00:00'),
(101,'Kas','0000-00-00 00:00:00'),
(102,'Persediaan barang dagang','0000-00-00 00:00:00'),
(103,'Piutang usaha','0000-00-00 00:00:00'),
(104,'Penyisihan piutang usaha','0000-00-00 00:00:00'),
(105,'Wesel tagih','0000-00-00 00:00:00'),
(106,'Perlengkapan','0000-00-00 00:00:00'),
(106,'Iklan dibayar dimuka','0000-00-00 00:00:00'),
(108,'Sewa dibayar dimuka','0000-00-00 00:00:00'),
(109,'Asuransi dibayar dimuka','0000-00-00 00:00:00'),
(11,'---INVESTASI JANGKA PANJANG---','0000-00-00 00:00:00'),
(111,'Investasi saham','0000-00-00 00:00:00'),
(112,'Investasi obligasi','0000-00-00 00:00:00'),
(12,'---AKTIVA TETAP---','0000-00-00 00:00:00'),
(121,'Peralatan','0000-00-00 00:00:00'),
(122,'Akumulasi penyusutan peralatan','0000-00-00 00:00:00'),
(123,'Kendaraan','0000-00-00 00:00:00'),
(124,'Akumulasi Penyusutan peralatan kendaraan','0000-00-00 00:00:00'),
(125,'Gedung','0000-00-00 00:00:00'),
(127,'Akumulasi penyusutan gedung','0000-00-00 00:00:00'),
(127,'Tanah','0000-00-00 00:00:00'),
(13,'---AKTIVA TETAP TIDAK BERWUJUD---','0000-00-00 00:00:00'),
(131,'Hak Paten','0000-00-00 00:00:00'),
(132,'Hak Cipta','0000-00-00 00:00:00'),
(133,'Merk dagang','0000-00-00 00:00:00'),
(134,'Goodwill','0000-00-00 00:00:00'),
(135,'Franchise','0000-00-00 00:00:00'),
(14,'---AKTIVA LAIN-LAIN---','0000-00-00 00:00:00'),
(141,'Mesin yang tidak digunakan','0000-00-00 00:00:00'),
(142,'Beban yang ditangguhkan','0000-00-00 00:00:00'),
(143,'Piutang kepada pemegang saham','0000-00-00 00:00:00'),
(20,'---KEWAJIBAN---','0000-00-00 00:00:00'),
(201,'Utang usaha','0000-00-00 00:00:00'),
(202,'Utang wesel','0000-00-00 00:00:00'),
(203,'Beban yang masih harus dibayar','0000-00-00 00:00:00'),
(204,'Utang gaji','0000-00-00 00:00:00'),
(205,'Utang sewa gedung','0000-00-00 00:00:00'),
(206,'Utang pajak penghasilan','0000-00-00 00:00:00'),
(21,'---KEWAJIBAN JANGKA PANJANG---','0000-00-00 00:00:00'),
(211,'Utang hipotek','0000-00-00 00:00:00'),
(212,'Utang obligasi','0000-00-00 00:00:00'),
(213,'Utang gadai','0000-00-00 00:00:00'),
(30,'---EKUITAS---','0000-00-00 00:00:00'),
(301,'Modal/ekuitas pemilik','0000-00-00 00:00:00'),
(302,'Prive','0000-00-00 00:00:00'),
(40,'---PENDAPATAN---','0000-00-00 00:00:00'),
(401,'Pendapatan usaha','0000-00-00 00:00:00'),
(410,'Pendapatan di luar usaha','0000-00-00 00:00:00'),
(50,'---BEBAN---','0000-00-00 00:00:00'),
(501,'Beban gaji toko','0000-00-00 00:00:00'),
(502,'Beban gaji kantor','0000-00-00 00:00:00'),
(503,'Beban sewa gedung','0000-00-00 00:00:00'),
(504,'Beban penyesuaian piutang','0000-00-00 00:00:00'),
(505,'Beban perlengkapan kantor','0000-00-00 00:00:00'),
(506,'Beban perlengakapan toko','0000-00-00 00:00:00'),
(507,'Beban iklan','0000-00-00 00:00:00'),
(508,'Beban penyusutan peralatan','0000-00-00 00:00:00'),
(509,'Beban penyusutan','0000-00-00 00:00:00'),
(510,'Beban bunga','0000-00-00 00:00:00'),
(511,'Beban lain-lain','0000-00-00 00:00:00');

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
  `tgl_post` char(50) DEFAULT NULL,
  PRIMARY KEY (`id_rek`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_rekening` */

insert  into `tb_rekening`(`id_rek`,`no_rek`,`nama_rek`,`nominal`,`tgl_post`) values 
(12,'12345678','BNI',26125704.00,'2022-06-17 20:40:08'),
(13,'11133345','BCA ',0.00,'2022-06-17 20:40:34');

/*Table structure for table `tb_transaksi` */

DROP TABLE IF EXISTS `tb_transaksi`;

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_rek` int(11) NOT NULL,
  `debit` float(20,2) DEFAULT NULL,
  `kredit` float(20,2) DEFAULT NULL,
  `saldo_awal` float(20,2) DEFAULT NULL,
  `saldo_akhir` float(20,2) DEFAULT NULL,
  `tgl_post` varchar(50) DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_transaksi` */

insert  into `tb_transaksi`(`id_transaksi`,`tanggal`,`keterangan`,`id_kategori`,`id_rek`,`debit`,`kredit`,`saldo_awal`,`saldo_akhir`,`tgl_post`,`user_id`) values 
(61,'01/01/2022','Sisa Saldo Bulan Desember',101,12,55670204.00,0.00,0.00,55670204.00,'2022-07-18 21:34:12','1'),
(62,'01/01/2022','Pendapatan bunga bank',410,12,136875.00,0.00,55670204.00,55807080.00,'2022-07-18 21:35:18','1'),
(63,'01/01/2022','Pembayaran Pajak',206,12,0.00,27375.00,55807080.00,55779704.00,'2022-07-18 21:40:01','1'),
(65,'01/07/2022','Pembayaran tagihan BPJS Kesehatan dan Tenaga Kerja periode Januari 2020',109,12,0.00,25136086.00,55779704.00,30643618.00,'2022-07-18 21:48:40','1'),
(66,'01/07/2022','Pembayaran tagihan listrik, indovision, telkom, kartu prabayar periode Januari 2020',203,12,0.00,10757914.00,30643618.00,19885704.00,'2022-07-18 21:50:30','1'),
(67,'01/07/2022','Tambahan pembelian genset ( Bp. Jony )',121,12,0.00,5000000.00,19885704.00,14885704.00,'2022-07-18 21:53:02','1'),
(68,'01/09/2022','Pendapatan Termin',401,12,6240000.00,0.00,14885704.00,21125704.00,'2022-07-18 22:03:06','1'),
(69,'01/24/2022','Kas operasional kantor PT. Salamah Amal Mulia ( Adm. Estu Mulyangsih )',505,12,5000000.00,0.00,21125704.00,26125704.00,'2022-07-18 22:05:14','1');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`username`,`password`,`email`,`level`,`nama_lengkap`) values 
(1,'admin','admin','@demoapp','admin','admin'),
(2,'admin2','admin','@demoapp','admin','adminaja');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
