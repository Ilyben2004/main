-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 09:52 PM
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
(7, 'Joint Support'),
(25, 'rajaaa');

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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `ordate` date NOT NULL,
  `dilivredate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `STATUS`, `ordate`, `dilivredate`) VALUES
(1, 1, 'Completed', '2023-12-01', '2023-12-05'),
(2, 1, 'Completed', '2023-12-05', '2023-12-06'),
(3, 4, 'Completed', '2023-12-10', '2023-12-14'),
(4, 3, 'Completed', '2023-12-13', '2023-12-14');

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
(1, 30, 9),
(1, 33, 7),
(2, 34, 1),
(2, 40, 3),
(3, 30, 1),
(3, 31, 1),
(4, 28, 6);

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
(30, 'Post-Workout Recovery Shake', 'Formulated to speed up recovery and replenish nutrients after workouts.', 459.5, 3, 10, '110.png'),
(31, 'Creatine Monohydrate', 'Improves strength and power during high-intensity workouts.', 329.75, 1, 9, '111.png'),
(32, 'Mass Gainer', 'Supports weight gain and muscle development for hardgainers.', 389, 2, 9, '112.png'),
(33, 'Omega-3 Fish Oil', 'Promotes joint health and reduces inflammation.', 399.95, 1, 51, '113.png'),
(34, 'Joint Support Supplement', 'Formulated to support joint flexibility and reduce discomfort.', 349.99, 3, 7, '114.png'),
(35, 'Vitamin C Tablets', 'Boosts immune system and supports overall health.', 419.5, 2, 31, '115.png'),
(37, 'Energy Bars', 'Provides quick energy during workouts or as a snack.', 449, 3, 28, '117.png'),
(38, 'Multivitamin Capsules', 'Covers essential vitamins and minerals for daily health.', 399.75, 2, 18, '118.png'),
(39, 'Green Tea Extract', 'Supports metabolism and aids in weight management.', 479.9, 1, 22, '119.png'),
(40, 'Sleep Support Supplement', 'Promotes restful sleep and recovery.', 349.99, 3, 30, '120.png'),
(42, 'Meal Replacement Shake', 'Helps manage weight while providing essential nutrients.', 399.5, 4, 50, '1.png'),
(45, 'Calcium and Vitamin D Tablets', 'Supports bone health and calcium absorption.', 329.99, 1, 2, '4.png'),
(48, 'Resistance Bands Set', 'Ideal for various exercises to improve strength and flexibility.', 349.5, 4, 15, '7.png'),
(50, 'Yoga Mat', 'Perfect for yoga and stretching exercises.', 369.75, 6, 45, '9.png'),
(52, 'Water Bottle with Infuser', 'Allows infusing fruits for flavored water intake.', 399.75, 4, 18, '11.png'),
(53, 'Exercise Ball', 'Great for core strengthening and stability exercises.', 479.9, 5, 22, '12.png'),
(54, 'Jump Rope', 'Excellent for cardio workouts and improving agility.', 349.99, 6, 33, '13.png'),
(55, 'Weighted Vest', 'Adds resistance to workouts for increased intensity.', 499.5, 7, 26, '14.png'),
(60, 'Fitness Tracker Watch', 'Monitors activity, heart rate, and tracks workouts.', 389.95, 4, 31, '19.png'),
(61, 'Protein Bar', 'Convenient snack with high protein content for muscle recovery.', 399.5, 1, 50, '136.png'),
(63, 'Post-Workout Protein Shake', 'Fast-absorbing protein for muscle repair after workouts.', 459.95, 3, 40, '138.png'),
(64, 'Meal Replacement Powder', 'Balanced nutrition for meal replacement and weight management.', 329.99, 4, 20, '139.png'),
(65, 'Fish Oil Capsules', 'Rich in omega-3 fatty acids for heart and joint health.', 389, 5, 25, '140.png'),
(66, 'Turmeric Curcumin Supplement', 'Natural anti-inflammatory for joint health support.', 399.95, 6, 60, '141.png'),
(67, 'Running Belt', 'Comfortable belt for carrying essentials during workouts.', 349.5, 7, 15, '142.png'),
(68, 'Resistance Loop Bands', 'Great for various exercises targeting different muscle groups.', 419.25, 1, 35, '143.png'),
(69, 'Foam Yoga Blocks', 'Aids in yoga poses for flexibility and support.', 369.75, 2, 45, '144.png'),
(70, 'Gym Gloves', 'Provides grip and protection during weightlifting.', 449, 3, 28, '145.png'),
(71, 'Protein Pancake Mix', 'High-protein mix for a nutritious breakfast or snack.', 399.75, 4, 18, '146.png'),
(72, 'Shaker Bottle', 'Convenient for mixing and carrying protein shakes.', 479.9, 5, 22, '147.png'),
(73, 'Jumping Plyo Box', 'Versatile for plyometric exercises and strength training.', 349.99, 6, 33, '148.png'),
(74, 'Weighted Hula Hoop', 'Fun workout tool for core strengthening and burning calories.', 499.5, 7, 26, '149.png'),
(75, 'Resistance Tubes Set', 'Portable for resistance training anywhere.', 399.5, 1, 12, '150.png'),
(84, 'xjcxc', 'xck xcjnxjc xjc xjc xjc ', 100, 1, 1200, '');

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
  `IS_ADMIN` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FN`, `LN`, `USERNAME`, `EMAIL`, `PASSWORD_USER`, `IS_ADMIN`) VALUES
(1, 'Yasser', 'Arafat', 'Yasser', 'ilyasbennajeh@gmail.com', '1234', 0),
(2, 'jji', 'jnj', 'ilyben04', 'n@gmail.com', '1234', 1),
(3, 'Fatouma', 'Responsable', 'Fatouma', 'ilyasbennajeh@gmail.com', '1234', 0),
(4, 'Hamza ', 'Benchaoui', 'Hemza', 'ilyasbennajeh@gmail.com', '1234', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
