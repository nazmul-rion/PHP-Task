-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 04:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secureaccessdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `userfile`
--

CREATE TABLE `userfile` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `filedescription` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userfile`
--

INSERT INTO `userfile` (`id`, `userid`, `filedescription`, `path`) VALUES
(1, 1, 'My Resume', '197714S M Nazmul Islam Resume.pdf'),
(3, 2, 'A thesis Paper', '261683Bangladesh-lp.PDF'),
(12, 1, 'PHP Task', '149175Task details for the post of PHP developer.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `saltPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `saltPass`) VALUES
(1, 'Nazmul', 'nazmulrion16@gmail.com', '$2y$10$47Ee4dnPtJfMuH4kZ3wvIevhI0iE5s3Tzxzp/pfmo45o8lZHr4q3W', 'f90f5617050f5fbf1cb9df20b11baa77'),
(2, 'Naimul', 'naimulshoad@gmail.com', '$2y$10$FXk89PDJQDYMxmMXZ.72m.envG4LuN0m.C8h42LYuqhDoOfTOe/Ou', 'e59c5967b2cec2799fd9a0008413d071');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userfile`
--
ALTER TABLE `userfile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreignkey` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userfile`
--
ALTER TABLE `userfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userfile`
--
ALTER TABLE `userfile`
  ADD CONSTRAINT `Foreignkey` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
