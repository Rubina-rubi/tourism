-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2018 at 06:45 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_digime`
--

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

DROP TABLE IF EXISTS `system_users`;
CREATE TABLE IF NOT EXISTS `system_users` (
  `su_id` int(11) NOT NULL AUTO_INCREMENT,
  `sut_id` int(11) NOT NULL,
  `su_first_name` varchar(100) NOT NULL,
  `su_last_name` varchar(100) NOT NULL,
  `su_mobile` varchar(100) NOT NULL,
  `su_email` varchar(100) NOT NULL,
  `su_password` varchar(255) NOT NULL,
  `su_status` tinyint(1) NOT NULL DEFAULT '1',
  `su_inserted` varchar(30) NOT NULL,
  PRIMARY KEY (`su_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `system_users`
--

TRUNCATE TABLE `system_users`;
--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`su_id`, `sut_id`, `su_first_name`, `su_last_name`, `su_mobile`, `su_email`, `su_password`, `su_status`, `su_inserted`) VALUES
(1, 1, 'Rahat Ahmed', 'Shawon', '01717509261', 'shawon.mu@gmail.com', '$1$/A/DHkhe$ndFfxZNnEBDuCMWSU57mD1', 1, ''),
(2, 2, 'Rahat CA', 'Shawon', '01717509261', 'shawon@digitainteractive.com', '$1$/A/DHkhe$ndFfxZNnEBDuCMWSU57mD1', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `system_users_type`
--

DROP TABLE IF EXISTS `system_users_type`;
CREATE TABLE IF NOT EXISTS `system_users_type` (
  `sut_id` int(11) NOT NULL AUTO_INCREMENT,
  `sut_type` varchar(100) NOT NULL,
  `sut_type_key` varchar(255) NOT NULL,
  `sut_description` varchar(255) NOT NULL,
  PRIMARY KEY (`sut_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `system_users_type`
--

TRUNCATE TABLE `system_users_type`;
--
-- Dumping data for table `system_users_type`
--

INSERT INTO `system_users_type` (`sut_id`, `sut_type`, `sut_type_key`, `sut_description`) VALUES
(1, 'Super Admin', 'super-admin', 'Who have an access to do anything in the CMS'),
(2, 'Customer Admin', 'customer-admin', 'Manage Own Business');

-- --------------------------------------------------------

--
-- Table structure for table `system_user_login_info`
--

DROP TABLE IF EXISTS `system_user_login_info`;
CREATE TABLE IF NOT EXISTS `system_user_login_info` (
  `suli_id` int(11) NOT NULL AUTO_INCREMENT,
  `su_id` int(11) NOT NULL,
  `suli_ip_address` varchar(255) NOT NULL,
  `suli_login_time` varchar(50) NOT NULL,
  `suli_logout_time` varchar(50) NOT NULL,
  PRIMARY KEY (`suli_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `system_user_login_info`
--

TRUNCATE TABLE `system_user_login_info`;
--
-- Dumping data for table `system_user_login_info`
--

INSERT INTO `system_user_login_info` (`suli_id`, `su_id`, `suli_ip_address`, `suli_login_time`, `suli_logout_time`) VALUES
(1, 1, '::1', '1533444627', '1533475268'),
(2, 1, '::1', '1533475380', '1533475384'),
(3, 2, '::1', '1533475397', '1533475599'),
(4, 1, '::1', '1533475602', '1533475640'),
(5, 2, '::1', '1533475657', '1533475979'),
(6, 1, '::1', '1533475982', '1533527691'),
(7, 2, '::1', '1533527709', ''),
(8, 2, '::1', '1533786746', ''),
(9, 2, '::1', '1534134692', ''),
(10, 2, '::1', '1534425721', ''),
(11, 2, '::1', '1534653247', ''),
(12, 2, '::1', '1535258626', '1535259482'),
(13, 1, '::1', '1535259486', '1535284986'),
(14, 2, '::1', '1535284992', ''),
(15, 1, '::1', '1535285810', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_business_information`
--

DROP TABLE IF EXISTS `tbl_business_information`;
CREATE TABLE IF NOT EXISTS `tbl_business_information` (
  `bi_id` int(11) NOT NULL AUTO_INCREMENT,
  `bi_name` varchar(255) NOT NULL,
  `su_id` int(11) NOT NULL,
  `bi_allow_masking` tinyint(1) NOT NULL DEFAULT '1',
  `bi_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_business_information`
--

TRUNCATE TABLE `tbl_business_information`;
--
-- Dumping data for table `tbl_business_information`
--

INSERT INTO `tbl_business_information` (`bi_id`, `bi_name`, `su_id`, `bi_allow_masking`, `bi_inserted`) VALUES
(1, 'Digita Interactive', 2, 1, '2018-08-05 13:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_business_masking`
--

DROP TABLE IF EXISTS `tbl_business_masking`;
CREATE TABLE IF NOT EXISTS `tbl_business_masking` (
  `bm_id` int(11) NOT NULL AUTO_INCREMENT,
  `bi_id` int(11) NOT NULL,
  `mi_id` int(11) NOT NULL,
  `bm_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_business_masking`
--

TRUNCATE TABLE `tbl_business_masking`;
--
-- Dumping data for table `tbl_business_masking`
--

INSERT INTO `tbl_business_masking` (`bm_id`, `bi_id`, `mi_id`, `bm_inserted`) VALUES
(1, 1, 1, '2018-08-26 10:55:34'),
(2, 1, 2, '2018-08-26 10:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_information`
--

DROP TABLE IF EXISTS `tbl_contact_information`;
CREATE TABLE IF NOT EXISTS `tbl_contact_information` (
  `ci_id` int(11) NOT NULL AUTO_INCREMENT,
  `bi_id` int(11) NOT NULL,
  `ci_name` varchar(255) NOT NULL,
  `mo_id` int(11) NOT NULL,
  `ci_contact_number` int(8) NOT NULL COMMENT 'Eight Digit Mobile Number Only',
  `ci_email` varchar(255) NOT NULL,
  `ci_status` tinyint(1) NOT NULL DEFAULT '1',
  `ci_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ci_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_contact_information`
--

TRUNCATE TABLE `tbl_contact_information`;
--
-- Dumping data for table `tbl_contact_information`
--

INSERT INTO `tbl_contact_information` (`ci_id`, `bi_id`, `ci_name`, `mo_id`, `ci_contact_number`, `ci_email`, `ci_status`, `ci_inserted`) VALUES
(1, 1, 'Shawon', 1, 17509261, 'shawon@digitainteractive.com', 1, '2018-08-19 08:02:16'),
(2, 1, 'Shawon', 1, 1717509261, 'shawon@digitainteractive.com', 1, '2018-08-19 08:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_contact`
--

DROP TABLE IF EXISTS `tbl_group_contact`;
CREATE TABLE IF NOT EXISTS `tbl_group_contact` (
  `gc_id` int(11) NOT NULL AUTO_INCREMENT,
  `ci_id` int(11) NOT NULL,
  `gi_id` int(11) NOT NULL,
  PRIMARY KEY (`gc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_group_contact`
--

TRUNCATE TABLE `tbl_group_contact`;
--
-- Dumping data for table `tbl_group_contact`
--

INSERT INTO `tbl_group_contact` (`gc_id`, `ci_id`, `gi_id`) VALUES
(1, 2, 1),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_information`
--

DROP TABLE IF EXISTS `tbl_group_information`;
CREATE TABLE IF NOT EXISTS `tbl_group_information` (
  `gi_id` int(11) NOT NULL AUTO_INCREMENT,
  `bi_id` int(11) NOT NULL,
  `gi_name` varchar(255) NOT NULL,
  `gi_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`gi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_group_information`
--

TRUNCATE TABLE `tbl_group_information`;
--
-- Dumping data for table `tbl_group_information`
--

INSERT INTO `tbl_group_information` (`gi_id`, `bi_id`, `gi_name`, `gi_status`) VALUES
(1, 1, 'Hotel & Resorts', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_masking_information`
--

DROP TABLE IF EXISTS `tbl_masking_information`;
CREATE TABLE IF NOT EXISTS `tbl_masking_information` (
  `mi_id` int(11) NOT NULL AUTO_INCREMENT,
  `mi_name` varchar(255) NOT NULL,
  `mi_mask` varchar(255) NOT NULL,
  `mi_status` tinyint(1) NOT NULL DEFAULT '1',
  `mi_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_masking_information`
--

TRUNCATE TABLE `tbl_masking_information`;
--
-- Dumping data for table `tbl_masking_information`
--

INSERT INTO `tbl_masking_information` (`mi_id`, `mi_name`, `mi_mask`, `mi_status`, `mi_inserted`) VALUES
(1, 'Digita Interactiv', 'Digita', 1, '2018-08-26 07:18:46'),
(2, 'Sylhet Deals', 'SylhetDeals', 1, '2018-08-26 07:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobile_operator`
--

DROP TABLE IF EXISTS `tbl_mobile_operator`;
CREATE TABLE IF NOT EXISTS `tbl_mobile_operator` (
  `mo_id` int(11) NOT NULL AUTO_INCREMENT,
  `mo_name` varchar(100) NOT NULL,
  `mo_key` varchar(100) NOT NULL,
  `mo_code` varchar(3) NOT NULL COMMENT 'Three Digit Mobile Operator Code',
  PRIMARY KEY (`mo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_mobile_operator`
--

TRUNCATE TABLE `tbl_mobile_operator`;
--
-- Dumping data for table `tbl_mobile_operator`
--

INSERT INTO `tbl_mobile_operator` (`mo_id`, `mo_name`, `mo_key`, `mo_code`) VALUES
(1, 'Grameenphone', 'gp', '017'),
(2, 'Banglalink', 'banglalink', '019'),
(3, 'Robi Axiata', 'robi', '018'),
(4, 'Airtel', 'airtel', '016'),
(5, 'Teletalk Bangladesh Ltd', 'teletalk', '015');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms_sending_info`
--

DROP TABLE IF EXISTS `tbl_sms_sending_info`;
CREATE TABLE IF NOT EXISTS `tbl_sms_sending_info` (
  `ssi_id` int(11) NOT NULL AUTO_INCREMENT,
  `bi_id` int(11) DEFAULT NULL,
  `ci_id` int(11) DEFAULT NULL,
  `mi_id` int(11) DEFAULT NULL,
  `ssi_sms` text,
  `ssi_response_value` varchar(255) DEFAULT NULL,
  `ssi_status` tinyint(1) DEFAULT NULL,
  `ssi_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ssi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_sms_sending_info`
--

TRUNCATE TABLE `tbl_sms_sending_info`;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
