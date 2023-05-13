-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 06, 2023 lúc 12:54 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tripboss`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `blogId` int(15) NOT NULL,
  `blogName` varchar(50) NOT NULL,
  `pubDate` datetime NOT NULL,
  `blogImage` varchar(500) NOT NULL,
  `blogsDesc` varchar(200) NOT NULL,
  `blogAuthor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`blogId`, `blogName`, `pubDate`, `blogImage`, `blogsDesc`, `blogAuthor`) VALUES
(31, 'travel ', '0000-00-00 00:00:00', '566397blog-4.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio voluptatem nulla harum accusantium tempora dicta quas quod id, repellat temporibus illo libero explicabo laboriosam.', 'john doe'),
(32, 'Tour', '0000-00-00 00:00:00', '182852blog-7.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio voluptatem nulla harum accusantium tempora dicta quas quod id, repellat temporibus illo libero explicabo laboriosam.', 'john doe'),
(33, 'Trip', '0000-00-00 00:00:00', '696453blog-6.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio voluptatem nulla harum accusantium tempora dicta quas quod id, repellat temporibus illo libero explicabo laboriosam.', 'john');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `bookingId` int(15) NOT NULL,
  `userId` int(15) NOT NULL,
  `whereTo` varchar(100) NOT NULL,
  `numberOfGuests` int(20) NOT NULL,
  `arrivalsDate` datetime NOT NULL,
  `leavingDate` datetime NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `booking`
--

INSERT INTO `booking` (`bookingId`, `userId`, `whereTo`, `numberOfGuests`, `arrivalsDate`, `leavingDate`, `totalPrice`) VALUES
(1, 4, 'Ha Noi', 2, '2023-03-16 12:42:14', '2023-03-19 18:42:14', 3000),
(2, 6, 'Phu Quoc', 2, '2023-02-01 14:26:43', '2023-02-04 14:26:43', 5000000),
(3, 6, 'Kien Giang', 2, '2023-02-01 14:26:43', '2023-02-04 14:26:43', 5000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookingdetails`
--

CREATE TABLE `bookingdetails` (
  `bookingDetailsId` int(15) NOT NULL,
  `tripId` int(15) NOT NULL,
  `bookingId` int(15) NOT NULL,
  `detailsPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `contactId` int(15) NOT NULL,
  `contactDesc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tripcategories`
--

CREATE TABLE `tripcategories` (
  `cateId` int(15) NOT NULL,
  `cateName` varchar(50) NOT NULL,
  `cateDesc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tripcategories`
--

INSERT INTO `tripcategories` (`cateId`, `cateName`, `cateDesc`) VALUES
(1, 'Day trips', 'travel'),
(34, 'travel', 'tour'),
(35, 'Trip one day', 'travel'),
(37, 'trippppp', 'trippp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trips`
--

CREATE TABLE `trips` (
  `tripId` int(15) NOT NULL,
  `tripsName` varchar(50) NOT NULL,
  `place` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `tripsImage` varchar(500) NOT NULL,
  `tripDesc` varchar(200) NOT NULL,
  `cateId` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trips`
--

INSERT INTO `trips` (`tripId`, `tripsName`, `place`, `price`, `tripsImage`, `tripDesc`, `cateId`) VALUES
(2, 'Ha Noi', 'Ha Noi, Vietnam', 20, '886528blog-1.jpg', 'travel', 1),
(26, 'trip one day', 'Phu Quoc', 4000000, '346163blog-4.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio voluptatem nulla harum accusantium tempora dicta quas quod id, repellat temporibus illo libero explicabo laboriosam.', NULL),
(27, 'Trip two day', 'Vung Tau', 4000000, '691467blog-4.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio voluptatem nulla harum accusantium tempora dicta quas quod id, repellat temporibus illo libero explicabo laboriosam.', NULL),
(28, 'trip in day', 'An Giang', 45600000, '370281blog-6.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio voluptatem nulla harum accusantium tempora dicta quas quod id, repellat temporibus illo libero explicabo laboriosam.', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `usersId` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullName` varchar(100) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `DOB` datetime DEFAULT NULL,
  `usersDesc` varchar(200) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`usersId`, `email`, `password`, `fullName`, `phone`, `DOB`, `usersDesc`, `address`, `status`) VALUES
(3, 'admin123@gmail.com', 'admin123', NULL, NULL, '2023-03-15 17:26:05', NULL, NULL, 1),
(4, 'user123@gmail.com', 'user123', 'Nguyen van B', 12345689, '2023-03-15 17:27:12', 'I\'m teacher', 'Can Tho', 0),
(6, 'nguyennhuttruong123@gmail.com', 'truong123', 'Nguyen Nhut Truong', 36421685, '2003-10-03 14:05:52', 'I\'m student', 'Can Tho', 0),
(7, 'anhthu123@gmail.com', 'thu123', 'Nguyen Anh Thu', 234565452, '2003-04-16 14:10:50', 'I\'m student', 'Vinh Long', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blogId`);

--
-- Chỉ mục cho bảng `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingId`),
  ADD KEY `userId` (`userId`);

--
-- Chỉ mục cho bảng `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD PRIMARY KEY (`bookingDetailsId`),
  ADD KEY `bookingId` (`bookingId`),
  ADD KEY `tripId` (`tripId`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contactId`);

--
-- Chỉ mục cho bảng `tripcategories`
--
ALTER TABLE `tripcategories`
  ADD PRIMARY KEY (`cateId`);

--
-- Chỉ mục cho bảng `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`tripId`),
  ADD KEY `cateId` (`cateId`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blogId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `bookingdetails`
--
ALTER TABLE `bookingdetails`
  MODIFY `bookingDetailsId` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contactId` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tripcategories`
--
ALTER TABLE `tripcategories`
  MODIFY `cateId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `trips`
--
ALTER TABLE `trips`
  MODIFY `tripId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`usersId`);

--
-- Các ràng buộc cho bảng `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD CONSTRAINT `bookingdetails_ibfk_1` FOREIGN KEY (`bookingId`) REFERENCES `booking` (`bookingId`),
  ADD CONSTRAINT `bookingdetails_ibfk_2` FOREIGN KEY (`tripId`) REFERENCES `trips` (`tripId`);

--
-- Các ràng buộc cho bảng `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_2` FOREIGN KEY (`cateId`) REFERENCES `tripcategories` (`cateId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
