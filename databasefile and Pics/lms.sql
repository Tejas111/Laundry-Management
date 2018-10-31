-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 31, 2018 at 01:59 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin1`
--

DROP TABLE IF EXISTS `admin1`;
CREATE TABLE IF NOT EXISTS `admin1` (
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `slno` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`slno`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin1`
--

INSERT INTO `admin1` (`username`, `password`, `slno`) VALUES
('admin', 'admin12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `appusers`
--

DROP TABLE IF EXISTS `appusers`;
CREATE TABLE IF NOT EXISTS `appusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `address` varchar(60) DEFAULT NULL,
  `registration_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appusers`
--

INSERT INTO `appusers` (`id`, `username`, `password`, `email`, `mobile_no`, `address`, `registration_date`) VALUES
(13, 'ddd', 'ca3fecbcb53eab1abe6ac15c0b18f647', 'mello@gmail.com', '9739368139', 'll', '2018-10-28'),
(15, 'admin', '60474c9c10d7142b7508ce7a50acf414', 'siva@gmail.com', '6541239870', 'No 13, 6th main, 3rd block, 3rd stage, basaveshwarnagar', '2018-10-28'),
(16, '', '902f79963f803e57819c00e3aea08379', 'test1@gmail.com', '8660242951', 'nlnsldmc', '2018-10-28'),
(17, 'hh', '78c6bb3e2c0e2f3e7fb339560793ea09', 'mm@k.com', '88888888888', 'mommmm', '2018-10-28'),
(18, 'kjkk', 'c3e633a2ef454b80d8a44ad6efdc94d1', 'kk@gmail.com', '97377368139', 'No 13, 6th main, 3rd block, 3rd stage, basaveshwarnagar', '2018-10-28'),
(19, 'lkkjj', '85010a01d0883a209aead3d6655aaeb5', 'mello@gmail.lol', '9739368130', ' sdlmc lmds', '2018-10-28'),
(20, 'm', 'b44c19fe0b66f1b229ab2a57141f0888', 'l@gmila.com', '9739868139', 'No 13, 6th main, 3rd block, 3rd stage, basaveshwarnagar', '2018-10-28'),
(21, 'msm', 'a2a648372fd0d4086d2b6c7627ed014e', 'test@gmail.co', '9730368139', 'k', '2018-10-28'),
(22, 'lkdnk', 'a7e48ce6850d2830ffb9eec763ddb7d6', 'n1@gmail.com', '9739368201', 'jjjjjjjjjjjjj', '2018-10-29'),
(23, 'jp', '1b1a367245ed8eb3a08ed14037a181d1', 'ln@gmail.com', '9997778456', 'ininikkj', '2018-10-29'),
(24, 'admi', '4d7899971d9d28a5164bb289ab8c45bb', 'mello@gmail.jam', '9886750321', 'indskkl', '2018-10-30'),
(25, 'test12', '60474c9c10d7142b7508ce7a50acf414', 'tejaskk@gmail.com', '2525255256', 'dfsadc', '2018-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(20) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `reg_date` date NOT NULL,
  `sex` int(2) NOT NULL,
  `age_range` int(3) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `password` varchar(500) NOT NULL DEFAULT 'nitk',
  PRIMARY KEY (`id`),
  UNIQUE KEY `contact_no` (`contact_no`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fullname`, `contact_no`, `reg_date`, `sex`, `age_range`, `email`, `address`, `password`) VALUES
(18, 's', '9886750312', '2018-10-29', 0, 0, 'tejasnitk@gmail.com', 'lll', ''),
(19, 'g', '9739322239', '2018-10-29', 0, 0, 'shivaswaroop11344@gmail.com', 'kk', ''),
(20, 'lo', '9739368002', '2018-10-29', 0, 1, 'melo@gmail.com', 'jl', ''),
(21, 'shreyas', '', '2018-10-30', 0, 0, 'shreyaspandith1998@gmail.com', 'bangalore', ''),
(22, 'tushar', '9535456985', '2018-10-30', 0, 0, 'tushartdm117@gmail.com', 'kk', ''),
(23, 'swaroop', '8660302496', '2018-10-31', 0, 0, 'shivaswaroopvardhineedi@gmail.com', 'andhra', ''),
(24, 'sx', '99', '2018-10-31', 0, 2, 'shivaswaro4411344@gmail.com', 'ss', '3691308f2a4c2f6983f2880d32e29c84'),
(25, 'tejas', '8888888888', '2018-10-31', 0, 2, 'tk@gmail.com', 'dds', '14a723c35435b6002a1c9503b772cbba');

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

