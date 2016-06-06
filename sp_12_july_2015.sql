-- phpMyAdmin SQL Dump
-- version 4.4.9
-- http://www.phpmyadmin.net
--
-- Host: 50.62.209.82:3306
-- Generation Time: Jul 12, 2015 at 12:18 AM
-- Server version: 5.5.43-37.2-log
-- PHP Version: 5.5.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `aid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `validity_days` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `show_in` int(1) NOT NULL DEFAULT '0',
  `status` varchar(200) NOT NULL DEFAULT 'Inactive',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`aid`, `user_id`, `image`, `description`, `validity_days`, `start_date`, `show_in`, `status`, `created_on`) VALUES
(2, 28, '', 'sfdsafs', 10, '2014-12-15', 0, 'Active', '2014-12-04 05:55:47'),
(3, 28, '1062015165634-004.jpg', 'sdf', 10, '2014-12-15', 1, 'Active', '2014-12-04 05:55:59'),
(4, 28, '412201465613-slider-3.jpg', 'sfsfd', 10, '2014-12-15', 0, 'Active', '2014-12-04 05:56:13'),
(5, 28, '412201465623-slider-4.jpg', 'dfgg', 10, '2014-12-15', 1, 'Active', '2014-12-04 05:56:23'),
(6, 34, '722015165538-IMG-20141213-WA0008.jpg', 'JHANSI SHOPPING', 15, '2014-12-15', 0, 'Inactive', '2015-02-07 16:55:38'),
(7, 37, '932015164813-Penguins.jpg', 'cotton kurti', 15, '0000-00-00', 0, 'Active', '2015-02-12 16:29:28'),
(8, 34, '7420152581-Koala.jpg', 'aaaaaa', 5, '0000-00-00', 0, 'Active', '2015-04-07 02:58:01'),
(9, 37, '2520156143-images (14).jpg', 'art', 5, '0002-05-15', 0, 'Active', '2015-05-02 06:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `ads_history`
--

CREATE TABLE IF NOT EXISTS `ads_history` (
  `id` int(11) NOT NULL,
  `ads_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads_history`
--

INSERT INTO `ads_history` (`id`, `ads_id`, `user_id`, `amount`, `created_on`) VALUES
(4, 3, 28, '200', '2015-04-05 12:33:31'),
(5, 9, 37, '', '2015-05-02 06:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `api_management`
--

CREATE TABLE IF NOT EXISTS `api_management` (
  `id` int(11) NOT NULL,
  `username` varchar(400) NOT NULL,
  `password` varchar(400) NOT NULL,
  `senderid` varchar(400) NOT NULL,
  `dndrefund` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_management`
--

