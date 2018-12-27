-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 27, 2018 lúc 04:25 PM
-- Phiên bản máy phục vụ: 5.7.23
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

DROP TABLE IF EXISTS `chitietdathang`;
CREATE TABLE IF NOT EXISTS `chitietdathang` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DatHangID` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` decimal(10,0) NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  `NgayDuKienGiaoHang` datetime NOT NULL,
  `GhiChu` varchar(250) DEFAULT NULL,
  `NguoiTao` varchar(250) DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `NguoiSua` varchar(250) DEFAULT NULL,
  `NgaySua` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`ID`, `DatHangID`, `MaSP`, `SoLuong`, `Gia`, `TinhTrang`, `NgayDuKienGiaoHang`, `GhiChu`, `NguoiTao`, `NgayTao`, `NguoiSua`, `NgaySua`) VALUES
(1, 1, 1, 10, '300000', 1, '2018-12-28 00:00:00', 'Không có ghi chú', NULL, NULL, NULL, NULL),
(2, 1, 2, 30, '500000', 1, '2018-12-27 00:00:00', 'Không', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `ID` varchar(255) NOT NULL,
  `Ten` varchar(250) NOT NULL,
  `GhiChu` varchar(250) DEFAULT NULL,
  `NguoiTao` varchar(250) DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `NguoiSua` varchar(250) DEFAULT NULL,
  `NgaySua` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`ID`, `Ten`, `GhiChu`, `NguoiTao`, `NgayTao`, `NguoiSua`, `NgaySua`) VALUES
('1', 'Áo', NULL, NULL, NULL, NULL, NULL),
('2', 'Quần', NULL, NULL, NULL, NULL, NULL),
('3', 'Váy', NULL, NULL, NULL, NULL, NULL),
('4', 'Giày', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

DROP TABLE IF EXISTS `dathang`;
CREATE TABLE IF NOT EXISTS `dathang` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `TongGia` decimal(10,0) NOT NULL,
  `LoaiGiaoHang` int(11) NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  `NgayTao` datetime NOT NULL,
  `NgayDuKienGiaoHang` datetime NOT NULL,
  `DiaChiNhanHangID` int(11) NOT NULL,
  `GhiChu` varchar(250) DEFAULT NULL,
  `NguoiTao` varchar(250) DEFAULT NULL,
  `NguoiSua` varchar(250) DEFAULT NULL,
  `NgaySua` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachinhanhang`
--

DROP TABLE IF EXISTS `diachinhanhang`;
CREATE TABLE IF NOT EXISTS `diachinhanhang` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NguoiDungID` int(11) NOT NULL,
  `TenNguoiNhan` varchar(250) NOT NULL,
  `SoDienThoai` varchar(250) NOT NULL,
  `DiaChiGiaoHang` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `SoDienThoai` varchar(250) NOT NULL,
  `DiaChi` varchar(250) DEFAULT NULL,
  `Email` varchar(250) NOT NULL,
  `HinhAnh` varchar(250) DEFAULT NULL,
  `Quyen` int(11) DEFAULT NULL,
  `GhiChu` varchar(250) DEFAULT NULL,
  `NguoiTao` varchar(250) DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `NguoiSua` varchar(250) DEFAULT NULL,
  `NgaySua` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`ID`, `UserName`, `Password`, `SoDienThoai`, `DiaChi`, `Email`, `HinhAnh`, `Quyen`, `GhiChu`, `NguoiTao`, `NgayTao`, `NguoiSua`, `NgaySua`) VALUES
