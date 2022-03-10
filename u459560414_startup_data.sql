-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 08, 2021 at 02:16 PM
-- Server version: 10.4.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u459560414_startup_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `anouncements`
--

CREATE TABLE `anouncements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `isPaid` tinyint(1) NOT NULL DEFAULT 0,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `expr_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `focus_sectors`
--

CREATE TABLE `focus_sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sector` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isShared` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `founders_details`
--

CREATE TABLE `founders_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stake_holders_details_id` bigint(20) UNSIGNED DEFAULT NULL,
  `startup_products_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(4, '2021_05_18_151519_create_roles_table', 1),
(5, '2021_05_18_151534_create_user_roles_table', 1),
(6, '2021_05_18_152039_create_focus_sectors_table', 1),
(7, '2021_05_18_152202_create_stake_holders_details_table', 1),
(8, '2021_05_18_154817_create_anouncements_table', 1),
(9, '2021_05_29_160406_create_startup_products_table', 1),
(10, '2021_05_29_194802_create_founders_details_table', 1);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Startup', NULL, NULL),
(3, 'Incubator', NULL, NULL),
(4, 'Accelerator', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stake_holders_details`
--

CREATE TABLE `stake_holders_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `org_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isRegistered` tinyint(1) NOT NULL DEFAULT 0,
  `number_of_staffs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_startup` int(11) NOT NULL,
  `pref_startup_stage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_funds` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `focus_sectors_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_provided` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_model_desc` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `isApproved` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `startup_products`
--

CREATE TABLE `startup_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `focus_sectors_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_model_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `finacial_stage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_stage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasStakeholder` tinyint(1) NOT NULL DEFAULT 0,
  `stakeholder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stake_holders_details_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ownership` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isRegistered` tinyint(1) NOT NULL DEFAULT 0,
  `isApproved` tinyint(1) NOT NULL DEFAULT 0,
  `isStakeHolderApproved` tinyint(1) NOT NULL DEFAULT 0,
  `est_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_staffs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isEmailVerified` tinyint(1) NOT NULL DEFAULT 0,
  `verification_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `profile_image`, `email`, `phone`, `email_verified_at`, `password`, `isEmailVerified`, `verification_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tumaini Tehama', 'default.png', 'admin@softcenter.co.tz', '+255-765-919-189', NULL, '$2y$10$jJbd8H5fBfa.lFweVUoWEezF/tD.Wkpf6S/ecbU5uI7ISKGiIA/fm', 1, 'eyJpdiI6InI1NUtqK29PT1ZTeGhQYjdJcnFYZHc9PSIsInZhbHVlIjoiUjZKT3Q4KzRUN1hZUGxhL3VzSE5xdz09IiwibWFjIjoiYjkxNmM0NmQ2M2FkYjdkYWFiMzdiODI4ZWUyYjAyOWFlYTI1MzcwZjcwNTM0YjNiNzA3NjllNzdiMDgyNjEzMyJ9', NULL, '2021-06-05 09:57:00', '2021-06-07 09:04:37'),
(2, 'Samson John', '1623073736.png', 'mwelasj@yahoo.com', '+255-713-276-842', NULL, '$2y$10$OIwTk60eTH8DSoQvHTk/h.yuBpoRlUXoR6u79f1GqVBCAU/9CuKS6', 1, 'eyJpdiI6ImpUN1N4K1ZIa2dhc0tmd1RNV2djNHc9PSIsInZhbHVlIjoiYitlVTluV1JRcVI0TkF1TE9iVFlsQT09IiwibWFjIjoiY2QxYmY0Y2UxMmViZjE1NTE4OTA2NGY5ZjQ0ZWNkNzNlNjZlNjdkZjk0NTIzYzc0MjEyOTBjZDc2NzA2MTgzNiJ9', NULL, '2021-06-07 09:16:43', '2021-06-07 13:48:56'),
(3, 'Annuary', 'default.png', 'annuaryissa@gmail.com', '+255-713-130-408', NULL, '$2y$10$NmDgFy77OaSaGdnz7dDPH./H6X9PCigOYSpOfBVaRFrX7weBoVJrW', 1, 'eyJpdiI6Im1rdk1odXJuMG14SC9CTkQxSFlTeHc9PSIsInZhbHVlIjoiNnZpTG5MajN2OEhBQTdYTm9weFo4UT09IiwibWFjIjoiNTFkYThlN2FiNjRhN2M1Njc1YzkyYjM3NzhlZGNjYWE2ZGFmYmJhMmY1MTQ2ZGE0ZGMwYzkzYzIzMTllNGQzYyJ9', NULL, '2021-06-07 13:01:38', '2021-06-07 13:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `roles_id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `users_id`, `roles_id`, `action`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2021-06-05 09:57:00', '2021-06-05 09:57:00'),
(2, 2, 2, NULL, '2021-06-07 09:16:43', '2021-06-07 09:16:43'),
(3, 3, 2, NULL, '2021-06-07 13:01:38', '2021-06-07 13:01:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anouncements`
--
ALTER TABLE `anouncements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `focus_sectors`
--
ALTER TABLE `focus_sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `founders_details`
--
ALTER TABLE `founders_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `founders_details_stake_holders_details_id_foreign` (`stake_holders_details_id`),
  ADD KEY `founders_details_startup_products_id_foreign` (`startup_products_id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stake_holders_details`
--
ALTER TABLE `stake_holders_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stake_holders_details_users_id_foreign` (`users_id`);

--
-- Indexes for table `startup_products`
--
ALTER TABLE `startup_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `startup_products_users_id_foreign` (`users_id`),
  ADD KEY `startup_products_focus_sectors_id_foreign` (`focus_sectors_id`),
  ADD KEY `startup_products_stake_holders_details_id_foreign` (`stake_holders_details_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_users_id_foreign` (`users_id`),
  ADD KEY `user_roles_roles_id_foreign` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anouncements`
--
ALTER TABLE `anouncements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `focus_sectors`
--
ALTER TABLE `focus_sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `founders_details`
--
ALTER TABLE `founders_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stake_holders_details`
--
ALTER TABLE `stake_holders_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `startup_products`
--
ALTER TABLE `startup_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `founders_details`
--
ALTER TABLE `founders_details`
  ADD CONSTRAINT `founders_details_stake_holders_details_id_foreign` FOREIGN KEY (`stake_holders_details_id`) REFERENCES `stake_holders_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `founders_details_startup_products_id_foreign` FOREIGN KEY (`startup_products_id`) REFERENCES `startup_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stake_holders_details`
--
ALTER TABLE `stake_holders_details`
  ADD CONSTRAINT `stake_holders_details_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `startup_products`
--
ALTER TABLE `startup_products`
  ADD CONSTRAINT `startup_products_focus_sectors_id_foreign` FOREIGN KEY (`focus_sectors_id`) REFERENCES `focus_sectors` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `startup_products_stake_holders_details_id_foreign` FOREIGN KEY (`stake_holders_details_id`) REFERENCES `stake_holders_details` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `startup_products_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_roles_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
