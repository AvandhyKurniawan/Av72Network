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
-- Table structure for table `data_sales`
--

DROP TABLE IF EXISTS `data_sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `data_sales` (
  `id_sales` int(11) NOT NULL AUTO_INCREMENT,
  `kode_sales` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `gender` enum('Pria','Wanita') NOT NULL DEFAULT 'Pria',
  `no_telp` varchar(15) NOT NULL,
  `alamat` text,
  `diperbarui` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` enum('TRUE','FALSE') NOT NULL DEFAULT 'FALSE',
  PRIMARY KEY (`id_sales`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_sales`
--

LOCK TABLES `data_sales` WRITE;
/*!40000 ALTER TABLE `data_sales` DISABLE KEYS */;
INSERT INTO `data_sales` VALUES (1,'DYAN','Yanto','Pria','123','','2018-11-09 06:34:58','FALSE'),(2,'DSAN','Santoso','Pria','000','','2018-11-09 06:34:58','FALSE'),(3,'DSUL','Sulisto','Pria','000','','2018-11-09 06:34:58','FALSE'),(4,'DDk','Denny','Pria','000','','2018-11-09 06:34:58','TRUE'),(6,'DDK','Denny','Pria','000','','2018-11-09 06:34:58','FALSE'),(7,'aas','aaa','Wanita','111','','2018-11-09 06:34:58','TRUE'),(8,'aas','aas','Wanita','121212','','2018-11-09 06:34:58','TRUE'),(9,'aa','aaa','Wanita','111','','2018-11-09 06:34:58','TRUE');
/*!40000 ALTER TABLE `data_sales` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-25 23:59:13