(1, 'admin', 'admin', '01656142274', '1041 Trần Xuân Soạn, phường Tân Hưng, Quận 7, TPHCM', 'nguyenthuyvuong98@gmail.com', 'avt-01.png', 1, NULL, NULL, NULL, NULL, NULL),
(29, 'punguyen', 'punguyen', '123456789', 'Quận Gò Vấp', 'nguyenngocphuonguyen@gmail.com', 'AVT+COVER DIus.png', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'maithi', 'maithi', '123456', 'Quận Thủ Đức', 'maithi@gmail.com', 'DSC09758.jpg', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhasanxuat`
--

DROP TABLE IF EXISTS `nhasanxuat`;
CREATE TABLE IF NOT EXISTS `nhasanxuat` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(250) NOT NULL,
  `GhiChu` varchar(250) DEFAULT NULL,
  `NguoiTao` varchar(250) DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `NguoiSua` varchar(250) DEFAULT NULL,
  `NgaySua` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`ID`, `Ten`, `GhiChu`, `NguoiTao`, `NgayTao`, `NguoiSua`, `NgaySua`) VALUES
(1, 'TVU', NULL, NULL, NULL, NULL, NULL),
(2, 'PU', NULL, NULL, NULL, NULL, NULL),
(3, 'MAITHI', NULL, NULL, NULL, NULL, NULL),
(4, 'VUONG', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MaSP` varchar(250) NOT NULL,
  `TenSP` varchar(250) NOT NULL,
  `LoaiSP` int(11) NOT NULL,
  `NhaSanXuatID` int(11) NOT NULL,
  `XuatXu` varchar(250) DEFAULT NULL,
  `MoTa` text,
  `NgayTao` datetime NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `HinhAnh` varchar(250) DEFAULT NULL,
  `Gia` decimal(10,0) NOT NULL,
  `GiaGoc` int(11) NOT NULL,
  `LuotXem` int(11) NOT NULL,
  `TinhTrang` tinyint(1) NOT NULL,
  `GhiChu` varchar(250) DEFAULT NULL,
  `NguoiTao` varchar(250) DEFAULT NULL,
  `NguoiSua` varchar(250) DEFAULT NULL,
  `NgaySua` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID`, `MaSP`, `TenSP`, `LoaiSP`, `NhaSanXuatID`, `XuatXu`, `MoTa`, `NgayTao`, `SoLuong`, `HinhAnh`, `Gia`, `GiaGoc`, `LuotXem`, `TinhTrang`, `GhiChu`, `NguoiTao`, `NguoiSua`, `NgaySua`) VALUES
(76, 'SP001', 'Áo Khoác Gió Đỏ', 1, 1, 'Việt Nam', 'có', '2018-12-26 00:00:00', 10, 'ao-khoac.jpg', '150000', 200000, 14, 1, NULL, NULL, NULL, NULL),
(77, 'SP002', 'Áo Thun Trắng ', 1, 2, 'Việt Nam', 'good', '2018-12-26 00:00:00', 20, 'ao-thun-trang2.jpg', '250000', 300000, 63, 1, NULL, NULL, NULL, NULL),
(78, 'SP003', 'Áo Sơ Mi Đỏ', 1, 3, 'Việt Nam', 'oversize', '2018-12-26 00:00:00', 30, 'ao-somi-do.jpg', '300000', 360000, 23, 1, NULL, NULL, NULL, NULL),
(79, 'SP004', 'Áo Sơ Mi Trắng ', 1, 4, 'Việt Nam', 'oversize', '2018-12-26 00:00:00', 50, 'ao-somi-trang.jpg', '360000', 450000, 109, 1, NULL, NULL, NULL, NULL),
(80, 'SP005', 'Áo Sơ Mi vàng', 1, 2, 'Hàn Quốc', 'vải nhung', '2018-12-26 00:00:00', 50, 'ao-somi-vang-tron.jpg', '300000', 370000, 60, 1, NULL, NULL, NULL, NULL),
(81, 'SP006', 'Áo Sơ Mi Xanh', 1, 3, 'Việt Nam', 'vải nhung', '2018-12-26 00:00:00', 70, 'ao-somi-xanh-tron.jpg', '300000', 360000, 80, 1, NULL, NULL, NULL, NULL),
(82, 'SP007', 'Áo Thun Có Cổ', 1, 4, 'Việt Nam', 'oversize', '2018-12-26 00:00:00', 60, 'aothuncoco.jpg', '100000', 150000, 100, 1, NULL, NULL, NULL, NULL),
(83, 'SP008', 'Áo Thun Croptop Sọc', 1, 4, 'Hàn Quốc', 'tay dài', '2018-12-26 00:00:00', 90, 'ao-thun-croptop-soc-ngang.jpg', '200000', 250000, 90, 1, NULL, NULL, NULL, NULL),
(84, 'SP009', 'Shoulder Off', 1, 3, 'Việt Nam', 'có sọc', '2018-12-26 00:00:00', 50, 'shoulderoff.jpg', '200000', 250000, 100, 1, NULL, NULL, NULL, NULL),
(85, 'SP010', 'Shoulder Off 1', 1, 4, 'Việt Nam', 'Màu xanh', '2018-12-26 00:00:00', 60, 'shoulderoff1.jpg', '250000', 300000, 100, 1, NULL, NULL, NULL, NULL),
(86, 'SP011', 'Váy 2 Dây', 3, 1, 'Việt Nam', 'dáng dài', '2018-12-26 00:00:00', 50, 'vay01.jpg', '300000', 350000, 100, 1, NULL, NULL, NULL, NULL),
(87, 'SP012', 'Váy 2 Dây 1', 3, 1, 'Việt Nam', 'dáng dài', '2018-12-26 00:00:00', 60, 'vay02.jpg', '360000', 450000, 80, 1, NULL, NULL, NULL, NULL),
(88, 'SP013', 'Váy Sọc Xanh', 3, 1, 'Việt Nam', 'vải cotton', '2018-12-26 00:00:00', 60, 'vay03.jpg', '300000', 320000, 90, 1, NULL, NULL, NULL, NULL),
(89, 'SP014', 'Váy Vàng 2 dây', 3, 1, 'Việt Nam', 'ngắn trên đầu gối', '2018-12-26 00:00:00', 70, 'vay04.jpg', '360000', 360000, 100, 1, NULL, NULL, NULL, NULL),
(90, 'SP015', 'Váy Xanh ', 3, 1, 'Việt Nam', 'tay dài', '2018-12-26 00:00:00', 70, 'vay05.jpg', '400000', 420000, 30, 1, NULL, NULL, NULL, NULL),
(91, 'SP016', 'Váy trắng', 3, 1, 'Việt Nam', 'Quần giả váy', '2018-12-26 00:00:00', 70, 'vay06.jpg', '360000', 450000, 100, 1, NULL, NULL, NULL, NULL),
(92, 'SP017', 'Váy đen', 3, 1, 'Việt Nam', 'hai dây', '2018-12-26 00:00:00', 75, 'vay09.jpg', '360000', 369000, 55, 1, NULL, NULL, NULL, NULL),
(93, 'SP018', 'Váy 2 Dây 2', 3, 1, 'Việt Nam', 'Dài qua đầu gối', '2018-12-26 00:00:00', 62, 'vay08.jpg', '300000', 360000, 63, 1, NULL, NULL, NULL, NULL),
(94, 'SP019', 'Chân Váy ', 3, 1, 'Việt Nam', 'có túi', '2018-12-26 00:00:00', 56, 'vay10.jpg', '300000', 360000, 95, 1, NULL, NULL, NULL, NULL),
(95, 'SP020', 'Váy Sọc Dọc', 3, 1, 'Việt Nam', 'tay dài', '2018-12-26 00:00:00', 96, 'vay07.jpg', '200000', 270000, 95, 1, NULL, NULL, NULL, NULL),
(96, 'SP021', 'Giày bít mũi', 4, 2, 'Hàn Quốc', 'đế 3cm', '2018-12-26 00:00:00', 63, 'giay1.jpg', '400000', 459000, 56, 1, NULL, NULL, NULL, NULL),
(97, 'SP022', 'Giày cao cổ', 4, 2, 'Hàn Quốc', 'Đế 3cm', '2018-12-26 00:00:00', 65, 'giay2.jpg', '500000', 560000, 56, 1, NULL, NULL, NULL, NULL),
(98, 'SP023', 'Giày Lười', 4, 3, 'Việt Nam', 'Màu đen, size từ 35-40', '2018-12-26 00:00:00', 86, 'giay5.jpg', '350000', 370000, 45, 1, NULL, NULL, NULL, NULL),
(99, 'SP024', 'Sandal bít mũi', 4, 4, 'Việt Nam', 'đế 3cm', '2018-12-26 00:00:00', 49, 'giay3.jpg', '380000', 420000, 95, 1, NULL, NULL, NULL, NULL),
(100, 'SP025', 'Sandal hở mũi', 4, 4, 'Việt Nam', 'đế 3cm', '2018-12-26 00:00:00', 63, 'giay4.jpg', '500000', 562000, 35, 1, NULL, NULL, NULL, NULL),
(101, 'SP026', 'Sneaker Dằn Di', 4, 3, 'Việt Nam', 'size 35-40', '2018-12-26 00:00:00', 96, 'giay6.jpg', '600000', 650000, 56, 1, NULL, NULL, NULL, NULL),
(102, 'SP027', 'Giày cao cổ consever', 4, 3, 'Việt Nam', 'Màu đen, size từ 35-40', '2018-12-26 00:00:00', 42, 'giay7.jpg', '620000', 640000, 120, 1, NULL, NULL, NULL, NULL),
(103, 'SP028', 'Sneaker Trắng', 4, 4, 'Việt Nam', 'size 35-40', '2018-12-26 00:00:00', 80, 'giay10.jpg', '400000', 430000, 34, 1, NULL, NULL, NULL, NULL),
(104, 'SP029', 'giày cao gót ', 4, 1, 'Hàn Quốc', 'đế 7cm', '2018-12-26 00:00:00', 63, 'giay9.jpg', '850000', 930000, 130, 1, NULL, NULL, NULL, NULL),
(105, 'SP030', 'Giày Tây Nữ', 4, 1, 'Hàn Quốc', 'size 35-40', '2018-12-26 00:00:00', 65, 'giay11.jpg', '600000', 670000, 69, 1, NULL, NULL, NULL, NULL),
(106, 'SP031', 'Quần Jean Đen', 2, 2, 'Hàn Quốc', 'rách gối', '2018-12-26 00:00:00', 85, 'quan6.jpg', '350000', 380000, 96, 1, NULL, NULL, NULL, NULL),
(107, 'SP032', 'Quần đen sọc trắng', 2, 3, 'Việt Nam', 'có size s m l', '2018-12-26 00:00:00', 48, 'quan5.jpg', '230000', 250000, 64, 1, NULL, NULL, NULL, NULL),
(108, 'SP033', 'Quần Baggy', 2, 3, 'Việt Nam', 'rách gối', '2018-12-26 00:00:00', 85, 'quan3.jpg', '350000', 360000, 52, 1, NULL, NULL, NULL, NULL),
(109, 'SP034', 'Quần Baggy Trơn', 2, 1, 'Hàn Quốc', 'Không rách gối, size s m l xl', '2018-12-26 00:00:00', 150, 'quan4.jpg', '430000', 450000, 64, 1, NULL, NULL, NULL, NULL),
(110, 'SP035', 'Quần Skinny Đen', 2, 1, 'Hàn Quốc', 'Dáng đứng', '2018-12-26 00:00:00', 64, 'quan2.jpg', '320000', 350000, 36, 1, NULL, NULL, NULL, NULL),
(111, 'SP036', 'Quần Lửng', 2, 3, 'Việt Nam', 'màu đen', '2018-12-26 00:00:00', 92, 'quan10.jpg', '150000', 200000, 52, 1, NULL, NULL, NULL, NULL),
(112, 'SP037', 'Quần jogger', 2, 4, 'Việt Nam', 'Màu đen đỏ vàng', '2018-12-26 00:00:00', 43, 'quan9.jpg', '350000', 360000, 25, 1, NULL, NULL, NULL, NULL),
(113, 'SP038', 'Quần Trắng', 2, 4, 'Việt Nam', 'Sọc đen', '2018-12-26 00:00:00', 62, 'quan8.jpg', '200000', 240000, 75, 1, NULL, NULL, NULL, NULL),
(114, 'SP039', 'Quần ống Rộng', 2, 1, 'Hàn Quốc', 'Dáng dài', '2018-12-26 00:00:00', 65, 'quan7.jpg', '300000', 350000, 69, 1, NULL, NULL, NULL, NULL),
(115, 'SP040', 'Quần Jean', 2, 3, 'Việt Nam', 'size s m l', '2018-12-26 00:00:00', 64, 'quan1.jpg', '450000', 560000, 24, 1, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
