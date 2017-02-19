-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-02-2017 a las 19:29:48
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sgmdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE IF NOT EXISTS `bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `operacion` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `observacion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `usuario_id`, `operacion`, `fecha`, `status`, `observacion`) VALUES
(27, 1, 'Inicio de Sesion', '2017-02-07 09:02:35', 1, ''),
(28, 2, 'Inicio de Sesion', '2017-02-07 10:02:38', 1, ''),
(29, 2, 'Se solicito cama ', '2017-02-07 10:02:05', 1, ''),
(30, 3, 'Inicio de Sesion', '2017-02-07 10:02:36', 1, ''),
(31, 3, 'Se edito el centro Clinica Avila', '2017-02-07 10:02:11', 1, ''),
(32, 3, 'Asigna cama', '2017-02-07 10:02:32', 1, ''),
(33, 3, 'Se edito el centro Clinica Avila', '2017-02-07 10:02:54', 1, ''),
(34, 1, 'Inicio de Sesion', '2017-02-07 10:02:21', 1, ''),
(35, 1, 'Se creo especialidad: Neurologia', '2017-02-07 10:02:09', 1, ''),
(36, 1, 'Se edito el centro Clinica Rasetti', '2017-02-07 10:02:48', 1, ''),
(37, 1, 'Inicio de Sesion', '2017-02-07 11:02:59', 1, ''),
(38, 1, 'Inicio de Sesion', '2017-02-14 18:02:30', 1, ''),
(39, 1, 'Inicio de Sesion', '2017-02-14 23:02:57', 1, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `centros`
--

INSERT INTO `centros` (`id`, `codigo`, `nombre`, `direccion`, `telefono`, `camas`) VALUES
(1, 'C001', 'Clinica Avila', 'Zona Centro, Carora', '0251478965', 14),
(2, 'C002', 'Hospital 002', 'Barquisimeto', '465464', 2),
(5, 'CE004', 'Ambulatorio de Cabudare', 'Cabudare Centro', '6478954', 10),
(7, 'C005', 'Policlinica de Cabudare', 'Cabudare', '4567411257', 100),
(10, 'C006', 'Clinica Rasetti', 'Barquisimeto', '555-78547', 13),
(19, 'C007', 'Clinica XYZ', 'Cabudare', '979224585', 5),
(20, 'C008', 'Clinica Alemana', 'Quilicura', '4447-6587', 4),
(21, 'C009', 'Clinica IDET', 'Barquisimeto', '0251547898', 8),
(22, 'C010', 'Ambulatorio de Quibor', 'Quibor', '02534789654', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=100 ;

--
-- Volcado de datos para la tabla `centros_especialidades`
--

INSERT INTO `centros_especialidades` (`id`, `centros_id`, `especialidades_id`, `status`) VALUES
(5, 19, 2, 1),
(6, 19, 3, 1),
(7, 20, 1, 1),
(9, 20, 3, 1),
(10, 20, 4, 1),
(11, 21, 1, 1),
(12, 21, 2, 1),
(13, 21, 3, 1),
(14, 21, 4, 1),
(15, 22, 1, 1),
(16, 23, 1, 1),
(17, 24, 1, 1),
(18, 25, 1, 1),
(19, 26, 1, 1),
(20, 27, 1, 1),
(21, 28, 1, 1),
(22, 29, 1, 1),
(23, 29, 2, 1),
(24, 29, 3, 1),
(25, 29, 4, 1),
(26, 31, 1, 1),
(27, 31, 2, 1),
(28, 31, 3, 1),
(29, 31, 4, 1),
(61, 0, 3, 1),
(62, 0, 4, 1),
(92, 32, 1, 1),
(93, 32, 2, 1),
(94, 5, 1, 1),
(95, 5, 2, 1),
(96, 5, 4, 1),
(98, 1, 1, 1),
(99, 10, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `codigo`, `nombre`, `status`, `observacion`) VALUES
(1, 'ES001', 'Cardiologia', 1, ''),
(2, 'ES002', 'Traumatologia', 1, ''),
(3, 'ES003', 'Ginecologia', 1, ''),
(4, 'ES004', 'Pedriatia', 0, 'AQUI'),
(5, 'ES009', 'Neurologia', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE IF NOT EXISTS `operaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `centro_id` int(11) NOT NULL COMMENT 'el id del centro de salud',
  `usuario_id_solicitud` int(11) NOT NULL COMMENT 'el id de usuario del que solicito la cama',
  `fecha_solicitud` datetime NOT NULL COMMENT 'fecha en la que se solicito la cama',
  `observacion_solicitud` varchar(100) CHARACTER SET utf8 DEFAULT 'Sin Observaciones' COMMENT 'observacion de la operacion de solicitud de cama',
  `usuario_id_asignacion` int(11) DEFAULT NULL COMMENT 'id del usuario que realizo el asignacion de cama',
  `fecha_asignacion` datetime DEFAULT NULL COMMENT 'fecha en la que se asigno la cama',
  `observacion_asignacion` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL COMMENT 'observacion de la operacion de asignacion de cama',
  `usuario_id_cancelacion` int(11) DEFAULT NULL COMMENT 'id del usuario que realizo la cancelacion de cama (por ejemplo, si no se llega a concretar la asignacion de cama por cualquier motivo)\n',
  `fecha_cancelacion` datetime DEFAULT NULL,
  `observacion_cancelacion` varchar(100) COLLATE utf8_spanish2_ci DEFAULT 'Sin Observaciones',
  `status_operacion` int(11) DEFAULT '1' COMMENT '1-> cama solicitada\n2-> cama asignada\n3-> solicitud cancelada',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`id`, `centro_id`, `usuario_id_solicitud`, `fecha_solicitud`, `observacion_solicitud`, `usuario_id_asignacion`, `fecha_asignacion`, `observacion_asignacion`, `usuario_id_cancelacion`, `fecha_cancelacion`, `observacion_cancelacion`, `status_operacion`) VALUES
(1, 1, 2, '2017-02-07 10:02:05', 'fractura craneocefaica.... etc', 3, '2017-02-07 10:02:32', 'ingreso', 0, '0000-00-00 00:00:00', 'Sin Observaciones', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `cedula`, `nombre`, `direccion`, `telefono`, `status`, `Observaciones`) VALUES
(1, '20188138', 'Jancarlos Alarcon', 'Cabudare', '5478546', 1, 'Sin Observaciones'),
(2, '15228704', 'Janluis Alarcon', 'Cabudare', '654789', 1, 'Sin Observaciones'),
(3, '15093409', 'Yaranelly Alvarado', 'Quibor', '64785214', 1, 'Sin Observaciones'),
(25, '123456', 'Junior Segarra', 'Barquisimeto', '042684288811', 1, 'Sin Observaciones'),
(26, '23001112', 'Isabel Ortegana', 'Carora', '042675341444', 1, 'Sin Observaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcionistas_centros`
--

CREATE TABLE IF NOT EXISTS `recepcionistas_centros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `centro_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `observacion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `recepcionistas_centros`
--

INSERT INTO `recepcionistas_centros` (`id`, `usuario_id`, `centro_id`, `status`, `observacion`) VALUES
(1, 3, 1, 1, ''),
(2, 25, 2, 1, ''),
(3, 26, 5, 1, '');

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
  `status` int(11) DEFAULT '1',
  `observaciones` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `persona_id`, `usuario`, `password`, `perfil_id`, `status`, `observaciones`) VALUES
(1, 1, 'root', '1234', 1, 1, ''),
(2, 2, 'paramedico', '1234', 2, 1, ''),
(3, 3, 'recepcionista1', '1234', 3, 1, ''),
(25, 25, 'recepcionista2', '1234', 3, 1, ''),
(26, 26, 'recepcionista3', '1234', 3, 1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
