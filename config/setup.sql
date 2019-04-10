--
-- Database dump: `camagru_mrakhman2`
--

DROP DATABASE IF EXISTS camagru_mrakhman2;
CREATE DATABASE camagru_mrakhman2;
USE camagru_mrakhman2;

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

-- INSERT INTO `users` (`id`, `login`, `email`, `is_confirmed`, `token`, `passwd`, `is_admin`, `notifications`) VALUES
-- (1, 'mrakhman', 'robinbad1312@gmail.com', 1, '', '344907e89b981caf221d05f597eb57a6af408f15f4dd7895bbd1b96a2938ec24a7dcf23acb94ece0b6d7b0640358bc56bdb448194b9305311aff038a834a079f', 1, 1),
-- (2, 'masha', '', 0, '', '344907e89b981caf221d05f597eb57a6af408f15f4dd7895bbd1b96a2938ec24a7dcf23acb94ece0b6d7b0640358bc56bdb448194b9305311aff038a834a079f', 0, 1),
-- (3, '1', '1', 1, '', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 0, 1),
-- (4, '2', 'robinbad1312@yandex.ru', 1, '', '6034bc99bf63372b3bfa27e1759ae8f337e35c113cc004fb1e7987d463ce301032b98c582bc1163f76176af6a6cc75841c370c202a0844d23d47bc13373a459b', 0, 1),
-- (5, '3', '3@3', 0, '', '1705466cd026f37e34007db6750bf1fe04867f81a9a6aebe60ebec7a8539b6699d1504adc104ef3d0195ee9a3f012b901ad51cfd56fc28fc64c9d393aed76290', 0, 1),
-- (6, '105 OR 1=1', '105 OR 1=1', 0, '', '0698340484b1db1db60e75ec18d1edd888a3ec3557c0f5b27939a7b2bef6ade78d2cbb9c91c5ff1537efa3e80165aefe613c82d4a0e1bb1751e4105f545b8c17', 0, 1),
-- (7, 'masha', 'q', 0, '', '05ee70f67fed50f8c5ac896c552b8b6b596a9353e67ae60a74bc112f3c7a5ee6131fd4a164479b263cc8916714d94d8b5026e7856eb5752031ff2c549343e505', 0, 1),
-- (8, 'p', 'p', 0, '', '4b3aa8bd3049d423cc311f930fa6f31191c3da6a01f699ce8dd808705258415a52ada559cfc1fb97fc17e54681183a793c9ba84c1e2d127c2829b5a0433d29fb', 0, 1),
-- (9, 'a', 'a', 0, '', '8aca2602792aec6f11a67206531fb7d7f0dff59413145e6973c45001d0087b42d11bc645413aeff63a42391a39145a591a92200d560195e53b478584fdae231a', 0, 1),
-- (10, 'qq', 'qq', 0, '', '05ee70f67fed50f8c5ac896c552b8b6b596a9353e67ae60a74bc112f3c7a5ee6131fd4a164479b263cc8916714d94d8b5026e7856eb5752031ff2c549343e505', 0, 1),
-- (11, 'z', 'z@z', 0, '', '714ec62b47c31b0872c20a7896e2065e7ddb5ac9398f1514bb74dabdb513d6855c097a2ac8bf24f495100aba70853aade622bdf0f3a932048109934f0c7c072f', 0, 1),
-- (12, 'xq', 'x@y', 0, '', '05ee70f67fed50f8c5ac896c552b8b6b596a9353e67ae60a74bc112f3c7a5ee6131fd4a164479b263cc8916714d94d8b5026e7856eb5752031ff2c549343e505', 0, 1),
-- (13, 'a', 'test@test.test', 0, NULL, '344907e89b981caf221d05f597eb57a6af408f15f4dd7895bbd1b96a2938ec24a7dcf23acb94ece0b6d7b0640358bc56bdb448194b9305311aff038a834a079f', 0, 1),
-- (15, 'halo', 'halo@halo', 0, 'AEG31ur5Rb', 'ccd4eee6b382da2d1cf2cd1cb20bf56fe58844a7086008949d63289574503be8f9a9f0ee575542b29da888e9dc1cdf59c90cb5d5e1d6bf000ca024244e2c0163', 0, 1),
-- (18, 'alert<script>alert(2)</script>', 'robinbad1312@ya', 1, 'lVQfzMS5h9', '6034bc99bf63372b3bfa27e1759ae8f337e35c113cc004fb1e7987d463ce301032b98c582bc1163f76176af6a6cc75841c370c202a0844d23d47bc13373a459b', 0, 1),
-- (19, 'rakhman', 'mrakhman@student.42.fr', 1, '0OYAquUSK1', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 0, 1),
-- (20, '22', '22@22', 0, 'Mpfy79kOcB', '041c064d33c466bfe1a63863b29e725b155393ef2a95ac33c062b7bd8bf3ad23a9c2229af27eb06fce7b18c003b6d99a55629ff8256042483d569020e9c5b6f8', 0, 1),
-- (21, 'xx', 'x@x', 0, 'c4mp9jMUIz', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 0, 1),
-- (22, '111', '1@11', 0, 'JAYkENChfV', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 0, 1),
-- (23, 's', 's@s', 0, 'a3elBkmYDx', 'eb69f836dedc8b0f7d4ffc2dbb5785962067eac2b9e0f62004c0afd0355ea56398597ba31b4abb12f47c2a511995067b2581b28b1b311f28aa770f6390aaba99', 0, 1),
-- (24, 'aa', 'a@a', 0, 'h3XCvRZWoD', '8aca2602792aec6f11a67206531fb7d7f0dff59413145e6973c45001d0087b42d11bc645413aeff63a42391a39145a591a92200d560195e53b478584fdae231a', 0, 1),
-- (25, '123@123  ', '123@123', 1, 'PpaWUe0vd7', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 0, 1),
-- (26, '!<SCRIPT>alert(2)</SCRIPT>', '1@111', 1, 'M3QY90vTkt', '8513c69d070a008df008aef8624ed24afc81b170d242faf5fafe853d4fe9bf8aa7badfb0fd045d7b350b19fbf8ef6b2a51f17a07a1f6819abc9ba5ce43324244', 0, 1),
-- (27, 'nn', 'nn@nn', 1, 'RiKM91u3nQ', 'b730b2bf06c42c6f16f75ac198848ea1b5632ce536544a826960374bfaecd60f7d3f85f56c8c55ad49e507134fae44acf487b31bc4903d6b33d1f8bd20331027', 0, 1),
-- (29, 'robinba@gmail.com', 'robinba@gmail.com', 0, 'CN1mz6ZDGj', 'd2955069daeda010c9dbd10b235eece6a15b37fdf39e79b72e60864d8d6428d7d3162272328dd83996721f8d0238d510b587b98536991152c6db387f665458d5', 0, 1),
-- (30, 'r@', 'rr@rr', 0, 'kmVwNnPOh1', '0368768163a91979bb6fd48cc6fca4199a08638759759691705fbb5e987cb30d73b5ed03fe2aab67356d83c77a39334cfa3704655ff4bb5e092c397244cd1428', 0, 1),
-- (31, 'ivart', 'test@ivart.xyz', 0, 'HEfoue0WPi', 'd4b217c3b8dcdd2722bf84e3a2cad149c426141e97dfe8c41f1b7192d7de6fd6bdf40bffd4fb6f42324bb828c913cbe7c17d8ecdb2be468fd93bf75f44f78196', 0, 1),
-- (32, 'ivart2', 'ai@timeclub24.ru', 1, 'aMn81ETLP9', 'd4b217c3b8dcdd2722bf84e3a2cad149c426141e97dfe8c41f1b7192d7de6fd6bdf40bffd4fb6f42324bb828c913cbe7c17d8ecdb2be468fd93bf75f44f78196', 0, 1),
-- (35, 'mrakhman@student.42.fr', 'mrakhman@student.42.fr', 1, 'MUypV7C9um', 'bcfc1409a12b97085a0a7c7b9f4d3ba84e83b9c24ca18568d44317ed10f229d31cbfddd2b64a83e979bac82bc72cb6f3124651d869fb07ccd047d5c2d4c8758b', 0, 1);
--

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

