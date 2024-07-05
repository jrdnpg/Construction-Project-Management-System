-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 04:14 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `construction`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `comment_name` varchar(250) NOT NULL,
  `comment_email` varchar(250) NOT NULL,
  `comment_message` varchar(250) NOT NULL,
  `comment_date` date NOT NULL DEFAULT current_timestamp(),
  `comment_time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `comment_name`, `comment_email`, `comment_message`, `comment_date`, `comment_time`) VALUES
(3, 'Layka B. Gallardo', 'laykagallardo@gmail.com', 'Throughout the project SEAS Constructions has performed exceptionally well, demonstrating at all times a dedicated and professional attitude, completing the works in an efficient and timely manner with excellent quality of work.\r\n\r\n', '2022-11-25', '15:12:15'),
(4, 'Shane G.Bautista', 'bautistashane@gmail.com', 'Big thanks to the SEAS Constructions crew for their work on the construction of our new home. We knew what to expect without any smoke and mirrors or unexpected charges after chatting with you. I\'m grateful.', '2022-11-25', '15:12:53'),
(5, 'Anthony A. Nimo', 'NimoAnthony@gmail.com', '	\r\nBig thanks to the SEAS Constructions crew for their work on the construction of our new home. We knew what to expect without any smoke and mirrors or unexpected charges after chatting with you. I\'m grateful.', '2022-12-03', '17:40:33'),
(6, 'Wilson G. Urge', 'urgewilson@gmail.com', 'Throughout the project SEAS Constructions has performed exceptionally well, demonstrating at all times a dedicated and professional attitude, completing the works in an efficient and timely manner with excellent quality of work.\r\n\r\n', '2022-12-03', '17:41:40'),
(8, 'Jason Magsino', 'Mags@gmail.com', 'ang pogi ni sir', '2022-12-09', '10:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `dtr`
--

CREATE TABLE `dtr` (
  `dtr_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `dtr_date` date NOT NULL DEFAULT current_timestamp(),
  `am_in` varchar(250) NOT NULL,
  `am_out` varchar(250) NOT NULL,
  `pm_in` varchar(250) NOT NULL,
  `pm_out` varchar(250) NOT NULL,
  `ot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dtr`
--

INSERT INTO `dtr` (`dtr_id`, `employee_id`, `dtr_date`, `am_in`, `am_out`, `pm_in`, `pm_out`, `ot`) VALUES
(41, 61, '2022-12-03', '07:15', '12:34', '13:21', '17:00', 0),
(47, 63, '2022-12-04', '07:49', '12:00', '13:00', '17:06', 0),
(48, 64, '2022-12-04', '07:00', '12:00', '12:59', '17:15', 5),
(49, 62, '2022-12-04', '19:00', '12:00', '12:58', '17:10', 4),
(50, 54, '2022-12-04', '', '', '', '', 0),
(52, 58, '2022-12-04', '', '', '', '', 0),
(53, 69, '2022-12-04', '', '', '', '', 0),
(54, 62, '2022-12-04', '', '', '', '', 0),
(55, 75, '2022-12-09', '10:22', '12:22', '', '', 48);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `mid_name` varchar(191) NOT NULL,
  `position` varchar(191) NOT NULL,
  `age` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `salary` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `first_name`, `last_name`, `mid_name`, `position`, `age`, `address`, `phone`, `salary`) VALUES
