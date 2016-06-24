-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2016 at 01:44 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `blockClasses`
--

CREATE TABLE IF NOT EXISTS `blockClasses` (
`id` int(10) unsigned NOT NULL,
  `classId` int(10) unsigned NOT NULL,
  `blockId` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blockClasses`
--

INSERT INTO `blockClasses` (`id`, `classId`, `blockId`) VALUES
(20, 12, 3),
(21, 13, 3),
(17, 18, 3),
(18, 19, 3),
(12, 21, 2),
(9, 22, 2),
(11, 23, 2),
(16, 24, 2),
(8, 25, 2);

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(125) NOT NULL,
  `periodId` int(10) unsigned NOT NULL,
  `levelId` int(10) unsigned NOT NULL,
  `userId` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `name`, `periodId`, `levelId`, `userId`) VALUES
(2, 'Grade 1 Honesty', 6, 3, 8),
(3, 'BSIT1 1t1516', 1, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
`id` int(10) unsigned NOT NULL,
  `courseId` int(10) unsigned NOT NULL,
  `teacherId` int(10) unsigned NOT NULL,
  `payUnits` decimal(4,1) NOT NULL,
  `creditUnits` decimal(4,1) NOT NULL,
  `periodId` int(10) unsigned NOT NULL,
  `userId` int(10) unsigned NOT NULL,
  `blocked` tinyint(1) NOT NULL DEFAULT '0',
  `max` int(11) NOT NULL DEFAULT '45'
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `courseId`, `teacherId`, `payUnits`, `creditUnits`, `periodId`, `userId`, `blocked`, `max`) VALUES
(10, 5, 4, '3.0', '3.0', 1, 7, 0, 45),
(12, 1, 1, '5.0', '3.0', 1, 5, 1, 45),
(13, 5, 4, '3.0', '3.0', 1, 5, 1, 5),
(14, 4, 7, '3.0', '3.0', 6, 6, 0, 45),
(15, 11, 5, '3.0', '3.0', 1, 6, 0, 45),
(16, 12, 3, '3.0', '3.0', 1, 6, 0, 45),
(17, 13, 6, '3.0', '3.0', 1, 6, 0, 45),
(18, 7, 6, '3.0', '3.0', 1, 5, 1, 45),
(19, 6, 6, '3.0', '3.0', 1, 5, 1, 45),
(20, 5, 5, '3.0', '3.0', 1, 7, 0, 45),
(21, 2, 8, '3.0', '3.0', 6, 8, 1, 40),
(22, 15, 8, '3.0', '3.0', 6, 8, 1, 45),
(23, 17, 9, '3.0', '3.0', 6, 8, 1, 45),
(24, 16, 8, '3.0', '3.0', 6, 8, 1, 45),
(25, 18, 8, '3.0', '3.0', 6, 8, 1, 45);

-- --------------------------------------------------------

--
-- Table structure for table `classesEnrolled`
--

CREATE TABLE IF NOT EXISTS `classesEnrolled` (
`id` int(10) unsigned NOT NULL,
  `enrolId` int(10) unsigned NOT NULL,
  `classId` int(10) unsigned NOT NULL,
  `rating1` varchar(5) DEFAULT NULL,
  `rating2` varchar(5) DEFAULT NULL,
  `rating3` varchar(5) DEFAULT NULL,
  `rating4` varchar(5) DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `withdrawn` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classesEnrolled`
--

INSERT INTO `classesEnrolled` (`id`, `enrolId`, `classId`, `rating1`, `rating2`, `rating3`, `rating4`, `remarks`, `withdrawn`) VALUES
(16, 3, 15, NULL, NULL, NULL, NULL, NULL, 0),
(17, 3, 14, NULL, NULL, NULL, NULL, NULL, 0),
(20, 5, 13, NULL, NULL, NULL, NULL, NULL, 0),
(21, 5, 19, NULL, NULL, NULL, NULL, NULL, 0),
(22, 5, 12, NULL, NULL, NULL, NULL, NULL, 0),
(23, 5, 18, NULL, NULL, NULL, NULL, NULL, 0),
(24, 6, 12, NULL, NULL, NULL, NULL, NULL, 0),
(25, 6, 19, NULL, NULL, NULL, NULL, NULL, 0),
(26, 6, 13, NULL, NULL, NULL, NULL, NULL, 0),
(28, 7, 18, NULL, NULL, NULL, NULL, NULL, 0),
(30, 8, 13, NULL, NULL, NULL, NULL, NULL, 0),
(31, 7, 13, NULL, NULL, NULL, NULL, NULL, 0),
(32, 9, 13, NULL, NULL, NULL, NULL, 'withdrawn', 1),
(33, 9, 18, NULL, NULL, NULL, NULL, 'withdrawn', 1),
(34, 10, 18, NULL, NULL, NULL, NULL, NULL, 0),
(35, 10, 12, NULL, NULL, NULL, NULL, NULL, 0),
(38, 10, 19, NULL, NULL, NULL, NULL, NULL, 0),
(44, 11, 25, NULL, NULL, NULL, NULL, NULL, 0),
(45, 11, 22, NULL, NULL, NULL, NULL, NULL, 0),
(46, 11, 23, NULL, NULL, NULL, NULL, NULL, 0),
(47, 11, 21, NULL, NULL, NULL, NULL, NULL, 0),
(49, 11, 24, NULL, NULL, NULL, NULL, NULL, 0),
(50, 7, 19, NULL, NULL, NULL, NULL, NULL, 0),
(51, 7, 12, NULL, NULL, NULL, NULL, NULL, 0),
(52, 12, 18, NULL, NULL, NULL, NULL, NULL, 0),
(53, 12, 19, NULL, NULL, NULL, NULL, NULL, 0),
(55, 12, 12, NULL, NULL, NULL, NULL, NULL, 0),
(56, 12, 13, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
`id` int(10) unsigned NOT NULL,
  `shortName` varchar(25) NOT NULL,
  `longName` varchar(125) NOT NULL,
  `head` varchar(125) NOT NULL,
  `headTitle` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `shortName`, `longName`, `head`, `headTitle`) VALUES
(1, 'CCICT', 'College of Computer, Information, and Communications Technology', 'Josefina J. Pangan', 'Chairman'),
(2, 'CAS', 'College of Arts and Sciences', 'Christopher L. Arcay', 'Chairman'),
(3, 'CBA', 'College of Business and Accountancy', 'Edgardo C. Buhayang', 'Chairman'),
(4, 'COE', 'College of Education', 'Dr. Nympa S. Reserva', 'Dean'),
(5, 'CON', 'College of Nursing', 'Dr. Rosario H. Ailes', 'Dean');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `levelId` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `levelId`) VALUES
(1, 'ITE 202', 'Object-Oriented Programming', 16),
(2, 'Math G1', 'First-grade Mathematics', 3),
(3, 'English G2', 'Second-grade English', 4),
(4, 'English S1', 'Grammar and Whatever', 13),
(5, 'Econ 101', 'Principles of Economics', 15),
(6, 'Math 101', 'College Algebra', 15),
(7, 'Math 100', 'Basic Mathematics', 15),
(8, 'Engl IX', '9th Grade English', 11),
(9, 'Math IX', '9th Grade Mathematics', 11),
(10, 'Science IX', '9th Grade Science', 11),
(11, 'History S1', 'Philippine History', 13),
(12, 'Filipino S1', 'Sining ng Pakikipagtalastasan', 13),
(13, 'Math S1', 'Introductory Mathematics for Senior Highschool', 13),
(14, 'Rizal', 'Life and Works of Jose Rizal', 13),
(15, 'Eng G1', 'First-grade English', 3),
(16, 'Fil G1', 'First-grade Filipino', 3),
(17, 'Writing G1', 'First-grade Writing', 3),
(18, 'Arts G1', 'First-grade Arts', 3);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE IF NOT EXISTS `divisions` (
`id` int(10) unsigned NOT NULL,
  `shortName` varchar(25) NOT NULL,
  `longName` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `shortName`, `longName`) VALUES
