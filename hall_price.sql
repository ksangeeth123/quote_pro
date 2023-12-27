-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 04:35 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quote`
--

-- --------------------------------------------------------

--
-- Table structure for table `hall_price`
--

CREATE TABLE `hall_price` (
  `hall` varchar(150) NOT NULL,
  `price` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall_price`
--

INSERT INTO `hall_price` (`hall`, `price`) VALUES
('Sanbhavi Hall', 23000),
('Sandharani Hall', 17250),
('Sanvadani Hall', 34500),
('Sanhinda Hall', 92000),
('Sanhinda Hall ( 4 Hours)', 51750),
('1-1 Hall', 46000),
('Sansravani Hall', 46000),
('Nomal Lecture Hall (for 40/30 participants) 3-2', 11500),
('Sankathani Hall', 69000),
('2-1 Lecture Hall', 46000),
('3-3 Lecture Hall', 17250),
('VIP Lounge Ground Flooor 4 Hours', 17250),
('VIP Lounge Ground Flooor &amp; 1st floor 4 hours', 40250),
('VIP Dining Room (lFloor) - 4 Hours', 23000),
('VIP Longuge 1st Floor &amp; Roof top 4 hours', 46000),
('Extra Hour Charges for VIP Dining Room', 2300),
('Extra Hour Charges for Sandharani Hall', 2300),
('Extra Hour Charges for Sansravani / 1-1/ 2-1 Hall', 5750),
('Extra OT Payment ( Charges will apply for programs held after 4.30 pm and on holidays )', 1800),
('Multimedia Charges', 5000),
('Oil Lamp', 300),
('Wireless Mick/Clipa Mick', 1500),
('SLIDA Premises - Nigtht Time Programme (After\r\n4.30 pm)', 29000),
('SLIDA Premises day Time Programme', 17250);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
