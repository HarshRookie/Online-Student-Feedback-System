-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2016 at 06:13 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentfeedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `Fed_No` int(3) NOT NULL,
  `Roll_No` int(3) NOT NULL,
  `Sub_Name` varchar(100) NOT NULL,
  `Feedback` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Fed_No`, `Roll_No`, `Sub_Name`, `Feedback`) VALUES
(1, 1, 'DBMS', 'The quick brown fox jumps over the lazy dogs.'),
(2, 1, 'English', 'The quick brown fox jumps over the lazy dogs.'),
(3, 2, 'DBMS', 'The quick brown fox jumps over the lazy dogs.'),
(4, 2, 'ST', 'The quick brown fox jumps over the lazy dogs.'),
(5, 1, 'HATF', 'Hate, bruv.'),
(6, 1, 'Hindi', 'KJVSCMBN dlsckn jhvmnv');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Roll_No` int(3) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Pass` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Roll_No`, `Name`, `Pass`) VALUES
(1, 'agnish', 'dcfe8beefb6f02ca722073c6bc62d80c'),
(2, 'ABC', '900150983cd24fb0d6963f7d28e17f72');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `Sub_No` int(3) NOT NULL,
  `Sub_Name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Sub_No`, `Sub_Name`) VALUES
(13, ',jbm,n'),
(7, 'DBMS'),
(5, 'English'),
(9, 'HATF'),
(4, 'Hindi'),
(12, 'kjbmnb'),
(11, 'lbn,mn'),
(6, 'Maths'),
(10, 'mb,m'),
(14, 'MIT'),
(8, 'ST');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Fed_No`),
  ADD KEY `Roll_No` (`Roll_No`),
  ADD KEY `Sub_Name` (`Sub_Name`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Roll_No`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Sub_No`),
  ADD UNIQUE KEY `Sub_Name` (`Sub_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Fed_No` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Roll_No` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Sub_No` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`Roll_No`) REFERENCES `student` (`Roll_No`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`Sub_Name`) REFERENCES `subject` (`Sub_Name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
