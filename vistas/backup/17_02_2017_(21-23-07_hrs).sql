SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS sgmdb;

USE sgmdb;

DROP TABLE IF EXISTS bitacora;

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `operacion` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `observacion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

INSERT INTO bitacora VALUES("27","1","Inicio de Sesion","2017-02-07 09:02:35","1","");
INSERT INTO bitacora VALUES("28","2","Inicio de Sesion","2017-02-07 10:02:38","1","");
INSERT INTO bitacora VALUES("29","2","Se solicito cama ","2017-02-07 10:02:05","1","");
INSERT INTO bitacora VALUES("30","3","Inicio de Sesion","2017-02-07 10:02:36","1","");
INSERT INTO bitacora VALUES("31","3","Se edito el centro Clinica Avila","2017-02-07 10:02:11","1","");
INSERT INTO bitacora VALUES("32","3","Asigna cama","2017-02-07 10:02:32","1","");
INSERT INTO bitacora VALUES("33","3","Se edito el centro Clinica Avila","2017-02-07 10:02:54","1","");
INSERT INTO bitacora VALUES("34","1","Inicio de Sesion","2017-02-07 10:02:21","1","");
INSERT INTO bitacora VALUES("35","1","Se creo especialidad: Neurologia","2017-02-07 10:02:09","1","");
INSERT INTO bitacora VALUES("36","1","Se edito el centro Clinica Rasetti","2017-02-07 10:02:48","1","");
INSERT INTO bitacora VALUES("37","1","Inicio de Sesion","2017-02-07 11:02:59","1","");
INSERT INTO bitacora VALUES("38","1","Inicio de Sesion","2017-02-14 18:02:30","1","");
INSERT INTO bitacora VALUES("39","1","Inicio de Sesion","2017-02-14 23:02:57","1","");
INSERT INTO bitacora VALUES("40","1","Inicio de Sesion","2017-02-16 20:02:58","1","");
INSERT INTO bitacora VALUES("41","1","Inicio de Sesion","2017-02-16 21:02:59","1","");
INSERT INTO bitacora VALUES("42","1","Inicio de Sesion","2017-02-17 20:02:02","1","");



DROP TABLE IF EXISTS centros;

CREATE TABLE `centros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `camas` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO centros VALUES("1","C001","Clinica Avila","Zona Centro, Carora","0251478965","14");
INSERT INTO centros VALUES("2","C002","Hospital 002","Barquisimeto","465464","2");
INSERT INTO centros VALUES("5","CE004","Ambulatorio de Cabudare","Cabudare Centro","6478954","10");
INSERT INTO centros VALUES("7","C005","Policlinica de Cabudare","Cabudare","4567411257","100");
INSERT INTO centros VALUES("10","C006","Clinica Rasetti","Barquisimeto","555-78547","13");
INSERT INTO centros VALUES("19","C007","Clinica XYZ","Cabudare","979224585","5");
INSERT INTO centros VALUES("20","C008","Clinica Alemana","Quilicura","4447-6587","4");
INSERT INTO centros VALUES("21","C009","Clinica IDET","Barquisimeto","0251547898","8");
INSERT INTO centros VALUES("22","C010","Ambulatorio de Quibor","Quibor","02534789654","1");



DROP TABLE IF EXISTS centros_especialidades;

CREATE TABLE `centros_especialidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `centros_id` int(11) NOT NULL,
  `especialidades_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO centros_especialidades VALUES("5","19","2","1");
