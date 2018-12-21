-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 21, 2018 lúc 03:05 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('3', 'Áo sơ mi', NULL, NULL, NULL, NULL, NULL),
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
  `GhiChu` varchar(250) DEFAULT NULL,
  `NguoiTao` varchar(250) DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `NguoiSua` varchar(250) DEFAULT NULL,
  `NgaySua` datetime DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`ID`, `UserName`, `Password`, `SoDienThoai`, `DiaChi`, `Email`, `HinhAnh`, `Quyen`, `GhiChu`, `NguoiTao`, `NgayTao`, `NguoiSua`, `NgaySua`) VALUES
(1, 'admin', 'admin', '0356142274', '1041 Trần Xuân Soạn', 'nguyenthuyvuong98@gmail.com', NULL, 1, NULL, NULL, NULL, NULL, NULL),
(2, 'ntv', 'ntv', '01656142274', NULL, 'vuongvocuc1997@gmail.com', NULL, 0, NULL, NULL, NULL, NULL, NULL),
(22, 'asdads', 'ada', 'adasdas', 'ádasd', 'ádasd', '', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'vuong', '123456', '01656142274', 'ko có', 'àasffasf', '22.jpg', NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 'YAME', NULL, NULL, NULL, NULL, NULL),
(2, 'PU', NULL, NULL, NULL, NULL, NULL),
(3, 'WREALM', NULL, NULL, NULL, NULL, NULL),
(4, 'ROUTINE', NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID`, `MaSP`, `TenSP`, `LoaiSP`, `NhaSanXuatID`, `XuatXu`, `MoTa`, `NgayTao`, `SoLuong`, `HinhAnh`, `Gia`, `GiaGoc`, `LuotXem`, `TinhTrang`, `GhiChu`, `NguoiTao`, `NguoiSua`, `NgaySua`) VALUES
(55, 'SP001', 'Áo Thun 01', 1, 1, NULL, NULL, '2018-12-15 00:00:00', 30, '2.jpg', '200000', 250000, 30, 1, NULL, NULL, NULL, NULL),
(56, 'SP002', 'Quần Jean 01', 2, 2, NULL, NULL, '2018-12-14 00:00:00', 20, '4.jpg', '300000', 350000, 10, 1, NULL, NULL, NULL, NULL),
(57, 'SP003', 'Áo sơ mi ca rô', 3, 3, NULL, NULL, '2018-12-14 00:00:00', 20, '5.jpg', '250000', 300000, 50, 1, NULL, NULL, NULL, NULL),
(58, 'SP004', 'Giày Sneaker', 4, 4, NULL, NULL, '2018-12-14 00:00:00', 10, '6.jpg', '300000', 350000, 100, 1, NULL, NULL, NULL, NULL),
(59, 'SP005', 'Áo thun 02', 1, 2, NULL, NULL, '2018-12-14 00:00:00', 30, '7.jpg', '250000', 300000, 10, 1, NULL, NULL, NULL, NULL),
(60, 'SP006', 'Áo thun 03', 1, 3, NULL, NULL, '2018-12-14 00:00:00', 10, '8.jpg', '200000', 250000, 30, 1, NULL, NULL, NULL, NULL),
(61, 'SP007', 'Áo thun 04', 1, 4, NULL, NULL, '2018-12-14 00:00:00', 50, '9.jpg', '300000', 350000, 30, 1, NULL, NULL, NULL, NULL),
(62, 'SP008', 'Áo thun 05', 1, 1, NULL, NULL, '2018-12-14 00:00:00', 30, '10.jpg', '250000', 300000, 30, 1, '\r\n', NULL, NULL, NULL),
(63, 'SP009', 'Áo thun 06', 1, 2, NULL, NULL, '2018-12-14 00:00:00', 30, '11.jpg', '250000', 300000, 30, 1, NULL, NULL, NULL, NULL),
(64, 'SP010', 'Quần Jean 02', 2, 1, NULL, NULL, '2018-12-15 00:00:00', 20, '12.jpg', '300000', 350000, 20, 1, NULL, NULL, NULL, NULL),
(65, 'SP011', 'Quần Jean 03', 2, 3, NULL, NULL, '2018-12-16 00:00:00', 10, '13.jpg', '300000', 360000, 60, 1, NULL, NULL, NULL, NULL),
(71, 'SP013', 'Áo Khoác 02', 1, 1, 'vn', 'a', '2018-12-14 00:00:00', 30, 'DSC09723.jpg', '250000', 300000, 30, 1, NULL, NULL, NULL, NULL),
(72, 'SP014', 'Quần Hoa', 2, 4, 'Việt Nam', 'Quần đẹp', '2018-12-20 00:00:00', 30, 'DSC09732.jpg', '250000', 300000, 30, 1, NULL, NULL, NULL, NULL),
(73, 'SP015', 'Giày', 2, 4, '', 'Không', '2018-12-21 00:00:00', 30, 'DSC09779.jpg', '300000', 350000, 30, 1, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
