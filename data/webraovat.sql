-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2022 at 07:49 AM
-- Server version: 5.7.25
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webraovat`
--

-- --------------------------------------------------------

--
-- Table structure for table `baidang`
--

CREATE TABLE `baidang` (
  `id` int(255) NOT NULL,
  `danhmuc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `gia` float NOT NULL,
  `lienhe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idnguoidang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(255) NOT NULL,
  `ngaydang` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `baidang`
--

INSERT INTO `baidang` (`id`, `danhmuc`, `hinhanh`, `noidung`, `gia`, `lienhe`, `idnguoidang`, `mota`, `trangthai`, `soluong`, `ngaydang`) VALUES
(58, 'Đồ chơi', 'IMG-6335210d733283.44624468.jpg', 'Set Bakugan Maxus Dragonoid 7 in 1, bản Nhật, hàng hiếm like new 99%.', 850000, '0896469001', '13', 'Đồ chơi cổ', 'Đã duyệt', 10, '21/10/2022'),
(59, 'Đồ chơi', 'IMG-633521939487c7.06591303.jpg', 'Set Bakugan Maxus Helios 7 in 1, bản Nhật, hàng hiếm like new 99%.', 900000, '0896469001', '13', 'Đồ chơi cổ', 'Đã duyệt', 12, '20/10/2022'),
(60, 'Đồ chơi', 'IMG-63358ff5816917.02643251.jpg', 'MK2 Helios 99% + battle gear. Liêm hệ để biết thêm thông tin chi tiết.', 1600000, '0528644359', '15', 'Bakugan-MK2 +gear', 'Đã duyệt', 10, '19/10/2022'),
(66, 'Đồ chơi', 'IMG-63395bccdce2f8.06668833.jpg', 'Neo Drago xoay được, tốt, like new 99%, lăn bung.', 450000, '0999666333', '14', 'Bakugan Neo Dragoinoid Xoay', 'Đã duyệt', 3, '18/10/2022'),
(67, 'Thể thao', 'IMG-633a70ecac7e41.18496098.jpg', 'Bóng đá YONO 3 lớp chất lượng cao', 100000, '0988776655', '13', 'Bóng đá cao cấp', 'Đã duyệt', 1, '17/10/2022'),
(68, 'Đồ chơi', 'IMG-63945f2ee2c709.81842721.jpg', 'Rubianoid đẹp vừa khui box mới 99%. Kèm gear', 300000, '0896469001', '13', 'Bakugan Rubanoid like new kèm battle gea', 'Đã duyệt', 3, '21/10/2022'),
(69, 'Khác', 'IMG-639454ce67d3e4.31944483.jpg', 'Thùng mì Hảo Hảo chua cay 1 thùng 30 gói chất lượng Nhật Bổn', 120000, '0896469001', '13', 'Thùng mì Hảo Hảo chua cay', 'Chờ xét duyệt', 300, '6/11/2022'),
(70, 'Đồ chơi', 'IMG-6393f38004ad85.50046078.jpg', 'Khuyên Tai Potara Dragonball 1007\r\n\r\n- Mô hình dùng để trang trí nhà cửa, tiểu cảnh, bàn làm việc, hoặc trang trí trên xe ô tô,.... đều rất đẹp.\r\n\r\n- Mô hình được làm cực kỳ chi tiết, sắc nét, màu sơn đẹp, thể hiện được hết cái thần của nhân vật trong phim, truyện.\r\n\r\n- Nhân vật: khuyên tai Potara\r\n\r\nV1 Vàng Bấm lỗ tai\r\n\r\nV2 Vàng kẹp vành không cần bấm lỗ xỏ lỗ tai\r\n\r\nX1 Xanh Bấm lỗ tai\r\n\r\nX2 Xanh lá kẹp vành không cần bấm lỗ xỏ lỗ tai\r\n\r\n- Anime/Manga/Disney: Dragonball\r\n\r\n- Nhựa PVC', 350000, '0111222333', '14', 'Bong6 tai potara cosplay nhân vật Vegito', 'Chờ xét duyệt', 20, '10/12/2022'),
(71, 'Quần áo', 'IMG-639587e87f3df5.57489086.jpg', 'Bộ đồ Cosplay nhân vật Riyuki trong series phim Kamen Rider Riyuki. Tặng kèm phụ kiện', 3000000, '0987987999', '22', 'Bộ đồ cosplay Kamen Rider', 'Đã duyệt', 1, '11/12/2022');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `iddanhmuc` int(255) NOT NULL,
  `tendanhmuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`iddanhmuc`, `tendanhmuc`) VALUES
