-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2017 at 10:04 AM
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
-- Table structure for table `tbl_advertise`
--

CREATE TABLE IF NOT EXISTS `tbl_advertise` (
`adv_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `adv_heading` varchar(100) NOT NULL,
  `adv_desc` text NOT NULL,
  `upload_date` date NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_advertise`
--

INSERT INTO `tbl_advertise` (`adv_id`, `user_id`, `adv_heading`, `adv_desc`, `upload_date`, `deletion_status`) VALUES
(8, 1, 'test edit er por      ', '       Ok all is all . :P  session message check', '2017-02-18', 0),
(9, 1, 'Offer in going on', '          test test edit er poredit er poredit er por', '2017-02-21', 0),
(10, 1, 'Offer in going on  ', 'If u are admitted with in 15th of this month u can get 20% discount. ', '2017-03-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_article`
--

CREATE TABLE IF NOT EXISTS `tbl_article` (
  `article_id` int(25) NOT NULL DEFAULT '0',
  `article_category_id` int(25) NOT NULL,
  `article_title` varchar(30) NOT NULL,
  `article_short_des` text NOT NULL,
  `article_long_des` text NOT NULL,
  `resource` text NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT '0',
  `user_id` int(20) NOT NULL,
  `upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_article`
--

INSERT INTO `tbl_article` (`article_id`, `article_category_id`, `article_title`, `article_short_des`, `article_long_des`, `resource`, `deletion_status`, `user_id`, `upload_date`) VALUES
(0, 0, '', '', '', '', 0, 1, '2017-02-27'),
(1, 1, 'How mirror works ', 'How mirror works How mirror works ', 'How mirror works How mirror works How mirror works How mirror works ', '<iframe width="640" height="360" src="https://www.youtube.com/embed/aba30C19XH8" frameborder="0" allowfullscreen></iframe>', 0, 1, '2017-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_article_category`
--

CREATE TABLE IF NOT EXISTS `tbl_article_category` (
`article_category_id` int(25) NOT NULL,
  `article_category_name` varchar(50) NOT NULL,
  `article_category_des` text NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_article_category`
--

INSERT INTO `tbl_article_category` (`article_category_id`, `article_category_name`, `article_category_des`, `deletion_status`) VALUES
(1, 'Physics', 'Physics related topics are discussed here', 0),
(2, 'Chemistry', 'Chemistry related topics are discussed here', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE IF NOT EXISTS `tbl_attendance` (
`attendance_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

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
(13, 3, '2016-07-27', 'present'),
(14, 3, '2017-02-08', 'present'),
(15, 2, '2017-02-08', 'present'),
(16, 4, '2017-02-08', 'present'),
(17, 7, '2017-02-28', 'present'),
(18, 7, '2017-02-28', 'present'),
(19, 7, '2017-02-28', 'present'),
(20, 11, '2017-02-28', 'absent'),
(21, 11, '2017-02-28', 'absent'),
(22, 7, '2017-03-03', 'present'),
(23, 10, '2017-03-03', 'present'),
(24, 11, '2017-03-03', 'present');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch`
--

CREATE TABLE IF NOT EXISTS `tbl_batch` (
`batch_id` int(20) NOT NULL,
  `batch_name` text NOT NULL,
  `group` varchar(15) NOT NULL,
  `subjects` varchar(100) NOT NULL,
  `class` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `fee` int(20) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_batch`
--

INSERT INTO `tbl_batch` (`batch_id`, `batch_name`, `group`, `subjects`, `class`, `time`, `day`, `fee`, `deletion_status`) VALUES
(1, 'electron', '', 'Physics, Higher Math', 10, '8.00pm-9.00pm', 'Friday, Monday, Wednesday', 1200, 0),
(2, 'Photon', '', 'General Math, Higher Math', 10, '8.00pm-9.00pm', 'Sunday, Tuesday, Thursday ', 1000, 0),
(3, 'A', 'science', 'Physics, Chemistry', 9, '10am-12pm', 'Friday, Saturday', 800, 0),
(4, 'B', 'science', 'Physics, Higher Math, General Math', 9, '5.00pm-6.00pm', 'Sunday, Tuesday, Thursday ', 1400, 0),
(5, 'gama', '', 'physics , Math,hgvhjgvhkhkv', 10, '10am-12pm', 'bhgjhgb,vhgh,vjhvm', 2000, 0),
(6, 'power', '', 'physics , Math', 10, '3pm-5pm', 'Friday, Saturday', 1200, 0),
(7, 'A', 'arts', ' Math', 9, '8.00pm-9.00pm', 'Friday, Monday, Wednesday', 900, 0),
(8, 'C', 'arts', 'science', 9, '9.00-10.00pm', 'sat mon ', 1000, 0),
(14, 'A', 'science', 'physics , Math', 10, '8.00pm-9.00pm', 'Friday, Monday, Wednesday', 500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
`comment_id` int(100) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `user_id` int(20) NOT NULL,
  `article_id` int(20) NOT NULL,
  `deleted_by_user` tinyint(2) NOT NULL DEFAULT '0',
  `deleted_by_admin` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `comment`, `user_id`, `article_id`, `deleted_by_user`, `deleted_by_admin`) VALUES
(3, 'It''s  a Good post . thank you for that kind of post.', 1, 1, 0, 0),
(4, 'This post is excellent.. ', 1, 1, 0, 0),
(5, 'hm valo ', 1, 1, 0, 0),
(6, 'good', 0, 1, 0, 0);

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
(1, 'kkk@gamil.com', '32 Bondhu nibas, Rampura, TV center, Dhaka .  ', 1729441455);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_page_msg`
--

CREATE TABLE IF NOT EXISTS `tbl_contact_page_msg` (
`contact_msg_id` int(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` int(15) NOT NULL,
  `message` text NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contact_page_msg`
--

INSERT INTO `tbl_contact_page_msg` (`contact_msg_id`, `name`, `phone`, `message`, `deletion_status`) VALUES
(1, 'pasha', 1520102813, 'Check phone number ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_photo`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery_photo` (
`photo_id` int(40) NOT NULL,
  `user_id` int(30) NOT NULL,
  `photo_title` varchar(100) NOT NULL,
  `photo_des` varchar(200) NOT NULL,
  `upload_date` date NOT NULL,
  `resource` text NOT NULL,
  `deletion_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_gallery_photo`
--

INSERT INTO `tbl_gallery_photo` (`photo_id`, `user_id`, `photo_title`, `photo_des`, `upload_date`, `resource`, `deletion_status`) VALUES
(1, 1, 'class party', 'last class  of class 10 of section A.', '2017-02-16', 'assets/images/gallery_photo/vvv.jpg', 0),
(2, 1, 'Orientation class', 'first class of class 8', '2017-02-16', 'assets/images/gallery_photo/3rdlogo.jpg', 1),
(3, 1, 'Update check ', 'ok is ok .. update check works :D', '2017-02-21', 'assets/images/gallery_photo/Wine.jpg', 0),
(4, 1, 'Orientation class', 'last class  of class 10 of section A.', '2017-03-03', 'assets/images/gallery_photo/wp4.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lecture`
--

CREATE TABLE IF NOT EXISTS `tbl_lecture` (
`lecture_id` int(25) NOT NULL,
  `lecture_title` varchar(25) NOT NULL,
  `upload_date` date NOT NULL,
  `slide_name` text NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT '0',
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_lecture`
--

INSERT INTO `tbl_lecture` (`lecture_id`, `lecture_title`, `upload_date`, `slide_name`, `deletion_status`, `user_id`) VALUES
(7, 'lecture demu', '2017-03-02', '../assets/lecture/1.9asol.jpg', 1, 1),
(8, 'lecture demu', '2017-03-02', '../assets/lecture/1.9asol.jpg', 0, 1),
(9, 'lecture demu', '2017-03-02', '../assets/lecture/1.9asol.jpg', 0, 1),
(10, 'lecture demu', '2017-03-02', '../assets/lecture/1.9asol.jpg', 0, 1),
(11, 'lecture demu', '2017-03-02', '../assets/lecture/1.9asol.jpg', 0, 1),
(12, 'lecture demu', '2017-03-02', '../assets/lecture/1.9asol.jpg', 0, 1),
(13, 'lecture demu', '2017-03-02', '../assets/lecture/1.9asol.jpg', 0, 1),
(14, 'lecture demu', '2017-03-02', '../assets/lecture/1.9asol.jpg', 0, 1),
(15, 'lecture demu', '2017-03-02', '../assets/lecture/1.9asol.jpg', 0, 1),
(16, 'lecture demu', '2017-03-02', '../assets/lecture/1.9asol.jpg', 0, 1),
(17, 'lecture demu', '2017-03-02', '../assets/lecture/1.9asol.jpg', 1, 1),
(19, 'networking ', '2017-03-02', '../assets/lecture/0.jpg', 1, 1),
(20, 'lecture demu bh', '2017-03-02', '../assets/lecture/1.9.jpg', 0, 1),
(21, 'qweqwe', '2017-03-02', '../assets/lecture/1.9.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_like`
--

CREATE TABLE IF NOT EXISTS `tbl_like` (
`like_id` int(100) NOT NULL,
  `user_id` int(20) NOT NULL,
  `article_id` int(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_like`
--

INSERT INTO `tbl_like` (`like_id`, `user_id`, `article_id`, `status`, `deletion_status`) VALUES
(1, 1, 1, 'like', 0),
(2, 1, 1, 'dislike', 0),
(5, 1, 1, 'like', 0),
(6, 1, 1, 'like', 0),
(7, 1, 1, 'like', 0),
(8, 1, 1, 'like', 0),
(9, 2, 1, 'like', 0),
(10, 2, 1, 'like', 0),
(11, 2, 1, 'like', 0),
(13, 2, 1, 'like', 0),
(14, 2, 1, 'dislike', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_notice`
--

INSERT INTO `tbl_notice` (`notice_id`, `notice_des`, `notice_type`, `date`, `deletion_status`) VALUES
(1, ' kal ( 25.7.2016) kono class hobe nah..', 'main', '2016-07-19', 0),
(2, ' 2-8-2016 : Bita batch er model test shuru hobe.', 'regular', '2016-07-19', 0),
(3, 'Class 9 er new batch shuru hobe august er 1 tarikh theke.', 'regular', '2016-07-19', 0),
(4, 'Eid er chuti shuru hobe September er  2 tarikh theke ', 'main', '2016-07-19', 0),
(5, '30th September er moddhe vorti hoile 20% discount only " Bita "  batch er jonno.', 'regular', '2016-07-21', 0),
(6, ' pasha', 'main', '2016-07-21', 1),
(7, ' ruma', 'main', '2016-07-26', 1),
(8, ' kal class nai.. hasan,,,', 'main', '2016-07-27', 0),
(9, 'main notics check ..', 'main', '2017-02-08', 0),
(10, ' kal 100 tk niye asbe sobai ..', 'regular', '2017-02-08', 0),
(11, ' jkdhckduc ild d,hcdlhc dlhcdlhcdkl chslihcldslch d', 'regular', '2017-02-21', 0),
(12, ' ', 'regular', '2017-02-27', 1),
(13, ' round', 'main', '2017-02-28', 1),
(14, ' check with roni ', 'regular', '2017-03-03', 0),
(15, ' check with roni ', 'regular', '2017-03-03', 0),
(16, ' check with roni ', 'regular', '2017-03-03', 0),
(17, ' new regular notice check ', 'regular', '2017-03-03', 0),
(18, ' checking null ..', 'main', '2017-03-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_payment` (
`payment_id` int(20) NOT NULL,
  `batch_id` int(20) NOT NULL,
  `pass_roll` varchar(40) NOT NULL,
  `month` varchar(30) NOT NULL,
  `amount` int(20) NOT NULL,
  `date` date NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `batch_id`, `pass_roll`, `month`, `amount`, `date`, `deletion_status`) VALUES
(2, 7, '9A17A1', 'March', 1200, '2017-03-02', 0),
(3, 7, '9A17A1', 'January', 1200, '2017-03-02', 0),
(4, 7, '9A17A1', 'February', 1200, '2017-03-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE IF NOT EXISTS `tbl_question` (
`question_id` int(10) NOT NULL,
  `question_category_id` int(10) NOT NULL,
  `user_id` int(20) NOT NULL,
  `question_des` varchar(50) NOT NULL,
  `resource` text NOT NULL,
  `upload_date` date NOT NULL,
  `deletion_status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`question_id`, `question_category_id`, `user_id`, `question_des`, `resource`, `upload_date`, `deletion_status`) VALUES
(1, 2, 1, 'Bangla 1st paper ', 'assets/images/questions/1s.PNG', '2016-09-09', 1),
(2, 2, 1, 'physics 1st ', 'assets/images/questions/1s.PNG', '2016-09-14', 0),
(5, 3, 1, 'Physics 1st part', 'assets/images/questions/physics-12.jpg', '2016-09-28', 0),
(7, 3, 1, 'Bangla 2nd paper ', 'assets/images/questions/bangla2nd.jpg', '2016-09-28', 0),
(9, 1, 1, 'Bangla 2nd paper ', 'assets/images/questions/bangla2nd.jpg', '2016-09-28', 0),
(10, 4, 1, 'math-2017 Aprill ', 'assets/images/questions/forensic_suci1.jpg', '2017-02-21', 1),
(11, 5, 1, 'Bangla 1st paper ', 'assets/images/questions/bangla2nd.jpg', '2017-02-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question_category`
--

CREATE TABLE IF NOT EXISTS `tbl_question_category` (
`question_category_id` int(10) NOT NULL,
  `question_category_name` varchar(100) NOT NULL,
  `question_category_des` text NOT NULL,
  `deletion_status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_question_category`
--

INSERT INTO `tbl_question_category` (`question_category_id`, `question_category_name`, `question_category_des`, `deletion_status`) VALUES
(1, 'SSC 2015 Board Question', 'All SCC 2015 board questions are in this category.', 0),
(2, 'SSC 2014 Board Question', 'All SCC 2014 board questions are in this category.', 0),
(3, 'SSC 2015 Test Questions', 'All SCC 2015 test questions are in this category.', 0),
(4, 'Monthly test for class 9', 'all types of question for class 9', 0),
(5, 'Weekly Test Question', 'Question on weekly test. ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
`student_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `batch_id` int(10) NOT NULL,
  `family_status` varchar(20) NOT NULL,
  `student_quality` varchar(20) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `roll` int(20) NOT NULL,
  `pass_roll` varchar(25) NOT NULL,
  `extra_info` text NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `user_id`, `batch_id`, `family_status`, `student_quality`, `payment_type`, `roll`, `pass_roll`, `extra_info`, `deletion_status`) VALUES
(6, 7, 7, '9', 'good', 'good', 1, '9A17A1', 'not require', 0),
(7, 10, 7, 'poor', 'poor', 'partial', 2, '9A17A2', ' sadsad', 0),
(8, 11, 7, 'good', 'good', 'regular', 3, '9A17A3', ' not require', 0),
(9, 13, 3, 'good', 'good', 'regular', 1, '9S17A1', 'not require', 0),
(10, 14, 8, 'poor', 'poor', 'partial', 1, '9A17C1', ' need to extra care and \r\npayment reduce to 700.', 0),
(11, 15, 8, 'good', 'good', 'regular', 2, '9A17C2', ' not require', 0),
(12, 16, 8, 'good', 'poor', 'regular', 3, '9A17C3', ' hvjhvj', 0),
(13, 17, 8, 'good', 'poor', 'regular', 4, '9A17C4', ' hv gggbggvvvtgty', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suggestion`
--

CREATE TABLE IF NOT EXISTS `tbl_suggestion` (
`suggestion_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `group_name` varchar(25) NOT NULL,
  `subject_name` varchar(30) NOT NULL,
  `upload_date` date NOT NULL,
  `class` int(15) NOT NULL,
  `suggestion` text NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_suggestion`
--

INSERT INTO `tbl_suggestion` (`suggestion_id`, `user_id`, `group_name`, `subject_name`, `upload_date`, `class`, `suggestion`, `deletion_status`) VALUES
(1, 1, 'arts', 'general_math', '2017-02-20', 9, 'Algebra \r\n3.1-1(1,2)\r\n3.1-1(1,2)\r\n3.1-1(1,2)\r\nGeometry\r\n3.1-1(1,2)\r\n3.1-1(1,2)\r\n3.1-1(1,2)', 0),
(5, 1, 'commerce ', 'general_science', '2017-02-20', 9, 'chapter1 :\r\njkbk\r\njlknlkn ', 0),
(6, 1, 'arts', 'genera_science', '2017-03-04', 9, 'chapter 1: h1 a2 aw ow2 j2 \r\nchapter 1: h1 a2 aw ow2 j2 chapter 1: h1 a2 aw ow2 j2 chapter 1: h1 a2 aw ow2 j2 chapter 1: h1 a2 aw ow2 j2 chapter 1: h1 a2 aw ow2 j2 chapter 1: h1 a2 aw ow2 j2 chapter 1: h1 a2 aw ow2 j2 chapter 1: h1 a2 aw ow2 j2 ', 0),
(7, 1, 'science ', 'chemistry', '2017-03-04', 10, ' bnmn  jbjb bjkb, ,bj\r\ncheck suggestion update.. DOne', 0),
(8, 1, 'none ', 'general_math', '2017-03-04', 8, ' mn,m mlknlknlknkn  edit from show page', 0);

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
  `group` varchar(20) NOT NULL,
  `user_image` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT '0',
  `approval_status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `date_of_birth`, `class`, `address`, `phone_number`, `user_type`, `email`, `group`, `user_image`, `password`, `deletion_status`, `approval_status`) VALUES
(1, 'jilani', '2016-06-01', 0, '3/k, Rampura Dhaka', 1520102813, 'admin', 'jilanikhandaker@yahoo.com', '0', 'assets/imageslee.jpg', '202cb962ac59075b964b07152d234b70', 0, 1),
(2, 'pasha', '2016-06-01', 9, '4/5,Malibag, Dhaka', 1520102813, 'student', '0', '4', 'assets/imageshuhu.jpg', '202cb962ac59075b964b07152d234b70', 0, 1),
(3, 'alamin', '2016-06-01', 9, '4/5,Malibag, Dhaka', 1520102813, 'student', '0', '4', 'assets/imagesalamin.png', '202cb962ac59075b964b07152d234b70', 0, 1),
(4, 'raju', '2016-06-07', 9, '4/5,Malibag, Dhaka', 1520102813, 'student', '0', '4', 'assets/imagesraju.jpg', '202cb962ac59075b964b07152d234b70', 0, 1),
(5, 'sohel', '2016-06-30', 10, '39/2 ulon bazar, Rampura Dhaka', 2147483647, 'student', '0', '2', 'assets/imageskoncartoon.jpg', '202cb962ac59075b964b07152d234b70', 0, 1),
(6, 'Rafia Islam', '2016-06-29', 10, '39/2 boddarhat', 2147483647, 'student', '0', '5', 'assets/imageshulk.jpg', '202cb962ac59075b964b07152d234b70', 0, 1),
(7, 'jarif', '2016-11-01', 9, '39/2 ulon bazar, Rampura Dhaka', 1520102813, 'student', '0', 'arts', 'assets/imagesalamin.png', '202cb962ac59075b964b07152d234b70', 0, 1),
(8, 'Abir', '2017-02-01', 0, '39/2 ulon bazar, Rampura Dhaka', 1520102813, 'teacher', 'jilanikhandaker@yahoo.com', '0', 'assets/imageswp4.jpg', '202cb962ac59075b964b07152d234b70', 0, 0),
(9, 'sohel', '2017-02-01', 0, '39/2 ulon bazar, Rampura Dhaka', 1520102813, 'other', 'jilanikhandaker@yahoo.com', '0', 'assets/imageswp4.jpg', '202cb962ac59075b964b07152d234b70', 0, 0),
(10, 'Sumon', '2017-02-01', 9, '39/2 ulon bazar, Rampura Dhaka', 1520102813, 'student', '0', 'arts', 'assets/imageswp4.jpg', '202cb962ac59075b964b07152d234b70', 0, 1),
(11, 'maisha', '2017-02-09', 9, '39/2 ulon bazar, Rampura Dhaka', 1520102813, 'student', '0', 'arts', 'assets/imageswp4.jpg', '202cb962ac59075b964b07152d234b70', 0, 1),
(12, 'Arisha', '2017-02-01', 8, '39/2 ulon bazar, Rampura Dhaka', 1520102813, 'student', '0', 'arts', 'assets/imageswp4.jpg', '202cb962ac59075b964b07152d234b70', 0, 1),
(13, 'Alamin', '2017-02-01', 9, '39/2 ulon bazar, Rampura Dhaka', 1520102813, 'student', '0', 'science', 'assets/imageswp4.jpg', '202cb962ac59075b964b07152d234b70', 0, 1),
(14, 'fiha', '2017-02-07', 9, '3/k, Rampura Dhaka', 1520102813, 'student', '0', 'arts', 'assets/imageswp4.jpg', '202cb962ac59075b964b07152d234b70', 0, 1),
(15, 'Rafia Islam', '2017-02-01', 9, '3/k, Rampura Dhaka', 1520102813, 'student', '0', 'arts', 'assets/imageswp4.jpg', '202cb962ac59075b964b07152d234b70', 0, 1),
(16, 'Ratul ', '2017-01-31', 9, '3/k, Rampura Dhaka', 1520102813, 'student', '0', 'arts', 'assets/imageswp4.jpg', '202cb962ac59075b964b07152d234b70', 0, 1),
(17, 'roni', '2017-03-01', 9, 'Ulon Bazar, Rampura', 1520102813, 'student', '0', 'arts', 'assets/imageswp4.jpg', '202cb962ac59075b964b07152d234b70', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_advertise`
--
ALTER TABLE `tbl_advertise`
 ADD PRIMARY KEY (`adv_id`);

--
-- Indexes for table `tbl_article`
--
ALTER TABLE `tbl_article`
 ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `tbl_article_category`
--
ALTER TABLE `tbl_article_category`
 ADD PRIMARY KEY (`article_category_id`);

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
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
 ADD PRIMARY KEY (`comment_id`);

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
-- Indexes for table `tbl_gallery_photo`
--
ALTER TABLE `tbl_gallery_photo`
 ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `tbl_lecture`
--
ALTER TABLE `tbl_lecture`
 ADD PRIMARY KEY (`lecture_id`);

--
-- Indexes for table `tbl_like`
--
ALTER TABLE `tbl_like`
 ADD PRIMARY KEY (`like_id`);

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
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
 ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `tbl_question_category`
--
ALTER TABLE `tbl_question_category`
 ADD PRIMARY KEY (`question_category_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
 ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_suggestion`
--
ALTER TABLE `tbl_suggestion`
 ADD PRIMARY KEY (`suggestion_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_advertise`
--
ALTER TABLE `tbl_advertise`
MODIFY `adv_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_article_category`
--
ALTER TABLE `tbl_article_category`
MODIFY `article_category_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
MODIFY `attendance_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
MODIFY `batch_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_contact_info`
--
ALTER TABLE `tbl_contact_info`
MODIFY `contact_info_id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_contact_page_msg`
--
ALTER TABLE `tbl_contact_page_msg`
MODIFY `contact_msg_id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_gallery_photo`
--
ALTER TABLE `tbl_gallery_photo`
MODIFY `photo_id` int(40) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_lecture`
--
ALTER TABLE `tbl_lecture`
MODIFY `lecture_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_like`
--
ALTER TABLE `tbl_like`
MODIFY `like_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
MODIFY `notice_id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
MODIFY `payment_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
MODIFY `question_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_question_category`
--
ALTER TABLE `tbl_question_category`
MODIFY `question_category_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
MODIFY `student_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_suggestion`
--
ALTER TABLE `tbl_suggestion`
MODIFY `suggestion_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