-- INSERT INTO `passreset` (`id`, `user_id`, `token`, `expires`) VALUES
-- (27, 21, 'e3yi8DHKSqjfnG5R9XAmE627zCt1r4bM', 1544376894);

-- --------------------------------------------------------

--
-- Table structure for table `change_email`
--

CREATE TABLE `change_email` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `new_email` varchar(36) NOT NULL,
  `token` varchar(10) DEFAULT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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

-- INSERT INTO `posts` (`id`, `user_id`, `file_name`, `description`, `created_at`, `likes`) VALUES
-- (26, 3, '03_5c8a9dc4d62df5.28838918.png', '', '2019-03-14 19:30:29', 1),
-- (27, 3, '03_5c8a9ef1956393.29323121.png', '2222', '2019-03-14 19:35:29', 1),
-- (29, 3, '03_5c9677c666d9e2.93646336.png', '', '2019-03-23 19:15:34', 1),
-- (30, 3, '03_5c9677df7895e7.76169767.png', 'kokoko', '2019-03-23 19:15:59', 2),
-- (32, 27, '027_5c96841313d754.70197964.png', 'vv', '2019-03-23 20:08:03', 0),
-- (34, 27, '027_5c96870f422673.53589212.png', '', '2019-03-23 20:20:47', 0),
-- (36, 27, '027_5c968765010036.00678829.png', '', '2019-03-23 20:22:13', 0),
-- (38, 27, '027_5c97ae8f631ca3.78891577.png', '', '2019-03-24 17:21:35', 0),
-- (39, 4, '04_5c9ce2ec708521.54439215.png', 'yep', '2019-03-28 16:06:20', 1),
-- (40, 4, '04_5c9ce316832585.67854179.png', '', '2019-03-28 16:07:02', 3),
-- (41, 4, '04_5ca25bcda33756.38091061.png', 'lazy', '2019-04-01 20:43:25', 0),
-- (42, 4, '04_5ca37c70493a82.00480342.png', '', '2019-04-02 17:14:56', 0),
-- (43, 4, '04_5ca381e4aafcc5.90901345.png', '', '2019-04-02 17:38:12', 0),
-- (44, 4, '04_5ca38215ecd317.81046789.png', '', '2019-04-02 17:39:02', 0),
-- (45, 4, '04_5ca383d6966d69.01791987.png', '', '2019-04-02 17:46:30', 0),
-- (46, 4, '04_5ca632d45c3148.87737671.png', '', '2019-04-04 18:37:40', 0),
-- (47, 4, '04_5ca77ff0607c53.36685715.png', '', '2019-04-05 18:18:56', 0),
-- (48, 4, '04_5ca8aba821ff89.92237105.png', '', '2019-04-06 15:37:44', 1),
-- (52, 4, '04_5caa0fa529e417.27652854.png', 'ww', '2019-04-07 16:56:37', 1),
-- (53, 3, '03_5caa3dafbe1439.06732848.png', 'Ho ho ho', '2019-04-07 20:13:03', 1),
-- (54, 3, '03_5caa3e15848eb1.17749548.png', 'Hohohi', '2019-04-07 20:14:45', 1),
-- (55, 3, '03_5caa3e92491bb4.00190241.png', 'Mobile upload', '2019-04-07 20:16:50', 1),
-- (56, 19, '019_5caa4127ad3e15.74303393.png', '', '2019-04-07 20:27:51', 1),
-- (57, 3, '03_5caa423724cca0.87486322.png', 'Looks fine', '2019-04-07 20:32:23', 0);

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

