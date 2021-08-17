-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-08-16 06:54:07
-- 伺服器版本： 10.4.20-MariaDB
-- PHP 版本： 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `testproject`
--

-- --------------------------------------------------------

--
-- 資料表結構 `address_book`
--

CREATE TABLE `address_book` (
  `sid` int(11) NOT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `idnumber` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `address_book`
--

INSERT INTO `address_book` (`sid`, `account`, `password`, `name`, `idnumber`, `email`, `mobile`, `birthday`, `address`, `created_at`) VALUES
(1, '', '', '王曉明', '', 'arwrqr@gamil.com', '0977123456', '1993-08-18', '台北市大安區中正路255號', NULL),
(2, '', '', '王曉明', '', 'arwrqr@gamil.com', '0977123456', '1975-08-15', '台中市中正區中正路19號', NULL),
(3, '', '', '屋大維', '', 'asddw@gamil.com', '0977789456', '1993-08-18', '桃園市桃園區中華路447號', NULL),
(4, '', '', '林俊傑', '', 'tutyjng@gamil.com', '0977111222', '2013-08-14', '新北市萬華區新中北路3號', NULL),
(5, '', '', '周杰倫', '', 'ar88asdr@gamil.com', '0977999777', '1976-08-11', '台北市中正區凱達格蘭大道1號', NULL),
(6, '', '', '周杰', '', 'ar8558asdr@gamil.com', '0977666777', '1976-08-09', '台北市中正區凱達格蘭大道55號', NULL),
(7, '', '', '王曉明1', '', 'arwr53qr@gamil.com', '0977121456', '1993-08-05', '台北市大安區中正路55號', NULL),
(8, '', '', '王曉明2', '', 'arwr44qr@gamil.com', '0977183456', '1975-08-02', '台中市中正區中正路9號', NULL),
(9, '', '', '屋大維1', '', 'asd444dw@gamil.com', '0977785556', '1993-08-21', '桃園市桃園區中華路7號', NULL),
(10, '', '', '林俊傑', '', 'tuty555jng@gamil.com', '0977111288', '2013-08-10', '新北市萬華區新中北路39號', NULL),
(11, '', '', '周杰倫1', '', 'ar88555asdr@gamil.com', '0977999711', '1976-08-07', '台北市中正區凱達格蘭大道91號', NULL),
(12, '', '', '周杰倫2', '', 'ar88a58785sdr@gamil.com', '0977999666', '1976-08-11', '台北市中正區凱達格蘭大道13號', NULL),
(13, '', '', '王曉', '', 'arqr@gamil.com', '0977123777', '1993-08-18', '台北市大安區中正路1號', NULL),
(14, '', '', '王明', '', 'awrqr@gamil.com', '0988123456', '1975-08-02', '台中市中正區中正路33號', NULL),
(15, '', '', '屋維', '', 'asd11dw@gamil.com', '0977789499', '1993-08-21', '桃園市桃園區中華路10號', NULL),
(16, '', '', '林俊', '', 't55jng@gamil.com', '0977111888', '2013-08-26', '新北市萬華區新中北路7號', NULL),
(17, '', '', '杰倫', '', 'ar2228asdr@gamil.com', '0977999456', '1976-08-23', '台北市中正區凱達格蘭大道199號', NULL),
(18, '', '', '蔡杰國', '', 'ar85584asdr@gamil.com', '0977666123', '1976-08-09', '台北市中正區凱達格蘭大道993號', NULL),
(19, '', '', '王明1', '', 'arw444r53qr@gamil.com', '0977111456', '1993-08-05', '台北市大安區中正路641號', NULL),
(20, '', '', '王明2', '', 'arw44r44qr@gamil.com', '0977183789', '1975-08-02', '台中市中正區中正路231號', NULL),
(21, '', '', '屋維1', '', 'asd444dw@gamil.com', '0976545556', '1993-08-21', '桃園市桃園區中華路45號', NULL),
(22, '', '', '林傑1', '', 'tuty5455jng@gamil.com', '0977111641', '2013-08-10', '新北市萬華區新中北路7412號', NULL),
(23, '', '', '杰倫1', '', 'ar85458555asdr@gamil.com', '0977999755', '1976-08-07', '台北市中正區凱達格蘭大道81號', NULL),
(24, '', '', '周倫2', '', '785sdr@gamil.com', '0977999753', '1976-08-11', '台北市中正區凱達格蘭大道573號', NULL),
(25, '', '', '王曉蔡', '', 'a4537rqr@gamil.com', '0999123777', '1993-08-21', '台北市大安區中正路357號', NULL),
(26, '', '', '王明白', '', 'awr7867qr@gamil.com', '0999121456', '1975-08-22', '台中市中正區中正路3174號', NULL),
(27, '', '', '屋維藍', '', 'asd74511dw@gamil.com', '0955789499', '1993-08-14', '桃園市桃園區中華路357號', NULL),
(28, '', '', '林俊黃', '', 't55j453ng@gamil.com', '0977111753', '2013-08-10', '新北市萬華區新中北路737號', NULL),
(29, '', '', '杰倫洪', '', 'ar22243538asdr@gamil.com', '0977999951', '1976-08-23', '台北市中正區凱達格蘭大道7863號', NULL),
(30, '', '', '蔡黃', '', 'ar85584a53sdr@gamil.com', '0977666111', '1976-08-24', '台北市中正區凱達格蘭大道7853號', NULL),
(31, '', '', '王明黑', '', '874r53qr@gamil.com', '0977111878', '1993-08-05', '台北市大安區中正路878號', NULL),
(32, '', '', '王蔡言', '', 'ar7583w44r44qr@gamil.com', '0977183311', '1975-08-02', '台中市中正區中正路5號', NULL),
(33, '', '', '屋維王', '', 'asd472544dw@gamil.com', '0976545788', '1993-08-21', '桃園市桃園區中華路4523號', NULL),
(34, '', '', '林爺黃', '', 'tuty54758355jng@gamil.com', '0977111771', '2013-08-10', '新北市萬華區新中北路785號', NULL),
(157, '123123', '1239777', '留梓庭999', 'F123123667', '123@yahoo.com.tw', '0988123123', '2021-08-06', '123123', '2021-08-16 03:00:47'),
(158, 'story801216', '123456', '留梓庭22', 'F123456111', 'story801216@yahoo.com.tw', '0988123111', '2021-08-06', '中正區中正路', '2021-08-16 12:40:27');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `address_book`
--
ALTER TABLE `address_book`
  ADD PRIMARY KEY (`sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `address_book`
--
ALTER TABLE `address_book`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
