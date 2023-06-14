-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 03:52 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lagi.shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'admin', 'admin@lagi.shop', 'admin', '$2y$10$BZk5uLPGm4Oq.23TgSlB2.hRxPgfWS4LFT.fXaCr960OLAVbhW.J2', '0'),
(16, 'Trần Thẩm Khang', 'thamkhang2003@gmail.com', 'admin@gmail.com', '$2y$10$RFgx4Ok9Ltmee/jcLfhk/u7K1c1XiiP40zBLo54iuzxAWFifU1cjm', '1');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brandName`) VALUES
(1, 'Adidas'),
(2, 'Nike'),
(3, 'Gucci'),
(4, 'Zara'),
(5, 'H&M'),
(6, 'Louis Vuitton'),
(7, 'Chanel'),
(8, 'Puma'),
(9, 'Forever 21'),
(10, 'Calvin Klein'),
(32, 'Khang'),
(36, 'LAGI');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `productId`, `userId`, `quantity`) VALUES
(155, 112, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(1, 'Thời trang nam'),
(2, 'Thời trang nữ'),
(3, 'Quần jeans'),
(4, 'Giày sneakers'),
(5, 'Váy đầm'),
(6, 'Áo sơ mi'),
(7, 'Phụ kiện'),
(8, 'Túi xách'),
(9, 'Giày cao gót'),
(10, 'Đồng hồ'),
(11, 'Trang sức'),
(12, 'Đồ bơi');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `dateComment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderId` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `order_time` datetime NOT NULL,
  `recieve_time` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `recipientName` varchar(255) NOT NULL,
  `recipientPhone` int(11) NOT NULL,
  `recipientAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderId`, `thanhtien`, `userId`, `order_time`, `recieve_time`, `status`, `recipientName`, `recipientPhone`, `recipientAddress`) VALUES
(112, 418000, 17, '2023-05-09 19:23:07', '0000-00-00 00:00:00', 1, 'Trần Thẩm Khang', 2147483647, 'Thành phố Hà Nội, Quận Long Biên, Phường Thượng Thanh'),
(113, 2847900, 17, '2023-05-10 08:28:23', '0000-00-00 00:00:00', 1, 'Trần Thẩm Khang', 2147483647, 'Thành phố Hà Nội, Quận Long Biên, Phường Thượng Thanh');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `productName` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `orderId`, `productId`, `price`, `image`, `quantity`, `productName`) VALUES
(46, 112, 107, '200000', 'uploads/product_10.png', 2, 'Áo Lagi'),
(47, 113, 107, '200000', 'uploads/product_10.png', 1, 'Áo Lagi'),
(48, 113, 108, '2000000', 'uploads/product_3.png', 1, 'Áo Gucci'),
(49, 113, 110, '1000000', 'uploads/product_5.png', 1, 'Giày Lagi');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(100) NOT NULL,
  `productName` tinytext NOT NULL,
  `catId` int(110) NOT NULL,
  `brandId` int(110) NOT NULL,
  `product_desc` text NOT NULL,
  `price` bigint(255) NOT NULL,
  `price_discount` bigint(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hidden` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `catId`, `brandId`, `product_desc`, `price`, `price_discount`, `image`, `amount`, `created_at`, `hidden`) VALUES
