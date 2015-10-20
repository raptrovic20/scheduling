-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2015 at 02:18 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
  `type` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_blocks`
--

INSERT INTO `tbl_blocks` (`id`, `course_id`, `name`, `school_year`, `semester`, `year_level`, `type`) VALUES
(26, 24, 'Block 1 ng course 1', 6, NULL, 1, 1),
(27, 24, 'Block 2 ng course 1', 6, NULL, 1, 1),
(28, 24, 'Block 3 ng course 1', 6, NULL, 1, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `department_name`, `department_id`, `course_lenght`) VALUES
(24, 'Course 1', '', 30, '4'),
(25, 'Course 2', '', 30, '4');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_dean`
--

INSERT INTO `tbl_dean` (`emp_no`, `name`, `department_id`, `department`) VALUES
(15, 'Dean number 1', 30, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_code`, `department_name`, `dean`, `dean_id`) VALUES
(30, NULL, 'Department number 1', '--Select ProgramHead--', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`emp_no`, `fname`, `lname`, `mname`, `status`, `department_id`, `department_name`, `specialization`) VALUES
(11, 'Raphael', 'Villanueva', 'Alonzo', 'Regular', NULL, 'Department number 1', 'Specialization');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_irregular_block_subjects`
--

CREATE TABLE IF NOT EXISTS `tbl_irregular_block_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year_level` tinyint(4) DEFAULT NULL,
  `block_id` tinyint(4) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `school_year` tinyint(4) DEFAULT NULL,
  `semester` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`room_id`, `room_no`, `room_name`, `location`, `type`, `capacity`) VALUES
(18, 101, 'room 101', 'location', 'Lecture', '60'),
(19, 102, 'room 102', 'location', 'Lecture', '60');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`id`, `block_id`, `subject_id`, `prof_id`, `room_id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `from`, `to`, `semester`, `school_year`) VALUES
(1, 26, 27, 11, 18, 1, 0, 0, 0, 1, 1, '04:00 AM', '05:00 AM', 1, 6),
(2, 26, 28, 11, 19, 0, 1, 0, 0, 0, 0, '04:00 AM', '05:00 AM', 1, 6),
(3, 26, 29, 11, 19, 0, 0, 1, 0, 0, 0, '04:00 AM', '05:00 AM', 1, 6),
(4, 26, 27, 11, 18, 1, 0, 0, 1, 0, 0, '04:00 AM', '05:00 AM', 1, 6),
(5, 26, 27, 11, 18, 1, 0, 0, 1, 0, 0, '04:00 AM', '05:00 AM', 1, 6),
(6, 26, 28, 11, 19, 0, 1, 0, 0, 0, 0, '04:00 AM', '05:00 AM', 1, 6),
(7, 26, 29, 11, 19, 0, 0, 1, 0, 0, 0, '04:00 AM', '05:00 AM', 1, 6);

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
  `semester` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_code`, `description`, `type`, `unit`, `course`, `year_level`, `school_year`, `semester`) VALUES
(27, 'Subject 101', 'Sample subject 1', 'Lecture', 3, '24', '1', 6, 1),
(28, 'Subject 102', 'Sample subject 2', 'Lecture', 3, '24', '1', 6, 1),
(29, 'Subject 103', 'Sample subject 3', 'Lecture', 3, '24', '1', 6, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `utype_id`, `dean_id`, `faculty_id`, `name`, `department_id`, `department`, `position`, `username`, `password`, `address`, `contact`, `date`) VALUES
(51, 2, NULL, NULL, 'wilbur ramos', NULL, 'accounting', 'book keeper', 'Registrar', 'admin', 'Laguindingan, Misamis Oriental', '09358944967', '2013-03-04'),
(58, 1, 15, NULL, 'Dean number 1', 30, NULL, 'Dean number 1', 'dean1', 'dean1', 'Dean number 1', 'Dean number 1', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
