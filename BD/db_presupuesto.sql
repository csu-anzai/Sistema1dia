-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-09-2019 a las 20:16:50
-- Versión del servidor: 10.4.7-MariaDB-log
-- Versión de PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_presupuesto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalacion`
--

CREATE TABLE `instalacion` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `precioporunidad` decimal(6,2) DEFAULT NULL,
  `Pasaje` decimal(6,2) DEFAULT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `preciocompra` decimal(6,2) DEFAULT NULL,
  `precioventa` decimal(6,2) DEFAULT NULL,
  `ganancia` decimal(6,2) DEFAULT NULL,
  `id_tipo` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id`, `nombre`, `detalle`, `preciocompra`, `precioventa`, `ganancia`, `id_tipo`, `foto`) VALUES
(7, 'material 1', 'detalle 1', '20.00', '60.00', '40.00', 3, 'alejandro-toledo-manrique.jpg'),
(12, 'mterial 2', 'detalle 2', '10.00', '30.00', '20.00', 4, '30409170.jpg'),
(13, 'prueba', 'gg', '20.00', '100.00', '80.00', 3, 'codigo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `preciocompra` decimal(6,2) DEFAULT NULL,
  `precioventa` decimal(6,2) DEFAULT NULL,
  `ganancia` decimal(6,2) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `detalle`, `preciocompra`, `precioventa`, `ganancia`, `foto`, `id_tipo`) VALUES
(1, 'Disco Duro Solido 240gb Kingston Ssd A400', 'Factor de forma: 2.5\"\nInterfaz:\nSATA Rev. 3.0 (6 Gb/s), compatible con SATA Rev. 2.0 (3 Gb/s)', '26.00', '104.00', '78.00', 'discoduro.jpg', 2),
(2, 'Samsung 5 500 Gb Ssd Disco Sólido Externo 540 ', 'Con una memoria flash V-NAND y un Puerto USB 3.1 Gen 2', '207.00', '442.00', '235.00', 'disc.jpg', 2),
(15, 'Teclado Mecanico Antryx Zigra Mk Blue/red Switch', 'Interruptor mecánico en dos presentaciones Outemu Blue y Outemu Red', '200.00', '250.00', '50.00', 'teclado.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proforma`
--

CREATE TABLE `proforma` (
  `id_producto` int(11) DEFAULT NULL,
  `id_instalacion` int(11) DEFAULT NULL,
  `id_materiales` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoinstalacion`
--

CREATE TABLE `tipoinstalacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `detalle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomaterial`
--

CREATE TABLE `tipomaterial` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `detalle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipomaterial`
--

INSERT INTO `tipomaterial` (`id`, `nombre`, `detalle`) VALUES
(3, 'tipo material 1', 'detalle 1'),
(4, 'tipo material 2', 'detalle 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproducto`
--

CREATE TABLE `tipoproducto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoproducto`
--

INSERT INTO `tipoproducto` (`id`, `nombre`, `detalle`) VALUES
(2, 'Disco Duro', ' Disco con una gran capacidad de almacenamiento'),
(3, 'Teclados', 'Dispositivo o periférico de entrada, en parte inspirado en el teclado de las máquinas de escribir'),
(4, 'Monitor', ':v para ver en hd 4k curvo'),
(5, 'Lectora', 'para leer ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user` varchar(25) DEFAULT NULL,
  `clave` varchar(120) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `clave`, `nombre`, `tipo`) VALUES
(1, 'baruc', '202cb962ac59075b964b07152d234b70', 'Joaquin Garcia, Baruc', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `instalacion`
--
ALTER TABLE `instalacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `tipoinstalacion`
--
ALTER TABLE `tipoinstalacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipomaterial`
--
ALTER TABLE `tipomaterial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `instalacion`
--
ALTER TABLE `instalacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tipoinstalacion`
--
ALTER TABLE `tipoinstalacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipomaterial`
--
ALTER TABLE `tipomaterial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `instalacion`
--
ALTER TABLE `instalacion`
  ADD CONSTRAINT `instalacion_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipoinstalacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipomaterial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipoproducto` (`id`);
COMMIT;

ALTER TABLE `producto` ADD CONSTRAINT id_tipo FOREIGN KEY(id) REFERENCES `tipoproducto` (`id`);
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
