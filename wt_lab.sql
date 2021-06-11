-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2021 at 08:29 PM
-- Server version: 10.3.27-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `binimoyh_wt_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `b_group` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `last_donation` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `b_group`, `dob`, `last_donation`, `phone`) VALUES
(1, 'Munna Khandakar', 'O+', '16/01/1998', '30/10/2020', '01794807577'),
(2, 'Afifa Marowa Anha', 'A+', '14/04/1999', 'Never Given', '01794807577'),
(5, 'Faozia Kabir', 'A-', '18/12/2000', 'Never Given', '01794807577'),
(62, 'musaddik', 'O+', '22.12.2003', '15.6.2020', '01234567891'),
(57, 'MUNIA SARWAT KHAN', 'A-', '10/10/1999', '10/12/2009', '+8801905069807'),
(61, 'Imamul Huda', 'AB+', '12/03/1998', 'Never', '+8801905-69807'),
(44, 'MD. RAGHIB ASEB RANA', 'B+', '12/01/1998', '12/10/2017', '+8801905069807'),
(24, 'Afifa Mithin', 'A+', '14/04/1999', '12/12/2020', '01794807577');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `dept` varchar(255) DEFAULT NULL,
  `faculty` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `roll`, `dept`, `faculty`) VALUES
(1, '18511075', 'ICT', 'FST'),
(2, '18511057', 'ICT', 'FST'),
(5, '18511066', 'ICT', 'FST'),
(6, '18511060', 'ICT', 'FST'),
(7, '16511028', 'ICT', 'FST'),
(8, '18511002', 'ICT', 'FST'),
(9, '18511003', 'ICT', 'FST'),
(10, '18511006', 'ICT', 'FST'),
(11, '18511007', 'ICT', 'FST'),
(12, '18511008', 'ICT', 'FST'),
(13, '18511006', 'ICT', 'FST'),
(14, '18511006', 'ICT', 'FST'),
(15, '18511006', 'ICT', 'FST'),
(16, '18511009', 'ICT', 'FST'),
(17, '18511010', 'ICT', 'FST'),
(18, '18511011', 'ICT', 'FST'),
(19, '18511012', 'ICT', 'FST'),
(20, '185110013', 'ICT', 'FST'),
(21, '18511054', 'ICT', 'FST'),
(22, '18511055', 'ICT', 'FST'),
(23, '18511058', 'ICT', 'FST'),
(24, '18511056 ', 'ICT', 'FST'),
(25, '18511059', 'ICT', 'FST'),
(26, '18511061', 'ICT', 'FST'),
(27, '18511062', 'ICT', 'FST'),
(28, '18511064', 'ICT', 'FST'),
(29, '18511065', 'ICT', 'FST'),
(30, '18511069', 'ICT', 'FST'),
(31, '18511070', 'ICT', 'FST'),
(32, '18511071', 'ICT', 'FST'),
(33, '18511072', 'ICT', 'FST'),
(34, '18511073', 'ICT', 'FST'),
(35, '18511076', 'ICT', 'FST'),
(36, '18511078', 'ICT', 'FST'),
(37, '18511079', 'ICT', 'FST'),
(38, '18511080', 'ICT', 'FST'),
(39, '18511081', 'ICT', 'FST'),
(40, '18511082', 'ICT', 'FST'),
(41, '18511083', 'ICT', 'FST'),
(42, '18511084', 'ICT', 'FST'),
(43, '18511085', 'ICT', 'FST'),
(44, '18511086', 'ICT', 'FST'),
(45, '18511087', 'ICT', 'FST'),
(46, '18511088', 'ICT', 'FST'),
(47, '18511089', 'ICT', 'FST'),
(48, '18511090', 'ICT', 'FST'),
(49, '18511091', 'ICT', 'FST'),
(50, '18511093', 'ICT', 'FST'),
(51, '18511094', 'ICT', 'FST'),
(52, '18511095', 'ICT', 'FST'),
(53, '18511096', 'ICT', 'FST'),
(54, '18511095', 'ICT', 'FST'),
(55, '18511095', 'ICT', 'FST'),
(56, '18511095', 'ICT', 'FST'),
(57, '18511097', 'ICT', 'FST'),
(58, '18511099', 'ICT', 'FST'),
(59, '18511100', 'ICT', 'FST'),
(60, '18511103', 'ICT', 'FST'),
(61, '18511107', 'ICT', 'FST'),
(62, '18511110', 'ICT', 'FST'),
(63, '18511111', 'ICT', 'FST');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pass`) VALUES
(1, 'munnashisad@gmail.com', 'f54f821490ab781deef4012614ae85736074d923081fa42f69ca6708d4ad883cb21fea88523ef625d403896380c508c3bbad7f49d7f480ecc06d0fad1b8562ec'),
(2, 'anha@gmail.com', 'bd877cf94f1a63123c8bec5abdd126b988361989e473efb80fc6cd5b5f21a0b83850212c94b50a7018538aa741ee5da65610b4da6c18e42edaea07e1be5629cf'),
(5, 'faozia@gmail.com', 'bd877cf94f1a63123c8bec5abdd126b988361989e473efb80fc6cd5b5f21a0b83850212c94b50a7018538aa741ee5da65610b4da6c18e42edaea07e1be5629cf'),
(24, 'mithin@gmail.com', 'bd877cf94f1a63123c8bec5abdd126b988361989e473efb80fc6cd5b5f21a0b83850212c94b50a7018538aa741ee5da65610b4da6c18e42edaea07e1be5629cf'),
(44, 'ragib@gmail.com', 'bd877cf94f1a63123c8bec5abdd126b988361989e473efb80fc6cd5b5f21a0b83850212c94b50a7018538aa741ee5da65610b4da6c18e42edaea07e1be5629cf'),
(57, 'munia@gmail.com', 'bd877cf94f1a63123c8bec5abdd126b988361989e473efb80fc6cd5b5f21a0b83850212c94b50a7018538aa741ee5da65610b4da6c18e42edaea07e1be5629cf'),
(61, 'huda@gmail.com', 'bd877cf94f1a63123c8bec5abdd126b988361989e473efb80fc6cd5b5f21a0b83850212c94b50a7018538aa741ee5da65610b4da6c18e42edaea07e1be5629cf'),
(62, 'musa@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`,`roll`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
