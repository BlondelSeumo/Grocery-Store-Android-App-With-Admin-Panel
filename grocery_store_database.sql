-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2018 at 08:49 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codecan_grocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `parent` int(50) NOT NULL,
  `leval` int(50) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `parent`, `leval`, `description`, `image`, `status`) VALUES
(9, 'Grocery & Staples', 'grocery-staples', 0, 0, '', 'grocery.png', '1'),
(10, 'Dals & Pulses', 'dals-pulses', 9, 1, '', 'CTcFvp0UcAAkOR6.jpg', '1'),
(11, 'Flours & Sooji', 'flours-sooji', 9, 1, '', 'Flours-and-Sooji-600x315.jpg', '1'),
(18, 'Dry Fruits', 'dry-fruits', 9, 1, 'Dry Fruits', 'Dry_Fruits.jpg', '1'),
(21, 'Bread dairy & eggs', 'bread-dairy-eggs', 0, 0, 'Bread dairy & eggs', 'bread-dairy.png', '1'),
(22, 'Dairy product', 'dairy-product', 21, 1, 'Dairy product', 'Dairy_product.jpg', '1'),
(23, 'Eread & Bakery', 'eread-bakery', 21, 1, 'Eread & Bakery', 'Eread_Bakery.jpg', '1'),
(24, 'Eggs', 'eggs', 21, 1, 'Eggs', 'Eggs.jpg', '1'),
(25, 'Beverages', 'beverages', 0, 0, 'cola drinks and other soft drinks', 'beverages.png', '1'),
(26, 'Mineral water', 'mineral-water', 25, 1, 'packaged drinking water', 'Mineral_water.jpg', '1'),
(27, 'Soft Drinks', 'soft-drinks', 25, 1, 'All type of Soft drinks..', 'Soft_Drinks.jpg', '1'),
(29, 'Branded foods', 'branded-foods', 0, 0, 'All type of product including this category...', 'branded.png', '1'),
(30, 'Noodles', 'noodles', 29, 1, 'Noodles', 'Noodles.jpg', '1'),
(31, 'Biscuits', 'biscuits', 29, 1, 'All type of Biscuits is including this category....', 'Biscuits.jpg', '1'),
(32, 'Person Care', 'person-care', 0, 0, 'Person Care', 'personal-care.png', '1'),
(33, 'Sanitary Neeeds', 'sanitary-neeeds', 32, 1, 'All type of sanitary products...', 'Sanitary_Neeeds.jpg', '1'),
(34, 'Oral care', 'oral-care', 32, 1, 'Oral care all type of products...', 'Oral_care.jpg', '1'),
(35, 'Hair care', 'hair-care', 32, 1, 'All type of hair care serviess..', 'Hare_care.jpg', '1'),
(36, 'Household', 'household', 0, 0, 'Household type of  all product is including..', 'household.png', '1'),
(37, 'Shoe care', 'shoe-care', 36, 1, 'All type of Shoe care product is includding....', 'Shoe_care.jpg', '1'),
(38, 'pet care', 'pet-care', 36, 1, 'pet care', 'pet_care.jpg', '1'),
(40, 'Imported & Gourment', 'imported-gourment', 0, 0, 'this category is including Imported & Gourment', 'imported.png', '1'),
(41, 'Dairy Imported', 'dairy-imported', 40, 1, 'dairy imported', 'dairy_imported.jpg', '1'),
(42, 'Oil & Vinegar', 'oil-vinegar', 40, 1, 'Oil & Vinegar', 'Oil_Vinegar.jpg', '1'),
(43, 'Drinks & Beverages', 'drinks-beverages', 40, 1, 'Drinks & Beverages', 'Drinks_Beverages.jpg', '1'),
(44, 'all out', 'all-out', 36, 1, 'this is dsdjskdj', 'shreeharilogo.png', '1'),
(45, 'No sub', 'no-sub', 0, 0, 'dfdf', 'beverages1.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('tsno41ju1c6e9siq73tn0gqiter93m0a', '::1', 1522385414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323338353337363b757365725f6e616d657c733a32303a224d61696e2041646d696e696e6973747261746f72223b757365725f656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b6c6f676765645f696e7c623a313b757365725f69647c733a313a2231223b757365725f747970655f69647c733a313a2230223b6c616e67756167657c733a373a22656e676c697368223b);

-- --------------------------------------------------------

--
-- Table structure for table `closing_hours`
--

DROP TABLE IF EXISTS `closing_hours`;
CREATE TABLE `closing_hours` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `closing_hours`
--

INSERT INTO `closing_hours` (`id`, `date`, `from_time`, `to_time`) VALUES
(1, '2017-02-06', '10:30:00', '16:00:00'),
(3, '2017-11-15', '09:00:00', '21:00:00'),
(4, '2017-04-10', '09:00:00', '19:00:00'),
(5, '2017-05-05', '09:00:00', '21:00:00'),
(6, '2017-12-12', '09:30:00', '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pageapp`
--

DROP TABLE IF EXISTS `pageapp`;
CREATE TABLE `pageapp` (
  `id` int(11) NOT NULL,
  `pg_title` varchar(200) NOT NULL,
  `pg_slug` varchar(100) NOT NULL,
  `pg_descri` longtext NOT NULL,
  `pg_status` int(50) NOT NULL,
  `pg_foot` int(50) NOT NULL,
  `crated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pageapp`
--

INSERT INTO `pageapp` (`id`, `pg_title`, `pg_slug`, `pg_descri`, `pg_status`, `pg_foot`, `crated_date`) VALUES
(1, 'support', 'support', '<p>&nbsp;</p>\r\n\r\n<h2>Forums</h2>\r\n\r\n<p>If you run into issues while using your WordPress app, we encourage you to visit the forums for troubleshooting help and to view other discussions that might be helpful. You can also provide feedback and requests for features, and weigh in on future development.</p>\r\n\r\n<p>For iOS users, visit the&nbsp;<a href="https://ios.forums.wordpress.org/" target="_blank">WordPress for iOS Forums</a>.</p>\r\n\r\n<p>For Android users, visit the&nbsp;<a href="https://android.forums.wordpress.org/forum/troubleshooting" target="_blank">WordPress for Android Forums</a>.</p>\r\n\r\n<h2>&nbsp;</h2>', 0, 0, '2017-07-17 10:33:25'),
(2, 'about us', 'about-us', '<p>addpageappaddpageappaddpageappaddpageappaddpageappaddpageappaddpageappaddpageappaddpageappaddpageappaddpageapp shreehari web</p>\r\n\r\n<ol>\r\n	<li>addpageapp</li>\r\n	<li>addpageapp</li>\r\n</ol>', 0, 0, '2017-06-08 13:30:41'),
(3, 'terms and condition', 'terms and condition', 'Please read the following terms and conditions carefully as it sets out the terms of a legally binding agreement between you (the reader) and Business Standard', 0, 0, '2017-06-27 09:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `pincode`
--

DROP TABLE IF EXISTS `pincode`;
CREATE TABLE `pincode` (
  `pincode` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pincode`
--

INSERT INTO `pincode` (`pincode`) VALUES
(360004),
(360005),
(360001),
(360002),
(360003);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_description` longtext NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `in_stock` int(11) NOT NULL,
  `price` double NOT NULL,
  `unit_value` double NOT NULL,
  `unit` varchar(10) NOT NULL,
  `increament` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_image`, `category_id`, `in_stock`, `price`, `unit_value`, `unit`, `increament`) VALUES
(43, 'Tomato', '', '122.jpg', 2, 1, 8, 1, 'Kg', 0.5),
(44, 'Onion', '', '10.jpg', 2, 1, 4, 1, 'Kg', 0.5),
(45, 'Carrot', '', '11.jpg', 2, 1, 4, 1, 'Kg', 0.5),
(46, 'Lemon', '', '9.jpg', 2, 1, 6, 1, 'Bag', 1),
(48, 'Orange', '', '8.jpg', 1, 1, 4, 0.5, 'Kg', 0.5),
(49, 'Watermelon', '', '7.jpg', 1, 1, 20, 1, 'One', 1),
(55, 'MIlk butter & cream', '', 'MIlk_butter_cream.jpg', 22, 1, 20, 10, 'KG', 1),
(56, 'Bread Buns & Pals', '', 'Bread_Buns_Pals.jpg', 23, 1, 10, 1, 'KG', 1),
(57, 'Dals Mix Pack', '', 'Flours-and-Sooji-600x315.jpg', 11, 1, 20, 1, 'KG', 1),
(58, 'buns-pavs', '', 'buns-pavs.jpg', 23, 1, 15, 1, 'packet', 1),
(59, 'cakes', '', 'cakes.jpg', 23, 1, 1200, 1, 'kg', 1),
(60, 'Channa Dal', '', 'Channa_Dal.jpg', 10, 1, 80, 1, 'kg', 1),
(61, 'Toor Dal', '', 'toor_dal.jpg', 10, 1, 80, 1, 'kg', 1),
(62, 'Wheat Atta', '', 'Wheat_Atta.jpg', 11, 1, 25, 1, 'kg', 1),
(63, 'Beson', '', '64c7b258200279da31ced10d3fb3f693.png', 11, 1, 30, 1, 'kg', 1),
(64, 'Almonds', '', 'Almonds.jpg', 18, 1, 1200, 1, 'gm', 1),
(65, 'Packaged Drinking', '', 'Packaged_Drinking.png', 26, 1, 15, 500, 'ml bottle', 1),
(66, 'Cola drinks', '', 'Cola_drinks.jpg', 27, 1, 30, 150, 'ml pack', 1),
(67, 'Other soft drinks', '', 'Other_Soft_Drinks.png', 27, 1, 50, 150, 'ml pack', 1),
(68, 'Instant Noodles', '', 'Instant_Noodles.jpg', 30, 1, 72, 70, 'gm of 6 pa', 1),
(69, 'Cup Noodles', '', 'Cup_Noodles.jpg', 30, 1, 60, 1, 'pack', 1),
(70, 'Salty Biscuits', '', 'Salty_Biscuits.jpg', 31, 1, 30, 1, 'packet', 1),
(71, 'cookie', '', 'Cookies.jpg', 31, 1, 50, 1, 'packet', 1),
(72, 'Sanitary pads', '', 'Sanitary_pads.jpg', 33, 1, 50, 1, 'pack', 1),
(73, 'sanitary Aids', '', 'Sanitary_Aids.jpg', 33, 1, 80, 1, 'pack', 1),
(74, 'Toothpaste', '', 'toothpaste.jpg', 34, 1, 45, 1, 'packet', 1),
(75, 'Mouthwash', '', '', 34, 1, 80, 1, 'packet', 1),
(76, 'Hair oil', '', 'Hair_oil.jpg', 35, 1, 90, 1, 'Bottle', 1),
(77, 'Shampoo', '', 'Shampoo.jpg', 35, 1, 150, 1, 'Bottle', 1),
(79, 'Pure & pomace olive', '', 'Pure_pomace_olive1.jpg', 42, 1, 890, 1, 'Bottle', 1),
(80, 'ICE cream', '', 'ice_cream.jpg', 42, 1, 35, 1, 'gm', 1),
(81, 'Theme Egg', '', 'ic_payment_option.png', 24, 1, 50, 10, 'Pics', 0),
(82, 'Amul Milk', '', 'milk.jpg', 22, 1, 60.5, 1, 'Litter', 0),
(83, 'AMul Milk Pack power', 'It contains valuable nutrients, and it can offer a range of health benefits. ... This article, part of a Medical News Today collection of articles on the health benefits of popular foods, will focus mainly on cow''s milk. ... Cow''s milk is fortified with vitamin D, which also benefits bone                                             ', 'Untitled-12.png', 22, 1, 10, 1, 'kg', 0),
(84, 'kaju pista dd', '1.slider change\r\n2.Forgot password\r\n3.Document Update FCM\r\n4.image upload code change\r\n5.by id category ', 'loading_icon.png', 10, 1, 60, 1, 'kg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `qty` double NOT NULL,
  `unit` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `product_id`, `price`, `qty`, `unit`, `date`) VALUES
(1, 55, 10, 500, 'Kg', '2017-05-01 13:46:24'),
(2, 44, 10, 500, 'kg', '2017-05-01 13:47:53'),
(3, 55, 50, 6000, 'Kg', '2017-05-01 13:48:49'),
(4, 43, 60, 600, 'kg', '2017-05-01 13:50:57'),
(6, 45, 60, 1000, 'Kg', '2017-05-01 13:55:55'),
(7, 61, 11, 90, 'kg', '2017-07-11 12:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

DROP TABLE IF EXISTS `registers`;
CREATE TABLE `registers` (
  `user_id` int(11) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `socity_id` int(11) NOT NULL,
  `house_no` longtext NOT NULL,
  `mobile_verified` int(11) NOT NULL,
  `user_gcm_code` longtext NOT NULL,
  `user_ios_token` longtext NOT NULL,
  `varified_token` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `reg_code` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`user_id`, `user_phone`, `user_fullname`, `user_email`, `user_password`, `user_image`, `pincode`, `socity_id`, `house_no`, `mobile_verified`, `user_gcm_code`, `user_ios_token`, `varified_token`, `status`, `reg_code`) VALUES
(130, '99748504035', 'user', 'user@gmail.com', 'ede997b0caf2ec398110d79d9eba38bb', '911126af32c5fe4c2db26aa4562cfaad.png', 363625, 935, '36, Shree Krishna Tower', 0, 'drCUkquaU80:APA91bEYFRAwyGuDrHj0KbzcxzQ0S63Y0d6KFZgbgtWUGGnGRqFqNL0TPCxVHDgJCASF-vxJnFGkWrBm4h4Ch-o1wisho6JQddqnHsMsw8gVPh6z_NtkwNDGKasrK6lsjRNUNZ15rrex', '', '', 1, 0),
(131, '8530875127', 'rajesh', 'rajesh.b.dabhi@gmail.com', 'ede997b0caf2ec398110d79d9eba38bb', '', 0, 0, '', 0, '', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

DROP TABLE IF EXISTS `sale`;
CREATE TABLE `sale` (
  `sale_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `on_date` date NOT NULL,
  `delivery_time_from` time NOT NULL,
  `delivery_time_to` time NOT NULL,
  `status` int(11) NOT NULL,
  `note` longtext NOT NULL,
  `is_paid` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `total_kg` double NOT NULL,
  `total_items` double NOT NULL,
  `socity_id` int(11) NOT NULL,
  `delivery_address` longtext NOT NULL,
  `location_id` int(11) NOT NULL,
  `delivery_charge` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `user_id`, `on_date`, `delivery_time_from`, `delivery_time_to`, `status`, `note`, `is_paid`, `total_amount`, `total_kg`, `total_items`, `socity_id`, `delivery_address`, `location_id`, `delivery_charge`) VALUES
(74, 124, '2017-06-30', '08:30:00', '12:30:00', 0, '', 0, 0, 0, 0, 0, 'una', 0, 0),
(75, 124, '2017-06-30', '08:30:00', '12:30:00', 0, '', 0, 0, 0, 0, 0, 'una', 0, 0),
(76, 124, '2017-06-30', '08:30:00', '12:30:00', 0, '', 0, 0, 0, 0, 0, 'una', 0, 0),
(77, 124, '2017-06-30', '08:30:00', '12:30:00', 0, '', 0, 0, 0, 0, 0, 'una', 0, 0),
(78, 124, '2017-06-30', '08:30:00', '12:30:00', 0, '', 0, 0, 0, 0, 0, 'una', 0, 0),
(79, 124, '2017-06-30', '08:30:00', '12:30:00', 0, '', 0, 0, 0, 0, 0, 'una', 0, 0),
(80, 124, '2017-06-30', '08:30:00', '12:30:00', 0, '', 0, 0, 0, 0, 0, 'una', 0, 0),
(81, 124, '2017-06-30', '08:30:00', '12:30:00', 0, '', 0, 0, 0, 0, 0, 'una', 0, 0),
(82, 124, '2017-06-30', '15:00:00', '18:00:00', 3, '', 0, 108, 13, 5, 0, 'una', 0, 0),
(83, 124, '2017-07-01', '08:30:00', '12:30:00', 3, '', 0, 108, 13, 5, 0, 'una', 0, 0),
(84, 124, '2017-06-30', '15:00:00', '18:00:00', 3, '', 0, 8, 2, 1, 0, 'una', 0, 0),
(85, 124, '2017-06-30', '15:00:00', '18:00:00', 0, '', 0, 68, 5, 2, 0, 'una', 0, 0),
(86, 124, '2017-07-01', '08:30:00', '12:30:00', 0, '', 0, 80, 4, 1, 0, 'una', 0, 0),
(87, 124, '2017-07-01', '08:30:00', '12:30:00', 0, '', 0, 20, 5, 2, 0, 'una', 0, 0),
(88, 124, '2017-07-01', '08:30:00', '12:30:00', 0, '', 0, 8, 2, 1, 0, 'una', 0, 0),
(89, 124, '2017-06-30', '19:37:00', '12:38:00', 0, '', 0, 8, 2, 1, 0, 'una', 0, 0),
(90, 125, '2017-07-01', '14:35:00', '13:36:00', 0, '', 0, 8, 2, 1, 0, 'hello', 0, 0),
(91, 125, '2017-07-01', '14:35:00', '13:36:00', 0, '', 0, 8, 2, 1, 0, 'hello', 0, 0),
(92, 124, '2017-07-04', '18:30:00', '19:00:00', 3, '', 0, 64, 12, 3, 0, 'una', 0, 0),
(94, 125, '2017-07-06', '08:30:00', '09:00:00', 3, '', 0, 190, 5, 2, 0, 'shreehari web design company', 0, 0),
(95, 125, '2017-07-06', '08:30:00', '09:00:00', 3, '', 0, 190, 5, 2, 0, 'shreehari web design company', 0, 0),
(96, 125, '2017-07-05', '10:00:00', '10:30:00', 0, '', 0, 60, 3, 1, 0, 'shreehari web design company Street', 0, 0),
(97, 125, '2017-07-06', '13:30:00', '14:00:00', 2, '', 0, 3680, 7, 2, 0, 'new date', 0, 0),
(98, 124, '2017-07-06', '19:30:00', '20:00:00', 0, '', 0, 80, 4, 1, 935, '1 una\n, 1 una', 16, 0),
(99, 125, '2017-07-06', '20:00:00', '20:30:00', 0, '', 0, 340, 6, 3, 934, '14 system park.\n, 14 system park.', 18, 0),
(100, 125, '2017-07-06', '21:00:00', '21:30:00', 0, '', 0, 2770, 7, 3, 935, '25 syam park\n, 25 syam park', 15, 0),
(101, 125, '2017-07-06', '21:00:00', '21:30:00', 0, '', 0, 200, 5, 3, 935, '25 syam park\n, 25 syam park', 15, 0),
(102, 125, '2017-07-08', '10:00:00', '10:30:00', 0, '', 0, 60, 3, 1, 934, '14 system park.\n, 14 system park.', 18, 0),
(103, 124, '2017-07-07', '12:00:00', '12:30:00', 0, '', 0, 180, 4, 2, 935, '1 una\n, 1 una', 16, 0),
(104, 124, '2017-07-07', '12:00:00', '12:30:00', 0, '', 0, 180, 4, 2, 935, '1 una\n, 1 una', 16, 0),
(105, 126, '2017-07-07', '19:00:00', '19:30:00', 0, '', 0, 1315, 4, 4, 935, 'shreehari web Street\n, shreehari web Street', 19, 0),
(106, 124, '2017-07-07', '18:00:00', '18:30:00', 0, '', 0, 130, 4, 3, 935, '1 una\n, 1 una', 16, 0),
(107, 126, '2017-07-07', '18:30:00', '19:00:00', 0, '', 0, 1230, 2, 2, 935, 'shreehari web Street\n, shreehari web Street', 19, 0),
(108, 126, '2017-07-07', '18:30:00', '19:00:00', 0, '', 0, 1230, 2, 2, 935, 'shreehari web Street\n, shreehari web Street', 19, 0),
(109, 126, '2017-07-07', '18:30:00', '19:00:00', 0, '', 0, 1230, 2, 2, 935, 'shreehari web Street\n, shreehari web Street', 19, 0),
(110, 126, '2017-07-07', '18:30:00', '19:00:00', 0, '', 0, 52, 13, 2, 935, 'shreehari web Street\n, shreehari web Street', 19, 0),
(111, 126, '2017-07-07', '20:00:00', '20:30:00', 0, '', 0, 225, 5, 5, 935, 'shreehari web Street\n, shreehari web Street', 19, 0),
(112, 126, '2017-07-07', '20:00:00', '20:30:00', 0, '', 0, 225, 5, 5, 935, 'shreehari web Street\n, shreehari web Street', 19, 0),
(113, 126, '2017-07-07', '20:00:00', '20:30:00', 0, '', 0, 225, 5, 5, 935, 'shreehari web Street\n, shreehari web Street', 19, 0),
(114, 126, '2017-07-07', '20:00:00', '20:30:00', 0, '', 0, 225, 5, 5, 935, 'shreehari web Street\n, shreehari web Street', 19, 0),
(115, 126, '2017-07-07', '20:00:00', '20:30:00', 0, '', 0, 225, 5, 5, 935, 'shreehari web Street\n, shreehari web Street', 19, 0),
(116, 127, '2017-07-09', '13:00:00', '13:30:00', 0, '', 0, 2430, 4, 2, 934, '34 shaym tower\n, 34 shaym tower', 20, 0),
(117, 127, '2017-07-09', '13:30:00', '14:00:00', 0, '', 0, 180, 4, 2, 934, '34 shaym tower\n, 34 shaym tower', 20, 0),
(118, 127, '2017-07-09', '15:30:00', '16:00:00', 0, '', 0, 170, 3, 3, 934, '34 shaym tower\n, 34 shaym tower', 20, 0),
(119, 127, '2017-07-09', '15:30:00', '16:00:00', 2, '', 0, 170, 3, 3, 934, '34 shaym tower\n, 34 shaym tower', 20, 0),
(120, 128, '2017-07-09', '13:30:00', '14:00:00', 0, '', 0, 250, 4, 3, 934, '23,shreehari Street\n, 23,shreehari Street', 21, 0),
(121, 128, '2017-07-11', '09:30:00', '10:00:00', 0, '', 0, 330, 6, 3, 934, '23,shreehari Street\n, 23,shreehari Street', 21, 0),
(122, 128, '2017-07-09', '15:00:00', '15:30:00', 0, '', 0, 192, 3, 2, 934, '23,shreehari Street\n, 23,shreehari Street', 21, 0),
(123, 127, '2017-07-09', '16:30:00', '17:00:00', 1, '', 0, 1885, 5, 2, 934, '34 shaym tower\n, 34 shaym tower', 20, 0),
(124, 129, '2017-07-10', '19:00:00', '19:30:00', 0, '', 0, 110, 4, 3, 935, '23 floor plan and\n, 23 floor plan and', 22, 0),
(125, 130, '2017-07-10', '21:00:00', '21:30:00', 1, '', 0, 225, 5, 5, 935, '23, shreehari tower\n, 23, shreehari tower', 23, 0),
(126, 130, '2017-07-10', '21:00:00', '21:30:00', 0, '', 0, 225, 5, 5, 935, '23, shreehari tower\n, 23, shreehari tower', 23, 0),
(127, 130, '2017-07-13', '10:30:00', '11:00:00', 0, '', 0, 1365, 5, 5, 935, '23, shreehari tower\n, 23, shreehari tower', 23, 0),
(128, 130, '2017-07-13', '10:00:00', '10:30:00', 2, '', 0, 385, 8, 4, 935, '23, shreehari tower\n, 23, shreehari tower', 23, 0),
(129, 130, '2017-08-09', '12:00:00', '12:30:00', 0, '', 0, 1260, 2, 2, 938, 'jdhd\n, jdhd', 24, 40);

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

DROP TABLE IF EXISTS `sale_items`;
CREATE TABLE `sale_items` (
  `sale_item_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `qty` double NOT NULL,
  `unit` enum('gram','kg','nos') NOT NULL,
  `unit_value` double NOT NULL,
  `price` double NOT NULL,
  `qty_in_kg` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`sale_item_id`, `sale_id`, `product_id`, `product_name`, `qty`, `unit`, `unit_value`, `price`, `qty_in_kg`) VALUES
(116, 65, 43, '', 2.5, 'kg', 1, 8, 2.5),
(117, 82, 43, '', 1, 'kg', 1, 8, 1),
(118, 82, 44, '', 3, 'kg', 1, 4, 3),
(119, 82, 46, '', 2, '', 1, 6, 2),
(120, 82, 48, '', 4, 'kg', 0.5, 4, 4),
(121, 82, 49, '', 3, '', 1, 20, 3),
(122, 83, 43, '', 1, 'kg', 1, 8, 1),
(123, 83, 44, '', 3, 'kg', 1, 4, 3),
(124, 83, 46, '', 2, '', 1, 6, 2),
(125, 83, 48, '', 4, 'kg', 0.5, 4, 4),
(126, 83, 49, '', 3, '', 1, 20, 3),
(127, 84, 48, '', 2, 'kg', 0.5, 4, 2),
(128, 85, 48, '', 2, 'kg', 0.5, 4, 2),
(129, 85, 49, '', 3, '', 1, 20, 3),
(130, 86, 49, '', 4, '', 1, 20, 4),
(131, 87, 44, '', 3, 'kg', 1, 4, 3),
(132, 87, 45, '', 2, 'kg', 1, 4, 2),
(133, 88, 45, '', 2, 'kg', 1, 4, 2),
(134, 89, 48, '', 2, 'kg', 0.5, 4, 2),
(135, 90, 48, '', 2, 'kg', 0.5, 4, 2),
(136, 91, 48, '', 2, 'kg', 0.5, 4, 2),
(137, 92, 43, '', 4, 'kg', 1, 8, 4),
(138, 92, 45, '', 2, 'kg', 1, 4, 2),
(139, 92, 48, '', 6, 'kg', 0.5, 4, 6),
(140, 93, 66, '', 3, '', 150, 30, 3),
(141, 94, 66, '', 3, '', 150, 30, 3),
(142, 93, 67, '', 2, '', 150, 50, 2),
(143, 94, 67, '', 2, '', 150, 50, 2),
(144, 95, 66, '', 3, '', 150, 30, 3),
(145, 95, 67, '', 2, '', 150, 50, 2),
(146, 96, 55, '', 3, 'kg', 10, 20, 3),
(147, 97, 57, '', 4, 'kg', 1, 20, 4),
(148, 97, 64, '', 3, '', 1, 1200, 3),
(149, 98, 57, '', 4, 'kg', 1, 20, 4),
(150, 99, 57, '', 2, 'kg', 1, 20, 2),
(151, 99, 60, '', 2, 'kg', 1, 70, 2),
(152, 99, 61, '', 2, 'kg', 1, 80, 2),
(153, 100, 65, '', 2, '', 500, 15, 2),
(154, 100, 79, '', 3, '', 1, 890, 3),
(155, 100, 80, '', 2, '', 1, 35, 2),
(156, 101, 57, '', 2, 'kg', 1, 20, 2),
(157, 101, 60, '', 1, 'kg', 1, 70, 1),
(158, 101, 74, '', 2, '', 1, 45, 2),
(159, 102, 57, '', 3, 'kg', 1, 20, 3),
(160, 103, 57, '', 2, 'kg', 1, 20, 2),
(161, 103, 60, '', 2, 'kg', 1, 70, 2),
(162, 104, 57, '', 2, 'kg', 1, 20, 2),
(163, 104, 60, '', 2, 'kg', 1, 70, 2),
(164, 105, 57, '', 1, 'kg', 1, 20, 1),
(165, 105, 60, '', 1, 'kg', 1, 70, 1),
(166, 105, 62, '', 1, 'kg', 1, 25, 1),
(167, 105, 64, '', 1, '', 1, 1200, 1),
(168, 106, 55, '', 1, 'kg', 10, 20, 1),
(169, 106, 61, '', 1, 'kg', 1, 80, 1),
(170, 106, 65, '', 2, '', 500, 15, 2),
(171, 107, 63, '', 1, 'kg', 1, 30, 1),
(172, 107, 64, '', 1, '', 1, 1200, 1),
(173, 108, 63, '', 1, 'kg', 1, 30, 1),
(174, 108, 64, '', 1, '', 1, 1200, 1),
(175, 109, 63, '', 1, 'kg', 1, 30, 1),
(176, 109, 64, '', 1, '', 1, 1200, 1),
(177, 110, 44, '', 9, 'kg', 1, 4, 9),
(178, 110, 45, '', 4, 'kg', 1, 4, 4),
(179, 111, 57, '', 1, 'kg', 1, 20, 1),
(180, 111, 60, '', 1, 'kg', 1, 70, 1),
(181, 111, 61, '', 1, 'kg', 1, 80, 1),
(182, 111, 62, '', 1, 'kg', 1, 25, 1),
(183, 112, 57, '', 1, 'kg', 1, 20, 1),
(184, 111, 63, '', 1, 'kg', 1, 30, 1),
(185, 112, 60, '', 1, 'kg', 1, 70, 1),
(186, 112, 61, '', 1, 'kg', 1, 80, 1),
(187, 112, 62, '', 1, 'kg', 1, 25, 1),
(188, 112, 63, '', 1, 'kg', 1, 30, 1),
(189, 113, 57, '', 1, 'kg', 1, 20, 1),
(190, 113, 60, '', 1, 'kg', 1, 70, 1),
(191, 113, 61, '', 1, 'kg', 1, 80, 1),
(192, 113, 62, '', 1, 'kg', 1, 25, 1),
(193, 113, 63, '', 1, 'kg', 1, 30, 1),
(194, 114, 57, '', 1, 'kg', 1, 20, 1),
(195, 114, 60, '', 1, 'kg', 1, 70, 1),
(196, 114, 61, '', 1, 'kg', 1, 80, 1),
(197, 114, 62, '', 1, 'kg', 1, 25, 1),
(198, 114, 63, '', 1, 'kg', 1, 30, 1),
(199, 115, 57, '', 1, 'kg', 1, 20, 1),
(200, 115, 60, '', 1, 'kg', 1, 70, 1),
(201, 115, 61, '', 1, 'kg', 1, 80, 1),
(202, 115, 62, '', 1, 'kg', 1, 25, 1),
(203, 115, 63, '', 1, 'kg', 1, 30, 1),
(204, 116, 58, '', 2, '', 1, 15, 2),
(205, 116, 59, '', 2, 'kg', 1, 1200, 2),
(206, 117, 57, '', 2, 'kg', 1, 20, 2),
(207, 117, 60, '', 2, 'kg', 1, 70, 2),
(208, 118, 57, '', 1, 'kg', 1, 20, 1),
(209, 118, 60, '', 1, 'kg', 1, 70, 1),
(210, 118, 61, '', 1, 'kg', 1, 80, 1),
(211, 119, 57, '', 1, 'kg', 1, 20, 1),
(212, 119, 60, '', 1, 'kg', 1, 70, 1),
(213, 119, 61, '', 1, 'kg', 1, 80, 1),
(214, 120, 57, '', 1, 'kg', 1, 20, 1),
(215, 120, 60, '', 1, 'kg', 1, 70, 1),
(216, 120, 61, '', 2, 'kg', 1, 80, 2),
(217, 121, 57, '', 2, 'kg', 1, 20, 2),
(218, 121, 60, '', 3, 'kg', 1, 70, 3),
(219, 121, 61, '', 1, 'kg', 1, 80, 1),
(220, 122, 68, '', 1, '', 70, 72, 1),
(221, 122, 69, '', 2, '', 1, 60, 2),
(222, 123, 79, '', 2, '', 1, 890, 2),
(223, 123, 80, '', 3, '', 1, 35, 3),
(224, 124, 65, '', 2, '', 500, 15, 2),
(225, 124, 66, '', 1, '', 150, 30, 1),
(226, 124, 67, '', 1, '', 150, 50, 1),
(227, 125, 57, '', 1, 'kg', 1, 20, 1),
(228, 125, 60, '', 1, 'kg', 1, 70, 1),
(229, 125, 61, '', 1, 'kg', 1, 80, 1),
(230, 125, 62, '', 1, 'kg', 1, 25, 1),
(231, 125, 63, '', 1, 'kg', 1, 30, 1),
(232, 126, 57, '', 1, 'kg', 1, 20, 1),
(233, 126, 60, '', 1, 'kg', 1, 70, 1),
(234, 126, 61, '', 1, 'kg', 1, 80, 1),
(235, 126, 62, '', 1, 'kg', 1, 25, 1),
(236, 126, 63, '', 1, 'kg', 1, 30, 1),
(237, 127, 55, '', 1, 'kg', 10, 20, 1),
(238, 127, 58, '', 1, '', 1, 15, 1),
(239, 127, 59, '', 1, 'kg', 1, 1200, 1),
(240, 127, 72, '', 1, '', 1, 50, 1),
(241, 127, 73, '', 1, '', 1, 80, 1),
(242, 128, 57, '', 3, 'kg', 1, 20, 3),
(243, 128, 60, '', 2, 'kg', 1, 70, 2),
(244, 128, 61, '', 2, 'kg', 1, 80, 2),
(245, 128, 62, '', 1, 'kg', 1, 25, 1),
(246, 129, 55, '', 1, 'kg', 10, 20, 1),
(247, 129, 59, '', 1, 'kg', 1, 1200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `value`) VALUES
('1', 'minmum order amount', '50'),
('2', 'maxmum order amount', '7000');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slider_title` varchar(100) NOT NULL,
  `slider_url` varchar(100) NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `slider_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_title`, `slider_url`, `slider_image`, `slider_status`) VALUES
(1, 'Grocery', 'www.test.com', 'slider1.png', 1),
(2, 'Personal Care', '', 'slider2.png', 1),
(3, 'Household', '', 'slider3.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `socity`
--

DROP TABLE IF EXISTS `socity`;
CREATE TABLE `socity` (
  `socity_id` int(11) NOT NULL,
  `socity_name` varchar(200) NOT NULL,
  `pincode` varchar(15) NOT NULL,
  `delivery_charge` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `socity`
--

INSERT INTO `socity` (`socity_id`, `socity_name`, `pincode`, `delivery_charge`) VALUES
(934, 'London Park', '363625', 55),
(935, 'Mira park', '363625', 55),
(936, 'Alnaeem', '360005', 10),
(938, 'new rajkot', '654321', 40),
(939, 'shivam park', '369851', 55);

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

DROP TABLE IF EXISTS `time_slots`;
CREATE TABLE `time_slots` (
  `opening_time` time NOT NULL,
  `closing_time` time NOT NULL,
  `time_slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_slots`
--

INSERT INTO `time_slots` (`opening_time`, `closing_time`, `time_slot`) VALUES
('08:30:00', '21:30:00', 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_password` longtext NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `user_bdate` date NOT NULL,
  `is_email_varified` int(11) NOT NULL,
  `varified_token` varchar(255) NOT NULL,
  `user_gcm_code` longtext NOT NULL,
  `user_ios_token` longtext NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_fullname`, `user_password`, `user_type_id`, `user_bdate`, `is_email_varified`, `varified_token`, `user_gcm_code`, `user_ios_token`, `user_status`, `user_image`, `user_city`) VALUES
(1, 'administrator', 'admin@gmail.com', '9909038886', 'Main Admininistrator', 'ede997b0caf2ec398110d79d9eba38bb', 0, '2016-03-04', 1, '', '', '', 1, 'women_gym_workout_wallpaper1.jpg', 0),
(46, 'subhash', 'subhash@gmail.com', '9737938886', 'Subhash Sanghani', 'e10adc3949ba59abbe56e057f20f883e', 0, '0000-00-00', 0, '823998', '', 'dW0pY_Orw8k:APA91bE_GZvhyk-xMpeu8Esr1jr8eUhpfU8xzCZ1skX11yZpAU52qPDfMtVm4vVNmZJXuG5q2OaadupDhT6LjddKR9dBY8OsUr_HRV-SWjWnvM-ZGgcs6bLF47R78SZu44h8Txkef5PT', 1, '5b76a9b766182953cadb5d045e3afc86.jpg', 0),
(47, '', 'jayesh@gmail.com', '', 'jayesh', 'ede997b0caf2ec398110d79d9eba38bb', 2, '0000-00-00', 0, '', '', '', 1, '', 0),
(51, '', 'gopupatel@gmail.com', '', 'gopupatel', 'ede997b0caf2ec398110d79d9eba38bb', 1, '0000-00-00', 0, '', '', '', 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_location`
--

DROP TABLE IF EXISTS `user_location`;
CREATE TABLE `user_location` (
  `location_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `socity_id` int(11) NOT NULL,
  `house_no` longtext NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_location`
--

INSERT INTO `user_location` (`location_id`, `user_id`, `pincode`, `socity_id`, `house_no`, `receiver_name`, `receiver_mobile`) VALUES
(15, 125, '363641', 935, '25 syam park', 'subhash sanghani', '9979038886'),
(16, 124, '363625', 935, '1 una', 'rajesh', '8530875124'),
(17, 124, '363625', 934, '21 una', 'rajesh', '8530875124'),
(18, 125, '363625', 935, '301 syam park', 'suresh kotadiya', '9979088888'),
(19, 126, '363625', 935, 'shreehari web Street', 'shreehari', '9974850403'),
(20, 127, '363625', 934, '34 shaym tower', 'satish', '9658741238'),
(21, 128, '363625', 934, '23,shreehari Street', 'subhash', '9632587410'),
(22, 129, '363625', 935, '23 floor plan and', 'rajesh', '9852346177'),
(23, 130, '363625', 935, '23, shreehari tower', 'user name', '9632580741'),
(24, 130, '15782', 938, 'jdhd', 'punita', '654123987056');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

DROP TABLE IF EXISTS `user_types`;
CREATE TABLE `user_types` (
  `user_type_id` int(11) NOT NULL,
  `user_type_title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`user_type_id`, `user_type_title`) VALUES
(1, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_type_access`
--

DROP TABLE IF EXISTS `user_type_access`;
CREATE TABLE `user_type_access` (
  `user_type_id` int(11) NOT NULL,
  `class` varchar(30) NOT NULL,
  `method` varchar(30) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type_access`
--

INSERT INTO `user_type_access` (`user_type_id`, `class`, `method`, `access`) VALUES
(0, 'admin', '*', 1),
(0, 'child', '*', 1),
(0, 'parents', '*', 1),
(0, 'timeline', '*', 1),
(0, 'users', '*', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `closing_hours`
--
ALTER TABLE `closing_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pageapp`
--
ALTER TABLE `pageapp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`sale_item_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socity`
--
ALTER TABLE `socity`
  ADD PRIMARY KEY (`socity_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `user_location`
--
ALTER TABLE `user_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `user_type_access`
--
ALTER TABLE `user_type_access`
  ADD UNIQUE KEY `user_type_id` (`user_type_id`,`class`,`method`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `closing_hours`
--
ALTER TABLE `closing_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pageapp`
--
ALTER TABLE `pageapp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `sale_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `socity`
--
ALTER TABLE `socity`
  MODIFY `socity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=940;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `user_location`
--
ALTER TABLE `user_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
