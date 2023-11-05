-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 09:46 PM
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
-- Database: `feedback_tool`
--

-- --------------------------------------------------------

--
-- Table structure for table `catigories`
--

CREATE TABLE `catigories` (
  `catid` bigint(20) UNSIGNED NOT NULL,
  `cat_title` varchar(100) DEFAULT NULL,
  `cat_discription` varchar(500) DEFAULT NULL,
  `cat_status` varchar(100) DEFAULT NULL,
  `cat_image` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catigories`
--

INSERT INTO `catigories` (`catid`, `cat_title`, `cat_discription`, `cat_status`, `cat_image`, `created_at`, `updated_at`) VALUES
(1, 'bug report', 'bug report', 'Active', NULL, '2023-11-05 14:42:38', '2023-11-05 14:42:38'),
(2, 'feature request', 'feature request', 'Active', NULL, '2023-11-05 14:42:56', '2023-11-05 14:42:56'),
(3, 'improvement', 'improvement', 'Active', NULL, '2023-11-05 14:43:05', '2023-11-05 14:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemid` bigint(20) UNSIGNED NOT NULL,
  `item_title` varchar(100) DEFAULT NULL,
  `item_discription` varchar(500) DEFAULT NULL,
  `cat_id` varchar(100) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `vote` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemid`, `item_title`, `item_discription`, `cat_id`, `user_id`, `vote`, `created_at`, `updated_at`) VALUES
(1, 'Improved User Experience', 'We would like your feedback on how we can enhance the overall user experience of our app. Share any suggestions or pain points you\'ve encountered.', '3', '1', NULL, '2023-11-05 14:44:56', '2023-11-05 14:44:56'),
(2, 'App Crashing Issue', 'Experiencing frequent app crashes? Help us identify and fix the problem by reporting any instances and providing details of your device and actions leading to the crash.', '1', '1', NULL, '2023-11-05 14:45:31', '2023-11-05 14:45:31'),
(3, 'Dark Mode Feature Request', 'Love using our app in dark mode? Suggest improvements or additional features for our dark mode experience to make it even better.', '2', '1', NULL, '2023-11-05 14:45:53', '2023-11-05 14:45:53'),
(4, 'Feedback on New Navigation Menu', 'We\'ve introduced a new navigation menu. Let us know your thoughts and if it has improved your app navigation experience or if there are any issues.\"', '3', '1', NULL, '2023-11-05 14:46:15', '2023-11-05 14:46:15'),
(5, 'Login Authentication Bug', 'Facing difficulties with logging in? Please report any authentication issues, error messages, or unusual behavior when trying to access your account.', '1', '1', NULL, '2023-11-05 14:46:43', '2023-11-05 14:46:43'),
(6, 'Request for Offline Mode', 'Would you like to use our app offline? Share your ideas and suggestions for an offline mode feature to help us understand your needs better.', '2', '1', NULL, '2023-11-05 14:46:59', '2023-11-05 14:46:59'),
(7, 'Feedback on Search Functionality', 'Tell us about your experience with the search feature. Is it helping you find what you need? Do you have any suggestions for improvement?', '3', '1', NULL, '2023-11-05 14:47:22', '2023-11-05 14:47:22'),
(8, 'Profile Picture Upload Bug', 'Encountering issues while trying to upload a profile picture? Help us by reporting the problem and providing details to resolve the bug.', '1', '1', NULL, '2023-11-05 14:47:40', '2023-11-05 14:47:40'),
(9, 'Request for Multi-Language Support', 'Interested in using our app in multiple languages? Let us know your language preferences and any features you\'d like to see for better language support.', '2', '1', NULL, '2023-11-05 14:48:14', '2023-11-05 14:48:14'),
(10, 'Feedback on App Speed', 'Is the app running slower than you\'d like? Share your feedback on performance issues or slow loading times for specific actions', '3', '1', NULL, '2023-11-05 14:48:26', '2023-11-05 14:48:26'),
(11, 'In-App Chat Feature Enhancemen', 'Do you use our in-app chat feature? Provide feedback and suggestions on how we can make it even more convenient and effective for communication', '3', '1', NULL, '2023-11-05 14:48:52', '2023-11-05 14:48:52'),
(12, 'Purchase Error Report', 'Experienced any issues while making a purchase? Report any errors, payment problems, or issues related to our online store.', '1', '1', NULL, '2023-11-05 14:49:16', '2023-11-05 14:49:16'),
(13, 'Voice Command Integration Request', 'Would you like to control our app with voice commands? Share your thoughts and ideas on implementing voice recognition technology.\"', '2', '1', NULL, '2023-11-05 14:49:36', '2023-11-05 14:49:36'),
(14, 'Feedback on New Home Page Design', 'Feedback on New Home Page Design', '3', '1', NULL, '2023-11-05 14:49:57', '2023-11-05 14:49:57'),
(15, 'Password Reset Bug', 'Facing issues with resetting your password? Help us identify and resolve any bugs related to the password reset process.', '1', '1', NULL, '2023-11-05 14:50:13', '2023-11-05 14:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `item_votes`
--

CREATE TABLE `item_votes` (
  `item_voteid` bigint(20) UNSIGNED NOT NULL,
  `item_id` varchar(50) DEFAULT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2014_10_12_100000_create_password_resets_table', 1),
(29, '2019_08_19_000000_create_failed_jobs_table', 1),
(30, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(31, '2023_01_05_100602_create_items_table', 1),
(32, '2023_01_05_100834_create_catigories_table', 1),
(33, '2023_01_05_155231_create_packages_table', 1),
(34, '2023_01_06_110636_create_gallaries_table', 1),
(35, '2023_01_06_140137_create_herobaners_table', 1),
(36, '2023_01_06_161257_create_packageitems_table', 1),
(37, '2023_01_09_161853_create_offbarners_table', 2),
(38, '2023_01_23_055452_create_reviews_table', 3),
(39, '2023_01_23_064820_review_pics', 4),
(40, '2023_11_04_082134_create_item_votes_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewid` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `rev_msg` varchar(500) DEFAULT NULL,
  `rev_featured` varchar(10) DEFAULT NULL,
  `child_of` varchar(50) DEFAULT NULL,
  `rev_date` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewid`, `user_id`, `rev_msg`, `rev_featured`, `child_of`, `rev_date`, `created_at`, `updated_at`) VALUES
(1, '14', 'Issue Resolve', '15', NULL, '2023-11-05 20:44', '2023-11-05 15:44:43', '2023-11-05 15:44:43'),
(2, '14', 'contactus on +0d0000', '15', NULL, '2023-11-05 20:45', '2023-11-05 15:45:03', '2023-11-05 15:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_id` varchar(200) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(400) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `is_customer` tinyint(1) DEFAULT NULL,
  `blocked` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `google_id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `is_admin`, `is_customer`, `blocked`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'ali', 'admin@1.com', NULL, '$2y$10$32lS73Xyho1370KAfI5cwe/ToTZjyhWXFF.LjtIHq/J1XlBK76O.y', 'https://lh3.googleusercontent.com/a/AEdFTp7UMnEjJ-0zglqtFn8bosRnAQjA5FYkkpLiQjXD=s96-c', 1, NULL, NULL, NULL, '2023-01-07 11:30:08', '2023-01-07 11:30:08'),
(11, NULL, 'ali', 'alis@1.com', NULL, '$2y$10$dc/VKyvTNg2QPykdS9VZqePPX1cn6UQC0yfg6opSXrz02IR3sBezS', NULL, 0, NULL, NULL, NULL, '2023-11-03 10:25:45', '2023-11-03 10:25:45'),
(12, NULL, 'ali', 'ali@2.com', NULL, '$2y$10$wofPt1cCD9HagODGiLTFsulDOoImFWaqhVxDm0pS/hT9dX9Yirv7.', NULL, 1, NULL, NULL, NULL, '2023-11-03 10:26:21', '2023-11-03 10:26:21'),
(13, NULL, 'ali', 'ali@.com', NULL, '$2y$10$LAlgkqmDdD.NPdWu6/Z.QuvxU7YmiGHKQ.WzLWwfVS5bmqlJf7d/G', NULL, 1, NULL, NULL, NULL, '2023-11-03 10:32:17', '2023-11-03 10:32:17'),
(14, NULL, 'she', 'she@com', NULL, '$2y$10$O1u8ChJCMqPOeiUQZpnsiedSFtyBDjae9z7XN3o8lm9hKI3XnvyiW', NULL, 0, NULL, 0, NULL, '2023-11-05 09:27:44', '2023-11-05 10:28:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catigories`
--
ALTER TABLE `catigories`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `item_votes`
--
ALTER TABLE `item_votes`
  ADD PRIMARY KEY (`item_voteid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `google_id` (`google_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catigories`
--
ALTER TABLE `catigories`
  MODIFY `catid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `item_votes`
--
ALTER TABLE `item_votes`
  MODIFY `item_voteid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
