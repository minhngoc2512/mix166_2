-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2017 at 07:45 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mix166-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `slug_name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Thùy Chi', 'Thuy-Chi', 'fileupload/image/Sat-05-2017-24-52-01.jpg', '2017-05-26 18:47:05', '2017-05-26 18:52:24'),
(2, 'Anh Khang', 'Anh-Khang', 'fileupload/image/Sat-05-2017-13-51-01.jpg', '2017-05-26 18:51:13', '2017-05-26 18:51:13'),
(3, 'Lou Hoàng Wiki', 'Lou-Hoang-Wiki', 'fileupload/image/Mon-05-2017-20-58-07.jpg', '2017-05-29 00:58:20', '2017-05-29 00:58:20'),
(4, 'Hòa Minzy', 'Hoa-Minzy', 'fileupload/image/Mon-05-2017-27-59-07.jpg', '2017-05-29 00:59:27', '2017-05-29 00:59:27'),
(5, '365 Fresh', '365-Fresh', 'fileupload/image/Mon-05-2017-31-00-08.jpg', '2017-05-29 01:00:31', '2017-05-29 01:00:31'),
(6, 'Rymastic', 'Rymastic', 'fileupload/image/Tue-05-2017-42-16-04.jpg', '2017-05-30 09:16:42', '2017-05-30 09:16:42'),
(7, 'OnlyC', 'OnlyC', 'fileupload/image/Tue-05-2017-23-18-04.jpg', '2017-05-30 09:18:23', '2017-05-30 09:18:23'),
(8, 'Sơn Tùng MTP', 'Son-Tung-MTP', 'fileupload/image/Tue-05-2017-46-24-04.jpg', '2017-05-30 09:24:46', '2017-05-30 09:24:46'),
(9, 'Sonbin Hoàng Sơn', 'Sonbin-Hoang-Son', 'fileupload/image/Tue-05-2017-17-42-04.jpg', '2017-05-30 09:42:17', '2017-05-30 09:42:17'),
(10, 'Ed Sheeran', 'Ed-Sheeran', 'fileupload/image/Wed-05-2017-52-22-04.jpg', '2017-05-31 09:22:52', '2017-05-31 09:22:52'),
(11, 'MIN, Mr. A', 'MIN,-Mr.-A', 'fileupload/image/Thu-06-2017-45-53-08.jpg', '2017-06-01 01:53:45', '2017-06-01 01:53:45'),
(12, 'Đàm Vĩnh Hưng', 'dam-Vinh-Hung', 'fileupload/image/Thu-06-2017-05-56-08.jpg', '2017-06-01 01:56:05', '2017-06-01 01:56:05'),
(13, 'Hà Anh Tuấn', 'Ha-Anh-Tuan', 'fileupload/image/Thu-06-2017-26-17-09.jpg', '2017-06-01 02:17:26', '2017-06-01 02:17:26'),
(14, 'Đông nhi', 'dong-nhi', 'fileupload/image/Fri-06-2017-55-21-03.jpg', '2017-06-08 20:21:55', '2017-06-08 20:21:55'),
(15, 'Lil K\'night', '-Lil-K-night', 'fileupload/image/Fri-06-2017-15-20-05.jpg', '2017-06-09 10:20:15', '2017-06-09 10:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'VIDEO', '2017-05-26 18:44:39', '2017-05-26 18:53:04'),
(2, 'MIXSET', '2017-05-26 18:53:16', '2017-05-26 18:53:16'),
(3, 'TRACKS', '2017-05-26 18:53:28', '2017-05-26 18:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image_video` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `artist_id` int(10) UNSIGNED NOT NULL,
  `genre_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` int(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `count_view` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `slug_name`, `path`, `path_image_video`, `category_id`, `artist_id`, `genre_id`, `user_id`, `status`, `created_at`, `updated_at`, `count_view`) VALUES
