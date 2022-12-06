-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2021 at 04:57 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `type`, `email`, `password`, `name`) VALUES
(1, 'teacher', 'teacher.1@example.com', 'asdfasdfasdf', 'Teacher 1'),
(2, 'teacher', 'teacher.2@example.com', 'adsfasdfdsfasdfaqsd', 'Teacher 2'),
(3, 'student', 'sudent.1@example.com', '25f9e794323b453885f5181f1b624d0b', 'Student 1'),
(15, 'admin', 'admin@technostudy.co.in', 'd100af17e9ab72768d551bcadeba2e59', 'Techno Study'),
(16, 'teacher', 'teacher@sms.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Teacher 3'),
(17, 'counseller', 'counseller@example.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Counseller'),
(18, 'student', '', 'e807f1fcf82d132f9bb018ca6738a19f', ''),
(19, 'student', 'asdf@asdf.asdf', '3ab8e8739c50726bceeb9a382e7e1959', 'Test User'),
(20, 'student', 'modifiercrazy@gmail.com', '4c30e802c6107198a198ce5dff60b77f', 'Test user -2'),
(21, 'student', 'modifiercrazy-1@gmail.com', '4c30e802c6107198a198ce5dff60b77f', 'Test user -2'),
(22, 'student', 'test@test.com', '1f9e8bd9a3168110f6bb119d11c4d75c', 'test-1'),
(23, 'student', 'test-2@test.com', 'db5f7a798f3c5b8b1e21bd523a7b3563', 'test-2');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `section` varchar(50) NOT NULL,
  `added_date` date NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `title`, `section`, `added_date`) VALUES
(1, 'Class-1', '1', '2020-10-03'),
(2, 'Class-2', '1', '2020-10-03'),
(3, 'Class-3', '1,2,3', '2020-10-03'),
(4, 'dsafsd', '1,2', '2021-02-06'),
(5, 'sadsad', '2', '2021-02-06');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category` text NOT NULL,
  `duration` text NOT NULL,
  `date` datetime NOT NULL ,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `category`, `duration`, `date`, `image`) VALUES
(1, 'Web Desing & Development', 'Programming', '45 hours', '2020-11-16 21:32:04', 'kisspng-health-care-medicine-hospital-physician-pharmacy-laptop-and-stethoscope-5a84e9a14344a2.4705808715186600012755.png'),
(3, 'HTML', 'web-design-and-development', '2 Hour', '2021-02-02 00:00:00', 'kisspng-web-development-responsive-web-design-search-engin-software-5ac4e9b074aed9.8952166715228543204779.png'),
(4, 'CSS', 'web-design-and-development', '2 Hour', '2021-02-02 00:00:00', 'screen.png'),
(5, 'JS', 'web-design-and-development', '2 Hour', '2021-02-02 00:00:00', 'layout.png'),
(6, 'Bootstrap', 'web-design-and-development', '2 Hour', '2021-02-02 00:00:00', 'kisspng-web-development-responsive-web-design-digital-mark-web-design-5acb1289875160.7034743315232579935543.png'),
(7, 'CSS', '', '2 Hour', '2021-02-02 00:00:00', 'business-1031754_1280.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `metadata`
--

CREATE TABLE `metadata` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `meta_key` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metadata`
--

