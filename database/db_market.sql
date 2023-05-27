-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 01:32 AM
-- Server version: 5.7.20-0ubuntu0.17.04.1
-- PHP Version: 5.6.40-30+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservationdru`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(10) NOT NULL,
  `admin_fullname` varchar(255) NOT NULL,
  `admin_tel` varchar(10) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL COMMENT 'รหัสผ่าน',
  `status_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_fullname`, `admin_tel`, `admin_email`, `admin_user`, `admin_password`, `status_id`, `position_id`) VALUES
(5, 'tanayun', '0867378378', 'tanayun@hotmail.com', 'tanayun', '123456789', 11, 1),
(9, 'ืsawadee', '84', 'betobakung@asd.com', 'tanunta', '123456789', 10, 1),
(21, 'แอดมิน', '0954832745', 'pook802@hotmail.com', 'pook802', '123456789', 10, 1),
(22, 'Administrator', '099999999', 'admin@admin.com', 'admin', '12345678', 1, 1),
(23, 'กรกนก', '0561151551', 'konkanoK@gmail.com', 'konkanokk', '123456', 10, 1),
(24, 'สมศรี ทองม้วน', '0155115511', 'somsrio@gmail.conm', 'somsri', '12345678910', 10, 1),
(25, 'กรกนก สมรักษ์', '054155115', 'konkanok@gmail.com', 'konkanok', '1234', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `bk_id` int(11) NOT NULL COMMENT 'รหัสการจอง',
  `renter_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `bk_datetime` datetime NOT NULL COMMENT 'วันเวลาที่จอง',
  `bk_end` datetime NOT NULL COMMENT 'วันเวลาหมดการจอง',
  `contract_id` int(11) NOT NULL,
  `rent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`bk_id`, `renter_id`, `market_id`, `bk_datetime`, `bk_end`, `contract_id`, `rent_id`) VALUES
(11, 27, 13, '2021-03-01 00:00:00', '2021-03-03 00:00:00', 0, 5),
(12, 27, 23, '2021-03-22 00:00:00', '2021-03-22 00:00:00', 0, 2),
(13, 31, 5, '2021-03-22 00:00:00', '2021-03-22 00:00:00', 0, 3),
(14, 11, 2, '2021-03-29 00:00:00', '2021-03-29 00:00:00', 0, 4),
(15, 11, 4, '2021-03-29 00:00:00', '2021-03-29 00:00:00', 0, 6),
(16, 11, 6, '2021-03-29 00:00:00', '2021-03-29 00:00:00', 0, NULL),
(17, 18, 11, '2021-03-29 00:00:00', '2021-03-29 00:00:00', 0, 7),
(19, 31, 11, '2021-03-30 00:00:00', '2021-03-30 00:00:00', 0, NULL),
(20, 21, 22, '2021-05-04 00:00:00', '2021-06-04 00:00:00', 0, NULL),
(26, 36, 25, '2021-05-04 00:00:00', '2021-06-04 00:00:00', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cancel`
--

