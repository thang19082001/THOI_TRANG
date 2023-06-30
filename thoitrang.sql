-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 04:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thoitrangvip4`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `sdt` int(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `hoten`, `sdt`, `email`, `password`, `role`) VALUES
(67, 'Nguyễn Văn Thắng', 962373175, 'nguyenvanthang.19082001@gmail.com', '123456789', '1'),
(84, 'Nguyễn Văn Thắng', 962373175, 'thang480084@gmail.com', '1908', '1'),
(89, 'Nguyễn Văn Lơi', 123456789, 'Loi480084@gmail.com', '2601', ''),
(90, 'Nguyễn Văn A', 962373175, 'A@gmail.com', '1234', ''),
(91, 'nguyen aaaaa', 1111111111, 'aaaaa@gmail.com', '1234', ''),
(92, 'Nguyễn Văn Thắng', 962373175, 'B@gmail.com', '1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `account_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `total` varchar(100) NOT NULL,
  `created_time` datetime DEFAULT current_timestamp(),
  `last_update` datetime DEFAULT current_timestamp(),
  `list_san_pham` varchar(255) NOT NULL,
  `list_so_luong` varchar(255) NOT NULL,
  `trang_thai` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `account_id`, `name`, `phone`, `address`, `note`, `total`, `created_time`, `last_update`, `list_san_pham`, `list_so_luong`, `trang_thai`) VALUES
(230, 90, 'Nguyễn Văn A', '962373175', 'Bắc Ninh', 'Không có ghi chú', '2,100,000', '2023-06-24 01:05:59', '2023-06-24 01:05:59', '2-3', '3-3', 2),
(231, 92, 'Nguyễn Văn B', '962373175', 'Bắc Ninh', 'Không có ghi chú', '2,250,000', '2023-06-24 09:37:25', '2023-06-24 09:37:25', '1', '4', 0),
(232, 92, 'Nguyễn Văn Thắng', '962373175', 'BẮc Ninh', 'Khong có ghi chú', '2,550,000', '2023-06-24 13:43:58', '2023-06-24 13:43:58', '3', '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_s` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `n_content` text NOT NULL,
  `d_content` text NOT NULL,
  `created_time` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `image`, `image_s`, `title`, `n_content`, `d_content`, `created_time`, `last_update`) VALUES
