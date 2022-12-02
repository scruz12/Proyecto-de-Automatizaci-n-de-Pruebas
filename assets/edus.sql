-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2022 a las 18:00:51
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `edus`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarCita` (IN `p_numero` INT(15), IN `p_cedula` INT(10), IN `p_correo` VARCHAR(30), IN `p_fecha` DATE, IN `p_hora` VARCHAR(10), IN `p_centro` VARCHAR(30))  BEGIN

	UPDATE citas
    SET Cedula = p_cedula,
    	Correo = p_correo,
        Fecha = p_fecha,
        Hora = p_hora,
        Centro = p_centro
    Where NumeroCita = p_numero;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCita` (IN `p_NumeroCita` INT(15))  BEGIN

SELECT * FROM citas
WHERE NumeroCita = p_NumeroCita;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCitas` ()  BEGIN
SELECT * FROM citas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarCita` (IN `p_NumeroCita` INT(15))  BEGIN
DELETE FROM citas 
WHERE NumeroCita = p_NumeroCita;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `IngresarCita` (IN `p_cedula` INT(15), IN `p_correo` VARCHAR(30), IN `p_fecha` DATE, IN `p_hora` VARCHAR(10), IN `p_centro` VARCHAR(30))  BEGIN
INSERT INTO citas (Cedula, Correo, Fecha, Hora, Centro) VALUES (p_cedula, p_correo, p_fecha, p_hora, p_centro);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `NumeroCita` int(10) NOT NULL,
  `Cedula` varchar(9) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Fecha` varchar(15) NOT NULL,
  `Hora` varchar(10) NOT NULL,
  `Centro` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`NumeroCita`, `Cedula`, `Correo`, `Fecha`, `Hora`, `Centro`) VALUES
(4, '23232441', 'gergre@correo.com', '2022-12-15', '12', 'efewf'),
(5, '147852369', 'gergre@correo.com', '0000-00-00', '12', 'ebais'),
(6, '118050439', 'correo@gmail.com', '0000-00-00', '12', 'efewf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`NumeroCita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `NumeroCita` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
