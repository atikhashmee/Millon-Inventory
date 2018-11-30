-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2018 at 12:27 PM
-- Server version: 10.2.17-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `httpmeghnagroups_millondatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `p_id` int(11) NOT NULL,
  `pro_id` varchar(200) NOT NULL,
  `product_cat` varchar(200) NOT NULL,
  `brand_id` varchar(10) NOT NULL,
  `size_id` varchar(10) NOT NULL,
  `unit` int(200) NOT NULL,
  `opening_stock` varchar(200) NOT NULL,
  `purchase_price` varchar(200) NOT NULL,
  `selling_price` varchar(200) NOT NULL,
  `re_order_warning` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`p_id`, `pro_id`, `product_cat`, `brand_id`, `size_id`, `unit`, `opening_stock`, `purchase_price`, `selling_price`, `re_order_warning`, `description`, `created_at`) VALUES
(1, 'P001', '2', '1', '1', 2, '400', '500', '550', '100', '', '2018-11-28'),
(2, 'P002', '2', '2', '2', 2, '400', '500', '550', '30', '', '2018-10-29'),
(3, '123432', '1', '1', '1', 1, '90', '660', '5534', '10', '', '2018-11-10'),
(4, '435654', '2', '3', '2', 1, '1234', '545', '565', '50', '', '2018-11-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
