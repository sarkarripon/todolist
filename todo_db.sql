-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 12:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE `fileupload` (
  `id` int(10) NOT NULL,
  `files` varchar(100) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `ext` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`id`, `files`, `name`, `email`, `ext`) VALUES
(1, 'http://localhost/sarkar/php/Exercise/todolist/uploads/y-nasa_150455-16829.jpg', '', '', ''),
(2, 'http://localhost/sarkar/php/Exercise/todolist/uploads/tree-736885__480.jpg', '', '', ''),
(3, 'http://localhost/sarkar/php/Exercise/todolist/uploads/nature-image-for-website.jpg', '', '', ''),
(4, 'http://localhost/sarkar/php/Exercise/todolist/uploads/y-nasa_150455-16829.jpg', 'Maggie Hines', 'nadimcse.official@gm', ''),
(5, 'http://localhost/sarkar/php/Exercise/todolist/uploads/y-nasa_150455-16829.jpg', '', '', ''),
(6, 'http://localhost/sarkar/php/Exercise/todolist/uploads/tree-736885__480.jpg', '', '', ''),
(7, 'http://localhost/sarkar/php/Exercise/todolist/uploads/tree-736885__480.jpg', '', '', ''),
(8, 'http://localhost/sarkar/php/Exercise/todolist/uploads/y-nasa_150455-16829.jpg', '', '', 'jpg'),
(9, 'http://localhost/sarkar/php/Exercise/todolist/uploads/tree-736885__480.jpg', 'Austin Pittman', 'mecelic@mailinator.c', 'jpg'),
(10, 'http://localhost/sarkar/php/Exercise/todolist/uploads/tree-736885__480.jpg', 'Maggie Hines   ', 'jeqoxug@mailinator.c', 'jpg'),
(11, 'http://localhost/sarkar/php/Exercise/todolist/uploads/-wildlife.png', 'Maggie Hines', 'jeqoxug@mailinator.c', 'png');

-- --------------------------------------------------------

--
-- Table structure for table `todo_tasks`
--

CREATE TABLE `todo_tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` enum('active','inactive','finished') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todo_tasks`
--

INSERT INTO `todo_tasks` (`id`, `title`, `description`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(26, 'hello', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanie', 1, 'inactive', '2022-11-29 09:06:09', '2022-11-29 09:06:09'),
(27, 'Task 2', 'Task 2 description', 1, 'active', '2022-11-29 09:06:37', '2022-11-29 09:06:37'),
(28, 'Task 3', 'Task 3 description', 1, 'active', '2022-11-29 09:06:57', '2022-11-29 09:06:57'),
(29, 'Task 4', 'Task 4 description', 1, 'active', '2022-11-29 09:07:19', '2022-11-29 09:07:19'),
(30, 'Task 5', 'Task 5 description', 1, 'active', '2022-11-29 09:07:34', '2022-11-29 09:07:34'),
(31, 'Task 1', 'Task 1 description', 30, 'active', '2022-11-29 09:13:26', '2022-11-29 09:13:26'),
(32, 'Task 2', 'Task 2 description', 30, 'active', '2022-11-29 09:13:34', '2022-11-29 09:14:05'),
(33, 'Task 3', 'Task 3 descriptionfvdff', 30, 'active', '2022-11-29 09:13:57', '2022-11-29 09:13:57'),
(34, 'Task 4', 'Task 4 description', 30, 'active', '2022-11-29 09:14:28', '2022-11-29 09:14:28'),
(35, 'Task 5', 'Task 5 description', 30, 'active', '2022-11-29 09:14:42', '2022-11-29 09:14:42'),
(36, 'Task 1', 'Task 1 description', 29, 'active', '2022-11-29 09:15:20', '2022-11-29 09:15:20'),
(37, 'Task 2', 'Task 2 description', 29, 'active', '2022-11-29 09:15:29', '2022-11-29 09:15:29'),
(38, 'Task 1', 'Task 2 description', 27, 'active', '2022-11-29 09:15:45', '2022-11-29 09:15:45'),
(39, 'Task 2', 'Task 2 description', 27, 'active', '2022-11-29 09:15:55', '2022-11-29 09:15:55'),
(40, 'Task 1', 'Task 1 description', 28, 'inactive', '2022-11-29 09:16:10', '2022-11-29 09:16:10'),
(42, 'Aut corrupti volupt', 'Aliquid sunt eius no', 28, 'active', '2022-11-30 15:32:19', '2022-11-30 15:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `todo_users`
--

CREATE TABLE `todo_users` (
  `id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `member_since` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` enum('member','admin') NOT NULL DEFAULT 'member',
  `propic` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todo_users`
--

INSERT INTO `todo_users` (`id`, `first_name`, `last_name`, `email`, `password`, `dob`, `mobile`, `address`, `member_since`, `role`, `propic`) VALUES
(1, 'Sarkar', 'Ripon', 'mail@mail.com', '7c222fb2927d828af22f592134e8932480637c0d', '2022-12-01', '+1 (547) 72', 'sylhet', '2022-12-01 11:38:18', 'admin', 'http://localhost/sarkar/php/Exercise/todolist/uploads/SarkarrrRipon_1.jpg'),
(27, 'Nadim', 'Bhai', 'hello@nadim.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '2022-12-01', '+1 (547) 72', 'sylhet', '2022-12-01 08:59:19', 'member', 'http://localhost/sarkar/php/Exercise/todolist/uploads/NadimBhai_27.jpg'),
(28, 'Tahm', 'Bhai', 'hello@tahmid.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '2016-08-18', '71', 'Ullam quia voluptate', '2022-12-01 06:29:54', 'member', 'http://localhost/sarkar/php/Exercise/todolist/uploads/TahmBhai_28.jpg'),
(29, 'Mahdi', 'Bhai', 'hello@mahdi.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '2022-11-25', '01912309950', 'sylhet', '2022-12-01 06:29:57', 'member', 'http://localhost/sarkar/php/Exercise/todolist/uploads/vdf.jpg'),
(30, 'Hadi', 'Bhai', 'hello@hadi.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '2022-11-27', '01912309950', 'sylhet', '2022-12-01 06:30:02', 'member', 'http://localhost/sarkar/php/Exercise/todolist/uploads/HadiBhai_30.jpg'),
(33, 'Dana', 'Short', 'kygabagih@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '0000-00-00', '', '', '2022-12-01 06:30:07', 'member', ''),
(34, 'Kadefgbfgfbf', 'Hood', 'codefebik@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '2022-12-02', '+1 (547) 72', 'Enim aliquam beatae ', '2022-12-01 11:38:05', 'member', 'http://localhost/sarkar/php/Exercise/todolist/uploads/KadedfgdgdfHood_34.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fileupload`
--
ALTER TABLE `fileupload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo_tasks`
--
ALTER TABLE `todo_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo_users`
--
ALTER TABLE `todo_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `todo_tasks`
--
ALTER TABLE `todo_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `todo_users`
--
ALTER TABLE `todo_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
