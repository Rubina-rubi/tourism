-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 02:36 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `b_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bkash_id` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `b_date` date NOT NULL,
  `payment_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `c_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `cmnt_time` time(3) NOT NULL,
  `cmnt_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `p_id` int(11) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `place_cost` varchar(100) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `place_details` varchar(1000) NOT NULL,
  `place_img` varchar(500) NOT NULL,
  `r_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`p_id`, `place_name`, `place_cost`, `latitude`, `longitude`, `place_details`, `place_img`, `r_count`) VALUES
(2, 'BisanaKandi', '5000tk', 25.1695, 91.8867, 'it is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '11.JPG', 0),
(4, 'Jafolong', '2000tk', 25.1634, 92.0175, 'it is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).it is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as thei', '04.JPG', 0),
(5, 'Lawachara National Park', '2000', 0.686183, 15.9053, 'gggggggggggggg', 'CREL_RKWS_Tanvir_03-11.jpg', 0),
(6, 'Srimangol', '2000', 24.3083, 91.7333, 'Sylhet may be the primary city in the eponymous division, but sylvan Srimangal is the undoubted star of this region. Blessed with rolling hills carpeted with endless tea plantations, dense forest sanctuaries and a sprinkling of tribal villages, this place is bound to rank among your most treasured experiences in Bangladesh. The town itself is small, friendly and easy to manage, but it’s the surrounding countryside that’s the real draw, with hiking, wildlife-watching and, of course, tea-drinking all high on the agenda.', 'maxresdefault.jpg', 0),
(7, 'Ratargul Swampforest', '3000', 25.0075, 919270, 'Ratargul Swamp Forest is a freshwater swamp forest located in Gowain River, Fatehpur Union, Gowainghat, Sylhet, Bangladesh. It is the only swamp forest located in Bangladesh and one of the few freshwater swamp forest in the world. The forest is naturally conserved under the Department of Forestry, Govt. of Bangladesh. ', '300px-Ratargul_Swamp_Forest,_Sylhet_.jpg', 0),
(8, 'Pangthumai Waterfall', '3000', 25.178, 91.9556, 'Panthumai, also written as Pang Thu Mai, is another tourist hub in Sylhet which is situated in Gowainghat district. Tourists visiting this village can see the Panthumai waterfall, which is actually situated on the Indian border. Through Panthumai a wonderful scene can be observed of the waterfall as it rushes down in a scintillating force.', '668927461.jpg', 0),
(9, 'Tanguar Haor', '5000', 25.0704, 91.3228, 'Tanguar haor  located in the Dharmapasha and Tahirpur upazilas of Sunamganj District in Bangladesh, is a unique wetland ecosystem of national importance and has come into international focus. The area of Tanguar haor including 46 villages within the haor is about 100km2 of which 2,802.36 ha2 is wetland. It is the source of livelihood for more than 40,000 people. ', '992971081.jpg', 0),
(10, 'Grand Sultan Tea resort', '3000', 24.3017, 91.7643, 'he one & only five star resort in the Sylhet region of Bangladesh. Equipped with all modern state of the art amenities and facilities, located in Srimongal (the tea capital of Bangladesh), around four hours drive from Dhaka. This resort is the true combination of ultimate luxury. Classified in 08 categories with 135 hotel rooms and suites Grand Sultan welcomes you in Sylhet to enjoy your holiday or vacation with comfort and luxury. ', '251080641.jpg', 0),
(11, 'Satchari National Park', '4000', 24.1246, 91.4446, 'Satchari National Park (Bengali: ???????) is a national park in Habiganj District, Bangladesh. After the 1974 Wild Life Preservation Act, in 2005[2] Satchari National Park was built on 243 hectares (600 acres)[2] of land. Literally \'Satchari\' in Bengali means \'Seven Streams\'. There are seven streams flowing in this jungle, and the name \'Satchari\' came from there', 'CREL_RKWS_Tanvir_03-111.jpg', 0),
(12, 'Rema Kalenga Wildlife', '2000', 25.1307, 91.6324, 'Rema-Kalenga Wildlife Sanctuary is a protected forest and wildlife sanctuary in Bangladesh. This is a dry and evergreen forest .[1] It is located in the Chunarughat of Habiganj district. Rema-Kalenga Wildlife Sanctuary was established in 1982 and later expanded in 1996. Currently the wildlife sanctuary expands on an area of 1795.54 hectares as of 2009.[2] This is one of the natural forests in Bangladesh that are still in good condition.', 'Life_around_jungle.jpg', 0),
(13, 'Hum Hum Waterfall', '4000', 24.1678, 91.9129, 'Hum Hum Waterfall is situated in Razkandi reserve forest in Moulvibazar District. It was discovered in 2009. It is actually a place where you can find the real taste of adventure. The height of the fall is about 135-160 feet. It would be the best to travel this place in rainy season to discover the unlimited beauty of the fall.', '111.JPG', 0),
(14, 'Dreamland Amusement Park', '2000', 24.8370583, 91.9189849, 'Dreamlands is just by name only but not by its activities. I’ve been here so many times and will not suit people who have seen so much abroad. There are a few very simple rides and suitable for w quick stroll. Nothing to get excited about. Then again it’s only Taka 100 per person and closes at 8pm ', '3.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place_img`
--

CREATE TABLE `tbl_place_img` (
  `img_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `place_img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_place_img`
--

INSERT INTO `tbl_place_img` (`img_id`, `place_id`, `place_img`) VALUES
(0, 13, 'HumHumWaterfall1-626x365.jpg'),
(0, 2, 'download.jpg'),
(0, 4, 'hqdefault.jpg'),
(0, 5, 'CREL_RKWS_Tanvir_02.jpg'),
(0, 6, 'maxresdefault.jpg'),
(0, 7, '300px-Ratargul_Swamp_Forest,_Sylhet_.jpg'),
(0, 8, '111.JPG'),
(0, 9, '992971081.jpg'),
(0, 10, '251080641.jpg'),
(0, 11, 'Life_around_jungle.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `r_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slide_img`
--

CREATE TABLE `tbl_slide_img` (
  `img_id` int(11) NOT NULL,
  `slide_name` varchar(20) NOT NULL,
  `slide_img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slide_img`
--

INSERT INTO `tbl_slide_img` (`img_id`, `slide_name`, `slide_img`) VALUES
(1, 'asdfghjkl', 'Life_around_jungle.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_con_password` varchar(100) NOT NULL,
  `user_mobile` varchar(12) NOT NULL,
  `user_type` varchar(100) NOT NULL DEFAULT 'user',
  `user_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_name`, `user_email`, `user_password`, `user_con_password`, `user_mobile`, `user_type`, `user_status`) VALUES
(1, 'Super Admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '', '01795261992', 'Superadmin', 1),
(4, 'rubina', 'rubina@gmail.com', '202cb962ac59075b964b07152d234b70', '', '012465485875', 'user', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_booking`
-- (See below for the actual view)
--
CREATE TABLE `vw_booking` (
`b_id` int(11)
,`bkash_id` varchar(100)
,`payment_type` varchar(50)
,`user_id` int(11)
,`b_date` date
,`date` date
,`user_name` varchar(100)
,`user_mobile` varchar(12)
,`user_email` varchar(100)
,`p_id` int(11)
,`place_name` varchar(100)
,`place_cost` varchar(100)
,`place_img` varchar(500)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_booking`
--
DROP TABLE IF EXISTS `vw_booking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_booking`  AS  select `tbl_booking`.`b_id` AS `b_id`,`tbl_booking`.`bkash_id` AS `bkash_id`,`tbl_booking`.`payment_type` AS `payment_type`,`tbl_booking`.`user_id` AS `user_id`,`tbl_booking`.`b_date` AS `b_date`,`tbl_booking`.`date` AS `date`,`tbl_user`.`user_name` AS `user_name`,`tbl_user`.`user_mobile` AS `user_mobile`,`tbl_user`.`user_email` AS `user_email`,`tbl_package`.`p_id` AS `p_id`,`tbl_package`.`place_name` AS `place_name`,`tbl_package`.`place_cost` AS `place_cost`,`tbl_package`.`place_img` AS `place_img` from ((`tbl_booking` join `tbl_user`) join `tbl_package`) where `tbl_booking`.`p_id` = `tbl_package`.`p_id` and `tbl_booking`.`user_id` = `tbl_user`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tbl_slide_img`
--
ALTER TABLE `tbl_slide_img`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_slide_img`
--
ALTER TABLE `tbl_slide_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
