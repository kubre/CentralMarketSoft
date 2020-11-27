-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2019 at 05:03 AM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lasuragr_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `belongs_to` int(11) NOT NULL,
  `block_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `belongs_to`, `block_no`, `village`, `city`, `district`, `created_at`, `updated_at`) VALUES
(10, 500002, 'खोजेवाड़ी', 'खोजेवाड़ी', 'गंगापुर', 'औरंगाबाद', '2019-02-16 10:02:41', '2019-02-16 10:02:41'),
(9, 7, 'APMC Shopping complex , Shop NO. 15', 'Lasur station', 'Gangapur', 'Aurangabad', '2019-02-16 10:02:13', '2019-02-16 10:02:13'),
(8, 6, 'LASURSTATION SWANGI POINT', 'LASUESTATION', 'LASURSTATION', 'AURANGABAD', '2019-02-16 09:36:06', '2019-02-16 09:36:06'),
(5, 4, '246/2, जुना मोंढा', 'लासूर स्टेशन', 'लासूर', 'औरंगाबाद', '2019-02-16 08:31:08', '2019-02-16 08:31:08'),
(6, 500001, 'नाही', 'सुलतानाबाद', 'गंगापूर', 'औरंगाबाद', '2019-02-16 08:38:27', '2019-02-16 08:38:27'),
(7, 5, 'Lasur station', 'Lasur station', 'Gangapur', 'Aurangabad', '2019-02-16 08:42:05', '2019-02-16 08:42:05'),
(11, 500003, '123', 'शिरेगाव', 'गंगापूर', 'औरंगाबाद', '2019-02-16 10:21:24', '2019-02-16 10:21:24'),
(12, 8, 'SAWANGI LASUR STATION', 'LASUR STATION', 'GANGAPUR', 'AURINGABAD', '2019-02-16 10:21:34', '2019-02-16 10:21:34'),
(13, 9, 'House no.188 shop no.1 lasur station gangapur', 'Kasur station', 'Lasur', 'Aurangabad', '2019-02-16 10:34:41', '2019-02-16 10:34:41'),
(14, 500004, 'घोडेगाव', 'घोडेगाव', 'गंगापुर', 'औरंगाबाद', '2019-02-16 10:41:39', '2019-02-16 10:41:39'),
(15, 10, 'देवगरी बँके जवळ लासूर गंगापूर रोड लासूर स्टेशन', 'लासूर स्टेशन', 'गंगापूर', 'औरंगाबाद', '2019-02-16 10:45:48', '2019-02-16 10:45:48'),
(16, 11, '440 lasur', 'Lasur station', 'Aurangabad', 'Aurangabad', '2019-02-16 10:56:08', '2019-02-16 10:56:08'),
(17, 12, 'लासुर स्टेशन ता. गंगापूर जि.औरंगाबाद', 'लासुर स्टेशन', 'गंगापूर', 'औरंगाबाद', '2019-02-16 12:02:50', '2019-02-16 12:02:50'),
(18, 500005, '20', 'वडाऴि', 'गंगापुर', 'औरंगाबाद', '2019-02-16 13:14:38', '2019-02-16 13:14:38'),
(19, 13, 'juna mondha ,grampanchayat shopping centre ,shop no.5', 'lasur stn.', 'lasur station', 'Aurangabad', '2019-02-17 06:10:34', '2019-02-17 06:10:34'),
(20, 14, 'जुना मोंढा', 'लासूर स्टेशन', 'AURANGABAD', 'औरंगाबाद', '2019-02-17 07:41:27', '2019-02-17 07:41:27'),
(21, 15, 'सावंगी गंगापूर रोड लासुर टेशन', 'सावंगी लासुर स्टेशन', 'लासुर स्टेशन', 'औरंगाबाद', '2019-02-17 10:06:03', '2019-02-17 10:06:03'),
(22, 500006, 'अवलगाव', 'अवलगाव', 'वैजापुर', 'औरंगाबाद', '2019-02-18 04:50:58', '2019-02-18 04:50:58'),
(23, 500007, '20', 'सावंगी', 'गंगापुर', 'औरंगाबाद', '2019-02-18 04:55:55', '2019-02-18 04:55:55'),
(24, 500008, 'घोडेगाव', 'घोडेगाव', 'गंगापुर', 'औरंगाबाद', '2019-02-18 05:05:37', '2019-02-18 05:05:37'),
(25, 500009, '9960270462', 'बाभुळगाव', 'गंगापुर', 'औरंगाबाद', '2019-02-18 05:44:06', '2019-02-18 05:44:06'),
(26, 16, 'मु-वसुसायगाव ता.गंगापुर जि.औ.बाद', 'वसुसायगाव', 'लासुर स्टेशन', 'औरंगाबाद', '2019-02-18 08:09:09', '2019-02-18 08:09:09'),
(27, 500010, '000', 'चाम्भार्वाडी', 'वैजापूर', 'औरंगाबाद', '2019-02-18 08:29:49', '2019-02-18 08:29:49'),
(28, 17, 'सावंगी चौक लासूर स्टेशन', 'Lasu', 'लासूर', 'औरंगाबाद', '2019-02-18 08:43:31', '2019-02-18 08:43:31'),
(29, 500011, '20', 'एकबुरजीवाघलगाव', 'गंगापुर', 'औरंगाबाद', '2019-02-18 09:00:30', '2019-02-18 09:00:30'),
(30, 500012, '0000000000', 'सुलतनाबाद', 'गंगापूर', 'औरंगाबाद', '2019-02-21 03:20:16', '2019-02-21 03:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `debits`
--

CREATE TABLE `debits` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `debits`
--

INSERT INTO `debits` (`id`, `amount`, `farmer_id`, `user_id`, `created_at`, `updated_at`, `comment`) VALUES
(6, '5539.00', 500004, 6, '2019-02-16 10:44:30', '2019-02-16 10:44:30', 'सीड औषिधी खते'),
(5, '3000.00', 500002, 6, '2019-02-16 10:10:19', '2019-02-16 10:10:19', 'सीड'),
(4, '28770.00', 500001, 4, '2019-02-16 08:40:23', '2019-02-16 08:40:23', 'खत बियाणे औषधी'),
(7, '18121.00', 500005, 6, '2019-02-16 13:20:19', '2019-02-16 13:26:37', 'सीड औषिधी खते'),
(8, '5503.00', 500001, 7, '2019-02-17 05:32:36', '2019-02-17 05:32:36', 'seed  pesticide, kanda bardana.'),
(9, '11621.00', 500006, 6, '2019-02-18 04:51:46', '2019-02-18 08:56:17', 'सीड औषिधी खते'),
(10, '6830.00', 500007, 6, '2019-02-18 04:56:53', '2019-02-18 04:56:53', 'सीड औषिधी'),
(11, '11215.00', 500008, 6, '2019-02-18 05:06:17', '2019-02-18 05:09:12', 'सीड औषिधी'),
(12, '7000.00', 500010, 1, '2019-02-18 08:31:55', '2019-02-18 08:31:55', 'सिड्स  बिल'),
(13, '6048.00', 500011, 6, '2019-02-18 09:01:21', '2019-02-18 09:01:21', 'सीड औषिधी'),
(14, '56409.00', 500012, 10, '2019-02-21 03:22:49', '2019-02-21 03:26:14', 'बियाणे व कीटनाशके');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `aadhar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `light_bill` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`id`, `first_name`, `last_name`, `mobile`, `dob`, `aadhar`, `pan`, `light_bill`, `created_at`, `updated_at`) VALUES
(500002, 'अन्ना संपतचक्रे', 'चक्रे', '7507765733', '2019-02-16', '519253415506', '9999999999', '00', '2019-02-16 10:02:41', '2019-02-16 10:02:41'),
(500001, 'सखाहरी लक्ष्मण', 'गायके', '9999999999', '2019-02-16', '123456789012', '1234567890', 'नाही', '2019-02-16 08:38:27', '2019-02-16 08:38:27'),
(500003, 'पप्पूलाल शामलाल', 'कुकलारे', '9960521922', '1979-05-01', '123456789000', '1234567878', '1146', '2019-02-16 10:21:24', '2019-02-16 10:21:24'),
(500004, 'अज्मोदीन चाँद', 'शेख', '8805618968', '2019-02-16', '222222222222', '4444444444', '00', '2019-02-16 10:41:39', '2019-02-16 10:41:39'),
(500005, 'अरुण हरिचद', 'लोंढे', '9764613404', '2019-02-16', '000000000000', '3333333333', '00', '2019-02-16 13:14:38', '2019-02-16 13:14:38'),
(500006, 'अजय भावराव', 'शिन्दे', '9881590148', '2019-02-18', '988159014800', '1111111111', '00', '2019-02-18 04:50:58', '2019-02-18 04:50:58'),
(500007, 'अशोक कचरू', 'पवार', '8007271454', '2019-02-18', '800727145400', '8007271454', '00', '2019-02-18 04:55:55', '2019-02-18 04:55:55'),
(500008, 'अशोक काशीनाथ', 'राऊत', '9970559648', '2019-02-18', '997055964800', '9970559648', '00', '2019-02-18 05:05:37', '2019-02-18 05:05:37'),
(500009, 'जानार्धन रंगनाथ', 'मोरे', '9960270462', '1111-11-11', '996027046200', '9960270462', '9960270462', '2019-02-18 05:44:06', '2019-02-18 05:44:06'),
(500010, 'संदिप धनराज', 'दुमाले', '7588166616', '1985-12-05', '686436743431', '7588166616', '0000', '2019-02-18 08:29:49', '2019-02-18 08:29:49'),
(500011, 'बजरंग किसान', 'सुलाने', '9096106539', '2019-02-18', '909610653900', '9096106539', '00', '2019-02-18 09:00:30', '2019-02-18 09:00:30'),
(500012, 'कारभारी सकाहारी', 'गायके', '9404988092', '1972-02-21', '555555555555', '0000000000', '0000000000', '2019-02-21 03:20:16', '2019-02-21 03:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_25_094852_create_shops_table', 1),
(4, '2019_01_25_095401_create_addresses_table', 1),
(5, '2019_01_29_090203_create_farmers_table', 1),
(6, '2019_01_30_063933_create_debits_table', 1),
(7, '2019_02_05_065048_add_comment_to_debits', 1),
(8, '2019_02_05_092736_create_transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(10) UNSIGNED NOT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `shop_do` date NOT NULL,
  `seed_lic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seed_exp` date NOT NULL,
  `fert_lic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fert_exp` date NOT NULL,
  `pest_lic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pest_exp` date NOT NULL,
  `shop_act` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_exp` date NOT NULL,
  `gst` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadhar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `shop_name`, `dob`, `shop_do`, `seed_lic`, `seed_exp`, `fert_lic`, `fert_exp`, `pest_lic`, `pest_exp`, `shop_act`, `shop_exp`, `gst`, `aadhar`, `pan`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Demo', '2018-01-14', '2018-01-14', 'vaibhav', '2018-01-14', 'NA', '2018-01-14', 'NA', '2018-01-14', 'NA', '2018-01-14', 'NA', '758820142512', 'ABCDE1234F', 1, '2019-02-15 12:31:26', '2019-02-15 12:31:26'),
(6, 'GANESH KRUSHI SEVA KENDRA [SWANGI]', '1974-07-16', '2009-05-29', 'LASD15030046', '2021-05-28', 'LAFD15030096', '2021-05-28', 'LAID15030254', '2030-12-31', '1641500381335523', '2020-12-31', '27BGCPP8870Q1ZE', '519253415506', 'BGCPP8870Q', 6, '2019-02-16 09:36:06', '2019-02-16 09:36:06'),
(4, 'गौतमचंद प्रकाशचंद मुथा', '1961-04-12', '1999-03-25', 'LASD15030218', '2020-03-25', 'LAFD15030005', '2019-08-06', 'LAID15030244', '2019-03-31', '107521671803', '2021-12-10', '27AIHPM6998C1ZS', '501477303504', 'AIHPM6998C', 4, '2019-02-16 08:31:08', '2019-02-16 08:31:08'),
(5, 'Agree Gajanan Kristi Devs Kendra', '1986-02-03', '2008-05-25', 'LASD15030207', '2020-05-22', 'LAFD15030058', '2020-05-22', 'LAID15030036', '2019-02-16', '1741500311437713', '2020-11-11', '27BCEPK8524J1ZC', '452764068542', 'BCEPK8524J', 5, '2019-02-16 08:42:05', '2019-02-16 08:42:05'),
(7, 'अमृता ॲग्रो', '1982-06-07', '2011-04-11', 'LASD15030191', '2020-03-30', 'LAFD15030137', '2020-03-30', 'LAID15030241', '2019-02-16', '1641500310711575', '2019-12-20', '27ANHPG3328H1Z4', '367933604488', 'ANHPG3328H', 7, '2019-02-16 10:02:13', '2019-02-16 10:02:13'),
(8, 'SAWATA KRUSHI SEVA KINDRE', '1988-03-27', '2010-03-10', 'LASD15030210', '2019-03-09', 'LAFD15030108', '2019-03-09', 'LAID15030078', '2019-12-31', '00', '2050-11-01', '27BGJPP5317H1Z6', '332069193132', 'BGJPP5317H', 8, '2019-02-16 10:21:34', '2019-02-16 10:21:34'),
(9, 'Pol agro trader', '2002-07-15', '2002-07-15', 'LASD15030007', '2020-07-14', 'LAFD15030023', '2020-07-14', 'LAID15030008', '2019-12-31', '1641500310634323', '2019-11-28', '27ALOPP5679B1ZM', '349793016329', 'ALOPP5679B', 9, '2019-02-16 10:34:41', '2019-02-16 10:34:41'),
(10, 'हरी ओम ऍग्रो अँड हरी ओम ट्रेडर्स', '2019-02-16', '2019-02-16', '00', '2019-02-16', '77', '2019-02-16', '00', '2019-02-16', '00', '2019-02-16', '27AIFPB4603F1ZT', '496744074943', 'AIFPB4603F', 10, '2019-02-16 10:45:48', '2019-02-16 10:45:48'),
(11, 'समर्थ ऍग्रो', '1991-01-18', '2015-05-19', 'LASD15030422', '2019-01-26', 'LAFD15030502', '2019-04-11', 'LAID15030462', '2019-12-31', '1641500310424706', '2014-04-14', '27FVMPS5105L1ZY', '937812915585', 'Ghops786f1', 11, '2019-02-16 10:56:08', '2019-02-16 10:56:08'),
(12, 'श्री साई अग्रो सर्व्हीसेस', '1989-05-07', '2016-06-13', 'LASD15030478', '2021-06-14', 'lafd', '2019-11-30', 'LAID15030493', '2019-12-31', 'Mh04a0045360', '2021-02-25', '27CMFPS6804P1ZA', '797283414846', 'CMFPS6804P', 12, '2019-02-16 12:02:50', '2019-02-16 12:02:50'),
(13, 'chavan agro services', '1988-09-20', '1988-04-01', 'LASD 15030006', '2020-06-06', 'LAFD 15030104', '2019-10-17', 'LAID 15030002', '2019-08-17', '1941500312875484', '2024-12-21', '27AQKPC9557E1ZM', '606982227559', 'AQKPC9557E', 13, '2019-02-17 06:10:34', '2019-02-17 06:10:34'),
(14, 'आदिनाथ कृषी सेवा केंद्र', '1983-08-16', '1998-01-01', 'LASDl5030273', '2019-10-18', 'LAFD15030012', '2019-03-26', 'LAID15030022', '2019-12-31', '1641500310660809', '2019-12-06', '27AASPT4574G1ZZ', '671805433376', 'AASPT4574G', 14, '2019-02-17 07:41:27', '2019-02-17 07:41:27'),
(15, 'ईश्वर कृषी सेवा केंद्र', '1986-01-05', '2012-02-20', 'Lasd 15030217', '2020-04-10', 'Lafd 15030440', '2020-04-10', 'Laid15030255', '2020-12-30', '962/2012', '2020-12-31', '27akipt6888m1zy', '917800613784', 'Akipt6888m', 15, '2019-02-17 10:06:03', '2019-02-17 10:06:03'),
(16, 'कृषिउद्योग फर्टिलाझर', '1960-04-01', '2015-02-18', 'LASD15030395', '2021-07-01', 'LAFD15030477', '2021-07-01', 'LAID15030437', '2019-02-18', '9234', '2019-02-18', '27AEOPS4718M1ZP', '417677424510', 'AEOPS4718M', 16, '2019-02-18 08:09:09', '2019-02-18 08:09:09'),
(17, 'साई ऍग्रो सर्विसेस', '1987-08-17', '2016-06-12', 'Lasd15030430', '2019-06-19', 'Lafd15030509', '2019-06-19', 'Laid15030464', '2019-12-31', '102259231603', '2019-07-18', '27AXJPT2565k1ZT', '351953319744', 'AXJPT2565k', 17, '2019-02-18 08:43:31', '2019-02-18 08:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `debit_id` int(11) NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `debit_id`, `amount`, `created_at`, `updated_at`) VALUES
(15, 8, '5503.00', '2019-02-17 05:32:36', '2019-02-17 05:32:36'),
(14, 7, '18121.00', '2019-02-16 13:26:37', '2019-02-16 13:26:37'),
(13, 7, '18121.00', '2019-02-16 13:26:25', '2019-02-16 13:26:25'),
(12, 7, '18123.00', '2019-02-16 13:24:20', '2019-02-16 13:24:20'),
(11, 7, '18124.00', '2019-02-16 13:20:19', '2019-02-16 13:20:19'),
(10, 6, '5539.00', '2019-02-16 10:44:30', '2019-02-16 10:44:30'),
(9, 5, '3000.00', '2019-02-16 10:10:19', '2019-02-16 10:10:19'),
(8, 4, '28770.00', '2019-02-16 08:40:23', '2019-02-16 08:40:23'),
(16, 9, '11622.00', '2019-02-18 04:51:46', '2019-02-18 04:51:46'),
(17, 10, '6830.00', '2019-02-18 04:56:53', '2019-02-18 04:56:53'),
(18, 11, '11220.00', '2019-02-18 05:06:17', '2019-02-18 05:06:17'),
(19, 11, '11215.00', '2019-02-18 05:08:50', '2019-02-18 05:08:50'),
(20, 11, '11215.00', '2019-02-18 05:09:12', '2019-02-18 05:09:12'),
(21, 11, '11215.00', '2019-02-18 05:09:12', '2019-02-18 05:09:12'),
(22, 12, '7000.00', '2019-02-18 08:31:55', '2019-02-18 08:31:55'),
(23, 9, '11621.00', '2019-02-18 08:56:17', '2019-02-18 08:56:17'),
(24, 13, '6048.00', '2019-02-18 09:01:21', '2019-02-18 09:01:21'),
(25, 14, '56409.00', '2019-02-21 03:22:49', '2019-02-21 03:22:49'),
(26, 14, '56409.00', '2019-02-21 03:26:14', '2019-02-21 03:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `password`, `role`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '7588201425', '$2y$10$usp6emCzEQkTbCqxoe47t.HiMnMZDXMU5QTTh1Eq9GG2KQgVcvdp.', 'admin', 1, 'yxWLQwE9GvrRNeQKFq224bOgxDcSYoGHPW4eI1f0WCOv9f7293D57luMoI0O', '2019-02-15 12:31:26', '2019-02-15 12:31:26'),
(7, 'राजू सूर्यभान गोटे', '9403679800', '$2y$10$XLwg/pzUS5jSVYJSLtC/KuWjj7Ih/MNkLbA3S1z7Cz8RE50YHu3K2', 'user', 1, 'APV2dTzkz4VqnudwG5nnJ7v3S7pHjdoMi67JPTSTMxKad4UQ2c33f6kaG6qb', '2019-02-16 10:02:13', '2019-02-16 10:06:29'),
(6, 'KRISHNA PARHAD', '9923531178', '$2y$10$7MUVN9XLHvjDfMlZUiknXu.1zPODKOHyAU93vRJJA0YJ8d5q7DMia', 'user', 1, 'ZjN6hqAcBmrsvumKVqjpr1NXfuxo6vGey6gcZHqCHrsqkyKJNGVnQRnvmiZB', '2019-02-16 09:36:06', '2019-02-16 09:38:15'),
(4, 'प्रकाशचंद मानकचंद मुथा', '9922544588', '$2y$10$7CUI8KalmM/0rq.33g5Ho.A/4QQoMJL8xgnyxu58n1UP6AfhepXka', 'user', 1, 'fRmBrCfkuIW236YD6xHGDoxRq6ePHyt7jNftsKHdWXidH4SGsuVQ7ku1iulT', '2019-02-16 08:31:08', '2019-02-16 08:32:03'),
(5, 'Ajit karande', '9823597444', '$2y$10$wFQ70W8mvw0W88PaV0RPBOPMYmx/TYm3BDvKvUwbTiVT8SmgaivpK', 'user', 1, 'CPLSoLkTh7708NeJIlxglEkir4qwyU8oox9C0CnxetWEWcOYq0Xo6wBVplIq', '2019-02-16 08:42:05', '2019-02-16 08:43:24'),
(8, 'ARUNKUMAR BHIMRAV PANDAV', '9209955555', '$2y$10$e9HGnI8NqI5R.pkZYPiROuquddDATfUIEoB8ScLQtQW5HEzCsNHIe', 'user', 1, 'V6JIs28Y5ixJIMlyAQTWIywMlyrUa5cMp9CuZ7W9nrlRgQj0fI5bCW3s1OfF', '2019-02-16 10:21:34', '2019-02-16 10:27:22'),
(9, 'Rajendra Bansidhar pol', '9423486841', '$2y$10$gli1ERyp8LFWcBPjedezqefn3gfWgQ.YLBWu33B02l8HrPe6wT8TC', 'user', 1, 'J6aiQxiuLAw9e3dmWZNINgC5EJCgivdBYx6uGa3x3UzbpyxMDGAJRbNwMFOJ', '2019-02-16 10:34:41', '2019-02-16 10:44:09'),
(10, 'ज्ञानेश्वर आसाराम बोडखे', '8830088396', '$2y$10$7XPE96El8Zxqn7SiaZQAx.QXcVwPpUmK9G14EqM5hGMZ6y7vrmVn.', 'user', 1, 'HUOJBCd3DAu6JOle6Ml5nmGVvc7FDr9ZBkJeKuHGzJ4quqyURjzBeGgCEynu', '2019-02-16 10:45:48', '2019-02-16 10:52:18'),
(11, 'Rushikesh Shinde', '9527452111', '$2y$10$7Bo5KUAmV/lkqHIzcQRhle/SbuC/xShEiFwQA0BJN6EvZ6Of4uyp6', 'user', 0, 'l4y3qDfzgKHa4KCLerYMqbom7ZoUSrLYmoLaEzdb1eParjgXaVl2gSNgDrpo', '2019-02-16 10:56:08', '2019-02-16 10:56:08'),
(12, 'श्री नवनाथ चांगदेव शिंदे', '9422246491', '$2y$10$rlARQK0vMWxDLNvVoaNzj.TUJP7wh2R7vhcJdW2pUu18bNzDJhg1W', 'user', 1, 'bxn3KBCkofpkzqhWQWumcyvKAlY6kLhr0UBcTWDRRJmpwf55C3dgijWQRjNv', '2019-02-16 12:02:50', '2019-02-16 12:11:30'),
(13, 'sunil vinayak chavan', '7276136708', '$2y$10$rdXJ/onPYjwo3/.ZeaCKeumaW0QnEl/kg5035y0ucpApM9aGc/lvC', 'user', 1, 'zCNA8wewyei96hZgzfAuOGU2SyBHhh65KX0H03lk6kh8Bn9tq6Mp4OiKjAzD', '2019-02-17 06:10:34', '2019-02-17 06:15:59'),
(14, 'वर्धमान ठोळे', '9860787278', '$2y$10$ps.t3hMPZ0qfoDWwy0JxXuaDlJwJTZdHbQoyp5s9GtE6o0BTHWmem', 'user', 1, 'x4lM23tBC2a8h5hE6h4MdooXi1iqaPSpcdb1Mo8BQy0a1wpvMDuosxohWWHM', '2019-02-17 07:41:27', '2019-02-18 07:09:31'),
(15, 'राहुल एकनाथ तायडे', '9404678087', '$2y$10$7dxhLnInT0bxCHVlYOLQweHaKN0/AXSknDe9WwNm14r20RCH/QDwW', 'user', 1, 'TlqugTgiTcFNRzvIoTfbi94KEfbzLQ68cw3FWVXAUaCKGT38Vb3RF9sqy4OW', '2019-02-17 10:06:03', '2019-02-17 10:11:03'),
(16, 'मुरलीधर दगडूजी सोनवने', '9764444412', '$2y$10$hBpFhpPQkjsFXDaajRQrauJEA/35NNVC5bLduR71Eb2FQtoSAMSVi', 'user', 1, '9qhO4bdrw4ZCIX3xNKSs4FnNPxCMtWyPQlfvVJZQhh4BeXm6RO0yfn6jPct3', '2019-02-18 08:09:09', '2019-02-18 09:19:43'),
(17, 'राहुल चंद्रभान तायडे पाटील', '9764106111', '$2y$10$mVIxj8APleblKb/OArCxBOBP4I9tZfWtYE46nD7nVOL3uZPkx2Eb.', 'user', 1, 'cqAz2f1ewMBXe83RvWVCwaHPOI5eAWKx5Lp93JYV6pUUvgXAwk10ZyvZ7mZh', '2019-02-18 08:43:31', '2019-02-18 08:45:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debits`
--
ALTER TABLE `debits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `farmers_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `farmers_aadhar_unique` (`aadhar`),
  ADD UNIQUE KEY `farmers_pan_unique` (`pan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_mobile_index` (`mobile`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `debits`
--
ALTER TABLE `debits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500013;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
