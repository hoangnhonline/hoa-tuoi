-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2016 at 01:10 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hoatuoi`
--
CREATE DATABASE IF NOT EXISTS `hoatuoi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hoatuoi`;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date_taken` date NOT NULL,
  `image_url` varchar(500) NOT NULL,
  `display_order` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `name`, `category_id`, `date_taken`, `image_url`, `display_order`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Portrait Vol 01', 1, '2015-11-18', 'upload/2015/11/15/portrait_04_1447591249.jpg', 1, 1447564130, 1447591256, 1),
(2, 'Out-Door', 4, '2015-11-15', 'upload/2015/11/15/landscape_03_1447591269.jpg', 1, 1447582473, 1447592334, 1),
(3, 'Landscape Vol01', 5, '2015-11-15', 'upload/2015/11/15/landscape_04_1447591287.jpg', 1, 1447582598, 1447591291, 1),
(4, 'Landscape Vol 02', 4, '2015-11-15', 'upload/2015/11/15/portrait_11_1447591309.jpg', 1, 1447588576, 1447591315, 1),
(7, 'test2', 2, '2015-11-09', 'upload/2015/11/20/bad-business-nomaden_1448030132.jpg', 1, 1448030159, 1448030159, 1),
(9, 'test4', 5, '2015-11-20', 'upload/2015/11/20/hc001_350a_1448030803.jpg', 1, 1448030988, 1448031018, 1),
(10, 'Clock', 1, '2015-11-24', 'upload/2015/11/24/wallcoocom_it06-27_350_1448353929.JPG', 1, 1448353958, 1448354014, 1);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_vi` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `description_vi` varchar(255) NOT NULL,
  `description_en` varchar(255) NOT NULL,
  `content_vi` text NOT NULL,
  `content_en` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `alias_vi` varchar(255) NOT NULL,
  `alias_en` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `is_hot` tinyint(1) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `meta_title_vi` varchar(255) NOT NULL,
  `meta_title_en` varchar(255) NOT NULL,
  `meta_description_vi` varchar(255) NOT NULL,
  `meta_description_en` varchar(255) NOT NULL,
  `meta_keyword_vi` varchar(255) NOT NULL,
  `meta_keyword_en` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `name_vi`, `name_en`, `description_vi`, `description_en`, `content_vi`, `content_en`, `image_url`, `alias_vi`, `alias_en`, `cate_id`, `is_hot`, `created_at`, `updated_at`, `meta_title_vi`, `meta_title_en`, `meta_description_vi`, `meta_description_en`, `meta_keyword_vi`, `meta_keyword_en`) VALUES
(1, 'dgdsgsdg', 'sdgas', 'gdsgdsa', 'gsdgadsgdsg', 'dsgsdgsdagdsgdsgasdga f fA FAF AS', 'sdgsadgsadgsdgdsg F S SASF AS FASF Afas as fas fas fFS AADSFDSGADSG ADSAG ASD &nbsp;SDG DS&nbsp;', 'upload/images/2016/01/02/lighthouse-22.jpg', 'dgdsgsdg', 'sdgas', 1, 1, 1451735169, 1451739191, 'sdgds', 'dsg', 'sdgsdg', 'gsdg', 'dgdsgsdg', 'sdgas'),
(2, 'Nguyễn huy hoàng', 'sdgasd', 'sdgasdg', 'sdgsdgsdg', 'dfsfgadsgsđssdgasg', 'dsgadsgdsgadsg', 'upload/images/2016/01/02/lighthouse-10.jpg', 'nguyen-huy-hoang', 'sdgasd', 2, 1, 1451736908, 1451737871, 'Nguyễn huy hoàng', 'sdgasd', 'Nguyễn huy hoàng', 'sdgasd', 'Nguyễn huy hoàng', 'sdgasd'),
(3, 'fasfasf', 'asffasf', 'safasfs', 'saasfasf', 'ds gasd gsdg dsg ds', 'adfadsgdsgs gds&nbsp;', 'upload/images/2016/01/02/hydrangeas-7.jpg', 'fasfasf', 'asffasf', 2, 1, 1451737374, 1451738732, 'fasfasf', 'asffasfHS DFH DF', 'fasfasf', 'asffasfHDFHDFHDFHD', 'fasfasfDG DSFGHFHDFH', 'asffasfFDH DFHDFHDF'),
(4, 'dvsbhdfshfd', 'dfhdshdsfh', 'fsdhdfhdf', 'dhsfhdsfhdsfhdfh hd hdfh fhdsh df', '', 'dfbh dfshdfhfdhdfs', 'upload/images/2016/01/02/jellyfish-16.jpg', 'dvsbhdfshfd', 'dfhdshdsfh', 1, 1, 1451739024, 1451739024, 'df hdsh', 'd fhdhdfh', 'sdf hdsfh ds', 'dfhdsfhdfhdfsh dsf', 'sf gáhgas', 'dfgsd gs gds gs'),
(5, 'dvdasgads', 'gdsgdsg', 'dgsdg', 'sadg', '&nbsp;adsgsdgadsgadsg dsg dsg', 'sadgsdgsdgasdg dsg s', 'upload/images/2016/01/02/lighthouse-19.jpg', 'dvdasgads', 'gdsgdsg', 2, 1, 1451739103, 1451739103, 'sdg', 'sdgsdg', 'dgasdgsdg', 'dsgds', 'sdgsdgsd', 'gsdgsdgsdg');

-- --------------------------------------------------------

--
-- Table structure for table `articles_cate`
--

CREATE TABLE IF NOT EXISTS `articles_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_vi` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `alias_vi` varchar(255) NOT NULL,
  `alias_en` varchar(255) NOT NULL,
  `display_order` int(11) NOT NULL,
  `meta_title_vi` varchar(255) NOT NULL,
  `meta_title_en` varchar(255) NOT NULL,
  `meta_description_vi` varchar(255) NOT NULL,
  `meta_description_en` varchar(255) NOT NULL,
  `meta_keyword_vi` varchar(255) NOT NULL,
  `meta_keyword_en` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `articles_cate`
--

INSERT INTO `articles_cate` (`id`, `name_vi`, `name_en`, `alias_vi`, `alias_en`, `display_order`, `meta_title_vi`, `meta_title_en`, `meta_description_vi`, `meta_description_en`, `meta_keyword_vi`, `meta_keyword_en`, `created_at`, `updated_at`) VALUES
(1, 'Ý nghĩa hoa', 'Flower meaning', 'y-nghia-hoa', 'flower-meaning', 1, 'Ý nghĩa hoa', 'Flower meaning', 'Ý nghĩa hoa', 'Flower meaning', 'Ý nghĩa hoa', 'Flower meaning', 1451555369, 1451555369),
(2, 'Tin tức', 'News', 'tin-tuc', 'news', 2, 'Tin tức', 'News', 'Tin tức', 'News', 'Tin tức', 'News', 1451555377, 1451555377);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_vi` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `alias_vi` varchar(255) DEFAULT NULL,
  `alias_en` varchar(255) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `position_id` int(11) NOT NULL,
  `description_vi` varchar(255) DEFAULT NULL,
  `description_en` varchar(255) DEFAULT NULL,
  `content_vi` text,
  `content_en` text,
  `image_url` varchar(255) NOT NULL,
  `link_url` varchar(500) DEFAULT NULL,
  `type_id` tinyint(4) NOT NULL,
  `size_default` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_by` smallint(6) NOT NULL,
  `meta_title_vi` varchar(255) NOT NULL,
  `meta_title_en` varchar(255) NOT NULL,
  `meta_description_vi` varchar(255) NOT NULL,
  `meta_description_en` varchar(255) NOT NULL,
  `meta_keyword_vi` varchar(255) NOT NULL,
  `meta_keyword_en` varchar(255) NOT NULL,
  `updated_by` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `name_vi`, `name_en`, `alias_vi`, `alias_en`, `start_time`, `end_time`, `position_id`, `description_vi`, `description_en`, `content_vi`, `content_en`, `image_url`, `link_url`, `type_id`, `size_default`, `status`, `created_at`, `updated_at`, `created_by`, `meta_title_vi`, `meta_title_en`, `meta_description_vi`, `meta_description_en`, `meta_keyword_vi`, `meta_keyword_en`, `updated_by`) VALUES
(1, 'Slide 1', 'Slide 1', 'slide-1', 'slide-1', 0, 0, 1, '', '', '', '', 'upload/images/2016/01/03/slidehow-main-01-4.jpg', '', 1, NULL, 1, 1451793942, 1451794982, 0, '', '', '', '', '', '', 0),
(4, 'Banner quang cao 1', 'Banner 1', 'banner-quang-cao-1', 'banner-1', 0, 0, 2, '', '', '', '', 'upload/images/2016/01/03/img-2-13.jpg', '', 1, NULL, 1, 1451795126, 1451795126, 0, '', '', '', '', '', '', 0),
(2, 'Slide 2', 'Slide 2', 'slide-2', 'slide-2', 0, 0, 1, '', '', '', '', 'upload/images/2016/01/03/slidehow-main-02-7.jpg', '', 1, NULL, 1, 1451794951, 1451794951, 0, '', '', '', '', '', '', 0),
(3, 'Slide 3', 'Slide 3', 'slide-3', 'slide-3', 0, 0, 1, '', '', '', '', 'upload/images/2016/01/03/slidehow-main-03-10.jpg', '', 1, NULL, 1, 1451794966, 1451794966, 0, '', '', '', '', '', '', 0),
(5, 'Banner quang cao 2', 'Banner 2', 'banner-quang-cao-2', 'banner-2', 0, 0, 3, '', '', '', '', 'upload/images/2016/01/03/img-1-16.jpeg', '', 1, NULL, 1, 1451795151, 1451795151, 0, '', '', '', '', '', '', 0),
(6, 'Slidebar 1', 'Slidebar 1', 'slidebar-1', 'slidebar-1', 0, 0, 4, '', '', '', '', 'upload/images/2016/01/03/sbanner-01-19.jpg', '', 1, NULL, 1, 1451795735, 1451795735, 0, '', '', '', '', '', '', 0),
(7, 'Sidebar 2', 'Sidebar 2', 'sidebar-2', 'sidebar-2', 0, 0, 4, '', '', '', '', 'upload/images/2016/01/03/sbanner-02-22.jpg', '', 1, NULL, 1, 1451795759, 1451795759, 0, '', '', '', '', '', '', 0),
(8, 'Sidebar 3', 'Sidebar 3', 'sidebar-3', 'sidebar-3', 0, 0, 5, '', '', '', '', 'upload/images/2016/01/03/sbanner-01-25.jpg', '', 1, NULL, 1, 1451795782, 1451795782, 0, '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cate`
--

