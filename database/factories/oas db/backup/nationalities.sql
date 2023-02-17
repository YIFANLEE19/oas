-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 04:06 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