(8, './img/upload_blog/imgblog2.jpg', './img/upload_blog2/imgblog4.jpg', 'Trang phục đi biển cho chàng mùa hè 2023', 'Để chống chọi hiệu quả với cái rét ẩm của miền Bắc, bạn nên diện những chiếc áo dày dặn bên trong như len vặn thừng để giữ ấm tuyệt đối cho cơ thể. Cũng nên chọn áo trong có gam màu tương phản với áo parka để trang phục thêm nổi bật hơn trong các mẫu dưới đây của H2T nhé.', 'Để chống chọi hiệu quả với cái rét ẩm của miền Bắc, bạn nên diện những chiếc áo dày dặn bên trong như len vặn thừng để giữ ấm tuyệt đối cho cơ thể. Cũng nên chọn áo trong có gam màu tương phản với áo parka để trang phục thêm nổi bật hơn trong các mẫu dưới đây của H2T nhé.I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-06-23', '2023-06-23'),
(9, './img/upload_blog/imageblog1.jpg', './img/upload_blog2/kaki.jpg', 'Gặp gỡ cựu người mẫu thiết kế phụ kiện cấp cao cấp tại Paris', 'Với nam giới thường không quan tâm tới số đo hay size áo chuẩn, thông thường họ theo quan điểm thử đồ nào vừa thì sẽ chọn size đấy. Tuy nhiên, để sở hữu những bộ trang phục chuẩn form thì những thông số sau đây sẽ giúp cánh mày râu có thể chọn được những chiếc áo vừa in và hơn nữa sẽ không bị lung túng khi mua hàng online.', 'Với nam giới thường không quan tâm tới số đo hay size áo chuẩn, thông thường họ theo quan điểm thử đồ nào vừa thì sẽ chọn size đấy. Tuy nhiên, để sở hữu những bộ trang phục chuẩn form thì những thông số sau đây sẽ giúp cánh mày râu có thể chọn được những chiếc áo vừa in và hơn nữa sẽ không bị lung túng khi mua hàng online.. I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-06-23', '2023-06-23'),
(10, './img/upload_blog/imgblog5.jpg', './img/upload_blog2/imgblog3.jpg', 'Nhịp đập thời trang trên con đường', 'La La Land đang là bộ phim tình cảm chiếm được cảm tình của khán giả lẫn giới phê bình quốc tế. Sức hút ở đứa con tinh thần của đạo diễn Damien Chazelle không chỉ đến từ cốt truyện, diễn xuất mà còn từ dấu ấn thời trang những năm 1960. Phụ trách trang phục cho tác phẩm điện ảnh là nhà thiết kế Mary Zophres -  người từng đảm nhận công việc này trong No Country for Old Men, Interstellar... ', 'Để tái hiện phong cách thập niên 1960, Zophres cho biết bà đã phải xem lại hàng loạt bộ phim nổi tiếng gồm The Bandwagon (1953), Singin \'in the Rain (1952), Romeo and Juliet của Baz Luhrmann (1996), Strictly Ballroom (1993), Boogie Nights (1997) và Catch Me If You Can (2002) để lấy cảm hứng. Ngay đoạn mở đầu, La La Land gây choáng ngợp với hình ảnh những thanh niên trong thành phố Los Angeles tranh thủ nhảy múa trên nóc ô tô lúc tắc đường. Êkíp sản xuất chia sẻ có 40 vũ công tham gia phân cảnh này. Tất cả đều mặc trang phục màu sắc sinh động như cam, xanh dương, đỏ, xanh lá... thể hiện hoài bão, ước mơ, khát vọng sống tự do, thoát khỏi mọi ràng buộc của tuổi trẻ. Đây cũng là tinh thần chủ đạo của thời trang thập niên 1960. Hai nhân vật chính là Sebastian (Ryan Gosling) và Mia (Emma Stone). Mia là diễn viên trên đường tìm kiếm vai diễn đầu đời, làm thêm tại quán cafe. Phong cách thời trang của cô được lấy cảm hứng từ những huyền thoại như Julie Christie, Ingrid Bergman, Grace Kelly, Katharine Hepburn. Trong một cảnh phim, Mia sau khi từ bỏ công việc pha chế cafe lang thang trên phố với chiếc quần kaki đen ống côn cùng sơ mi trắng. Mary Zophres cho biết chiếc quần của Mia được tạo nên từ kiểu quần của Audrey Hepburn trong Funny Face. ', '2023-06-23', '2023-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `product_id` int(100) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `mausac` varchar(50) NOT NULL,
  `kichco` varchar(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `price` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(50) NOT NULL,
  `blog_id` int(50) NOT NULL,
  `ten_cmt` varchar(500) NOT NULL,
  `emai_cmt` varchar(500) NOT NULL,
  `created_time` date NOT NULL,
  `last_update` date NOT NULL,
  `content_cmt` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `blog_id`, `ten_cmt`, `emai_cmt`, `created_time`, `last_update`, `content_cmt`) VALUES
(20, 2, 'Nguyễn Văn Thắng', 'nguyenvanthang.19082001@gmail.com', '2023-06-10', '2023-06-10', 'Tôi cảm thấy bài viết nhất có ích và hiệu quả'),
(21, 5, 'd', 'nguyenvanthang.19082001@gmail.com', '2023-06-10', '2023-06-10', 's'),
(22, 6, 'Nguyễn Văn Thắng', 'nguyenvanthang.19082001@gmail.com', '2023-06-10', '2023-06-10', 's'),
(23, 7, 'vdfvd', 'nguyenvanthang.19082001@gmail.com', '2023-06-23', '2023-06-23', 'scsc');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `note` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `note`) VALUES
(2, 'dfbdfbfb', 'sdvsdv@gmail.com', 'hgfdgfdvfbv'),
(3, 'gnfgfgn', 'sdvsdv@gmail.com', 'hkhgfhdhgmndbdfdbdfbdfb'),
(4, 'gnfgfgntttttttttt', 'sdvsdv@gmail.com', 'hkhgfhdhgmndbdfdbdfbdfb'),
(5, 'Họ và têncsdcsd', 'sdvsdv@gmail.com', 'sssssssssssssssssssssssssss');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(20) NOT NULL,
  `product_id` int(30) NOT NULL,
  `path` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `path`) VALUES
