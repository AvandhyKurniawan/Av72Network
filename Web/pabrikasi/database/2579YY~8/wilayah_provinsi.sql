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
-- Table structure for table `wilayah_provinsi`
--

DROP TABLE IF EXISTS `wilayah_provinsi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wilayah_provinsi` (
  `id_prov` char(2) NOT NULL,
  `nama` tinytext NOT NULL,
  PRIMARY KEY (`id_prov`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wilayah_provinsi`
--

LOCK TABLES `wilayah_provinsi` WRITE;
/*!40000 ALTER TABLE `wilayah_provinsi` DISABLE KEYS */;
INSERT INTO `wilayah_provinsi` VALUES ('11','Aceh'),('12','Sumatera Utara'),('13','Sumatera Barat'),('14','Riau'),('15','Jambi'),('16','Sumatera Selatan'),('17','Bengkulu'),('18','Lampung'),('19','Kepulauan Bangka Belitung'),('21','Kepulauan Riau'),('31','DKI Jakarta'),('32','Jawa Barat'),('33','Jawa Tengah'),('34','DI Yogyakarta'),('35','Jawa Timur'),('36','Banten'),('51','Bali'),('52','Nusa Tenggara Barat'),('53','Nusa Tenggara Timur'),('61','Kalimantan Barat'),('62','Kalimantan Tengah'),('63','Kalimantan Selatan'),('64','Kalimantan Timur'),('65','Kalimantan Utara'),('71','Sulawesi Utara'),('72','Sulawesi Tengah'),('73','Sulawesi Selatan'),('74','Sulawesi Tenggara'),('75','Gorontalo'),('76','Sulawesi Barat'),('81','Maluku'),('82','Maluku Utara'),('91','Papua Barat'),('92','Papua');
/*!40000 ALTER TABLE `wilayah_provinsi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-26  0:00:13
