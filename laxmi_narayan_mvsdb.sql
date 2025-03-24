-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2025 at 12:34 PM
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
-- Database: `laxmi_narayan_mvsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `mobile`, `password`, `status`, `created_at`, `updated_at`, `type`) VALUES
(2, 'Admin', 'admin@gmail.com', '9999999999', 'admin', NULL, '2023-11-03 11:07:42', '2023-11-03 11:07:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `caste`
--

CREATE TABLE `caste` (
  `id` int(11) NOT NULL,
  `caste` varchar(255) DEFAULT NULL,
  `religion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `caste`
--

INSERT INTO `caste` (`id`, `caste`, `religion_id`) VALUES
(1, 'Maratha', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`) VALUES
(1, 'North and Middle Andaman', 32),
(2, 'South Andaman', 32),
(3, 'Nicobar', 32),
(4, 'Adilabad', 1),
(5, 'Anantapur', 1),
(6, 'Chittoor', 1),
(7, 'East Godavari', 1),
(8, 'Guntur', 1),
(9, 'Hyderabad', 1),
(10, 'Kadapa', 1),
(11, 'Karimnagar', 1),
(12, 'Khammam', 1),
(13, 'Krishna', 1),
(14, 'Kurnool', 1),
(15, 'Mahbubnagar', 1),
(16, 'Medak', 1),
(17, 'Nalgonda', 1),
(18, 'Nellore', 1),
(19, 'Nizamabad', 1),
(20, 'Prakasam', 1),
(21, 'Rangareddi', 1),
(22, 'Srikakulam', 1),
(23, 'Vishakhapatnam', 1),
(24, 'Vizianagaram', 1),
(25, 'Warangal', 1),
(26, 'West Godavari', 1),
(27, 'Anjaw', 3),
(28, 'Changlang', 3),
(29, 'East Kameng', 3),
(30, 'Lohit', 3),
(31, 'Lower Subansiri', 3),
(32, 'Papum Pare', 3),
(33, 'Tirap', 3),
(34, 'Dibang Valley', 3),
(35, 'Upper Subansiri', 3),
(36, 'West Kameng', 3),
(37, 'Barpeta', 2),
(38, 'Bongaigaon', 2),
(39, 'Cachar', 2),
(40, 'Darrang', 2),
(41, 'Dhemaji', 2),
(42, 'Dhubri', 2),
(43, 'Dibrugarh', 2),
(44, 'Goalpara', 2),
(45, 'Golaghat', 2),
(46, 'Hailakandi', 2),
(47, 'Jorhat', 2),
(48, 'Karbi Anglong', 2),
(49, 'Karimganj', 2),
(50, 'Kokrajhar', 2),
(51, 'Lakhimpur', 2),
(52, 'Marigaon', 2),
(53, 'Nagaon', 2),
(54, 'Nalbari', 2),
(55, 'North Cachar Hills', 2),
(56, 'Sibsagar', 2),
(57, 'Sonitpur', 2),
(58, 'Tinsukia', 2),
(59, 'Araria', 4),
(60, 'Aurangabad', 4),
(61, 'Banka', 4),
(62, 'Begusarai', 4),
(63, 'Bhagalpur', 4),
(64, 'Bhojpur', 4),
(65, 'Buxar', 4),
(66, 'Darbhanga', 4),
(67, 'Purba Champaran', 4),
(68, 'Gaya', 4),
(69, 'Gopalganj', 4),
(70, 'Jamui', 4),
(71, 'Jehanabad', 4),
(72, 'Khagaria', 4),
(73, 'Kishanganj', 4),
(74, 'Kaimur', 4),
(75, 'Katihar', 4),
(76, 'Lakhisarai', 4),
(77, 'Madhubani', 4),
(78, 'Munger', 4),
(79, 'Madhepura', 4),
(80, 'Muzaffarpur', 4),
(81, 'Nalanda', 4),
(82, 'Nawada', 4),
(83, 'Patna', 4),
(84, 'Purnia', 4),
(85, 'Rohtas', 4),
(86, 'Saharsa', 4),
(87, 'Samastipur', 4),
(88, 'Sheohar', 4),
(89, 'Sheikhpura', 4),
(90, 'Saran', 4),
(91, 'Sitamarhi', 4),
(92, 'Supaul', 4),
(93, 'Siwan', 4),
(94, 'Vaishali', 4),
(95, 'Pashchim Champaran', 4),
(96, 'Bastar', 36),
(97, 'Bilaspur', 36),
(98, 'Dantewada', 36),
(99, 'Dhamtari', 36),
(100, 'Durg', 36),
(101, 'Jashpur', 36),
(102, 'Janjgir-Champa', 36),
(103, 'Korba', 36),
(104, 'Koriya', 36),
(105, 'Kanker', 36),
(106, 'Kawardha', 36),
(107, 'Mahasamund', 36),
(108, 'Raigarh', 36),
(109, 'Rajnandgaon', 36),
(110, 'Raipur', 36),
(111, 'Surguja', 36),
(112, 'Diu', 29),
(113, 'Daman', 29),
(114, 'Central Delhi', 25),
(115, 'East Delhi', 25),
(116, 'New Delhi', 25),
(117, 'North Delhi', 25),
(118, 'North East Delhi', 25),
(119, 'North West Delhi', 25),
(120, 'South Delhi', 25),
(121, 'South West Delhi', 25),
(122, 'West Delhi', 25),
(123, 'North Goa', 26),
(124, 'South Goa', 26),
(125, 'Ahmedabad', 5),
(126, 'Amreli District', 5),
(127, 'Anand', 5),
(128, 'Banaskantha', 5),
(129, 'Bharuch', 5),
(130, 'Bhavnagar', 5),
(131, 'Dahod', 5),
(132, 'The Dangs', 5),
(133, 'Gandhinagar', 5),
(134, 'Jamnagar', 5),
(135, 'Junagadh', 5),
(136, 'Kutch', 5),
(137, 'Kheda', 5),
(138, 'Mehsana', 5),
(139, 'Narmada', 5),
(140, 'Navsari', 5),
(141, 'Patan', 5),
(142, 'Panchmahal', 5),
(143, 'Porbandar', 5),
(144, 'Rajkot', 5),
(145, 'Sabarkantha', 5),
(146, 'Surendranagar', 5),
(147, 'Surat', 5),
(148, 'Vadodara', 5),
(149, 'Valsad', 5),
(150, 'Ambala', 6),
(151, 'Bhiwani', 6),
(152, 'Faridabad', 6),
(153, 'Fatehabad', 6),
(154, 'Gurgaon', 6),
(155, 'Hissar', 6),
(156, 'Jhajjar', 6),
(157, 'Jind', 6),
(158, 'Karnal', 6),
(159, 'Kaithal', 6),
(160, 'Kurukshetra', 6),
(161, 'Mahendragarh', 6),
(162, 'Mewat', 6),
(163, 'Panchkula', 6),
(164, 'Panipat', 6),
(165, 'Rewari', 6),
(166, 'Rohtak', 6),
(167, 'Sirsa', 6),
(168, 'Sonepat', 6),
(169, 'Yamuna Nagar', 6),
(170, 'Palwal', 6),
(171, 'Bilaspur', 7),
(172, 'Chamba', 7),
(173, 'Hamirpur', 7),
(174, 'Kangra', 7),
(175, 'Kinnaur', 7),
(176, 'Kulu', 7),
(177, 'Lahaul and Spiti', 7),
(178, 'Mandi', 7),
(179, 'Shimla', 7),
(180, 'Sirmaur', 7),
(181, 'Solan', 7),
(182, 'Una', 7),
(183, 'Anantnag', 8),
(184, 'Badgam', 8),
(185, 'Bandipore', 8),
(186, 'Baramula', 8),
(187, 'Doda', 8),
(188, 'Jammu', 8),
(189, 'Kargil', 8),
(190, 'Kathua', 8),
(191, 'Kupwara', 8),
(192, 'Leh', 8),
(193, 'Poonch', 8),
(194, 'Pulwama', 8),
(195, 'Rajauri', 8),
(196, 'Srinagar', 8),
(197, 'Samba', 8),
(198, 'Udhampur', 8),
(199, 'Bokaro', 34),
(200, 'Chatra', 34),
(201, 'Deoghar', 34),
(202, 'Dhanbad', 34),
(203, 'Dumka', 34),
(204, 'Purba Singhbhum', 34),
(205, 'Garhwa', 34),
(206, 'Giridih', 34),
(207, 'Godda', 34),
(208, 'Gumla', 34),
(209, 'Hazaribagh', 34),
(210, 'Koderma', 34),
(211, 'Lohardaga', 34),
(212, 'Pakur', 34),
(213, 'Palamu', 34),
(214, 'Ranchi', 34),
(215, 'Sahibganj', 34),
(216, 'Seraikela and Kharsawan', 34),
(217, 'Pashchim Singhbhum', 34),
(218, 'Ramgarh', 34),
(219, 'Bidar', 9),
(220, 'Belgaum', 9),
(221, 'Bijapur', 9),
(222, 'Bagalkot', 9),
(223, 'Bellary', 9),
(224, 'Bangalore Rural District', 9),
(225, 'Bangalore Urban District', 9),
(226, 'Chamarajnagar', 9),
(227, 'Chikmagalur', 9),
(228, 'Chitradurga', 9),
(229, 'Davanagere', 9),
(230, 'Dharwad', 9),
(231, 'Dakshina Kannada', 9),
(232, 'Gadag', 9),
(233, 'Gulbarga', 9),
(234, 'Hassan', 9),
(235, 'Haveri District', 9),
(236, 'Kodagu', 9),
(237, 'Kolar', 9),
(238, 'Koppal', 9),
(239, 'Mandya', 9),
(240, 'Mysore', 9),
(241, 'Raichur', 9),
(242, 'Shimoga', 9),
(243, 'Tumkur', 9),
(244, 'Udupi', 9),
(245, 'Uttara Kannada', 9),
(246, 'Ramanagara', 9),
(247, 'Chikballapur', 9),
(248, 'Yadagiri', 9),
(249, 'Alappuzha', 10),
(250, 'Ernakulam', 10),
(251, 'Idukki', 10),
(252, 'Kollam', 10),
(253, 'Kannur', 10),
(254, 'Kasaragod', 10),
(255, 'Kottayam', 10),
(256, 'Kozhikode', 10),
(257, 'Malappuram', 10),
(258, 'Palakkad', 10),
(259, 'Pathanamthitta', 10),
(260, 'Thrissur', 10),
(261, 'Thiruvananthapuram', 10),
(262, 'Wayanad', 10),
(263, 'Alirajpur', 11),
(264, 'Anuppur', 11),
(265, 'Ashok Nagar', 11),
(266, 'Balaghat', 11),
(267, 'Barwani', 11),
(268, 'Betul', 11),
(269, 'Bhind', 11),
(270, 'Bhopal', 11),
(271, 'Burhanpur', 11),
(272, 'Chhatarpur', 11),
(273, 'Chhindwara', 11),
(274, 'Damoh', 11),
(275, 'Datia', 11),
(276, 'Dewas', 11),
(277, 'Dhar', 11),
(278, 'Dindori', 11),
(279, 'Guna', 11),
(280, 'Gwalior', 11),
(281, 'Harda', 11),
(282, 'Hoshangabad', 11),
(283, 'Indore', 11),
(284, 'Jabalpur', 11),
(285, 'Jhabua', 11),
(286, 'Katni', 11),
(287, 'Khandwa', 11),
(288, 'Khargone', 11),
(289, 'Mandla', 11),
(290, 'Mandsaur', 11),
(291, 'Morena', 11),
(292, 'Narsinghpur', 11),
(293, 'Neemuch', 11),
(294, 'Panna', 11),
(295, 'Rewa', 11),
(296, 'Rajgarh', 11),
(297, 'Ratlam', 11),
(298, 'Raisen', 11),
(299, 'Sagar', 11),
(300, 'Satna', 11),
(301, 'Sehore', 11),
(302, 'Seoni', 11),
(303, 'Shahdol', 11),
(304, 'Shajapur', 11),
(305, 'Sheopur', 11),
(306, 'Shivpuri', 11),
(307, 'Sidhi', 11),
(308, 'Singrauli', 11),
(309, 'Tikamgarh', 11),
(310, 'Ujjain', 11),
(311, 'Umaria', 11),
(312, 'Vidisha', 11),
(313, 'Ahmednagar', 12),
(314, 'Akola', 12),
(315, 'Amrawati', 12),
(316, 'Aurangabad', 12),
(317, 'Bhandara', 12),
(318, 'Beed', 12),
(319, 'Buldhana', 12),
(320, 'Chandrapur', 12),
(321, 'Dhule', 12),
(322, 'Gadchiroli', 12),
(323, 'Gondiya', 12),
(324, 'Hingoli', 12),
(325, 'Jalgaon', 12),
(326, 'Jalna', 12),
(327, 'Kolhapur', 12),
(328, 'Latur', 12),
(329, 'Mumbai City', 12),
(330, 'Mumbai suburban', 12),
(331, 'Nandurbar', 12),
(332, 'Nanded', 12),
(333, 'Nagpur', 12),
(334, 'Nashik', 12),
(335, 'Osmanabad', 12),
(336, 'Parbhani', 12),
(337, 'Pune', 12),
(338, 'Raigad', 12),
(339, 'Ratnagiri', 12),
(340, 'Sindhudurg', 12),
(341, 'Sangli', 12),
(342, 'Solapur', 12),
(343, 'Satara', 12),
(344, 'Thane', 12),
(345, 'Wardha', 12),
(346, 'Washim', 12),
(347, 'Yavatmal', 12),
(348, 'Bishnupur', 13),
(349, 'Churachandpur', 13),
(350, 'Chandel', 13),
(351, 'Imphal East', 13),
(352, 'Senapati', 13),
(353, 'Tamenglong', 13),
(354, 'Thoubal', 13),
(355, 'Ukhrul', 13),
(356, 'Imphal West', 13),
(357, 'East Garo Hills', 14),
(358, 'East Khasi Hills', 14),
(359, 'Jaintia Hills', 14),
(360, 'Ri-Bhoi', 14),
(361, 'South Garo Hills', 14),
(362, 'West Garo Hills', 14),
(363, 'West Khasi Hills', 14),
(364, 'Aizawl', 15),
(365, 'Champhai', 15),
(366, 'Kolasib', 15),
(367, 'Lawngtlai', 15),
(368, 'Lunglei', 15),
(369, 'Mamit', 15),
(370, 'Saiha', 15),
(371, 'Serchhip', 15),
(372, 'Dimapur', 16),
(373, 'Kohima', 16),
(374, 'Mokokchung', 16),
(375, 'Mon', 16),
(376, 'Phek', 16),
(377, 'Tuensang', 16),
(378, 'Wokha', 16),
(379, 'Zunheboto', 16),
(380, 'Angul', 17),
(381, 'Boudh', 17),
(382, 'Bhadrak', 17),
(383, 'Bolangir', 17),
(384, 'Bargarh', 17),
(385, 'Baleswar', 17),
(386, 'Cuttack', 17),
(387, 'Debagarh', 17),
(388, 'Dhenkanal', 17),
(389, 'Ganjam', 17),
(390, 'Gajapati', 17),
(391, 'Jharsuguda', 17),
(392, 'Jajapur', 17),
(393, 'Jagatsinghpur', 17),
(394, 'Khordha', 17),
(395, 'Kendujhar', 17),
(396, 'Kalahandi', 17),
(397, 'Kandhamal', 17),
(398, 'Koraput', 17),
(399, 'Kendrapara', 17),
(400, 'Malkangiri', 17),
(401, 'Mayurbhanj', 17),
(402, 'Nabarangpur', 17),
(403, 'Nuapada', 17),
(404, 'Nayagarh', 17),
(405, 'Puri', 17),
(406, 'Rayagada', 17),
(407, 'Sambalpur', 17),
(408, 'Subarnapur', 17),
(409, 'Sundargarh', 17),
(410, 'Karaikal', 27),
(411, 'Mahe', 27),
(412, 'Puducherry', 27),
(413, 'Yanam', 27),
(414, 'Amritsar', 18),
(415, 'Bathinda', 18),
(416, 'Firozpur', 18),
(417, 'Faridkot', 18),
(418, 'Fatehgarh Sahib', 18),
(419, 'Gurdaspur', 18),
(420, 'Hoshiarpur', 18),
(421, 'Jalandhar', 18),
(422, 'Kapurthala', 18),
(423, 'Ludhiana', 18),
(424, 'Mansa', 18),
(425, 'Moga', 18),
(426, 'Mukatsar', 18),
(427, 'Nawan Shehar', 18),
(428, 'Patiala', 18),
(429, 'Rupnagar', 18),
(430, 'Sangrur', 18),
(431, 'Ajmer', 19),
(432, 'Alwar', 19),
(433, 'Bikaner', 19),
(434, 'Barmer', 19),
(435, 'Banswara', 19),
(436, 'Bharatpur', 19),
(437, 'Baran', 19),
(438, 'Bundi', 19),
(439, 'Bhilwara', 19),
(440, 'Churu', 19),
(441, 'Chittorgarh', 19),
(442, 'Dausa', 19),
(443, 'Dholpur', 19),
(444, 'Dungapur', 19),
(445, 'Ganganagar', 19),
(446, 'Hanumangarh', 19),
(447, 'Juhnjhunun', 19),
(448, 'Jalore', 19),
(449, 'Jodhpur', 19),
(450, 'Jaipur', 19),
(451, 'Jaisalmer', 19),
(452, 'Jhalawar', 19),
(453, 'Karauli', 19),
(454, 'Kota', 19),
(455, 'Nagaur', 19),
(456, 'Pali', 19),
(457, 'Pratapgarh', 19),
(458, 'Rajsamand', 19),
(459, 'Sikar', 19),
(460, 'Sawai Madhopur', 19),
(461, 'Sirohi', 19),
(462, 'Tonk', 19),
(463, 'Udaipur', 19),
(464, 'East Sikkim', 20),
(465, 'North Sikkim', 20),
(466, 'South Sikkim', 20),
(467, 'West Sikkim', 20),
(468, 'Ariyalur', 21),
(469, 'Chennai', 21),
(470, 'Coimbatore', 21),
(471, 'Cuddalore', 21),
(472, 'Dharmapuri', 21),
(473, 'Dindigul', 21),
(474, 'Erode', 21),
(475, 'Kanchipuram', 21),
(476, 'Kanyakumari', 21),
(477, 'Karur', 21),
(478, 'Madurai', 21),
(479, 'Nagapattinam', 21),
(480, 'The Nilgiris', 21),
(481, 'Namakkal', 21),
(482, 'Perambalur', 21),
(483, 'Pudukkottai', 21),
(484, 'Ramanathapuram', 21),
(485, 'Salem', 21),
(486, 'Sivagangai', 21),
(487, 'Tiruppur', 21),
(488, 'Tiruchirappalli', 21),
(489, 'Theni', 21),
(490, 'Tirunelveli', 21),
(491, 'Thanjavur', 21),
(492, 'Thoothukudi', 21),
(493, 'Thiruvallur', 21),
(494, 'Thiruvarur', 21),
(495, 'Tiruvannamalai', 21),
(496, 'Vellore', 21),
(497, 'Villupuram', 21),
(498, 'Dhalai', 22),
(499, 'North Tripura', 22),
(500, 'South Tripura', 22),
(501, 'West Tripura', 22),
(502, 'Almora', 33),
(503, 'Bageshwar', 33),
(504, 'Chamoli', 33),
(505, 'Champawat', 33),
(506, 'Dehradun', 33),
(507, 'Haridwar', 33),
(508, 'Nainital', 33),
(509, 'Pauri Garhwal', 33),
(510, 'Pithoragharh', 33),
(511, 'Rudraprayag', 33),
(512, 'Tehri Garhwal', 33),
(513, 'Udham Singh Nagar', 33),
(514, 'Uttarkashi', 33),
(515, 'Agra', 23),
(516, 'Allahabad', 23),
(517, 'Aligarh', 23),
(518, 'Ambedkar Nagar', 23),
(519, 'Auraiya', 23),
(520, 'Azamgarh', 23),
(521, 'Barabanki', 23),
(522, 'Badaun', 23),
(523, 'Bagpat', 23),
(524, 'Bahraich', 23),
(525, 'Bijnor', 23),
(526, 'Ballia', 23),
(527, 'Banda', 23),
(528, 'Balrampur', 23),
(529, 'Bareilly', 23),
(530, 'Basti', 23),
(531, 'Bulandshahr', 23),
(532, 'Chandauli', 23),
(533, 'Chitrakoot', 23),
(534, 'Deoria', 23),
(535, 'Etah', 23),
(536, 'Kanshiram Nagar', 23),
(537, 'Etawah', 23),
(538, 'Firozabad', 23),
(539, 'Farrukhabad', 23),
(540, 'Fatehpur', 23),
(541, 'Faizabad', 23),
(542, 'Gautam Buddha Nagar', 23),
(543, 'Gonda', 23),
(544, 'Ghazipur', 23),
(545, 'Gorkakhpur', 23),
(546, 'Ghaziabad', 23),
(547, 'Hamirpur', 23),
(548, 'Hardoi', 23),
(549, 'Mahamaya Nagar', 23),
(550, 'Jhansi', 23),
(551, 'Jalaun', 23),
(552, 'Jyotiba Phule Nagar', 23),
(553, 'Jaunpur District', 23),
(554, 'Kanpur Dehat', 23),
(555, 'Kannauj', 23),
(556, 'Kanpur Nagar', 23),
(557, 'Kaushambi', 23),
(558, 'Kushinagar', 23),
(559, 'Lalitpur', 23),
(560, 'Lakhimpur Kheri', 23),
(561, 'Lucknow', 23),
(562, 'Mau', 23),
(563, 'Meerut', 23),
(564, 'Maharajganj', 23),
(565, 'Mahoba', 23),
(566, 'Mirzapur', 23),
(567, 'Moradabad', 23),
(568, 'Mainpuri', 23),
(569, 'Mathura', 23),
(570, 'Muzaffarnagar', 23),
(571, 'Pilibhit', 23),
(572, 'Pratapgarh', 23),
(573, 'Rampur', 23),
(574, 'Rae Bareli', 23),
(575, 'Saharanpur', 23),
(576, 'Sitapur', 23),
(577, 'Shahjahanpur', 23),
(578, 'Sant Kabir Nagar', 23),
(579, 'Siddharthnagar', 23),
(580, 'Sonbhadra', 23),
(581, 'Sant Ravidas Nagar', 23),
(582, 'Sultanpur', 23),
(583, 'Shravasti', 23),
(584, 'Unnao', 23),
(585, 'Varanasi', 23),
(586, 'Birbhum', 24),
(587, 'Bankura', 24),
(588, 'Bardhaman', 24),
(589, 'Darjeeling', 24),
(590, 'Dakshin Dinajpur', 24),
(591, 'Hooghly', 24),
(592, 'Howrah', 24),
(593, 'Jalpaiguri', 24),
(594, 'Cooch Behar', 24),
(595, 'Kolkata', 24),
(596, 'Malda', 24),
(597, 'Midnapore', 24),
(598, 'Murshidabad', 24),
(599, 'Nadia', 24),
(600, 'North 24 Parganas', 24),
(601, 'South 24 Parganas', 24),
(602, 'Purulia', 24),
(603, 'Uttar Dinajpur', 24),
(610, 'Demoadjflk', 42);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(5) NOT NULL,
  `countryCode` char(2) DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryCode`, `name`) VALUES