CREATE TABLE IF NOT EXISTS `cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_vi` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `alias_vi` varchar(255) NOT NULL,
  `alias_en` varchar(255) NOT NULL,
  `description_vi` varchar(255) NOT NULL,
  `description_en` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `menu_type` tinyint(4) NOT NULL COMMENT '1 : ngang , 2 : doc',
  `parent_id` int(11) NOT NULL,
  `cate_type_id` int(11) NOT NULL,
  `show_menu` tinyint(1) NOT NULL COMMENT '1: show . 0 : hide',
  `meta_title_vi` varchar(255) NOT NULL,
  `meta_title_en` varchar(255) NOT NULL,
  `meta_description_vi` varchar(255) NOT NULL,
  `meta_description_en` varchar(255) NOT NULL,
  `meta_keyword_vi` varchar(255) NOT NULL,
  `meta_keyword_en` varchar(255) NOT NULL,
  `display_order` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `cate`
--

INSERT INTO `cate` (`id`, `name_vi`, `name_en`, `alias_vi`, `alias_en`, `description_vi`, `description_en`, `image_url`, `menu_type`, `parent_id`, `cate_type_id`, `show_menu`, `meta_title_vi`, `meta_title_en`, `meta_description_vi`, `meta_description_en`, `meta_keyword_vi`, `meta_keyword_en`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'Hoa sinh nhật', 'Birthday flowers', 'hoa-sinh-nhat', 'birthday-flowers', 'Hoa sinh nhật', 'Birthday flowers', '', 1, 0, 1, 1, 'Hoa sinh nhật', 'Birthday flowers', 'Hoa sinh nhật', 'Birthday flowers', 'Hoa sinh nhật', 'Birthday flowers', 2, 1451057972, 1451057972),
(2, 'Chủ đề', 'Occasions', 'chu-de', 'occasions', 'Chủ đề', 'Occasions', '', 1, 0, 1, 1, 'Chủ đề', 'Occasions', 'Chủ đề', 'Occasions', 'Chủ đề', 'Occasions', 3, 1451060679, 1451060679),
(3, 'Hoa tươi', 'Flowers', 'hoa-tuoi', 'flowers', '', '', '', 1, 0, 1, 1, 'Hoa tươi', 'Flowers', 'Hoa tươi', 'Flowers', 'Hoa tươi', 'Flowers', 1, 1451060817, 1451143880),
(4, 'Màu sắc', 'Colors', 'mau-sac', 'colors', 'Màu sắc', 'Colors', '', 1, 0, 1, 1, 'Màu sắc', 'Colors', 'Màu sắc', 'Colors', 'Màu sắc', 'Colors', 4, 1451060853, 1451060853),
(5, 'Hoa đặc biệt', 'Special Flowers', 'hoa-dac-biet', 'special-flowers', 'Hoa đặc biệt', 'Special Flowers', '', 1, 0, 1, 1, 'Hoa đặc biệt', 'Special Flowers', 'Hoa đặc biệt', 'Special Flowers', 'Hoa đặc biệt', 'Special Flowers', 5, 1451060880, 1451060880),
(6, 'Quà tặng kèm', 'Gifts', 'qua-tang-kem', 'gifts', 'Quà tặng kèm', 'Gifts', '', 1, 0, 1, 1, 'Quà tặng kèm', 'Gifts', 'Quà tặng kèm', 'Gifts', 'Quà tặng kèm', 'Gifts', 6, 1451060904, 1451060904),
(7, 'Hoa cưới', 'Wedding Decoration', 'hoa-cuoi', 'wedding-decoration', 'Hoa cưới', 'Wedding Decoration', '', 1, 0, 1, 1, 'Hoa cưới', 'Wedding Decoration', 'Hoa cưới', 'Wedding Decoration', 'Hoa cưới', 'Wedding Decoration', 7, 1451060973, 1451060973),
(8, 'Hộp hoa tươi', 'Flower boxes', 'hop-hoa-tuoi', 'Flower boxes', 'Hộp hoa tươi', 'Flower bouquets', '', 2, 0, 1, 1, 'Hộp hoa tươi', 'Flower boxes', 'Hộp hoa tươi', 'Flower bouquets', 'Hộp hoa tươi', 'Flower bouquets', 1, 1451061144, 1451061144),
(9, 'Giỏ hoa tươi', 'Flower Baskets', 'gio-hoa-tuoi', 'Flower Baskets', 'Giỏ hoa tươi', 'Flower boxes', '', 2, 0, 1, 1, 'Giỏ hoa tươi', 'Flower boxes', 'Giỏ hoa tươi', 'Flower boxes', 'Giỏ hoa tươi', 'Flower boxes', 1, 1451061157, 1451061157),
(10, 'Bó hoa tươi', 'Flower bouquets', 'bo-hoa-tuoi', 'flower-bouquets', 'Bó hoa tươi', 'Flower bouquets', '', 2, 0, 1, 1, 'Bó hoa tươi', 'Flower bouquets', 'Bó hoa tươi', 'Flower bouquets', 'Bó hoa tươi', 'Flower bouquets', 1, 1451061172, 1451061172),
(11, 'Hoa tình yêu', 'Love flowers', 'hoa-tinh-yeu', 'love-flowers', 'Hoa tình yêu', 'Love flowers', '', 2, 0, 1, 1, 'Hoa tình yêu', 'Love flowers', 'Hoa tình yêu', 'Love flowers', 'Hoa tình yêu', 'Love flowers', 1, 1451061208, 1451061208),
(12, 'Bình hoa tươi', 'Vase of flowers', 'binh-hoa-tuoi', 'vase-of-flowers', 'Bình hoa tươi', 'Vase of flowers', '', 2, 0, 1, 1, 'Bình hoa tươi', 'Vase of flowers', 'Bình hoa tươi', 'Vase of flowers', 'Bình hoa tươi', 'Vase of flowers', 1, 1451061210, 1451061210),
(13, 'Hoa chúc mừng', 'Congratulation flowers', 'hoa-chuc-mung', 'congratulation-flowers', 'Hoa chúc mừng', 'Congratulation flowers', '', 2, 0, 1, 1, 'Hoa chúc mừng', 'Congratulation flowers', 'Hoa chúc mừng', 'Congratulation flowers', 'Hoa chúc mừng', 'Congratulation flowers', 1, 1451061225, 1451061225),
(14, 'Màu cam', 'Orange', 'mau-cam', 'orange', 'Màu cam', 'Orange', '', 1, 4, 1, 1, 'Màu cam', 'Orange', 'Màu cam', 'Orange', 'Màu cam', 'Orange', 1, 1451107690, 1451107690),
(15, 'Cẩm chướng', 'Cam chuong', 'cam-chuong', 'cam-chuong', '', '', '', 1, 3, 1, 1, 'Cẩm chướng', 'cam chuong', 'Cẩm chướng', 'cam chuong', 'Cẩm chướng', 'cam chuong', 1, 1451108881, 1451109063),
(16, 'Hoa cúc', 'hoa cuc', 'hoa-cuc', 'hoa-cuc', '', '', '', 1, 3, 1, 1, 'Hoa cúc', 'hoa cuc', 'Hoa cúc', 'hoa cuc', 'Hoa cúc', 'hoa cuc', 1, 1451108899, 1451108899),
(17, 'Hoa đồng tiền', 'Hoa dong tien', 'hoa-dong-tien', 'hoa-dong-tien', '', '', '', 1, 3, 1, 1, 'Hoa đồng tiền', 'Hoa dong tien', 'Hoa đồng tiền', 'Hoa dong tien', 'Hoa đồng tiền', 'Hoa dong tien', 1, 1451108907, 1451108907),
(18, 'Hoa hồng', 'Hoa hong', 'hoa-hong', 'hoa-hong', '', '', '', 1, 3, 1, 1, 'Hoa hồng', 'Hoa hong', 'Hoa hồng', 'Hoa hong', 'Hoa hồng', 'Hoa hong', 1, 1451108925, 1451108925),
(19, 'Lan hồ điệp', 'Lan ho diep', 'lan-ho-diep', 'lan-ho-diep', '', '', '', 1, 3, 1, 1, 'Lan hồ điệp', 'Lan ho diep', 'Lan hồ điệp', 'Lan ho diep', 'Lan hồ điệp', 'Lan ho diep', 1, 1451108933, 1451108933),
(20, 'Hoa loa kèn', 'Hoa loa ken', 'hoa-loa-ken', 'hoa-loa-ken', '', '', '', 1, 3, 1, 1, 'Hoa loa kèn', 'Hoa loa ken', 'Hoa loa kèn', 'Hoa loa ken', 'Hoa loa kèn', 'Hoa loa ken', 1, 1451108948, 1451108948),
(21, 'Màu đỏ', 'Red', 'mau-do', 'red', '', '', '', 1, 4, 1, 1, 'Màu đỏ', 'Red', 'Màu đỏ', 'Red', 'Màu đỏ', 'Red', 1, 1451109131, 1451109131),
(22, 'Màu hồng', 'Pink', 'mau-hong', 'pink', '', '', '', 1, 4, 1, 1, 'Màu hồng', 'Pink', 'Màu hồng', 'Pink', 'Màu hồng', 'Pink', 1, 1451109138, 1451109138),
(23, 'Màu vàng', 'Yellow', 'mau-vang', 'yellow', '', '', '', 1, 4, 1, 1, 'Màu vàng', 'Yellow', 'Màu vàng', 'Yellow', 'Màu vàng', 'Yellow', 1, 1451109145, 1451109145),
(24, 'Hoa sinh nhật', 'Hoa sinh nhat', 'hoa-sinh-nhat', 'hoa-sinh-nhat', '', '', '', 1, 2, 1, 1, 'Hoa sinh nhật', 'Hoa sinh nhat', 'Hoa sinh nhật', 'Hoa sinh nhat', 'Hoa sinh nhật', 'Hoa sinh nhat', 1, 1451109169, 1451109169),
(25, 'Hoa tặng mẹ', 'Hoa tang me', 'hoa-tang-me', 'hoa-tang-me', '', '', '', 1, 2, 1, 1, 'Hoa tặng mẹ', 'Hoa tang me', 'Hoa tặng mẹ', 'Hoa tang me', 'Hoa tặng mẹ', 'Hoa tang me', 1, 1451109179, 1451109179),
(26, 'Hoa tình yêu', 'Hoa tinh yeu', 'hoa-tinh-yeu', 'hoa-tinh-yeu', '', '', '', 1, 2, 1, 1, 'Hoa tình yêu', 'Hoa tinh yeu', 'Hoa tình yêu', 'Hoa tinh yeu', 'Hoa tình yêu', 'Hoa tinh yeu', 1, 1451109186, 1451109186),
(27, 'Hoa mừng tốt nghiệp', 'Hoa mung tot nghiep', 'hoa-mung-tot-nghiep', 'hoa-mung-tot-nghiep', '', '', '', 1, 2, 1, 1, 'Hoa mừng tốt nghiệp', 'Hoa mung tot nghiep', 'Hoa mừng tốt nghiệp', 'Hoa mung tot nghiep', 'Hoa mừng tốt nghiệp', 'Hoa mung tot nghiep', 1, 1451109200, 1451109200),
(28, 'Hoa cao cấp', 'Hoa cao cap', 'hoa-cao-cap', 'hoa-cao-cap', '', '', '', 1, 5, 1, 1, 'Hoa cao cấp', 'Hoa cao cap', 'Hoa cao cấp', 'Hoa cao cap', 'Hoa cao cấp', 'Hoa cao cap', 1, 1451109226, 1451109226),
(29, 'Hoa sinh viên', 'Hoa sinh vien', 'hoa-sinh-vien', 'hoa-sinh-vien', '', '', '', 1, 5, 1, 1, 'Hoa sinh viên', 'Hoa sinh vien', 'Hoa sinh viên', 'Hoa sinh vien', 'Hoa sinh viên', 'Hoa sinh vien', 1, 1451109234, 1451109234),
(30, 'Mẫu hoa mới', 'Mau hoa moi', 'mau-hoa-moi', 'mau-hoa-moi', '', '', '', 1, 5, 1, 1, 'Mẫu hoa mới', 'Mau hoa moi', 'Mẫu hoa mới', 'Mau hoa moi', 'Mẫu hoa mới', 'Mau hoa moi', 1, 1451109250, 1451109250),
(31, 'Khuyến mãi', 'Khuyen mai', 'khuyen-mai', 'khuyen-mai', '', '', '', 1, 5, 1, 1, 'Khuyến mãi', 'Khuyen mai', 'Khuyến mãi', 'Khuyen mai', 'Khuyến mãi', 'Khuyen mai', 1, 1451109259, 1451109259),
(32, 'Sinh nhật ba mẹ', 'Sinh nhat ba me', 'sinh-nhat-ba-me', 'sinh-nhat-ba-me', '', '', '', 1, 1, 1, 1, 'Sinh nhật ba mẹ', 'Sinh nhat ba me', 'Sinh nhật ba mẹ', 'Sinh nhat ba me', 'Sinh nhật ba mẹ', 'Sinh nhat ba me', 1, 1451109286, 1451109286),
(33, 'Sinh nhật đồng nghiệp', 'Sinh nhat dong nghiep', 'sinh-nhat-dong-nghiep', 'sinh-nhat-dong-nghiep', '', '', '', 1, 1, 1, 1, 'Sinh nhật đồng nghiệp', 'Sinh nhat dong nghiep', 'Sinh nhật đồng nghiệp', 'Sinh nhat dong nghiep', 'Sinh nhật đồng nghiệp', 'Sinh nhat dong nghiep', 2, 1451109296, 1451109296),
(34, 'Sinh nhật người yêu', 'Sinh nhat nguoi yeu', 'sinh-nhat-nguoi-yeu', 'sinh-nhat-nguoi-yeu', '', '', '', 1, 1, 1, 1, 'Sinh nhật người yêu', 'Sinh nhat nguoi yeu', 'Sinh nhật người yêu', 'Sinh nhat nguoi yeu', 'Sinh nhật người yêu', 'Sinh nhat nguoi yeu', 4, 1451109309, 1451109309),
(35, 'Sinh nhật Ox, Bx', 'Sinh nhat Ox, Bx', 'sinh-nhat-ox-bx', 'sinh-nhat-ox-bx', '', '', '', 1, 1, 1, 1, 'Sinh nhật Ox, Bx', 'Sinh nhat Ox, Bx', 'Sinh nhật Ox, Bx', 'Sinh nhat Ox, Bx', 'Sinh nhật Ox, Bx', 'Sinh nhat Ox, Bx', 3, 1451109323, 1451109323),
(36, 'Cây văn phòng', 'Office plants', 'cay-van-phong', 'office-plants', '', '', '', 0, 0, 2, 1, 'Cây văn phòng', 'Office plants', 'Cây văn phòng', 'Office plants', 'Cây văn phòng', 'Office plants', 1, 1451129749, 1451129749),
(37, 'Cây thủy canh', 'Aquatic plants', 'cay-thuy-canh', 'aquatic-plants', '', '', '', 0, 0, 2, 1, 'Cây thủy canh', 'Aquatic plants', 'Cây thủy canh', 'Aquatic plants', 'Cây thủy canh', 'Aquatic plants', 2, 1451129781, 1451129781),
(38, 'Lan hồ điệp', 'Orchids', 'lan-ho-diep', 'orchids', '', '', '', 0, 0, 2, 1, 'Lan hồ điệp', 'Orchids', 'Lan hồ điệp', 'Orchids', 'Lan hồ điệp', 'Orchids', 3, 1451129794, 1451129794),
(39, 'Cây để bàn', 'Desk plants', 'cay-de-ban', 'desk-plants', '', '', '', 0, 0, 2, 1, 'Cây để bàn', 'Desk plants', 'Cây để bàn', 'Desk plants', 'Cây để bàn', 'Desk plants', 4, 1451129806, 1451129806),
(40, 'Bánh kem Givral', 'Givral Cakes', 'banh-kem-givral', 'givral-cakes', '', '', '', 0, 0, 3, 1, 'Bánh kem Givral', 'Givral Cakes', 'Bánh kem Givral', 'Givral Cakes', 'Bánh kem Givral', 'Givral Cakes', 1, 1451130034, 1451130034),
(41, 'Sô-cô-la Boniva', 'Boniva chocolate', 'so-co-la-boniva', 'boniva-chocolate', '', '', '', 0, 0, 3, 1, 'Sô-cô-la Boniva', 'Boniva chocolate', 'Sô-cô-la Boniva', 'Boniva chocolate', 'Sô-cô-la Boniva', 'Boniva chocolate', 1, 1451130043, 1451130043),
(42, 'Chocolate Graphics', 'Chocolate Graphics', 'chocolate-graphics', 'chocolate-graphics', '', '', '', 0, 0, 3, 1, 'Chocolate Graphics', 'Chocolate Graphics', 'Chocolate Graphics', 'Chocolate Graphics', 'Chocolate Graphics', 'Chocolate Graphics', 1, 1451130057, 1451130057),
(43, 'Bánh kem Tano', 'Tano bakery', 'banh-kem-tano', 'tano-bakery', '', '', '', 0, 0, 3, 1, 'Bánh kem Tano', 'Tano bakery', 'Bánh kem Tano', 'Tano bakery', 'Bánh kem Tano', 'Tano bakery', 1, 1451130068, 1451130068),
(44, 'Gấu bông', 'Teddy', 'gau-bong', 'teddy', '', '', '', 0, 0, 3, 1, 'Gấu bông', 'Teddy', 'Gấu bông', 'Teddy', 'Gấu bông', 'Teddy', 1, 1451130077, 1451130077),
(45, 'Trái cây', 'Fruits', 'trai-cay', 'fruits', '', '', '', 0, 0, 3, 1, 'Trái cây', 'Fruits', 'Trái cây', 'Fruits', 'Trái cây', 'Fruits', 1, 1451130088, 1451130088);

