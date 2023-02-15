-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 06:35 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jokeedb`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `calendar`
-- (See below for the actual view)
--
CREATE TABLE `calendar` (
`email` varchar(50)
,`memberEmail` varchar(50)
,`projectID` int(11)
,`projectTitle` varchar(30)
,`listTitle` varchar(50)
,`cardID` int(11)
,`cardTitle` varchar(50)
,`deadline` date
);

-- --------------------------------------------------------

--
-- Table structure for table `cardheader`
--

CREATE TABLE `cardheader` (
  `listID` int(11) NOT NULL,
  `cardID` int(11) NOT NULL,
  `cardTitle` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cardheader`
--

INSERT INTO `cardheader` (`listID`, `cardID`, `cardTitle`, `description`, `deadline`) VALUES
(1, 48, 'tes', 'abc', '0000-00-00'),
(27, 79, 'elo', 'abc', '0000-00-00'),
(1, 114, 'tes omo', 'hai', '2023-01-11'),
(1, 115, 'tes lagi', 'hai', '2023-01-20'),
(39, 121, 'tes add member', NULL, NULL),
(57, 123, 'Latihan Presentasi', '', '2023-02-12'),
(60, 129, 'a', '', '0000-00-00'),
(60, 130, 'c', NULL, NULL),
(68, 135, 'Laporan Jokee', 'https://docs.google.com/document/d/1SJvk_w8anLDACjNjYDrQyKP3I02952PMufM3TTRPKXs/edit', '2023-02-18'),
(69, 136, 'Desain Use Case', '', '0000-00-00'),
(67, 145, 'Project Presentation', '', '2023-02-15'),
(71, 146, 'Project Presentation', '', '2023-02-13'),
(69, 147, 'Quiz 2', '', '2023-02-09'),
(72, 148, 'Quiz 2', '', '2023-02-16'),
(73, 149, 'UAC Lab', '', '2023-02-20'),
(75, 150, 'Card 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '2023-02-14'),
(76, 151, 'Card 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '2023-02-17'),
(76, 152, 'Card 2', NULL, NULL),
(77, 153, 'Card 3', NULL, NULL),
(69, 154, 'Desain ERD', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cardimage`
--

CREATE TABLE `cardimage` (
  `cardID` int(11) NOT NULL,
  `imagePath` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cardimage`
--

INSERT INTO `cardimage` (`cardID`, `imagePath`, `id`) VALUES
(48, 'IMG-63be5f87905ce8.88437680.jpg', 8),
(79, 'IMG-63c8bc122d3920.88059983.jpg', 18),
(79, 'IMG-63c8bc122de7a3.42314301.jpg', 19),
(79, 'IMG-63cf8ca274b388.90199277.jpg', 38),
(79, 'IMG-63cf8ca2763776.32072662.jpg', 39),
(79, 'IMG-63cf8ca2773880.30282522.jpg', 40),
(79, 'IMG-63cf8ca2785ae1.89330418.jpg', 41),
(114, 'IMG-63d1f0e3ef3965.41362150.jpg', 45),
(115, 'IMG-63d1f4019b0373.87374125.jpg', 46),
(115, 'IMG-63d1f4019b9553.82610466.jpg', 47),
(115, 'IMG-63d1f4019c1442.32015486.jpg', 48),
(115, 'IMG-63d1f4019d06e6.81744839.jpg', 49),
(115, 'IMG-63d1f4019d8250.92814783.jpg', 50),
(114, 'IMG-63e885991e7605.94396994.png', 58),
(114, 'IMG-63e885991f9b01.11002914.jpg', 59),
(48, 'IMG-63e8c1c40392d7.21359032.png', 66),
(48, 'IMG-63e8c1c40520b3.55624204.png', 67),
(48, 'IMG-63e8c1c406f4f0.38028302.png', 69),
(48, 'IMG-63e8c1c407d017.63461314.png', 70),
(136, 'IMG-63e905b00300a4.36886729.png', 72),
(150, 'IMG-63ea550b9f5bd1.85600624.jpg', 74),
(151, 'IMG-63ea6ec37cdfb1.89731748.jpg', 78),
(151, 'IMG-63ea6ec37dbdc9.20819647.jpeg', 79),
(151, 'IMG-63ea6ec37ec782.38455067.png', 80),
(135, 'IMG-63ec40d686c040.37989244.png', 94),
(145, 'IMG-63ec40ea395131.43149025.png', 95),
(154, 'IMG-63ec41406fa232.80912013.png', 96);

-- --------------------------------------------------------

--
-- Table structure for table `cardtodolist`
--

CREATE TABLE `cardtodolist` (
  `cardID` int(11) DEFAULT NULL,
  `toDoList` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cardtodolist`
--

INSERT INTO `cardtodolist` (`cardID`, `toDoList`, `id`, `status`) VALUES
(79, 's', 42, 0),
(48, 'hii', 49, 0),
(114, 'a', 50, 0),
(115, 'a', 53, 0),
(115, 'v', 56, 0),
(115, 'a', 57, 0),
(114, 'b', 58, 1),
(123, 'mencetak gambar', 62, 1),
(123, 'merapikan ppt', 64, 0),
(151, 'task 1', 71, 0),
(135, 'Bab 1: Pendahuluan', 78, 1),
(135, 'Bab 2: Tijauan Referensi', 79, 1),
(135, 'Bab 3: Metode Penelitian', 80, 0),
(135, 'Bab 4: Hasil dan Pembahasan', 81, 0),
(135, 'Bab 5: Simpulan dan Saran', 82, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cardID` int(11) NOT NULL,
  `chatText` text NOT NULL,
  `chatTime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `email`, `cardID`, `chatText`, `chatTime`) VALUES
(1, 'glenys@gmail.com', 48, 'helo', '2023-01-18 11:25:10'),
(2, 'glenys@gmail.com', 48, 'tes', '2023-01-18 12:37:00'),
(8, 'glenys@gmail.com', 48, 'HELO', '2023-01-19 10:44:38'),
(10, 'glenys@gmail.com', 48, 'helo\r\n', '2023-01-24 14:46:37'),
(14, 'glenys@gmail.com', 111, 'haiiiiii\r\n', '2023-01-24 14:47:33'),
(18, 'glenys@gmail.com', 111, 'bbbbbbbbbbbbbbb', '2023-01-24 15:00:58'),
(25, 'glenys@gmail.com', 79, 'a', '2023-01-25 10:28:10'),
(28, 'glenys@gmail.com', 48, 'hai', '2023-01-26 08:52:19'),
(29, 'glenys@gmail.com', 114, 'hai', '2023-01-26 10:18:00'),
(30, 'glenys@gmail.com', 115, 'a', '2023-01-26 10:31:16'),
(31, 'glenys@gmail.com', 115, 'b\r\n', '2023-01-26 10:31:20'),
(32, 'glenys@gmail.com', 115, 'c', '2023-01-26 10:31:47'),
(33, 'glenys@gmail.com', 114, 'haiiii', '2023-01-26 16:26:49'),
(34, 'glenys@gmail.com', 114, 'hai', '2023-02-02 21:11:53'),
(36, 'glenys@gmail.com', 116, 'yo!', '2023-02-06 23:46:37'),
(39, 'user3@gmail.com', 123, 'hai', '2023-02-11 20:33:48'),
(40, 'user2@gmail.com', 123, 'helo', '2023-02-11 20:39:42'),
(41, 'user4@gmail.com', 127, 'a', '2023-02-11 20:46:24'),
(42, 'user4@gmail.com', 129, 'a', '2023-02-11 20:47:17'),
(43, 'glenys@gmail.com', 117, 'a', '2023-02-12 14:36:52'),
(44, 'glenys@gmail.com', 134, 'a', '2023-02-12 14:48:48'),
(45, 'admin1@gmail.com', 151, 'tes', '2023-02-14 00:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `finalproduct`
--

CREATE TABLE `finalproduct` (
  `id` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finalproduct`
--

INSERT INTO `finalproduct` (`id`, `img_name`, `email`) VALUES
(1, 'IMG-63e7a41b8671c8.54457032.jpg', 'glenys@gmail.com'),
(5, 'IMG-63e7a4244686d1.69134406.png', 'glenys@gmail.com'),
(6, 'IMG-63e7a782a3bff6.05193424.png', 'glenys@gmail.com'),
(7, 'IMG-63e7a782a45c84.65712153.png', 'glenys@gmail.com'),
(9, 'IMG-63e7a782a565d8.73367937.png', 'glenys@gmail.com'),
(13, 'IMG-63e908ef1d43f1.36819688.png', 'glenys@gmail.com'),
(15, 'IMG-63e90a6dabaeb6.08040011.jpg', 'user5@gmail.com'),
(19, 'IMG-63e910ac6423a4.66569292.png', 'user5@gmail.com'),
(20, 'IMG-63e910ac64ab16.37817680.png', 'user5@gmail.com'),
(21, 'IMG-63e910ac651e24.41101950.png', 'user5@gmail.com'),
(23, 'IMG-63e910ac65f714.55796596.png', 'user5@gmail.com'),
(24, 'IMG-63ea7553207cd1.88324125.jpg', 'admin1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `projectlist`
--

CREATE TABLE `projectlist` (
  `projectID` int(11) NOT NULL,
  `listID` int(11) NOT NULL,
  `listTitle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projectlist`
--

INSERT INTO `projectlist` (`projectID`, `listID`, `listTitle`) VALUES
(1, 1, 'LETSGO SE PROJECT'),
(1, 27, 'HAIHAI'),
(1, 31, 'tes in project id 4'),
(4, 39, 'id4 t1'),
(1, 53, 'a'),
(69, 57, 'To Do'),
(66, 59, 'helo'),
(71, 60, 'a'),
(90, 67, 'To Do'),
(90, 68, 'Doing'),
(90, 69, 'Done'),
(93, 71, 'Presentasi'),
(94, 72, 'a'),
(95, 73, 'To Do'),
(95, 74, 'Doing'),
(88, 75, 'To Do'),
(98, 76, 'List 1'),
(98, 77, 'List 2');

-- --------------------------------------------------------

--
-- Table structure for table `projectmember`
--

CREATE TABLE `projectmember` (
  `projectID` int(11) NOT NULL,
  `memberEmail` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projectmember`
--

INSERT INTO `projectmember` (`projectID`, `memberEmail`, `id`) VALUES
(5, 'glenys@gmail.com', 1),
(62, 'glenys@gmail.com', 3),
(65, 'user2@gmail.com', 28),
(69, 'user2@gmail.com', 29),
(1, 'user2@gmail.com', 30),
(88, 'user5@gmail.com', 31),
(98, 'admin@gmail.com', 36);

-- --------------------------------------------------------

--
-- Table structure for table `userproject`
--

CREATE TABLE `userproject` (
  `email` varchar(50) NOT NULL,
  `projectID` int(11) NOT NULL,
  `projectStatus` int(11) NOT NULL DEFAULT 1,
  `projectTitle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userproject`
--

INSERT INTO `userproject` (`email`, `projectID`, `projectStatus`, `projectTitle`) VALUES
('glenys@gmail.com', 1, 1, 'Project 1'),
('glenys@gmail.com', 3, 1, 'Project 2'),
('glenys@gmail.com', 4, 1, 'Project 3'),
('user2@gmail.com', 66, 1, 'Project 1'),
('user2@gmail.com', 67, 1, 'Project 2'),
('user2@gmail.com', 68, 1, 'Project 3'),
('user3@gmail.com', 69, 1, 'projek 1'),
('user4@gmail.com', 71, 1, 'a'),
('user4@gmail.com', 72, 1, 'b'),
('glenys@gmail.com', 88, 1, 'Creative Team'),
('user5@gmail.com', 90, 1, 'Software Engineering'),
('user5@gmail.com', 91, 1, 'Multimedia System'),
('user5@gmail.com', 93, 1, 'Machine Learning '),
('user5@gmail.com', 94, 1, 'Compilation Techniques'),
('user5@gmail.com', 95, 1, 'Computational Biology'),
('user5@gmail.com', 97, 1, 'Character Building'),
('admin1@gmail.com', 98, 1, 'Board 1'),
('admin1@gmail.com', 100, 1, 'Board 2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `Userpassword` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `backgroundPath` varchar(500) NOT NULL DEFAULT 'images/background/Template 18.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `Userpassword`, `username`, `backgroundPath`) VALUES
('admin1@gmail.com', 'abc', 'admin1', 'images/background/Template 18.png'),
('admin@gmail.com', 'abc', 'admin', 'images/background/Template 18.png'),
('glenys@gmail.com', 'abc', 'glenys2', 'images/background/Template 18.png'),
('user2@gmail.com', 'abc', 'user2', 'images/background/Template 18.png'),
('user3@gmail.com', 'abc', 'user3', 'images/background/Template 4.png'),
('user4@gmail.com', 'abc', 'user4@gmail.com', 'images/background/Template 2.png'),
('user5@gmail.com', 'abc', 'glenys', 'images/background/Template 17.png');

-- --------------------------------------------------------

--
-- Structure for view `calendar`
--
DROP TABLE IF EXISTS `calendar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `calendar`  AS SELECT `up`.`email` AS `email`, `pm`.`memberEmail` AS `memberEmail`, `up`.`projectID` AS `projectID`, `up`.`projectTitle` AS `projectTitle`, `pl`.`listTitle` AS `listTitle`, `ch`.`cardID` AS `cardID`, `ch`.`cardTitle` AS `cardTitle`, `ch`.`deadline` AS `deadline` FROM (((`userproject` `up` left join `projectlist` `pl` on(`up`.`projectID` = `pl`.`projectID`)) left join `cardheader` `ch` on(`pl`.`listID` = `ch`.`listID`)) left join `projectmember` `pm` on(`pm`.`projectID` = `up`.`projectID`)) WHERE `up`.`projectStatus` = 1 AND `ch`.`deadline` <> 'NULL' AND `ch`.`deadline` <> '0000-00-00' ORDER BY `ch`.`deadline` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cardheader`
--
ALTER TABLE `cardheader`
  ADD PRIMARY KEY (`cardID`,`listID`),
  ADD KEY `listID` (`listID`);

--
-- Indexes for table `cardimage`
--
ALTER TABLE `cardimage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cardID` (`cardID`);

--
-- Indexes for table `cardtodolist`
--
ALTER TABLE `cardtodolist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cardID` (`cardID`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`,`cardID`),
  ADD KEY `cardID` (`cardID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `finalproduct`
--
ALTER TABLE `finalproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_finalproduct` (`email`);

--
-- Indexes for table `projectlist`
--
ALTER TABLE `projectlist`
  ADD PRIMARY KEY (`listID`,`projectID`),
  ADD KEY `projectID` (`projectID`);

--
-- Indexes for table `projectmember`
--
ALTER TABLE `projectmember`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projectID` (`projectID`),
  ADD KEY `FK_projectmember1` (`memberEmail`);

--
-- Indexes for table `userproject`
--
ALTER TABLE `userproject`
  ADD PRIMARY KEY (`projectID`,`email`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cardheader`
--
ALTER TABLE `cardheader`
  MODIFY `cardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `cardimage`
--
ALTER TABLE `cardimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `cardtodolist`
--
ALTER TABLE `cardtodolist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `finalproduct`
--
ALTER TABLE `finalproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `projectlist`
--
ALTER TABLE `projectlist`
  MODIFY `listID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `projectmember`
--
ALTER TABLE `projectmember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `userproject`
--
ALTER TABLE `userproject`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cardheader`
--
ALTER TABLE `cardheader`
  ADD CONSTRAINT `cardheader_ibfk_1` FOREIGN KEY (`listID`) REFERENCES `projectlist` (`listID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cardimage`
--
ALTER TABLE `cardimage`
  ADD CONSTRAINT `cardimage_ibfk_1` FOREIGN KEY (`cardID`) REFERENCES `cardheader` (`cardID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cardtodolist`
--
ALTER TABLE `cardtodolist`
  ADD CONSTRAINT `cardtodolist_ibfk_1` FOREIGN KEY (`cardID`) REFERENCES `cardheader` (`cardID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `FK_chat2` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `finalproduct`
--
ALTER TABLE `finalproduct`
  ADD CONSTRAINT `FK_finalproduct` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projectlist`
--
ALTER TABLE `projectlist`
  ADD CONSTRAINT `projectlist_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `userproject` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projectmember`
--
ALTER TABLE `projectmember`
  ADD CONSTRAINT `FK_member` FOREIGN KEY (`memberEmail`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_projectmember1` FOREIGN KEY (`memberEmail`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userproject`
--
ALTER TABLE `userproject`
  ADD CONSTRAINT `userproject_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
