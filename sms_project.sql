-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 27, 2023 at 07:05 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

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
(1, 'teacher', 'teacher.1@example.com', '25f9e794323b453885f5181f1b624d0b', 'Teacher 1'),
(2, 'teacher', 'teacher.2@example.com', 'adsfasdfdsfasdfaqsd', 'Teacher 2'),
(3, 'student', 'sudent.1@example.com', '25f9e794323b453885f5181f1b624d0b', 'Student 1'),
(15, 'admin', 'admin@technostudy.co.in', 'd100af17e9ab72768d551bcadeba2e59', 'Techno Study'),
(16, 'teacher', 'teacher@sms.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Teacher 3'),
(17, 'counseller', 'counseller@example.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Counseller'),
(18, 'student', '', 'e807f1fcf82d132f9bb018ca6738a19f', ''),
(19, 'student', 'asdf@asdf.asdf', '3ab8e8739c50726bceeb9a382e7e1959', 'Test User'),
(20, 'student', 'modifiercrazy@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Test user'),
(21, 'student', 'modifiercrazy-1@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Modifier Crazy'),
(22, 'student', 'test@test.com', '1f9e8bd9a3168110f6bb119d11c4d75c', 'test-1'),
(23, 'student', 'test-2@test.com', 'db5f7a798f3c5b8b1e21bd523a7b3563', 'test-2');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `attendance_month` text NOT NULL,
  `attendance_value` longtext NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `std_id` int(11) NOT NULL,
  `current_session` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `attendance_month`, `attendance_value`, `modified_date`, `std_id`, `current_session`) VALUES
(1, 'september', 'a:31:{i:1;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:1;}i:2;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:2;}i:3;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:3;}i:4;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:4;}i:5;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:5;}i:6;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:6;}i:7;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:7;}i:8;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:8;}i:9;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:9;}i:10;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:10;}i:11;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:11;}i:12;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:12;}i:13;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:13;}i:14;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:14;}i:15;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:15;}i:16;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:16;}i:17;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:17;}i:18;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:18;}i:19;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:19;}i:20;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:20;}i:21;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:21;}i:22;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:22;}i:23;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:23;}i:24;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:24;}i:25;a:3:{s:9:\"signin_at\";i:1695757080;s:10:\"signout_at\";i:1695757080;s:4:\"date\";i:25;}i:26;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:26;}i:27;a:3:{s:9:\"signin_at\";i:1695759821;s:10:\"signout_at\";i:1695759848;s:4:\"date\";s:2:\"27\";}i:28;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:28;}i:29;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:29;}i:30;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:30;}i:31;a:3:{s:9:\"signin_at\";s:0:\"\";s:10:\"signout_at\";s:0:\"\";s:4:\"date\";i:31;}}', '2023-09-27 01:54:08', 20, '2023-09-26 19:33:23');

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
  `date` datetime NOT NULL,
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
(62, 23, 'subject_id', '19'),
(63, 26, 'amount', '500'),
(64, 26, 'status', 'success'),
(65, 26, 'student_id', '20'),
(66, 26, 'month', 'September'),
(67, 27, 'amount', '500'),
(68, 27, 'status', 'success'),
(69, 27, 'student_id', '20'),
(70, 27, 'month', 'October'),
(71, 28, 'class', ''),
(72, 28, 'subject', ''),
(73, 28, 'file_attachment', 'login.php'),
(74, 29, 'class', '2'),
(75, 29, 'subject', '19'),
(76, 29, 'file_attachment', 'index.php');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL DEFAULT '1',
  `title` text NOT NULL,
  `description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
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
(23, 1, '', '', 'timetable', '2021-08-01 00:32:32', '2021-08-01 16:02:32', 'publish', 0),
(26, 20, 'September - Fee', '', 'payment', '2023-09-21 20:11:58', '0000-00-00 00:00:00', 'success', 0),
(27, 20, 'October - Fee', '', 'payment', '2023-09-23 18:53:49', '0000-00-00 00:00:00', 'success', 0),
(28, 1, 'PDF for algebra', 'PDF for algebra', 'study-material', '2023-09-26 20:55:40', '0000-00-00 00:00:00', 'publish', 0),
(29, 1, 'PDF for english', 'PDF for english', 'study-material', '2023-09-26 20:57:21', '0000-00-00 00:00:00', 'publish', 0);

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
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
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
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
