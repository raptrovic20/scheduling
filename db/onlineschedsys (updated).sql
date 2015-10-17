-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2015 at 12:58 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlineschedsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blocks`
--

CREATE TABLE IF NOT EXISTS `tbl_blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `school_year` tinyint(4) DEFAULT NULL,
  `semester` tinyint(4) DEFAULT NULL,
  `year_level` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_blocks`
--

INSERT INTO `tbl_blocks` (`id`, `course_id`, `name`, `school_year`, `semester`, `year_level`) VALUES
(1, 6, 'BSIT - 1A', 6, NULL, NULL),
(2, 6, 'BSIT - 2', 6, NULL, NULL),
(3, 6, 'BSIT - 3', 6, NULL, NULL),
(4, 6, 'BSIT - 4', 6, NULL, NULL),
(5, 6, 'BSIT - 1B', 6, NULL, NULL),
(6, 6, 'BSIT - 2A', 6, NULL, NULL),
(7, 6, 'BSIT - 1', 1, NULL, NULL),
(8, 6, 'BSIT - 2', 2, NULL, NULL),
(9, 6, 'BSIT - 3', 3, NULL, NULL),
(10, 6, 'BSIT - 4', 4, NULL, NULL),
(11, 10, 'ACS -4', 6, NULL, NULL),
(12, 17, 'IT - 123', 6, NULL, NULL),
(14, 18, 'BSIT - 89 -2011', 1, NULL, NULL),
(15, 18, 'ako IT', 1, NULL, NULL),
(16, 8, 'BEED - 1', 6, NULL, 1),
(17, 8, 'BEED - 2', 6, NULL, 2),
(18, 21, '1 block for course 5', 6, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checklist`
--

