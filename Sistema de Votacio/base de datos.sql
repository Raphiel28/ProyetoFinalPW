-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 01:40 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `admin_username`, `admin_password`, `time_stamp`) VALUES
(1, 'admin', 'admin', '2020-12-02 00:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `candidatos`
--

CREATE TABLE `candidatos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `partido` int(11) NOT NULL,
  `puesto` int(11) NOT NULL,
  `foto` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `candidatos`
--

INSERT INTO `candidatos` (`id`, `nombre`, `apellido`, `partido`, `puesto`, `foto`, `estado`) VALUES
(1, 'juan', 'pablo', 1, 1, 'ivan duque.jpg', 1),
(9, '3', 'perez', 3, 0, '6', 1),
(10, '1', 'lopez', 3, 0, 'sdgdfgdfgdfg', 1),
(11, '2', 'gdhfghfg', 1, 0, 'dfdfghfghf', 1),
(12, 'JEAN', 'CALDERON', 8, 5, 'fgjfgjghj', 1),
(13, '', '', 0, 0, '', 0),
(14, '1', 'dghfghfgh', 2, 0, 'fghfghfghfg', 0),
(15, '1', 'fghfgh', 1, 0, 'ffffff', 0),
(16, '2', 'CALDERON', 2, 0, 'Juan Manuel Santos.jpg', 0),
(17, '', '', 0, 0, '', 0),
(18, '3', '', 4, 0, 'dfgdfgd', 0),
(19, '', '', 0, 0, 'hjkhjkhjkhjk', 0),
(20, '3', 'CALDERON', 3, 0, 'dfgdfghfghfg', 1),
(21, '1', 'fghfgh', 1, 0, 'dfhfghfgh', 1),
(22, '5', 'CALDERON', 3, 0, 'fgjghjghj', 1),
(23, '10', 'CALDERON', 10, 0, '5555555555555', 1),
(24, 'federico', 'perez', 7, 7, 'ghjghjghj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ciudadano`
--

CREATE TABLE `ciudadano` (
  `cedula` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `ciudadano`
--

INSERT INTO `ciudadano` (`cedula`, `nombre`, `apellido`, `email`, `estado`) VALUES
('40224209433', 'jean', 'calderon', 'sdfgsgf@gmail.com', 1),
('ghjghj', 'ghjghj', 'ghjgj', 'ghjghj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `eleccion`
--

CREATE TABLE `eleccion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `eleccion`
--

INSERT INTO `eleccion` (`id`, `nombre`, `fecha`, `estado`) VALUES
(1, 'emergencia', '2020-12-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partido`
--

CREATE TABLE `partido` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `partido`
--

INSERT INTO `partido` (`id`, `nombre`, `descripcion`, `logo`, `estado`) VALUES
(1, 'sdgsdfgdfg', 'dfhfgh', '', 1),
(2, 'gdfgdfg', 'gdfgdf', 'dfgdf', 1),
(3, 'dfgdfg', 'dfgdfg', 'dfgdfg', 0),
(4, 'sdfgdsfg', 'dfgdfg', 'dfgdfg', 0),
(5, 'dfgdfg', 'dfgdfg', 'sgdfg', 1),
(6, 'fgjfgh', 'fghfgh', 'fghfgh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `puesto`
--

CREATE TABLE `puesto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `puesto`
--

INSERT INTO `puesto` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'PRESIDENTE', 'PRESIDENTE', 1),
(2, 'ALCALDE', 'ALCALDE', 1),
(3, 'SENADOR', 'SENADOR', 0),
(4, 'DIPUTADO', 'DIPUTADO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voto`
--

CREATE TABLE `voto` (
  `cedula` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `presidente` int(100) DEFAULT NULL,
  `alcalde` int(100) DEFAULT NULL,
  `senador` int(100) DEFAULT NULL,
  `diputado` int(100) DEFAULT NULL,
  `eleccion` int(100) NOT NULL,
  `estado` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `voto`
--

INSERT INTO `voto` (`cedula`, `presidente`, `alcalde`, `senador`, `diputado`, `eleccion`, `estado`) VALUES
('40224209433', 9, 1, 1, 9, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudadano`
--
ALTER TABLE `ciudadano`
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indexes for table `eleccion`
--
ALTER TABLE `eleccion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partido`
--
ALTER TABLE `partido`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voto`
--
ALTER TABLE `voto`
  ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `eleccion`
--
ALTER TABLE `eleccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partido`
--
ALTER TABLE `partido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `puesto`
--
ALTER TABLE `puesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
