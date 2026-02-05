-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2026 at 12:58 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakso_ciomas`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_maps_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operational_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_main` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `address`, `phone`, `google_maps_url`, `operational_hours`, `is_main`, `created_at`, `updated_at`) VALUES
(1, 'BBC', '222', '082123368495', 'https://maps.app.goo.gl/Wmo8ZDzZq7XUcJ3k8', NULL, 1, '2026-01-31 21:39:49', '2026-01-31 21:39:49'),
(2, 'BBC', 'Z', '082123368495', 'https://www.google.com/maps/search/?api=1&query=Bakso+Bunderan+Ciomas+Bogor+Jalan+Villa+Ciomas', NULL, 1, '2026-01-31 21:41:29', '2026-01-31 21:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `menu_item_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `price` decimal(10,2) NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_recommended` tinyint(1) NOT NULL DEFAULT '0',
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `category`, `description`, `price`, `image_path`, `is_recommended`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(5, 'Bakso Urat', 'bakso', 'Bakso dengan daging urat pilihan yang kenyal dan gurih', 25000.00, 'menu-items/zcTsJDc6L3Tppv72h3vttMKXMKnD7wcw30LSbzNP.jpg', 1, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:33:28'),
(6, 'Bakso Halus', 'bakso', 'Bakso dengan tekstur halus dan lembut', 23000.00, 'menu-items/CuKJWdQAUaptiRZP2f8rh6AjlLomDtF5LtZAvOZX.jpg', 0, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:34:07'),
(7, 'Bakso Jumbo', 'bakso', 'Bakso ukuran jumbo dengan daging lebih banyak', 35000.00, 'menu-items/JCFekQ5IQ19ceXeEhejxqz0VtVzEtlYBx4cnZS9R.jpg', 1, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:33:57'),
(8, 'Bakso Telur', 'bakso', 'Bakso dengan isian telur rebus di dalamnya', 28000.00, NULL, 0, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:23:19'),
(9, 'Bakso Beranak', 'bakso', 'Bakso besar dengan bakso kecil di dalamnya', 32000.00, 'menu-items/WEDdItNvpFPi1m2MJRtv0HklSPvzszqdtGyK54wQ.jpg', 1, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:35:42'),
(10, 'Mie Ayam', 'mie', 'Mie ayam dengan topping ayam suwir dan sayuran', 22000.00, 'menu-items/A5grrwnHOsLzoBF6gvD3RqMJBm8Fme7rfVFedLcv.jpg', 1, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:33:47'),
(11, 'Mie Ayam Bakso', 'mie', 'Kombinasi mie ayam dengan bakso', 28000.00, 'menu-items/7MvffPeaYaysoCAsw4gIr59O6soB5JkA9AyIOnpn.jpg', 1, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:35:52'),
(12, 'Mie Goreng', 'mie', 'Mie goreng dengan topping ayam dan sayuran', 20000.00, NULL, 0, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:23:19'),
(13, 'Kwetiau Goreng', 'mie', 'Kwetiau goreng dengan seafood dan sayuran', 25000.00, NULL, 0, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:23:19'),
(14, 'Mie Rebus', 'mie', 'Mie rebus dengan kaldu gurih', 18000.00, NULL, 0, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:23:19'),
(15, 'Es Teh Manis', 'minuman', 'Teh manis dingin yang segar', 8000.00, NULL, 1, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:23:19'),
(16, 'Es Teh Tawar', 'minuman', 'Teh tawar dingin tanpa gula', 6000.00, NULL, 0, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:23:19'),
(17, 'Teh Hangat', 'minuman', 'Teh hangat yang nikmat', 5000.00, NULL, 0, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:23:19'),
(18, 'Es Jeruk', 'minuman', 'Jeruk segar dengan es', 10000.00, NULL, 1, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:23:19'),
(19, 'Es Campur', 'minuman', 'Campuran buah segar dengan es dan susu', 15000.00, NULL, 1, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:23:19'),
(20, 'Jus Alpukat', 'minuman', 'Jus alpukat segar dengan susu', 18000.00, NULL, 0, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:23:19'),
(21, 'Jus Mangga', 'minuman', 'Jus mangga manis dan segar', 16000.00, NULL, 0, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:23:19'),
(22, 'Bakso Mercon', 'bakso', 'Bakso pedas dengan cabai mercon', 30000.00, NULL, 0, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:23:19'),
(23, 'Bakso Iga', 'bakso', 'Bakso dengan iga sapi yang empuk', 45000.00, NULL, 1, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:23:19'),
(24, 'Mie Aceh', 'mie', 'Mie khas Aceh dengan bumbu rempah', 30000.00, NULL, 0, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:23:19'),
(25, 'Es Teh Lemon', 'minuman', 'Teh dengan perasan lemon segar', 12000.00, NULL, 0, 0, 1, '2026-02-03 09:23:19', '2026-02-03 09:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_29_121855_create_posts_table', 1),
(5, '2026_01_29_122115_create_testimonials_table', 1),
(6, '2026_02_01_031525_create_menu_items_table', 1),
(7, '2026_02_01_031712_create_orders_table', 1),
(8, '2026_02_01_033656_create_branches_table', 1),
(9, '2026_02_01_042154_rename_image_url_to_image_path_in_menu_items_table', 2),
(10, '2026_02_01_044706_add_order_id_to_testimonials_table', 3),
(11, '2026_02_02_074545_add_role_to_users_table', 3),
(12, '2026_02_04_002932_create_carts_table', 3),
(13, '2026_02_04_003000_add_indexes_to_carts_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_items` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('pending','processing','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `delivery_method` enum('gofood','shopeefood','direct','pickup') COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6zdUynYyMCVnsxbBFFT4IAjNdyApJcTt0X6ny8vI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid2VSM011MmFSODFEN202MmFGeXdPVDBFWVJoN202VVRkbjNHN1VtcCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czoxMDoidXNlci5sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTA6ImFkbWluX3VzZXIiO2E6Mzp7czo4OiJ1c2VybmFtZSI7czoxMDoiYmJjamF5YTEyMyI7czo0OiJuYW1lIjtzOjEzOiJBZG1pbmlzdHJhdG9yIjtzOjEwOiJsb2dpbl90aW1lIjtPOjI1OiJJbGx1bWluYXRlXFN1cHBvcnRcQ2FyYm9uIjozOntzOjQ6ImRhdGUiO3M6MjY6IjIwMjYtMDItMDUgMDA6NDE6MTAuOTY3OTc0IjtzOjEzOiJ0aW1lem9uZV90eXBlIjtpOjM7czo4OiJ0aW1lem9uZSI7czozOiJVVEMiO319fQ==', 1770253030),
('QDZAlwtrQEGicDrZpVqRnziSKc4TpFuZF2qRUzHh', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNXFhUVBHMWZjUWw5alE4UE84S0dRa1FBcU8yaGVTd0VLQzd3anVnRyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvY2FydC1jb3VudCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxMDoiYWRtaW5fdXNlciI7YTozOntzOjg6InVzZXJuYW1lIjtzOjEwOiJiYmNqYXlhMTIzIjtzOjQ6Im5hbWUiO3M6MTM6IkFkbWluaXN0cmF0b3IiO3M6MTA6ImxvZ2luX3RpbWUiO086MjU6IklsbHVtaW5hdGVcU3VwcG9ydFxDYXJib24iOjM6e3M6NDoiZGF0ZSI7czoyNjoiMjAyNi0wMi0wNCAwMDoxNDo0My43MDY1NjIiO3M6MTM6InRpbWV6b25lX3R5cGUiO2k6MztzOjg6InRpbWV6b25lIjtzOjM6IlVUQyI7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1770181699);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL DEFAULT '5',
  `admin_reply` text COLLATE utf8mb4_unicode_ci,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `customer_name`, `content`, `rating`, `admin_reply`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 'w', 'w', 5, NULL, 1, '2026-01-31 21:16:29', '2026-01-31 21:28:42'),
(2, 'w', 'w', 5, NULL, 1, '2026-01-31 21:16:30', '2026-01-31 21:28:44'),
(3, 'b', 'jlek lol', 1, NULL, 1, '2026-01-31 21:33:17', '2026-01-31 21:33:30'),
(4, 'b', 'egft', 5, NULL, 1, '2026-02-01 17:53:06', '2026-02-01 17:54:38'),
(5, 'b', 'egft', 5, NULL, 0, '2026-02-01 17:53:10', '2026-02-01 17:53:10'),
(6, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:12', '2026-02-01 17:53:12'),
(7, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:13', '2026-02-01 17:53:13'),
(8, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:13', '2026-02-01 17:53:13'),
(9, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:14', '2026-02-01 17:53:14'),
(10, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:15', '2026-02-01 17:53:15'),
(11, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:15', '2026-02-01 17:53:15'),
(12, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:16', '2026-02-01 17:53:16'),
(13, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:16', '2026-02-01 17:53:16'),
(14, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:17', '2026-02-01 17:53:17'),
(15, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:17', '2026-02-01 17:53:17'),
(16, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:18', '2026-02-01 17:53:18'),
(17, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:18', '2026-02-01 17:53:18'),
(18, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:19', '2026-02-01 17:53:19'),
(19, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:19', '2026-02-01 17:53:19'),
(20, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:19', '2026-02-01 17:53:19'),
(21, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:20', '2026-02-01 17:53:20'),
(22, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:20', '2026-02-01 17:53:20'),
(23, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:21', '2026-02-01 17:53:21'),
(24, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:21', '2026-02-01 17:53:21'),
(25, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:21', '2026-02-01 17:53:21'),
(26, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:22', '2026-02-01 17:53:22'),
(27, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:22', '2026-02-01 17:53:22'),
(28, 'b', 'egft', 4, NULL, 0, '2026-02-01 17:53:22', '2026-02-01 17:53:22'),
(29, 'jh', 'egft', 4, NULL, 0, '2026-02-01 17:53:23', '2026-02-01 17:53:23'),
(30, 'jh', 'egft', 4, NULL, 0, '2026-02-01 17:53:23', '2026-02-01 17:53:23'),
(31, 'jh', 'egft', 4, NULL, 0, '2026-02-01 17:53:24', '2026-02-01 17:53:24'),
(32, 'jh', 'egft', 4, NULL, 0, '2026-02-01 17:53:24', '2026-02-01 17:53:24'),
(33, 'jh', 'egft', 4, NULL, 0, '2026-02-01 17:53:25', '2026-02-01 17:53:25'),
(34, 'jh', 'egft', 4, NULL, 0, '2026-02-01 17:53:25', '2026-02-01 17:53:25'),
(35, 'jh', 'egft', 4, NULL, 0, '2026-02-01 17:53:29', '2026-02-01 17:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'yanzy', 'yanzy234@gmail.com', 'user', NULL, '$2y$12$sDXIpwm786umZGCubgoQtOBFbtSGiOmfW6JphHm8grDPsxqP5E9D2', NULL, '2026-02-03 08:42:52', '2026-02-03 08:42:52'),
(2, 'yanz2', 'yanz2@gmail.com', 'user', NULL, '$2y$12$7GN7oL9EpvKyb8lXHhSXKuIdR/bHtim4gxJOMgqWoBxSckAcXY/Pa', NULL, '2026-02-03 08:45:10', '2026-02-03 08:45:10'),
(3, 'jbsjb', 'lamoeq@gmail.com', 'user', NULL, '$2y$12$dKRCauUSjugs6eJ/O5z/hO1TWE3VStIqbrliXgFPT1G/6tQs2bbWy', NULL, '2026-02-03 17:16:08', '2026-02-03 17:16:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carts_user_id_menu_item_id_unique` (`user_id`,`menu_item_id`),
  ADD KEY `cart_user_menu_index` (`user_id`,`menu_item_id`),
  ADD KEY `cart_user_index` (`user_id`),
  ADD KEY `cart_menu_item_index` (`menu_item_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_menu_item_id_foreign` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
