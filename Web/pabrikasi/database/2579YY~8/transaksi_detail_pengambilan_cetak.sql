-- MySQL dump 10.13  Distrib 8.0.15, for Linux (x86_64)
--
-- Host: localhost    Database: db_klip_plastik
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `transaksi_detail_pengambilan_cetak`
--

DROP TABLE IF EXISTS `transaksi_detail_pengambilan_cetak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `transaksi_detail_pengambilan_cetak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_gd_roll` varchar(20) NOT NULL,
  `kd_cetak` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_rencana` date NOT NULL,
  `tgl_pengambilan` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `berat` decimal(10,2) NOT NULL DEFAULT '0.00',
  `bobin` decimal(5,0) NOT NULL DEFAULT '0',
  `payung` decimal(5,0) NOT NULL DEFAULT '0',
  `payung_kuning` decimal(5,0) NOT NULL DEFAULT '0',
  `sts_transaksi` enum('PENDING','PROGRESS','FINISH') NOT NULL DEFAULT 'PENDING',
  `shift` varchar(10) DEFAULT NULL,
  `diperbarui` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` enum('TRUE','FALSE') NOT NULL DEFAULT 'FALSE',
  PRIMARY KEY (`id`),
  KEY `kd_gd_roll` (`kd_gd_roll`),
  KEY `kd_cetak` (`kd_cetak`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `transaksi_detail_pengambilan_cetak_ibfk_1` FOREIGN KEY (`kd_gd_roll`) REFERENCES `gudang_roll` (`kd_gd_roll`),
  CONSTRAINT `transaksi_detail_pengambilan_cetak_ibfk_2` FOREIGN KEY (`kd_cetak`) REFERENCES `rencana_cetak` (`kd_cetak`),
  CONSTRAINT `transaksi_detail_pengambilan_cetak_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi_detail_pengambilan_cetak`
--

LOCK TABLES `transaksi_detail_pengambilan_cetak` WRITE;
/*!40000 ALTER TABLE `transaksi_detail_pengambilan_cetak` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaksi_detail_pengambilan_cetak` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-25 23:59:44
