-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 01:14 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `admin_firstname` varchar(255) NOT NULL,
  `admin_lastname` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_level` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `registered_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_firstname`, `admin_lastname`, `admin_email`, `admin_level`, `admin_password`, `registered_date`) VALUES
(1, 'Andrew', 'Administrator', 'admin@mail.com', '2', 'admin', '2021-09-29 20:15:34'),
(2, 'Jesus', 'Christ', 'jesus@mail.com', '2', 'jesus', '2021-09-30 11:27:20');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cst_id` int(255) NOT NULL,
  `cst_firstname` varchar(255) NOT NULL,
  `cst_middlename` varchar(255) NOT NULL,
  `cst_lastname` varchar(255) NOT NULL,
  `cst_contact` varchar(255) NOT NULL,
  `cst_post_address` varchar(255) NOT NULL,
  `cst_email` varchar(255) NOT NULL,
  `cst_tax_id` varchar(255) NOT NULL,
  `cst_password` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cst_id`, `cst_firstname`, `cst_middlename`, `cst_lastname`, `cst_contact`, `cst_post_address`, `cst_email`, `cst_tax_id`, `cst_password`, `date_created`) VALUES
(1, 'Joseph', 'Of', 'Nasareth', '08765434567', '1122-3344', 'joseph@mail.com', '112233', '11223', '2021-09-29 20:16:42'),
(2, 'Boniface', 'David', 'Smith', '2347877890', '2020 - Smith Location', 'smith@mail.com', '2345', 'smith', '2021-09-30 00:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `ln_id` int(255) NOT NULL,
  `cst_email` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `plan` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `returned_amount` varchar(255) NOT NULL,
  `loan_reference` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `loan_status` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`ln_id`, `cst_email`, `amount`, `type`, `plan`, `rate`, `returned_amount`, `loan_reference`, `due_date`, `loan_status`, `date_created`) VALUES
(1, 'joseph@mail.com', '200', 'Medical Loan', 'Annual Loan', '17', '234', 'REQ6154A1FA904C7192722', '2022-09-29', 'Paid', '2021-09-29 20:27:22'),
(2, 'smith@mail.com', '1000', 'Educational loan', 'Annual Loan', '17', '1170', 'REQ6154D6BF0A7F5231231', '2022-09-29', 'Declined', '2021-09-30 00:12:31'),
(3, 'joseph@mail.com', '500', 'Educational loan', '1 Month Loan', '12', '560', 'REQ6155744375A4C102435', '2021-10-30', 'Requested', '2021-09-30 11:24:35'),
(4, 'smith@mail.com', '300', 'Educational loan', '1 Month Loan', '12', '336', 'REQ61559094A2C13122524', '2021-10-30', 'Requested', '2021-09-30 13:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `loan_type`
--

CREATE TABLE `loan_type` (
  `type_id` int(200) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `type_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_type`
--

INSERT INTO `loan_type` (`type_id`, `type_name`, `type_date_created`) VALUES
(1, 'Medical Loan', '2021-09-29 20:25:30'),
(2, 'Educational loan', '2021-09-29 20:25:53'),
(3, 'Business Capital', '2021-09-30 14:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_token`
--

CREATE TABLE `password_reset_token` (
  `psr_id` int(200) NOT NULL,
  `psr_token` int(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dt_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `py_id` int(100) NOT NULL,
  `cst_email` varchar(255) NOT NULL,
  `payment_reference` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`py_id`, `cst_email`, `payment_reference`, `amount`, `date_created`) VALUES
(1, 'joseph@mail.com', 'PAY61556A5340DAB094211', '200', '2021-09-30 10:42:11'),
(2, 'joseph@mail.com', 'PAY615570C978D56100945', '5', '2021-09-30 11:09:45'),
(3, 'joseph@mail.com', 'PAY6155721B876B6101523', '30', '2021-09-30 11:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `plan_id` int(200) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_period` varchar(255) NOT NULL,
  `plan_interest_rate` int(255) NOT NULL,
  `plan_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`plan_id`, `plan_name`, `plan_period`, `plan_interest_rate`, `plan_date_created`) VALUES
(1, '1 Month Loan', '1 Months', 12, '2021-09-29 20:23:38'),
(2, 'Annual Loan', '1 Year', 17, '2021-09-29 20:24:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cst_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`ln_id`);

--
-- Indexes for table `loan_type`
--
ALTER TABLE `loan_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `password_reset_token`
--
ALTER TABLE `password_reset_token`
  ADD PRIMARY KEY (`psr_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`py_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cst_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `ln_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loan_type`
--
ALTER TABLE `loan_type`
  MODIFY `type_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `password_reset_token`
--
ALTER TABLE `password_reset_token`
  MODIFY `psr_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `py_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `plan_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
