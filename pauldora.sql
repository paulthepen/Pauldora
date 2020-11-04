-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 05:01 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pauldora`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `artworkPath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artworkPath`) VALUES
(1, 'This Side', 2, 5, 'assets/images/artwork/thisside.jpg'),
(2, 'Chasing Daylight', 3, 2, 'assets/images/artwork/chasingdaylight.jpg'),
(3, 'Sweet Baby James', 4, 6, 'assets/images/artwork/sweetbabyjames.jpg'),
(4, 'Birth of The Cool', 5, 3, 'assets/images/artwork/birthofthecool.jpg'),
(5, 'Red', 6, 4, 'assets/images/artwork/red.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`) VALUES
(1, 'Mickey Mouse'),
(2, 'Nickel Creek'),
(3, 'Sister Hazel'),
(4, 'James Taylor'),
(5, 'Miles Davis'),
(6, 'Taylor Swift');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(2, 'Rock'),
(3, 'Jazz'),
(4, 'Country'),
(5, 'Bluegrass'),
(6, 'Easy Listening');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(1, 'Smoothie Song', 2, 1, 5, '3:20', 'assets/music/smoothiesong.mp3', 1, 0),
(2, 'Spit on a Stranger', 2, 1, 5, '2:34', 'assets/music/spitonastranger.mp3', 2, 0),
(3, 'Speak', 2, 1, 5, '4:01', 'assets/music/speak.mp3', 3, 0),
(4, 'Hanging by a Thread', 2, 1, 5, '4:06', 'assets/music/hangingbyathread.mp3', 4, 0),
(5, 'I Should\'ve Known Better', 2, 1, 5, '4:27', 'assets/music/ishouldveknownbetter.mp3', 5, 0),
(6, 'This Side', 2, 1, 5, '3:33', 'assets/music/thisside.mp3', 6, 0),
(7, 'Green and Gra', 2, 1, 5, '3:36', 'assets/music/greenandgray.mp3', 7, 0),
(8, 'Seven Wonders', 2, 1, 5, '4:10', 'assets/music/sevenwonders.mp3', 8, 0),
(9, 'House Carpenter', 2, 1, 5, '5:30', 'assets/music/housecarpenter.mp3', 9, 0),
(10, 'Beauty and the Mess', 2, 1, 5, '2:52', 'assets/music/beautyandthemess.mp3', 10, 0),
(11, 'Sabra Girl', 2, 1, 5, '4:04', 'assets/music/sabragirl.mp3', 11, 0),
(12, 'Young', 2, 1, 5, '3:29', 'assets/music/young.mp3', 12, 0),
(13, 'Brand New Sidewalk', 2, 1, 5, '4:16', 'assets/music/brandnewsidewalk.mp3', 13, 0),
(14, 'Love', 5, 4, 3, '5:35', 'assets/music/bensound-love.mp3', 1, 0),
(15, 'Jazz Comedy', 5, 4, 3, '3:13', 'assets/music/bensound-jazzcomedy.mp3', 2, 0),
(16, 'The Jazz Piano', 5, 4, 3, '2:40', 'assets/music/bensound-thejazzpiano.mp3', 3, 0),
(17, 'All That', 5, 4, 3, '2:26', 'assets/music/bensound-allthat.mp3', 4, 0),
(18, 'Jazzy Frenchy', 5, 4, 3, '1:44', 'assets/music/bensound-jazzyfrenchy.mp3', 5, 0),
(19, 'Happy Rock', 3, 2, 2, '1:45', 'assets/music/bensound-happyrock.mp3', 1, 0),
(20, 'Punky', 3, 2, 2, '2:06', 'assets/music/bensound-punky.mp3', 2, 0),
(21, 'Going Higher', 3, 2, 2, '4:04', 'assets/music/bensound-goinghigher.mp3', 3, 0),
(22, 'A New Beginning', 3, 2, 2, '2:34', 'assets/music/bensound-anewbeginning.mp3', 4, 0),
(23, 'Acoustic Breeze', 4, 3, 6, '2:37', 'assets/music/bensound-acousticbreeze.mp3', 1, 0),
(24, 'Cute', 4, 3, 6, '3:14', 'assets/music/bensound-cute.mp3', 2, 0),
(25, 'Ukulele', 4, 3, 6, '2:26', 'assets/music/bensound-ukulele.mp3', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `signUpDate`, `profilePic`) VALUES
(2, 'PaulCharpie', 'Paul', 'Charpie', 'Paulcharpie@gmail.com', 'e0d9364b7cdbb92c99151eb8cedac66b', '2020-10-27 00:00:00', 'assets/images/profilePics/head_emerald.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
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
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
