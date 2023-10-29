-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 21, 2023 lúc 01:07 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ShirtStoreDB`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `title`, `description`, `img`, `slug`) VALUES
(13, 'T-Shirt', 'T-Shirt', '/product1.jpeg', 't-shirt'),
(14, 'Hoodie', 'Hoodie', '/product.jpeg', 'hoodie'),
(15, 'Graphic Tee', 'Graphic Tee', '/783d511df98249b0703a672bb064296a.jpeg', 'graphic-tee'),
(17, 'Demo Category', 'Demo', '/admin126e2b21d637928375da9d2bd3f76dc5.jpeg', 'demo-category'),
(171, '123', '12322s', '/categoryDefault.png', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(55) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `comment` text NOT NULL,
  `type` text NOT NULL,
  `id_product` int(55) DEFAULT NULL,
  `date_comment` date NOT NULL,
  `id_news` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id_comment`, `id_customer`, `comment`, `type`, `id_product`, `date_comment`, `id_news`) VALUES
(19, 11, 'Good\r\n', 'product', 12, '2023-10-07', NULL),
(25, 11, 'ok', 'product', 22, '2023-10-07', NULL),
(26, 0, 'ok\r\n', 'product', 18, '2023-10-07', NULL),
(27, 0, 'ok\r\n', 'product', 18, '2023-10-07', NULL),
(28, 0, '123', 'product', 12, '2023-10-07', NULL),
(30, 0, '123', 'product', 12, '2023-10-07', NULL),
(31, 11, '123', 'product', 12, '2023-10-07', NULL),
(32, 11, '123', 'product', 12, '2023-10-12', NULL),
(34, 11, 'test', 'product', 12, '2023-10-12', NULL),
(35, 11, 'test', 'product', 12, '2023-10-12', NULL),
(36, 11, 'test', 'product', 12, '2023-10-12', NULL),
(43, 70, 'Chất lượng sản phẩm tốt.', 'product', 66, '2023-10-06', NULL),
(46, 63, 'Chất lượng sản phẩm tốt.', 'product', 21, '2023-10-11', NULL),
(58, 62, 'Chất lượng sản phẩm tốt.', 'product', 79, '2023-09-23', NULL),
(94, 66, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích.', 'product', 70, '2023-10-02', NULL),
(110, 70, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 43, '2023-10-15', NULL),
(136, 62, 'Rất ấn tượng với sản phẩm.', 'product', 21, '2023-10-10', NULL),
(143, 11, 'Lần đầu tiên mua hàng online nên là hơi lo lo, cứ sợ bị lừa. Nhưng đỡ cái là shop này hỗ trợ cho mình rất tận tình luôn nên cũng yên tâm được phần nào.', 'product', 21, '2023-10-04', NULL),
(148, 63, 'Sản phẩm không tệ!', 'product', 72, '2023-09-25', NULL),
(149, 65, 'Sản phẩm không tệ!', 'product', 75, '2023-10-18', NULL),
(150, 63, 'Sản phẩm không tệ!', 'product', 68, '2023-09-22', NULL),
(151, 62, 'Sản phẩm không tệ!', 'product', 98, '2023-09-24', NULL),
(152, 11, 'Sản phẩm không tệ!', 'product', 94, '2023-09-21', NULL),
(153, 0, 'Sản phẩm không tệ!', 'product', 81, '2023-09-25', NULL),
(154, 70, 'Sản phẩm không tệ!', 'product', 101, '2023-10-09', NULL),
(155, 11, 'Sản phẩm không tệ!', 'product', 76, '2023-09-26', NULL),
(156, 65, 'Sản phẩm không tệ!', 'product', 82, '2023-10-17', NULL),
(157, 69, 'Sản phẩm không tệ!', 'product', 97, '2023-10-10', NULL),
(158, 64, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài.', 'product', 65, '2023-10-17', NULL),
(163, 69, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 24, '2023-10-10', NULL),
(164, 11, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 100, '2023-09-26', NULL),
(165, 66, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 22, '2023-10-04', NULL),
(166, 67, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 66, '2023-10-07', NULL),
(167, 0, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 76, '2023-10-05', NULL),
(168, 11, 'Lần đầu tiên mua hàng online nên là hơi lo lo, cứ sợ bị lừa. Nhưng đỡ cái là shop này hỗ trợ cho mình rất tận tình luôn nên cũng yên tâm được phần nào!', 'product', 22, '2023-10-06', NULL),
(169, 69, 'Lần đầu tiên mua hàng online nên là hơi lo lo, cứ sợ bị lừa. Nhưng đỡ cái là shop này hỗ trợ cho mình rất tận tình luôn nên cũng yên tâm được phần nào!', 'product', 94, '2023-10-01', NULL),
(170, 65, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 78, '2023-10-05', NULL),
(171, 63, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 102, '2023-09-21', NULL),
(172, 68, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 20, '2023-10-02', NULL),
(173, 0, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 70, '2023-10-01', NULL),
(178, 68, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 69, '2023-10-18', NULL),
(179, 0, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 68, '2023-10-17', NULL),
(180, 63, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 12, '2023-10-17', NULL),
(181, 67, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 74, '2023-09-30', NULL),
(182, 69, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 9, '2023-09-22', NULL),
(183, 69, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 24, '2023-10-14', NULL),
(184, 0, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 100, '2023-09-21', NULL),
(185, 69, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 24, '2023-10-11', NULL),
(186, 66, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 12, '2023-10-15', NULL),
(187, 64, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 78, '2023-10-12', NULL),
(188, 66, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 20, '2023-09-25', NULL),
(193, 70, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 69, '2023-09-21', NULL),
(194, 63, 'Lần đầu tiên mua hàng online nên là hơi lo lo, cứ sợ bị lừa. Nhưng đỡ cái là shop này hỗ trợ cho mình rất tận tình luôn nên cũng yên tâm được phần nào!', 'product', 80, '2023-10-15', NULL),
(195, 69, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 22, '2023-10-09', NULL),
(196, 64, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 80, '2023-09-23', NULL),
(197, 65, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 99, '2023-10-02', NULL),
(198, 65, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 21, '2023-10-13', NULL),
(199, 70, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 99, '2023-10-11', NULL),
(200, 62, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 43, '2023-09-21', NULL),
(201, 66, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 103, '2023-10-20', NULL),
(202, 66, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 18, '2023-10-20', NULL),
(203, 62, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 99, '2023-10-20', NULL),
(208, 64, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 9, '2023-10-14', NULL),
(209, 69, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 96, '2023-09-29', NULL),
(210, 67, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 43, '2023-10-06', NULL),
(211, 69, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 81, '2023-10-19', NULL),
(212, 69, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 43, '2023-10-12', NULL),
(213, 0, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 12, '2023-09-23', NULL),
(214, 69, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 24, '2023-10-18', NULL),
(215, 67, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 43, '2023-09-25', NULL),
(216, 67, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 73, '2023-09-27', NULL),
(217, 65, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 64, '2023-10-02', NULL),
(218, 11, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 78, '2023-10-20', NULL),
(223, 68, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 72, '2023-09-24', NULL),
(224, 66, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 12, '2023-09-27', NULL),
(225, 64, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 43, '2023-09-22', NULL),
(226, 66, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 97, '2023-10-15', NULL),
(227, 68, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 69, '2023-10-10', NULL),
(228, 70, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 75, '2023-10-13', NULL),
(229, 0, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 74, '2023-09-30', NULL),
(230, 11, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 79, '2023-10-16', NULL),
(231, 68, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 79, '2023-09-21', NULL),
(232, 69, 'Lần đầu tiên mua hàng online nên là hơi lo lo, cứ sợ bị lừa. Nhưng đỡ cái là shop này hỗ trợ cho mình rất tận tình luôn nên cũng yên tâm được phần nào!', 'product', 68, '2023-09-26', NULL),
(233, 70, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 96, '2023-10-13', NULL),
(238, 65, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 18, '2023-09-27', NULL),
(239, 0, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 21, '2023-10-01', NULL),
(240, 68, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 70, '2023-10-18', NULL),
(241, 64, 'Lần đầu tiên mua hàng online nên là hơi lo lo, cứ sợ bị lừa. Nhưng đỡ cái là shop này hỗ trợ cho mình rất tận tình luôn nên cũng yên tâm được phần nào!', 'product', 76, '2023-10-09', NULL),
(242, 67, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 102, '2023-10-06', NULL),
(243, 63, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 73, '2023-10-17', NULL),
(244, 0, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 43, '2023-09-30', NULL),
(245, 70, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 83, '2023-10-18', NULL),
(246, 66, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 77, '2023-09-30', NULL),
(247, 68, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 70, '2023-10-07', NULL),
(248, 66, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 21, '2023-10-03', NULL),
(253, 11, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 64, '2023-09-28', NULL),
(254, 62, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 70, '2023-10-17', NULL),
(255, 11, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 78, '2023-10-11', NULL),
(256, 68, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 64, '2023-10-07', NULL),
(257, 11, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 96, '2023-10-02', NULL),
(258, 65, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 22, '2023-10-18', NULL),
(259, 63, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 78, '2023-10-06', NULL),
(260, 70, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 76, '2023-10-04', NULL),
(261, 68, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 100, '2023-10-11', NULL),
(262, 64, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 81, '2023-10-17', NULL),
(263, 65, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 99, '2023-10-15', NULL),
(268, 65, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 103, '2023-09-29', NULL),
(269, 68, 'Lần đầu tiên mua hàng online nên là hơi lo lo, cứ sợ bị lừa. Nhưng đỡ cái là shop này hỗ trợ cho mình rất tận tình luôn nên cũng yên tâm được phần nào!', 'product', 101, '2023-10-09', NULL),
(270, 66, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 70, '2023-10-04', NULL),
(271, 65, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 73, '2023-09-30', NULL),
(272, 64, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 99, '2023-10-20', NULL),
(273, 64, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 74, '2023-09-23', NULL),
(274, 11, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 73, '2023-10-19', NULL),
(275, 68, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 9, '2023-10-18', NULL),
(276, 67, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 23, '2023-10-01', NULL),
(277, 69, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 12, '2023-09-28', NULL),
(278, 68, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 101, '2023-10-16', NULL),
(283, 66, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 64, '2023-10-17', NULL),
(284, 0, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 103, '2023-10-17', NULL),
(285, 65, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 20, '2023-10-11', NULL),
(286, 0, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 80, '2023-10-18', NULL),
(287, 11, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 78, '2023-10-16', NULL),
(288, 66, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 80, '2023-10-10', NULL),
(289, 63, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 65, '2023-10-10', NULL),
(290, 65, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 77, '2023-10-13', NULL),
(291, 64, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 82, '2023-10-17', NULL),
(292, 69, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 18, '2023-09-25', NULL),
(293, 68, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 94, '2023-09-25', NULL),
(298, 70, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 24, '2023-10-10', NULL),
(299, 64, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 83, '2023-09-25', NULL),
(300, 66, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 66, '2023-09-25', NULL),
(301, 67, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 71, '2023-09-25', NULL),
(302, 65, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 97, '2023-09-23', NULL),
(303, 67, 'Lần đầu tiên mua hàng online nên là hơi lo lo, cứ sợ bị lừa. Nhưng đỡ cái là shop này hỗ trợ cho mình rất tận tình luôn nên cũng yên tâm được phần nào!', 'product', 64, '2023-10-17', NULL),
(304, 11, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 95, '2023-10-20', NULL),
(305, 0, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 78, '2023-10-07', NULL),
(306, 0, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 94, '2023-10-16', NULL),
(307, 66, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 101, '2023-10-11', NULL),
(308, 66, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 64, '2023-09-26', NULL),
(313, 66, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 43, '2023-10-12', NULL),
(314, 0, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 24, '2023-10-15', NULL),
(315, 63, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 73, '2023-10-01', NULL),
(316, 65, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 9, '2023-09-22', NULL),
(317, 70, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 12, '2023-10-08', NULL),
(318, 64, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 78, '2023-10-03', NULL),
(319, 64, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 24, '2023-10-10', NULL),
(320, 68, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 68, '2023-10-14', NULL),
(321, 63, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 70, '2023-09-21', NULL),
(322, 64, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 24, '2023-10-06', NULL),
(323, 64, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 24, '2023-10-09', NULL),
(328, 66, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 74, '2023-09-22', NULL),
(329, 64, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 98, '2023-09-29', NULL),
(330, 67, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 71, '2023-09-23', NULL),
(331, 70, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 100, '2023-10-03', NULL),
(332, 64, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 78, '2023-09-27', NULL),
(333, 70, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 22, '2023-10-13', NULL),
(334, 69, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 64, '2023-10-15', NULL),
(335, 63, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 101, '2023-09-27', NULL),
(336, 68, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 100, '2023-10-10', NULL),
(337, 65, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 64, '2023-10-16', NULL),
(338, 63, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 9, '2023-09-22', NULL),
(343, 62, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 101, '2023-09-22', NULL),
(344, 64, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 76, '2023-09-27', NULL),
(345, 68, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 71, '2023-09-26', NULL),
(346, 65, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 81, '2023-09-24', NULL),
(347, 11, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 75, '2023-09-23', NULL),
(348, 67, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 75, '2023-09-24', NULL),
(349, 66, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 100, '2023-09-25', NULL),
(350, 0, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 21, '2023-10-20', NULL),
(351, 0, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 101, '2023-10-05', NULL),
(352, 67, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 77, '2023-10-09', NULL),
(353, 65, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 24, '2023-10-17', NULL),
(358, 66, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 18, '2023-10-03', NULL),
(359, 68, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 12, '2023-10-11', NULL),
(360, 62, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 74, '2023-10-03', NULL),
(361, 66, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 98, '2023-09-21', NULL),
(362, 0, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 82, '2023-10-17', NULL),
(363, 64, 'Lần đầu tiên mua hàng online nên là hơi lo lo, cứ sợ bị lừa. Nhưng đỡ cái là shop này hỗ trợ cho mình rất tận tình luôn nên cũng yên tâm được phần nào!', 'product', 81, '2023-10-11', NULL),
(364, 68, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 43, '2023-10-06', NULL),
(365, 69, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 83, '2023-10-10', NULL),
(366, 63, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 9, '2023-10-07', NULL),
(367, 0, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 69, '2023-10-06', NULL),
(368, 65, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 81, '2023-10-01', NULL),
(373, 69, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 81, '2023-09-24', NULL),
(374, 65, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 65, '2023-10-03', NULL),
(375, 65, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 72, '2023-10-10', NULL),
(376, 67, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 20, '2023-10-02', NULL),
(377, 66, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 71, '2023-10-02', NULL),
(378, 66, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 78, '2023-09-21', NULL),
(379, 67, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 74, '2023-09-26', NULL),
(380, 66, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 97, '2023-09-27', NULL),
(381, 67, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 69, '2023-10-17', NULL),
(382, 0, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 76, '2023-10-08', NULL),
(383, 69, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 64, '2023-10-17', NULL),
(388, 66, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 79, '2023-10-11', NULL),
(389, 69, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 18, '2023-10-15', NULL),
(390, 68, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 94, '2023-09-22', NULL),
(391, 65, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 98, '2023-10-01', NULL),
(392, 62, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 96, '2023-10-04', NULL),
(393, 69, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 73, '2023-09-24', NULL),
(394, 70, 'Lần đầu tiên mua hàng online nên là hơi lo lo, cứ sợ bị lừa. Nhưng đỡ cái là shop này hỗ trợ cho mình rất tận tình luôn nên cũng yên tâm được phần nào!', 'product', 81, '2023-10-09', NULL),
(395, 65, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 101, '2023-09-28', NULL),
(396, 62, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 101, '2023-10-09', NULL),
(397, 62, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 94, '2023-09-24', NULL),
(398, 69, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 64, '2023-10-05', NULL),
(403, 64, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 98, '2023-10-03', NULL),
(404, 64, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 73, '2023-10-01', NULL),
(405, 62, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 66, '2023-10-18', NULL),
(406, 65, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 102, '2023-10-12', NULL),
(407, 70, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 24, '2023-10-09', NULL),
(408, 0, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 65, '2023-10-15', NULL),
(409, 70, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 94, '2023-10-10', NULL),
(410, 67, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 65, '2023-10-20', NULL),
(411, 62, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 100, '2023-09-27', NULL),
(412, 62, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 100, '2023-09-25', NULL),
(413, 64, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 97, '2023-09-23', NULL),
(418, 64, 'Lần đầu tiên mua hàng online nên là hơi lo lo, cứ sợ bị lừa. Nhưng đỡ cái là shop này hỗ trợ cho mình rất tận tình luôn nên cũng yên tâm được phần nào!', 'product', 67, '2023-10-14', NULL),
(419, 67, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 76, '2023-09-24', NULL),
(420, 64, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 64, '2023-10-16', NULL),
(421, 70, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 79, '2023-09-28', NULL),
(422, 69, 'Áo đẹp và chất lượng lắm bà con ơi! Mình sẽ ủng hộ shop này dài dài!', 'product', 96, '2023-09-28', NULL),
(423, 67, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 66, '2023-10-16', NULL),
(424, 64, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 102, '2023-09-25', NULL),
(425, 66, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 94, '2023-10-16', NULL),
(426, 63, 'Sản phẩm trên cả tuyệt vời luôn ạ, mình mua đến nay đã là 10 sản phẩm ở shop này để cho họ hàng mình dùng rồi nó vô cùng bền lắm luôn.', 'product', 43, '2023-09-28', NULL),
(427, 62, 'Mua trúng đợt shop ưu đãi giảm giá, vải chất lượng đã vậy còn được giảm giá nữa chứ, thích quá thích!', 'product', 102, '2023-10-16', NULL),
(428, 64, 'Vừa mới mua 2 cái áo cho cha con nhà mình, áo vừa vặn và form đẹp lắm mọi người ạ.', 'product', 43, '2023-10-19', NULL),
(442, 11, '123213', 'product', 64, '2023-10-21', NULL),
(443, 11, '123123', 'news', NULL, '2023-10-21', 47),
(444, 11, 'Bài viết hay', 'news', NULL, '2023-10-21', 47),
(445, 68, 'Hãy gọi em là mặt trời\r\n\r\nVì like status của em là sáng suốt!', 'product', NULL, '2023-09-23', 47),
(446, 66, 'Tuyệt với.', 'product', NULL, '2023-10-04', 49),
(447, 64, 'Hãy gọi em là mặt trời\r\n\r\nVì like status của em là sáng suốt!', 'product', NULL, '2023-09-24', 49),
(448, 66, 'Tuyệt với.', 'product', NULL, '2023-10-05', 48),
(449, 68, 'Hãy gọi em là mặt trời\r\n\r\nVì like status của em là sáng suốt!', 'product', NULL, '2023-09-30', 48),
(450, 69, 'Tuyệt với.', 'product', NULL, '2023-09-25', 47),
(451, 69, 'Hay quá!', 'product', NULL, '2023-09-27', 48),
(452, 64, 'Tuyệt với.', 'product', NULL, '2023-09-28', 47),
(453, 68, 'Tuyệt với.', 'product', NULL, '2023-10-17', 47),
(454, 68, 'Bài báo rất hay!', 'product', NULL, '2023-10-14', 48),
(455, 68, 'Hay quá!', 'product', NULL, '2023-09-29', 48);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id_coupon` int(11) NOT NULL,
  `name_coupon` text NOT NULL,
  `discount_coupon` int(11) NOT NULL,
  `start_date_coupon` date NOT NULL,
  `end_date_coupon` date NOT NULL,
  `max_uses_coupon` int(11) NOT NULL,
  `description_coupon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id_coupon`, `name_coupon`, `discount_coupon`, `start_date_coupon`, `end_date_coupon`, `max_uses_coupon`, `description_coupon`) VALUES
(2, 'C42EM', 12, '2023-10-13', '2023-10-20', 12, '12'),
(3, '9jvwrD', 12, '2023-10-18', '2023-10-01', 123, '123'),
(5, '2', 99, '2023-10-29', '2023-10-14', 12, '12'),
(8, '123213', 123, '2023-10-20', '2023-10-06', 123, '123'),
(12, '1232', 22, '2023-10-20', '2023-10-22', 22, '2'),
(13, '22321', 12, '2023-10-20', '2023-10-22', 23, '23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `username` text NOT NULL,
  `fullname` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `avatar` text NOT NULL,
  `roles` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id_customer`, `username`, `fullname`, `password`, `email`, `avatar`, `roles`) VALUES
(0, 'defaultUser', 'Bình luận ẩn danh', 'defaultUser', 'defaultUser@gmail.com', '/user.png', 'user'),
(11, 'admin', 'Lê Phước Nguyên Demo1222', '2', 'lphuonguye.ecn.2182004@gmail.com22222', '/admincc9135cb213c1baef61fa845417c835c.png', 'admin'),
(62, 'janesmith', 'Jane Smith', 'password2', 'janesmith@example.com', '/user.png', 'user'),
(63, 'michaelj', 'Michael Johnson', 'password3', 'michaeljohnson@example.com', '/user.png', 'user'),
(64, 'emilybrown', 'Emily Brown', 'password4', 'emilybrown@example.com', '/user.png', 'user'),
(65, 'williamd', 'William Davis', 'password5', 'williamdavis@example.com', '/user.png', 'user'),
(66, 'sarahw', 'Sarah Wilson', 'password6', 'sarahwilson@example.com', '/user.png', 'user'),
(67, 'robertl', 'Robert Lee', 'password7', 'robertlee@example.com', '/user.png', 'user'),
(68, 'jenniferm', 'Jennifer Miller', 'password8', 'jennifermiller@example.com', '/user.png', 'user'),
(69, 'davidm', 'David Martinez', 'password9', 'davidmartinez@example.com', '/user.png', 'user'),
(70, 'lindat', 'Linda Taylor', 'password10', 'lindataylor@example.com', '/user.png', 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `id_customer` int(11) NOT NULL,
  `author` text NOT NULL,
  `img` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id_news`, `title`, `description`, `id_customer`, `author`, `img`, `date`) VALUES
(46, 'Tổng Bí thư Nguyễn Phú Trọng: \"Nhân dân là người trực tiếp thụ hưởng và hiểu tất cả\"', '<p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Arial;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin-bottom:1rem;margin-top:0px;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Sau khi nghe đại diện Đoàn Đại biểu Quốc hội Thành phố Hà Nội báo cáo nội dung dự kiến tại kỳ họp thứ 6 Quốc hội khoá 15, nhiều cử tri phát biểu nhận định, trong 9 tháng qua, dưới sự lãnh đạo của Đảng, sự điều hành quyết liệt của Chính phủ và Quốc hội, đất nước ta đã vượt qua khó khăn phát triển kinh tế và tăng trưởng khá, giá cả ổn định, đồng tiền được giữ giá.</p><figure class=\"image image_resized gallery-embed embedded-entity process-filter-image align-center\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);display:block;font-family:Arial;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin:0px auto 1rem;orphans:2;text-align:center;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;width:auto !important;word-spacing:0px;\" role=\"group\"><picture><source media=\"all and (min-width: 1200px)\" type=\"image/jpeg\"><source media=\"all and (min-width: 992px)\" type=\"image/jpeg\"><source media=\"all and (min-width: 768px)\" type=\"image/jpeg\"><source media=\"all and (min-width: 576px)\" type=\"image/jpeg\"><source media=\"all and (min-width: 0)\" type=\"image/jpeg\"><img style=\"box-sizing:border-box;height:auto;image-rendering:-webkit-optimize-contrast;max-width:100%;vertical-align:middle;\" src=\"https://media.vov.vn/sites/default/files/styles/large/public/2023-10/14-10_tbt_nguyen_phu_trong_phat_bieu_tai_buoi_txct_1.jpg\" alt=\"tong bi thu nguyen phu trong nhan dan la nguoi truc tiep thu huong va hieu tat ca hinh anh 1\" typeof=\"foaf:Image\" title=\"tổng bí thư nguyễn phú trọng nhân dân là người trực tiếp thụ hưởng và hiểu tất cả hình ảnh 1\"></picture><figcaption style=\"background-color:transparent;box-sizing:border-box;caption-side:bottom;display:block !important;font-family:HelveticaNeue, Helvetica, Arial, sans-serif;margin:-6px 0px 0px;max-width:none;padding:10px 0px;text-align:center;\"><i>Tổng Bí thư Nguyễn Phú Trọng tại buổi tiếp xúc cử tri</i></figcaption></figure><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Arial;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin-bottom:1rem;margin-top:0px;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Cán bộ và nhân dân rất phấn khởi về chính sách đối ngoại của đất nước ta, đặc biệt là chuyến thăm cấp Nhà nước của Tổng thống Hoa Kỳ tới nước ta theo lời mời của Tổng Bí thư Nguyễn Phú Trọng, kết quả đã nâng quan hệ Việt - Mỹ lên tầm đối tác chiến lược toàn diện, Mỹ khẳng định ủng hộ Việt Nam là quốc gia mạnh, độc lập, tự cường và thịnh vượng, từ đó cho thấy vai trò, uy tín của Đảng cộng sản Việt Nam và Đất nước ta được nâng cao trên trường quốc tế, như lời Tổng Bí thư Nguyễn Phú Trọng đã nhiều lần phát biểu, với tất cả sự khiêm tốn nước ta chưa bao giờ có được có cơ đồ, tiềm lực, uy tín vị trí quốc tế như ngày nay.</p><p class=\" ads-detail-center\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Arial;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin-bottom:1rem;margin-top:0px;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Bên cạnh đó, cử tri cũng cho rằng, công cuộc phòng chống tham nhũng do Đảng ta tiến hành và đứng đầu là đồng chí Tổng Bí thư Nguyễn Phú Trọng vẫn đang diễn ra quyết liệt, hiệu quả, thể hiện sự quyết tâm rất lớn của toàn Đảng, toàn quân, toàn dân ta làm trong sạch bộ máy, củng cố thêm niềm tin của Nhân dân đối với Đảng và Nhà nước, việc xử lý cán bộ vi phạm có nhiều bước tiến lớn, toàn diện.</p><div style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Arial;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">&nbsp;</div><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Arial;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin-bottom:1rem;margin-top:0px;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Cử tri Nguyễn Thị Minh Hà nêu ý kiến: \"Cử tri chúng tôi mong muốn Đảng và Chính quyền các cấp từ Trung ương đến địa phương tiếp tục kiên quyết, kiên trì trong đấu tranh phòng chống tham nhũng, tiêu cực. Coi nhiệm vụ này đặc biệt quan trọng và phải được tiến hành thường xuyên, không ngừng nghỉ. Việc điều tra, xét xử các vụ án loại này phải kiên quyết đến cùng, công khai, xử lý cán bộ vi phạm phải thật nghiêm minh, có tính răn đe cao. Việc thu hồi tài sản do tham ô, tham nhũng phải minh bạch, kịp thời, triệt để\".</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Arial;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin-bottom:1rem;margin-top:0px;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Cử tri đề nghị Quốc hội, Chính phủ tiếp tục quan tâm đến chính sách tiền lương cho đội ngũ cán bộ, công chức và chính sách hỗ trợ cho đội ngũ cán bộ cơ sở, cán bộ không chuyên trách, cán bộ các tổ chức Hội, đoàn thể, hiện còn nhiều khó khăn; liên quan đến Dự án Luật đất đai sửa đổi, một số ý kiến cho rằng trong dự thảo Luật lần này có nội dung sử dụng nhà chung cư có thời hạn là chưa hợp lý, trong khi thực tế hiện nay, mâu thuẫn, tranh chấp giữa Chủ đầu tư, Ban quản lý và cư dân đang xảy ra trong rất nhiều chung cư gây ảnh hưởng đến tình hình an ninh trật tự chung; đề nghị Quốc hội khi thảo luận, xây dựng dự thảo Luật liên quan đến đất đai, nhà ở cần làm rõ và khắc phục những bất cập này và rất mong Chính phủ, Bộ ngành, các cấp chính quyền tăng cường quản lý, kiểm tra, xử lý nghiêm vi phạm để đảm bảo pháp luật thực sự đi vào cuộc sống, phục vụ đời sống…</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Arial;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin-bottom:1rem;margin-top:0px;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Thay mặt đoàn Đại biểu Quốc hội Thành phố Hà Nội, Tổng Bí thư Nguyễn Phú Trọng trân trọng tiếp thu những ý kiến tâm huyết xác đáng sát với thực tế của đông đảo các cử tri tại 3 quận. Tổng Bí thư Nguyễn Phú Trọng cho biết, Quốc hội có 3 chức năng cơ bản là xây dựng luật pháp, giám sát tối cao và quyết định những vấn đề quan trọng của đất nước nhưng phải dưới sự lãnh đạo toàn diện của Đảng.</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Arial;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;margin-bottom:1rem;margin-top:0px;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Nhấn mạnh cử tri có vai trò ý nghĩa quan trọng trong quá trình giám sát, phản biện quá trình thực thi các chủ trương chính sách của Đảng, Nhà nước, Tổng Bí thư Nguyễn Phú Trọng nêu rõ: \"Tại sao trước mỗi kỳ họp chúng ta phải tiếp xúc cử tri tiếp đó, sau kỳ họp phải báo cáo kết quả xin ý kiến cử tri mục đích là để cử tri đóng góp tới Quốc hội, Quốc hội xem xét luật pháp đã phản ánh đúng nguyện vọng của cử tri chưa và triển khai thực hiện có đúng đường lối của Đảng Nhà nước hay không. Tôi cho rằng cử tri và nhân dân có vai trò quan trọng trong hoạt động giám sát, kiểm tra, đây là điều cơ bản và tất cả được quy định bởi pháp luật. Ý kiến của nhân dân là quan trọng lắm vì dân là người trực tiếp thụ hưởng và hiểu tất cả\".</p>', 11, 'Lê Phước Nguyên Demo1222', 'admin14-10_tbt_nguyen_phu_trong_phat_bieu_tai_buoi_txct_1.jpeg', '2023-10-21'),
(47, 'Nga phá hủy 500 chiến cơ Ukraine, chặn loạt tên lửa tấn công Crưm', '<p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:border-box;color:rgb(80, 80, 80);font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:16px;font-stretch:inherit;font-style:normal;font-variant-alternates:inherit;font-variant-caps:normal;font-variant-east-asian:inherit;font-variant-ligatures:normal;font-variant-numeric:inherit;font-variant-position:inherit;font-variation-settings:inherit;font-weight:400;letter-spacing:normal;line-height:inherit;list-style:none;margin:1em 0px 0px;orphans:2;padding:0px;text-align:start;text-decoration:none;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">“Tổng số các mục tiêu bị phá hủy kể từ khi <a style=\"border-width:0px;box-sizing:border-box;color:rgb(45, 103, 173);font-family:inherit;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:inherit;font-stretch:inherit;font-style:inherit;font-variant:inherit;font-variation-settings:inherit;font-weight:inherit;line-height:1.25rem;list-style:none;margin:0px;padding:0px;text-underline-offset:1px;\" href=\"https://vietnamnet.vn/su-kien/tinh-hinh-chien-su-nga-ukraine-728834.html\" target=\"_blank\"><u>Nga triển khai chiến dịch quân sự đặc biệt ở Ukraine</u></a> gồm 500 máy bay, 252 máy bay trực thăng, 8.104 máy bay không người lái (UAV), 441 hệ thống tên lửa đất đối không, 12.778 xe tăng và các phương tiện chiến đấu bọc thép, 1.165 bệ phóng tên lửa đa nòng, 6.837 pháo dã chiến và pháo cối, cùng 14.463 xe quân sự chuyên dụng\", hãng thông tấn Tass dẫn tuyên bố từ Bộ Quốc phòng Nga hôm 20/10.&nbsp;</p><figure class=\"image image_resized vnn-content-image\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:border-box;color:rgb(111, 111, 111);display:block;font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:14px;font-stretch:inherit;font-variant-alternates:inherit;font-variant-caps:normal;font-variant-east-asian:inherit;font-variant-ligatures:normal;font-variant-numeric:inherit;font-variant-position:inherit;font-variation-settings:inherit;font-weight:400;letter-spacing:normal;line-height:inherit;list-style:none;margin:20px 0px;orphans:2;padding:0px;text-align:center;text-decoration:none;text-indent:0px;text-transform:none;white-space:normal;widows:2;width:760px;word-spacing:0px;\"><img style=\"border-width:0px;box-sizing:border-box;display:block;font:inherit;height:auto;list-style:none;margin:0px auto;max-width:100%;padding:0px;text-decoration:none;\" src=\"https://static-images.vnncdn.net/files/publish/2023/10/21/linh-nga-721.jpg\" alt=\"linh nga.jpg\" data-id=\"00YTLP\" data-thumb-src=\"https://static-images.vnncdn.net/files/publish/2023/10/21/linh-nga-721.jpg?width=200\" data-lg-id=\"6cb9e081-86cd-4881-a616-9ba72e9ba9f0\"><figcaption style=\"border-width:0px;box-sizing:border-box;display:block;font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:0.9375rem;font-stretch:inherit;font-variant:inherit;font-variation-settings:inherit;font-weight:inherit;line-height:1.4;list-style:none;margin:10px 0px 0px;padding:0px 1.875rem;text-align:center;text-decoration:none;width:760px;\"><i>Binh lính Nga. Ảnh: Tass</i></figcaption></figure><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:border-box;color:rgb(80, 80, 80);font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:16px;font-stretch:inherit;font-style:normal;font-variant-alternates:inherit;font-variant-caps:normal;font-variant-east-asian:inherit;font-variant-ligatures:normal;font-variant-numeric:inherit;font-variant-position:inherit;font-variation-settings:inherit;font-weight:400;letter-spacing:normal;line-height:inherit;list-style:none;margin:1em 0px 0px;orphans:2;padding:0px;text-align:start;text-decoration:none;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Theo Bộ Quốc phòng Nga, từ ngày 14 – 20/10, quân đội Nga đã bắn hạ 14 máy bay chiến đấu và trực thăng Ukraine gồm 10 tiêm kích MiG-29, 2 chiếc Su-35, và 2 chiếc Mi-8.&nbsp;</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:border-box;color:rgb(80, 80, 80);font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:16px;font-stretch:inherit;font-style:normal;font-variant-alternates:inherit;font-variant-caps:normal;font-variant-east-asian:inherit;font-variant-ligatures:normal;font-variant-numeric:inherit;font-variant-position:inherit;font-variation-settings:inherit;font-weight:400;letter-spacing:normal;line-height:inherit;list-style:none;margin:1em 0px 0px;orphans:2;padding:0px;text-align:start;text-decoration:none;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><strong style=\"border-width:0px;box-sizing:border-box;font-family:inherit;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:inherit;font-stretch:inherit;font-style:inherit;font-variant:inherit;font-variation-settings:inherit;line-height:inherit;list-style:none;margin:0px;padding:0px;text-decoration:none;\">Nga chặn loạt tên lửa tấn công Crưm</strong></p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:border-box;color:rgb(80, 80, 80);font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:16px;font-stretch:inherit;font-style:normal;font-variant-alternates:inherit;font-variant-caps:normal;font-variant-east-asian:inherit;font-variant-ligatures:normal;font-variant-numeric:inherit;font-variant-position:inherit;font-variation-settings:inherit;font-weight:400;letter-spacing:normal;line-height:inherit;list-style:none;margin:1em 0px 0px;orphans:2;padding:0px;text-align:start;text-decoration:none;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Chia sẻ trên Telegram hôm 20/10, Thống đốc vùng Kherson do <a style=\"border-width:0px;box-sizing:border-box;color:rgb(45, 103, 173);font-family:inherit;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:inherit;font-stretch:inherit;font-style:inherit;font-variant:inherit;font-variation-settings:inherit;font-weight:inherit;line-height:1.25rem;list-style:none;margin:0px;padding:0px;text-underline-offset:1px;\" href=\"https://vietnamnet.vn/nga-tag11793932963017999683.html\" target=\"_blank\"><u>Nga </u></a>bổ nhiệm Vladimir Saldo cho hay lực lượng phòng không Nga đã ngăn chặn cuộc tấn công tên lửa quy mô lớn của Ukraine nhắm vào bán đảo Crưm, và khu vực biển Azov. Theo Nga, chỉ trong vòng 1 giờ, Ukraine đã phóng từ 10 – 15 tên lửa bao gồm các tên lửa S-200 cải tiến.&nbsp;</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:border-box;color:rgb(80, 80, 80);font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:16px;font-stretch:inherit;font-style:normal;font-variant-alternates:inherit;font-variant-caps:normal;font-variant-east-asian:inherit;font-variant-ligatures:normal;font-variant-numeric:inherit;font-variant-position:inherit;font-variation-settings:inherit;font-weight:400;letter-spacing:normal;line-height:inherit;list-style:none;margin:1em 0px 0px;orphans:2;padding:0px;text-align:start;text-decoration:none;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">“5 tên lửa đã bị bắn rơi trong vùng Kherson gồm 3 tên lửa rơi xuống quận Kakhovka và 2 tên lửa ở quận Genichesk. Các lực lượng phòng không đã hành động xuất sắc”, ông Saldo cho biết.&nbsp;</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:border-box;color:rgb(80, 80, 80);font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:16px;font-stretch:inherit;font-style:normal;font-variant-alternates:inherit;font-variant-caps:normal;font-variant-east-asian:inherit;font-variant-ligatures:normal;font-variant-numeric:inherit;font-variant-position:inherit;font-variation-settings:inherit;font-weight:400;letter-spacing:normal;line-height:inherit;list-style:none;margin:1em 0px 0px;orphans:2;padding:0px;text-align:start;text-decoration:none;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Thống đốc Sevastopol trên bán đảo Crưm Mikhail Razvozhayev cũng cho hay vào sáng sớm ngày 20/10, các hệ thống phòng không Nga đã bắn rơi 1 tên lửa trên Biển Đen khi tới gần quận Lyubimovka của Sevastopol.</p>', 11, 'Lê Phước Nguyên Demo1222', 'adminlinh-nga-721.jpeg', '2023-10-21'),
(48, 'Mỹ sẽ thường xuyên gửi tên lửa ATACMS cho Kiev, Nga bắn hạ tiêm kích Ukraine', '<p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:border-box;color:rgb(80, 80, 80);font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:16px;font-stretch:inherit;font-style:normal;font-variant-alternates:inherit;font-variant-caps:normal;font-variant-east-asian:inherit;font-variant-ligatures:normal;font-variant-numeric:inherit;font-variant-position:inherit;font-variation-settings:inherit;font-weight:400;letter-spacing:normal;line-height:inherit;list-style:none;margin:1em 0px 0px;orphans:2;padding:0px;text-align:start;text-decoration:none;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Theo hãng tin Reuters, khi được đặt câu hỏi liệu hoạt động vận chuyển có thường xuyên và với số lượng tên lửa lớn hơn hay không, Bộ trưởng Ngoại giao Ukraine Dmytro Kuleba nói, “Nó là như vậy”. &nbsp;</p><figure class=\"image image_resized vnn-content-image\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:border-box;color:rgb(111, 111, 111);display:block;font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:14px;font-stretch:inherit;font-variant-alternates:inherit;font-variant-caps:normal;font-variant-east-asian:inherit;font-variant-ligatures:normal;font-variant-numeric:inherit;font-variant-position:inherit;font-variation-settings:inherit;font-weight:400;letter-spacing:normal;line-height:inherit;list-style:none;margin:20px 0px;orphans:2;padding:0px;text-align:center;text-decoration:none;text-indent:0px;text-transform:none;white-space:normal;widows:2;width:760px;word-spacing:0px;\"><img style=\"border-width:0px;box-sizing:border-box;display:block;font:inherit;height:auto;list-style:none;margin:0px auto;max-width:100%;padding:0px;text-decoration:none;\" src=\"https://static-images.vnncdn.net/files/publish/2023/10/20/nga-ukraine-8-86.jpg\" alt=\"nga ukraine 8.jpg\" data-id=\"00YR8V\" data-thumb-src=\"https://static-images.vnncdn.net/files/publish/2023/10/20/nga-ukraine-8-86.jpg?width=200\" data-lg-id=\"2dcdbeb6-9b0b-4b9d-87b8-430905583c3b\"><figcaption style=\"border-width:0px;box-sizing:border-box;display:block;font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:0.9375rem;font-stretch:inherit;font-variant:inherit;font-variation-settings:inherit;font-weight:inherit;line-height:1.4;list-style:none;margin:10px 0px 0px;padding:0px 1.875rem;text-align:center;text-decoration:none;width:760px;\"><i>Ảnh minh họa</i></figcaption></figure><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:border-box;color:rgb(80, 80, 80);font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:16px;font-stretch:inherit;font-style:normal;font-variant-alternates:inherit;font-variant-caps:normal;font-variant-east-asian:inherit;font-variant-ligatures:normal;font-variant-numeric:inherit;font-variant-position:inherit;font-variation-settings:inherit;font-weight:400;letter-spacing:normal;line-height:inherit;list-style:none;margin:1em 0px 0px;orphans:2;padding:0px;text-align:start;text-decoration:none;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">“Đây là kết quả trực tiếp của thỏa thuận giữa Tổng thống Volodymyr Zelensky và Tổng thống Joe Biden trong cuộc gặp tại Washington vào cuối tháng 9”, ông Kuleba nói thêm.&nbsp;</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:border-box;color:rgb(80, 80, 80);font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:16px;font-stretch:inherit;font-style:normal;font-variant-alternates:inherit;font-variant-caps:normal;font-variant-east-asian:inherit;font-variant-ligatures:normal;font-variant-numeric:inherit;font-variant-position:inherit;font-variation-settings:inherit;font-weight:400;letter-spacing:normal;line-height:inherit;list-style:none;margin:1em 0px 0px;orphans:2;padding:0px;text-align:start;text-decoration:none;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Hiện chưa rõ Mỹ đã chuyển cho <a style=\"border-width:0px;box-sizing:border-box;color:rgb(45, 103, 173);font-family:inherit;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:inherit;font-stretch:inherit;font-style:inherit;font-variant:inherit;font-variation-settings:inherit;font-weight:inherit;line-height:1.25rem;list-style:none;margin:0px;padding:0px;text-underline-offset:1px;\" href=\"https://vietnamnet.vn/ukraine-tag18220395140699380479.html\" target=\"_blank\"><u>Ukraine</u></a> bao nhiêu Hệ thống tên lửa chiến thuật lục quân (ATACMS). Tờ New York Times dẫn lời 2 quan chức phương Tây cho hay, Mỹ đã cung cấp khoảng 20 ATACMS cho Ukraine. Các ATACMS này có tầm bắn 165km. Trong khi đó, các biến thể mới hơn của ATACMS có tầm bắn tối đa khoảng 300km.</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:border-box;color:rgb(80, 80, 80);font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:16px;font-stretch:inherit;font-style:normal;font-variant-alternates:inherit;font-variant-caps:normal;font-variant-east-asian:inherit;font-variant-ligatures:normal;font-variant-numeric:inherit;font-variant-position:inherit;font-variation-settings:inherit;font-weight:400;letter-spacing:normal;line-height:inherit;list-style:none;margin:1em 0px 0px;orphans:2;padding:0px;text-align:start;text-decoration:none;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Hôm 17/10, Nhà Trắng cũng xác nhận đã gửi tên lửa ATACMS cho Kiev, sau khi quân đội Ukraine lần đầu tiên tuyên bố đã sử dụng vũ khí này để tấn công căn cứ quân sự của Nga gần thành phố Berdiansk ở vùng Zaporizhzhia và thành phố Luhansk.&nbsp;</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:border-box;color:rgb(80, 80, 80);font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:16px;font-stretch:inherit;font-style:normal;font-variant-alternates:inherit;font-variant-caps:normal;font-variant-east-asian:inherit;font-variant-ligatures:normal;font-variant-numeric:inherit;font-variant-position:inherit;font-variation-settings:inherit;font-weight:400;letter-spacing:normal;line-height:inherit;list-style:none;margin:1em 0px 0px;orphans:2;padding:0px;text-align:start;text-decoration:none;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><strong style=\"border-width:0px;box-sizing:border-box;font-family:inherit;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:inherit;font-stretch:inherit;font-style:inherit;font-variant:inherit;font-variation-settings:inherit;line-height:inherit;list-style:none;margin:0px;padding:0px;text-decoration:none;\">Nga bắn hạ tiêm kích, trực thăng quân sự Ukraine&nbsp;</strong></p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:border-box;color:rgb(80, 80, 80);font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:16px;font-stretch:inherit;font-style:normal;font-variant-alternates:inherit;font-variant-caps:normal;font-variant-east-asian:inherit;font-variant-ligatures:normal;font-variant-numeric:inherit;font-variant-position:inherit;font-variation-settings:inherit;font-weight:400;letter-spacing:normal;line-height:inherit;list-style:none;margin:1em 0px 0px;orphans:2;padding:0px;text-align:start;text-decoration:none;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Hôm 19/10, Bộ Quốc phòng Nga thông báo các lực lượng phòng không Nga đã bắn hạ 1 tiêm kích Su-25 gần thành phố Dnepropetrovsk, và 1 trực thăng tấn công Mi-8 gần khu Zagryzovo của vùng Kharkiv trong quá trình triển khai chiến dịch quân sự đặc biệt ở Ukraine vào ngày 18/10. &nbsp;</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:border-box;color:rgb(80, 80, 80);font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:16px;font-stretch:inherit;font-style:normal;font-variant-alternates:inherit;font-variant-caps:normal;font-variant-east-asian:inherit;font-variant-ligatures:normal;font-variant-numeric:inherit;font-variant-position:inherit;font-variation-settings:inherit;font-weight:400;letter-spacing:normal;line-height:inherit;list-style:none;margin:1em 0px 0px;orphans:2;padding:0px;text-align:start;text-decoration:none;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Cùng ngày, tiêm kích của không quân Nga đã bắn rơi một máy bay chiến đấu MiG-29 của Ukraine ở khu Troitskoye thuộc Cộng hòa Nhân dân Donetsk tự xưng.&nbsp;</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:border-box;color:rgb(80, 80, 80);font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:16px;font-stretch:inherit;font-style:normal;font-variant-alternates:inherit;font-variant-caps:normal;font-variant-east-asian:inherit;font-variant-ligatures:normal;font-variant-numeric:inherit;font-variant-position:inherit;font-variation-settings:inherit;font-weight:400;letter-spacing:normal;line-height:inherit;list-style:none;margin:1em 0px 0px;orphans:2;padding:0px;text-align:start;text-decoration:none;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Quân đội Nga tuyên bố đã tiêu diệt 260 binh sĩ Ukraine, 1 xe tăng, 2 xe chiến đấu bọc thép, và 4 xe cơ giới ở khu vực Donetsk trong ngày 18/10.&nbsp;</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);border-width:0px;box-sizing:border-box;color:rgb(80, 80, 80);font-family:arial;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:16px;font-stretch:inherit;font-style:normal;font-variant-alternates:inherit;font-variant-caps:normal;font-variant-east-asian:inherit;font-variant-ligatures:normal;font-variant-numeric:inherit;font-variant-position:inherit;font-variation-settings:inherit;font-weight:400;letter-spacing:normal;line-height:inherit;list-style:none;margin:1em 0px 0px;orphans:2;padding:0px;text-align:start;text-decoration:none;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Phía Nga thống kê kể từ khi triển khai <a style=\"border-width:0px;box-sizing:border-box;color:rgb(45, 103, 173);font-family:inherit;font-feature-settings:inherit;font-kerning:inherit;font-optical-sizing:inherit;font-size:inherit;font-stretch:inherit;font-style:inherit;font-variant:inherit;font-variation-settings:inherit;font-weight:inherit;line-height:1.25rem;list-style:none;margin:0px;padding:0px;text-underline-offset:1px;\" href=\"https://vietnamnet.vn/su-kien/tinh-hinh-chien-su-nga-ukraine-728834.html\" target=\"_blank\"><u>chiến dịch quân sự đặc biệt ở Ukraine</u></a> vào tháng 2/2022, các lực lượng vũ trang Nga đã tiêu diệt 493 máy bay chiến đấu Ukraine, 252 máy bay trực thăng, 8.065 máy bay không người lái (UAV), 441 hệ thống tên lửa đất đối không, 12.764 xe tăng và các phương tiện chiến đấu bọc thép, 1.163 bệ phóng tên lửa đa nòng, 6.823 khẩu pháo và súng cối, cùng 14.438 xe cơ giới quân sự.</p>', 11, 'Lê Phước Nguyên Demo1222', 'adminnga-ukraine-8-86.jpeg', '2023-10-21'),
(49, 'Thiếu niên 14 tuổi đầu độc cha và bà nội ở Tiền Giang chịu trách nhiệm hình sự ra sao?', '<p style=\"-webkit-text-stroke-width:0px;background-color:rgb(247, 247, 247);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Arial, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:18px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;line-height:1.6;margin:0px !important 0px 0px;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Liên quan đến <a class=\"cms-relate\" style=\"background-color:transparent;box-sizing:border-box;color:rgb(0, 115, 159);display:inline;text-decoration:none;transition:all 0.2s ease-in-out 0s;\" href=\"https://plo.vn/phap-luat/vu-an/\" title=\"vụ án\">vụ án</a> mạng làm hai người chết xảy ra tại xã Hòa Hưng, huyện Cái Bè, tỉnh Tiền Giang, Cơ quan CSĐT Công an tỉnh này đã khởi tố vụ án giết người, đồng thời bắt khẩn cấp Phạm Minh Quốc (hơn 14 tuổi, sinh ngày 11-4-2009).</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(247, 247, 247);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Arial, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:18px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;line-height:1.6;margin:0px;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Theo Quốc khai nhận: <a class=\"cms-relate\" style=\"background-color:transparent;box-sizing:border-box;color:rgb(0, 115, 159);display:inline;text-decoration:none;transition:all 0.2s ease-in-out 0s;\" href=\"https://plo.vn/tu-khoa.html?q=cha%20m%E1%BA%B9%20ly%20th%C3%A2n\" title=\"Cha mẹ ly thân\">Cha mẹ ly thân</a> khi Quốc 6 tuổi. Quốc và hai em về ở với mẹ bên ông bà ngoại (xã Mỹ Lương, huyện Cái Bè). Năm 2021, Quốc bỏ học và cùng mẹ làm ở vựa trái cây của dì ruột.</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(247, 247, 247);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Arial, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:18px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;line-height:1.6;margin:0px;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Khoảng 2-3 năm gần đây, buổi tối Quốc về ngủ tại nhà của bà nội và cha (xã Hòa Hưng, huyện Cái Bè). Cha thường xuyên uống rượu, nhiều lần Quốc nói cha bỏ rượu thì bị la mắng. Quốc nảy sinh ý định giết cha.</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(247, 247, 247);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Arial, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:18px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;line-height:1.6;margin:0px;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Ngày 13-10, Quốc cùng em đi xin thuốc về thuốc chó hoang; sau đó khoảng 23 giờ cùng ngày, Quốc bỏ <a class=\"cms-relate\" style=\"background-color:transparent;box-sizing:border-box;color:rgb(0, 115, 159);display:inline;text-decoration:none;transition:all 0.2s ease-in-out 0s;\" href=\"https://plo.vn/tu-khoa.html?q=thu%E1%BB%91c%20b%E1%BA%A3%20ch%C3%B3\" title=\"thuốc bả chó\">thuốc bả chó</a> vào hộp sữa mà bà nội và cha hay uống khiến họ tử vong.</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(247, 247, 247);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Arial, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:18px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;line-height:1.6;margin:0px;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><a class=\"cms-relate\" style=\"background-color:transparent;box-sizing:border-box;color:rgb(0, 115, 159);display:inline;text-decoration:none;transition:all 0.2s ease-in-out 0s;\" href=\"https://plo.vn/giao-luu-truc-tuyen/\" title=\"Trao đổi\">Trao đổi</a> với <a class=\"cms-relate\" style=\"background-color:transparent;box-sizing:border-box;color:rgb(0, 115, 159);display:inline;text-decoration:none;transition:all 0.2s ease-in-out 0s;\" href=\"https://plo.vn/\" title=\"Pháp Luật TP\"><i style=\"box-sizing:border-box;\">Pháp Luật TP</i></a><i style=\"box-sizing:border-box;\">.HCM</i> về trách nhiệm pháp lý của Quốc trong trường hợp này, Luật sư Lê Văn Bình, Đoàn Luật sư TP.HCM, phân tích: Căn cứ Điều 12 BLHS, người từ đủ 14 tuổi đến dưới 16 tuổi phải chịu trách nhiệm hình sự về tội phạm rất nghiêm trọng, tội phạm đặc biệt nghiêm trọng khi phạm vào các tội giết người, cố ý gây thương tích...</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(247, 247, 247);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Arial, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:18px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;line-height:1.6;margin:0px;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Do <span style=\"box-sizing:border-box;text-align:justify;\">Quốc mới hơn 14 tuổi, còn ở độ tuổi trẻ em nên tội phạm và hình phạt cũng sẽ có quy định khác so với người thành niên phạm tội.</span></p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(247, 247, 247);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Arial, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:18px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;line-height:1.6;margin:0px;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Hành vi của Quốc đã gây ra hậu quả làm hai người chết; nạn nhân là bà nội và cha ruột của Quốc. Đây là hai tình tiết định khung hình phạt tại khoản 1 Điều 123 BLHS (khung hình phạt đến tử hình), thuộc trường hợp tội phạm đặc biệt nghiêm trọng.</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(247, 247, 247);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Arial, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:18px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;line-height:1.6;margin:0px;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Về hình phạt, theo khoản 2 Điều 101 BLHS, đối với người từ đủ 14 tuổi đến dưới 16 tuổi khi phạm tội, nếu điều luật được áp dụng quy định hình phạt tù chung thân hoặc tử hình, thì mức hình phạt cao nhất được áp dụng không quá 12 năm tù; nếu là tù có thời hạn thì mức hình phạt cao nhất được áp dụng không quá 1/2 mức phạt tù mà điều luật quy định.</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(247, 247, 247);box-sizing:border-box;color:rgb(33, 37, 41);font-family:Arial, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:18px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;line-height:1.6;margin:0px;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Do đó, mức hình phạt tù tối đa mà những người từ đủ 14 tuổi đến dưới 16 tuổi phạm tội có thể đối diện là 12 năm tù.</p>', 11, 'Lê Phước Nguyên Demo1222', 'postDefault.jpeg', '2023-10-21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_payments`
--

CREATE TABLE `order_payments` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_fullname` text NOT NULL,
  `customer_phone` int(11) NOT NULL,
  `customer_email` text NOT NULL,
  `customer_address` text NOT NULL,
  `payment_amount` float NOT NULL,
  `payment_date` date NOT NULL,
  `shipping_method` text NOT NULL,
  `payment_status` text NOT NULL,
  `order_notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_payments`
--

INSERT INTO `order_payments` (`order_id`, `customer_id`, `customer_fullname`, `customer_phone`, `customer_email`, `customer_address`, `payment_amount`, `payment_date`, `shipping_method`, `payment_status`, `order_notes`) VALUES
(66, 11, 'Lê Phước Nguyên', 763636353, 'lphuonguye.ecn.2182004@gmail.com', '', 23.51, '2023-10-11', 'Tự nhận', 'Thành công', ''),
(67, 11, 'Lê Phước Nguyên', 763636353, 'lphuonguye.ecn.2182004@gmail.com', '', 11.76, '2023-10-11', 'Tự nhận', 'Thành công', ''),
(68, 11, 'Lê Phước Nguyên', 763636353, 'lphuonguye.ecn.2182004@gmail.com', 'khu phố 8, Xã Nam Cao, Huyện Bảo Lâm, Tỉnh Cao Bằng, Việt Nam', 35.51, '2023-10-11', 'Chuyển phát nhanh', 'Thành công', ''),
(69, 11, 'Lê Phước Nguyên', 763636353, 'lphuonguye.ecn.2182004@gmail.com', '', 29.27, '2023-10-12', 'Tự nhận', 'Thành công', ''),
(70, 11, 'Lê Phước Nguyên', 763636353, 'lphuonguye.ecn.2182004@gmail.com', '', 186.07, '2023-10-17', 'Tự nhận', 'Thành công', ''),
(71, 11, 'Lê Phước Nguyên', 763636353, 'lphuonguye.ecn.2182004@gmail.com', 'khu phố 8, Thị trấn Gio Linh, Huyện Gio Linh, Tỉnh Quảng Trị, Việt Nam', 103.59, '2023-10-17', 'Chuyển phát nhanh', 'Thành công', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name_products` text NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `image` text NOT NULL,
  `entry_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `special_product` text NOT NULL,
  `views` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_product`, `name_products`, `price`, `discount`, `image`, `entry_date`, `quantity`, `id_category`, `special_product`, `views`, `description`) VALUES
(9, 'Breast Cancer Warrior Shirt', 23.99, 29.56, '/adminf046528ed146f98989489fc1a10a4b9a.png', '2023-09-25', 0, 13, 'đặc biệt', 116, '<div class=\"product-title-container is-smaller\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(119, 119, 119);font-family:Poppins, sans-serif;font-size:0.75em;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><h1 class=\"product-title product_title entry-title\" style=\"box-sizing:border-box;color:rgb(17, 17, 17) !important;font-family:Poppins, sans-serif;font-size:1.7em;font-weight:300 !important;line-height:1.3;margin-bottom:0.5em;margin-top:0px;text-rendering:optimizespeed;width:529.992px;\">Breast Cancer Warrior Shirt</h1></div><div class=\"product-price-container is-normal\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(119, 119, 119);font-family:Poppins, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><div class=\"price-wrapper\" style=\"box-sizing:border-box;\">&nbsp;</div></div>'),
(12, 'AGR Never Underestimate An October Woman Watches Hallmark Movies Hoodie', 38.99, 45.56, '/admin3f37cb098566669da4d8ccd23c955e78.jpeg', '2023-09-25', 0, 14, 'đặc biệt', 257, '<div class=\"product-title-container is-smaller\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(119, 119, 119);font-family:Poppins, sans-serif;font-size:0.75em;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><h1 class=\"product-title product_title entry-title\" style=\"box-sizing:border-box;color:rgb(17, 17, 17) !important;font-family:Poppins, sans-serif;font-size:1.7em;font-weight:300 !important;line-height:1.3;margin-bottom:0.5em;margin-top:0px;text-rendering:optimizespeed;width:529.992px;\">AGR Never Underestimate An October Woman Watches Hallmark Movies Hoodie</h1></div><div class=\"product-price-container is-normal\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(119, 119, 119);font-family:Poppins, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><div class=\"price-wrapper\" style=\"box-sizing:border-box;\">&nbsp;</div></div>'),
(18, 'Tis The Season Sweetshirt, Fall Football Hoodie, Pumpkin Patch Shirt, Autumn Shirt, Womens Halloween Shirt, Fall Graphic Tee, Fall Coffee', 36.99, 43.55, '/admin203d6a6bcc57ebfdc12505e5457aec36.jpeg', '2023-09-25', 0, 15, 'đặc biệt', 84, '<p><a class=\"woocommerce-LoopProduct-link woocommerce-loop-product__link\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(3, 113, 128);display:inline-block;font-family:Poppins, sans-serif;font-size:14.4px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;line-height:1.3;margin-bottom:0.1em;margin-top:0.1em;orphans:2;text-align:center;text-decoration:none;text-indent:0px;text-transform:none;touch-action:manipulation;white-space:normal;widows:2;word-spacing:0px;\" href=\"https://zenassan.com/product/tis-the-season-sweetshirt-fall-football-hoodie-pumpkin-patch-shirt-autumn-shirt-womens-halloween-shirt-fall-graphic-tee-fall-coffee/\">Tis The Season Sweetshirt, Fall Football Hoodie, Pumpkin Patch Shirt, Autumn Shirt, Womens Halloween Shirt, Fall Graphic Tee, Fall Coffee</a></p>'),
(20, 'Comfort Colors Halloween Mushroom T-Shirt, Cute Halloween Outfit, Halloween Gifts, Anti-Halloween, Funny Mushroom Graphic Fall Tee', 32.45, 42.55, '/adminc4dcd578cfeab074f604940129ac0826.jpeg', '2023-09-25', 0, 15, 'đặc biệt', 19, '<div class=\"product-title-container is-smaller\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(119, 119, 119);font-family:Poppins, sans-serif;font-size:0.75em;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><h1 class=\"product-title product_title entry-title\" style=\"box-sizing:border-box;color:rgb(17, 17, 17) !important;font-family:Poppins, sans-serif;font-size:1.7em;font-weight:300 !important;line-height:1.3;margin-bottom:0.5em;margin-top:0px;text-rendering:optimizespeed;width:524.992px;\">Comfort Colors Halloween Mushroom T-Shirt, Cute Halloween Outfit, Halloween Gifts, Anti-Halloween, Funny Mushroom Graphic Fall Tee</h1></div><div class=\"product-price-container is-normal\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(119, 119, 119);font-family:Poppins, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><div class=\"price-wrapper\" style=\"box-sizing:border-box;\">&nbsp;</div></div>'),
(21, 'Women’S V-Neck Funny Thanksgiving Tee No Diet In Thanksgiving Shirt Hilarious Turkey Day Shirt Humor Holiday Ladies Soft Graphic Tshirtcopy Of 00 Women’S V-Neck', 24.77, 29.55, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-09-23', 0, 13, 'đặc biệt', 32, '<div class=\"product-title-container is-smaller\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(119, 119, 119);font-family:Poppins, sans-serif;font-size:0.75em;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><h1 class=\"product-title product_title entry-title\" style=\"box-sizing:border-box;color:rgb(17, 17, 17) !important;font-family:Poppins, sans-serif;font-size:1.7em;font-weight:300 !important;line-height:1.3;margin-bottom:0.5em;margin-top:0px;text-rendering:optimizespeed;width:524.992px;\">Women’S V-Neck Funny Thanksgiving Tee No Diet In Thanksgiving Shirt Hilarious Turkey Day Shirt Humor Holiday Ladies Soft Graphic Tshirtcopy Of 00 Women’S V-Neck</h1></div><div class=\"product-price-container is-normal\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(119, 119, 119);font-family:Poppins, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><div class=\"price-wrapper\" style=\"box-sizing:border-box;\">&nbsp;</div></div>'),
(22, 'Thankful Grateful Blessed Xmas Raindeer Mistletoe Christmas Premium Graphic Hoodie Sweatshirt', 36.55, 48.25, '/admin8e0bd8842b6b2da94701b5dd02b01c4c.jpeg', '2023-09-25', 0, 15, 'đặc biệt', 17, '<p><a class=\"woocommerce-LoopProduct-link woocommerce-loop-product__link\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(0, 0, 0);display:inline-block;font-family:Poppins, sans-serif;font-size:14.4px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;line-height:1.3;margin-bottom:0.1em;margin-top:0.1em;orphans:2;outline-width:0px;text-align:center;text-decoration:none;text-indent:0px;text-transform:none;touch-action:manipulation;white-space:normal;widows:2;word-spacing:0px;\" href=\"https://zenassan.com/product/thankful-grateful-blessed-xmas-raindeer-mistletoe-christmas-premium-graphic-hoodie-sweatshirt/\">Thankful Grateful Blessed Xmas Raindeer Mistletoe Christmas Premium Graphic Hoodie Sweatshirt</a></p>'),
(23, 'All I Need Is Tea And My Cat It Is Too Peopley Outside Standard Hoodie', 36.55, 42.45, '/admina5e6dbf5aa76134372f473beb9515761.jpeg', '2023-09-25', 0, 14, 'đặc biệt', 83, '<p><a class=\"woocommerce-LoopProduct-link woocommerce-loop-product__link\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(0, 0, 0);display:inline-block;font-family:Poppins, sans-serif;font-size:14.4px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;line-height:1.3;margin-bottom:0.1em;margin-top:0.1em;orphans:2;outline-width:0px;text-align:center;text-decoration:none;text-indent:0px;text-transform:none;touch-action:manipulation;white-space:normal;widows:2;word-spacing:0px;\" href=\"https://zenassan.com/product/all-i-need-is-tea-and-my-cat-it-is-too-peopley-outside-standard-hoodie/\">All I Need Is Tea And My Cat It Is Too Peopley Outside Standard Hoodie</a></p>'),
(24, 'And Into The Garden I Go To Lose My Mind And Find My Soul Gardening Skull T Shirt Standard/Premium T-Shirt Hoodie', 25.55, 29.68, '/admin62bc983aeafa183f14c66ffb4a77ab78.jpeg', '2023-09-25', 0, 13, 'đặc biệt', 16, '<div class=\"product-title-container is-smaller\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(119, 119, 119);font-family:Poppins, sans-serif;font-size:0.75em;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><h1 class=\"product-title product_title entry-title\" style=\"box-sizing:border-box;color:rgb(17, 17, 17) !important;font-family:Poppins, sans-serif;font-size:1.7em;font-weight:300 !important;line-height:1.3;margin-bottom:0.5em;margin-top:0px;text-rendering:optimizespeed;width:524.992px;\">And Into The Garden I Go To Lose My Mind And Find My Soul Gardening Skull T Shirt Standard/Premium T-Shirt Hoodie</h1></div><div class=\"product-price-container is-normal\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);box-sizing:border-box;color:rgb(119, 119, 119);font-family:Poppins, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><div class=\"price-wrapper\" style=\"box-sizing:border-box;\">&nbsp;</div></div>'),
(43, 'Merry and Christmas Sweatshirt, Christmas Sweatshirt, Family Christmas Sweatshirt, Christmas T-Shirts, Merry Christmas Sweatshirt', 24.42, 32.42, '/adminb943978904cb719c399bb52e9c7cff33.jpeg', '2023-10-21', 231, 13, 'đặc biệt', 0, ''),
(64, 'Special T-shirt 1', 25.99, 30, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 100, 13, 'đặc biệt', 55, 'This is a special T-shirt with a discount.'),
(65, 'Special T-shirt 2', 29.99, 35, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 90, 13, 'đặc biệt', 45, 'This is another special T-shirt with a discount.'),
(66, 'Special T-shirt 3', 28.99, 40, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 80, 13, 'đặc biệt', 60, 'This is a unique T-shirt on sale.'),
(67, 'Special T-shirt 4', 27.99, 32, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 70, 13, 'đặc biệt', 55, 'Special T-shirt with a big discount.'),
(68, 'Special T-shirt 5', 24.99, 34, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 60, 13, 'đặc biệt', 70, 'Don\'t miss this special T-shirt deal.'),
(69, 'Special T-shirt 6', 26.99, 38, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 50, 13, 'đặc biệt', 75, 'Grab this discounted special T-shirt now.'),
(70, 'Special T-shirt 7', 23.99, 31, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 40, 13, 'đặc biệt', 80, 'Limited time offer for this special T-shirt.'),
(71, 'Special T-shirt 8', 22.99, 36, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 30, 13, 'đặc biệt', 85, 'Hurry, only a few of these special T-shirts left.'),
(72, 'Special T-shirt 9', 21.99, 39, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 20, 13, 'đặc biệt', 90, 'Last chance to get this special T-shirt.'),
(73, 'Special T-shirt 10', 20.99, 33, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 10, 13, 'đặc biệt', 96, 'Lowest price ever for this special T-shirt.'),
(74, 'Hoodie 1', 35, 45, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 100, 14, 'đặc biệt', 50, 'Stylish hoodie for everyday wear.'),
(75, 'Hoodie 2', 40, 50, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 120, 14, 'đặc biệt', 60, 'Warm and comfortable hoodie.'),
(76, 'Hoodie 3', 38, 48, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 90, 14, 'đặc biệt', 70, 'Cool hoodie for any season.'),
(77, 'Hoodie 4', 28, 38, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 80, 14, 'đặc biệt', 40, 'Affordable and stylish hoodie.'),
(78, 'Hoodie 5', 42, 52, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 110, 14, 'đặc biệt', 80, 'High-quality hoodie.'),
(79, 'Hoodie 6', 36, 46, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 95, 14, 'đặc biệt', 55, 'Sporty hoodie for active lifestyles.'),
(80, 'Hoodie 7', 45, 55, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 70, 14, 'đặc biệt', 75, 'Cute and cozy hoodie.'),
(81, 'Hoodie 8', 37, 47, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 85, 14, 'đặc biệt', 69, 'Simple and stylish hoodie.'),
(82, 'Hoodie 9', 39, 49, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 75, 14, 'đặc biệt', 90, 'Creative and unique hoodie.'),
(83, 'Hoodie 10', 30, 40, '/admin64414917de586a2cbba53610e3d5408d.jpeg', '2023-10-21', 105, 14, 'đặc biệt', 47, 'Trendy hoodie for fashion enthusiasts.'),
(94, 'Graphic Tee 1', 25, 30, '/adminc4dcd578cfeab074f604940129ac0826.jpeg', '2023-10-21', 80, 15, 'đặc biệt', 60, 'Stylish graphic tee for any occasion.'),
(95, 'Graphic Tee 2', 28, 35, '/adminc4dcd578cfeab074f604940129ac0826.jpeg', '2023-10-21', 100, 15, 'đặc biệt', 70, 'Cool graphic tee for casual wear.'),
(96, 'Graphic Tee 3', 26, 32, '/adminc4dcd578cfeab074f604940129ac0826.jpeg', '2023-10-21', 90, 15, 'đặc biệt', 50, 'Graphic tee with unique design.'),
(97, 'Graphic Tee 4', 30, 36, '/adminc4dcd578cfeab074f604940129ac0826.jpeg', '2023-10-21', 75, 15, 'đặc biệt', 81, 'Comfortable graphic tee.'),
(98, 'Graphic Tee 5', 27, 33, '/adminc4dcd578cfeab074f604940129ac0826.jpeg', '2023-10-21', 85, 15, 'đặc biệt', 65, 'High-quality graphic tee.'),
(99, 'Graphic Tee 6', 29, 34, '/adminc4dcd578cfeab074f604940129ac0826.jpeg', '2023-10-21', 95, 15, 'đặc biệt', 90, 'Trendy graphic tee for fashion enthusiasts.'),
(100, 'Graphic Tee 7', 32, 38, '/adminc4dcd578cfeab074f604940129ac0826.jpeg', '2023-10-21', 70, 15, 'đặc biệt', 55, 'Creative and unique graphic tee.'),
(101, 'Graphic Tee 8', 24, 31, '/adminc4dcd578cfeab074f604940129ac0826.jpeg', '2023-10-21', 110, 15, 'đặc biệt', 75, 'Graphic tee with cool prints.'),
(102, 'Graphic Tee 9', 31, 37, '/adminc4dcd578cfeab074f604940129ac0826.jpeg', '2023-10-21', 65, 15, 'đặc biệt', 45, 'Funky graphic tee for fun-loving people.'),
(103, 'Graphic Tee 10', 33, 39, '/adminc4dcd578cfeab074f604940129ac0826.jpeg', '2023-10-21', 105, 15, 'đặc biệt', 85, 'Casual and stylish graphic tee.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `fk_comments_customer` (`id_customer`),
  ADD KEY `fk_product_comment` (`id_product`),
  ADD KEY `fk_comments_news` (`id_news`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id_coupon`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Chỉ mục cho bảng `order_payments`
--
ALTER TABLE `order_payments`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_order_payments_customer` (`customer_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_products_category` (`id_category`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=460;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id_coupon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `order_payments`
--
ALTER TABLE `order_payments`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comment_customer` FOREIGN KEY (`id_customer`) REFERENCES `Customer` (`id_customer`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comments_customer` FOREIGN KEY (`id_customer`) REFERENCES `Customer` (`id_customer`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comments_news` FOREIGN KEY (`id_news`) REFERENCES `news` (`id_news`),
  ADD CONSTRAINT `fk_comments_products` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_customer_comment` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_product_comment` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_payments`
--
ALTER TABLE `order_payments`
  ADD CONSTRAINT `fk_order_payments_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id_customer`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category_product` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`id_category`) REFERENCES `Category` (`id_category`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`id_category`) REFERENCES `Category` (`id_category`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
