-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2019 a las 11:05:37
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
CREATE DATABASE IF NOT EXISTS `2aw3_agenda3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `2aw3_agenda3`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `spBorrarEmails`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spBorrarEmails` (IN `pid` INT(20))  NO SQL
DELETE 
FROM emails
WHERE emails.idContact = pid$$

DROP PROCEDURE IF EXISTS `spBorrarGrupos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spBorrarGrupos` (IN `pId` INT(10))  NO SQL
DELETE
FROM contactsgroups
WHERE contactsgroups.idContact = pId$$

DROP PROCEDURE IF EXISTS `spInsertarEmail`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarEmail` (IN `pIdContato` INT(10), IN `pEmail` VARCHAR(20))  NO SQL
INSERT INTO emails
(emails.idContact,emails.e_mail)
VALUES (pIdContato,pEmail)$$

DROP PROCEDURE IF EXISTS `spInsertarGrupo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarGrupo` (IN `pIdContact` INT(20), IN `pIdGrupo` INT(20))  NO SQL
INSERT INTO contactsgroups
(contactsgroups.idContact,contactsgroups.idGroup)
VALUES (pIdContact,pIdGrupo)$$

DROP PROCEDURE IF EXISTS `spModificarDato`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spModificarDato` (IN `pId` INT(10), IN `pNombre` VARCHAR(20), IN `pApellido` VARCHAR(20), IN `pTel` VARCHAR(20))  NO SQL
UPDATE contacts SET contacts.name = pNombre ,contacts.surname = pApellido,contacts.tel = pTel
WHERE contacts.idContact = pId$$

DROP PROCEDURE IF EXISTS `spMostrarContactos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spMostrarContactos` ()  NO SQL
SELECT * 
FROM contacts$$

DROP PROCEDURE IF EXISTS `spMostrarDatos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spMostrarDatos` (IN `pId` INT(20))  NO SQL
SELECT contacts.idContact,contacts.name,contacts.surname,contacts.tel,
GROUP_CONCAT(DISTINCT(emails.e_mail)) as e_mail,GROUP_CONCAT(DISTINCT(emails.idEmail)) as idEmail,GROUP_CONCAT(DISTINCT(groups.groupName)) as groupName,
GROUP_CONCAT(DISTINCT(groups.idGroup)) as idGroup
FROM contacts
left JOIN emails ON emails.idContact = contacts.idContact
left JOIN contactsgroups ON contactsgroups.idContact = contacts.idContact
left JOIN groups ON groups.idGroup = contactsgroups.idGroup
WHERE pId = contacts.idContact$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

DROP TABLE IF EXISTS `contacts`;
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
(6, 'Rosee', 'Stuart', '22334433'),
(16, 'Nick', 'Anderson', '5698854552'),
(23, 'Iñaki', 'Nuñez', '675534231'),
(24, 'Ion Ander', 'Güebbo', '762523223'),
(28, 'Aitor', 'Ibañez', '78236478'),
(31, 'Clint', 'Eastwood', '347853498'),
(32, 'Miren', 'Muñoz', '89742');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactsgroups`
--

DROP TABLE IF EXISTS `contactsgroups`;
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
(32, 1),
(32, 2),
(32, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--

DROP TABLE IF EXISTS `emails`;
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
(27, 31, 'Clint@yahoho.es'),
(38, 23, 'nunez@hotmail.co'),
(39, 24, 'ion@ggg.vom'),
(40, 16, 'nick@gmail.com'),
(41, 16, 'nick@hotmail.com'),
(43, 28, 'aitor@hotmail.com'),
(44, 5, 'mick2@zornotza.eus'),
(46, 4, 'ane@hotmail.com'),
(59, 3, 'xzczxc'),
(60, 3, 'zxc'),
(61, 3, 'sdfsdf'),
(74, 32, 'miren600@fpzornotza.'),
(75, 1, 'xabier@gmail.com'),
(76, 1, 'xabier@gmail.com'),
(77, 1, 'xabie@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

DROP TABLE IF EXISTS `groups`;
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
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `emails`
--
ALTER TABLE `emails`
  MODIFY `idEmail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `idGroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
