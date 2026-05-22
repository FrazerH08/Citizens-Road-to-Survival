-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2026 at 07:52 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cl27-frazerh`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `picture` blob NOT NULL,
  `content` text NOT NULL,
  `username` text NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `picture`, `content`, `username`, `time_created`, `comments`) VALUES
(33, 'How FM26 Was So Great before the Climate collapse', 'An Article on why Football Manager was so good ', 0x75706c6f6164732f464d32362e77656270, 'Football Manager continued to stay busy despite everything going on, and there were plenty of discussions across the community about updates, gameplay changes, and what fans wanted to see next. Recent patches mainly focused on improving match realism.\r\n\r\nOne of the biggest talking points was the match engine, with many players enjoying it because it felt fresh and new, offering something different compared to previous editions. While it was not perfect, most fans agreed that the game felt more realistic.\r\n\r\nOne negative was that fans were angry about the overall UI and missed the old FM24 style. It was like marmite &mdash; people either loved it or hated it.\r\n\r\nThe FM community remained as active as ever. From custom databases and face packs to tactical guides on YouTube, players continued finding new ways to keep the game fresh.\r\n\r\nOverall, Football Manager was in a solid place. While there were still improvements to be made, the ongoing updates and strong community support showed why the series continued to be one of the most popular football simulation games out there.\r\n', '', '2026-05-21 23:18:55', ''),
(38, 'Residents Asked to Report to Community Shelters Tomorrow at 4PM', 'town-wide safety advisory where residents are instructed to report to designated shelters at 4PM tomorrow. ', 0x75706c6f6164732f666c6f6f6465642d757262616e2d7363656e652d73746f636b63616b652e77656270, 'City officials have issued an emergency advisory requesting all residents to report to their nearest community shelter at 4PM tomorrow afternoon. According to the announcement, the precautionary measure has been introduced following reports of an incoming flood.\r\n\r\nEmergency response teams in the  town of Westbridge stated that the shelters will remain open throughout the evening and are fully equipped with food, water, medical supplies, and sleeping areas. Residents are advised to bring essential belongings including identification, medication, mobile phone chargers, blankets, and bottled water.\r\n\r\nLocal authorities emphasized that this is a precautionary measure designed to ensure the safety of the population while experts investigate the developing situation. Public transport services in the fictional scenario will operate free of charge between 12PM and 6PM to assist residents travelling to shelters. \r\n\r\nGood luck Citizens', 'FrazerGTFC', '2026-05-21 23:26:02', ''),
(39, 'Dystopian Dreams', 'This is a dystopian dream , Fut champs was crashing due to an incredible flood coming over the sea. Waves went everywhere it was a sorry sight to see.  Harry said no I was about to go 15-0. ', 0x75706c6f6164732f53637265656e73686f7420323032362d30352d3230203139353634332e706e67, '\r\nBut the servers sank beneath the tide,\r\nAs salty currents dragged away his pride.\r\nControllers floating, menus turning blue,\r\nCommentators screaming, &ldquo;What are we gonna do?&rdquo;\r\n\r\nThe weekend league was chaos, dreams in pieces,\r\nDefenders swimming past abandoned referees and creases.\r\nYet Harry stood determined in the pouring rain,\r\nClutching his headset through the hurricane.\r\n\r\nHe cried, &ldquo;EA, please! Just one more go!\r\nI swear this match was mine &mdash; I was 14-0!&rdquo;\r\nBut lightning struck the router with a mighty glow,\r\nAnd washed away his final chance to hit 15-0.\r\n', 'FrazerGTFC', '2026-05-21 23:25:11', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `date_written` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `firstname`, `lastname`, `username`, `email`, `subject`, `date_written`) VALUES
(1, 'Euan', 'Parry', 'Euan123', '123@gmail.com', 'I hate this website', '2025-05-08 09:21:31'),
(2, 'euan', 'parry', 'Enrol123', 'euan@gmail.com', 'I don&#039;t like the about club page as it is empty!!!!!!!!!!!!!!!!!!!!!!!!!!!', '2025-05-22 10:49:11'),
(3, 'Alexander', 'Parry', 'Enrol123', 'Egrparry28@gmail.com', 'This website is insane ! The PHP master strikes again. ', '2025-05-22 19:43:17'),
(4, 'Alexander', 'Parry', 'Enrol123', 'Egrparry28@gmail.com', 'This website is insane ! The PHP master strikes again. ', '2025-05-22 19:44:50'),
(5, 'Alexander', 'Parry', 'Enrol123', 'Egrparry28@gmail.com', 'This website is insane ! The PHP master strikes again. ', '2025-05-22 19:45:06'),
(6, 'Alexander', 'Parry', 'Enrol123', 'Egrparry28@gmail.com', 'This website is insane ! The PHP master strikes again. ', '2025-05-22 19:45:50'),
(7, 'Frazee', 'Harbess', 'FrazerGTFC', 'test@gmail.com', 'This website is awful ', '2025-05-23 12:23:57'),
(8, 'Greg', 'Richard', 'thegreatone', 'greg@fishandchips.co.uk', 'This website design is cool ', '2026-02-09 14:57:48'),
(9, 'Greg', 'Richard', 'thegreatone', 'greg@fishandchips.co.uk', 'This website design is cool ', '2026-02-09 15:19:34'),
(10, 'Greg', 'Richard', 'FrazerGTFC', 'greg@fishandchips.co.uk', 'Website is unreal', '2026-02-16 17:07:55'),
(11, 'Frazer', 'Harness', 'Enrol123', 'frazergtfc9@outlook.com', 'This website is crap', '2026-05-14 20:38:04'),
(12, 'Harry', 'Barker', 'haroldluvschads', 'harold123@parry.com', 'I think this website is woeful get some front end done ', '2026-05-15 14:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `username` text NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `title`, `content`, `username`, `time_created`) VALUES
(1, 'THERE IS NO TIOLET ROLL', 'IVE HAD EENOUGH FIX THE CLIMATE AND GIVE ME MY TOILET ROLLS', 'haroldluvschads', '0000-00-00 00:00:00'),
(2, 'THERE IS NO TIOLET ROLL P2 ', 'IVE HAD EENOUGH FIX THE CLIMATE AND GIVE ME MY TOILET ROLLS', 'haroldluvschads', '2026-05-14 18:16:09'),
(3, 'Text colour ', 'I cant see the colour properly ', 'haroldluvschads', '2026-05-15 08:14:07'),
(4, 'My supplies are running low', 'Why haven\'t my supply been updated to reflect what it is!', 'haroldluvschads', '2026-05-21 21:57:05'),
(5, 'Lack of rations', 'This isn\'t enough to last my family ', 'MRTest', '2026-05-22 06:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `local_threads`
--

CREATE TABLE `local_threads` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `username` text NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comments` text NOT NULL,
  `location` enum('East Riding','Birminghams','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `local_threads`
--

INSERT INTO `local_threads` (`id`, `title`, `description`, `content`, `username`, `time_created`, `comments`, `location`) VALUES
(1, 'Why is FM26 so bad ', 'I think FM26 is awful!!!', 'The game is bad this year , really bad ', '', '2026-02-16 17:06:42', '', 'East Riding');

-- --------------------------------------------------------

--
-- Table structure for table `local_thread_replies`
--

CREATE TABLE `local_thread_replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questions_id` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `quizzes_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `quizzes_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `responses_id` int(11) NOT NULL,
  `answer_selected` text NOT NULL,
  `is_correct` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `username` text NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `title`, `description`, `content`, `username`, `time_created`) VALUES
