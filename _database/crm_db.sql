-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2015 at 11:57 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
`announcement_id` bigint(20) NOT NULL,
  `announcement_title` varchar(255) NOT NULL,
  `announcement_content` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `announcement_title`, `announcement_content`, `user_id`, `created_on`) VALUES
(4, 'Angular: Empty Fiddle', 'this is a test ', 8, '2015-01-18 14:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `antivirus_brand`
--

CREATE TABLE IF NOT EXISTS `antivirus_brand` (
`antivirus_brand_id` int(2) NOT NULL,
  `antivirus_brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `antivirus_brand`
--

INSERT INTO `antivirus_brand` (`antivirus_brand_id`, `antivirus_brand_name`) VALUES
(1, 'Mcafee'),
(2, 'Norton'),
(3, 'Kaspersky'),
(4, 'AVG'),
(5, 'Webroot'),
(6, 'Avast'),
(7, 'Microsoft Security');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
`client_id` bigint(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `toll_free_id` int(2) NOT NULL,
  `computer_brand_id` int(2) NOT NULL,
  `computer_count_home` int(3) NOT NULL,
  `computer_count_subscribed` int(3) NOT NULL,
  `operating_system_id` int(2) NOT NULL,
  `antivirus_brand_id` int(2) NOT NULL,
  `antivirus_exp_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=267 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `first_name`, `last_name`, `email`, `phone`, `toll_free_id`, `computer_brand_id`, `computer_count_home`, `computer_count_subscribed`, `operating_system_id`, `antivirus_brand_id`, `antivirus_exp_date`) VALUES
(265, 'midhun', 'P', 'midhun@gmail.com1', '123456789', 1, 1, 1, 1, 1, 1, '2014-02-01 18:30:00'),
(266, 'midhun', 'P', 'midhun.p2002@yahoo.com', '123456789', 2, 1, 3, 1, 3, 2, '2015-01-17 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `computer_brand`
--

CREATE TABLE IF NOT EXISTS `computer_brand` (
`computer_brand_id` int(2) NOT NULL,
  `computer_brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `computer_brand`
--

INSERT INTO `computer_brand` (`computer_brand_id`, `computer_brand_name`) VALUES
(1, 'Dell'),
(2, 'HP'),
(3, 'Gateway'),
(4, 'Lenovo'),
(5, 'Toshiba'),
(6, 'Sony');

-- --------------------------------------------------------

--
-- Table structure for table `disposition`
--

CREATE TABLE IF NOT EXISTS `disposition` (
`disposition_id` int(2) NOT NULL,
  `disposition_name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `disposition`
--

INSERT INTO `disposition` (`disposition_id`, `disposition_name`) VALUES
(2, 'Not intrested'),
(1, 'Sale');

-- --------------------------------------------------------

--
-- Table structure for table `issue_type`
--

CREATE TABLE IF NOT EXISTS `issue_type` (
`issue_type_id` int(2) NOT NULL,
  `issue_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `issue_type`
--

INSERT INTO `issue_type` (`issue_type_id`, `issue_type_name`) VALUES
(1, 'Virus'),
(2, 'Antivirus'),
(3, 'Email'),
(4, 'Other'),
(5, 'Printer');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
`job_id` bigint(20) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `technician_id` bigint(20) NOT NULL,
  `issue_type_id` int(2) NOT NULL,
  `other_issue` varchar(256) NOT NULL,
  `disposition_id` int(2) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `job_status_id` int(2) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1690 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `client_id`, `user_id`, `technician_id`, `issue_type_id`, `other_issue`, `disposition_id`, `comment`, `job_status_id`, `created_date`) VALUES
(1688, 265, 8, 8, 1, 'other issye', 1, 'test', 4, '2015-01-18 16:28:36'),
(1689, 266, 8, 0, 3, '', 2, '', 4, '2015-01-18 16:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `job_comment`
--

CREATE TABLE IF NOT EXISTS `job_comment` (
`job_comment_id` bigint(20) NOT NULL,
  `job_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `job_comment` text NOT NULL,
  `posted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_status`
--

CREATE TABLE IF NOT EXISTS `job_status` (
`job_status_id` bigint(2) NOT NULL,
  `job_status_name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `job_status`
--

INSERT INTO `job_status` (`job_status_id`, `job_status_name`) VALUES
(1, 'Open'),
(2, 'Reopen'),
(3, 'Compleated'),
(4, 'Close');

-- --------------------------------------------------------

--
-- Table structure for table `operating_system`
--

CREATE TABLE IF NOT EXISTS `operating_system` (
`operating_system_id` int(2) NOT NULL,
  `operating_system_name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `operating_system`
--

INSERT INTO `operating_system` (`operating_system_id`, `operating_system_name`) VALUES
(6, 'MAC'),
(3, 'Windows 7'),
(4, 'Windows 8'),
(5, 'Windows 8.1'),
(2, 'Windows Vista'),
(1, 'Windows XP');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
`plan_id` bigint(20) NOT NULL,
  `plans_id` int(4) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `plan_start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `plan_end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`plan_id`, `plans_id`, `client_id`, `user_id`, `plan_start_date`, `plan_end_date`) VALUES
(28, 2, 265, 8, '2014-03-01 18:30:00', '2014-03-31 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE IF NOT EXISTS `plans` (
`plans_id` int(2) NOT NULL,
  `plans_name` varchar(255) NOT NULL,
  `plans_days` int(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`plans_id`, `plans_name`, `plans_days`) VALUES
(1, 'One time support', 1),
(2, 'One month support', 30);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`role_id` int(2) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `toll_free`
--

CREATE TABLE IF NOT EXISTS `toll_free` (
`toll_free_id` int(2) NOT NULL,
  `toll_free_name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `toll_free`
--

INSERT INTO `toll_free` (`toll_free_id`, `toll_free_name`) VALUES
(2, '1800-9862-136'),
(1, '1800-9878-206'),
(3, '1888-8295-815');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` bigint(20) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role_id` int(2) NOT NULL,
  `status_id` int(1) DEFAULT '1',
  `active` int(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `phone`, `password`, `role_id`, `status_id`, `active`) VALUES
(8, 'Midhun', 'P', 'admin@gmail.com', '78890856789', '', 1, 1, 1),
(13, 'Athul', 'P', 'user@gmail.com', '9717466580', 'password', 2, 1, 1),
(14, 'Avinash', 'Singh', 'avinash@gmail.com', '123456789', 'password@1', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE IF NOT EXISTS `user_status` (
`user_status_id` int(2) NOT NULL,
  `user_status_name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`user_status_id`, `user_status_name`) VALUES
(4, 'Busy'),
(3, 'Idle'),
(2, 'Offline'),
(1, 'Online');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
 ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `antivirus_brand`
--
ALTER TABLE `antivirus_brand`
 ADD PRIMARY KEY (`antivirus_brand_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`client_id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `computer_brand`
--
ALTER TABLE `computer_brand`
 ADD PRIMARY KEY (`computer_brand_id`);

--
-- Indexes for table `disposition`
--
ALTER TABLE `disposition`
 ADD PRIMARY KEY (`disposition_id`), ADD UNIQUE KEY `disposition_name` (`disposition_name`);

--
-- Indexes for table `issue_type`
--
ALTER TABLE `issue_type`
 ADD PRIMARY KEY (`issue_type_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
 ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_comment`
--
ALTER TABLE `job_comment`
 ADD PRIMARY KEY (`job_comment_id`);

--
-- Indexes for table `job_status`
--
ALTER TABLE `job_status`
 ADD PRIMARY KEY (`job_status_id`);

--
-- Indexes for table `operating_system`
--
ALTER TABLE `operating_system`
 ADD PRIMARY KEY (`operating_system_id`), ADD UNIQUE KEY `operating_system_name` (`operating_system_name`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
 ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
 ADD PRIMARY KEY (`plans_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`role_id`), ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `toll_free`
--
ALTER TABLE `toll_free`
 ADD PRIMARY KEY (`toll_free_id`), ADD UNIQUE KEY `toll_free_name` (`toll_free_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
 ADD PRIMARY KEY (`user_status_id`), ADD UNIQUE KEY `user_status_name` (`user_status_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
MODIFY `announcement_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `antivirus_brand`
--
ALTER TABLE `antivirus_brand`
MODIFY `antivirus_brand_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
MODIFY `client_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=267;
--
-- AUTO_INCREMENT for table `computer_brand`
--
ALTER TABLE `computer_brand`
MODIFY `computer_brand_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `disposition`
--
ALTER TABLE `disposition`
MODIFY `disposition_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `issue_type`
--
ALTER TABLE `issue_type`
MODIFY `issue_type_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
MODIFY `job_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1690;
--
-- AUTO_INCREMENT for table `job_comment`
--
ALTER TABLE `job_comment`
MODIFY `job_comment_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job_status`
--
ALTER TABLE `job_status`
MODIFY `job_status_id` bigint(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `operating_system`
--
ALTER TABLE `operating_system`
MODIFY `operating_system_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
MODIFY `plan_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
MODIFY `plans_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `role_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `toll_free`
--
ALTER TABLE `toll_free`
MODIFY `toll_free_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
MODIFY `user_status_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
