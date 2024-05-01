-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 09:26 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(1, 'Syed', 'Ahmed Khurshid', 'syedahmedkhurshid', '1234', 0),
(3, 'Syed', 'Ahmed Khurshid', 'syedahmed', '12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_Name`) VALUES
(11, 'Antminer Machine'),
(12, 'Bitcoin Machine'),
(13, 'Zmaster innosilicon');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `o_id` int(11) NOT NULL,
  `o_f_Name` varchar(50) NOT NULL,
  `o_l_Name` varchar(50) DEFAULT NULL,
  `o_email_address` varchar(50) DEFAULT NULL,
  `o_address` varchar(100) DEFAULT NULL,
  `o_contact` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `o_grand_total` float NOT NULL,
  `o_delivery_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`o_id`, `o_f_Name`, `o_l_Name`, `o_email_address`, `o_address`, `o_contact`, `created`, `o_grand_total`, `o_delivery_date`) VALUES
(3, '$fname', '$lname', '$email', '$address', 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `o_i_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `o_i_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_item_code` varchar(20) NOT NULL,
  `p_image` varchar(1000) NOT NULL,
  `p_description` varchar(200) NOT NULL,
  `p_price` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_item_code`, `p_image`, `p_description`, `p_price`, `c_id`, `author`) VALUES
(5, 'S9 Antminer Bitcoin Machine', 'AB01', 'assets/img/product/1.jpg', 'Model Antminer S5 from Bitmain mining SHA-256 algorithm with a maximum hashrate of 1.155Th/s for a power consumption of 590W.', 600, 11, 0),
(6, 'BAIKAL N240 Bitcoin Machine', 'AB02', 'assets/img/product/2.jpg', 'Model BK-N240 from Baikal mining 2 algorithms (CryptoNight, CryptoNight-Lite) with a maximum hashrate of 480kh/s for a power consumption of 650W.', 300, 11, 0),
(9, 'A9 Zmaster - innosilicon', 'AB03', 'assets/img/product/3.jpg', 'The World Most Powerful & Profitable Zcash Miner - A9 Equihash Zmaster\r\nHashrate: 50ksol/s +/-6%\r\nPower Consumption: 620W +/-5%(normal mode, at the wall, with 93% efficiency PSU. 25°C temperature)\r\nAm', 500, 11, 0),
(10, 'A8+ Cryptomaster Miner', 'CD01', 'assets/img/product/4.jpg', 'The A8+ CryptoMaster will lead the future market with unbeatable price and performance. 248KH/s is pretty ahead of other miners on this algorithm. Besides, the A8+ owns huge competitive advantage, suc', 800, 12, 0),
(12, 'Bitmain Antminer E3(180mh)', 'CD02', 'assets/img/product/5.jpg', 'Model Antminer E3 (180Mh) from Bitmain mining EtHash4G algorithm with a maximum hashrate of 180Mh/s for a power consumption of 800W.', 1200, 12, 0),
(13, 'Innosilicon T2 Turbo Miner', 'CD03', 'assets/img/product/6.jpg', 'Model T2 Turbo from Innosilicon mining SHA-256 algorithm with a maximum hashrate of 24Th/s for a power consumption of 1980W.', 700, 12, 0),
(14, 'AntMiner S5 ASIC Bitcoin Miner', 'EF01', 'assets/img/product/7.jpg', 'Hash rate: 1,155 Gh/s stock speed (+/- 5%)\r\nBitmain\'s 3rd generation Bitcoin mining ASIC, the BM1384\r\n590 watt power consumption at the wall (power supply sold separately)\r\nPower efficiency: 0.51 J/GH', 200, 13, 0),
(15, 'Innosilicon S11 Blake2b SiaMaster', 'EF02', 'assets/img/product/8.jpg', 'Highest Hashrate in produce Siacoin according to siamaster\r\nMuch bigger profitable than Antminer S9 and Innosilicon D9\r\nInlcude Bitmain Power supply and power cord\r\nMost Power Efficient Bitcoin Miner:', 900, 13, 0),
(38, 'insolin', 'MN78', '1635272059-news.jpg', 'sadwefewfvewfFVSEGQA3RTg', 240, 13, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`o_i_id`),
  ADD KEY `o_id` (`o_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `c_id` (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `o_i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `order` (`o_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
