-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 10, 2020 lúc 04:21 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cateid` int(11) NOT NULL,
  `nhasanxuat` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cateid`, `nhasanxuat`) VALUES
(0, 'Nokia'),
(5, 'Samsung'),
(8, 'Oppo'),
(9, 'Apple'),
(10, 'Redmi'),
(11, 'Vivo'),
(12, 'Realme');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `makh` int(11) NOT NULL,
  `hovaten` varchar(300) NOT NULL,
  `tendangnhap` varchar(300) NOT NULL,
  `matkhau` varchar(300) NOT NULL,
  `rematkhau` varchar(300) NOT NULL,
  `email` varchar(400) NOT NULL,
  `sdt` varchar(300) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`makh`, `hovaten`, `tendangnhap`, `matkhau`, `rematkhau`, `email`, `sdt`, `ngaysinh`, `gioitinh`) VALUES
(17, 'Hoàng Đình Hanh', 'hoangdinhhanh', '1234567', '1234567', 'chithethoi0003@gmail.com', '098654625', '2020-10-17', 'Nam'),
(18, 'hanh', 'abcd1', '1234', '1234', 'chithethoi0003@gmail.com', '873457367', '2020-11-13', 'Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `madh` int(11) NOT NULL,
  `ten` varchar(500) NOT NULL,
  `dt` varchar(250) NOT NULL,
  `diachi` varchar(500) NOT NULL,
  `ghichu` varchar(500) NOT NULL,
  `thoigiandat` varchar(500) NOT NULL,
  `tongsotien` varchar(500) NOT NULL,
  `capnhatcuoi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `masp` int(11) NOT NULL,
  `tensp` int(11) NOT NULL,
  `loaisp` int(11) NOT NULL,
  `anh` int(11) NOT NULL,
  `nhasanxuat` varchar(400) NOT NULL,
  `soluong` int(20) DEFAULT NULL,
  `giacu` int(11) NOT NULL,
  `giamoi` int(11) NOT NULL,
  `mota` int(11) NOT NULL,
  `ngaybaohanh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manage`
--

CREATE TABLE `manage` (
  `idmanage` int(11) NOT NULL,
  `hovaten` varchar(500) NOT NULL,
  `tendangnhap` varchar(500) NOT NULL,
  `matkhau` varchar(500) NOT NULL,
  `rematkhau` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `sdt` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `manage`
--

INSERT INTO `manage` (`idmanage`, `hovaten`, `tendangnhap`, `matkhau`, `rematkhau`, `email`, `sdt`) VALUES
(2, 'Hoàng Đình Hanh', 'hoangdinhhanh', '1234567', '1234567', 'chithethoi0003@gmail.com', '0368661392'),
(3, 'abc', 'adc', '12345', '12345', 'chithethoi0003@gmail.com', '0368661392');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL COMMENT 'để biết là của đơn hàng nào',
  `masp` int(11) NOT NULL,
  `soluong` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `madh` varchar(255) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `phuongthucthanhtoan` varchar(255) NOT NULL COMMENT 'Thanh toán tiền mặt hoặc chuyển khoản',
  `ngaydat` datetime NOT NULL,
  `ghichu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `masp` int(11) NOT NULL,
  `tensp` varchar(300) NOT NULL,
  `cateid` int(11) NOT NULL,
  `dongsp` varchar(11) NOT NULL,
  `soluong` int(50) NOT NULL,
  `giacu` decimal(10,0) NOT NULL,
  `giamoi` decimal(10,0) NOT NULL,
  `anh` varchar(400) NOT NULL,
  `mota` varchar(300) DEFAULT NULL,
  `ngaybaohanh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`masp`, `tensp`, `cateid`, `dongsp`, `soluong`, `giacu`, `giamoi`, `anh`, `mota`, `ngaybaohanh`) VALUES
(24, 'samsung galaxy A12', 5, ' A12', 5, '21000000', '18000000', '20201110-012334samsung-galaxy-a12-031020-021053-400x460.png', 'Hệ điều hành:	Android 10\r\nRAM:	4 GB\r\nBộ nhớ trong:	64 GB\r\nThẻ SIM:	Hỗ trợ 4G\r\nDung lượng pin:	4200 mAh, có sạc nhanh                                                                      ', '2020-10-16'),
(25, 'Oppo A3s', 8, ' A3s', 10, '10000000', '8000000', '20201027-054346dienthoai.jpg', '                                                               oppo a3s\r\n siêu mượt                                                                   ', '2020-10-23'),
(26, 'Iphone 11 PRO', 9, ' iphene 11', 4, '30000000', '28000000', '20201027-054455iphone11-pro-max-black-400x460.png', '  Iphone 11 vs nhiều tính năng                        ', '2020-10-30'),
(27, 'Xiaomi Redmi Note 8 ', 10, ' note 8', 10, '5000000', '4700000', '20201110-013135xiaomi-redmi-note-8-128gb-black-400x460.png', 'Tặng 2 suất mua Đồng hồ thời trang giảm 40% (Không áp dụng thêm khuyến mãi khác).\r\nPin sạc dự phòng giảm 30% khi mua kèm.                                         ', '2020-10-23'),
(28, 'vivo plus', 11, ' vivo plus', 6, '7000000', '5000000', '20201027-054733vivo(5).jpg', '      siêu đẹp                                                                                         ', '2020-10-16'),
(29, 'Xiaomi Redmi 9C ', 10, ' C9', 12, '4000000', '2900000', '20201027-054828realme5s.jpg', 'RAM : 3GB - 64GB\r\nbảo hành: 18 tháng\r\ntrả góp: 0%                                          ', '2020-10-15'),
(30, 'Oppo A92', 8, ' A92', 3, '7000000', '6000000', '20201027-141324oppo-a92-tim-400x460-400x460.png', 'Tặng 2 suất mua Đồng hồ thời trang giảm 40% (Không áp dụng thêm khuyến mãi khác).\r\nPin sạc dự phòng giảm 30% khi mua kèm                                                                    ', '2020-10-16'),
(31, 'Oppo A9', 8, ' A9', 5, '7000000', '6000000', '20201110-012843oppo-a73-400png-400x460.png', 'Màn hình:	AMOLED, 6.44\", Full HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 16 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:	16 MP\r\nCPU:	Snapdragon 662 8 nhân\r\nRAM:	6 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD\r\nThẻ SIM:\r\n2 Nano SIM, Hỗ trợ 4G                                         ', '2020-10-23'),
(32, 'Redmi 8A', 10, ' 8A', 5, '2100000', '18000000', '20201110-013735xiaomi-redmi-8a-blue-400x460.png', '                                                    Pin siêu khủng, cổng Type-C, hỗ trợ sạc nhanh\r\n                                                                                         ', '2020-10-03'),
(33, 'Redmi Note 9', 10, ' note 9', 4, '7000000', '5000000', '20201110-014146xiaomi-redmi-note-9-(2).jpg', '                          Xiaomi Redmi Note 9\r\nHiệu năng bứt phá với Helio G85 \r\nMàn hình nốt ruồi tràn viền thời thượng                                                  ', '2020-10-16'),
(34, 'Realme 7 Pro', 10, ' redmi', 2, '20000000', '15000000', '20201110-015415realme-7-pro-043220-013214-400x460.png', '                                                                              Màn hình:	Super AMOLED, 6.44\", Full HD+\r\nHệ điều hành:	Android 10\r\nCamera sau:	Chính 64 MP & Phụ 8 MP, 2 MP, 2 MP\r\nCamera trước:	32 MP\r\nCPU:	Snapdragon 720G 8 nhân\r\nRAM:	8 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ', '2020-10-10'),
(35, ' redmi k30', 10, ' redmi k30', 14, '7000000', '6000000', '20201028-182815images (11).jpg', '                                                                             Màu sắc	\r\nĐỏ, Tím, Trắng, Xanh Dương\r\n\r\nBăng tần - Sim	\r\n2G, 3G, 4G LTE\r\n\r\nSim	\r\n2 Sim Nano\r\n\r\nCamera trước	\r\nDual 20 MP + 2 MP\r\n\r\nCamera sau	\r\n64MP f1.8 (main) 13MP f2.4(wide) 8MP f/2.4 (telephoto) 2MP\r\n\r\nCPU	\r\nQualcom Sna', '2020-10-23'),
(36, 'POCO X3 NFC', 12, 'POCO X3 NFC', 14, '7000000', '6000000', '20201110-020110pocox3.jpg', '                                                                                  Hãng sản xuất	OPPO\r\nKích thước	162 x 75.5 x 8.9 mm\r\nTrọng lượng	192 g\r\nBộ nhớ đệm / Ram	8 GB\r\nBộ nhớ trong	128 GB\r\nLoại SIM	2 SIM (Nano-SIM)\r\nLoại màn hình	IPS LCD, 16 triệu màu\r\nKích thước màn hình	6.5 inches\r\nĐộ phân', '2020-10-23'),
(37, 'Oppo Reno4', 8, 'OPPO', 5, '7000000', '5000000', '20201110-020729reno4.jpg', '               Hãng sản xuất	OPPO\r\nKích thước	160.3 x 73.9 x 7.7 mm\r\nTrọng lượng	Khoảng 165g (Bao gồm pin)\r\nBộ nhớ đệm / Ram	8 GB\r\nBộ nhớ trong	128 GB\r\nLoại SIM	2 SIM (Nano-SIM)\r\nLoại màn hình	AMOLED, 60GHz, Gorilla Glass 3+, 1080 x 2400 (FHD+), 16 triệu màu\r\nKích thước màn hình	6.4 inches\r\nĐộ phân ', '2020-10-15'),
(38, 'Samsung A51', 5, 'SamSung', 14, '7000000', '6000000', '20201110-020854a51.jpg', '                       Hãng sản xuất	Samsung\r\nBộ nhớ đệm / Ram	128 GB, 6 GB RAM\r\nBộ nhớ trong	128 GB\r\nLoại SIM	2 SIM (Nano-SIM)\r\nLoại màn hình	Super AMOLED\r\nKích thước màn hình	6.5 inches\r\nĐộ phân giải màn hình	1080 x 2340 pixels\r\nHệ điều hành	Android\r\nPhiên bản hệ điều hành	10\r\nCPU	Exynos 9611     ', '2020-10-16'),
(39, 'abc', 8, ' a12', 14, '30000000', '6000000', '20201110-032647images (5).jpg', '                                                                              ', '2020-11-13');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cateid`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`makh`),
  ADD UNIQUE KEY `tendangnhap` (`tendangnhap`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`madh`);

--
-- Chỉ mục cho bảng `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`idmanage`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `cateid` (`cateid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `madh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `manage`
--
ALTER TABLE `manage`
  MODIFY `idmanage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cateid`) REFERENCES `category` (`cateid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
