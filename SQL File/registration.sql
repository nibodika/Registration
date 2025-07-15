-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2025 at 11:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `marriage`
--

CREATE TABLE `marriage` (
  `id` int(11) NOT NULL,
  `husband_first_name` varchar(100) DEFAULT NULL,
  `husband_last_name` varchar(100) DEFAULT NULL,
  `husband_dob` date DEFAULT NULL,
  `husband_email` varchar(100) DEFAULT NULL,
  `husband_phone` varchar(15) DEFAULT NULL,
  `husband_address` text DEFAULT NULL,
  `wife_first_name` varchar(100) DEFAULT NULL,
  `wife_last_name` varchar(100) DEFAULT NULL,
  `wife_dob` date DEFAULT NULL,
  `wife_email` varchar(100) DEFAULT NULL,
  `wife_phone` varchar(15) DEFAULT NULL,
  `wife_address` text DEFAULT NULL,
  `marriage_date` date DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `witness1_full_name` varchar(100) DEFAULT NULL,
  `witness2_full_name` varchar(100) DEFAULT NULL,
  `submission_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marriage`
--

INSERT INTO `marriage` (`id`, `husband_first_name`, `husband_last_name`, `husband_dob`, `husband_email`, `husband_phone`, `husband_address`, `wife_first_name`, `wife_last_name`, `wife_dob`, `wife_email`, `wife_phone`, `wife_address`, `marriage_date`, `location`, `witness1_full_name`, `witness2_full_name`, `submission_date`) VALUES
(3, 'Ram', 'Yadav', '2002-06-15', 'ram@gmail.com', '1234567890', 'Lucknow', 'Talyor', 'Swift', '2004-08-15', 'talyor123@gmail.com', '1235804567', 'Cicago', '2025-07-09', 'Kathmandu', 'Hari', 'Jiya', '2025-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `current_address` text DEFAULT NULL,
  `destination_address` text DEFAULT NULL,
  `reason_for_migration` text DEFAULT NULL,
  `submission_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`id`, `full_name`, `dob`, `gender`, `nationality`, `current_address`, `destination_address`, `reason_for_migration`, `submission_date`) VALUES
(2, 'Nibodika Chaudhary', '2024-06-15', 'female', 'Nepali', 'Nepalgunj', 'Destination', 'For higher study and job opportunities', '2025-07-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marriage`
--
ALTER TABLE `marriage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marriage`
--
ALTER TABLE `marriage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migration`
--
ALTER TABLE `migration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
