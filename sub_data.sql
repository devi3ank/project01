-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2019 at 09:01 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sub_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_tb`
--

CREATE TABLE `detail_tb` (
  `detail_id` int(11) NOT NULL,
  `detail_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อรายละเอียด',
  `detail_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ระเอียด',
  `detail_image` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'รูป',
  `detail_status` int(1) NOT NULL COMMENT 'สถานะ 1.ใช้งาน 2.ปิดการใช้งาน 3.ลบ',
  `detail_fitby` int(11) NOT NULL COMMENT 'ผู้บันทึก',
  `detail_fitdate` datetime NOT NULL COMMENT 'วันที่บันทึก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_tb`
--

CREATE TABLE `document_tb` (
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อเอกสาร',
  `doc_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อไฟล์',
  `doc_description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'รายละเอียด',
  `doc_tostore` int(11) NOT NULL COMMENT 'ร้านที่เห็นได้',
  `doc_status` int(1) NOT NULL COMMENT 'สถานะ 1.แสดง 2.ไม่แสดง 3.ลบ',
  `doc_fiyby` int(11) NOT NULL COMMENT 'ผู้บันทึก',
  `doc_fitdate` datetime NOT NULL COMMENT 'วันที่บันทึก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lot_tb`
--

CREATE TABLE `lot_tb` (
  `lot_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL COMMENT 'รหัสสินค้า',
  `lot_date` date NOT NULL COMMENT 'วันที่ซื้อสินค้า',
  `lot_weight` decimal(10,2) NOT NULL COMMENT 'น้ำหนัก',
  `lot_price_buy` decimal(10,2) NOT NULL COMMENT 'ราคาซื้อ',
  `store_buy_id` int(11) NOT NULL COMMENT 'ซื้อกับ',
  `lot_note_buy` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หมายเหตุการซื้อสินค้า',
  `lot_price_sale` decimal(10,2) NOT NULL COMMENT 'ราคาขาย',
  `lot_date_sale` date NOT NULL COMMENT 'วันที่ขาย',
  `store_sale_id` int(11) NOT NULL COMMENT 'ขายให้กับ',
  `lot_note_sale` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หมายเหตุใบเสร็จรับเงิน',
  `store_order` int(11) NOT NULL COMMENT 'ร้านที่สั่งซื้อสินค้า',
  `lot_order_date` datetime NOT NULL COMMENT 'วันที่สั่งซื้อสินค้า',
  `lot_status` int(1) NOT NULL DEFAULT '1' COMMENT 'สถานะ 1.ยังไม่ได้ขาย 2.ขายแล้ว 3.ลบ 4.สั่งซื้อ',
  `lot_transfer` int(1) NOT NULL DEFAULT '1' COMMENT 'สถานะการส่ง 1.ยังไม่ได้ส่ง 2.ส่งเรียบร้อยแล้ว',
  `lot_transfer_date` date NOT NULL COMMENT 'วันที่ส่งสินค้า',
  `lot_note_transfer` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หมายเหตุการส่งสินค้า',
  `lot_other` decimal(10,2) NOT NULL COMMENT 'ค่ากรรมกร',
  `lot_payment` date NOT NULL COMMENT 'วันที่ชำระเงิน',
  `lot_fitby` int(11) NOT NULL COMMENT 'ผู้บันทึก',
  `lot_fitdate` datetime NOT NULL COMMENT 'บันทึกเมื่อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lot_tb`
--

INSERT INTO `lot_tb` (`lot_id`, `products_id`, `lot_date`, `lot_weight`, `lot_price_buy`, `store_buy_id`, `lot_note_buy`, `lot_price_sale`, `lot_date_sale`, `store_sale_id`, `lot_note_sale`, `store_order`, `lot_order_date`, `lot_status`, `lot_transfer`, `lot_transfer_date`, `lot_note_transfer`, `lot_other`, `lot_payment`, `lot_fitby`, `lot_fitdate`) VALUES
(8, 3, '2019-06-03', '2345.00', '8.20', 2, '', '9.00', '2019-06-03', 2, '', 2, '2019-06-03 06:25:25', 5, 2, '2019-06-03', '-', '123.00', '2019-06-03', 1, '2019-06-03 06:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `order_buy_tb`
--

CREATE TABLE `order_buy_tb` (
  `ob_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `ob_weight` decimal(10,0) NOT NULL,
  `ob_price` decimal(10,2) NOT NULL,
  `ob_status` int(11) NOT NULL,
  `ob_fitdate` datetime NOT NULL,
  `ob_fitby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_buy_tb`
--

INSERT INTO `order_buy_tb` (`ob_id`, `store_id`, `products_id`, `ob_weight`, `ob_price`, `ob_status`, `ob_fitdate`, `ob_fitby`) VALUES
(1, 3, 3, '5000', '8.20', 2, '2019-06-05 19:43:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_tb`
--

CREATE TABLE `order_tb` (
  `order_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `order_weight` decimal(10,2) NOT NULL,
  `order_price_sale` decimal(10,2) NOT NULL,
  `order_price_buy` decimal(10,2) NOT NULL,
  `order_price_transfer` decimal(10,2) NOT NULL,
  `order_date_transfer` datetime NOT NULL,
  `order_status` int(2) NOT NULL COMMENT 'สถานะ 1.รออนุมัติการสั่งซื้อ 2.อนุมัติการสั่งซื้อ 3.กำลังเตรียมสินค้า',
  `order_fitdate_cancel` datetime NOT NULL,
  `order_fitdate` datetime NOT NULL,
  `order_fitby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_tb`
--

INSERT INTO `order_tb` (`order_id`, `products_id`, `store_id`, `order_weight`, `order_price_sale`, `order_price_buy`, `order_price_transfer`, `order_date_transfer`, `order_status`, `order_fitdate_cancel`, `order_fitdate`, `order_fitby`) VALUES
(1, 3, 2, '2000.00', '0.00', '0.00', '0.00', '0000-00-00 00:00:00', 0, '2019-06-03 06:03:39', '2019-06-03 05:52:47', 2),
(2, 3, 2, '350.00', '10.00', '8.20', '150.00', '2019-06-03 00:00:00', 5, '0000-00-00 00:00:00', '2019-06-03 05:58:06', 2),
(3, 3, 2, '2000.00', '12.00', '8.20', '120.00', '2019-06-03 00:00:00', 5, '0000-00-00 00:00:00', '2019-06-03 10:34:41', 2),
(4, 3, 2, '1234.00', '9.00', '8.20', '150.00', '2019-06-03 00:00:00', 5, '0000-00-00 00:00:00', '2019-06-03 10:38:24', 2),
(5, 3, 2, '5000.00', '10.00', '8.20', '0.00', '0000-00-00 00:00:00', 5, '0000-00-00 00:00:00', '2019-06-03 11:11:53', 2),
(6, 3, 2, '2000.00', '9.00', '8.20', '123.00', '2019-06-06 00:00:00', 5, '0000-00-00 00:00:00', '2019-06-05 17:35:53', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products_tb`
--

CREATE TABLE `products_tb` (
  `products_id` int(11) NOT NULL,
  `products_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสสินค้า',
  `products_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อสินค้า',
  `products_stock` decimal(10,2) NOT NULL,
  `products_status` int(1) NOT NULL DEFAULT '1' COMMENT 'สถานะ 1.ใช้งาน 2.ปิดการใช้งาน 3.ลบข้อมูล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products_tb`
--

INSERT INTO `products_tb` (`products_id`, `products_code`, `products_name`, `products_stock`, `products_status`) VALUES
(1, '', 'ข้าวเหนียว', '0.00', 3),
(2, '', 'ข้าวเหนียว', '0.00', 3),
(3, '123-55', 'ข้าวเหนียว', '3000.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_tb`
--

CREATE TABLE `quotation_tb` (
  `quotation_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL COMMENT 'สินค้า',
  `quotation_weight` decimal(10,2) NOT NULL COMMENT 'น้ำหนักสินค้า',
  `quotation_price` decimal(10,2) NOT NULL COMMENT 'ราคาขาย',
  `quotation_status` int(1) NOT NULL COMMENT 'สถานะ 1.เสนอขาย 2.รับซื้อสินค้า',
  `quotation_store` int(11) NOT NULL COMMENT 'ร้านที่เสนอขาย',
  `quotation_fitby` int(11) NOT NULL COMMENT 'ผู้บันทึก',
  `quotation_fitdate` datetime NOT NULL COMMENT 'วันที่บันทึก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_tb`
--

CREATE TABLE `store_tb` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อร้าน',
  `store_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ที่อยู่',
  `store_phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `store_tax` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เลขประจำตัวผู้เสียภาษี',
  `store_type` int(1) NOT NULL COMMENT 'ประเภทร้าน 1.เจ้าของร้าน 2.ร้านซื้อสินค้า 3.ร้านขายสินค้า',
  `store_status` int(1) NOT NULL COMMENT 'สถานะ 1.ใช้งาน 2.ปิดการใช้งาน 3.ลบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `store_tb`
--

INSERT INTO `store_tb` (`store_id`, `store_name`, `store_address`, `store_phone`, `store_tax`, `store_type`, `store_status`) VALUES
(1, 'หจก. สืบ เกษตรไท', 'เลขที่ 333/1 หมู่ที่ 2 ต.หนองจ๊อม อ.สันทราย จ.เชียงใหม่ 50210', ' 052-000-666', '1234567890', 1, 1),
(2, 'บจก. ไปโอเจน ฟิดมิลล์', '75/1 หมู่ 4 ต.บ้านกลาง อ.เมือง จ.ลำพูน 51000', '-', '5015544000315', 2, 1),
(3, 'บจก. ไปโอเจน ฟิดมิลล์2', '75/1 หมู่ 4 ต.บ้านกลาง อ.เมือง จ.ลำพูน 51000', '000', '5015544000315', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อผู้ใช้งาน',
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสผ่าน',
  `user_fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อีเมล',
  `user_phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `user_store` int(11) NOT NULL,
  `user_type` int(1) NOT NULL COMMENT 'ประเภทผู้ใช้ระบบ 1.admin 2.เจ้าของ 3.ผู้ซื้อสินค้า 4.ผู้ขายสินค้า',
  `user_status` int(1) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`user_id`, `user_username`, `user_password`, `user_fullname`, `user_email`, `user_phone`, `user_store`, `user_type`, `user_status`) VALUES
(1, 'admin', 'admin1234', 'ณัฐพงศ์ พลพัชรวัฒน์', 'test@email.com', '-', 1, 1, 1),
(2, 'user01', '1234', 'user01', 'ddd@ddd.com', '-', 2, 3, 1),
(3, 'user02', '1234', 'user02', 'sfasdf@asdasd', '000000', 2, 4, 1),
(4, 'user03', '1234', 'Mean Phonphatcharawat', 'sfasdf@asdasd', '000000', 3, 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_tb`
--
ALTER TABLE `detail_tb`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `detail_fitby` (`detail_fitby`);

--
-- Indexes for table `document_tb`
--
ALTER TABLE `document_tb`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `doc_fiyby` (`doc_fiyby`);

--
-- Indexes for table `lot_tb`
--
ALTER TABLE `lot_tb`
  ADD PRIMARY KEY (`lot_id`),
  ADD KEY `lot_fitby` (`lot_fitby`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `store_buy_id` (`store_buy_id`);

--
-- Indexes for table `order_buy_tb`
--
ALTER TABLE `order_buy_tb`
  ADD PRIMARY KEY (`ob_id`);

--
-- Indexes for table `order_tb`
--
ALTER TABLE `order_tb`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products_tb`
--
ALTER TABLE `products_tb`
  ADD PRIMARY KEY (`products_id`);

--
-- Indexes for table `quotation_tb`
--
ALTER TABLE `quotation_tb`
  ADD PRIMARY KEY (`quotation_id`),
  ADD KEY `quotation_fitby` (`quotation_fitby`);

--
-- Indexes for table `store_tb`
--
ALTER TABLE `store_tb`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_tb`
--
ALTER TABLE `detail_tb`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_tb`
--
ALTER TABLE `document_tb`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lot_tb`
--
ALTER TABLE `lot_tb`
  MODIFY `lot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_buy_tb`
--
ALTER TABLE `order_buy_tb`
  MODIFY `ob_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_tb`
--
ALTER TABLE `order_tb`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products_tb`
--
ALTER TABLE `products_tb`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quotation_tb`
--
ALTER TABLE `quotation_tb`
  MODIFY `quotation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `store_tb`
--
ALTER TABLE `store_tb`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_tb`
--
ALTER TABLE `detail_tb`
  ADD CONSTRAINT `detail_tb_ibfk_1` FOREIGN KEY (`detail_fitby`) REFERENCES `user_tb` (`user_id`);

--
-- Constraints for table `document_tb`
--
ALTER TABLE `document_tb`
  ADD CONSTRAINT `document_tb_ibfk_1` FOREIGN KEY (`doc_fiyby`) REFERENCES `user_tb` (`user_id`);

--
-- Constraints for table `lot_tb`
--
ALTER TABLE `lot_tb`
  ADD CONSTRAINT `lot_tb_ibfk_1` FOREIGN KEY (`lot_fitby`) REFERENCES `user_tb` (`user_id`),
  ADD CONSTRAINT `lot_tb_ibfk_2` FOREIGN KEY (`products_id`) REFERENCES `products_tb` (`products_id`);

--
-- Constraints for table `quotation_tb`
--
ALTER TABLE `quotation_tb`
  ADD CONSTRAINT `quotation_tb_ibfk_1` FOREIGN KEY (`quotation_fitby`) REFERENCES `user_tb` (`user_id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
