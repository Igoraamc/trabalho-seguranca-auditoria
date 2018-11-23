-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 23-Nov-2018 às 06:53
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DB_COFRE_DE_SENHAS`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_ADMIN`
--

CREATE TABLE `TB_ADMIN` (
  `NAME` varchar(80) NOT NULL,
  `EMAIL` varchar(60) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `USER_KEY` varchar(254) NOT NULL,
  `DATA_EXP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `TB_ADMIN`
--

INSERT INTO `TB_ADMIN` (`NAME`, `EMAIL`, `PASSWORD`, `USER_KEY`, `DATA_EXP`) VALUES
('ADMIN', 'A_D_M_I_N@admin.admin', '123456789@admin@987654321', 'pclWEKIONm', '24/11/2018');

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_USER`
--

CREATE TABLE `TB_USER` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(60) NOT NULL,
  `EMAIL` varchar(45) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_USERS`
--

CREATE TABLE `TB_USERS` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(80) NOT NULL,
  `EMAIL` varchar(60) NOT NULL,
  `PASSWORD` varchar(254) NOT NULL,
  `USER_KEY` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `TB_USERS`
--

INSERT INTO `TB_USERS` (`ID`, `NAME`, `EMAIL`, `PASSWORD`, `USER_KEY`) VALUES
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
-- Estrutura da tabela `TB_USERS_KEYS`
--

CREATE TABLE `TB_USERS_KEYS` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(254) NOT NULL,
  `PASSWORD` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `TB_USERS_KEYS`
--

INSERT INTO `TB_USERS_KEYS` (`ID`, `NAME`, `PASSWORD`) VALUES
(18, 'OI', 'NUfjcsMIHAuQxoy58GoDvA=='),
(18, 'testando', 'QMB0PQMjueIbvkFiranttA=='),
(18, 'teste novo', '89sXm0lWeZtoF4NGPzRDkQ=='),
(21, 'teste igor', 'GHvyhN0Nhc/QQ73gEcOiSg==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `TB_USER`
--
ALTER TABLE `TB_USER`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `TB_USERS`
--
ALTER TABLE `TB_USERS`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `TB_USER`
--
ALTER TABLE `TB_USER`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `TB_USERS`
--
ALTER TABLE `TB_USERS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
