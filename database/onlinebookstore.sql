-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 02:55 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinebookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `adminname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `adminname`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` varchar(100) NOT NULL,
  `is_coming_soon` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `name`, `price`, `image`, `description`, `category`, `is_coming_soon`) VALUES
(6, 'test 6', 4500, 'Book 20.jpg', 'test 6', '', 0),
(7, 'test 7', 2100, 'Book 22.jpg', 'test 6', 'Mystery/Thriller', 0),
(8, 'test 8', 320, 'eb5.jpg', 'test 8', 'Science Fiction/Fantasy', 0),
(9, 'test 9', 4200, 'Book 17.jpg', 'test 9', 'Fiction', 0),
(10, 'test 10', 850, 'Book 13.jpg', 'test 10', 'Mystery/Thriller', 0),
(11, 'test11', 450, 'Book 18.jpg', 'test11', 'Mystery/Thriller', 0),
(13, 'test 12', 600, 'Book 9.jpg', 'test 12', 'Mystery/Thriller', 0),
(14, 'test 13', 900, 'eb3.jpg', 'test 13', 'Mystery/Thriller', 0),
(15, 'test 14', 340, 'Book 10.jpg', 'test 14', 'Biography/Memoir', 0),
(16, 'test 15 (_is_comming_)', 470, 'Book 7.jpg', 'test 15 (_is_comming_)', 'Romance', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
