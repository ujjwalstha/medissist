-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2018 at 11:53 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medissist`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_detail`
--

CREATE TABLE `tbl_admin_detail` (
  `ID` int(2) NOT NULL,
  `NAME` varchar(150) DEFAULT NULL,
  `SLUG` varchar(150) DEFAULT NULL,
  `USERNAME` varchar(150) NOT NULL,
  `PASSWORD` varchar(150) NOT NULL,
  `ADMIN_TYPE` int(2) NOT NULL,
  `SPECIALIST_TYPE` varchar(150) DEFAULT NULL,
  `IMAGE` varchar(255) DEFAULT NULL,
  `STATUS` int(2) NOT NULL DEFAULT '1',
  `ONLINE_STATUS` int(2) NOT NULL DEFAULT '1',
  `CREATED_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_DATE` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_detail`
--

INSERT INTO `tbl_admin_detail` (`ID`, `NAME`, `SLUG`, `USERNAME`, `PASSWORD`, `ADMIN_TYPE`, `SPECIALIST_TYPE`, `IMAGE`, `STATUS`, `ONLINE_STATUS`, `CREATED_DATE`, `UPDATED_DATE`) VALUES
(1, 'Ujjwal Shrestha', 'ujjwal-shrestha', 'admin@admin.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, NULL, 'profile.jpg', 1, 0, '2018-04-20 03:02:55', '2018-04-21 23:42:23'),
(3, 'Michael Cole', 'michael-cole', 'm@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 'ENT', '101.jpg', 1, 1, '2018-04-20 18:17:28', NULL),
(8, 'Kevin Jones', 'kevin-jones', 'k@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 'Gynocologist', '92.jpg', 1, 1, '2018-04-21 16:33:37', NULL),
(5, 'William Johnson', 'william-johnson', 'w@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 'Cardiologist', '11.jpg', 1, 1, '2018-04-20 18:19:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forum_answers`
--

CREATE TABLE `tbl_forum_answers` (
  `ID` int(10) NOT NULL,
  `QUESTION_ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `ANSWER` text NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_forum_answers`
--

INSERT INTO `tbl_forum_answers` (`ID`, `QUESTION_ID`, `USER_ID`, `ANSWER`, `CREATED`) VALUES
(7, 4657, 1, 'Yess', '2018-04-20 01:11:15'),
(6, 4657, 1, 'I can see you', '2018-04-20 00:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forum_questions`
--

CREATE TABLE `tbl_forum_questions` (
  `ID` int(10) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `QUESTION` text NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_forum_questions`
--

INSERT INTO `tbl_forum_questions` (`ID`, `USER_ID`, `QUESTION`, `CREATED`) VALUES
(4665, 1, 'Hello everyone?', '2018-04-24 00:43:36'),
(4657, 3, 'I am john cena\r\n', '2018-04-19 15:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_private_message`
--

CREATE TABLE `tbl_private_message` (
  `ID` int(10) NOT NULL,
  `SENDER_ID` varchar(150) NOT NULL,
  `RECEIVER_ID` varchar(150) NOT NULL,
  `MESSAGE` text NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_private_message`
--

INSERT INTO `tbl_private_message` (`ID`, `SENDER_ID`, `RECEIVER_ID`, `MESSAGE`, `CREATED`) VALUES
(1, '1', '5', 'hello doctor?', '2018-04-22 03:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pvt_msg_1_3`
--

CREATE TABLE `tbl_pvt_msg_1_3` (
  `ID` int(6) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `USER_TYPE` varchar(30) NOT NULL,
  `MESSAGE` text NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pvt_msg_1_3`
--

INSERT INTO `tbl_pvt_msg_1_3` (`ID`, `NAME`, `USER_TYPE`, `MESSAGE`, `CREATED`) VALUES
(1, 'Michael Cole', 'admin', 'hellooo', '2018-04-22 18:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pvt_msg_1_5`
--

CREATE TABLE `tbl_pvt_msg_1_5` (
  `ID` int(6) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `USER_TYPE` varchar(30) NOT NULL,
  `MESSAGE` text NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pvt_msg_1_5`
--

INSERT INTO `tbl_pvt_msg_1_5` (`ID`, `NAME`, `USER_TYPE`, `MESSAGE`, `CREATED`) VALUES
(1, 'Ujjwal Shrestha', 'user', 'helloo therere', '2018-04-22 16:46:25'),
(2, 'Bill CLinton', 'admin', 'okay', '2018-04-22 16:46:55'),
(3, 'Ujjwal Shrestha', 'user', 'boommmm shakalalallala', '2018-04-22 17:50:18'),
(4, 'Ujjwal Shrestha', 'user', 'asdasda', '2018-04-22 17:51:01'),
(5, 'Ujjwal Shrestha', 'user', 'sadsd', '2018-04-22 18:37:55'),
(6, 'Ujjwal Shrestha', 'user', 'asdsd', '2018-04-22 18:43:01'),
(7, 'Ujjwal Shrestha', 'user', 'sdasd', '2018-04-22 18:46:04'),
(8, 'William Johnson', 'admin', 'niooooo', '2018-04-23 01:34:38'),
(9, 'William Johnson', 'admin', 'ok then', '2018-04-23 01:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pvt_msg_1_8`
--

CREATE TABLE `tbl_pvt_msg_1_8` (
  `ID` int(6) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `USER_TYPE` varchar(30) NOT NULL,
  `MESSAGE` text NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pvt_msg_1_8`
--

INSERT INTO `tbl_pvt_msg_1_8` (`ID`, `NAME`, `USER_TYPE`, `MESSAGE`, `CREATED`) VALUES
(1, 'Ujjwal Shrestha', 'user', 'asdsdas', '2018-04-22 16:42:16'),
(2, 'Ujjwal Shrestha', 'user', 'qweerer', '2018-04-22 16:43:18'),
(3, 'Ujjwal Shrestha', 'user', 'asdasd', '2018-04-22 18:13:26'),
(4, 'Ujjwal Shrestha', 'user', 'yessssssssssssssss', '2018-04-22 18:14:39'),
(5, 'Kevin Jones', 'admin', 'hi', '2018-04-23 02:03:38'),
(6, 'Kevin Jones', 'admin', 'how can i help you?', '2018-04-24 00:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pvt_msg_2_3`
--

CREATE TABLE `tbl_pvt_msg_2_3` (
  `ID` int(6) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `USER_TYPE` varchar(30) NOT NULL,
  `MESSAGE` text NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pvt_msg_2_5`
--

CREATE TABLE `tbl_pvt_msg_2_5` (
  `ID` int(6) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `USER_TYPE` varchar(30) NOT NULL,
  `MESSAGE` text NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pvt_msg_2_8`
--

CREATE TABLE `tbl_pvt_msg_2_8` (
  `ID` int(6) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `USER_TYPE` varchar(30) NOT NULL,
  `MESSAGE` text NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pvt_msg_3_5`
--

CREATE TABLE `tbl_pvt_msg_3_5` (
  `ID` int(6) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `USER_TYPE` varchar(30) NOT NULL,
  `MESSAGE` text NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pvt_msg_3_8`
--

CREATE TABLE `tbl_pvt_msg_3_8` (
  `ID` int(6) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `USER_TYPE` varchar(30) NOT NULL,
  `MESSAGE` text NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pvt_msg_9_8`
--

CREATE TABLE `tbl_pvt_msg_9_8` (
  `ID` int(6) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `USER_TYPE` varchar(30) NOT NULL,
  `MESSAGE` text NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_detail`
--

CREATE TABLE `tbl_user_detail` (
  `ID` int(10) NOT NULL,
  `FIRSTNAME` varchar(100) NOT NULL,
  `LASTNAME` varchar(100) NOT NULL,
  `SLUG` varchar(150) NOT NULL,
  `EMAIL` varchar(150) NOT NULL,
  `PASSWORD` varchar(150) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `STATUS` int(2) NOT NULL DEFAULT '1',
  `CREATED_ON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_ON` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_detail`
--

INSERT INTO `tbl_user_detail` (`ID`, `FIRSTNAME`, `LASTNAME`, `SLUG`, `EMAIL`, `PASSWORD`, `GENDER`, `STATUS`, `CREATED_ON`, `UPDATED_ON`) VALUES
(1, 'Ujjwal', 'Shrestha', 'ujjwal-jordan', 'ujjwalshrestha1996@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'male', 1, '2018-04-10 01:10:38', NULL),
(2, 'Gisela', 'Herring', 'gisela-herring', 'godak@mailinator.net', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'female', 1, '2018-04-10 01:12:01', NULL),
(3, 'John', 'Cena', 'john-cena', 'cena@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'male', 1, '2018-04-19 15:53:54', NULL),
(10, 'Haviva', 'Mendez', 'haviva-mendez', 'c@gmail.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'male', 1, '2018-04-24 00:14:22', NULL),
(9, 'Abel', 'Montgomery', 'abel-montgomery', 'cena@gmail.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'others', 1, '2018-04-24 00:13:13', NULL),
(8, 'Alma', 'Mendez', 'alma-mendez', 'godak@mailinator.net', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'others', 1, '2018-04-24 00:12:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin_detail`
--
ALTER TABLE `tbl_admin_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_forum_answers`
--
ALTER TABLE `tbl_forum_answers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_forum_questions`
--
ALTER TABLE `tbl_forum_questions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_private_message`
--
ALTER TABLE `tbl_private_message`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pvt_msg_1_3`
--
ALTER TABLE `tbl_pvt_msg_1_3`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pvt_msg_1_5`
--
ALTER TABLE `tbl_pvt_msg_1_5`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pvt_msg_1_8`
--
ALTER TABLE `tbl_pvt_msg_1_8`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pvt_msg_2_3`
--
ALTER TABLE `tbl_pvt_msg_2_3`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pvt_msg_2_5`
--
ALTER TABLE `tbl_pvt_msg_2_5`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pvt_msg_2_8`
--
ALTER TABLE `tbl_pvt_msg_2_8`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pvt_msg_3_5`
--
ALTER TABLE `tbl_pvt_msg_3_5`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pvt_msg_3_8`
--
ALTER TABLE `tbl_pvt_msg_3_8`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_pvt_msg_9_8`
--
ALTER TABLE `tbl_pvt_msg_9_8`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user_detail`
--
ALTER TABLE `tbl_user_detail`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin_detail`
--
ALTER TABLE `tbl_admin_detail`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_forum_answers`
--
ALTER TABLE `tbl_forum_answers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_forum_questions`
--
ALTER TABLE `tbl_forum_questions`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4666;
--
-- AUTO_INCREMENT for table `tbl_private_message`
--
ALTER TABLE `tbl_private_message`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pvt_msg_1_3`
--
ALTER TABLE `tbl_pvt_msg_1_3`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pvt_msg_1_5`
--
ALTER TABLE `tbl_pvt_msg_1_5`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_pvt_msg_1_8`
--
ALTER TABLE `tbl_pvt_msg_1_8`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_pvt_msg_2_3`
--
ALTER TABLE `tbl_pvt_msg_2_3`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pvt_msg_2_5`
--
ALTER TABLE `tbl_pvt_msg_2_5`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pvt_msg_2_8`
--
ALTER TABLE `tbl_pvt_msg_2_8`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pvt_msg_3_5`
--
ALTER TABLE `tbl_pvt_msg_3_5`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pvt_msg_3_8`
--
ALTER TABLE `tbl_pvt_msg_3_8`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pvt_msg_9_8`
--
ALTER TABLE `tbl_pvt_msg_9_8`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user_detail`
--
ALTER TABLE `tbl_user_detail`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