-- --------------------------------------------------------

--
-- Table structure for table `cate_type`
--

CREATE TABLE IF NOT EXISTS `cate_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_vi` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `alias_vi` varchar(255) NOT NULL,
  `alias_en` varchar(255) NOT NULL,
  `icon_url` varchar(255) NOT NULL,
  `display_order` int(11) NOT NULL,
  `meta_title_vi` varchar(255) NOT NULL,
  `meta_title_en` varchar(255) NOT NULL,
  `meta_description_vi` varchar(255) NOT NULL,
  `meta_description_en` varchar(255) NOT NULL,
  `meta_keyword_vi` varchar(255) NOT NULL,
  `meta_keyword_en` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cate_type`
--

INSERT INTO `cate_type` (`id`, `name_vi`, `name_en`, `alias_vi`, `alias_en`, `icon_url`, `display_order`, `meta_title_vi`, `meta_title_en`, `meta_description_vi`, `meta_description_en`, `meta_keyword_vi`, `meta_keyword_en`, `created_at`, `updated_at`) VALUES
(1, 'Hoa tươi', 'Flowers', 'hoa-tuoi', 'flowers', '', 2, 'Hoa tươi', 'Flowers', 'Hoa tươi', 'Flowers', 'Hoa tươi', 'Flowers', 1451101243, 1451143589),
(2, 'Cây may mắn', 'Lucky trees', 'cay-may-man', 'lucky-trees', '', 1, 'Cây may mắn', 'Lucky trees', 'Cây may mắn', 'Lucky trees', 'Cây may mắn', 'Lucky trees', 1451101243, 1451101243),
(3, 'Kẹo ngọt', 'Sweet gift', 'keo-ngot', 'sweet-gift', '', 3, 'Kẹo ngọt', 'Sweet gift', 'Kẹo ngọt', 'Sweet gift', 'Kẹo ngọt', 'Sweet gift', 1451101243, 1451143606),
(4, 'Gấu bông', 'Teddy', 'gau-bong', 'teddy', '', 4, 'Gấu bông', 'Teddy', 'Gấu bông', 'Teddy', 'Gấu bông', 'Teddy', 1451101243, 1451101243);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inter_id` int(11) NOT NULL COMMENT '1: vn , 2 : america',
  `name_vi` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `alias_vi` varchar(255) NOT NULL,
  `alias_en` varchar(255) NOT NULL,
  `name_en_vi` varchar(255) NOT NULL,
  `name_en_en` varchar(255) NOT NULL,
  `phuong_tien_vi` varchar(255) DEFAULT NULL,
  `phuong_tien_en` varchar(255) DEFAULT NULL,
  `date_start` date NOT NULL,
  `days` tinyint(4) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `noi_don_vi` varchar(255) NOT NULL,
  `noi_don_en` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `pdf_url` varchar(255) NOT NULL,
  `dia_diem_vi` varchar(255) NOT NULL,
  `dia_diem_en` varchar(255) NOT NULL,
  `persons` int(11) NOT NULL,
  `prices` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `inter_id`, `name_vi`, `name_en`, `alias_vi`, `alias_en`, `name_en_vi`, `name_en_en`, `phuong_tien_vi`, `phuong_tien_en`, `date_start`, `days`, `contact`, `noi_don_vi`, `noi_don_en`, `image_url`, `pdf_url`, `dia_diem_vi`, `dia_diem_en`, `persons`, `prices`, `created_at`, `updated_at`) VALUES
