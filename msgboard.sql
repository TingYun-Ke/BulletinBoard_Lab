-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-07-21 11:26:10
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `msgboard`
--

-- --------------------------------------------------------

--
-- 資料表結構 `tbl_ms`
--

CREATE TABLE `tbl_ms` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `tbl_ms`
--

INSERT INTO `tbl_ms` (`username`, `password`) VALUES
('大明', '789'),
('大王', '456'),
('小明', '123'),
('小美', '1234');

-- --------------------------------------------------------

--
-- 資料表結構 `tbl_ms1`
--

CREATE TABLE `tbl_ms1` (
  `id` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `author` varchar(25) DEFAULT NULL,
  `ip` varchar(25) DEFAULT NULL,
  `liuyan` varchar(225) DEFAULT NULL,
  `file_name` varchar(255) NOT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `tbl_ms1`
--

INSERT INTO `tbl_ms1` (`id`, `user`, `title`, `author`, `ip`, `liuyan`, `file_name`, `time`) VALUES
(6, '小明', '測試', '小明的兒子', '::1', '怎麼不能上傳', '', '18:35:04'),
(7, '大王', '掰掰', '我是大王', '::1', '嘿嘿嘿', '', '18:23:03'),
(15, '小明', '不知道', '我是小明', '::1', '哈囉', 'plain.jpg', '16:59:22'),
(19, '大明', '兒子聽好', '大明是也', '::1', '你老子來了', '', '17:00:42'),
(20, '大明', '我又來了', '大明', '::1', '沒事\r\n', '', '20:43:17'),
(21, '大王', '痾', '大王', '::1', '說啥好呢', '', '20:44:49'),
(23, '小美', '哈囉', '我是小美', '::1', '哈哈', '', '15:50:26');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `tbl_ms`
--
ALTER TABLE `tbl_ms`
  ADD PRIMARY KEY (`username`);

--
-- 資料表索引 `tbl_ms1`
--
ALTER TABLE `tbl_ms1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `tbl_ms1`
--
ALTER TABLE `tbl_ms1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `tbl_ms1`
--
ALTER TABLE `tbl_ms1`
  ADD CONSTRAINT `tbl_ms1_ibfk_1` FOREIGN KEY (`user`) REFERENCES `tbl_ms` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
