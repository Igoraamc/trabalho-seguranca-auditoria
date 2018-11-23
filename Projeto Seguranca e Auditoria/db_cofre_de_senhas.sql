-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2018 at 01:22 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cofre_de_senhas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(80) NOT NULL,
  `EMAIL` varchar(60) NOT NULL,
  `PASSWORD` varchar(254) NOT NULL,
  `USER_KEY` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`ID`, `NAME`, `EMAIL`, `PASSWORD`, `USER_KEY`) VALUES
(18, 'aaa', 'aaa@aaa.aaa', '7fAaIQRZadegP5DDWhFTag==', 'GjYpBl'),
(19, 'bbb', 'bbb@bbb.bbb', '4x5OqyHrY9x9mHPnxh3FXw==', 'TyoEoy'),
(20, 'bbb', 'bbb@bbb.bbb', '1UkP0yMTA0ImFH0SnLLqbA==', 'XmCAToQ'),
(21, 'igor', 'iii@iii.iii', 'T58i9+b9xRUGbrTiv2pBmg==', 'luAEISOp'),
(22, 'teste', 'ttt@ttt.ttt', 'JNvD32fdidogFzQfIbGMbg==', 'jhMjrc'),
(23, 'fff', 'fff@fff.fff', 'cZcz2jP0//q2BSnPsLOQYg==', 'CMYDf'),
(24, 'jjj', 'jjj@jjj.jjj', 'uGS6xGD1QvYIIg06bO0Ibg==', 'QrUGLstrE'),
(25, 'kkk', 'kkk@kkk.kkk', 'KImOvKFAwOZ+LQixFEV1pA==', 'nzhCzoc');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users_keys`
--

CREATE TABLE `tb_users_keys` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(254) NOT NULL,
  `PASSWORD` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_users_keys`
--

INSERT INTO `tb_users_keys` (`ID`, `NAME`, `PASSWORD`) VALUES
(18, 'OI', 'NUfjcsMIHAuQxoy58GoDvA=='),
(18, 'testando', 'QMB0PQMjueIbvkFiranttA=='),
(18, 'teste novo', '89sXm0lWeZtoF4NGPzRDkQ=='),
(21, 'teste igor', 'GHvyhN0Nhc/QQ73gEcOiSg==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
