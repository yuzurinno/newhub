-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2020 at 02:35 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

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
-- Table structure for table `test_foreach`
--

CREATE TABLE `test_foreach` (
  `id` int(11) NOT NULL,
  `drugs_name` varchar(255) NOT NULL,
  `no_of_pill` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_foreach`
--

INSERT INTO `test_foreach` (`id`, `drugs_name`, `no_of_pill`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(1, 'I', 1, 'a', 1, '2020-10-27 01:34:08', '2020-10-27 01:35:29'),
(2, 'Love', 2, 's', 1, '2020-10-27 01:34:08', '2020-10-27 01:35:34'),
(3, 'You', 3, 'd', 1, '2020-10-27 01:34:08', '2020-10-27 01:35:39'),
(4, 'Gia', 4, 'e', 1, '2020-10-27 01:34:08', '2020-10-27 01:35:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test_foreach`
--
ALTER TABLE `test_foreach`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test_foreach`
--
ALTER TABLE `test_foreach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
