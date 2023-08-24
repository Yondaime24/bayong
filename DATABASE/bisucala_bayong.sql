-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 04:52 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bisucala_bayong`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `firstname`, `lastname`, `email`, `username`, `password`) VALUES
(3, 'Layca', 'Sequina', 'laycasequina@gmail.com', 'layca', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'PRINTED''S BAYONG'),
(2, 'CLASSY BAYONG'),
(3, 'NATIVE BAYONG'),
(4, 'TEENSBAYONG');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(300) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `user_id`, `action`, `date`) VALUES
(1, 1, 'added a new product 12 of flmjkrmklm', '2017-11-04 18:25:35'),
(2, 1, 'added a new product 34 of gdrgneknkl', '2017-11-04 18:26:04'),
(3, 1, 'added a new product 78 of bdkj', '2017-11-04 18:26:48'),
(4, 0, 'added a new product 133 of Arduino Meta', '2017-11-05 13:00:22'),
(5, 1, 'added a new product 477 of Sugo Peanuts', '2017-11-05 18:15:15'),
(6, 0, 'added a new product 123 of kmyygk', '2017-11-06 11:21:42'),
(7, 5, 'has logged in the system at ', '2017-11-06 21:53:21'),
(8, 1, '(Administrator) has logged in the system at ', '2017-11-06 21:56:17'),
(9, 5, 'has logged in the system at ', '2017-11-06 22:25:17'),
(10, 1, '(Administrator) has logged in the system at ', '2017-11-06 22:25:38'),
(11, 2, '(Administrator) has logged in the system at ', '2017-11-06 23:22:24'),
(12, 5, 'has logged in the system at ', '2017-11-07 00:08:10'),
(13, 1, '(Administrator) has logged in the system at ', '2017-11-07 10:14:23'),
(14, 1, '(Administrator) has logged in the system at ', '2017-11-07 10:33:43'),
(15, 1, '(Administrator) has logged in the system at ', '2017-11-07 10:36:37'),
(16, 1, '(Administrator) has logged in the system at ', '2017-11-07 10:39:08'),
(17, 1, '(Administrator) has logged in the system at ', '2017-11-07 10:39:41'),
(18, 4, 'has logged in the system at ', '2017-11-07 11:04:22'),
(19, 1, '(Administrator) has logged in the system at ', '2017-11-07 11:04:30'),
(20, 4, 'has logged in the system at ', '2017-11-07 11:44:36'),
(21, 4, 'has logged in the system at ', '2017-11-07 18:32:28'),
(22, 1, '(Administrator) has logged in the system at ', '2017-11-07 18:32:49'),
(23, 4, 'has logged in the system at ', '2017-11-07 18:34:55'),
(24, 1, '(Administrator) has logged in the system at ', '2017-11-07 18:39:23'),
(25, 1, 'added a new product 33 of San Marino Corned Tuna', '2017-11-07 18:40:25'),
(26, 1, 'added a new product 453 of 4535', '2017-11-07 18:43:34'),
(27, 1, '(Administrator) has logged in the system at ', '2017-11-07 19:16:29'),
(28, 1, '(Administrator) has logged in the system at ', '2017-11-07 19:17:07'),
(29, 4, 'has logged in the system at ', '2017-11-07 19:27:49'),
(30, 1, '(Administrator) has logged in the system at ', '2017-11-07 19:28:00'),
(31, 1, 'added 2 of Arduino Metad', '2017-11-07 19:28:43'),
(32, 1, '(Administrator) has logged in the system at ', '2017-11-07 22:40:11'),
(33, 1, 'added a new product 2 of 540 microfarad capacitor', '2017-11-07 22:42:03'),
(34, 1, '(Administrator) has logged in the system at ', '2017-11-07 23:43:49'),
(35, 4, 'has logged in the system at ', '2017-11-08 12:31:38'),
(36, 1, '(Administrator) has logged in the system at ', '2017-11-08 12:45:41'),
(37, 1, '(Administrator) has logged in the system at ', '2017-11-08 13:46:56'),
(38, 4, 'has logged in the system at ', '2017-11-08 13:56:15'),
(39, 4, 'has logged in the system at ', '2017-11-08 14:39:44'),
(40, 1, '(Administrator) has logged in the system at ', '2017-11-08 14:54:05'),
(41, 1, 'added 5 of 540 microfarad capacitor', '2017-11-08 15:04:55'),
(42, 4, 'has logged in the system at ', '2017-11-08 15:21:00'),
(43, 1, '(Administrator) has logged in the system at ', '2017-11-08 15:29:08'),
(44, 1, '(Administrator) has logged in the system at ', '2017-11-08 15:34:28'),
(45, 1, '(Administrator) has logged in the system at ', '2017-11-08 15:38:21'),
(46, 6, 'has logged in the system at ', '2017-11-08 19:29:55'),
(47, 1, '(Administrator) has logged in the system at ', '2017-11-08 19:32:24'),
(48, 6, 'has logged in the system at ', '2017-11-08 20:13:57'),
(49, 6, 'has logged in the system at ', '2017-11-08 20:20:43'),
(50, 1, '(Administrator) has logged in the system at ', '2017-11-08 20:46:23'),
(51, 6, 'has logged in the system at ', '2017-11-08 20:59:18'),
(52, 1, '(Administrator) has logged in the system at ', '2017-11-08 21:32:10'),
(53, 6, 'has logged in the system at ', '2017-11-08 21:34:41'),
(54, 1, '(Administrator) has logged in the system at ', '2017-11-08 21:39:31'),
(55, 1, 'added a new product 34 of Arduino Uno', '2017-11-08 21:40:51'),
(56, 6, 'has logged in the system at ', '2017-11-08 22:18:15'),
(57, 6, 'has logged in the system at ', '2017-11-08 22:19:58'),
(58, 1, '(Administrator) has logged in the system at ', '2017-11-08 22:56:12'),
(59, 6, 'has logged in the system at ', '2017-11-08 22:59:17'),
(60, 6, 'has logged in the system at ', '2017-11-09 15:21:55'),
(61, 6, 'has logged in the system at ', '2017-11-09 15:45:14'),
(62, 6, 'has logged in the system at ', '2017-11-09 15:46:39'),
(63, 6, 'has logged in the system at ', '2017-11-09 15:57:59'),
(64, 6, 'has logged in the system at ', '2017-11-09 16:34:47'),
(65, 6, 'has logged in the system at ', '2017-11-09 17:02:52'),
(66, 6, 'has logged in the system at ', '2017-11-09 19:54:15'),
(67, 6, 'has logged in the system at ', '2017-11-09 21:21:45'),
(68, 1, '(Administrator) has logged in the system at ', '2017-11-10 00:23:49'),
(69, 6, 'has logged in the system at ', '2017-11-10 00:24:25'),
(70, 1, '(Administrator) has logged in the system at ', '2017-11-10 00:54:01'),
(71, 6, 'has logged in the system at ', '2017-11-10 00:54:22'),
(72, 4, 'has logged in the system at ', '2017-11-10 01:38:17'),
(73, 6, 'has logged in the system at ', '2017-11-10 11:00:43'),
(74, 6, 'has logged in the system at ', '2017-11-10 23:53:20'),
(75, 6, 'has logged in the system at ', '2017-11-11 00:00:46'),
(76, 6, 'has logged in the system at ', '2017-11-11 00:10:29'),
(77, 6, 'has logged in the system at ', '2017-11-11 00:26:10'),
(78, 1, '(Administrator) has logged in the system at ', '2017-11-11 01:38:51'),
(79, 6, 'has logged in the system at ', '2017-11-12 01:36:32'),
(80, 6, 'has logged in the system at ', '2017-11-12 21:22:19'),
(81, 1, '(Administrator) has logged in the system at ', '2017-11-12 21:25:48'),
(82, 1, '(Administrator) has logged in the system at ', '2017-11-12 21:26:22'),
(83, 2, '(Administrator) has logged in the system at ', '2017-11-12 21:29:04'),
(84, 6, 'has logged in the system at ', '2017-11-12 21:45:12'),
(85, 2, '(Administrator) has logged in the system at ', '2017-11-12 21:47:14'),
(86, 6, 'has logged in the system at ', '2017-11-12 23:14:12'),
(87, 1, '(Administrator) has logged in the system at ', '2017-11-12 23:19:55'),
(88, 6, 'has logged in the system at ', '2017-11-12 23:22:32'),
(89, 6, 'has logged in the system at ', '2017-11-13 00:17:25'),
(90, 1, '(Administrator) has logged in the system at ', '2017-11-13 00:28:25'),
(91, 1, 'added a new product 150 of Arduino Uno Rec3-1', '2017-11-13 00:31:30'),
(92, 1, 'added a new product 400 of Aruino Mega', '2017-11-13 00:32:19'),
(93, 1, 'added a new product 344 of Arduino Uno 2', '2017-11-13 00:33:17'),
(94, 1, 'added a new product 234 of Raspberry Pi 3', '2017-11-13 00:34:22'),
(95, 1, 'added a new product 456 of Flame Sensor', '2017-11-13 00:35:28'),
(96, 6, 'has logged in the system at ', '2017-11-13 00:38:32'),
(97, 1, '(Administrator) has logged in the system at ', '2017-11-13 08:45:06'),
(98, 6, 'has logged in the system at ', '2017-11-13 08:47:34'),
(99, 1, '(Administrator) has logged in the system at ', '2017-11-13 08:53:46'),
(100, 7, 'has logged in the system at ', '2017-11-13 08:56:45'),
(101, 1, '(Administrator) has logged in the system at ', '2017-11-13 10:40:50'),
(102, 6, 'has logged in the system at ', '2017-11-13 10:42:37'),
(103, 1, '(Administrator) has logged in the system at ', '2017-11-13 10:55:02'),
(104, 6, 'has logged in the system at ', '2017-11-13 10:55:19'),
(105, 1, '(Administrator) has logged in the system at ', '2017-11-13 11:15:27'),
(106, 6, 'has logged in the system at ', '2017-11-13 11:15:38'),
(107, 1, '(Administrator) has logged in the system at ', '2017-11-13 11:31:48'),
(108, 6, 'has logged in the system at ', '2017-11-13 11:55:12'),
(109, 1, '(Administrator) has logged in the system at ', '2017-11-13 11:57:27'),
(110, 6, 'has logged in the system at ', '2017-11-13 11:59:22'),
(111, 1, '(Administrator) has logged in the system at ', '2017-11-13 12:00:16'),
(112, 6, 'has logged in the system at ', '2017-11-13 12:04:41'),
(113, 8, 'has logged in the system at ', '2017-11-13 13:05:00'),
(114, 2, '(Administrator) has logged in the system at ', '2017-11-13 13:16:17'),
(115, 2, 'added a new product 700 of Sensor', '2017-11-13 13:20:38'),
(116, 2, 'added 900 of Arduino Uno 2', '2017-11-13 13:20:57'),
(117, 6, 'has logged in the system at ', '2017-11-13 19:58:52'),
(118, 8, 'has logged in the system at ', '2017-11-13 20:00:59'),
(119, 1, '(Administrator) has logged in the system at ', '2017-11-13 20:01:58'),
(120, 1, '(Administrator) has logged in the system at ', '2017-11-13 21:47:41'),
(121, 6, 'has logged in the system at ', '2017-11-13 21:49:55'),
(122, 1, '(Administrator) has logged in the system at ', '2017-11-13 21:52:28'),
(123, 1, '(Administrator) has logged in the system at ', '2017-11-14 16:01:08'),
(124, 6, 'has logged in the system at ', '2017-11-17 01:43:42'),
(125, 6, 'has logged in the system at ', '2017-11-17 02:15:46'),
(126, 8, 'has logged in the system at ', '2017-11-21 20:19:39'),
(127, 8, 'has logged in the system at ', '2017-11-25 23:31:53'),
(128, 9, 'has logged in the system at ', '2018-10-12 19:52:39'),
(129, 9, 'has logged in the system at ', '2018-10-13 01:18:49'),
(130, 9, 'added a new product 26 of X9 THOR - Gaming Mouse', '2018-10-13 01:32:00'),
(131, 9, 'has logged in the system at ', '2018-10-13 01:50:19'),
(132, 10, 'has logged in the system at ', '2020-08-07 18:25:53'),
(133, 10, 'has logged in the system at ', '2020-08-07 18:27:15'),
(134, 10, 'has logged in the system at ', '2020-08-07 18:47:10'),
(135, 10, 'has logged in the system at ', '2020-08-07 19:01:57'),
(136, 10, 'has logged in the system at ', '2020-08-07 19:02:44'),
(137, 10, 'has logged in the system at ', '2020-08-07 21:27:38'),
(138, 10, 'has logged in the system at ', '2020-08-08 15:44:02'),
(139, 10, 'has logged in the system at ', '2020-08-08 17:22:34'),
(140, 10, 'has logged in the system at ', '2020-08-08 18:36:52'),
(141, 10, 'has logged in the system at ', '2020-08-08 22:05:44'),
(142, 10, 'has logged in the system at ', '2020-08-09 11:45:51'),
(143, 10, 'has logged in the system at ', '2020-08-10 19:04:07'),
(144, 10, 'has logged in the system at ', '2020-08-10 21:52:58'),
(145, 10, 'has logged in the system at ', '2020-08-12 18:30:13'),
(146, 10, 'has logged in the system at ', '2020-08-12 18:37:05'),
(147, 10, 'has logged in the system at ', '2020-08-12 18:42:26'),
(148, 10, 'has logged in the system at ', '2020-08-12 19:17:17'),
(149, 10, 'has logged in the system at ', '2020-12-07 18:40:05'),
(150, 10, 'has logged in the system at ', '2020-12-07 18:40:54'),
(151, 10, 'added 2 of Arduino Uno Rec3-1', '2020-12-07 18:41:53'),
(152, 10, 'added 2 of Arduino Uno Rec3-1', '2020-12-07 18:42:10'),
(153, 10, 'added 5 of X9 THOR - Gaming Mouse', '2020-12-07 18:42:19'),
(154, 10, 'has logged in the system at ', '2020-12-07 18:42:26'),
(155, 10, 'has logged in the system at ', '2020-12-07 19:16:27'),
(156, 10, 'has logged in the system at ', '2020-12-15 20:18:31'),
(157, 10, 'has logged in the system at ', '2020-12-15 20:28:39'),
(158, 10, 'has logged in the system at ', '2020-12-15 21:57:25'),
(159, 10, 'has logged in the system at ', '2020-12-16 01:24:31'),
(160, 10, 'has logged in the system at ', '2020-12-16 12:39:20'),
(161, 10, 'has logged in the system at ', '2020-12-16 12:41:56'),
(162, 10, 'has logged in the system at ', '2020-12-16 19:18:15'),
(163, 10, 'has logged in the system at ', '2020-12-16 21:30:10'),
(164, 10, 'has logged in the system at ', '2020-12-16 23:03:51'),
(165, 10, 'has logged in the system at ', '2020-12-17 00:36:08'),
(166, 10, 'has logged in the system at ', '2021-01-14 13:19:20'),
(167, 10, 'has logged in the system at ', '2021-01-18 22:07:53'),
(168, 10, 'has logged in the system at ', '2021-01-19 15:14:27'),
(169, 10, 'has logged in the system at ', '2021-01-23 14:47:57'),
(170, 10, 'has logged in the system at ', '2021-01-23 14:49:19'),
(171, 10, 'has logged in the system at ', '2021-02-03 18:44:04'),
(172, 10, 'added a new product 2 of see', '2021-02-03 18:45:05'),
(173, 10, 'has logged in the system at ', '2021-02-08 22:22:57'),
(174, 10, 'has logged in the system at ', '2021-02-08 23:01:46'),
(175, 10, 'has logged in the system at ', '2021-02-09 19:46:11'),
(176, 10, 'has logged in the system at ', '2021-03-31 23:56:02'),
(177, 10, 'has logged in the system at ', '2021-04-10 15:19:59'),
(178, 10, 'has logged in the system at ', '2021-04-14 15:38:24'),
(179, 10, 'has logged in the system at ', '2021-04-14 23:30:07'),
(180, 10, 'has logged in the system at ', '2021-04-14 23:30:29'),
(181, 11, 'has logged in the system at ', '2021-06-28 11:07:44'),
(182, 12, 'has logged in the system at ', '2021-07-12 14:28:41'),
(183, 12, 'added 10 of Arduino Uno Rec3-1', '2021-07-12 15:06:44'),
(184, 12, 'has logged in the system at ', '2021-07-12 15:07:48'),
(185, 13, 'has logged in the system at ', '2021-07-13 14:13:39'),
(186, 2, 'added a new product 10 of shantal', '2021-07-13 15:10:49'),
(187, 13, 'has logged in the system at ', '2021-07-13 15:11:52'),
(188, 13, 'has logged in the system at ', '2021-07-13 15:29:45'),
(189, 13, 'has logged in the system at ', '2021-07-13 15:57:39'),
(190, 13, 'has logged in the system at ', '2021-07-13 16:09:06'),
(191, 13, 'has logged in the system at ', '2021-07-13 16:09:56'),
(192, 2, '(Administrator) has logged in the system at ', '2021-07-13 16:14:06'),
(193, 13, 'has logged in the system at ', '2021-07-13 16:33:38'),
(194, 2, '(Administrator) has logged in the system at ', '2021-07-13 16:37:46'),
(195, 13, 'has logged in the system at ', '2021-07-13 16:46:26'),
(196, 13, 'has logged in the system at ', '2021-07-13 16:54:26'),
(197, 13, 'has logged in the system at ', '2021-07-13 17:14:23'),
(198, 13, 'has logged in the system at ', '2021-07-13 17:15:15'),
(199, 13, 'has logged in the system at ', '2021-07-13 17:17:10'),
(200, 13, 'has logged in the system at ', '2021-07-13 17:17:53'),
(201, 14, 'has logged in the system at ', '2021-07-14 14:51:19'),
(202, 2, '(Administrator) has logged in the system at ', '2021-07-15 10:26:00'),
(203, 2, 'added a new product 10 of BLUES', '2021-07-15 10:30:33'),
(204, 2, 'added a new product 8 of CUTIE', '2021-07-15 11:14:59'),
(205, 2, 'added a new product 10 of ANIKA', '2021-07-15 11:36:52'),
(206, 2, 'added a new product 15 of CLOE', '2021-07-15 11:40:00'),
(207, 13, 'has logged in the system at ', '2021-07-15 12:21:44'),
(208, 2, '(Administrator) has logged in the system at ', '2021-07-15 12:24:39'),
(209, 15, 'has logged in the system at ', '2021-07-15 12:41:06'),
(210, 16, 'has logged in the system at ', '2021-07-15 12:45:30'),
(211, 2, '(Administrator) has logged in the system at ', '2021-07-17 21:51:31'),
(212, 2, '(Administrator) has logged in the system at ', '2021-07-17 21:53:12'),
(213, 16, 'has logged in the system at ', '2021-07-17 22:26:05'),
(214, 2, '(Administrator) has logged in the system at ', '2021-07-17 22:27:02'),
(215, 16, 'has logged in the system at ', '2021-07-17 22:32:22'),
(216, 16, 'has logged in the system at ', '2021-07-17 22:37:45'),
(217, 16, 'has logged in the system at ', '2021-07-17 22:45:02'),
(218, 16, 'has logged in the system at ', '2021-07-18 22:18:29'),
(219, 16, 'has logged in the system at ', '2021-07-18 22:28:45'),
(220, 16, 'has logged in the system at ', '2021-07-18 22:33:06'),
(221, 16, 'has logged in the system at ', '2021-07-24 12:30:21'),
(222, 14, 'has logged in the system at ', '2021-07-24 14:19:11'),
(223, 14, 'has logged in the system at ', '2021-07-24 14:19:33'),
(224, 14, 'has logged in the system at ', '2021-07-24 14:19:54'),
(225, 14, 'has logged in the system at ', '2021-07-24 14:21:26'),
(226, 14, 'has logged in the system at ', '2021-07-24 14:27:21'),
(227, 16, 'has logged in the system at ', '2021-07-24 14:29:20'),
(228, 14, 'has logged in the system at ', '2021-07-24 14:30:48'),
(229, 19, 'has logged in the system at ', '2021-07-24 14:32:25'),
(230, 14, 'has logged in the system at ', '2021-07-24 14:52:21'),
(231, 19, 'has logged in the system at ', '2021-07-24 14:52:30'),
(232, 2, '(Administrator) has logged in the system at ', '2021-07-26 11:36:05'),
(233, 19, 'has logged in the system at ', '2021-07-26 11:50:53'),
(234, 20, 'has logged in the system at ', '2021-07-26 12:27:37'),
(235, 19, 'has logged in the system at ', '2021-07-26 13:10:45'),
(236, 2, '(Administrator) has logged in the system at ', '2021-07-26 14:01:51'),
(237, 21, 'has logged in the system at ', '2021-07-29 12:09:01'),
(238, 2, '(Administrator) has logged in the system at ', '2021-07-29 12:39:54'),
(239, 22, 'has logged in the system at ', '2021-08-08 14:21:54'),
(240, 2, '(Administrator) has logged in the system at ', '2021-08-08 15:24:51'),
(241, 22, 'has logged in the system at ', '2021-08-08 15:27:33'),
(242, 22, 'has logged in the system at ', '2021-08-08 15:30:48'),
(243, 23, 'has logged in the system at ', '2021-08-08 15:56:34'),
(244, 23, 'has logged in the system at ', '2021-08-08 17:36:50'),
(245, 2, '(Administrator) has logged in the system at ', '2021-08-08 18:19:55'),
(246, 23, 'has logged in the system at ', '2021-08-08 18:20:51'),
(247, 2, '(Administrator) has logged in the system at ', '2021-08-08 18:38:41'),
(248, 22, 'has logged in the system at ', '2021-08-08 18:40:46'),
(249, 23, 'has logged in the system at ', '2021-08-08 18:43:12'),
(250, 23, 'has logged in the system at ', '2021-08-08 19:21:22'),
(251, 2, '(Administrator) has logged in the system at ', '2021-08-08 19:28:20'),
(252, 2, 'added 1 of ANIKA', '2021-08-08 21:22:10'),
(253, 2, 'added 2 of SHANTAL', '2021-08-08 21:22:19'),
(254, 22, 'has logged in the system at ', '2021-08-09 20:01:40'),
(255, 2, '(Administrator) has logged in the system at ', '2021-08-09 20:26:12'),
(256, 22, 'has logged in the system at ', '2021-10-15 17:11:46'),
(257, 22, 'has logged in the system at ', '2021-10-15 17:17:16'),
(258, 2, '(Administrator) has logged in the system at ', '2021-10-15 17:20:02'),
(259, 2, '(Administrator) has logged in the system at ', '2021-10-15 17:42:06'),
(260, 2, '(Administrator) has logged in the system at ', '2021-10-15 17:42:54'),
(261, 2, '(Administrator) has logged in the system at ', '2021-10-15 17:44:02'),
(262, 2, '(Administrator) has logged in the system at ', '2021-10-15 17:45:11'),
(263, 2, '(Administrator) has logged in the system at ', '2021-10-15 19:31:53'),
(264, 2, '(Administrator) has logged in the system at ', '2021-10-15 19:33:56'),
(265, 22, 'has logged in the system at ', '2021-10-15 20:09:25'),
(266, 2, '(Administrator) has logged in the system at ', '2021-10-15 20:36:05'),
(267, 22, 'has logged in the system at ', '2021-10-15 21:01:11'),
(268, 22, 'has logged in the system at ', '2021-10-16 13:21:22'),
(269, 2, '(Administrator) has logged in the system at ', '2021-10-16 13:24:01'),
(270, 2, '(Administrator) has logged in the system at ', '2021-10-16 14:19:01'),
(271, 2, 'added ads of ANIKA', '2021-10-16 15:06:29'),
(272, 2, 'added asdasd of ANIKA', '2021-10-16 15:06:35'),
(273, 2, 'added a new product 2 of asdasd', '2021-10-16 15:36:17'),
(274, 2, 'added a new product 12 of new', '2021-10-16 15:37:09'),
(275, 2, 'added a new product 12 of New Product', '2021-10-16 15:39:58'),
(276, 2, '(Administrator) has logged in the system at ', '2021-10-16 16:14:05'),
(277, 2, '(Administrator) has logged in the system at ', '2021-10-16 16:14:35'),
(278, 22, 'has logged in the system at ', '2021-10-16 16:27:11'),
(279, 2, '(Administrator) has logged in the system at ', '2021-10-16 19:12:44'),
(280, 2, '(Administrator) has logged in the system at ', '2021-10-16 19:47:05'),
(281, 2, '(Administrator) has logged in the system at ', '2021-10-17 16:40:06'),
(282, 22, 'has logged in the system at ', '2021-10-17 17:21:08'),
(283, 2, '(Administrator) has logged in the system at ', '2021-10-17 18:21:32'),
(284, 2, 'added 2 of ANIKA', '2021-10-17 18:37:03'),
(285, 2, 'added 2 of ANIKA', '2021-10-17 18:37:24'),
(286, 2, 'added ASDADA of ANIKA', '2021-10-17 18:41:35'),
(287, 2, 'added 6 of ANIKA', '2021-10-17 18:41:53'),
(288, 2, 'added 2 of BLUES', '2021-10-17 18:43:18'),
(289, 2, 'added 3 of CLOE', '2021-10-17 18:44:12'),
(290, 2, 'added 1 of CUTIE', '2021-10-17 18:45:25'),
(291, 2, 'added a of CUTIE', '2021-10-17 18:45:41'),
(292, 2, 'added 5 of CUTIE', '2021-10-17 18:46:11'),
(293, 2, 'added 1 of CUTIE', '2021-10-17 18:48:02'),
(294, 2, 'added 1 of PAU', '2021-10-17 18:48:31'),
(295, 2, 'added 1 of PAU', '2021-10-17 18:48:41'),
(296, 2, 'added 1 of SHANTAL', '2021-10-17 18:53:11'),
(297, 2, 'added 2 of SHANTAL', '2021-10-17 19:00:20'),
(298, 22, 'has logged in the system at ', '2021-10-17 19:01:35'),
(299, 2, '(Administrator) has logged in the system at ', '2021-10-18 14:08:18'),
(300, 22, 'has logged in the system at ', '2021-10-18 14:08:59'),
(301, 22, 'added 1 of ANIKA', '2021-10-18 16:29:22'),
(302, 22, 'added a new product 2 of sadasd', '2021-10-18 16:34:27'),
(303, 2, '(Administrator) has logged in the system at ', '2021-10-18 16:50:10'),
(304, 2, '(Administrator) has logged in the system at ', '2021-10-18 17:07:13'),
(305, 2, 'added a new product 1 of asda', '2021-10-18 17:53:39'),
(306, 2, 'added a new product 1 of asdsad', '2021-10-18 17:55:08'),
(307, 2, '(Administrator) has logged in the system at ', '2021-10-18 18:34:03'),
(308, 2, '(Administrator) has logged in the system at ', '2021-10-18 19:58:19'),
(309, 3, '(Administrator) has logged in the system at ', '2021-10-18 20:24:39'),
(310, 3, '(Administrator) has logged in the system at ', '2021-10-18 20:25:16'),
(311, 3, '(Administrator) has logged in the system at ', '2021-10-18 20:25:57'),
(312, 3, '(Administrator) has logged in the system at ', '2021-10-18 20:27:23'),
(313, 22, 'has logged in the system at ', '2021-10-18 20:30:09'),
(314, 3, '(Administrator) has logged in the system at ', '2021-10-19 15:26:41'),
(315, 22, 'has logged in the system at ', '2021-10-19 15:27:33'),
(316, 22, 'has logged in the system at ', '2021-10-20 16:17:14'),
(317, 22, 'has logged in the system at ', '2021-10-20 18:28:09'),
(318, 22, 'has logged in the system at ', '2021-10-20 18:32:07'),
(319, 3, '(Administrator) has logged in the system at ', '2021-10-20 18:40:27'),
(320, 22, 'has logged in the system at ', '2021-10-20 19:45:52'),
(321, 22, 'has logged in the system at ', '2021-10-20 21:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `msg_id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `order_id` text NOT NULL,
  `sender_name` text NOT NULL,
  `date_sent` datetime NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `order_status` text NOT NULL,
  `user_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `track_num` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `shipping_add` varchar(500) NOT NULL,
  `order_date` datetime NOT NULL,
  `date_delivered` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `totalprice` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `total_qty` varchar(30) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `or_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_desc` varchar(500) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_cost` decimal(10,2) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `category` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `prod_serial` varchar(50) NOT NULL,
  `prod_pic1` varchar(500) NOT NULL,
  `prod_pic2` varchar(500) NOT NULL,
  `prod_pic3` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_desc`, `prod_qty`, `prod_cost`, `prod_price`, `category`, `supplier`, `prod_serial`, `prod_pic1`, `prod_pic2`, `prod_pic3`) VALUES
(19, 'SHANTAL', 'teen', 10, '500.00', '500.00', 'CLASSY BAYONG', 'BayongBags Inc.', '1234', 'bayong1.jpeg', 'bayong1.jpeg', 'bayong1.jpeg'),
(20, 'BLUES', 'Small ', 9, '599.00', '500.00', 'CLASSY BAYONG', 'BayongBags Inc.', '678568', '11.jpeg', '11.jpeg', '11.jpeg'),
(21, 'CUTIE', 'Small ', 10, '799.00', '750.00', 'CLASSY BAYONG', 'BayongBags Inc.', '2345', '1.jpeg', '1.jpeg', '1.jpeg'),
(23, 'PAU', 'Meduim', 10, '899.00', '800.00', 'PRINTED''S BAYONG', 'BayongBags Inc.', '4567', '4.jpeg', '1.jpeg', '4.jpeg'),
(24, 'ANIKA', 'Medium', 9, '800.00', '750.00', 'CLASSY BAYONG', 'BayongBags Inc.', '12345', '9.jpeg', '9.jpeg', '9.jpeg'),
(25, 'CLOE', 'Small ', 10, '567.00', '550.00', 'NATIVE BAYONG', 'BayongBags Inc.', '5678', '12.jpeg', '12.jpeg', '12.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` decimal(10,2) NOT NULL,
  `date_added` datetime NOT NULL,
  `mode_of_payment` varchar(100) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `sales_details_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supp_id` int(11) NOT NULL,
  `supp_name` varchar(100) NOT NULL,
  `supp_address` varchar(200) NOT NULL,
  `supp_contact` varchar(50) NOT NULL,
  `supp_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supp_id`, `supp_name`, `supp_address`, `supp_contact`, `supp_email`) VALUES
