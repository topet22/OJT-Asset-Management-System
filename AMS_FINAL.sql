-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 10:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ihoms_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_r3`
--

CREATE TABLE `audit_r3` (
  `audit_ID` int(11) NOT NULL,
  `audit_USER` varchar(255) NOT NULL,
  `audit_PROPNO` varchar(255) NOT NULL,
  `audit_ACTION` varchar(255) NOT NULL,
  `audit_DATE` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `computers`
--

CREATE TABLE `computers` (
  `comp_id` int(8) NOT NULL,
  `item_ID` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `property_NO` varchar(50) DEFAULT NULL,
  `serial_NO` varchar(50) DEFAULT NULL,
  `Model` varchar(255) NOT NULL,
  `Brand` varchar(255) NOT NULL,
  `date_acquired` date DEFAULT NULL,
  `STATS` varchar(255) NOT NULL,
  `JOReq` varchar(255) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `other_id` int(8) NOT NULL,
  `item_ID` varchar(255) NOT NULL,
  `property_NO` varchar(40) DEFAULT NULL,
  `serial_NO` varchar(40) DEFAULT NULL,
  `description` varchar(40) DEFAULT NULL,
  `department` varchar(40) DEFAULT NULL,
  `user` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Brand` varchar(255) NOT NULL,
  `date_acquired` date DEFAULT NULL,
  `STATS` varchar(255) NOT NULL,
  `JOReq` varchar(255) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `printer`
--

CREATE TABLE `printer` (
  `printer_id` int(8) NOT NULL,
  `item_ID` varchar(255) NOT NULL,
  `property_NO` varchar(40) DEFAULT NULL,
  `serial_NO` varchar(40) DEFAULT NULL,
  `department` varchar(255) NOT NULL,
  `user` varchar(40) DEFAULT NULL,
  `Model` varchar(255) NOT NULL,
  `Brand` varchar(255) NOT NULL,
  `date_acquired` date DEFAULT NULL,
  `STATS` varchar(255) NOT NULL,
  `JOReq` varchar(255) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_computerspecs`
--

CREATE TABLE `tbl_computerspecs` (
  `comspec_ID` int(11) NOT NULL,
  `serial_NO` varchar(255) NOT NULL,
  `CompType` varchar(255) NOT NULL,
  `CompOS` varchar(255) NOT NULL,
  `CompRAM` varchar(255) NOT NULL,
  `CompStorageType` varchar(255) NOT NULL,
  `SSDStorage` varchar(255) NOT NULL,
  `HDDStorage` varchar(255) NOT NULL,
  `CompProcessor` varchar(255) NOT NULL,
  `OSLicense` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `dept_ID` int(8) NOT NULL,
  `dept_Name` varchar(255) NOT NULL,
  `dept_LCL` varchar(255) NOT NULL,
  `PM_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`dept_ID`, `dept_Name`, `dept_LCL`, `PM_Date`) VALUES
