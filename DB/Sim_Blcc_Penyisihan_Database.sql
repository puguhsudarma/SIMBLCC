/*
SQLyog Ultimate v8.61 
MySQL - 5.5.5-10.1.10-MariaDB-log : Database - sim_blcc_penyisihan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sim_blcc_penyisihan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sim_blcc_penyisihan`;

/*Table structure for table `sbc_admin` */

DROP TABLE IF EXISTS `sbc_admin`;

CREATE TABLE `sbc_admin` (
  `id_admin` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(25) DEFAULT NULL,
  `username_admin` varchar(10) DEFAULT NULL,
  `password_admin` varchar(32) DEFAULT NULL,
  `time_created_admin` datetime DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `sbc_admin` */

insert  into `sbc_admin`(`id_admin`,`nama_admin`,`username_admin`,`password_admin`,`time_created_admin`) values (1,'Administrator','admin','21232f297a57a5a743894a0e4a801fc3','0000-00-00 00:00:00');

/*Table structure for table `sbc_biodata_peserta` */

DROP TABLE IF EXISTS `sbc_biodata_peserta`;

CREATE TABLE `sbc_biodata_peserta` (
  `id_peserta` varchar(11) NOT NULL,
  `nama_peserta` varchar(75) DEFAULT NULL,
  `tempat_lahir_peserta` varchar(25) DEFAULT NULL,
  `tanggal_lahir_peserta` date DEFAULT NULL,
  `email_peserta` varchar(20) DEFAULT NULL,
  `alamat_peserta` varchar(100) DEFAULT NULL,
  `nomor_telp_peserta` varchar(14) DEFAULT NULL,
  `sekolah_peserta` varchar(25) DEFAULT NULL,
  `password_peserta` varchar(32) DEFAULT NULL,
  `foto_peserta` blob,
  `id_tingkat_sekolah_peserta` tinyint(2) DEFAULT NULL,
  `id_rayon_peserta` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_peserta`),
  KEY `FK_rayon_peserta` (`id_rayon_peserta`),
  KEY `FK_tingkat_sekoalh_peserta` (`id_tingkat_sekolah_peserta`),
  CONSTRAINT `FK_rayon_peserta` FOREIGN KEY (`id_rayon_peserta`) REFERENCES `sbc_rayon` (`id_rayon`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tingkat_sekoalh_peserta` FOREIGN KEY (`id_tingkat_sekolah_peserta`) REFERENCES `sbc_tingkat_sekolah` (`id_tingkat_sekolah`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sbc_biodata_peserta` */

insert  into `sbc_biodata_peserta`(`id_peserta`,`nama_peserta`,`tempat_lahir_peserta`,`tanggal_lahir_peserta`,`email_peserta`,`alamat_peserta`,`nomor_telp_peserta`,`sekolah_peserta`,`password_peserta`,`foto_peserta`,`id_tingkat_sekolah_peserta`,`id_rayon_peserta`) values ('01010001','I Wayan Puguh Sudarma','Surabaya','0000-00-00','wayanpuguhsudarma@gm','Jln. Pulau Saelus I No. 1','085338106836','SMK TI Bali Global Denpas','628a98554d657ca8aa0577b07d56b602',NULL,3,1),('01010002','I Wayan Reroet Kupluk','Bali','0000-00-00','wayanpuguhsudarma@gm','Jln. rusak','0912498237','SMK Dija Kaden','628a98554d657ca8aa0577b07d56b602',NULL,1,1);

/*Table structure for table `sbc_jawaban` */

DROP TABLE IF EXISTS `sbc_jawaban`;

CREATE TABLE `sbc_jawaban` (
  `id_jawaban` int(11) NOT NULL AUTO_INCREMENT,
  `id_soal_jawaban` int(11) DEFAULT NULL,
  `teks_jawaban` varchar(1000) DEFAULT NULL,
  `gambar_jawaban` blob,
  `benar_jawaban` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_jawaban`),
  KEY `FK_soal_jawaban` (`id_soal_jawaban`),
  CONSTRAINT `FK_soal_jawaban` FOREIGN KEY (`id_soal_jawaban`) REFERENCES `sbc_soal` (`id_soal`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `sbc_jawaban` */

insert  into `sbc_jawaban`(`id_jawaban`,`id_soal_jawaban`,`teks_jawaban`,`gambar_jawaban`,`benar_jawaban`) values (1,1,'jawaban soal 1a SD',NULL,0),(2,1,'jawaban soal 1b SD',NULL,0),(3,1,'jawaban soal 1c SD',NULL,1),(4,1,'jawaban soal 1d SD',NULL,0),(5,2,'jawaban soal 2a SD',NULL,0),(6,2,'jawaban soal 2b SD',NULL,0),(7,2,'jawaban soal 2c SD',NULL,1),(9,2,'jawaban soal 2d SD',NULL,0),(10,3,'jawaban soal 3a SD',NULL,0),(11,3,'jawaban soal 3b SD',NULL,0),(12,3,'jawaban soal 3c SD',NULL,1),(13,3,'jawaban soal 3d SD',NULL,0),(14,4,'jawaban soal 4a SD',NULL,0),(15,4,'jawaban soal 4b SD',NULL,0),(16,4,'jawaban soal 4c SD',NULL,1),(17,4,'jawaban soal 4d SD',NULL,0),(18,5,'jawaban soal 5a SD',NULL,0),(19,5,'jawaban soal 5b SD',NULL,1),(20,5,'jawaban soal 5c SD',NULL,0),(21,5,'jawaban soal 5d SD',NULL,0),(22,6,'jawaban soal 1a SMP',NULL,0),(23,6,'jawaban soal 1b SMP',NULL,0),(24,6,'jawaban soal 1c SMP',NULL,1),(25,6,'jawaban soal 1d SMP',NULL,0),(26,7,'jawaban soal 2a SMP',NULL,0),(27,7,'jawaban soal 2b SMP',NULL,0),(28,7,'jawaban soal 2c SMP',NULL,0),(29,7,'jawaban soal 2d SMP',NULL,1),(30,8,'jawaban soal 3a SMP',NULL,0),(31,8,'jawaban soal 3b SMP',NULL,0),(32,8,'jawaban soal 3c SMP',NULL,1),(33,8,'jawaban soal 3d SMP',NULL,0),(34,9,'jawaban soal 4a SMP',NULL,0),(35,9,'jawaban soal 4b SMP',NULL,1),(36,9,'jawaban soal 4c SMP',NULL,0),(37,9,'jawaban soal 4d SMP',NULL,0),(38,10,'jawaban soal 5a SMP',NULL,0),(39,10,'jawaban soal 5b SMP',NULL,1),(40,10,'jawaban soal 5c SMP',NULL,0),(41,10,'jawaban soal 5d SMP',NULL,0),(42,11,'jawaban soal 1a SMA',NULL,1),(43,11,'jawaban soal 1b SMA',NULL,0),(44,11,'jawaban soal 1c SMA',NULL,0),(45,11,'jawaban soal 1d SMA',NULL,0),(46,12,'jawaban soal 2a SMA',NULL,1),(47,12,'jawaban soal 2b SMA',NULL,0),(48,12,'jawaban soal 2c SMA',NULL,0),(49,12,'jawaban soal 2d SMA',NULL,0),(50,13,'jawaban soal 1.1a SMA',NULL,0),(51,13,'jawaban soal 1.1b SMA',NULL,1),(52,13,'jawaban soal 1.1c SMA',NULL,0),(53,13,'jawaban soal 1.1d SMA',NULL,0),(54,14,'jawaban soal 2.1a SMA',NULL,0),(55,14,'jawaban soal 2.1b SMA',NULL,1),(56,14,'jawaban soal 2.1c SMA',NULL,0),(57,14,'jawaban soal 2.1d SMA',NULL,0),(58,15,'jawaban soal 3a SMA',NULL,0),(59,15,'jawaban soal 3b SMA',NULL,1),(60,15,'jawaban soal 3c SMA',NULL,0),(61,15,'jawaban soal 3d SMA',NULL,0),(62,16,'jawaban soal 4a SMA',NULL,0),(63,16,'jawaban soal 4b SMA',NULL,1),(64,16,'jawaban soal 4c SMA',NULL,0),(65,16,'jawaban soal 4d SMA',NULL,0);

/*Table structure for table `sbc_jawaban_peserta_tmp` */

DROP TABLE IF EXISTS `sbc_jawaban_peserta_tmp`;

CREATE TABLE `sbc_jawaban_peserta_tmp` (
  `id_jawaban_peserta_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_jawaban` int(11) DEFAULT NULL,
  `id_peserta` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id_jawaban_peserta_tmp`),
  KEY `FK_jawaban_peserta` (`id_peserta`),
  KEY `FK_jawaban_yang_didapat_peserta` (`id_jawaban`),
  CONSTRAINT `FK_jawaban_peserta` FOREIGN KEY (`id_peserta`) REFERENCES `sbc_lomba_peserta` (`id_peserta`) ON UPDATE CASCADE,
  CONSTRAINT `FK_jawaban_yang_didapat_peserta` FOREIGN KEY (`id_jawaban`) REFERENCES `sbc_jawaban` (`id_jawaban`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `sbc_jawaban_peserta_tmp` */

insert  into `sbc_jawaban_peserta_tmp`(`id_jawaban_peserta_tmp`,`id_jawaban`,`id_peserta`) values (1,10,'01010002'),(2,13,'01010002'),(3,6,'01010002'),(4,12,'01010002'),(5,20,'01010002'),(6,4,'01010002'),(7,16,'01010002'),(8,9,'01010002'),(9,14,'01010002'),(10,18,'01010002'),(11,2,'01010002'),(12,5,'01010002'),(13,11,'01010002'),(14,19,'01010002'),(15,17,'01010002'),(16,15,'01010002'),(17,1,'01010002'),(18,7,'01010002'),(19,21,'01010002'),(20,3,'01010002');

/*Table structure for table `sbc_lomba_peserta` */

DROP TABLE IF EXISTS `sbc_lomba_peserta`;

CREATE TABLE `sbc_lomba_peserta` (
  `id_peserta` varchar(11) NOT NULL,
  `verifikasi_peserta` int(1) DEFAULT NULL,
  `ikuti_lomba_peserta` int(1) DEFAULT NULL,
  `berkas_struk_pembayaran_peserta` blob,
  `berkas_biodata_ttd_peserta` blob,
  `waktu_mulai_peserta` datetime DEFAULT NULL,
  `waktu_selesai_peserta` datetime DEFAULT NULL,
  `jumlah_benar_jawab_peserta` int(3) DEFAULT NULL,
  `jumlah_salah_jawab_peserta` int(3) DEFAULT NULL,
  `jumlah_tidak_jawab_peserta` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_peserta`),
  CONSTRAINT `FK_sbc_lomba_peserta` FOREIGN KEY (`id_peserta`) REFERENCES `sbc_biodata_peserta` (`id_peserta`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sbc_lomba_peserta` */

insert  into `sbc_lomba_peserta`(`id_peserta`,`verifikasi_peserta`,`ikuti_lomba_peserta`,`berkas_struk_pembayaran_peserta`,`berkas_biodata_ttd_peserta`,`waktu_mulai_peserta`,`waktu_selesai_peserta`,`jumlah_benar_jawab_peserta`,`jumlah_salah_jawab_peserta`,`jumlah_tidak_jawab_peserta`) values ('01010001',0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('01010002',1,1,NULL,NULL,'2016-06-05 23:55:30','2016-06-06 01:55:31',2,2,1);

/*Table structure for table `sbc_pengumuman` */

DROP TABLE IF EXISTS `sbc_pengumuman`;

CREATE TABLE `sbc_pengumuman` (
  `id_pengumuman` int(4) NOT NULL AUTO_INCREMENT,
  `id_admin` tinyint(2) DEFAULT NULL,
  `judul_pengumuman` varchar(120) DEFAULT NULL,
  `teks_pengumuman` text,
  `time_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pengumuman`),
  KEY `FK_pengumuman_admin` (`id_admin`),
  CONSTRAINT `FK_pengumuman_admin` FOREIGN KEY (`id_admin`) REFERENCES `sbc_admin` (`id_admin`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sbc_pengumuman` */

/*Table structure for table `sbc_rayon` */

DROP TABLE IF EXISTS `sbc_rayon`;

CREATE TABLE `sbc_rayon` (
  `id_rayon` int(3) NOT NULL AUTO_INCREMENT,
  `nomor_rayon` tinyint(2) DEFAULT NULL,
  `kabupaten_rayon` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_rayon`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `sbc_rayon` */

insert  into `sbc_rayon`(`id_rayon`,`nomor_rayon`,`kabupaten_rayon`) values (1,1,'Denpasar'),(2,1,'Badung');

/*Table structure for table `sbc_setting` */

DROP TABLE IF EXISTS `sbc_setting`;

CREATE TABLE `sbc_setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `attr_setting` varchar(100) DEFAULT NULL,
  `value_setting` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `sbc_setting` */

insert  into `sbc_setting`(`id_setting`,`attr_setting`,`value_setting`) values (1,'waktu_mulai_lomba','2016-06-05 05:00:01'),(2,'waktu_selesai_lomba','2016-07-05 20:59:00'),(3,'banyak_soal_sma','10'),(4,'banyak_soal_smp','10'),(5,'banyak_soal_sd','10'),(6,'waktu_lomba','2H'),(7,'header_web','BLCC VIII'),(8,'tema_web','Open your mind, Open your logic.'),(9,'nilai_benar','4'),(10,'nilai_salah','1'),(11,'nilai_tidak_jawab','0');

/*Table structure for table `sbc_soal` */

DROP TABLE IF EXISTS `sbc_soal`;

CREATE TABLE `sbc_soal` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `teks_soal` varchar(50000) DEFAULT NULL,
  `gambar_soal` blob,
  `dummy_soal` tinyint(1) DEFAULT NULL,
  `id_tingkat_sekolah_soal` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id_soal`),
  KEY `FK_tingkatan_sekolah_soal` (`id_tingkat_sekolah_soal`),
  CONSTRAINT `FK_tingkatan_sekolah_soal` FOREIGN KEY (`id_tingkat_sekolah_soal`) REFERENCES `sbc_tingkat_sekolah` (`id_tingkat_sekolah`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `sbc_soal` */

insert  into `sbc_soal`(`id_soal`,`teks_soal`,`gambar_soal`,`dummy_soal`,`id_tingkat_sekolah_soal`) values (1,'soal sd 1',NULL,1,1),(2,'soal sd 2',NULL,0,1),(3,'soal sd 3',NULL,0,1),(4,'soal sd 4',NULL,1,1),(5,'soal sd 5',NULL,0,1),(6,'soal smp 1',NULL,0,2),(7,'soal smp 2',NULL,0,2),(8,'soal smp 3',NULL,1,2),(9,'soal smp 4',NULL,0,2),(10,'soal smp 5',NULL,0,2),(11,'soal sma/smk 1',NULL,0,3),(12,'soal sma/smk 2',NULL,1,3),(13,'soal sma/smk 1',NULL,0,3),(14,'soal sma/smk 2',NULL,0,3),(15,'soal sma/smk 3',NULL,0,3),(16,'soal sma/smk 4',NULL,0,3),(17,'soal sma/smk 6',NULL,1,3);

/*Table structure for table `sbc_soal_peserta_tmp` */

DROP TABLE IF EXISTS `sbc_soal_peserta_tmp`;

CREATE TABLE `sbc_soal_peserta_tmp` (
  `id_soal_peserta_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_soal` int(11) DEFAULT NULL,
  `id_peserta` varchar(11) DEFAULT NULL,
  `jawaban_peserta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_soal_peserta_tmp`),
  KEY `FK_soal_peserta` (`id_peserta`),
  KEY `FK_soal_yang_didapat_peserta` (`id_soal`),
  CONSTRAINT `FK_soal_peserta` FOREIGN KEY (`id_peserta`) REFERENCES `sbc_lomba_peserta` (`id_peserta`) ON UPDATE CASCADE,
  CONSTRAINT `FK_soal_yang_didapat_peserta` FOREIGN KEY (`id_soal`) REFERENCES `sbc_soal` (`id_soal`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `sbc_soal_peserta_tmp` */

insert  into `sbc_soal_peserta_tmp`(`id_soal_peserta_tmp`,`id_soal`,`id_peserta`,`jawaban_peserta`) values (1,4,'01010002',0),(2,1,'01010002',11),(3,3,'01010002',1),(4,5,'01010002',14),(5,2,'01010002',18);

/*Table structure for table `sbc_tingkat_sekolah` */

DROP TABLE IF EXISTS `sbc_tingkat_sekolah`;

CREATE TABLE `sbc_tingkat_sekolah` (
  `id_tingkat_sekolah` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nama_tingkat_sekolah` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_tingkat_sekolah`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `sbc_tingkat_sekolah` */

insert  into `sbc_tingkat_sekolah`(`id_tingkat_sekolah`,`nama_tingkat_sekolah`) values (1,'SD'),(2,'SMP'),(3,'SMA/SMK');

/* Procedure structure for procedure `last_id_peserta` */

/*!50003 DROP PROCEDURE IF EXISTS  `last_id_peserta` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `last_id_peserta`()
BEGIN
SELECT	id_peserta,
	SUBSTRING(id_peserta, 1, 2)*1 AS tingkat_sekolah,
	SUBSTRING(id_peserta, 3, 2)*1 AS rayon,
	SUBSTRING(id_peserta, -4)*1 AS id
FROM sbc_biodata_peserta
ORDER BY id DESC
LIMIT 1;
    END */$$
DELIMITER ;

/*Table structure for table `all_data_peserta` */

DROP TABLE IF EXISTS `all_data_peserta`;

/*!50001 DROP VIEW IF EXISTS `all_data_peserta` */;
/*!50001 DROP TABLE IF EXISTS `all_data_peserta` */;

/*!50001 CREATE TABLE  `all_data_peserta`(
 `id_peserta` varchar(11) ,
 `nama_peserta` varchar(75) ,
 `tempat_lahir_peserta` varchar(25) ,
 `tanggal_lahir_peserta` date ,
 `email_peserta` varchar(20) ,
 `alamat_peserta` varchar(100) ,
 `nomor_telp_peserta` varchar(14) ,
 `sekolah_peserta` varchar(25) ,
 `password_peserta` varchar(32) ,
 `foto_peserta` blob ,
 `id_tingkat_sekolah_peserta` tinyint(2) ,
 `id_rayon_peserta` int(3) ,
 `verifikasi_peserta` int(1) ,
 `ikuti_lomba_peserta` int(1) ,
 `berkas_struk_pembayaran_peserta` blob ,
 `berkas_biodata_ttd_peserta` blob ,
 `waktu_mulai_peserta` datetime ,
 `waktu_selesai_peserta` datetime ,
 `nilai_benar_jawab_peserta` int(3) ,
 `nilai_salah_jawab_peserta` int(3) ,
 `nilai_tidak_jawab_peserta` int(3) 
)*/;

/*Table structure for table `jawaban_peserta` */

DROP TABLE IF EXISTS `jawaban_peserta`;

/*!50001 DROP VIEW IF EXISTS `jawaban_peserta` */;
/*!50001 DROP TABLE IF EXISTS `jawaban_peserta` */;

/*!50001 CREATE TABLE  `jawaban_peserta`(
 `id_jawaban` int(11) ,
 `id_jawaban_peserta_tmp` int(11) ,
 `id_peserta` varchar(11) ,
 `id_soal_jawaban` int(11) ,
 `teks_jawaban` varchar(1000) ,
 `gambar_jawaban` blob ,
 `benar_jawaban` tinyint(1) 
)*/;

/*Table structure for table `soal_jawaban_tmp_peserta` */

DROP TABLE IF EXISTS `soal_jawaban_tmp_peserta`;

/*!50001 DROP VIEW IF EXISTS `soal_jawaban_tmp_peserta` */;
/*!50001 DROP TABLE IF EXISTS `soal_jawaban_tmp_peserta` */;

/*!50001 CREATE TABLE  `soal_jawaban_tmp_peserta`(
 `id_peserta` varchar(11) ,
 `id_soal_peserta_tmp` int(11) ,
 `id_soal` int(11) ,
 `teks_soal` varchar(50000) ,
 `gambar_soal` blob ,
 `dummy_soal` tinyint(1) ,
 `jawaban_peserta` int(11) ,
 `id_jawaban_peserta_tmp` int(11) ,
 `id_jawaban` int(11) ,
 `teks_jawaban` varchar(1000) ,
 `gambar_jawaban` blob ,
 `benar_jawaban` tinyint(1) 
)*/;

/*Table structure for table `soal_peserta` */

DROP TABLE IF EXISTS `soal_peserta`;

/*!50001 DROP VIEW IF EXISTS `soal_peserta` */;
/*!50001 DROP TABLE IF EXISTS `soal_peserta` */;

/*!50001 CREATE TABLE  `soal_peserta`(
 `id_soal` int(11) ,
 `id_soal_peserta_tmp` int(11) ,
 `id_peserta` varchar(11) ,
 `jawaban_peserta` int(11) ,
 `teks_soal` varchar(50000) ,
 `gambar_soal` blob ,
 `dummy_soal` tinyint(1) ,
 `id_tingkat_sekolah_soal` tinyint(2) 
)*/;

/*View structure for view all_data_peserta */

/*!50001 DROP TABLE IF EXISTS `all_data_peserta` */;
/*!50001 DROP VIEW IF EXISTS `all_data_peserta` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_data_peserta` AS (select `sbc_biodata_peserta`.`id_peserta` AS `id_peserta`,`sbc_biodata_peserta`.`nama_peserta` AS `nama_peserta`,`sbc_biodata_peserta`.`tempat_lahir_peserta` AS `tempat_lahir_peserta`,`sbc_biodata_peserta`.`tanggal_lahir_peserta` AS `tanggal_lahir_peserta`,`sbc_biodata_peserta`.`email_peserta` AS `email_peserta`,`sbc_biodata_peserta`.`alamat_peserta` AS `alamat_peserta`,`sbc_biodata_peserta`.`nomor_telp_peserta` AS `nomor_telp_peserta`,`sbc_biodata_peserta`.`sekolah_peserta` AS `sekolah_peserta`,`sbc_biodata_peserta`.`password_peserta` AS `password_peserta`,`sbc_biodata_peserta`.`foto_peserta` AS `foto_peserta`,`sbc_biodata_peserta`.`id_tingkat_sekolah_peserta` AS `id_tingkat_sekolah_peserta`,`sbc_biodata_peserta`.`id_rayon_peserta` AS `id_rayon_peserta`,`sbc_lomba_peserta`.`verifikasi_peserta` AS `verifikasi_peserta`,`sbc_lomba_peserta`.`ikuti_lomba_peserta` AS `ikuti_lomba_peserta`,`sbc_lomba_peserta`.`berkas_struk_pembayaran_peserta` AS `berkas_struk_pembayaran_peserta`,`sbc_lomba_peserta`.`berkas_biodata_ttd_peserta` AS `berkas_biodata_ttd_peserta`,`sbc_lomba_peserta`.`waktu_mulai_peserta` AS `waktu_mulai_peserta`,`sbc_lomba_peserta`.`waktu_selesai_peserta` AS `waktu_selesai_peserta`,`sbc_lomba_peserta`.`jumlah_benar_jawab_peserta` AS `nilai_benar_jawab_peserta`,`sbc_lomba_peserta`.`jumlah_salah_jawab_peserta` AS `nilai_salah_jawab_peserta`,`sbc_lomba_peserta`.`jumlah_tidak_jawab_peserta` AS `nilai_tidak_jawab_peserta` from (`sbc_biodata_peserta` join `sbc_lomba_peserta` on((`sbc_biodata_peserta`.`id_peserta` = `sbc_lomba_peserta`.`id_peserta`)))) */;

/*View structure for view jawaban_peserta */

/*!50001 DROP TABLE IF EXISTS `jawaban_peserta` */;
/*!50001 DROP VIEW IF EXISTS `jawaban_peserta` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jawaban_peserta` AS (select `jpt`.`id_jawaban` AS `id_jawaban`,`jpt`.`id_jawaban_peserta_tmp` AS `id_jawaban_peserta_tmp`,`jpt`.`id_peserta` AS `id_peserta`,`j`.`id_soal_jawaban` AS `id_soal_jawaban`,`j`.`teks_jawaban` AS `teks_jawaban`,`j`.`gambar_jawaban` AS `gambar_jawaban`,`j`.`benar_jawaban` AS `benar_jawaban` from (`sbc_jawaban_peserta_tmp` `jpt` left join `sbc_jawaban` `j` on((`jpt`.`id_jawaban` = `j`.`id_jawaban`)))) */;

/*View structure for view soal_jawaban_tmp_peserta */

/*!50001 DROP TABLE IF EXISTS `soal_jawaban_tmp_peserta` */;
/*!50001 DROP VIEW IF EXISTS `soal_jawaban_tmp_peserta` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `soal_jawaban_tmp_peserta` AS (select `ts`.`id_peserta` AS `id_peserta`,`ts`.`id_soal_peserta_tmp` AS `id_soal_peserta_tmp`,`ts`.`id_soal` AS `id_soal`,`ts`.`teks_soal` AS `teks_soal`,`ts`.`gambar_soal` AS `gambar_soal`,`ts`.`dummy_soal` AS `dummy_soal`,`ts`.`jawaban_peserta` AS `jawaban_peserta`,`tj`.`id_jawaban_peserta_tmp` AS `id_jawaban_peserta_tmp`,`tj`.`id_jawaban` AS `id_jawaban`,`tj`.`teks_jawaban` AS `teks_jawaban`,`tj`.`gambar_jawaban` AS `gambar_jawaban`,`tj`.`benar_jawaban` AS `benar_jawaban` from (`soal_peserta` `ts` left join `jawaban_peserta` `tj` on((`ts`.`id_soal` = `tj`.`id_soal_jawaban`))) order by `ts`.`id_soal_peserta_tmp`,`tj`.`id_jawaban_peserta_tmp`) */;

/*View structure for view soal_peserta */

/*!50001 DROP TABLE IF EXISTS `soal_peserta` */;
/*!50001 DROP VIEW IF EXISTS `soal_peserta` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `soal_peserta` AS (select `spt`.`id_soal` AS `id_soal`,`spt`.`id_soal_peserta_tmp` AS `id_soal_peserta_tmp`,`spt`.`id_peserta` AS `id_peserta`,`spt`.`jawaban_peserta` AS `jawaban_peserta`,`s`.`teks_soal` AS `teks_soal`,`s`.`gambar_soal` AS `gambar_soal`,`s`.`dummy_soal` AS `dummy_soal`,`s`.`id_tingkat_sekolah_soal` AS `id_tingkat_sekolah_soal` from (`sbc_soal_peserta_tmp` `spt` left join `sbc_soal` `s` on((`spt`.`id_soal` = `s`.`id_soal`)))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
