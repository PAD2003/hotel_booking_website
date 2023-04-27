-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th4 27, 2023 lúc 05:58 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hotelManagement4_test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `City`
--

CREATE TABLE `City` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `City`
--

INSERT INTO `City` (`city_id`, `city_name`) VALUES
(1, 'Boston'),
(2, 'Hanoi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Customers`
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
-- Đang đổ dữ liệu cho bảng `Customers`
--

INSERT INTO `Customers` (`cusID`, `cusName`, `cusPhone`, `cusEmail`, `cusAddress`, `cusGender`, `password`) VALUES
(1, 'Hoang Hung Manh', '0932212003', 'hhm@gmail.com', 'Ha Noi', 'Male', 'hhm'),
(2, 'Nguyen Binh Nguyen', '0932212003', 'nbn@gmail.com', 'Ha Noi', 'Male', 'nbn'),
(3, 'Tran Nam Dan', '0932212003', 'tnd@gmail.com', 'Ha Noi', 'Male', 'tnd'),
(4, 'Phan Anh Duc', '0932212003', 'phananhduc138@gmail.com', 'Ha Noi', 'Male', 'pad'),
(5, 'Hoang Minh Quan', '0386981974', 'mq14082003@gmail.com', 'Lo Duc, Ha Noi', 'Male', '123'),
(6, 'Customer', '0932212003', 'customer@gmail.com', 'Xuan Thuy, Ha Noi', 'Male', 'customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Employees`
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
-- Đang đổ dữ liệu cho bảng `Employees`
--

INSERT INTO `Employees` (`empID`, `empName`, `empPhone`, `empEmail`, `empAddress`, `empGender`, `position`, `password`, `Hotels_hotelID`) VALUES
(1, 'Employee 1', '1111111111', 'emp1@gmail.com', 'City 1', 'Male', 'staff', '1', 1),
(2, 'Employee 2', '2222222222', 'emp2@gmail.com', 'City 2', 'Female', 'staff', '2', 2),
(3, 'Employee 3', '3333333333', 'emp3@gmail.com', 'City 3', 'Male', 'staff', '3', 3),
(4, 'Customer 4', '444444444', 'emp4@gmail.com', 'City 4', 'Female', 'staff', '4', 4),
(5, 'Employee 5', '5555555555', 'emp5@gmail.com', 'City 5', 'Male', 'staff', '5', 5),
(6, 'Manager 1', '666666666', 'man1@gmail.com', 'City 6', 'Female', 'manager', '6', 1),
(7, 'Manager 2', '777777777', 'man2@gmail.com', 'City 7', 'Male', 'manager', '7', 2),
(8, 'Manager 3', '888888888', 'man3@gmail.com', 'City 8', 'Female', 'manager', '8', 3),
(9, 'Manager 4', '999999999', 'man4@gmail.com', 'City 9', 'Male', 'manager', '9', 4),
(10, 'Manager 5', '0932212003', 'man5@gmail.com', 'City 10', 'Female', 'manager', '10', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Hotels`
--

CREATE TABLE `Hotels` (
  `hotelID` int(11) NOT NULL,
  `hotelName` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL,
  `city_id` int(11) NOT NULL,
  `link_map` varchar(255) DEFAULT NULL,
  `link_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Hotels`
--

INSERT INTO `Hotels` (`hotelID`, `hotelName`, `location`, `city_id`, `link_map`, `link_img`) VALUES
(1, 'Hotel Commonwealth', 'Boston', 1, '!1m18!1m12!1m3!1d2948.7198761594327!2d-71.09781782335322!3d42.348495335831345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e37a1d2e734de5%3A0x59aae098bf93cb53!2sHotel%20Commonwealth!5e0!3m2!1svi!2s!4v1681228808627!5m2!1svi!2s\\', './hotel/1.jpeg'),
(2, 'The Newbury', 'Newbury Street', 1, '!1m18!1m12!1m3!1d2948.5207857903442!2d-71.07409032396278!3d42.352739335564095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e37bb48cee3b0b%3A0x8df43a87561b77f5!2sThe%20Newbury%20Boston!5e0!3m2!1svi!2s!4v1681446862083!5m2!1svi!2s', './hotel/2.jpeg'),
(3, 'Sofitel Legend Metropole', 'Hanoi', 2, '!1m18!1m12!1m3!1d3724.1816262139796!2d105.85380007528468!3d21.025417487893385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abeb98f8b54d%3A0x90d6982234a65f25!2sSofitel%20Legend%20Metropole%20Hotel!5e0!3m2!1svi!2s!4v1681446674110!5m2!1svi!2s', './hotel/5.jpeg'),
(4, 'XV Beacon', 'Beacon Street', 1, '!1m18!1m12!1m3!1d2948.2586364126173!2d-71.06450462396249!3d42.35832703521109!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e3709b526f9701%3A0x3bc95bcb2380d36d!2sXV%20Beacon!5e0!3m2!1svi!2s!4v1681447169878!5m2!1svi!2s', './hotel/6.jpeg'),
(5, 'PullMan Hanoi Hotel', '40 Cat Linh Str', 2, '!1m18!1m12!1m3!1d3724.0679649605413!2d105.82614427528472!3d21.029966387737055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab95bc23ffff%3A0x52a8917f5d1b7ef4!2sPullman%20Hanoi%20Hotel!5e0!3m2!1svi!2s!4v1681447236862!5m2!1svi!2s', './hotel/7.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Reservations`
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
-- Đang đổ dữ liệu cho bảng `Reservations`
--

INSERT INTO `Reservations` (`resID`, `checkInDate`, `checkOutDate`, `reservedDate`, `Employees_empID`, `Customers_cusID`) VALUES
(36, '2023-04-22', '2023-04-23', '2023-04-21', 2, 4),
(37, '2023-04-22', '2023-04-24', '2023-04-21', 3, 4),
(38, '2023-04-22', '2023-04-24', '2023-04-21', 1, 4),
(39, '2023-05-01', '2023-05-02', '2023-04-27', 1, 6),
(40, '2023-05-04', '2023-05-06', '2023-04-27', 3, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Rooms`
--

CREATE TABLE `Rooms` (
  `roomID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `Hotels_hotelID` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `link_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Rooms`
--

INSERT INTO `Rooms` (`roomID`, `price`, `type`, `Hotels_hotelID`, `capacity`, `link_img`) VALUES
(101, 100, 'Garden View', 1, 2, './hotel/1_101.jpeg'),
(101, 100, 'Garden View', 2, 2, './hotel/1_101.jpeg'),
(101, 100, 'Garden View', 3, 2, './hotel/1_101.jpeg'),
(101, 100, 'Garden View', 4, 2, './hotel/1_101.jpeg'),
(101, 100, 'Garden View', 5, 2, './hotel/1_101.jpeg'),
(102, 100, 'Lake View', 1, 2, './hotel/1_102.jpeg'),
(102, 100, 'Lake View', 2, 2, './hotel/1_102.jpeg'),
(102, 100, 'Lake View', 3, 2, './hotel/1_102.jpeg'),
(102, 100, 'Lake View', 4, 2, './hotel/1_102.jpeg'),
(102, 100, 'Lake View', 5, 2, './hotel/1_102.jpeg'),
(103, 150, 'Lake View', 1, 2, './hotel/1_103.jpeg'),
(103, 150, 'Lake View', 2, 2, './hotel/1_103.jpeg'),
(103, 150, 'Lake View', 3, 2, './hotel/1_103.jpeg'),
(103, 150, 'Lake View', 4, 2, './hotel/1_103.jpeg'),
(103, 150, 'Lake View', 5, 2, './hotel/1_103.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Rooms_has_Reservations`
--

CREATE TABLE `Rooms_has_Reservations` (
  `Rooms_roomID` int(11) NOT NULL,
  `Rooms_Hotels_hotelID` int(11) NOT NULL,
  `Reservations_resID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `Rooms_has_Reservations`
--

INSERT INTO `Rooms_has_Reservations` (`Rooms_roomID`, `Rooms_Hotels_hotelID`, `Reservations_resID`) VALUES
(101, 1, 39),
(102, 3, 40),
(103, 3, 40);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `City`
--
ALTER TABLE `City`
  ADD PRIMARY KEY (`city_id`);

--
-- Chỉ mục cho bảng `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`cusID`),
  ADD UNIQUE KEY `cusEmail_UNIQUE` (`cusEmail`);

--
-- Chỉ mục cho bảng `Employees`
--
ALTER TABLE `Employees`
  ADD PRIMARY KEY (`empID`),
  ADD UNIQUE KEY `empEmail_UNIQUE` (`empEmail`),
  ADD KEY `fk_Employees_Hotels1_idx` (`Hotels_hotelID`);

--
-- Chỉ mục cho bảng `Hotels`
--
ALTER TABLE `Hotels`
  ADD PRIMARY KEY (`hotelID`),
  ADD UNIQUE KEY `hotelName_UNIQUE` (`hotelName`),
  ADD UNIQUE KEY `location_UNIQUE` (`location`),
  ADD KEY `FK_City` (`city_id`);

--
-- Chỉ mục cho bảng `Reservations`
--
ALTER TABLE `Reservations`
  ADD PRIMARY KEY (`resID`),
  ADD KEY `fk_Reservations_Employees1_idx` (`Employees_empID`),
  ADD KEY `fk_Reservations_Customers1_idx` (`Customers_cusID`);

--
-- Chỉ mục cho bảng `Rooms`
--
ALTER TABLE `Rooms`
  ADD PRIMARY KEY (`roomID`,`Hotels_hotelID`),
  ADD KEY `fk_Rooms_Hotels1_idx` (`Hotels_hotelID`);

--
-- Chỉ mục cho bảng `Rooms_has_Reservations`
--
ALTER TABLE `Rooms_has_Reservations`
  ADD PRIMARY KEY (`Rooms_roomID`,`Rooms_Hotels_hotelID`,`Reservations_resID`),
  ADD KEY `fk_Rooms_has_Reservations_Reservations1_idx` (`Reservations_resID`),
  ADD KEY `fk_Rooms_has_Reservations_Rooms1_idx` (`Rooms_roomID`,`Rooms_Hotels_hotelID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `City`
--
ALTER TABLE `City`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `Customers`
--
ALTER TABLE `Customers`
  MODIFY `cusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `Employees`
--
ALTER TABLE `Employees`
  MODIFY `empID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `Hotels`
--
ALTER TABLE `Hotels`
  MODIFY `hotelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `Reservations`
--
ALTER TABLE `Reservations`
  MODIFY `resID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `Employees`
--
ALTER TABLE `Employees`
  ADD CONSTRAINT `fk_Employees_Hotels1` FOREIGN KEY (`Hotels_hotelID`) REFERENCES `Hotels` (`hotelID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `Hotels`
--
ALTER TABLE `Hotels`
  ADD CONSTRAINT `FK_City` FOREIGN KEY (`city_id`) REFERENCES `City` (`city_id`);

--
-- Các ràng buộc cho bảng `Reservations`
--
ALTER TABLE `Reservations`
  ADD CONSTRAINT `fk_Reservations_Customers1` FOREIGN KEY (`Customers_cusID`) REFERENCES `Customers` (`cusID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reservations_Employees1` FOREIGN KEY (`Employees_empID`) REFERENCES `Employees` (`empID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `Rooms`
--
ALTER TABLE `Rooms`
  ADD CONSTRAINT `fk_Rooms_Hotels1` FOREIGN KEY (`Hotels_hotelID`) REFERENCES `Hotels` (`hotelID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `Rooms_has_Reservations`
--
ALTER TABLE `Rooms_has_Reservations`
  ADD CONSTRAINT `fk_Rooms_has_Reservations_Reservations1` FOREIGN KEY (`Reservations_resID`) REFERENCES `Reservations` (`resID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Rooms_has_Reservations_Rooms1` FOREIGN KEY (`Rooms_roomID`,`Rooms_Hotels_hotelID`) REFERENCES `Rooms` (`roomID`, `Hotels_hotelID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