(1, 'Supplies', 'A Lack of supplies', 'Where is my supplies?\r\n\r\nI was expecting new clothes as well as I washed my jeans this morning! \r\n\r\nBourbons from the latest rations went everyhwere', 'FrazerGTFC', '2026-05-21 23:21:21'),
(2, 'STILL NO SUPPLIES', 'A lack of supplies is annoying me ', 'Where is my supplies NOW, I am getting sick of this ', 'FrazerGTFC', '2026-05-21 23:24:09'),
(4, 'Website', 'This website is clammy ', 'This website is clammy, I can\'t accsess my new ration list why can\'t I choose I am forced to have the same things again , I Want custard creams instead', 'haroldluvschads', '2026-05-21 23:23:02'),
(10, 'Test', 'Testing', 'Walktrhough', 'MRTest', '2026-05-22 06:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `threads_replies`
--

CREATE TABLE `threads_replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads_replies`
--

INSERT INTO `threads_replies` (`id`, `user_id`, `thread_id`, `text`, `date_created`) VALUES
(3, 12, 3, 'unlucky you melt ', '2026-05-08 14:47:46'),
(4, 12, 2, 'Its in your garden', '2026-05-09 21:57:27'),
(5, 12, 2, 'Nevermind its at your door', '2026-05-09 21:58:29'),
(7, 12, 3, 'h', '2026-05-15 14:33:41'),
(8, 12, 3, 'hh', '2026-05-15 14:33:43'),
(9, 12, 3, 'hh', '2026-05-15 14:33:44'),
(10, 1, 4, 'I disagree ', '2026-05-21 13:57:29'),
(11, 23, 4, 'I like this website', '2026-05-22 06:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `birthdate` text NOT NULL,
  `role` enum('user','admin','owner','') NOT NULL,
  `score` int(11) NOT NULL,
  `supplies_status` enum('Very High','High','Medium','Low','Very Low') NOT NULL DEFAULT 'Medium',
  `shelter_location` enum('Bedfordshire','Berkshire','Bristol','Buckinghamshire','Cambridgeshire','Cheshire','Cornwall','Cumbria','Derbyshire','Devon','Dorset','Durham','East Riding of Yorkshire','East Sussex','Essex','Gloucestershire','Greater London','Greater Manchester','Hampshire','Herefordshire','Hertfordshire','Isle of Wight','Kent','Lancashire','Leicestershire','Lincolnshire','Merseyside','Middlesex','Norfolk','North Yorkshire','Northamptonshire','Northumberland','Nottinghamshire','Oxfordshire','Rutland','Shropshire','Somerset','South Yorkshire','Staffordshire','Suffolk','Surrey','Tyne and Wear','Warwickshire','West Midlands','West Sussex','West Yorkshire','Wiltshire','Worcestershire') DEFAULT NULL,
  `weekly_reported_issues` int(11) NOT NULL,
  `last_supply_request` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `birthdate`, `role`, `score`, `supplies_status`, `shelter_location`, `weekly_reported_issues`, `last_supply_request`) VALUES
(1, 'FrazerGTFC', '$2y$10$EwvAmv/0GzWsB86V5ffUTecwJp3ehOCYM8nCSIJenXjPcBDaOHfMO', 'Frazer   ', 'Harness   ', 'frazergtfc9@outlook.com', '2008-06-07', 'admin', 40, 'High', 'Hampshire', 0, '2026-05-20 01:53:19'),
(3, 'EuanParry123', '$2y$10$n3SxG/5GD1EkA0xw.KanxeMMBZBDL6aYifWk6X/IH1GGTDLWk9jdG', 'Euan      ', 'Pazza      ', 'euan@gmail.com', '2020-01-07', 'user', 67, '', '', 0, NULL),
(4, 'harold1234', '$2y$10$76PrL2sPvomrdLcM4ROCY.O4Hvp7pHd38QS/gTZlFJOn63q77fBNe', 'harry', 'barker', 'HAROLd123@gmail.com', '2007-08-13', 'user', 68, '', '', 0, NULL),
(5, 'thegreatone', '$2y$10$qs0Df8w2wAwTVdXJ8Ceg7ek/s8qM0Wjb5/hv62.pVzMq1wxeh.F1O', 'euan ', 'glyn', 'euanismydadd@yahoo.com', '12121-02-12', 'admin', 0, '', '', 0, NULL),
(6, 'Enrol123', '$2y$10$4kxZa1hwdH5QR3STzJUYRu5N1nMIOmBmjF7iyH.bcUFxHdEuFdqdK', 'Euan ', 'Parry ', 'Egrparry28@gmail.com', '2007-09-28', 'user', 67, 'High', '', 0, '2026-05-13 22:41:59'),
(7, 'EuanSmells', '$2y$10$xzFzSyqM/cOxiOuSxMrHfeWtFr0MiNUFRARMMhWAOfAIX/gtJzMBW', 'Alex', 'Parry', 'alexparry@gmail.com', '2004-03-28', 'user', 54, '', '', 0, NULL),
(8, 'MrTest123', '$2y$10$gsruPByhpzqk48vrhwEd9.K7Ww3YiSbVe9cIyEIcLf2O6Ll1gJto2', 'Test ', 'Testing ', 'test@gmail.com', '2003-02-03', 'user', 0, '', '', 0, NULL),
(9, 'Euan123', '$2y$10$mUbp3WPvQsZkHFVzMiGgo.0066L0lJFvCfQoPzhEx9zO9g2jTDdDS', 'Euan ', 'Parry', 'Enrol123@gmail.com', '2007-09-28', 'user', 0, '', '', 0, NULL),
(10, 'ITKNEWS', '$2y$10$bNVzP3rShm/7lx30jHTjgunHDntXFlk6MTVq9K0jcHl13ZsGnXlKq', 'Mr', 'Reliable', 'reliablenews@yahoo.com', '1878-02-03', 'user', 0, '', '', 0, NULL),
(11, 'TheBatter', '$2y$10$Z1R2FPx.nZ8YqOxVCHcPseUR9cB7BiAAQXGQYNnuHLTdlWsPaXtyK', 'Greg', 'Richard', 'greg@fishandchips.co.uk', '1998-09-16', 'user', 0, '', '', 0, NULL),
(12, 'haroldluvschads', '$2y$10$pkBIgqs9JoEHMEk3p5kPFOlUFoykeVxdCmQIe3W4lNWW4rS9E994O', 'Harold', 'barker', 'harold123@parry.com', '2007-08-13', 'user', 37, 'High', 'Surrey', 3, NULL),
(14, 'Freddy098', '$2y$10$qsEbUlqCUI.MoblCVW9gd.s90ahDdXZxhx0ShpvgJ//lQimulphSK', 'Fred', 'Karen', 'fredkaren@gmail.com', '2015-05-12', 'user', 0, '', '', 0, NULL),
(15, 'garyluvschads', '$2y$10$61aRUfPLu1IzhSRkIuOm9.Poi/QPGh9sGv4qyC9wFQTQq.mC8Y4IG', 'Gary', 'Barlow', 'garryid@hotmail.com', '2013-02-14', 'user', 30, 'High', '', 0, NULL),
(16, 'BARRY009', '$2y$10$oopIoe7zuImlKdkkbk0RI.tffYnM8FBo0bNK9LvKdEQI.acCtLbyS', 'Gary', 'Barry', 'Barry@hotmail.com', '2013-02-14', 'user', 50, 'Medium', '', 0, NULL),
(17, 'CHADDU', '$2y$10$9fJj2DR3xvXtcw4JKqj2MOe4hdkmHEU8IzOfNQDauhrgre9UoQWha', 'Chad', 'Chaddu', 'looksmaxorg@gmail.com', '2012-02-14', 'user', 50, 'Medium', '', 0, NULL),
(18, 'MrDrill', '$2y$10$pd.zUtqLm328GkmnxCZpEOuwLEynuLtpfwOYGHD9Zr4mDP/w.Wdg.', 'Mark', 'Toaster', 'drilling@gmail.com', '1965-06-24', 'user', 45, 'Medium', 'Durham', 0, NULL),
(19, 'harryluvsfrazer', '$2y$10$DFgrwsxgS5UBQsDrHB7Ec.zfK291IbJ0EdxH/7ZgKFhmmmo0lqJSC', 'Harry ', 'Barker ', 'harrybarker120@gmail.com', '2007-08-13', 'user', 50, 'Medium', NULL, 0, NULL),
(20, 'JaimeLeigh5773', '$2y$10$9hb8iAZqa3mfW18QBNJFguGXEuClHvXXMMA9Mjv3V6DBMHovmEfLu', 'Jaime-Leigh', 'Fisher', 'Jaimeleighgreenhill048@gmail.com', '2008-08-15', 'user', 45, 'High', 'Hampshire', 0, '2026-05-21 19:33:26'),
(21, 'mikemariner', '$2y$10$Mbk49NHX.214Hrnc9whbbeXtccAZ8O/UqPCZQTRlL2kJD5tLJGmWi', 'Michael', 'Harness', 'mikeharness1972@icloud.com', '1972-02-03', 'user', 45, 'High', 'East Riding of Yorkshire', 0, '2026-05-21 17:36:11'),
(23, 'MRTest', '$2y$10$eUCJpoDRRaCXV3ti1nYSTOaXtrv/fbT56bDdWEiujGHXww6dsMT4m', 'Test', 'Testing', 'test67@gmail.com', '2001-07-09', 'user', 54, 'Low', 'Durham', 1, '2026-05-22 07:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_responses`
--

CREATE TABLE `user_responses` (
  `user_response_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `quizzes_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `response_id` int(11) NOT NULL,
  `time_completed` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `local_threads`
--
ALTER TABLE `local_threads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `local_thread_replies`
--
ALTER TABLE `local_thread_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questions_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`quizzes_id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`responses_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threads_replies`
--
ALTER TABLE `threads_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_responses`
--
ALTER TABLE `user_responses`
  ADD PRIMARY KEY (`user_response_id`),
  ADD KEY `id` (`id`),
  ADD KEY `quizzes_id` (`quizzes_id`,`question_id`,`response_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `local_threads`
--
ALTER TABLE `local_threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `local_thread_replies`
--
ALTER TABLE `local_thread_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questions_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `quizzes_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `responses_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `threads_replies`
--
ALTER TABLE `threads_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_responses`
--
ALTER TABLE `user_responses`
  MODIFY `user_response_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_responses`
--
ALTER TABLE `user_responses`
  ADD CONSTRAINT `user_responses_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
