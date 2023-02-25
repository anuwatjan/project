-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 24, 2023 at 03:13 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `backup_product`
--

CREATE TABLE `backup_product` (
  `backup_product_id` int(11) NOT NULL,
  `product_id` varchar(300) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_admit` varchar(300) NOT NULL,
  `backup_product_create` varchar(300) NOT NULL,
  `product_unit` varchar(300) NOT NULL,
  `product_payoff` varchar(300) NOT NULL,
  `product_balance` varchar(300) NOT NULL COMMENT 'คงเหลือ',
  `good_RefNo` varchar(300) NOT NULL,
  `backup_note` varchar(300) NOT NULL COMMENT 'ประวัติ คำอธิบาย',
  `backup_employee` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` varchar(300) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_quantity` varchar(300) NOT NULL,
  `product_price` varchar(300) NOT NULL,
  `customer_id` varchar(300) NOT NULL,
  `customer_name` varchar(300) NOT NULL,
  `vat` varchar(300) NOT NULL,
  `total` varchar(300) NOT NULL,
  `employee_id` varchar(300) NOT NULL,
  `employee_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(2253, '\n  ยาต้านไวรัส'),
(2254, '\n  ยาคุมกำเนิด‎ '),
(2255, '\n  ยาแก้ท้องร่วง‎'),
(2256, '\n  ยาบรรเทาปวด‎'),
(2257, '\n  ยาปฏิชีวนะ‎'),
(2258, '\n   ยายับยั้งการหลั่งกรด‎ '),
(2259, '\n  ยาระบาย‎ '),
(2260, '\n  ยาลดไข้'),
(2261, '\n  ยาลดกรด'),
(2262, '\n  ยาลดความดัน‎ '),
(2263, '\n  ยาลดความอ้วน‎'),
(2264, '\n  วิตามิน‎'),
(2265, '\n  ยากำพร้า'),
(2266, '\n  ยาแก้คัดจมูก‎'),
(2269, 'รถเข็นผู้ป่วย');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(300) NOT NULL,
  `customer_last` varchar(300) NOT NULL,
  `customer_phone` varchar(300) NOT NULL,
  `customer_address` varchar(300) NOT NULL,
  `customer_drug` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(300) NOT NULL,
  `employee_phone` varchar(300) NOT NULL,
  `employee_email` varchar(300) NOT NULL,
  `employee_role` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_phone`, `employee_email`, `employee_role`, `username`, `password`) VALUES
(1, 'ปลื้ม', '0641318526', 'pluem@gmail.com', 'เภสัชกร', 'ei', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `goods_id` int(11) NOT NULL,
  `good_RefNo` varchar(300) NOT NULL,
  `po_buyer` varchar(300) NOT NULL,
  `good_saler` varchar(300) NOT NULL,
  `good_status` varchar(300) NOT NULL,
  `good_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`goods_id`, `good_RefNo`, `po_buyer`, `good_saler`, `good_status`, `good_create`) VALUES
