-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2019 at 04:42 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `youtube_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `city` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `rank`, `company`, `dob`, `city`, `address`, `email`, `contactno`, `image`) VALUES
(1, 'Yoon Wadi Phyo', 'kaungsanhein', 'CEO', 'yoonwadiphyo', '1998-07-29', 'Mandalay', '33 street/84*85', 'yoonwadiphyo@gmail.com', '09402658590', 'received_656129624745308.jpeg'),
(2, 'Kaung San Hein', 'yoonwadiphyo', 'CEO', 'kaungsanhein', '1998-12-07', 'Mandalay', '35*90 street', 'kaungsanhein2019@gmail.com', '09782696857', '7e1aeb71869898a86b008aa5f1d07654B612_20170328_145843.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Ladies Clothes'),
(2, 'Gents Clothes'),
(5, 'shirt'),
(6, 'Gent Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_address`
--

CREATE TABLE IF NOT EXISTS `checkout_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `checkout_address`
--

INSERT INTO `checkout_address` (`id`, `firstname`, `lastname`, `email`, `address`, `city`, `pincode`, `contactno`) VALUES
(1, 'kaung san', 'hein', 'kaungsanhein2019@gmail.com', 'mdy', 'Mdy', '091234', '09782696857'),
(2, 'yoon wadi', 'phyo', 'yoonwadiphyo@gmail.com', 'ygn', 'yangon', '0982', '09402658590'),
(3, 'kaung san', 'hein', 'kaungsanhein2019@gmail.com', 'mdy', 'Mandalay', '091234', '09782696857'),
(4, 'Khant', 'Maw', 'khant@gamil.com', 'Ygn', 'yangon', '1234', '0987523456'),
(8, 'yoon wadi', 'phyo', 'yoonwadiphyo@gmail.com', 'mdy', 'Mandalay', '8765', '09128765'),
(10, 'U Kyaw San', 'San', 'kyawsan@gmail.com', 'mdy', 'Mandalay', '1234', '09974281601'),
(11, 'Yoon Yoon', 'Wadi', 'yoonyoon@gmail.com', 'Mdy', 'Mdy', '0987', '120983234'),
(12, 'kkk', 'kkk', 'khant@gamil.com', 'lk', 'ik', '209', '378'),
(13, 'df', 'df', 'df', 'df', 'df', '098', '7654'),
(14, 'kaung', 'hein', 'kaungsanhein2019@gmail.com', 'Mdy', 'Mandalay', '123456', '6109283928'),
(15, 'yy', 'yy', 'yy@gmail.com', 'mdy', 'Mandalay', '892398', '0987654321'),
(16, 'a', 'b', 'aaa@gmail.com', 'bg', 'de', '123456', '1234567890'),
(17, 'kyi', 'aye', 'kyiaye@gmail.com', '12*19', 'Mandalay', '498398', '0987654321'),
(18, 'ab', 'cd', 'adba@gmail.com', 'mdy', 'Mandalay', '123678', '0987654321'),
(19, 'kau', 'ng', 'kaung@gmail.com', 'yuisn', 'toaols', '098734', '2345678901'),
(20, 'ab', 'ba', 'abba@gmail.com', 'iuos', 'locloxv', '098762', '1234567890'),
(21, 'kyaw', 'san', 'kyawsan@gmail.com', 'yiosnd', 'clsoldo', '091287', '8749234567'),
(22, 'b', 'a', 'ba@gmail.com', 'iyos', 'eoirc', '125647', '0912876532'),
(23, 'bx', 'cd', 'bxcd@gmail.com', 'uos', 'cxoc', '987903', '8490273883'),
(24, 'mn', 'nb', 'bh@gmail.com', 'idos', 'bsd', '123456', '4532678901'),
(25, 'cv', 'cv', 'cv@gmail.com', 'awe', 'dfr', '236748', '2673487689'),
(26, 'fg', 'f', 'abba@gmail.com', 'qw', 'er', '124589', '2345678234');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_order_address`
--

