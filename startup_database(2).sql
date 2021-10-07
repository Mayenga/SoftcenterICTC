-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 07:53 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `startup_database`
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
  `target_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `isPaid` tinyint(1) NOT NULL DEFAULT 0,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `expr_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anouncements`
--

INSERT INTO `anouncements` (`id`, `title`, `image_file`, `attachment`, `content`, `target_to`, `amount`, `isPaid`, `isActive`, `expr_date`, `created_at`, `updated_at`) VALUES
(1, 'RI Witness Webinar_ Making the Switch to Electronic Witnessing', '1622876911.PNG', '1622876911.pdf', '<p>This sidebar is of full height (100%) and always shown.</p>\r\n  <p>Scroll this window to see the \"fixed\" effect.</p>\r\n  <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum \r\ndefinitiones no quo, maluisset concludaturque et eum, altera fabulas ut \r\nquo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert \r\nlaboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no \r\nmolestiae voluptatibus.</p>\r\n  <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum \r\ndefinitiones no quo, maluisset concludaturque et eum, altera fabulas ut \r\nquo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert \r\nlaboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no \r\nmolestiae voluptatibus.</p>', 'Website Vistors', 0, 0, 1, '2021-06-18', '2021-06-05 04:08:31', '2021-06-05 04:08:31'),
(2, 'sidebar is as tall as its content (the links), and is always shown.', '1622877097.jpg', '1622877097.pdf', '<p>This sidebar is as tall as its content (the links), and is always shown.</p>\r\n  <p>Scroll this window to see the \"fixed\" effect.</p>\r\n  <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum \r\ndefinitiones no quo, maluisset concludaturque et eum, altera fabulas ut \r\nquo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert \r\nlaboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no \r\nmolestiae voluptatibus.</p>\r\n  <p>Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum \r\ndefinitiones no quo, maluisset concludaturque et eum, altera fabulas ut \r\nquo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert \r\nlaboramus repudiandae nec et. Inciderint efficiantur his ad. Eum no \r\nmolestiae voluptatibus.</p>', 'Website Vistors', 0, 0, 1, '2021-06-18', '2021-06-05 04:11:37', '2021-06-05 04:11:37');

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

--
-- Dumping data for table `focus_sectors`
--

INSERT INTO `focus_sectors` (`id`, `sector`, `isShared`, `created_at`, `updated_at`) VALUES
(1, 'FinTech', 1, NULL, NULL),
(2, 'AgriTech', 1, NULL, NULL),
(3, 'HealthTech', 1, NULL, NULL),
(4, 'EnergyTech', 1, NULL, NULL),
(5, 'Edtech', 1, NULL, NULL),
(6, 'ClimateTech', 1, NULL, NULL),
(7, 'SocialTech', 1, NULL, NULL),
(8, 'SecurityTech', 1, NULL, NULL);

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

--
-- Dumping data for table `founders_details`
--

INSERT INTO `founders_details` (`id`, `name`, `gender`, `phone`, `stake_holders_details_id`, `startup_products_id`, `created_at`, `updated_at`) VALUES
(2, 'Shemsa Abdallah', 'Female', '0765919188', 1, NULL, '2021-06-02 03:40:08', '2021-06-02 03:40:08'),
(3, 'Mukhusin Siraji', 'Male', '0765919183', 1, NULL, '2021-06-02 03:40:08', '2021-06-02 03:40:08');

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
  `focus_sectors_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_provided` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_model_desc` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `isApproved` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stake_holders_details`
--

INSERT INTO `stake_holders_details` (`id`, `users_id`, `org_name`, `parent_name`, `est_year`, `isRegistered`, `number_of_staffs`, `address`, `postal_code`, `max_startup`, `pref_startup_stage`, `source_funds`, `focus_sectors_id`, `service_provided`, `program_duration`, `business_model`, `business_model_desc`, `isApproved`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Soft Communication', 'Jamco Company', '04/05/2020', 1, '20', 'Mikocheni, Dar es salaam', '11143', 50, 'Ideation Stage,Prototype Stage', '<p><span class=\"ILfuVd\"><span class=\"hgKElc\">The main <b>sources of funding</b> are retained earnings, debt capital, and equity capital. Companies use retained earnings from business operations to expand or distribute dividends to their shareholders. Businesses raise <b>funds</b> by borrowing debt privately from a bank or by going public (issuing debt securities).</span></span></p>', '1,3,7', 'Value Addition,IT Consulting,Branding,Digital Marketing', 'Three Month,Six Month', 'Non-Profit', '<p><span class=\"ILfuVd\"><span class=\"hgKElc\">A <b>nonprofit organization</b> (NPO), also known as a <b>non</b>-business entity, not-for-<b>profit organization</b>, or <b>nonprofit institution</b>,\r\n is a legal entity organized and operated for a collective, public or \r\nsocial benefit, in contrast with an entity that operates as a business \r\naiming to generate a <b>profit</b> for its owners.</span></span></p>', 1, 'Approved', '2021-06-01 05:27:29', '2021-06-02 03:40:08');

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
  `number_of_staffs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `startup_products`
