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
-- Table structure for table `transaksi_permintaan_plastik_hd`
--

DROP TABLE IF EXISTS `transaksi_permintaan_plastik_hd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `transaksi_permintaan_plastik_hd` (
  `kd_permintaan_plastik` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `status_permintaan` enum('PENDING','OPEN','CANCEL','PROGRESS','FINISH') NOT NULL DEFAULT 'PENDING',
  `status_approve` enum('TRUE','FALSE') NOT NULL DEFAULT 'FALSE',
  `diperbarui` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` enum('TRUE','FALSE') DEFAULT 'FALSE',
  PRIMARY KEY (`kd_permintaan_plastik`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `transaksi_permintaan_plastik_hd_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi_permintaan_plastik_hd`
--

LOCK TABLES `transaksi_permintaan_plastik_hd` WRITE;
/*!40000 ALTER TABLE `transaksi_permintaan_plastik_hd` DISABLE KEYS */;
INSERT INTO `transaksi_permintaan_plastik_hd` VALUES ('PRHD181024001',24,'2018-10-01','gudang hasil','FINISH','TRUE','2018-10-10 14:50:45','FALSE'),('PRHD181024002',24,'2018-10-03','gudang hasil','FINISH','TRUE','2019-03-08 11:06:02','FALSE'),('PRHD181024003',24,'2018-10-01','gudang hasil','FINISH','TRUE','2018-10-15 08:00:08','FALSE'),('PRHD181024004',24,'2018-10-19','gudang hasil','FINISH','TRUE','2019-03-08 11:07:39','FALSE'),('PRHD181024005',24,'2018-07-27','gudang hasil','PROGRESS','TRUE','2018-10-19 16:06:02','FALSE'),('PRHD181024006',24,'2018-10-19','gudang hasil','PROGRESS','TRUE','2018-10-23 09:03:38','FALSE'),('PRHD181124001',24,'2018-11-19','gudang hasil','PROGRESS','TRUE','2018-11-23 14:02:28','FALSE'),('PRHD190124001',24,'2019-01-15','gudang hasil','PROGRESS','TRUE','2019-01-28 10:05:55','FALSE'),('PRHD190324001',24,'2019-03-22','gudang hasil','FINISH','TRUE','2019-04-10 08:10:57','FALSE'),('PRHD190424001',24,'2019-03-22','gudang hasil','PROGRESS','TRUE','2019-04-09 10:56:45','FALSE'),('PRHD190524001',24,'2019-05-08','gudang hasil','FINISH','TRUE','2019-05-28 09:55:45','FALSE'),('PRHD190724001',24,'2019-06-26','gudang hasil','PENDING','FALSE','2019-07-19 08:20:11','TRUE'),('PRHD190724002',24,'2019-06-24','gudang hasil','FINISH','TRUE','2019-07-26 14:52:45','FALSE'),('PRHD190824001',24,'2019-08-23','gudang hasil','PROGRESS','TRUE','2019-09-02 10:36:08','FALSE');
/*!40000 ALTER TABLE `transaksi_permintaan_plastik_hd` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-26  0:00:06
