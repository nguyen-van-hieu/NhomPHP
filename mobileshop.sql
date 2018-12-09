-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2018 lúc 01:05 PM
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
-- Cơ sở dữ liệu: `mobileshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `madienthoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `madonhang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `madienthoai`, `soluongmua`, `madonhang`) VALUES
(1, 'sss9plus', 12, 1),
(2, 'hn1', 20, 11),
(3, 'hn3', 4, 11),
(4, 'hn4', 3, 12),
(5, 'hn1', 5, 12),
(6, 'hn3', 3, 13),
(7, 'hn6', 3, 13),
(8, 'htc3', 2, 13),
(9, 'hn2', 4, 14),
(10, 'no21', 4, 14),
(11, 'hn3', 2, 15),
(12, 'hn6', 2, 15),
(13, 'ip5s16', 1, 16),
(14, 'htc1', 1, 16),
(15, 'hn1', 1, 17),
(16, 'hn2', 1, 18),
(17, 'hn5', 1, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dienthoai`
--

CREATE TABLE `dienthoai` (
  `madienthoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mahang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `urlimg` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dienthoai`
--

INSERT INTO `dienthoai` (`madienthoai`, `mahang`, `ten`, `gia`, `soluong`, `urlimg`) VALUES
('hn1', 'honor', 'Honor 9 Lite 32GB', 4290000, 110, 'bde00dc7deb3484ab626af6ee4f0cf30.jpg'),
('hn2', 'honor', 'Honor PLAY (4GB/64GB)', 6490000, 260, 'c505c7c02cb6b2b768784c34c93abba1.jpg'),
('hn3', 'honor', 'Honor 7X 64GB/4GB', 4290000, 79, 'c598672d18490aa2af7f39fd100a9234.jpg'),
('hn4', 'honor', 'Honor 7C', 3290000, 145, '126c8c855ea936829dd23af7d087d56b.jpg'),
('hn5', 'honor', 'Honor 10', 9990000, 79, '774691c4e6f41e90c25ecbfc2497f38c.jpg'),
('hn6', 'honor', 'Honor 8X (4GB/64GB)', 5990000, 53, 'b67dac95b86d18e9235029e8d024e99a.jpg'),
('htc1', 'htc', 'HTC U Ultra Sapphire', 15490000, 250, '1.u4064.d20170424.t165257.746957.jpg'),
('htc2', 'htc', 'HTC Desire 12', 6575000, 240, 'd04c733f9f62004456fb930a5738600f.jpg'),
('htc3', 'htc', 'HTC U Ultra Iceberg White', 10603000, 246, 'db7aedbc7613d9de7d262a96579ed796.jpg'),
('htc4', 'htc', 'HTC U Ultra Black', 11145000, 198, '8dc52bc947aee3200d106f57393c162b.jpg'),
('htc5', 'htc', 'HTC U12 Plus', 26545000, 310, 'b081550a493458d976404b8b4934bae6.jpg'),
('htc6', 'htc', 'HTC U11 Plus', 20994000, 79, '4a05c73e42dc48d68580b4db818581ca.jpg'),
('htc7', 'htc', 'HTC U12 Plus', 30302000, 167, 'c5ac32b403ae249b39b3f0d310e7db35.jpg'),
('htc8', 'htc', 'HTC U Ultra Pink', 26764000, 110, 'd61c7d864f1abed0cfe68686816c0b02.jpg'),
('ip5s16', 'apple', 'iPhone 5s 16GB', 4699000, 38, '573dd6f4d6af2b3d9f50c9fd9535597e.u3059.d20170713.t101722.305522.jpg'),
('ip6', 'apple', 'iPhone 6 32GB', 6290000, 160, 'f08e0e8a8c06ae2d12cbd3ccaedbf9df.jpg'),
('ip6plus', 'apple', 'iPhone 6s Plus 32GB', 9990000, 70, 'f8c7e932ab5f39a595debc93ee7dd3ae.jpg'),
('ip7128', 'apple', 'iPhone 7 128GB', 13590000, 89, '1.u2769.d20170403.t142544.139039.jpg'),
('ip732', 'apple', 'iPhone 7 32GB', 12890000, 168, '1.u2769.d20170609.t135202.969563.jpg'),
('ip7plus', 'apple', 'iPhone 7 Plus 128GB', 17490000, 90, '128gb gold_1.u504.d20160920.t102416.649072.jpg'),
('ip7plus32', 'apple', 'iPhone 7 Plus 32GB', 14990000, 79, '1.u2769.d20170609.t155421.289019_3.jpg'),
('ip8', 'apple', 'iPhone 8 64GB', 16490000, 125, '1.u4939.d20170918.t060356.230666_6_4_1.jpg'),
('ip8plus', 'apple', 'iPhone 8 Plus 64GB', 18490000, 204, '1.u4939.d20170921.t115008.259587.jpg'),
('ipx64', 'apple', 'iPhone X 64GB', 20490000, 110, '1.u4939.d20170918.t113145.497297_2.jpg'),
('ipxs', 'apple', 'iPhone XS 64GB', 26990000, 60, 'e72164bc0cdaedc34d61937d2c12e68b.jpg'),
('ipxs64', 'apple', 'iPhone XS 64GB', 26490000, 310, '23554456df985603c00b48861048cec1.jpg'),
('ipxsmax64', 'apple', 'iPhone XS Max 64GB', 29990000, 50, '475458e972acdc25c36631492855a747.jpg'),
('n61plus', 'nokia', 'Nokia 6.1 Plus', 5390000, 180, '0c3be98031c4423d5795ff86faaaf8c9.jpg'),
('no2', 'nokia', 'Nokia 2', 2070000, 80, '54d35c86da5a16072a8c423566c880b7.jpg'),
('no21', 'nokia', 'Nokia 2.1', 2390000, 94, '47626d12ab60eeadcc521998daef652e.jpg'),
('no3', 'nokia', 'Nokia 3', 2650000, 200, '1.u2769.d20170608.t192621.835641.jpg'),
('no31', 'nokia', 'Nokia 3.1', 2590000, 76, '732b73be9ec8977702794d9cd96013d8.jpg'),
('no5', 'nokia', 'Nokia 5', 3449000, 80, 'nokia_5_ds_silver_images_1946751872.u2769.d20170629.t120909.461534.jpg'),
('no6', 'nokia', 'Nokia 6', 4290000, 56, 'd57a14295fd08b0d6b7acfb4dc5caf7b.jpg'),
('no7plus', 'nokia', 'Nokia 7 Plus', 699000, 160, '131389e4f24020b2fb1d2610974c5b63.jpg'),
('no8sir', 'nokia', 'Nokia 8 Sirocco', 20890000, 110, '46cd1d242f9f8e2a74a18c93ca677e06.jpg'),
('op1', 'oppo', ' OPPO A71 2018', 3190000, 79, '3a58c0dd83fb4ad608cf546ba7e00570.jpg'),
('op10', 'oppo', 'OPPO R7s', 8990000, 45, 'layout_24_8_gold_16_rose_3_cmyk_0.jpg'),
('op2', 'oppo', 'OPPO F3 Lite', 3390000, 110, '1.u5488.d20170724.t140050.815458_1.jpg'),
('op3', 'oppo', 'OPPO A3s', 3490000, 310, '0d763b754261d35df42c15269b6df3b4.jpg'),
('op4', 'oppo', 'OPPO A83 2018', 3490000, 110, '731a68344cc4b278cef51ef24a8ad97d.jpg'),
('op5', 'oppo', 'OPPO F5', 4690000, 110, '00.u5552.d20171101.t161857.423572.jpg'),
('op6', 'oppo', 'OPPO F1 Plus', 4690000, 110, 'vang-dòng.u425.d20160425.t142024.jpg'),
('op7', 'oppo', 'OPPO F5 Youth', 4790000, 310, 'c21740edece75ac645e68a134b04f334.jpg'),
('op8', 'oppo', 'OPPO F7', 699000, 110, 'ff655086d4e1fb474c670693ce4c58b6.jpg'),
('op9', 'oppo', 'OPPO Find X', 19990000, 264, '364a4672df55a1968221987b532193d2.jpg'),
('sn1', 'sony', 'Sony Xperia XA1 Plus Blue', 11652000, 98, 'f960efd459ad7786480d79091fc651c4.jpg'),
('sn2', 'sony', 'Sony Xperia XA2 Pink', 10942000, 28, '1538d8b6bfaea2a7e41a563f2408b0c6.jpg'),
('sn3', 'sony', 'Sony Xperia XZ2', 20756000, 91, '6b01c35efed9579184cca8f874631a68.jpg'),
('sn4', 'sony', 'Sony Xperia XA2 Silver', 10942000, 59, '7d06f354e6f080a0e7d46d7f760f3fd6.jpg'),
('sn5', 'sony', 'Sony Xperia XZ2', 20756000, 129, 'd717c4d2a759a5a40e05a9d8bdfcb432.jpg'),
('ssa6plus', 'samsung', 'Samsung Galaxy A6 Plus', 6590000, 240, '63c4bb3fdc031b6a4a16f46f64a1f573.jpg'),
('ssa7', 'samsung', 'Samsung Galaxy A7', 7690000, 85, 'dada4669905651a23bcc661b6f85d8da.jpg'),
('ssj2prime', 'samsung', 'Samsung Galaxy J2 Prime', 4934000, 210, '4950315c0c4dc0ab41e3db81586ddfd7.jpg'),
('ssj2pro', 'samsung', 'Samsung Galaxy J2 Pro 2018', 2570000, 110, '0adc1efa51bc06c64691b9ed53bf1966.jpg'),
('ssj3pro', 'samsung', 'Samsung Galaxy J3 Pro', 3050000, 120, '11000263_1_1.u3059.d20170802.t145701.534627.jpg'),
('ssj4', 'samsung', 'Samsung Galaxy J4', 6271000, 140, '3b38e52f65634c97b2ae6886083f53e2.jpg'),
('ssj4plus', 'samsung', 'Samsung Galaxy J4 Plus', 3390000, 130, '2a8de2578cb2b8dea7ac722c863b7f5d.jpg'),
('ssj6', 'samsung', 'Samsung Galaxy J6', 3790000, 150, 'd1dc4748e9d863ed43b35807ed4ee356.jpg'),
('ssj6plus', 'samsung', 'Samsung Galaxy J6 Plus', 4490000, 180, 'f9441dc3d731da9b366f70a118c18852.jpg'),
('ssj8', 'samsung', 'Samsung Galaxy J8', 5590000, 250, 'dfa6d3a16d408e0312e8b0276f34d4b3.jpg'),
('ssnode8', 'samsung', 'Samsung Galaxy Note 8', 25589000, 450, '08cba4d57dd0d45de8ef75cfda4425b9.jpg'),
('ssnode9', 'samsung', 'Samsung Galaxy Note 9', 20990000, 300, '5fc6a4797aa4b8fe461fe55588629769.jpg'),
('sss8plus', 'samsung', 'Samsung Galaxy S8 Plus', 12590000, 190, 'sm_g950f_galaxys8_1.u2769.d20170404.t153358.248583.jpg'),
('sss9plus', 'samsung', 'Samsung Galaxy S9 Plus', 21390000, 260, '2e70b3f56826f9d8892575013ea425a9.jpg'),
('vv1', 'vivo', 'Vivo V9 Youth', 499000, 110, 'ad3ea088b01eaafca427fc048936086c.jpg'),
('vv2', 'vivo', 'Vivo Y71', 2990000, 56, 'b74e37f6496941a982790cb5455ff170.jpg'),
('vv3', 'vivo', 'Vivo V7', 4990000, 87, '3f64f6317e750a9f49cc2c709cab7082.jpg'),
('vv4', 'vivo', 'Vivo V9 Youth 4GB', 5990000, 76, 'ff1fde519f0a4a4be463918ffe99a43e.jpg'),
('vv5', 'vivo', 'Vivo V9 4GB/64GB', 6100000, 59, '1bc9bf87983da2880a9b19f44d2715af.jpg'),
('x1', 'xiaomi', 'Xiaomi Redmi S2', 2990000, 61, 'df0021448c28bcba91a0debcbb2f27e4.jpg'),
('x10', 'xiaomi', 'Xiaomi Redmi Note 5', 5690000, 62, 'b7926b3e6db3933a64d71a2db049d1d2.jpg'),
('x11', 'xiaomi', 'Xiaomi Mi 8', 12990000, 352, '5fd24fb669596b943a5ce0e767cd9626.jpg'),
('x2', 'xiaomi', 'Xiaomi Mi Mix 2', 7490000, 165, '082e34c23cf5101b5a0ccc17c0a730e4.jpg'),
('x3', 'xiaomi', 'Xiaomi Mi 8', 10990000, 22, '4bcb132a473fc300d2bb8b70519f013f.jpg'),
('x4', 'xiaomi', 'Xiaomi Redmi Note 5', 3990000, 65, '53ba5b72ee4b9ed6cbcd69b8608cea13.jpg'),
('x5', 'xiaomi', 'Xiaomi Mi A1', 5050000, 110, '1.u4939.d20170926.t140931.179233_1.jpg'),
('x6', 'xiaomi', 'Xiaomi Mi A2', 5290000, 310, '40a1242b2e0a0019f96d2d28e11eee9e.jpg'),
('x7', 'xiaomi', 'Xiaomi Redmi Note 5 Pro', 3820000, 79, 'c4e212a7f07cdbfc70c5178e70e89084.jpg'),
('x8', 'xiaomi', 'Xiaomi MI MAX 3', 5990000, 110, '2619b7b3ab7b187691d252b68606fc9d.jpg'),
('x9', 'xiaomi', 'Xiaomi Redmi 6A', 1990000, 50, '8462d57082b170458dac06519961172e.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `madonhang` int(11) NOT NULL,
  `mataikhoan` int(11) NOT NULL,
  `ngaymua` date NOT NULL,
  `damua` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`madonhang`, `mataikhoan`, `ngaymua`, `damua`) VALUES
(1, 1, '2018-11-20', 1),
(11, 1, '2018-11-20', 0),
(12, 1, '2018-11-20', 0),
(13, 1, '2018-11-20', 0),
(14, 1, '2018-11-20', 1),
(15, 1, '2018-11-20', 1),
(16, 1, '2018-11-20', 0),
(17, 1, '2018-11-20', 0),
(18, 1, '2018-11-20', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang`
--

CREATE TABLE `hang` (
  `mahang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tenhang` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hang`
--

INSERT INTO `hang` (`mahang`, `tenhang`) VALUES
('apple', 'Apple'),
('honor', 'Honor'),
('htc', 'HTC'),
('nokia', 'Nokia'),
('oppo', 'OPPO'),
('samsung', 'Samsung'),
('sony', 'Sony'),
('vivo', 'Vivo'),
('xiaomi', 'Xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `mataikhoan` int(11) NOT NULL,
  `tendangnhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`mataikhoan`, `tendangnhap`, `matkhau`, `hoten`, `email`, `diachi`, `quyen`) VALUES
(1, 'admin', '123', 'php', 'php@gmail.com', 'Huế', 'khachang'),
(2, 'admin2', '123', 'admin', 'admin@gmail.com', 'Huế', 'admin'),
(3, 'admin3', '123', 'ABCD', 'Huế', 'admin3@gmail.com', 'khachhang'),
(4, 'admin4', '123', 'XYZ', 'Huế', 'xyz@gmail.com', 'khachhang');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `v_donhang`
-- (See below for the actual view)
--
CREATE TABLE `v_donhang` (
`madonhang` int(11)
,`mataikhoan` int(11)
,`ngaymua` date
,`damua` tinyint(1)
,`id` int(11)
,`soluongmua` int(11)
,`gia` int(11)
,`urlimg` varchar(100)
);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `v_donhang`
--
DROP TABLE IF EXISTS `v_donhang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_donhang`  AS  select `donhang`.`madonhang` AS `madonhang`,`donhang`.`mataikhoan` AS `mataikhoan`,`donhang`.`ngaymua` AS `ngaymua`,`donhang`.`damua` AS `damua`,`chitietdonhang`.`id` AS `id`,`chitietdonhang`.`soluongmua` AS `soluongmua`,`dienthoai`.`gia` AS `gia`,`dienthoai`.`urlimg` AS `urlimg` from ((`donhang` join `chitietdonhang` on((`donhang`.`madonhang` = `chitietdonhang`.`madonhang`))) join `dienthoai` on((`chitietdonhang`.`madienthoai` = `dienthoai`.`madienthoai`))) ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `madonhang` (`madonhang`),
  ADD KEY `madienthoai` (`madienthoai`);

--
-- Chỉ mục cho bảng `dienthoai`
--
ALTER TABLE `dienthoai`
  ADD PRIMARY KEY (`madienthoai`),
  ADD KEY `mahang` (`mahang`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madonhang`),
  ADD KEY `mataikhoan` (`mataikhoan`);

--
-- Chỉ mục cho bảng `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`mahang`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`mataikhoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `madonhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `mataikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`madonhang`) REFERENCES `donhang` (`madonhang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`madienthoai`) REFERENCES `dienthoai` (`madienthoai`);

--
-- Các ràng buộc cho bảng `dienthoai`
--
ALTER TABLE `dienthoai`
  ADD CONSTRAINT `dienthoai_ibfk_1` FOREIGN KEY (`mahang`) REFERENCES `hang` (`mahang`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`mataikhoan`) REFERENCES `taikhoan` (`mataikhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