(2, 2, 'Nha Trang - Phan Thiết', 'Nha Trang - Phan Thiết', 'nha-trang-phan-thiet', 'nha-trang-phan-thiet', 'Nha Trang - Phan Thiet', 'Nha Trang - Phan Thiet', 'Xe', 'Xe', '2015-12-15', 2, '0917492306', 'Bến xe Miền Đông', 'Ben xe Mien Dong', 'upload/2015/12/16/jellyfish_1450282061.jpg', 'upload/images/2015/12/13/sample-4.pdf', 'Phan Thiết', 'Phan Thiet', 100, 150, 1449998547, 1450282441),
(3, 1, 'Bến Nhà Rồng', 'Ben nha Rong', 'ben-nha-rong', 'ben-nha-rong', 'Ben Nha Rong', 'Ben nha Rong', '', '', '2015-12-08', 2, '0988899980', 'Gas HCM', '', 'upload/2015/12/16/lighthouse_1450282008.jpg', 'upload/images/2015/12/13/sample-5.pdf', 'HCM', 'HCM', 10, 200, 1450003087, 1450282037);

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text_vi` varchar(255) NOT NULL,
  `text_en` varchar(255) NOT NULL,
  `block_id` int(11) NOT NULL,
  `link_url` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `old_event`
--

CREATE TABLE IF NOT EXISTS `old_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_vi` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `alias_vi` varchar(255) NOT NULL,
  `alias_en` varchar(255) NOT NULL,
  `photograper_vi` varchar(255) NOT NULL,
  `photograper_en` varchar(255) NOT NULL,
  `model_vi` varchar(255) NOT NULL,
  `model_en` varchar(255) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `date_start` date NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `content_vi` text NOT NULL,
  `content_en` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `old_event`
--

INSERT INTO `old_event` (`id`, `name_vi`, `name_en`, `alias_vi`, `alias_en`, `photograper_vi`, `photograper_en`, `model_vi`, `model_en`, `category_id`, `date_start`, `image_url`, `created_at`, `updated_at`, `status`, `content_vi`, `content_en`) VALUES
(1, 'Old event 1', 'Old event 1', 'old-event-1', 'old-event-1', 'Hoang Nguyen', 'Hoang Nguyen', 'Midu', 'Midu', 1, '2015-12-16', 'upload/2015/12/16/chrysanthemum_1450288937.jpg', 1450246408, 1450288940, 0, 'dgvasd gasdg asdg<br />\r\n&nbsp;sdagsd<br />\r\n&nbsp;gsdg<br />\r\nsdg sdgsdg sdg asd gsdag sdg asdg', 'ds gasdg sdgsdg sadg sadg asdg<br />\r\nsd gsdag sd gasdg sdagsdag&nbsp;<br />\r\nsd gsdags dag sdgasdf afsadf&nbsp;<br />\r\nasf asf ASFAS FASf&nbsp;<br />\r\nasfAS &nbsp;FASF AS FAS'),
(2, 'Event 2', 'Event 2', 'event-2', 'event-2', 'Tte', 'tes', 'safas', 'fasf', 1, '2015-12-30', 'upload/2015/12/16/jellyfish_1450288965.jpg', 1450288971, 1450288971, 0, 'dfsdfdgadsgsadg', 'dsgsagsdgas'),
(3, 'osafadsgf', 'dsfsad', 'osafadsgf', 'dsfsad', 'sgdsg', 'dsgd', 'dsgasdg', 'dgdg', 4, '2015-12-23', 'upload/2015/12/16/chrysanthemum_1450288991.jpg', 1450288998, 1450288998, 0, 'dsgadsg', 'dsagsadgadsg');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  `page_alias` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `content` text,
  `is_hot` tinyint(1) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `seo_text` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_vi` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `alias_vi` varchar(255) NOT NULL,
  `alias_en` varchar(255) NOT NULL,
  `description_vi` varchar(255) NOT NULL,
  `description_en` varchar(255) NOT NULL,
  `content_vi` text NOT NULL,
  `content_en` text NOT NULL,
  `gift_vi` varchar(500) NOT NULL,
  `gift_en` varchar(500) NOT NULL,
  `note_vi` text NOT NULL,
  `note_en` text NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  `is_sale` tinyint(1) NOT NULL DEFAULT '0',
  `image_url` varchar(255) NOT NULL,
  `cate_type_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `meta_title_vi` varchar(255) NOT NULL,
  `meta_title_en` varchar(255) NOT NULL,
  `meta_description_vi` varchar(255) NOT NULL,
  `meta_description_en` varchar(255) NOT NULL,
  `meta_keyword_vi` varchar(255) NOT NULL,
  `meta_keyword_en` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name_vi`, `name_en`, `alias_vi`, `alias_en`, `description_vi`, `description_en`, `content_vi`, `content_en`, `gift_vi`, `gift_en`, `note_vi`, `note_en`, `is_new`, `is_sale`, `image_url`, `cate_type_id`, `price`, `price_sale`, `meta_title_vi`, `meta_title_en`, `meta_description_vi`, `meta_description_en`, `meta_keyword_vi`, `meta_keyword_en`, `created_at`, `updated_at`) VALUES
