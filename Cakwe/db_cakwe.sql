-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2025 at 10:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cakwe`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `email`, `password`, `created_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$zY5wVLRt339BJEo7KEKpRuY6gK8VqA/yS2E61ZQ/19qF2S9o3NntO', '2025-01-21 05:31:47'),
(4, 'agung@gmail.com', '$2y$10$5UZdJkMmubENVYRGackh3.OMSmd5hZaiLQg163kciR8znQG4p8a6W', '2025-01-21 06:15:07'),
(6, 'yuda@gmail.com', '$2y$10$/y6QXShTmq.bnimKL9AI/e31p2gIXSyVZOsfl25sBGAjDkXnp0hoG', '2025-01-21 06:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_detail`
--

CREATE TABLE `tb_user_detail` (
  `user_detail_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `profile_picture` blob DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user_detail`
--

INSERT INTO `tb_user_detail` (`user_detail_id`, `full_name`, `bio`, `profile_picture`, `user_id`) VALUES
(1, 'admin_By59', NULL, NULL, 1),
(2, 'agung_JcZB', NULL, NULL, 4),
(3, 'yuda_aTaW', 'Si Ganteng Tea', NULL, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email_unique` (`password`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_user_detail`
--
ALTER TABLE `tb_user_detail`
  ADD PRIMARY KEY (`user_detail_id`),
  ADD KEY `user_detail_to_users` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user_detail`
--
ALTER TABLE `tb_user_detail`
  MODIFY `user_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_user_detail`
--
ALTER TABLE `tb_user_detail`
  ADD CONSTRAINT `user_detail_to_users` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
