-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 06:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
  `school_name` varchar(255) DEFAULT NULL,
  `school_graduation` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `academic_transcripts`
--

CREATE TABLE `academic_transcripts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `academic_record_id` bigint(20) UNSIGNED NOT NULL,
  `supporting_document_id` bigint(20) UNSIGNED NOT NULL,
  `school_level_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acc_statuses`
--

CREATE TABLE `acc_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL
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
  `street1` text NOT NULL,
  `street2` text NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `address_types`
--

CREATE TABLE `address_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profiles`
--

CREATE TABLE `applicant_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `marital_id` bigint(20) UNSIGNED NOT NULL,
  `race_id` bigint(20) UNSIGNED NOT NULL,
  `nationality_id` bigint(20) UNSIGNED NOT NULL,
  `religion_id` bigint(20) UNSIGNED NOT NULL,
  `user_detail_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profile_pictures`
--

CREATE TABLE `applicant_profile_pictures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicant_profile_id` bigint(20) UNSIGNED NOT NULL,
  `path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profile_statuses`
--

CREATE TABLE `applicant_profile_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicant_profile_statuses`
--

INSERT INTO `applicant_profile_statuses` (`id`, `status`) VALUES
(1, 'Complete Personal Particulars'),
(2, 'Complete Parent/Guardian Particulars'),
(3, 'Complete Emergency Contact'),
(4, 'Complete Profile Picture');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_status_logs`
--

CREATE TABLE `applicant_status_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `applicant_profile_id` bigint(20) UNSIGNED NOT NULL,
  `applicant_profile_status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `application_statuses`
--

CREATE TABLE `application_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_statuses`
--

INSERT INTO `application_statuses` (`id`, `status`) VALUES
(1, 'Complete Program Selection'),
(2, 'Complete Academic Record'),
(3, 'Complete Status of Health'),
(4, 'Complete Agreement'),
(5, 'Complete Checking Draft'),
(6, 'Complete Submit Supporting Document'),
(7, 'Complete Submit Payment Slip');

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

-- --------------------------------------------------------

--
-- Table structure for table `choice_priorities`
--

CREATE TABLE `choice_priorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `choice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `choice_priorities`
--

INSERT INTO `choice_priorities` (`id`, `choice`) VALUES
(1, 'First choice'),
(2, 'Second choice'),
(3, 'Third choice');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
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
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
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

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contact_lists`
--

CREATE TABLE `emergency_contact_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicant_profile_id` bigint(20) UNSIGNED NOT NULL,
  `emergency_contact_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
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
  `occupation` varchar(255) DEFAULT NULL,
  `income_id` bigint(20) UNSIGNED NOT NULL,
  `guardian_relationship_id` bigint(20) UNSIGNED NOT NULL,
  `nationality_id` bigint(20) UNSIGNED NOT NULL,
  `user_detail_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guardian_relationships`
--

CREATE TABLE `guardian_relationships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `relationship_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
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
-- Table structure for table `identity_documents`
--

CREATE TABLE `identity_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_detail_id` bigint(20) UNSIGNED NOT NULL,
  `identity_document_type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `identity_document_pages`
--

CREATE TABLE `identity_document_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identity_document_id` bigint(20) UNSIGNED NOT NULL,
  `page` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `identity_document_types`
--

CREATE TABLE `identity_document_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `identity_document_types`
--