(228, 55, './img/upload/shirt3.jpg'),
(229, 55, './img/upload/shirt4.jpg'),
(230, 55, './img/upload/shirt5.jpg'),
(231, 55, './img/upload/shirt6.jpg'),
(232, 55, './img/upload/shirt7.jpg'),
(233, 106, './img/upload/shirt3.jpg'),
(234, 106, './img/upload/shirt4.jpg'),
(235, 106, './img/upload/shirt5.jpg'),
(236, 106, './img/upload/shirt6.jpg'),
(237, 106, './img/upload/shirt7.jpg'),
(238, 40, './img/upload/owen2.jpg'),
(239, 40, './img/upload/owen3.jpg'),
(240, 40, './img/upload/tik1.jpg'),
(241, 40, './img/upload/tik3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `sdt` int(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mgg`
--

CREATE TABLE `mgg` (
  `id` int(50) NOT NULL,
  `ma_GG` varchar(10) NOT NULL,
  `tien_GG` float NOT NULL DEFAULT 0,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mgg`
--

INSERT INTO `mgg` (`id`, `ma_GG`, `tien_GG`, `start_date`, `end_date`) VALUES
(27, 'MGG50', 50000, '2023-06-23', '2023-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `anh` varchar(1000) NOT NULL,
  `tensp` text NOT NULL,
  `gia` int(222) NOT NULL,
  `theloai` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `mota` text NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `soluong` int(50) NOT NULL,
  `giagoc` int(100) NOT NULL,
  `da_ban_duoc` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `anh`, `tensp`, `gia`, `theloai`, `status`, `mota`, `created_time`, `last_update`, `soluong`, `giagoc`, `da_ban_duoc`) VALUES
(1, './img/upload/owen-so-mi.jpg', 'Áo Sơ Mi Owen', 550000, 'Áo', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', NULL, NULL, 67, 0, 93),
(2, './img/upload/shirt.jpg', 'Áo thun nam dài tay Julido', 200000, 'Áo', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', NULL, '2023-06-23 23:54:28', 869, 0, 907),
(3, './img/upload/shirt9.jpg', 'Áo Uniqlo Nam polo', 500000, 'Áo', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', NULL, NULL, 492, 0, 19),
(4, './img/upload/shirt15.jpg', 'NAM Áo polo DRY', 500000, 'Áo', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', NULL, NULL, 600, 0, 34),
(7, './img/upload/owen-somi2.jpg', 'Áo Sơ Mi Owen', 500000, 'Áo', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', NULL, NULL, 666, 0, 44),
(8, './img/upload/shirt18.jpg', 'Paris Saint-Germain Logo', 100000, 'Áo', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', NULL, NULL, 555, 0, 66),
(9, './img/upload/shirt4.jpg', 'Áo Thun Nam Thể Thao', 500000, 'Áo', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', NULL, NULL, 555, 0, 7),
(10, './img/upload/shirt5.jpg', 'Blentino Áo Thun Nam Polo', 150000, 'Áo', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', NULL, NULL, 666, 0, 0),
(11, './img/upload/shirt6.jpg', 'Áo Len Collective co', 350000, 'Áo', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', NULL, NULL, 333, 0, 6),
(12, './img/upload/shirt7.jpg', 'Áo Jeans MIIX Collective co', 350000, 'Áo', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', NULL, NULL, 500, 0, 22),
(13, './img/upload/owen1.jpg', 'Quần Khaki', 400000, 'Quần', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', NULL, NULL, 555, 0, 0),
(14, './img/upload/owen2.jpg', 'Quần Short', 485000, 'Quần', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', NULL, NULL, 333, 0, 2),
(15, './img/upload/owen3.jpg', 'Quần Tây', 575000, 'Quần', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', NULL, NULL, 444, 0, 0),
(16, './img/upload/uni1.jpg', 'NAM Uniqlo U Quần Dài', 599000, 'Quần', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', NULL, NULL, 555, 0, 0),
(17, './img/upload/uni2.jpg', 'NAM Quần Jersey Dáng Relax', 249000, 'Quần', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', NULL, NULL, 90, 0, 9),
(18, './img/upload/uni3.jpg', 'NAM Quần Cotton Dáng Relax', 500000, 'Quần', '', '', NULL, NULL, 0, 0, 0),
(19, './img/upload/nike1.jpg', 'Jordan Dri-FIT Air', 100000, 'Quần', '', '', NULL, NULL, 0, 0, 0),
(20, './img/upload/nike2.jpg', 'Nike Sportswear Windrunner', 100000, 'Quần', '', '', NULL, NULL, 6, 0, 1),
(21, './img/upload/nike3.jpg', 'Paris Saint-Germain Strike', 200000, 'Quần', '', '', NULL, NULL, 0, 0, 0),
(22, './img/upload/tik1.jpg', 'Quần jogger MIKENCO', 700000, 'Quần', '', '', NULL, NULL, 0, 0, 0),
(23, './img/upload/1k2.jpg', 'MLB - Quần jogger Change Up', 100000, 'Quần', '', '', NULL, NULL, 0, 0, 0),
(24, './img/upload/tik3.jpg', 'Quần dài nam thể thao', 200000, 'Quần', '', '', NULL, NULL, 0, 0, 0),
(40, './img/upload/tik1.jpg', 'Nike Air Zoom Pegasus 36', 200000, 'Quần', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', NULL, '2023-06-24 00:40:27', 0, 0, 0),
(41, './img/upload/shoes14.jpg', 'Giày Sneaker Nam ALDO COWIEN', 100000, 'Giày', '', '', NULL, NULL, 0, 0, 2),
(42, './img/upload/shoes8.jpg', 'Giày Sneaker Nam ALDO COWIEN', 100000, 'Giày', '', '', NULL, NULL, 881, 0, 895),
(43, './img/upload/shoes2.jpg', 'Giày Thể Thao Nam', 500000, 'Giày', '', '', NULL, NULL, 0, 0, 0),
(44, './img/upload/shoes1.jpg', 'Giày Nam Cổ Cao', 600000, 'Giày', '', '', NULL, NULL, 0, 0, 0),
(45, './img/upload/adi1.jpg', 'RUNFALCON 2.0', 100000, 'Giày', '', '', NULL, NULL, 0, 0, 0),
(46, './img/upload/shoes9.jpg', 'Giày Sneaker Nam', 500000, 'Giày', '', '', NULL, NULL, 0, 0, 0),
(47, './img/upload/adi2.jpg', 'Bitis Hunter X Festive Aurora Black', 999000, 'Giày', '', '', NULL, NULL, 77, 0, 0),
(48, './img/upload/adi3.jpg', 'Giày Thể Thao Nam Bitis', 600000, 'Giày', '', '', NULL, NULL, 0, 0, 0),
(49, './img/upload/biti2.jpg', 'Bitis Hunter Core Festive Breezer Black', 799000, 'Giày', '', '', NULL, NULL, 0, 0, 0),
(50, './img/upload/bitit1.jpg', 'Bitis Hunter Core Festive Snowflake Blue', 799000, 'Giày', '', '', NULL, NULL, 0, 0, 0),
(51, './img/upload/biti3.jpg', 'Bitis Hunter Street x VietMax', 100000, 'Giày', '', '', NULL, NULL, 0, 0, 0),
(54, './img/upload/nike_tuideo.jpg', 'Nike Heritage', 700000, 'Phụ Kiện', '', '', NULL, NULL, 0, 0, 0),
(55, './img/upload/shirt16.jpg', 'Nike Heritage 2.0', 800000, 'Áo', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', NULL, '2023-06-24 00:38:48', 0, 0, 0),
(56, './img/upload/nike_balo2.jpg', 'Nike Heritage', 400000, 'Phụ Kiện', '', '', NULL, NULL, 0, 0, 0),
(57, './img/upload/nike4.png', 'Nike Sportswear', 500000, 'Phụ Kiện', '', '', NULL, NULL, 0, 0, 0),
(58, './img/upload/tat1.jpg', 'TẤT THẤP CỔ CÓ ĐỆM', 60000, 'Phụ Kiện', '', '', NULL, NULL, 0, 0, 0),
(59, './img/upload/tat2.jpg', '3 ĐÔI TẤT TREFOIL LINER', 300000, 'Phụ Kiện', '', '', NULL, NULL, 0, 0, 0),
(60, './img/upload/day1.jpg', 'Dây Đeo Thẻ', 100000, 'Phụ Kiện', '', '', NULL, NULL, 0, 0, 0),
(61, './img/upload/tl1.jpg', 'Thắt Lưng Nam', 250000, 'Phụ Kiện', '', '', NULL, NULL, 0, 0, 0),
(62, './img/upload/tl2.jpg', 'Thắt Lưng Nam NutuShop', 300000, 'Phụ Kiện', '', '', NULL, NULL, 0, 0, 0),
(63, './img/upload/t3.jpg', 'Milina 16 Sock', 100000, 'Phụ Kiện', '', '', NULL, NULL, 0, 0, 0),
(105, './img/upload/shirt4.jpg', 'Biti Hunter X Festive Aurora Black', 200000, 'Áo', '', 'áo mới', '2023-05-28 16:10:37', '2023-05-28 16:10:37', 0, 0, 0),
(106, './img/upload/short8.jpg', 'tttttttttttttt', 122000, 'Áo', '', 'Một lựa chọn khá chill và ấm áp đến từ áo thun nỉ dày dặn S.W.D Higher Quality Garment. Chất liệu vải nỉ da cá mềm mịn, đặc biệt không lo bai rão hay xù lông. Logo thuê nổi tinh tế.', '2023-05-28 16:16:33', '2023-06-24 00:39:34', 0, 0, 0),
(107, './img/upload/adi1.jpg', 'sdfsdf', 200000, 'Giày', '', 'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', '2023-06-04 08:06:08', '2023-06-04 14:00:03', 24, 3500, 0),
(108, './img/upload/shoes14.jpg', 'Giày Sneaker Nam ALDO COWIEN', 100000, 'Giày', '', '', NULL, NULL, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acc_account_id` (`account_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ka_product_id` (`product_id`),
  ADD KEY `ac_account_id` (`account_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kf_product_id` (`product_id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mgg`
--
ALTER TABLE `mgg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mgg`
--
ALTER TABLE `mgg`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `acc_account_id` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `ac_account_id` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ka_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `kf_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
