-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 11:26 PM
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
(24, 'School Bag', 45.00, 'Small School Bag', '1690318397_64c0363dc5f68.png', NULL, 1500.00, 40, '2023-07-25 20:53:17', 1, '2023-07-25 22:53:17', 1),
(25, 'School Bag 2', 55.00, 'Big School Bag', '1690318531_64c036c339d58.jpg', NULL, 2000.00, 50, '2023-07-25 20:55:31', 1, '2023-07-25 22:55:31', 1),
(26, 'School Bag 3', 50.00, '', '1690318573_64c036ed72f43.jpg', NULL, 1700.00, 42, '2023-07-25 20:56:13', 1, '2023-07-25 22:56:13', 1),
(27, 'Exercise Book', 5.00, 'Exercise Book Or Note 1', '1690318656_64c0374086e82.jpg', NULL, 50.00, 100, '2023-07-25 20:57:36', 1, '2023-07-25 22:57:36', 1),
(28, 'Note 3', 15.00, '', '1690318849_64c038014ebfb.png', NULL, 900.00, 0, '2023-07-25 21:00:49', 15, '2023-07-25 23:00:49', 15),
(29, 'Ball Ben', 3.00, '', '1690318952_64c03868d5fb1.png', NULL, 60.00, 93, '2023-07-25 21:02:32', 15, '2023-07-25 23:02:32', 15),
(30, 'Scissors', 17.00, '', '1690319155_64c03933c7b2d.jpg', NULL, 90.00, 68, '2023-07-25 21:05:55', 1, '2023-07-25 23:05:55', 1),
(31, 'Jotter', 18.00, '', '1690319189_64c039554cc54.jpg', NULL, 800.00, 198, '2023-07-25 21:06:29', 1, '2023-07-25 23:06:29', 1),
(33, 'Scientific Calculator 2', 27.00, '', '1690319310_64c039ce345c1.png', NULL, 850.00, 59, '2023-07-25 21:08:30', 1, '2023-07-25 23:08:30', 1),
(34, 'Scientific Calculator 3', 30.00, '', '1690319340_64c039ecca18d.png', NULL, 780.00, 4, '2023-07-25 21:09:00', 1, '2023-07-25 23:09:00', 1),
(35, 'Pen', 12.00, '', '1690319446_64c03a56cc108.png', NULL, 34.00, 42, '2023-07-25 21:10:46', 1, '2023-07-25 23:10:46', 1),
(36, 'Tape Measure', 26.00, '', '1690319475_64c03a7361582.jpg', NULL, 2600.00, 54, '2023-07-25 21:11:15', 1, '2023-07-25 23:11:15', 1),
(37, 'Cutter Knive', 15.00, '', '1690319504_64c03a907b8c4.png', NULL, 900.00, 68, '2023-07-25 21:11:44', 1, '2023-07-25 23:11:44', 1);

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
(13, 34, 30.00, 10003, 3, '2023-07-25 21:23:36', 11);

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
  `user_phone` int(11) NOT NULL,
  `user_role` varchar(5) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime DEFAULT NULL,
  `login_session` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_surname`, `user_forenames`, `username`, `user_password`, `user_phone`, `user_role`, `date_added`, `last_login`, `login_session`) VALUES
(1, 'mustapha', 'rashid', 'mustapha.rashid', '$2y$10$RKUo9NkXZOLtK9GULaJ8zuKN3f4EetOiAOHeFqiPpqvAMdV4i1pOK', 249393898, 'admin', '2023-07-11', NULL, NULL),
(11, 'Mohammed', 'Adam', 'mohammed.adam', '$2y$10$5BHO5G/0HQGDKHKLXOxLKufjDQJjzWrN/fXtyoOA3bAdlRU/7ojKO', 123456789, 'user', '2023-07-25', NULL, NULL),
(13, 'Razak', 'Yussif', 'razak.yussif', '$2y$10$hptQzb./QnTiUN0Zsr8lVeNDtdUU.VVjqn58jQdnUFRx94yzzUHDG', 987654321, 'user', '2023-07-25', NULL, NULL),
(15, 'Admin', 'User', 'admin.user', '$2y$10$oHtBfxwtxGzbeYoPl3dAD.4b/aaZWCxBfUvF8zWL7ARW0j5QRVpP6', 123456789, 'admin', '2023-07-25', NULL, NULL);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
