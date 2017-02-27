-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2017 at 11:35 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(5) NOT NULL,
  `accountNumber` varchar(10) COLLATE utf8_bin NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `description` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `accountNumber`, `active`, `description`) VALUES
(1, '004100', 1, 'Capex-Capitalised Software'),
(2, '030010', 1, 'Capex-Machinery'),
(3, '040060', 1, 'Capex-IC2-Jigs & Fixture'),
(4, '040100', 1, 'Capex-IC3-Production Tools'),
(5, '045010', 1, 'Capex-Measuring Equipment'),
(6, '045020', 1, 'Capex-IT Equipment'),
(7, '045030', 1, 'Capex-Office F&F'),
(8, '055000', 1, 'CIP-Construction In Progress'),
(9, '056000', 1, 'CIP-Leasehold Improvemt'),
(10, '057000', 1, 'CIP-Machine'),
(11, '144500', 1, '3rd Party Paid'),
(12, '150000', 1, 'Customer Tooling Recoverable'),
(13, '151000', 1, 'Other Receivable-Capex Export'),
(14, '616081', 1, 'Workers Meal-Canteen In Plant'),
(15, '616090', 1, 'Conference Expenses'),
(16, '617000', 1, 'Staff Training'),
(17, '618010', 1, 'Consultancy Fee'),
(18, '618020', 1, 'Audit Fee'),
(19, '619000', 1, 'Recruiting Expensess'),
(20, '619010', 1, 'Staff Recreation'),
(21, '619020', 1, 'Staff Insurance'),
(22, '619040', 1, 'Lbs-HR Support'),
(23, '619200', 1, 'Other Staff Cost-Non Exp'),
(24, '619210', 1, 'Company Events'),
(25, '622200', 1, 'Plant Rental'),
(26, '623010', 1, 'R&M-Tools'),
(27, '623020', 1, 'R&M-Machine&Equipment'),
(28, '623021', 1, 'COGS - Facility Maintenance'),
(29, '623030', 1, 'R&M-Other'),
(30, '626000', 1, 'Consumables'),
(31, '626010', 1, 'Non Cap-Other'),
(32, '626020', 1, 'Software New'),
(33, '627100', 1, 'Electricity & Water- Office'),
(34, '627200', 1, 'Electricity & Water- Plant'),
(35, '630020', 1, 'Services & Consultancy'),
(36, '630040', 1, 'Servers'),
(37, '634000', 1, 'Tel/Idd Chgs'),
(38, '634100', 1, 'Network'),
(39, '639000', 1, 'Printers'),
(40, '639100', 1, 'Software Maintenance'),
(41, '639200', 1, 'Facilities'),
(42, '639300', 1, 'Client PCs'),
(43, '639400', 1, 'Communication'),
(44, '641000', 1, 'Outward Handling'),
(45, '643000', 1, 'Warehouse-3Rd Party'),
(46, '657000', 1, 'Insurance'),
(47, '659040', 1, 'Samples'),
(48, '659050', 1, 'Entertainment-Customer'),
(49, '659060', 1, 'Warranty'),
(50, '660000', 1, 'Legal Fee'),
(51, '664000', 1, 'Stationery'),
(52, '664010', 1, 'OM Charge'),
(53, '669010', 1, 'Periodicals & Books'),
(54, '669040', 1, 'Messenger & Courier Ser'),
(55, '669200', 1, 'Tooling Modification'),
(56, '669210', 1, 'Chg-Artwork/Desgin Cost'),
(57, '669220', 1, 'Prototype'),
(58, '669221', 1, 'Soft Tools'),
(59, '669300', 1, 'Testing Cost'),
(60, '669900', 1, 'Operation Support Cost'),
(61, '669910', 1, 'Sundry Expenses'),
(62, '669920', 1, 'Sundry Material-Dev Used'),
(63, '770000', 1, 'Raw Material'),
(64, '770030', 1, 'Scrap'),
(65, '770031', 1, 'Actual Temperary Operation'),
(66, '770032', 1, 'Effiency Loss'),
(67, '772010', 1, 'Trial Run Material'),
(68, '772011', 1, 'Trial Run Manhours'),
(69, '772020', 1, 'Rework Material'),
(70, '772030', 1, 'Change Design'),
(71, '772040', 1, 'Sundry'),
(72, '772060', 1, 'Rework Labour'),
(73, '773000', 1, 'Subcon Work'),
(74, '773100', 1, 'Cost Of Production'),
(75, '773200', 1, 'Labor'),
(76, '774000', 1, 'Inward Freight'),
(77, '775000', 1, 'Import Duties'),
(78, '779020', 1, 'Stock Take Adj'),
(79, '787040', 1, 'OBS Stock'),
(80, '788100', 1, 'IC2 Charges'),
(81, '788200', 1, 'COGS-Tooling Cost');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `abbr` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `active`, `abbr`) VALUES
(1, 'Material Purchase', 1, 'M'),
(2, 'Scrap of Material', 1, 'Q'),
(3, 'Equipment, Machines,Tools, Jig & Fixtures', 1, 'E'),
(4, 'Toolings (hard tooling)', 1, 'T'),
(5, 'Toolings (soft tooling)', 1, 'T'),
(6, 'Operation Related - Rework & Processing', 1, 'O'),
(7, 'Test Service', 1, 'S'),
(8, 'IT Related', 1, 'I'),
(9, 'Prototype (plastic prototype )', 1, 'P'),
(10, 'Prototype (metal prototype )', 1, 'P'),
(11, 'Prototype (PCBA )', 1, 'P'),
(12, 'Test Equipment Maintenance', 1, 'T'),
(13, 'Others Non-BOM', 1, 'N'),
(14, 'Furniture & Fixture', 1, 'F'),
(15, 'Office Equipment', 1, 'OF');

