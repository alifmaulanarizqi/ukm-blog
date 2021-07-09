-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 07:02 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukmblog`
--

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
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukm_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `kategori`, `slug`, `ukm_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Kategori 1 ukm 1', 'kategori-1-ukm-1', 2, NULL, '2021-06-24 03:21:06', '2021-06-24 04:26:18'),
(2, 'Kategori 2 ukm 1', 'kategori-2-ukm-1', 2, NULL, '2021-06-24 03:22:35', '2021-06-24 04:26:26'),
(4, 'Kategori 3 ukm 1', 'kategori-3-ukm-1', 2, NULL, '2021-06-24 16:06:42', '2021-07-08 21:58:04'),
(5, 'Kategori 4 ukm 1', 'kategori-4-ukm-1', 2, NULL, '2021-06-24 16:06:50', '2021-06-24 16:06:50'),
(6, 'Kategori 5 ukm 1', 'kategori-5-ukm-1', 2, NULL, '2021-06-24 16:06:56', '2021-07-08 21:58:18'),
(8, 'Kategori 1 ukm 2', 'kategori-1-ukm-2', 6, NULL, '2021-07-01 19:02:26', '2021-07-03 07:54:35'),
(17, 'Kategori 1 ukm 3', 'kategori-1-ukm-3', 9, NULL, '2021-07-07 06:08:55', '2021-07-07 06:08:55');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_12_01_055549_create_roles_table', 1),
(7, '2020_12_01_055557_create_permissions_table', 1),
(8, '2020_12_01_075730_create_permission_role_pivot_table', 1),
(9, '2020_12_01_075804_create_role_user_pivot_table', 1),
(10, '2021_06_05_120201_create_sessions_table', 1),
(11, '2021_06_15_051630_create_ukm_pendaftars_table', 1),
(12, '2021_06_15_054344_create_ukms_table', 1),
(13, '2021_06_19_132334_add_ukmid_soft_delete_column_on_users_table', 2),
(14, '2021_06_21_130632_add_social_and_livetv_on_ukms_table', 3),
(15, '2021_06_22_132617_add_open_registration_to_ukms_table', 4),
(16, '2021_06_22_133119_create_user_pendaftars_table', 5),
(17, '2021_06_22_142003_update_joining_reason_on_user_pendaftars_table_to_nullable', 6),
(18, '2021_06_24_094405_create_kategoris_table', 7),
(19, '2021_06_24_224346_add_image_column_to_ukms_table', 8),
(20, '2021_06_25_010112_create_posts_table', 9),
(21, '2021_06_25_023100_update_headline_utama_and_headline_ukm_on_posts_table', 10),
(22, '2021_06_25_023438_update2_headline_utama_and_headline_ukm_on_posts_table', 11),
(23, '2021_07_02_020557_add_slug_column_on_ukms_table', 12),
(24, '2021_07_03_124131_add_slug_on_kategori_table', 13),
(25, '2021_07_04_122154_add_slug_on_posts_table', 14),
(26, '2021_07_06_134627_add_viewer_on_posts_table', 15);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'post_access', NULL, NULL, NULL),
(2, 'user_access', NULL, NULL, NULL),
(3, 'kategori_access', NULL, NULL, NULL),
(4, 'setting_access', NULL, NULL, NULL),
(5, 'ukm_access', NULL, NULL, NULL),
(6, 'laporan_access', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 6),
(3, 1),
(3, 3),
(3, 4),
(3, 6);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `ukm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headline_utama` int(11) DEFAULT 0,
  `headline_ukm` int(11) DEFAULT 0,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewer` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `kategori_id`, `ukm_id`, `user_id`, `title`, `slug`, `image`, `konten`, `headline_utama`, `headline_ukm`, `tanggal`, `viewer`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 7, 'Post 1 ukm 1', 'post-1-ukm-1', 'image/posts/1704624931077884.jpg', '<p style=\"margin-bottom: 15px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dui velit, molestie ac egestas ac, laoreet non neque. Morbi finibus tincidunt ex sed rutrum. Curabitur congue sapien pellentesque purus ultrices, vel bibendum erat pharetra. Ut est dolor, congue in commodo non, dapibus at lacus. Quisque faucibus pulvinar mauris, ut pulvinar nisi semper nec. Praesent ornare venenatis lectus, nec dapibus est consectetur id. Duis eget orci tincidunt, pulvinar ante vitae, consectetur arcu. Donec euismod augue turpis, sit amet commodo enim laoreet vitae. Donec commodo turpis ut eleifend facilisis. Ut mauris tellus, tempor nec scelerisque non, congue et diam. Praesent sit amet nisl eu magna bibendum facilisis ut euismod augue.</p><p style=\"margin-bottom: 15px;\">Quisque dignissim risus erat, non condimentum est aliquet a. Donec id tempor velit. Pellentesque rutrum accumsan luctus. Quisque tempus fermentum magna vitae aliquet. Donec id orci quis nibh iaculis vestibulum consequat ac odio. Quisque id felis at nibh molestie mollis. Phasellus placerat ultricies erat, sit amet pretium urna accumsan a. Nam pellentesque et nunc at tempor. Praesent id eros ac eros venenatis tincidunt ut congue enim. Sed sagittis dapibus dapibus. Proin semper neque ac nibh sodales sagittis. Pellentesque a molestie sapien, ut mollis ex. Proin eget eleifend sapien. Nunc hendrerit justo vel urna venenatis rutrum eget eget felis. Aenean aliquet accumsan dui, in tempor justo placerat quis. Nunc sed risus lorem.</p><p style=\"margin-bottom: 15px;\">Aliquam orci risus, congue id iaculis et, porta hendrerit nisi. Nullam porttitor augue non erat tincidunt ullamcorper. Quisque enim nibh, imperdiet venenatis efficitur in, condimentum eget erat. Sed sed dolor fringilla, efficitur libero nec, porttitor magna. Etiam vulputate sollicitudin nibh in porta. Nulla lacus orci, tincidunt non nibh a, consequat posuere ligula. Aenean orci turpis, elementum vel neque id, suscipit posuere eros. Ut feugiat ex odio, sit amet vestibulum arcu scelerisque vel. Vivamus nec pharetra nibh. Fusce eget elit et dolor tempor lobortis in sollicitudin lacus. Maecenas volutpat dui sollicitudin nisi sodales, sed varius mi euismod. Fusce vitae semper nulla.</p><p style=\"margin-bottom: 15px;\">Duis posuere scelerisque massa eu consequat. In ac molestie elit, ac facilisis mi. Nullam augue ex, porta a vulputate sit amet, congue sit amet est. Mauris ante nunc, dapibus facilisis dictum sit amet, dignissim id arcu. Maecenas eu magna at arcu malesuada ultrices. Cras ultricies enim vitae neque molestie, ac pretium odio lobortis. Suspendisse semper est vitae risus blandit cursus. Aliquam non viverra dolor, sit amet varius urna. Nulla ullamcorper, ante non iaculis tincidunt, felis ligula pulvinar libero, vel ultrices nulla augue id dolor. Donec posuere eros quis justo tincidunt tempor.</p>', 1, NULL, '07 Jul 2021', 7, NULL, '2021-06-24 19:40:18', '2021-07-08 21:59:15'),
(4, 2, 2, 7, 'Post 2 ukm 1 edit', 'post-2-ukm-1-edit', 'image/posts/1704624983069914.jpg', '<p style=\"margin-bottom: 15px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dui velit, molestie ac egestas ac, laoreet non neque. Morbi finibus tincidunt ex sed rutrum. Curabitur congue sapien pellentesque purus ultrices, vel bibendum erat pharetra. Ut est dolor, congue in commodo non, dapibus at lacus. Quisque faucibus pulvinar mauris, ut pulvinar nisi semper nec. Praesent ornare venenatis lectus, nec dapibus est consectetur id. Duis eget orci tincidunt, pulvinar ante vitae, consectetur arcu. Donec euismod augue turpis, sit amet commodo enim laoreet vitae. Donec commodo turpis ut eleifend facilisis. Ut mauris tellus, tempor nec scelerisque non, congue et diam. Praesent sit amet nisl eu magna bibendum facilisis ut euismod augue.</p><p style=\"margin-bottom: 15px;\">Quisque dignissim risus erat, non condimentum est aliquet a. Donec id tempor velit. Pellentesque rutrum accumsan luctus. Quisque tempus fermentum magna vitae aliquet. Donec id orci quis nibh iaculis vestibulum consequat ac odio. Quisque id felis at nibh molestie mollis. Phasellus placerat ultricies erat, sit amet pretium urna accumsan a. Nam pellentesque et nunc at tempor. Praesent id eros ac eros venenatis tincidunt ut congue enim. Sed sagittis dapibus dapibus. Proin semper neque ac nibh sodales sagittis. Pellentesque a molestie sapien, ut mollis ex. Proin eget eleifend sapien. Nunc hendrerit justo vel urna venenatis rutrum eget eget felis. Aenean aliquet accumsan dui, in tempor justo placerat quis. Nunc sed risus lorem.</p><p style=\"margin-bottom: 15px;\">Aliquam orci risus, congue id iaculis et, porta hendrerit nisi. Nullam porttitor augue non erat tincidunt ullamcorper. Quisque enim nibh, imperdiet venenatis efficitur in, condimentum eget erat. Sed sed dolor fringilla, efficitur libero nec, porttitor magna. Etiam vulputate sollicitudin nibh in porta. Nulla lacus orci, tincidunt non nibh a, consequat posuere ligula. Aenean orci turpis, elementum vel neque id, suscipit posuere eros. Ut feugiat ex odio, sit amet vestibulum arcu scelerisque vel. Vivamus nec pharetra nibh. Fusce eget elit et dolor tempor lobortis in sollicitudin lacus. Maecenas volutpat dui sollicitudin nisi sodales, sed varius mi euismod. Fusce vitae semper nulla.</p><p style=\"margin-bottom: 15px;\">Duis posuere scelerisque massa eu consequat. In ac molestie elit, ac facilisis mi. Nullam augue ex, porta a vulputate sit amet, congue sit amet est. Mauris ante nunc, dapibus facilisis dictum sit amet, dignissim id arcu. Maecenas eu magna at arcu malesuada ultrices. Cras ultricies enim vitae neque molestie, ac pretium odio lobortis. Suspendisse semper est vitae risus blandit cursus. Aliquam non viverra dolor, sit amet varius urna. Nulla ullamcorper, ante non iaculis tincidunt, felis ligula pulvinar libero, vel ultrices nulla augue id dolor. Donec posuere eros quis justo tincidunt tempor.</p>', NULL, 1, '07 Jul 2021', 1, NULL, '2021-06-24 19:41:50', '2021-07-07 04:24:25'),
(7, 1, 2, 7, 'Post 3 ukm 1', 'post-3-ukm-1', 'image/posts/1704624997653320.jpg', '<p style=\"margin-bottom: 15px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dui velit, molestie ac egestas ac, laoreet non neque. Morbi finibus tincidunt ex sed rutrum. Curabitur congue sapien pellentesque purus ultrices, vel bibendum erat pharetra. Ut est dolor, congue in commodo non, dapibus at lacus. Quisque faucibus pulvinar mauris, ut pulvinar nisi semper nec. Praesent ornare venenatis lectus, nec dapibus est consectetur id. Duis eget orci tincidunt, pulvinar ante vitae, consectetur arcu. Donec euismod augue turpis, sit amet commodo enim laoreet vitae. Donec commodo turpis ut eleifend facilisis. Ut mauris tellus, tempor nec scelerisque non, congue et diam. Praesent sit amet nisl eu magna bibendum facilisis ut euismod augue.</p><p style=\"margin-bottom: 15px;\">Quisque dignissim risus erat, non condimentum est aliquet a. Donec id tempor velit. Pellentesque rutrum accumsan luctus. Quisque tempus fermentum magna vitae aliquet. Donec id orci quis nibh iaculis vestibulum consequat ac odio. Quisque id felis at nibh molestie mollis. Phasellus placerat ultricies erat, sit amet pretium urna accumsan a. Nam pellentesque et nunc at tempor. Praesent id eros ac eros venenatis tincidunt ut congue enim. Sed sagittis dapibus dapibus. Proin semper neque ac nibh sodales sagittis. Pellentesque a molestie sapien, ut mollis ex. Proin eget eleifend sapien. Nunc hendrerit justo vel urna venenatis rutrum eget eget felis. Aenean aliquet accumsan dui, in tempor justo placerat quis. Nunc sed risus lorem.</p><p style=\"margin-bottom: 15px;\">Aliquam orci risus, congue id iaculis et, porta hendrerit nisi. Nullam porttitor augue non erat tincidunt ullamcorper. Quisque enim nibh, imperdiet venenatis efficitur in, condimentum eget erat. Sed sed dolor fringilla, efficitur libero nec, porttitor magna. Etiam vulputate sollicitudin nibh in porta. Nulla lacus orci, tincidunt non nibh a, consequat posuere ligula. Aenean orci turpis, elementum vel neque id, suscipit posuere eros. Ut feugiat ex odio, sit amet vestibulum arcu scelerisque vel. Vivamus nec pharetra nibh. Fusce eget elit et dolor tempor lobortis in sollicitudin lacus. Maecenas volutpat dui sollicitudin nisi sodales, sed varius mi euismod. Fusce vitae semper nulla.</p><p style=\"margin-bottom: 15px;\">Duis posuere scelerisque massa eu consequat. In ac molestie elit, ac facilisis mi. Nullam augue ex, porta a vulputate sit amet, congue sit amet est. Mauris ante nunc, dapibus facilisis dictum sit amet, dignissim id arcu. Maecenas eu magna at arcu malesuada ultrices. Cras ultricies enim vitae neque molestie, ac pretium odio lobortis. Suspendisse semper est vitae risus blandit cursus. Aliquam non viverra dolor, sit amet varius urna. Nulla ullamcorper, ante non iaculis tincidunt, felis ligula pulvinar libero, vel ultrices nulla augue id dolor. Donec posuere eros quis justo tincidunt tempor.</p>', NULL, 1, '07 Jul 2021', 3, NULL, '2021-06-29 06:54:10', '2021-07-08 20:53:43'),
(9, 8, 6, 15, 'Post 1 ukm 2', 'post-1-ukm-2', 'image/posts/1704625284497073.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dui velit, molestie ac egestas ac, laoreet non neque. Morbi finibus tincidunt ex sed rutrum. Curabitur congue sapien pellentesque purus ultrices, vel bibendum erat pharetra. Ut est dolor, congue in commodo non, dapibus at lacus. Quisque faucibus pulvinar mauris, ut pulvinar nisi semper nec. Praesent ornare venenatis lectus, nec dapibus est consectetur id. Duis eget orci tincidunt, pulvinar ante vitae, consectetur arcu. Donec euismod augue turpis, sit amet commodo enim laoreet vitae. Donec commodo turpis ut eleifend facilisis. Ut mauris tellus, tempor nec scelerisque non, congue et diam. Praesent sit amet nisl eu magna bibendum facilisis ut euismod augue. Quisque dignissim risus erat, non condimentum est aliquet a. Donec id tempor velit. Pellentesque rutrum accumsan luctus. Quisque tempus fermentum magna vitae aliquet. Donec id orci quis nibh iaculis vestibulum consequat ac odio. Quisque id felis at nibh molestie mollis. Phasellus placerat ultricies erat, sit amet pretium urna accumsan a. Nam pellentesque et nunc at tempor. Praesent id eros ac eros venenatis tincidunt ut congue enim. Sed sagittis dapibus dapibus. Proin semper neque ac nibh sodales sagittis. Pellentesque a molestie sapien, ut mollis ex. Proin eget eleifend sapien. Nunc hendrerit justo vel urna venenatis rutrum eget eget felis. Aenean aliquet accumsan dui, in tempor justo placerat quis. Nunc sed risus lorem. Aliquam orci risus, congue id iaculis et, porta hendrerit nisi. Nullam porttitor augue non erat tincidunt ullamcorper. Quisque enim nibh, imperdiet venenatis efficitur in, condimentum eget erat. Sed sed dolor fringilla, efficitur libero nec, porttitor magna. Etiam vulputate sollicitudin nibh in porta. Nulla lacus orci, tincidunt non nibh a, consequat posuere ligula. Aenean orci turpis, elementum vel neque id, suscipit posuere eros. Ut feugiat ex odio, sit amet vestibulum arcu scelerisque vel. Vivamus nec pharetra nibh. Fusce eget elit et dolor tempor lobortis in sollicitudin lacus. Maecenas volutpat dui sollicitudin nisi sodales, sed varius mi euismod. Fusce vitae semper nulla. Duis posuere scelerisque massa eu consequat. In ac molestie elit, ac facilisis mi. Nullam augue ex, porta a vulputate sit amet, congue sit amet est. Mauris ante nunc, dapibus facilisis dictum sit amet, dignissim id arcu. Maecenas eu magna at arcu malesuada ultrices. Cras ultricies enim vitae neque molestie, ac pretium odio lobortis. Suspendisse semper est vitae risus blandit cursus. Aliquam non viverra dolor, sit amet varius urna. Nulla ullamcorper, ante non iaculis tincidunt, felis ligula pulvinar libero, vel ultrices nulla augue id dolor. Donec posuere eros quis justo tincidunt tempor.</p>', 1, 1, '07 Jul 2021', 0, NULL, '2021-07-01 19:02:39', '2021-07-07 04:29:13'),
(11, 8, 6, 15, 'Post 2 ukm 2', 'post-2-ukm-2', NULL, '<p>woobla</p>', NULL, NULL, '03 Jul 2021', 1, NULL, '2021-07-03 07:34:07', '2021-07-06 20:36:47'),
(12, 8, 6, 15, 'Post 3 ukm 2', 'post-3-ukm-2', NULL, '<p>dfgergfwedwae</p>', NULL, NULL, '03 Jul 2021', 0, NULL, '2021-07-03 07:35:44', '2021-07-03 07:54:35'),
(17, 4, 2, 11, 'Post 4 ukm 1', 'post-4-ukm-1', 'image/posts/1704625006960853.jpg', '<p style=\"margin-bottom: 15px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dui velit, molestie ac egestas ac, laoreet non neque. Morbi finibus tincidunt ex sed rutrum. Curabitur congue sapien pellentesque purus ultrices, vel bibendum erat pharetra. Ut est dolor, congue in commodo non, dapibus at lacus. Quisque faucibus pulvinar mauris, ut pulvinar nisi semper nec. Praesent ornare venenatis lectus, nec dapibus est consectetur id. Duis eget orci tincidunt, pulvinar ante vitae, consectetur arcu. Donec euismod augue turpis, sit amet commodo enim laoreet vitae. Donec commodo turpis ut eleifend facilisis. Ut mauris tellus, tempor nec scelerisque non, congue et diam. Praesent sit amet nisl eu magna bibendum facilisis ut euismod augue.</p><p style=\"margin-bottom: 15px;\">Quisque dignissim risus erat, non condimentum est aliquet a. Donec id tempor velit. Pellentesque rutrum accumsan luctus. Quisque tempus fermentum magna vitae aliquet. Donec id orci quis nibh iaculis vestibulum consequat ac odio. Quisque id felis at nibh molestie mollis. Phasellus placerat ultricies erat, sit amet pretium urna accumsan a. Nam pellentesque et nunc at tempor. Praesent id eros ac eros venenatis tincidunt ut congue enim. Sed sagittis dapibus dapibus. Proin semper neque ac nibh sodales sagittis. Pellentesque a molestie sapien, ut mollis ex. Proin eget eleifend sapien. Nunc hendrerit justo vel urna venenatis rutrum eget eget felis. Aenean aliquet accumsan dui, in tempor justo placerat quis. Nunc sed risus lorem.</p><p style=\"margin-bottom: 15px;\">Aliquam orci risus, congue id iaculis et, porta hendrerit nisi. Nullam porttitor augue non erat tincidunt ullamcorper. Quisque enim nibh, imperdiet venenatis efficitur in, condimentum eget erat. Sed sed dolor fringilla, efficitur libero nec, porttitor magna. Etiam vulputate sollicitudin nibh in porta. Nulla lacus orci, tincidunt non nibh a, consequat posuere ligula. Aenean orci turpis, elementum vel neque id, suscipit posuere eros. Ut feugiat ex odio, sit amet vestibulum arcu scelerisque vel. Vivamus nec pharetra nibh. Fusce eget elit et dolor tempor lobortis in sollicitudin lacus. Maecenas volutpat dui sollicitudin nisi sodales, sed varius mi euismod. Fusce vitae semper nulla.</p><p style=\"margin-bottom: 15px;\">Duis posuere scelerisque massa eu consequat. In ac molestie elit, ac facilisis mi. Nullam augue ex, porta a vulputate sit amet, congue sit amet est. Mauris ante nunc, dapibus facilisis dictum sit amet, dignissim id arcu. Maecenas eu magna at arcu malesuada ultrices. Cras ultricies enim vitae neque molestie, ac pretium odio lobortis. Suspendisse semper est vitae risus blandit cursus. Aliquam non viverra dolor, sit amet varius urna. Nulla ullamcorper, ante non iaculis tincidunt, felis ligula pulvinar libero, vel ultrices nulla augue id dolor. Donec posuere eros quis justo tincidunt tempor.</p>', 1, NULL, '07 Jul 2021', 7, NULL, '2021-07-05 00:49:35', '2021-07-08 21:58:04'),
(18, 5, 2, 7, 'sds fdsre', 'sds-fdsre', NULL, '<p style=\"margin-bottom: 15px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dui velit, molestie ac egestas ac, laoreet non neque. Morbi finibus tincidunt ex sed rutrum. Curabitur congue sapien pellentesque purus ultrices, vel bibendum erat pharetra. Ut est dolor, congue in commodo non, dapibus at lacus. Quisque faucibus pulvinar mauris, ut pulvinar nisi semper nec. Praesent ornare venenatis lectus, nec dapibus est consectetur id. Duis eget orci tincidunt, pulvinar ante vitae, consectetur arcu. Donec euismod augue turpis, sit amet commodo enim laoreet vitae. Donec commodo turpis ut eleifend facilisis. Ut mauris tellus, tempor nec scelerisque non, congue et diam. Praesent sit amet nisl eu magna bibendum facilisis ut euismod augue.</p><p style=\"margin-bottom: 15px;\">Quisque dignissim risus erat, non condimentum est aliquet a. Donec id tempor velit. Pellentesque rutrum accumsan luctus. Quisque tempus fermentum magna vitae aliquet. Donec id orci quis nibh iaculis vestibulum consequat ac odio. Quisque id felis at nibh molestie mollis. Phasellus placerat ultricies erat, sit amet pretium urna accumsan a. Nam pellentesque et nunc at tempor. Praesent id eros ac eros venenatis tincidunt ut congue enim. Sed sagittis dapibus dapibus. Proin semper neque ac nibh sodales sagittis. Pellentesque a molestie sapien, ut mollis ex. Proin eget eleifend sapien. Nunc hendrerit justo vel urna venenatis rutrum eget eget felis. Aenean aliquet accumsan dui, in tempor justo placerat quis. Nunc sed risus lorem.</p><p style=\"margin-bottom: 15px;\">Aliquam orci risus, congue id iaculis et, porta hendrerit nisi. Nullam porttitor augue non erat tincidunt ullamcorper. Quisque enim nibh, imperdiet venenatis efficitur in, condimentum eget erat. Sed sed dolor fringilla, efficitur libero nec, porttitor magna. Etiam vulputate sollicitudin nibh in porta. Nulla lacus orci, tincidunt non nibh a, consequat posuere ligula. Aenean orci turpis, elementum vel neque id, suscipit posuere eros. Ut feugiat ex odio, sit amet vestibulum arcu scelerisque vel. Vivamus nec pharetra nibh. Fusce eget elit et dolor tempor lobortis in sollicitudin lacus. Maecenas volutpat dui sollicitudin nisi sodales, sed varius mi euismod. Fusce vitae semper nulla.</p><p style=\"margin-bottom: 15px;\">Duis posuere scelerisque massa eu consequat. In ac molestie elit, ac facilisis mi. Nullam augue ex, porta a vulputate sit amet, congue sit amet est. Mauris ante nunc, dapibus facilisis dictum sit amet, dignissim id arcu. Maecenas eu magna at arcu malesuada ultrices. Cras ultricies enim vitae neque molestie, ac pretium odio lobortis. Suspendisse semper est vitae risus blandit cursus. Aliquam non viverra dolor, sit amet varius urna. Nulla ullamcorper, ante non iaculis tincidunt, felis ligula pulvinar libero, vel ultrices nulla augue id dolor. Donec posuere eros quis justo tincidunt tempor.</p>', 1, NULL, '07 Jul 2021', 1, NULL, '2021-07-06 20:33:49', '2021-07-07 04:27:39'),
(19, 6, 2, 7, 'post', 'post', 'image/posts/1704627822339643.jpg', '<p>isi post</p>', NULL, 1, '09 Jul 2021', 1, NULL, '2021-07-07 05:09:33', '2021-07-08 21:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Developer', NULL, NULL, NULL),
(2, 'Ketua', NULL, NULL, NULL),
(3, 'Admin', NULL, NULL, NULL),
(4, 'Anggota', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 7),
(1, 14),
(2, 15),
(4, 17),
(2, 18),
(3, 24),
(4, 25);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('QBZSArStBqNty1pvOC6QiYvPNYIFpDwUpbJrocSr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0FwczU1R2pMMmNFYUFBR2ZOUUJLMGZZZzJmbVBXREw3NE5ydFJodiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1625806885);

-- --------------------------------------------------------

--
-- Table structure for table `ukms`
--

CREATE TABLE `ukms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ukm_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `livetv` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_registration` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ukms`
--

