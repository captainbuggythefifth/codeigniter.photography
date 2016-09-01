-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2016 at 02:18 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photography_codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `facebook_credentials`
--

CREATE TABLE `facebook_credentials` (
  `id` int(11) NOT NULL,
  `appID` varchar(255) NOT NULL,
  `clientSecret` varchar(255) NOT NULL,
  `appsecretProof` varchar(255) NOT NULL,
  `sFBExchangeToken` varchar(255) NOT NULL,
  `pageID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facebook_credentials`
--

INSERT INTO `facebook_credentials` (`id`, `appID`, `clientSecret`, `appsecretProof`, `sFBExchangeToken`, `pageID`) VALUES
(1, '1760728680865683', 'db6f36a2906769e3ae954516ef35d45d', 'ALALALALALAH!', 'EAAZABX5eRn5MBANjWZCybXh3HXUkEUmLG0GdaNMT1l6ZBHhk2s0LxSqZCzUnmabY0sN1fzqwHK48GHrahobHeZCZBeTLfFUM9XXFrzD9xTJAGMvW8OkHFBXcf8Vn5aKUY7RwN2dZCNpmN34zpqDpCLpG0fpbNSKeiAZD', '294062294283138');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `status`, `date_registered`) VALUES
(1, 1, 1, '2016-09-01 09:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `nick_name` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `portfolio` varchar(1000) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `registered_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `nick_name`, `title`, `portfolio`, `facebook`, `twitter`, `instagram`, `registered_date`, `status`) VALUES
(1, 'Gau', 'Teves', 'captainbuggythefifth@gmail.com', '478be6b7655a3f3c6ab66a45356721d7319cb59d6ead914057ae9c732868da1919ee27b74d0283961e8e8007e69d762401d5a90b5813dd36d2ab669f1d46509e/dHDy3MzvXInz3h3BoQqD/PCjN5yXaVxRTrFfhclYUM=', 'ALALAH!', 'ALALAH!', '', 'https://www.facebook.com/CaptainBuggyTheFifth', 'https://www.facebook.com/CaptainBuggyTheFifth', 'https://www.facebook.com/CaptainBuggyTheFifth', '2016-08-09 20:47:21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facebook_credentials`
--
ALTER TABLE `facebook_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
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
-- AUTO_INCREMENT for table `facebook_credentials`
--
ALTER TABLE `facebook_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
