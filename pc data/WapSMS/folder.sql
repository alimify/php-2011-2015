-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2015 at 01:59 AM
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
-- Table structure for table `folder`
--

CREATE TABLE IF NOT EXISTS `ntl` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL DEFAULT '',
  `url` varchar(200) NOT NULL DEFAULT '',
  `fltype` int(1) NOT NULL DEFAULT '0',
  `ftype` int(1) NOT NULL DEFAULT '1',
  `cuid` int(10) NOT NULL DEFAULT '0',
  `ctime` int(100) NOT NULL DEFAULT '0',
  `place` int(100) NOT NULL DEFAULT '0',
  `cfid` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `ntl`
--

INSERT INTO `ntl` (`id`, `name`, `url`, `fltype`, `place`, `cfid`) VALUES
(65, 'Valobashar Sms', '/Valobashar Sms', 0, 21, 0),
(64, 'Suprovat Sms', '/Suprovat Sms', 0, 20, 0),
(63, 'Shuvo Ratri Sms', '/Shuvo Ratri Sms', 0, 19, 0),
(62, 'Shuvo Kamona Sms', '/Shuvo Kamona Sms', 0, 18, 0),
(61, 'Seasonal Sms', '/Seasonal Sms', 0, 2, 0),
(60, 'Nobo Borsho Sms', '/Nobo Borsho Sms', 0, 16, 0),
(58, 'Mixed Sms', '/Mixed Sms', 0, 4, 0),
(56, 'Koster Sms', '/Koster Sms', 0, 12, 0),
(57, 'Miss You Sms', '/Miss You Sms', 0, 13, 0),
(55, 'Kemon Acho Sms', '/Kemon Acho Sms', 0, 11, 0),
(54, 'Jonmodin Sms', '/Jonmodin Sms', 0, 10, 0),
(53, 'Jokes Sms', '/Jokes Sms', 0, 9, 0),
(51, 'Eid Sms', '/Eid Sms', 0, 7, 0),
(52, 'Islamic Sms', '/Islamic Sms', 0, 3, 0),
(50, 'Bondhutto Sms', '/Bondhutto Sms', 0, 6, 0),
(49, 'Boka Bananor Sms', '/Boka Bananor Sms', 0, 5, 0),
(47, 'Advice Sms', '/Advice Sms', 0, 3, 0),
(46, 'Adult Sms', '/Adult Sms', 0, 0, 0),
(45, '21 February Sms', '/21 February Sms', 0, 1, 0),
(66, 'à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸', 0, 22, 0),
(67, 'à¦‡à¦¸à¦²à¦¾à¦®à¦¿à¦• Sms', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸/à¦‡à¦¸à¦²à¦¾à¦®à¦¿à¦• Sms', 0, 1, 66),
(68, 'à¦ˆà¦¦ à¦®à§à¦¬à¦¾à¦°à¦¾à¦• Sms', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸/à¦ˆà¦¦ à¦®à§à¦¬à¦¾à¦°à¦¾à¦• Sms', 0, 2, 66),
(69, 'à¦‰à¦ªà¦¦à§‡à¦¶ Sms', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸/à¦‰à¦ªà¦¦à§‡à¦¶ Sms', 0, 3, 66),
(70, 'à¦‹à¦¤à§ à¦•à¦¾à¦²à¦¿à¦¨ Sms', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸/à¦‹à¦¤à§ à¦•à¦¾à¦²à¦¿à¦¨ Sms', 0, 4, 66),
(71, 'à¦à¦¤à¦¿à¦¹à¦¾à¦¸à¦¿à¦• Sms', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸/à¦à¦¤à¦¿à¦¹à¦¾à¦¸à¦¿à¦• Sms', 0, 5, 66),
(72, 'à¦•à¦·à§à¦Ÿà§‡à¦° Sms', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸/à¦•à¦·à§à¦Ÿà§‡à¦° Sms', 0, 98, 66),
(73, 'à¦•à§‡à¦®à¦¨ à¦†à¦›à§‹ Sms', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸/à¦•à§‡à¦®à¦¨ à¦†à¦›à§‹ Sms', 0, 7, 66),
(74, 'à¦ªà§à¦°à¦¿à¦¯à¦¼ à¦¬à¦¨à§à¦§à§ Sms', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸/à¦ªà§à¦°à¦¿à¦¯à¦¼ à¦¬à¦¨à§à¦§à§ Sms', 0, 8, 66),
(75, 'à¦¬à§‹à¦•à¦¾ à¦¬à¦¾à¦¨à¦¾à¦¨à§‹à¦° Sms', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸/à¦¬à§‹à¦•à¦¾ à¦¬à¦¾à¦¨à¦¾à¦¨à§‹à¦° Sms', 0, 9, 66),
(76, 'à¦­à¦¾à¦²à¦¬à¦¾à¦¸à¦¾à¦° Sms', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸/à¦­à¦¾à¦²à¦¬à¦¾à¦¸à¦¾à¦° Sms', 0, 99, 66),
(77, 'à¦®à¦¨à§‡ à¦ªà¦°à¦¾à¦° Sms', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸/à¦®à¦¨à§‡ à¦ªà¦°à¦¾à¦° Sms', 0, 11, 66),
(78, 'à¦®à¦¾ à¦¬à¦¾à¦¬à¦¾à¦° Sms', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸/à¦®à¦¾ à¦¬à¦¾à¦¬à¦¾à¦° Sms', 0, 12, 66),
(79, 'à¦¶à§à¦ªà§à¦°à¦­à¦¾à¦¤ Sms', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸/à¦¶à§à¦ªà§à¦°à¦­à¦¾à¦¤ Sms', 0, 13, 66),
(80, 'à¦¶à§à¦­ à¦•à¦¾à¦®à¦¨à¦¾ Sms', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸/à¦¶à§à¦­ à¦•à¦¾à¦®à¦¨à¦¾ Sms', 0, 14, 66),
(81, 'à¦¶à§à¦­ à¦¨à¦¬à¦¬à¦°à§à¦· Sms', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸/à¦¶à§à¦­ à¦¨à¦¬à¦¬à¦°à§à¦· Sms', 0, 15, 66),
(82, 'à¦¶à§à¦­ à¦°à¦¾à¦¤à§à¦°à¦¿ Sms', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸/à¦¶à§à¦­ à¦°à¦¾à¦¤à§à¦°à¦¿ Sms', 0, 16, 66),
(83, 'à¦¸à¦¾à¦§à¦¾à¦°à¦¨ Sms', '/à¦¬à¦¾à¦‚à¦²à¦¾ à¦à¦¸à¦à¦®à¦à¦¸/à¦¸à¦¾à¦§à¦¾à¦°à¦¨ Sms', 0, 17, 66),
(84, 'Puja Sms', '/Puja Sms', 0, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