INSERT INTO `ukms` (`id`, `ukm_name`, `description`, `image`, `slug`, `twitter`, `instagram`, `facebook`, `youtube`, `livetv`, `open_registration`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'UKM 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in ligula molestie, feugiat ipsum et, euismod ex. Mauris non finibus massa. Etiam libero nulla, iaculis quis interdum vitae, ultricies id neque. Ut a vulputate urna, ut tristique justo. Suspendisse ut viverra arcu. Suspendisse tristique, orci eu rhoncus consectetur, nibh diam facilisis orci, nec porta mauris metus at arcu. Suspendisse aliquam id nibh quis facilisis. Fusce sed ex diam. Praesent orci diam, convallis non accumsan sit amet, finibus quis velit. Duis pretium turpis id mi pellentesque porttitor. In consequat egestas iaculis. Curabitur nec gravida sem, non malesuada mauris. Vestibulum consectetur lobortis accumsan. Etiam ex odio, auctor molestie massa id, efficitur fermentum massa. Aliquam et leo tellus. Pellentesque nec urna orci.\r\n\r\nSed laoreet enim eget porttitor pellentesque. Vivamus vitae ullamcorper nunc, ac sagittis nulla. Aenean tristique vel nisl a rutrum. Vestibulum interdum nibh neque, ac imperdiet nunc aliquet vitae. Curabitur blandit, magna venenatis faucibus semper, quam libero viverra metus, nec blandit turpis ante at erat. Morbi consectetur rutrum erat, ut finibus massa tempor vitae. Pellentesque pharetra urna quis eleifend tempus. Suspendisse nisl nunc, imperdiet ac nisi quis, lacinia aliquam elit. In sed nunc arcu.', 'image/ukms/1704625045324547.png', 'ukm-1', 'https://twitter.com/Banyakcara2', 'https://www.instagram.com/tinglyhand/', 'https://web.facebook.com/profile.php?id=100004402000391', 'https://www.youtube.com/channel/UC8eVmTIqZh2UfSIJmBKLe4g', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/RXTzIK7S81A\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, NULL, '2021-06-21 06:38:03', '2021-07-07 04:26:55'),
(6, 'UKM 2', 'Deskripsi UKM 2', 'image/ukms/1704146145817068.png', 'ukm-2', NULL, NULL, NULL, 'https://www.youtube.com/channel/UC8eVmTIqZh2UfSIJmBKLe4g', NULL, 1, NULL, '2021-06-28 00:59:57', '2021-07-07 04:30:25'),
(9, 'UKM 3', 'Deskripsi UKM 3', NULL, 'ukm-3', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2021-07-04 22:56:30', '2021-07-04 22:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `ukm_pendaftars`
--

CREATE TABLE `ukm_pendaftars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ukm_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `leader` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ukm_pendaftars`
--

INSERT INTO `ukm_pendaftars` (`id`, `ukm_name`, `description`, `leader`, `email`, `password`, `created_at`, `updated_at`) VALUES
(15, 'UKM 5', 'Deskripsi UKM 5', 'ketua ukm 5', 'ketuaukm5@email.com', '$2y$10$YdRnrzLOArFt4AHVFXZLkuMeLHtq.7CGkR1YFjPWbvCK90.32NGpu', '2021-07-04 23:05:33', '2021-07-04 23:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukm_id` int(11) DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `ukm_id`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Developer', 'developer@email.com', '2021-07-04 22:08:54', '$2y$10$90vyf01JfnB.nUHtzHozn.k/KskXXQCXfcc.ARgEaGnUuKaKU5oWC', NULL, NULL, NULL, NULL, NULL, 'image/users/1704000094127173.jpg', NULL, '2021-07-04 22:08:54', NULL),
(7, 'ketua ukm 1', 'ketuaukm1@email.com', '2021-07-04 22:07:50', '$2y$10$kzy6ksXQ8Q5NHD4LxgnkyeieOF5Lp4kpLJvVSYUnoLmxwz3GcpSBG', 2, NULL, NULL, 'EmspiWhxOvMEijx7Fdn1hF7evgyQHyzAfWz9hR8y1NzFNgVgtuZOruM4Ojx8', NULL, 'image/users/1704624856960704.jpeg', '2021-06-21 06:38:03', '2021-07-07 04:22:25', NULL),
(14, 'Developer2', 'developer2@email.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'ketua ukm 2', 'ketuaukm2@email.com', '2021-07-07 04:28:49', '$2y$10$Q1RXo.kvvD1AcQsOpKTRXurs63YAb7wC8Wpx1BUHQxmI3s2aPdgD6', 6, NULL, NULL, NULL, NULL, NULL, '2021-06-28 00:59:57', '2021-07-07 04:28:49', NULL),
(17, 'anggota ukm 2 #1', 'anggotaukm2#1@email.com', NULL, '$2y$10$xM5AemJBeEmkrawhzAhQYu2AlzkmnI8Cn9e/bJ5vgQXsFaAvtfbte', 6, NULL, NULL, NULL, NULL, NULL, '2021-07-01 19:14:13', '2021-07-03 07:54:35', NULL),
(18, 'ketua ukm 3', 'ketuaukm3@email.com', '2021-07-04 23:20:29', '$2y$10$6/4R9foqQQ.28TppaMRTEOzIN7uLqU2qQf/xC8tSLMdxVbwVQFiyG', 9, NULL, NULL, NULL, NULL, NULL, '2021-07-04 22:56:30', '2021-07-04 23:20:29', NULL),
(24, 'admin ukm 1', 'adminukm1@email.com', '2021-07-07 04:54:29', '$2y$10$W9ytQvk.kND8TNZmTQKb.ewodYMaCxKMiClLSbljMd3JefLkkllFu', 2, NULL, NULL, NULL, NULL, NULL, '2021-07-07 04:53:17', '2021-07-07 04:54:29', NULL),
(25, 'anggota ukm 1', 'anggotaukm1@email.com', '2021-07-07 05:04:31', '$2y$10$H7FEleIhsAaBbZmrRuGcFeOcrj23sfqygToKOg6TSByE6tbqVE2KO', 2, NULL, NULL, NULL, NULL, NULL, '2021-07-07 05:02:13', '2021-07-07 05:04:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_pendaftars`
--

CREATE TABLE `user_pendaftars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukm_id` int(11) NOT NULL,
  `reason_joining` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `permission_role_role_id_foreign` (`role_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `ukms`
--
ALTER TABLE `ukms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ukm_pendaftars`
--
ALTER TABLE `ukm_pendaftars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_pendaftars`
--
ALTER TABLE `user_pendaftars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ukms`
--
ALTER TABLE `ukms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ukm_pendaftars`
--
ALTER TABLE `ukm_pendaftars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_pendaftars`
--
ALTER TABLE `user_pendaftars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
