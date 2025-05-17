-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2025 at 05:30 PM
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
  `address_title` varchar(50) DEFAULT NULL,
  `address` varchar(256) NOT NULL,
  `address2` varchar(256) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `postal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`address_id`, `user_id`, `address_title`, `address`, `address2`, `city`, `country`, `postal`) VALUES
(1, 1, 'Home', 'Block 123, Street 1012, House 99', 'Floor 1', 'Manama', 'Bahrain', '123'),
(7, 1, 'Work', 'Block 988, Street 1924, Building 30', 'Floor 5, Office 305', 'Manama', 'Bahrain', '988'),
(9, 1, 'Family Home', 'Block 282, Street 2910, House 2', '', 'Manama', 'Bahrain', '282'),
(13, 1, 'Friend House', 'Block 123, Street 1012, House 99', 'Floor 1', 'Riffa', 'Bahrain', '988'),
(14, 1, 'Mariam House', 'Block 929, Street 5593, House 10', '', 'Sanad', 'Bahrain', '929');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `email`, `password`) VALUES
(1, 'admin@cheapy.com', '$2y$10$7VnykU0kNFRskKlNFoD3UOtM6PQW6WbIuf6sKyqscbjJGqMapz7Ca');

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

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`card_id`, `user_id`, `card_number`, `expiry_date`, `card_name`, `cvv`) VALUES
(1, 1, '4000 1234 1234 2929', '11/29', 'Sarah Ahmed', '111'),
(2, 1, '4040 1231 2311 2007', '02/36', 'Sarah Ahmed', '111');

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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_address` varchar(256) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('new','hold','shipped','closed') NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `payment_id`, `order_address`, `timestamp`, `status`) VALUES
(17, 1, 23, 'Block 123, Street 1012, House 99, Floor 1, Manama, Bahrain, POSTAL: 123', '2025-05-15 18:24:52', 'new'),
(19, 1, 25, 'Block 282, Street 2910, House 2, Manama, Bahrain, POSTAL: 282', '2025-05-15 18:30:13', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `price`, `quantity`) VALUES
(21, 17, 1, 9, 1),
(23, 19, 3, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `amount` float NOT NULL,
  `method` enum('card','benefitpay','applepay') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `user_id`, `timestamp`, `amount`, `method`) VALUES
