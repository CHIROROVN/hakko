-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 07:11 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hakko`
--
CREATE DATABASE IF NOT EXISTS `hakko` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `hakko`;

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user` (
  `u_id` int(11) NOT NULL,
  `u_name` text COLLATE utf8_unicode_ci,
  `u_login` text COLLATE utf8_unicode_ci,
  `u_passwd` text COLLATE utf8_unicode_ci,
  `remember_token` text COLLATE utf8_unicode_ci,
  `u_power01` int(2) DEFAULT NULL,
  `u_power02` int(2) DEFAULT NULL,
  `u_power03` int(2) DEFAULT NULL,
  `u_power04` int(2) DEFAULT NULL,
  `u_power05` int(2) DEFAULT NULL,
  `u_power06` int(2) DEFAULT NULL,
  `u_power07` int(2) DEFAULT NULL,
  `u_power08` int(2) DEFAULT NULL,
  `u_power09` int(2) DEFAULT NULL,
  `u_power10` int(2) DEFAULT NULL,
  `u_power11` int(2) DEFAULT NULL,
  `u_power12` int(2) DEFAULT NULL,
  `u_flag` int(2) DEFAULT NULL COMMENT 'null: can login, 1: can''t login',
  `u_free1` text COLLATE utf8_unicode_ci,
  `u_free2` text COLLATE utf8_unicode_ci,
  `u_free3` text COLLATE utf8_unicode_ci,
  `u_free4` text COLLATE utf8_unicode_ci,
  `u_free5` text COLLATE utf8_unicode_ci,
  `last_date` datetime DEFAULT NULL,
  `last_kind` int(2) DEFAULT NULL COMMENT '0:Insert, 1:Update, 9:Delete',
  `last_ipadrs` text COLLATE utf8_unicode_ci,
  `last_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table m_user';

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`u_id`, `u_name`, `u_login`, `u_passwd`, `remember_token`, `u_power01`, `u_power02`, `u_power03`, `u_power04`, `u_power05`, `u_power06`, `u_power07`, `u_power08`, `u_power09`, `u_power10`, `u_power11`, `u_power12`, `u_flag`, `u_free1`, `u_free2`, `u_free3`, `u_free4`, `u_free5`, `last_date`, `last_kind`, `last_ipadrs`, `last_user`) VALUES
(1, 'Hakko', 'hakko', '$2y$10$7wf3gf0E97PwQ.j5YlUFX.feUsPg0HwyBP7Ej4tAzoQqa96H0Mo2e', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-22 00:00:00', 0, '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_info`
--

DROP TABLE IF EXISTS `t_info`;
CREATE TABLE `t_info` (
  `info_id` int(11) NOT NULL,
  `info_title` text COLLATE utf8_unicode_ci,
  `info_date` date DEFAULT NULL,
  `info_list_img` text COLLATE utf8_unicode_ci,
  `info_list_txt` text COLLATE utf8_unicode_ci,
  `info_cat` int(2) DEFAULT NULL,
  `info_type` int(2) DEFAULT NULL,
  `info1_url` text COLLATE utf8_unicode_ci,
  `info2_file` text COLLATE utf8_unicode_ci,
  `info3_contents` longtext COLLATE utf8_unicode_ci,
  `info3_img` text COLLATE utf8_unicode_ci,
  `info3_file` text COLLATE utf8_unicode_ci,
  `info3_filename` text COLLATE utf8_unicode_ci,
  `info_dspl_flag` int(2) DEFAULT NULL COMMENT 'NULL:Show, 1:Not Show',
  `info_top_flag` int(2) DEFAULT NULL COMMENT 'NULL:Normal, 1:Show Top Page',
  `info_start` datetime DEFAULT NULL,
  `info_end` datetime DEFAULT NULL,
  `info_free1` text COLLATE utf8_unicode_ci,
  `info_free2` text COLLATE utf8_unicode_ci,
  `info_free3` text COLLATE utf8_unicode_ci,
  `info_free4` text COLLATE utf8_unicode_ci,
  `info_free5` text COLLATE utf8_unicode_ci,
  `last_date` datetime DEFAULT NULL,
  `last_kind` int(2) DEFAULT NULL COMMENT '0:Insert, 1:Update, 9:Delete',
  `last_ipadrs` text COLLATE utf8_unicode_ci,
  `last_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table t_info';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `t_info`
--
ALTER TABLE `t_info`
  ADD PRIMARY KEY (`info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_info`
--
ALTER TABLE `t_info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
