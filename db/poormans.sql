-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2020 at 05:26 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poormans`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_request`
--

CREATE TABLE `client_request` (
  `id` double NOT NULL,
  `package_id` varchar(12) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `card` varchar(256) DEFAULT NULL,
  `disp_add` varchar(100) DEFAULT NULL,
  `name` mediumtext NOT NULL,
  `phone` longtext DEFAULT NULL,
  `fax` longtext DEFAULT NULL,
  `email` longtext DEFAULT NULL,
  `url` longtext DEFAULT NULL,
  `address` mediumtext DEFAULT NULL,
  `city` mediumtext DEFAULT NULL,
  `state` mediumtext DEFAULT NULL,
  `owner_name` varchar(60) DEFAULT NULL,
  `owner_num` varchar(30) DEFAULT NULL,
  `owner_zip` varchar(20) DEFAULT NULL,
  `owner_email` varchar(20) DEFAULT NULL,
  `is_featured` tinyint(4) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_request`
--

INSERT INTO `client_request` (`id`, `package_id`, `category_id`, `card`, `disp_add`, `name`, `phone`, `fax`, `email`, `url`, `address`, `city`, `state`, `owner_name`, `owner_num`, `owner_zip`, `owner_email`, `is_featured`, `is_active`, `created_on`) VALUES
(1, 'featured', 42, NULL, NULL, 'American Home Mortgage', NULL, NULL, NULL, NULL, '5565 Sterrett Place #126', 'Columbia', 'maryland', 'Unknown', 'Unknown', '21044', 'Unknown', 1, 1, '2016-11-27 17:16:28'),
(2, 'featured', 56, NULL, NULL, 'Gillette Global', NULL, NULL, NULL, NULL, '7436 Old Alexandria Ferry Rd, Clinton, Md, 20735', 'Clinton', 'arkansas', NULL, NULL, NULL, NULL, 1, 1, '2016-09-19 00:00:00'),
(3, 'featured', 1, NULL, NULL, 'Chasswood Resources', NULL, NULL, NULL, NULL, '7436 Old Alexandria Ferry Rd, Clinton, Md, 20735', 'Clinton', 'michigan', NULL, NULL, NULL, NULL, 1, 1, '2016-10-04 21:20:48'),
(4, 'featured', 19, NULL, NULL, 'Happy Feet', NULL, NULL, NULL, NULL, '', '', 'alabama', NULL, NULL, NULL, NULL, 1, 1, '2016-09-28 01:09:52'),
(5, 'featured', 19, NULL, NULL, 'Alabama Rockers', NULL, NULL, NULL, NULL, '', '', 'alabama', NULL, NULL, NULL, NULL, 1, 1, '2016-09-28 01:10:13'),
(6, 'featured', 51, NULL, NULL, 'The Rockers Club', NULL, NULL, NULL, NULL, 'Park Avenue - 2145', 'Parking Lot', 'arizona', NULL, NULL, NULL, NULL, 1, 1, '2016-09-29 00:37:38'),
(7, 'featured', 27, NULL, '201610191476889411Business-card-template-design.jpg', 'Google Enterprizes', NULL, NULL, NULL, NULL, '3325, something here as address ,Nevada', 'SomeCity', 'nevada', NULL, NULL, NULL, NULL, 1, 1, '2016-10-02 21:03:19'),
(8, 'featured', 51, NULL, NULL, 'Business Name', NULL, NULL, NULL, NULL, 'Some kind of address', 'somecity', 'arizona', NULL, NULL, NULL, NULL, 1, 1, '2016-10-05 22:24:57'),
(9, 'featured', 56, NULL, NULL, 'testing 1', NULL, NULL, NULL, NULL, 'testing 1', 'testing 1', 'american samoa', NULL, NULL, NULL, NULL, 1, 1, '2016-10-06 16:11:48'),
(10, 'freatured', 31, NULL, NULL, 'testing 2', NULL, NULL, NULL, NULL, 'testing 2', 'testing 2', 'alaska', NULL, NULL, NULL, NULL, 1, 1, '2016-10-06 16:21:08'),
(11, 'featured', 31, NULL, NULL, 'testing 3', NULL, NULL, NULL, NULL, 'asdfasdf', 'asdfasdf', 'alabama', NULL, NULL, NULL, NULL, 1, 1, '2016-10-06 17:02:36'),
(12, 'featured', 31, NULL, NULL, 'Woops Fashion House', NULL, NULL, NULL, NULL, '', '', 'alabama', NULL, NULL, NULL, NULL, 1, 1, '2016-10-06 18:57:15'),
(13, 'featured', 57, NULL, NULL, 'Rushlight Media', NULL, NULL, NULL, NULL, '', '', 'alabama', NULL, NULL, NULL, NULL, 1, 1, '2016-10-06 19:05:26'),
(14, 'featured', 19, NULL, NULL, 'Horizon International', NULL, NULL, NULL, NULL, 'Innsfill', 'Clinton', 'alaska', NULL, NULL, NULL, NULL, 1, 0, '2016-10-06 20:00:45'),
(15, 'premium', 19, NULL, NULL, 'Hello Testing', NULL, NULL, NULL, NULL, 'Somewhere', 'Somewhere', 'california', NULL, NULL, NULL, NULL, 0, 1, '2016-11-03 13:45:03'),
(16, 'basic', 19, NULL, NULL, 'Agiel movers', NULL, NULL, NULL, NULL, '1532', 'asdfasdf', 'alabama', 'unknown', 'unknown', '20020', 'unknown', 0, 1, '2016-11-07 21:51:40'),
(17, 'card', 1, NULL, NULL, 'Allentown Press', NULL, NULL, NULL, NULL, '6318 Old Branch Ave.', 'Campsprings', 'maryland', 'Michael Avrick', '301-449-7660', '20748', 'aprintcopy@aol.com', 0, 1, '2016-11-27 17:16:46'),
(18, '2', 28, NULL, NULL, 'Central Electronics & Music Warehouse', NULL, NULL, NULL, NULL, '62 Ritchie Rd.', 'Capital', 'maryland', 'Laron Young', 'unknown', '20743', 'unknown', 0, 1, '2016-11-12 21:28:36'),
(19, '1', 52, NULL, NULL, 'We Junk Haulers', NULL, NULL, NULL, NULL, '7434 Old Alexandria Ferry Road\r\n', 'clinton', 'maryland', 'M.C. Johnson', '234', '20735', 'wejunkhaulers@live.c', 0, 1, '2016-11-27 17:23:34'),
(20, 'featured', 16, NULL, '201611121478966290images.jpg', 'Tow 2 Tow Towing & Recovery', NULL, NULL, NULL, NULL, '4410 Suit Rd. Lot 10-A', 'Forestville, ', 'maryland', 'TYrone', '202-536-8660', '20772', 'manwithtruck47@gmail', 1, 1, '2016-11-27 17:13:11'),
(21, 'featured', 13, NULL, '20161128148035619210505330_425698534272537_6977541467584830763_n[1].jpg', 'Johnson Moving And Storage Co.', NULL, NULL, NULL, NULL, '7436 Old Alexandria Ferry Road', 'Clinton', 'maryland', 'M.C. Johnson', '301-301-0320', '20735', 'jms778@live.com     ', 1, 1, '2016-11-28 20:29:26'),
(22, 'featured', 52, NULL, NULL, 'Janus And Rubard', NULL, NULL, NULL, NULL, 'adsf', 'Campsprings', 'maryland', 'lkj ', 'l;k', '454', 'lk@ga.com', 1, 1, '2016-12-05 12:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `title` mediumtext NOT NULL,
  `subtitle` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `state` varchar(60) DEFAULT NULL,
  `phone` longtext DEFAULT NULL,
  `fax` longtext DEFAULT NULL,
  `email` longtext DEFAULT NULL,
  `url` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `title`, `subtitle`, `description`, `latitude`, `longitude`, `address`, `city`, `state`, `phone`, `fax`, `email`, `url`) VALUES
(1, 'Contact', 'Please do not hesitate to contact us for any queries.', '<p>Drop your queries below and someone from our marketing division will contact you shortly.&nbsp;</p>\r\n\r\n<p>Thank You</p>\r\n', NULL, '', '', 'Clinton', 'Maryland', '', '', 'poormansonlinedirectory@live.com', '20735');

-- --------------------------------------------------------

--
-- Table structure for table `directory`
--

CREATE TABLE `directory` (
  `id` int(11) NOT NULL,
  `payment` longtext DEFAULT NULL,
  `signup_code` varchar(200) DEFAULT NULL,
  `grand_total` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `package` varchar(12) NOT NULL,
  `category_id` longtext DEFAULT '0',
  `card` varchar(80) DEFAULT NULL,
  `disp_add` varchar(80) DEFAULT NULL,
  `coupon` varchar(80) DEFAULT NULL,
  `name` mediumtext NOT NULL,
  `phone` longtext DEFAULT NULL,
  `fax` longtext DEFAULT NULL,
  `email` longtext DEFAULT NULL,
  `url` longtext DEFAULT NULL,
  `address` mediumtext DEFAULT NULL,
  `zip` varchar(48) DEFAULT NULL,
  `city` mediumtext DEFAULT NULL,
  `state` mediumtext DEFAULT NULL,
  `tags` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `owner_name` mediumtext DEFAULT NULL,
  `owner_num` mediumtext DEFAULT NULL,
  `owner_zip` mediumtext DEFAULT NULL,
  `owner_email` mediumtext DEFAULT NULL,
  `del_address` longtext NOT NULL,
  `is_featured` tinyint(4) NOT NULL DEFAULT 0,
  `featured_index` int(20) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `extended_till` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directory`
--

INSERT INTO `directory` (`id`, `payment`, `signup_code`, `grand_total`, `user_id`, `package`, `category_id`, `card`, `disp_add`, `coupon`, `name`, `phone`, `fax`, `email`, `url`, `address`, `zip`, `city`, `state`, `tags`, `description`, `owner_name`, `owner_num`, `owner_zip`, `owner_email`, `del_address`, `is_featured`, `featured_index`, `is_active`, `created_on`, `extended_till`) VALUES
(4, NULL, NULL, 0, 0, 'featured', '73', '201701311485831281CENTRAL.jpg', '', NULL, 'Central Electronics & Music Warehouse', '[\"301-336-8589\"]', '[\"\"]', '[\"laron@centralmusicwarehouse.com\"]', '[\"https:\\/\\/www.centralmusicwarehouse.com\"]', '62 Ritchie Road', '20743', 'Capital Height', 'maryland', '[\"Drums\",\"                 Keyboard\",\"                 music equipment rentals\"]', '<p>We help create and sustan the universal language of Music</p>\r\n', 'Laron Young', 'Laron Young', '20743', 'laron@centralmusicwarehouse.com', '', 1, 3, 1, '2016-09-28 01:09:52', '2022-04-24 00:00:00'),
(20, NULL, NULL, 0, 0, 'featured', '64', '201701311485835551TOW.jpg', '201610191476889428UshaSoftTech.jpg', NULL, 'Tow 2 Tow Towing & Recovery', '[\"202-536-8660\"]', '', '[\"manwithtruck@gmail.com\"]', '', '4110 Suit rd. Lot 10 A', '20772', 'Forestville', 'maryland', '[\"towing\",\"   recovery\"]', '', 'Tyrone', '202-536-8660', '20772', 'manwithtruck47@gmail.com', '', 1, 6, 1, '2016-11-27 17:13:11', '2022-04-24 00:00:00'),
(21, NULL, NULL, 0, 0, 'featured', '63', '201702041486159031jms.jpg', '', NULL, 'Johnson Moving And Storage Co.', '[\"301-868-0320\"]', '[\"301-868-2637\"]', '[\"jms778@live.com\"]', '[\"https:\\/\\/www.johnsonmovers.net\"]', '7436 Old Alexandria Ferry Road', '20735', 'Clinton', 'maryland', '[\"moving\",\"    storage\",\"    packing\",\"    crating\"]', '<p>Whether it involves moving in or out of an apartment, office, residential, or commercial space; whether it will take a short or long distance move; Johnson Moving &amp; Storage Company can effectively assist you. We provide complete and affordable relocation services in the Washington D.C. area, including Maryland (MD) and Virginia (VA). Call or email our movers and get a service quotation today.</p>\r\n', 'Curtis Johnson', '301-894-4215', '20745', 'mcj614@hotmail.com', '', 1, 8, 1, '2016-11-28 20:29:26', '2022-04-24 00:00:00'),
(44, NULL, NULL, 0, 0, 'premium', '67', '', '', NULL, 'Advance Records International', '[\"301-868-2794\"]', '[\"301-868-2637\"]', '[\"advance-records1@hotmail.com\"]', '', '119 Johnson Dr', '20735', 'Clinton', 'maryland', '[\"mark\",\"     skate\",\"     pen\",\"     chest\"]', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.&nbsp;</p>\r\n\r\n<p>It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>\r\n', 'M.C. Johnson Enterprises', '301-894-4215', '20735', 'mcj614@hotmail.com', '', 0, NULL, 1, '2016-12-28 15:08:01', '2022-04-24 00:00:00'),
(45, NULL, NULL, 0, 0, 'premium', '63', '', '201703021488394568dc.jpg', NULL, 'Johnson Moving And Storage Co.', '[\"202-329-5995\"]', '', '[\"jms778dc@outlook.com\"]', '[\"https:\\/\\/www.Johnsonmovingandstorage.com\"]', '1532 Fort Davis Street S.E.', '20020', 'Washington', 'district of columbia', '[\"Moving and storage\",\"     packing and crating\",\"     movers\",\"     moving\",\"     hauling\",\"     trucking\",\"     packers\",\"     shipping\"]', '<p>We practice the most advanced techniques and provide the most experienced moving crews in the business. All at competitive rates! We offer moving services for diverse range-including general office furniture, libraries, file rooms, computer equipment, electronics and machinery.</p>\r\n', 'M.C. Johnson Enterprises', '301-894-4215', '20745', 'mcj614@hotmail.com', '', 0, NULL, 1, '2016-12-28 15:12:22', '2022-04-24 00:00:00'),
(46, NULL, NULL, 0, 0, 'premium', '80', '', '', NULL, 'All Piano Tuner', '[\"301-894-4215\"]', '', '[\"allpianotuner@outlook.com\"]', '[\"http:\\/\\/www.allpianotuner.com\"]', '7434 Old Alexandria Ferry Road', '20735', 'Clinton', 'maryland', '[\"piano tuning\"]', '<p>All Piano Tuner was established in late 1995 in a beautiful city of Clinton, Maryland. We consider ourselves very fortunate to have trained in some of the largest workshops in USA at that time, and our time there provided us the opportunity to gain experience working on different varieties of pianos. This included overhauling and refurbishing old and middle-aged pianos, both high quality European grands and uprights, as well as tuning and servicing new instruments.</p>\r\n', 'M.C. Johnson Enterprises', '301-894-4215', '20745', 'mcj614@hotmail.com', '', 0, NULL, 1, '2016-12-28 15:14:01', '2022-04-24 00:00:00'),
(48, NULL, NULL, 0, 0, 'premium', '80', '', '', NULL, 'College Student Summer Storage', '[\"1888-379-6683\",\"546 456 456\",\"788 123 789\"]', '[\"301-868-2637\",\"946 681 351 6545\",\"984 632 6565\"]', '[\"collegestudentsummerstorage@gmail.com\"]', '[\"http:\\/\\/www.collegestudentsummerstorage.com\"]', '7434 old Alexandria ferry road', '20735', 'clinton', 'maryland', '[\"storage\",\"  summer storage\",\"  student storage\",\"  college student summer storage\"]', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.&nbsp;</p>\r\n\r\n<p>It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>\r\n', 'M.C. Johnson Enterprises', '301-894-4215', '20745', 'mcj614@hotmail.com', '', 0, NULL, 1, '2016-12-28 16:11:00', '2022-04-24 00:00:00'),
(61, NULL, NULL, 0, 0, 'featured', '79', '201702011485958802DEE_1442860284[1].jpg', '201701111484119485Glacier_on_Antarctic_coast_mountain_behind.jpg', NULL, 'Exit Landmark Realty', '[\"301-850-6700x228\"]', '[\"301-684-5527\"]', '[\"deebarino@mris.com\"]', '[\"https:\\/\\/www.teamdmvhomespros.com\"]', '8200 Schultz Road', '20735', 'Clinton', 'maryland', '[\"Realtor\"]', '<h2 style=\"font-style: italic;\"><strong>Team Leader</strong></h2>\r\n', 'Dee Barino', '301-535-9073', '20735', 'deebarino@mris.com', '', 1, 9, 1, '2017-01-11 13:09:45', '2022-04-24 00:00:00'),
(63, NULL, NULL, 0, 0, 'featured', '93', '201702021486011260GS.jpg', '', NULL, 'G\'s Locksmith Service', '[\"301-801-1870\"]', '[\"None\"]', '[\"gthelocksmith@yahoo.com\"]', '[\"None\"]', 'Unknown', '20735', 'Clinton', 'maryland', '[\"locksmith\",\"      lockout\"]', '<p>24/7 lockout service</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'G Thomas', '301-801-1870', '20735', 'gthelocksmith@yahoo.com', '', 1, 7, 1, '2017-01-11 13:28:09', '2022-04-24 00:00:00'),
(64, NULL, NULL, 0, 0, 'featured', '92', '201701311485864142KIM.jpg', '201701111484120596Glacier_on_Antarctic_coast_mountain_behind.jpg', NULL, 'American Home Mortgage', '[\"800-462-5881\",\"Cell -433-794-6070\"]', '[\"866-501-3885\"]', '[\"kimberly.smrek@americanhm.com\"]', '[\"https:\\/\\/www.americanhm.com\\/\\/kimberly.smrek\"]', '5565 Sterrett Place #126', '21044', 'Columbia', 'maryland', '[\"money\",\"          loans\",\"          mortgage\"]', '<p>Licensed Mortgag Banker or Authorized Lender in the Fifty States and the District of Columbia NY SE Listing Symbol -AHM</p>\r\n', 'kimberly A. Smrek', '410-964-0077x225', '21044', 'kimberly.smrek@americanhm.com', '', 1, 2, 1, '2017-01-11 13:28:16', '2022-04-24 00:00:00'),
(65, NULL, NULL, 0, 0, 'featured', '94', '201702041486166645201702041486159308wayne[1].jpg', '20170111148412064579056.jpg', NULL, 'The Gadget Guys', '[\"240-493-6828\"]', '[\"None\"]', '[\"gadgetguys2@yahoo..com\"]', '[\"https:\\/\\/www.gogogadgetguys.com\"]', '9400 Livingston Road. Suite 100', '20744', 'Ft. Washington ', 'maryland', '[\"computer Repair Service\"]', '<p>computer Repair Service</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Wayne Murphy ', '240-493-6828', '20744', 'gadgetguys2@yahoo..com', '', 1, 11, 1, '2017-01-11 13:29:05', '2022-04-24 00:00:00'),
(96, NULL, NULL, 0, 0, 'card', '68', '20170220148754572316806995_10208038043404939_3900779138951581891_n.jpg', '2017011114841223937595705826_9605c9b16a_o.jpg', NULL, 'Curtis Johnson, singer, writer, producer, band leader.', '[\"301-894-4215\"]', '[\"301-868-2637\",\"654 698 9684\",\"946 681 351 6545\",\"984 632 6565\"]', '[\"mcj614@hotmail.com\",\"expdepot@indosat.net.id\",\"info@houseofbali.com\"]', '[\"https:\\/\\/www.shopify.com\\/\",\"https:\\/\\/www.hello.com\\/\",\"https:\\/\\/www.google.com\\/\"]', '2005 ', '20745', 'Oxon hill', 'maryland', '[\"moving\",\"   storage\",\"   movers\",\"   truck\"]', '<p>Keyboardist Curtis Johnson is probably most known for two bands that he has played with over the past decades.&nbsp; The Soul Searchers and Eternity.&nbsp; But as one of the people who were there from the beginning and have seen shift changes through the years, his story is a walk that only few people these days can tell.</p>\r\n', 'Curtis Johnson', '301-894-4215', '20745', 'mcj614@hotmail.com', '', 0, NULL, 1, '2017-01-11 13:58:13', '2022-04-24 00:00:00'),
(99, NULL, NULL, 0, 0, 'card', '41', '201701111484122552e8e9e23ebdb0c46a271986078d28d798.jpg', '20170111148412255279056.jpg', NULL, 'Mc Squared', '[\"587 412 365\" , \"254 863 218\" , \"985 021 453\" , \"968 156 967\"]', '[\"152 784 9648\" ,\"277 681 351 6545\", \"654 698 9684\"   , \"345 632 6565\"]', '[\"dos@novotelbali.com\" , \"expdepot@indosat.net.id\" , \"info@houseofbali.com\"]', '[\"https://www.petersberg.com/\" , \"https://www.manylinks.com/\"]', '6318 Old Branch Ave.', '25401', 'Dallas', 'maryland', '[\"mark\", \"skate\", \"pen\", \"chest\"]', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.&nbsp;</p><p>It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>', 'Ila Ampelios Barone', '25456548', '300', 'ramko@cheese.com', '', 0, NULL, 1, '2017-01-11 14:00:52', '2022-04-24 00:00:00'),
(100, NULL, NULL, 0, 0, 'card', '110', '201704041491276012201704041491244887allpianotuner%20%20BC[1].jpg', '', NULL, 'All Piano Tuner', '[\"301-894-4215\"]', '', '[\"allpianotuner@outlook.com\"]', '[\"https:\\/\\/www.allpianotuner.com\"]', '8787 Old Branch Ave. #8', '20735', 'Clinton', 'maryland', '[\"Piano\",\"  piano tuning\",\"  piano repair\",\"  piano service\"]', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Curtis Johnson', '301-894-4215', '20745', 'mcj614@hotmail.com', '', 0, NULL, 1, '2017-01-11 14:00:59', '2022-04-24 00:00:00'),
(102, NULL, NULL, 0, 0, 'card', '63', '201701281485611387JOHN.jpg', '201701131484306235visiting-card-2 .jpg', '201701131484306235visiting-card-5.jpg', 'Johnson Moving And Storage Co.', '[\"301-868-0320\"]', '[\"301-868-2637\"]', '[\"jms778@live.com\"]', '[\"https:\\/\\/www.johnsonmovers.net\"]', '7436 Old Alexandria Ferry Road', '20735', 'Clinton', 'maryland', '[\"moving\",\"  movers\"]', '', 'M.C. Johnson', '301-894-4215', '20745', 'mcj614@hotmail.com', '', 0, NULL, 1, '2017-01-13 17:02:15', '2022-04-24 00:00:00'),
(103, NULL, NULL, 0, 0, 'premium', '80', NULL, '2017012714855371751901808_881426378563932_343348559246429844_n.jpg', '20170127148553763111027939_1623858981168777_5234268366430885503_n.jpg', 'Curtis Johnsn And The Band Eternity', '[\"301-894-4215\"]', '[\"301-868-2637\"]', '[\"eternitybandbooking@live.com\"]', '[\"https:\\/\\/www.thebandeternity.com\"]', '2005 Kirklin Drive', '20745', 'Oxon Hill', 'maryland', '[\"music\",\" bands\",\" show\",\" party\",\" sound\",\" gigs\",\" musicians\"]', '<p>Weddings &bull; Private Parties &bull; Office Parties &bull; Company Picnics &bull; Conventions &bull; Grand Openings &bull; Cabarets &bull; Nightclubs Reunions &bull; Retreats &bull; Craft Shows &bull; Festivals &bull; Sales Promotions &bull; Civic/Town Functions &bull; or Any Occasion</p>\r\n', 'Curtis Johnson', '301-894-4215', '20745', 'mcj614@hotmail.com', '', 0, NULL, 1, '2017-01-15 22:37:12', '2022-04-24 00:00:00'),
(104, NULL, NULL, 0, 0, 'premium', '63', NULL, '201701271485535986AD.jpg', '201701271485535931cc.jpg', 'testy', '', '[\"301-868-2637\"]', '[\"jms778@live.com\"]', '[\"http:\\/\\/www.johnsonmovers.net\\/\"]', '7436 Old Alexandria Ferry Road', '20735', 'Clinton', 'maryland', '[\"moving\",\"        movers\",\"        packing\",\"        crating\"]', '<p>Meet your friendly and efficient moving partner for life. <strong>Johnson Moving &amp; Storage Company</strong> is your premier source for expert relocation assistance in Maryland, Virginia, and the Washington D.C. region. From residential to commercial moving services, our trained, unformed, and experienced team can effectively carry out a smooth and well-coordinated move for you, regardless of the destination. Whether you need full-service VA movers for your office or affordable MD movers for your new home in another state, you can always call on Johnson Moving &amp; Storage Company for consistently reliable service.</p>\r\n', 'M.C. Johnson Enterprises', '301-894-4215', '20745', 'mcj614@hotmail.com', '', 0, NULL, 1, '2017-01-15 22:44:40', '2022-04-24 00:00:00'),
(105, NULL, NULL, 0, 0, 'basic', '80', NULL, NULL, NULL, 'DATLU corporation', '[\"587 412 365\",\"254 863 218\",\"985 021 453\",\"968 156 967\"]', '[\"152 784 9648\" ,\"277 681 351 6545\", \"654 698 9684\"   , \"345 632 6565\"]', '[\"stone@meekness.com\" , \"jabeduseff@yopmail.com\" , \"achatv@cbn.net.id\" , \"central@rahotel.com\"]', '[\"https://www.petersberg.com/\" , \"https://www.manylinks.com/\"]', '6318 Old Branch Ave.', '25400', 'Dallas', 'arizona', '[\"mark\",\"   skate\",\"   pen\",\"   chest\"]', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.&nbsp;</p>\r\n\r\n<p>It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>\r\n', 'Ila Ampelios Barone', '25456549', '301', 'ramko@cheese.com', '', 0, NULL, 1, '2017-01-23 10:05:43', '2022-04-24 00:00:00'),
(107, NULL, NULL, 0, 0, 'featured', '63', '201701291485627340we hunk 1.jpg', NULL, NULL, 'We junk hauler', '', '', '', '', '7434 Old Alexandria ferry road', '20735', 'Clinton', 'maryland', NULL, '', 'Curtis Johnson', '301-894-4215', '20745', 'mcj614@hotmail.com', '', 1, 12, 1, '2017-01-29 00:00:40', '2022-04-24 00:00:00'),
(108, NULL, NULL, 0, 0, 'featured', '70', '201701291485706264THUMP.jpg', NULL, NULL, 'Thump Studio', '[\"301-420-0016\"]', '', '', '', 'cryden way\r\n', '20747', 'Forestville', 'maryland', '[\"music\",\" recording\"]', '', 'Charlie Finwick', '301-420-0016', '20735', 'unknown', '', 1, 10, 1, '2017-01-29 21:56:04', '2022-04-24 00:00:00'),
(109, NULL, NULL, 0, 0, 'premium', '80', NULL, '201702041486161597wayne.jpg', NULL, 'The Gadget Guys', '[\"240-493-6828\"]', '[\"none\"]', '[\"gadgetguys2@yahoo.com\"]', '[\"http:\\/\\/www.gogogadgetguys.com\"]', '9400 Livingston Road', '20744', 'Ft. Washington ', 'maryland', '[\"computer sales\",\"      computer repair\"]', '<p>We are a computer and smart phone repair company. We are a community based small business located near the Washington National Harbor. We are looking for individuals to train that are new to the IT Career field, that need training to become a great technician.</p>\r\n', 'Wayne Murphy ', '240-493-6828', '20744', 'gadgetguys2@yahoo.com', '', 0, NULL, 1, '2017-01-30 00:57:21', '2022-04-24 00:00:00'),
(114, NULL, NULL, 0, 0, 'card', '90', '201702041486156495wayne.jpg', NULL, NULL, 'The Gadget Guys', '[\"240-493-6828\"]', '[\"None\"]', '[\"gadgetguys2@yahoo.com\"]', '[\"http:\\/\\/www.gogogadgetguys.com\"]', '9400 Livingston Road Suite 100A\r\n', '20744', 'Fort Washington', 'maryland', '[\"Computer sales\",\" Computer service\"]', '<p>Coumputer Repair Service</p>\r\n', 'Wayne Murphy', '240-337-0229', '20744', 'gadgetguys2@yahoo.com', '', 0, NULL, 1, '2017-02-04 02:57:36', '2022-04-24 00:00:00'),
(115, NULL, NULL, 0, 0, 'premium', '79', NULL, '201702041486162329TRISATE.jpg', NULL, 'Tristate Metropolitan Realtor', '[\"301-395-3769\"]', '', '[\"tristate2009@live.com\"]', '[\"http:\\/\\/www.tristatemetropolitanrealtors.com\"]', '7488 Old Alexandria Ferry Road', '20735', 'Clinton', 'maryland', '[\"Selling Homes\",\" Buying Homes\"]', '', 'M.C.Johnson', '301-395-3769', '20735', 'mcj614@hotmail.com', '', 0, NULL, 1, '2017-02-04 04:37:09', '2022-04-24 00:00:00'),
(119, NULL, NULL, 0, 0, 'premium', '53', NULL, '201702131487000605MIKE.jpg', '201702131487000606MIKE.jpg', 'Allentown Press', '[\"301-449-7660\"]', '', '[\"aprintcopy@aol.com\"]', '[\"http:\\/\\/www.allentownpress.com\"]', '6306', '20748', 'campspring', 'maryland', NULL, '', 'mike', '301-443-7660', '20748', 'aprintcopy@aol.com', '', 0, NULL, 1, '2017-02-13 21:28:25', '2022-04-24 00:00:00'),
(127, NULL, NULL, 0, 0, 'featured', '53', '201703201490017749MIKE.jpg', NULL, NULL, 'Allentown Press', '[\"301-449-7660\"]', '[\"301-449-1013\"]', '[\"aprintcopy@aol.com\"]', '[\"https:\\/\\/www.allentownpress.com\"]', '6318 Old Branch Ave', '20748', 'Campsprings', 'maryland', '[\"printing\"]', '', 'Micheal Avrick', '301-449-7660', '20748', 'aprintcopy@aol.com', '', 1, 13, 1, '2017-02-17 06:11:37', '2022-04-24 00:00:00'),
(128, NULL, NULL, 0, 0, 'featured', '69', '201703201490018331ETERNITY.jpg', NULL, NULL, 'Curtis Johnson and the band Eternity', '[\"301-894-4215\"]', '[\"301-868-2637\"]', '[\"eternitybandbooking@live.com\"]', '[\"http:\\/\\/www.thebandeternity.com\"]', '2005 kirklin drive', '20745', 'Oxon Hill', 'maryland', '[\"Music\",\"     singer\",\"     Musician\"]', '<p>All you need to is bring the party</p>\r\n', 'Curtis Johnson', '301-894-4215', '20745', 'mcj614@hotmail.com', '', 1, 14, 1, '2017-02-17 21:29:56', '2022-04-24 00:00:00'),
(130, NULL, NULL, 0, 0, 'featured', '101', '201704041491244887allpianotuner  BC.jpg', NULL, NULL, 'All Piano Tuner', '[\"301-894-4215\"]', '', '[\"allpianotuner@outlook.com\"]', '[\"http:\\/\\/www.allpianotuner.com\"]', '7434 Old Alexandria Ferry Road', '20735', 'Clinton', 'maryland', '[\"Piano and Organ\",\"    piano\",\"    music\"]', '<p>All Piano Tuner was established in late 1995 in a beautiful city of Clinton, Maryland. We consider ourselves very fortunate to have trained in some of the largest workshops in USA at that time, and our time there provided us the opportunity to gain experience working on different varieties of pianos. This included overhauling and refurbishing old and middle-aged pianos, both high quality European grands and uprights, as well as tuning and servicing new instruments.</p>\r\n', 'M.C. Johnson Enterprises', '301-894-4215', '20735', 'mcj614@hotmail.com', '', 1, 15, 1, '2017-03-01 23:54:40', '2022-04-24 00:00:00'),
(131, NULL, NULL, 0, 0, 'featured', '102', '201703201490018624Parcel Plus.jpg', NULL, NULL, 'Parcel Plus', '[\"301-856-2805\"]', '[\"301-856-0655\"]', '[\"parcelplusclinton@yahoo.com\"]', '[\"http:\\/\\/www.parcelplusclinton.com\"]', '8787 Brach Ave', '20735', 'Clinton', 'maryland', '[\"Mailing\",\"    parcel\"]', '', 'Amrik Nagi', 'unknown', '20735', 'unknown', '', 1, 16, 1, '2017-03-03 01:14:33', '2022-04-24 00:00:00'),
(132, NULL, NULL, 0, 0, 'featured', '105', '201703231490281357Ezekwu Ethelbert.jpg', NULL, NULL, 'Barnabas Pharmacy', '[\"301-456-2471\"]', '[\"301-456-2473\"]', '', '[\"http:\\/\\/www.stbarnabaspharmacy.com\"]', '4311 St. Barnabas Road', '20748', 'Temple Hill', 'maryland', '[\"Pharmacy\",\"  Medical\"]', '', 'Ezekwu Ethelbert', '301-456-2471', '20748', 'Unknown', '', 1, 17, 1, '2017-03-23 20:47:37', '2022-04-24 00:00:00'),
(133, NULL, NULL, 0, 0, 'featured', '78', '201801171516126778CCS2.jpg', NULL, NULL, 'Crystal Cleaning Solutions', '[\"202-294-7304\"]', '', '[\"crystalecleaningsol@gmail.com\"]', '[\"http:\\/\\/www.crystalcleaningsolutions.com\"]', 'unknown', 'unknown', 'unknown', 'maryland', NULL, '<p>Commercial and Residental Cleaning Service</p>\r\n', 'Shavon Bratton', '202-294-7304', 'unknown', 'crystalecleaningsol@gmail.com', '', 1, 1, 1, '2018-01-17 00:04:38', '2022-04-24 00:00:00'),
(134, NULL, NULL, 0, 0, 'card', NULL, '201904231556005801rock26.jpg', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', 'Joseph Quinn', '146', '39778', 'nafig@pyji.com', '', 0, NULL, 1, '2019-04-23 13:34:45', '2020-01-25 00:00:00'),
(135, NULL, NULL, 0, 0, 'featured', '19', '201904231556006032rock25.jpg', NULL, NULL, 'Cain Todd', '[\"+694-18-4902470\"]', '[\"+167-16-7953554\"]', '[\"qyfe@cahiwoqu.com\"]', '[\"http:\\/\\/hotmail.com\"]', 'Accusantium mollitia', '59276', 'Ut error enim volupt', 'pennsylvania', '[\"Dolore deserunt eius\"]', '<p>asda</p>\r\n', 'Richard Mcdowell', '43', '89984', 'vocyqyx@kypetinebite.com', '', 1, 4, 1, '2019-04-23 13:38:52', '2022-04-24 00:00:00'),
(136, NULL, NULL, 0, 0, 'featured', '100', '201904241556091993110060.jpg', NULL, NULL, 'Clio Jenkins', '[\"+778-45-9864928\"]', '[\"+264-16-6624627\"]', '[\"jihahizori@jugip.com\"]', '[\"http:\\/\\/hotmail.com\"]', 'Nulla deserunt tempo', '65314', 'Ut laboris occaecat ', 'illinois', '[\"Sint eum illo fugiat\"]', '<p>TEST</p>\r\n', 'Rogan Moran', '15', '64927', 'wocihog@vydys.com', '', 1, 5, 1, '2019-04-24 13:31:33', '2022-04-24 00:00:00'),
(137, NULL, NULL, 0, 0, 'basic', '80', NULL, NULL, NULL, 'HELLO HELLO corporation', '[\"587 412 365\",\"254 863 218\",\"985 021 453\",\"968 156 967\"]', '[\"152 784 9648\" ,\"277 681 351 6545\", \"654 698 9684\"   , \"345 632 6565\"]', '[\"stone@meekness.com\" , \"jabeduseff@yopmail.com\" , \"achatv@cbn.net.id\" , \"central@rahotel.com\"]', '[\"https://www.petersberg.com/\" , \"https://www.manylinks.com/\"]', '6318 Old Branch Ave.', '25400', 'Dallas', 'arizona', '[\"mark\",\"   skate\",\"   pen\",\"   chest\"]', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.&nbsp;</p>\r\n\r\n<p>It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>\r\n', 'Ila Ampelios Barone', '25456549', '301', 'ramko@cheese.com', '', 0, NULL, 1, '2017-01-23 10:05:43', '2022-04-24 00:00:00'),
(138, NULL, NULL, 0, 0, '', '0', NULL, NULL, NULL, '', NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-01-24 10:31:45', NULL),
(139, NULL, NULL, 0, 0, '', '0', NULL, NULL, NULL, '', NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-01-24 10:37:39', NULL),
(140, NULL, NULL, 0, 0, 'Basic', NULL, NULL, NULL, NULL, 'dieter kane', NULL, NULL, '', '', 'Dolor placeat nulla', '98781', 'Labore consequatur t', 'alaska', '', '', 'Neil Donovan', '', '49863', 'myroxeqec@mailinator.net', '', 0, NULL, 0, '2020-01-24 11:21:20', '2021-01-24 00:00:00'),
(141, NULL, NULL, 0, 0, 'Basic', NULL, NULL, NULL, NULL, 'test', NULL, NULL, '', '', 'test', '43978', 'test', 'florida', '', '<p>testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p>', 'test', '', '30701', 'qanux@mailinator.net', '', 0, NULL, 0, '2020-01-24 14:25:05', '2021-01-24 00:00:00'),
(142, NULL, NULL, 0, 0, 'Basic', NULL, NULL, NULL, NULL, 'test', '+1 (856) 968-3717', NULL, '', '', 'test', '43978', 'test', 'florida', '', '<p>testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p>', 'test', '+1 (157) 882-6908', '30701', 'qanux@mailinator.net', '', 0, NULL, 0, '2020-01-24 14:26:39', '2021-01-24 00:00:00'),
(143, NULL, NULL, 0, 0, 'Premium', NULL, NULL, NULL, NULL, 'rana may', '+1 (391) 789-1622', '+1 (172) 813-5749', 'cizel@mailinator.com', 'rerum ut dolorem off', 'Necessitatibus est a', '65444', 'Illo enim quas non t', 'mississippi', '', '<p>asdf</p>', 'Lucy Sweet', '+1 (321) 338-8339', '27394', 'horepul@mailinator.net', '', 0, NULL, 0, '2020-01-24 14:29:26', '2021-01-24 00:00:00'),
(144, NULL, NULL, 0, 0, 'Basic', NULL, NULL, NULL, NULL, 'kane hensley', '+1 (142) 143-7707', '', '', '', 'Irure sit voluptate', '99037', 'Id recusandae Mini', 'colorado', '', '', 'Arden Marks', '+1 (205) 429-6339', '12489', 'jama@mailinator.com', '', 0, NULL, 0, '2020-01-24 14:49:51', '2021-01-24 00:00:00'),
(145, NULL, NULL, 0, 0, 'Basic', NULL, NULL, NULL, NULL, 'kane hensley', '+1 (142) 143-7707', '', '', '', 'Irure sit voluptate', '99037', 'Id recusandae Mini', 'colorado', '', '', 'Arden Marks', '+1 (205) 429-6339', '12489', 'jama@mailinator.com', '', 0, NULL, 0, '2020-01-24 14:50:46', '2021-01-24 00:00:00'),
(146, NULL, NULL, 0, 0, 'Basic', '31', NULL, NULL, NULL, 'kelly meyers', '+1 (406) 503-6336', '', '', '', 'Repudiandae dolor se', '87008', 'Lorem deleniti sit ', 'texas', '', '', 'Yetta Roth', '+1 (927) 417-2224', '68967', 'pocavy@mailinator.net', '', 0, NULL, 0, '2020-01-24 14:53:05', '2021-01-24 00:00:00'),
(147, NULL, NULL, 0, 0, 'Premium', '80', NULL, NULL, NULL, 'ferris nicholson', '+1 (361) 137-5733', '+1 (774) 475-8824', 'hycesa@mailinator.com', 'do est corporis aut', 'Optio quisquam aute', '53700', 'Ea sit do sed corpo', 'new mexico', '', '<p>adfdsf</p>', 'Arsenio William', '+1 (352) 995-4756', '80774', 'tyqejace@mailinator.com', '', 0, NULL, 1, '2020-01-24 14:56:38', '2021-01-24 00:00:00'),
(148, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1579857098do.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-01-24 14:56:38', NULL),
(149, NULL, NULL, 0, 0, 'Premium', NULL, NULL, NULL, '1579857134do.jpg', 'leandra koch', '+1 (477) 832-9743', '+1 (882) 835-5554', 'gehu@mailinator.com', 'modi esse aspernatu', 'Totam molestiae dese', '36431', 'Deserunt culpa excep', 'new jersey', '', '', 'Kamal Kelly', '+1 (792) 327-4331', '78878', 'quwatufa@mailinator.com', '', 0, NULL, 0, '2020-01-24 14:57:14', '2021-01-24 00:00:00'),
(150, NULL, NULL, 0, 0, 'Premium', '59', NULL, NULL, '1579857202do.jpg', 'mechelle hill', '+1 (179) 569-9823,123', '+1 (939) 297-5587', 'woxavo@mailinator.net', 'non nisi rerum reici', 'Ut cupidatat tempora', '60926', 'Nostrud dolorum cum ', 'tennessee', '', '<p>asdasd</p>', 'Prescott Griffin', '+1 (414) 805-2823', '30289', 'gaqazefev@mailinator.com', '', 0, NULL, 1, '2020-01-24 14:58:22', '2021-01-24 00:00:00'),
(151, NULL, NULL, 0, 0, 'premium', '58', NULL, '1579857698do.jpg', NULL, 'Sonya Clark', '[\"+1 (284) 873-5355\"]', '[\"+1 (731) 613-7804\"]', '[\"jiledo@mailinator.com\"]', '[\"https:\\/\\/a.com\"]', 'Qui irure quibusdam ', '74363', 'Sit dolore deleniti', 'new york', '[\"Exercitationem earum\"]', '', 'Alan Salas', '164', '48683', 'byqet@mailinator.net', '', 0, NULL, 1, '2020-01-24 15:06:38', '2021-01-24 00:00:00'),
(152, NULL, NULL, 0, 0, 'Premium', '19', NULL, NULL, '157985782544.jpg', 'keely madden', '+1 (415) 973-1179', '+1 (938) 594-7347', 'rynyluq@mailinator.net', 'magna esse provident', 'Quibusdam rerum dolo', '83219', 'Excepturi in veritat', 'ohio', '', '', 'Lillith Green', '+1 (527) 163-9418', '99513', 'wuhaqunoji@mailinator.net', '', 0, NULL, 0, '2020-01-24 15:08:45', '2021-01-24 00:00:00'),
(153, NULL, NULL, 0, 0, 'Premium', NULL, NULL, '157985796733.jpg', '157985796711.jpg', 'macey emerson', '+1 (502) 232-2997', '+1 (766) 474-6664', 'tuqicyf@mailinator.com', 'sit labore officia s', 'Ex aut aliquip qui c', '18964', 'Rem sed iste consect', 'louisiana', '', '', 'Xerxes Ewing', '+1 (304) 966-4931', '81909', 'kecib@mailinator.com', '', 0, NULL, 0, '2020-01-24 15:11:07', '2021-01-24 00:00:00'),
(154, NULL, NULL, 0, 0, 'Basic', NULL, NULL, NULL, NULL, 'test', '+1 (918) 963-1062', '', '', '', 'Beatae rerum autem e', '54786', 'Voluptas optio ut d', 'iowa', '', '<p>tyes</p>', 'Colleen Dunn', '+1 (624) 538-7019', '63412', 'vadyb@mailinator.net', '', 0, NULL, 0, '2020-01-24 16:02:56', '2021-01-24 00:00:00'),
(155, NULL, NULL, 0, 0, 'Basic', '80', NULL, NULL, NULL, 'haviva pugh', '+1 (623) 461-7697', '', '', '', 'Quod nemo temporibus', '87799', 'Alias unde vero quas', 'oregon', '', '', 'Kay Mosley', '+1 (308) 562-4408', '70348', 'loremexody@mailinator.com', '', 0, NULL, 0, '2020-01-24 16:08:04', '2021-01-24 00:00:00'),
(156, NULL, NULL, 0, 0, 'Basic', '58', NULL, NULL, NULL, 'quentin ross', '+1 (284) 341-4701', '', '', '', 'Magnam doloremque ma', '87724', 'Amet et est sunt n', 'mississippi', '', '<p>dfjjhkmfjh</p>', 'Clementine Lott', '+1 (303) 765-2379', '61750', 'riha@mailinator.com', '', 0, NULL, 0, '2020-01-24 16:11:57', '2021-01-24 00:00:00'),
(157, NULL, NULL, 0, 0, 'Business', '80', '157995910517.jpg', NULL, NULL, 'alice cook', '+1 (911) 698-4771', '', '', '', 'Nisi minima aut ipsa', '95834', 'Porro veniam numqua', 'new jersey', '', '<p>asd</p>', 'Josephine Strong', '+1 (666) 807-1188', '39797', 'dadejefe@mailinator.net', '', 0, NULL, 0, '2020-01-25 19:16:45', '2021-01-25 00:00:00'),
(158, NULL, NULL, 0, 0, 'Basic', NULL, NULL, NULL, NULL, 'mason guzman', '123,123123', '', '', '', 'Sed ab duis et est r', 'ASD', 'Qui voluptatem Sed ', 'massachusetts', '', '<p>SADF</p>', 'Kylie Griffin', '+1 (499) 124-2906', '80869', 'bucohuryg@mailinator.com', '', 0, NULL, 0, '2020-01-25 19:50:44', '2021-01-25 00:00:00'),
(159, NULL, NULL, 0, 0, 'basic', '115', NULL, NULL, NULL, 'charde mason', '123,345', '', '', '', 'Ad pariatur Laborum', '25796', 'Eveniet ratione asp', 'arizona', '', '<p>qwer</p>', 'Fay Bean', '+1 (803) 808-2602', '94076', 'gefegiwag@mailinator.com', '', 0, NULL, 0, '2020-01-25 20:03:22', '2021-01-25 00:00:00'),
(160, NULL, NULL, 0, 0, 'basic', '31', NULL, NULL, NULL, 'gannon gould', '1,2,3', '', '', '', 'A at ipsum perferend', '24603', 'Nobis mollitia facer', 'connecticut', '', '<p>sdf</p>', 'Abbot Griffith', '+1 (841) 647-6371', '48508', 'legynajosy@mailinator.com', '', 0, NULL, 0, '2020-01-25 20:07:18', '2021-01-25 00:00:00'),
(161, NULL, NULL, 0, 0, 'basic', '58', NULL, NULL, NULL, 'Cynthia Cantu', '123,1234', NULL, NULL, NULL, 'Autem vero aut moles', '71771', 'Et voluptas enim mol', 'ohio', '[\"Quo officia eius vol\"]', '', 'Damon Walls', '263', '53691', 'vubev@mailinator.com', '', 0, NULL, 1, '2020-01-25 20:08:17', '2021-01-25 00:00:00'),
(162, NULL, NULL, 0, 0, 'basic', '58', NULL, NULL, NULL, 'Test For Tags', '123,1223,444,222', NULL, NULL, NULL, 'Ut et ex quaerat ex ', '52408', 'Necessitatibus quis ', 'idaho', '[\"Nemo quae ipsa a ad\"]', '<p>tset</p>\r\n', 'Imogene Flores', '645', '34070', 'kivutus@mailinator.com', '', 0, NULL, 1, '2020-01-26 12:11:32', '2021-01-26 00:00:00'),
(163, NULL, NULL, 0, 0, 'premium', '86', NULL, NULL, NULL, 'testtset', '1', '22', 'kylyju@mailinator.com,ty', 'eiusmod aut ullam co,asdf', 'Sit quia consequat', '123', 'Corrupti qui quis s', 'delaware', '', '<p>qwe</p>\r\n', 'Byron Rogers', '+1 (207) 548-2591', '35607', 'bapegihy@mailinator.net', '', 0, NULL, 0, '2020-01-26 13:01:11', '2021-01-26 00:00:00'),
(164, NULL, NULL, 0, 0, 'basic', '58', NULL, NULL, NULL, 'qqqqqqqqqqqqqqqqqqqqqq', '1', '', '', '', 'Adipisci et doloribu', '97705', 'Nam quos et minus in', 'kentucky', '[\"Sit aut non esse dol\",\" Laborum fuga Quibus\"]', '<p>sdaf</p>\r\n', 'Nadine Cash', '801', '50349', 'komavoqoh@mailinator.net', '', 0, NULL, 1, '2020-01-26 14:10:52', '2021-01-26 00:00:00'),
(165, NULL, NULL, 0, 0, 'premium', '109', NULL, NULL, NULL, 'final Add test', '1', '2', 'a@a.com', 'https://a.com', 'Voluptas excepteur d', '', 'Quos ut at qui repre', 'alabama', '', '', 'Audrey Shaffer', '647', '16236', 'gomuho@mailinator.net', '', 0, NULL, 1, '2020-01-26 14:13:17', '2021-01-26 00:00:00'),
(166, NULL, NULL, 0, 0, 'premium', NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '<p>gdfs</p>\r\n', '', '', '', '', '', 0, NULL, 1, '2020-01-26 14:19:49', '2021-01-26 00:00:00'),
(167, NULL, NULL, 0, 0, 'basic', NULL, NULL, NULL, NULL, 'dacey goodwin', '1', '', 'satyz@mailinator.com', '', 'Eu sunt enim velit', '', '', '', '', '', '', '', '', '', '', 0, NULL, 0, '2020-01-28 15:13:46', '2021-01-28 00:00:00'),
(168, NULL, NULL, 0, 0, 'basic', NULL, NULL, NULL, NULL, 'thaddeus wood', 'Sit distinctio Labo', '', 'zoxihe@mailinator.com', '', 'Animi dolor et et o', '', '', '', '', '', '', '', '', '', '', 0, NULL, 0, '2020-01-28 15:14:08', '2021-01-28 00:00:00'),
(169, NULL, NULL, 0, 0, 'basic', NULL, NULL, NULL, NULL, 'allen acosta', 'Quia animi quis qui', '', 'qiwoletoz@mailinator.net', '', 'Tempore in reprehen', '', '', '', '', '', '', '', '', '', '', 0, NULL, 0, '2020-01-28 15:36:51', '2021-01-28 00:00:00'),
(170, NULL, NULL, 0, 0, 'basic', NULL, NULL, NULL, NULL, 'ima rivers', 'Eum et qui quam dolo', '', 'toge@mailinator.com', '', 'Cumque ea quisquam p', '', '', '', '', '', '', '', '', '', '', 0, NULL, 0, '2020-01-28 15:42:01', '2021-01-28 00:00:00'),
(171, NULL, NULL, 0, 0, 'basic', NULL, NULL, NULL, NULL, 'callie stafford', 'Sed dolor rerum Nam ', '', 'kuwadolez@mailinator.net', '', 'Omnis aut adipisicin', '', '', '', '', '', '', '', '', '', '', 0, NULL, 0, '2020-01-28 15:45:56', '2021-01-28 00:00:00'),
(172, NULL, NULL, 0, 0, 'basic', NULL, NULL, NULL, NULL, 'madonna prince', 'Dignissimos voluptat', '', 'koxugav@mailinator.com', '', 'Est sit sapiente es', '', '', '', '', '', '', '', '', '', '', 0, NULL, 0, '2020-01-28 15:46:30', '2021-01-28 00:00:00'),
(173, NULL, NULL, 0, 0, 'basic', NULL, NULL, NULL, NULL, 'nadine wilson', 'Aliquid unde officia', '', 'cukup@mailinator.com', '', 'Voluptas ea distinct', '', '', '', '', '', '', '', '', '', '', 0, NULL, 0, '2020-01-28 15:49:19', '2021-01-28 00:00:00'),
(174, NULL, NULL, 0, 0, 'basic', NULL, NULL, NULL, NULL, 'moana patel', 'Proident doloribus ', '', 'tybaz@mailinator.com', '', 'Cillum esse ullamco', '', '', '', '', '', '', '', '', '', '', 0, NULL, 0, '2020-01-28 15:50:31', '2021-01-28 00:00:00'),
(175, NULL, NULL, 0, 0, 'basic', NULL, NULL, NULL, NULL, 'test checkout', '123,4454', '', 'qipux@mailinator.com', '', 'Ipsam a ex ea except', '', '', '', '', '', '', '', '', '', '', 0, NULL, 0, '2020-01-28 15:53:36', '2021-01-28 00:00:00'),
(176, NULL, NULL, 0, 0, 'basic', NULL, NULL, NULL, NULL, 'hammett santana', 'Laboriosam nostrum ', '', 'qinirataj@mailinator.com', '', 'Quisquam autem omnis', '', '', '', '', '', 'Aimee Brennan', '+1 (178) 673-7888', '70933', 'pekuj@mailinator.net', '', 0, NULL, 0, '2020-01-30 10:20:45', '2021-01-29 00:00:00'),
(177, NULL, NULL, 0, 0, 'basic', '88', NULL, NULL, NULL, 'cameran randolph', 'Officiis tenetur aut', '', 'fupysit@mailinator.com', '', 'Minus voluptatem mol', '', '', '', '', '', 'Sade Haley', '+1 (286) 973-2992', '41944', 'wevogy@mailinator.net', '', 0, NULL, 0, '2020-01-30 10:21:26', '2021-01-29 00:00:00'),
(178, NULL, NULL, 0, 0, 'basic', '31', NULL, NULL, NULL, 'jolene huffman', 'Porro doloribus non ', '', 'zymi@mailinator.com', '', 'Et est id sit cons', '', '', '', '', '', 'Adam Thornton', '+1 (672) 241-8952', '36544', 'jevec@mailinator.net', '', 0, NULL, 0, '2020-01-30 10:22:54', '2021-01-29 00:00:00'),
(182, NULL, NULL, 0, 18, 'basic', '80', NULL, NULL, NULL, 'shelly burnett', 'Elit cupiditate rep', '', 'sofec@mailinator.com', '', 'Dolore in quibusdam', '', '', '', '', '', 'Bipin Joshi', '+1 (321) 653-7335', '74200', 'peby@mailinator.net', '', 0, NULL, 0, '2020-01-30 14:58:24', '2021-01-30 00:00:00'),
(183, NULL, NULL, 0, 19, 'featured', '99', '158037651084.jpg', NULL, NULL, 'Test', '1,2,3', '123,234', 'qonu@mailinator.com,q@a.k', 'https://www.youtube.com/watch?v=pBGq6vNHpMQ,https://www.youtube.com/watch?v=lygRK6rPm_4', 'Commodo voluptatem', '23', 'test', 'alabama', 'a,s,d', '<p>asdf</p>\r\n', 'Ivory Ramirez', '+1 (735) 643-8566', '48243', 'gaba@mailinator.com', '', 1, 18, 1, '2020-01-30 15:13:29', '2021-01-30 00:00:00'),
(184, NULL, NULL, 0, 34, 'basic', NULL, NULL, NULL, NULL, 'zorita jenkins', 'Qui iure atque inven', '', 'quzyru@mailinator.com', '', 'Fugit atque harum n', '', '', '', '', '', 'Rhiannon Bentley', '+1 (778) 315-8322', '69377', 'bynexa@mailinator.com', '', 0, NULL, 0, '2020-01-30 17:09:40', '2021-01-30 00:00:00'),
(185, NULL, NULL, 0, 35, 'premium', '48', NULL, '158044846384.jpg', '158044846475.jpg', 'test', '1,2,3', '123,123123,123123123', 'as,asdf,asdfasdf', 'https://www.youtube.com/watch?v=KMWagGgIps0', 'test', '', 'test', 'alabama', '', '<p>qweqweqwe</p>\r\n', 'Ferdinand Gardner111', '+1 (118) 931-4843111', '65337111', 'wuguca@mailinator.com1', '', 0, NULL, 1, '2020-01-31 10:14:31', '2021-01-30 00:00:00'),
(186, NULL, NULL, 0, 0, 'basic', '80', NULL, NULL, NULL, 'Dillon Bates', '1,2', '', '', '', 'In laudantium inven', '', 'Maxime minim est es', 'pennsylvania', '', '', 'Valentine Cortez', '777', '80368', 'vafata@mailinator.com', '', 0, NULL, 1, '2020-01-31 12:06:34', '2021-01-31 00:00:00'),
(187, NULL, NULL, 0, 0, 'basic', '31', NULL, NULL, NULL, 'Nicole Cole', '1,2,3', '', '', '', 'Deserunt ducimus qu', '', 'Ex quod sit id fugi', 'indiana', '', '', 'Malik Cote', '499', '52119', 'vufijy@mailinator.com', '', 0, NULL, 1, '2020-01-31 14:39:11', '2021-01-31 00:00:00'),
(188, NULL, NULL, 0, 0, 'basic', '31', NULL, NULL, NULL, 'Melinda Huff', '1,2,3', '', '', '', 'Commodi laudantium ', '', 'Nulla tempora id sed', 'north dakota', '', '', 'Jelani Acosta', '240', '80819', 'hiwekupa@mailinator.net', '', 0, NULL, 1, '2020-01-31 14:40:55', '2021-01-31 00:00:00'),
(189, NULL, NULL, 0, 45, 'premium', NULL, NULL, NULL, NULL, 'carlos kemp', 'Ipsum ex sunt offici', '', '', '', 'Ut dolores exercitat', '', 'Quis et ad Nam digni', 'washington', '', '', 'Hayley White', '+1 (506) 678-5667', '67111', 'dyqudoru@mailinator.net', '', 0, NULL, 0, '2020-02-02 15:14:12', '2021-02-02 00:00:00'),
(190, NULL, NULL, 0, 46, 'premium', NULL, NULL, NULL, NULL, 'rae graham', 'Eveniet vel tempora', '', '', '', 'Sint quia nisi ea nu', '', 'Qui doloribus id con', 'ohio', '', '', 'Remedios Shepard', '+1 (551) 717-1563', '77587', 'nymowexohy@mailinator.com', '', 0, NULL, 0, '2020-02-02 15:16:30', '2021-02-02 00:00:00'),
(191, NULL, NULL, 0, 47, 'premium', NULL, NULL, NULL, NULL, 'gage odom', 'Rerum sunt voluptat', '', '', '', 'Ab laboriosam praes', '', 'Facilis quasi nisi i', 'maryland', '', '', 'Gil Sellers', '+1 (871) 111-7317', '95046', 'muke@mailinator.net', '', 0, NULL, 0, '2020-02-02 15:17:21', '2021-02-02 00:00:00'),
(192, NULL, NULL, 0, 48, 'basic', NULL, NULL, NULL, NULL, 'kameko baird', 'Soluta perspiciatis', '', '', '', 'Rem dolore iste dign', '', 'Sed sunt libero porr', 'rhode island', '', '', 'Bernard Weber', '+1 (314) 212-4568', '13085', 'wivoxawic@mailinator.net', '', 0, NULL, 0, '2020-02-02 15:19:07', '2021-02-02 00:00:00'),
(193, NULL, NULL, 0, 51, 'premium', NULL, NULL, NULL, NULL, 'clarke ross', 'Illum proident con', '', '', '', 'Sit veritatis cillu', '', 'Rem voluptas laborum', 'south dakota', '', '<p>sdfg</p>', 'Clarke Ross', '+1 (141) 247-9334', '78295', 'zozameh@mailinator.net', 'asfdsdfsfasdf', 0, NULL, 0, '2020-02-02 15:38:29', '2021-02-02 00:00:00'),
(194, NULL, 'CRA20200202050257', 60, 52, 'premium', NULL, NULL, NULL, NULL, 'carol calhoun', 'Ut voluptatum molest', '', '', '', 'Incididunt numquam r', '', 'Ad et incididunt nob', 'kentucky', '', '<p>asdf</p>', 'MacKensie David', '+1 (209) 305-8182', '24457', 'vitore@mailinator.net', 'uyi', 0, NULL, 0, '2020-02-02 15:47:57', '2021-02-02 00:00:00'),
(195, NULL, 'O0D20200202050622', 60, 53, 'premium', NULL, NULL, NULL, NULL, 'mollie burks', '+1 (903) 358-1557', '', '', '', 'Qui hic aliquid offi', '', 'Nihil ullamco id com', 'west virginia', '', '<p>sadf</p>', 'Calista Hudson', '+1 (262) 811-6124', '42489', 'qaxe@mailinator.net', 'qwer1234', 0, NULL, 0, '2020-02-02 15:51:22', '2021-02-02 00:00:00'),
(196, NULL, 'U3720200202050830', 60, 55, 'premium', NULL, NULL, NULL, NULL, 'skyler oliver', '+1 (982) 525-2447', '', '', '', 'Et amet iste reicie', '', 'Ut iste non doloremq', 'louisiana', '', '<p>sdf</p>', 'Oprah Trevino', '+1 (445) 976-6088', '29011', 'vogerekyke@mailinator.com', 'asdf', 0, NULL, 0, '2020-02-02 15:53:30', '2021-02-02 00:00:00'),
(197, NULL, 'DYO20200202051855', 60, 57, 'premium', NULL, NULL, NULL, NULL, 'lance jackson', 'Minim omnis culpa ul', '', '', '', 'Qui in minus deserun', '', 'Anim pariatur Volup', 'new mexico', '', '', 'Daniel Carson', '+1 (847) 942-6594', '89590', 'kolyteho@mailinator.net', 'asd', 0, NULL, 0, '2020-02-02 16:03:55', '2021-02-02 00:00:00'),
(199, NULL, 'XZP20200205014855', 70, 61, 'premium', '1', NULL, '158088533684.jpg', '158088533675.jpg', 'dexter sampson', 'Dolores assumenda do', '+1 (296) 738-3334', 'nihil ad est ut mag', 'dolore ex blanditiis', 'Reprehenderit expli', '', 'Adipisicing sapiente', 'hawaii', '', '<p>asdf</p>', 'Brooke Short', '+1 (531) 859-8886', '49457', 'hyloxyl@mailinator.com', '', 0, NULL, 0, '2020-02-05 12:33:55', '2021-02-05 00:00:00'),
(200, NULL, 'GTU20200205015216', 30, 62, 'basic', '1', NULL, NULL, NULL, 'kimberley mays', '1,2,3', '', '', '', 'Aperiam et perferend', '', 'Porro qui qui laudan', 'mississippi', '', '', 'Sawyer Conrad', '+1 (468) 829-5093', '80263', 'zilirunih@mailinator.com', '', 0, NULL, 0, '2020-02-05 12:37:16', '2021-02-05 00:00:00'),
(238, NULL, 'QDJ20200212230321', 85, 97, 'premium', '0', NULL, NULL, NULL, 'yetta cochran', 'Id et labore quis ev', '+1 (494) 705-5196', 'amet quo libero ani', 'magnam ut quasi quib', 'Est aut autem in nos', '', 'Aliquid dignissimos ', 'ohio', '', '<p>asd</p>', 'Sierra Finley', '+1 (518) 322-9042', '38439', 'fydikymazy@mailinator.net', '', 0, NULL, 0, '2020-02-13 09:48:21', '2021-02-12 00:00:00'),
(239, NULL, 'VTM20200213001812', 185, 98, 'premium', '0', NULL, NULL, NULL, 'medge stafford', 'Voluptatem ea aliqua', '+1 (204) 567-7974', 'omnis aut reprehende', 'animi aut molestiae', 'Voluptates magni con', '', 'Mollitia magna porro', 'district of columbia', '', '', 'Odessa Estes', '+1 (395) 112-5994', '77524', 'nofikocok@mailinator.com', '', 0, NULL, 0, '2020-02-13 11:03:12', '2021-02-13 00:00:00'),
(240, NULL, 'GFS20200213002027', 190, 100, 'premium', '0', NULL, NULL, '1581571227b.jpg', 'venus galloway', 'Laborum Suscipit qu', '+1 (909) 427-8525', 'voluptas non tenetur', 'laboris eum assumend', 'Quia est ratione vol', '', 'Omnis rerum natus do', 'new hampshire', '', '<p>asdf</p>', 'Emmanuel Stephenson', '+1 (433) 293-6502', '68255', 'muzyvesepi@mailinator.net', '', 0, NULL, 0, '2020-02-13 11:05:27', '2021-02-13 00:00:00'),
(241, NULL, 'WTS20200213002139', 185, 102, 'premium', '0', NULL, NULL, NULL, 'noelani reynolds', 'Omnis delectus id e', '+1 (336) 654-2244', 'explicabo neque lau', 'similique quisquam d', 'Cillum nihil quas vo', '', 'Non repellendus Mol', 'north dakota', '', '<p>asdf</p>', 'Plato Hahn', '+1 (362) 278-3931', '73126', 'fonagyvon@mailinator.net', '', 0, NULL, 0, '2020-02-13 11:06:39', '2021-02-13 00:00:00'),
(242, NULL, 'ZBS20200213002457', 185, 103, 'premium', '0', NULL, NULL, NULL, 'lisandra madden', 'Tenetur quas et qui ', '+1 (423) 567-7588', 'velit alias blanditi', 'minus nobis accusant', 'Perspiciatis volupt', '', 'Nihil deleniti dolor', 'illinois', '', '<p>asdf</p>', 'Summer Campos', '+1 (981) 904-8076', '52458', 'ducequr@mailinator.net', '', 0, NULL, 0, '2020-02-13 11:09:57', '2021-02-13 00:00:00'),
(243, NULL, 'ZNO20200213002540', 185, 105, 'premium', '0', NULL, NULL, NULL, 'hedley snider', 'Et irure qui culpa ', '+1 (717) 353-4407', 'et amet autem qui d', 'anim at eos debitis', 'Proident voluptatum', '', 'Occaecat non optio ', 'south dakota', '', '<p>asdf</p>', 'Aladdin Maynard', '+1 (958) 237-9272', '94788', 'xoziziwaw@mailinator.net', '', 0, NULL, 0, '2020-02-13 11:10:40', '2021-02-13 00:00:00'),
(244, NULL, 'OYC20200213002607', 185, 107, 'premium', '0', NULL, NULL, NULL, 'susan kim', 'Omnis ipsam earum en', '+1 (333) 586-6634', 'obcaecati sit quo v', 'lorem nulla exercita', 'Enim dolorum pariatu', '', 'Dolore esse cupidita', 'north carolina', '', '<p>asdf</p>', 'Colleen Hood', '+1 (759) 474-2664', '82647', 'pajono@mailinator.com', '', 0, NULL, 0, '2020-02-13 11:11:07', '2021-02-13 00:00:00'),
(245, NULL, 'DGN20200213002635', 185, 108, 'premium', '0', NULL, NULL, NULL, 'diana thomas', 'At enim odit et odit', '+1 (357) 379-6335', 'id eligendi dicta co', 'est commodi dicta v', 'Rem minima quod ea s', '', 'Qui doloremque ea au', 'idaho', '', '<p>asdf</p>', 'Zenaida Dennis', '+1 (804) 586-3016', '35899', 'sorykixuji@mailinator.net', '', 0, NULL, 0, '2020-02-13 11:11:35', '2021-02-13 00:00:00'),
(246, NULL, 'OTW20200213002704', 185, 109, 'premium', '0', NULL, NULL, NULL, 'amal benson', 'Dolores anim quia al', '+1 (469) 584-9967', 'molestiae voluptatem', 'dolor officia nisi d', 'Exercitationem rerum', '', 'Et quasi sit non aut', 'maine', '', '<p>asdf</p>', 'Lara Diaz', '+1 (658) 682-1591', '78655', 'cevuxahywo@mailinator.com', '', 0, NULL, 0, '2020-02-13 11:12:04', '2021-02-13 00:00:00'),
(247, NULL, 'KNP20200213002815', 185, 110, 'premium', '0', NULL, NULL, NULL, 'samantha le', 'Qui proident sit e', '+1 (322) 788-1777', 'voluptas odio esse b', 'sed omnis modi modi', 'Ea fuga Aut quia ma', '', 'Ipsa aut commodo un', 'new jersey', '', '<p>asdf</p>', 'Camille Fuller', '+1 (953) 123-8779', '27032', 'qiwywadyc@mailinator.com', '', 0, NULL, 0, '2020-02-13 11:13:15', '2021-02-13 00:00:00'),
(248, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581575436b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 12:15:36', NULL),
(249, NULL, 'IDT20200213013641', 185, 111, 'premium', '0', NULL, NULL, '1581575801b.jpg', 'ferdinand flores', 'Rerum est velit omni', '+1 (532) 619-7217', 'in modi quod ad et', 'dolores quasi dolori', 'Nihil maiores velit', '', 'Eum atque est minima', 'connecticut', '', '', 'Akeem Mitchell', '+1 (495) 612-8468', '55275', 'zizubyfoh@mailinator.net', '', 0, NULL, 0, '2020-02-13 12:21:41', '2021-02-13 00:00:00'),
(250, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581575955b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 12:24:15', NULL),
(251, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581576008b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 12:25:08', NULL),
(252, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581577240b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 12:45:40', NULL),
(253, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581577374b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 12:47:54', NULL),
(254, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581577483ge.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 12:49:43', NULL),
(255, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581577500b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 12:50:00', NULL),
(256, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581577918b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 12:56:58', NULL),
(257, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581578069b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 12:59:29', NULL),
(258, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581578378b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 13:04:38', NULL),
(259, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581578587b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 13:08:07', NULL),
(260, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581578991b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 13:14:51', NULL);
INSERT INTO `directory` (`id`, `payment`, `signup_code`, `grand_total`, `user_id`, `package`, `category_id`, `card`, `disp_add`, `coupon`, `name`, `phone`, `fax`, `email`, `url`, `address`, `zip`, `city`, `state`, `tags`, `description`, `owner_name`, `owner_num`, `owner_zip`, `owner_email`, `del_address`, `is_featured`, `featured_index`, `is_active`, `created_on`, `extended_till`) VALUES
(261, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581582045b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 14:05:45', NULL),
(262, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581582189b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 14:08:09', NULL),
(263, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581582249b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 14:09:09', NULL),
(264, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581582353b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 14:10:53', NULL),
(265, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581582419b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 14:11:59', NULL),
(266, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581582447b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 14:12:27', NULL),
(267, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581582630b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 14:15:30', NULL),
(268, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581582800b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 14:18:20', NULL),
(269, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581582853b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 14:19:13', NULL),
(270, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581582948b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 14:20:48', NULL),
(271, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581583001b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 14:21:41', NULL),
(272, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581583079b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 14:22:59', NULL),
(273, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581583258b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 14:25:58', NULL),
(274, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581583356b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 14:27:36', NULL),
(275, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581583778b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 14:34:38', NULL),
(276, NULL, NULL, 0, 0, '', '0', NULL, NULL, '1581587134b.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 15:30:34', NULL),
(277, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815933139605.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:13:33', NULL),
(278, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815933318465.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:13:51', NULL),
(279, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815933836525.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:14:43', NULL),
(280, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815934114319.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:15:11', NULL),
(281, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815934735513.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:16:13', NULL),
(282, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815935029000.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:16:42', NULL),
(283, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815935109019.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:16:50', NULL),
(284, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815936834793.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:19:43', NULL),
(285, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815936938117.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:19:53', NULL),
(286, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815940047986.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:25:04', NULL),
(287, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815944067801.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:31:46', NULL),
(288, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815949983339.jpg', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:41:38', NULL),
(289, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815950342464.jpg', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:42:14', NULL),
(290, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815952909877.jpg', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:46:30', NULL),
(291, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815953703825.jpg', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:47:50', NULL),
(292, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815954064441.jpg', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:48:26', NULL),
(293, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815954536954.jpg', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:49:13', NULL),
(294, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815954768954.jpg', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:49:36', NULL),
(295, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815955129216.jpg', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:50:12', NULL),
(296, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815955216763.jpg', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:50:21', NULL),
(297, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815955516561.jpg,15815955511050.jpg', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:50:51', NULL),
(298, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815956508567.jpg,15815956507473.jpg', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:52:30', NULL),
(299, NULL, NULL, 0, 0, '', '0', NULL, NULL, '15815956672605.jpg,15815956677801.jpg', '', NULL, NULL, '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', 0, NULL, 1, '2020-02-13 17:52:47', NULL),
(300, NULL, '2VE20200213071759', 265, 112, 'premium', '0', NULL, NULL, '15815962793811.jpg,15815962798071.jpg', 'testttt', 'Dolor praesentium mo', '+1 (337) 921-7363', 'quia non elit in la', 'et elit voluptatem', 'Id enim excepturi d', '', 'Veniam illum quos ', 'south carolina', '', '<p>asdf</p>', 'Zeph Orr', '+1 (174) 732-9749', '65370', 'zasa@mailinator.net', '', 0, NULL, 0, '2020-02-13 18:02:59', '2021-02-13 00:00:00'),
(301, NULL, 'JEW20200213072544', 260, 113, 'premium', '0', NULL, NULL, '15815967449466.jpg,15815967448609.jpg', 'check', 'Veniam quo sit vol', '+1 (691) 182-7654', 'suscipit aut aut nam', 'sunt laborum expedi', 'Suscipit quasi aperi', '', 'Anim et labore velit', 'north dakota', '', '<p>asdf</p>', 'Lael Goodwin', '+1 (313) 293-5058', '93199', 'nasyvykibu@mailinator.com', '', 0, NULL, 0, '2020-02-13 18:10:44', '2021-02-13 00:00:00'),
(302, NULL, 'ZVG20200213072625', 260, 114, 'premium', '0', NULL, '15815967851561.jpg,15815967858504.jpg', '15815967851179.jpg,15815967854638.jpg', 'check1', 'Autem quidem sunt si', '+1 (809) 622-9713', 'incidunt sed cillum', 'nostrum porro expedi', 'Ipsam laboris vitae', '', 'Enim commodo omnis c', 'north carolina', '', '<p>asdf</p>', 'Maile Griffith', '+1 (885) 526-1576', '40443', 'gulifeho@mailinator.com', '', 0, NULL, 0, '2020-02-13 18:11:25', '2021-02-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `directory_categories`
--

CREATE TABLE `directory_categories` (
  `id` int(11) NOT NULL,
  `type` varchar(250) DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directory_categories`
--

INSERT INTO `directory_categories` (`id`, `type`, `parent`) VALUES
(1, 'Academy', 0),
(13, 'Moving', 0),
(15, 'Storage', 0),
(16, 'Automobile', 0),
(17, 'Boxes', 0),
(18, 'Dentists', 0),
(19, 'Accounting', 0),
(20, 'Barbershops', 0),
(21, 'Carpet', 0),
(22, 'Churches', 0),
(23, 'Cleaning Services', 0),
(24, 'Doors', 0),
(25, 'Heating', 0),
(26, 'Insurance', 0),
(27, 'Lawyers', 0),
(28, 'Piano', 13),
(29, 'Painting', 0),
(30, 'Plumbing', 0),
(31, 'Computer', 1),
(32, 'Marketing', 1),
(33, 'Radio Station', 0),
(34, 'Real Estate', 0),
(35, 'Roofing', 0),
(36, 'Signs', 0),
(37, 'Tax Services', 0),
(38, 'Tree Services', 0),
(41, 'Service', 0),
(42, 'Consultant', 0),
(48, 'Bank', 0),
(49, 'Accessories', 0),
(50, 'Government', 0),
(51, 'Advertising', 0),
(52, 'Attorney', 0),
(53, 'Printing', 0),
(54, 'Printing Service', 0),
(56, 'Schools', 1),
(57, 'Tuition Centers', 1),
(58, 'Hand Bags', 49),
(59, 'Colleges', 1),
(60, 'Computer', 2),
(61, 'Hand Bags', 6),
(62, 'Schools', 2),
(63, 'movers', 13),
(64, 'Towing', 16),
(65, 'Auto Repair', 16),
(66, 'Packing', 13),
(67, 'Music Publishers', 28),
(68, 'Musicians', 28),
(69, 'Bands', 28),
(70, 'Equipment Rental', 28),
(71, 'Equipment Sales', 13),
(72, 'Moving and storage', 13),
(73, 'Equipment Sales', 28),
(74, 'Music Lessons', 28),
(75, 'Records Tapes And CD Sales', 28),
(76, 'Tires', 16),
(77, 'Commercial', 23),
(78, 'Residential', 23),
(79, 'Agent', 34),
(80, 'Wallet', 49),
(81, 'Transport', 0),
(82, 'Hotels', 0),
(83, 'Room Service', 82),
(84, 'Binding', 0),
(85, 'books', 84),
(86, 'Institute', 1),
(87, 'Training', 1),
(88, 'Academy', 1),
(89, 'Computer', 0),
(90, 'Service / Repair', 89),
(91, 'Mortgage', 0),
(92, 'Loan', 91),
(93, 'Locksmith', 0),
(94, 'Computer Sales', 89),
(95, 'Rehearsal Space', 28),
(96, 'Water', 0),
(97, 'Wheel', 0),
(98, 'Wigs', 0),
(99, 'Appliances', 0),
(100, 'Air', 0),
(101, 'Piano And Organ', 0),
(102, 'Mailing', 0),
(103, 'Music', 0),
(104, 'Bands', 103),
(105, 'Pharmacy', 0),
(106, 'Tuning and Repairs', 101),
(107, 'Tuning', 1),
(108, 'Digital Marketing', 51),
(109, 'Tuning', 49),
(110, 'Piano Tuning', 103),
(111, 'Music Lesson', 103),
(112, 'Lead Service', 0),
(113, 'Moving Leads', 112),
(114, 'Storage Leads', 112),
(115, 'test', 51);

-- --------------------------------------------------------

--
-- Table structure for table `inserted_directory_category`
--

CREATE TABLE `inserted_directory_category` (
  `id` int(11) NOT NULL,
  `directory_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inserted_directory_category`
--

INSERT INTO `inserted_directory_category` (`id`, `directory_id`, `category_id`) VALUES
(31, 238, 59),
(32, 301, 59),
(33, 302, 88);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `phone`, `subject`, `message`, `is_read`, `created_on`) VALUES
(1, 'curtis', 'eternitybandboodking@live.com', '', '', 'Test', 0, '2017-04-07 05:34:53'),
(2, 'Jolie Burgess', 'hexe@mailinator.net', '', '', 'Sint suscipit minus', 0, '2020-01-09 01:24:34'),
(3, 'Kenyon Downs', 'nevamyryry@mailinator.com', '', '', 'Optio sunt ut et ve', 0, '2020-01-20 23:27:33'),
(4, 'Kenyon Downs', 'nevamyryry@mailinator.com', '', '', 'Optio sunt ut et ve', 0, '2020-01-20 23:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(100) NOT NULL,
  `featured_image` varchar(60) DEFAULT NULL,
  `action` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `title`, `description`, `slug`, `featured_image`, `action`) VALUES
(1, 'home', 'home', 'Home', 'home-page', '0', 'websettings/home'),
(2, 'about', 'about', 'About', 'about-page', '0', 'websettings/about'),
(3, 'featured', 'featured', 'Featured', 'featured-page', '0', 'websettings/featured'),
(4, 'directory', 'directory', 'Directory', 'directory-page', '0', 'websettings/directory'),
(5, 'contact', 'contact', 'Contact', 'contact-page', '0', 'websettings/contact');

-- --------------------------------------------------------

--
-- Table structure for table `section_content`
--

CREATE TABLE `section_content` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `icon` varchar(40) NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `image` varchar(60) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_content`
--

INSERT INTO `section_content` (`id`, `page_id`, `slug`, `section_name`, `icon`, `title`, `subtitle`, `image`, `description`) VALUES
(1, 1, 'hire', 'hire', '', 'Career Opportunities', '', '', ''),
(4, 2, 'how-we-work', 'how we work', '', 'Meeting', 'Separated they live in Bookmarksgrove right at the coast of the Semantics', '', ''),
(5, 2, 'ret', 'ret', '', '', '', '', ''),
(6, 2, 'what-we-do', 'What we do', '0', '<strong>What</strong> We Do ?', '', '0', '<p>We are making a very cost-effective way to get links and helps to establish a foundation for Internet marketing. Especially beneficial in helping all business&nbsp;get noticed, we help your business site build traction in an increasingly crowded and competitive marketplace.</p>\r\n'),
(7, 2, 'who-we-are', 'who we are', '0', '<strong>Who </strong> We Are ?', '', '0', '<p>We provide a website submission service where your website is added to the proper category in a searchable online directory which enhances your site&rsquo;s visibility and creates relevant inbound links to your website. We provide links in a structured list to make browsing easier. Web combine searching and browsing by providing a search engine to search the directory.</p>\r\n'),
(8, 3, 'statistics', 'statistics', '', '', '', '', ''),
(9, 4, 'list-picture', 'List Picture', '', 'Separated they live in Bookmarksgrove right at the coast of the Semantics', '', '', ''),
(10, 0, 'about-section', 'about section', '0', 'Welcome to Poormans Online Directory', 'We are an online business listing service provider', '0', '<p>We are a team that believes in enriching lives, simplifying work and management through the use of clever and well thought out online business directory. We specialize in helping our users find any kind of business information from our website that are managed to search easily and find any kind of business easily. We are&nbsp;capable of thousands of business&nbsp;handling commercial or private service.</p>\r\n\r\n<p>All the businesses registered on the web site have been vetted and approved by Trading Standards to ensure that they operate in a legal, honest and fair way.We work hand in hand with our clients to ensure terrific functionality with pleasing information&nbsp;and&nbsp;all aspect of the business.</p>\r\n\r\n<p>Always pushing ourselves to learn more and implement general world knowledge into thoughtful plans for listing business in effective methods.</p>\r\n'),
(11, 3, 'our-process', 'our process', '', '', '', '', ''),
(14, 3, 'about-why-choose', 'about why choose', '', 'why choose klientscape', '', '', '<p>We believe in originality. Products with simple yet bold and defining aesthetics. We welcome challenges and celebrate the unorthodox.</p>\r\n'),
(15, 2, 'about-icon-one', 'icon one', 'fa-ambulance', 'Advertisement', 'Advertising Publicity', '0', '<p>Advertising can be an effective way to reach large numbers of target customers. Our guide to evaluating your options and measuring results.</p>\r\n'),
(16, 2, 'about-icon-two', 'icon two', 'fa-arrow-circle-down', 'Directory', 'We believe in growth', '0', '<p>Being in online directories can help give your site / business additional creditability and search ranking. Additionally being able to manage and respond to your reviews online is very important also.</p>\r\n'),
(17, 2, 'about-icon-three', 'icon three', 'fa-angellist', 'Business Card', 'Get Notice Online', '0', '<p>We have created a new website which is very cost effective to advertise your business card online.&nbsp;We have&nbsp;offered a business card directory service where businesses could submit their details to us, these details would typically be found on a business card</p>\r\n'),
(18, 0, 'counter-icon-one', 'icon one', 'fa-ambulance', 'Registered Businesses', '', '0', '100'),
(19, 0, 'counter-icon-two', 'icon two', 'fa-anchor', 'Premium Businesses', '', '0', '200'),
(20, 0, 'counter-icon-three', 'icon two', 'fa-angellist', 'Featured Businesses', '', '0', '300'),
(21, 0, 'counter-icon-four', 'icon four', 'fa-location-arrow', 'BUSINESS CATEGORIES', 'Whe have some information here', '', '4,541');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subtitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `page_id`, `slug`, `title`, `subtitle`) VALUES
(8, 1, 'home:-happy-directory', 'Welcome to<br />Poorman\'s Online Directory', 'Get Listed on poormans online directory');

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `image` varchar(40) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `page_id`, `image`, `link`) VALUES
(3, 1, '201610061475754237banner-1.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `url` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `icon`, `type`, `url`) VALUES
(1, 'fa-facebook', 'Facebook', 'http://www.facebook.com'),
(2, 'fa-twitter', 'Twitter', 'http://www.twitter.com'),
(3, 'fa-google-plus', 'Google Plus', 'http://plus.google.com'),
(4, 'fa-dribbble', 'Dribbble', 'http://www.dribbble.com'),
(5, 'fa-pinterest', 'Pinterest', 'http://www.pinterest.com'),
(6, 'fa-linkedin', 'Linkedin', 'http://www.linkedin.com'),
(7, 'fa-rss', 'RSS', 'http://www.rss.com');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `client` varchar(100) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `quote` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `client`, `company`, `position`, `quote`, `is_active`, `created_on`, `created_by`) VALUES
(2, 'Matt Storme', '', 'Designer', '<p>Personally, I find this website so very good as every section of business has been managed and published in a easy way to get any business information.</p>\r\n', 1, '2016-06-06 03:23:19', 3),
(6, 'Harry', 'Open Trade House', 'Manager', '<p>Poor Man&#39;s made so easy to find any kind of business and services as well as submiting our website on the internet so effectively.</p>\r\n', 1, '2016-06-06 03:25:56', 3),
(7, 'Paul', '', 'Developer', '<p>I come to know about the importance from Poor Man&#39;s website as i am going so good with my business right now.</p>\r\n', 1, '2016-09-05 23:56:19', 2),
(8, 'John Snow', 'Chass Wood Resources', 'CEO', '<p>Poor Man&#39;s is doing a great job. I am so happy to publish my business through internet among numbers of people.</p>\r\n', 1, '2016-09-29 21:16:35', 2),
(9, 'Peter Doe', 'Garnier Fabrics', 'General Manager', '<p>Thank you Poor Man&#39;s for being there at a required time .</p>\r\n', 1, '2016-09-29 21:31:23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `incorrect_login` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified` tinyint(4) NOT NULL DEFAULT 0,
  `email_verification` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `incorrect_login`, `name`, `role`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `email_verified`, `email_verification`, `status`, `created_at`, `updated_at`, `phone`, `mobile`, `fax`, `profile_picture`) VALUES
(1, 0, 'Mr. Curtis Johnson', 'UBhcWtaIva', 'admin', '', '$2y$13$xCdL76J2wvJUj9.vnECW6OzGdR8v5.TSVObBJ4WbSL1IpMqCSeg8m', '', 'poormansonlinedirectory@live.com', 1, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3018944215', '3013953769', NULL, ''),
(2, 0, 'Business Owner', 'QBCMajSNzb', 'client', '', '$2y$13$eBQ.e/vFSFqVU.4gh6eF6Okqy3GLAH2PyEMVjnnqexASL3c47cSUy', 'a4Fkvr_WMwS1BaH27gPzOl_bfuho690x_1472543337', 'hello@poormans.com', 1, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '14425513', '9801116773', NULL, ''),
(3, 0, 'Puran', 'UBhcWtaIva', 'puran', '', '$2y$13$oTygj0JBUbni.LHiWZmChuF98gmu/aJWY/4HF.bR37mjd/dblKkAa', NULL, 'puran@gmail.com', 1, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, ''),
(18, 0, 'Bipin Joshi', 'user', 'bipin74185', '', '$2y$13$TAgocSPrCHX6Wiah7h2MjeLHEiWOGqOOlAlQUXoWa.d.b/VH0Wday', NULL, 'peby@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '+1 (321) 653-7335', '', NULL, ''),
(19, 0, 'Ivory Ramirez', 'user', 'ivory17836', '', '$2y$13$kHMBx.wbY8GtQ8kxMap6necihNvGMa3hur3XS20OlvBJjJX9t1Mku', NULL, 'gaba@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '+1 (735) 643-8566', '', NULL, ''),
(20, 0, '', 'user', '', '', '$2y$13$/vL9O9dZLZGC8Jrxs9z1/uk1lYJcK035EzWfaAt5FOeE2FqXGthsO', NULL, '', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(21, 0, 'Test stes', 'user', 'nykutohof@mailinator.net', '', '$2y$13$aoYaqItj14rg1EQ.kZbZY.RKGS7LMAsOMzUZLicMwXKfEgELlFfXe', NULL, 'nykutohof@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '+1 (819) 865-3402', '', NULL, ''),
(22, 0, 'test aaaaa', 'user', 'pimuregu@mailinator.net', '', '$2y$13$FLMyAhhUn29rSjhtCBxiX.nqdxNSNQH6Zb9bP7R9UoVGmgKbdq.5C', NULL, 'pimuregu@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '+1 (529) 513-9147', '', NULL, ''),
(24, 0, 'Ria Leach', 'user', 'kicewovux@mailinator.net', '', '$2y$13$miPE7CJ.J7CcLnXMpqKD1OtEeaG8NnynxCeAgwdsJi72nYhGWZkUK', NULL, 'kicewovux@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '+1 (602) 313-8305', '', NULL, ''),
(26, 0, 'Jolie Drake', 'user', 'wada@mailinator.com', '', '$2y$13$FnbLc44QD5Ibg8Mn8EIzT.svKgo8HNurl7GIppaI.lGRf44fyL9ui', NULL, 'wada@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '+1 (558) 156-3006', '', NULL, ''),
(28, 0, 'Roanna Albert', 'user', 'curuhegir@mailinator.com', '', '$2y$13$hYj.ONQ6J9rAERDVm1ZhuOXnagf9uU/JNSLZwkRUZgMCa257JgjpG', NULL, 'curuhegir@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '+1 (549) 807-1309', '', NULL, ''),
(30, 0, 'Lyle Hill', 'user', 'xygyfihu@mailinator.net', '', '$2y$13$O6b1zi2UaBdpIxoOvDDtL.rnMDiPI1MWGPsWSd37DBAolRysE7e9y', NULL, 'xygyfihu@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '+1 (977) 917-8414', '', NULL, ''),
(32, 0, 'Castor Kline', 'user', 'cihyc@mailinator.net', '', '$2y$13$eIJpfavxbY9R/UAs9yoepOKZ/3Hk9hrOtZqz7JGJQ9sli1WqIO9fy', NULL, 'cihyc@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '+1 (571) 389-8667', '', NULL, ''),
(33, 0, 'Ursula Head', 'user', 'fuzubit@mailinator.com', '', '$2y$13$AfWUOFN0Nb5Dsu1uoyz7fOSsAAilQ20YgXlEuscJ4J38rhnuxjhTe', NULL, 'fuzubit@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '+1 (768) 251-7482', '', NULL, ''),
(34, 0, 'Rhiannon Bentley', 'user', 'bynexa@mailinator.com', '', '$2y$13$5sKWBgW4hb0Y2gkeSk9P4OMM/Wu7fyQTyDzzljl/iv9xkTXF0SVQC', NULL, 'bynexa@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '+1 (778) 315-8322', '', NULL, ''),
(35, 0, 'Ferdinand Gardner', 'user', 'wuguca@mailinator.com', '', '$2y$13$l2WCu2BVg9RFuy4bl/beoeK2MP.KJ5GzgqHnYHTwqdTJodIHR.dAC', NULL, 'wuguca@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '+1 (118) 931-4843', '', NULL, ''),
(36, 0, 'Malik Cote', 'user', 'vufijy@mailinator.com', '', '$2y$13$u7pJNkWxwIYzKhAZCgjZ6.jTDCn4gxF9p.YXfpIVbiSncSaPCIExC', NULL, 'vufijy@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(37, 0, 'Jelani Acosta', 'user', 'hiwekupa@mailinator.net', '', '$2y$13$nAziWrSt1xBU7YnBwm8MAe41u16VJZIwtZ8yuLgpziooAOXhlCpGC', NULL, 'hiwekupa@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '240', '', NULL, ''),
(45, 0, 'Hayley White', 'user', 'dyqudoru@mailinator.net', '', '$2y$13$A14zE/m9Bgl42cKlIRnW2ezfVw3Dvd6CfnTAbrK/SNJxxuYKflGDK', NULL, 'dyqudoru@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(46, 0, 'Remedios Shepard', 'user', 'nymowexohy@mailinator.com', '', '$2y$13$Zd6.1paMo6nfucZLwTUuj.ikKG36Ha93/yyVA1BX5U9pIpIZ31pwG', NULL, 'nymowexohy@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(47, 0, 'Gil Sellers', 'user', 'muke@mailinator.net', '', '$2y$13$v.ivxhH6T2mEOYKEPqlMyeURUP6fKsBLZ0Skfvnm.c/I66ZuxaS4i', NULL, 'muke@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(48, 0, 'Bernard Weber', 'user', 'wivoxawic@mailinator.net', '', '$2y$13$FQKDELgw8DcFw1DGaDKM0e7uLVq1IaJok6fbVRvvk26um1PkUVBVq', NULL, 'wivoxawic@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(51, 0, 'Clarke Ross', 'user', 'zozameh@mailinator.net', '', '$2y$13$SuEjCBjC.g2JjkAWXXLRbOBUvQYxG/yOZWQH4QB4XK4bSfTiWVy8K', NULL, 'zozameh@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(52, 0, 'MacKensie David', 'user', 'vitore@mailinator.net', '', '$2y$13$uHuVWTAJbMfRZM7XhZnV1uTopuI9ST3CpZ/O5xTLZS47xJWHxhrf6', NULL, 'vitore@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(53, 0, 'Calista Hudson', 'user', 'qaxe@mailinator.net', '', '$2y$13$U0rvK0adVVADEzbaQYVxSuGLIhLmnZMsi0nARL6OYnBYEqh6mlTwa', NULL, 'qaxe@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(55, 0, 'Oprah Trevino', 'user', 'vogerekyke@mailinator.com', '', '$2y$13$Z0dGwHgMqMPi6oUDcDS9ZueaePMJZsLZKW/3VMwZIPw6mGTxq0eC.', NULL, 'vogerekyke@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(57, 0, 'Daniel Carson', 'user', 'kolyteho@mailinator.net', '', '$2y$13$JH.PPpR.deP5B/GyDLkNdO26xuX7M9b5/ViMNM3YBZg7GNEBLM60i', NULL, 'kolyteho@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(58, 0, 'Kitra Delaney', 'user', 'myqyz@mailinator.com', '', '$2y$13$6LYpF5cJ8MHl0Myzqo3rGeP7jemZRe0Hm2iS/UAWeO16ehCU841uS', NULL, 'myqyz@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(59, 0, 'Stephanie Riley', 'user', 'pujetujen@mailinator.net', '', '$2y$13$D57S/TxLM8P5Q0TErVkThe16uRfW2LVrgqM5Iy29YNQNvdGHdfh2S', NULL, 'pujetujen@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(61, 0, 'Brooke Short', 'user', 'hyloxyl@mailinator.com', '', '$2y$13$sFbMjDxvmIBRScdJUbX6w.JjQxv7C1MDsBA/30tD204Ybd97gpVvu', NULL, 'hyloxyl@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(62, 0, 'Sawyer Conrad', 'user', 'zilirunih@mailinator.com', '', '$2y$13$z4b1gHvjByYZuVK9XRicE.OnA4pdTw/1Y8mb93xuhn88MrO5fsQBG', NULL, 'zilirunih@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(63, 0, 'Miranda Mathis', 'user', 'vuqeky@mailinator.com', '', '$2y$13$YP5GSuSsQHm2m3t8WWpAL.PVgEHm2visMGANI63FtZzsN5IwQLu1O', NULL, 'vuqeky@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(64, 0, 'Burke Whitfield', 'user', 'nonimyl@mailinator.com', '', '$2y$13$fxFcXJmuXXzar9iLRcw8Ge03gW4QLfMmTZWUbN9niqKd6BIuTiXTm', NULL, 'nonimyl@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(65, 0, 'Bryar Mayer', 'user', 'kidojic@mailinator.com', '', '$2y$13$nFeesOF5MBDe8VGuwiN8jeBv3nSL0WrAWqv4htu/2pzHk9v0xBOwW', NULL, 'kidojic@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(66, 0, 'Orli Flynn', 'user', 'wovecekora@mailinator.com', '', '$2y$13$CC1WSUOA.3NzBFEEbgYF7.ScaRPougvEw9XKBXy3nNsPTG2bExoOO', NULL, 'wovecekora@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(67, 0, 'Mia Horton', 'user', 'dijamun@mailinator.com', '', '$2y$13$Qn6j7AM09aAh5YKcpv.U2.7/eRWwnvAez2vCUZ.QWvxbY6KvtPhHS', NULL, 'dijamun@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(69, 0, 'Blossom Cooper', 'user', 'dylug@mailinator.com', '', '$2y$13$oNTQ7XXAmNBFfxwx6n1uJ.69nqusZUVsjAn2UheMBBA9L/06HHcGe', NULL, 'dylug@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(70, 0, 'Testing', 'user', 'zikuk@mailinator.com', '', '$2y$13$reAhRYkzVDILNLi7zkhyn.v/Nean0kFArZQpqGMmq1zk5HpgHvXOa', NULL, 'zikuk@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(71, 0, 'Test', 'user', 'jyqavexo@mailinator.com', '', '$2y$13$iVbVc.1/W9zdMTCgOGn60evQqm6IWXRxp8G0NzGG2THOaJPQX67UC', NULL, 'jyqavexo@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(72, 0, 'Cora Oneil', 'user', 'cykokace@mailinator.com', '', '$2y$13$UYkJTKa4WtNadlnSc6wEJ.Lu0X6ckMkvWS.zlrNH0Qv0rtfnhmg.S', NULL, 'cykokace@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(73, 0, 'Rosalyn Delaney', 'user', 'cycydege@mailinator.com', '', '$2y$13$T36u2k7bCEkEQX6xomt1SuPBIsehpjFa52oOICqY0kzOmRLAGWsHG', NULL, 'cycydege@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(74, 0, 'Quamar Benjamin', 'user', 'sufebok@mailinator.net', '', '$2y$13$Ggq1XM19z2cI6s6OJT993uRyFIq55ENi4J.wIg8UHoXywE199mY2a', NULL, 'sufebok@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(76, 0, 'Alan Todd', 'user', 'xugepa@mailinator.net', '', '$2y$13$0CUYfg65xVI1bpWQeJjj2eV0dadbHEMRRliPpCAkdl0OsNvAsBMcm', NULL, 'xugepa@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(77, 0, 'Ciara Cannon', 'user', 'giqusewima@mailinator.net', '', '$2y$13$HYsXSF4k5tHgY5vFrZ9Ulej7D3LS7vDPjkbyxvnJPRE1lyFHRVJJy', NULL, 'giqusewima@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(78, 0, 'Daquan Bender', 'user', 'fomylabaxe@mailinator.net', '', '$2y$13$cs9w/r7Qs.4rCSFs9z3sWukkxuH81WswS.aMhegvou7lakPMyH.ge', NULL, 'fomylabaxe@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(79, 0, 'Rashad Pierce', 'user', 'xolu@mailinator.com', '', '$2y$13$n/qa7Fq0J.jMZzMGguizTuOiCm8gn9NWiuOq9KRCT3FYYCohi/XlS', NULL, 'xolu@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(80, 0, 'Odette Wolfe', 'user', 'becumaby@mailinator.net', '', '$2y$13$owHmwmWViMglixqpwiR9Q.TvuZV6cH2i4K0hSE/6WFaCL0oSDPp2m', NULL, 'becumaby@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(81, 0, 'Quamar Richard', 'user', 'kijuneri@mailinator.com', '', '$2y$13$pdcykJxIG3W1yg/cErUGaed84Hbmj3x1iBujdUwt5NygjqQe8di0a', NULL, 'kijuneri@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(82, 0, 'Forrest Maldonado', 'user', 'kovygulaqo@mailinator.com', '', '$2y$13$MCJnwC9L.CsW6I4hjJFvw.Xz2DHEgPyWqsRf4ZRtY2sWidy9BeseO', NULL, 'kovygulaqo@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(83, 0, 'Eve Reynolds', 'user', 'jareh@mailinator.com', '', '$2y$13$247ze1qJTX80pIb/5UQScu6wiq03ZT1mwYz1xUdb.dGppMnnilyYy', NULL, 'jareh@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(84, 0, 'Alea Wiley', 'user', 'lahywi@mailinator.com', '', '$2y$13$O4Hg54RmIbS3v/RXzGHkFel7G31fCK3BBcxd/ACMODuA46rIiJqC2', NULL, 'lahywi@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(85, 0, 'Ariel Gilliam', 'user', 'xamihoh@mailinator.net', '', '$2y$13$fJlZ3QsI9MInBNItS49UfeJbB9jBvbi.FLZwGXFkt.QoUm2H00Dfa', NULL, 'xamihoh@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(86, 0, 'Stone Nixon', 'user', 'levip@mailinator.net', '', '$2y$13$1OzvhQtZYI7ybyWv27u.GOi7b8iFrcEjcu2GWnf3j2vnS02Y643Si', NULL, 'levip@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(88, 0, 'Gage Page', 'user', 'vecysozu@mailinator.com', '', '$2y$13$ZE.C5YUCHmq5BWvuj3T7nOFuLDYLDf2X.jEcZBuhmHXEXmG.Esagq', NULL, 'vecysozu@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(89, 0, 'Oscar Dudley', 'user', 'xewu@mailinator.net', '', '$2y$13$dJBIdJN5Dv0eFXdU9afGLucgDply56AQutSKEgKK70ldhiFnmnF2i', NULL, 'xewu@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(90, 0, 'Pascale Cole', 'user', 'kimo@mailinator.com', '', '$2y$13$c9uPBmozW5ukRLuVHsj2u.M/icj7TEoJSI4/9A4vyX2vYf4Nn.Y8.', NULL, 'kimo@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(91, 0, 'Gavin Phillips', 'user', 'lufo@mailinator.net', '', '$2y$13$Js/rkwTK6qKhK3CqVOlVyuJnXu2V9GVzTnUm92RKQRx/bOHnS/DL2', NULL, 'lufo@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(93, 0, 'Athena Blankenship', 'user', 'qoconanira@mailinator.net', '', '$2y$13$lQqxddJQpmBnkxex0ALeZerfNxlp1r6LSDzTq7Gu2BMH2XBhdbAtS', NULL, 'qoconanira@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(95, 0, 'Charde Stark', 'user', 'xoruga@mailinator.net', '', '$2y$13$hceBr23YX7ssj/Phdj93/uv82iPbSu5rfLgffwrrpT3daxPjw8eOK', NULL, 'xoruga@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(97, 0, 'Sierra Finley', 'user', 'fydikymazy@mailinator.net', '', '$2y$13$JUAcE2lDF0mGx5Idy1.QKOn/MkSlp.bWmcaFmueUqD85x5a/foy8S', NULL, 'fydikymazy@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(98, 0, 'Odessa Estes', 'user', 'nofikocok@mailinator.com', '', '$2y$13$MD7RCrI5DJtkN6Qlds/6/utSbSnbEAqlyYAS6zNjDm9MfMa80OXxS', NULL, 'nofikocok@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(100, 0, 'Emmanuel Stephenson', 'user', 'muzyvesepi@mailinator.net', '', '$2y$13$hW/Rtc7JL9ndT3rBIA8HgeRTv9KIWV4DrqHuUJKkD5WkmhNQhGj3y', NULL, 'muzyvesepi@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(102, 0, 'Plato Hahn', 'user', 'fonagyvon@mailinator.net', '', '$2y$13$qL6HHp/yXn8MY18qfDXuMuEfHiMHtzCEvRoV82UB0oCrTfpDew17G', NULL, 'fonagyvon@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(103, 0, 'Summer Campos', 'user', 'ducequr@mailinator.net', '', '$2y$13$7lGeXbWeF1neiCsWU.IEveCHu0AE0H/oDbxk9ZkQDEmBVJ4llntVC', NULL, 'ducequr@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(105, 0, 'Aladdin Maynard', 'user', 'xoziziwaw@mailinator.net', '', '$2y$13$rdJoEOcenKX4UeT7z5XV1ewEpK/c5E6Jy9RdvfQAVIwWQbHsZ/GrG', NULL, 'xoziziwaw@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(107, 0, 'Colleen Hood', 'user', 'pajono@mailinator.com', '', '$2y$13$iNhk.uhZSYWMk.De6ccZI.aN6CXoAFF3U.O3S55h7IR59llpmsnOW', NULL, 'pajono@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(108, 0, 'Zenaida Dennis', 'user', 'sorykixuji@mailinator.net', '', '$2y$13$SeKg0yQfVfECqINGoc9SnuHDF/aVg/TgsIkmMYPm5v0UbpXlD51z2', NULL, 'sorykixuji@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(109, 0, 'Lara Diaz', 'user', 'cevuxahywo@mailinator.com', '', '$2y$13$p5jCNwoq.8TzOhEQtZVGtuJr3kIdYl.r/Ft1mmmf6QvzGKRBMJQqy', NULL, 'cevuxahywo@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(110, 0, 'Camille Fuller', 'user', 'qiwywadyc@mailinator.com', '', '$2y$13$tt8NCUPb/ng/Z2SARWqDC.hExMofsCA.nO35M7U9Dh6KuxTB11MiG', NULL, 'qiwywadyc@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(111, 0, 'Akeem Mitchell', 'user', 'zizubyfoh@mailinator.net', '', '$2y$13$5L.dlDM8.g71KSDv4/ul/OVFt/uEOJ/Sfgq20IwTvobq5GiPPdPSa', NULL, 'zizubyfoh@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(112, 0, 'Zeph Orr', 'user', 'zasa@mailinator.net', '', '$2y$13$SSU1qhs7oExNKStDmZOQ7OAJqfrud1DJR5896pqo9twVz2E4tSnJW', NULL, 'zasa@mailinator.net', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(113, 0, 'Lael Goodwin', 'user', 'nasyvykibu@mailinator.com', '', '$2y$13$TGGNVvKOU4FEWWjeya.zwO9e8CSskWQpaElmY1.WSLeGwZAF9UjQS', NULL, 'nasyvykibu@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, ''),
(114, 0, 'Maile Griffith', 'user', 'gulifeho@mailinator.com', '', '$2y$13$mPHVRx.tG7P2kzrahevJDuUpNGACmMXfukc8JyzXOc/iepZPFyOR.', NULL, 'gulifeho@mailinator.com', 0, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_request`
--
ALTER TABLE `client_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directory`
--
ALTER TABLE `directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directory_categories`
--
ALTER TABLE `directory_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inserted_directory_category`
--
ALTER TABLE `inserted_directory_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_category_id` (`category_id`),
  ADD KEY `FK_directory_id` (`directory_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_content`
--
ALTER TABLE `section_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_request`
--
ALTER TABLE `client_request`
  MODIFY `id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `directory`
--
ALTER TABLE `directory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `directory_categories`
--
ALTER TABLE `directory_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `inserted_directory_category`
--
ALTER TABLE `inserted_directory_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `section_content`
--
ALTER TABLE `section_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inserted_directory_category`
--
ALTER TABLE `inserted_directory_category`
  ADD CONSTRAINT `FK_category_id` FOREIGN KEY (`category_id`) REFERENCES `directory_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_directory_id` FOREIGN KEY (`directory_id`) REFERENCES `directory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
