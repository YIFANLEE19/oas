-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2023 at 05:02 PM
-- Server version: 5.5.45
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oas`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_records`
--

CREATE TABLE `academic_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_record_id` bigint(20) UNSIGNED NOT NULL,
  `school_level_id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_graduation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_records`
--

INSERT INTO `academic_records` (`id`, `application_record_id`, `school_level_id`, `school_name`, `school_graduation`, `status`) VALUES
(2, 1, 2, NULL, NULL, '1'),
(3, 1, 3, NULL, NULL, '1'),
(4, 1, 4, NULL, NULL, '1'),
(5, 1, 5, NULL, NULL, '1'),
(6, 1, 6, NULL, NULL, '1'),
(7, 1, 7, NULL, NULL, '1'),
(8, 1, 8, NULL, NULL, '1'),
(17, 2, 1, 'SMK Impian Emas', '2020', '1'),
(18, 2, 2, NULL, NULL, '1'),
(19, 2, 3, NULL, NULL, '1'),
(20, 2, 4, NULL, NULL, '1'),
(21, 2, 5, NULL, NULL, '1'),
(22, 2, 6, NULL, NULL, '1'),
(23, 2, 7, NULL, NULL, '1'),
(24, 2, 8, NULL, NULL, '1'),
(25, 3, 1, 'SMK Something', '2019', '1'),
(26, 3, 2, NULL, NULL, '1'),
(27, 3, 3, NULL, NULL, '1'),
(28, 3, 4, NULL, NULL, '1'),
(29, 3, 5, NULL, NULL, '1'),
(30, 3, 6, NULL, NULL, '1'),
(31, 3, 7, NULL, NULL, '1'),
(32, 3, 8, NULL, NULL, '1'),
(33, 4, 1, 'SMK Something', '2019', '1'),
(34, 4, 2, NULL, NULL, '1'),
(35, 4, 3, NULL, NULL, '1'),
(36, 4, 4, NULL, NULL, '1'),
(37, 4, 5, NULL, NULL, '1'),
(38, 4, 6, NULL, NULL, '1'),
(39, 4, 7, NULL, NULL, '1'),
(40, 4, 8, NULL, NULL, '1'),
(41, 2, 1, 'Foon Yew High School', '2018', '1'),
(42, 2, 2, NULL, NULL, '1'),
(43, 2, 3, NULL, NULL, '1'),
(44, 2, 4, NULL, NULL, '1'),
(45, 2, 5, NULL, NULL, '1'),
(46, 2, 6, NULL, NULL, '1'),
(47, 2, 7, NULL, NULL, '1'),
(48, 2, 8, NULL, NULL, '1'),
(49, 2, 1, 'Foon Yew High School', '23123', '1'),
(50, 2, 2, NULL, NULL, '1'),
(51, 2, 3, NULL, NULL, '1'),
(52, 2, 4, NULL, NULL, '1'),
(53, 2, 5, NULL, NULL, '1'),
(54, 2, 6, NULL, NULL, '1'),
(55, 2, 7, NULL, NULL, '1'),
(56, 2, 8, NULL, NULL, '1'),
(57, 1, 1, 'SMK Impian Emas', NULL, '1'),
(58, 1, 2, 'US', NULL, '1'),
(59, 1, 3, 'F', NULL, '1'),
(60, 1, 4, 'DI', NULL, '1'),
(61, 1, 5, 'DE', NULL, '1'),
(62, 1, 6, 'P', NULL, '1'),
(63, 1, 7, 'M', NULL, '1'),
(64, 1, 8, 'O', NULL, '1'),
(65, 6, 1, 'Foon Yew High School', '2018', '1'),
(66, 6, 2, NULL, NULL, '1'),
(67, 6, 3, NULL, NULL, '1'),
(68, 6, 4, NULL, NULL, '1'),
(69, 6, 5, NULL, NULL, '1'),
(70, 6, 6, NULL, NULL, '1'),
(71, 6, 7, NULL, NULL, '1'),
(72, 6, 8, NULL, NULL, '1'),
(73, 7, 1, 'Foon Yew High School', '2020', '1'),
(74, 7, 2, NULL, NULL, '1'),
(75, 7, 3, NULL, NULL, '1'),
(76, 7, 4, NULL, NULL, '1'),
(77, 7, 5, NULL, NULL, '1'),
(78, 7, 6, NULL, NULL, '1'),
(79, 7, 7, NULL, NULL, '1'),
(80, 7, 8, NULL, NULL, '1'),
(81, 8, 1, 'Foon Yew High School', '2022', '1'),
(82, 8, 2, NULL, NULL, '1'),
(83, 8, 3, NULL, NULL, '1'),
(84, 8, 4, NULL, NULL, '1'),
(85, 8, 5, NULL, NULL, '1'),
(86, 8, 6, NULL, NULL, '1'),
(87, 8, 7, NULL, NULL, '1'),
(88, 8, 8, NULL, NULL, '1'),
(89, 9, 1, 'Foon Yew High School', '2022', '1'),
(90, 9, 2, NULL, NULL, '1'),
(91, 9, 3, NULL, NULL, '1'),
(92, 9, 4, NULL, NULL, '1'),
(93, 9, 5, NULL, NULL, '1'),
(94, 9, 6, NULL, NULL, '1'),
(95, 9, 7, NULL, NULL, '1'),
(96, 9, 8, NULL, NULL, '1'),
(97, 10, 1, 'Foon Yew High School', '2022', '1'),
(98, 10, 2, NULL, NULL, '1'),
(99, 10, 3, NULL, NULL, '1'),
(100, 10, 4, NULL, NULL, '1'),
(101, 10, 5, NULL, NULL, '1'),
(102, 10, 6, NULL, NULL, '1'),
(103, 10, 7, NULL, NULL, '1'),
(104, 10, 8, NULL, NULL, '1'),
(105, 1, 1, 'ASDAD', NULL, '1'),
(106, 1, 2, NULL, NULL, '1'),
(107, 1, 3, NULL, NULL, '1'),
(108, 1, 4, NULL, NULL, '1'),
(109, 1, 5, NULL, NULL, '1'),
(110, 1, 6, NULL, NULL, '1'),
(111, 1, 7, NULL, NULL, '1'),
(112, 1, 8, NULL, NULL, '1'),
(113, 11, 1, 'Foon Yew High School', '2022', '1'),
(114, 11, 2, NULL, NULL, '1'),
(115, 11, 3, NULL, NULL, '1'),
(116, 11, 4, NULL, NULL, '1'),
(117, 11, 5, NULL, NULL, '1'),
(118, 11, 6, NULL, NULL, '1'),
(119, 11, 7, NULL, NULL, '1'),
(120, 11, 8, NULL, NULL, '1'),
(129, 15, 1, 'Foon Yew High School', '2022', '1'),
(130, 15, 2, NULL, NULL, '1'),
(131, 15, 3, NULL, NULL, '1'),
(132, 15, 4, NULL, NULL, '1'),
(133, 15, 5, NULL, NULL, '1'),
(134, 15, 6, NULL, NULL, '1'),
(135, 15, 7, NULL, NULL, '1'),
(136, 15, 8, NULL, NULL, '1'),
(137, 17, 1, 'Foon Yew High School', '2022', '1'),
(138, 17, 2, NULL, NULL, '1'),
(139, 17, 3, NULL, NULL, '1'),
(140, 17, 4, NULL, NULL, '1'),
(141, 17, 5, NULL, NULL, '1'),
(142, 17, 6, NULL, NULL, '1'),
(143, 17, 7, NULL, NULL, '1'),
(144, 17, 8, NULL, NULL, '1'),
(145, 18, 1, 'SMK Southern', '2021', '1'),
(146, 18, 2, NULL, NULL, '1'),
(147, 18, 3, NULL, NULL, '1'),
(148, 18, 4, NULL, NULL, '1'),
(149, 18, 5, NULL, NULL, '1'),
(150, 18, 6, NULL, NULL, '1'),
(151, 18, 7, NULL, NULL, '1'),
(152, 18, 8, NULL, NULL, '1'),
(153, 24, 1, 'SMK Bunga Raya', '2020', '1'),
(154, 24, 2, NULL, NULL, '1'),
(155, 24, 3, NULL, NULL, '1'),
(156, 24, 4, NULL, NULL, '1'),
(157, 24, 5, NULL, NULL, '1'),
(158, 24, 6, NULL, NULL, '1'),
(159, 24, 7, NULL, NULL, '1'),
(160, 24, 8, NULL, NULL, '1'),
(161, 25, 1, 'SMK Southern', '2021', '1'),
(162, 25, 2, NULL, NULL, '1'),
(163, 25, 3, NULL, NULL, '1'),
(164, 25, 4, NULL, NULL, '1'),
(165, 25, 5, NULL, NULL, '1'),
(166, 25, 6, NULL, NULL, '1'),
(167, 25, 7, NULL, NULL, '1'),
(168, 25, 8, NULL, NULL, '1'),
(169, 18, 1, 'big J suck', '2021', '1'),
(170, 18, 2, NULL, NULL, '1'),
(171, 18, 3, NULL, NULL, '1'),
(172, 18, 4, NULL, NULL, '1'),
(173, 18, 5, NULL, NULL, '1'),
(174, 18, 6, NULL, NULL, '1'),
(175, 18, 7, NULL, NULL, '1'),
(176, 18, 8, NULL, NULL, '1'),
(177, 26, 1, '123123', '2312313', '1'),
(178, 26, 2, NULL, NULL, '1'),
(179, 26, 3, NULL, NULL, '1'),
(180, 26, 4, NULL, NULL, '1'),
(181, 26, 5, NULL, NULL, '1'),
(182, 26, 6, NULL, NULL, '1'),
(183, 26, 7, NULL, NULL, '1'),
(184, 26, 8, NULL, NULL, '1'),
(185, 5, 1, 'SMK Bunga Raya', '2020', '1'),
(186, 5, 2, NULL, NULL, '1'),
(187, 5, 3, NULL, NULL, '1'),
(188, 5, 4, NULL, NULL, '1'),
(189, 5, 5, NULL, NULL, '1'),
(190, 5, 6, NULL, NULL, '1'),
(191, 5, 7, NULL, NULL, '1'),
(192, 5, 8, NULL, NULL, '1'),
(193, 27, 1, 'SMK Bunga Raya', NULL, '1'),
(194, 27, 2, NULL, NULL, '1'),
(195, 27, 3, NULL, NULL, '1'),
(196, 27, 4, NULL, NULL, '1'),
(197, 27, 5, NULL, NULL, '1'),
(198, 27, 6, NULL, NULL, '1'),
(199, 27, 7, NULL, NULL, '1'),
(200, 27, 8, NULL, NULL, '1'),
(201, 28, 1, '1123421', '2022', '1'),
(202, 28, 2, NULL, NULL, '1'),
(203, 28, 3, NULL, NULL, '1'),
(204, 28, 4, NULL, NULL, '1'),
(205, 28, 5, NULL, NULL, '1'),
(206, 28, 6, NULL, NULL, '1'),
(207, 28, 7, NULL, NULL, '1'),
(208, 28, 8, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `academic_transcripts`
--

CREATE TABLE `academic_transcripts` (
  `academic_records_id` bigint(20) UNSIGNED NOT NULL,
  `school_transcript_id` bigint(20) UNSIGNED NOT NULL,
  `school_levels_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_transcripts`
--

INSERT INTO `academic_transcripts` (`academic_records_id`, `school_transcript_id`, `school_levels_id`) VALUES
(2, 10, 1),
(2, 11, 1),
(2, 10, 1),
(2, 11, 1),
(2, 10, 1),
(2, 11, 1),
(6, 15, 1),
(6, 16, 1),
(6, 17, 1),
(7, 18, 1),
(8, 19, 1),
(8, 20, 1),
(89, 21, 1),
(97, 22, 1),
(129, 23, 1),
(145, 24, 1),
(161, 25, 1),
(177, 26, 1),
(177, 27, 1),
(185, 28, 1),
(193, 29, 1),
(201, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `acc_statuses`
--

CREATE TABLE `acc_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acc_statuses`
--

INSERT INTO `acc_statuses` (`id`, `status`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `street2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `street1`, `street2`, `zipcode`, `city`, `state`, `country_id`) VALUES
(1, 'Line 1', 'Line 2', '81120', 'Johor', 'Johor Bahru', 6),
(2, 'Line 1', 'Line 2', '81120', 'Johor', 'Johor Bahru', 6),
(3, 'Line', 'Line 2', '81120', 'Johor', 'Johor Bahru', 1),
(4, '2', '2', '2', '2', '2', 1),
(5, '2', '2', '2', '2', '2', 1),
(6, '22', '2', '2', '2', '2', 1),
(7, 'No.10, Jalan SangatBesar', 'Taman TakDeAir', '123456', 'Skudai', 'Johor', 131),
(8, 'No.10, Jalan SangatBesar', 'Taman TakDeAir', '123456', 'Skudai', 'Johor', 131),
(9, 'No.10, Jalan SangatBesar', 'Taman TakDeAir', '123456', 'Skudai', 'Johor', 131),
(10, 'No.10, Jalan SangatBesar', 'Taman TakDeAir', '123456', 'Skudai', 'Johor', 131),
(11, 'No.10, Jalan SangatBesar', 'Taman TakDeAir', '123456', 'Skudai', 'Johor', 131),
(12, 'No.10, Jalan SangatBesar', 'Taman TakDeAir', '123456', 'Skudai', 'Johor', 131),
(13, 'No.10, Jalan SangatBesar', 'Taman TakDeAir', '123456', 'Skudai', 'Johor', 7),
(14, 'No.10, Jalan SangatBesar', 'Taman TakDeAir', '123456', 'Skudai', 'Johor', 7),
(15, '2', '2', '2', '2', '2', 131),
(16, '2', '2', '2', '2', '2', 131),
(17, '22', '2', '2', '2', '2', 131),
(18, '2', '2', '2', '2', '2', 2),
(19, '2', '2', '2', '2', '2', 2),
(20, '22', '2', '2', '2', '2', 15),
(21, '2', '2', '2', '2', '2', 10),
(22, '2', '2', '2', '2', '2', 10),
(23, '22', '2', '2', '2', '2', 2),
(24, '2', '2', '2', '2', '2', 131),
(25, '2', '2', '2', '2', '2', 131),
(26, '22', '2', '2', '2', '2', 131),
(27, '2', '2', '2', '2', '2', 131),
(28, '2', '2', '2', '2', '2', 131),
(29, '22', '2', '2', '2', '2', 131),
(30, '2', '2', '2', '2', '2', 2),
(31, '2', '2', '2', '2', '2', 2),
(32, '22', '2', '2', '2', '2', 131),
(33, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 131),
(34, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 131),
(35, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 131),
(36, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 131),
(37, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 131),
(38, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 131),
(39, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 1),
(40, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 1),
(41, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 1),
(42, '2', 'Jalan Southern', '12345', 'Johor Bahru', 'Johor', 131),
(43, '2', 'Jalan Southern', '12345', 'Johor Bahru', 'Johor', 131),
(44, '2', 'Jalan Southern', '12345', 'Johor Bahru', 'Johor', 131),
(45, 'pos 1', 'batu 2', '84000', 'muar', 'johor', 131),
(46, 'pos 1', 'batu 2', '84000', 'muar', 'johor', 131),
(47, 'pos 1', 'batu 2', '84000', 'muar', 'johor', 131),
(48, '2', '2', '12345', '2', '2', 131),
(49, '2', '2', '2', '2', '2', 131),
(50, '22', '2', '12345', '2', '2', 131),
(51, '2', 'Jalan Southern', '80000', 'Johor', 'johor bahru', 131),
(52, '2', 'Jalan Southern', '80000', 'Johor', 'johor bahru', 131),
(53, '2', 'Jalan Southern', '80000', 'Johor', 'johor bahru', 131),
(54, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 131),
(55, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 131),
(56, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 217),
(57, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 1),
(58, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 127),
(59, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 127),
(60, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 131),
(61, '1,', 'Jalan Southern', '81750', 'Johor', 'Johor Bahru', 131),
(62, '1,', 'Jalan Southern', '81750', 'Johor', 'Johor Bahru', 131),
(63, '1,', 'Jalan Southern', '81750', 'Johor', 'Johor Bahru', 131),
(64, '2', '2', '21231', '2', '2', 3),
(65, '2', '2', '2', '2', '2', 3),
(66, '22', '2', '21231', '2', '2', 2),
(67, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 131),
(68, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 131),
(69, 'No.6, Jalan Pulai 678', 'Taman Pulai UUtama', '81110', 'Skudai', 'Johor', 131),
(70, 'no 24 qwer', 'qwerqw', '86000', 'hgfdghsghfd', 'fdghdfgh', 131),
(71, 'no 24 qwer', 'qwerqw', '86000', 'hgfdghsghfd', 'fdghdfgh', 131),
(72, 'no 24 qwer', 'qwerqw', '86000', 'hgfdghsghfd', 'fdghdfgh', 131);

-- --------------------------------------------------------

--
-- Table structure for table `address_mappings`
--

CREATE TABLE `address_mappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_detail_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `address_type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address_mappings`
--

INSERT INTO `address_mappings` (`id`, `user_detail_id`, `address_id`, `address_type_id`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 2, 3, 2),
(4, 5, 4, 1),
(5, 5, 5, 2),
(6, 6, 6, 2),
(7, 9, 7, 1),
(8, 9, 8, 2),
(9, 10, 9, 2),
(10, 13, 10, 1),
(11, 13, 11, 2),
(12, 14, 12, 2),
(13, 17, 13, 1),
(14, 17, 14, 2),
(15, 20, 15, 1),
(16, 20, 16, 2),
(17, 21, 17, 2),
(18, 24, 18, 1),
(19, 24, 19, 2),
(20, 25, 20, 2),
(21, 28, 21, 1),
(22, 28, 22, 2),
(23, 29, 23, 2),
(24, 32, 24, 1),
(25, 32, 25, 2),
(26, 33, 26, 2),
(27, 36, 27, 1),
(28, 36, 28, 2),
(29, 37, 29, 2),
(30, 40, 30, 1),
(31, 40, 31, 2),
(32, 41, 32, 2),
(33, 44, 33, 1),
(34, 44, 34, 2),
(35, 45, 35, 2),
(36, 48, 36, 1),
(37, 48, 37, 2),
(38, 49, 38, 2),
(39, 52, 39, 1),
(40, 52, 40, 2),
(41, 53, 41, 2),
(42, 54, 42, 1),
(43, 54, 43, 2),
(44, 55, 44, 2),
(45, 58, 45, 1),
(46, 58, 46, 2),
(47, 59, 47, 2),
(48, 62, 48, 1),
(49, 62, 49, 2),
(50, 63, 50, 2),
(51, 66, 51, 1),
(52, 66, 52, 2),
(53, 67, 53, 2),
(54, 70, 54, 1),
(55, 70, 55, 2),
(56, 71, 56, 2),
(57, 74, 57, 2),
(58, 77, 58, 1),
(59, 77, 59, 2),
(60, 78, 60, 2),
(61, 81, 61, 1),
(62, 81, 62, 2),
(63, 82, 63, 2),
(64, 85, 64, 1),
(65, 85, 65, 2),
(66, 86, 66, 2),
(67, 89, 67, 1),
(68, 89, 68, 2),
(69, 90, 69, 2),
(70, 93, 70, 1),
(71, 93, 71, 2),
(72, 94, 72, 2);

-- --------------------------------------------------------

--
-- Table structure for table `address_types`
--

CREATE TABLE `address_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address_types`
--

INSERT INTO `address_types` (`id`, `type`) VALUES
(1, 'Correspondence Address'),
(2, 'Permanent Address');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_guardian_lists`
--

CREATE TABLE `applicant_guardian_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicant_profile_id` bigint(20) UNSIGNED NOT NULL,
  `guardian_detail_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_guardian_lists`
--

INSERT INTO `applicant_guardian_lists` (`id`, `applicant_profile_id`, `guardian_detail_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 6, 5),
(6, 7, 6),
(7, 8, 7),
(8, 9, 8),
(9, 10, 9),
(10, 11, 10),
(11, 12, 11),
(12, 13, 12),
(13, 14, 13),
(14, 15, 14),
(15, 16, 15),
(16, 17, 16),
(17, 18, 17),
(18, 19, 18),
(19, 5, 19),
(20, 20, 20),
(21, 21, 21),
(22, 22, 22),
(23, 23, 23),
(24, 24, 24);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profiles`
--

CREATE TABLE `applicant_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `birth_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `marital_id` bigint(20) UNSIGNED NOT NULL,
  `race_id` bigint(20) UNSIGNED NOT NULL,
  `nationality_id` bigint(20) UNSIGNED NOT NULL,
  `religion_id` bigint(20) UNSIGNED NOT NULL,
  `user_detail_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_profiles`
--

INSERT INTO `applicant_profiles` (`id`, `birth_date`, `place_of_birth`, `gender_id`, `marital_id`, `race_id`, `nationality_id`, `religion_id`, `user_detail_id`) VALUES
(1, '2023-12-31', 'Johor', 2, 1, 1, 161, 1, 1),
(2, '2022-12-09', 'Johor', 1, 1, 1, 131, 1, 5),
(3, '2002-11-19', 'Johor', 1, 1, 1, 131, 3, 9),
(4, '2000-10-11', 'Johor', 1, 1, 1, 131, 3, 13),
(5, '2000-12-10', 'Perak', 1, 2, 1, 161, 1, 17),
(6, '2004-12-12', 'Johor', 1, 1, 1, 131, 3, 20),
(7, '2022-12-12', 'Johor', 2, 1, 2, 161, 1, 24),
(8, '2007-11-12', 'Johor', 1, 1, 1, 131, 3, 28),
(9, '2003-12-12', 'Johor', 1, 1, 1, 131, 3, 32),
(10, '2003-02-12', 'Johor', 1, 1, 1, 131, 3, 36),
(11, '2002-12-13', 'Johor', 1, 1, 1, 131, 1, 40),
(12, '2002-11-19', 'Johor', 1, 1, 1, 131, 3, 44),
(13, '2000-11-19', 'Johor', 1, 1, 1, 161, 3, 48),
(14, '1990-12-11', 'Johor', 1, 1, 2, 161, 1, 52),
(15, '2004-12-31', 'Johor', 1, 1, 1, 131, 3, 54),
(16, '1997-07-26', 'Johor', 1, 1, 1, 131, 3, 58),
(17, '2000-12-16', 'Johor', 1, 1, 1, 131, 3, 62),
(18, '2002-12-31', 'Johor', 1, 1, 1, 131, 3, 66),
(19, '1990-11-19', 'Johor', 1, 1, 1, 131, 3, 70),
(20, '2002-11-19', 'Johor', 1, 1, 1, 131, 3, 77),
(21, '2000-02-25', 'Johor', 1, 1, 1, 131, 3, 81),
(22, '2022-11-17', 'Johor', 2, 1, 2, 161, 2, 85),
(23, '2002-11-19', 'Johor', 1, 1, 1, 131, 2, 89),
(24, '1999-08-31', 'Johor', 1, 1, 1, 131, 3, 93);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profile_pictures`
--

CREATE TABLE `applicant_profile_pictures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicant_profile_id` bigint(20) UNSIGNED NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_profile_pictures`
--

INSERT INTO `applicant_profile_pictures` (`id`, `applicant_profile_id`, `path`) VALUES
(1, 1, 'profile_picture_aohfdos9af_2023011813484820220607141703.jpg'),
(2, 2, 'profile_picture_sdfasdfsf_20230110153434sausage.jpg'),
(3, 3, 'profile_picture_User Test 1_20230111102727man.jpg'),
(4, 4, 'profile_picture_abc_20230111113838man.jpg'),
(5, 2, 'profile_picture_sdfasdfsf_20230111141212sausage.jpg'),
(6, 6, 'profile_picture_12345678_20230113100505sausage.jpg'),
(7, 7, 'profile_picture_usertest2_20230113112323sausage.jpg'),
(8, 8, 'profile_picture_usertest3_20230113113030sausage.jpg'),
(9, 9, 'profile_picture_usertest4_20230113143232sausage.jpg'),
(10, 10, 'profile_picture_usertest5_20230113145353sausage.jpg'),
(11, 11, 'profile_picture_usertest6_20230114134747sausage.jpg'),
(12, 12, 'profile_picture_rubish_20230116080101flow.png'),
(13, 13, 'profile_picture_testpattern_20230116094545man.jpg'),
(14, 15, 'profile_picture_test10_20230116150303download.jfif'),
(15, 16, 'profile_picture_stf9832_20230117102020001.jpg'),
(16, 17, 'profile_picture_test11_20230117122222sausage.jpg'),
(17, 18, 'profile_picture_jack_20230117150808R.jfif'),
(18, 19, 'profile_picture_Usertest_2023011808060620220607141703.jpg'),
(19, 5, 'profile_picture_Superadmin_2023011808494920220607141703.jpg'),
(20, 20, 'profile_picture_TestSelectTwoUser_2023011814393920220607141703.jpg'),
(21, 21, 'profile_picture_test200_20230118150707会场1QR code.png'),
(22, 22, 'profile_picture_test199_20230118170707sausage.jpg'),
(23, 23, 'profile_picture_123_20230119105353man.jpg'),
(24, 24, 'profile_picture_Gan Yu Xun_20230119151515sausage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `application_records`
--

CREATE TABLE `application_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `applicant_profile_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_records`
--

INSERT INTO `application_records` (`id`, `user_id`, `applicant_profile_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, NULL),
(2, 6, 2, NULL, NULL),
(3, 7, 3, NULL, NULL),
(4, 8, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 9, 6, NULL, NULL),
(7, 10, 7, NULL, NULL),
(8, 11, 8, NULL, NULL),
(9, 12, 9, NULL, NULL),
(10, 14, 10, NULL, NULL),
(11, 15, 11, NULL, NULL),
(12, 16, 12, NULL, NULL),
(13, 17, 13, NULL, NULL),
(14, 18, 14, NULL, NULL),
(15, 19, 15, NULL, NULL),
(16, 21, 16, NULL, NULL),
(17, 24, 17, NULL, NULL),
(18, 25, 18, NULL, NULL),
(19, 26, 19, NULL, NULL),
(20, 3, 1, NULL, NULL),
(21, 3, 1, NULL, NULL),
(22, 3, 1, NULL, NULL),
(23, 3, 1, NULL, NULL),
(24, 27, 20, NULL, NULL),
(25, 28, 21, NULL, NULL),
(26, 29, 22, NULL, NULL),
(27, 30, 23, NULL, NULL),
(28, 33, 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `application_statuses`
--

CREATE TABLE `application_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_statuses`
--

INSERT INTO `application_statuses` (`id`, `status`) VALUES
(1, 'Complete personal particulars'),
(2, 'Complete parent / guardian particulars'),
(3, 'Complete emergency contact'),
(4, 'Complete profile picture'),
(5, 'Complete program selection'),
(6, 'Complete academic record'),
(7, 'Complete status of health'),
(8, 'Complete agreement'),
(9, 'Complete draft'),
(10, 'Complete supporting document'),
(11, 'Complete payment');

-- --------------------------------------------------------

--
-- Table structure for table `application_status_logs`
--

CREATE TABLE `application_status_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `application_record_id` bigint(20) UNSIGNED NOT NULL,
  `application_status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_status_logs`
--

INSERT INTO `application_status_logs` (`id`, `user_id`, `application_record_id`, `application_status_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 11, '2023-01-09 06:47:53', '2023-01-13 08:32:10'),
(2, 6, 2, 8, '2023-01-10 07:33:16', '2023-01-12 01:44:08'),
(3, 7, 3, 8, '2023-01-11 02:21:10', '2023-01-11 02:31:18'),
(4, 8, 4, 11, '2023-01-11 03:35:23', '2023-01-11 04:32:07'),
(5, 1, 5, 11, '2023-01-11 03:41:51', '2023-01-19 00:09:24'),
(6, 9, 6, 11, '2023-01-13 02:03:51', '2023-01-13 03:20:44'),
(7, 10, 7, 11, '2023-01-13 03:22:51', '2023-01-13 03:27:23'),
(8, 11, 8, 11, '2023-01-13 03:29:22', '2023-01-13 03:45:17'),
(9, 12, 9, 8, '2023-01-13 06:31:31', '2023-01-13 06:50:04'),
(10, 14, 10, 11, '2023-01-13 06:53:00', '2023-01-14 04:47:34'),
(11, 15, 11, 8, '2023-01-14 05:46:51', '2023-01-17 00:55:09'),
(12, 16, 12, 4, '2023-01-16 00:00:10', '2023-01-16 00:01:19'),
(13, 17, 13, 5, '2023-01-16 01:43:03', '2023-01-16 01:45:12'),
(14, 18, 14, 7, '2023-01-16 02:09:37', '2023-01-16 02:14:18'),
(15, 19, 15, 11, '2023-01-16 07:00:57', '2023-01-16 08:04:34'),
(16, 21, 16, 4, '2023-01-17 02:16:10', '2023-01-17 02:20:35'),
(17, 24, 17, 9, '2023-01-17 04:21:42', '2023-01-17 06:11:09'),
(18, 25, 18, 8, '2023-01-17 07:05:16', '2023-01-18 08:27:09'),
(19, 26, 19, 5, '2023-01-18 00:04:24', '2023-01-18 00:06:02'),
(21, 3, 22, 4, '2023-01-18 06:23:59', '2023-01-18 06:23:59'),
(22, 3, 23, 4, '2023-01-18 06:34:26', '2023-01-18 06:34:26'),
(23, 27, 24, 11, '2023-01-18 06:38:10', '2023-01-18 06:47:05'),
(24, 28, 25, 11, '2023-01-18 07:04:27', '2023-01-18 07:12:18'),
(25, 29, 26, 11, '2023-01-18 09:07:08', '2023-01-18 10:01:17'),
(26, 30, 27, 11, '2023-01-19 02:52:44', '2023-01-19 03:00:38'),
(27, 33, 28, 11, '2023-01-19 07:14:34', '2023-01-19 07:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `choice_priorities`
--

CREATE TABLE `choice_priorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `choices` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `choice_priorities`
--

INSERT INTO `choice_priorities` (`id`, `choices`) VALUES
(1, '1'),
(2, '2'),
(3, '3');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `country_code`, `status`) VALUES
(1, 'Afghanistan', '200400000', 1),
(2, 'Aland Islands', '324800000', 1),
(3, 'Albania', '300800000', 1),
(4, 'Algeria', '101200000', 1),
(5, 'American Samoa', '501600000', 1),
(6, 'Andorra', '302000000', 1),
(7, 'Angola', '102400000', 1),
(8, 'Anguilla', '466000000', 1),
(9, 'Antarctica', '701000000', 1),
(10, 'Antigua And Barbuda', '402800000', 1),
(11, 'Argentina', '603200000', 1),
(12, 'Armenia', '205100000', 1),
(13, 'Aruba', '453300000', 1),
(14, 'Australia', '503600000', 1),
(15, 'Austria', '304000000', 1),
(16, 'Azerbaijan', '203100000', 1),
(17, 'Bahamas', '404400000', 1),
(18, 'Bahrain', '204800000', 1),
(19, 'Bangladesh', '205000000', 1),
(20, 'Barbados', '405200000', 1),
(21, 'Belarus', '311200000', 1),
(22, 'Belgium', '305600000', 1),
(23, 'Belize', '408400000', 1),
(24, 'Benin', '120400000', 1),
(25, 'Bermuda', '406000000', 1),
(26, 'Bhutan', '206400000', 1),
(27, 'Bolivia', '606800000', 1),
(28, 'Bosnia And Herzegovina', '307000000', 1),
(29, 'Botswana', '107200000', 1),
(30, 'Bouvet Island', '707400000', 1),
(31, 'Brazil', '607600000', 1),
(32, 'British Indian Ocean Territory', '208600000', 1),
(33, 'British Virgin Islands', '409200000', 1),
(34, 'Brunei', '209600000', 1),
(35, 'Bulgaria', '310000000', 1),
(36, 'Burkina Faso', '185400000', 1),
(37, 'Burundi', '110800000', 1),
(38, 'Cambodia', '211600000', 1),
(39, 'Cameroon', '112000000', 1),
(40, 'Canada', '412400000', 1),
(41, 'Cape Verde', '113200000', 1),
(42, 'Cayman Islands', '413600000', 1),
(43, 'Central African Republic', '114000000', 1),
(44, 'Chad', '114800000', 1),
(45, 'Chile', '615200000', 1),
(46, 'China', '215600000', 1),
(47, 'Christmas Island', '216200000', 1),
(48, 'Cocos Islands', '216600000', 1),
(49, 'Colombia', '617000000', 1),
(50, 'Comoros', '117400000', 1),
(51, 'Cook Islands', '518400000', 1),
(52, 'Costa Rica', '418800000', 1),
(53, 'Croatia', '319100000', 1),
(54, 'Cuba', '419200000', 1),
(55, 'Cyprus', '319600000', 1),
(56, 'Czech Republic', '320300000', 1),
(57, 'Democratic Republic Of The Congo', '118000000', 1),
(58, 'Denmark', '320800000', 1),
(59, 'Djibouti', '126200000', 1),
(60, 'Dominica', '421200000', 1),
(61, 'Dominican Republic', '421400000', 1),
(62, 'East Timor', '562600000', 1),
(63, 'Ecuador', '621800000', 1),
(64, 'Egypt', '181800000', 1),
(65, 'El Salvador', '422200000', 1),
(66, 'Equatorial Guinea', '122600000', 1),
(67, 'Eritrea', '123200000', 1),
(68, 'Estonia', '323300000', 1),
(69, 'Ethiopia', '123100000', 1),
(70, 'Falkland Islands', '623800000', 1),
(71, 'Faroe Islands', '323400000', 1),
(72, 'Fiji', '524200000', 1),
(73, 'Finland', '324600000', 1),
(74, 'France', '325000000', 1),
(75, 'French Guiana', '625400000', 1),
(76, 'French Polynesia', '525800000', 1),
(77, 'French Southern Territories', '726000000', 1),
(78, 'Gabon', '126600000', 1),
(79, 'Gambia', '127000000', 1),
(80, 'Georgia', '226800000', 1),
(81, 'Germany', '327600000', 1),
(82, 'Ghana', '128800000', 1),
(83, 'Gibraltar', '329200000', 1),
(84, 'Greece', '330000000', 1),
(85, 'Greenland', '430400000', 1),
(86, 'Grenada', '430800000', 1),
(87, 'Guadeloupe', '431200000', 1),
(88, 'Guam', '531600000', 1),
(89, 'Guatemala', '432000000', 1),
(90, 'Guernsey', '383100000', 1),
(91, 'Guinea', '132400000', 1),
(92, 'Guinea-Bissau', '162400000', 1),
(93, 'Guyana', '632800000', 1),
(94, 'Haiti', '433200000', 1),
(95, 'Heard Island And Mcdonald Islands', '733400000', 1),
(96, 'Honduras', '434000000', 1),
(97, 'Hong Kong', '234400000', 1),
(98, 'Hungary', '334800000', 1),
(99, 'Iceland', '335200000', 1),
(100, 'India', '235600000', 1),
(101, 'Indonesia', '236000000', 1),
(102, 'Iran', '236400000', 1),
(103, 'Iraq', '236800000', 1),
(104, 'Ireland', '337200000', 1),
(105, 'Isle Of Man', '383300000', 1),
(106, 'Israel', '237600000', 1),
(107, 'Italy', '338000000', 1),
(108, 'Ivory Coast', '138400000', 1),
(109, 'Jamaica', '438800000', 1),
(110, 'Japan', '239200000', 1),
(111, 'Jersey', '383200000', 1),
(112, 'Jordan', '240000000', 1),
(113, 'Kazakhstan', '239800000', 1),
(114, 'Kenya', '140400000', 1),
(115, 'Kiribati', '529600000', 1),
(116, 'Kuwait', '241400000', 1),
(117, 'Kyrgyzstan', '241700000', 1),
(118, 'Laos', '241800000', 1),
(119, 'Latvia', '342800000', 1),
(120, 'Lebanon', '242200000', 1),
(121, 'Lesotho', '142600000', 1),
(122, 'Liberia', '143000000', 1),
(123, 'Libya', '143400000', 1),
(124, 'Liechtenstein', '343800000', 1),
(125, 'Lithuania', '344000000', 1),
(126, 'Luxembourg', '344200000', 1),
(127, 'Macao', '244600000', 1),
(128, 'Macedonia', '380700000', 1),
(129, 'Madagascar', '145000000', 1),
(130, 'Malawi', '145400000', 1),
(131, 'Malaysia', '245800000', 1),
(132, 'Maldives', '246200000', 1),
(133, 'Mali', '146600000', 1),
(134, 'Malta', '347000000', 1),
(135, 'Marshall Islands', '558400000', 1),
(136, 'Martinique', '447400000', 1),
(137, 'Mauritania', '147800000', 1),
(138, 'Mauritius', '148000000', 1),
(139, 'Mayotte', '117500000', 1),
(140, 'Mexico', '448400000', 1),
(141, 'Micronesia', '558300000', 1),
(142, 'Moldova', '349800000', 1),
(143, 'Monaco', '349200000', 1),
(144, 'Mongolia', '249600000', 1),
(145, 'Montenegro', '349900000', 1),
(146, 'Montserrat', '450000000', 1),
(147, 'Morocco', '150400000', 1),
(148, 'Mozambique', '150800000', 1),
(149, 'Myanmar', '210400000', 1),
(150, 'Namibia', '151600000', 1),
(151, 'Nauru', '552000000', 1),
(152, 'Nepal', '252400000', 1),
(153, 'Netherlands', '352800000', 1),
(154, 'Netherlands Antilles', '453000000', 1),
(155, 'New Caledonia', '554000000', 1),
(156, 'New Zealand', '555400000', 1),
(157, 'Nicaragua', '455800000', 1),
(158, 'Niger', '156200000', 1),
(159, 'Nigeria', '156600000', 1),
(160, 'Niue', '557000000', 1),
(161, 'Norfolk Island', '557400000', 1),
(162, 'North Korea', '240800000', 1),
(163, 'Northern Mariana Islands', '558000000', 1),
(164, 'Norway', '357800000', 1),
(165, 'Oman', '251200000', 1),
(166, 'Pakistan', '258600000', 1),
(167, 'Palau', '558500000', 1),
(168, 'Palestinian Territory', '227500000', 1),
(169, 'Panama', '459100000', 1),
(170, 'Papua New Guinea', '559800000', 1),
(171, 'Paraguay', '660000000', 1),
(172, 'Peru', '660400000', 1),
(173, 'Philippines', '260800000', 1),
(174, 'Pitcairn', '561200000', 1),
(175, 'Poland', '361600000', 1),
(176, 'Portugal', '362000000', 1),
(177, 'Puerto Rico', '463000000', 1),
(178, 'Qatar', '263400000', 1),
(179, 'Republic Of The Congo', '117800000', 1),
(180, 'Reunion', '163800000', 1),
(181, 'Romania', '364200000', 1),
(182, 'Russia', '364300000', 1),
(183, 'Rwanda', '164600000', 1),
(184, 'Saint Barthã©Lemy', '465200000', 1),
(185, 'Saint Helena', '165400000', 1),
(186, 'Saint Kitts And Nevis', '465900000', 1),
(187, 'Saint Lucia', '466200000', 1),
(188, 'Saint Martin', '466300000', 1),
(189, 'Saint Pierre And Miquelon', '466600000', 1),
(190, 'Saint Vincent And The Grenadines', '467000000', 1),
(191, 'Samoa', '588200000', 1),
(192, 'San Marino', '367400000', 1),
(193, 'Sao Tome And Principe', '167800000', 1),
(194, 'Saudi Arabia', '268200000', 1),
(195, 'Senegal', '168600000', 1),
(196, 'Serbia', '368800000', 1),
(197, 'Serbia And Montenegro', '389100000', 1),
(198, 'Seychelles', '169000000', 1),
(199, 'Sierra Leone', '169400000', 1),
(200, 'Singapore', '270200000', 1),
(201, 'Slovakia', '370300000', 1),
(202, 'Slovenia', '370500000', 1),
(203, 'Solomon Islands', '509000000', 1),
(204, 'Somalia', '170600000', 1),
(205, 'South Africa', '171000000', 1),
(206, 'South Georgia And The South Sandwich Islands', '723900000', 1),
(207, 'South Korea', '241000000', 1),
(208, 'Spain', '372400000', 1),
(209, 'Sri Lanka', '214400000', 1),
(210, 'Sudan', '173600000', 1),
(211, 'Suriname', '674000000', 1),
(212, 'Svalbard And Jan Mayen', '374400000', 1),
(213, 'Swaziland', '174800000', 1),
(214, 'Sweden', '375200000', 1),
(215, 'Switzerland', '375600000', 1),
(216, 'Syria', '276000000', 1),
(217, 'Taiwan', '215800000', 1),
(218, 'Tajikistan', '276200000', 1),
(219, 'Tanzania', '183400000', 1),
(220, 'Tatarstan', '364373000', 1),
(221, 'Thailand', '276400000', 1),
(222, 'Togo', '176800000', 1),
(223, 'Tokelau', '577200000', 1),
(224, 'Tonga', '577600000', 1),
(225, 'Trinidad And Tobago', '478000000', 1),
(226, 'Tunisia', '178800000', 1),
(227, 'Turkey', '279200000', 1),
(228, 'Turkmenistan', '279500000', 1),
(229, 'Turks And Caicos Islands', '479600000', 1),
(230, 'Tuvalu', '579800000', 1),
(231, 'U.S. Virgin Islands', '485000000', 1),
(232, 'Uganda', '180000000', 1),
(233, 'Ukraine', '380400000', 1),
(234, 'United Arab Emirates', '278400000', 1),
(235, 'United Kingdom', '382600000', 1),
(236, 'United States', '484000000', 1),
(237, 'United States Minor Outlying Islands', '558100000', 1),
(238, 'Uruguay', '685800000', 1),
(239, 'Uzbekistan', '286000000', 1),
(240, 'Vanuatu', '554800000', 1),
(241, 'Vatican', '333600000', 1),
(242, 'Venezuela', '686200000', 1),
(243, 'Vietnam', '270400000', 1),
(244, 'Wallis And Futuna', '587600000', 1),
(245, 'Western Sahara', '173200000', 1),
(246, 'Yemen', '288700000', 1),
(247, 'Zambia', '189400000', 1),
(248, 'Zimbabwe', '171600000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `name`, `status`) VALUES
(1, 'OKU', 1),
(2, 'Color Blindness', 1),
(3, 'Congenital or Inherited Disorder', 1),
(4, 'Allergy', 1),
(5, 'Mental Health disorders', 1),
(6, 'Fits, stroke, other neurological disease', 1),
(7, 'Cardiovascular or heart disease', 1),
(8, 'Asthma', 1),
(9, 'Tuberculosis', 1),
(10, 'Drug Addition', 1),
(11, 'AIDS or HIV', 1),
(12, 'Hepatitis B', 1),
(13, 'Hepatitis C', 1),
(14, 'Sexually Transmitted Diseases', 1),
(15, 'Cancer', 1),
(16, 'Psychiatric Illness', 1),
(17, 'Other Illness', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contacts`
--

CREATE TABLE `emergency_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guardian_relationship_id` bigint(20) UNSIGNED NOT NULL,
  `user_detail_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emergency_contacts`
--

INSERT INTO `emergency_contacts` (`id`, `guardian_relationship_id`, `user_detail_id`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 2, 7),
(4, 1, 8),
(5, 1, 11),
(6, 2, 12),
(7, 1, 15),
(8, 2, 16),
(9, 1, 18),
(10, 1, 19),
(11, 1, 22),
(12, 2, 23),
(13, 1, 26),
(14, 2, 27),
(15, 2, 30),
(16, 2, 31),
(17, 1, 34),
(18, 2, 35),
(19, 2, 38),
(20, 1, 39),
(21, 2, 42),
(22, 1, 43),
(23, 1, 46),
(24, 1, 47),
(25, 1, 50),
(26, 1, 51),
(27, 2, 56),
(28, 1, 57),
(29, 1, 60),
(30, 7, 61),
(31, 1, 64),
(32, 2, 65),
(33, 2, 68),
(34, 1, 69),
(35, 1, 72),
(36, 2, 73),
(37, 1, 75),
(38, 1, 76),
(39, 1, 79),
(40, 1, 80),
(41, 6, 83),
(42, 9, 84),
(43, 2, 87),
(44, 1, 88),
(45, 1, 91),
(46, 1, 92),
(47, 1, 95),
(48, 2, 96);

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contact_lists`
--

CREATE TABLE `emergency_contact_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicant_profile_id` bigint(20) UNSIGNED NOT NULL,
  `emergency_contact_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emergency_contact_lists`
--

INSERT INTO `emergency_contact_lists` (`id`, `applicant_profile_id`, `emergency_contact_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4),
(5, 3, 5),
(6, 3, 6),
(7, 4, 7),
(8, 4, 8),
(9, 2, 9),
(10, 2, 10),
(11, 6, 11),
(12, 6, 12),
(13, 7, 13),
(14, 7, 14),
(15, 8, 15),
(16, 8, 16),
(17, 9, 17),
(18, 9, 18),
(19, 10, 19),
(20, 10, 20),
(21, 11, 21),
(22, 11, 22),
(23, 12, 23),
(24, 12, 24),
(25, 13, 25),
(26, 13, 26),
(27, 15, 27),
(28, 15, 28),
(29, 16, 29),
(30, 16, 30),
(31, 17, 31),
(32, 17, 32),
(33, 18, 33),
(34, 18, 34),
(35, 19, 35),
(36, 19, 36),
(37, 5, 37),
(38, 5, 38),
(39, 20, 39),
(40, 20, 40),
(41, 21, 41),
(42, 21, 42),
(43, 22, 43),
(44, 22, 44),
(45, 23, 45),
(46, 23, 46),
(47, 24, 47),
(48, 24, 48);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `gender_code`, `status`) VALUES
(1, 'Male', '1', 1),
(2, 'Female', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guardian_details`
--

CREATE TABLE `guardian_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_id` bigint(20) UNSIGNED NOT NULL,
  `guardian_relationship_id` bigint(20) UNSIGNED NOT NULL,
  `nationality_id` bigint(20) UNSIGNED NOT NULL,
  `user_detail_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guardian_details`
--

INSERT INTO `guardian_details` (`id`, `occupation`, `income_id`, `guardian_relationship_id`, `nationality_id`, `user_detail_id`) VALUES
(1, 'Driver', 1, 1, 1, 2),
(2, 'Dish wah', 1, 1, 1, 6),
(3, 'Housewife', 8, 1, 131, 10),
(4, 'Housewife', 7, 1, 131, 14),
(5, 'Driver', 5, 1, 131, 21),
(6, 'Dish wah', 1, 2, 1, 25),
(7, 'Dish wah', 2, 2, 2, 29),
(8, 'Driver', 4, 1, 131, 33),
(9, 'Driver', 4, 1, 131, 37),
(10, 'Driver', 4, 1, 131, 41),
(11, 'Housewife', 7, 1, 131, 45),
(12, 'Housewife', 10, 1, 131, 49),
(13, 'abc', 1, 2, 1, 53),
(14, 'Dish washer', 5, 1, 131, 55),
(15, 'none', 1, 1, 131, 59),
(16, 'Driver', 4, 1, 131, 63),
(17, 'Driver', 5, 1, 131, 67),
(18, 'Housewife', 6, 1, 222, 71),
(19, 'abc', 1, 1, 1, 74),
(20, 'Housewife', 7, 1, 127, 78),
(21, 'House wife', 5, 1, 131, 82),
(22, 'Driver', 2, 2, 2, 86),
(23, 'abc', 1, 1, 1, 90),
(24, '234', 3, 1, 131, 94);

-- --------------------------------------------------------

--
-- Table structure for table `guardian_relationships`
--

CREATE TABLE `guardian_relationships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guardian_relationships`
--

INSERT INTO `guardian_relationships` (`id`, `name`, `relationship_code`, `status`) VALUES
(1, 'Mother', '100', 1),
(2, 'Father', '110', 1),
(3, 'Biological child', '200', 1),
(4, 'Nephew', '210', 1),
(5, 'Adopted child', '220', 1),
(6, 'Siblings', '230', 1),
(7, 'Grandson', '300', 1),
(8, 'Grandfather / Grandmother', '400', 1),
(9, 'Uncle / Aunt', '500', 1),
(10, 'Husband', '600', 1),
(11, 'Wife', '610', 1),
(12, 'Guardian', '700', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ic_mappings`
--

CREATE TABLE `ic_mappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supporting_documents_id` bigint(20) UNSIGNED NOT NULL,
  `user_details_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ic_mappings`
--

INSERT INTO `ic_mappings` (`id`, `supporting_documents_id`, `user_details_id`) VALUES
(1, 22, 20),
(2, 23, 20),
(3, 24, 20),
(4, 25, 20),
(5, 26, 20),
(6, 27, 20),
(7, 28, 24),
(8, 29, 28),
(9, 30, 28),
(10, 31, 32),
(11, 32, 36),
(12, 33, 54),
(13, 34, 66),
(14, 35, 81),
(15, 36, 85),
(16, 37, 85),
(17, 38, 17),
(18, 39, 89),
(19, 40, 93);

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `range` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `range`, `income_code`, `status`) VALUES
(1, 'Less than or equal RM1,000', '0', 1),
(2, 'RM1,001 - RM2,000', '1', 1),
(3, 'RM2,001 - RM3,000', '2', 1),
(4, 'RM3,001 - RM4,000', '3', 1),
(5, 'RM4,001 - RM5,000', '4', 1),
(6, 'RM5,001 - RM6,000', '5', 1),
(7, 'RM6,001 - RM7,000', '6', 1),
(8, 'RM7,001 - RM8,000', '7', 1),
(9, 'RM8,001 - RM9,000', '8', 1),
(10, 'More than or equal RM9,000', '9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `maritals`
--

CREATE TABLE `maritals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maritals`
--

INSERT INTO `maritals` (`id`, `name`, `marital_code`, `status`) VALUES
(1, 'Single', '1', 1),
(2, 'Married', '2', 1),
(3, 'Widow', '3', 1),
(4, 'Divorce', '4', 1),
(5, 'Marital seperation', '5', 1);

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_12_18_111400_create_roles_table', 1),
(5, '2022_12_19_064952_create_acc_statuses_table', 1),
(6, '2022_12_19_064953_create_users_table', 1),
(7, '2022_12_19_113607_create_incomes_table', 1),
(8, '2022_12_19_125144_create_genders_table', 1),
(9, '2022_12_19_130804_create_maritals_table', 1),
(10, '2022_12_19_133427_create_nationalities_table', 1),
(11, '2022_12_19_135524_create_religions_table', 1),
(12, '2022_12_19_141056_create_guardian_relationships_table', 1),
(13, '2022_12_19_142851_create_races_table', 1),
(14, '2022_12_19_142852_create_school_levels_table', 1),
(15, '2022_12_19_142853_create_user_details_table', 1),
(16, '2022_12_19_142854_create_diseases_table', 1),
(17, '2022_12_19_142855_create_countries_table', 1),
(18, '2022_12_20_074652_create_applicant_profiles_table', 1),
(19, '2022_12_20_075119_create_application_records_table', 1),
(20, '2022_12_20_075334_create_applicant_profile_pictures_table', 1),
(21, '2022_12_20_075550_create_guardian_details_table', 1),
(22, '2022_12_20_075839_create_applicant_guardian_lists_table', 1),
(23, '2022_12_20_082058_create_emergency_contacts_table', 1),
(24, '2022_12_20_082238_create_emergency_contact_lists_table', 1),
(25, '2022_12_20_082427_create_application_statuses_table', 1),
(26, '2022_12_20_082545_create_application_status_logs_table', 1),
(27, '2022_12_21_003299_create_payments_table', 1),
(28, '2022_12_21_010641_create_academic_records_table', 1),
(29, '2022_12_21_010952_create_status_of_healths_table', 1),
(30, '2022_12_22_105839_create_address_types_table', 1),
(31, '2022_12_22_105840_create_addresses_table', 1),
(32, '2022_12_22_105841_create_address_mappings_table', 1),
(33, '2023_01_12_143710_create_programme_levels_table', 1),
(34, '2023_01_12_143725_create_programme_types_table', 1),
(35, '2023_01_12_143741_create_programmes_table', 1),
(36, '2023_01_12_143755_create_semesters_table', 1),
(37, '2023_01_12_143821_create_semester_year_mappings_table', 1),
(38, '2023_01_12_143845_create_programme_records_table', 1),
(39, '2023_01_12_143906_create_choice_priorities_table', 1),
(40, '2023_01_12_143938_create_programme_picked_table', 1),
(41, '2023_01_12_143956_create_supporting_documents_table', 1),
(42, '2023_01_12_144019_create_school_transcripts_table', 1),
(43, '2023_01_12_144036_create_academic_transcripts_table', 1),
(44, '2023_01_12_144143_create_ic_mappings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `nationality_code`, `status`) VALUES
(1, 'Afghanistan', '410', 1),
(2, 'Aland Islands', '24810', 1),
(3, 'Albania', '810', 1),
(4, 'Algeria', '1210', 1),
(5, 'American Samoa', '1610', 1),
(6, 'Andorra', '2010', 1),
(7, 'Angola', '2410', 1),
(8, 'Anguilla', '66010', 1),
(9, 'Antarctica', '1010', 1),
(10, 'Antigua And Barbuda', '2810', 1),
(11, 'Argentina', '3210', 1),
(12, 'Armenia', '5110', 1),
(13, 'Aruba', '53310', 1),
(14, 'Australia', '3610', 1),
(15, 'Austria', '4010', 1),
(16, 'Azerbaijan', '3110', 1),
(17, 'Bahamas', '4410', 1),
(18, 'Bahrain', '4810', 1),
(19, 'Bangladesh', '5010', 1),
(20, 'Barbados', '5210', 1),
(21, 'Belarus', '11210', 1),
(22, 'Belgium', '5610', 1),
(23, 'Belize', '8410', 1),
(24, 'Benin', '20410', 1),
(25, 'Bermuda', '6010', 1),
(26, 'Bhutan', '6410', 1),
(27, 'Bolivia', '6810', 1),
(28, 'Bosnia And Herzegovina', '7010', 1),
(29, 'Botswana', '7210', 1),
(30, 'Bouvet Island', '7410', 1),
(31, 'Brazil', '7610', 1),
(32, 'British Indian Ocean Territory', '8610', 1),
(33, 'British Virgin Islands', '9210', 1),
(34, 'Brunei', '9610', 1),
(35, 'Bulgaria', '10010', 1),
(36, 'Burkina Faso', '85410', 1),
(37, 'Burundi', '10810', 1),
(38, 'Cambodia', '11610', 1),
(39, 'Cameroon', '12010', 1),
(40, 'Canada', '12410', 1),
(41, 'Cape Verde', '13210', 1),
(42, 'Cayman Islands', '13610', 1),
(43, 'Central African Republic', '14010', 1),
(44, 'Chad', '14810', 1),
(45, 'Chile', '15210', 1),
(46, 'China', '15610', 1),
(47, 'Christmas Island', '16210', 1),
(48, 'Cocos Islands', '16610', 1),
(49, 'Colombia', '17010', 1),
(50, 'Comoros', '17410', 1),
(51, 'Cook Islands', '18410', 1),
(52, 'Costa Rica', '18810', 1),
(53, 'Croatia', '19110', 1),
(54, 'Cuba', '19210', 1),
(55, 'Cyprus', '19610', 1),
(56, 'Czech Republic', '20310', 1),
(57, 'Democratic Republic Of The Congo', '18010', 1),
(58, 'Denmark', '20810', 1),
(59, 'Djibouti', '26210', 1),
(60, 'Dominica', '21210', 1),
(61, 'Dominican Republic', '21410', 1),
(62, 'East Timor', '62610', 1),
(63, 'Ecuador', '21810', 1),
(64, 'Egypt', '81810', 1),
(65, 'El Salvador', '22210', 1),
(66, 'Equatorial Guinea', '22610', 1),
(67, 'Eritrea', '23210', 1),
(68, 'Estonia', '23310', 1),
(69, 'Ethiopia', '23110', 1),
(70, 'Falkland Islands', '23810', 1),
(71, 'Faroe Islands', '23410', 1),
(72, 'Fiji', '24210', 1),
(73, 'Finland', '24610', 1),
(74, 'France', '25010', 1),
(75, 'French Guiana', '25410', 1),
(76, 'French Polynesia', '25810', 1),
(77, 'French Southern Territories', '26010', 1),
(78, 'Gabon', '26610', 1),
(79, 'Gambia', '27010', 1),
(80, 'Georgia', '26810', 1),
(81, 'Germany', '27610', 1),
(82, 'Ghana', '28810', 1),
(83, 'Gibraltar', '29210', 1),
(84, 'Greece', '30010', 1),
(85, 'Greenland', '30410', 1),
(86, 'Grenada', '30810', 1),
(87, 'Guadeloupe', '31210', 1),
(88, 'Guam', '31610', 1),
(89, 'Guatemala', '32010', 1),
(90, 'Guernsey', '83110', 1),
(91, 'Guinea', '32410', 1),
(92, 'Guinea-Bissau', '62410', 1),
(93, 'Guyana', '32810', 1),
(94, 'Haiti', '33210', 1),
(95, 'Heard Island And Mcdonald Islands', '33410', 1),
(96, 'Honduras', '34010', 1),
(97, 'Hong Kong', '34410', 1),
(98, 'Hungary', '34810', 1),
(99, 'Iceland', '35210', 1),
(100, 'India', '35610', 1),
(101, 'Indonesia', '36010', 1),
(102, 'Iran', '36410', 1),
(103, 'Iraq', '36810', 1),
(104, 'Ireland', '37210', 1),
(105, 'Isle Of Man', '83310', 1),
(106, 'Israel', '37610', 1),
(107, 'Italy', '38010', 1),
(108, 'Ivory Coast', '38410', 1),
(109, 'Jamaica', '38810', 1),
(110, 'Japan', '39210', 1),
(111, 'Jersey', '83210', 1),
(112, 'Jordan', '40010', 1),
(113, 'Kazakhstan', '39810', 1),
(114, 'Kenya', '40410', 1),
(115, 'Kiribati', '29610', 1),
(116, 'Kuwait', '41410', 1),
(117, 'Kyrgyzstan', '41710', 1),
(118, 'Laos', '41810', 1),
(119, 'Latvia', '42810', 1),
(120, 'Lebanon', '42210', 1),
(121, 'Lesotho', '42610', 1),
(122, 'Liberia', '43010', 1),
(123, 'Libya', '43410', 1),
(124, 'Liechtenstein', '43810', 1),
(125, 'Lithuania', '44010', 1),
(126, 'Luxembourg', '44210', 1),
(127, 'Macao', '44610', 1),
(128, 'Macedonia', '80710', 1),
(129, 'Madagascar', '45010', 1),
(130, 'Malawi', '45410', 1),
(131, 'Malaysia', '45810', 1),
(132, 'Maldives', '46210', 1),
(133, 'Mali', '46610', 1),
(134, 'Malta', '47010', 1),
(135, 'Marshall Islands', '58410', 1),
(136, 'Martinique', '47410', 1),
(137, 'Mauritania', '47810', 1),
(138, 'Mauritius', '48010', 1),
(139, 'Mayotte', '17510', 1),
(140, 'Mexico', '48410', 1),
(141, 'Micronesia', '58310', 1),
(142, 'Moldova', '49810', 1),
(143, 'Monaco', '49210', 1),
(144, 'Mongolia', '49610', 1),
(145, 'Montenegro', '49910', 1),
(146, 'Montserrat', '50010', 1),
(147, 'Morocco', '50410', 1),
(148, 'Mozambique', '50810', 1),
(149, 'Myanmar', '10410', 1),
(150, 'Namibia', '51610', 1),
(151, 'Nauru', '52010', 1),
(152, 'Nepal', '52410', 1),
(153, 'Netherlands', '52810', 1),
(154, 'Netherlands Antilles', '53010', 1),
(155, 'New Caledonia', '54010', 1),
(156, 'New Zealand', '55410', 1),
(157, 'Nicaragua', '55810', 1),
(158, 'Niger', '56210', 1),
(159, 'Nigeria', '56610', 1),
(160, 'Niue', '57010', 1),
(161, 'Non-Malaysian', '94580', 1),
(162, 'Norfolk Island', '57410', 1),
(163, 'North Korea', '40810', 1),
(164, 'Northern Mariana Islands', '58010', 1),
(165, 'Norway', '57810', 1),
(166, 'Oman', '51210', 1),
(167, 'Others', '90000', 1),
(168, 'Pakistan', '58610', 1),
(169, 'Palau', '58510', 1),
(170, 'Palestinian Territory', '27510', 1),
(171, 'Panama', '59110', 1),
(172, 'Papua New Guinea', '59810', 1),
(173, 'Paraguay', '60010', 1),
(174, 'Permanent Resident (Amj) Malaysia', '45823', 1),
(175, 'Permanent Resident Of Malaysia', '45822', 1),
(176, 'Peru', '60410', 1),
(177, 'Philippines', '60810', 1),
(178, 'Pitcairn', '61210', 1),
(179, 'Poland', '61610', 1),
(180, 'Portugal', '62010', 1),
(181, 'Puerto Rico', '63010', 1),
(182, 'Qatar', '63410', 1),
(183, 'Republic Of The Congo', '17810', 1),
(184, 'Resident Of Malaysia', '45820', 1),
(185, 'Reunion', '63810', 1),
(186, 'Romania', '64210', 1),
(187, 'Russia', '64310', 1),
(188, 'Rwanda', '64610', 1),
(189, 'Saint Barth??A?Lemy', '65210', 1),
(190, 'Saint Helena', '65410', 1),
(191, 'Saint Kitts And Nevis', '65910', 1),
(192, 'Saint Lucia', '66210', 1),
(193, 'Saint Martin', '66310', 1),
(194, 'Saint Pierre And Miquelon', '66610', 1),
(195, 'Saint Vincent And The Grenadines', '67010', 1),
(196, 'Samoa', '88210', 1),
(197, 'San Marino', '67410', 1),
(198, 'Sao Tome And Principe', '67810', 1),
(199, 'Saudi Arabia', '68210', 1),
(200, 'Senegal', '68610', 1),
(201, 'Serbia', '68810', 1),
(202, 'Serbia And Montenegro', '89110', 1),
(203, 'Seychelles', '69010', 1),
(204, 'Sierra Leone', '69410', 1),
(205, 'Singapore', '70210', 1),
(206, 'Slovakia', '70310', 1),
(207, 'Slovenia', '70510', 1),
(208, 'Solomon Islands', '9010', 1),
(209, 'Somalia', '70610', 1),
(210, 'South Africa', '71010', 1),
(211, 'South Georgia And The South Sandwich Islands', '23910', 1),
(212, 'South Korea', '41010', 1),
(213, 'Spain', '72410', 1),
(214, 'Sri Lanka', '14410', 1),
(215, 'Sudan', '73610', 1),
(216, 'Suriname', '74010', 1),
(217, 'Svalbard And Jan Mayen', '74410', 1),
(218, 'Swaziland', '74810', 1),
(219, 'Sweden', '75210', 1),
(220, 'Switzerland', '75610', 1),
(221, 'Syria', '76010', 1),
(222, 'Taiwan', '15810', 1),
(223, 'Tajikistan', '76210', 1),
(224, 'Tanzania', '83410', 1),
(225, 'Temporary Resident Of Malaysia', '45821', 1),
(226, 'Thailand', '76410', 1),
(227, 'Togo', '76810', 1),
(228, 'Tokelau', '77210', 1),
(229, 'Tonga', '77610', 1),
(230, 'Trinidad And Tobago', '78010', 1),
(231, 'Tunisia', '78810', 1),
(232, 'Turkey', '79210', 1),
(233, 'Turkmenistan', '79510', 1),
(234, 'Turks And Caicos Islands', '79610', 1),
(235, 'Tuvalu', '79810', 1),
(236, 'U.S. Virgin Islands', '85010', 1),
(237, 'Uganda', '80010', 1),
(238, 'Ukraine', '80410', 1),
(239, 'United Arab Emirates', '78410', 1),
(240, 'United Kingdom', '82610', 1),
(241, 'United States', '84010', 1),
(242, 'United States Minor Outlying Islands', '58110', 1),
(243, 'Unspecified', '00000', 1),
(244, 'Uruguay', '85810', 1),
(245, 'Uzbekistan', '86010', 1),
(246, 'Vanuatu', '54810', 1),
(247, 'Vatican', '33610', 1),
(248, 'Venezuela', '86210', 1),
(249, 'Vietnam', '70410', 1),
(250, 'Wallis And Futuna', '87610', 1),
(251, 'Western Sahara', '73210', 1),
(252, 'Yemen', '88710', 1),
(253, 'Zambia', '89410', 1),
(254, 'Zimbabwe', '71610', 1);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_record_id` bigint(20) UNSIGNED NOT NULL,
  `payment_slip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `application_record_id`, `payment_slip`, `created_at`, `updated_at`) VALUES
(1, 4, '202301111232man.jpg', '2023-01-11 04:32:07', '2023-01-11 04:32:07'),
(2, 6, '202301131120sausage.jpg', '2023-01-13 03:20:44', '2023-01-13 03:20:44'),
(3, 7, '202301131127sausage.jpg', '2023-01-13 03:27:23', '2023-01-13 03:27:23'),
(4, 8, '202301131145sausage.jpg', '2023-01-13 03:45:17', '2023-01-13 03:45:17'),
(5, 9, '202301131450sausage.jpg', '2023-01-13 06:50:04', '2023-01-13 06:50:04'),
(6, 10, '202301131454sausage.jpg', '2023-01-13 06:54:55', '2023-01-13 06:54:55'),
(7, 15, '202301161604download.jfif', '2023-01-16 08:04:34', '2023-01-16 08:04:34'),
(8, 18, '202301171532R.jfif', '2023-01-17 07:32:55', '2023-01-17 07:32:55'),
(9, 24, '202301181447akson-1K8pIbIrhkQ-unsplash.jpg', '2023-01-18 06:47:05', '2023-01-18 06:47:05'),
(10, 25, '202301181512会场1QR code.png', '2023-01-18 07:12:18', '2023-01-18 07:12:18'),
(11, 26, '202301181757sausage.jpg', '2023-01-18 09:57:31', '2023-01-18 09:57:31'),
(12, 26, '202301181801sausage.jpg', '2023-01-18 10:01:17', '2023-01-18 10:01:17'),
(13, 5, '20230119080920220607141703.jpg', '2023-01-19 00:09:24', '2023-01-19 00:09:24'),
(14, 27, '20230119110020220607141703.jpg', '2023-01-19 03:00:38', '2023-01-19 03:00:38'),
(15, 28, '202301191517sausage.jpg', '2023-01-19 07:17:15', '2023-01-19 07:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `EnglishName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme_levels_id` bigint(20) UNSIGNED NOT NULL,
  `programme_types_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `EnglishName`, `programme_levels_id`, `programme_types_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Diploma in Accountancy', 4, 1, 1, NULL, NULL),
(2, 'Diploma in Business Administration', 4, 1, 1, NULL, NULL),
(4, 'Diploma in Marketing', 4, 1, 1, NULL, NULL),
(5, 'Diploma in Logistics Management', 4, 1, 1, NULL, NULL),
(8, 'Bachelor of Business Administration (Honours) in Finance & Investment', 3, 1, 1, NULL, NULL),
(9, 'Bachelor of Business Administration (Honours) in Marketing', 3, 1, 1, NULL, NULL),
(10, 'Bachelor in Accounting (Honours)', 3, 1, 1, NULL, NULL),
(11, 'Diploma in Information Technology', 4, 1, 1, NULL, NULL),
(13, 'Diploma in Electrical & Electronic Engineering', 4, 1, 1, NULL, NULL),
(14, 'Bachelor of Software Engineering (Honours)', 3, 1, 1, NULL, NULL),
(15, 'Bachelor of Electronic Engineering with Honours', 3, 1, 1, NULL, NULL),
(18, 'Diploma in Industrial Design', 4, 1, 1, NULL, NULL),
(19, 'Diploma in Advertising Design', 4, 1, 1, NULL, NULL),
(21, 'Diploma in Multimedia Design', 4, 1, 1, NULL, NULL),
(22, 'Bachelor of Design (Honours) Computer Graphic Design', 3, 1, 1, NULL, NULL),
(23, 'Diploma in Chinese Studies', 4, 1, 1, NULL, NULL),
(28, 'Bachelor of Arts (Honours) Chinese Studies', 3, 1, 1, NULL, NULL),
(29, 'Bachelor of Arts (Honours) English Language Teaching', 3, 1, 1, NULL, NULL),
(31, 'Bachelor of Communication (Honours) (Mass Communication)', 3, 1, 1, NULL, NULL),
(35, 'Foundation In Traditional Chinese Medicine', 5, 1, 1, NULL, NULL),
(36, 'Foundation in Arts', 5, 1, 1, NULL, NULL),
(38, 'Diploma in Early Childhood Education', 4, 1, 1, NULL, NULL),
(39, 'Bachelor of Business Administration (Honours)', 3, 1, 1, NULL, NULL),
(40, 'Master of Business Administration', 2, 1, 1, NULL, NULL),
(41, 'Bachelor of Business Administration (Honours) in Tourism Management', 3, 1, 1, NULL, NULL),
(42, 'Bachelor of Business Administration (Honours) in H', 3, 1, 1, NULL, NULL),
(43, 'Master of Arts in Chinese Studies', 2, 1, 1, NULL, NULL),
(45, 'Bachelor of Traditional Chinese Medicine (Honours)', 3, 1, 1, NULL, NULL),
(46, 'Bachelor of Psychology (Honours)', 3, 1, 1, NULL, NULL),
(48, 'Bachelor of Early Childhood Education (Honours)', 3, 1, 1, NULL, NULL),
(49, 'Bachelor of Education (Honours) Guidance and Counselling', 3, 1, 1, NULL, NULL),
(51, 'Master of Communication', 2, 1, 1, NULL, NULL),
(52, 'Doctor of Philosophy (Business Administration)', 1, 1, 1, NULL, NULL),
(53, 'Professional Certificate in Aesthetic Treatments & Body Therapy', 6, 1, 0, NULL, NULL),
(54, 'Professional Certificate in Hairdressing & Hair Design', 6, 1, 0, NULL, NULL),
(55, 'Diploma in Unreal Engine VR Architecture', 6, 1, 0, NULL, NULL),
(56, 'Executive Diploma in Tourism Management', 7, 1, 0, NULL, NULL),
(57, 'Executive Diploma in Industrial Design', 7, 1, 0, NULL, NULL),
(58, 'Executive Diploma in Visual Art', 7, 1, 0, NULL, NULL),
(59, 'Executive Diploma in Advertising Design', 7, 1, 0, NULL, NULL),
(60, 'Executive Diploma in Multimedia Design', 7, 1, 0, NULL, NULL),
(61, 'Executive Diploma in Early Childhood Education', 7, 1, 0, NULL, NULL),
(62, 'Executive Diploma in Business Administration', 7, 1, 0, NULL, NULL),
(63, 'Executive Diploma in Marketing', 7, 1, 0, NULL, NULL),
(64, 'Executive Diploma in Logistics Management', 7, 1, 0, NULL, NULL),
(65, 'Executive Diploma in Chinese Studies', 7, 1, 0, NULL, NULL),
(66, 'Executive Diploma in English', 7, 1, 0, NULL, NULL),
(67, 'Executive Diploma in Journalism', 7, 1, 0, NULL, NULL),
(68, 'Executive Diploma in Information Technology', 7, 1, 0, NULL, NULL),
(69, 'Executive Diploma in Computer Science', 7, 1, 0, NULL, NULL),
(70, 'Executive Diploma in Electrical & Electronic Engineering', 7, 1, 0, NULL, NULL),
(71, 'Doctor of Philosophy (Chinese Studies)', 1, 1, 1, NULL, NULL),
(72, 'Bachelor of Design (Honours) Industrial Design', 3, 1, 1, NULL, NULL),
(73, 'Bachelor of Property Management (Honours)', 3, 1, 1, NULL, NULL),
(74, 'Master of Science in Computer Science', 2, 1, 1, NULL, NULL),
(75, 'Foundation in Science', 5, 1, 1, NULL, NULL),
(76, 'Doctor of Business Administration', 1, 1, 1, NULL, NULL),
(77, 'Master of Science in Computer Science - Part Time', 2, 2, 1, NULL, NULL),
(78, 'Master of Communication - Part Time', 2, 2, 1, NULL, NULL),
(79, 'Master of Business Administration - Part Time', 2, 2, 1, NULL, NULL),
(80, 'Master of Arts in Chinese Studies - Part Time', 2, 2, 1, NULL, NULL),
(81, 'M.A in Chinese Studies - Part Time', 2, 2, 1, NULL, NULL),
(82, 'Doctor of Philosophy (Chinese Studies) - Part Time', 1, 2, 1, NULL, NULL),
(83, 'Doctor of Philosophy (Business Administration) - Part Time', 1, 2, 1, NULL, NULL),
(84, 'Doctor of Business Administration - Part Time', 1, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programme_levels`
--

CREATE TABLE `programme_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `programme_levels` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programme_levels`
--

INSERT INTO `programme_levels` (`id`, `programme_levels`) VALUES
(3, 'Bachelor'),
(4, 'Diploma'),
(5, 'Foundation'),
(2, 'Master'),
(1, 'PhD'),
(7, 'S'),
(6, 'TE');

-- --------------------------------------------------------

--
-- Table structure for table `programme_picked`
--

CREATE TABLE `programme_picked` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_records_id` bigint(20) UNSIGNED NOT NULL,
  `programme_records_id` bigint(20) UNSIGNED NOT NULL,
  `choice_priorities_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programme_picked`
--

INSERT INTO `programme_picked` (`id`, `application_records_id`, `programme_records_id`, `choice_priorities_id`) VALUES
(13, 1, 24, 1),
(14, 1, 25, 2),
(15, 1, 26, 3),
(18, 3, 29, 1),
(19, 3, 30, 2),
(20, 3, 31, 3),
(21, 4, 32, 1),
(22, 4, 33, 2),
(29, 2, 40, 1),
(30, 2, 41, 2),
(31, 2, 42, 3),
(32, 6, 43, 1),
(33, 6, 44, 2),
(34, 6, 45, 3),
(35, 7, 46, 1),
(36, 7, 47, 2),
(37, 7, 48, 3),
(38, 8, 49, 1),
(39, 8, 50, 2),
(40, 8, 51, 3),
(41, 9, 52, 1),
(42, 9, 53, 2),
(43, 9, 54, 3),
(44, 10, 55, 1),
(45, 10, 56, 2),
(46, 10, 57, 3),
(47, 11, 58, 1),
(48, 11, 59, 2),
(49, 11, 60, 3),
(50, 15, 61, 1),
(51, 15, 62, 2),
(52, 15, 63, 3),
(53, 11, 64, 1),
(54, 11, 65, 2),
(55, 11, 66, 3),
(56, 17, 67, 1),
(57, 17, 68, 2),
(58, 17, 69, 3),
(59, 18, 70, 1),
(60, 18, 71, 2),
(61, 18, 72, 3),
(62, 25, 73, 1),
(63, 25, 74, 2),
(64, 25, 75, 3),
(65, 18, 76, 1),
(66, 18, 77, 2),
(67, 18, 78, 3),
(68, 26, 79, 1),
(69, 26, 80, 2),
(70, 26, 81, 3),
(71, 26, 82, 1),
(72, 26, 83, 2),
(73, 26, 84, 3),
(74, 5, 85, 1),
(75, 5, 86, 2),
(76, 5, 87, 3),
(77, 27, 88, 1),
(78, 27, 89, 2),
(79, 27, 90, 3),
(80, 28, 91, 1),
(81, 28, 92, 2),
(82, 28, 93, 3);

-- --------------------------------------------------------

--
-- Table structure for table `programme_records`
--

CREATE TABLE `programme_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semester_year_mappings_id` bigint(20) UNSIGNED NOT NULL,
  `programmes_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programme_records`
--

INSERT INTO `programme_records` (`id`, `semester_year_mappings_id`, `programmes_id`) VALUES
(24, 1, 76),
(25, 1, 23),
(26, 1, 28),
(27, 2, 82),
(28, 2, 81),
(29, 1, 11),
(30, 1, 21),
(31, 1, 68),
(32, 1, 51),
(33, 1, 40),
(34, 1, 82),
(35, 1, 79),
(36, 1, 82),
(37, 1, 83),
(38, 1, 82),
(39, 1, 84),
(40, 1, 76),
(41, 1, 76),
(42, 1, 76),
(43, 2, 76),
(44, 2, 52),
(45, 2, 40),
(46, 1, 76),
(47, 1, 84),
(48, 1, 52),
(49, 1, 43),
(50, 1, 43),
(51, 1, 51),
(52, 1, 76),
(53, 1, 71),
(54, 1, 81),
(55, 1, 10),
(56, 1, 28),
(57, 1, 29),
(58, 1, 76),
(59, 1, 51),
(60, 1, 43),
(61, 1, 51),
(62, 1, 43),
(63, 1, 40),
(64, 2, 21),
(65, 2, 21),
(66, 2, 2),
(67, 1, 36),
(68, 1, 75),
(69, 1, 35),
(70, 1, 4),
(71, 1, 28),
(72, 1, 38),
(73, 2, 43),
(74, 2, 40),
(75, 2, 51),
(76, 2, 52),
(77, 2, 51),
(78, 2, 43),
(79, 1, 71),
(80, 1, 52),
(81, 1, 76),
(82, 1, 52),
(83, 1, 71),
(84, 1, 74),
(85, 1, 81),
(86, 1, 76),
(87, 1, 83),
(88, 1, 77),
(89, 1, 71),
(90, 1, 81),
(91, 1, 81),
(92, 1, 79),
(93, 1, 76);

-- --------------------------------------------------------

--
-- Table structure for table `programme_types`
--

CREATE TABLE `programme_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `programme_types` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programme_types`
--

INSERT INTO `programme_types` (`id`, `programme_types`) VALUES
(2, 'Full Time'),
(1, 'Part Time');

-- --------------------------------------------------------

--
-- Table structure for table `races`
--

CREATE TABLE `races` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `race_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `races`
--

INSERT INTO `races` (`id`, `name`, `race_code`, `status`) VALUES
(1, 'Chinese', '5100', 1),
(2, 'Malay', '1100', 1),
(3, 'Indian', '6100', 1),
(4, 'Others', '9100', 1);

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `name`, `religion_code`, `status`) VALUES
(1, 'Islam', '100', 1),
(2, 'Christian', '200', 1),
(3, 'Buddhism', '300', 1),
(4, 'Hindu', '400', 1),
(5, 'Sikhism', '500', 1),
(6, 'Taoism', '600', 1),
(7, 'Confucianism', '700', 1),
(8, 'Bahai', '800', 1),
(9, 'Tribal/Folk/Other Traditional Chinese Religion', '900', 1),
(10, 'Free Thinker', '1000', 1),
(11, 'Other', '9000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`) VALUES
(1, 'Local Student', 1),
(2, 'International Student', 1),
(3, 'Superadmin', 1),
(4, 'AARO', 1),
(5, 'AFO', 1),
(6, 'ISO', 1),
(7, 'SRO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_levels`
--

CREATE TABLE `school_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_levels`
--

INSERT INTO `school_levels` (`id`, `name`, `status`) VALUES
(1, 'Secondary', 1),
(2, 'Upper Secondary School (for STPM, A Level or other equivalent holders)', 1),
(3, 'Foundation', 1),
(4, 'Diploma', 1),
(5, 'Degree', 1),
(6, 'PhD', 1),
(7, 'Master', 1),
(8, 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_transcripts`
--

CREATE TABLE `school_transcripts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transcript` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `leaving_cert` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_transcripts`
--

INSERT INTO `school_transcripts` (`id`, `transcript`, `leaving_cert`) VALUES
(1, 'images/profile_picture/20230111100707sausage.jpg', 'images/profile_picture/20230111100707sausage.jpg'),
(2, 'images/profile_picture/20230111100808sausage.jpg', 'images/profile_picture/20230111100808sausage.jpg'),
(3, 'images/profile_picture/20230111100909sausage.jpg', 'images/profile_picture/20230111100909sausage.jpg'),
(4, 'images/profile_picture/20230111100909sausage.jpg', 'images/profile_picture/20230111100909sausage.jpg'),
(5, 'images/profile_picture/20230111101111sausage.jpg', 'images/profile_picture/20230111101111sausage.jpg'),
(6, 'images/profile_picture/20230111101414sausage.jpg', 'images/profile_picture/20230111101414sausage.jpg'),
(7, 'images/profile_picture/20230111101515sausage.jpg', 'images/profile_picture/20230111101515sausage.jpg'),
(8, 'images/profile_picture/20230111101515sausage.jpg', 'images/profile_picture/20230111101515sausage.jpg'),
(9, 'images/profile_picture/20230111101616sausage.jpg', 'images/profile_picture/20230111101616sausage.jpg'),
(10, 'images/profile_picture/20230111101818sausage.jpg', 'images/profile_picture/20230111101818sausage.jpg'),
(11, 'images/profile_picture/20230111141010sausage.jpg', 'images/profile_picture/20230111141010sausage.jpg'),
(12, 'images/profile_picture/20230113111212sausage.jpg', 'images/profile_picture/20230113111212sausage.jpg'),
(13, 'images/profile_picture/20230113111313sausage.jpg', 'images/profile_picture/20230113111313sausage.jpg'),
(14, 'images/profile_picture/20230113111414sausage.jpg', 'images/profile_picture/20230113111414sausage.jpg'),
(15, 'images/profile_picture/20230113111515sausage.jpg', 'images/profile_picture/20230113111515sausage.jpg'),
(16, 'images/profile_picture/20230113111717sausage.jpg', 'images/profile_picture/20230113111717sausage.jpg'),
(17, 'images/profile_picture/20230113111717sausage.jpg', 'images/profile_picture/20230113111717sausage.jpg'),
(18, 'images/profile_picture/20230113112525sausage.jpg', 'images/profile_picture/20230113112525sausage.jpg'),
(19, 'images/profile_picture/20230113113232sausage.jpg', 'images/profile_picture/20230113113232sausage.jpg'),
(20, 'images/profile_picture/20230113114545sausage.jpg', 'images/profile_picture/20230113114545sausage.jpg'),
(21, 'images/profile_picture/20230113144949sausage.jpg', 'images/profile_picture/20230113144949sausage.jpg'),
(22, 'images/profile_picture/20230113145454sausage.jpg', 'images/profile_picture/20230113145454sausage.jpg'),
(23, 'images/profile_picture/20230116160000download.jfif', 'images/profile_picture/20230116160000download.jfif'),
(24, 'images/profile_picture/20230117153232R.jfif', 'images/profile_picture/20230117153232R.jfif'),
(25, 'images/profile_picture/20230118151212会场1QR code.png', 'images/profile_picture/20230118151212会场1QR code.png'),
(26, 'images/profile_picture/20230118175757sausage.jpg', 'images/profile_picture/20230118175757sausage.jpg'),
(27, 'images/profile_picture/20230118180101sausage.jpg', 'images/profile_picture/20230118180101sausage.jpg'),
(28, 'images/profile_picture/2023011908090920220607141703.jpg', 'images/profile_picture/20230119080909man.jpg'),
(29, 'images/profile_picture/2023011911000020220607141703.jpg', 'images/profile_picture/20230119110000man.jpg'),
(30, 'images/profile_picture/20230119151717sausage.jpg', 'images/profile_picture/20230119151717sausage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semesters` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semesters`) VALUES
(1, '3'),
(2, '5/6'),
(3, '9/10');

-- --------------------------------------------------------

--
-- Table structure for table `semester_year_mappings`
--

CREATE TABLE `semester_year_mappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semesters_id` bigint(20) UNSIGNED NOT NULL,
  `year_offered` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semester_year_mappings`
--

INSERT INTO `semester_year_mappings` (`id`, `semesters_id`, `year_offered`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2022, 1, NULL, NULL),
(2, 2, 2022, 1, NULL, NULL),
(3, 3, 2022, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_of_healths`
--

CREATE TABLE `status_of_healths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_record_id` bigint(20) UNSIGNED NOT NULL,
  `disease_id` bigint(20) UNSIGNED NOT NULL,
  `disease_remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disease_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_of_healths`
--

INSERT INTO `status_of_healths` (`id`, `application_record_id`, `disease_id`, `disease_remark`, `disease_status`) VALUES
(1, 1, 1, NULL, 'No'),
(2, 1, 2, NULL, 'No'),
(3, 1, 3, NULL, 'No'),
(4, 1, 4, NULL, 'No'),
(5, 1, 5, NULL, 'No'),
(6, 1, 6, NULL, 'No'),
(7, 1, 7, NULL, 'No'),
(8, 1, 8, NULL, 'No'),
(9, 1, 9, NULL, 'No'),
(10, 1, 10, NULL, 'No'),
(11, 1, 11, NULL, 'No'),
(12, 1, 12, NULL, 'No'),
(13, 1, 13, NULL, 'No'),
(14, 1, 14, NULL, 'No'),
(15, 1, 15, NULL, 'No'),
(16, 1, 16, NULL, 'No'),
(17, 1, 17, NULL, 'No'),
(18, 1, 1, NULL, 'No'),
(19, 1, 2, NULL, 'No'),
(20, 1, 3, NULL, 'No'),
(21, 1, 4, NULL, 'No'),
(22, 1, 5, NULL, 'No'),
(23, 1, 6, NULL, 'No'),
(24, 1, 7, NULL, 'No'),
(25, 1, 8, NULL, 'No'),
(26, 1, 9, NULL, 'No'),
(27, 1, 10, NULL, 'No'),
(28, 1, 11, NULL, 'No'),
(29, 1, 12, NULL, 'No'),
(30, 1, 13, NULL, 'No'),
(31, 1, 14, NULL, 'No'),
(32, 1, 15, NULL, 'No'),
(33, 1, 16, NULL, 'No'),
(34, 1, 17, NULL, 'No'),
(35, 2, 1, NULL, 'No'),
(36, 2, 2, NULL, 'No'),
(37, 2, 3, NULL, 'No'),
(38, 2, 4, NULL, 'No'),
(39, 2, 5, NULL, 'No'),
(40, 2, 6, NULL, 'No'),
(41, 2, 7, NULL, 'No'),
(42, 2, 8, NULL, 'No'),
(43, 2, 9, NULL, 'No'),
(44, 2, 10, NULL, 'No'),
(45, 2, 11, NULL, 'No'),
(46, 2, 12, NULL, 'No'),
(47, 2, 13, NULL, 'No'),
(48, 2, 14, NULL, 'No'),
(49, 2, 15, NULL, 'No'),
(50, 2, 16, NULL, 'No'),
(51, 2, 17, NULL, 'No'),
(52, 3, 1, NULL, 'No'),
(53, 3, 2, NULL, 'No'),
(54, 3, 3, NULL, 'No'),
(55, 3, 4, NULL, 'No'),
(56, 3, 5, NULL, 'No'),
(57, 3, 6, NULL, 'No'),
(58, 3, 7, NULL, 'No'),
(59, 3, 8, NULL, 'No'),
(60, 3, 9, NULL, 'No'),
(61, 3, 10, NULL, 'No'),
(62, 3, 11, NULL, 'No'),
(63, 3, 12, NULL, 'No'),
(64, 3, 13, NULL, 'No'),
(65, 3, 14, NULL, 'No'),
(66, 3, 15, NULL, 'No'),
(67, 3, 16, NULL, 'No'),
(68, 3, 17, NULL, 'No'),
(69, 4, 1, NULL, 'No'),
(70, 4, 2, NULL, 'No'),
(71, 4, 3, NULL, 'No'),
(72, 4, 4, NULL, 'No'),
(73, 4, 5, NULL, 'No'),
(74, 4, 6, NULL, 'No'),
(75, 4, 7, NULL, 'No'),
(76, 4, 8, NULL, 'No'),
(77, 4, 9, NULL, 'No'),
(78, 4, 10, NULL, 'No'),
(79, 4, 11, NULL, 'No'),
(80, 4, 12, NULL, 'No'),
(81, 4, 13, NULL, 'No'),
(82, 4, 14, NULL, 'No'),
(83, 4, 15, NULL, 'No'),
(84, 4, 16, NULL, 'No'),
(85, 4, 17, NULL, 'No'),
(86, 2, 1, NULL, 'No'),
(87, 2, 2, NULL, 'No'),
(88, 2, 3, NULL, 'No'),
(89, 2, 4, NULL, 'No'),
(90, 2, 5, NULL, 'No'),
(91, 2, 6, NULL, 'No'),
(92, 2, 7, NULL, 'No'),
(93, 2, 8, NULL, 'No'),
(94, 2, 9, NULL, 'No'),
(95, 2, 10, NULL, 'No'),
(96, 2, 11, NULL, 'No'),
(97, 2, 12, NULL, 'No'),
(98, 2, 13, NULL, 'No'),
(99, 2, 14, NULL, 'No'),
(100, 2, 15, NULL, 'No'),
(101, 2, 16, NULL, 'No'),
(102, 2, 17, NULL, 'No'),
(103, 6, 1, NULL, 'No'),
(104, 6, 2, NULL, 'No'),
(105, 6, 3, NULL, 'No'),
(106, 6, 4, NULL, 'No'),
(107, 6, 5, NULL, 'No'),
(108, 6, 6, NULL, 'No'),
(109, 6, 7, NULL, 'No'),
(110, 6, 8, NULL, 'No'),
(111, 6, 9, NULL, 'No'),
(112, 6, 10, NULL, 'No'),
(113, 6, 11, NULL, 'No'),
(114, 6, 12, NULL, 'No'),
(115, 6, 13, NULL, 'No'),
(116, 6, 14, NULL, 'No'),
(117, 6, 15, NULL, 'No'),
(118, 6, 16, NULL, 'No'),
(119, 6, 17, NULL, 'No'),
(120, 7, 1, NULL, 'No'),
(121, 7, 2, NULL, 'No'),
(122, 7, 3, NULL, 'No'),
(123, 7, 4, NULL, 'No'),
(124, 7, 5, NULL, 'No'),
(125, 7, 6, NULL, 'No'),
(126, 7, 7, NULL, 'No'),
(127, 7, 8, NULL, 'No'),
(128, 7, 9, NULL, 'No'),
(129, 7, 10, NULL, 'No'),
(130, 7, 11, NULL, 'No'),
(131, 7, 12, NULL, 'No'),
(132, 7, 13, NULL, 'No'),
(133, 7, 14, NULL, 'No'),
(134, 7, 15, NULL, 'No'),
(135, 7, 16, NULL, 'No'),
(136, 7, 17, NULL, 'No'),
(137, 8, 1, NULL, 'No'),
(138, 8, 2, NULL, 'No'),
(139, 8, 3, NULL, 'No'),
(140, 8, 4, NULL, 'No'),
(141, 8, 5, NULL, 'No'),
(142, 8, 6, NULL, 'No'),
(143, 8, 7, NULL, 'No'),
(144, 8, 8, NULL, 'No'),
(145, 8, 9, NULL, 'No'),
(146, 8, 10, NULL, 'No'),
(147, 8, 11, NULL, 'No'),
(148, 8, 12, NULL, 'No'),
(149, 8, 13, NULL, 'No'),
(150, 8, 14, NULL, 'No'),
(151, 8, 15, NULL, 'No'),
(152, 8, 16, NULL, 'No'),
(153, 8, 17, NULL, 'No'),
(154, 9, 1, NULL, 'No'),
(155, 9, 2, NULL, 'No'),
(156, 9, 3, NULL, 'No'),
(157, 9, 4, NULL, 'No'),
(158, 9, 5, NULL, 'No'),
(159, 9, 6, NULL, 'No'),
(160, 9, 7, NULL, 'No'),
(161, 9, 8, NULL, 'No'),
(162, 9, 9, NULL, 'No'),
(163, 9, 10, NULL, 'No'),
(164, 9, 11, NULL, 'No'),
(165, 9, 12, NULL, 'No'),
(166, 9, 13, NULL, 'No'),
(167, 9, 14, NULL, 'No'),
(168, 9, 15, NULL, 'No'),
(169, 9, 16, NULL, 'No'),
(170, 9, 17, NULL, 'No'),
(171, 10, 1, NULL, 'No'),
(172, 10, 2, NULL, 'No'),
(173, 10, 3, NULL, 'No'),
(174, 10, 4, NULL, 'No'),
(175, 10, 5, NULL, 'No'),
(176, 10, 6, NULL, 'No'),
(177, 10, 7, NULL, 'No'),
(178, 10, 8, NULL, 'No'),
(179, 10, 9, NULL, 'No'),
(180, 10, 10, NULL, 'No'),
(181, 10, 11, NULL, 'No'),
(182, 10, 12, NULL, 'No'),
(183, 10, 13, NULL, 'No'),
(184, 10, 14, NULL, 'No'),
(185, 10, 15, NULL, 'No'),
(186, 10, 16, NULL, 'No'),
(187, 10, 17, NULL, 'No'),
(188, 11, 1, NULL, 'No'),
(189, 11, 2, NULL, 'No'),
(190, 11, 3, NULL, 'No'),
(191, 11, 4, NULL, 'No'),
(192, 11, 5, NULL, 'No'),
(193, 11, 6, NULL, 'No'),
(194, 11, 7, NULL, 'No'),
(195, 11, 8, NULL, 'No'),
(196, 11, 9, NULL, 'No'),
(197, 11, 10, NULL, 'No'),
(198, 11, 11, NULL, 'No'),
(199, 11, 12, NULL, 'No'),
(200, 11, 13, NULL, 'No'),
(201, 11, 14, NULL, 'No'),
(202, 11, 15, NULL, 'No'),
(203, 11, 16, NULL, 'No'),
(204, 11, 17, NULL, 'No'),
(205, 15, 1, NULL, 'No'),
(206, 15, 2, NULL, 'No'),
(207, 15, 3, NULL, 'No'),
(208, 15, 4, NULL, 'No'),
(209, 15, 5, NULL, 'No'),
(210, 15, 6, NULL, 'No'),
(211, 15, 7, NULL, 'No'),
(212, 15, 8, NULL, 'No'),
(213, 15, 9, NULL, 'No'),
(214, 15, 10, NULL, 'No'),
(215, 15, 11, NULL, 'No'),
(216, 15, 12, NULL, 'No'),
(217, 15, 13, NULL, 'No'),
(218, 15, 14, NULL, 'No'),
(219, 15, 15, NULL, 'No'),
(220, 15, 16, NULL, 'No'),
(221, 15, 17, NULL, 'No'),
(222, 17, 1, NULL, 'No'),
(223, 17, 2, NULL, 'No'),
(224, 17, 3, NULL, 'No'),
(225, 17, 4, NULL, 'No'),
(226, 17, 5, NULL, 'No'),
(227, 17, 6, NULL, 'No'),
(228, 17, 7, NULL, 'No'),
(229, 17, 8, NULL, 'No'),
(230, 17, 9, NULL, 'No'),
(231, 17, 10, NULL, 'No'),
(232, 17, 11, NULL, 'No'),
(233, 17, 12, NULL, 'No'),
(234, 17, 13, NULL, 'No'),
(235, 17, 14, NULL, 'No'),
(236, 17, 15, NULL, 'No'),
(237, 17, 16, NULL, 'No'),
(238, 17, 17, NULL, 'No'),
(239, 18, 1, NULL, 'No'),
(240, 18, 2, NULL, 'No'),
(241, 18, 3, NULL, 'No'),
(242, 18, 4, NULL, 'No'),
(243, 18, 5, NULL, 'No'),
(244, 18, 6, NULL, 'No'),
(245, 18, 7, NULL, 'No'),
(246, 18, 8, NULL, 'No'),
(247, 18, 9, NULL, 'No'),
(248, 18, 10, NULL, 'No'),
(249, 18, 11, NULL, 'No'),
(250, 18, 12, NULL, 'No'),
(251, 18, 13, NULL, 'No'),
(252, 18, 14, NULL, 'No'),
(253, 18, 15, NULL, 'No'),
(254, 18, 16, NULL, 'No'),
(255, 18, 17, NULL, 'No'),
(256, 24, 1, NULL, 'No'),
(257, 24, 2, NULL, 'No'),
(258, 24, 3, NULL, 'No'),
(259, 24, 4, NULL, 'No'),
(260, 24, 5, NULL, 'No'),
(261, 24, 6, NULL, 'No'),
(262, 24, 7, NULL, 'No'),
(263, 24, 8, NULL, 'No'),
(264, 24, 9, NULL, 'No'),
(265, 24, 10, NULL, 'No'),
(266, 24, 11, NULL, 'No'),
(267, 24, 12, NULL, 'No'),
(268, 24, 13, NULL, 'No'),
(269, 24, 14, NULL, 'No'),
(270, 24, 15, NULL, 'No'),
(271, 24, 16, NULL, 'No'),
(272, 24, 17, NULL, 'No'),
(273, 25, 1, NULL, 'No'),
(274, 25, 2, NULL, 'No'),
(275, 25, 3, NULL, 'No'),
(276, 25, 4, NULL, 'No'),
(277, 25, 5, NULL, 'No'),
(278, 25, 6, NULL, 'No'),
(279, 25, 7, NULL, 'No'),
(280, 25, 8, NULL, 'No'),
(281, 25, 9, NULL, 'No'),
(282, 25, 10, NULL, 'No'),
(283, 25, 11, NULL, 'No'),
(284, 25, 12, NULL, 'No'),
(285, 25, 13, NULL, 'No'),
(286, 25, 14, NULL, 'No'),
(287, 25, 15, NULL, 'No'),
(288, 25, 16, NULL, 'No'),
(289, 25, 17, NULL, 'No'),
(290, 18, 1, NULL, 'No'),
(291, 18, 2, NULL, 'No'),
(292, 18, 3, NULL, 'No'),
(293, 18, 4, NULL, 'No'),
(294, 18, 5, NULL, 'No'),
(295, 18, 6, NULL, 'No'),
(296, 18, 7, NULL, 'No'),
(297, 18, 8, NULL, 'No'),
(298, 18, 9, NULL, 'No'),
(299, 18, 10, NULL, 'No'),
(300, 18, 11, NULL, 'No'),
(301, 18, 12, NULL, 'No'),
(302, 18, 13, NULL, 'No'),
(303, 18, 14, NULL, 'No'),
(304, 18, 15, NULL, 'No'),
(305, 18, 16, NULL, 'No'),
(306, 18, 17, NULL, 'No'),
(307, 26, 1, NULL, 'No'),
(308, 26, 2, NULL, 'No'),
(309, 26, 3, NULL, 'No'),
(310, 26, 4, NULL, 'No'),
(311, 26, 5, NULL, 'No'),
(312, 26, 6, NULL, 'No'),
(313, 26, 7, NULL, 'No'),
(314, 26, 8, NULL, 'No'),
(315, 26, 9, NULL, 'No'),
(316, 26, 10, NULL, 'No'),
(317, 26, 11, NULL, 'No'),
(318, 26, 12, NULL, 'No'),
(319, 26, 13, NULL, 'No'),
(320, 26, 14, NULL, 'No'),
(321, 26, 15, NULL, 'No'),
(322, 26, 16, NULL, 'No'),
(323, 26, 17, NULL, 'No'),
(324, 5, 1, NULL, 'No'),
(325, 5, 2, NULL, 'No'),
(326, 5, 3, NULL, 'No'),
(327, 5, 4, NULL, 'No'),
(328, 5, 5, NULL, 'No'),
(329, 5, 6, NULL, 'No'),
(330, 5, 7, NULL, 'No'),
(331, 5, 8, NULL, 'No'),
(332, 5, 9, NULL, 'No'),
(333, 5, 10, NULL, 'No'),
(334, 5, 11, NULL, 'No'),
(335, 5, 12, NULL, 'No'),
(336, 5, 13, NULL, 'No'),
(337, 5, 14, NULL, 'No'),
(338, 5, 15, NULL, 'No'),
(339, 5, 16, NULL, 'No'),
(340, 5, 17, NULL, 'No'),
(341, 27, 1, NULL, 'No'),
(342, 27, 2, NULL, 'No'),
(343, 27, 3, NULL, 'No'),
(344, 27, 4, NULL, 'No'),
(345, 27, 5, NULL, 'No'),
(346, 27, 6, NULL, 'No'),
(347, 27, 7, NULL, 'No'),
(348, 27, 8, NULL, 'No'),
(349, 27, 9, NULL, 'No'),
(350, 27, 10, NULL, 'No'),
(351, 27, 11, NULL, 'No'),
(352, 27, 12, NULL, 'No'),
(353, 27, 13, NULL, 'No'),
(354, 27, 14, NULL, 'No'),
(355, 27, 15, NULL, 'No'),
(356, 27, 16, NULL, 'No'),
(357, 27, 17, NULL, 'No'),
(358, 28, 1, NULL, 'No'),
(359, 28, 2, NULL, 'No'),
(360, 28, 3, NULL, 'No'),
(361, 28, 4, NULL, 'No'),
(362, 28, 5, NULL, 'No'),
(363, 28, 6, NULL, 'No'),
(364, 28, 7, NULL, 'No'),
(365, 28, 8, NULL, 'No'),
(366, 28, 9, NULL, 'No'),
(367, 28, 10, NULL, 'No'),
(368, 28, 11, NULL, 'No'),
(369, 28, 12, NULL, 'No'),
(370, 28, 13, NULL, 'No'),
(371, 28, 14, NULL, 'No'),
(372, 28, 15, NULL, 'No'),
(373, 28, 16, NULL, 'No'),
(374, 28, 17, NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `supporting_documents`
--

CREATE TABLE `supporting_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ic_front` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ic_back` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supporting_documents`
--

INSERT INTO `supporting_documents` (`id`, `ic_front`, `ic_back`) VALUES
(1, 'images/profile_picture/20230111095656sausage.jpg', 'images/profile_picture/20230111095656sausage.jpg'),
(2, 'images/profile_picture/20230111095858sausage.jpg', 'images/profile_picture/20230111095858sausage.jpg'),
(3, 'images/profile_picture/20230111100000sausage.jpg', 'images/profile_picture/20230111100000sausage.jpg'),
(4, 'images/profile_picture/20230111100505sausage.jpg', 'images/profile_picture/20230111100505sausage.jpg'),
(5, 'images/profile_picture/20230111100505sausage.jpg', 'images/profile_picture/20230111100505sausage.jpg'),
(6, 'images/profile_picture/20230111100606sausage.jpg', 'images/profile_picture/20230111100606sausage.jpg'),
(7, 'images/profile_picture/20230111100606sausage.jpg', 'images/profile_picture/20230111100606sausage.jpg'),
(8, 'images/profile_picture/20230111100707sausage.jpg', 'images/profile_picture/20230111100707sausage.jpg'),
(9, 'images/profile_picture/20230111100808sausage.jpg', 'images/profile_picture/20230111100808sausage.jpg'),
(10, 'images/profile_picture/20230111100909sausage.jpg', 'images/profile_picture/20230111100909sausage.jpg'),
(11, 'images/profile_picture/20230111100909sausage.jpg', 'images/profile_picture/20230111100909sausage.jpg'),
(12, 'images/profile_picture/20230111101111sausage.jpg', 'images/profile_picture/20230111101111sausage.jpg'),
(13, 'images/profile_picture/20230111101414sausage.jpg', 'images/profile_picture/20230111101414sausage.jpg'),
(14, 'images/profile_picture/20230111101515sausage.jpg', 'images/profile_picture/20230111101515sausage.jpg'),
(15, 'images/profile_picture/20230111101515sausage.jpg', 'images/profile_picture/20230111101515sausage.jpg'),
(16, 'images/profile_picture/20230111101616sausage.jpg', 'images/profile_picture/20230111101616sausage.jpg'),
(17, 'images/profile_picture/20230111101818sausage.jpg', 'images/profile_picture/20230111101818sausage.jpg'),
(18, 'images/profile_picture/20230111141010sausage.jpg', 'images/profile_picture/20230111141010sausage.jpg'),
(19, 'images/profile_picture/20230113110707sausage.jpg', 'images/profile_picture/20230113110707sausage.jpg'),
(20, 'images/profile_picture/20230113110808sausage.jpg', 'images/profile_picture/20230113110808sausage.jpg'),
(21, 'images/profile_picture/20230113111111sausage.jpg', 'images/profile_picture/20230113111111sausage.jpg'),
(22, 'images/profile_picture/20230113111212sausage.jpg', 'images/profile_picture/20230113111212sausage.jpg'),
(23, 'images/profile_picture/20230113111313sausage.jpg', 'images/profile_picture/20230113111313sausage.jpg'),
(24, 'images/profile_picture/20230113111414sausage.jpg', 'images/profile_picture/20230113111414sausage.jpg'),
(25, 'images/profile_picture/20230113111515sausage.jpg', 'images/profile_picture/20230113111515sausage.jpg'),
(26, 'images/profile_picture/20230113111717sausage.jpg', 'images/profile_picture/20230113111717sausage.jpg'),
(27, 'images/profile_picture/20230113111717sausage.jpg', 'images/profile_picture/20230113111717sausage.jpg'),
(28, 'images/profile_picture/20230113112525sausage.jpg', 'images/profile_picture/20230113112525sausage.jpg'),
(29, 'images/profile_picture/20230113113232sausage.jpg', 'images/profile_picture/20230113113232sausage.jpg'),
(30, 'images/profile_picture/20230113114545sausage.jpg', 'images/profile_picture/20230113114545sausage.jpg'),
(31, 'images/profile_picture/20230113144949sausage.jpg', 'images/profile_picture/20230113144949sausage.jpg'),
(32, 'images/profile_picture/20230113145454sausage.jpg', 'images/profile_picture/20230113145454sausage.jpg'),
(33, 'images/profile_picture/20230116160000download.jfif', 'images/profile_picture/20230116160000download.jfif'),
(34, 'images/profile_picture/20230117153232R.jfif', 'images/profile_picture/20230117153232R.jfif'),
(35, 'images/profile_picture/20230118151212会场1QR code.png', 'images/profile_picture/20230118151212会场1QR code.png'),
(36, 'images/profile_picture/20230118175757sausage.jpg', 'images/profile_picture/20230118175757sausage.jpg'),
(37, 'images/profile_picture/20230118180101sausage.jpg', 'images/profile_picture/20230118180101sausage.jpg'),
(38, 'images/profile_picture/2023011908090920220607141703.jpg', 'images/profile_picture/2023011908090920220607141703.jpg'),
(39, 'images/profile_picture/2023011911000020220607141703.jpg', 'images/profile_picture/20230119110000man.jpg'),
(40, 'images/profile_picture/20230119151717sausage.jpg', 'images/profile_picture/20230119151717sausage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `acc_status_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
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

INSERT INTO `users` (`id`, `name`, `role_id`, `acc_status_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 3, 1, 'superadmin@email.com', NULL, '$2y$10$v.Vu8Thay4FsuMgqCsHU8OY7/LBAngr522t38EOViqWo9VrcIxNXO', NULL, '2023-01-05 07:16:56', '2023-01-05 07:16:56'),
(2, 'Local Student', 1, 1, 'localstudent@email.com', NULL, '$2y$10$.QcHWlPbZwagZ7uUUEj7seLYT17bmIHpSz5GJl9DJfbl0nUBihPGm', NULL, '2023-01-05 07:35:55', '2023-01-05 07:35:55'),
(3, 'aohfdos9af', 1, 1, 'user@email.com', NULL, '$2y$10$3jRrazjIu1AtLZlm9g7cqeDkpbxYEUkIAj6VF0QpVzLisp/LFWZX.', '74G9NzLHaQgfJz0i8WLXJn42HWpiDevi8H2Gg1ook2fpCMlpomQsJd937IsB', '2023-01-09 06:47:37', '2023-01-09 06:47:37'),
(6, 'sdfasdfsf', 1, 1, 'zhong@sc.edu.my', NULL, '$2y$10$3/giSQ4OVuuQBI3KGDw4c.nx63ZmE5VxU14W69Fiwrot35m2LFN1C', '45UX0EnoukcWksiMHz6IEs6T2Hy8QGKwwbpsx3egOlTgGEgdvqNs18BxQM6j', '2023-01-10 07:14:51', '2023-01-10 07:14:51'),
(7, 'User Test 1', 1, 1, 'user_test@email.com', NULL, '$2y$10$nEeMFHPExd74ATnV3hoJIOYsvJnlfcrO1wxyBUXkB7Wr2ud/bi5uC', NULL, '2023-01-11 02:18:42', '2023-01-11 02:18:42'),
(8, 'abc', 1, 1, 'iasdibf@email.com', NULL, '$2y$10$1YEnUqOiWNvotifeNGXi../ETjigzbMdWr0U/DiJwfheLLWZxCO82', NULL, '2023-01-11 03:28:29', '2023-01-11 03:28:29'),
(9, '12345678', 1, 1, '12345@123.com', NULL, '$2y$10$BJhL8tO78AtddxXC8t.opeG7SGbE3ozl7JjSUXeEpoO.3oHSvSvkq', NULL, '2023-01-13 02:02:14', '2023-01-13 02:02:14'),
(10, 'usertest2', 1, 1, 'usertest2@email.com', NULL, '$2y$10$UtzPE1Rjf1Bj2Uu2Bb.PGupPgi3fuoSExPn/Mw3k7PRtftlMpyiji', 'R305ZPUQOi3141biq1v2skbZsHxNTvQPJnKov865LUjZm9LpnfIGdGdehgL3', '2023-01-13 03:22:18', '2023-01-13 03:22:18'),
(11, 'usertest3', 1, 1, 'abcc@email.com', NULL, '$2y$10$Q15GmbO2SrNPKGyhmuwvZeIIZaoQqLxzoCYtJlWEDyminyvj1xKJa', NULL, '2023-01-13 03:28:47', '2023-01-13 03:28:47'),
(12, 'usertest4', 1, 1, 'usertest4@email.com', NULL, '$2y$10$r/dIrSuqoswIYShwRaLiGeJNqMwkRdaRvtsellgb7UDI0xT1Muaii', '9Q5hLy0gYgMgvgmSQctEqUiN1Wu5J8FA24Un7ZJjyuUBwcwBFnxphr7g8NkD', '2023-01-13 06:30:50', '2023-01-13 06:30:50'),
(14, 'usertest5', 1, 1, 'usertest5@email.com', NULL, '$2y$10$O7zJhL8ak2VkySPmG6Kdb.Yefcqbsq5DHjblSguEytjzu7uMXCAAG', 'cqgAd601OAHMYdVjXeVyXwUvUtZcDGxpCmRZ8aEtzcU2Hgnronu2YphfiKw0', '2023-01-13 06:52:03', '2023-01-13 06:52:03'),
(15, 'usertest6', 1, 1, 'user6@email.com', NULL, '$2y$10$DzzlbjinbyzWiDzcA55RY.NXYjD.n5H/Caj/82U/B9vK/5CjUlFmy', 'eoUJtaf9vncnfcEvxOBjsA27qfArpV8luaZLgHjiRLuHVJjzs5Jm2XwQ1BOm', '2023-01-13 08:35:58', '2023-01-13 08:35:58'),
(16, 'rubish', 1, 1, 'rubish@email.com', NULL, '$2y$10$DgaJS/xLjm1/2RNCEZVDo.OmFS4Z33a6wVXMTyQUtmPmYRW114iBK', NULL, '2023-01-15 23:59:39', '2023-01-15 23:59:39'),
(17, 'testpattern', 1, 1, 'testpattern@email.com', NULL, '$2y$10$O.S4s7j60WFzmW/4fguOJuRxX2Y6Kzgjr/Cn0xsOXwf6Cq2KZ.JD6', NULL, '2023-01-16 01:40:50', '2023-01-16 01:40:50'),
(18, 'error', 1, 1, 'error@email.com', NULL, '$2y$10$/IR1szY4NNNbyTTw5OedReVfd7xBPS.bg2KQ19FGvFPh0TmF7T5XS', NULL, '2023-01-16 02:08:43', '2023-01-16 02:08:43'),
(19, 'test10', 1, 1, 'ongziheng@sc.edu.my', NULL, '$2y$10$CVtTKtnRtkKw1/T6aBtLWOWTMPqCvtRJ7vBSkW3Xxxy7ZmFKX6ZcO', '5q3vNydSg1jr24rmw65ZGAZgvwQaUdTiQbTXVkixFUkiXXOi9vSFi2bXIm91', '2023-01-16 06:59:38', '2023-01-16 06:59:38'),
(21, 'stf9832', 1, 1, 'stf9832@sc.edu.my', NULL, '$2y$10$IoKZRC9Jjxcq05VMVUn4KuoRstUX2lIwhcNAqItcx4S1rvzxHgfja', NULL, '2023-01-17 02:13:39', '2023-01-17 02:13:39'),
(24, 'test11', 1, 1, 'test11@email.com', NULL, '$2y$10$7gQy.Ss5opPDJMyN.hBqjewNGaeDO9EkgWk6WROJt2pm4aQu7tDK6', NULL, '2023-01-17 04:20:59', '2023-01-17 04:20:59'),
(25, 'jack', 1, 1, 'jack1999@hotmail.com', NULL, '$2y$10$yA9uVSFSXZN3As8g4652qupiOwOg1z3GxoKE9on8McDzlPVIKI9Ty', 'OVbifLaw4XPikkG8HOr6qidoMSDhtrqOXM9zuPoQyUvxprm0rC0ev53xBOIr', '2023-01-17 07:01:46', '2023-01-17 07:01:46'),
(26, 'Usertest', 1, 1, 'user123123@email.com', NULL, '$2y$10$KPDB87jnCcCtkHqcaVLo6eWXOXgBAIP6Z15xVfh.p2tIiZwVaERaq', NULL, '2023-01-18 00:03:23', '2023-01-18 00:03:23'),
(27, 'TestSelectTwoUser', 1, 1, 'selecttwo@email.com', NULL, '$2y$10$xB9/g4/DyCXs3MwIR2N3fudyCPRAvESUNBmKFc6PGaybCzWQRKrvm', NULL, '2023-01-18 06:37:17', '2023-01-18 06:37:17'),
(28, 'test200', 1, 1, 'test200@gmail.com', NULL, '$2y$10$zAg5ttZy6abBH50/tcnW3OpHddfwpMg9MSyZfhnaHTJBRofK6OfYW', NULL, '2023-01-18 07:02:39', '2023-01-18 07:02:39'),
(29, 'test199', 1, 1, 'test199@gmail.com', NULL, '$2y$10$nbn4wYgiD6lwU2/KDM.0E.dGSdlShha2OEMEy/6.Bua2j3RR34XHC', NULL, '2023-01-18 09:06:21', '2023-01-18 09:06:21'),
(30, '123', 1, 1, '123@email.com', NULL, '$2y$10$7paBnS7B6WiRheHgAGZXpOjCvtEZfqnMdS1aVxeMZ7MNNJY.lAB.m', NULL, '2023-01-19 02:52:02', '2023-01-19 02:52:02'),
(31, 'Gan Yu Xun', 1, 1, 'ganyuxun@outlook.com', NULL, '$2y$10$knVlQ.BnIiO2ZrYQa01SduF9dYjQvcDAzjVjdtKqMRjwSNqJRY85C', NULL, '2023-01-19 04:44:21', '2023-01-19 04:44:21'),
(32, 'zsdg', 1, 1, 'asdfg@email.com', NULL, '$2y$10$PUH8cIcYrvRniPGPxTdhBu5g513xhYGzwi8dLMziexIZ3U3V9gwoG', NULL, '2023-01-19 05:20:34', '2023-01-19 05:20:34'),
(33, 'Gan Yu Xun', 1, 1, 'ganyuxcun@outlook.com', NULL, '$2y$10$DDKlarQ4a/5LqwYFQlCeWOlnGe/fMLV/.mWqGCwF6y/bcYCndpq0i', NULL, '2023-01-19 07:13:34', '2023-01-19 07:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ch_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_h` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_hp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `en_name`, `ch_name`, `ic`, `email`, `tel_h`, `tel_hp`) VALUES
(1, 'Local Student', NULL, '021119-21-0445', 'superadmin@email.com', '0123456789', '0123456789'),
(2, 'Local Student', NULL, '12ABC123ABC921273', 'superadmin@email.com', NULL, '0123456789'),
(3, 'Local Student EC1', NULL, NULL, NULL, NULL, '0123465798'),
(4, 'Superadmin ec2', NULL, NULL, NULL, NULL, '0123456789'),
(5, 'joashjdo', NULL, '12345-00-1234', 'zhong@sc.edu.my', '07913145646', '0123456789'),
(6, 'joashjdo', NULL, '12345-00-1234', 'abcc@email.com', NULL, '0123456789'),
(7, 'person1', NULL, NULL, NULL, NULL, '0123456789'),
(8, 'Person2', NULL, NULL, NULL, NULL, '0123456789'),
(9, 'xiao ming', NULL, '800808-01-0088', 'user_test@email.com', '012-3456789', '012-3456789'),
(10, 'Xiao Qing', NULL, '900906-01-0096', 'xiaoqing123@email.com', NULL, '012-3456789'),
(11, 'Xiao Long Nv', NULL, NULL, NULL, NULL, '012-3456789'),
(12, 'guo er', NULL, NULL, NULL, NULL, '012-3456789'),
(13, 'xiao ming', NULL, '800808-01-0088', 'user_test@email.com', '012-3456789', '012-3456789'),
(14, 'Xiao Qing', NULL, '800808-01-0088', 'xiaoqing123@email.com', NULL, '012-3456789'),
(15, 'Xiao Long Nv', NULL, NULL, NULL, NULL, '012-3456789'),
(16, 'guo er', NULL, NULL, NULL, NULL, '012-3456789'),
(17, 'xiao ming', NULL, '800808-01-0088', 'user_test@email.com', '012-3456789', '012-3456789'),
(18, 'person1', NULL, NULL, NULL, NULL, '0123456789'),
(19, 'Person2', NULL, NULL, NULL, NULL, '0123456789'),
(20, 'John Cena', NULL, '999990-21-1234', 'abcc@email.com', '07913145646', '0123456789'),
(21, 'John Big', NULL, '123455-00-1234', 'abcc@email.com', NULL, '0123456789'),
(22, 'person1', NULL, NULL, NULL, NULL, '0123456789'),
(23, 'Person2', NULL, NULL, NULL, NULL, '0123456789'),
(24, 'joashjdo', NULL, '123455-00-1234', 'abcc@email.com', '07913145646', '0123456789'),
(25, 'joashjdo', NULL, '123455-00-1234', 'abcc@email.com', NULL, '0123456789'),
(26, 'person1', NULL, NULL, NULL, NULL, '0123456789'),
(27, 'Person2', NULL, NULL, NULL, NULL, '0123456789'),
(28, 'joashjdo', NULL, '123455-00-1234', 'abcc@email.com', '07913145646', '0123456789'),
(29, 'joashjdo', NULL, '123455-00-1234', 'abcc@email.com', NULL, '0123456789'),
(30, 'person1', NULL, NULL, NULL, NULL, '0123456789'),
(31, 'Person2', NULL, NULL, NULL, NULL, '0123456789'),
(32, 'joashjdo', NULL, '123455-00-1234', 'abcc@email.com', '07913145646', '0123456789'),
(33, 'joashjdo', NULL, '123455-00-1234', 'stf9823@sc.edu.my', NULL, '0123456789'),
(34, 'person1', NULL, NULL, NULL, NULL, '0123456789'),
(35, 'Person2', NULL, NULL, NULL, NULL, '0123456789'),
(36, 'joashjdo', NULL, '123455-00-1234', 'abcc@email.com', '07913145646', '0123456789'),
(37, 'joashjdo', NULL, '123455-00-1234', 'abcc@email.com', NULL, '0123456789'),
(38, 'person1', NULL, NULL, NULL, NULL, '0123456789'),
(39, 'Person2', NULL, NULL, NULL, NULL, '0123456789'),
(40, '@#(*@*T$^*!(&@(@$', NULL, '123455-00-1234', 'abcc@email.com', '07913145646', '0123456789'),
(41, '@#(*@*T$^*!(&@(@$', NULL, '123455-00-1234', 'abcc@email.com', NULL, '0123456789'),
(42, 'person1', NULL, NULL, NULL, NULL, '0123456789'),
(43, 'Person2', NULL, NULL, NULL, NULL, '0123456789'),
(44, 'Superadmin', '李一凢', NULL, 'superadmin@email.com', '012-3456789', '012-3456789'),
(45, 'Superadmin', '李一凢', '021119-01-0445', 'superadmin@email.com', NULL, '012-3456789'),
(46, 'Lee yi fan ec 1', NULL, NULL, NULL, NULL, '0123456789'),
(47, 'Lee yi fan ec 2', NULL, NULL, NULL, NULL, '0123456789'),
(48, 'Superadmin', NULL, '021119-91-1233', 'superadmin@email.com', '0123456789', '0123456789'),
(49, 'Superadmin Mother', NULL, '021110-01-0445', 'superadmin@email.com', NULL, '0179936050'),
(50, 'Lee yi fan ec 1', NULL, NULL, NULL, NULL, '0123456789'),
(51, 'Lee yi fan ec 2', NULL, NULL, NULL, NULL, '0123456789'),
(52, 'Superadmin', '李一凢', '1234567890', 'superadmin@email.com', '0123456789', '0123456789'),
(53, 'Superadmin', '李一凢', '021119-01-0445', 'superadmin@email.com', NULL, '0123456789'),
(54, 'Ong Zi Heng', NULL, '991234-01-9999', 'test1@em', '0712345678', '0123456789'),
(55, 'Ong Zi Heng', NULL, '991234-01-9999', 'test1@email.com', NULL, '0123456789'),
(56, 'me father', NULL, NULL, NULL, NULL, '0123456789'),
(57, 'me mother', NULL, NULL, NULL, NULL, '0123456789'),
(58, 'chia', NULL, '970726-01-5999', 'stf9832@sc.edu.my', NULL, '0166920346'),
(59, 'chia', NULL, '970726-01-5888', 'stf9832@sc.edu.my', NULL, '0166920346'),
(60, 'chia', NULL, NULL, NULL, NULL, '0166920346'),
(61, 'chia', NULL, NULL, NULL, NULL, '0166920346'),
(62, 'test', NULL, '999999-00-1234', 'abcc@email.com', '07913145646', '0123456789'),
(63, 'joashjdo', NULL, '123455-00-1234', 'abcc@email.com', NULL, '0123456789'),
(64, 'person1', NULL, NULL, NULL, NULL, '0123456789'),
(65, 'Person2', NULL, NULL, NULL, NULL, '0123456789'),
(66, 'Jack Jone', NULL, '850605-01-9999', 'jack1999@hotmail.com', '0712345690', '01234567890'),
(67, 'Jack Mother', NULL, '123456-05-4553', 'jack1999@hotmail.com', NULL, '01234567890'),
(68, 'Jack Father', NULL, NULL, NULL, NULL, '0123456789'),
(69, 'Jack Mother', NULL, NULL, NULL, NULL, '01234567890'),
(70, 'user', '用户', '808080-00-0088', 'user123123@email.com', '01234567890', '01234567789'),
(71, 'mother', '母亲', '12ABC123ABC921273', 'mother@ermial.com', NULL, '0123456789'),
(72, 'Lee yi fan ec 1', NULL, NULL, NULL, NULL, '0123456789'),
(73, 'Superadmin ec2', NULL, NULL, NULL, NULL, '0123456789'),
(74, 'Superadmin', NULL, '021123-01-0088', 'superadmin@email.com', NULL, '0123456789'),
(75, 'Lee yi fan ec 1', NULL, NULL, NULL, NULL, '0123456789'),
(76, 'Lee yi fan ec 2', NULL, NULL, NULL, NULL, '0123456789'),
(77, 'Second User', NULL, '021119-21-0456', 'selecttwo@email.com', NULL, '0123456789'),
(78, 'Mother', '管理员', '021119-21-2318', 'localstudent@email.com', NULL, '0123456789'),
(79, 'Lee yi fan ec 1', NULL, NULL, NULL, NULL, '0123456789'),
(80, 'Lee yi fan ec 2', NULL, NULL, NULL, NULL, '0123456789'),
(81, 'John Doe', NULL, '880888-08-8888', 'test200@gmail.com', '0712031200', '0161234567890'),
(82, 'Mary Doe', NULL, '770777-07-7777', 'mary@gmail.com', NULL, '01234567890'),
(83, 'Jane doe', NULL, NULL, NULL, NULL, '01234656789'),
(84, 'John Doe', NULL, NULL, NULL, NULL, '0123456789'),
(85, 'joashjdo', NULL, '123455-00-1234', 'abcc@email.com', '07913145646', '0123456789'),
(86, 'joashjdo', NULL, '123455-00-1234', 'abcc@email.com', NULL, '0123456789'),
(87, 'person1', NULL, NULL, NULL, NULL, '0123456789'),
(88, 'Person2', NULL, NULL, NULL, NULL, '0123456789'),
(89, 'Superadmin', '李一凢', '021119-01-0445', 'superadmin@email.com', '0123456789', '0123456789'),
(90, 'Superadmin Mother', NULL, '021119-01-0445', 'superadmin@email.com', NULL, '0123456789'),
(91, 'Lee yi fan ec 1', NULL, NULL, NULL, NULL, '0123456789'),
(92, 'Lee yi fan ec 2', NULL, NULL, NULL, NULL, '0123456789'),
(93, 'gan', NULL, '990131-01-5068', 'ganyuxcun@outlook.com', '234523', '234523'),
(94, 'gan', NULL, '990131-01-5068', 'ganyuxcun@outlook.com', NULL, '234523'),
(95, '12341234', NULL, NULL, NULL, NULL, '12341234'),
(96, '12341234', NULL, NULL, NULL, NULL, '123412343412');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_records`
--
ALTER TABLE `academic_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academic_records_application_record_id_foreign` (`application_record_id`),
  ADD KEY `academic_records_school_level_id_foreign` (`school_level_id`);

--
-- Indexes for table `academic_transcripts`
--
ALTER TABLE `academic_transcripts`
  ADD KEY `academic_transcripts_academic_records_id_foreign` (`academic_records_id`),
  ADD KEY `academic_transcripts_school_transcript_id_foreign` (`school_transcript_id`),
  ADD KEY `academic_transcripts_school_levels_id_foreign` (`school_levels_id`);

--
-- Indexes for table `acc_statuses`
--
ALTER TABLE `acc_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_country_id_foreign` (`country_id`);

--
-- Indexes for table `address_mappings`
--
ALTER TABLE `address_mappings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_mappings_user_detail_id_foreign` (`user_detail_id`),
  ADD KEY `address_mappings_address_id_foreign` (`address_id`),
  ADD KEY `address_mappings_address_type_id_foreign` (`address_type_id`);

--
-- Indexes for table `address_types`
--
ALTER TABLE `address_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_guardian_lists`
--
ALTER TABLE `applicant_guardian_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_guardian_lists_applicant_profile_id_foreign` (`applicant_profile_id`),
  ADD KEY `applicant_guardian_lists_guardian_detail_id_foreign` (`guardian_detail_id`);

--
-- Indexes for table `applicant_profiles`
--
ALTER TABLE `applicant_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_profiles_gender_id_foreign` (`gender_id`),
  ADD KEY `applicant_profiles_marital_id_foreign` (`marital_id`),
  ADD KEY `applicant_profiles_race_id_foreign` (`race_id`),
  ADD KEY `applicant_profiles_nationality_id_foreign` (`nationality_id`),
  ADD KEY `applicant_profiles_religion_id_foreign` (`religion_id`),
  ADD KEY `applicant_profiles_user_detail_id_foreign` (`user_detail_id`);

--
-- Indexes for table `applicant_profile_pictures`
--
ALTER TABLE `applicant_profile_pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_profile_pictures_applicant_profile_id_foreign` (`applicant_profile_id`);

--
-- Indexes for table `application_records`
--
ALTER TABLE `application_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_records_user_id_foreign` (`user_id`),
  ADD KEY `application_records_applicant_profile_id_foreign` (`applicant_profile_id`);

--
-- Indexes for table `application_statuses`
--
ALTER TABLE `application_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_status_logs`
--
ALTER TABLE `application_status_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_status_logs_user_id_foreign` (`user_id`),
  ADD KEY `application_status_logs_application_record_id_foreign` (`application_record_id`),
  ADD KEY `application_status_logs_application_status_id_foreign` (`application_status_id`);

--
-- Indexes for table `choice_priorities`
--
ALTER TABLE `choice_priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `diseases_name_unique` (`name`);

--
-- Indexes for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emergency_contacts_guardian_relationship_id_foreign` (`guardian_relationship_id`),
  ADD KEY `emergency_contacts_user_detail_id_foreign` (`user_detail_id`);

--
-- Indexes for table `emergency_contact_lists`
--
ALTER TABLE `emergency_contact_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emergency_contact_lists_applicant_profile_id_foreign` (`applicant_profile_id`),
  ADD KEY `emergency_contact_lists_emergency_contact_id_foreign` (`emergency_contact_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardian_details`
--
ALTER TABLE `guardian_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guardian_details_income_id_foreign` (`income_id`),
  ADD KEY `guardian_details_guardian_relationship_id_foreign` (`guardian_relationship_id`),
  ADD KEY `guardian_details_nationality_id_foreign` (`nationality_id`),
  ADD KEY `guardian_details_user_detail_id_foreign` (`user_detail_id`);

--
-- Indexes for table `guardian_relationships`
--
ALTER TABLE `guardian_relationships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_mappings`
--
ALTER TABLE `ic_mappings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ic_mappings_supporting_documents_id_foreign` (`supporting_documents_id`),
  ADD KEY `ic_mappings_user_details_id_foreign` (`user_details_id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maritals`
--
ALTER TABLE `maritals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_application_record_id_foreign` (`application_record_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programmes_programme_levels_id_foreign` (`programme_levels_id`),
  ADD KEY `programmes_programme_types_id_foreign` (`programme_types_id`);

--
-- Indexes for table `programme_levels`
--
ALTER TABLE `programme_levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programme_levels_programme_levels_unique` (`programme_levels`);

--
-- Indexes for table `programme_picked`
--
ALTER TABLE `programme_picked`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programme_picked_application_records_id_foreign` (`application_records_id`),
  ADD KEY `programme_picked_programme_records_id_foreign` (`programme_records_id`),
  ADD KEY `programme_picked_choice_priorities_id_foreign` (`choice_priorities_id`);

--
-- Indexes for table `programme_records`
--
ALTER TABLE `programme_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programme_records_semester_year_mappings_id_foreign` (`semester_year_mappings_id`),
  ADD KEY `programme_records_programmes_id_foreign` (`programmes_id`);

--
-- Indexes for table `programme_types`
--
ALTER TABLE `programme_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programme_types_programme_types_unique` (`programme_types`);

--
-- Indexes for table `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `school_levels`
--
ALTER TABLE `school_levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_levels_name_unique` (`name`);

--
-- Indexes for table `school_transcripts`
--
ALTER TABLE `school_transcripts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester_year_mappings`
--
ALTER TABLE `semester_year_mappings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semester_year_mappings_semesters_id_foreign` (`semesters_id`);

--
-- Indexes for table `status_of_healths`
--
ALTER TABLE `status_of_healths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_of_healths_application_record_id_foreign` (`application_record_id`),
  ADD KEY `status_of_healths_disease_id_foreign` (`disease_id`);

--
-- Indexes for table `supporting_documents`
--
ALTER TABLE `supporting_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_acc_status_id_foreign` (`acc_status_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_records`
--
ALTER TABLE `academic_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `acc_statuses`
--
ALTER TABLE `acc_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `address_mappings`
--
ALTER TABLE `address_mappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `address_types`
--
ALTER TABLE `address_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicant_guardian_lists`
--
ALTER TABLE `applicant_guardian_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `applicant_profiles`
--
ALTER TABLE `applicant_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `applicant_profile_pictures`
--
ALTER TABLE `applicant_profile_pictures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `application_records`
--
ALTER TABLE `application_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `application_statuses`
--
ALTER TABLE `application_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `application_status_logs`
--
ALTER TABLE `application_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `choice_priorities`
--
ALTER TABLE `choice_priorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `emergency_contact_lists`
--
ALTER TABLE `emergency_contact_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guardian_details`
--
ALTER TABLE `guardian_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `guardian_relationships`
--
ALTER TABLE `guardian_relationships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ic_mappings`
--
ALTER TABLE `ic_mappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `maritals`
--
ALTER TABLE `maritals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `programme_levels`
--
ALTER TABLE `programme_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `programme_picked`
--
ALTER TABLE `programme_picked`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `programme_records`
--
ALTER TABLE `programme_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `programme_types`
--
ALTER TABLE `programme_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `races`
--
ALTER TABLE `races`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `school_levels`
--
ALTER TABLE `school_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `school_transcripts`
--
ALTER TABLE `school_transcripts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semester_year_mappings`
--
ALTER TABLE `semester_year_mappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_of_healths`
--
ALTER TABLE `status_of_healths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;

--
-- AUTO_INCREMENT for table `supporting_documents`
--
ALTER TABLE `supporting_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_records`
--
ALTER TABLE `academic_records`
  ADD CONSTRAINT `academic_records_school_level_id_foreign` FOREIGN KEY (`school_level_id`) REFERENCES `school_levels` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `academic_records_application_record_id_foreign` FOREIGN KEY (`application_record_id`) REFERENCES `application_records` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `academic_transcripts`
--
ALTER TABLE `academic_transcripts`
  ADD CONSTRAINT `academic_transcripts_school_levels_id_foreign` FOREIGN KEY (`school_levels_id`) REFERENCES `school_levels` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `academic_transcripts_academic_records_id_foreign` FOREIGN KEY (`academic_records_id`) REFERENCES `academic_records` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `academic_transcripts_school_transcript_id_foreign` FOREIGN KEY (`school_transcript_id`) REFERENCES `school_transcripts` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `address_mappings`
--
ALTER TABLE `address_mappings`
  ADD CONSTRAINT `address_mappings_address_type_id_foreign` FOREIGN KEY (`address_type_id`) REFERENCES `address_types` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `address_mappings_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `address_mappings_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `applicant_guardian_lists`
--
ALTER TABLE `applicant_guardian_lists`
  ADD CONSTRAINT `applicant_guardian_lists_guardian_detail_id_foreign` FOREIGN KEY (`guardian_detail_id`) REFERENCES `guardian_details` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_guardian_lists_applicant_profile_id_foreign` FOREIGN KEY (`applicant_profile_id`) REFERENCES `applicant_profiles` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `applicant_profiles`
--
ALTER TABLE `applicant_profiles`
  ADD CONSTRAINT `applicant_profiles_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_profiles_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_profiles_marital_id_foreign` FOREIGN KEY (`marital_id`) REFERENCES `maritals` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_profiles_nationality_id_foreign` FOREIGN KEY (`nationality_id`) REFERENCES `nationalities` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_profiles_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_profiles_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `religions` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `applicant_profile_pictures`
--
ALTER TABLE `applicant_profile_pictures`
  ADD CONSTRAINT `applicant_profile_pictures_applicant_profile_id_foreign` FOREIGN KEY (`applicant_profile_id`) REFERENCES `applicant_profiles` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `application_records`
--
ALTER TABLE `application_records`
  ADD CONSTRAINT `application_records_applicant_profile_id_foreign` FOREIGN KEY (`applicant_profile_id`) REFERENCES `applicant_profiles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `application_records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `application_status_logs`
--
ALTER TABLE `application_status_logs`
  ADD CONSTRAINT `application_status_logs_application_status_id_foreign` FOREIGN KEY (`application_status_id`) REFERENCES `application_statuses` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `application_status_logs_application_record_id_foreign` FOREIGN KEY (`application_record_id`) REFERENCES `application_records` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `application_status_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD CONSTRAINT `emergency_contacts_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `emergency_contacts_guardian_relationship_id_foreign` FOREIGN KEY (`guardian_relationship_id`) REFERENCES `guardian_relationships` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `emergency_contact_lists`
--
ALTER TABLE `emergency_contact_lists`
  ADD CONSTRAINT `emergency_contact_lists_emergency_contact_id_foreign` FOREIGN KEY (`emergency_contact_id`) REFERENCES `emergency_contacts` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `emergency_contact_lists_applicant_profile_id_foreign` FOREIGN KEY (`applicant_profile_id`) REFERENCES `applicant_profiles` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `guardian_details`
--
ALTER TABLE `guardian_details`
  ADD CONSTRAINT `guardian_details_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `guardian_details_guardian_relationship_id_foreign` FOREIGN KEY (`guardian_relationship_id`) REFERENCES `guardian_relationships` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `guardian_details_income_id_foreign` FOREIGN KEY (`income_id`) REFERENCES `incomes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `guardian_details_nationality_id_foreign` FOREIGN KEY (`nationality_id`) REFERENCES `nationalities` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ic_mappings`
--
ALTER TABLE `ic_mappings`
  ADD CONSTRAINT `ic_mappings_user_details_id_foreign` FOREIGN KEY (`user_details_id`) REFERENCES `user_details` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ic_mappings_supporting_documents_id_foreign` FOREIGN KEY (`supporting_documents_id`) REFERENCES `supporting_documents` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_application_record_id_foreign` FOREIGN KEY (`application_record_id`) REFERENCES `application_records` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `programmes`
--
ALTER TABLE `programmes`
  ADD CONSTRAINT `programmes_programme_types_id_foreign` FOREIGN KEY (`programme_types_id`) REFERENCES `programme_types` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `programmes_programme_levels_id_foreign` FOREIGN KEY (`programme_levels_id`) REFERENCES `programme_levels` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `programme_picked`
--
ALTER TABLE `programme_picked`
  ADD CONSTRAINT `programme_picked_choice_priorities_id_foreign` FOREIGN KEY (`choice_priorities_id`) REFERENCES `choice_priorities` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `programme_picked_application_records_id_foreign` FOREIGN KEY (`application_records_id`) REFERENCES `application_records` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `programme_picked_programme_records_id_foreign` FOREIGN KEY (`programme_records_id`) REFERENCES `programme_records` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `programme_records`
--
ALTER TABLE `programme_records`
  ADD CONSTRAINT `programme_records_programmes_id_foreign` FOREIGN KEY (`programmes_id`) REFERENCES `programmes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `programme_records_semester_year_mappings_id_foreign` FOREIGN KEY (`semester_year_mappings_id`) REFERENCES `semester_year_mappings` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `semester_year_mappings`
--
ALTER TABLE `semester_year_mappings`
  ADD CONSTRAINT `semester_year_mappings_semesters_id_foreign` FOREIGN KEY (`semesters_id`) REFERENCES `semesters` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `status_of_healths`
--
ALTER TABLE `status_of_healths`
  ADD CONSTRAINT `status_of_healths_disease_id_foreign` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `status_of_healths_application_record_id_foreign` FOREIGN KEY (`application_record_id`) REFERENCES `application_records` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_acc_status_id_foreign` FOREIGN KEY (`acc_status_id`) REFERENCES `acc_statuses` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
