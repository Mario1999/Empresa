-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2016 a las 20:11:37
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ferreteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(30) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `telefono` int(25) NOT NULL,
  `direccion` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `codfact` varchar(50) NOT NULL,
  `cantidad` bigint(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `num` varchar(30) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `rtn` bigint(30) NOT NULL,
  `fecha` date NOT NULL,
  `subtotal` double NOT NULL,
  `impuesto` double NOT NULL,
  `descuento` double DEFAULT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo` varchar(30) NOT NULL,
  `nombre` varchar(70) CHARACTER SET utf8 COLLATE utf8_slovenian_ci NOT NULL,
  `existencias` int(20) NOT NULL,
  `precioc` int(20) NOT NULL,
  `preciov` int(20) NOT NULL,
  `estante` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `nombre`, `existencias`, `precioc`, `preciov`, `estante`) VALUES
('22508', 'Hacha', 200, 180, 240, '3'),
('86625', 'Pala', 200, 100, 123, '8'),
('70082', 'Martillo', 200, 65, 90, '5'),
('79483', 'Despulpadora de cafe', 50, 3500, 4250, '1'),
('74003', 'Planta electrica', 20, 500, 6224, '2'),
('97057', 'Cemento', 300, 150, 190, '3'),
('48985', 'Varilla Galvanizada', 500, 130, 196, '4'),
('76962', 'Platina 3/4', 500, 120, 160, '5'),
('07054', 'Tubo 3/4', 300, 150, 220, '10'),
('64205', 'Plana', 100, 100, 180, '4'),
('34370', 'Cuchara de repello', 200, 180, 250, '7'),
('55770', 'Tubo 4 pulgadas', 200, 200, 280, '8'),
('94390', 'Tanque de 1000 galones', 50, 1000, 1300, '9'),
('87980', 'Servicio sanitario', 20, 1200, 1400, '25'),
('24799', 'Galon de pintura azul protecto', 30, 1000, 1400, '15'),
('63742', 'Piochas', 100, 100, 160, '18'),
('00950', 'Valvulas', 45, 50, 70, '5'),
('73398', 'Llaves de agua potable', 90, 60, 90, '13'),
('56822', 'Llaves ajustables', 100, 80, 100, '8'),
('68785', 'Llantas de bicicleta #24', 50, 80, 120, '11'),
('07598', 'Barras', 30, 90, 160, '4'),
('58890', 'Metros', 60, 30, 50, '10'),
('80376', 'Almagana', 30, 150, 170, '9'),
('95306', 'Alicate', 50, 60, 80, '4'),
('99348', 'Tenaza', 80, 100, 170, '5'),
('00867', 'Desatornilladores phillips', 100, 60, 100, '3'),
('33250', 'Galon de pintura blanca protecto', 50, 1000, 1600, '17'),
('06607', 'Roseta para foco', 100, 50, 90, '13'),
('63898', 'ExtensiÃ³n 3 metros ', 100, 60, 80, '5'),
('89947', 'Alambre de amarre ', 200, 50, 70, '9'),
('35539', 'Cincel', 80, 70, 100, '10'),
('70955', 'Segueta', 50, 60, 120, '19'),
('66570', 'Moto sierra', 10, 3000, 4000, '16'),
('56950', 'Machetes', 50, 150, 170, '6'),
('98026', 'Bomba de bicicleta', 45, 25, 35, '5'),
('38652', 'Nivel', 45, 150, 180, '12'),
('92276', 'Chancha', 40, 200, 220, '2'),
('70678', 'Llavines', 32, 150, 180, '13'),
('80978', 'Tomacorriente', 45, 50, 90, '12'),
('93325', 'Alambre puas', 40, 40, 60, '7'),
('34636', 'Balanzas', 34, 130, 150, '2'),
('04469', 'Pecheras', 23, 100, 130, '5'),
('00929', 'basculas ', 26, 100, 120, '8'),
('06606', 'Pulidoras', 34, 450, 600, '1'),
('32782', 'Clavo de una pulgada', 5000, 1, 2, '4'),
('34674', 'Brocha', 80, 50, 70, '5'),
('53292', 'candil', 12, 50, 70, '3'),
('30820', 'Foto recargable', 34, 150, 180, '4'),
('02798', 'Switch', 45, 45, 70, '3'),
('36372', 'Cubos', 100, 30, 50, '11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usrnombre` varchar(70) NOT NULL,
  `usrlogin` varchar(50) NOT NULL,
  `usrclave` varchar(50) NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usrnombre`, `usrlogin`, `usrclave`, `foto`) VALUES
('Administrador', 'admin', 'admin', 'usuarios/admin.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD KEY `codfact` (`codfact`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`num`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD KEY `usrnombre` (`usrnombre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
