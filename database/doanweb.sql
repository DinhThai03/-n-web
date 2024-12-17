-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2024 at 05:56 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doanweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethd`
--

DROP TABLE IF EXISTS `chitiethd`;
CREATE TABLE IF NOT EXISTS `chitiethd` (
  `mahd` int(11) NOT NULL,
  `madt` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  KEY `fk_chitiethd_don` (`mahd`),
  KEY `fk_chitiethd_dienthoai` (`madt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitiethd`
--

INSERT INTO `chitiethd` (`mahd`, `madt`, `soluong`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 4, 5),
(5, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `dienthoai`
--

DROP TABLE IF EXISTS `dienthoai`;
CREATE TABLE IF NOT EXISTS `dienthoai` (
  `madt` int(11) NOT NULL AUTO_INCREMENT,
  `maloai` int(11) NOT NULL,
  `mahang` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `bonho` varchar(50) NOT NULL,
  `ram` varchar(50) NOT NULL,
  `gia` float NOT NULL,
  `mota` text NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  PRIMARY KEY (`madt`),
  KEY `fk_dienthoai_hang` (`mahang`),
  KEY `fk_dienthoai_loai` (`maloai`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dienthoai`
--

INSERT INTO `dienthoai` (`madt`, `maloai`, `mahang`, `ten`, `bonho`, `ram`, `gia`, `mota`, `soluong`, `hinhanh`) VALUES
(1, 1, 1, 'Samsung Galaxy S23', '128GB', '8GB', 24000, 'Smartphone cao cấp của Samsung', 100, 'samsung_s23.webp'),
(2, 2, 1, 'Samsung Galaxy S22', '256GB', '12GB', 22000, 'Smartphone cao cấp của Samsung', 200, 'samsung_s22.webp'),
(3, 1, 2, 'iPhone 14', '128GB', '6GB', 30000, 'Smartphone cao cấp của Apple', 150, 'iphone_14.webp'),
(4, 2, 3, 'Xiaomi Redmi Note 12', '64GB', '4GB', 9000, 'Điện thoại giá rẻ Xiaomi', 250, 'xiaomi_redmi_note_12.webp'),
(5, 1, 4, 'Oppo A54', '64GB', '4GB', 7000, 'Điện thoại Oppo tầm trung', 180, 'oppo_a54.webp'),
(6, 2, 5, 'Vivo V23', '128GB', '8GB', 12000, 'Điện thoại Vivo màn hình đẹp', 120, 'vivo_v23.webp'),
(7, 1, 1, 'Samsung Galaxy Note 20', '128GB', '8GB', 27000, 'Điện thoại Samsung màn hình rộng, bút S Pen', 200, 'samsung_note20.webp'),
(8, 1, 2, 'iPhone 13 Pro', '128GB', '6GB', 35000, 'Mẫu iPhone cao cấp với camera tốt nhất', 150, 'iphone_13_pro.webp'),
(9, 1, 2, 'iPhone 12', '64GB', '4GB', 25000, 'Điện thoại Apple với hiệu năng mạnh mẽ', 180, 'iphone_12.webp'),
(10, 2, 3, 'Xiaomi Mi 11', '128GB', '8GB', 15000, 'Điện thoại Xiaomi với hiệu năng tốt và thiết kế sang trọng', 200, 'xiaomi_mi_11.webp'),
(11, 1, 3, 'Xiaomi Mi 10', '256GB', '8GB', 14000, 'Điện thoại Xiaomi với màn hình OLED', 250, 'xiaomi_mi_10.webp'),
(12, 1, 4, 'Oppo Reno 5', '128GB', '8GB', 14000, 'Điện thoại Oppo, thiết kế mỏng nhẹ, camera selfie đẹp', 180, 'oppo_reno5.webp'),
(13, 1, 4, 'Oppo F19 Pro+', '256GB', '8GB', 15000, 'Oppo F19 Pro+ camera ấn tượng', 190, 'oppo_f19.webp'),
(14, 2, 5, 'Vivo V21', '128GB', '8GB', 10000, 'Vivo V21 - Camera cực kỳ sắc nét', 210, 'vivo_v21.webp'),
(15, 2, 5, 'Vivo Y53s', '128GB', '8GB', 8500, 'Vivo Y53s - Điện thoại cấu hình mạnh', 230, 'vivo_y53s.webp'),
(16, 1, 2, 'iPhone SE 2020', '64GB', '3GB', 20000, 'iPhone nhỏ gọn với hiệu suất cao', 170, 'iphone_se.webp'),
(17, 2, 1, 'Samsung Galaxy A52', '128GB', '6GB', 12000, 'Điện thoại Galaxy A52 cấu hình ổn', 250, 'samsung_a52.webp'),
(18, 1, 3, 'Xiaomi Poco X3 Pro', '128GB', '6GB', 8000, 'Xiaomi Poco X3 Pro - Smartphone giá rẻ với hiệu năng mạnh', 300, 'xiaomi_poco_x3_pro.webp'),
(19, 1, 1, 'Samsung Galaxy M32', '64GB', '4GB', 8500, 'Điện thoại với pin khủng và màn hình 90Hz', 270, 'samsung_m32.webp'),
(20, 1, 4, 'Oppo A15s', '128GB', '4GB', 6000, 'Điện thoại Oppo giá rẻ với màn hình lớn', 200, 'oppo_a15s.webp'),
(21, 1, 5, 'Vivo Y73', '128GB', '8GB', 12000, 'Vivo Y73 màn hình OLED, camera đẹp', 250, 'vivo_y73.webp'),
(22, 1, 5, 'Vivo Y12s', '64GB', '3GB', 6000, 'Vivo Y12s - Smartphone giá rẻ', 280, 'vivo_y12s.webp'),
(23, 1, 1, 'Samsung A72', '128GB', '8GB', 16000, 'Điện thoại Samsung A72 màn hình Super AMOLED', 220, 'samsung_a72.webp'),
(24, 1, 1, 'Samsung M51', '128GB', '6GB', 15000, 'Điện thoại Samsung M51 với pin siêu lâu', 240, 'samsung_m51.webp'),
(25, 2, 2, 'iPhone 11', '64GB', '4GB', 23000, 'iPhone 11 với 3 camera ấn tượng', 200, 'iphone_11.webp'),
(26, 1, 3, 'Xiaomi Redmi 10', '64GB', '4GB', 5500, 'Xiaomi Redmi 10 giá rẻ', 250, 'xiaomi_redmi_10.webp'),
(27, 1, 3, 'Xiaomi Redmi Note 10', '128GB', '4GB', 7000, 'Xiaomi Redmi Note 10 với cấu hình ổn định', 260, 'xiaomi_redmi_note_10.webp'),
(28, 1, 4, 'Oppo A73', '128GB', '4GB', 11000, 'Oppo A73 với thiết kế mỏng nhẹ', 240, 'oppo_a73.webp'),
(29, 1, 5, 'Vivo V20', '128GB', '8GB', 16000, 'Vivo V20 với camera trước tuyệt vời', 230, 'vivo_v20.webp'),
(30, 2, 1, 'Samsung Galaxy Z Fold 4', '512GB', '12GB', 55000, 'Điện thoại gập Galaxy Z Fold 4 siêu sang trọng', 100, 'samsung_z_fold4.webp'),
(31, 2, 3, 'Xiaomi Mi Mix 4', '256GB', '12GB', 35000, 'Xiaomi Mi Mix 4 với màn hình không viền', 120, 'xiaomi_mi_mix_4.webp'),
(32, 1, 2, 'iPhone 13 Mini', '128GB', '4GB', 27000, 'iPhone 13 Mini nhỏ gọn, dễ sử dụng', 150, 'iphone_13_mini.webp'),
(33, 2, 5, 'Vivo S1 Pro', '128GB', '6GB', 11000, 'Vivo S1 Pro với camera ấn tượng và thiết kế sang trọng', 210, 'vivo_s1_pro.webp'),
(34, 2, 4, 'Oppo A91', '128GB', '8GB', 15000, 'Oppo A91 với cấu hình ổn định', 190, 'oppo_a91.webp'),
(35, 1, 4, 'Oppo F15', '128GB', '6GB', 12000, 'Oppo F15 cho những ai thích selfie', 210, 'oppo_f15.webp'),
(36, 1, 3, 'Xiaomi Redmi Note 9S', '128GB', '6GB', 8500, 'Điện thoại Xiaomi với hiệu năng vượt trội', 270, 'xiaomi_redmi_note_9s.webp'),
(37, 2, 5, 'Vivo Y19', '128GB', '4GB', 8000, 'Vivo Y19 giá rẻ với pin lâu', 280, 'vivo_y19.webp'),
(38, 1, 4, 'Oppo Reno Z', '128GB', '4GB', 9500, 'Oppo Reno Z với thiết kế thanh mảnh', 250, 'oppo_reno_z.webp'),
(39, 1, 2, 'iPhone XR', '64GB', '3GB', 19000, 'Điện thoại iPhone XR với hiệu năng tốt', 230, 'iphone_xr.webp'),
(40, 2, 3, 'Xiaomi Mi 9T', '128GB', '6GB', 15000, 'Xiaomi Mi 9T với camera pop-up', 220, 'xiaomi_mi_9t.webp'),
(41, 1, 4, 'Oppo A95', '128GB', '8GB', 16000, 'Oppo A95 cấu hình mạnh mẽ với giá hợp lý', 200, 'oppo_a95.webp'),
(42, 1, 1, 'Samsung Galaxy J7', '16GB', '2GB', 7000, 'Samsung Galaxy J7 với hiệu suất ổn', 210, 'samsung_j7.webp'),
(43, 2, 5, 'Vivo V17', '128GB', '6GB', 13000, 'Vivo V17 với màn hình lớn', 180, 'vivo_v17.webp'),
(44, 1, 3, 'Xiaomi Mi A3', '64GB', '4GB', 6000, 'Xiaomi Mi A3 Android One', 220, 'xiaomi_mi_a3.webp'),
(45, 1, 4, 'Oppo F11', '128GB', '6GB', 13500, 'Oppo F11 với camera zoom ấn tượng', 250, 'oppo_f11.webp'),
(46, 2, 2, 'iPhone 7 Plus', '64GB', '3GB', 14000, 'iPhone 7 Plus cũ với camera kép', 200, 'iphone_7plus.webp'),
(47, 2, 4, 'Oppo A5 2020', '64GB', '3GB', 7000, 'Oppo A5 2020 pin khủng', 280, 'oppo_a5_2020.webp'),
(48, 1, 3, 'Xiaomi Redmi 9', '64GB', '3GB', 4500, 'Xiaomi Redmi 9 giá rẻ', 300, 'xiaomi_redmi_9.webp'),
(50, 1, 2, '1', '1', '1', 1, '1', 1, 'iphone_7plus.webp');

