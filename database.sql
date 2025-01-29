-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 12:36 PM
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
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_description` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `event_date_time` datetime NOT NULL,
  `max_capacity` int(11) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `guest_registration_status` tinyint(1) DEFAULT 0,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(8, 'Super', 'Admin', 'admin@gmail.com', '00000000000', '$2y$10$BeNaGZ3CoIcGydSTi2x/0OD3vPPmdTn0wr0XQSgEjdX00cTze/5XK', 0, NULL, 'admin', 1, '2025-01-29 06:58:17', '2025-01-29 06:58:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
