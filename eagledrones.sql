-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eagledrones`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `ship` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `amount` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `order_id`, `title`, `amount`, `images`, `quantity`, `details`, `status`) VALUES
(9, '90194', 'FPV Free Style Drone 1', '350', '160514139556813.png | 1605141395241116.png', '5', 'This FPV Drone won\'t include goggles, This FPV Drone won\'t include goggles, This FPV Drone won\'t include goggles', '1'),
(10, '54634', 'FPV Free Style Drone 2', '350', '160514154673270.png | 1605141546734119.png', '5', 'This FPV Drone won\'t include goggles, This FPV Drone won\'t include goggles, This FPV Drone won\'t include goggles', '1'),
(11, '83073', 'FPV Free Style Drone 3', '350', '16051415938769.png | 1605141593968421.png', '5', 'This FPV Drone won\'t include goggles, This FPV Drone won\'t include goggles, This FPV Drone won\'t include goggles', '1'),
(12, '29341', 'FPV Free Style Drone with controller and headset', '350', '160514635756728.png | 1605146357735919.png', '5', 'This FPV Drone won\'t include goggles, This FPV Drone won\'t include goggles, This FPV Drone won\'t include goggles', '1'),
(13, '98457', 'FPV Free Style Drone 5', '350', '160514638841382.png | 1605146388375594.png', '5', 'This FPV Drone won\'t include goggles, This FPV Drone won\'t include goggles, This FPV Drone won\'t include goggles', '1'),
(14, '72251', 'FPV Free Style Drone 6', '350', '160514642884342.png | 1605146428680758.png', '5', 'This FPV Drone won\'t include goggles, This FPV Drone won\'t include goggles, This FPV Drone won\'t include goggles', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login_c` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
