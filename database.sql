-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2025 at 12:57 PM
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
-- Database: `php_test_mvc_route`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_description` text DEFAULT NULL,
  `event_date_time` datetime NOT NULL,
  `max_capacity` int(11) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `guest_registration_status` tinyint(1) DEFAULT 0,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `code`, `user_id`, `event_title`, `event_description`, `event_date_time`, `max_capacity`, `is_active`, `guest_registration_status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, '3AFW4', 5, 'Bootstrap’s cards provide a flexible and extensible content container', '<h4>Check if File Already Exists</h4><p>Now we can add some restrictions.</p><p>First, we will check if the file already exists in the</p><p>sdf sdf</p><p>&nbsp;sd</p><p>f s</p><p>df</p>', '2025-02-05 20:05:00', 50, 1, 1, 0, '2025-01-31 14:06:11', '2025-02-01 08:55:50'),
(2, 'Y29VB', 5, 'Content types', '<p>Content types</p><p>Cards support a wide variety of content, including images, text, list groups, links, and more. Below are examples of what’s supported.</p><p><strong>Body</strong></p><p>The building block of a card is the .card-body. Use it whenever you need a padded section within a card.</p><p>Cards support a wide variety of content, including images, text, list groups, links, and more. Below are examples of what’s supported.</p><p>Body</p><p>The building block of a card is the .card-body. Use it whenever you need a padded section within a card.</p><p>Cards support a wide variety of content, including images, text, list groups, links, and more. Below are examples of what’s supported.</p><p>Body</p><p>The building block of a card is the .card-body. Use it whenever you need a padded section within a card.</p>', '2025-02-03 18:15:00', 100, 1, 1, 0, '2025-01-31 14:14:42', '2025-02-01 08:45:59'),
(3, '5CH0Q', 5, 'What is Lorem Ipsum?', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><p><br><br data-cke-filler=\"true\"></p>', '2025-02-14 22:40:00', 33, 1, 1, 0, '2025-01-31 16:21:01', '2025-02-01 09:40:57'),
(4, '2B96L', 9, 'Not Sure, Which Home is Best?', '<p>Experience the pinnacle of luxurious living at Bangla Boshoti at Rivera Park City, an exclusive township within Dhaka Metro City. This exceptional community offers independent duplex and triplex houses, each with a private garden, providing ample space and a serene environment for your family. Homeowners at Bangla Boshoti at Rivera Park City enjoy access to world-class amenities, including a state-of-the-art community center, multi-cuisine restaurants, and a refreshing swimming pool. The vibrant community center is perfect for social gatherings and recreational activities, while the restaurants offer a variety of culinary delights right within your neighborhood. The elegant swimming pool provides a place to relax or enjoy a refreshing workout. With its thoughtful design, Bangla Boshoti at Rivera Park City combines the best of independent living with the exclusivity of a well-planned township, offering a secure and peaceful neighborhood. Elevate your living experience with the perfect blend of luxury, comfort, and convenience at Bangla Boshoti at Rivera Park City. Discover your dream home today and embrace the unparalleled lifestyle this exceptional township offers.</p>', '2025-02-28 10:00:00', 45, 1, 1, 0, '2025-02-01 10:12:22', '2025-02-01 10:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `event_attendees`
--

CREATE TABLE `event_attendees` (
  `id` int(11) UNSIGNED NOT NULL,
  `event_code` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `registration_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_attendees`
--

INSERT INTO `event_attendees` (`id`, `event_code`, `user_id`, `full_name`, `email`, `phone_number`, `registration_date`, `created_at`, `updated_at`) VALUES
(1, 'Y29VB', 0, 'Ridoy Paul', 'cse.ridoypaul@gmail.com', '01627382866', '2025-02-01 11:03:36', '2025-02-01 05:03:36', '2025-02-01 05:03:36'),
(2, '5CH0Q', 0, 'Ridoy Paul', 'cse.ridoypaul@gmail.com', '01627382866', '2025-02-01 11:24:48', '2025-02-01 05:24:48', '2025-02-01 05:24:48'),
(3, '3AFW4', 0, 'Ridoy Paul', 'cse.ridoypaul@gmail.com', '01627382866', '2025-02-01 11:28:28', '2025-02-01 05:28:28', '2025-02-01 05:28:28'),
(4, '3AFW4', 0, 'Ridoy Paul', 'abulkabul@gmail.com', '01766622828', '2025-02-01 12:44:39', '2025-02-01 06:44:39', '2025-02-01 06:44:39'),
(5, '5CH0Q', 0, ' Arif', 'arif@gmail.com', '01766622823', '2025-02-01 16:06:17', '2025-02-01 10:06:17', '2025-02-01 10:06:17'),
(6, '2B96L', 5, 'Ridoy Paul', 'cse.ridoypaul@gmail.com', '01627382866', '2025-02-01 16:12:41', '2025-02-01 10:12:41', '2025-02-01 10:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_email_verified` tinyint(1) DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'user',
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `is_email_verified`, `image`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Aurelia', 'Bailey', 'wixonypahi@mailinator.com', '+1 (228) 631-12', '$2y$10$S2ql91mRQiGdNREkVB524uPgic.tOf2mvc9d6hZvSIaHk57MDEN8q', 0, NULL, 'user', 1, '2025-01-28 06:32:04', '2025-01-28 06:32:04'),
(5, 'Ridoy', 'Paul', 'cse.ridoypaul@gmail.com', '01627382866', '$2y$10$/K7xBIFb3sOHVkl1rgLhMe/XbEPOa6/kFywwAS88PFI7paQvQUMGy', 0, NULL, 'user', 1, '2025-01-28 10:12:03', '2025-01-28 10:12:03'),
(6, 'Lamar', 'Roberson', 'nigiwe@mailinator.com', '+1 (751) 766-74', '$2y$10$pv66sX64HEYTQqPNUkYmcO.LpqZCQ67FXbnvNtVmiLiwPAivbjPn2', 0, NULL, 'user', 1, '2025-01-28 10:25:08', '2025-01-28 10:25:08'),
(7, 'dghdgh', 'dfgdfg', 'hello@gmail.com', '23423423423243', '$2y$10$3vBfQfTDmr5xGjwc2agzgO6/.7tgleZJ6EMp2jUIyuZLqgICZ46ru', 0, NULL, 'user', 1, '2025-01-28 11:20:00', '2025-01-28 11:20:00'),
(8, 'Super', 'Admin', 'admin@gmail.com', '00000000000', '$2y$10$BeNaGZ3CoIcGydSTi2x/0OD3vPPmdTn0wr0XQSgEjdX00cTze/5XK', 0, NULL, 'admin', 1, '2025-01-29 06:58:17', '2025-01-29 06:58:34'),
(9, 'Sohel', 'Mia', 'sohel@gmail.com', '01627382855', '$2y$10$CsVqJggEbhnNCLHNlLpPfOiEy3d1z3XHFvhlMB2HpZpirIssISvDa', 0, NULL, 'user', 1, '2025-02-01 10:06:55', '2025-02-01 10:06:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `fk_events_user` (`user_id`);

--
-- Indexes for table `event_attendees`
--
ALTER TABLE `event_attendees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_event` (`event_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_attendees`
--
ALTER TABLE `event_attendees`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_events_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_attendees`
--
ALTER TABLE `event_attendees`
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`event_code`) REFERENCES `events` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