(105, 'IN', 'India'),
(257, '', 'New Demo'),
(259, '', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `create_plans`
--

CREATE TABLE `create_plans` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `months` varchar(255) DEFAULT NULL,
  `discription` text DEFAULT NULL,
  `rule1` text DEFAULT NULL,
  `rule2` text DEFAULT NULL,
  `rule3` text DEFAULT NULL,
  `rule4` text DEFAULT NULL,
  `visiblePro` int(11) NOT NULL,
  `direct_message` varchar(11) DEFAULT NULL,
  `download_biodata` varchar(11) DEFAULT NULL,
  `chat_allowed` varchar(11) DEFAULT NULL,
  `view_gallery_photo` varchar(11) DEFAULT NULL,
  `view_unlimited_profile` varchar(11) DEFAULT NULL,
  `whatsapp_support` varchar(11) DEFAULT NULL,
  `document_authentication` varchar(11) DEFAULT NULL,
  `personal_matchmaking` varchar(11) DEFAULT NULL,
  `get_highlighted` varchar(11) DEFAULT NULL,
  `get_featured_on_top_search` varchar(11) DEFAULT NULL,
  `verified_profile_contact` varchar(11) DEFAULT NULL,
  `customer_support` varchar(11) DEFAULT NULL,
  `dedicated_executive` varchar(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_plans`
--

INSERT INTO `create_plans` (`id`, `label`, `heading`, `price`, `months`, `discription`, `rule1`, `rule2`, `rule3`, `rule4`, `visiblePro`, `direct_message`, `download_biodata`, `chat_allowed`, `view_gallery_photo`, `view_unlimited_profile`, `whatsapp_support`, `document_authentication`, `personal_matchmaking`, `get_highlighted`, `get_featured_on_top_search`, `verified_profile_contact`, `customer_support`, `dedicated_executive`, `created_at`, `updated_at`) VALUES
(12, 'supreme', 'Pearl', '1999', '3', 'Gold Plan', 'Chat with your matches', 'View 50 contact numbers', 'Get highlighted to your matches', 'Feature on top of search results', 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 11:51:40', '2022-11-23 11:51:40'),
(15, 'premium', 'diamond plus', '3500', '12', 'diamond plus plan', 'Chat with your matches', 'View 100 contact numbers', 'Get highlighted to your matches', 'Feature on top of search results', 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 11:58:10', '2022-11-23 11:58:10'),
(16, 'vip', 'Gold', '2500', '6', 'Chat', 'Chat with your matches', 'View 75 contact numbers	', 'Feature on top of search results', 'Get highlighted to your matches	', 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-10 12:46:56', '2023-04-10 12:46:56'),
(18, 'premium_membership', 'Premium Membership ', '11000', '24', 'Premium Membership', 'Service Manager', 'Introduction & Meetings plan', 'Yes', 'Yes', 500, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '2023-05-24 14:52:02', '2023-05-24 14:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `education` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `education`) VALUES
(1, 'Diploma'),
(2, 'Doctors'),
(3, 'Graduate'),
(4, 'Masters'),
(5, 'Ph.D'),
(6, 'Under Graduate'),
(7, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `education_degree`
--

CREATE TABLE `education_degree` (
  `id` int(11) NOT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `edu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `education_degree`
--

INSERT INTO `education_degree` (`id`, `degree`, `edu_id`) VALUES
(1, '3D-Animation ', 1),
(2, 'A.T.D ', 1),
(3, 'Agri ', 1),
(4, 'Air-Hostess/Cabin-Crew-Training ', 1),
(5, 'Architect ', 1),
(6, 'Artist ', 1),
(7, 'Automobile ', 1),
(8, 'Banking-and-Finance ', 1),
(9, 'Beauty-Care ', 1),
(10, 'Business-Management ', 1),
(11, 'Ceramic-Technology ', 1),
(12, 'Computer-Hardware-Networking ', 1),
(13, 'Computer-Programming', 1),
(14, 'Cosmetology ', 1),
(15, 'Cyber-Security', 1),
(16, 'D.Ed ', 1),
(17, 'D.Pharm ', 1),
(18, 'Dental-Mechanics ', 1),
(19, 'Digital-Marketing ', 1),
(20, 'DMLT ', 1),
(21, 'Engineering ', 1),
(22, 'Fashion-Technology ', 1),
(23, 'Fire-and-Safety ', 1),
(24, 'Fitness-and-Nutrition ', 1),
(25, 'GNM ', 1),
(26, 'Hotel-Management ', 1),
(27, 'Import-Export ', 1),
(28, 'Interior-designing ', 1),
(29, 'ITI ', 1),
(30, 'Jewelry-Designing ', 1),
(31, 'Journalism-and-Mass-Communication ', 1),
(32, 'Medical-Lab-Technology ', 1),
(33, 'Nursing ', 1),
(34, 'Photography ', 1),
(35, 'Physiotherapy ', 1),
(36, 'Plastics-Technology ', 1),
(37, 'Polytechnic ', 1),
(38, 'Radiological-Technology ', 1),
(39, 'Stenography ', 1),
(40, 'VJ ', 1),
(41, 'Yoga-Education', 1),
(42, 'Education-Degree', 2),
(43, 'B.Sc-Nursing ', 2),
(44, 'MBBS ', 2),
(45, 'MBBS-&-MD ', 2),
(46, 'BAMS ', 2),
(47, 'BAMS-&-MD ', 2),
(48, 'BAMS-&-MS ', 2),
(49, 'BDS ', 2),
(50, 'BHMS ', 2),
(51, 'BHMS-&-MD ', 2),
(52, 'BHMS-&-PGDEMS ', 2),
(53, 'BPTH ', 2),
(54, 'BSMS ', 2),
(55, 'BUMS ', 2),
(56, 'BVSC ', 2),
(57, 'MBBS(DNB) ', 2),
(58, 'MBBS-&-DOMS ', 2),
(59, 'MBBS-&-MS ', 2),
(60, 'MBBS-&-MS(Ortho) ', 2),
(61, 'MBBS-DCP', 2),
(62, 'MBBS-Ent-Surgeon ', 2),
(63, 'MBBS/D-Ortho ', 2),
(64, 'MBBS/DGO ', 2),
(65, 'MBBS/DMRE ', 2),
(66, 'MBBS/FCPS ', 2),
(67, 'MBBS/MCPS ', 2),
(68, 'MBBS/PGDMT ', 2),
(69, 'MBBS/PGDMT ', 2),
(70, 'MDS ', 2),
(71, 'MPTH ', 2),
(72, 'MS(Medical) ', 2),
(73, 'MVSC ', 2),
(74, 'Aeronautical-Engineering', 3),
(75, 'Aviation-Degree     ', 3),
(76, 'B.A     ', 3),
(77, 'B.A/B.Ed ', 3),
(78, 'B.A/D.Ed', 3),
(79, 'B.Arch', 3),
(80, 'B.Com ', 3),
(81, 'B.Ed ', 3),
(82, 'B.L.', 3),
(83, 'B.LIB', 3),
(84, 'B.M.M', 3),
(85, 'B.P.Ed ', 3),
(86, 'B.Pharm', 3),
(87, 'B.Phil', 3),
(88, 'B.Plan-B.SC IT/Computer Science', 3),
(89, 'B.S(Engineering)', 3),
(90, 'B.SC', 3),
(91, 'B.sc-Agri ', 3),
(92, 'B.Sc-Nursing ', 3),
(93, 'B.Tech ', 3),
(94, 'BBA', 3),
(95, 'BCA', 3),
(96, 'BCS', 3),
(97, 'BE', 3),
(98, 'BE/B.Tech', 3),
(99, 'BFA ', 3),
(100, 'BFA ', 3),
(101, 'BFA ', 3),
(102, 'BFA ', 3),
(103, 'BFM', 3),
(104, 'BFT', 3),
(105, 'BGL ', 3),
(106, 'BGL/B.L./LL.B. ', 3),
(107, 'BHA /BHM(Hospital-Administration)  ', 3),
(108, 'BHM(Hotel-Management) ', 3),
(109, 'BHSc ', 3),
(110, 'BLIS ', 3),
(111, 'BMM ', 3),
(112, 'BMS ', 3),
(113, 'BS ', 3),
(114, 'BSL ', 3),
(115, 'BSW ', 3),
(116, 'CA ', 3),
(117, 'CFA(Chartered-Financial-Analyst) ', 3),
(118, 'CS ', 3),
(119, 'D.Ed ', 3),
(120, 'D.Ed/B.Ed ', 3),
(121, 'Fashion-Designer ', 3),
(122, 'ICWA ', 3),
(123, 'LL.B ', 3),
(124, 'B.E/MS', 4),
(125, 'B.Tech/MS ', 4),
(126, 'BE - MBA ', 4),
(127, 'LL.M ', 4),
(128, 'M.A ', 4),
(129, 'M.A B.Ed', 4),
(130, 'M.A D.Ed ', 4),
(131, 'M.Arch', 4),
(132, 'M.Com ', 4),
(133, 'M.Ed', 4),
(134, 'M.L ', 4),
(135, 'M.L./LL.M ', 4),
(136, 'M.Lib ', 4),
(137, 'M.Pharm ', 4),
(138, 'M.Phil ', 4),
(139, 'M.S ', 4),
(140, 'M.Sc', 4),
(141, 'M.Sc-Agri', 4),
(142, 'M.Tech', 4),
(143, 'Master-in-Sport', 4),
(144, 'Master-in-Sport', 4),
(145, 'MBA', 4),
(146, 'MBA/PGDM ', 4),
(147, 'MBM(Masters-in-Business-and-Management) ', 4),
(148, 'MCA', 4),
(149, 'MCA/PGDCA ', 4),
(150, 'MCM', 4),
(151, 'MCS', 4),
(152, 'MDes', 4),
(153, 'ME', 4),
(154, 'ME/M.Tech', 4),
(155, 'MFA', 4),
(156, 'MFM(Financial-Management)', 4),
(157, 'MHA/MHM (Hospital-Administration) ', 4),
(158, 'MHM (Hotel-Management)', 4),
(159, 'MHRM(Human-Resource-Management)', 4),
(160, 'MLIS', 4),
(161, 'MLS', 4),
(162, 'MMS', 4),
(163, 'Msc-B.Ed', 4),
(164, 'MSW', 4),
(165, 'PG-in-Securities-Market', 4),
(166, 'PGDCA', 4),
(167, 'PGDM', 4),
(168, 'PhD-Biotechnology', 5),
(169, 'PhD-Business-Administration', 5),
(170, 'PhD-Economics', 5),
(171, 'PhD-Geography', 5),
(172, 'PhD-in-Accounting-and-Financial-Management', 5),
(173, 'PhD-in-Applied-Chemistry-&-Polymer-Technology', 5),
(174, 'PhD-in-Arts', 5),
(175, 'PhD-in-Bioinformatics', 5),
(176, 'PhD-in-Bioscience', 5),
(177, 'PhD-in-Chemistry', 5),
(178, 'PhD-in-Clinical-Research', 5),
(179, 'PhD-in-Commerce', 5),
(180, 'PhD-in-Commerce-Management', 5),
(181, 'PhD-in-Constitutional-Law', 5),
(182, 'PhD-in-Engineering', 5),
(183, 'PhD-in-English', 5),
(184, 'PhD-in-Environmental-Science-and-Engineering', 5),
(185, 'PhD-in-Humanities', 5),
(186, 'PhD-in-Humanities-and-Life-Sciences', 5),
(187, 'PhD-in-International-Relations and Politics', 5),
(188, 'PhD-in-Law', 5),
(189, 'PhD-in-Law-and-Governance', 5),
(190, 'PhD-in-Legal-Studies', 5),
(191, 'PhD-in-Management', 5),
(192, 'PhD-in-Marketing', 5),
(193, 'PhD-in-Mathematical-and-Computational-Sciences', 5),
(194, 'Phd-in-Mathematics', 5),
(195, 'PhD-in-Physics', 5),
(196, 'PhD-in-Psychology', 5),
(197, 'PhD-in-Public-and-Economic-Policy', 5),
(198, 'PhD-in-Public-Policy', 5),
(199, 'PhD-in-Science ', 5),
(200, 'PhD-in-Social-Sciences', 5),
(201, 'PhD-in-Social-Work', 5),
(202, 'PhD-in-Zoology', 5),
(203, 'PhD-Zoology ', 5),
(204, 'HSC ', 6),
(205, 'Less-Than-10th ', 6),
(206, 'SSC ', 6),
(207, 'other', 8),
(208, 'other', 26),
(209, 'Other', 1),
(210, 'Other', 2),
(211, 'Other', 3),
(212, 'Other', 4),
(213, 'Other', 5),
(214, 'Other', 6);

-- --------------------------------------------------------

--
-- Table structure for table `highedu`
--

CREATE TABLE `highedu` (
  `id` int(11) NOT NULL,
  `HighEdu` varchar(255) DEFAULT NULL,
  `HighEduTitle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `highedu`
--

INSERT INTO `highedu` (`id`, `HighEdu`, `HighEduTitle`) VALUES
(1, 'B Com', 'Bachelor of commerce'),
(2, 'B Sc', 'Bachelor of Science'),
(3, 'BA', 'Bachelor of Arts'),
(4, 'BACHELOR OF MUSIC', 'BACHELOR OF MUSIC'),
(5, 'BBA', 'Bachelor of Busines Administration'),
(6, 'BBS', 'Bachelor of Business Studies'),
(7, 'BCA', 'Bachelor of Computer Application'),
(8, 'BFA', 'Bachelor of Fine Arts'),
(9, 'BFSc', 'Bachelor of Fisheries Science'),
(10, 'BSW', 'Bachelor of Social Work'),
(11, 'INTEGRATED B Sc', 'INTEGRATED B Sc'),
(12, 'INTEGRATED BA', 'INTEGRATED BA'),
(13, 'M Com', 'Master of Commerce'),
(14, 'M Sc', 'Master of Science'),
(15, 'MA', 'Master of Arts'),
(16, 'MSW', 'Master of Social Work'),
(17, 'Ayurveda PG', 'AYURVEDA PG'),
(18, 'Bachelor of Physio Therapy', 'Bachelor of Physio Therapy'),
(19, 'BAMS', 'Bachelor of Ayurvedic Medical Sciences?,MEDICAL'),
(20, 'BDS', 'Bachelor of dental surgery?,MEDICAL'),
(21, 'BHMS', 'Bachelor of Homeopathy Medicine & Surgery?,MEDICA'),
(22, 'BLT', 'Bachelor of Lab Technology'),
(23, 'BNYS', 'Bachelor of Naturopathy and Yogic Science'),
(24, 'BPT', 'Bachelor of Physioptherapy'),
(25, 'BUMS', 'Bachelor of Unani Medicine & Surgery'),
(26, 'DA', 'Diploma in Anaesthetics'),
(27, 'DFM', 'Diploma in Forensic Medicine'),
(28, 'DM', 'Doctor of Medicine'),
(29, 'DOMS', 'Diploma in Ophthalmic Medicine and Surgery'),
(30, 'Master of Public Health', 'Master of Public Health'),
(31, 'MBBS', 'Bachelor of Medicine and Bachelor of Surgery'),
(32, 'MD', 'Medical degrees'),
(33, 'MDS', 'Master of Dental Surgery'),
(34, 'MHA(HEALTH)', 'Master of Health Administration'),
(35, 'MPT', 'Master of Physiotherapy'),
(36, 'MS (Medical)', 'MS (Medical)'),
(37, 'MVSC', 'Master of Veterinary Science'),
(38, 'Pharm D Post baccalaureate', 'Pharm D Post baccalaureate'),
(39, 'Pharma D', 'Doctor of Pharmacy'),
(40, 'PHD', ''),
(41, 'Advanced Diploma Courses', 'Advanced Diploma Courses'),
(42, 'Allied health science', 'Allied health science'),
(44, 'B Com LLB', 'Bachelor of Commerce & Law'),
(45, 'B Desgn', 'Bachelor of Designs'),
(46, 'B Ed', 'Bachelor of Education'),
(47, 'B PEd', 'Bachelor of Physical Education'),
(48, 'B Pharma', 'Bachelor of Pharmacy'),
(49, 'B Plan', 'Bachelor of Planning'),
(50, 'B Sc (Nursing)', 'Bachelor of Science (Nursing)'),
(51, 'B Voc', 'Bachelor of Vocational'),
(52, 'BA LLB', 'Bachelor of Arts & Law'),
(53, 'BBA LLB', 'Bachelor of Busines Administration & Law'),
(55, 'BCJ', 'Bachelor of Communication & Journalism'),
(56, 'BHA', 'Bachelors in Hospital Administration'),
(57, 'BHM', 'Bachelor of Hotel management'),
(58, 'BLS', 'Bachelor of Library Sciencce'),
(59, 'BNg', 'Bachelor of Nursing'),
(60, 'BPA', 'Bachelor of Performance Arts'),
(61, 'BPH', 'Bachelors in public Health'),
(62, 'BSc Ed', 'Bachelor of Education'),
(63, 'BTA', 'Bachelor of Tourism Administration'),
(64, 'BTH', 'Bachelor of Tourism & Hospitality'),
(65, 'BTTM', 'Bachelor of Travel & Tourism Management'),
(66, 'BVA', 'Bachelor of Visual Arts'),
(68, 'BVSC', 'Bachelor of Veterinary Science'),
(69, 'BVSc and AH', 'Bachelor of Veterinary Science & Animal Husband'),
(71, 'CARDIOLOGY TECHNICIAN', ''),
(76, 'CEPT', 'Centre for Environment Planning & Technology'),
(80, 'CMLT', 'Certificate in Medical Laboratory Technology'),
(84, 'CRA', 'Community Reinvestment Act'),
(88, 'D Ed', 'Diplamo in Education'),
(89, 'D Pharma', 'Diplamo in Pharmacy'),
(103, 'DENTAL HYGENIST', ''),
(107, 'DHFSM', 'Master of Science in Dietetics and Food Service Management'),
(109, 'DHLS', 'DIPLOMA COURSE IN HEARING, LANGUAGE & SPEECH'),
(111, 'DHMCT', 'Diploma In Hotel Management and Catering Technology'),
(112, 'Diploma Courses', 'Diploma Courses'),
(113, 'DMIT', 'Diploma in Medical Imaging Technology'),
(114, 'DMLT', 'Diploma in Medical Laboratory Technology'),
(115, 'DMRD', 'Diploma in Medical Radio Diagnosis'),
(116, 'DMRT', 'Diploma in Medical Radiation Technology'),
(140, 'GNM', 'General Nursing and Midwifery'),
(142, 'IMSC', 'The Institute of Mathematical Sciences'),
(143, 'Integrated MBA', 'Integrated MBA'),
(144, 'ITI Courses', 'ITI Courses'),
(145, 'LLB', 'Bachelor of Law'),
(146, 'LLM', 'Masters of Laws?,PROFESSIONAL'),
(147, 'M Desgn', 'Master of Design'),
(148, 'M Ed', 'Master of Education'),
(149, 'M PED', 'Master of Physical Education'),
(150, 'M Pharma', 'Master of Pharmacy'),
(151, 'M Phil', 'Master of Philosophy'),
(152, 'M Sc (NURSING)', 'M Sc (NURSING)'),
(153, 'Master in Marketing', 'Master in Marketing'),
(154, 'Master of International Busines', 'Master of International Business'),
(155, 'MBA', 'Master of Business Administration'),
(156, 'MBE', 'Master of Business Economics'),
(157, 'MBS', 'Master of Business Studies'),
(158, 'MCA', 'Master of Computer Application'),
(159, 'MCJ', 'Master of Communication Journalism'),
(160, 'MFA', 'Master of Finance and Accounting?,PROFESSIONAL'),
(161, 'MFM', 'Master of Fashion Management'),
(162, 'MHM', 'Master of Hotel Management'),
(163, 'MHM', 'Master of Hospital Management'),
(165, 'MIT', 'Medical Imaging Technology'),
(166, 'MLT', 'Medical Lab Technology'),
(167, 'MMS', 'Master of Management Studies'),
(168, 'MPA', 'Master of Performing Arts'),
(169, 'MPH', 'Masters in public Health'),
(172, 'MPVA', 'MULTI PURPOSE VETERINARY ASSISTANT'),
(175, 'MS (Professional)', 'MS (Professional)'),
(176, 'MTA', 'Master of Tourism Administration'),
(177, 'NST', 'Nursery Training'),
(178, 'PBBSC(NURSING)', 'Post Basic BSc Nursing'),
(180, 'Post Graduation Diploma Cours', 'Post Graduation Diploma Courses'),
(188, 'Aircraft Maintenance Engieerin', 'Aircraft Maintenance Engieering'),
(189, 'B Arch', 'Bachelor of Architech'),
(190, 'B Tech', 'Bachelor of Technology'),
(191, 'BE', 'Bachelor of Engineering'),
(192, 'BFT', 'Bachelor of Fashion Technology'),
(193, 'INTEGRATED ENGINEERING B TECH', ''),
(194, 'M Arch', 'Master of Architechture'),
(195, 'M Tech', 'Master of Technology'),
(196, 'ME', 'Master of Engineering'),
(197, 'MFT', 'Master of Fashion Technology'),
(198, 'MS (Technical)', 'MS (Technical)'),
(199, 'MSIT', 'Master of Science in Information Technology'),
(200, 'Other', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(2, 'ashutosh rana', 'ashu@gmail.com', '7894561230', 'kldsfjio aerjtfksdo lmfk jkjo hdi fhsui  eryrfius   fuiuif ds re rojkdsf hsduyf  dufh djshfjkdhufe  udhfj dujfhudi', '2022-11-17', '2022-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `main_clans`
--

CREATE TABLE `main_clans` (
  `id` int(11) NOT NULL,
  `main_clans` varchar(255) NOT NULL,
  `sub_caste_id` int(11) NOT NULL,
  `caste_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_clans`
--

INSERT INTO `main_clans` (`id`, `main_clans`, `sub_caste_id`, `caste_id`, `created_at`, `updated_at`) VALUES
(1, 'Yadav/Jadhav', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(2, 'More', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(3, 'Bhosale', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(4, 'Sisode', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(5, 'Chavan', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(6, 'Shelar', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(7, 'Kadam', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(8, 'Rathod', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(9, 'Chalukya', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(10, 'Salunkhe', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(11, 'Shinde', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(12, 'Sawant', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(13, 'Salav', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(14, 'Laad', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(15, 'Nikam', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(16, 'Ahir', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(17, 'Gangnaik', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(18, 'Pawar', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(19, 'Gaikwad', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(20, 'Mohite', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(21, 'Kalchuri', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(22, 'Mahadik', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(23, 'Mane', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(24, 'Chulake', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(25, 'Angre', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(26, 'Chandale', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(27, 'Kakde', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(28, 'Rane', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(29, 'Ghatge', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(30, 'Jagtap', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(31, 'Dhamdhere', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(32, 'Jagdale', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(33, 'Dhawle', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(34, 'Dabhade', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(35, 'Dhumal', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(36, 'Thorat', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(37, 'Dalvi', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(38, 'Nalwade', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(39, 'Pansare', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(40, 'Pisal', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(41, 'Malap', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(42, 'Phalke', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(43, 'Angane', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(44, 'Vichare', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(45, 'Malusare', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(46, 'Tawde', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(47, 'Khaire', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(48, 'Bagwe', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(49, 'Raut', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(50, 'Renuse', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(51, 'Wagh', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(52, 'Pandhare', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(53, 'Bhogale', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(54, 'Bagrao', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(55, 'Bhagwat', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(56, 'Mulik', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(57, 'Surve', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(58, 'Kshirsagar', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(59, 'Shitole', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(60, 'Thakur', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(61, 'Shankpal', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(62, 'Shirke', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(63, 'Tuwar', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(64, 'Madhure', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(65, 'Mhambar', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(66, 'Bande', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(67, 'Teje', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(68, 'Devkate', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(69, 'Sambhare', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(70, 'Phakde', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(71, 'Harphale', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(72, 'Darbare', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(73, 'Kokate', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(74, 'Dhekale', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(75, 'Thote', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(76, 'Parte', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(77, 'Palande', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(78, 'Phatak', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(79, 'Jagdhane', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(80, 'Dhybar', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(81, 'Pingale', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(82, 'Phadtare', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(83, 'Bhoware', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(84, 'Rasal', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(85, 'Khadtare', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(86, 'Dadhe', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(87, 'Dhone', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(88, 'Misal', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(89, 'Pathare', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(90, 'Babar', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(91, 'Bhoite', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(92, 'Gavane', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(93, 'Gavase', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(94, 'Dhamale', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(95, 'Palav', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17'),
(96, 'Khandagale', 1, 1, '2025-03-18 11:00:17', '2025-03-18 11:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `misuse_data`
--

CREATE TABLE `misuse_data` (
  `id` int(11) NOT NULL,
  `type_of_issue` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `requester` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `misuse_data`
--

INSERT INTO `misuse_data` (`id`, `type_of_issue`, `subject`, `description`, `requester`, `email`, `mobile`, `created_at`, `updated_at`, `status`) VALUES
(1, 'testing', 'testing', 'testing', ' rajesh', NULL, '9865321470', '2023-05-06', '2023-05-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `premium_membership`
--

CREATE TABLE `premium_membership` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `months` varchar(255) DEFAULT NULL,
  `discription` text DEFAULT NULL,
  `rule1` text DEFAULT NULL,
  `rule2` text DEFAULT NULL,
  `rule3` text DEFAULT NULL,
  `rule4` text DEFAULT NULL,
  `visiblePro` int(11) NOT NULL,
  `direct_message` varchar(11) DEFAULT NULL,
  `download_biodata` varchar(11) DEFAULT NULL,
  `chat_allowed` varchar(11) DEFAULT NULL,
  `view_gallery_photo` varchar(11) DEFAULT NULL,
  `view_unlimited_profile` varchar(11) DEFAULT NULL,
  `whatsapp_support` varchar(11) DEFAULT NULL,
  `document_authentication` varchar(11) DEFAULT NULL,
  `personal_matchmaking` varchar(11) DEFAULT NULL,
  `get_highlighted` varchar(11) DEFAULT NULL,
  `get_featured_on_top_search` varchar(11) DEFAULT NULL,
  `verified_profile_contact` varchar(11) DEFAULT NULL,
  `customer_support` varchar(11) DEFAULT NULL,
  `dedicated_executive` varchar(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profession`
--

CREATE TABLE `profession` (
  `id` int(11) NOT NULL,
  `prof` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `profession`
--

INSERT INTO `profession` (`id`, `prof`) VALUES
(1, 'Director'),
(2, 'Accounts/Finance-Professional'),
(3, 'ACP-Assistant-Commissioner-of-Police'),
(4, 'Actor/Model'),
(5, 'Administrative-Professional'),
(6, 'Advertising/PR-Professional'),
(7, 'Advisor'),
(8, 'Aerospace/Aeronautical-Engineer'),
(9, 'Agent/Broker/Trader'),
(10, 'Agriculture-&-Farming-Professional'),
(11, 'Air-Force'),
(12, 'Airline-Professional'),
(13, 'Analyst'),
(14, 'Animator'),
(15, 'Architect'),
(16, 'Area-Manager'),
(17, 'Army'),
(18, 'Artist'),
(19, 'Arts-&-Craftsman'),
(20, 'ASI - Assistant-Sub-Inspector'),
(21, 'ASP-Assistant-Superintendent-of-Police'),
(22, 'Assistant'),
(23, 'Assistant-Manager'),
(24, 'Assistant-Professor'),
(25, 'Assistant-Structural-Engineer'),
(26, 'Associate'),
(27, 'Auditor'),
(28, 'Bank-Manager'),
(29, 'Banking-Professional'),
(30, 'Beautician'),
(31, 'Biochemical/Biomedical-Engineer'),
(32, 'BPO/KPO/ITES-Professional'),
(33, 'Builder'),
(34, 'Business-Development-Professional'),
(35, 'Business-Owner/Entrepreneur'),
(36, 'Chairman'),
(37, 'Chartered-Accountant'),
(38, 'Chef/Cook'),
(39, 'Chemical-Engineer'),
(40, 'Chemist'),
(41, 'Civil-Engineer'),
(42, 'Civil-Services(IAS/IPS/IRS/IES/IFS)'),
(43, 'Clerk'),
(44, 'CNC-Operator'),
(45, 'Communication-Engineer'),
(46, 'Company-Secretary'),
(47, 'Computer-Engineer'),
(48, 'Consultant'),
(49, 'Content-Writer'),
(50, 'Contractor'),
(51, 'Corporate-Communication'),
(52, 'Corporate-Planning'),
(53, 'Creator/influencer'),
(54, 'Customer-Service-Professional'),
(55, 'CXO/President'),
(56, 'Cyber/Network-Security'),
(57, 'Data-Analyst'),
(58, 'Data-Scientist'),
(59, 'DC-Deputy-commissioner'),
(60, 'Dentist'),
(61, 'Design-Engineer'),
(62, 'Designer'),
(63, 'Designer-Product-Manager'),
(64, 'DGP-Director-General-of-Police'),
(65, 'Dietician/Nutritionist'),
(66, 'Distributor'),
(67, 'Doctor'),
(68, 'Driver'),
(69, 'DSP-Deputy-Superintendent-of-Police'),
(70, 'Education-Professional'),
(71, 'Electrical Engineer'),
(72, 'Electronics/Telecom-Engineer'),
(73, 'Engineer'),
(74, 'Entertainment-Professional'),
(75, 'Event-Management-Professional'),
(76, 'Executive'),
(77, 'Expired'),
(78, 'Farmer'),
(79, 'Fashion-Designer'),
(80, 'Financial-Accountant'),
(81, 'Financial-Analyst/Planning'),
(82, 'Fitness-Professional'),
(83, 'Freelancer'),
(84, 'Govt-Contractor'),
(85, 'Govt-Services'),
(86, 'Govt-Doctor'),
(87, 'Gym-Trainer'),
(88, 'Hair-Stylist'),
(89, 'Hardware-Professional'),
(90, 'Healthcare-Professional'),
(91, 'Horticulturist'),
(92, 'Hotel/Hospitality-Professional'),
(93, 'Housewife'),
(94, 'Human-Resources-Professional'),
(95, 'Interior-Designer'),
(96, 'Investment-Professional'),
(97, 'IT-Engineer'),
(98, 'Jewellery-Designer'),
(99, 'Job'),
(100, 'Journalist'),
(101, 'Judge'),
(102, 'Junior-Manager'),
(103, 'Lab-Technician'),
(104, 'Law-Enforcement-Officer'),
(105, 'Lawyer-&-Legal-Professional'),
(106, 'Legal-Assistant'),
(107, 'Librarian'),
(108, 'M.S-in-Engineering-&-Planning'),
(109, 'Makeup-Artist'),
(110, 'Manager'),
(111, 'Mariner/Merchant-Navy'),
(112, 'Marketing-Professional'),
(113, 'Mechanic'),
(114, 'Mechanical/Production-Engineer'),
(115, 'Media-Professional'),
(116, 'Medical-Coder'),
(117, 'Medical-Officer'),
(118, 'Medical-Representative'),
(119, 'Medical-Shop-Owner'),
(120, 'Medical-Transcriptionist'),
(121, 'Musician'),
(122, 'Navy'),
(123, 'Network-Engineer'),
(124, 'Not-working'),
(125, 'Nurse'),
(126, 'Officer'),
(127, 'Operations-Management'),
(128, 'Others'),
(129, 'Paramedical-Professional'),
(130, 'Paramilitary'),
(131, 'Pharmacist'),
(132, 'Photo/Videographer'),
(133, 'Physiotherapist'),
(134, 'Pilot/Flight-Attendant'),
(135, 'Police'),
(136, 'Police-sub-inspector-(Psi)'),
(137, 'Politician'),
(138, 'Principal'),
(139, 'Product-Manager'),
(140, 'Professor/Lecturer'),
(141, 'Program-Manager'),
(142, 'Project-Engineer'),
(143, 'Project-Manager'),
(144, 'Psychologist'),
(145, 'Quality-Assurance-Engineer'),
(146, 'Research-Assistant'),
(147, 'Research-Scholar'),
(148, 'Restaurant/Catering-Professional'),
(149, 'Retired'),
(150, 'Sailor'),
(151, 'Sales-Professional'),
(152, 'Scientist/Researcher'),
(153, 'Secretary/Front-Office'),
(154, 'Security-Professional'),
(155, 'Senior-Manager'),
(156, 'Senior-Software-Engineer'),
(157, 'SI-Sub-Inspector'),
(158, 'Singer'),
(159, 'Social Worker / Volunteer / NGO'),
(160, 'Software Designer'),
(161, 'Software-Developer'),
(162, 'Software-Engineer'),
(163, 'Software-Professional'),
(164, 'SP-Superintendent-of-Police'),
(165, 'Sportsperson'),
(166, 'Students'),
(167, 'Subject-Matter-Expert'),
(168, 'Supervisor'),
(169, 'Surgeon'),
(170, 'Surveyor'),
(171, 'Tailor'),
(172, 'Tax-Consultant'),
(173, 'Teacher'),
(174, 'Teaching/Academician'),
(175, 'Technician'),
(176, 'Therapist'),
(177, 'Trainer'),
(178, 'Training-Professional'),
(179, 'Transportation/Logistics-Professional'),
(180, 'Travel-Professional'),
(181, 'UI/UX-Designer'),
(182, 'Veterinary-Doctor'),
(183, 'Vice-Principal'),
(184, 'VP/AVP/GM/DGM/AGM'),
(185, 'Web/Graphic-Designer'),
(186, 'Writer');

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `id` int(11) NOT NULL,
  `religion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`id`, `religion`) VALUES
(1, 'Hindu');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sent_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `sent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, '2025-03-20 14:38:30', '2025-03-20 14:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shortlist`
--

CREATE TABLE `shortlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `liked_p_id` int(11) DEFAULT NULL,
  `liked_p_name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shortlist`
--

INSERT INTO `shortlist` (`id`, `user_id`, `liked_p_id`, `liked_p_name`, `status`) VALUES
(1, 2, 1, 'Rajesh Banswal', 1),
(2, 1, 3, 'Vaishnavi S Gore', 1),
(3, 1, 2, 'Pratiksha Sonwane', 1);

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `id` int(11) NOT NULL,
  `specialization` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`id`, `specialization`) VALUES
(1, 'Able Seamen'),
(2, 'Account Collector'),
(3, 'Accounting Specialist'),
(4, 'Adjustment Clerk'),
(5, 'Administrative Assistant'),
(6, 'Administrative Law Judge'),
(7, 'Administrative Service Manager'),
(8, 'Admiralty Lawyer'),
(9, 'Adult Literacy and Remedial Education Teachers'),
(10, 'Advertising Account Executive'),
(11, 'Advertising Agency Coordinator'),
(12, 'Aeronautical & Aerospace Engineer'),
(13, 'Aerospace Engineering Technician'),
(14, 'Agricultural Crop Farm Manager'),
(15, 'Agricultural Engineer'),
(16, 'Agricultural Equipment Operator'),
(17, 'Agricultural Inspector'),
(18, 'Agricultural Product Sorter'),
(19, 'Agricultural Sciences Professor'),
(20, 'Agricultural Technician'),
(21, 'Air Crew Member'),
(22, 'Air Crew Officer'),
(23, 'Air Traffic Controller'),
(24, 'Aircraft Assembler'),
(25, 'Aircraft Body and Bonded Structure Repairer'),
(26, 'Aircraft Cargo Handling Supervisor'),
(27, 'Aircraft Examiner'),
(28, 'Aircraft Launch and Recovery Officer'),
(29, 'Aircraft Launch and Recovery Specialist'),
(30, 'Aircraft Mechanic'),
(31, 'Airfield Operations Specialist'),
(32, 'Airline Flight Attendant'),
(33, 'Airline Flight Control Administrator'),
(34, 'Airline Flight Operations Administrator'),
(35, 'Airline Flight Reservations Administrator'),
(36, 'Airport Administrator'),
(37, 'Airport Design Engineer'),
(38, 'Alcohol & Drug Abuse Assistance Coordinator'),
(39, 'Alumni Relations Coordinator'),
(40, 'Ambulance Drivers'),
(41, 'Amusement Park & Recreation Attendants'),
(42, 'Anesthesiologist (MD)'),
(43, 'Animal Breeder'),
(44, 'Animal Control Worker'),
(45, 'Animal Husbandry Worker Supervisor'),
(46, 'Animal Keepers and Groomers'),
(47, 'Animal Kennel Supervisor'),
(48, 'Animal Scientist'),
(49, 'Animal Trainer'),
(50, 'Animation Cartoonist'),
(51, 'Answering Service Operator'),
(52, 'Anthropology and Archeology Professor'),
(53, 'Anti-Terrorism Intelligence Agent'),
(54, 'Appeals Referee'),
(55, 'Aquaculturist (Fish Farmer)'),
(56, 'Aquarium Curator'),
(57, 'Architecture Professor'),
(58, 'Area, Ethnic, and Cultural Studies Professor'),
(59, 'Armored Assault Vehicle Crew Member'),
(60, 'Armored Assault Vehicle Officer'),
(61, 'Art Appraiser'),
(62, 'Art Director'),
(63, 'Art Restorer'),
(64, 'Art Therapist'),
(65, 'Art, Drama, and Music Professor'),
(66, 'Artillery and Missile Crew Member'),
(67, 'Artillery and Missile Officer'),
(68, 'Artists Agent (Manager)'),
(69, 'Athletes\' Business Manager'),
(70, 'Athletic Coach'),
(71, 'Athletic Director'),
(72, 'Athletic Trainer'),
(73, 'ATM Machine Servicer'),
(74, 'Atmospheric and Space Scientist'),
(75, 'Audio-Visual Collections Specialist'),
(76, 'Audiovisual Production Specialist'),
(77, 'Automobile Mechanic'),
(78, 'Automotive Body Repairer'),
(79, 'Automotive Engineer'),
(80, 'Automotive Glass Installer'),
(81, 'Avionics Technician'),
(82, 'Baggage Porters and Bellhops'),
(83, 'Baker (Commercial)'),
(84, 'Ballistics Expert'),
(85, 'Bank and Branch Managers'),
(86, 'Bank Examiner'),
(87, 'Bank Teller'),
(88, 'Benefits Manager'),
(89, 'Bicycle Mechanic'),
(90, 'Billing Specialist'),
(91, 'Bindery Machine Set-Up Operators'),
(92, 'Bindery Machine Tender'),
(93, 'Biological Technician'),
(94, 'Biology Professor'),
(95, 'Biomedical Engineer'),
(96, 'Biomedical Equipment Technician'),
(97, 'Boat Builder'),
(98, 'Book Editor'),
(99, 'Border Patrol Agent'),
(100, 'Brattice Builder'),
(101, 'Bridge and Lock Tenders'),
(102, 'Broadcast News Analyst'),
(103, 'Broadcast Technician'),
(104, 'Broker\'s Floor Representative'),
(105, 'Brokerage Clerk'),
(106, 'Budget Accountant'),
(107, 'Budget Analyst'),
(108, 'Building Inspector'),
(109, 'Building Maintenance Mechanic'),
(110, 'Bulldozer / Grader Operator'),
(111, 'Bus and Truck Mechanics'),
(112, 'Bus Boy / Bus Girl'),
(113, 'Bus Driver (School)'),
(114, 'Bus Driver (Transit)'),
(115, 'Business Professor'),
(116, 'Business Service Specialist'),
(117, 'Cabinet Maker'),
(118, 'Camp Director'),
(119, 'Caption Writer'),
(120, 'Cardiologist (MD)'),
(121, 'Cardiopulmonary Technologist'),
(122, 'Career Counselor'),
(123, 'Cargo and Freight Agents'),
(124, 'Carpenter\'s Assistant'),
(125, 'Carpet Installer'),
(126, 'Cartographer (Map Scientist)'),
(127, 'Cartographic Technician'),
(128, 'Cartoonist (Publications)'),
(129, 'Casino Cage Worker'),
(130, 'Casino Cashier'),
(131, 'Casino Dealer'),
(132, 'Casino Floor Person'),
(133, 'Casino Manager'),
(134, 'Casino Pit Boss'),
(135, 'Casino Slot Machine Mechanic'),
(136, 'Casino Surveillance Officer'),
(137, 'Casting Director'),
(138, 'Catering Administrator'),
(139, 'Ceiling Tile Installer'),
(140, 'Cement Mason'),
(141, 'Ceramic Engineer'),
(142, 'Certified Public Accountant (CPA)'),
(143, 'Chaplain (Prison, Military, Hospital)'),
(144, 'Chemical Engineer'),
(145, 'Chemical Equipment Operator'),
(146, 'Chemical Plant Operator'),
(147, 'Chemical Technicians'),
(148, 'Chemistry Professor'),
(149, 'Chief Financial Officer'),
(150, 'Child Care Center Administrator'),
(151, 'Child Care Worker'),
(152, 'Child Life Specialist'),
(153, 'Child Support Investigator'),
(154, 'Child Support Services Worker'),
(155, 'City Planning Aide'),
(156, 'Civil Drafter'),
(157, 'Civil Engineer'),
(158, 'Civil Engineering Technician'),
(159, 'Clergy Member (Religious Leader)'),
(160, 'Clinical Dietitian'),
(161, 'Clinical Psychologist'),
(162, 'Clinical Sociologist'),
(163, 'Coatroom and Dressing Room Attendants'),
(164, 'College/University Professor'),
(165, 'Commercial Designer'),
(166, 'Commercial Diver'),
(167, 'Commercial Fisherman'),
(168, 'Communication Equipment Mechanic'),
(169, 'Communications Professor'),
(170, 'Community Health Nurse'),
(171, 'Community Organization Worker'),
(172, 'Community Welfare Worker'),
(173, 'Compensation Administrator'),
(174, 'Compensation Specialist'),
(175, 'Compliance Officer'),
(176, 'Computer Aided Design (CAD) Technician'),
(177, 'Computer and Information Scientists, Research'),
(178, 'Computer and Information Systems Managers'),
(179, 'Computer Applications Engineer'),
(180, 'Computer Controlled Machine Tool Operators'),
(181, 'Computer Customer Support Specialist'),
(182, 'Computer Hardware Technician'),
(183, 'Computer Operators'),
(184, 'Computer Programmer'),
(185, 'Computer Science Professor'),
(186, 'Computer Security Specialist'),
(187, 'Computer Software Engineers'),
(188, 'Computer Software Technician'),
(189, 'Computer Systems Engineer'),
(190, 'Congressional Aide'),
(191, 'Conservation Scientist'),
(192, 'Construction Driller'),
(193, 'Construction Laborer'),
(194, 'Construction Manager'),
(195, 'Construction Trades Supervisor'),
(196, 'Contract Administrator'),
(197, 'Contract Specialist'),
(198, 'Control Center Specialist (Military)'),
(199, 'Controller (Finance)'),
(200, 'Cook (Cafeteria)'),
(201, 'Cook (Fast Food)'),
(202, 'Cook (Private Household)'),
(203, 'Cook (Restaurant)'),
(204, 'Cook (Short Order)'),
(205, 'Copy Writer'),
(206, 'Corporation Lawyer'),
(207, 'Correction Officer'),
(208, 'Correspondence Clerk'),
(209, 'Cosmetologist (Hair Stylist)'),
(210, 'Cost Accountant'),
(211, 'Cost Analysis Engineer'),
(212, 'Cost Estimator'),
(213, 'Costume Attendant'),
(214, 'Counseling Psychologist'),
(215, 'Counter and Rental Clerks'),
(216, 'County or City Auditor'),
(217, 'Couriers and Messengers'),
(218, 'Court Administrator'),
(219, 'Court Clerk'),
(220, 'Court Reporter'),
(221, 'Craft Artist'),
(222, 'Crane Operator'),
(223, 'Credit Adjuster'),
(224, 'Credit Analyst'),
(225, 'Credit Reporter'),
(226, 'Criminal Investigator (Detective)'),
(227, 'Criminal Justice Professor'),
(228, 'Criminal Lawyer'),
(229, 'Crop Workers Supervisor'),
(230, 'Crossing Guard'),
(231, 'Custom Tailor'),
(232, 'Customer Service Representative (Utilities)'),
(233, 'Customer Service Supervisor'),
(234, 'Customs Inspector'),
(235, 'Cutting Machine Operators'),
(236, 'Dairy Technologist'),
(237, 'Database Administrator'),
(238, 'Deaf Students Teacher'),
(239, 'Delivery Driver'),
(240, 'Demonstrators and Product Promoters'),
(241, 'Dental / Orthodontic Office Administrator'),
(242, 'Dental Assistant'),
(243, 'Dental Hygienist'),
(244, 'Dental Laboratory Technician'),
(245, 'Dentist (MD)'),
(246, 'Dermatologist (MD)'),
(247, 'Desktop Publishing Specialist'),
(248, 'Developmental Psychologist'),
(249, 'Die Cutter Operator'),
(250, 'Dietetic Technician'),
(251, 'Dietitian and Nutritionist'),
(252, 'Directory Assistance Operator'),
(253, 'Disabled Students Teacher'),
(254, 'Disk Jockey'),
(255, 'Dispatcher (Safety Vehicles)'),
(256, 'Door To Door Salesmen'),
(257, 'Dry Wall Installer'),
(258, 'Economics Professor'),
(259, 'Editorial Writer, Newspapers & Magazines'),
(260, 'Education and Training Administrator'),
(261, 'Education Professor'),
(262, 'Educational Administrator'),
(263, 'Educational Psychologist'),
(264, 'Educational Resource Coordinator'),
(265, 'Educational Therapist'),
(266, 'EEG Technician/Technologist'),
(267, 'Electric Meter Installer'),
(268, 'Electric Motor Mechanic'),
(269, 'Electrical and Electronic Inspector'),
(270, 'Electrical Drafter'),
(271, 'Electrical Engineers'),
(272, 'Electrical Parts Reconditioner'),
(273, 'Electrical Technician'),
(274, 'Electro-Mechanical Technicians'),
(275, 'Electromechanical Equipment Assembler'),
(276, 'Electronic Drafter'),
(277, 'Electronics Engineer'),
(278, 'Electronics Technician'),
(279, 'Elementary School Administrator'),
(280, 'Elementary School Teacher'),
(281, 'Elevator Mechanic'),
(282, 'Emergency Management Specialist'),
(283, 'Emergency Medical Technician'),
(284, 'Employee Benefits Analyst'),
(285, 'Employee Training Instructor'),
(286, 'Employment Administrator'),
(287, 'Employment and Placement Specialist'),
(288, 'Employment Interviewer'),
(289, 'Engine and Machine Assemblers'),
(290, 'Engineering Managers'),
(291, 'Engineering Professor'),
(292, 'English Language and Literature Professor'),
(293, 'Environmental Compliance Inspector'),
(294, 'Environmental Disease Analyst'),
(295, 'Environmental Engineer'),
(296, 'Environmental Planner'),
(297, 'Environmental Research Analyst'),
(298, 'Environmental Science Technician'),
(299, 'Environmental Science Professsor'),
(300, 'Environmental Technician'),
(301, 'Equal Opportunity Representative'),
(302, 'Etchers and Engravers'),
(303, 'Excavating Machine Operator'),
(304, 'Excavating Supervisor'),
(305, 'Executive Secretary'),
(306, 'Exercise Physiologist'),
(307, 'Exhibit Artist'),
(308, 'Exhibit Designer'),
(309, 'Experimental Psychologist'),
(310, 'Explosives Worker'),
(311, 'Export Agent'),
(312, 'Fabric and Apparel Patternmakers'),
(313, 'Facilities Planner'),
(314, 'Factory Layout Engineer'),
(315, 'Family Caseworker'),
(316, 'Family Practitioner (MD)'),
(317, 'Farm Equipment Mechanic'),
(318, 'Farm Hand'),
(319, 'Farm Labor Contractor'),
(320, 'Farm Manager'),
(321, 'Farm Products Purchasing Agent'),
(322, 'Farmers and Ranchers'),
(323, 'Fashion Artist'),
(324, 'Fashion Coordinator'),
(325, 'Fashion Designer'),
(326, 'Fashion Model'),
(327, 'Fence Installer'),
(328, 'Field Contractor'),
(329, 'Field Health Officer'),
(330, 'File Clerk'),
(331, 'Film Editor'),
(332, 'Film Laboratory Technician'),
(333, 'Finance Manager'),
(334, 'Financial Aid Counselor'),
(335, 'Financial Analyst'),
(336, 'Financial Examiner'),
(337, 'Financial Planner'),
(338, 'Financial Services Sales Agent'),
(339, 'Fine Artist'),
(340, 'Fire Inspector'),
(341, 'Fire Investigator'),
(342, 'Fire Prevention Engineer'),
(343, 'Fire Protection Engineer'),
(344, 'Fire Protection Engineering Technician'),
(345, 'Fish & Game Warden'),
(346, 'Fish Hatchery Specialist'),
(347, 'Fishery Worker Supervisor'),
(348, 'Fitness Trainer'),
(349, 'Flight Engineers'),
(350, 'Floral Designer'),
(351, 'Food & Drug Inspector'),
(352, 'Food Batchmaker'),
(353, 'Food Preparation Worker'),
(354, 'Food Science Technicians'),
(355, 'Food Technologist'),
(356, 'Foreign Exchange Trader'),
(357, 'Foreign Language Interpreter'),
(358, 'Foreign Language Teacher'),
(359, 'Foreign Language Translator'),
(360, 'Foreign Service Officer'),
(361, 'Foreign Service Peacekeeping Specialist'),
(362, 'Foreign Student Adviser'),
(363, 'Forensic Science Technicians'),
(364, 'Forensics Psychologist'),
(365, 'Forest and Conservation Technician'),
(366, 'Forest Engineer'),
(367, 'Forest Fire Prevention Supervisor'),
(368, 'Forest Fire Inspector'),
(369, 'Forestry and Conservation Professor'),
(370, 'Forging Machine Operator'),
(371, 'Forklift and Industrial Truck Operators'),
(372, 'Fraud Investigator'),
(373, 'Freight and Stock Handler'),
(374, 'Fund Raiser'),
(375, 'Funds Development Administrator'),
(376, 'Funeral Attendant'),
(377, 'Funeral Director'),
(378, 'Furniture Designer'),
(379, 'Furniture Finishers'),
(380, 'Game Runner'),
(381, 'Gas Plant Operator'),
(382, 'General and Operations Managers'),
(383, 'General Farmworkers'),
(384, 'General Internists (MD)'),
(385, 'Geography Professor'),
(386, 'Geological Data Technicians'),
(387, 'Geological Technician (Drafter)'),
(388, 'Glass Blower'),
(389, 'Gluing Machine Operators'),
(390, 'Golf Course Superintendent'),
(391, 'Government Budget Analyst'),
(392, 'Government Property Inspectors'),
(393, 'Government Service Executives'),
(394, 'Graduate Teaching Assistant'),
(395, 'Graphic Designer'),
(396, 'Greenhouse and Nursery Manager'),
(397, 'Gynecologist (MD)'),
(398, 'Hand and Portable Tool Mechanic'),
(399, 'Hand Sewer'),
(400, 'Harbor Master'),
(401, 'Harbor, Lake & Waterways Police'),
(402, 'Hardwood Floor Finisher'),
(403, 'Hazardous Materials Removal Worker'),
(404, 'Hazardous Waste Management Analyst'),
(405, 'Health Care Facilities Inspector'),
(406, 'Health Case Manager'),
(407, 'Health Educators'),
(408, 'Health Psychologist'),
(409, 'Hearing Officer'),
(410, 'Heating, A/C, Refrigeration Technician'),
(411, 'Heavy Equipment Mechanic'),
(412, 'High School Administrator'),
(413, 'High School Guidance Counselor'),
(414, 'High School Teacher'),
(415, 'Highway Maintenance Worker'),
(416, 'Highway Patrol Pilot'),
(417, 'Historic Site Administrator'),
(418, 'Historical Archivist'),
(419, 'History Professor'),
(420, 'Home Appliance Installer'),
(421, 'Home Appliance Repairer'),
(422, 'Home Economics Teacher'),
(423, 'Home Economist'),
(424, 'Home Entertainment System Installer'),
(425, 'Home Health Aide'),
(426, 'Home Health Technician'),
(427, 'Horticultural Worker Supervisor'),
(428, 'Horticulture Therapist'),
(429, 'Horticulturist (Vineyard)'),
(430, 'Hospital Administrator'),
(431, 'Hospital Nurse'),
(432, 'Hosts and Hostesses'),
(433, 'Hotel and Motel Desk Clerks'),
(434, 'Hotel Convention/Events Coordinator'),
(435, 'Hotel Manager'),
(436, 'Housekeeping Supervisors'),
(437, 'Human Factors Psychologist'),
(438, 'Human Resources Management Advisor'),
(439, 'Human Resources Management Consultant'),
(440, 'Hydraulic Engineer'),
(441, 'Immigration Inspector'),
(442, 'Industrial Air Pollution Analyst'),
(443, 'Industrial Arts Teacher'),
(444, 'Industrial Designer'),
(445, 'Industrial Engineer'),
(446, 'Industrial Engineering Technician'),
(447, 'Industrial Health Engineer'),
(448, 'Industrial Hygienist'),
(449, 'Industrial Machinery Mechanics'),
(450, 'Industrial Relations Analyst'),
(451, 'Industrial Relations Specialist'),
(452, 'Industrial Therapist'),
(453, 'Industrial Waste Inspector'),
(454, 'Industrial-Organizational Psychologist'),
(455, 'Infantry Officers'),
(456, 'Instructional Coordinators'),
(457, 'Instructor, Police-Canine Services'),
(458, 'Instrument Technician'),
(459, 'Insulation Installer'),
(460, 'Insurance Adjuster'),
(461, 'Insurance Agent'),
(462, 'Insurance Appraiser (Auto Damage)'),
(463, 'Insurance Claim Examiner'),
(464, 'Insurance Claims Adjuster'),
(465, 'Insurance Claims Clerks'),
(466, 'Insurance Estate Planner'),
(467, 'Insurance Lawyer'),
(468, 'Insurance Policy Processing Clerk'),
(469, 'Insurance Underwriter'),
(470, 'Intelligence Specialist (Government)'),
(471, 'Interior Designer'),
(472, 'Internal Auditor'),
(473, 'Interpreter for the Hearing Impaired'),
(474, 'Irradiated-Fuel Handlers'),
(475, 'Irrigation Engineer'),
(476, 'IT Administrator (Information Technology)'),
(477, 'Janitorial Supervisors'),
(478, 'Job Analyst'),
(479, 'Job Development Specialist'),
(480, 'Job Printer (Graphic Arts)'),
(481, 'Kindergarten Teacher'),
(482, 'Labor Relations Advisor'),
(483, 'Laboratory Tester'),
(484, 'Land Surveyor'),
(485, 'Landscape Architect'),
(486, 'Landscape Contractor'),
(487, 'Lathe Operator'),
(488, 'Law Clerks'),
(489, 'Law Professor'),
(490, 'Legal Assistant'),
(491, 'Legal Secretary'),
(492, 'Legislative Assistant'),
(493, 'Library Assistant'),
(494, 'Library Consultant'),
(495, 'Library Science Professor'),
(496, 'Library Technician'),
(497, 'License Clerk'),
(498, 'Licensed Practical Nurse (LPN)'),
(499, 'Livestock Commission Agent'),
(500, 'Loan Counselor'),
(501, 'Loan Interviewers and Clerks'),
(502, 'Loan Officer'),
(503, 'Locomotive Engineers'),
(504, 'Log Graders and Scalers'),
(505, 'Logging Tractor Operator'),
(506, 'Logging Worker Supervisor'),
(507, 'Machine Feeders and Offbearers'),
(508, 'Mail Clerk'),
(509, 'Mail Machine Operators'),
(510, 'Maintenance Supervisor'),
(511, 'Makeup Artists - Theatrical'),
(512, 'Management Consultant (Analyst)'),
(513, 'Manicurists and Pedicurists'),
(514, 'Manual Arts Therapist'),
(515, 'Mapping Technician'),
(516, 'Marina Boat Charter Administrator'),
(517, 'Marine and Aquatic Biologist'),
(518, 'Marine Architect'),
(519, 'Marine Cargo Surveyor'),
(520, 'Marine Drafter'),
(521, 'Marine Engineer'),
(522, 'Marine Surveyor'),
(523, 'Marine/Port Engineer'),
(524, 'Market Research Analyst'),
(525, 'Marketing Managers'),
(526, 'Marking Clerk'),
(527, 'Marriage and Family Therapists'),
(528, 'Massage Therapist'),
(529, 'Materials Engineer'),
(530, 'Materials Inspector'),
(531, 'Materials Scientist'),
(532, 'Math Professor'),
(533, 'Mathematical Technician'),
(534, 'Meat Packers'),
(535, 'Meat, Poultry, and Fish Trimmers'),
(536, 'Mechanical Drafter'),
(537, 'Mechanical Engineer'),
(538, 'Mechanical Engineering Technician'),
(539, 'Mechanical Inspector'),
(540, 'Medical Administrative Assistant'),
(541, 'Medical and Public Health Social Workers'),
(542, 'Medical and Scientific Illustrator'),
(543, 'Medical Appliance Technician'),
(544, 'Medical Assistant'),
(545, 'Medical Equipment Preparer'),
(546, 'Medical Examiner/Coroner'),
(547, 'Medical Insurance Claims Analyst'),
(548, 'Medical Laboratory Technician'),
(549, 'Medical Photographer'),
(550, 'Medical Records Administrator'),
(551, 'Medical Records Technician'),
(552, 'Medical Secretary'),
(553, 'Medical Technologist'),
(554, 'Medical Transcriptionist'),
(555, 'Mental Health Counselor'),
(556, 'Mentally Retarded Students Teacher'),
(557, 'Merchandise Displayer'),
(558, 'Metal Casting Machine Operator'),
(559, 'Metal Fabricator'),
(560, 'Meter Mechanic'),
(561, 'Middle School Administrator'),
(562, 'Middle School Guidance Counselor'),
(563, 'Middle School Teacher'),
(564, 'Military Analyst'),
(565, 'Military Officer'),
(566, 'Military-Enlisted Personnel'),
(567, 'Mill Worker'),
(568, 'Mine Cutting Machine Operator'),
(569, 'Mine Inspector'),
(570, 'Mining Engineer'),
(571, 'Mining Machine Operator'),
(572, 'Mining Shovel Machine Operator'),
(573, 'Missing Person Investigator'),
(574, 'Missionary Worker (Foreign Country)'),
(575, 'Model Maker'),
(576, 'Model Makers, Metal and Plastic'),
(577, 'Motion Picture Director'),
(578, 'Motion Picture Projectionist'),
(579, 'Motor Vehicle Inspector'),
(580, 'Motorboat Mechanic'),
(581, 'Motorcycle Mechanic'),
(582, 'Municipal Fire Fighting Supervisor'),
(583, 'Museum Curator'),
(584, 'Museum Technicians and Conservators'),
(585, 'Music Arrangers and Orchestrators'),
(586, 'Music Director'),
(587, 'Music Teacher'),
(588, 'Music Therapist'),
(589, 'Musical Instrument Tuner'),
(590, 'Narcotics Investigator (Government)'),
(591, 'New Accounts Clerk (Banking)'),
(592, 'Newspaper Editor'),
(593, 'Newspaper/Magazines Writer'),
(594, 'Non-Retail Sales Supervisor'),
(595, 'Nuclear Engineer'),
(596, 'Nuclear Equipment Operation Technician'),
(597, 'Nuclear Fuels Research Engineer'),
(598, 'Nuclear Medicine Technologist'),
(599, 'Nuclear Monitoring Technician'),
(600, 'Nuclear Power Reactor Operator'),
(601, 'Nuclear Technicians'),
(602, 'Numerical Tool Programmer'),
(603, 'Nurse Practitioner'),
(604, 'Nurse\'s Aide'),
(605, 'Nursery Workers'),
(606, 'Nursing Professor'),
(607, 'Obstetrician (MD)'),
(608, 'Occupational Analyst'),
(609, 'Occupational Physician (MD)'),
(610, 'Occupational Safety & Health Inspector'),
(611, 'Occupational Therapist'),
(612, 'Occupational Therapy Assistant'),
(613, 'Oceanographic Assistant'),
(614, 'Office Clerk'),
(615, 'Office Machine Mechanic'),
(616, 'Office Supervisor'),
(617, 'Offset Press Operators'),
(618, 'Operating Engineers'),
(619, 'Operations Management Analyst'),
(620, 'Ophthalmic Laboratory Technician'),
(621, 'Ophthalmologist (MD)'),
(622, 'Oral and Maxillofacial Surgeons'),
(623, 'Order Clerk'),
(624, 'Order Fillers, Wholesale and Retail Sales'),
(625, 'Ordinary Seamen'),
(626, 'Ornamental-Metalwork Designer'),
(627, 'Orthodontic Assistant'),
(628, 'Orthodontic Laboratory Technician'),
(629, 'Orthodontist (MD)'),
(630, 'Outdoor Education Teacher'),
(631, 'Overhead Door Installer'),
(632, 'Package Designer'),
(633, 'Packaging Machine Operator'),
(634, 'Packers and Packagers, Hand'),
(635, 'Painter (Industrial)'),
(636, 'Painters, Construction and Maintenance'),
(637, 'Painters, Transportation Equipment'),
(638, 'Park Naturalist'),
(639, 'Parking Enforcement Officer'),
(640, 'Parking Lot Attendant'),
(641, 'Parole Officer'),
(642, 'Parts Salesperson'),
(643, 'Paste-Up Worker (Graphic Arts)'),
(644, 'Patent Agent'),
(645, 'Patent Lawyer'),
(646, 'Pathologist (MD)'),
(647, 'Payroll and Timekeeping Clerks'),
(648, 'PBX Installer and Repairer'),
(649, 'Peace Corps Worker (Volunteer)'),
(650, 'Pediatric Dentist'),
(651, 'Pediatrician (MD)'),
(652, 'Personal Service Supervisor'),
(653, 'Personnel Administrator'),
(654, 'Personnel Assistant'),
(655, 'Personnel Recruiter'),
(656, 'Pest Control Workers'),
(657, 'Pesticide Handlers'),
(658, 'Petroleum Engineer'),
(659, 'Petroleum Geologist'),
(660, 'Petroleum Laboratory Assistant'),
(661, 'Petroleum Refinery Operator'),
(662, 'Petroleum Technician'),
(663, 'Pharmacy Aides'),
(664, 'Pharmacy Technician'),
(665, 'Philosophy and Religion Professor'),
(666, 'Photo-Optics Technician'),
(667, 'Photoengravers (Graphic Arts)'),
(668, 'Photogrammetric Engineer'),
(669, 'Photographic Equipment Mechanic'),
(670, 'Photographic Process Workers'),
(671, 'Physical Education Instructor'),
(672, 'Physical Therapist'),
(673, 'Physical Therapist Aides'),
(674, 'Physical Therapy Assistant'),
(675, 'Physician\'s Assistant (PA)'),
(676, 'Physician\'s Office Nurse'),
(677, 'Physics Professor'),
(678, 'Pilot (Commercial Airlines)'),
(679, 'Plant Breeder'),
(680, 'Plant Manager (Manufacturing)'),
(681, 'Plasterers and Stucco Masons'),
(682, 'Plastic Surgeon'),
(683, 'Platemakers (Graphic Arts)'),
(684, 'Plumber (Plumbing Contractor)'),
(685, 'Poets and Lyricists'),
(686, 'Police and Detectives Supervisor'),
(687, 'Police Artist'),
(688, 'Police Identification and Records Officers'),
(689, 'Police Officer'),
(690, 'Political Science Professor'),
(691, 'Political Scientist'),
(692, 'Postal Service Clerks'),
(693, 'Postal Service Mail Carriers'),
(694, 'Postal Service Mail Sorter'),
(695, 'Postmasters and Mail Superintendents'),
(696, 'Power Plant Operators'),
(697, 'Power-Line Installer and Mechanic'),
(698, 'Precision Devices Inspectors and Testers'),
(699, 'Preschool Administrator'),
(700, 'Preschool Teacher'),
(701, 'Pressing Machine Operator'),
(702, 'Pressure Vessel Inspectors'),
(703, 'Printing/Graphic Arts Reproduction Technician'),
(704, 'Printmaker (Artist)'),
(705, 'Private Detectives and Investigators'),
(706, 'Private Nurse'),
(707, 'Private Sector Executives'),
(708, 'Probate Lawyer'),
(709, 'Probation Officer'),
(710, 'Procurement Clerks'),
(711, 'Product Planner'),
(712, 'Product Safety Engineer'),
(713, 'Production Planner'),
(714, 'Production, Planning, and Expediting Clerks'),
(715, 'Professional Sports Scout'),
(716, 'Proofreaders and Copy Markers'),
(717, 'Property Accountant'),
(718, 'Property Assessor'),
(719, 'Property Managers'),
(720, 'Props and Lighting Technicians'),
(721, 'Prosthetic Technician'),
(722, 'Psychiatric Aide'),
(723, 'Psychiatric Technician'),
(724, 'Psychiatrist (MD)'),
(725, 'Psychology Professor'),
(726, 'Public Health Service Officer'),
(727, 'Public Relations Manager'),
(728, 'Public Relations Specialist'),
(729, 'Public Transportation Inspector'),
(730, 'Publications Editor'),
(731, 'Purchasing Agent'),
(732, 'Purchasing Manager'),
(733, 'Quality Control Coordinator'),
(734, 'Quality Control Engineer'),
(735, 'Quality Control Inspector'),
(736, 'Quality Control Technician'),
(737, 'Quarry Worker'),
(738, 'Radar and Sonar Technicians'),
(739, 'Radiation Protection Engineer'),
(740, 'Radiation Therapists'),
(741, 'Radio & TV Announcer'),
(742, 'Radio & TV News Commentator'),
(743, 'Radio & TV Newscaster'),
(744, 'Radio & TV Producer'),
(745, 'Radio & TV Program Director'),
(746, 'Radio & TV Sports Announcer'),
(747, 'Radio & TV Station Administrator'),
(748, 'Radio & TV Talk Show Host'),
(749, 'Radio Mechanics'),
(750, 'Radio Operators'),
(751, 'Radiologic Technicians'),
(752, 'Radiologic Technologist'),
(753, 'Radiologist (MD)'),
(754, 'Rail Yard Engineers'),
(755, 'Railroad Conductors and Yardmasters'),
(756, 'Railroad Engineer'),
(757, 'Railroad Inspector'),
(758, 'Range Manager'),
(759, 'Real Estate Appraiser'),
(760, 'Real Estate Assessor'),
(761, 'Real Estate Broker'),
(762, 'Real Estate Lawyer'),
(763, 'Real Estate Sales Agents'),
(764, 'Recreation Leader'),
(765, 'Recreational Protective Service Worker'),
(766, 'Recreational Therapist'),
(767, 'Recreational Vehicle Mechanic'),
(768, 'Referee / Umpire'),
(769, 'Refuse and Recyclable Material Collectors'),
(770, 'Registrar Administrator'),
(771, 'Reliability Engineer'),
(772, 'Religious Institution Education Coordinator'),
(773, 'Reservation Ticket Agent'),
(774, 'Residence Counselor'),
(775, 'Resource Recovery Engineer'),
(776, 'Resource Teacher'),
(777, 'Respiratory Care Technician'),
(778, 'Respiratory Therapist'),
(779, 'Respiratory Therapy Technicians'),
(780, 'Restaurant Food Coordinator'),
(781, 'Restaurant Manager'),
(782, 'Retail Buyer'),
(783, 'Retail Customer Service Representative'),
(784, 'Retail Inventory Control Analyst'),
(785, 'Retail Sales Department Supervisor'),
(786, 'Retail Salespersons'),
(787, 'Retail Store Manager'),
(788, 'Revenue Agent (Government)'),
(789, 'Safety Inspector'),
(790, 'Sales Engineers'),
(791, 'Sales Floor Stock Clerk'),
(792, 'Sales Managers'),
(793, 'Sales Promoter'),
(794, 'Sales Representative (Aircraft)'),
(795, 'Sales Representative (Chemicals & Drugs)'),
(796, 'Sales Representative (Computers)'),
(797, 'Sales Representative (Graphic Arts)'),
(798, 'Sales Representative (Hotel Furnishings)'),
(799, 'Sales Representative (Medical Equipment)'),
(800, 'Sales Representative (Printed Advertising)'),
(801, 'Sales Representative (Radio & TV Time)'),
(802, 'Sales Representative (Telecommunications)'),
(803, 'Sales Representative (Teleconferencing)'),
(804, 'Sales Representative ( Education Programs)'),
(805, 'Sales Representatives (Agricultural Products)'),
(806, 'Sales Representatives (Instruments)'),
(807, 'Sales Representatives (Mechanical Equipment)'),
(808, 'Sales Representitive (Psychological Tests)'),
(809, 'Sanitary Engineer'),
(810, 'Sawing Machine Operator'),
(811, 'Scanner Operators'),
(812, 'School Nurse'),
(813, 'School Plant Consultant'),
(814, 'School Psychologist'),
(815, 'Scientific Linguist'),
(816, 'Scientific Photographer'),
(817, 'Screen Printing Machine Operators'),
(818, 'Screen Writer'),
(819, 'Script Editor'),
(820, 'Securities Broker'),
(821, 'Security and Fire Alarm Systems Installers'),
(822, 'Security Guard'),
(823, 'Self-Enrichment Education Teachers'),
(824, 'Septic Tank and Sewer Servicers'),
(825, 'Service Station Attendants'),
(826, 'Set Designer'),
(827, 'Set Illustrator'),
(828, 'Sewing Machine Operators'),
(829, 'Sheet Metal Workers'),
(830, 'Ship Carpenters and Joiners'),
(831, 'Ship Engineers'),
(832, 'Ship Master'),
(833, 'Ship Mate'),
(834, 'Ship Pilot'),
(835, 'Shipping, Receiving, and Traffic Clerks'),
(836, 'Shoe Machine Operators'),
(837, 'Signal Switch Repairers'),
(838, 'Skin Care Specialists'),
(839, 'Small Engine Mechanics'),
(840, 'Social and Community Service Managers'),
(841, 'Social and Human Service Assistants'),
(842, 'Social Psychologist'),
(843, 'Social Science Research Assistants'),
(844, 'Social Service Volunteer'),
(845, 'Social Welfare Administrator'),
(846, 'Social Work Professor'),
(847, 'Social Worker'),
(848, 'Sociology Professor'),
(849, 'Soil Conservation Technician'),
(850, 'Soil Conservationist'),
(851, 'Soil Engineer'),
(852, 'Soil Scientist'),
(853, 'Solar Energy Systems Designer'),
(854, 'Solid Waste Disposal Administrator'),
(855, 'Sound Engineering Technicians'),
(856, 'Special Education Administrator'),
(857, 'Special Forces'),
(858, 'Special Forces Officers'),
(859, 'Speech Pathologist'),
(860, 'Speech Writer'),
(861, 'Sport Psychologist'),
(862, 'Sport\'s/Entertainment Agent (Manager)'),
(863, 'Sports Agent'),
(864, 'Sports Events Business Manager'),
(865, 'Sports Physician (Orthopedist)'),
(866, 'Sportswriter (Journalist)'),
(867, 'Stained Glass Artist'),
(868, 'Standards Engineer'),
(869, 'Statement Clerks'),
(870, 'Stationary Engineers'),
(871, 'Statistical Assistants'),
(872, 'Steel Workers'),
(873, 'Storage and Distribution Manager'),
(874, 'Stress Analyst Engineer'),
(875, 'Structural Drafter'),
(876, 'Structural Engineer'),
(877, 'Student Admissions Administrator'),
(878, 'Student Affairs Administrator'),
(879, 'Student Financial Aid Administrator'),
(880, 'Substance Abuse Counselor'),
(881, 'Subway and Streetcar Conductor'),
(882, 'Surgeons (MD)'),
(883, 'Surgical Technician/Technologist'),
(884, 'Survey Researchers'),
(885, 'Surveying Technicians'),
(886, 'Switchboard Operator'),
(887, 'Systems Accountant'),
(888, 'Systems Analyst, Data Processing'),
(889, 'Tax Accountant'),
(890, 'Tax Auditor'),
(891, 'Tax Collector'),
(892, 'Tax Examiner'),
(893, 'Tax Lawyer'),
(894, 'Tax Preparer'),
(895, 'Taxi Drivers and Chauffeurs'),
(896, 'Teacher of the Blind'),
(897, 'Teachers Aide'),
(898, 'Team Assemblers'),
(899, 'Technical & Scientific Publications Editor'),
(900, 'Technical Directors/Managers'),
(901, 'Technical Illustrator'),
(902, 'Technical Publications Writer'),
(903, 'Technological Espionage Intelligence Agent'),
(904, 'Telecommunications Line Installers and Repairers'),
(905, 'Telecommunications Maintenance Worker'),
(906, 'Telecommunications Technician'),
(907, 'Telephone Station Installers'),
(908, 'Textile Bleaching and Dyeing Machine Operators'),
(909, 'Textile Cutting Machine Operators'),
(910, 'Textile Designer'),
(911, 'Tile and Marble Setters'),
(912, 'Title Examiner'),
(913, 'Title Searchers'),
(914, 'Tool & Machine Designer'),
(915, 'Tool and Die Makers'),
(916, 'Tool Grinders, Filers, and Sharpeners'),
(917, 'Tour Guide'),
(918, 'Town Clerk'),
(919, 'Traffic Administrator (Freight & Passenger)'),
(920, 'Traffic Agent'),
(921, 'Traffic Technicians'),
(922, 'Transit and Railroad Police'),
(923, 'Transportation Attendants'),
(924, 'Transportation Systems Design Engineer'),
(925, 'Travel Agent'),
(926, 'Travel Clerks'),
(927, 'Travel Counselor'),
(928, 'Travel Writer (Journalist)'),
(929, 'Treasurer (Corporate)'),
(930, 'Treatment Plant Operators'),
(931, 'Tree Trimmers and Pruners'),
(932, 'Truck Driver, Light Duty'),
(933, 'Truck Driver, Long Distance'),
(934, 'Ultrasound Technologist'),
(935, 'Unemployment Inspector'),
(936, 'Urban and Regional Planner'),
(937, 'Ushers and Lobby Attendants'),
(938, 'Utility Meter Reader'),
(939, 'Vending Machine Mechanic'),
(940, 'Veterinarian (VMD)'),
(941, 'Veterinarian Technician'),
(942, 'Veterinary Assistant'),
(943, 'Video Engineer'),
(944, 'Vocational Education Instructors College'),
(945, 'Vocational Education Teachers, High School'),
(946, 'Vocational Education Teachers, Middle School'),
(947, 'Vocational Rehabilitation Counselor'),
(948, 'Voice Pathologist'),
(949, 'Waiters and Waitresses'),
(950, 'Warehouse Stock Clerk'),
(951, 'Watch Repairers'),
(952, 'Water Pollution Control Inspector'),
(953, 'Weather Observer'),
(954, 'Web Art Director'),
(955, 'Weighers and Measurers'),
(956, 'Welder (Gas, Arc, Plasma, Laser)'),
(957, 'Welfare Eligibility Workers and Interviewers'),
(958, 'Wholesale Buyers'),
(959, 'Wildlife Biologist'),
(960, 'Wildlife Control Agent'),
(961, 'Windows - Draperies Treatment Specialist'),
(962, 'Woodworking Machine Operators'),
(963, 'Word Processing Specialist'),
(964, 'Writer /Author'),
(965, 'Zoo Veterinarian'),
(966, 'Zoologist'),
(967, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'ANDHRA PRADESH', 105),
(2, 'ASSAM', 105),
(3, 'ARUNACHAL PRADESH', 105),
(4, 'BIHAR', 105),
(5, 'GUJRAT', 105),
(6, 'HARYANA', 105),
(7, 'HIMACHAL PRADESH', 105),
(8, 'JAMMU & KASHMIR', 105),
(9, 'KARNATAKA', 105),
(10, 'KERALA', 105),
(11, 'MADHYA PRADESH', 105),
(12, 'MAHARASHTRA', 105),
(13, 'MANIPUR', 105),
(14, 'MEGHALAYA', 105),
(15, 'MIZORAM', 105),
(16, 'NAGALAND', 105),
(17, 'ORISSA', 105),
(18, 'PUNJAB', 105),
(19, 'RAJASTHAN', 105),
(20, 'SIKKIM', 105),
(21, 'TAMIL NADU', 105),
(22, 'TRIPURA', 105),
(23, 'UTTAR PRADESH', 105),
(24, 'WEST BENGAL', 105),
(25, 'DELHI', 105),
(26, 'GOA', 105),
(27, 'PONDICHERY', 105),
(28, 'LAKSHDWEEP', 105),
(29, 'DAMAN & DIU', 105),
(30, 'DADRA & NAGAR', 105),
(31, 'CHANDIGARH', 105),
(32, 'ANDAMAN & NICOBAR', 105),
(33, 'UTTARANCHAL', 105),
(34, 'JHARKHAND', 105),
(35, 'CHATTISGARH', 105),
(42, 'Demo', 257);

-- --------------------------------------------------------

--
-- Table structure for table `sub_caste`
--

CREATE TABLE `sub_caste` (
  `id` int(11) NOT NULL,
  `sub_caste` varchar(255) DEFAULT NULL,
  `caste_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sub_caste`
--

INSERT INTO `sub_caste` (`id`, `sub_caste`, `caste_id`) VALUES
(1, 'Maratha ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `success_story`
--

CREATE TABLE `success_story` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `wedding_date` text NOT NULL,
  `message` longtext DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `success_story`
--

INSERT INTO `success_story` (`id`, `name`, `location`, `wedding_date`, `message`, `filename`, `created_at`, `updated_at`) VALUES
(1, 'Rajesh & Radha', 'Phulambri', '2022-04-24', '', 'about-1.jpg', '2025-03-24 12:23:31', '2025-03-24 12:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `table_plan`
--

CREATE TABLE `table_plan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `plan_duration` varchar(255) NOT NULL,
  `type_plan` varchar(2552) NOT NULL,
  `plan_price` int(11) NOT NULL,
  `type_plan_id` int(11) NOT NULL,
  `plan_purchase_date` date DEFAULT NULL,
  `plan_expiry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_plan`
--

INSERT INTO `table_plan` (`id`, `user_id`, `label`, `payment_status`, `plan_duration`, `type_plan`, `plan_price`, `type_plan_id`, `plan_purchase_date`, `plan_expiry_date`) VALUES
(1, 2, 'supreme', 1, '3', 'Pearl', 1999, 12, '2025-03-20', '2025-06-18'),
(2, 1, 'vip', 1, '6', 'Gold', 2500, 16, '2025-03-20', '2025-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `user_regiter`
--

CREATE TABLE `user_regiter` (
  `id` int(11) NOT NULL,
  `member_id` varchar(20) DEFAULT NULL,
  `profile_for` varchar(255) DEFAULT NULL,
  `profile_creater_name` varchar(255) DEFAULT NULL,
  `creater_mobile` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `whatsapp_no` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `perma_address` text DEFAULT NULL,
  `marStat` varchar(255) DEFAULT NULL,
  `rashi` varchar(255) DEFAULT NULL,
  `lang` varchar(255) DEFAULT NULL,
  `diet` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `sub-com` varchar(255) DEFAULT NULL,
  `community-checkbox` varchar(255) DEFAULT NULL,
  `HighEdu` varchar(255) DEFAULT NULL,
  `edu_degree` text DEFAULT NULL,
  `collage` varchar(255) DEFAULT NULL,
  `prof` varchar(255) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `working_city` varchar(255) DEFAULT NULL,
  `income` varchar(255) DEFAULT NULL,
  `yes/no` varchar(255) DEFAULT NULL,
  `bGrp` varchar(255) DEFAULT NULL,
  `bDate` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `bTime` varchar(255) DEFAULT NULL,
  `bLocation` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `adhar_pan_voter_image` text DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `term_and_cond` varchar(255) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `plan_duration` varchar(255) DEFAULT NULL,
  `type_plan` varchar(255) DEFAULT 'Free',
  `label` varchar(255) DEFAULT 'other',
  `plan_price` int(11) NOT NULL DEFAULT 0,
  `type_plan_id` int(11) DEFAULT NULL,
  `plan_purchase_date` datetime DEFAULT current_timestamp(),
  `plan_expiry_date` date DEFAULT NULL,
  `visible_prof` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `verified` int(11) DEFAULT 0,
  `OTP` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `deleted_profile` int(11) NOT NULL DEFAULT 0,
  `forget_pass_otp` int(11) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_regiter`
--

INSERT INTO `user_regiter` (`id`, `member_id`, `profile_for`, `profile_creater_name`, `creater_mobile`, `name`, `email`, `phone`, `whatsapp_no`, `password`, `country`, `state`, `city`, `address`, `perma_address`, `marStat`, `rashi`, `lang`, `diet`, `height`, `religion`, `sub-com`, `community-checkbox`, `HighEdu`, `edu_degree`, `collage`, `prof`, `specialization`, `working_city`, `income`, `yes/no`, `bGrp`, `bDate`, `age`, `gender`, `bTime`, `bLocation`, `filename`, `adhar_pan_voter_image`, `bio`, `term_and_cond`, `payment_status`, `plan_duration`, `type_plan`, `label`, `plan_price`, `type_plan_id`, `plan_purchase_date`, `plan_expiry_date`, `visible_prof`, `status`, `verified`, `OTP`, `active`, `deleted_profile`, `forget_pass_otp`, `created_at`, `updated_at`) VALUES
(1, 'LN000001', 'Self', 'Rajesh', '9112060685', 'Rajesh Banswal', 'rajesh@ewebdigital.com', '9112060685', '', 'e10adc3949ba59abbe56e057f20f883e', '105', '12', '316', 'Sillod', 'Sillod', 'Unmarried', 'Libra', 'Marathi', 'Non-Neg', '5.8', 'Hindu', 'Maratha', 'No', 'Masters', 'MCA', NULL, 'Software-Developer', NULL, NULL, '3 To 4 Lac P.A', 'yes', 'O+', '1995-06-07', 29, 'Male', '05:00', NULL, '1742376082.png', 'pexels-arthur-uzoagba-3061628-30493646.jpg', NULL, 'I Accept', 1, '6', 'Gold', 'vip', 2500, 16, '2025-03-20 00:00:00', '2025-09-16', 75, 1, 0, 0, NULL, 0, NULL, '2025-03-18', '2025-03-18 15:16:01'),
(2, 'LN000002', 'Self', 'Radha', '9876543210', 'Pratiksha Sonwane', 'pratiksha@gmail.com', '9876543210', '', 'e10adc3949ba59abbe56e057f20f883e', '105', '12', '316', 'Satara Parisar', 'Satara Parisar', 'Unmarried', 'Scorpio', 'Marathi', 'Non-Neg', '5.0', 'Hindu', 'Maratha', 'No', 'Graduate', 'B.SC', NULL, 'Students', NULL, NULL, 'No Income', 'yes', 'A+', '2000-02-01', 24, 'Female', '13:00', NULL, '1742378697.png', '1742376082.png', NULL, 'I Accept', 1, '3', 'Pearl', 'supreme', 1999, 12, '2025-03-20 00:00:00', '2025-06-18', 50, 1, 0, 0, NULL, 0, NULL, '2025-03-19', '2025-03-19 15:26:44'),
(3, 'LN000003', 'Myself', 'Vaishnavi', '9632587410', 'Vaishnavi S Gore', 'vaishnavi@gmail.com', '9632587410', '9632587410', 'e10adc3949ba59abbe56e057f20f883e', '105', '12', '316', 'Devlai ', 'Devlai ', 'Unmarried', 'Don`t know', 'Marathi', 'Veg', '5.1', 'Hindu', 'Maratha', 'No', 'Masters', 'MCA', NULL, 'Software-Developer', NULL, NULL, '1 TO 2 Lac P.A', 'Yes', 'A+', '2000-08-21', 25, 'Female', '17:00', 'Devlai ', '1742445954.jpg', 'pexels-arthur-uzoagba-3061628-30493646.jpg', NULL, 'I Accept', NULL, NULL, 'Free', 'other', 0, NULL, '2025-03-20 10:15:54', NULL, NULL, 1, 0, 0, NULL, 0, NULL, '2025-03-20', '2025-03-20 10:15:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caste`
--
ALTER TABLE `caste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_plans`
--
ALTER TABLE `create_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_degree`
--
ALTER TABLE `education_degree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `highedu`
--
ALTER TABLE `highedu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_clans`
--
ALTER TABLE `main_clans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misuse_data`
--
ALTER TABLE `misuse_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `premium_membership`
--
ALTER TABLE `premium_membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shortlist`
--
ALTER TABLE `shortlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_caste`
--
ALTER TABLE `sub_caste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `success_story`
--
ALTER TABLE `success_story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_plan`
--
ALTER TABLE `table_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_regiter`
--
ALTER TABLE `user_regiter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `member_id` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `caste`
--
ALTER TABLE `caste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=612;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT for table `create_plans`
--
ALTER TABLE `create_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `education_degree`
--
ALTER TABLE `education_degree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `highedu`
--
ALTER TABLE `highedu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `main_clans`
--
ALTER TABLE `main_clans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `misuse_data`
--
ALTER TABLE `misuse_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `premium_membership`
--
ALTER TABLE `premium_membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profession`
--
ALTER TABLE `profession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shortlist`
--
ALTER TABLE `shortlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=968;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `sub_caste`
--
ALTER TABLE `sub_caste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- AUTO_INCREMENT for table `success_story`
--
ALTER TABLE `success_story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_plan`
--
ALTER TABLE `table_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_regiter`
--
ALTER TABLE `user_regiter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
