-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 08:08 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `millon`
--

-- --------------------------------------------------------

--
-- Table structure for table `acccount_category`
--

CREATE TABLE `acccount_category` (
  `category_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acccount_category`
--

INSERT INTO `acccount_category` (`category_id`, `type`, `name`, `created_at`, `updated_at`) VALUES
(1, 'liability', 'Cash And Bank Accounts', '2018-11-25', '0');

-- --------------------------------------------------------

--
-- Table structure for table `banktransfer`
--

CREATE TABLE `banktransfer` (
  `transferid` int(11) NOT NULL,
  `transerdate` varchar(200) NOT NULL,
  `to` varchar(200) NOT NULL,
  `from` varchar(200) NOT NULL,
  `amounts` varchar(200) NOT NULL,
  `carreier` varchar(200) NOT NULL,
  `addedby` varchar(200) NOT NULL,
  `bycashcheque` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banktransfer`
--

INSERT INTO `banktransfer` (`transferid`, `transerdate`, `to`, `from`, `amounts`, `carreier`, `addedby`, `bycashcheque`) VALUES
(1, '2018-11-18', '1', '1', '500', 'Millon', '36', 'Cash'),
(2, '2018-11-18', '1', '1', '500', 'Millon', '36', 'Cheque');

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
(1, 'ROD', '', '2018-12-10'),
(2, 'CEMENT', '', '2018-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `charts_accounts`
--

CREATE TABLE `charts_accounts` (
  `charts_id` int(11) NOT NULL,
  `main_cat_id` varchar(255) NOT NULL,
  `chart_name` varchar(200) NOT NULL,
  `accountno` varchar(200) NOT NULL,
  `contactperson` varchar(200) NOT NULL,
  `contactnumber` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `opening_balance` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL DEFAULT '002'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charts_accounts`
--

INSERT INTO `charts_accounts` (`charts_id`, `main_cat_id`, `chart_name`, `accountno`, `contactperson`, `contactnumber`, `email`, `address`, `opening_balance`, `created_at`, `updated_at`) VALUES
(1, '1', 'Cash', '3452352653656', 'Kamal', '01735623513', 'atikhashmee6235@gmail.com', 'feni, feni2', '50000', '2018-12-10', '002');

-- --------------------------------------------------------

--
-- Table structure for table `cheque`
--

CREATE TABLE `cheque` (
  `chequeno` int(11) NOT NULL,
  `parent_table_id` varchar(200) NOT NULL,
  `customerid` varchar(200) NOT NULL,
  `accountno` varchar(200) NOT NULL,
  `bankname` varchar(200) NOT NULL,
  `expiredate` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `fromtable` varchar(200) NOT NULL,
  `approve` int(10) NOT NULL DEFAULT '0',
  `carrier` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cheque`
--

INSERT INTO `cheque` (`chequeno`, `parent_table_id`, `customerid`, `accountno`, `bankname`, `expiredate`, `amount`, `userid`, `fromtable`, `approve`, `carrier`) VALUES
(1, '0', '26', '4325423454', 'BRAC Bank Limited', '2018-11-18', '500', '36', 'minus', 0, 'Millon'),
(2, '0', '', '4325423454', '1', '2018-11-18', '500', '36', 'default', 0, ''),
(3, '0', '16', '234567', 'Agrani Bank Limited', '2018-11-25', '500', '36', 'add', 0, 'Millon'),
(5, '3', '', '', 'BASIC Bank Limited', '2018-11-25', '500', '36', 'minus', 0, 'Millon'),
(6, '0', '27', '4325423454', 'BRAC Bank Limited', '2018-11-25', '500', '36', 'minus', 0, 'Millon'),
(8, 'rac_5', '18', '234567', 'Agrani Bank Limited', '2018-11-28', '5050', '36', 'add', 2, 'Millon'),
(9, 'pts_7', '26', '4535324', 'Citibank N.A', '2018-11-28', '510', '36', 'minus', 2, 'Millon'),
(10, 'rac_7', '22', '234567', 'Agrani Bank Limited', '2018-12-10', '8000', '36', 'add', 0, 'Millon');

-- --------------------------------------------------------

--
-- Table structure for table `employeesalerlist`
--

CREATE TABLE `employeesalerlist` (
  `emsaleryid` int(11) NOT NULL,
  `skeysids` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `employeeid` varchar(200) NOT NULL,
  `bankname` varchar(200) NOT NULL,
  `accountno` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeesalerlist`
--

INSERT INTO `employeesalerlist` (`emsaleryid`, `skeysids`, `amount`, `employeeid`, `bankname`, `accountno`) VALUES
(1, '1', '5000', '37', 'Bangladesh Commerce Bank Limited', '3452352653656'),
(2, '2', '200', '37', 'Bangladesh Commerce Bank Limited', '3452352653656'),
(3, '3', '300', '37', 'Bangladesh Commerce Bank Limited', '3452352653656'),
(4, '4', '1500', '37', 'Bangladesh Commerce Bank Limited', '3452352653656'),
(5, '1', '50000', '14', 'Bank Al-Falah Limited', '123456674243545'),
(6, '2', '5000', '14', 'Bank Al-Falah Limited', '123456674243545'),
(7, '3', '2000', '14', 'Bank Al-Falah Limited', '123456674243545'),
(8, '4', '1000', '14', 'Bank Al-Falah Limited', '123456674243545'),
(9, '1', '5000', '38', 'Bangladesh Commerce Bank Limited', '3452352653656'),
(10, '2', '50000', '38', 'Bangladesh Commerce Bank Limited', '3452352653656'),
(55, '1', '5000', '13', 'Agrani Bank Limited', '3452352653656'),
(56, '2', '700', '13', 'Agrani Bank Limited', '3452352653656'),
(57, '3', '600', '13', 'Agrani Bank Limited', '3452352653656'),
(58, '5', '800', '13', 'Agrani Bank Limited', '3452352653656'),
(59, '1', '50000', '1', 'Bangladesh Krishi Bank', '123456674243545'),
(60, '2', '1300', '1', 'Bangladesh Krishi Bank', '123456674243545'),
(61, '3', '5000', '1', 'Bangladesh Krishi Bank', '123456674243545'),
(62, '4', '250', '1', 'Bangladesh Krishi Bank', '123456674243545'),
(63, '5', '450', '1', 'Bangladesh Krishi Bank', '123456674243545'),
(64, '1', '700', '40', 'Bangladesh Commerce Bank Limited', '123456'),
(65, '2', '300', '40', 'Bangladesh Commerce Bank Limited', '123456'),
(66, '3', '400', '40', 'Bangladesh Commerce Bank Limited', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `employeetype`
--

CREATE TABLE `employeetype` (
  `et_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeetype`
--

INSERT INTO `employeetype` (`et_id`, `name`) VALUES
(1, 'Sales Man'),
(2, 'Accounts'),
(3, 'Driver'),
(4, 'Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `expenseid` int(11) NOT NULL,
  `expendituredate` varchar(200) NOT NULL,
  `expensecatid` varchar(200) NOT NULL,
  `accountsid` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `employeeid` varchar(200) NOT NULL DEFAULT '-1',
  `employeetype` varchar(200) NOT NULL DEFAULT '0',
  `addedby` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`expenseid`, `expendituredate`, `expensecatid`, `accountsid`, `amount`, `employeeid`, `employeetype`, `addedby`) VALUES
(2, '2018-10-29', '4', '1', '500', '', 'yes', '36'),
(3, '2018-11-28', '3', '1', '500', '13', 'no', '36'),
(4, '2018-11-28', '2', '1', '5000', '', 'no', '36'),
(5, '2018-12-10', '2', '1', '5000', '-1', '0', '36'),
(6, '2018-12-10', '3', '1', '5000', '13', '1', '36');

-- --------------------------------------------------------

--
-- Table structure for table `expensecat`
--

CREATE TABLE `expensecat` (
  `excat_id` int(11) NOT NULL,
  `ex_name` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expensecategory`
--

CREATE TABLE `expensecategory` (
  `excate_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL DEFAULT '002'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expensecategory`
--

INSERT INTO `expensecategory` (`excate_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Current Bill', '2018-10-29', '002'),
(2, 'Shop rent', '2018-10-29', '002'),
(3, 'Snacks', '2018-10-29', '002'),
(4, 'Labour', '2018-11-25', '002');

-- --------------------------------------------------------

--
-- Table structure for table `e_payment_salery`
--

CREATE TABLE `e_payment_salery` (
  `payment_id` int(11) NOT NULL,
  `payment_date` varchar(200) NOT NULL,
  `amount_pay` varchar(200) NOT NULL,
  `payment_due` varchar(200) NOT NULL,
  `employeeid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_payment_salery`
--

INSERT INTO `e_payment_salery` (`payment_id`, `payment_date`, `amount_pay`, `payment_due`, `employeeid`) VALUES
(1, '2018-10-31', '7000', '', '37'),
(2, '2018-10-31', '58000', '', '14'),
(3, '2018-10-31', '58000', '', '14'),
(4, '2018-10-31', '58000', '', '14'),
(5, '2018-11-19', '55000', '0', '38'),
(6, '2018-11-27', '57000', '0', '1'),
(7, '2018-12-10', '1400', '0', '40');

-- --------------------------------------------------------

--
-- Table structure for table `e_salerykeys`
--

CREATE TABLE `e_salerykeys` (
  `salery_key_id` int(11) NOT NULL,
  `keysname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_salerykeys`
--

INSERT INTO `e_salerykeys` (`salery_key_id`, `keysname`) VALUES
(1, 'Basic'),
(2, 'Oil'),
(3, 'Home'),
(4, 'Accomodation'),
(5, 'Medical');

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
(1, 'P001', '2', '1', '7', 2, '400', '500', '550', '100', '', '2018-11-28'),
(2, 'P002', '1', '5', '6', 1, '400', '500', '550', '30', '', '2018-11-29'),
(3, '123432', '1', '1', '14', 1, '90', '660', '5534', '10', '', '2018-11-28'),
(4, '435654', '2', '9', '11', 1, '1234', '545', '565', '50', '', '2018-11-29'),
(5, 'P107', '1', '5', '6', 1, '400', '500', '550', '30', '', '2018-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `billchallan` varchar(200) NOT NULL,
  `purchasedate` varchar(200) NOT NULL,
  `supplier` varchar(200) NOT NULL,
  `productid` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `vat` varchar(200) NOT NULL,
  `payment_taka` varchar(200) NOT NULL,
  `comission` varchar(200) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `purchaseentryby` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL DEFAULT 'p'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `billchallan`, `purchasedate`, `supplier`, `productid`, `quantity`, `price`, `weight`, `transport`, `vat`, `payment_taka`, `comission`, `discount`, `purchaseentryby`, `token`) VALUES
(4, '20181130103819', '2018-11-30', '25', '123432', '50', '580', '500', '3000', '10', '28500', '3', '500', '36', 'p'),
(6, '2018113011313', '2018-11-30', '28', 'P001', '50', '580', '500', '3000', '10', '67300', '3', '500', '36', 'p'),
(7, '2018113011313', '2018-11-30', '28', '123432', '50', '580', '500', '3000', '10', '67300', '3', '500', '36', 'p'),
(17, '20181130185559', '2018-11-30', '28', '435654', '54', '567', '500', '3000', '10', '84581', '3', '500', '36', 'p'),
(18, '20181130185559', '2018-11-30', '28', 'P001', '76', '567', '500', '3000', '10', '84581', '3', '500', '36', 'p'),
(25, '2018113011142', '2018-11-30', '26', 'P002', '50', '580', '500', '3000', '10', '28500', '3', '500', '36', 'p'),
(26, '2018113011142', '2018-11-30', '26', '435654', '50', '580', '500', '3000', '10', '28500', '3', '500', '36', 'p'),
(27, '2018113011142', '2018-11-30', '26', 'P001', '50', '580', '500', '3000', '10', '28500', '3', '500', '36', 'p'),
(28, '2018121232641', '2018-12-01', '26', '123432', '55', '580', '500', '3000', '10', '67400', '3', '500', '36', 'p'),
(29, '2018121232641', '2018-12-01', '26', 'P002', '60', '600', '500', '3000', '10', '67400', '3', '500', '36', 'p'),
(31, '2018123134916', '2018-12-03', '28', 'P002', '50', '580', '500', '3000', '10', '34030', '3', '500', '36', 'p'),
(32, '2018123134916', '2018-12-03', '28', 'P001', '50', '580', '500', '3000', '10', '34030', '3', '500', '36', 'p'),
(37, '201812412920', '2018-12-04', '27', 'P002', '50', '580', '500', '3000', '10', '127120', '3', '500', '36', 'p'),
(38, '201812412920', '2018-12-04', '27', 'P001', '50', '580', '500', '3000', '10', '127120', '3', '500', '36', 'p'),
(39, '201812412920', '2018-12-04', '27', '123432', '50', '580', '500', '3000', '10', '127120', '3', '500', '36', 'p'),
(40, '201812412920', '2018-12-04', '27', '435654', '50', '580', '500', '3000', '10', '127120', '3', '500', '36', 'p'),
(41, '20181210125912', '2018-12-10', '', 'P002', '360', '580', '500', '3000', '10', '0', '3', '500', '36', 'p'),
(42, '2018121013025', '2018-12-10', '', 'P002', '720', '580', '500', '3000', '10', '0', '3', '500', '36', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return`
--

CREATE TABLE `purchase_return` (
  `pr_id` int(11) NOT NULL,
  `memono` varchar(200) NOT NULL,
  `productid` varchar(200) NOT NULL,
  `supplierId` varchar(200) NOT NULL,
  `quntity` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `vat` varchar(200) NOT NULL DEFAULT '0',
  `discount` varchar(200) NOT NULL DEFAULT '0',
  `return_date` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL DEFAULT 'pr'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_return`
--

INSERT INTO `purchase_return` (`pr_id`, `memono`, `productid`, `supplierId`, `quntity`, `price`, `weight`, `transport`, `vat`, `discount`, `return_date`, `token`) VALUES
(6, '20181130185559', '435654', '28', '40', '567', '200', '200', '0', '0', '2018-11-30', 'pr'),
(7, '201812412920', '435654', '27', '90', '580', '200', '200', '0', '0', '2018-12-04', 'pr'),
(8, '2018113011313', '123432', '28', '30', '580', '200', '300', '0', '0', '2018-11-30', 'pr');

-- --------------------------------------------------------

--
-- Table structure for table `p_brand`
--

CREATE TABLE `p_brand` (
  `brand_id` int(11) NOT NULL,
  `cate_id` varchar(200) NOT NULL,
  `brand_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_brand`
--

INSERT INTO `p_brand` (`brand_id`, `cate_id`, `brand_name`) VALUES
(1, '2', 'HOLCIM'),
(13, '2', 'Fresh Regular'),
(6, '1', 'Meghnacem Deluxe'),
(5, '1', 'RAHIM STEEL'),
(7, '2', 'Supercrete'),
(8, '1', 'Seven Ring Regular'),
(9, '1', 'Seven Ring Special'),
(10, '1', 'Seven Ring gold'),
(11, '1', 'Meghnacem Deluxe special'),
(12, '', 'Meghnacem Deluxe super'),
(14, '', 'Fresh special'),
(15, '', 'Fresh Gold');

-- --------------------------------------------------------

--
-- Table structure for table `p_size`
--

CREATE TABLE `p_size` (
  `pro_size_id` int(11) NOT NULL,
  `cat_id` varchar(200) NOT NULL,
  `brandid` varchar(200) NOT NULL,
  `pro_size_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_size`
--

INSERT INTO `p_size` (`pro_size_id`, `cat_id`, `brandid`, `pro_size_name`) VALUES
(6, '1', '5', '10mm 40G 300W'),
(5, '1', '5', '8mm 40G 300W'),
(7, '1', '6', '12mm 40G 300W'),
(8, '1', '6', '16mm 40G 300W'),
(9, '1', '6', '8mm 72.5G 500W'),
(11, '1', '6', '10mm 72.5G 500W'),
(12, '1', '5', '12mm 72.5G 500W'),
(13, '1', '6', '16mm 72.5G 500W'),
(14, '1', '6', '20mm 40G 300W'),
(15, '1', '6', '20mm 72.5G 500W'),
(16, '1', '6', '10mm 40G 300W');

-- --------------------------------------------------------

--
-- Table structure for table `recevecollection`
--

CREATE TABLE `recevecollection` (
  `recol_id` int(11) NOT NULL,
  `recievedate` varchar(200) NOT NULL,
  `cusotmer_id` varchar(200) NOT NULL,
  `amounts` varchar(200) NOT NULL,
  `carreier` varchar(200) NOT NULL,
  `adjustment` varchar(200) NOT NULL,
  `addedby` varchar(200) NOT NULL,
  `bycashcheque` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recevecollection`
--

INSERT INTO `recevecollection` (`recol_id`, `recievedate`, `cusotmer_id`, `amounts`, `carreier`, `adjustment`, `addedby`, `bycashcheque`) VALUES
(1, '2018-11-18', '15', '500', 'Millon', '0', '36', 'Cash'),
(2, '2018-11-25', '16', '500', 'Millon', '0', '36', 'Cheque'),
(5, '2018-11-28', '18', '5050', 'Millon', '0', '36', 'Cheque'),
(6, '2018-12-10', '16', '4000', 'Millon', '0', '36', 'Cash'),
(7, '2018-12-10', '22', '8000', 'Millon', '0', '36', 'Cheque');

-- --------------------------------------------------------

--
-- Table structure for table `role_base_access_system`
--

CREATE TABLE `role_base_access_system` (
  `rbas_id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `pagename` varchar(200) NOT NULL,
  `roles` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_base_access_system`
--

INSERT INTO `role_base_access_system` (`rbas_id`, `user_id`, `pagename`, `roles`) VALUES
(10, '1', '1', '0'),
(11, '1', '1', '1'),
(12, '1', '1', '2'),
(13, '1', '2', '1'),
(14, '1', '3', '2'),
(15, '15', '9', '0'),
(16, '15', '9', '1'),
(17, '15', '9', '2'),
(18, '15', '9', '3'),
(19, '15', '10', '0'),
(20, '15', '10', '1'),
(21, '15', '10', '2'),
(22, '15', '11', '0'),
(23, '15', '11', '1'),
(24, '15', '11', '2');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `sellid` int(11) NOT NULL,
  `selldate` varchar(200) NOT NULL,
  `billchallan` varchar(200) NOT NULL,
  `customerid` varchar(200) NOT NULL,
  `productid` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `vat` varchar(200) NOT NULL,
  `payment_taka` varchar(200) NOT NULL,
  `comission` varchar(200) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `sellby` int(200) NOT NULL,
  `token` varchar(200) NOT NULL DEFAULT 's'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`sellid`, `selldate`, `billchallan`, `customerid`, `productid`, `quantity`, `price`, `weight`, `transport`, `vat`, `payment_taka`, `comission`, `discount`, `sellby`, `token`) VALUES
(5, '2018-11-01', '2018111221632', '17', 'P002', '50', '580', '500', '3000', '10', '28500', '', '500', 38, 's'),
(6, '2018-11-01', '2018111221659', '19', 'P001', '50', '580', '500', '3000', '10', '28500', '', '500', 38, 's'),
(7, '2018-11-26', '20181126114059', '24', 'P001', '50', '580', '500', '3000', '10', '67300', '5', '500', 13, 's'),
(8, '2018-11-26', '20181126114059', '24', 'P002', '50', '580', '500', '3000', '10', '67300', '5', '500', 13, 's'),
(13, '2018-11-30', '201811301160', '33', 'P001', '50', '580', '500', '3000', '10', '35400', '3', '500', 0, 's'),
(24, '2018-12-01', '201811122127', '18', 'P002', '50', '580', '500', '3000', '10', '28500', '3', '500', 1, 's'),
(25, '2018-12-01', '201811122127', '18', '123432', '50', '580', '500', '3000', '10', '28500', '3', '500', 1, 's'),
(26, '2018-12-01', '201811122127', '18', '435654', '50', '580', '500', '3000', '10', '28500', '3', '500', 1, 's'),
(27, '2018-12-01', '201811122127', '18', 'P001', '50', '580', '500', '3000', '10', '28500', '3', '500', 1, 's'),
(28, '2018-12-01', '201810300326', '17', 'P001', '30', '580', '220', '430', '2', '18298', '0', '0', 1, 's'),
(29, '2018-12-01', '201810300326', '17', 'R007', '700', '580', '220', '430', '2', '18298', '0', '0', 1, 's'),
(30, '2018-12-01', '2018103003023', '18', 'P001', '25', '560', '120', '230', '2', '14000', '0', '0', 1, 's'),
(31, '2018-12-01', '2018103003023', '18', 'R007', '60', '580', '120', '230', '2', '14000', '0', '0', 1, 's'),
(34, '2018-12-02', '201812293342', '32', '123432', '50', '780', '500', '3000', '10', '', '3', '500', 0, 's'),
(35, '2018-12-03', '20181231401', '35', '123432', '50', '580', '500', '3000', '10', '34030', '3', '500', 0, 's'),
(37, '2018-12-03', '2018123144638', '35', 'P002', '50', '580', '500', '3000', '10', '', '3', '500', 0, 's'),
(38, '2018-12-03', '2018123144638', '35', '123432', '50', '580', '500', '3000', '10', '', '3', '500', 0, 's'),
(39, '2018-12-04', '201812413652', '34', 'P002', '50', '580', '500', '3000', '10', '185700', '5', '500', 0, 's'),
(40, '2018-12-04', '201812413652', '34', '123432', '50', '580', '500', '3000', '10', '185700', '5', '500', 0, 's'),
(41, '2018-12-04', '201812413652', '34', 'P001', '50', '580', '500', '3000', '10', '185700', '5', '500', 0, 's'),
(42, '2018-12-04', '201812413652', '34', '435654', '50', '580', '500', '3000', '10', '185700', '5', '500', 0, 's'),
(43, '2018-12-10', '2018121013335', '16', 'P002', '1440', '580', '500', '3000', '10', '0', '3', '500', 0, 's');

-- --------------------------------------------------------

--
-- Table structure for table `sell_return`
--

CREATE TABLE `sell_return` (
  `sr_id` int(11) NOT NULL,
  `memono` varchar(200) NOT NULL,
  `customerid` varchar(200) NOT NULL,
  `productid` varchar(200) NOT NULL,
  `quntity` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `vat` varchar(200) NOT NULL DEFAULT '0',
  `discount` varchar(200) NOT NULL DEFAULT '0',
  `return_date` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL DEFAULT 'sr',
  `takenby` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell_return`
--

INSERT INTO `sell_return` (`sr_id`, `memono`, `customerid`, `productid`, `quntity`, `price`, `weight`, `transport`, `vat`, `discount`, `return_date`, `token`, `takenby`) VALUES
(13, '201811122127', '18', '\n                                    HOLCIM-20mm 40G 300W                                 ', '\n                                    40', '\n                                    580                                 ', '20', '30', '0', '0', '', 'sr', '36');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `set_id` int(11) NOT NULL,
  `webtitle` varchar(200) NOT NULL,
  `webname` varchar(200) NOT NULL,
  `fevicon` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `adminid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`set_id`, `webtitle`, `webname`, `fevicon`, `logo`, `adminid`) VALUES
(1, 'Millon-Janata Steel corporation', 'JTSCN', '11282018050813-504-images.jpg', '11282018050813-901-hh.jpg', '36');

-- --------------------------------------------------------

--
-- Table structure for table `supplierpayment`
--

CREATE TABLE `supplierpayment` (
  `pay_id` int(11) NOT NULL,
  `pay_date` varchar(200) DEFAULT NULL,
  `sup_id` varchar(200) DEFAULT NULL,
  `amnts` varchar(200) DEFAULT NULL,
  `carier` varchar(200) DEFAULT NULL,
  `adjument` varchar(200) DEFAULT NULL,
  `inputby` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplierpayment`
--

INSERT INTO `supplierpayment` (`pay_id`, `pay_date`, `sup_id`, `amnts`, `carier`, `adjument`, `inputby`, `status`) VALUES
(1, '2018-11-18', '25', '500', 'Millon', NULL, '36', 'Cash'),
(2, '2018-11-18', '26', '500', 'Millon', NULL, '36', 'Cheque'),
(7, '2018-11-28', '26', '510', 'Millon', NULL, '36', 'Cheque');

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `autoid` int(11) NOT NULL,
  `employee_id` varchar(200) NOT NULL,
  `brandid` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `unit` varchar(200) NOT NULL,
  `commsion` varchar(200) NOT NULL,
  `startdate` varchar(200) NOT NULL,
  `enddate` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`autoid`, `employee_id`, `brandid`, `quantity`, `unit`, `commsion`, `startdate`, `enddate`) VALUES
(1, '1', 'P001', '120', '1', '1200', '2018-10-29', '2018-10-31'),
(2, '1', 'P002', '34', '2', '1500', '2018-10-29', '2018-11-01'),
(3, '38', 'P001', '401', '1', '1400', '2018-11-01', '2018-11-05'),
(4, '38', 'P002', '300', '2', '1500', '2018-11-01', '2018-11-08'),
(5, '37', 'P001', '4', '1', '4', '2018-11-24', '2018-11-30'),
(6, '37', 'P002', '8', '2', '50', '2018-11-21', '2018-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(200) NOT NULL,
  `unit_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_name`, `unit_description`) VALUES
(1, 'kg', ''),
(2, 'Bag', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `user_role` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact_number` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `employeetype` varchar(200) NOT NULL,
  `opening_balance` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `user_role`, `name`, `password`, `email`, `contact_number`, `address`, `employeetype`, `opening_balance`, `created_at`) VALUES
(1, '4', 'Counter 1', 'e10adc3949ba59abbe56e057f20f883e', 'salesman@gmail.com', '01735623513', 'feni\r\nfeni2', '1', '0', '2018-12-10'),
(13, '4', 'IMRAN', 'e10adc3949ba59abbe56e057f20f883e', '', '01912541124', 'HAREZ ROAD, VHATARA, DHAKA', 'ss2', '0', '2018-08-06'),
(15, '4', 'MILON', 'e10adc3949ba59abbe56e057f20f883e', 'atikhashmee6235@gmail.com', '01735623513', 'VHATARA', 'acc1', '0', '2018-11-27'),
(16, '1', 'MR.BASAR', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '4500', '2018-08-07'),
(17, '1', 'AKTER DEWAN', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '88210', '2018-08-07'),
(18, '1', 'ROBIUL VAI', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '15140', '2018-08-07'),
(19, '4', 'SAJON K tui', 'e10adc3949ba59abbe56e057f20f883e', 'sajon@gmail.com', '01856456567', 'HAREZ ROAD, VHATARA, DHAKA', '0', '25468', '2018-11-27'),
(20, '1', 'MONIR', 'e10adc3949ba59abbe56e057f20f883e', 'monir@gmail.com', '0', 'HAREZ ROAD, VHATARA, DHAKA', '0', '15864', '2018-11-27'),
(21, '1', 'GIAS UDDIN', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '36489', '2018-08-07'),
(22, '1', 'sahajahan (parish)', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '258963', '2018-08-07'),
(23, '1', 'HAJI NURUDDIN ', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '45219', '2018-08-07'),
(24, '1', 'BILLAL', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '45864', '2018-08-07'),
(25, '2', 'SEVEN RING', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'GULSHAN', 'Choose option', '216423', '2018-08-07'),
(26, '2', 'FRESH', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'GULSHAN', 'Choose option', '101253', '2018-08-07'),
(27, '2', 'HOLCIM', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'GULSHAN', 'Choose option', '12567', '2018-08-07'),
(28, '2', 'SUPERCRETE', 'e10adc3949ba59abbe56e057f20f883e', 'supercreate@gmail.com', '0166666666', 'GULSHAN', '0', '-25468', '2018-11-27'),
(29, '1', 'ALI HOSSAIN', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '45673', '2018-08-07'),
(30, '1', 'ABDUL HAFIZ', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '24687', '2018-08-07'),
(31, '1', 'ADOBI BUILDERS, ARISH', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '1587678', '2018-08-07'),
(32, '1', 'CAMBRIAN COLLEGE', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '186483', '2018-08-07'),
(33, '1', 'cash sell', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'N/A', 'Choose option', '0', '2018-08-07'),
(34, '1', 'ENGR. MASUD ', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '5654', '2018-08-07'),
(35, '1', 'ENGR.KAMRUL ISLAM', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '01345267651', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '10000', '2018-10-27'),
(36, '0', 'admin', '6ebe76c9fb411be97b3b0d48b791a7c9', '', '', '', '', '', ''),
(37, '1', 'hashem', 'e10adc3949ba59abbe56e057f20f883e', 'hashem@gmail.com', '01735623513', 'feni\r\nfeni2', 'Choose option', '4000', '2018-11-27'),
(38, '4', 'Salesman2', 'e10adc3949ba59abbe56e057f20f883e', 'salesman@gmail.com', '01735623513', 'feni\r\nfeni2', '0', '6000', '2018-11-27'),
(39, '4', 'Salesman3', 'e10adc3949ba59abbe56e057f20f883e', 'salesman3@gmail.com', '21245', 'Nilphamari', '1', '', '2018-12-10'),
(40, '4', 'Shah Jalal', 'e10adc3949ba59abbe56e057f20f883e', 'jalal@gmail.com', '01735623513', 'Nikunja-2\r\nKhilkhet', '4', '', '2018-12-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acccount_category`
--
ALTER TABLE `acccount_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `banktransfer`
--
ALTER TABLE `banktransfer`
  ADD PRIMARY KEY (`transferid`);

--
-- Indexes for table `cateogory`
--
ALTER TABLE `cateogory`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `charts_accounts`
--
ALTER TABLE `charts_accounts`
  ADD PRIMARY KEY (`charts_id`);

--
-- Indexes for table `cheque`
--
ALTER TABLE `cheque`
  ADD PRIMARY KEY (`chequeno`);

--
-- Indexes for table `employeesalerlist`
--
ALTER TABLE `employeesalerlist`
  ADD PRIMARY KEY (`emsaleryid`);

--
-- Indexes for table `employeetype`
--
ALTER TABLE `employeetype`
  ADD PRIMARY KEY (`et_id`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`expenseid`);

--
-- Indexes for table `expensecat`
--
ALTER TABLE `expensecat`
  ADD PRIMARY KEY (`excat_id`);

--
-- Indexes for table `expensecategory`
--
ALTER TABLE `expensecategory`
  ADD PRIMARY KEY (`excate_id`);

--
-- Indexes for table `e_payment_salery`
--
ALTER TABLE `e_payment_salery`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `e_salerykeys`
--
ALTER TABLE `e_salerykeys`
  ADD PRIMARY KEY (`salery_key_id`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `purchase_return`
--
ALTER TABLE `purchase_return`
  ADD PRIMARY KEY (`pr_id`);

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
-- Indexes for table `recevecollection`
--
ALTER TABLE `recevecollection`
  ADD PRIMARY KEY (`recol_id`);

--
-- Indexes for table `role_base_access_system`
--
ALTER TABLE `role_base_access_system`
  ADD PRIMARY KEY (`rbas_id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`sellid`);

--
-- Indexes for table `sell_return`
--
ALTER TABLE `sell_return`
  ADD PRIMARY KEY (`sr_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `supplierpayment`
--
ALTER TABLE `supplierpayment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`autoid`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acccount_category`
--
ALTER TABLE `acccount_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banktransfer`
--
ALTER TABLE `banktransfer`
  MODIFY `transferid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cateogory`
--
ALTER TABLE `cateogory`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `charts_accounts`
--
ALTER TABLE `charts_accounts`
  MODIFY `charts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cheque`
--
ALTER TABLE `cheque`
  MODIFY `chequeno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employeesalerlist`
--
ALTER TABLE `employeesalerlist`
  MODIFY `emsaleryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `employeetype`
--
ALTER TABLE `employeetype`
  MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `expenseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expensecat`
--
ALTER TABLE `expensecat`
  MODIFY `excat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expensecategory`
--
ALTER TABLE `expensecategory`
  MODIFY `excate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `e_payment_salery`
--
ALTER TABLE `e_payment_salery`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `e_salerykeys`
--
ALTER TABLE `e_salerykeys`
  MODIFY `salery_key_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `purchase_return`
--
ALTER TABLE `purchase_return`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `p_brand`
--
ALTER TABLE `p_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `p_size`
--
ALTER TABLE `p_size`
  MODIFY `pro_size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `recevecollection`
--
ALTER TABLE `recevecollection`
  MODIFY `recol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role_base_access_system`
--
ALTER TABLE `role_base_access_system`
  MODIFY `rbas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `sellid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `sell_return`
--
ALTER TABLE `sell_return`
  MODIFY `sr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplierpayment`
--
ALTER TABLE `supplierpayment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `autoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