(2, 'Ngày mới 2', 'Ngay moi 2', 'ngay-moi-2', 'ngay-moi-2', '"Ngày mới 2" với tông hồng xinh rực rỡ, lãng mạn và cũng không kém phần dịu dàng. Hoa thích hợp để dành tặng những cô gái tràn đầy nữ tính bên cạnh bạn.', 'The pink bouquet includes fresh blooming flowers representing a energetic life. With the message of "Have a nice day!", this is a suitable gift for anyone.', '<p style="margin: 7px 0px 8px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">\r\n	&quot;Ng&agrave;y mới 2&quot; được thiết kế từ:</p>\r\n', '<p style="margin: 7px 0px 8px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">\r\n	&quot;New day 2&quot; includes:</p>\r\n', 'Tặng thiệp hoặc banner chúc mừng.', 'Tặng thiệp hoặc banner chúc mừng.', '', '', 1, 1, 'upload/images/2015/12/28/jellyfish-3.jpg', 1, 320000, 250000, 'Ngày mới 2', 'Ngay moi 2', 'Ngày mới 2', 'Ngay moi 2', 'Ngày mới 2', 'Ngay moi 2', 1451188373, 1451317724),
(3, 'Cay test', 'Tree test', 'cay-test', 'tree-test', 'afsasf', 'safas', '<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">C&acirc;y Cau Nga Mi</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">T&ecirc;n thường thường:Cau nga mi, Ch&agrave; l&agrave; cảnh&nbsp;</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">T&ecirc;n tiếng Anh:Dwraf date Palm&nbsp;</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">T&ecirc;n khoa học: Phoenix roebelenii&nbsp;</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">Họ: Arecaceae</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">T&ocirc;́c đ&ocirc;̣ sinh trưởng: Ch&acirc;̣m</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">C&acirc;y ưa s&aacute;ng, giai đoạn c&ograve;n nhỏ đ&ograve;i hỏi phải che b&oacute;ng, đ&acirc;́t tho&aacute;t nước t&ocirc;́t, tr&ocirc;̀ng cổ rễ cao hơn miệng hố.</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">Nh&acirc;n gi&ocirc;́ng từ hạt. Nhu cầu nước trung b&igrave;nh.</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">C&acirc;y th&acirc;n cột thấp, m&agrave;u x&aacute;m bạc, c&oacute; nhiều cuống l&aacute; rụng để lại tr&ecirc;n th&acirc;n.</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">L&aacute; mọc tập trung ở đỉnh, cong, cuống c&oacute; gai d&agrave;i m&agrave;u v&agrave;ng ở gốc.</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">L&aacute; dạng k&eacute;p l&ocirc;ng chim, l&aacute; phụ dạng dải mảnh, đầu nhọn cứng, m&agrave;u xanh.</span>', '<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">C&acirc;y Cau Nga Mi</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">T&ecirc;n thường thường:Cau nga mi, Ch&agrave; l&agrave; cảnh&nbsp;</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">T&ecirc;n tiếng Anh:Dwraf date Palm&nbsp;</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">T&ecirc;n khoa học: Phoenix roebelenii&nbsp;</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">Họ: Arecaceae</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">T&ocirc;́c đ&ocirc;̣ sinh trưởng: Ch&acirc;̣m</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">C&acirc;y ưa s&aacute;ng, giai đoạn c&ograve;n nhỏ đ&ograve;i hỏi phải che b&oacute;ng, đ&acirc;́t tho&aacute;t nước t&ocirc;́t, tr&ocirc;̀ng cổ rễ cao hơn miệng hố.</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">Nh&acirc;n gi&ocirc;́ng từ hạt. Nhu cầu nước trung b&igrave;nh.</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">C&acirc;y th&acirc;n cột thấp, m&agrave;u x&aacute;m bạc, c&oacute; nhiều cuống l&aacute; rụng để lại tr&ecirc;n th&acirc;n.</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">L&aacute; mọc tập trung ở đỉnh, cong, cuống c&oacute; gai d&agrave;i m&agrave;u v&agrave;ng ở gốc.</span><br style="margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;" />\r\n<span style="color: rgb(85, 85, 85); font-family: ''Open Sans'', sans-serif; font-size: 14px;">L&aacute; dạng k&eacute;p l&ocirc;ng chim, l&aacute; phụ dạng dải mảnh, đầu nhọn cứng, m&agrave;u xanh.</span>', 'fsafasf', 'fasfasf', '', '', 1, 1, 'upload/images/2015/12/27/2588_cau-nga-mi-12.jpg', 2, 11221411, 2222, 'sfasf', 'asfasf', 'safas', 'fasfasf', 'asfas', 'fasfasfs', 1451192738, 1451198598);

