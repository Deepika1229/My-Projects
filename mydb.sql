-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2017 at 11:09 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `Id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Id`, `username`, `email`, `password`) VALUES
(1, 'jin', 'jin@xyz.com', '4567'),
(2, 'Deepika1229', 'ddeepika.rao@gmail.com', 'abc123'),
(3, 'john', 'john@abc.com', '789'),
(5, 'Ram', 'ram12@abc.com', '4567'),
(6, 'Yogesh', 'yogesh.pothiganti@gmail.com', 'abcd123'),
(7, 'Sam', 'sam123@gmail.com', 'sam123'),
(8, 'Yogesh Pothiganti', 'yogesh.pothiganti@gmail.com', 'yogesh426789'),
(9, 'admin', 'admin123@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `book_id` int(11) NOT NULL,
  `bookname` varchar(32) NOT NULL,
  `author` varchar(32) NOT NULL,
  `category` varchar(20) NOT NULL,
  `fileToUpload` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`book_id`, `bookname`, `author`, `category`, `fileToUpload`, `description`, `price`) VALUES
(22, 'Health', 'Ram', 'scitech', '10572805_789728757743809_1305139108_n.jpg', 'HIIIIII', 150),
(23, 'Internet', 'James Gosling', 'scitech', 'i-765.pdf', 'Internet Internet Internet', 100),
(24, 'The monk who sold his ferrari', 'Robin Sharma', 'comics', 'The Monk Who sold His Ferrari.pdf', 'Good Book', 150),
(25, 'Life of Gandhi', 'Gandhi', 'scitech', 'The Story of My Experiments with Truth.pdf', 'The life story', 200),
(26, 'The Wild Life', 'Christopher', 'scitech', 'Think & Grow Rich.pdf', 'This book is amazing', 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
