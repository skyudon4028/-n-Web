-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 02, 2020 lúc 05:47 PM
-- Phiên bản máy phục vụ: 10.4.16-MariaDB
-- Phiên bản PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `codeClass` int(20) NOT NULL,
  `nameClass` varchar(60) NOT NULL,
  `nameTeacher` varchar(60) NOT NULL,
  `nameSubject` varchar(60) NOT NULL,
  `nameRoom` varchar(60) NOT NULL,
  `teacherID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`codeClass`, `nameClass`, `nameTeacher`, `nameSubject`, `nameRoom`, `teacherID`) VALUES
(10000, 'a', 'a', 'a', 'a', '51800455'),
(10003, 'a1122', 'abc', 'aa', 'aa', 'abc'),
(10004, 'a', 'abc', 'a', 'a', '51800455'),
(10005, 'a', 'a', 'a', 'a', 'abc'),
(10006, 'a1122', 'abc', 'aa', 'aa', 'abc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classstudent`
--

CREATE TABLE `classstudent` (
  `codeClass` int(20) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `classstudent`
--

INSERT INTO `classstudent` (`codeClass`, `username`) VALUES
(10000, '51800455');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `file_info`
--

CREATE TABLE `file_info` (
  `file_name` varchar(60) NOT NULL,
  `file_id` varchar(20) NOT NULL,
  `date_upload` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `ngaysinh` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `token` varchar(20) NOT NULL,
  `permission` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `password`, `fullname`, `ngaysinh`, `email`, `sdt`, `token`, `permission`) VALUES
('51800455', '$2y$10$yKOQK/iXrATeBoNXdawzo.oUSSqrY.cYJhW8eFSKZBfssTxQMcUbO', 'Tin Mach', '23/4/2000', 'baddreamlove2882@gmail.com', '0564058547', '25e56798c0fe2ec53e4d', '0');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`codeClass`);

--
-- Chỉ mục cho bảng `file_info`
--
ALTER TABLE `file_info`
  ADD PRIMARY KEY (`file_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `class`
--
ALTER TABLE `class`
  MODIFY `codeClass` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10007;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
