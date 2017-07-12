-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2016 at 12:42 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(12) NOT NULL,
  `country` int(4) NOT NULL,
  `street direction` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `geo_code` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(5) NOT NULL,
  `person_id` int(12) NOT NULL,
  `rights` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(12) NOT NULL,
  `person_id` int(12) NOT NULL,
  `added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `person_id`, `added`) VALUES
(1, 1, '2016-10-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(25) NOT NULL,
  `comment` text NOT NULL,
  `person_id` int(12) NOT NULL,
  `added` datetime NOT NULL,
  `deleted` int(1) NOT NULL,
  `item_id` int(25) NOT NULL,
  `parent_id` int(25) NOT NULL,
  `rel_class` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `person_id`, `added`, `deleted`, `item_id`, `parent_id`, `rel_class`, `name`, `email`) VALUES
(1, 'hello\\\'sf kl fdflas f\\\'s flsa jf?sf als;j  ', 1, '2016-10-23 14:27:43', 0, 1, 0, 'Property ', 'Ekene Madunagu ', 'ekenemadunagu@gmail.com '),
(2, 'ok somehow good for now ', 1, '2016-10-23 15:15:54', 0, 1, 0, 'Property ', 'HI ', 'jkhjhklhkl jjvgj '),
(3, 'hw far ', 1, '2016-10-25 09:59:40', 0, 1, 0, 'Property ', 'Ekene Madunagu ', 'ekenemadunagu@yahoo.com '),
(4, 'nice house ', 1, '2016-10-25 10:00:16', 0, 2, 0, 'Property ', 'Ekene Madunagu ', 'ekenemadunagu@yahoo.com '),
(5, 'hello hello ', 1, '2016-10-25 10:05:03', 0, 2, 0, 'Property ', 'Ekene Madunagu ', 'ekenemadunagu@yahoo.com '),
(6, 'Hello world ', 1, '2016-10-25 12:19:47', 0, 2, 0, 'Property ', 'Ekene Madunagu ', 'ekenemadunagu@yahoo.com '),
(7, 'Hello ', 1, '2016-10-25 12:22:34', 0, 2, 0, 'Property ', 'Ekene Madunagu ', 'ekenemadunagu@yahoo.com '),
(8, 'Hello ', 0, '2016-10-25 12:24:33', 0, 2, 0, 'Property ', 'hemika ', 'ekenemadunagu@gmail.com ');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(20) NOT NULL,
  `token` varchar(255) NOT NULL,
  `rel_id` int(12) NOT NULL,
  `added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `token`, `rel_id`, `added`) VALUES
(1, 'tertp85n6x7crc0', 1, '2016-10-09 23:00:06'),
(2, 'o9nozu6exh9hsoz', 1, '2016-10-10 01:53:53'),
(3, 'emn8rckcw1ajs9k', 1, '2016-10-10 02:45:02'),
(4, 'j7b3fogroplfwz3', 3, '2016-10-10 04:25:29'),
(5, 'aexskgxa4o798kr', 1, '2016-10-20 15:37:59'),
(6, '99ahdcfa64noase', 1, '2016-10-20 15:38:59'),
(7, 'nygdotqf89osf30', 1, '2016-10-20 15:40:57'),
(8, 'q0n0tx5mcnt37d0', 1, '2016-10-20 22:42:52'),
(9, 'aojmjn7fihougy4', 1, '2016-10-20 22:44:28'),
(10, 'sk9ct4aebicx0d5', 4, '2016-10-21 11:13:13'),
(11, 'ug2maqoq1ltzu22', 1, '2016-10-21 17:12:48'),
(12, '67larhmp5woq5db', 1, '2016-10-21 19:55:18'),
(13, 'fpdtk5epi3pxlye', 1, '2016-10-21 19:55:52'),
(14, 'rvqk4gl7wxga6w3', 1, '2016-10-21 19:58:35'),
(15, '9aemub3uho1yzcs', 1, '2016-10-21 19:58:46'),
(16, 'opsi9gzsbmeo721', 1, '2016-10-21 19:59:36'),
(17, 'ti109kf6l1m5y5e', 1, '2016-10-21 19:59:37'),
(18, '6wk7pjlqrhxfstr', 1, '2016-10-21 19:59:45'),
(19, '6r4u75gdduh35f0', 1, '2016-10-21 20:00:17'),
(20, 'wshibteg05lj6tb', 1, '2016-10-24 20:39:26'),
(21, 'quqh6u5ho1co5az', 1, '2016-10-25 10:16:02'),
(22, 'c7kzb4q5vn9zuun', 1, '2016-10-25 13:31:01'),
(23, '0l536yh4f0ctaeq', 1, '2016-10-25 13:31:06'),
(24, 'tfn373xcjyi1yaa', 1, '2016-10-25 13:31:09'),
(25, '32slyvp9n3pmnp1', 1, '2016-10-25 13:31:14'),
(26, 'jvdect72wgpnj92', 1, '2016-10-25 13:31:27'),
(27, 'h56t8yn34xpfucs', 1, '2016-10-25 13:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `size` bigint(50) NOT NULL,
  `rel_class` varchar(255) NOT NULL,
  `type` enum('video','song','picture','document') NOT NULL,
  `extension` varchar(20) NOT NULL,
  `added` datetime NOT NULL,
  `base_name` varchar(255) NOT NULL,
  `rel_id` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(12) NOT NULL,
  `first_name` varchar(70) NOT NULL,
  `last_name` varchar(70) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `about` text NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `first_name`, `last_name`, `email`, `password`, `added`, `about`, `phone`) VALUES