INSERT INTO `identity_document_types` (`id`, `type`) VALUES
(1, 'Identity card - Front'),
(2, 'Identity card - Back');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `range` varchar(255) NOT NULL,
  `income_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
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
  `name` varchar(255) NOT NULL,
  `marital_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
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
  `migration` varchar(255) NOT NULL,
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
(15, '2022_12_19_142854_create_diseases_table', 1),
(16, '2022_12_20_074244_create_user_details_table', 1),
(17, '2022_12_20_074652_create_applicant_profiles_table', 1),
(18, '2022_12_20_075119_create_application_records_table', 1),
(19, '2022_12_20_075334_create_applicant_profile_pictures_table', 1),
(20, '2022_12_20_075550_create_guardian_details_table', 1),
(21, '2022_12_20_075839_create_applicant_guardian_lists_table', 1),
(22, '2022_12_20_082058_create_emergency_contacts_table', 1),
(23, '2022_12_20_082238_create_emergency_contact_lists_table', 1),
(24, '2022_12_20_082427_create_application_statuses_table', 1),
(25, '2022_12_20_082545_create_application_status_logs_table', 1),
(26, '2022_12_21_003299_create_payments_table', 1),
(27, '2022_12_21_010641_create_academic_records_table', 1),
(28, '2022_12_21_010952_create_status_of_healths_table', 1),
(29, '2022_12_22_105838_create_countries_table', 1),
(30, '2022_12_22_105839_create_address_types_table', 1),
(31, '2022_12_22_105840_create_addresses_table', 1),
(32, '2022_12_22_105841_create_address_mappings_table', 1),
(33, '2023_01_19_152651_create_applicant_profile_statuses_table', 1),
(34, '2023_01_19_153022_create_applicant_status_logs_table', 1),
(35, '2023_01_19_154214_create_semesters_table', 1),
(36, '2023_01_19_154239_create_programme_levels_table', 1),
(37, '2023_01_19_154253_create_programme_types_table', 1),
(38, '2023_01_19_154254_create_choice_priorities_table', 1),
(39, '2023_01_19_154305_create_programmes_table', 1),
(40, '2023_01_19_154329_create_semester_year_mappings_table', 1),
(41, '2023_01_19_154356_create_programme_records_table', 1),
(42, '2023_01_19_154423_create_programme_pickeds_table', 1),
(43, '2023_01_19_161237_create_supporting_documents_table', 1),
(44, '2023_01_19_161258_create_academic_transcripts_table', 1),
(45, '2023_01_31_135818_create_identity_document_types_table', 2),
(46, '2023_01_31_140039_create_identity_documents_table', 2),
(47, '2023_02_01_152423_create_identity_document_pages_table', 2),
(48, '2023_02_02_094132_create_temporary_files_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nationality_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
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
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_record_id` bigint(20) UNSIGNED NOT NULL,
  `payment_slip` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_name` varchar(255) NOT NULL,
  `programme_level_id` bigint(20) UNSIGNED NOT NULL,
  `programme_type_id` bigint(20) UNSIGNED NOT NULL,
  `programme_code` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `en_name`, `programme_level_id`, `programme_type_id`, `programme_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Diploma in Accountancy', 4, 1, 'R2/344/4/0188', 1, '2023-01-18 13:35:00', '2023-01-19 11:02:34'),
(2, 'Diploma in Business Administration', 4, 1, 'R2/345/4/0418', 1, '2023-01-18 13:35:00', '2023-01-19 11:02:46'),
(3, 'Diploma in Marketing', 4, 1, 'R2/342/4/0135', 1, '2023-01-18 13:35:00', '2023-01-19 11:02:08'),
(4, 'Diploma in Logistics Management', 4, 1, 'R3/840/4/0034', 1, '2023-01-18 13:35:00', '2023-01-19 11:04:02'),
(5, 'Bachelor of Business Administration (Honours) in Finance & Investment', 3, 1, 'R/340/6/0246', 1, '2023-01-18 13:35:00', '2023-01-19 10:57:01'),
(6, 'Bachelor of Business Administration (Honours) in Marketing', 3, 1, 'R/342/6/0060', 1, '2023-01-18 13:35:00', '2023-01-19 10:58:10'),
(7, 'Bachelor in Accounting (Honours)', 3, 1, 'R/344/6/0152', 1, '2023-01-18 13:35:00', '2023-01-19 10:58:21'),
(8, 'Diploma in Information Technology', 4, 1, 'R2/482/4/0190', 1, '2023-01-18 13:35:00', '2023-01-19 11:02:57'),
(9, 'Diploma in Electrical & Electronic Engineering', 4, 1, 'R2/523/4/0308', 1, '2023-01-18 13:35:00', '2023-01-19 11:03:05'),
(10, 'Bachelor of Software Engineering (Honours)', 3, 1, 'R/481/6/0275', 1, '2023-01-18 13:35:00', '2023-01-19 10:58:57'),
(11, 'Bachelor of Electronic Engineering with Honours', 3, 1, 'R/523/6/0170', 1, '2023-01-18 13:35:00', '2023-01-19 10:59:07'),
(12, 'Diploma in Industrial Design', 4, 1, 'R3/214/4/0014', 1, '2023-01-18 13:35:00', '2023-01-19 11:03:12'),
(13, 'Diploma in Advertising Design', 4, 1, 'R3/214/4/0024', 1, '2023-01-18 13:35:00', '2023-01-19 11:03:21'),
(14, 'Diploma in Multimedia Design', 4, 1, 'R/213/4/0133', 1, '2023-01-18 13:35:00', '2023-01-19 10:55:11'),
(15, 'Bachelor of Design (Honours) Computer Graphic Design', 3, 1, 'R/213/6/0132', 1, '2023-01-18 13:35:00', '2023-01-19 10:55:24'),
(16, 'Diploma in Chinese Studies', 4, 1, 'R2/312/4/0036', 1, '2023-01-18 13:35:00', '2023-01-19 11:01:39'),
(17, 'Bachelor of Arts (Honours) Chinese Studies', 3, 1, 'R/224/6/0033', 1, '2023-01-18 13:35:00', '2023-01-19 10:56:02'),
(18, 'Bachelor of Arts (Honours) English Language Teaching', 3, 1, 'R/224/6/0026', 1, '2023-01-18 13:35:00', '2023-01-19 10:55:48'),
(19, 'Bachelor of Communication (Honours) (Mass Communication)', 3, 1, 'R/321/6/0080', 1, '2023-01-18 13:35:00', '2023-01-19 10:56:39'),
(20, 'Foundation In Traditional Chinese Medicine', 5, 1, 'R2/010/3/0309', 1, '2023-01-18 13:35:00', '2023-01-19 10:59:38'),
(21, 'Foundation in Arts', 5, 1, 'R/010/3/0126', 1, '2023-01-18 13:35:00', '2023-01-19 10:54:10'),
(22, 'Diploma in Early Childhood Education', 4, 1, 'R/143/4/0084', 1, '2023-01-18 13:35:00', '2023-01-19 10:54:38'),
(23, 'Bachelor of Business Administration (Honours)', 3, 1, 'R/340/6/0466', 1, '2023-01-18 13:35:00', '2023-01-19 10:57:34'),
(24, 'Master of Business Administration', 2, 1, 'R/340/7/0467', 1, '2023-01-18 13:35:00', '2023-01-19 10:58:00'),
(25, 'Bachelor of Business Administration (Honours) in Tourism Management', 3, 1, 'R/340/6/0585', 1, '2023-01-18 13:35:00', '2023-01-19 10:57:50'),
(26, 'Bachelor of Business Administration (Honours) in Human Resource Management', 3, 1, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(27, 'Master of Arts in Chinese Studies', 2, 1, 'R/224/7/0058', 1, '2023-01-18 13:35:00', '2023-01-19 10:56:14'),
(28, 'Bachelor of Traditional Chinese Medicine (Honours)', 3, 1, 'N/721/6/0061', 1, '2023-01-18 13:35:00', '2023-01-19 10:53:31'),
(29, 'Bachelor of Psychology (Honours)', 3, 1, 'R/311/6/0083', 1, '2023-01-18 13:35:00', '2023-01-19 10:56:28'),
(30, 'Bachelor of Early Childhood Education (Honours)', 3, 1, 'R/143/6/0121', 1, '2023-01-18 13:35:00', '2023-01-19 10:54:50'),
(31, 'Bachelor of Education (Honours) Guidance and Counselling', 3, 1, 'N/145/6/0088', 1, '2023-01-18 13:35:00', '2023-01-19 10:51:08'),
(32, 'Master of Communication', 2, 1, 'R/321/7/0233', 1, '2023-01-18 13:35:00', '2023-01-19 10:56:48'),
(33, 'Doctor of Philosophy (Business Administration)', 1, 1, 'N/345/8/1063', 1, '2023-01-18 13:35:00', '2023-01-19 10:53:02'),
(34, 'Professional Certificate in Aesthetic Treatments & Body Therapy', 6, 1, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(35, 'Professional Certificate in Hairdressing & Hair Design', 6, 1, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(36, 'Diploma in Unreal Engine VR Architecture', 6, 1, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(37, 'Executive Diploma in Tourism Management', 7, 1, 'R/812/4/0149', 1, '2023-01-18 13:35:00', '2023-01-19 10:59:24'),
(38, 'Executive Diploma in Industrial Design', 7, 1, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(39, 'Executive Diploma in Visual Art', 7, 1, 'R/211/4/0040', 1, '2023-01-18 13:35:00', '2023-01-19 10:55:02'),
(40, 'Executive Diploma in Advertising Design', 7, 1, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(41, 'Executive Diploma in Multimedia Design', 7, 1, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(42, 'Executive Diploma in Early Childhood Education', 7, 1, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(43, 'Executive Diploma in Business Administration', 7, 1, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(44, 'Executive Diploma in Marketing', 7, 1, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(45, 'Executive Diploma in Logistics Management', 7, 1, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(46, 'Executive Diploma in Chinese Studies', 7, 1, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(47, 'Executive Diploma in English', 7, 1, 'R3/224/4/0001', 1, '2023-01-18 13:35:00', '2023-01-19 11:03:35'),
(48, 'Executive Diploma in Journalism', 7, 1, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(49, 'Executive Diploma in Information Technology', 7, 1, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(50, 'Executive Diploma in Computer Science', 7, 1, 'R3/481/4/0270', 1, '2023-01-18 13:35:00', '2023-01-19 11:03:49'),
(51, 'Executive Diploma in Electrical & Electronic Engineering', 7, 1, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(52, 'Doctor of Philosophy (Chinese Studies)', 1, 1, 'N/224/8/0096', 1, '2023-01-18 13:35:00', '2023-01-19 10:52:32'),
(53, 'Bachelor of Design (Honours) Industrial Design', 3, 1, 'N/214/6/0212', 1, '2023-01-18 13:35:00', '2023-01-19 10:52:13'),
(54, 'Bachelor of Property Management (Honours)', 3, 1, 'N/345/6/1094', 1, '2023-01-18 13:35:00', '2023-01-19 10:52:47'),
(55, 'Master of Science in Computer Science', 2, 1, 'N/481/7/0829', 1, '2023-01-18 13:35:00', '2023-01-19 10:53:15'),
(56, 'Foundation in Science', 5, 1, 'R/010/3/0094', 1, '2023-01-18 13:35:00', '2023-01-19 10:53:58'),
(57, 'Doctor of Business Administration', 1, 1, 'N/0414/8/0006', 1, '2023-01-18 13:35:00', '2023-01-19 10:50:35'),
(58, 'Master of Science in Computer Science - Part Time', 2, 2, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(59, 'Master of Communication - Part Time', 2, 2, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(60, 'Master of Business Administration - Part Time', 2, 2, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(61, 'Master of Arts in Chinese Studies - Part Time', 2, 2, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(62, 'M.A in Chinese Studies - Part Time', 2, 2, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(63, 'Doctor of Philosophy (Chinese Studies) - Part Time', 1, 2, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(64, 'Doctor of Philosophy (Business Administration) - Part Time', 1, 2, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00'),
(65, 'Doctor of Business Administration - Part Time', 1, 2, NULL, 1, '2023-01-18 13:35:00', '2023-01-18 13:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `programme_levels`
--

CREATE TABLE `programme_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programme_levels`
--

INSERT INTO `programme_levels` (`id`, `level`) VALUES
(1, 'PhD'),
(2, 'Master'),
(3, 'Bachelor'),
(4, 'Diploma'),
(5, 'Foundation'),
(6, 'SITE'),
(7, 'SPACE');

-- --------------------------------------------------------

--
-- Table structure for table `programme_pickeds`
--

CREATE TABLE `programme_pickeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_record_id` bigint(20) UNSIGNED NOT NULL,
  `programme_record_id` bigint(20) UNSIGNED NOT NULL,
  `choice_priority_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programme_records`
--

CREATE TABLE `programme_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semester_year_mapping_id` bigint(20) UNSIGNED NOT NULL,
  `programme_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programme_types`
--

CREATE TABLE `programme_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programme_types`
--

INSERT INTO `programme_types` (`id`, `type`) VALUES
(1, 'Full Time'),
(2, 'Part Time');

-- --------------------------------------------------------

--
-- Table structure for table `races`
--

CREATE TABLE `races` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `race_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
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
  `name` varchar(255) NOT NULL,
  `religion_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
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
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
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
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
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
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester`) VALUES
(1, '3'),
(2, '5/6'),
(3, '9/10');

