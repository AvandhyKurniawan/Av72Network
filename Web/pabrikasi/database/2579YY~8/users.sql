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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_ori` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `group` varchar(20) NOT NULL,
  `sub_group` varchar(50) DEFAULT NULL,
  `ttd` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'SYSTEM','supersystem','supersystem',1,'SYSTEM',NULL,NULL),(2,'didik','0206','0206',1,'marketing',NULL,NULL),(3,'farida','wkwk','wkwk',2,'marketing',NULL,NULL),(4,'nina','123','123',2,'marketing',NULL,NULL),(5,'nena','nhena1108','nhena1108',2,'marketing',NULL,NULL),(6,'elly','erlinda','erlinda',1,'marketing',NULL,NULL),(7,'egha','kwetiaw','kwetiaw',2,'marketing',NULL,NULL),(8,'jatinegara','adminjatinegara','adminjatinegara',2,'cabang','jatinegara',NULL),(9,'ganefo','admin123','admin123',2,'cabang','ganefo',NULL),(10,'semarang','admin123','admin123',2,'cabang','semarang',NULL),(11,'brebes','superpassword','superpassword',2,'cabang','brebes',NULL),(12,'surabaya','surabaya123','surabaya123',2,'cabang','surabaya',NULL),(13,'medan','admin19690515','admin19690515',2,'cabang','medan',NULL),(14,'bandung','ADMIN123','ADMIN123',2,'cabang','bandung',NULL),(15,'arief','123456','123456',1,'cabang','jatinegara',NULL),(16,'hendri','admin123','admin123',1,'cabang','ganefo',NULL),(17,'suwoto','admin123','admin123',1,'cabang','semarang',NULL),(18,'joni','jonicirebon','jonicirebon',1,'cabang','brebes',NULL),(19,'kusri','surabaya123','surabaya123',1,'cabang','surabaya',NULL),(20,'rahman','rahman15','rahman15',1,'cabang','medan',NULL),(21,'bayu','admin123','admin123',1,'cabang','bandung',NULL),(22,'ppic','clipzipper','clipzipper',1,'ppic',NULL,NULL),(23,'gudangbahan','admin123','admin123',1,'gudang bahan',NULL,NULL),(24,'gudanghasil','adminstd','adminstd',1,'gudang hasil',NULL,NULL),(25,'gudangroll','admin123','admin123',1,'gudang roll',NULL,NULL),(26,'extruder','admin123','admin123',1,'extruder',NULL,NULL),(27,'potong','admin123','admin123',1,'cutting',NULL,NULL),(28,'saldo','admin123','admin123',1,'cutting',NULL,NULL),(29,'Avandhy','superpassword','superpassword',1,'it_department',NULL,NULL),(30,'cetak','admin123','admin123',1,'cetak',NULL,NULL),(31,'admin','admin','admin',1,'administrator',NULL,NULL),(32,'sablon','admin123','admin123',1,'sablon',NULL,NULL),(33,'accounting','CITRA2','CITRA2',1,'accounting',NULL,NULL),(34,'pri','superpassword','superpassword',1,'cabang','brebes',NULL),(35,'pengiriman','superpassword','superpassword',1,'pengiriman',NULL,NULL),(36,'yani','admin123','admin123',2,'pengiriman',NULL,NULL),(37,'ari','1234','1234',2,'marketing',NULL,NULL),(38,'andre','superpassword','superpassword',1,'ppic',NULL,NULL),(39,'nila','admin123','admin123',1,'it_department',NULL,NULL),(40,'pajak','admin123','admin123',1,'pajak',NULL,NULL),(41,'purchasing','admin123','admin123',1,'purchasing',NULL,NULL),(42,'Meiyin','admin123','admin123',1,'marketing',NULL,NULL),(43,'gudangkanvas','admin123','admin123',1,'gudang kanvas',NULL,NULL),(44,'dewi','admin123','admin123',3,'marketing',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-26  0:00:09
