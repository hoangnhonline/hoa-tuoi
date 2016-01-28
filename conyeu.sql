-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2016 at 12:53 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `conyeu`
--
CREATE DATABASE IF NOT EXISTS `conyeu` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `conyeu`;

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE IF NOT EXISTS `block` (
  `block_id` int(11) NOT NULL AUTO_INCREMENT,
  `block_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`block_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`block_id`, `block_name`, `status`) VALUES
(3, 'HỖ TRỢ KHÁCH HÀNG', 1),
(4, 'TIỆN ÍCH CHO MẸ VÀ BÉ', 1),
(9, 'Link footer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `text_link` varchar(255) NOT NULL,
  `block_id` int(11) NOT NULL,
  `link_url` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=194 ;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`link_id`, `text_link`, `block_id`, `link_url`, `status`) VALUES
(167, 'Cẩm nang mang thai', 4, 'http://conyeuoi.com/danh-muc/cam-nang-mang-thai-24.html', 1),
(168, 'Kinh nghiệm nuôi dạy trẻ', 4, 'http://conyeuoi.com/danh-muc/day-con-29.html', 1),
(169, 'Dinh dưỡng cho bé', 4, 'http://conyeuoi.com/danh-muc/dinh-duong-cho-be-27.html', 1),
(170, 'Kinh nghiệm mua sắm', 4, 'http://conyeuoi.com/danh-muc/huong-dan-mua-sam-33.html', 1),
(171, 'Tin tổng hợp', 4, 'www.conyeuoi.com/tin-tuc.html', 1),
(184, 'Hướng dẫn đặt  hàng', 3, 'huong-dan-mua-hang-c2.html', 1),
(185, 'Phương thức thanh toán', 3, 'phuong-thuc-thanh-toan-c3.html', 1),
(186, 'Phương thức giao nhận', 3, 'phuong-thuc-giao-nhan-c4.html', 1),
(187, 'Bảo hành - Đổi trả hàng', 3, 'bao-hanh-doi-tra-hang-c5.html', 1),
(188, 'Điều khoản giao dịch', 3, 'dieu-khoan-giao-dich-c6.html', 1),
(189, 'Chính sách bảo mật', 3, 'chinh-sach-bao-mat-c7.html', 1),
(190, 'Trang chủ', 9, '#', 1),
(191, 'Giới thiệu', 9, 'gioi-thieu-c1.html', 1),
(192, 'Tin tức', 9, 'tin-tuc.html', 1),
(193, 'Liên hệ', 9, 'lien-he.html', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
