-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2020 at 08:28 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teims`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `stk_id` int(15) NOT NULL,
  `stk_name` varchar(20) NOT NULL,
  `stk_gender` varchar(6) NOT NULL,
  `stk_email` varchar(30) NOT NULL,
  `stk_phone` int(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` int(6) NOT NULL,
  `stk_creation` date NOT NULL,
  `stk_updation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`stk_id`, `stk_name`, `stk_gender`, `stk_email`, `stk_phone`, `username`, `password`, `stk_creation`, `stk_updation`) VALUES
(1, 'JORDAN', 'Male', 'stkadmin@gmail.com', 88756622, 'STK001', 202001, '2020-04-24', '2020-09-16 08:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `client_fname` varchar(20) NOT NULL,
  `client_lname` varchar(20) NOT NULL,
  `client_contact` int(14) NOT NULL,
  `client_email` varchar(20) NOT NULL,
  `client_department` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_fname`, `client_lname`, `client_contact`, `client_email`, `client_department`, `username`, `password`) VALUES
(1, 'Celyn', 'Desyre', 167566123, 'celyn@gmail.com', 'Mechanical Department', 'M001', '1234'),
(2, 'Rowan', 'Wynter', 198136754, 'rowanyter@gmail.com', 'Electrical Department', 'E001', '1234'),
(3, 'Tyler', 'Isaac', 168837566, 'isaac@gmail.com', 'Control and Instrumental Department', 'CI001', '1234'),
(7, 'Christopher', 'Liam', 138816754, 'liam11@yahoo.com', 'Male', 'liam', '123456'),
(8, 'Isabelle', 'Glenn', 2147483647, 'isabelle@gmail.com', 'Male', 'E002', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `particulars`
--

CREATE TABLE `particulars` (
  `part_id` int(15) NOT NULL,
  `stk_id` int(11) NOT NULL,
  `rack_id` int(11) NOT NULL,
  `part_code` varchar(20) NOT NULL,
  `part_name` varchar(40) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `date_in` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `particulars`
--

INSERT INTO `particulars` (`part_id`, `stk_id`, `rack_id`, `part_code`, `part_name`, `price`, `quantity`, `status`, `date_in`) VALUES
(1, 0, 1, '17947', 'Fusible 14x51, 40A,AM', 14.66, 9, 'Lowstock', '0000-00-00 00:00:00'),
(2, 0, 10, '905248040', 'CASING WEAR RING', 1220.53, 2, 'Available', '0000-00-00 00:00:00'),
(3, 0, 8, '78009213733', 'Bop-Overload Relay', 635.47, 3, 'Available', '0000-00-00 00:00:00'),
(4, 0, 9, '109E3763P300', 'Probe,Vib Det', 879.69, 3, 'Available', '0000-00-00 00:00:00'),
(5, 0, 8, '109E3763P500', 'Cable,Ext-Probe', 684.33, 3, 'Available', '0000-00-00 00:00:00'),
(6, 0, 10, '109E3763P702', 'Proximitor', 1449.684, 2, 'Available', '0000-00-00 00:00:00'),
(7, 0, 10, '114A5224P001', 'Compressor Bleed Valve', 37200, 3, 'Available', '0000-00-00 00:00:00'),
(8, 0, 9, '114A5224P011', 'Water Injection Pump', 845.9, 3, 'Available', '0000-00-00 00:00:00'),
(9, 0, 9, '114E1707P009', 'Water Injection Motor', 845.9, 1, 'Unavailable', '0000-00-00 00:00:00'),
(10, 0, 3, '119E2448G003', 'Nozzle arrangement, Stage 3 Turbine', 50, 4, 'Available', '0000-00-00 00:00:00'),
(11, 0, 4, '141C5251P002', 'LOCK STOP IGV CONT RING  ', 33, 2, 'Lowstock', '0000-00-00 00:00:00'),
(12, 0, 5, '156A1075P031', 'Connector,Tube-Male', 32.3, 1, 'Unavailable', '0000-00-00 00:00:00'),
(13, 0, 5, '199d3157p097', 'Seal,Horz joint', 83.1, 0, 'Unavailable', '0000-00-00 00:00:00'),
(14, 0, 2, '199d3157p098', 'Seal,Horz joint', 18.3, 19, 'Available', '0000-00-00 00:00:00'),
(15, 0, 10, '146E8048P001', 'IGV Blade,6FA', 5282.9, 0, 'Unavailable', '0000-00-00 00:00:00'),
(16, 0, 3, '156A1075P032', 'Connector,Tube-Male', 32.3, 4, '', '0000-00-00 00:00:00'),
(17, 0, 3, '156A1084P022', 'TUBE TEE', 284.46, 3, 'Available', '0000-00-00 00:00:00'),
(18, 0, 1, '158A5457P020', 'Inlet Bleed Valve', 12, 3, '', '0000-00-00 00:00:00'),
(19, 0, 2, '184a8731p001', 'Gasket', 20, 10, '', '0000-00-00 00:00:00'),
(20, 0, 2, '158A7888P002', 'BUSHING', 24, 6, '', '0000-00-00 00:00:00'),
(21, 1, 1, '158A7888P012', 'Gasket', 2, 10, 'Available', '0000-00-00 00:00:00'),
(22, 1, 12, '184a8731p011', 'Trial', 45, 2, 'Available', '0000-00-00 00:00:00'),
(23, 1, 5, 'WE', 'TEST', 23, 0, 'Available', '0000-00-00 00:00:00'),
(24, 1, 1, 'ATEST', 'TEST1', 11, 0, 'Available', '2020-09-10 22:08:39'),
(25, 1, 9, 'WE1', 'TEST', 23, 4, 'Available', '2020-09-10 22:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(15) NOT NULL,
  `stk_id` int(15) NOT NULL,
  `part_code` varchar(20) NOT NULL,
  `purchase_code` int(15) NOT NULL,
  `date` date NOT NULL,
  `quantity` int(15) NOT NULL,
  `price` int(15) NOT NULL,
  `total` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `stk_id`, `part_code`, `purchase_code`, `date`, `quantity`, `price`, `total`) VALUES
(1, 0, '', 0, '0000-00-00', 0, 0, 0),
(2, 0, '119E2448G003', 1593055661, '2020-06-25', 3, 50, 150),
(3, 0, '109E3763P702', 1593055661, '2020-06-25', 1, 1450, 1450),
(4, 0, '119E2448G003', 1593055777, '2020-06-25', 1, 50, 50),
(5, 0, '184a8731p001', 1593055777, '2020-06-25', 1, 20, 20),
(6, 0, '905248040', 1593055777, '2020-06-01', 1, 1221, 1221),
(7, 0, '158A7888P002', 1593055954, '2020-06-01', 1, 24, 24),
(8, 0, '156A1084P022', 1593056300, '2020-06-01', 1, 284, 284),
(9, 0, '158A5457P020', 1593056858, '2020-06-01', 2, 12, 24),
(10, 0, '199d3157p098', 1593056858, '2020-06-01', 3, 18, 55),
(11, 0, '158A5457P020', 1593057348, '2020-06-01', 2, 12, 24),
(12, 0, '905248040', 1593057348, '2020-06-01', 3, 1221, 3662),
(13, 1, '114A5224P001', 1593062595, '2020-06-01', 1, 37200, 37200),
(14, 1, '184a8731p001', 1593062595, '2020-06-01', 3, 20, 60),
(15, 1, '114A5224P001', 1593065625, '2020-06-01', 1, 37200, 37200),
(16, 1, '109E3763P702', 1593221663, '2020-06-27', 1, 1450, 1450),
(17, 1, '158A7888P002', 1593221841, '2020-06-27', 5, 24, 120),
(18, 1, '158A5457P020', 1593237735, '2020-06-27', 3, 12, 36),
(19, 1, '141C5251P002', 1593401313, '2020-06-29', 2, 33, 66),
(20, 1, '109E3763P500', 1593401848, '2020-06-29', 1, 684, 684),
(21, 1, '109E3763P300', 1593401848, '2020-06-29', 1, 880, 880),
(22, 1, '119E2448G003', 1599753348, '2020-09-10', 1, 50, 50);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseline`
--

CREATE TABLE `purchaseline` (
  `purchaseline_id` int(15) NOT NULL,
  `stk_id` int(10) NOT NULL,
  `purchase_code` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `deliveryfee` int(11) NOT NULL,
  `total_price` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `delivery_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseline`
--

INSERT INTO `purchaseline` (`purchaseline_id`, `stk_id`, `purchase_code`, `date`, `deliveryfee`, `total_price`, `status`, `remarks`, `delivery_date`) VALUES
(1, 0, '1593055661', '2020-06-01', 150, 1700, 'Pending', '', '0000-00-00'),
(2, 0, '1593055777', '2020-06-01', 150, 1391, 'Pending', '', '0000-00-00'),
(3, 0, '1593055954', '2020-06-01', 150, 124, 'Pending', '', '0000-00-00'),
(4, 0, '1593056300', '2020-06-01', 150, 384, 'Pending', '', '2020-06-25'),
(5, 1, '1593056858', '2020-05-29', 100, 179, 'Confirmed', 'Your order has been confirmed!', '2020-06-03'),
(6, 1, '1593057348', '2020-05-29', 100, 3786, 'Confirmed', 'Your order has been confirmed!', '2020-06-03'),
(7, 1, '1593062595', '2020-06-01', 100, 37360, 'Cancelled', 'Your order has been cancelled <br>\r\n	 due to lack of communication <br> and incomplete information!', '2020-07-06'),
(8, 1, '1593065625', '2020-06-01', 100, 37300, 'Cancelled', 'Your order has been cancelled <br>\r\n	 due to lack of communication <br> and incomplete information!', '2020-07-06'),
(9, 1, '1593221663', '2020-06-03', 100, 1550, 'Pending', '', '2020-05-25'),
(10, 1, '1593221841', '2020-06-05', 100, 220, 'Pending', '', '2020-06-04'),
(11, 1, '1593237735', '2020-06-27', 100, 136, 'Cancelled', 'Your order has been cancelled <br>\r\n	 due to lack of communication <br> and incomplete information!', '2020-06-30'),
(12, 1, '1593401313', '2020-06-29', 100, 166, 'Pending', '', '2020-06-23'),
(13, 1, '1593401848', '2020-06-29', 100, 1664, 'Pending', '', '2020-06-17'),
(14, 1, '1599753348', '2020-09-10', 100, 150, 'Pending', '', '2020-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `rack`
--

CREATE TABLE `rack` (
  `rack_id` int(11) NOT NULL,
  `rack_name` varchar(10) NOT NULL,
  `rack_details` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rack`
--

INSERT INTO `rack` (`rack_id`, `rack_name`, `rack_details`) VALUES
(1, '02-AA-01', 'Aisle 02, Unit AA, Shelf 01'),
(2, '02-AA-02', 'Aisle 02, Unit AA, Shelf 02'),
(3, '02-AA-03', 'Aisle 02, Unit AA, Shelf 03'),
(4, '02-AA-04', 'Aisle 02, Unit AA, Shelf 04'),
(5, '02-AB-01', 'Aisle 02, Unit AB, Shelf 01'),
(6, '02-AB-02', 'Aisle 02, Unit AB, Shelf 02'),
(7, '02-AB-03', 'Aisle 02, Unit AB, Shelf 03'),
(8, '02-AB-04', 'Aisle 02, Unit AB, Shelf 04'),
(9, '03-BA-01', 'Aisle 03, Unit BA, Shelf 01'),
(10, '03-BA-02', 'Aisle 03, Unit BA, Shelf 02'),
(11, '03-BB-01', 'Aisle 03, Unit BB, Shelf 01'),
(12, '03-BB-02', 'Aisle 03,  Unit BB, Shelf 02');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(15) NOT NULL,
  `request_code` int(100) NOT NULL,
  `date` date NOT NULL,
  `client_id` int(15) NOT NULL,
  `part_code` varchar(100) NOT NULL,
  `quantity` int(20) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `request_code`, `date`, `client_id`, `part_code`, `quantity`, `price`, `total`) VALUES
(1, 0, '2020-04-29', 0, '0.000', 0, 0, 0),
(2, 0, '2020-04-29', 0, '0.000', 0, 0, 0),
(3, 0, '2020-05-01', 0, '1368.660', 0, 0, 0),
(4, 0, '2020-05-01', 2, '29.320', 0, 0, 0),
(5, 0, '2020-05-01', 2, '36.600', 0, 0, 0),
(6, 0, '2020-05-01', 1, '1270.940', 0, 0, 0),
(7, 0, '2020-06-15', 1, '5264.930', 0, 0, 0),
(8, 0, '2020-06-15', 1, '166.000', 0, 0, 0),
(9, 1592353644, '2020-05-04', 4, '17947', 1, 15, 15),
(10, 1592356263, '2020-05-04', 4, '114E1707P009', 2, 846, 1692),
(11, 1592356289, '2020-05-04', 4, '114E1707P009', 2, 846, 1692),
(12, 1592356336, '2020-05-04', 4, '114E1707P009', 2, 846, 1692),
(13, 1592356649, '2020-05-04', 4, '78009213733', 1, 635, 635),
(14, 1592358423, '2020-05-04', 4, '78009213733', 1, 635, 635),
(15, 1592358423, '2020-05-04', 4, '905248040', 1, 1221, 1221),
(16, 1592373912, '2020-05-04', 4, '158A5457P020', 1, 12, 12),
(17, 1592373912, '2020-05-04', 4, '114E1707P009', 1, 846, 846),
(18, 1592524639, '2020-05-05', 0, '', 0, 5, 0),
(19, 1592538430, '2020-05-05', 0, '109E3763P702', 1, 1450, 1450),
(20, 1592538430, '2020-05-05', 0, '156A1075P031', 1, 32, 32),
(21, 1592538521, '2020-05-05', 0, '184a8731p001', 1, 20, 20),
(22, 1592538521, '2020-05-05', 1, '158A5457P020', 1, 12, 12),
(23, 1592538943, '2020-05-05', 1, '114E1707P009', 3, 846, 2538),
(24, 1592538943, '2020-05-05', 1, '905248040', 1, 1221, 1221),
(25, 1592555321, '2020-05-05', 1, '114E1707P009', 1, 846, 846),
(26, 1592555321, '2020-05-05', 1, '158A5457P020', 1, 12, 12),
(27, 1593016784, '2020-05-05', 2, '114E1707P009', 1, 846, 846),
(28, 1593016784, '2020-05-05', 2, '156A1084P022', 1, 284, 284),
(29, 1593017406, '2020-05-05', 1, '114A5224P001', 2, 37200, 74400),
(30, 1593017406, '2020-05-05', 1, '119E2448G003', 2, 50, 100),
(31, 1593057687, '2020-05-05', 1, '109E3763P500', 3, 684, 2053),
(32, 1593057687, '2020-05-05', 1, '114A5224P001', 2, 37200, 74400),
(33, 1593218926, '2020-05-05', 2, '119E2448G003', 2, 50, 100),
(34, 1593218926, '2020-05-05', 2, '158A5457P020', 2, 12, 24),
(35, 1593218926, '2020-05-05', 2, '199d3157p098', 2, 18, 37),
(36, 1593218959, '2020-05-05', 2, '156A1084P022', 1, 284, 284),
(37, 1593218959, '2020-05-05', 2, '109E3763P500', 1, 684, 684),
(38, 1593219234, '2020-05-06', 2, '109E3763P702', 1, 1450, 1450),
(39, 1593219262, '2020-05-06', 2, '158A7888P002', 2, 24, 48),
(40, 1593219262, '2020-05-06', 2, '199d3157p098', 1, 18, 18),
(41, 1593219581, '2020-05-07', 3, '114A5224P001', 1, 37200, 37200),
(42, 1593235399, '2020-06-27', 1, '141C5251P002', 2, 33, 66),
(43, 1593235399, '2020-06-27', 1, '158A5457P020', 3, 12, 36),
(44, 1593235629, '2020-06-27', 1, '109E3763P300', 1, 880, 880),
(45, 1593236862, '2020-06-27', 1, '141C5251P002', 2, 33, 66),
(46, 1593401097, '2020-06-29', 1, '119E2448G003', 2, 50, 100),
(47, 1593401097, '2020-06-29', 1, '199d3157p097', 1, 83, 83),
(48, 1595998876, '2020-07-29', 1, '109E3763P702', 1, 1450, 1450),
(49, 1598408832, '2020-08-26', 1, '156A1075P031', 3, 32, 97),
(50, 1598511791, '2020-08-27', 1, '199d3157p097', 1, 83, 83),
(51, 1598512146, '2020-08-27', 2, '119E2448G003', 1, 50, 50),
(52, 1598626495, '2020-08-28', 2, '1010', 1, 1500, 1500),
(53, 1599711392, '2020-09-10', 2, '119E2448G003', 1, 50, 50),
(54, 1599711502, '2020-09-10', 2, '119E2448G003', 1, 50, 50),
(55, 1599711505, '2020-09-10', 2, '119E2448G003', 1, 50, 50),
(56, 1599711526, '2020-09-10', 2, '119E2448G003', 1, 50, 50),
(57, 1599711589, '2020-09-10', 1, '156A1075P031', 1, 32, 32),
(58, 1599737262, '2020-09-10', 1, '156A1075P032', 1, 32, 32);

-- --------------------------------------------------------

--
-- Table structure for table `requestline`
--

CREATE TABLE `requestline` (
  `requestline_id` int(10) NOT NULL,
  `request_code` int(10) NOT NULL,
  `date` date NOT NULL,
  `client_id` int(10) NOT NULL,
  `totalprice` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `required_date` date NOT NULL,
  `delivery_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestline`
--

INSERT INTO `requestline` (`requestline_id`, `request_code`, `date`, `client_id`, `totalprice`, `status`, `remarks`, `required_date`, `delivery_date`) VALUES
(1, 1592353644, '2020-05-04', 4, 15, '0000-00-00 00:00:00', '', '2020-06-17', '0000-00-00'),
(2, 1592356336, '2020-05-04', 4, 1692, '0000-00-00 00:00:00', '', '2020-06-18', '0000-00-00'),
(3, 1592356649, '2020-05-04', 4, 635, '0000-00-00 00:00:00', '', '2020-06-22', '0000-00-00'),
(4, 1592358423, '2020-05-04', 4, 1856, 'Pending', '', '2020-06-21', '0000-00-00'),
(5, 1592373912, '2020-05-04', 4, 858, 'Pending', '', '2020-06-20', '0000-00-00'),
(6, 1592524639, '2020-05-05', 0, 0, 'Pending', '', '2020-05-22', '0000-00-00'),
(7, 1592538430, '2020-05-05', 0, 1482, 'Pending', '', '2020-06-21', '0000-00-00'),
(8, 1592538521, '2020-05-05', 0, 32, 'Pending', '', '2020-06-26', '0000-00-00'),
(9, 1592538943, '2020-05-05', 1, 3758, 'Confirmed', 'Your order has been confirmed!', '2020-06-01', '0000-00-00'),
(10, 1592555321, '2020-05-05', 1, 858, 'Confirmed', 'Your order has been confirmed!', '2020-07-10', '0000-00-00'),
(11, 1593016784, '2020-05-05', 2, 1130, 'Cancelled', 'Your order has been cancelled <br>\r\n	 due to lack of communication <br> and incomplete information!', '2020-06-29', '0000-00-00'),
(12, 1593017406, '2020-05-05', 1, 74500, 'Cancelled', 'Your order has been cancelled <br>\r\n	 due to lack of communication <br> and incomplete information!', '2020-07-02', '0000-00-00'),
(13, 1593057687, '2020-05-05', 1, 76453, 'Cancelled', 'Your order has been cancelled <br>\r\n	 due to lack of communication <br> and incomplete information!', '2020-07-06', '0000-00-00'),
(14, 1593218926, '2020-05-05', 2, 161, 'Confirmed', 'Your order has been confirmed!', '2020-05-23', '0000-00-00'),
(15, 1593218959, '2020-05-05', 2, 969, 'Confirmed', 'Your order has been confirmed!', '2020-05-29', '0000-00-00'),
(16, 1593219234, '2020-05-06', 2, 1450, 'Confirmed', 'Your order has been confirmed!', '2020-05-23', '0000-00-00'),
(17, 1593219262, '2020-05-06', 2, 66, 'Confirmed', 'Your order has been confirmed!', '2020-05-25', '0000-00-00'),
(18, 1593219581, '2020-05-07', 3, 37200, 'Confirmed', 'Your order has been confirmed!', '2020-05-25', '0000-00-00'),
(19, 1593235399, '2020-06-27', 1, 102, 'Confirmed', 'Your order has been confirmed!', '2020-06-23', '0000-00-00'),
(20, 1593235629, '2020-06-27', 1, 880, 'Confirmed', 'Your order has been confirmed!', '2020-06-28', '0000-00-00'),
(21, 1593236862, '2020-06-27', 1, 66, 'Confirmed', 'Your order has been confirmed!', '2020-07-03', '0000-00-00'),
(22, 1593401097, '2020-06-29', 1, 183, 'Confirmed', 'Your order has been confirmed!', '2020-07-02', '0000-00-00'),
(23, 1595998876, '2020-07-29', 1, 1450, 'Confirmed', 'Your order has been confirmed!', '0000-00-00', '0000-00-00'),
(24, 1598408832, '2020-08-26', 1, 97, 'Confirmed', 'Your order has been confirmed!', '2020-08-28', '0000-00-00'),
(25, 1598511791, '2020-08-27', 1, 83, 'Confirmed', 'Your order has been confirmed!', '0000-00-00', '0000-00-00'),
(26, 1598512146, '2020-08-27', 2, 50, 'Confirmed', 'Your order has been confirmed!', '2020-09-03', '0000-00-00'),
(27, 1598626495, '2020-08-28', 2, 1500, 'Cancelled', 'Your order has been cancelled <br>\r\n		due to lack of communication <br> and incomplete information!', '2020-09-10', '0000-00-00'),
(28, 1599711526, '2020-09-10', 2, 50, 'Pending', '', '0000-00-00', '0000-00-00'),
(29, 1599711589, '2020-09-10', 1, 32, 'Pending', '', '2020-09-17', '0000-00-00'),
(30, 1599737262, '2020-09-10', 1, 32, 'Cancelled', 'Your order has been cancelled <br>\r\n		due to lack of communication <br> and incomplete information!', '2020-09-24', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(15) NOT NULL,
  `supplier_name` varchar(20) NOT NULL,
  `supplier_email` varchar(30) NOT NULL,
  `supplier_contact` varchar(15) NOT NULL,
  `supplier_address` longtext NOT NULL,
  `supplier_code` varchar(10) NOT NULL,
  `supplier_pass` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_email`, `supplier_contact`, `supplier_address`, `supplier_code`, `supplier_pass`) VALUES
(1, 'GE ENERGY', 'geenergy@gmail.com', '088-236636', 'Salut Commercial Centre, Lot A7, Jalan Politeknik, Kota Kinabalu Industrial Park, 88460 Kota Kinabalu, Sabah', 'G001', 1234),
(2, 'Teknik Sdn Bhd', 'tekniksdnbhd@gmail.com', '088-214810', 'Lot 11B, Industrial Zone 1, No.9, Jalan 1A KKIP Selatan, Kota Kinabalu Industrial Park, 88460 Kota Kinabalu Sabah', 'T001', 1234),
(3, 'Megah Sdn Bhd', 'megasdnbhd@gmail.com', '088212345', 'Zon Komersial 1, KKIP Selatan, Jalan Norowot, Taman Perindustrian Kota Kinabalu', 'M001', 1234),
(4, 'test', 'test@yahoo.com', '088789789', 'Jalan 18A, Lot 1, Keningau ', 'test1234', 897),
(5, 'Persia', 'persia@gmail.com', '08875664', 'MELIAWA JALAN 12', 'P001', 123456);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`stk_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_detail_idx` (`client_lname`);

--
-- Indexes for table `particulars`
--
ALTER TABLE `particulars`
  ADD PRIMARY KEY (`part_id`),
  ADD UNIQUE KEY `part_code_idx` (`part_code`),
  ADD KEY `stk_id` (`stk_id`),
  ADD KEY `rack_id` (`rack_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `sp_name` (`stk_id`),
  ADD KEY `part_code` (`part_code`);

--
-- Indexes for table `purchaseline`
--
ALTER TABLE `purchaseline`
  ADD PRIMARY KEY (`purchaseline_id`),
  ADD KEY `partName` (`stk_id`),
  ADD KEY `purchase_code` (`purchase_code`);

--
-- Indexes for table `rack`
--
ALTER TABLE `rack`
  ADD PRIMARY KEY (`rack_id`),
  ADD UNIQUE KEY `rack_name` (`rack_name`) USING BTREE;

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `cID` (`client_id`),
  ADD KEY `cID_2` (`client_id`),
  ADD KEY `part_no` (`part_code`);

--
-- Indexes for table `requestline`
--
ALTER TABLE `requestline`
  ADD PRIMARY KEY (`requestline_id`),
  ADD KEY `prequest_id` (`client_id`),
  ADD KEY `transac_code` (`request_code`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `stk_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `particulars`
--
ALTER TABLE `particulars`
  MODIFY `part_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `purchaseline`
--
ALTER TABLE `purchaseline`
  MODIFY `purchaseline_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rack`
--
ALTER TABLE `rack`
  MODIFY `rack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `requestline`
--
ALTER TABLE `requestline`
  MODIFY `requestline_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