(1, 'Kinder', 'Kindergarten School'),
(2, 'Elem', 'Elementary'),
(3, 'JHS', 'Junior High School'),
(4, 'SHS', 'Senior High School'),
(5, 'College', 'College'),
(6, 'GS', 'Graduate School');

-- --------------------------------------------------------

--
-- Table structure for table `enrol`
--

CREATE TABLE IF NOT EXISTS `enrol` (
`id` int(10) unsigned NOT NULL,
  `studentId` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `periodId` int(10) unsigned NOT NULL,
  `levelId` int(10) unsigned NOT NULL,
  `programId` int(10) unsigned DEFAULT NULL,
  `status` int(1) unsigned NOT NULL DEFAULT '1',
  `sectionId` int(10) unsigned DEFAULT NULL,
  `adviser` int(10) unsigned DEFAULT NULL,
  `blockId` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrol`
--

INSERT INTO `enrol` (`id`, `studentId`, `date`, `periodId`, `levelId`, `programId`, `status`, `sectionId`, `adviser`, `blockId`) VALUES
(2, 1, '2015-11-01', 6, 11, NULL, 1, 1, NULL, NULL),
(3, 2, '2015-11-02', 6, 13, 2, 1, NULL, NULL, NULL),
(4, 3, '2015-11-02', 6, 11, NULL, 1, 3, NULL, NULL),
(5, 4, '2015-11-02', 1, 15, 1, 2, NULL, NULL, NULL),
(6, 5, '2015-11-02', 1, 15, 1, 2, NULL, NULL, NULL),
(7, 6, '2015-11-02', 1, 15, 3, 2, NULL, NULL, NULL),
(8, 7, '2015-11-02', 1, 15, 4, 2, NULL, NULL, NULL),
(9, 8, '2015-11-02', 1, 15, 3, 4, NULL, NULL, NULL),
(10, 9, '2015-11-02', 1, 15, 3, 2, NULL, NULL, NULL),
(11, 10, '2015-11-04', 6, 3, NULL, 2, 2, NULL, 2),
(12, 11, '2015-11-21', 1, 15, 1, 2, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
`id` int(10) unsigned NOT NULL,
  `shortName` varchar(25) NOT NULL,
  `longName` varchar(225) NOT NULL,
  `divisionId` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `shortName`, `longName`, `divisionId`) VALUES
(1, 'K1', 'Kindergarten 1', 1),
(2, 'K2', 'Kindergarten 2', 1),
(3, 'G1', 'Grade 1', 2),
(4, 'G2', 'Grade 2', 2),
(5, 'G3', 'Grade 3', 2),
(6, 'G4', 'Grade 4', 2),
(7, 'G5', 'Grade 5', 2),
(8, 'G6', 'Grade 6', 2),
(9, 'G7', 'Grade 7', 3),
(10, 'G8', 'Grade 8', 3),
(11, 'G9', 'Grade 9', 3),
(12, 'G10', 'Grade 10', 3),
(13, 'G11', 'Grade 11', 4),
(14, 'G12', 'Grade 12', 4),
(15, '1', '1st Year College', 5),
(16, '2', '2nd Year College', 5),
(17, '3', '3rd Year College', 5);

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE IF NOT EXISTS `periods` (
`id` int(10) unsigned NOT NULL,
  `shortName` varchar(25) NOT NULL,
  `longName` varchar(225) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `type` int(11) NOT NULL COMMENT '1-annual, 2-semestral, 3-trimestral',
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periods`
--

INSERT INTO `periods` (`id`, `shortName`, `longName`, `start`, `end`, `type`, `active`) VALUES
(1, '1T1516', '1st Semester AY 2015-2016', '2015-06-15', '2015-10-23', 2, 1),
(5, '2T1516', '2nd Semester AY 2015-2016', '2015-11-04', '2016-03-25', 2, 0),
(6, 'SY1516', 'School Year 2015-2016', '2015-06-08', '2016-03-28', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
`id` int(10) unsigned NOT NULL,
  `shortName` varchar(25) NOT NULL,
  `longName` varchar(225) NOT NULL,
  `major` varchar(225) NOT NULL,
  `collegeId` int(10) unsigned DEFAULT NULL,
  `track` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `shortName`, `longName`, `major`, `collegeId`, `track`) VALUES
(1, 'BSIT', 'Bachelor of Science in Information Technology', 'Information Technology', 1, ''),
(2, 'GAS-Crim', 'General Academic Strand leading to Criminology', 'Criminology', NULL, 'academic'),
(3, 'BSA', 'Bachelor of Science Accountancy', 'Accountancy', 3, ''),
(4, 'BSED-Mat', 'Bachelor of Secondary Education', 'Mathematics', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
`id` int(10) unsigned NOT NULL,
  `classId` int(10) unsigned NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `days` varchar(10) NOT NULL,
  `venueId` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `classId`, `start`, `end`, `days`, `venueId`) VALUES
(23, 10, '08:00:00', '09:00:00', 'M,W,F', 2),
(26, 12, '08:00:00', '09:00:00', 'M,W,F', 1),
(27, 12, '09:00:00', '10:00:00', 'M,W,F', 3),
(29, 14, '08:00:00', '09:00:00', 'M,W,F', 7),
(30, 15, '10:00:00', '11:00:00', 'M,W,F', 7),
(31, 16, '09:00:00', '10:30:00', 'M,W,F', 6),
(32, 17, '08:00:00', '09:00:00', 'M,W,F', 5),
(33, 13, '10:00:00', '11:00:00', 'M,W,F', 2),
(34, 18, '07:30:00', '09:00:00', 'T,Th', 1),
(35, 19, '09:00:00', '10:30:00', 'T,Th', 5),
(36, 20, '13:00:00', '14:30:00', 'M,W,F', 1),
(37, 21, '08:00:00', '09:00:00', 'M,T,W,Th,F', 10),
(38, 22, '09:00:00', '10:00:00', 'M,T,W,Th,F', 10),
(42, 23, '11:00:00', '12:00:00', 'M,T,W,Th,F', 11),
(43, 24, '14:00:00', '15:00:00', 'M,T,W,Th,F', 10),
(44, 25, '13:00:00', '14:00:00', 'M,T,W,Th,F', 10);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `adviser` int(10) unsigned NOT NULL,
  `levelId` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `adviser`, `levelId`) VALUES
