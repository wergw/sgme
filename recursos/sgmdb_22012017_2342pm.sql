-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2017 a las 03:41:44
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `curso`
--
CREATE DATABASE IF NOT EXISTS `sgmdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `sgmdb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros`
--

CREATE TABLE IF NOT EXISTS `centros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `camas` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `centros`
--

INSERT INTO `centros` (`id`, `codigo`, `nombre`, `direccion`, `telefono`, `camas`) VALUES
(1, 'C001', 'Clinica Avila', 'Zona Centro, Carora', '14578654444', 50),
(2, 'C002', 'Hospital 002', 'Barquisimeto', '465464', 7),
(5, 'CE004', 'Ambulatorio de Cabudare', 'Cabudare Centro', '6478954', 10),
(7, 'C005', 'Policlinica de Cabudare', 'Cabudare', '4567411257', 100),
(10, 'C006', 'Clinica Rasetti', 'Barquisimeto', '555-78547', 14),
(19, 'C007', 'Clinica XYZ', 'Cabudare', '979224585', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros_especialidades`
--

CREATE TABLE IF NOT EXISTS `centros_especialidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `centros_id` int(11) NOT NULL,
  `especialidades_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `centros_especialidades`
--

INSERT INTO `centros_especialidades` (`id`, `centros_id`, `especialidades_id`, `status`) VALUES
(5, 19, 2, 1),
(6, 19, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE IF NOT EXISTS `especialidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `observacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `codigo`, `nombre`, `status`, `observacion`) VALUES
(1, 'ES001', 'Cardiologia', 1, ''),
(2, 'ES002', 'Traumatologia', 1, ''),
(3, 'ES003', 'Ginecologia', 1, ''),
(4, 'ES004', 'Pedriatia', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `observacion` varchar(45) COLLATE utf8_spanish_ci DEFAULT 'Sin Observaciones',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `nombre`, `status`, `observacion`) VALUES
(1, 'administrador', 1, 'Sin Observaciones'),
(2, 'paramedico', 1, 'Sin Observaciones'),
(3, 'recepcionista', 1, 'Sin Observaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `Observaciones` varchar(45) COLLATE utf8_spanish_ci DEFAULT 'Sin Observaciones',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `cedula`, `nombre`, `direccion`, `telefono`, `status`, `Observaciones`) VALUES
(1, '20188138', 'Jancarlos Alarcon', 'Cabudare', '5478546', 1, 'Sin Observaciones'),
(2, '15228704', 'Janluis Alarcon', 'Cabudare', '654789', 1, 'Sin Observaciones'),
(3, '15093409', 'Yaranelly Alvarado', 'Quibor', '64785214', 1, 'Sin Observaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `persona_id` int(11) NOT NULL,
  `usuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `observaciones` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `persona_id`, `usuario`, `password`, `perfil_id`, `status`, `observaciones`) VALUES
(1, 1, 'jancarlos', '123456', 1, 1, NULL),
(2, 2, 'janluis', '123456', 2, 1, NULL),
(3, 3, 'yaranelly', '123456', 3, 1, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
