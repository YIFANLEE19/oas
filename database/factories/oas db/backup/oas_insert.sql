INSERT INTO `acc_statuses` (`id`, `status`) VALUES
(1, 'Active'),
(2, 'Inactive');

INSERT INTO `address_types` (`id`, `type`) VALUES
(1, 'Correspondence Address'),
(2, 'Permanent Address');

INSERT INTO `applicant_profile_statuses` (`id`, `status`) VALUES
(1, 'Complete Personal Particulars'),
(2, 'Complete Parent/Guardian Particulars'),
(3, 'Complete Emergency Contact'),
(4, 'Complete Profile Picture');

INSERT INTO `application_statuses` (`id`, `status`) VALUES
(1, 'Complete Program Selection'),
(2, 'Complete Academic Record'),
(3, 'Complete Status of Health'),
(4, 'Complete Agreement'),
(5, 'Complete Checking Draft'),
(6, 'Complete Submit Supporting Document'),
(7, 'Complete Submit Payment Slip');

INSERT INTO `choice_priorities` (`id`, `choice`) VALUES
(1, 'First choice'),
(2, 'Second choice'),
(3, 'Third choice');

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

INSERT INTO `genders` (`id`, `name`, `gender_code`, `status`) VALUES
(1, 'Male', '1', 1),
(2, 'Female', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guardian_details`
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

INSERT INTO `identity_document_types` (`id`, `type`) VALUES
(1, 'Identity card - Front'),
(2, 'Identity card - Back');

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

INSERT INTO `maritals` (`id`, `name`, `marital_code`, `status`) VALUES
(1, 'Single', '1', 1),
(2, 'Married', '2', 1),
(3, 'Widow', '3', 0),
(4, 'Divorce', '4', 0),
(5, 'Marital seperation', '5', 0);

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

INSERT INTO `programme_levels` (`id`, `level`) VALUES
(1, 'PhD'),
(2, 'Master'),
(3, 'Bachelor'),
(4, 'Diploma'),
(5, 'Foundation'),
(6, 'SITE'),
(7, 'SPACE');

INSERT INTO `programme_types` (`id`, `type`) VALUES
(1, 'Full Time'),
(2, 'Part Time');

INSERT INTO `programmes` (`id`, `en_name`, `programme_level_id`, `programme_type_id`, `programme_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Diploma in Accountancy', 4, 1, NULL, 1, '2023-02-17 07:26:29', '2023-02-17 07:26:29'),
(2, 'Diploma in Business Administration', 4, 1, NULL, 1, '2023-02-17 07:26:43', '2023-02-17 07:26:43'),
(3, 'Diploma in International Business', 4, 1, NULL, 0, '2023-02-17 07:26:54', '2023-02-17 07:26:59'),
(4, 'Diploma in Marketing', 4, 1, NULL, 1, '2023-02-17 07:27:12', '2023-02-17 07:27:12'),
(5, 'Diploma in Logistics Management', 4, 1, NULL, 1, '2023-02-17 07:27:27', '2023-02-17 07:27:27'),
(6, 'Diploma in Financial Analysis', 4, 1, NULL, 0, '2023-02-17 07:27:41', '2023-02-17 07:27:47'),
(7, '3+0 BA (Hons) Business Management (Teesside University, UK)', 8, 1, NULL, 0, '2023-02-17 07:30:53', '2023-02-17 07:31:00'),
(8, 'Bachelor of Business Administration (Honours) in Finance & Investment', 3, 1, NULL, 1, '2023-02-17 07:31:19', '2023-02-17 07:31:19'),
(9, 'Bachelor of Business Administration (Honours) in Marketing', 3, 1, NULL, 1, '2023-02-17 07:31:31', '2023-02-17 07:31:31'),
(10, 'Bachelor in Accounting (Honours)', 3, 1, NULL, 1, '2023-02-17 07:31:41', '2023-02-17 07:31:41'),
(11, 'Diploma in Information Technology', 4, 1, NULL, 1, '2023-02-17 07:31:59', '2023-02-17 07:31:59'),
(12, 'Diploma in Computer Science', 4, 1, NULL, 0, '2023-02-17 07:32:07', '2023-02-17 07:32:12'),
(13, 'Diploma in Electrical & Electronic Engineering', 4, 1, NULL, 1, '2023-02-17 07:32:21', '2023-02-17 07:32:21'),
(14, 'Bachelor of Software Engineering (Honours)', 3, 1, NULL, 1, '2023-02-17 07:32:28', '2023-02-17 07:32:28'),
(15, 'Bachelor of Electronic Engineering with Honours', 3, 1, NULL, 1, '2023-02-17 07:32:36', '2023-02-17 07:32:36'),
(16, 'Tourism & Hospitality Management (THM) Program', 4, 1, NULL, 0, '2023-02-17 07:32:48', '2023-02-17 07:32:53'),
(18, 'Diploma in Industrial Design', 4, 1, NULL, 1, '2023-02-17 07:33:05', '2023-02-17 07:33:05'),
(19, 'Diploma in Advertising Design', 4, 1, NULL, 1, '2023-02-17 07:34:28', '2023-02-17 07:34:28'),
(20, 'Diploma in Visual Art', 4, 1, NULL, 0, '2023-02-17 07:34:37', '2023-02-17 07:34:41'),
(21, 'Diploma in Multimedia Design', 4, 1, NULL, 1, '2023-02-17 07:34:56', '2023-02-17 07:34:56'),
(22, 'Bachelor of Design (Honours) Computer Graphic Design', 3, 1, NULL, 1, '2023-02-17 07:35:05', '2023-02-17 07:35:05'),
(23, 'Diploma in Chinese Studies', 4, 1, NULL, 1, '2023-02-17 07:35:21', '2023-02-17 07:35:21'),
(24, 'Diploma in English', 4, 1, NULL, 0, '2023-02-17 07:35:33', '2023-02-17 07:35:37'),
(25, 'Diploma in Journalism', 4, 1, NULL, 0, '2023-02-17 07:35:47', '2023-02-17 07:35:53'),
(26, 'Diploma Pengajian Bahasa Melayu', 4, 1, NULL, 0, '2023-02-17 07:36:06', '2023-02-17 07:36:13'),
(28, 'Bachelor of Arts (Honours) Chinese Studies', 3, 1, NULL, 1, '2023-02-17 07:36:35', '2023-02-17 07:36:35'),
(29, 'Bachelor of Arts (Honours) English Language Teaching', 3, 1, NULL, 1, '2023-02-17 07:37:03', '2023-02-17 07:37:03'),
(30, 'Izajah Sarjana Muda Pengajian Bahasa Melayu (Kepujian)', 3, 1, NULL, 0, '2023-02-17 07:37:15', '2023-02-17 07:37:19'),
(31, 'Bachelor of Communication (Honours) (Mass Communication)', 3, 1, NULL, 1, '2023-02-17 07:37:36', '2023-02-17 07:37:36'),
(32, '3+2 Bachelor Degree of Traditional Chinese Medicine', 8, 1, NULL, 0, '2023-02-17 07:38:05', '2023-02-17 07:38:10'),
(33, 'Certificate in Business Studies (SM5192)', 5, 1, NULL, 0, '2023-02-17 07:38:28', '2023-02-17 07:38:31'),
(34, 'Certificate in Computing (SM5193)', 5, 1, NULL, 0, '2023-02-17 07:38:57', '2023-02-17 07:39:00'),
(35, 'Foundation In Traditional Chinese Medicine', 5, 1, NULL, 1, '2023-02-17 07:39:11', '2023-02-17 07:39:11'),
(36, 'Foundation in Arts', 5, 1, NULL, 1, '2023-02-17 07:39:20', '2023-02-17 07:39:20'),
(37, 'Foundation in Science', 5, 1, NULL, 0, '2023-02-17 07:39:28', '2023-02-17 07:39:33'),
(38, 'Diploma in Early Childhood Education', 4, 1, NULL, 1, '2023-02-17 07:39:45', '2023-02-17 07:39:45'),
(39, 'Bachelor of Business Administration (Honours)', 3, 1, NULL, 1, '2023-02-17 07:39:56', '2023-02-17 07:39:56'),
(40, 'Master of Business Administration', 2, 1, NULL, 1, '2023-02-17 07:40:05', '2023-02-17 07:40:05'),
(41, 'Bachelor of Business Administration (Honours) in Tourism Management', 3, 1, NULL, 1, '2023-02-17 07:40:14', '2023-02-17 07:40:14'),
(42, 'Bachelor of Business Administration (Honours) in Human Resource Management', 3, 1, NULL, 1, '2023-02-17 07:40:24', '2023-02-17 07:40:24'),
(43, 'Master of Arts in Chinese Studies', 2, 1, NULL, 1, '2023-02-17 07:40:36', '2023-02-17 07:40:36'),
(44, 'M.A in Translation Studies', 2, 1, NULL, 0, '2023-02-17 07:40:54', '2023-02-17 07:40:58'),
(45, 'Bachelor of Traditional Chinese Medicine (Honours)', 3, 1, NULL, 1, '2023-02-17 07:41:06', '2023-02-17 07:41:06'),
(46, 'Bachelor of Psychology (Honours)', 3, 1, NULL, 1, '2023-02-17 07:41:20', '2023-02-17 07:41:20'),
(47, 'Diploma in Tourism Management', 4, 1, NULL, 0, '2023-02-17 07:41:32', '2023-02-17 07:41:37'),
(48, 'Bachelor of Early Childhood Education (Honours)', 3, 1, NULL, 1, '2023-02-17 07:41:55', '2023-02-17 07:41:55'),
(49, 'Bachelor of Education (Honours) Guidance and Counselling', 3, 1, NULL, 1, '2023-02-17 07:42:04', '2023-02-17 07:42:04'),
(50, 'Bachelor of Education (Honours) (Information Technology and Multimedia)', 3, 1, NULL, 0, '2023-02-17 07:42:14', '2023-02-17 07:42:19'),
(51, 'Master of Communication', 2, 1, NULL, 1, '2023-02-17 07:42:26', '2023-02-17 07:42:26'),
(52, 'Doctor of Philosophy (Business Administration)', 1, 1, NULL, 1, '2023-02-17 07:42:37', '2023-02-17 07:42:37'),
(53, 'Professional Certificate in Aesthetic Treatments & Body Therapy', 6, 1, NULL, 1, '2023-02-17 07:42:56', '2023-02-17 07:42:56'),
(54, 'Professional Certificate in Hairdressing & Hair Design', 6, 1, NULL, 1, '2023-02-17 07:43:06', '2023-02-17 07:43:06'),
(55, 'Diploma in Unreal Engine VR Architecture', 6, 1, NULL, 1, '2023-02-17 07:43:14', '2023-02-17 07:43:14'),
(56, 'Executive Diploma in Tourism Management', 7, 1, NULL, 1, '2023-02-17 07:43:26', '2023-02-17 07:43:26'),
(57, 'Executive Diploma in Industrial Design', 7, 1, NULL, 1, '2023-02-17 07:43:55', '2023-02-17 07:43:55'),
(58, 'Executive Diploma in Visual Art', 7, 1, NULL, 1, '2023-02-17 07:44:03', '2023-02-17 07:44:03'),
(59, 'Executive Diploma in Advertising Design', 7, 1, NULL, 1, '2023-02-17 07:44:12', '2023-02-17 07:44:12'),
(60, 'Executive Diploma in Multimedia Design', 7, 1, NULL, 1, '2023-02-17 07:44:25', '2023-02-17 07:44:25'),
(61, 'Executive Diploma in Early Childhood Education', 7, 1, NULL, 1, '2023-02-17 07:44:35', '2023-02-17 07:44:35'),
(62, 'Executive Diploma in Business Administration', 7, 1, NULL, 1, '2023-02-17 07:44:55', '2023-02-17 07:44:55'),
(63, 'Executive Diploma in Marketing', 7, 1, NULL, 1, '2023-02-17 07:45:03', '2023-02-17 07:45:03'),
(64, 'Executive Diploma in Logistics Management', 7, 1, NULL, 1, '2023-02-17 07:45:10', '2023-02-17 07:45:10'),
(65, 'Executive Diploma in Chinese Studies', 7, 1, NULL, 1, '2023-02-17 07:45:18', '2023-02-17 07:45:18'),
(66, 'Executive Diploma in English', 7, 1, NULL, 1, '2023-02-17 07:45:30', '2023-02-17 07:45:30'),
(67, 'Executive Diploma in Journalism', 7, 1, NULL, 1, '2023-02-17 07:45:38', '2023-02-17 07:45:38'),
(68, 'Executive Diploma in Information Technology', 7, 1, NULL, 1, '2023-02-17 07:45:46', '2023-02-17 07:45:46'),
(69, 'Executive Diploma in Computer Science', 7, 1, NULL, 1, '2023-02-17 07:45:59', '2023-02-17 07:45:59'),
(70, 'Executive Diploma in Electrical & Electronic Engineering', 7, 1, NULL, 1, '2023-02-17 07:46:11', '2023-02-17 07:46:11'),
(71, 'Doctor of Philosophy (Chinese Studies)', 1, 1, NULL, 1, '2023-02-17 07:46:19', '2023-02-17 07:46:19'),
(72, 'Bachelor of Design (Honours) Industrial Design', 3, 1, NULL, 1, '2023-02-17 07:46:26', '2023-02-17 07:46:26'),
(73, 'Bachelor of Property Management (Honours)', 3, 1, NULL, 1, '2023-02-17 07:46:34', '2023-02-17 07:46:34'),
(74, 'Master of Science in Computer Science', 2, 1, NULL, 1, '2023-02-17 07:46:42', '2023-02-17 07:46:42'),
(75, 'Foundation in Science', 5, 1, NULL, 1, '2023-02-17 07:46:50', '2023-02-17 07:46:50'),
(76, 'Doctor of Business Administration', 1, 1, NULL, 1, '2023-02-17 07:46:59', '2023-02-17 07:46:59'),
(77, 'Master of Science in Computer Science - Part Time', 2, 2, NULL, 1, '2023-02-17 07:47:11', '2023-02-17 07:47:11'),
(78, 'Master of Communication - Part Time', 2, 2, NULL, 1, '2023-02-17 07:47:20', '2023-02-17 07:47:20'),
(79, 'Master of Business Administration - Part Time', 2, 2, NULL, 1, '2023-02-17 07:47:42', '2023-02-17 07:47:42'),
(80, 'Master of Arts in Chinese Studies - Part Time', 2, 2, NULL, 1, '2023-02-17 07:47:50', '2023-02-17 07:47:50'),
(81, 'M.A in Chinese Studies - Part Time', 2, 2, NULL, 1, '2023-02-17 07:47:58', '2023-02-17 07:47:58'),
(82, 'Doctor of Philosophy (Chinese Studies) - Part Time', 1, 2, NULL, 1, '2023-02-17 07:48:10', '2023-02-17 07:48:10'),
(83, 'Doctor of Philosophy (Business Administration) - Part Time', 1, 2, NULL, 1, '2023-02-17 07:48:20', '2023-02-17 07:48:20'),
(84, 'Doctor of Business Administration - Part Time', 1, 2, NULL, 1, '2023-02-17 07:48:29', '2023-02-17 07:48:29');

INSERT INTO `races` (`id`, `name`, `race_code`, `status`) VALUES
(1, 'Chinese', '5100', 1),
(2, 'Malay', '1100', 1),
(3, 'Indian', '6100', 1),
(4, 'Others', '9100', 1);

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

INSERT INTO `roles` (`id`, `name`, `status`) VALUES
(1, 'Local Student', 1),
(2, 'International Student', 1),
(3, 'Superadmin', 1),
(4, 'AARO', 1),
(5, 'AFO', 1),
(6, 'ISO', 1),
(7, 'SRO', 1);

INSERT INTO `school_levels` (`id`, `name`, `status`) VALUES
(1, 'Secondary', 1),
(2, 'Upper Secondary School (for STPM, A Level or other equivalent holders)', 1),
(3, 'Foundation', 1),
(4, 'Diploma', 1),
(5, 'Degree', 1),
(6, 'PhD', 1),
(7, 'Master', 1),
(8, 'Other', 1);

INSERT INTO `semesters` (`id`, `semester`) VALUES
(1, '3'),
(2, '5/6'),
(3, '9/10');

INSERT INTO `users` (`id`, `name`, `role_id`, `acc_status_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 3, 1, 'superadmin@email.com', NULL, '$2y$10$v.Vu8Thay4FsuMgqCsHU8OY7/LBAngr522t38EOViqWo9VrcIxNXO', NULL, '2023-01-03 15:16:56', '2023-01-03 15:16:56'),
(2, 'Local Student', 1, 1, 'localstudent@email.com', NULL, '$2y$10$.QcHWlPbZwagZ7uUUEj7seLYT17bmIHpSz5GJl9DJfbl0nUBihPGm', NULL, '2023-01-03 15:35:55', '2023-01-03 15:35:55');

