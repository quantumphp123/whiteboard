-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2024 at 04:34 AM
-- Server version: 10.6.17-MariaDB-cll-lve
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whiteboard_01`
--

-- --------------------------------------------------------

--
-- Table structure for table `back_lines`
--

CREATE TABLE `back_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img_name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `back_lines`
--

INSERT INTO `back_lines` (`id`, `name`, `created_at`, `updated_at`, `img_name`) VALUES
(1, '0-10 number line', NULL, NULL, 'ruler4.png'),
(2, '0-20 number line', NULL, NULL, 'ruler3.png'),
(3, '0-20 colorful number line', NULL, NULL, 'ruler2.png'),
(4, 'negative to positive number line', NULL, NULL, 'ruler1.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Anand Bairagi', 'anandbairagi500@gmail.com', 'uufjhh', NULL, NULL),
(2, 'Anand Bairagi', 'anandbairagi500@gmail.com', 'hgfjfgjjgfj', '2023-02-01 20:20:09', '2023-02-01 13:20:09'),
(3, 'Anand Bairagi', 'anandbairagi500@gmail.com', 'jhgkkkh', '2023-02-01 20:22:13', '2023-02-01 13:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `drafts`
--

CREATE TABLE `drafts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grade_id` bigint(20) UNSIGNED DEFAULT NULL,
  `line_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dimension_id` bigint(20) UNSIGNED DEFAULT NULL,
  `back_line_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drafts`
--

INSERT INTO `drafts` (`id`, `user_id`, `created_at`, `updated_at`, `grade_id`, `line_id`, `dimension_id`, `back_line_id`) VALUES
(53, 1, '2023-02-08 18:04:19', '2023-02-08 18:04:19', 4, NULL, 1, NULL),
(54, 1, '2023-02-08 18:10:10', '2023-02-08 18:10:10', 4, NULL, 1, NULL),
(55, 1, '2023-02-08 18:10:10', '2023-02-08 18:10:10', 4, NULL, 1, NULL),
(56, 1, '2023-02-08 18:10:24', '2023-02-08 18:10:24', 4, NULL, 1, NULL),
(57, 1, '2023-02-08 18:10:58', '2023-02-08 18:10:58', 4, NULL, 1, NULL),
(58, 1, '2023-02-08 18:11:06', '2023-02-08 18:11:06', 3, NULL, 1, NULL),
(59, 1, '2023-02-08 18:11:15', '2023-02-08 18:11:15', 4, NULL, 1, NULL),
(60, 1, '2023-02-08 18:12:44', '2023-02-08 18:12:44', 4, NULL, 1, NULL),
(61, 1, '2023-02-08 18:12:48', '2023-02-08 18:12:48', 3, NULL, 1, NULL),
(62, 1, '2023-02-08 18:12:52', '2023-02-08 18:12:52', 4, NULL, 1, NULL),
(63, 1, '2023-02-08 18:13:13', '2023-02-08 18:13:13', 4, NULL, 1, NULL),
(64, 1, '2023-02-08 18:13:19', '2023-02-08 18:13:19', 3, NULL, 1, NULL),
(65, 1, '2023-02-08 18:13:23', '2023-02-08 18:13:23', 4, NULL, 1, NULL),
(66, 1, '2023-02-08 18:13:42', '2023-02-08 18:13:42', 4, NULL, 1, NULL),
(67, 1, '2023-02-08 18:13:51', '2023-02-08 18:13:51', 3, NULL, 1, NULL),
(68, 1, '2023-02-08 18:15:07', '2023-02-08 18:15:07', 4, NULL, 1, NULL),
(69, 1, '2023-02-08 19:12:08', '2023-02-08 19:12:08', 4, 2, 1, NULL),
(70, 1, '2023-02-08 19:12:40', '2023-02-08 19:12:40', 3, NULL, 1, NULL),
(71, 1, '2023-02-08 19:13:13', '2023-02-08 19:13:13', 4, NULL, 1, 2),
(72, 1, '2023-02-08 19:14:37', '2023-02-08 19:16:21', 4, 3, 1, 2),
(73, 1, '2023-02-09 19:22:35', '2023-02-09 19:22:35', 1, NULL, 1, NULL),
(74, 1, '2023-02-09 19:23:35', '2023-02-09 19:23:35', 3, NULL, 1, NULL),
(75, 1, '2023-02-09 19:28:19', '2023-02-09 19:28:19', 3, 1, 1, NULL),
(76, 1, '2023-02-09 19:33:18', '2023-02-09 19:41:52', 4, NULL, 1, NULL),
(77, 1, '2023-04-25 01:05:07', '2023-04-25 01:05:07', 1, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `elements`
--

CREATE TABLE `elements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grade_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `elements`
--

INSERT INTO `elements` (`id`, `name`, `created_at`, `updated_at`, `grade_id`) VALUES
(46, '1717362424.png', '2022-11-08 19:36:31', NULL, 1),
(47, '1076367030.png', '2022-11-08 19:36:31', NULL, 1),
(48, '19099732.png', '2022-11-08 19:36:31', NULL, 1),
(49, '299057577.png', '2022-11-08 19:36:31', NULL, 1),
(50, '1747879085.png', '2022-11-08 19:36:31', NULL, 1),
(51, '1810900409.png', '2022-11-08 19:36:31', NULL, 1),
(52, '1506488340.png', '2022-11-08 19:36:31', NULL, 1),
(53, '724558355.png', '2022-11-08 19:36:31', NULL, 1),
(54, '722355382.png', '2022-11-08 19:36:31', NULL, 1),
(55, '1741515907.png', '2022-11-08 19:36:31', NULL, 1),
(56, '1372644538.png', '2022-11-08 19:36:31', NULL, 1),
(57, '1985067013.png', '2022-11-08 19:36:31', NULL, 1),
(58, '2007007371.png', '2022-11-08 19:36:31', NULL, 1),
(59, '54526603.png', '2022-11-08 19:36:31', NULL, 1),
(60, '345253345.png', '2022-11-08 19:36:31', NULL, 1),
(61, '1867331653.png', '2022-11-08 19:36:31', NULL, 1),
(62, '573753852.png', '2022-11-08 19:36:31', NULL, 1),
(63, '544927410.png', '2022-11-08 19:36:31', NULL, 1),
(64, '1356864892.png', '2022-11-08 19:36:31', NULL, 1),
(65, '1673622970.png', '2022-11-08 19:36:31', NULL, 1),
(66, '161781566.png', '2022-11-08 19:38:20', NULL, 2),
(67, '445299056.png', '2022-11-08 19:38:20', NULL, 2),
(68, '26164842.png', '2022-11-08 19:38:20', NULL, 2),
(69, '205192578.png', '2022-11-08 19:38:20', NULL, 2),
(70, '124740742.png', '2022-11-08 19:38:20', NULL, 2),
(71, '546626402.png', '2022-11-08 19:38:20', NULL, 2),
(72, '2026455104.png', '2022-11-08 19:38:20', NULL, 2),
(73, '1361836726.png', '2022-11-08 19:38:20', NULL, 2),
(74, '1847945999.png', '2022-11-08 19:38:20', NULL, 2),
(75, '53123371.png', '2022-11-08 19:38:20', NULL, 2),
(76, '2010051997.png', '2022-11-08 19:38:20', NULL, 2),
(77, '344601535.png', '2022-11-08 19:38:20', NULL, 2),
(78, '674882241.png', '2022-11-08 19:38:20', NULL, 2),
(79, '2068622154.png', '2022-11-08 19:38:20', NULL, 2),
(80, '88026514.png', '2022-11-08 19:38:20', NULL, 2),
(81, '1122224394.png', '2022-11-08 19:38:20', NULL, 2),
(82, '1810380540.png', '2022-11-08 19:38:20', NULL, 2),
(83, '1793470166.png', '2022-11-08 19:38:20', NULL, 2),
(84, '905328012.png', '2022-11-08 19:38:20', NULL, 2),
(85, '635927372.png', '2022-11-08 19:38:20', NULL, 2),
(86, '1101477845.png', '2022-11-08 19:38:49', NULL, 2),
(87, '206376684.png', '2022-11-08 19:38:49', NULL, 2),
(88, '1799592168.png', '2022-11-08 19:38:49', NULL, 2),
(89, '1515052853.png', '2022-11-08 19:38:49', NULL, 2),
(90, '877526509.png', '2022-11-08 19:38:49', NULL, 2),
(91, '338548559.png', '2022-11-08 19:38:49', NULL, 2),
(92, '1788701014.png', '2022-11-08 19:38:49', NULL, 2),
(93, '1888035342.png', '2022-11-08 19:39:42', NULL, 3),
(94, '1411883766.png', '2022-11-08 19:39:42', NULL, 3),
(95, '1650760787.png', '2022-11-08 19:39:42', NULL, 3),
(96, '1790184665.png', '2022-11-08 19:39:42', NULL, 3),
(97, '36507783.png', '2022-11-08 19:39:42', NULL, 3),
(98, '1177540908.png', '2022-11-08 19:39:42', NULL, 3),
(99, '2029360194.png', '2022-11-08 19:39:42', NULL, 3),
(100, '1753961011.png', '2022-11-08 19:39:42', NULL, 3),
(101, '1399349127.png', '2022-11-08 19:39:42', NULL, 3),
(102, '1339875952.png', '2022-11-08 19:39:42', NULL, 3),
(103, '675435599.png', '2022-11-08 19:39:42', NULL, 3),
(104, '816057742.png', '2022-11-08 19:39:42', NULL, 3),
(105, '1322679971.png', '2022-11-08 19:39:42', NULL, 3),
(106, '684536912.png', '2022-11-08 19:39:42', NULL, 3),
(107, '477100728.png', '2022-11-08 19:40:04', NULL, 4),
(108, '2010817753.png', '2022-11-08 19:40:04', NULL, 4),
(109, '1092480506.png', '2022-11-08 19:40:04', NULL, 4),
(110, '1715558380.png', '2022-11-08 19:40:04', NULL, 4),
(111, '1061177428.png', '2022-11-08 19:40:04', NULL, 4),
(112, '1721617382.png', '2022-11-08 19:40:04', NULL, 4),
(113, '1918823351.png', '2022-11-08 19:40:04', NULL, 4),
(114, '823429930.png', '2022-11-08 19:40:04', NULL, 4),
(115, '2071109896.png', '2022-11-08 19:40:04', NULL, 4),
(116, '1355508282.png', '2022-11-08 19:40:04', NULL, 4),
(117, '444566236.png', '2022-11-08 19:40:04', NULL, 4),
(118, '2047757919.png', '2022-11-08 19:40:04', NULL, 4),
(119, '683340075.png', '2022-11-08 19:40:04', NULL, 4),
(120, '1922274337.png', '2022-11-08 19:40:04', NULL, 4),
(121, '190260115.png', '2022-11-08 19:40:04', NULL, 4),
(122, '1219224126.png', '2022-11-08 19:40:04', NULL, 4),
(123, '652801620.png', '2022-11-30 11:26:07', NULL, 1),
(124, '543747555.png', '2022-11-30 11:26:07', NULL, 1),
(140, '1190509636.png', '2022-12-05 15:03:12', NULL, 1),
(141, '913655486.png', '2022-12-05 15:03:12', NULL, 1),
(142, '467799549.png', '2022-12-05 15:03:12', NULL, 1),
(143, '870256645.png', '2022-12-05 15:03:12', NULL, 1),
(144, '1607223595.png', '2022-12-05 15:03:12', NULL, 1),
(145, '284896376.png', '2022-12-05 15:03:12', NULL, 1),
(146, '895394958.png', '2022-12-05 15:03:12', NULL, 1),
(147, '1877597412.png', '2022-12-05 15:03:12', NULL, 1),
(148, '1055712070.png', '2022-12-05 15:03:12', NULL, 1),
(149, '457112372.png', '2022-12-05 15:03:12', NULL, 1),
(150, '720368049.png', '2022-12-05 15:03:12', NULL, 1),
(151, '218375341.png', '2022-12-05 15:09:12', NULL, 2),
(152, '2091352638.png', '2022-12-05 15:09:12', NULL, 2),
(153, '1101691392.png', '2022-12-05 15:09:12', NULL, 2),
(154, '865548956.png', '2022-12-05 15:09:12', NULL, 2),
(155, '1691029405.png', '2022-12-05 15:09:12', NULL, 2),
(156, '1311702183.png', '2022-12-05 15:10:53', NULL, 3),
(157, '1174457740.png', '2022-12-05 15:10:53', NULL, 3),
(158, '1432687974.png', '2022-12-05 15:10:53', NULL, 3),
(159, '2012806177.png', '2022-12-05 15:10:53', NULL, 3),
(160, '572688504.png', '2022-12-05 15:10:53', NULL, 3),
(161, '189993568.png', '2022-12-05 15:10:53', NULL, 3),
(162, '1976821306.png', '2022-12-05 15:10:53', NULL, 3),
(163, '116239836.png', '2022-12-05 15:10:53', NULL, 3),
(164, '260520699.png', '2022-12-05 15:10:53', NULL, 3),
(165, '226005457.png', '2022-12-05 15:10:53', NULL, 3),
(166, '910355044.png', '2022-12-05 15:10:53', NULL, 3),
(167, '77757143.png', '2022-12-05 15:10:53', NULL, 3),
(168, '643107775.png', '2022-12-05 15:10:53', NULL, 3),
(169, '1499732821.png', '2022-12-05 15:15:10', NULL, 4),
(170, '1980454882.png', '2022-12-05 15:15:10', NULL, 4),
(171, '1857614327.png', '2022-12-05 15:15:10', NULL, 4),
(172, '115722187.png', '2022-12-05 15:15:10', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `contact_number` varchar(191) NOT NULL,
  `address` text NOT NULL,
  `remarks` varchar(191) NOT NULL,
  `board_quantity` varchar(191) NOT NULL,
  `black_marker` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `green_marker` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `blue_marker` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `red_marker` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `draft_id` bigint(20) UNSIGNED DEFAULT NULL,
  `grade_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_name` varchar(191) NOT NULL,
  `dimension_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('enquiry','checkout_approved','checkout_pending') NOT NULL DEFAULT 'enquiry'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `contact_number`, `address`, `remarks`, `board_quantity`, `black_marker`, `green_marker`, `blue_marker`, `red_marker`, `created_at`, `updated_at`, `draft_id`, `grade_id`, `school_name`, `dimension_id`, `status`) VALUES
(77, 'Anand Bairagi', 'anandbairagi500@gmail.com', '1234567890', 'fgfdshg', 'kjhijashff', '45', 45, 0, 0, 0, '2023-02-06 17:10:31', NULL, NULL, 1, 'ABC', NULL, 'checkout_approved'),
(80, 'Anand Bairagi', 'anandbairagi500@gmail.com', '1234567890', 'ytjhfg', 'kjhijashff', '100', 25, 0, 50, 25, '2023-02-08 19:17:54', '2023-02-08 19:17:54', 72, NULL, 'Custom School', 1, 'enquiry'),
(81, 'Anand Bairagi', 'anandbairagi500@gmail.com', '1234567890', 'jkgkjh', 'kjhijashff', '100', 100, 0, 100, 0, '2023-02-08 19:35:11', NULL, NULL, 1, 'ABC', NULL, 'checkout_approved');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade` varchar(191) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Pre-K & Kindergarden', 8.00, NULL, NULL),
(2, '1st & 2nd Graders', 9.00, NULL, NULL),
(3, '3rd & 4th Graders', 10.00, NULL, NULL),
(4, '5th & 6th Graders', 10.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lines`
--

CREATE TABLE `lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lines`
--

INSERT INTO `lines` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'letter wrinting lines', NULL, NULL),
(2, 'double lines', NULL, NULL),
(3, 'single lines', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `marker_prices`
--

CREATE TABLE `marker_prices` (
  `id` bigint(20) NOT NULL,
  `marker` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `marker_prices`
--

INSERT INTO `marker_prices` (`id`, `marker`, `price`, `created_at`, `updated_at`) VALUES
(1, 'black_marker', 1.00, '2023-02-05 08:12:43', '2023-02-05 08:05:48'),
(2, 'blue_marker', 1.25, '2023-02-08 13:51:32', '2023-02-05 08:05:48'),
(3, 'green_marker', 1.00, '2023-02-05 08:12:51', '2023-02-05 08:05:48'),
(4, 'red_marker', 1.00, '2023-02-05 08:12:48', '2023-02-05 08:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_10_09_164836_create_users_table', 1),
(3, '2022_10_09_165305_create_elements_table', 2),
(4, '2022_10_09_165430_create_drafts_table', 3),
(5, '2022_10_09_170103_create_positions_table', 4),
(6, '2014_10_12_100000_create_password_resets_table', 5),
(7, '2019_08_19_000000_create_failed_jobs_table', 5),
(8, '2022_10_10_094335_create_grades_table', 5),
(9, '2022_10_10_103044_add_grade_id_to_elements', 6),
(10, '2022_10_11_130244_add_grade_id_to_drafts', 7),
(11, '2022_10_13_114104_create_enquiries_table', 8),
(12, '2022_10_13_141000_create_contact_us_table', 9),
(13, '2022_10_19_104855_add_draft_id_to_enquiries', 10),
(14, '2022_10_20_131142_create_lines_table', 11),
(15, '2022_10_20_134800_add_line_id_to_drafts', 12),
(16, '2022_10_20_173241_add_grade_id_to_enquiries', 13),
(17, '2022_10_20_180253_add_school_name_to_enquiries', 14),
(18, '2022_10_21_075303_create_sizes_table', 15),
(19, '2022_10_21_083629_add_length_to_drafts', 16),
(20, '2022_10_21_094856_add_dimension_id_to_enquiries', 17),
(21, '2022_10_21_180433_create_back_lines_table', 18),
(22, '2022_10_21_181456_add_img_name_to_back_lines', 19),
(23, '2022_10_21_181949_add_back_line_id_to_drafts', 20);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('anandbairagi500@gmail.com', 'Meya7JC6X3qS8CgHKRnQUTdcYpobRKySrycgdaL43CUNTeW5nkCVVY52Ig6kr5H1', '2022-10-26 15:59:17'),
('anandbairagi500@gmail.com', 'DMwkSd5xTqwTTREHKQsw1UkdaV0LowRJEIzbWlENrsXmZ6I1mGjYLoq0bhBdX4VE', '2022-10-26 16:01:11'),
('anandbairagi500@gmail.com', '9Q8abuk773hX6u95fd9GHvsRPTy6UZZ3FlGpEHnic6y4j43daEok7UtQ9yvnvvjX', '2022-10-26 16:05:39'),
('anandbairagi500@gmail.com', '6jCH5fKoYA9PlmhcZFoBOlJQa4nh2zvFrKBtfsz1EyVKli11vhUFi5DyH5fRloot', '2022-10-26 16:08:38'),
('anandbairagi500@gmail.com', '8YyDBmKwNXACol8ihRSxHjm07FgIiQ00TUTyYvgpkCH1dbrEsesp4AS8J6OqblqN', '2022-10-26 16:08:44'),
('anandbairagi500@gmail.com', 'ErRr6ifjwhuKjnb1zrWrgD2FTywyCb3NqgVLjl0XthiBUK6jMuLr6QLq0DnYypYQ', '2022-10-26 16:09:51'),
('anandbairagi500@gmail.com', 'gmzGDJ5LL5oN2WW6D6dZQSNw34G5JQLQJxi0GnGKnDFUU47kN07lv1L2aWcWALIf', '2022-10-26 16:16:47'),
('anandbairagi500@gmail.com', 'L5Gfn7ycdfoBJHZc8zls048xpPtVxbF1YZ0khOaR1mKTqrFI3M0MaEqNIHuzgA6E', '2022-10-26 16:16:52'),
('anandbairagi500@gmail.com', 'feTesjZKpJawRRvO0NMzdqurgb61uBTjf42xxAs7Pz6koa52ZNFWP8tXJSZ6Kq3l', '2022-10-26 16:18:37'),
('anandbairagi500@gmail.com', 'rda2LcwT1pYCIdFu6oFPlwWvDkLPFfQuPpokykxAX5tZ9MvrPIlsf0i5ownaUHPk', '2022-10-26 16:18:46'),
('anandbairagi500@gmail.com', 'bsG2Qw36pkkdYym7HRFKePJJp976BOU9uAcww6qs9LxcUjqFNxQVwCfAO5qjtJZc', '2022-10-26 16:22:10'),
('anandbairagi500@gmail.com', 'jx5A4yRnIDwp0iIIZpGbhzicPBOeVyjQIX7V9aHgT59jgQBJPrTCmOxSJlJaNgpj', '2022-10-26 16:24:39'),
('anandbairagi500@gmail.com', 'FrVaNo8IHHlSazmYKjG5zPJ8GMLpv6vzK8uGnYcmhZRKZcoCoO6xzFCrHy0qyL20', '2022-10-26 16:27:20'),
('anandbairagi500@gmail.com', 'KEZxwgMZmABg5JjZkuPxKX461FKCnh9WjzaQpHUKvhYE3fbW9x0yvsxnDSqiK1yq', '2022-10-26 16:28:14'),
('anandbairagi500@gmail.com', 'xJzKiSbemwvF6OYW1Y7CUJnPEuyNeVOAtByXNBN4uXEqYD63rGOots233MW9gdHn', '2022-10-31 18:12:20'),
('anandbairagi500@gmail.com', 'x8Ppvw5v2ScGZ2it7MPtETs5z5jhwIX3u7gJXPehzFYGhzEyHe2ZKxQ9vrQUmIye', '2022-10-31 18:18:41'),
('anandbairagi500@gmail.com', 'Ftaio0R3VWpcsWqrJpikTiETFWuQlVTml6kglclJ56CCQD8GJkUETwJPPaJ53Q6L', '2022-10-31 18:19:43'),
('anandbairagi500@gmail.com', 'b1EwjN0RuIHHjyutt8V3krlfX98NcL8vpNsuTWfE61Ga7HSY3dBjvicTYndaylbl', '2022-10-31 18:20:02'),
('anandbairagi500@gmail.com', 'Lfih7F13HolmSCPvyng7nT03cJ4xQJrkwJbT2JQZuJIhx69aij11fffJKIcSwrAw', '2022-10-31 18:22:13'),
('anandbairagi500@gmail.com', 'gsZmXbGVQOLKl2PbFRK4xIetfZvpQTpO38hwgrUc1l0z0mj5QN7iAlrHpoGVJ7ao', '2022-10-31 18:23:49'),
('anandbairagi500@gmail.com', 'tLCaVk3lTWmLyIeWwxfpRiIdUmuBdwMHMNoVTX6D79jIT5ikFRQ4MUUuiKWJXe1O', '2022-10-31 18:24:34'),
('anandbairagi500@gmail.com', 'qoJMEkjbuiFwX4a5iMOiuhjkwlXaDTvWpHwH7Nui6jKDJ9P5Svzwu6CdHwqZVMgF', '2022-10-31 18:25:37'),
('anandbairagi500@gmail.com', 'KonDiLa6uOjTg40mkRdyUmHJWunL2I3RJJcmYE1nZnzTFfEZTswaqqx62rfc6wCV', '2022-11-18 18:34:14'),
('somethinguseful@msn.com', 'pFcoR9UCLqQNtNnPVqOlgD5aXWMiBUhaLIZAmCSAU4aRK6SeK7Ittnri6OXv1zp3', '2022-12-15 21:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `payer_id`, `payer_email`, `amount`, `currency`, `payment_status`, `created_at`, `updated_at`) VALUES
(2, 'PAYID-MPQM3RY5EX51652LF8835445', '2LF4DXHJEF95C', 'sb-e43xsk24990412@business.example.com', 450.00, 'USD', 'approved', '2023-02-06 16:56:28', '2023-02-06 09:56:28'),
(3, 'PAYID-MPQNBUQ9PY04086K1146552X', '2LF4DXHJEF95C', 'sb-e43xsk24990412@business.example.com', 405.00, 'USD', 'approved', '2023-02-06 17:05:23', '2023-02-06 10:05:23'),
(4, 'PAYID-MPQNEGY61F16312FM318700R', '2LF4DXHJEF95C', 'sb-e43xsk24990412@business.example.com', 405.00, 'USD', 'approved', '2023-02-06 17:10:55', '2023-02-06 10:10:55'),
(5, 'PAYID-MPRZO4Y46F361587H958422K', '2LF4DXHJEF95C', 'sb-e43xsk24990412@business.example.com', 1000.00, 'USD', 'approved', '2023-02-08 19:37:41', '2023-02-08 12:37:41'),
(6, 'PAYID-MPRZQDI1B930517V8296512N', '2LF4DXHJEF95C', 'sb-e43xsk24990412@business.example.com', 500.00, 'USD', 'approved', '2023-02-08 19:39:54', '2023-02-08 12:39:54'),
(7, 'PAYID-MPSOTTY80W66165T1483771K', '2LF4DXHJEF95C', 'sb-e43xsk24990412@business.example.com', 950.00, 'USD', 'approved', '2023-02-09 19:48:30', '2023-02-09 12:48:30'),
(8, 'PAYID-MPSOXVA6NK58096MW9305308', '2LF4DXHJEF95C', 'sb-e43xsk24990412@business.example.com', 900.00, 'USD', 'approved', '2023-02-09 19:49:57', '2023-02-09 12:49:57'),
(9, 'PAYID-MPSOYHA496337645D164822R', '2LF4DXHJEF95C', 'sb-e43xsk24990412@business.example.com', 900.00, 'USD', 'approved', '2023-02-09 19:54:24', '2023-02-09 12:54:24'),
(10, 'PAYID-MPSO2SI2EP3894984525684F', '2LF4DXHJEF95C', 'sb-e43xsk24990412@business.example.com', 900.00, 'USD', 'approved', '2023-02-09 19:56:02', '2023-02-09 12:56:02'),
(11, 'PAYID-MPSO3BQ9JJ86580BH214035J', '2LF4DXHJEF95C', 'sb-e43xsk24990412@business.example.com', 48.00, 'USD', 'approved', '2023-02-09 19:57:54', '2023-02-09 12:57:54'),
(12, 'PAYID-MPSO5XY73P68473MP548292F', '2LF4DXHJEF95C', 'sb-e43xsk24990412@business.example.com', 950.00, 'USD', 'approved', '2023-02-09 20:03:05', '2023-02-09 13:03:05'),
(13, 'PAYID-MPSO6JQ7WC73630GK666000J', '2LF4DXHJEF95C', 'sb-e43xsk24990412@business.example.com', 48.00, 'USD', 'approved', '2023-02-09 20:03:56', '2023-02-09 13:03:56'),
(14, 'PAYID-MPSO6VA5NF70172HS517712A', '2LF4DXHJEF95C', 'sb-e43xsk24990412@business.example.com', 900.00, 'USD', 'approved', '2023-02-09 20:04:47', '2023-02-09 13:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(191) NOT NULL,
  `element_id` bigint(20) UNSIGNED NOT NULL,
  `draft_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position`, `element_id`, `draft_id`, `created_at`, `updated_at`) VALUES
(242, 'div_3', 70, 53, NULL, NULL),
(243, 'div_4', 71, 53, NULL, NULL),
(246, 'front_left_side_div_1', 74, 53, NULL, NULL),
(252, 'div_1', 78, 53, NULL, NULL),
(253, 'front_left_side_div_2', 77, 53, NULL, NULL),
(254, 'front_right_side_div_1', 107, 54, NULL, NULL),
(255, 'front_right_side_div_2', 109, 54, NULL, NULL),
(256, 'front_right_side_div_1', 107, 56, NULL, NULL),
(257, 'front_right_side_div_1', 66, 57, NULL, NULL),
(258, 'front_right_side_div_1', 93, 58, NULL, NULL),
(259, 'front_left_side_div_1', 94, 58, NULL, NULL),
(260, 'front_right_side_div_1', 107, 59, NULL, NULL),
(261, 'front_left_side_div_1', 94, 59, NULL, NULL),
(262, 'front_right_side_div_2', 109, 59, NULL, NULL),
(263, 'div_3', 111, 59, NULL, NULL),
(264, 'front_right_side_div_1', 66, 63, NULL, NULL),
(265, 'front_right_side_div_1', 93, 64, NULL, NULL),
(266, 'front_right_side_div_1', 107, 65, NULL, NULL),
(267, 'front_right_side_div_1', 66, 66, NULL, NULL),
(268, 'front_right_side_div_2', 68, 66, NULL, NULL),
(269, 'div_4', 69, 66, NULL, NULL),
(270, 'div_3', 70, 66, NULL, NULL),
(271, 'front_right_side_div_1', 93, 67, NULL, NULL),
(272, 'front_right_side_div_2', 94, 67, NULL, NULL),
(273, 'div_4', 96, 67, NULL, NULL),
(274, 'div_3', 70, 67, NULL, NULL),
(275, 'front_left_side_div_1', 97, 67, NULL, NULL),
(276, 'front_right_side_div_1', 107, 68, NULL, NULL),
(277, 'front_right_side_div_2', 110, 68, NULL, NULL),
(278, 'div_4', 109, 68, NULL, NULL),
(279, 'div_3', 112, 68, NULL, NULL),
(280, 'front_left_side_div_1', 111, 68, NULL, NULL),
(281, 'div_2', 113, 68, NULL, NULL),
(282, 'front_right_side_div_1', 66, 69, NULL, NULL),
(283, 'front_right_side_div_2', 68, 69, NULL, NULL),
(284, 'div_3', 69, 69, NULL, NULL),
(285, 'front_left_side_div_1', 70, 69, NULL, NULL),
(286, 'back_right_side_div_1', 74, 69, NULL, NULL),
(287, 'back_right_side_div_2', 72, 69, NULL, NULL),
(288, 'back_right_side_div_1', 93, 70, NULL, NULL),
(289, 'back_right_side_div_2', 94, 70, NULL, NULL),
(290, 'front_right_side_div_1', 95, 70, NULL, NULL),
(291, 'front_left_side_div_2', 97, 70, NULL, NULL),
(292, 'div_3', 96, 70, NULL, NULL),
(293, 'div_1', 99, 70, NULL, NULL),
(294, 'back_right_side_div_1', 107, 71, NULL, NULL),
(295, 'back_left_side_div_2', 109, 71, NULL, NULL),
(296, 'front_left_side_div_1', 111, 71, NULL, NULL),
(297, 'div_3', 112, 71, NULL, NULL),
(304, 'front_right_side_div_1', 107, 72, NULL, NULL),
(305, 'div_3', 109, 72, NULL, NULL),
(306, 'front_left_side_div_2', 111, 72, NULL, NULL),
(338, 'div_3', 107, 76, NULL, NULL),
(339, 'front_right_side_div_1', 66, 76, NULL, NULL),
(340, 'front_left_side_div_1', 46, 77, NULL, NULL),
(341, 'div_1', 142, 77, NULL, NULL),
(342, 'div_3', 143, 77, NULL, NULL),
(343, 'div_4', 141, 77, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `length` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `length`, `width`, `created_at`, `updated_at`) VALUES
(1, 16, 5, NULL, NULL),
(2, 36, 24, NULL, NULL),
(3, 48, 36, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Anand Bairagi', 'anandbairagi500@gmail.com', '$2y$10$nDvuFozx9yQJHtck.aExj.erfDydxEnUItc6IgKAezew7ARNZAyBG', '2022-10-09 11:21:59', '2022-10-21 02:12:33'),
(2, 'Veroniks Stephen', 'vs@gmail.com', '$2y$10$mRm/x7yD77aVLah5Ik8ShOKizDTcs3/l6kB1MZrx7mMLl.yRebAj.', '2022-10-10 02:30:41', '2022-10-10 02:30:41'),
(3, 'Veroka Steel', 'vss@gmail.com', '$2y$10$t2L8q9WV2X5sp6Jqgy7uUOSI39K6YEGNkX0mmpCll2nDgV1OeT8sa', '2022-10-10 02:34:08', '2022-10-10 02:34:08'),
(4, 'Akshay Kumar', 'ak@gmail.com', '$2y$10$LbciP0EH11EViogUP7Dv9.yC4DsYmtQYzvtqQTc1DvGB2ky92dV6.', '2022-10-10 02:35:25', '2022-10-10 02:35:25'),
(5, 'Radhika Sharma', 'rs@gmail.com', '$2y$10$4H1HDNW6d11/0mZGWjwKiOjiXCy1kdoEMBHDHw.zJMyKPrBw6KDIa', '2022-10-10 03:59:18', '2022-10-10 03:59:18'),
(6, 'Utsav Goel', 'ug@gmail.com', '$2y$10$4yXpXdoGXNLWgD7A75l5Z.6PYvrQPi3MVuErgSwmH2mc3oGBv/.GS', '2022-10-14 01:38:01', '2022-10-14 01:38:01'),
(8, 'Admin', 'admin@gmail.com', '$2y$10$pupWAXOxsbgWXXKaVZD01.guFaME9w3fBnMYe72e71E1C/gOtTaJm', '2022-10-19 04:15:48', '2022-10-19 04:15:48'),
(9, 'Kailash Kher', 'kk@gmail.com', '$2y$10$xH5M6r2HHN1ITMo98fRmq.FfOhAwYy7JKkJDe6v081Ma6zL7lkpUa', '2022-10-19 06:13:14', '2022-10-19 06:13:14'),
(10, 'avinash', 'avinash@gmail.com', '$2y$10$uZ977ixxqt8dgisaqeSbC.74OyowV3lLcSwhpUrPT0baltEZx.M0q', '2022-10-26 12:35:54', '2022-10-26 12:35:54'),
(11, 'Stephanie Harris', 'Somethinguseful@msn.com', '$2y$10$EFKS.DEQIiSw1P7jut3QyuWlU5VsYqmvZd.ciYhysDA0c6h77nnPu', '2022-10-26 20:05:07', '2022-10-26 20:05:07'),
(12, 'xyz', 'xyz@gmail.com', '$2y$10$T9vMiIVUSXmeVvFEYY6nC.3t8A7Z0u/7kGSjg2wDYTqu0i7SDC4gC', '2022-10-31 15:00:49', '2022-10-31 15:00:49'),
(13, 'Niranjan', 'nirgandhi728807@gmail.com', '$2y$10$.sDDx6dg8YYhcPbrqBDsDeM7jtpDzFNDnrF5UOi.4l5eOCS624xYK', '2022-10-31 21:41:45', '2022-10-31 21:41:45'),
(14, 'Ritik', 'ritik.quantumitinnovation@gmail.com', '$2y$10$a7bG9wd8xwf2Tt9v7Ck.Hed9Pi5m/Lf0m94hv1f57cNMMpHi1b.l2', '2022-11-01 20:59:19', '2022-11-01 20:59:19'),
(15, 'Swaraj', 'swarajchangole.quantumit@gmail.com', '$2y$10$/V2iam3G02ilrmMjN/fw2.HidTLydnOii7Y0QkLcunzuUvd2zu6vG', '2022-11-04 18:36:24', '2022-11-04 18:36:24'),
(16, 'test', 'test@gmail.com', '$2y$10$OCQ2Y3XUB3kmIBPiZFSxo.ZCjA33X7oCe0omA3w4i6yk53HpehBgm', '2023-01-31 16:52:22', '2023-01-31 16:52:22'),
(17, 'Utsav', 'utsav.quantumitinnovations@gmail.com', '$2y$10$mnsNSwarCVWIDJDR456QxuqDPofhFLQM4fSjGeqcb.HOvXhRGiUMC', '2023-08-06 13:46:37', '2023-08-06 13:46:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `back_lines`
--
ALTER TABLE `back_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drafts`
--
ALTER TABLE `drafts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drafts_user_id_foreign` (`user_id`),
  ADD KEY `drafts_grade_id_foreign` (`grade_id`),
  ADD KEY `drafts_line_id_foreign` (`line_id`),
  ADD KEY `drafts_dimension_id_foreign` (`dimension_id`),
  ADD KEY `drafts_back_line_id_foreign` (`back_line_id`);

--
-- Indexes for table `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elements_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enquiries_draft_id_foreign` (`draft_id`),
  ADD KEY `enquiries_grade_id_foreign` (`grade_id`),
  ADD KEY `enquiries_dimension_id_foreign` (`dimension_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lines`
--
ALTER TABLE `lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marker_prices`
--
ALTER TABLE `marker_prices`
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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `positions_element_id_foreign` (`element_id`),
  ADD KEY `positions_draft_id_foreign` (`draft_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
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
-- AUTO_INCREMENT for table `back_lines`
--
ALTER TABLE `back_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `drafts`
--
ALTER TABLE `drafts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `elements`
--
ALTER TABLE `elements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lines`
--
ALTER TABLE `lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marker_prices`
--
ALTER TABLE `marker_prices`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drafts`
--
ALTER TABLE `drafts`
  ADD CONSTRAINT `drafts_back_line_id_foreign` FOREIGN KEY (`back_line_id`) REFERENCES `back_lines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `drafts_dimension_id_foreign` FOREIGN KEY (`dimension_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `drafts_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `drafts_line_id_foreign` FOREIGN KEY (`line_id`) REFERENCES `lines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `drafts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `elements`
--
ALTER TABLE `elements`
  ADD CONSTRAINT `elements_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD CONSTRAINT `enquiries_dimension_id_foreign` FOREIGN KEY (`dimension_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enquiries_draft_id_foreign` FOREIGN KEY (`draft_id`) REFERENCES `drafts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enquiries_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_draft_id_foreign` FOREIGN KEY (`draft_id`) REFERENCES `drafts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `positions_element_id_foreign` FOREIGN KEY (`element_id`) REFERENCES `elements` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