(3, 'Bản tình ca đầu tiên', 'Ban-tinh-ca-dau-tien', 'fileupload/file/Mon-05-2017-59-09-09-CoEmCho-MINMrA-4928094.mp3', NULL, 2, 1, 2, 1, 1, '2017-05-29 01:19:40', '2017-05-29 02:09:59', 4),
(4, 'Tìm một nửa cô đơn nửa cô đơn', 'Tim-mot-nua-co-don-nua-co-don', 'fileupload/file/Mon-05-2017-07-38-08-Tim Mot Nua Co Đon - Hoa Minzy (Official MV).mp4', 'fileupload/image/Fri-06-2017-18-44-02-video.jpg', 1, 4, 3, 1, 1, '2017-05-29 01:38:07', '2017-06-01 19:44:18', 18),
(5, 'Đã từng vô giá', 'da-tung-vo-gia', 'fileupload/file/Mon-05-2017-39-39-08-DaTungVoGia-MrSiro-4891849.mp3', NULL, 2, 2, 3, 1, 1, '2017-05-29 01:39:39', '2017-06-09 02:10:39', 4),
(6, 'Có em chờ', 'Co-em-cho', 'fileupload/file/Mon-05-2017-07-40-08-CoEmCho-MINMrA-4928094.mp3', NULL, 2, 5, 3, 1, 1, '2017-05-29 01:40:07', '2017-05-29 01:40:07', 3),
(7, 'Giữ em đi', 'Giu-em-di', 'fileupload/file/Tue-05-2017-45-12-04-GiuEmDi-ThuyChi-3578043.mp3', NULL, 3, 1, 3, 1, 1, '2017-05-30 09:12:45', '2017-05-30 09:12:45', 1),
(8, 'Yêu 5', 'Yeu-5', 'fileupload/file/Tue-05-2017-19-17-04-Yeu-5-Rhymastic.mp3', NULL, 2, 6, 1, 1, 1, '2017-05-30 09:17:19', '2017-06-09 00:19:47', 13),
(10, 'Nơi này có em', 'Noi-nay-co-em', 'fileupload/file/Tue-05-2017-15-26-04-Noi-Nay-Co-Anh-Son-Tung-M-TP.mp3', NULL, 2, 8, 1, 1, 1, '2017-05-30 09:26:15', '2017-05-30 09:26:15', 2),
(11, 'Yêu là tha thu', 'Yeu-la-tha-thu', 'fileupload/file/Tue-05-2017-58-28-04-YeuLaThaThuEmChua18Ost-OnlyC-4885615.mp3', NULL, 2, 7, 1, 1, 1, '2017-05-30 09:28:58', '2017-05-30 09:28:58', 4),
(12, 'skd', 'skd', 'fileupload/file/Tue-05-2017-54-42-04-NoiTaChoEm-Will365-4928462.mp3', NULL, 2, 9, 2, 1, 1, '2017-05-30 09:42:54', '2017-06-09 10:35:37', 3),
(13, 'audio demo', 'audio-demo', 'fileupload/file/Tue-05-2017-20-43-04-CoEmCho-MINMrA-4928094.mp3', NULL, 2, 5, 4, 1, 0, '2017-05-30 09:43:20', '2017-06-09 02:11:01', 7),
(14, 'fdsg', 'fdsg', 'fileupload/file/Tue-05-2017-51-43-04-Co-Em-Cho-Min-MrA.mp3', NULL, 2, 3, 1, 1, 1, '2017-05-30 09:43:51', '2017-05-30 09:43:51', 10),
(15, 'Shape of you', 'Shape-of-you', 'fileupload/file/Wed-05-2017-54-23-04-Ed Sheeran - Shape of You [Official Video].mp4', 'fileupload/image/Fri-06-2017-17-34-02-video.jpg', 1, 10, 5, 1, 1, '2017-05-31 09:23:54', '2017-06-01 19:34:17', 19),
(16, 'Nơi này có em (MV)', 'Noi-nay-co-em-(MV)', 'fileupload/file/Thu-06-2017-57-54-07-NƠI NÀY CÓ ANH  OFFICIAL MUSIC VIDEO  SƠN TÙNG M-TP.mp4', 'fileupload/image/Fri-06-2017-48-34-02-video.jpg', 1, 8, 3, 1, 1, '2017-06-01 00:54:58', '2017-06-01 19:34:48', 15),
(18, 'kmoklmn', 'kmoklmn', 'fileupload/file/Thu-06-2017-39-33-08-Trinh Thang Binh - Em Đung Quay Ve Đay  Audio.mp4', 'fileupload/image/Thu-06-2017-39-33-08-video.jpg', 1, 8, 3, 1, 1, '2017-06-01 01:33:39', '2017-06-01 01:33:39', 10),
(19, 'klsjdldks', 'klsjdldks', 'fileupload/file/Thu-06-2017-02-37-08-BÍCH PHƯƠNG - Gui Anh Xa Nho [OFFICIAL MV].mp3', NULL, 2, 1, 3, 1, 1, '2017-06-01 01:37:02', '2017-06-01 01:37:02', 9),
(20, 'Kết Thúc để bắt đầu', 'Ket-Thuc-de-bat-dau', 'fileupload/file/Thu-06-2017-06-57-08-KetThucDeBatDau-DamVinhHungDuongTrieuVu-4940886.mp3', NULL, 2, 12, 3, 1, 1, '2017-06-01 01:57:06', '2017-06-01 02:00:15', 3),
(21, 'Tháng tư lời nói dối của em', 'Thang-tu-loi-noi-doi-cua-em', 'fileupload/file/Thu-06-2017-06-18-09-ThangTuLaLoiNoiDoiCuaEm-HaAnhTuan-4589176.mp3', NULL, 3, 13, 3, 1, 1, '2017-06-01 02:18:06', '2017-06-01 02:19:28', 34),
(22, 'Người', 'Nguoi', 'fileupload/file/Thu-06-2017-47-27-09-Nguoi-HaAnhTuan-4523536.mp3', NULL, 3, 13, 3, 1, 1, '2017-06-01 02:27:47', '2017-06-01 02:27:47', 7),
(23, 'Cơn mưa tình yêu', 'Con-mua-tinh-yeu', 'fileupload/file/Thu-06-2017-26-28-09-ConMuaTinhYeu-HaAnhTuanPhuongLi 3uj37.mp3', NULL, 3, 13, 3, 1, 1, '2017-06-01 02:28:26', '2017-06-01 02:28:26', 1),
(24, 'Bóng mưa', 'Bong-mua', 'fileupload/file/Thu-06-2017-13-33-09-BongMua-HaAnhTuan 3y9uc.mp3', NULL, 3, 13, 3, 1, 1, '2017-06-01 02:33:13', '2017-06-01 02:33:13', 1),
(25, 'Qua đêm nay', 'Qua-dem-nay', 'fileupload/file/Thu-06-2017-22-34-09-QuaDemNay-HaAnhTuanPhuongLinh-4086663.mp3', NULL, 3, 13, 3, 1, 1, '2017-06-01 02:34:22', '2017-06-01 02:34:22', 0),
(26, 'Mưa', 'Mua', 'fileupload/file/Thu-06-2017-16-35-09-Mua-ThuyChiNhomM4U 6myu.mp3', NULL, 3, 1, 3, 1, 1, '2017-06-01 02:35:16', '2017-06-01 02:35:16', 3),
(27, 'Xe đạp', 'Xe-dap', 'fileupload/file/Thu-06-2017-26-37-09-XeDap-M4U-ThuyChi jzsy.mp3', NULL, 3, 1, 3, 1, 1, '2017-06-01 02:37:26', '2017-06-01 02:37:26', 0),
(28, 'Quê nhà', 'Que-nha', 'fileupload/file/Thu-06-2017-10-40-09-QueNha-AnhKhangNgocAnh-4321467.mp3', NULL, 3, 2, 3, 1, 1, '2017-06-01 02:40:10', '2017-06-01 02:40:10', 1),
(29, 'Đừng hát khi buồn', 'dung-hat-khi-buon', 'fileupload/file/Thu-06-2017-39-40-09-DungHatKhiBuon-AnhKhangBangKieu-4321468.mp3', NULL, 3, 2, 3, 1, 1, '2017-06-01 02:40:39', '2017-06-01 02:40:39', 1),
(30, 'Ai khổ vì ai', 'Ai-kho-vi-ai', 'fileupload/file/Thu-06-2017-15-41-09-AiKhoViAi-AnhKhang-4321466.mp3', NULL, 3, 2, 1, 1, 1, '2017-06-01 02:41:15', '2017-06-01 02:41:15', 2),
(31, 'Còn nơi đó chờ em', 'Con-noi-do-cho-em', 'fileupload/file/Fri-06-2017-23-06-07-Con-Noi-Do-Cho-Em-Dong-Nhi.mp3', NULL, 3, 14, 3, 1, 1, '2017-06-09 00:06:23', '2017-06-09 00:06:23', 1),
(32, 'lkjmflkadsdflka', 'lkjmflkadsdflka', 'fileupload/file/Fri-06-2017-11-44-07-Co-Dieu-Gi-Sao-Khong-Noi-Cung-Anh-Trung-Quan-Idol.mp3', NULL, 3, 1, 5, 1, 1, '2017-06-09 00:44:11', '2017-06-09 01:42:24', 1),
(33, 'Hoa thơm bướm lượn', 'Hoa-thom-buom-luon', 'fileupload/file/Fri-06-2017-22-50-07-HoaThomBuomLuon-AnhKhang-4321477.mp3', NULL, 3, 2, 3, 1, 1, '2017-06-09 00:50:22', '2017-06-09 00:52:52', 2),
(34, 'Nhớ', 'Nho', 'fileupload/file/Fri-06-2017-13-16-09-Nho-AnhKhang 3h7af.mp3', NULL, 3, 2, 3, 10, 1, '2017-06-09 02:16:13', '2017-06-09 02:17:18', 1),
(35, 'Im Lặng', 'Im-Lang', 'fileupload/file/Fri-06-2017-54-24-05-ImLang-LiLKnightP.A-2455485.mp3', NULL, 2, 15, 6, 10, 1, '2017-06-09 10:24:54', '2017-06-09 10:34:13', 4),
(36, 'Ngọn nến trước gió', 'Ngon-nen-truoc-gio', 'fileupload/file/Fri-06-2017-25-25-05-NgonNenTruocGio-JustaTee-2440206.mp3', NULL, 2, 15, 6, 10, 1, '2017-06-09 10:25:25', '2017-06-09 10:34:14', 2),
(37, 'Đường về nhà', 'duong-ve-nha', 'fileupload/file/Fri-06-2017-07-26-05-DuongVeNha-LiLKnight-2819284.mp3', NULL, 2, 15, 6, 10, 1, '2017-06-09 10:26:07', '2017-06-09 10:34:16', 2),
(38, 'Vì điều gì phải rời xa', 'Vi-dieu-gi-phai-roi-xa', 'fileupload/file/Fri-06-2017-48-26-05-ViDieuGiPhaiRoiXa-UngDaiVeLiLKnight-3855243.mp3', NULL, 2, 15, 6, 10, 1, '2017-06-09 10:26:48', '2017-06-09 10:34:18', 2),
(39, 'Let Her Go', 'Let-Her-Go', 'fileupload/file/Fri-06-2017-27-17-08-Let-Her-Go-Ali-Hoang-Duong.mp3', NULL, 2, 10, 3, 10, 1, '2017-06-16 01:17:27', '2017-06-16 01:26:11', 2),
(40, 'Seen', 'Seen', 'fileupload/file/Fri-06-2017-20-27-08-Seen-Trinh-Thang-Binh.mp3', NULL, 2, 3, 3, 1, 1, '2017-06-16 01:27:20', '2017-06-16 01:27:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Classic', '2017-05-26 18:35:51', '2017-05-26 18:52:42'),
(2, 'Kpop', '2017-05-29 01:01:08', '2017-05-29 01:01:08'),
(3, 'Vpop', '2017-05-29 01:01:15', '2017-05-29 01:01:15'),
(4, 'Rock', '2017-05-29 01:01:23', '2017-05-29 01:01:23'),
(5, 'UK', '2017-05-31 09:23:08', '2017-05-31 09:23:08'),
(6, 'RAP', '2017-06-09 10:21:37', '2017-06-09 10:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2017_05_22_080828_create-categories-table', 1),
(25, '2017_05_22_080843_create-genres-table', 1),
(26, '2017_05_22_080855_create-artists-table', 1),
(27, '2017_05_22_092419_create-file-table', 1),
(28, '2017_05_22_093958_create-user-favorite-table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user-favorite`
--

CREATE TABLE `user-favorite` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user-favorite`
--

INSERT INTO `user-favorite` (`id`, `user_id`, `file_id`) VALUES
(1, 10, 21),
(2, 10, 24),
(3, 10, 26),
(4, 10, 4),
(5, 10, 13),
(6, 10, 19),
(7, 10, 6),
(8, 10, 12),
(9, 10, 16),
(10, 10, 10),
(11, 10, 18),
(12, 10, 30),
(13, 10, 7),
(14, 10, 20),
(15, 1, 31),
(16, 1, 23),
(17, 1, 16),
(18, 1, 15),
(19, 10, 35),
(20, 1, 39);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'minhngoc2512', 'minhngoc2512@yahoo.com', '$2y$10$Q8FqbV00vVf4Nwu7eTnJJOgDmCpIKlhEoURCpEBnoiM1f9lzeXJ.m', 1, 1, 'Xolr9XD8j4rOK8WwRzis070yzKvcfoFEnDfGUOJm94SBS0qiIeRyCZUGN0jR', '2017-05-27 09:00:44', '2017-05-27 09:00:44'),
(10, 'ngaoop0606', 'ngaoop0606@gmail.com', '$2y$10$ZD.bmIkDT/baxJksJjHf7e4T1oZP7Ny5S2tILcEee4tHoQ3ACU.22', 2, 1, 'SWfHIkCAXIGjH1eXHVt6Yd8fnH9qpslfFJKDZw8SYkut1EnSjN3QMgGQPORc', '2017-06-07 18:57:05', '2017-06-07 18:57:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_artist_id_foreign` (`artist_id`),
  ADD KEY `files_genre_id_foreign` (`genre_id`),
  ADD KEY `files_category_id_foreign` (`category_id`),
  ADD KEY `files_user_id_foreign` (`user_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `user-favorite`
--
ALTER TABLE `user-favorite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_favorite_user_id_foreign` (`user_id`),
  ADD KEY `user_favorite_file_id_foreign` (`file_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user-favorite`
--
ALTER TABLE `user-favorite`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`),
  ADD CONSTRAINT `files_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `files_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user-favorite`
--
ALTER TABLE `user-favorite`
  ADD CONSTRAINT `user_favorite_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`),
  ADD CONSTRAINT `user_favorite_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