DROP TABLE IF EXISTS `clothes`;
CREATE TABLE IF NOT EXISTS `clothes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `laundry_rate` double NOT NULL,
  `dryclean_rate` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`id`, `category_id`, `name`, `laundry_rate`, `dryclean_rate`) VALUES
(1, 1, 'Dhoti', 15, 25),
(2, 1, 'Glove', 5, 10),
(3, 1, 'Jacket', 30, 60),
(4, 1, 'Jeans', 15, 30),
(5, 1, 'Shirt', 15, 30),
(6, 1, 'T-Shirt', 10, 20),
(7, 1, 'Jersey', 10, 25),
(8, 1, 'Pullover', 25, 50),
(9, 1, 'Cardigan', 25, 50),
(10, 1, 'Blazer', 100, 200),
(11, 1, 'Kurta', 30, 70),
(12, 1, 'Sherwani', 80, 180),
(13, 1, 'Pajamas', 15, 30),
(14, 1, 'Trousers', 25, 40),
(15, 1, 'Jumpsuit', 30, 50),
(16, 1, 'Suit', 70, 130),
(17, 1, 'Men\'s Shorts', 10, 20),
(18, 1, 'Tanks', 10, 15),
(19, 1, 'Short Sleeve Shirt', 15, 25),
(20, 1, 'Sweatshirt', 30, 50),
(21, 1, 'Night Gown', 30, 50),
(22, 1, 'Sweater', 35, 55),
(23, 1, 'Bathrobe', 40, 60),
(24, 2, 'Saree', 50, 80),
(25, 2, 'Skirt', 25, 40),
(26, 2, 'Dress', 60, 100),
(27, 2, 'Salwaar', 30, 50),
(28, 2, 'Kurti', 40, 60),
(29, 2, 'Tunics', 30, 50),
(30, 2, 'Top', 30, 50),
(31, 2, 'Leggings', 35, 60),
(32, 2, 'Maternity Wear', 40, 70),
(33, 2, 'Suit Sets', 35, 55),
(34, 2, 'Stole and Scarves', 20, 30),
(35, 2, 'Shrugs', 30, 50),
(36, 3, 'Bedsheets', 40, 70),
(37, 3, 'Curtains', 100, 170),
(38, 3, 'Towel', 30, 60),
(39, 3, 'Cushion Covers', 40, 80),
(40, 3, 'Carpets', 270, 400),
(41, 3, 'Rugs', 100, 170),
(42, 3, 'Sofa Covers', 140, 250),
(43, 3, 'Quilts', 250, 400);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `eid` int(11) NOT NULL,
  `jobs` int(11) NOT NULL,
  PRIMARY KEY (`eid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `jobs`) VALUES
