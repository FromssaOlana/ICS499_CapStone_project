-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 10:31 AM
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
(1, 'Prechar Xiong', 12345678, '10 Something Street', 'Saint Paul', 'MN', 55130, '123-456-7890', '123-456-7890', 'That One Guy', 'wp1080lt@go.minnstate.edu', 'CBRE', 'CBRE@gmail.com', '1020 Oakdale Drive', 'Oakdale', 'MN', 55140, 'Thomas Anderson', '987-654-3210', 'tanderson@gmail.com', 'George Washington', '111-222-3333', 'gwashington@gmail.com', 'uploads/5e843e2dd0eab5.21204701.docx', 'Software Engineer Intern', 'Computer Science', 'Undergraduate', 'Letter Grade', 4, 'College of Sciences', 'Computer Science', 'Mathematics', '2020-04-20', '2020-08-20', 30, 'Wages', 'I like turtles! I like turtles! I like turtles! I like \r\nturtles! I like turtles! I like turtles! I like turtles! I \r\nlike turtles! I like turtles!', 'I like turtles! I like turtles! I like turtles! I like \r\nturtles! I like turtles! I like turtles! I like turtles! I \r\nlike turtles! I like turtles!', 'I like turtles! I like turtles! I like turtles! I like \r\nturtles! I like turtles! I like turtles! I like turtles! I \r\nlike turtles! I like turtles!', 'Prechar Xiong', 'craig nelson', 'craig nelson', 'craig nelson', 'craig nelson', 'Approved'),
(2, 'Guy Niche', 98745610, 'Somewhere Street', 'Saint Paul', 'MN', 55130, '444-333-2222', '444-333-2222', 'That Guy There', 'myschoolemail@go.minnstate.edu', '3M', '3M@gmail.com', '1020 Oakdale Drive', 'Oakdale', 'MN', 55140, 'Thomas Anderson', '987-654-3210', 'someone@gmail.com', 'George Abraham', '444-333-2221', 'gabraham@gmail.com', 'uploads/5e8444c7319801.18397339.pdf', 'Software Engineer Intern', 'Computer Science', 'Graduate', 'S/N', 3, 'College of Sciences', 'Computer Science', 'Mathematics', '2020-04-20', '2020-08-20', 30, 'Stipend', 'I like sleeping! I like sleeping! I like sleeping! I like \r\nsleeping! I like sleeping! I like sleeping! I like sleeping!', 'I like sleeping! I like sleeping! I like sleeping! I like \r\nsleeping! I like sleeping! I like sleeping! I like sleeping!', 'I like sleeping! I like sleeping! I like sleeping! I like \r\nsleeping! I like sleeping! I like sleeping! I like sleeping!', 'Guy Niche', NULL, NULL, NULL, NULL, 'in progress');

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
('employer101', 'CBRE'),
('pxiong037', '3M');

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
('dude', 12345678),
('student101', 98745610);

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
(49, 'testingupload.pdf', 'application/pdf', 34159, 'uploads/5e83c8e4d9a7e0.39598137.pdf'),
(50, 'testingupload.pdf', 'application/pdf', 34159, 'uploads/5e83c90c5fc8c7.30437427.pdf'),
(51, 'testingupload.pdf', 'application/pdf', 34159, 'uploads/5e83c9380d8973.24780259.pdf'),
(52, 'testingupload.pdf', 'application/pdf', 34159, 'uploads/5e83c952275211.48599278.pdf'),
(53, 'testingupload.pdf', 'application/pdf', 34159, 'uploads/5e83ca440e4212.14407645.pdf'),
(54, 'testingupload.pdf', 'application/pdf', 34159, 'uploads/5e83caa2cef8b8.15066115.pdf'),
(55, 'Internship Evaluation Resume.docx', 'application/vnd.openxmlformats', 11666, 'uploads/5e8439267e1800.91619204.docx'),
(56, 'Internship Evaluation Resume.docx', 'application/vnd.openxmlformats', 11666, 'uploads/5e843d0a542025.11084001.docx'),
(57, 'Internship Evaluation Resume.docx', 'application/vnd.openxmlformats', 11666, 'uploads/5e843d807fd506.11843061.docx'),
(58, 'Internship Evaluation Resume.docx', 'application/vnd.openxmlformats', 11666, 'uploads/5e843dad357513.18515590.docx'),
(59, 'Internship Evaluation Resume.docx', 'application/vnd.openxmlformats', 11666, 'uploads/5e843e2dd0eab5.21204701.docx'),
(60, 'Internship Evaluation Resume.docx', 'application/vnd.openxmlformats', 11666, 'uploads/5e84443b254215.69398772.docx'),
(61, 'Internship Evaluation Resume.docx', 'application/vnd.openxmlformats', 11666, 'uploads/5e84446ce419d9.34500749.docx'),
(62, 'Internship Evaluation Resume.pdf', 'application/pdf', 188529, 'uploads/5e8444a92b2ff2.94454356.pdf'),
(63, 'Internship Evaluation Resume.pdf', 'application/pdf', 188529, 'uploads/5e8444c7319801.18397339.pdf');

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
  `Last_Name` varchar(20) NOT NULL,
  `Created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Type`, `User_Name`, `Password`, `Email`, `First_Name`, `Last_Name`, `Created`) VALUES
('Admin', 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'admin@gmail.com', 'Admin', 'Guy', '2020-03-31'),
('Internship Coordinator', 'coordinator101', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'internshipcoordinator@gmail.com', 'Craig', 'Kerska', '2020-03-31'),
('Dean', 'dean101', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dean@gmail.com', 'Bob', 'Anderson', '2020-03-31'),
('Student', 'dude', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dude@gmail.com', 'Prechar', 'Xiong', '2020-03-31'),
('Employer', 'employer101', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'employer@gmail.com', 'Billy', 'Jean', '2020-04-01'),
('Faculty Liaison', 'faculty101', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'facultyliaison@gmail.com', 'Rob', 'Nelson', '2020-03-31'),
('Employer', 'pxiong037', '7c4a8d09ca3762af61e59520943dc26494f8941b', '3M@gmail.com', 'Jackie', 'Chan', '2020-04-01'),
('Student', 'student101', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'student101@gmail.com', 'Guy', 'Niche', '2020-04-01');

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
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
