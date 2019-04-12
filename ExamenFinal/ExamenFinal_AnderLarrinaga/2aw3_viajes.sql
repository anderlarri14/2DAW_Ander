-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2019 a las 13:04:32
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
-- Base de datos: `2aw3_viajes`
--
CREATE DATABASE IF NOT EXISTS `2aw3_viajes` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `2aw3_viajes`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spNewTrip` (IN `pIdUser` INT, IN `pIdOrigin` INT, IN `pIdDestination` INT, IN `pIdPrice` INT, IN `pDate` DATE)  NO SQL
INSERT INTO usertrips(idUser, idOrigin, idDestination, idPrice, date)
VALUES(pIdUser,pIdOrigin,pIdDestination,pIdPrice,pDate)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUsuarioPorNombre` (IN `pNombre` VARCHAR(255))  NO SQL
SELECT *
FROM users
WHERE users.userName = pNombre$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spViajePorUsuario` (IN `pIdUser` INT)  NO SQL
SELECT usertrips.date,origen.cityName as origin,destino.cityName as destination,prices.price
FROM usertrips
INNER JOIN cities as origen ON origen.idCity = usertrips.idOrigin
INNER JOIN cities as destino ON destino.idCity = usertrips.idDestination
INNER JOIN prices ON prices.idPrice = usertrips.idPrice
INNER JOIN users ON users.idUser = usertrips.idUser
WHERE pIdUser = usertrips.idUser$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spZonaPorCiudad` (IN `pIdCity` INT)  NO SQL
SELECT cities.cityZone
FROM cities
WHERE cities.idCity = pIdCity$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE `cities` (
  `idCity` int(11) NOT NULL,
  `cityName` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cityZone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`idCity`, `cityName`, `cityZone`) VALUES
(1, 'Vitoria-Gasteiz', 1),
(2, 'Llodio', 0),
(3, 'Agurain', 1),
(4, 'Kanpezu', 2),
(5, 'Artziniega', 0),
(6, 'Nanclares de la Oca', 1),
(7, 'Aramaio', 0),
(8, 'Zurbano', 1),
(9, 'Ulibarri-Ganboa', 1),
(10, 'Legutio', 1),
(11, 'Oyon', 3),
(12, 'Ilarratza', 1),
(13, 'Rivabellosa', 3),
(14, 'Azazeta', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prices`
--

CREATE TABLE `prices` (
  `idPrice` int(11) NOT NULL,
  `zones` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prices`
--

INSERT INTO `prices` (`idPrice`, `zones`, `price`) VALUES
(0, 0, 2.2),
(1, 1, 3.5),
(2, 2, 4.5),
(3, 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `userName` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `keyWord1` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `keyWord2` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `userName`, `keyWord1`, `keyWord2`) VALUES
(1, 'traveller20', 'travel', 'train'),
(2, 'newYork90', 'step', 'van'),
(3, 'mikel1995', 'astoa', 'makila');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usertrips`
--

CREATE TABLE `usertrips` (
  `idTrip` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idOrigin` int(11) NOT NULL DEFAULT '1',
  `idDestination` int(11) NOT NULL,
  `idPrice` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usertrips`
--

INSERT INTO `usertrips` (`idTrip`, `idUser`, `idOrigin`, `idDestination`, `idPrice`, `date`) VALUES
(52, 1, 1, 11, 2, '2019-02-11'),
(53, 3, 2, 11, 3, '2019-02-12'),
(54, 3, 14, 10, 1, '2019-01-01'),
(55, 1, 3, 10, 0, '2018-12-18'),
(56, 1, 6, 11, 2, '2019-02-12'),
(57, 1, 13, 1, 2, '2019-01-27'),
(58, 1, 2, 1, 1, '2019-02-04'),
(59, 1, 7, 11, 3, '2019-02-12'),
(60, 1, 10, 4, 1, '2019-02-12'),
(61, 1, 7, 1, 1, '2019-02-13'),
(88, 2, 1, 1, 0, '2019-02-13'),
(89, 2, 4, 7, 2, '2019-02-13'),
(90, 1, 1, 9, 0, '2019-02-14'),
(91, 2, 1, 1, 0, '2019-02-13'),
(92, 2, 1, 2, 1, '2019-02-13'),
(93, 1, 1, 3, 0, '2019-02-14'),
(94, 2, 2, 3, 1, '2019-02-14'),
(95, 2, 1, 3, 0, '2019-02-19'),
(96, 2, 14, 14, 0, '2019-02-13'),
(97, 2, 6, 6, 0, '2019-02-13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`idCity`);

--
-- Indices de la tabla `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`idPrice`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- Indices de la tabla `usertrips`
--
ALTER TABLE `usertrips`
  ADD PRIMARY KEY (`idTrip`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idOrigin` (`idOrigin`),
  ADD KEY `idDestination` (`idDestination`),
  ADD KEY `price` (`idPrice`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cities`
--
ALTER TABLE `cities`
  MODIFY `idCity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `prices`
--
ALTER TABLE `prices`
  MODIFY `idPrice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usertrips`
--
ALTER TABLE `usertrips`
  MODIFY `idTrip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usertrips`
--
ALTER TABLE `usertrips`
  ADD CONSTRAINT `usertrips_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `usertrips_ibfk_2` FOREIGN KEY (`idOrigin`) REFERENCES `cities` (`idCity`),
  ADD CONSTRAINT `usertrips_ibfk_3` FOREIGN KEY (`idDestination`) REFERENCES `cities` (`idCity`),
  ADD CONSTRAINT `usertrips_ibfk_4` FOREIGN KEY (`idPrice`) REFERENCES `prices` (`idPrice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
