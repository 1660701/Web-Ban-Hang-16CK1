-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2018 at 08:49 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `ID` int(11) NOT NULL,
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
  `NgaySua` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `ID` int(11) NOT NULL,
  `Ten` varchar(250) NOT NULL,
  `GhiChu` varchar(250) DEFAULT NULL,
  `NguoiTao` varchar(250) DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `NguoiSua` varchar(250) DEFAULT NULL,
  `NgaySua` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhmuc`

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `ID` int(11) NOT NULL,
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
  `NgaySua` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diachinhanhang`
--

CREATE TABLE `diachinhanhang` (
  `ID` int(11) NOT NULL,
  `NguoiDungID` int(11) NOT NULL,
  `TenNguoiNhan` varchar(250) NOT NULL,
  `SoDienThoai` varchar(250) NOT NULL,
  `DiaChiGiaoHang` varchar(250) NOT NULL,
  `GhiChu` varchar(250) DEFAULT NULL,
  `NguoiTao` varchar(250) DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `NguoiSua` varchar(250) DEFAULT NULL,
  `NgaySua` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `SoDienThoai` varchar(250) NOT NULL,
  `DiaChi` varchar(250) DEFAULT NULL,
  `Email` varchar(250) NOT NULL,
  `HinhAnh` varchar(250) DEFAULT NULL,
  `Quyen` int(11) NOT NULL,
  `GhiChu` varchar(250) DEFAULT NULL,
  `NguoiTao` varchar(250) DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `NguoiSua` varchar(250) DEFAULT NULL,
  `NgaySua` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nguoidung`
--

-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `ID` int(11) NOT NULL,
  `Ten` varchar(250) NOT NULL,
  `GhiChu` varchar(250) DEFAULT NULL,
  `NguoiTao` varchar(250) DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `NguoiSua` varchar(250) DEFAULT NULL,
  `NgaySua` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhasanxuat`
--

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `ID` int(11) NOT NULL,
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
  `NgaySua` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `diachinhanhang`
--
ALTER TABLE `diachinhanhang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dathang`
--
ALTER TABLE `dathang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diachinhanhang`
--
ALTER TABLE `diachinhanhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
