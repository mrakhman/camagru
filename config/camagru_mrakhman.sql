-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2019 at 08:40 AM
-- Server version: 5.7.23
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camagru_mrakhman`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `commentator_id` int(11) NOT NULL,
  `text` varchar(256) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `commentator_id`, `text`, `time`) VALUES
(1, 38, 4, 'hello\n', '2019-03-28 16:04:49'),
(2, 40, 3, 'kokoko', '2019-03-28 16:07:34'),
(3, 38, 3, 'hello you', '2019-03-28 16:08:02'),
(4, 40, 19, 'well', '2019-03-28 16:18:40'),
(5, 38, 27, 'Thank you hello', '2019-03-28 16:31:25'),
(6, 40, 27, 'Notification?', '2019-03-28 17:02:35'),
(7, 40, 27, 'Receive notification mode on', '2019-04-01 20:11:03'),
(8, 40, 27, 'Receive notification off', '2019-04-01 20:13:28'),
(9, 40, 27, 'Receive notification off #2', '2019-04-01 20:17:55'),
(10, 40, 27, 'Receive notification off #3', '2019-04-01 20:28:05'),
(11, 40, 27, 'Receive notification on #2', '2019-04-01 20:29:12'),
(12, 40, 27, '11', '2019-04-01 20:29:57'),
(13, 38, 4, 'helllooo\n', '2019-04-01 20:31:20'),
(14, 38, 4, 'unknown email', '2019-04-01 20:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `post_id` int(11) NOT NULL,
  `liker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`post_id`, `liker_id`) VALUES
(40, 3),
(40, 19),
(26, 27),
(27, 27),
(29, 27),
(30, 27),
(39, 27),
(40, 27);

--
-- Triggers `likes`
--
DELIMITER $$
CREATE TRIGGER `add_like` AFTER INSERT ON `likes` FOR EACH ROW UPDATE posts SET posts.likes = posts.likes + 1 WHERE posts.id = NEW.post_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `remove_like` AFTER DELETE ON `likes` FOR EACH ROW UPDATE posts SET posts.likes = posts.likes - 1 WHERE posts.id = OLD.post_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `passreset`
--

