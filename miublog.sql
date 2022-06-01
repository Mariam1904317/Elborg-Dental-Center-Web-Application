-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 01:49 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miublog`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `aID` int(50) NOT NULL,
  `AName` varchar(50) NOT NULL,
  `ADATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `img`, `job`) VALUES
(1, 'Dr.Heba magdy', 'heba@gmail.com', 'doc2.jpg', 'Dentist whith a high degree'),
(3, 'Dr. mohamed abdelhakim', 'mohamed11@gmail.com', 'doc1.jpg', 'Dentist whith a high degree'),
(6, 'mostafa', 'Mostafa@gmail.com', 'mostafa.jpg', 'Dentist');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` int(12) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `user_type` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `photo`, `password`, `user_type`) VALUES
(1, 'salma', 'salma@yahoo.com', 1020666323, 'doc1.jpg', '$2y$10$Nb9cBg6Zkk7gKu5IQjeB5.YDqu/G41zQvwcORwC2iSWY23vwiWCz.', 0),
(2, 'karam', 'youssef.zack1@yahoo.com', 1020333665, '', '$2y$10$EOjB.H4JYC50jyvtAHlHh.Yh7EU5Kf/b8ocxP7/W01smAaEEWq3zq', 0),
(3, 'mariam', 'mariam@gmail.com', 0, '', '$2y$10$ejslMfgTr.HTRqAYWwcoHujECfkLEwgXgwcQbyjI.DyGX38Oa8pZ.', 0),
(4, 'koko', 'karam1@email.com', 1010101010, '', '$2y$10$GYU4YmVeGND4WXd31FGNEO4ufDxBQVRp4ei2iEDmRoPF73WurACje', 1),
(5, 'koko', 'karam12@email.com', 0, '', '$2y$10$VMfraGRbc/hS03.s2z4ub.s8ahaBmuJWF.z067.IQl8CUZNRtYm8O', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