(55, 'Froilan', 'Villegas', '', 'Mason', '45', 'Malaruhatan', '09367722118', '800'),
(56, 'Michael', 'Cudiamat', '', 'Laborer', '35', 'Poblacion 3', '09398153835', '400'),
(57, 'Romy', 'Butiong', '', 'Laborer', '35', 'Malaruhatan', '09352788163', '400'),
(58, 'Freddie', 'Bascuguin', '', 'Painter', '45', 'Bagong Pook', '09396825186', '400'),
(59, 'Roderick', 'Seminiano', '', 'Laborer', '45', 'Poblacion 5', '09366284315', '400'),
(60, 'Marvin', 'Malinay', '', 'Laborer', '25', 'Poblacion 4', '09092617656', '400'),
(61, 'Alberto', 'Montealegre', '', 'Mason', '32', 'Poblacion 4', '09876398457', '800'),
(62, 'Cresencio', 'Beadoy', '', 'Laborer', '35', 'Prenza', '09564379265', '400'),
(63, 'Alexander', 'Magana', '', 'Mason/Carpenter', '32', 'Kapito', '09657364855', '800'),
(64, 'Alvin', 'Jonson', '', 'Laborer', '24', 'Prenza', '09097351527', '400'),
(65, 'Jissie', 'Estacion', '', 'Laborer', '26', 'Poblacion 5', '09675351282', '400'),
(66, 'Wilbert', 'Montealegre', '', 'Laborer', '24', 'Poblacion 4', '09256797875', '400'),
(67, 'Jhoeri', 'Villanueva', '', 'Backhoe Operator', '28', 'Poblacion 5', '09354658658', '800'),
(68, 'Eduardo', 'Mendoza', '', 'Laborer', '29', 'Malaruhatan', '09675463926', '400'),
(69, 'Jay john', 'Cudiamat', '', 'Driver', '27', 'Poblacion 3', '09756534245', '700'),
(70, 'Raymond', 'Manalo', '', 'Mason', '32', 'Kapito', '09258267648', '800'),
(71, 'Vincent Gerald', 'Villegas', '', 'Laborer', '23', 'Malaruhatan', '09357628543', '400'),
(72, 'Jeffrey', 'Lubugan', '', 'Driver', '25', 'Malaruhatan', '09756686355', '700'),
(73, 'John Patrick', 'Rivera', '', 'Laborer', '24', 'Humayingan', '09079190678', '400'),
(74, 'Kenneth', 'Alvarez', 'B.', 'Foreman', '25', 'Malaruhatan', '09079106448', '800'),
(75, 'Jason', 'Magsino', 'C', 'Foreman', '25', 'Malaruhatan', '09087725362', '1500');

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `equip_id` int(11) NOT NULL,
  `equip_name` varchar(191) NOT NULL,
  `manufacturer` varchar(191) NOT NULL,
  `model` varchar(191) NOT NULL,
  `equip_quantity` varchar(191) NOT NULL,
  `equip_purchase_price` varchar(191) NOT NULL,
  `equip_purchase_date` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`equip_id`, `equip_name`, `manufacturer`, `model`, `equip_quantity`, `equip_purchase_price`, `equip_purchase_date`) VALUES
(16, 'Wheel Loaders', 'Komatsu', '250CX', '6', '8397410', '2022-11-23'),
(17, 'Compact Truck Loader', 'Suzuki', '200x', '3', '8928307', '2022-11-24'),
(18, 'backhoe', 'Suzuki', '200x', '1', '200453', '2022-11-22'),
(19, 'Boom Lifts', 'Caterpillar', '200L', '2', '200380', '2022-11-16'),
(20, 'Excavators', 'Bobcat', '320L', '5', '49201609', '2022-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `loc_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `location` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`loc_id`, `location_id`, `location`) VALUES
(14, 61, 'Lian'),
(15, 63, 'Lian'),
(16, 64, 'Lian'),
(17, 62, 'Lian'),
(18, 68, 'Lian'),
(19, 54, 'Lian'),
(20, 58, 'Lian'),
(21, 55, 'Tuy'),
(22, 69, 'Tuy'),
(23, 72, 'Tuy'),
(24, 72, 'Lian'),
(25, 67, 'Tuy'),
(26, 65, 'Tuy'),
(27, 73, 'Tuy'),
(28, 60, 'Tuy'),
(29, 56, 'Balayan'),
(30, 70, 'Balayan'),
(31, 71, 'Balayan'),
(32, 66, 'Balayan'),
(33, 68, 'Tagaytay'),
(34, 68, 'Nasugbu'),
(35, 55, 'nasugbu');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `cus_id` int(11) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_email` varchar(250) NOT NULL,
  `customer_subject` varchar(250) NOT NULL,
  `customer_message` text NOT NULL,
  `message_date` date NOT NULL DEFAULT current_timestamp(),
  `message_time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`cus_id`, `customer_name`, `customer_email`, `customer_subject`, `customer_message`, `message_date`, `message_time`) VALUES
(28, 'Angelo C. Delas Alas', 'angelodelasalas@gmail.com', 'Project Proposal', 'Thanks for reaching out. I’m currently fully booked through December 10 so the next available slot in my calendar is December 20.\r\n\r\nI understand if it’s not possible to wait that long, however, if you would like to work with me I do suggest moving fast to make sure you get into my schedule.\r\n\r\nOnly signed contracts with down payments go into my schedule, so I’d be happy to explore a few options for you and have you get the very next slot in my calendar.\r\n\r\nCan I send over my proposal and contract?\r\n\r\nThanks,\r\n', '2022-12-03', '17:17:09'),
(29, 'Brianne B. Dacanay', 'dacanaybrianne@gmail.com', 'Proposal for renovation house', 'That all sounds great. The best next step forward is to schedule a 15-minute call where we can meet and discuss which options is right. \r\n\r\nDoes next week on Tuesday at 10:00am work for you?\r\n\r\nIf not, please send me a couple times that work for you, and I will see if I’m free at that time.', '2022-12-03', '17:19:22'),
(30, 'Donna Mae P. Marquez', 'maemarquez@gmail.com', 'Proposol Of Project Ideas', 'Your company, Seas Construction and supply is amazing. One of my favorite things about it is the great and fast building of houses ang infrastracture.\r\n\r\nIn fact, your company reminds a lot of [impressive past client], that needed something similar – and that tells me you probably want a partnership as well.\r\n\r\nCan I send you some ideas for how we can work on this?\r\n', '2022-12-03', '17:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `cost` varchar(250) NOT NULL,
  `duration` varchar(250) NOT NULL,
  `started` varchar(250) NOT NULL,
  `target_date` varchar(250) NOT NULL,
  `completed` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `title`, `location`, `cost`, `duration`, `started`, `target_date`, `completed`, `image`) VALUES
