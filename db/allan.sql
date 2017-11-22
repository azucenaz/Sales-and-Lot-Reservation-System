-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2016 at 07:02 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `allan`
--

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `block_id` int(11) NOT NULL,
  `lot_no` varchar(30) NOT NULL,
  `block_no` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `client_id` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `downpayment` decimal(15,2) NOT NULL,
  `price` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`block_id`, `lot_no`, `block_no`, `status`, `client_id`, `description`, `downpayment`, `price`) VALUES
(1, 'LOT 1', '2', 'open', '1', '<h4><strong></strong><em></em><span style="background-color: #cc99ff;"></span></h4>', '1000.00', '100000.00'),
(2, 'LOT 1', '3', 'open', '1', '<p>awdawdawd</p>', '5000.00', '120000.00'),
(3, 'LOT 1', '123', 'open', '1', '<p>123123</p>', '2000.00', '123123.00');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `details` text NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `firstname`, `middlename`, `lastname`, `address`, `contact`, `details`, `user_id`) VALUES
(1, 'noneo', '', 'oiaopwido', 'doaiwdo', 'iaidwodiado123', '<p>adsaisdoasido</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `lot`
--

CREATE TABLE `lot` (
  `lot_id` int(11) NOT NULL,
  `lot_no` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lot`
--

INSERT INTO `lot` (`lot_id`, `lot_no`) VALUES
(1, 'LOT 1');

-- --------------------------------------------------------

--
-- Table structure for table `own_lot`
--

CREATE TABLE `own_lot` (
  `own_id` int(11) NOT NULL,
  `block_id` varchar(30) NOT NULL,
  `client_id` varchar(30) NOT NULL,
  `downpayment` decimal(15,2) NOT NULL,
  `terms` int(11) NOT NULL,
  `monthly` decimal(15,2) NOT NULL,
  `penalty` decimal(15,2) NOT NULL,
  `contract_price` decimal(15,2) NOT NULL,
  `datepayment` date NOT NULL,
  `months_paid` int(11) NOT NULL,
  `deposit` float(15,2) NOT NULL,
  `balance` decimal(15,2) NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `own_lot`
--

INSERT INTO `own_lot` (`own_id`, `block_id`, `client_id`, `downpayment`, `terms`, `monthly`, `penalty`, `contract_price`, `datepayment`, `months_paid`, `deposit`, `balance`, `user_id`) VALUES
(1, '1', '1', '1000.00', 12, '8250.00', '0.00', '99000.00', '2016-04-01', 0, 0.00, '99000.00', ''),
(2, '2', '1', '6000.00', 12, '9500.00', '0.00', '114000.00', '2016-04-01', 0, 0.00, '114000.00', ''),
(3, '3', '1', '2000.00', 2, '60561.50', '0.00', '121123.00', '2016-06-02', 0, 0.00, '121123.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `penalty_rate` decimal(15,2) NOT NULL,
  `discount` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`penalty_rate`, `discount`) VALUES
('10.00', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(30) NOT NULL,
  `block_id` varchar(30) NOT NULL,
  `client_id` varchar(30) NOT NULL,
  `datepayment` date NOT NULL,
  `total_paid` decimal(15,2) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `deposit` decimal(15,2) NOT NULL,
  `penalty` decimal(15,2) NOT NULL,
  `user_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_id`, `block_id`, `client_id`, `datepayment`, `total_paid`, `amount`, `deposit`, `penalty`, `user_id`) VALUES
(1, 'AHR13JI5H', '1', '1', '2016-04-01', '1000.00', '0.00', '0.00', '0.00', 3),
(2, '2XWQGW54H', '2', '1', '2016-04-01', '6000.00', '0.00', '0.00', '0.00', 3),
(3, 'LS3PVODMM', '3', '1', '2016-06-02', '2000.00', '0.00', '0.00', '0.00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `address` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `address`, `status`, `type`, `username`, `password`, `firstname`, `middlename`, `lastname`, `contact`) VALUES
(1, 'casia', 'active', 'cashier', 'sample', 'sample', 'skill', 'skill', 'skill', 'asdasd'),
(2, 'sample', 'active', 'admin', 'sample', 'sample', '', '', '', '123123'),
(3, 'admin', 'active', 'default', 'admin', 'admin', 'admin', 'admin', 'admin', '983123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`block_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `lot`
--
ALTER TABLE `lot`
  ADD PRIMARY KEY (`lot_id`);

--
-- Indexes for table `own_lot`
--
ALTER TABLE `own_lot`
  ADD PRIMARY KEY (`own_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lot`
--
ALTER TABLE `lot`
  MODIFY `lot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `own_lot`
--
ALTER TABLE `own_lot`
  MODIFY `own_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
