

CREATE TABLE `cardheader` (
  `listID` int(11) NOT NULL,
  `cardID` int(11) NOT NULL AUTO_INCREMENT,
  `cardTitle` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  PRIMARY KEY (`cardID`,`listID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `cardimage` (
  `cardID` int(11) NOT NULL,
  `imagePath` varchar(200) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `cardtodolist` (
  `cardID` int(11) DEFAULT NULL,
  `toDoList` varchar(200) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `cardID` int(11) NOT NULL,
  `chatText` text NOT NULL,
  `chatTime` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`,`cardID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `finalproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `projectlist` (
  `projectID` int(11) NOT NULL,
  `listID` int(11) NOT NULL AUTO_INCREMENT,
  `listTitle` varchar(50) NOT NULL,
  PRIMARY KEY (`listID`,`projectID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `projectmember` (
  `projectID` int(11) NOT NULL,
  `memberEmail` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `userproject` (
  `email` varchar(50) NOT NULL,
  `projectID` int(11) NOT NULL AUTO_INCREMENT,
  `projectStatus` int(11) NOT NULL DEFAULT 1,
  `projectTitle` varchar(30) NOT NULL,
  PRIMARY KEY (`projectID`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `Userpassword` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `backgroundPath` varchar(500) NOT NULL DEFAULT 'images/background/Template 18.png',
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `cardheader`
  ADD CONSTRAINT `FK_cardheader1` FOREIGN KEY (`listID`) REFERENCES `projectlist` (`listID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `cardimage`
  ADD CONSTRAINT `FK_cardimage1` FOREIGN KEY (`cardID`) REFERENCES `cardheader` (`cardID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `cardtodolist`
  ADD CONSTRAINT `FK_cardtodolist1` FOREIGN KEY (`cardID`) REFERENCES `cardheader` (`cardID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `chat`
  ADD CONSTRAINT `FK_chat1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `finalproduct`
  ADD CONSTRAINT `FK_finalproduct1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `projectlist`
  ADD CONSTRAINT `FK_projectlist1` FOREIGN KEY (`projectID`) REFERENCES `userproject` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `projectmember`
  ADD CONSTRAINT `FK_projectmember1` FOREIGN KEY (`memberEmail`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `userproject`
  ADD CONSTRAINT `FK_userproject1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;


CREATE VIEW calendar AS
SELECT  up.email, pm.memberEmail, up.projectID, up.projectTitle, pl.listTitle, ch.cardID, ch.cardTitle, ch.deadline
FROM userproject up 
LEFT JOIN projectlist pl ON up.projectID=pl.projectID
LEFT JOIN cardheader ch ON pl.listID =ch.listID
LEFT JOIN projectmember pm ON pm.projectID = up.projectID
WHERE up.projectStatus=1 AND ch.deadline != 'NULL' AND ch.deadline != '0000-00-00'
ORDER BY ch.deadline;