-- --------------------------------------------------------

--
-- Table structure for table `don`
--

DROP TABLE IF EXISTS `don`;
CREATE TABLE IF NOT EXISTS `don` (
  `madon` int(11) NOT NULL AUTO_INCREMENT,
  `matk` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL,
  PRIMARY KEY (`madon`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `don`
--

INSERT INTO `don` (`madon`, `matk`, `tongtien`) VALUES
(1, 1, 24000),
(2, 2, 30000),
(3, 3, 22000),
(4, 4, 10000),
(5, 5, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

DROP TABLE IF EXISTS `giohang`;
CREATE TABLE IF NOT EXISTS `giohang` (
  `magh` int(11) NOT NULL AUTO_INCREMENT,
  `matk` int(11) NOT NULL,
  `madt` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  PRIMARY KEY (`magh`),
  KEY `fk_giohang_dienthoai` (`madt`),
  KEY `fk_giohang_taikhoan` (`matk`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`magh`, `matk`, `madt`, `soluong`) VALUES
(27, 2, 1, 1),
(28, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hang`
--

DROP TABLE IF EXISTS `hang`;
CREATE TABLE IF NOT EXISTS `hang` (
  `mahang` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(50) NOT NULL,
  `mota` text,
  PRIMARY KEY (`mahang`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hang`
--

INSERT INTO `hang` (`mahang`, `ten`, `mota`) VALUES
(1, 'Samsung', 'Hãng điện thoại nổi tiếng đến từ Hàn Quốc'),
(2, 'Apple', 'Hãng điện thoại nổi tiếng đến từ Mỹ'),
(3, 'Xiaomi', 'Hãng điện thoại đến từ Trung Quốc'),
(4, 'Oppo', 'Hãng điện thoại đến từ Trung Quốc'),
(5, 'Vivo', 'Hãng điện thoại đến từ Trung Quốc');

-- --------------------------------------------------------

--
-- Table structure for table `phanloai`
--

DROP TABLE IF EXISTS `phanloai`;
CREATE TABLE IF NOT EXISTS `phanloai` (
  `maloai` int(11) NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(255) NOT NULL,
  PRIMARY KEY (`maloai`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phanloai`
--

INSERT INTO `phanloai` (`maloai`, `tenloai`) VALUES
(1, 'Smartphone'),
(2, 'Feature Phone');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `matk` int(11) NOT NULL AUTO_INCREMENT,
  `tentk` varchar(50) NOT NULL,
  `matkhau` varchar(100) DEFAULT NULL,
  `tennguoidung` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dienthoai` int(11) DEFAULT NULL,
  `diachi` varchar(250) DEFAULT NULL,
  `phanquyen` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`matk`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`matk`, `tentk`, `matkhau`, `tennguoidung`, `email`, `dienthoai`, `diachi`, `phanquyen`) VALUES
(1, 'admin', 'admin', 'Nguyen Van A', 'user1@gmail.com', 123456789, 'Hà Nội', 1),
(2, 'user2', 'password123', 'Nguyen Thi B', 'user2@gmail.com', 234567890, 'Hồ Chí Minh', 0),
(17, 'phuong', 'Phuong123', 'tran thanh phuong', 'phuongsd2016@gmail.com', 907350813, '166/20 Dương Bá Trạc phường 2 Quận 8', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD CONSTRAINT `fk_chitiethd_dienthoai` FOREIGN KEY (`madt`) REFERENCES `dienthoai` (`madt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chitiethd_don` FOREIGN KEY (`mahd`) REFERENCES `don` (`madon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dienthoai`
--
ALTER TABLE `dienthoai`
  ADD CONSTRAINT `fk_dienthoai_hang` FOREIGN KEY (`mahang`) REFERENCES `hang` (`mahang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dienthoai_loai` FOREIGN KEY (`maloai`) REFERENCES `phanloai` (`maloai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_giohang_dienthoai` FOREIGN KEY (`madt`) REFERENCES `dienthoai` (`madt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_giohang_taikhoan` FOREIGN KEY (`matk`) REFERENCES `taikhoan` (`matk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
