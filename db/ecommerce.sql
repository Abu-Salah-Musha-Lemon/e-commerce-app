-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2024 at 10:27 AM
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
-- Database: `ecommerce`
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
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `subCategory_count` int(11) NOT NULL DEFAULT 0,
  `product_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `subCategory_count`, `product_count`, `created_at`, `updated_at`) VALUES
(1, 'Fashion', 'fashion', 9, 21, '2024-09-25 01:15:50', '2024-09-25 01:59:58');

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
(96, '0001_01_01_000000_create_users_table', 1),
(97, '0001_01_01_000001_create_cache_table', 1),
(98, '0001_01_01_000002_create_jobs_table', 1),
(99, '2024_07_29_060808_laratrust_setup_tables', 1),
(100, '2024_07_29_063956_create_dashboards_table', 1),
(101, '2024_07_29_070631_create_sub_categories_table', 1),
(102, '2024_07_29_070631_create_subcategories_table', 1),
(103, '2024_07_29_070631_create_subcategory_table', 1),
(104, '2024_07_29_071951_create_categories_table', 1),
(105, '2024_07_29_071951_create_category_table', 1),
(106, '2024_07_29_171637_create_products_table', 1),
(107, '2024_08_04_020350_create_cards_table', 1),
(108, '2024_08_07_170247_create_shopping_addresses_table', 1),
(109, '2024_08_10_050842_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `ProductId` bigint(20) UNSIGNED NOT NULL,
  `ProductPrice` decimal(8,2) NOT NULL,
  `ProductQty` int(11) NOT NULL,
  `userPhone` varchar(255) NOT NULL,
  `userPresentAddress` varchar(255) NOT NULL,
  `userPostalCode` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2024-09-25 01:11:48', '2024-09-25 01:11:48'),
(2, 'users-read', 'Read Users', 'Read Users', '2024-09-25 01:11:48', '2024-09-25 01:11:48'),
(3, 'users-update', 'Update Users', 'Update Users', '2024-09-25 01:11:48', '2024-09-25 01:11:48'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2024-09-25 01:11:48', '2024-09-25 01:11:48'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2024-09-25 01:11:48', '2024-09-25 01:11:48'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2024-09-25 01:11:48', '2024-09-25 01:11:48'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2024-09-25 01:11:48', '2024-09-25 01:11:48'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2024-09-25 01:11:48', '2024-09-25 01:11:48'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2024-09-25 01:11:48', '2024-09-25 01:11:48'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2024-09-25 01:11:48', '2024-09-25 01:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(10, 1),
(10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_short_des` text NOT NULL,
  `product_des` text NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_subcategory_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_short_des`, `product_des`, `product_price`, `product_category_id`, `product_subcategory_id`, `product_quantity`, `product_img`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Organic Cotton T-Shirt', 'Soft, breathable tee', 'Made from 100% organic cotton, this t-shirt offers unparalleled comfort and breathability, perfect for casual outings or lounging at home.', 19.99, 1, 1, 200, '1811151905891831.jpeg', 'organic-cotton-t-shirt', '2024-09-25 01:24:15', '2024-09-25 01:24:15'),
(2, 'Recycled Polyester Jacket', 'Eco-friendly jacket', 'This stylish jacket is crafted from recycled polyester, providing warmth and protection while reducing environmental impact. Ideal for transitional weather.', 49.99, 1, 2, 200, '1811152073767870.jpeg', 'recycled-polyester-jacket', '2024-09-25 01:26:55', '2024-09-25 01:26:55'),
(3, 'Linen Summer Dress', 'Lightweight summer dress', 'Made from breathable linen, this dress is perfect for warm days. Its relaxed fit and elegant design make it versatile for both casual and dressy occasions.', 34.99, 1, 3, 200, '1811152192340778.jpeg', 'linen-summer-dress', '2024-09-25 01:28:48', '2024-09-25 01:28:48'),
(4, 'Bamboo Fiber Socks', 'Comfortable and soft socks', 'These eco-friendly socks made from bamboo fiber provide exceptional comfort and moisture-wicking properties, making them perfect for everyday wear.', 9.99, 1, 9, 200, '1811152310457121.jpeg', 'bamboo-fiber-socks', '2024-09-25 01:30:41', '2024-09-25 01:30:41'),
(5, 'Bamboo Fiber Socks', 'Comfortable and soft socks', 'These eco-friendly socks made from bamboo fiber provide exceptional comfort and moisture-wicking properties, making them perfect for everyday wear.', 9.99, 1, 9, 200, '1811152310968109.jpeg', 'bamboo-fiber-socks', '2024-09-25 01:30:42', '2024-09-25 01:30:42'),
(6, 'Denim Jeans', 'Classic denim jeans', 'Timeless and versatile, these denim jeans feature a flattering fit and durable fabric, making them a staple in any wardrobe for casual or smart-casual looks.', 39.99, 1, 5, 200, '1811152482408142.jpeg', 'denim-jeans', '2024-09-25 01:33:25', '2024-09-25 01:33:25'),
(7, 'Merino Wool Sweater', 'Warm and stylish sweater', 'This luxurious merino wool sweater is perfect for layering, offering warmth without bulk. Its soft texture makes it comfortable against the skin.', 59.99, 1, 6, 200, '1811152608315864.jpeg', 'merino-wool-sweater', '2024-09-25 01:35:25', '2024-09-25 01:35:25'),
(8, 'Cotton Pajama Set', 'Cozy pajama set', 'Enjoy a restful night’s sleep in this soft cotton pajama set, featuring a relaxed fit and breathable fabric for ultimate comfort.', 29.99, 1, 7, 200, '1811152782093457.jpeg', 'cotton-pajama-set', '2024-09-25 01:38:11', '2024-09-25 01:38:11'),
(9, 'Canvas Sneakers', 'Casual canvas sneakers', 'These versatile canvas sneakers are perfect for everyday wear, offering style and comfort with a lightweight design and classic silhouette.', 4.99, 1, 8, 200, '1811152879562245.jpeg', 'canvas-sneakers', '2024-09-25 01:39:44', '2024-09-25 01:39:44'),
(10, 'Silk Scarf', 'Elegant silk scarf', 'Add a touch of elegance to any outfit with this luxurious silk scarf, perfect for layering or as an accessory to elevate your style.', 25.00, 1, 9, 200, '1811153001711488.jpeg', 'silk-scarf', '2024-09-25 01:41:40', '2024-09-25 01:41:40'),
(11, 'Activewear Leggings', 'Flexible activewear leggings', 'These high-performance leggings are designed for comfort and flexibility during workouts, made with moisture-wicking fabric to keep you dry and comfortable.', 34.99, 1, 9, 200, '1811153162042521.jpeg', 'activewear-leggings', '2024-09-25 01:44:13', '2024-09-25 01:44:13'),
(12, 'Graphic Hoodie', 'Trendy graphic hoodie', 'Stay cozy and stylish in this graphic hoodie, featuring a unique design that adds flair to any casual outfit while providing warmth and comfort.', 39.99, 1, 2, 200, '1811153242652750.jpeg', 'graphic-hoodie', '2024-09-25 01:45:30', '2024-09-25 01:45:30'),
(13, 'Jersey Knit Dress', 'Casual jersey dress', 'This soft jersey knit dress is perfect for everyday wear, offering a relaxed fit and easy style for any occasion, whether dressed up or down.', 29.99, 1, 3, 200, '1811153366358161.jpeg', 'jersey-knit-dress', '2024-09-25 01:47:28', '2024-09-25 01:47:28'),
(14, 'Chino Shorts', 'Stylish chino shorts', 'Comfortable and stylish, these chino shorts are perfect for warm weather outings, featuring a classic cut that pairs well with any top.', 24.99, 1, 5, 200, '1811153452597907.jpeg', 'chino-shorts', '2024-09-25 01:48:50', '2024-09-25 01:48:50'),
(15, 'Modal Sleep Shirt', 'Soft modal sleep shirt', 'Experience ultimate comfort with this soft modal sleep shirt, designed for a relaxed fit and breathable fabric for a good night’s sleep.', 22.99, 1, 6, 200, '1811153656044980.jpeg', 'modal-sleep-shirt', '2024-09-25 01:52:04', '2024-09-25 01:52:04'),
(16, 'Flannel Shirt', 'Cozy flannel shirt', 'Perfect for layering, this cozy flannel shirt features a classic plaid pattern, making it an essential piece for cooler days and casual outings.', 32.99, 1, 1, 200, '1811153740735118.jpeg', 'flannel-shirt', '2024-09-25 01:53:25', '2024-09-25 01:53:25'),
(17, 'Fleece Pullover', 'Warm fleece pullover', 'This warm fleece pullover is perfect for chilly days, offering a soft and cozy feel that makes it ideal for outdoor adventures or lounging at home.', 39.99, 1, 2, 200, '1811153815871760.jpeg', 'fleece-pullover', '2024-09-25 01:54:37', '2024-09-25 01:54:37'),
(18, 'Cargo Pants', 'Functional cargo pants', 'These versatile cargo pants feature multiple pockets and a relaxed fit, perfect for both outdoor activities and everyday casual wear.', 29.99, 1, 5, 200, '1811153884960064.jpeg', 'cargo-pants', '2024-09-25 01:55:43', '2024-09-25 01:55:43'),
(19, 'Wool Blend Beanie', 'Warm wool blend beanie', 'Stay warm and stylish with this wool blend beanie, perfect for chilly days. Its snug fit makes it a cozy accessory for any winter outfit.', 19.99, 1, 4, 200, '1811153965918242.jpeg', 'wool-blend-beanie', '2024-09-25 01:57:00', '2024-09-25 01:57:00'),
(20, 'Chambray Shirt', 'Classic chambray shirt', 'This classic chambray shirt is a versatile wardrobe staple, ideal for layering or wearing on its own. Its lightweight fabric ensures comfort throughout the day.', 29.99, 1, 1, 200, '1811154030339981.jpeg', 'chambray-shirt', '2024-09-25 01:58:01', '2024-09-25 01:58:01'),
(21, 'High-Waisted Leggings', 'Trendy high-waisted leggings', 'Designed for both style and function, these high-waisted leggings offer support and comfort for any workout while providing a flattering silhouette.', 34.99, 1, 9, 200, '1811154152421718.jpeg', 'high-waisted-leggings', '2024-09-25 01:59:58', '2024-09-25 01:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2024-09-25 01:11:48', '2024-09-25 01:11:48'),
(2, 'user', 'User', 'User', '2024-09-25 01:11:48', '2024-09-25 01:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User');

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9wY4BULdRHqgcOiGYpQtqICNCB53KJvwqafDqpYu', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidFBDVlhDdXFaRzlMRWFKMVM5SUVVaGJSQ3o4NThnQThZVWtEcW1aZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1727252856);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_addresses`
--

