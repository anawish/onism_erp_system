-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 07:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zenrolle`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_suppliers`
--

CREATE TABLE `add_suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postbox` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxtid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `company_email`, `address`, `phone_no`, `fax_no`, `created_at`, `updated_at`) VALUES
(1, 'abc', 'abc@gmail.com', 'Johar town lahore', '042-2345679', '022-345972', '2020-01-28 19:00:00', '2020-01-28 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `invoicehistory`
--

CREATE TABLE `invoicehistory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `payment` decimal(8,2) NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_history`
--

CREATE TABLE `invoice_history` (
  `id` int(191) NOT NULL,
  `invoice_id` int(191) NOT NULL,
  `invoice_no` int(255) DEFAULT NULL,
  `sale_no` varchar(255) DEFAULT NULL,
  `client_id` int(191) DEFAULT NULL,
  `payment` double(16,2) NOT NULL DEFAULT 0.00,
  `debit` double(16,2) DEFAULT 0.00,
  `credit` double(16,2) NOT NULL DEFAULT 0.00,
  `closing_balance` double(16,2) NOT NULL DEFAULT 0.00,
  `payment_method` int(255) DEFAULT NULL,
  `account_type` int(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT 'SI',
  `payment_note` varchar(255) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_history`
--

INSERT INTO `invoice_history` (`id`, `invoice_id`, `invoice_no`, `sale_no`, `client_id`, `payment`, `debit`, `credit`, `closing_balance`, `payment_method`, `account_type`, `type`, `payment_note`, `updated_date`, `created_at`, `updated_at`) VALUES
(1, 90, 1009, '1', 4, 10.00, 0.00, 0.00, 0.00, 0, 1, NULL, 'receive payment by bank #1009', '2020-03-18', '2020-03-18 12:52:48', '2020-03-18 12:52:48'),
(2, 91, 1010, '5500003', 4, 0.00, 416.00, 0.00, 416.00, 0, NULL, 'SI', NULL, '2020-03-18', '2020-03-18 12:56:36', '2020-03-18 12:56:36'),
(3, 91, 1010, NULL, 4, 20.00, 0.00, 0.00, 400.00, 0, 2, 'BP', 'cash', '2020-03-18', '2020-03-18 12:59:39', '2020-03-18 12:59:39'),
(4, 91, 1010, NULL, 4, 10.00, 0.00, 0.00, 390.00, 0, 4, 'CR', 'bank', '2020-03-18', '2020-03-18 13:00:04', '2020-03-18 13:00:04'),
(5, 91, 1010, NULL, 4, 10.00, 0.00, 0.00, 380.00, 0, 4, 'BP', 'sdd', '2020-03-18', '2020-03-18 13:04:43', '2020-03-18 13:04:43'),
(6, 91, 1010, NULL, 4, 10.00, 0.00, 0.00, 370.00, 0, 4, 'BP', 'efsdf', '2020-03-18', '2020-03-18 13:13:49', '2020-03-18 13:13:49'),
(7, 91, 1010, NULL, 4, 10.00, 0.00, 0.00, 360.00, 0, 4, 'CR', 'dc', '2020-03-18', '2020-03-18 13:16:49', '2020-03-18 13:16:49'),
(8, 91, 1010, NULL, 4, 10.00, 0.00, 0.00, 350.00, 0, 1, 'CR', 'sdlfkjslkfg', '2020-03-18', '2020-03-18 13:20:51', '2020-03-18 13:20:51'),
(9, 91, 1010, NULL, 4, 10.00, 0.00, 0.00, 340.00, 0, 1, 'CR', NULL, '2020-03-18', '2020-03-18 13:27:02', '2020-03-18 13:27:02'),
(10, 91, 1010, NULL, 4, 10.00, 0.00, 0.00, 330.00, 0, 1, 'CR', NULL, '2020-03-18', '2020-03-18 13:28:14', '2020-03-18 13:28:14'),
(11, 91, 1010, NULL, 4, 10.00, 0.00, 0.00, 320.00, 0, 2, 'SI', NULL, '2020-03-18', '2020-03-18 13:30:32', '2020-03-18 13:30:32'),
(12, 91, 1010, NULL, 4, 10.00, 0.00, 0.00, 310.00, 0, 1, 'CR', NULL, '2020-03-18', '2020-03-18 13:36:12', '2020-03-18 13:36:12'),
(13, 91, 1010, NULL, 4, 10.00, 0.00, 0.00, 300.00, 0, 1, 'CR', 'CASH', '2020-03-18', '2020-03-18 13:39:59', '2020-03-18 13:39:59'),
(14, 91, 1010, NULL, 4, 10.00, 0.00, 0.00, 290.00, 0, 1, 'CR', NULL, '2020-03-18', '2020-03-18 13:42:45', '2020-03-18 13:42:45'),
(15, 91, 1010, NULL, 4, 10.00, 0.00, 0.00, 280.00, 0, 1, 'CR', NULL, '2020-03-18', '2020-03-18 13:44:29', '2020-03-18 13:44:29'),
(16, 91, 1010, NULL, 4, 10.00, 0.00, 0.00, 270.00, 0, 1, 'CR', NULL, '2020-03-18', '2020-03-18 13:47:44', '2020-03-18 13:47:44'),
(17, 91, 1010, NULL, 4, 10.00, 0.00, 0.00, 260.00, 0, 4, 'BP', NULL, '2020-03-18', '2020-03-18 13:48:33', '2020-03-18 13:48:33'),
(18, 91, 1010, NULL, 4, 10.00, 0.00, 0.00, 250.00, 0, 4, 'CR', NULL, '2020-03-18', '2020-03-18 13:51:00', '2020-03-18 13:51:00'),
(19, 91, 1010, NULL, 4, 10.00, 0.00, 0.00, 240.00, 0, 2, 'BP', NULL, '2020-03-18', '2020-03-18 13:52:07', '2020-03-18 13:52:07'),
(20, 91, 1010, NULL, 4, 200.00, 0.00, 0.00, 40.00, 0, 1, 'CR', NULL, '2020-03-18', '2020-03-18 13:53:32', '2020-03-18 13:53:32'),
(21, 92, 1011, '5500004', 5, 0.00, 136680.00, 0.00, 136680.00, 0, NULL, 'SI', NULL, '2020-03-19', '2020-03-19 10:19:47', '2020-03-19 10:19:47'),
(22, 93, 1012, '5500005', 4, 0.00, 10302.00, 0.00, 10342.00, 0, NULL, 'SI', NULL, '2020-03-19', '2020-03-19 10:21:18', '2020-03-19 10:21:18'),
(23, 94, 1013, '5500006', 1, 0.00, 136680.00, 0.00, 136680.00, 0, NULL, 'SI', 'sale', '2020-03-19', '2020-03-19 10:30:37', '2020-03-19 10:30:37'),
(24, 82, 1002, NULL, 1, 2.00, 0.00, 0.00, 136678.00, 0, 1, 'CR', NULL, '2020-03-21', '2020-03-21 02:19:49', '2020-03-21 02:19:49'),
(25, 95, 1014, '5500007', 1, 0.00, 136680.00, 0.00, 273358.00, 0, NULL, 'SI', NULL, '2020-03-22', '2020-03-22 13:32:03', '2020-03-22 13:32:03'),
(26, 95, 1014, NULL, 1, 13.00, 0.00, 0.00, 273345.00, 0, 4, 'BP', 'Payment Receive by Bank', '2020-03-22', '2020-03-22 14:12:46', '2020-03-22 14:12:46'),
(27, 94, 1013, NULL, 1, 1366.00, 0.00, 0.00, 271979.00, 0, 1, 'CR', 'Payment by cash on #1013', '2020-03-23', '2020-03-22 14:19:09', '2020-03-22 14:19:09'),
(28, 96, 1015, '5500008', 5, 0.00, 82.40, 0.00, 136762.40, 0, NULL, 'SI', 'sale', '2020-03-24', '2020-03-24 13:09:03', '2020-03-24 13:09:03'),
(29, 83, 1002, NULL, 1, 1.00, 0.00, 0.00, 271978.00, 0, 4, 'BP', 'Bank payment', '2020-03-26', '2020-03-25 14:47:57', '2020-03-25 14:47:57'),
(30, 97, 1016, '5500009', 5, 0.00, 108.15, 0.00, 136870.55, 0, NULL, 'SI', NULL, '2020-03-26', '2020-03-26 07:12:41', '2020-03-26 07:12:41'),
(31, 98, 1017, '5500010', 4, 0.00, 82.40, 0.00, 10424.40, 0, NULL, 'SI', NULL, '2020-03-31', '2020-03-31 07:01:31', '2020-03-31 07:01:31'),
(32, 99, 1018, '5500011', 1, 0.00, 72.10, 0.00, 272050.10, 0, NULL, 'SI', NULL, '2020-04-01', '2020-03-31 14:57:15', '2020-03-31 14:57:15'),
(33, 100, 1019, '5500012', 4, 0.00, 72.10, 0.00, 10496.50, 0, NULL, 'SI', NULL, '2020-04-09', '2020-04-09 05:45:16', '2020-04-09 05:45:16'),
(34, 101, 1020, '5500013', 1, 0.00, 72.10, 0.00, 272122.20, 0, NULL, 'SI', NULL, '2020-04-09', '2020-04-09 06:41:13', '2020-04-09 06:41:13'),
(35, 102, 1021, '5500014', 1, 0.00, 154.50, 0.00, 272276.70, 0, NULL, 'SI', NULL, '2020-04-09', '2020-04-09 07:00:20', '2020-04-09 07:00:20'),
(36, 33, 10001, NULL, NULL, 100.00, 0.00, 0.00, 0.00, 0, NULL, 'CP', 'Cash Payment', NULL, '2020-04-24 11:46:02', '2020-04-24 11:46:02'),
(37, 33, 10001, NULL, NULL, 0.00, 100.00, 0.00, 0.00, 0, NULL, 'CP', 'Cash Payment', NULL, '2020-04-24 11:46:02', '2020-04-24 11:46:02'),
(38, 34, 10006, NULL, NULL, 0.00, 100.00, 0.00, 0.00, 0, NULL, 'CP', 'Cash Payment', NULL, '2020-04-24 17:20:24', '2020-04-24 17:20:24'),
(39, 34, 10006, NULL, NULL, 100.00, 0.00, 0.00, 0.00, 0, NULL, 'CP', 'Bank Payment', NULL, '2020-04-24 17:20:24', '2020-04-24 17:20:24'),
(40, 35, 10007, NULL, NULL, 0.00, 100.00, 0.00, 0.00, 0, NULL, 'BP', 'Cash Payment', NULL, '2020-04-24 17:57:15', '2020-04-24 17:57:15'),
(41, 35, 10007, NULL, NULL, 100.00, 0.00, 0.00, 0.00, 0, NULL, 'BP', 'Cash Payment', NULL, '2020-04-24 17:57:15', '2020-04-24 17:57:15'),
(42, 36, 10008, NULL, NULL, 0.00, 100.00, 0.00, 0.00, 0, NULL, 'BR', 'Bank Payment', NULL, '2020-04-26 02:42:56', '2020-04-26 02:42:56'),
(43, 36, 10008, NULL, NULL, 100.00, 0.00, 0.00, 0.00, 0, NULL, 'BR', 'Cash Payment', NULL, '2020-04-26 02:42:56', '2020-04-26 02:42:56'),
(44, 37, 10009, NULL, NULL, 100.00, 0.00, 0.00, 0.00, 0, NULL, 'Select Type', 'payment', NULL, '2020-04-26 04:44:17', '2020-04-26 04:44:17'),
(45, 37, 10009, NULL, NULL, 0.00, 0.00, 100.00, 0.00, 0, NULL, 'Select Type', 'Cash Payment', NULL, '2020-04-26 04:44:17', '2020-04-26 04:44:17'),
(48, 39, 10011, NULL, NULL, 100.00, 0.00, 0.00, 0.00, 0, NULL, 'CR', 'Cash Payment', NULL, '2020-04-26 04:59:59', '2020-04-26 04:59:59'),
(49, 39, 10011, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0, NULL, 'CR', 'Bank Payment', NULL, '2020-04-26 04:59:59', '2020-04-26 04:59:59'),
(50, 40, 10012, NULL, NULL, 0.00, 0.00, 100.00, 0.00, 0, NULL, 'CP', 'Cash Payment', NULL, '2020-04-26 05:03:23', '2020-04-26 05:03:23'),
(51, 40, 10012, NULL, NULL, 100.00, 0.00, 0.00, 0.00, 0, NULL, 'CP', 'Bank Payment', NULL, '2020-04-26 05:03:23', '2020-04-26 05:03:23'),
(52, 41, 10013, NULL, NULL, 200.00, 0.00, 0.00, 0.00, 0, NULL, 'BP', 'Bank Payment', NULL, '2020-04-27 11:42:02', '2020-04-27 11:42:02'),
(53, 41, 10013, NULL, NULL, 0.00, 0.00, 200.00, 0.00, 0, NULL, 'BP', 'Bank Payment', NULL, '2020-04-27 11:42:02', '2020-04-27 11:42:02'),
(54, 42, 10014, NULL, NULL, 200.00, 0.00, 0.00, 0.00, 0, NULL, 'BR', 'Bank Payment', NULL, '2020-04-27 15:53:42', '2020-04-27 15:53:42'),
(55, 42, 10014, NULL, NULL, 0.00, 0.00, 200.00, 0.00, 0, NULL, 'BR', 'Bank Payment', NULL, '2020-04-27 15:53:42', '2020-04-27 15:53:42'),
(56, 43, 10015, NULL, NULL, 200.00, 0.00, 0.00, 0.00, 0, NULL, 'CR', 'Cash Payment', NULL, '2020-04-28 10:59:58', '2020-04-28 10:59:58'),
(57, 43, 10015, NULL, NULL, 0.00, 0.00, 200.00, 0.00, 0, NULL, 'CR', 'Bank Payment', NULL, '2020-04-28 10:59:58', '2020-04-28 10:59:58'),
(58, 44, 10016, NULL, NULL, 400.00, 0.00, 0.00, 0.00, 0, NULL, 'CP', 'Bank Payment', '2020-04-28', '2020-04-28 11:48:20', '2020-04-28 11:48:20'),
(59, 44, 10016, NULL, NULL, 0.00, 0.00, 400.00, 0.00, 0, NULL, 'CP', 'Bank Payment', '2020-04-28', '2020-04-28 11:48:20', '2020-04-28 11:48:20'),
(60, 104, 1023, '5500016', 11, 0.00, 830.00, 0.00, 830.00, 0, NULL, 'SI', 'new entry', '2020-04-29', '2020-04-29 05:47:51', '2020-04-29 05:47:51'),
(61, 104, 1023, NULL, 11, 30.00, 0.00, 0.00, 800.00, 3, NULL, 'CR', 'new enty', '2020-04-29', '2020-04-29 06:31:45', '2020-04-29 06:31:45'),
(62, 104, 1023, NULL, 11, 100.00, 0.00, 0.00, 700.00, 3, NULL, NULL, 'new this', '2020-04-29', '2020-04-29 06:36:27', '2020-04-29 06:36:27'),
(63, 104, 1023, NULL, 11, 50.00, 0.00, 0.00, 650.00, 3, NULL, NULL, 'new payment by bank', '2020-04-29', '2020-04-29 06:43:29', '2020-04-29 06:43:29'),
(64, 104, 1023, NULL, 11, 50.00, 0.00, 0.00, 600.00, 3, NULL, 'BP', 'new payment', '2020-04-29', '2020-04-29 06:46:05', '2020-04-29 06:46:05'),
(65, 105, 1024, '5500017', 7, 0.00, 360.50, 0.00, 360.50, NULL, NULL, 'SI', NULL, '2020-04-29', '2020-04-29 06:50:24', '2020-04-29 06:50:24'),
(66, 107, 1026, '5500019', 6, 0.00, 4120.00, 0.00, 4120.00, NULL, NULL, 'SI', NULL, '2020-04-29', '2020-04-29 06:55:36', '2020-04-29 06:55:36'),
(67, 107, 1026, NULL, 6, 120.00, 0.00, 0.00, 4000.00, 1, NULL, 'CR', 'new', '2020-04-29', '2020-04-29 06:56:14', '2020-04-29 06:56:14'),
(68, 108, 1027, '5500020', 5, 0.00, 412.00, 0.00, 137282.55, NULL, NULL, 'SI', NULL, '2020-04-29', '2020-04-29 07:05:18', '2020-04-29 07:05:18'),
(69, 108, 1027, NULL, 5, 300.00, 0.00, 0.00, 136982.55, 3, NULL, 'BP', NULL, '2020-04-29', '2020-04-29 07:05:40', '2020-04-29 07:05:40'),
(70, 108, 1027, NULL, 5, 12.00, 0.00, 0.00, 136970.55, 3, NULL, 'BP', 'payment by bank', '2020-04-29', '2020-04-29 07:09:52', '2020-04-29 07:09:52'),
(71, 109, 1028, '5500021', 1, 0.00, 360.50, 0.00, 272637.20, NULL, NULL, 'SI', NULL, '2020-04-29', '2020-04-29 10:17:28', '2020-04-29 10:17:28'),
(72, 110, 1029, '5500022', 4, 0.00, 360.50, 0.00, 10857.00, NULL, NULL, 'SI', NULL, '2020-04-30', '2020-04-30 05:38:04', '2020-04-30 05:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_19_124414_create_companies_table', 2),
(4, '2019_12_19_132702_create_zenrolle_product_categories_table', 3),
(5, '2019_12_19_131118_create_zenrolle_product_sub_category_table', 4),
(6, '2019_12_19_135556_create_zenrolle_warehouse_table', 5),
(7, '2019_12_28_115226_create_add_suppliers_table', 6),
(8, '2019_12_28_122401_create_zenrolle_suppliers_table', 7),
(10, '2019_12_30_114606_create_zenrolle_employees_table', 8),
(11, '2019_12_30_145951_create_zenrolle_produts_table', 8),
(12, '2020_01_07_163821_create_zenrolle_taxes_table', 9),
(13, '2020_01_14_101218_create_zenrolle_cust_route_table', 10),
(14, '2020_01_14_101256_create_zenrolle_cust_group_table', 11),
(15, '2020_01_14_104053_create_zenrolle_customers_table', 12),
(16, '2020_01_14_164619_create_zenrolle_invoicess_table', 13),
(17, '2020_01_22_141222_create_zenrolle_invoice_items_table', 14),
(18, '2020_01_14_171052_create_zenrolle_terms_table', 15),
(19, '2020_01_16_100954_create_zenrolle_quotes_table', 16),
(20, '2020_01_19_160454_create_zenrolle_purcahse_table', 17),
(21, '2020_01_19_123408_create_purchase_items_table', 18),
(22, '2020_01_19_154941_create_tax_table', 19),
(23, '2020_01_21_075545_create_zenrolle_abbrevition_table', 20),
(24, '2020_01_21_113508_create_zenrolle_quote_table', 21),
(25, '2020_01_21_113746_create_zenrolle_quote_items_table', 22),
(26, '2020_01_21_123929_create_quote_nunber_table', 23),
(27, '2020_01_21_125423_create_purchase_numer_table', 24),
(28, '2020_01_22_163949_create_zenrolle_paymentterms_table', 25),
(29, '2020_01_29_171104_create_zenrolle_paymentmethod_table', 26),
(30, '2020_02_08_100215_create_zenrolle_grn_table', 27),
(31, '2020_02_08_101045_create_zenrolle_grn_detail_table', 28),
(32, '2020_03_03_140142_create_invoicehistory_table', 28),
(33, '2020_03_05_170336_create_zenrolle_saleorder_table', 29),
(34, '2020_03_05_171211_create_zenrolle_saleorder_detail_table', 30),
(35, '2020_03_05_185926_create_zenrolle_saleorder_detail_table', 31),
(36, '2020_03_11_120659_create_zenrolle_account_table', 32),
(37, '2020_04_09_151633_create_zenrolle__pur_history', 33),
(38, '2020_04_24_051917_create_zenrolle__general_transaction_table', 34),
(39, '2020_04_24_052559_create_zenrolle__general_transaction_detail_table', 35),
(40, '2020_04_29_102152_create_zenrolle_payment_history_table', 36);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pid` int(10) UNSIGNED NOT NULL,
  `invoice_no` int(191) NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` double(16,2) DEFAULT NULL,
  `price` double(16,2) NOT NULL,
  `tax` decimal(8,2) DEFAULT NULL,
  `balance_qty` double(16,2) DEFAULT NULL,
  `total_tax` double(16,2) DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `ammount` double(16,2) NOT NULL,
  `product_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`id`, `pid`, `invoice_no`, `product_id`, `product_name`, `product_code`, `qty`, `price`, `tax`, `balance_qty`, `total_tax`, `discount`, `ammount`, `product_desc`, `created_at`, `updated_at`) VALUES
(1, 1, 1001, '12', 'Dew', NULL, 100.00, 35.00, '105.00', 100.00, 105.00, NULL, 3605.00, NULL, '2020-04-09 13:15:45', '2020-04-09 13:15:45'),
(2, 2, 1002, '12', 'Dew', NULL, 300.00, 35.00, '315.00', 300.00, 315.00, NULL, 10815.00, NULL, '2020-04-09 13:36:24', '2020-04-09 13:36:24'),
(3, 3, 1002, '12', 'Dew', NULL, 300.00, 35.00, '315.00', 300.00, 315.00, NULL, 10815.00, NULL, '2020-04-09 13:36:42', '2020-04-09 13:36:42'),
(4, 4, 1002, '12', 'Dew', NULL, 300.00, 35.00, '315.00', 300.00, 315.00, NULL, 10815.00, NULL, '2020-04-09 13:37:24', '2020-04-09 13:37:24'),
(5, 5, 1003, '10', 'milk pack', NULL, 400.00, 200.00, '3200.00', 400.00, 3200.00, NULL, 83200.00, NULL, '2020-04-09 13:50:13', '2020-04-09 13:50:13'),
(6, 6, 1004, '12', 'Dew', NULL, 400.00, 35.00, '420.00', 400.00, 420.00, NULL, 14420.00, NULL, '2020-04-09 13:51:30', '2020-04-09 13:51:30'),
(7, 7, 1005, '13', 'coca cola', NULL, 10.00, 40.00, '12.00', 10.00, 12.00, NULL, 412.00, NULL, '2020-04-15 08:31:11', '2020-04-15 08:31:11'),
(8, 8, 1006, '12', 'Dew', NULL, 4.00, 35.00, '4.20', 4.00, 4.20, NULL, 144.20, NULL, '2020-04-15 08:38:20', '2020-04-15 08:38:20'),
(9, 9, 1007, '10', 'milk pack', NULL, 3.00, 200.00, '24.00', 3.00, 24.00, NULL, 624.00, NULL, '2020-04-15 08:44:09', '2020-04-15 08:44:09'),
(10, 10, 1007, '10', 'milk pack', NULL, 3.00, 200.00, '24.00', 3.00, 24.00, NULL, 624.00, NULL, '2020-04-15 08:44:58', '2020-04-15 08:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_numer`
--

CREATE TABLE `purchase_numer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_numer`
--

INSERT INTO `purchase_numer` (`id`, `title`, `value`, `created_at`, `updated_at`) VALUES
(1, 'purchase order', 'PO', '2020-01-28 19:00:00', '2020-01-28 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `quote_nunber`
--

CREATE TABLE `quote_nunber` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quote_nunber`
--

INSERT INTO `quote_nunber` (`id`, `title`, `value`, `created_at`, `updated_at`) VALUES
(1, 'quote', 'QI', '2020-01-28 19:00:00', '2020-01-28 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sikandar', 'sikandarabbas809@gmail.com', NULL, '$2y$10$Gbom74NZe9Qh1ePBlmRsOe6gRaetAaE6cc3X0swPsrd4TZ0V9Y4Jy', NULL, '2020-01-29 07:25:32', '2020-01-29 07:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_abbrevition`
--

CREATE TABLE `zenrolle_abbrevition` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_abbrevition`
--

INSERT INTO `zenrolle_abbrevition` (`id`, `title`, `value`, `created_at`, `updated_at`) VALUES
(1, 'sale invoice', 'SI', '2020-01-28 19:00:00', '2020-01-28 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_account`
--

CREATE TABLE `zenrolle_account` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gl_no` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` int(11) DEFAULT NULL,
  `account` int(191) DEFAULT NULL,
  `closing_bla` double DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lastUpdated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_account`
--

INSERT INTO `zenrolle_account` (`id`, `gl_no`, `name`, `description`, `account_type`, `account`, `closing_bla`, `type`, `created_at`, `updated_at`, `lastUpdated`) VALUES
(1, 1000001, 'Cash', 'Cash Payment', 1, 1, NULL, 'CR', '2020-03-11 07:58:57', '2020-03-11 07:58:57', '2020-03-11'),
(2, 2000001, 'Sales', 'payment', 1, 2, NULL, 'SI', '2020-03-11 08:34:14', '2020-03-11 08:34:14', '2020-03-11'),
(3, 3000001, 'Bank', 'Bank Payment', 1, 1, NULL, 'BP', '2020-03-11 11:09:41', '2020-03-11 11:09:41', '2020-03-11'),
(4, 4000001, 'Localcustomer', 'Receive payment', 1, NULL, NULL, 'SI', '2020-03-19 13:30:58', '2020-03-19 13:30:58', '2020-03-19'),
(20, 5000001, 'Vendor', 'payment to vendor', 2, NULL, NULL, NULL, '2020-04-09 09:35:57', '2020-04-09 09:35:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_customers`
--

CREATE TABLE `zenrolle_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_no` int(191) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postbox` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gid` bigint(20) UNSIGNED NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-image.png',
  `name_s` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_s` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_s` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_s` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_s` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_s` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_s` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postbox_s` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` float(16,2) DEFAULT NULL,
  `route_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lastUpdated` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_customers`
--

INSERT INTO `zenrolle_customers` (`id`, `company_id`, `name`, `phone`, `email`, `cust_no`, `address`, `city`, `region`, `country`, `postbox`, `company`, `taxid`, `gid`, `picture`, `name_s`, `phone_s`, `email_s`, `address_s`, `city_s`, `region_s`, `country_s`, `postbox_s`, `balance`, `route_id`, `created_at`, `updated_at`, `lastUpdated`) VALUES
(1, NULL, 'zee', '0340-6789500', 'zee@gmail.com', 10001, 'Johar town lahore', 'lahore', 'Lahore', 'pakistan', '98987', NULL, '45673', 1, 'default-image.png', 'asim', '03006789900', 'asim@gmail.com', 'johar town', 'Lahore', 'Lahore', 'Pakistan', NULL, 700.00, 1, '2020-01-29 08:29:11', '2020-03-31 16:20:20', NULL),
(4, NULL, 'alchcol', '2048928', 'sikandarabbas809@gmail.com', 10002, 'johar town', 'lahore', 'lahore', 'Pakistan', '1234', NULL, NULL, 1, 'file.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 900.00, 1, '2020-02-12 08:55:56', '2020-02-12 10:57:27', '2020-02-12'),
(5, NULL, 'sikandar', '9485847', 's@gmail.com', 10003, 'lahore', 'lahore', 'lahore', 'Pakistan', '1234', NULL, NULL, 1, 'default-image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-02-12 09:06:40', '2020-02-12 09:06:40', '2020-02-12'),
(6, NULL, 'ali', '03006789900', 'rehman@gmail.com', 10004, 'Model Town', 'Lahore', 'Lahore', 'Pakistan', '540000', NULL, NULL, 1, 'default-image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 70.00, 1, '2020-02-13 10:51:39', '2020-02-13 10:51:39', '2020-02-13'),
(7, NULL, 'aliiii', '03006789900', 'ali@gmail.com', 10005, 'Model Town', 'Lahore', 'Lahore', 'Pakistan', '540000', NULL, NULL, 2, 'default-image.png', 'ali', '03006789900', 'rehman@gmail.com', NULL, 'Lahore', 'Lahore', 'Pakistan', '540000', 300.00, 1, '2020-02-24 08:45:10', '2020-03-07 05:07:34', '2020-02-24'),
(8, 1, 'Asim', '2048928', 'sikandarabbas809@gmail.com', 10006, 'johar town', 'lahore', 'lahore', 'Pakistan', '1234', NULL, NULL, 1, 'default-image.png', 'alchcol', '2048928', 'sikandarabbas809@gmail.com', 'johar town', 'lahore', 'lahore', 'Pakistan', '1234', NULL, 1, '2020-03-07 12:15:25', '2020-03-07 12:15:25', '2020-03-07'),
(11, 1, 'alchcol', '2048928', 'sikandarabbas809@gmail.com', 10007, 'johar town', 'lahore', 'lahore', 'Pakistan', '1234', NULL, NULL, 1, 'default-image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-03-21 03:59:55', '2020-03-21 03:59:55', '2020-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_cust_group`
--

CREATE TABLE `zenrolle_cust_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_cust_group`
--

INSERT INTO `zenrolle_cust_group` (`id`, `title`, `summary`, `created_at`, `updated_at`) VALUES
(1, 'Default Group', 'Default Group', '2020-01-28 19:00:00', '2020-01-28 19:00:00'),
(2, 'Local', 'local group', '2020-02-12 14:02:24', '2020-02-12 14:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_cust_route`
--

CREATE TABLE `zenrolle_cust_route` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summery` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_cust_route`
--

INSERT INTO `zenrolle_cust_route` (`id`, `title`, `summery`, `created_at`, `updated_at`) VALUES
(1, 'Default Route', 'Default Route', '2020-01-28 19:00:00', '2020-01-28 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_employees`
--

CREATE TABLE `zenrolle_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postbox` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joining_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_employees`
--

INSERT INTO `zenrolle_employees` (`id`, `user_name`, `name`, `address`, `city`, `region`, `country`, `postbox`, `picture`, `salary`, `blance`, `joining_date`, `created_at`, `updated_at`) VALUES
(1, 'abc', 'abc', 'johar town lahore', 'lahore', 'lahore', 'pakistan', '45678', '', '45000', '', '2020-01-29', '2020-01-28 19:00:00', '2020-01-28 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_grn`
--

CREATE TABLE `zenrolle_grn` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grn_no` int(11) NOT NULL,
  `doc_date` date NOT NULL,
  `posting_date` date NOT NULL,
  `inward_gate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_no` int(11) NOT NULL,
  `warehouse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_grn`
--

INSERT INTO `zenrolle_grn` (`id`, `grn_no`, `doc_date`, `posting_date`, `inward_gate`, `po_no`, `warehouse`, `category`, `delivery_note`, `created_at`, `updated_at`) VALUES
(1, 3001, '2020-04-08', '2020-04-08', NULL, 1026, '1', NULL, NULL, '2020-04-08 10:25:52', '2020-04-08 10:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_grn_detail`
--

CREATE TABLE `zenrolle_grn_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grn_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_qty` decimal(8,2) NOT NULL,
  `receive_qty` decimal(8,2) DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_invoicess`
--

CREATE TABLE `zenrolle_invoicess` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoicedate` date NOT NULL,
  `invoice_duedate` date NOT NULL,
  `refer_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `csid` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(191) NOT NULL,
  `warehouse_id` bigint(20) UNSIGNED NOT NULL,
  `tax` double(16,2) DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_tax` double(16,2) DEFAULT NULL,
  `shipping` double(16,2) DEFAULT NULL,
  `sub_total` double(16,2) NOT NULL,
  `total_discount` double(16,2) DEFAULT NULL,
  `grand_total` double(16,2) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'SI',
  `gl_id` int(191) DEFAULT NULL,
  `invoice_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Due',
  `empid` bigint(20) UNSIGNED DEFAULT NULL,
  `pmethod` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` double(16,2) DEFAULT NULL,
  `account_type` int(191) DEFAULT NULL,
  `p_blance` double(16,2) DEFAULT NULL,
  `item_qty` decimal(8,2) DEFAULT NULL,
  `terms` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_invoicess`
--

INSERT INTO `zenrolle_invoicess` (`id`, `company_id`, `invoice_no`, `sale_no`, `invoicedate`, `invoice_duedate`, `refer_no`, `csid`, `group_id`, `warehouse_id`, `tax`, `discount`, `total_tax`, `shipping`, `sub_total`, `total_discount`, `grand_total`, `type`, `gl_id`, `invoice_note`, `status`, `empid`, `pmethod`, `payment`, `account_type`, `p_blance`, `item_qty`, `terms`, `created_at`, `updated_at`) VALUES
(80, 1, '1001', '0', '2020-03-13', '2020-03-13', NULL, 1, 0, 1, NULL, NULL, 16.00, NULL, 416.00, 0.00, 416.00, 'SI', NULL, 'First Test', 'Paid', 1, 'Card', 416.00, NULL, NULL, NULL, NULL, '2020-03-13 06:26:32', '2020-03-16 12:46:34'),
(81, 1, '1002', '0', '2020-03-13', '2020-03-13', NULL, 1, 0, 1, NULL, NULL, 2.10, NULL, 72.10, 0.00, 72.10, 'SI', NULL, NULL, 'Paid', 1, 'Card', 72.10, NULL, NULL, NULL, NULL, '2020-03-13 06:40:10', '2020-03-16 12:49:08'),
(82, 1, '1002', '0', '2020-03-13', '2020-03-13', NULL, 1, 0, 1, NULL, NULL, 2.10, NULL, 72.10, 0.00, 72.10, 'SI', NULL, NULL, 'Partial', 1, 'Cash', 71.00, 1, NULL, NULL, NULL, '2020-03-13 06:43:33', '2020-03-21 02:19:49'),
(83, 1, '1002', '0', '2020-03-13', '2020-03-13', NULL, 1, 0, 1, NULL, NULL, 2.10, NULL, 72.10, 0.00, 72.10, 'SI', NULL, NULL, 'Partial', 1, 'Bank', 63.00, 4, NULL, NULL, NULL, '2020-03-13 06:43:55', '2020-03-25 14:47:57'),
(84, 1, '1003', '0', '2020-03-13', '2020-03-13', NULL, 1, 0, 1, NULL, NULL, 2.40, NULL, 82.40, 0.00, 82.40, 'SI', NULL, NULL, 'Partial', 1, 'Card', 54.00, 1, NULL, NULL, NULL, '2020-03-13 06:47:11', '2020-03-13 06:52:30'),
(85, 1, '1004', '0', '2020-03-13', '2020-03-13', NULL, 5, 0, 1, NULL, NULL, 48.00, NULL, 1248.00, 0.00, 1248.00, 'SI', NULL, NULL, 'Paid', 1, 'Card', 1248.00, 3, NULL, NULL, NULL, '2020-03-13 07:26:11', '2020-03-16 13:26:14'),
(86, 1, '1005', '0', '2020-03-16', '2020-03-16', NULL, 5, 0, 1, NULL, NULL, 2.10, NULL, 72.10, 0.00, 72.10, 'SI', NULL, NULL, 'Paid', 1, 'Card', 72.10, 1, NULL, NULL, NULL, '2020-03-16 06:58:37', '2020-03-16 07:04:54'),
(87, 1, '1006', '0', '2020-03-16', '2020-03-16', NULL, 5, 0, 1, NULL, NULL, 16.00, NULL, 416.00, 0.00, 416.00, 'SI', NULL, NULL, 'Paid', 1, 'Card', 416.00, 4, NULL, NULL, NULL, '2020-03-16 13:26:57', '2020-03-16 13:27:46'),
(88, 1, '1007', '0', '2020-03-17', '2020-03-17', NULL, 4, 0, 1, NULL, NULL, 2.10, NULL, 72.10, 0.00, 72.10, 'SI', NULL, NULL, 'Partial', 1, 'Card', 3.00, 3, NULL, NULL, NULL, '2020-03-17 05:45:04', '2020-03-17 05:46:30'),
(89, 1, '1008', '5500001', '2020-03-18', '2020-03-18', NULL, 4, 0, 1, NULL, NULL, 2.40, 18.00, 82.40, 0.00, 100.40, 'SI', NULL, NULL, 'Partial', 1, '2', 10.00, 4, NULL, NULL, NULL, '2020-03-18 10:35:18', '2020-03-18 10:36:05'),
(90, 1, '1009', '5500002', '2020-03-18', '2020-03-18', NULL, 4, 0, 1, NULL, NULL, 16.00, NULL, 416.00, 0.00, 416.00, 'SI', NULL, NULL, 'Partial', 1, 'Bank', 35.00, 1, NULL, NULL, NULL, '2020-03-18 11:06:10', '2020-03-18 12:52:48'),
(91, 1, '1010', '5500003', '2020-03-18', '2020-03-18', NULL, 4, 0, 1, NULL, NULL, 16.00, NULL, 416.00, 0.00, 416.00, 'SI', NULL, NULL, 'Paid', 1, 'Cash', 416.00, 1, NULL, NULL, NULL, '2020-03-18 12:56:36', '2020-03-18 13:53:32'),
(92, 1, '1011', '5500004', '2020-03-19', '2020-03-19', NULL, 5, 0, 1, NULL, NULL, 2680.00, NULL, 136680.00, 0.00, 136680.00, 'SI', NULL, NULL, 'Due', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-19 10:19:47', '2020-03-19 10:19:47'),
(93, 1, '1012', '5500005', '2020-03-19', '2020-03-19', NULL, 4, 0, 1, NULL, NULL, 102.00, NULL, 10302.00, 0.00, 10302.00, 'SI', NULL, NULL, 'Due', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-19 10:21:18', '2020-03-19 10:21:18'),
(94, 1, '1013', '5500006', '2020-03-19', '2020-03-19', NULL, 1, 0, 1, NULL, NULL, 2680.00, NULL, 136680.00, 0.00, 136680.00, 'SI', NULL, 'sale', 'Partial', 1, 'Cash', 1366.00, 1, NULL, NULL, NULL, '2020-03-19 10:30:37', '2020-03-22 14:19:09'),
(95, 1, '1014', '5500007', '2020-03-22', '2020-03-22', NULL, 1, 0, 1, NULL, NULL, 2680.00, NULL, 136680.00, 0.00, 136680.00, 'SI', NULL, NULL, 'Partial', 1, 'Bank', 13.00, 4, NULL, NULL, NULL, '2020-03-22 13:32:03', '2020-03-22 14:12:46'),
(96, 1, '1015', '5500008', '2020-03-24', '2020-03-24', NULL, 5, 0, 1, NULL, NULL, 2.40, NULL, 82.40, 0.00, 82.40, 'SI', NULL, 'sale', 'Due', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-24 13:09:03', '2020-03-24 13:09:03'),
(97, 1, '1016', '5500009', '2020-03-26', '2020-03-26', NULL, 5, 0, 1, NULL, NULL, 3.15, NULL, 108.15, 0.00, 108.15, 'SI', NULL, NULL, 'Due', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-26 07:12:41', '2020-03-26 07:12:41'),
(98, 1, '1017', '5500010', '2020-03-31', '2020-03-31', NULL, 4, 0, 1, NULL, NULL, 2.40, NULL, 82.40, 0.00, 82.40, 'SI', NULL, NULL, 'Due', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-31 07:01:31', '2020-03-31 07:01:31'),
(99, 1, '1018', '5500011', '2020-04-01', '2020-04-01', NULL, 1, 0, 1, NULL, NULL, 2.10, NULL, 72.10, 0.00, 72.10, 'SI', NULL, NULL, 'Due', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-31 14:57:15', '2020-03-31 14:57:15'),
(100, 1, '1019', '5500012', '2020-04-09', '2020-04-09', NULL, 4, 0, 1, NULL, NULL, 2.10, NULL, 72.10, 0.00, 72.10, 'SI', NULL, NULL, 'Due', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-09 05:45:16', '2020-04-09 05:45:16'),
(101, 1, '1020', '5500013', '2020-04-09', '2020-04-09', NULL, 1, 0, 1, NULL, NULL, 2.10, NULL, 72.10, 0.00, 72.10, 'SI', NULL, NULL, 'Due', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-09 06:41:13', '2020-04-09 06:41:13'),
(102, 1, '1021', '5500014', '2020-04-09', '2020-04-09', NULL, 1, 0, 1, NULL, NULL, 4.50, NULL, 154.50, 0.00, 154.50, 'SI', NULL, NULL, 'Due', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-09 07:00:20', '2020-04-09 07:00:20'),
(103, 1, '1022', '5500015', '2020-04-24', '2020-04-24', NULL, 1, 0, 1, NULL, NULL, 1374.00, NULL, 71774.00, 0.00, 71774.00, 'SI', NULL, NULL, 'Due', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-24 06:19:46', '2020-04-24 06:19:46'),
(104, 1, '1023', '5500016', '2020-04-29', '2020-04-29', NULL, 11, 0, 1, NULL, NULL, 24.00, 6.00, 824.00, 0.00, 830.00, 'SI', 2, 'new entry', 'Partial', 1, '3', 230.00, NULL, NULL, NULL, NULL, '2020-04-29 05:47:51', '2020-04-29 06:46:05'),
(105, 1, '1024', '5500017', '2020-04-29', '2020-04-29', NULL, 7, 0, 1, NULL, NULL, 10.50, NULL, 360.50, 0.00, 360.50, 'SI', 2, NULL, 'Due', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-29 06:50:24', '2020-04-29 06:50:24'),
(106, 1, '1025', '5500018', '2020-04-29', '2020-04-29', NULL, 6, 0, 1, NULL, NULL, 12.00, NULL, 412.00, 0.00, 412.00, 'SI', 2, NULL, 'Due', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-29 06:54:49', '2020-04-29 06:54:49'),
(107, 1, '1026', '5500019', '2020-04-29', '2020-04-29', NULL, 6, 0, 1, NULL, NULL, 120.00, NULL, 4120.00, 0.00, 4120.00, 'SI', 2, NULL, 'Partial', 1, '1', 120.00, NULL, NULL, NULL, NULL, '2020-04-29 06:55:36', '2020-04-29 06:56:14'),
(108, 1, '1027', '5500020', '2020-04-29', '2020-04-29', NULL, 5, 0, 1, NULL, NULL, 12.00, NULL, 412.00, 0.00, 412.00, 'SI', 2, NULL, 'Partial', 1, '3', 312.00, NULL, NULL, NULL, NULL, '2020-04-29 07:05:18', '2020-04-29 07:09:52'),
(109, 1, '1028', '5500021', '2020-04-29', '2020-04-29', NULL, 1, 1, 1, NULL, NULL, 10.50, NULL, 360.50, 0.00, 360.50, 'SI', 2, NULL, 'Due', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-29 10:17:28', '2020-04-29 10:17:28'),
(110, 1, '1029', '5500022', '2020-04-30', '2020-04-30', NULL, 4, 1, 1, NULL, NULL, 10.50, NULL, 360.50, 0.00, 360.50, 'SI', 2, NULL, 'Due', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-30 05:38:04', '2020-04-30 05:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_invoice_items`
--

CREATE TABLE `zenrolle_invoice_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pid` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` decimal(8,2) NOT NULL,
  `status` enum('sold','reserved') COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `price_type` enum('Wholesale','Retail') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` double(16,2) DEFAULT NULL,
  `total_tax` double(16,2) DEFAULT NULL,
  `discount` double(16,2) DEFAULT NULL,
  `total_amount` double(16,2) NOT NULL,
  `product_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_invoice_items`
--

INSERT INTO `zenrolle_invoice_items` (`id`, `pid`, `product_id`, `product_name`, `code`, `qty`, `status`, `price`, `price_type`, `tax`, `total_tax`, `discount`, `total_amount`, `product_desc`, `created_at`, `updated_at`) VALUES
(1, 100, 12, 'Dew', NULL, '2.00', 'sold', '35.00', 'Retail', 2.10, 2.10, 0.00, 72.10, NULL, '2020-04-09 05:45:16', '2020-04-09 05:45:16'),
(2, 101, 12, 'Dew', NULL, '2.00', 'sold', '35.00', 'Retail', 2.10, 2.10, 0.00, 72.10, NULL, '2020-04-09 06:41:13', '2020-04-09 06:41:13'),
(3, 102, 13, 'coca cola', NULL, '2.00', 'sold', '40.00', 'Retail', 2.40, 2.40, 0.00, 82.40, NULL, '2020-04-09 07:00:20', '2020-04-09 07:00:20'),
(4, 102, 12, 'Dew', NULL, '2.00', 'sold', '35.00', 'Retail', 2.10, 2.10, 0.00, 72.10, NULL, '2020-04-09 07:00:20', '2020-04-09 07:00:20'),
(5, 104, 13, 'coca cola', NULL, '20.00', 'sold', '40.00', 'Retail', 24.00, 24.00, 0.00, 824.00, NULL, '2020-04-29 05:47:51', '2020-04-29 05:47:51'),
(6, 105, 12, 'Dew', NULL, '10.00', 'sold', '35.00', 'Retail', 10.50, 10.50, 0.00, 360.50, NULL, '2020-04-29 06:50:24', '2020-04-29 06:50:24'),
(7, 106, 13, 'coca cola', NULL, '10.00', 'sold', '40.00', 'Retail', 12.00, 12.00, 0.00, 412.00, NULL, '2020-04-29 06:54:49', '2020-04-29 06:54:49'),
(8, 107, 13, 'coca cola', NULL, '100.00', 'sold', '40.00', 'Retail', 120.00, 120.00, 0.00, 4120.00, NULL, '2020-04-29 06:55:36', '2020-04-29 06:55:36'),
(9, 108, 13, 'coca cola', NULL, '10.00', 'sold', '40.00', 'Retail', 12.00, 12.00, 0.00, 412.00, NULL, '2020-04-29 07:05:18', '2020-04-29 07:05:18'),
(10, 109, 12, 'Dew', NULL, '10.00', 'sold', '35.00', 'Retail', 10.50, 10.50, 0.00, 360.50, NULL, '2020-04-29 10:17:28', '2020-04-29 10:17:28'),
(11, 110, 12, 'Dew', NULL, '10.00', 'sold', '35.00', 'Retail', 10.50, 10.50, 0.00, 360.50, NULL, '2020-04-30 05:38:04', '2020-04-30 05:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_paymentmethod`
--

CREATE TABLE `zenrolle_paymentmethod` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_paymentmethod`
--

INSERT INTO `zenrolle_paymentmethod` (`id`, `payment_type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Cash', 'CR', '2020-01-28 19:00:00', '2020-01-28 19:00:00'),
(2, 'Bank', 'BP', '2020-01-28 19:00:00', '2020-01-28 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_paymentterms`
--

CREATE TABLE `zenrolle_paymentterms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_paymentterms`
--

INSERT INTO `zenrolle_paymentterms` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Payment On Receipt', '2020-01-28 19:00:00', '2020-01-28 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_payment_history`
--

CREATE TABLE `zenrolle_payment_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gl_id` int(11) DEFAULT NULL,
  `gl_no` int(11) DEFAULT NULL,
  `doc_no` int(255) DEFAULT NULL,
  `gl_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit` double DEFAULT NULL,
  `credit` double DEFAULT NULL,
  `doc_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_payment_history`
--

INSERT INTO `zenrolle_payment_history` (`id`, `gl_id`, `gl_no`, `doc_no`, `gl_name`, `type`, `debit`, `credit`, `doc_description`, `updated_date`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 1023, NULL, 'SI', NULL, 830, NULL, '2020-04-29', '2020-04-29 05:47:51', '2020-04-29 05:47:51'),
(2, 3, NULL, 1023, NULL, NULL, 30, NULL, NULL, '2020-04-29', '2020-04-29 06:31:45', '2020-04-29 06:31:45'),
(3, 3, NULL, 1023, NULL, NULL, 100, NULL, NULL, '2020-04-29', '2020-04-29 06:36:27', '2020-04-29 06:36:27'),
(4, 3, NULL, 1023, NULL, NULL, 50, NULL, NULL, '2020-04-29', '2020-04-29 06:43:29', '2020-04-29 06:43:29'),
(5, 3, NULL, 1023, NULL, NULL, 50, NULL, NULL, '2020-04-29', '2020-04-29 06:46:05', '2020-04-29 06:46:05'),
(6, 2, NULL, NULL, NULL, 'SI', NULL, 360.5, NULL, '2020-04-29', '2020-04-29 06:50:24', '2020-04-29 06:50:24'),
(7, 2, NULL, 1026, NULL, 'SI', NULL, 4120, NULL, '2020-04-29', '2020-04-29 06:55:36', '2020-04-29 06:55:36'),
(8, 1, NULL, 1026, NULL, 'CR', 120, NULL, NULL, '2020-04-29', '2020-04-29 06:56:14', '2020-04-29 06:56:14'),
(9, 2, NULL, 1027, NULL, 'SI', NULL, 412, NULL, '2020-04-29', '2020-04-29 07:05:18', '2020-04-29 07:05:18'),
(10, 3, NULL, 1027, NULL, 'BP', 300, NULL, NULL, '2020-04-29', '2020-04-29 07:05:40', '2020-04-29 07:05:40'),
(11, 3, NULL, 1027, NULL, 'BP', 12, NULL, 'payment by bank', '2020-04-29', '2020-04-29 07:09:52', '2020-04-29 07:09:52'),
(12, NULL, NULL, NULL, NULL, 'CP', 0, 400, NULL, '2020-04-29', '2020-04-29 08:06:11', '2020-04-29 08:06:11'),
(13, NULL, NULL, NULL, NULL, 'CP', 400, 0, NULL, '2020-04-29', '2020-04-29 08:06:11', '2020-04-29 08:06:11'),
(14, 2, NULL, NULL, NULL, 'SI', 100, 0, NULL, '2020-04-29', '2020-04-29 08:09:11', '2020-04-29 08:09:11'),
(15, 1, NULL, NULL, NULL, 'CP', 0, 100, NULL, '2020-04-29', '2020-04-29 08:09:11', '2020-04-29 08:09:11'),
(16, 1, NULL, NULL, NULL, 'CP', 0, 200, NULL, '2020-04-29', '2020-04-29 08:10:57', '2020-04-29 08:10:57'),
(17, 1, NULL, NULL, NULL, 'CP', 200, 0, NULL, '2020-04-29', '2020-04-29 08:10:57', '2020-04-29 08:10:57'),
(18, 1, NULL, NULL, NULL, 'GR', 150, 0, NULL, '2020-04-29', '2020-04-29 08:12:02', '2020-04-29 08:12:02'),
(19, 3, NULL, NULL, NULL, 'GR', 0, 150, NULL, '2020-04-29', '2020-04-29 08:12:02', '2020-04-29 08:12:02'),
(20, 3, NULL, NULL, NULL, 'BP', 10, 0, NULL, '2020-04-29', '2020-04-29 08:14:27', '2020-04-29 08:14:27'),
(21, 20, NULL, NULL, NULL, 'BP', 0, 10, NULL, '2020-04-29', '2020-04-29 08:14:27', '2020-04-29 08:14:27'),
(22, 4, NULL, NULL, NULL, 'CP', 29, 0, NULL, '2020-04-29', '2020-04-29 08:16:22', '2020-04-29 08:16:22'),
(23, 20, NULL, NULL, NULL, 'CP', 0, 29, NULL, '2020-04-29', '2020-04-29 08:16:22', '2020-04-29 08:16:22'),
(24, 2, NULL, NULL, NULL, 'SI', 39, 0, NULL, '2020-04-29', '2020-04-29 08:18:12', '2020-04-29 08:18:12'),
(25, 3, NULL, NULL, NULL, 'CP', 0, 39, NULL, '2020-04-29', '2020-04-29 08:18:12', '2020-04-29 08:18:12'),
(26, 2, NULL, 1028, NULL, 'SI', NULL, 360.5, NULL, '2020-04-29', '2020-04-29 10:17:28', '2020-04-29 10:17:28'),
(27, 1, NULL, NULL, NULL, 'CP', 100, 0, NULL, '2020-04-29', '2020-04-29 12:39:13', '2020-04-29 12:39:13'),
(28, 3, NULL, NULL, NULL, 'CP', 0, 100, NULL, '2020-04-29', '2020-04-29 12:39:13', '2020-04-29 12:39:13'),
(29, 2, NULL, 1029, NULL, 'SI', NULL, 360.5, NULL, '2020-04-30', '2020-04-30 05:38:04', '2020-04-30 05:38:04'),
(30, 4, NULL, 1029, NULL, 'SI', 0, 360.5, NULL, '2020-04-30', '2020-04-30 05:38:04', '2020-04-30 05:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_product_categories`
--

CREATE TABLE `zenrolle_product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bussines_loc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_product_categories`
--

INSERT INTO `zenrolle_product_categories` (`id`, `company_id`, `category_name`, `category_desc`, `bussines_loc`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Electronics', 'Electronics product', 'lahore', '2020-01-29 08:11:07', '2020-01-29 08:11:07'),
(2, NULL, 'milk packss', 'sikndar abbas', 'lahore', '2020-01-30 09:40:56', '2020-01-30 09:40:56'),
(3, NULL, 'haleeb', 'haleeb milk', 'Model Town', '2020-01-30 10:51:27', '2020-01-30 10:51:27'),
(4, NULL, 'milk pack', 'heloo', 'lahore', '2020-01-30 12:18:39', '2020-01-30 12:18:39'),
(7, NULL, 'hi', 'heloo', 'johar town lahore', '2020-02-24 11:05:06', '2020-02-24 11:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_product_sub_category`
--

CREATE TABLE `zenrolle_product_sub_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_product_sub_category`
--

INSERT INTO `zenrolle_product_sub_category` (`id`, `category_id`, `sub_category`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fan', '2020-01-29 08:11:07', '2020-01-29 08:11:07'),
(2, 2, 'haleeb milk', '2020-01-30 09:40:56', '2020-01-30 09:40:56'),
(3, 3, 'Milk', '2020-01-30 10:51:27', '2020-01-30 10:51:27'),
(4, 4, 'hy', '2020-01-30 12:18:39', '2020-01-30 12:18:39'),
(7, 7, 'helooo', '2020-02-24 11:05:06', '2020-02-24 11:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_produts`
--

CREATE TABLE `zenrolle_produts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `warehouse` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `retail_price` decimal(16,2) NOT NULL,
  `wholsale_price` decimal(16,2) NOT NULL,
  `tax_rate` double(16,2) DEFAULT NULL,
  `discount_rate` decimal(16,2) DEFAULT NULL,
  `qty` decimal(10,2) NOT NULL,
  `alert_qty` int(11) NOT NULL,
  `receive_qty` double(16,2) DEFAULT NULL,
  `sold` float(16,2) DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_bonus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_produts`
--

INSERT INTO `zenrolle_produts` (`id`, `category_id`, `sub_category`, `company_id`, `warehouse`, `product_name`, `product_code`, `retail_price`, `wholsale_price`, `tax_rate`, `discount_rate`, `qty`, `alert_qty`, `receive_qty`, `sold`, `unit`, `description`, `barcode`, `product_desc`, `emp_bonus`, `image`, `created_at`, `updated_at`) VALUES
(7, 1, '1', 1, 1, 'Ac', 'AC3330', '3400.00', '3000.00', 1.00, '1.00', '300.00', 30, 2.00, 7.00, '1', NULL, NULL, NULL, NULL, '1580481851.jpg', '2020-01-31 09:44:11', '2020-03-19 10:21:18'),
(8, 1, '1', 1, 1, 'frig', '1234576', '67000.00', '65000.00', 2.00, '1.00', '280.00', 20, 400.00, 6.00, 'bandals', NULL, NULL, NULL, NULL, '1580481996.jpg', '2020-01-31 09:46:36', '2020-03-22 13:32:03'),
(10, 1, '1', 1, 1, 'milk pack', '123456', '200.00', '180.00', 4.00, '0.00', '500.00', 30, 32.00, 48.00, 'contaner', NULL, NULL, NULL, NULL, '1580734673.jpg', '2020-02-03 07:57:53', '2020-03-18 12:56:36'),
(12, 3, '3', 1, 4, 'Dew', '10024', '35.00', '30.00', 3.00, '0.00', '400.00', 20, 0.00, 49.00, 'Botals', NULL, NULL, NULL, NULL, '1581089172.jpg', '2020-02-07 10:26:12', '2020-04-30 05:38:04'),
(13, 3, '3', 1, 4, 'coca cola', '10025', '40.00', '35.00', 3.00, '0.00', '126.00', 30, 394.00, 148.00, 'Botals', NULL, NULL, NULL, NULL, '1581091504.jpg', '2020-02-07 11:05:04', '2020-04-29 07:05:18'),
(14, 3, '4', 1, 4, 'Pencil', '3333', '20.00', '10.00', 1.00, '2.00', '400.00', 2, NULL, 2.00, 'bandal', NULL, NULL, NULL, NULL, NULL, '2020-02-25 06:11:59', '2020-02-25 06:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_purcahse`
--

CREATE TABLE `zenrolle_purcahse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `warehouse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` double(16,2) NOT NULL,
  `total_tax` double(16,2) DEFAULT NULL,
  `payment_made` double(16,2) DEFAULT NULL,
  `account` int(255) DEFAULT NULL,
  `duepayment` double(16,2) DEFAULT NULL,
  `pyterm` int(191) DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_discount` double(16,2) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Due',
  `shipping` decimal(8,2) DEFAULT NULL,
  `total` double(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_purcahse`
--

INSERT INTO `zenrolle_purcahse` (`id`, `company_id`, `emp_id`, `supplier`, `invoice_no`, `reference_no`, `order_date`, `due_date`, `warehouse`, `tax`, `discount`, `invoice_note`, `subtotal`, `total_tax`, `payment_made`, `account`, `duepayment`, `pyterm`, `payment_method`, `total_discount`, `status`, `shipping`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '3', '1001', NULL, '2020-04-09', '2020-04-09', '1', NULL, '% Discount After TAX', 'purchase product', 3605.00, 105.00, 1125.00, NULL, NULL, 1, 'Bank', NULL, 'Partial', '20.00', 3625.00, '2020-04-09 13:15:45', '2020-04-15 07:44:39'),
(2, 1, 1, '4', '1002', NULL, '2020-04-09', '2020-04-09', '1', NULL, '% Discount After TAX', 'purchase product', 10815.00, 315.00, NULL, NULL, NULL, 1, NULL, NULL, 'Due', NULL, 10815.00, '2020-04-09 13:36:24', '2020-04-09 13:36:24'),
(3, 1, 1, '4', '1002', NULL, '2020-04-09', '2020-04-09', '1', NULL, '% Discount After TAX', 'purchase product', 10815.00, 315.00, NULL, NULL, NULL, 1, NULL, NULL, 'Due', NULL, 10815.00, '2020-04-09 13:36:42', '2020-04-09 13:36:42'),
(4, 1, 1, '4', '1002', NULL, '2020-04-09', '2020-04-09', '1', NULL, '% Discount After TAX', 'purchase product', 10815.00, 315.00, NULL, NULL, NULL, 1, NULL, NULL, 'Due', NULL, 10815.00, '2020-04-09 13:37:24', '2020-04-09 13:37:24'),
(5, 1, 1, '5', '1003', NULL, '2020-04-09', '2020-04-09', '1', NULL, '% Discount After TAX', 'purchase order', 83200.00, 3200.00, NULL, NULL, NULL, 1, NULL, NULL, 'Due', NULL, 83200.00, '2020-04-09 13:50:13', '2020-04-09 13:50:13'),
(6, 1, 1, '8', '1004', NULL, '2020-04-09', '2020-04-09', '1', NULL, '% Discount After TAX', 'purchase order test', 14420.00, 420.00, 420.00, NULL, NULL, 1, 'Bank', NULL, 'Partial', NULL, 14420.00, '2020-04-09 13:51:30', '2020-04-09 14:14:28'),
(7, 1, 1, '5', '1005', NULL, '2020-04-15', '2020-04-15', '1', NULL, '% Discount After TAX', NULL, 412.00, 12.00, NULL, NULL, NULL, 1, NULL, NULL, 'Due', NULL, 412.00, '2020-04-15 08:31:11', '2020-04-15 08:31:11'),
(8, 1, 1, '5', '1006', NULL, '2020-04-15', '2020-04-15', '1', NULL, '% Discount After TAX', NULL, 144.20, 4.20, NULL, NULL, NULL, 1, NULL, NULL, 'Due', NULL, 144.20, '2020-04-15 08:38:20', '2020-04-15 08:38:20'),
(9, 1, 1, '5', '1007', NULL, '2020-04-15', '2020-04-15', '1', NULL, '% Discount After TAX', NULL, 624.00, 24.00, NULL, NULL, NULL, 1, NULL, NULL, 'Due', NULL, 624.00, '2020-04-15 08:44:09', '2020-04-15 08:44:09'),
(10, 1, 1, '5', '1007', NULL, '2020-04-15', '2020-04-15', '1', NULL, '% Discount After TAX', NULL, 624.00, 24.00, NULL, NULL, NULL, 1, NULL, NULL, 'Due', NULL, 624.00, '2020-04-15 08:44:58', '2020-04-15 08:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_quote`
--

CREATE TABLE `zenrolle_quote` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoicedate` date NOT NULL,
  `invoice_duedate` date NOT NULL,
  `refer_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `csid` bigint(20) UNSIGNED NOT NULL,
  `warehouse_id` bigint(20) UNSIGNED NOT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_tax` double(16,2) DEFAULT NULL,
  `shipping` decimal(8,2) DEFAULT NULL,
  `sub_total` decimal(8,2) NOT NULL,
  `total_discount` double(16,2) DEFAULT NULL,
  `total` double(16,2) NOT NULL,
  `invoice_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Due',
  `proposal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empid` bigint(20) UNSIGNED NOT NULL,
  `pmethod` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` decimal(8,2) DEFAULT NULL,
  `p_blance` decimal(8,2) DEFAULT NULL,
  `item_qty` decimal(8,2) DEFAULT NULL,
  `terms` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_quote`
--

INSERT INTO `zenrolle_quote` (`id`, `company_id`, `invoice_no`, `invoicedate`, `invoice_duedate`, `refer_no`, `csid`, `warehouse_id`, `tax`, `discount`, `total_tax`, `shipping`, `sub_total`, `total_discount`, `total`, `invoice_note`, `status`, `proposal`, `empid`, `pmethod`, `payment`, `p_blance`, `item_qty`, `terms`, `created_at`, `updated_at`) VALUES
(2, 1, '1001', '2020-01-29', '2020-01-29', NULL, 1, 1, NULL, '% Discount After TAX', 36.00, '30.00', '1818.00', 18.00, 1848.00, NULL, 'Due', 'Test Try', 1, NULL, NULL, NULL, NULL, NULL, '2020-01-29 09:26:36', '2020-01-29 09:26:36'),
(3, 1, '1002', '2020-03-03', '2020-03-03', NULL, 1, 1, NULL, '% Discount After TAX', 0.00, '2.00', '80.00', 0.00, 82.00, NULL, 'Due', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2020-03-03 12:29:29', '2020-03-03 12:29:29'),
(4, 1, '1003', '2020-03-03', '2020-03-03', NULL, 7, 1, NULL, NULL, 0.00, '20.00', '785.00', 15.00, 805.00, NULL, 'Due', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2020-03-03 13:00:43', '2020-03-03 13:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_quote_items`
--

CREATE TABLE `zenrolle_quote_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pid` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` decimal(8,2) NOT NULL,
  `status` enum('sold','reserved') COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `price_type` enum('Wholesale','Retail') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` decimal(8,2) DEFAULT NULL,
  `total_tax` decimal(8,2) DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `product_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_quote_items`
--

INSERT INTO `zenrolle_quote_items` (`id`, `pid`, `product_id`, `product_name`, `code`, `qty`, `status`, `price`, `price_type`, `tax`, `total_tax`, `discount`, `total_amount`, `product_desc`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'fan', NULL, '2.00', 'sold', '900.00', 'Retail', '36.00', '36.00', '18.00', '1818.00', NULL, '2020-01-29 09:26:36', '2020-01-29 09:26:36'),
(2, 3, 13, 'coca cola', NULL, '2.00', 'sold', '40.00', 'Retail', '0.00', '0.00', '0.00', '80.00', NULL, '2020-03-03 12:29:29', '2020-03-03 12:29:29'),
(3, 4, 13, 'coca cola', NULL, '10.00', 'sold', '40.00', 'Retail', '0.00', '0.00', '10.00', '390.00', NULL, '2020-03-03 13:00:43', '2020-03-03 13:00:43'),
(4, 4, 10, 'milk pack', NULL, '2.00', 'sold', '200.00', 'Retail', '0.00', '0.00', '5.00', '395.00', NULL, '2020-03-03 13:00:43', '2020-03-03 13:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_saleorder`
--

CREATE TABLE `zenrolle_saleorder` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `po_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` int(191) NOT NULL,
  `qty_kg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `csid` int(191) NOT NULL,
  `qty_each` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `order_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_total` double NOT NULL,
  `shipping` double(16,2) DEFAULT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_saleorder`
--

INSERT INTO `zenrolle_saleorder` (`id`, `company_id`, `po_no`, `order_no`, `qty_kg`, `csid`, `qty_each`, `order_date`, `delivery_date`, `order_note`, `sub_total`, `shipping`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1001, NULL, 1, NULL, '2020-03-06', '2020-03-06', NULL, 7200, NULL, 7200, '2020-03-05 14:04:08', '2020-03-05 14:04:08'),
(2, 1, NULL, 1002, NULL, 4, NULL, '2020-03-06', '2020-03-06', NULL, 400, NULL, 400, '2020-03-06 05:40:50', '2020-03-06 05:40:50'),
(3, 1, NULL, 1003, NULL, 5, NULL, '2020-03-06', '2020-03-06', 'First test', 6800, NULL, 6800, '2020-03-06 05:44:05', '2020-03-06 05:44:05'),
(4, 1, NULL, 1004, NULL, 4, NULL, '2020-03-08', '2020-03-08', NULL, 140800, NULL, 140800, '2020-03-08 10:50:59', '2020-03-08 10:50:59'),
(5, 1, NULL, 1005, NULL, 1, NULL, '2020-03-08', '2020-03-08', NULL, 6800, NULL, 6800, '2020-03-08 11:00:55', '2020-03-08 11:00:55'),
(6, 1, NULL, 1006, NULL, 4, NULL, '2020-03-08', '2020-03-08', NULL, 6800, NULL, 6800, '2020-03-08 11:02:33', '2020-03-08 11:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_saleorder_detail`
--

CREATE TABLE `zenrolle_saleorder_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pid` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_saleorder_detail`
--

INSERT INTO `zenrolle_saleorder_detail` (`id`, `pid`, `product_id`, `product_name`, `qty`, `price`, `code`, `unit`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 'Ac', '2.00', '3400.00', 'AC3330', '1', '6800.00', '2020-03-05 14:04:08', '2020-03-05 14:04:08'),
(2, 1, 10, 'milk pack', '2.00', '200.00', '123456', 'contaner', '400.00', '2020-03-05 14:04:08', '2020-03-05 14:04:08'),
(3, 2, 10, 'mik', '2.00', '200.00', '123456', 'contaner', '400.00', '2020-03-06 05:40:50', '2020-03-06 05:40:50'),
(4, 3, 7, 'Ac', '2.00', '3400.00', 'AC3330', '1', '6800.00', '2020-03-06 05:44:05', '2020-03-06 05:44:05'),
(5, 6, 7, 'Ac', '2.00', '3400.00', 'AC3330', '1', '6800.00', '2020-03-08 11:02:34', '2020-03-08 11:02:34');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_suppliers`
--

CREATE TABLE `zenrolle_suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postbox` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_suppliers`
--

INSERT INTO `zenrolle_suppliers` (`id`, `name`, `phone`, `company`, `address`, `city`, `region`, `country`, `postbox`, `email`, `picture`, `taxid`, `created_at`, `updated_at`) VALUES
(3, 'ali', '03006789900', '0.00', 'Model Town', 'Lahore', 'Lahore', 'Pakistan', '540000', 'rehman@gmail.com', 'q', '1276', '2020-02-14 08:13:33', '2020-02-14 08:13:33'),
(4, 'asim', '0344589888', '0.00', 'johar town', 'lahore', 'lahore', 'Pakistan', '65000', 'asim@gmail.com', 'q', '8909', '2020-02-14 08:14:10', '2020-02-14 08:14:10'),
(5, 'shanii', '2048928', '0.00', 'johar town', 'lahore', 'lahore', 'Pakistan', '1234', 'sikandarabbas809@gmail.com', 'p', '7780', '2020-02-14 08:26:21', '2020-02-14 08:26:21'),
(6, 'abbas', '9485847', '0.00', 'lahore', 'lahore', 'lahore', 'Pakistan', '12345', 's@gmail.com', 'i', '3345', '2020-02-14 08:31:36', '2020-02-14 08:31:36'),
(8, 'sikandar', '9485847', 'asim solution', 'lahore', 'lahore', 'lahore', 'Pakistan', '1234', 's@gmail.com', 'i', '6688', '2020-02-14 09:57:48', '2020-02-14 09:57:48');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_taxes`
--

CREATE TABLE `zenrolle_taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_rate` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_terms`
--

CREATE TABLE `zenrolle_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) DEFAULT NULL,
  `terms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle_warehouse`
--

CREATE TABLE `zenrolle_warehouse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `warehouse_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bussines_loc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle_warehouse`
--

INSERT INTO `zenrolle_warehouse` (`id`, `company_id`, `warehouse_name`, `warehouse_desc`, `bussines_loc`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, NULL, 'Main Warehouse', 'All product of here', 'Lahore', '2020-01-29 08:16:25', '2020-01-29 08:16:25', NULL),
(4, NULL, 'car warehouse', 'car production workshop', 'johar town lahore', '2020-01-31 06:11:20', '2020-01-31 06:11:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle__general_transaction`
--

CREATE TABLE `zenrolle__general_transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_date` date NOT NULL,
  `posting_date` date NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_no` int(11) NOT NULL,
  `cheq_no` int(255) DEFAULT NULL,
  `net_balance` double NOT NULL,
  `total_debit` double(16,2) NOT NULL DEFAULT 0.00,
  `total_credit` double(16,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle__general_transaction`
--

INSERT INTO `zenrolle__general_transaction` (`id`, `transaction_type`, `doc_date`, `posting_date`, `description`, `doc_no`, `cheq_no`, `net_balance`, `total_debit`, `total_credit`, `created_at`, `updated_at`) VALUES
(1, 'CP', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 02:20:36', '2020-04-24 02:20:36'),
(2, 'Select Type', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 02:25:48', '2020-04-24 02:25:48'),
(3, 'Select Type', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 02:26:55', '2020-04-24 02:26:55'),
(4, 'CR', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 06:06:12', '2020-04-24 06:06:12'),
(5, 'CR', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 06:07:55', '2020-04-24 06:07:55'),
(6, 'CR', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 06:16:17', '2020-04-24 06:16:17'),
(7, 'CR', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 06:17:39', '2020-04-24 06:17:39'),
(8, 'Select Type', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 06:21:17', '2020-04-24 06:21:17'),
(9, 'Select Type', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 100, 0.00, 0.00, '2020-04-24 06:26:05', '2020-04-24 06:26:05'),
(10, 'Select Type', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 100, 0.00, 0.00, '2020-04-24 06:26:05', '2020-04-24 06:26:05'),
(11, 'Select Type', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 100, 0.00, 0.00, '2020-04-24 06:26:38', '2020-04-24 06:26:38'),
(12, 'Select Type', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 06:29:14', '2020-04-24 06:29:14'),
(13, 'Select Type', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 06:30:48', '2020-04-24 06:30:48'),
(14, 'Select Type', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 06:31:11', '2020-04-24 06:31:11'),
(15, 'CR', '2020-04-24', '2020-04-24', NULL, 10005, NULL, 0, 0.00, 0.00, '2020-04-24 06:57:59', '2020-04-24 06:57:59'),
(16, 'CR', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 06:58:57', '2020-04-24 06:58:57'),
(17, 'CR', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 07:04:31', '2020-04-24 07:04:31'),
(18, 'CR', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 07:04:44', '2020-04-24 07:04:44'),
(19, 'CR', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 07:04:53', '2020-04-24 07:04:53'),
(20, 'CR', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 07:08:28', '2020-04-24 07:08:28'),
(21, 'CR', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 07:08:48', '2020-04-24 07:08:48'),
(22, 'CR', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 08:17:33', '2020-04-24 08:17:33'),
(23, 'CP', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 08:35:26', '2020-04-24 08:35:26'),
(24, 'CP', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 08:36:40', '2020-04-24 08:36:40'),
(25, 'CP', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 08:38:14', '2020-04-24 08:38:14'),
(26, 'CR', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 08:40:00', '2020-04-24 08:40:00'),
(27, 'CP', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 08:42:39', '2020-04-24 08:42:39'),
(28, 'CP', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 08:43:43', '2020-04-24 08:43:43'),
(29, 'CP', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 08:43:56', '2020-04-24 08:43:56'),
(30, 'CR', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 09:01:19', '2020-04-24 09:01:19'),
(31, 'CR', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 09:02:31', '2020-04-24 09:02:31'),
(32, 'CP', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 11:43:58', '2020-04-24 11:43:58'),
(33, 'CP', '2020-04-24', '2020-04-24', NULL, 10001, NULL, 0, 0.00, 0.00, '2020-04-24 11:46:02', '2020-04-24 11:46:02'),
(34, 'CP', '2020-04-25', '2020-04-25', NULL, 10006, NULL, 0, 0.00, 0.00, '2020-04-24 17:20:24', '2020-04-24 17:20:24'),
(35, 'BP', '2020-04-25', '2020-04-25', NULL, 10007, NULL, 0, 0.00, 0.00, '2020-04-24 17:57:15', '2020-04-24 17:57:15'),
(36, 'BR', '2020-04-26', '2020-04-26', NULL, 10008, 12345678, 0, 100.00, 100.00, '2020-04-26 02:42:56', '2020-04-26 02:42:56'),
(37, 'Select Type', '2020-04-26', '2020-04-26', NULL, 10009, NULL, 0, 100.00, 100.00, '2020-04-26 04:44:17', '2020-04-26 04:44:17'),
(38, 'Select Type', '2020-04-26', '2020-04-26', NULL, 10010, NULL, -200, 0.00, 200.00, '2020-04-26 04:54:25', '2020-04-26 04:54:25'),
(39, 'CR', '2020-04-26', '2020-04-26', NULL, 10011, NULL, 100, 100.00, 0.00, '2020-04-26 04:59:59', '2020-04-26 04:59:59'),
(40, 'CP', '2020-04-26', '2020-04-26', NULL, 10012, NULL, 0, 100.00, 100.00, '2020-04-26 05:03:23', '2020-04-26 05:03:23'),
(41, 'BP', '2020-04-27', '2020-04-27', NULL, 10013, 12340, 0, 200.00, 200.00, '2020-04-27 11:42:02', '2020-04-27 11:42:02'),
(42, 'BR', '2020-04-28', '2020-04-28', 'test try', 10014, 12340, 0, 200.00, 200.00, '2020-04-27 15:53:42', '2020-04-27 15:53:42'),
(43, 'CR', '2020-04-28', '2020-04-28', NULL, 10015, NULL, 0, 200.00, 200.00, '2020-04-28 10:59:58', '2020-04-28 10:59:58'),
(44, 'CP', '2020-04-28', '2020-04-28', NULL, 10016, NULL, 0, 400.00, 400.00, '2020-04-28 11:48:20', '2020-04-28 11:48:20'),
(45, 'CP', '2020-04-29', '2020-04-29', NULL, 10017, NULL, 0, 300.00, 300.00, '2020-04-29 07:50:09', '2020-04-29 07:50:09'),
(46, 'CP', '2020-04-29', '2020-04-29', NULL, 10018, NULL, 0, 200.00, 200.00, '2020-04-29 07:56:35', '2020-04-29 07:56:35'),
(47, 'CP', '2020-04-29', '2020-04-29', NULL, 10019, NULL, 0, 200.00, 200.00, '2020-04-29 07:59:27', '2020-04-29 07:59:27'),
(48, 'CP', '2020-04-29', '2020-04-29', NULL, 10020, NULL, 0, 100.00, 100.00, '2020-04-29 08:03:37', '2020-04-29 08:03:37'),
(49, 'CP', '2020-04-29', '2020-04-29', NULL, 10021, NULL, 0, 400.00, 400.00, '2020-04-29 08:06:11', '2020-04-29 08:06:11'),
(50, 'CP', '2020-04-29', '2020-04-29', NULL, 10022, NULL, 0, 100.00, 100.00, '2020-04-29 08:09:11', '2020-04-29 08:09:11'),
(51, 'CP', '2020-04-29', '2020-04-29', NULL, 10023, NULL, 0, 200.00, 200.00, '2020-04-29 08:10:13', '2020-04-29 08:10:13'),
(52, 'CP', '2020-04-29', '2020-04-29', NULL, 10023, NULL, 0, 200.00, 200.00, '2020-04-29 08:10:57', '2020-04-29 08:10:57'),
(53, 'GR', '2020-04-29', '2020-04-29', NULL, 10024, NULL, 0, 150.00, 150.00, '2020-04-29 08:12:02', '2020-04-29 08:12:02'),
(54, 'BP', '2020-04-29', '2020-04-29', NULL, 10025, NULL, 0, 10.00, 10.00, '2020-04-29 08:14:27', '2020-04-29 08:14:27'),
(55, 'CP', '2020-04-29', '2020-04-29', NULL, 10026, NULL, 0, 29.00, 29.00, '2020-04-29 08:16:22', '2020-04-29 08:16:22'),
(56, 'CP', '2020-04-29', '2020-04-29', NULL, 10027, NULL, 0, 39.00, 39.00, '2020-04-29 08:18:12', '2020-04-29 08:18:12'),
(57, 'CP', '2020-04-29', '2020-04-29', NULL, 10028, NULL, 0, 100.00, 100.00, '2020-04-29 12:39:13', '2020-04-29 12:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle__general_transaction_detail`
--

CREATE TABLE `zenrolle__general_transaction_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pid` bigint(20) UNSIGNED NOT NULL,
  `gl_id` int(11) NOT NULL,
  `gl_no` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit` double DEFAULT NULL,
  `credit` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle__general_transaction_detail`
--

INSERT INTO `zenrolle__general_transaction_detail` (`id`, `pid`, `gl_id`, `gl_no`, `name`, `description`, `debit`, `credit`, `created_at`, `updated_at`) VALUES
(1, 15, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 06:57:59', '2020-04-24 06:57:59'),
(2, 15, 3, 3000001, 'Bank', 'Bank Payment', 0, 100, '2020-04-24 06:57:59', '2020-04-24 06:57:59'),
(3, 16, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 06:58:57', '2020-04-24 06:58:57'),
(4, 16, 3, 3000001, 'Bank', 'Bank Payment', 0, 100, '2020-04-24 06:58:57', '2020-04-24 06:58:57'),
(5, 17, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 07:04:31', '2020-04-24 07:04:31'),
(6, 17, 3, 3000001, 'Bank', 'Bank Payment', 0, 100, '2020-04-24 07:04:31', '2020-04-24 07:04:31'),
(7, 18, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 07:04:44', '2020-04-24 07:04:44'),
(8, 18, 3, 3000001, 'Bank', 'Bank Payment', 0, 100, '2020-04-24 07:04:44', '2020-04-24 07:04:44'),
(9, 19, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 07:04:53', '2020-04-24 07:04:53'),
(10, 19, 3, 3000001, 'Bank', 'Bank Payment', 0, 100, '2020-04-24 07:04:53', '2020-04-24 07:04:53'),
(11, 20, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 07:08:28', '2020-04-24 07:08:28'),
(12, 20, 3, 3000001, 'Bank', 'Bank Payment', 0, 100, '2020-04-24 07:08:28', '2020-04-24 07:08:28'),
(13, 21, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 07:08:48', '2020-04-24 07:08:48'),
(14, 21, 3, 3000001, 'Bank', 'Bank Payment', 0, 100, '2020-04-24 07:08:48', '2020-04-24 07:08:48'),
(15, 22, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 08:17:33', '2020-04-24 08:17:33'),
(16, 22, 3, 3000001, 'Bank', 'Bank Payment', 0, 100, '2020-04-24 08:17:33', '2020-04-24 08:17:33'),
(17, 23, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 08:35:26', '2020-04-24 08:35:26'),
(18, 23, 1, 1000001, 'Cash', 'Cash Payment', 0, 100, '2020-04-24 08:35:26', '2020-04-24 08:35:26'),
(19, 24, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 08:36:40', '2020-04-24 08:36:40'),
(20, 24, 1, 1000001, 'Cash', 'Cash Payment', 0, 100, '2020-04-24 08:36:40', '2020-04-24 08:36:40'),
(21, 25, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 08:38:14', '2020-04-24 08:38:14'),
(22, 25, 1, 1000001, 'Cash', 'Cash Payment', 0, 100, '2020-04-24 08:38:14', '2020-04-24 08:38:14'),
(23, 26, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 08:40:00', '2020-04-24 08:40:00'),
(24, 26, 2, 2000001, 'Sales', 'payment', 0, 100, '2020-04-24 08:40:00', '2020-04-24 08:40:00'),
(25, 27, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 08:42:39', '2020-04-24 08:42:39'),
(26, 27, 1, 1000001, 'Cash', 'Cash Payment', 0, 100, '2020-04-24 08:42:39', '2020-04-24 08:42:39'),
(27, 28, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 08:43:43', '2020-04-24 08:43:43'),
(28, 28, 1, 1000001, 'Cash', 'Cash Payment', 0, 100, '2020-04-24 08:43:43', '2020-04-24 08:43:43'),
(29, 29, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 08:43:56', '2020-04-24 08:43:56'),
(30, 29, 1, 1000001, 'Cash', 'Cash Payment', 0, 100, '2020-04-24 08:43:56', '2020-04-24 08:43:56'),
(31, 30, 1, 1000001, 'Cash', 'Cash Payment', 200, 0, '2020-04-24 09:01:19', '2020-04-24 09:01:19'),
(32, 30, 20, 5000001, 'Vendor', 'payment to vendor', 0, 200, '2020-04-24 09:01:19', '2020-04-24 09:01:19'),
(33, 31, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 09:02:31', '2020-04-24 09:02:31'),
(34, 31, 1, 1000001, 'Cash', 'Cash Payment', 0, 100, '2020-04-24 09:02:31', '2020-04-24 09:02:31'),
(35, 32, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 11:43:58', '2020-04-24 11:43:58'),
(36, 32, 1, 1000001, 'Cash', 'Cash Payment', 0, 100, '2020-04-24 11:43:58', '2020-04-24 11:43:58'),
(37, 33, 1, 1000001, 'Cash', 'Cash Payment', 0, 100, '2020-04-24 11:46:02', '2020-04-24 11:46:02'),
(38, 33, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 11:46:02', '2020-04-24 11:46:02'),
(39, 34, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 17:20:24', '2020-04-24 17:20:24'),
(40, 34, 3, 3000001, 'Bank', 'Bank Payment', 0, 100, '2020-04-24 17:20:24', '2020-04-24 17:20:24'),
(41, 35, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-24 17:57:15', '2020-04-24 17:57:15'),
(42, 35, 1, 1000001, 'Cash', 'Cash Payment', 0, 100, '2020-04-24 17:57:15', '2020-04-24 17:57:15'),
(43, 36, 3, 3000001, 'Bank', 'Bank Payment', 100, 0, '2020-04-26 02:42:56', '2020-04-26 02:42:56'),
(44, 36, 1, 1000001, 'Cash', 'Cash Payment', 0, 100, '2020-04-26 02:42:56', '2020-04-26 02:42:56'),
(45, 37, 2, 2000001, 'Sales', 'payment', 100, 0, '2020-04-26 04:44:17', '2020-04-26 04:44:17'),
(46, 37, 1, 1000001, 'Cash', 'Cash Payment', 0, 100, '2020-04-26 04:44:17', '2020-04-26 04:44:17'),
(47, 38, 1, 1000001, 'Cash', 'Cash Payment', 0, 0, '2020-04-26 04:54:25', '2020-04-26 04:54:25'),
(48, 38, 3, 3000001, 'Bank', 'Bank Payment', 0, 200, '2020-04-26 04:54:25', '2020-04-26 04:54:25'),
(49, 39, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-26 04:59:59', '2020-04-26 04:59:59'),
(50, 39, 3, 3000001, 'Bank', 'Bank Payment', 0, 0, '2020-04-26 04:59:59', '2020-04-26 04:59:59'),
(51, 40, 1, 1000001, 'Cash', 'Cash Payment', 0, 100, '2020-04-26 05:03:23', '2020-04-26 05:03:23'),
(52, 40, 3, 3000001, 'Bank', 'Bank Payment', 100, 0, '2020-04-26 05:03:23', '2020-04-26 05:03:23'),
(53, 41, 3, 3000001, 'Bank', 'Bank Payment', 200, 0, '2020-04-27 11:42:02', '2020-04-27 11:42:02'),
(54, 41, 3, 3000001, 'Bank', 'Bank Payment', 0, 200, '2020-04-27 11:42:02', '2020-04-27 11:42:02'),
(55, 42, 3, 3000001, 'Bank', 'Bank Payment', 200, 0, '2020-04-27 15:53:42', '2020-04-27 15:53:42'),
(56, 42, 3, 3000001, 'Bank', 'Bank Payment', 0, 200, '2020-04-27 15:53:42', '2020-04-27 15:53:42'),
(57, 43, 1, 1000001, 'Cash', 'Cash Payment', 200, 0, '2020-04-28 10:59:58', '2020-04-28 10:59:58'),
(58, 43, 3, 3000001, 'Bank', 'Bank Payment', 0, 200, '2020-04-28 10:59:58', '2020-04-28 10:59:58'),
(59, 44, 3, 3000001, 'Bank', 'Bank Payment', 400, 0, '2020-04-28 11:48:20', '2020-04-28 11:48:20'),
(60, 44, 3, 3000001, 'Bank', 'Bank Payment', 0, 400, '2020-04-28 11:48:20', '2020-04-28 11:48:20'),
(61, 45, 4, 4000001, 'Localcustomer', 'Receive payment', 300, 0, '2020-04-29 07:50:09', '2020-04-29 07:50:09'),
(62, 45, 20, 5000001, 'Vendor', 'payment to vendor', 0, 300, '2020-04-29 07:50:09', '2020-04-29 07:50:09'),
(63, 46, 1, 1000001, 'Cash', 'Cash Payment', 200, 0, '2020-04-29 07:56:35', '2020-04-29 07:56:35'),
(64, 46, 20, 5000001, 'Vendor', 'payment to vendor', 0, 200, '2020-04-29 07:56:35', '2020-04-29 07:56:35'),
(65, 47, 2, 2000001, 'Sales', 'payment', 200, 0, '2020-04-29 07:59:27', '2020-04-29 07:59:27'),
(66, 47, 3, 3000001, 'Bank', 'Bank Payment', 0, 200, '2020-04-29 07:59:27', '2020-04-29 07:59:27'),
(67, 48, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-29 08:03:37', '2020-04-29 08:03:37'),
(68, 48, 3, 3000001, 'Bank', 'Bank Payment', 0, 100, '2020-04-29 08:03:37', '2020-04-29 08:03:37'),
(69, 49, 1, 1000001, 'Cash', 'Cash Payment', 0, 400, '2020-04-29 08:06:11', '2020-04-29 08:06:11'),
(70, 49, 3, 3000001, 'Bank', 'Bank Payment', 400, 0, '2020-04-29 08:06:11', '2020-04-29 08:06:11'),
(71, 50, 2, 2000001, 'Sales', 'payment', 100, 0, '2020-04-29 08:09:11', '2020-04-29 08:09:11'),
(72, 50, 1, 1000001, 'Cash', 'Cash Payment', 0, 100, '2020-04-29 08:09:11', '2020-04-29 08:09:11'),
(73, 51, 1, 1000001, 'Cash', 'Cash Payment', 0, 200, '2020-04-29 08:10:13', '2020-04-29 08:10:13'),
(74, 51, 1, 1000001, 'Cash', 'Cash Payment', 200, 0, '2020-04-29 08:10:13', '2020-04-29 08:10:13'),
(75, 52, 1, 1000001, 'Cash', 'Cash Payment', 0, 200, '2020-04-29 08:10:57', '2020-04-29 08:10:57'),
(76, 52, 1, 1000001, 'Cash', 'Cash Payment', 200, 0, '2020-04-29 08:10:57', '2020-04-29 08:10:57'),
(77, 53, 1, 1000001, 'Cash', 'Cash Payment', 150, 0, '2020-04-29 08:12:02', '2020-04-29 08:12:02'),
(78, 53, 3, 3000001, 'Bank', 'Bank Payment', 0, 150, '2020-04-29 08:12:02', '2020-04-29 08:12:02'),
(79, 54, 3, 3000001, 'Bank', 'Bank Payment', 10, 0, '2020-04-29 08:14:27', '2020-04-29 08:14:27'),
(80, 54, 20, 5000001, 'Vendor', 'payment to vendor', 0, 10, '2020-04-29 08:14:27', '2020-04-29 08:14:27'),
(81, 55, 4, 4000001, 'Localcustomer', 'Receive payment', 29, 0, '2020-04-29 08:16:22', '2020-04-29 08:16:22'),
(82, 55, 20, 5000001, 'Vendor', 'payment to vendor', 0, 29, '2020-04-29 08:16:22', '2020-04-29 08:16:22'),
(83, 56, 2, 2000001, 'Sales', 'payment', 39, 0, '2020-04-29 08:18:12', '2020-04-29 08:18:12'),
(84, 56, 3, 3000001, 'Bank', 'Bank Payment', 0, 39, '2020-04-29 08:18:12', '2020-04-29 08:18:12'),
(85, 57, 1, 1000001, 'Cash', 'Cash Payment', 100, 0, '2020-04-29 12:39:13', '2020-04-29 12:39:13'),
(86, 57, 3, 3000001, 'Bank', 'Bank Payment', 0, 100, '2020-04-29 12:39:13', '2020-04-29 12:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `zenrolle__pur_history`
--

CREATE TABLE `zenrolle__pur_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(191) DEFAULT NULL,
  `payment` double DEFAULT NULL,
  `debit` double DEFAULT NULL,
  `credit` double DEFAULT NULL,
  `closing_balance` double NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cash',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'CP',
  `payment_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zenrolle__pur_history`
--

INSERT INTO `zenrolle__pur_history` (`id`, `po_id`, `vendor_id`, `payment`, `debit`, `credit`, `closing_balance`, `payment_method`, `type`, `payment_note`, `updated_date`, `created_at`, `updated_at`) VALUES
(1, 6, 3, NULL, 14420, NULL, 14420, 'Cash', 'CP', 'test try', NULL, '2020-04-09 13:51:30', '2020-04-09 13:51:30'),
(2, 6, 3, 20, NULL, NULL, 14400, 'Cash', 'CP', 'cash payment', NULL, '2020-04-09 14:13:57', '2020-04-09 14:13:57'),
(3, 6, 3, 400, NULL, NULL, 14000, 'Cash', 'CP', 'payment by cash', NULL, '2020-04-09 14:14:29', '2020-04-09 14:14:29'),
(6, 1, 4, 0, 300, NULL, 300, 'Cash', 'CP', NULL, NULL, '2020-04-13 12:16:30', '2020-04-13 12:16:30'),
(7, 1, 4, 100, NULL, NULL, 200, 'Cash', 'CP', 'payment by cash', '2020-04-13', '2020-04-13 12:17:18', '2020-04-13 12:17:18'),
(8, 1, 3, 100, NULL, NULL, 100, 'Cash', 'CP', 'payment by cash', '2020-04-14', '2020-04-14 12:01:42', '2020-04-14 12:01:42'),
(9, 1, 3, 100, NULL, NULL, 0, 'Cash', 'CP', 'payment by cash', '2020-04-14', '2020-04-14 12:42:22', '2020-04-14 12:42:22'),
(10, 1, 3, 100, NULL, NULL, -100, 'Cash', 'CP', 'cash', '2020-04-14', '2020-04-14 12:43:57', '2020-04-14 12:43:57'),
(11, 1, 3, 100, NULL, NULL, -200, 'Cash', 'CP', 'cash by', '2020-04-14', '2020-04-14 12:50:06', '2020-04-14 12:50:06'),
(12, 1, 3, 50, NULL, NULL, -250, 'Bank', 'BP', 'by bank', '2020-04-15', '2020-04-15 07:39:51', '2020-04-15 07:39:51'),
(14, 7, 5, NULL, 412, NULL, 412, 'Cash', 'CP', NULL, NULL, '2020-04-15 08:31:11', '2020-04-15 08:31:11'),
(15, 8, 5, NULL, 144.2, NULL, 144.2, 'Cash', 'CP', NULL, NULL, '2020-04-15 08:38:20', '2020-04-15 08:38:20'),
(16, 10, 5, NULL, 624, NULL, 624, 'Cash', 'CP', NULL, NULL, '2020-04-15 08:44:58', '2020-04-15 08:44:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_suppliers`
--
ALTER TABLE `add_suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `add_suppliers_email_unique` (`email`),
  ADD KEY `add_suppliers_company_id_foreign` (`company_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `companies_company_name_unique` (`company_name`),
  ADD UNIQUE KEY `companies_company_email_unique` (`company_email`);

--
-- Indexes for table `invoicehistory`
--
ALTER TABLE `invoicehistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_history`
--
ALTER TABLE `invoice_history`
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
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_numer`
--
ALTER TABLE `purchase_numer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote_nunber`
--
ALTER TABLE `quote_nunber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `zenrolle_abbrevition`
--
ALTER TABLE `zenrolle_abbrevition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zenrolle_account`
--
ALTER TABLE `zenrolle_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zenrolle_customers`
--
ALTER TABLE `zenrolle_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zenrolle_customers_company_id_foreign` (`company_id`),
  ADD KEY `zenrolle_customers_gid_foreign` (`gid`),
  ADD KEY `zenrolle_customers_route_id_foreign` (`route_id`);

--
-- Indexes for table `zenrolle_cust_group`
--
ALTER TABLE `zenrolle_cust_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zenrolle_cust_route`
--
ALTER TABLE `zenrolle_cust_route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zenrolle_employees`
--
ALTER TABLE `zenrolle_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zenrolle_grn`
--
ALTER TABLE `zenrolle_grn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zenrolle_grn_detail`
--
ALTER TABLE `zenrolle_grn_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zenrolle_grn_detail_grn_id_foreign` (`grn_id`);

--
-- Indexes for table `zenrolle_invoicess`
--
ALTER TABLE `zenrolle_invoicess`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zenrolle_invoicess_company_id_foreign` (`company_id`),
  ADD KEY `zenrolle_invoicess_csid_foreign` (`csid`),
  ADD KEY `zenrolle_invoicess_warehouse_id_foreign` (`warehouse_id`),
  ADD KEY `zenrolle_invoicess_empid_foreign` (`empid`);

--
-- Indexes for table `zenrolle_invoice_items`
--
ALTER TABLE `zenrolle_invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zenrolle_invoice_items_pid_foreign` (`pid`);

--
-- Indexes for table `zenrolle_paymentmethod`
--
ALTER TABLE `zenrolle_paymentmethod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zenrolle_paymentterms`
--
ALTER TABLE `zenrolle_paymentterms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zenrolle_payment_history`
--
ALTER TABLE `zenrolle_payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zenrolle_product_categories`
--
ALTER TABLE `zenrolle_product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zenrolle_product_categories_company_id_foreign` (`company_id`);

--
-- Indexes for table `zenrolle_product_sub_category`
--
ALTER TABLE `zenrolle_product_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zenrolle_product_sub_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `zenrolle_produts`
--
ALTER TABLE `zenrolle_produts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zenrolle_purcahse`
--
ALTER TABLE `zenrolle_purcahse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zenrolle_quote`
--
ALTER TABLE `zenrolle_quote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zenrolle_quote_company_id_foreign` (`company_id`),
  ADD KEY `zenrolle_quote_csid_foreign` (`csid`),
  ADD KEY `zenrolle_quote_warehouse_id_foreign` (`warehouse_id`),
  ADD KEY `zenrolle_quote_empid_foreign` (`empid`);

--
-- Indexes for table `zenrolle_quote_items`
--
ALTER TABLE `zenrolle_quote_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zenrolle_quote_items_pid_foreign` (`pid`);

--
-- Indexes for table `zenrolle_saleorder`
--
ALTER TABLE `zenrolle_saleorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zenrolle_saleorder_detail`
--
ALTER TABLE `zenrolle_saleorder_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zenrolle_suppliers`
--
ALTER TABLE `zenrolle_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zenrolle_taxes`
--
ALTER TABLE `zenrolle_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zenrolle_terms`
--
ALTER TABLE `zenrolle_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zenrolle_warehouse`
--
ALTER TABLE `zenrolle_warehouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zenrolle_warehouse_company_id_foreign` (`company_id`);

--
-- Indexes for table `zenrolle__general_transaction`
--
ALTER TABLE `zenrolle__general_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zenrolle__general_transaction_detail`
--
ALTER TABLE `zenrolle__general_transaction_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zenrolle__general_transaction_detail_pid_foreign` (`pid`);

--
-- Indexes for table `zenrolle__pur_history`
--
ALTER TABLE `zenrolle__pur_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zenrolle__pur_history_po_id_foreign` (`po_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_suppliers`
--
ALTER TABLE `add_suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoicehistory`
--
ALTER TABLE `invoicehistory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_history`
--
ALTER TABLE `invoice_history`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchase_numer`
--
ALTER TABLE `purchase_numer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quote_nunber`
--
ALTER TABLE `quote_nunber`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zenrolle_abbrevition`
--
ALTER TABLE `zenrolle_abbrevition`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zenrolle_account`
--
ALTER TABLE `zenrolle_account`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `zenrolle_customers`
--
ALTER TABLE `zenrolle_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `zenrolle_cust_group`
--
ALTER TABLE `zenrolle_cust_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zenrolle_cust_route`
--
ALTER TABLE `zenrolle_cust_route`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zenrolle_employees`
--
ALTER TABLE `zenrolle_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zenrolle_grn`
--
ALTER TABLE `zenrolle_grn`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zenrolle_grn_detail`
--
ALTER TABLE `zenrolle_grn_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zenrolle_invoicess`
--
ALTER TABLE `zenrolle_invoicess`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `zenrolle_invoice_items`
--
ALTER TABLE `zenrolle_invoice_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `zenrolle_paymentmethod`
--
ALTER TABLE `zenrolle_paymentmethod`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zenrolle_paymentterms`
--
ALTER TABLE `zenrolle_paymentterms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zenrolle_payment_history`
--
ALTER TABLE `zenrolle_payment_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `zenrolle_product_categories`
--
ALTER TABLE `zenrolle_product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `zenrolle_product_sub_category`
--
ALTER TABLE `zenrolle_product_sub_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `zenrolle_produts`
--
ALTER TABLE `zenrolle_produts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `zenrolle_purcahse`
--
ALTER TABLE `zenrolle_purcahse`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `zenrolle_quote`
--
ALTER TABLE `zenrolle_quote`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zenrolle_quote_items`
--
ALTER TABLE `zenrolle_quote_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zenrolle_saleorder`
--
ALTER TABLE `zenrolle_saleorder`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zenrolle_saleorder_detail`
--
ALTER TABLE `zenrolle_saleorder_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `zenrolle_suppliers`
--
ALTER TABLE `zenrolle_suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `zenrolle_taxes`
--
ALTER TABLE `zenrolle_taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zenrolle_terms`
--
ALTER TABLE `zenrolle_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zenrolle_warehouse`
--
ALTER TABLE `zenrolle_warehouse`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `zenrolle__general_transaction`
--
ALTER TABLE `zenrolle__general_transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `zenrolle__general_transaction_detail`
--
ALTER TABLE `zenrolle__general_transaction_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `zenrolle__pur_history`
--
ALTER TABLE `zenrolle__pur_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_suppliers`
--
ALTER TABLE `add_suppliers`
  ADD CONSTRAINT `add_suppliers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `zenrolle_customers`
--
ALTER TABLE `zenrolle_customers`
  ADD CONSTRAINT `zenrolle_customers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`),
  ADD CONSTRAINT `zenrolle_customers_gid_foreign` FOREIGN KEY (`gid`) REFERENCES `zenrolle_cust_group` (`id`),
  ADD CONSTRAINT `zenrolle_customers_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `zenrolle_cust_route` (`id`);

--
-- Constraints for table `zenrolle_grn_detail`
--
ALTER TABLE `zenrolle_grn_detail`
  ADD CONSTRAINT `zenrolle_grn_detail_grn_id_foreign` FOREIGN KEY (`grn_id`) REFERENCES `zenrolle_grn` (`id`);

--
-- Constraints for table `zenrolle_invoicess`
--
ALTER TABLE `zenrolle_invoicess`
  ADD CONSTRAINT `zenrolle_invoicess_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`),
  ADD CONSTRAINT `zenrolle_invoicess_csid_foreign` FOREIGN KEY (`csid`) REFERENCES `zenrolle_customers` (`id`),
  ADD CONSTRAINT `zenrolle_invoicess_empid_foreign` FOREIGN KEY (`empid`) REFERENCES `zenrolle_employees` (`id`),
  ADD CONSTRAINT `zenrolle_invoicess_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `zenrolle_warehouse` (`id`);

--
-- Constraints for table `zenrolle_invoice_items`
--
ALTER TABLE `zenrolle_invoice_items`
  ADD CONSTRAINT `zenrolle_invoice_items_pid_foreign` FOREIGN KEY (`pid`) REFERENCES `zenrolle_invoicess` (`id`);

--
-- Constraints for table `zenrolle_product_categories`
--
ALTER TABLE `zenrolle_product_categories`
  ADD CONSTRAINT `zenrolle_product_categories_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `zenrolle_product_sub_category`
--
ALTER TABLE `zenrolle_product_sub_category`
  ADD CONSTRAINT `zenrolle_product_sub_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `zenrolle_product_categories` (`id`);

--
-- Constraints for table `zenrolle_quote`
--
ALTER TABLE `zenrolle_quote`
  ADD CONSTRAINT `zenrolle_quote_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`),
  ADD CONSTRAINT `zenrolle_quote_csid_foreign` FOREIGN KEY (`csid`) REFERENCES `zenrolle_customers` (`id`),
  ADD CONSTRAINT `zenrolle_quote_empid_foreign` FOREIGN KEY (`empid`) REFERENCES `zenrolle_employees` (`id`),
  ADD CONSTRAINT `zenrolle_quote_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `zenrolle_warehouse` (`id`);

--
-- Constraints for table `zenrolle_quote_items`
--
ALTER TABLE `zenrolle_quote_items`
  ADD CONSTRAINT `zenrolle_quote_items_pid_foreign` FOREIGN KEY (`pid`) REFERENCES `zenrolle_quote` (`id`);

--
-- Constraints for table `zenrolle_warehouse`
--
ALTER TABLE `zenrolle_warehouse`
  ADD CONSTRAINT `zenrolle_warehouse_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `zenrolle__general_transaction_detail`
--
ALTER TABLE `zenrolle__general_transaction_detail`
  ADD CONSTRAINT `zenrolle__general_transaction_detail_pid_foreign` FOREIGN KEY (`pid`) REFERENCES `zenrolle__general_transaction` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `zenrolle__pur_history`
--
ALTER TABLE `zenrolle__pur_history`
  ADD CONSTRAINT `zenrolle__pur_history_po_id_foreign` FOREIGN KEY (`po_id`) REFERENCES `zenrolle_purcahse` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
