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
-- Table structure for table `transaksi_detail_permintaan_plastik_hd`
--

DROP TABLE IF EXISTS `transaksi_detail_permintaan_plastik_hd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `transaksi_detail_permintaan_plastik_hd` (
  `id_dpp` int(11) NOT NULL AUTO_INCREMENT,
  `kd_permintaan_plastik` varchar(20) NOT NULL,
  `kd_gd_hasil` varchar(20) NOT NULL,
  `jumlah_berat_permintaan` decimal(15,2) NOT NULL DEFAULT '0.00',
  `jumlah_lembar_permintaan` decimal(15,0) NOT NULL DEFAULT '0',
  `jumlah_berat_terima` decimal(15,2) NOT NULL DEFAULT '0.00',
  `jumlah_lembar_terima` decimal(15,0) NOT NULL DEFAULT '0',
  `status_permintaan` enum('PENDING','OPEN','CANCEL','PROGRESS','FINISH') NOT NULL DEFAULT 'PENDING',
  `keterangan` text,
  `keterangan_purchasing` text,
  `diperbarui` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` enum('TRUE','FALSE') NOT NULL DEFAULT 'FALSE',
  PRIMARY KEY (`id_dpp`),
  KEY `kd_permintaan_plastik` (`kd_permintaan_plastik`),
  KEY `kd_gd_hasil` (`kd_gd_hasil`),
  CONSTRAINT `transaksi_detail_permintaan_plastik_hd_ibfk_1` FOREIGN KEY (`kd_permintaan_plastik`) REFERENCES `transaksi_permintaan_plastik_hd` (`kd_permintaan_plastik`),
  CONSTRAINT `transaksi_detail_permintaan_plastik_hd_ibfk_2` FOREIGN KEY (`kd_gd_hasil`) REFERENCES `gudang_hasil` (`kd_gd_hasil`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi_detail_permintaan_plastik_hd`
--

LOCK TABLES `transaksi_detail_permintaan_plastik_hd` WRITE;
/*!40000 ALTER TABLE `transaksi_detail_permintaan_plastik_hd` DISABLE KEYS */;
INSERT INTO `transaksi_detail_permintaan_plastik_hd` VALUES (4,'PRHD181024001','HSLC1706120089',500.00,0,557.40,0,'FINISH',NULL,NULL,'2018-10-10 14:50:45','FALSE'),(5,'PRHD181024001','HSLC1706120087',500.00,0,0.00,0,'PENDING',NULL,NULL,'2018-10-09 15:40:10','TRUE'),(6,'PRHD181024002','HSLC1706120087',500.00,0,500.00,0,'FINISH',NULL,NULL,'2019-03-08 11:06:02','FALSE'),(7,'PRHD181024002','HSLC1706120089',500.00,0,562.70,0,'FINISH',NULL,NULL,'2018-10-31 15:39:52','FALSE'),(8,'PRHD181024003','HSLC1706120089',500.00,0,500.00,0,'FINISH',NULL,NULL,'2018-10-15 08:00:08','FALSE'),(9,'PRHD181024004','HSLC1706120086',1000.00,0,1000.00,0,'FINISH',NULL,NULL,'2019-03-08 11:07:39','FALSE'),(10,'PRHD181024005','HSLC1706120087',1000.00,0,1000.00,0,'FINISH',NULL,NULL,'2018-10-24 13:09:47','FALSE'),(11,'PRHD181024005','HSLC1706120085',500.00,0,0.00,0,'PROGRESS',NULL,NULL,'2018-10-19 16:06:02','FALSE'),(12,'PRHD181024006','HSLC1706120087',500.00,0,400.00,0,'PROGRESS',NULL,NULL,'2018-11-19 13:52:48','FALSE'),(13,'PRHD181124001','HSLC1706121439',750.00,0,111.50,0,'PROGRESS',NULL,NULL,'2019-01-28 09:30:36','FALSE'),(14,'PRHD181124001','HSLC1706120086',500.00,0,425.00,0,'PROGRESS',NULL,NULL,'2019-03-21 15:30:09','FALSE'),(15,'PRHD190124001','HSLC1706120085',500.00,0,500.00,0,'FINISH',NULL,NULL,'2019-03-18 15:12:20','FALSE'),(16,'PRHD190124001','HSLC1706120086',500.00,0,241.30,0,'PROGRESS',NULL,NULL,'2019-03-09 07:42:48','FALSE'),(17,'PRHD190324001','HSLC1706120087',500.00,0,500.00,0,'FINISH',NULL,NULL,'2019-04-10 08:10:57','FALSE'),(18,'PRHD190424001','HSLC1706120089',500.00,0,425.00,0,'PROGRESS',NULL,NULL,'2019-04-10 08:10:32','FALSE'),(19,'PRHD190524001','HSLC1706120087',1000.00,0,1000.00,0,'FINISH',NULL,NULL,'2019-05-28 09:55:45','FALSE'),(20,'PRHD190724001','HSLC1706120085',500.00,0,0.00,0,'PENDING',NULL,NULL,'2019-07-19 08:20:11','TRUE'),(21,'PRHD190724002','HSLC1706120085',500.00,0,500.00,0,'FINISH',NULL,NULL,'2019-07-26 14:52:45','FALSE'),(22,'PRHD190824001','HSLC1706120087',1000.00,0,775.00,0,'PROGRESS',NULL,NULL,'2019-09-23 13:04:50','FALSE');
/*!40000 ALTER TABLE `transaksi_detail_permintaan_plastik_hd` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-25 23:59:47