(1, 'BayongBags Inc.', 'Loon', '09098976982', 'bayongbags@email.moto!');

-- --------------------------------------------------------

--
-- Table structure for table `temp_trans`
--

CREATE TABLE `temp_trans` (
  `temp_trans_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` int(11) NOT NULL,
  `or_no` int(11) NOT NULL,
  `prod_serial` varchar(50) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `trans_qty` int(11) NOT NULL,
  `ppi` decimal(10,0) NOT NULL,
  `cust_fullname` varchar(100) NOT NULL,
  `transdate` datetime NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(300) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `middlename`, `lastname`, `address`, `email`, `contact`, `username`, `password`) VALUES
(12, 'christine', 'none', 'cabanilla', 'abucayan norte, calape, bohol', 'tin@gmail.com', '09265177050', 'tintin@gmail.com', 'a1Bz20ydqelm8m1wql91ec1f9324753048c0096d036a694f86'),
(13, 'Layca', 'C.', 'Sequina', 'Loon Bohol', 'layca@gmail.com', '09098976982', 'layca@gmail.com', 'a1Bz20ydqelm8m1wql5445f9478702acdbec0b4ca7dda3e195'),
(14, 'layca', 'none', 'Sequina', 'TONTONAN', 'sdfdfgfhf@gmail.com', '09265177050', 'tintin', 'a1Bz20ydqelm8m1wql91ec1f9324753048c0096d036a694f86'),
(15, 'Layca', 'C.', 'Canonoe', 'Cabilao Loon Bohol', 'laycacanonoe@gmail.com', '09090981826', 'layc', 'a1Bz20ydqelm8m1wqla3b2c726329c849d0a12395ae3e1a843'),
(16, 'ako', 'cya', 'kami', 'loon', 'ako@gmail.com', '098765', 'ako', 'a1Bz20ydqelm8m1wql1cd13479e5609d79971c69051158a27f'),
(17, 'christine', 'none', 'cabanilla', 'abn', 'tin@gmail.com', '09265177050', 'tintin', 'a1Bz20ydqelm8m1wql91ec1f9324753048c0096d036a694f86'),
(18, 'christine', 'none', 'cabanilla', 'abn', 'tintin@gmail.com', '09265177050', 'tintin', 'a1Bz20ydqelm8m1wql91ec1f9324753048c0096d036a694f86'),
(19, 'bebe', 'bebe', 'bebe', 'gfdhfj', 'bebe@gmail.com', '98765', 'bebe', 'a1Bz20ydqelm8m1wql1364cba01e0ee80ef4381175bd6cf0d3'),
(20, 'A', 'A', 'A', 'DFDF', 'FDFHGFGH@GMAIL.COM', '3453454', 'A', 'a1Bz20ydqelm8m1wql7fc56270e7a70fa81a5935b72eacbe29'),
(21, 'Marichan', 'C', 'Hurano', 'camias', 'tantan@gmail.com', '0987765433', 'tantan', 'a1Bz20ydqelm8m1wql91ec1f9324753048c0096d036a694f86'),
(23, 'asdasd', 'asdasd', 'asdasd', 'asdasdad', 'sdaasds@gmail.com', 'asdasdas', '123', 'a1Bz20ydqelm8m1wql202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sales_details_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supp_id`);

--
-- Indexes for table `temp_trans`
--
ALTER TABLE `temp_trans`
  ADD PRIMARY KEY (`temp_trans_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;
--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sales_details_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `temp_trans`
--
ALTER TABLE `temp_trans`
  MODIFY `temp_trans_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