CREATE TABLE IF NOT EXISTS `tbl_checklist` (
  `check_id` int(11) NOT NULL AUTO_INCREMENT,
  `instructor` varchar(50) NOT NULL,
  `term` varchar(50) NOT NULL,
  `subj_code` varchar(50) NOT NULL,
  `subj_des` varchar(50) NOT NULL,
  `coll_offering` varchar(50) NOT NULL,
  `lec/lab_unit` varchar(50) NOT NULL,
  `fac_load` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `schedule` varchar(50) NOT NULL,
  `room_no` varchar(50) NOT NULL,
  `no_of_stud` int(11) NOT NULL,
  PRIMARY KEY (`check_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_checklist`
--

INSERT INTO `tbl_checklist` (`check_id`, `instructor`, `term`, `subj_code`, `subj_des`, `coll_offering`, `lec/lab_unit`, `fac_load`, `section`, `schedule`, `room_no`, `no_of_stud`) VALUES
(1, 'KATHERINE D TAN', '1ST', 'IT 326', 'Object Oriented Programming', 'CCS', '3/0', 3, 'BSIT 3', '8:00-9:00 / 9:00-10:00 MW', 'Comp.Lab', 15),
(2, 'ALEJANDRO', '1ST', 'IT 332', 'Operating System', 'CCS', '2/3', 5, 'BSIT 4', '2:30-3:30 Lec 3:30-5:00 Lab MW ', 'Comp Lab', 15),
(3, 'KATHERINE D TAN', '1ST', 'IT 323', 'Dtabase Management System', 'CICS', '2/3', 5, 'BIST3', '2:30-3:30 Lec 3:30-5:00 Lab TTh', 'COMP LAB', 16),
(4, 'KATHERINE D TAN', '1ST', 'CS 422', 'Computer Graphics', 'CICS', '2/3', 5, 'BSCS 4', '2:30-3:30 Lec 3:30-5:00 Lab TTh', 'COMP LAB', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE IF NOT EXISTS `tbl_course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `course_lenght` varchar(100) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `department_name`, `department_id`, `course_lenght`) VALUES
(6, 'Bachelor of Science in Information Technology', 'College of Computer Studies', 18, '4 Years'),
(8, 'Bachelor of Elementary Education', 'College of Education', 29, '4 Years'),
(10, 'Associate in Computer Science  ', 'College of Computer Studies', 18, '2 Years'),
(12, 'Bachelor of Science in Criminology', 'College of Criminology', 29, '4 Years'),
(13, 'Bachelor of Science in  Secondary Education', 'College of Education', NULL, '4 Years'),
(14, 'Bachelor of Science in Business Administration', 'College of Accountancy and Business Administration', NULL, '4 Years'),
(15, 'Bachelor of Science In Accountancy', 'College of Accountancy and Business Administration', 29, '4 Years'),
(17, 'Information Technology', 'College of Computer Studies', 18, '4 Years'),
(18, 'bachelor of information Technology', 'College of Computer Studies', 18, '4 Years'),
(21, '1 course for dept 5', '', 29, '5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dean`
--

CREATE TABLE IF NOT EXISTS `tbl_dean` (
  `emp_no` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`emp_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_dean`
--

INSERT INTO `tbl_dean` (`emp_no`, `name`, `department_id`, `department`) VALUES
(1, 'Marieta Sorio', 21, 'Caba'),
(2, 'Hediliza Castillo', 18, 'CCS'),
(3, 'Oscar Tadeo', 22, 'Toursim'),
(4, 'Alejandro Sotelo', 24, 'HRM'),
(5, 'Catalino Rivera', 23, 'CCrim'),
(13, 'Dean Number 5', 29, NULL),
(14, 'bagong dean', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE IF NOT EXISTS `tbl_department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_code` varchar(50) DEFAULT NULL,
  `department_name` varchar(50) NOT NULL,
  `dean` varchar(50) NOT NULL,
  `dean_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_code`, `department_name`, `dean`, `dean_id`) VALUES
(10, 'CoE', 'College of Education', 'Oscar Tadeo', 3),
(18, 'CCS', 'College of Computer Studies', 'Alejandro Sotelo', 4),
(21, 'CABA', 'College of Accountancy and Business Administration', 'Hediliza Castillo', 2),
(22, 'Tourism', 'College of Tourism', 'Marieta Sorio', 1),
(23, 'CCrim', 'College of Criminology', 'Catalino Rivera', 5),
(24, 'HRM', 'HRM', '', NULL),
(25, 'Dpt 1', 'Department 1', '', NULL),
(26, 'Dpt 2', 'Department 2', '', NULL),
(27, 'Dpt 3', 'Department 3', '', NULL),
(28, 'Dpt 4', 'Department 4', '', NULL),
(29, 'Dpt 5', 'Department 5', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE IF NOT EXISTS `tbl_faculty` (
  `emp_no` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `department_name` varchar(50) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  PRIMARY KEY (`emp_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`emp_no`, `fname`, `lname`, `mname`, `status`, `department_id`, `department_name`, `specialization`) VALUES
(1, 'Christian', 'Luis', 'Pabaira', 'Part Time', 18, 'College of Computer Studies', 'Internet Essential'),
(3, 'Randolph Ray', 'Gerona', 'Honrado', 'Regular', NULL, 'College of Education', 'Mathematics'),
(4, 'Escorsa', 'Arvic', 'Advincula', 'Part Time', 18, 'College of Computer Studies', 'Photoshop'),
(6, 'Danilo', 'Dorado', 'Bedon', 'Regular', 18, 'College of Computer Studies', 'Photoshop'),
(7, 'Alejandro', 'Sotelo', 'Bartolome', 'Part Time', 18, 'College of Computer Studies', 'DataBase Analyst'),
(8, 'Ramil', 'Mercado', 'Acosta', 'Part Time', NULL, 'College of Education', 'Mathematics'),
(9, 'Christian', 'Luis', 'Pabaira', 'Regular', NULL, 'College of Education', 'Mathematics'),
(10, 'Raphael', 'Villanueva', 'Alonzo', 'Regular', 18, 'College of Computer Studies', 'Nothing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE IF NOT EXISTS `tbl_room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_no` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `capacity` varchar(50) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`room_id`, `room_no`, `room_name`, `location`, `type`, `capacity`) VALUES
(3, 69, 'NB', 'CCS Building', 'Lecture', '40'),
(5, 64, 'NSTP', 'HRM Building', 'Lecture', '50'),
(11, 62, 'NB', 'CCS Building', 'Laboratory', '30'),
(15, 112, 'Computer Laboratory', 'CCS Building', 'Laboratory', '40'),
(16, 1, 'FR-103', 'CCS Building', 'Lecture', '40'),
(17, 69, 'Room 69', 'Location?', 'Lecture', '60');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE IF NOT EXISTS `tbl_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `block_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `prof_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `monday` tinyint(4) DEFAULT '0',
  `tuesday` tinyint(4) DEFAULT '0',
  `wednesday` tinyint(4) DEFAULT '0',
  `thursday` tinyint(4) DEFAULT '0',
  `friday` tinyint(4) DEFAULT '0',
  `saturday` tinyint(4) DEFAULT '0',
  `from` varchar(11) DEFAULT NULL,
  `to` varchar(11) DEFAULT NULL,
  `semester` tinyint(4) DEFAULT NULL,
  `school_year` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`id`, `block_id`, `subject_id`, `prof_id`, `room_id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `from`, `to`, `semester`, `school_year`) VALUES
(1, 3, 15, 10, 15, 1, 0, 1, 0, 1, 1, '10:00 AM', '11:00 AM', 2, 6),
(11, 3, 12, 10, 16, 1, 0, 1, 0, 1, 0, '09:00 AM', '10:00 AM', 1, 6),
(12, 3, 10, 6, 16, 1, 0, 1, 0, 1, 0, '08:00 AM', '09:00 AM', 1, 6),
(13, 18, 1, 10, 17, 0, 1, 0, 1, 0, 1, '07:00 AM', '08:00 AM', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school_year`
--

CREATE TABLE IF NOT EXISTS `tbl_school_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(4) DEFAULT NULL,
  `to` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_school_year`
--

INSERT INTO `tbl_school_year` (`id`, `from`, `to`) VALUES
(1, 2010, 2011),
(2, 2011, 2012),
(3, 2012, 2013),
(4, 2013, 2014),
(5, 2014, 2015),
(6, 2015, 2016),
(7, 2016, 2017),
(8, 2017, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `unit` int(1) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year_level` varchar(50) NOT NULL,
  `school_year` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_code`, `description`, `type`, `unit`, `course`, `year_level`, `school_year`) VALUES
(1, 'English1', 'Modern Communication', '3', 0, '1', '4th Year', 6),
(10, 'Math 1', 'College Algebra', '3', 0, '1', '1st Year', 6),
(11, 'Math 3', 'Differential Calculus with Analytic Geometry', '3', 0, '1', '1st Year', 6),
(12, 'CS 121', 'Intro to information Technology', '1', 2, '1', '1st Year', 6),
(13, 'C1233', 'Intro to Programming', 'Lecture', 0, '1 course for dept 5', '1stYear', 6),
(14, 'c262', 'Computer Programming 1', '2', 3, '1', '3rd Year', 6),
(15, 'IT 999', 'Web Design', '5', 5, '1', '4th Year', 6),
(16, 'C1233', 'ASP', 'Laboratory', 3, 'Bachelor of Science in Information Technology', 'First Year', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year_course_subjects`
--

CREATE TABLE IF NOT EXISTS `tbl_year_course_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year_level` tinyint(4) DEFAULT NULL,
  `course_id` tinyint(4) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `school_year` tinyint(4) DEFAULT NULL,
  `semester` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_year_course_subjects`
--

INSERT INTO `tbl_year_course_subjects` (`id`, `year_level`, `course_id`, `subject_id`, `school_year`, `semester`) VALUES
(1, 1, NULL, 1, 6, 1),
(2, 1, NULL, 10, 6, 1),
(3, 1, NULL, 12, 6, 1),
(4, 2, NULL, 11, 6, 1),
(5, 2, NULL, 13, 6, 1),
(6, 2, NULL, 15, 6, 1),
(7, 3, NULL, 10, 6, 1),
(8, 3, NULL, 12, 6, 1),
(9, 3, NULL, 15, 6, 2),
(15, 1, 21, 1, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `utype_id` int(11) NOT NULL,
  `dean_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `position` varchar(100) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `date` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `utype_id`, `dean_id`, `faculty_id`, `name`, `department_id`, `department`, `position`, `username`, `password`, `address`, `contact`, `date`) VALUES
(50, 1, NULL, NULL, 'Rolly B. Abellanosa', 18, 'Supply', 'OIC', 'rolly', '123456789', 'Laguindingan, Misamis Oriental', '09263778273', '2013-03-04'),
(51, 2, NULL, NULL, 'wilbur ramos', NULL, 'accounting', 'book keeper', 'Registrar', 'admin', 'Laguindingan, Misamis Oriental', '09358944967', '2013-03-04'),
(52, 3, NULL, NULL, 'ariel abriol', NULL, 'finance', 'unkown', 'Faculty', 'admin', 'alubijid, misamis oriental', '09358944967', '2013-03-04'),
(53, 1, NULL, NULL, 'feljan', NULL, 'principal''s office', 'Principal', 'Dean', 'admin', 'wala', '0909090', '2015-07-13'),
(54, 1, 2, NULL, 'Hediliza Castillo', 18, '', 'Dean', 'hedeliza', 'admin', 'address', 'contact', 'date'),
(55, 1, 13, NULL, 'Dean Number 5', 29, NULL, 'position ni dean number 5', 'akodean5', 'qwerty', 'address ni dean number 5', 'contact number ', NULL),
(56, 1, 14, NULL, 'bagong dean', 10, NULL, 'bagon dean', 'bagongdean', 'bagongdean', 'bagong dean', 'bagong dean', NULL),
(57, 3, NULL, 10, 'Raphael Villanueva', 18, NULL, 'guro', 'arvee', 'arvee', 'address', 'contact', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
