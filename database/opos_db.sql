-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 12:14 PM
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
-- Database: `opos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(30) NOT NULL,
  `client_ip` varchar(20) NOT NULL,
  `user_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`) VALUES
(1, 'Cay'),
(2, 'Kahve'),
(3, 'Oralet');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `DateO` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL,
  `Odate` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img_path` text NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `name`, `img_path`, `category_id`) VALUES
(36, 'Oralet_Portakal', '1708654740_1708254540_Screenshot 2024-02-17 102844.png', 3),
(37, 'CAY', '1708670280_1676512620_Sicilian.jpg', 1),
(38, 'Oralet_kivi', '1708670340_cover_img.png', 3),
(39, 'Latte', '1708670340_1708254600_Latte-Macchiato.jpg', 2),
(40, 'Espresso', '1708670340_1708254600_Espresso_0.webp', 2),
(41, 'Türk_Kahve', '1708673280_95a8aa9c707f72fa24f67c3588a228f8.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `address`) VALUES
(1, 'ÇayKapısı', 'caku@karatekin.ed.tr', '009001122', '1708530120_1708432020_1708254120_pexels-hasan-albari-1493080.jpg', '  ÇAKÜ Bilgi işlim');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', '$2y$10$efDvenHYJ5Fu/xxt1ANbXuRx5/TuzNs/s4k6keUiiFvr2ueE0GmrG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`) VALUES
(1, 'Mark', 'Cooper', 'mcooper@mail.com', '$2y$10$Z.LYi0zrDsrCYIgU1e7yCOkn1lbREGbUcIpSvgkB0OPapDfp7Xc0a', '0912345698', 'Sample Address'),
(2, 'mahmoud', 'hawwa', 'mahmoud@sad', '$2y$10$wNOzVCL023xFAj56njAD7O41aG/4jxeI8y5vsbGNot6wk2uN9mTuy', '09999', 'dfsfsde'),
(3, 'ahmed', 'hawwa', 'ahmed@hawww', '$2y$10$EwDLXQDutGAenY39XiCT6.b732lt8T1GfsyGOlpFHHfpJWEgCtsT.', '0999', 'aleppo'),
(4, 'mariea', 'ali', 'admin@admin', '$2y$10$h.1sTqmpWC/QEPFqgWz8c.U2pl9ijwxWOlKw92BFnS0XKO4aTcD6K', '0997875', 'fgs'),
(5, 'bayan ', 'ali', 'admin@admin123', '$2y$10$hT7agwPr1N9R6O57gEuoyeGx9N0LdjSDl2lq76.EJi6Oboubfzzlq', '0997875', '123'),
(6, 'Maryam ', 'ali', 'admin@admin222', '$2y$10$rMTTqr2ubJWWNDJoZrn6heuZj7e3ii2w7MGJ0BYWrD.wCGmiImfzC', '0997875', 'caku'),
(7, 'bayan ', 'Ali', 'bayanali@gmail.com', '$2y$10$4gaoueF7qrvCRQr7kAxIYeoK0poDqM7juX9lmncQSkDGzz4NNAVXe', '200905206', 'cankiri');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `login_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_id`, `login_date`) VALUES
(1, 1, '2024-02-22 17:10:10'),
(2, 1, '2024-02-22 17:34:38'),
(3, 1, '2024-02-22 17:35:27'),
(4, 1, '2024-02-22 17:36:47'),
(5, 1, '2024-02-22 17:39:21'),
(6, 1, '2024-02-22 17:40:04'),
(7, 1, '2024-02-22 17:41:07'),
(8, 1, '2024-02-22 17:42:18'),
(9, 1, '2024-02-22 17:47:04'),
(10, 1, '2024-02-22 17:50:04'),
(11, 1, '2024-02-22 17:53:45'),
(12, 1, '2024-02-22 17:54:01'),
(13, 1, '2024-02-22 17:54:31'),
(14, 1, '2024-02-22 17:56:11'),
(15, 1, '2024-02-22 17:56:23'),
(16, 1, '2024-02-26 18:00:44'),
(17, 1, '2024-02-29 18:03:33'),
(18, 1, '2024-02-27 18:04:24'),
(19, 1, '2024-02-19 18:13:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `user_login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `delete_old_records_event` ON SCHEDULE EVERY 1 MINUTE STARTS '2024-02-22 10:39:11' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM opos_db.order_list WHERE Odate < CURRENT_DATE$$

CREATE DEFINER=`root`@`localhost` EVENT `OrderTableEventDelete` ON SCHEDULE EVERY 1 MINUTE STARTS '2024-02-22 13:21:07' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM opos_db.orders WHERE DateO < CURRENT_DATE$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
