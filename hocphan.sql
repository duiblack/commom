-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 08, 2021 lúc 02:29 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test04`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphan`
--

CREATE TABLE `hocphan` (
  `id` int(11) NOT NULL,
  `tenhp` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sotinchi` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `tentacgia` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `mota` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `namsanxuat` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `trangthai` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hocphan`
--

INSERT INTO `hocphan` (`id`, `tenhp`, `sotinchi`, `tentacgia`, `mota`, `namsanxuat`, `trangthai`) VALUES
(2, 'Toán rời rạc', '2', 'Thầy Dung', 'Tốt', '2020', 'Tốt'),
(3, 'abc', '1', 'Thầy Sơn', 't', 'b', 'c'),
(4, 'Tích phân', '2', 'a', 'b', 'c', 'd'),
(5, 'abcd', '2', 'Thầy Dung', 'Tốt', '400', 'very good'),
(6, 'Phạm Minh Thái', '2', 'a', 't', '2020', 'Tốt');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hocphan`
--
ALTER TABLE `hocphan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hocphan`
--
ALTER TABLE `hocphan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
