-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2016 at 07:17 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sciencesolution`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE IF NOT EXISTS `tbl_attendance` (
`attendance_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`attendance_id`, `user_id`, `date`, `status`) VALUES
(1, 3, '2016-07-15', 'present'),
(2, 2, '2016-07-15', 'present'),
(3, 4, '2016-07-15', 'present'),
(4, 3, '2016-07-21', 'present'),
(5, 2, '2016-07-21', 'present'),
(6, 4, '2016-07-21', 'present'),
(7, 2, '2016-07-21', 'present'),
(8, 2, '2016-07-21', 'present'),
(9, 4, '2016-07-21', 'present'),
(10, 3, '2016-07-26', 'present'),
(11, 3, '2016-07-27', 'present'),
(12, 2, '2016-07-27', 'present'),
(13, 3, '2016-07-27', 'present');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch`
--

CREATE TABLE IF NOT EXISTS `tbl_batch` (
`batch_id` int(20) NOT NULL,
  `batch_name` varchar(50) NOT NULL,
  `subjects` varchar(100) NOT NULL,
  `class` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `fee` int(20) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_batch`
--

INSERT INTO `tbl_batch` (`batch_id`, `batch_name`, `subjects`, `class`, `time`, `day`, `fee`, `deletion_status`) VALUES
(1, 'electron', 'Physics, Higher Math', 10, '8.00pm-9.00pm', 'Friday, Monday, Wednesday', 1200, 0),
(2, 'Photon', 'General Math, Higher Math', 10, '8.00pm-9.00pm', 'Sunday, Tuesday, Thursday ', 1000, 0),
(3, 'Alpha', 'Physics, Chemistry', 9, '10am-12pm', 'Friday, Saturday', 800, 0),
(4, 'Bita', 'Physics, Higher Math, General Math', 9, '5.00pm-6.00pm', 'Sunday, Tuesday, Thursday ', 1400, 0),
(5, 'gama', 'physics , Math,hgvhjgvhkhkv', 10, '10am-12pm', 'bhgjhgb,vhgh,vjhvm', 2000, 0),
(6, 'power', 'physics , Math', 10, '3pm-5pm', 'Friday, Saturday', 1200, 0),
(7, 'new batch', 'physics , Math,Ict', 9, '8.00pm-9.00pm', 'Friday, Monday, Wednesday', 900, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_info`
--

CREATE TABLE IF NOT EXISTS `tbl_contact_info` (
`contact_info_id` int(1) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `phone` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contact_info`
--

INSERT INTO `tbl_contact_info` (`contact_info_id`, `email`, `address`, `phone`) VALUES
(1, 'jamalhossain@gamil.com', '32 Bondhu nibas, Rampura, TV center, Dhaka .', 1729441455);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_page_msg`
--

CREATE TABLE IF NOT EXISTS `tbl_contact_page_msg` (
`contact_msg_id` int(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(15) NOT NULL,
  `message` text NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contact_page_msg`
--

INSERT INTO `tbl_contact_page_msg` (`contact_msg_id`, `name`, `email`, `phone`, `message`, `deletion_status`) VALUES
(1, 'rafid', 'jilanikhandaker@yahoo.com', 1729441455, 'I wanna admit to ur coaching ..', 1),
(2, 'Rafia Islam', 'khandaker jannat@yahoo.com', 1729441455, 'Can u give me some scholarship? ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notice`
--

CREATE TABLE IF NOT EXISTS `tbl_notice` (
`notice_id` int(30) NOT NULL,
  `notice_des` varchar(400) NOT NULL,
  `notice_type` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_notice`
--

INSERT INTO `tbl_notice` (`notice_id`, `notice_des`, `notice_type`, `date`, `deletion_status`) VALUES
(1, ' kal ( 25.7.2016) kono class hobe nah..', 'main', '2016-07-19', 0),
(2, ' 2-8-2016 : Bita batch er model test shuru hobe.', 'regular', '2016-07-19', 0),
(3, 'Class 9 er new batch shuru hobe august er 1 tarikh theke.', 'main', '2016-07-19', 0),
(4, 'Eid er chuti shuru hobe September er  2 tarikh theke ', 'main', '2016-07-19', 0),
(5, ' uiyuiiughui', 'main', '2016-07-21', 0),
(6, ' pasha', 'main', '2016-07-21', 1),
(7, ' ruma', 'main', '2016-07-26', 0),
(8, ' kal class nai.. hasan,,,', 'main', '2016-07-27', 0),
(9, 'jarif', 'main', '2016-07-27', 0),
(10, ' http://localhost/ScienceSolution/admin/admin_master.php', 'main', '2016-07-27', 0),
(11, '', 'main', '2016-08-19', 0),
(12, '', '', '2016-08-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_payment` (
`payment_id` int(20) NOT NULL,
  `batch_id` int(20) NOT NULL,
  `roll` int(20) NOT NULL,
  `month` varchar(30) NOT NULL,
  `amount` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `batch_id`, `roll`, `month`, `amount`) VALUES
(1, 4, 100572, 'May', 1233),
(2, 5, 100572, 'June', 1233);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
`student_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `batch_id` int(10) NOT NULL,
  `class` int(2) NOT NULL,
  `roll` int(20) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `user_id`, `batch_id`, `class`, `roll`, `deletion_status`) VALUES
(1, 3, 4, 9, 1, 0),
(2, 2, 4, 9, 2, 0),
(3, 4, 4, 9, 3, 0),
(4, 5, 2, 10, 1, 0),
(5, 6, 5, 10, 1, 0),
(6, 7, 7, 9, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`user_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `class` int(3) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` int(12) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `batch_id` int(10) NOT NULL,
  `user_image` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT '0',
  `approval_status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `date_of_birth`, `class`, `address`, `phone_number`, `user_type`, `email`, `batch_id`, `user_image`, `password`, `deletion_status`, `approval_status`) VALUES
(1, 'jilani', '2016-06-01', 0, '3/k, Rampura Dhaka', 1520102813, 'admin', 'jilanikhandaker@yahoo.com', 0, 'assets/imageslee.jpg', '202cb962ac59075b964b07152d234b70', 0, 1),
(2, 'pasha', '2016-06-01', 9, '4/5,Malibag, Dhaka', 1520102813, 'student', '0', 4, 'assets/imageshuhu.jpg', '202cb962ac59075b964b07152d234b70', 0, 1),
(3, 'alamin', '2016-06-01', 9, '4/5,Malibag, Dhaka', 1520102813, 'student', '0', 4, 'assets/imagesalamin.png', '202cb962ac59075b964b07152d234b70', 0, 1),
(4, 'raju', '2016-06-07', 9, '4/5,Malibag, Dhaka', 1520102813, 'student', '0', 4, 'assets/imagesraju.jpg', '202cb962ac59075b964b07152d234b70', 0, 1),
(5, 'sohel', '2016-06-30', 10, '39/2 ulon bazar, Rampura Dhaka', 2147483647, 'student', '0', 2, 'assets/imageskoncartoon.jpg', '202cb962ac59075b964b07152d234b70', 0, 1),
(6, 'Rafia Islam', '2016-06-29', 10, '39/2 boddarhat', 2147483647, 'student', '0', 5, 'assets/imageshulk.jpg', '202cb962ac59075b964b07152d234b70', 0, 1),
(7, 'jarif', '2016-11-01', 9, '39/2 ulon bazar, Rampura Dhaka', 1520102813, 'student', '0', 7, 'assets/imagesalamin.png', '202cb962ac59075b964b07152d234b70', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
 ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
 ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `tbl_contact_info`
--
ALTER TABLE `tbl_contact_info`
 ADD PRIMARY KEY (`contact_info_id`);

--
-- Indexes for table `tbl_contact_page_msg`
--
ALTER TABLE `tbl_contact_page_msg`
 ADD PRIMARY KEY (`contact_msg_id`);

--
-- Indexes for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
 ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
 ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
 ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
MODIFY `attendance_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
MODIFY `batch_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_contact_info`
--
ALTER TABLE `tbl_contact_info`
MODIFY `contact_info_id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_contact_page_msg`
--
ALTER TABLE `tbl_contact_page_msg`
MODIFY `contact_msg_id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
MODIFY `notice_id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
MODIFY `payment_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
MODIFY `student_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
