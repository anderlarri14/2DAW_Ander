-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2019 a las 22:14:36
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `spContactoPorMatricula` (IN `pMatricula` INT(10))  NO SQL
SELECT name
FROM customers
INNER JOIN vehicles ON customers.idCustomer=vehicles.customer
WHERE vehicles.plate=pMatricula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spHistorial` (IN `pMatricula` INT(10))  NO SQL
SELECT visits.idVisit as idVisita , visits.plate as matricula, visits.date as fecha, GROUP_CONCAT(tasks.taskDescr) AS Tareas
FROM tasks
INNER JOIN visits_tasks ON tasks.idTask = visits_tasks.idTask
INNER JOIN visits ON visits_tasks.idVisit=visits.idVisit
WHERE visits.plate = pMatricula
GROUP BY visits.idVisit$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spMatriculaPorIdVisit` (IN `pIdVisit` INT)  NO SQL
SELECT plate
FROM visits
WHERE visits.idVisit = pIdVisit$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spNewTareasPorVisita` (IN `pIdVisit` INT, IN `pIdTask` INT)  NO SQL
INSERT INTO visits_tasks(visits_tasks.idVisit, visits_tasks.idTask)
VALUES(pIdVisit, pidTask)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spNewVisita` (IN `pPlate` VARCHAR(10), IN `pDate` DATE)  NO SQL
INSERT INTO visits(plate,date)
VALUES (pPlate,pDate)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spTareasPorVisita` (IN `pIdVisita` INT)  NO SQL
SELECT tasks.taskDescr AS Tareas
FROM tasks
INNER JOIN visits_tasks ON tasks.idTask = visits_tasks.idTask
INNER JOIN visits ON visits_tasks.idVisit=visits.idVisit
WHERE visits.idVisit = pIdVisita$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spTopId` ()  NO SQL
SELECT max(visits.idVisit) as id
FROM visits$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateCliente` (IN `pNombreCliente` VARCHAR(20), IN `pIdCliente` INT)  NO SQL
UPDATE customers
SET customers.name = pNombreCliente
WHERE customers.idCustomer = pIdCliente$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateVehiculo` (IN `pPlate` VARCHAR(10), IN `pMarca` VARCHAR(20), IN `pModelo` VARCHAR(20))  NO SQL
UPDATE vehicles
SET model = pModelo, brand = pMarca
WHERE vehicles.plate = pPlate$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spVehiculoPorMatricula` (IN `pMatricula` INT(10))  NO SQL
SELECT *
FROM vehicles
WHERE vehicles.plate = pMatricula$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

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
(2, 'bbbbbb', 'Lawrence', '562526396'),
(3, 'Jude', 'Law', '522457844');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

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
('3902CVZ', 'BROOM', 'AAAAAAA', 'Blue', 2),
('6985HJN', 'Opel', 'Vivaro', 'Red', 1),
('8903HGG', 'Nissan', 'Juke', 'White', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visits`
--

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
(17, '1223FBJ', '02/10/2019'),
(18, '3902CVZ', '2019-02-13'),
(19, '3902CVZ', '2019-02-13'),
(20, '3902CVZ', '2019-02-13'),
(21, '3902CVZ', '2019-02-13'),
(22, '3902CVZ', '2019-02-13'),
(23, '3902CVZ', '2019-02-13'),
(24, '3902CVZ', '2019-02-13'),
(25, '8903HGG', '2019-02-14'),
(26, '3902CVZ', '2019-02-13'),
(27, '3902CVZ', '2019-02-13'),
(28, '3902CVZ', '2019-02-14'),
(34, '3902CVZ', '2019-02-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visits_tasks`
--

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
(42, 17, 3),
(58, 20, 1),
(59, 25, 1),
(60, 25, 2),
(61, 25, 3),
(62, 25, 4),
(63, 25, 5),
(64, 25, 6),
(65, 25, 7),
(66, 25, 8);

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
  MODIFY `idVisit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `visits_tasks`
--
ALTER TABLE `visits_tasks`
  MODIFY `idVisitTask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

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