CREATE TABLE `passreset` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` longtext NOT NULL,
  `expires` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `passreset`
--

INSERT INTO `passreset` (`id`, `user_id`, `token`, `expires`) VALUES
(27, 21, 'e3yi8DHKSqjfnG5R9XAmE627zCt1r4bM', 1544376894);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `file_name`, `description`, `created_at`, `likes`) VALUES
(26, 3, '03_5c8a9dc4d62df5.28838918.png', '', '2019-03-14 19:30:29', 1),
(27, 3, '03_5c8a9ef1956393.29323121.png', '2222', '2019-03-14 19:35:29', 1),
(29, 3, '03_5c9677c666d9e2.93646336.png', '', '2019-03-23 19:15:34', 1),
(30, 3, '03_5c9677df7895e7.76169767.png', 'kokoko', '2019-03-23 19:15:59', 2),
(32, 27, '027_5c96841313d754.70197964.png', 'vv', '2019-03-23 20:08:03', 0),
(34, 27, '027_5c96870f422673.53589212.png', '', '2019-03-23 20:20:47', 0),
(36, 27, '027_5c968765010036.00678829.png', '', '2019-03-23 20:22:13', 0),
(38, 27, '027_5c97ae8f631ca3.78891577.png', '', '2019-03-24 17:21:35', 0),
(39, 4, '04_5c9ce2ec708521.54439215.png', 'yep', '2019-03-28 16:06:20', 1),
(40, 4, '04_5c9ce316832585.67854179.png', '', '2019-03-28 16:07:02', 3),
(41, 4, '04_5ca25bcda33756.38091061.png', 'lazy', '2019-04-01 20:43:25', 0),
(42, 4, '04_5ca37c70493a82.00480342.png', '', '2019-04-02 17:14:56', 0),
(43, 4, '04_5ca381e4aafcc5.90901345.png', '', '2019-04-02 17:38:12', 0),
(44, 4, '04_5ca38215ecd317.81046789.png', '', '2019-04-02 17:39:02', 0),
(45, 4, '04_5ca383d6966d69.01791987.png', '', '2019-04-02 17:46:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `email` varchar(36) NOT NULL,
  `is_confirmed` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(10) DEFAULT NULL,
  `passwd` varchar(256) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `notifications` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `is_confirmed`, `token`, `passwd`, `is_admin`, `notifications`) VALUES
(1, 'mrakhman', 'robinbad1312@gmail.com', 1, '', '344907e89b981caf221d05f597eb57a6af408f15f4dd7895bbd1b96a2938ec24a7dcf23acb94ece0b6d7b0640358bc56bdb448194b9305311aff038a834a079f', 1, 1),
(2, 'masha', '', 0, '', '344907e89b981caf221d05f597eb57a6af408f15f4dd7895bbd1b96a2938ec24a7dcf23acb94ece0b6d7b0640358bc56bdb448194b9305311aff038a834a079f', 0, 1),
(3, '1', '1', 1, '', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 0, 1),
(4, '2', 'robinbad1312@yandex.ru', 1, '', '6034bc99bf63372b3bfa27e1759ae8f337e35c113cc004fb1e7987d463ce301032b98c582bc1163f76176af6a6cc75841c370c202a0844d23d47bc13373a459b', 0, 1),
(5, '3', '3@3', 0, '', '1705466cd026f37e34007db6750bf1fe04867f81a9a6aebe60ebec7a8539b6699d1504adc104ef3d0195ee9a3f012b901ad51cfd56fc28fc64c9d393aed76290', 0, 1),
(6, '105 OR 1=1', '105 OR 1=1', 0, '', '0698340484b1db1db60e75ec18d1edd888a3ec3557c0f5b27939a7b2bef6ade78d2cbb9c91c5ff1537efa3e80165aefe613c82d4a0e1bb1751e4105f545b8c17', 0, 1),
(7, 'masha', 'q', 0, '', '05ee70f67fed50f8c5ac896c552b8b6b596a9353e67ae60a74bc112f3c7a5ee6131fd4a164479b263cc8916714d94d8b5026e7856eb5752031ff2c549343e505', 0, 1),
(8, 'p', 'p', 0, '', '4b3aa8bd3049d423cc311f930fa6f31191c3da6a01f699ce8dd808705258415a52ada559cfc1fb97fc17e54681183a793c9ba84c1e2d127c2829b5a0433d29fb', 0, 1),
(9, 'a', 'a', 0, '', '8aca2602792aec6f11a67206531fb7d7f0dff59413145e6973c45001d0087b42d11bc645413aeff63a42391a39145a591a92200d560195e53b478584fdae231a', 0, 1),
(10, 'qq', 'qq', 0, '', '05ee70f67fed50f8c5ac896c552b8b6b596a9353e67ae60a74bc112f3c7a5ee6131fd4a164479b263cc8916714d94d8b5026e7856eb5752031ff2c549343e505', 0, 1),
(11, 'z', 'z@z', 0, '', '714ec62b47c31b0872c20a7896e2065e7ddb5ac9398f1514bb74dabdb513d6855c097a2ac8bf24f495100aba70853aade622bdf0f3a932048109934f0c7c072f', 0, 1),
(12, 'xq', 'x@y', 0, '', '05ee70f67fed50f8c5ac896c552b8b6b596a9353e67ae60a74bc112f3c7a5ee6131fd4a164479b263cc8916714d94d8b5026e7856eb5752031ff2c549343e505', 0, 1),
(13, 'a', 'test@test.test', 0, NULL, '344907e89b981caf221d05f597eb57a6af408f15f4dd7895bbd1b96a2938ec24a7dcf23acb94ece0b6d7b0640358bc56bdb448194b9305311aff038a834a079f', 0, 1),
(15, 'halo', 'halo@halo', 0, 'AEG31ur5Rb', 'ccd4eee6b382da2d1cf2cd1cb20bf56fe58844a7086008949d63289574503be8f9a9f0ee575542b29da888e9dc1cdf59c90cb5d5e1d6bf000ca024244e2c0163', 0, 1),
(18, 'alert<script>alert(2)</script>', 'robinbad1312@ya', 1, 'lVQfzMS5h9', '6034bc99bf63372b3bfa27e1759ae8f337e35c113cc004fb1e7987d463ce301032b98c582bc1163f76176af6a6cc75841c370c202a0844d23d47bc13373a459b', 0, 1),
(19, 'rakhman', 'mrakhman@student.42.fr', 1, '0OYAquUSK1', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 0, 1),
(20, '22', '22@22', 0, 'Mpfy79kOcB', '041c064d33c466bfe1a63863b29e725b155393ef2a95ac33c062b7bd8bf3ad23a9c2229af27eb06fce7b18c003b6d99a55629ff8256042483d569020e9c5b6f8', 0, 1),
(21, 'xx', 'x@x', 0, 'c4mp9jMUIz', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 0, 1),
(22, '111', '1@11', 0, 'JAYkENChfV', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 0, 1),
(23, 's', 's@s', 0, 'a3elBkmYDx', 'eb69f836dedc8b0f7d4ffc2dbb5785962067eac2b9e0f62004c0afd0355ea56398597ba31b4abb12f47c2a511995067b2581b28b1b311f28aa770f6390aaba99', 0, 1),
(24, 'aa', 'a@a', 0, 'h3XCvRZWoD', '8aca2602792aec6f11a67206531fb7d7f0dff59413145e6973c45001d0087b42d11bc645413aeff63a42391a39145a591a92200d560195e53b478584fdae231a', 0, 1),
(25, '123@123  ', '123@123', 1, 'PpaWUe0vd7', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 0, 1),
(26, '!<SCRIPT>alert(2)</SCRIPT>', '1@111', 1, 'M3QY90vTkt', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 0, 1),
(27, 'nn', 'nn@nn', 1, 'RiKM91u3nQ', 'b730b2bf06c42c6f16f75ac198848ea1b5632ce536544a826960374bfaecd60f7d3f85f56c8c55ad49e507134fae44acf487b31bc4903d6b33d1f8bd20331027', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Comments_Posts` (`post_id`),
  ADD KEY `FK_Comments_Users` (`commentator_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`post_id`,`liker_id`),
  ADD KEY `FK_Likes_Users` (`liker_id`);

--
-- Indexes for table `passreset`
--
ALTER TABLE `passreset`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `passreset`
--
ALTER TABLE `passreset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_Comments_Posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Comments_Users` FOREIGN KEY (`commentator_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `FK_Likes_Posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Likes_Users` FOREIGN KEY (`liker_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
