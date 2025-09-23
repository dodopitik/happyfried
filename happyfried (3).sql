-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2025 at 12:36 PM
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
-- Database: `happyfried`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', 'Delicious and juicy burgers made with fresh ingredients.', NULL, NULL, NULL),
(2, 'Minuman', 'Crispy fries, onion rings, and other tasty sides to complement your meal.', NULL, NULL, NULL);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `category_id`, `image`, `is_available`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Indomie Goreng Telur', 'Nihil totam ea vel rerum neque. Molestiae animi accusamus voluptatem optio impedit. Pariatur ut labore nihil et aspernatur odit illum molestias.', 15000, 1, 'https://images.unsplash.com/photo-1730177871173-94898b9a17ec', 1, NULL, '2025-09-01 16:28:03', '2025-09-01 16:28:03'),
(2, 'Indomie Goreng', 'mie instan goreng khas Indonesia dengan rasa gurih manis yang lezat dan menggugah selera.', 10000, 1, 'https://images.unsplash.com/photo-1612929633738-8fe44f7ec841', 1, NULL, '2025-09-01 16:28:03', '2025-09-01 16:28:03'),
(3, 'Indomie Rebus', 'mie instan goreng khas Indonesia dengan rasa gurih manis yang lezat dan menggugah selera.', 10000, 1, 'https://images.unsplash.com/photo-1612927601601-6638404737ce', 1, NULL, '2025-09-01 16:28:03', '2025-09-01 16:28:03'),
(4, 'Es Teh', 'Teh dingin klasik yang menyegarkan, cocok diminum kapan saja.', 5000, 2, 'https://images.unsplash.com/photo-1499638673689-79a0b5115d87', 1, NULL, '2025-09-01 16:28:03', '2025-09-01 16:28:03'),
(5, 'Es Jeruk', 'Minuman segar dari perasan jeruk asli dengan rasa manis asam alami.', 5000, 2, 'https://images.unsplash.com/photo-1574689685526-a9281777ee89', 1, NULL, '2025-09-01 16:28:03', '2025-09-01 16:28:03'),
(6, 'Es Lemon Tea', 'Reprehenderit ut libero ea autem sapiente. Voluptatem quia rerum sed eum adipisci ipsam. Officiis et odit dolore quia sint sequi. Molestiae cupiditate deleniti quia ad ut.', 5000, 2, 'https://images.unsplash.com/photo-1556679343-c7306c1976bc', 1, NULL, '2025-09-01 16:28:03', '2025-09-01 16:28:03'),
(7, 'Es Dawet', 'Rem temporibus sint et voluptate. Voluptate voluptatem ratione qui. Molestiae illo quia excepturi nesciunt sunt magnam.', 5000, 2, 'https://plus.unsplash.com/premium_photo-1695750678195-beb8ba487094', 1, NULL, '2025-09-01 16:28:03', '2025-09-01 16:28:03'),
(8, 'Nasi Goreng', 'Amet velit distinctio totam quis. Quo error optio labore consectetur culpa. Dolor nam quos fuga facere earum commodi ea quis.', 19000, 1, 'https://plus.unsplash.com/premium_photo-1664391895725-ed1819010135', 1, NULL, '2025-09-01 16:28:03', '2025-09-01 16:28:03'),
(9, 'Es Chocolatos', 'Et pariatur quia qui est. Rem magnam dolorem adipisci dolorum perferendis unde voluptates magnam. Temporibus quidem itaque omnis et eum est quia.', 19000, 2, 'https://images.unsplash.com/photo-1653122025865-5e75e63cf4ba', 1, NULL, '2025-09-01 16:28:03', '2025-09-01 16:28:03'),
(10, 'Kopi Hitam', 'Ipsam sint quisquam minus nesciunt quia. Ullam fugiat cumque voluptas atque iure aut. Sed sed ipsam natus adipisci eos eius quaerat.', 19000, 2, 'https://images.unsplash.com/photo-1689453014159-05751017e5b0', 1, NULL, '2025-09-01 16:28:03', '2025-09-01 16:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0000_create_categories_table', 1),
(2, '0001_01_01_000000_create_roles_table', 1),
(3, '0001_01_01_000000_create_users_table', 1),
(4, '0001_01_01_000001_create_cache_table', 1),
(5, '0001_01_01_000002_create_jobs_table', 1),
(6, '2025_08_28_195447_create_items_table', 1),
(7, '2025_08_28_201320_create_orders_table', 1),
(8, '2025_08_28_201328_create_order_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `grandtotal` int(11) NOT NULL,
  `status` enum('pending','settlement','cooked') NOT NULL DEFAULT 'pending',
  `table_number` int(11) NOT NULL,
  `payment_method` enum('cash','qris') NOT NULL DEFAULT 'cash',
  `notes` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `user_id`, `subtotal`, `tax`, `grandtotal`, `status`, `table_number`, `payment_method`, `notes`, `deleted_at`, `created_at`, `updated_at`) VALUES
