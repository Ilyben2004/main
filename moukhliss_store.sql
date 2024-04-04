-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 01:24 AM
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
-- Database: `moukhliss_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `Category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `Category_name`) VALUES
(1, 'Protein Supplements'),
(2, 'Pre-Workout Boosters'),
(3, 'Post-Workout Recovery'),
(4, 'Amino Acid Supplements'),
(5, 'Weight Management'),
(6, 'Vitamins and Minerals'),
(7, 'Joint Support');

-- --------------------------------------------------------

--
-- Table structure for table `icon_order`
--

CREATE TABLE `icon_order` (
  `id_icon` int(11) NOT NULL,
  `icon` varchar(2000) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `icon_order`
--

INSERT INTO `icon_order` (`id_icon`, `icon`, `status`) VALUES
(1, '<svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><g id=\"SVGRepo_bgCarrier\" stroke-width=\"0\"></g><g id=\"SVGRepo_tracerCarrier\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></g><g id=\"SVGRepo_iconCarrier\"> <path d=\"M9 10L12.2581 12.4436C12.6766 12.7574 13.2662 12.6957 13.6107 12.3021L20 5\" stroke=\"#33363F\" stroke-width=\"2\" stroke-linecap=\"round\"></path> <path d=\"M21 12C21 13.8805 20.411 15.7137 19.3156 17.2423C18.2203 18.7709 16.6736 19.9179 14.893 20.5224C13.1123 21.1268 11.187 21.1583 9.38744 20.6125C7.58792 20.0666 6.00459 18.9707 4.85982 17.4789C3.71505 15.987 3.06635 14.174 3.00482 12.2945C2.94329 10.415 3.47203 8.56344 4.51677 6.99987C5.56152 5.4363 7.06979 4.23925 8.82975 3.57685C10.5897 2.91444 12.513 2.81996 14.3294 3.30667\" stroke=\"#33363F\" stroke-width=\"2\" stroke-linecap=\"round\"></path> </g></svg>', 'Completed'),
(2, '<svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><g id=\"SVGRepo_bgCarrier\" stroke-width=\"0\"></g><g id=\"SVGRepo_tracerCarrier\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></g><g id=\"SVGRepo_iconCarrier\"> <path d=\"M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM3.00683 12C3.00683 16.9668 7.03321 20.9932 12 20.9932C16.9668 20.9932 20.9932 16.9668 20.9932 12C20.9932 7.03321 16.9668 3.00683 12 3.00683C7.03321 3.00683 3.00683 7.03321 3.00683 12Z\" fill=\"#0F0F0F\"></path> <path d=\"M12 5C11.4477 5 11 5.44771 11 6V12.4667C11 12.4667 11 12.7274 11.1267 12.9235C11.2115 13.0898 11.3437 13.2343 11.5174 13.3346L16.1372 16.0019C16.6155 16.278 17.2271 16.1141 17.5032 15.6358C17.7793 15.1575 17.6155 14.5459 17.1372 14.2698L13 11.8812V6C13 5.44772 12.5523 5 12 5Z\" fill=\"#0F0F0F\"></path> </g></svg>', 'Pending'),
(3, '<svg width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><g id=\"SVGRepo_bgCarrier\" stroke-width=\"0\"></g><g id=\"SVGRepo_tracerCarrier\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></g><g id=\"SVGRepo_iconCarrier\"> <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M1 6C1 4.89543 1.89543 4 3 4H14C15.1046 4 16 4.89543 16 6V7H19C21.2091 7 23 8.79086 23 11V12V15V17C23.5523 17 24 17.4477 24 18C24 18.5523 23.5523 19 23 19H22H18.95C18.9828 19.1616 19 19.3288 19 19.5C19 20.8807 17.8807 22 16.5 22C15.1193 22 14 20.8807 14 19.5C14 19.3288 14.0172 19.1616 14.05 19H7.94999C7.98278 19.1616 8 19.3288 8 19.5C8 20.8807 6.88071 22 5.5 22C4.11929 22 3 20.8807 3 19.5C3 19.3288 3.01722 19.1616 3.05001 19H2H1C0.447715 19 0 18.5523 0 18C0 17.4477 0.447715 17 1 17V6ZM16.5 19C16.2239 19 16 19.2239 16 19.5C16 19.7761 16.2239 20 16.5 20C16.7761 20 17 19.7761 17 19.5C17 19.2239 16.7761 19 16.5 19ZM16.5 17H21V15V13H19C18.4477 13 18 12.5523 18 12C18 11.4477 18.4477 11 19 11H21C21 9.89543 20.1046 9 19 9H16V17H16.5ZM14 17H5.5H3V6H14V8V17ZM5 19.5C5 19.2239 5.22386 19 5.5 19C5.77614 19 6 19.2239 6 19.5C6 19.7761 5.77614 20 5.5 20C5.22386 20 5 19.7761 5 19.5Z\" fill=\"#000000\"></path> </g></svg>', 'Delevring'),
(4, '<svg width=\"24\" height=\"24\" fill=\"#000000\" viewBox=\"0 0 32 32\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\"><g id=\"SVGRepo_bgCarrier\" stroke-width=\"0\"></g><g id=\"SVGRepo_tracerCarrier\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></g><g id=\"SVGRepo_iconCarrier\"> <title>cancel</title> <path d=\"M10.771 8.518c-1.144 0.215-2.83 2.171-2.086 2.915l4.573 4.571-4.573 4.571c-0.915 0.915 1.829 3.656 2.744 2.742l4.573-4.571 4.573 4.571c0.915 0.915 3.658-1.829 2.744-2.742l-4.573-4.571 4.573-4.571c0.915-0.915-1.829-3.656-2.744-2.742l-4.573 4.571-4.573-4.571c-0.173-0.171-0.394-0.223-0.657-0.173v0zM16 1c-8.285 0-15 6.716-15 15s6.715 15 15 15 15-6.716 15-15-6.715-15-15-15zM16 4.75c6.213 0 11.25 5.037 11.25 11.25s-5.037 11.25-11.25 11.25-11.25-5.037-11.25-11.25c0.001-6.213 5.037-11.25 11.25-11.25z\"></path> </g></svg>', 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likedproducts`
--

CREATE TABLE `likedproducts` (
  `idUser` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `dateLike` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likedproducts`
--

INSERT INTO `likedproducts` (`idUser`, `idProduct`, `dateLike`) VALUES
(2, 40, '2023-12-01'),
(3, 33, '2023-12-01'),
(3, 35, '2024-01-19'),
(1, 35, '2024-03-19'),
(1, 63, '2024-03-20'),
(1, 34, '2024-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `from`, `to`) VALUES
(120, 'hey', 1, 0),
(121, 'hrllo', 0, 1),
(122, 'howa', 1, 0),
(123, 'test message', 0, 1),
(124, 'test response ', 1, 0),
(125, 'fvfvfv', 3, 0),
(126, 'fvfvfv', 0, 3),
(127, 'heey', 4, 0),
(128, 'hello response', 0, 4),
(129, 'test message', 1, 0),
(130, 'test response', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `message` varchar(3000) NOT NULL,
  `dateMessage` datetime DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `readed` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `dateMessage`, `type`, `readed`) VALUES
(6, 'the command passed by Arafat has been confirmed ', '2024-01-14 20:38:05', 'command', 1),
(7, 'the command passed by Arafat has been confirmed ', '2024-01-14 21:19:59', 'command', 1),
(8, ' A new command is passed by Arafat', '2024-01-14 21:41:10', 'command', 1),
(9, 'the command passed by Arafat has been cancelled ', '2024-01-14 21:48:09', 'command', 1),
(10, 'the command passed by  has been confirmed ', '2024-01-14 22:39:33', 'command', 1),
(11, ' A new command is passed by Arafat', '2024-01-14 22:39:33', 'command', 1),
(12, ' The product Post-Workout Recovery Shake with the id 30 is alomost finished its still only 3 piece', '2024-01-14 22:41:12', 'product', 1),
(13, ' A new command is passed by Arafat', '2024-01-14 22:41:12', 'command', 1),
(14, ' The product Post-Workout Recovery Shake with the id 30 is alomost finished its still only 2 piece', '2024-01-14 22:43:11', 'product', 1),
(15, ' A new command is passed by Arafat', '2024-01-14 22:43:11', 'command', 1),
(16, ' The product Calcium and Vitamin D Tablets with the id 45 is  finished', '2024-01-14 22:44:59', 'product', 1),
(17, ' A new command is passed by Arafat', '2024-01-14 22:44:59', 'command', 1),
(18, ' The product Foam Yoga Blocks with the id 69 is alomost finished its still only 44 piece', '2024-01-19 01:50:11', 'product', 1),
(19, ' A new command is passed by Arafat', '2024-01-19 01:50:11', 'command', 1),
(20, 'the command passed by Arafat has been confirmed ', '2024-01-23 15:32:04', 'command', 1),
(21, ' The product Sleep Support Supplement with the id 40 is alomost finished its still only 29 piece', '2024-01-25 02:39:17', 'product', 1),
(22, ' A new command is passed by Arafat', '2024-01-25 02:39:17', 'command', 1),
(23, 'the command passed by Arafat has been cancelled ', '2024-01-25 02:44:36', 'command', 1),
(24, ' The product Mass Gainer with the id 32 is alomost finished its still only 9 piece', '2024-01-27 01:44:21', 'product', 1),
(25, ' The product Omega-3 Fish Oil with the id 33 is alomost finished its still only 48 piece', '2024-01-27 01:44:21', 'product', 1),
(26, ' The product Vitamin C Tablets with the id 35 is alomost finished its still only 28 piece', '2024-01-27 01:44:21', 'product', 1),
(27, ' The product Energy Bars g with the id 37 is alomost finished its still only 21 piece', '2024-01-27 01:44:21', 'product', 1),
(28, ' The product Multivitamin Capsules with the id 38 is alomost finished its still only 49 piece', '2024-01-27 01:44:21', 'product', 1),
(29, ' The product Sleep Support Supplement with the id 40 is alomost finished its still only 28 piece', '2024-01-27 01:44:21', 'product', 1),
(30, ' The product Water Bottle with Infuser with the id 52 is alomost finished its still only 15 piece', '2024-01-27 01:44:21', 'product', 1),
(31, ' The product Resistance Tubes Set with the id 75 is alomost finished its still only 8 piece', '2024-01-27 01:44:21', 'product', 1),
(32, ' A new command is passed by Arafat', '2024-01-27 01:44:21', 'command', 1),
(33, 'the command passed by Arafat has been confirmed ', '2024-01-27 01:48:17', 'command', 1),
(34, ' A new command is passed by Arafat', '2024-01-27 03:10:59', 'command', 1),
(35, ' A new command is passed by ss', '2024-02-01 11:27:03', 'command', 1),
(36, ' A new command is passed by ss', '2024-02-01 11:30:39', 'command', 1),
(37, ' A new command is passed by ss', '2024-02-01 11:32:03', 'command', 1),
(38, ' The product Yoga Mat with the id 50 is alomost finished its still only 42 piece', '2024-02-01 11:33:37', 'product', 1),
(39, ' A new command is passed by Arafat', '2024-02-01 11:33:37', 'command', 1),
(40, ' The product Mass Gainer with the id 32 is alomost finished its still only 8 piece', '2024-02-02 14:16:18', 'product', 1),
(41, ' The product Omega-3 Fish Oil with the id 33 is alomost finished its still only 47 piece', '2024-02-02 14:16:18', 'product', 1),
(42, ' The product Vitamin C Tablets with the id 35 is alomost finished its still only 27 piece', '2024-02-02 14:16:18', 'product', 1),
(43, ' The product Multivitamin Capsules with the id 38 is alomost finished its still only 48 piece', '2024-02-02 14:16:18', 'product', 1),
(44, ' The product Sleep Support Supplement with the id 40 is alomost finished its still only 27 piece', '2024-02-02 14:16:18', 'product', 1),
(45, ' The product Yoga Mat with the id 50 is alomost finished its still only 41 piece', '2024-02-02 14:16:18', 'product', 1),
(46, ' The product Water Bottle with Infuser with the id 52 is alomost finished its still only 14 piece', '2024-02-02 14:16:18', 'product', 1),
(47, ' The product Resistance Tubes Set with the id 75 is alomost finished its still only 7 piece', '2024-02-02 14:16:18', 'product', 1),
(48, ' A new command is passed by Arafat', '2024-02-02 14:16:18', 'command', 1),
(49, ' The product Mass Gainer with the id 32 is alomost finished its still only 7 piece', '2024-02-03 04:04:33', 'product', 1),
(50, ' The product Omega-3 Fish Oil with the id 33 is alomost finished its still only 46 piece', '2024-02-03 04:04:33', 'product', 1),
(51, ' The product Vitamin C Tablets with the id 35 is alomost finished its still only 26 piece', '2024-02-03 04:04:33', 'product', 1),
(52, ' The product Sleep Support Supplement with the id 40 is alomost finished its still only 26 piece', '2024-02-03 04:04:33', 'product', 1),
(53, ' A new command is passed by Arafat', '2024-02-03 04:04:33', 'command', 1),
(54, ' The product Omega-3 Fish Oil with the id 33 is alomost finished its still only 45 piece', '2024-02-03 16:43:39', 'product', 1),
(55, ' A new command is passed by Arafat', '2024-02-03 16:43:39', 'command', 1),
(56, ' The product Omega-3 Fish Oil with the id 33 is alomost finished its still only 43 piece', '2024-02-03 16:46:21', 'product', 1),
(57, ' The product Sleep Support Supplement with the id 40 is alomost finished its still only 23 piece', '2024-02-03 16:46:21', 'product', 1),
(58, ' A new command is passed by Arafat', '2024-02-03 16:46:21', 'command', 1),
(59, ' The product Vitamin C Tablets with the id 35 is alomost finished its still only 25 piece', '2024-02-03 16:48:31', 'product', 1),
(60, ' A new command is passed by Arafat', '2024-02-03 16:48:31', 'command', 1),
(61, 'the command passed by Arafat has been confirmed ', '2024-02-03 16:50:03', 'command', 1),
(62, 'the command passed by Arafat has been confirmed ', '2024-02-03 16:52:44', 'command', 1),
(63, 'the command passed by Arafat has been confirmed ', '2024-02-05 14:47:56', 'command', 1),
(64, 'the command passed by Arafat has been confirmed ', '2024-02-08 11:54:10', 'command', 1),
(65, ' The product Omega-3 Fish Oil with the id 33 is alomost finished its still only 42 piece', '2024-02-08 13:09:42', 'product', 1),
(66, ' The product Vitamin C Tablets with the id 35 is alomost finished its still only 24 piece', '2024-02-08 13:09:42', 'product', 1),
(67, ' The product Multivitamin Capsules with the id 38 is alomost finished its still only 43 piece', '2024-02-08 13:09:42', 'product', 1),
(68, ' The product Sleep Support Supplement with the id 40 is alomost finished its still only 22 piece', '2024-02-08 13:09:42', 'product', 1),
(69, ' The product Meal Replacement Shake with the id 42 is alomost finished its still only 49 piece', '2024-02-08 13:09:42', 'product', 1),
(70, ' The product Meale Replacement Powder with the id 64 is alomost finished its still only 19 piece', '2024-02-08 13:09:42', 'product', 1),
(71, ' A new command is passed by Arafat', '2024-02-08 13:09:42', 'command', 1),
(72, 'the command passed by Arafat has been confirmed ', '2024-02-12 14:37:24', 'command', 1),
(73, 'the command passed by Arafat has been confirmed ', '2024-02-12 18:43:32', 'command', 1),
(74, ' The product Mass Gainer with the id 32 is alomost finished its still only 5 piece', '2024-02-20 14:38:19', 'product', 1),
(75, ' The product Omega-3 Fish Oil with the id 33 is alomost finished its still only 37 piece', '2024-02-20 14:38:19', 'product', 1),
(76, ' The product Vitamin C Tablets with the id 35 is alomost finished its still only 23 piece', '2024-02-20 14:38:19', 'product', 1),
(77, ' The product Multivitamin Capsules with the id 38 is alomost finished its still only 38 piece', '2024-02-20 14:38:19', 'product', 1),
(78, ' The product Sleep Support Supplement with the id 40 is alomost finished its still only 21 piece', '2024-02-20 14:38:19', 'product', 1),
(79, ' The product Meal Replacement Shake with the id 42 is alomost finished its still only 48 piece', '2024-02-20 14:38:19', 'product', 1),
(80, ' The product Yoga Mat with the id 50 is alomost finished its still only 40 piece', '2024-02-20 14:38:19', 'product', 1),
(81, ' The product Water Bottle with Infuser with the id 52 is alomost finished its still only 13 piece', '2024-02-20 14:38:19', 'product', 1),
(82, ' The product Weighted Vest with the id 55 is alomost finished its still only 19 piece', '2024-02-20 14:38:19', 'product', 1),
(83, ' The product Meale Replacement Powder with the id 64 is alomost finished its still only 18 piece', '2024-02-20 14:38:19', 'product', 1),
(84, ' The product Running Belt with the id 67 is alomost finished its still only 14 piece', '2024-02-20 14:38:19', 'product', 1),
(85, ' The product Protein Pancake Mix with the id 71 is alomost finished its still only 16 piece', '2024-02-20 14:38:19', 'product', 1),
(86, ' A new command is passed by Arafat', '2024-02-20 14:38:19', 'command', 1),
(87, 'the command passed by Arafat has been confirmed ', '2024-02-20 14:53:33', 'command', 1),
(88, 'the command passed by Arafat has been confirmed ', '2024-02-20 16:23:05', 'command', 1),
(89, ' The product Mass Gainer with the id 32 is alomost finished its still only 4 piece', '2024-02-22 15:24:39', 'product', 1),
(90, ' The product Omega-3 Fish Oil with the id 33 is alomost finished its still only 36 piece', '2024-02-22 15:24:39', 'product', 1),
(91, ' The product Vitamin C Tablets with the id 35 is alomost finished its still only 22 piece', '2024-02-22 15:24:39', 'product', 1),
(92, ' The product Multivitamin Capsules with the id 38 is alomost finished its still only 37 piece', '2024-02-22 15:24:39', 'product', 1),
(93, ' The product Sleep Support Supplement with the id 40 is alomost finished its still only 20 piece', '2024-02-22 15:24:39', 'product', 1),
(94, ' The product Meal Replacement Shake with the id 42 is alomost finished its still only 47 piece', '2024-02-22 15:24:39', 'product', 1),
(95, ' The product Resistance Bands Set with the id 48 is alomost finished its still only 12 piece', '2024-02-22 15:24:39', 'product', 1),
(96, ' The product Yoga Mat with the id 50 is alomost finished its still only 39 piece', '2024-02-22 15:24:39', 'product', 1),
(97, ' The product Water Bottle with Infuser with the id 52 is alomost finished its still only 12 piece', '2024-02-22 15:24:39', 'product', 1),
(98, ' A new command is passed by Arafat', '2024-02-22 15:24:39', 'command', 1),
(99, 'the command passed by Arafat has been confirmed ', '2024-02-22 15:38:06', 'command', 1),
(100, ' The product Omega-3 Fish Oil with the id 33 is alomost finished its still only 33 piece', '2024-03-19 12:52:06', 'product', 1),
(101, ' The product Vitamin C Tablets with the id 35 is alomost finished its still only 19 piece', '2024-03-19 12:52:06', 'product', 1),
(102, ' A new command is passed by Arafat', '2024-03-19 12:52:06', 'command', 1),
(103, 'the command passed by Arafat has been confirmed ', '2024-03-19 13:12:32', 'command', 1),
(104, 'the command passed by Arafat has been cancelled ', '2024-03-19 23:10:43', 'command', 1),
(105, ' The product Vitamin C Tablets with the id 35 is alomost finished its still only 18 piece', '2024-03-20 01:48:16', 'product', 1),
(106, ' The product Multivitamin Capsules with the id 38 is alomost finished its still only 36 piece', '2024-03-20 01:48:16', 'product', 1),
(107, ' The product Post-Workout Protein Shake with the id 63 is alomost finished its still only 18 piece', '2024-03-20 01:48:16', 'product', 1),
(108, ' A new command is passed by Arafat', '2024-03-20 01:48:16', 'command', 1),
(109, 'the command passed by Arafat has been confirmed ', '2024-03-20 13:30:04', 'command', 1),
(110, ' The product Vitamin C Tablets with the id 35 is alomost finished its still only 17 piece', '2024-03-20 14:11:41', 'product', 1),
(111, ' The product Multivitamin Capsules with the id 38 is alomost finished its still only 35 piece', '2024-03-20 14:11:41', 'product', 1),
(112, ' The product Post-Workout Protein Shake with the id 63 is alomost finished its still only 16 piece', '2024-03-20 14:11:41', 'product', 1),
(113, ' A new command is passed by Arafat', '2024-03-20 14:11:41', 'command', 1),
(114, 'the command passed by Arafat has been confirmed ', '2024-03-20 14:16:37', 'command', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `ordate` date NOT NULL,
  `dilivredate` date NOT NULL,
  `adress` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `STATUS`, `ordate`, `dilivredate`, `adress`) VALUES
(1, 1, 'Completed', '2023-12-01', '2023-12-05', NULL),
(2, 1, 'Completed', '2023-12-05', '2023-12-06', NULL),
(3, 4, 'Completed', '2023-12-10', '2023-12-14', NULL),
(4, 3, 'Completed', '2023-12-13', '2023-12-14', NULL),
(5, 4, 'Completed', '2023-12-06', '2023-12-14', NULL),
(6, 1, 'Completed', '2023-12-15', '2023-12-20', NULL),
(7, 1, 'Completed', '2023-12-15', '2023-12-20', NULL),
(8, 1, 'Completed', '2024-01-09', '2024-01-14', NULL),
(9, 1, 'Completed', '2024-01-11', '2024-01-16', NULL),
(10, 1, 'Completed', '2024-01-11', '2024-01-16', NULL),
(11, 1, 'Completed', '2024-01-11', '2024-01-16', NULL),
(12, 1, 'Completed', '2024-01-11', '2024-01-16', 'hahahah adresse'),
(13, 1, 'Completed', '2024-01-14', '2024-01-19', 'djcjd dj djc dj dcj dc'),
(14, 1, 'Completed', '2024-01-14', '2024-01-19', 'casa rahma'),
(15, 1, 'Completed', '2024-01-14', '2024-01-19', 'scbsc sjc sjcs cjs cjs c'),
(16, 1, 'Completed', '2024-01-14', '2024-01-19', 'djcndjc djc djc djc djc dcjd cd cjdc jd'),
(17, 1, 'Completed', '2024-01-14', '2024-01-19', 'jfj vfj vfjv '),
(18, 1, 'Completed', '2024-01-14', '2024-01-19', 'casa blanca wj e ed eded '),
(19, 1, 'Completed', '2024-01-14', '2024-01-19', 'd'),
(20, 1, 'Completed', '2024-01-14', '2024-01-19', 'fv fvnfv fv'),
(21, 1, 'Completed', '2024-01-14', '2024-01-19', 'vdd'),
(22, 1, 'Completed', '2024-01-14', '2024-01-19', 'jcnd cjdc'),
(23, 1, 'Completed', '2024-01-14', '2024-01-19', 'djn dcjd cjd cdjc '),
(24, 1, 'Completed', '2024-01-14', '2024-01-19', 'dhc d'),
(25, 1, 'Completed', '2024-01-14', '2024-01-19', 'JD CDJC D'),
(26, 1, 'Completed', '2024-01-14', '2024-01-19', 'D DHCD CH'),
(27, 1, 'Completed', '2024-01-19', '2024-01-24', 'ddccd'),
(28, 1, 'Completed', '2024-01-25', '2024-01-30', 'jhu hj'),
(29, 1, 'Completed', '2024-01-27', '2024-02-01', 'bengrir '),
(30, 1, 'Completed', '2024-01-27', '2024-02-01', 'h'),
(31, 1, 'Completed', '2024-02-01', '2024-02-06', 'srdtfygui'),
(32, 1, 'Completed', '2024-02-02', '2024-02-07', 'jnjnijnn'),
(33, 1, 'Completed', '2024-02-03', '2024-02-08', 'dcmkdcd dck dcdckdc dck dc'),
(34, 1, 'Completed', '2024-02-03', '2024-02-08', 'usSGULASGUASV ASASGVASV ASVI'),
(35, 1, 'Completed', '2024-02-03', '2024-02-08', 'QWERTYUIOP XEASGVH  VGFTDD '),
(36, 1, 'Completed', '2024-02-03', '2024-02-08', 'FGYU'),
(37, 1, 'Completed', '2024-02-08', '2024-02-13', 'ffff'),
(38, 1, 'Completed', '2024-02-20', '2024-02-25', 'adresse test'),
(39, 1, 'Completed', '2024-02-22', '2024-02-27', 'sjsc sx sjx sjx sx'),
(40, 1, 'Completed', '2024-03-19', '2024-03-24', 'ials  sans asnas nsa s'),
(41, 1, 'Completed', '2024-03-20', '2024-03-25', 'JDJND DJ ND ND ND '),
(42, 1, 'Pending', '2024-03-20', '2024-03-25', 'hsx sxjsb sxjs xsx sjx ');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id_order`, `id_product`, `quantity`) VALUES
(1, 33, 7),
(2, 34, 1),
(2, 40, 3),
(4, 35, 10),
(8, 38, 9),
(8, 55, 3),
(9, 33, 1),
(9, 38, 9),
(9, 48, 1),
(9, 52, 1),
(9, 71, 1),
(12, 33, 1),
(12, 38, 1),
(12, 48, 1),
(12, 52, 1),
(13, 34, 5),
(15, 35, 1),
(16, 50, 1),
(18, 50, 1),
(20, 55, 3),
(21, 35, 1),
(22, 34, 1),
(26, 45, 2),
(28, 40, 1),
(29, 33, 1),
(29, 34, 1),
(29, 35, 1),
(29, 38, 1),
(29, 40, 1),
(29, 52, 1),
(0, 34, 1),
(0, 34, 1),
(31, 50, 1),
(32, 33, 1),
(32, 34, 1),
(32, 35, 1),
(32, 38, 1),
(32, 40, 1),
(32, 50, 1),
(32, 52, 1),
(33, 33, 1),
(33, 34, 1),
(33, 35, 1),
(33, 40, 1),
(34, 33, 1),
(34, 34, 1),
(35, 33, 2),
(35, 40, 3),
(36, 35, 1),
(37, 33, 1),
(37, 34, 1),
(37, 35, 1),
(37, 38, 5),
(37, 40, 1),
(37, 42, 1),
(37, 45, 1),
(37, 64, 1),
(38, 33, 5),
(38, 34, 1),
(38, 35, 1),
(38, 38, 5),
(38, 40, 1),
(38, 42, 1),
(38, 45, 1),
(38, 50, 1),
(38, 52, 1),
(38, 55, 1),
(38, 64, 1),
(38, 67, 1),
(38, 71, 1),
(39, 33, 1),
(39, 34, 1),
(39, 35, 1),
(39, 38, 1),
(39, 40, 1),
(39, 42, 1),
(39, 45, 1),
(39, 48, 1),
(39, 50, 1),
(39, 52, 1),
(39, 55, 1),
(40, 33, 3),
(40, 34, 3),
(40, 35, 3),
(41, 34, 1),
(41, 35, 1),
(41, 38, 1),
(41, 55, 1),
(41, 63, 1),
(42, 34, 1),
(42, 35, 1),
(42, 38, 1),
(42, 63, 2);

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `DESCREPTION` varchar(1000) NOT NULL,
  `PRIX` double NOT NULL,
  `id_category` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `image_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `DESCREPTION`, `PRIX`, `id_category`, `Quantity`, `image_file`) VALUES
(33, 'Omega-3 Fish Oil', 'Promotes joint health and reduces inflammation.', 399.95, 1, 33, '113.png'),
(34, 'Joint Support Supplement', 'Formulated to support joint flexibility and reduce discomfort.        ', 349.99, 3, 94, '114.png'),
(35, 'Vitamin C Tablets', 'Boosts immune system and supports overall health.', 419.5, 2, 17, '115.png'),
(38, 'Multivitamin Capsules', 'Covers essential vitamins and minerals for daily health.', 399.75, 2, 35, '118.png'),
(40, 'Sleep Support Supplement', 'Promotes restful sleep and recovery.', 349.99, 3, 20, '120.png'),
(42, 'Meal Replacement Shake', 'Helps manage weight while providing essential nutrients.', 399.5, 4, 47, '1.png'),
(45, 'Calcium and Vitamin D Tablets', 'Supports bone health and calcium absorption.            ', 329.99, 1, 56, '4.png'),
(48, 'Resistance Bands Set', 'Ideal for various exercises to improve strength and flexibility.', 349.5, 4, 12, '7.png'),
(50, 'Yoga Mat', 'Perfect for yoga and stretching exercises.', 369.75, 6, 39, '9.png'),
(52, 'Water Bottle with Infuser', 'Allows infusing fruits for flavored water intake.', 399.75, 4, 12, '11.png'),
(55, 'Weighted Vest', 'Adds resistance to workouts for increased intensity.', 499.5, 7, 98, '14.png'),
(63, 'Post-Workout Protein Shake', 'Fast-absorbing protein for muscle repair after workouts.            ', 460.95, 1, 100, 'PreWorkout-PC-front-opt_1200x.png'),
(64, 'Meale Replacement Powder', 'Balanced nutrition for meal replacement and weight management.\r\n    ', 329.99, 4, 18, '139.png'),
(67, 'Running Belt', 'Comfortable belt for carrying essentials during workouts.', 349.5, 7, 14, '142.png'),
(68, 'Resistance Loop Bands', 'Great for various exercises targeting different muscle groups.', 419.25, 1, 35, '143.png'),
(71, 'Protein Pancake Mix', 'High-protein mix for a nutritious breakfast or snack.', 399.75, 4, 16, '146.png'),
(74, 'Weighted Hula Hoop', 'Fun workout tool for core strengthening and burning calories.', 499.5, 1, 100, '149.png'),
(89, 'hello <script> console.log(\"zeeeeb hahahahahaha \");</script>', 'jncjdc', 100, 4, 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `FN` varchar(100) NOT NULL,
  `LN` varchar(100) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD_USER` varchar(100) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `IS_ADMIN` int(1) NOT NULL DEFAULT 0,
  `SignUpDate` date DEFAULT NULL,
  `BornDate` date DEFAULT NULL,
  `Suspended` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FN`, `LN`, `USERNAME`, `EMAIL`, `PASSWORD_USER`, `genre`, `IS_ADMIN`, `SignUpDate`, `BornDate`, `Suspended`) VALUES
(1, 'yassine', 'aboualanoire', 'Arafat', 'ilyasbennajeh@gmail.com', '1234', 'male', 0, '2024-01-23', '2023-10-11', 0),
(2, 'jji', 'jnj', 'ilyben04', 'n@gmail.com', '1234', '', 1, '2022-12-10', '2014-01-08', 0),
(3, 'Fatouma', 'Responsable', 'Fatouma', 'ilyasbennajeh@gmail.com', '1234', 'female', 0, '2023-12-19', '2024-01-02', 0),
(4, 'Hamza ', 'Benchaoui', 'Hemza', 'ilyasbennajeh@gmail.com', '1234', '', 0, '2023-12-06', '2001-01-24', 0),
(9, 'dbd', 'dch dc', 'dcvdmd', 'ilasha@gmail.com', '1234', 'male', 0, '2024-01-25', '2003-01-25', 0),
(10, 'ss', 'ss', 'ss', 'sool0118ao@gmail.com', '1234', 'female', 0, '2024-02-01', '2004-05-12', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likedproducts`
--
ALTER TABLE `likedproducts`
  ADD KEY `likedproducts_foreign_idproducts` (`idProduct`),
  ADD KEY `likedproducts_foreign_iduser` (`idUser`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ORDER_foreign_iduser` (`id_user`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD KEY `ORDERPRODUCTS_foreign_idorder` (`id_product`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_user`,`id_product`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likedproducts`
--
ALTER TABLE `likedproducts`
  ADD CONSTRAINT `likedproducts_foreign_idproducts` FOREIGN KEY (`idProduct`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likedproducts_foreign_iduser` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `ORDER_foreign_iduser` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `ORDERPRODUCTS_foreign_idorder` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
