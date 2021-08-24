-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 10:32 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ope`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `classname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdon` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `classname`, `createdon`) VALUES
(7, 'Grade 1-A', '2021-07-10 12:22:07'),
(8, 'Grade 2-A', '2021-07-10 12:22:11'),
(9, 'Grade 3-A', '2021-07-11 19:01:57'),
(10, 'Grade 4-A', '2021-07-11 19:02:02'),
(11, 'Grade 5-A', '2021-07-11 19:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `examcategoryid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classnameid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resultdatetime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdon` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `examcategoryid`, `classnameid`, `sy`, `resultdatetime`, `createdon`) VALUES
(24, '1', '7', '2020-2021', '', '2021-07-20 05:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `examcategory`
--

CREATE TABLE `examcategory` (
  `id` int(11) NOT NULL,
  `examcategoryname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examcategory`
--

INSERT INTO `examcategory` (`id`, `examcategoryname`) VALUES
(1, 'First Grading Exam'),
(2, 'Second Grading Exam'),
(3, 'Third Grading Exam'),
(4, 'Fourth Grading Exam');

-- --------------------------------------------------------

--
-- Table structure for table `examquestion`
--

CREATE TABLE `examquestion` (
  `id` int(11) NOT NULL,
  `examsubjectid` varchar(255) NOT NULL,
  `examid` varchar(255) NOT NULL,
  `questiontitle` text NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `rightmark` varchar(255) NOT NULL,
  `wrongmark` varchar(255) NOT NULL,
  `createdon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examquestion`
--

INSERT INTO `examquestion` (`id`, `examsubjectid`, `examid`, `questiontitle`, `option1`, `option2`, `option3`, `option4`, `answer`, `rightmark`, `wrongmark`, `createdon`) VALUES
(10, '47', '24', 'sasmp[lefasf', 'sugbaon', 'molangoy', 'lumsan', 'kilawon', '2', '1', '1', '2021-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `examsubject`
--

CREATE TABLE `examsubject` (
  `id` int(11) NOT NULL,
  `examid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `examdatetime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalquestion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdon` datetime NOT NULL,
  `timelimit` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examsubject`
--

INSERT INTO `examsubject` (`id`, `examid`, `subjectid`, `examdatetime`, `totalquestion`, `createdon`, `timelimit`) VALUES
(46, '24', '6', '07/19/2021 1:00 PM', '50', '2021-07-20 05:17:04', '00:00:01'),
(47, '24', '6', '07/22/2021 3:28 PM', '20', '2021-07-20 05:17:25', '00:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `examid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `examname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdon` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `quizdate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiztimelimit` time NOT NULL,
  `questiontimelimit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiztitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quizdescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateaddedd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `quizdate`, `grade`, `quiztimelimit`, `questiontimelimit`, `quiztitle`, `quizdescription`, `dateaddedd`) VALUES
(1, '07/15/2021', '1', '01:30:00', '30', 'Quiz Firsta', 'asdas', '2021-07-09 11:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opeusername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opepassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateaddedd` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstname`, `middlename`, `lastname`, `contact`, `email`, `address`, `opeusername`, `opepassword`, `dateaddedd`) VALUES
(21, 'Akisha Mae', 'Salomon', 'Panugan', '09197491233', 'akisha@gmail.com', 'Dumalinao ZDS', 'aki', '123', '2021-07-10 13:21:12'),
(22, 'Christine Mary', 'Ebarvia', 'Salomon', '09192392929', 'tin@gmail.com', 'Dumalinao ZDS', 'tin', '123', '2021-07-10 13:23:19'),
(23, 'Aprilme', 'Plang', 'Bolayog', '09192392929', 'april@gmail.com', 'Dimataling ZDS', 'april', '123', '2021-07-11 11:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `studentclass`
--

CREATE TABLE `studentclass` (
  `id` int(11) NOT NULL,
  `controlno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdon` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studentclass`
--

INSERT INTO `studentclass` (`id`, `controlno`, `studentid`, `studentname`, `classid`, `classname`, `sy`, `createdon`, `status`) VALUES
(8, '202111', '21', 'Akisha Mae Salomon Panugan', '7', 'Grade 1-A', '2020-2021', '2021-07-10 14:08:18', 'Active'),
(9, '20212', '22', 'Christine Mary Ebarvia Salomon', '8', 'Grade 2-A', '2020-2021', '2021-07-10 21:24:29', 'Active'),
(11, '20213', '23', 'Aprilme Plang Bolayog', '7', 'Grade 1-A', '2020-2021', '2021-07-11 19:28:41', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `subjectclass`
--

CREATE TABLE `subjectclass` (
  `id` int(11) NOT NULL,
  `classid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdon` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjectclass`
--

INSERT INTO `subjectclass` (`id`, `classid`, `classname`, `subjectid`, `subjectname`, `createdon`) VALUES
(20, '8', 'Grade 2-A', '6', 'FILIPINO 2', '2021-07-11 19:08:10'),
(19, '7', 'Grade 1-A', '4', 'FILIPINO 1', '2021-07-11 19:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subjectname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdon` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subjectname`, `createdon`, `status`) VALUES
(6, 'FILIPINO 2', '2021-07-11 19:06:57', 'active'),
(4, 'FILIPINO 1', '2021-07-10 10:44:25', 'active'),
(7, 'FILIPINO 3', '2021-07-11 19:07:03', 'active'),
(8, 'FILIPINO 1', '2021-07-14 04:43:11', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nickname`) VALUES
(1, 'admin', '123', 'enrique');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examcategory`
--
ALTER TABLE `examcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examquestion`
--
ALTER TABLE `examquestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examsubject`
--
ALTER TABLE `examsubject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentclass`
--
ALTER TABLE `studentclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjectclass`
--
ALTER TABLE `subjectclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `examcategory`
--
ALTER TABLE `examcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `examquestion`
--
ALTER TABLE `examquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `examsubject`
--
ALTER TABLE `examsubject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `studentclass`
--
ALTER TABLE `studentclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subjectclass`
--
ALTER TABLE `subjectclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
