-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 12:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `file_upload_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `userid` int(10) NOT NULL,
  `filename` varchar(20) NOT NULL,
  `filepath` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `updated_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`userid`, `filename`, `filepath`, `status`, `ip`, `updated_time`) VALUES
(2, 'adharauthentication_', '../uploads/adharauthentication_1_3.pdf', '', '', '2024-01-19 08:23:45.221099'),
(2, 'adharauthentication_', '../uploads/adharauthentication_1_10.pdf', '', '::1', '2024-01-19 08:33:09.495477'),
(2, 'adharauthentication_', '../uploads/adharauthentication_1_11.pdf', '', '::1', '2024-01-19 08:38:30.104921'),
(2, 'adharauthentication_', '../uploads/adharauthentication_1_12.pdf', '', '::1', '2024-01-19 08:38:49.370631'),
(2, 'adharauthentication_', '../uploads/adharauthentication_1_13.pdf', '', '::1', '2024-01-19 08:39:09.519912'),
(2, 'adharauthentication_', '../uploads/adharauthentication_1_14.pdf', '', '::1', '2024-01-19 08:42:49.825778'),
(2, 'adharauthentication_', '../uploads/adharauthentication_1_15.pdf', '', '::1', '2024-01-19 08:47:20.979036'),
(2, 'adharauthentication_', '../uploads/adharauthentication_1_16.pdf', '', '::1', '2024-01-19 08:47:38.486578'),
(2, 'adharauthentication_', '../uploads/adharauthentication_1_17.pdf', '', '::1', '2024-01-19 08:49:15.282580'),
(2, 'adharauthentication_', '../uploads/adharauthentication_1_18.pdf', '', '::1', '2024-01-19 08:50:41.203314'),
(2, 'adharauthentication_', '../uploads/adharauthentication_1_19.pdf', '', '::1', '2024-01-19 08:52:54.105286'),
(2, 'adharauthentication_', '../uploads/adharauthentication_1_20.pdf', '', '::1', '2024-01-19 09:22:07.068177'),
(3, 'scrsfinalreport_1.pd', '../uploads/scrsfinalreport_1.pdf', '', '::1', '2024-01-19 09:29:28.955155'),
(4, 'web_1920__1.pdf', '../uploads/web_1920__1.pdf', '', '::1', '2024-01-19 10:08:09.356681'),
(4, 'aadhar_duplicates.cs', '../uploads/aadhar_duplicates.csv', '', '::1', '2024-01-19 10:08:27.347036'),
(4, 'aadhar_duplicates_1.', '../uploads/aadhar_duplicates_1.csv', '', '::1', '2024-01-19 10:09:21.494360'),
(4, 'aadhar_duplicates_2.', '../uploads/aadhar_duplicates_2.csv', '', '::1', '2024-01-19 10:10:09.717050'),
(2, 'Array', '', '.Enter a Valid  File Type.', '::1', '2024-01-19 11:15:39.551573'),
(2, 'Array', '', '.Enter a Valid  File Type.', '::1', '2024-01-19 11:15:44.281965'),
(2, 'Array', '', '.Enter a Valid  File Type.', '::1', '2024-01-19 11:15:51.147924'),
(2, 'Array', '', '.Enter a Valid  File Type.', '::1', '2024-01-19 11:16:10.804753'),
(2, '', '', '.Enter a Valid  File Type.', '::1', '2024-01-19 11:16:57.936466'),
(2, '', '', '.Enter a Valid  File Type.', '::1', '2024-01-19 11:17:05.540602'),
(2, 'aadhar_duplicates.cs', '', '.Enter a Valid  File Type.', '::1', '2024-01-19 11:18:02.220151'),
(2, 'Web 1920 – 1.pdf', '', '', '::1', '2024-01-19 11:22:01.935584'),
(2, 'Web 1920 – 1.pdf', '', 'File size exceeds limit.', '::1', '2024-01-19 11:23:19.557262'),
(2, 'Web 1920 – 1.pdf', '', '.File size exceeds limit..', '::1', '2024-01-19 11:25:35.049232'),
(2, 'Web 1920 – 1.pdf', '', '.File size exceeds limit..', '::1', '2024-01-19 11:26:18.944766'),
(2, 'Web 1920 – 1.pdf', '', '.File size exceeds limit..', '::1', '2024-01-19 11:26:40.341361'),
(2, 'Web 1920 – 1.pdf', '', '.File size exceeds limit..', '::1', '2024-01-19 11:35:20.554345');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `userid` int(10) NOT NULL,
  `filename` varchar(20) NOT NULL,
  `filepath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`userid`, `filename`, `filepath`) VALUES
(2, 'adharauthentication_', '../uploads/adharauthentication_1_20.pdf'),
(3, 'scrsfinalreport_1.pd', '../uploads/scrsfinalreport_1.pdf'),
(4, 'aadhar_duplicates_2.', '../uploads/aadhar_duplicates_2.csv');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `registered_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `username`, `password`, `registered_time`) VALUES
(1, 'try', 'rtytr', '$2y$10$/MVeUJmQ/raN0Td79z2IkehglYD2PBCzFl9QrDsI7KHBpDdh3j/d.', '2024-01-19 04:32:27.000000'),
(2, 'Anuja N B', 'anuja123', '$2y$10$Bc8KbGVA8TKV1lqvlRNDAOtIszE3wlczVrIUUZDDA67ycuvkjzUxW', '2024-01-19 04:33:40.000000'),
(3, 'Anuja', 'asf45', '$2y$10$zWdBS52DGu9oFz/cVARzGu0F.tCSUZkZmdKCfnHuyEirwEDzYdaTm', '2024-01-19 09:29:01.000000'),
(4, 'anuja', 'anuja1234', '$2y$10$CUursZg/6yo3gLzAIbOqjeJ7./.1cDpIWUEOWSwgqeftVjIjxHKDy', '2024-01-19 10:07:03.000000'),
(5, 'rrrrrfghgfhgh', 'anuja12345', '$2y$10$fRXiT7RLBbI5v17bhygQ3e1aCZn4AQYINHK8q6f9dfsbBmlDhWkV2', '2024-01-19 10:53:10.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD KEY `userid1_fk` (`userid`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD KEY `userid_fk` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `userid1_fk` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `userid_fk` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
