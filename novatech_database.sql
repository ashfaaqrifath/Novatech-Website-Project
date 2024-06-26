-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2024 at 02:12 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novatech_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

DROP TABLE IF EXISTS `cart_tbl`;
CREATE TABLE IF NOT EXISTS `cart_tbl` (
  `cartID` int NOT NULL AUTO_INCREMENT,
  `productName` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL,
  `imagePath` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`cartID`)
) ENGINE=MyISAM AUTO_INCREMENT=179 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`cartID`, `productName`, `price`, `stock`, `imagePath`, `email`) VALUES
(168, 'Redmi Note 12 Pro 5G', 75000, 30, 'uploads/Redmi-Note-12-Pro-5G-6GB-RAM-128GB-Simplytek-lk_610x_crop_center-Photoroom.png-Photoroom.png', 'sample@abc.com'),
(167, 'Anker Soundcore H30i', 17500, 30, 'uploads/f1.webp', 'sample@abc.com'),
(157, 'Samsung Galaxy M13', 75000, 24, 'uploads/M13-2-Photoroom.png', 'dummy@gmail.com'),
(158, 'Aspor A319 50000 Powerbank', 12000, 19, 'uploads/Aspor-A319-50000-Power-Bank-Simplytek-lk-Sri-Lanka_1_610x_crop_center-Photoroom.png-Photoroom.png', 'dummy@gmail.com'),
(173, 'Anker Soundcore H30i', 17500, 30, 'uploads/f1.webp', 'johnd@gmail.com'),
(176, 'Samsung Galaxy M13', 75000, 24, 'uploads/M13-2-Photoroom.png', 'rachinter5@gmail.com'),
(177, 'Samsung Galaxy Watch 4', 45000, 27, 'uploads/Samsung-Galaxy-Watch4-Classic-Edition-Bluetooth-Model-Samsung-Watches-Sri-Lanka-SimplyTek-1_1220x_crop_center-Photoroom.png-Photoroom.png', 'rachinter5@gmail.com'),
(178, 'Apple iPhone 13', 280000, 69, 'uploads/iphone-13-Blue-Price-in-Srilanka-Apple-Asia-1-Photoroom.png', 'sample@abc.com'),
(150, 'JBL Bluetooth Speaker', 25000, 41, 'uploads/flip-5-jbl-bluetooth-speakers-sri-lanka-simplytek-5_610x_crop_center-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(164, 'Samsung Galaxy M13', 75000, 24, 'uploads/M13-2-Photoroom.png', 'ashfaaq.rifath2@gmail.com'),
(165, 'Aspor A319 50000 Powerbank', 12000, 18, 'uploads/Aspor-A319-50000-Power-Bank-Simplytek-lk-Sri-Lanka_1_610x_crop_center-Photoroom.png-Photoroom.png', 'ashfaaq.rifath2@gmail.com'),
(147, 'Samsung Galaxy Watch 4', 45000, 29, 'uploads/Samsung-Galaxy-Watch4-Classic-Edition-Bluetooth-Model-Samsung-Watches-Sri-Lanka-SimplyTek-1_1220x_crop_center-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(146, 'JBL LIVE FREE 2', 60000, 40, 'uploads/JBL_LIVE_FREE_2_Product_Simplytek-lk_1_610x_crop_center-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(156, 'Samsung Galaxy Watch 4', 45000, 29, 'uploads/Samsung-Galaxy-Watch4-Classic-Edition-Bluetooth-Model-Samsung-Watches-Sri-Lanka-SimplyTek-1_1220x_crop_center-Photoroom.png-Photoroom.png', 'dummy@gmail.com'),
(163, 'Xiaomi Redmi 13C', 75000, 27, 'uploads/Redmi-13c-simplytek-lk_610x_crop_center(1).png', 'ashfaaq.rifath2@gmail.com'),
(149, 'Aspor A319 50000 Powerbank', 12000, 19, 'uploads/Aspor-A319-50000-Power-Bank-Simplytek-lk-Sri-Lanka_1_610x_crop_center-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(172, 'Samsung Galaxy Watch 4', 45000, 27, 'uploads/Samsung-Galaxy-Watch4-Classic-Edition-Bluetooth-Model-Samsung-Watches-Sri-Lanka-SimplyTek-1_1220x_crop_center-Photoroom.png-Photoroom.png', 'johnd@gmail.com'),
(169, 'Apple iPhone 13', 280000, 71, 'uploads/iphone-13-Blue-Price-in-Srilanka-Apple-Asia-1-Photoroom.png', 'sample@abc.com'),
(171, 'Apple iPhone 13', 280000, 70, 'uploads/iphone-13-Blue-Price-in-Srilanka-Apple-Asia-1-Photoroom.png', 'johnd@gmail.com'),
(175, 'JBL LIVE FREE 2', 60000, 37, 'uploads/JBL_LIVE_FREE_2_Product_Simplytek-lk_1_610x_crop_center-Photoroom.png-Photoroom.png', 'rachinter5@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

DROP TABLE IF EXISTS `order_tbl`;
CREATE TABLE IF NOT EXISTS `order_tbl` (
  `orderID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `productNames` varchar(500) NOT NULL,
  `payment` int NOT NULL,
  `orderDate` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`orderID`, `email`, `productNames`, `payment`, `orderDate`, `address`, `status`) VALUES
(36, 'sample@abc.com', 'Apple Watch SE 44MM<br>JBL Tune Buds', 110100, '2024-06-21', 'Ruwanwelisaya, Anuradhapura, Sri Lanka', 'Processing'),
(37, 'sample@abc.com', 'Samsung Galaxy S23 Ultra<br>OnePlus 11 5G<br>Anker Soundcore Q20i', 648100, '2024-06-21', 'Ruwanwelisaya, Anuradhapura, Sri Lanka', 'Delivered'),
(34, 'ashfaaq.rifath2@gmail.com', 'Xiaomi Redmi 13C', 75100, '2024-06-21', '191 / 2A 1/1 Sri Saranankara Road, Dehiwala', 'Processing'),
(35, 'ashfaaq.rifath2@gmail.com', 'Anker Soundcore Q20i<br>JBL Tune Buds<br>Samsung Galaxy Watch 5 Pro', 133100, '2024-06-21', '191 / 2A 1/1 Sri Saranankara Road, Dehiwala', 'Delivered'),
(38, 'sample@abc.com', 'Samsung Galaxy Watch 5 Pro<br>Anker Soundcore Q20i', 103100, '2024-06-21', 'Ruwanwelisaya, Anuradhapura, Sri Lanka', 'Processing'),
(40, 'ashfaaq.rifath2@gmail.com', 'Google Pixel 7 Pro<br>Apple Watch SE 44MM', 380100, '2024-06-21', '191 / 2A 1/1 Sri Saranankara Road, Dehiwala', 'Delivered'),
(41, 'johnd@gmail.com', 'Nothing Phone (1)<br>Google Pixel 8 Pro', 500100, '2024-06-21', 'Independence Square, Colombo 7, Sri Lanka', 'Processing'),
(42, 'johnd@gmail.com', 'JBL Tune Buds<br>Oneplus Nord CE 5G<br>Nothing Phone (1)', 265100, '2024-06-21', 'Independence Square, Colombo 7, Sri Lanka', 'Delivered'),
(43, 'johnd@gmail.com', 'Redmi Note 12 Pro 5G', 75100, '2024-06-21', 'Independence Square, Colombo 7, Sri Lanka', 'Processing'),
(44, 'rachinter5@gmail.com', 'Apple iPhone 14 Pro<br>Samsung Galaxy S23 Ultra', 750100, '2024-06-21', 'Galle Face Green, Colombo, Sri Lanka', 'Delivered'),
(45, 'rachinter5@gmail.com', 'Nothing Phone (1)<br>Anker Soundcore Q20i<br>Xiaomi Redmi 13C', 243100, '2024-06-21', 'Galle Face Green, Colombo, Sri Lanka', 'Delivered'),
(46, 'rachinter5@gmail.com', 'OnePlus 11 5G<br>Samsung Galaxy Watch 5 Pro<br>Samsung Galaxy Watch 5 Pro', 450100, '2024-06-21', 'Galle Face Green, Colombo, Sri Lanka', 'Processing'),
(47, 'admin@novatech.com', 'JBL Tune Buds<br>Xiaomi Redmi 13C<br>Redmi Note 12 Pro 5G', 180100, '2024-06-21', 'BOC merchant tower, 28 St Michaels Rd, Colombo', 'Delivered'),
(48, 'admin@novatech.com', 'JBL Tune Buds<br>JBL Tune Buds<br>Anker Soundcore Q20i', 78100, '2024-06-21', 'BOC merchant tower, 28 St Michaels Rd, Colombo', 'Processing'),
(49, 'admin@novatech.com', 'Oneplus Nord CE 5G<br>Redmi Note 12 Pro 5G', 160100, '2024-06-21', 'BOC merchant tower, 28 St Michaels Rd, Colombo', 'Delivered'),
(50, 'admin@novatech.com', 'Apple iPhone 15 Pro', 550100, '2024-06-21', 'BOC merchant tower, 28 St Michaels Rd, Colombo', 'Processing'),
(51, 'dummy@gmail.com', 'Xiaomi Redmi 13C<br>Oneplus Nord CE 5G<br>Nothing Phone (1)<br>Apple Watch SE 44MM<br>Anker Soundcore Q20i', 408100, '2024-06-21', 'Hulangala, riverston', 'Processing'),
(52, 'dummy@gmail.com', 'Apple iPhone 14 Pro', 400100, '2024-06-21', 'Hulangala, riverston', 'Delivered'),
(53, 'dummy@gmail.com', 'Xiaomi Redmi 13C', 75100, '2024-06-21', 'Hulangala, riverston', 'Processing'),
(54, 'ashfaaq.rifath2@gmail.com', 'Apple iPhone 15 Pro', 550100, '2024-06-21', '191 / 2A 1/1 Sri Saranankara Road, Dehiwala', 'Processing'),
(55, 'sample@abc.com', 'Anker A1652 MagGo 10000mAh<br>Anker Soundcore Mini 2', 23100, '2024-06-24', 'Ruwanwelisaya, Anuradhapura, Sri Lanka', 'Processing'),
(56, 'johnd@gmail.com', 'JBL Bluetooth Speaker<br>Anker Soundcore Mini 2<br>Anker A1652 MagGo 10000mAh', 48100, '2024-06-24', 'Independence Square, Colombo 7, Sri Lanka', 'Processing'),
(57, 'rachinter5@gmail.com', 'Samsung Galaxy M13<br>Samsung Galaxy Watch 4<br>Samsung Galaxy Watch 4', 165100, '2024-06-24', 'Galle Face Green, Colombo, Sri Lanka', 'Delivered'),
(58, 'admin@novatech.com', 'Samsung Galaxy M13<br>Aspor A319 50000 Powerbank<br>Samsung Galaxy Watch 4', 132100, '2024-06-24', 'BOC merchant tower, 28 St Michaels Rd, Colombo', 'Processing'),
(59, 'admin@novatech.com', 'JBL LIVE FREE 2', 60100, '2024-06-24', 'BOC merchant tower, 28 St Michaels Rd, Colombo', 'Delivered'),
(60, 'dummy@gmail.com', 'Xiaomi Redmi 13C<br>Oneplus Nord CE 5G<br>JBL LIVE FREE 2', 220100, '2024-06-24', 'Hulangala, riverston', 'Processing'),
(61, 'dummy@gmail.com', 'Anker Soundcore Mini 2<br>Anker A1652 MagGo 10000mAh<br>JBL Bluetooth Speaker', 48100, '2024-06-24', 'Hulangala, riverston', 'Delivered'),
(62, 'ashfaaq.rifath2@gmail.com', 'JBL Bluetooth Speaker<br>Aspor A319 50000 Powerbank<br>Anker Soundcore Mini 2', 45600, '2024-06-24', 'Sri Saranankara Road, Dehiwala', 'Processing'),
(63, 'ashfaaq.rifath2@gmail.com', 'Samsung Galaxy Watch 4<br>JBL LIVE FREE 2<br>Anker Soundcore H30i', 122600, '2024-06-24', 'Sri Saranankara Road, Dehiwala', 'Processing'),
(64, 'sample@abc.com', 'JBL LIVE FREE 2', 60100, '2024-06-24', 'Ruwanwelisaya, Anuradhapura, Sri Lanka', 'Delivered'),
(65, 'johnd@gmail.com', 'Samsung Galaxy Watch 4<br>Anker Soundcore Q20i<br>Apple iPhone 13', 343100, '2024-06-24', 'Independence Square, Colombo 7, Sri Lanka', 'Delivered'),
(66, 'rachinter5@gmail.com', 'Apple iPhone 13', 280100, '2024-06-24', 'Galle Face Green, Colombo, Sri Lanka', 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

DROP TABLE IF EXISTS `product_tbl`;
CREATE TABLE IF NOT EXISTS `product_tbl` (
  `productID` int NOT NULL AUTO_INCREMENT,
  `productName` varchar(100) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `publish` int NOT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL,
  `imagePath` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`productID`, `productName`, `description`, `publish`, `price`, `stock`, `imagePath`, `email`) VALUES
(22, 'Apple iPhone 15 Pro', '• Smooth 6.74″ 90Hz display<br>\r\n• 50MP AI triple camera<br>\r\n• Massive 5000mAh (typ) battery<br>\r\n• Supports 18W fast charging<br>\r\n• Powerful octa-core processor', 1, 350000, 68, 'uploads/Apple-iPhone-15-Pro-SimplyTek-K-4_610x_crop_center-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(23, 'Apple iPhone 13', '• Smooth 6.74″ 90Hz display<br>\r\n• 50MP AI triple camera<br>\r\n• Massive 5000mAh (typ) battery<br>\r\n• Supports 18W fast charging<br>\r\n• Powerful octa-core processor', 1, 280000, 69, 'uploads/iphone-13-Blue-Price-in-Srilanka-Apple-Asia-1-Photoroom.png', 'admin@novatech.com'),
(24, 'Samsung Galaxy S24', '• Smooth 6.74″ 90Hz display<br>\r\n• 50MP AI triple camera<br>\r\n• Massive 5000mAh (typ) battery<br>\r\n• Supports 18W fast charging<br>\r\n• Powerful octa-core processor', 1, 400000, 43, 'uploads/SamsungGalaxyS24-Simplytek-Sri-Lanka_1_1220x_crop_center-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(25, 'Samsung Galaxy S23 Ultra', '• Smooth 6.74″ 90Hz display<br>\r\n• 50MP AI triple camera<br>\r\n• Massive 5000mAh (typ) battery<br>\r\n• Supports 18W fast charging<br>\r\n• Powerful octa-core processor', 1, 350000, 34, 'uploads/Galaxy-S23-Ultra-Green-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(26, 'Google Pixel 8 Pro', '• Smooth 6.74″ 90Hz display<br>\r\n• 50MP AI triple camera<br>\r\n• Massive 5000mAh (typ) battery<br>\r\n• Supports 18W fast charging<br>\r\n• Powerful octa-core processor', 1, 350000, 33, 'uploads/Google-Pixel-8-Pro-Simplytek-lk_2_610x_crop_center-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(27, 'Google Pixel 7 Pro', '• Smooth 6.74″ 90Hz display<br>\r\n• 50MP AI triple camera<br>\r\n• Massive 5000mAh (typ) battery<br>\r\n• Supports 18W fast charging<br>\r\n• Powerful octa-core processor', 1, 300000, 43, 'uploads/Pixel-6-pro-simplytek-lk-2_610x_crop_center-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(28, 'Nothing Phone (1)', '• Smooth 6.74″ 90Hz display<br>\r\n• 50MP AI triple camera<br>\r\n• Massive 5000mAh (typ) battery<br>\r\n• Supports 18W fast charging<br>\r\n• Powerful octa-core processor', 1, 150000, 38, 'uploads/Nothing-Phone1-SimplyTek-LK-1_610x_crop_center-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(29, 'Oneplus Nord CE 5G', '• Smooth 6.74″ 90Hz display<br>\r\n• 50MP AI triple camera<br>\r\n• Massive 5000mAh (typ) battery<br>\r\n• Supports 18W fast charging<br>\r\n• Powerful octa-core processor', 1, 85000, 27, 'uploads/oneplusNordCE5G.png', 'admin@novatech.com'),
(39, 'Redmi Note 12 Pro 5G', '• Smooth 6.74″ 90Hz display<br>\r\n• 50MP AI triple camera<br>\r\n• Massive 5000mAh (typ) battery<br>\r\n• Supports 18W fast charging<br>\r\n• Powerful octa-core processor', 1, 75000, 30, 'uploads/Redmi-Note-12-Pro-5G-6GB-RAM-128GB-Simplytek-lk_610x_crop_center-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(31, 'Xiaomi Redmi 13C', '• Smooth 6.74″ 90Hz display<br>\r\n• 50MP AI triple camera<br>\r\n• Massive 5000mAh (typ) battery<br>\r\n• Supports 18W fast charging<br>\r\n• Powerful octa-core processor', 1, 75000, 27, 'uploads/Redmi-13c-simplytek-lk_610x_crop_center(1).png', 'admin@novatech.com'),
(30, 'OnePlus 11 5G', '• Smooth 6.74″ 90Hz display<br>\r\n• 50MP AI triple camera<br>\r\n• Massive 5000mAh (typ) battery<br>\r\n• Supports 18W fast charging<br>\r\n• Powerful octa-core processor', 1, 280000, 33, 'uploads/OnePlus-11-5G-16GB-RAM-256GB-Simplytek-LK_610x_crop_center-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(33, 'Samsung Galaxy M13', '• Smooth 6.74″ 90Hz display<br>\r\n• 50MP AI triple camera<br>\r\n• Massive 5000mAh (typ) battery<br>\r\n• Supports 18W fast charging<br>\r\n• Powerful octa-core processor', 1, 75000, 24, 'uploads/M13-2-Photoroom.png', 'admin@novatech.com'),
(41, 'Anker Soundcore Q20i', '• Long-Lasting Playtime<br>\r\n• Seamless and Stable Connection<br>\r\n• Foldable Design<br>\r\n• Button Controls<br>\r\n• Lightweight and Comfortable', 1, 18000, 28, 'uploads/Anker-Soundcore-Q20i-Simplytek-lk_1_610x_crop_center-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(35, 'JBL Tune Buds', '• Long-Lasting Playtime<br>\r\n• Seamless and Stable Connection<br>\r\n• Foldable Design<br>\r\n• Button Controls<br>\r\n• Lightweight and Comfortable', 1, 30000, 15, 'uploads/JBL_Tune_Buds_simplytek-lk_2_610x_crop_center-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(36, 'Apple Watch SE 44MM', '• Long-Lasting Playtime<br>\r\n• Seamless and Stable Connection<br>\r\n• Foldable Design<br>\r\n• Button Controls<br>\r\n• Lightweight and Comfortable', 1, 80000, 36, 'uploads/Apple-Watch-SE-44MM-Space-Gray-Aluminum-GPS-_E2_80_93-Midnight-Sport-Band-simplytek-lk-1_610x_crop_center-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(40, 'Samsung Galaxy Watch 5 Pro', '• Long-Lasting Playtime<br>\r\n• Seamless and Stable Connection<br>\r\n• Foldable Design<br>\r\n• Button Controls<br>\r\n• Lightweight and Comfortable', 1, 85000, 20, 'uploads/Samsung-Galaxy-Watch-5-Pro-simplytek-lk-1_610x_crop_center-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(59, 'Samsung Galaxy Watch 4', '• Long-Lasting Playtime<br>\r\n• Seamless and Stable Connection<br>\r\n• Foldable Design<br>\r\n• Button Controls<br>\r\n• Lightweight and Comfortable', 1, 45000, 27, 'uploads/Samsung-Galaxy-Watch4-Classic-Edition-Bluetooth-Model-Samsung-Watches-Sri-Lanka-SimplyTek-1_1220x_crop_center-Photoroom.png-Photoroom.png', 'ashfaaq.rifath2@gmail.com'),
(60, 'Soundpeats Space hp', '• Long-Lasting Playtime<br>\r\n• Seamless and Stable Connection<br>\r\n• Foldable Design<br>\r\n• Button Controls<br>\r\n• Lightweight and Comfortable', 1, 15000, 21, 'uploads/Soundpeats-Space-hp-simplytek-lk_3_610x_crop_center-Photoroom.png-Photoroom.png', 'ashfaaq.rifath2@gmail.com'),
(61, 'Anker Soundcore H30i', '• Long-Lasting Playtime<br>\r\n• Seamless and Stable Connection<br>\r\n• Foldable Design<br>\r\n• Button Controls<br>\r\n• Lightweight and Comfortable', 1, 17500, 30, 'uploads/f1.webp', 'admin@novatech.com'),
(62, 'JBL LIVE FREE 2', '• Long-Lasting Playtime<br>\r\n• Seamless and Stable Connection<br>\r\n• Foldable Design<br>\r\n• Button Controls<br>\r\n• Lightweight and Comfortable', 1, 60000, 37, 'uploads/JBL_LIVE_FREE_2_Product_Simplytek-lk_1_610x_crop_center-Photoroom.png-Photoroom.png', 'ashfaaq.rifath2@gmail.com'),
(63, 'Anker Soundcore Mini 2', '• Long-Lasting Playtime<br>\r\n• Seamless and Stable Connection<br>\r\n• Foldable Design<br>\r\n• Button Controls<br>\r\n• Lightweight and Comfortable', 1, 8500, 27, 'uploads/anker-soundcore-mini-2-sri-lanka-simplytek-1_610x_crop_center-Photoroom.png-Photoroom.png', 'ashfaaq.rifath2@gmail.com'),
(64, 'JBL Bluetooth Speaker', '• Long-Lasting Playtime<br>\r\n• Seamless and Stable Connection<br>\r\n• Foldable Design<br>\r\n• Button Controls<br>\r\n• Lightweight and Comfortable', 1, 25000, 39, 'uploads/flip-5-jbl-bluetooth-speakers-sri-lanka-simplytek-5_610x_crop_center-Photoroom.png-Photoroom.png', 'ashfaaq.rifath2@gmail.com'),
(65, 'Aspor A319 50000 Powerbank', '• Smooth 6.74″ 90Hz display<br>\r\n• 50MP AI triple camera<br>\r\n• Massive 5000mAh (typ) battery<br>\r\n• Supports 18W fast charging<br>\r\n• Powerful octa-core processor', 1, 12000, 18, 'uploads/Aspor-A319-50000-Power-Bank-Simplytek-lk-Sri-Lanka_1_610x_crop_center-Photoroom.png-Photoroom.png', 'ashfaaq.rifath2@gmail.com'),
(66, 'Anker A1652 MagGo 10000mAh', '• Smooth 6.74″ 90Hz display<br>\r\n• 50MP AI triple camera<br>\r\n• Massive 5000mAh (typ) battery<br>\r\n• Supports 18W fast charging<br>\r\n• Powerful octa-core processor', 1, 14500, 18, 'uploads/Anker-A1652-MagGo-10000mAh-Simplytek-lk-Sri-Lanka_1_610x_crop_center-Photoroom.png-Photoroom.png', 'ashfaaq.rifath2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

DROP TABLE IF EXISTS `user_tbl`;
CREATE TABLE IF NOT EXISTS `user_tbl` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contactNumber` int NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `imagePath` varchar(500) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`userID`, `email`, `name`, `contactNumber`, `address`, `password`, `imagePath`) VALUES
(1, 'rachinter5@gmail.com', 'Rachinter', 776860292, 'Galle Face Green, Colombo, Sri Lanka', '1234', 'uploads/avatar.jpg'),
(4, 'sample@abc.com', 'Sample test', 778941234, 'Ruwanwelisaya, Anuradhapura, Sri Lanka', '1234', 'img/mylogo3.png'),
(3, 'johnd@gmail.com', 'John Doe', 741045467, 'Independence Square, Colombo 7, Sri Lanka', '1234', 'img/mylogo3.png'),
(7, 'ashfaaq.rifath2@gmail.com', 'Ashfaaq Rifath', 741040292, 'Sri Saranankara Road, Dehiwala', '2002', 'uploads/dp20.jpg'),
(8, 'dummy@gmail.com', 'Dummy account', 764504029, 'Hulangala, riverston', '1234', 'img/mylogo3.png'),
(9, 'admin@novatech.com', 'Admin novatech', 741040292, 'BOC merchant tower, 28 St Michaels Rd, Colombo', '2002', 'uploads/mylogo7.png');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_tbl`
--

DROP TABLE IF EXISTS `wishlist_tbl`;
CREATE TABLE IF NOT EXISTS `wishlist_tbl` (
  `itemID` int NOT NULL AUTO_INCREMENT,
  `productName` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL,
  `imagePath` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wishlist_tbl`
--

INSERT INTO `wishlist_tbl` (`itemID`, `productName`, `price`, `stock`, `imagePath`, `email`) VALUES
(8, 'Xiaomi Redmi 13C', 70000, 35, 'uploads/Redmi-13c-simplytek-lk_610x_crop_center(1).png', 'sample@abc.com'),
(3, 'Anker Soundcore Q20i', 18000, 23, 'uploads/Anker-Soundcore-Q20i-Simplytek-lk_1_610x_crop_center-Photoroom.png-Photoroom.png', 'johnd@gmail.com'),
(20, 'Xiaomi Redmi 13C', 75000, 31, 'uploads/Redmi-13c-simplytek-lk_610x_crop_center(1).png', 'admin@novatech.com'),
(5, 'Samsung Galaxy Watch 5 Pro', 85000, 43, 'uploads/Samsung-Galaxy-Watch-5-Pro-simplytek-lk-1_610x_crop_center-Photoroom.png-Photoroom.png', 'johnd@gmail.com'),
(6, 'Oneplus Nord CE 5G', 150000, 24, 'uploads/oneplusNordCE5G.png', 'johnd@gmail.com'),
(9, 'Samsung Galaxy Watch 5 Pro', 85000, 43, 'uploads/Samsung-Galaxy-Watch-5-Pro-simplytek-lk-1_610x_crop_center-Photoroom.png-Photoroom.png', 'sample@abc.com'),
(10, 'JBL Tune Buds', 30000, 25, 'uploads/JBL_Tune_Buds_simplytek-lk_2_610x_crop_center-Photoroom.png-Photoroom.png', 'sample@abc.com'),
(11, 'Xiaomi Redmi 13C', 70000, 35, 'uploads/Redmi-13c-simplytek-lk_610x_crop_center(1).png', 'ashfaaq.rifath2@gmail.com'),
(13, 'Oneplus Nord CE 5G', 150000, 24, 'uploads/oneplusNordCE5G.png', 'ashfaaq.rifath2@gmail.com'),
(14, 'Samsung Galaxy Watch 5 Pro', 85000, 43, 'uploads/Samsung-Galaxy-Watch-5-Pro-simplytek-lk-1_610x_crop_center-Photoroom.png-Photoroom.png', 'ashfaaq.rifath2@gmail.com'),
(25, 'JBL LIVE FREE 2', 60000, 40, 'uploads/JBL_LIVE_FREE_2_Product_Simplytek-lk_1_610x_crop_center-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(16, 'Xiaomi Redmi 13C', 70000, 35, 'uploads/Redmi-13c-simplytek-lk_610x_crop_center(1).png', 'rachinter5@gmail.com'),
(17, 'Anker Soundcore Q20i', 18000, 23, 'uploads/Anker-Soundcore-Q20i-Simplytek-lk_1_610x_crop_center-Photoroom.png-Photoroom.png', 'rachinter5@gmail.com'),
(22, 'Google Pixel 8 Pro', 350000, 33, 'uploads/Google-Pixel-8-Pro-Simplytek-lk_2_610x_crop_center-Photoroom.png-Photoroom.png', 'admin@novatech.com'),
(26, 'Samsung Galaxy M13', 75000, 24, 'uploads/M13-2-Photoroom.png', 'ashfaaq.rifath2@gmail.com'),
(24, 'Xiaomi Redmi 13C', 75000, 30, 'uploads/Redmi-13c-simplytek-lk_610x_crop_center(1).png', 'dummy@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
