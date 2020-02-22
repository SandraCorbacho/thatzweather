-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2020 a las 19:07:22
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `weather`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiempo`
--

CREATE TABLE `tiempo` (
  `ciudad` varchar(22) NOT NULL,
  `temperatura` decimal(3,0) DEFAULT NULL,
  `codigo_postal` varchar(5) DEFAULT NULL,
  `viento` varchar(4) DEFAULT NULL,
  `tempDia2` tinyint(2) NOT NULL,
  `tempDia3` tinyint(2) NOT NULL,
  `tempDia4` tinyint(2) NOT NULL,
  `tempDia5` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiempo`
--

INSERT INTO `tiempo` (`ciudad`, `temperatura`, `codigo_postal`, `viento`, `tempDia2`, `tempDia3`, `tempDia4`, `tempDia5`) VALUES
('Abrera', '16', '08630', '4', 16, 16, 16, 16),
('Garraf Ii (Sitges) (Ur', '11', '08860', '3', 11, 11, 11, 11),
('Madrid', '18', '28006', '0', 18, 18, 18, 18),
('Navarcles', '12', '08270', '1', 12, 12, 12, 12),
('Sant Boi De Llobregat', '13', '08830', '3', 13, 13, 13, 13),
('Sant Climent De Llobre', '16', '08849', '8', 16, 16, 16, 16),
('Torrelles De Llobregat', '14', '08629', '3', 14, 14, 14, 14),
('Viladecans', '13', '08840', '1', 13, 13, 13, 13);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tiempo`
--
ALTER TABLE `tiempo`
  ADD PRIMARY KEY (`ciudad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
