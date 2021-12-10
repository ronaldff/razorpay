-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 02:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `razorpay`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  `c_mobileno` bigint(11) DEFAULT NULL,
  `c_email` varchar(255) DEFAULT NULL,
  `c_address` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_mobileno`, `c_email`, `c_address`, `created_at`) VALUES
(1, 'rohit', 1234567895, 'rohit@gmail.com', 'q.no=93,chocky colony test', '2021-12-10 11:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `payment_transaction`
--

CREATE TABLE `payment_transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `razorpay_payment_id` text DEFAULT NULL,
  `razorpay_order_id` text DEFAULT NULL,
  `checkout_order_id` text DEFAULT NULL,
  `razorpay_signature` text DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_transaction`
--

INSERT INTO `payment_transaction` (`id`, `user_id`, `amount`, `currency`, `razorpay_payment_id`, `razorpay_order_id`, `checkout_order_id`, `razorpay_signature`, `payment_status`, `created_at`, `updated_date`) VALUES
(1, 1, '12', 'INR', 'pay_IVm3rR3v5vcZ9B', 'order_IVm3KmqYI63VU3', 'order_rcpt_id_522', '1cde09a55a78ce6aa39326ff70b9fd47736db8f21af2cc6a4a053967027537a8', 'success', '2021-12-10 18:05:27', '2021-12-10'),
(2, 1, '10', 'INR', 'pay_IVmxUcAzzWfLUq', 'order_IVmxGUDpT5uuUb', 'order_rcpt_id_803', 'b0a7c5cf04e3f3aac38e6445fe883b61fbce095b58eef3109103d49337cb294e', 'success', '2021-12-10 18:58:24', '2021-12-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `payment_transaction`
--
ALTER TABLE `payment_transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_transaction`
--
ALTER TABLE `payment_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
