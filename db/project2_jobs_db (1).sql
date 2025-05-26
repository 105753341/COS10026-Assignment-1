-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 12:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2_jobs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `job_ref_number` varchar(5) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `street_address` varchar(40) NOT NULL,
  `suburb` varchar(40) NOT NULL,
  `state` enum('VIC','NSW','QLD','NT','WA','SA','TAS','ACT') NOT NULL,
  `postcode` char(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `skill_html` varchar(3) DEFAULT NULL,
  `skill_css` varchar(3) DEFAULT NULL,
  `skill_js` varchar(3) DEFAULT NULL,
  `skill_python` varchar(3) DEFAULT NULL,
  `skill_sql` varchar(3) DEFAULT NULL,
  `other_skills` text DEFAULT NULL,
  `status` enum('New','Current','Final') DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `job_ref_number`, `first_name`, `last_name`, `street_address`, `suburb`, `state`, `postcode`, `email`, `phone`, `dob`, `gender`, `skill_html`, `skill_css`, `skill_js`, `skill_python`, `skill_sql`, `other_skills`, `status`) VALUES
(1, 'CYB71', 'Jashandeep', 'Kaur', '2 Jacana Ave', 'Melbourne', 'VIC', '3107', 'jashandeepk278@gmail.com', '0420406071', '2025-05-04', 'Female', 'No', 'No', 'No', 'No', 'No', '', 'New'),
(2, 'CYB71', 'Jashandeep', 'Kaur', '2 Jacana Ave', 'Melbourne', 'VIC', '3107', 'jashandeepk278@gmail.com', '0420406071', '2025-05-04', 'Female', 'No', 'No', 'No', 'No', 'No', '', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `reference` varchar(10) NOT NULL,
  `reporting_to` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `responsibilities` text DEFAULT NULL,
  `qualifications` text DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `job_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `title`, `reference`, `reporting_to`, `description`, `responsibilities`, `qualifications`, `location`, `salary`, `job_type`) VALUES
(1, 'Network Administrator', 'NET17', 'Network Architect', 'Responsible for managing and maintaining the organization\'s network infrastructure.', '<ul><li>Install and maintain network devices</li><li>Ensure security</li><li>Diagnose network issues</li></ul>', '<ol><li>CCNA/Network+ Certification</li><li>Strong troubleshooting skills</li><li>Experience in network admin</li></ol>', 'On-site', '$50,000 - $80,000', 'Full-Time'),
(2, 'Cybersecurity Analyst', 'CYB71', 'Chief Information Security Officer', 'Protect systems from cyber threats.', '<ul><li>Monitor traffic</li><li>Simulate attacks</li><li>Handle breaches</li></ul>', '<ol><li>Security+ or CEH</li><li>Bachelor\'s in IT</li><li>Some work experience</li></ol>', 'Hybrid', 'Competitive', 'Full-Time');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