-- --------------------------------------------------------

--
-- Table structure for table `product_cate`
--

CREATE TABLE IF NOT EXISTS `product_cate` (
  `product_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`cate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_cate`
--

INSERT INTO `product_cate` (`product_id`, `cate_id`, `parent_id`) VALUES
(2, 1, 1),
(2, 3, 3),
(2, 4, 4),
(2, 5, 5),
(2, 14, 4),
(2, 15, 3),
(2, 28, 5),
(2, 32, 1),
(3, 36, 36),
(3, 37, 37);

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE IF NOT EXISTS `seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8 NOT NULL,
  `seo_text` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `page_name`, `meta_title`, `meta_description`, `meta_keyword`, `seo_text`) VALUES
(1, 'Trang chủ', 'Vereairline gắn kết gần nhau hơn', 'Vereairline gắn kết gần nhau hơn, Xử lý vé chuyên nghiệp, phục vụ 24/24.', 'Vé máy bay, ve may bay, ve may bay online, đại lý vé máy bay, dai ly ve may bay, phòng vé online', ''),
(2, 'Giới thiệu', 'Giới thiệu', 'Giới thiệu', 'Giới thiệu', NULL),
(3, 'Liên hệ', 'Liên hệ', 'Liên hệ', 'Liên hệ', NULL),
(10, 'Tìm kiếm', 'Tìm kiếm', 'Tìm kiếm', 'Tìm kiếm', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `text`
--

CREATE TABLE IF NOT EXISTS `text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text_vi` text NOT NULL,
  `text_en` text NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1 : hotline, 2: mua ve, 3 : thanh toan, 4 : tai sao chon 5: footer',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `text`
--

INSERT INTO `text` (`id`, `text_vi`, `text_en`, `type`) VALUES
(1, 'HOTLINE', '', 1),
(2, '(043) 782 488', '', 1),
(3, '(08) 3820 9528', '', 1),
(4, 'T2-T7: 7:30-21:30', '', 1),
(5, 'CN: 8:00-17:00', '', 1),
(6, 'MUA VÉ', '', 2),
(7, 'Trực tiếp lên website, nhanh nhất - tiện nhất', '', 2),
(8, 'Qua chat', '', 2),
(9, 'dichvubay', '', 2),
(10, 'Mr Dũng', '', 2),
(11, 'tam.dichvubay', '', 2),
(12, 'Ms Tâm', '', 2),
(13, 'Gọi điện cho dichvubay.com', '', 2),
(14, 'Hotline:', '', 2),
(15, '0933 69 2882', '', 2),
(16, 'Đến trực tiếp văn phòng Dichvubay.com tại Hà Nội và Sài Gòn', '', 2),
(42, 'PHÒNG VÉ MÁY BAY STH.VN', '', 5),
(18, 'Thanh toán bằng tiền mặt tại phòng vé', '', 3),
(19, 'Sau khi đặt hàng thành công, Quý khách vui lòng qua văn phòng Dichvubay.com để thanh toán và nhận vé.', '', 3),
(20, 'Thanh toán tại nhà', '', 3),
(21, 'Nhân viên Dichvubay.com sẽ giao vé &amp; thu tiền tại nhà theo địa chỉ Quý khách cung cấp.', '', 3),
(22, 'Thanh toán qua các cổng thanh toán điện tử', '', 3),
(23, 'Sau khi đặt hàng thành công, Quý khách vui lòng qua văn phòng DICHVUBAY.COM để thanh toán và nhận vé.', '', 3),
(24, 'Thanh toán qua chuyển khoản', '', 3),
(25, 'Quý khách có thể thanh toán cho chúng tôi bằng cách chuyển khoản trực tiếp tại ngân hàng, chuyển qua thẻ ATM, hoặc qua Internet banking.', '', 3),
(26, 'Branding', '', 4),
(27, 'Lorem ipsum dolor sit amet, consect omis unde quam vitae moris elit. Etiam sit amet velit tortor.', '', 4),
(28, 'Development', '', 4),
(29, 'Maecenas maximus felis ipsum, rhoncus gravida quam aliquet et. Integer sit amet aliquam purus.', '', 4),
(30, 'Logo design', '', 4),
(31, 'Quisque lacus mi, consequat quis congue vitae, ornare eu quam. Vestibulum luctus ligula eget.', '', 4),
(32, 'Support', '', 4),
(33, 'Donec quis dolor sem. Nullam tempor ante ipsum, ut volutpat quam accumsan tristique dolor.', '', 4),
(34, 'About Us', '', 5),
(35, '102580 Santa Monica Los Angeles', '', 5),
(36, '+3 045 224 33 12', '', 5),
(37, 'support@netbaseteam.net', '', 5),
(38, 'Corporate', '', 5),
(39, 'Support', '', 5),
(40, 'Other Info', '', 5),
(41, 'Printmart provides fast online printing for provide high quality business cards, postcards, flyers, brochures, stationery and  other premium online print products.', '', 5),
(43, 'CÂU HỎI THƯỜNG GẶP', '', 6),
(44, 'THÔNG TIN CẦN BIẾT', '', 6),
(45, 'VÉ MÁY BAY QUỐC TẾ', '', 6),
(46, 'VÉ MÁY BAY NỘI ĐỊA', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE IF NOT EXISTS `url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) NOT NULL,
  `object_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `alias`, `object_id`, `type`) VALUES
(1, 'gioi-thieu', 1, 2),
(8, 'tuyen-dung', 14, 2),
(9, 've-may-bay-noi-dia', 1, 1),
(10, 've-may-bay-quoc-te', 2, 1),
(11, 've-may-bay-khuyen-mai', 3, 1),
(12, 'dich-vu-cua-chung-toi', 4, 1),
(13, 'thong-tin-can-biet', 5, 1),
(46, 'cau-hoi-thuong-gap', 6, 1),
(47, 'du-lich-trong-nuoc', 7, 1),
(48, 'du-lich-nuoc-ngoai', 8, 1),
(49, 'thu-tuc-visa', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `last_login` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_by` tinyint(4) NOT NULL,
  `updated_by` tinyint(4) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `full_name`, `email`, `phone`, `address`, `city_id`, `status`, `last_login`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 'hoang', 'e10adc3949ba59abbe56e057f20f883e', 'HoangNH', 'hoang', '0917492306', '123 abcssssssssss', 1, 1, NULL, 1426400277, 1429053907, 0, 1),
(3, 'liembd', '851eec1df720cab32b54a2241942d6ad', 'dsgsadgsdgsd', 'sdgadsgadsg', 'asdfasf', 'safsdf', 1, 1, 0, 1429053937, 1429053937, 1, 1),
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Administrator', 'admin', '0917492306', '', 0, 1, NULL, 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
