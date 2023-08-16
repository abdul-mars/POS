-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 11:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_category` varchar(50) DEFAULT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL,
  `date_stock_update` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_desc`, `product_img`, `product_category`, `cost_price`, `stock`, `date_added`, `added_by`, `date_stock_update`, `updated_by`) VALUES
(24, 'School Bag', 45.00, 'Small School Bag', '1690318397_64c0363dc5f68.png', NULL, 1500.00, 23, '2023-07-25 20:53:17', 1, '2023-07-25 22:53:17', 1),
(25, 'School Bag 2', 34.00, 'Big School Bag', '1690318531_64c036c339d58.jpg', NULL, 2000.00, 8, '2023-07-25 20:55:31', 1, '2023-07-25 22:55:31', 1),
(26, 'School Bag 3', 50.00, '', '1690318573_64c036ed72f43.jpg', NULL, 1700.00, 4, '2023-07-25 20:56:13', 1, '2023-07-25 22:56:13', 1),
(27, 'Exercise Book', 5.00, 'Exercise Book Or Note 1', '1690318656_64c0374086e82.jpg', NULL, 0.00, 0, '2023-07-25 20:57:36', 1, '2023-07-25 22:57:36', 1),
(28, 'Note 3', 20.00, '', '1690318849_64c038014ebfb.png', NULL, 0.00, 19, '2023-07-25 21:00:49', 15, '2023-07-25 23:00:49', 15),
(29, 'Ball Ben', 3.00, '', '1690318952_64c03868d5fb1.png', NULL, 0.00, 136, '2023-07-25 21:02:32', 15, '2023-07-25 23:02:32', 15),
(30, 'Scissors', 17.00, '', '1690319155_64c03933c7b2d.jpg', NULL, 90.00, 36, '2023-07-25 21:05:55', 1, '2023-07-25 23:05:55', 1),
(31, 'Jotter', 20.00, '', '1690319189_64c039554cc54.jpg', NULL, 800.00, 157, '2023-07-25 21:06:29', 1, '2023-07-25 23:06:29', 1),
(33, 'Scientific Calculator 2', 40.00, '', '1690319310_64c039ce345c1.png', NULL, 0.00, 0, '2023-07-25 21:08:30', 1, '2023-07-25 23:08:30', 1),
(34, 'Scientific Calculator 3', 50.00, '', '1690319340_64c039ecca18d.png', NULL, 0.00, 0, '2023-07-25 21:09:00', 1, '2023-07-25 23:09:00', 1),
(35, 'Pen', 12.00, '', '1690319446_64c03a56cc108.png', NULL, 34.00, 18, '2023-07-25 21:10:46', 1, '2023-07-25 23:10:46', 1),
(36, 'Tape Measure', 26.00, '', '1690319475_64c03a7361582.jpg', NULL, 2600.00, 43, '2023-07-25 21:11:15', 1, '2023-07-25 23:11:15', 1),
(37, 'Cutter Knive', 17.00, '', '1690319504_64c03a907b8c4.png', NULL, 900.00, 29, '2023-07-25 21:11:44', 1, '2023-07-25 23:11:44', 1),
(38, 'Cutter Knife', 12.00, '', '1691336655_64cfbfcf61db7.jpg', NULL, 50.00, 27, '2023-08-06 15:44:15', 1, '2023-08-06 17:44:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `sales_invoice_no` int(11) NOT NULL,
  `quantity_sold` int(11) NOT NULL,
  `date_sold` datetime DEFAULT current_timestamp(),
  `sold_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `product_id`, `product_price`, `sales_invoice_no`, `quantity_sold`, `date_sold`, `sold_by`) VALUES
(1, 31, 18.00, 10001, 2, '2023-07-25 21:13:38', 13),
(2, 33, 27.00, 10001, 1, '2023-07-25 21:13:38', 13),
(3, 26, 50.00, 10001, 1, '2023-07-25 21:13:38', 13),
(4, 29, 3.00, 10001, 2, '2023-07-25 21:13:38', 13),
(5, 37, 15.00, 10002, 2, '2023-07-25 21:15:50', 13),
(6, 36, 26.00, 10002, 4, '2023-07-25 21:15:50', 13),
(7, 35, 12.00, 10002, 2, '2023-07-25 21:15:50', 13),
(8, 30, 17.00, 10003, 2, '2023-07-25 21:23:36', 11),
(9, 26, 50.00, 10003, 2, '2023-07-25 21:23:36', 11),
(10, 29, 3.00, 10003, 5, '2023-07-25 21:23:36', 11),
(11, 36, 26.00, 10003, 2, '2023-07-25 21:23:36', 11),
(12, 35, 12.00, 10003, 1, '2023-07-25 21:23:36', 11),
(13, 34, 30.00, 10003, 3, '2023-07-25 21:23:36', 11),
(14, 29, 3.00, 10004, 2, '2023-07-28 21:30:52', 1),
(15, 35, 12.00, 10004, 4, '2023-07-28 21:30:52', 1),
(16, 30, 17.00, 10004, 2, '2023-07-28 21:30:52', 1),
(17, 34, 30.00, 10004, 2, '2023-07-28 21:30:52', 1),
(18, 28, 20.00, 10005, 3, '2023-07-29 09:38:55', 13),
(19, 29, 3.00, 10005, 6, '2023-07-29 09:38:55', 13),
(20, 31, 18.00, 10005, 2, '2023-07-29 09:38:55', 13),
(21, 37, 15.00, 10005, 3, '2023-07-29 09:38:55', 13),
(22, 34, 30.00, 10005, 2, '2023-07-29 09:38:55', 13),
(23, 37, 15.00, 10006, 2, '2023-07-31 20:35:49', 15),
(24, 35, 12.00, 10006, 2, '2023-07-31 20:35:49', 15),
(25, 24, 45.00, 10006, 2, '2023-07-31 20:35:49', 15),
(26, 25, 55.00, 10006, 2, '2023-07-31 20:35:49', 15),
(27, 26, 50.00, 10006, 2, '2023-07-31 20:35:49', 15),
(28, 27, 5.00, 10006, 2, '2023-07-31 20:35:49', 15),
(29, 28, 20.00, 10006, 3, '2023-07-31 20:35:49', 15),
(30, 29, 3.00, 10006, 3, '2023-07-31 20:35:49', 15),
(31, 31, 18.00, 10006, 2, '2023-07-31 20:35:49', 15),
(32, 30, 17.00, 10006, 2, '2023-07-31 20:35:49', 15),
(33, 31, 18.00, 10007, 2, '2023-07-31 20:40:18', 15),
(34, 30, 17.00, 10008, 1, '2023-07-31 20:40:50', 15),
(35, 31, 18.00, 10008, 1, '2023-07-31 20:40:50', 15),
(36, 29, 3.00, 10008, 1, '2023-07-31 20:40:50', 15),
(37, 28, 20.00, 10009, 1, '2023-07-31 20:41:50', 15),
(38, 27, 5.00, 10009, 1, '2023-07-31 20:41:50', 15),
(39, 26, 50.00, 10009, 2, '2023-07-31 20:41:50', 15),
(40, 37, 15.00, 10010, 1, '2023-07-31 20:42:01', 15),
(41, 36, 26.00, 10010, 1, '2023-07-31 20:42:01', 15),
(42, 35, 12.00, 10010, 1, '2023-07-31 20:42:01', 15),
(43, 28, 20.00, 10011, 1, '2023-07-31 20:42:34', 15),
(44, 27, 5.00, 10011, 2, '2023-07-31 20:42:34', 15),
(45, 31, 18.00, 10012, 2, '2023-07-31 20:43:08', 16),
(46, 29, 3.00, 10012, 3, '2023-07-31 20:43:08', 16),
(47, 28, 20.00, 10013, 1, '2023-07-31 20:43:50', 16),
(48, 27, 5.00, 10013, 2, '2023-07-31 20:43:50', 16),
(49, 25, 55.00, 10014, 2, '2023-07-31 20:44:48', 15),
(50, 26, 50.00, 10014, 2, '2023-07-31 20:44:48', 15),
(51, 29, 3.00, 10015, 2, '2023-07-31 20:54:03', 15),
(52, 27, 5.00, 10015, 3, '2023-07-31 20:54:03', 15),
(53, 37, 15.00, 10015, 2, '2023-07-31 20:54:03', 15),
(54, 36, 26.00, 10015, 2, '2023-07-31 20:54:03', 15),
(55, 25, 55.00, 10015, 2, '2023-07-31 20:54:03', 15),
(56, 37, 15.00, 10016, 2, '2023-07-31 20:55:18', 16),
(57, 36, 26.00, 10016, 2, '2023-07-31 20:55:18', 16),
(58, 35, 12.00, 10016, 2, '2023-07-31 20:55:18', 16),
(59, 37, 15.00, 10017, 1, '2023-07-31 20:57:20', 15),
(60, 36, 26.00, 10017, 1, '2023-07-31 20:57:20', 15),
(61, 35, 12.00, 10017, 1, '2023-07-31 20:57:20', 15),
(62, 37, 15.00, 10018, 2, '2023-07-31 20:58:02', 15),
(63, 25, 55.00, 10018, 2, '2023-07-31 20:58:02', 15),
(64, 26, 50.00, 10019, 2, '2023-07-31 21:00:00', 16),
(65, 25, 55.00, 10019, 3, '2023-07-31 21:00:00', 16),
(66, 29, 3.00, 10019, 3, '2023-07-31 21:00:00', 16),
(67, 25, 55.00, 10020, 2, '2023-07-31 21:00:46', 15),
(68, 24, 45.00, 10020, 2, '2023-07-31 21:00:46', 15),
(69, 36, 26.00, 10020, 2, '2023-07-31 21:00:46', 15),
(70, 31, 18.00, 10020, 2, '2023-07-31 21:00:46', 15),
(71, 26, 50.00, 10021, 1, '2023-07-31 21:01:03', 16),
(72, 25, 55.00, 10021, 2, '2023-07-31 21:01:03', 16),
(73, 29, 3.00, 10021, 2, '2023-07-31 21:01:03', 16),
(74, 30, 17.00, 10021, 2, '2023-07-31 21:01:03', 16),
(75, 26, 50.00, 10022, 1, '2023-07-31 21:03:52', 16),
(76, 25, 55.00, 10022, 2, '2023-07-31 21:03:52', 16),
(77, 27, 5.00, 10022, 1, '2023-07-31 21:03:52', 16),
(78, 29, 3.00, 10023, 1, '2023-07-31 21:04:06', 16),
(79, 28, 20.00, 10023, 1, '2023-07-31 21:04:06', 16),
(80, 27, 5.00, 10023, 1, '2023-07-31 21:04:06', 16),
(81, 37, 15.00, 10024, 2, '2023-07-31 21:05:45', 16),
(82, 36, 26.00, 10024, 2, '2023-07-31 21:05:45', 16),
(83, 35, 12.00, 10024, 1, '2023-07-31 21:05:45', 16),
(84, 28, 20.00, 10025, 2, '2023-07-31 21:06:34', 15),
(85, 27, 5.00, 10025, 2, '2023-07-31 21:06:34', 15),
(86, 26, 50.00, 10025, 2, '2023-07-31 21:06:34', 15),
(87, 26, 50.00, 10026, 1, '2023-07-31 21:07:09', 15),
(88, 25, 55.00, 10026, 1, '2023-07-31 21:07:09', 15),
(89, 28, 20.00, 10026, 1, '2023-07-31 21:07:09', 15),
(90, 26, 50.00, 10027, 3, '2023-07-31 21:07:33', 16),
(91, 25, 55.00, 10027, 2, '2023-07-31 21:07:33', 16),
(92, 36, 26.00, 10027, 2, '2023-07-31 21:07:33', 16),
(93, 28, 20.00, 10028, 3, '2023-07-31 21:08:32', 15),
(94, 27, 5.00, 10028, 2, '2023-07-31 21:08:32', 15),
(95, 26, 50.00, 10028, 2, '2023-07-31 21:08:32', 15),
(96, 29, 3.00, 10029, 2, '2023-07-31 21:08:44', 15),
(97, 28, 20.00, 10029, 2, '2023-07-31 21:08:44', 15),
(98, 27, 5.00, 10029, 2, '2023-07-31 21:08:44', 15),
(99, 24, 45.00, 10030, 2, '2023-07-31 21:10:14', 16),
(100, 25, 55.00, 10030, 2, '2023-07-31 21:10:14', 16),
(101, 26, 50.00, 10030, 2, '2023-07-31 21:10:14', 16),
(102, 27, 5.00, 10030, 2, '2023-07-31 21:10:14', 16),
(103, 26, 50.00, 10031, 2, '2023-07-31 21:15:01', 15),
(104, 27, 5.00, 10031, 2, '2023-07-31 21:15:01', 15),
(105, 25, 55.00, 10031, 2, '2023-07-31 21:15:01', 15),
(106, 36, 26.00, 10032, 2, '2023-07-31 21:15:30', 16),
(107, 35, 12.00, 10032, 4, '2023-07-31 21:15:30', 16),
(108, 31, 18.00, 10032, 2, '2023-07-31 21:15:30', 16),
(109, 28, 20.00, 10033, 2, '2023-07-31 21:15:53', 16),
(110, 27, 5.00, 10033, 2, '2023-07-31 21:15:53', 16),
(111, 31, 18.00, 10034, 2, '2023-07-31 21:16:58', 16),
(112, 30, 17.00, 10034, 2, '2023-07-31 21:16:58', 16),
(113, 24, 45.00, 10034, 2, '2023-07-31 21:16:58', 16),
(114, 26, 50.00, 10035, 2, '2023-07-31 21:17:16', 16),
(115, 25, 55.00, 10035, 2, '2023-07-31 21:17:16', 16),
(116, 36, 26.00, 10035, 2, '2023-07-31 21:17:16', 16),
(117, 28, 20.00, 10035, 2, '2023-07-31 21:17:16', 16),
(118, 25, 55.00, 10036, 3, '2023-07-31 21:18:01', 16),
(119, 36, 26.00, 10036, 2, '2023-07-31 21:18:01', 16),
(120, 24, 45.00, 10036, 2, '2023-07-31 21:18:01', 16),
(121, 26, 50.00, 10037, 2, '2023-07-31 21:20:06', 16),
(122, 27, 5.00, 10037, 2, '2023-07-31 21:20:06', 16),
(123, 31, 18.00, 10037, 2, '2023-07-31 21:20:06', 16),
(125, 30, 17.00, 10038, 1, '2023-08-01 19:02:18', 15),
(126, 37, 15.00, 10038, 2, '2023-08-01 19:02:18', 15),
(127, 36, 26.00, 10038, 2, '2023-08-01 19:02:18', 15),
(128, 26, 50.00, 10038, 1, '2023-08-01 19:02:18', 15),
(129, 37, 15.00, 10039, 1, '2023-08-01 19:02:47', 16),
(130, 36, 26.00, 10039, 3, '2023-08-01 19:02:47', 16),
(131, 35, 12.00, 10039, 2, '2023-08-01 19:02:47', 16),
(132, 38, 12.00, 10040, 3, '2023-08-06 20:54:49', 11),
(133, 37, 17.00, 10040, 2, '2023-08-06 20:54:49', 11),
(134, 26, 50.00, 10040, 1, '2023-08-06 20:54:49', 11),
(135, 31, 20.00, 10041, 1, '2023-08-06 21:26:38', 11),
(136, 30, 17.00, 10041, 1, '2023-08-06 21:26:38', 11),
(137, 29, 3.00, 10041, 2, '2023-08-06 21:26:38', 11),
(138, 25, 34.00, 10042, 2, '2023-08-06 21:27:01', 16),
(139, 26, 50.00, 10042, 1, '2023-08-06 21:27:01', 16),
(140, 27, 5.00, 10042, 2, '2023-08-06 21:27:01', 16),
(141, 38, 12.00, 10043, 1, '2023-08-06 21:36:50', 11),
(142, 37, 17.00, 10043, 1, '2023-08-06 21:36:50', 11),
(143, 36, 26.00, 10043, 1, '2023-08-06 21:36:50', 11),
(144, 38, 12.00, 10044, 2, '2023-08-06 21:37:51', 11),
(145, 37, 17.00, 10044, 2, '2023-08-06 21:37:51', 11),
(146, 31, 20.00, 10045, 2, '2023-08-06 21:38:30', 11),
(147, 30, 17.00, 10045, 2, '2023-08-06 21:38:30', 11),
(148, 30, 17.00, 10046, 2, '2023-08-06 21:40:44', 11),
(149, 29, 3.00, 10046, 2, '2023-08-06 21:40:44', 11),
(150, 31, 20.00, 10046, 2, '2023-08-06 21:40:44', 11),
(151, 27, 5.00, 10047, 3, '2023-08-06 21:41:51', 11),
(152, 26, 50.00, 10047, 2, '2023-08-06 21:41:51', 11),
(153, 37, 17.00, 10047, 2, '2023-08-06 21:41:51', 11),
(154, 37, 17.00, 10048, 3, '2023-08-06 21:42:34', 11),
(155, 36, 26.00, 10048, 2, '2023-08-06 21:42:34', 11),
(156, 35, 12.00, 10048, 2, '2023-08-06 21:42:34', 11),
(157, 30, 17.00, 10049, 2, '2023-08-06 21:43:23', 11),
(158, 31, 20.00, 10049, 3, '2023-08-06 21:43:23', 11),
(159, 27, 5.00, 10049, 2, '2023-08-06 21:43:23', 11),
(160, 24, 45.00, 10050, 2, '2023-08-06 21:44:05', 11),
(161, 35, 12.00, 10050, 1, '2023-08-06 21:44:05', 11),
(162, 36, 26.00, 10051, 2, '2023-08-06 21:45:15', 16),
(163, 25, 34.00, 10051, 2, '2023-08-06 21:45:15', 16),
(164, 31, 20.00, 10051, 3, '2023-08-06 21:45:15', 16),
(165, 30, 17.00, 10051, 2, '2023-08-06 21:45:15', 16),
(166, 29, 3.00, 10051, 1, '2023-08-06 21:45:15', 16),
(167, 28, 20.00, 10051, 1, '2023-08-06 21:45:15', 16),
(168, 27, 5.00, 10051, 4, '2023-08-06 21:45:15', 16),
(169, 24, 45.00, 10052, 1, '2023-08-06 21:50:01', 16),
(170, 29, 3.00, 10052, 2, '2023-08-06 21:50:01', 16),
(171, 30, 17.00, 10052, 2, '2023-08-06 21:50:01', 16),
(172, 31, 20.00, 10052, 1, '2023-08-06 21:50:01', 16),
(173, 26, 50.00, 10053, 2, '2023-08-06 21:50:29', 16),
(174, 36, 26.00, 10053, 1, '2023-08-06 21:50:29', 16),
(175, 38, 12.00, 10053, 1, '2023-08-06 21:50:29', 16),
(176, 30, 17.00, 10053, 1, '2023-08-06 21:50:29', 16),
(177, 37, 17.00, 10054, 2, '2023-08-06 21:51:09', 16),
(178, 26, 50.00, 10054, 2, '2023-08-06 21:51:09', 16),
(179, 25, 34.00, 10054, 2, '2023-08-06 21:51:09', 16),
(180, 24, 45.00, 10055, 1, '2023-08-06 21:52:06', 16),
(181, 25, 34.00, 10055, 1, '2023-08-06 21:52:06', 16),
(182, 26, 50.00, 10055, 1, '2023-08-06 21:52:06', 16),
(183, 37, 17.00, 10055, 1, '2023-08-06 21:52:06', 16),
(184, 37, 17.00, 10056, 1, '2023-08-06 21:52:28', 16),
(185, 26, 50.00, 10056, 1, '2023-08-06 21:52:28', 16),
(186, 25, 34.00, 10056, 1, '2023-08-06 21:52:28', 16),
(187, 29, 3.00, 10057, 1, '2023-08-06 21:53:05', 16),
(188, 27, 5.00, 10057, 1, '2023-08-06 21:53:05', 16),
(189, 26, 50.00, 10057, 2, '2023-08-06 21:53:05', 16),
(190, 36, 26.00, 10057, 1, '2023-08-06 21:53:05', 16),
(191, 31, 20.00, 10058, 1, '2023-08-06 21:57:53', 16),
(192, 31, 20.00, 10059, 1, '2023-08-07 21:38:58', 1),
(193, 30, 17.00, 10059, 3, '2023-08-07 21:38:58', 1),
(194, 29, 3.00, 10059, 1, '2023-08-07 21:38:58', 1),
(195, 26, 50.00, 10060, 2, '2023-08-07 21:49:00', 1),
(196, 26, 50.00, 10061, 2, '2023-08-07 21:52:03', 1),
(197, 38, 12.00, 10062, 1, '2023-08-07 22:27:31', 11),
(198, 37, 17.00, 10062, 1, '2023-08-07 22:27:31', 11),
(199, 36, 26.00, 10063, 2, '2023-08-07 22:29:41', 11),
(200, 25, 34.00, 10063, 2, '2023-08-07 22:29:41', 11),
(201, 38, 12.00, 10064, 2, '2023-08-07 22:34:00', 11),
(202, 29, 3.00, 10065, 1, '2023-08-07 22:35:15', 11),
(203, 38, 12.00, 10066, 1, '2023-08-07 22:38:04', 16),
(204, 31, 20.00, 10067, 1, '2023-08-07 22:38:21', 16),
(205, 27, 5.00, 10068, 2, '2023-08-08 02:41:07', 11),
(206, 27, 5.00, 10069, 1, '2023-08-08 17:51:53', 16),
(207, 28, 20.00, 10069, 2, '2023-08-08 17:51:53', 16),
(208, 30, 17.00, 10070, 1, '2023-08-08 17:52:46', 16),
(209, 27, 5.00, 10071, 1, '2023-08-08 17:53:10', 16),
(210, 31, 20.00, 10072, 1, '2023-08-08 17:53:28', 16),
(211, 35, 12.00, 10073, 2, '2023-08-08 17:54:28', 16),
(212, 31, 20.00, 10074, 1, '2023-08-08 17:54:51', 16),
(213, 38, 12.00, 10075, 2, '2023-08-08 18:21:51', 11),
(214, 28, 20.00, 10076, 1, '2023-08-09 18:04:14', 1),
(215, 29, 3.00, 10076, 1, '2023-08-09 18:04:14', 1),
(216, 38, 12.00, 10077, 3, '2023-08-12 13:33:00', 1),
(217, 31, 20.00, 10077, 3, '2023-08-12 13:33:00', 1),
(218, 27, 5.00, 10077, 7, '2023-08-12 13:33:00', 1),
(219, 38, 12.00, 10078, 2, '2023-08-12 13:33:22', 1),
(220, 37, 17.00, 10078, 1, '2023-08-12 13:33:22', 1),
(221, 30, 17.00, 10079, 1, '2023-08-12 13:33:33', 1),
(222, 31, 20.00, 10079, 1, '2023-08-12 13:33:33', 1),
(223, 38, 12.00, 10080, 1, '2023-08-12 13:34:49', 11),
(224, 37, 17.00, 10080, 1, '2023-08-12 13:34:49', 11),
(225, 31, 20.00, 10081, 1, '2023-08-12 13:34:57', 11),
(226, 30, 17.00, 10082, 1, '2023-08-14 00:54:03', 27),
(227, 31, 20.00, 10082, 1, '2023-08-14 00:54:03', 27),
(228, 38, 12.00, 10082, 1, '2023-08-14 00:54:03', 27),
(229, 26, 50.00, 10083, 2, '2023-08-14 00:54:13', 27),
(230, 28, 20.00, 10083, 2, '2023-08-14 00:54:13', 27),
(231, 30, 17.00, 10084, 1, '2023-08-14 20:32:10', 1),
(232, 30, 17.00, 10085, 1, '2023-08-14 20:32:17', 1),
(233, 30, 17.00, 10086, 1, '2023-08-14 20:32:37', 11),
(234, 35, 12.00, 10087, 1, '2023-08-14 20:32:44', 11),
(235, 38, 12.00, 10088, 2, '2023-08-14 20:33:39', 11),
(236, 37, 17.00, 10088, 1, '2023-08-14 20:33:39', 11),
(237, 29, 3.00, 10088, 1, '2023-08-14 20:33:39', 11),
(238, 28, 20.00, 10088, 1, '2023-08-14 20:33:39', 11),
(239, 35, 12.00, 10089, 1, '2023-08-14 20:36:50', 11),
(240, 28, 20.00, 10089, 2, '2023-08-14 20:36:50', 11),
(241, 37, 17.00, 10090, 2, '2023-08-14 20:38:10', 11),
(242, 36, 26.00, 10090, 1, '2023-08-14 20:38:10', 11),
(243, 26, 50.00, 10091, 1, '2023-08-14 20:38:47', 11),
(244, 25, 34.00, 10091, 1, '2023-08-14 20:38:47', 11),
(245, 26, 50.00, 10092, 1, '2023-08-15 02:27:15', 1),
(246, 25, 34.00, 10092, 1, '2023-08-15 02:27:15', 1),
(247, 36, 26.00, 10093, 4, '2023-08-16 07:29:54', 1),
(248, 24, 45.00, 10093, 2, '2023-08-16 07:29:54', 1),
(249, 31, 20.00, 10093, 1, '2023-08-16 07:29:54', 1),
(250, 38, 12.00, 10093, 1, '2023-08-16 07:29:54', 1),
(251, 37, 17.00, 10093, 1, '2023-08-16 07:29:54', 1),
(252, 24, 45.00, 10094, 1, '2023-08-16 08:38:40', 1),
(253, 25, 34.00, 10094, 1, '2023-08-16 08:38:40', 1),
(254, 30, 17.00, 10095, 1, '2023-08-16 08:38:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_surname` varchar(20) NOT NULL,
  `user_forenames` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `user_role` varchar(5) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime DEFAULT NULL,
  `login_session` varchar(255) DEFAULT NULL,
  `password_reset` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_surname`, `user_forenames`, `username`, `user_password`, `user_phone`, `user_role`, `date_added`, `last_login`, `login_session`, `password_reset`) VALUES
(1, 'Mustapha', 'Rashid', 'mustapha.rashid', '$2y$10$RKUo9NkXZOLtK9GULaJ8zuKN3f4EetOiAOHeFqiPpqvAMdV4i1pOK', '1234567890', 'admin', '2023-07-11', '2023-08-15 03:44:48', 'vsvgeceu6glsm65aghv7344l4v', 0),
(11, 'Mohammed', 'Adam', 'mohammed.adam', '$2y$10$pOKp9zoK/9rGel5hUeG8we8.OY15UAXIjSqyT6ENkFoMpUT6C4IWu', '6789012345', 'user', '2023-07-25', '2023-08-14 10:32:34', 'ouu8gf5atrhtbiue3j2u9q3jlc', 0),
(13, 'Razika', 'Adam', 'razika.adam', '$2y$10$1r9zzm8OTW8u0XDPs6Cb..LhwCzMw8yhUZeoc6v3dl04hX.ZvupJa', '2147483647', 'user', '2023-07-25', '2023-07-31 10:33:08', NULL, 0),
(15, 'Admin', 'User', 'admin.user', '$2y$10$hHWrggehMf4wFlwDY6yUq.Aza5rmHzR0kWnvf5Q4Nepki2yMGU3oW', '123456789', 'admin', '2023-07-25', '2023-07-31 10:34:08', NULL, 0),
(16, 'Issah', 'Issah', 'issah.issah', '$2y$10$4g7WtGpt4PNhrk/Aud5RVOPtlhYpqD8CdBEJvlOV7kqR6CgVsF61q', '2345678901', 'admin', '2023-07-30', '2023-08-14 03:06:39', 't3sm1dso0p95vh7ftj3vn4krgi', 0),
(27, 'Test', 'Testing', 'test.testing', '$2y$10$8Sd.8c0i3bOgguL5V/miIOr4UmhbmdoSRL8BAGvYVp4tf1AdGUHcC', '12345769', 'user', '2023-08-14', '2023-08-14 02:53:22', 'fdlnt77ppqqa9qeqmpq5uae64j', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `sold_by` (`sold_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`sold_by`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
