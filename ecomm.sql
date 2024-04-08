-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 01:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `id` int(11) NOT NULL,
  `username` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`id`, `username`, `email`, `password`, `phone`) VALUES
(2, 'bola', 'tinubu@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(11) NOT NULL,
  `ip_address` varbinary(6) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`, `ip_address`, `quantity`, `date`) VALUES
(17, 0x313237, 2, '2024-03-14 17:27:02'),
(17, 0x313237, 2, '2024-03-19 22:23:26'),
(18, 0x313237, 2, '2024-03-19 22:23:45'),
(13, 0x313237, 3, '2024-03-19 22:32:15'),
(14, 0x313237, 1, '2024-03-19 22:42:45'),
(15, 0x313237, 1, '2024-03-19 22:44:47'),
(18, 0x313237, 2, '2024-03-20 07:16:17'),
(17, 0x313237, 2, '2024-03-20 07:47:08'),
(16, 0x313237, 2, '2024-03-20 07:48:02'),
(16, 0x313237, 1, '2024-03-26 12:02:41'),
(15, 0x313237, 1, '2024-03-26 12:12:19'),
(19, 0x313237, 1, '2024-03-29 00:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `catergory`
--

CREATE TABLE `catergory` (
  `id` int(11) NOT NULL,
  `catergory_name` varchar(70) NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keyword` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible, 1=hidden, 2=delete',
  `slug` varchar(50) NOT NULL,
  `add_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catergory`
--

INSERT INTO `catergory` (`id`, `catergory_name`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `slug`, `add_on`) VALUES
(12, 'Phone', 'phone', 'available in all kind of prices', 'phone', 0, 'pho-ne', '2024-03-11 11:20:30'),
(13, 'Shoes', 'shoes', 'All kind of shoes', 'shoes', 1, 'shoes', '2024-03-11 11:23:18'),
(19, 'Laptops', 'laptops', 'laptops', 'laptop', 0, 'lap-top', '2024-03-12 12:14:07'),
(22, 'headphone', 'headphone', 'all head phone for all', 'headphone', 0, 'head-phone', '2024-03-12 12:22:16'),
(23, 'cap', 'cap', 'All available caps for all kind of catergories,, that will suit your desire', 'cap', 0, 'cap', '2024-03-14 16:16:47'),
(24, 'watch', 'watch', 'suit watch', 'watch', 0, 'wa-tch', '2024-03-14 16:17:19'),
(25, 'bags', 'bag', 'all bags', 'bags', 0, 'bag', '2024-03-14 16:40:21'),
(26, 'coats', 'coats', 'all caots', 'coats', 0, 'co-ats', '2024-03-14 16:40:48'),
(27, 'Gawn', 'gawn', 'All gawn', 'gawn', 0, 'g-a-w-n', '2024-03-14 16:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varbinary(6) NOT NULL,
  `total_price` decimal(6,3) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `order_status` tinyint(4) DEFAULT 0,
  `email` varchar(225) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(225) NOT NULL,
  `tracking_id` varchar(100) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `date` timestamp(4) NOT NULL DEFAULT current_timestamp(4)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `ip_address`, `total_price`, `invoice_number`, `order_status`, `email`, `pincode`, `phone`, `address`, `tracking_id`, `payment_mode`, `payment_id`, `date`) VALUES
(1, 1, 0x3132372e302e, 999.999, 647078420, 2, 'mishack@gmail.com', '0Y0--567f', 1234567, 'New-Karshi', 'XAMPP5651mishack@gmail.com', 'COD', NULL, '2024-03-14 11:28:00.0000'),
(2, 2, 0x3132372e302e, 999.999, 194682453, 1, 'Gabriel@gmail.com', '9090r', 2147483647, 'New karshi', 'XAMPP5405gabriel@gmail.com', 'COD', NULL, '2024-03-19 18:14:00.0000'),
(3, 2, 0x3132372e302e, 999.999, 232685307, 1, 'Gabriel@gmail.com', '=97890', 0, 'cap town', 'XAMPP5054gabriel@gmail.com', 'COD', NULL, '2024-03-19 18:31:00.0000'),
(4, 3, 0x3132372e302e, 999.999, 529553497, 0, 'milan@gmail.com', '950+0589', 1234, 'Abuja', 'XAMPP5644milan@gmail.com', 'COD', NULL, '2024-03-19 18:33:00.0000'),
(5, 0, 0x3132372e302e, 999.999, 822051662, 0, 'mla@gmail.com', '9095njkc8', 2147483647, 'New karshi', 'XAMPP4534mla@gmail.com', 'COD', NULL, '2024-03-20 15:11:00.0000'),
(6, 4, 0x3132372e302e, 999.999, 318443159, 0, 'mla@gmail.com', 'mnc898ych', 1234567, 'Abuja', 'XAMPP4412mla@gmail.com', 'COD', NULL, '2024-03-20 15:12:00.0000'),
(7, 0, 0x3132372e302e, 999.999, 1142424360, 0, 'mla@gmail.com', 'YYy40plm--', 22222, 'Kano', 'XAMPP4634mla@gmail.com', 'COD', NULL, '2024-03-20 15:14:00.0000'),
(8, 4, 0x3132372e302e, 999.999, 281512795, 0, 'mla@gmail.com', 'kjk86ju7f', 567890, 'Jos', 'XAMPP5309mla@gmail.com127.0.0.1', 'COD', NULL, '2024-03-20 15:16:00.0000'),
(9, 5, 0x3132372e302e, 999.999, 1207808015, 0, 'malama@gmail.com', '+8900076YYh-', 1234567, 'New karshi', 'XAMPP5548malama@gmail.com127.0.0.1', 'COD', NULL, '2024-03-20 15:48:00.0000'),
(10, 6, 0x3132372e302e, 999.999, 496757678, 0, 'favorali@gmail.com', '__Y00Y__', 636746729, 'New Karahi', 'XAMPP4554favorali@gmail.com127.0.0.1', 'COD', NULL, '2024-03-26 08:04:00.0000'),
(11, 6, 0x3132372e302e, 999.999, 1906315621, 0, 'mishack@gmail.com', '__Y00Y__', 1234567890, 'New karshi', 'XAMPP4733mishack@gmail.com127.0.0.1', 'COD', NULL, '2024-03-29 08:27:00.0000'),
(12, 6, 0x3132372e302e, 999.999, 1822682486, 0, 'mishack@gmail.com', '++++yury++_jncb', 456789, 'new karshi', 'XAMPP4715mishack@gmail.com127.0.0.1', 'COD', NULL, '2024-03-29 08:27:00.0000');

-- --------------------------------------------------------

--
-- Table structure for table `order_list_items`
--

CREATE TABLE `order_list_items` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varbinary(6) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` decimal(6,3) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_list_items`
--

INSERT INTO `order_list_items` (`order_id`, `user_id`, `ip_address`, `invoice_number`, `product_id`, `product_title`, `product_quantity`, `product_price`, `image`, `date`) VALUES
(1, 1, 0x3132372e302e, 647078420, 12, ' Headphone', 3, 999.000, ' headphone1.jpg', '0000-00-00 00:00:00'),
(1, 1, 0x3132372e302e, 647078420, 11, ' laptop', 9, 999.000, ' laptop1.jpg', '0000-00-00 00:00:00'),
(2, 2, 0x3132372e302e, 194682453, 11, ' laptop', 4, 999.999, ' laptop1.jpg', '0000-00-00 00:00:00'),
(2, 2, 0x3132372e302e, 194682453, 15, ' wrist_watch', 3, 999.999, ' watch1.jpg', '0000-00-00 00:00:00'),
(3, 2, 0x3132372e302e, 232685307, 17, ' coat', 1, 999.999, ' coat1.jpg', '0000-00-00 00:00:00'),
(3, 2, 0x3132372e302e, 232685307, 15, ' wrist_watch', 1, 999.999, ' watch1.jpg', '0000-00-00 00:00:00'),
(4, 3, 0x3132372e302e, 529553497, 18, ' gawn', 2, 999.999, ' gawn1.jpg', '0000-00-00 00:00:00'),
(4, 3, 0x3132372e302e, 529553497, 13, ' MI', 3, 999.999, ' phone1.jpg', '0000-00-00 00:00:00'),
(5, 0, 0x3132372e302e, 822051662, 17, ' coat', 1, 999.999, ' coat1.jpg', '0000-00-00 00:00:00'),
(6, 4, 0x3132372e302e, 318443159, 18, ' gawn', 1, 999.999, ' gawn1.jpg', '0000-00-00 00:00:00'),
(7, 0, 0x3132372e302e, 1142424360, 17, ' coat', 1, 999.999, ' coat1.jpg', '0000-00-00 00:00:00'),
(8, 4, 0x3132372e302e, 281512795, 17, ' coat', 1, 999.999, ' coat1.jpg', '0000-00-00 00:00:00'),
(8, 4, 0x3132372e302e, 281512795, 18, ' gawn', 1, 999.999, ' gawn1.jpg', '0000-00-00 00:00:00'),
(9, 5, 0x3132372e302e, 1207808015, 18, ' gawn', 2, 999.999, ' gawn1.jpg', '0000-00-00 00:00:00'),
(9, 5, 0x3132372e302e, 1207808015, 17, ' coat', 2, 999.999, ' coat1.jpg', '0000-00-00 00:00:00'),
(9, 5, 0x3132372e302e, 1207808015, 16, ' bag', 2, 999.999, ' bag1.jpg', '0000-00-00 00:00:00'),
(10, 6, 0x3132372e302e, 496757678, 13, ' MI', 4, 999.999, ' phone1.jpg', '0000-00-00 00:00:00'),
(10, 6, 0x3132372e302e, 496757678, 16, ' bag', 1, 999.999, ' bag1.jpg', '0000-00-00 00:00:00'),
(11, 6, 0x3132372e302e, 1906315621, 17, ' coat', 1, 999.999, ' coat1.jpg', '0000-00-00 00:00:00'),
(11, 6, 0x3132372e302e, 1906315621, 19, ' tracksuit', 1, 999.999, ' track1.jpg', '0000-00-00 00:00:00'),
(12, 6, 0x3132372e302e, 1822682486, 17, ' coat', 1, 999.999, ' coat1.jpg', '0000-00-00 00:00:00'),
(12, 6, 0x3132372e302e, 1822682486, 19, ' tracksuit', 1, 999.999, ' track1.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `amount` decimal(6,3) NOT NULL,
  `ip_address` varbinary(6) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `catergory` varchar(225) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `slug` varchar(100) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL,
  `image3` varchar(100) NOT NULL,
  `image4` varchar(100) NOT NULL,
  `discount` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `catergory`, `product_title`, `product_price`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `slug`, `image1`, `image2`, `image3`, `image4`, `discount`) VALUES
(11, 'Laptops', 'laptop', 1000.00, 'laptop', 'laptops in available catergories ', 'laptop', 0, 'lap-top', 'laptop1.jpg', 'laptop2.jpg', 'laptop4.jpg', 'laptop5.jpg', NULL),
(12, 'headphone', 'Headphone', 1000.00, 'headphone', 'headphone in all kind of catergory', 'headphone', 0, 'head-phone', 'headphone1.jpg', 'headphone2.jpg', 'headphone4.jpg', 'headphone3.jpg', NULL),
(13, 'Phone', 'MI', 1000.00, 'phone', 'MI phone available in different version', 'phone', 0, 'pho-ne', 'phone1.jpg', 'phone2.jpg', 'phone3.jpg', 'phone4.jpg', NULL),
(14, 'cap', 'Face cap', 1000.00, 'cap', 'cap for all kind of catergories available for sale on affordable pricess', 'cap', 0, 'cap', 'cap1.jpg', 'cap2.jpg', 'cap3.jpg', 'cap6.jpg', NULL),
(15, 'watch', 'wrist_watch', 1000.00, 'watch', 'all available in affordable prices', 'watch', 0, 'wa-tch', 'watch1.jpg', 'watch2.jpg', 'watch3.jpg', 'watch4.jpg', NULL),
(16, 'bags', 'bag', 6589.00, 'bag', 'All kind of fashion bag', 'bags', 0, 'b-a-g', 'bag1.jpg', 'bag2.jpg', 'bag3.jpg', 'bag4.jpg', NULL),
(17, 'coats', 'coat', 5678.00, 'coats', 'All availble coats for all kind of catergories for affordable prices', 'coats', 0, 'coat', 'coat1.jpg', 'coat2.jpg', 'coat3.jpg', 'coat4.jpg', NULL),
(18, 'Gawn', 'gawn', 9999.99, 'gawn', 'Women gawn, white gawn , black gawn, and many more', 'gawn', 0, 'g-a-w-n', 'gawn1.jpg', 'gawn2.jpg', 'gawn3.jpg', 'gawn5.jpg', NULL),
(19, 'Gawn', 'tracksuit', 6898.00, 'TRACKS_SUITS', 'All kind of tracksuit available in all kind of catergories and many more ,,\r\nwhite tracksuit, black tracksuit, and many more... ', 'TRACK', 0, 'track-suits', 'track1.jpg', 'track2.jpg', 'track3.jpg', 'track5.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `ip_address` varbinary(9) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `phone`, `ip_address`, `date`) VALUES
(1, 'mishack', 'mishack@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 123456789, 0x3132372e302e302e31, '2024-03-14 15:25:31'),
(2, 'fidelis', 'Gabriel@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 648758758, 0x3132372e302e302e31, '2024-03-19 22:12:53'),
(3, 'nvj', 'milan@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 758748, 0x3132372e302e302e31, '2024-03-19 22:32:49'),
(4, 'machoga', 'mla@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3456789, 0x3132372e302e302e31, '2024-03-20 07:06:14'),
(5, 'mishack', 'malama@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2147483647, 0x3132372e302e302e31, '2024-03-20 07:47:41'),
(6, 'favor', 'favorali@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3748578, 0x3132372e302e302e31, '2024-03-26 12:03:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catergory`
--
ALTER TABLE `catergory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catergory`
--
ALTER TABLE `catergory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
