-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2025 a las 03:58:55
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `valero_automotive`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aceites`
--

CREATE TABLE `aceites` (
  `id` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `marca` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `viscosidad` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aceites`
--

INSERT INTO `aceites` (`id`, `nombre`, `marca`, `precio`, `stock`, `tipo`, `viscosidad`) VALUES
(1, 0, 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `usuaio` varchar(16) NOT NULL,
  `clave` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `baterias`
--

CREATE TABLE `baterias` (
  `id` int(11) NOT NULL,
  `grupo` varchar(16) NOT NULL,
  `modelo` varchar(15) NOT NULL,
  `año` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parabrisas`
--

CREATE TABLE `parabrisas` (
  `id` int(11) NOT NULL,
  `vehiculo` varchar(11) NOT NULL,
  `parte` varchar(11) NOT NULL,
  `año` int(11) NOT NULL,
  `precio` int(4) NOT NULL,
  `stock` int(11) NOT NULL,
  `marca` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parabrisas`
--

INSERT INTO `parabrisas` (`id`, `vehiculo`, `parte`, `año`, `precio`, `stock`, `marca`) VALUES
(1, 'Chery.arauc', 'Ventana', 2015, 80, 0, ''),
(3, 'Chery.arauc', 'parabrisa', 2023, 90, 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aceites`
--
ALTER TABLE `aceites`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `baterias`
--
ALTER TABLE `baterias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parabrisas`
--
ALTER TABLE `parabrisas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aceites`
--
ALTER TABLE `aceites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `baterias`
--
ALTER TABLE `baterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `parabrisas`
--
ALTER TABLE `parabrisas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
