

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL,
  `motivo_reunion` varchar(1000) DEFAULT NULL,
  `apuntes` varchar(1000) DEFAULT NULL,
  `fecha_reunion` datetime DEFAULT NULL UNIQUE, 
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



-- INSERT INTO `events` (`nombre`, `apellido`, `empresa`, `telefono`, `motivo_reunion`, `apuntes`, `fecha_reunion`) VALUES
-- ('Nombre1', 'Apellido1', 'Empresa1', '111222111', 'Motivo1', 'Lorem ipsum dolor, magna aliqua.1', '2019-05-21'),
-- ('Nombre2', 'Apellido2', 'Empresa2', '111222222', 'Motivo2', 'Lorem ipsum dolor, magna aliqua.2', '2019-05-30'),
-- ('Nombre3', 'Apellido3', 'Empresa3', '111222333', 'Motivo3', 'Lorem ipsum dolor, magna aliqua.3', '2019-05-23'),
-- ('Nombre4', 'Apellido4', 'Empresa4', '111222444', 'Motivo4', 'Lorem ipsum dolor, magna aliqua.4', '2019-05-17'),
-- ('Nombre5', 'Apellido5', 'Empresa5', '111222555', 'Motivo5', 'Lorem ipsum dolor, magna aliqua.5', '2019-05-17'),
-- ('Nombre6', 'Apellido6', 'Empresa6', '111222666', 'Motivo6', 'Lorem ipsum dolor, magna aliqua.6', '2019-05-17'),
-- ('Nombre7', 'Apellido7', 'Empresa7', '111222777', 'Motivo7', 'Lorem ipsum dolor, magna aliqua.7', '2019-05-17'),
-- ('Nombre8', 'Apellido8', 'Empresa8', '111222888', 'Motivo8', 'Lorem ipsum dolor, magna aliqua.8', '2019-05-17'),
-- ('Nombre9', 'Apellido9', 'Empresa9', '111222999', 'Motivo9', 'Lorem ipsum dolor, magna aliqua.9', '2019-09-12');
-- COMMIT;


