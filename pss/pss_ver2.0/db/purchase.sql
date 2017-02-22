-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 06:22 AM
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
  `active` int(1) NOT NULL DEFAULT '1',
  `description` varchar(30) COLLATE gb2312_bin NOT NULL,
  `explaination` varchar(50) COLLATE gb2312_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `accountNumber`, `active`, `description`, `explaination`) VALUES
(1, '004100', 1, 'Capex-CAPITALISED SOFTWARE', '>=USD 5K'),
(2, '030010', 1, 'Capex-MACHINERY', 'a set of asset>=USD 5K,'),
(3, '040060', 1, 'Capex-IC2-JIGS & FIXTURE', 'jigs, a set of jigs>=USD 5k'),
(4, '040100', 1, 'Capex-IC3-PRODUCTION TOOLS', 'toolings>=USD5k'),
(5, '045010', 1, 'Capex-MEASURING EQUIPMENT', 'measuring equipment, QSC,Klippel ;>=USD 5k'),
(6, '045020', 1, 'Capex-IT EQUIPMENT', 'workstation, server, all computers'),
(7, '045030', 1, 'Capex-OFFICE F&F', 'fixture,furniture;>=USD 5k'),
(8, '144500', 1, '3rd party paid', 'customer pay'),
(9, '616081', 1, 'WORKERS MEAL-CANTEEN IN PLANT', 'traveling meal in subcon canteen'),
(10, '616090', 1, 'CONFERENCE EXPENSES', 'HR, town meeting etc.'),
(11, '617000', 1, 'STAFF TRAINING', 'seminar,  training'),
(12, '618010', 1, 'CONSULTANCY FEE', 'KWT, TAX, P&V translation fee,'),
(13, '618020', 1, 'AUDIT FEE', 'KPMG for finance only.'),
(14, '619000', 1, 'RECRUITING EXPENSESS', 'HR recuiting expense'),
(15, '619010', 1, 'STAFF RECREATION', 'Only for team building CNY50/staff'),
(16, '619020', 1, 'STAFF INSURANCE', 'commerical insurance'),
(17, '619040', 1, 'LBS-HR SUPPORT', 'HR,Fesco'),
(18, '619200', 1, 'OTHER STAFF COST-NON EXP', '少数员工特有的福利: allowance.'),
(19, '619210', 1, 'Company events', '人人有份的员工福利: summer outing, birthday, wedding,fruit,'),
(20, '622200', 1, 'PLANT RENTAL', 'n/a'),
(21, '623010', 1, 'R&M-TOOLS', 'repair and maintenance of tool'),
(22, '623030', 1, 'R&M-OTHER', 'non tooling repair and maitenance'),
(23, '626000', 1, 'Consumables', 'SEPARATELY purchased IT related material for BUSIN'),
(24, '626010', 1, 'NON CAP-OTHER', '>1 year, small value,'),
(25, '626020', 1, 'Software New', 'all NEW or ADDITIONAL purchased software licenses.'),
(26, '627100', 1, 'ELECTRICITY & WATER- office', 'office, '),
(27, '627200', 1, 'ELECTRICITY & WATER- plant', 'Plant'),
(28, '630020', 1, 'Services & Consultancy', 'Contractors, not on PSS payroll, working on-site o'),
(29, '630030', 1, 'BUS APP-EDI', ''),
(30, '630040', 1, 'Servers', 'all Servers, server storage OR server equipment (b'),
(31, '634000', 1, 'TEL/IDD CHGS', ''),
(32, '634100', 1, 'Network', 'All WAN related costs: MPLS (GTT) and Direct inter'),
(33, '639000', 1, 'Printers', 'Lease OR purchase of new printer material, includi'),
(34, '639100', 1, 'Software maintenance', 'all cost to maintain purchased software, web subsc'),
(35, '639200', 1, 'Facilities', 'All costs to set-up or to maintain facilities, IT '),
(36, '639300', 1, 'Client PCs', 'Purchase OR lease of laptops, desktops, workstatio'),
(37, '639400', 1, 'Communication', 'All additional communication services and applianc'),
(38, '641000', 1, 'OUTWARD HANDLING', 'export fee, trade link system'),
(39, '643000', 1, 'WAREHOUSE-3RD PARTY', 'LOGISTIC'),
(40, '643100', 1, 'WAREHOUSE-SHARE', 'n/a'),
(41, '649000', 1, 'OUTWARD INSURANCE', 'n/a'),
(42, '657000', 1, 'INSURANCE', 'Property insurance'),
(43, '659040', 1, 'SAMPLE-FOC', 'sample free of customer'),
(44, '659050', 1, 'ENTERTAINMENT-CUSTOMER', 'dinner etc'),
(45, '659060', 1, 'WARRANTY', 'expenses charged from customers within guarantee p'),
(46, '659100', 1, 'OTHER SALES RELATED COST', 'commission etc'),
(47, '660000', 1, 'LEGAL FEE', 'lawyer'),
(48, '664000', 1, 'STATIONERY', 'for office'),
(49, '669010', 1, 'PERIODICALS & BOOKS', 'books and managzine'),
(50, '669040', 1, 'MESSENGER & COURIER SER', 'DHL, Shunfeng ,Fedex'),
(51, '669130', 1, 'LBS-PCI F&A', 'Service fee 5%, canceled in FY13, only for Finance'),
(52, '669200', 1, 'CHG-TOOLING MODIFICATION', 'TOOLING MODIFICATION, <USD 5K'),
(53, '669210', 1, 'CHG-ARTWORK/DESGIN COST', 'Consumer, hardware, PCB, <USD 5K'),
(54, '669220', 1, 'PROTOTYPE', 'model'),
(55, '669221', 1, 'SOFT TOOLS', 'for project, one time use, for sample and lower va'),
(56, '669300', 1, 'TESTING COST', 'TQM, PROJECT, supplier SMQ,SGS and so on'),
(57, '669900', 1, 'OPERATION SUPPORT COST', 'others for operation'),
(58, '669910', 1, 'SUNDRY EXPENSES', 'OTHERS for expenses'),
(59, '669920', 1, 'SUNDRY MATERIAL-DEV USED', 'R&D USED only'),
(60, '770000', 1, 'RAW MATERIAL', 'non subcon buying material'),
(61, '770030', 1, 'SCRAP', 'scrap goods charged from Customer'),
(62, '772010', 1, 'TRIAL RUN', 'non custmer pay'),
(63, '772020', 1, 'REWORK MATERIAL', 'REWORK MATERIAL'),
(64, '772030', 1, 'CHANGE DESIGN', 'Cost of design change'),
(65, '772040', 1, 'SUNDRY', 'others for manufactory cost'),
(66, '772060', 1, 'REWORK LABOUR', 'rework labor cost'),
(67, '772070', 1, 'LOST SHIPMENT', 'lost shipment,n/a'),
(68, '773000', 1, 'SUBCON WORK', 'inefficiency working time'),
(69, '773100', 1, 'COST OF PRODUCTION', 'subcon amount variance claim'),
(70, '773200', 1, 'LABOR', 'expected hour rate vs actual hour rate'),
(71, '774000', 1, 'INWARD FREIGHT', 'freight for buying '),
(72, '775000', 1, 'IMPORT DUTIES', 'import taxes, such as Custom Tax'),
(73, '779000', 1, 'DAMAGE ON ARRIVAL', 'loss on arrival'),
(74, '779020', 1, 'STOCK TAKE ADJ', 'stock take loss'),
(75, '782010', 1, 'COGS-3RD-ACCRUAL', 'n/a, system automatically run'),
(76, '787040', 1, 'OBS STOCK', 'obsolete stock can not be shipped out to customer'),
(77, '788100', 1, 'IC2 CHARGES', 'jig and fixture'),
(78, '616060', 1, 'Company Car Expenses', ''),
(79, '616071', 1, 'Plant Dormitory', ''),
(80, '618021', 1, 'Audit Fee-Others', ''),
(81, '619100', 1, 'Other Expat Cost', ''),
(82, '619110', 1, 'Expat Housing Cost', ''),
(83, '619300', 1, 'Other Prc Staff Cost', ''),
(84, '619320', 1, 'Visa Fee', ''),
(85, '619400', 1, 'Expatriate-Iit', ''),
(86, '619500', 1, 'Entertainment', ''),
(87, '620020', 1, 'Other Prc Staff Cost', ''),
(88, '622000', 1, 'Office Rental', ''),
(89, '623020', 1, 'R&M-Machine&Equipment', ''),
(90, '623021', 1, ' Cogs - Facility Maintenance', ''),
(91, '632000', 1, 'Wan/Lan', ''),
(92, '634200', 1, 'Tel/Idd-Staff', ''),
(93, '640020', 1, 'Outward Freight-Sea', ''),
(94, '640040', 1, 'Outward Freight-Road', ''),
(95, '649100', 1, 'Export Duties', ''),
(96, '659061', 1, 'Warranty', ''),
(97, '664010', 1, 'Om Charge', ''),
(98, '770031', 1, ' Actual Temperary Operation ', ''),
(99, '770032', 1, 'Effiency Loss', ''),
(100, '772011', 1, 'Trial Run Manhours', ''),
(101, '772050', 1, 'Goods Return', ''),
(102, '782000', 1, 'Cogs-3Rd-Mat', ''),
(103, '782060', 1, 'Cogs-Other Business', ''),
(104, '788200', 1, 'Cogs-Tooling Cost', ''),
(105, '150000', 1, 'Customer Tooling Recoverable', ''),
(106, '151000', 1, 'Other Receivable-Capex Export', ''),
(107, '55000', 1, 'Cip-Contribution In Progress', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `abbr` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `remarks` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `active`, `abbr`, `remarks`) VALUES
(1, 'Material purchase', 1, 'M', ''),
(2, 'Scrap of Material', 1, 'Q', ''),
(3, 'Equipment, Machines,Tools, jig & fixtures', 1, 'E', ''),
(4, 'Toolings (hard tooling)', 1, 'T', ''),
(5, 'Toolings (soft tooling)', 1, 'T', ''),
(6, 'Operation related - rework, processing', 1, 'O', ''),
(7, 'Test Service', 1, 'S', ''),
(8, 'IT Related', 1, 'I', 'it means budget for IT , like as software, softwar'),
(9, 'Prototype (plastic prototype )', 1, 'P', ''),
(10, 'Prototype (metal prototype )', 1, 'P', ''),
(11, 'Prototype (PCBA )', 1, '', ''),
(12, 'Test equipment maintenance', 1, 'T', ''),
(13, 'Others Non-bom', 1, 'N', 'like as calibration , repairing and so on.'),
(14, 'Furniture & Fixture', 1, 'F', ''),
(15, 'Office equipment', 1, 'OF', '');

