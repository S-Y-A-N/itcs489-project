-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2025 at 11:41 PM
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
-- Database: `itcs489_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `address2` varchar(256) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `postal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `card_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_number` varchar(32) NOT NULL,
  `expiry_date` varchar(16) NOT NULL,
  `card_name` varchar(256) NOT NULL,
  `cvv` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`cart_item_id`, `user_id`, `product_id`, `quantity`) VALUES
(21, 1, 1, 2),
(22, 1, 2, 1),
(23, 1, 3, 1),
(24, 1, 5, 3),
(25, 1, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `code_name` varchar(20) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `code_name`, `name`) VALUES
(1, 'men', 'Men Fashion'),
(2, 'women', 'Women Fashion'),
(3, 'babies', 'Babies & Infants'),
(4, 'girls', 'Girls Fashion'),
(5, 'boys', 'Boys Fashion'),
(6, 'electronics', 'Electronics'),
(7, 'furniture', 'Home & Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `offer` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `seller_id`, `category_id`, `name`, `description`, `price`, `stock`, `offer`) VALUES
(1, 2, 1, 'Slim Fit Jeans', 'Comfortable slim fit denim jeans for men', 9, 100, 0),
(2, 2, 2, 'Floral Summer Dress', 'Lightweight floral print dress for women', 12, 80, 0),
(3, 2, 3, 'Baby Jumpsuit Pack', 'Pack of 5 cotton jumpsuits for babies', 10, 150, 0),
(4, 2, 4, 'Girls Pink Skirt', 'Colorful skirt perfect for young girls', 7, 60, 0),
(5, 2, 5, 'Boys Hoodie', 'Warm fleece hoodie for boys', 7, 70, 0.2),
(6, 2, 6, 'Bluetooth Headphones', 'Wireless headphones with noise cancellation', 20, 40, 0.1),
(7, 2, 7, 'Wooden Coffee Table', 'Elegant wooden coffee table for living room', 80, 20, 0.5),
(8, 2, 1, 'Men’s Leather Belt', 'Genuine leather belt for men', 10, 200, 0),
(9, 2, 2, 'Women’s Wide Handbag', 'Stylish glossy black handbag for women', 25, 50, 0),
(10, 2, 6, 'Smartphone Charger', 'Fast-charging USB-C smartphone charger', 10, 300, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `seller_id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `brand_name` varchar(40) NOT NULL,
  `contact_no` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`seller_id`, `email`, `password`, `brand_name`, `contact_no`) VALUES
(2, 'seller@cheapy.com', '', 'Cheapy Fashion', '+97310001000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `token` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `phone`, `password`, `fname`, `lname`, `gender`, `birth_date`, `token`) VALUES
(1, 'sara.ahmed@gmail.com', '+97317171717', '$2y$10$MCuoHGBPzxmbBv8FQQJMyOfYEPxFGWzGNzM03u6gKqwPuLnCM2Fb2', 'Sara', 'Ahmed', NULL, NULL, NULL),
(2, 'noor.ahmed@gmail.com', '+97318181818', '$2y$10$0EX9yibc386jVNNard.OxetG7p7MobJG6/rWGG2YUGGP.rI531DQC', 'Noor', 'Ahmed', NULL, NULL, NULL),
(3, 'amal.ahmed@gmail.com', '+97319191919', '$2y$10$kJN8.J4hWlYyedZJNaNM3.EB6yXjLkH0P5ynSL5w.VlhiUHO.agui', 'Amal', 'Ahmed', NULL, NULL, NULL),
(4, 'mariam.saleh@gmail.com', '+97333003300', '$2y$10$PKMR/eoDeNTK3celUw/6dOD2EYBao4DyJ5jExwyqMUXo7TvkcVVVW', 'Mariam', 'Saleh', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `addresses_users` (`user_id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`card_id`),
  ADD KEY `cards_users` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
