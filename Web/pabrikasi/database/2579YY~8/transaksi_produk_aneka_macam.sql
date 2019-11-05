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
-- Table structure for table `transaksi_produk_aneka_macam`
--

DROP TABLE IF EXISTS `transaksi_produk_aneka_macam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `transaksi_produk_aneka_macam` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `kd_pack` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dp` int(11) DEFAULT NULL,
  `id_detail_pengiriman` int(11) DEFAULT NULL,
  `jumlah_berat` decimal(13,2) NOT NULL,
  `jumlah_lembar` decimal(13,0) NOT NULL,
  `jumlah_kirim` int(11) NOT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `bagian` enum('EXTRUDER','CETAK','POTONG','SABLON','GUDANG HASIL','PENGIRIMAN','GUDANG KANVAS') NOT NULL DEFAULT 'GUDANG KANVAS',
  `tgl_transaksi` date NOT NULL,
  `merek` varchar(100) DEFAULT NULL,
  `jns_permintaan` enum('SABLON','CETAK','POLOS','CETAK/POLOS','CAT MURNI') NOT NULL DEFAULT 'POLOS',
  `sts_barang` enum('SABLON','STANDARD','CAMPUR','KANTONG','EXPORT','CAT MURNI','KANVAS','ANEKA MACAM') NOT NULL DEFAULT 'ANEKA MACAM',
  `sts_approve` enum('FALSE','TRUE') NOT NULL,
  `status_history` enum('KELUAR','MASUK') NOT NULL,
  `status_transaksi` enum('PENDING','OPEN','PROGRESS','FINISH','SEND BACK') NOT NULL DEFAULT 'PENDING',
  `keterangan_history` varchar(50) DEFAULT NULL,
  `keterangan_barang` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `note` int(11) NOT NULL,
  `status_lock` enum('TRUE','FALSE') NOT NULL DEFAULT 'FALSE',
  `diperbarui` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` enum('FALSE','TRUE') NOT NULL DEFAULT 'FALSE',
  PRIMARY KEY (`id_transaksi`),
  KEY `kd_pack` (`kd_pack`),
  CONSTRAINT `transaksi_produk_aneka_macam_ibfk_1` FOREIGN KEY (`kd_pack`) REFERENCES `produk_aneka_macam` (`kd_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi_produk_aneka_macam`
--

LOCK TABLES `transaksi_produk_aneka_macam` WRITE;
/*!40000 ALTER TABLE `transaksi_produk_aneka_macam` DISABLE KEYS */;
INSERT INTO `transaksi_produk_aneka_macam` VALUES (10,'PACK1905240005',43,17043,29036,0.34,25,1,'silvia','GUDANG KANVAS','2019-05-24','KP/MIX-TEBAL/009','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 30-07-2019 14:33:28',0,'FALSE','2019-07-30 14:33:28','FALSE'),(11,'PACK1905140001',43,16996,29037,0.34,60,1,'inawaty','GUDANG KANVAS','2019-05-23','KLIP PLASTIK ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 30-07-2019 14:35:11',0,'FALSE','2019-07-30 14:35:11','FALSE'),(12,'PACK1905140001',43,16966,29038,1.70,300,5,'vena','GUDANG KANVAS','2019-05-22','KLIP PLASTIK ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 30-07-2019 14:37:08',0,'FALSE','2019-07-30 14:37:08','FALSE'),(13,'PACK1905140001',43,16943,29039,0.34,60,1,'ayu','GUDANG KANVAS','2019-05-22','KLIP PLASTIK ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 30-07-2019 14:37:57',0,'FALSE','2019-07-30 14:37:57','FALSE'),(14,'PACK1905200004',43,16789,29040,0.24,25,1,'titi','GUDANG KANVAS','2019-05-20','KLIP/MIX-001','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 30-07-2019 14:39:21',0,'FALSE','2019-07-30 14:39:21','FALSE'),(15,'PACK1905150002',43,16612,29041,0.18,840,3,'black uncrowned','GUDANG KANVAS','2019-05-16','POLOS\nKP/BLUE-RED/004','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 30-07-2019 14:41:02',0,'FALSE','2019-07-30 14:41:02','FALSE'),(16,'PACK1905140001',43,19351,29054,0.34,60,1,'michelle','GUDANG KANVAS','2019-07-25','KLIP PLASTIK ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 07:18:59',0,'FALSE','2019-07-31 07:18:59','FALSE'),(17,'PACK1907150011',43,19283,29055,5.20,1200,48,'pt kage dwijaya','GUDANG KANVAS','2019-07-25','POLOS KLIP DOUBLE INNER','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 07:20:32',0,'FALSE','2019-07-31 07:20:32','FALSE'),(18,'PACK1905140001',43,19272,29056,0.34,60,1,'winda','GUDANG KANVAS','2019-07-24','KLIP PLASTIK ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 07:21:27',0,'FALSE','2019-07-31 07:21:27','FALSE'),(19,'PACK1905140001',43,18984,29057,0.34,60,1,'ibnu','GUDANG KANVAS','2019-07-17','KLIP PLASTIK ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 07:22:36',0,'FALSE','2019-07-31 07:22:36','FALSE'),(20,'PACK1907150011',43,18905,29058,12.90,3000,120,'pt. kurnia phileo','GUDANG KANVAS','2019-07-15','KLIP DOUBLE INNER','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 07:24:50',0,'FALSE','2019-07-31 07:24:50','FALSE'),(21,'PACK1905140001',43,18290,29059,0.34,60,1,'dida diani','GUDANG KANVAS','2019-07-02','KLIP PLASTIK ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 07:26:16',0,'FALSE','2019-07-31 07:26:16','FALSE'),(22,'PACK1905140001',43,17849,29068,0.34,60,1,'sulaesih','GUDANG KANVAS','2019-06-24','	KLIP PLASTIK ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 07:52:12',0,'FALSE','2019-07-31 07:52:12','FALSE'),(23,'PACK1906200006',43,17698,29069,0.30,150,6,'nanis','GUDANG KANVAS','2019-06-20','KP/CKLT/003','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 07:56:03',0,'FALSE','2019-07-31 07:56:03','FALSE'),(24,'PACK1906200009',43,17699,29070,0.25,30,1,'nanis','GUDANG KANVAS','2019-06-20','KP/HJ-MRH/002','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 07:56:48',0,'FALSE','2019-07-31 07:56:48','FALSE'),(25,'PACK1906200008',43,17700,29071,0.27,25,1,'nanis','GUDANG KANVAS','2019-06-20','KP/MIX-PON/007','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 07:57:49',0,'FALSE','2019-07-31 07:57:49','FALSE'),(26,'PACK1905140001',43,19194,29155,18.50,3000,50,'surabaya','GUDANG KANVAS','2019-07-22','ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 13:07:44',0,'FALSE','2019-07-31 13:07:44','FALSE'),(27,'PACK1905140001',43,18584,29156,1.40,240,4,'toko karo karo','GUDANG KANVAS','2019-07-11','POLOS ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 13:10:39',0,'FALSE','2019-07-31 13:10:39','FALSE'),(28,'PACK1905140001',43,18582,29157,0.70,120,2,'toko surya','GUDANG KANVAS','2019-07-11','POLOS ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 13:12:05',0,'FALSE','2019-07-31 13:12:05','FALSE'),(29,'PACK1905140001',43,18233,29158,18.50,3000,1,'ganefo','GUDANG KANVAS','2019-07-15','ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 13:12:52',0,'FALSE','2019-07-31 13:12:52','FALSE'),(30,'PACK1905140001',43,17486,29159,37.00,6000,100,'plastik edy','GUDANG KANVAS','2019-06-24','KLIP PLASTIK ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 13:14:44',0,'FALSE','2019-07-31 13:14:44','FALSE'),(31,'PACK1905140001',43,16837,29160,1.75,300,5,'toko plastik nissa','GUDANG KANVAS','2019-05-21','KLIP PLASTIK ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 13:19:09',0,'FALSE','2019-07-31 13:19:10','FALSE'),(32,'PACK1905140001',43,16839,29161,0.35,60,1,'toko nieza','GUDANG KANVAS','2019-05-21','KLIP PLASTIK ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 13:20:07',0,'FALSE','2019-07-31 13:20:07','FALSE'),(33,'PACK1905140001',43,16840,29162,1.75,300,5,'toko shakira','GUDANG KANVAS','2019-05-21','KLIP PLASTIK ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 13:21:35',0,'FALSE','2019-07-31 13:21:35','FALSE'),(34,'PACK1905140001',43,16529,29163,18.50,3000,50,'toko star plastik','GUDANG KANVAS','2019-05-16','POLOS ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 31-07-2019 13:23:19',0,'FALSE','2019-07-31 13:23:19','FALSE'),(35,'PACK1905140001',43,19776,29408,0.35,60,1,'sri','GUDANG KANVAS','2019-08-05','KLIP PLASTIK ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 05-08-2019 12:54:20',0,'FALSE','2019-08-05 12:54:20','FALSE'),(36,'PACK1905140001',43,19776,29486,0.35,60,1,'sri wahyuni','GUDANG KANVAS','2019-08-05','KLIP PLASTIK ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 07-08-2019 08:16:56',0,'FALSE','2019-08-07 08:16:56','FALSE'),(37,'PACK1905140001',43,19845,29538,0.35,60,1,'wawa','GUDANG KANVAS','2019-08-07','KLIP PLASTIK ANEKA MACAM','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 07-08-2019 11:45:53',0,'FALSE','2019-08-07 11:45:53','FALSE'),(38,'PACK1905150002',43,19931,29623,0.20,840,3,'pudin','GUDANG KANVAS','2019-08-08','KP/BLUE-RED/004','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 08-08-2019 13:18:59',0,'FALSE','2019-08-08 13:18:59','FALSE'),(39,'PACK1905140001',43,20163,29990,0.35,60,1,'sofy','GUDANG KANVAS','2019-08-13','POLOS','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 13-08-2019 13:56:58',0,'FALSE','2019-08-13 13:56:58','FALSE'),(40,'PACK1905140001',43,20289,30116,2.80,480,8,'lia plastik','GUDANG KANVAS','2019-08-15','POLOS','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 15-08-2019 08:34:04',0,'FALSE','2019-08-15 08:34:04','FALSE'),(41,'PACK1907150011',43,20435,30625,3.90,900,36,'central rezeki','GUDANG KANVAS','2019-08-23','POLOS KLIP DOUBLE','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 23-08-2019 10:05:50',0,'FALSE','2019-08-23 10:05:50','FALSE'),(42,'PACK1907150011',43,20683,32138,23.00,5250,210,'duta sentosa','GUDANG KANVAS','2019-09-16','POLOS KLIP DOUBLE','POLOS','','FALSE','KELUAR','FINISH','PENGIRIMAN BARANG','PENGIRIMAN','Barang Telah Dikirim Ke Bagian Pengiriman Pada : 16-09-2019 11:46:48',0,'FALSE','2019-09-16 11:46:48','FALSE');
/*!40000 ALTER TABLE `transaksi_produk_aneka_macam` ENABLE KEYS */;
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