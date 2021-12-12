-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2015 at 09:57 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zadmin_wapsmsbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `smsdata`
--
CREATE TABLE IF NOT EXISTS `smsdata` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `cid` int(30) NOT NULL DEFAULT '0',
  `uid` int(30) NOT NULL DEFAULT '0',
  `url` varchar(100) NOT NULL DEFAULT '0',
  `stime` int(30) NOT NULL DEFAULT '0',
  `slike` int(20) NOT NULL DEFAULT '0',
  `smsview` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
