-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2018 at 03:17 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fresherTalkDatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `Category_ID` int(11) NOT NULL,
  `Category_Name` varchar(100) NOT NULL DEFAULT 'Others'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`Category_ID`, `Category_Name`) VALUES
(1, 'Accommodation'),
(2, 'Restaurant'),
(3, 'Transpost'),
(4, 'Academic'),
(5, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE `Comment` (
  `Comment_ID` int(11) NOT NULL,
  `Post_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Comment_body` mediumtext NOT NULL,
  `Comment_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NoOfUpvotes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Comment`
--

INSERT INTO `Comment` (`Comment_ID`, `Post_ID`, `User_ID`, `Comment_body`, `Comment_time`, `NoOfUpvotes`) VALUES
(1, 1, 1, 'Hello , I am a comment.', '2018-11-17 06:47:51', 10),
(2, 1, 1, 'I am also a comment', '2018-11-17 06:47:51', 7),
(3, 1, 2, 'Comment by Yueru', '2018-11-17 15:47:43', 6),
(4, 7, 1, 'I have a answer !!!!', '2018-11-18 04:33:28', 5),
(5, 8, 1, 'A sample answer', '2018-11-18 18:08:40', 0),
(6, 8, 1, 'Second answer', '2018-11-18 18:09:42', 0),
(7, 1, 1, 'hello answer', '2018-11-18 21:02:57', 0),
(8, 1, 1, 'Sample answer by Jibon', '2018-11-18 21:04:15', 0),
(9, 1, 1, 'answer!!!!!!!', '2018-11-18 21:05:44', 0),
(10, 1, 1, 'Answer .........', '2018-11-18 21:06:44', 0),
(21, 3, 1, 'Answer', '2018-11-19 01:50:11', 3),
(31, 50, 6, 'You can take KTX to Daejeon at Busan station. You can go there from airport simply by taking the subway. Firstly transfer to line 2 at Sasang station and then transfer to line 1 at Seomyeon station. Download the metro app for Busan’s metro will be more convenient for referencing. Good luck :)', '2018-11-20 10:57:08', 0),
(32, 49, 7, 'Contact with ISSS. If there’s any vacant rooms(like guest house), they may could provide you one depending on your situation', '2018-11-20 11:09:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Post`
--

CREATE TABLE `Post` (
  `Post_ID` int(11) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Category_Name` varchar(20) NOT NULL DEFAULT 'Others',
  `User_ID` int(11) NOT NULL,
  `P_title` varchar(200) DEFAULT 'Sample Post Title',
  `P_body` varchar(16380) NOT NULL DEFAULT 'Sample body of this post',
  `P_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `P_urgent_flag` tinyint(1) NOT NULL DEFAULT '0',
  `P_solved_tag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Post`
--

INSERT INTO `Post` (`Post_ID`, `Category_ID`, `Category_Name`, `User_ID`, `P_title`, `P_body`, `P_time`, `P_urgent_flag`, `P_solved_tag`) VALUES
(1, 1, 'Accommodation', 1, 'Sample Post Title', 'Sample body of this post', '2018-11-16 09:20:04', 1, 1),
(2, 2, 'Restaurant', 2, 'Sample Post Title 2', 'Sample body of this post 2', '2018-11-16 16:44:43', 1, 0),
(3, 1, 'Accommodation', 1, 'Need to find a home near KAIST for 2 months', 'I need to find a home near KAIST for 2 months. Can anybody help me? Sample answer. ', '2018-11-16 17:31:32', 0, 0),
(4, 5, 'Others', 2, 'Need a bicycle', 'Need a bicycle badly. ', '2018-11-16 17:42:50', 0, 0),
(5, 1, 'Accommodation', 3, 'Urgent post in category 1', 'Sample body of this urgent post in category 1', '2018-11-17 16:31:41', 1, 0),
(6, 5, 'Others', 3, 'Sample Post Title', 'Sample body of this post', '2018-11-17 18:27:18', 0, 0),
(9, 3, 'Transpost', 1, 'Need a transport info', 'Need a transport info comment', '2018-11-18 18:07:23', 0, 0),
(10, 4, 'Academic', 1, 'Post from academic', 'post body of post academic', '2018-11-18 21:11:45', 0, 0),
(49, 1, 'Accommodation', 5, 'Arriving early at KAIST', 'Hi, I’m an international freshman entering for next spring semester at KAIST, and I’ll arrive earlier in Korea due to my flight schedule. Is there any place at KAIST that I could stay temporarily for several days?', '2018-11-20 10:49:33', 0, 0),
(50, 3, 'Transport', 5, 'Going to Incheon Airport', 'Hi, anyone has recommended way to go to Incheon airport from KAIST? I only saw how to go to KAIST from Incheon Airport by ISSS’s instruction but I didn’t see how to go vice versa. Thanks in advance.', '2018-11-20 10:52:26', 0, 0),
(51, 5, 'Others', 6, 'Buying medicine in KAIST', 'Hi guys, I want to know where I could buy some medicines in KAIST', '2018-11-20 10:54:53', 1, 0),
(52, 3, 'Transport', 6, 'Going back to Daejeon from Gimhae airport', 'Hi, I’ll travel to Taiwan this weekend and my return flight will arrive at Gimhae airport around 5pm, I looked up the airport’s website and it doesn’t have much information about the express bus to Daejeon. It seems like I may miss the last bus. Can anyone tell me how can I get back to Daejeon from the airport in my situation?', '2018-11-20 10:56:24', 0, 0),
(53, 2, 'Restaurant', 7, 'Recommendation for BBQ restaurant', 'Hi, I’m wondering is there any recommended BBQ restaurant nearby campus or in Daejeon? Can you tell me the name and the rough location that where it is? Thanks a lot :)', '2018-11-20 11:11:12', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Subscription`
--

CREATE TABLE `Subscription` (
  `Category_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Subscription`
--

INSERT INTO `Subscription` (`Category_ID`, `User_ID`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(5, 1),
(2, 2),
(4, 2),
(1, 3),
(2, 3),
(3, 3),
(5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `U_ID` int(11) NOT NULL,
  `Student_ID` int(20) NOT NULL,
  `U_Name` varchar(100) NOT NULL DEFAULT 'User',
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Gender` varchar(10) DEFAULT 'Male',
  `NoOfPost` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `NoOfComments` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `NoOfLikes` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `Accommodation` int(11) NOT NULL DEFAULT '0',
  `Restaurant` int(11) NOT NULL DEFAULT '0',
  `Transport` int(11) NOT NULL DEFAULT '0',
  `Academic` int(11) NOT NULL DEFAULT '0',
  `Others` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`U_ID`, `Student_ID`, `U_Name`, `Email`, `Password`, `Gender`, `NoOfPost`, `NoOfComments`, `NoOfLikes`, `Accommodation`, `Restaurant`, `Transport`, `Academic`, `Others`) VALUES
(1, 20184619, 'Jibon', 'jibon.naher09@gmail.com', '123456', 'Female', 7, 10, 16, 1, 1, 1, 0, 1),
(2, 20184922, 'Yueru', 'yuerutu@gmail.com', '234567', 'Female', 8, 4, 7, 1, 1, 0, 1, 0),
(3, 20504619, 'Khan', 'jibon@kaist.ac.kr', '456789', 'Male', 1, 1, 1, 1, 1, 1, 0, 1),
(4, 20401858, 'Brandy', 'a.ntagonist1491@gmail.com', '345678', 'Female', 7, 1, 1, 1, 0, 0, 1, 0),
(5, 20182349, 'Shihangtang', 'shihangtang23s@gmail.com', '567890', 'Female', 2, 0, 0, 0, 1, 0, 1, 0),
(6, 20189423, 'Eunseohan', 'eunseohan382@gmail.com', '678901', 'Female', 2, 2, 1, 0, 0, 1, 0, 0),
(7, 20152238, 'Haeunchoi', 'haeunchoi@gmail.com', '789012', 'Female', 1, 1, 0, 1, 1, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`Comment_ID`);

--
-- Indexes for table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`U_ID`),
  ADD UNIQUE KEY `Password` (`Password`),
  ADD UNIQUE KEY `Student ID` (`Student_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `Post`
--
ALTER TABLE `Post`
  MODIFY `Post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `U_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
