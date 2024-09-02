-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 10:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_enrollments`
--

CREATE TABLE `course_enrollments` (
  `rollno` varchar(25) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_enrollments`
--

INSERT INTO `course_enrollments` (`rollno`, `course_id`, `year`, `semester`) VALUES
('102', 'MTECH003', 2, '3'),
('102', 'MTECH004', 2, '4'),
('103', 'BCE006', 3, '6'),
('103', 'BCS005', 3, '5'),
('104', 'MTECH007', 4, '7'),
('104', 'MTECH008', 4, '8'),
('105', 'BCE002', 1, '2'),
('106', 'MTECH003', 2, '3'),
('107', 'MTECH004', 2, '4'),
('108', 'BCS005', 3, '5'),
('109', 'BCE006', 3, '6'),
('110', 'MTECH007', 4, '7'),
('111', 'MTECH008', 4, '8'),
('113', 'BCE002', 1, '2'),
('114', 'MTECH003', 2, '3'),
('115', 'MTECH004', 2, '4'),
('116', 'BCS005', 3, '5'),
('117', 'BCE006', 3, '6'),
('118', 'MTECH007', 4, '7'),
('119', 'MTECH008', 4, '8'),
('121', 'BCE002', 1, '2'),
('122', 'MTECH003', 2, '3'),
('123', 'MTECH004', 2, '4'),
('124', 'BCS005', 3, '5'),
('125', 'BCE006', 3, '6'),
('126', 'MTECH007', 4, '7'),
('127', 'MTECH008', 4, '8'),
('129', 'BCE002', 1, '2'),
('130', 'MTECH003', 2, '3'),
('131', 'MTECH004', 2, '4'),
('132', 'BCS005', 3, '5'),
('133', 'BCE006', 3, '6'),
('134', 'MTECH007', 4, '7'),
('135', 'MTECH008', 4, '8'),
('137', 'BCE002', 1, '2'),
('138', 'MTECH003', 2, '3'),
('139', 'MTECH004', 2, '4'),
('140', 'BCS005', 3, '5'),
('141', 'BCE006', 3, '6'),
('142', 'MTECH007', 4, '7'),
('143', 'MTECH008', 4, '8'),
('145', 'BCE002', 1, '2'),
('146', 'MTECH003', 2, '3'),
('147', 'MTECH004', 2, '4'),
('148', 'BCS005', 3, '5'),
('149', 'BCE006', 3, '6'),
('150', 'MTECH007', 4, '7'),
('99', 'MTECH003', 2, '3');

-- --------------------------------------------------------

--
-- Table structure for table `course_grades`
--

