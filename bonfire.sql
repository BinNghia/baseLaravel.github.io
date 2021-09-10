-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2021 at 04:15 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bonfire`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `date_order` date NOT NULL DEFAULT '0000-00-00',
  `total` double(8,2) NOT NULL DEFAULT 0.00,
  `payment` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NULL',
  `note` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NULL',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_user`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(2, 2, '2021-09-05', 1.00, 'CDO', 'NULL', '2021-09-05 14:42:34', '2021-09-05 14:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `id_product` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 1, 1, '2021-09-05 14:42:35', '2021-09-05 14:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `urlHinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'NULL',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `likes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `urlHinh`, `description`, `views`, `likes`, `created_at`, `updated_at`) VALUES
(1, 'OkFOq9YrQCCzOCef_anh15.jpg', '8 Things I’ve Learned from 8 Years of Bonfire', 0, 0, '2021-08-25 05:28:41', '2021-09-08 18:17:28'),
(2, 'anh16.jpg', 'How I Stay Inspired and\r\nCome Up with New Ideas', 941, 27, '2021-08-25 05:28:41', '2021-08-25 05:28:41'),
(3, 'anh17.jpg', 'Wait, there’s a human on\r\nthe other end?', 941, 27, '2021-08-25 05:28:41', '2021-08-25 05:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `urlHinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'NULL',
  `Url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `urlHinh`, `Url`, `created_at`, `updated_at`) VALUES
(1, 'nAKItYkkURVqJMAX_brand1.jpg', 'https://www.rolex.com/vi', '2021-08-25 05:30:58', '2021-09-08 18:27:23'),
(2, 'brand2.jpg', 'https://www.elle.com/', '2021-08-25 05:30:58', '2021-08-25 05:30:58'),
(3, 'brand3.jpg', '', '2021-08-25 05:30:58', '2021-08-25 05:30:58'),
(4, 'brand4.jpg', 'https://shopping.jubileediamond.co.th', '2021-08-25 05:30:58', '2021-08-25 05:30:58'),
(5, 'brand5.jpg', '', '2021-08-25 05:30:58', '2021-08-25 05:30:58'),
(6, 'brand6.jpg', 'https://www.pandora.net/en-vn', '2021-08-25 05:30:58', '2021-08-25 05:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2021_08_26_160904_create_blog', 1),
('2021_08_26_160932_create_brand', 1),
('2021_08_28_152801_create_bills', 1),
('2021_08_28_152825_create_products', 1),
('2021_08_28_152837_create_bill_detail', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `promotion_price` double(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `new` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `unit_price`, `promotion_price`, `image`, `new`, `created_at`, `updated_at`) VALUES
(1, 'Kubusbowl Small', 'NULL', 19.00, 0.00, 'AaliMIkB94R2gpvO_anh7.jpg', 1, '2021-08-25 05:19:47', '2021-09-08 18:18:17'),
(2, 'Divine Footstool', 'NULL', 179.00, 0.00, 'anh8.jpg', 1, '2021-08-25 05:19:47', '2021-08-25 05:19:47'),
(3, 'Cache Pendant Lamp', 'NULL', 179.00, 0.00, 'anh9.jpg', 1, '2021-08-25 05:19:47', '2021-08-25 05:19:47'),
(4, 'RIO Chair', 'NULL', 179.00, 0.00, 'anh10.jpg', 1, '2021-08-25 05:19:47', '2021-08-25 05:19:47'),
(5, 'Cache Pendant Lamp', 'NULL', 179.00, 0.00, 'anh11.jpg', 1, '2021-08-25 05:19:47', '2021-08-25 05:19:47'),
(6, 'Prismatic table', 'NULL', 69.00, 0.00, 'anh12.jpg', 1, '2021-08-25 05:19:47', '2021-08-25 05:19:47'),
(7, 'CobraT hermo Cup', 'NULL', 179.00, 0.00, 'anh13.jpg', 1, '2021-08-25 05:19:47', '2021-08-25 05:19:47'),
(8, 'Montana Collection', 'NULL', 179.00, 0.00, 'anh14.jpg', 1, '2021-08-25 05:19:47', '2021-08-25 05:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT 0,
  `idGroup` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NULL',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `name`, `address`, `phone_number`, `birth`, `gender`, `idGroup`, `email`, `password`, `note`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Trần Vũ Khánh Linh', 'LinhTVK', 'Nam Định', '0868948925', '1999-10-21', 1, 1, 'linhlinh101999@gmail.com', '$2y$10$0i.8YSZGPIs7ULEBD/iiUu8pKTMBkypNr3zJbvKQ6WJtM8OYj7jpe', 'NULL', NULL, NULL, NULL),
(2, 'Trần Trọng Nghĩa', 'NghiaTT', 'Nam Định', '0868948924', '2000-12-15', 0, 0, 'linh124262@nuce.edu.vn', '$2y$10$9hVk811E41N9Gfk2FJZC5OztJLt6roQYa3/.Twqgq0nN6TdmioRlq', 'NULL', 'HFZns9YjfoEfg3ChX9DT0DZiIRiBd4FUFfkXPnO2FGnvH5ZWhJndP1nmKQvj', NULL, '2021-09-07 09:48:08'),
(4, 'Tran Khanh Linh', 'Linh', ' 72 Trần Đại Nghĩa', '0868948925', '1999-10-21', 1, 0, 'hat291hat@gmail.com', '$2y$10$ezMLaTHpv.FxBUEfoAVwIOuaGrUGBQuQc.W.DlWUAr3k195P/Vf3i', 'abc', '2HggLNiP9QSDQ5S5ZkBVjrfmGvOiZ2mbSTMewfxftnjzd0HIAkkv9aG476E9', '2021-09-02 13:53:06', '2021-09-02 13:54:17'),
(5, 'Nguyễn Ngọc Linh Chi', 'ChiNN', 'Hà Nội', '0912345263', '2006-06-06', 1, 0, 'nguyenngoclinhchi0506@gmail.com', '$2y$10$zwXiE5Pi1mdnwbf3znrxo.44xbBlAZ2td2bOVfjhQZnk.T41/r/um', 'abc', NULL, '2021-09-02 13:55:43', '2021-09-02 13:55:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_id_user_foreign` (`id_user`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_id_bill_foreign` (`id_bill`),
  ADD KEY `bill_detail_id_product_foreign` (`id_product`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_id_bill_foreign` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `bill_detail_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
