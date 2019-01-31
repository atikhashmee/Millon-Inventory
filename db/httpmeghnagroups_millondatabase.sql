-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2019 at 05:19 PM
-- Server version: 10.2.17-MariaDB
-- PHP Version: 7.0.32

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
(14, '2019-01-25', '4', '5', '100000', 'milon', '36', 'ct_Cash_5_4'),
(15, '2019-01-25', '5', '4', '6000', 'milon', '36', 'ct_Cash_4_5'),
(16, '2019-01-26', '5', '4', '1000', 'milon', '36', 'ct_Cash_4_5'),
(17, '2019-01-27', '4', '5', '425400', 'milon', '36', 'ct_Cash_5_4'),
(18, '2019-01-27', '5', '4', '62500', 'Milon', '36', 'ct_Cash_4_5'),
(19, '2019-01-28', '4', '5', '7500', 'milon', '36', 'ct_Cash_5_4'),
(20, '2019-01-28', '5', '4', '592500', 'IMRAN', '36', 'ct_Cash_4_5'),
(21, '2019-01-29', '4', '5', '189000', 'milon', '36', 'ct_Cash_5_4');

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
(3, '1', 'mercantile bank', '0147111000', 'mahi', '', '', 'progoti sarani', '223000', '2019-01-28', '002'),
(4, '1', 'Cash', '', 'robiul', '', '', 'progoti sarani', '980', '2019-01-28', '002'),
(5, '1', 'owners account', '', 'milon', '0', '', '', '492900', '2019-01-28', '002');

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
(72, '5', '400', '46', 'AB Bank Limited', '3452352653656'),
(73, '1', '7000', '112', '', '0');

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
(26, '2019-01-25', '17', '4', '400', '-1', '0', '36', 'expense_17'),
(27, '2019-01-25', '', '4', '100', '45', '4', '36', 'stuff__45'),
(28, '2019-01-25', '4', '4', '800', '-1', '0', '36', 'expense_4'),
(30, '2019-01-26', '3', '4', '90', '-1', '0', '36', 'expense_3'),
(31, '2019-01-26', '', '4', '120', '45', '4', '36', 'stuff__45'),
(32, '2019-01-27', '15', '4', '60', '-1', '0', '36', 'expense_15'),
(33, '2019-01-26', '4', '4', '2000', '-1', '0', '36', 'expense_4'),
(34, '2019-01-26', '5', '4', '7000', '-1', '0', '36', 'expense_5'),
(35, '2019-01-26', '3', '4', '90', '-1', '0', '', 'expense_3'),
(36, '2019-01-27', '18', '4', '200', '-1', '0', '36', 'expense_18'),
(37, '2019-01-27', '6', '4', '6500', '-1', '0', '36', 'expense_6'),
(38, '2019-01-27', '8', '4', '700', '-1', '0', '36', 'expense_8'),
(39, '2019-01-27', '', '4', '100', '45', '4', '', 'stuff__45'),
(40, '2019-01-27', '14', '4', '150', '-1', '0', '36', 'expense_14'),
(41, '2019-01-27', '3', '4', '80', '-1', '0', '36', 'expense_3'),
(42, '2019-01-27', '4', '4', '2800', '-1', '0', '36', 'expense_4'),
(43, '2019-01-28', '13', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>91</b><br />\r\n', '100', '45', '4', '36', 'stuff_13_45'),
(44, '2019-01-28', '3', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>91</b><br />\r\n', '80', '-1', '0', '36', 'expense_3'),
(45, '2019-01-28', '3', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>91</b><br />\r\n', '100', '-1', '0', '36', 'expense_3'),
(47, '2019-01-28', '10', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>91</b><br />\r\n', '5000', '-1', '0', '36', 'expense_10'),
(48, '2019-01-28', '8', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>91</b><br />\r\n', '12500', '-1', '0', '36', 'expense_8'),
(49, '2019-01-28', '10', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>91</b><br />\r\n', '5000', '', '', '36', 'stuff_10_'),
(50, '2019-01-28', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>91</b><br />\r\n', '1300', '-1', '0', '36', 'expense_4'),
(51, '2019-01-29', '3', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>91</b><br />\r\n', '160', '-1', '0', '36', 'expense_3'),
(52, '2019-01-29', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>91</b><br />\r\n', '3500', '-1', '0', '36', 'expense_4'),
(53, '2019-01-29', '13', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>91</b><br />\r\n', '100', '45', '4', '36', 'stuff_13_45'),
(54, '2019-01-29', '5', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>91</b><br />\r\n', '12600', '-1', '0', '36', 'expense_5'),
(55, '2019-01-29', '15', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>91</b><br />\r\n', '200', '-1', '0', '36', 'expense_15');

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
(12, 'bike expense imran', '2019-01-21', '002'),
(13, 'site expense', '2019-01-21', '002'),
(14, 'transport rahim steel', '2019-01-24', '002'),
(15, 'night expense', '2019-01-24', '002'),
(16, 'NRB BANK', '2019-01-24', '002'),
(17, 'DAN SADAKAH', '2019-01-24', '002'),
(18, 'SOCITY BILL', '2019-01-28', '002');

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

--
-- Dumping data for table `e_payment_salery`
--

INSERT INTO `e_payment_salery` (`payment_id`, `payment_date`, `amount_pay`, `payment_due`, `employeeid`, `token`) VALUES
(1, '2019-01-24', '3000', '4000', '112', 'salerypayment');

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
(18, 'P1944', '2', '8', '', 2, '74', '408', '430', '100', '', '2019-01-28'),
(19, 'P1923', '2', '6', '', 2, '154', '391', '420', '100', '', '2019-01-29'),
(20, 'P1934', '1', '5', '23', 1, '399.5', '62', '64', '500', '', '2019-01-28'),
(21, 'P1926', '1', '5', '25', 1, '00', '62', '64', '500', '', '2019-01-27'),
(22, 'P1941', '1', '5', '26', 1, '223', '62', '64', '500', '', '2019-01-27'),
(23, 'P1928', '1', '5', '27', 1, '213', '62', '64', '500', '', '2019-01-27'),
(24, 'P1957', '2', '20', '', 1, '60', '9', '10', '10', '', '2019-01-29'),
(25, 'P2639', '2', '1', '', 2, '0', '470', '470', '100', '', '2019-01-28'),
(26, 'P2643', '1', '5', '24', 1, '386', '62', '64', '100', '', '2019-01-28'),
(27, 'P2644', '2', '9', '', 2, '0', '420', '430', '100', '', '2019-01-28'),
(28, 'P1920', '1', '21', '28', 1, '18', '55', '58', '100', '', '2019-01-28'),
(29, 'P1913', '1', '15', '29', 1, '0', '65.5', '67', '100', '', '2019-01-28'),
(30, 'P1946', '2', '7', '', 2, '0', '390', '410', '100', '', '2019-01-28'),
(31, 'P1949', '2', '10', '', 2, '0', '476', '476', '100', '', '2019-01-28');

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
(31, '201912882039', '2019-01-26', '42', 'P1944', '200', '446', '', '0', '', '89200', 'Cash', '', '', '36', 'p_Cash'),
(32, '2019128161955', '2019-01-27', '42', 'P1944', '200', '446', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(33, '2019128162210', '2019-01-27', '42', 'P2644', '100', '456', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(34, '2019128205247', '2019-01-28', '100', 'P1920', '1001.4', '55.2', '163', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(35, '201913011149', '2019-01-29', '43', 'P1934', '2969', '62', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(36, '201913011425', '2019-01-29', '43', 'P1926', '1019', '62', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(37, '20191301157', '2019-01-29', '43', 'P1941', '3031', '62', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(38, '201913011910', '2019-01-29', '43', 'P1928', '2981', '62', '', '0', '', '0', 'Cash', '', '', '36', 'p_Cash');

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
(21, '1', 'LOCAL MILLS'),
(22, '2', 'white cement (tiger)'),
(23, '2', 'white cement (elephant)');

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

--
-- Dumping data for table `recevecollection`
--

INSERT INTO `recevecollection` (`recol_id`, `recievedate`, `cusotmer_id`, `amounts`, `carreier`, `adjustment`, `addedby`, `bycashcheque`) VALUES
(8, '2019-01-26', '47', '4400', 'imran', '100', '36', 'rac_Cash'),
(9, '2019-01-27', '98', '2640', 'robiul', '', '36', 'rac_Cash'),
(10, '2019-01-27', '137', '26600', 'robiul', '', '36', 'rac_Cash'),
(11, '2019-01-27', '23', '4300', 'robiul', '', '36', 'rac_Cash'),
(12, '2019-01-27', '96', '40800', 'Ashfaf', '', '36', 'rac_Cash'),
(13, '2019-01-28', '23', '5600', 'robiul', '', '36', 'rac_Cash'),
(14, '2019-01-28', '95', '4500', 'robiul', '', '36', 'rac_Cash'),
(15, '2019-01-28', '29', '100000', 'robiul', '', '36', 'rac_Cash'),
(16, '2019-01-28', '86', '12900', 'robiul', '', '36', 'rac_Cash'),
(17, '2019-01-28', '139', '39000', 'robiul', '', '36', 'rac_Cash'),
(18, '2019-01-28', '140', '400000', 'robiul', '', '36', 'rac_Cash'),
(19, '2019-01-28', '131', '11400', 'robiul', '', '36', 'rac_Cash'),
(20, '2019-01-29', '23', '4300', 'robiul', '', '36', 'rac_Cash'),
(21, '2019-01-29', '134', '20200', 'robiul', '', '36', 'rac_Cash'),
(22, '2019-01-29', '142', '1600', 'milon', '', '36', 'rac_Cash'),
(23, '2019-01-29', '96', '200000', 'ashraf', '', '36', 'rac_Cash');

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
(68, '2019-01-25', '20191288025', '82', 'P1944', '23', '430', '', '375', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(69, '2019-01-25', '20191288148', '33', 'P1944', '5', '430', '', '50', '', '2200', 'Cash', '', '', '78', 's_Cash', 36),
(70, '2019-01-26', '20191288243', '58', 'P1923', '10', '450', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(71, '2019-01-25', '20191288333', '33', 'P1944', '10', '430', '', '150', '', '4450', 'Cash', '', '', '78', 's_Cash', 36),
(72, '2019-01-25', '20191288425', '33', 'P1957', '4', '15', '', '0', '', '60', 'Cash', '', '', '78', 's_Cash', 36),
(73, '2019-01-26', '201912882224', '23', 'P1944', '10', '420', '', '100', '', '4300', 'Cash', '', '', '78', 's_Cash', 36),
(74, '2019-01-26', '201912882521', '136', 'P1934', '38.5', '65', '', '48', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(76, '2019-01-26', '201912882710', '33', 'P1934', '23', '65', '', '5', '', '1500', 'Cash', '', '', '78', 's_Cash', 36),
(77, '2019-01-26', '20191288280', '33', 'P1923', '20', '420', '', '0', '', '8400', 'Cash', '', '', '78', 's_Cash', 36),
(78, '2019-01-26', '201912882854', '95', 'P1944', '10', '430', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(79, '2019-01-26', '201912883116', '127', 'P1944', '4', '430', '', '40', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(80, '2019-01-26', '201912883544', '33', 'P1944', '3', '430', '', '30', '', '1320', 'Cash', '', '', '78', 's_Cash', 36),
(81, '2019-01-26', '201912883649', '135', 'P1944', '5', '430', '', '50', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(82, '2019-01-26', '201912883752', '33', 'P1944', '1', '430', '', '0', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(85, '2019-01-26', '201912884459', '53', 'P1944', '20', '430', '', '700', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(86, '2019-01-26', '20191288412', '134', 'P1944', '80', '420', '', '1600', '', '15000', 'Cash', '', '', '78', 's_Cash', 36),
(87, '2019-01-26', '201912884759', '33', 'P1923', '4', '415', '', '0', '', '1660', 'Cash', '', '', '78', 's_Cash', 36),
(88, '2019-01-26', '201912884830', '22', 'P1944', '40', '430', '', '400', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(89, '2019-01-26', '201912882550', '98', 'P1944', '6', '430', '', '60', '', '00', 'Cash', '', '', '78', 's_Cash', 36),
(90, '2019-01-27', '2019128104736', '33', 'P1934', '338', '65', '', '120', '', '29500', 'Cash', '', '', '45', 's_Cash', 36),
(91, '2019-01-27', '2019128104736', '33', 'P1941', '114', '65', '', '120', '', '29500', 'Cash', '', '', '45', 's_Cash', 36),
(92, '2019-01-27', '2019128111435', '33', 'P1923', '5', '420', '', '100', '', '2200', 'Cash', '', '', '78', 's_Cash', 36),
(93, '2019-01-27', '2019128111857', '126', 'P1944', '3', '430', '', '30', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(94, '2019-01-27', '2019128112229', '33', 'P1923', '5', '430', '', '170', '', '2320', 'Cash', '', '', '78', 's_Cash', 36),
(95, '2019-01-27', '2019128112656', '33', 'P1957', '10', '15', '', '0', '', '150', 'Cash', '', '', '78', 's_Cash', 36),
(96, '2019-01-27', '2019128113034', '33', 'P1923', '10', '435', '', '150', '', '4500', 'Cash', '', '', '78', 's_Cash', 36),
(97, '2019-01-27', '2019128113417', '23', 'P1920', '18', '55', '', '52', '', '', 'Cash', '', '', '78', 's_Cash', 36),
(98, '2019-01-27', '2019128113417', '23', 'P2643', '72', '64', '', '52', '', '', 'Cash', '', '', '78', 's_Cash', 36),
(99, '2019-01-27', '201912811502', '33', 'P1923', '10', '430', '', '100', '', '4400', 'Cash', '', '', '78', 's_Cash', 36),
(100, '2019-01-27', '201912812044', '86', 'P1944', '30', '425', '', '300', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(101, '2019-01-27', '2019128122447', '138', 'P1944', '8', '440', '', '80', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(102, '2019-01-27', '2019128122833', '33', 'P1923', '4', '420', '', '40', '', '1720', 'Cash', '', '', '78', 's_Cash', 36),
(103, '2019-01-27', '2019128123053', '33', 'P1923', '10', '420', '', '0', '', '4200', 'Cash', '', '', '78', 's_Cash', 36),
(104, '2019-01-28', '2019128162954', '96', 'P2644', '100', '408', '', '0', '', '0', 'Cash', '', '', '44', 's_Cash', 36),
(107, '2019-01-28', '2019128201414', '33', 'P1923', '4', '420', '', '0', '', '1680', 'Cash', '', '', '78', 's_Cash', 36),
(108, '2019-01-28', '2019128201726', '33', 'P1923', '5', '420', '', '0', '', '2100', 'Cash', '', '', '78', 's_Cash', 36),
(109, '2019-01-28', '2019128203322', '136', 'P1944', '20', '430', '', '200', '', '11350', 'Cash', '', '', '78', 's_Cash', 36),
(111, '2019-01-28', '2019128205621', '33', 'P1944', '2', '430', '', '20', '', '880', 'Cash', '', '', '78', 's_Cash', 36),
(114, '2019-01-28', '2019128203853', '98', 'P1944', '10', '430', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(115, '2019-01-28', '2019128195916', '58', 'P1923', '6', '450', '', '60', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(116, '2019-01-28', '2019128232023', '33', 'P1944', '1', '430', '', '0', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(117, '2019-01-28', '201912984434', '23', 'P1944', '10', '420', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(118, '2019-01-28', '2019129183140', '49', 'P1920', '616', '58', '112', '500', '', '100000', 'Cash', '', '', '78', 's_Cash', 36),
(119, '2019-01-28', '2019129183224', '33', 'P1923', '10', '430', '', '0', '', '4300', 'Cash', '', '', '78', 's_Cash', 36),
(120, '2019-01-29', '2019130115156', '139', 'P1934', '297', '64', '', '472', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(121, '2019-01-29', '2019130115156', '139', 'P1926', '305', '64', '', '472', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(122, '2019-01-29', '2019130115629', '33', 'P1923', '3', '420', '', '0', '', '1260', 'Cash', '', '', '78', 's_Cash', 36),
(123, '2019-01-29', '201913012252', '23', 'P1944', '10', '420', '', '164', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(124, '2019-01-29', '201913012252', '23', 'P1920', '192', '58', '', '164', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(125, '2019-01-29', '201913012651', '127', 'P1944', '2', '430', '', '20', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(126, '2019-01-29', '2019130121326', '95', 'P1944', '10', '425', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(127, '2019-01-29', '2019130121642', '33', 'P1944', '1', '430', '', '0', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(128, '2019-01-29', '2019130121834', '33', 'P1923', '4', '420', '', '0', '', '1680', 'Cash', '', '', '78', 's_Cash', 36),
(129, '2019-01-29', '2019130122344', '86', 'P1941', '339', '63', '', '318', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(130, '2019-01-29', '2019130122344', '86', 'P1928', '115', '63', '', '318', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(131, '2019-01-29', '201913012280', '33', 'P1923', '5', '420', '', '0', '', '2100', 'Cash', '', '', '78', 's_Cash', 36),
(132, '2019-01-29', '2019130122940', '33', 'P1934', '67', '65', '', '85', '', '8500', 'Cash', '', '', '78', 's_Cash', 36),
(133, '2019-01-29', '2019130122940', '33', 'P1926', '64', '65', '', '85', '', '8500', 'Cash', '', '', '78', 's_Cash', 36),
(134, '2019-01-29', '2019130123519', '33', 'P1944', '1', '430', '', '0', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(135, '2019-01-29', '201913012390', '33', 'P1944', '1', '430', '', '0', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(136, '2019-01-29', '2019130125737', '143', 'P1923', '4', '420', '', '0', '', '00', 'Cash', '', '', '78', 's_Cash', 36),
(137, '2019-01-30', '2019131131613', '33', 'P1944', '1', '430', '', '0', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(138, '2019-01-30', '2019131131826', '33', 'P1944', '1', '430', '', '0', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(139, '2019-01-30', '201913113211', '33', 'P1923', '4', '420', '', '0', '', '1680', 'Cash', '', '', '78', 's_Cash', 36),
(140, '2019-01-30', '201913113211', '33', 'P1923', '4', '420', '', '0', '', '1680', 'Cash', '', '', '78', 's_Cash', 36),
(141, '2019-01-30', '201913113211', '33', 'P1923', '4', '420', '', '0', '', '1680', 'Cash', '', '', '78', 's_Cash', 36);

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
(11, '2019-01-28', '28', '90000', 'IMRAN', NULL, '36', 'pts_Cash'),
(10, '2019-01-28', '28', '90000', 'IMRAN', NULL, '36', 'pts_Cash'),
(9, '2019-01-27', '42', '155000', 'ASHRAF', NULL, '36', 'pts_Cash'),
(8, '2019-01-27', '43', '320000', 'IMRAN', NULL, '36', 'pts_Cash'),
(7, '2019-01-25', '100', '100300', 'titu', NULL, '36', 'pts_Cash'),
(12, '2019-01-29', '100', '55440', 'milon', NULL, '36', 'pts_Cash'),
(13, '2019-01-29', '100', '55440', 'milon', NULL, '36', 'pts_Cash'),
(14, '2019-01-29', '42', '289000', 'ashraf', NULL, '36', 'pts_Cash'),
(15, '2019-01-29', '42', '289000', 'ashraf', NULL, '36', 'pts_Cash');

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
(16, '1', 'MR.BASAR VAI', 'e10adc3949ba59abbe56e057f20f883e', 'h@gmail.com', '0', 'BASUNDHARA MAIN ROAD(KACA BAZAR),JOGONNATHPUR,DJAKA', 'Choose option', '8209', '2019-01-27'),
(17, '1', 'AKTER DEWAN', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '01711471456', 'p-,r-,b-,basundhara, DHAKA', '0', '71920', '2019-01-26'),
(22, '1', 'sahajahan (parish)', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'JOGONNATHPUR, VHATARA, DHAKA', '0', '128500', '2019-01-26'),
(23, '1', 'HAJI NURUDDIN ', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'jogonnathpur, VHATARA, DHAKA', '0', '104300', '2019-01-26'),
(26, '2', 'FRESH', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'GULSHAN', 'Choose option', '0', '2019-01-28'),
(28, '2', 'SUPERCRETE', 'e10adc3949ba59abbe56e057f20f883e', 'supercreate@gmail.com', '0166666666,', 'GULSHAN', '0', '-10150', '2019-01-29'),
(29, '1', 'ALI HOSSAIN', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '193570', '2019-01-28'),
(30, '1', 'ABDUL HAFIZ', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'BASUNDHARA', 'Choose option', '30000', '2019-01-20'),
(31, '1', 'ADOBI BUILDERS, ARISH', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '01819494622', '17/1,pollobi,mirpur-12, DHAKA', '0', '822791', '2019-01-26'),
(32, '1', 'CAMBRIAN COLLEGE', 'e10adc3949ba59abbe56e057f20f883e', 'no@yahoo.com', '01720557151', 'Aziz ROAD, VHATARA, DHAKA', 'Choose option', '125200', '2019-01-26'),
(33, '1', '1.cash sell', 'e10adc3949ba59abbe56e057f20f883e', 'pongta@gmail.com', '0', 'N/A', '0', '0', '2018-12-20'),
(36, '0', 'admin', '6ebe76c9fb411be97b3b0d48b791a7c9', '', '', '', '', '', ''),
(41, '2', 'meghnacem deluxe', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0154782456', 'fresh villah', '0', '78000', '2019-01-28'),
(42, '2', 'seven ring', 'e10adc3949ba59abbe56e057f20f883e', 'se@gmail.com', '01752486248', 'gulshan', '0', '20200', '2019-01-28'),
(43, '2', 'rahim steel', 'e10adc3949ba59abbe56e057f20f883e', 'rahim@gmail.com', '01711434827', 'tikatuli,dhaka', '0', '620000', '2019-01-28'),
(44, '4', 'baha uddin', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '01682409301', 'nadda dhaka', '4', '0', '2018-12-14'),
(45, '4', 'IMRAN', 'e10adc3949ba59abbe56e057f20f883e', 'imran@gmail.com', '01912541124', 'nadda,dhaka', '4', '0', '2018-12-14'),
(46, '4', 'rasel', 'e10adc3949ba59abbe56e057f20f883e', 'rasel@gmail.com', '01824562145', 'bastola', '4', '0', '2018-12-14'),
(47, '1', 'ABDUL HAI', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '01682409301', 'jogonnathur, vhatara, dhaka', '0', '4400', '2019-01-26'),
(48, '1', 'MUKUL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '01718305050', 'Aziz road,jogonnathpur, vhatara, dhaka', '0', '-7000', '2019-01-26'),
(49, '1', 'JOSIM DHALI', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '01681864703,', 'dhalibari kaca bazar, mosque roar, vhatara, dhaka', '0', '303600', '2019-01-29'),
(50, '1', 'ADOBI BUILDERS(dhanondi)', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '01819494622', 'dhanmondi,star kabab, Dhaka', '0', '329285', '2019-01-26'),
(51, '1', 'Engr.kamrul islam', 'e10adc3949ba59abbe56e057f20f883e', 'no@gmail.com', '01711145967', 'plot-12,road-15,block-G,basundhara,dhaka', '0', '118000', '2019-01-26'),
(52, '1', 'AMINUL HAQUE', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'plot- ,road-13,block-G,basundhara,dhaka', '0', '36150', '2018-12-14'),
(53, '1', 'monowar ali', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '01711576665,01741331989', 'plot-112,road-03,block-J,basundhara,dhaka', '0', '35900', '2019-01-29'),
(54, '1', 'ENGE. MASUD VAI', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '01711627140', 'jogonnathpur, basundhara road,dhaka', '0', '117800', '2019-01-26'),
(55, '1', 'SOUTH VISSION', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'jogonnnathpur,vhatara,dhaka', '0', '93634', '2019-01-26'),
(56, '1', 'NOYON VAI', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'JOGONNATHPUR,VHATARA,DHAKA', '0', '7028', '2019-01-26'),
(57, '1', 'KHALEK DHALI', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '01817035364', 'jogonnathpur,vhatara,dhaka', '0', '18000', '2019-01-26'),
(58, '1', 'SAHAJAHAN GAZI', 'e10adc3949ba59abbe56e057f20f883e', 'M@GMAIL.COM', '0', 'jogonnathpur,vhatara,dhaka', '0', '215300', '2019-01-28'),
(61, '1', 'RONJONA KASEM', 'e10adc3949ba59abbe56e057f20f883e', 'no@yahoo.com', '01712069601,01812202202', 'Plot-.road-06,block-I, Bosundhara', '0', '36900', '2019-01-29'),
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
(82, '1', 'kosru vai', 'e10adc3949ba59abbe56e057f20f883e', 's@yahoo.com', '0', 'mosque road,jogonnathpur,dhaka', '0', '24705', '2019-01-28'),
(83, '1', 'HASEM VAI', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '150', '2018-12-25'),
(84, '1', 'CAR GARAGE', 'e10adc3949ba59abbe56e057f20f883e', 'mazad88@live.com', '0', 'JAGONNATHPUR', '0', '0', '2018-12-25'),
(85, '1', 'WASHING FACTORY', 'e10adc3949ba59abbe56e057f20f883e', 'h@gmail.com', '0', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '8500', '2019-01-27'),
(86, '1', 'SAMIMA MADAM', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '01979118207', 'JOGONNATHPUR', '0', '0', '2019-01-26'),
(88, '1', 'ASHRAF VAI(7 RING)', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '40000', '2018-12-26'),
(89, '2', 'YASIN VAI', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '50000', '2018-12-26'),
(91, '2', 'HOLCIM', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '0', '2018-12-25'),
(92, '2', 'ALPINE TRADERS', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '0', '2018-12-25'),
(94, '1', 'LAHOR RAHMAN', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '41000', '2018-12-25'),
(95, '1', 'OSMAN VAI', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '14850', '2019-01-27'),
(96, '1', 'FARJANA ENTERPRISE', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '0', '2018-12-25'),
(97, '1', 'SRABONI ENTERPRISE', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '51816', '2018-12-26'),
(98, '1', 'AZMOL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'Aziz road,jogonnathpur,vhatara,dhaka', '0', '0', '2019-01-28'),
(99, '1', 'SOUTH BAY', 'e10adc3949ba59abbe56e057f20f883e', 'sh@gmail.com', '0', 'PLOT-,ROAD-,BLOCK-,BASUNDHARA,DHAKA', '0', '13730', '2019-01-27'),
(100, '2', 'K.A STEEL', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'notun bazar,vhatara,dhaka', '0', '400300', '2019-01-28'),
(101, '2', 'TAREK VAI', 'e10adc3949ba59abbe56e057f20f883e', 'mazad88@live.com', '0', 'A', '0', '50000', '2018-12-26'),
(103, '1', 'ALI AJOM', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'BOSUNDHARA MURTI', '0', '5000', '2019-01-16'),
(104, '2', 'AMIR AND SONS', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0125', 'MALIBAG', '0', '0', '2019-01-19'),
(105, '2', 'iqbal vai', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'notunbazar,dhaka', '0', '0', '2019-01-19'),
(106, '2', 'HUDA TREADERS', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'KHILKHET', '0', '0', '2019-01-19'),
(107, '2', 'Patari steel', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'Sahajadpur', '0', '0', '2019-01-19'),
(108, '2', 'shop extra', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0', 'shop', '0', '0', '2019-01-21'),
(109, '1', 'MAHBUB SORIF', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0', 'BASUNDHARA', '0', '0', '2019-01-21'),
(110, '1', 'AL AMIN ENTERPRISE', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0', 'saowrabazar,dhaka', '0', '0', '2019-01-24'),
(111, '1', 'AMINUL ISLAN KHAN', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0', 'road-06,block-F,basundhara,dhaka', '0', '21200', '2019-01-24'),
(112, '4', 'ROBIUL', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0', 'SHASIALI,CHANDPUR', '2', '', '2019-01-24'),
(113, '1', 'SAHABUDDIN', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '01739192421', 'MOSJID GOLI,DHAKA', '0', '11375', '2019-01-26'),
(115, '1', 'SOHIDUL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '01`671157589', 'Aziz road,jogonnathpur,vhatara,dhaka', '0', '216564', '2019-01-26'),
(117, '1', 'MOIN VAI', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '0', 'JOGONNATHPUR,VHATARA,DHAKA', '0', '17915', '2019-01-26'),
(118, '1', 'M A KHALEK', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '01713030222', 'PLOT-,ROAD-,BLOCK-A,BASUNDHARA', '0', '77780', '2019-01-26'),
(119, '1', 'SAIFUL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'A@gmail.com', '01711537018', 'plot=,road=,block=, basundhara,dhaka', '0', '37500', '2019-01-26'),
(120, '1', 'Ali sarkar', 'e10adc3949ba59abbe56e057f20f883e', 'no@yahoo.com', '01912295638', 'Aziz road,vhatara,dhaka', '0', '64025', '2019-01-26'),
(121, '1', 'SAIFUL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'A@gmail.com', '01711537018', 'plot=,road=,block=, basundhara,dhaka', '0', '37500', '2019-01-26'),
(122, '1', 'Ali ashfak', 'e10adc3949ba59abbe56e057f20f883e', 'no@yahoo.com', '01781556649', 'Plot-,road-,block-F,basundhara,dhaka', '0', '21000', '2019-01-26'),
(123, '1', 'Raisul vai', 'e10adc3949ba59abbe56e057f20f883e', 'no@yahoo.com', '01712596817', 'Aziz road,jogonnathpur,vhatara,dhaka', '0', '372268', '2019-01-26'),
(124, '1', 'Faruk vau', 'e10adc3949ba59abbe56e057f20f883e', 'no@gmail.com', '01819957593', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '21250', '2019-01-26'),
(125, '1', 'RAFIQ VAI', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0', 'PLOT-388,ROAD-04,BLOCK-I,BASUNDHARA', '0', '27000', '2019-01-27'),
(126, '1', 'VUTTO VAI', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0', 'JOGONNATHPUR,VHATARA,DHAKA', '0', '6650', '2019-01-27'),
(127, '1', 'S P PROPERTISE', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmmail.com', '0', 'PLOT-,ROAD-,BLOCK-,BASUNDHARA,DHAKA', '0', '0', '2019-01-28'),
(128, '1', 'mahmud kabir', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0', 'matborbari,jogonnathpur,vhatara,dhaka', '0', '40990', '2019-01-27'),
(129, '1', 'REJAUL KARIM  TIPU', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0', 'plot-,road-,block-,basundhara,dhaka', '0', '9200', '2019-01-27'),
(130, '1', 'MIZAN VAI(BEYAI)', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0', 'Aziz road,jogonnathpur,vhatara,dhaka', '0', '1760', '2019-01-27'),
(131, '1', 'GAZI ENGINEERING', 'e10adc3949ba59abbe56e057f20f883e', 'M@GMAIL.COM', '0', 'jogonnathpur,vhatara,dhaka', '0', '11400', '2019-01-27'),
(132, '1', 'RAJIB ENGINEERING', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '13300', '2019-01-27'),
(133, '1', 'SAYED KAKA', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '430', '2019-01-27'),
(134, '1', 'KOPOTHKHO PROPERTISE', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0', 'basundhara main road,jogonnathpur,vhatara,dhaka', '0', '14864', '2019-01-28'),
(135, '1', 'ISRAFIL SARKER', 'e10adc3949ba59abbe56e057f20f883e', 'h@gmail.com', '0', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '6680', '2019-01-27'),
(136, '1', 'OTHI (MA)', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0', 'AZIZ ROAD,JOGONNATHPUR,VHATARA,DHAKA', '0', '0', '2019-01-28'),
(137, '1', 'DELIGHT HOME', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '0', 'P-388,R-04,B-I,BASUNDHARA,DHAKA', '0', '26600', '2019-01-28'),
(138, '1', 'MONJO VAI', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'BLOCK-A,BASUNDHRA  DHAKA.', '0', '900', '2019-01-28'),
(139, '1', 'RAJBARI', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'BASUNDHARA DHAKA.', '0', '0', '2019-01-28'),
(140, '1', 'ABU SAYED', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '0', 'Aziz road jogonnathpur', '0', '0', '2019-01-28'),
(142, '1', 'farhad', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'basundhara', '0', '1600', '2019-01-30'),
(143, '1', 'joynal kaka', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '0', '2019-01-30');

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
  MODIFY `transferid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cateogory`
--
ALTER TABLE `cateogory`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `charts_accounts`
--
ALTER TABLE `charts_accounts`
  MODIFY `charts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cheque`
--
ALTER TABLE `cheque`
  MODIFY `chequeno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employeesalerlist`
--
ALTER TABLE `employeesalerlist`
  MODIFY `emsaleryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `employeetype`
--
ALTER TABLE `employeetype`
  MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `expenseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `expensecat`
--
ALTER TABLE `expensecat`
  MODIFY `excat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expensecategory`
--
ALTER TABLE `expensecategory`
  MODIFY `excate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `e_payment_salery`
--
ALTER TABLE `e_payment_salery`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `e_salerykeys`
--
ALTER TABLE `e_salerykeys`
  MODIFY `salery_key_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `purchase_return`
--
ALTER TABLE `purchase_return`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `p_brand`
--
ALTER TABLE `p_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `p_size`
--
ALTER TABLE `p_size`
  MODIFY `pro_size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `recevecollection`
--
ALTER TABLE `recevecollection`
  MODIFY `recol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `role_base_access_system`
--
ALTER TABLE `role_base_access_system`
  MODIFY `rbas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `sellid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

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
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
