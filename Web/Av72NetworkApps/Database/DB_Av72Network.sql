-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2019 at 04:30 PM
-- Server version: 8.0.16
-- PHP Version: 7.2.19-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DB_Av72Network`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `role` enum('ROOT','ADMIN') NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `username`, `password`, `full_name`, `role`, `last_login`, `deleted_on`) VALUES
(1, 'Avandhy', 'HYzZbchKZKPVvFpc6xNjEw==', 'Avandhy Kurniawan', 'ROOT', '2019-07-09 15:24:47', NULL),
(6, 'administrator', 'GNsRbUGnoBPctcM84l+j4Q==', 'Administrator', 'ADMIN', '2019-07-05 09:01:43', NULL),
(7, 'asdad', '8SoLF9YGEuCYlYV6pDFdcw==', 'asdasd', 'ADMIN', NULL, '2019-06-26 16:20:21'),
(10, 'a', 'UytHlQNlYr2Is8mg8vq+VQ==', 'a', 'ADMIN', NULL, '2019-07-05 08:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `client_registration`
--

CREATE TABLE `client_registration` (
  `reg_id` varchar(20) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `package_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone_number` varchar(15) NOT NULL,
  `other_phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` text NOT NULL,
  `registration_date` date NOT NULL,
  `registration_status` enum('PENDING','CANCELED','ON SCHEDULED','ON PROCESS','HOLD','REGISTERED') DEFAULT NULL,
  `registration_fee` decimal(15,2) NOT NULL DEFAULT '0.00',
  `monthly_payment` decimal(15,2) NOT NULL DEFAULT '0.00',
  `information` text,
  `entered_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `deleted_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `admin_id`, `department_name`, `deleted_on`) VALUES
(1, 1, 'IT Department', NULL),
(2, 1, 'Marketing Department', NULL),
(3, 1, 'Network Operation Control', '2019-07-05 15:50:57'),
(4, 1, 'Accounting Department', NULL),
(5, 1, 'Tax', '2019-07-01 14:29:56'),
(6, 1, 'test', '2019-07-01 14:29:50'),
(7, 1, 'sdsds', '2019-07-01 14:29:46'),
(8, 1, 'dsfdsf', '2019-07-01 14:28:51'),
(9, 1, 'aaaaa', '2019-07-01 14:28:29'),
(10, 1, 'erterew', '2019-07-01 15:19:11'),
(11, 1, 'sasas', '2019-07-05 14:21:20'),
(12, 1, 'dsfdsf', '2019-07-05 14:27:21'),
(13, 1, 'dsfdsf', '2019-07-05 14:27:18'),
(14, 1, 'sdasd', '2019-07-05 14:27:13'),
(15, 1, 'gfhgfhgfh', '2019-07-05 14:27:10'),
(16, 1, 'Purchasing Department', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` varchar(20) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `number_id` varchar(50) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `gender` enum('Pria','Wanita') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Pria',
  `birthday` date DEFAULT NULL,
  `phone_number` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `other_phone_number` varchar(15) DEFAULT NULL,
  `address` text NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `join_date` date NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `admin_id`, `department_id`, `number_id`, `full_name`, `gender`, `birthday`, `phone_number`, `other_phone_number`, `address`, `email`, `join_date`, `picture`, `deleted_on`) VALUES
