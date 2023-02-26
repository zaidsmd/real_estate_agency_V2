-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 05:34 PM
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
  `description` text NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `date`, `update`, `adresse`, `country`, `city`, `category`, `type`, `price`, `area`, `description`, `user_id`) VALUES
(2, 'Freagh, Tullamore, Co. Offaly', '2023-02-24', '2023-02-24', 'Freagh, Tullamore, Co. Offaly', '233', 'Tullamore', 'Vente', 'villa', 400000, 153, 'Stunning detached red brick bungalow in pristine condition within easy walking distance of the town centre.  This Beautiful property has a Magnificent Solid Wooden Kitchen complete with Quartz Worktops and Feature Pendant Lighting over both the Dining Table and the Kitchen area.  There is also a Utility Room.  The Main Reception Room is exceptionally bright and features an attractive stove with a back boiler. The stove heats the radiators throughout the house and there is also oil-fired central heating. This beautiful spacious room also has a solid wooden pitch pine floor. There is an attractive brick arch creating an open plan Reception and Kitchen/Dining Room making the room Double Aspect with light flooding in from both front and rear.  The Master Bedroom is extremely generous in proportion with both an En Suite Shower Room and a large Walk in Wardrobe.  There are Three Further large Double Bedrooms.  The Family Bathroom has a Jacuzzi Bath and a separate Shower Cubicle. The house also has a Guest WC off the Utility Room.  The location is excellent, just 15 mins drive from either Tullamore or Birr.  This extremely attractive Family Home is beautifully presented, very private in a convenient location and superb condition.  Early viewing is highly recommended.', 4),
(4, 'Drumleck House, Ceanchor Road, Howth, Dublin 13', '2023-02-24', '2023-02-24', 'Drumleck House, Ceanchor Road, Howth, Dublin 13', '', 'Dublin', 'Vente', 'villa', 10000000, 781, 'Down a bucolic lane with high hedgerows off Howth\'s exclusive Ceanchor road stands the fabled Drumleck House, set on an exquisite garden estate of 10 acres overlooking Dublin bay. This grand, 1830s residence has c.8,410 square feet of luxurious accommodation, with two swimming pools, access to the sea, staff cottages and an abundance of beguiling outbuildings, Drumleck House is Howth\'s most aspirational home. To visit these gardens is to fall under a spell and Drumleck\'s illustrious history notes many prominent figures entranced by its particular combination of natural and manmade beauty. \"So many things in life are predictable - things and even people you go out of your path to see are usually as you had expected to see them - but you - and your house and your garden and your spirit are like nothing I could ever have imagined to exist.\" - Jaqueline Kennedy, letter to the Hunts A dappled driveway bends, building a sense of expectation before breaking through  \"the soft curve of its guardian trees\" to reveal an imposing but elegant Wisteria clad house.  Inside all is indulgence and the ultimate in privacy and luxurious living it is possible to attain.', 4),
(5, 'Derryart, Dunfanaghy, Co. Donegal', '2023-02-24', '2023-02-24', 'Derryart, Dunfanaghy, Co. Donegal', '', 'County Donegal', 'Vente', 'maison', 23000, 171, 'This three-bed house sits on an elevated site close to Ard\'s forest park. The gardens have been developed and have some lovely features. Halfway between the villages of Dunfanaghy and Creeslough and close to Marblehill beach. The house is heated by oil and solar panels that are fitted to the roof. Viewing by appointment only.', 4),
(6, 'Pineview, Ballybride Road, Rathmichael, Co. Dublin', '2023-02-24', '2023-02-24', 'Pineview, Ballybride Road, Rathmichael, Co. Dublin', '', 'Dublin', 'Vente', 'villa', 2250000, 440, 'Pineview is a fantastic A2 rated detached six bedroom house in a great South Dublin location, with an abundance of outstanding features and modern comforts. Pineview is a fantastic A2 rated detached six bedroom house of c. 4,735sqft (440m2) in a great South Dublin location, with an abundance of outstanding features and modern comforts. It is positioned in a wonderfully private setting off Ballybride Road with easy access to the M50 and within walking distance of Shankill village. It was built to exceptional standards of design, specification, energy efficiency, layout and accommodation in 2010.', 4),
(7, 'Clonad, Tullamore, Co. Offaly', '2023-02-24', '2023-02-24', 'Clonad, Tullamore, Co. Offaly', '', 'Tullamore', 'Vente', 'villa', 495000, 278, 'Located at Clonad Wood, DNG Kelly Duncan is proud to bring to the market this spectacularly well-presented 5/6 bedroom, detached, family home.  Situated at the end of beautiful sweeping drive through Clonad Wood down to a gated entrance over tarmacadam drives, the property occupies a site of some 1.5 acres and has lawns to the front, sides and rear, all complimented with mature landscaping.  The patio area has a western orientation, relax after a days work, unwind and listen to the river clodiagh as it passes your back boundary, when finished, head inside, take a sauna and unwind some more! Accommodation which has a usable floor space of some 276 sqm is comprised briefly; Entrance Hallway, Sitting Room, Open Plan Kitchen/Dining/Living and Conservatory, Five Double Bedrooms (two of which are en-suite, one complete with sauna), Home Office (bedroom 6), Bathroom, Utility Room, and Guest Toilet. The attic space has been converted and is ideal for use as home office/yoga studio or indeed storage space. The property boasts an energy efficient B3 Ber Rating, has dual fuel heating and solar panels.  There is a detached garage which has been partly converted. Tullamore Golf Club is less than 3km and Tullamore town centre less than 8km.  Viewing is by appointment only with Sole Selling Agents DNG Kelly Duncan who can be contacted on 057-93-25050  Entrance Hall 5.63m x 7.60m. Composite front door with glass side light, porcelain tiled floor, ceiling coving, radiator, alarm control panel  Sitting Room 6.00m x 4.96m. Dual aspect light filled sitting room with solid walnut timber flooring. ceiling coving, insert stove with polished marble fireplace and contrasting black granite hearth, fitted fireside units, feature bay window, two radiators.', 4);

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
(3, '../files/4/ljhd11sd32a1.webp', 0, 2),
(4, '../files/4/ljhd11sd32a1.webp', 0, 2),
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
