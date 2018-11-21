-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 01, 2018 lúc 08:43 AM
-- Phiên bản máy phục vụ: 10.1.35-MariaDB
-- Phiên bản PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlchungchi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `capcho`
--

CREATE TABLE `capcho` (
  `machungchi` int(11) NOT NULL,
  `mahocvien` int(11) NOT NULL,
  `ngaycap` date NOT NULL,
  `socap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diemthuchanh` double NOT NULL,
  `diemlythuyet` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `capcho`
--

INSERT INTO `capcho` (`machungchi`, `mahocvien`, `ngaycap`, `socap`, `diemthuchanh`, `diemlythuyet`) VALUES
(7, 4, '2018-10-30', '1', 8, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocvien`
--

CREATE TABLE `hocvien` (
  `mahocvien` int(11) NOT NULL,
  `hoten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quequan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` int(11) NOT NULL,
  `noisinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocvien`
--

INSERT INTO `hocvien` (`mahocvien`, `hoten`, `quequan`, `ngaysinh`, `noisinh`) VALUES
(1, 'Văn Phước Hãi Tùng', 'Huế', 1995, 'Huế'),
(4, 'Nguyễn Văn Lâm', 'Quảng Nam', 1997, 'Quảng Nam'),
(6, 'Lê Đình Quang', 'TT-Huế', 1997, 'Huế');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaichungchi`
--

CREATE TABLE `loaichungchi` (
  `machungchi` int(11) NOT NULL,
  `tenchungchi` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaichungchi`
--

INSERT INTO `loaichungchi` (`machungchi`, `tenchungchi`) VALUES
(7, 'Chứng chỉ tin học cơ bản'),
(8, 'Chứng chỉ cơ bản 3');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `capcho`
--
ALTER TABLE `capcho`
  ADD KEY `machungchi` (`machungchi`),
  ADD KEY `mahocvien` (`mahocvien`);

--
-- Chỉ mục cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`mahocvien`);

--
-- Chỉ mục cho bảng `loaichungchi`
--
ALTER TABLE `loaichungchi`
  ADD PRIMARY KEY (`machungchi`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  MODIFY `mahocvien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `loaichungchi`
--
ALTER TABLE `loaichungchi`
  MODIFY `machungchi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `capcho`
--
ALTER TABLE `capcho`
  ADD CONSTRAINT `capcho_ibfk_1` FOREIGN KEY (`mahocvien`) REFERENCES `hocvien` (`mahocvien`),
  ADD CONSTRAINT `capcho_ibfk_2` FOREIGN KEY (`machungchi`) REFERENCES `loaichungchi` (`machungchi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
