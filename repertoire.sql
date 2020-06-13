-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2020 at 09:45 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `repertoire`
--

-- --------------------------------------------------------

--
-- Table structure for table `telephone`
--

CREATE TABLE IF NOT EXISTS `telephone` (
  `operateur` varchar(255) NOT NULL,
  `numero` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `telephone`
--

INSERT INTO `telephone` (`operateur`, `numero`) VALUES
('TOGOCEL', '90142453'),
('MOOV', '98765443'),
('MTN', '90789756\r\n		'),
('TOGOCEL', '90142453'),
('MOOV', '98765443'),
('MTN', '90789756\r\n		'),
('TOGOCEL', '90142453'),
('MOOV', '98765443'),
('MTN', '90789756\r\n		'),
('TOGOCEL', '90142453'),
('MOOV', '98765443'),
('MTN', '90789756\r\n		'),
('TOGOCEL', '90178165'),
('MOOV', '98755690'),
('MTN', '908975654\r\n		'),
('TOGOCEL', '90178165'),
('MOOV', '98755690'),
('MTN', '908975654\r\n		'),
('TOGOCEL', '90178165'),
('MOOV', '98755690'),
('MTN', '908975654\r\n		'),
('TOGOCEL', '90178165'),
('MOOV', '98755690'),
('MTN', '908975654\r\n		'),
('TOGOCEL', '90178165'),
('MOOV', '98755690'),
('MTN', '908975654\r\n		'),
('TOGOCEL', '90178165'),
('MOOV', '98755690'),
('MTN', '908975654\r\n		'),
('TOGOCEL', '90178165'),
('MOOV', '98755690'),
('MTN', '908975654\r\n		'),
('TOGOCEL', '90178165'),
('MOOV', '98755690'),
('MTN', '908975654\r\n		');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