(1, 'Hope', 1, 3),
(2, 'Honesty', 8, 3),
(3, 'Discipline', 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
`id` int(10) unsigned zerofill NOT NULL,
  `lastName` varchar(125) NOT NULL,
  `firstName` varchar(125) NOT NULL,
  `middleName` varchar(125) NOT NULL,
  `birthDate` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `status` varchar(10) NOT NULL,
  `street` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `state` varchar(225) NOT NULL,
  `citizen` varchar(45) NOT NULL,
  `religion` varchar(45) NOT NULL,
  `father` varchar(225) DEFAULT NULL,
  `mother` varchar(225) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `dateOfEntry` date NOT NULL,
  `userId` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `lastName`, `firstName`, `middleName`, `birthDate`, `gender`, `status`, `street`, `city`, `state`, `citizen`, `religion`, `father`, `mother`, `phone`, `photo`, `dateOfEntry`, `userId`) VALUES
(0000000001, 'Margarito', 'Antonio', 'Marquez', '1970-06-17', 'male', 'Married', 'Cabulijan', 'Tubigon', 'Bohol', 'Mexican', 'Christian', 'Epimaco Margarito', 'Petralba Marquez', '', '', '2015-11-30', 4),
(0000000002, 'Reyes', 'Felicisimo', 'Bagolor', '1985-06-12', 'male', 'Single', 'Bacani', 'Clarin', 'Bohol', 'Filipino', 'Roman Catholic', 'Romero Reyes', 'Imelda Bagolor', '09568524112', '', '2015-11-02', NULL),
(0000000003, 'Lenteria', 'Angela Cecilia', 'Gamutin', '2001-06-05', 'female', 'Single', 'V. Poquita St., Pob Centro', 'Clarin', 'Bohol', 'Filipino', 'Roman Catholic', 'Benjie Lenteria', 'Amorlee Gamutin', '09321029901', '', '2015-11-02', NULL),
(0000000004, 'Ramirez', 'Bryan Joseph', 'Justol', '1990-07-27', 'male', 'Single', 'Ubojan', 'Tubigon', 'Bohol', 'Filipino', 'Roman Catholic', 'Pat Ramirez', 'Violy Justol', '09857453157', '', '2015-11-02', NULL),
(0000000005, 'Antigo', 'Charmaigne', 'Junasa', '1992-12-14', 'female', 'Single', 'Cawayanan', 'Tubigon', 'Bohol', 'Filipino', 'Roman Catholic', 'Margarito Antigo', 'Angela Junasa', '09638547932', '', '2015-11-02', NULL),
(0000000006, 'Infiesto', 'Marlyn', 'Jaganas', '1988-07-19', 'female', 'Single', 'Danahao', 'Clarin', 'Bohol', 'Filipino', 'SDA', 'Silverio Infiesto', 'Hannah Jaganas', '09638547125', '', '2015-11-02', NULL),
(0000000007, 'Elicano', 'Bassilisa Jane', 'Hanog', '1989-10-17', 'female', 'Single', 'Ubojan', 'Tubigon', 'Bohol', 'Filipino', 'Christian', 'Larry Elicano', 'Lisa Hanog', '09857463185', '', '2015-11-02', NULL),
(0000000008, 'Cano', 'Johnrey', 'Lobrigas', '1999-11-23', 'male', 'Single', 'Buenos Aires', 'Tubigon', 'Bohol', 'Filipino', 'Roman Catholic', 'Pablo Cano', 'Teresa Lobrigas', '09854185663', '', '2015-11-02', NULL),
(0000000009, 'Abella', 'Pantasma', 'Honasan', '1999-07-20', 'female', 'Single', 'Cabulijan', 'Tubigon', 'Bohol', 'Filipino', 'Roman Catholic', 'Carlo Abella', 'Bernadette Honasan', '09105287641', '', '2015-11-02', NULL),
(0000000010, 'Pelaez', 'Fermine Jane', 'Abarquez', '2008-10-26', 'female', 'Single', 'Cabulijan', 'Tubigon', 'Bohol', 'Filipino', 'Roman Catholic', 'Hernand Pelaez', 'Victoria Abarquez', '095827854697', '', '2015-11-04', NULL),
(0000000011, 'Honasan', 'Fretz Gerarld', 'Bautista', '1995-06-13', 'male', 'Single', 'Centro Suba', 'Tubigon', 'Bohol', 'Filipino', 'CJLS', 'Gerardo Honasan', 'Fretzie Bautista', '09635248754', '', '2015-11-21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
`id` int(10) unsigned NOT NULL,
  `lastName` varchar(125) NOT NULL,
  `firstName` varchar(125) NOT NULL,
  `salutation` varchar(25) NOT NULL,
  `street` varchar(125) NOT NULL,
  `city` varchar(125) NOT NULL,
  `state` varchar(125) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `specialty` varchar(125) NOT NULL,
  `userId` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `lastName`, `firstName`, `salutation`, `street`, `city`, `state`, `phone`, `specialty`, `userId`) VALUES
