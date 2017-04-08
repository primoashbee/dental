-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2016 at 05:51 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dentist`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `isAdmin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `created_at`, `updated_at`, `isAdmin`) VALUES
(9, 'asdadadd@yahoo.com', '1234', '2016-07-21 09:04:39', '2016-08-09 00:26:49', 'FALSE'),
(10, 'admin@dental.com', '1234', '2016-07-21 09:08:47', '2016-07-21 09:09:15', 'TRUE'),
(11, 'ashbee.morgado@icloud.com', '1234', '2016-07-21 09:30:20', '0000-00-00 00:00:00', 'FALSE'),
(15, 'sherlockhomes@yahoo.com', '1234', '2016-08-16 00:29:00', '0000-00-00 00:00:00', 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `lname`, `fname`, `age`, `birthday`, `gender`, `email`) VALUES
(5, 'Lastname', 'Firstname', '904', '2000-01-01', 'Female', 'asdadadd@yahoo.com'),
(6, 'Morgado', 'Ashbee', '2', '2014-02-05', 'Female', 'ashbee.morgado@icloud.com'),
(8, 'Holmes', 'Sherlock', '', '', '', 'sherlockhomes@yahoo.com');

-- --------------------------------------------------------

--
-- Stand-in structure for view `qryinformation`
--
CREATE TABLE `qryinformation` (
`username` varchar(255)
,`password` varchar(255)
,`isAdmin` varchar(255)
,`acc_id` int(11)
,`id` int(11)
,`lname` varchar(255)
,`fname` varchar(255)
,`age` varchar(255)
,`birthday` varchar(255)
,`gender` varchar(255)
,`email` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `qrymysummary`
--
CREATE TABLE `qrymysummary` (
`id` int(11)
,`age` varchar(255)
,`birthday` varchar(255)
,`email` varchar(255)
,`fname` varchar(255)
,`lname` varchar(255)
,`gender` varchar(255)
,`service` varchar(255)
,`description` varchar(255)
,`r_date` varchar(255)
,`r_time` varchar(255)
,`reserved_at` timestamp
,`isApproved` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `qryreservation`
--
CREATE TABLE `qryreservation` (
`id` int(11)
,`age` varchar(255)
,`birthday` varchar(255)
,`email` varchar(255)
,`fname` varchar(255)
,`lname` varchar(255)
,`gender` varchar(255)
,`service` varchar(255)
,`description` varchar(255)
,`r_date` varchar(255)
,`r_time` varchar(255)
,`reserved_at` timestamp
,`isApproved` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(2555) DEFAULT NULL,
  `service_id` varchar(255) DEFAULT NULL,
  `reserved_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `r_date` varchar(255) DEFAULT NULL,
  `r_time` varchar(255) DEFAULT NULL,
  `isApproved` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `customer_id`, `service_id`, `reserved_at`, `r_date`, `r_time`, `isApproved`) VALUES
(22, '6', '1', '2016-08-16 00:31:48', '2016-08-08', '10:00AM', 'FALSE'),
(23, '6', '3', '2016-08-16 00:31:48', '2016-08-08', '10:00AM', 'FALSE'),
(24, '6', '2', '2016-08-16 00:31:48', '2016-08-08', '10:00AM', 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `isDeleted` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `description`, `isDeleted`) VALUES
(1, '123', 'Hello World', 'false'),
(2, 'Forever', 'Meron Pala', 'FALSE'),
(3, 'asd', 'asdasd', 'FALSE');

-- --------------------------------------------------------

--
-- Structure for view `qryinformation`
--
DROP TABLE IF EXISTS `qryinformation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qryinformation`  AS  select `a`.`username` AS `username`,`a`.`password` AS `password`,`a`.`isAdmin` AS `isAdmin`,`c`.`id` AS `acc_id`,`c`.`id` AS `id`,`c`.`lname` AS `lname`,`c`.`fname` AS `fname`,`c`.`age` AS `age`,`c`.`birthday` AS `birthday`,`c`.`gender` AS `gender`,`c`.`email` AS `email` from (`accounts` `a` left join `customers` `c` on((`a`.`username` = `c`.`email`))) ;

-- --------------------------------------------------------

--
-- Structure for view `qrymysummary`
--
DROP TABLE IF EXISTS `qrymysummary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qrymysummary`  AS  select `qryreservation`.`id` AS `id`,`qryreservation`.`age` AS `age`,`qryreservation`.`birthday` AS `birthday`,`qryreservation`.`email` AS `email`,`qryreservation`.`fname` AS `fname`,`qryreservation`.`lname` AS `lname`,`qryreservation`.`gender` AS `gender`,`qryreservation`.`service` AS `service`,`qryreservation`.`description` AS `description`,`qryreservation`.`r_date` AS `r_date`,`qryreservation`.`r_time` AS `r_time`,`qryreservation`.`reserved_at` AS `reserved_at`,`qryreservation`.`isApproved` AS `isApproved` from `qryreservation` group by `qryreservation`.`r_date` ;

-- --------------------------------------------------------

--
-- Structure for view `qryreservation`
--
DROP TABLE IF EXISTS `qryreservation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qryreservation`  AS  select `customers`.`id` AS `id`,`customers`.`age` AS `age`,`customers`.`birthday` AS `birthday`,`customers`.`email` AS `email`,`customers`.`fname` AS `fname`,`customers`.`lname` AS `lname`,`customers`.`gender` AS `gender`,`services`.`service` AS `service`,`services`.`description` AS `description`,`reservation`.`r_date` AS `r_date`,`reservation`.`r_time` AS `r_time`,`reservation`.`reserved_at` AS `reserved_at`,`reservation`.`isApproved` AS `isApproved` from ((`customers` join `reservation` on((`customers`.`id` = `reservation`.`customer_id`))) join `services` on((`reservation`.`service_id` = `services`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD KEY `id` (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
