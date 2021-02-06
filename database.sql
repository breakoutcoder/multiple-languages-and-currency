-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 06, 2021 at 03:16 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oopecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `exchange_rate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `exchange_rate`, `status`, `code`) VALUES
(1, 'U.S. Dollar', '$', '1', 1, 'USD'),
(3, 'Taka', '৳', '84', 1, 'BDT');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rtl` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `rtl`, `status`) VALUES
(1, 'English', 'en', '0', 1),
(2, 'Bangla', 'bd', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
CREATE TABLE IF NOT EXISTS `translations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lang_key` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lang_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=176 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `lang`, `lang_key`, `lang_value`) VALUES
(1, 'en', 'Dashboard', 'Dashboard'),
(2, 'en', 'Setup And Configurations', 'Setup & Configurations'),
(3, 'en', 'Language', 'Language'),
(4, 'en', 'ON', 'ON'),
(5, 'en', 'OFF', 'OFF'),
(6, 'en', 'Default Language', 'Default Language'),
(7, 'en', 'Save', 'Save'),
(8, 'en', 'Add New Language', 'Add New Language'),
(9, 'en', 'Name', 'Name'),
(10, 'en', 'Code', 'Code'),
(11, 'en', 'Status', 'Status'),
(12, 'en', 'RTL', 'RTL'),
(13, 'en', 'Action', 'Action'),
(14, 'en', 'English', 'English'),
(15, 'en', 'Bangla', 'Bangla'),
(16, 'en', 'France', 'France'),
(17, 'en', 'Hindi', 'Hindi'),
(18, 'en', 'Key', 'Key'),
(19, 'en', 'Value', 'Value'),
(20, 'en', 'Copy Translations', 'Copy Translations'),
(21, 'bd', 'Dashboard', 'ড্যাশবোর্ড'),
(22, 'bd', 'Setup And Configurations', 'সেটআপ এবং কনফিগারেশন'),
(23, 'bd', 'Language', 'ভাষা'),
(24, 'bd', 'ON', 'চালু'),
(25, 'bd', 'OFF', 'বন্ধ'),
(26, 'bd', 'Default Language', 'ডিফল্ট ল্যাংগুয়েজে'),
(27, 'bd', 'Save', 'সেভ'),
(28, 'bd', 'Add New Language', 'নতুন ভাষা যুক্ত করুন'),
(29, 'bd', 'Name', 'নাম'),
(30, 'bd', 'Code', 'কোড'),
(31, 'bd', 'Copy Translations', 'অনুবাদ অনুলিপি করুন'),
(32, 'bd', 'Key', 'চাবি'),
(33, 'bd', 'Value', 'মান'),
(34, 'bd', 'Status', 'স্থিতি'),
(35, 'bd', 'RTL', 'আরটিএল'),
(36, 'bd', 'Action', 'কর্ম'),
(37, 'bd', 'English', 'ইংরেজি'),
(38, 'bd', 'Bangla', 'বাংলা'),
(39, 'bd', 'France', 'ফ্রান্স'),
(40, 'bd', 'Hindi', 'হিন্দি'),
(50, 'bd', 'Delete', 'মুছে ফেলা'),
(49, 'en', 'Delete', 'Delete'),
(48, 'en', 'Edit', 'Edit'),
(47, 'en', 'Translate', 'Translate'),
(51, 'bd', 'Edit', 'সম্পাদনা করুন'),
(52, 'bd', 'Translate', 'অনুবাদ করা'),
(53, 'bd', 'Language Information', 'ভাষার তথ্য'),
(54, 'bd', 'Submit', 'জমা দিন'),
(55, 'en', 'Language Information', 'Language Information'),
(56, 'en', 'Submit', 'Submit'),
(174, 'en', 'Symbol', 'Symbol'),
(164, 'bd', 'Exchange Rate(1 USD = ?)', 'বিনিময় হার (১ মার্কিন ডলার =?)'),
(163, 'bd', 'Currency code', 'মুদ্রা কোড'),
(162, 'bd', 'Currency symbol', 'মুদ্রার প্রতীক'),
(161, 'bd', 'Currency name', 'মুদ্রার নাম'),
(160, 'bd', 'currencies', 'মুদ্রা'),
(159, 'bd', 'Add New Currency', 'নতুন মুদ্রা যুক্ত করুন'),
(158, 'bd', 'Currency', 'মুদ্রা'),
(156, 'en', 'Add New Currency', 'Add New Currency'),
(157, 'en', 'Currency code', 'Currency code'),
(155, 'en', 'Exchange Rate(1 USD = ?)', 'Exchange Rate(1 USD = ?)'),
(153, 'en', 'Currency name', 'Currency name'),
(172, 'bd', 'Symbol', 'প্রতীক'),
(154, 'en', 'Currency symbol', 'Currency symbol'),
(152, 'en', 'currencies', 'currencies'),
(151, 'en', 'Currency', 'Currency'),
(173, 'bd', 'Exchange Rate', 'বিনিময় হার'),
(165, 'en', 'Edit Currency', 'Edit Currency'),
(171, 'bd', 'Logout', 'প্রস্থান'),
(170, 'en', 'Logout', 'Logout'),
(169, 'bd', 'Edit Currency', 'মুদ্রা সম্পাদনা করুন'),
(175, 'en', 'Exchange Rate', 'Exchange Rate');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(9, 'admin@gmail.com', 'admin@gmail.com', '$2y$10$/4DeFLy1Rjs9H932CXKqOevRANXjbWU8vuUtUB2mTxeB2FWGaB/5q');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