-- --------------------------------------------------------

--
-- Table structure for table `costcode`
--

CREATE TABLE `costcode` (
  `id` int(3) NOT NULL,
  `code` varchar(10) COLLATE utf8_bin NOT NULL,
  `codename` varchar(50) COLLATE utf8_bin NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `costcode`
--

INSERT INTO `costcode` (`id`, `code`, `codename`, `active`) VALUES
(1, '15A', 'Engineering-Cons', 1),
(2, '15B', 'Engineering-Biggie', 1),
(3, '15C', 'Engineering-Auto', 1),
(4, '16A', 'Integral Costing-Cons', 1),
(5, '16B', 'Integral Costing-Biggie', 1),
(6, '16C', 'Integral Costing-Auto', 1),
(7, '17A', 'IT-Cons', 1),
(8, '17B', 'IT-Biggie', 1),
(9, '17C', 'IT-Auto', 1),
(10, '17S', 'IT-Sundry', 1),
(11, '20A', 'Operation-SHAT Sonos-Cons', 1),
(12, '20B', 'Operation-SHAT Sonos-Biggie', 1),
(13, '20C', 'Operation-SHAT Sonos-Auto', 1),
(14, '21A', 'Operation-ShuangLin-Cons', 1),
(15, '21B', 'Operation-ShuangLin-Biggie', 1),
(16, '21C', 'Operation-ShuangLin-Auto', 1),
(20, '23A', 'Operation-SHAT-Cons', 1),
(21, '23B', 'Operation-SHAT-Biggie', 1),
(22, '23C', 'Operation-SHAT-Auto', 1),
(23, '24A', 'PMO-Malaysia-Cons', 1),
(24, '24B', 'PMO-Malaysia-Biggie', 1),
(25, '24C', 'PMO-Malaysia-Auto', 1),
(26, '25A', 'PMO Automotive-Cons', 1),
(27, '25B', 'PMO Automotive-Biggie', 1),
(28, '25C', 'PMO Automotive-Auto', 1),
(29, '27A', 'PMO Consumer-Cons', 1),
(30, '27B', 'PMO Consumer-Biggie', 1),
(31, '27C', 'PMO Consumer-Auto', 1),
(35, '35A', 'Commerial Consumer-Cons', 1),
(36, '35B', 'Commerial Consumer-Biggie', 1),
(37, '35C', 'Commerial Consumer-Auto', 1),
(38, '40A', 'Commerial Automotive-Cons', 1),
(39, '40B', 'Commerial Automotive-Biggie', 1),
(40, '40C', 'Commerial Automotive-Auto', 1),
(41, '45A', 'Quality Management (TQM)-Cons', 1),
(42, '45B', 'Quality Management (TQM)-Biggie', 1),
(43, '45C', 'Quality Management (TQM)-Auto', 1),
(44, '46A', 'Global Testing-Cons', 1),
(45, '46B', 'Global Testing-Biggie', 1),
(46, '46C', 'Global Testing-Auto', 1),
(47, '55A', 'R&D APAC-Cons', 1),
(48, '55B', 'R&D APAC-Biggie', 1),
(49, '55C', 'R&D APAC-Auto', 1),
(50, '65A', 'SCM (Logistic)-Cons', 1),
(51, '65B', 'SCM (Logistic)-Biggie', 1),
(52, '65C', 'SCM (Logistic)-Auto', 1),
(53, '66A', 'Purchasing-Cons', 1),
(54, '66B', 'Purchasing-Biggie', 1),
(55, '66C', 'Purchasing-Auto', 1),
(56, '74A', 'Lean-Cons', 1),
(57, '74B', 'Lean-Biggie', 1),
(58, '74C', 'Lean-Auto', 1),
(59, '75A', 'General Management-Cons', 1),
(60, '75B', 'General Management-Biggie', 1),
(61, '75C', 'General Management-Auto', 1),
(62, '76A', 'F&A-Cons', 1),
(63, '76B', 'F&A-Biggie', 1),
(64, '76C', 'F&A-Auto', 1),
(65, '76S', 'F&A-Sundry', 1),
(66, '77A', 'HRM-Cons', 1),
(67, '77B', 'HRM-Biggie', 1),
(68, '77C', 'HRM-Auto', 1),
(69, '77S', 'HRM-Sundry', 1),
(70, '11', 'AV-Cons', 1),
(71, '13', 'AUTOMOTIVE-Auto', 1),
(72, '28C', 'Yenlung-Auto', 1),
(73, '99', 'Common-None', 1),
(74, '68a', 'Purchasing-Cons', 1),
(75, '68c', 'Purchasing-Auto', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `address` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `name`, `address`) VALUES
(1, 'Premium Sound Solution (ShenZhen) Ltd', '10&11/F,  Tagen Business Building, No. 7019, West HongLi Road, Futian district, Shenzhen'),
(2, 'PSS  HK Ltd ', 'Room 2, 22/F, 280 Portland Street, Mongkok, Kowloon, Hongkong. \nTel #.+852-3160 6212\nFax #+852-3460 4042');

-- --------------------------------------------------------

--
-- Table structure for table `prstatus`
--

CREATE TABLE `prstatus` (
  `id` int(11) NOT NULL,
  `statusName` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `prstatus`
--

INSERT INTO `prstatus` (`id`, `statusName`) VALUES
(3, 'new'),
(4, 'Finance Approved'),
(5, 'GM Approved');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `prNumber` int(8) NOT NULL,
  `supplierName` varchar(50) COLLATE utf8_bin DEFAULT 'N/A',
  `supplierContact` varchar(30) COLLATE utf8_bin DEFAULT 'N/A',
  `supplierPhone` varchar(20) COLLATE utf8_bin DEFAULT 'N/A',
  `invoiceTo` int(3) DEFAULT NULL,
  `shipTo` varchar(30) COLLATE utf8_bin DEFAULT 'APAC',
  `invoiceAddress` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `prDate` varchar(10) COLLATE utf8_bin NOT NULL,
  `categoryName` int(3) DEFAULT NULL,
  `costCode` int(5) DEFAULT NULL,
  `accountNumber` int(5) DEFAULT NULL,
  `projectName` varchar(30) COLLATE utf8_bin DEFAULT 'N/A',
  `withinBudget` int(2) DEFAULT NULL,
  `recoverable` int(2) DEFAULT NULL,
  `chargeBackCustomerName` varchar(50) COLLATE utf8_bin DEFAULT 'N/A',
  `chargeBackCustomerCode` varchar(20) COLLATE utf8_bin DEFAULT 'N/A',
  `chargeBackAmount` varchar(20) COLLATE utf8_bin DEFAULT 'N/A',
  `chargeBackPONumber` varchar(20) COLLATE utf8_bin DEFAULT 'N/A',
  `chargeBackCurrency` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `currency` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `capexNumber` varchar(20) COLLATE utf8_bin DEFAULT 'N/A',
  `capexBudgetNumber` varchar(20) COLLATE utf8_bin DEFAULT 'N/A',
  `purpose` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `deliveryDate` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `requestor` varchar(100) COLLATE utf8_bin NOT NULL,
  `gridContents` text COLLATE utf8_bin,
  `taxRate` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `tax` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `totalWithoutTax` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `total` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `prStatus` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `prNumber`, `supplierName`, `supplierContact`, `supplierPhone`, `invoiceTo`, `shipTo`, `invoiceAddress`, `prDate`, `categoryName`, `costCode`, `accountNumber`, `projectName`, `withinBudget`, `recoverable`, `chargeBackCustomerName`, `chargeBackCustomerCode`, `chargeBackAmount`, `chargeBackPONumber`, `chargeBackCurrency`, `currency`, `capexNumber`, `capexBudgetNumber`, `purpose`, `deliveryDate`, `requestor`, `gridContents`, `taxRate`, `tax`, `totalWithoutTax`, `total`, `prStatus`) VALUES
(1, 100001, '中国', '人民', '+86 755 82688396', 1, 'APAC', '10&11/F,  Tagen Business Building, No. 7019, West HongLi Road, Futian district, Shenzhen', '2017-02-27', 8, 10, 8, 'N/A', 1, 0, 'N/A', 'N/A', 'N/A', 'N/A', 'RMB', 'RMB', 'N/A', 'N/A', '~!@#$%^&*();''.,/<>?:"|}{', '2017-02-28', 'JACKSON.LI', 'a:19:{s:8:"prNumber";s:6:"100001";s:4:"row1";a:6:{i:0;s:6:"Laptop";i:1;s:3:"Set";i:2;s:6:"000000";i:3;s:4:"5000";i:4;s:1:"3";i:5;s:9:"15,000.00";}s:4:"row2";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row3";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row4";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row5";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row6";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row7";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row8";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row9";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row10";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row11";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row12";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row13";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row14";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"totalWithoutTax";s:9:"15,000.00";s:7:"taxRate";s:4:"0.17";s:3:"tax";s:8:"2,550.00";s:5:"total";s:9:"17,550.00";}', '0.17', '2,550.00', '15,000.00', '17,550.00', 'New'),
(2, 100002, 'N/A', 'N/A', 'N/A', 1, 'APAC', '10&11/F,  Tagen Business Building, No. 7019, West HongLi Road, Futian district, Shenzhen', '2017-02-27', 8, 10, 8, 'N/A', NULL, NULL, 'N/A', 'N/A', 'N/A', 'N/A', 'RMB', 'RMB', 'N/A', 'N/A', '', '2017-02-28', 'JACKSON.LI', 'a:19:{s:8:"prNumber";s:6:"100002";s:4:"row1";a:6:{i:0;s:13:"Netapp server";i:1;s:3:"Set";i:2;s:6:"000000";i:3;s:5:"50000";i:4;s:1:"2";i:5;s:10:"100,000.00";}s:4:"row2";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row3";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row4";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row5";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row6";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row7";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row8";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row9";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row10";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row11";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row12";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row13";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row14";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"totalWithoutTax";s:10:"100,000.00";s:7:"taxRate";s:4:"0.17";s:3:"tax";s:9:"17,000.00";s:5:"total";s:10:"117,000.00";}', '0.17', '17,000.00', '100,000.00', '117,000.00', 'New'),
(3, 100003, 'N/A', 'N/A', 'N/A', 1, 'APAC', '10&11/F,  Tagen Business Building, No. 7019, West HongLi Road, Futian district, Shenzhen', '2017-02-27', 8, 7, 6, '000000', 1, 1, 'N/A', 'N/A', 'N/A', 'N/A', 'RMB', 'RMB', 'N/A', 'N/A', 'N/A', '2017-02-28', 'JACKSON.LI', 'a:19:{s:8:"prNumber";s:6:"100003";s:4:"row1";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row2";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row3";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row4";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row5";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row6";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row7";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row8";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row9";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row10";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row11";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row12";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row13";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row14";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"totalWithoutTax";s:0:"";s:7:"taxRate";s:4:"0.17";s:3:"tax";s:4:"0.00";s:5:"total";s:4:"0.00";}', '0.17', '0.00', '', '0.00', 'New');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costcode`
--
ALTER TABLE `costcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prstatus`
--
ALTER TABLE `prstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prNumber` (`prNumber`),
  ADD KEY `invoiceTo` (`invoiceTo`),
  ADD KEY `categoryName` (`categoryName`),
  ADD KEY `costCode` (`costCode`),
  ADD KEY `accountNumber` (`accountNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `costcode`
--
ALTER TABLE `costcode`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prstatus`
--
ALTER TABLE `prstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`invoiceTo`) REFERENCES `invoice` (`id`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`costCode`) REFERENCES `costcode` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_3` FOREIGN KEY (`categoryName`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_4` FOREIGN KEY (`accountNumber`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
