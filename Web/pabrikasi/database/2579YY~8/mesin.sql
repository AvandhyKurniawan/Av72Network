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
-- Table structure for table `mesin`
--

DROP TABLE IF EXISTS `mesin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `mesin` (
  `kd_mesin` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_mesin` varchar(30) NOT NULL,
  `ukuran_min` varchar(3) DEFAULT NULL,
  `ukuran_maks` varchar(3) DEFAULT NULL,
  `tebal` varchar(15) DEFAULT NULL,
  `sts_mesin` varchar(3) NOT NULL,
  PRIMARY KEY (`kd_mesin`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `mesin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mesin`
--

LOCK TABLES `mesin` WRITE;
/*!40000 ALTER TABLE `mesin` DISABLE KEYS */;
INSERT INTO `mesin` VALUES ('MSN170612001',1,'Mesin 1','10','40','04.5 - 010','KP'),('MSN170612002',1,'Mesin 2','12','13','03 - 010','KP'),('MSN170612003',1,'Mesin 3','12','13','03 - 06','KP'),('MSN170612004',1,'Mesin 4','42','46','4.5 - 010','KP'),('MSN170612005',1,'Mesin 5','38','45','5.5 - 010','KP'),('MSN170612006',1,'Mesin 6','5','6','025 - 06','KP'),('MSN170612007',1,'Mesin 7','15','15','035 - 05','KP'),('MSN170612008',1,'Mesin 8','16','17','04 - 06 ','KP'),('MSN170612009',1,'Mesin 9','15','20','4.5 - 010','KP'),('MSN170612010',1,'Mesin 10','10','10','03.5 - 010','KP'),('MSN170612011',1,'Mesin 11','','','','KP'),('MSN170612012',1,'Mesin 12','8','8','025.3 - 04','KP'),('MSN170612013',1,'Mesin 13','9','10','3.5 - 010','KP'),('MSN170612014',1,'Mesin 14','17','20','04 - 010','KP'),('MSN170612015',1,'Mesin 15','12','13','3.5 - 08','KP'),('MSN170612016',1,'Mesin 16','21','25','04 - 010','KP'),('MSN170612017',1,'Mesin 17','5','6','025 - 05','KP'),('MSN170612018',1,'Mesin 18','5','6','03 - 010','KP'),('MSN170612019',1,'Mesin 19','30','37 ','06 - 010','KP'),('MSN170612020',1,'Mesin 20','12','13','035 - 05','KP'),('MSN170612021',1,'Mesin 21','50','55','05 - 010','KP'),('MSN170612022',1,'Mesin 22','10','','03 - 05','KP'),('MSN170612023',1,'Mesin 23','40','46','05 - 010','KP'),('MSN170612024',1,'Mesin 24','10','10','03 - 08','KP'),('MSN170612025',1,'Mesin 25','20','25','5.5 - 08','KP'),('MSN170612026',1,'Mesin 26','9','10','02.5 - 06','KP'),('MSN170612027',1,'Mesin 27','25','30','4.5 - 010','KP'),('MSN170612028',1,'Mesin 28','13','13','03 - 06','KP'),('MSN170612029',1,'Mesin 29','5','6','25 - 04','KP'),('MSN170612030',1,'Mesin 30','15','','03 - 08','KP'),('MSN170612031',1,'Mesin 31','13','15','03 - 010','KP'),('MSN170612032',1,'Mesin 1','8','','2.5 - 0.5','ZP'),('MSN170612033',1,'Mesin 2','5','6','0.25 - 05','ZP'),('MSN170612034',1,'Mesin 3','8','','2.5 - 05','ZP'),('MSN170612035',1,'Mesin 4','8','10','0.25 - 05','ZP'),('MSN170612036',1,'Mesin 5','8','','2.5 - 05','ZP'),('MSN170612037',1,'Mesin 6','8','','2.5 - 05','ZP'),('MSN170612038',1,'Mesin 7','15','','03 - 06','ZP'),('MSN170612039',1,'Mesin 8','10','','03 - 06','ZP'),('MSN170612040',1,'Mesin 9','8','','2.5 - 05','ZP'),('MSN170612041',1,'Mesin 10','10','','2.5 - 06','ZP'),('MSN170612042',1,'Mesin 32','','','','KP'),('MSN170612043',1,'Mesin 33','','','','KP'),('MSN170612044',1,'Mesin 34','','','','KP'),('MSN170612045',1,'Mesin 35','','','','KP'),('MSN170612046',1,'Mesin 36','','','','KP'),('MSN170612047',1,'Mesin 37','','','','KP'),('MSN170612048',1,'Mesin 38','','','','KP'),('MSN170612049',1,'Mesin 39','','','','KP'),('MSN170612050',1,'Mesin 40','','','','KP');
/*!40000 ALTER TABLE `mesin` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-25 23:59:25