(1, 'Ekene', 'Madunagu', 'ekenemadunagu@yahoo.com', 'ekene1996', '2016-10-06 00:00:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\\\\\\\\\\\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '08039023345'),
(2, 'David ', 'Ekene ', 'david@kkld.com ', 'david ', '2016-10-10 01:14:05', 'Chemical engineering is the branch of engineering that applies physical sciences and life sciences with maths and economics to produce, transform and properly use chemicals. The main concepts in chemical engineering are: Chemical reaction engineering: this involves reaction analysis, reactor designing , managing plant processes and conditions in order to ensure optimal operation . this involves use of data from chemical thermodynamics to solve problems and predict reactor performance.', ''),
(3, 'Lekon ', 'Ore ', 'ore@gmail.com ', 'david ', '2016-10-10 03:19:35', 'A member of Real Estate ', ''),
(4, 'James ', 'Morocco ', 'james@yahoo.com ', 'ekene1996 ', '2016-10-21 10:12:33', 'A member of Real Estate ', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(25) NOT NULL,
  `title` varchar(255) NOT NULL,
  `deleted` int(1) NOT NULL,
  `added` datetime NOT NULL,
  `person_id` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_details`
--

CREATE TABLE `post_details` (
  `id` int(25) NOT NULL,
  `post_text` text NOT NULL,
  `sequence` int(3) NOT NULL,
  `post_id` int(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sold` int(1) NOT NULL,
  `agent_id` int(12) NOT NULL,
  `added` datetime NOT NULL,
  `address_id` int(12) NOT NULL,
  `views` int(12) NOT NULL,
  `price` varchar(255) NOT NULL,
  `transaction` int(1) NOT NULL,
  `category` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `sold`, `agent_id`, `added`, `address_id`, `views`, `price`, `transaction`, `category`) VALUES
(1, 'Apapa golf course ', 0, 1, '2016-10-18 12:48:37', 1, 0, '556 ', 3, 0),
(2, 'felicity suite Ago ', 0, 1, '2016-10-18 12:51:58', 1, 0, '556 ', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_attribute_values`
--

CREATE TABLE `property_attribute_values` (
  `id` int(25) NOT NULL,
  `property_id` int(25) NOT NULL,
  `name_id` int(25) NOT NULL,
  `value_held` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_attribute_values`
--

INSERT INTO `property_attribute_values` (`id`, `property_id`, `name_id`, `value_held`) VALUES
(1, 1, 50, '3'),
(2, 1, 51, '2'),
(3, 1, 52, '1'),
(4, 1, 53, '234'),
(5, 1, 1, 'on'),
(6, 1, 3, 'on'),
(7, 1, 5, 'on'),
(8, 1, 6, 'on'),
(9, 1, 7, 'on'),
(10, 2, 50, '3'),
(11, 2, 51, '2'),
(12, 2, 52, '1'),
(13, 2, 53, '1'),
(14, 2, 1, 'on'),
(15, 2, 3, 'on'),
(16, 2, 5, 'on'),
(17, 2, 6, 'on'),
(18, 2, 7, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `property_boolean`
--

CREATE TABLE `property_boolean` (
  `id` int(25) NOT NULL,
  `code_name` varchar(255) NOT NULL,
  `screen_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_boolean`
--

INSERT INTO `property_boolean` (`id`, `code_name`, `screen_name`) VALUES
(1, 'parking', 'Parking Space'),
(2, 'balcony', 'Balcony'),
(3, 'lawn', 'Lawn'),
(4, 'solar heat', 'Solar Heat'),
(5, 'swimming', 'Swimming Pool'),
(6, 'winecellar', 'Wine Cellar'),
(7, 'schoolclose', 'Close To School'),
(8, 'nightbar', 'Night Bar');

-- --------------------------------------------------------

--
-- Table structure for table `property_details`
--

CREATE TABLE `property_details` (
  `id` int(12) NOT NULL,
  `property_id` int(12) NOT NULL,
  `detail` text NOT NULL,
  `sequence` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_details`
--

INSERT INTO `property_details` (`id`, `property_id`, `detail`, `sequence`) VALUES
(1, 1, 'beautiful golf course with  green grass pool and wide spacing with prairie flowers at apapa a rare gem in a very industrial area', 1),
(2, 2, 'beautiful golf course with  green grass pool and wide spacing with prairie flowers at apapa a rare gem in a very industrial area', 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_non_boolean`
--

CREATE TABLE `property_non_boolean` (
  `id` int(2) NOT NULL,
  `code_name` varchar(255) NOT NULL,
  `screen_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_non_boolean`
--

INSERT INTO `property_non_boolean` (`id`, `code_name`, `screen_name`) VALUES
(50, 'bathrooms', 'Bathrooms'),
(51, 'bedrooms', 'Bedrooms'),
(52, 'parlour', 'Sitting Rooms'),
(53, 'area', 'Area');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(25) NOT NULL,
  `user_id` int(12) NOT NULL,
  `rel_class` varchar(255) NOT NULL,
  `rating` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_data`
--

CREATE TABLE `site_data` (
  `id` int(2) NOT NULL,
  `screen_name` varchar(255) NOT NULL,
  `code_name` varchar(255) NOT NULL,
  `data_value` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_data`
--

INSERT INTO `site_data` (`id`, `screen_name`, `code_name`, `data_value`) VALUES
(1, 'Phone Number', 'phone', '+2348012345678'),
(2, 'Email', 'email', 'info@jjkklls.com'),
(3, 'Address', 'address', 'address address 22'),
(4, 'Title', 'title', 'Real Estate'),
(5, 'About', 'about', 'sdklsad;f kjfsad k;lafsd klj ;jklafsd kljasfd ;klafs klj jklasf kjafs kjkja lfsfasasfdfsadafsda\r\naf;jakl j kla;fsdjk;asdj;klsadf;klfsad\r\najafsd;lk jklafdjk lad kljfs kljfsadklj;');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `person_id` (`person_id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `rel_class` (`rel_class`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rel_id` (`rel_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rel_table` (`rel_class`),
  ADD KEY `type` (`type`),
  ADD KEY `rel_id` (`rel_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`email`,`password`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_details`
--
ALTER TABLE `post_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_attribute_values`
--
ALTER TABLE `property_attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `name` (`name_id`);

--
-- Indexes for table `property_boolean`
--
ALTER TABLE `property_boolean`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_details`
--
ALTER TABLE `property_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `property_non_boolean`
--
ALTER TABLE `property_non_boolean`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`rel_class`);

--
-- Indexes for table `site_data`
--
ALTER TABLE `site_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_details`
--
ALTER TABLE `post_details`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `property_attribute_values`
--
ALTER TABLE `property_attribute_values`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `property_boolean`
--
ALTER TABLE `property_boolean`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `property_details`
--
ALTER TABLE `property_details`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `property_non_boolean`
--
ALTER TABLE `property_non_boolean`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_data`
--
ALTER TABLE `site_data`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
