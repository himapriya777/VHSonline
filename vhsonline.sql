-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2015 at 08:26 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vhsonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_name` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Clothes'),
(2, 'Footwear'),
(3, 'Bedding '),
(4, 'Diapers'),
(5, 'Toys');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_cat` int(100) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_sellprice` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_name`, `product_price`, `product_sellprice`, `product_desc`, `product_image`, `product_keywords`) VALUES
(4, 2, 'foor wear model 1', 14, 12, '<p>test</p>', '23bs.jpg', 'dsd'),
(5, 2, 'footwear model 2', 4, 1, '<p>sds</p>', '23bs.jpg', 'sd dfdf dfd'),
(6, 5, 'toy for baby girl', 25, 10, '<p>this is a good toy for baby boy</p>', 'white-baby-dog-7.jpg', 'tyty'),
(7, 1, 'baby frock', 30, 10, '<p>this i s baby frock</p>', '2_ROSES-babys_breath_227153446_std.jpg', 'baby frock'),
(8, 4, 'baby diapers', 40, 10, '<p>baby diapers</p>', 'pg-5759_100.jpg', 'baby '),
(9, 5, 'bbay gear', 50, 90, '<p>tst baby&nbsp;</p>', 'tz-428_100.jpg', 'baby gear'),
(10, 2, 'baby foot wear shoes', 10, 1, '<p>asas</p>', 'beautiful-flowers-cellphone-wallpapers-6-pclayer.jpg', 'asas');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
