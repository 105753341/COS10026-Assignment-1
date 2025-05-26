-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 02:08 PM
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
  `job_ref_number` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `gender` bit(2) NOT NULL,
  `street_address` varchar(100) NOT NULL,
  `suburb` varchar(50) NOT NULL,
  `state` varchar(3) NOT NULL,
  `postcode` varchar(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `skill_html` tinyint(1) DEFAULT 0,
  `skill_css` tinyint(1) DEFAULT 0,
  `skill_js` tinyint(1) DEFAULT 0,
  `skill_python` tinyint(1) DEFAULT 0,
  `skill_sql` tinyint(1) DEFAULT 0,
  `other_skills` text DEFAULT NULL,
  `status` enum('New','Current','Final') DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `job_ref_number`, `first_name`, `last_name`, `dob`, `gender`, `street_address`, `suburb`, `state`, `postcode`, `email`, `phone`, `skill_html`, `skill_css`, `skill_js`, `skill_python`, `skill_sql`, `other_skills`, `status`) VALUES
(0, 'NET17', 'Jaimee', 'Strachan', '2001-08-31', b'11', '5 scenic crescent', 'Kalorama', 'VIC', '3766', 'strawnie3766@gmail.com', '0476162247', 0, 0, 0, 0, 0, 'N/A', 'New');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$0tHCI9FjtaS3yYR3O0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
