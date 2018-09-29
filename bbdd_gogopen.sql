/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : bbdd_gogopen

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-09-22 20:49:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for adjuntos
-- ----------------------------
DROP TABLE IF EXISTS `adjuntos`;
CREATE TABLE `adjuntos` (
  `codigo` int(11) NOT NULL,
  `tipo_doc` varchar(255) DEFAULT NULL,
  `num_doc` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `contenido` varchar(255) DEFAULT NULL,
  `firma` int(1) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adjuntos
-- ----------------------------

-- ----------------------------
-- Table structure for casos
-- ----------------------------
DROP TABLE IF EXISTS `casos`;
CREATE TABLE `casos` (
  `cod_caso` int(11) NOT NULL,
  `tipo_contador` varchar(1) NOT NULL,
  `cod_cliente` int(11) DEFAULT NULL,
  `fecha_inicio` varchar(255) DEFAULT NULL,
  `fecha_fin` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `facturado` int(1) DEFAULT NULL,
  `cod_usuario` int(11) DEFAULT NULL,
  `cod_tip_asistencia` int(11) DEFAULT NULL,
  `resolucion` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`tipo_contador`,`cod_caso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of casos
-- ----------------------------

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `cif` varchar(255) NOT NULL,
  `denominacion` varchar(255) DEFAULT NULL,
  `nombre_comercial` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `cod_postal` int(5) DEFAULT NULL,
  `cod_provincia` int(11) DEFAULT NULL,
  `cod_poblacion` int(11) DEFAULT NULL,
  `activado` int(1) DEFAULT NULL,
  PRIMARY KEY (`cif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clientes
-- ----------------------------

-- ----------------------------
-- Table structure for contadores
-- ----------------------------
DROP TABLE IF EXISTS `contadores`;
CREATE TABLE `contadores` (
  `docu` varchar(255) NOT NULL,
  `tipo` char(1) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  PRIMARY KEY (`docu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contadores
-- ----------------------------
INSERT INTO `contadores` VALUES ('casos', 'C', '1800000');
INSERT INTO `contadores` VALUES ('partes', 'P', '1800000');

-- ----------------------------
-- Table structure for partes
-- ----------------------------
DROP TABLE IF EXISTS `partes`;
CREATE TABLE `partes` (
  `tipo_parte` varchar(1) NOT NULL,
  `cod_parte` int(11) NOT NULL,
  `tipo_caso` varchar(1) DEFAULT NULL,
  `cod_caso` int(11) DEFAULT NULL,
  `cod_tecnico` int(11) DEFAULT NULL,
  `mantenimiento` binary(255) DEFAULT NULL,
  `fecha_inicio` varchar(255) DEFAULT NULL,
  `fecha_fin` varchar(255) DEFAULT NULL,
  `actuacion` longtext,
  `notas` longtext,
  PRIMARY KEY (`tipo_parte`,`cod_parte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of partes
-- ----------------------------

-- ----------------------------
-- Table structure for resol_predefinida
-- ----------------------------
DROP TABLE IF EXISTS `resol_predefinida`;
CREATE TABLE `resol_predefinida` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cod_tipo_asistencia` char(3) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `especializada` binary(255) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of resol_predefinida
-- ----------------------------

-- ----------------------------
-- Table structure for tblresetpass
-- ----------------------------
DROP TABLE IF EXISTS `tblresetpass`;
CREATE TABLE `tblresetpass` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblresetpass
-- ----------------------------
INSERT INTO `tblresetpass` VALUES ('7', 'jdebada@grupo-open.es', '', '2018-09-22 17:03:05');
INSERT INTO `tblresetpass` VALUES ('8', 'jdebada@grupo-open.es', 'e2e32f63506ca3f6a5cd332cdc425fd53fe154e8a7f548f4128eb0c42433c3c9', '2018-09-22 17:06:50');

-- ----------------------------
-- Table structure for tipo_asistencia
-- ----------------------------
DROP TABLE IF EXISTS `tipo_asistencia`;
CREATE TABLE `tipo_asistencia` (
  `codigo` char(3) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_asistencia
-- ----------------------------

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(255) NOT NULL DEFAULT '',
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `cod_cliente` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `movil` varchar(255) DEFAULT NULL,
  `tecnico` int(1) DEFAULT NULL,
  `notificaciones` int(1) DEFAULT NULL,
  `activado` int(1) DEFAULT NULL,
  `bloqueado` int(1) DEFAULT NULL,
  `admin_empresa` int(1) DEFAULT NULL,
  `admin` int(1) DEFAULT NULL,
  PRIMARY KEY (`cod_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('2', 'jdebada@grupo-open.es', 'Jonathan', 'Debada', '0', '1718c24b10aeb8099e3fc44960ab6949ab76a267352459f203ea1036bec382c2', '667470596', '1', '1', '1', '0', '0', '1');

-- ----------------------------
-- Event structure for Eliminacion_token
-- ----------------------------
DROP EVENT IF EXISTS `Eliminacion_token`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` EVENT `Eliminacion_token` ON SCHEDULE AT '2018-09-22 11:57:37' ON COMPLETION PRESERVE DISABLE DO DELETE FROM tblresetpass WHERE creado <= DATE_SUB(CURTIME(), INTERVAL 10 MINUTE)
;;
DELIMITER ;
