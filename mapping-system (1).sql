-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 01:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mapping-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cemetery`
--

CREATE TABLE `cemetery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cemetery_no` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cemetery`
--

INSERT INTO `cemetery` (`id`, `cemetery_no`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 12, 'occupied', NULL, '2022-06-13 15:45:42', 'admin'),
(2, 12, 'reserve', NULL, NULL, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_09_090842_create_cemetery_table', 1),
(6, '2022_06_10_012121_create_peoples_table', 2),
(7, '2022_06_10_013031_create_accounts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peoples`
--

CREATE TABLE `peoples` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cemetery_no` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grave_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `born_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `die_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `block_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_of_lot` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peoples`
--

INSERT INTO `peoples` (`id`, `cemetery_no`, `first_name`, `last_name`, `middle_name`, `user_image`, `grave_no`, `born_date`, `die_date`, `block_no`, `type_of_lot`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 368, 'Kemerut', 'Osme', 'asdsdasdasd', 'img', '0', '2022-06-23 23:51:35', '2022-06-06 23:32:40', '5', 'Two Lawn Lot', 'reserve', 'admin', NULL, '2022-06-13 23:32:40'),
(2, 369, 'Juan', 'Ponze', 'asd', 'img', '0', '2022-06-13 23:51:35', '2022-06-08 23:51:35', '5', 'Two Lawn Lot', 'occupied', 'admin', NULL, '2022-06-13 23:51:35'),
(3, 369, 'ad', 'ad', 'ad', 'img', '0', '2022-06-14 08:20:36', '2022-06-27 23:46:45', '5', 'Two Lawn Lot', 'occupied', 'admin', NULL, '2022-06-14 00:20:36'),
(4, 368, 'Juan', 'Ponze', 'asd', 'img', '0', '2022-06-14 08:20:45', '2022-06-13 23:43:02', '5', 'Senior Estate', 'occupied', 'admin', NULL, '2022-06-14 00:20:45'),
(5, 455, 'Juan', 'Ponze', 'asd', 'img', '0', '2022-06-16 23:43:16', '2022-06-07 23:43:16', '6', 'Senior Estate', 'reserve', 'admin', NULL, NULL),
(6, 435, 'Juan', 'Ponze', 'asd', 'img', '0', '2022-06-02 23:50:32', '2022-06-05 23:50:32', '6', 'Junior Estat', 'reserve', 'admin', NULL, NULL),
(7, 104, 'Juan', 'Ponze', 'asd', 'img', '0', '2022-06-01 23:58:18', '2022-06-05 23:58:18', '2', 'Senior Estate', 'reserve', 'user', NULL, NULL),
(8, 65, 'Bleh', 'Bleh', 'asd', 'img', '0', '2022-06-14 00:18:52', '2022-06-14 00:18:52', '2', 'Memorial Garden', 'reserve', 'admin', NULL, NULL),
(9, 104, 'Ryan', 'Blissed', 'asdsdasdasd', 'img', '0', '2022-06-14 00:29:25', '2022-06-14 00:29:25', '2', 'Single Niche', 'reserve', 'admin', NULL, NULL),
(10, 1, 'Joe', 'an', 'Ki', 'img', '0', '2022-06-14 11:11:01', '2022-06-14 03:09:40', '1', 'Memorial Garden', 'occupied', 'admin', NULL, '2022-06-14 03:11:01'),
(11, 1, 'Zo', 'An', 'P', 'img', '0', '2022-06-14 03:10:27', '2022-06-14 03:10:27', '1', 'Senior Estate', 'reserve', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@sample.com', NULL, '$2y$10$FfMbSU5KoiuVu4FAwrVIreM6Fib6LjmcadQAj34fd5hczPSNM4bwa', NULL, '2022-06-09 17:54:17', '2022-06-09 17:54:17'),
(2, 'user', 'user', 'User@sample.com', NULL, '$2y$10$FfMbSU5KoiuVu4FAwrVIreM6Fib6LjmcadQAj34fd5hczPSNM4bwa', NULL, '2022-06-11 07:03:15', '2022-06-11 07:03:16'),
(3, 'test', NULL, 'test@gmail.com', NULL, '$2y$10$sbrXoF9cQhk6zW4cScMpTOBcKo1YnIpAMN9oFsOYjeRv/k1eSbitK', NULL, '2022-06-11 06:06:24', '2022-06-11 06:06:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cemetery`
--
ALTER TABLE `cemetery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `peoples`
--
ALTER TABLE `peoples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cemetery`
--
ALTER TABLE `cemetery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peoples`
--
ALTER TABLE `peoples`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
