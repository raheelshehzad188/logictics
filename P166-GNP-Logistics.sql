-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2022 at 01:17 PM
-- Server version: 5.7.30
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `P166-GNP-Logistics`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(10) NOT NULL,
  `governorate_id` int(11) NOT NULL DEFAULT '1',
  `name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `name_ar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `latitude` text CHARACTER SET latin1,
  `longitude` text CHARACTER SET latin1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `governorate_id`, `name`, `name_ar`, `status`, `latitude`, `longitude`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Abdullah al-Salem', 'عبد الله السالم', 1, '29.351859', '47.983692', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(2, 1, 'Adailiya', 'العديلية', 1, '29.328058', '47.983692', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(3, 1, 'Bneid Al Qar', 'بنيد القار', 1, '29.373051', '48.004744', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(4, 1, 'Daiya', 'الدعية', 1, '29.36044', '48.018371', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(5, 1, 'Dasma', 'الدسمة', 1, '29.366434', '48.000698', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(6, 1, 'Dasman', 'دسمان', 1, '29.387804', '47.99979', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(7, 1, 'Doha', 'الدوحة', 1, '29.315517', '47.81557', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(8, 1, 'Faiha', 'الفيحاء', 1, '29.340433', '47.978739', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(9, 1, 'Granada', 'غرناطة', 1, '29.311803', '47.877959', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(10, 1, 'Jaber Al Ahmad', 'جابر الأحمد', 1, '29.348166', '47.758825', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(11, 1, 'Kaifan', 'كيفان', 1, '29.337567', '47.958935', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(12, 1, 'Khaldiya', 'الخالدية', 1, '29.325196', '47.963885', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(13, 1, 'Kuwait City', 'مدينة الكويت', 1, '29.375859', '47.977405', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(14, 1, 'Mansouriya', 'المنصورية', 1, '29.357338', '47.994836', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(15, 1, 'Mirqab', 'المرقاب', 1, '29.366138', '47.983692', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(16, 1, 'Mubarekiya Camps and Collages', 'المباركية', 1, '29.313741', '47.909455', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(17, 1, 'Nahdha', 'النهضة', 1, '29.304531', '47.859881', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(18, 1, 'Nuzha', 'النزهة', 1, '29.34139', '47.993598', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(19, 1, 'Qadsiya', 'القادسية', 1, '29.349962', '48.003505', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(20, 1, 'Jibla', 'جبلة', 1, '29.369934', '47.968836', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(21, 1, 'Qortuba', 'قرطبة', 1, '29.312348', '47.986168', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(22, 1, 'Rawda', 'الروضة', 1, '29.329013', '47.998551', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(24, 1, 'Shamiya', 'الشامية', 1, '29.350899', '47.968836', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(25, 1, 'Sharq', 'شرق', 1, '29.382323', '47.988644', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(26, 1, 'Shuwaikh Administrative', 'شويخ الإدارية', 1, '29.345207', '47.944652', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(27, 1, 'Sulaibikhat', 'الصليبخات', 1, '29.315559', '47.84026', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(28, 1, 'Surra', 'السرة', 1, '29.313775', '48.00846', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(29, 1, 'Yarmouk', 'اليرموك', 1, '29.312822', '47.968836', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(30, 1, 'Al-Bidea', 'البدع', 1, '29.31928', '48.089659', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(31, 1, 'Bayan', 'بيان', 1, '29.29799', '48.051087', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(32, 1, 'Hawally', 'حولي', 1, '29.333298', '48.015893', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(33, 1, 'Hateen', 'حطين', 1, '29.280617', '48.020655', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(34, 1, 'Jabriya', 'الجابرية', 1, '29.318057', '48.025805', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(35, 1, 'Maidan Hawally', 'ميدان حولي', 1, '29.338792', '48.035417', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(36, 1, 'Mishref', 'مشرف', 1, '29.276103', '48.065471', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(37, 1, 'Mubarak Al-Abdullah', 'مبارك العبدالله', 1, '29.276598', '48.048113', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(38, 1, 'Rumaithiya', 'الرميثية', 1, '29.31803', '48.075392', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(39, 1, 'Salam', 'السلام', 1, '29.296629', '48.013415', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(40, 1, 'Salmiya', 'السالمية', 1, '29.335294', '48.071561', '2018-12-01 19:45:21', '2019-05-20 14:02:27', NULL),
