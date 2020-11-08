-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2020 at 05:15 AM
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
(4, 'Kind Of Blue', 5, 3, 'assets/images/artwork/kindofblue.jpg'),
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
(7, 'Green and Gray', 2, 1, 5, '3:36', 'assets/music/greenandgray.mp3', 7, 0),
(8, 'Seven Wonders', 2, 1, 5, '4:10', 'assets/music/sevenwonders.mp3', 8, 0),
(9, 'House Carpenter', 2, 1, 5, '5:30', 'assets/music/housecarpenter.mp3', 9, 0),
(10, 'Beauty and the Mess', 2, 1, 5, '2:52', 'assets/music/beautyandthemess.mp3', 10, 0),
(11, 'Sabra Girl', 2, 1, 5, '4:04', 'assets/music/sabragirl.mp3', 11, 0),
(12, 'Young', 2, 1, 5, '3:29', 'assets/music/young.mp3', 12, 0),
(13, 'Brand New Sidewalk', 2, 1, 5, '4:16', 'assets/music/brandnewsidewalk.mp3', 13, 0),
(14, 'Love', 3, 2, 3, '5:35', 'assets/music/bensound-love.mp3', 1, 0),
(15, 'Jazz Comedy', 3, 2, 3, '3:13', 'assets/music/bensound-jazzcomedy.mp3', 2, 0),
(16, 'The Jazz Piano', 3, 2, 3, '2:40', 'assets/music/bensound-thejazzpiano.mp3', 3, 0),
(17, 'All That', 3, 2, 3, '2:26', 'assets/music/bensound-allthat.mp3', 4, 0),
(18, 'Jazzy Frenchy', 3, 2, 3, '1:44', 'assets/music/bensound-jazzyfrenchy.mp3', 5, 0),
(19, 'Happy Rock', 3, 2, 2, '1:45', 'assets/music/bensound-happyrock.mp3', 6, 0),
(20, 'Punky', 3, 2, 2, '2:06', 'assets/music/bensound-punky.mp3', 7, 0),
(21, 'Going Higher', 3, 2, 2, '4:04', 'assets/music/bensound-goinghigher.mp3', 8, 0),
(22, 'A New Beginning', 3, 2, 2, '2:34', 'assets/music/bensound-anewbeginning.mp3', 9, 0),
(23, 'Acoustic Breeze', 3, 2, 6, '2:37', 'assets/music/bensound-acousticbreeze.mp3', 10, 0),
(24, 'Cute', 3, 2, 6, '3:14', 'assets/music/bensound-cute.mp3', 11, 0),
(25, 'Ukulele', 3, 2, 6, '2:26', 'assets/music/bensound-ukulele.mp3', 12, 0),
(26, 'State Of Grace', 6, 5, 4, '4:55', 'assets/music/stateofgrace.mp3', 1, 0),
(27, 'Red', 6, 5, 4, '3:40', 'assets/music/red.mp3', 2, 0),
(28, 'Treacherous', 6, 5, 4, '4:00', 'assets/music/treacherous.mp3', 3, 0),
(29, 'I Knew You Were Trouble', 6, 5, 4, '3:38', 'assets/music/iknewyouweretrouble.mp3', 4, 0),
(30, 'All Too Well', 6, 5, 4, '5:27', 'assets/music/alltoowell.mp3', 5, 0),
(31, '22', 6, 5, 4, '3:50', 'assets/music/22.mp3', 6, 0),
(32, 'I Almost Do', 6, 5, 4, '4:02', 'assets/music/ialmostdo.mp3', 7, 0),
(33, 'We Are Never Ever Getting Back Together', 6, 5, 4, '3:11', 'assets/music/wearenevergettingbacktogether.mp3', 8, 0),
(34, 'Stay, Stay, Stay', 6, 5, 4, '3:24', 'assets/music/staystaystay.mp3', 9, 0),
(35, 'The Last Time (feat. Gary Lightbody)', 6, 5, 4, '4:58', 'assets/music/thelasttime.mp3', 10, 0),
(36, 'Holy Ground', 6, 5, 4, '3:21', 'assets/music/holyground.mp3', 11, 0),
(37, 'Sad Beautiful Tragic', 6, 5, 4, '4:43', 'assets/music/sadbeautifultragic.mp3', 12, 0),
(38, 'The Lucky One', 6, 5, 4, '4:00', 'assets/music/luckyone.mp3', 13, 0),
(39, 'Everything Has Changed (feat. Ed Sheeran)', 6, 5, 4, '4:03', 'assets/music/everythinghaschanged.mp3', 14, 0),
(40, 'Starlight', 6, 5, 4, '3:37', 'assets/music/starlight.mp3', 15, 0),
(41, 'Begin Again', 6, 5, 4, '3:57', 'assets/music/beginagain.mp3', 16, 0),
(42, 'The Moment I Knew', 6, 5, 4, '4:45', 'assets/music/themomentiknew.mp3', 17, 0),
(43, 'Come Back...Be Here', 6, 5, 4, '3:42', 'assets/music/comebackbehere.mp3', 18, 0),
(44, 'Girl At Home', 6, 5, 4, '3:40', 'assets/music/girlathome.mp3', 19, 0),
(45, 'Treacherous (Original Demo Recording)', 6, 5, 4, '3:59', 'assets/music/treacherousoriginal.mp3', 20, 0),
(46, 'Red (Original Demo Recording)', 6, 5, 4, '3:46', 'assets/music/redoriginal.mp3', 21, 0),
(47, 'State Of Grace (Acoustic Version)', 6, 5, 4, '5:23', 'assets/music/stateofgraceacoustic.mp3', 22, 1),
(48, 'So What', 5, 4, 3, '8:56', 'assets/music/sowhat.mp3', 1, 0),
(49, 'Freddy Freeloader', 5, 4, 3, '9:32', 'assets/music/freddyfreeloader.mp3', 2, 0),
(50, 'Blue In Green', 5, 4, 3, '5:27', 'assets/music/blueingreen.mp3', 3, 0),
(51, 'All Blues', 5, 4, 3, '11:34', 'assets/music/allblues.mp3', 4, 0),
(52, 'Flamenco Sketches', 5, 4, 3, '9:32', 'assets/music/flamencosketches.mp3', 5, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
