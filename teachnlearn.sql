-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 10:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teachnlearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` int(11) NOT NULL,
  `courseName` varchar(300) NOT NULL,
  `courseType` varchar(255) NOT NULL,
  `teacher` varchar(200) NOT NULL,
  `fee` int(11) NOT NULL,
  `seat` int(11) NOT NULL,
  `finished` int(11) NOT NULL,
  `hour` int(11) NOT NULL,
  `descript` varchar(500) NOT NULL,
  `short_descript` varchar(255) NOT NULL,
  `coursePng` varchar(255) NOT NULL DEFAULT 'default.png',
  `teacherKeyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `courseName`, `courseType`, `teacher`, `fee`, `seat`, `finished`, `hour`, `descript`, `short_descript`, `coursePng`, `teacherKeyID`) VALUES
(15, 'Website Design', 'Web Development', 'Jane Doe', 169, 0, 0, 2, '', 'Web design refers to the design of websites that are displayed on the internet. It usually refers to the user experience aspects of website development rather than software development.', 'course-1.jpg', 2),
(16, 'Search Engine Optimization', 'Marketing', 'Jane Doe', 250, 0, 0, 2, '', 'SEO stands for “search engine optimization.” In simple terms, it means the process of improving your site to increase its visibility for relevant searches.', 'course-2.jpg', 2),
(17, 'Copywriting', 'Content', 'Jane Doe', 180, 0, 0, 2, '', 'Copywriting is the process of writing persuasive marketing and promotional materials that motivate people to take some form of action, such as make a purchase, click on a link or donate to a cause,', 'course-3.jpg', 2),
(18, 'Math Second Grade', 'Mathematics', 'Jane Doe', 0, 0, 0, 0, '', 'Math explained in easy language, plus puzzles, games, worksheets and an illustrated dictionary. For K-12 kids, teachers and parents.', 'math_course.jpg', 2),
(19, 'Cooking Class', 'Culinary', 'Jane Doe', 200, 0, 0, 3, '', 'Culinary arts, in which culinary means \"related to cooking\", are the cuisine arts of food preparation, cooking, and presentation of food, usually in the form of meals.', 'culinary_course.jpg', 2),
(20, 'History is Important', 'History', 'Jane Doe', 0, 0, 0, 10, '', 'Studying history enables us to develop better understanding of the world in which we live. Building knowledge and understanding of historical events and trends', 'history_course.png', 2),
(21, 'Language Barrier is no more', 'Language', 'Jane Doe', 20, 0, 0, 3, '', 'A language is a structured system of communication used by humans. Languages consist of spoken sounds in spoken languages or written elements in written languages.', 'language_course.jpg', 2),
(22, 'Science = Fun', 'Science', 'Jane Doe', 0, 0, 0, 7, '', 'Science is a systematic enterprise that builds and organizes knowledge in the form of testable explanations and predictions about the universe.', 'science_course.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `course_enrollment`
--

CREATE TABLE `course_enrollment` (
  `CourseEnrollment` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherID` int(11) NOT NULL,
  `teacherName` varchar(255) NOT NULL,
  `ic` varchar(30) NOT NULL,
  `phoneNum` varchar(15) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `typeOfCourse` varchar(100) NOT NULL,
  `rating` double NOT NULL,
  `earning` float NOT NULL,
  `status` varchar(50) NOT NULL,
  `userKeyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherID`, `teacherName`, `ic`, `phoneNum`, `occupation`, `typeOfCourse`, `rating`, `earning`, `status`, `userKeyID`) VALUES
(2, 'Jane Doe', '1234567890', '01234567891', 'Fresh Graduate/Unemployed', 'general and academic', 0, 0, 'approved', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `user_type` varchar(10) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `name`, `email`, `phone`, `user_type`, `password`) VALUES
(1, 'JohnDo', 'John Doe', 'John@gmail.com', '1234567890', '2', '$2y$10$qhXH8usyEROsNmlYiPDptOITy6HyU/YfUqqnAY0bwCAoDcvIf.WRu'),
(2, 'JaneDo', 'Jane Doe', 'Jane@gmail.com', '1234567891', '1', '$2y$10$DzAiRTiHLswFj.KZXqS22Obupbr74ZMallxkZdyxJYGJ.fm88WlJe'),
(3, 'JamesDo', 'James Doe', 'james@gmail.com', '0111111111', '0', '$2y$10$nJhhLysn4JTaMv0HKpUOa.A8tk3rzMlqLDIVtMjn1aFAMx1Y.MIOO'),
(4, 'SarahDo', 'Sarah', 'Sarah@gmail.com', '0122222222', '0', '$2y$10$N2bYXoSfDEHSQJznXZzam.R5jM4MrKdQXvx6UFB1hFs0TxR.lXrdG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`),
  ADD KEY `teacherKeyID` (`teacherKeyID`);

--
-- Indexes for table `course_enrollment`
--
ALTER TABLE `course_enrollment`
  ADD PRIMARY KEY (`CourseEnrollment`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`),
  ADD UNIQUE KEY `ic` (`ic`),
  ADD KEY `teacherID` (`teacherID`),
  ADD KEY `userKeyID` (`userKeyID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `course_enrollment`
--
ALTER TABLE `course_enrollment`
  MODIFY `CourseEnrollment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`teacherKeyID`) REFERENCES `teacher` (`teacherID`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`userKeyID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