(1, 'MCCO', '109', NULL),
(2, 'HFDU', '', NULL),
(3, 'Petro', '121', NULL),
(4, 'HRU', '', NULL),
(5, 'CPH & PHC', '', NULL),
(6, 'DRRM-H', '169/269', NULL),
(7, 'IPCU', '', NULL),
(8, 'Legal', '111', NULL),
(9, 'QSMO', '', NULL),
(10, 'REC', '193/222', NULL),
(11, 'Chief of Admin Office', '126', NULL),
(12, 'BIOMED', '168/215/333', NULL),
(13, 'Maintenance', '135', NULL),
(14, 'Electrical', '136', NULL),
(15, 'Planning and Design', '213', NULL),
(16, 'Motorpool', '138', NULL),
(17, 'Procurement', '133', NULL),
(18, 'BAC Sec', '223', NULL),
(19, 'Security', '', NULL),
(20, 'Supply', '139', NULL),
(21, 'Non- Medical Records', '224', NULL),
(22, 'Human Resource ', '127', NULL),
(23, 'Linen And Laundry', '132', NULL),
(24, 'Finance Mgmt Office', '', NULL),
(25, 'Accounting', '125', NULL),
(26, 'Billing ', '119', NULL),
(27, 'Budget', '122', NULL),
(28, 'Cashier', '116', NULL),
(29, 'OPD Cashier', '173/261', NULL),
(30, 'OPD PHIC Portal', '', NULL),
(31, 'Philhealth', '115', NULL),
(32, 'CMPS', '211/166', NULL),
(33, 'Dietary', '162', NULL),
(34, 'Kiosk', '269', NULL),
(35, 'Medical Records/HIMD', '', NULL),
(36, 'MSS', '', NULL),
(37, 'Pharmacy', '124', NULL),
(38, 'Satellite Pharmacy', '112', NULL),
(39, 'Radiology Office', '186', NULL),
(40, 'Radiology - Reception', '186', NULL),
(41, 'Radiology - CT Scan', '165', NULL),
(42, 'Radiology - MRI', '186', NULL),
(43, 'Radiology - XRAY', '186', NULL),
(44, 'Radiology - Reading Room', '185', NULL),
(45, 'ER Xray', '120', NULL),
(46, 'Laboratory', '158', NULL),
(47, 'OPD Laboratory', '', NULL),
(48, 'OPD Office', '', NULL),
(49, 'Digihealth Office', '254', NULL),
(50, 'Anesthesia Office', '143', NULL),
(51, 'ENT Conference Room', '210/142', NULL),
(52, 'Ortho Office', '176', NULL),
(53, 'Ophtha Office', '177', NULL),
(54, 'Pedia Conference Room', '164', NULL),
(55, 'Pulmonary Office', '172', NULL),
(56, 'ER Office', '228', NULL),
(57, 'OB Gyne Office', '140', NULL),
(58, 'Medicine Office', '205', NULL),
(59, 'Dental Office', '118', NULL),
(60, 'DCFM Office', '151', NULL),
(61, 'Surgery Office', '155', NULL),
(62, 'PT Rehab', '160', NULL),
(63, 'Chief Nurse Office', '178', NULL),
(64, 'Nursing Service Office', '117', NULL),
(65, 'CSR', '146', NULL),
(66, 'AMP', '', NULL),
(67, 'ABTC', '', NULL),
(68, '2D Echo', '', NULL),
(69, 'Covid Cutting', '303', NULL),
(70, 'ENT Nurse Station', '142/210', NULL),
(71, 'ER1', '104/105', NULL),
(72, 'ER2', '184', NULL),
(73, 'HDU', '', NULL),
(74, 'Medical Annex 1st Floor', '206', NULL),
(75, 'Medical Annex 2nd Floor Left', '217', NULL),
(76, 'Medical Annex 2nd Floor Right', '216', NULL),
(77, 'Medical Ward 1', '107', NULL),
(78, 'Medical Ward 2', '190', NULL),
(79, 'MICU/Stroke', '195', NULL),
(80, 'NICU', '147', NULL),
(81, 'OB 1st Floor', '140', NULL),
(82, 'OB 2nd Floor', '204', NULL),
(83, 'Frontliners Ward', '', NULL),
(84, 'OSH', '', NULL),
(85, 'Onco', '212', NULL),
(86, 'Operating Room', '144', NULL),
(87, 'Ortho Nurse Station', '208', NULL),
(88, 'Ophtha/Eye Center', '177', NULL),
(89, 'OPD Med II', '173', NULL),
(90, 'OPD HACT', '', NULL),
(91, 'Pedia Nurse Station', '149', NULL),
(92, 'Pedia Isol', '', NULL),
(93, 'PICU', '189', NULL),
(94, 'RICU', '199', NULL),
(95, 'SICU', '229', NULL),
(96, 'Surgery 1st Floor', '139', NULL),
(97, 'Subspecialty ', '', NULL),
(98, 'Pysch', '182', NULL),
(99, 'TB-DOTS', '245', '2023-05-05'),
(100, 'Trauma', '103', NULL),
(101, 'COA', '102', NULL),
(102, 'IHOMS', '167/235', NULL),
(103, 'DCI', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jostat`
--

CREATE TABLE `tbl_jostat` (
  `JO_ID` int(11) NOT NULL,
  `JO_Level` varchar(255) NOT NULL,
  `JO_Date` datetime NOT NULL DEFAULT current_timestamp(),
  `JO_DATE1` date NOT NULL DEFAULT current_timestamp(),
  `JO_DATEAccept` timestamp NOT NULL DEFAULT current_timestamp(),
  `JO_DATESRDone` datetime DEFAULT NULL,
  `JO_DATESRDone1` date DEFAULT NULL,
  `JO_TicketNum` varchar(255) NOT NULL,
  `JO_DesigUser` varchar(255) NOT NULL,
  `JO_Department` varchar(255) NOT NULL,
  `JO_DeptDesti` varchar(255) NOT NULL,
  `serial_NO` varchar(255) NOT NULL,
  `JO_DescOfWork` text NOT NULL,
  `JO_ActionTaken` text NOT NULL,
  `JO_Assessment` text NOT NULL,
  `JO_Recommendation` text NOT NULL,
  `JO_Filepath` longtext NOT NULL,
  `JO_Status` varchar(255) NOT NULL,
  `JO_WhatType` varchar(255) NOT NULL,
  `JO_PropertyNO` varchar(255) NOT NULL,
  `JO_ItemID` varchar(255) NOT NULL,
  `JO_Model` varchar(255) NOT NULL,
  `JO_PerfBy` varchar(255) NOT NULL,
  `JO_AcceptedBy` varchar(255) NOT NULL,
  `JO_CancelRes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pm`
--

CREATE TABLE `tbl_pm` (
  `PM_ID` int(11) NOT NULL,
  `PM_Date` date NOT NULL DEFAULT current_timestamp(),
  `PM_DoneBy` varchar(255) NOT NULL,
  `PM_STATUS` varchar(255) NOT NULL,
  `PM_Department` varchar(255) NOT NULL,
  `PM_SerialPC` varchar(255) NOT NULL,
  `PM_SerialMonitor1` varchar(255) NOT NULL,
  `PM_ModelMontor1` varchar(255) NOT NULL,
  `PM_SerialMonitor2` varchar(255) NOT NULL,
  `PM_ModelMontor2` varchar(255) NOT NULL,
  `PM_SerialKB` varchar(255) NOT NULL,
  `PM_SerialMouse` varchar(255) NOT NULL,
  `PM_SerialUPS` varchar(255) NOT NULL,
  `PM_ModelKB` varchar(255) NOT NULL,
  `PM_ModelMouse` varchar(255) NOT NULL,
  `PM_ModelUPS` varchar(255) NOT NULL,
  `PM_KBStat` varchar(255) NOT NULL,
  `PM_MouseStat` varchar(255) NOT NULL,
  `PM_UPSStat` varchar(255) NOT NULL,
  `PM_Q1` varchar(255) NOT NULL,
  `PM_Q2` varchar(255) NOT NULL,
  `PM_Q3` varchar(255) NOT NULL,
  `PM_Q4` varchar(255) NOT NULL,
  `PM_Q5` varchar(255) NOT NULL,
  `PM_Q6` varchar(255) NOT NULL,
  `PM_Q7` varchar(255) NOT NULL,
  `PM_Q8` varchar(255) NOT NULL,
  `PM_Q9` varchar(255) NOT NULL,
  `PM_Q10` varchar(255) NOT NULL,
  `PM_Q11` varchar(255) NOT NULL,
  `PM_Q12` varchar(255) NOT NULL,
  `PM_Q1Rems` varchar(255) NOT NULL,
  `PM_Q2Rems` varchar(255) NOT NULL,
  `PM_Q3Rems` varchar(255) NOT NULL,
  `PM_Q4Rems` varchar(255) NOT NULL,
  `PM_Q5Rems` varchar(255) NOT NULL,
  `PM_Q6Rems` varchar(255) NOT NULL,
  `PM_Q7Rems` varchar(255) NOT NULL,
  `PM_Q8Rems` varchar(255) NOT NULL,
  `PM_Q9Rems` varchar(255) NOT NULL,
  `PM_Q10Rems` varchar(255) NOT NULL,
  `PM_Q11Rems` varchar(255) NOT NULL,
  `PM_Q12Rems` varchar(255) NOT NULL,
  `PM_DesigUser` varchar(255) NOT NULL,
  `PM_Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stocks`
--

CREATE TABLE `tbl_stocks` (
  `stock_ID` int(11) NOT NULL,
  `WhatType` varchar(255) NOT NULL,
  `property_NO` varchar(255) NOT NULL,
  `serial_NO` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `Model` varchar(255) NOT NULL,
  `Brand` varchar(255) NOT NULL,
  `date_acquired` varchar(255) NOT NULL,
  `stock_STATUS` varchar(255) NOT NULL DEFAULT 'NEW'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_ID` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `userlevel` float NOT NULL,
  `PassReqs` varchar(255) NOT NULL,
  `user_signa` longtext NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_CP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_ID`, `department`, `username`, `pass`, `userlevel`, `PassReqs`, `user_signa`, `user_fullname`, `user_CP`) VALUES
(1, 'IHOMS', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '', 'data:image/png;base64,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', 'Monique Prepose', '639457009699'),
(5, 'IHOMS', 'ralph123', '202cb962ac59075b964b07152d234b70', 2, '', 'data:image/png;base64,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', 'Ralph Daniel Casilla', '639468354156'),
(6, 'IHOMS', 'jp123', '202cb962ac59075b964b07152d234b70', 2, '', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAZAAAACgCAYAAAAisjrVAAAAAXNSR0IArs4c6QAAFY9JREFUeF7tnTusL1UVhxdcXhchEhEKJJHEaDTY2omxsBRMSCzAVu3tLCwsLOysfbRiYYJRWgsjVtYSXzHBBC1ADAbkKj6z4L+4+86dmf2e2Y/vJAQOZ2bvtb619vxmP+cW4QcCEIAABCCQQOCWhHu4BQIQgAAEICAICEkAAQhAAAJJBBCQJGzcBAEIQAACCAg5AAEIQAACSQQQkCRs3AQBCEAAAggIOQABCEAAAkkEEJAkbNwEAQhAAAIICDkAAQhAAAJJBBCQJGzcBAEIQAACCAg5AIF8Av8VkVvzi6EECPRFAAHpK15Y2yaB/13Moj21GR+sqkSAhK8ElmKnIaC9D2tHtKdpwo6jSoCEJw8gkEfAeh+0pzyO3N0hAQSkw6BhcjME/rOY+6A9NRMaDDmCAAl/BGXqGJWA9j70H4awRo0wfu0SQEBIEAikEfi3iFwRkWsicvUiJKzESmPJXZ0SQEA6DRxmn07Anftg/uP0cGDAGQQQkDOoU2fvBN4Skdud4SvaUe8Rxf4kAiR+EjZumpyA2/vQZbw6lMUPBKYjgIBMF3IcziTwmoi891KGCgnzHplAub1fAghIv7HD8nMIsHHwHO7U2iABBKTBoGBS0wRs+Iqhq6bDhHFHEEBAjqBMHaMQsN4HQ1ejRBQ/sgggIFn4uHkyAhyaOFnAcXefAAJChkAgjID1PnQDoS7h5QcC0xNAQKZPAQAEErBjS1h1FQiMy8YngICMH2M8zCdgQ1fMfeSzpISBCCAgAwUTV6oQcJftsvKqCmIK7ZUAAtJr5LD7CALLI0v09zuPqJg6INADAQSkhyhh41kEbN7jnyJyFx9gOysM1NsqAQSk1chg19kE3CW79uEo2svZUaH+pgjQIJoKB8Y0QmC5ZNd+p700EiDMaIMADaKNOGBFOwT+JSK3LT4QhYC0Ex8saYgAAtJQMDClCQJru83ZA9JEaDCiNQIISGsRwZ4zCWz1NBCQM6NC3c0SQECaDQ2GHUxg76gSFRD2gBwcEKprnwAC0n6MsLA+gbV5D7dWFRDOwKofB2rojAAC0lnAMLcKgb1Tdu0LhLSVKugptGcCNIqeo4ftJQj4Vlhpz0O/eU5bKUGbMoYiQKMYKpw4E0kg5Ih2n8BEVsnlEBiHAAIyTizxJI6Ab97DSkNA4rhy9UQEEJCJgo2rNxAI/bogS3hJHAhsEEBASI0ZCcT0KhCQGTMEn4MIICBBmLhoIAIh8x6uuwjIQMHHlbIEEJCyPCmtbQImHjFfFtRr9TRePR+LHwhAwCGAgJAOsxAw8YjZUf59EXlaRJ4RkS/MAgo/IRBKAAEJJcV1PROwCfPYngR7QHqOOrZXJ4CAVEdMBScTMPGwrwrGmBMz2R5TLtdCYAgCCMgQYcSJDQKhS3W3ACIgpBYEdgggIKTHiAT+ISJ3XhzLyXEEZMTswKdiBHIaVzEjKAgCBQnYvIUWmZvfLOEtGBiKGo9AbgMbjwge9UDgTRG5q4BA7Pmq4nFW+3DrXg7D2d+2/r/6tGV7aFlH58DWUOPeEOSajy6bZexy41mS3V589nLO9e/Wo4O0Vt9ZDaQF37GhPwK6iiq04Ww9aPvzGot7JLDMP/Oh1DM3Zi9TNX6lnKlmIAVDYEHA3gTXwJRuVFre30TkPqIAgRMJrPW4Y/YzVTMdAamGloI7J2Cn9dJGOg9kZ+a/LiJ3O8Onbv7pC40uENG/N/FD42giDBjRIAEbLqONNBiczk16a/GRMt+8R1Oi4bKncXSeiZhfjQBLeKuhHb7gP4vIg858ne85a6v9NOdu74mOz7GefMFWCJQkgICUpDleWXqygR6wac9QXy9CCahQaO/j6ig4EJBRIokfpQmwB6Q00f7K0z1FturP96y0xR364jHNyc0+KP2FHIshUIYAAlKGY8ulXBOROxJ6ESosdtJBy/5Vtw0BqY6YCjoloAISs1RSl1o2szqmU+Y1zNbVdNqL0Ged73nn9iJeFpGHahg0Upk+oCP5ii8QiCFgSyZDx6tzD26MsY1rrxP4qYh8OnCoyWKk/9ZVdtr74CeDAAKSAY9bhyWgE6Tu0EaIowhICKX0a0LnI1yR0F7hvelVcqePAALiI8TfZySQsgeEOZP8TIkVCR1ifElEHsmvmhJSCCAgKdS4Z3QCsUt47frYLx6OznHNP52TuHL5Q+jS11cv+ypm5NW0zwhI0+HBuJMIxAqIDZtwbtY7AUsRiTdE5L0nxZtqEwkgIInguG1oAjHDUSY2CmSm9uQexxHak9AjOd4zdOZM5txMCT9ZaHE3g0CMgNi1IctEM0w65dYUkdAFCCxnPiVcx1eKgBzPnBrbJxAqINb7sG8/9Nie3CM5QnsSOkSlH/TiZ3ICPSb85CHD/QMIhG4iNKGx4auj29PWt1GW30XRoSM9pC/03Ca9n93WByRahSo01nZG11o+hn6QLci0oxM+yCgugsDJBPQBqm/ZexvNbKnvd0Tkyxd7z2hPex/Y2sJowsdmupMTbaN63b+igm876N3LcnMs5nQFL51cY7wVcAEEOiPwooh8MGBC3N04GDrklYvi74tvwfuGnNhxnUs8/X5dkadzQWuHMeY8d5cvDO7LwFdF5Fs7JtuQq+/lKNjrHEeCK+FCCHREIORLhDq5rG+I1hBLCog+eO6JGG5StNqTcL8jUdKejkJX3NRfi8iHds7SSn1+bomAPuD/ICIfK+7J9QJjl6jvmpIKoKJ/FA2BUwmE7EJfHlsSOmdijulBffdnisQeJLVHRY4TY0W+IiLfdL4AuHzm5TwDXSGw/9YHtA5BtbynpdixOznwTm3lVA6BSgR8b2jfvsx5uGPJaw9sHQp7OPKQvxLfknhMRH4uIp8SkecrMWqh2CdF5IeBp+z6xNb9u70MaO9y5OXIRUQEAWmhKWBDSwR8AuL+3ZbA6ji3LeXd8sV9Q635waGUgyBb4r9li/YMt/babA0J6UoylhuvE9Wd/7qpc7liLyoXEJAoXFw8AQFXINxvSajrvvbiisTPROQzJ/DyCeAJJkVXaYcqrvG2+R1O2o3GetMNylnPJUsWEV+DyDeREiDQJoGvi8jXFm+1vvZgvQx9SNu3rUPmTI4k0JuAKEf32+LL4ST9XYWc+Zw6WWT5krS819dg6phMqRCoT0Anqt8XOAdh1phA6L9fX5kIXVvd1NoDu+UVWPoJWROCrd7FckVZ/UyhBsth7ZG4q/m8ZBAQLyIuaJRAzJ4IdcEdJ9/7jsTWiqqtnkZLAtKSLb8RkQ975i1KLBpoND27M8ty5yci8rlQ6xGQUFJcdzSBmOM3XIEwAYh6k3Kcs813y4nurVUrRVazFIJ7Zu/DN8mtttl3QAq5SzGFCUTnMgJSOAIUF0zAPelVb/LloiW3PeBrfc9ay9eVTO7qHf2gkQ6HrXXxoxtdMKG4C4/sfYRMcv9eRD4a5wJXN0AgKp99jbYBfzChUwKpK5g0gc867VXnPdxd4IZ+7+Ec1eAqxnJr6C23Svs41NachZavgns1tyLub4LAj0XkidCVWQhIEzHrzojlJrnYHkSrHxayZY3LdrE3NNSCgJTqfagQ2NDflmAoo1q9v+4awqAG23E+3uW9CMigGZDplp7HpJuM1g6C2yra3QPx106/Yb02Ue57OJ8tIM+IyFMiErsMU3tbutN6b3Mek9yZDanj260t7IoIAtJxhDNM1+WU+hZp8fflgTv/oP/9DRHRfRSj/ayJhW9i+mwBCa0/ZN6CSe7RMjrPH2sPKiarpyf4Hhx51XP3GQSWk9Oxw0uaNKkrmM7wt2SdSwGxU3d1yG1rjD/0AV7STivrTyLykIis2ae9yHtXFieYIH5eRJ6tYRRlDkXA2oQum9f5wRt+EJA+Ym1fGXO/JhYTO7cHwZfmtmO+FAPf8JWWdKaALOteW0prgkHvoo+23qKVmzke8xBq0bGebdKzfGwYKXQoyfXXgmoPMX3Y/U5EHu0Zysm2L4erQlY2nSUgOgypS421/rVJ/7Wd9CfjpfqOCazmOQJSNqKvOctAXbahnJeioL/rqZn3lTWT0jYIuAIS0vvI6YGkCM/esBRHgJDWtQncNB8Y+mCrbVjL5b8gIh9Z+T5xDLvlJLSOrY/8rYGW47lnm9vj8E2eWzkpQhAjPFvDUpp/PxIR/S4GPxA4goDNCb67MivmIXiEgTXrcN/urQHn+O+Wp2+rfHugZvSOKVtjqg9s/dE5g5D8qCEg1vtxvdZ6bFgqVNyOoUYtMxG4YXlvSAMZBc5SQNb8Wg4hKSw2TY2SAX4/bMjQVpuEtI9cAXGXSNpGRnvBWduH0drx8X6qXDESgWkFZKQg4kt5ArrSTY8aV9GwnkjIlwNzBUQ90TqXvY4t8aL3UT72lBhG4CUR+YB7zEnIG1ZY0VwFgb4JuF9n29qdvddrjWlLNpasb3N7y2uXZYZO7PcdCaxvlcBNL0sxSd+qU9gFgRIErGtuw0funpu98vWhrj+h1+u1y97G2lLctaNJ6H2UiDRlpBBgGW8KNe6ZhoD7UI95sUoZwlqbJDfQW8dG0PuYJhWbc9Ry75XlGXcxDaU5rzAIAgUJWCN5d4liYNkxArInHFrdbze+oaFfiXs89IjtQLu5DAIhBCxnVw/rREBCEHLNDARMCPQo65iVdzEC4g5fmVC5K//2Js71XtrrDJnYjo/eE3lJyHaChSXnEogVArM2ZQ5kuWHRylprjwxdnZsXs9b+sog84Ov1IiCzpgd+LwmkTlCnCI/e4342V39f+1zuX0Tkfl8jJpQQqEAgKK8RkArkKbI7ArvjvB5vghqaU4a738QHKrZsX3n8HQIhBILzDgEJwck1oxOwBrPWC/D5HtzYLgWF7iRn6MpHnr/XIGB5p9+aedhXAQLiI8TfRydg339WP/8oIo9EOhwrICHCYBsNYz9TG2k6l0PgBgLRPXEEhAyanUDIKqg9RjUEJHU+ZvZY4n86gadE5JnY+TYEJB04d45BwFZE6U7ylPYQKyA+cQjpoYxBHi9aIhCbx2/bntJgWnIaWyCQQ8DdPBhz/pVbZ+wy3j0BsfmR2L0oOQy4FwKWd+7KwCAqCEgQJi4alIA9zO1lKqU9pAjI1tyGr3cyaBhw62QCyXmX0mBO9pXqIVCMgA1fWe8jpT3EDjkt94CYM0lDCMVIUNCsBGLz9wZOKQ1mVtD4PRYB7a7rkSX2/Q87WiTWy5gGuLUHxMp4VUTeH2sA10MgkYANXW0d4OktFgHxIuKCQQm4D/7kLrxzNHtIW9raA5JT/6Dhwa0DCGTnXUjSH+AHVUDgcALukFFOQ4rpgaxdy9DV4aGnwsgXn01gCAi5NCsBVzTOEhATlOdE5IlZA4HfhxOwr29mb1RFQA6PHRU2QkBFQ3d863fQcwQk9GgSdduth298NJIIE5qRk+834EJAJsweXJblQz+nQdnbXEhbWvZ6NBQh9xEyCJQiEDPk6q2T5PUi4oIBCSwbkS3nvZLgq52lFdKWSiwbTjCRWyDwNgFbBZg9dGU8Q5Ie9hAYjcCyx6G/py5lfFNErgb2JLQeFZzbY88cGi0A+HMKgeILNhCQU+JIpScTWPY49PeUo9zNDb3f15bs7Y+Xt5ODP2n11ut+WkR+UIqBL+lL1UM5EGiFgLuB0BWA6HOAHIdUQK6JyN07Ttq8i15Cu2slG+aw41ci8miNXi+JPEcC4eV1Alt7MV4RkQcTQYX0YKK/tZBoC7dBYEmg+NAV3WiSbFYCy8b0sog8kNkrCJlDqdaIZw0kfgcRsBeXF0Tk40F3RFxEDyQCFpcOQWA5gR7zjfItAL5VXO6x8frdEX4gcASBakNX9ECOCB91tEjA3UCo9sUsw90TEC13TRyY+2gxC+awqXqvlx7IHImEl+8QWNs1HrMRMEVArMeT+sEqYgeBFAJVh67ogaSEhHt6J7A2gR5zFEmsgNgboN5XbPNW70HA/uoEfikin6ix6mppOT2Q6rGkgoYIrHXpSxztsHYUSonP5TaEDlM6IlB96IoeSEfZgKnFCBwpIO7Q1db8SDHHKAgCFwKHDF0hIOTbjARqCcja2VrKVzcn6mm/OZsUZ4wTPqcROGzoCgFJCxB39U2gloAoleVBifqNj89e9pcwVNx33vRi/WFDVwhILymBnSUJ1BQQ64WYmOiS3rW5kZL+UBYEjMChQ1cICIk3I4GaAmJnbClX3Zx4x2VfCL2PGTPtWJ9tL9Phc20k97GBprZzCawJSMleglt+yXLPpUbtrRM4LdcQkNZTA/tKEqgtIO5kesj5WCV9o6w5CRw+7+FiRkDmTLpZvd4SkNSPSS05uhsH9W+0r1kz7Ri/7YUl51s2WZaS4Fn4uLkzAksBifmaoM/V74rIFy87znUCnZ3nPmL8PYfAafMe9EBywsa9PRNYCkiJY0yMR4kd7T2zxfZjCZw274GAHBtoamuHwFJASj70m2jQ7aDGkooETp33QEAqRpaimyawbHglG6JtJLzSNAGM652AvfToEJYuFT/1hzmQU/FT+cEE1gSkxNr5knMpByOhuo4INPdhMgSko+zB1GwCawJSYrK75FBYtpMUMCSB5sRDKSMgQ+YaTm0QWBOQayJydyYx5j8yAXL7LoEmxQMBIWtnI+D2FEp8idD4qYDo8SVXZwOKv9UJNCseCEj12FNBYwRsrkJ7HXcVOim35FLgxnBhzskEmhYPBOTk7KD6UwjYcJPlf+4wLvMfp4Rx+EqbFw8EZPgcxMEVAu6x6yXaAPMfpFlpAl2IR4nGUxoc5UGgNgEbxrJ6cnogdnzJ90TkS7UNp/wpCHQjHgjIFPmIkysE3EMPcwSE4SvSqyQBy8sSS8tL2rVZVk7jOcRAKoFABQKlJr4ZvqoQnEmLNPF4S0Tu7IUBAtJLpLCzRQIcX9JiVPqyyf2SZXfP4+4M7is3sHZgAhxfMnBwD3LNesLdTicgIAdlCtUMR4D5j+FCeqhDXU2Wb5FBQA7NGSobiADzHwMF80BX3GXkJQ7yPND0m6tCQE7FT+UdE9DGX+IcrY4RYHoggTcu563Z87Z74TC/EZDADOAyCDgESq3iAurYBOy8NfOym+W5oWFBQEJJcR0ErhOInf9Y7n7Xkty9KDYc9pKIPALo7gm4k+PqjP5+W/derTiAgIwYVXyqTSB0/uN5EflkIWPWBEdPAL6nUPkUk09gOb+hK/WGjg8Ckp80lDAXgdDjS9yHyS9E5LFATC+KyMMrJwWntNWl6KhNz4nIk4G2cNk+Ad30Zz2L4eY3QoKfkpQh5XINBEYl4Bu+OnqVzbMi8riI3Lr4QFxK26aXs561a0KxvHKYifGYhpuSZDHlcy0ERiOwNXx1tHDkcNVVQWvfQ0l5HozUywkVCmWvE+R35ARhhHv/D0IwFd11aK2sAAAAAElFTkSuQmCC', 'John Paul Almoite', '639260374672'),
(12, 'MCCO', 'MCCO', '5f4dcc3b5aa765d61d8327deb882cf99', 1.5, '', '', '', ''),
(13, 'HFDU', 'HFDU', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(14, 'Petro', 'Petro', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(15, 'HRU', 'HRU', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(16, 'CPH & PHC', 'CPHPHC', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(17, 'DRRM-H', 'DRRMH', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(18, 'IPCU', 'IPCU', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(19, 'Legal', 'Legal', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(20, 'QSMO', 'QSMO', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(21, 'REC', 'REC', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(22, 'Chief of Admin Office', 'AdminOffice', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(23, 'BIOMED', 'BIOMED', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(24, 'Maintenance', 'Maintenance', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(25, 'Electrical', 'Electrical', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(26, 'Planning and Design', 'Planning', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(27, 'Motorpool', 'Motorpool', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(28, 'Procurement', 'Procurement', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(29, 'BAC Sec', 'BAC', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(30, 'Security', 'Security', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(31, 'Supply', 'Supply', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(32, 'Non- Medical Records', 'NMR', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(33, 'Human Resource ', 'HR', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(34, 'Linen And Laundry', 'Linen', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(35, 'Finance Mgmt Office', 'Finance', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(36, 'Accounting', 'Accounting', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(37, 'Billing ', 'Billing ', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(38, 'Budget', 'Budget', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(39, 'Cashier', 'Cashier', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(40, 'OPD Cashier', 'OPDCashier', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(41, 'OPD PHIC Portal', 'OPDPhilhealth', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(42, 'Philhealth', 'Philhealth', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(43, 'CMPS', 'CMPS', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(44, 'Dietary', 'Dietary', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(45, 'Kiosk', 'Kiosk', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(46, 'Medical Records/HIMD', 'MedicalRecords', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(47, 'MSS', 'MSS', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(48, 'Pharmacy', 'Pharmacy', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(49, 'Satellite Pharmacy', 'SatellitePharmacy', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(50, 'Radiology Office', 'RadiologyOffice', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(51, 'Radiology - Reception', 'RadiologyReception', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(52, 'Radiology - CT Scan', 'RadCT', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(53, 'Radiology - MRI', 'RadMRI', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(54, 'Radiology - XRAY', 'RadXRAY', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(55, 'Radiology - Reading Room', 'RadReading', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(56, 'ER Xray', 'ERXray', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(57, 'Laboratory', 'Laboratory', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(58, 'OPD Laboratory', 'OPDLab', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(59, 'OPD Office', 'OPDOffice', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(60, 'Digihealth Office', 'Digihealth', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(61, 'Anesthesia Office', 'Anesthesia', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(62, 'ENT Conference Room', 'ENTConference', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(63, 'Ortho Office', 'Ortho', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(64, 'Ophtha Office', 'Ophtha', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(65, 'Pedia Conference Room', 'PediaConference', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(66, 'Pulmonary Office', 'PulmonaryOffice', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(67, 'ER Office', 'EROffice', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(68, 'OB Gyne Office', 'OBOffice', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(69, 'Medicine Office', 'Medicine', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(70, 'Dental Office', 'Dental', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(71, 'DCFM Office', 'DCFM', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(72, 'Surgery Office', 'SurgeryOffice', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(73, 'PT Rehab', 'PTRehab', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(74, 'Chief Nurse Office', 'ChiefNurseOffice', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(75, 'Nursing Service Office', 'Nursing Service Office', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(76, 'CSR', 'CSR', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(77, 'AMP', 'AMP', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(78, 'ABTC', 'ABTC', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(79, '2D Echo', '2DEcho', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(80, 'Covid Cutting', 'CovidCutting', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(81, 'ENT Nurse Station', 'ENTNurse', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(82, 'ER1', 'ER1', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(83, 'ER2', 'ER2', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(84, 'HDU', 'HDU', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(85, 'Medical Annex 1st Floor', 'MedAnnex1st', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(86, 'Medical Annex 2nd Floor Left', 'MedAnnexLeft', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(87, 'Medical Annex 2nd Floor Right', 'MedAnnexRight', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(88, 'Medical Ward 1', 'MedWard1', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(89, 'Medical Ward 2', 'MedWard2', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(90, 'MICU/Stroke', 'MICU', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(91, 'NICU', 'NICU', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(92, 'OB 1st Floor', 'OB1', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(93, 'OB 2nd Floor', 'OB2', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(94, 'Frontliners Ward', 'Frontliners', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(95, 'OSH', 'OSH', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(96, 'Onco', 'Onco', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(97, 'Operating Room', 'OR', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(98, 'Ortho Nurse Station', 'OrthoNurse', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(99, 'Ophtha/Eye Center', 'Ophtha', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(100, 'OPD Med II', 'OPDMedII', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(101, 'OPD HACT', 'OPDHACT', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(102, 'Pedia Nurse Station', 'PediaNurse', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(103, 'Pedia Isol', 'PediaIsol', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(104, 'PICU', 'PICU', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(105, 'RICU', 'RICU', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(106, 'SICU', 'SICU', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(107, 'Surgery 1st Floor', 'Surgery1st', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(108, 'Subspecialty ', 'Subspecialty ', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(109, 'Pysch', 'Pysch', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(110, 'TB-DOTS', 'TBDOTS', '202cb962ac59075b964b07152d234b70', 3, '', '', '', '639929199562'),
(111, 'Trauma', 'Trauma', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', '09262626262'),
(112, 'COA', 'COA', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '', '', '', ''),
(113, 'DCI', 'dci', '202cb962ac59075b964b07152d234b70', 2.5, '', 'data:image/png;base64,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', 'DCI', '639207988286');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_r3`
--
ALTER TABLE `audit_r3`
  ADD PRIMARY KEY (`audit_ID`);

--
-- Indexes for table `computers`
--
ALTER TABLE `computers`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`other_id`);

