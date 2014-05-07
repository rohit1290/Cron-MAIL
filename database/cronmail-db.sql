-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2014 at 03:15 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cronmail-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_list`
--

CREATE TABLE IF NOT EXISTS `email_list` (
  `enum` int(11) NOT NULL AUTO_INCREMENT,
  `elist` longtext NOT NULL,
  `mnum` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`enum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mail_body`
--

CREATE TABLE IF NOT EXISTS `mail_body` (
  `mnum` int(11) NOT NULL AUTO_INCREMENT,
  `msub` longtext NOT NULL,
  `body` longtext NOT NULL,
  PRIMARY KEY (`mnum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `unsub_list`
--

CREATE TABLE IF NOT EXISTS `unsub_list` (
  `unelist` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