(13, 1),
(15, 3),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_order`
--

DROP TABLE IF EXISTS `job_order`;
CREATE TABLE IF NOT EXISTS `job_order` (
  `id` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `submission_date` date NOT NULL,
  `expected_delivery_date` date NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `amount` double NOT NULL,
  `delivery_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `userId_idx` (`user_id`),
  KEY `client_id` (`client_id`),
  KEY `client_id_2` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_order`
--

INSERT INTO `job_order` (`id`, `user_id`, `client_id`, `submission_date`, `expected_delivery_date`, `total_quantity`, `amount`, `delivery_status`) VALUES
('5bd755cfe4c84', 15, 18, '2018-10-29', '2018-10-31', 3, 35, 2),
('5bd7576e329c2', 15, 19, '2018-10-29', '2018-10-31', 7, 125, 2),
('5bd75a121e3a7', 15, 20, '2018-10-29', '2018-10-31', 83, 905, 1),
('5bd75a618bbf4', 15, 19, '2018-10-29', '2018-10-31', 51, 335, 2),
('5bd81c3192365', 15, 21, '2018-10-30', '2018-11-01', 7, 280, 1),
('5bd82c55778da', 15, 22, '2018-10-30', '2018-11-01', 69, 720, 2),
('5bd8653a1c5df', 15, 18, '2018-10-30', '2018-11-01', 7, 465, 2),
('5bd89830b15b0', 20, 18, '2018-10-30', '2018-11-01', 5, 125, 2),
('5bd94c1ddbcb7', 15, 18, '2018-10-31', '2018-11-02', 5, 75, 0),
('5bd951fa67ab4', 13, 18, '2018-10-31', '2018-11-02', 4, 60, 0),
('5bd9539858b03', 16, 18, '2018-10-31', '2018-11-02', 5, 75, 0),
('5bd9543772a45', 17, 18, '2018-10-31', '2018-11-02', 11, 105, 0),
('5bd954d19b47f', 18, 18, '2018-10-31', '2018-11-02', 11, 525, 0),
('5bd961057ef70', 19, 18, '2018-10-31', '2018-11-02', 29, 745, 0),
('5bd961779fd4e', 20, 18, '2018-10-31', '2018-11-02', 2, 400, 0),
('5bd963dc4c051', 21, 18, '2018-10-31', '2018-11-02', 2, 30, 0),
('5bd964d402c90', 22, 18, '2018-10-31', '2018-11-02', 45, 225, 0),
('5bd9656b3e428', 23, 18, '2018-10-31', '2018-11-02', 2, 10, 0),
('5bd9702740009', 15, 19, '2018-10-31', '2018-11-02', 25, 375, 2),
('5bd9723d62f7e', 15, 23, '2018-10-31', '2018-11-02', 6, 70, 2),
('5bd97410250c5', 24, 23, '2018-10-31', '2018-11-02', 11, 105, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `job_order_id` varchar(20) NOT NULL,
  `cloth_name` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double NOT NULL,
  `order_type` int(11) NOT NULL,
  KEY `job_order_id_idx` (`job_order_id`),
  KEY `cloth_name` (`cloth_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`job_order_id`, `cloth_name`, `quantity`, `amount`, `order_type`) VALUES
('5bd755cfe4c84', 'Dhoti', 2, 30, 0),
('5bd755cfe4c84', 'Glove', 1, 5, 0),
('5bd7576e329c2', 'Dhoti', 5, 75, 0),
('5bd7576e329c2', 'Skirt', 2, 50, 0),
('5bd75a121e3a7', 'Dhoti', 5, 125, 1),
('5bd75a121e3a7', 'Glove', 78, 780, 1),
('5bd75a618bbf4', 'Dhoti', 4, 100, 1),
('5bd75a618bbf4', 'Glove', 47, 235, 0),
('5bd81c3192365', 'Dhoti', 2, 30, 0),
('5bd81c3192365', 'Glove', 1, 10, 1),
('5bd81c3192365', 'Jacket', 4, 240, 1),
('5bd82c55778da', 'Dhoti', 2, 50, 1),
('5bd82c55778da', 'Glove', 67, 670, 1),
('5bd8653a1c5df', 'Dhoti', 5, 125, 1),
('5bd8653a1c5df', 'Curtains', 2, 340, 1),
('5bd89830b15b0', 'Dhoti', 5, 125, 1),
('5bd94c1ddbcb7', 'Dhoti', 5, 75, 0),
('5bd951fa67ab4', 'Dhoti', 4, 60, 0),
('5bd9539858b03', 'Dhoti', 5, 75, 0),
('5bd9543772a45', 'Dhoti', 5, 75, 0),
('5bd9543772a45', 'Glove', 6, 30, 0),
('5bd954d19b47f', 'Dhoti', 3, 45, 0),
('5bd954d19b47f', 'Jacket', 8, 480, 1),
('5bd961057ef70', 'Dhoti', 25, 625, 1),
('5bd961057ef70', 'Jeans', 4, 120, 1),
('5bd961779fd4e', 'Blazer', 2, 400, 1),
('5bd963dc4c051', 'Dhoti', 2, 30, 0),
('5bd964d402c90', 'Glove', 45, 225, 0),
('5bd9656b3e428', 'Glove', 2, 10, 0),
('5bd9702740009', 'Dhoti', 25, 375, 0),
('5bd9723d62f7e', 'Dhoti', 2, 50, 1),
('5bd9723d62f7e', 'Glove', 4, 20, 0),
('5bd97410250c5', 'Dhoti', 5, 75, 0),
('5bd97410250c5', 'Glove', 6, 30, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `eid` FOREIGN KEY (`eid`) REFERENCES `appusers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_order`
--
ALTER TABLE `job_order`
  ADD CONSTRAINT `job_order_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `appusers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`job_order_id`) REFERENCES `job_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`cloth_name`) REFERENCES `clothes` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
