-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2020 a las 16:29:39
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito`
--
CREATE DATABASE IF NOT EXISTS `carrito` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `carrito`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `ID` int(11) NOT NULL,
  `IDPedido` int(11) NOT NULL,
  `IDProducto` int(11) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`ID`, `IDPedido`, `IDProducto`, `Precio`, `Cantidad`) VALUES
(4, 1, 2, 800, 1),
(12, 7, 1, 1000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `ID` int(11) NOT NULL,
  `Pedido` varchar(255) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Direccion` varchar(75) NOT NULL,
  `Barrio` varchar(45) NOT NULL,
  `Ciudad` varchar(45) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Total` int(11) NOT NULL,
  `Status` varchar(45) NOT NULL DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`ID`, `Pedido`, `Nombre`, `Telefono`, `Direccion`, `Barrio`, `Ciudad`, `Fecha`, `Total`, `Status`) VALUES
(1, 'q33iea4mp59irb9qfvehblhfbo', 'jeison', 2147483647, 'calle 5 n 23a-36', 'alameda', 'tulua', '2020-11-23 19:46:48', 800, 'Pendiente'),
(7, '7a57rgpac8louvhjnsh51uin2e', 'Johan', 321499999, 'calle 5 n 23a-36', 'alameda', 'tulua', '2020-11-24 00:30:51', 1000, 'Enviado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Descripcion` text NOT NULL,
  `Imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID`, `Nombre`, `Precio`, `Descripcion`, `Imagen`) VALUES
(1, 'empanadas', 1000, 'empanadas de posho con carne', 'https://www.colture.co/wp-content/uploads/2018/10/colombian-gastronomy.jpg'),
(2, 'cafe', 800, 'rico cafe con leche', 'https://tse3.mm.bing.net/th?id=OIP.cPUJ0Ah4UPN2zupCxbMdLQHaHa&pid=Api'),
(3, 'Buñuelos', 500, 'Buñuelo de queso', 'https://1.bp.blogspot.com/-IzO4SOECG0I/U_tTlOJOjII/AAAAAAAAAIs/EYjrJXJiZ-o/s1600/IMG_2858%2Bcopy.jpg'),
(5, 'Avena', 500, 'Avena jugosa', 'https://cdn2.cocinadelirante.com/sites/default/files/styles/gallerie/public/images/2018/07/leche-de-avena-casera-rapida.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `UsuarioId` int(11) NOT NULL,
  `Usuario` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UsuarioId`, `Usuario`, `Password`) VALUES
(1, 'admin', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDPedido` (`IDPedido`),
  ADD KEY `IDProducto` (`IDProducto`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`IDPedido`) REFERENCES `pedido` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallepedido_ibfk_2` FOREIGN KEY (`IDProducto`) REFERENCES `producto` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
