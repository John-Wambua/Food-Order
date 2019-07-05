-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 10:57 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodtypes`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(100) NOT NULL,
  `name` varchar(40) NOT NULL,
  `image` varchar(40) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `image`, `price`) VALUES
(1, 'Pizza', 'upload/pizza1.png', 1000),
(2, 'Fries', 'upload/fries1.jpg', 200),
(3, 'Steak', 'upload/steak.jpg', 1000),
(4, 'Chicken', 'upload/kuku.png', 450),
(5, 'Ribs', 'upload/ribs.jpg', 750),
(6, 'Beer', 'upload/beer.jpg', 300),
(7, 'Burger', 'upload/bg.jpeg', 600),
(8, 'Milkshake', 'upload/milkshake1.jpg', 400);

-- --------------------------------------------------------

--
-- Table structure for table `order-details`
--

CREATE TABLE `order-details` (
  `id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `unit_amount` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date_created`, `amount`, `status`) VALUES
(9, 13, '2019-06-25 19:17:17', '1800', '1'),
(28, 11, '2019-06-26 13:43:27', '3750', '1'),
(29, 11, '2019-06-26 13:44:41', '3750', '1'),
(30, 11, '2019-06-26 14:18:53', '1200', '1'),
(38, 11, '2019-06-26 14:38:32', '600', '0'),
(39, 15, '2019-06-27 14:17:14', '900', '0'),
(42, 20, '2019-06-27 16:54:25', '2100', '0'),
(43, 20, '2019-06-27 16:55:55', '2100', '0'),
(46, 20, '2019-06-27 16:58:25', '2100', '0'),
(106, 28, '2019-06-30 22:44:10', '200', '0'),
(107, 28, '2019-06-30 22:46:07', '600', '1'),
(108, 28, '2019-06-30 22:46:14', '300', '0'),
(109, 28, '2019-06-30 22:46:21', '600', '0'),
(110, 28, '2019-06-30 22:46:24', '500', '0'),
(111, 28, '2019-06-30 22:54:08', '600', '0'),
(112, 28, '2019-06-30 22:54:12', '500', '0'),
(113, 28, '2019-06-30 22:54:15', '700', '0'),
(114, 28, '2019-06-30 22:58:11', '300', '0'),
(115, 28, '2019-06-30 22:58:13', '700', '0'),
(116, 28, '2019-06-30 23:22:38', '0', '0'),
(126, 28, '2019-07-01 06:13:15', '700', '0'),
(127, 28, '2019-07-01 08:49:09', '400', '0'),
(128, 28, '2019-07-01 08:59:32', '11000', '0'),
(129, 28, '2019-07-01 08:59:39', '600', '0'),
(130, 13, '2019-07-01 23:11:52', '700', '0'),
(131, 13, '2019-07-01 23:11:55', '600', '0'),
(132, 28, '2019-07-02 16:50:24', '600', '0'),
(133, 28, '2019-07-02 16:50:32', '300', '0'),
(134, 28, '2019-07-02 16:50:47', '1500', '0'),
(139, 13, '2019-07-02 18:02:24', '200', '0'),
(140, 13, '2019-07-02 18:02:27', '600', '0'),
(141, 13, '2019-07-02 18:02:32', '500', '0'),
(142, 13, '2019-07-02 18:03:53', '300', '0'),
(143, 13, '2019-07-02 18:05:20', '200', '0'),
(144, 28, '2019-07-03 14:55:28', '2000', '0'),
(145, 28, '2019-07-03 14:55:32', '400', '0'),
(146, 11, '2019-07-05 14:23:28', '1000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(256) NOT NULL,
  `user_type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `username`, `password`, `user_type`) VALUES
(1, 'Wamzy', '$2y$10$5jOgmbo9xENUP8rayJx09OlHwwao1Ptx4mqufDcTrUGlWWrt0auxC', 1),
(11, 'Pauline', '$2y$10$fS6/Ub8eBpY3GkSscWzNoO8vf3K0GXuIRIlOJV5zuvMKxm9OH/vqq', 1),
(12, 'Andrew', '$2y$10$2rb5phTVh.ckZ1RwpenP0.dwbLyVwHRXtOI/4M2f3M7SRdPv41DAq', 3),
(13, 'Cecily', '$2y$10$1R6pqu4lPWD2Ozi6aUhp1e1mV1UbeDNsORXEYnvqVa1./HiVF091S', 2),
(15, 'Mathenge', '$2y$10$CD/2iJebaZR3qRRjI7ueIuzoSvs0Poaxig0CAsIT/uyAr5p8hA7H.', 2),
(20, 'johnW', '$2y$10$/9WzvMDlu6G5Ds6iE9zRq.t3D5QzZn4Mti395g.BXnUSqhfuWwEym', 1),
(28, 'John Wambua', '$2y$10$Nizza3IEofFNuROZ6IBzVe105wEi4wy8wuXUF4zNkGZppn5cv.lWy', 2),
(33, 'Wambua', '$2y$10$3Go40rNJrxm/fAX72oSrLeyj6mHt3tr638sfHqhPe.8JCSlvvCp2G', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `Usertype_ID` int(10) NOT NULL,
  `Usertype` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`Usertype_ID`, `Usertype`) VALUES
(1, 'Admin'),
(2, 'Client'),
(3, 'Supplier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order-details`
--
ALTER TABLE `order-details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User_ID` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`Usertype_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order-details`
--
ALTER TABLE `order-details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order-details`
--
ALTER TABLE `order-details`
  ADD CONSTRAINT `order-details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `usertype` (`Usertype_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