(23, 1, '2025-05-15 18:24:52', 11.9, 'benefitpay'),
(24, 1, '2025-05-15 18:26:53', 15.2, 'applepay'),
(25, 1, '2025-05-15 18:30:13', 13, 'applepay'),
(33, 2, '2025-05-16 07:15:30', 38, 'card'),
(34, 3, '2025-05-16 11:20:45', 47, 'benefitpay'),
(35, 4, '2025-05-17 05:05:10', 690.6, 'applepay'),
(36, 2, '2025-05-17 06:40:00', 365, 'benefitpay');

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
(1, 2, 1, 'Slim Fit Jeans', 'Comfortable slim fit denim jeans for men', 9, 91, 0),
(2, 2, 2, 'Floral Summer Dress', 'Lightweight floral print dress for women', 12, 75, 0),
(3, 2, 3, 'Baby Jumpsuit Pack', 'Pack of 5 cotton jumpsuits for babies', 10, 145, 0),
(4, 2, 4, 'Girls Pink Skirt', 'Colorful skirt perfect for young girls', 7, 60, 0),
(5, 2, 5, 'Boys Hoodie', 'Warm fleece hoodie for boys', 7, 58, 0.2),
(6, 2, 6, 'Bluetooth Headphones', 'Wireless headphones with noise cancellation', 20, 40, 0.1),
(7, 2, 7, 'Wooden Coffee Table', 'Elegant wooden coffee table for living room', 80, 20, 0.5),
(8, 2, 1, 'Men’s Leather Belt', 'Genuine leather belt for men', 10, 200, 0),
(9, 2, 2, 'Women’s Wide Handbag', 'Stylish glossy black handbag for women', 25, 50, 0),
(10, 2, 6, 'Smartphone Charger', 'Fast-charging USB-C smartphone charger', 10, 296, 0),
(11, 6, 1, 'Casual Polo Shirt', 'Comfortable cotton polo shirt for men', 7.5, 150, 0.1),
(12, 6, 2, 'Summer Maxi Dress', 'Flowy maxi dress with floral print', 14, 80, 0),
(13, 9, 4, 'Girls Denim Jacket', 'Stylish denim jacket for girls', 10, 70, 0),
(14, 9, 5, 'Boys Sports Shoes', 'Durable sports shoes for boys', 15, 60, 0.05),
(15, 7, 7, 'Office Desk Lamp', 'LED desk lamp with adjustable brightness', 20, 30, 0.2),
(16, 7, 7, 'Bookshelf', 'Wooden bookshelf with 5 tiers', 45, 25, 0),
(17, 7, 6, '4K LED TV 40 inch', 'Ultra HD 4K LED smart TV', 180, 10, 0.1),
(18, 10, 6, 'Wireless Mouse', 'Ergonomic wireless mouse', 12, 100, 0),
(19, 10, 6, 'Bluetooth Speaker', 'Portable Bluetooth speaker', 18, 50, 0.15),
(20, 8, 3, 'Baby Stroller', 'Lightweight baby stroller with safety features', 60, 20, 0),
(21, 8, 3, 'Baby Diapers Pack', 'Pack of 60 diapers', 15, 100, 0),
(22, 6, 1, 'Formal Shirt', 'Long-sleeve formal shirt for men', 9, 120, 0.1),
(23, 6, 2, 'Evening Gown', 'Elegant evening gown for special occasions', 40, 15, 0.2),
(24, 9, 4, 'Girls Sneakers', 'Comfortable sneakers for girls', 12, 40, 0),
(25, 9, 5, 'Boys Cap', 'Cool cap for boys', 5, 100, 0),
(26, 7, 7, 'Dining Table Set', 'Wooden dining table with 6 chairs', 300, 5, 0.25),
(27, 7, 6, 'Laptop', '15-inch laptop with 8GB RAM', 400, 8, 0.1),
(28, 10, 6, 'Smartwatch', 'Smartwatch with heart rate monitor', 90, 40, 0.05),
(29, 8, 3, 'Baby Monitor', 'Video baby monitor with night vision', 55, 20, 0),
(30, 6, 1, 'Men’s Hoodie', 'Warm hoodie for men', 12, 70, 0.1),
(31, 6, 2, 'Women’s Blouse', 'Elegant blouse for women', 15, 90, 0),
(32, 9, 4, 'Girls Dress', 'Cotton dress for girls', 10, 60, 0.05),
(33, 9, 5, 'Boys Jeans', 'Comfortable denim jeans for boys', 13, 80, 0),
(34, 7, 7, 'Sofa Set', 'Leather sofa set with 3 seats', 450, 3, 0.3),
(35, 7, 6, 'Tablet', '10-inch tablet with 64GB storage', 150, 12, 0.1),
(36, 10, 6, 'Wireless Keyboard', 'Compact wireless keyboard', 20, 75, 0),
(37, 8, 3, 'Baby Feeding Bottle', 'Anti-colic baby feeding bottle', 8, 150, 0),
(38, 6, 1, 'Men’s Watch', 'Classic men’s wristwatch', 25, 50, 0.15),
(39, 6, 2, 'Women’s Scarf', 'Silk scarf for women', 8, 80, 0),
(40, 9, 4, 'Girls Hat', 'Sun hat for girls', 6, 60, 0),
(41, 9, 5, 'Boys Jacket', 'Winter jacket for boys', 18, 40, 0.1),
(42, 7, 7, 'Floor Lamp', 'Modern floor lamp', 50, 20, 0),
(43, 7, 6, 'Smartphone', 'Latest model smartphone', 300, 10, 0.05),
(44, 10, 6, 'Earbuds', 'Wireless earbuds with charging case', 40, 70, 0),
(45, 8, 3, 'Baby Crib', 'Wooden baby crib', 120, 10, 0.15),
(46, 6, 1, 'Men’s Belt', 'Leather belt for men', 10, 90, 0),
(47, 6, 2, 'Women’s Handbag', 'Leather handbag', 35, 30, 0.1),
(48, 9, 4, 'Girls Socks Pack', 'Pack of 5 socks for girls', 4, 100, 0),
(49, 9, 5, 'Boys Gloves', 'Winter gloves for boys', 7, 70, 0),
(50, 7, 7, 'Wall Clock', 'Decorative wall clock', 25, 40, 0.1);

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
(2, 'seller@cheapy.com', '$2y$10$b0fYrgeGEuVqQbnRX9omLOXjV0KQYrkEtAZ.nkJjORHPAK4GV6h4y', 'Cheapy Fashion', '+97310001000'),
(3, 'codex@company.com', '$2y$10$14iszMRCaV/yMV8MpntLduqwwfRB4yWOjAyJjGX1wjcq.mmDVsyMO', 'CODEX', '+97315151515'),
(4, 'moonlight@company.com', '$2y$10$pu2JEwjfBKW0c0ISpUmYoeO5oAN1aoQbpvuilTMoUf9yzFFhPXXqS', 'Moonlight', '+97316161616'),
(5, '3stars@company.com', '$2y$10$72c2OKGLSEVQyBvFRMIS0.mtRl/ACnsCHz4SCpBCI7cKkwLHuXCsu', 'Three Stars', '+97315615615'),
(6, 'fashionhub@bahrain.com', '$2y$10$hashedpass11', 'Fashion Hub', '+97333445566'),
(7, 'techworld@bahrain.com', '$2y$10$hashedpass12', 'Tech World', '+97344556677'),
(8, 'homestyle@bahrain.com', '$2y$10$hashedpass13', 'Home Style', '+97355667788'),
(9, 'kidscorner@bahrain.com', '$2y$10$hashedpass14', 'Kids Corner', '+97366778899'),
(10, 'gadgetzone@bahrain.com', '$2y$10$hashedpass15', 'Gadget Zone', '+97377889900');

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
  `birth_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `phone`, `password`, `fname`, `lname`, `gender`, `birth_date`) VALUES
(1, 'sara.ahmed@gmail.com', '+97317171717', '$2y$10$MCuoHGBPzxmbBv8FQQJMyOfYEPxFGWzGNzM03u6gKqwPuLnCM2Fb2', 'Sara', 'Ahmed', NULL, NULL),
(2, 'noor.ahmed@gmail.com', '+97318181818', '$2y$10$0EX9yibc386jVNNard.OxetG7p7MobJG6/rWGG2YUGGP.rI531DQC', 'Noor', 'Ahmed', NULL, NULL),
(3, 'amal.ahmed@gmail.com', '+97319191919', '$2y$10$kJN8.J4hWlYyedZJNaNM3.EB6yXjLkH0P5ynSL5w.VlhiUHO.agui', 'Amal', 'Ahmed', NULL, NULL),
(4, 'mariam.saleh@gmail.com', '+97333003300', '$2y$10$PKMR/eoDeNTK3celUw/6dOD2EYBao4DyJ5jExwyqMUXo7TvkcVVVW', 'Mariam', 'Saleh', NULL, NULL),
(34, 'ali.hassan@gmail.com', '+97339393838', '$2y$10$qmN.grTiiweOM2EFpEXjBu7xxKwC3WVmiX0AhLCz3bbB9zy6pBcom', 'Ali', 'Hassan', 'M', NULL),
(35, 'liam.smith@example.com', '+97330001001', '$2y$10$E1uRtbZtzsE7P1fXq5EukezxZJhvNVN8MmpYXy5lnNvUtEDr1XrhG', 'Liam', 'Smith', 'M', '1980-01-01'),
(36, 'emma.johnson@example.com', '+97330001002', '$2y$10$kSNp28mfozqdugZNmVJiBO8k1pYnN1XdOa0o0ncykWscWJhS33DYW', 'Emma', 'Johnson', 'F', '1981-02-02'),
(37, 'noah.williams@example.com', '+97330001003', '$2y$10$Zp8JKuYQ5bWk2tJftOBOjO1v/0bB1ZxyHdpm59zNfDlGRITgrIp4u', 'Noah', 'Williams', 'M', '1982-03-03'),
(38, 'olivia.brown@example.com', '+97330001004', '$2y$10$Z4YMKkqXAxv4yCSe5BpkK.cLFmR6qn4X7W3o4b5Gea4HxAL8fQFGC', 'Olivia', 'Brown', 'F', '1983-04-04'),
(39, 'elijah.jones@example.com', '+97330001005', '$2y$10$q/cMI2r2KgG/tQlOafJOpeHQb5m7uqgMdP7Xxp3f4ktOjC7hrkZey', 'Elijah', 'Jones', 'M', '1984-05-05'),
(40, 'ava.garcia@example.com', '+97330001006', '$2y$10$2nbXNkb3i4XbyPiPqnmJeOqT8XGKKy4WR5pz.1Ee5Ug7WzF4UEdPa', 'Ava', 'Garcia', 'F', '1985-06-06'),
(41, 'william.martinez@example.com', '+97330001007', '$2y$10$tkz8OgYV1HKpYBoPvrJh7OFoxIrXixGVaRhAzH6mrmSS2vsBG5HVO', 'William', 'Martinez', 'M', '1986-07-07'),
(42, 'isabella.rodriguez@example.com', '+97330001008', '$2y$10$zNrxhTyfPPuF4d/y2xI0cuMnmvMIkqTz0wlX5nKx64eUFeYh0JyRa', 'Isabella', 'Rodriguez', 'F', '1987-08-08'),
(43, 'james.lee@example.com', '+97330001009', '$2y$10$8CNVDRLCI1r7o1WJnE7oFejOVhqv2Wc3xRkyU1fzLn5k8Lbm3Dbti', 'James', 'Lee', 'M', '1988-09-09'),
(44, 'mia.walker@example.com', '+97330001010', '$2y$10$jJkAPXjytxWjpAZVxN7q4ODlqIG81r9X0AmQDOj76lVz7E3kDW/qa', 'Mia', 'Walker', 'F', '1989-10-10'),
(45, 'benjamin.hall@example.com', '+97330001011', '$2y$10$tW8HJ4zIuZVZLBZwL3q5nuUisDR6tYQJ1HPXGp2qFvqHcw8Ohf.d2', 'Benjamin', 'Hall', 'M', '1990-11-11'),
(46, 'charlotte.allen@example.com', '+97330001012', '$2y$10$K7FsCM4lEjeFmp9mu/UjoOweYycyqSU3JOwFuc6wEiq1E3kZPJOiC', 'Charlotte', 'Allen', 'F', '1991-12-12'),
(47, 'lucas.young@example.com', '+97330001013', '$2y$10$G04vNgfr7gRDPFy7r5jdquAj/8G5nDBlV2GrRVkNu9J8q7IF/ZFQy', 'Lucas', 'Young', 'M', '1992-01-13'),
(48, 'amelia.hernandez@example.com', '+97330001014', '$2y$10$HdKytIqFa7iJQXTczmHVXOoxIg4VrGR8u33bRrvK.SjIKbZ7pTFve', 'Amelia', 'Hernandez', 'F', '1993-02-14'),
(49, 'mason.king@example.com', '+97330001015', '$2y$10$H2pLtpuW4/fgqQJNOYG7aONlnSVQ3uK93zMeAZmX96Ujy0wD9UkE.', 'Mason', 'King', 'M', '1994-03-15'),
(50, 'eva.wright@example.com', '+97330001016', '$2y$10$ewmw7PpSImVLZxOxZ5OgROXh95I1uU1YSxFtOIKYnGx0YshQCN2Gu', 'Eva', 'Wright', 'F', '1995-04-16'),
(51, 'logan.scott@example.com', '+97330001017', '$2y$10$ZJbA5ckYvH0oHVDg2LFai.MvvG/YQJPcmRnq6mHdWclhzOKDj60de', 'Logan', 'Scott', 'M', '1996-05-17'),
(52, 'sofia.green@example.com', '+97330001018', '$2y$10$3hsU1bjiT3tQjEjuHylqPe1JQ9Gd7Pns41G7yTAwi1wwKw/TUyNZG', 'Sofia', 'Green', 'F', '1997-06-18'),
(53, 'elijah.adams@example.com', '+97330001019', '$2y$10$s64Evq7dQ1lX9zq4ySDf1e0XWZ71n6kXKNocTzLVjFJcRt3CdtWUS', 'Elijah', 'Adams', 'M', '1998-07-19'),
(54, 'ella.baker@example.com', '+97330001020', '$2y$10$5q/zoLS5ogks4yAe6XjInObUkRoPLNJPSczW3I9h6N2xvxxhG47pO', 'Ella', 'Baker', 'F', '1999-08-20'),
(55, 'jack.nelson@example.com', '+97330001021', '$2y$10$P1SHFpsBMX5LpSk8YbLDHOv5TwXly0TSEl1BQ2FOwUmCW12aNvtSO', 'Jack', 'Nelson', 'M', '2000-09-21'),
(56, 'amelia.carter@example.com', '+97330001022', '$2y$10$PiEvkpMI9i8tgWtr8XoEdOAjTtJ3a2Qw0QgWxLzIyJbCHeqQOsj6O', 'Amelia', 'Carter', 'F', '2001-10-22'),
(57, 'harry.mitchell@example.com', '+97330001023', '$2y$10$ddkp1J80i4YHeJuOS2NHJeF0P/jXlzFZKsF1rYs.QKE5BzL22WiXO', 'Harry', 'Mitchell', 'M', '2002-11-23'),
(58, 'grace.perez@example.com', '+97330001024', '$2y$10$YOtUeSl1/xOZ48GSh7wdCOyLlm24W60TfNcsTvC1XJZzztX/x6MuK', 'Grace', 'Perez', 'F', '2003-12-24'),
(59, 'charlie.roberts@example.com', '+97330001025', '$2y$10$UXvj9U0zyB7QV7qQ8aNozO3Y/NrV3RogAMswc7wEZWh9WDQ.KrDvq', 'Charlie', 'Roberts', 'M', '2004-01-25'),
(60, 'hannah.turner@example.com', '+97330001026', '$2y$10$8KQKymW2C0Jq/3HLw3t0kuVQq7r7mwhRznVxd1K9UVUoY6H7vTpZ2', 'Hannah', 'Turner', 'F', '2005-02-26'),
(61, 'david.phillips@example.com', '+97330001027', '$2y$10$5zo6yEmHpysQX0Gc/lrWVeJOFOlKqLdF4ZVfK/F6djZLtI9mX87vO', 'David', 'Phillips', 'M', '2006-03-27'),
(62, 'lily.campbell@example.com', '+97330001028', '$2y$10$FOZ1yQMnAL2ALp4KM53V/OQ/IWuwBla0c7CwJspBqXhtvZcuH6bi6', 'Lily', 'Campbell', 'F', '2007-04-28'),
(63, 'joseph.evans@example.com', '+97330001029', '$2y$10$3Ir9kDnEhxSlPnbc/Cq9ru8S19pckKecKEH4l6vhGoC7Ygm3m9FiS', 'Joseph', 'Evans', 'M', '2008-05-29'),
(64, 'zoe.edwards@example.com', '+97330001030', '$2y$10$lO6KUo0mJx2EOl9D9DQ4Qu6nyoX5eZC2vwe8YTLLHu28sTgPzU2Bq', 'Zoe', 'Edwards', 'F', '2009-06-30'),
(65, 'samuel.collins@example.com', '+97330001031', '$2y$10$qlxjeDk7hLcA3MeNzhhQiuANRj4sAocTf5zVlmT0pDBc1SMeZkRmS', 'Samuel', 'Collins', 'M', '2010-07-31'),
(66, 'ella.stewart@example.com', '+97330001032', '$2y$10$RWu67P5Xw3a15qQ2BDIgHuEvpDLW2qv4P7vK5oxYahEDAZ8qTAJK2', 'Ella', 'Stewart', 'F', '2011-08-01'),
(67, 'leo.morris@example.com', '+97330001033', '$2y$10$7qosRDeCw0qlb1PM5Ch5kOZtbbZFk3tpHBTqkB3R3UHLkZkN1JzXi', 'Leo', 'Morris', 'M', '2012-09-02'),
(68, 'madison.rogers@example.com', '+97330001034', '$2y$10$XrDWVyXG6e6kmM1m6RBHpu8XzTAHRVfHQz/D3eFhD9ZoYmmM3W1Iu', 'Madison', 'Rogers', 'F', '2013-10-03'),
(69, 'ryan.reed@example.com', '+97330001035', '$2y$10$1H9oVUnK75FvpExhz2LBl.7qMSDEbYdB7L5aJ2uqYER1HaQ5eWtvu', 'Ryan', 'Reed', 'M', '2014-11-04'),
(70, 'nora.cook@example.com', '+97330001036', '$2y$10$AcjsDFXbD4H5yqNdi9Lpg.dQFds5AxnTOLrFx/uEFOBR0f0ZjVdsu', 'Nora', 'Cook', 'F', '2015-12-05'),
(71, 'caleb.morgan@example.com', '+97330001037', '$2y$10$T6iF05OUK5/jcWTXgEmd8.O0i5yXP5bFvRXfquH3/u1yxV8wfhBFe', 'Caleb', 'Morgan', 'M', '2016-01-06'),
(72, 'hazel.bell@example.com', '+97330001038', '$2y$10$wwcFYDFQaxzO4aHwKZnUuOF5hSdfhsJImXxD2koYNyrKuw2iPZo5a', 'Hazel', 'Bell', 'F', '2017-02-07'),
(73, 'owen.murphy@example.com', '+97330001039', '$2y$10$xXJ8h0wt7sy7Uq27NdrZ1uIcXEsuHzHEzQVQX97llQpHTTXExHpG6', 'Owen', 'Murphy', 'M', '2018-03-08'),
(74, 'scarlett.richardson@example.com', '+97330001040', '$2y$10$NY6h/0Ts7DKHChLmBtuqteUl3f3kaBqClRh0oCwdztwQ4GyE5OPqC', 'Scarlett', 'Richardson', 'F', '2019-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_items`
--

CREATE TABLE `wishlist_items` (
  `wishlist_item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

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
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);
ALTER TABLE `categories` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_payment` (`payment_id`),
  ADD KEY `order_customer` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_of_item` (`order_id`),
  ADD KEY `product_of_item` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `seller_id` (`seller_id`);
ALTER TABLE `products` ADD FULLTEXT KEY `name` (`name`);
ALTER TABLE `products` ADD FULLTEXT KEY `description` (`description`);
ALTER TABLE `products` ADD FULLTEXT KEY `name_2` (`name`,`description`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`seller_id`);
ALTER TABLE `sellers` ADD FULLTEXT KEY `brand_name` (`brand_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist_items`
--
ALTER TABLE `wishlist_items`
  ADD PRIMARY KEY (`wishlist_item_id`),
  ADD KEY `wishlist_user` (`user_id`),
  ADD KEY `wishlist_product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `wishlist_items`
--
ALTER TABLE `wishlist_items`
  MODIFY `wishlist_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_customer` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `order_payment` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`payment_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_of_item` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_of_item` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payment_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist_items`
--
ALTER TABLE `wishlist_items`
  ADD CONSTRAINT `wishlist_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