(26, 'Lian Central School Renovation', 'Lian', '200000', '', '2022-12-31', '2022-12-16', '2022-12-17', 'd41d8cd98f00b204e9800998ecf8427e1670144219.png'),
(27, 'Tuy Pipelining', 'Tuy', '20000000', '', '2022-12-03', '2023-04-22', '2023-03-25', 'IMG-638ae5f2688629.91038508.jpg'),
(28, 'Waltermart Building', 'Nasugbu', '2302000', '', '2022-12-03', '2023-03-04', '2023-02-16', 'IMG-638ae64c110a53.52894367.png'),
(32, 'Lian Central school Renovation', 'Lian', '100000', '', '2022-12-09', '2023-01-14', '', 'IMG-63929ab1a07032.41946019.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(4, 'TUY pipeline', 'pipelining', '2022-11-27 17:08:00', '2022-12-10 17:08:00'),
(6, 'Lian Central school Renovation', 'window installation', '2022-12-04 17:00:00', '2022-12-31 17:00:00'),
(7, 'Lian Central school Renovation', 'window repairs', '2022-12-09 10:18:00', '2023-01-07 10:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `supplier` varchar(250) NOT NULL,
  `brand` varchar(250) NOT NULL,
  `unit` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `item_quantity` varchar(250) NOT NULL,
  `item_purchase_price` varchar(250) NOT NULL,
  `item_purchase_date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supply`
--

INSERT INTO `supply` (`item_id`, `item_name`, `supplier`, `brand`, `unit`, `description`, `item_quantity`, `item_purchase_price`, `item_purchase_date`) VALUES
(2, 'pako', 'atlanta', 'none', 'box', '1', '12', '20000', '2022-11-21'),
(6, 'pako', 'atlanta', 'none', '1', '1', '1', '1', '2022-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `tool_id` int(11) NOT NULL,
  `tool_name` varchar(191) NOT NULL,
  `category` varchar(191) NOT NULL,
  `quantity` varchar(191) NOT NULL,
  `purchase_price` varchar(191) NOT NULL,
  `purchase_date` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`tool_id`, `tool_name`, `category`, `quantity`, `purchase_price`, `purchase_date`) VALUES
(28, 'Drill', 'Hand Tool', '8', '20', '2022-11-23'),
(31, 'Chisel', 'Hand Tool', '10', '2763', '2022-11-02'),
(32, 'Circular Saw', 'Machine Tool', '4', '4368', '2022-11-04'),
(33, 'Hand Saw', 'Power Tool', '2', '15000', '2022-11-05'),
(34, 'Drill', 'Power Tool', '4', '5375', '2022-11-02'),
(35, 'Jack Hammer', 'Power Tool', '7', '50271', '2022-11-08'),
(36, 'Concrete Saw', 'Power Tool', '6', '27397', '2022-11-08'),
(37, 'Screw Drivers', 'Hand Tool', '15', '2205', '2022-11-11'),
(38, 'Tape Measure ', 'Hand Tool', '20', '65630', '2022-11-13'),
(39, 'Bolster', 'Machine Tool', '2', '5000', '2022-12-04'),
(40, 'Bolster', 'Machine Tool', '7', '50000', '2022-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(15, 'johnpaulo', '476ebd8508df2ed94d8fcd68c7f24d87', 'John Paulo A. Bascuguin'),
(16, 'jordan', '336ed44020b8c2bad86e0530ec1999b2', 'Jordan Jonson'),
(17, 'jonson', '336ed44020b8c2bad86e0530ec1999b2', 'Jordan Jonson'),
(18, 'Lheo1624', '36d34a112487938543f3b0a8f2a838ae', 'Leo Delayola'),
(19, 'kenneth', '4bdbe6fe9cedde623b9cd1cb5b5fe304', 'Kenneth B. Alvarez'),
(20, 'jason', '6063febba59a66e57c0cd5df3d141f8e', 'Jason Magsino');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `dtr`
--
ALTER TABLE `dtr`
  ADD PRIMARY KEY (`dtr_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`equip_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`tool_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
  MODIFY `dtr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `equip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `tool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
