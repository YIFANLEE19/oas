-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 06:52 AM
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
  `school_name` varchar(191) DEFAULT NULL,
  `school_graduation` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT '1'
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
  `status` varchar(191) NOT NULL
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
  `zipcode` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `state` varchar(191) NOT NULL,
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
  `type` varchar(191) NOT NULL
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
  `birth_date` varchar(191) NOT NULL,
  `place_of_birth` varchar(191) NOT NULL,
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
  `status` varchar(191) NOT NULL
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
  `status` varchar(191) NOT NULL
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
  `choice` varchar(191) NOT NULL
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
  `name` varchar(191) NOT NULL,
  `country_code` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `country_code`, `status`) VALUES
(1, 'Afghanistan', '200400000', 0),
(2, 'Aland Islands', '324800000', 0),
(3, 'Albania', '300800000', 0),
(4, 'Algeria', '101200000', 0),
(5, 'American Samoa', '501600000', 0),
(6, 'Andorra', '302000000', 0),
(7, 'Angola', '102400000', 0),
(8, 'Anguilla', '466000000', 0),
(9, 'Antarctica', '701000000', 0),
(10, 'Antigua And Barbuda', '402800000', 0),
(11, 'Argentina', '603200000', 0),
(12, 'Armenia', '205100000', 0),
(13, 'Aruba', '453300000', 0),
(14, 'Australia', '503600000', 0),
(15, 'Austria', '304000000', 0),
(16, 'Azerbaijan', '203100000', 0),
(17, 'Bahamas', '404400000', 0),
(18, 'Bahrain', '204800000', 0),
(19, 'Bangladesh', '205000000', 0),
(20, 'Barbados', '405200000', 0),
(21, 'Belarus', '311200000', 0),
(22, 'Belgium', '305600000', 0),
(23, 'Belize', '408400000', 0),
(24, 'Benin', '120400000', 0),
(25, 'Bermuda', '406000000', 0),
(26, 'Bhutan', '206400000', 0),
(27, 'Bolivia', '606800000', 0),
(28, 'Bosnia And Herzegovina', '307000000', 0),
(29, 'Botswana', '107200000', 0),
(30, 'Bouvet Island', '707400000', 0),
(31, 'Brazil', '607600000', 0),
(32, 'British Indian Ocean Territory', '208600000', 0),
(33, 'British Virgin Islands', '409200000', 0),
(34, 'Brunei', '209600000', 0),
(35, 'Bulgaria', '310000000', 0),
(36, 'Burkina Faso', '185400000', 0),
(37, 'Burundi', '110800000', 0),
(38, 'Cambodia', '211600000', 0),
(39, 'Cameroon', '112000000', 0),
(40, 'Canada', '412400000', 0),
(41, 'Cape Verde', '113200000', 0),
(42, 'Cayman Islands', '413600000', 0),
(43, 'Central African Republic', '114000000', 0),
(44, 'Chad', '114800000', 0),
(45, 'Chile', '615200000', 0),
(46, 'China', '215600000', 0),
(47, 'Christmas Island', '216200000', 0),
(48, 'Cocos Islands', '216600000', 0),
(49, 'Colombia', '617000000', 0),
(50, 'Comoros', '117400000', 0),
(51, 'Cook Islands', '518400000', 0),
(52, 'Costa Rica', '418800000', 0),
(53, 'Croatia', '319100000', 0),
(54, 'Cuba', '419200000', 0),
(55, 'Cyprus', '319600000', 0),
(56, 'Czech Republic', '320300000', 0),
(57, 'Democratic Republic Of The Congo', '118000000', 0),
(58, 'Denmark', '320800000', 0),
(59, 'Djibouti', '126200000', 0),
(60, 'Dominica', '421200000', 0),
(61, 'Dominican Republic', '421400000', 0),
(62, 'East Timor', '562600000', 0),
(63, 'Ecuador', '621800000', 0),
(64, 'Egypt', '181800000', 0),
(65, 'El Salvador', '422200000', 0),
(66, 'Equatorial Guinea', '122600000', 0),
(67, 'Eritrea', '123200000', 0),
(68, 'Estonia', '323300000', 0),
(69, 'Ethiopia', '123100000', 0),
(70, 'Falkland Islands', '623800000', 0),
(71, 'Faroe Islands', '323400000', 0),
(72, 'Fiji', '524200000', 0),
(73, 'Finland', '324600000', 0),
(74, 'France', '325000000', 0),
(75, 'French Guiana', '625400000', 0),
(76, 'French Polynesia', '525800000', 0),
(77, 'French Southern Territories', '726000000', 0),
(78, 'Gabon', '126600000', 0),
(79, 'Gambia', '127000000', 0),
(80, 'Georgia', '226800000', 0),
(81, 'Germany', '327600000', 0),
(82, 'Ghana', '128800000', 0),
(83, 'Gibraltar', '329200000', 0),
(84, 'Greece', '330000000', 0),
(85, 'Greenland', '430400000', 0),
(86, 'Grenada', '430800000', 0),
(87, 'Guadeloupe', '431200000', 0),
(88, 'Guam', '531600000', 0),
(89, 'Guatemala', '432000000', 0),
(90, 'Guernsey', '383100000', 0),
(91, 'Guinea', '132400000', 0),
(92, 'Guinea-Bissau', '162400000', 0),
(93, 'Guyana', '632800000', 0),
(94, 'Haiti', '433200000', 0),
(95, 'Heard Island And Mcdonald Islands', '733400000', 0),
(96, 'Honduras', '434000000', 0),
(97, 'Hong Kong', '234400000', 0),
(98, 'Hungary', '334800000', 0),
(99, 'Iceland', '335200000', 0),
(100, 'India', '235600000', 0),
(101, 'Indonesia', '236000000', 0),
(102, 'Iran', '236400000', 0),
(103, 'Iraq', '236800000', 0),
(104, 'Ireland', '337200000', 0),
(105, 'Isle Of Man', '383300000', 0),
(106, 'Israel', '237600000', 0),
(107, 'Italy', '338000000', 0),
(108, 'Ivory Coast', '138400000', 0),
(109, 'Jamaica', '438800000', 0),
(110, 'Japan', '239200000', 0),
(111, 'Jersey', '383200000', 0),
(112, 'Jordan', '240000000', 0),
(113, 'Kazakhstan', '239800000', 0),
(114, 'Kenya', '140400000', 0),
(115, 'Kiribati', '529600000', 0),
(116, 'Kuwait', '241400000', 0),
(117, 'Kyrgyzstan', '241700000', 0),
(118, 'Laos', '241800000', 0),
(119, 'Latvia', '342800000', 0),
(120, 'Lebanon', '242200000', 0),
(121, 'Lesotho', '142600000', 0),
(122, 'Liberia', '143000000', 0),
(123, 'Libya', '143400000', 0),
(124, 'Liechtenstein', '343800000', 0),
(125, 'Lithuania', '344000000', 0),
(126, 'Luxembourg', '344200000', 0),
(127, 'Macao', '244600000', 0),
(128, 'Macedonia', '380700000', 0),
(129, 'Madagascar', '145000000', 0),
(130, 'Malawi', '145400000', 0),
(131, 'Malaysia', '245800000', 1),
(132, 'Maldives', '246200000', 0),
(133, 'Mali', '146600000', 0),
(134, 'Malta', '347000000', 0),
(135, 'Marshall Islands', '558400000', 0),
(136, 'Martinique', '447400000', 0),
(137, 'Mauritania', '147800000', 0),
(138, 'Mauritius', '148000000', 0),
(139, 'Mayotte', '117500000', 0),
(140, 'Mexico', '448400000', 0),
(141, 'Micronesia', '558300000', 0),
(142, 'Moldova', '349800000', 0),
(143, 'Monaco', '349200000', 0),
(144, 'Mongolia', '249600000', 0),
(145, 'Montenegro', '349900000', 0),
(146, 'Montserrat', '450000000', 0),
(147, 'Morocco', '150400000', 0),
(148, 'Mozambique', '150800000', 0),
(149, 'Myanmar', '210400000', 0),
(150, 'Namibia', '151600000', 0),
(151, 'Nauru', '552000000', 0),
(152, 'Nepal', '252400000', 0),
(153, 'Netherlands', '352800000', 0),
(154, 'Netherlands Antilles', '453000000', 0),
(155, 'New Caledonia', '554000000', 0),
(156, 'New Zealand', '555400000', 0),
(157, 'Nicaragua', '455800000', 0),
(158, 'Niger', '156200000', 0),
(159, 'Nigeria', '156600000', 0),
(160, 'Niue', '557000000', 0),
(161, 'Norfolk Island', '557400000', 0),
(162, 'North Korea', '240800000', 0),
(163, 'Northern Mariana Islands', '558000000', 0),
(164, 'Norway', '357800000', 0),
(165, 'Oman', '251200000', 0),
(166, 'Pakistan', '258600000', 0),
(167, 'Palau', '558500000', 0),
(168, 'Palestinian Territory', '227500000', 0),
(169, 'Panama', '459100000', 0),
(170, 'Papua New Guinea', '559800000', 0),
(171, 'Paraguay', '660000000', 0),
(172, 'Peru', '660400000', 0),
(173, 'Philippines', '260800000', 0),
(174, 'Pitcairn', '561200000', 0),
(175, 'Poland', '361600000', 0),
(176, 'Portugal', '362000000', 0),
(177, 'Puerto Rico', '463000000', 0),
(178, 'Qatar', '263400000', 0),
(179, 'Republic Of The Congo', '117800000', 0),
(180, 'Reunion', '163800000', 0),
(181, 'Romania', '364200000', 0),
(182, 'Russia', '364300000', 0),
(183, 'Rwanda', '164600000', 0),
(184, 'Saint BarthacLemy', '465200000', 0),
(185, 'Saint Helena', '165400000', 0),
(186, 'Saint Kitts And Nevis', '465900000', 0),
(187, 'Saint Lucia', '466200000', 0),
(188, 'Saint Martin', '466300000', 0),
(189, 'Saint Pierre And Miquelon', '466600000', 0),
(190, 'Saint Vincent And The Grenadines', '467000000', 0),
(191, 'Samoa', '588200000', 0),
(192, 'San Marino', '367400000', 0),
(193, 'Sao Tome And Principe', '167800000', 0),
(194, 'Saudi Arabia', '268200000', 0),
(195, 'Senegal', '168600000', 0),
(196, 'Serbia', '368800000', 0),
(197, 'Serbia And Montenegro', '389100000', 0),
(198, 'Seychelles', '169000000', 0),
(199, 'Sierra Leone', '169400000', 0),
(200, 'Singapore', '270200000', 1),
(201, 'Slovakia', '370300000', 0),
(202, 'Slovenia', '370500000', 0),
(203, 'Solomon Islands', '509000000', 0),
(204, 'Somalia', '170600000', 0),
(205, 'South Africa', '171000000', 0),
(206, 'South Georgia And The South Sandwich Islands', '723900000', 0),
(207, 'South Korea', '241000000', 0),
(208, 'Spain', '372400000', 0),
(209, 'Sri Lanka', '214400000', 0),
(210, 'Sudan', '173600000', 0),
(211, 'Suriname', '674000000', 0),
(212, 'Svalbard And Jan Mayen', '374400000', 0),
(213, 'Swaziland', '174800000', 0),
(214, 'Sweden', '375200000', 0),
(215, 'Switzerland', '375600000', 0),
(216, 'Syria', '276000000', 0),
(217, 'Taiwan', '215800000', 0),
(218, 'Tajikistan', '276200000', 0),
(219, 'Tanzania', '183400000', 0),
(220, 'Tatarstan', '364373000', 0),
(221, 'Thailand', '276400000', 0),
(222, 'Togo', '176800000', 0),
(223, 'Tokelau', '577200000', 0),
(224, 'Tonga', '577600000', 0),
(225, 'Trinidad And Tobago', '478000000', 0),
(226, 'Tunisia', '178800000', 0),
(227, 'Turkey', '279200000', 0),
(228, 'Turkmenistan', '279500000', 0),
(229, 'Turks And Caicos Islands', '479600000', 0),
(230, 'Tuvalu', '579800000', 0),
(231, 'U.S. Virgin Islands', '485000000', 0),
(232, 'Uganda', '180000000', 0),
(233, 'Ukraine', '380400000', 0),
(234, 'United Arab Emirates', '278400000', 0),
(235, 'United Kingdom', '382600000', 0),
(236, 'United States', '484000000', 0),
(237, 'United States Minor Outlying Islands', '558100000', 0),
(238, 'Uruguay', '685800000', 0),
(239, 'Uzbekistan', '286000000', 0),
(240, 'Vanuatu', '554800000', 0),
(241, 'Vatican', '333600000', 0),
(242, 'Venezuela', '686200000', 0),
(243, 'Vietnam', '270400000', 0),
(244, 'Wallis And Futuna', '587600000', 0),
(245, 'Western Sahara', '173200000', 0),
(246, 'Yemen', '288700000', 0),
(247, 'Zambia', '189400000', 0),
(248, 'Zimbabwe', '171600000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `name`, `status`) VALUES
(1, 'OKU', 0),
(2, 'Color Blindness', 0),
(3, 'Congenital or Inherited Disorder', 0),
(4, 'Allergy', 0),
(5, 'Mental Health disorders', 0),
(6, 'Fits, stroke, other neurological disease', 0),
(7, 'Cardiovascular or heart disease', 0),
(8, 'Asthma', 0),
(9, 'Tuberculosis', 0),
(10, 'Drug Addition', 0),
(11, 'AIDS or HIV', 0),
(12, 'Hepatitis B', 0),
(13, 'Hepatitis C', 0),
(14, 'Sexually Transmitted Diseases', 0),
(15, 'Cancer', 0),
(16, 'Psychiatric Illness', 0),
(17, 'Other Illness', 0);

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
  `uuid` varchar(191) NOT NULL,
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
  `name` varchar(191) NOT NULL,
  `gender_code` varchar(191) NOT NULL,
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
  `occupation` varchar(191) DEFAULT NULL,
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
  `name` varchar(191) NOT NULL,
  `relationship_code` varchar(191) NOT NULL,
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
  `application_record_id` bigint(20) UNSIGNED NOT NULL,
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
  `type` varchar(191) NOT NULL
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
  `range` varchar(191) NOT NULL,
  `income_code` varchar(191) NOT NULL,
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
  `name` varchar(191) NOT NULL,
  `marital_code` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maritals`
--

INSERT INTO `maritals` (`id`, `name`, `marital_code`, `status`) VALUES
(1, 'Single', '1', 1),
(2, 'Married', '2', 1),
(3, 'Widow', '3', 0),
(4, 'Divorce', '4', 0),
(5, 'Marital seperation', '5', 0);

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
(45, '2023_01_31_135818_create_identity_document_types_table', 1),
(46, '2023_01_31_140039_create_identity_documents_table', 1),
(47, '2023_02_01_152423_create_identity_document_pages_table', 1),
(48, '2023_02_02_094132_create_temporary_files_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `nationality_code` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `nationality_code`, `status`) VALUES
(1, 'Afghanistan', '410', 0),
(2, 'Aland Islands', '24810', 0),
(3, 'Albania', '810', 0),
(4, 'Algeria', '1210', 0),
(5, 'American Samoa', '1610', 0),
(6, 'Andorra', '2010', 0),
(7, 'Angola', '2410', 0),
(8, 'Anguilla', '66010', 0),
(9, 'Antarctica', '1010', 0),
(10, 'Antigua And Barbuda', '2810', 0),
(11, 'Argentina', '3210', 0),
(12, 'Armenia', '5110', 0),
(13, 'Aruba', '53310', 0),
(14, 'Australia', '3610', 0),
(15, 'Austria', '4010', 0),
(16, 'Azerbaijan', '3110', 0),
(17, 'Bahamas', '4410', 0),
(18, 'Bahrain', '4810', 0),
(19, 'Bangladesh', '5010', 0),
(20, 'Barbados', '5210', 0),
(21, 'Belarus', '11210', 0),
(22, 'Belgium', '5610', 0),
(23, 'Belize', '8410', 0),
(24, 'Benin', '20410', 0),
(25, 'Bermuda', '6010', 0),
(26, 'Bhutan', '6410', 0),
(27, 'Bolivia', '6810', 0),
(28, 'Bosnia And Herzegovina', '7010', 0),
(29, 'Botswana', '7210', 0),
(30, 'Bouvet Island', '7410', 0),
(31, 'Brazil', '7610', 0),
(32, 'British Indian Ocean Territory', '8610', 0),
(33, 'British Virgin Islands', '9210', 0),
(34, 'Brunei', '9610', 0),
(35, 'Bulgaria', '10010', 0),
(36, 'Burkina Faso', '85410', 0),
(37, 'Burundi', '10810', 0),
(38, 'Cambodia', '11610', 0),
(39, 'Cameroon', '12010', 0),
(40, 'Canada', '12410', 0),
(41, 'Cape Verde', '13210', 0),
(42, 'Cayman Islands', '13610', 0),
(43, 'Central African Republic', '14010', 0),
(44, 'Chad', '14810', 0),
(45, 'Chile', '15210', 0),
(46, 'China', '15610', 1),
(47, 'Christmas Island', '16210', 0),
(48, 'Cocos Islands', '16610', 0),
(49, 'Colombia', '17010', 0),
(50, 'Comoros', '17410', 0),
(51, 'Cook Islands', '18410', 0),
(52, 'Costa Rica', '18810', 0),
(53, 'Croatia', '19110', 0),
(54, 'Cuba', '19210', 0),
(55, 'Cyprus', '19610', 0),
(56, 'Czech Republic', '20310', 0),
(57, 'Democratic Republic Of The Congo', '18010', 0),
(58, 'Denmark', '20810', 0),
(59, 'Djibouti', '26210', 0),
(60, 'Dominica', '21210', 0),
(61, 'Dominican Republic', '21410', 0),
(62, 'East Timor', '62610', 0),
(63, 'Ecuador', '21810', 0),
(64, 'Egypt', '81810', 0),
(65, 'El Salvador', '22210', 0),
(66, 'Equatorial Guinea', '22610', 0),
(67, 'Eritrea', '23210', 0),
(68, 'Estonia', '23310', 0),
(69, 'Ethiopia', '23110', 0),
(70, 'Falkland Islands', '23810', 0),
(71, 'Faroe Islands', '23410', 0),
(72, 'Fiji', '24210', 0),
(73, 'Finland', '24610', 0),
(74, 'France', '25010', 0),
(75, 'French Guiana', '25410', 0),
(76, 'French Polynesia', '25810', 0),
(77, 'French Southern Territories', '26010', 0),
(78, 'Gabon', '26610', 0),
(79, 'Gambia', '27010', 0),
(80, 'Georgia', '26810', 0),
(81, 'Germany', '27610', 0),
(82, 'Ghana', '28810', 0),
(83, 'Gibraltar', '29210', 0),
(84, 'Greece', '30010', 0),
(85, 'Greenland', '30410', 0),
(86, 'Grenada', '30810', 0),
(87, 'Guadeloupe', '31210', 0),
(88, 'Guam', '31610', 0),
(89, 'Guatemala', '32010', 0),
(90, 'Guernsey', '83110', 0),
(91, 'Guinea', '32410', 0),
(92, 'Guinea-Bissau', '62410', 0),
(93, 'Guyana', '32810', 0),
(94, 'Haiti', '33210', 0),
(95, 'Heard Island And Mcdonald Islands', '33410', 0),
(96, 'Honduras', '34010', 0),
(97, 'Hong Kong', '34410', 0),
(98, 'Hungary', '34810', 0),
(99, 'Iceland', '35210', 0),
(100, 'India', '35610', 0),
(101, 'Indonesia', '36010', 1),
(102, 'Iran', '36410', 0),
(103, 'Iraq', '36810', 0),
(104, 'Ireland', '37210', 0),
(105, 'Isle Of Man', '83310', 0),
(106, 'Israel', '37610', 0),
(107, 'Italy', '38010', 0),
(108, 'Ivory Coast', '38410', 0),
(109, 'Jamaica', '38810', 0),
(110, 'Japan', '39210', 0),
(111, 'Jersey', '83210', 0),
(112, 'Jordan', '40010', 0),
(113, 'Kazakhstan', '39810', 0),
(114, 'Kenya', '40410', 0),
(115, 'Kiribati', '29610', 0),
(116, 'Kuwait', '41410', 0),
(117, 'Kyrgyzstan', '41710', 0),
(118, 'Laos', '41810', 0),
(119, 'Latvia', '42810', 0),
(120, 'Lebanon', '42210', 0),
(121, 'Lesotho', '42610', 0),
(122, 'Liberia', '43010', 0),
(123, 'Libya', '43410', 0),
(124, 'Liechtenstein', '43810', 0),
(125, 'Lithuania', '44010', 0),
(126, 'Luxembourg', '44210', 0),
(127, 'Macao', '44610', 0),
(128, 'Macedonia', '80710', 0),
(129, 'Madagascar', '45010', 0),
(130, 'Malawi', '45410', 0),
(131, 'Malaysia', '45810', 1),
(132, 'Maldives', '46210', 0),
(133, 'Mali', '46610', 0),
(134, 'Malta', '47010', 0),
(135, 'Marshall Islands', '58410', 0),
(136, 'Martinique', '47410', 0),
(137, 'Mauritania', '47810', 0),
(138, 'Mauritius', '48010', 0),
(139, 'Mayotte', '17510', 0),
(140, 'Mexico', '48410', 0),
(141, 'Micronesia', '58310', 0),
(142, 'Moldova', '49810', 0),
(143, 'Monaco', '49210', 0),
(144, 'Mongolia', '49610', 0),
(145, 'Montenegro', '49910', 0),
(146, 'Montserrat', '50010', 0),
(147, 'Morocco', '50410', 0),
(148, 'Mozambique', '50810', 0),
(149, 'Myanmar', '10410', 0),
(150, 'Namibia', '51610', 0),
(151, 'Nauru', '52010', 0),
(152, 'Nepal', '52410', 0),
(153, 'Netherlands', '52810', 0),
(154, 'Netherlands Antilles', '53010', 0),
(155, 'New Caledonia', '54010', 0),
(156, 'New Zealand', '55410', 0),
(157, 'Nicaragua', '55810', 0),
(158, 'Niger', '56210', 0),
(159, 'Nigeria', '56610', 0),
(160, 'Niue', '57010', 0),
(161, 'Non-Malaysian', '94580', 1),
(162, 'Norfolk Island', '57410', 0),
(163, 'North Korea', '40810', 0),
(164, 'Northern Mariana Islands', '58010', 0),
(165, 'Norway', '57810', 0),
(166, 'Oman', '51210', 0),
(167, 'Others', '90000', 1),
(168, 'Pakistan', '58610', 0),
(169, 'Palau', '58510', 0),
(170, 'Palestinian Territory', '27510', 0),
(171, 'Panama', '59110', 0),
(172, 'Papua New Guinea', '59810', 0),
(173, 'Paraguay', '60010', 0),
(174, 'Permanent Resident (Amj) Malaysia', '45823', 0),
(175, 'Permanent Resident Of Malaysia', '45822', 0),
(176, 'Peru', '60410', 0),
(177, 'Philippines', '60810', 0),
(178, 'Pitcairn', '61210', 0),
(179, 'Poland', '61610', 0),
(180, 'Portugal', '62010', 0),
(181, 'Puerto Rico', '63010', 0),
(182, 'Qatar', '63410', 0),
(183, 'Republic Of The Congo', '17810', 0),
(184, 'Resident Of Malaysia', '45820', 0),
(185, 'Reunion', '63810', 0),
(186, 'Romania', '64210', 0),
(187, 'Russia', '64310', 0),
(188, 'Rwanda', '64610', 0),
(189, 'Saint Barth??A?Lemy', '65210', 0),
(190, 'Saint Helena', '65410', 0),
(191, 'Saint Kitts And Nevis', '65910', 0),
(192, 'Saint Lucia', '66210', 0),
(193, 'Saint Martin', '66310', 0),
(194, 'Saint Pierre And Miquelon', '66610', 0),
(195, 'Saint Vincent And The Grenadines', '67010', 0),
(196, 'Samoa', '88210', 0),
(197, 'San Marino', '67410', 0),
(198, 'Sao Tome And Principe', '67810', 0),
(199, 'Saudi Arabia', '68210', 0),
(200, 'Senegal', '68610', 0),
(201, 'Serbia', '68810', 0),
(202, 'Serbia And Montenegro', '89110', 0),
(203, 'Seychelles', '69010', 0),
(204, 'Sierra Leone', '69410', 0),
(205, 'Singapore', '70210', 1),
(206, 'Slovakia', '70310', 0),
(207, 'Slovenia', '70510', 0),
(208, 'Solomon Islands', '9010', 0),
(209, 'Somalia', '70610', 0),
(210, 'South Africa', '71010', 0),
(211, 'South Georgia And The South Sandwich Islands', '23910', 0),
(212, 'South Korea', '41010', 1),
(213, 'Spain', '72410', 0),
(214, 'Sri Lanka', '14410', 0),
(215, 'Sudan', '73610', 0),
(216, 'Suriname', '74010', 0),
(217, 'Svalbard And Jan Mayen', '74410', 0),
(218, 'Swaziland', '74810', 0),
(219, 'Sweden', '75210', 0),
(220, 'Switzerland', '75610', 0),
(221, 'Syria', '76010', 0),
(222, 'Taiwan', '15810', 1),
(223, 'Tajikistan', '76210', 0),
(224, 'Tanzania', '83410', 0),
(225, 'Temporary Resident Of Malaysia', '45821', 0),
(226, 'Thailand', '76410', 0),
(227, 'Togo', '76810', 0),
(228, 'Tokelau', '77210', 0),
(229, 'Tonga', '77610', 0),
(230, 'Trinidad And Tobago', '78010', 0),
(231, 'Tunisia', '78810', 0),
(232, 'Turkey', '79210', 0),
(233, 'Turkmenistan', '79510', 0),
(234, 'Turks And Caicos Islands', '79610', 0),
(235, 'Tuvalu', '79810', 0),
(236, 'U.S. Virgin Islands', '85010', 0),
(237, 'Uganda', '80010', 0),
(238, 'Ukraine', '80410', 0),
(239, 'United Arab Emirates', '78410', 0),
(240, 'United Kingdom', '82610', 0),
(241, 'United States', '84010', 0),
(242, 'United States Minor Outlying Islands', '58110', 0),
(243, 'Unspecified', '00000', 0),
(244, 'Uruguay', '85810', 0),
(245, 'Uzbekistan', '86010', 0),
(246, 'Vanuatu', '54810', 0),
(247, 'Vatican', '33610', 0),
(248, 'Venezuela', '86210', 0),
(249, 'Vietnam', '70410', 0),
(250, 'Wallis And Futuna', '87610', 0),
(251, 'Western Sahara', '73210', 0),
(252, 'Yemen', '88710', 0),
(253, 'Zambia', '89410', 0),
(254, 'Zimbabwe', '71610', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_record_id` bigint(20) UNSIGNED NOT NULL,
  `payment_slip` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_name` varchar(191) NOT NULL,
  `programme_level_id` bigint(20) UNSIGNED NOT NULL,
  `programme_type_id` bigint(20) UNSIGNED NOT NULL,
  `programme_code` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `en_name`, `programme_level_id`, `programme_type_id`, `programme_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Diploma in Accountancy', 4, 1, 'R2/344/4/0188', 1, '2023-01-18 05:35:00', '2023-01-19 03:02:34'),
(2, 'Diploma in Business Administration', 4, 1, 'R2/345/4/0418', 1, '2023-01-18 05:35:00', '2023-01-19 03:02:46'),
(3, 'Diploma in Marketing', 4, 1, 'R2/342/4/0135', 1, '2023-01-18 05:35:00', '2023-01-19 03:02:08'),
(4, 'Diploma in Logistics Management', 4, 1, 'R3/840/4/0034', 1, '2023-01-18 05:35:00', '2023-01-19 03:04:02'),
(5, 'Bachelor of Business Administration (Honours) in Finance & Investment', 3, 1, 'R/340/6/0246', 1, '2023-01-18 05:35:00', '2023-01-19 02:57:01'),
(6, 'Bachelor of Business Administration (Honours) in Marketing', 3, 1, 'R/342/6/0060', 1, '2023-01-18 05:35:00', '2023-01-19 02:58:10'),
(7, 'Bachelor in Accounting (Honours)', 3, 1, 'R/344/6/0152', 1, '2023-01-18 05:35:00', '2023-01-19 02:58:21'),
(8, 'Diploma in Information Technology', 4, 1, 'R2/482/4/0190', 1, '2023-01-18 05:35:00', '2023-01-19 03:02:57'),
(9, 'Diploma in Electrical & Electronic Engineering', 4, 1, 'R2/523/4/0308', 1, '2023-01-18 05:35:00', '2023-01-19 03:03:05'),
(10, 'Bachelor of Software Engineering (Honours)', 3, 1, 'R/481/6/0275', 1, '2023-01-18 05:35:00', '2023-01-19 02:58:57'),
(11, 'Bachelor of Electronic Engineering with Honours', 3, 1, 'R/523/6/0170', 1, '2023-01-18 05:35:00', '2023-01-19 02:59:07'),
(12, 'Diploma in Industrial Design', 4, 1, 'R3/214/4/0014', 1, '2023-01-18 05:35:00', '2023-01-19 03:03:12'),
(13, 'Diploma in Advertising Design', 4, 1, 'R3/214/4/0024', 1, '2023-01-18 05:35:00', '2023-01-19 03:03:21'),
(14, 'Diploma in Multimedia Design', 4, 1, 'R/213/4/0133', 1, '2023-01-18 05:35:00', '2023-01-19 02:55:11'),
(15, 'Bachelor of Design (Honours) Computer Graphic Design', 3, 1, 'R/213/6/0132', 1, '2023-01-18 05:35:00', '2023-01-19 02:55:24'),
(16, 'Diploma in Chinese Studies', 4, 1, 'R2/312/4/0036', 1, '2023-01-18 05:35:00', '2023-01-19 03:01:39'),
(17, 'Bachelor of Arts (Honours) Chinese Studies', 3, 1, 'R/224/6/0033', 1, '2023-01-18 05:35:00', '2023-01-19 02:56:02'),
(18, 'Bachelor of Arts (Honours) English Language Teaching', 3, 1, 'R/224/6/0026', 1, '2023-01-18 05:35:00', '2023-01-19 02:55:48'),
(19, 'Bachelor of Communication (Honours) (Mass Communication)', 3, 1, 'R/321/6/0080', 1, '2023-01-18 05:35:00', '2023-01-19 02:56:39'),
(20, 'Foundation In Traditional Chinese Medicine', 5, 1, 'R2/010/3/0309', 1, '2023-01-18 05:35:00', '2023-01-19 02:59:38'),
(21, 'Foundation in Arts', 5, 1, 'R/010/3/0126', 1, '2023-01-18 05:35:00', '2023-01-19 02:54:10'),
(22, 'Diploma in Early Childhood Education', 4, 1, 'R/143/4/0084', 1, '2023-01-18 05:35:00', '2023-01-19 02:54:38'),
(23, 'Bachelor of Business Administration (Honours)', 3, 1, 'R/340/6/0466', 1, '2023-01-18 05:35:00', '2023-01-19 02:57:34'),
(24, 'Master of Business Administration', 2, 1, 'R/340/7/0467', 1, '2023-01-18 05:35:00', '2023-01-19 02:58:00'),
(25, 'Bachelor of Business Administration (Honours) in Tourism Management', 3, 1, 'R/340/6/0585', 1, '2023-01-18 05:35:00', '2023-01-19 02:57:50'),
(26, 'Bachelor of Business Administration (Honours) in Human Resource Management', 3, 1, NULL, 1, '2023-01-18 05:35:00', '2023-01-18 05:35:00'),
(27, 'Master of Arts in Chinese Studies', 2, 1, 'R/224/7/0058', 1, '2023-01-18 05:35:00', '2023-01-19 02:56:14'),
(28, 'Bachelor of Traditional Chinese Medicine (Honours)', 3, 1, 'N/721/6/0061', 1, '2023-01-18 05:35:00', '2023-01-19 02:53:31'),
(29, 'Bachelor of Psychology (Honours)', 3, 1, 'R/311/6/0083', 1, '2023-01-18 05:35:00', '2023-01-19 02:56:28'),
(30, 'Bachelor of Early Childhood Education (Honours)', 3, 1, 'R/143/6/0121', 1, '2023-01-18 05:35:00', '2023-01-19 02:54:50'),
(31, 'Bachelor of Education (Honours) Guidance and Counselling', 3, 1, 'N/145/6/0088', 1, '2023-01-18 05:35:00', '2023-01-19 02:51:08'),
(32, 'Master of Communication', 2, 1, 'R/321/7/0233', 1, '2023-01-18 05:35:00', '2023-01-19 02:56:48'),
(33, 'Doctor of Philosophy (Business Administration)', 1, 1, 'N/345/8/1063', 1, '2023-01-18 05:35:00', '2023-01-19 02:53:02'),
(34, 'Professional Certificate in Aesthetic Treatments & Body Therapy', 6, 1, NULL, 1, '2023-01-18 05:35:00', '2023-01-18 05:35:00'),
(35, 'Professional Certificate in Hairdressing & Hair Design', 6, 1, NULL, 1, '2023-01-18 05:35:00', '2023-01-18 05:35:00'),
(36, 'Diploma in Unreal Engine VR Architecture', 6, 1, NULL, 1, '2023-01-18 05:35:00', '2023-01-18 05:35:00'),
(37, 'Executive Diploma in Tourism Management', 7, 1, 'R/812/4/0149', 0, '2023-01-18 05:35:00', '2023-02-15 05:43:43'),
(38, 'Executive Diploma in Industrial Design', 7, 1, NULL, 0, '2023-01-18 05:35:00', '2023-02-15 05:34:10'),
(39, 'Executive Diploma in Visual Art', 7, 1, 'R/211/4/0040', 0, '2023-01-18 05:35:00', '2023-02-15 05:43:53'),
(40, 'Executive Diploma in Advertising Design', 7, 1, NULL, 0, '2023-01-18 05:35:00', '2023-02-15 05:34:22'),
(41, 'Executive Diploma in Multimedia Design', 7, 1, NULL, 0, '2023-01-18 05:35:00', '2023-02-15 05:34:57'),
(42, 'Executive Diploma in Early Childhood Education', 7, 1, NULL, 0, '2023-01-18 05:35:00', '2023-02-15 05:35:30'),
(43, 'Executive Diploma in Business Administration', 7, 1, NULL, 0, '2023-01-18 05:35:00', '2023-02-15 05:32:22'),
(44, 'Executive Diploma in Marketing', 7, 1, NULL, 0, '2023-01-18 05:35:00', '2023-02-15 05:33:00'),
(45, 'Executive Diploma in Logistics Management', 7, 1, NULL, 0, '2023-01-18 05:35:00', '2023-02-15 05:33:15'),
(46, 'Executive Diploma in Chinese Studies', 7, 1, NULL, 0, '2023-01-18 05:35:00', '2023-02-15 05:35:16'),
(47, 'Executive Diploma in English', 7, 1, 'R3/224/4/0001', 0, '2023-01-18 05:35:00', '2023-02-15 05:44:10'),
(48, 'Executive Diploma in Journalism', 7, 1, NULL, 0, '2023-01-18 05:35:00', '2023-02-15 05:44:18'),
(49, 'Executive Diploma in Information Technology', 7, 1, NULL, 0, '2023-01-18 05:35:00', '2023-02-15 05:33:25'),
(50, 'Executive Diploma in Computer Science', 7, 1, 'R3/481/4/0270', 0, '2023-01-18 05:35:00', '2023-02-15 05:44:22'),
(51, 'Executive Diploma in Electrical & Electronic Engineering', 7, 1, NULL, 0, '2023-01-18 05:35:00', '2023-02-15 05:33:42'),
(52, 'Doctor of Philosophy (Chinese Studies)', 1, 1, 'N/224/8/0096', 1, '2023-01-18 05:35:00', '2023-01-19 02:52:32'),
(53, 'Bachelor of Design (Honours) Industrial Design', 3, 1, 'N/214/6/0212', 1, '2023-01-18 05:35:00', '2023-01-19 02:52:13'),
(54, 'Bachelor of Property Management (Honours)', 3, 1, 'N/345/6/1094', 1, '2023-01-18 05:35:00', '2023-01-19 02:52:47'),
(55, 'Master of Science in Computer Science', 2, 1, 'N/481/7/0829', 1, '2023-01-18 05:35:00', '2023-01-19 02:53:15'),
(56, 'Foundation in Science', 5, 1, 'R/010/3/0094', 1, '2023-01-18 05:35:00', '2023-01-19 02:53:58'),
(57, 'Doctor of Business Administration', 1, 1, 'N/0414/8/0006', 1, '2023-01-18 05:35:00', '2023-01-19 02:50:35'),
(58, 'Master of Science in Computer Science - Part Time', 2, 2, NULL, 1, '2023-01-18 05:35:00', '2023-01-18 05:35:00'),
(59, 'Master of Communication - Part Time', 2, 2, NULL, 1, '2023-01-18 05:35:00', '2023-01-18 05:35:00'),
(60, 'Master of Business Administration - Part Time', 2, 2, NULL, 1, '2023-01-18 05:35:00', '2023-01-18 05:35:00'),
(61, 'Master of Arts in Chinese Studies - Part Time', 2, 2, NULL, 1, '2023-01-18 05:35:00', '2023-01-18 05:35:00'),
(62, 'M.A in Chinese Studies - Part Time', 2, 2, NULL, 1, '2023-01-18 05:35:00', '2023-01-18 05:35:00'),
(63, 'Doctor of Philosophy (Chinese Studies) - Part Time', 1, 2, NULL, 1, '2023-01-18 05:35:00', '2023-01-18 05:35:00'),
(64, 'Doctor of Philosophy (Business Administration) - Part Time', 1, 2, NULL, 1, '2023-01-18 05:35:00', '2023-01-18 05:35:00'),
(65, 'Doctor of Business Administration - Part Time', 1, 2, NULL, 1, '2023-01-18 05:35:00', '2023-01-18 05:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `programme_levels`
--

CREATE TABLE `programme_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(191) NOT NULL
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
  `type` varchar(191) NOT NULL
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
  `name` varchar(191) NOT NULL,
  `race_code` varchar(191) NOT NULL,
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
  `name` varchar(191) NOT NULL,
  `religion_code` varchar(191) NOT NULL,
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
(5, 'Sikhism', '500', 0),
(6, 'Taoism', '600', 1),
(7, 'Confucianism', '700', 0),
(8, 'Bahai', '800', 0),
(9, 'Tribal/Folk/Other Traditional Chinese Religion', '900', 0),
(10, 'Free Thinker', '1000', 1),
(11, 'Other', '9000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
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
  `name` varchar(191) NOT NULL,
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
  `semester` varchar(191) NOT NULL
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
  `year` varchar(191) NOT NULL,
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
  `disease_remark` varchar(191) DEFAULT NULL,
  `disease_status` varchar(191) NOT NULL DEFAULT '0'
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
  `folder` varchar(191) NOT NULL,
  `file` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `acc_status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `acc_status_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 3, 1, 'superadmin@email.com', NULL, '$2y$10$v.Vu8Thay4FsuMgqCsHU8OY7/LBAngr522t38EOViqWo9VrcIxNXO', NULL, '2023-01-03 15:16:56', '2023-01-03 15:16:56'),
(2, 'Local Student', 1, 1, 'localstudent@email.com', NULL, '$2y$10$.QcHWlPbZwagZ7uUUEj7seLYT17bmIHpSz5GJl9DJfbl0nUBihPGm', NULL, '2023-01-03 15:35:55', '2023-01-03 15:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_name` varchar(191) NOT NULL,
  `ch_name` varchar(191) DEFAULT NULL,
  `ic` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `tel_h` varchar(191) DEFAULT NULL,
  `tel_hp` varchar(191) DEFAULT NULL
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
  ADD KEY `identity_documents_application_record_id_foreign` (`application_record_id`),
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
  ADD CONSTRAINT `identity_documents_application_record_id_foreign` FOREIGN KEY (`application_record_id`) REFERENCES `application_records` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `identity_documents_identity_document_type_id_foreign` FOREIGN KEY (`identity_document_type_id`) REFERENCES `identity_document_types` (`id`) ON UPDATE CASCADE;

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
