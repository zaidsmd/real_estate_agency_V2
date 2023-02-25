-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 07:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` date DEFAULT curdate(),
  `update` date DEFAULT curdate(),
  `adresse` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `category` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `price` int(30) NOT NULL,
  `area` int(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `date`, `update`, `adresse`, `country`, `city`, `category`, `type`, `price`, `area`, `user_id`) VALUES
(2, 'Freagh, Tullamore, Co. Offaly', '2023-02-24', '2023-02-24', 'Freagh, Tullamore, Co. Offaly', '233', 'Tullamore', 'Vente', 'villa', 400000, 153, 4),
(4, 'Drumleck House, Ceanchor Road, Howth, Dublin 13', '2023-02-24', '2023-02-24', 'Drumleck House, Ceanchor Road, Howth, Dublin 13', '', 'Dublin', 'Vente', 'villa', 10000000, 781, 4),
(5, 'Derryart, Dunfanaghy, Co. Donegal', '2023-02-24', '2023-02-24', 'Derryart, Dunfanaghy, Co. Donegal', '', 'County Donegal', 'Vente', 'maison', 23000, 171, 4),
(6, 'Pineview, Ballybride Road, Rathmichael, Co. Dublin', '2023-02-24', '2023-02-24', 'Pineview, Ballybride Road, Rathmichael, Co. Dublin', '', 'Dublin', 'Vente', 'villa', 2250000, 440, 4),
(7, 'Clonad, Tullamore, Co. Offaly', '2023-02-24', '2023-02-24', 'Clonad, Tullamore, Co. Offaly', '', 'Tullamore', 'Vente', 'villa', 495000, 278, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `primary` tinyint(1) DEFAULT NULL,
  `announcement_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `path`, `primary`, `announcement_id`) VALUES
(1, '../files/4/fhgfkljlkj.webp', 1, 2),
(2, '../files/4/ldsjhlfasdjfl;jkhasdjfs51f32s1d321c32132.webp', 0, 2),
(3, '../files/4/eyJidWNrZXQiOiJtZWRpYW1hc3Rlci1zM2V1IiwiZWRpdHMiOnsicmVzaXplIjp7ImZpdCI6Imluc2lkZSIsIndpZ', 0, 2),
(4, '../files/4/eyJidWNrZXQiOiJtZWRpYW1hc3Rlci1zM2V1IiwiZWRpdHMiOnsicmVzaXplIjp7ImZpdCI6Imluc2lkZSIsIndpZ', 0, 2),
(13, '../files/4/sdadasdjY0YmFjYzEwOGQ3Zi5qcG.webp', 1, 4),
(14, '../files/4/3215615f3sdf1sd5f65sd421vc3.webp', 0, 4),
(15, '../files/4/sdjnknxcac132.webp', 0, 4),
(16, '../files/4/dsadasdvnmmx.webp', 0, 4),
(17, '../files/4/fdsfhjhllvbvc.webp', 0, 4),
(18, '../files/4/ldjslakjdlk0354.webp', 0, 4),
(19, '../files/4/ljhd11sd32a1.webp', 0, 4),
(20, '../files/4/eyJidWNrZXQiOiJtZWRpYW1hc3Rlci.webp', 0, 4),
(21, '../files/4/ghdfherfvcbg.webp', 1, 5),
(22, '../files/4/fsdfsdfsdasvcx.webp', 0, 5),
(23, '../files/4/dgsdhgsdgshgs.webp', 0, 5),
(24, '../files/4/dadsadefsdcf.webp', 0, 5),
(25, '../files/4/set1.webp', 1, 6),
(26, '../files/4/set6.webp', 0, 6),
(27, '../files/4/set5.webp', 0, 6),
(28, '../files/4/set4.webp', 0, 6),
(29, '../files/4/set3.webp', 0, 6),
(30, '../files/4/set2.webp', 0, 6),
(31, '../files/4/sett1.webp', 1, 7),
(32, '../files/4/sett5.webp', 0, 7),
(33, '../files/4/sett4.webp', 0, 7),
(34, '../files/4/sett3.webp', 0, 7),
(35, '../files/4/sett2.webp', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `profile_pic` varchar(250) NOT NULL DEFAULT 'https://www.pngitem.com/pimgs/m/30-307416_profile-icon-png-image-free-download-searchpng-employee.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `password`, `phone_number`, `profile_pic`) VALUES
(4, 'zaid', 'samadi', 'zaidsmd111@gmail.com', 'fb5a0135cccbf280079a866d43be865c', '+212681515035', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcement_id` (`announcement_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`announcement_id`) REFERENCES `announcements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
