-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 26, 2009 at 05:21 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `sms`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `cats`
-- 

CREATE TABLE `cats` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL default '',
  `adult` int(5) NOT NULL default '0',
  `description` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

-- 
-- Dumping data for table `cats`
-- 

INSERT INTO `cats` VALUES (55, 'personal/Slams', 0, '');
INSERT INTO `cats` VALUES (56, 'Good morning/Night', 0, '');
INSERT INTO `cats` VALUES (57, 'Non-Veg/Adult', 0, '');
INSERT INTO `cats` VALUES (58, 'General/Life ', 0, '');
INSERT INTO `cats` VALUES (59, 'Santa Banta', 0, '');
INSERT INTO `cats` VALUES (54, 'School/College', 0, '');
INSERT INTO `cats` VALUES (52, '18 jokes', 1, 'only 18 jokes here');
INSERT INTO `cats` VALUES (53, 'Friendship ', 0, 'Friendship  sms here');
INSERT INTO `cats` VALUES (50, 'birthday jokes', 0, 'birthday jokes here');

-- --------------------------------------------------------

-- 
-- Table structure for table `misc`
-- 

CREATE TABLE `misc` (
  `id` int(10) NOT NULL auto_increment,
  `dscr` varchar(200) NOT NULL default '',
  `text` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `misc`
-- 

INSERT INTO `misc` VALUES (1, 'CLR', '2006-04-01');

-- --------------------------------------------------------

-- 
-- Table structure for table `sites`
-- 

CREATE TABLE `sites` (
  `id` int(10) NOT NULL auto_increment,
  `sitename` varchar(30) NOT NULL default '',
  `cid` int(10) NOT NULL default '0',
  `sitelink` varchar(200) NOT NULL default '',
  `slogo` varchar(200) NOT NULL default '',
  `uid` int(10) NOT NULL default '0',
  `hin` int(10) NOT NULL default '0',
  `hout` int(10) NOT NULL default '0',
  `dhits` int(10) NOT NULL default '0',
  `thits` int(12) NOT NULL default '0',
  `banned` int(5) NOT NULL default '0',
  `dscr` varchar(200) NOT NULL default '',
  `keywords` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `sitelink` (`sitelink`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=129 ;

-- 
-- Dumping data for table `sites`
-- 

INSERT INTO `sites` VALUES (127, 'unknown', 52, 'Santa: Once when I was playing on a road, a speeding bike hit me and I fell down on the earth unconsciously. \r\nBanta: Oh my God! Did you survive that accident or you died. \r\nSanta: I don''t remember ex', '', 0, 0, 0, 0, 0, 0, '', '');
INSERT INTO `sites` VALUES (126, 'unknown', 52, 'Opposite of Rajeswari \r\n\r\n\r\nRajes Dont Worry \r\n\r\n\r\n\r\n\r\nOpposite of TAJMAHAL \r\n\r\n\r\n\r\n\r\nTAJ DONT MAHAL??? \r\n\r\n\r\nNo \r\n\r\n\r\nSocho \r\nSocho \r\n\r\n\r\n&quot;CHAI KA DHABA&quot;', '', 0, 0, 0, 0, 0, 0, '', '');
INSERT INTO `sites` VALUES (86, 'unknown', 42, 'adminadminadminadmin', '', 0, 0, 0, 0, 0, 0, '', '');
INSERT INTO `sites` VALUES (85, 'asassa', 32, 'sasasa', '', 0, 0, 0, 0, 0, 0, '', '');
INSERT INTO `sites` VALUES (76, '4786', 32, 'admin', '', 0, 0, 0, 0, 0, 0, '', '');
INSERT INTO `sites` VALUES (75, '9194', 32, '919491949194', '', 0, 0, 0, 0, 0, 0, '', '');
INSERT INTO `sites` VALUES (74, 'meta;l', 32, 'phpphp', '', 0, 0, 0, 0, 0, 0, '', '');
INSERT INTO `sites` VALUES (72, 'admin', 21, 'Time would make us 4get some people.. \r\nBut there r some people who make us forget time.. \r\nThey r the ones called \r\nBEST FRIENDS \r\nN that''s \r\n&quot;U&quot; \r\nG.n s.d t.c.$!! \r\n=-=', '', 0, 0, 0, 0, 0, 0, '', '');
INSERT INTO `sites` VALUES (73, 'admin', 32, 'Every day is a blessing, \r\nbut some days \r\nare better than the rest- \r\ndays when God''s \r\nwarmth and love \r\ntouches everything \r\nwith sunshine.. \r\nAnd I hope your birthday \r\nis one of those \r\nblessed a', '', 0, 0, 0, 0, 0, 0, '', '');
INSERT INTO `sites` VALUES (66, 'admin', 32, 'A man was lost alone on an island.. \r\nDecides to build wooden boat. \r\nSudenly a grl comes n d man uses wood 4 making bed. \r\n\r\nMoral-girls change boys aim of life ;)', '', 0, 0, 0, 0, 0, 0, '', '');
INSERT INTO `sites` VALUES (69, 'admin', 31, 'NO n YES r two short words whch need a long thought. Most of d thngs we miss in life are due 2 sayng NO too soon \r\nor YES too late..!', '', 0, 0, 0, 0, 0, 0, '', '');
INSERT INTO `sites` VALUES (70, 'admin', 32, 'Na ZUBAAN se, \r\nNa MANN se, \r\nNa PYAR se, \r\nNa GIFT se, \r\nNa POST se, \r\nOr na EMAIL se, \r\nDirect \r\n\r\n;+&quot;&quot;+.+&quot;&quot;+; \r\n+ DiLsE + \r\n&quot;+ .+&quot; \r\n&quot;+&quot; Happy Birthday \r\n=-=', '', 0, 0, 0, 0, 0, 0, '', '');
INSERT INTO `sites` VALUES (128, '3086', 52, '3086', '', 0, 0, 0, 0, 0, 0, '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `tusers`
-- 

CREATE TABLE `tusers` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL default '',
  `pass` varchar(60) NOT NULL default '',
  `email` varchar(200) NOT NULL default '',
  `admin` int(5) NOT NULL default '0',
  `banned` int(5) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `tusers`
-- 

INSERT INTO `tusers` VALUES (1, 'metal', '86094b61cb9f63b77f982ceae03e95f0', 'metal', 1, 0);

