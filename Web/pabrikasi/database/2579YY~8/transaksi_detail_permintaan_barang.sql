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
-- Table structure for table `transaksi_detail_permintaan_barang`
--

DROP TABLE IF EXISTS `transaksi_detail_permintaan_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `transaksi_detail_permintaan_barang` (
  `id_dpb` int(11) NOT NULL AUTO_INCREMENT,
  `kd_permintaan_barang` varchar(20) NOT NULL,
  `kd_gd_bahan` varchar(20) NOT NULL,
  `jumlah_permintaan` decimal(15,2) NOT NULL DEFAULT '0.00',
  `jumlah_terima` decimal(15,2) DEFAULT '0.00',
  `status_permintaan` enum('PENDING','OPEN','CANCEL','PROGRESS','FINISH') NOT NULL DEFAULT 'PENDING',
  `keterangan` text,
  `keterangan_purchasing` text,
  `diperbarui` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` enum('TRUE','FALSE') NOT NULL DEFAULT 'FALSE',
  PRIMARY KEY (`id_dpb`),
  KEY `kd_permintaan_barang` (`kd_permintaan_barang`),
  KEY `kd_gd_bahan` (`kd_gd_bahan`),
  CONSTRAINT `transaksi_detail_permintaan_barang_ibfk_1` FOREIGN KEY (`kd_permintaan_barang`) REFERENCES `transaksi_permintaan_barang` (`kd_permintaan_barang`),
  CONSTRAINT `transaksi_detail_permintaan_barang_ibfk_2` FOREIGN KEY (`kd_gd_bahan`) REFERENCES `gudang_bahan` (`kd_gd_bahan`)
) ENGINE=InnoDB AUTO_INCREMENT=366 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi_detail_permintaan_barang`
--

LOCK TABLES `transaksi_detail_permintaan_barang` WRITE;
/*!40000 ALTER TABLE `transaksi_detail_permintaan_barang` DISABLE KEYS */;
INSERT INTO `transaksi_detail_permintaan_barang` VALUES (25,'PR180623001','BHN170612018',25.00,0.00,'PENDING','exx',NULL,'2018-06-26 07:26:55','TRUE'),(26,'PR180623002','BHN170612018',25.00,0.00,'PENDING','exx',NULL,'2018-06-26 07:27:47','TRUE'),(27,'PR180623003','BHN170612018',25.00,0.00,'PENDING','',NULL,'2018-06-26 07:34:30','TRUE'),(28,'PR180623004','BHN170612018',25.00,0.00,'PENDING','',NULL,'2018-06-26 07:54:19','TRUE'),(29,'PR180623005','BHN170612018',25.00,0.00,'PENDING','',NULL,'2018-06-26 07:55:38','TRUE'),(30,'PR180623006','BHN170612018',25.00,0.00,'PENDING','',NULL,'2018-06-26 07:56:33','TRUE'),(31,'PR180623007','BHN170612018',25.00,0.00,'PENDING','exx',NULL,'2018-06-26 07:57:46','TRUE'),(32,'PR180623008','BHN170612018',25.00,0.00,'PENDING','',NULL,'2018-06-26 08:01:10','TRUE'),(33,'PR180623009','BHN170612018',25.00,0.00,'PENDING','exx',NULL,'2018-06-26 08:13:57','TRUE'),(34,'PR180623010','BHN170612038',170.00,0.00,'PENDING','cet',NULL,'2018-06-26 08:27:30','TRUE'),(35,'PR180623010','BHN170612039',170.00,0.00,'PENDING','cet',NULL,'2018-06-26 08:27:35','TRUE'),(36,'PR180623011','BHN170612018',25.00,0.00,'PENDING','',NULL,'2018-06-26 08:47:46','TRUE'),(37,'PR180623012','BHN170612018',25.00,0.00,'PENDING','exx',NULL,'2018-06-26 09:28:53','TRUE'),(38,'PR180623013','BHN170612018',25.00,0.00,'PENDING','exx',NULL,'2018-06-26 09:29:50','TRUE'),(39,'PR180623014','BHN170612018',25.00,0.00,'PENDING','exx',NULL,'2018-06-26 09:45:17','TRUE'),(40,'PR180623014','BHN170612019',25.00,0.00,'PENDING','exx',NULL,'2018-06-26 09:45:22','TRUE'),(41,'PR180623015','BHN170612018',25.00,0.00,'PENDING','exx',NULL,'2018-06-26 09:56:45','TRUE'),(42,'PR180623015','BHN170612019',25.00,0.00,'PENDING','',NULL,'2018-06-26 09:56:51','TRUE'),(43,'PR180623016','BHN170612037',170.00,0.00,'PENDING','cet',NULL,'2018-06-26 09:59:32','TRUE'),(44,'PR180623017','BHN170612038',28900.00,0.00,'PENDING','cet',NULL,'2018-06-26 10:00:45','TRUE'),(45,'PR180641018','BHN170612091',30000.00,30000.00,'FINISH','',NULL,'2018-07-09 13:13:35','FALSE'),(46,'PR180623019','BHN170612018',25.00,0.00,'PENDING','exx',NULL,'2018-06-26 10:24:00','TRUE'),(47,'PR180623019','BHN170612019',50.00,0.00,'PENDING','',NULL,'2018-06-26 10:24:08','TRUE'),(48,'PR180623020','BHN170612018',25.00,0.00,'PENDING','exx',NULL,'2018-06-26 13:06:30','TRUE'),(49,'PR180623021','BHN170612038',28900.00,0.00,'PENDING','cet',NULL,'2018-06-26 13:09:07','TRUE'),(50,'PR180623022','BHN170612028',250.00,250.00,'FINISH','',NULL,'2018-07-20 15:36:31','FALSE'),(51,'PR180623022','BHN170612018',50.00,50.00,'FINISH','',NULL,'2018-07-09 07:10:09','FALSE'),(52,'PR180623022','BHN170612025',25.00,25.00,'FINISH','',NULL,'2018-07-10 14:51:44','FALSE'),(53,'PR180623022','BHN170612021',50.00,50.00,'FINISH','',NULL,'2018-07-18 10:09:13','FALSE'),(54,'PR180724001','BHN170612076',405.00,405.00,'FINISH','permintaan ',NULL,'2018-07-07 07:55:40','FALSE'),(55,'PR180723002','BHN170612024',50.00,50.00,'FINISH','',NULL,'2018-07-09 07:12:54','FALSE'),(56,'PR180741003','BHN170612108',30000.00,30000.00,'FINISH','',NULL,'2018-07-26 07:13:46','FALSE'),(57,'PR180741004','BHN170612108',30000.00,30000.00,'FINISH','',NULL,'2018-07-05 15:48:47','FALSE'),(58,'PR180723005','BHN170612020',150.00,150.00,'FINISH','',NULL,'2018-07-18 10:06:36','FALSE'),(59,'PR180723005','BHN170612023',100.00,100.00,'FINISH','',NULL,'2018-07-11 10:09:55','FALSE'),(60,'PR180741006','BHN170612091',30000.00,30000.00,'FINISH','',NULL,'2018-07-09 13:15:12','FALSE'),(61,'PR180723007','BHN170612038',850.00,0.00,'PENDING','',NULL,'2018-07-11 15:01:31','TRUE'),(62,'PR180723008','BHN170612038',850.00,850.00,'FINISH','',NULL,'2018-07-17 10:18:52','FALSE'),(63,'PR180723008','BHN170612042',480.00,480.00,'FINISH','',NULL,'2018-07-17 10:20:57','FALSE'),(64,'PR180723008','BHN170612040',160.00,160.00,'FINISH','',NULL,'2018-07-17 10:22:07','FALSE'),(65,'PR180741009','BHN170612108',20000.00,20000.00,'FINISH','',NULL,'2018-07-16 13:12:25','FALSE'),(66,'PR180723010','BHN170612028',300.00,300.00,'FINISH','',NULL,'2018-07-25 09:27:04','FALSE'),(67,'PR180723010','BHN170612019',300.00,300.00,'FINISH','',NULL,'2018-08-06 13:26:51','FALSE'),(68,'PR180723010','BHN170612022',50.00,50.00,'FINISH','',NULL,'2018-07-26 14:17:33','FALSE'),(69,'PR180723010','BHN170612024',50.00,50.00,'FINISH','',NULL,'2018-07-24 10:04:45','FALSE'),(70,'PR180723011','BHN170612040',160.00,160.00,'FINISH','',NULL,'2018-07-23 11:16:45','FALSE'),(71,'PR180723011','BHN170612039',170.00,170.00,'FINISH','',NULL,'2018-07-23 11:15:18','FALSE'),(72,'PR180741012','BHN170612108',17500.00,17500.00,'FINISH','',NULL,'2018-07-25 07:09:49','FALSE'),(73,'PR180724013','BHN170612076',375.00,375.00,'FINISH','permintaan ',NULL,'2018-07-25 15:37:58','FALSE'),(74,'PR180724013','BHN170612052',75.00,75.00,'FINISH','permintaa',NULL,'2018-08-10 15:35:42','TRUE'),(75,'PR180724013','BHN170612061',195.00,195.00,'FINISH','permintaan ',NULL,'2018-08-10 15:35:39','FALSE'),(76,'PR180741014','BHN170612091',10000.00,10000.00,'FINISH','',NULL,'2018-07-23 15:50:17','FALSE'),(77,'PR180741015','BHN170612091',20000.00,20000.00,'FINISH','',NULL,'2018-07-24 10:36:09','FALSE'),(78,'PR180723016','BHN170612020',150.00,150.00,'FINISH','',NULL,'2018-08-07 10:10:07','FALSE'),(79,'PR180723017','BHN170612038',1020.00,1020.00,'FINISH','',NULL,'2018-08-01 09:40:06','FALSE'),(80,'PR180723017','BHN170612042',320.00,320.00,'FINISH','',NULL,'2018-08-01 09:42:19','FALSE'),(81,'PR180741018','BHN170612091',60000.00,60000.00,'FINISH','',NULL,'2018-08-06 09:59:12','FALSE'),(82,'PR180723019','BHN170612081',675.00,675.00,'FINISH','',NULL,'2018-08-08 07:30:16','FALSE'),(83,'PR180823001','BHN170612023',100.00,100.00,'FINISH','',NULL,'2018-08-09 15:38:11','FALSE'),(84,'PR180841002','BHN170612091',60000.00,60000.00,'FINISH','',NULL,'2018-08-21 15:23:35','FALSE'),(85,'PR180824003','BHN170612076',100.00,0.00,'PENDING','permintaan ',NULL,'2018-08-09 14:50:20','TRUE'),(86,'PR180824004','BHN170612076',450.00,450.00,'FINISH','permintaan ',NULL,'2018-08-14 15:50:02','FALSE'),(87,'PR180824005','BHN170612076',90.00,0.00,'PENDING','permintaan',NULL,'2018-08-21 08:52:38','TRUE'),(88,'PR180824005','BHN170612082',60.00,60.00,'FINISH','permintaan',NULL,'2018-08-24 09:14:27','FALSE'),(89,'PR180824005','BHN170612097',60.00,60.00,'FINISH','permintaan',NULL,'2018-09-06 09:42:29','FALSE'),(90,'PR180823006','BHN170612028',300.00,300.00,'FINISH','',NULL,'2018-08-29 13:22:28','FALSE'),(91,'PR180823007','BHN170612024',50.00,50.00,'FINISH','',NULL,'2018-08-23 10:47:27','FALSE'),(92,'PR180824008','BHN170612059',90.00,90.00,'FINISH','permintaan',NULL,'2018-08-24 09:13:53','FALSE'),(93,'PR180841009','BHN170612091',90000.00,90000.00,'FINISH','',NULL,'2018-09-13 10:06:15','FALSE'),(94,'PR180841010','BHN170612108',30000.00,30000.00,'FINISH','',NULL,'2018-08-24 15:29:00','FALSE'),(95,'PR180823011','BHN170612038',1020.00,1020.00,'FINISH','',NULL,'2018-09-07 13:29:47','FALSE'),(96,'PR180823011','BHN170612042',320.00,320.00,'FINISH','',NULL,'2018-09-07 13:32:54','FALSE'),(97,'PR180823011','BHN170612040',320.00,320.00,'FINISH','',NULL,'2018-09-07 13:34:21','FALSE'),(98,'PR180823012','BHN170612037',340.00,340.00,'FINISH','',NULL,'2018-08-29 14:59:43','FALSE'),(99,'PR180841013','BHN170612091',60000.00,60000.00,'FINISH','',NULL,'2018-09-10 07:11:58','FALSE'),(100,'PR180841014','BHN170612005',5500.00,5500.00,'FINISH','',NULL,'2018-08-29 15:22:05','FALSE'),(101,'PR180823015','BHN170612019',300.00,300.00,'FINISH','',NULL,'2018-09-17 09:48:43','FALSE'),(102,'PR180823015','BHN170612020',150.00,150.00,'FINISH','',NULL,'2018-09-13 10:08:46','FALSE'),(103,'PR180924001','BHN170612077',60.00,60.00,'FINISH','permintaan ',NULL,'2018-09-13 08:45:57','FALSE'),(104,'PR180924001','BHN170612076',405.00,405.00,'FINISH','permintaan ',NULL,'2018-10-03 14:39:23','FALSE'),(105,'PR180941002','BHN170612091',60000.00,55000.00,'FINISH','petlin',NULL,'2018-10-02 14:40:14','FALSE'),(106,'PR180941003','BHN170612091',60000.00,60000.00,'FINISH','bukit',NULL,'2018-10-08 07:44:51','FALSE'),(107,'PR180923004','BHN170612038',1020.00,1020.00,'FINISH','',NULL,'2018-09-24 11:12:52','FALSE'),(108,'PR180923004','BHN170612037',340.00,340.00,'FINISH','',NULL,'2018-09-26 13:32:57','FALSE'),(109,'PR180923004','BHN170612042',320.00,320.00,'FINISH','',NULL,'2018-09-24 11:16:09','FALSE'),(110,'PR180923005','BHN170612081',30.00,0.00,'PENDING','',NULL,'2018-09-24 07:15:23','TRUE'),(111,'PR180941006','BHN170612001',2000.00,2000.00,'FINISH','',NULL,'2018-09-24 11:20:59','FALSE'),(112,'PR180923007','BHN170612081',450.00,0.00,'CANCEL','','salah qty','2018-11-05 11:34:13','TRUE'),(113,'PR180941008','BHN170612108',35000.00,35000.00,'FINISH','Akino indonesia',NULL,'2018-09-25 09:30:11','FALSE'),(114,'PR181023001','BHN170612020',200.00,200.00,'FINISH','',NULL,'2018-10-10 10:25:06','FALSE'),(115,'PR181024002','BHN170612076',450.00,450.00,'FINISH','permintaan ',NULL,'2018-10-16 13:17:31','FALSE'),(116,'PR181023003','BHN170612039',340.00,340.00,'FINISH','',NULL,'2018-10-05 11:19:48','FALSE'),(117,'PR181031004','BHN170612081',450.00,0.00,'CANCEL','inkot','qty permintaan salah','2018-11-05 11:33:57','FALSE'),(118,'PR181041005','BHN170612091',5000.00,5000.00,'FINISH','bukit',NULL,'2018-10-08 07:45:22','FALSE'),(119,'PR181041006','BHN170612091',10000.00,10000.00,'FINISH','bukit ( masidi, sukar bj )',NULL,'2018-10-12 13:34:21','FALSE'),(120,'PR181023007','BHN170612081',30.00,30.00,'FINISH','',NULL,'2018-10-08 13:42:02','FALSE'),(121,'PR181023008','BHN170612018',50.00,50.00,'FINISH','',NULL,'2018-10-12 13:51:07','FALSE'),(122,'PR181023009','BHN170612042',320.00,320.00,'FINISH','',NULL,'2018-10-12 13:10:43','FALSE'),(123,'PR181023010','BHN170612040',320.00,320.00,'FINISH','',NULL,'2018-10-12 13:14:49','FALSE'),(124,'PR181041011','BHN170612091',30000.00,30000.00,'FINISH','ppn bukit 304',NULL,'2018-10-12 13:31:55','FALSE'),(125,'PR181041012','BHN170612091',20000.00,20000.00,'FINISH','eko 309 ,indra308,suheri307,ari310',NULL,'2018-10-18 11:31:47','FALSE'),(126,'PR181041013','BHN170612091',30000.00,30000.00,'FINISH','ppn bukit',NULL,'2018-10-23 13:47:14','FALSE'),(127,'PR181023014','BHN170612028',300.00,300.00,'FINISH','',NULL,'2018-10-12 09:15:46','FALSE'),(128,'PR181023015','BHN170612042',320.00,320.00,'FINISH','',NULL,'2018-10-15 09:50:40','FALSE'),(129,'PR181023016','BHN170612019',300.00,300.00,'FINISH','',NULL,'2018-10-31 11:28:51','FALSE'),(130,'PR181024017','BHN170612074',60.00,60.00,'FINISH','permintaan ',NULL,'2018-10-16 13:16:42','FALSE'),(131,'PR181041018','BHN170612108',17500.00,17500.00,'FINISH','akino',NULL,'2018-10-15 07:05:45','FALSE'),(132,'PR181023019','BHN170612027',50.00,50.00,'FINISH','',NULL,'2018-10-23 14:37:54','FALSE'),(133,'PR181023020','BHN170612038',1020.00,1020.00,'FINISH','',NULL,'2018-10-22 13:43:16','FALSE'),(134,'PR181023021','BHN170612042',320.00,320.00,'FINISH','',NULL,'2018-10-19 15:12:44','FALSE'),(135,'PR181024022','BHN170612076',225.00,225.00,'FINISH','permintaan',NULL,'2018-10-23 09:11:56','FALSE'),(136,'PR181041023','BHN170612091',30000.00,30000.00,'FINISH','panca 335',NULL,'2018-10-29 13:19:42','FALSE'),(137,'PR181041024','BHN170612091',22500.00,22500.00,'FINISH','bukit ( juwanti 337,irwan 336, mursinah 338)',NULL,'2018-10-31 09:30:14','FALSE'),(138,'PR181041025','BHN170612091',22500.00,22500.00,'FINISH','bukit ( sukar 339, masidi 340 , suheri 341 )',NULL,'2018-11-02 11:08:06','FALSE'),(139,'PR181041026','BHN170612108',35000.00,35000.00,'FINISH','akino 354',NULL,'2018-10-31 07:12:40','FALSE'),(140,'PR181023027','BHN170612020',200.00,200.00,'FINISH','',NULL,'2018-11-01 13:54:13','FALSE'),(141,'PR181024028','BHN170612076',45.00,45.00,'FINISH','permintaan',NULL,'2018-10-31 13:30:45','FALSE'),(142,'PR181023029','BHN170612081',30.00,0.00,'PENDING','',NULL,'2018-11-05 11:30:13','TRUE'),(143,'PR181123001','BHN170612081',30.00,30.00,'FINISH','',NULL,'2018-11-08 07:45:17','FALSE'),(144,'PR181123002','BHN170612038',1020.00,1020.00,'FINISH','',NULL,'2018-11-16 09:56:20','FALSE'),(145,'PR181123003','BHN170612023',100.00,100.00,'FINISH','',NULL,'2018-11-08 10:25:17','FALSE'),(146,'PR181123004','BHN170612021',50.00,50.00,'FINISH','',NULL,'2018-11-12 13:08:02','FALSE'),(147,'PR181123004','BHN170612022',50.00,50.00,'FINISH','',NULL,'2018-11-08 10:24:52','FALSE'),(148,'PR181124005','BHN170612076',450.00,450.00,'FINISH','permintaan ',NULL,'2018-11-12 13:40:12','FALSE'),(149,'PR181141006','BHN170612091',30000.00,30000.00,'FINISH','panca 361',NULL,'2018-11-13 15:47:27','FALSE'),(150,'PR181141007','BHN170612108',20000.00,20000.00,'FINISH','Akino/aeni 363',NULL,'2018-11-13 15:49:26','FALSE'),(151,'PR181123008','BHN170612019',300.00,300.00,'FINISH','',NULL,'2018-12-05 10:33:11','FALSE'),(152,'PR181123008','BHN170612028',300.00,300.00,'FINISH','',NULL,'2018-11-19 15:07:59','FALSE'),(153,'PR181141009','BHN170612091',30000.00,30000.00,'FINISH','bukit ppn',NULL,'2018-11-19 15:04:27','FALSE'),(154,'PR181141010','BHN170612091',20000.00,20000.00,'FINISH','bukit ( irwan 386, indra 387, ari 388 )',NULL,'2018-11-23 14:09:27','FALSE'),(155,'PR181141011','BHN170612091',20000.00,20000.00,'FINISH','bukit 389 ( ppn )',NULL,'2018-11-27 11:24:21','FALSE'),(156,'PR181141012','BHN170612091',20000.00,20000.00,'FINISH','bikit ( eko 390 , dimas 391 ,massidi 392 )',NULL,'2018-11-29 13:04:11','FALSE'),(157,'PR181123013','BHN170612020',200.00,200.00,'FINISH','',NULL,'2018-11-29 13:46:42','FALSE'),(158,'PR181123014','BHN170612038',1020.00,1020.00,'FINISH','',NULL,'2018-12-03 13:59:31','FALSE'),(159,'PR181123014','BHN170612040',320.00,320.00,'FINISH','',NULL,'2018-12-03 15:02:41','FALSE'),(160,'PR181123014','BHN170612042',320.00,320.00,'FINISH','',NULL,'2018-12-03 13:59:55','FALSE'),(161,'PR181141015','BHN170612108',30000.00,30000.00,'FINISH','Akino ( Aeni 398 )',NULL,'2018-12-05 07:11:36','FALSE'),(162,'PR181141016','BHN170612091',30000.00,30000.00,'FINISH','Bukit mega (indra 399 , rahmat 400 , sukar bj 401 ,mursanih 402 )',NULL,'2018-12-11 09:09:51','FALSE'),(163,'PR181141017','BHN170612091',30000.00,30000.00,'FINISH','panca budi 403',NULL,'2018-12-12 09:16:05','FALSE'),(164,'PR181224001','BHN170612061',150.00,150.00,'FINISH','',NULL,'2018-12-06 12:53:58','FALSE'),(165,'PR181224001','BHN170612092',60.00,60.00,'FINISH','',NULL,'2018-12-06 12:53:36','FALSE'),(166,'PR181224001','BHN170612076',300.00,300.00,'FINISH','',NULL,'2018-12-06 07:35:56','FALSE'),(167,'PR181224001','BHN170612067',60.00,60.00,'FINISH','',NULL,'2018-12-06 12:53:01','FALSE'),(168,'PR181223002','BHN170612022',100.00,100.00,'FINISH','',NULL,'2018-12-18 09:55:15','FALSE'),(169,'PR181223003','BHN170612028',300.00,300.00,'FINISH','',NULL,'2018-12-20 14:51:17','FALSE'),(170,'PR181241004','BHN170612005',3000.00,3000.00,'FINISH','indoplas',NULL,'2018-12-14 15:15:48','FALSE'),(171,'PR181241005','BHN170612091',50000.00,50000.00,'FINISH','panca budi ( 426 )',NULL,'2019-01-04 13:05:05','FALSE'),(172,'PR181241006','BHN170612091',40000.00,40000.00,'FINISH','Bukit mega ( 425 eko , 424 dimas ,423 juwanti ,422 indra ,421 irwan , 420 suheri ) ',NULL,'2018-12-28 15:10:09','FALSE'),(173,'PR181223007','BHN170612038',1020.00,1020.00,'FINISH','',NULL,'2018-12-28 09:24:44','FALSE'),(174,'PR181223007','BHN170612042',160.00,160.00,'FINISH','',NULL,'2019-01-03 09:21:41','FALSE'),(175,'PR181223007','BHN170612081',30.00,30.00,'FINISH','',NULL,'2019-01-04 08:36:30','FALSE'),(176,'PR181241008','BHN170612108',15000.00,15000.00,'FINISH','Akino ( AENI 433  )',NULL,'2018-12-27 07:18:03','FALSE'),(177,'PR181241009','BHN170612108',60000.00,60000.00,'FINISH','bukit mega ( masidi 435 ,mursanih 436 ,irwan 437,indra 438 ,rahmat 439 ,m wican 440 ,suheri 441 ,sukar bj 442 )',NULL,'2019-01-16 07:11:50','FALSE'),(178,'PR181223010','BHN170612019',300.00,300.00,'FINISH','',NULL,'2019-01-17 09:47:28','FALSE'),(179,'PR181223010','BHN170612025',25.00,25.00,'FINISH','',NULL,'2019-01-07 11:29:32','FALSE'),(180,'PR181241011','BHN170612091',30000.00,30000.00,'FINISH','bukit ppn 477',NULL,'2019-01-11 15:46:07','FALSE'),(181,'PR190123001','BHN170612020',200.00,200.00,'FINISH','',NULL,'2019-01-09 09:54:25','FALSE'),(182,'PR190123001','BHN170612024',50.00,50.00,'FINISH','',NULL,'2019-01-07 13:31:41','FALSE'),(183,'PR190123002','BHN170612023',50.00,50.00,'FINISH','',NULL,'2019-01-09 09:56:21','FALSE'),(184,'PR190124003','BHN170612076',300.00,300.00,'FINISH','',NULL,'2019-01-18 14:56:02','FALSE'),(185,'PR190124003','BHN170612059',60.00,60.00,'FINISH','',NULL,'2019-01-18 14:56:27','FALSE'),(186,'PR190124003','BHN170612075',60.00,60.00,'FINISH','',NULL,'2019-01-18 14:52:50','FALSE'),(187,'PR190124003','BHN170612082',60.00,60.00,'FINISH','',NULL,'2019-01-18 14:51:17','FALSE'),(188,'PR190141004','BHN170612091',30000.00,30000.00,'FINISH','bukit mega ( 013 dimas , 014 massidi , 015 mursanih , 016 wican )',NULL,'2019-01-18 14:48:24','FALSE'),(189,'PR190124005','BHN170612095',15.00,15.00,'FINISH','',NULL,'2019-01-22 14:41:03','FALSE'),(190,'PR190124005','BHN170612096',15.00,15.00,'FINISH','',NULL,'2019-01-22 14:41:25','FALSE'),(191,'PR190123006','BHN170612038',1020.00,1020.00,'FINISH','',NULL,'2019-01-24 13:32:51','FALSE'),(192,'PR190123006','BHN170612042',320.00,320.00,'FINISH','',NULL,'2019-01-24 14:44:30','FALSE'),(193,'PR190123006','BHN170612039',170.00,170.00,'FINISH','',NULL,'2019-01-24 13:33:34','FALSE'),(194,'PR190123007','BHN170612028',300.00,300.00,'FINISH','',NULL,'2019-01-28 07:17:20','FALSE'),(195,'PR190123008','BHN170612023',100.00,100.00,'FINISH','',NULL,'2019-01-25 10:24:14','FALSE'),(196,'PR190141009','BHN170612091',15000.00,15000.00,'FINISH','bukit 020 ppn',NULL,'2019-01-23 07:18:08','FALSE'),(197,'PR190141010','BHN170612091',45000.00,45000.00,'FINISH','bukit ( suherman 021 , suminah 022 ,sugandi 023 ,ika 024 ,sunarti 025 , yusup 026 )',NULL,'2019-02-06 15:00:07','FALSE'),(198,'PR190141011','BHN170612091',30000.00,30000.00,'FINISH','bukit ( juwanti 030.suheri 031.m wican 032 .eko pur 033 )',NULL,'2019-01-30 07:20:49','FALSE'),(199,'PR190124012','BHN170612092',60.00,60.00,'FINISH','',NULL,'2019-01-24 15:16:13','FALSE'),(200,'PR190141013','BHN170612001',15000.00,15000.00,'FINISH','akino 043 ',NULL,'2019-01-30 07:23:21','FALSE'),(201,'PR190123014','BHN170612018',50.00,50.00,'FINISH','',NULL,'2019-02-18 15:37:22','FALSE'),(202,'PR190124015','BHN170612076',450.00,450.00,'FINISH','',NULL,'2019-02-01 08:02:05','FALSE'),(203,'PR190141016','BHN170612005',3000.00,3000.00,'FINISH','indoplas',NULL,'2019-02-01 07:15:08','FALSE'),(204,'PR190223001','BHN170612019',300.00,300.00,'FINISH','',NULL,'2019-02-25 09:55:01','FALSE'),(205,'PR190223001','BHN170612020',200.00,200.00,'FINISH','',NULL,'2019-02-19 15:47:44','FALSE'),(206,'PR190241002','BHN170612091',30000.00,30000.00,'FINISH','bukit ppn 050',NULL,'2019-02-08 13:13:47','FALSE'),(207,'PR190241003','BHN170612091',30000.00,30000.00,'FINISH','PANCA BUDI 054',NULL,'2019-02-15 11:35:38','FALSE'),(208,'PR190241004','BHN170612108',30000.00,30000.00,'FINISH','AKINO 055 AENI',NULL,'2019-02-15 15:27:07','FALSE'),(209,'PR190241005','BHN170612091',20000.00,20000.00,'FINISH','bukit ppn 056',NULL,'2019-02-19 14:00:44','FALSE'),(210,'PR190241006','BHN170612091',20000.00,20000.00,'FINISH','bukit ( suherman 057, suminah 058 ,sugandi 059 )',NULL,'2019-02-25 08:17:30','FALSE'),(211,'PR190241007','BHN170612091',20000.00,20000.00,'FINISH','bukit (  eka lus 060 ,indra gun 061 ,dimas sm 062 )',NULL,'2019-02-26 11:29:31','FALSE'),(212,'PR190241008','BHN170612001',40000.00,40000.00,'FINISH','Akino ( Aeni 063 )',NULL,'2019-03-08 07:22:35','FALSE'),(213,'PR190223009','BHN170612038',1020.00,1020.00,'FINISH','',NULL,'2019-02-21 07:26:42','FALSE'),(214,'PR190223009','BHN170612042',160.00,160.00,'FINISH','',NULL,'2019-02-21 07:27:56','FALSE'),(215,'PR190223009','BHN170612039',170.00,170.00,'FINISH','',NULL,'2019-02-21 07:28:20','FALSE'),(216,'PR190223009','BHN170612040',160.00,160.00,'FINISH','',NULL,'2019-02-21 07:27:13','FALSE'),(217,'PR190223009','BHN170612081',30.00,30.00,'FINISH','',NULL,'2019-02-21 07:29:10','FALSE'),(218,'PR190223010','BHN170612038',340.00,340.00,'FINISH','',NULL,'2019-03-01 11:11:41','FALSE'),(219,'PR190223010','BHN170612037',340.00,340.00,'FINISH','',NULL,'2019-03-08 15:04:04','FALSE'),(220,'PR190323001','BHN170612028',300.00,300.00,'FINISH','',NULL,'2019-03-08 07:25:03','FALSE'),(221,'PR190324002','BHN170612076',450.00,450.00,'FINISH','',NULL,'2019-03-09 07:45:16','FALSE'),(222,'PR190341003','BHN170612091',60000.00,60000.00,'FINISH','panca budi 074 ppn ',NULL,'2019-03-26 13:18:50','FALSE'),(223,'PR190341004','BHN170612108',30000.00,30000.00,'FINISH','Akino 076 ( aeni )',NULL,'2019-03-12 15:21:51','FALSE'),(224,'PR190341005','BHN170612091',30000.00,30000.00,'FINISH','bukit (eko pur 087,rahmat 088 , suheri 089 , juwanti 090 )',NULL,'2019-03-19 07:34:14','FALSE'),(225,'PR190341006','BHN170612091',30000.00,30000.00,'FINISH','panca budi 091',NULL,'2019-03-14 08:29:19','FALSE'),(226,'PR190341007','BHN170612091',30000.00,30000.00,'FINISH','bukit ( yusup 092,suminah 093,masidi 094 ,m wican 095 )',NULL,'2019-03-25 07:21:41','FALSE'),(227,'PR190323008','BHN170612018',50.00,50.00,'FINISH','',NULL,'2019-03-25 08:29:02','FALSE'),(228,'PR190323008','BHN170612024',60.00,0.00,'PENDING','',NULL,'2019-03-14 08:40:38','TRUE'),(229,'PR190323009','BHN170612024',50.00,50.00,'FINISH','',NULL,'2019-03-21 15:36:35','FALSE'),(230,'PR190323010','BHN170612020',200.00,200.00,'FINISH','',NULL,'2019-03-29 07:22:24','FALSE'),(231,'PR190323010','BHN170612019',300.00,300.00,'FINISH','',NULL,'2019-04-15 13:06:58','FALSE'),(232,'PR190323011','BHN170612038',1020.00,1020.00,'FINISH','',NULL,'2019-03-29 13:16:47','FALSE'),(233,'PR190323011','BHN170612042',160.00,160.00,'FINISH','',NULL,'2019-03-28 15:24:01','FALSE'),(234,'PR190323011','BHN170612040',160.00,160.00,'FINISH','',NULL,'2019-03-28 15:25:36','FALSE'),(235,'PR190323012','BHN170612021',50.00,50.00,'FINISH','',NULL,'2019-04-05 07:46:28','FALSE'),(236,'PR190323013','BHN170612081',450.00,0.00,'PENDING','',NULL,'2019-03-28 09:38:01','TRUE'),(237,'PR190324014','BHN170612061',150.00,150.00,'FINISH','',NULL,'2019-03-28 08:35:34','FALSE'),(238,'PR190324014','BHN170612076',450.00,450.00,'FINISH','',NULL,'2019-03-29 15:26:43','FALSE'),(239,'PR190324014','BHN170612059',60.00,60.00,'FINISH','',NULL,'2019-03-28 08:37:23','FALSE'),(240,'PR190324014','BHN170612072',60.00,60.00,'FINISH','',NULL,'2019-03-28 08:37:57','FALSE'),(241,'PR190341015','BHN170612108',30000.00,30000.00,'FINISH','Akino',NULL,'2019-04-01 07:12:58','FALSE'),(242,'PR190341016','BHN170612091',30000.00,30000.00,'FINISH','panca budi',NULL,'2019-04-05 13:12:25','FALSE'),(243,'PR190324017','BHN170612067',60.00,60.00,'FINISH','',NULL,'2019-03-29 15:27:13','FALSE'),(244,'PR190323018','BHN170612081',30.00,30.00,'FINISH','',NULL,'2019-04-09 14:04:01','FALSE'),(245,'PR190441001','BHN170612108',30000.00,30000.00,'FINISH','bukit mega ( dimas 115 ,indra gunawan 116 ,mursanih 117, sunarti 118 )',NULL,'2019-04-09 13:04:41','FALSE'),(246,'PR190441002','BHN170612005',3000.00,3000.00,'FINISH','indoplast makmur / bersodara inti',NULL,'2019-04-09 13:05:29','FALSE'),(247,'PR190441003','BHN170612091',30000.00,30000.00,'FINISH','bukit mega ppn',NULL,'2019-04-16 11:42:12','FALSE'),(248,'PR190423004','BHN170612038',1020.00,1020.00,'FINISH','',NULL,'2019-04-22 13:43:12','FALSE'),(249,'PR190423004','BHN170612042',320.00,320.00,'FINISH','',NULL,'2019-04-23 09:25:12','FALSE'),(250,'PR190423005','BHN170612039',170.00,170.00,'FINISH','',NULL,'2019-04-22 13:44:03','FALSE'),(251,'PR190441006','BHN170612091',30000.00,30000.00,'FINISH','panca budi ppn 127/IV',NULL,'2019-04-23 11:15:03','FALSE'),(252,'PR190423007','BHN170612028',300.00,300.00,'FINISH','',NULL,'2019-04-24 11:48:12','FALSE'),(253,'PR190423008','BHN170612002',25.00,25.00,'FINISH','',NULL,'2019-05-06 14:54:36','FALSE'),(254,'PR190441009','BHN170612091',30000.00,30000.00,'FINISH','bukit mega ( suminah 132 , suheri 133 ,sukar bj 134 , rahmat S 135 )',NULL,'2019-05-06 13:19:16','FALSE'),(255,'PR190424010','BHN170612076',450.00,450.00,'FINISH','',NULL,'2019-05-09 10:21:09','FALSE'),(256,'PR190523001','BHN170612018',50.00,50.00,'FINISH','',NULL,'2019-05-23 10:36:28','FALSE'),(257,'PR190523001','BHN170612020',200.00,200.00,'FINISH','',NULL,'2019-05-14 15:49:38','FALSE'),(258,'PR190523001','BHN170612023',150.00,150.00,'FINISH','',NULL,'2019-05-14 15:50:29','FALSE'),(259,'PR190523001','BHN170612024',50.00,50.00,'FINISH','',NULL,'2019-05-23 10:37:03','FALSE'),(260,'PR190523002','BHN170612038',1020.00,1020.00,'FINISH','',NULL,'2019-05-10 14:41:32','FALSE'),(261,'PR190523002','BHN170612042',320.00,330.00,'FINISH','',NULL,'2019-05-10 14:41:58','FALSE'),(262,'PR190541003','BHN170612091',60000.00,60000.00,'FINISH','panca budi ',NULL,'2019-05-27 07:20:07','FALSE'),(263,'PR190541004','BHN170612001',15000.00,15000.00,'FINISH','akino ( aeni )',NULL,'2019-05-17 15:18:45','FALSE'),(264,'PR190541005','BHN170612108',30000.00,30000.00,'FINISH','bukit mega ( sugandi 152 , yusuf  153 , juwanti 154 , mursanih 155 )',NULL,'2019-05-14 15:46:07','FALSE'),(265,'PR190541006','BHN170612016',25.00,25.00,'FINISH','intera',NULL,'2019-05-08 14:57:20','FALSE'),(266,'PR190523007','BHN170612081',30.00,30.00,'FINISH','',NULL,'2019-05-21 08:10:47','FALSE'),(267,'PR190523008','BHN170612019',300.00,300.00,'FINISH','',NULL,'2019-05-27 09:20:51','FALSE'),(268,'PR190523008','BHN170612028',100.00,100.00,'FINISH','',NULL,'2019-05-27 09:22:39','FALSE'),(269,'PR190541009','BHN170612108',35000.00,52500.00,'FINISH','Akino 162',NULL,'2019-06-24 07:43:22','FALSE'),(270,'PR190524010','BHN170612076',150.00,150.00,'FINISH','',NULL,'2019-05-21 15:16:55','TRUE'),(271,'PR190541011','BHN170612091',40000.00,40000.00,'FINISH','Bukit mega ( m wican 164 ,sukar bj 165 ,dimas sm 166 ,indra gunawan 167 ,massidi 168 , eko pur 169 )',NULL,'2019-05-27 07:20:59','FALSE'),(272,'PR190541012','BHN170612091',20000.00,20000.00,'FINISH','bukit ppn 170',NULL,'2019-06-18 11:02:40','FALSE'),(273,'PR190541013','BHN170612110',25.00,25.00,'FINISH','bukit (dimas sm 166 )',NULL,'2019-05-17 11:38:52','FALSE'),(274,'PR190523014','BHN170612028',200.00,200.00,'FINISH','',NULL,'2019-06-17 10:38:54','FALSE'),(275,'PR190524015','BHN170612076',150.00,0.00,'PENDING','',NULL,'2019-05-21 15:01:59','TRUE'),(276,'PR190524015','BHN170612059',150.00,0.00,'PENDING','',NULL,'2019-05-21 15:01:53','TRUE'),(277,'PR190524016','BHN170612059',150.00,150.00,'FINISH','',NULL,'2019-05-21 15:18:26','FALSE'),(278,'PR190524016','BHN170612076',150.00,150.00,'FINISH','',NULL,'2019-05-21 15:18:50','FALSE'),(279,'PR190524017','BHN170612076',450.00,450.00,'FINISH','',NULL,'2019-06-19 15:36:52','FALSE'),(280,'PR190524017','BHN170612077',60.00,60.00,'FINISH','',NULL,'2019-06-17 10:47:51','FALSE'),(281,'PR190524017','BHN170612082',60.00,60.00,'FINISH','',NULL,'2019-06-17 10:48:07','FALSE'),(282,'PR190623001','BHN170612038',1020.00,1020.00,'FINISH','',NULL,'2019-06-19 13:33:46','FALSE'),(283,'PR190623001','BHN170612040',160.00,160.00,'FINISH','',NULL,'2019-06-19 13:34:07','FALSE'),(284,'PR190623002','BHN170612021',50.00,50.00,'FINISH','',NULL,'2019-06-28 10:36:43','FALSE'),(285,'PR190623002','BHN170612018',50.00,50.00,'FINISH','',NULL,'2019-06-21 07:21:26','FALSE'),(286,'PR190623002','BHN170612024',100.00,100.00,'FINISH','',NULL,'2019-06-21 07:21:50','FALSE'),(287,'PR190624003','BHN170612097',60.00,60.00,'FINISH','',NULL,'2019-06-21 08:19:37','FALSE'),(288,'PR190624003','BHN170612074',60.00,60.00,'FINISH','',NULL,'2019-06-21 08:19:57','FALSE'),(289,'PR190641004','BHN170612091',30000.00,30000.00,'FINISH','panca budi 191',NULL,'2019-06-24 07:44:39','FALSE'),(290,'PR190641005','BHN170612001',30000.00,30000.00,'FINISH','akino 194 ( aeni )',NULL,'2019-07-10 07:22:35','FALSE'),(291,'PR190623006','BHN170612039',170.00,170.00,'FINISH','',NULL,'2019-06-25 14:10:43','FALSE'),(292,'PR190641007','BHN170612091',40000.00,40000.00,'FINISH','plastradeword (202/VI/19/p)',NULL,'2019-07-11 15:37:14','FALSE'),(293,'PR190641008','BHN170612110',1000.00,1000.00,'FINISH','bukit mega',NULL,'2019-06-28 08:27:56','FALSE'),(294,'PR190623009','BHN170612020',200.00,200.00,'FINISH','',NULL,'2019-06-28 10:35:36','FALSE'),(295,'PR190723001','BHN170612028',300.00,300.00,'FINISH','',NULL,'2019-07-04 11:35:56','FALSE'),(296,'PR190724002','BHN170612076',300.00,300.00,'FINISH','',NULL,'2019-07-16 11:16:54','FALSE'),(297,'PR190741003','BHN170612091',60000.00,60000.00,'FINISH','panca budi 208',NULL,'2019-07-16 11:42:42','FALSE'),(298,'PR190741004','BHN170612108',30000.00,30000.00,'FINISH','akino 209',NULL,'2019-07-15 07:31:03','FALSE'),(299,'PR190741005','BHN170612005',3000.00,3000.00,'FINISH','indoplas 211',NULL,'2019-07-09 07:33:44','FALSE'),(300,'PR190741006','BHN170612001',30000.00,15000.00,'FINISH','akino 214',NULL,'2019-07-25 07:23:39','FALSE'),(301,'PR190741007','BHN170612091',60000.00,60000.00,'FINISH','panca 215',NULL,'2019-08-12 07:14:26','FALSE'),(302,'PR190723008','BHN170612038',1360.00,1360.00,'FINISH','',NULL,'2019-07-11 13:28:12','FALSE'),(303,'PR190723008','BHN170612081',30.00,30.00,'FINISH','',NULL,'2019-07-15 07:24:36','FALSE'),(304,'PR190723009','BHN170612019',300.00,300.00,'FINISH','',NULL,'2019-07-22 09:57:17','FALSE'),(305,'PR190723009','BHN170612024',50.00,50.00,'FINISH','',NULL,'2019-07-22 09:57:57','FALSE'),(306,'PR190723010','BHN170612025',25.00,25.00,'FINISH','',NULL,'2019-07-31 11:25:14','FALSE'),(307,'PR190741011','BHN170612110',5000.00,5000.00,'FINISH','m wican 220',NULL,'2019-07-16 11:46:23','FALSE'),(308,'PR190741012','BHN170612001',30000.00,15000.00,'PROGRESS','AENI / akino 214',NULL,'2019-07-23 16:14:46','TRUE'),(309,'PR190741013','BHN170612091',60000.00,0.00,'PROGRESS','panca budi ppn 215',NULL,'2019-07-23 16:14:49','TRUE'),(310,'PR190724014','BHN170612076',375.00,375.00,'FINISH','',NULL,'2019-07-25 15:16:51','FALSE'),(311,'PR190723015','BHN170612037',340.00,340.00,'FINISH','',NULL,'2019-07-24 08:03:08','FALSE'),(312,'PR190723016','BHN170612028',300.00,300.00,'FINISH','',NULL,'2019-07-25 10:27:10','FALSE'),(313,'PR190741017','BHN190722001',25.00,25.00,'FINISH','panca budi 227',NULL,'2019-07-24 08:26:16','FALSE'),(314,'PR190741018','BHN190722002',25.00,25.00,'FINISH','bukit mega 228',NULL,'2019-07-24 08:30:27','FALSE'),(315,'PR190741019','BHN170612110',10000.00,10000.00,'FINISH','bukit ( massidi  230 )',NULL,'2019-07-29 08:19:18','FALSE'),(316,'PR190741020','BHN170612108',12000.00,12000.00,'FINISH','akino ( aeni 237 )',NULL,'2019-07-29 08:17:04','FALSE'),(317,'PR190741021','BHN170612110',10000.00,10000.00,'FINISH','bukit ( dimas sm 238 )',NULL,'2019-07-29 08:18:35','FALSE'),(318,'PR190741022','BHN170612091',50000.00,50000.00,'FINISH','bukit ( indra gunawan 239 ,yusuf ba 240 ,suheri 241,juwanti 242,mursanih 241,suherman 244sukar bj 245 )',NULL,'2019-08-19 07:35:19','FALSE'),(319,'PR190724023','BHN170612076',375.00,375.00,'FINISH','',NULL,'2019-07-31 09:05:02','FALSE'),(320,'PR190724024','BHN170612061',150.00,150.00,'FINISH','',NULL,'2019-08-01 13:22:38','FALSE'),(321,'PR190841001','BHN170612110',30000.00,30000.00,'FINISH','bukit ( sunarti 249 ,suminah 250 ,sugandi 251 ,m wican 252 )',NULL,'2019-08-13 13:01:49','FALSE'),(322,'PR190823002','BHN170612038',1020.00,1020.00,'FINISH','',NULL,'2019-08-08 13:58:14','FALSE'),(323,'PR190823002','BHN170612042',320.00,320.00,'FINISH','',NULL,'2019-08-08 14:05:19','FALSE'),(324,'PR190823002','BHN170612040',160.00,160.00,'FINISH','',NULL,'2019-08-08 13:59:03','FALSE'),(325,'PR190823002','BHN170612039',170.00,170.00,'FINISH','',NULL,'2019-08-08 11:24:57','FALSE'),(326,'PR190841003','BHN170612108',15000.00,15000.00,'FINISH','bukit ( irwan jaya 258 ,rahmat s 257 )',NULL,'2019-08-12 07:18:00','FALSE'),(327,'PR190823004','BHN170612081',450.00,0.00,'PENDING','',NULL,'2019-08-12 15:46:18','TRUE'),(328,'PR190823005','BHN170612020',200.00,200.00,'FINISH','',NULL,'2019-08-15 09:55:19','FALSE'),(329,'PR190824006','BHN170612076',450.00,450.00,'FINISH','',NULL,'2019-08-14 14:53:45','FALSE'),(330,'PR190823007','BHN170612081',30.00,30.00,'FINISH','',NULL,'2019-08-19 07:36:57','FALSE'),(331,'PR190823008','BHN170612019',300.00,300.00,'FINISH','',NULL,'2019-08-23 11:27:18','FALSE'),(332,'PR190824009','BHN170612076',150.00,150.00,'FINISH','',NULL,'2019-08-23 13:13:52','FALSE'),(333,'PR190823010','BHN170612018',50.00,50.00,'FINISH','',NULL,'2019-08-27 13:19:05','FALSE'),(334,'PR190841011','BHN170612001',30000.00,30000.00,'FINISH','Akino 264',NULL,'2019-08-29 07:37:14','FALSE'),(335,'PR190841012','BHN170612108',7500.00,7500.00,'FINISH','bukit - juwanti 276',NULL,'2019-09-03 13:06:28','FALSE'),(336,'PR190841013','BHN170612001',20000.00,20000.00,'FINISH','akino -aeni',NULL,'2019-09-02 08:04:48','FALSE'),(337,'PR190841014','BHN170612091',40000.00,40000.00,'FINISH','panca budi 278',NULL,'2019-09-04 11:07:14','FALSE'),(338,'PR190823015','BHN170612038',1190.00,1190.00,'FINISH','',NULL,'2019-08-29 14:57:00','FALSE'),(339,'PR190823015','BHN170612042',160.00,160.00,'FINISH','',NULL,'2019-08-29 14:57:55','FALSE'),(340,'PR190823015','BHN170612040',320.00,330.00,'FINISH','',NULL,'2019-09-11 14:11:51','FALSE'),(341,'PR190823016','BHN170612028',300.00,300.00,'FINISH','',NULL,'2019-09-10 13:17:50','FALSE'),(342,'PR190824017','BHN170612076',450.00,450.00,'FINISH','',NULL,'2019-09-13 13:08:39','FALSE'),(343,'PR190941001','BHN170612108',20000.00,20000.00,'FINISH','PT lotte chemical ( 279 )',NULL,'2019-09-05 14:12:04','FALSE'),(344,'PR190941002','BHN170612091',30000.00,30000.00,'FINISH','PT plastrade / akino wahana ( 294 )',NULL,'2019-09-11 07:19:15','FALSE'),(345,'PR190941003','BHN170612110',5000.00,5000.00,'FINISH','panca budi ( 295 )',NULL,'2019-09-06 14:30:17','FALSE'),(346,'PR190923004','BHN170612021',50.00,50.00,'FINISH','',NULL,'2019-09-20 11:32:50','FALSE'),(347,'PR190923004','BHN170612022',50.00,50.00,'FINISH','',NULL,'2019-09-12 13:55:59','FALSE'),(348,'PR190923004','BHN170612023',100.00,100.00,'FINISH','',NULL,'2019-09-12 13:55:33','FALSE'),(349,'PR190923005','BHN170612020',200.00,200.00,'FINISH','',NULL,'2019-09-20 11:33:16','FALSE'),(350,'PR190941006','BHN170612091',30000.00,30000.00,'FINISH','panca budi ( 296 )',NULL,'2019-09-17 07:16:30','FALSE'),(351,'PR190923007','BHN170612038',1360.00,1360.00,'FINISH','',NULL,'2019-09-25 13:37:44','FALSE'),(352,'PR190923007','BHN170612039',170.00,170.00,'FINISH','',NULL,'2019-09-25 13:38:25','FALSE'),(353,'PR190923007','BHN170612042',160.00,160.00,'FINISH','',NULL,'2019-09-20 15:21:39','FALSE'),(354,'PR190941008','BHN170612091',15000.00,7500.00,'PROGRESS','bukit mega ( 310 sukar bj , 311 irwan jaya )',NULL,'2019-09-24 13:15:44','FALSE'),(355,'PR190941009','BHN170612108',40000.00,20000.00,'PROGRESS','Akino ( 312 Aeni )',NULL,'2019-09-20 15:14:07','FALSE'),(356,'PR190941010','BHN170612001',20000.00,20000.00,'FINISH','polytech indo housen ( 313 isbandi )',NULL,'2019-09-24 13:18:04','FALSE'),(357,'PR190941011','BHN170612110',15000.00,15000.00,'FINISH','panca budi ( 314 isbandi )',NULL,'2019-09-24 13:19:34','FALSE'),(358,'PR190924012','BHN170612076',450.00,450.00,'FINISH','',NULL,'2019-09-20 15:10:41','FALSE'),(359,'PR190924012','BHN170612077',90.00,90.00,'FINISH','',NULL,'2019-09-20 15:11:16','FALSE'),(360,'PR190923013','BHN170612081',30.00,0.00,'PROGRESS','',NULL,'2019-09-23 10:19:54','FALSE'),(361,'PR190923014','BHN190924001',25.00,0.00,'PENDING','',NULL,'2019-09-24 14:30:15','FALSE'),(362,'PR190941015','BHN170612091',30000.00,0.00,'PENDING','Bukit mega ( 321 mursanih ,322 eko purwanti ,323 juwanti , 324 sugandi )',NULL,'2019-09-24 15:27:32','FALSE'),(363,'PR190941016','BHN170612091',30000.00,0.00,'PENDING','panca budi 325',NULL,'2019-09-24 15:28:34','FALSE'),(364,'PR190923016','BHN170612019',300.00,0.00,'PENDING','',NULL,'2019-09-24 15:51:22','TRUE'),(365,'PR190923017','BHN170612019',300.00,0.00,'PENDING','',NULL,'2019-09-24 15:52:21','FALSE');
/*!40000 ALTER TABLE `transaksi_detail_permintaan_barang` ENABLE KEYS */;
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