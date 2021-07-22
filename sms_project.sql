-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 11:54 AM
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
(3, 'student', 'sudent.1@example.com', 'asdfasdfasdfasf', 'Student 1'),
(4, 'student', 'modifiercrazy@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Suraj Kumar'),
(5, 'student', 'modifiercrazy@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Suraj Kumar 2'),
(6, 'student', 'modifiercrazy@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Suraj Kumar 3'),
(7, 'student', 'modifiercrazy@gmail.co', 'e807f1fcf82d132f9bb018ca6738a19f', 'Suraj kumar 4'),
(8, 'student', 'modifiercrazy@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Suraj kumar 5'),
(9, 'student', 'modifiercrazy@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Suraj kumar6'),
(10, 'student', 'modifiercrazy@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Suraj Kumar 7'),
(11, 'student', 'adsf@asdf.asddf', 'e807f1fcf82d132f9bb018ca6738a19f', 'adf'),
(12, 'student', 'asdfasf@afgae.asdf', 'e807f1fcf82d132f9bb018ca6738a19f', 'dsafsd'),
(13, 'student', 'asdfgasdfg@adfasd.aerwr', 'e807f1fcf82d132f9bb018ca6738a19f', 'adsfasdf'),
(14, 'student', 'modifiercrazy@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Suraj Kumar'),
(15, 'student', 'admin@technostudy.co.in', 'e807f1fcf82d132f9bb018ca6738a19f', 'Techno Study'),
(16, 'teacher', 'teacher@sms.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Teacher 3'),
(17, 'counseller', 'counseller@example.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'Counseller');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `section` varchar(50) NOT NULL,
  `added_date` date NOT NULL DEFAULT current_timestamp()
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
  `date` datetime NOT NULL DEFAULT current_timestamp(),
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
(2, 2, 'section', '4');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
(4, 1, 'Section B', 'Section B Description', 'section', '2021-06-20 08:03:48', '2021-06-20 08:03:48', 'publish', 0);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
