-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2023 at 04:56 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelManagement4_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `City`
--

CREATE TABLE `City` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `City`
--

INSERT INTO `City` (`city_id`, `city_name`) VALUES
(1, 'Boston'),
(2, 'Hanoi');

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `Customers` (
  `cusID` int(11) NOT NULL,
  `cusName` varchar(100) DEFAULT NULL,
  `cusPhone` varchar(20) DEFAULT NULL,
  `cusEmail` varchar(100) NOT NULL,
  `cusAddress` varchar(200) DEFAULT NULL,
  `cusGender` varchar(45) DEFAULT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`cusID`, `cusName`, `cusPhone`, `cusEmail`, `cusAddress`, `cusGender`, `password`) VALUES
(1, 'Customer 1', '1111111111', 'cus1@gmail.com', 'City 1', 'Male', '1'),
(2, 'Customer 2', NULL, 'cus2@gmail.com', NULL, NULL, '2'),
(3, 'Customer 3', '333333333', 'cus3@gmail.com', 'City 3', 'Male', '3'),
(4, 'Customer 4', '444444444', 'cus4@gmail.com', 'City 4', 'Male', '4'),
(8, 'Phan Anh Duc', '0932212003', 'phananhduc138@gmail.com', 'c', 'Male', 'anhduc2003');

-- --------------------------------------------------------

--
-- Table structure for table `Employees`
--

