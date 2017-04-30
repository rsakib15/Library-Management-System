-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2017 at 07:50 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `lms_books`
--

CREATE TABLE `lms_books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_isbn` varchar(100) NOT NULL,
  `book_edition` varchar(20) NOT NULL,
  `book_author` varchar(100) NOT NULL,
  `book_total` int(11) NOT NULL,
  `book_available` int(11) NOT NULL,
  `book_self` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lms_books`
--

INSERT INTO `lms_books` (`book_id`, `book_name`, `book_isbn`, `book_edition`, `book_author`, `book_total`, `book_available`, `book_self`) VALUES
(16, 'Advanced computer architecture', '978-3-16-148410-0', '1st', 'Kain, Richard Y.', 3, 3, '16/A'),
(17, 'An engineering approach to computer networking', '989-5-56-565655-1', '2nd', 'Keshav, Srinivasan.', 5, 5, '21/C'),
(18, 'An introduction to computer studies', '978-3-16-148490-0', '3rd', 'Kalicharan, Noel.', 8, 8, '1/A'),
(19, 'Access database design & programming', '978-3-16-152410-0', '2nd', 'Steven Roman', 5, 5, '43/A'),
(20, 'Advanced dbaseIII Programming and techniques', '978-3-16-189410-0', '5th', 'Miriam Liskin', 2, 2, '5/C'),
(21, 'Advanced graphics programming in C and C++', '978-3-19-111410-0', '8th', 'Roger T. Stevens and Christopher D. Watkins.', 3, 3, '15/C'),
(22, 'Advanced programming in the UNIX environment', '978-3-29-008554-5', '3rd', 'Stevens, W. Richard.', 6, 6, '9/C'),
(23, 'Advanced programming using Visual Basic.NET', '559-2-26-148410-0', '1st', 'Julia Case Bradley, Anita C. Millspaugh; Julia Case Bradley, Anita C. Millspaugh', 3, 3, '1/C'),
(24, 'An introduction to object-oriented programming', '123-3-16-234568-6', '3rd', 'Budd, Timothy.', 5, 5, '1/B'),
(25, 'An introduction to object-oriented programming with Java', '568-3-16-651642-0', '1st', 'Wu, C. Thomas.', 2, 2, '3/A'),
(26, 'Assembly language programming and organization of the IBM PC', '984-3-16-454616-0', '4th', 'Yu, Ytha Y.; Marut, Charles.', 4, 4, '5/A'),
(27, 'Teach yourself C++', '958-3-16-645489-2', '3rd', 'Schildt, Herbert.', 6, 6, '3/B');

-- --------------------------------------------------------

--
-- Table structure for table `lms_financial`
--

CREATE TABLE `lms_financial` (
  `issue_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `issue_returndate` varchar(100) NOT NULL,
  `fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lms_financial`
--

INSERT INTO `lms_financial` (`issue_id`, `user_id`, `issue_returndate`, `fine`) VALUES
('40', '1', '2017-04-29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lms_issue`
--

CREATE TABLE `lms_issue` (
  `issue_id` int(11) NOT NULL,
  `book_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `issue_date` varchar(20) NOT NULL,
  `return_date` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lms_issue`
--

INSERT INTO `lms_issue` (`issue_id`, `book_id`, `user_id`, `issue_date`, `return_date`, `status`) VALUES
(40, '23', 4, '2017-04-30', '2017-05-07', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `lms_user`
--

CREATE TABLE `lms_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lms_user`
--

INSERT INTO `lms_user` (`user_id`, `user_name`, `user_fname`, `user_lname`, `user_email`, `user_phone`, `user_password`, `user_type`) VALUES
(1, 'sakib', 'Sakib', 'Rahman', 'rsakib21@gmail.com', '01674333517', '12345678@', 'admin'),
(2, 'a', 'a', 'Rahman', 'rsakib21@gmail.com', '01674333517', '12345678@', 'student'),
(3, 'ang01a', 'a', 'a', 'rsakib13@gmail.com', '01916045713', '12345678@', 'student'),
(4, 'manash', 'Manash', 'Mondal', 'manashmondal@gmail.com', '01719692188', '12345678@', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lms_books`
--
ALTER TABLE `lms_books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `lms_issue`
--
ALTER TABLE `lms_issue`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `lms_user`
--
ALTER TABLE `lms_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lms_books`
--
ALTER TABLE `lms_books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `lms_issue`
--
ALTER TABLE `lms_issue`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `lms_user`
--
ALTER TABLE `lms_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
