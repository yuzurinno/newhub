-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2020 at 05:32 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hact`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `patient_code` varchar(45) DEFAULT NULL,
  `date_started` varchar(45) DEFAULT NULL,
  `regimen` varchar(45) DEFAULT NULL,
  `refill` varchar(45) DEFAULT NULL,
  `cd4` varchar(100) DEFAULT NULL,
  `vl_date` varchar(45) DEFAULT NULL,
  `side_effect` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `patient_code`, `date_started`, `regimen`, `refill`, `cd4`, `vl_date`, `side_effect`) VALUES
(1, 'TGH-016-01-01-GAD', '09-01-2020', 'AS', 'AS', '', '', ''),
(2, 'SAFSFD', '09-01-2020', 'AS', 'AS', '', '', ''),
(3, 'HFHGHF', '08-12-2016', 'QW', 'WE', '', '', ''),
(4, 'HFHGHF', '08-12-2016', 'QW', 'WE', '', '', ''),
(5, 'SSDFDF', '08-12-2016', 'CX', 'XC', '', '', ''),
(6, 'ASAS', 'AS', 'AS', 'AS', '', '', ''),
(7, 'SD', 'DF', 'DF', 'DF', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
