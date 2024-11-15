-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2024 a las 13:19:17
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `marketproyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idCarrito` int(4) NOT NULL,
  `idProducto` int(6) NOT NULL,
  `nlinea` int(2) NOT NULL,
  `cantidad` int(3) NOT NULL,
  `precioUnidad` int(4) NOT NULL,
  `precioTotal` int(4) NOT NULL,
  `idCliente` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` varchar(9) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `email` varchar(75) NOT NULL,
  `pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombre`, `direccion`, `email`, `pwd`) VALUES
('1', 'Admin', 'Avda Correos 132', 'admin@midominio.es', 'Admin\r\n'),
('10', 'Victor', 'Avda Correos 132', 'victor@midominio.es', 'Victor'),
('15', 'Laura', 'C/ Admin', 'admin@gmail.com', 'Laura'),
('44444444', 'Marta', 'C/ Valeras 4', 'marta@midominio.es', 'Marta'),
('7777777', 'Miguel', 'C/Santoña15', 'manuel@midominio.es', 'Miguel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineaspedidos`
--

CREATE TABLE `lineaspedidos` (
  `idPedido` int(4) NOT NULL,
  `nlinea` int(2) NOT NULL,
  `idProducto` int(6) DEFAULT NULL,
  `cantidad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `lineaspedidos`
--

INSERT INTO `lineaspedidos` (`idPedido`, `nlinea`, `idProducto`, `cantidad`) VALUES
(1, 1, 2, 5),
(1, 2, 1, 3),
(1, 3, 3, 3),
(1, 4, 4, 3),
(2, 1, 5, 10),
(2, 2, 7, 10),
(5, 1, 5, 3),
(5, 2, 5, 3),
(5, 3, 2, 4),
(5, 4, 9, 4),
(6, 1, 1, 3),
(6, 2, 7, 2),
(6, 3, 9, 2),
(6, 4, 6, 200),
(10, 1, 6, 2),
(10, 2, 1, 2),
(10, 3, 9, 4),
(10, 4, 4, 10),
(11, 1, 11, 200),
(12, 1, 2, 3),
(12, 2, 9, 2),
(12, 3, 5, 10),
(12, 4, 4, 1),
(13, 1, 8, 3),
(13, 2, 9, 3),
(13, 3, 1, 200),
(13, 4, 3, 4),
(13, 5, 4, 10),
(14, 1, 1, 1),
(14, 2, 7, 1),
(14, 3, 8, 4),
(15, 1, 3, 1),
(15, 2, 5, 3),
(120, 1, 1, 6),
(555, 1, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `dirEntrega` varchar(50) NOT NULL,
  `nTarjeta` varchar(50) DEFAULT NULL,
  `idCliente` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `fecha`, `dirEntrega`, `nTarjeta`, `idCliente`) VALUES
(1, '1111-01-01', 'C/ Valeras, 22', '111111', '10'),
(2, '2021-11-16', 'C/ Princesa, 15', '333333', '10'),
(5, '2020-11-09', '', NULL, '10'),
(6, '1010-11-16', '', NULL, '10'),
(10, '2020-11-17', '', NULL, '15'),
(11, '2020-11-17', '', NULL, '32'),
(12, '2020-11-18', '', NULL, '15'),
(13, '2020-11-19', '', NULL, '10'),
(14, '2020-11-23', '', NULL, '10'),
(15, '2020-11-23', '', NULL, '10'),
(120, '1970-01-01', '', NULL, '1'),
(555, '1970-01-01', '', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(6) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `unidades` int(5) NOT NULL,
  `precio` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombre`, `foto`, `unidades`, `precio`) VALUES
(1, 'Macarrones', 'macarrones.jpg', 100, 1),
(2, 'Tallarines', 'tallarines.jpg', 100, 1),
(3, 'Atun', 'atun.jpg', 100, 1),
(4, 'Sardinillas', 'sardinas.jpg', 100, 1),
(5, 'Mejillones', 'mejillones.jpg', 100, 1),
(6, 'Fideos', 'fideos.jpg', 100, 1),
(7, 'Galletas Cuadradas', 'galletas.jpg', 100, 1),
(8, 'Barquillos', 'barquillos.jpg', 100, 1),
(9, 'Leche entera', 'leche.jpg', 100, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idCarrito`),
  ADD UNIQUE KEY `idProducto` (`idProducto`,`nlinea`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `lineaspedidos`
--
ALTER TABLE `lineaspedidos`
  ADD PRIMARY KEY (`idPedido`,`nlinea`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
