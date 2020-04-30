-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 03:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `Application_ID` int(11) NOT NULL,
  `Student_Name` varchar(20) NOT NULL,
  `Student_ID` int(8) NOT NULL,
  `Student_Address` varchar(80) NOT NULL,
  `Student_City` varchar(50) NOT NULL,
  `Student_State` varchar(2) NOT NULL,
  `Student_Zip_Code` int(5) NOT NULL,
  `Student_Home_Phone` varchar(12) NOT NULL,
  `Student_Work_Phone` varchar(12) NOT NULL,
  `Metrostate_Advisor` varchar(80) NOT NULL,
  `Student_Email` varchar(80) NOT NULL,
  `Company_Name` varchar(50) NOT NULL,
  `Company_Email` varchar(80) NOT NULL,
  `Company_Address` varchar(80) NOT NULL,
  `Company_City` varchar(50) NOT NULL,
  `Company_State` varchar(2) NOT NULL,
  `Company_Zip_Code` int(5) NOT NULL,
  `Site_Supervisor_Name` varchar(80) NOT NULL,
  `Site_Supervisor_Phone` varchar(12) NOT NULL,
  `Site_Supervisor_Email` varchar(80) NOT NULL,
  `Internship_Evaluator_Name` varchar(80) NOT NULL,
  `Internship_Evaluator_Phone` varchar(12) NOT NULL,
  `Internship_Evaluator_Email` varchar(80) NOT NULL,
  `Internship_Evaluator_Resume` varchar(400) NOT NULL,
  `Internship_Title` varchar(80) NOT NULL,
  `Academic_Focus` varchar(80) NOT NULL,
  `Graduate_Or_Undergraduate` varchar(20) NOT NULL,
  `Grading_Scale` varchar(30) NOT NULL,
  `Requested_Credits` int(2) NOT NULL,
  `College` varchar(80) NOT NULL,
  `Academic_Major` varchar(80) NOT NULL,
  `Academic_Minor` varchar(80) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Hours_Per_Week` int(2) NOT NULL,
  `Compensation` varchar(40) NOT NULL,
  `Competence_Statement` varchar(1000) NOT NULL,
  `Learning_Strategy` varchar(1000) NOT NULL,
  `Evaluation` varchar(1000) NOT NULL,
  `Submitted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `applications_comments`
--

CREATE TABLE `applications_comments` (
  `Application_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Comment` varchar(1000) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `applications_status`
--

CREATE TABLE `applications_status` (
  `Application_ID` int(11) NOT NULL,
  `Student_Signature` varchar(80) NOT NULL,
  `Employer_Signature` varchar(80) DEFAULT NULL,
  `Faculty_Liaison_Signature` varchar(80) DEFAULT NULL,
  `Dean_Signature` varchar(80) DEFAULT NULL,
  `Internship_Coordinator_Signature` varchar(80) DEFAULT NULL,
  `Application_Status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `User_ID` int(11) NOT NULL,
  `Student_ID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `User_Type` varchar(50) NOT NULL,
  `User_Name` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `User_Type`, `User_Name`, `Password`, `Email`, `First_Name`, `Last_Name`, `Created`) VALUES
(1, 'Admin', 'admin', '$2y$10$oMdpnIofYF.Hcd4cqIq0pu61nbNt9tXni6XxH8wfU74qoVqzUZXT.', 'admin@gmail.com', 'Prechar', 'Xiong', '2020-04-10'),
(15, 'Dean', 'dean101', '$2y$10$JFvooMs69RyyVl4dC6NiwutEgjeexuxbbHXbydkFJICCROUS.etgK', 'dean@gmail.com', 'Alvin', 'Chimp', '2020-04-13'),
(16, 'FacultyLiaison', 'faculty101', '$2y$10$Jg094KF6mtSAFgHfYp2sEeVoYTczkbbVvtsGBw83O1fFRx9K5oWiu', 'facultyliaison@gmail.com', 'Robert', 'Peterson', '2020-04-13'),
(17, 'InternshipCoordinator', 'coordinator101', '$2y$10$0BS8icwI9odOLkarOil8f.zU1Tqimw2S9ODaLikhbmpsvWyEUdwmC', 'coordinator@gmail.com', 'Ryan', 'Luck', '2020-04-13'),
(20, 'Employer', 'employer111', '$2y$10$dtzRGzSse9rLm53Ohpd/5.1XL6YCnr7BCHQ8hxF/ZxwewwJe3g/8W', 'employer111@gmail.com', 'Julie', 'Roberts', '2020-04-20'),
(34, 'Employer', 'employer100', '$2y$10$gbNY7w5t49MF6Y/96uMHhu0HjALITDfnfRy84IdCQayP9TM/qM.dm', 'employer100@gmail.com', 'Prechar', 'Xiong', '2020-04-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`Application_ID`),
  ADD KEY `Applications_Student_ID` (`Student_ID`);

--
-- Indexes for table `applications_comments`
--
ALTER TABLE `applications_comments`
  ADD KEY `Comments_User_ID` (`User_ID`),
  ADD KEY `Comments_Applcation_ID` (`Application_ID`);

--
-- Indexes for table `applications_status`
--
ALTER TABLE `applications_status`
  ADD KEY `Status_Applications_ID` (`Application_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_ID`),
  ADD KEY `Students_User_ID` (`User_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `Application_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `Applications_Student_ID` FOREIGN KEY (`Student_ID`) REFERENCES `students` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applications_comments`
--
ALTER TABLE `applications_comments`
  ADD CONSTRAINT `Comments_Applcation_ID` FOREIGN KEY (`Application_ID`) REFERENCES `applications` (`Application_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Comments_User_ID` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applications_status`
--
ALTER TABLE `applications_status`
  ADD CONSTRAINT `Status_Applications_ID` FOREIGN KEY (`Application_ID`) REFERENCES `applications` (`Application_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `Students_User_ID` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
