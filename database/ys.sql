-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 12:52 PM
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
-- Table structure for table `baned_user`
--

CREATE TABLE `baned_user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baned_user`
--

INSERT INTO `baned_user` (`id`, `name`, `email`, `password`) VALUES
(9, 'ayan', 'ystrading15@gmail.com', '123'),
(10, 'ayan', 'ystrading15@gmail.com', '123');

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
  `id` int(255) NOT NULL,
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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
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
(11, 9, 'Frost 280ml', 1097, 900, '4500 box', 'per box 6 pcs', 'Pi7_Passport_Photo (1).jpeg', 1, 'frost', 'frost', 'frost', 'frost', 'frost'),
(12, 9, 'Grand 280ml', 1097, 900, '45', '', 'log-removebg-preview.png', 1, 'grand', 'grand', 'grand', 'grand', 'grand'),
(13, 9, 'Flame 280ml', 1097, 900, '45', '', 'log-removebg-preview.png', 1, 'flame', 'flame', 'flame', 'flame', 'flame'),
(14, 9, 'frost 300ml', 1097, 900, '45', '', 'log-removebg-preview.png', 1, 'frost', 'frost', 'frost', 'frost', 'frost'),
(15, 9, 'grand 300ml', 1097, 900, '45', '', 'log-removebg-preview.png', 1, 'grand', 'grand', 'grand', 'grand', 'grand'),
(16, 9, 'Flame 300ml', 1097, 900, '45', '', 'log-removebg-preview.png', 1, 'flame', 'flame', 'flame', 'flame', 'flame'),
(17, 10, 'T1 MS', 1200, 1000, '45', '', 'business card.png', 1, 'THORMOS', 'THORMOS', 'THORMOS', 'THORMOS', 'THORMOS'),
(18, 10, 'T1 CS', 1200, 1000, '45', '', 'business card.png', 1, 'THORMOS', 'THORMOS', 'THORMOS', 'THORMOS', 'THORMOS'),
(19, 10, 'T2 MS', 1200, 1000, '45', '', 'business card.png', 1, 'THORMOS', 'THORMOS', 'THORMOS', 'THORMOS', 'THORMOS'),
(20, 10, 'T2 CS', 1200, 1000, '45', '', 'business card.png', 1, 'THORMOS', 'THORMOS', 'THORMOS', 'THORMOS', 'THORMOS'),
(21, 10, 'T3 MS', 1200, 1000, '45', '', 'business card.png', 1, 'THORMOS', 'THORMOS', 'THORMOS', 'THORMOS', 'THORMOS'),
(22, 10, 'T3 CS', 1200, 900, '45', '', 'business card.png', 1, 'THORMOS', 'THORMOS', 'THORMOS', 'THORMOS', 'THORMOS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(11, 'Muhammad Yazdan', 'cricketduetdispatch@gmail.com', 'qwe'),
(12, '', 'muhammad@gmail.com', 'esdrhb'),
(13, '', 'muhammad@gmail.com', 'esdrhb'),
(14, '', 'ayan@gmail.com', 'gveer'),
(17, 'ayan', 'ystrading15@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
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
-- AUTO_INCREMENT for table `baned_user`
--
ALTER TABLE `baned_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
