-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2018 at 12:23 PM
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
-- Table structure for table `cateogory`
--

CREATE TABLE `cateogory` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_description` varchar(200) NOT NULL,
  `cat_created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cateogory`
--

INSERT INTO `cateogory` (`cat_id`, `cat_name`, `cat_description`, `cat_created_at`) VALUES
(1, 'ROD', '', '2018-10-27'),
(2, 'CEMENT', '', '2018-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `p_brand`
--

CREATE TABLE `p_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_brand`
--

INSERT INTO `p_brand` (`brand_id`, `brand_name`) VALUES
(1, 'HOLCIM'),
(13, 'Fresh Regular'),
(6, 'Meghnacem Deluxe'),
(5, 'RAHIM STEEL'),
(7, 'Supercrete'),
(8, 'Seven Ring Regular'),
(9, 'Seven Ring Special'),
(10, 'Seven Ring gold'),
(11, 'Meghnacem Deluxe special'),
(12, 'Meghnacem Deluxe super'),
(14, 'Fresh special'),
(15, 'Fresh Gold');

-- --------------------------------------------------------

--
-- Table structure for table `p_size`
--

CREATE TABLE `p_size` (
  `pro_size_id` int(11) NOT NULL,
  `pro_size_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_size`
--

INSERT INTO `p_size` (`pro_size_id`, `pro_size_name`) VALUES
(6, '10mm 40G 300W'),
(5, '8mm 40G 300W'),
(7, '12mm 40G 300W'),
(8, '16mm 40G 300W'),
(9, '8mm 72.5G 500W'),
(11, '10mm 72.5G 500W'),
(12, '12mm 72.5G 500W'),
(13, '16mm 72.5G 500W'),
(14, '20mm 40G 300W'),
(15, '20mm 72.5G 500W');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cateogory`
--
ALTER TABLE `cateogory`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `p_brand`
--
ALTER TABLE `p_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `p_size`
--
ALTER TABLE `p_size`
  ADD PRIMARY KEY (`pro_size_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cateogory`
--
ALTER TABLE `cateogory`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `p_brand`
--
ALTER TABLE `p_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `p_size`
--
ALTER TABLE `p_size`
  MODIFY `pro_size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
