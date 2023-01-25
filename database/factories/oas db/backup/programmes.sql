-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 02:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` bigint(20) UNSIGNED NnullT 1,
  `en_name` varchar(255) NnullT 1,
  `programme_level_id` bigint(20) UNSIGNED NnullT 1,
  `programme_type_id` bigint(20) UNSIGNED NnullT 1,
  `status` int(11) NnullT 1 DEFAULT 1,
  `created_at` timestanullp 1 DEFAUnullT 1,
  `updated_at` timestanullp 1 DEFAUnullT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `en_name`, `programme_level_id`, `programme_type_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Diploma in Accountancy', 4, 1, 1, '2023-01-19 12:45:24', '2023-01-19 13:32:02'),
(2, 'Diploma in Business Administration', 4, 1, 1, '2023-01-19 13:32:35', '2023-01-19 13:32:35'),
(3, 'Diploma in Marketing', 4, 1, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programmes_programme_level_id_foreign` (`programme_level_id`),
  ADD KEY `programmes_programme_type_id_foreign` (`programme_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` bigint(20) UNSIGNED NnullT 1 AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `programmes`
--
ALTER TABLE `programmes`
  ADD CONSTRAINT `programmes_programme_level_id_foreign` FOREIGN KEY (`programme_level_id`) REFERENCES `programme_levels` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `programmes_programme_type_id_foreign` FOREIGN KEY (`programme_type_id`) REFERENCES `programme_types` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


INSERT INTO `programmes` (`id`, `en_name`, `programme_level_id`, `programme_type_id`, `programme_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Diploma in Accountancy', 4, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(2, 'Diploma in Business Administration', 4, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(3, 'Diploma in Marketing', 4, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(4, 'Diploma in Logistics Management', 4, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(5, 'Bachelor of Business Administration (Honours) in Finance & Investment', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(6, 'Bachelor of Business Administration (Honours) in Marketing', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(7, 'Bachelor in Accounting (Honours)', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(8, 'Diploma in Information Technology', 4, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(9, 'Diploma in Electrical & Electronic Engineering', 4, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(10, 'Bachelor of Software Engineering (Honours)', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(11, 'Bachelor of Electronic Engineering with Honours', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(12, 'Diploma in Industrial Design', 4, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(13, 'Diploma in Advertising Design', 4, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(14, 'Diploma in Multimedia Design', 4, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(15, 'Bachelor of Design (Honours) Computer Graphic Design', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(16, 'Diploma in Chinese Studies', 4, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(17, 'Bachelor of Arts (Honours) Chinese Studies', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(18, 'Bachelor of Arts (Honours) English Language Teaching', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(19, 'Bachelor of Communication (Honours) (Mass Communication)', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(20, 'Foundation In Traditional Chinese Medicine', 5, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(21, 'Foundation in Arts', 5, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(22, 'Diploma in Early Childhood Education', 4, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(23, 'Bachelor of Business Administration (Honours)', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(24, 'Master of Business Administration', 2, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(25, 'Bachelor of Business Administration (Honours) in Tourism Management', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(26, 'Bachelor of Business Administration (Honours) in H', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(27, 'Master of Arts in Chinese Studies', 2, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(28, 'Bachelor of Traditional Chinese Medicine (Honours)', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(29, 'Bachelor of Psychology (Honours)', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(30, 'Bachelor of Early Childhood Education (Honours)', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(31, 'Bachelor of Education (Honours) Guidance and Counselling', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(32, 'Master of Communication', 2, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(33, 'Doctor of Philosophy (Business Administration)', 1, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(34, 'Professional Certificate in Aesthetic Treatments & Body Therapy', 6, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(35, 'Professional Certificate in Hairdressing & Hair Design', 6, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(36, 'Diploma in Unreal Engine VR Architecture', 6, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(37, 'Executive Diploma in Tourism Management', 7, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(38, 'Executive Diploma in Industrial Design', 7, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(39, 'Executive Diploma in Visual Art', 7, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(40, 'Executive Diploma in Advertising Design', 7, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(41, 'Executive Diploma in Multimedia Design', 7, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(42, 'Executive Diploma in Early Childhood Education', 7, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(43, 'Executive Diploma in Business Administration', 7, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(44, 'Executive Diploma in Marketing', 7, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(45, 'Executive Diploma in Logistics Management', 7, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(46, 'Executive Diploma in Chinese Studies', 7, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(47, 'Executive Diploma in English', 7, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(48, 'Executive Diploma in Journalism', 7, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(49, 'Executive Diploma in Information Technology', 7, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(50, 'Executive Diploma in Computer Science', 7, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(51, 'Executive Diploma in Electrical & Electronic Engineering', 7, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(52, 'Doctor of Philosophy (Chinese Studies)', 1, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(53, 'Bachelor of Design (Honours) Industrial Design', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(54, 'Bachelor of Property Management (Honours)', 3, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(55, 'Master of Science in Computer Science', 2, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(56, 'Foundation in Science', 5, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(57, 'Doctor of Business Administration', 1, 1, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(58, 'Master of Science in Computer Science - Part Time', 2, 2, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(59, 'Master of Communication - Part Time', 2, 2, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(60, 'Master of Business Administration - Part Time', 2, 2, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(61, 'Master of Arts in Chinese Studies - Part Time', 2, 2, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(62, 'M.A in Chinese Studies - Part Time', 2, 2, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(63, 'Doctor of Philosophy (Chinese Studies) - Part Time', 1, 2, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(65, 'Doctor of Philosophy (Business Administration) - Part Time', 1, 2, null, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00'),
(66, 'Doctor of Business Administration - Part Time', 1, 2, 1, '2023-01-19 13:35:00', '2023-01-19 13:35:00');