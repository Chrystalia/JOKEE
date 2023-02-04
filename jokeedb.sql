-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 01:02 PM
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
  `deadline` date DEFAULT NULL,
  `colorCode` char(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cardheader`
--

INSERT INTO `cardheader` (`listID`, `cardID`, `cardTitle`, `description`, `deadline`, `colorCode`) VALUES
(27, 48, 'tes', 'abc', '0000-00-00', '0'),
(27, 79, 'elo', 'abc', '0000-00-00', '0'),
(27, 111, 'hai', NULL, NULL, NULL),
(1, 114, 'tes omo', 'hai', '2023-01-11', '0'),
(1, 115, 'tes lagi', 'hai', '2023-01-20', '0'),
(45, 116, 'tessssss', NULL, NULL, NULL),
(31, 117, 'haiiiiiiiii', NULL, NULL, NULL),
(55, 120, 'b', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cardimage`
--

CREATE TABLE `cardimage` (
  `cardID` int(11) DEFAULT NULL,
  `imagePath` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cardimage`
--

INSERT INTO `cardimage` (`cardID`, `imagePath`, `id`) VALUES
(48, 'IMG-63be553e8a1ab7.62937793.jpg', 3),
(48, 'IMG-63be553e8a1ab7.62937793.jpg', 4),
(48, 'IMG-63be55836daf81.29004904.jpg', 5),
(48, 'IMG-63be5f704aac72.40285018.jpg', 6),
(48, 'IMG-63be5f7cb20815.00629883.jpg', 7),
(48, 'IMG-63be5f87905ce8.88437680.jpg', 8),
(48, 'IMG-63be60aa08ab73.48966620.jpg', 9),
(79, 'IMG-63c8bc122d3920.88059983.jpg', 18),
(79, 'IMG-63c8bc122de7a3.42314301.jpg', 19),
(79, 'IMG-63cf8ca274b388.90199277.jpg', 38),
(79, 'IMG-63cf8ca2763776.32072662.jpg', 39),
(79, 'IMG-63cf8ca2773880.30282522.jpg', 40),
(79, 'IMG-63cf8ca2785ae1.89330418.jpg', 41),
(114, 'IMG-63d1f0e3ed40f1.36086059.jpg', 42),
(114, 'IMG-63d1f0e3ee0e10.69188762.jpg', 43),
(114, 'IMG-63d1f0e3ee8a31.85604329.jpg', 44),
(114, 'IMG-63d1f0e3ef3965.41362150.jpg', 45),
(115, 'IMG-63d1f4019b0373.87374125.jpg', 46),
(115, 'IMG-63d1f4019b9553.82610466.jpg', 47),
(115, 'IMG-63d1f4019c1442.32015486.jpg', 48),
(115, 'IMG-63d1f4019d06e6.81744839.jpg', 49),
(115, 'IMG-63d1f4019d8250.92814783.jpg', 50);

-- --------------------------------------------------------

--
-- Table structure for table `cardteam`
--

CREATE TABLE `cardteam` (
  `cardID` int(11) DEFAULT NULL,
  `cardEmail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(114, 'b', 58, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
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
(3, 'jesse@gmail.com', 48, 'yg perlu diperbaiki:\r\n...', '2023-01-18 12:39:00'),
(7, 'jesse@gmail.com', 48, 'add card button, add to do list button, attach section make delete button, comment section input', '2023-01-18 12:45:11'),
(8, 'glenys@gmail.com', 48, 'HELO', '2023-01-19 10:44:38'),
(10, 'glenys@gmail.com', 48, 'helo\r\n', '2023-01-24 14:46:37'),
(11, 'jesse@gmail.com', 48, 'aaaaaaaaa', '2023-01-24 14:46:53'),
(12, 'jesse@gmail.com', 111, 'ted', '2023-01-24 14:47:13'),
(13, 'jesse@gmail.com', 111, 'hai', '2023-01-24 14:47:21'),
(14, 'glenys@gmail.com', 111, 'haiiiiii\r\n', '2023-01-24 14:47:33'),
(15, 'jesse@gmail.com', 111, 'halo halo', '2023-01-24 14:48:10'),
(16, 'jesse@gmail.com', 111, 'a', '2023-01-24 15:00:44'),
(18, 'glenys@gmail.com', 111, 'bbbbbbbbbbbbbbb', '2023-01-24 15:00:58'),
(19, '', 111, 'a', '2023-01-25 10:23:22'),
(20, '', 111, 'h', '2023-01-25 10:24:14'),
(21, 'jesse@gmail.com', 79, 'g', '2023-01-25 10:25:00'),
(23, 'abdi@gmail.com', 79, 'a', '2023-01-25 10:25:57'),
(24, 'jesse@gmail.com', 79, 'b', '2023-01-25 10:28:01'),
(25, 'glenys@gmail.com', 79, 'a', '2023-01-25 10:28:10'),
(26, '', 79, 'h', '2023-01-25 10:28:36'),
(27, 'jesse@gmail.com', 79, 'hai', '2023-01-25 10:28:49'),
(28, 'glenys@gmail.com', 48, 'hai', '2023-01-26 08:52:19'),
(29, 'glenys@gmail.com', 114, 'hai', '2023-01-26 10:18:00'),
(30, 'glenys@gmail.com', 115, 'a', '2023-01-26 10:31:16'),
(31, 'glenys@gmail.com', 115, 'b\r\n', '2023-01-26 10:31:20'),
(32, 'glenys@gmail.com', 115, 'c', '2023-01-26 10:31:47'),
(33, 'glenys@gmail.com', 114, 'haiiii', '2023-01-26 16:26:49'),
(34, 'glenys@gmail.com', 114, 'hai', '2023-02-02 21:11:53'),
(35, 'jesse@gmail.com', 120, 'h', '2023-02-03 16:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `finalproduct`
--

CREATE TABLE `finalproduct` (
  `projectID` int(11) NOT NULL,
  `productPath` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projectassets`
--

CREATE TABLE `projectassets` (
  `projectID` int(11) NOT NULL,
  `assetPath` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(5, 45, 'hai'),
(1, 53, 'a'),
(62, 55, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `projectmember`
--

CREATE TABLE `projectmember` (
  `projectID` int(11) NOT NULL,
  `memberEmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userproject`
--

CREATE TABLE `userproject` (
  `email` varchar(50) NOT NULL,
  `projectID` int(11) NOT NULL,
  `projectStatus` int(11) NOT NULL DEFAULT 1,
  `projectTitle` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userproject`
--

INSERT INTO `userproject` (`email`, `projectID`, `projectStatus`, `projectTitle`) VALUES
('glenys@gmail.com', 1, 1, 'Project 1'),
('abdi@gmail.com', 2, 1, 'project Abdi 1'),
('glenys@gmail.com', 3, 1, 'Project 2'),
('glenys@gmail.com', 4, 1, 'Project 3'),
('abdi@gmail.com', 5, 1, 'project Abdi 2'),
('abdi@gmail.com', 6, 0, 'project Abdi 2'),
('abdi@gmail.com', 7, 0, 'project Abdi 4'),
('abdi@gmail.com', 8, 0, 'project Abdi 4'),
('abdi@gmail.com', 13, 0, 'project Abdi 6'),
('abdi@gmail.com', 14, 0, 'project Abdi 6'),
('abdi@gmail.com', 15, 0, 'project Abdi 8'),
('jesse@gmail.com', 62, 1, 'a');

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
('', 'a', 'a', 'images/background/default.png'),
('abdi@gmail.com', '123', 'abdi', 'images/background/Template 1.png'),
('glenys@gmail.com', 'abc', 'glenys', 'images/background/Template 5.png'),
('ipe@gmail.com', 'abc', 'ipe', 'images/background/Template 18.png'),
('jesse@gmail.com', 'abc', 'Jesse Orlanda', 'images/background/Template 6.png');

-- --------------------------------------------------------

--
-- Structure for view `calendar`
--
DROP TABLE IF EXISTS `calendar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `calendar`  AS SELECT `up`.`email` AS `email`, `up`.`projectID` AS `projectID`, `up`.`projectTitle` AS `projectTitle`, `pl`.`listTitle` AS `listTitle`, `ch`.`cardID` AS `cardID`, `ch`.`cardTitle` AS `cardTitle`, `ch`.`deadline` AS `deadline` FROM ((`userproject` `up` left join `projectlist` `pl` on(`up`.`projectID` = `pl`.`projectID`)) left join `cardheader` `ch` on(`pl`.`listID` = `ch`.`listID`)) WHERE `up`.`projectStatus` = 1 AND `ch`.`deadline` <> 'NULL' AND `ch`.`deadline` <> '0000-00-00' ORDER BY `ch`.`deadline` ASC ;

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
-- Indexes for table `cardteam`
--
ALTER TABLE `cardteam`
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
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `projectassets`
--
ALTER TABLE `projectassets`
  ADD PRIMARY KEY (`projectID`);

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
  ADD PRIMARY KEY (`projectID`);

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
  MODIFY `cardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `cardimage`
--
ALTER TABLE `cardimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `cardtodolist`
--
ALTER TABLE `cardtodolist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `projectlist`
--
ALTER TABLE `projectlist`
  MODIFY `listID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `userproject`
--
ALTER TABLE `userproject`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
-- Constraints for table `cardteam`
--
ALTER TABLE `cardteam`
  ADD CONSTRAINT `cardteam_ibfk_1` FOREIGN KEY (`cardID`) REFERENCES `cardheader` (`cardID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cardtodolist`
--
ALTER TABLE `cardtodolist`
  ADD CONSTRAINT `cardtodolist_ibfk_1` FOREIGN KEY (`cardID`) REFERENCES `cardheader` (`cardID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`cardID`) REFERENCES `cardheader` (`cardID`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `finalproduct`
--
ALTER TABLE `finalproduct`
  ADD CONSTRAINT `finalproduct_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `userproject` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projectassets`
--
ALTER TABLE `projectassets`
  ADD CONSTRAINT `projectassets_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `userproject` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projectlist`
--
ALTER TABLE `projectlist`
  ADD CONSTRAINT `projectlist_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `userproject` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projectmember`
--
ALTER TABLE `projectmember`
  ADD CONSTRAINT `projectmember_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `userproject` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userproject`
--
ALTER TABLE `userproject`
  ADD CONSTRAINT `userproject_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
