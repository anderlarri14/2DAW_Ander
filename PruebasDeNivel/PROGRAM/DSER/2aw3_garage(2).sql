-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2019 a las 11:05:20
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
-- Base de datos: `2aw3_garage`
--
CREATE DATABASE IF NOT EXISTS `2aw3_garage` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `2aw3_garage`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `spBorrarTareas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spBorrarTareas` (IN `pId` INT(10))  NO SQL
DELETE FROM visits_tasks
WHERE visits_tasks.idVisit = pId$$

DROP PROCEDURE IF EXISTS `spInsertarTareas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarTareas` (IN `pIdvisit` INT(10), IN `pIdtask` INT(10))  NO SQL
INSERT INTO visits_tasks(visits_tasks.idVisit,visits_tasks.idTask)
VALUES(pIdvisit,pIdtask)$$

DROP PROCEDURE IF EXISTS `spInsertarVisita`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarVisita` (IN `pMatricula` VARCHAR(20), IN `pfecha` VARCHAR(20))  NO SQL
BEGIN
INSERT INTO visits (visits.plate,visits.date)
VALUES (pMatricula,pfecha);
SELECT LAST_insert_id() as idVisit;



END$$

DROP PROCEDURE IF EXISTS `spInsertarVisitaTarea`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertarVisitaTarea` (IN `pidVisita` INT(11), IN `pidTarea` INT(11))  NO SQL
INSERT visits_tasks (visits_tasks.idVisit,visits_tasks.idTask)
VALUES (pidVisita,pidTarea)$$

DROP PROCEDURE IF EXISTS `spModificarDate`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spModificarDate` (IN `pId` INT(10), IN `pDate` VARCHAR(20))  NO SQL
UPDATE visits set visits.date = pDate
WHERE visits.idVisit = pId$$

DROP PROCEDURE IF EXISTS `spMostrarDatos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spMostrarDatos` (IN `pMatricula` VARCHAR(7))  NO SQL
SELECT vehicles.plate,vehicles.model,vehicles.brand,vehicles.color,customers.name
FROM vehicles
INNER JOIN customers ON customers.idCustomer = vehicles.customer
WHERE vehicles.plate = pMatricula$$

DROP PROCEDURE IF EXISTS `spMostrarHistorial`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spMostrarHistorial` (IN `pMatricula` VARCHAR(10))  NO SQL
SELECT visits.idVisit,visits.date,GROUP_CONCAT(tasks.taskDescr) as taskDescr
FROM visits
INNER join visits_tasks ON visits_tasks.idVisit = visits.idVisit
INNER JOIN tasks ON tasks.idTask = visits_tasks.idTask
WHERE visits.plate = pMatricula
GROUP BY visits.idVisit$$

DROP PROCEDURE IF EXISTS `spMostrarParaModificar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spMostrarParaModificar` (IN `pid` INT(10))  NO SQL
SELECT visits.idVisit,visits.date,GROUP_CONCAT(tasks.taskDescr) as taskDescr
FROM visits
INNER JOIN visits_tasks ON visits_tasks.idVisit = visits.idVisit
INNER JOIN tasks ON tasks.idTask = visits_tasks.idTask
WHERE pid = visits.idVisit$$

DROP PROCEDURE IF EXISTS `spMostrarTareas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spMostrarTareas` ()  NO SQL
SELECT * 
FROM tasks$$

DROP PROCEDURE IF EXISTS `spMostrarVehiculos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spMostrarVehiculos` ()  NO SQL
SELECT * 
FROM vehicles$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `idCustomer` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`idCustomer`, `name`, `surname`, `telephone`) VALUES
(1, 'Danny', 'De Vito', '900899874'),
(2, 'Jennifer', 'Lawrence', '562526396'),
(3, 'Jude', 'Law', '522457844');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `idTask` int(11) NOT NULL,
  `taskDescr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`idTask`, `taskDescr`) VALUES
(1, 'Brakes'),
(2, 'Oil'),
(3, 'Front weels'),
(4, 'Rear weels'),
(5, 'Fuel filter'),
(6, 'Air filter'),
(7, 'Battery'),
(8, 'Brake fluid');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE `vehicles` (
  `plate` varchar(7) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehicles`
--

INSERT INTO `vehicles` (`plate`, `brand`, `model`, `color`, `customer`) VALUES
('1223FBJ', 'Ford', 'Mondeo', 'Blue', 1),
('3902CVZ', 'Renault', 'Clio', 'Blue', 2),
('6985HJN', 'Opel', 'Vivaro', 'Red', 1),
('8903HGG', 'Nissan', 'Juke', 'White', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visits`
--

DROP TABLE IF EXISTS `visits`;
CREATE TABLE `visits` (
  `idVisit` int(11) NOT NULL,
  `plate` varchar(7) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `visits`
--

INSERT INTO `visits` (`idVisit`, `plate`, `date`) VALUES
(1, '1223FBJ', '2019-03-03'),
(2, '3902CVZ', '2019-02-03'),
(3, '8903HGG', '2019-01-14'),
(4, '6985HJN', '2019-01-22'),
(5, '6985HJN', '2019-01-27'),
(6, '1223FBJ', '02/08/2019'),
(7, '1223FBJ', '02/08/2019'),
(8, '1223FBJ', '02/08/2019'),
(9, '1223FBJ', '02/08/2019'),
(10, '1223FBJ', '02/08/2019'),
(11, '1223FBJ', '02/08/2019'),
(12, '1223FBJ', '02/08/2019'),
(13, '1223FBJ', '02/08/2019'),
(14, '1223FBJ', '02/08/2019'),
(15, '1223FBJ', '02/10/2019'),
(16, '1223FBJ', '02/10/2019'),
(17, '1223FBJ', '02/10/2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visits_tasks`
--

DROP TABLE IF EXISTS `visits_tasks`;
CREATE TABLE `visits_tasks` (
  `idVisitTask` int(11) NOT NULL,
  `idVisit` int(11) NOT NULL,
  `idTask` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `visits_tasks`
--

INSERT INTO `visits_tasks` (`idVisitTask`, `idVisit`, `idTask`) VALUES
(4, 3, 2),
(5, 3, 3),
(6, 4, 1),
(7, 4, 6),
(8, 5, 5),
(9, 5, 1),
(10, 5, 3),
(40, 17, 1),
(41, 17, 2),
(42, 17, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`idCustomer`);

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`idTask`);

--
-- Indices de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`plate`),
  ADD KEY `customer` (`customer`);

--
-- Indices de la tabla `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`idVisit`),
  ADD KEY `plate` (`plate`);

--
-- Indices de la tabla `visits_tasks`
--
ALTER TABLE `visits_tasks`
  ADD PRIMARY KEY (`idVisitTask`),
  ADD KEY `idVisit` (`idVisit`),
  ADD KEY `idTask` (`idTask`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `idCustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
  MODIFY `idTask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `visits`
--
ALTER TABLE `visits`
  MODIFY `idVisit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `visits_tasks`
--
ALTER TABLE `visits_tasks`
  MODIFY `idVisitTask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `customers` (`idCustomer`);

--
-- Filtros para la tabla `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_ibfk_1` FOREIGN KEY (`plate`) REFERENCES `vehicles` (`plate`);

--
-- Filtros para la tabla `visits_tasks`
--
ALTER TABLE `visits_tasks`
  ADD CONSTRAINT `visits_tasks_ibfk_1` FOREIGN KEY (`idVisit`) REFERENCES `visits` (`idVisit`),
  ADD CONSTRAINT `visits_tasks_ibfk_2` FOREIGN KEY (`idTask`) REFERENCES `tasks` (`idTask`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
