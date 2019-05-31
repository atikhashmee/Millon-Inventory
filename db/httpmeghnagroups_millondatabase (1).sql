-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2019 at 07:57 PM
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
(65, '1', '20'),
(77, '4', '1'),
(78, '4', '2'),
(79, '4', '4'),
(80, '4', '6'),
(81, '4', '7'),
(82, '4', '8'),
(83, '4', '9'),
(84, '4', '10'),
(85, '4', '11'),
(86, '4', '12'),
(87, '4', '18'),
(88, '4', '19');

-- --------------------------------------------------------

--
-- Table structure for table `banktransfer`
--

CREATE TABLE `banktransfer` (
  `transferid` int(11) NOT NULL,
  `transerdate` varchar(200) NOT NULL,
  `to_account` varchar(200) NOT NULL,
  `from_account` varchar(200) NOT NULL,
  `amounts` varchar(200) NOT NULL,
  `carreier` varchar(200) NOT NULL,
  `addedby` varchar(200) NOT NULL,
  `bycashcheque` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banktransfer`
--

INSERT INTO `banktransfer` (`transferid`, `transerdate`, `to_account`, `from_account`, `amounts`, `carreier`, `addedby`, `bycashcheque`) VALUES
(32, '2019-05-14', '4', '5', '75000', 'milon', '36', 'ct_Cash_5_4'),
(33, '2019-05-14', '5', '4', '97000', 'milon', '36', 'ct_Cash_4_5'),
(34, '2019-05-15', '4', '5', '8500', 'milon', '36', 'ct_Cash_5_4'),
(35, '2019-05-15', '5', '4', '35000', 'Robiul', '36', 'ct_Cash_4_5'),
(36, '2019-05-16', '6', '4', '15000', 'milon', '36', 'ct_Cash_4_6'),
(37, '2019-05-16', '5', '4', '16500', 'milon', '36', 'ct_Cash_4_5'),
(39, '2019-05-17', '5', '4', '11000', 'robiul', '36', 'ct_Cash_4_5'),
(43, '2019-05-18', '5', '4', '114000', 'ROBIUL', '36', 'ct_Cash_4_5'),
(44, '2019-05-18', '5', '4', '43000', 'ROBIUL', '36', 'ct_Cash_4_5'),
(48, '2019-05-19', '4', '5', '522000', 'milon', '36', 'ct_Cash_5_4'),
(49, '2019-05-19', '4', '3', '171000', 'imran', '36', 'ct_Cash_3_4'),
(50, '2019-05-19', '5', '4', '18000', 'ROBIUL', '36', 'ct_Cash_4_5'),
(53, '2019-05-20', '5', '4', '158000', 'robiul', '36', 'ct_Cash_4_5'),
(54, '2019-05-21', '4', '5', '198000', 'milon', '36', 'ct_Cash_5_4'),
(55, '2019-05-21', '5', '4', '42000', 'robiul', '36', 'ct_Cash_4_5'),
(56, '2019-05-22', '5', '4', '67000', 'robiul', '36', 'ct_Cash_4_5'),
(57, '2019-05-23', '4', '5', '50000', 'imran', '36', 'ct_Cash_5_4'),
(58, '2019-05-24', '5', '4', '82000', 'robiul', '36', 'ct_Cash_4_5'),
(59, '2019-05-25', '5', '4', '41500', 'milon', '36', 'ct_Cash_4_5'),
(60, '2019-05-26', '5', '4', '148000', 'robiul', '36', 'ct_Cash_4_5'),
(63, '2019-05-27', '5', '4', '65500', 'robiul', '36', 'ct_Cash_4_5'),
(64, '2019-05-28', '4', '5', '275000', 'milon', '36', 'ct_Cash_5_4'),
(65, '2019-05-28', '5', '4', '62000', 'robiul', '36', 'ct_Cash_4_5'),
(66, '2019-05-29', '4', '5', '30000', 'robiul', '36', 'ct_Cash_5_4'),
(67, '2019-05-29', '5', '4', '119000', 'milon', '36', 'ct_Cash_4_5'),
(68, '2019-05-30', '5', '4', '93500', 'r0biul', '36', 'ct_Cash_4_5'),
(69, '2019-05-31', '5', '4', '23000', 'r0biul', '36', 'ct_Cash_4_5');

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
(4, '1', 'Cash', '', 'robiul', '', '', 'progoti sarani', '3500', '2019-05-15', '002'),
(5, '1', 'owners account', '', 'milon', '0', '', '', '319500', '2019-05-15', '002'),
(6, '1', 'sadi', '', '', '', '', '', '0', '2019-05-16', '002');

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
(1, 'pts_1', '42', '35667', '3', '2019-01-03', '89200', '36', 'minus', 0, 'Ashraf'),
(2, 's_201952214937', '47', '78657', 'ific', '2019-05-27', '85900', '36', 'add', 1, '36');

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
(102, '2019-05-14', '15', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '50', '-1', '0', '36', 'expense_15'),
(103, '2019-05-14', '22', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '2200', '-1', '0', '36', 'expense_22'),
(105, '2019-05-14', '23', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '160', '-1', '0', '36', 'expense_23'),
(106, '2019-05-14', '10', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '20', '-1', '0', '36', 'expense_10'),
(107, '2019-05-14', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '1500', '-1', '0', '36', 'expense_4'),
(108, '2019-05-14', '5', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '850', '-1', '0', '36', 'expense_5'),
(109, '2019-05-15', '20', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '150', '-1', '0', '36', 'expense_20'),
(110, '2019-05-15', '20', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '40', '-1', '0', '36', 'expense_20'),
(111, '2019-05-15', '18', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '200', '-1', '0', '36', 'expense_18'),
(112, '2019-05-15', '5', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '2500', '-1', '0', '36', 'expense_5'),
(113, '2019-05-15', '21', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '500', '-1', '0', '36', 'expense_21'),
(115, '2019-05-15', '10', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '100', '-1', '0', '36', 'expense_10'),
(116, '2019-05-15', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '2100', '-1', '0', '36', 'expense_4'),
(118, '2019-05-15', '23', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '220', '-1', '0', '36', 'expense_23'),
(119, '2019-05-16', '8', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '4500', '-1', '0', '36', 'expense_8'),
(120, '2019-05-16', '15', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '60', '-1', '0', '36', 'expense_15'),
(121, '2019-05-16', '10', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '50', '-1', '0', '36', 'expense_10'),
(122, '2019-05-16', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '1360', '-1', '0', '36', 'expense_4'),
(123, '2019-05-16', '23', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '190', '-1', '0', '36', 'expense_23'),
(124, '2019-05-17', '10', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '650', '-1', '0', '36', 'expense_10'),
(125, '2019-05-17', '15', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '60', '-1', '0', '36', 'expense_15'),
(126, '2019-05-17', '20', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '40', '-1', '0', '36', 'expense_20'),
(128, '2019-05-18', '8', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '5000', '-1', '0', '36', 'expense_8'),
(129, '2019-05-18', '23', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '230', '-1', '0', '36', 'expense_23'),
(130, '2019-05-18', '8', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '5000', '-1', '0', '36', 'expense_8'),
(131, '2019-05-18', '17', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '20', '-1', '0', '36', 'expense_17'),
(132, '2019-05-18', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '2600', '-1', '0', '36', 'expense_4'),
(134, '2019-05-19', '23', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '190', '-1', '0', '36', 'expense_23'),
(135, '2019-05-19', '20', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '20', '-1', '0', '36', 'expense_20'),
(136, '2019-05-19', '10', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '30', '-1', '0', '36', 'expense_10'),
(137, '2019-05-19', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '2150', '-1', '0', '36', 'expense_4'),
(138, '2019-05-20', '5', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '800', '-1', '0', '36', 'expense_5'),
(139, '2019-05-20', '15', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '150', '-1', '0', '36', 'expense_15'),
(142, '2019-05-20', '23', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '140', '-1', '0', '36', 'expense_23'),
(143, '2019-05-20', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '1550', '-1', '0', '36', 'expense_4'),
(144, '2019-05-20', '14', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '130', '-1', '0', '36', 'expense_14'),
(145, '2019-05-20', '3', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '40', '-1', '0', '36', 'expense_3'),
(146, '2019-05-21', '20', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '40', '-1', '0', '36', 'expense_20'),
(147, '2019-05-21', '23', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '190', '-1', '0', '36', 'expense_23'),
(148, '2019-05-21', '20', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '60', '-1', '0', '36', 'expense_20'),
(149, '2019-05-21', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '2500', '-1', '0', '36', 'expense_4'),
(150, '2019-05-21', '8', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '2500', '-1', '0', '36', 'expense_8'),
(151, '2019-05-22', '5', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '2250', '-1', '0', '36', 'expense_5'),
(152, '2019-05-22', '8', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '7140', '-1', '0', '36', 'expense_8'),
(153, '2019-05-22', '23', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '220', '-1', '0', '36', 'expense_23'),
(154, '2019-05-22', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '4300', '-1', '0', '36', 'expense_4'),
(155, '2019-05-22', '15', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '100', '-1', '0', '36', 'expense_15'),
(156, '2019-05-22', '17', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '100', '-1', '0', '36', 'expense_17'),
(157, '2019-05-22', '20', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '100', '-1', '0', '36', 'expense_20'),
(158, '2019-05-23', '15', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '150', '-1', '0', '36', 'expense_15'),
(160, '2019-05-23', '23', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '190', '-1', '0', '', 'expense_23'),
(161, '2019-05-22', '20', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '210', '-1', '0', '36', 'expense_20'),
(162, '2019-05-23', '8', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '9500', '-1', '0', '36', 'expense_8'),
(163, '2019-05-24', '15', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '60', '-1', '0', '36', 'expense_15'),
(164, '2019-05-24', '17', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '390', '-1', '0', '36', 'expense_17'),
(165, '2019-05-24', '24', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '100', '-1', '0', '36', 'expense_24'),
(166, '2019-05-24', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '5500', '-1', '0', '36', 'expense_4'),
(167, '2019-05-25', '23', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '190', '-1', '0', '36', 'expense_23'),
(168, '2019-05-25', '17', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '20', '-1', '0', '36', 'expense_17'),
(169, '2019-05-25', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '2550', '-1', '0', '36', 'expense_4'),
(170, '2019-05-26', '5', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '750', '-1', '0', '36', 'expense_5'),
(172, '2019-05-26', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '3720', '-1', '0', '36', 'expense_4'),
(173, '2019-05-27', '23', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '340', '-1', '0', '36', 'expense_23'),
(176, '2019-05-27', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '720', '-1', '0', '', 'expense_4'),
(177, '2019-05-26', '23', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '300', '-1', '0', '36', 'expense_23'),
(181, '2019-05-26', '20', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '25', '-1', '0', '36', 'expense_20'),
(182, '2019-05-28', '15', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '50', '-1', '0', '36', 'expense_15'),
(183, '2019-05-28', '23', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '170', '-1', '0', '36', 'expense_23'),
(184, '2019-05-28', '20', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '20', '-1', '0', '36', 'expense_20'),
(185, '2019-05-28', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '1800', '-1', '0', '36', 'expense_4'),
(186, '2019-05-27', '20', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '30', '-1', '0', '36', 'expense_20'),
(187, '2019-05-29', '8', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '12500', '-1', '0', '36', 'expense_8'),
(188, '2019-05-29', '23', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '170', '-1', '0', '36', 'expense_23'),
(189, '2019-05-29', '2', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '54000', '-1', '0', '36', 'expense_2'),
(190, '2019-05-29', '10', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '4000', '-1', '0', '36', 'expense_10'),
(191, '2019-05-29', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '2450', '-1', '0', '36', 'expense_4'),
(192, '2019-05-29', '27', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '22000', '45', '4', '36', 'stuff_27_45'),
(194, '2019-05-29', '29', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '90', '-1', '0', '36', 'expense_29'),
(195, '2019-05-30', '5', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '1100', '-1', '0', '36', 'expense_5'),
(196, '2019-05-30', '27', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '50', '-1', '0', '36', 'expense_27'),
(197, '2019-05-30', '20', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '30', '-1', '0', '36', 'expense_20'),
(198, '2019-05-30', '23', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '190', '-1', '0', '36', 'expense_23'),
(199, '2019-05-30', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '2600', '-1', '0', '36', 'expense_4'),
(200, '2019-05-31', '17', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '550', '-1', '0', '36', 'expense_17'),
(201, '2019-05-30', '26', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '4500', '112', '2', '36', 'stuff_26_112'),
(202, '2019-05-31', '4', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '3450', '-1', '0', '36', 'expense_4'),
(203, '2019-05-31', '5', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '700', '-1', '0', '36', 'expense_5'),
(204, '2019-05-31', '15', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '120', '-1', '0', '36', 'expense_15'),
(205, '2019-05-30', '26', '<br />\r\n<b>Notice</b>:  Undefined index: charts_id in <b>/home/httpmeghnagroups/public_html/expenditure.php</b> on line <b>93</b><br />\r\n', '4500', '112', '2', '', 'stuff_26_112');

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
(20, 'shop expense', '2019-03-31', '002'),
(21, 'bike oil', '2019-04-23', '002'),
(22, 'callan book', '2019-05-15', '002'),
(23, 'iftari', '2019-05-15', '002'),
(24, 'mobile Bill', '2019-05-27', '002'),
(26, 'selary', '2019-05-29', '002'),
(27, 'bonus', '2019-05-29', '002'),
(28, 'Cash extra', '2019-05-29', '002'),
(29, 'Cash short', '2019-05-29', '002');

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
(18, 'P1944', '2', '8', '', 2, '24', '411', '430', '100', '', '2019-05-15'),
(19, 'P1923', '2', '6', '', 2, '171', '391', '420', '100', '', '2019-05-15'),
(20, 'P1934', '1', '5', '23', 1, '366', '62', '64', '500', '', '2019-05-15'),
(21, 'P1926', '1', '5', '25', 1, '860', '62', '64', '500', '', '2019-05-15'),
(22, 'P1941', '1', '5', '26', 1, '1972', '62', '64', '500', '', '2019-05-15'),
(23, 'P1928', '1', '5', '27', 1, '493', '62', '64', '500', '', '2019-05-15'),
(24, 'P1957', '2', '20', '', 1, '10', '9', '10', '10', '', '2019-05-15'),
(25, 'P2639', '2', '1', '', 2, '0', '470', '470', '100', '', '2019-01-28'),
(26, 'P2643', '1', '5', '24', 1, '378', '62', '64', '100', '', '2019-04-20'),
(27, 'P2644', '2', '9', '', 2, '0', '421', '430', '100', '', '2019-04-16'),
(28, 'P1920', '1', '21', '28', 1, '18', '55', '58', '100', '', '2019-01-28'),
(30, 'P1946', '2', '7', '', 2, '82', '398', '410', '100', '', '2019-05-15'),
(33, 'P2139', '1', '21', '33', 1, '418', '56', '58', '100', '', '2019-05-15'),
(34, 'P3111', '2', '24', '', 2, '2', '395', '430', '100', '', '2019-05-15'),
(35, 'P1913', '2', '26', '', 2, '0', '390', '410', '100', '', '2019-05-19'),
(36, 'P2257', '2', '10', '', 2, '0', '430', '430', '100', '', '2019-05-22'),
(37, 'P2752', '2', '18', '', 2, '0', '400', '420', '100', '', '2019-05-28');

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
(45, '201951695533', '2019-05-16', '166', 'P1944', '200', '390', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(46, '2019516101139', '2019-05-16', '166', 'P2644', '200', '410', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(47, '201951712847', '2019-05-17', '43', 'P1928', '8', 'O', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(48, '201951881332', '2019-05-17', '41', 'P1923', '200', '390', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(49, '20195193317', '2019-05-18', '175', 'P1957', '50', '0', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(50, '2019519111324', '2019-05-19', '196', 'P1946', '100', '398', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(51, '2019519115126', '2019-05-19', '26', 'P1913', '300', '390', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(52, '201952010635', '2019-05-20', '26', 'P1923', '200', '390', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(53, '201952010757', '2019-05-19', '100', 'P1934', '407', '61.5', '75', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(54, '201952010757', '2019-05-19', '100', 'P1920', '221', '55.5', '75', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(55, '2019520105718', '2019-05-20', '196', 'P1946', '50', '400', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(56, '2019520105718', '2019-05-20', '196', 'P1928', '113', '60', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(57, '2019521112643', '2019-05-21', '199', 'P1934', '545.10', '62.7', '196', '400', '', '62260', 'Cash', '', '', '36', 'p_Cash'),
(58, '2019521112643', '2019-05-21', '199', 'P1926', '438.40', '62.7', '196', '400', '', '62260', 'Cash', '', '', '36', 'p_Cash'),
(59, '201952283032', '2019-05-21', '175', 'P1957', '50', 'O', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(60, '20195228538', '2019-05-16', '166', 'P2257', '200', '430', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(64, '201952294414', '2019-05-22', '43', 'P1928', '2000', '62', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(65, '201952294317', '2019-05-22', '43', 'P1941', '1015', '62', '', '', '', '0', 'Cash', '', '930', '36', 'p_Cash'),
(66, '201952293519', '2019-05-22', '43', 'P1934', '4074', '62', '', '', '', '0', 'Cash', '', '4588', '36', 'p_Cash'),
(67, '201952294149', '2019-05-22', '43', 'P1926', '3004', '62', '', '', '', '0', 'Cash', '', '248', '36', 'p_Cash'),
(68, '201952210352', '2019-05-23', '166', 'P1944', '400', '390', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(69, '20195221085', '2019-05-23', '26', 'P1923', '200', '395', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(70, '2019522102939', '2019-05-22', '200', 'P1944', '120', '410', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(71, '2019522102939', '2019-05-22', '200', 'P2644', '30', '410', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(73, '2019527112436', '2019-05-27', '166', 'P2644', '200', '405', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(74, '2019527115211', '2019-05-26', '207', 'P2752', '10', '400', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(75, '2019527132613', '2019-05-27', '166', 'P1944', '200', '390', '', '', '', '', 'Cash', '', '', '36', 'p_Cash'),
(76, '2019529114754', '2019-05-28', '26', 'P1923', '100', '390', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(77, '2019529114859', '2019-05-28', '175', 'P1957', '50', '0', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(78, '2019529115043', '2019-05-28', '207', 'P2752', '20', '400', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(79, '201952813549', '2019-05-29', '166', 'P2644', '300', '405', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(80, '2019531113811', '2019-05-30', '200', 'P1944', '50', '400', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(81, '2019531113811', '2019-05-30', '200', 'P2644', '50', '400', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(82, '2019531113920', '2019-05-31', '166', 'P1944', '200', '390', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash'),
(83, '2019531114118', '2019-05-31', '26', 'P1923', '200', '390', '', '', '', '0', 'Cash', '', '', '36', 'p_Cash');

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
(24, '2', 'premier'),
(25, '2', 'FRESH'),
(26, '2', 'FRESH SPECIAL (ND)'),
(27, '2', 'FRESH SUPER (ND)'),
(28, '2', 'MEGNACEM DELUXE SUPER'),
(29, '2', 'MEGNACEM DELUXE SUPER(ND)');

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
(41, '2019-05-14', '183', '27900', 'milon', '', '36', 'rac_Cash'),
(42, '2019-05-15', '185', '12900', 'Robiul', '', '36', 'rac_Cash'),
(43, '2019-05-15', '184', '4300', 'Milon', '', '36', 'rac_Cash'),
(44, '2019-05-15', '86', '10750', 'Robiul', '', '36', 'rac_Cash'),
(45, '2019-05-16', '189', '169000', 'milon', '', '36', 'rac_Cash'),
(46, '2019-05-16', '53', '25000', 'imran', '', '36', 'rac_Cash'),
(47, '2019-05-16', '190', '1780', 'robiul', '', '36', 'rac_Cash'),
(48, '2019-05-18', '23', '8600', 'imran', '', '36', 'rac_Cash'),
(49, '2019-05-18', '157', '114000', 'milon', '', '36', 'rac_Cash'),
(50, '2019-05-18', '194', '11100', 'robiul', '', '36', 'rac_Cash'),
(52, '2019-05-18', '195', '4400', 'imran', '', '36', 'rac_Cash'),
(54, '2019-05-18', '179', '11700', 'robiul', '75', '36', 'rac_Cash'),
(55, '2019-05-18', '98', '8600', 'robiul', '100', '36', 'rac_Cash'),
(56, '2019-05-19', '129', '24900', 'imran', '', '36', 'rac_Cash'),
(58, '2019-05-19', '109', '40000', 'imran', '', '36', 'rac_Cash'),
(59, '2019-05-20', '173', '4500', 'robiul', '', '36', 'rac_Cash'),
(60, '2019-05-20', '49', '150000', 'imran', '', '36', 'rac_Cash'),
(61, '2019-05-20', '198', '290', 'robiul', '', '36', 'rac_Cash'),
(62, '2019-05-21', '184', '1320', 'robiul', '', '36', 'rac_Cash'),
(63, '2019-05-21', '171', '1740', 'Robiul', '', '36', 'rac_Cash'),
(64, '2019-05-21', '98', '1600', 'Robiul', '', '36', 'rac_Cash'),
(65, '2019-05-21', '191', '10000', 'imran', '', '36', 'rac_Cash'),
(66, '2019-05-21', '187', '26500', 'imran', '', '36', 'rac_Cash'),
(67, '2019-05-22', '48', '100000', 'imran', '', '36', 'rac_Cash'),
(68, '2019-05-22', '23', '8600', 'robiul', '', '36', 'rac_Cash'),
(69, '2019-05-23', '95', '4500', 'robiul', '', '36', 'rac_Cash'),
(70, '2019-05-24', '58', '2250', 'robiul', '', '36', 'rac_Cash'),
(71, '2019-05-24', '160', '19250', 'imran', '', '36', 'rac_Cash'),
(72, '2019-05-24', '189', '82600', 'milon', '', '36', 'rac_Cash'),
(73, '2019-05-26', '86', '202500', 'robiul', '', '36', 'rac_Cash'),
(74, '2019-05-25', '160', '1000', 'imran', '', '36', 'rac_Cash'),
(75, '2019-05-26', '140', '200000', 'robiul', '', '36', 'rac_Cash'),
(76, '2019-05-27', '194', '16600', 'robiul', '', '36', 'rac_Cash'),
(77, '2019-05-26', '187', '50000', 'imran', '', '36', 'rac_Cash'),
(78, '2019-05-26', '197', '16500', 'imran', '100', '36', 'rac_Cash'),
(79, '2019-05-27', '94', '35000', 'imran', '', '36', 'rac_Cash'),
(81, '2019-05-28', '189', '123900', 'milon', '', '36', 'rac_Cash'),
(82, '2019-05-29', '198', '12600', 'robiul', '', '36', 'rac_Cash'),
(83, '2019-05-29', '23', '8600', 'robiul', '', '36', 'rac_Cash'),
(84, '2019-05-29', '49', '100000', 'imran', '', '36', 'rac_Cash'),
(85, '2019-05-30', '82', '30000', 'imran', '', '36', 'rac_Cash'),
(86, '2019-05-30', '76', '50000', 'imran', '', '36', 'rac_Cash'),
(87, '2019-05-30', '98', '10900', 'imran', '', '36', 'rac_Cash');

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
(26, '16', '20', '1'),
(27, '112', '4', '0'),
(28, '112', '4', '1'),
(29, '112', '6', '0'),
(30, '112', '6', '1'),
(31, '112', '6', '3');

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
(286, '2019-05-14', '201951410345', '95', 'P1923', '10', '420', '', '120', '', '5000', 'Cash', '', '', '78', 's_Cash', 36),
(287, '2019-05-14', '2019514103855', '22', 'P1944', '20', '430', '', '200', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(289, '2019-05-14', '2019515112051', '33', 'P1923', '20', '415', '', '200', '', '8500', 'Cash', '', '', '78', 's_Cash', 36),
(290, '2019-05-14', '2019515103156', '182', 'P1923', '6', '420', '', '60', '', '5000', 'Cash', '', '', '78', 's_Cash', 36),
(291, '2019-05-14', '2019515101734', '174', 'P1944', '1', '430', '', '', '', '3010', 'Cash', '', '', '78', 's_Cash', 36),
(292, '2019-05-14', '2019515105040', '33', 'P1923', '20', '410', '', '200', '', '8400', 'Cash', '', '', '78', 's_Cash', 36),
(293, '2019-05-14', '2019514113141', '23', 'P1944', '3', '420', '', '50', '', '8600', 'Cash', '', '', '78', 's_Cash', 36),
(294, '2019-05-14', '2019514113141', '23', 'P3111', '2', '420', '', '50', '', '8600', 'Cash', '', '', '78', 's_Cash', 36),
(295, '2019-05-14', '2019514113410', '33', 'P1957', '5', '15', '', '', '', '70', 'Cash', '', '5', '78', 's_Cash', 36),
(296, '2019-05-14', '2019514113542', '33', 'P1923', '4', '420', '', '', '', '1680', 'Cash', '', '', '78', 's_Cash', 36),
(297, '2019-05-14', '2019514114211', '33', 'P1923', '2', '420', '', '', '', '840', 'Cash', '', '', '78', 's_Cash', 36),
(298, '2019-05-14', '2019514114327', '33', 'P1946', '10', '440', '', '100', '', '4500', 'Cash', '', '', '78', 's_Cash', 36),
(299, '2019-05-14', '2019514114555', '33', 'P1941', '171', '63', '33', '100', '', '25900', 'Cash', '', '', '78', 's_Cash', 36),
(300, '2019-05-14', '2019514114555', '33', 'P1928', '238', '63', '33', '100', '', '25900', 'Cash', '', '', '78', 's_Cash', 36),
(301, '2019-05-14', '2019514114833', '33', 'P1923', '10', '420', '', '100', '', '4300', 'Cash', '', '', '78', 's_Cash', 36),
(302, '2019-05-14', '2019514121150', '140', 'P1946', '45', '420', '', '450', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(307, '2019-05-15', '201951413105', '86', 'P1923', '15', '420', '', '150', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(308, '2019-05-15', '2019514124543', '33', 'P1923', '12', '420', '', '130', '', '5170', 'Cash', '', '', '78', 's_Cash', 36),
(309, '2019-05-15', '2019514124850', '33', 'P1923', '12', '430', '', '120', '', '5280', 'Cash', '', '', '78', 's_Cash', 36),
(310, '2019-05-15', '201951412561', '184', 'P1923', '10', '420', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(311, '2019-05-15', '2019515134054', '168', 'P1923', '2', '430', '', '', '', '12390', 'Cash', '', '', '78', 's_Cash', 36),
(312, '2019-05-15', '2019515134254', '169', 'P1946', '15', '405', '', '525', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(313, '2019-05-15', '2019515134452', '48', 'P1946', '2', '440', '', '20', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(314, '2019-05-15', '201951513475', '33', 'P1923', '20', '415', '', '200', '', '8500', 'Cash', '', '', '78', 's_Cash', 36),
(315, '2019-05-15', '2019515134819', '33', 'P1923', '1', '420', '', '', '', '420', 'Cash', '', '', '78', 's_Cash', 36),
(316, '2019-05-15', '2019515134939', '182', 'P1923', '6', '420', '', '60', '', '', 'Cash', '', '', '78', 's_Cash', 36),
(317, '2019-05-15', '2019515163633', '22', 'P1946', '10', '430', '', '100', '', '', 'Cash', '', '', '78', 's_Cash', 36),
(318, '2019-05-15', '201951682046', '33', 'P1923', '1', '420', '', '', '', '420', 'Cash', '', '', '78', 's_Cash', 36),
(321, '2019-05-16', '2019516101258', '185', 'P1944', '30', '420', '', '300', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(322, '2019-05-16', '201951610163', '22', 'P1944', '10', '430', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(323, '2019-05-16', '201951610202', '140', 'P1944', '5', '430', '', '50', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(324, '2019-05-16', '2019516102426', '189', 'P2644', '200', '415', '', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(325, '2019-05-16', '2019516103450', '190', 'P1944', '4', '430', '', '60', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(326, '2019-05-16', '201951610391', '33', 'P1944', '3', '430', '', '0', '', '1290', 'Cash', '', '', '78', 's_Cash', 36),
(327, '2019-05-16', '201951610436', '33', 'P1923', '10', '420', '', '100', '', '4300', 'Cash', '', '', '78', 's_Cash', 36),
(328, '2019-05-16', '2019516104545', '22', 'P1944', '20', '430', '', '200', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(329, '2019-05-16', '2019516164142', '33', 'P1944', '1', '430', '', '0', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(330, '2019-05-16', '201951620227', '191', 'P1923', '10', '430', '', '300', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(331, '2019-05-16', '2019516202552', '33', 'P1944', '1', '430', '', '', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(332, '2019-05-15', '201951682326', '187', 'P1941', '471', '65', '80', '350', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(333, '2019-05-15', '201951682326', '187', 'P1926', '54', '65', '80', '350', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(334, '2019-05-16', '2019516203853', '23', 'P1944', '15', '420', '', '150', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(335, '2019-05-16', '2019516204139', '33', 'P1944', '7', '430', '', '', '', '3010', 'Cash', '', '', '78', 's_Cash', 36),
(336, '2019-05-16', '201951620582', '33', 'P1957', '4', '15', '', '', '', '60', 'Cash', '', '', '78', 's_Cash', 36),
(337, '2019-05-17', '2019517114126', '192', 'P1944', '1', '430', '', '0', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(338, '2019-05-17', '2019517115755', '140', 'P1944', '5', '430', '', '50', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(339, '2019-05-17', '2019517115755', '140', 'P1944', '5', '430', '', '50', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(340, '2019-05-17', '201951712422', '140', 'P1928', '263', '63.5', '50', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(341, '2019-05-17', '20195188859', '98', 'P1944', '10', '425', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(343, '2019-05-17', '201951881431', '33', 'P1923', '2', '420', '', '', '', '840', 'Cash', '', '', '78', 's_Cash', 36),
(348, '2019-05-17', '201951881544', '33', 'P1944', '20', '430', '', '600', '', '9200', 'Cash', '', '', '78', 's_Cash', 36),
(349, '2019-05-17', '20195188179', '33', 'P1923', '3', '420', '', '80', '', '1340', 'Cash', '', '', '78', 's_Cash', 36),
(350, '2019-05-18', '20195189310', '23', 'P1944', '20', '420', '', '200', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(351, '2019-05-18', '201951893753', '98', 'P1944', '10', '425', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(352, '2019-05-18', '201951894048', '49', 'P1944', '10', '430', '', '200', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(353, '2019-05-18', '2019518111725', '33', 'P1944', '10', '430', '', '100', '', '4400', 'Cash', '', '', '78', 's_Cash', 36),
(357, '2019-05-18', '201951813440', '33', 'P1923', '4', '420', '', '', '', '1680', 'Cash', '', '', '78', 's_Cash', 36),
(358, '2019-05-18', '2019518141631', '33', 'P1923', '10', '420', '', '150', '', '4350', 'Cash', '', '', '78', 's_Cash', 36),
(359, '2019-05-18', '201951814197', '184', 'P1944', '3', '430', '', '30', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(360, '2019-05-18', '201951817406', '33', 'P1923', '1', '420', '', '', '', '420', 'Cash', '', '', '78', 's_Cash', 36),
(361, '2019-05-18', '2019518174612', '33', 'P1923', '1', '420', '', '', '', '420', 'Cash', '', '', '78', 's_Cash', 36),
(362, '2019-05-18', '2019518174947', '194', 'P1923', '7', '420', '', '70', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(363, '2019-05-18', '2019518175122', '194', 'P1941', '57', '64', '12', '40', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(364, '2019-05-18', '201951818057', '195', 'P1923', '20', '420', '', '300', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(365, '2019-05-18', '2019518201240', '109', 'P1926', '188', '64', '68', '200', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(366, '2019-05-18', '20195193236', '33', 'P1923', '1', '0', '', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(367, '2019-05-18', '20195193450', '33', 'P1957', '30', '13', '', '', '', '380', 'Cash', '', '10', '78', 's_Cash', 36),
(368, '2019-05-19', '2019519115650', '157', 'P1913', '300', '380', '', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(369, '2019-05-19', '201951912721', '187', 'P1923', '10', '435', '', '300', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(370, '2019-05-19', '2019519121020', '33', 'P1923', '3', '420', '', '40', '', '1300', 'Cash', '', '', '78', 's_Cash', 36),
(371, '2019-05-19', '2019519121228', '197', 'P1946', '40', '415', '', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(372, '2019-05-19', '2019519121418', '129', 'P1946', '60', '415', '', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(373, '2019-05-19', '201951912245', '182', 'P1923', '1', '420', '', '10', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(374, '2019-05-19', '201951912287', '33', 'P1923', '1', '420', '', '', '', '420', 'Cash', '', '', '78', 's_Cash', 36),
(375, '2019-05-19', '2019519123012', '192', 'P1923', '1', '420', '', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(376, '2019-05-19', '2019519123152', '33', 'P1923', '5', '420', '', '50', '', '2150', 'Cash', '', '', '78', 's_Cash', 36),
(377, '2019-05-19', '2019519133040', '194', 'P1923', '23', '420', '', '230', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(378, '2019-05-19', '2019519133249', '95', 'P1923', '10', '420', '', '120', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(379, '2019-05-19', '201951916190', '33', 'P1923', '2', '420', '', '', '', '840', 'Cash', '', '', '78', 's_Cash', 36),
(381, '2019-05-19', '2019519173148', '22', 'P1944', '5', '430', '', '50', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(382, '2019-05-19', '2019519173535', '22', 'P1923', '15', '420', '', '150', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(383, '2019-05-19', '2019519174433', '33', 'P1923', '20', '420', '', '200', '', '8600', 'Cash', '', '', '78', 's_Cash', 36),
(384, '2019-05-19', '2019519165544', '33', 'P1923', '50', '420', '', '500', '', '21500', 'Cash', '', '', '78', 's_Cash', 36),
(385, '2019-05-19', '2019520103110', '140', 'P1934', '518', '63.5', '98', '200', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(386, '2019-05-19', '2019520103110', '140', 'P1941', '114', '63.5', '98', '200', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(387, '2019-05-20', '201952011102', '48', 'P1926', '688', '64', '124', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(388, '2019-05-20', '201952011102', '48', 'P1941', '58', '64', '124', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(389, '2019-05-20', '201952011102', '48', 'P1928', '113', '64', '124', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(390, '2019-05-20', '201952011240', '33', 'P1923', '2', '420', '', '', '', '840', 'Cash', '', '', '78', 's_Cash', 36),
(391, '2019-05-20', '2019520112552', '173', 'P1923', '10', '420', '', '150', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(392, '2019-05-20', '2019520112759', '187', 'P1923', '10', '435', '', '300', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(393, '2019-05-20', '2019520113439', '33', 'P1923', '1', '410', '', '', '', '410', 'Cash', '', '', '78', 's_Cash', 36),
(394, '2019-05-20', '2019520115552', '33', 'P1923', '5', '410', '', '50', '', '2100', 'Cash', '', '', '78', 's_Cash', 36),
(395, '2019-05-20', '20195219628', '33', 'P1923', '1', '420', '', '', '', '420', 'Cash', '', '', '78', 's_Cash', 36),
(396, '2019-05-20', '20195219849', '140', 'P1946', '50', '420', '', '700', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(397, '2019-05-20', '20195219849', '140', 'P1923', '20', '420', '', '700', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(398, '2019-05-20', '201952191249', '23', 'P1923', '10', '420', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(399, '2019-05-20', '201952194426', '198', 'P1923', '5', '420', '', '50', '', '2150', 'Cash', '', '', '78', 's_Cash', 36),
(400, '2019-05-21', '201952195635', '33', 'P1923', '2', '420', '', '30', '', '870', 'Cash', '', '', '78', 's_Cash', 36),
(401, '2019-05-21', '201952195854', '191', 'P1923', '10', '430', '', '300', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(403, '2019-05-21', '201952110527', '198', 'P1923', '5', '420', '', '50', '', '2000', 'Cash', '', '', '78', 's_Cash', 36),
(404, '2019-05-21', '2019521101453', '33', 'P1923', '10', '410', '', '100', '', '4200', 'Cash', '', '', '78', 's_Cash', 36),
(405, '2019-05-21', '2019521101751', '33', 'P1957', '10', '15', '', '', '', '150', 'Cash', '', '', '78', 's_Cash', 36),
(406, '2019-05-21', '201952110219', '33', 'P1923', '25', '415', '', '250', '', '10625', 'Cash', '', '', '78', 's_Cash', 36),
(407, '2019-05-21', '2019521111430', '95', 'P1923', '10', '420', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(408, '2019-05-21', '201952111196', '173', 'P1923', '20', '420', '', '300', '', '8700', 'Cash', '', '', '78', 's_Cash', 36),
(409, '2019-05-21', '201952114345', '48', 'P1934', '546', '64', '160', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(410, '2019-05-21', '201952114345', '48', 'P1926', '439', '64', '160', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(411, '2019-05-21', '201952114953', '98', 'P2139', '27', '58', '', '54', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(412, '2019-05-21', '201952110115', '22', 'P1923', '30', '430', '', '300', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(413, '2019-05-21', '201952282638', '86', 'P1934', '229', '63', '84', '166', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(414, '2019-05-21', '201952282638', '86', 'P1941', '338', '63', '84', '166', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(415, '2019-05-21', '201952282946', '33', 'P1923', '1', '', '', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(416, '2019-05-21', '201952283348', '33', 'P1923', '2', '420', '', '', '', '840', 'Cash', '', '', '78', 's_Cash', 36),
(419, '2019-05-21', '201952283928', '33', 'P1923', '1', '420', '', '', '', '420', 'Cash', '', '', '78', 's_Cash', 36),
(420, '2019-05-21', '201952284045', '58', 'P1923', '05', '450', '', '50', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(421, '2019-05-16', '201952285522', '189', 'P2257', '200', '430', '', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(422, '2019-05-21', '201952291729', '33', 'P1957', '32', '10', '', '', '', '320', 'Cash', '', '', '78', 's_Cash', 36),
(423, '2019-05-21', '201952283441', '187', 'P1923', '20', '430', '', '700', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(424, '2019-05-22', '2019522101340', '198', 'P1923', '5', '420', '', '50', '', '2000', 'Cash', '', '', '78', 's_Cash', 36),
(425, '2019-05-22', '2019522101723', '98', 'P1944', '10', '430', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(426, '2019-05-22', '2019522101723', '98', 'P1926', '11', '65', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(427, '2019-05-22', '2019522103337', '33', 'P1944', '50', '410', '', '1500', '', '22000', 'Cash', '', '', '78', 's_Cash', 36),
(428, '2019-05-22', '201952210374', '33', 'P1944', '20', '420', '', '200', '', '8600', 'Cash', '', '', '78', 's_Cash', 36),
(429, '2019-05-22', '201952210417', '22', 'P2644', '20', '440', '', '200', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(430, '2019-05-22', '201952210453', '33', 'P1944', '30', '430', '', '900', '', '13800', 'Cash', '', '', '78', 's_Cash', 36),
(431, '2019-05-22', '2019522104728', '49', 'P1944', '20', '430', '', '400', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(432, '2019-05-22', '2019522105042', '23', 'P1944', '10', '420', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(433, '2019-05-22', '201952210558', '33', 'P2644', '1', '440', '', '', '', '440', 'Cash', '', '', '78', 's_Cash', 36),
(434, '2019-05-22', '2019522105629', '86', 'P1928', '413', '63', '81', '200', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(435, '2019-05-22', '2019522105921', '33', 'P2644', '1', '440', '', '', '', '440', 'Cash', '', '', '78', 's_Cash', 36),
(436, '2019-05-22', '201952211052', '33', 'P2644', '5', '440', '', '50', '', '2250', 'Cash', '', '', '78', 's_Cash', 36),
(437, '2019-05-22', '201952211430', '187', 'P1934', '75', '65', '45', '200', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(438, '2019-05-22', '201952211430', '187', 'P1941', '120', '65', '45', '200', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(440, '2019-05-23', '2019522112851', '82', 'P1944', '5', '430', '99', '75', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(441, '2019-05-23', '2019522112851', '82', 'P1934', '114', '64', '99', '75', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(442, '2019-05-23', '2019522112851', '82', 'P1941', '20', '64', '99', '75', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(443, '2019-05-23', '2019522113423', '33', 'P1957', '10', '15', '', '', '', '150', 'Cash', '', '', '78', 's_Cash', 36),
(444, '2019-05-23', '2019522113637', '33', 'P1944', '2', '430', '', '20', '', '880', 'Cash', '', '', '78', 's_Cash', 36),
(445, '2019-05-23', '2019522113850', '48', 'P1934', '128', '64', '208', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(446, '2019-05-23', '2019522113850', '48', 'P1926', '1000', '64', '208', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(447, '2019-05-23', '2019522114936', '202', 'P1944', '10', '425', '', '350', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(448, '2019-05-23', '201952212125', '95', 'P1944', '10', '425', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(449, '2019-05-23', '2019522121249', '86', 'P1934', '1210', '63', '259', '680', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(450, '2019-05-23', '2019522121249', '86', 'P1926', '125', '63', '259', '680', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(451, '2019-05-23', '2019522121249', '86', 'P1941', '112', '63', '259', '680', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(452, '2019-05-23', '201952212162', '33', 'P1944', '1', '430', '', '', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(453, '2019-05-23', '2019522122949', '22', 'P1944', '40', '430', '', '400', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(454, '2019-05-23', '2019522123458', '187', 'P1944', '10', '435', '', '300', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(455, '2019-05-24', '201952214456', '23', 'P1944', '10', '420', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(456, '2019-05-24', '201952214720', '33', 'P1944', '2', '420', '', '20', '', '860', 'Cash', '', '', '78', 's_Cash', 36),
(459, '2019-05-24', '2019522141646', '33', 'P1923', '8', '425', '', '80', '', '3480', 'Cash', '', '', '78', 's_Cash', 36),
(460, '2019-05-24', '2019522141940', '58', 'P1923', '5', '440', '', '50', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(461, '2019-05-23', '2019522112124', '198', 'P1926', '494', '63.8', '75', '100', '', '32000', 'Cash', '', '', '78', 's_Cash', 36),
(462, '2019-05-24', '201952410158', '198', 'P1923', '30', '420', '38.5', '400', '', '12900', 'Cash', '', '', '78', 's_Cash', 36),
(463, '2019-05-24', '201952410158', '198', 'P1934', '66.5', '63.8', '38.5', '400', '', '12900', 'Cash', '', '', '78', 's_Cash', 36),
(464, '2019-05-24', '201952410158', '198', 'P1926', '126', '63.8', '38.5', '400', '', '12900', 'Cash', '', '', '78', 's_Cash', 36),
(465, '2019-05-24', '201952411958', '140', 'P1944', '5', '430', '', '50', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(466, '2019-05-24', '2019524112923', '205', 'P1944', '5', '430', '', '50', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(467, '2019-05-24', '2019524113230', '98', 'P1934', '38', '64.5', '', '49', '', '5100', 'Cash', '', '', '78', 's_Cash', 36),
(468, '2019-05-24', '201952411365', '33', 'P1923', '1', '420', '', '', '', '420', 'Cash', '', '', '78', 's_Cash', 36),
(469, '2019-05-24', '2019524114615', '33', 'P1957', '5', '15', '', '', '', '75', 'Cash', '', '', '78', 's_Cash', 36),
(470, '2019-05-24', '2019524115115', '195', 'P1941', '392', '64', '32', '300', '', '44300', 'Cash', '', '', '78', 's_Cash', 36),
(471, '2019-05-24', '2019524115115', '195', 'P1934', '295', '64', '32', '300', '', '44300', 'Cash', '', '', '78', 's_Cash', 36),
(473, '2019-05-25', '2019525124849', '33', 'P1944', '1', '430', '', '', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(474, '2019-05-25', '201952512501', '198', 'P1944', '17', '430', '', '170', '', '19880', 'Cash', '', '', '78', 's_Cash', 36),
(475, '2019-05-25', '2019525125320', '82', 'P1934', '37', '64', '12', '70', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(476, '2019-05-25', '2019525125558', '191', 'P1923', '10', '420', '', '300', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(477, '2019-05-25', '201952513157', '33', 'P1923', '7', '420', '', '60', '', '3000', 'Cash', '', '', '78', 's_Cash', 36),
(478, '2019-05-25', '201952513419', '23', 'P1944', '20', '425', '', '200', '', '8700', 'Cash', '', '', '78', 's_Cash', 36),
(479, '2019-05-25', '201952513842', '33', 'P1923', '3', '420', '', '', '', '1260', 'Cash', '', '', '78', 's_Cash', 36),
(480, '2019-05-25', '2019525131155', '33', 'P1923', '1', '430', '', '', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(481, '2019-05-25', '2019525131320', '182', 'P1923', '10', '420', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(483, '2019-05-25', '2019525132058', '33', 'P1944', '10', '420', '', '100', '', '4300', 'Cash', '', '', '78', 's_Cash', 36),
(484, '2019-05-25', '2019525132411', '33', 'P2139', '35', '58', '', '20', '', '2050', 'Cash', '', '', '78', 's_Cash', 36),
(485, '2019-05-25', '2019525132715', '33', 'P1923', '1', '430', '', '', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(486, '2019-05-26', '2019526134328', '33', 'P1944', '13', '420', '', '130', '', '5590', 'Cash', '', '', '78', 's_Cash', 36),
(487, '2019-05-26', '201952613468', '173', 'P2139', '93', '58', '66', '150', '', '23230', 'Cash', '', '', '78', 's_Cash', 36),
(488, '2019-05-26', '201952613468', '173', 'P1941', '280', '63', '66', '150', '', '23230', 'Cash', '', '', '78', 's_Cash', 36),
(489, '2019-05-26', '2019526135315', '86', 'P1944', '110', '420', '', '1100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(490, '2019-05-26', '2019526135813', '22', 'P1944', '30', '430', '', '300', '', '300000', 'Cash', '', '', '78', 's_Cash', 36),
(491, '2019-05-26', '201952614451', '206', 'P1923', '50', '410', '', '', '', '8200', 'Cash', '', '', '78', 's_Cash', 36),
(492, '2019-05-26', '20195261489', '33', 'P1923', '2', '420', '', '', '', '840', 'Cash', '', '', '78', 's_Cash', 36),
(493, '2019-05-26', '2019526141142', '33', 'P1923', '2', '420', '', '', '', '840', 'Cash', '', '', '78', 's_Cash', 36),
(494, '2019-05-26', '2019526141332', '95', 'P1944', '10', '430', '', '100', '', '5000', 'Cash', '', '', '78', 's_Cash', 36),
(495, '2019-05-26', '2019526142110', '182', 'P1923', '6', '420', '', '60', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(497, '2019-05-26', '2019526142935', '33', 'P1923', '7', '420', '', '60', '', '3000', 'Cash', '', '', '78', 's_Cash', 36),
(498, '2019-05-26', '2019526143349', '33', 'P1944', '1', '430', '', '', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(499, '2019-05-26', '2019526143641', '195', 'P1944', '10', '430', '', '150', '', '4450', 'Cash', '', '', '78', 's_Cash', 36),
(500, '2019-05-26', '2019526144020', '98', 'P1944', '5', '430', '', '50', '', '3875', 'Cash', '', '', '78', 's_Cash', 36),
(501, '2019-05-26', '2019526144610', '33', 'P1944', '30', '430', '', '300', '', '13200', 'Cash', '', '', '78', 's_Cash', 36),
(502, '2019-05-26', '201952614501', '33', 'P1934', '199', '64', '64', '300', '', '13100', 'Cash', '', '', '78', 's_Cash', 36),
(504, '2019-05-24', '201952214937', '47', 'P1934', '901', '63.2', '180', '400', '', '', 'Cheque', '', '', '78', 's_Cheque', 36),
(505, '2019-05-24', '201952214937', '47', 'P1941', '449', '63.2', '180', '400', '', '', 'Cheque', '', '', '78', 's_Cheque', 36),
(506, '2019-05-27', '2019527112521', '189', 'P2644', '200', '413', '', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(507, '2019-05-25', '201952512459', '33', 'P1923', '5', '400', '', '', '', '2000', 'Cash', '', '', '78', 's_Cash', 36),
(508, '2019-05-26', '2019526145510', '33', 'P1957', '7', '15', '', '', '', '100', 'Cash', '', '5', '78', 's_Cash', 36),
(509, '2019-05-25', '2019527114027', '33', 'P1957', '7', '15', '', '40', '', '145', 'Cash', '', '', '78', 's_Cash', 36),
(511, '2019-05-26', '2019526142354', '140', 'P2752', '10', '430', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(512, '2019-05-17', '201951881041', '187', 'P1923', '10', '430', '', '350', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(513, '2019-05-27', '2019527125619', '33', 'P1923', '1', '410', '', '', '', '410', 'Cash', '', '', '78', 's_Cash', 36),
(514, '2019-05-27', '2019527125923', '191', 'P1923', '5', '420', '', '150', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(515, '2019-05-27', '201952713123', '140', 'P1934', '67', '65.5', '129', '150', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(516, '2019-05-27', '201952713123', '140', 'P1926', '368', '65.5', '129', '150', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(517, '2019-05-27', '201952713123', '140', 'P1928', '351', '65.5', '129', '150', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(518, '2019-05-27', '20195271399', '23', 'P1944', '20', '420', '', '200', '', '8600', 'Cash', '', '', '78', 's_Cash', 36),
(519, '2019-05-27', '2019527131857', '33', 'P1923', '3', '420', '', '', '', '1260', 'Cash', '', '', '78', 's_Cash', 36),
(520, '2019-05-27', '2019527132039', '33', 'P1944', '1', '430', '', '', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(521, '2019-05-27', '2019527132227', '86', 'P1944', '10', '420', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(522, '2019-05-27', '2019527133146', '33', 'P1944', '4', '430', '', '', '', '1720', 'Cash', '', '', '78', 's_Cash', 36),
(523, '2019-05-25', '2019525131520', '187', 'P1923', '30', '430', '100', '1170', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(524, '2019-05-25', '2019525131520', '187', 'P1934', '72', '65', '100', '1170', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(525, '2019-05-24', '201952810498', '187', 'P1923', '10', '430', '', '350', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(526, '2019-05-26', '201952811223', '33', 'P1923', '1', '0', '', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(528, '2019-05-27', '2019528114139', '124', 'P1944', '2', '430', '', '', '', '860', 'Cash', '', '', '78', 's_Cash', 36),
(529, '2019-05-28', '2019528121149', '33', 'P1944', '2', '430', '', '', '', '860', 'Cash', '', '', '78', 's_Cash', 36),
(530, '2019-05-26', '201952811345', '33', 'P1957', '15', '15', '', '', '', '225', 'Cash', '', '', '78', 's_Cash', 36),
(531, '2019-05-28', '2019528122021', '33', 'P1923', '1', '420', '', '', '', '420', 'Cash', '', '', '78', 's_Cash', 36),
(532, '2019-05-28', '2019528122529', '33', 'P1923', '3', '420', '', '60', '', '1320', 'Cash', '', '', '78', 's_Cash', 36),
(533, '2019-05-28', '2019528122755', '173', 'P1944', '10', '430', '', '150', '', '4450', 'Cash', '', '', '78', 's_Cash', 36),
(534, '2019-05-28', '201952812473', '33', 'P1923', '10', '420', '', '100', '', '4300', 'Cash', '', '', '78', 's_Cash', 36),
(535, '2019-05-28', '2019528124855', '140', 'P2752', '20', '430', '', '200', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(536, '2019-05-28', '2019528125046', '33', 'P1957', '10', '15', '', '', '', '150', 'Cash', '', '', '78', 's_Cash', 36),
(537, '2019-05-28', '2019528125253', '33', 'P1923', '2', '420', '', '', '', '840', 'Cash', '', '', '78', 's_Cash', 36),
(538, '2019-05-28', '2019528125432', '33', 'P1944', '14', '420', '', '140', '', '6010', 'Cash', '', '10', '78', 's_Cash', 36),
(539, '2019-05-28', '20195281300', '22', 'P1944', '20', '430', '', '200', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(540, '2019-05-28', '20195281332', '95', 'P1923', '10', '420', '', '100', '', '5000', 'Cash', '', '', '78', 's_Cash', 36),
(541, '2019-05-28', '201952813522', '33', 'P1926', '33', '65', '', '55', '', '2200', 'Cash', '', '', '78', 's_Cash', 36),
(542, '2019-05-28', '201952813755', '198', 'P1934', '196', '63.8', '', '96', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(543, '2019-05-28', '2019528131122', '187', 'P1923', '10', '430', '', '650', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(544, '2019-05-28', '2019528131122', '187', 'P1946', '20', '455', '', '650', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(545, '2019-05-28', '2019528131728', '33', 'P1923', '1', '420', '', '', '', '420', 'Cash', '', '', '78', 's_Cash', 36),
(546, '2019-05-28', '2019528132120', '33', 'P1923', '2', '430', '', '', '', '860', 'Cash', '', '', '78', 's_Cash', 36),
(547, '2019-05-28', '2019528132558', '33', 'P1928', '288', '64', '68', '300', '', '18800', 'Cash', '', '', '78', 's_Cash', 36),
(548, '2019-05-29', '2019529143949', '208', 'P1923', '10', '430', '40', '100', '', '20000', 'Cash', '', '', '78', 's_Cash', 36),
(549, '2019-05-29', '2019529143949', '208', 'P1934', '190', '64', '40', '100', '', '20000', 'Cash', '', '', '78', 's_Cash', 36),
(550, '2019-05-29', '2019529144259', '33', 'P1923', '2', '420', '', '', '', '840', 'Cash', '', '', '78', 's_Cash', 36),
(551, '2019-05-29', '2019529144422', '23', 'P1923', '20', '420', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(552, '2019-05-29', '2019529144422', '23', 'P1934', '15', '65', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(553, '2019-05-29', '2019529144629', '98', 'P1944', '5', '430', '', '50', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(554, '2019-05-29', '2019529144748', '187', 'P1923', '10', '430', '', '350', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(555, '2019-05-29', '2019529144919', '33', 'P1923', '4', '425', '', '60', '', '1760', 'Cash', '', '', '78', 's_Cash', 36),
(556, '2019-05-29', '2019529152711', '33', 'P1923', '2', '430', '', '', '', '860', 'Cash', '', '', '78', 's_Cash', 36),
(557, '2019-05-29', '2019529152959', '33', 'P1957', '20', '15', '', '', '', '300', 'Cash', '', '', '78', 's_Cash', 36),
(558, '2019-05-29', '2019529153242', '189', 'P2644', '300', '413', '', '', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(559, '2019-05-29', '2019529153434', '33', 'P1923', '1', '420', '', '', '', '420', 'Cash', '', '', '78', 's_Cash', 36),
(560, '2019-05-29', '2019529201130', '208', 'P1944', '10', '430', '', '100', '', '1000', 'Cash', '', '', '78', 's_Cash', 36),
(561, '2019-05-29', '2019529201425', '182', 'P1944', '1', '430', '', '30', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(562, '2019-05-29', '2019529201425', '182', 'P1923', '1', '420', '', '30', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(563, '2019-05-29', '2019529201830', '195', 'P1923', '13', '420', '', '600', '', '17400', 'Cash', '', '', '78', 's_Cash', 36),
(564, '2019-05-29', '2019529201830', '195', 'P1944', '27', '420', '', '600', '', '17400', 'Cash', '', '', '78', 's_Cash', 36),
(565, '2019-05-29', '201952920238', '173', 'P1934', '134', '63', '57', '150', '', '16650', 'Cash', '', '', '78', 's_Cash', 36),
(566, '2019-05-29', '201952920238', '173', 'P1926', '127', '63', '57', '150', '', '16650', 'Cash', '', '', '78', 's_Cash', 36),
(567, '2019-05-29', '2019529204149', '33', 'P1957', '5', '15', '', '', '', '75', 'Cash', '', '', '78', 's_Cash', 36),
(568, '2019-05-29', '201952921211', '33', 'P1926', '249', '64', '64', '300', '', '16300', 'Cash', '', '', '78', 's_Cash', 36),
(569, '2019-05-30', '201953011854', '187', 'P1944', '20', '430', '', '700', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(570, '2019-05-30', '2019530111852', '23', 'P2644', '20', '430', '', '100', '', '9550', 'Cash', '', '', '78', 's_Cash', 36),
(571, '2019-05-30', '201953011215', '33', 'P2644', '2', '440', '', '', '', '880', 'Cash', '', '', '78', 's_Cash', 36),
(572, '2019-05-30', '2019530112227', '33', 'P1944', '1', '430', '', '', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(573, '2019-05-30', '2019530112359', '98', 'P1944', '10', '430', '', '100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(574, '2019-05-30', '2019530112618', '33', 'P1944', '3', '430', '', '', '', '1290', 'Cash', '', '', '78', 's_Cash', 36),
(575, '2019-05-30', '2019530192747', '98', 'P1944', '5', '430', '', '50', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(576, '2019-05-30', '201953019345', '48', 'P1944', '97', '425', '', '1270', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(577, '2019-05-30', '201953019345', '48', 'P2644', '30', '435', '', '1270', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(578, '2019-05-31', '201953195344', '33', 'P1944', '1', '430', '', '', '', '430', 'Cash', '', '', '78', 's_Cash', 36),
(579, '2019-05-31', '201953195522', '22', 'P1944', '20', '430', '', '200', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(580, '2019-05-31', '201953195955', '187', 'P1923', '20', '430', '', '700', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(581, '2019-05-31', '20195311030', '82', 'P1923', '14', '430', '', '210', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(582, '2019-05-31', '201953110527', '98', 'P1944', '5', '430', '', '50', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(583, '2019-05-31', '201953110821', '173', 'P1944', '10', '430', '82', '200', '', '16250', 'Cash', '', '', '78', 's_Cash', 36),
(584, '2019-05-31', '201953110821', '173', 'P1941', '186', '63', '82', '200', '', '16250', 'Cash', '', '', '78', 's_Cash', 36),
(585, '2019-05-31', '2019531101250', '33', 'P1923', '3', '430', '', '', '', '1290', 'Cash', '', '', '78', 's_Cash', 36),
(586, '2019-05-31', '2019531101441', '182', 'P1923', '12', '420', '', '120', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(587, '2019-05-31', '2019531101657', '33', 'P1923', '3', '430', '', '', '', '1290', 'Cash', '', '', '78', 's_Cash', 36),
(588, '2019-05-31', '2019531105720', '157', 'P1944', '40', '420', '', '1100', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(591, '2019-05-31', '2019531113736', '98', 'P1944', '5', '430', '', '50', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(592, '2019-05-31', '2019531114338', '23', 'P1944', '20', '420', '', '200', '', '8800', 'Cash', '', '', '78', 's_Cash', 36),
(593, '2019-05-31', '2019531115819', '140', 'P1944', '15', '430', '', '150', '', '0', 'Cash', '', '', '78', 's_Cash', 36),
(594, '2019-05-31', '2019531113551', '33', 'P1957', '5', '15', '', '', '', '75', 'Cash', '', '', '78', 's_Cash', 36);

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

--
-- Dumping data for table `sell_return`
--

INSERT INTO `sell_return` (`sr_id`, `memono`, `customerid`, `productid`, `quntity`, `price`, `weight`, `transport`, `vat`, `discount`, `comission`, `return_date`, `token`, `takenby`) VALUES
(14, '2019519121418', '129', 'P1946', '20', '415', '', '0', '0', '0', 0, '2019-05-28', 'sr', '36');

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
(31, '2019-05-21', '166', '156000', 'milon', NULL, '36', 'pts_Cash'),
(30, '2019-05-19', '26', '78000', 'imran', NULL, '36', 'pts_Cash'),
(29, '2019-05-19', '43', '620000', 'milon', NULL, '36', 'pts_Cash'),
(28, '2019-05-19', '196', '73000', 'imran', NULL, '36', 'pts_Cash'),
(27, '2019-05-16', '166', '169000', 'milon', NULL, '36', 'pts_Cash'),
(26, '2019-05-15', '101', '28000', 'milon', NULL, '36', 'pts_Cash'),
(25, '2019-05-14', '166', '78000', 'milon', NULL, '36', 'pts_Cash'),
(32, '2019-05-22', '26', '78000', 'milon', NULL, '36', 'pts_Cash'),
(33, '2019-05-23', '26', '78000', 'milon', NULL, '36', 'pts_Cash'),
(34, '2019-05-24', '166', '82600', 'milon', NULL, '36', 'pts_Cash'),
(35, '2019-05-26', '43', '620000', 'imran', NULL, '36', 'pts_Cash'),
(36, '2019-05-26', '166', '78000', 'imran', NULL, '36', 'pts_Cash'),
(37, '2019-05-28', '100', '50000', 'milon', NULL, '36', 'pts_Cash'),
(38, '2019-05-28', '26', '156000', 'milon', NULL, '36', 'pts_Cash'),
(39, '2019-05-28', '166', '77000', 'imran', NULL, '36', 'pts_Cash'),
(40, '2019-05-28', '196', '60000', 'milon', NULL, '36', 'pts_Cash'),
(41, '2019-05-28', '166', '123900', 'milon', NULL, '36', 'pts_Cash'),
(42, '2019-05-29', '207', '12100', 'milon', NULL, '36', 'pts_Cash');

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
(22, '1', 'sahajahan (parish)', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0,,', 'JOGONNATHPUR, VHATARA, DHAKA', '0', '421400', '2019-05-15'),
(23, '1', 'HAJI NURUDDIN ', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0,0,,', 'jogonnathpur, VHATARA, DHAKA', '0', '83600', '2019-05-15'),
(26, '2', 'FRESH', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'GULSHAN', 'Choose option', '0', '2019-01-28'),
(28, '2', 'SUPERCRETE', 'e10adc3949ba59abbe56e057f20f883e', 'supercreate@gmail.com', '0166666666,0,0,', 'GULSHAN', '0', '94900', '2019-04-20'),
(29, '1', 'ALI HOSSAIN', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0,', 'HAREZ ROAD, VHATARA, DHAKA', 'Choose option', '128000', '2019-03-21'),
(30, '1', 'ABDUL HAFIZ', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0,', 'BASUNDHARA', 'Choose option', '0', '2019-04-20'),
(31, '1', 'ADOBI BUILDERS, ARISH', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '01819494622,0,', '17/1,pollobi,mirpur-12, DHAKA', '0', '680992', '2019-04-20'),
(32, '1', 'CAMBRIAN COLLEGE', 'e10adc3949ba59abbe56e057f20f883e', 'no@yahoo.com', '01720557151', 'Aziz ROAD, VHATARA, DHAKA', 'Choose option', '125200', '2019-01-26'),
(33, '1', '1.cash sell', 'e10adc3949ba59abbe56e057f20f883e', 'pongta@gmail.com', '0,0,', 'N/A', '0', '0', '2019-04-20'),
(36, '0', 'admin', '6ebe76c9fb411be97b3b0d48b791a7c9', '', '', '', '', '', ''),
(42, '2', 'seven circle bd ltd', 'e10adc3949ba59abbe56e057f20f883e', 'se@gmail.com', '0,0,0', 'gulshan', '0', '0', '2019-04-20'),
(43, '2', 'rahim steel', 'e10adc3949ba59abbe56e057f20f883e', 'rahim@gmail.com', '01711434827,0,0,0,', 'tikatuli,dhaka', '0', '1240000', '2019-04-20'),
(45, '4', 'IMRAN', 'e10adc3949ba59abbe56e057f20f883e', 'imran@gmail.com', '01912541124', 'nadda,dhaka', '4', '0', '2018-12-14'),
(47, '1', 'ABDUL HAI', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '01682409301,', 'jogonnathur, vhatara, dhaka', '0', '0', '2019-03-21'),
(48, '1', 'MUKUL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '01718305050,0,,,', 'Aziz road,jogonnathpur, vhatara, dhaka', '0', '108040', '2019-05-21'),
(49, '1', 'JOSIM DHALI', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0,0,0,,', 'dhalibari kaca bazar, mosque roar, vhatara, dhaka', '0', '394180', '2019-05-21'),
(50, '1', 'ADOBI BUILDERS(dhanondi)', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '01819494622,0,', 'dhanmondi,star kabab, Dhaka', '0', '447185', '2019-04-20'),
(51, '1', 'Engr.kamrul islam', 'e10adc3949ba59abbe56e057f20f883e', 'no@gmail.com', '01711145967', 'plot-12,road-15,block-G,basundhara,dhaka', '0', '118000', '2019-01-26'),
(52, '1', 'AMINUL HAQUE', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'plot- ,road-13,block-G,basundhara,dhaka', '0', '36150', '2018-12-14'),
(53, '1', 'monowar ali', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '01711576665,01741331989,0,', 'plot-112,road-03,block-J,basundhara,dhaka', '0', '54400', '2019-04-20'),
(54, '1', 'ENGE. MASUD VAI', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '01711627140,', 'jogonnathpur, basundhara road,dhaka', '0', '97800', '2019-04-20'),
(55, '1', 'SOUTH VISSION', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0,', 'jogonnnathpur,vhatara,dhaka', '0', '100050', '2019-03-21'),
(56, '1', 'nurjahan garden', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0,', 'JOGONNATHPUR,VHATARA,DHAKA', '0', '56755', '2019-03-21'),
(58, '1', 'SAHAJAHAN GAZI', 'e10adc3949ba59abbe56e057f20f883e', 'M@GMAIL.COM', '0,', 'jogonnathpur,vhatara,dhaka', '0', '219900', '2019-03-21'),
(61, '1', 'RONJONA KASEM', 'e10adc3949ba59abbe56e057f20f883e', 'no@yahoo.com', '01712069601,01812202202,0,', 'Plot-.road-06,block-I, Bosundhara', '0', '53190', '2019-04-20'),
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
(76, '1', 'MOSTAFA SIR', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0,', 'Basundhara', '0', '79500', '2019-05-21'),
(77, 'Choose option', 'S. P PROPERTIES', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'A', '0', '150', '2018-12-19'),
(78, '4', 'SHOP', 'e10adc3949ba59abbe56e057f20f883e', 'pongta@gmail.com', '0', 'jogonnathpur', '4', '', '2018-12-20'),
(79, '1', 'ALI NASER', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0,', 'A', '0', '895', '2019-03-21'),
(81, '1', 'KHALED', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'JOGONNATHPUR', '0', '0', '2018-12-23'),
(82, '1', 'kosru vai', 'e10adc3949ba59abbe56e057f20f883e', 's@yahoo.com', '0,0,,', 'mosque road,jogonnathpur,dhaka', '0', '32300', '2019-05-16'),
(84, '1', 'CAR GARAGE', 'e10adc3949ba59abbe56e057f20f883e', 'mazad88@live.com', '0', 'JAGONNATHPUR', '0', '0', '2018-12-25'),
(85, '1', 'WASHING FACTORY', 'e10adc3949ba59abbe56e057f20f883e', 'h@gmail.com', '0', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '8500', '2019-01-27'),
(86, '1', 'SAMIMA MADAM', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '01979118207,0,,', 'JOGONNATHPUR', '0', '6150', '2019-05-15'),
(92, '2', 'ALPINE TRADERS', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0', 'A', '0', '0', '2018-12-25'),
(94, '1', 'LAHOR RAHMAN', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0,0,,', 'block-l,basundhara', '0', '35000', '2019-05-29'),
(95, '1', 'OSMAN VAI', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0,', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '12580', '2019-05-15'),
(96, '1', 'FARJANA ENTERPRISE', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0,0,', 'A', '0', '11880', '2019-04-20'),
(97, '1', 'SRABONI ENTERPRISE', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0,0,', 'A', '0', '44884', '2019-04-20'),
(98, '1', 'AZMOL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0,0,', 'Aziz road,jogonnathpur,vhatara,dhaka', '0', '0', '2019-04-16'),
(99, '1', 'SOUTH BAY', 'e10adc3949ba59abbe56e057f20f883e', 'sh@gmail.com', '0,0,,', 'PLOT-86,ROAD-7,BLOCK-b,BASUNDHARA,DHAKA', '0', '-1220', '2019-05-16'),
(100, '2', 'K.A STEEL', 'e10adc3949ba59abbe56e057f20f883e', 'mohimanul.akash@gmail.com', '0,', 'notun bazar,vhatara,dhaka', '0', '115060', '2019-05-20'),
(101, '2', 'TAREK VAI', 'e10adc3949ba59abbe56e057f20f883e', 'mazad88@live.com', '0,,', 'A', '0', '58000', '2019-05-15'),
(103, '1', 'ALI AJOM', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0,0,', 'BOSUNDHARA MURTI', '0', '0', '2019-04-20'),
(104, '2', 'AMIR AND SONS', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0125,', 'MALIBAG', '0', '276000', '2019-04-20'),
(105, '2', 'iqbal vai', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'notunbazar,dhaka', '0', '0', '2019-01-19'),
(107, '2', 'Patari steel', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'Sahajadpur', '0', '0', '2019-01-19'),
(109, '1', 'MAHBUB SORIF', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0,,', 'BASUNDHARA', '0', '78650', '2019-05-20'),
(110, '1', 'AL AMIN ENTERPRISE', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0', 'saowrabazar,dhaka', '0', '0', '2019-01-24'),
(111, '1', 'AMINUL ISLAN KHAN', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0,0,0,', 'road-06,block-F,basundhara,dhaka', '0', '4700', '2019-04-23'),
(112, '4', 'ROBIUL', 'e10adc3949ba59abbe56e057f20f883e', 'milon@gmail.com', '0', 'SHASIALI,CHANDPUR', '2', '', '2019-01-24'),
(113, '1', 'SAHABUDDIN', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '01739192421,', 'MOSJID GOLI,DHAKA', '0', '10575', '2019-04-20'),
(115, '1', 'SOHIDUL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '01`671157589', 'Aziz road,jogonnathpur,vhatara,dhaka', '0', '216564', '2019-01-26'),
(117, '1', 'MOIN VAI', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '0', 'JOGONNATHPUR,VHATARA,DHAKA', '0', '17915', '2019-01-26'),
(118, '1', 'M A KHALEK', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '01713030222', 'PLOT-,ROAD-,BLOCK-A,BASUNDHARA', '0', '77780', '2019-01-26'),
(119, '1', 'SAIFUL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'A@gmail.com', '01711537018', 'plot=,road=,block=, basundhara,dhaka', '0', '37500', '2019-01-26'),
(120, '1', 'Ali sarkar', 'e10adc3949ba59abbe56e057f20f883e', 'no@yahoo.com', '01912295638', 'Aziz road,vhatara,dhaka', '0', '64025', '2019-01-26'),
(122, '1', 'Ali ashfak', 'e10adc3949ba59abbe56e057f20f883e', 'no@yahoo.com', '01781556649', 'Plot-,road-,block-F,basundhara,dhaka', '0', '21000', '2019-01-26'),
(123, '1', 'Raisul vai', 'e10adc3949ba59abbe56e057f20f883e', 'no@yahoo.com', '01712596817', 'Aziz road,jogonnathpur,vhatara,dhaka', '0', '372268', '2019-01-26'),
(124, '1', 'Faruk vai', 'e10adc3949ba59abbe56e057f20f883e', 'no@gmail.com', '01819957593,', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '21250', '2019-04-20'),
(127, '1', 'S P PROPERTISE', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmmail.com', '0', 'PLOT-,ROAD-,BLOCK-,BASUNDHARA,DHAKA', '0', '0', '2019-01-28'),
(128, '1', 'mahmud kabir', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0,0,', 'matborbari,jogonnathpur,vhatara,dhaka', '0', '29950', '2019-04-20'),
(129, '1', 'REJAUL KARIM', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0,0,', 'plot-,road-,block-,basundhara,dhaka', '0', '0', '2019-03-21'),
(131, '1', 'GAZI ENGINEERING', 'e10adc3949ba59abbe56e057f20f883e', 'M@GMAIL.COM', '0,', 'jogonnathpur,vhatara,dhaka', '0', '0', '2019-03-21'),
(132, '1', 'RAJIB ENGINEERING', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0,0,', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '2580', '2019-04-20'),
(133, '1', 'SAYED KAKA', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '430', '2019-01-27'),
(134, '1', 'KOPOTHKHO PROPERTISE', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0,', 'basundhara main road,jogonnathpur,vhatara,dhaka', '0', '0', '2019-03-21'),
(135, '1', 'ISRAFIL SARKER', 'e10adc3949ba59abbe56e057f20f883e', 'h@gmail.com', '0,', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '0', '2019-04-20'),
(136, '1', 'OTHI (MA)', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '0', 'AZIZ ROAD,JOGONNATHPUR,VHATARA,DHAKA', '0', '0', '2019-01-28'),
(137, '1', 'DELIGHT HOME', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '0,0,0,', 'P-388,R-04,B-I,BASUNDHARA,DHAKA', '0', '2000', '2019-04-22'),
(138, '1', 'MONJO VAI', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0,', 'BLOCK-A,BASUNDHRA  DHAKA.', '0', '4500', '2019-03-21'),
(139, '1', 'RAJBARI', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0', 'BASUNDHARA DHAKA.', '0', '0', '2019-01-28'),
(140, '1', 'ABU SAYED', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '0,0,,', 'Aziz road jogonnathpur', '0', '-57400', '2019-05-15'),
(143, '1', 'joynal kaka', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '0,0', 'Aziz road, jogonnathpur, vhatara, Dhaka', '0', '6600', '2019-04-20'),
(145, '1', 'Alomgir pic-up', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0,0,', 'kalachandpur,gulshan,dhaka', '0', '12200', '2019-04-20'),
(147, '1', 'Azad vai', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'block-a,basundhara', '0', '12000', '2019-03-21'),
(149, '1', 'Bahar via', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'block-a,basundhara', '0', '29700', '2019-03-21'),
(150, '1', 'Basar vai', 'e10adc3949ba59abbe56e057f20f883e', 'o@gmail.com', '0,0,', 'basundhara kaca bazar,basundhara road,dhaka', '0', '1594', '2019-04-20'),
(154, '1', 'Habib vai(sign board)', 'e10adc3949ba59abbe56e057f20f883e', 'M@GMAIL.COM', '0,', 'jogonnathpur,vhatara,dhaka', '0', '17866', '2019-03-21'),
(155, '1', 'K B properties', 'e10adc3949ba59abbe56e057f20f883e', 'M@GMAIL.COM', '0,0,', 'jogonnathpur', '0', '400', '2019-03-21'),
(156, '1', 'kazi johir', 'e10adc3949ba59abbe56e057f20f883e', 'M@GMAIL.COM', '0', 'basundhara road,dhaka', '0', '53200', '2019-03-21'),
(157, '1', 'khokon sir(basundhara)', 'e10adc3949ba59abbe56e057f20f883e', '0@gmail.com', '0,', 'basundhara,dhaka', '0', '0', '2019-03-21'),
(158, '1', 'khokon sir (hrrm factory)', 'e10adc3949ba59abbe56e057f20f883e', '0@gmail.com', '0,', 'sahampur,dhaka', '0', '1000', '2019-04-20'),
(160, '1', 'prof.humayun kabir', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0,,', 'block-l,basundhara', '0', '20250', '2019-05-27'),
(161, '1', 'rafik uncle(salam)', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'jagannathpur,vhatara,dhaka', '0', '0', '2019-03-21'),
(162, '1', 'Taizul vai', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0,', 'block-a,basubdhara', '0', '6400', '2019-04-20'),
(163, '2', 'premier cement mills ltd', 'e10adc3949ba59abbe56e057f20f883e', 'o@gmail.com', '0,', 'gulshan', '0', '46000', '2019-03-21'),
(165, '1', 'sajjad vai', 'e10adc3949ba59abbe56e057f20f883e', 'o@gmail.com', '0', 'basundhara', '0', '0', '2019-03-31'),
(166, '2', 'sevenring corporate', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '0,,', 'Gulsan2 ', '0', '0', '2019-05-15'),
(167, '1', 'mizan tiles', 'e10adc3949ba59abbe56e057f20f883e', 'pongta_virus@yahoo.com', '0,0,', 'jogonnathpur,vhatara,dhaka', '0', '0', '2019-04-20'),
(168, '1', 'Baccu kaka', 'e10adc3949ba59abbe56e057f20f883e', 'a@gmail.com', '0,,', 'Jogonnathpur,vhatara,dhaka', '0', '11530', '2019-05-15'),
(169, '1', 'ataul haque', 'e10adc3949ba59abbe56e057f20f883e', 'NO@gmail.com', '0,,', 'basundhara', '0', '15300', '2019-05-27'),
(170, '1', 'restaurant', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0', '27000', '2019-04-20'),
(171, '1', 'nahid vai', 'e10adc3949ba59abbe56e057f20f883e', '', '', 'jogonnathpur', '0', '1740', '2019-04-20'),
(172, '1', 'ADOBI BUILDERS,(sufiana)', 'e10adc3949ba59abbe56e057f20f883e', 'n@gmail.com', '01819494622', 'gulshan-2', '0', '1390', '2019-04-20'),
(173, '1', 'con. hannan', 'e10adc3949ba59abbe56e057f20f883e', 'o@gmail.com', '0,0,', 'harez road,jogonnathpur,dhaka', '0', '424', '2019-04-23'),
(174, '1', 'badol vai', 'e10adc3949ba59abbe56e057f20f883e', '0@live.com', ',', 'jogonnathpur', '0', '2580', '2019-05-15'),
(175, '2', 'shop', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0', '0', '2019-04-23'),
(176, '1', 'shop', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '0', '0', '2019-04-23'),
(178, '1', 'julhash', 'e10adc3949ba59abbe56e057f20f883e', '0@live.com', '0', 'jogonnathpur,vhatara,dhaka', '0', '0', '2019-04-26'),
(179, '1', 'nizam uddin', 'e10adc3949ba59abbe56e057f20f883e', '0@live.com', '0,', 'plot-73,road-01,block-A,basundhara', '0', '11775', '2019-05-16'),
(180, '1', 'ibrahim vai', 'e10adc3949ba59abbe56e057f20f883e', 'o@gmail.com', '0,', 'jogonnathpur,vhatara,dhaka', '0', '0', '2019-04-29'),
(181, '1', 'mahmud premier', 'e10adc3949ba59abbe56e057f20f883e', '0@live.com', '0', 'premier cement', '0', '0', '2019-05-05'),
(182, '1', 'masud vai', 'e10adc3949ba59abbe56e057f20f883e', '0@live.com', '0', 'jogonnathpur,vhatara,dhaka', '0', '5040', '2019-05-15'),
(183, '1', 'salauddin', 'e10adc3949ba59abbe56e057f20f883e', '0@live.com', '0', 'bosumoti,vhatara, dhaka', '0', '27900', '2019-05-15'),
(184, '1', 'baitul atik mosjid', 'e10adc3949ba59abbe56e057f20f883e', '0@live.com', '0,', 'jogonnathpur,vhatara,dhaka', '0', '0', '2019-05-15'),
(185, '1', 'Aslam parvez', 'e10adc3949ba59abbe56e057f20f883e', 'a@gmail.com', '', 'Jogonnathpur', '0', '0', '2019-05-15'),
(187, '1', 'Shahin Vai(monoar Ali)', 'e10adc3949ba59abbe56e057f20f883e', 'a@gmail.com', ',', 'Basundhara r/a', '0', '-18875', '2019-05-16'),
(189, '1', 'HUDA TREADERS', 'e10adc3949ba59abbe56e057f20f883e', '0@gmail.com', '0', 'khilkhet', '0', '0', '2019-05-16'),
(190, '1', 'kamal vai(tiles)', 'e10adc3949ba59abbe56e057f20f883e', '0@gmail.com', '0', 'jogonnathpur', '0', '0', '2019-05-16'),
(191, '1', 'sarmin akter(hannan)', 'e10adc3949ba59abbe56e057f20f883e', '0@gmail.com', '0,0', 'basundhara', '0', '13800', '2019-05-16'),
(192, '1', 'BABUL VAI', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'JOGONNATHPUR,VHATARA,DHAKA', '0', '', '2019-05-17'),
(194, '1', 'milon vai', 'e10adc3949ba59abbe56e057f20f883e', 'mazad88@live.com', '0', 'AZIZ ROAD,VATHARA DHAKA.', '0', '11100', '2019-05-18'),
(195, '1', 'sadkule vai', 'e10adc3949ba59abbe56e057f20f883e', '0@live.com', '0', 'jogonnathpur,vhaatara,dhaka', '0', '-4320', '2019-05-18'),
(196, '2', 'HUDA TREADERS', 'e10adc3949ba59abbe56e057f20f883e', '0@gmail.com', '0,', 'khilkhat ,dhaka', '0', '33200', '2019-05-19'),
(197, '1', 'FOZLE RABBI', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'PLOT-423, ROAD-14, BLOCK-J,BASUNDHARA', '0', '0', '2019-05-19'),
(198, '1', 'sofiq vai', 'e10adc3949ba59abbe56e057f20f883e', '0@live.com', '0', 'jogonnathpur,vhatara,dhaka', '0', '290', '2019-05-21'),
(199, '2', 'kazi steel', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'kuril,dhaka', '0', '0', '2019-05-21'),
(200, '2', 'farjana enterprise', 'e10adc3949ba59abbe56e057f20f883e', '0@gmail.com', '0', 'saora bazar,dhaka', '0', '0', '2019-05-26'),
(202, '1', 'halal vai', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'basundhara', '0', '0', '2019-05-26'),
(205, '1', 'soscity jakere kaka', 'e10adc3949ba59abbe56e057f20f883e', '0@gmail.com', '0', 'jogonnathpur,vhatara, Dhaka.', '0', '0', '2019-05-27'),
(206, '1', 'AL AMINE VAI', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', '100 FT.', '0', '0', '2019-05-27'),
(207, '2', 'rajib engineering workshop', 'e10adc3949ba59abbe56e057f20f883e', '0@live.com', '0', 'jogonnathpur,vhatara,dhaka', '0', '0', '2019-05-28'),
(208, '1', 'katharsis', 'e10adc3949ba59abbe56e057f20f883e', 'm@gmail.com', '0', 'PLOT-245,ROAD-9,BLOCK-A BASUNDHARA', '0', '0', '2019-05-29');

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
  MODIFY `ac_pri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `banktransfer`
--
ALTER TABLE `banktransfer`
  MODIFY `transferid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `cateogory`
--
ALTER TABLE `cateogory`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `charts_accounts`
--
ALTER TABLE `charts_accounts`
  MODIFY `charts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cheque`
--
ALTER TABLE `cheque`
  MODIFY `chequeno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `expenseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `expensecat`
--
ALTER TABLE `expensecat`
  MODIFY `excat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expensecategory`
--
ALTER TABLE `expensecategory`
  MODIFY `excate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `purchase_return`
--
ALTER TABLE `purchase_return`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `p_brand`
--
ALTER TABLE `p_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `p_size`
--
ALTER TABLE `p_size`
  MODIFY `pro_size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `recevecollection`
--
ALTER TABLE `recevecollection`
  MODIFY `recol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `role_base_access_system`
--
ALTER TABLE `role_base_access_system`
  MODIFY `rbas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `sellid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=595;

--
-- AUTO_INCREMENT for table `sell_return`
--
ALTER TABLE `sell_return`
  MODIFY `sr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplierpayment`
--
ALTER TABLE `supplierpayment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