CREATE TABLE IF NOT EXISTS `confirm_order_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `confirm_order_address`
--

INSERT INTO `confirm_order_address` (`id`, `firstname`, `lastname`, `email`, `address`, `city`, `pincode`, `contactno`) VALUES
(14, 'a', 'b', 'aaa@gmail.com', 'bg', 'de', '123456', '1234567890'),
(15, 'kyi', 'aye', 'kyiaye@gmail.com', '12*19', 'Mandalay', '498398', '0987654321'),
(16, 'ab', 'cd', 'adba@gmail.com', 'mdy', 'Mandalay', '123678', '0987654321'),
(17, 'kau', 'ng', 'kaung@gmail.com', 'yuisn', 'toaols', '098734', '2345678901'),
(18, 'ab', 'ba', 'abba@gmail.com', 'iuos', 'locloxv', '098762', '1234567890'),
(19, 'kyaw', 'san', 'kyawsan@gmail.com', 'yiosnd', 'clsoldo', '091287', '8749234567'),
(20, 'b', 'a', 'ba@gmail.com', 'iyos', 'eoirc', '125647', '0912876532'),
(21, 'bx', 'cd', 'bxcd@gmail.com', 'uos', 'cxoc', '987903', '8490273883'),
(22, 'mn', 'nb', 'bh@gmail.com', 'idos', 'bsd', '123456', '4532678901'),
(23, 'cv', 'cv', 'cv@gmail.com', 'awe', 'dfr', '236748', '2673487689'),
(24, 'fg', 'f', 'abba@gmail.com', 'qw', 'er', '124589', '2345678234');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_order_product`
--

CREATE TABLE IF NOT EXISTS `confirm_order_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `product_total` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `confirm_order_product`
--

INSERT INTO `confirm_order_product` (`id`, `order_id`, `product_name`, `product_price`, `product_qty`, `product_image`, `product_total`, `status`) VALUES
(1, 1, 'Gents Clothes', 450, 2, '973db8443b8cb537208ba772e67cddc2gallery2.jpg', 900, 0),
(2, 1, 'Gents Clothes', 460, 1, 'd48611bd3fd172734866b74058865776product2.jpg', 460, 0),
(3, 2, 'ladies dress', 300, 3, '4f12801f1d7c0e36884fdb82182ea9d5girl2.jpg', 900, 0),
(4, 3, 'ladies dress', 300, 3, '4f12801f1d7c0e36884fdb82182ea9d5girl2.jpg', 900, 0),
(7, 8, 'ladies dress', 760, 2, '91a68c732e09ffc1bc31c3610d33d273product3.jpg', 1520, 1),
(8, 8, 'Gents Clothes', 460, 1, 'd48611bd3fd172734866b74058865776product2.jpg', 460, 1),
(9, 8, 'testing', 200, 1, '08b87b94d946367241dc8ea1ba77dde1D1GL2xpX4AACmhy.jpg', 200, 0),
(16, 14, 'Ladies Clothes', 200, 1, '16945365c7d1dd79bb8fc90be544a66bgallery3.jpg', 200, 1),
(17, 15, 'hiov', 69, 1, '1a9876e19fac230271fcf663f8a8c564man-one.jpg', 69, 0),
(18, 15, 'D2', 1200, 2, 'b740d4ad586bda8bf54e98074f0f3e21recommend3.jpg', 2400, 1),
(19, 16, 'uik', 89, 2, '3abfeb29d871d98b966a2d02e5e3a37asimilar3.jpg', 178, 0),
(20, 17, 'D2', 1200, 3, 'b740d4ad586bda8bf54e98074f0f3e21recommend3.jpg', 3600, 0),
(21, 17, 'OMG', 1200, 2, '2b8a126bef7fbe134b78b994cd161713gallery2.jpg', 2400, 0),
(22, 17, 'Nice', 109, 5, '68794c91edb22404e0e409069d094b69man-two.jpg', 545, 0),
(23, 18, 'D2', 1200, 2, 'b740d4ad586bda8bf54e98074f0f3e21recommend3.jpg', 2400, 0),
(24, 18, 'OMG', 1200, 3, '2b8a126bef7fbe134b78b994cd161713gallery2.jpg', 3600, 0),
(25, 18, 'Nice', 109, 3, '68794c91edb22404e0e409069d094b69man-two.jpg', 327, 0),
(26, 19, 'Nice', 109, 1, '68794c91edb22404e0e409069d094b69man-two.jpg', 109, 1),
(27, 20, 'uik', 89, 2, '3abfeb29d871d98b966a2d02e5e3a37asimilar3.jpg', 178, 0),
(28, 21, 'OMG', 1200, 1, '2b8a126bef7fbe134b78b994cd161713gallery2.jpg', 1200, 0),
(29, 22, 'uik', 89, 1, '3abfeb29d871d98b966a2d02e5e3a37asimilar3.jpg', 89, 0),
(30, 22, 'hiov', 69, 1, '1a9876e19fac230271fcf663f8a8c564man-one.jpg', 69, 0),
(31, 23, 'OMG', 1200, 10, '2b8a126bef7fbe134b78b994cd161713gallery2.jpg', 12000, 0),
(32, 23, 'D2', 1200, 2, 'b740d4ad586bda8bf54e98074f0f3e21recommend3.jpg', 2400, 0),
(33, 23, 'uik', 89, 2, '3abfeb29d871d98b966a2d02e5e3a37asimilar3.jpg', 178, 0),
(34, 23, 'hiov', 69, 1, '1a9876e19fac230271fcf663f8a8c564man-one.jpg', 69, 0),
(35, 23, 'Nice', 109, 1, '68794c91edb22404e0e409069d094b69man-two.jpg', 109, 0),
(36, 23, 'Ladies Clothes', 200, 1, '52b56dc1fe8ac616fd529b3a0608d2f6girl3.jpg', 200, 0),
(37, 23, 'Ladies Clothes', 120, 3, 'fd52f4ea50ad9d3eac3df5b9772b699fD1GL2xpX4AACmhy.jpg', 360, 0),
(38, 23, 'Ladies Shoes', 100, 1, 'fb32b615f97cd7332a3071e718aef227man-three.jpg', 100, 0),
(39, 24, 'OMG', 1200, 1, '2b8a126bef7fbe134b78b994cd161713gallery2.jpg', 1200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feed_back`
--

