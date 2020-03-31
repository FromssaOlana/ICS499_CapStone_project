-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 03:29 AM
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
  `Student_Signature` varchar(80) DEFAULT NULL,
  `Employer_Signature` varchar(80) DEFAULT NULL,
  `Faculty_Liaison_Signature` varchar(80) DEFAULT NULL,
  `Dean_Signature` varchar(80) DEFAULT NULL,
  `Internship_Coordinator_Signature` varchar(80) DEFAULT NULL,
  `Application_Status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`Application_ID`, `Student_Name`, `Student_ID`, `Student_Address`, `Student_City`, `Student_State`, `Student_Zip_Code`, `Student_Home_Phone`, `Student_Work_Phone`, `Metrostate_Advisor`, `Student_Email`, `Company_Name`, `Company_Email`, `Company_Address`, `Company_City`, `Company_State`, `Company_Zip_Code`, `Site_Supervisor_Name`, `Site_Supervisor_Phone`, `Site_Supervisor_Email`, `Internship_Evaluator_Name`, `Internship_Evaluator_Phone`, `Internship_Evaluator_Email`, `Internship_Evaluator_Resume`, `Internship_Title`, `Academic_Focus`, `Graduate_Or_Undergraduate`, `Grading_Scale`, `Requested_Credits`, `College`, `Academic_Major`, `Academic_Minor`, `Start_Date`, `End_Date`, `Hours_Per_Week`, `Compensation`, `Competence_Statement`, `Learning_Strategy`, `Evaluation`, `Student_Signature`, `Employer_Signature`, `Faculty_Liaison_Signature`, `Dean_Signature`, `Internship_Coordinator_Signature`, `Application_Status`) VALUES
(1, 'Prechar Xiong', 12345678, '2972 frederick pkwy', 'SAINT PAUL', 'MN', 55109, '320-336-9524', '320-336-9524', 'Dude Xiong', 'wp2080tl@go.minnstate.edu', 'CBRE', 'craig.nelson2@cbre.com', '10 River Park Plaza', 'Saint Paul', 'MN', 12345, 'Dude Xiong', '320-336-9524', 'craig.nelson2@cbre.com', 'Dude Xiong', '320-336-9524', 'craig.nelson2@cbre.com', 'uploads/5e8291aab5dc93.70391343.pdf', 'Awesome Dude', 'Awesome Focus', 'Undergraduate', 'Letter Grade', 4, 'College of Sciences', 'Computer Science', 'Mathematics', '2020-04-01', '2020-04-20', 4, 'Wages', 'I like turtles. I like turtles. I like turtles. I like \r\nturtles. I like turtles. I like turtles. I like turtles. I \r\nlike turtles.', 'I like turtles. I like turtles. I like turtles. I like \r\nturtles. I like turtles. I like turtles. I like turtles. I \r\nlike turtles.', 'I like turtles. I like turtles. I like turtles. I like \r\nturtles. I like turtles. I like turtles. I like turtles. I \r\nlike turtles.', 'Prechar Xiong', NULL, NULL, NULL, NULL, 'in progress');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `User_Name` varchar(20) NOT NULL,
  `Company_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`User_Name`, `Company_Name`) VALUES
('dude', 'CBRE');

-- --------------------------------------------------------

--
-- Table structure for table `output_images`
--

CREATE TABLE `output_images` (
  `imageID` tinyint(3) NOT NULL,
  `imageType` varchar(25) NOT NULL,
  `imageData` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `User_Name` varchar(20) NOT NULL,
  `Student_ID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`User_Name`, `Student_ID`) VALUES
('dude123', 87654320),
('pxiong037', 12345678);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `name`, `type`, `size`, `content`) VALUES
(49, 'AER Get Started FAQ pdf aerotek.pdf', 'application/pdf', 448026, 'uploads/5e8291aab5dc93.70391343.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Type` varchar(50) NOT NULL,
  `User_Name` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Type`, `User_Name`, `Password`, `Email`, `First_Name`, `Last_Name`) VALUES
('Employer', 'dude', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'craig.nelson2@cbre.com', 'Dude', 'Xiong'),
('Student', 'dude123', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dude123@gmail.com', 'Prechar', 'Xiong'),
('Student', 'pxiong037', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'pxiong037@gmail.com', 'Prechar', 'Xiong');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`Application_ID`),
  ADD KEY `comp_name` (`Company_Name`),
  ADD KEY `student_id` (`Student_ID`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`Company_Name`),
  ADD KEY `Employers_User_Name` (`User_Name`);

--
-- Indexes for table `output_images`
--
ALTER TABLE `output_images`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_ID`),
  ADD KEY `Students_User_Name` (`User_Name`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `output_images`
--
ALTER TABLE `output_images`
  MODIFY `imageID` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `comp_name` FOREIGN KEY (`Company_Name`) REFERENCES `employers` (`Company_Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_id` FOREIGN KEY (`Student_ID`) REFERENCES `students` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employers`
--
ALTER TABLE `employers`
  ADD CONSTRAINT `Employers_User_Name` FOREIGN KEY (`User_Name`) REFERENCES `users` (`User_Name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `Students_User_Name` FOREIGN KEY (`User_Name`) REFERENCES `users` (`User_Name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