-- --------------------------------------------------------

--
-- Table structure for table `costcode`
--

CREATE TABLE `costcode` (
  `id` int(11) NOT NULL,
  `code` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `codename` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

--
-- Dumping data for table `costcode`
--

INSERT INTO `costcode` (`id`, `code`, `codename`, `active`, `type`) VALUES
(2, '10', 'Parts', 1, 'sales'),
(3, '11', 'AV', 1, 'sales'),
(4, '12', 'MM', 1, 'sales'),
(5, '13', 'AUTOMOTIVE', 1, 'sales'),
(6, '15A', 'Engineer-CON', 1, 'MFG'),
(7, '15C', 'Engineer-AUTO', 1, 'MFG'),
(8, '16A', 'COSTING-CON', 1, '1/2 MFG,1/2 DEV'),
(9, '16C', 'COSTING-AUTO', 1, '1/2 MFG,1/2 DEV'),
(10, '17', 'IT', 1, 'IT'),
(11, '18', 'Phoenix project', 1, 'Expense/Cogs'),
(12, '19', 'Shat-Shelter', 1, 'Shat-Shelter'),
(13, '21A', 'Operation -CON', 1, 'MFG'),
(14, '21C', 'Operation-AUTO', 1, 'MFG'),
(15, '23C', 'Operation-AUTO', 1, 'MFG'),
(16, '22', ' Industry plan', 1, 'MFG'),
(17, '24', ' Industry plan -project', 1, 'MFG'),
(18, '25A', 'PROJECT MANAGEMENT-CON', 1, 'DEV'),
(19, '25C', 'PROJECT MANAGEMENT-AUTO', 1, 'DEV'),
(20, '35', 'COMMERCIAL(Consumer)', 1, 'sales'),
(21, '40', 'Commercial(Auto)', 1, 'sales'),
(22, '45A', 'TQM-CON', 1, '1/2 MFG,1/2 DEV'),
(23, '45C', 'TQM-AUTO', 1, '1/2 MFG,1/2 DEV'),
(24, '46', 'TQM-CHG DEV', 1, '1/2 MFG,1/2 DEV'),
(25, '55A', 'DEVELOPMENT-CON', 1, 'DEV'),
(26, '55C', 'DEVELOPMENT-AUTO', 1, 'DEV'),
(27, '56', 'Dev cost recovery', 1, ''),
(28, '66A', 'PURCHASING/IP-CON', 1, 'DEV*70%,MFG*30%'),
(29, '66C', 'PURCHASING/IP-AUTO', 1, 'DEV*70%,MFG*30%'),
(30, '67', 'IP-BU', 1, 'HQR'),
(31, '68A', 'Global Commodity Manager', 1, 'DEV*70%,MFG*30%'),
(32, '74A', 'Manufacturing-AV/MM', 1, 'MFG'),
(33, '74C', 'Manufacturing-Car', 1, 'MFG'),
(34, '75A', 'GENERAL MGT-CON', 1, 'MFG'),
(35, '75C', 'GENERAL MGT-AUTO', 1, 'MFG'),
(36, '77', 'HR', 1, 'HR'),
(37, '99', 'COMMON', 1, ''),
(38, '26', 'DMMH- for YUJI TEAM', 1, 'OTHERS'),
(39, '29', 'DMMH-for Doreen team ', 1, 'OTHERS'),
(40, '20', 'BA', 1, 'OTHERS'),
(41, '27', 'DMC', 1, 'OTHERS'),
(42, '28', 'BGJ', 1, 'OTHERS'),
(43, '65A', 'LOGISTIC-CON', 1, 'LOG'),
(44, '65C', 'LOGISTIC-AUTO', 1, 'LOG'),
(45, '76', 'FINANCE & ACCOUNTING-CON', 1, 'F&A');

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
  `supplierName` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'N/A',
  `supplierContact` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'N/A',
  `supplierPhone` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'N/A',
  `invoiceTo` int(3) DEFAULT NULL,
  `shipTo` varchar(30) COLLATE gb2312_bin DEFAULT 'APAC',
  `invoiceAddress` varchar(500) COLLATE gb2312_bin DEFAULT NULL,
  `prDate` varchar(10) COLLATE gb2312_bin DEFAULT NULL,
  `categoryName` int(3) DEFAULT NULL,
  `costCode` int(5) DEFAULT NULL,
  `accountNumber` int(5) DEFAULT NULL,
  `projectName` varchar(30) COLLATE gb2312_bin DEFAULT 'N/A',
  `withinBudget` int(2) DEFAULT NULL,
  `recoverable` int(2) DEFAULT NULL,
  `chargeBackCustomerName` varchar(50) COLLATE gb2312_bin DEFAULT 'N/A',
  `chargeBackCustomerCode` varchar(20) COLLATE gb2312_bin DEFAULT 'N/A',
  `chargeBackAmount` varchar(20) COLLATE gb2312_bin DEFAULT 'N/A',
  `chargeBackPONumber` varchar(20) COLLATE gb2312_bin DEFAULT 'N/A',
  `chargeBackCurrency` varchar(5) COLLATE gb2312_bin DEFAULT NULL,
  `currency` varchar(5) COLLATE gb2312_bin DEFAULT NULL,
  `capexNumber` varchar(20) COLLATE gb2312_bin DEFAULT 'N/A',
  `capexBudgetNumber` varchar(20) COLLATE gb2312_bin DEFAULT 'N/A',
  `purpose` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `deliveryDate` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `requestor` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `gridContents` text COLLATE gb2312_bin,
  `taxRate` varchar(5) COLLATE gb2312_bin DEFAULT NULL,
  `tax` varchar(10) COLLATE gb2312_bin DEFAULT NULL,
  `totalWithoutTax` varchar(10) COLLATE gb2312_bin DEFAULT NULL,
  `total` varchar(20) COLLATE gb2312_bin DEFAULT NULL,
  `prStatus` varchar(20) COLLATE gb2312_bin NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `prNumber`, `supplierName`, `supplierContact`, `supplierPhone`, `invoiceTo`, `shipTo`, `invoiceAddress`, `prDate`, `categoryName`, `costCode`, `accountNumber`, `projectName`, `withinBudget`, `recoverable`, `chargeBackCustomerName`, `chargeBackCustomerCode`, `chargeBackAmount`, `chargeBackPONumber`, `chargeBackCurrency`, `currency`, `capexNumber`, `capexBudgetNumber`, `purpose`, `deliveryDate`, `requestor`, `gridContents`, `taxRate`, `tax`, `totalWithoutTax`, `total`, `prStatus`) VALUES