CREATE TABLE `tb_cancel` (
  `id_cancel` int(11) NOT NULL,
  `rent_id` int(11) NOT NULL,
  `cancel_money` float(8,0) NOT NULL,
  `cancel_day` datetime NOT NULL,
  `cancel_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_contract`
--

CREATE TABLE `tb_contract` (
  `contract_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `con_deposit` varchar(255) NOT NULL COMMENT 'ค่ามัดจำ',
  `con_date` date NOT NULL COMMENT 'วันมัดจำ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cou`
--

CREATE TABLE `tb_cou` (
  `cou_id` int(11) NOT NULL COMMENT 'รหัสค่าน้ำค่าไฟ\r\ncost of utilities',
  `cou_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_market`
--

CREATE TABLE `tb_market` (
  `market_id` int(10) NOT NULL COMMENT 'รหัสพื้นที่',
  `status_id` int(11) NOT NULL COMMENT 'สถานะ',
  `id_type` int(10) NOT NULL COMMENT 'ประเภท',
  `numberbox` varchar(255) NOT NULL COMMENT 'ชื่อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_market`
--

INSERT INTO `tb_market` (`market_id`, `status_id`, `id_type`, `numberbox`) VALUES
(1, 2, 1, 'A1 '),
(2, 2, 1, 'A2'),
(3, 2, 1, 'A3'),
(4, 2, 1, 'A4'),
(5, 2, 1, 'A5'),
(6, 3, 1, 'A6'),
(7, 1, 1, 'A7'),
(8, 1, 1, 'A8'),
(9, 1, 1, 'A9'),
(10, 1, 2, 'B1'),
(11, 2, 2, 'B2'),
(12, 1, 2, 'B3'),
(13, 2, 2, 'B4'),
(14, 1, 3, 'N1'),
(15, 1, 3, 'N2'),
(16, 11, 65, 'N3'),
(17, 1, 3, 'N4'),
(18, 1, 3, 'N5'),
(19, 1, 4, 'K1'),
(20, 1, 4, 'K2'),
(21, 1, 4, 'K3'),
(22, 1, 4, 'K4'),
(23, 2, 4, 'K5'),
(24, 3, 4, 'K6'),
(25, 2, 4, 'K7');

-- --------------------------------------------------------

--
-- Table structure for table `tb_payment`
--

CREATE TABLE `tb_payment` (
  `pay_id` int(11) NOT NULL,
  `renter_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `bk_id` int(11) NOT NULL,
  `rent_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `day_transfer` date NOT NULL,
  `time_transfer` int(11) NOT NULL,
  `pay_money` float(8,0) NOT NULL,
  `pay_silp` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_payment`
--

INSERT INTO `tb_payment` (`pay_id`, `renter_id`, `status_id`, `bk_id`, `rent_id`, `market_id`, `admin_id`, `day_transfer`, `time_transfer`, `pay_money`, `pay_silp`, `created_date`) VALUES
(1, 27, 1, 0, 2, 23, 22, '2021-03-22', 840, 4000, 'uploads/../../../uploads/1616405383.jpg', '2021-03-22 16:29:45'),
(2, 27, 1, 0, 1, 5, 22, '2021-03-22', 630, 5500, 'uploads/../../../uploads/1616405398.png', '2021-03-22 16:30:00'),
(3, 11, 1, 16, 0, 6, 0, '2021-03-30', 750, 1000, 'uploads/../../../uploads/1617083076.png', '2021-03-30 12:44:31'),
(4, 11, 1, 16, 0, 6, 0, '2021-03-30', 750, 1000, 'uploads/../../../uploads/1617083078.png', '2021-03-30 12:44:33'),
(5, 18, 1, 17, 0, 11, 21, '2021-03-31', 330, 1000, 'uploads/../../../uploads/1617144994.png', '2021-03-31 05:56:26'),
(6, 18, 1, 0, 7, 11, 21, '2021-03-31', 360, 1100, 'uploads/../../../uploads/1617145701.png', '2021-03-31 06:08:13'),
(7, 36, 1, 26, 0, 25, 22, '2021-05-04', 240, 1500, 'uploads/../../../uploads/1620126691.png', '2021-05-04 18:11:34'),
(8, 36, 1, 0, 8, 25, 0, '2021-05-04', 420, 2800, 'uploads/../../../uploads/1620127322.png', '2021-05-04 18:22:04'),
(9, 36, 1, 0, 8, 25, 0, '2021-06-04', 1080, 2800, 'uploads/../../../uploads/1620127365.png', '2021-05-04 18:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `tb_position`
--

CREATE TABLE `tb_position` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_position`
--

INSERT INTO `tb_position` (`position_id`, `position_name`) VALUES
(1, 'แอดมิน'),
(2, 'ผู้เช่า'),
(3, 'SuperiorCEO');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rent`
--

CREATE TABLE `tb_rent` (
  `rent_id` int(11) NOT NULL,
  `renter_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `rent_rental` float(8,0) NOT NULL COMMENT 'ค่าเช่า',
  `rent_dtime` datetime NOT NULL COMMENT 'วันเวลาที่เริ่มเช่า',
  `rent_end` datetime NOT NULL COMMENT 'วันเวลาที่สิ้นสุด',
  `bk_id` int(11) NOT NULL,
  `rent_pledge` float NOT NULL COMMENT 'ค่ามัดจำ',
  `rent_cancel_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_rent`
--

INSERT INTO `tb_rent` (`rent_id`, `renter_id`, `market_id`, `rent_rental`, `rent_dtime`, `rent_end`, `bk_id`, `rent_pledge`, `rent_cancel_date`) VALUES
(1, 27, 5, 5500, '2021-03-18 00:00:00', '2025-03-19 00:00:00', 6, 3500, NULL),
(2, 27, 23, 4000, '2021-03-22 00:00:00', '2025-03-22 00:00:00', 12, 1500, NULL),
(3, 31, 5, 3500, '2021-03-22 00:00:00', '2025-03-22 00:00:00', 13, 1500, NULL),
(4, 11, 2, 1300, '2021-03-29 00:00:00', '2021-03-01 00:00:00', 14, 1000, NULL),
(5, 27, 13, 1200, '2021-03-30 00:00:00', '2021-04-01 00:00:00', 11, 1000, NULL),
(6, 11, 4, 1200, '2021-03-30 00:00:00', '2021-04-01 00:00:00', 15, 1000, NULL),
(7, 18, 11, 1100, '2021-03-31 00:00:00', '2021-05-01 00:00:00', 17, 1000, NULL),
(8, 36, 25, 2800, '2021-05-04 00:00:00', '2025-05-04 00:00:00', 26, 1500, '2021-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_renter`
--

CREATE TABLE `tb_renter` (
  `renter_id` int(11) NOT NULL,
  `renter_fullname` varchar(255) NOT NULL,
  `renter_birth` date NOT NULL,
  `renter_id_card` varchar(13) NOT NULL,
  `renter_address` varchar(255) NOT NULL,
  `renter_tel` varchar(10) NOT NULL,
  `renter_email` varchar(255) NOT NULL,
  `renter_user` varchar(255) NOT NULL,
  `renter_password` varchar(255) NOT NULL,
  `renter_detail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_renter`
--

INSERT INTO `tb_renter` (`renter_id`, `renter_fullname`, `renter_birth`, `renter_id_card`, `renter_address`, `renter_tel`, `renter_email`, `renter_user`, `renter_password`, `renter_detail`) VALUES
(3, 'น้ำตก หมูๅ', '2021-01-13', '1111111111111', '204/23 จ.สมุทรปราการๅ', '0811111111', 'numtok@hotmail.com', 'numtok111111111111', '123456789', 'หมี'),
(11, 'ข้าวมันไก่ น้ำซุป', '2021-01-21', '1105378942630', '220/52 จ.เลย', '0864811684', 'user@hotmail.com', 'user', '123456789', ''),
(13, 'zazazauuuu', '2021-02-04', '1153873873783', '220asdasd ', '0864811684', 'awca@awd.com ', 'pop01asd ', '1234', ''),
(15, 'sawadee', '2021-02-04', '1153873873783', '220/52 จ.เลย ', '0864811684', 'betobakung@asd.com ', 'pop01asd ', '1234', ''),
(17, 'poawd', '2021-02-04', '0748603783078', 'ASDSAD ', '0783783', 'bhjuog@asd.com ', 'pkp802 ', '1234', ''),
(18, 'asdasd', '2021-02-04', '0748603783078', 'asdf ', '40607806', 'asdfsadf@asd ', 'user ', '1234', ''),
(21, 'ยนยนยน', '2021-02-07', '1598737834831', '234/483 ', '0753738378', 'asdasdf@asdasdt.com ', 'kp999 ', '1234', 'หมี'),
(27, 'somsak', '1980-03-22', '0256156156165', 'bkkk ggg hhh', '0561515561', 'somsak@gmail.com', 'somsak', 'somsak', 'food'),
(28, 'กก', '1980-11-11', '9847893208943', 'kk', '2532985789', 'kkk@gmail.com', 'kkk', '1234', 'kkk'),
(29, 'มงคง มิ่งยิ่ง', '2021-03-22', '1050451661515', '122 phanakarn', '0125115515', 'monkon@gmail.com', 'monkon', '1234', 'หมูปิ้ง'),
(31, 'สมจิต จงกาง', '2021-03-22', '4561516561565', '166/110 moo taparak', '0560506506', 'somjit@gmail.com', 'somjit', '1234', 'test'),
(33, 'xxx', '2021-05-04', '2142141241242', 'xxsx', '2423141235', 'xxxx@xxx', 'xxxxxx', '1234', 'est'),
(36, 'สมพร สมองดี', '1981-05-04', '2054115451454', 'จตุจักร กทม', '0915151515', 'somporn@gmail.com', 'sompron', '1234', 'หมูปิ้้ง'),
(37, 'tata', '2021-05-10', '1189783787837', '242/45', '0873783783', 'cansoni@gmail.com', 'cansoni', '123456789', 'จาน'),
(38, 'aceu', '2021-06-15', '1137973234534', '231/49', '0867375372', 'aceu@hotmail.com', 'aceu', '1234', 'บ้าน');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `status_id` int(10) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`status_id`, `status_name`) VALUES
(1, 'ว่าง'),
(2, 'เช่า'),
(3, 'จอง'),
(7, 'เปิด'),
(10, 'ใช้งานได้'),
(11, 'บล็อค');

-- --------------------------------------------------------

--
-- Table structure for table `tb_type`
--

CREATE TABLE `tb_type` (
  `id_type` int(10) NOT NULL,
  `name_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_type`
--

INSERT INTO `tb_type` (`id_type`, `name_type`) VALUES
(1, 'อาหารและเครื่องดื่ม'),
(2, 'เสื้อผ้า'),
(3, 'อาหารสด'),
(4, 'เบ็ดเตล็ด\r\n'),
(65, 'ของประดับ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`bk_id`),
  ADD KEY `renter_id` (`renter_id`),
  ADD KEY `market_id` (`market_id`);

--
-- Indexes for table `tb_cancel`
--
ALTER TABLE `tb_cancel`
  ADD PRIMARY KEY (`id_cancel`);

--
-- Indexes for table `tb_contract`
--
ALTER TABLE `tb_contract`
  ADD PRIMARY KEY (`contract_id`);

--
-- Indexes for table `tb_cou`
--
ALTER TABLE `tb_cou`
  ADD PRIMARY KEY (`cou_id`);

--
-- Indexes for table `tb_market`
--
ALTER TABLE `tb_market`
  ADD PRIMARY KEY (`market_id`),
  ADD KEY `id_type` (`id_type`);

--
-- Indexes for table `tb_payment`
--
ALTER TABLE `tb_payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `tb_position`
--
ALTER TABLE `tb_position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `tb_rent`
--
ALTER TABLE `tb_rent`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `tb_renter`
--
ALTER TABLE `tb_renter`
  ADD PRIMARY KEY (`renter_id`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tb_type`
--
ALTER TABLE `tb_type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการจอง', AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tb_cancel`
--
ALTER TABLE `tb_cancel`
  MODIFY `id_cancel` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_cou`
--
ALTER TABLE `tb_cou`
  MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสค่าน้ำค่าไฟ\r\ncost of utilities';
--
-- AUTO_INCREMENT for table `tb_market`
--
ALTER TABLE `tb_market`
  MODIFY `market_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสพื้นที่', AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tb_payment`
--
ALTER TABLE `tb_payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_position`
--
ALTER TABLE `tb_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_rent`
--
ALTER TABLE `tb_rent`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_renter`
--
ALTER TABLE `tb_renter`
  MODIFY `renter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tb_type`
--
ALTER TABLE `tb_type`
  MODIFY `id_type` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `tb_status` (`status_id`);

--
-- Constraints for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD CONSTRAINT `tb_booking_ibfk_1` FOREIGN KEY (`renter_id`) REFERENCES `tb_renter` (`renter_id`),
  ADD CONSTRAINT `tb_booking_ibfk_2` FOREIGN KEY (`market_id`) REFERENCES `tb_market` (`market_id`);

--
-- Constraints for table `tb_market`
--
ALTER TABLE `tb_market`
  ADD CONSTRAINT `tb_market_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `tb_type` (`id_type`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
