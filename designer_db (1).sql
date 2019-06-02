-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 30, 2019 at 08:49 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `designer_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`, `image`) VALUES
(1, 'admin', 'admin', 'infoklm@nyesteventuretech.com', '99535f730bbf1945a71a21f3e567a39e31.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_contact`
--

DROP TABLE IF EXISTS `admin_contact`;
CREATE TABLE IF NOT EXISTS `admin_contact` (
  `contact_id` int(10) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`contact_id`),
  KEY `from_id` (`from_id`),
  KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_contact`
--

INSERT INTO `admin_contact` (`contact_id`, `from_id`, `role`, `subject`, `message`, `date`, `status`) VALUES
(11, 38, 2, 'hellooooooooooooooo', 'fgfjgkgl', '18-04-2019 12:46:08', 0),
(12, 37, 1, 'hellooooooooooooooo', 'How are you', '20-04-2019 10:23:56', 1),
(13, 38, 2, 'hellooooooooooooooo', 'Haiiiiiiiiiiiiiiiiiiiiiiiiiii', '20-04-2019 10:25:35', 1),
(14, 38, 2, 'site problem', 'site get hanged', '27-04-2019 13:03:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_reply`
--

DROP TABLE IF EXISTS `admin_reply`;
CREATE TABLE IF NOT EXISTS `admin_reply` (
  `reply_id` int(10) NOT NULL AUTO_INCREMENT,
  `to_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`reply_id`),
  KEY `to_id` (`to_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_reply`
--

INSERT INTO `admin_reply` (`reply_id`, `to_id`, `role`, `subject`, `message`, `date`) VALUES
(1, 38, 2, 'hai', 'hello', '20-04-2019 10:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

DROP TABLE IF EXISTS `approval`;
CREATE TABLE IF NOT EXISTS `approval` (
  `ap_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `material` varchar(100) NOT NULL,
  `colour` varchar(30) NOT NULL,
  `occation` varchar(50) NOT NULL,
  `size` varchar(30) NOT NULL,
  `post_id` int(11) NOT NULL,
  `ap_date` varchar(50) NOT NULL,
  PRIMARY KEY (`ap_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`ap_id`, `from_id`, `to_id`, `material`, `colour`, `occation`, `size`, `post_id`, `ap_date`) VALUES
(2, 37, 38, 'silk', 'blue', 'Party', 'M', 18, '26-04-2019 16:06:38'),
(3, 37, 38, 'silk', 'blue', 'Party', 'M(Medium)', 19, '27-04-2019 09:47:03'),
(4, 37, 38, 'silk', 'blue', 'Casual', 'XS(Extra small)', 19, '27-04-2019 10:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `chat_id` int(10) NOT NULL AUTO_INCREMENT,
  `from` varchar(50) NOT NULL,
  `to` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `sent` varchar(50) NOT NULL,
  `recd` varchar(50) NOT NULL,
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(50) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `addr` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(60) NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `login_id` int(11) NOT NULL,
  PRIMARY KEY (`cust_id`),
  KEY `login_id` (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cname`, `gender`, `dob`, `addr`, `city`, `state`, `pincode`, `phone`, `login_id`) VALUES
(18, 'Reshma R', 'Female', '1995-02-28', 'Reshma Bhavan,Kesavadasapuram', 'Trivandrum', 'Kerala', 695572, 9876543219, 37),
(19, 'Amrutha S', 'Female', '1995-04-05', 'Pattom', 'Trivandrum', 'Kerala', 695578, 9874563201, 39),
(20, 'Mridula', 'Female', '1992-05-12', 'Malayinkil', 'Trivandrum', 'Kerala', 695563, 9874563214, 40),
(21, 'Mridula', 'Female', '1992-03-05', 'Malayinkil', 'Trivandrum', 'Kerala', 695563, 9874563258, 41),
(22, 'Mridula', 'Gender', '1993-04-05', 'Malayinkil', 'Trivandrum', 'Kerala', 695563, 9874563245, 42),
(23, 'Mridula', 'Gender', '1992-04-05', 'Malayinkil', 'Trivandrum', 'Kerala', 695563, 9874563789, 43),
(24, 'x', 'Female', '2019-04-25', 'tryetrsewertyr', 'wqetrd', 'eet', 124556, 1234556671, 44),
(25, 'xdfghjk', 'Male', '1970-01-01', 'bjb', 'g', 'eet', 124556, 6557879848, 45),
(26, 'asd', 'Female', '2019-04-24', 'dfg hj', 'wqetrd', 'rrrtyty', 123453, 1234512345, 46),
(27, 'nn', 'Male', '2019-04-26', 'bb', 'hh', 'jj', 796555, 4445555699, 47);

-- --------------------------------------------------------

--
-- Table structure for table `cust_contact`
--

DROP TABLE IF EXISTS `cust_contact`;
CREATE TABLE IF NOT EXISTS `cust_contact` (
  `decnid` int(10) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`decnid`),
  KEY `did` (`from_id`),
  KEY `to_id` (`to_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_contact`
--

INSERT INTO `cust_contact` (`decnid`, `from_id`, `to_id`, `role`, `subject`, `message`, `date`) VALUES
(1, 37, 38, 2, 'hellooooooooooooooo', 'How are youuuuuuuuuuuuuuu', '20-04-2019 10:24:23'),
(2, 37, 38, 2, 'greeting', 'Your designs are good', '27-04-2019 12:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

DROP TABLE IF EXISTS `design`;
CREATE TABLE IF NOT EXISTS `design` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `dname` varchar(40) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `exp` bigint(20) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `dimage` varchar(50) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `login_id` int(11) NOT NULL,
  PRIMARY KEY (`did`),
  KEY `login_id` (`login_id`),
  KEY `login_id_2` (`login_id`),
  KEY `login_id_3` (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`did`, `dname`, `addr`, `city`, `state`, `pincode`, `exp`, `phone`, `dimage`, `desc`, `link`, `login_id`) VALUES
(18, 'Aham', 'Kowdiar', 'Trivandrum', 'Kerala', 695572, 3, 9876375821, 'aham21.jpg', 'Aham Boutiques', 'aham.com', 38);

-- --------------------------------------------------------

--
-- Table structure for table `de_contact`
--

DROP TABLE IF EXISTS `de_contact`;
CREATE TABLE IF NOT EXISTS `de_contact` (
  `custcnid` int(10) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`custcnid`),
  KEY `to_id` (`to_id`),
  KEY `from_id` (`from_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `de_contact`
--

INSERT INTO `de_contact` (`custcnid`, `from_id`, `to_id`, `role`, `subject`, `message`, `date`) VALUES
(1, 38, 37, 2, 'hellooooooooooooooo', 'Haiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', '20-04-2019 10:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `de_reply`
--

DROP TABLE IF EXISTS `de_reply`;
CREATE TABLE IF NOT EXISTS `de_reply` (
  `re_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `re_date` varchar(50) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`re_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `de_reply`
--

INSERT INTO `de_reply` (`re_id`, `from_id`, `to_id`, `subject`, `message`, `price`, `re_date`, `post_id`) VALUES
(10, 38, 37, 'designing your dress', 'Willing to design your dream gown', 3000, '27-04-2019 12:43:30', 20),
(9, 38, 37, 'Hi', 'Ok I can do this.', 4000, '27-04-2019 09:46:13', 19);

-- --------------------------------------------------------

--
-- Table structure for table `dress`
--

DROP TABLE IF EXISTS `dress`;
CREATE TABLE IF NOT EXISTS `dress` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `dressname` varchar(100) NOT NULL,
  `dtype` varchar(50) NOT NULL,
  `pdesc` varchar(200) NOT NULL,
  `material` varchar(30) NOT NULL,
  `colour` varchar(30) NOT NULL,
  `occation` varchar(50) NOT NULL,
  `price` bigint(20) NOT NULL,
  `dress` varchar(100) NOT NULL,
  `cdate` varchar(50) NOT NULL,
  `login_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `login_id` (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dress`
--

INSERT INTO `dress` (`item_id`, `dressname`, `dtype`, `pdesc`, `material`, `colour`, `occation`, `price`, `dress`, `cdate`, `login_id`, `status`) VALUES
(31, 'Salwar', 'salwar kameez', 'dfghjkl;ftryuitdlgkbcnhgbk', 'Silk', 'Red', 'Party', 2000, '11519378307416-AKS-Women-Navy--Off-White-Printed-Straight-Kurta-9971519378307264-4.jpg', '17-04-2019 14:09:17', 38, 1),
(34, 'Gown', 'Gown', 'Pink kurti', 'Silk', 'Pink', 'Casual', 4500, 'pink1.jpg', '17-04-2019 16:01:47', 38, 1),
(35, 'Salwar', 'salwar kameez', 'Red and black colour combination ', 'Silk', 'Red', 'Casual', 2500, 'red3.jpg', '17-04-2019 16:03:59', 38, 1),
(36, 'Red saree', 'Saree', 'Beautiful red colored saree with golden printed design', 'silk', 'red', 'Casual', 5000, 'czarina1.jpg', '27-04-2019 12:51:00', 38, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dresses`
--

DROP TABLE IF EXISTS `dresses`;
CREATE TABLE IF NOT EXISTS `dresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dname` varchar(30) NOT NULL,
  `pdesc` varchar(200) NOT NULL,
  `dimage1` varchar(100) NOT NULL,
  `dimage2` varchar(100) NOT NULL,
  `dimage3` varchar(100) NOT NULL,
  `login_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_time` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dresses`
--

INSERT INTO `dresses` (`id`, `dname`, `pdesc`, `dimage1`, `dimage2`, `dimage3`, `login_id`, `item_id`, `status`, `created_time`) VALUES
(14, 'Salwar', 'A beautiful salwar with colour comination of black and white', 'white2.jpg', 'white3.jpg', 'white1.jpg', 38, 31, 1, '2019-04-17 04:59:44'),
(15, 'Gown', 'Pink beautiful Gown', 'pink11.jpg', 'pink2.jpg', 'pink3.jpg', 38, 34, 1, '2019-04-17 05:02:49'),
(16, 'Salwar', 'Red and black colour combination Salwar ', 'red1.jpg', 'red2.jpg', 'red31.jpg', 38, 35, 1, '2019-04-17 05:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `dresstype_tbl`
--

DROP TABLE IF EXISTS `dresstype_tbl`;
CREATE TABLE IF NOT EXISTS `dresstype_tbl` (
  `dress_id` int(10) NOT NULL AUTO_INCREMENT,
  `dressname` varchar(50) NOT NULL,
  PRIMARY KEY (`dress_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dresstype_tbl`
--

INSERT INTO `dresstype_tbl` (`dress_id`, `dressname`) VALUES
(1, 'Kurti'),
(2, 'Saree'),
(3, 'Churidar'),
(4, 'Gown'),
(5, 'Kurtha'),
(6, 'stall'),
(7, 'Skirt'),
(8, 'salwar kameez');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`login_id`),
  KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `email`, `pass`, `role`, `status`) VALUES
(37, 'reshmar@gmail.com', 'Reshma1234', 1, 1),
(38, 'aham@gmail.com', 'Aham12345', 2, 1),
(39, 'amrutha@gmail.com', 'Amrutha123', 1, 1),
(44, 'a@gfh', '123@Pass', 1, 1),
(45, 'gg@gh', 'Chai@123', 1, 1),
(46, 'abc@g', 'P@ssw0rd', 1, 1),
(47, 'mk@l', 'Klm@1234', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

DROP TABLE IF EXISTS `order_tbl`;
CREATE TABLE IF NOT EXISTS `order_tbl` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `item_id` (`item_id`),
  KEY `user_id` (`user_id`),
  KEY `did` (`did`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `item_id`, `user_id`, `status`, `did`, `date`) VALUES
(6, 34, 37, 0, 38, '18-04-2019 12:56:33'),
(7, 35, 37, 0, 38, '27-04-2019 12:52:47'),
(8, 31, 37, 0, 38, '27-04-2019 15:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(100) NOT NULL,
  `material` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `pimage` varchar(30) NOT NULL,
  `likes` int(20) NOT NULL,
  `login_id` int(11) NOT NULL,
  `postdate` varchar(50) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `login_id` (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post`, `material`, `price`, `pimage`, `likes`, `login_id`, `postdate`) VALUES
(18, 'i want a yellow dress', '', '', 'designer_kurti2.jpg', 0, 37, '26-04-2019 12:16:50'),
(19, 'I want a Blue lehenga', '', '', 'abc1.jpg', 0, 37, '27-04-2019 09:44:50'),
(20, 'Want a red floral gown', '', '', 'floral_gown3.jpg', 0, 37, '27-04-2019 12:26:29'),
(21, 'I want a gown like this...!', 'Cotton Silk', '2000-3000', 'orange.jpg', 0, 37, '30-04-2019 13:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

DROP TABLE IF EXISTS `rent`;
CREATE TABLE IF NOT EXISTS `rent` (
  `rent_id` int(11) NOT NULL AUTO_INCREMENT,
  `dressname` varchar(100) NOT NULL,
  `dtype` varchar(50) NOT NULL,
  `pdesc` varchar(200) NOT NULL,
  `material` varchar(30) NOT NULL,
  `colour` varchar(30) NOT NULL,
  `occation` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `price` bigint(20) NOT NULL,
  `cdate` varchar(50) NOT NULL,
  `login_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `dimage1` varchar(100) NOT NULL,
  `dimage2` varchar(100) NOT NULL,
  `dimage3` varchar(100) NOT NULL,
  PRIMARY KEY (`rent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rent_id`, `dressname`, `dtype`, `pdesc`, `material`, `colour`, `occation`, `size`, `price`, `cdate`, `login_id`, `status`, `dimage1`, `dimage2`, `dimage3`) VALUES
(1, 'Gown', 'Gown', 'Beautiful', 'shiffon', 'blue', 'Party', 'M', 3000, '23-04-2019 14:47:23', 38, 1, 'blue_gown4.jpg', 'baby_gown4.jpg', 'blue_gown5.jpg'),
(2, 'Blue saree', 'Saree', 'Blue colored saree with light golden border', 'shiffon', 'blue', 'Party', 'M(Medium)', 2000, '27-04-2019 13:00:58', 38, 1, 'abc2.jpg', 'abc21.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `rent_wish`
--

DROP TABLE IF EXISTS `rent_wish`;
CREATE TABLE IF NOT EXISTS `rent_wish` (
  `wrent_id` int(11) NOT NULL AUTO_INCREMENT,
  `rent_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `wdate` varchar(50) NOT NULL,
  PRIMARY KEY (`wrent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
CREATE TABLE IF NOT EXISTS `usertype` (
  `type_id` int(10) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`type_id`, `type_name`) VALUES
(1, 'Customer'),
(2, 'Designer');

-- --------------------------------------------------------

--
-- Table structure for table `wish`
--

DROP TABLE IF EXISTS `wish`;
CREATE TABLE IF NOT EXISTS `wish` (
  `wish_id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` int(11) NOT NULL,
  `userid` int(20) NOT NULL,
  `status` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `wishdate` varchar(50) NOT NULL,
  PRIMARY KEY (`wish_id`),
  KEY `itemid` (`itemid`,`did`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wish`
--

INSERT INTO `wish` (`wish_id`, `itemid`, `userid`, `status`, `did`, `wishdate`) VALUES
(50, 2, 37, 0, 38, '30-04-2019 13:59:55');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
