-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 05, 2019 at 04:39 PM
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
(22, '2019-03-30', '4', '5', '282500', 'Milon', '36', 'ct_Cash_5_4');

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
(3, '1', 'mercantile bank', '0147111000', 'mahi', '', '', 'progoti sarani', '0', '2019-03-22', '002'),
(4, '1', 'Cash', '', 'robiul', '', '', 'progoti sarani', '3670', '2019-03-31', '002'),
(5, '1', 'owners account', '', 'milon', '0', '', '', '822000', '2019-03-22', '002');

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
(74, '1', '7000', '112', '', '0'),
(75, '3', '3000', '112', '', '0');

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
(63, '2019-03-30', '20', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '90', '-1', '0', '36', 'expense_20'),
(64, '2019-03-30', '13', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '100', '-1', '0', '36', 'expense_13'),
(66, '2019-03-30', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '4400', '-1', '0', '36', 'expense_4');

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
(18, 'SOCITY BILL', '2019-01-28', '002'),
(19, 'truck unload', '2019-02-01', '002'),
(20, 'shop expense', '2019-03-31', '002');

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
(18, 'P1944', '2', '8', '', 2, '112', '411', '430', '100', '', '2019-03-31'),
(19, 'P1923', '2', '6', '', 2, '129', '391', '420', '100', '', '2019-03-31'),
(20, 'P1934', '1', '5', '23', 1, '663', '62', '64', '500', '', '2019-03-31'),
(21, 'P1926', '1', '5', '25', 1, '2594', '62', '64', '500', '', '2019-03-31'),
(22, 'P1941', '1', '5', '26', 1, '2819', '62', '64', '500', '', '2019-03-31'),
(23, 'P1928', '1', '5', '27', 1, '2205', '62', '64', '500', '', '2019-03-31'),
(24, 'P1957', '2', '20', '', 1, '60', '9', '10', '10', '', '2019-01-29'),
(25, 'P2639', '2', '1', '', 2, '0', '470', '470', '100', '', '2019-01-28'),
(26, 'P2643', '1', '5', '24', 1, '386', '62', '64', '100', '', '2019-01-28'),
(27, 'P2644', '2', '9', '', 2, '150', '421', '430', '100', '', '2019-03-21'),
(28, 'P1920', '1', '21', '28', 1, '18', '55', '58', '100', '', '2019-01-28'),
(29, 'P1913', '1', '15', '29', 1, '0', '65.5', '67', '100', '', '2019-01-28'),
(30, 'P1946', '2', '7', '', 2, '146', '390', '410', '100', '', '2019-03-31'),
(31, 'P1949', '2', '10', '', 2, '0', '476', '476', '100', '', '2019-01-28'),
(33, 'P2139', '1', '21', '33', 1, '508', '56', '58', '100', '', '2019-03-21'),
(34, 'P3111', '2', '24', '', 2, '112', '395', '430', '100', '', '2019-03-31');

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
(23, '2', 'white cement (elephant)'),
(24, '2', 'premier');

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
(32, '1', '15', '20mm 72.G 500w'),
(33, '1', '21', '8mm 40G 300W');

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
(25, '2019-03-30', '110', '82700', 'ashraf', '', '36', 'rac_Cash');

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
(163, '2019-03-30', '20193319317', '165', 'P1946', '30', '415', '', '1050', '', '0', 'Cash', '', '', '45', 's_Cash', 36),
(164, '2019-03-30', '20193319621', '23', 'P1944', '20', '420', '', '200', '', '8600', 'Cash', '', '', '78', 's_Cash', 36),
(165, '2019-03-30', '20193319711', '22', 'P1944', '30', '430', '', '300', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(166, '2019-03-30', '2019331981', '33', 'P3111', '10', '450', '', '100', '', '4600', 'Cash', '', '', '78', 's_Cash', 36),
(167, '2019-03-30', '20193319851', '53', 'P1944', '20', '430', '', '700', '', '0', 'Cash', '', '', '45', 's_Cash', 36),
(168, '2019-03-30', '201933191035', '98', 'P1944', '10', '430', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(169, '2019-03-30', '201933191151', '33', 'P3111', '1', '430', '', '0', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(170, '2019-03-30', '201933191245', '33', 'P3111', '6', '430', '', '0', '', '2580', 'Cash', '', '', '78', 's_Cash', 36),
(171, '2019-03-30', '201933191344', '33', 'P3111', '1', '430', '', '0', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(172, '2019-03-30', '20193319154', '86', 'P1923', '100', '420', '', '1200', '', '43000', 'Cash', '', '', '78', 's_Cash', 36),
(173, '2019-03-30', '20193319154', '86', 'P1946', '20', '430', '', '1200', '', '43000', 'Cash', '', '', '78', 's_Cash', 36),
(174, '2019-03-30', '201933191633', '33', 'P1944', '10', '430', '', '300', '', '4600', 'Cash', '', '', '78', 's_Cash', 36),
(175, '2019-03-30', '201933191744', '99', 'P1944', '3', '430', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(176, '2019-03-30', '201933192029', '33', 'P1923', '5', '420', '', '0', '', '2100', 'Cash', '', '', '78', 's_Cash', 36),
(178, '2019-03-30', '201933193938', '33', 'P1944', '1', '430', '', '0', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(180, '2019-03-30', '201933118327', '33', 'P1957', '10', '15', '', '0', '', '150', 'Cash', '', '', '78', 's_Cash', 36);

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
(20, '2019-03-30', '166', '164000', 'milon', NULL, '36', 'pts_Cash'),
(18, '2019-03-30', '42', '90200', 'ashraf', NULL, '36', 'pts_Cash'),
(19, '2019-03-30', '163', '118500', 'mahmud', NULL, '36', 'pts_Cash'),
(17, '2019-03-30', '100', '50000', 'ASHRAF', NULL, '36', 'pts_Cash');

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
(17, '1', 'AKTER DEWAN', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '01711471456', 'p-,r-,b-,basundhara, DHAKA', '0', '71920', '2019-01-26'),
(22, '1', 'sahajahan (parish)', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0,', 'JOGONNATHPUR, VHATARA, DHAKA', '0', '151200', '2019-03-21'),
(23, '1', 'HAJI NURUDDIN ', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0,', 'jogonnathpur, VHATARA, DHAKA', '0', '108600', '2019-03-21'),
(26, '2', 'FRESH', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'GULSHAN', 'Choose option', '0', '2019-01-28'),
(28, '2', 'SUPERCRETE', 'e10adc3949ba59abbe56e057f20f883e', 'supercreate@gmail.com', '0166666666,0,', 'GULSHAN', '0', '105000', '2019-03-21'),
(29, '1', 'ALI HOSSAIN', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0,', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '128000', '2019-03-21'),
(30, '1', 'ABDUL HAFIZ', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'BASUNDHARA', 'Choose option', '30000', '2019-01-20'),
(31, '1', 'ADOBI BUILDERS, ARISH', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '01819494622,', '17/1,pollobi,mirpur-12, DHAKA', '0', '630191', '2019-03-21'),
(32, '1', 'CAMBRIAN COLLEGE', 'e10adc3949ba59abbe56e057f20f883e', 'no@yahoo.com', '01720557151', 'Aziz ROAD, VHATARA, DHAKA', 'Choose option', '125200', '2019-01-26'),
(33, '1', '1.cash sell', 'e10adc3949ba59abbe56e057f20f883e', 'pongta@gmail.com', '0', 'N/A', '0', '0', '2018-12-20'),
(36, '0', 'admin', '6ebe76c9fb411be97b3b0d48b791a7c9', '', '', '', '', '', ''),
(41, '2', 'meghnacem deluxe', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0154782456', 'fresh villah', '0', '78000', '2019-01-28'),
(42, '2', 'seven circle bd ltd', 'e10adc3949ba59abbe56e057f20f883e', 'se@gmail.com', '01752486248,', 'gulshan', '0', '20200', '2019-03-22'),
(43, '2', 'rahim steel', 'e10adc3949ba59abbe56e057f20f883e', 'rahim@gmail.com', '01711434827,0,', 'tikatuli,dhaka', '0', '427800', '2019-03-21'),
(45, '4', 'IMRAN', 'e10adc3949ba59abbe56e057f20f883e', 'imran@gmail.com', '01912541124', 'nadda,dhaka', '4', '0', '2018-12-14'),
(46, '4', 'rasel', 'e10adc3949ba59abbe56e057f20f883e', 'rasel@gmail.com', '01824562145', 'bastola', '4', '0', '2018-12-14'),
(47, '1', 'ABDUL HAI', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '01682409301,', 'jogonnathur, vhatara, dhaka', '0', '0', '2019-03-21'),
(48, '1', 'MUKUL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '01718305050,', 'Aziz road,jogonnathpur, vhatara, dhaka', '0', '26650', '2019-03-21'),
(49, '1', 'JOSIM DHALI', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0,0,0', 'dhalibari kaca bazar, mosque roar, vhatara, dhaka', '0', '361740', '2019-03-21'),
(50, '1', 'ADOBI BUILDERS(dhanondi)', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '01819494622,', 'dhanmondi,star kabab, Dhaka', '0', '326285', '2019-03-21'),
(51, '1', 'Engr.kamrul islam', 'e10adc3949ba59abbe56e057f20f883e', 'no@gmail.com', '01711145967', 'plot-12,road-15,block-G,basundhara,dhaka', '0', '118000', '2019-01-26'),
(52, '1', 'AMINUL HAQUE', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'plot- ,road-13,block-G,basundhara,dhaka', '0', '36150', '2018-12-14'),
(53, '1', 'monowar ali', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '01711576665,01741331989,', 'plot-112,road-03,block-J,basundhara,dhaka', '0', '52900', '2019-03-21'),
(54, '1', 'ENGE. MASUD VAI', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '01711627140', 'jogonnathpur, basundhara road,dhaka', '0', '117800', '2019-01-26'),
(55, '1', 'SOUTH VISSION', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0,', 'jogonnnathpur,vhatara,dhaka', '0', '100050', '2019-03-21'),
(56, '1', 'nurjahan garden', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0,', 'JOGONNATHPUR,VHATARA,DHAKA', '0', '56755', '2019-03-21'),
(57, '1', 'KHALEK DHALI', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '01817035364', 'jogonnathpur,vhatara,dhaka', '0', '18000', '2019-01-26'),
(58, '1', 'SAHAJAHAN GAZI', 'e10adc3949ba59abbe56e057f20f883e', 'M@GMAIL.COM', '0,', 'jogonnathpur,vhatara,dhaka', '0', '219900', '2019-03-21'),
(61, '1', 'RONJONA KASEM', 'e10adc3949ba59abbe56e057f20f883e', 'no@yahoo.com', '01712069601,01812202202,', 'Plot-.road-06,block-I, Bosundhara', '0', '42300', '2019-03-21'),
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
(76, '1', 'MOSTAFA SIR', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0,', 'A', '0', '185700', '2019-03-21'),
(77, 'Choose option', 'S. P PROPERTIES', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'A', '0', '150', '2018-12-19'),
(78, '4', 'SHOP', 'e10adc3949ba59abbe56e057f20f883e', 'pongta@gmail.com', '0', 'jogonnathpur', '4', '', '2018-12-20'),
(79, '1', 'ALI NASER', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0,', 'A', '0', '895', '2019-03-21'),
(81, '1', 'KHALED', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'JOGONNATHPUR', '0', '0', '2018-12-23'),
(82, '1', 'kosru vai', 'e10adc3949ba59abbe56e057f20f883e', 's@yahoo.com', '0,', 'mosque road,jogonnathpur,dhaka', '0', '24985', '2019-03-21'),
(84, '1', 'CAR GARAGE', 'e10adc3949ba59abbe56e057f20f883e', 'mazad88@live.com', '0', 'JAGONNATHPUR', '0', '0', '2018-12-25'),
(85, '1', 'WASHING FACTORY', 'e10adc3949ba59abbe56e057f20f883e', 'h@gmail.com', '0', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '8500', '2019-01-27'),
(86, '1', 'SAMIMA MADAM', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '01979118207,', 'JOGONNATHPUR', '0', '76700', '2019-03-21'),
(88, '1', 'ASHRAF VAI(7 RING)', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '40000', '2018-12-26'),
(91, '2', 'HOLCIM', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '0', '2018-12-25'),
(92, '2', 'ALPINE TRADERS', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '0', '2018-12-25'),
(94, '1', 'LAHOR RAHMAN', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0,', 'block-l,basundhara', '0', '50000', '2019-03-21'),
(95, '1', 'OSMAN VAI', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0,', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '21135', '2019-03-21'),
(96, '1', 'FARJANA ENTERPRISE', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0,', 'A', '0', '-81650', '2019-03-21'),
(97, '1', 'SRABONI ENTERPRISE', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0,', 'A', '0', '77384', '2019-03-21'),
(98, '1', 'AZMOL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0,', 'Aziz road,jogonnathpur,vhatara,dhaka', '0', '4400', '2019-03-21'),
(99, '1', 'SOUTH BAY', 'e10adc3949ba59abbe56e057f20f883e', 'sh@gmail.com', '0,', 'PLOT-,ROAD-,BLOCK-,BASUNDHARA,DHAKA', '0', '17530', '2019-03-21'),
(100, '2', 'K.A STEEL', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0,', 'notun bazar,vhatara,dhaka', '0', '338250', '2019-03-21'),
(101, '2', 'TAREK VAI', 'e10adc3949ba59abbe56e057f20f883e', 'mazad88@live.com', '0', 'A', '0', '50000', '2018-12-26'),
(103, '1', 'ALI AJOM', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0,', 'BOSUNDHARA MURTI', '0', '5000', '2019-03-21'),
(104, '2', 'AMIR AND SONS', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0125', 'MALIBAG', '0', '0', '2019-01-19'),
(105, '2', 'iqbal vai', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'notunbazar,dhaka', '0', '0', '2019-01-19'),
(106, '2', 'HUDA TREADERS', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'KHILKHET', '0', '0', '2019-01-19'),
(107, '2', 'Patari steel', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'Sahajadpur', '0', '0', '2019-01-19'),
(109, '1', 'MAHBUB SORIF', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0', 'BASUNDHARA', '0', '0', '2019-01-21'),
(110, '1', 'AL AMIN ENTERPRISE', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0', 'saowrabazar,dhaka', '0', '0', '2019-01-24'),
(111, '1', 'AMINUL ISLAN KHAN', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0,0,0', 'road-06,block-F,basundhara,dhaka', '0', '5000', '2019-03-21'),
(112, '4', 'ROBIUL', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0', 'SHASIALI,CHANDPUR', '2', '', '2019-01-24'),
(113, '1', 'SAHABUDDIN', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '01739192421', 'MOSJID GOLI,DHAKA', '0', '11375', '2019-01-26'),
(115, '1', 'SOHIDUL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '01`671157589', 'Aziz road,jogonnathpur,vhatara,dhaka', '0', '216564', '2019-01-26'),
(117, '1', 'MOIN VAI', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '0', 'JOGONNATHPUR,VHATARA,DHAKA', '0', '17915', '2019-01-26'),
(118, '1', 'M A KHALEK', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '01713030222', 'PLOT-,ROAD-,BLOCK-A,BASUNDHARA', '0', '77780', '2019-01-26'),
(119, '1', 'SAIFUL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'A@gmail.com', '01711537018', 'plot=,road=,block=, basundhara,dhaka', '0', '37500', '2019-01-26'),
(120, '1', 'Ali sarkar', 'e10adc3949ba59abbe56e057f20f883e', 'no@yahoo.com', '01912295638', 'Aziz road,vhatara,dhaka', '0', '64025', '2019-01-26'),
(122, '1', 'Ali ashfak', 'e10adc3949ba59abbe56e057f20f883e', 'no@yahoo.com', '01781556649', 'Plot-,road-,block-F,basundhara,dhaka', '0', '21000', '2019-01-26'),
(123, '1', 'Raisul vai', 'e10adc3949ba59abbe56e057f20f883e', 'no@yahoo.com', '01712596817', 'Aziz road,jogonnathpur,vhatara,dhaka', '0', '372268', '2019-01-26'),
(124, '1', 'Faruk vau', 'e10adc3949ba59abbe56e057f20f883e', 'no@gmail.com', '01819957593', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '21250', '2019-01-26'),
(125, '1', 'RAFIQ VAI', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0', 'PLOT-388,ROAD-04,BLOCK-I,BASUNDHARA', '0', '27000', '2019-01-27'),
(126, '1', 'VUTTO VAI', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0', 'JOGONNATHPUR,VHATARA,DHAKA', '0', '6650', '2019-01-27'),
(127, '1', 'S P PROPERTISE', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmmail.com', '0', 'PLOT-,ROAD-,BLOCK-,BASUNDHARA,DHAKA', '0', '0', '2019-01-28'),
(128, '1', 'mahmud kabir', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0,', 'matborbari,jogonnathpur,vhatara,dhaka', '0', '26390', '2019-03-21'),
(129, '1', 'REJAUL KARIM', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0,0,', 'plot-,road-,block-,basundhara,dhaka', '0', '0', '2019-03-21'),
(131, '1', 'GAZI ENGINEERING', 'e10adc3949ba59abbe56e057f20f883e', 'M@GMAIL.COM', '0,', 'jogonnathpur,vhatara,dhaka', '0', '0', '2019-03-21'),
(132, '1', 'RAJIB ENGINEERING', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0,', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '2150', '2019-03-21'),
(133, '1', 'SAYED KAKA', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '430', '2019-01-27'),
(134, '1', 'KOPOTHKHO PROPERTISE', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0,', 'basundhara main road,jogonnathpur,vhatara,dhaka', '0', '0', '2019-03-21'),
(135, '1', 'ISRAFIL SARKER', 'e10adc3949ba59abbe56e057f20f883e', 'h@gmail.com', '0', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '6680', '2019-01-27'),
(136, '1', 'OTHI (MA)', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0', 'AZIZ ROAD,JOGONNATHPUR,VHATARA,DHAKA', '0', '0', '2019-01-28'),
(137, '1', 'DELIGHT HOME', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '0,', 'P-388,R-04,B-I,BASUNDHARA,DHAKA', '0', '9000', '2019-03-21'),
(138, '1', 'MONJO VAI', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0,', 'BLOCK-A,BASUNDHRA  DHAKA.', '0', '4500', '2019-03-21'),
(139, '1', 'RAJBARI', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'BASUNDHARA DHAKA.', '0', '0', '2019-01-28'),
(140, '1', 'ABU SAYED', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '0,', 'Aziz road jogonnathpur', '0', '-276160', '2019-03-21'),
(143, '1', 'joynal kaka', 'e10adc3949ba59abbe56e057f20f883e', '', '0', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '0', '2019-01-30'),
(145, '1', 'Alomgir pic-up', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'kalachandpur,gulshan,dhaka', '0', '4100', '2019-03-21'),
(147, '1', 'Azad vai', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'block-a,basundhara', '0', '12000', '2019-03-21'),
(149, '1', 'Bahar via', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'block-a,basundhara', '0', '29700', '2019-03-21'),
(150, '1', 'Basar vai', 'e10adc3949ba59abbe56e057f20f883e', 'o@gmail.com', '0,0', 'basundhara kaca bazar,basundhara road,dhaka', '0', '1409', '2019-03-21'),
(151, '1', 'Basundhara (madrasa)', 'e10adc3949ba59abbe56e057f20f883e', 'o@gmail.com', '0,', 'bloca,basundhara', '0', '0', '2019-03-21'),
(152, '1', 'Basundhara (mosjid)', 'e10adc3949ba59abbe56e057f20f883e', 'o@gmail.com', '0', 'block-a,basundhara', '0', '4720', '2019-03-21'),
(153, '1', 'Basundhara (mosjid)', 'e10adc3949ba59abbe56e057f20f883e', 'o@gmail.com', '0', 'block-a,basundhara', '0', '4720', '2019-03-21'),
(154, '1', 'Habib vai(sign board)', 'e10adc3949ba59abbe56e057f20f883e', 'M@GMAIL.COM', '0,', 'jogonnathpur,vhatara,dhaka', '0', '17866', '2019-03-21'),
(155, '1', 'K B properties', 'e10adc3949ba59abbe56e057f20f883e', 'M@GMAIL.COM', '0,0,', 'jogonnathpur', '0', '400', '2019-03-21'),
(156, '1', 'kazi johir', 'e10adc3949ba59abbe56e057f20f883e', 'M@GMAIL.COM', '0', 'basundhara road,dhaka', '0', '53200', '2019-03-21'),
(157, '1', 'khokon sir(basundhara)', 'e10adc3949ba59abbe56e057f20f883e', '0@gmail.com', '0,', 'basundhara,dhaka', '0', '0', '2019-03-21'),
(158, '1', 'khokon sir (hrrm factory)', 'e10adc3949ba59abbe56e057f20f883e', '0@gmail.com', '0', 'sahampur,dhaka', '0', '0', '2019-03-21'),
(159, '1', 'khuki khala', 'e10adc3949ba59abbe56e057f20f883e', '0@gmail.com', '0', 'jogonnathpur,vhatara,dhaka', '0', '0', '2019-03-21'),
(160, '1', 'prof.humayun kabir', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'block-l,basundhara', '0', '-105000', '2019-03-21'),
(161, '1', 'rafik uncle(salam)', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'jagannathpur,vhatara,dhaka', '0', '0', '2019-03-21'),
(162, '1', 'Taizul vai', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'block-a,basubdhara', '0', '0', '2019-03-21'),
(163, '2', 'premier cement mills ltd', 'e10adc3949ba59abbe56e057f20f883e', 'o@gmail.com', '0,', 'gulshan', '0', '46000', '2019-03-21'),
(165, '1', 'sajjad vai', 'e10adc3949ba59abbe56e057f20f883e', 'o@gmail.com', '0', 'basundhara', '0', '0', '2019-03-31'),
(166, '2', 'sevenring corporate', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '0', '', '0', '0', '2019-03-31');

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
  MODIFY `transferid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `emsaleryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `employeetype`
--
ALTER TABLE `employeetype`
  MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `expenseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `expensecat`
--
ALTER TABLE `expensecat`
  MODIFY `excat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expensecategory`
--
ALTER TABLE `expensecategory`
  MODIFY `excate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `e_payment_salery`
--
ALTER TABLE `e_payment_salery`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `e_salerykeys`
--
ALTER TABLE `e_salerykeys`
  MODIFY `salery_key_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `p_size`
--
ALTER TABLE `p_size`
  MODIFY `pro_size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `recevecollection`
--
ALTER TABLE `recevecollection`
  MODIFY `recol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `role_base_access_system`
--
ALTER TABLE `role_base_access_system`
  MODIFY `rbas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `sellid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

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
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