CREATE TABLE `shopping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `presentAddress` varchar(255) NOT NULL,
  `postalCode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `product_count` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `subcategory_name`, `category_id`, `category_name`, `product_count`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Tops', 1, 'Fashion', 3, 'tops', '2024-09-25 01:16:29', '2024-09-25 01:58:01'),
(2, 'Outerwear', 1, 'Fashion', 3, 'outerwear', '2024-09-25 01:16:42', '2024-09-25 01:54:37'),
(3, 'Dresses', 1, 'Fashion', 2, 'dresses', '2024-09-25 01:16:51', '2024-09-25 01:47:28'),
(4, 'Accessories', 1, 'Fashion', 1, 'accessories', '2024-09-25 01:17:03', '2024-09-25 01:57:00'),
(5, 'Bottoms', 1, 'Fashion', 3, 'bottoms', '2024-09-25 01:17:12', '2024-09-25 01:55:43'),
(6, 'Sweaters', 1, 'Fashion', 2, 'sweaters', '2024-09-25 01:17:27', '2024-09-25 01:52:04'),
(7, 'Sleepwear', 1, 'Fashion', 1, 'sleepwear', '2024-09-25 01:17:35', '2024-09-25 01:38:11'),
(8, 'Footwear', 1, 'Fashion', 1, 'footwear', '2024-09-25 01:17:44', '2024-09-25 01:39:44'),
(9, 'Activewear', 1, 'Fashion', 5, 'activewear', '2024-09-25 01:18:08', '2024-09-25 01:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lemon', 'lemon@gmail.com', NULL, '$2y$12$rC4h8CHTGakADEBu0Ukcgup7N0x6wS7tjDVvdMk1jZxLJ9gDG11yK', NULL, '2024-09-25 01:12:31', '2024-09-25 01:12:31');

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
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shopping_addresses`
--
ALTER TABLE `shopping_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
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
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shopping_addresses`
--
ALTER TABLE `shopping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