(107, 'Áo Lagi', 1, 36, '', 200000, 190000, 'uploads/product_10.png', 0, '2023-05-10 05:42:59', 0),
(108, 'Áo Gucci', 2, 3, '', 2000000, 1400000, 'uploads/product_3.png', 100, '2023-05-10 05:42:46', 0),
(109, 'Áo Adidas', 6, 1, '', 300000, 200000, 'uploads/product_1.png', 0, '2023-05-10 05:41:17', 0),
(110, 'Giày Lagi', 1, 1, '', 1000000, 999000, 'uploads/product_5.png', 0, '2023-05-10 05:42:00', 0),
(111, 'Mắt Kính Gucci', 7, 3, '', 30000000, 2500000, 'uploads/product_6.png', 0, '2023-05-10 05:45:42', 0),
(112, 'Túi Chanel', 1, 7, '', 6000000, 5000000, 'uploads/product_4.png', 0, '2023-05-10 05:46:41', 0),
(113, 'Túi Zara', 8, 4, 'Túi sách thời thượng âu mĩ', 3000000, 2500000, 'uploads/product_2.png', 12, '2023-05-11 02:53:04', 0),
(115, 'Áo sơ mi', 6, 6, 'Áo sơ mi chất lượng cao làm từ tơ tự nhiên', 500000, 490000, 'uploads/product_9.png', 4, '2023-05-11 03:20:57', 0),
(116, 'Áo gió', 6, 36, 'Áo gió chống lạnh', 400000, 400000, 'uploads/How-to-Chill-Like-a-Cat-Funny-Hoodies-Sweatshirt-Women-Men-Hoodie-Sweatshirts-Black-Crewneck-Jumper.jpg', 12, '2023-05-11 03:56:31', 0),
(118, 'Giày cao gót', 9, 1, 'Giày cao gót siêu xinh', 700000, 690000, 'uploads/Black-Punk-Platform-Motorcycle-Boots-Women-Lace-Up-Chunky-Heel-Boots-Women-Belt-Buckle-Designer-Shoes.jpg', 0, '2023-05-11 03:22:53', 0),
(119, 'Áo jeans', 3, 1, '', 100000, 99000, 'uploads/product_1.png', 0, '2023-05-13 20:18:53', 0),
(120, 'Túi đi chợ', 1, 6, '', 5000000, 4900000, 'uploads/product_2.png', 0, '2023-05-13 20:19:32', 0),
(121, 'Áo dài tay', 1, 8, '', 400000, 290000, 'uploads/product_7.png', 0, '2023-05-13 20:20:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userPassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioiTinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ngaySinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diaChi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` int(11) DEFAULT 1,
  `active_token` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_token` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `name`, `username`, `userPassword`, `email`, `gioiTinh`, `sdt`, `ngaySinh`, `diaChi`, `isActive`, `active_token`, `reset_token`) VALUES
(7, 'Quan Văn Mạnh', 'manhne', '202cb962ac59075b964b07152d234b70', 'quanmanh901@gmail.com', 'Nam', '0899391826', '18-04-2002', '309/1/4 Lê Đức Thọ', 0, NULL, NULL),
(8, 'Quan Văn Mạnh', 'manh22', '202cb962ac59075b964b07152d234b70', 'manh2106@gmail.com', 'Nam', '981984623', '2002-21-06', 'Hồ Chí Minh', 0, NULL, NULL),
(10, 'Phùng Phạm Khánh Linh', 'khanhlinh', '202cb962ac59075b964b07152d234b70', 'nguyenthanhquynhlinh@gmail.com', 'Nam', '981984623', '2002-21-06', 'Hồ Chí Minh', 1, NULL, NULL),
(15, 'Trần Thẩm Khang', 'admin1@gmail.com', 'bfeeb95239d3756d37eca40f3ef85e2f', 'thamkhang2003@gmail.com', 'Nam', '2147483647', '2023-04-18', 'Tỉnh Cao Bằng, Huyện Bảo Lâm, Xã Nam Cao, khang', 1, NULL, 'a5da539e1345c402a9c6a6b5432799ae'),
(17, 'Trần Thẩm Khang', 'thamkhang', 'bfeeb95239d3756d37eca40f3ef85e2f', 'thamkhang2003@gmail.com', 'Nam', '0931142093', '2023-04-11', 'Ấp Trà Ngoa, Trà Côn, Trà Ôn, Vĩnh Long', 0, NULL, 'a5da539e1345c402a9c6a6b5432799ae'),
(18, 'Trần Thẩm Khang', 'admin', 'bfeeb95239d3756d37eca40f3ef85e2f', 'thamkhang2003@gmail.com', 'Nam', '2147483647', '2023-05-10', 'Tỉnh Cao Bằng, Huyện Bảo Lâm, Xã Nam Cao, xas', 0, NULL, 'a5da539e1345c402a9c6a6b5432799ae'),
(19, 'Trần Thẩm Khang', 'admin@gmail.com', 'bfeeb95239d3756d37eca40f3ef85e2f', 'thamkhang2003@gmail.com', 'Nam', '2147483647', '2023-05-01', 'Thành phố Hà Nội, Quận Ba Đình, Phường Phúc Xá, kh', 1, NULL, 'a5da539e1345c402a9c6a6b5432799ae'),
(108, 'Trần Hửu Hậu', 'hautran', '3d2172418ce305c7d16d4b05597c6a59', 'tranhuuhau2003@gmail.com', 'Nam', '0333333333', '2023-05-01', 'Nguyễn Trãi', 0, NULL, NULL),
(109, 'Trần Thẩm Khang', 'Trần Thẩm Khang', 'bfeeb95239d3756d37eca40f3ef85e2f', 'thamkhang122@gmail.com', 'Nam', '0931142093', '2023-05-01', 'Trà Côn, Trà Ôn, Vĩnh Long', 1, NULL, NULL),
(112, 'Võ Văn Nhân', 'nhanvo', 'd41d8cd98f00b204e9800998ecf8427e', 'thamkhangt@gmail.com', 'Nam', '0931142093', '2023-05-01', 'Tỉnh An Giang, Thành phố Châu Đốc, Phường Châu Phú', 0, NULL, '1bc3fec3524c3c900256af0fdeba4ace');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`),
  ADD UNIQUE KEY `uc_adminUser` (`adminUser`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `productId` (`productId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `brandId` (`brandId`),
  ADD KEY `catId` (`catId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `order` (`orderId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brandId`) REFERENCES `brand` (`brandId`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`catId`) REFERENCES `category` (`catId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