INSERT INTO `metadata` (`id`, `item_id`, `meta_key`, `meta_value`) VALUES
(1, 2, 'section', '3'),
(2, 2, 'section', '4'),
(3, 7, 'day_name', 'monday'),
(4, 7, 'teacher_id', '2'),
(5, 7, 'subject_id', '19'),
(6, 7, 'period_id', '5'),
(23, 16, 'from', '08:30'),
(24, 16, 'to', '09:15'),
(25, 17, 'from', '09:15'),
(26, 17, 'to', '10:00'),
(27, 5, 'from', '07:00'),
(28, 5, 'to', '07:45'),
(29, 6, 'from', '07:45'),
(30, 6, 'to', '08:30'),
(31, 18, 'class_id', '1'),
(32, 18, 'section_id', '4'),
(33, 18, 'teacher_id', '2'),
(34, 18, 'period_id', '5'),
(35, 18, 'day_name', 'tuesday'),
(36, 18, 'subject_id', '19'),
(37, 7, 'class_id', '1'),
(38, 7, 'section_id', '4'),
(39, 20, 'class_id', '1'),
(40, 20, 'section_id', '4'),
(41, 20, 'teacher_id', '1'),
(42, 20, 'period_id', '16'),
(43, 20, 'day_name', 'wednesday'),
(44, 20, 'subject_id', '19'),
(45, 21, 'class_id', '2'),
(46, 21, 'section_id', '3'),
(47, 21, 'teacher_id', '2'),
(48, 21, 'period_id', '17'),
(49, 21, 'day_name', 'sunday'),
(50, 21, 'subject_id', '20'),
(51, 22, 'class_id', '2'),
(52, 22, 'section_id', '4'),
(53, 22, 'teacher_id', '2'),
(54, 22, 'period_id', '6'),
(55, 22, 'day_name', 'tuesday'),
(56, 22, 'subject_id', '19'),
(57, 23, 'class_id', '2'),
(58, 23, 'section_id', '3'),
(59, 23, 'teacher_id', '2'),
(60, 23, 'period_id', '17'),
(61, 23, 'day_name', 'monday'),
(62, 23, 'subject_id', '19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL DEFAULT 1,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `publish_date` timestamp NOT NULL ,
  `modified_date` timestamp NOT NULL  ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `description`, `type`, `publish_date`, `modified_date`, `status`, `parent`) VALUES
(1, 1, 'Class -1', 'Class -1 Description', 'class', '2021-06-20 08:02:16', '2021-06-20 08:02:16', 'publish', 0),
(2, 1, 'Class -2', 'Class -2 Description', 'class', '2021-06-20 08:02:16', '2021-06-20 08:02:16', 'publish', 0),
(3, 1, 'Section A', 'Section A Description', 'section', '2021-06-20 08:03:48', '2021-06-20 08:03:48', 'publish', 0),
(4, 1, 'Section B', 'Section B Description', 'section', '2021-06-20 08:03:48', '2021-06-20 08:03:48', 'publish', 0),
(5, 1, 'First Period', 'First Period Description', 'period', '2021-07-23 14:23:34', '2021-07-23 14:23:34', 'publish', 0),
(6, 1, 'Second Period', 'Second Period Description', 'period', '2021-07-23 14:23:34', '2021-07-23 14:23:34', 'publish', 0),
(7, 1, 'Monday - First Period', 'Monday - First Period Descrioption', 'timetable', '2021-07-23 14:36:38', '2021-07-23 14:36:38', 'publish', 0),
(16, 1, 'Third Period', '', 'period', '2021-07-23 22:52:35', '2021-07-24 14:22:35', 'publish', 0),
(17, 1, 'Fourth', '', 'period', '2021-07-23 22:53:56', '2021-07-24 14:23:56', 'publish', 0),
(18, 1, '', '', 'timetable', '2021-07-24 22:47:42', '2021-07-25 14:17:42', 'publish', 0),
(19, 1, 'Mathematics', '', 'subject', '2021-07-25 14:29:09', '2021-07-25 14:29:09', 'publish', 0),
(20, 1, '', '', 'timetable', '2021-07-24 23:01:44', '2021-07-25 14:31:44', 'publish', 0),
(21, 1, '', '', 'timetable', '2021-08-01 00:21:24', '2021-08-01 15:51:24', 'publish', 0),
(22, 1, '', '', 'timetable', '2021-08-01 00:28:15', '2021-08-01 15:58:15', 'publish', 0),
(23, 1, '', '', 'timetable', '2021-08-01 00:32:32', '2021-08-01 16:02:32', 'publish', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`) VALUES
(1, 'Section A'),
(2, 'Seciton B'),
(3, 'Section C'),
(4, 'Section D');

-- --------------------------------------------------------

--
-- Table structure for table `usermeta`
--

CREATE TABLE `usermeta` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `meta_key` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usermeta`
--

INSERT INTO `usermeta` (`id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 20, 'dob', ''),
(2, 20, 'mobile', ''),
(3, 21, 'dob', '2008-09-16'),
(4, 21, 'mobile', ''),
(5, 22, 'dob', '2021-08-13'),
(6, 22, 'mobile', ''),
(7, 22, 'payment_method', 'offline'),
(8, 22, 'class', '5'),
(9, 23, 'dob', '2021-08-20'),
(10, 23, 'mobile', ''),
(11, 23, 'payment_method', 'offline'),
(12, 23, 'class', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermeta`
--
ALTER TABLE `usermeta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usermeta`
--
ALTER TABLE `usermeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