INSERT INTO `api_management` (`id`, `username`, `password`, `senderid`, `dndrefund`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(1, 'gautamroy1', 'gautamroy1321', 'CTYNXT', 1, 1, '2015-06-16 05:18:35', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `aid` int(11) NOT NULL,
  `area_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`aid`, `area_name`) VALUES
(1, 'Pune'),
(2, 'Jhansi');

-- --------------------------------------------------------

--
-- Table structure for table `buy_request`
--

CREATE TABLE IF NOT EXISTS `buy_request` (
  `brid` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buy_request`
--

INSERT INTO `buy_request` (`brid`, `owner_id`, `buyer_id`, `product_id`, `message`, `created_on`) VALUES
(2, 27, 27, 24, ' ghh', '2015-01-12 09:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `cid` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `unit_price` varchar(200) NOT NULL,
  `offer` varchar(200) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE IF NOT EXISTS `career` (
  `cid` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `b_date` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `fax` varchar(10) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `resume` varchar(200) NOT NULL,
  `quilification` text NOT NULL,
  `experience` int(2) NOT NULL,
  `last_org` int(2) NOT NULL,
  `current_position` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`cid`, `career_id`, `name`, `b_date`, `address`, `fax`, `email`, `resume`, `quilification`, `experience`, `last_org`, `current_position`, `created_on`, `status`) VALUES
(1, 1, 'ram', '1988-12-12', 'pune ,hadapsir', NULL, 'sdfs@ds.com', '241201585650-Defect.docx', '', 0, 0, '', '2015-01-24 07:56:50', 'unread'),
(2, 1, 'adsafdsffhg', '1985-12-12', 'thfygkjlkj', NULL, 'abcd@gmail.com', '55201525729-DISCLAIMER.docx', '', 0, 0, '', '2015-05-05 02:57:30', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE IF NOT EXISTS `careers` (
  `cid` int(11) NOT NULL,
  `job_profile` varchar(200) NOT NULL,
  `key_responsibility` text NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `no_of_vacancy` int(11) NOT NULL,
  `experience` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`cid`, `job_profile`, `key_responsibility`, `qualification`, `no_of_vacancy`, `experience`) VALUES
(1, 'sales men', 'good communication skill', '12 th Pass', 12, '1 year to 2 Years'),
(2, 'seller', 'good communication skill', 'MBA', 1, '2 year +');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `cid` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cid`, `state_id`, `city_name`) VALUES
(3, 35, 'Ariyalur'),
(4, 35, 'Chennai'),
(5, 35, 'Coimbatore'),
(6, 35, 'Cuddalore'),
(7, 35, 'Dharmapuri'),
(8, 35, 'Dindigul'),
(9, 35, 'Erode'),
(10, 35, 'Kanchipuram'),
(11, 35, 'Kanyakumari'),
(12, 35, 'Karur'),
(13, 35, 'Krishnagiri'),
(14, 35, 'Madurai'),
(15, 35, 'Nagapattinam'),
(16, 35, 'Namakkal'),
(17, 35, 'The Nilgiris'),
(18, 35, 'Perambalur'),
(19, 35, 'Pudukkottai'),
(20, 35, 'Ramanathapuram'),
(21, 35, 'Salem'),
(22, 35, 'Sivagangai'),
(23, 35, 'Thanjavur'),
(24, 35, 'Theni'),
(25, 35, 'Thoothukudi'),
(26, 35, 'Tiruchirappalli'),
(27, 35, 'Thirunelveli'),
(28, 35, 'Tirupur'),
(29, 35, 'Thiruvallur'),
(30, 35, 'Tiruvannamalai'),
(31, 35, 'Thiruvarur'),
(32, 35, 'Vellore'),
(33, 35, 'Villupuram'),
(34, 35, 'Virudhunagar'),
(35, 38, 'Allahabad'),
(36, 38, 'Aligarh'),
(37, 38, 'Ambedkarnagar'),
(38, 38, 'Auraiya'),
(39, 38, 'Azamgarh'),
(40, 38, 'Barabanki'),
(41, 38, 'Badaun'),
(42, 38, 'Bahraich'),
(43, 38, 'Bijnor'),
(44, 38, 'Ballia'),
(45, 38, 'Banda'),
(46, 38, 'Balrampur'),
(47, 38, 'Bareilly'),
(48, 38, 'Basti'),
(49, 38, 'Bulandshahar'),
(50, 38, 'Chandauli'),
(51, 38, 'Chitrakoot'),
(52, 38, 'Deoria'),
(53, 38, 'Etah'),
(54, 38, 'Etawah'),
(55, 38, 'Firozabad'),
(56, 38, 'Farrukhabad'),
(57, 38, 'Fatehpur'),
(58, 38, 'Faizabad'),
(59, 38, 'Gazipur'),
(60, 38, 'Ghaziabad'),
(61, 38, 'Gonda'),
(62, 38, 'Gorakhpur'),
(63, 38, 'Hamirpur'),
(64, 38, 'Hardoi'),
(65, 38, 'Hathras'),
(66, 38, 'Jhansi'),
(67, 38, 'Jaunpur'),
(68, 38, 'Kanpur'),
(69, 38, 'Kannauj'),
(70, 38, 'Kasganj'),
(71, 38, 'Kaushambhi'),
(72, 38, 'Kushinagar'),
(73, 38, 'Lakhimpur Kheri'),
(74, 38, 'Lalitpur'),
(75, 38, 'Lucknow'),
(76, 38, 'Mau'),
(77, 38, 'Maharajganj'),
(78, 38, 'Mahoba'),
(79, 38, 'Meerut'),
(80, 38, 'Mainpuri'),
(81, 38, 'Mathura'),
(82, 38, 'Mirzapur'),
(83, 38, 'Moradabad'),
(84, 38, 'Muzaffarnagar'),
(85, 38, 'Pilibhit'),
(86, 38, 'Pratapgarh'),
(87, 38, 'Rampur'),
(88, 38, 'Rai Bareli'),
(89, 38, 'Saharanpur'),
(90, 38, 'Shahjahanpur'),
(91, 38, 'Shamli'),
(92, 38, 'Shravasti'),
(93, 38, 'Siddharthanagar'),
(94, 38, 'Sitapur'),
(95, 38, 'Sonbhadra'),
(96, 38, 'Sultanpur'),
(97, 38, 'Sant Ravidas Nagar'),
(98, 38, 'Unnao'),
(99, 38, 'Varanasi'),
(100, 24, 'Alirajpur'),
(101, 24, 'Anuppur'),
(102, 24, 'Ashok Nagar'),
(103, 24, 'Badwani'),
(104, 24, 'Balaghat'),
(105, 24, 'Betul'),
(106, 24, 'Bhind'),
(107, 24, 'Bhopal'),
(108, 24, 'Burhanpur'),
(109, 24, 'Chhatarpur'),
(110, 24, 'Chhindwara'),
(111, 24, 'Damoh'),
(112, 24, 'Datia'),
(113, 24, 'Dewas'),
(114, 24, 'Dhar'),
(115, 24, 'Dindori'),
(117, 24, 'Guna'),
(118, 24, 'Gwalior'),
(119, 24, 'Harda'),
(120, 24, 'Hoshangabad'),
(121, 24, 'Indore'),
(122, 24, 'Jabalpur'),
(123, 24, 'Jhabua'),
(124, 24, 'Katni'),
(125, 24, 'Khandwa'),
(126, 24, 'Mandla'),
(127, 24, 'Mandsaur'),
(128, 24, 'Morena'),
(129, 24, 'Narsimhapur'),
(130, 24, 'Neemach'),
(131, 24, 'Panna'),
(132, 24, 'Raisen'),
(133, 24, 'Rajgarh'),
(134, 24, 'Ratlam'),
(135, 24, 'Rewa'),
(136, 24, 'Sagar'),
(137, 24, 'Satna'),
(138, 24, 'Sehore'),
(139, 24, 'Seoni'),
(140, 24, 'Shahdol'),
(141, 24, 'Shahjapur'),
(142, 24, 'Sheopur'),
(143, 24, 'Shivpuri'),
(144, 24, 'Sidhi'),
(145, 24, 'Singrauli'),
(146, 24, 'Tikamgarh'),
(147, 24, 'Ujjain'),
(148, 24, 'Umaria'),
(149, 24, 'Vidisha'),
(150, 24, 'Khargone'),
(151, 24, 'Agar'),
(152, 33, 'Ajmer'),
(153, 33, 'Alwar'),
(154, 33, 'Banswara'),
(155, 33, 'Baran'),
(156, 33, 'Barmer'),
(157, 33, 'Bharatpur'),
(158, 33, 'Bhilwara'),
(159, 33, 'Bikaner'),
(160, 33, 'Boondi'),
(161, 33, 'Churu'),
(162, 33, 'Dausa'),
(163, 33, 'Dhaulpur'),
(164, 33, 'Dungarpur'),
(165, 33, 'Ganganagar'),
(166, 33, 'Hanumangarh'),
(167, 33, 'Jaipur'),
(168, 33, 'Jaisalmer'),
(169, 33, 'Jalor'),
(170, 33, 'Jhalawar'),
(171, 33, 'Jhunjhunu'),
(172, 33, 'Jodhpur'),
(173, 33, 'Karauli'),
(174, 33, 'Kota'),
(175, 33, 'Nagaur'),
(176, 33, 'Pali'),
(177, 33, 'Pratapgarh'),
(178, 33, 'Rajsamand'),
(179, 33, 'Sawai Madhopur'),
(180, 33, 'Sikar'),
(181, 33, 'Sirohi'),
(182, 33, 'Tonk'),
(183, 33, 'Udaipur'),
(184, 14, 'Ahemdabad'),
(185, 14, 'Amreli'),
(186, 14, 'Anand'),
(187, 14, 'Banaskantha'),
(188, 14, 'Bharuch'),
(189, 14, 'Bhavnagar'),
(190, 14, 'Dahod'),
(191, 14, 'Gandhinagar'),
(192, 14, 'Jamnagar'),
(193, 14, 'Junagarh'),
(194, 14, 'Kachchh'),
(195, 14, 'Kheda'),
(196, 14, 'Mehsana'),
(197, 14, 'Narmada'),
(198, 14, 'Navsari'),
(199, 14, 'Panchmahal'),
(200, 14, 'Patan'),
(201, 14, 'Porbander'),
(202, 14, 'Rajkot'),
(203, 14, 'Sabarkantha'),
(204, 14, 'Surat'),
(205, 14, 'Surendranagar'),
(206, 14, 'The Dangs'),
(207, 14, 'Vadodara'),
(208, 14, 'Vadodara'),
(209, 14, 'Valsad'),
(210, 14, 'Tapi'),
(211, 14, 'Aravali'),
(212, 14, 'Botad'),
(213, 14, 'Devbhoomi Dwairka'),
(214, 14, 'Gir Somnath'),
(215, 14, 'Mahisagar'),
(216, 14, 'Morbi'),
(217, 5, 'Anantapur'),
(218, 5, 'Anantapur'),
(219, 5, 'Chittoor'),
(220, 5, 'Kakinada'),
(221, 5, 'Guntur'),
(222, 5, 'Krishna'),
(223, 5, 'Kurnool'),
(224, 5, 'Prakasam'),
(225, 5, 'Nellore'),
(226, 5, 'Srikakulam'),
(227, 5, 'Vishakhapatnam'),
(228, 5, 'Vizianagaram'),
(229, 5, 'Cuddapah'),
(230, 6, 'Changlang'),
(231, 6, 'Anini'),
(232, 6, 'Seppa'),
(233, 6, 'Pasighat'),
(234, 6, 'Koloriang');

-- --------------------------------------------------------

--
-- Table structure for table `cityupdate`
--

CREATE TABLE IF NOT EXISTS `cityupdate` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `news` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL DEFAULT 'Inactive'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cityupdate`
--

INSERT INTO `cityupdate` (`id`, `user_id`, `title`, `news`, `image`, `date`, `created_on`, `status`) VALUES
(1, 28, 'test', 'test', '1842015134927-Hydrangeas.jpg', '2015-04-20', '2015-04-18 11:49:27', 'Inactive'),
(2, 36, 'Attention', 'stuuiyiouyoi ghjhkjlkjl hnghjjyki cghjgjhgkjhkhk bhkjhjkljlkjl hlkjlkjlkjl; kjhkljlj;l hkjhlkkllk nhlkjljljlj j,kjljl;kjl.kj', '95201551833-Jellyfish.jpg', '0000-00-00', '2015-05-09 05:18:33', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `classifieds`
--

CREATE TABLE IF NOT EXISTS `classifieds` (
  `id` int(11) NOT NULL,
  `classified_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL DEFAULT 'Inactive'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classifieds`
--

INSERT INTO `classifieds` (`id`, `classified_id`, `user_id`, `title`, `description`, `image`, `from_date`, `to_date`, `created_on`, `status`) VALUES
(1, 2, 28, 'test', 'test', '1842015134237-Chrysanthemum.jpg', '2015-04-04', '2015-05-15', '2015-04-18 11:42:37', 'Deactive'),
(2, 1, 34, 'gfhgujhgi', 'sgrfhjgvj  giugkhlj  bhigiuhi gkihgikghikg  bjgkhih kjgjjhfvj  vjfuyfyuvg', '172015174147-abhinav.jpg', '2001-07-15', '2005-07-15', '2015-07-01 17:41:05', 'Deactive'),
(3, 1, 28, 'PHP Developer', 'NEED 1 YR EXPERIENCED', '172015175211-Chrysanthemum.jpg', '2014-10-10', '2015-10-10', '2015-07-01 17:52:12', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `classified_type`
--

CREATE TABLE IF NOT EXISTS `classified_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classified_type`
--

INSERT INTO `classified_type` (`id`, `name`) VALUES
(1, 'developer'),
(2, 'tester');

-- --------------------------------------------------------

--
-- Table structure for table `condolences`
--

CREATE TABLE IF NOT EXISTS `condolences` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(400) NOT NULL,
  `date` date NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `condolences`
--

INSERT INTO `condolences` (`id`, `user_id`, `title`, `description`, `image`, `date`, `created_on`) VALUES
(1, 28, 'name man', 'asdsf sd', '294201514949-images34.jpg', '2015-04-29', '2015-04-29 12:09:49'),
(2, 36, 'Abcd Xyz', 'hgikhoiupoipo hijhijoujpoh oijoolopuopiop hiloluoppoop opoiopipo hjojoljopj hjolooopj hkojopjop hjoijljlkjlkjpo jojopiopipo lkjoijooij nkljljllkl;kl;kkkkkkkk jlkjljllklhkjhlkhiohihiiououljkjlkjljlkjkl', '9520155557-Tulips.jpg', '0000-00-00', '2015-05-09 05:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `cuid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone_no` bigint(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `enquiry` text NOT NULL,
  `read` varchar(50) NOT NULL DEFAULT 'unread',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`cuid`, `name`, `phone_no`, `email`, `enquiry`, `read`, `created_on`) VALUES
(1, 'ghfdh', 564645, 'ttryryt', 'tyry', 'read', '2014-12-17 09:16:30'),
(2, 'ghfdh', 564645, 'ttryryt', 'tyry', 'read', '2014-12-17 09:17:54'),
(3, 'ghfdh', 564645, 'ttryryt', 'tyry', 'read', '2014-12-17 09:17:57'),
(4, 'fdgdg', 56456, 'ytry', 'tyruy', 'read', '2014-12-18 08:04:22'),
(5, 'cvbn', 0, 'fghgh', 'vbnvn', 'read', '2015-01-05 11:25:44'),
(6, 'fs', 435, 'rter@fdf.com', 'rte', 'unread', '2015-01-22 11:32:17'),
(7, 'gdg', 546456, 'rter@fdf.com', 'fhfh', 'unread', '2015-01-22 11:55:03'),
(8, 'fgd', 0, 'fgf@fdf.com', 'vbcvbc', 'unread', '2015-01-23 07:48:57'),
(9, 'fgd', 4353, 'fgf@fdf.com', '5345sdte', 'read', '2015-01-23 07:51:22'),
(10, 'vcb', 4353, 'fgf@fdf.com', 'vbcbc', 'unread', '2015-01-23 07:53:48'),
(11, 'fsf', 0, 'sdfgdg@sdfdsd.com', 'fghfh', 'unread', '2015-01-23 09:12:28'),
(12, 'fsf', 0, 'sdfgdg@sdfdsd.com', 'fghfh', 'unread', '2015-01-23 09:13:39'),
(13, 'fsf', 0, 'sdfgdg@sdfdsd.com', 'fghfh', 'unread', '2015-01-23 09:15:23'),
(14, 'fsf', 0, 'sdfgdg@sdfdsd.com', 'fghfh', 'unread', '2015-01-23 09:15:59'),
(15, 'fsf', 0, 'sdfgdg@sdfdsd.com', 'fghfh', 'unread', '2015-01-23 09:16:45'),
(16, 'sdf', 45435353, 'grte@sdf.com', 'fghfh', 'unread', '2015-01-23 09:24:28'),
(17, 'sdf', 45435353, 'grte@sdf.com', 'fghfh', 'unread', '2015-01-23 09:24:43'),
(18, 'akash', 123456789, 'abc@abc.com', 'hi', 'unread', '2015-02-08 08:15:19'),
(19, 'abc', 979878888878, 'ghgh@hgh.in', 'test', 'unread', '2015-02-23 11:29:11'),
(20, 'df', 65757678686, 'hfg@dfghf.ghf', 'rtrtg', 'unread', '2015-02-23 11:30:00'),
(21, 'hihkhbkffghk', 444444444444, 'hklchkjfhik@hjkgjfhg.fff', 'gjgkjjhlkj;lkghcb  \r\nkjgjfjhbknl', 'unread', '2015-04-06 03:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `discount_vouchers`
--

CREATE TABLE IF NOT EXISTS `discount_vouchers` (
  `id` int(11) NOT NULL,
  `vender_id` int(11) NOT NULL,
  `code` varchar(200) NOT NULL,
  `total` int(11) NOT NULL,
  `description` text NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Deactive',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount_vouchers`
--

INSERT INTO `discount_vouchers` (`id`, `vender_id`, `code`, `total`, `description`, `from_date`, `to_date`, `status`, `created_on`) VALUES
(1, 28, '845947', 4, 'testing', '0000-00-00', '0000-00-00', 'Active', '2015-06-08 16:43:36'),
(2, 28, '903862', 9, '', '0000-00-00', '0000-00-00', 'Active', '2015-06-08 16:43:36'),
(3, 28, '415418', 9, '', '0000-00-00', '0000-00-00', 'Active', '2015-06-08 16:43:36'),
(4, 28, '838188', 10, '', '0000-00-00', '0000-00-00', 'Active', '2015-06-08 16:43:36'),
(5, 28, '212619', 10, '', '0000-00-00', '0000-00-00', 'Active', '2015-06-08 16:43:36'),
(6, 28, '948974', 10, '', '0000-00-00', '0000-00-00', 'Active', '2015-06-08 16:43:36'),
(7, 28, '242350', 10, '', '0000-00-00', '0000-00-00', 'Active', '2015-06-08 16:43:36'),
(8, 28, '500216', 10, '', '0000-00-00', '0000-00-00', 'Active', '2015-06-08 16:43:36'),
(9, 28, '487413', 10, '', '0000-00-00', '0000-00-00', 'Active', '2015-06-08 16:43:36'),
(10, 28, '718641', 10, '', '0000-00-00', '0000-00-00', 'Active', '2015-06-08 16:43:36'),
(11, 34, '721408', 3, 'fdkl;jvf;lkjk;ljlf fgnk;ljl;ifg kkjlkjlk kljlkjl', '0000-00-00', '0000-00-00', 'Active', '2015-06-08 18:12:47'),
(12, 34, '873263', 4, 'dfhkjhkjnv jlkjflkjklj nkljkljlkj', '2018-07-15', '0000-00-00', 'Active', '2015-06-18 17:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `fid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone_no` bigint(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `feedback` text NOT NULL,
  `read` varchar(50) NOT NULL DEFAULT 'unread',
  `ctreated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `name`, `phone_no`, `email`, `feedback`, `read`, `ctreated_on`) VALUES
(1, 'dfg', 645, 'hdh', 'ghfdg', 'read', '2014-12-18 08:08:09'),
(2, 'xcbxcb', 0, 'xcvbvcb', 'xcvb', 'read', '2015-01-05 11:25:34'),
(3, 'gfdfg', 456456, 'yr@sdd.com', 'sdfbdsg', 'read', '2015-01-23 09:26:48'),
(4, 'hj', 86876, 'jgjhg@nhbb.hg', 'ghnb', 'unread', '2015-03-13 17:04:33'),
(5, 'aaaaa', 2222222, 'abhinav@jkjkljj.ffgi', 'ffgjjnhfghgkmkjglj;', 'unread', '2015-04-06 03:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `log_sms`
--

CREATE TABLE IF NOT EXISTS `log_sms` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `api_id` int(11) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `sms` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_sms`
--

INSERT INTO `log_sms` (`id`, `user_id`, `api_id`, `mobile_no`, `sms`, `created_on`) VALUES
(1, 1, 1, 4665, 'hi ', '2015-06-16 07:15:48'),
(2, 1, 1, 4665, 'hi ', '2015-06-16 07:16:07'),
(3, 28, 1, 5675676575, 'Hi Salman,We have received your request & shall get back to you soon !', '2015-06-18 16:16:46'),
(4, 28, 1, 5675676575, 'Hi Salman,Discount Voucher Request send By Salman', '2015-06-18 16:16:47'),
(5, 28, 1, 8308992045, 'Hi Salman,We have received your request & shall get back to you soon !', '2015-06-18 16:18:08'),
(6, 28, 1, 8308992045, 'Hi Salman,Discount Voucher Request send By Salman', '2015-06-18 16:18:09'),
(7, 36, 1, 9235565001, 'Hi Avantika ,We have received your request & shall get back to you soon !', '2015-06-18 17:28:21'),
(8, 34, 1, 9235565001, 'Hi Abhinav,Discount Voucher Request send By Avantika ', '2015-06-18 17:28:22'),
(9, 36, 1, 8090221150, 'Hi Avantika ,We have received your request & shall get back to you soon !', '2015-06-18 17:31:00'),
(10, 34, 1, 9235565001, 'Hi Abhinav,Discount Voucher Request send By Avantika ', '2015-06-18 17:31:01'),
(11, 36, 1, 8090221150, 'Hi Avantika ,We have received your request & shall get back to you soon !', '2015-06-18 17:32:15'),
(12, 34, 1, 9235565001, 'Hi Abhinav,Discount Voucher Request send By Avantika ', '2015-06-18 17:32:15'),
(13, 34, 1, 9235565001, 'Hi Abhinav,We have received your request & shall get back to you soon !', '2015-06-19 16:46:38'),
(14, 28, 1, 8308992045, 'Hi Salman,Discount Voucher Request send By Abhinav', '2015-06-19 16:46:38'),
(15, 36, 1, 8090221150, 'Hi Avantika ,Your discount voucher code : 721408, We have received your request & shall get back to you soon !', '2015-06-22 02:23:42'),
(16, 34, 1, 9235565001, 'Hi Abhinav,Discount Voucher Request send By Avantika  Mobile No 8090221150', '2015-06-22 02:23:42'),
(17, 37, 1, 8056256705, 'Hi Manjree,Your discount voucher code : 721408, We have received your request & shall get back to you soon !', '2015-06-22 13:33:24'),
(18, 34, 1, 9235565001, 'Hi Abhinav,Discount Voucher Request send By Manjree Mobile No 08056256705', '2015-06-22 13:33:25'),
(19, 36, 1, 8090221150, 'Hi Avantika ,Your discount voucher code : 845947, We have received your request & shall get back to you soon !', '2015-06-26 17:13:21'),
(20, 28, 1, 8308992045, 'Hi Salman,Discount Voucher Request send By Avantika  Mobile No 8090221150', '2015-06-26 17:13:22'),
(21, 36, 1, 8090221150, 'Hi Avantika ,Your discount voucher code : 845947, We have received your request & shall get back to you soon !', '2015-06-26 17:13:24'),
(22, 28, 1, 8308992045, 'Hi Salman,Discount Voucher Request send By Avantika  Mobile No 8090221150', '2015-06-26 17:13:24'),
(23, 34, 1, 9235565001, 'Hi Abhinav,Your discount voucher code : 845947, We have received your request & shall get back to you soon !', '2015-06-29 09:34:03'),
(24, 28, 1, 8308992045, 'Hi Salman,Discount Voucher Request send By Abhinav Mobile No 9235565001', '2015-06-29 09:34:04'),
(25, 36, 1, 8090221150, 'Hi Avantika ,Your discount voucher is 721408, Please contact abhinav agarwal civil lines 9235565001. ', '2015-07-01 18:11:39'),
(26, 34, 1, 9235565001, 'Hi Abhinav,Discount Voucher no is 721408 Request By Avantika  Mobile No 8090221150', '2015-07-01 18:11:40'),
(27, 36, 1, 8090221150, 'Hi Avantika ,Your discount voucher is 721408, Please contact abhinav agarwal civil lines 9235565001. ', '2015-07-01 18:11:47'),
(28, 34, 1, 9235565001, 'Hi Abhinav,Discount Voucher no is 721408 Request By Avantika  Mobile No 8090221150', '2015-07-01 18:11:48'),
(29, 36, 1, 8090221150, 'Hi Avantika ,Your discount voucher is 873263, Please contact abhinav agarwal civil lines 9235565001. ', '2015-07-01 18:12:03'),
(30, 34, 1, 9235565001, 'Hi Abhinav,Discount Voucher no is 873263 Request By Avantika  Mobile No 8090221150', '2015-07-01 18:12:03'),
(31, 36, 1, 8090221150, 'Hi Avantika ,Your discount voucher is 415418, Please contact salman khan bbbbbb 8308992045. ', '2015-07-01 18:16:34'),
(32, 28, 1, 8308992045, 'Hi Salman,Discount Voucher no is 415418 Request By Avantika  Mobile No 8090221150', '2015-07-01 18:16:34'),
(33, 34, 1, 9235565001, 'Hi Abhinav,Your discount voucher is 903862, Please contact salman khan bbbbbb 8308992045. ', '2015-07-01 18:19:34'),
(34, 28, 1, 8308992045, 'Hi Salman,Discount Voucher no is 903862 Request By Abhinav Mobile No 9235565001', '2015-07-01 18:19:34'),
(35, 28, 1, 8308992045, 'Hi Salman,Your discount voucher is 721408, Please contact abhinav agarwal civil lines 9235565001. ', '2015-07-08 18:11:22'),
(36, 34, 1, 9235565001, 'Hi Abhinav,Discount Voucher no is 721408 Request By Salman Mobile No 8308992045', '2015-07-08 18:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

CREATE TABLE IF NOT EXISTS `main_category` (
  `mcid` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`mcid`, `category`, `description`, `icon`) VALUES
(6, 'EDUCATION', '', '194201572044-education.png'),
(7, 'TOURS & TRAVELS', '', '194201572112-travels.png'),
(8, 'REAL ESTATE', '', '194201572137-real-estate.png'),
(9, 'HOME & OFFICE', '', '19420157225-office.png'),
(10, 'FOOD & BEVERAGE', '', '82201518844-'),
(12, 'APPARELS', '', '82201518188-'),
(15, 'ELECTRICALS & ELECTRONICS', '', '194201572857-electronic repair.png'),
(16, 'ACCESSORIES', '', '194201572758-acessories.png'),
(17, 'FOOTWEAR', '', '82201518260-'),
(18, 'BOOKS & STATIONERY', '', '194201572445-books.png'),
(19, 'SUPER & DEPARTMENTAL STORES', '', '822015182949-'),
(20, 'GIFTS  & TOYS', '', '822015184215-'),
(21, 'BEAUTY & WELLNESS', '', '82201518449-'),
(22, 'LODGING & ACCOMODATION', '', '194201573150-lodge.png'),
(23, 'JEWELLERY  &  PRECIOUS  STONES', '', '194201573225-jwellery repair.png'),
(24, 'MANUFACTURERS & SUPPLIERS', '', '82201518508-'),
(25, 'EVENT MANAGEMENT', '', '194201573356-events.png'),
(27, 'HOME BASED BUSINESS', '', '112201571826-'),
(28, 'HOBBY & VOCATIONAL COURSES', '', '112201571850-'),
(29, 'FABRICATION', '', '112201572115-'),
(30, 'HOSPITALS & DIAGNOSTIC CENTRES', '', '194201573545-hospital.png'),
(32, 'PHOTO STUDIO & LABS', '', '112201517819-'),
(34, 'AUTOMOBILE', '', '152201554113-'),
(35, 'HEALTH & FITNESS', '', '152201554734-'),
(36, 'CONSULTANCY SERVICES', '', '194201573718-consultancy.png'),
(37, 'HOME & OFFICE SERVICES', '', '194201574020-household repair.png'),
(38, 'SOLAR POWER', '', '222201510470-'),
(39, 'DESIGN & GRAPHICS', '', '173201535829-'),
(40, 'SWEETS  &  NAMKEENS', '', '84201561848-'),
(41, 'FLOWERS  &  FLOWER ARRANGEMENTS', '', '84201562431-'),
(42, 'BANQUETS', '', '8420156348-'),
(43, 'AYURVED', '', '19420157441-ayurvedic.png'),
(44, 'HOMEOPATHY', '', '194201574439-Homeopathic.png'),
(45, 'MILK & MILK PRODUCTS', '', '204201525755-'),
(46, 'PETS  &  CARE', '', '244201516118-'),
(47, 'BABIES  &  KIDS', '', '244201516322-'),
(48, 'GAMES  &  SPORTS', '', '244201516827-'),
(50, 'LUGGAGE  &  BAGS', '', '2442015162426-'),
(51, 'MUSIC AND DANCE', '', '28420151320-'),
(52, 'FRUITS  &  VEGETABLES', '', '25201552150-'),
(53, 'ADVERTISING', '', '86201524828-'),
(54, 'AGRICULTURE', '', '8620153296-'),
(55, 'COMPUTERS', '', '8620154853-'),
(56, 'GROCERIES', '', '8620156445-');

-- --------------------------------------------------------

--
-- Table structure for table `marquee`
--

CREATE TABLE IF NOT EXISTS `marquee` (
  `mid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `show_in` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marquee`
--

INSERT INTO `marquee` (`mid`, `title`, `link`, `show_in`) VALUES
(1, 'jhansishopping.com', 'http://jhansishopping.com', 0),
(2, 'jhansishopping.com2', 'http://jhansishopping.com', 0),
(3, 'Dear Users/Viewers, register yourself for free and get the latest updates and offers .', 'aaaaaa', 0),
(4, 'Vendors Registration for free.', 'a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE IF NOT EXISTS `offer` (
  `oid` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`oid`, `days`, `amount`, `status`) VALUES
(1, 5, '100', 'Active'),
(2, 10, '200', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `main_category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `version_id` int(11) NOT NULL,
  `product` varchar(200) NOT NULL,
  `image` varchar(300) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `image3` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `description` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(200) NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `user_id`, `main_category_id`, `sub_category_id`, `version_id`, `product`, `image`, `image2`, `image3`, `price`, `quantity`, `description`, `rating`, `created_on`, `status`) VALUES
(2, 27, 2, 13, 0, 'games kit', '1512015102834-', '1512015102834-', '1512015102834-', '3000', 1, '<p>gh</p>', 0, '2015-01-15 09:28:34', 'Active'),
(3, 37, 15, 35, 0, 'laptop', '183201543659-2015-03-18 10.05.15.jpg', '183201543659-', '183201543659-', '00000', 1, '<p>aaaa</p>', 0, '2015-03-18 04:36:59', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `pid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `main_category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `version_id` int(11) NOT NULL,
  `product` varchar(200) NOT NULL,
  `image` varchar(300) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `image3` varchar(200) NOT NULL,
  `old_price` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `key_feature` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(200) NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `user_id`, `main_category_id`, `sub_category_id`, `version_id`, `product`, `image`, `image2`, `image3`, `old_price`, `price`, `quantity`, `description`, `key_feature`, `rating`, `created_on`, `status`) VALUES
(31, 37, 12, 29, 0, 'kurti', '', '', '', '', '500', 1, '<p>cotton kurti available in three shades</p>', '', 1, '2015-02-12 16:23:15', 'Active'),
(32, 34, 20, 41, 0, 'gift', '74201523620-2015-02-12 10.50.21.jpg', '74201523620-', '74201523620-', '', '500', 1, '<p>Gift pack.</p>', '', 1, '2015-04-07 02:36:20', 'Active'),
(33, 34, 20, 41, 0, 'soft toy', '74201523816-2015-02-12 20.05.21.jpg', '74201523816-', '74201523816-', '', '800', 2, '<p>soft toy</p>', '', 1, '2015-04-07 02:38:16', 'Active'),
(35, 37, 12, 29, 0, 'kurti', '204201595313-IMG-20150418-WA0014.jpg', '204201595313-', '204201595313-', '', '450', 1, '<p>cotton kurti available in different shades</p>', '', 1, '2015-04-20 09:53:13', 'Active'),
(36, 37, 12, 29, 0, 'kurti', '214201564219-IMG-20150418-WA0017.jpg', '214201564219-', '214201564219-', '', '450', 1, '<p>100% cotton kurti</p>', '', 1, '2015-04-21 06:42:19', 'Active'),
(37, 37, 12, 29, 0, 'kurti', '214201510118-IMG-20150418-WA0018.jpg', '214201510118-', '214201510118-', '', '700', 2, '<p>sfgfhklhkiu</p>', '', 1, '2015-04-21 10:01:18', 'Active'),
(38, 37, 12, 29, 0, 'kurti', '21420151037-IMG-20150418-WA0019.jpg', '21420151037-', '21420151037-', '', '600', 3, '<p>kjhkkhkljgvhjf</p>', '', 3, '2015-04-21 10:03:08', 'Active'),
(39, 37, 12, 29, 0, 'kurti', '214201510415-IMG-20150418-WA0020.jpg', '214201510415-', '214201510415-', '', '450', 2, '<p>kloj,mbmn</p>', '', 2, '2015-04-21 10:04:16', 'Active'),
(40, 37, 12, 29, 0, 'kurti', '21420151060-IMG-20150418-WA0021.jpg', '21420151060-', '21420151060-', '', '444', 3, '<p>tgyhmnbrty</p>', '', 2, '2015-04-21 10:06:00', 'Active'),
(41, 34, 12, 29, 0, 'kurti', '75201532320-IMG-20150419-WA0022.jpg', '75201532320-', '75201532320-', '', '123', 1, '<p>grtetyio[pk bkjhgkuiljlo jgujhikujoli; mvsxfdsr ,hjmjhujg</p>\r\n<p>hgfhghkjlkdrtwsrst kjlkl.km,l., kil;k;lkl;/ vghdrsrtryu io8iopil;</p>\r\n<p>&nbsp;</p>', '', 4, '2015-05-07 03:23:20', 'Active'),
(42, 34, 12, 29, 0, 'kurti', '75201532458-IMG-20150419-WA0021.jpg', '75201532458-', '75201532458-', '', '555', 2, '<p>gfdhggkjhlkjlk vxdgfhjgkj fhkyfjlhkj fthfjhghkjhkj,n</p>', '', 2, '2015-05-07 03:24:58', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `product_history`
--

CREATE TABLE IF NOT EXISTS `product_history` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_history`
--

INSERT INTO `product_history` (`id`, `product_id`, `user_id`, `amount`, `created_on`) VALUES
(2, 31, 37, '200', '2015-04-05 12:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_offers`
--

CREATE TABLE IF NOT EXISTS `product_offers` (
  `poid` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Inactive',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_offers`
--

INSERT INTO `product_offers` (`poid`, `offer_id`, `user_id`, `product_id`, `description`, `start_date`, `end_date`, `status`, `created_on`) VALUES
(16, 1, 37, 31, '<p>cotton kurti</p>', '2025-02-15', '0000-00-00', 'Active', '2015-02-21 16:39:19'),
(17, 1, 37, 38, '<p>rtrghytht</p>', '0000-00-00', '0000-00-00', 'Active', '2015-04-21 10:06:54'),
(18, 2, 37, 39, '<p>y7hjjtr</p>', '0000-00-00', '0000-00-00', 'Active', '2015-04-21 10:10:53'),
(19, 1, 34, 32, '<p>bvhjbml;k;ljlk33344545</p>\r\n<p>ghuyrtydhgkj</p>\r\n<p>gfjhgkljjlkkj;lmbvchgfhgmjn ,</p>', '0000-00-00', '0000-00-00', 'Active', '2015-05-03 17:33:48'),
(20, 2, 34, 33, '<p>bvjhfjnl;k;l</p>\r\n<p>''koiftydtyfvkjhlkjl;k;/k/.lk;lkklbkl</p>\r\n<p>nbvcvbcxczvbrytuiuop556677</p>', '0000-00-00', '0000-00-00', 'Active', '2015-05-03 17:34:31'),
(21, 1, 34, 41, '<p>hfdgbgjhg</p>', '0000-00-00', '0000-00-00', 'Active', '2015-05-07 03:25:34'),
(22, 2, 34, 42, '<p>hghkjl. gbgkjhjlk hgtukhjlkn hgjouhyikh</p>\r\n<p>hgghkfjhhkl kjhgkihkln kjhgkjhjlkm</p>', '0000-00-00', '0000-00-00', 'Active', '2015-05-07 03:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE IF NOT EXISTS `qualification` (
  `qid` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL,
  `join_year` int(11) NOT NULL,
  `pass_year` int(11) NOT NULL,
  `main_subject` varchar(50) NOT NULL,
  `percentage` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `qid` int(11) NOT NULL,
  `question` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `question`) VALUES
(1, 'Your father''s name ?'),
(2, 'Your mother''s name ?'),
(3, 'Your pet name?'),
(4, 'Your Date of Birth?'),
(5, 'Your First School?');

-- --------------------------------------------------------

--
-- Table structure for table `request_category`
--

CREATE TABLE IF NOT EXISTS `request_category` (
  `rcid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `read` varchar(50) NOT NULL DEFAULT 'unread',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reserve_vouchers`
--

CREATE TABLE IF NOT EXISTS `reserve_vouchers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve_vouchers`
--

INSERT INTO `reserve_vouchers` (`id`, `user_id`, `voucher_id`, `status`, `created_on`) VALUES
(1, 28, 1, 'Pending', '2015-06-18 12:23:45'),
(2, 28, 1, 'Pending', '2015-06-18 12:24:30'),
(3, 28, 1, 'Pending', '2015-06-18 12:24:42'),
(4, 28, 1, 'Pending', '2015-06-18 16:16:45'),
(5, 28, 1, 'Pending', '2015-06-18 16:18:08'),
(6, 36, 12, 'Pending', '2015-06-18 17:28:20'),
(7, 36, 12, 'Pending', '2015-06-18 17:31:00'),
(8, 36, 12, 'Pending', '2015-06-18 17:32:14'),
(9, 34, 1, 'Pending', '2015-06-19 16:46:37'),
(10, 36, 11, 'Pending', '2015-06-22 02:23:41'),
(11, 37, 11, 'Pending', '2015-06-22 13:33:23'),
(12, 36, 1, 'Pending', '2015-06-26 17:13:20'),
(13, 36, 1, 'Pending', '2015-06-26 17:13:23'),
(14, 34, 1, 'Pending', '2015-06-29 09:34:03'),
(15, 36, 11, 'Pending', '2015-07-01 18:11:39'),
(16, 36, 11, 'Pending', '2015-07-01 18:11:47'),
(17, 36, 12, 'Pending', '2015-07-01 18:12:02'),
(18, 36, 3, 'Pending', '2015-07-01 18:16:33'),
(19, 34, 2, 'Pending', '2015-07-01 18:19:33'),
(20, 28, 11, 'Pending', '2015-07-08 18:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `sid` int(11) NOT NULL,
  `state_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`sid`, `state_name`) VALUES
(4, 'Andaman & Nicobar Islands'),
(5, 'Andhra Pradesh'),
(6, 'Arunachal Pradesh'),
(7, 'Assam'),
(8, 'Bihar'),
(9, 'Chhastisgarh'),
(10, 'Dadar & Nagar Haveli'),
(11, 'Daman & Diu'),
(12, 'Delhi'),
(13, 'Goa'),
(14, 'Gujarat'),
(15, 'Haryana'),
(16, 'Himachal Pradesh'),
(17, 'Jammu & Kashmir'),
(18, 'Jharkhand'),
(19, 'Karnataka '),
(22, 'Kerala'),
(23, 'Lakshadweep'),
(24, 'Madhya Pradesh'),
(25, 'Maharashtra'),
(26, 'Manipur'),
(27, 'Meghalaya'),
(28, 'Mizoram'),
(29, 'Nagaland'),
(30, 'Odisha'),
(31, 'Puducherry'),
(32, 'Punjab'),
(33, 'Rajasthan'),
(34, 'Sikkim'),
(35, 'Tamil Nadu'),
(36, 'Telangana'),
(37, 'Tripura'),
(38, 'Uttar Pradesh'),
(39, 'Uttarakhand'),
(40, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `scid` int(11) NOT NULL,
  `main_category_id` int(11) NOT NULL,
  `sub_category` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`scid`, `main_category_id`, `sub_category`, `description`, `icon`) VALUES
(16, 16, 'Bike & Car Accessories', '', '194201575433-car.png'),
(17, 16, 'Fashion Accessories', '', '112201561319-'),
(18, 16, 'Travel Accessories', '', '194201575710-travel tour package.png'),
(22, 18, 'Bestsellers', '', '112201561710-'),
(23, 18, 'Fiction', '', '112201561812-'),
(24, 18, 'Romance', '', '112201561932-'),
(25, 18, 'School & College ', '', '194201575810-school.png'),
(28, 12, 'Men', '', '112201562355-'),
(29, 12, 'Women', '', '112201562419-'),
(30, 12, 'Kids', '', '112201562437-'),
(31, 6, 'Pre-Schools', '', '112201562710-'),
(32, 6, 'Schools & Colleges ', '', '112201562735-'),
(33, 6, 'Tutions', '', '112201562814-'),
(34, 15, 'Electrical Home Appliances & Accessories', '', '19420158116-blank.png'),
(35, 15, 'Electronics- Gadgets, Appliances & Accessories', '', '19420158144-entertainment.png'),
(38, 25, 'Product / Brand Launch', '', '11220156404-'),
(39, 25, 'Concerts', '', '112201564023-'),
(41, 20, 'Gifts & Toys', '', '112201564353-'),
(43, 10, 'Restaurants & Coffee Sops', '', '19420158329-restaurant.png'),
(44, 10, 'Food Joints', '', '11220156471-'),
(46, 10, 'Juices & Mocktails', '', '112201564831-'),
(47, 10, 'Tea, Coffee, Soups', '', '112201564920-'),
(48, 10, 'Icecream & Shakes', '', '112201564950-'),
(49, 17, 'Men', '', '11220156508-'),
(50, 17, 'Women', '', '112201565026-'),
(51, 17, 'Kids', '', '112201565044-'),
(57, 9, 'Decor & Furnishings', '', '19420158435-home decor.png'),
(58, 9, 'Furniture & Fixtures', '', '1942015850-furniture repair.png'),
(59, 9, 'Hardware & Fittings', '', '11220157719-'),
(60, 9, 'Sanitaryware & Fittings', '', '1122015780-'),
(61, 9, 'Tiles', '', '11220157832-'),
(62, 23, 'Silver', '', '112201571149-'),
(63, 23, 'Gold', '', '112201571212-'),
(64, 23, 'Diamond', '', '112201571229-'),
(65, 23, 'Precious Stones', '', '11220157131-'),
(66, 22, 'Hotels & Guest Houses', '', '19420158717-hotel.png'),
(67, 22, 'Lodges', '', '19420158632-lodge.png'),
(68, 22, 'Dharamshalas', '', '112201571456-'),
(69, 24, 'Manufacturers', '', '112201571951-'),
(70, 24, 'Suppliers', '', '112201572010-'),
(71, 24, 'Distributors', '', '112201572028-'),
(72, 29, 'Iron', '', '112201572218-'),
(73, 29, 'Steel', '', '112201572246-'),
(74, 8, 'Villas & Apartments', '', '11220157248-'),
(75, 8, 'Colonies', '', '11220157256-'),
(76, 8, 'Plots', '', '112201572523-'),
(77, 8, 'Brokers', '', '112201572548-'),
(78, 19, 'Garments', '', '112201572640-'),
(79, 19, 'Groceries', '', '112201572727-'),
(80, 19, 'Cosmetics & toiletries', '', '11220157280-'),
(81, 19, 'Vegetables & Fruits', '', '112201572830-'),
(82, 7, 'Ticketing Services', '', '11220157298-'),
(83, 7, 'Bus &Taxi Services', '', '112201572930-'),
(84, 7, 'Passport & Visa Assistance', '', '112201572959-'),
(85, 7, 'Tour Packages', '', '112201573026-'),
(87, 6, 'Coaching Classes', '', '132201543240-'),
(88, 9, 'Paints & Polishes', '', '132201543545-'),
(89, 9, 'POP, ACP', '', '132201543728-'),
(90, 10, 'Caterers', '', '13220154483-'),
(93, 25, 'Wedding Planner', '', '132201552011-'),
(94, 8, 'Builders & Contractors', '', '132201514230-'),
(103, 20, 'Others', '', '1322015164925-'),
(105, 17, 'Ethnic Wear', '', '1322015165143-'),
(106, 28, 'Others', '', '1322015165223-'),
(107, 35, 'Gym', '', '152201554838-'),
(108, 35, 'Aerobics', '', '152201554910-'),
(109, 35, 'Diet Supplements', '', '152201554946-'),
(111, 36, 'Doctors', '', '2222015104057-'),
(112, 36, 'Lawyers', '', '2222015104121-'),
(113, 36, 'Chartered Accountants', '', '222201510422-'),
(114, 36, 'Investment Advisors & Agents', '', '2222015104330-'),
(115, 36, 'Insurance & Policies', '', '222201510446-'),
(116, 37, 'Electricians', '', '2222015104444-'),
(117, 37, 'Plumbers', '', '2222015104512-'),
(118, 37, 'Mechanics', '', '2222015104559-'),
(119, 15, 'Batteries & Invertors', '', '2222015104828-'),
(120, 15, 'Generators', '', '2222015104854-'),
(121, 37, 'Courier Services', '', '222201511648-'),
(122, 37, 'Designer Packing', '', '2222015112724-'),
(123, 34, 'Car', '', '53201555030-'),
(124, 34, 'Bikes & Scooters', '', '53201555059-'),
(125, 34, 'Heavy Vehicles', '', '53201555132-'),
(126, 34, 'Utility', '', '53201555156-'),
(128, 23, 'Artificial', '', '12320155411-'),
(129, 23, 'Others', '', '12320155451-'),
(130, 25, 'Conferences & Seminars', '', '84201562716-'),
(131, 35, 'Yoga', '', '134201525122-'),
(132, 36, 'Vaastu', '', '2242015162540-'),
(133, 36, 'Astrology', '', '2242015162625-'),
(134, 35, 'Fitness Equipments', '', '2842015125852-'),
(135, 27, 'Pickles ', '', '25201554755-'),
(136, 27, 'Papad & Chips', '', '25201554839-'),
(137, 27, 'Spices', '', '25201554935-'),
(138, 53, 'Display & Glow Sign boards', '', '86201525118-'),
(139, 53, 'Hoardings ', '', '8620152521-'),
(140, 53, 'Newspaper Advertising', '', '86201525323-'),
(141, 21, 'Beauty Parlours', '', '862015335-'),
(142, 21, 'Body Shaping & Weight Loss', '', '862015346-'),
(143, 21, 'Hair Treatment Clinics', '', '8620153453-'),
(144, 21, 'Menz Saloonz', '', '8620153547-'),
(145, 21, 'Beauty Spas', '', '862015382-'),
(146, 21, 'Skin Care & Treatment', '', '8620153845-'),
(147, 43, 'Medicines', '', '86201532629-'),
(148, 43, 'Doctors', '', '86201532653-'),
(149, 43, 'Clinics', '', '86201532711-'),
(150, 54, 'Seeds & Manure', '', '86201533142-'),
(151, 54, 'Consultants', '', '8620153329-'),
(152, 54, 'Pest Control', '', '86201533233-'),
(153, 54, 'Tools & Equipments', '', '8620153338-'),
(154, 47, 'Personal Care', '', '86201534816-'),
(155, 47, 'Health & Fitness', '', '86201534839-'),
(156, 47, 'Fashion & Accessories', '', '86201534920-'),
(157, 47, 'Toys & Cradles', '', '86201534948-'),
(158, 42, 'Birthdays & Kitty Parties', '', '86201535826-'),
(159, 42, 'Ring Ceremony & Wedding Receptions', '', '862015402-'),
(160, 42, 'Banquet Halls & Gardens', '', '8620154038-'),
(161, 55, 'Hardware', '', '8620154920-'),
(162, 55, 'Software', '', '8620154945-'),
(163, 55, 'Repairs', '', '86201541014-'),
(164, 6, 'Engineering Institutes', '', '86201553336-'),
(165, 6, 'Medical Institutes', '', '8620155349-'),
(166, 6, 'Management Institutes', '', '8620155350-'),
(167, 10, 'Fast Food & Snacks', '', '8620155561-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(5) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0= admin , 1 = normal user',
  `mobile_no` varchar(25) NOT NULL,
  `city` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `firstName`, `lastName`, `username`, `password`, `email`, `status`, `mobile_no`, `city`, `address`, `photo`) VALUES
(1, 'Admin', 'admin', 'admin', 'admin', 'admin@gmail.com', '0', '', '', '', ''),
(2, 'sub admin', 'gg', 'subadmin', 'subadmin', 'subadmin@gmail.com', '0', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL,
  `user_type` int(1) NOT NULL DEFAULT '1',
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `business_name` varchar(200) NOT NULL,
  `business_type` varchar(200) NOT NULL DEFAULT '0',
  `solution` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `company` varchar(200) NOT NULL,
  `area_id` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `post_code` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Inactive',
  `main_category_id` int(11) NOT NULL,
  `sub_category_id` varchar(400) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `user_type`, `first_name`, `last_name`, `full_name`, `age`, `email`, `password`, `question_id`, `answer`, `photo`, `business_name`, `business_type`, `solution`, `address`, `contact_no`, `company`, `area_id`, `city`, `post_code`, `country`, `status`, `main_category_id`, `sub_category_id`, `created_on`) VALUES
(27, 1, 'amir', 'khan', 'Amir Khan', 20, 'abc@gmail.com', '123', 1, 'nissar', '23120158384-user.jpg', '', 'Self Employed', '', '', '988988888', '', 2, 2, 0, 1, 'Active', 0, '', '2015-01-24 07:48:05'),
(28, 2, 'salman', 'khan', 'Salman Khan', 30, 'seller@gmail.com', 'seller', 1, 'kk', '184201510451-images34.jpg', 'bbbbbbbbb', 'Job', 'bbbbbbbbbb', 'bbbbbb', '8308992045', 'bbbbbbbb', 2, 1, 23231, 1, 'Active', 0, '', '2015-01-24 07:48:09'),
(34, 2, 'abhinav', 'agarwal', 'Abhinav Agarwal', 0, 'abhinavabhi76@rediffmail.com', '123456', 1, 'ashok agarwal', '2142015104140-20150406_185656.jpg', 'hot bite', '0', '', 'civil lines', '9235565001', '', 0, 0, 123456, 0, 'Active', 0, '', '2015-01-27 16:24:42'),
(35, 2, 'abhinav', 'agarwal', 'Abhinav Agarwal', 0, 'abhinavabhi76@rediffmail.com', '123456', 1, 'ashok agarwal', '', 'hot bite', '0', '', 'civil lines', '9235565001', '', 0, 0, 123456, 0, 'Active', 0, '', '2015-01-27 16:27:15'),
(36, 1, 'avantika ', 'agarwal', 'Avantika  Agarwal', 35, 'abhinavabhi2603@gmail.com', '12345', 1, 'O.P.Agarwal', '2142015103914-20150406_185635.jpg', '', 'Housewife', '', '128 sadar bazar', '8090221150', '', 2, 66, 284001, 38, 'Active', 0, '', '2015-02-04 05:54:21'),
(37, 2, 'Manjree', 'Agrawal', 'Manjree Agrawal', 0, 'manjreeshiv@gmail.com', 'mummypapa1', 2, 'Usha', '213201554548-IMG_8013.JPG', 'Fashion +', '0', '', 'No 25/13, 5th Main Road\r\nR.A.Puram', '08056256705', '', 0, 4, 600028, 35, 'Active', 12, '29,', '2015-02-12 16:03:21'),
(38, 1, 'usha', 'agarwal', 'Usha Agarwal', 63, 'ushaagarwal@gmail.com', '8765352828', 3, 'usha', '', '', 'Housewife', '', 'M - 99, Sarandhara Nagar\r\nJhansi', '8765352828', '', 0, 66, 284135, 38, 'Inactive', 0, '', '2015-05-05 02:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `version`
--

CREATE TABLE IF NOT EXISTS `version` (
  `vid` int(11) NOT NULL,
  `version` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `version`
--

INSERT INTO `version` (`vid`, `version`, `description`) VALUES
(1, 'Latest', 'Latest'),
(2, 'Special', 'Special'),
(3, 'd', 'sfdg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `ads_history`
--
ALTER TABLE `ads_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_id` (`ads_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `api_management`
--
ALTER TABLE `api_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `buy_request`
--
ALTER TABLE `buy_request`
  ADD PRIMARY KEY (`brid`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `career_id` (`career_id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `cityupdate`
--
ALTER TABLE `cityupdate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `classifieds`
--
ALTER TABLE `classifieds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classified_id` (`classified_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `classified_type`
--
ALTER TABLE `classified_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `condolences`
--
ALTER TABLE `condolences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`cuid`);

--
-- Indexes for table `discount_vouchers`
--
ALTER TABLE `discount_vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vender_id` (`vender_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `log_sms`
--
ALTER TABLE `log_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_category`
--
ALTER TABLE `main_category`
  ADD PRIMARY KEY (`mcid`);

--
-- Indexes for table `marquee`
--
ALTER TABLE `marquee`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `sub_category_id` (`sub_category_id`,`version_id`),
  ADD KEY `version_id` (`version_id`),
  ADD KEY `user_id` (`user_id`,`main_category_id`),
  ADD KEY `main_category_id` (`main_category_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `product_history`
--
ALTER TABLE `product_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product_offers`
--
ALTER TABLE `product_offers`
  ADD PRIMARY KEY (`poid`),
  ADD KEY `offer_id` (`offer_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD KEY `career_id` (`career_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `request_category`
--
ALTER TABLE `request_category`
  ADD PRIMARY KEY (`rcid`);

--
-- Indexes for table `reserve_vouchers`
--
ALTER TABLE `reserve_vouchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`scid`),
  ADD KEY `main_category_id` (`main_category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `firstName` (`firstName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `location_area` (`area_id`),
  ADD KEY `location_area_2` (`area_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ads_history`
--
ALTER TABLE `ads_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `api_management`
--
ALTER TABLE `api_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `buy_request`
--
ALTER TABLE `buy_request`
  MODIFY `brid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=235;
--
-- AUTO_INCREMENT for table `cityupdate`
--
ALTER TABLE `cityupdate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `classifieds`
--
ALTER TABLE `classifieds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `classified_type`
--
ALTER TABLE `classified_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `condolences`
--
ALTER TABLE `condolences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `cuid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `discount_vouchers`
--
ALTER TABLE `discount_vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `log_sms`
--
ALTER TABLE `log_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `main_category`
--
ALTER TABLE `main_category`
  MODIFY `mcid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `marquee`
--
ALTER TABLE `marquee`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `product_history`
--
ALTER TABLE `product_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_offers`
--
ALTER TABLE `product_offers`
  MODIFY `poid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `request_category`
--
ALTER TABLE `request_category`
  MODIFY `rcid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reserve_vouchers`
--
ALTER TABLE `reserve_vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `scid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `version`
--
ALTER TABLE `version`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`scid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`main_category_id`) REFERENCES `main_category` (`mcid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_offers`
--
ALTER TABLE `product_offers`
  ADD CONSTRAINT `product_offers_ibfk_1` FOREIGN KEY (`offer_id`) REFERENCES `offer` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_offers_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qualification`
--
ALTER TABLE `qualification`
  ADD CONSTRAINT `qualification_ibfk_1` FOREIGN KEY (`career_id`) REFERENCES `career` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`main_category_id`) REFERENCES `main_category` (`mcid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
