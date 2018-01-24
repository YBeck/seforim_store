-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2018 at 12:00 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seforim_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `allbids`
--

CREATE TABLE `allbids` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `cur_bid` decimal(12,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allbids`
--

INSERT INTO `allbids` (`id`, `item_id`, `cur_bid`) VALUES
(15, 2, '1.00'),
(16, 2, '61.00'),
(17, 2, '58.00'),
(18, 2, '61.00'),
(19, 2, '66.00'),
(20, 2, '67.00'),
(21, 2, '81.00'),
(22, 2, '84.00'),
(23, 2, '86.00'),
(24, 2, '91.00'),
(25, 2, '95.00'),
(26, 1, '35.00'),
(27, 1, '41.00'),
(28, 1, '46.00'),
(29, 1, '51.00'),
(30, 1, '54.00'),
(31, 3, '35.00'),
(32, 4, '145.00'),
(33, 8, '21.00'),
(34, 8, '46.00'),
(35, 8, '46.00'),
(36, 8, '51.00'),
(37, 8, '51.00'),
(38, 8, '76.00'),
(39, 7, '34.00'),
(40, 7, '51.00'),
(41, 7, '56.00'),
(43, 7, '66.00'),
(53, 7, '90.00'),
(54, 7, '92.00'),
(55, 7, '99.00'),
(56, 6, '22.00'),
(57, 6, '30.00'),
(58, 6, '30.00'),
(59, 6, '778.00'),
(60, 7, '101.00'),
(61, 7, '104.00'),
(62, 7, '106.00'),
(63, 7, '201.00'),
(64, 6, '778.00'),
(65, 6, '780.00'),
(66, 6, '780.00'),
(67, 6, '782.00'),
(68, 6, '782.00'),
(69, 6, '801.00'),
(70, 1, '61.00'),
(71, 1, '64.00'),
(72, 1, '71.00'),
(73, 1, '101.00'),
(74, 1, '121.00'),
(75, 1, '123.00'),
(76, 1, '123.00'),
(77, 3, '41.00'),
(78, 3, '41.00'),
(79, 3, '81.00'),
(80, 3, '81.00'),
(81, 3, '86.00'),
(82, 3, '89.00'),
(83, 3, '91.00'),
(84, 3, '93.00'),
(85, 3, '96.00'),
(86, 3, '99.00'),
(87, 3, '101.00'),
(88, 3, '107.00'),
(89, 3, '111.00'),
(90, 3, '112.00'),
(91, 6, '801.00'),
(92, 6, '804.00'),
(93, 6, '808.00'),
(94, 6, '811.00'),
(95, 6, '813.00'),
(96, 6, '822.00'),
(101, 8, '76.00'),
(102, 8, '81.00'),
(103, 8, '201.00'),
(104, 7, '301.00'),
(105, 7, '351.00'),
(106, 7, '401.00'),
(109, 7, '411.00'),
(110, 7, '511.00'),
(114, 6, '831.00'),
(115, 6, '901.00'),
(120, 8, '231.00'),
(122, 7, '516.00'),
(123, 7, '519.00'),
(124, 8, '301.00'),
(125, 8, '301.00'),
(126, 8, '331.00'),
(127, 8, '401.00'),
(128, 8, '421.00'),
(129, 8, '451.00'),
(130, 8, '456.00'),
(131, 8, '476.00'),
(132, 8, '476.00'),
(134, 1, '126.00'),
(135, 1, '128.00'),
(136, 1, '131.00'),
(137, 1, '131.00'),
(138, 1, '134.00'),
(152, 9, '201.00'),
(153, 9, '206.00'),
(154, 9, '208.00'),
(155, 9, '210.00'),
(156, 9, '211.00'),
(157, 9, '213.00'),
(158, 9, '216.00'),
(159, 9, '216.00'),
(160, 9, '218.00'),
(161, 9, '220.00'),
(162, 1, '136.00');

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `bid_time` datetime NOT NULL,
  `max_bid` decimal(12,2) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`id`, `cust_id`, `bid_time`, `max_bid`, `item_id`) VALUES
(11, 1, '2017-12-24 19:37:39', '60.00', 2),
(12, 1, '2017-12-24 19:40:23', '60.00', 2),
(13, 1, '2017-12-24 19:41:12', '57.00', 2),
(14, 1, '2017-12-24 22:08:14', '65.00', 2),
(15, 1, '2017-12-24 22:24:15', '66.00', 2),
(16, 1, '2017-12-24 23:19:26', '80.00', 2),
(17, 3, '2017-12-24 23:23:29', '85.00', 2),
(18, 4, '2017-12-24 23:26:32', '83.00', 2),
(19, 1, '2017-12-24 23:35:45', '90.00', 2),
(20, 4, '2017-12-25 21:59:47', '100.00', 2),
(21, 4, '2017-12-25 22:01:25', '94.00', 2),
(22, 4, '2017-12-25 22:04:26', '40.00', 1),
(23, 4, '2017-12-25 22:05:57', '45.00', 1),
(24, 4, '2017-12-25 22:06:20', '50.00', 1),
(25, 4, '2017-12-26 22:34:22', '60.00', 1),
(26, 4, '2017-12-27 19:32:33', '53.00', 1),
(27, 1, '2018-01-02 13:23:22', '40.00', 3),
(28, 1, '2018-01-03 23:44:56', '145.00', 4),
(29, 6, '2018-01-11 21:38:24', '45.00', 8),
(30, 6, '2018-01-11 21:38:26', '45.00', 8),
(31, 6, '2018-01-11 21:38:48', '50.00', 8),
(32, 6, '2018-01-11 21:38:52', '50.00', 8),
(33, 6, '2018-01-11 21:39:05', '75.00', 8),
(34, 6, '2018-01-11 21:39:08', '75.00', 8),
(35, 1, '2018-01-11 21:39:47', '50.00', 7),
(36, 1, '2018-01-11 21:40:06', '65.00', 7),
(37, 6, '2018-01-11 21:40:24', '55.00', 7),
(39, 6, '2018-01-11 21:40:50', '89.00', 7),
(49, 1, '2018-01-11 21:44:31', '100.00', 7),
(50, 1, '2018-01-11 21:44:48', '91.00', 7),
(51, 1, '2018-01-11 21:44:59', '98.00', 7),
(52, 5, '2018-01-11 21:46:04', '29.00', 6),
(53, 5, '2018-01-11 21:46:05', '29.00', 6),
(54, 5, '2018-01-11 21:46:16', '777.00', 6),
(55, 5, '2018-01-11 21:46:26', '777.00', 6),
(56, 5, '2018-01-11 21:46:53', '200.00', 7),
(57, 5, '2018-01-11 21:47:05', '103.00', 7),
(58, 5, '2018-01-11 21:47:59', '105.00', 7),
(59, 5, '2018-01-11 21:48:15', '400.00', 7),
(60, 5, '2018-01-11 21:48:40', '779.00', 6),
(61, 5, '2018-01-11 21:48:52', '779.00', 6),
(62, 5, '2018-01-11 21:49:08', '781.00', 6),
(63, 5, '2018-01-11 21:49:15', '781.00', 6),
(64, 1, '2018-01-11 21:50:10', '800.00', 6),
(65, 1, '2018-01-11 21:51:06', '800.00', 6),
(66, 1, '2018-01-11 21:51:42', '100.00', 1),
(67, 1, '2018-01-11 21:51:53', '63.00', 1),
(68, 5, '2018-01-11 21:52:25', '70.00', 1),
(69, 5, '2018-01-11 21:52:32', '120.00', 1),
(70, 5, '2018-01-11 21:52:41', '122.00', 1),
(71, 5, '2018-01-11 21:53:00', '122.00', 1),
(72, 1, '2018-01-11 21:56:20', '125.00', 1),
(73, 1, '2018-01-11 21:56:39', '40.00', 3),
(74, 1, '2018-01-11 21:56:47', '80.00', 3),
(75, 1, '2018-01-11 21:56:52', '80.00', 3),
(76, 1, '2018-01-11 21:57:05', '90.00', 3),
(77, 1, '2018-01-11 21:57:15', '85.00', 3),
(78, 1, '2018-01-11 21:57:36', '88.00', 3),
(79, 1, '2018-01-11 21:59:21', '95.00', 3),
(80, 1, '2018-01-11 21:59:34', '92.00', 3),
(81, 1, '2018-01-11 21:59:41', '98.00', 3),
(82, 1, '2018-01-11 22:00:22', '100.00', 3),
(83, 1, '2018-01-11 22:00:34', '110.00', 3),
(84, 1, '2018-01-11 22:00:47', '106.00', 3),
(85, 1, '2018-01-11 22:01:25', '111.00', 3),
(86, 1, '2018-01-11 22:01:37', '120.00', 3),
(87, 1, '2018-01-11 22:01:59', '810.00', 6),
(88, 1, '2018-01-11 22:10:25', '807.00', 6),
(89, 1, '2018-01-11 22:11:21', '812.00', 6),
(90, 1, '2018-01-11 22:11:33', '830.00', 6),
(91, 1, '2018-01-11 22:12:00', '821.00', 6),
(96, 1, '2018-01-11 22:23:15', '200.00', 8),
(97, 1, '2018-01-11 22:23:33', '80.00', 8),
(98, 1, '2018-01-11 22:23:39', '230.00', 8),
(99, 1, '2018-01-11 22:24:06', '300.00', 7),
(100, 1, '2018-01-11 22:24:19', '350.00', 7),
(101, 1, '2018-01-11 22:25:31', '410.00', 7),
(104, 1, '2018-01-11 22:27:02', '510.00', 7),
(105, 1, '2018-01-11 22:27:14', '515.00', 7),
(109, 1, '2018-01-11 22:28:49', '900.00', 6),
(110, 1, '2018-01-11 22:28:59', '910.00', 6),
(115, 1, '2018-01-11 22:32:46', '300.00', 8),
(117, 1, '2018-01-11 23:04:06', '600.00', 7),
(118, 1, '2018-01-11 23:04:17', '518.00', 7),
(119, 1, '2018-01-11 23:04:33', '300.00', 8),
(120, 1, '2018-01-11 23:04:44', '400.00', 8),
(121, 1, '2018-01-11 23:10:34', '330.00', 8),
(122, 1, '2018-01-11 23:10:40', '450.00', 8),
(123, 1, '2018-01-11 23:10:53', '420.00', 8),
(124, 1, '2018-01-11 23:11:01', '475.00', 8),
(125, 1, '2018-01-11 23:11:09', '455.00', 8),
(126, 1, '2018-01-11 23:11:17', '475.00', 8),
(127, 1, '2018-01-11 23:11:38', '480.00', 8),
(129, 1, '2018-01-12 09:18:44', '130.00', 1),
(130, 1, '2018-01-12 09:18:56', '127.00', 1),
(131, 1, '2018-01-12 09:19:04', '130.00', 1),
(132, 1, '2018-01-12 09:19:14', '135.00', 1),
(133, 1, '2018-01-12 09:22:10', '133.00', 1),
(148, 1, '2018-01-22 12:40:24', '205.00', 9),
(149, 1, '2018-01-22 12:40:39', '207.00', 9),
(150, 1, '2018-01-22 12:40:50', '210.00', 9),
(151, 1, '2018-01-22 12:40:59', '209.00', 9),
(152, 1, '2018-01-22 12:42:54', '215.00', 9),
(153, 1, '2018-01-22 12:43:06', '212.00', 9),
(154, 4, '2018-01-22 12:44:35', '215.00', 9),
(155, 4, '2018-01-22 12:47:20', '220.00', 9),
(156, 4, '2018-01-22 12:47:30', '217.00', 9),
(157, 3, '2018-01-22 12:48:11', '220.00', 9),
(158, 4, '2018-01-22 20:23:23', '150.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Torah'),
(2, 'Mishnah'),
(3, 'Shas'),
(4, 'Musser'),
(5, 'Halachah'),
(6, 'Rishonim'),
(7, 'Acharonim');

-- --------------------------------------------------------

--
-- Table structure for table `createauction`
--

CREATE TABLE `createauction` (
  `id` int(11) NOT NULL,
  `sellerId` int(11) NOT NULL,
  `productName` varchar(30) NOT NULL,
  `title` varchar(100) NOT NULL,
  `mainImage` varchar(200) NOT NULL,
  `subImg1` varchar(200) NOT NULL,
  `subImg2` varchar(200) NOT NULL,
  `subImg3` varchar(200) NOT NULL,
  `productCondition` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `startPrice` decimal(10,2) NOT NULL,
  `days` int(11) NOT NULL,
  `startDay` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `endDay` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `createauction`
--

INSERT INTO `createauction` (`id`, `sellerId`, `productName`, `title`, `mainImage`, `subImg1`, `subImg2`, `subImg3`, `productCondition`, `description`, `startPrice`, `days`, `startDay`, `endDay`) VALUES
(1, 1, 'Aishes Chayil plaque', 'A beautiful Aishes Chayil silver plated plaque ', 'images/fish.jpg', 'images/brownie.jpg', 'images/pizza.jpg', 'images/RICOTTA_RAVIOLI.jpg', 'new', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium inventore ad. Perspiciatis dolore nihil laborum laudantium eligendi suscipit possimus temporibus.', '34.00', 4, '2017-12-30 22:56:09', '2018-01-04 22:56:09'),
(2, 3, 'Washing cup', 'A beautiful silver plated washing cup', 'images/about2.jpg', 'images/Chickpea and Mint Crostini.jpg', 'images/greek salad.jpg', 'images/french soup.jpg', 'Used', 'This is a used washing cup that was used in the \'Alter Heim\'', '56.00', 4, '2017-12-24 16:43:28', '2017-12-29 16:43:28'),
(3, 1, 'Talis', 'A beautiful talis', 'images/05a4bbcc724822.jpg', 'images/15a4bbcc724ff2.jpg', 'images/25a4bbcc7253da.jpg', 'images/35a4bbcc7257c2.jpg', 'used', 'This talis was worn by many great people', '34.00', 8, '2018-01-02 12:09:27', '2018-01-10 12:09:27'),
(4, 1, 'Streimal', 'A beutiful display of streimals for any type', 'images/05a4bd19d780af.jpg', 'images/15a4bd19d78497.jpg', 'images/25a4bd19d78c67.jpg', 'images/35a4bd19d7904f.jpg', 'new', 'No matter your type we have the perfect streimal for you! ', '144.00', 6, '2018-01-02 13:38:21', '2018-01-08 13:38:21'),
(6, 3, 'Mr. potato head', 'Mr. potato head parts', 'images/05a54e14ff0af5.jpg', 'images/15a54e14ff0af5.png', 'images/25a54e14ff0af5.png', 'images/35a54e14ff0af5.png', 'new', 'Useful parts for Mr. potato head ', '21.00', 5, '2018-01-09 10:35:44', '2018-01-14 10:35:44'),
(7, 1, 'potato 2', 'new potato', 'images/05a581ee921530.jpg', 'images/15a581ee921530.jpg', 'images/25a581ee921530.jpg', 'images/35a581ee921530.jpg', 'new', 'sdf', '33.00', 3, '2018-01-11 21:35:21', '2018-01-14 21:35:21'),
(8, 6, 'smartphone', 'eujcrjreoijew', 'images/05a581f89020cd.jpg', 'images/15a581f89024b5.jpg', 'images/25a581f890289e.jpg', 'images/35a581f890289e.jpg', 'used', 'd3erf', '20.00', 1, '2018-01-11 21:38:01', '2018-01-12 21:38:01'),
(9, 5, 'nach', 'Nach', 'images/05a581ff9ee0d1.jpg', 'images/15a581ff9ee4b9.jpg', 'images/25a581ff9ee8a1.jpg', 'images/35a581ff9ee8a1.jpg', 'new', 'Nach', '200.00', 5, '2018-01-11 21:39:53', '2018-01-16 21:39:53'),
(10, 4, 'Snake', 'Very scary snake', 'images/05a67f25cde6c9.png', 'images/15a67f25cdeab2.png', 'images/25a67f25cdf282.png', 'images/35a67f25cdfa52.png', 'new', 'you will love this snake', '34.00', 5, '2018-01-23 21:41:32', '2018-01-28 21:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(70) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(15) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `address`, `city`, `state`, `zip`, `phone`) VALUES
(1, 'yochanan', 'beck', 'ybeck115@gmail.com', '34 iroquois pl.', 'lakewood', 'nj', '08701', '17323701235'),
(2, 'y', 'beck', 'ybeck115@gmail.com', '34 iroquois pl.', 'lakewood', 'nj', '08701', '17323701235'),
(3, 'tzvi', 'beck', 'ybeck115@gmail.com', '34 iroquois pl.', 'lakewood', 'nj', '08701', '17323701235'),
(4, 'Moshe', 'Braun', 'mbraun@hotmail.com', '909 countyline rd.', 'jackson', 'nj', '08701', '17323704567'),
(5, 'Yechezkel', 'Herz', 'yh@yherz.com', '214 John Street', 'Lakewood Township', 'NJ', '08701', '8625710062'),
(6, 'rafael ', 'goldberg', 'rg@rg.com', '15 shemen', 'lakewood', 'nj', '07870', '8458936614');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`) VALUES
(1, 1, '0000-00-00 00:00:00'),
(2, 1, '0000-00-00 00:00:00'),
(3, 1, '0000-00-00 00:00:00'),
(4, 1, '2017-09-26 17:29:35'),
(5, 1, '2017-09-28 13:58:31'),
(6, 1, '2017-09-28 17:17:04'),
(7, 1, '2017-09-28 17:23:34'),
(8, 1, '2017-09-28 17:29:36'),
(9, 2, '2017-10-01 10:49:36'),
(10, 3, '2017-10-01 15:51:37'),
(11, 2, '2017-10-04 02:47:03'),
(12, 1, '2017-10-16 17:32:36'),
(13, 1, '2017-10-16 17:35:26'),
(14, 3, '2017-10-17 00:27:52'),
(15, 3, '2017-10-17 00:43:26'),
(16, 3, '2017-10-17 03:14:52'),
(17, 3, '2017-10-17 03:15:57'),
(18, 3, '2017-11-16 17:29:41'),
(19, 1, '2017-11-26 18:36:54'),
(20, 3, '2017-12-20 14:51:08'),
(21, 4, '2018-01-10 16:47:09'),
(22, 5, '2018-01-12 02:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `product_id`, `quantity`, `discount`) VALUES
(1, 1, 39, 1, 0),
(2, 2, 16, 1, 0),
(3, 2, 55, 1, 0),
(4, 2, 54, 1, 0),
(5, 3, 16, 1, 0),
(6, 4, 3, 1, 0),
(7, 4, 55, 1, 0),
(8, 5, 55, 1, 0),
(9, 6, 16, 1, 0),
(10, 7, 16, 1, 0),
(11, 8, 16, 1, 0),
(12, 9, 18, 1, 0),
(13, 9, 54, 1, 0),
(14, 10, 54, 1, 0),
(15, 11, 16, 1, 0),
(16, 12, 54, 1, 0),
(17, 13, 54, 1, 0),
(18, 14, 54, 1, 0),
(19, 15, 54, 1, 0),
(20, 16, 54, 1, 0),
(21, 17, 54, 1, 0),
(22, 18, 18, 1, 0),
(23, 19, 59, 1, 0),
(24, 20, 59, 1, 0),
(25, 21, 58, 1, 0),
(26, 22, 54, 80, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seforim`
--

CREATE TABLE `seforim` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `units_in_stock` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seforim`
--

INSERT INTO `seforim` (`id`, `name`, `price`, `units_in_stock`, `category`) VALUES
(3, 'mishnaiyos', '10.12', 5, 2),
(16, 'mesilas yesharim', '56.56', -3, 4),
(18, 'rashi', '50.00', 6, 1),
(19, 'torah', '45.00', 19, 1),
(24, 'rambam', '48.99', 4, 5),
(25, 'misnah berurah', '34.88', 7, 5),
(32, 'Pirkei Avos', '33.33', 4, 2),
(39, 'Gemara', '456.45', 26, 3),
(54, 'chasam sofer', '56.00', -55, 1),
(55, 'Igros Moshe', '34.99', 16, 5),
(57, 'Or Hachaim', '45.88', 20, 1),
(58, 'Ramban Al Hatorah', '54.00', 22, 1),
(59, 'bais halevi', '34.00', 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `userpassword`
--

CREATE TABLE `userpassword` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userpassword`
--

INSERT INTO `userpassword` (`id`, `cust_id`, `user_name`, `password`, `admin`) VALUES
(1, 1, 'ybeck', '$2y$10$P1ilgrCFj/e4C7fIhiT15.633WcjmK/C9lgR7sbafli99UrphRjt2', 1),
(2, 2, 'be', '$2y$10$eLrrSTr5G7j6vp82I7bGOu1BOu/sAyJlKEjaq00TvQ4lMcxoZAbiG', 0),
(3, 3, 'tbeck', '$2y$10$2PFkZdTgAcXC8IJihOK4IOF07PHEcz6lmEEK/e/DlIau5knzFErd2', 0),
(4, 4, 'mbraun', '$2y$10$0dpT2myBvKPuxVR8aYFPVefztJB5V3SR74uKmWZmtWwquds9Bawh6', 0),
(5, 5, 'yechezkel', '$2y$10$HMeEruNVVWM3APrbO0fDg.hZe7JmojPSDc01wFGEi6bcyhL7k.kZW', 0),
(6, 6, 'rg', '$2y$10$YWt8jDGJZVJRQrKLWhjsZuj5ctOlFPIaoQLcdKhTWwy.Rj2lMJAmm', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allbids`
--
ALTER TABLE `allbids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_item_id` (`item_id`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cust` (`cust_id`),
  ADD KEY `fk_item` (`item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `createauction`
--
ALTER TABLE `createauction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sell_id` (`sellerId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_cust_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `fk_order_id` (`order_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `seforim`
--
ALTER TABLE `seforim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userpassword`
--
ALTER TABLE `userpassword`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allbids`
--
ALTER TABLE `allbids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `createauction`
--
ALTER TABLE `createauction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `seforim`
--
ALTER TABLE `seforim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `userpassword`
--
ALTER TABLE `userpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `allbids`
--
ALTER TABLE `allbids`
  ADD CONSTRAINT `fk_item_id` FOREIGN KEY (`item_id`) REFERENCES `createauction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `fk_cust` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_item` FOREIGN KEY (`item_id`) REFERENCES `createauction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `createauction`
--
ALTER TABLE `createauction`
  ADD CONSTRAINT `fk_sell_id` FOREIGN KEY (`sellerId`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_cust_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `seforim` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
