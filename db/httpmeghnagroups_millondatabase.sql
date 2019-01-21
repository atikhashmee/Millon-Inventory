-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2019 at 03:20 PM
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
-- Table structure for table `access_privilige`
--

CREATE TABLE `access_privilige` (
  `ac_pri_id` int(11) NOT NULL,
  `role_id` varchar(200) NOT NULL,
  `page_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_privilige`
--

INSERT INTO `access_privilige` (`ac_pri_id`, `role_id`, `page_id`) VALUES
(10, '3', '3'),
(11, '3', '4'),
(12, '3', '5'),
(13, '3', '6'),
(14, '3', '7'),
(15, '3', '8'),
(57, '4', '1'),
(58, '4', '4'),
(59, '4', '5'),
(60, '4', '7'),
(61, '4', '8'),
(62, '4', '9'),
(63, '4', '10'),
(64, '4', '19'),
(65, '1', '20');

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
(5, '2019-01-02', '4', '2', '1200', 'robiul', '36', 'ct_Cash_2_4'),
(6, '2019-01-02', '4', '2', '131000', 'kaka', '36', 'ct_Cash_2_4'),
(7, '2019-01-03', '3', '2', '125000', 'Own', '36', 'ct_Cash_2_3'),
(8, '2019-01-03', '2', '4', '17500', 'Kaka', '36', 'ct_Cash_4_2');

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
(2, '1', 'owners account', '000', 'owner', '', '', '', '131000', '2019-01-19', '002'),
(3, '1', 'mercantile bank', '0147111000', 'mahi', '', '', 'progoti sarani', '390785.5', '2019-01-19', '002'),
(4, '1', 'Cash', '', 'robiul', '', '', 'progoti sarani', '1200', '2019-01-19', '002');

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
  `approve` int(10) NOT NULL DEFAULT 0,
  `carrier` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cheque`
--

INSERT INTO `cheque` (`chequeno`, `parent_table_id`, `customerid`, `accountno`, `bankname`, `expiredate`, `amount`, `userid`, `fromtable`, `approve`, `carrier`) VALUES
(1, 'pts_1', '42', '35667', '3', '2019-01-03', '89200', '36', 'minus', 0, 'Ashraf');

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
(66, '3', '400', '40', 'Bangladesh Commerce Bank Limited', '123456'),
(70, '1', '5000', '46', 'AB Bank Limited', '3452352653656'),
(71, '2', '700', '46', 'AB Bank Limited', '3452352653656'),
(72, '5', '400', '46', 'AB Bank Limited', '3452352653656');

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
  `addedby` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`expenseid`, `expendituredate`, `expensecatid`, `accountsid`, `amount`, `employeeid`, `employeetype`, `addedby`, `token`) VALUES
(1, '2019-01-03', '3', '4', '70', '-1', '0', '36', 'expense_3'),
(2, '2019-01-03', '4', '4', '1100', '-1', '0', '36', 'expense_4'),
(3, '2019-01-03', '', '', '100', '45', '4', '36', 'stuff__45'),
(4, '2019-01-03', '10', '4', '60', '-1', '0', '36', 'expense_10'),
(5, '2019-01-03', '6', '4', '500', '-1', '0', '36', 'expense_6'),
(6, '2019-01-04', '11', '4', '400', '-1', '0', '36', 'expense_11');

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
(4, 'Labour', '2018-11-25', '002'),
(5, 'truck rent', '2018-12-19', '002'),
(6, 'KAKA', '2018-12-23', '002'),
(8, 'MILON', '2018-12-23', '002'),
(9, 'LABOUR COURT', '2018-12-25', '002'),
(10, 'SALAMI', '2018-12-25', '002'),
(11, 'DONATION', '2019-01-19', '002');

-- --------------------------------------------------------

--
-- Table structure for table `e_payment_salery`
--

CREATE TABLE `e_payment_salery` (
  `payment_id` int(11) NOT NULL,
  `payment_date` varchar(200) NOT NULL,
  `amount_pay` varchar(200) NOT NULL,
  `payment_due` varchar(200) NOT NULL,
  `employeeid` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(18, 'P1944', '2', '8', '', 1, '133', '408', '430', '100', '', '2019-01-18'),
(19, 'P1923', '2', '6', '', 2, '200', '391', '420', '100', '', '2019-01-18'),
(20, 'P1934', '1', '5', '23', 1, '860', '62', '64', '500', '', '2019-01-16'),
(21, 'P1926', '1', '5', '25', 1, '405', '62', '64', '500', '', '2019-01-16'),
(22, 'P1941', '1', '5', '26', 1, '1220', '62', '64', '500', '', '2019-01-16'),
(23, 'P1928', '1', '5', '27', 1, '563', '62', '64', '500', '', '2019-01-17'),
(24, 'P1957', '2', '20', '', 1, '60', '9', '10', '10', '', '2018-12-20'),
(25, 'P2639', '2', '1', '', 2, '0', '470', '470', '100', '', '2018-12-25'),
(26, 'P2643', '1', '5', '24', 1, '500', '62', '64', '100', '', '2018-12-27'),
(27, 'P2644', '2', '9', '', 2, '0', '420', '430', '100', '', '2018-12-27'),
(28, 'P1920', '1', '21', '28', 1, '19.5', '56', '58', '100', '', '2019-01-19'),
(29, 'P1913', '1', '15', '29', 1, '335', '65.5', '67', '100', '', '2019-01-19'),
(30, 'P1946', '2', '7', '', 2, '0', '390', '410', '100', '', '2019-01-19'),
(31, 'P1949', '2', '10', '', 2, '0', '476', '476', '100', '', '2019-01-19');

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
  `payment_status` varchar(200) NOT NULL,
  `comission` varchar(200) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `purchaseentryby` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `billchallan`, `purchasedate`, `supplier`, `productid`, `quantity`, `price`, `weight`, `transport`, `vat`, `payment_taka`, `payment_status`, `comission`, `discount`, `purchaseentryby`, `token`) VALUES
(1, '2019118122254', '2019-01-03', '92', 'P2639', '10', '465', '', '0', '', '4650', 'Cash', '', '', '36', 'p_Cash'),
(2, '2019119112818', '2019-01-04', '92', 'P2639', '20', '465', '', '0', '', '9300', 'Cash', '', '', '36', 'p_Cash'),
(4, '2019119122025', '2019-01-05', '42', 'P1944', '200', '446', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(5, '2019119153126', '2019-01-08', '104', 'P2639', '200', '455', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(6, '201911915333', '2019-01-10', '92', 'P2639', '10', '465', '', '0', '', '4650', 'Cash', '', '', '36', 'p_Cash'),
(8, '201911916111', '2019-01-03', '41', 'P1923', '200', '394', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(9, '201911916129', '2019-01-11', '41', 'P1923', '200', '394', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(10, '201911916247', '2019-01-14', '28', 'P1946', '250', '360', '', '0', '', '86400', 'Cash', '', '', '36', 'p_Cash'),
(11, '201911916247', '2019-01-14', '28', 'P1946', '250', '360', '', '0', '', '86400', 'Cash', '', '', '', 'p_Cash'),
(12, '2019119165214', '2019-01-14', '42', 'P2644', '300', '456', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(13, '201911916544', '2019-01-14', '42', 'P1949', '200', '476', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(14, '2019119172016', '2019-01-15', '105', 'P1944', '200', '410', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(15, '2019119172016', '2019-01-15', '105', 'P1944', '200', '410', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(16, '2019119172256', '2019-01-15', '106', 'P2639', '200', '445', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(17, '2019119172536', '2019-01-16', '42', 'P2644', '600', '456', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(20, '2019119172856', '2019-01-16', '42', 'P1944', '100', '446', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(21, '2019119173022', '2019-01-11', '43', 'P1934', '4000', '62', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(22, '2019119173739', '2019-01-11', '43', 'P1926', '1000', '62', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(23, '2019119173923', '2019-01-11', '43', 'P1941', '2000', '62', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(24, '2019119174057', '2019-01-09', '43', 'P1941', '95', '0', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(25, '2019119181758', '2019-01-19', '43', 'P1928', '758', '0', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(26, '2019119181959', '2019-01-09', '43', 'P1928', '195', '0', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(27, '2019119182047', '2019-01-10', '43', 'P1928', '3000', '62', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(28, '201911918244', '2019-01-18', '107', 'P1928', '786', '63.3', '147', '1000', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(29, '2019120125512', '2019-01-08', '42', 'P1944', '200', '446', '', '0', '', '89200', 'Cash', '', '', '36', 'p_Cash');

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
  `comission` varchar(200) NOT NULL,
  `discount` varchar(200) NOT NULL DEFAULT '0',
  `return_date` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL DEFAULT 'pr',
  `entryby` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(6, '2', 'Meghnacem Deluxe'),
(5, '1', 'RAHIM STEEL'),
(7, '2', 'Supercrete'),
(8, '2', 'Seven Ring Regular'),
(9, '2', 'Seven Ring Special'),
(10, '2', 'Seven Ring gold'),
(11, '2', 'Meghnacem Deluxe special'),
(12, '2', 'Meghnacem Deluxe super'),
(14, '2', 'Fresh special'),
(15, '1', 'BSRM'),
(16, '2', 'Fresh Gold'),
(17, '2', 'Scan'),
(18, '2', 'Basundhara'),
(19, '2', 'bulk'),
(20, '2', 'open cement'),
(21, '1', 'LOCAL MILLS');

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
(28, '1', '21', '10MM 300W'),
(27, '1', '5', '20mm 72.5G 500W'),
(26, '1', '5', '16mm 72.5G 500W'),
(25, '1', '5', '12mm 72.5G 500W'),
(24, '1', '5', '8mm 72.5G 500W'),
(23, '1', '5', '10mm 72.5G 500W'),
(21, '1', '5', '20mm 40G 300W'),
(20, '1', '5', '16mm 40G 300W'),
(19, '1', '5', '12mm 40G 300W'),
(18, '1', '5', '10mm 40G 300W'),
(17, '1', '5', '8mm 40G 300W'),
(29, '1', '15', '10 MM 500W'),
(30, '1', '15', '12mm 72.G 500w'),
(31, '1', '15', '16mm 72.G 500w'),
(32, '1', '15', '20mm 72.G 500w');

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
(24, '15', '11', '2'),
(25, '16', '20', '0'),
(26, '16', '20', '1');

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
  `payment_status` varchar(200) NOT NULL,
  `comission` varchar(200) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `sellby` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL DEFAULT 's',
  `entryby` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`sellid`, `selldate`, `billchallan`, `customerid`, `productid`, `quantity`, `price`, `weight`, `transport`, `vat`, `payment_taka`, `payment_status`, `comission`, `discount`, `sellby`, `token`, `entryby`) VALUES
(5, '2019-01-03', '201911812124', '33', 'P1944', '3', '430', '', '', '', '1290', 'Cheque', '', '0', '78', 's_Cheque', 36),
(6, '2019-01-03', '2019118121321', '57', 'P1944', '5', '430', '', '50', '', '0', 'Cheque', '', '', '78', 's_Cheque', 36),
(7, '2019-01-03', '201911812102', '33', 'P1923', '2', '420', '', '0', '', '840', 'Cheque', '', '', '78', 's_Cheque', 36),
(8, '2019-01-03', '2019118122735', '52', 'P2639', '10', '490', '', '300', '', '4000', 'Cash', '', '', '78', 's_Cash', 36),
(10, '2019-01-03', '2019118123254', '33', 'P1944', '1', '430', '', '0', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(11, '2019-01-03', '2019118124253', '33', 'P1944', '20', '430', '', '600', '', '9200', 'Cash', '', '', '78', 's_Cash', 36),
(13, '2019-01-03', '201911863439', '33', 'P1923', '2', '420', '', '0', '', '420', 'Cash', '', '', '78', 's_Cash', 36),
(14, '2019-01-03', '201911863629', '33', 'P1957', '7', '15', '', '', '', '100', 'Cash', '', '5', '78', 's_Cash', 36),
(15, '2019-01-03', '201911864752', '33', 'P1923', '2', '420', '', '0', '', '840', 'Cash', '', '', '78', 's_Cash', 36),
(16, '2019-01-03', '201911865959', '95', 'P1944', '10', '430', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(17, '2019-01-04', '2019119113239', '33', 'P1923', '2', '420', '', '0', '', '840', 'Cash', '', '', '78', 's_Cash', 36),
(18, '2019-01-04', '2019119113354', '48', 'P1944', '60', '425', '', '0', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(19, '2019-01-04', '2019119113525', '33', 'P1923', '3', '420', '', '0', '', '1260', 'Cash', '', '', '78', 's_Cash', 36),
(21, '2019-01-04', '2019119114938', '33', 'P1944', '2', '430', '', '0', '', '860', 'Cash', '', '', '78', 's_Cash', 36),
(22, '2019-01-04', '2019119115559', '33', 'P1920', '19.5', '58', '', '49', '', '1180', 'Cash', '', '', '78', 's_Cash', 36),
(23, '2019-01-08', '201911912817', '33', 'P1944', '5', '430', '', '50', '', '2200', 'Cash', '', '', '78', 's_Cash', 36),
(24, '2019-01-08', '2019120111317', '49', 'P1913', '335', '67', '231', '400', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(25, '2019-01-08', '2019120111317', '49', 'P1928', '758', '64', '231', '400', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(26, '2019-01-08', '2019120113947', '30', 'P2639', '100', '470', '0', '0', '', '77000', 'Cash', '', '', '45', 's_Cash', 36),
(27, '2019-01-04', '2019119114346', '30', 'P2639', '20', '490', '', '700', '', '0', 'Cheque', '', '500', '78', 's_Cheque', 36),
(28, '2019-01-08', '2019120115736', '29', 'P2639', '100', '470', '', '0', '', '0', 'Cash', '', '', '45', 's_Cash', 36),
(29, '2019-01-08', '201912011581', '33', 'P1957', '9', '15', '', '', '', '130', 'Cash', '', '5', '78', 's_Cash', 36),
(30, '2019-01-08', '2019120122819', '33', 'P1923', '3', '420', '', '0', '', '1260', 'Cash', '', '', '78', 's_Cash', 36),
(31, '2019-01-08', '2019120123158', '33', 'P1944', '8', '430', '', '80', '', '3520', 'Cash', '', '', '78', 's_Cash', 36),
(32, '2019-01-20', '2019120123845', '56', 'P1944', '20', '430', '', '200', '', '16000', 'Cash', '', '', '78', 's_Cash', 36),
(33, '2019-01-08', '2019120124652', '47', 'P1941', '595', '63.2', '145', '300', '', '38000', 'Cash', '', '773', '78', 's_Cash', 36),
(34, '2019-01-08', '2019120124652', '47', 'P1928', '466', '63.2', '145', '300', '', '38000', 'Cash', '', '773', '78', 's_Cash', 36),
(35, '2019-01-08', '2019120125819', '97', 'P1944', '200', '409', '', '0', '', '83000', 'Cash', '', '', '44', 's_Cash', 36),
(36, '2019-01-08', '201912013026', '86', 'P1944', '12', '430', '', '120', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(37, '2019-01-08', '201912013138', '22', 'P1944', '40', '430', '', '400', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(38, '2019-01-08', '201912013244', '33', 'P1944', '4', '425', '', '0', '', '1700', 'Cash', '', '', '78', 's_Cash', 36),
(39, '2019-01-08', '201912013442', '33', 'P1957', '7', '15', '', '', '', '100', 'Cash', '', '5', '78', 's_Cash', 36),
(40, '2019-01-08', '20191201362', '33', 'P1944', '1', '430', '', '0', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(41, '2019-01-08', '201912013741', '33', 'P1923', '1', '430', '', '0', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(42, '2019-01-08', '2019120131140', '95', 'P1944', '10', '430', '', '100', '', '4400', 'Cash', '', '', '78', 's_Cash', 36);

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
  `comission` int(10) NOT NULL DEFAULT 0,
  `return_date` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL DEFAULT 'sr',
  `takenby` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '2019-01-03', '42', '89200', 'Ashraf', NULL, '36', 'pts_Cheque'),
(2, '2019-01-03', '41', '78000', 'Tarek', NULL, '36', 'pts_Cash');

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
  `enddate` varchar(200) NOT NULL,
  `pament` varchar(200) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `paydate` varchar(200) DEFAULT NULL,
  `approve` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`autoid`, `employee_id`, `brandid`, `quantity`, `unit`, `commsion`, `startdate`, `enddate`, `pament`, `token`, `paydate`, `approve`) VALUES
(7, '44', 'P2639', '23', '1', '1200', '2018-12-16', '2018-12-18', NULL, NULL, NULL, '0'),
(8, '78', 'P1926', '5', '1', '123', '2019-01-02', '2019-01-03', NULL, NULL, NULL, '0');

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
(16, '1', 'MR.BASAR', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '4500', '2018-08-07'),
(17, '1', 'AKTER DEWAN', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'basundhara, DHAKA', '0', '71920', '2018-12-14'),
(22, '1', 'sahajahan (parish)', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'JOGONNATHPUR, VHATARA, DHAKA', '0', '310620', '2018-12-14'),
(23, '1', 'HAJI NURUDDIN ', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'jogonnathpur, VHATARA, DHAKA', '0', '95600', '2018-12-25'),
(26, '2', 'FRESH', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'GULSHAN', 'Choose option', '0', '2018-12-25'),
(28, '2', 'SUPERCRETE', 'e10adc3949ba59abbe56e057f20f883e', 'supercreate@gmail.com', '0166666666', 'GULSHAN', '0', '0', '2018-12-25'),
(29, '1', 'ALI HOSSAIN', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '88570', '2018-12-18'),
(30, '1', 'ABDUL HAFIZ', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'BASUNDHARA', 'Choose option', '30000', '2019-01-20'),
(31, '1', 'ADOBI BUILDERS, ARISH', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0', '17/1,pollobi,mirpur-12, DHAKA', '0', '822791', '2018-12-14'),
(32, '1', 'CAMBRIAN COLLEGE', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '186483', '2018-08-07'),
(33, '1', '1.cash sell', 'e10adc3949ba59abbe56e057f20f883e', 'pongta@gmail.com', '0', 'N/A', '0', '0', '2018-12-20'),
(36, '0', 'admin', '6ebe76c9fb411be97b3b0d48b791a7c9', '', '', '', '', '', ''),
(41, '2', 'meghnacem deluxe', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0154782456', 'fresh villah', '0', '0', '2018-12-13'),
(42, '2', 'seven ring', 'e10adc3949ba59abbe56e057f20f883e', 'se@gmail.com', '01752486248', 'gulshan', '0', '-143400', '2018-12-25'),
(43, '2', 'rahim steel', 'e10adc3949ba59abbe56e057f20f883e', 'rahim@gmail.com', '013672584', 'tikatuli', '0', '1364000', '2018-12-25'),
(44, '4', 'baha uddin', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '01682409301', 'nadda dhaka', '4', '0', '2018-12-14'),
(45, '4', 'IMRAN', 'e10adc3949ba59abbe56e057f20f883e', 'imran@gmail.com', '01912541124', 'nadda,dhaka', '4', '0', '2018-12-14'),
(46, '4', 'rasel', 'e10adc3949ba59abbe56e057f20f883e', 'rasel@gmail.com', '01824562145', 'bastola', '4', '0', '2018-12-14'),
(47, '1', 'ABDUL HAI', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '01682409301', 'jogonnathur, vhatara, dhaka', '0', '-28727', '2018-12-14'),
(48, '1', 'MUKUL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '01682409301', 'jogonnathpur, vhatara, dhaka', '0', '82920', '2018-12-23'),
(49, '1', 'JOSIM DHALI', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0125', 'dhalibari kaca bazar, mosque roar, vhatara, dhaka', '0', '351470', '2018-12-23'),
(50, '1', 'ADOBI BUILDERS(dhanondi)', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0', 'dhanmondi', '0', '560885', '2018-12-14'),
(51, '1', 'kamrul islam', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0', 'plot-12,road-15,block-G,basundhara,dhaka', '0', '158960', '2018-12-14'),
(52, '1', 'AMINUL HAQUE', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'plot- ,road-13,block-G,basundhara,dhaka', '0', '36150', '2018-12-14'),
(53, '1', 'monowar ali', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0', 'plot-112,road-03,block-J,basundhara,dhaka', '0', '53255', '2018-12-14'),
(54, '1', 'ENGE. MASUD VAI', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'jogonnathpur,vhatara,dhaka', '0', '117810', '2018-12-14'),
(55, '1', 'SOUTH VISSION', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'jogonnnathpur,vhatara,dhaka', '0', '93634', '2018-12-14'),
(56, '1', 'NOYON VAI', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'JOGONNATHPUR,VHATARA,DHAKA', '0', '7828', '2018-12-27'),
(57, '1', 'KHALEK DHALI', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'jogonnathpur,vhatara,dhaka', '0', '34300', '2018-12-14'),
(58, '1', 'SAHAJAHAN GAZI', 'e10adc3949ba59abbe56e057f20f883e', 'M@GMAIL.COM', '0', 'jogonnathpur,vhatara,dhaka', '0', '215303', '2018-12-14'),
(61, '1', 'RONJONA KASEM', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'A', '0', '67500', '2018-12-18'),
(62, '1', 'BADOL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'JOGONNATHPUR', '0', '0', '2018-12-18'),
(63, '1', 'MIZAN VAI (BEAI)', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '01345267651', 'JOGONNATHPUR', '0', '1760', '2018-12-18'),
(64, 'Choose option', 'GAZI ENGH', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'JOGONNATHPUR', '0', '11400', '2018-12-18'),
(65, 'Choose option', 'RAZIV ENGH', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'JOGONNATHPUR', '0', '400', '2018-12-18'),
(66, 'Choose option', 'ABUL HOSSAIN', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'JOGONNATHPUR', '0', '450', '2018-12-18'),
(67, 'Choose option', 'YASIN BACCU', 'e10adc3949ba59abbe56e057f20f883e', 'M@gmail.com', '0', 'JOGONNATHPUR', '0', '450', '2018-12-18'),
(68, 'Choose option', 'AZOMAL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'M@gamil.com', '0', 'JOGONNATHPUR', '0', '500', '2018-12-18'),
(69, 'Choose option', 'WASUING FACTORY', 'e10adc3949ba59abbe56e057f20f883e', 'M@gmail.com', 'o', 'JOGONNATHPUR', '0', '8500', '2018-12-18'),
(70, 'Choose option', 'MASUD VAI', 'e10adc3949ba59abbe56e057f20f883e', 'M@gmail.com', '0', 'JOGONNATPUR', '0', '340', '2018-12-18'),
(71, 'Choose option', 'BASAR VAI', 'e10adc3949ba59abbe56e057f20f883e', 'M@gmail.com', '0', 'BASUNDHARA', '0', '19409', '2018-12-18'),
(72, 'Choose option', 'BADOL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'M@gmail.com', '0', 'JOGONNATHPUR', '0', '18400', '2018-12-18'),
(73, 'Choose option', 'ENGR SHAKH SADI', 'e10adc3949ba59abbe56e057f20f883e', 'M@gmail.com', '0', 'JOGONNATHPUR', '0', '10000', '2018-12-18'),
(74, 'Choose option', 'SAYED AHMED', 'e10adc3949ba59abbe56e057f20f883e', 'M@gmail.com', '0', 'JOGONNATHPUR', '0', '200', '2018-12-18'),
(75, 'Choose option', 'KHUSRU VAI', 'e10adc3949ba59abbe56e057f20f883e', 'M@gmail.com', '0', 'JOGONNATHPUR', '0', '12000', '2018-12-18'),
(76, '1', 'MOSTAFA SIR', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'A', '0', '480500', '2018-12-19'),
(77, 'Choose option', 'S. P PROPERTIES', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'A', '0', '150', '2018-12-19'),
(78, '4', 'SHOP', 'e10adc3949ba59abbe56e057f20f883e', 'pongta@gmail.com', '0', 'jogonnathpur', '4', '', '2018-12-20'),
(79, '1', 'ALI NASER', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'A', '0', '100', '2018-12-27'),
(81, '1', 'KHALED', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'JOGONNATHPUR', '0', '0', '2018-12-23'),
(82, '1', 'kosru vai', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'mosque road,jogonnathpur,dhaka', '0', '0', '2018-12-23'),
(83, '1', 'HASEM VAI', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '150', '2018-12-25'),
(84, '1', 'CAR GARAGE', 'e10adc3949ba59abbe56e057f20f883e', 'mazad88@live.com', '0', 'JAGONNATHPUR', '0', '0', '2018-12-25'),
(85, '1', 'WASHING FACTORY', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '9000', '2018-12-25'),
(86, '1', 'SAMIMA MADAM', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'JOGONNATHPUR', '0', '0', '2018-12-25'),
(88, '1', 'ASHRAF VAI(7 RING)', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '40000', '2018-12-26'),
(89, '2', 'YASIN VAI', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '50000', '2018-12-26'),
(90, '2', 'ASHRAF VAI (CONTRACTOR)', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '110400', '2018-12-26'),
(91, '2', 'HOLCIM', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '0', '2018-12-25'),
(92, '2', 'ALPINE TRADERS', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '0', '2018-12-25'),
(94, '1', 'LAHOR RAHMAN', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '41000', '2018-12-25'),
(95, '1', 'OSMAN VAI', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '4350', '2018-12-26'),
(96, '1', 'FARJANA ENTERPRISE', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '0', '2018-12-25'),
(97, '1', 'SRABONI ENTERPRISE', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '51816', '2018-12-26'),
(98, '1', 'AZMOL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '0', '2018-12-25'),
(99, '1', 'SOUTH BAY', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '0', '2018-12-25'),
(100, '2', 'K.A STEEL', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '329750', '2019-01-16'),
(101, '2', 'TAREK VAI', 'e10adc3949ba59abbe56e057f20f883e', 'mazad88@live.com', '0', 'A', '0', '50000', '2018-12-26'),
(102, '1', 'Akaul haque', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'Bosundhara', '0', '0', '2018-12-26'),
(103, '1', 'ALI AJOM', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'BOSUNDHARA MURTI', '0', '5000', '2019-01-16'),
(104, '2', 'AMIR AND SONS', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0125', 'MALIBAG', '0', '0', '2019-01-19'),
(105, '2', 'iqbal vai', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'notunbazar,dhaka', '0', '0', '2019-01-19'),
(106, '2', 'HUDA TREADERS', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'KHILKHET', '0', '0', '2019-01-19'),
(107, '2', 'Patari steel', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'Sahajadpur', '0', '0', '2019-01-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acccount_category`
--
ALTER TABLE `acccount_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `access_privilige`
--
ALTER TABLE `access_privilige`
  ADD PRIMARY KEY (`ac_pri_id`);

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
-- AUTO_INCREMENT for table `access_privilige`
--
ALTER TABLE `access_privilige`
  MODIFY `ac_pri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `banktransfer`
--
ALTER TABLE `banktransfer`
  MODIFY `transferid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cateogory`
--
ALTER TABLE `cateogory`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `charts_accounts`
--
ALTER TABLE `charts_accounts`
  MODIFY `charts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cheque`
--
ALTER TABLE `cheque`
  MODIFY `chequeno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employeesalerlist`
--
ALTER TABLE `employeesalerlist`
  MODIFY `emsaleryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

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
  MODIFY `excate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `e_payment_salery`
--
ALTER TABLE `e_payment_salery`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_salerykeys`
--
ALTER TABLE `e_salerykeys`
  MODIFY `salery_key_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `purchase_return`
--
ALTER TABLE `purchase_return`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `p_brand`
--
ALTER TABLE `p_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `p_size`
--
ALTER TABLE `p_size`
  MODIFY `pro_size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `recevecollection`
--
ALTER TABLE `recevecollection`
  MODIFY `recol_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_base_access_system`
--
ALTER TABLE `role_base_access_system`
  MODIFY `rbas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `sellid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `autoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
