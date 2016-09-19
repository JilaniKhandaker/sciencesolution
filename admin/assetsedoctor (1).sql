-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2016 at 08:37 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `edoctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chamber`
--

CREATE TABLE IF NOT EXISTS `tbl_chamber` (
`chamber_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `address` text NOT NULL,
  `starting_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ending_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `off_day_1` varchar(15) NOT NULL,
  `off_day_2` varchar(15) NOT NULL,
  `off_day_3` varchar(15) NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_chamber`
--

INSERT INTO `tbl_chamber` (`chamber_id`, `user_id`, `address`, `starting_time`, `ending_time`, `off_day_1`, `off_day_2`, `off_day_3`, `deletion_status`) VALUES
(1, 8, '45 Badda, Dhaka ', '2016-04-29 12:00:00', '2016-04-29 15:00:00', 'Wednesday', 'Tuesday', 'None', 1),
(2, 8, '44 north badda', '2016-04-29 04:00:00', '2016-04-29 08:00:00', 'Wednesday', 'Tuesday', 'None', 1),
(3, 9, ' 2 A, boddarhat', '2016-04-29 12:00:00', '2016-04-29 16:00:00', 'Saturday', 'Sunday', 'Monday', 1),
(4, 10, '45, Jalabad, Sylhet', '2016-04-29 11:00:00', '2016-04-29 15:00:00', 'Saturday', 'None', 'None', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE IF NOT EXISTS `tbl_doctor` (
`doctor_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `specialist_category_id` int(10) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `fee` float(10,2) NOT NULL,
  `deletion_status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`doctor_id`, `user_id`, `specialist_category_id`, `qualification`, `fee`, `deletion_status`) VALUES
(7, 8, 5, 'MBBS, Bangladesh dental College', 500.00, 1),
(8, 9, 8, 'MBBS, Bangladesh Medical College', 450.00, 1),
(9, 10, 7, 'MBBS, Barisal Medical College', 350.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_specialist_category`
--

CREATE TABLE IF NOT EXISTS `tbl_specialist_category` (
`specialist_category_id` int(11) NOT NULL,
  `specialist_category` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(2) NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_specialist_category`
--

INSERT INTO `tbl_specialist_category` (`specialist_category_id`, `specialist_category`, `description`, `publication_status`, `deletion_status`) VALUES
(4, 'Cardiologist', '<span style="color: rgba(0, 0, 0, 0.8); font-family: Lora, georgia, serif; font-size: 18px; letter-spacing: 0.16px; line-height: 29.7px; background-color: rgb(255, 255, 255);">Cardiologists specify in the study and treatment of the heart and the many diseases and issues related to it. They assess the medical and family history of patients to determine potential risk for certain cardiovascular diseases and take action to prevent them.</span>', 1, 1),
(5, 'Dentist', '<span style="color: rgba(0, 0, 0, 0.8); font-family: Lora, georgia, serif; font-size: 18px; letter-spacing: 0.16px; line-height: 29.7px; background-color: rgb(255, 255, 255);">Dentists work with the human mouth, examining teeth and gum health and preventing and detecting various different issues, such as cavities and bleeding gums. Typically, patients are advised to go to the dentist twice a year in order to maintain tooth health.</span>', 1, 1),
(6, 'Endocrinologist', '<span style="color: rgba(0, 0, 0, 0.8); font-family: Lora, georgia, serif; font-size: 18px; letter-spacing: 0.16px; line-height: 29.7px; background-color: rgb(255, 255, 255);">Endocrinologists specify in illnesses and issues related to the endocrine system and its glands. They study hormone levels in this area to determine and predict whether or not a patient will encounter an endocrine system issue in the future.</span>', 1, 1),
(7, 'Gynecologist', '<p style="box-sizing: border-box; border: 0px; margin: 0px 0px 1.25rem; padding: 0px; vertical-align: baseline; color: rgba(0, 0, 0, 0.8); font-family: Lora, georgia, serif; font-size: 18px; letter-spacing: 0.16px; line-height: 29.7px; background-color: rgb(255, 255, 255);">Gynecologists work with the female reproductive system to assess and prevent issues that could potentially cause fertility issues. Female patients are typically advised to see a gynecologist once a year.</p><p style="box-sizing: border-box; border: 0px; margin: 0px 0px 1.25rem; padding: 0px; vertical-align: baseline; color: rgba(0, 0, 0, 0.8); font-family: Lora, georgia, serif; font-size: 18px; letter-spacing: 0.16px; line-height: 29.7px; background-color: rgb(255, 255, 255);">Gynecological work also focuses on issues related to prenatal care and options for expectant and new mothers. For more information on how to ensure that your infant is growing and developing properly</p>', 1, 1),
(8, 'Neurologist', '<span style="color: rgba(0, 0, 0, 0.8); font-family: Lora, georgia, serif; font-size: 18px; letter-spacing: 0.16px; line-height: 29.7px; background-color: rgb(255, 255, 255);">Neurologists work with the human brain to determine causes and treatments for such serious illnesses as Alzheimerâ€™s, Parkinsonâ€™s, Dementia, and many others. In addition to research on the brain stem, neurologists also study the nervous system and diseases that affect that region.</span>', 1, 1),
(9, 'Physiologist', '<span style="color: rgba(0, 0, 0, 0.8); font-family: Lora, georgia, serif; font-size: 18px; letter-spacing: 0.16px; line-height: 29.7px; background-color: rgb(255, 255, 255);">Physiologists study the states of the human body, including emotions and needs. They particularly focus on the functions of the human body to assess if they are working correctly and attempt to determine potential problems before they become an issue.</span>', 1, 1),
(10, 'Surgeon', '<span style="color: rgba(0, 0, 0, 0.8); font-family: Lora, georgia, serif; font-size: 18px; letter-spacing: 0.16px; line-height: 29.7px; background-color: rgb(255, 255, 255);">Surgeons can be found at the operating table, performing a wide variety of surgeries from head to toe. Subsets of surgeons include such areas as general surgery, neurosurgery, cardiovascular surgery, cardiothoracic surgery, ENT surgery, and oral surgery.</span>', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`user_id` int(10) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `email_address` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `city` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT '1',
  `user_image` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `email_address`, `password`, `address`, `phone_number`, `city`, `area`, `user_type`, `deletion_status`, `user_image`) VALUES
(3, 'pa', 'pa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'ssaas', '11212182', 'dhaka', 'rampura', 'doctor', 1, ''),
(4, 'jilani', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '39/2 ulon bazar, Rampura Dhaka', '01520102813', 'dhaka', 'rampura', 'admin', 1, ''),
(5, 'sola', 'sola@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'badda', '123445678', 'dhaka', 'badda', 'patient', 1, ''),
(6, 'sohel', 'sohel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '3/k, Rampura Dhaka', '01520090568', 'dhaka', 'rampura', 'doctor', 1, ''),
(8, 'hu hu pa ', 'huhu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '4/5,Malibag, Dhaka', '01520102814', 'dhaka', 'malibag', 'doctor', 1, 'images/user_imhuhu.jpg'),
(9, 'Alamin', 'alamin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '39/2 boddarhat', '123456766', 'chittagong', 'boddarhat', 'doctor', 1, 'images/user_imalamin.png'),
(10, 'ruma', 'ruma@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '32/2 jalabad, sylhet', '01520090568', 'sylhet', 'jalabad', 'doctor', 1, 'images/user_imruma.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_chamber`
--
ALTER TABLE `tbl_chamber`
 ADD PRIMARY KEY (`chamber_id`);

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
 ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `tbl_specialist_category`
--
ALTER TABLE `tbl_specialist_category`
 ADD PRIMARY KEY (`specialist_category_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_chamber`
--
ALTER TABLE `tbl_chamber`
MODIFY `chamber_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
MODIFY `doctor_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_specialist_category`
--
ALTER TABLE `tbl_specialist_category`
MODIFY `specialist_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
