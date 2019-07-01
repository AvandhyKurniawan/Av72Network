-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 01, 2019 at 04:21 PM
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
(1, 'Avandhy', 'jdeZMA44QdBAzz4pSUp0XQ==', 'Avandhy Kurniawan', 'ROOT', '2019-07-01 14:10:15', NULL),
(6, 'admin', 'jdeZMA44QdBAzz4pSUp0XQ==', 'admin', 'ADMIN', '2019-06-21 15:30:10', '2019-06-26 16:17:32'),
(7, 'asdad', '8SoLF9YGEuCYlYV6pDFdcw==', 'asdasd', 'ADMIN', NULL, '2019-06-26 16:20:21');

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
(1, 1, ' Field Technician', NULL),
(2, 1, 'Marketing', NULL),
(3, 1, 'Network Operation Control', NULL),
(4, 1, 'Accounting', NULL),
(5, 1, 'Tax', '2019-07-01 14:29:56'),
(6, 1, 'test', '2019-07-01 14:29:50'),
(7, 1, 'sdsds', '2019-07-01 14:29:46'),
(8, 1, 'dsfdsf', '2019-07-01 14:28:51'),
(9, 1, 'aaaaa', '2019-07-01 14:28:29'),
(10, 1, 'erterew', '2019-07-01 15:19:11');

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
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `speed` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL DEFAULT '0',
  `type` enum('HOME','DEDICATED','BUSINESS') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'HOME',
  `information` text NOT NULL,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration_client`
--

CREATE TABLE `registration_client` (
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
  `information` text,
  `entered_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `deleted_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `internet_payment`
--
ALTER TABLE `internet_payment`
  ADD PRIMARY KEY (`internet_payment_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `reg_id` (`reg_id`) USING BTREE;

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `registration_client`
--
ALTER TABLE `registration_client`
  ADD PRIMARY KEY (`reg_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `installation_schedule`
--
ALTER TABLE `installation_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `installation_schedule_ibfk_3` FOREIGN KEY (`reg_id`) REFERENCES `registration_client` (`reg_id`);

--
-- Constraints for table `internet_payment`
--
ALTER TABLE `internet_payment`
  ADD CONSTRAINT `internet_payment_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `registration_client` (`reg_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `internet_payment_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`admin_id`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`admin_id`);

--
-- Constraints for table `registration_client`
--
ALTER TABLE `registration_client`
  ADD CONSTRAINT `registration_client_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `administrator` (`admin_id`),
  ADD CONSTRAINT `registration_client_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `registration_client_ibfk_3` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`),
  ADD CONSTRAINT `registration_client_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `administrator` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
