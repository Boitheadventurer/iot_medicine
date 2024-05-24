-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 06:36 AM
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
-- Database: `medic`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_bb`
--

CREATE TABLE `tb_data_bb` (
  `bb_id` int(100) NOT NULL,
  `setting_bb` varchar(100) NOT NULL,
  `time_bb` time NOT NULL,
  `medicine_id` int(100) DEFAULT NULL,
  `medicine_id2` int(100) DEFAULT NULL,
  `medicine_id3` int(100) DEFAULT NULL,
  `medicine_id4` int(100) DEFAULT NULL,
  `device_id` int(100) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_data_bb`
--

INSERT INTO `tb_data_bb` (`bb_id`, `setting_bb`, `time_bb`, `medicine_id`, `medicine_id2`, `medicine_id3`, `medicine_id4`, `device_id`, `id`) VALUES
(1, 'yes', '16:27:00', 1, NULL, NULL, NULL, 1, 1),
(2, 'yes', '16:25:00', 3, NULL, NULL, NULL, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_bf`
--

CREATE TABLE `tb_data_bf` (
  `bf_id` int(100) NOT NULL,
  `setting_bf` varchar(100) NOT NULL,
  `time_bf` time DEFAULT NULL,
  `medicine_id` int(100) DEFAULT NULL,
  `medicine_id2` int(100) DEFAULT NULL,
  `medicine_id3` int(100) DEFAULT NULL,
  `medicine_id4` int(100) DEFAULT NULL,
  `device_id` int(100) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_data_bf`
--

INSERT INTO `tb_data_bf` (`bf_id`, `setting_bf`, `time_bf`, `medicine_id`, `medicine_id2`, `medicine_id3`, `medicine_id4`, `device_id`, `id`) VALUES
(1, 'yes', '09:00:00', 1, 2, NULL, NULL, 1, 1),
(2, 'yes', '08:00:00', 3, NULL, NULL, NULL, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_dn`
--

CREATE TABLE `tb_data_dn` (
  `dn_id` int(100) NOT NULL,
  `setting_dn` varchar(100) NOT NULL,
  `time_dn` time NOT NULL,
  `medicine_id` int(100) DEFAULT NULL,
  `medicine_id2` int(100) DEFAULT NULL,
  `medicine_id3` int(100) DEFAULT NULL,
  `medicine_id4` int(100) DEFAULT NULL,
  `device_id` int(100) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_data_dn`
--

INSERT INTO `tb_data_dn` (`dn_id`, `setting_dn`, `time_dn`, `medicine_id`, `medicine_id2`, `medicine_id3`, `medicine_id4`, `device_id`, `id`) VALUES
(1, 'yes', '15:52:00', 1, 2, NULL, NULL, 1, 1),
(2, 'yes', '16:10:00', 3, NULL, NULL, NULL, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_eat_medicine`
--

CREATE TABLE `tb_data_eat_medicine` (
  `data_id` int(100) NOT NULL,
  `bf_id` int(100) DEFAULT NULL,
  `lunch_id` int(100) DEFAULT NULL,
  `dn_id` int(100) DEFAULT NULL,
  `bb_id` int(100) DEFAULT NULL,
  `device_id` int(100) NOT NULL,
  `medicine_id` int(100) DEFAULT NULL,
  `medicine_id2` int(100) DEFAULT NULL,
  `medicine_id3` int(100) DEFAULT NULL,
  `medicine_id4` int(100) DEFAULT NULL,
  `id` int(100) NOT NULL,
  `medicine_get` varchar(100) NOT NULL,
  `time_get` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `count_medicine` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_data_eat_medicine`
--

INSERT INTO `tb_data_eat_medicine` (`data_id`, `bf_id`, `lunch_id`, `dn_id`, `bb_id`, `device_id`, `medicine_id`, `medicine_id2`, `medicine_id3`, `medicine_id4`, `id`, `medicine_get`, `time_get`, `count_medicine`) VALUES
(256, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 1, 'success', '2024-05-23 07:24:13', 1),
(257, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 1, 'success', '2024-05-23 08:10:40', 1),
(258, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 1, 'success', '2024-05-23 08:25:25', 1),
(259, 1, NULL, NULL, NULL, 1, 1, 2, NULL, NULL, 1, 'success', '2024-05-23 08:30:40', 1),
(260, 1, NULL, NULL, NULL, 1, 1, 2, NULL, NULL, 1, 'success', '2024-05-23 08:34:13', 1),
(261, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 1, 'success', '2024-05-23 08:40:20', 1),
(262, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, 1, 'success', '2024-05-23 08:42:18', 1),
(263, NULL, NULL, 1, NULL, 1, 1, 2, NULL, NULL, 1, 'success', '2024-05-23 08:45:23', 1),
(264, NULL, NULL, 1, NULL, 1, 1, 2, NULL, NULL, 1, 'success', '2024-05-23 08:47:01', 1),
(265, NULL, NULL, 1, NULL, 1, 1, 2, NULL, NULL, 1, 'success', '2024-05-23 08:52:16', 1),
(266, NULL, NULL, 1, NULL, 1, 1, 2, NULL, NULL, 1, 'success', '2024-05-23 08:58:29', 1),
(267, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 1, 'success', '2024-05-23 09:02:45', 1),
(268, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 1, 'success', '2024-05-23 09:05:20', 1),
(269, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 1, 'success', '2024-05-23 09:10:12', 1),
(270, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, 1, 'success', '2024-05-23 09:27:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_lunch`
--

CREATE TABLE `tb_data_lunch` (
  `lunch_id` int(100) NOT NULL,
  `setting_lunch` varchar(100) NOT NULL,
  `time_lunch` time NOT NULL,
  `medicine_id` int(100) DEFAULT NULL,
  `medicine_id2` int(100) DEFAULT NULL,
  `medicine_id3` int(100) DEFAULT NULL,
  `medicine_id4` int(100) DEFAULT NULL,
  `device_id` int(100) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_data_lunch`
--

INSERT INTO `tb_data_lunch` (`lunch_id`, `setting_lunch`, `time_lunch`, `medicine_id`, `medicine_id2`, `medicine_id3`, `medicine_id4`, `device_id`, `id`) VALUES
(1, 'yes', '12:10:00', 1, NULL, NULL, NULL, 1, 1),
(2, 'yes', '10:55:00', 3, NULL, NULL, NULL, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_device`
--

CREATE TABLE `tb_device` (
  `device_id` int(100) NOT NULL,
  `device_name` varchar(100) NOT NULL,
  `token_line` varchar(100) NOT NULL,
  `device_detail` varchar(255) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_device`
--

INSERT INTO `tb_device` (`device_id`, `device_name`, `token_line`, `device_detail`, `id`) VALUES
(1, 'device_name', 'QIChSQJdNBnK08VtgMSjRPhikDUQVGP3ikBPexwgQFU', 'device_detail', 1),
(2, 'g7d_device', 'token_line', 'g7d_device_always_g', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_medicine`
--

CREATE TABLE `tb_medicine` (
  `medicine_id` int(100) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `medicine_detail` varchar(100) NOT NULL,
  `id` int(100) NOT NULL,
  `device_id` int(100) NOT NULL,
  `medicine_num` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_medicine`
--

INSERT INTO `tb_medicine` (`medicine_id`, `medicine_name`, `medicine_detail`, `id`, `device_id`, `medicine_num`) VALUES
(1, 'medic_name1', 'medic_detail1', 1, 1, 10),
(2, 'medic_name2', 'medic_detail2', 1, 1, 20),
(3, 'Sata', 'Sata thats plus straght 500', 2, 2, 40);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `urole` varchar(100) NOT NULL COMMENT 'สถานะ',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_detail` varchar(255) NOT NULL COMMENT 'รายระเอียด/โรคส่วนตัว'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `urole`, `created_at`, `user_detail`) VALUES
(1, 'Thanakit', 'Skibidi', 'email@gmail.com', 'bass', 'user', '2024-03-15 08:03:18', 'None'),
(2, 'This_Fname_2', 'This_Lname_2', '555@gmail.com', 'bass0192837465\r\n', 'user', '2024-05-17 03:25:11', 'Allergy the cat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_data_bb`
--
ALTER TABLE `tb_data_bb`
  ADD PRIMARY KEY (`bb_id`),
  ADD KEY `id` (`id`),
  ADD KEY `medicine_id` (`medicine_id`),
  ADD KEY `device_id` (`device_id`),
  ADD KEY `tb_data_bb_ibfk_4` (`medicine_id2`),
  ADD KEY `tb_data_bb_ibfk_5` (`medicine_id3`),
  ADD KEY `tb_data_bb_ibfk_6` (`medicine_id4`);

--
-- Indexes for table `tb_data_bf`
--
ALTER TABLE `tb_data_bf`
  ADD PRIMARY KEY (`bf_id`),
  ADD KEY `id` (`id`),
  ADD KEY `medicine_id` (`medicine_id`),
  ADD KEY `device_id` (`device_id`),
  ADD KEY `tb_data_bf_ibfk_4` (`medicine_id2`),
  ADD KEY `tb_data_bf_ibfk_5` (`medicine_id3`),
  ADD KEY `tb_data_bf_ibfk_6` (`medicine_id4`);

--
-- Indexes for table `tb_data_dn`
--
ALTER TABLE `tb_data_dn`
  ADD PRIMARY KEY (`dn_id`),
  ADD KEY `id` (`id`),
  ADD KEY `medicine_id` (`medicine_id`),
  ADD KEY `device_id` (`device_id`),
  ADD KEY `tb_data_dn_ibfk_4` (`medicine_id2`),
  ADD KEY `tb_data_dn_ibfk_5` (`medicine_id3`),
  ADD KEY `tb_data_dn_ibfk_6` (`medicine_id4`);

--
-- Indexes for table `tb_data_eat_medicine`
--
ALTER TABLE `tb_data_eat_medicine`
  ADD PRIMARY KEY (`data_id`),
  ADD KEY `bf_id` (`bf_id`),
  ADD KEY `dn_id` (`dn_id`),
  ADD KEY `lunch_id` (`lunch_id`),
  ADD KEY `ev_id` (`bb_id`),
  ADD KEY `medicine_id` (`medicine_id`),
  ADD KEY `device_id` (`device_id`),
  ADD KEY `id` (`id`),
  ADD KEY `medicine_id2` (`medicine_id2`),
  ADD KEY `medicine_id3` (`medicine_id3`),
  ADD KEY `medicine_id4` (`medicine_id4`);

--
-- Indexes for table `tb_data_lunch`
--
ALTER TABLE `tb_data_lunch`
  ADD PRIMARY KEY (`lunch_id`),
  ADD KEY `id` (`id`),
  ADD KEY `medicine_id` (`medicine_id`),
  ADD KEY `device_id` (`device_id`),
  ADD KEY `tb_data_lunch_ibfk_4` (`medicine_id2`),
  ADD KEY `tb_data_lunch_ibfk_5` (`medicine_id3`),
  ADD KEY `tb_data_lunch_ibfk_6` (`medicine_id4`);

--
-- Indexes for table `tb_device`
--
ALTER TABLE `tb_device`
  ADD PRIMARY KEY (`device_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tb_medicine`
--
ALTER TABLE `tb_medicine`
  ADD PRIMARY KEY (`medicine_id`),
  ADD KEY `id` (`id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_data_bb`
--
ALTER TABLE `tb_data_bb`
  MODIFY `bb_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_data_bf`
--
ALTER TABLE `tb_data_bf`
  MODIFY `bf_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_data_dn`
--
ALTER TABLE `tb_data_dn`
  MODIFY `dn_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_data_eat_medicine`
--
ALTER TABLE `tb_data_eat_medicine`
  MODIFY `data_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT for table `tb_data_lunch`
--
ALTER TABLE `tb_data_lunch`
  MODIFY `lunch_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_device`
--
ALTER TABLE `tb_device`
  MODIFY `device_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_medicine`
--
ALTER TABLE `tb_medicine`
  MODIFY `medicine_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_data_bb`
--
ALTER TABLE `tb_data_bb`
  ADD CONSTRAINT `tb_data_bb_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tb_data_bb_ibfk_2` FOREIGN KEY (`medicine_id`) REFERENCES `tb_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_data_bb_ibfk_3` FOREIGN KEY (`device_id`) REFERENCES `tb_device` (`device_id`),
  ADD CONSTRAINT `tb_data_bb_ibfk_4` FOREIGN KEY (`medicine_id2`) REFERENCES `tb_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_data_bb_ibfk_5` FOREIGN KEY (`medicine_id3`) REFERENCES `tb_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_data_bb_ibfk_6` FOREIGN KEY (`medicine_id4`) REFERENCES `tb_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_data_bf`
--
ALTER TABLE `tb_data_bf`
  ADD CONSTRAINT `tb_data_bf_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tb_data_bf_ibfk_2` FOREIGN KEY (`medicine_id`) REFERENCES `tb_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_data_bf_ibfk_3` FOREIGN KEY (`device_id`) REFERENCES `tb_device` (`device_id`),
  ADD CONSTRAINT `tb_data_bf_ibfk_4` FOREIGN KEY (`medicine_id2`) REFERENCES `tb_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_data_bf_ibfk_5` FOREIGN KEY (`medicine_id3`) REFERENCES `tb_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_data_bf_ibfk_6` FOREIGN KEY (`medicine_id4`) REFERENCES `tb_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_data_dn`
--
ALTER TABLE `tb_data_dn`
  ADD CONSTRAINT `tb_data_dn_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tb_data_dn_ibfk_2` FOREIGN KEY (`medicine_id`) REFERENCES `tb_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_data_dn_ibfk_3` FOREIGN KEY (`device_id`) REFERENCES `tb_device` (`device_id`),
  ADD CONSTRAINT `tb_data_dn_ibfk_4` FOREIGN KEY (`medicine_id2`) REFERENCES `tb_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_data_dn_ibfk_5` FOREIGN KEY (`medicine_id3`) REFERENCES `tb_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_data_dn_ibfk_6` FOREIGN KEY (`medicine_id4`) REFERENCES `tb_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_data_eat_medicine`
--
ALTER TABLE `tb_data_eat_medicine`
  ADD CONSTRAINT `tb_data_eat_medicine_ibfk_1` FOREIGN KEY (`bf_id`) REFERENCES `tb_data_bf` (`bf_id`),
  ADD CONSTRAINT `tb_data_eat_medicine_ibfk_10` FOREIGN KEY (`medicine_id4`) REFERENCES `tb_medicine` (`medicine_id`),
  ADD CONSTRAINT `tb_data_eat_medicine_ibfk_2` FOREIGN KEY (`dn_id`) REFERENCES `tb_data_dn` (`dn_id`),
  ADD CONSTRAINT `tb_data_eat_medicine_ibfk_3` FOREIGN KEY (`lunch_id`) REFERENCES `tb_data_lunch` (`lunch_id`),
  ADD CONSTRAINT `tb_data_eat_medicine_ibfk_4` FOREIGN KEY (`bb_id`) REFERENCES `tb_data_bb` (`bb_id`),
  ADD CONSTRAINT `tb_data_eat_medicine_ibfk_5` FOREIGN KEY (`medicine_id`) REFERENCES `tb_medicine` (`medicine_id`),
  ADD CONSTRAINT `tb_data_eat_medicine_ibfk_6` FOREIGN KEY (`device_id`) REFERENCES `tb_device` (`device_id`),
  ADD CONSTRAINT `tb_data_eat_medicine_ibfk_7` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tb_data_eat_medicine_ibfk_8` FOREIGN KEY (`medicine_id2`) REFERENCES `tb_medicine` (`medicine_id`),
  ADD CONSTRAINT `tb_data_eat_medicine_ibfk_9` FOREIGN KEY (`medicine_id3`) REFERENCES `tb_medicine` (`medicine_id`);

--
-- Constraints for table `tb_data_lunch`
--
ALTER TABLE `tb_data_lunch`
  ADD CONSTRAINT `tb_data_lunch_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tb_data_lunch_ibfk_2` FOREIGN KEY (`medicine_id`) REFERENCES `tb_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_data_lunch_ibfk_3` FOREIGN KEY (`device_id`) REFERENCES `tb_device` (`device_id`),
  ADD CONSTRAINT `tb_data_lunch_ibfk_4` FOREIGN KEY (`medicine_id2`) REFERENCES `tb_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_data_lunch_ibfk_5` FOREIGN KEY (`medicine_id3`) REFERENCES `tb_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_data_lunch_ibfk_6` FOREIGN KEY (`medicine_id4`) REFERENCES `tb_medicine` (`medicine_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_device`
--
ALTER TABLE `tb_device`
  ADD CONSTRAINT `tb_device_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `tb_medicine`
--
ALTER TABLE `tb_medicine`
  ADD CONSTRAINT `tb_medicine_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tb_medicine_ibfk_2` FOREIGN KEY (`device_id`) REFERENCES `tb_device` (`device_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
