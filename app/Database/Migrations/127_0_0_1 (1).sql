-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2024 at 11:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_barrientos_franco`
--
DROP DATABASE IF EXISTS `bd_barrientos_franco`;
CREATE DATABASE IF NOT EXISTS `bd_barrientos_franco` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_barrientos_franco`;

-- --------------------------------------------------------

--
-- Table structure for table `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultas`
--

INSERT INTO `consultas` (`id`, `nombre`, `email`, `tipo`, `mensaje`) VALUES
(1, 'franco', 'francobarriensstos56@gmail.com', 0, ''),
(2, 'franco', 'francobarriensstos56@gmail.com', 0, ''),
(3, 'franco', 'francobarriensstos56@gmail.com', 0, ''),
(4, 'franco', 'francobarriensstos56@gmail.com', 0, 'Hola este es mi 4to mensaje'),
(5, 'Ferf', 'fer23@gmail.com', 0, 'Hola esto interesado en el R8, dejo mi numero para contacto: 3794029331.'),
(7, 'franco barrientos', 'francobarriendadtos56@gmail.com', 0, 'sadsada'),
(8, 'franco barrientos', 'francobarrientoss56@gmail.coms', 1, 'dasda'),
(9, 'franco', 'francobarriensstos56@gmail.com', 0, 'dsasdadsad');

-- --------------------------------------------------------

--
-- Table structure for table `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perfiles`
--

INSERT INTO `perfiles` (`id`, `descripcion`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `perfil_id` int(11) NOT NULL DEFAULT 2,
  `baja` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `usuario`, `pass`, `perfil_id`, `baja`) VALUES
(2, 'Franco', 'Perez', 'francobarrientos56@gmail.com', 'admin', '$2y$10$AWo5pK3FQqaJ9w2EvS4CDeQSWOjLbIkAw6iIIxaJs31ceA1YIH4Ie', 1, 'NO'),
(5, 'franco', 'barrientos', 'francobarrientos5326@gmail.com', 'fran456', '$2y$10$oB25Mt47qzh.M2betSTjGup1OXaVE9KJ/6vM3kIJIjdVvHGSkTXha', 2, 'SI'),
(9, 'franco', 'barrientos', 'francobarriensstos56@gmail.com', 'fran1235', '$2y$10$oB25Mt47qzh.M2betSTjGup1OXaVE9KJ/6vM3kIJIjdVvHGSkTXha', 2, 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `marca` enum('Bentley','Audi','BMW','Ferrari','Lamborghini','Mercedes-Benz','Porsche','Mclaren','Ford','Bugatti','Aston Martin') NOT NULL,
  `modelo` varchar(60) NOT NULL,
  `año` int(11) NOT NULL,
  `color` varchar(60) NOT NULL,
  `precio` double NOT NULL,
  `motor` varchar(60) NOT NULL,
  `img` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `baja` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `marca`, `modelo`, `año`, `color`, `precio`, `motor`, `img`, `descripcion`, `baja`) VALUES
(1, 'Ferrari', '488 Gtb', 2016, 'Rojo', 960000, 'V8 3.9 TURBO', 'ferrari488.webp', 'As fast as you imagine', 'NO'),
(2, 'Ferrari', '488 Gtb', 2016, 'Rojo', 960000, 'V8 3.9 TURBO', 'ferrari488.webp', 'As fast as you imagine', 'SI'),
(3, 'Ferrari', '488 Gtb', 2016, 'Rojo', 960000, 'V8 3.9 TURBO', 'ferrari488.webp', 'As fast as you imagine', 'SI'),
(4, 'Audi', 'TT', 2018, 'NEGRO', 20000, 'V8 Turbo', '1716080860_a356c028ade4ef3f4a6c.webp', 'FAST', 'SI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
