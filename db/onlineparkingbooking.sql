-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2018 at 10:23 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineparkingbooking`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertInTwoTable` (IN `user_id` INT, IN `bookingDate` DATE, IN `parkingSlot_id` INT, IN `vehicleNo` VARCHAR(50), IN `today` DATETIME)  BEGIN

	INSERT INTO booking_info ( user_id, bookingDate, parkingSlot_id, vehicleNo, bookedOn) VALUES ( user_id, date, parkingSlot_id, vehicleNo, today);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERTTABLE` (IN `user_id` INT, IN `dateP` DATE, IN `parkingSlot_id` INT, IN `vehicleNo` VARCHAR(50), IN `today` DATETIME)  BEGIN 
	INSERT INTO booking_info ( user_id, bookingDate, parkingSlot_id, vehicleNo, bookedOn) VALUES ( user_id, datep, parkingSlot_id, vehicleNo, today);
    
    UPDATE parking_slots SET status = 'booked',user_id = user_id,
    bookedOn = today
    WHERE parkingSlots_id = parkingSlot_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Register` (IN `firstName` VARCHAR(100), IN `lastName` VARCHAR(100), IN `email` VARCHAR(100), IN `password` VARCHAR(100), IN `licenseNo` VARCHAR(50), IN `phone` VARCHAR(50), IN `role` INT(1))  BEGIN
    	DECLARE uid INT;
    		INSERT INTO user(firstName,lastName,email,user_password,licenseNo,role) VALUES(firstName,lastName,email,user_password,licenseNo,role);
            SET uid = LAST_INSERT_ID();
            
            INSERT INTO phone_no(number,user_id) VALUES(phone,uid);
    
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registerUser` (IN `firstName` VARCHAR(100), IN `lastName` VARCHAR(100), IN `email` VARCHAR(100), IN `password` VARCHAR(100), IN `phone` VARCHAR(50), IN `role` INT(1))  BEGIN
    	DECLARE uid INT;
    		INSERT INTO user(firstName,lastName,email,password,licenseNo,role) VALUES(firstName,lastNama,email,password,licenseNo,role);
            SET uid = LAST_INSERT_ID();
            
            INSERT INTO phone_no(number,user_id) VALUES(phone,uid);
    
 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `bookingInfo_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `bookingDate` date NOT NULL,
  `parkingSlot_id` int(5) NOT NULL,
  `vehicleNo` varchar(50) NOT NULL,
  `bookedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`bookingInfo_id`, `user_id`, `bookingDate`, `parkingSlot_id`, `vehicleNo`, `bookedOn`) VALUES
(31, 6, '2018-12-19', 10, 'Mobil 123', '2018-12-19 00:00:00'),
(32, 6, '2018-12-20', 5, 'Sepeda777', '2018-12-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `parking_slots`
--

CREATE TABLE `parking_slots` (
  `parkingSlots_id` int(5) NOT NULL,
  `vehicleType_id` int(2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `user_id` int(5) NOT NULL,
  `bookedOn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking_slots`
--

INSERT INTO `parking_slots` (`parkingSlots_id`, `vehicleType_id`, `status`, `user_id`, `bookedOn`) VALUES
(1, 1, 'active', 6, '2018-12-19'),
(2, 1, 'active', 0, '0000-00-00'),
(3, 1, 'active', 1, '2018-09-12'),
(4, 1, 'active', 1, '2018-09-12'),
(5, 1, 'active', 6, '2018-12-20'),
(6, 2, 'active', 5, '2018-09-12'),
(8, 2, 'active', 0, '0000-00-00'),
(9, 2, 'active', 0, '0000-00-00'),
(10, 2, 'active', 6, '2018-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `phone_no`
--

CREATE TABLE `phone_no` (
  `phone_id` int(5) NOT NULL,
  `number` varchar(50) NOT NULL,
  `user_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `id_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `licenseNo` varchar(50) NOT NULL,
  `role_id` int(2) NOT NULL,
  `blackListPoint` int(2) NOT NULL,
  `emailConfirmed` int(1) NOT NULL,
  `verificationCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `id_name`, `email`, `password`, `licenseNo`, `role_id`, `blackListPoint`, `emailConfirmed`, `verificationCode`) VALUES
(6, '', 'email123@gmail.com', '123', 'KTP123', 2, 0, 0, ''),
(7, '', 'admin@gmail.com', '123', 'Admin123', 1, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(2) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE `vehicle_type` (
  `vehicleType_id` int(2) NOT NULL,
  `type` varchar(10) NOT NULL,
  `rate` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD PRIMARY KEY (`bookingInfo_id`);

--
-- Indexes for table `parking_slots`
--
ALTER TABLE `parking_slots`
  ADD PRIMARY KEY (`parkingSlots_id`);

--
-- Indexes for table `phone_no`
--
ALTER TABLE `phone_no`
  ADD PRIMARY KEY (`phone_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD PRIMARY KEY (`vehicleType_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_info`
--
ALTER TABLE `booking_info`
  MODIFY `bookingInfo_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `parking_slots`
--
ALTER TABLE `parking_slots`
  MODIFY `parkingSlots_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phone_no`
--
ALTER TABLE `phone_no`
  MODIFY `phone_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  MODIFY `vehicleType_id` int(2) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
