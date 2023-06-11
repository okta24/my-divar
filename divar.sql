-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2017 at 08:51 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `divar`
--

-- --------------------------------------------------------

--
-- Table structure for table `advtable`
--

CREATE TABLE IF NOT EXISTS `advtable` (
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `date` date NOT NULL,
  `email` char(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `phone` int(11) NOT NULL,
`id` int(11) NOT NULL,
  `category` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advtable`
--

INSERT INTO `advtable` (`name`, `description`, `date`, `email`, `phone`, `id`, `category`) VALUES
('دیوار', 'آموزش سایت دیوار', '2016-12-07', 'info@samne', 90000, 3, ''),
('فروش لپتاپ', 'یک عدد لپتاپ دست دوم در حد نو موجود میباشد', '2016-12-08', 'info@samenta.ir', 2147483647, 8, 'لپتاپ'),
('test base url', '  this is tablet     ', '0000-00-00', 'a@a.com', 0, 10, 'املاک'),
('test', ' test description  ', '1395-00-05', 'a@a.com', 95355555, 11, 'لوازم خانگی'),
('', '', '0000-00-00', '', 0, 12, 'کامپیوتر'),
('', '', '0000-00-00', '', 0, 13, 'استخدام'),
('استخدام برنامه نویس اندروید ', 'به یک برنامه نویسی با سابقه و کار بلد نیازمندیم \r\nلطفا تماس بگیرید', '1395-00-05', 'info@samenta.ir', 935000000, 14, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advtable`
--
ALTER TABLE `advtable`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advtable`
--
ALTER TABLE `advtable`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
