-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 05:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinevotingkarnataka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `voter_id` longtext NOT NULL,
  `adhaar` bigint(12) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `voter_id`, `adhaar`, `gender`, `password`) VALUES
(1, 'Trial', 'a@gmail.com', 'kt/32/654/985632', 111111111111, 'Male', 'Bc@123456'),
(2, 'test name', 'test123@gmail.com', 'kt/98/987/963258', 564546546546, 'Male', 'password@1234');

-- --------------------------------------------------------

--
-- Table structure for table `candidates_db`
--

CREATE TABLE `candidates_db` (
  `id` int(11) NOT NULL,
  `candidate_name` varchar(500) NOT NULL,
  `party_name` varchar(500) NOT NULL,
  `election_name` varchar(500) NOT NULL,
  `total_votes` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates_db`
--

INSERT INTO `candidates_db` (`id`, `candidate_name`, `party_name`, `election_name`, `total_votes`) VALUES
(6, 'Trial', 'abc', 'trial', 0),
(7, 'qihsa', 'cba', 'trial', 0),
(8, 'fuddu', 'udduf', 'trial', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_db`
--

CREATE TABLE `contact_db` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `voter_id` longtext NOT NULL,
  `email` varchar(500) NOT NULL,
  `adhaar` bigint(12) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_db`
--

INSERT INTO `contact_db` (`id`, `name`, `voter_id`, `email`, `adhaar`, `message`) VALUES
(13, 'ameera c h', 'kt/12/123/123465', 'name@gmail.com', 654851321985, 'blah blah blah sdklalsklakslakmf;ksdflkmsdlfksdffklsdlkjsdfflkjsksdflfkjsdlksdlkj');

-- --------------------------------------------------------

--
-- Table structure for table `elections_db`
--

CREATE TABLE `elections_db` (
  `id` int(11) NOT NULL,
  `election_name` varchar(500) NOT NULL,
  `election_start_date` date NOT NULL,
  `election_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elections_db`
--

INSERT INTO `elections_db` (`id`, `election_name`, `election_start_date`, `election_end_date`) VALUES
(1, 'TRIAL ', '2020-04-28', '2020-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `id_request_db`
--

CREATE TABLE `id_request_db` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `voter_id` longtext NOT NULL,
  `adhaar` bigint(12) NOT NULL,
  `district` varchar(500) NOT NULL,
  `taluk` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `id_request_db`
--

INSERT INTO `id_request_db` (`id`, `email`, `voter_id`, `adhaar`, `district`, `taluk`) VALUES
(14, 'checking2@image.now', 'kt/86/952/784231', 649862186516, 'Davanagere', ''),
(15, 'hha@g.com', 'kt/86/952/785648', 658474354854, 'Belagavi', '');

-- --------------------------------------------------------

--
-- Table structure for table `image_db`
--

CREATE TABLE `image_db` (
  `imageId` int(11) NOT NULL,
  `voter_id` varchar(25) NOT NULL,
  `imageType` varchar(40) NOT NULL,
  `imageData` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `result_db`
--

CREATE TABLE `result_db` (
  `id` int(11) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `voter_id` longtext NOT NULL,
  `candidate_name` varchar(500) NOT NULL,
  `election_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result_db`
--

INSERT INTO `result_db` (`id`, `user_email`, `voter_id`, `candidate_name`, `election_name`) VALUES
(3, 'name@gmail.com', 'kt-12-123-123465', 'trial 2', 'trial');

-- --------------------------------------------------------

--
-- Table structure for table `users_db`
--

CREATE TABLE `users_db` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `adhaar` bigint(12) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `voter_id` longtext NOT NULL,
  `district` varchar(500) NOT NULL,
  `taluk` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `id_generated` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_db`
--

INSERT INTO `users_db` (`id`, `name`, `email`, `adhaar`, `gender`, `dob`, `voter_id`, `district`, `taluk`, `password`, `id_generated`) VALUES
(21, 'ameera c h', 'name@gmail.com', 654851321985, 'Female', '2023-10-13', 'kt/12/123/123465', 'Dakshina Kannada', '', 'A@123456a', 'DK6125671KA'),
(22, 'test name', 'test123@gmail.com', 654665498874, 'Male', '1998-12-05', 'KT/12/134/656554', 'Chikmagaluru', '', 'password@1234', ''),
(24, 'check 2', 'checking2@image.now', 649862186516, 'Transgender', '1968-02-06', 'kt/86/952/784231', 'Davanagere', '', 'password@1234', ''),
(25, 'haha', 'hha@g.com', 658474354854, 'Female', '2014-02-11', 'kt/86/952/785648', 'Belagavi', '', 'password@1234', ''),
(30, 'test', 'test@test.com', 654651984863, 'Male', '1998-03-23', 'kt/12/123/654848', 'Chikmagaluru', 'chikmagaluru', 'password@1234', 'CK3156043KA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates_db`
--
ALTER TABLE `candidates_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_db`
--
ALTER TABLE `contact_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elections_db`
--
ALTER TABLE `elections_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `id_request_db`
--
ALTER TABLE `id_request_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_db`
--
ALTER TABLE `image_db`
  ADD PRIMARY KEY (`imageId`);

--
-- Indexes for table `result_db`
--
ALTER TABLE `result_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_db`
--
ALTER TABLE `users_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidates_db`
--
ALTER TABLE `candidates_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_db`
--
ALTER TABLE `contact_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `elections_db`
--
ALTER TABLE `elections_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `id_request_db`
--
ALTER TABLE `id_request_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `image_db`
--
ALTER TABLE `image_db`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result_db`
--
ALTER TABLE `result_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_db`
--
ALTER TABLE `users_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
