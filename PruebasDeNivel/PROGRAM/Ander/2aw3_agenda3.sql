-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2019 a las 12:59:26
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
-- Base de datos: `2aw3_agenda3`
--
CREATE DATABASE IF NOT EXISTS `2aw3_agenda3` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `2aw3_agenda3`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spAllGroups` ()  NO SQL
SELECT *
FROM groups$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spContactDetails` (IN `pId` INT)  NO SQL
SELECT contacts.idContact AS id, contacts.name AS Name, contacts.surname as Surname, contacts.tel as Telephone
FROM contacts
WHERE contacts.idContact = pId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetAllContacts` ()  NO SQL
SELECT *
FROM contacts$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spModContact` (IN `pId` INT, IN `pNombre` VARCHAR(50), IN `pApellido` VARCHAR(50), IN `pTel` INT)  NO SQL
UPDATE contacts
SET contacts.name = pNombre, contacts.surname = pApellido, contacts.tel = pTel
WHERE contacts.idContact = pId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spModEmail` (IN `pIdEmail` INT, IN `pEmail` VARCHAR(50))  NO SQL
UPDATE emails
SET emails.e_mail = pEmail
WHERE emails.idEmail = pIdEmail$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `idContact` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`idContact`, `name`, `surname`, `tel`) VALUES
(1, 'Xabier', 'Fernandez', '645545454'),
(3, 'Ane', 'Osa', '555224411'),
(4, 'Ane', 'Ruiz', '66778855'),
(5, 'Mick', 'Cook', '1122345'),
(6, 'Rose', 'Stuart', '22334433'),
(16, 'Nick', 'Anderson', '5698854552'),
(23, 'Iñaki', 'Nuñez', '675534231'),
(24, 'Ion Ander', 'Güebbo', '762523223'),
(28, 'Aitor', 'Ibañez', '78236478'),
(31, 'Clint', 'Eastwood', '347853498'),
(32, 'a', 'a', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactsgroups`
--

CREATE TABLE `contactsgroups` (
  `idContact` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactsgroups`
--

INSERT INTO `contactsgroups` (`idContact`, `idGroup`) VALUES
(1, 2),
(1, 3),
(3, 1),
(4, 3),
(5, 3),
(6, 3),
(16, 1),
(16, 2),
(16, 3),
(23, 1),
(23, 3),
(24, 1),
(24, 2),
(28, 1),
(31, 2),
(32, 2),
(32, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--

CREATE TABLE `emails` (
  `idEmail` int(11) NOT NULL,
  `idContact` int(11) DEFAULT NULL,
  `e_mail` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `emails`
--

INSERT INTO `emails` (`idEmail`, `idContact`, `e_mail`) VALUES
(1, 6, 'rose@gmail.com'),
(2, 6, 'rose2@hotmail.com'),
(4, 5, 'mick@gmail.com'),
(5, 3, 'ane@gmail.com'),
(6, 3, 'anebigarrena@gmail.com'),
(8, 1, 'xabier@gmail.com'),
(27, 31, 'Clint@yahoho.es'),
(38, 23, 'nunez@hotmail.co'),
(39, 24, 'ion@ggg.vom'),
(40, 16, 'nick@gmail.com'),
(41, 16, 'nick@hotmail.com'),
(43, 28, 'aitor@hotmail.com'),
(44, 5, 'mick2@zornotza.eus'),
(46, 4, 'ane@hotmail.com'),
(47, 32, 'miren600@fpzornotza.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `idGroup` int(11) NOT NULL,
  `groupName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`idGroup`, `groupName`) VALUES
(1, 'Lagunak'),
(2, 'Familia'),
(3, 'Lana');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`idContact`);

--
-- Indices de la tabla `contactsgroups`
--
ALTER TABLE `contactsgroups`
  ADD PRIMARY KEY (`idContact`,`idGroup`),
  ADD KEY `idGroup` (`idGroup`);

--
-- Indices de la tabla `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`idEmail`),
  ADD KEY `fk_contactos` (`idContact`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`idGroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `emails`
--
ALTER TABLE `emails`
  MODIFY `idEmail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `idGroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactsgroups`
--
ALTER TABLE `contactsgroups`
  ADD CONSTRAINT `contactsgroups_ibfk_1` FOREIGN KEY (`idGroup`) REFERENCES `groups` (`idGroup`),
  ADD CONSTRAINT `contactsgroups_ibfk_2` FOREIGN KEY (`idContact`) REFERENCES `contacts` (`idContact`);

--
-- Filtros para la tabla `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_ibfk_1` FOREIGN KEY (`idContact`) REFERENCES `contacts` (`idContact`),
  ADD CONSTRAINT `fk_contactos` FOREIGN KEY (`idContact`) REFERENCES `contacts` (`idContact`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
