-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 12:33 PM
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
-- Database: `ys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `name`, `password`) VALUES
(1, 'Yazdan', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `allnews`
--

CREATE TABLE `allnews` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allnews`
--

INSERT INTO `allnews` (`id`, `name`, `email`) VALUES
(1, 'ayan', 'ystrading15@gmail.com'),
(2, 'Muhammad Yazdan', 'cricketduetdispatch@gmail.com'),
(3, 'ali imran', 'ayan@gmail.com'),
(4, '', ''),
(5, 'Muhammad Yazdan', 'yazdan@gmail.com'),
(6, 'Muhammad Yazdan', 'muhammadyazdan375@gmail.com'),
(7, 'Muhammad Anas', 'anas@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `baned_user`
--

CREATE TABLE `baned_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baned_user`
--

INSERT INTO `baned_user` (`id`, `name`, `email`, `password`) VALUES
(9, 'ayan', 'ystrading15@gmail.com', '123'),
(10, 'ayan', 'ystrading15@gmail.com', '123'),
(11, '', 'ayan@gmail.com', 'gveer'),
(12, '', 'muhammad@gmail.com', 'esdrhb'),
(13, '', 'muhammad@gmail.com', 'esdrhb');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `status`) VALUES
(9, 'Orange Glassware', 1),
(10, 'thermax', 1),
(11, 'cremics', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(20, 'ali imran', 'ystrading15@gmail.com', '+923122718700', 'ok', '2024-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `marqee`
--

CREATE TABLE `marqee` (
  `id` int(11) NOT NULL,
  `status` int(255) NOT NULL,
  `sentence` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marqee`
--

INSERT INTO `marqee` (`id`, `status`, `sentence`) VALUES
(1, 0, 'Subscribe To Our News Letter To Enter Every Month And Win Prizes Find News Letter In Buttom');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--
-- Error reading structure for table ys.news: #1932 - Table &#039;ys.news&#039; doesn&#039;t exist in engine
-- Error reading data for table ys.news: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `ys`.`news`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postal_code` int(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `orders_status` int(255) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `phone`, `city`, `address`, `postal_code`, `total_price`, `payment_type`, `payment_status`, `orders_status`, `added_on`) VALUES
(2, 19, '+923122718700', 'karachi', '123', 123456, '60000', 'cashOnDelivery', 'Pending', 3, '2024-10-21'),
(3, 19, '+923220235506', 'karachi', '123', 432552, '5485', 'cashOnDelivery', 'Pending', 4, '2024-10-21'),
(4, 20, '+923220235506', 'karachi', '123', 432552, '25200', 'cashOnDelivery', 'Pending', 2, '2024-10-21'),
(5, 17, '+923122718700', 'karachi', '123', 432552, '22970', 'cashOnDelivery', 'Complete', 5, '2024-10-22'),
(6, 21, '+923122718700', 'karachi', 'A-154 , Block A , Sheet 27 , Saima Arabian Villas , Surjani , Karachi', 75320, '41485', 'cashOnDelivery', 'Complete', 5, '2024-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `orders_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_qty` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `orders_id`, `product_id`, `product_qty`, `price`) VALUES
(3, 2, 22, '10', '1200'),
(4, 2, 29, '10', '4800'),
(5, 3, 15, '5', '1097'),
(6, 4, 29, '5', '4800'),
(7, 4, 19, '1', '1200'),
(8, 5, 19, '10', '1200'),
(9, 5, 13, '10', '1097'),
(10, 6, 29, '5', '4800'),
(11, 6, 19, '10', '1200'),
(12, 6, 16, '5', '1097');

-- --------------------------------------------------------

--
-- Table structure for table `orders_status`
--

CREATE TABLE `orders_status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_status`
--

INSERT INTO `orders_status` (`id`, `status`) VALUES
(1, 'pending'),
(2, 'processing'),
(3, 'Shipped'),
(4, 'cancel'),
(5, 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `mrp` int(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `paking` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(255) NOT NULL,
  `s_desc` varchar(2000) NOT NULL,
  `l_desc` varchar(2000) NOT NULL,
  `meta_t` varchar(2000) NOT NULL,
  `meta_k` varchar(2000) NOT NULL,
  `meta_d` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `product_name`, `price`, `mrp`, `qty`, `paking`, `image`, `status`, `s_desc`, `l_desc`, `meta_t`, `meta_k`, `meta_d`) VALUES
(13, 9, 'Flame 280ml', 1097, 900, '45', 'per box 6 pcs', 'business card.png', 1, 'flame', 'flame', 'flame', 'flame', 'flame'),
(14, 9, 'frost 300ml', 1097, 900, '45', 'per box 6 pcs', 'business card.png', 1, 'frost', 'frost', 'frost', 'frost', 'frost'),
(15, 9, 'grand 300ml', 1097, 900, '45', 'per box 6 pcs', 'business card.png', 1, 'grand', 'grand', 'grand', 'grand', 'grand'),
(16, 9, 'Flame 300ml', 1097, 900, '45', 'per box 6 pcs', 'business card.png', 1, 'flame', 'flame', 'flame', 'flame', 'flame'),
(19, 10, 'T2 MS', 1200, 1000, '45', 'per box 6 pcs', 'business card.png', 1, 'THORMOS', 'THORMOS', 'THORMOS', 'THORMOS', 'THORMOS'),
(22, 10, 'T3 CS', 1200, 900, '45', 'per box 6 pcs', 'business card.png', 1, 'THORMOS', 'THORMOS', 'THORMOS', 'THORMOS', 'THORMOS'),
(29, 11, 'ECO STAR COLOUR LINE', 4800, 4000, '50 CTN', 'per box 46 pcs', 'mission.jpeg', 1, 'CUP', 'CUP', 'CUP', 'CUP', 'CUP');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(11, 'Muhammad Yazdan', 'cricketduetdispatch@gmail.com', 'qwe'),
(17, 'ayan', 'ystrading15@gmail.com', '123'),
(18, 'ali imran', 'ayan@gmail.com', '123'),
(19, 'Muhammad Yazdan', 'yazdan@gmail.com', '123'),
(20, 'Muhammad Yazdan', 'muhammadyazdan375@gmail.com', '123'),
(21, 'Muhammad Anas', 'anas@gmail.com', 'qwe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allnews`
--
ALTER TABLE `allnews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baned_user`
--
ALTER TABLE `baned_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marqee`
--
ALTER TABLE `marqee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_status`
--
ALTER TABLE `orders_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `allnews`
--
ALTER TABLE `allnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `baned_user`
--
ALTER TABLE `baned_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `marqee`
--
ALTER TABLE `marqee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders_status`
--
ALTER TABLE `orders_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
