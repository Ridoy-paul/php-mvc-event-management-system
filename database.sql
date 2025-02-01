-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 01, 2025 at 06:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
(1, '3AFW4', 5, 'The standard Lorem Ipsum passage, used since the 1500s', '<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n', '2025-02-05 20:05:00', 50, 1, 1, 0, '2025-01-31 14:06:11', '2025-02-01 14:25:13'),
(2, 'Y29VB', 5, 'Why do we use it?', '<p>Cards support a wide variety of content, including images, text, list groups, links, and more. Below are examples of what&rsquo;s supported.</p>\r\n\r\n<p><strong>Body</strong></p>\r\n\r\n<p>The building block of a card is the .card-body. Use it whenever you need a padded section within a card.</p>\r\n\r\n<p>Cards support a wide variety of content, including images, text, list groups, links, and more. Below are examples of what&rsquo;s supported.</p>\r\n\r\n<p>Body</p>\r\n\r\n<p>The building block of a card is the .card-body. Use it whenever you need a padded section within a card.</p>\r\n\r\n<p>Cards support a wide variety of content, including images, text, list groups, links, and more. Below are examples of what&rsquo;s supported.</p>\r\n\r\n<p>Body</p>\r\n\r\n<p>The building block of a card is the .card-body. Use it whenever you need a padded section within a card.</p>\r\n', '2025-02-03 18:15:00', 100, 1, 1, 0, '2025-01-31 14:14:42', '2025-02-01 14:24:37'),
(3, '5CH0Q', 5, 'What is Lorem Ipsum?', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p><br />\r\n<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<br />\r\n&nbsp;</p>\r\n', '2025-02-14 22:40:00', 33, 1, 1, 0, '2025-01-31 16:21:01', '2025-02-01 14:17:09'),
(4, '2B96L', 9, 'Not Sure, Which Home is Best?', '<p>Experience the pinnacle of luxurious living at Bangla Boshoti at Rivera Park City, an exclusive township within Dhaka Metro City. This exceptional community offers independent duplex and triplex houses, each with a private garden, providing ample space and a serene environment for your family. Homeowners at Bangla Boshoti at Rivera Park City enjoy access to world-class amenities, including a state-of-the-art community center, multi-cuisine restaurants, and a refreshing swimming pool. The vibrant community center is perfect for social gatherings and recreational activities, while the restaurants offer a variety of culinary delights right within your neighborhood. The elegant swimming pool provides a place to relax or enjoy a refreshing workout. With its thoughtful design, Bangla Boshoti at Rivera Park City combines the best of independent living with the exclusivity of a well-planned township, offering a secure and peaceful neighborhood. Elevate your living experience with the perfect blend of luxury, comfort, and convenience at Bangla Boshoti at Rivera Park City. Discover your dream home today and embrace the unparalleled lifestyle this exceptional township offers.</p>', '2025-02-28 10:00:00', 45, 1, 1, 0, '2025-02-01 10:12:22', '2025-02-01 10:12:22'),
(5, 'BVL9U', 5, 'Where does it come from?', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s.</p>\r\n', '2025-02-23 20:00:00', 80, 1, 1, 0, '2025-02-01 14:18:30', '2025-02-01 14:18:30'),
(6, 'BC964', 5, '1914 translation by H. Rackham', '<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n', '2025-02-21 10:00:00', 45, 1, 1, 0, '2025-02-01 14:25:51', '2025-02-01 14:25:51'),
(7, '8RCUV', 5, 'Section 1.10.33 of de Finibus Bonorum et Malorum, written by Cicero in 45 BC', '<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n', '2025-02-14 00:00:00', 80, 1, 1, 0, '2025-02-01 14:27:05', '2025-02-01 17:07:10');

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
(1, 'Arif', 'Hossain', 'arif@gmail.com', '+1 (228) 631-12', '$2y$10$S2ql91mRQiGdNREkVB524uPgic.tOf2mvc9d6hZvSIaHk57MDEN8q', 0, NULL, 'user', 1, '2025-01-28 06:32:04', '2025-02-01 14:30:36'),
(5, 'Ridoy', 'Paul', 'cse.ridoypaul@gmail.com', '01627382866', '$2y$10$/K7xBIFb3sOHVkl1rgLhMe/XbEPOa6/kFywwAS88PFI7paQvQUMGy', 0, NULL, 'user', 1, '2025-01-28 10:12:03', '2025-01-28 10:12:03'),
(6, 'MD.', 'Rasel', 'mdrasel@gmail.com', '+1 (751) 766-74', '$2y$10$pv66sX64HEYTQqPNUkYmcO.LpqZCQ67FXbnvNtVmiLiwPAivbjPn2', 0, NULL, 'user', 1, '2025-01-28 10:25:08', '2025-02-01 14:31:03'),
(7, 'Mr. ', 'Kamal', 'kamal@gmail.com', '23423423423243', '$2y$10$3vBfQfTDmr5xGjwc2agzgO6/.7tgleZJ6EMp2jUIyuZLqgICZ46ru', 0, NULL, 'user', 1, '2025-01-28 11:20:00', '2025-02-01 14:30:03'),
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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