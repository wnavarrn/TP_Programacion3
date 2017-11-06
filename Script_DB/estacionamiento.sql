-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2017 a las 05:25:24
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estacionamiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `clave` longtext COLLATE utf8_unicode_ci NOT NULL,
  `perfil` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `turno` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creacion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `apellido`, `clave`, `perfil`, `mail`, `turno`, `fecha_creacion`, `foto`) VALUES
(3, 'walter', '', '123', 'admin', 'w@gmail.com', 'tarde', 'masculino', ''),
(4, 'alan', '', '1234', 'admin', 'walter@gmail.com', 'mañana', 'masculino', ''),
(5, 'walter', 'walter', 'pass123', 'admin', 'walter@gmail.com', 'mañana', '2017-11-06 04:30:00', ''),
(6, 'walter', 'walter', 'pass123', 'admin', 'walter@gmail.com', 'mañana', '2017-11-06 04:30:52', ''),
(7, 'Navarrete', 'Navarrete', '1234', 'victor@gmail.com', '', 'tarde', '2017-11-06 04:53:07', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_empleados`
--

CREATE TABLE `ingresos_empleados` (
  `id` int(11) NOT NULL,
  `fecha_hora_ingreso` varchar(50) NOT NULL,
  `id_empleado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE `operaciones` (
  `id` int(11) NOT NULL,
  `patente` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `id_empleado_ingreso` int(11) NOT NULL,
  `fecha_hora_ingreso` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `id_empleado_salida` int(11) DEFAULT NULL,
  `fecha_hora_salida` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importe` float DEFAULT NULL,
  `tiempo` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`id`, `patente`, `color`, `foto`, `id_empleado_ingreso`, `fecha_hora_ingreso`, `id_empleado_salida`, `fecha_hora_salida`, `importe`, `tiempo`) VALUES
(3, '123abc', 'BLUE', 'guardarFoto', 3, '2017-11-06 05:17:13', NULL, NULL, NULL, NULL),
(4, '4234243', 'Naranja', 'guardarFoto', 2, '2017-10-11', NULL, NULL, NULL, NULL),
(5, '123456', 'azul', 'img_123456', 7, '2017-11-06 05:04:52', NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingresos_empleados`
--
ALTER TABLE `ingresos_empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ingresos_empleados`
--
ALTER TABLE `ingresos_empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