(1, 'Lenteria', 'Benjie', 'Mr.', 'V. Poquita St., Pob. Centro', 'Clarin', 'Bohol', '09321029901', 'Computer and Information Technology', 1),
(2, 'Pangan', 'Josefina', 'Mrs.', 'Cabulijan', 'Tubigon', 'Bohol', '-', 'Information Technology', NULL),
(3, 'Filomeno', 'Nathaniel', 'Mr.', 'Centro Suba', 'Tubigon', 'Bohol', '093352487852', 'History', NULL),
(4, 'Palparan', 'Emery', 'Ms.', 'Tinangnan', 'Tubigon', 'Bohol', '09105287442', 'Economics', NULL),
(5, 'Plata', 'Lucy Lynn', 'Ms.', 'Cabulijan', 'Tubigon', 'Bohol', '09934588741', 'Mathematics', NULL),
(6, 'Reyes', 'Harold Lee', 'Mr.', 'Pinayagan Norte', 'Tubigon', 'Bohol', '09524138745', 'Physics', NULL),
(7, 'Sumipo', 'Jasmin', 'Dr.', 'Panadtaran', 'Tubigon', 'Bohol', '0956254774', 'English', NULL),
(8, 'Grade 1 Teacher', 'Sample 1', 'Mr.', 'l', 'l', 'l', 'l', 'l', NULL),
(9, 'Grade 2 Teacher', 'Sample 2', 'Mr.', 'l', 'l', 'l', 'l', 'l', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL,
  `authKey` varchar(25) DEFAULT NULL,
  `accessToken` varchar(25) DEFAULT NULL,
  `role` int(3) unsigned NOT NULL,
  `picPath` varchar(255) DEFAULT NULL,
  `divisionId` int(10) unsigned DEFAULT NULL,
  `collegeId` int(10) unsigned DEFAULT NULL,
  `linkId` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `authKey`, `accessToken`, `role`, `picPath`, `divisionId`, `collegeId`, `linkId`) VALUES
