-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 07:36 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `occ_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `case`
--

CREATE TABLE `case` (
  `id` int(11) NOT NULL,
  `name` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `case`
--

INSERT INTO `case` (`id`, `name`) VALUES
(1, '1.1 TOP_10_VIP_SHORTCODE'),
(2, '1.3 Telco Dashboard'),
(3, '1.7 Digipos Bulk Payment');

-- --------------------------------------------------------

--
-- Table structure for table `history_job`
--

CREATE TABLE `history_job` (
  `id` int(11) NOT NULL,
  `log_id` varchar(127) NOT NULL,
  `job_id` int(11) NOT NULL,
  `value_1` int(11) NOT NULL,
  `value_2` int(11) NOT NULL,
  `value_3` int(11) NOT NULL,
  `value_4` int(11) NOT NULL,
  `value_5` int(11) NOT NULL,
  `value_6` int(11) NOT NULL,
  `value_7` int(11) NOT NULL,
  `value_8` int(11) NOT NULL,
  `submited_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL,
  `sub_case_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `task_id`, `case_id`, `sub_case_id`, `date`) VALUES
(9, 1, 1, 1, '2021-05-15 23:41:35'),
(10, 1, 1, 2, '2021-05-15 23:41:35'),
(11, 1, 2, 1, '2021-05-16 00:05:34'),
(12, 1, 2, 2, '2021-05-16 00:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `sub_case`
--

CREATE TABLE `sub_case` (
  `id` int(11) NOT NULL,
  `name` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_case`
--

INSERT INTO `sub_case` (`id`, `name`) VALUES
(1, '- Succes Rate >= 90% is Normal\r\n- Succes Rate <= 90% Need Report and Checking'),
(2, '- Completed (Success) > 0 is Normal\r\n- Completed ( Success ) = 0 Need Report and Checking');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id_task` int(11) NOT NULL,
  `task_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id_task`, `task_name`) VALUES
(1, 'Thor'),
(2, 'Thanos'),
(3, 'Spiderman');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `level` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `level`, `name`, `email`, `gender`, `password`, `is_active`, `date`) VALUES
(6, 1, 'admin satu', 'admin1@gmail.com', 'Male', '$2y$10$rlwM2qpEt./t7pzENuc8TulNuVxFH6nlTwq/UUxm8Sk0zMmRy48q.', 1, '2021-04-22 18:22:27'),
(7, 2, 'member satu', 'member1@gmail.com', 'Female', '$2y$10$Dog/xKP4txU5ktbli7qxCetiJ4na0i7Q/a5WVs6AKzGpbRG4PWlDm', 1, '2021-05-03 06:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `level_user` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `level_user`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 3),
(4, 2, 3),
(5, 1, 2),
(6, 1, 4),
(7, 1, 8),
(8, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `log_id` varchar(127) NOT NULL,
  `id_user` int(11) NOT NULL,
  `task_id` int(3) NOT NULL,
  `shift` int(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `log_id`, `id_user`, `task_id`, `shift`, `date`) VALUES
(25, '1620175797', 7, 3, 3, '2021-05-05 00:49:57'),
(26, '1620176185', 7, 1, 1, '2021-05-05 00:56:25'),
(27, '1620189860', 7, 3, 3, '2021-05-05 04:44:20'),
(28, '1620713244', 7, 1, 1, '2021-05-11 06:07:24'),
(29, '1620718247', 7, 2, 1, '2021-05-11 07:30:47'),
(30, '1620720132', 7, 2, 2, '2021-05-11 08:02:12'),
(31, '1620723152', 7, 3, 3, '2021-05-11 08:52:32'),
(32, '1620739948', 7, 1, 1, '2021-05-11 13:32:28'),
(33, '1620741891', 7, 3, 2, '2021-05-11 14:04:51'),
(34, '1620791030', 7, 2, 2, '2021-05-12 03:43:50'),
(35, '1620835156', 7, 1, 1, '2021-05-12 15:59:16'),
(36, '1621091457', 7, 1, 1, '2021-05-15 15:10:57'),
(37, '1621093459', 7, 1, 2, '2021-05-15 15:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(2) NOT NULL,
  `menu` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(127) NOT NULL,
  `url` varchar(127) NOT NULL,
  `icon` varchar(127) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'nav-icon fas fa-tachometer-alt', 1),
(2, 2, 'Check List Monitoring', 'user/monitoring', 'nav-icon fas fa-th', 1),
(3, 2, 'Dashboard', 'user', 'nav-icon fas fa-tachometer-alt', 1),
(4, 1, 'Menu Management', 'admin/menu', 'nav-icon fas fa-bars', 1),
(7, 1, 'Task Management', 'admin/task', 'nav-icon fas fa-tasks', 1),
(8, 1, 'Case', 'admin/cases', 'nav-icon fas fa-file', 1),
(9, 1, 'Sub Case', 'admin/sub_cases', 'nav-icon fas fa-file', 1),
(11, 1, 'Job', 'admin/job', 'nav-icon fas fa-file', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case`
--
ALTER TABLE `case`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_job`
--
ALTER TABLE `history_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `log_id` (`log_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `case_id` (`case_id`),
  ADD KEY `sub_case_id` (`sub_case_id`);

--
-- Indexes for table `sub_case`
--
ALTER TABLE `sub_case`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `log_id` (`log_id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case`
--
ALTER TABLE `case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `history_job`
--
ALTER TABLE `history_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_case`
--
ALTER TABLE `sub_case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_job`
--
ALTER TABLE `history_job`
  ADD CONSTRAINT `history_job_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`),
  ADD CONSTRAINT `history_job_ibfk_2` FOREIGN KEY (`log_id`) REFERENCES `user_log` (`log_id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`id_task`),
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`case_id`) REFERENCES `case` (`id`),
  ADD CONSTRAINT `job_ibfk_3` FOREIGN KEY (`sub_case_id`) REFERENCES `sub_case` (`id`);

--
-- Constraints for table `user_log`
--
ALTER TABLE `user_log`
  ADD CONSTRAINT `user_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_log_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `task` (`id_task`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
