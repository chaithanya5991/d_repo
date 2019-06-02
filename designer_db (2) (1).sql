-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2018 at 01:33 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`, `image`) VALUES
(1, 'admin', 'admin', 'infoklm@nyesteventuretech.com', 'user1.png');

-- --------------------------------------------------------

--
-- Table structure for table `admin_contact`
--

CREATE TABLE `admin_contact` (
  `contact_id` int(10) NOT NULL,
  `from_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_contact`
--

INSERT INTO `admin_contact` (`contact_id`, `from_id`, `role`, `subject`, `message`, `date`, `status`) VALUES
(4, 10, 1, 'udhwdifiwjf', 'fwegfuhwef,ewfioweuihfiwe,fiweufiew\r\ndfywegifw,ifgyweuhfiwe\r\nfbhywehflwe', '12-07-2018 14:28:54', 1),
(5, 10, 1, 'ksbgfudhvodw', 'bvfvweifjwef,iweggfiwoekf,wefywheofkwefwelbfwhe\r\ndfvweifwfwviwj,eifiwel\r\ndvuwijowlef,ohuwehfw', '12-07-2018 14:29:13', 1),
(6, 24, 2, 'ewfwefwef', 'vcwjfwe,woeigfyweuhv,weovigweyuvhwe,wehfe\r\nkhivhivgvgduvd,oivybndnvdbv\r\nvugdvhisdjviosd', '12-07-2018 14:30:01', 1),
(7, 24, 2, 'dbvuduvsd', 'qfyewfuhwefiwef,weofwehviwe,powehviw,vowhvjw\r\nvwueghviw,vowehuvhw,vwoehvuhweiv\r\nnvuigwiv,whvuhewijvowd', '12-07-2018 14:30:19', 1),
(8, 10, 1, 'about the website', 'it is very nice and easy to use ,user friendly designs \r\nand a good platform for both designers and customers', '13-07-2018 11:15:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_reply`
--

