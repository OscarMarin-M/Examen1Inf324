-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2020 a las 15:27:54
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `identificador`
--

CREATE TABLE `identificador` (
  `CI` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `FechaNac` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Lugar` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `identificador`
--
CREATE TABLE `academico`.`materia` (
 `a` VARCHAR(5) NOT NULL ,
 `i` VARCHAR(5) NOT NULL ) 
 ENGINE = InnoDB;

INSERT INTO `identificador` (`CI`, `Nombre`, `FechaNac`, `Lugar`) VALUES
('666', 'Ashley Jimenez', '5/02/96', '07'),
('777', 'Jose Oros', '18/06/98', '03'),
('999', 'Oscar Marin', '28/05/99', '02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `color` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `clave`, `color`) VALUES
('666', 'ccc', 'black'),
('777', 'bbb', 'white'),
('999', 'aaa', '#ffc305');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `identificador`
--
ALTER TABLE `identificador`
  ADD PRIMARY KEY (`CI`),
  ADD KEY `CI` (`CI`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`),
  ADD KEY `usuario` (`usuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `identificador` (`CI`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