(1, 100001, 'Sinynet', 'Ben', '021-88660421', 1, 'SHAT', '10&amp;11/F,  Tagen Business Building, No. 7019, West HongLi Road, Futian district, Shenzhen', '2017-02-16', 8, 10, 107, 'N/A', 1, 0, 'N/A', 'N/A', 'N/A', 'N/A', 'RMB', 'RMB', 'SZ16010', 'N/A', 'To buy server and storage for SHAT factory, urgently need for WMS system, on top of that, we also need for the SHAT IT infrastructure.', '2017-02-28', 'JACKSON.LI', 'a:19:{s:8:"prNumber";s:6:"100001";s:4:"row1";a:6:{i:0;s:29:"Netapp FAS8020 Storage system";i:1;s:3:"Set";i:2;s:6:"160100";i:3;s:6:"300000";i:4;s:1:"1";i:5;s:10:"300,000.00";}s:4:"row2";a:6:{i:0;s:9:"HP Server";i:1;s:3:"Set";i:2;s:6:"160101";i:3;s:5:"50000";i:4;s:1:"3";i:5;s:10:"150,000.00";}s:4:"row3";a:6:{i:0;s:21:"Huawei Network Switch";i:1;s:3:"Set";i:2;s:6:"160111";i:3;s:4:"5000";i:4;s:1:"2";i:5;s:9:"10,000.00";}s:4:"row4";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row5";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row6";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row7";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row8";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row9";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row10";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row11";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row12";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row13";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row14";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"totalWithoutTax";s:10:"629,694.00";s:7:"taxRate";s:4:"0.17";s:3:"tax";s:10:"107,047.98";s:5:"total";s:10:"736,741.98";}', '0.17', '107,047.98', '629,694.00', '736,741.98', '3'),
(2, 100002, 'HPE', 'Ben', '021-88645200', 1, 'SHAT', '10&11/F,  Tagen Business Building, No. 7019, West HongLi Road, Futian district, Shenzhen', '2017-02-16', 8, 10, 107, 'N/A', 1, 0, 'N/A', 'N/A', 'N/A', 'N/A', 'RMB', 'RMB', 'N/A', 'N/A', 'To lease 10 sets computers for new comers in Mar.', '2017-02-28', 'JACKSON.LI', 'a:19:{s:8:"prNumber";s:6:"100002";s:4:"row1";a:6:{i:0;s:18:"HP Elitebook 840G3";i:1;s:3:"Set";i:2;s:6:"150221";i:3;s:4:"9200";i:4;s:1:"3";i:5;s:9:"27,600.00";}s:4:"row2";a:6:{i:0;s:18:"HP Elitedesk 820G3";i:1;s:3:"Set";i:2;s:6:"150330";i:3;s:4:"7500";i:4;s:1:"3";i:5;s:9:"22,500.00";}s:4:"row3";a:6:{i:0;s:18:"HP Elitedesk 820G4";i:1;s:3:"Set";i:2;s:6:"150336";i:3;s:4:"8000";i:4;s:1:"3";i:5;s:9:"24,000.00";}s:4:"row4";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row5";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row6";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row7";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row8";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row9";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row10";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row11";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row12";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row13";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row14";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"totalWithoutTax";s:9:"74,100.00";s:7:"taxRate";s:4:"0.17";s:3:"tax";s:9:"12,597.00";s:5:"total";s:9:"86,697.00";}', '0.17', '12,597.00', '74,100.00', '86,697.00', '3'),
(3, 100003, 'SinyNet Storage Technology(Beijing)Co.,LTD', 'Mr Wu', '0755-82979598', 1, 'APAC', '10&11/F,  Tagen Business Building, No. 7019, West HongLi Road, Futian district, Shenzhen', '2017-02-17', 8, 10, 107, 'N/A', 0, 0, 'N/A', 'N/A', 'N/A', 'N/A', 'RMB', 'RMB', 'SZ16010-R', 'Non-Bgt-FY1607', 'To buy 3 new servers, 1 NetApp stroage system and VMWare Vsphere software license to build a new IT infrastructure for SHAT factory, it urgently needed by WMS system, on top of that, we have SCCM, Domain controller, Windchill, F-Secure policy server and File servers need to be deployed on the new infrastructure, Currently Dell R610 server has reached it''s end of life, we may got potential crash risk to use it.', '2017-02-28', 'JACKSON.LI', 'a:19:{s:8:"prNumber";s:6:"100003";s:4:"row1";a:6:{i:0;s:74:"NetApp FAS8020(4x400GB SSD, 20*900GB SAS 3 years warrantee/onsite service)";i:1;s:3:"Set";i:2;s:3:"N/A";i:3;s:6:"305500";i:4;s:1:"1";i:5;s:10:"305,500.00";}s:4:"row2";a:6:{i:0;s:62:"HP DL388 Gen9(2*E5-2630v4/8*16GB/2*SAS 300G 3 years warrantee)";i:1;s:3:"Set";i:2;s:3:"N/A";i:3;s:5:"51850";i:4;s:1:"3";i:5;s:10:"155,550.00";}s:4:"row3";a:6:{i:0;s:45:"Huawei S5700-28C-EI 24ports L3 Network Switch";i:1;s:3:"Set";i:2;s:3:"N/A";i:3;s:5:"10350";i:4;s:1:"2";i:5;s:9:"20,700.00";}s:4:"row4";a:6:{i:0;s:83:"VMWare vSphere 6 Essentials Plus Kit for 3 hosts(1 year subscription/basic support)";i:1;s:3:"Set";i:2;s:3:"N/A";i:3;s:5:"40000";i:4;s:1:"1";i:5;s:9:"40,000.00";}s:4:"row5";a:6:{i:0;s:12:"Installation";i:1;s:3:"Set";i:2;s:3:"N/A";i:3;s:4:"5000";i:4;s:1:"1";i:5;s:8:"5,000.00";}s:4:"row6";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row7";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row8";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row9";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row10";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row11";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row12";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row13";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row14";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"totalWithoutTax";s:10:"526,750.00";s:7:"taxRate";s:4:"0.17";s:3:"tax";s:9:"89,547.50";s:5:"total";s:10:"616,297.50";}', '0.17', '89,547.50', '526,750.00', '616,297.50', '3'),
(4, 100004, '', '', '', NULL, 'APAC', NULL, '2017-02-20', NULL, NULL, NULL, 'N/A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JACKSON.LI', 'a:19:{s:8:"prNumber";s:6:"100004";s:4:"row1";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row2";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row3";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row4";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row5";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row6";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row7";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row8";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row9";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row10";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row11";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row12";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row13";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row14";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"totalWithoutTax";s:0:"";s:7:"taxRate";s:1:"0";s:3:"tax";s:0:"";s:5:"total";s:0:"";}', '0', '', '', '', '3'),
(5, 100005, '', '', '', NULL, 'APAC', NULL, '2017-02-20', NULL, NULL, NULL, 'N/A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JACKSON.LI', 'a:19:{s:8:"prNumber";s:6:"100005";s:4:"row1";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row2";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row3";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row4";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row5";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row6";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row7";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row8";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row9";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row10";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row11";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row12";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row13";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row14";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"totalWithoutTax";s:0:"";s:7:"taxRate";s:1:"0";s:3:"tax";s:0:"";s:5:"total";s:0:"";}', '0', '', '', '', '3'),
(6, 100006, '', '', '', 1, 'APAC', '10&11/F,  Tagen Business Building, No. 7019, West HongLi Road, Futian district, Shenzhen', '2017-02-20', 8, 10, 7, 'N/A', 1, 0, '', '', '', '', '', '', '', '', '', '', 'JACKSON.LI', 'a:19:{s:8:"prNumber";s:6:"100006";s:4:"row1";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row2";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row3";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row4";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row5";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row6";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row7";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row8";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row9";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row10";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row11";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row12";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row13";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row14";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"totalWithoutTax";s:0:"";s:7:"taxRate";s:1:"0";s:3:"tax";s:0:"";s:5:"total";s:0:"";}', '0', '', '', '', '3'),
(7, 100007, '', '', '', NULL, 'APAC', NULL, '2017-02-20', NULL, NULL, NULL, 'N/A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JACKSON.LI', 'a:19:{s:8:"prNumber";s:6:"100007";s:4:"row1";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row2";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row3";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row4";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row5";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row6";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row7";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row8";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row9";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row10";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row11";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row12";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row13";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row14";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"totalWithoutTax";s:0:"";s:7:"taxRate";s:1:"0";s:3:"tax";s:0:"";s:5:"total";s:0:"";}', '0', '', '', '', '3'),
(8, 100008, 'HP', 'Ben', '02188645287', 1, 'APAC', '10&11/F,  Tagen Business Building, No. 7019, West HongLi Road, Futian district, Shenzhen', '2017-02-20', 8, 10, 6, 'N/A', 1, 0, 'N/A', 'N/A', 'N/A', 'N/A', 'RMB', 'RMB', 'N/A', 'N/A', 'Test the PR form, it''s my test PR', '2017-02-28', 'JACKSON.LI', 'a:19:{s:8:"prNumber";s:6:"100008";s:4:"row1";a:6:{i:0;s:20:"Computer''s keyboards";i:1;s:3:"Set";i:2;s:6:"100060";i:3;s:4:"5000";i:4;s:1:"3";i:5;s:9:"15,000.00";}s:4:"row2";a:6:{i:0;s:17:"Computer''s mouses";i:1;s:3:"Set";i:2;s:6:"100060";i:3;s:3:"300";i:4;s:1:"3";i:5;s:6:"900.00";}s:4:"row3";a:6:{i:0;s:19:"Computer''s batterys";i:1;s:3:"Set";i:2;s:6:"100060";i:3;s:3:"600";i:4;s:1:"3";i:5;s:8:"1,800.00";}s:4:"row4";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row5";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row6";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row7";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row8";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row9";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row10";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row11";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row12";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row13";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row14";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"totalWithoutTax";s:9:"17,700.00";s:7:"taxRate";s:4:"0.17";s:3:"tax";s:8:"3,009.00";s:5:"total";s:9:"20,709.00";}', '0.17', '3,009.00', '17,700.00', '20,709.00', '3'),
(9, 100009, NULL, NULL, NULL, NULL, 'APAC', NULL, '2017-02-22', NULL, NULL, NULL, 'N/A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JACKSON.LI', NULL, NULL, NULL, NULL, NULL, '3'),
(10, 100010, 'N/A', 'N/A', 'N/A', NULL, 'APAC', NULL, '2017-02-22', NULL, NULL, NULL, 'N/A', NULL, NULL, 'N/A', 'N/A', 'N/A', 'N/A', NULL, NULL, 'N/A', 'N/A', NULL, NULL, 'JACKSON.LI', NULL, NULL, NULL, NULL, NULL, 'New'),
(11, 100011, 'HP', 'Ben', '021-86282563', 1, 'APAC', '10&11/F,  Tagen Business Building, No. 7019, West HongLi Road, Futian district, Shenzhen', '2017-02-22', 8, 10, 11, '160030', 1, 0, 'N/A', 'N/A', 'N/A', 'N/A', 'RMB', 'RMB', 'N/A', 'N/A', 'It''s for testing purpose only. (trial run)', '2017-02-28', 'JACKSON.LI', 'a:19:{s:8:"prNumber";s:6:"100011";s:4:"row1";a:6:{i:0;s:8:"Computer";i:1;s:3:"Set";i:2;s:6:"160030";i:3;s:4:"6800";i:4;s:1:"2";i:5;s:9:"13,600.00";}s:4:"row2";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row3";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row4";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row5";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row6";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row7";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row8";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:4:"row9";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row10";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row11";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row12";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row13";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:5:"row14";a:6:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"totalWithoutTax";s:9:"13,600.00";s:7:"taxRate";s:4:"0.17";s:3:"tax";s:8:"2,312.00";s:5:"total";s:9:"15,912.00";}', '0.17', '2,312.00', '13,600.00', '15,912.00', 'New');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`invoiceTo`) REFERENCES `invoice` (`id`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`categoryName`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `request_ibfk_3` FOREIGN KEY (`costCode`) REFERENCES `costcode` (`id`),
  ADD CONSTRAINT `request_ibfk_4` FOREIGN KEY (`accountNumber`) REFERENCES `account` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
