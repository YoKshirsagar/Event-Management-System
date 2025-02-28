-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2025 at 06:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `user_id`, `message`, `timestamp`) VALUES
(1, 1, 'hii', '2025-02-20 13:42:14'),
(2, 4, 'hii bro', '2025-02-20 13:42:57'),
(3, 4, 'ky chalu aahe', '2025-02-20 13:43:04'),
(4, 1, 'nivant bhava', '2025-02-20 13:43:27'),
(5, 1, 'tuza sang', '2025-02-20 13:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `event_database`
--

CREATE TABLE `event_database` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `event_type` int(11) NOT NULL,
  `event_organizer_id` int(11) DEFAULT NULL,
  `event_client_id` int(11) DEFAULT NULL,
  `event_photos` varchar(200) NOT NULL,
  `event_date` date NOT NULL DEFAULT current_timestamp(),
  `event_ticket_sell_count` int(11) NOT NULL,
  `event_total_earning` int(11) NOT NULL,
  `complete_percent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_database`
--

INSERT INTO `event_database` (`event_id`, `event_name`, `event_type`, `event_organizer_id`, `event_client_id`, `event_photos`, `event_date`, `event_ticket_sell_count`, `event_total_earning`, `complete_percent`) VALUES
(1, 'Song Launch Event (Hukum)', 1, 4, 17, 'temp.jpg', '2025-01-10', 1000, 10000, 100),
(2, 'Trailer Launch Event (KGF CHAPTER 2)', 2, 4, 17, 'temp.png', '2025-01-11', 500, 50000, 60),
(3, 'Salaar Part 1 Trailer Launch Event', 2, 16, 17, 'img.png', '2025-01-12', 2000, 20000, 80),
(4, 'Pushpa 2 Success Event Party', 0, 4, 17, '../uploads/ETI.png', '2025-01-06', 22, 22, 100),
(5, 'Toxic Trailer Launch Event', 1, 4, 17, '', '2025-04-01', 10000, 100000, 20);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `project_owner_name` varchar(200) NOT NULL,
  `project_owner_email` varchar(200) NOT NULL,
  `project_owner_contact_no` varchar(200) NOT NULL,
  `project_owner_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`project_id`, `project_name`, `project_owner_name`, `project_owner_email`, `project_owner_contact_no`, `project_owner_address`) VALUES
(1, 'Event Management System', 'Kshirsagar Yogesh Dattatraya', 'yogeshkshirsagar393@gmail.com', '+917499665641', 'Dharashiv');

-- --------------------------------------------------------

--
-- Table structure for table `users_database`
--

CREATE TABLE `users_database` (
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` int(11) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `linkedin` text NOT NULL,
  `twitter` text NOT NULL,
  `github` text NOT NULL,
  `profile_information` text NOT NULL,
  `recent_activities` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_database`
--

INSERT INTO `users_database` (`user_id`, `name`, `email`, `password`, `user_type`, `phone_number`, `address`, `facebook`, `instagram`, `linkedin`, `twitter`, `github`, `profile_information`, `recent_activities`, `created_on`) VALUES
(1, 'Kshirsagar Yogesh Dattatraya', 'yogeshkshirsagar393@gmail.com', 'yogeshkshirsagar393@gmail.com', 1, '+917499665641', 'Dharashiv', 'https://www.facebook.com/share/1H2yUrdsxF/', 'https://www.instagram.com/yogeshkshirsagar_0001/', 'https://www.linkedin.com/in/yogesh-kshirsagar-838a2428b/', 'https://x.com/YogeshK11389', 'https://github.com/YoKshirsagar', 'Hello! I am Kshirsagar Yogesh Dattatraya, an enthusiastic developer and the admin of this Event Management System. With a keen interest in web development and programming, I am always eager to learn new technologies and improve my skills.Feel free to connect with me through my social media links. Let\'s collaborate and make great things happen!', 'Recently, I had the privilege of securing the 2nd place (Runner-up) in the Technical Event 2023 at Terna College of Engineering, Dharashiv, which was an incredible experience competing with talented peers and gaining valuable insights. Additionally, I completed a 6-session workshop on \"Essential Principles of Meaningful Life\" organized by the Personality Development Club at Government College of Engineering Chh. Sambhajinagar.', '2025-01-10 12:12:25'),
(4, 'Om Shingare', 'omshingare120@gmail.com', 'omshingare120@gmail.com', 2, '+918767561500', 'Dharashiv', '', '', '', '', '', 'Hello! I am Om Shingare, an enthusiastic developer and one of the Organizer of this Event Management System.', '', '2025-01-10 14:54:49'),
(5, 'Satwik Mahajan', 'satwikmahajan@gmail.com', 'satwikmahajan@gmail.com', 4, '+917020687155', 'Jalgaon', '', '', '', '', '', '', '', '2025-01-10 14:56:17'),
(6, 'Samarth Joshi', 'samarthjoshi@gmail.com', 'samarthjoshi@gmail.com', 4, '+919356804972', 'Dharashiv', '', '', '', '', '', '', '', '2025-01-10 14:57:45'),
(16, 'Shlok Javheri', 'shlokjavheri@gmail.com', 'shlokjavheri@gmail.com', 2, '+919021750463', 'Dharashiv', '', '', '', '', '', '', '', '2025-01-12 14:16:51'),
(17, 'Purushottam Sarsekar', 'purushottamsarsekar@gmail.com', 'purushottamsarsekar@gmail.com', 3, '+918605539217', 'Latur', '', '', '', '', '', '', '', '2025-01-12 14:21:47'),
(19, 'Tushar Gawande', 'tushargawande@gmail.com', 'tushargawande@gmail.com', 1, '+919022361966', 'Chhatrapati Sambhajinagar', '', '', '', '', '', '', '', '2025-02-20 14:08:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `event_database`
--
ALTER TABLE `event_database`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `organizer` (`event_organizer_id`),
  ADD KEY `client` (`event_client_id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `users_database`
--
ALTER TABLE `users_database`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_database`
--
ALTER TABLE `event_database`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_database`
--
ALTER TABLE `users_database`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_database` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `event_database`
--
ALTER TABLE `event_database`
  ADD CONSTRAINT `client` FOREIGN KEY (`event_client_id`) REFERENCES `users_database` (`user_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `organizer` FOREIGN KEY (`event_organizer_id`) REFERENCES `users_database` (`user_id`) ON DELETE SET NULL ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