('19070001', 1, 1, '3603180702970009', 'Avandhy Kurniawan', 'Pria', '1997-02-07', '081287505145', '', '<p>Perum Bukit Tiara Blok R4 No. 3, Rt. 041, Rw. 006, Kel. Pasir Jaya, Kec. Cikupa, Kab. Tangerang.</p>\n', 'avandhykurniawan@gmail.com', '2015-01-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `installation_schedule`
--

CREATE TABLE `installation_schedule` (
  `schedule_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `reg_id` varchar(20) NOT NULL,
  `scheduled_on` datetime NOT NULL,
  `finished_on` datetime DEFAULT NULL,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `internet_packages`
--

CREATE TABLE `internet_packages` (
  `package_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `package_categories_id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL DEFAULT '0',
  `information` text NOT NULL,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `internet_packages`
--

INSERT INTO `internet_packages` (`package_id`, `admin_id`, `package_categories_id`, `package_name`, `speed`, `price`, `information`, `deleted_on`) VALUES
(1, 1, 1, 'INTERNET ONLY 1', 'UPTO 2 Mbps', '120000', '<p><strong>Spesifikasi Layanan :</strong></p>\n\n<ol>\n	<li>Ideal untuk penggunaan&nbsp;1-2 perangkat (Laptop, Handphone, Komputer).</li>\n	<li>Kecepatan unggah dan unduh hampir simetris 1:1.</li>\n	<li>Perangkat wifi router menjadi milik pelanggan.</li>\n	<li>Bebas untuk ganti kata sandi (berdasarkan permintaan pelanggan).</li>\n	<li>Bebas kuota dan FUP (Fair Usage Policy) / Batas penggunaan wajar.</li>\n	<li>Biaya bulanan flat, dan akan di infromasikan terlebih dahulu apabila ada kenaikan biaya.</li>\n</ol>\n\n<p><strong>Harga Belum Termasuk PPN 10%</strong></p>\n', NULL),
(2, 1, 1, 'INTERNET ONLY 2', 'UPTO 3 Mbps', '150000', '<p><strong>Spesifikasi Layanan :</strong></p>\n\n<ol>\n	<li>Ideal untuk penggunaan&nbsp;1-3&nbsp;perangkat (Laptop, Handphone, Komputer).</li>\n	<li>Kecepatan unggah dan unduh hampir simetris 1:1.</li>\n	<li>Perangkat wifi router menjadi milik pelanggan.</li>\n	<li>Bebas untuk ganti kata sandi (berdasarkan permintaan pelanggan).</li>\n	<li>Bebas kuota dan FUP (Fair Usage Policy) / Batas penggunaan wajar.</li>\n	<li>Biaya bulanan flat, dan akan di infromasikan terlebih dahulu apabila ada kenaikan biaya.</li>\n</ol>\n\n<p><strong>Harga Belum Termasuk PPN 10%</strong></p>\n', NULL),
(3, 1, 1, 'INTERNET ONLY 3', 'UPTO 4 Mbps', '175000', '<p><strong>Spesifikasi Layanan :</strong></p>\n\n<ol>\n	<li>Ideal untuk penggunaan&nbsp;1-4&nbsp;perangkat (Laptop, Handphone, Komputer).</li>\n	<li>Kecepatan unggah dan unduh hampir simetris 1:1.</li>\n	<li>Perangkat wifi router menjadi milik pelanggan.</li>\n	<li>Bebas untuk ganti kata sandi (berdasarkan permintaan pelanggan).</li>\n	<li>Bebas kuota dan FUP (Fair Usage Policy) / Batas penggunaan wajar.</li>\n	<li>Biaya bulanan flat, dan akan di infromasikan terlebih dahulu apabila ada kenaikan biaya.</li>\n</ol>\n\n<p><strong>Harga Belum Termasuk PPN 10%</strong></p>\n', NULL),
(4, 1, 1, 'INTERNET ONLY 4', 'UPTO 5 Mbps', '200000', '<p><strong>Spesifikasi Layanan :</strong></p>\n\n<ol>\n	<li>Ideal untuk penggunaan&nbsp;1-5&nbsp;perangkat (Laptop, Handphone, Komputer).</li>\n	<li>Kecepatan unggah dan unduh hampir simetris 1:1.</li>\n	<li>Perangkat wifi router menjadi milik pelanggan.</li>\n	<li>Bebas untuk ganti kata sandi (berdasarkan permintaan pelanggan).</li>\n	<li>Bebas kuota dan FUP (Fair Usage Policy) / Batas penggunaan wajar.</li>\n	<li>Biaya bulanan flat, dan akan di infromasikan terlebih dahulu apabila ada kenaikan biaya.</li>\n</ol>\n\n<p><strong>Harga Belum Termasuk PPN 10%</strong></p>\n', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `internet_payment`
--

CREATE TABLE `internet_payment` (
  `internet_payment_id` varchar(20) NOT NULL,
  `reg_id` varchar(20) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `billing_period` varchar(20) NOT NULL,
  `billing_amount` decimal(15,2) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `payment_type` enum('CASH','TRANSFER') NOT NULL DEFAULT 'CASH',
  `tax_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `payment_information` text,
  `transfer_proof_image` varchar(150) DEFAULT NULL,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package_categories`
--

CREATE TABLE `package_categories` (
  `package_categories_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `package_categories_name` varchar(50) NOT NULL,
  `information` text,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_categories`
--

INSERT INTO `package_categories` (`package_categories_id`, `admin_id`, `package_categories_name`, `information`, `deleted_on`) VALUES
(1, 1, 'BROADBAND INTERNET ONLY', '<ol>\n	<li>Layanan pada kategori ini <span style=\"color:#e74c3c\"><strong>tidak mendapatkan jaminan apapun</strong></span>, baik secara koneksi ataupun keamanan yang berkaitan karena kesalahan pelanggan.</li>\n	<li>Pelanggan hanya mendapatkan layanan internet saja.</li>\n</ol>\n', NULL),
(2, 1, 'BROADBAND MULTIMEDIA INTERNET', '<ol>\n	<li>Layanan pada kategori ini <span style=\"color:#e74c3c\"><strong>tidak mendapatkan jaminan apapun</strong></span>, baik secara koneksi ataupun keamanan yang berkaitan karena kesalahan pelanggan.</li>\n	<li>Pelanggan mendapatkan layanan internet dan dipinjamkan perangkat berupa STB Android untuk menunjang kebutuhan multimedia.</li>\n</ol>\n', NULL),
(3, 1, 'DEDICATED INTERNET ONLY', '<p>Layanan dedicated internet merupakan layanan yang di pergunakan untuk perusahaan atau kalangan pebisnis yang membutuhkan layanan internet dengan <span style=\"color:#e74c3c\"><strong>jaminan</strong></span> <strong><span style=\"color:#e74c3c\">SLA (Service Level Agreement) hingga 98%.</span></strong></p>\n', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `client_registration`
--
ALTER TABLE `client_registration`
  ADD PRIMARY KEY (`reg_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `number_id` (`number_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `installation_schedule`
--
ALTER TABLE `installation_schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `internet_packages`
--
ALTER TABLE `internet_packages`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `package_categories_id` (`package_categories_id`);

--
-- Indexes for table `internet_payment`
--
ALTER TABLE `internet_payment`
  ADD PRIMARY KEY (`internet_payment_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `reg_id` (`reg_id`) USING BTREE;

--
-- Indexes for table `package_categories`
--
ALTER TABLE `package_categories`
  ADD PRIMARY KEY (`package_categories_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `installation_schedule`
--
ALTER TABLE `installation_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internet_packages`
--
ALTER TABLE `internet_packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package_categories`
--
ALTER TABLE `package_categories`
  MODIFY `package_categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_registration`
--
ALTER TABLE `client_registration`
  ADD CONSTRAINT `client_registration_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`admin_id`),
  ADD CONSTRAINT `client_registration_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `client_registration_ibfk_3` FOREIGN KEY (`package_id`) REFERENCES `internet_packages` (`package_id`),
  ADD CONSTRAINT `client_registration_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `administrator` (`admin_id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`admin_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`admin_id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `installation_schedule`
--
ALTER TABLE `installation_schedule`
  ADD CONSTRAINT `installation_schedule_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`admin_id`),
  ADD CONSTRAINT `installation_schedule_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `installation_schedule_ibfk_3` FOREIGN KEY (`reg_id`) REFERENCES `client_registration` (`reg_id`);

--
-- Constraints for table `internet_packages`
--
ALTER TABLE `internet_packages`
  ADD CONSTRAINT `internet_packages_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`admin_id`),
  ADD CONSTRAINT `internet_packages_ibfk_2` FOREIGN KEY (`package_categories_id`) REFERENCES `package_categories` (`package_categories_id`);

--
-- Constraints for table `internet_payment`
--
ALTER TABLE `internet_payment`
  ADD CONSTRAINT `internet_payment_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `client_registration` (`reg_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `internet_payment_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`admin_id`);

--
-- Constraints for table `package_categories`
--
ALTER TABLE `package_categories`
  ADD CONSTRAINT `package_categories_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