-- --------------------------------------------------------

--
-- Table structure for table `semester_year_mappings`
--

CREATE TABLE `semester_year_mappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_of_healths`
--

CREATE TABLE `status_of_healths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_record_id` bigint(20) UNSIGNED NOT NULL,
  `disease_id` bigint(20) UNSIGNED NOT NULL,
  `disease_remark` varchar(255) DEFAULT NULL,
  `disease_status` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supporting_documents`
--

CREATE TABLE `supporting_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc` text DEFAULT NULL,
  `isCert` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temporary_files`
--

CREATE TABLE `temporary_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `folder` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `acc_status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
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

INSERT INTO `users` (`id`, `name`, `role_id`, `acc_status_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 3, 1, 'superadmin@email.com', NULL, '$2y$10$v.Vu8Thay4FsuMgqCsHU8OY7/LBAngr522t38EOViqWo9VrcIxNXO', NULL, '2023-01-03 23:16:56', '2023-01-03 23:16:56'),
(2, 'Local Student', 1, 1, 'localstudent@email.com', NULL, '$2y$10$.QcHWlPbZwagZ7uUUEj7seLYT17bmIHpSz5GJl9DJfbl0nUBihPGm', NULL, '2023-01-03 23:35:55', '2023-01-03 23:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_name` varchar(255) NOT NULL,
  `ch_name` varchar(255) DEFAULT NULL,
  `ic` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel_h` varchar(255) DEFAULT NULL,
  `tel_hp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `academic_transcripts_academic_record_id_foreign` (`academic_record_id`),
  ADD KEY `academic_transcripts_supporting_document_id_foreign` (`supporting_document_id`),
  ADD KEY `academic_transcripts_school_level_id_foreign` (`school_level_id`);

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
-- Indexes for table `applicant_profile_statuses`
--
ALTER TABLE `applicant_profile_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_status_logs`
--
ALTER TABLE `applicant_status_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_status_logs_user_id_foreign` (`user_id`),
  ADD KEY `applicant_status_logs_applicant_profile_id_foreign` (`applicant_profile_id`),
  ADD KEY `applicant_status_logs_applicant_profile_status_id_foreign` (`applicant_profile_status_id`);

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
-- Indexes for table `identity_documents`
--
ALTER TABLE `identity_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `identity_documents_user_detail_id_foreign` (`user_detail_id`),
  ADD KEY `identity_documents_identity_document_type_id_foreign` (`identity_document_type_id`);

--
-- Indexes for table `identity_document_pages`
--
ALTER TABLE `identity_document_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `identity_document_pages_identity_document_id_foreign` (`identity_document_id`);

--
-- Indexes for table `identity_document_types`
--
ALTER TABLE `identity_document_types`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `programmes_programme_level_id_foreign` (`programme_level_id`),
  ADD KEY `programmes_programme_type_id_foreign` (`programme_type_id`);

--
-- Indexes for table `programme_levels`
--
ALTER TABLE `programme_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programme_pickeds`
--
ALTER TABLE `programme_pickeds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programme_pickeds_application_record_id_foreign` (`application_record_id`),
  ADD KEY `programme_pickeds_programme_record_id_foreign` (`programme_record_id`),
  ADD KEY `programme_pickeds_choice_priority_id_foreign` (`choice_priority_id`);

--
-- Indexes for table `programme_records`
--
ALTER TABLE `programme_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programme_records_semester_year_mapping_id_foreign` (`semester_year_mapping_id`),
  ADD KEY `programme_records_programme_id_foreign` (`programme_id`);

--
-- Indexes for table `programme_types`
--
ALTER TABLE `programme_types`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester_year_mappings`
--
ALTER TABLE `semester_year_mappings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semester_year_mappings_semester_id_foreign` (`semester_id`);

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
-- Indexes for table `temporary_files`
--
ALTER TABLE `temporary_files`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `academic_transcripts`
--
ALTER TABLE `academic_transcripts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_statuses`
--
ALTER TABLE `acc_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `address_mappings`
--
ALTER TABLE `address_mappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `address_types`
--
ALTER TABLE `address_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicant_guardian_lists`
--
ALTER TABLE `applicant_guardian_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicant_profiles`
--
ALTER TABLE `applicant_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicant_profile_pictures`
--
ALTER TABLE `applicant_profile_pictures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicant_profile_statuses`
--
ALTER TABLE `applicant_profile_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `applicant_status_logs`
--
ALTER TABLE `applicant_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application_records`
--
ALTER TABLE `application_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application_statuses`
--
ALTER TABLE `application_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `application_status_logs`
--
ALTER TABLE `application_status_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emergency_contact_lists`
--
ALTER TABLE `emergency_contact_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guardian_relationships`
--
ALTER TABLE `guardian_relationships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `identity_documents`
--
ALTER TABLE `identity_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `identity_document_pages`
--
ALTER TABLE `identity_document_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `identity_document_types`
--
ALTER TABLE `identity_document_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `programme_levels`
--
ALTER TABLE `programme_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `programme_pickeds`
--
ALTER TABLE `programme_pickeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programme_records`
--
ALTER TABLE `programme_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semester_year_mappings`
--
ALTER TABLE `semester_year_mappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_of_healths`
--
ALTER TABLE `status_of_healths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supporting_documents`
--
ALTER TABLE `supporting_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temporary_files`
--
ALTER TABLE `temporary_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_records`
--
ALTER TABLE `academic_records`
  ADD CONSTRAINT `academic_records_application_record_id_foreign` FOREIGN KEY (`application_record_id`) REFERENCES `application_records` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `academic_records_school_level_id_foreign` FOREIGN KEY (`school_level_id`) REFERENCES `school_levels` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `academic_transcripts`
--
ALTER TABLE `academic_transcripts`
  ADD CONSTRAINT `academic_transcripts_academic_record_id_foreign` FOREIGN KEY (`academic_record_id`) REFERENCES `academic_records` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `academic_transcripts_school_level_id_foreign` FOREIGN KEY (`school_level_id`) REFERENCES `school_levels` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `academic_transcripts_supporting_document_id_foreign` FOREIGN KEY (`supporting_document_id`) REFERENCES `supporting_documents` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `address_mappings`
--
ALTER TABLE `address_mappings`
  ADD CONSTRAINT `address_mappings_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `address_mappings_address_type_id_foreign` FOREIGN KEY (`address_type_id`) REFERENCES `address_types` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `address_mappings_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `applicant_guardian_lists`
--
ALTER TABLE `applicant_guardian_lists`
  ADD CONSTRAINT `applicant_guardian_lists_applicant_profile_id_foreign` FOREIGN KEY (`applicant_profile_id`) REFERENCES `applicant_profiles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_guardian_lists_guardian_detail_id_foreign` FOREIGN KEY (`guardian_detail_id`) REFERENCES `guardian_details` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `applicant_profiles`
--
ALTER TABLE `applicant_profiles`
  ADD CONSTRAINT `applicant_profiles_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_profiles_marital_id_foreign` FOREIGN KEY (`marital_id`) REFERENCES `maritals` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_profiles_nationality_id_foreign` FOREIGN KEY (`nationality_id`) REFERENCES `nationalities` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_profiles_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_profiles_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `religions` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_profiles_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `applicant_profile_pictures`
--
ALTER TABLE `applicant_profile_pictures`
  ADD CONSTRAINT `applicant_profile_pictures_applicant_profile_id_foreign` FOREIGN KEY (`applicant_profile_id`) REFERENCES `applicant_profiles` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `applicant_status_logs`
--
ALTER TABLE `applicant_status_logs`
  ADD CONSTRAINT `applicant_status_logs_applicant_profile_id_foreign` FOREIGN KEY (`applicant_profile_id`) REFERENCES `applicant_profiles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_status_logs_applicant_profile_status_id_foreign` FOREIGN KEY (`applicant_profile_status_id`) REFERENCES `applicant_profile_statuses` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_status_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `application_status_logs_application_record_id_foreign` FOREIGN KEY (`application_record_id`) REFERENCES `application_records` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `application_status_logs_application_status_id_foreign` FOREIGN KEY (`application_status_id`) REFERENCES `application_statuses` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `application_status_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD CONSTRAINT `emergency_contacts_guardian_relationship_id_foreign` FOREIGN KEY (`guardian_relationship_id`) REFERENCES `guardian_relationships` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `emergency_contacts_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `emergency_contact_lists`
--
ALTER TABLE `emergency_contact_lists`
  ADD CONSTRAINT `emergency_contact_lists_applicant_profile_id_foreign` FOREIGN KEY (`applicant_profile_id`) REFERENCES `applicant_profiles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `emergency_contact_lists_emergency_contact_id_foreign` FOREIGN KEY (`emergency_contact_id`) REFERENCES `emergency_contacts` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `guardian_details`
--
ALTER TABLE `guardian_details`
  ADD CONSTRAINT `guardian_details_guardian_relationship_id_foreign` FOREIGN KEY (`guardian_relationship_id`) REFERENCES `guardian_relationships` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `guardian_details_income_id_foreign` FOREIGN KEY (`income_id`) REFERENCES `incomes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `guardian_details_nationality_id_foreign` FOREIGN KEY (`nationality_id`) REFERENCES `nationalities` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `guardian_details_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `identity_documents`
--
ALTER TABLE `identity_documents`
  ADD CONSTRAINT `identity_documents_identity_document_type_id_foreign` FOREIGN KEY (`identity_document_type_id`) REFERENCES `identity_document_types` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `identity_documents_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `identity_document_pages`
--
ALTER TABLE `identity_document_pages`
  ADD CONSTRAINT `identity_document_pages_identity_document_id_foreign` FOREIGN KEY (`identity_document_id`) REFERENCES `identity_documents` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_application_record_id_foreign` FOREIGN KEY (`application_record_id`) REFERENCES `application_records` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `programmes`
--
ALTER TABLE `programmes`
  ADD CONSTRAINT `programmes_programme_level_id_foreign` FOREIGN KEY (`programme_level_id`) REFERENCES `programme_levels` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `programmes_programme_type_id_foreign` FOREIGN KEY (`programme_type_id`) REFERENCES `programme_types` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `programme_pickeds`
--
ALTER TABLE `programme_pickeds`
  ADD CONSTRAINT `programme_pickeds_application_record_id_foreign` FOREIGN KEY (`application_record_id`) REFERENCES `application_records` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `programme_pickeds_choice_priority_id_foreign` FOREIGN KEY (`choice_priority_id`) REFERENCES `choice_priorities` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `programme_pickeds_programme_record_id_foreign` FOREIGN KEY (`programme_record_id`) REFERENCES `programme_records` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `programme_records`
--
ALTER TABLE `programme_records`
  ADD CONSTRAINT `programme_records_programme_id_foreign` FOREIGN KEY (`programme_id`) REFERENCES `programmes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `programme_records_semester_year_mapping_id_foreign` FOREIGN KEY (`semester_year_mapping_id`) REFERENCES `semester_year_mappings` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `semester_year_mappings`
--
ALTER TABLE `semester_year_mappings`
  ADD CONSTRAINT `semester_year_mappings_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `status_of_healths`
--
ALTER TABLE `status_of_healths`
  ADD CONSTRAINT `status_of_healths_application_record_id_foreign` FOREIGN KEY (`application_record_id`) REFERENCES `application_records` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `status_of_healths_disease_id_foreign` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`id`) ON UPDATE CASCADE;

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
