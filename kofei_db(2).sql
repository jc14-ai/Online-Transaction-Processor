-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: May 29, 2025 at 02:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kofei_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bundles`
--

CREATE TABLE `bundles` (
  `bundle_id` int(11) NOT NULL,
  `bundle_name` varchar(50) NOT NULL,
  `bundle_price` decimal(10,2) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'bundle.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bundles`
--

INSERT INTO `bundles` (`bundle_id`, `bundle_name`, `bundle_price`, `status`, `image`) VALUES
(2, 'Basic', 6650.00, 'active', 'bundle.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coffee_id` int(11) DEFAULT NULL,
  `coffee_size_id` int(11) DEFAULT NULL,
  `donut_id` int(11) DEFAULT NULL,
  `bundle_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coffee`
--

CREATE TABLE `coffee` (
  `coffee_id` int(11) NOT NULL,
  `coffee_name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'coffee.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coffee`
--

INSERT INTO `coffee` (`coffee_id`, `coffee_name`, `image`) VALUES
(1, 'Iced Black', 'Iced%20Latte.png'),
(2, 'Iced Mocha', 'Iced%20Mocha.png'),
(23, 'Iced Latte', 'Iced Latte.png'),
(26, 'Iced Blacky', 'Iced Hazelnut Latte.png'),
(29, 'Iced Blackiest', 'Iced%20Latte.png'),
(30, 'Iced Black mom', 'Iced%20Latte.png'),
(31, 'Iced Blackk', 'Iced Latte.png'),
(32, 'Iced Salted Caramel', 'Iced%20Slated%20Caramel.png'),
(33, 'Iced Caramel', 'Iced%20Slated%20Caramel.png');

-- --------------------------------------------------------

--
-- Table structure for table `coffee_price`
--

CREATE TABLE `coffee_price` (
  `coffee_id` int(11) NOT NULL,
  `coffee_size_id` int(11) NOT NULL,
  `coffee_price` decimal(10,2) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coffee_price`
--

INSERT INTO `coffee_price` (`coffee_id`, `coffee_size_id`, `coffee_price`, `status`) VALUES
(2, 1, 70.00, 'active'),
(2, 2, 80.00, 'active'),
(1, 2, 70.00, 'active'),
(1, 1, 60.00, 'active'),
(23, 1, 70.00, 'active'),
(23, 2, 80.00, 'active'),
(32, 1, 80.00, 'inactive'),
(32, 2, 100.00, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `coffee_size`
--

CREATE TABLE `coffee_size` (
  `coffee_size_id` int(11) NOT NULL,
  `coffee_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coffee_size`
--

INSERT INTO `coffee_size` (`coffee_size_id`, `coffee_size`) VALUES
(1, 16),
(2, 22);

-- --------------------------------------------------------

--
-- Table structure for table `donut`
--

CREATE TABLE `donut` (
  `donut_id` int(11) NOT NULL,
  `donut_name` varchar(50) NOT NULL,
  `donut_price` decimal(10,2) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'donut.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donut`
--

INSERT INTO `donut` (`donut_id`, `donut_name`, `donut_price`, `status`, `image`) VALUES
(1, 'Tsoko Krunch', 25.00, 'active', 'tsoko supremo.png'),
(3, 'Tsoko Streussel', 25.00, 'active', 'sansrival.png'),
(5, 'Nutty Ring', 25.00, 'active', 'flower donut.png'),
(6, 'Strawberry Ringbow', 25.00, 'active', 'berry bites.png');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `user_id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` enum('pending','completed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `order_status`) VALUES
(33, 29, '2025-05-29', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `coffee_id` int(11) DEFAULT NULL,
  `coffee_size_id` int(11) DEFAULT NULL,
  `donut_id` int(11) DEFAULT NULL,
  `bundle_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `coffee_id`, `coffee_size_id`, `donut_id`, `bundle_id`, `quantity`) VALUES
(72, 33, NULL, NULL, 1, NULL, 3),
(73, 33, 2, 1, NULL, NULL, 3),
(74, 33, NULL, NULL, NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `email`, `role`) VALUES
(1, 'jestalycastillo15@gmail.com', 'admin'),
(27, 'castillo_jestalyjoseph@plpasig.edu.ph', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `token` varchar(255) NOT NULL,
  `verified` enum('yes','no') NOT NULL DEFAULT 'no',
  `image` varchar(255) DEFAULT 'account-icon.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `contact`, `password`, `token`, `verified`, `image`) VALUES
(1, 'Kofai_admin', 'jestalycastillo15@gmail.com', '09696429346', 'Wanbilyon3#', 'e3c68eaa5f7f6c295debe05fb38a1c2a', 'yes', 'account-icon.png'),
(29, 'Kofai_user', 'castillo_jestalyjoseph@plpasig.edu.ph', '09696429346', 'Password143#', '59136229f304486cb359e158bfe90e33', 'yes', 'logo-kofai.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bundles`
--
ALTER TABLE `bundles`
  ADD PRIMARY KEY (`bundle_id`),
  ADD UNIQUE KEY `bundle_name` (`bundle_name`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `coffee_id` (`coffee_id`),
  ADD KEY `coffee_size_id` (`coffee_size_id`),
  ADD KEY `donut_id` (`donut_id`),
  ADD KEY `bundle_id` (`bundle_id`);

--
-- Indexes for table `coffee`
--
ALTER TABLE `coffee`
  ADD PRIMARY KEY (`coffee_id`);

--
-- Indexes for table `coffee_price`
--
ALTER TABLE `coffee_price`
  ADD KEY `coffee_id` (`coffee_id`),
  ADD KEY `coffee_size_id` (`coffee_size_id`);

--
-- Indexes for table `coffee_size`
--
ALTER TABLE `coffee_size`
  ADD PRIMARY KEY (`coffee_size_id`);

--
-- Indexes for table `donut`
--
ALTER TABLE `donut`
  ADD PRIMARY KEY (`donut_id`),
  ADD UNIQUE KEY `donut_name` (`donut_name`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `coffee_id` (`coffee_id`),
  ADD KEY `coffee_size_id` (`coffee_size_id`),
  ADD KEY `donut_id` (`donut_id`),
  ADD KEY `bundle_id` (`bundle_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bundles`
--
ALTER TABLE `bundles`
  MODIFY `bundle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `coffee`
--
ALTER TABLE `coffee`
  MODIFY `coffee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `coffee_size`
--
ALTER TABLE `coffee_size`
  MODIFY `coffee_size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donut`
--
ALTER TABLE `donut`
  MODIFY `donut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`coffee_id`) REFERENCES `coffee` (`coffee_id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`coffee_size_id`) REFERENCES `coffee_size` (`coffee_size_id`),
  ADD CONSTRAINT `cart_ibfk_4` FOREIGN KEY (`donut_id`) REFERENCES `donut` (`donut_id`),
  ADD CONSTRAINT `cart_ibfk_6` FOREIGN KEY (`bundle_id`) REFERENCES `bundles` (`bundle_id`);

--
-- Constraints for table `coffee_price`
--
ALTER TABLE `coffee_price`
  ADD CONSTRAINT `coffee_price_ibfk_1` FOREIGN KEY (`coffee_id`) REFERENCES `coffee` (`coffee_id`),
  ADD CONSTRAINT `coffee_price_ibfk_2` FOREIGN KEY (`coffee_size_id`) REFERENCES `coffee_size` (`coffee_size_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`coffee_id`) REFERENCES `coffee` (`coffee_id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`coffee_size_id`) REFERENCES `coffee_size` (`coffee_size_id`),
  ADD CONSTRAINT `order_details_ibfk_4` FOREIGN KEY (`donut_id`) REFERENCES `donut` (`donut_id`),
  ADD CONSTRAINT `order_details_ibfk_6` FOREIGN KEY (`bundle_id`) REFERENCES `bundles` (`bundle_id`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
