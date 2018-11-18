-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2018 at 06:55 AM
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `author`, `is_published`, `created_at`) VALUES
(1, 'Post 1', 'This is UPDATED POST', 'Masha1', 1, '2018-11-04 21:00:10'),
(2, 'Post 2', 'This is post two', 'Masha2', 1, '2018-11-04 21:00:10'),
(4, 'post 4', 'This is post 4', 'Kaka1', 1, '2018-11-04 21:30:41'),
(5, 'post 5', 'this is it', 'Kaka1', 1, '2018-11-04 21:31:27'),
(6, 'post 6', 'This is post 5', 'Kevin', 1, '2018-11-05 17:47:35'),
(7, 'post 6', 'This is post 5', 'Kevin', 1, '2018-11-09 19:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(10) NOT NULL,
  `email` varchar(36) NOT NULL,
  `is_confirmed` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(20) NOT NULL,
  `passwd` varchar(256) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `is_confirmed`, `token`, `passwd`, `is_admin`) VALUES
(1, 'mrakhman', 'robinbad1312@gmail.com', 0, '', '344907e89b981caf221d05f597eb57a6af408f15f4dd7895bbd1b96a2938ec24a7dcf23acb94ece0b6d7b0640358bc56bdb448194b9305311aff038a834a079f', 1),
(2, 'masha', '', 0, '', '344907e89b981caf221d05f597eb57a6af408f15f4dd7895bbd1b96a2938ec24a7dcf23acb94ece0b6d7b0640358bc56bdb448194b9305311aff038a834a079f', 0),
(3, '1', '1', 0, '', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 0),
(4, '2', '2', 0, '', '6034bc99bf63372b3bfa27e1759ae8f337e35c113cc004fb1e7987d463ce301032b98c582bc1163f76176af6a6cc75841c370c202a0844d23d47bc13373a459b', 0),
(5, '3', '3', 0, '', '1705466cd026f37e34007db6750bf1fe04867f81a9a6aebe60ebec7a8539b6699d1504adc104ef3d0195ee9a3f012b901ad51cfd56fc28fc64c9d393aed76290', 0),
(6, '105 OR 1=1', '105 OR 1=1', 0, '', '0698340484b1db1db60e75ec18d1edd888a3ec3557c0f5b27939a7b2bef6ade78d2cbb9c91c5ff1537efa3e80165aefe613c82d4a0e1bb1751e4105f545b8c17', 0),
(7, 'q', 'q', 0, '', '05ee70f67fed50f8c5ac896c552b8b6b596a9353e67ae60a74bc112f3c7a5ee6131fd4a164479b263cc8916714d94d8b5026e7856eb5752031ff2c549343e505', 0),
(8, 'p', 'p', 0, '', '4b3aa8bd3049d423cc311f930fa6f31191c3da6a01f699ce8dd808705258415a52ada559cfc1fb97fc17e54681183a793c9ba84c1e2d127c2829b5a0433d29fb', 0),
(9, 'a', 'a', 0, '', '8aca2602792aec6f11a67206531fb7d7f0dff59413145e6973c45001d0087b42d11bc645413aeff63a42391a39145a591a92200d560195e53b478584fdae231a', 0),
(10, 'qq', 'qq', 0, '', '05ee70f67fed50f8c5ac896c552b8b6b596a9353e67ae60a74bc112f3c7a5ee6131fd4a164479b263cc8916714d94d8b5026e7856eb5752031ff2c549343e505', 0),
(11, 'z', 'z@z', 0, '', '714ec62b47c31b0872c20a7896e2065e7ddb5ac9398f1514bb74dabdb513d6855c097a2ac8bf24f495100aba70853aade622bdf0f3a932048109934f0c7c072f', 0),
(12, 'xq', 'x@y', 0, '', '05ee70f67fed50f8c5ac896c552b8b6b596a9353e67ae60a74bc112f3c7a5ee6131fd4a164479b263cc8916714d94d8b5026e7856eb5752031ff2c549343e505', 0);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
