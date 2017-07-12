-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2016 at 12:22 AM
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
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(12) NOT NULL,
  `country` int(4) NOT NULL,
  `street_direction` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `lattitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `country`, `street_direction`, `state`, `city`, `town`, `street`, `no`, `lattitude`, `longitude`) VALUES
(1, 1, 'No 16 meren close satellite town lagos', 'imo state', 'amuwo odofin', 'satellite', 'no 15  judas', '16', 42.579623, -71.99363),
(2, 1, 'some fake oda adress', 'borno', 'amaamda', 'sdfasdlkf', 'sfdl;safslsjf', 'sfdjaldfjls', 22.333, 33.3333),
(3, 1, 'some fake oda adress', 'borno', 'amaamda', 'sdfasdlkf', 'sfdl;safslsjf', 'sfdjaldfjls', 22.333, 33.3333);

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
  `views` int(25) NOT NULL,
  `added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `person_id`, `views`, `added`) VALUES
(1, 1, 0, '2016-10-06 00:00:00'),
(5, 2, 0, '2016-10-27 21:40:44');

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
(8, 'Hello ', 0, '2016-10-25 12:24:33', 0, 2, 0, 'Property ', 'hemika ', 'ekenemadunagu@gmail.com '),
(9, 'hope rise and darkness remble in our hol ligh ', 1, '2016-11-16 00:17:04', 0, 1, 0, 'Property ', 'Ekene Madunagu ', 'ekenemadunagu@yahoo.com '),
(10, 'hope rise and darkness remble in our hol ligh\' moun sf\'as fasl;f jasl//sf.f,.sf<>FSDfsddflkas ', 1, '2016-11-16 00:17:36', 0, 1, 0, 'Property ', 'Ekene Madunagu ', 'ekenemadunagu@yahoo.com ');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contained` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `name`, `contained`) VALUES
(1, 'agents', 'Have a look at our versatile agents bring to your knowledge available properties from all parts of your area '),
(2, 'most_viewed', 'probably the mos interesting properties available for you at the moment . Acquire before someone else does  ');

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

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `url`, `size`, `rel_class`, `type`, `extension`, `added`, `base_name`, `rel_id`) VALUES
(1, 'cwj9yx8gla ', 43356, 'Property ', 'picture', 'jpg ', '2016-10-25 16:43:46', '14089119_10210439770577396_8358744530113848217_n.jpg ', 1),
(2, '6l5yxbtfnu ', 19520, 'Property ', 'picture', 'jpg ', '2016-10-25 16:43:47', '14141680_10210439770937405_5581300974878248032_n.jpg ', 1),
(3, 'lmwyr2ts6m ', 179711, 'Property ', 'picture', 'jpg ', '2016-10-25 16:43:50', 'Insight-Engineering-Electrical-Engineering-Services.jpg ', 1),
(4, 'x66wd7jrpn ', 71762, 'Property ', 'picture', 'jpg ', '2016-10-25 16:43:53', 'maxresdefault.jpg ', 1),
(5, 'qq3qjr28ab ', 36986, 'Property ', 'picture', 'jpg ', '2016-10-25 16:43:54', 'metso-global-service-center-helsinki-2015-002.jpg ', 1),
(6, 'o9uemjkexe ', 1028599, 'Property ', 'picture', 'jpg ', '2016-10-25 16:44:04', 'wltw86w4g8.jpg ', 1),
(7, '0d10jioiot ', 59497, 'Property ', 'picture', 'jpg ', '2016-10-25 17:03:31', '20160321195230.jpg ', 2),
(8, '2r7dawzr59 ', 39535, 'Property ', 'picture', 'jpg ', '2016-10-25 17:03:32', '20160321204428.jpg ', 2),
(9, 'j5smv11efj ', 5600, 'Property ', 'picture', 'jpg ', '2016-10-25 17:03:33', '20160424013401.jpg ', 2),
(10, 'zf6ag2icm4 ', 35603, 'Property ', 'picture', 'jpg ', '2016-10-25 17:03:34', '20160424013442.jpg ', 2),
(11, 'o5543s07qn ', 96880, 'Property ', 'picture', 'jpg ', '2016-10-25 17:07:10', 'industry-oil-and-gas.jpg ', 3),
(12, 'msy6b3maxs ', 2020587, 'Property ', 'picture', 'jpg ', '2016-10-25 17:07:16', 'oilandgasfield.jpg ', 3),
(13, '3ij55squ5l ', 175226, 'Property ', 'picture', 'jpg ', '2016-10-25 17:07:17', '2.jpg ', 3),
(14, 'm5xwtpw7ds ', 80269, 'Property ', 'picture', 'jpg ', '2016-10-25 17:07:19', 'banner_31.jpg ', 3),
(15, 'uex451jvlz ', 67310, 'Property ', 'picture', 'jpg ', '2016-10-25 17:07:20', 'Construction.jpg ', 3),
(16, 'ttktu6wg8l ', 32945, 'Property ', 'picture', 'jpg ', '2016-10-25 17:07:21', 'instrument.jpg ', 3),
(17, 'v0b1lbnq5k ', 139552, 'Property ', 'picture', 'jpg ', '2016-10-25 17:07:25', 'Top-10-Oil-Gas-Companies-in-Nigeria.jpg ', 3),
(18, 'xk3qg1i341 ', 74491, 'Property ', 'picture', 'jpg ', '2016-10-25 17:07:26', '5.jpg ', 3),
(20, 'wtsuay1jsu ', 9324, 'Property ', 'picture', 'jpg ', '2016-11-05 22:10:35', 'images.jpg ', 4),
(21, 'hom08uhkn6 ', 30890, 'Property ', 'picture', 'jpg ', '2016-11-05 22:10:36', 'tiny-house-for-sale-near-austin-tx-008.jpg ', 4),
(22, 'mms7rr313u ', 94572, 'Property ', 'picture', 'jpg ', '2016-11-05 22:10:37', 'Modern-Home-Interior-620x350.jpg ', 4),
(23, 'h0b7h2on2w ', 17856, 'Property ', 'picture', 'jpg ', '2016-11-05 22:10:38', 'houses-for-sale-inside-and-out-4610-wildwood-road-in-bluffview-homes-for-sale-in-dallas-fort-worth-briggs-freeman-sothebys-living-room-620x350.jpg ', 4),
(24, 'xkny9r9scn ', 54918, 'Property ', 'picture', 'jpg ', '2016-11-05 22:10:39', 'tinyhouse9.jpg ', 4),
(25, 'aihzspb77h ', 46267, 'Property ', 'picture', 'jpg ', '2016-11-05 22:10:40', 'Melyssas-house-for-sale-in-Washington.jpg ', 4),
(26, '52gelx3lzo ', 51815, 'Property ', 'picture', 'jpg ', '2016-11-05 22:10:41', 'housesale5.jpg ', 4),
(27, 'cf3knnaivp ', 54108, 'User ', 'picture', 'jpg ', '2016-11-21 15:26:55', '12132972_159490127731738_2062378939_n.jpg ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `local_govt`
--

CREATE TABLE `local_govt` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `local_govt`
--

INSERT INTO `local_govt` (`id`, `name`, `state_id`) VALUES
(1, 'Aba South', 1),
(2, 'Arochukwu', 1),
(3, 'Bende', 1),
(4, 'Ikwuano', 1),
(5, 'Isiala Ngwa North', 1),
(6, 'Isiala Ngwa South', 1),
(7, 'Isuikwuato', 1),
(8, 'Obi Ngwa', 1),
(9, 'Ohafia', 1),
(10, 'Osisioma', 1),
(11, 'Ugwunagbo', 1),
(12, 'Ukwa East', 1),
(13, 'Ukwa West', 1),
(14, 'Umuahia North', 1),
(15, 'Umuahia South', 1),
(16, 'Umu Nneochi', 1),
(17, 'Fufure', 2),
(18, 'Ganye', 2),
(19, 'Gayuk', 2),
(20, 'Gombi', 2),
(21, 'Grie', 2),
(22, 'Hong', 2),
(23, 'Jada', 2),
(24, 'Lamurde', 2),
(25, 'Madagali', 2),
(26, 'Maiha', 2),
(27, 'Mayo Belwa', 2),
(28, 'Michika', 2),
(29, 'Mubi North', 2),
(30, 'Mubi South', 2),
(31, 'Numan', 2),
(32, 'Shelleng', 2),
(33, 'Song', 2),
(34, 'Toungo', 2),
(35, 'Yola North', 2),
(36, 'Yola South', 2),
(37, 'Eastern Obolo', 3),
(38, 'Eket', 3),
(39, 'Esit Eket', 3),
(40, 'Essien Udim', 3),
(41, 'Etim Ekpo', 3),
(42, 'Etinan', 3),
(43, 'Ibeno', 3),
(44, 'Ibesikpo Asutan', 3),
(45, 'Ibiono-Ibom', 3),
(46, 'Ika', 3),
(47, 'Ikono', 3),
(48, 'Ikot Abasi', 3),
(49, 'Ikot Ekpene', 3),
(50, 'Ini', 3),
(51, 'Itu', 3),
(52, 'Mbo', 3),
(53, 'Mkpat-Enin', 3),
(54, 'Nsit-Atai', 3),
(55, 'Nsit-Ibom', 3),
(56, 'Nsit-Ubium', 3),
(57, 'Obot Akara', 3),
(58, 'Okobo', 3),
(59, 'Onna', 3),
(60, 'Oron', 3),
(61, 'Oruk Anam', 3),
(62, 'Udung-Uko', 3),
(63, 'Ukanafun', 3),
(64, 'Uruan', 3),
(65, 'Urue-Offong/Oruko', 3),
(66, 'Uyo', 3),
(67, 'Anambra East', 4),
(68, 'Anambra West', 4),
(69, 'Anaocha', 4),
(70, 'Awka North', 4),
(71, 'Awka South', 4),
(72, 'Ayamelum', 4),
(73, 'Dunukofia', 4),
(74, 'Ekwusigo', 4),
(75, 'Idemili North', 4),
(76, 'Idemili South', 4),
(77, 'Ihiala', 4),
(78, 'Njikoka', 4),
(79, 'Nnewi North', 4),
(80, 'Nnewi South', 4),
(81, 'Ogbaru', 4),
(82, 'Onitsha North', 4),
(83, 'Onitsha South', 4),
(84, 'Orumba North', 4),
(85, 'Orumba South', 4),
(86, 'Oyi', 4),
(87, 'Bauchi', 5),
(88, 'Bogoro', 5),
(89, 'Damban', 5),
(90, 'Darazo', 5),
(91, 'Dass', 5),
(92, 'Gamawa', 5),
(93, 'Ganjuwa', 5),
(94, 'Giade', 5),
(95, 'Itas/Gadau', 5),
(96, 'Jama\'are', 5),
(97, 'Katagum', 5),
(98, 'Kirfi', 5),
(99, 'Misau', 5),
(100, 'Ningi', 5),
(101, 'Shira', 5),
(102, 'Tafawa Balewa', 5),
(103, 'Toro', 5),
(104, 'Warji', 5),
(105, 'Zaki', 5),
(106, 'Ekeremor', 6),
(107, 'Kolokuma/Opokuma', 6),
(108, 'Nembe', 6),
(109, 'Ogbia', 6),
(110, 'Sagbama', 6),
(111, 'Southern Ijaw', 6),
(112, 'Yenagoa', 6),
(113, 'Apa', 7),
(114, 'Ado', 7),
(115, 'Buruku', 7),
(116, 'Gboko', 7),
(117, 'Guma', 7),
(118, 'Gwer East', 7),
(119, 'Gwer West', 7),
(120, 'Katsina-Ala', 7),
(121, 'Konshisha', 7),
(122, 'Kwande', 7),
(123, 'Logo', 7),
(124, 'Makurdi', 7),
(125, 'Obi', 7),
(126, 'Ogbadibo', 7),
(127, 'Ohimini', 7),
(128, 'Oju', 7),
(129, 'Okpokwu', 7),
(130, 'Oturkpo', 7),
(131, 'Tarka', 7),
(132, 'Ukum', 7),
(133, 'Ushongo', 7),
(134, 'Vandeikya', 7),
(135, 'Askira/Uba', 8),
(136, 'Bama', 8),
(137, 'Bayo', 8),
(138, 'Biu', 8),
(139, 'Chibok', 8),
(140, 'Damboa', 8),
(141, 'Dikwa', 8),
(142, 'Gubio', 8),
(143, 'Guzamala', 8),
(144, 'Gwoza', 8),
(145, 'Hawul', 8),
(146, 'Jere', 8),
(147, 'Kaga', 8),
(148, 'Kala/Balge', 8),
(149, 'Konduga', 8),
(150, 'Kukawa', 8),
(151, 'Kwaya Kusar', 8),
(152, 'Mafa', 8),
(153, 'Magumeri', 8),
(154, 'Maiduguri', 8),
(155, 'Marte', 8),
(156, 'Mobbar', 8),
(157, 'Monguno', 8),
(158, 'Ngala', 8),
(159, 'Nganzai', 8),
(160, 'Shani', 8),
(161, 'Akamkpa', 9),
(162, 'Akpabuyo', 9),
(163, 'Bakassi', 9),
(164, 'Bekwarra', 9),
(165, 'Biase', 9),
(166, 'Boki', 9),
(167, 'Calabar Municipal', 9),
(168, 'Calabar South', 9),
(169, 'Etung', 9),
(170, 'Ikom', 9),
(171, 'Obanliku', 9),
(172, 'Obubra', 9),
(173, 'Obudu', 9),
(174, 'Odukpani', 9),
(175, 'Ogoja', 9),
(176, 'Yakuur', 9),
(177, 'Yala', 9),
(178, 'Aniocha South', 10),
(179, 'Bomadi', 10),
(180, 'Burutu', 10),
(181, 'Ethiope East', 10),
(182, 'Ethiope West', 10),
(183, 'Ika North East', 10),
(184, 'Ika South', 10),
(185, 'Isoko North', 10),
(186, 'Isoko South', 10),
(187, 'Ndokwa East', 10),
(188, 'Ndokwa West', 10),
(189, 'Okpe', 10),
(190, 'Oshimili North', 10),
(191, 'Oshimili South', 10),
(192, 'Patani', 10),
(193, 'Sapele', 10),
(194, 'Udu', 10),
(195, 'Ughelli North', 10),
(196, 'Ughelli South', 10),
(197, 'Ukwuani', 10),
(198, 'Uvwie', 10),
(199, 'Warri North', 10),
(200, 'Warri South', 10),
(201, 'Warri South West', 10),
(202, 'Afikpo North', 11),
(203, 'Afikpo South', 11),
(204, 'Ebonyi', 11),
(205, 'Ezza North', 11),
(206, 'Ezza South', 11),
(207, 'Ikwo', 11),
(208, 'Ishielu', 11),
(209, 'Ivo', 11),
(210, 'Izzi', 11),
(211, 'Ohaozara', 11),
(212, 'Ohaukwu', 11),
(213, 'Onicha', 11),
(214, 'Egor', 12),
(215, 'Esan Central', 12),
(216, 'Esan North-East', 12),
(217, 'Esan South-East', 12),
(218, 'Esan West', 12),
(219, 'Etsako Central', 12),
(220, 'Etsako East', 12),
(221, 'Etsako West', 12),
(222, 'Igueben', 12),
(223, 'Ikpoba Okha', 12),
(224, 'Orhionmwon', 12),
(225, 'Oredo', 12),
(226, 'Ovia North-East', 12),
(227, 'Ovia South-West', 12),
(228, 'Owan East', 12),
(229, 'Owan West', 12),
(230, 'Uhunmwonde', 12),
(231, 'Efon', 13),
(232, 'Ekiti East', 13),
(233, 'Ekiti South-West', 13),
(234, 'Ekiti West', 13),
(235, 'Emure', 13),
(236, 'Gbonyin', 13),
(237, 'Ido Osi', 13),
(238, 'Ijero', 13),
(239, 'Ikere', 13),
(240, 'Ikole', 13),
(241, 'Ilejemeje', 13),
(242, 'Irepodun/Ifelodun', 13),
(243, 'Ise/Orun', 13),
(244, 'Moba', 13),
(245, 'Oye', 13),
(246, 'Awgu', 14),
(247, 'Enugu East', 14),
(248, 'Enugu North', 14),
(249, 'Enugu South', 14),
(250, 'Ezeagu', 14),
(251, 'Igbo Etiti', 14),
(252, 'Igbo Eze North', 14),
(253, 'Igbo Eze South', 14),
(254, 'Isi Uzo', 14),
(255, 'Nkanu East', 14),
(256, 'Nkanu West', 14),
(257, 'Nsukka', 14),
(258, 'Oji River', 14),
(259, 'Udenu', 14),
(260, 'Udi', 14),
(261, 'Uzo Uwani', 14),
(262, 'Bwari', 15),
(263, 'Gwagwalada', 15),
(264, 'Kuje', 15),
(265, 'Kwali', 15),
(266, 'Municipal Area Council', 15),
(267, 'Balanga', 16),
(268, 'Billiri', 16),
(269, 'Dukku', 16),
(270, 'Funakaye', 16),
(271, 'Gombe', 16),
(272, 'Kaltungo', 16),
(273, 'Kwami', 16),
(274, 'Nafada', 16),
(275, 'Shongom', 16),
(276, 'Yamaltu/Deba', 16),
(277, 'Ahiazu Mbaise', 17),
(278, 'Ehime Mbano', 17),
(279, 'Ezinihitte', 17),
(280, 'Ideato North', 17),
(281, 'Ideato South', 17),
(282, 'Ihitte/Uboma', 17),
(283, 'Ikeduru', 17),
(284, 'Isiala Mbano', 17),
(285, 'Isu', 17),
(286, 'Mbaitoli', 17),
(287, 'Ngor Okpala', 17),
(288, 'Njaba', 17),
(289, 'Nkwerre', 17),
(290, 'Nwangele', 17),
(291, 'Obowo', 17),
(292, 'Oguta', 17),
(293, 'Ohaji/Egbema', 17),
(294, 'Okigwe', 17),
(295, 'Orlu', 17),
(296, 'Orsu', 17),
(297, 'Oru East', 17),
(298, 'Oru West', 17),
(299, 'Owerri Municipal', 17),
(300, 'Owerri North', 17),
(301, 'Owerri West', 17),
(302, 'Unuimo', 17),
(303, 'Babura', 18),
(304, 'Biriniwa', 18),
(305, 'Birnin Kudu', 18),
(306, 'Buji', 18),
(307, 'Dutse', 18),
(308, 'Gagarawa', 18),
(309, 'Garki', 18),
(310, 'Gumel', 18),
(311, 'Guri', 18),
(312, 'Gwaram', 18),
(313, 'Gwiwa', 18),
(314, 'Hadejia', 18),
(315, 'Jahun', 18),
(316, 'Kafin Hausa', 18),
(317, 'Kazaure', 18),
(318, 'Kiri Kasama', 18),
(319, 'Kiyawa', 18),
(320, 'Kaugama', 18),
(321, 'Maigatari', 18),
(322, 'Malam Madori', 18),
(323, 'Miga', 18),
(324, 'Ringim', 18),
(325, 'Roni', 18),
(326, 'Sule Tankarkar', 18),
(327, 'Taura', 18),
(328, 'Yankwashi', 18),
(329, 'Chikun', 19),
(330, 'Giwa', 19),
(331, 'Igabi', 19),
(332, 'Ikara', 19),
(333, 'Jaba', 19),
(334, 'Jema\'a', 19),
(335, 'Kachia', 19),
(336, 'Kaduna North', 19),
(337, 'Kaduna South', 19),
(338, 'Kagarko', 19),
(339, 'Kajuru', 19),
(340, 'Kaura', 19),
(341, 'Kauru', 19),
(342, 'Kubau', 19),
(343, 'Kudan', 19),
(344, 'Lere', 19),
(345, 'Makarfi', 19),
(346, 'Sabon Gari', 19),
(347, 'Sanga', 19),
(348, 'Soba', 19),
(349, 'Zangon Kataf', 19),
(350, 'Zaria', 19),
(351, 'Albasu', 20),
(352, 'Bagwai', 20),
(353, 'Bebeji', 20),
(354, 'Bichi', 20),
(355, 'Bunkure', 20),
(356, 'Dala', 20),
(357, 'Dambatta', 20),
(358, 'Dawakin Kudu', 20),
(359, 'Dawakin Tofa', 20),
(360, 'Doguwa', 20),
(361, 'Fagge', 20),
(362, 'Gabasawa', 20),
(363, 'Garko', 20),
(364, 'Garun Mallam', 20),
(365, 'Gaya', 20),
(366, 'Gezawa', 20),
(367, 'Gwale', 20),
(368, 'Gwarzo', 20),
(369, 'Kabo', 20),
(370, 'Kano Municipal', 20),
(371, 'Karaye', 20),
(372, 'Kibiya', 20),
(373, 'Kiru', 20),
(374, 'Kumbotso', 20),
(375, 'Kunchi', 20),
(376, 'Kura', 20),
(377, 'Madobi', 20),
(378, 'Makoda', 20),
(379, 'Minjibir', 20),
(380, 'Nasarawa', 20),
(381, 'Rano', 20),
(382, 'Rimin Gado', 20),
(383, 'Rogo', 20),
(384, 'Shanono', 20),
(385, 'Sumaila', 20),
(386, 'Takai', 20),
(387, 'Tarauni', 20),
(388, 'Tofa', 20),
(389, 'Tsanyawa', 20),
(390, 'Tudun Wada', 20),
(391, 'Ungogo', 20),
(392, 'Warawa', 20),
(393, 'Wudil', 20),
(394, 'Batagarawa', 21),
(395, 'Batsari', 21),
(396, 'Baure', 21),
(397, 'Bindawa', 21),
(398, 'Charanchi', 21),
(399, 'Dandume', 21),
(400, 'Danja', 21),
(401, 'Dan Musa', 21),
(402, 'Daura', 21),
(403, 'Dutsi', 21),
(404, 'Dutsin Ma', 21),
(405, 'Faskari', 21),
(406, 'Funtua', 21),
(407, 'Ingawa', 21),
(408, 'Jibia', 21),
(409, 'Kafur', 21),
(410, 'Kaita', 21),
(411, 'Kankara', 21),
(412, 'Kankia', 21),
(413, 'Katsina', 21),
(414, 'Kurfi', 21),
(415, 'Kusada', 21),
(416, 'Mai\'Adua', 21),
(417, 'Malumfashi', 21),
(418, 'Mani', 21),
(419, 'Mashi', 21),
(420, 'Matazu', 21),
(421, 'Musawa', 21),
(422, 'Rimi', 21),
(423, 'Sabuwa', 21),
(424, 'Safana', 21),
(425, 'Sandamu', 21),
(426, 'Zango', 21),
(427, 'Arewa Dandi', 22),
(428, 'Argungu', 22),
(429, 'Augie', 22),
(430, 'Bagudo', 22),
(431, 'Birnin Kebbi', 22),
(432, 'Bunza', 22),
(433, 'Dandi', 22),
(434, 'Fakai', 22),
(435, 'Gwandu', 22),
(436, 'Jega', 22),
(437, 'Kalgo', 22),
(438, 'Koko/Besse', 22),
(439, 'Maiyama', 22),
(440, 'Ngaski', 22),
(441, 'Sakaba', 22),
(442, 'Shanga', 22),
(443, 'Suru', 22),
(444, 'Wasagu/Danko', 22),
(445, 'Yauri', 22),
(446, 'Zuru', 22),
(447, 'Ajaokuta', 23),
(448, 'Ankpa', 23),
(449, 'Bassa', 23),
(450, 'Dekina', 23),
(451, 'Ibaji', 23),
(452, 'Idah', 23),
(453, 'Igalamela Odolu', 23),
(454, 'Ijumu', 23),
(455, 'Kabba/Bunu', 23),
(456, 'Kogi', 23),
(457, 'Lokoja', 23),
(458, 'Mopa Muro', 23),
(459, 'Ofu', 23),
(460, 'Ogori/Magongo', 23),
(461, 'Okehi', 23),
(462, 'Okene', 23),
(463, 'Olamaboro', 23),
(464, 'Omala', 23),
(465, 'Yagba East', 23),
(466, 'Yagba West', 23),
(467, 'Baruten', 24),
(468, 'Edu', 24),
(469, 'Ekiti', 24),
(470, 'Ifelodun', 24),
(471, 'Ilorin East', 24),
(472, 'Ilorin South', 24),
(473, 'Ilorin West', 24),
(474, 'Irepodun', 24),
(475, 'Isin', 24),
(476, 'Kaiama', 24),
(477, 'Moro', 24),
(478, 'Offa', 24),
(479, 'Oke Ero', 24),
(480, 'Oyun', 24),
(481, 'Pategi', 24),
(482, 'Ajeromi-Ifelodun', 25),
(483, 'Alimosho', 25),
(484, 'Amuwo-Odofin', 25),
(485, 'Apapa', 25),
(486, 'Badagry', 25),
(487, 'Epe', 25),
(488, 'Eti Osa', 25),
(489, 'Ibeju-Lekki', 25),
(490, 'Ifako-Ijaiye', 25),
(491, 'Ikeja', 25),
(492, 'Ikorodu', 25),
(493, 'Kosofe', 25),
(494, 'Lagos Island', 25),
(495, 'Lagos Mainland', 25),
(496, 'Mushin', 25),
(497, 'Ojo', 25),
(498, 'Oshodi-Isolo', 25),
(499, 'Shomolu', 25),
(500, 'Surulere', 25),
(501, 'Awe', 26),
(502, 'Doma', 26),
(503, 'Karu', 26),
(504, 'Keana', 26),
(505, 'Keffi', 26),
(506, 'Kokona', 26),
(507, 'Lafia', 26),
(508, 'Nasarawa', 26),
(509, 'Nasarawa Egon', 26),
(510, 'Obi', 26),
(511, 'Toto', 26),
(512, 'Wamba', 26),
(513, 'Agwara', 27),
(514, 'Bida', 27),
(515, 'Borgu', 27),
(516, 'Bosso', 27),
(517, 'Chanchaga', 27),
(518, 'Edati', 27),
(519, 'Gbako', 27),
(520, 'Gurara', 27),
(521, 'Katcha', 27),
(522, 'Kontagora', 27),
(523, 'Lapai', 27),
(524, 'Lavun', 27),
(525, 'Magama', 27),
(526, 'Mariga', 27),
(527, 'Mashegu', 27),
(528, 'Mokwa', 27),
(529, 'Moya', 27),
(530, 'Paikoro', 27),
(531, 'Rafi', 27),
(532, 'Rijau', 27),
(533, 'Shiroro', 27),
(534, 'Suleja', 27),
(535, 'Tafa', 27),
(536, 'Wushishi', 27),
(537, 'Abeokuta South', 28),
(538, 'Ado-Odo/Ota', 28),
(539, 'Egbado North', 28),
(540, 'Egbado South', 28),
(541, 'Ewekoro', 28),
(542, 'Ifo', 28),
(543, 'Ijebu East', 28),
(544, 'Ijebu North', 28),
(545, 'Ijebu North East', 28),
(546, 'Ijebu Ode', 28),
(547, 'Ikenne', 28),
(548, 'Imeko Afon', 28),
(549, 'Ipokia', 28),
(550, 'Obafemi Owode', 28),
(551, 'Odeda', 28),
(552, 'Odogbolu', 28),
(553, 'Ogun Waterside', 28),
(554, 'Remo North', 28),
(555, 'Shagamu', 28),
(556, 'Akoko North-West', 29),
(557, 'Akoko South-West', 29),
(558, 'Akoko South-East', 29),
(559, 'Akure North', 29),
(560, 'Akure South', 29),
(561, 'Ese Odo', 29),
(562, 'Idanre', 29),
(563, 'Ifedore', 29),
(564, 'Ilaje', 29),
(565, 'Ile Oluji/Okeigbo', 29),
(566, 'Irele', 29),
(567, 'Odigbo', 29),
(568, 'Okitipupa', 29),
(569, 'Ondo East', 29),
(570, 'Ondo West', 29),
(571, 'Ose', 29),
(572, 'Owo', 29),
(573, 'Atakunmosa West', 30),
(574, 'Aiyedaade', 30),
(575, 'Aiyedire', 30),
(576, 'Boluwaduro', 30),
(577, 'Boripe', 30),
(578, 'Ede North', 30),
(579, 'Ede South', 30),
(580, 'Ife Central', 30),
(581, 'Ife East', 30),
(582, 'Ife North', 30),
(583, 'Ife South', 30),
(584, 'Egbedore', 30),
(585, 'Ejigbo', 30),
(586, 'Ifedayo', 30),
(587, 'Ifelodun', 30),
(588, 'Ila', 30),
(589, 'Ilesa East', 30),
(590, 'Ilesa West', 30),
(591, 'Irepodun', 30),
(592, 'Irewole', 30),
(593, 'Isokan', 30),
(594, 'Iwo', 30),
(595, 'Obokun', 30),
(596, 'Odo Otin', 30),
(597, 'Ola Oluwa', 30),
(598, 'Olorunda', 30),
(599, 'Oriade', 30),
(600, 'Orolu', 30),
(601, 'Osogbo', 30),
(602, 'Akinyele', 31),
(603, 'Atiba', 31),
(604, 'Atisbo', 31),
(605, 'Egbeda', 31),
(606, 'Ibadan North', 31),
(607, 'Ibadan North-East', 31),
(608, 'Ibadan North-West', 31),
(609, 'Ibadan South-East', 31),
(610, 'Ibadan South-West', 31),
(611, 'Ibarapa Central', 31),
(612, 'Ibarapa East', 31),
(613, 'Ibarapa North', 31),
(614, 'Ido', 31),
(615, 'Irepo', 31),
(616, 'Iseyin', 31),
(617, 'Itesiwaju', 31),
(618, 'Iwajowa', 31),
(619, 'Kajola', 31),
(620, 'Lagelu', 31),
(621, 'Ogbomosho North', 31),
(622, 'Ogbomosho South', 31),
(623, 'Ogo Oluwa', 31),
(624, 'Olorunsogo', 31),
(625, 'Oluyole', 31),
(626, 'Ona Ara', 31),
(627, 'Orelope', 31),
(628, 'Ori Ire', 31),
(629, 'Oyo', 31),
(630, 'Oyo East', 31),
(631, 'Saki East', 31),
(632, 'Saki West', 31),
(633, 'Surulere', 31),
(634, 'Barkin Ladi', 32),
(635, 'Bassa', 32),
(636, 'Jos East', 32),
(637, 'Jos North', 32),
(638, 'Jos South', 32),
(639, 'Kanam', 32),
(640, 'Kanke', 32),
(641, 'Langtang South', 32),
(642, 'Langtang North', 32),
(643, 'Mangu', 32),
(644, 'Mikang', 32),
(645, 'Pankshin', 32),
(646, 'Qua\'an Pan', 32),
(647, 'Riyom', 32),
(648, 'Shendam', 32),
(649, 'Wase', 32),
(650, 'Ahoada East', 33),
(651, 'Ahoada West', 33),
(652, 'Akuku-Toru', 33),
(653, 'Andoni', 33),
(654, 'Asari-Toru', 33),
(655, 'Bonny', 33),
(656, 'Degema', 33),
(657, 'Eleme', 33),
(658, 'Emuoha', 33),
(659, 'Etche', 33),
(660, 'Gokana', 33),
(661, 'Ikwerre', 33),
(662, 'Khana', 33),
(663, 'Obio/Akpor', 33),
(664, 'Ogba/Egbema/Ndoni', 33),
(665, 'Ogu/Bolo', 33),
(666, 'Okrika', 33),
(667, 'Omuma', 33),
(668, 'Opobo/Nkoro', 33),
(669, 'Oyigbo', 33),
(670, 'Port Harcourt', 33),
(671, 'Tai', 33),
(672, 'Bodinga', 34),
(673, 'Dange Shuni', 34),
(674, 'Gada', 34),
(675, 'Goronyo', 34),
(676, 'Gudu', 34),
(677, 'Gwadabawa', 34),
(678, 'Illela', 34),
(679, 'Isa', 34),
(680, 'Kebbe', 34),
(681, 'Kware', 34),
(682, 'Rabah', 34),
(683, 'Sabon Birni', 34),
(684, 'Shagari', 34),
(685, 'Silame', 34),
(686, 'Sokoto North', 34),
(687, 'Sokoto South', 34),
(688, 'Tambuwal', 34),
(689, 'Tangaza', 34),
(690, 'Tureta', 34),
(691, 'Wamako', 34),
(692, 'Wurno', 34),
(693, 'Yabo', 34),
(694, 'Bali', 35),
(695, 'Donga', 35),
(696, 'Gashaka', 35),
(697, 'Gassol', 35),
(698, 'Ibi', 35),
(699, 'Jalingo', 35),
(700, 'Karim Lamido', 35),
(701, 'Kumi', 35),
(702, 'Lau', 35),
(703, 'Sardauna', 35),
(704, 'Takum', 35),
(705, 'Ussa', 35),
(706, 'Wukari', 35),
(707, 'Yorro', 35),
(708, 'Zing', 35),
(709, 'Bursari', 36),
(710, 'Damaturu', 36),
(711, 'Fika', 36),
(712, 'Fune', 36),
(713, 'Geidam', 36),
(714, 'Gujba', 36),
(715, 'Gulani', 36),
(716, 'Jakusko', 36),
(717, 'Karasuwa', 36),
(718, 'Machina', 36),
(719, 'Nangere', 36),
(720, 'Nguru', 36),
(721, 'Potiskum', 36),
(722, 'Tarmuwa', 36),
(723, 'Yunusari', 36),
(724, 'Yusufari', 36),
(725, 'Bakura', 37),
(726, 'Birnin Magaji/Kiyaw', 37),
(727, 'Bukkuyum', 37),
(728, 'Bungudu', 37),
(729, 'Gummi', 37),
(730, 'Gusau', 37),
(731, 'Kaura Namoda', 37),
(732, 'Maradun', 37),
(733, 'Maru', 37),
(734, 'Shinkafi', 37),
(735, 'Talata Mafara', 37),
(736, 'Chafe', 37),
(737, 'Zurmi', 37);

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
(1, 'Ekene', 'Madunagu', 'ekenemadunagu@yahoo.com', 'just', '2016-10-06 00:00:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an uknown printer took a galley of type and scrambled it to make a type specimen book It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '08039023345'),
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
(1, 'Oil company For Sale ', 0, 1, '2016-10-25 17:07:09', 1, 15, '2390 ', 2, 3),
(2, 'A nice Residential home ', 0, 1, '2016-10-25 17:03:29', 2, 17, '239 ', 1, 2),
(3, 'Oil company For Sale ', 0, 1, '2016-10-25 17:07:09', 1, 15, '2390 ', 2, 3),
(4, 'NICE House ', 0, 1, '2016-11-05 22:10:34', 1, 11, ' ', 2, 1);

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
(2, 1, 51, '3'),
(3, 1, 52, '2'),
(4, 1, 53, '3'),
(5, 1, 1, 'on'),
(6, 2, 50, '2'),
(7, 2, 51, '3'),
(8, 2, 52, '1'),
(9, 2, 53, '6'),
(10, 2, 1, 'on'),
(11, 2, 2, 'on'),
(12, 2, 6, 'on'),
(13, 2, 7, 'on'),
(14, 3, 50, '2'),
(15, 3, 51, '3'),
(16, 3, 52, '1'),
(17, 3, 53, '6'),
(18, 4, 50, '2'),
(19, 4, 51, '2'),
(20, 4, 52, '2'),
(21, 4, 53, '2'),
(22, 4, 2, 'on'),
(23, 4, 7, 'on');

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
(1, 1, 'An ubiquitous industrial warehouse at ago for sale at a very cheap price to any interested party . It can be useful for the mass production of chemicals and other very usefull small scale processed materials ', 1),
(2, 2, 'a nice house for a large family in a very accommodating area with a lot of good environment and neibours', 1),
(3, 3, 'a large oil company at oloibiri delta state for sale large and with a lot of facilities most of which are completely functional and useful ', 1),
(4, 4, 'a nice house b', 1);

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
  `rel_id` int(25) NOT NULL,
  `rating` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `rel_class`, `rel_id`, `rating`) VALUES
(1, 1, 'Property', 4, 3),
(2, 1, 'Property', 1, 4),
(3, 1, 'Property', 2, 5),
(4, 1, 'Property', 3, 5);

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

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Abia State'),
(2, 'Adamawa State'),
(3, 'Akwa Ibom State'),
(4, 'Anambra State'),
(5, 'Bauchi State'),
(6, 'Bayelsa State'),
(7, 'Benue State'),
(8, 'Borno State'),
(9, 'Cross River State'),
(10, 'Delta State'),
(11, 'Ebonyi State'),
(12, 'Edo State'),
(13, 'Ekiti State'),
(14, 'Enugu State'),
(15, 'FCT'),
(16, 'Gombe State'),
(17, 'Imo State'),
(18, 'Jigawa State'),
(19, 'Kaduna State'),
(20, 'Kano State'),
(21, 'Katsina State'),
(22, 'Kebbi State'),
(23, 'Kogi State'),
(24, 'Kwara State'),
(25, 'Lagos State'),
(26, 'Nasarawa State'),
(27, 'Niger State'),
(28, 'Ogun State'),
(29, 'Ondo State'),
(30, 'Osun State'),
(31, 'Oyo State'),
(32, 'Plateau State'),
(33, 'Rivers State'),
(34, 'Sokoto State'),
(35, 'Taraba State'),
(36, 'Yobe State'),
(37, 'Zamfara State');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
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
  ADD UNIQUE KEY `person_id_2` (`person_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `rel_class` (`rel_class`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `local_govt`
--
ALTER TABLE `local_govt`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `user_id` (`user_id`,`rel_class`,`rel_id`);

--
-- Indexes for table `site_data`
--
ALTER TABLE `site_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `local_govt`
--
ALTER TABLE `local_govt`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=738;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `property_attribute_values`
--
ALTER TABLE `property_attribute_values`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `property_boolean`
--
ALTER TABLE `property_boolean`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `property_details`
--
ALTER TABLE `property_details`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `property_non_boolean`
--
ALTER TABLE `property_non_boolean`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `site_data`
--
ALTER TABLE `site_data`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
