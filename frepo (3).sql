-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 07:19 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frepo`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_title`) VALUES
(1, 'cmpn'),
(2, 'inft'),
(3, 'etrx'),
(4, 'extc'),
(5, 'biomed');

-- --------------------------------------------------------

--
-- Table structure for table `domain`
--

CREATE TABLE `domain` (
  `domain_id` int(11) NOT NULL,
  `domain_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `domain`
--

INSERT INTO `domain` (`domain_id`, `domain_name`) VALUES
(1, 'algorithms'),
(2, 'databases'),
(3, 'image processing'),
(4, 'web development'),
(5, 'app development'),
(6, 'machine learning'),
(7, 'cyber security'),
(8, 'integrated circuits'),
(9, 'signal processing'),
(10, 'communications'),
(11, 'micro-electronics'),
(12, 'medical devices'),
(13, 'biomaterials'),
(14, 'biosignal processing'),
(15, 'biomechanics');

-- --------------------------------------------------------

--
-- Table structure for table `domain_department`
--

CREATE TABLE `domain_department` (
  `department_id` int(11) NOT NULL,
  `domain_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `domain_department`
--

INSERT INTO `domain_department` (`department_id`, `domain_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(5, 12),
(5, 13),
(5, 14),
(5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `domain_mentor`
--

CREATE TABLE `domain_mentor` (
  `mentor_id` int(11) NOT NULL,
  `domain_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `domain_mentor`
--

INSERT INTO `domain_mentor` (`mentor_id`, `domain_id`) VALUES
(1, 1),
(1, 2),
(1, 5),
(2, 4),
(2, 5),
(2, 7),
(3, 3),
(3, 6),
(3, 10),
(4, 2),
(4, 4),
(4, 5),
(4, 10),
(5, 8),
(5, 9),
(5, 11),
(6, 7),
(6, 10),
(6, 11),
(6, 12),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 8),
(8, 11),
(9, 9),
(15, 14),
(18, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `mentor_id` int(11) NOT NULL,
  `mentor_name` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `liv_proj_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`mentor_id`, `mentor_name`, `department_id`, `liv_proj_count`) VALUES
(1, 'Prof. Rugved Deolekar', 1, NULL),
(2, 'Prof. Swapnil Sonawane', 1, NULL),
(3, 'Prof. A', 2, NULL),
(4, 'Prof. b', 2, NULL),
(5, 'Prof. c', 3, NULL),
(6, 'Prof. d', 4, NULL),
(7, 'Prof. e', 5, NULL),
(8, 'Sanjeev Dwivedi', 1, NULL),
(9, 'Prof. Snehal Andhare ', 1, NULL),
(10, 'Prof. Prita Patil ', 1, NULL),
(11, 'Prof. Suvarna Bhat', 1, NULL),
(12, 'Prof. Yash Shah', 2, NULL),
(13, 'Prof. Bhanu Tekwani', 2, NULL),
(14, 'Prof. Mayurkumar Nanda', 4, NULL),
(15, 'pratik borhade', 1, NULL),
(16, 'sb', 2, NULL),
(17, 'dhake baba', 4, NULL),
(18, 'mandar sir', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_title` varchar(255) DEFAULT NULL,
  `year_upload` int(11) DEFAULT NULL,
  `domain_id` int(11) DEFAULT NULL,
  `mentor_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `mem_1_lead` varchar(255) DEFAULT NULL,
  `roll_no_1` varchar(10) DEFAULT NULL,
  `mem_2` varchar(255) DEFAULT NULL,
  `roll_no_2` varchar(10) DEFAULT NULL,
  `mem_3` varchar(255) DEFAULT NULL,
  `roll_no_3` varchar(10) DEFAULT NULL,
  `mem_4` varchar(255) DEFAULT NULL,
  `roll_no_4` varchar(10) DEFAULT NULL,
  `mem_5` varchar(255) DEFAULT NULL,
  `roll_no_5` varchar(10) DEFAULT NULL,
  `mem_6` varchar(255) DEFAULT NULL,
  `roll_no_6` varchar(10) DEFAULT NULL,
  `ssummary` varchar(550) DEFAULT NULL,
  `synopsis_path` varchar(300) DEFAULT NULL,
  `ppt_path` varchar(300) DEFAULT NULL,
  `report_path` varchar(300) DEFAULT NULL,
  `publication_path` varchar(300) DEFAULT NULL,
  `vid_link` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_title`, `year_upload`, `domain_id`, `mentor_id`, `user_id`, `department_id`, `mem_1_lead`, `roll_no_1`, `mem_2`, `roll_no_2`, `mem_3`, `roll_no_3`, `mem_4`, `roll_no_4`, `mem_5`, `roll_no_5`, `mem_6`, `roll_no_6`, `ssummary`, `synopsis_path`, `ppt_path`, `report_path`, `publication_path`, `vid_link`) VALUES
(4, 'trial1', 67, 3, 2, 1, 1, 'A B C', '19102A0033', 'd', '1', 'e', '2', 'f', '3', 'g', '4', 'h', '5', 'go', 'Experiment 10-java(sbl).pdf', 'Binary Search non-recursive(exp-19) DS.pdf', 'Experiment 9-java(sbl) (1).pdf', 'Binary Search non-recursive(exp-19) DS.pdf', 'https://www.youtube.com/watch?v=o_go-8TFBXs'),
(5, 'trial2', 2020, 3, 2, 5, 1, 'teacher a teacher', NULL, 'Prof Swapnil Sonawane', NULL, 'Prof Prita Patil', NULL, 'Prof Goivind Mali', NULL, 'Prof Sanjeev Dwivedi', NULL, 'Prof Prakash Parmar', NULL, 'This is first project sample from teacher dashboard', 'Experiment 9-java(sbl).pdf', 'Experiment 9-java(sbl).pdf', 'Experiment 9-java(sbl).pdf', 'Experiment 9-java(sbl).pdf', 'https://www.youtube.com/watch?v=zMDPf1PQNpM'),
(7, 'trial3', 67, 6, 1, 5, 1, 'A B C', NULL, 'd', NULL, 'e', NULL, 'f', NULL, 'g', NULL, 'h', NULL, 'check', 'Experiment 9-java(sbl).pdf', 'Experiment 9-java(sbl).pdf', 'Experiment 9-java(sbl).pdf', 'Experiment 9-java(sbl).pdf', 'https://www.youtube.com/watch?v=zMDPf1PQNpM'),
(8, 'trial5', 2020, 3, 1, 5, 2, 'teacher a teacher', NULL, 'Prof Swapnil Sonawane', NULL, 'Prof Prita Patil', NULL, 'Prof Goivind Mali', NULL, 'Prof Sanjeev Dwivedi', NULL, 'Prof Prakash Parmar', NULL, 'a', 'Experiment 9-java(sbl).pdf', 'Experiment 9-java(sbl).pdf', 'Experiment 9-java(sbl).pdf', 'Experiment 9-java(sbl).pdf', 'https://www.youtube.com/watch?v=zMDPf1PQNpM'),
(9, 'chatbot ex 1', 2019, 1, 2, 1, 1, 'A B C', '19102A0033', 'd', '1', 'e', '2', 'f', '3', 'g', '4', 'h', '5', 'finale check wthot int 1', 'Experiment 9-java(sbl).pdf', 'Experiment 11-java(sbl).pdf', 'Experiment 10-java(sbl).pdf', 'Experiment 11-java(sbl).pdf', 'https://www.youtube.com/watch?v=zMDPf1PQNpM');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'staff'),
(2, 'student'),
(3, 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `vdummy`
--

CREATE TABLE `vdummy` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `roll_no` varchar(10) DEFAULT NULL,
  `year_study` int(11) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `division` varchar(1) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vdummy`
--

INSERT INTO `vdummy` (`user_id`, `name`, `role_id`, `roll_no`, `year_study`, `phone`, `department_id`, `division`, `email_id`, `password`) VALUES
(1, 'A B C', 2, '19102A0033', 4, 2147483647, 1, 'B', 'a.c@vit.edu.in', 'myac2'),
(2, 'Pratham Umesh Shinde', 2, '19102B0057', 2, 3333333333, 2, 'A', 'pratham.shinde@vit.edu.in', 'majhamichshana'),
(4, 'First Middle Last', 1, NULL, NULL, 2147483647, 1, NULL, 'first.last@vit.edu.in', 'firstteacher'),
(5, 'teacher a teacher', 3, NULL, NULL, 3333333333, 1, NULL, 'teacher1@vit.edu.in', 'teacheravit'),
(6, 'Student 1 Name', 2, '19102A0023', 2, 7506852144, 1, 'A', 'student1.name@vit.edu.in', 'student1'),
(7, 'Student 2 Name', 2, '19102A0099', 2, 9999999999, 3, 'B', 'student2.name@vit.edu.in', 'student2'),
(8, 'Student 3 Name', 2, '18101A0088', 3, 7777777777, 2, 'A', 'student3.name@vit.edu.in', 'student3'),
(9, 'Student 4 Name', 2, '18102B0098', 3, 9090909090, 2, 'B', 'student4.name@vit.edu.in', 'student4'),
(10, 'Student 5 Name', 2, '17101A0099', 4, 8989898989, 1, 'A', 'student5.name@vit.edu.in', 'student5'),
(11, 'Student 6 Name', 2, '17102A0098', 4, 9797979797, 2, 'B', 'student6.name@vit.edu.in', 'student6'),
(12, 'Student 7 Name', 2, '17102B0079', 4, 8888888888, 3, 'A', 'student7.name@vit.edu.in', 'student7'),
(13, 'Staff 1 Name', 1, NULL, NULL, 909090909, 1, NULL, 'staff1.name@vit.edu.in', 'staff1'),
(14, 'Staff 2 Name', 1, NULL, NULL, 8181818181, 3, NULL, 'staff2.name@vit.edu.in', 'staff2'),
(15, 'Staff 3 Name', 1, NULL, NULL, 8787878787, 2, NULL, 'staff3.name@vit.edu.in', 'staff3'),
(16, 'Teacher 1 Name', 3, NULL, NULL, 909090909, 1, NULL, 'teacher1.name@vit.edu.in', 'teacher1'),
(17, 'Teacher 2 Name', 3, NULL, NULL, 8181818181, 3, NULL, 'teacher2.name@vit.edu.in', 'teacher2'),
(18, 'Teacher 3 Name', 3, NULL, NULL, 8787878787, 2, NULL, 'teacher3.name@vit.edu.in', 'teacher3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`domain_id`);

--
-- Indexes for table `domain_department`
--
ALTER TABLE `domain_department`
  ADD PRIMARY KEY (`department_id`,`domain_id`),
  ADD KEY `domain_id` (`domain_id`);

--
-- Indexes for table `domain_mentor`
--
ALTER TABLE `domain_mentor`
  ADD PRIMARY KEY (`mentor_id`,`domain_id`),
  ADD KEY `domain_id` (`domain_id`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`mentor_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `domain_id` (`domain_id`),
  ADD KEY `mentor_id` (`mentor_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `project_title` (`project_title`) USING BTREE;

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `vdummy`
--
ALTER TABLE `vdummy`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `email_id_2` (`email_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `domain`
--
ALTER TABLE `domain`
  MODIFY `domain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mentor`
--
ALTER TABLE `mentor`
  MODIFY `mentor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vdummy`
--
ALTER TABLE `vdummy`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `domain_department`
--
ALTER TABLE `domain_department`
  ADD CONSTRAINT `domain_department_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `domain_department_ibfk_2` FOREIGN KEY (`domain_id`) REFERENCES `domain` (`domain_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `domain_mentor`
--
ALTER TABLE `domain_mentor`
  ADD CONSTRAINT `domain_mentor_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`mentor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `domain_mentor_ibfk_2` FOREIGN KEY (`domain_id`) REFERENCES `domain` (`domain_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mentor`
--
ALTER TABLE `mentor`
  ADD CONSTRAINT `mentor_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`domain_id`) REFERENCES `domain` (`domain_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`mentor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `vdummy` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vdummy`
--
ALTER TABLE `vdummy`
  ADD CONSTRAINT `vdummy_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vdummy_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
