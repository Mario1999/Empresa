-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-08-2016 a las 02:25:15
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint(30) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `telefono` int(25) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `correo`, `telefono`, `direccion`) VALUES
(46727, 'Mario Jose Portillo Aguilar', 'mariojosepa@gmail.com', 97027188, 'ocotepeque honduras'),
(58450, 'Allan Josue Aquino Gabarrete', 'allan@gmail.com', 32925927, 'Antigua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE IF NOT EXISTS `detalle` (
  `codfact` varchar(50) NOT NULL,
  `cantidad` bigint(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  KEY `codfact` (`codfact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `detalle`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `num` varchar(30) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `rtn` bigint(30) NOT NULL,
  `fecha` date NOT NULL,
  `pago` varchar(30) NOT NULL,
  `subtotal` double NOT NULL,
  `impuesto` double NOT NULL,
  `descuento` double DEFAULT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `factura`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `codigo` varchar(30) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `existencias` int(20) NOT NULL,
  `precioc` int(20) NOT NULL,
  `preciov` int(20) NOT NULL,
  `estante` varchar(25) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `nombre`, `existencias`, `precioc`, `preciov`, `estante`) VALUES
('22508', 'Hacha', 200, 190, 250, '3'),
('86625', 'Pala', 200, 100, 123, '8'),
('70082', 'Martillo', 200, 65, 90, '5'),
('79483', 'Despulpadora de cafe', 40, 3500, 4250, '1'),
('74003', 'Planta electrica pequeÃ±a', 25, 500, 6224, '2'),
('97057', 'Cemento', 300, 150, 190, '3'),
('48985', 'Varilla Galvanizada', 500, 130, 196, '4'),
('76962', 'Platina 3/4', 500, 120, 160, '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usrnombre` varchar(70) NOT NULL,
  `usrlogin` varchar(50) NOT NULL,
  `usrclave` varchar(50) NOT NULL,
  `foto` varchar(150) NOT NULL,
  KEY `usrnombre` (`usrnombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usrnombre`, `usrlogin`, `usrclave`, `foto`) VALUES
('mariojosepa@gmail.com', 'admin', 'admin', 'usuarios/admin.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
