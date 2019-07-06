-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2018 at 12:48 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `empty_check` ()  SELECT drug_id,drug_name
FROM drug 
WHERE quantity=0$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` tinyint(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `date`) VALUES
(1, 'admin', 'admin', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `cashier_id` tinyint(5) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `postal_address` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`cashier_id`, `first_name`, `last_name`, `staff_id`, `postal_address`, `phone`, `email`, `username`, `password`, `date`) VALUES
(4, 'Jesse', 'James', 'S01', 'Alb', '936473422', 'jesjames@gmail.com', 'Jessie', 'jesse', '2013-11-23 12:54:49'),
(5, 'Jason', 'Bourne', 'S02', 'Manhattan', '9364278346', 'jasonbourne@gmail.com', 'Jason', 'Jason', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(25) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_n0` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `age`, `sex`, `address`, `phone_n0`) VALUES
(1, 'Preetham DP', 19, 'Male', 'Channapatna', '9884599912'),
(2, 'Sriram SR', 19, 'Male', 'Shimogga', '9986854321'),
(3, 'Manjunath SS', 19, 'Male', 'Matagsira', '9882453149');

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `drug_id` tinyint(5) NOT NULL,
  `drug_name` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`drug_id`, `drug_name`, `category`, `description`, `cost`, `quantity`) VALUES
(6, 'Calpol 650', 'Paracetamol', 'Malaria', 12, 461),
(10, 'Valium', 'Diazapam', 'Psychatry', 40, 115),
(11, 'Eno', 'Antacid', 'Digestive', 4, 0),
(13, 'Crockin', 'Analgesic', 'Pain Killer', 10, 40);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_entry`
--

CREATE TABLE `invoice_entry` (
  `cus_id_fk` int(11) NOT NULL,
  `dr_id_fk` tinyint(5) NOT NULL,
  `qty` int(11) NOT NULL,
  `date_in` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_entry`
--

INSERT INTO `invoice_entry` (`cus_id_fk`, `dr_id_fk`, `qty`, `date_in`) VALUES
(2, 6, 19, '2018-11-26'),
(2, 10, 5, '2018-11-26'),
(3, 6, 20, '2018-11-26'),
(3, 13, 5, '2018-11-26');

--
-- Triggers `invoice_entry`
--
DELIMITER $$
CREATE TRIGGER `trigger_01` AFTER INSERT ON `invoice_entry` FOR EACH ROW UPDATE drug
SET quantity=quantity-NEW.qty
WHERE drug_id=NEW.dr_id_fk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` tinyint(5) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `postal_address` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `first_name`, `last_name`, `staff_id`, `postal_address`, `phone`, `email`, `username`, `password`, `date`) VALUES
(3, 'Jackie', 'Chan', 'M01', 'Beijing', '9654539421', 'kungfu_chan@yahoo.co', 'Jackie', 'Jackie', '2018-11-22 01:24:18'),
(4, 'Bruce', 'Banner', 'M02', 'New York', '8134359212', 'bbanner@gmail.com', 'Bruce', 'Bruce', '2018-11-23 11:27:34'),
(5, 'Thor', 'Odinson', 'M03', 'Asgard', '9886025945', 'thorofasgard@gmail.c', 'Thor', 'Thor', '2018-11-23 11:28:48'),
(9, 'Darth', 'Vader', 'M04', 'Empire', '9124329852', 'dvader@gmail.com', 'Darth', 'Darth', '2018-11-26 16:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `pharmacist_id` tinyint(5) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `postal_address` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`pharmacist_id`, `first_name`, `last_name`, `staff_id`, `postal_address`, `phone`, `email`, `username`, `password`, `date`) VALUES
(2, 'John', 'Wick', 'P01', 'Mysuru', '9994234242', 'johnwickcontl@gmail.com', 'John', 'GunFu', '2018-11-22 14:22:03'),
(3, 'Jane', 'Doe', 'P02', 'Munchkin', '8204665921', 'jane23@gmail.com', 'Jane', 'Jane', '2018-11-23 11:21:59'),
(4, 'Matt', 'Black', 'P03', 'Nagpur', '8201793458', 'black_m@gmail.com', 'Matt', 'Matt', '2018-11-23 11:23:09'),
(5, 'Rick', 'Padretti', 'P04', 'Pensylvania', '9883645921', 'padrettirick@gmail.com', 'Rick', 'Rick', '2018-11-23 11:24:44'),
(6, 'Yogesh', 'CL', 'P05', 'Bengaluru', '9880248756', 'clyogesh5@gmail.com', 'Yogi', 'Yogi', '2018-11-24 23:11:42'),
(7, 'Amarnath', 'Hugar', 'P06', 'Hubli', '72012345603', 'amarhug@gmail.com', 'Amar', 'Amar', '2018-11-24 23:13:29'),
(8, 'Mii', 'Cho', 'P07', 'Beijing', '9881230982', 'miicho@gmail.com', 'Mii', 'Mii', '2018-11-24 23:14:37'),
(9, 'Carla', 'Gujino', 'P07', 'salem', '9002187234', 'mrshill@gmail.com', 'Carla', 'Carla', '2018-11-24 23:16:02'),
(10, 'Johnny', 'Bravo', 'P07', 'CNetwork', '8245376543', 'bjohnny@gmail.com', 'Johnny', 'Johnny', '2018-11-24 23:30:11'),
(11, 'Ben', 'Mendhlson', 'P08', 'Chicago', '9888845632', 'menben@gmail.com', 'Ben', 'Ben', '2018-11-24 23:31:11'),
(12, 'Adonis', 'Creed', 'P09', 'Philly', '8264598634', 'acreed@gmail.com', 'Creed', 'Creed', '2018-11-24 23:32:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`cashier_id`),
  ADD UNIQUE KEY `staff_id` (`staff_id`,`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`drug_id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `invoice_entry`
--
ALTER TABLE `invoice_entry`
  ADD PRIMARY KEY (`cus_id_fk`,`dr_id_fk`),
  ADD KEY `drug_fk` (`dr_id_fk`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`),
  ADD UNIQUE KEY `staff_id` (`staff_id`,`username`),
  ADD UNIQUE KEY `staff_id_2` (`staff_id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`pharmacist_id`),
  ADD UNIQUE KEY `staff_id` (`staff_id`,`username`),
  ADD UNIQUE KEY `staff_id_2` (`staff_id`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `cashier_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drug`
--
ALTER TABLE `drug`
  MODIFY `drug_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `pharmacist_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_entry`
--
ALTER TABLE `invoice_entry`
  ADD CONSTRAINT `customer_fk` FOREIGN KEY (`cus_id_fk`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `drug_fk` FOREIGN KEY (`dr_id_fk`) REFERENCES `drug` (`drug_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