(1, 'GO-eAIecI6Jhp', '', '', '1', '2023-01-24 14:58:21'),
(2, 'GO-wuR47Nox43', '', '', '3', '2023-01-24 14:36:58'),
(3, 'GO-2u02vUGHyY', '', '', '0', '2023-01-24 14:42:00'),
(4, 'GO-zMAJxKhHlL', '', 'บริษัท ไบโอติคอน จำกัด', '0', '2023-01-24 15:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `goods_detail`
--

CREATE TABLE `goods_detail` (
  `goods_detail_id` int(11) NOT NULL,
  `po_id` varchar(300) NOT NULL,
  `po_RefNo` varchar(300) NOT NULL,
  `product_id` varchar(300) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_quantity` varchar(300) NOT NULL,
  `product_price` varchar(300) NOT NULL,
  `product_total` varchar(300) NOT NULL,
  `product_start_date` date NOT NULL,
  `product_end_date` date NOT NULL,
  `good_id` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods_detail`
--

INSERT INTO `goods_detail` (`goods_detail_id`, `po_id`, `po_RefNo`, `product_id`, `product_name`, `product_quantity`, `product_price`, `product_total`, `product_start_date`, `product_end_date`, `good_id`) VALUES
(1, '2', 'PO-ik4x1nqbjgld', '1', 'รถเข็นสีดำ ขนาดกลาง1', '10', '25000', '250000', '2023-01-24', '2023-01-29', '1'),
(2, '3', 'PO-39io3sdvfiw4', '6', 'ซาร่า ชนิดน้ำ', '100', '25', '2500', '0000-00-00', '0000-00-00', '2'),
(3, '6', 'PO-0nwvch5ugqto', '1', 'รถเข็นสีดำ ขนาดกลาง1', '70', '25000', '1750000', '0000-00-00', '0000-00-00', '3'),
(4, '4', 'PO-dzys7nvi7taj', '1', 'รถเข็นสีดำ ขนาดกลาง1', '20', '25000', '500000', '0000-00-00', '0000-00-00', '4'),
(5, '4', 'PO-dzys7nvi7taj', '6', 'ซาร่า ชนิดน้ำ', '50', '25', '1250', '0000-00-00', '0000-00-00', '4');

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `po_id` int(11) NOT NULL,
  `po_create` datetime NOT NULL,
  `po_RefNo` varchar(300) NOT NULL,
  `po_buyer` varchar(300) NOT NULL COMMENT 'ผู้ซื้อ',
  `po_status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`po_id`, `po_create`, `po_RefNo`, `po_buyer`, `po_status`) VALUES
(1, '2023-01-24 14:17:35', 'PO-q8l2zz6kw0e9', 'ปลื้ม', 'ยกเลิก'),
(2, '2023-01-24 14:30:46', 'PO-ik4x1nqbjgld', 'ปลื้ม', 'รับสินค้าแล้ว'),
(3, '2023-01-24 14:31:15', 'PO-39io3sdvfiw4', 'ปลื้ม', 'สั่งแล้ว'),
(4, '2023-01-24 14:31:29', 'PO-dzys7nvi7taj', 'ปลื้ม', 'สั่งแล้ว'),
(5, '2023-01-24 14:36:02', 'PO-sacd6q9e80q7', 'ปลื้ม', 'รอยืนยัน'),
(6, '2023-01-24 14:41:22', 'PO-0nwvch5ugqto', 'ปลื้ม', 'สั่งแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `po_detail`
--

CREATE TABLE `po_detail` (
  `po_detail_id` int(11) NOT NULL,
  `po_id` varchar(300) NOT NULL,
  `product_id` varchar(300) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_unit` varchar(300) NOT NULL,
  `product_price` varchar(300) NOT NULL,
  `product_quantity` varchar(300) NOT NULL,
  `product_total` varchar(300) NOT NULL,
  `product_suppiles` varchar(300) NOT NULL,
  `product_start_date` date NOT NULL,
  `product_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `po_detail`
--

INSERT INTO `po_detail` (`po_detail_id`, `po_id`, `product_id`, `product_name`, `product_unit`, `product_price`, `product_quantity`, `product_total`, `product_suppiles`, `product_start_date`, `product_end_date`) VALUES
(1, '1', '1', 'รถเข็นสีดำ ขนาดกลาง1', 'ชุด', '25000', '1', '25000', 'บริษัท ไบโอติคอน จำกัด', '0000-00-00', '0000-00-00'),
(2, '2', '1', 'รถเข็นสีดำ ขนาดกลาง1', 'ชุด', '25000', '10', '250000', 'บริษัท ไบโอติคอน จำกัด', '2023-01-24', '2023-01-29'),
(3, '3', '6', 'ซาร่า ชนิดน้ำ', 'ขวด', '25', '100', '2500', 'บริษัท มิลลิเมด บีเอฟเอส จำกัด', '0000-00-00', '0000-00-00'),
(4, '4', '1', 'รถเข็นสีดำ ขนาดกลาง1', 'ชุด', '25000', '20', '500000', 'บริษัท ไบโอติคอน จำกัด', '0000-00-00', '0000-00-00'),
(5, '4', '6', 'ซาร่า ชนิดน้ำ', 'ขวด', '25', '50', '1250', 'บริษัท มิลลิเมด บีเอฟเอส จำกัด', '0000-00-00', '0000-00-00'),
(6, '5', '1', 'รถเข็นสีดำ ขนาดกลาง1', 'ชุด', '25000', '50', '1250000', 'บริษัท ไบโอติคอน จำกัด', '0000-00-00', '0000-00-00'),
(7, '6', '1', 'รถเข็นสีดำ ขนาดกลาง1', 'ชุด', '25000', '70', '1750000', 'บริษัท ไบโอติคอน จำกัด', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_price` varchar(300) NOT NULL,
  `product_sell` varchar(300) NOT NULL,
  `product_point` varchar(300) NOT NULL,
  `product_type` varchar(300) NOT NULL,
  `product_cate` varchar(300) NOT NULL,
  `product_symp` varchar(300) NOT NULL,
  `product_unit` varchar(300) NOT NULL,
  `product_image` varchar(300) NOT NULL,
  `product_suppiles` varchar(300) NOT NULL,
  `product_sku` varchar(300) NOT NULL,
  `product_status` int(1) NOT NULL,
  `product_quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_sell`, `product_point`, `product_type`, `product_cate`, `product_symp`, `product_unit`, `product_image`, `product_suppiles`, `product_sku`, `product_status`, `product_quantity`) VALUES
(1, 'รถเข็นสีดำ ขนาดกลาง1', '25000', '26000', '20', 'อุปกรณ์ทางการแพทย์', 'รถเข็นผู้ป่วย', 'กระดูก กล้ามเนื้อ และข้อ', 'ชุด', '1674543273154448-1.jpg', 'บริษัท ไบโอติคอน จำกัด', 'A011', 0, 0),
(6, 'ซาร่า ชนิดน้ำ', '25', '30', '50', 'ยารักษาโรค', '\r\n  ยาต้านไวรัส', 'หู คอ จมูก และ ช่องปาก', 'ขวด', '1674544437052752_1.jpg', 'บริษัท มิลลิเมด บีเอฟเอส จำกัด', 'SARA005', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `sales_RefNo` varchar(300) NOT NULL,
  `sales_date` varchar(300) NOT NULL,
  `sales_get` varchar(300) NOT NULL,
  `product_quantity` varchar(300) NOT NULL,
  `customer_id` varchar(300) NOT NULL,
  `customer_name` varchar(300) NOT NULL,
  `product_sell` varchar(300) NOT NULL,
  `product_price` varchar(300) NOT NULL,
  `product_id` varchar(300) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `sales_change` varchar(300) NOT NULL COMMENT 'เงินทอน',
  `product_total` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `stock_import` varchar(300) NOT NULL,
  `product_id` varchar(300) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_lot` varchar(300) NOT NULL,
  `product_quantity` varchar(300) NOT NULL,
  `product_start_date` date NOT NULL,
  `product_end_date` date NOT NULL,
  `good_RefNo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suppiles`
--

CREATE TABLE `suppiles` (
  `suppiles_id` int(11) NOT NULL,
  `suppiles_name` varchar(300) NOT NULL,
  `suppiles_company` varchar(300) NOT NULL,
  `suppiles_phone` varchar(300) NOT NULL,
  `suppiles_address` varchar(300) NOT NULL,
  `suppiles_email` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppiles`
--

INSERT INTO `suppiles` (`suppiles_id`, `suppiles_name`, `suppiles_company`, `suppiles_phone`, `suppiles_address`, `suppiles_email`, `description`) VALUES
(222, 'Hatakabb (Sim Tien Hor) Co., Ltd.', 'Hatakabb (Sim Tien Hor) Co., Ltd.', '+66 2898-5454', '1 พระรามที่ 2 ท่าข้าม บางขุนเทียน กรุงเทพมหานคร 10150', '', 'ผลิตยาอม ผลิตยาสมุนไพร ยาแผนโบราณ'),
(223, 'นายประชุม แก้วประดิษฐ์', 'นายประชุม แก้วประดิษฐ์', '-', '9/2 10 บางเลน บางเลน นครปฐม 73130', '', 'ประเภทยาสมุนไพร ชนิดเม็ดและแคปซูลรวมถึงยาภายนอก'),
(224, 'บริษัท กรุงเทพทิพโอสถ จำกัด', 'บริษัท กรุงเทพทิพโอสถ จำกัด', '02 441 4966', '67/5 เกิดโชค (ทวีวัฒนา-กาญจนาภิเษก 31) ทวีวัฒนา-กาญจนาภิเษก ศาลาธรรมสพน์ ทวีวัฒนา กรุงเทพมหานคร 10170', '', 'ผลิตยาจากสมุนไพร ยาแผนโบราณ ยาแผนปัจจุบัน'),
(225, 'บริษัท โกลด์ มิ้นท์ โปรดักส์ จำกัด', 'บริษัท โกลด์ มิ้นท์ โปรดักส์ จำกัด', '0-2744-8497-8', '248/1 โสภณ เลียบทางด่วน บางนา บางนา กรุงเทพมหานคร 10260', '', 'ยาดมโป๊ยเซียน ยาดมพีเป๊กซ์ PE-PEX พิมเสนน้ำ โป๊ยเซียน ผลิตยาและอาหารเสริม ยาแผนโบราณ ยาแผนปัจจุบัน โรงงานยาหม่อง'),
(226, 'บริษัท จงไท้เจี้ยนหมิงเอี้ยวเอี้ย (กรุ๊ป)จำกัด', 'บริษัท จงไท้เจี้ยนหมิงเอี้ยวเอี้ย (กรุ๊ป)จำกัด', '-', '30/103 โคกขาม เมืองสมุทรสาคร สมุทรสาคร 74000', '', 'ยาแผนโบราณ ยาสำเร็จรูป รูปแบบแคปซูลแข็ง'),
(227, 'บริษัท เจเค เฮิร์บ อินเตอร์ เนชั่นแนล จํากัด', 'บริษัท เจเค เฮิร์บ อินเตอร์ เนชั่นแนล จํากัด', '+66 (0) 2 633-1113-5', '111 13 บางนา-ตราด กม. 9 บางพลีใหญ่ บางพลี สมุทรปราการ 10540', '', 'ยาแผนโบราณ ยาแผนปัจจุบัน ผลิตยาสมุนไพร'),
(228, 'บริษัท นิวคอนเซพท์ โปรดัคท์ จำกัด', 'บริษัท นิวคอนเซพท์ โปรดัคท์ จำกัด', '+66 (0) 2731-1029', '156 ซอยลาดพร้าว 107 ลาดพร้าว คลองจั่น บางกะปิ กรุงเทพมหานคร 10240', '', 'ยาแผนโบราณ ยาแผนปัจจุบัน รายชื่อโรงงานผลิตยา'),
(229, 'บริษัท ไบโอติคอน จำกัด', 'บริษัท ไบโอติคอน จำกัด', '099-356-9156', '313 บางชัน คลองสามวา กรุงเทพมหานคร 10510', '', 'ยาและอาหารเสริม ผลิตอาหารเสริม เครื่องสำอาง ผลิตยาสมุนไพร'),
(230, 'บริษัท เพอเฟคท์ ไลน์ อินเตอร์เนชั่นแนล จำกัด', 'บริษัท เพอเฟคท์ ไลน์ อินเตอร์เนชั่นแนล จำกัด', '-', '99/45 3 บางนา-ตราด บางเสาธง บางเสาธง สมุทรปราการ 10540', '', 'ผลิต แบ่งบรรจุ จำหน่าย นำเข้า เครื่องสำอาง เครื่องสมุนไพร ยาสมุนไพร ยาแผนโบราณ ยารักษาโรคแผนปัจจุบันทุกประเภท ทั้งใน และนอกประเทศ'),
(231, 'บริษัท มิลลิเมด บีเอฟเอส จำกัด', 'บริษัท มิลลิเมด บีเอฟเอส จำกัด', '089-0631195', '179 8 ผางาม เวียงชัย เชียงราย 57210', '', 'ผลิตยารักษาโรคปราศจากเชื้อชนิดฉีด ชนิดผง พ่นสูด ยาหยอดตา ยาปฏิชีวนะ ชนิดฉีด น้ำเกลือ น้ำกลั่น'),
(232, 'บริษัท เอสบีเค เฮอร์เบอลิสท์ จำกัด', 'บริษัท เอสบีเค เฮอร์เบอลิสท์ จำกัด', '0-3572-1286', '129/44 วังจุฬา วังน้อย พระนครศรีอยุธยา 13170', '', 'ผลิตยาและอาหารเสริม ผลิตยาสมุนไพร');

-- --------------------------------------------------------

--
-- Table structure for table `symptons`
--

CREATE TABLE `symptons` (
  `symp_id` int(11) NOT NULL,
  `symp_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `symptons`
--

INSERT INTO `symptons` (`symp_id`, `symp_name`) VALUES
(1, 'ระบบหัวใจและหลอดเลือด'),
(2, 'หู คอ จมูก และ ช่องปาก'),
(3, 'ระบบสูตินารีเวช'),
(4, 'มะเร็งและยากดภูมิคุ้มกัน'),
(5, 'ระบบประสาท'),
(6, 'ตา'),
(7, 'ยาดมสลบ'),
(8, 'วัคซีน'),
(9, 'ระบบทางเดินอาหาร'),
(10, 'กระดูก กล้ามเนื้อ และข้อ'),
(11, 'ระบบต่อมไร้ท่อ'),
(12, 'ผิวหนัง'),
(13, 'ระบบทางเดินหายใจ');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'ยารักษาโรค'),
(2, 'ผลิตภัณฑ์เสริมอาหาร'),
(3, 'ผลิตภัณฑ์เสริมความงาม'),
(4, 'อุปกรณ์ทางการแพทย์'),
(5, 'อาหาร/เครื่องดื่ม');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(1, 'เตียง'),
(2, 'เครื่อง'),
(3, 'ชุด'),
(4, 'ตัว'),
(5, 'ถัง'),
(6, 'คู่'),
(7, 'แผง'),
(8, 'ขวด'),
(9, 'กระปุก'),
(10, 'เม็ด');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backup_product`
--
ALTER TABLE `backup_product`
  ADD PRIMARY KEY (`backup_product_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`goods_id`);

--
-- Indexes for table `goods_detail`
--
ALTER TABLE `goods_detail`
  ADD PRIMARY KEY (`goods_detail_id`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `po_detail`
--
ALTER TABLE `po_detail`
  ADD PRIMARY KEY (`po_detail_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `suppiles`
--
ALTER TABLE `suppiles`
  ADD PRIMARY KEY (`suppiles_id`);

--
-- Indexes for table `symptons`
--
ALTER TABLE `symptons`
  ADD PRIMARY KEY (`symp_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backup_product`
--
ALTER TABLE `backup_product`
  MODIFY `backup_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2270;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `goods_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `goods_detail`
--
ALTER TABLE `goods_detail`
  MODIFY `goods_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `po_detail`
--
ALTER TABLE `po_detail`
  MODIFY `po_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suppiles`
--
ALTER TABLE `suppiles`
  MODIFY `suppiles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;
--
-- AUTO_INCREMENT for table `symptons`
--
ALTER TABLE `symptons`
  MODIFY `symp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