CREATE TABLE `course_grades` (
  `rollno` varchar(25) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `grade` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_grades`
--

INSERT INTO `course_grades` (`rollno`, `course_id`, `year`, `semester`, `grade`) VALUES
('102', 'MTECH003', 2, '3', 'BB'),
('102', 'MTECH004', 2, '4', 'BC'),
('103', 'BCE006', 3, '6', 'CD'),
('103', 'BCS005', 3, '5', 'CC'),
('104', 'MTECH007', 4, '7', 'DD'),
('104', 'MTECH008', 4, '8', 'F'),
('105', 'BCE002', 1, '2', 'AB'),
('106', 'MTECH003', 2, '3', 'BB'),
('107', 'MTECH004', 2, '4', 'BC'),
('108', 'BCS005', 3, '5', 'CC'),
('109', 'BCE006', 3, '6', 'CD'),
('110', 'MTECH007', 4, '7', 'DD'),
('111', 'MTECH008', 4, '8', 'F'),
('113', 'BCE002', 1, '2', 'AB'),
('114', 'MTECH003', 2, '3', 'BB'),
('115', 'MTECH004', 2, '4', 'BC'),
('116', 'BCS005', 3, '5', 'CC'),
('117', 'BCE006', 3, '6', 'CD'),
('118', 'MTECH007', 4, '7', 'DD'),
('119', 'MTECH008', 4, '8', 'F'),
('121', 'BCE002', 1, '2', 'AB'),
('122', 'MTECH003', 2, '3', 'BB'),
('123', 'MTECH004', 2, '4', 'BC'),
('124', 'BCS005', 3, '5', 'CC'),
('125', 'BCE006', 3, '6', 'CD'),
('126', 'MTECH007', 4, '7', 'DD'),
('127', 'MTECH008', 4, '8', 'F'),
('129', 'BCE002', 1, '2', 'AB'),
('130', 'MTECH003', 2, '3', 'BB'),
('131', 'MTECH004', 2, '4', 'BC'),
('132', 'BCS005', 3, '5', 'CC'),
('133', 'BCE006', 3, '6', 'CD'),
('134', 'MTECH007', 4, '7', 'DD'),
('135', 'MTECH008', 4, '8', 'F'),
('137', 'BCE002', 1, '2', 'AB'),
('138', 'MTECH003', 2, '3', 'BB'),
('139', 'MTECH004', 2, '4', 'BC'),
('140', 'BCS005', 3, '5', 'CC'),
('141', 'BCE006', 3, '6', 'CD'),
('142', 'MTECH007', 4, '7', 'DD'),
('143', 'MTECH008', 4, '8', 'F'),
('145', 'BCE002', 1, '2', 'AB'),
('146', 'MTECH003', 2, '3', 'BB'),
('147', 'MTECH004', 2, '4', 'BC'),
('148', 'BCS005', 3, '5', 'CC'),
('149', 'BCE006', 3, '6', 'CD'),
('150', 'MTECH007', 4, '7', 'DD');

-- --------------------------------------------------------

--
-- Table structure for table `course_info`
--

CREATE TABLE `course_info` (
  `course_id` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_info`
--

INSERT INTO `course_info` (`course_id`, `course_name`) VALUES
('BCE002', 'History 101'),
('BCE006', 'English Literature 301'),
('BCE010', 'Art History 101'),
('BCE014', 'Psychology 301'),
('BCE018', 'Physics 101'),
('BCE022', 'English Literature 302'),
('BCE026', 'Art History 102'),
('BCE030', 'Psychology 302'),
('BCE034', 'Physics 102'),
('BCE038', 'English Literature 303'),
('BCE042', 'Art History 103'),
('BCE046', 'Psychology 303'),
('BCE050', 'Physics 103'),
('BCS005', 'Computer Science 301'),
('BCS013', 'Programming 301'),
('BCS017', 'Chemistry 101'),
('BCS021', 'Computer Science 302'),
('BCS025', 'Statistics 102'),
('BCS029', 'Programming 302'),
('BCS033', 'Chemistry 102'),
('BCS037', 'Computer Science 303'),
('BCS041', 'Statistics 103'),
('BCS045', 'Programming 303'),
('BCS049', 'Chemistry 103'),
('MTECH003', 'Physics 201'),
('MTECH004', 'Chemistry 201'),
('MTECH007', 'Psychology 401'),
('MTECH008', 'Economics 401'),
('MTECH011', 'Biology 201'),
('MTECH012', 'Geology 201'),
('MTECH015', 'Environmental Science 401'),
('MTECH016', 'Marketing 401'),
('MTECH019', 'Mathematics 201'),
('MTECH020', 'History 201'),
('MTECH023', 'Psychology 402'),
('MTECH024', 'Economics 402'),
('MTECH027', 'Biology 202'),
('MTECH028', 'Geology 202'),
('MTECH031', 'Environmental Science 402'),
('MTECH032', 'Marketing 402'),
('MTECH035', 'Mathematics 202'),
('MTECH036', 'History 202'),
('MTECH039', 'Psychology 403'),
('MTECH040', 'Economics 403'),
('MTECH043', 'Biology 203'),
('MTECH044', 'Geology 203'),
('MTECH047', 'Environmental Science 403'),
('MTECH048', 'Marketing 403');

-- --------------------------------------------------------

--
-- Table structure for table `course_offerings`
--

CREATE TABLE `course_offerings` (
  `year` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `course_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_offerings`
--

INSERT INTO `course_offerings` (`year`, `semester`, `course_id`) VALUES
(1, '1', 'BCS017'),
(1, '1', 'BCS025'),
(1, '1', 'BCS033'),
(1, '1', 'BCS041'),
(1, '1', 'BCS049'),
(1, '2', 'BCE002'),
(1, '2', 'BCE010'),
(1, '2', 'BCE018'),
(1, '2', 'BCE026'),
(1, '2', 'BCE034'),
(1, '2', 'BCE042'),
(1, '2', 'BCE050'),
(2, '3', 'MTECH003'),
(2, '3', 'MTECH011'),
(2, '3', 'MTECH019'),
(2, '3', 'MTECH027'),
(2, '3', 'MTECH035'),
(2, '3', 'MTECH043'),
(2, '4', 'MTECH004'),
(2, '4', 'MTECH012'),
(2, '4', 'MTECH020'),
(2, '4', 'MTECH028'),
(2, '4', 'MTECH036'),
(2, '4', 'MTECH044'),
(3, '5', 'BCS005'),
(3, '5', 'BCS013'),
(3, '5', 'BCS021'),
(3, '5', 'BCS029'),
(3, '5', 'BCS037'),
(3, '5', 'BCS045'),
(3, '6', 'BCE006'),
(3, '6', 'BCE014'),
(3, '6', 'BCE022'),
(3, '6', 'BCE030'),
(3, '6', 'BCE038'),
(3, '6', 'BCE046'),
(4, '7', 'MTECH007'),
(4, '7', 'MTECH015'),
(4, '7', 'MTECH023'),
(4, '7', 'MTECH031'),
(4, '7', 'MTECH039'),
(4, '7', 'MTECH047'),
(4, '8', 'MTECH008'),
(4, '8', 'MTECH016'),
(4, '8', 'MTECH024'),
(4, '8', 'MTECH032'),
(4, '8', 'MTECH040'),
(4, '8', 'MTECH048');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `rollno` varchar(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`rollno`, `name`, `password`, `year`, `semester`, `active`) VALUES
('102', 'Jane Smith', '32250170a0dca92d53ec9624f336ca24', 1, 2, 1),
('103', 'Michael Johnson', '7c6a180b36896a0a8c02787eeafb0e4c', 2, 3, 1),
('104', 'Emily Brown', 'bb77d0d3b3f239fa5db73bdf27b8d29a', 2, 4, 1),
('105', 'David Wilson', 'e10adc3949ba59abbe56e057f20f883e', 3, 5, 1),
('106', 'Sarah Davis', '34819d7beeabb9260a5c854bc85b3e44', 3, 6, 1),
('107', 'Chris Moore', 'e80b5017098950fc58aad83c8c14978e', 4, 7, 1),
('108', 'Lisa Taylor', 'f30aa7a662c728b7407c54ae6bfd27d1', 4, 8, 1),
('109', 'Mark Anderson', '0f359740bd1cda994f8b55330c86d845', 1, 1, 1),
('110', 'Olivia Martinez', '0d107d09f5bbe40cade3de5c71e9e9b7', 1, 2, 1),
('111', 'William Taylor', '5d7845ac6ee7cfffafc5fe5f35cf666d', 2, 3, 1),
('112', 'Emma White', '482c811da5d5b4bc6d497ffa98491e38', 2, 4, 1),
('113', 'James Wilson', '95e691bf1df7de910c74f2962a430920', 3, 5, 1),
('114', 'Grace Johnson', 'ef73781effc5774100f87fe2f437a435', 3, 6, 1),
('115', 'Robert Davis', 'd8578edf8458ce06fbc5bb76a58c5ca4', 4, 7, 1),
('116', 'Sophia Harris', 'bed128365216c019988915ed3add75fb', 4, 8, 1),
('117', 'Michael Smith', 'f25a2fc72690b780b2a14e140ef6a9e0', 1, 1, 1),
('118', 'Ava Johnson', '0192023a7bbd73250516f069df18b500', 1, 2, 1),
('119', 'David Martin', '82a3f212c95c1516907f27e1220c6f13', 2, 3, 1),
('120', 'Olivia Thomas', '96b33694c4bb7dbd07391e0be54745fb', 2, 4, 1),
('121', 'Liam Anderson', '4ca7c5c27c2314eecc71f67501abb724', 3, 5, 1),
('122', 'Emily Davis', '5bc015411253126ce1c1f7e5d14bd927', 3, 6, 1),
('123', 'Samuel White', '0f359740bd1cda994f8b55330c86d845', 4, 7, 1),
('124', 'Isabella Harris', '16ce487f0dd268b7a9d97856fe9ad255', 4, 8, 1),
('125', 'Noah Wilson', '3fc0a7acf087f549ac2b266baf94b8b1', 1, 1, 1),
('126', 'Grace Moore', '7c6a180b36896a0a8c02787eeafb0e4c', 1, 2, 1),
('127', 'Lucas Brown', 'aa7c9c12fc740955ef4dfad670250ff4', 2, 3, 1),
('128', 'Lily Martinez', '9a1996efc97181f0aee18321aa3b3b12', 2, 4, 1),
('129', 'Mason Taylor', 'bdc87b9c894da5168059e00ebffb9077', 3, 5, 1),
('130', 'Chloe Harris', 'bdfc2db0aa599f5919e565c328216a51', 3, 6, 1),
('131', 'Ethan Johnson', 'fd7cde5c34594dc95640681307f6f4fb', 4, 7, 1),
('132', 'Sophia Smith', 'faa4b0d94da61f59fb40c180a90fda47', 4, 8, 1),
('133', 'Oliver Davis', '6b6f5b8380ed23316b09e25c2f0faba2', 1, 1, 1),
('134', 'Mia Martin', '58b4e38f66bcdb546380845d6af27187', 1, 2, 1),
('135', 'Harper Thomas', 'c93ccd78b2076528346216b3b2f701e6', 2, 3, 1),
('136', 'Isabella White', '35ecdc960ef4241244f51c126675b19e', 2, 4, 1),
('137', 'Elijah Anderson', '2138cb5b0302e84382dd9b3677576b24', 3, 5, 1),
('138', 'Ava Thomas', 'ddc188c28dc547e1d87b63036c8497e3', 3, 6, 1),
('139', 'Liam Wilson', '92ebe651637abc35d187bcfe7f4e8350', 4, 7, 1),
('140', 'Abigail Martinez', 'a34a86165ce30964eabf198e732539fa', 4, 8, 1),
('141', 'Sebastian Taylor', '2138cb5b0302e84382dd9b3677576b24', 1, 1, 1),
('142', 'Charlotte Davis', '93bcab4ab719fde430e5ad90656a240e', 1, 2, 1),
('143', 'Ethan Smith', '4f312c0718fb97e0df2b8baad0265049', 2, 3, 1),
('144', 'Sofia Harris', '31dd057612eda68c6979a89b9887c809', 2, 4, 1),
('145', 'Matthew Johnson', 'd4395a5856617fa4afe8c5cd2eed3912', 3, 5, 1),
('146', 'Sophie Martin', 'e6e061838856bf47e1de730719fb2609', 3, 6, 1),
('147', 'Dylan White', 'c2303c675878925e4e0fda34ae938704', 4, 7, 1),
('148', 'Zoe Smith', '23fa53324c25fb14ba836699f63e64ce', 4, 8, 1),
('149', 'David Davis', '47fb208d3165f349696d697e790c65b4', 1, 1, 1),
('150', 'Avery Moore', 'ff855d5bae45cdda4fff10c8743c9a0e', 1, 2, 1),
('99', 'okok', '81dc9bdb52d04dc20036dbd8313ed055', 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(16, 'Admin', 'iiitg@ac.in', '2d2cfe1f686e9fc2e8b2af4d60716c88'),
(17, 'Khiranjit', 'demo@124', 'fe01ce2a7fbac8fafaed7c982a04e229'),
(18, 'Director', 'director@gmail', '3d4e992d8d8a7d848724aa26ed7f4176');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_enrollments`
--
ALTER TABLE `course_enrollments`
  ADD PRIMARY KEY (`rollno`,`course_id`,`year`,`semester`),
  ADD KEY `course_id` (`course_id`,`year`,`semester`);

--
-- Indexes for table `course_grades`
--
ALTER TABLE `course_grades`
  ADD PRIMARY KEY (`rollno`,`course_id`,`year`,`semester`),
  ADD KEY `course_id` (`course_id`,`year`,`semester`);

--
-- Indexes for table `course_info`
--
ALTER TABLE `course_info`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_offerings`
--
ALTER TABLE `course_offerings`
  ADD PRIMARY KEY (`year`,`semester`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_enrollments`
--
ALTER TABLE `course_enrollments`
  ADD CONSTRAINT `course_enrollments_ibfk_1` FOREIGN KEY (`rollno`) REFERENCES `student_info` (`rollno`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_enrollments_ibfk_2` FOREIGN KEY (`course_id`,`year`,`semester`) REFERENCES `course_offerings` (`course_id`, `year`, `semester`) ON DELETE CASCADE;

--
-- Constraints for table `course_grades`
--
ALTER TABLE `course_grades`
  ADD CONSTRAINT `course_grades_ibfk_1` FOREIGN KEY (`rollno`) REFERENCES `student_info` (`rollno`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_grades_ibfk_2` FOREIGN KEY (`course_id`,`year`,`semester`) REFERENCES `course_offerings` (`course_id`, `year`, `semester`) ON DELETE CASCADE;

--
-- Constraints for table `course_offerings`
--
ALTER TABLE `course_offerings`
  ADD CONSTRAINT `course_offerings_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_info` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