(1, 'lentrix', '54b53072540eeeb8f8e9343e71f28176', NULL, 'tokenLentrix', 100, '', 5, 1, NULL),
(2, 'studTest', '54b53072540eeeb8f8e9343e71f28176', NULL, NULL, 10, '', 4, NULL, NULL),
(3, 'testTeacher', '54b53072540eeeb8f8e9343e71f28176', NULL, NULL, 20, '', 5, NULL, NULL),
(4, 'regTest', '54b53072540eeeb8f8e9343e71f28176', NULL, NULL, 80, '', NULL, NULL, NULL),
(5, 'deanTest', '54b53072540eeeb8f8e9343e71f28176', NULL, NULL, 30, '', 5, 1, NULL),
(6, 'deanTest2', '54b53072540eeeb8f8e9343e71f28176', NULL, NULL, 30, '', 4, NULL, NULL),
(7, 'casDean', '54b53072540eeeb8f8e9343e71f28176', NULL, NULL, 30, '', 5, 2, NULL),
(8, 'elemHead', '54b53072540eeeb8f8e9343e71f28176', NULL, NULL, 30, '', 2, NULL, NULL),
(9, 'ant_shar', '54b53072540eeeb8f8e9343e71f28176', NULL, NULL, 10, '', NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE IF NOT EXISTS `venues` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `capacity` int(3) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `name`, `capacity`) VALUES
(1, 'Room 1', 60),
(2, 'Room 2', 60),
(3, 'Clab 1', 45),
(4, 'CLab 2', 45),
(5, 'Room 3', 60),
(6, 'Room 4', 60),
(7, 'Room 5', 60),
(8, 'St. John', 50),
(9, 'St. Therese', 50),
(10, 'St. Cecilia', 50),
(11, 'St. Francis', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blockClasses`
--
ALTER TABLE `blockClasses`
 ADD PRIMARY KEY (`id`), ADD KEY `classId` (`classId`,`blockId`), ADD KEY `blockId` (`blockId`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
 ADD PRIMARY KEY (`id`), ADD KEY `periodId` (`periodId`), ADD KEY `levelId` (`levelId`), ADD KEY `userId` (`userId`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
 ADD PRIMARY KEY (`id`), ADD KEY `courseId` (`courseId`,`teacherId`,`periodId`), ADD KEY `periodId` (`periodId`), ADD KEY `teacherId` (`teacherId`), ADD KEY `collegeId` (`userId`);

--
-- Indexes for table `classesEnrolled`
--
ALTER TABLE `classesEnrolled`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `enrolId_2` (`enrolId`,`classId`), ADD UNIQUE KEY `enrolId` (`enrolId`,`classId`), ADD KEY `classId` (`classId`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`id`), ADD KEY `levelId` (`levelId`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrol`
--
ALTER TABLE `enrol`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `studentId_2` (`studentId`,`periodId`), ADD KEY `studentId` (`studentId`,`periodId`,`levelId`,`programId`), ADD KEY `programId` (`programId`), ADD KEY `levelId` (`levelId`), ADD KEY `periodId` (`periodId`), ADD KEY `sectionId` (`sectionId`), ADD KEY `adviserId` (`adviser`), ADD KEY `blockId` (`blockId`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
 ADD PRIMARY KEY (`id`), ADD KEY `divisionId` (`divisionId`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
 ADD PRIMARY KEY (`id`), ADD KEY `deptId` (`collegeId`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
 ADD PRIMARY KEY (`id`), ADD KEY `venueId` (`venueId`), ADD KEY `classId` (`classId`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
 ADD PRIMARY KEY (`id`), ADD KEY `adviser` (`adviser`,`levelId`), ADD KEY `levelId` (`levelId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`id`), ADD KEY `userId` (`userId`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
 ADD PRIMARY KEY (`id`), ADD KEY `userId` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD KEY `divisionId` (`divisionId`,`collegeId`), ADD KEY `collegeId` (`collegeId`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blockClasses`
--
ALTER TABLE `blockClasses`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `classesEnrolled`
--
ALTER TABLE `classesEnrolled`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `enrol`
--
ALTER TABLE `enrol`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
MODIFY `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blockClasses`
--
ALTER TABLE `blockClasses`
ADD CONSTRAINT `blockClasses_ibfk_1` FOREIGN KEY (`classId`) REFERENCES `classes` (`id`),
ADD CONSTRAINT `blockClasses_ibfk_2` FOREIGN KEY (`blockId`) REFERENCES `blocks` (`id`);

--
-- Constraints for table `blocks`
--
ALTER TABLE `blocks`
ADD CONSTRAINT `blocks_ibfk_1` FOREIGN KEY (`periodId`) REFERENCES `periods` (`id`),
ADD CONSTRAINT `blocks_ibfk_2` FOREIGN KEY (`levelId`) REFERENCES `levels` (`id`),
ADD CONSTRAINT `blocks_ibfk_3` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
ADD CONSTRAINT `classes_ibfk_2` FOREIGN KEY (`periodId`) REFERENCES `periods` (`id`),
ADD CONSTRAINT `classes_ibfk_3` FOREIGN KEY (`courseId`) REFERENCES `courses` (`id`),
ADD CONSTRAINT `classes_ibfk_4` FOREIGN KEY (`teacherId`) REFERENCES `teachers` (`id`),
ADD CONSTRAINT `classes_ibfk_5` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `classesEnrolled`
--
ALTER TABLE `classesEnrolled`
ADD CONSTRAINT `classesEnrolled_ibfk_1` FOREIGN KEY (`enrolId`) REFERENCES `enrol` (`id`),
ADD CONSTRAINT `classesEnrolled_ibfk_2` FOREIGN KEY (`classId`) REFERENCES `classes` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`levelId`) REFERENCES `levels` (`id`);

--
-- Constraints for table `enrol`
--
ALTER TABLE `enrol`
ADD CONSTRAINT `enrol_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `students` (`id`),
ADD CONSTRAINT `enrol_ibfk_2` FOREIGN KEY (`programId`) REFERENCES `programs` (`id`),
ADD CONSTRAINT `enrol_ibfk_3` FOREIGN KEY (`levelId`) REFERENCES `levels` (`id`),
ADD CONSTRAINT `enrol_ibfk_4` FOREIGN KEY (`periodId`) REFERENCES `periods` (`id`),
ADD CONSTRAINT `enrol_ibfk_5` FOREIGN KEY (`sectionId`) REFERENCES `sections` (`id`),
ADD CONSTRAINT `enrol_ibfk_6` FOREIGN KEY (`adviser`) REFERENCES `teachers` (`id`),
ADD CONSTRAINT `enrol_ibfk_7` FOREIGN KEY (`blockId`) REFERENCES `blocks` (`id`);

--
-- Constraints for table `levels`
--
ALTER TABLE `levels`
ADD CONSTRAINT `levels_ibfk_1` FOREIGN KEY (`divisionId`) REFERENCES `divisions` (`id`);

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
ADD CONSTRAINT `programs_ibfk_1` FOREIGN KEY (`collegeId`) REFERENCES `colleges` (`id`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`venueId`) REFERENCES `venues` (`id`),
ADD CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`classId`) REFERENCES `classes` (`id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`adviser`) REFERENCES `teachers` (`id`),
ADD CONSTRAINT `sections_ibfk_2` FOREIGN KEY (`levelId`) REFERENCES `levels` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`divisionId`) REFERENCES `divisions` (`id`),
ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`collegeId`) REFERENCES `colleges` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
