-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2016 at 03:15 PM
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
(1, '1760728680865683', 'db6f36a2906769e3ae954516ef35d45d', 'ALALALALALAH!', 'EAAZABX5eRn5MBAHf7iP9bY4OswTHV3s3rQaYxXXCxLvIYYoIi5T82bz7ybjOjscvLU6oFYHfpvE8t0zjQk59tDFGKobqcmK7mZAGH9Crqp2MSmx3tIDCzmkGSCYOoLQQOvnvjpMPxu30BwXAZA1rExseRXEynsZD', '294062294283138');

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
  `registered_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `registered_date`, `status`) VALUES
(1, 'Gau', 'Teves', 'captainbuggythefifth@gmail.com', '34bcbe4d549ba92b8af9fce98fc93e88daede19494d62764e26a91fc735497a5bf19857ef4c650539f1224943a1015d4fdfd0a451914db65fd0f078cd1be5768NGvTd/MsKrNLgE54+Zl+0daxa51iCG0cUJU9MfcnOe8=', '2016-08-09 20:47:21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facebook_credentials`
--
ALTER TABLE `facebook_credentials`
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