-- INSERT INTO `comments` (`id`, `post_id`, `commentator_id`, `text`, `time`) VALUES
-- (1, 38, 4, 'hello\n', '2019-03-28 16:04:49'),
-- (2, 40, 3, 'kokoko', '2019-03-28 16:07:34'),
-- (3, 38, 3, 'hello you', '2019-03-28 16:08:02'),
-- (4, 40, 19, 'well', '2019-03-28 16:18:40'),
-- (5, 38, 27, 'Thank you hello', '2019-03-28 16:31:25'),
-- (6, 40, 27, 'Notification?', '2019-03-28 17:02:35'),
-- (7, 40, 27, 'Receive notification mode on', '2019-04-01 20:11:03'),
-- (8, 40, 27, 'Receive notification off', '2019-04-01 20:13:28'),
-- (9, 40, 27, 'Receive notification off #2', '2019-04-01 20:17:55'),
-- (10, 40, 27, 'Receive notification off #3', '2019-04-01 20:28:05'),
-- (11, 40, 27, 'Receive notification on #2', '2019-04-01 20:29:12'),
-- (12, 40, 27, '11', '2019-04-01 20:29:57'),
-- (13, 38, 4, 'helllooo\n', '2019-04-01 20:31:20'),
-- (14, 38, 4, 'unknown email', '2019-04-01 20:32:02'),
-- (15, 32, 3, 'Hello, world! ', '2019-04-07 19:18:24'),
-- (16, 32, 3, 'Bbb', '2019-04-07 19:18:35'),
-- (17, 32, 3, 'hello', '2019-04-07 19:19:42'),
-- (18, 32, 3, 'rrr', '2019-04-07 19:19:45'),
-- (19, 32, 3, 'rr', '2019-04-07 19:19:58'),
-- (20, 30, 3, 'hello', '2019-04-07 20:00:02'),
-- (21, 30, 3, 'hello you', '2019-04-07 20:00:13'),
-- (22, 30, 3, 'Yy', '2019-04-07 20:02:39'),
-- (23, 55, 27, 'I love it!!!', '2019-04-07 20:17:52'),
-- (24, 55, 27, 'hey', '2019-04-07 20:17:58'),
-- (25, 55, 27, 'kk', '2019-04-07 20:18:08'),
-- (27, 53, 27, 'hello carrot', '2019-04-07 20:23:26'),
-- (28, 54, 27, 'wow wow', '2019-04-07 20:24:05'),
-- (29, 54, 27, 'wow wow wow', '2019-04-07 20:24:10'),
-- (30, 54, 27, 'wow uu', '2019-04-07 20:24:20'),
-- (31, 48, 27, 'mmm', '2019-04-07 20:26:12'),
-- (32, 56, 27, 'hello you, check your email', '2019-04-07 20:28:11'),
-- (33, 56, 19, 'oooo, I received a new comment notification', '2019-04-07 20:29:02'),
-- (34, 55, 27, 'Concooooorde', '2019-04-07 20:30:44'),
-- (35, 55, 3, 'Yup Yup', '2019-04-07 20:31:16'),
-- (36, 56, 3, 'popopopo', '2019-04-07 20:45:52'),
-- (37, 54, 3, 'glow', '2019-04-07 20:48:28'),
-- (38, 55, 32, 'qq', '2019-04-07 21:02:46');

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

-- INSERT INTO `likes` (`post_id`, `liker_id`) VALUES
-- (40, 3),
-- (40, 19),
-- (26, 27),
-- (27, 27),
-- (29, 27),
-- (30, 27),
-- (39, 27),
-- (40, 27),
-- (53, 27),
-- (54, 27),
-- (55, 27),
-- (56, 27);

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




--
-- Indexes for dumped tables
--


--
-- Indexes for table `change_email`
--
ALTER TABLE `change_email`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);


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
-- AUTO_INCREMENT for table `change_email`
--
ALTER TABLE `change_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;



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
