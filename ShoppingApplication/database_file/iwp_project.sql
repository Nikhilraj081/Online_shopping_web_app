-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 05:26 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwp_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(6) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_mobile_no` bigint(10) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `user_state` varchar(50) NOT NULL,
  `user_pincode` int(7) NOT NULL,
  `landmark` varchar(100) DEFAULT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_name`, `user_mobile_no`, `user_address`, `user_city`, `user_state`, `user_pincode`, `landmark`, `user_id`) VALUES
(31, 'Nikhil Raj', 9572730268, 'Bhagwan Bazar', 'Chhapra', 'Bihar', 841301, 'Rajendra Convent School', 'nraj081@gmail.com'),
(32, 'nikhil raj', 9572730268, 'Bhagwan Bazar', 'Chhapra', 'Bihar', 841301, '', 'nikhilraj081@gmail.com'),
(33, 'ganesh trivedi', 1234567890, 'masumganj chhapra', 'Chhapra', 'Bihar', 841301, '', 'ganeshtrivedi1502@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` varchar(100) NOT NULL,
  `product_price` int(10) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `cart_id` int(5) NOT NULL,
  `size` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`, `product_price`, `user_id`, `cart_id`, `size`) VALUES
('pro0033', 900, 'nraj081@gmail.com', 156, 'free'),
('pro0039', 900, 'nraj081@gmail.com', 157, 'small'),
('pro0032', 700, 'ganeshtrivedi1502@gmail.com', 158, 'free'),
('pro0039', 900, 'ganeshtrivedi1502@gmail.com', 160, 'medium');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_id` varchar(30) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_category` varchar(20) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_price` int(5) NOT NULL,
  `product_color` varchar(10) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `size1` varchar(7) DEFAULT NULL,
  `size2` varchar(7) DEFAULT NULL,
  `size3` varchar(7) DEFAULT NULL,
  `size4` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_id`, `product_name`, `product_category`, `product_brand`, `product_price`, `product_color`, `product_image`, `size1`, `size2`, `size3`, `size4`) VALUES
(31, 'pro0031', 'saree', 'saree', 'laxmipati', 1000, 'black', 'product_image/2497sr03-463.jpg', '', '', '', 'free'),
(32, 'pro0032', 'saree', 'saree', 'sejal', 700, 'black', 'product_image/-473Wx593H-462138520-black-MODEL.jpg', '', '', '', 'free'),
(33, 'pro0033', 'saree', 'saree', 'vimal', 900, 'black', 'product_image/woven-border-art-silk-saree-in-black-v1-sjra1575 (1).jpg', '', '', '', 'free'),
(34, 'pro0034', 'saree', 'saree', 'laxmipati', 1300, 'black', 'product_image/0078830_glamorous-black-saree-with-zari-work.jpeg', '', '', '', 'free'),
(35, 'pro0035', 'saree', 'saree', 'sejal', 1500, 'black', 'product_image/black-saree-500x500.jpg', '', '', '', 'free'),
(36, 'pro0036', 'saree', 'saree', 'vimal', 700, 'black', 'product_image/6524dd3fd48c6698fa6f681b4aee0fe6.jpg', '', '', '', 'free'),
(37, 'pro0037', 'saree', 'saree', 'laxmipati', 1000, 'black', 'product_image/-473Wx593H-461508819-black-MODEL.jpg', '', '', '', 'free'),
(38, 'pro0038', 'jeans', 'jeans', 'ivans', 700, 'black', 'product_image/351c76792125bf3dd0820bcf5828e9c0.jpg', 'small', 'medium', 'large', ''),
(39, 'pro0039', 'jeans', 'jeans', 'levis', 900, 'black', 'product_image/men-27s-black-slim-fit-stretchable-denim-fabric-with-silky-finish-500x500.jpg', 'small', 'medium', 'large', ''),
(40, 'pro0040', 'jeans', 'jeans', 'spark', 300, 'black', 'product_image/445711-2937957.jpg', 'small', 'medium', 'large', ''),
(41, 'pro0041', 'jeans', 'jeans', 'ivans', 900, 'black', 'product_image/81bf5f878aeb2c52e9266a708aea5606.jpg', 'small', 'medium', 'large', ''),
(43, 'pro0043', 'jeans', 'jeans', 'ivans', 700, 'black', 'product_image/-473Wx593H-460635736-black-MODEL.jpg', 'small', 'medium', 'large', ''),
(44, 'pro0044', 'jeans', 'jeans', 'spark', 1500, 'black', 'product_image/40-jog-hps-black-urbano-fashion-original-imaewxe7fgyx7u28.jpeg', 'small', 'medium', 'large', ''),
(45, 'pro0045', 'jeans', 'jeans', 'spark', 900, 'black', 'product_image/351c76792125bf3dd0820bcf5828e9c0.jpg', 'small', 'medium', 'large', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

CREATE TABLE `purchased` (
  `purchase_id` int(6) NOT NULL,
  `purchase_price` int(6) NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_time` time NOT NULL,
  `purchase_status` varchar(100) NOT NULL,
  `product_size` varchar(7) DEFAULT NULL,
  `product_id` varchar(10) NOT NULL,
  `address_id` int(6) NOT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchased`
--

INSERT INTO `purchased` (`purchase_id`, `purchase_price`, `purchase_date`, `purchase_time`, `purchase_status`, `product_size`, `product_id`, `address_id`, `user_id`) VALUES
(253, 700, '2021-05-21', '09:18:54', 'YOUR ORDER HAS BEEN PLACED', 'medium', 'pro0038', 31, 'nraj081@gmail.com'),
(254, 300, '2021-05-21', '11:05:07', 'YOUR ORDER HAS BEEN PLACED', '', 'pro0040', 32, 'nikhilraj081@gmail.com'),
(255, 700, '2021-05-21', '11:05:08', 'YOUR ORDER HAS BEEN PLACED', '', 'pro0032', 32, 'nikhilraj081@gmail.com'),
(256, 900, '2021-05-23', '18:30:08', 'YOUR ORDER HAS BEEN PLACED', '', 'pro0033', 31, 'nraj081@gmail.com'),
(257, 900, '2021-05-23', '18:30:08', 'YOUR ORDER HAS BEEN PLACED', '', 'pro0039', 31, 'nraj081@gmail.com'),
(258, 700, '2021-08-07', '19:35:44', 'YOUR ORDER HAS BEEN PLACED', '', 'pro0032', 33, 'ganeshtrivedi1502@gmail.com'),
(259, 700, '2021-08-07', '19:37:15', 'YOUR ORDER HAS BEEN PLACED', '', 'pro0032', 33, 'ganeshtrivedi1502@gmail.com'),
(260, 900, '2021-08-07', '19:37:16', 'YOUR ORDER HAS BEEN PLACED', '', 'pro0039', 33, 'ganeshtrivedi1502@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(100) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_mobile` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_pass`, `user_name`, `user_mobile`) VALUES
('amitkumargupta.143.ak@gmail.com', 'Amit@9128', 'amit kumar', 8787676756),
('ganeshtrivedi1502@gmail.com', 'GANesh@50', 'ganesh trivedi', 9572730268),
('nikhilraj081@gmail.com', 'Nikh@1234', 'nikhil raj', 9572730268),
('nraj081@gmail.com', 'Nikh@1234', 'nikhil raj', 9572730268),
('roushan@gmail.com', '123456', 'roushan raj', 9878675676),
('roushank@gmail.com', 'Rous1234@#', 'roushan', 7656787987);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `purchased`
--
ALTER TABLE `purchased`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `purchased_ibfk_1` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `purchased`
--
ALTER TABLE `purchased`
  MODIFY `purchase_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `purchased`
--
ALTER TABLE `purchased`
  ADD CONSTRAINT `purchased_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `purchased_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`),
  ADD CONSTRAINT `purchased_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
