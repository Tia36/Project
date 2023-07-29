-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 05:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_managment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`) VALUES
(1, 'idno22381@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `id` int(11) NOT NULL,
  `devicepic` varchar(25) NOT NULL,
  `devicename` varchar(25) NOT NULL,
  `devicequantity` varchar(25) NOT NULL,
  `deviceava` int(11) NOT NULL,
  `devicerent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`id`, `devicepic`, `devicename`, `devicequantity`, `deviceava`, `devicerent`) VALUES
(4, 'arrow.jpg', 'Scott Gallagher',  '20', 16, 4),
(5, 'logo.png', 'Ferris Mclaughlin',   '157', 157, 0),
(6, 'arrow.png', 'harry',  '3', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `issuedevice`
--

CREATE TABLE `issuedevice` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `issuename` varchar(25) NOT NULL,
  `issuedevice` varchar(25) NOT NULL,
  `issuetype` varchar(25) NOT NULL,
  `issuedays` int(11) NOT NULL,
  `issuedate` varchar(25) NOT NULL,
  `issuereturn` varchar(25) NOT NULL,
  `fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issuedevice`
--

INSERT INTO `issuedevice` (`id`, `userid`, `issuename`, `issuedevice`, `issuetype`, `issuedays`, `issuedate`, `issuereturn`, `fine`) VALUES
(2, 1, 'salman', 'Rich daddy poor dady', 'student', 3, '30/03/2021', '02/04/2021', 1800),
(3, 2, 'Randall Burch', 'Scott Gallagher', 'teacher', 4, '30/03/2021', '03/04/2021', 0),
(6, 1, 'salman', 'Scott Gallagher', 'student', 7, '30/03/2021', '06/04/2021', 1800),
(9, 5, 'salmannew', 'Scott Gallagher', 'teacher', 21, '30/03/2021', '20/04/2021', 0),
(10, 1, 'salman', 'Scott Gallagher', 'student', 7, '01/04/2021', '08/04/2021', 0),
(11, 1, 'salman', 'harry', 'student', 7, '01/04/2021', '08/04/2021', 0);

-- --------------------------------------------------------

--
-- Table structure for table `requestdevice`
--

CREATE TABLE `requestdevice` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `deviceid` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `usertype` varchar(25) NOT NULL,
  `devicename` varchar(25) NOT NULL,
  `issuedays` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `name`, `email`, `pass`, `type`) VALUES
(1, 'salman', 'idno22382@gmail.com', '123', 'student'),
(2, 'Randall Burch', 'voqo@mailinator.com', 'Ratione nulla dolore', 'teacher'),
(3, 'Gabriel Daugherty', 'bipacer@mailinator.com', 'Voluptas explicabo ', 'teacher'),
(5, 'salmannew', '1234@gmail.com', '123', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issuedevice`
--
ALTER TABLE `issuedevice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_fk` (`userid`);

--
-- Indexes for table `requestdevice`
--
ALTER TABLE `requestdevice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_fk_device` (`deviceid`),
  ADD KEY `pk_fk_users` (`userid`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `issuedevice`
--
ALTER TABLE `issuedevice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `requestdevice`
--
ALTER TABLE `requestdevice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issuedevice`
--
ALTER TABLE `issuedevice`
  ADD CONSTRAINT `pk_fk` FOREIGN KEY (`userid`) REFERENCES `userdata` (`id`);

--
-- Constraints for table `requestdevice`
--
ALTER TABLE `requestdevice`
  ADD CONSTRAINT `pk_fk_users` FOREIGN KEY (`userid`) REFERENCES `userdata` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