--
-- Indexes for table `printer`
--
ALTER TABLE `printer`
  ADD PRIMARY KEY (`printer_id`);

--
-- Indexes for table `tbl_computerspecs`
--
ALTER TABLE `tbl_computerspecs`
  ADD PRIMARY KEY (`comspec_ID`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`dept_ID`);

--
-- Indexes for table `tbl_jostat`
--
ALTER TABLE `tbl_jostat`
  ADD PRIMARY KEY (`JO_ID`);

--
-- Indexes for table `tbl_pm`
--
ALTER TABLE `tbl_pm`
  ADD PRIMARY KEY (`PM_ID`);

--
-- Indexes for table `tbl_stocks`
--
ALTER TABLE `tbl_stocks`
  ADD PRIMARY KEY (`stock_ID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_r3`
--
ALTER TABLE `audit_r3`
  MODIFY `audit_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `computers`
--
ALTER TABLE `computers`
  MODIFY `comp_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `other_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `printer`
--
ALTER TABLE `printer`
  MODIFY `printer_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_computerspecs`
--
ALTER TABLE `tbl_computerspecs`
  MODIFY `comspec_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `dept_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tbl_jostat`
--
ALTER TABLE `tbl_jostat`
  MODIFY `JO_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pm`
--
ALTER TABLE `tbl_pm`
  MODIFY `PM_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stocks`
--
ALTER TABLE `tbl_stocks`
  MODIFY `stock_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
