-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2018 a las 11:28:52
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `206_biblioteca`
--
CREATE DATABASE IF NOT EXISTS `206_biblioteca` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `206_biblioteca`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `spAllBooks`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spAllBooks` ()  NO SQL
BEGIN
SELECT * FROM LIBROS;
END$$

DROP PROCEDURE IF EXISTS `spInsert`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsert` (IN `titulo` VARCHAR(50), IN `autor` VARCHAR(50), IN `numPag` INT)  NO SQL
BEGIN
INSERT INTO libros(libros.titulo,libros.autor,libros.numPag)
VALUES (titulo,autor,numPag);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

DROP TABLE IF EXISTS `libros`;
CREATE TABLE `libros` (
  `id` int(2) NOT NULL,
  `titulo` varchar(27) DEFAULT NULL,
  `autor` varchar(24) DEFAULT NULL,
  `numPag` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `autor`, `numPag`) VALUES
(3, 'VIDAS MAGICAS E INQUISICION', 'JULIO CARO BAROJA', 850),
(5, 'MUSEO DEL PRADO', 'SANTIAGO ALCOLEA BLANS', 464),
(6, 'EL OPALO NEGRO', 'VICTORIA HOLT', 384),
(7, 'POESIA Y OTROS TEXTOS', 'SAN JUAN DE LA CRUZ', 304),
(8, 'EL JUEGO DE HERRALL', 'STEPHEN KING', 400),
(10, 'EL SEÑOR DE LOS ANILLOS', 'J.R. TOLKIEN', 1104),
(12, 'IT', 'STEPHEN KING', 1000),
(15, 'COMO SI FUERA DIOS', 'ROBIN COOK', 456),
(16, 'TEMINAL', 'ROBIN COOK', 370),
(17, 'OCEANO', 'ALBERTO VAZQUEZ FIGUEROA', 250),
(18, 'LA IGUANA', 'ALBERTO VAZQUEZ FIGUEROA', 290),
(19, 'YALZA', 'ALBERTO VAZQUEZ FIGUEROA', 350),
(25, 'Lazarillo ', 'Anomino', 33);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