CREATE TABLE IF NOT EXISTS `feed_back` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `feedback` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `feed_back`
--

INSERT INTO `feed_back` (`id`, `name`, `email`, `feedback`) VALUES
(1, 'Kaung', 'kaungsanhein2019@gmail.com', 'Very good'),
(2, 'yoon wadi', 'yoonwadi@gmail.com', 'very nice'),
(3, 'khant', 'khant@gamil.com', 'very nice'),
(4, 'khant', 'khant@gamil.com', 'very nice');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(150) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_qty`, `product_image`, `category_id`, `product_description`) VALUES
(12, 'Ladies Clothes', 200, 99, '52b56dc1fe8ac616fd529b3a0608d2f6girl3.jpg', 5, 'very nice'),
(13, 'Ladies Clothes', 120, 9, 'fd52f4ea50ad9d3eac3df5b9772b699fD1GL2xpX4AACmhy.jpg', 2, 'nice!'),
(19, 'Ladies Shoes', 100, 49, 'fb32b615f97cd7332a3071e718aef227man-three.jpg', 2, 'very good'),
(20, 'Nice', 109, 20, '68794c91edb22404e0e409069d094b69man-two.jpg', 2, 'nice'),
(22, 'hiov', 69, 28, '1a9876e19fac230271fcf663f8a8c564man-one.jpg', 1, 'so slodfi lsodifl clovl '),
(23, 'uik', 89, 33, '3abfeb29d871d98b966a2d02e5e3a37asimilar3.jpg', 2, 'niveuun,'),
(24, 'OMG', 1200, 83, '2b8a126bef7fbe134b78b994cd161713gallery2.jpg', 1, 'very nice'),
(25, 'D2', 1200, 5, 'b740d4ad586bda8bf54e98074f0f3e21recommend3.jpg', 5, 'D2 shirt is very nice');
