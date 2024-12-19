-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 07:57 AM
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
-- Database: `pet_adoption`
--

-- --------------------------------------------------------

--
-- Table structure for table `pets_profiles`
--

CREATE TABLE `pets_profiles` (
  `id` int(11) NOT NULL,
  `pet_type` varchar(50) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets_profiles`
--

INSERT INTO `pets_profiles` (`id`, `pet_type`, `breed`, `gender`, `age`, `image_path`, `upload_date`) VALUES
(1, 'Dog', 'German Shepherd', 'Male', 3, 'pets_image/dog1.png', '2024-12-18 07:05:05'),
(2, 'Dog', 'Golden Retriever', 'Male', 3, 'pets_image/dog2.png', '2024-12-18 07:05:05'),
(3, 'Dog', 'Poodle', 'Female', 4, 'pets_image/dog3.png', '2024-12-18 07:05:05'),
(4, 'Dog', 'Poodle', 'Male', 2, 'pets_image/dog4.png', '2024-12-18 07:05:05'),
(5, 'Dog', 'Labrador Retriever', 'Male', 4, 'pets_image/dog5.png', '2024-12-18 07:05:05'),
(6, 'Dog', 'Cockey Spaniel', 'Male', 3, 'pets_image/dog6.png', '2024-12-18 07:05:05'),
(7, 'Dog', 'Pug', 'Female', 3, 'pets_image/dog7.png', '2024-12-18 07:05:05'),
(8, 'Dog', 'Cockey Spaniel', 'Female', 4, 'pets_image/dog8.png', '2024-12-18 07:05:05'),
(9, 'Cat', 'Cat', 'Female', 2, 'pets_image/cat1.png', '2024-12-18 07:34:02'),
(10, 'Duck', 'Duck', 'Male', 2, 'pets_image/duck1.png', '2024-12-18 07:34:02'),
(11, 'Hen', 'Hen', 'Female', 2, 'pets_image/hen1.png', '2024-12-18 07:34:02'),
(12, 'Goat', 'Goat', 'Male', 4, 'pets_image/goat1.png', '2024-12-18 07:34:02'),
(16, 'Dog', 'Golden Retriever', 'Female', 4, 'pets_image/dog2.png', '2024-12-18 07:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `name`, `email`, `phone`, `message`, `created_at`) VALUES
(1, 'surendar', 'sivasurendar118@gmail.com', '9677369292', 'I want to buy a dog.', '2024-12-17 14:32:00'),
(2, 'surendar', 'sivasurendar118@gmail.com', '9677369292', 'want to buy a cat.', '2024-12-17 14:41:42'),
(3, 'surendar', 'sivasurendar118@gmail.com', '9677369292', 'want to adopt the dog', '2024-12-18 10:22:22'),
(4, 'surendar', 'surendar02122003@gmail.com', '9677369292', 'hsgdgejdge', '2024-12-18 10:41:45'),
(5, 'siva', 'sivaskdb@gmail.com', '8645647547', 'want to adopt.', '2024-12-19 06:34:36'),
(6, 'siva', 'sivaskdb@gmail.com', '8645647547', 'want to adopt.', '2024-12-19 06:36:50'),
(7, 'siva', 'sivaskdb@gmail.com', '8645647547', 'want to adopt.', '2024-12-19 06:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(4, 'surendar', 'sivasurendar118@gmail.com', '12345678', '2024-12-15 15:36:13'),
(5, 'wwew', 'dd@gmail.com', '12345678', '2024-12-15 15:37:50'),
(7, 'sssd', 'ddddf@gmail.com', 'qwertyui', '2024-12-15 15:41:41'),
(11, 'surendar', 'sivasurendr118@gmail.com', 'd', '2024-12-15 15:56:50'),
(12, 'surenda', 'sivasrendr118@gmail.com', '', '2024-12-15 15:57:35'),
(13, 'ss', 'dddsas@gmail.com', 'we', '2024-12-15 15:59:21'),
(14, '', '', '', '2024-12-15 16:03:30'),
(15, 'd', 'd', 'ss', '2024-12-16 06:03:55'),
(17, 'ds', 's', 'ss', '2024-12-16 07:04:40'),
(19, 'd', 'h@gmail.com', '1', '2024-12-16 07:07:47'),
(21, 'fffg', 'hsdg@gmail.com', '$2y$10$cxvewobITaby3NhK437QlOU.VSeH96fWvzfKfrQcW8qoKTIzxmHGC', '2024-12-16 12:25:12'),
(23, 'fffgj', 'gh@gmail.com', '$2y$10$CHKpI.DE5iFCtT8uT4y8LupYGfrEpHLD9jLybqngXfopbEYtYJCde', '2024-12-16 12:28:25'),
(24, 'siva', 'siva@gmail.com', '$2y$10$2bHZgRFkuBpzXMJc4B0x3u.j6Q9N.RLve/uLCAKUyyR2R55f04ue.', '2024-12-16 14:56:35'),
(25, 'hdg', 'd@gmail.com', '$2y$10$N3nfl61TspEKyZO0XwqKn.LPL1MWXTeVMO.AWWm5Q8NIytQO2Ssh2', '2024-12-16 14:58:44'),
(26, 'surendar', 'surendar02122003@gmail.com', '$2y$10$cDPx8i3tKNs0gBYGIk4dGeITnh8bLl0G6CGcgZLWVTjNyXW7URwOq', '2024-12-17 07:25:20'),
(27, 'siva', 'siva23@gmail.com', '$2y$10$VliQKahU2nanp5NInAE53.BN9pSFH50PX/FkMFmoz.GnQeA.4fjLy', '2024-12-17 08:13:51'),
(28, 'surendar', 'sjdgdg@gmail.com', '$2y$10$7hTmcQlA.HI9ts5sqYCcpeWePclBwILeWtsN.0jWGMsj1zINaS7dm', '2024-12-17 16:26:13'),
(29, 'surendar', 'vsp4536@gmail.com', '$2y$10$bLsN0HyaogXvVkiCmWZ/4eieA8cN.oIs6Mh9.sodXfkBmzJtuEiGi', '2024-12-18 10:18:16'),
(30, 'surendar', 'gsdsg@gmail.com', '$2y$10$GFsO/v0CaBId86vcWcJ0r.K1MhlhHVx1.bY3ikA.HDX4LQjpJ9IKC', '2024-12-18 10:26:32'),
(31, 'surendar', 'surendar720720@gmail.com', '$2y$10$iQZrIoK/GuFUGt.buIi4au5bj5L1TjTyeTGXoGSu3wcLSa1Bm.2lO', '2024-12-19 06:08:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pets_profiles`
--
ALTER TABLE `pets_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `pets_profiles`
--
ALTER TABLE `pets_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
