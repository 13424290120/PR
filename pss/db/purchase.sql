-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2016 at 12:04 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purchase`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `accountNumber` varchar(10) COLLATE gb2312_bin NOT NULL,
  `description` varchar(30) COLLATE gb2312_bin NOT NULL,
  `explaination` varchar(50) COLLATE gb2312_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `accountNumber`, `description`, `explaination`) VALUES
(1, '004100', 'Capex-CAPITALISED SOFTWARE', '>=USD 5K'),
(2, '030010', 'Capex-MACHINERY', 'a set of asset>=USD 5K,'),
(3, '040060', 'Capex-IC2-JIGS & FIXTURE', 'jigs, a set of jigs>=USD 5k'),
(4, '040100', 'Capex-IC3-PRODUCTION TOOLS', 'toolings>=USD5k'),
(5, '045010', 'Capex-MEASURING EQUIPMENT', 'measuring equipment, QSC,Klippel ;>=USD 5k'),
(6, '045020', 'Capex-IT EQUIPMENT', 'workstation, server, all computers'),
(7, '045030', 'Capex-OFFICE F&F', 'fixture,furniture;>=USD 5k'),
(8, '144500', '3rd party paid', 'customer pay'),
(9, '616081', 'WORKERS MEAL-CANTEEN IN PLANT', 'traveling meal in subcon canteen'),
(10, '616090', 'CONFERENCE EXPENSES', 'HR, town meeting etc.'),
(11, '617000', 'STAFF TRAINING', 'seminar,  training'),
(12, '618010', 'CONSULTANCY FEE', 'KWT, TAX, P&V translation fee,'),
(13, '618020', 'AUDIT FEE', 'KPMG for finance only.'),
(14, '619000', 'RECRUITING EXPENSESS', 'HR recuiting expense'),
(15, '619010', 'STAFF RECREATION', 'Only for team building CNY50/staff'),
(16, '619020', 'STAFF INSURANCE', 'commerical insurance'),
(17, '619040', 'LBS-HR SUPPORT', 'HR,Fesco'),
(18, '619200', 'OTHER STAFF COST-NON EXP', '少数员工特有的福利: allowance.'),
(19, '619210', 'Company events', '人人有份的员工福利: summer outing, birthday, wedding,fruit,'),
(20, '622200', 'PLANT RENTAL', 'n/a'),
(21, '623010', 'R&M-TOOLS', 'repair and maintenance of tool'),
(22, '623030', 'R&M-OTHER', 'non tooling repair and maitenance'),
(23, '626000', 'Consumables', 'SEPARATELY purchased IT related material for BUSIN'),
(24, '626010', 'NON CAP-OTHER', '>1 year, small value,'),
(25, '626020', 'Software New', 'all NEW or ADDITIONAL purchased software licenses.'),
(26, '627100', 'ELECTRICITY & WATER- office', 'office, '),
(27, '627200', 'ELECTRICITY & WATER- plant', 'Plant'),
(28, '630020', 'Services & Consultancy', 'Contractors, not on PSS payroll, working on-site o'),
(29, '630030', 'BUS APP-EDI', ''),
(30, '630040', 'Servers', 'all Servers, server storage OR server equipment (b'),
(31, '634000', 'TEL/IDD CHGS', ''),
(32, '634100', 'Network', 'All WAN related costs: MPLS (GTT) and Direct inter'),
(33, '639000', 'Printers', 'Lease OR purchase of new printer material, includi'),
(34, '639100', 'Software maintenance', 'all cost to maintain purchased software, web subsc'),
(35, '639200', 'Facilities', 'All costs to set-up or to maintain facilities, IT '),
(36, '639300', 'Client PCs', 'Purchase OR lease of laptops, desktops, workstatio'),
(37, '639400', 'Communication', 'All additional communication services and applianc'),
(38, '641000', 'OUTWARD HANDLING', 'export fee, trade link system'),
(39, '643000', 'WAREHOUSE-3RD PARTY', 'LOGISTIC'),
(40, '643100', 'WAREHOUSE-SHARE', 'n/a'),
(41, '649000', 'OUTWARD INSURANCE', 'n/a'),
(42, '657000', 'INSURANCE', 'Property insurance'),
(43, '659040', 'SAMPLE-FOC', 'sample free of customer'),
(44, '659050', 'ENTERTAINMENT-CUSTOMER', 'dinner etc'),
(45, '659060', 'WARRANTY', 'expenses charged from customers within guarantee p'),
(46, '659100', 'OTHER SALES RELATED COST', 'commission etc'),
(47, '660000', 'LEGAL FEE', 'lawyer'),
(48, '664000', 'STATIONERY', 'for office'),
(49, '669010', 'PERIODICALS & BOOKS', 'books and managzine'),
(50, '669040', 'MESSENGER & COURIER SER', 'DHL, Shunfeng ,Fedex'),
(51, '669130', 'LBS-PCI F&A', 'Service fee 5%, canceled in FY13, only for Finance'),
(52, '669200', 'CHG-TOOLING MODIFICATION', 'TOOLING MODIFICATION, <USD 5K'),
(53, '669210', 'CHG-ARTWORK/DESGIN COST', 'Consumer, hardware, PCB, <USD 5K'),
(54, '669220', 'PROTOTYPE', 'model'),
(55, '669221', 'SOFT TOOLS', 'for project, one time use, for sample and lower va'),
(56, '669300', 'TESTING COST', 'TQM, PROJECT, supplier SMQ,SGS and so on'),
(57, '669900', 'OPERATION SUPPORT COST', 'others for operation'),
(58, '669910', 'SUNDRY EXPENSES', 'OTHERS for expenses'),
(59, '669920', 'SUNDRY MATERIAL-DEV USED', 'R&D USED only'),
(60, '770000', 'RAW MATERIAL', 'non subcon buying material'),
(61, '770030', 'SCRAP', 'scrap goods charged from Customer'),
(62, '772010', 'TRIAL RUN', 'non custmer pay'),
(63, '772020', 'REWORK MATERIAL', 'REWORK MATERIAL'),
(64, '772030', 'CHANGE DESIGN', 'Cost of design change'),
(65, '772040', 'SUNDRY', 'others for manufactory cost'),
(66, '772060', 'REWORK LABOUR', 'rework labor cost'),
(67, '772070', 'LOST SHIPMENT', 'lost shipment,n/a'),
(68, '773000', 'SUBCON WORK', 'inefficiency working time'),
(69, '773100', 'COST OF PRODUCTION', 'subcon amount variance claim'),
(70, '773200', 'LABOR', 'expected hour rate vs actual hour rate'),
(71, '774000', 'INWARD FREIGHT', 'freight for buying '),
(72, '775000', 'IMPORT DUTIES', 'import taxes, such as Custom Tax'),
(73, '779000', 'DAMAGE ON ARRIVAL', 'loss on arrival'),
(74, '779020', 'STOCK TAKE ADJ', 'stock take loss'),
(75, '782010', 'COGS-3RD-ACCRUAL', 'n/a, system automatically run'),
(76, '787040', 'OBS STOCK', 'obsolete stock can not be shipped out to customer'),
(77, '788100', 'IC2 CHARGES', 'jig and fixture');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `abbr` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `remarks` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `abbr`, `remarks`) VALUES
(1, 'Material purchase', 'M', ''),
(2, 'Scrap of Material', 'Q', ''),
(3, 'Equipment, Machines,Tools, jig & fixtures', 'E', ''),
(4, 'Toolings (hard tooling)', 'T', ''),
(5, 'Toolings (soft tooling)', 'T', ''),
(6, 'Operation related - rework, processing', 'O', ''),
(7, 'Test Service', 'S', ''),
(8, 'IT Related', 'I', 'it means budget for IT , like as software, softwar'),
(9, 'Prototype (plastic prototype )', 'P', ''),
(10, 'Prototype (metal prototype )', 'P', ''),
(11, 'Prototype (PCBA )', '', ''),
(12, 'Test equipment maintenance', 'T', ''),
(13, 'Others Non-bom', 'N', 'like as calibration , repairing and so on.'),
(14, 'Furniture & Fixture', 'F', ''),
(15, 'Office equipment', 'OF', '');

-- --------------------------------------------------------

--
-- Table structure for table `costcode`
--

CREATE TABLE `costcode` (
  `id` int(11) NOT NULL,
  `code` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `codename` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

--
-- Dumping data for table `costcode`
--

INSERT INTO `costcode` (`id`, `code`, `codename`, `type`) VALUES
(2, '10', 'Parts', 'sales'),
(3, '11', 'AV', 'sales'),
(4, '12', 'MM', 'sales'),
(5, '13', 'AUTOMOTIVE', 'sales'),
(6, '15A', 'Engineer-CON', 'MFG'),
(7, '15C', 'Engineer-AUTO', 'MFG'),
(8, '16A', 'COSTING-CON', '1/2 MFG,1/2 DEV'),
(9, '16C', 'COSTING-AUTO', '1/2 MFG,1/2 DEV'),
(10, '17', 'IT', 'IT'),
(11, '18', 'Phoenix project', 'Expense/Cogs'),
(12, '19', 'Shat-Shelter', 'Shat-Shelter'),
(13, '21A', 'Operation -CON', 'MFG'),
(14, '21C', 'Operation-AUTO', 'MFG'),
(15, '23C', 'Operation-AUTO', 'MFG'),
(16, '22', ' Industry plan', 'MFG'),
(17, '24', ' Industry plan -project', 'MFG'),
(18, '25A', 'PROJECT MANAGEMENT-CON', 'DEV'),
(19, '25C', 'PROJECT MANAGEMENT-AUTO', 'DEV'),
(20, '35', 'COMMERCIAL(Consumer)', 'sales'),
(21, '40', 'Commercial(Auto)', 'sales'),
(22, '45A', 'TQM-CON', '1/2 MFG,1/2 DEV'),
(23, '45C', 'TQM-AUTO', '1/2 MFG,1/2 DEV'),
(24, '46', 'TQM-CHG DEV', '1/2 MFG,1/2 DEV'),
(25, '55A', 'DEVELOPMENT-CON', 'DEV'),
(26, '55C', 'DEVELOPMENT-AUTO', 'DEV'),
(27, '56', 'Dev cost recovery', ''),
(28, '66A', 'PURCHASING/IP-CON', 'DEV*70%,MFG*30%'),
(29, '66C', 'PURCHASING/IP-AUTO', 'DEV*70%,MFG*30%'),
(30, '67', 'IP-BU', 'HQR'),
(31, '68A', 'Global Commodity Manager', 'DEV*70%,MFG*30%'),
(32, '74A', 'Manufacturing-AV/MM', 'MFG'),
(33, '74C', 'Manufacturing-Car', 'MFG'),
(34, '75A', 'GENERAL MGT-CON', 'MFG'),
(35, '75C', 'GENERAL MGT-AUTO', 'MFG'),
(36, '77', 'HR', 'HR'),
(37, '99', 'COMMON', ''),
(38, '26', 'DMMH- for YUJI TEAM', 'OTHERS'),
(39, '29', 'DMMH-for Doreen team ', 'OTHERS'),
(40, '20', 'BA', 'OTHERS'),
(41, '27', 'DMC', 'OTHERS'),
(42, '28', 'BGJ', 'OTHERS'),
(43, '65A', 'LOGISTIC-CON', 'LOG'),
(44, '65C', 'LOGISTIC-AUTO', 'LOG'),
(45, '76', 'FINANCE & ACCOUNTING-CON', 'F&A');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE gb2312_bin NOT NULL,
  `address` varchar(200) COLLATE gb2312_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

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
  `statusName` varchar(20) COLLATE gb2312_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

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
  `id` int(5) NOT NULL,
  `prNumber` int(8) NOT NULL,
  `supplierName` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `supplierContact` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `supplierPhone` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `invoiceTo` int(3) DEFAULT NULL,
  `invoiceAddress` varchar(500) COLLATE gb2312_bin DEFAULT NULL,
  `prDate` varchar(10) COLLATE gb2312_bin DEFAULT NULL,
  `categoryName` int(3) DEFAULT NULL,
  `costCode` int(5) DEFAULT NULL,
  `accountNumber` int(5) DEFAULT NULL,
  `withinBudget` int(2) DEFAULT NULL,
  `recoverable` int(2) DEFAULT NULL,
  `currency` varchar(5) COLLATE gb2312_bin DEFAULT NULL,
  `purpose` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `deliveryDate` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `projectNumber` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `requestor` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `gridContents` text COLLATE gb2312_bin,
  `total` float DEFAULT NULL,
  `prStatus` int(2) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `prNumber`, `supplierName`, `supplierContact`, `supplierPhone`, `invoiceTo`, `invoiceAddress`, `prDate`, `categoryName`, `costCode`, `accountNumber`, `withinBudget`, `recoverable`, `currency`, `purpose`, `deliveryDate`, `projectNumber`, `requestor`, `gridContents`, `total`, `prStatus`) VALUES
(2, 16000002, 'HP', 'Ben', '13424290120', 1, '10&11/F,  Tagen Business Building, No. 7019, West HongLi Road, Futian district, Shenzhen', '2016-10-26', 8, 10, 6, 0, 1, 'RMB', 'To extend service for hp server', '2016-10-31', NULL, 'tony.huang@premiumsoundsolutions.com', 'a:11:{s:8:"prNumber";s:8:"16000002";s:4:"row1";a:5:{i:0;s:15:"Hp server DL390";i:1;s:2:"IT";i:2;s:4:"5000";i:3;s:1:"2";i:4;s:5:"10000";}s:4:"row2";a:5:{i:0;s:15:"HP Server DL360";i:1;s:2:"IT";i:2;s:4:"2500";i:3;s:1:"1";i:4;s:4:"2500";}s:4:"row3";a:5:{i:0;s:14:"Netapp Storage";i:1;s:2:"IT";i:2;s:5:"12000";i:3;s:1:"1";i:4;s:5:"12000";}s:4:"row4";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row5";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row6";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row7";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row8";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row9";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"total";s:5:"24500";}', 24500, 3),
(3, 16000003, 'PTS', 'Mike', '13424290120', 1, '10&11/F,  Tagen Business Building, No. 7019, West HongLi Road, Futian district, Shenzhen', '2016-10-26', 8, 10, 6, 1, 0, 'RMB', 'To buy two spare network switch', '2016-10-31', NULL, 'jackson.li@premiumsoundsolutions.com', 'a:11:{s:8:"prNumber";s:8:"16000003";s:4:"row1";a:5:{i:0;s:17:"Cisco 2960-XR 48P";i:1;s:2:"IT";i:2;s:5:"12000";i:3;s:1:"2";i:4;s:5:"24000";}s:4:"row2";a:5:{i:0;s:13:"2meters cable";i:1;s:2:"IT";i:2;s:1:"5";i:3;s:2:"10";i:4;s:2:"50";}s:4:"row3";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row4";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row5";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row6";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row7";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row8";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row9";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"total";s:5:"24050";}', 24050, 3),
(4, 16000004, 'HP', 'Ben', '13424290120', 2, 'Room 2, 22/F, 280 Portland Street, Mongkok, Kowloon, Hongkong. \r\nTel #.+852-3160 6212\r\nFax #+852-3460 4042', '2016-10-26', 8, 10, 6, 0, 0, 'RMB', 'To buy 10 desktop for factory', '2016-11-30', NULL, 'jackson.li@premiumsoundsolutions.com', 'a:17:{s:8:"prNumber";s:8:"16000004";s:4:"row1";a:5:{i:0;s:13:"HP desktop PC";i:1;s:2:"IT";i:2;s:4:"5000";i:3;s:2:"10";i:4;s:5:"50000";}s:4:"row2";a:5:{i:0;s:10:"HP Monitor";i:1;s:2:"IT";i:2;s:4:"1500";i:3;s:2:"10";i:4;s:5:"15000";}s:4:"row3";a:5:{i:0;s:8:"HP Mouse";i:1;s:2:"IT";i:2;s:2:"50";i:3;s:2:"10";i:4;s:3:"500";}s:4:"row4";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row5";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row6";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row7";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row8";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row9";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row10";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row11";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row12";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row13";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row14";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row15";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"total";s:5:"65500";}', 65500, 3),
(5, 16000005, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 3),
(6, 16000006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JACKSON.LI', NULL, NULL, 3),
(7, 16000007, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JACKSON.LI', NULL, NULL, 3),
(8, 16000008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JACKSON.LI', NULL, NULL, 3),
(9, 16000009, 'HP', 'Ben', '13424290120', 1, '10&11/F,  Tagen Business Building, No. 7019, West HongLi Road, Futian district, Shenzhen', '2016-10-27', 8, 10, 6, 1, 0, 'RMB', 'To buy 20 computers', '2016-11-24', NULL, 'JACKSON.LI', 'a:17:{s:8:"prNumber";s:8:"16000009";s:4:"row1";a:5:{i:0;s:6:"laptop";i:1;s:2:"IT";i:2;s:4:"8000";i:3;s:2:"20";i:4;s:6:"160000";}s:4:"row2";a:5:{i:0;s:5:"mouse";i:1;s:2:"IT";i:2;s:2:"80";i:3;s:2:"20";i:4;s:4:"1600";}s:4:"row3";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row4";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row5";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row6";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row7";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row8";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row9";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row10";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row11";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row12";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row13";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row14";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row15";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"total";s:6:"161600";}', 161600, 3),
(10, 16000010, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JACKSON.LI', NULL, NULL, 3),
(11, 16000011, 'HP', 'Ben', '88888888', 1, '10&11/F,  Tagen Business Building, No. 7019, West HongLi Road, Futian district, Shenzhen', '2016-10-27', 8, 10, 6, 1, 0, 'RMB', 'To buy 20 laptops', '2016-11-30', NULL, 'JACKSON.LI', 'a:17:{s:8:"prNumber";s:8:"16000011";s:4:"row1";a:5:{i:0;s:18:"HP elitebook 840G3";i:1;s:2:"IT";i:2;s:4:"8000";i:3;s:2:"20";i:4;s:6:"160000";}s:4:"row2";a:5:{i:0;s:15:"HP computer bag";i:1;s:2:"IT";i:2;s:3:"180";i:3;s:2:"20";i:4;s:4:"3600";}s:4:"row3";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row4";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row5";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row6";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row7";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row8";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:4:"row9";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row10";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row11";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row12";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row13";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row14";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"row15";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:5:"total";s:6:"163600";}', 163600, 3),
(12, 16000012, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JACKSON.LI', NULL, NULL, 3);

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
  ADD UNIQUE KEY `prNumber` (`prNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `costcode`
--
ALTER TABLE `costcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
