-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2017 a las 18:36:29
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `viajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `excursiones`
--

CREATE TABLE `excursiones` (
  `codigo` varchar(5) COLLATE utf8_bin NOT NULL,
  `categoria` varchar(30) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(60) COLLATE utf8_bin NOT NULL,
  `precio` decimal(12,2) NOT NULL,
  `imagen` varchar(20) COLLATE utf8_bin NOT NULL,
  `oferta` varchar(2) COLLATE utf8_bin NOT NULL,
  `novedad` varchar(2) COLLATE utf8_bin NOT NULL,
  `detalle` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `excursiones`
--

INSERT INTO `excursiones` (`codigo`, `categoria`, `nombre`, `precio`, `imagen`, `oferta`, `novedad`, `detalle`) VALUES
('exc1', 'acuatica', 'Mujeres', '1410.00', 'mujeres.jpg', 'si', 'no', 'Recibe su nombre gracias a ellas.'),
('exc2', 'acuatica', 'Buceo', '2400.00', 'buceo.jpg', 'si', 'si', 'El mejor fondo marino.'),
('exc3', 'acuatica', 'Canoa', '2850.00', 'canoa.jpeg', 'no', 'no', 'Capacidad para 2 personas.'),
('exc4', 'aerea', 'Tirolina', '1500.00', 'tirolina.jpg', 'no', 'si', 'No apto para personas con vértigo.'),
('exc5', 'acuatica', 'nado delfin', '930.00', 'nado.jpg', 'si', 'no', 'Acariciar delfines, una pasada.'),
('exc6', 'aerea', 'Vuelo', '7500.00', 'vuelo.jpg', 'no', 'si', 'Vistas desde helicóptero'),
('exc7', 'acuatica', 'Boarding', '890.00', 'tabla2.jpg', 'si', 'si', 'Caminar el mar Caribe.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(2) NOT NULL,
  `nombre` varchar(10) COLLATE utf8_bin NOT NULL,
  `password` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'usuario', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `excursiones`
--
ALTER TABLE `excursiones`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
