-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 05:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `redcross`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(1, 'Admin User', 'admin@gmail.com', 'admin123', 8888888888);

-- --------------------------------------------------------

--
-- Table structure for table `city_data`
--

CREATE TABLE `city_data` (
  `id` int(11) NOT NULL,
  `state` varchar(200) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city_data`
--

INSERT INTO `city_data` (`id`, `state`, `city_name`, `address`, `submission_date`) VALUES
(3, 'Bihar', 'sasaram', 'boaring road', '2024-04-21 05:37:24'),
(4, 'Nagaland', 'Buxar', 'Sumeshwar Asthan jail road ,buxar', '2024-04-21 05:53:08'),
(5, 'Goa', 'goa', 'Sumeshwar Asthan jail road ,buxar', '2024-04-21 06:05:00'),
(6, 'Odisha', 'khorda', 'near gita autonmous college', '2024-04-21 07:08:52'),
(7, 'Odisha', 'retang', 'anant  villa', '2024-04-22 11:50:39'),
(8, 'Uttar Pradesh', 'varnsi', 'Near Bhu back gate', '2024-04-23 05:49:52'),
(9, 'Goa', 'goa', 'Sumeshwar Asthan jail road ,buxar', '2024-04-23 05:50:08'),
(10, 'Gujarat', 'Surat', 'Nean main station', '2024-04-23 05:50:48'),
(11, 'Odisha', 'jatni', 'Sumeshwar Asthan jail road ,buxar', '2024-04-23 06:10:01'),
(12, 'Odisha', 'patia', 'kiit college', '2024-04-23 06:23:25'),
(13, 'Odisha', 'patia', 'kiit college near back', '2024-04-23 06:23:45'),
(14, 'Arunachal Pradesh', 'bhubaneswar', 'Gita autonomous college ,bhubaneswar', '2024-04-23 06:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `query` text NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `submission_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `query`, `mobile`, `submission_datetime`) VALUES
(2, 'id', 'heroph57@gmail.com', 'gett login ', '06299323290', '2024-04-08 08:05:22'),
(3, 'sandeep kumar', 'singhsandeepkumar008@gmail.com', 'my game', '+916299435686', '2024-04-08 08:12:11'),
(4, 'Sandeep Kumar Singh', 'singhsandeepkumar008@gmail.com', 'nh h', '+916299435686', '2024-04-08 08:12:43'),
(5, 'id', 'heroph57@gmail.com', 'njbj', '06299323290', '2024-04-08 08:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `no_units` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `donor_id`, `blood_group`, `no_units`, `location`, `disease`, `status`) VALUES
(1030, 112, 'A', 6, 'bhubaneswar', 'no', 0),
(1031, 112, 'B+', 1, 'buxar', '', 1),
(1032, 112, 'O-', 5, 'bhubaneswar', 'nothing\r\n', 0),
(1033, 112, 'O+', 5, 'bhubaneswar', 'nothing', 1),
(1034, 115, 'O+', 2, 'bhubaneswar', 'nothing', 1),
(1035, 1, 'O+', 1, 'bhubaneswar', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(102, 'Hemant Kumar', 'hemant@gmail.com', 'hkm123', 8888888899),
(104, 'Donor Name 1', 'donor1@gmail.com', '12345', 9878584516),
(108, 'Donor Name 3', 'donor3@gmail.com', '12345', 9999999999),
(109, 'Donor Name 4', 'donor4@gmail.com', '12345', 8888888888),
(111, 'Sandeep Kumar Singh', 'singhsandeepkumar008@gmail.com', 'Sky4381', 916299435686),
(112, 'id', 'heroph57@gmail.com', '12', 6299323290),
(113, 'Sandeep jj', 'sunnyyadavanshi0001@gmail.com', '12', 6299323290),
(114, 'Sandeep Kumar Kumar', 'sandeep_2007032@gita.edu.in', '12', 6299435686),
(115, 'sourabh', 'sourabhdewedi789@gmail.com', '12', 6299435686);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `password`, `mobile`, `city`) VALUES
(508, 'sandeep kumar', 'singhsandeepkumar008@gmail.com', 'Sky4381', 916299435686, ''),
(509, 'Sandeep Kumar Singh', 'heroph57@gmail.com', 'vggv', 916299435686, 'Buxar'),
(510, 'ajay m', 'sourabhdewedi789@gmail.com', '12', 916299435686, 'Buxar'),
(511, 'Sandeep Kumar Singh', 'singhsandeepkumar008@gmail.com', '12', 6299435686, 'Buxar');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `no_units` int(11) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `city_name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `patient_id`, `no_units`, `blood_group`, `city_name`, `address`, `reason`, `status`) VALUES
(1112, 1, 1, 'B', 'Buxar', 'Sumeshwar Asthan jail road ,buxar', 'mj', 0),
(1113, 511, 1, 'B+', 'Buxar', 'Sumeshwar Asthan jail road ,buxar', 'njjn', 1),
(1114, 511, 1, 'B-', 'Buxar', 'Sumeshwar Asthan jail road ,buxar', 'bjuj', 2),
(1115, 115, 1, 'O+', 'bhubaneswar', 'Gita autonomous college ,bhubaneswar', '', 0),
(1116, 1, 5, 'O-', 'retang', 'Sumeshwar Asthan jail road ,buxar', 'a', 0),
(1117, 511, 2, 'A', 'Buxar', 'Sumeshwar Asthan jail road ,buxar', 'ugernt', 1),
(1118, 511, 1, 'AB-', 'Buxar', 'Sumeshwar Asthan jail road ,buxar', 'need', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `sno` int(11) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`sno`, `blood_group`, `stock`) VALUES
(1, 'A', 3),
(2, 'A+', 11),
(3, 'A-', 28),
(4, 'B', 30),
(5, 'B+', 15),
(6, 'B-', 0),
(7, 'AB+', 15),
(8, 'AB-', 0),
(9, 'O+', 30),
(10, 'O-', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_data`
--
ALTER TABLE `city_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `city_data`
--
ALTER TABLE `city_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1036;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1119;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
