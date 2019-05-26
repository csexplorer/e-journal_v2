-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2019 at 10:35 PM
-- Server version: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 7.2.16-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_journal_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, '11-"A"'),
(2, '11-"B"'),
(3, '9-"A"'),
(4, '221-16'),
(5, '213-16');

-- --------------------------------------------------------

--
-- Table structure for table `group_subjects`
--

CREATE TABLE `group_subjects` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_subjects`
--

INSERT INTO `group_subjects` (`id`, `group_id`, `subject_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 1),
(4, 1, 4),
(5, 3, 2),
(6, 3, 3),
(7, 3, 4),
(8, 3, 1),
(9, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1553789879),
('m130524_201442_init', 1553789884);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `student_id`, `group_id`, `teacher_id`, `subject_id`, `mark`, `date`) VALUES
(28, 29, 1, 2, 2, 0, '2019-04-16 17:04:23'),
(29, 29, 1, 2, 3, 5, '2019-04-16 17:04:23'),
(30, 29, 1, 5, 1, 0, '2019-04-16 17:04:23'),
(31, 29, 1, 6, 4, 0, '2019-04-16 17:04:23'),
(32, 30, 1, 2, 2, 0, '2019-04-16 17:04:33'),
(33, 30, 1, 2, 3, 0, '2019-04-16 17:04:33'),
(34, 30, 1, 5, 1, 0, '2019-04-16 17:04:33'),
(35, 30, 1, 6, 4, 0, '2019-04-16 17:04:33'),
(36, 31, 1, 2, 2, 0, '2019-04-16 17:04:29'),
(37, 31, 1, 2, 3, 0, '2019-04-16 17:04:29'),
(38, 31, 1, 5, 1, 0, '2019-04-16 17:04:29'),
(39, 31, 1, 6, 4, 0, '2019-04-16 17:04:29'),
(40, 32, 1, 2, 2, 0, '2019-04-16 17:04:43'),
(41, 32, 1, 2, 3, 0, '2019-04-16 17:04:43'),
(42, 32, 1, 5, 1, 0, '2019-04-16 17:04:43'),
(43, 32, 1, 6, 4, 0, '2019-04-16 17:04:43'),
(44, 33, 1, 2, 2, 0, '2019-04-16 17:04:57'),
(45, 33, 1, 2, 3, 0, '2019-04-16 17:04:57'),
(46, 33, 1, 5, 1, 0, '2019-04-16 17:04:57'),
(47, 33, 1, 6, 4, 0, '2019-04-16 17:04:57'),
(48, 34, 1, 2, 2, 0, '2019-04-16 17:04:17'),
(49, 34, 1, 2, 3, 0, '2019-04-16 17:04:17'),
(50, 34, 1, 5, 1, 0, '2019-04-16 17:04:17'),
(51, 34, 1, 6, 4, 0, '2019-04-16 17:04:17'),
(52, 35, 3, 2, 2, 0, '2019-04-16 17:04:28'),
(53, 35, 3, 2, 3, 0, '2019-04-16 17:04:28'),
(54, 35, 3, 6, 4, 0, '2019-04-16 17:04:28'),
(55, 35, 3, 5, 1, 0, '2019-04-16 17:04:28'),
(56, 35, 3, 6, 5, 3, '2019-04-16 17:04:28'),
(57, 36, 3, 2, 2, 0, '2019-04-16 17:04:39'),
(58, 36, 3, 2, 3, 0, '2019-04-16 17:04:39'),
(59, 36, 3, 6, 4, 0, '2019-04-16 17:04:39'),
(60, 36, 3, 5, 1, 0, '2019-04-16 17:04:39'),
(61, 36, 3, 6, 5, 0, '2019-04-16 17:04:39'),
(62, 37, 3, 2, 2, 0, '2019-04-16 17:04:09'),
(63, 37, 3, 2, 3, 0, '2019-04-16 17:04:09'),
(64, 37, 3, 6, 4, 0, '2019-04-16 17:04:09'),
(65, 37, 3, 5, 1, 0, '2019-04-16 17:04:09'),
(66, 37, 3, 6, 5, 0, '2019-04-16 17:04:09'),
(67, 38, 3, 2, 2, 0, '2019-04-16 17:04:26'),
(68, 38, 3, 2, 3, 0, '2019-04-16 17:04:26'),
(69, 38, 3, 6, 4, 0, '2019-04-16 17:04:26'),
(70, 38, 3, 5, 1, 0, '2019-04-16 17:04:26'),
(71, 38, 3, 6, 5, 0, '2019-04-16 17:04:26'),
(72, 39, 1, 2, 2, 5, '2019-04-16 17:04:23'),
(73, 39, 1, 2, 3, 0, '2019-04-16 17:04:23'),
(74, 39, 1, 5, 1, 0, '2019-04-16 17:04:23'),
(75, 39, 1, 6, 4, 0, '2019-04-16 17:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fullname`, `group_id`) VALUES
(29, 'Mamajonov Salimjon Usmon o\'g\'li', 1),
(30, 'Kimsanboyev Nurillo Alijonovich', 1),
(31, 'Ochilov Javlon', 1),
(32, 'Saidov Mehriddin', 1),
(33, 'Ochilov Temur', 1),
(34, 'Ismoilov Nurillo Abdurashid o\'g\'li', 1),
(35, 'Turg\'unboyev Doniyor Ikromjon o\'g\'li', 3),
(36, 'Muzaffarov Ismoil', 3),
(37, 'Mamasoliyev Iqbol Xudobergan o\'g\'li', 3),
(38, 'Xolmatov Farrux', 3),
(39, 'Turg\'unboyev Abrorjon Ikromjon o\'g\'li', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`) VALUES
(6, 'Biologiya'),
(2, 'Fizika'),
(3, 'Informatika'),
(4, 'Ingliz tili'),
(1, 'Matematika'),
(5, 'Rus-tili');

-- --------------------------------------------------------

--
-- Table structure for table `subject_teachers`
--

CREATE TABLE `subject_teachers` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject_teachers`
--

INSERT INTO `subject_teachers` (`id`, `subject_id`, `teacher_id`) VALUES
(1, 2, 2),
(2, 3, 2),
(3, 3, 3),
(4, 3, 3),
(5, 1, 5),
(6, 1, 4),
(7, 5, 6),
(8, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `fullname`) VALUES
(1, 'Teshayev Ergash Mahkamovich'),
(2, 'Mamasoliyev Zoir Xudoberganovich'),
(3, 'Astanaqulov Maxpirali Ilyosovich'),
(4, 'Atamatov Bahtiyor Ixtoyorovich'),
(5, 'Ismoilov Xasanboy Xursanovich'),
(6, 'Mallayev Oybek');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'IjgY7t6LwWiVW7oGiPe4xPKdTsg-pgCX', '$2y$13$qiXb83XjDTbbN5KSgCAuQ.akYuLjTXu.2hRZxXC5ztMLKO96HGH56', NULL, 'admin@e-journal.uz', 10, 1553789928, 1553789928);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_subjects`
--
ALTER TABLE `group_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `group_subjects`
--
ALTER TABLE `group_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_subjects`
--
ALTER TABLE `group_subjects`
  ADD CONSTRAINT `group_subjects_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `group_subjects_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `rating_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `rating_ibfk_4` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `subject_teachers`
--
ALTER TABLE `subject_teachers`
  ADD CONSTRAINT `subject_teachers_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `subject_teachers_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
