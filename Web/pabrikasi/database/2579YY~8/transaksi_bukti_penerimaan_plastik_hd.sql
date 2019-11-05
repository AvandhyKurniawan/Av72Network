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
-- Table structure for table `transaksi_bukti_penerimaan_plastik_hd`
--

DROP TABLE IF EXISTS `transaksi_bukti_penerimaan_plastik_hd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `transaksi_bukti_penerimaan_plastik_hd` (
  `kd_bpp` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_dpp` int(11) NOT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `tgl_terima` date NOT NULL,
  `jumlah_berat_terima` decimal(15,2) NOT NULL DEFAULT '0.00',
  `jumlah_lembar_terima` decimal(15,0) NOT NULL DEFAULT '0',
  `sts_print` enum('TRUE','FALSE') NOT NULL DEFAULT 'FALSE',
  `diperbarui` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` enum('TRUE','FALSE') NOT NULL DEFAULT 'FALSE',
  PRIMARY KEY (`kd_bpp`),
  KEY `id_user` (`id_user`),
  KEY `id_dpp` (`id_dpp`),
  CONSTRAINT `transaksi_bukti_penerimaan_plastik_hd_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  CONSTRAINT `transaksi_bukti_penerimaan_plastik_hd_ibfk_2` FOREIGN KEY (`id_dpp`) REFERENCES `transaksi_detail_permintaan_plastik_hd` (`id_dpp`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi_bukti_penerimaan_plastik_hd`
--

LOCK TABLES `transaksi_bukti_penerimaan_plastik_hd` WRITE;
/*!40000 ALTER TABLE `transaksi_bukti_penerimaan_plastik_hd` DISABLE KEYS */;
INSERT INTO `transaksi_bukti_penerimaan_plastik_hd` VALUES (8,24,4,'cv aneka plasindo ','2018-10-10',300.00,0,'FALSE','2018-10-10 14:41:38','FALSE'),(9,24,4,'cv aneka plasindo mandiri ','2018-10-05',257.40,0,'FALSE','2018-10-10 14:50:45','FALSE'),(10,24,7,'cv aneka plasindo mandiri ','2018-10-05',57.40,0,'FALSE','2018-10-12 15:08:14','FALSE'),(11,24,8,'cv aneka plasindo mandiri ','2018-10-10',300.00,0,'FALSE','2018-10-15 07:59:08','FALSE'),(12,24,8,'cv aneka plasindo ','2018-10-05',200.00,0,'FALSE','2018-10-15 08:00:08','FALSE'),(13,24,6,'cv aneka plasindo ','2018-10-18',425.00,0,'FALSE','2018-10-19 15:22:57','TRUE'),(14,24,10,'cv aneka plasindo mandiri ','2018-10-18',425.00,0,'FALSE','2018-10-22 15:16:01','FALSE'),(15,24,10,'cv aneka plasindo ','2018-10-22',425.00,0,'FALSE','2018-10-22 15:28:52','FALSE'),(16,24,10,'cv aneka plasindo ','2018-10-24',150.00,0,'FALSE','2018-10-24 13:09:47','FALSE'),(17,24,6,'cv aneka plasindo ','2018-10-24',75.00,0,'FALSE','2018-10-24 13:10:41','FALSE'),(18,24,6,'cv aneka plasindo mandiri ','2018-10-29',400.00,0,'FALSE','2018-10-29 15:00:29','FALSE'),(19,24,7,'cv aneka plasindo ','2018-10-29',175.00,0,'FALSE','2018-10-29 15:01:42','FALSE'),(20,24,7,'cv aneka plasindo ','2018-10-30',200.00,0,'FALSE','2018-10-30 13:24:22','FALSE'),(21,24,7,'cv aneka plasindo ','2018-10-31',130.30,0,'FALSE','2018-10-31 15:39:52','FALSE'),(22,24,9,'cv aneka plasindo ','2018-11-03',125.00,0,'FALSE','2018-11-05 13:59:23','FALSE'),(23,24,9,'cv aneka plasindo ','2018-11-05',125.00,0,'FALSE','2018-11-05 14:35:03','FALSE'),(24,24,9,'cv aneka plasindo ','2018-11-07',175.00,0,'FALSE','2018-11-07 13:12:28','FALSE'),(25,24,9,'cv aneka plasindo ','2018-11-09',150.00,0,'FALSE','2018-11-12 08:18:22','FALSE'),(26,24,9,'cv aneka plasindo ','2018-11-12',175.00,0,'FALSE','2018-11-12 13:40:58','FALSE'),(27,24,12,'cv aneka plasindo ','2018-11-14',175.00,0,'FALSE','2018-11-14 15:46:53','FALSE'),(28,24,12,'cv aneka plasindo ','2018-11-19',225.00,0,'FALSE','2018-11-19 13:52:48','FALSE'),(29,24,14,'cv aneka plasindo','2019-01-26',25.00,0,'FALSE','2019-01-28 09:29:50','FALSE'),(30,24,13,'cv aneka plasindo ','2019-01-26',111.50,0,'FALSE','2019-01-28 09:30:36','FALSE'),(31,24,6,'cv aneka plasindo ','2019-02-06',25.00,0,'FALSE','2019-03-08 11:06:02','FALSE'),(32,24,9,'cv aneka plasindo ','2019-02-06',250.00,0,'FALSE','2019-03-08 11:07:39','FALSE'),(33,24,14,'cv aneka plasindo mandiri ','2019-01-27',125.00,0,'FALSE','2019-03-08 11:10:22','FALSE'),(34,24,14,'cv aneka plasindo mandiri','2019-02-28',150.00,0,'FALSE','2019-03-08 11:11:26','FALSE'),(35,24,16,'cv aneka plasindo mandiri ','2019-03-04',241.30,0,'FALSE','2019-03-09 07:42:48','FALSE'),(36,24,15,'cv aneka plasindo mandiri ','2019-03-04',150.00,0,'FALSE','2019-03-09 07:43:24','FALSE'),(37,24,15,'cv aneka plasindo mandiri ','2019-03-05',150.00,0,'FALSE','2019-03-09 07:44:07','FALSE'),(38,24,15,'cv. aneka plasindo ','2019-03-18',200.00,0,'FALSE','2019-03-18 15:12:20','FALSE'),(39,24,14,'cv aneka plasindo ','2019-02-27',125.00,0,'FALSE','2019-03-21 15:30:09','FALSE'),(40,24,17,'cv aneka plasindo','2019-04-05',250.00,0,'FALSE','2019-04-09 08:46:24','FALSE'),(41,24,17,'cv aneka plasindo mandiri','2019-04-08',150.00,0,'FALSE','2019-04-09 08:49:44','FALSE'),(42,24,18,'cv aneka plasindo mandiri','2019-04-08',50.00,0,'FALSE','2019-04-10 08:10:04','FALSE'),(43,24,18,'cv aneka plasindo','2019-04-09',375.00,0,'FALSE','2019-04-10 08:10:32','FALSE'),(44,24,17,'cv aneka plasindo ','2019-04-09',100.00,0,'FALSE','2019-04-10 08:10:57','FALSE'),(45,24,19,'cv aneka plasindo mandiri','2019-05-24',225.00,0,'FALSE','2019-05-24 15:16:05','FALSE'),(46,24,19,'cv aneka plasindo mandiri','2019-05-28',775.00,0,'FALSE','2019-05-28 09:55:45','FALSE'),(47,24,21,'cv aneka plasindo ','2019-07-17',200.00,0,'FALSE','2019-07-26 14:52:20','FALSE'),(48,24,21,'cv aneka plasindo mandiri ','2019-07-22',300.00,0,'FALSE','2019-07-26 14:52:45','FALSE'),(49,24,22,'cv aneka plasindo mandiri','2019-09-16',375.00,0,'FALSE','2019-09-17 08:08:22','FALSE'),(50,24,22,'cv aneka plasindo mandiri ','2019-09-20',275.00,0,'FALSE','2019-09-20 15:09:02','FALSE'),(51,24,22,'cv aneka plasindo mandiri ','2019-09-23',125.00,0,'FALSE','2019-09-23 13:04:50','FALSE');
/*!40000 ALTER TABLE `transaksi_bukti_penerimaan_plastik_hd` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-25 23:59:41
