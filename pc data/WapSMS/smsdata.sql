-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2015 at 07:29 AM
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
  `uid` int(30) NOT NULL DEFAULT '1',
  `cid` int(30) NOT NULL DEFAULT '1',
  `slike` int(20) NOT NULL DEFAULT '0',
  `stime` int(20) NOT NULL DEFAULT '0',
  `smsview` int(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `smsdata`
--

INSERT INTO `smsdata` (`id`, `uid`, `cid`, `slike`, `stime`, `smsview`) VALUES
(2, 1, 2, 4, 1424559484, 'tested by jewel'),
(3, 1, 2, 4, 1424559548, 'tested by jewel'),
(4, 1, 2, 4, 1424559712, 'tested by jewel'),
(5, 1, 2, 12, 1424560101, 'tested by jewel'),
(6, 1, 2, 1, 1424560213, 'tested by jewel'),
(7, 1, 2, 1, 1424560384, 'tested by jewel'),
(8, 1, 2, 1, 1424560563, 'tested by jewel'),
(9, 1, 2, 1, 1424560630, 'tested by jewel'),
(10, 1, 2, 2, 1424561152, 'sms posted by wapsmsbd.com'),
(11, 1, 2, 3, 1424561174, 'sms posted by wapsmsbd.com'),
(12, 1, 2, 1, 1424561208, 'sms posted by wapsmsbd.com'),
(13, 1, 2, 2, 1424561235, 'sms posted by wapsmsbd.com'),
(14, 1, 2, 3, 1424561256, 'sms posted by wapsmsbd.com'),
(15, 1, 2, 3, 1424561345, 'sms posted by wapsmsbd.com'),
(16, 1, 2, 2, 1424561566, 'sms posted by wapsmsbd.com'),
(17, 1, 2, 4, 1424561586, 'sms posted by wapsmsbd.com'),
(18, 1, 2, 2, 1424561611, 'sms posted by wapsmsbd.com'),
(19, 1, 2, 2, 1424561628, 'sms posted by wapsmsbd.com'),
(20, 1, 2, 4, 1424561637, 'sms posted by wapsmsbd.com'),
(21, 1, 2, 3, 1424561648, 'sms posted by wapsmsbd.com'),
(22, 1, 2, 3, 1424561660, 'sms posted by wapsmsbd.com'),
(23, 1, 2, 4, 1424561671, 'sms posted by wapsmsbd.com'),
(24, 1, 2, 15, 1424561735, 'sms posted by wapsmsbd.com'),
(25, 0, 0, 0, 1424783050, 'testing'),
(26, 1, 2, 1, 1424783964, 'having a test'),
(27, 1, 31, 0, 1424784436, 'à¦šà¦¶à¦®à¦¾ à¦ªà¦°à¦¾ à¦¸à§‡à¦‡ à¦¦à§à¦šà§‹à¦–à§‡à¦° à¦¬à¦¾à¦à¦•à¦¾ à¦¬à¦¾à¦à¦•à¦¾ à¦¦à§ƒà¦·à§à¦Ÿà¦¿,à¦®à¦¨à¦œà¦®à¦¿à¦¨à§‡ à¦¨à¦¾à¦®à¦¿à¦¯à¦¼à§‡ à¦›à¦¿à¦²à§‹ à¦®à§à¦·à¦² à¦§à¦¾à¦°à¦¾à¦¯à¦¼ à¦¬à§'),
(28, 1, 31, 0, 1424784449, 'à¦¯à¦¦à¦¿ à¦•à¦–à¦¨ à¦†à¦®à¦¿ à¦¹à¦¾à¦°à¦¿à§Ÿà§‡ à¦¯à¦¾à¦‡ à¦ à¦¦à§‚à¦° à¦¤à¦¾à¦°à¦¾à¦° à¦¦à§‡à¦¶à§‡, à¦¤à§à¦®à¦¿ à¦•à§€ à¦¤à¦–à¦¨à¦“ à¦–à§à¦œà¦¬à§‡ à¦†à¦®à¦¾à§Ÿ à¦¹à¦¾à¦¤ à¦¬à¦¾à§œà¦¿à§Ÿà§‡ à¦­à¦¾');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