INSERT INTO centros_especialidades VALUES("6","19","3","1");
INSERT INTO centros_especialidades VALUES("7","20","1","1");
INSERT INTO centros_especialidades VALUES("9","20","3","1");
INSERT INTO centros_especialidades VALUES("10","20","4","1");
INSERT INTO centros_especialidades VALUES("11","21","1","1");
INSERT INTO centros_especialidades VALUES("12","21","2","1");
INSERT INTO centros_especialidades VALUES("13","21","3","1");
INSERT INTO centros_especialidades VALUES("14","21","4","1");
INSERT INTO centros_especialidades VALUES("15","22","1","1");
INSERT INTO centros_especialidades VALUES("16","23","1","1");
INSERT INTO centros_especialidades VALUES("17","24","1","1");
INSERT INTO centros_especialidades VALUES("18","25","1","1");
INSERT INTO centros_especialidades VALUES("19","26","1","1");
INSERT INTO centros_especialidades VALUES("20","27","1","1");
INSERT INTO centros_especialidades VALUES("21","28","1","1");
INSERT INTO centros_especialidades VALUES("22","29","1","1");
INSERT INTO centros_especialidades VALUES("23","29","2","1");
INSERT INTO centros_especialidades VALUES("24","29","3","1");
INSERT INTO centros_especialidades VALUES("25","29","4","1");
INSERT INTO centros_especialidades VALUES("26","31","1","1");
INSERT INTO centros_especialidades VALUES("27","31","2","1");
INSERT INTO centros_especialidades VALUES("28","31","3","1");
INSERT INTO centros_especialidades VALUES("29","31","4","1");
INSERT INTO centros_especialidades VALUES("61","0","3","1");
INSERT INTO centros_especialidades VALUES("62","0","4","1");
INSERT INTO centros_especialidades VALUES("92","32","1","1");
INSERT INTO centros_especialidades VALUES("93","32","2","1");
INSERT INTO centros_especialidades VALUES("94","5","1","1");
INSERT INTO centros_especialidades VALUES("95","5","2","1");
INSERT INTO centros_especialidades VALUES("96","5","4","1");
INSERT INTO centros_especialidades VALUES("98","1","1","1");
INSERT INTO centros_especialidades VALUES("99","10","1","1");



DROP TABLE IF EXISTS especialidades;

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `observacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO especialidades VALUES("1","ES001","Cardiologia","1","");
INSERT INTO especialidades VALUES("2","ES002","Traumatologia","1","");
INSERT INTO especialidades VALUES("3","ES003","Ginecologia","1","");
INSERT INTO especialidades VALUES("4","ES004","Pedriatia","0","AQUI");
INSERT INTO especialidades VALUES("5","ES009","Neurologia","0","");



DROP TABLE IF EXISTS operaciones;

CREATE TABLE `operaciones` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO operaciones VALUES("1","1","2","2017-02-07 10:02:05","fractura craneocefaica.... etc","3","2017-02-07 10:02:32","ingreso","0","0000-00-00 00:00:00","Sin Observaciones","2");



DROP TABLE IF EXISTS perfiles;

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `observacion` varchar(45) COLLATE utf8_spanish_ci DEFAULT 'Sin Observaciones',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO perfiles VALUES("1","administrador","1","Sin Observaciones");
INSERT INTO perfiles VALUES("2","paramedico","1","Sin Observaciones");
INSERT INTO perfiles VALUES("3","recepcionista","1","Sin Observaciones");



DROP TABLE IF EXISTS personas;

CREATE TABLE `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `Observaciones` varchar(45) COLLATE utf8_spanish_ci DEFAULT 'Sin Observaciones',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO personas VALUES("1","20188138","Jancarlos Alarcon","Cabudare","5478546","1","Sin Observaciones");
INSERT INTO personas VALUES("2","15228704","Janluis Alarcon","Cabudare","654789","1","Sin Observaciones");
INSERT INTO personas VALUES("3","15093409","Yaranelly Alvarado","Quibor","64785214","1","Sin Observaciones");
INSERT INTO personas VALUES("25","123456","Junior Segarra","Barquisimeto","042684288811","1","Sin Observaciones");
INSERT INTO personas VALUES("26","23001112","Isabel Ortegana","Carora","042675341444","1","Sin Observaciones");



DROP TABLE IF EXISTS recepcionistas_centros;

CREATE TABLE `recepcionistas_centros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `centro_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `observacion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO recepcionistas_centros VALUES("1","3","1","1","");
INSERT INTO recepcionistas_centros VALUES("2","25","2","1","");
INSERT INTO recepcionistas_centros VALUES("3","26","5","1","");



DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `persona_id` int(11) NOT NULL,
  `usuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  `observaciones` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO usuarios VALUES("1","1","root","1234","1","1","");
INSERT INTO usuarios VALUES("2","2","paramedico","1234","2","1","");
INSERT INTO usuarios VALUES("3","3","recepcionista1","1234","3","1","");
INSERT INTO usuarios VALUES("25","25","recepcionista2","1234","3","1","");
INSERT INTO usuarios VALUES("26","26","recepcionista3","1234","3","1","");



SET FOREIGN_KEY_CHECKS=1;