(14, 'ORD-12-1757603916', 11, 39000, 3900, 43290, 'pending', 12, 'cash', NULL, NULL, '2025-09-11 15:18:36', '2025-09-11 15:18:36'),
(15, 'ORD-7-1757607746', 17, 96000, 9600, 106560, 'pending', 7, 'cash', NULL, NULL, '2025-09-11 16:22:26', '2025-09-11 16:22:26'),
(16, 'ORD-7-1757608205', 11, 15000, 1500, 16650, 'pending', 7, 'cash', NULL, NULL, '2025-09-11 16:30:05', '2025-09-11 16:30:05'),
(17, 'ORD-7-1757613569', 19, 97000, 9700, 107670, 'pending', 7, 'qris', NULL, NULL, '2025-09-11 17:59:29', '2025-09-11 17:59:29'),
(18, 'ORD-7-1757613900', 20, 24000, 2400, 26640, 'pending', 7, 'qris', NULL, NULL, '2025-09-11 18:05:00', '2025-09-11 18:05:00'),
(19, 'ORD-7-1757614084', 20, 48000, 4800, 53280, 'pending', 7, 'qris', NULL, NULL, '2025-09-11 18:08:04', '2025-09-11 18:08:04'),
(20, 'ORD-9-1757614342', 11, 24000, 2400, 26640, 'pending', 9, 'qris', NULL, NULL, '2025-09-11 18:12:22', '2025-09-11 18:12:22'),
(21, 'ORD-7-1757614858', 11, 68000, 6800, 75480, 'pending', 7, 'qris', NULL, NULL, '2025-09-11 18:20:58', '2025-09-11 18:20:58'),
(22, 'ORD-7-1757614976', 17, 24000, 2400, 26640, 'settlement', 7, 'qris', NULL, NULL, '2025-09-11 18:22:56', '2025-09-11 18:25:13'),
(23, 'ORD-7-1757615218', 17, 63000, 6300, 69930, 'settlement', 7, 'qris', NULL, NULL, '2025-09-11 18:26:58', '2025-09-11 18:27:34'),
(24, 'ORD-7-1757615585', 21, 78000, 7800, 86580, 'settlement', 7, 'qris', NULL, NULL, '2025-09-11 18:33:05', '2025-09-11 18:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `quantity`, `price`, `tax`, `total_price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(30, 14, 9, 1, 19000, 2090, 21090, NULL, '2025-09-11 15:18:36', '2025-09-11 15:18:36'),
(31, 14, 7, 1, 5000, 550, 5550, NULL, '2025-09-11 15:18:36', '2025-09-11 15:18:36'),
(32, 14, 5, 3, 15000, 1650, 16650, NULL, '2025-09-11 15:18:36', '2025-09-11 15:18:36'),
(33, 15, 9, 4, 76000, 8360, 84360, NULL, '2025-09-11 16:22:26', '2025-09-11 16:22:26'),
(34, 15, 7, 2, 10000, 1100, 11100, NULL, '2025-09-11 16:22:26', '2025-09-11 16:22:26'),
(35, 15, 5, 2, 10000, 1100, 11100, NULL, '2025-09-11 16:22:26', '2025-09-11 16:22:26'),
(36, 16, 7, 2, 10000, 1100, 11100, NULL, '2025-09-11 16:30:05', '2025-09-11 16:30:05'),
(37, 16, 5, 1, 5000, 550, 5550, NULL, '2025-09-11 16:30:05', '2025-09-11 16:30:05'),
(38, 17, 9, 3, 57000, 6270, 63270, NULL, '2025-09-11 17:59:29', '2025-09-11 17:59:29'),
(39, 17, 2, 1, 10000, 1100, 11100, NULL, '2025-09-11 17:59:29', '2025-09-11 17:59:29'),
(40, 17, 1, 2, 30000, 3300, 33300, NULL, '2025-09-11 17:59:29', '2025-09-11 17:59:29'),
(41, 18, 9, 1, 19000, 2090, 21090, NULL, '2025-09-11 18:05:00', '2025-09-11 18:05:00'),
(42, 18, 7, 1, 5000, 550, 5550, NULL, '2025-09-11 18:05:00', '2025-09-11 18:05:00'),
(43, 19, 9, 2, 38000, 4180, 42180, NULL, '2025-09-11 18:08:04', '2025-09-11 18:08:04'),
(44, 19, 7, 2, 10000, 1100, 11100, NULL, '2025-09-11 18:08:04', '2025-09-11 18:08:04'),
(45, 20, 9, 1, 19000, 2090, 21090, NULL, '2025-09-11 18:12:22', '2025-09-11 18:12:22'),
(46, 20, 7, 1, 5000, 550, 5550, NULL, '2025-09-11 18:12:22', '2025-09-11 18:12:22'),
(47, 21, 9, 1, 19000, 2090, 21090, NULL, '2025-09-11 18:20:58', '2025-09-11 18:20:58'),
(48, 21, 7, 1, 5000, 550, 5550, NULL, '2025-09-11 18:20:58', '2025-09-11 18:20:58'),
(49, 21, 3, 1, 10000, 1100, 11100, NULL, '2025-09-11 18:20:58', '2025-09-11 18:20:58'),
(50, 21, 10, 1, 19000, 2090, 21090, NULL, '2025-09-11 18:20:58', '2025-09-11 18:20:58'),
(51, 21, 1, 1, 15000, 1650, 16650, NULL, '2025-09-11 18:20:58', '2025-09-11 18:20:58'),
(52, 22, 9, 1, 19000, 2090, 21090, NULL, '2025-09-11 18:22:56', '2025-09-11 18:22:56'),
(53, 22, 7, 1, 5000, 550, 5550, NULL, '2025-09-11 18:22:56', '2025-09-11 18:22:56'),
(54, 23, 9, 2, 38000, 4180, 42180, NULL, '2025-09-11 18:26:58', '2025-09-11 18:26:58'),
(55, 23, 7, 2, 10000, 1100, 11100, NULL, '2025-09-11 18:26:58', '2025-09-11 18:26:58'),
(56, 23, 5, 3, 15000, 1650, 16650, NULL, '2025-09-11 18:26:58', '2025-09-11 18:26:58'),
(57, 24, 9, 1, 19000, 2090, 21090, NULL, '2025-09-11 18:33:05', '2025-09-11 18:33:05'),
(58, 24, 5, 1, 5000, 550, 5550, NULL, '2025-09-11 18:33:05', '2025-09-11 18:33:05'),
(59, 24, 6, 1, 5000, 550, 5550, NULL, '2025-09-11 18:33:05', '2025-09-11 18:33:05'),
(60, 24, 3, 1, 10000, 1100, 11100, NULL, '2025-09-11 18:33:05', '2025-09-11 18:33:05'),
(61, 24, 2, 2, 20000, 2200, 22200, NULL, '2025-09-11 18:33:05', '2025-09-11 18:33:05'),
(62, 24, 8, 1, 19000, 2090, 21090, NULL, '2025-09-11 18:33:05', '2025-09-11 18:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator ', NULL, NULL, NULL),
(2, 'cashier', 'cashier', NULL, NULL, NULL),
(3, 'chef', 'chef', NULL, NULL, NULL),
(4, 'customer', 'pelanggan', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `phone`, `role_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'mckenzie.miles', '$2y$12$W.LbmHL.gm1c6MxEHk2QcefUPCSPbwas.d0KRlxBXkmrI7VvHsrva', 'Camron Luettgen', 'ruecker.jeffery@example.com', '305.617.3176', 4, NULL, '2025-09-01 15:32:50', '2025-09-01 15:32:50'),
(2, 'uabernathy', '$2y$12$NhtJNIm54ITEHLdR/SNlEuOQ6oZD//mZkv5KLTCzNRSucDj/fGaKW', 'Marty Bartoletti', 'ohamill@example.net', '786-288-8587', 1, NULL, '2025-09-01 15:32:50', '2025-09-01 15:32:50'),
(3, 'jakob.fisher', '$2y$12$LWT9sR1a4aR1O1wVtsKeIuXfb8ic8ZJq3mX8iJMd9DaCr1CbLZl5S', 'Kyla Parisian', 'lubowitz.dylan@example.com', '458.841.1713', 1, NULL, '2025-09-01 15:32:50', '2025-09-01 15:32:50'),
(4, 'einar.braun', '$2y$12$EyBjrO0/UQne1FPDOpAXwOdi74B4SrIbJ8LRxhtV7l9oZ26S.h3AC', 'Novella Ullrich', 'clarabelle.kessler@example.com', '1-267-595-9820', 1, NULL, '2025-09-01 15:32:50', '2025-09-01 15:32:50'),
(5, 'thelma.robel', '$2y$12$PgFm8EOG9jrqFGycPpY19OpWcCbeqSF5xnzmZd81ZmNSqqLS9RqbW', 'Craig Jacobson', 'oconnell.maribel@example.org', '+1 (283) 609-5700', 3, NULL, '2025-09-01 15:32:50', '2025-09-01 15:32:50'),
(6, 'myrl.cassin', '$2y$12$qKmusIk9xGHzKx86wbMshehX4D3N/tjzwbxha3aJYvbZaiGLhza1u', 'Skylar Koelpin', 'rohan.jazmyn@example.com', '505.799.2609', 1, NULL, '2025-09-01 15:32:50', '2025-09-01 15:32:50'),
(7, 'klocko.tremaine', '$2y$12$I/1VajvpWFhaFtSYfd8jQ.4PhqTiskksSbR/L74vvJxCBs3DIqpt6', 'Prof. Evie Tillman', 'zackary77@example.net', '(430) 222-6441', 3, NULL, '2025-09-01 15:32:50', '2025-09-01 15:32:50'),
(8, 'cory43', '$2y$12$l7.ANdONDu9FQdjarWvqEOSLZ4e11cHqEHes7INRF.DayvtNRl6ra', 'Leopoldo Abbott', 'hschmidt@example.net', '865-473-0002', 2, NULL, '2025-09-01 15:32:50', '2025-09-01 15:32:50'),
(9, 'tillman.florida', '$2y$12$CiXFCwVbR9p5n/Q3uB1/ZO8mYRKirdx6Xm1FG8Uy2VH2bChwluJj2', 'Charlotte Spencer', 'halvorson.annetta@example.net', '505-547-0786', 1, NULL, '2025-09-01 15:32:50', '2025-09-01 15:32:50'),
(10, 'hokeefe', '$2y$12$qCYwzUgUJ30xpFKfyrxvYO8wAD1wVP9iSnn4h9zlrJCNfEpF9zIt6', 'Timothy Brown', 'jena72@example.org', '1-832-452-3829', 2, NULL, '2025-09-01 15:32:50', '2025-09-01 15:32:50'),
(11, NULL, NULL, 'barat', NULL, '0895363076706', 4, NULL, '2025-09-04 20:44:48', '2025-09-04 20:44:48'),
(12, NULL, NULL, 'baratrr', NULL, '0895363076702', 4, NULL, '2025-09-11 10:52:35', '2025-09-11 10:52:35'),
(13, NULL, NULL, 'ratri', NULL, '0895363076701', 4, NULL, '2025-09-11 10:59:29', '2025-09-11 10:59:29'),
(14, NULL, NULL, 'baratrr', NULL, '0895363076706', 4, NULL, '2025-09-11 11:48:10', '2025-09-11 11:48:10'),
(15, NULL, NULL, 'barat', NULL, '0895363076702', 4, NULL, '2025-09-11 11:52:27', '2025-09-11 11:52:27'),
(16, NULL, NULL, 'ratri', NULL, '0895363076702', 4, NULL, '2025-09-11 12:06:57', '2025-09-11 12:06:57'),
(17, NULL, NULL, 'ratri', NULL, '0895363076706', 4, NULL, '2025-09-11 16:22:26', '2025-09-11 16:22:26'),
(18, NULL, NULL, 'tomo', NULL, '08953630767011', 4, NULL, '2025-09-11 17:57:10', '2025-09-11 17:57:10'),
(19, NULL, NULL, 'tomo', NULL, '089536307670', 4, NULL, '2025-09-11 17:59:29', '2025-09-11 17:59:29'),
(20, NULL, NULL, 'tomo', NULL, '0895363076701', 4, NULL, '2025-09-11 18:05:00', '2025-09-11 18:05:00'),
(21, NULL, NULL, 'tomo', NULL, '0895363076706', 4, NULL, '2025-09-11 18:33:05', '2025-09-11 18:33:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_category_id_foreign` (`category_id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_code_unique` (`order_code`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_item_id_foreign` (`item_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_name_unique` (`role_name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
