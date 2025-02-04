-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2025 at 06:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL COMMENT 'ลำดับที่',
  `orderID` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสินค้า',
  `orderPrice` float NOT NULL COMMENT 'ราคาสินค้า',
  `orderQty` int(11) NOT NULL COMMENT 'จำนวนที่สั่งซื้อ',
  `Total` float NOT NULL COMMENT 'ราคารวม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `orderID`, `pro_id`, `orderPrice`, `orderQty`, `Total`) VALUES
(1, 0000000005, 000002, 40000, 2, 80000),
(2, 0000000005, 000001, 40000, 2, 80000),
(3, 0000000006, 000009, 40000, 5, 200000),
(4, 0000000007, 000013, 40000, 2, 80000),
(5, 0000000008, 000003, 40000, 5, 200000),
(6, 0000000008, 000004, 40000, 2, 80000),
(7, 0000000009, 000009, 40000, 1, 40000),
(8, 0000000009, 000013, 40000, 2, 80000),
(9, 0000000010, 000001, 40000, 1, 40000),
(10, 0000000011, 000002, 40000, 2, 80000),
(11, 0000000012, 000002, 40000, 2, 80000),
(12, 0000000012, 000003, 40000, 2, 80000),
(13, 0000000013, 000002, 40000, 2, 80000),
(14, 0000000014, 000001, 40000, 1, 40000),
(15, 0000000015, 000001, 40000, 1, 40000),
(16, 0000000016, 000006, 40000, 3, 120000),
(17, 0000000016, 000002, 40000, 6, 240000),
(18, 0000000017, 000002, 40000, 4, 160000),
(19, 0000000018, 000016, 40000, 2, 80000),
(20, 0000000018, 000003, 40000, 3, 120000),
(21, 0000000019, 000002, 40000, 3, 120000),
(22, 0000000019, 000016, 40000, 3, 120000),
(23, 0000000019, 000033, 40000, 4, 160000),
(24, 0000000019, 000004, 40000, 2, 80000),
(25, 0000000020, 000002, 40000, 1, 40000),
(26, 0000000020, 000016, 40000, 1, 40000),
(27, 0000000021, 000062, 40000, 3, 120000),
(28, 0000000022, 000016, 40000, 6, 240000),
(29, 0000000022, 000020, 40000, 2, 80000),
(30, 0000000023, 000001, 40000, 1, 40000),
(31, 0000000023, 000002, 40000, 1, 40000),
(32, 0000000023, 000016, 40000, 1, 40000),
(33, 0000000024, 000001, 5000, 3, 15000),
(34, 0000000025, 000001, 5000, 1, 5000),
(35, 0000000025, 000002, 5000, 2, 10000),
(36, 0000000025, 000015, 4000, 1, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสินค้า',
  `pro_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อสินค้า',
  `detail` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'รายละเอียด',
  `type_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสประเภทสินค้า',
  `price` float(8,2) DEFAULT NULL COMMENT 'ราคาขาย',
  `amount` int(11) DEFAULT NULL COMMENT 'จำนวน',
  `image` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'รูปภาพ',
  `brand` varchar(50) NOT NULL COMMENT 'แบรนด์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `detail`, `type_id`, `price`, `amount`, `image`, `brand`) VALUES
(000001, 'Air Force 1 \'07', 'จุดเด่น: มีดีไซน์ที่คลาสสิกและทนทาน เหมาะสำหรับการใช้งานทุกวัน\r\n', 001, 5000.00, 11, 'Air Force 1.png', 'NIKE'),
(000002, 'Dunk Low', 'จุดเด่น: ดีไซน์สตรีทสไตล์ที่ได้รับความนิยมมากในปัจจุบัน ให้ความสบายและการยึดเกาะที่ดี\r\n\r\n', 001, 5000.00, -5, 'Dunk Low.jpg', 'NIKE'),
(000003, 'Air Max 90\r\n', 'จุดเด่น: มีเทคโนโลยี Air Max ช่วยรองรับแรงกระแทกที่ดี', 001, 4500.00, 10, 'Air Max 90.png', 'NIKE'),
(000004, 'Air Jordan 1\r\n\r\n', 'จุดเด่น: เป็นรองเท้าที่มีประวัติศาสตร์อันยาวนาน และได้รับความนิยมทั้งในวงการกีฬาบาสเก็ตบอลและแฟชั่น\r\n', 001, 10000.00, 16, 'Air Jordan 1.jpg', 'NIKE'),
(000005, 'Blazer Mid \'77\r\n\r\n', 'จุดเด่น: มีดีไซน์ที่เรียบง่ายและทนทาน สามารถใช้งานได้ทั้งในสนามและในชีวิตประจำวัน\r\n', 001, 4500.00, 20, 'Blazer Mid _77.png', 'NIKE'),
(000006, 'Cortez\r\n', 'จุดเด่น: สไตล์ย้อนยุคที่ได้รับความนิยมในวงการแฟชั่นและการใช้งานทั่วไป', 001, 4000.00, 17, 'Cortez.png', 'NIKE'),
(000007, 'React Element 55\r\n\r\n', 'จุดเด่น: เทคโนโลยี React ช่วยให้ความสบายในการเดินและการวิ่ง\r\n', 001, 4500.00, 20, 'React Element 55.jpg', 'NIKE'),
(000009, 'ZoomX Vaporfly NEXT%\r\n', 'จุดเด่น: เทคโนโลยี ZoomX ช่วยเพิ่มประสิทธิภาพในการวิ่ง เหมาะสำหรับนักวิ่งระดับมืออาชีพ\r\n', 001, 12000.00, 10, 'ZoomX Vaporfly NEXT_.jpg', 'NIKE'),
(000011, 'Pegasus 38\r\n\r\n', 'จุดเด่น: รองเท้าวิ่งที่มีการรองรับที่ดีและความสบายในระยะยาว', 001, 4000.00, 20, 'Pegasus 38.jpg', 'NIKE'),
(000013, 'Air Max 270\r\n\r\n', 'จุดเด่น: มีดีไซน์ที่ทันสมัยและความสบายจากเทคโนโลยี Air Max\r\n', 001, 5000.00, 5, 'Air Max 270.png', 'NIKE'),
(000015, 'Samba OG\r\n\r\n', 'จุดเด่น: สไตล์คลาสสิกที่เน้นความสะดวกสบายในการใช้งานทุกวัน\r\n', 002, 4000.00, 19, 'Samba OG.jpg', 'adidas'),
(000016, 'Gazelle\r\n\r\n', 'จุดเด่น: การออกแบบที่สวยงามและสบาย มีความคลาสสิกและดูดีในทุกโอกาสจุดเด่น: การออกแบบที่สวยงามและสบาย มีความคลาสสิกและดูดีในทุกโอกาส', 002, 4000.00, 7, 'Gazelle.jpg', 'ADIDAS'),
(000017, 'Superstar\r\n\r\n', 'จุดเด่น: ดีไซน์ที่มีความคลาสสิกและนิยมใช้ในวงการแฟชั่น', 002, 4500.00, 20, 'Superstar.jpg', 'ADIDAS'),
(000018, 'Stan Smith\r\n\r\n', 'จุดเด่น: การดีไซน์เรียบง่ายแต่ทันสมัย เป็นที่นิยมในวงการแฟชั่น', 002, 4500.00, 20, 'Stan Smith.jpg', 'ADIDAS'),
(000020, 'NMD_R1\r\n', 'จุดเด่น: ดีไซน์สไตล์สตรีทที่มีความทันสมัยและการรองรับเท้าที่ยอดเยี่ยม\r\n', 002, 5500.00, 18, 'NMD_R1.jpg', 'ADIDAS'),
(000022, 'UltraBoost 21\r\n\r\n', 'จุดเด่น: เทคโนโลยี Boost ช่วยให้การเดินและวิ่งมีความสบายสุดๆ', 002, 7500.00, 20, 'UltraBoost 21.jpg', 'ADIDAS'),
(000024, 'Yeezy Boost 350 V2\r\n', 'จุดเด่น: ความสวยงามและความสะดวกสบายจากเทคโนโลยี Boost ในสไตล์ที่เป็นเอกลักษณ์\r\n', 002, 15000.00, 20, 'Yeezy Boost 350 V2.jpg', 'ADIDAS'),
(000026, 'ZX 2K Boost\r\n\r\n', 'จุดเด่น: การใช้เทคโนโลยี Boost และดีไซน์ที่สปอร์ตและทันสมัย', 002, 5000.00, 20, 'ZX 2K Boost.jpg', 'ADIDAS'),
(000028, 'Forum Low\r\n\r\n', 'จุดเด่น: ดีไซน์ย้อนยุคที่ได้รับความนิยมในปัจจุบัน', 002, 5500.00, 20, 'Forum Low.jpg', 'ADIDAS'),
(000030, 'SL72\r\n', 'จุดเด่น: ความคลาสสิกที่มีทั้งความสปอร์ตและแฟชั่น\r\n', 002, 5500.00, 20, 'SL72.jpg', 'ADIDAS'),
(000052, 'Palermo\r\n', 'จุดเด่น: ดีไซน์คลาสสิกแบบสตรีท พร้อมรองรับความสบายสำหรับการใช้งานในชีวิตประจำวัน', 003, 3500.00, 20, 'Palermo.jpg', 'PUMA'),
(000053, 'Suede Classic\r\n', 'จุดเด่น: วัสดุหนังกลับ (suede) ที่มีความทนทานและสไตล์ที่คลาสสิก\r\n', 003, 5000.00, 20, 'Suede Classic.jpg', 'PUMA'),
(000054, 'RS-X³\r\n', 'จุดเด่น: การผสมผสานระหว่างเทคโนโลยีชั้นสูงและการออกแบบที่ดูทันสมัย เหมาะสำหรับทั้งการใช้งานและแฟชั่น', 003, 6000.00, 20, 'RS-X³.jpg', 'PUMA'),
(000055, 'Future Rider\r\n', 'จุดเด่น: ดีไซน์สปอร์ตผสมผสานกับความสบายในการเดิน พร้อมเทคโนโลยีที่รองรับการใช้งานยาวนาน', 003, 4500.00, 20, 'Future Rider.jpg', 'PUMA'),
(000056, 'Cali\r\n\r\n', 'จุดเด่น: รองเท้าที่มีสไตล์สุดชิค เหมาะสำหรับใส่เดินในชีวิตประจำวัน\r\n', 003, 4500.00, 20, 'Cali.jpg', 'PUMA'),
(000057, 'Ralph Sampson Lo\r\n', 'จุดเด่น: การออกแบบร่วมกับนักบาสเกตบอลชื่อดัง Ralph Sampson พร้อมพื้นรองเท้าที่ให้ความสบาย\r\n', 003, 4500.00, 20, 'Ralph Sampson Lo.jpg', 'PUMA'),
(000058, 'Roma\r\n\r\n', 'จุดเด่น: ดีไซน์ย้อนยุคที่มีสไตล์ คงทนและเหมาะสำหรับทุกกิจกรรม', 003, 4000.00, 20, 'Roma.jpg', 'PUMA'),
(000059, 'Basket Classic\r\n', 'จุดเด่น: มีดีไซน์คลาสสิกและพื้นรองเท้าที่รองรับการเคลื่อนไหวได้ดี', 003, 4500.00, 20, 'Basket Classic.jpg', 'PUMA'),
(000060, 'LQD Cell Omega\r\n\r\n', 'จุดเด่น: ระบบ LQD CELL สำหรับการรองรับแรงกระแทกสูง ช่วยให้การวิ่งหรือเดินมีความสบายมากขึ้น', 003, 6500.00, 20, 'LQD Cell Omega.png', 'PUMA'),
(000061, 'Speedcat\r\n', 'จุดเด่น: รองเท้าสไตล์สปอร์ตที่เหมาะสำหรับการใช้งานทั่วไปและการขับรถ พร้อมพื้นรองเท้าที่ให้ความยืดหยุ่น', 003, 4500.00, 20, 'Speedcat.jpg', 'PUMA'),
(000062, '2002R\r\n', 'จุดเด่น: เทคโนโลยี N-ergy ที่ช่วยในเรื่องการรองรับแรงกระแทกและการเคลื่อนไหว\r\n', 004, 6000.00, 17, '2002R.jpg', 'NEW BALANCE'),
(000063, '574\r\n\r\n', 'จุดเด่น: รุ่นคลาสสิกที่ได้รับความนิยมสูงสุด มาพร้อมความทนทานและความสบายในการใช้งาน', 004, 4500.00, 20, '574.jpg', 'NEW BALANCE'),
(000064, '990v5\r\n', 'จุดเด่น: เทคโนโลยี ENCAP ที่ช่วยให้รองเท้ารองรับแรงกระแทกได้ดี เหมาะสำหรับการเดินระยะยาว', 004, 8000.00, 20, '990v5.jpg', 'NEW BALANCE'),
(000065, '327\r\n', 'จุดเด่น: การออกแบบที่ทันสมัย พร้อมเทคโนโลยีรองรับการเคลื่อนไหวที่ดี', 004, 5000.00, 20, '327.jpg', 'NEW BALANCE'),
(000066, '997H\r\n', 'จุดเด่น: พื้นรองเท้าที่มีการรองรับที่ดี มีความทนทานและสไตล์ที่ทันสมัย', 004, 5000.00, 20, '997H.jpg', 'NEW BALANCE'),
(000067, '1080v11\r\n', 'จุดเด่น: การรองรับแรงกระแทกที่ดีที่สุด เหมาะสำหรับการวิ่งหรือกิจกรรมที่ต้องใช้ความทนทาน', 004, 7000.00, 20, '1080v11.png', 'NEW BALANCE'),
(000068, '850\r\n', 'จุดเด่น: การออกแบบรองเท้าเดินที่มีสไตล์ เหมาะสำหรับการใช้งานทั่วไป', 004, 4000.00, 20, '850.jpg', 'NEW BALANCE'),
(000069, 'X-Racer\r\n\r\n', 'จุดเด่น: เทคโนโลยีที่ช่วยให้การวิ่งหรือเดินมีความสบาย พร้อมสไตล์ที่โดดเด่น', 004, 4500.00, 20, 'X-Racer.jpg', 'NEW BALANCE'),
(000070, 'FuelCell Rebel v2\r\n\r\n', 'จุดเด่น: ระบบ FuelCell ที่ช่วยให้รองเท้ามีการตอบสนองสูง เหมาะสำหรับการวิ่ง', 004, 6000.00, 20, 'FuelCell Rebel v2.jpg', 'NEW BALANCE'),
(000071, '680v6\r\n\r\n', 'จุดเด่น: พื้นรองเท้าที่ให้ความสบายในทุกย่างก้าว เหมาะสำหรับการเดินระยะยาว', 004, 3500.00, 20, '680v6.png', 'NEW BALANCE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `orderID` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `cus_name` varchar(60) NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `address` text NOT NULL COMMENT 'ที่อยู่การจัดส่งสินค้า',
  `telephone` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `total_price` float NOT NULL COMMENT 'ราคารวมสุทธิ',
  `order_status` varchar(1) NOT NULL COMMENT '0=ยกเลิก,1=ยังไม่ชำระเงิน,2=ชำระเงิน',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่สั่งซื้อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`orderID`, `cus_name`, `address`, `telephone`, `total_price`, `order_status`, `reg_date`) VALUES
(0000000001, 'สมชาย หมายดี', ' 113/142 ม.3 ต.เมืองที อ.เมือง จ.อยุธยา', '0988889955', 120000, '1', '2024-10-19 15:22:02'),
(0000000002, 'นานา สมดี', '  113/142 ม.3 ต.เมืองที อ.เมือง จ.อยุธยา', '0983737379', 160000, '1', '2024-10-19 15:29:12'),
(0000000003, 'นานา สมดี', '  113/142 ม.3 ต.เมืองที อ.เมือง จ.อยุธยา', '0983737379', 160000, '1', '2024-10-19 15:31:13'),
(0000000004, 'นานา สมดี', '  113/142 ม.3 ต.เมืองที อ.เมือง จ.อยุธยา', '0987676754', 160000, '1', '2024-10-19 15:32:03'),
(0000000005, 'นานี สมดี', '  113/142 ม.3 ต.เมืองที อ.เมือง จ.อยุธยา', '0987676754', 160000, '1', '2024-10-19 15:34:07'),
(0000000006, 'มุนี สมดี', ' 113/142 ม.3 ต.เมืองที อ.เมือง จ.อยุธยา\r\n', '0898933421', 200000, '1', '2024-10-19 15:36:04'),
(0000000007, 'สมหญิง หมายดี', '   113/142 ม.3 ต.เมืองที อ.เมือง จ.อยุธยา\r\n', '093243212', 80000, '1', '2024-10-19 15:37:46'),
(0000000008, 'นานา สมดี', ' 114/23 ', '0898787654', 280000, '1', '2024-10-19 15:49:20'),
(0000000009, 'สมชาย หมายดี', '  112/121 TTT', '0847353633', 120000, '1', '2024-10-19 15:54:49'),
(0000000010, 'นานา สมดี', '  jtrhfd', '323423', 40000, '1', '2024-10-19 15:59:19'),
(0000000011, 'นานา สมดี', '  rgrdf', '232323', 80000, '1', '2024-10-19 18:34:45'),
(0000000012, 'สมชาย หมายดี', '  112/121 อ.เมือง จ.อยุธยา', '07865456', 160000, '1', '2024-10-19 19:34:15'),
(0000000013, 'นานา สมดี', '  kg', '90', 80000, '1', '2024-10-19 20:03:48'),
(0000000014, 'นานา สมดี', '  gx', '9867', 40000, '1', '2024-10-20 08:03:41'),
(0000000015, 'jou', '  i', '098', 40000, '1', '2024-10-20 08:21:04'),
(0000000016, 'สมชาย หมายดี', ' ด', '13', 360000, '1', '2024-10-20 10:15:58'),
(0000000017, 'นานี สมดี', ' yfg', '56', 160000, '1', '2024-10-21 09:02:36'),
(0000000018, 'สมชาย หมายดี', ' ส้แปดเ้า่าสาน้ร', '9876756456', 200000, '1', '2024-10-21 13:54:38'),
(0000000019, 'นานา สมดี', ' pkify', '098765', 480000, '1', '2024-10-22 04:31:33'),
(0000000020, 'gtfv', ' fgg', '111', 80000, '1', '2024-10-22 08:19:40'),
(0000000021, 'นานา สมดี', ' 113/123 ต.เขาใหญ่ อ.เมือง จ.อยุธยา', '0809909876', 120000, '1', '2024-10-22 08:25:46'),
(0000000022, 'นานา สมดี', ' jgft', '543456789', 320000, '1', '2024-10-22 08:47:10'),
(0000000023, 'rg', ' rgr', '21', 120000, '1', '2025-02-03 11:21:51'),
(0000000024, 'r', ' d', '2', 15000, '1', '2025-02-03 12:41:56'),
(0000000025, 'ดำำ', ' ไไ', '1', 19000, '1', '2025-02-03 16:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสประเภทสินค้า',
  `type_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อประเภทสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(001, 'NIKE'),
(002, 'ADIDAS'),
(003, 'PUMA'),
(004, 'NEW BALANCE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับที่', AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `orderID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'เลขที่ใบสั่งซื้อ', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทสินค้า', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