--

INSERT INTO `startup_products` (`id`, `users_id`, `product_name`, `description`, `focus_sectors_id`, `address`, `postal_code`, `web_url`, `business_model`, `business_model_desc`, `finacial_stage`, `product_stage`, `product_cat`, `hasStakeholder`, `stakeholder_name`, `stake_holders_details_id`, `ownership`, `isRegistered`, `isApproved`, `isStakeHolderApproved`, `est_year`, `file_name`, `number_of_staffs`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mkulima Bora', '<p>Mfumo huu unamsaidia mkulima kufaham maeneo nchini tanzania yanayo \r\nfaa kulima mazao aina fulani na masoko yakeMkulima atalipia ada kila \r\nbaada ya miezi sita kwa ajili ya kuiwezesha huduma na malipo si chini ya\r\n elfu kumi za kitanzania<br>Mkulima atalipia ada kila baada ya miezi sita kwa ajili ya kuiwezesha huduma na malipo si chini ya elfu kumi za kitanzania<br>Mkulima atalipia ada kila baada ya miezi sita kwa ajili ya kuiwezesha huduma na malipo si chini ya elfu kumi za kitanzania<br>Mkulima atalipia ada kila baada ya miezi sita kwa ajili ya kuiwezesha huduma na malipo si chini ya elfu kumi za kitanzania</p>', 2, 'Mikocheni, Dar es salaam', '11121', 'https://mkulimabora.co.tz', 'For Profit', 'Mkulima atalipia ada kila baada ya miezi sita kwa ajili ya kuiwezesha huduma na malipo si chini ya elfu kumi za kitanzania\r\nMkulima atalipia ada kila baada ya miezi sita kwa ajili ya kuiwezesha huduma na malipo si chini ya elfu kumi za kitanzania\r\nMkulima atalipia ada kila baada ya miezi sita kwa ajili ya kuiwezesha huduma na malipo si chini ya elfu kumi za kitanzania', 'Pre revenue stage', 'Ideation Stage', 'Pre Mature', 0, NULL, 1, 'Individual', 1, 1, 1, NULL, '1622631406135933.pdf', NULL, NULL, '2021-06-02 07:56:46', '2021-06-03 15:54:13');

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
(1, 'Chama Chopper', '1622749159.PNG', 'mukhusin@hotmail.com', '+255-765-919-184', NULL, '$2y$10$9F1SDFUV/daAfZyPSeg6DOmv8PBNcHnnKVw2P7uH.36zCLJL/UvRO', 1, 'eyJpdiI6IkdqazVFemlodklsVDVGODhjdmw3blE9PSIsInZhbHVlIjoiL2xCTlpwWlQxWWVTNnRpdFN5Mkxndz09IiwibWFjIjoiOTQwZmY4MGFjMWMzMzVlMTg2ZDdjZmZiNTBiZDM0ZWViOWMyYWNlZTgxZjQ3MDQ4MzQwMDlkNjBkODI2MDk4MCJ9', NULL, '2021-05-30 05:26:22', '2021-06-03 16:39:19'),
(2, 'Maimuna Jumanne', 'default.png', 'mukhusinsiraji@hotmail.com', '+255-789-690-058', NULL, '$2y$10$RtVhVdHSytNpmYuHCysRnua.QKIzbeyTDsM6vxrGXEH7PYtjr55qG', 1, 'eyJpdiI6IjBLZ3EzelBQa2pVUkw5RjB2OWlyZXc9PSIsInZhbHVlIjoiQk1RSncyS3ExeXZ1RFJpUW9kSlJOQT09IiwibWFjIjoiYjZhOTBkNGU0ODQ1ZjE5YzIwMGNiZWI0Njc3OTU1NWFkNzZmZTc4NDUyZjI1ZWIyNGJlMDA5ZTk5YmM4YzQzNCJ9', NULL, '2021-05-30 05:40:16', '2021-06-03 09:08:16'),
(5, 'Tumaini Tehama', '1622750699.jpg', 'mukhusinsiraji@gmail.com', '+255-765-919-186', NULL, '$2y$10$.MvCvHTnnczlukUnMw8BSOqoyNmL3Vn6aoKNANxGlSHSSGFiT.Szi', 1, 'eyJpdiI6IkdzU2RYa0oyRC9zUjJaMWcvdmRGdkE9PSIsInZhbHVlIjoienhabkE3ek9nSk9ldzViYmcybHAyUT09IiwibWFjIjoiNjRmZWIxMTc1YTEwYmFlY2JjZTQzYTA1OWEyMGQzN2IxM2Q5MTYxMmQ3ZTVlNDEzNWNjNGJhZWFmZjE3ZTIxNSJ9', NULL, '2021-06-03 16:56:33', '2021-06-03 17:04:59'),
(6, 'Jackson Jerry', '1622818051.jpg', 'jerry@gmail.com', '+255-765-818-194', NULL, '$2y$10$t.Oeec3zSSbcmLcvBMky5.RuQzP45loQ77VC.tkL3MxCzUsymc3OS', 0, '0c7a43f6a1b81e08b97868556a6d7c0519cf7337', NULL, '2021-06-04 11:35:50', '2021-06-04 11:47:31'),
(7, 'Joe Doe', '1622818042.jpg', 'doe@gmail.com', '+255-786-527-382', NULL, '$2y$10$HKJqvdJ3N2aVuJmTCTdDKe8wAA4E1bvr8rttby3fYfnwEg0U3DSVm', 0, '3ca3120dab062cd745520c63db2d629fa04dca22', NULL, '2021-06-04 11:45:00', '2021-06-04 11:47:22');

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
(1, 1, 2, NULL, '2021-05-30 05:26:22', '2021-05-30 05:26:22'),
(2, 2, 3, NULL, '2021-05-30 05:40:16', '2021-05-30 05:40:16'),
(3, 5, 1, NULL, '2021-06-03 16:56:33', '2021-06-03 16:56:33'),
(4, 6, 1, NULL, '2021-06-04 11:35:50', '2021-06-04 11:35:50'),
(5, 7, 1, NULL, '2021-06-04 11:45:00', '2021-06-04 11:45:00');

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
  ADD KEY `stake_holders_details_users_id_foreign` (`users_id`),
  ADD KEY `stake_holders_details_focus_sectors_id_foreign` (`focus_sectors_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `focus_sectors`
--
ALTER TABLE `focus_sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `founders_details`
--
ALTER TABLE `founders_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `startup_products`
--
ALTER TABLE `startup_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
