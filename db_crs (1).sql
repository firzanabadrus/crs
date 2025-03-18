-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 18, 2025 at 05:27 AM
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
-- Database: `db_crs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_course`
--

CREATE TABLE `tb_course` (
  `c_code` varchar(10) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_credit` int(11) NOT NULL,
  `c_lect` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_course`
--

INSERT INTO `tb_course` (`c_code`, `c_name`, `c_credit`, `c_lect`) VALUES
('SEC2753', 'Data Mining', 3, 'L0003'),
('SECD3761', 'Technopreneurship Seminar (WBL)', 1, 'L0005'),
('SECI1013', 'Discrete Structure', 3, 'L0005'),
('SECI1143', 'Probability & Statistical Data Analysis', 3, 'L0002'),
('SECJ1013', 'Programming Technique 1', 3, 'L1234'),
('SECJ1023', 'Programming Technique 2', 3, 'L1234'),
('SECJ2013', 'Data Structure & Algorithm', 3, 'L1234'),
('SECJ2154', 'Object-Oriented Programming', 4, 'L1234'),
('SECP1513', 'Technology & Information Systems (WBL)', 3, 'L0001'),
('SECP2163', 'System Analysis & Design (WBL)', 3, 'L0003'),
('SECP2523', 'Database (WBL)', 3, 'L0001'),
('SECP3204', 'Software Engineering (WBL)', 3, 'L0003'),
('SECP3223', 'Data Analytic Programming', 3, 'L1234'),
('SECP3723', 'System Development Technology', 3, 'L0002'),
('SECR1013', 'Digital Logic', 3, 'L0004'),
('SECR1033', 'Computer Organization & Architecture', 3, 'L0003'),
('SECR2043', 'Operating System', 3, 'L0002'),
('SECR2213', 'Network Communication', 3, 'L0001'),
('SECV2113', 'Human Computer Interaction', 3, 'L0003'),
('UHLB2122', 'Professional Communication Skills 1', 2, 'L0001'),
('ULRS1012', 'Integrity & Anti-Corruption', 2, 'L0004'),
('ULRS1182', 'Appreciation of Ethics & Civilizations\r\n', 2, 'L0004');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notification`
--

CREATE TABLE `tb_notification` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` enum('unread','read') DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_notification`
--

INSERT INTO `tb_notification` (`id`, `student_id`, `message`, `status`, `created_at`) VALUES
(1, 'S003', 'Your course registration has been approved!', 'unread', '2025-01-30 23:23:59'),
(2, 'S003', 'Your course registration has been approved!', 'unread', '2025-01-30 23:24:03'),
(3, 'S1002', 'Your course registration has been rejected.', 'unread', '2025-01-30 23:24:08'),
(4, 'S1002', 'Your course registration has been rejected.', 'unread', '2025-01-30 23:24:14'),
(5, 'S1234', 'Your course registration has been approved!', 'unread', '2025-01-31 01:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_registration`
--

CREATE TABLE `tb_registration` (
  `r_tID` int(11) NOT NULL COMMENT 'This is the transaction ID',
  `r_student` varchar(10) NOT NULL,
  `r_course` varchar(10) NOT NULL,
  `r_sem` varchar(11) NOT NULL,
  `r_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_registration`
--

INSERT INTO `tb_registration` (`r_tID`, `r_student`, `r_course`, `r_sem`, `r_status`) VALUES
(1, 'S001', 'SECP3723', '2024/2025-1', 1),
(18, 'S1002', 'SECP3723', '2024/2025-1', 1),
(20, 'S003', 'SECP2163', '2024/2025-1', 1),
(22, 'S003', 'SECP3723', '2024/2025-1', 1),
(25, 'S003', 'SECV2113', '2024/2025-2', 1),
(26, 'S003', 'ULRS1182', '2024/2025-1', 1),
(32, 'S0005', 'SECP2163', '2024/2025-2', 1),
(35, 'S1002', 'ULRS1182', '2024/2025-2', 1),
(36, 'S0005', 'SECR2213', '2024/2025-2', 2),
(37, 'S1234', 'SECJ2013', '2024/2025-1', 1),
(39, 'S1234', 'SECR2043', '2024/2025-2', 2),
(40, 'S1234', 'SECJ2154', '2024/2025-2', 2),
(42, 'S1234', 'SECP2523', '2024/2025-1', 1),
(43, 'S1234', 'SECP3204', '2024/2025-1', 1),
(44, 'S1234', 'SECP3723', '2024/2025-1', 1),
(45, 'S1234', 'SECR2213', '2024/2025-1', 1),
(46, 'S1234', 'SEC2753', '2024/2025-2', 1),
(47, 'S1234', 'SECP3223', '2024/2025-2', 1),
(48, 'S1234', 'UHLB2122', '2024/2025-2', 2),
(50, 'S1001', 'SECP3223', '2024/2025-2', 1),
(51, 'S1001', 'SECJ2154', '2024/2025-2', 1),
(52, 'S1001', 'SECP3723', '2024/2025-1', 1),
(53, 'S1001', 'SECR2043', '2024/2025-2', 2),
(54, 'S1001', 'SECD3761', '2024/2025-2', 2),
(55, 'S1004', 'SECI1143', '2024/2025-1', 1),
(56, 'S1004', 'ULRS1182', '2024/2025-2', 1),
(57, 'S1004', 'SECJ1023', '2024/2025-2', 1),
(58, 'S1004', 'SECP2163', '2024/2025-2', 2),
(59, 'S1004', 'SECR1033', '2024/2025-2', 1),
(60, 'S1005', 'SECJ1023', '2024/2025-2', 1),
(61, 'S1005', 'SECR1033', '2024/2025-2', 2),
(62, 'S1005', 'SECI1013', '2024/2025-1', 1),
(63, 'S1005', 'SECP2163', '2024/2025-2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `s_id` int(11) NOT NULL,
  `s_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`s_id`, `s_desc`) VALUES
(1, 'Approved'),
(2, 'Pending'),
(3, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `u_sNo` varchar(10) NOT NULL,
  `u_pwd` varchar(255) NOT NULL,
  `u_email` varchar(30) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_contact` int(20) NOT NULL,
  `u_state` varchar(20) NOT NULL,
  `u_req` date DEFAULT NULL,
  `u_uType` int(11) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`u_sNo`, `u_pwd`, `u_email`, `u_name`, `u_contact`, `u_state`, `u_req`, `u_uType`, `verification_token`, `is_verified`) VALUES
('A1234', '$2y$10$HX58RORW7e2QJ6EoVmcASeOsKx3OQwqDw73Rix6Zbx7q3qs8gYcAa', 'admin1@email.com', 'admin1', 1343425245, 'Johor', '2025-01-30', 3, NULL, 1),
('L0001', '$2y$10$F7PEqC.UKFF1e0LqhcRMwuMwnHawkTT6pdKTbHxAZmM/oIiQpl3uS', 'lect1@email.com', 'test lect 1', 12312321, 'Sabah', '2025-01-30', 1, NULL, 1),
('L0002', '$2y$10$qTcVF5TxJbky8HpZlapqPO3alfLL.85qLev9Te4/TdSFPuVIwqjZG', 'lect2@email.com', 'NOR BINTI RAHMAN', 102468127, 'Pahang', '2025-01-30', 1, NULL, 1),
('L0003', '$2y$10$s7MiFmg/Br/rdrZ7XugQWOCjcpjmO8OcxGCKGKVJlW2Qww.pzQMCe', 'lect3@email.com', 'AHMAD BIN ABU', 100909090, 'Kedah', '2025-01-30', 1, NULL, 1),
('L0004', '$2y$10$Dd/n38Fc/fLU/NVgtPhdwOmtYFv4MtyiYzxTpkTxhCLazwnvTBHti', 'lect4@email.com', 'ARIFF BIN HADI', 121232131, 'Perak', '2025-01-30', 1, NULL, 1),
('L0005', '$2y$10$ykdTFg7bUua1prf0IQo3pu0dEBE4Fyh.pxgz7X2D7q0H/YGxiIR0G', 'lecturer5@email.com', 'NURMADIHA BINTI OTHMAN', 2147483647, 'Johor', '2025-01-31', 2, '99c5639bed0fced32bfbff18c44720f7fbfcc8c8edc9df4d6607631c6afc6ea766fe402710a23ca11d414f50f5a49a0196de', 1),
('L001', 'pensyarah123', 'aina@gmail.com', 'Aina Abdul', 191111111, 'Johor', '2023-02-01', 1, NULL, 1),
('L002', 'pensyarah123', 'faz@gmail.com', 'Fazura Abdul', 172222222, 'Kelantan', '2023-02-01', 1, NULL, 1),
('L1234', '$2y$10$tSMrF5W7T7bPZUPXl66Dq.7YIykmNVs4TJhjtL72/LWHaNJ8LsaC2', 'raisya@email.com', 'NURULRAISYA BINTI EDI', 171234312, 'Terengganu', '2025-01-30', 1, NULL, 1),
('S0005', '$2y$10$vKB3OP5WWZVsaJUSD5dywegWJXQmju4MwbhsXbOaNxyt5zCCA0dEy', 'aqil@email.com', 'Aqil', 60172345, 'Perlis', '2025-01-30', 2, NULL, 1),
('S001', '*D849C969AD13DAE31321B2B7744DA4E928622042', 'fat@gmail.com', 'Fatah Abdul', 133333333, 'Melaka', '2024-02-01', 2, NULL, 1),
('S002', 'pelajar123', 'kam@gmail.com', 'Kamarul Abdul', 144444444, 'Selangor', '2024-10-01', 2, NULL, 1),
('S003', 'pelajar123', 'firzana@gmail.com', 'Nur Firzana', 167527686, 'Johor', '2024-11-13', 2, NULL, 1),
('S1001', '$2y$10$PTfpaKkqvI4mFogkKlFCvOgTbyk/lNTS5u5RIQMV4MBxk4jLGcMLq', 'test2@email.com', 'Nur Hana', 601421324, 'Terengganu', '2025-01-30', 2, NULL, 1),
('S1002', '$2y$10$LM7Wfrtvc9dNBp/i9btdp.e4r1q7.LWabuBQXEWwdfmxfeaXajnpG', 'test6@email.com', 'MOHD ADAM', 60123424, 'Selangor', '2025-01-30', 2, NULL, 1),
('S1004', '$2y$10$ev9veyWR.Fun1z0lMLzPfequCfzR/zcqhURC55/O7qYR1Q4tweE8W', 'nurfirzanab@gmail.com', 'MUHD AMDAN', 2147483647, 'Perak', '2025-01-31', 2, '4302895c42c4a0b45f5883b79d604a220c12c275d5b45d6ca5fe9f12cc2382ba46f793e90b51b3a50c4291586e72c5e16145', 1),
('S1005', '$2y$10$o.LG8uDGxNeqzT9NuyFtleroHsvy5VApBcfE/bkRLha3.rWXD2m3y', 'testlagi@example.com', 'MUHD LIONEL', 2147483647, 'Sabah', '2025-01-31', 2, '7493389e28dbd2b7e1305524b57e1ce7e04efbdde3586abada68dde77e718b86906dc97ed2657085dd5950c395e79b03598a', 1),
('S1006', '$2y$10$CcC8ku1VL79rmTbpVW6Kl.Udf7o4XOd/ZdhhQKJm9fcqPw8IN5ueO', 'nurfirzana@graduate.utm.my', 'Muhd Rayan', 601232454, 'Terengganu', '2025-01-31', 2, NULL, 1),
('S1007', '$2y$10$axjnjpnqubDPFypcENPve.2Qrj0pKQrqO3uoj4czAb.SPKSInq47q', 'testing1@email.com', 'ADLINA BINTI ADLI', 603214235, 'Sabah', '2025-01-31', 2, 'c0e35e32226cf55f4d17a5f2e411ffa1413f3bb133981f890552c5267fe3b6776aa6eb8940a59bafc1a4a583fbcaa9007933', 1),
('S1234', '$2y$10$C1tDhEcqTdKJa0KrjAXmkuKPZ4QsaobJ6oR/C56II36PpebBQQtNi', 'firzanabadrus@gmail.com', 'NUR FIRZANA BINTI BADRUS HISHAM', 2147483647, 'Selangor', '2025-01-31', 2, '9947b1b835d92245828ea18bd427f58b3c438ddb07e28224a81f878dfa329ed11f0e0e3d1e71ea6496edee6fbcc1d751428c', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_utype`
--

CREATE TABLE `tb_utype` (
  `t_id` int(11) NOT NULL,
  `t_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_utype`
--

INSERT INTO `tb_utype` (`t_id`, `t_desc`) VALUES
(1, 'Lecturer'),
(2, 'Student'),
(3, 'IT Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_course`
--
ALTER TABLE `tb_course`
  ADD PRIMARY KEY (`c_code`),
  ADD KEY `c_lect` (`c_lect`);

--
-- Indexes for table `tb_notification`
--
ALTER TABLE `tb_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tb_registration`
--
ALTER TABLE `tb_registration`
  ADD PRIMARY KEY (`r_tID`),
  ADD KEY `r_student` (`r_student`),
  ADD KEY `r_course` (`r_course`),
  ADD KEY `r_status` (`r_status`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`u_sNo`),
  ADD KEY `u_uType` (`u_uType`);

--
-- Indexes for table `tb_utype`
--
ALTER TABLE `tb_utype`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_notification`
--
ALTER TABLE `tb_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_registration`
--
ALTER TABLE `tb_registration`
  MODIFY `r_tID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'This is the transaction ID', AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_course`
--
ALTER TABLE `tb_course`
  ADD CONSTRAINT `tb_course_ibfk_1` FOREIGN KEY (`c_lect`) REFERENCES `tb_user` (`u_sNo`);

--
-- Constraints for table `tb_notification`
--
ALTER TABLE `tb_notification`
  ADD CONSTRAINT `tb_notification_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tb_user` (`u_sNo`);

--
-- Constraints for table `tb_registration`
--
ALTER TABLE `tb_registration`
  ADD CONSTRAINT `tb_registration_ibfk_1` FOREIGN KEY (`r_student`) REFERENCES `tb_user` (`u_sNo`),
  ADD CONSTRAINT `tb_registration_ibfk_2` FOREIGN KEY (`r_course`) REFERENCES `tb_course` (`c_code`),
  ADD CONSTRAINT `tb_registration_ibfk_3` FOREIGN KEY (`r_status`) REFERENCES `tb_status` (`s_id`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`u_uType`) REFERENCES `tb_utype` (`t_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