CREATE TABLE `Employees` (
  `empID` int(11) NOT NULL,
  `empName` varchar(100) DEFAULT NULL,
  `empPhone` varchar(20) DEFAULT NULL,
  `empEmail` varchar(100) NOT NULL,
  `empAddress` varchar(200) DEFAULT NULL,
  `empGender` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `Hotels_hotelID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Employees`
--

INSERT INTO `Employees` (`empID`, `empName`, `empPhone`, `empEmail`, `empAddress`, `empGender`, `position`, `password`, `Hotels_hotelID`) VALUES
(1, 'Employee 1', '1111111111', 'emp1@gmail.com', 'City 1', 'Male', 'staff', '1', 1),
(2, 'Employee 2', '2222222222', 'emp2@gmail.com', 'City 2', 'Female', 'staff', '2', 2),
(3, 'Employee 3', '3333333333', 'emp3@gmail.com', 'City 3', 'Male', 'staff', '3', 1),
(4, 'Manager 4', '444444444', 'emp4@gmail.com', '', '', 'manager', '4', 1),
(5, 'Employee 5', '', 'emp5@gmail.com', 'City 5', 'Male', 'staff', '5', 2),
(6, 'Customer 6', '', 'emp6@gmail.com', '', '', 'staff', '6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Hotels`
--

CREATE TABLE `Hotels` (
  `hotelID` int(11) NOT NULL,
  `hotelName` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Hotels`
--

INSERT INTO `Hotels` (`hotelID`, `hotelName`, `location`, `city_id`) VALUES
(1, 'Hotel 1', 'City 1', 1),
(2, 'Hotel 2', 'City 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Reservations`
--

CREATE TABLE `Reservations` (
  `resID` int(11) NOT NULL,
  `checkInDate` date NOT NULL,
  `checkOutDate` date NOT NULL,
  `reservedDate` date NOT NULL,
  `Employees_empID` int(11) NOT NULL,
  `Customers_cusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Reservations`
--

INSERT INTO `Reservations` (`resID`, `checkInDate`, `checkOutDate`, `reservedDate`, `Employees_empID`, `Customers_cusID`) VALUES
(14, '2022-12-01', '2022-12-02', '2022-11-30', 1, 8),
(15, '2023-03-04', '2023-03-05', '2023-03-03', 3, 8),
(16, '2023-04-10', '2023-04-13', '2023-04-07', 6, 8),
(24, '2023-04-11', '2023-04-14', '2023-04-11', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Rooms`
--

CREATE TABLE `Rooms` (
  `roomID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `Hotels_hotelID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Rooms`
--

INSERT INTO `Rooms` (`roomID`, `price`, `type`, `Hotels_hotelID`) VALUES
(101, 100, 'Garden View', 1),
(101, 100, 'Pool View', 2),
(102, 100, 'Lake View', 1),
(103, 150, 'Lake View', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Rooms_has_Reservations`
--

CREATE TABLE `Rooms_has_Reservations` (
  `Rooms_roomID` int(11) NOT NULL,
  `Rooms_Hotels_hotelID` int(11) NOT NULL,
  `Reservations_resID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Rooms_has_Reservations`
--

INSERT INTO `Rooms_has_Reservations` (`Rooms_roomID`, `Rooms_Hotels_hotelID`, `Reservations_resID`) VALUES
(101, 1, 14),
(101, 1, 15),
(101, 1, 24),
(102, 1, 14),
(102, 1, 15),
(102, 1, 16),
(103, 1, 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `City`
--
ALTER TABLE `City`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`cusID`),
  ADD UNIQUE KEY `cusEmail_UNIQUE` (`cusEmail`);

--
-- Indexes for table `Employees`
--
ALTER TABLE `Employees`
  ADD PRIMARY KEY (`empID`),
  ADD UNIQUE KEY `empEmail_UNIQUE` (`empEmail`),
  ADD KEY `fk_Employees_Hotels1_idx` (`Hotels_hotelID`);

--
-- Indexes for table `Hotels`
--
ALTER TABLE `Hotels`
  ADD PRIMARY KEY (`hotelID`),
  ADD UNIQUE KEY `hotelName_UNIQUE` (`hotelName`),
  ADD UNIQUE KEY `location_UNIQUE` (`location`),
  ADD KEY `FK_City` (`city_id`);

--
-- Indexes for table `Reservations`
--
ALTER TABLE `Reservations`
  ADD PRIMARY KEY (`resID`),
  ADD KEY `fk_Reservations_Employees1_idx` (`Employees_empID`),
  ADD KEY `fk_Reservations_Customers1_idx` (`Customers_cusID`);

--
-- Indexes for table `Rooms`
--
ALTER TABLE `Rooms`
  ADD PRIMARY KEY (`roomID`,`Hotels_hotelID`),
  ADD KEY `fk_Rooms_Hotels1_idx` (`Hotels_hotelID`);

--
-- Indexes for table `Rooms_has_Reservations`
--
ALTER TABLE `Rooms_has_Reservations`
  ADD PRIMARY KEY (`Rooms_roomID`,`Rooms_Hotels_hotelID`,`Reservations_resID`),
  ADD KEY `fk_Rooms_has_Reservations_Reservations1_idx` (`Reservations_resID`),
  ADD KEY `fk_Rooms_has_Reservations_Rooms1_idx` (`Rooms_roomID`,`Rooms_Hotels_hotelID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `City`
--
ALTER TABLE `City`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Customers`
--
ALTER TABLE `Customers`
  MODIFY `cusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Employees`
--
ALTER TABLE `Employees`
  MODIFY `empID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Hotels`
--
ALTER TABLE `Hotels`
  MODIFY `hotelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Reservations`
--
ALTER TABLE `Reservations`
  MODIFY `resID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Employees`
--
ALTER TABLE `Employees`
  ADD CONSTRAINT `fk_Employees_Hotels1` FOREIGN KEY (`Hotels_hotelID`) REFERENCES `Hotels` (`hotelID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Hotels`
--
ALTER TABLE `Hotels`
  ADD CONSTRAINT `FK_City` FOREIGN KEY (`city_id`) REFERENCES `City` (`city_id`);

--
-- Constraints for table `Reservations`
--
ALTER TABLE `Reservations`
  ADD CONSTRAINT `fk_Reservations_Customers1` FOREIGN KEY (`Customers_cusID`) REFERENCES `Customers` (`cusID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reservations_Employees1` FOREIGN KEY (`Employees_empID`) REFERENCES `Employees` (`empID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Rooms`
--
ALTER TABLE `Rooms`
  ADD CONSTRAINT `fk_Rooms_Hotels1` FOREIGN KEY (`Hotels_hotelID`) REFERENCES `Hotels` (`hotelID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Rooms_has_Reservations`
--
ALTER TABLE `Rooms_has_Reservations`
  ADD CONSTRAINT `fk_Rooms_has_Reservations_Reservations1` FOREIGN KEY (`Reservations_resID`) REFERENCES `Reservations` (`resID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Rooms_has_Reservations_Rooms1` FOREIGN KEY (`Rooms_roomID`,`Rooms_Hotels_hotelID`) REFERENCES `Rooms` (`roomID`, `Hotels_hotelID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
