-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2021 at 01:33 PM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nJpHWU5rJ5`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `number_vta` varchar(50) NOT NULL,
  `type_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `name`, `country`, `number_vta`, `type_id`) VALUES
(10, 'Raviga', 'United States', 'US456 654 342', 2),
(11, 'Dunder Mifflin', 'United States', 'US678 765 765', 2),
(15, 'Jouets Jean-Michel', 'France', 'FR 677 544 000', 2),
(16, 'Bob Vance Refrig.', 'United States', 'US546 654 687', 2),
(17, 'Belgalol', 'Belgique', 'BE0876 654 665', 1),
(18, 'Pierre Cailloux', 'France', 'FR 678 908 654', 1),
(19, 'Proximdr', 'Belgique', 'BE0876 985 665', 1),
(20, 'ElectricPower', 'Italie', 'It 256 852 542', 1),
(21, 'Pied Piper', 'United Stats', 'US457 857 657', 2),
(22, 'Phoque Off', 'United States', 'US478 657 985', 1),
(23, 'Mutiny', 'United States', 'US786 647 524', 2),
(24, 'Hooli', 'United States', 'US786 489 325', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(15) NOT NULL,
  `company_id` int(15) DEFAULT NULL,
  `person_id` int(15) DEFAULT NULL,
  `invoice_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `company_id`, `person_id`, `invoice_date`) VALUES
(1, 10, 7, '2019-05-04'),
(2, 11, 2, '2019-01-23'),
(3, 15, NULL, '2019-05-13'),
(4, 16, NULL, '2019-05-17'),
(5, 17, NULL, '2019-05-18'),
(6, 18, NULL, '2019-06-01'),
(7, 19, NULL, '2019-06-02'),
(8, 19, NULL, '2019-06-07'),
(9, 20, NULL, '2019-06-08'),
(10, 21, 3, '2019-06-12'),
(11, 22, 4, '2019-06-20'),
(12, 23, 5, '2019-07-02'),
(13, 24, 6, '2019-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `person_id` int(15) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `company_id` int(15) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`person_id`, `first_name`, `last_name`, `email`, `company_id`, `phone`) VALUES
(1, 'Alejandro', 'Montilla', 'alejo@gmailcom', NULL, NULL),
(2, 'Dwight', 'Schrute', 'dwight.schrute@ddmfl.com', 11, '555-9859'),
(3, 'Bertram', 'Gilfoyle', 'gilfoye@piedpiper.com', 21, '555-8987'),
(4, 'Jian ', 'Yang', 'jian.yan@phoque.off', 22, '555-4567'),
(5, 'Cameron', 'Howe', 'cam.howe@mutiny.net', 23, '555-7896'),
(6, 'Gavin', 'Belson', 'gavin@hooli.com', 24, '555-4213'),
(7, 'Peter', 'Gregory', 'peter.gregory@raviga.com', 10, '555-4567');

-- --------------------------------------------------------

--
-- Table structure for table `type_of_company`
--

CREATE TABLE `type_of_company` (
  `type_id` int(15) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `type_of_company`
--

INSERT INTO `type_of_company` (`type_id`, `type`) VALUES
(1, 'Suppliers'),
(2, 'Client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`person_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `type_of_company`
--
ALTER TABLE `type_of_company`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `person_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `type_of_company`
--
ALTER TABLE `type_of_company`
  MODIFY `type_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type_of_company` (`type_id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`person_id`) REFERENCES `people` (`person_id`);

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
