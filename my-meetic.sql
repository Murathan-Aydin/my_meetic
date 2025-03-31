-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2025 at 07:19 PM
-- Server version: 10.11.8-MariaDB-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mymeetic`
--

-- --------------------------------------------------------

--
-- Table structure for table `recode`
--

CREATE TABLE `recode` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recode`
--

INSERT INTO `recode` (`id`, `email`, `password`) VALUES
(1, 'contact@m-aydin.fr', '$2y$12$D9BFspsIiciThaWh58BBzeP9vIO9gTc2rcMC7gwZ9ov5XUl5HLtIy');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `genre` enum('homme','femme','autre') NOT NULL,
  `birthdate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `lastname`, `firstname`, `email`, `password`, `genre`, `birthdate`, `created_at`, `deleted`) VALUES
(1, 'murat710', 'aydin', 'murathan', 'murathan0308@gmail.com', '$2y$12$rTMECE8N6eZL4y2FIDLcF.ouJuxzsuf6EvQiZ9CWGcqKNq9KmpFCa', 'homme', '2003-08-08', '2025-02-07 10:37:46', 'false'),
(2, 'alperen69', 'aydin', 'alperen', 'alperen@gmail.com', '$2y$12$rTMECE8N6eZL4y2FIDLcF.ouJuxzsuf6EvQiZ9CWGcqKNq9KmpFCa', 'homme', '2003-08-08', '2025-02-07 17:48:30', 'false'),
(4, 'mete69', 'AYDIN', 'Murathan', 'metehan@gmail.com', '$2y$12$tefhW7jML9UxNi18lWANdeXgZGSU2SMrz/4H8xRm9wH12fxONhAhS', 'homme', '2000-08-08', '2025-02-09 03:37:03', 'false'),
(5, 'demacia', 'AYDIN', 'Murathan', 'yusuf.yeni@epitech.eu', '$2y$12$D.YWHAERPqFPxiNceLPwlOWrDKJRDm86SgOfS8TPHRZd9qHTTGHUC', 'homme', '2000-08-08', '2025-02-09 03:38:52', 'false'),
(7, 'mete69', 'AYDIN', 'Murathan', 'murathan.aydin@epitech.eu', '$2y$12$XY5ZOgIt7PzCvKMDnzOYAO3N9JylT/rGUUl/29hVo0cgMZ.xhnLy6', 'homme', '2003-08-08', '2025-02-09 10:52:27', 'false'),
(8, 'meteezf', 'zefze', 'zffe', 'em@eme.fr', '$2y$12$BpsLq8pgAPaNdC2VNK.oxeaQnqKAgOcVOOzew8UDqiGsqd7i5oMoW', 'homme', '2000-08-08', '2025-02-09 10:53:57', 'false'),
(10, 'meteezf', 'zefze', 'zffe', 'test@erf.fr', '$2y$12$Gio12cNG5d3YXxHAtJYQDOzFcFtOmFPsB1V2fmXLdUkbVw4VL/uEq', 'homme', '2000-08-08', '2025-02-09 10:55:48', 'false'),
(11, 'murat710', 'AYDIN', 'Murathan', 'zezdzn0308@gmail.com', '$2y$12$7BkgP4OefTto6rvhKqePUerFIkhZWf.pfiA/3OKXEoRsmaDh.g2vK', 'homme', '2000-08-05', '2025-02-09 11:04:17', 'false'),
(12, 'demacia', 'AYDIN', 'Murathan', 'njnjnj0308@gmail.com', '$2y$12$zmYDa9H3u0si4dx.xEww/.BDmDK7wpXqmlcAAWdcZqeYrQDXyPkui', 'homme', '2003-08-08', '2025-02-09 11:07:02', 'false'),
(13, 'Yarak kafali Kayou', 'Yarak', 'Kayou', 'siktirgit@epitech.eu', '$2y$12$sjGPePSVY0qcZv4fAWIJReb9pGdQ7W0K9p8BsGFyDSjn6yoDJy3Fa', 'homme', '2000-06-21', '2025-02-10 08:43:51', 'false'),
(14, 'test', 'ay', 'mu', 'test@em.com', '$2y$12$BVubm/4EC/infN9toXZpHuQi8XBMBhUo/9hscZ18LT3mqLKW5Axua', 'homme', '1984-06-13', '2025-02-11 10:43:57', 'false'),
(15, 'allo69', 'AYDIN', 'Murathan', 'erge@gmail.com', '$2y$12$URK7GNUMnBfy0PU8hAKe1ujRIeGnv5OqvhYzrS5nZYcqp.s3alEI6', 'autre', '2003-02-08', '2025-02-11 10:45:14', 'false'),
(16, 'murat710', 'AYDIN', 'Murathan', 'mrathan0308@gil.com', '$2y$12$0fLcQB32KL.0n0cku8B3CeyvHIsDMAOxYTC6u5IPpSMfYcMF0Dakq', 'homme', '2003-08-08', '2025-02-13 12:23:20', 'false'),
(17, 'mete69', 'AYDIN', 'Murathan', 'ura08@gmail.com', '$2y$12$aZzYcx3bdMzTwv2BP/ntye5iKoLw9A1ESMHR7e.84QUYjbb6UGN96', 'homme', '2003-08-08', '2025-02-13 14:37:36', 'false'),
(18, 'azerty', 'azerty', 'azerty', 'azerty@azeryy.com', '$2y$12$pIG0zYaf5xwIO3DnmspTd.q7/oaqEdH/tTuOXM4/2/K3xt/L0IvHK', 'homme', '2003-08-08', '2025-02-13 14:42:55', 'false'),
(19, 'azerty', 'azerty', 'azerty', 'azey@azeryy.com', '$2y$12$VVrj7faPySeQCzxaz1VS3ObVdnvFYsYPqsxGCeof5p4xBeAHitMbu', 'homme', '2003-08-08', '2025-02-13 14:49:47', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `user_follower`
--

CREATE TABLE `user_follower` (
  `id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `followed_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_follower`
--

INSERT INTO `user_follower` (`id`, `follower_id`, `followed_id`) VALUES
(2, 1, 4),
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `hobbie` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `id_user`, `hobbie`, `image`, `city`) VALUES
(1, 1, 'Automobile', '1_67a81ecfa5a5a.png', 'Lyon'),
(4, 2, 'Automobile', '2_67a82027dac51.avif', 'Paris'),
(5, 4, 'Voyages', '4_67a823284c577.jpg', 'Marseille');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recode`
--
ALTER TABLE `recode`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Indexes for table `user_follower`
--
ALTER TABLE `user_follower`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_follow` (`follower_id`,`followed_id`),
  ADD KEY `followed_id` (`followed_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recode`
--
ALTER TABLE `recode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_follower`
--
ALTER TABLE `user_follower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_follower`
--
ALTER TABLE `user_follower`
  ADD CONSTRAINT `user_follower_ibfk_1` FOREIGN KEY (`follower_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_follower_ibfk_2` FOREIGN KEY (`followed_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
