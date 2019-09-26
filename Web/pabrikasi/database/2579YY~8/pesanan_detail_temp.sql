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
-- Table structure for table `pesanan_detail_temp`
--

DROP TABLE IF EXISTS `pesanan_detail_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pesanan_detail_temp` (
  `id_dp` int(11) NOT NULL AUTO_INCREMENT,
  `no_order` varchar(20) NOT NULL,
  `kd_cust` varchar(20) NOT NULL,
  `kd_gd_hasil` varchar(20) DEFAULT NULL,
  `kd_gd_bahan` varchar(20) DEFAULT NULL,
  `kd_pack` varchar(20) DEFAULT NULL,
  `merek` text NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `satuan` enum('BAL','KG','LEMBAR','KALENG','INNER','PACK') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` decimal(13,2) NOT NULL DEFAULT '0.00',
  `mata_uang` enum('Rp.','USD.') NOT NULL DEFAULT 'Rp.',
  `warna_cetak` varchar(20) DEFAULT 'Polos',
  `jenis` enum('STANDARD','KHUSUS') DEFAULT NULL,
  `keterangan` text,
  `sts_pesanan` enum('WAITING','OPEN','PROGRESS','PACKING','FINISH') NOT NULL DEFAULT 'OPEN',
  `dll` varchar(100) NOT NULL,
  `sm` varchar(20) NOT NULL,
  `kd_hrg` varchar(30) NOT NULL,
  `omset_lembar` decimal(13,2) NOT NULL,
  `omset_kg` decimal(13,2) NOT NULL,
  `potongan` decimal(13,2) DEFAULT NULL,
  `diskon` decimal(13,2) DEFAULT NULL,
  `cn` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_dp`),
  KEY `kd_pesanan` (`no_order`),
  KEY `kd_gd_hasil` (`kd_gd_hasil`)
) ENGINE=InnoDB AUTO_INCREMENT=21534 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesanan_detail_temp`
--

LOCK TABLES `pesanan_detail_temp` WRITE;
/*!40000 ALTER TABLE `pesanan_detail_temp` DISABLE KEYS */;
INSERT INTO `pesanan_detail_temp` VALUES (470,'NO1804261201','CUST18002658XX','HSLC1706121155',NULL,NULL,'Klip',100.00,'KG',0.00,'Rp.','TANPA CETAK','KHUSUS','PAKAI STRIP MERAH PUTIH , BERAT 25 KG ISI 11.500 LEMBAR  , TOLONG SEGERA DI PROSES DAN DI KIRIM , CUSTOMER MINTA 2 MINGGU HARUS SUDAH SELESAI DAN DI KIRIM','WAITING','BERAT 25 KG ISI 11.500 LEMBAR','M/P','',0.00,0.00,NULL,NULL,NULL),(473,'NO1804261201','CUST18002658XX','HSLC1706120004',NULL,NULL,'Klip',1.00,'BAL',0.00,'Rp.','TANPA CETAK','KHUSUS','BERAT 34 KG ISI 100.000 LEMBAR ,TANPA STRIP MERAH ,DENGAN ETIKET ,TOLONG SEGERA DI PROSES DAN DI KIRIM','WAITING','BERAT 34 KG ISI 100.000 LEMBAR','LOS','',0.00,0.00,NULL,NULL,NULL),(474,'NO1804261201','CUST18002658XX','HSLC1706121431',NULL,NULL,'Klip',20.00,'BAL',0.00,'Rp.','TANPA CETAK','STANDARD','MINTA BERAT PAS','WAITING','BERAT 19 KG','S/M','',0.00,0.00,NULL,NULL,NULL),(476,'NO1804261201','CUST18002658XX','HSLC1706120027',NULL,NULL,'Klip',10.00,'BAL',0.00,'Rp.','TANPA CETAK','STANDARD','','WAITING','BERAT 30-30.5 KG','S/M','',0.00,0.00,NULL,NULL,NULL),(477,'NO1804261201','CUST18002658XX','HSLC1706120043',NULL,NULL,'Klip',7.00,'BAL',0.00,'Rp.','TANPA CETAK','STANDARD','','WAITING','BERAT 30-30.5 KG','S/M','',0.00,0.00,NULL,NULL,NULL),(479,'NO1804261201','CUST18002658XX','HSLC1706120047',NULL,NULL,'Klip',8.00,'BAL',0.00,'Rp.','TANPA CETAK','STANDARD','','WAITING','BERAT 36-36.5 KG','S/M','',0.00,0.00,NULL,NULL,NULL),(509,'NO1804261201','CUST18002658XX','HSLS1706120114',NULL,NULL,'Klip',10.00,'BAL',0.00,'Rp.','TANPA CETAK','STANDARD','','WAITING','BERAT 19-20 KG','PSS','',0.00,0.00,NULL,NULL,NULL),(510,'NO1804261201','CUST18002658XX','HSLS1706120156',NULL,NULL,'cb',5.00,'BAL',0.00,'Rp.','CETAK BAWAH','STANDARD','','WAITING','BERAT 19-19.5 KG','MERAH','',0.00,0.00,NULL,NULL,NULL),(511,'NO1804261201','CUST18002658XX','HSLS1706120166',NULL,NULL,'cb',15.00,'BAL',0.00,'Rp.','CETAK BAWAH','STANDARD','','WAITING','BERAT 20-20.5 KG','MERAH','',0.00,0.00,NULL,NULL,NULL),(1380,'NO180517312','CUST18002897DK','HSLS1805173071',NULL,NULL,'KLIPON GAMA PERKASA + LUBANG',10000.00,'LEMBAR',1452.00,'Rp.','ABUABU',NULL,NULL,'OPEN','0.060-0.065','LOS','030118',10000.00,227.20,0.00,0.00,''),(1530,'NO1805211201','CUST18002658XX','HSLS1706120116',NULL,NULL,'Klip',10.00,'BAL',0.00,'Rp.','-','STANDARD','','WAITING','berat 20.5-21 kg','s/m','',0.00,0.00,NULL,NULL,NULL),(1538,'NO1805211201','CUST18002658XX','HSLC1805213079',NULL,NULL,'Klip',100.00,'BAL',0.00,'Rp.','-','KHUSUS','TEBAL 0.06 , PANJANG DARI BIBIR KE KLIP 1.5 CM, TANPA STRIP MERAH TOLONG SEGERA DI PROSES DAN DI KIRIM','WAITING','TEBAL 0.6','LOS','',0.00,0.00,NULL,NULL,NULL),(1539,'NO1805211201','CUST18002658XX','HSLC1706120034',NULL,NULL,'Klip',5.00,'BAL',0.00,'Rp.','-','STANDARD','','WAITING','BERAT 30-30.5 KG','S/M','',0.00,0.00,NULL,NULL,NULL),(1540,'NO1805211201','CUST18002658XX','HSLS1706120820',NULL,NULL,'KP',20.00,'BAL',0.00,'Rp.','-','STANDARD','','WAITING','ISI 60.000 LEMBAR','M/O','',0.00,0.00,NULL,NULL,NULL),(1944,'NO180530313','CUST18000896DK','HSSB1706121839',NULL,NULL,'AP K 24 SOBAT SEHAT KITA KITA BINTANG FARMA\nJL. JATI BENING II NO. 17 C (KINCAN)\nPONDOK GEDE BEKASI\nTELP/FAX (021) 8651318, 8650469\nAPOTEKER : DESI MARDIANA, S. FARM., APT.\nSIPA : 440/055/PA/SDMKES/VI/2014\nSIA : 449/81/BPPT.4\n',5000.00,'LEMBAR',141.50,'Rp.','P',NULL,NULL,'OPEN','26','S/M','030118',5000.00,10.80,0.00,2.83,''),(1945,'NO180530313','CUST18000896DK','HSSB1706121828',NULL,NULL,'AP K 24 SOBAT SEHAT KITA KITA BINTANG FARMA\nJL. JATI BENING II NO. 17 C (KINCAN)\nPONDOK GEDE BEKASI\nTELP/FAX (021) 8651318, 8650469\nAPOTEKER : DESI MARDIANA, S. FARM., APT.\nSIPA : 440/055/PA/SDMKES/VI/2014\nSIA : 449/81/BPPT.4',5000.00,'LEMBAR',95.50,'Rp.','P',NULL,NULL,'OPEN','24','S/M','030118',5000.00,5.80,0.00,1.91,''),(2114,'NO180606304','CUST18000071DK','HSSB1706121833',NULL,NULL,'AP. FARMARIN II\nRUKO TAMAN PULO INDAH\nAPOTEKER : PUTRI MELISA. S FARM, APT.\nNO. SIK : 0122/2.35.0/31.75.06.0000/-1.779.3/2016',5000.00,'LEMBAR',117.00,'Rp.','P',NULL,NULL,'OPEN','26','S/M','030118',5000.00,8.10,0.00,0.00,''),(2115,'NO180606304','CUST18000071DK','HSSB1706121668',NULL,NULL,' AP. FARMARIN II\nRUKO TAMAN PULO INDAH\nAPOTEKER : PUTRI MELISA. S FARM, APT.\nNO. SIK : 0122/2.35.0/31.75.06.0000/-1.779.3/2016\nRUKO TAMAN PULO INDAH',5000.00,'LEMBAR',180.50,'Rp.','P',NULL,NULL,'OPEN','31','S/M','030118',5000.00,11.60,0.00,0.00,''),(2400,'NO180628311','CUST18000033DK','HSLC1806283159',NULL,NULL,'POLOS',100.00,'KG',40500.00,'Rp.','',NULL,NULL,'OPEN','0.04-0.045','S/M','030118',103500.00,100.00,0.00,810.00,''),(2452,'NO1806291001','CUST18002888LK','HSLS1706120093',NULL,NULL,'Zippin',15.00,'BAL',0.00,'Rp.','polos','STANDARD','penting','WAITING','isi  46000 lmbr','strip','',0.00,0.00,NULL,NULL,NULL),(2453,'NO1806291001','CUST18002888LK','HSLS1706120094',NULL,NULL,'Zippin',15.00,'BAL',0.00,'Rp.','polos','STANDARD','penting','WAITING','isi 27000 lmbr','strip','',0.00,0.00,NULL,NULL,NULL),(2454,'NO1806291001','CUST18002888LK','HSLC1706120070',NULL,NULL,'Zippin',10.00,'BAL',0.00,'Rp.','polos','STANDARD','penting','WAITING','isi 33000 lmbr','strip','',0.00,0.00,NULL,NULL,NULL),(2455,'NO1806291001','CUST18002888LK','HSLS1706120096',NULL,NULL,'Zippin',20.00,'BAL',0.00,'Rp.','polos','STANDARD','penting','WAITING','isi 17000 lmbr','strip','',0.00,0.00,NULL,NULL,NULL),(2456,'NO1806291001','CUST18002888LK','HSLS1706120097',NULL,NULL,'Zippin',10.00,'BAL',0.00,'Rp.','polos','STANDARD','penting','WAITING','isi 12300  lmbr','strip','',0.00,0.00,NULL,NULL,NULL),(2457,'NO1806291001','CUST18002888LK','HSLS1706120117',NULL,NULL,'Klip',2.00,'BAL',0.00,'Rp.','polos','STANDARD','isi 20000 lmbr','WAITING','25 - 25.5 kg','strip putih','',0.00,0.00,NULL,NULL,NULL),(2458,'NO180629801','CUST18002653XX','HSLC1706120004',NULL,NULL,'Klip',10.00,'BAL',0.00,'Rp.','polos','STANDARD','jatinegara','WAITING','18-18.5','s/m','',0.00,0.00,NULL,NULL,NULL),(2459,'NO180629801','CUST18002653XX','HSLC1706120005',NULL,NULL,'Klip',10.00,'BAL',0.00,'Rp.','polos','STANDARD','jatinegara','WAITING','21-21.5','s/m','',0.00,0.00,NULL,NULL,NULL),(2460,'NO180629801','CUST18002653XX','HSLS1706120101',NULL,NULL,'Klip',15.00,'BAL',0.00,'Rp.','polos','STANDARD','jatinegara','WAITING','17-17.5','s/m','',0.00,0.00,NULL,NULL,NULL),(2462,'NO180629801','CUST18002653XX','HSLC1706120011',NULL,NULL,'Klip',25.00,'BAL',0.00,'Rp.','polos','STANDARD','jatinegara','WAITING','18-18.5','s/m','',0.00,0.00,NULL,NULL,NULL),(2463,'NO1806291001','CUST18002888LK','HSLS1706120165',NULL,NULL,'cb',4.00,'BAL',0.00,'Rp.','cetak bawah','STANDARD','isi 16000 lmbr','WAITING','25 - 26 kg','strip putih','',0.00,0.00,NULL,NULL,NULL),(2464,'NO180629801','CUST18002653XX','HSLS1706120104',NULL,NULL,'Klip',10.00,'BAL',0.00,'Rp.','polos','STANDARD','jatinegara','WAITING','18-18.5','s/m','',0.00,0.00,NULL,NULL,NULL),(2465,'NO180629801','CUST18002653XX','HSLS1706120109',NULL,NULL,'Klip',5.00,'BAL',0.00,'Rp.','polos','STANDARD','jatinegara','WAITING','19-19.5','s/m','',0.00,0.00,NULL,NULL,NULL),(2466,'NO180629801','CUST18002653XX','HSLS1706120116',NULL,NULL,'Klip',15.00,'BAL',0.00,'Rp.','polos','STANDARD','jatinegara','WAITING','19-19.5','s/m','',0.00,0.00,NULL,NULL,NULL),(2467,'NO180629801','CUST18002653XX','HSLS1706120124',NULL,NULL,'Klip',10.00,'BAL',0.00,'Rp.','polos','STANDARD','jatinegara','WAITING','21-21.5','s/m','',0.00,0.00,NULL,NULL,NULL),(2775,'NO180705304','CUST18003512DK','HSSB1807053180',NULL,NULL,'CETAK CE',100.00,'LEMBAR',220.00,'Rp.','p',NULL,NULL,'OPEN','0.05','LOS','030118',0.00,0.00,0.00,0.00,''),(2776,'NO180705304','CUST18003512DK','HSLC1803152892',NULL,NULL,'POLOS',800.00,'LEMBAR',17.50,'Rp.','',NULL,NULL,'OPEN','0.04','S/PSS','030118',0.00,0.00,0.00,0.00,''),(2782,'NO180705307','CUST18000254DK','HSLC1706120022',NULL,NULL,'POLOS',100.00,'KG',39000.00,'Rp.','',NULL,NULL,'OPEN','31-32','LOS','070116',43000.00,100.00,0.00,0.00,''),(2949,'NO180709304','CUST18002372DK','HSSB1706121667',NULL,NULL,'APOTEK K-24\nCIKARET-CIBINONG\nJL. CIKARET RUKO NIRWANA ESTATE BLOK A NO. 66-67, CIBINONG - BOGOR\nTELP. (021) 87908096 FAX. (021) 87908097',20000.00,'LEMBAR',178.00,'Rp.','HJ',NULL,NULL,'OPEN','0.02','-','030118',20000.00,45.40,0.00,0.00,''),(2950,'NO180709304','CUST18002372DK','HSSB1706121834',NULL,NULL,'APOTEK K-24\nCIKARET-CIBINONG\nJL. CIKARET RUKO NIRWANA ESTATE BLOK A NO. 66-67, CIBINONG - BOGOR\nTELP. (021) 87908096 FAX. (021) 87908097',10000.00,'LEMBAR',211.50,'Rp.','HJ',NULL,NULL,'OPEN','0.02','-','030118',10000.00,31.80,0.00,0.00,''),(2951,'NO180709304','CUST18002372DK','HSSB1706121675',NULL,NULL,'APOTEK K-24\nCIKARET-CIBINONG\nJL. CIKARET RUKO NIRWANA ESTATE BLOK A NO. 66-67, CIBINONG - BOGOR\nTELP. (021) 87908096 FAX. (021) 87908097',5000.00,'LEMBAR',318.00,'Rp.','HJ',NULL,NULL,'OPEN','030118','-','030118',5000.00,28.50,0.00,0.00,''),(3642,'NO180723307','CUST18000330LK','HSLC1706120334',NULL,NULL,'ZIPPIN',2.00,'BAL',36500.00,'Rp.','',NULL,NULL,'OPEN','0.05-0.055','PINK/PINK','220216',3200.00,40.00,0.00,0.00,''),(3643,'NO180723307','CUST18000330LK','HSLS1706120094',NULL,NULL,'ZIPPIN',10.00,'BAL',36500.00,'Rp.','',NULL,NULL,'OPEN','0.04-0.045','PINK/PINK','220216',270000.00,200.00,0.00,0.00,''),(3644,'NO180723307','CUST18000330LK','HSLS1706120096',NULL,NULL,'ZIPPIN',5.00,'BAL',36500.00,'Rp.','',NULL,NULL,'OPEN','0.04-0.045','PINK/PINK','220216',85000.00,100.00,0.00,0.00,''),(3645,'NO180723307','CUST18000330LK','HSLS1706120097',NULL,NULL,'ZIPPIN',5.00,'BAL',36500.00,'Rp.','',NULL,NULL,'OPEN','0.04-0.045','PINK/PINK','220216',65000.00,100.00,0.00,0.00,''),(3646,'NO180723307','CUST18000330LK','HSLS1706120115',NULL,NULL,'POLOS',5.00,'BAL',38500.00,'Rp.','',NULL,NULL,'OPEN','23-24','S/P','220216',100000.00,120.00,0.00,0.00,''),(3647,'NO180723307','CUST18000330LK','HSLS1706120114',NULL,NULL,'POLOS',3.00,'BAL',38500.00,'Rp.','',NULL,NULL,'OPEN','23-24','S/P','220216',60000.00,72.00,0.00,0.00,''),(3669,'NO180724801','CUST18002653XX','HSLC1706120061',NULL,NULL,'KP',5.00,'BAL',0.00,'Rp.','polos','STANDARD','jatinegara','WAITING','110000','m/o','',0.00,0.00,NULL,NULL,NULL),(3670,'NO180724801','CUST18002653XX','HSLC1706120061',NULL,NULL,'KP',5.00,'BAL',0.00,'Rp.','polos','STANDARD','jatinegara','WAITING','110000','m/o','',0.00,0.00,NULL,NULL,NULL),(3671,'NO180724801','CUST18002653XX','HSLC1706120062',NULL,NULL,'KP',5.00,'BAL',0.00,'Rp.','polos','STANDARD','jatinegara','WAITING','91000','m/o','',0.00,0.00,NULL,NULL,NULL),(3672,'NO180724801','CUST18002653XX','HSLS1706120820',NULL,NULL,'KP',10.00,'BAL',0.00,'Rp.','polos','STANDARD','jatinegara','WAITING','60000','m/o','',0.00,0.00,NULL,NULL,NULL),(3794,'NO180725312','CUST18003556LK','HSLC1807253257',NULL,NULL,'POLOS',2000.00,'LEMBAR',1400.00,'Rp.','',NULL,NULL,'OPEN','0.08','LOS','030118',0.00,0.00,0.00,0.00,''),(3795,'NO180725312','CUST18003556LK','HSLC1807253258',NULL,NULL,'POLOS',4500.00,'LEMBAR',177.00,'Rp.','',NULL,NULL,'OPEN','0.10','S/M','030118',0.00,0.00,0.00,0.00,''),(4267,'NO1808061201','CUST18002658XX','HSLC1706120005',NULL,NULL,'Klip',30.00,'BAL',0.00,'Rp.','-','STANDARD','','WAITING','BERAT 20 KG','S/M','',0.00,0.00,NULL,NULL,NULL),(4269,'NO1808061201','CUST18002658XX','HSLS1706120101',NULL,NULL,'Klip',50.00,'BAL',0.00,'Rp.','-','STANDARD','','WAITING','BERAT 16 KG','S/M','',0.00,0.00,NULL,NULL,NULL),(4270,'NO1808061201','CUST18002658XX','HSLC1706120011',NULL,NULL,'Klip',30.00,'BAL',0.00,'Rp.','-','STANDARD','','WAITING','BERAT 19 KG','S/M','',0.00,0.00,NULL,NULL,NULL),(4271,'NO1808061201','CUST18002658XX','HSLS1706120104',NULL,NULL,'Klip',50.00,'BAL',0.00,'Rp.','-','STANDARD','','WAITING','BERAT 18 KG','S/M','',0.00,0.00,NULL,NULL,NULL),(4452,'NO1808081305','CUST18002655XX','HSSB1808083314',NULL,NULL,'rs.bhayangkara medan ',5000.00,'LEMBAR',0.00,'Rp.','PUTIH','STANDARD','RS.BHAYANGKARA MEDAN .JL.K.H.WAHID HASYIM NO.I TELP(061)8215990 MEDAN...TOLONG YA PAK.PENTIING .TADI SAMA YG 10 X 7 PUTIH YA PAK.TQ\n','WAITING','-/6,5/5000','MERAH','',0.00,0.00,NULL,NULL,NULL),(4537,'NO180813304','CUST18003175DK','HSLC1706120989',NULL,NULL,'POLOS',100.00,'LEMBAR',0.00,'Rp.','',NULL,NULL,'OPEN','0.05','S/M','-',0.00,0.00,0.00,0.00,''),(4538,'NO180813304','CUST18003175DK','HSLC1706120045',NULL,NULL,'POLOS',100.00,'LEMBAR',0.00,'Rp.','',NULL,NULL,'OPEN','0.05','LOS','-',0.00,0.00,0.00,0.00,''),(4539,'NO180813304','CUST18003175DK','HSLC1706120996',NULL,NULL,'POLOS',100.00,'LEMBAR',0.00,'Rp.','',NULL,NULL,'OPEN','0.05','S/M','-',0.00,0.00,0.00,0.00,''),(4787,'NO180816306','CUST18001648DK','HSLC1706120006',NULL,NULL,'POLOS',500000.00,'LEMBAR',45000.00,'Rp.','',NULL,NULL,'OPEN','0.035-0.040','S/M','210515',500000.00,136.50,0.00,0.00,''),(4863,'NO1808211801','','HSLS1706121562',NULL,NULL,'pkumuhammadiyah',100000.00,'LEMBAR',0.00,'Rp.','PUTIH','STANDARD','100.000 LEMBAR','WAITING','31-32 KG','MERAH','',0.00,0.00,NULL,NULL,NULL),(4898,'NO180821307','CUST18003599DK','HSSB1808213345',NULL,NULL,'HD\nAP. LILY FARMA\nRUKO PARAMOUNT RODEO BLOK B NO. 8 GADING SERPONG TANGERANG\nTELP. (021) 54220511',3000.00,'LEMBAR',184.00,'Rp.','KUNING',NULL,NULL,'OPEN','0.02','-','030118',3000.00,6.80,0.00,0.00,''),(4899,'NO180821307','CUST18003599DK','HSSB1808213348',NULL,NULL,'HD\nAP. LILY FARMA\nRUKO PARAMOUNT RODEO BLOK B NO. 8 GADING SERPONG TANGERANG\nTELP. (021) 54220511',3000.00,'LEMBAR',280.00,'Rp.','KUNING',NULL,NULL,'OPEN','0.03','-','030118',3000.00,14.60,0.00,0.00,''),(5804,'NO180917304','CUST18002693DK','HSLS1706120104',NULL,NULL,'POLOS',4.00,'BAL',39000.00,'Rp.','',NULL,NULL,'OPEN','23-24','LOS','220216',128000.00,96.00,0.00,0.00,''),(5805,'NO180917304','CUST18002693DK','HSLS1706120130',NULL,NULL,'POLOS',8.00,'BAL',39000.00,'Rp.','',NULL,NULL,'OPEN','25-26','LOS','220216',96000.00,208.00,0.00,0.00,''),(6084,'NO180921302','CUST18002934DK','HSSB1809213490',NULL,NULL,'RUMAH SAKIT IBU DAN ANAK\nBUNDA SEJATI\nJL. PRABU SILIWANGI NO. 11 JATIUWUNG - KODYA TANGERANG\nTELP. 5900136 - 5900056 FAX. 5900056\nNO. : 445/KEP-05/BPPMPT/RS.2014\nAPOTEKER : SRI IRMAYUNI, S.FARM.,APT\nNO. : 446/SIPA.82/BPMPTSP/2016',5000.00,'LEMBAR',217.50,'Rp.','HJ',NULL,NULL,'OPEN','0.02','-','030118',5000.00,15.90,0.00,0.00,''),(6935,'NO181015305','CUST18000532DK','HSSB1810153631',NULL,NULL,'APOTIK HOSANA 1\nJL. GANG MACAN B. 100\nJAKARTA BARAT\nTELP : 565 2412, 56941362\nAPOTEKER : TRI WAHYUNINGSIH, SF., APT',5000.00,'LEMBAR',61.00,'Rp.','P',NULL,NULL,'OPEN','21','S/P','030118',5000.00,2.00,0.00,0.00,''),(7136,'NO181019302','CUST18003336DK','HSKV1809193506',NULL,NULL,'CB TIPIS',20000.00,'LEMBAR',37.00,'Rp.','p',NULL,NULL,'OPEN','19-20','S/M','030117',20000.00,14.30,0.00,0.00,''),(11009,'NO190201304','CUST18002759LK','HSLC1706120003',NULL,NULL,'POLOS',46.00,'KG',52000.00,'Rp.','',NULL,NULL,'OPEN','23-24','S/M','030117',400000.00,46.00,0.00,0.00,''),(11061,'NO190206308','CUST18001021LK','HSSB1706121574',NULL,NULL,'APOTIK GEMARI II\nJL.IKAN BAWAL NO.101\nTELP.482578 TELUK BETUNG\nBANDAR LAMPUNG\nAPOTEKER : NENSIRIA TARIGAN, S. Si. Apt., M.Kes\nNO. SIPA : 19681126/SIPA_18.71/2018/2089A',1.00,'BAL',80.00,'Rp.','P',NULL,NULL,'OPEN','24','S/P','030118',32000.00,24.00,0.00,0.00,''),(11062,'NO190206308','CUST18001021LK','HSSB1803082843',NULL,NULL,'APOTIK GEMARI II JL.IKAN BAWAL NO.101 TELP.482578 TELUK BETUNG BANDAR LAMPUNG APOTEKER : NENSIRIA TARIGAN, S. Si. Apt., M.Kes NO. SIPA : 19681126/SIPA_18.71/2018/2089A	',1.00,'BAL',96.00,'Rp.','P',NULL,NULL,'OPEN','24','S/P','030118',20000.00,24.00,0.00,0.00,''),(12114,'NO190227405','CUST18002037DK','HSLS1706120105',NULL,NULL,'POLOS',3000.00,'LEMBAR',31.50,'Rp.','',NULL,NULL,'OPEN','23-24','S/P','210515',3000.00,2.15,0.00,0.00,''),(12493,'NO190306903','CUST18002652XX','HSLS1706120101',NULL,NULL,'Klip',20.00,'BAL',0.00,'Rp.','---','STANDARD','* TOLONG SEGERA DIKIRIM.','WAITING','20 - 21','S/M','',0.00,0.00,NULL,NULL,NULL),(12853,'NO190314904','CUST18002652XX','HSLS1706120159',NULL,NULL,'cb',50.00,'BAL',0.00,'Rp.','PUTIH','STANDARD','* TOLONG SEGERA DIKIRIM.\n* U/ TK. RAKYAT.\n* BARANG TIPIS, KANTONG TEBAL.','WAITING','19 - 20','S/P','',0.00,0.00,NULL,NULL,NULL),(12854,'NO190314904','CUST18002652XX','HSLS1706120160',NULL,NULL,'cb',50.00,'BAL',0.00,'Rp.','PUTIH','STANDARD','* TOLONG SEGERA DIKIRIM.\n* U/ TK. RAKYAT.\n* BARANG TIPIS, KANTONG TEBAL.','WAITING','19 - 20','S/M','',0.00,0.00,NULL,NULL,NULL),(12855,'NO190314904','CUST18002652XX','HSLS1706120173',NULL,NULL,'cb',5.00,'BAL',0.00,'Rp.','PUTIH','STANDARD','* TOLONG SEGERA DIKIRIM.\n* U/ TK. RAKYAT.\n* BARANG TIPIS, KANTONG TEBAL.','WAITING','17 - 18','S/P','',0.00,0.00,NULL,NULL,NULL),(12856,'NO190314904','CUST18002652XX','HSLS1706120174',NULL,NULL,'cb',5.00,'BAL',0.00,'Rp.','PUTIH','STANDARD','* TOLONG SEGERA DIKIRIM.\n* U/ TK. RAKYAT.\n* BARANG TIPIS, KANTONG TEBAL.','WAITING','17 - 18','S/M','',0.00,0.00,NULL,NULL,NULL),(15723,'NO1905131001','CUST18002888LK','HSLC1706120983',NULL,NULL,'polos',10000.00,'LEMBAR',0.00,'Rp.','polos','STANDARD','geret minta tiga (penting) ,geret bibir klip paling atas\n','WAITING','tebal 0.06','los/tanpa strip','',0.00,0.00,NULL,NULL,NULL),(15724,'NO1905131001','CUST18002888LK','HSLS1706120652',NULL,NULL,'Klip',2.00,'BAL',0.00,'Rp.','polos','STANDARD','isi 12500 lmbr','WAITING','27 - 28 kg','strip','',0.00,0.00,NULL,NULL,NULL),(15725,'NO1905131001','CUST18002888LK','HSLS1706120166',NULL,NULL,'cb',5.00,'BAL',0.00,'Rp.','cetak bawah','STANDARD','isi 16000 lmbr','WAITING','25 - 26 kg','strip','',0.00,0.00,NULL,NULL,NULL),(15726,'NO1905131001','CUST18002888LK','HSLS1706120122',NULL,NULL,'Klip',4.00,'BAL',0.00,'Rp.','cetak bawah','STANDARD','isi 16000 lmbr','WAITING','25 - 26 kg','strip putih','',0.00,0.00,NULL,NULL,NULL),(15727,'NO1905131001','CUST18002888LK','HSLC1706120011',NULL,NULL,'Klip',10.00,'BAL',0.00,'Rp.','polos','STANDARD','isi 40000 lmbr','WAITING','21 -21.5 kg','strip','',0.00,0.00,NULL,NULL,NULL),(15728,'NO1905131001','CUST18002888LK','HSLS1706120159',NULL,NULL,'cb',10.00,'BAL',0.00,'Rp.','cetak bawah','STANDARD','isi 20000 lmbr','WAITING','22 - 23 kg','strip putih','',0.00,0.00,NULL,NULL,NULL),(15729,'NO1905131001','CUST18002888LK','HSLS1706120160',NULL,NULL,'cb',10.00,'BAL',0.00,'Rp.','cetak bawah','STANDARD','isi 20000 lmbr','WAITING','22 - 23 kg','strip','',0.00,0.00,NULL,NULL,NULL),(15730,'NO1905131001','CUST18002888LK','HSLS1706120156',NULL,NULL,'cb',10.00,'BAL',0.00,'Rp.','cetak bawah','STANDARD','isi 32000 lmbr','WAITING','22 - 23 kg','strip','',0.00,0.00,NULL,NULL,NULL),(15731,'NO1905131001','CUST18002888LK','HSLS1706120154',NULL,NULL,'cb',5.00,'BAL',0.00,'Rp.','cetak bawah','STANDARD','isi 32000 lmbr','WAITING','19 - 20 kg','strip putih','',0.00,0.00,NULL,NULL,NULL),(15732,'NO1905131001','CUST18002888LK','HSLS1706120154',NULL,NULL,'cb',5.00,'BAL',0.00,'Rp.','cetak bawah','STANDARD','isi 32000 lmbr','WAITING','22 - 23 kg','strip putih','',0.00,0.00,NULL,NULL,NULL),(15733,'NO1905131001','CUST18002888LK','HSLS1706120140',NULL,NULL,'Klip',10.00,'BAL',0.00,'Rp.','polos','STANDARD','isi 12500 lmbr','WAITING','27 - 27.5 kg','strip','',0.00,0.00,NULL,NULL,NULL),(15734,'NO1905131001','CUST18002888LK','HSLS1706120101',NULL,NULL,'Klip',20.00,'BAL',0.00,'Rp.','polos','STANDARD','isi 48000 lmbr','WAITING','19 - 19.1 kg','strip','',0.00,0.00,NULL,NULL,NULL),(15735,'NO1905131001','CUST18002888LK','HSLC1706120047',NULL,NULL,'Klip',5.00,'BAL',0.00,'Rp.','polos','STANDARD','isi 3000 lmbr','WAITING','tebal 0.05','strip','',0.00,0.00,NULL,NULL,NULL),(17424,'NO1906271202','CUST18002658XX','HSLS1706120140',NULL,NULL,'Klip',5.00,'BAL',0.00,'Rp.','-','STANDARD','','WAITING','BERAT 30-30.1 KG','S/M','',0.00,0.00,NULL,NULL,NULL),(17425,'NO1906271202','CUST18002658XX','HSLC1706120027',NULL,NULL,'Klip',10.00,'BAL',0.00,'Rp.','-','STANDARD','','WAITING','BERAT 30-30.1 KG','S/M','',0.00,0.00,NULL,NULL,NULL),(17426,'NO1906271202','CUST18002658XX','HSLC1706120044',NULL,NULL,'Klip',20.00,'BAL',0.00,'Rp.','-','STANDARD','','WAITING','BERAT 30-30.5KG','S/M','',0.00,0.00,NULL,NULL,NULL),(17427,'NO1906271202','CUST18002658XX','HSLC1706120047',NULL,NULL,'Klip',5.00,'BAL',0.00,'Rp.','-','STANDARD','','WAITING','BERAT 36-36.5 KG','S/M','',0.00,0.00,NULL,NULL,NULL),(17428,'NO1906271202','CUST18002658XX','HSLC1706120027',NULL,NULL,'Klip',5.00,'BAL',0.00,'Rp.','-','STANDARD','','WAITING','ISI 12.500 LEMBAR','M/P','',0.00,0.00,NULL,NULL,NULL),(17429,'NO1906271202','CUST18002658XX','HSLC1706120080',NULL,NULL,'MP',10.00,'BAL',0.00,'Rp.','-','STANDARD','','WAITING','ISI 8.000 LEMBAR','M/P','',0.00,0.00,NULL,NULL,NULL),(17430,'NO1906271202','CUST18002658XX','HSLC1706120082',NULL,NULL,'MP',20.00,'BAL',0.00,'Rp.','-','STANDARD','','WAITING','ISI 3.000 LEMBAR','M/P','',0.00,0.00,NULL,NULL,NULL),(17431,'NO1906271202','CUST18002658XX','HSLC1706120083',NULL,NULL,'MP',5.00,'BAL',0.00,'Rp.','-','STANDARD','','WAITING','ISI 3.000 LEMBAR','M/P','',0.00,0.00,NULL,NULL,NULL),(19473,'NO1908121301','CUST18002655XX','HSSB1706122140',NULL,NULL,'ap.kimiafarma162',10000.00,'LEMBAR',0.00,'Rp.','PUTIH','STANDARD','','WAITING','-/7,8/10000','PUTIH','',0.00,0.00,NULL,NULL,NULL),(19743,'NO190819702','CUST18003648DK','HSLC1706120057',NULL,NULL,'POLOS',700.00,'LEMBAR',742.00,'Rp.','',NULL,NULL,'OPEN','35-36','LOS','030118',700.00,13.00,0.00,0.00,''),(20301,'NO190902305','CUST18002309DK','HSLC1706120026',NULL,NULL,'POLOS',30.00,'INNER',10300.00,'Rp.','',NULL,NULL,'OPEN','0.050-0.055','LOS','220119',750.00,3.80,0.00,0.00,'');
/*!40000 ALTER TABLE `pesanan_detail_temp` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-25 23:59:29