(1, 'Thể thao'),
(2, 'Thú cưng'),
(3, 'Quần áo'),
(4, 'Đồ chơi'),
(5, 'Mỹ phẩm'),
(6, 'Trang sức'),
(7, 'Khác');

-- --------------------------------------------------------

--
-- Table structure for table `dondatmua`
--

CREATE TABLE `dondatmua` (
  `id` int(11) NOT NULL,
  `idbaidang` int(255) NOT NULL,
  `idnguoiban` int(255) NOT NULL,
  `idnguoimua` int(255) NOT NULL,
  `tennguoimua` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `giabaidang` int(255) NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(100) NOT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaydat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tongtien` int(255) NOT NULL,
  `ngayxacnhan` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dondatmua`
--

INSERT INTO `dondatmua` (`id`, `idbaidang`, `idnguoiban`, `idnguoimua`, `tennguoimua`, `giabaidang`, `diachi`, `sodienthoai`, `soluong`, `trangthai`, `ngaydat`, `ghichu`, `tongtien`, `ngayxacnhan`) VALUES
(8, 67, 13, 15, 'Trần Việt', 100000, '859, Hà Hoàng Hổ, Mỹ Xuyên, Long Xuyên, An Giang ', '0896469001', 1, 'Chấp nhận giao', '29/10/2022', 'Chấp nhận giao', 100000, '10/12/2022'),
(9, 60, 15, 16, 'Quốc Việt', 1600000, '859, Hà Hoàng Hổ, Mỹ Xuyên, Long Xuyên, An Giang ', '0896469001', 1, 'Chờ xác nhận', '1/11/2022', '', 1600000, 'Đang chờ xác nhận'),
(10, 60, 15, 13, 'Trần Quốc Việt', 1600000, '859, Hà Hoàng Hổ, Mỹ Xuyên, Long Xuyên, An Giang ', '0896469001', 1, 'Chờ xác nhận', '6/11/2022', ' ', 1600000, 'Đang chờ xác nhận'),
(11, 67, 13, 13, 'Trần Quốc Việt', 100000, '859, Hà Hoàng Hổ, Mỹ Xuyên, Long Xuyên, An Giang ', '0896469001', 3, 'Chấp nhận giao', '7/11/2022', '', 300000, '7/11/2022'),
(12, 68, 13, 20, 'Việt Long Xiên', 230000, 'Long Xuyên', '0333666999', 2, 'Chấp nhận giao', '9/12/2022', 'Chấp nhận giao', 460000, '10/12/2022'),
(13, 66, 14, 13, 'Trần Quốc Việt', 450000, 'Số 859A, đường Hà Hoàng Hổ, phường Mỹ Xuyên, Thành Phố Long Xuyên, tỉnh An Giang.', '0896469001', 4, 'Từ chối giao', '10/12/2022', 'Không đủ hàng để giao', 1800000, '11/12/2022');

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id` int(255) NOT NULL,
  `idbaidang` int(255) NOT NULL,
  `idnguoidung` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`id`, `idbaidang`, `idnguoidung`) VALUES
(8, 59, 13),
(9, 66, 13),
(10, 68, 13),
(11, 58, 13),
(12, 66, 22),
(13, 58, 22);

-- --------------------------------------------------------

--
-- Table structure for table `image_baidang`
--

CREATE TABLE `image_baidang` (
  `id` int(255) NOT NULL,
  `id_baidang` int(255) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image_baidang`
--

INSERT INTO `image_baidang` (`id`, `id_baidang`, `image`) VALUES
(21, 58, 'IMG-6335210d753735.96904641.jpg'),
(22, 58, 'IMG-6335210d7674a8.90339345.jpg'),
(23, 58, 'IMG-6335210d77e244.70201614.jpg'),
(24, 59, 'IMG-6335219396b494.96369423.jpg'),
(25, 59, 'IMG-633521939951d3.97468314.jpg'),
(26, 59, 'IMG-633521939a8a55.59406111.jpg'),
(27, 60, 'IMG-63358ff584cb62.30638825.jpg'),
(28, 60, 'IMG-63358ff5867408.44363449.jpg'),
(29, 60, 'IMG-63358ff587b668.46693178.jpg'),
(101, 66, 'IMG-63395bcce11e62.47991079.jpg'),
(102, 66, 'IMG-63395bcce3f997.68816683.jpg'),
(103, 66, 'IMG-63395bcce52708.41071644.jpg'),
(104, 67, 'IMG-633a70ecaf0a94.41179445.jpg'),
(105, 67, 'IMG-633a70ecb006a6.73081046.jpg'),
(106, 67, 'IMG-633a70ecb0d758.72052868.jpg'),
(114, 73, 'IMG-63919e30401634.46415332.jpg'),
(136, 68, 'IMG-63945efbe32a04.97611863.jpg'),
(137, 68, 'IMG-63945efbe47608.88100508.jpg'),
(138, 68, 'IMG-63945efbe5de92.41994367.jpg'),
(141, 69, 'IMG-63946002b96ed5.86818218.jpg'),
(142, 71, 'IMG-63958851b2cd14.03810174.jpg'),
(143, 71, 'IMG-63958851b3bf19.78875432.jpg'),
(144, 71, 'IMG-63958851b4b184.89580355.jpg'),
(145, 71, 'IMG-63958851b579b5.79285394.jpg'),
(146, 71, 'IMG-63958851b64149.09004438.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `idnguoidung` int(255) NOT NULL,
  `taikhoan` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tennguoidung` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anhdaidien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangthaitk` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`idnguoidung`, `taikhoan`, `matkhau`, `tennguoidung`, `quyen`, `diachi`, `anhdaidien`, `trangthaitk`) VALUES
(13, 'dth195490', '1234567', 'Trần Quốc Việt', 'admin', 'Số 859A, Hà Hoàng Hổ, phường Mỹ Xuyên, thành phố Long Xuyên, An Giang.', 'IMG-639586295337a4.81461689.jpg', 1),
(14, 'tqv123', '123', 'Việt', 'admin', 'abc 123 111', 'IMG-6369eeef2d0774.42828165.png', 1),
(15, 'tranquocviet', '123', 'Trần Việt', 'user', '', 'user.png', 1),
(16, 'user', '123', 'Quốc Việt', 'user', '', 'user.png', 1),
(19, 'admin', '123', 'Người quản trị', 'admin', 'Mỹ Xuyên', 'user.png', 1),
(20, 'vietlxag', '123456', 'Việt Long Xiên', 'user', 'Long Xuyên, An Giang', 'user.png', 1),
(21, 'user2', '123', 'Nhân viên 2', 'user', 'Mỹ Long', 'user.png', 1),
(22, 'masterv', 'masterv', 'Master V', 'user', 'Mỹ Xuyên, Long Xuyên, An Giang', 'IMG-63958685b79a29.86790555.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baidang`
--
ALTER TABLE `baidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idnguoidung` (`idnguoidang`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`iddanhmuc`);

--
-- Indexes for table `dondatmua`
--
ALTER TABLE `dondatmua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_baidang`
--
ALTER TABLE `image_baidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`idnguoidung`,`taikhoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baidang`
--
ALTER TABLE `baidang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `iddanhmuc` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dondatmua`
--
ALTER TABLE `dondatmua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `image_baidang`
--
ALTER TABLE `image_baidang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `idnguoidung` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