CREATE TABLE `admin_reply` (
  `reply_id` int(10) NOT NULL,
  `to_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_reply`
--

INSERT INTO `admin_reply` (`reply_id`, `to_id`, `role`, `subject`, `message`, `date`) VALUES
(3, 24, 2, 'jhfdtyyu', 'jftfugdggho,nuf6guhk,jdthyfk\r\ndygihugghg,utfh,nydt', '18-07-2018 11:21:41'),
(4, 10, 1, 'gfyfyybgc6 ttdtdtdgc', 'sdyfscbscguwefpke vyweufgweif,efwgeufhwiehvw,neeguwehf\r\neefywef weyvuwebc weugcywevhwe,yvcuew whwvvywe', '18-07-2018 11:22:18'),
(5, 10, 1, 'gdfgdfgk', 'jhuh', '18-07-2018 12:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(10) NOT NULL,
  `from` varchar(50) NOT NULL,
  `to` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `sent` varchar(50) NOT NULL,
  `recd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `addr` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(60) NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cname`, `gender`, `dob`, `addr`, `city`, `state`, `pincode`, `phone`, `login_id`) VALUES
(1, 'gfgg', 'mnj', '2018-05-02', 'kjk', 'fxd', 'cvx', 435353, 1234567891, 0),
(2, 'sdfds', 'Male', '2018-05-10', ' dfgd', 'dfg', 'ytrtuh', 878787, 4354356346, 0),
(3, 'sdfds', 'Male', '2018-05-10', ' dfgd', 'dfg', 'ytrtuh', 878787, 4354356346, 0),
(4, 'sdfds', 'Male', '2018-05-10', ' dfgd', 'dfg', 'ytrtuh', 878787, 4354356346, 0),
(5, 'hgh', 'Male', '2018-05-08', ' hjgy', 'Kollam', 'Kerala', 887766, 4535345345, 0),
(6, 'jojjj', 'Male', '2018-05-08', ' ghgb', 'Kollam', 'Kerala', 887766, 4535345345, 0),
(7, 'fddgfd', 'Male', '2018-05-15', ' ghbgf', 'Kollam', 'Kerala', 887766, 4535345345, 1),
(8, 'fgf', 'Male', '2018-05-16', ' dfd', 'Kollam', 'Kerala', 556666, 7777777777, 4),
(9, 'hgf', 'Male', '2018-05-10', ' gfh gfhfg', 'Kollam', 'Kerala', 111111, 1111111111, 5),
(10, 'gg ', 'Male', '2018-05-11', ' bnmjgh gvhngf', 'KOLLam  ', 'kjhj', 878999, 4444444444, 6),
(11, 'BiN', 'Male', '1994-05-25', 'mgdfsebfj,jrgfgeufhe,nfuvgsuhg,klll', 'Kollam', 'Kerala', 654321, 6788876656, 10),
(12, 'sandhya', 'Female', '1994-06-05', 'hgsaysa,hcagdv', 'kollam', 'kerala', 691650, 2546162510, 25);

-- --------------------------------------------------------

--
-- Table structure for table `cust_contact`
--

CREATE TABLE `cust_contact` (
  `decnid` int(10) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_contact`
--

INSERT INTO `cust_contact` (`decnid`, `from_id`, `to_id`, `role`, `subject`, `message`, `date`) VALUES
(2, 10, 24, 0, 'sdsdsd', 'gyguhueif,hruirgherughuer,guhrg\r\nhgureghierjgighruehgier\r\nrbgureug', '13-07-2018 08:17:36'),
(3, 10, 24, 2, 'sdsdsd', 'dtfyudhweif,jgfwgufwhef,fugewufhiwe\r\nfuewhfiw,ihweihfiwef\r\nfgvwefw', '12-07-2018 14:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `did` int(11) NOT NULL,
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
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`did`, `dname`, `addr`, `city`, `state`, `pincode`, `exp`, `phone`, `dimage`, `desc`, `link`, `login_id`) VALUES
(10, 'Praduh', 'Praduh Conture', 'Kollam', 'Kerala', 777777, 3, 7543332322, 'd1`.jpg', 'Exclusive designs', '', 17),
(11, 'Pranah', ' Pranah Boutique', 'Kollam', 'Kerala', 666666, 4, 5555555555, 'd2.jpg', 'Unique designs', '', 18),
(12, 'Style Boutique', 'Style Boutique Karunagappally', 'Kollam', 'Kerala', 432156, 2, 8534323121, 'a.jpg', 'High Quality designs', 'www.style.in', 24),
(13, 'Art Designes', 'dieetgfue,fgyegfw,no15/2454fygfuewhf,india', 'gwydg', 'duqgd', 283156, 5, 2556896242, 'D9.jpg', 'dyfyugfiuwef,ewhfuwegufhe', '', 27);

-- --------------------------------------------------------

--
-- Table structure for table `de_contact`
--

CREATE TABLE `de_contact` (
  `custcnid` int(10) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `de_contact`
--

INSERT INTO `de_contact` (`custcnid`, `from_id`, `to_id`, `role`, `subject`, `message`, `date`) VALUES
(2, 24, 10, 2, 'kut56r7uy', 'jhftgjfgfh', '14-07-2018 14:31:35'),
(3, 24, 10, 2, ',hdyreufoeyy', 'fdhuetfefe\r\n\r\negfuepfe\r\nf', '14-07-2018 14:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `dress`
--

CREATE TABLE `dress` (
  `item_id` int(11) NOT NULL,
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
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dress`
--

INSERT INTO `dress` (`item_id`, `dressname`, `dtype`, `pdesc`, `material`, `colour`, `occation`, `price`, `dress`, `cdate`, `login_id`, `status`) VALUES
(3, 'kurta jacket with palazzo', 'Kurti', 'Featuring a pale grey mandarin collar full sleeved kurta jacket based in chanderi brocade.', 'Fabric: Chanderi brocade, Shim', 'Pale grey', 'Party', 40000, 'd1.JPG', '0000-00-00', 18, 1),
(4, 'Woven Kurti', 'Kurti', 'Straight fit\r\nWaist length\r\nHand wash separately, do not bleach, do not wring, line dry, assorted trims, use mild, detergent, low iron', ' Cotton with three quarter sle', 'Ivory', 'Casual', 3500, 'd11.jpg', '0000-00-00', 18, 1),
(5, 'Straight Cotton Kurti', 'Kurti', 'Waist length\r\nHand wash separately, do not bleach, do not wring, line dry, assorted trims, use mild, detergent, low iron', 'Cotton with long sleeve', 'Aqua', 'Casual', 4200, 'd12.jpg', '0000-00-00', 18, 1),
(6, 'Cotton Unstitched Salwar Kameez', 'Churidar', 'Unstitched Fabric: Cotton Top-2.5 Meters, Cotton Bottom-2 Meters And Cotton Dupatta-2.25 Meters', 'Beautiful Unstitched Cotton Pr', 'Black', 'Party', 2999, 'd13.jpg', '0000-00-00', 18, 1),
(7, 'Ball Gown Princess Prom Dresses', 'Gown', 'Victorian Formal gowns for masquerade Ball', 'Fabric:Lace,Sequins', 'Red', 'Party', 33000, 'd14.jpg', '0000-00-00', 18, 1),
(11, 'Crepe Silk Saree', 'Saree', 'The Stylish And Elegant Saree In Green Colour Looks Stunning And Gorgeous With Trendy And Fashionable Fabric Looks Extremely Attractive And Can Add Charm To Any Occasion.', 'Crepe', 'Green', 'Party', 35000, 'd15.jpg', '2018-05-30', 18, 1),
(12, 'Blue Printed Round Neck Kurta', 'Kurti', 'This blue round neck full sleeve kurta has printed detail, keyhole opening on the front and flared hem.', 'Viscose', 'Blue', 'Party', 2310, 'd16.jpg', '2018-05-31', 17, 1),
(13, 'PINK UNIQUE GEORGETTE SAREE', 'Saree', 'Party wear georgettee Saree', 'Georgette', 'Pink', 'Party', 7689, 'd17.jpg', '2018-05-31', 17, 1),
(17, 'Blue Printed Round Neck Kurta', 'Churidar', 'Good quALITY', 'Cotton', 'Black', 'Casual', 4246, 'd18.jpg', '2018-06-05', 18, 1),
(18, ' Ladies Modern Silk Sarees', 'Saree', 'Aimed at a prosperous growth in this domain, we are engaged in offering an excellent quality range of Ladies Modern Silk Sarees.', 'Silk', 'Peach', 'Party', 1299, 'D19.jpg', '2018-06-05', 18, 1),
(19, 'Ball Gown', 'Gown', 'Ball Gown Off-the-Shoulder Sleeveless Floor-Length Lace Satin Dresses', 'Satin', 'Dark Green', 'Party', 10000, 'd20.jpg', '2018-06-05', 24, 1),
(20, 'Applique Tulle Dresses', 'Gown', 'Ball Gown Sleeveless Jewel Floor-Length Applique Tulle Dresses', 'Tulle', '	Light Sky Blue', 'Party', 5000, 'd21.jpg', '2018-06-05', 24, 1),
(21, 'Readymade Salwar Suit & Dupatta', 'Churidar', 'Readymade Salwar Suit & Dupatta', ' Faux Georgette', 'Peach', 'Party', 6500, 'd22.jpg', '2018-06-05', 24, 1),
(22, 'Stylish Gown', 'Gown', 'gf6weufi,fwefweguf,dfyeyfgweu\r\ndyfegfieu vhds', 'silk', 'White', 'Party', 45000, 'd31.jpg', '09-07-2018 10:45:52', 24, 1),
(23, 'Stylish Stall', 'stall', 'mhu', 'silk', 'White', 'Casual', 450, '91M-AUx7XXL__UX342_.jpg', '18-07-2018 12:08:00', 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dresstype_tbl`
--

CREATE TABLE `dresstype_tbl` (
  `dress_id` int(10) NOT NULL,
  `dressname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dresstype_tbl`
--

INSERT INTO `dresstype_tbl` (`dress_id`, `dressname`) VALUES
(1, 'Kurti'),
(2, 'Saree'),
(3, 'Churidar'),
(4, 'Gown'),
(5, 'Kurtha'),
(6, 'stall');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `email`, `pass`, `role`, `status`) VALUES
(10, 'bin@gmail.com', 'Bin23456', 1, 1),
(17, 'praduh@gmail.com', 'Prad123456', 2, 1),
(18, 'prananh@gmail.com', 'Pran123456', 2, 1),
(24, 'style@gmail.com', 'Style123', 2, 1),
(25, 'bint@gmail.com', 'Ab123456', 1, 1),
(27, 'artdesign@gmail.com', 'Mlm123456', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(10) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `item_id`, `user_id`, `status`, `did`, `date`) VALUES
(1, 20, 10, 0, 24, '0-00-0000'),
(2, 19, 10, 0, 24, '09-07-2018 13:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post` varchar(100) NOT NULL,
  `pimage` varchar(30) NOT NULL,
  `likes` int(20) NOT NULL,
  `login_id` int(11) NOT NULL,
  `postdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post`, `pimage`, `likes`, `login_id`, `postdate`) VALUES
(2, 'I want a bridal dress like this', 'd5.jpg', 0, 10, '12-06-2018'),
(3, 'waNT A cHURIDAR LIKE THIS', 'chh1.png', 0, 10, '18-06-2018'),
(4, 'Want a bridal dress ', 'd14.jpg', 0, 10, '06-07-2018'),
(5, 'WAnt a bridal dress for my wedding', 'd4.jpg', 0, 10, '08-06-2018');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `type_id` int(10) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `wish` (
  `wish_id` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `userid` int(20) NOT NULL,
  `status` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `wishdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wish`
--

INSERT INTO `wish` (`wish_id`, `itemid`, `userid`, `status`, `did`, `wishdate`) VALUES
(22, 5, 10, 0, 18, '12-06-2018'),
(29, 19, 24, 0, 24, '16-06-2018'),
(31, 18, 10, 0, 18, '09-07-2018 13:11:54'),
(32, 22, 10, 1, 24, '11-07-2018 09:43:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_contact`
--
ALTER TABLE `admin_contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `from_id` (`from_id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `admin_reply`
--
ALTER TABLE `admin_reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `to_id` (`to_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `cust_contact`
--
ALTER TABLE `cust_contact`
  ADD PRIMARY KEY (`decnid`),
  ADD KEY `did` (`from_id`),
  ADD KEY `to_id` (`to_id`);

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`did`),
  ADD KEY `login_id` (`login_id`),
  ADD KEY `login_id_2` (`login_id`),
  ADD KEY `login_id_3` (`login_id`);

--
-- Indexes for table `de_contact`
--
ALTER TABLE `de_contact`
  ADD PRIMARY KEY (`custcnid`),
  ADD KEY `to_id` (`to_id`),
  ADD KEY `from_id` (`from_id`);

--
-- Indexes for table `dress`
--
ALTER TABLE `dress`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `dresstype_tbl`
--
ALTER TABLE `dresstype_tbl`
  ADD PRIMARY KEY (`dress_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`wish_id`),
  ADD KEY `itemid` (`itemid`,`did`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_contact`
--
ALTER TABLE `admin_contact`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `admin_reply`
--
ALTER TABLE `admin_reply`
  MODIFY `reply_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cust_contact`
--
ALTER TABLE `cust_contact`
  MODIFY `decnid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `de_contact`
--
ALTER TABLE `de_contact`
  MODIFY `custcnid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dress`
--
ALTER TABLE `dress`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `dresstype_tbl`
--
ALTER TABLE `dresstype_tbl`
  MODIFY `dress_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wish`
--
ALTER TABLE `wish`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