(41, 1, 'Salwa', 'سلوى', 1, '29.296487', '48.079379', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(42, 1, 'Shaab', 'الشعب', 1, '29.349965', '48.028283', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(43, 1, 'Shuhada', 'الشهداء', 1, '29.270894', '48.03324', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(44, 1, 'Al-Siddeeq', 'الصديق', 1, '29.293778', '47.993598', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(45, 1, 'Zahra', 'الزهراء', 1, '29.278063', '47.996074', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(46, 1, 'Abbasiya', 'العباسية', 1, '29.262037', '47.9330450', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(47, 1, 'Abdullah Al Mubarak Al Sabah', 'عبدالله المبارك الصباح', 1, '29.243378', '47.900341', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(48, 1, 'Abraq Khaitan', 'أبرق خيطان', 1, '29.295887', '47.969647', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(49, 1, 'Kuwait International Airport', 'مطار الكويت الدولي', 1, '29.239733', '47.971157', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(50, 1, 'Andalous', 'الأندلس', 1, '29.304205', '47.884732', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(51, 1, 'Al-Ardiya', 'العارضية', 1, '29.29138', '47.906982', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(54, 1, 'Ishbiliya', 'أشبيلية', 1, '29.272833', '47.939137', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(55, 1, 'Al-Dajeej', 'الضجيج', 1, '29.261645', '47.962647', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(57, 1, 'Farwaniya', 'الفروانية', 1, '29.281596', '47.960252', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(58, 1, 'Firdous', 'الفردوس', 1, '29.286122', '47.874846', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(59, 1, 'Jeleeb Al-Shuyoukh', 'جليب الشيوخ', 1, '29.255222', '47.936663', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(60, 1, 'Khaitan', 'خيطان', 1, '29.279973', '47.976263', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(61, 1, 'Omariya', 'العمرية', 1, '29.297587', '47.953984', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(62, 1, 'Rabia', 'الرابية', 1, '29.29663', '47.939137', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(63, 1, 'Rai', 'الري', 1, '29.308054', '47.944086', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(64, 1, 'Rigai', 'الرقعي', 1, '29.300313', '47.912557', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(65, 1, 'Rehab', 'الرحاب', 1, '29.285207', '47.934189', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(66, 1, 'Sabah Al Nasser', 'صباح الناصر', 1, '29.270908', '47.884732', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(68, 1, 'Abu Halifa', 'أبو حليفة', 1, '29.127176', '48.125025', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(69, 1, 'Al-Julaia\'a', 'الجليعة', 1, '28.883724', '48.252833', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(71, 1, 'Ali Sabah Al Salem', 'علي صباح السالم', 1, '28.957047', '48.154826', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(72, 1, 'Dahar', 'الظهر', 1, '29.169834', '48.062216', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(73, 1, 'Ahmadi', 'الأحمدي', 1, '29.085376', '48.065471', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(74, 1, 'Eqaila', 'العقيلة', 1, '29.168753', '48.102684', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(75, 1, 'Fahad Al Ahmad', 'فهد الأحمد', 1, '29.127708', '48.107648', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(76, 1, 'Fahaheel', 'الفحيحيل', 1, '29.083128', '48.133464', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(77, 1, 'Fintas', 'الفنطاس', 1, '29.169667', '48.117577', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(78, 1, 'Hadiya', 'هدية', 1, '29.145882', '48.092758', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(79, 1, 'Jaber Al Ali', 'جابر العلي', 1, '29.169273', '48.085315', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(80, 1, 'Al Khiran', 'الخيران', 1, '28.669111', '48.368883', '2018-12-01 19:45:21', '2019-05-16 12:06:00', NULL),
(82, 1, 'Mahboula', 'المهبولة', 1, '29.149656', '48.119199', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(83, 1, 'Mangaf', 'المنقف', 1, '29.107061', '48.123989', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(84, 1, 'Shalayhat Mina Abdullah', 'شليهات ميناء عبدالله', 1, '28.970485', '48.172955', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(86, 1, 'Al-Nuwaiseeb', 'النويصيب', 1, '28.552522', '48.378274', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(87, 1, 'Al-Riqqa', 'الرقة', 1, '29.150403', '48.10536', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(88, 1, 'Sabah Al Ahmad', 'صباح الأحمد', 1, '28.777166', '48.029964', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(90, 1, 'Assabahiyah', 'الصباحية', 1, '29.106801', '48.106889', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(92, 1, 'Al Wafra', 'الوفرة', 1, '28.607715', '48.042301', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(94, 1, 'Naeem', 'النعيم', 1, '29.333489', '47.69352', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(95, 1, 'Amgarah Industrial Area', 'منطقة أمغرة الصناعية', 1, '29.306647', '47.750959', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(96, 1, 'Al Jahra', 'الجهراء', 1, '29.336573', '47.675529', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(98, 1, 'Naseem', 'النسيم', 1, '29.318962', '47.677514', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(99, 1, 'Oyoun', 'العيون', 1, '29.330282', '47.657821', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(100, 1, 'Qairawan', 'القيروان', 1, '29.300282', '47.800761', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(101, 1, 'Qasr', 'القصر', 1, '29.340858', '47.697214', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(102, 1, 'Saad Al Abdullah', 'سعد العبدالله', 1, '29.313868', '47.719386', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(103, 1, 'Sulaibiya', 'الصليبية', 1, '29.285577', '47.818038', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(104, 1, 'Al Sulaibiya Industrial 1', 'الصليبية الصناعية 1', 1, '29.287035', '47.84026', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(105, 1, 'Al Sulaibiya Industrial 2', 'الصليبية الصناعية 2', 1, '29.281824', '47.85755', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(107, 1, 'Taima\'', 'تيماء', 1, '29.330368', '47.682438', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(108, 1, 'Waha', 'الواحة', 1, '29.344514', '47.657821', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(109, 1, 'Abu Fatira', 'أبو فطيرة', 1, '29.197372', '48.102684', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(110, 1, 'Abu Al Hasaniya', 'أبو الحصانية', 1, '29.190906', '48.113853', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(111, 1, 'Adan', 'العدان', 1, '29.22844', '48.065471', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(112, 1, 'Al-Masayel', 'المسايل', 1, '29.239367', '48.087796', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(113, 1, 'Qurain', 'القرين', 1, '29.202195', '48.077872', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(114, 1, 'Qusor', 'القصور', 1, '29.214601', '48.072911', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(116, 1, 'Fnaitees', 'فنيطيس', 1, '29.220757', '48.095239', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(117, 1, 'Messila', 'المسيلة', 1, '29.250084', '48.093999', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(118, 1, 'Mubarak Al Kabeer', 'مبارك الكبير', 1, '29.18835', '48.085315', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(119, 1, 'Sabah Al Salem', 'صباح السالم', 1, '29.256564', '48.062605', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(120, 1, 'Sabhan Industrial Area', 'منطقة صبحان الصناعية', 1, '29.226426', '48.014416', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(123, 1, 'Wista', 'وسطي', 1, '29.230376', '48.045634', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(124, 1, 'Shuwaikh Residential', 'شويخ السكنية', 1, '29.3547538', '47.9438412', '2018-12-01 19:45:21', '2018-12-01 19:45:21', NULL),
(125, 1, 'Shuwaikh Industrial', 'الشويخ الصناعية', 1, '29.3310171', '47.9229354', '2021-04-18 19:45:21', '2021-04-18 19:45:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 = inactive, 1 = active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `name`, `area_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dfdf', 3, 1, '2022-04-15 20:02:25', '2022-04-15 20:03:10', '2022-04-15 20:03:10'),
(2, '1', 40, 1, '2022-04-15 21:03:26', '2022-04-25 08:43:51', NULL),
(3, '2', 40, 1, '2022-04-16 06:49:02', '2022-04-25 08:44:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `call_centers`
--

CREATE TABLE `call_centers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 = inactive, 1 = active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `call_centers`
--

INSERT INTO `call_centers` (`id`, `agent_name`, `contact_number`, `username`, `password`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'soumya', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(2, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(3, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(4, 'xcvx', '453454', 'sdfsd', 'dfsdf', 0, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(5, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(6, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(7, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(8, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(9, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(10, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(11, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(12, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(13, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(14, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(15, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(16, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(17, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(18, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(19, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(20, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(21, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(22, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(23, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(24, 'xcvx', '453454', 'sdfsd', 'dfsdf', 1, '2022-04-16 01:53:56', '2022-04-16 01:53:56', NULL),
(25, 'ABCED', '324234', '123', '123456', 1, '2022-04-16 06:53:43', '2022-04-16 06:53:43', NULL),
(26, 'sdasd', '2825258525', 'erty', '123456', 1, '2022-04-18 02:27:30', '2022-04-18 02:27:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `batch_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_sr_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cif_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civil_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` int(11) DEFAULT NULL,
  `telephone_no` int(11) DEFAULT NULL,
  `delivery_date` timestamp NULL DEFAULT NULL,
  `governorate_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `block_id` int(11) DEFAULT NULL,
  `street` text COLLATE utf8mb4_unicode_ci,
  `avenue` text COLLATE utf8mb4_unicode_ci,
  `house_no` text COLLATE utf8mb4_unicode_ci,
  `floor` text COLLATE utf8mb4_unicode_ci,
  `flat` text COLLATE utf8mb4_unicode_ci,
  `latitude` text COLLATE utf8mb4_unicode_ci,
  `longitude` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL COMMENT '0 = out_for_delivery, 1 = return_to_bank, 2 = delivered, 3 = others',
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `agent_id`, `driver_id`, `batch_no`, `batch_sr_no`, `card_no`, `customer_name`, `cif_no`, `civil_id`, `mobile_no`, `telephone_no`, `delivery_date`, `governorate_id`, `area_id`, `block_id`, `street`, `avenue`, `house_no`, `floor`, `flat`, `latitude`, `longitude`, `status`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, NULL, '51', '2', '98765430987', 'Aziz', '9876', '514326181', 56785678, 25653092, '2022-04-21 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2022-04-21 05:11:30', '2022-04-21 05:35:14', NULL),
(2, 3, 2, '51', '3', '13281680811', 'Taha', '6556', '1213213112', 98767890, 25654541, '2022-04-21 18:30:00', NULL, 4, 3, 'zxczx', 'zxczx', 'czx', 'czxczx', 'c', NULL, NULL, 4, 'zxczxczxc', '2022-04-21 05:11:30', '2022-04-21 05:34:44', NULL),
(3, 9, 2, '51', '4', '17198918297', 'Ahmed', '9090', '13243242424', 66787657, 25659812, '2022-04-21 18:30:00', NULL, 4, 3, 'zX', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'xzc', '2022-04-21 05:11:31', '2022-04-21 05:32:15', NULL),
(4, 9, NULL, '51', '2', '13251810291', 'Adnan', '1511', '1234', 1234567890, 25651091, '2022-04-22 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 8, 'xzczxc', '2022-04-21 05:11:31', '2022-04-22 04:50:39', NULL),
(5, 9, NULL, '51', '6', '324523445', 'Soumya', '144', '34543', 3455, 2582585, '2022-04-21 18:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2022-04-21 05:11:31', '2022-04-21 05:15:27', NULL),
(6, 9, NULL, '51', '2', '98765430987', 'Aziz', '9876', '514326181', 56785678, 25653092, '2022-04-25 21:00:00', NULL, 40, 3, 'Yousif Homoud Street 6 Lane', '1', '2', '3', '4', '29.34282837178513', '48.08525964970704', 1, NULL, '2022-04-21 05:57:43', '2022-04-25 10:17:17', NULL),
(7, 9, NULL, '51', '3', '13281680811', 'Taha', '6556', '1213213112', 98767890, 25654541, '2022-04-22 18:30:00', NULL, 4, 3, 'xcvx', 'cvxc', 'vxc', 'vxc', 'v', NULL, NULL, 1, 'xcvxc', '2022-04-21 05:57:44', '2022-04-22 07:13:22', NULL),
(8, 9, NULL, '51', '4', '17198918297', 'Ahmed', '9090', '13243242424', 66787657, 25659812, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-04-21 05:57:44', '2022-04-21 05:57:56', NULL),
(9, NULL, NULL, '51', '5', '13251810291', 'Adnan', '1511', '1.22425E+14', 98709887, 25651091, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-04-21 05:57:44', '2022-04-21 05:57:44', NULL),
(10, NULL, NULL, '51', '6', '324523445', 'Soumya', '144', '34543', 3455, 2582585, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 0, NULL, '2022-04-21 05:57:44', '2022-04-21 05:57:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` tinyint(4) DEFAULT NULL COMMENT '1 = spinning cycle, 2 = personal training, 3 = group class',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `num_seats` int(11) DEFAULT NULL,
  `seat_price` decimal(10,3) DEFAULT NULL,
  `floor_price` decimal(10,3) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `duration_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_visibility` tinyint(4) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `module`, `image`, `name`, `description`, `num_seats`, `seat_price`, `floor_price`, `duration`, `duration_label`, `app_visibility`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 'Sweat Cycle', NULL, 26, '10.000', '260.000', 60, 'One Hour', 1, 1, '2022-04-15 03:12:23', '2022-04-15 03:12:23', NULL),
(2, 1, NULL, 'Spin Cycle', NULL, 26, '5.000', '130.000', 60, 'One Hour', 1, 1, '2022-04-15 03:12:25', '2022-04-15 03:12:25', NULL),
(3, 2, NULL, 'Personal Training', NULL, 2, NULL, NULL, 60, 'One Hour', 1, 1, '2022-04-15 03:12:27', '2022-04-15 03:12:27', NULL),
(4, 3, NULL, 'Zumba', NULL, 8, '10.000', '80.000', 60, 'One Hour', 1, 1, '2022-04-15 03:12:27', '2022-04-15 03:12:27', NULL),
(5, 3, NULL, 'Power Yoga', NULL, 8, '10.000', '80.000', 60, 'One Hour', 1, 1, '2022-04-15 03:12:27', '2022-04-15 03:12:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_cycles`
--

CREATE TABLE `class_cycles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_cycles`
--

INSERT INTO `class_cycles` (`id`, `class_id`, `name`, `position`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Cycle1', 1, 1, '2022-04-15 03:12:23', '2022-04-15 03:12:23', NULL),
(2, 1, 'Cycle2', 2, 1, '2022-04-15 03:12:24', '2022-04-15 03:12:24', NULL),
(3, 1, 'Cycle3', 3, 1, '2022-04-15 03:12:24', '2022-04-15 03:12:24', NULL),
(4, 1, 'Cycle4', 4, 1, '2022-04-15 03:12:24', '2022-04-15 03:12:24', NULL),
(5, 1, 'Cycle5', 5, 1, '2022-04-15 03:12:24', '2022-04-15 03:12:24', NULL),
(6, 1, 'Cycle6', 6, 1, '2022-04-15 03:12:24', '2022-04-15 03:12:24', NULL),
(7, 1, 'Cycle7', 7, 1, '2022-04-15 03:12:24', '2022-04-15 03:12:24', NULL),
(8, 1, 'Cycle8', 8, 1, '2022-04-15 03:12:24', '2022-04-15 03:12:24', NULL),
(9, 1, 'Cycle9', 9, 1, '2022-04-15 03:12:24', '2022-04-15 03:12:24', NULL),
(10, 1, 'Cycle10', 10, 1, '2022-04-15 03:12:24', '2022-04-15 03:12:24', NULL),
(11, 1, 'Cycle11', 11, 1, '2022-04-15 03:12:24', '2022-04-15 03:12:24', NULL),
(12, 1, 'Cycle12', 12, 1, '2022-04-15 03:12:24', '2022-04-15 03:12:24', NULL),
(13, 1, 'Cycle13', 13, 1, '2022-04-15 03:12:24', '2022-04-15 03:12:24', NULL),
(14, 1, 'Cycle14', 14, 1, '2022-04-15 03:12:24', '2022-04-15 03:12:24', NULL),
(15, 1, 'Cycle15', 15, 1, '2022-04-15 03:12:25', '2022-04-15 03:12:25', NULL),
(16, 1, 'Cycle16', 16, 1, '2022-04-15 03:12:25', '2022-04-15 03:12:25', NULL),
(17, 1, 'Cycle17', 17, 1, '2022-04-15 03:12:25', '2022-04-15 03:12:25', NULL),
(18, 1, 'Cycle18', 18, 1, '2022-04-15 03:12:25', '2022-04-15 03:12:25', NULL),
(19, 1, 'Cycle19', 19, 1, '2022-04-15 03:12:25', '2022-04-15 03:12:25', NULL),
(20, 1, 'Cycle20', 20, 1, '2022-04-15 03:12:25', '2022-04-15 03:12:25', NULL),
(21, 1, 'Cycle21', 21, 1, '2022-04-15 03:12:25', '2022-04-15 03:12:25', NULL),
(22, 1, 'Cycle22', 22, 1, '2022-04-15 03:12:25', '2022-04-15 03:12:25', NULL),
(23, 1, 'Cycle23', 23, 1, '2022-04-15 03:12:25', '2022-04-15 03:12:25', NULL),
(24, 1, 'Cycle24', 24, 1, '2022-04-15 03:12:25', '2022-04-15 03:12:25', NULL),
(25, 1, 'Cycle25', 25, 1, '2022-04-15 03:12:25', '2022-04-15 03:12:25', NULL),
(26, 1, 'Cycle26', 26, 1, '2022-04-15 03:12:25', '2022-04-15 03:12:25', NULL),
(27, 2, 'Cycle 1', 1, 1, '2022-04-15 03:12:25', '2022-04-15 03:12:25', NULL),
(28, 2, 'Cycle 2', 2, 1, '2022-04-15 03:12:25', '2022-04-15 03:12:25', NULL),
(29, 2, 'Cycle 3', 3, 1, '2022-04-15 03:12:26', '2022-04-15 03:12:26', NULL),
(30, 2, 'Cycle 4', 4, 1, '2022-04-15 03:12:26', '2022-04-15 03:12:26', NULL),
(31, 2, 'Cycle 5', 5, 1, '2022-04-15 03:12:26', '2022-04-15 03:12:26', NULL),
(32, 2, 'Cycle 6', 6, 1, '2022-04-15 03:12:26', '2022-04-15 03:12:26', NULL),
(33, 2, 'Cycle 7', 7, 1, '2022-04-15 03:12:26', '2022-04-15 03:12:26', NULL),
(34, 2, 'Cycle 8', 8, 1, '2022-04-15 03:12:26', '2022-04-15 03:12:26', NULL),
(35, 2, 'Cycle 9', 9, 1, '2022-04-15 03:12:26', '2022-04-15 03:12:26', NULL),
(36, 2, 'Cycle 10', 10, 1, '2022-04-15 03:12:26', '2022-04-15 03:12:26', NULL),
(37, 2, 'Cycle 11', 11, 1, '2022-04-15 03:12:26', '2022-04-15 03:12:26', NULL),
(38, 2, 'Cycle 12', 12, 1, '2022-04-15 03:12:26', '2022-04-15 03:12:26', NULL),
(39, 2, 'Cycle 13', 13, 1, '2022-04-15 03:12:26', '2022-04-15 03:12:26', NULL),
(40, 2, 'Cycle 14', 14, 1, '2022-04-15 03:12:27', '2022-04-15 03:12:27', NULL),
(41, 2, 'Cycle 15', 15, 1, '2022-04-15 03:12:27', '2022-04-15 03:12:27', NULL),
(42, 2, 'Cycle 16', 16, 1, '2022-04-15 03:12:27', '2022-04-15 03:12:27', NULL),
(43, 2, 'Cycle 17', 17, 1, '2022-04-15 03:12:27', '2022-04-15 03:12:27', NULL),
(44, 2, 'Cycle 18', 18, 1, '2022-04-15 03:12:27', '2022-04-15 03:12:27', NULL),
(45, 2, 'Cycle 19', 19, 1, '2022-04-15 03:12:27', '2022-04-15 03:12:27', NULL),
(46, 2, 'Cycle 20', 20, 1, '2022-04-15 03:12:27', '2022-04-15 03:12:27', NULL),
(47, 2, 'Cycle 21', 21, 1, '2022-04-15 03:12:27', '2022-04-15 03:12:27', NULL),
(48, 2, 'Cycle 22', 22, 1, '2022-04-15 03:12:27', '2022-04-15 03:12:27', NULL),
(49, 2, 'Cycle 23', 23, 1, '2022-04-15 03:12:27', '2022-04-15 03:12:27', NULL),
(50, 2, 'Cycle 24', 24, 1, '2022-04-15 03:12:27', '2022-04-15 03:12:27', NULL),
(51, 2, 'Cycle 25', 25, 1, '2022-04-15 03:12:27', '2022-04-15 03:12:27', NULL),
(52, 2, 'Cycle 26', 26, 1, '2022-04-15 03:12:27', '2022-04-15 03:12:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_schedules`
--

CREATE TABLE `class_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` tinyint(4) DEFAULT NULL COMMENT '1 = spinning cycle, 2 = personal training, 3 = group class',
  `class_id` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `weekday` tinyint(4) DEFAULT NULL COMMENT '0 = sunday',
  `num_seats` int(11) DEFAULT NULL,
  `coach_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `booking_type` tinyint(4) DEFAULT NULL COMMENT '1 = private, 2= public',
  `cancelled_by` int(11) DEFAULT NULL,
  `cancelled_at` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 = active, 0 = inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` tinyint(4) DEFAULT NULL COMMENT '1 = spinning cycle, 2 = personal training, 3 = group class',
  `type` tinyint(4) DEFAULT NULL COMMENT '1 = package, 2 = class, 3 = event',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` tinyint(4) DEFAULT NULL COMMENT '1 = fix, 2 = percentage',
  `discount` decimal(10,3) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `total_usage` int(11) DEFAULT NULL,
  `usage_per_user` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `module`, `type`, `name`, `code`, `discount_type`, `discount`, `start_date`, `end_date`, `total_usage`, `usage_per_user`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '25% Off', '25OFF', 2, '25.000', '2022-04-15', '2022-05-15', 2, 1, 1, '2022-04-15 03:12:23', '2022-04-15 03:12:23', NULL),
(2, 2, 1, '25% Off', '25OFF', 2, '25.000', '2022-04-15', '2022-05-15', 2, 1, 1, '2022-04-15 03:12:23', '2022-04-15 03:12:23', NULL),
(3, 3, 1, '25% Off', '25OFF', 2, '25.000', '2022-04-15', '2022-05-15', 2, 1, 1, '2022-04-15 03:12:23', '2022-04-15 03:12:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 = inactive, 1 = active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `driver_name`, `contact_number`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sumit Jana', '8528528528', 1, '2022-04-17 22:39:42', '2022-04-21 02:51:08', NULL),
(2, 'Akshay', '85285285', 1, '2022-04-18 02:29:18', '2022-04-21 02:51:15', NULL),
(3, 'xcxvx', '8528528526', 1, '2022-04-22 03:13:08', '2022-04-22 03:44:03', '2022-04-22 03:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `governorates`
--

CREATE TABLE `governorates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 = inactive, 1 = active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governorates`
--

INSERT INTO `governorates` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test1', 1, '2022-04-15 04:05:14', '2022-04-15 04:05:29', NULL),
(2, 'Test', 0, '2022-04-15 04:05:39', '2022-04-15 04:05:52', NULL),
(3, 'zxc f', 1, '2022-04-15 06:37:41', '2022-04-15 06:37:55', '2022-04-15 06:37:55'),
(4, 'cvncvn', 1, '2022-04-15 23:27:08', '2022-04-15 23:27:08', NULL),
(5, 'cvncv', 1, '2022-04-15 23:27:19', '2022-04-15 23:27:19', NULL),
(6, 'ABCED 12', 1, '2022-04-16 06:47:30', '2022-04-18 00:08:47', '2022-04-18 00:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_cms`
--

CREATE TABLE `master_cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_cms`
--

INSERT INTO `master_cms` (`id`, `name`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'About', 'Amet explicabo sit nulla tempora aut architecto. Magnam architecto at quia doloremque vel pariatur. Et exercitationem et omnis velit officiis est.\n\nDeserunt eveniet possimus ut eius porro. Consequuntur officiis id nemo consequuntur dolorem. Deserunt voluptate ut optio excepturi omnis. Doloribus dolorem sequi aliquam ut.\n\nAutem nesciunt illum necessitatibus eaque labore aut omnis. Praesentium omnis suscipit ducimus reprehenderit. Ipsam aut consequuntur nostrum aut ullam consequuntur. Est perferendis laudantium sint necessitatibus necessitatibus.\n\nIpsa ipsam in fugit omnis corrupti libero quisquam. Est rerum optio officiis omnis. Quae natus cupiditate unde sunt libero.\n\nPorro quas maiores corporis vero sed expedita minus. Et iste sed non ut repudiandae vel in voluptatem. Fugit aut ducimus sunt est non similique eius. Aliquam deleniti voluptatem cupiditate quos ut esse.', '2022-04-15 03:12:20', '2022-04-15 03:12:20', NULL),
(2, 'Privacy Policy', 'Qui ut hic occaecati voluptatem in explicabo. Doloribus ut perferendis ut voluptas vel. Ex illo et et sit et. Consequatur architecto quae ex quae numquam qui.\n\nLaboriosam facere earum quos laborum excepturi maxime est. Et enim quo ex rerum. Recusandae soluta temporibus qui.\n\nVoluptatem porro ab quia inventore facere neque dolores. Saepe voluptatibus et consectetur fugit.\n\nLaudantium placeat omnis iure unde saepe a nesciunt. Aut est repellat aperiam veniam voluptatem aut. Doloribus enim aut eaque ab animi exercitationem nisi sed. Ullam vitae quae saepe quaerat.\n\nQui repudiandae in non alias tenetur dolorum alias. Vel placeat asperiores omnis earum eum enim non. Quo nulla dolores corporis in voluptatibus deserunt non. Aperiam veritatis perspiciatis totam corrupti corrupti voluptas rerum.', '2022-04-15 03:12:20', '2022-04-15 03:12:20', NULL),
(3, 'Terms & Conditions', 'Et ut omnis consequatur. Unde molestias ducimus iste quis quo. Aut laboriosam aliquid vel ea harum quasi voluptatem.\n\nPerferendis et blanditiis quas non dolore perspiciatis et. Quasi rem dolorem voluptatem. Quisquam eum perspiciatis fugit suscipit. Molestias voluptas dignissimos cumque accusantium maxime a odit.\n\nVitae rerum a deserunt illo aliquam quod similique. Quia accusamus corrupti non eum omnis tempora. Fugit molestiae fugit qui in numquam.\n\nAd reiciendis illum at nihil vitae ipsum. Distinctio molestiae ad molestiae sed qui ipsum sint. Autem quam eos officiis excepturi dolores quia minus. Vel nemo amet numquam quibusdam.\n\nPerspiciatis sapiente aperiam possimus excepturi accusamus. Laboriosam veritatis autem eum velit non sit voluptatem veritatis. Enim aut et atque qui quos qui dolorem.', '2022-04-15 03:12:20', '2022-04-15 03:12:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_03_20_162031_create_settings_table', 1),
(10, '2021_03_22_171257_create_master_cms_table', 1),
(11, '2021_03_23_160238_create_packages_table', 1),
(12, '2021_03_28_055220_create_coupons_table', 1),
(13, '2021_03_31_113108_create_classes_table', 1),
(14, '2021_03_31_113337_create_class_cycles_table', 1),
(15, '2021_03_31_113448_create_class_schedules_table', 1),
(16, '2021_04_04_060054_create_permission_tables', 1),
(17, '2021_04_05_101408_create_payment_modes_table', 1),
(18, '2021_04_07_065354_create_jobs_table', 1),
(19, '2021_04_07_095003_create_notifications_table', 1),
(20, '2022_04_13_073356_create_governorates_table', 1),
(21, '2022_04_13_074320_create_areas_table', 1),
(22, '2022_04_13_092112_create_blocks_table', 1),
(23, '2022_04_13_092950_create_statuses_table', 1),
(24, '2022_04_13_130128_create_call_centers_table', 1),
(25, '2022_04_13_134206_create_drivers_table', 1),
(26, '2022_04_14_064232_create_cards_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '2chgdZ5HLxEx3R6o0E27q9Uz0HZkVBA58yJ2mYxo', NULL, 'http://localhost', 1, 0, 0, '2022-04-15 03:12:33', '2022-04-15 03:12:33'),
(2, NULL, 'Laravel Password Grant Client', 'JIrrvv58QsZN8z0uZEPbLtHJiCetbXQ9F4MvVVFN', 'users', 'http://localhost', 0, 1, 0, '2022-04-15 03:12:33', '2022-04-15 03:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-04-15 03:12:33', '2022-04-15 03:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` tinyint(4) DEFAULT NULL COMMENT '1 = spinning cycle, 2 = personal training, 3 = group class',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `num_classes` int(11) DEFAULT NULL,
  `price` decimal(10,3) DEFAULT NULL,
  `validity` int(11) DEFAULT NULL COMMENT 'in days',
  `validity_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_visibility` tinyint(4) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0' COMMENT 'highest on top',
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `module`, `image`, `name`, `description`, `num_classes`, `price`, `validity`, `validity_label`, `app_visibility`, `sort_order`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, '12 Spinning Classes', 'Aut praesentium maiores nesciunt tempora odit maiores. A minima aut dolore nisi voluptas. In sunt assumenda corporis.\n\nMaxime et quos sequi sunt esse alias. Et expedita voluptatibus facere placeat.', 12, '120.000', 30, '1 Month', 1, 0, 1, '2022-04-15 03:12:23', '2022-04-15 03:12:23', NULL),
(2, 2, NULL, '12 Personal Training Classes', 'Sint ipsum ut voluptas quia earum aut qui. Tenetur alias earum voluptas autem. Et ad qui qui.\n\nQuis quisquam dolores et ea quis. Quisquam architecto quas sunt cupiditate. Nulla id aut aliquid ratione eaque illo molestiae ex.', 12, '120.000', 30, '1 Month', 1, 0, 1, '2022-04-15 03:12:23', '2022-04-15 03:12:23', NULL),
(3, 3, NULL, '12 Group Classes', 'Rem est nemo sed magnam neque sint. Laborum enim hic est velit occaecati sunt harum. Enim qui illo necessitatibus perspiciatis. Velit dolore sit voluptatem eos consequatur accusamus voluptate.\n\nQuidem dolorum sunt vitae ducimus est minima delectus ex. Explicabo magnam molestiae consectetur voluptatem corrupti aut. Placeat ullam occaecati rerum reiciendis.', 12, '120.000', 30, '1 Month', 1, 0, 1, '2022-04-15 03:12:23', '2022-04-15 03:12:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cash', '2022-04-15 03:12:28', '2022-04-15 03:12:28'),
(2, 'Knet', '2022-04-15 03:12:28', '2022-04-15 03:12:28'),
(3, 'Subscription', '2022-04-15 03:12:28', '2022-04-15 03:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', NULL, NULL),
(2, 'role-create', 'web', NULL, NULL),
(3, 'role-edit', 'web', NULL, NULL),
(4, 'role-delete', 'web', NULL, NULL),
(5, 'permission-list', 'web', NULL, NULL),
(6, 'permission-create', 'web', NULL, NULL),
(7, 'permission-edit', 'web', NULL, NULL),
(8, 'permission-delete', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2022-04-15 03:12:21', '2022-04-15 03:12:21'),
(2, 'Admin', 'web', '2022-04-15 03:12:21', '2022-04-15 03:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_slot_duration` tinyint(4) DEFAULT NULL,
  `m1_num_seats` tinyint(4) DEFAULT NULL,
  `m1_seat_price` decimal(10,3) DEFAULT NULL,
  `m1_floor_price` decimal(10,3) DEFAULT NULL,
  `m1_commission` decimal(10,3) DEFAULT NULL,
  `m1_booking_offset` tinyint(4) DEFAULT NULL,
  `m1_cancellation_offset` tinyint(4) DEFAULT NULL,
  `m1_reminder_notification_offset` tinyint(4) DEFAULT NULL,
  `m2_individual_price` decimal(10,3) DEFAULT NULL,
  `m2_couple_price` decimal(10,3) DEFAULT NULL,
  `m2_coach_individual_price` decimal(10,3) DEFAULT NULL,
  `m2_coach_couple_price` decimal(10,3) DEFAULT NULL,
  `m2_num_classes_per_slot` tinyint(4) DEFAULT NULL,
  `m2_booking_offset` tinyint(4) DEFAULT NULL,
  `m2_cancellation_offset` tinyint(4) DEFAULT NULL,
  `m2_reminder_notification_offset` tinyint(4) DEFAULT NULL,
  `m3_seat_price` decimal(10,3) DEFAULT NULL,
  `m3_floor_price` decimal(10,3) DEFAULT NULL,
  `m3_commission` decimal(10,3) DEFAULT NULL,
  `m3_booking_offset` tinyint(4) DEFAULT NULL,
  `m3_cancellation_offset` tinyint(4) DEFAULT NULL,
  `m3_reminder_notification_offset` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `short_name`, `working_days`, `start_time`, `end_time`, `phone`, `email`, `address`, `version`, `min_slot_duration`, `m1_num_seats`, `m1_seat_price`, `m1_floor_price`, `m1_commission`, `m1_booking_offset`, `m1_cancellation_offset`, `m1_reminder_notification_offset`, `m2_individual_price`, `m2_couple_price`, `m2_coach_individual_price`, `m2_coach_couple_price`, `m2_num_classes_per_slot`, `m2_booking_offset`, `m2_cancellation_offset`, `m2_reminder_notification_offset`, `m3_seat_price`, `m3_floor_price`, `m3_commission`, `m3_booking_offset`, `m3_cancellation_offset`, `m3_reminder_notification_offset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GNP Logistics', 'XS', '[0,1,2,3,4,5,6]', '09:00:00', '21:00:00', '94030546', 'info@domain.com', 'Kuwait', 'V1.0', 30, 26, '10.000', '250.000', '5.000', 30, 30, 30, '5.000', '10.000', '10.000', '20.000', 4, 30, 30, 30, '30.000', '100.000', '5.000', 30, 30, 30, '2022-04-15 03:12:19', '2022-04-15 03:12:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Out for delivery', 0, '2022-04-16 06:52:32', '2022-04-16 06:52:32', NULL),
(2, 'Return to bank', 0, '2022-04-16 06:52:32', '2022-04-16 06:52:32', NULL),
(3, 'Delivered', 0, '2022-04-16 06:52:32', '2022-04-16 06:52:32', NULL),
(4, 'Undelivered', 0, '2022-04-16 06:52:33', '2022-04-16 06:52:33', NULL),
(5, 'Others', 0, '2022-04-16 06:52:33', '2022-04-16 06:52:33', NULL),
(6, 'Mobile Switch OFF', 5, '2022-04-16 06:52:33', '2022-04-16 06:52:33', NULL),
(7, 'Unanswered', 5, '2022-04-16 06:52:33', '2022-04-16 06:52:33', NULL),
(8, 'Not reachable', 5, '2022-04-16 06:52:33', '2022-04-16 06:52:33', NULL),
(9, 'Other 5', 5, '2022-04-18 02:25:55', '2022-04-18 02:25:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) DEFAULT NULL COMMENT '1 = admin, 2 = coach, 3 = member, 4 = guest',
  `coach_type` tinyint(4) DEFAULT NULL COMMENT '1 = full time, 2 = part time, 3 = freelancer',
  `civil_id_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL COMMENT '1 = male, 2 = female',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coach_application_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `coach_type`, `civil_id_number`, `first_name`, `middle_name`, `last_name`, `avatar`, `mobile`, `gender`, `email`, `password`, `coach_application_id`, `status`, `created_by`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, '1deb22da-f56d-381e-85e3-e1eaa2f4c802', 'Super', NULL, 'Admin', NULL, '11111111', 1, 'superadmin@domain.com', '$2y$10$dLaCxZql.3iKzvEIvFzzouIQezCtqceqzXZtM6Y22C.76FIZF1O6i', NULL, 1, NULL, '2022-04-15 03:12:20', '7C62pCwFVMikd01ygFQiQ3CFmVpf9KofFwzcWKNm9YBNogo1utPk6CiNiHbC', '2022-04-15 03:12:20', '2022-04-15 03:12:20', NULL),
(2, 1, NULL, '0260d074-a66e-3778-8aad-ec747a80a351', 'Test', NULL, 'Admin', NULL, '22222222', 1, 'admin@domain.com', '$2y$10$gk.eHvFqnsOGlv0qAF1VYeIthUzrnrcyesHLLxMDJZhe9wtfom4sS', NULL, 1, NULL, '2022-04-15 03:12:20', 'SzysDcferGGkrWDbjAuyiDjXKwUoajpodMRsk6ofZHNGXhha8ptJbbOfZddv', '2022-04-15 03:12:20', '2022-04-15 03:12:20', NULL),
(3, 2, 1, 'd5fd3e30-263a-3ca2-904e-7c407664d670', 'Call center 2', NULL, 'Coach', NULL, '33333333', 1, 'callcenter2@domain.com', '$2y$10$dLaCxZql.3iKzvEIvFzzouIQezCtqceqzXZtM6Y22C.76FIZF1O6i', NULL, 1, NULL, '2022-04-15 03:12:20', 'lSVqX3yDAnqRCsPFn9IClqGPyRSLZJRFCQt2HFAd00332EM2HqLgUBeaFOMb', '2022-04-15 03:12:20', '2022-04-24 09:49:27', NULL),
(4, 3, NULL, 'ea27d2d8-9d8b-38b7-bd7e-b9a96b185f43', 'Test', NULL, 'Member', NULL, '44444444', 1, 'member@domain.com', '$2y$10$PN.vi4w4xh6nh5aLUOv5J.irFJnlz6yaQWEPynSe81HMVzMwYBPsK', NULL, 1, NULL, '2022-04-15 03:12:20', 'Mu7eHLdcNN', '2022-04-15 03:12:21', '2022-04-15 03:12:21', NULL),
(5, 4, NULL, 'ab51bd76-d597-3296-8370-6d2816cfeb19', 'Test', NULL, 'Guest', NULL, '55555555', 1, 'guest@domain.com', '$2y$10$HIkCh//x8L9Ew6rBe6k8gO7xDPbfAaQxaW5.j87HVvySG/1kl6KLq', NULL, 1, NULL, '2022-04-15 03:12:21', 'AgSdeYvI0x', '2022-04-15 03:12:21', '2022-04-15 03:12:21', NULL),
(7, 3, NULL, NULL, 'sfasf', NULL, NULL, NULL, '963963', NULL, 'bnm', '123456', NULL, 1, NULL, NULL, NULL, '2022-04-19 02:45:16', '2022-04-19 02:45:16', NULL),
(9, 2, 1, '1deb22da-f56d-381e-85e3-e1eaa2f4c802', 'Call center 1', NULL, NULL, NULL, '8528528528', 1, 'callcenter1@domain.com', '$2y$10$dLaCxZql.3iKzvEIvFzzouIQezCtqceqzXZtM6Y22C.76FIZF1O6i', NULL, 1, NULL, '2022-04-15 03:12:20', 'jZdD8HIS0E7WtetdRalFaJsIkxcZVgJlqAGQde0a48xkoPdYzEj3ftqTRQTy', '2022-04-19 04:04:00', '2022-04-24 09:49:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `call_centers`
--
ALTER TABLE `call_centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_cycles`
--
ALTER TABLE `class_cycles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_schedules`
--
ALTER TABLE `class_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `governorates`
--
ALTER TABLE `governorates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `master_cms`
--
ALTER TABLE `master_cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
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
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `call_centers`
--
ALTER TABLE `call_centers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class_cycles`
--
ALTER TABLE `class_cycles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `class_schedules`
--
ALTER TABLE `class_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `governorates`
--
ALTER TABLE `governorates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_cms`
--
ALTER TABLE `master_cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
