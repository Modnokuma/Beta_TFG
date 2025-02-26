-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2025 a las 23:59:31
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Test_BD`
--

-- --------------------------------------------------------
--
-- DAMOS PERMISO USO Y BORRAMOS EL USUARIO QUE QUEREMOS CREAR POR SI EXISTE
DROP USER IF EXISTS `dani`@`localhost`;

--
-- CREAMOS EL USUARIO Y LE DAMOS PASSWORD, DAMOS PERMISO DE USO Y DAMOS PERMISOS SOBRE LA BASE DE DATOS.
--
CREATE USER IF NOT EXISTS `dani`@`localhost` IDENTIFIED BY 'dani';
GRANT USAGE ON *.* TO `dani`@`localhost` REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `Test_BD`.* TO `dani`@`localhost` WITH GRANT OPTION;

--
-- Base de datos: `Test_BD`
--
DROP DATABASE IF EXISTS `Test_BD`;
CREATE DATABASE IF NOT EXISTS `Test_BD` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Test_BD`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_observacion`
--

CREATE TABLE `item_observacion` (
  `id_item_observacion` int(11) NOT NULL,
  `id_observacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;




-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metadato_proyecto`
--

CREATE TABLE `metadato_proyecto` (
  `id_metadato_proyecto` int(11) NOT NULL,
  `nombre_metadato_proyecto` varchar(48) NOT NULL,
  `descripcion_metadato_proyecto` varchar(200) NOT NULL,
  `tipo_metadato_proyecto` varchar(48) NOT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion`
--

CREATE TABLE `observacion` (
  `id_observacion` int(11) NOT NULL,
  `nombre_observacion` varchar(45) NOT NULL,
  `descripcion_observacion` varchar(200) NOT NULL,
  `fecha_observacion` date NOT NULL,
  `responsable_observacion` varchar(45) NOT NULL,
  `usuario_propietario_observacion` int(11) NOT NULL,
  `id_tipo_observacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE `parametro` (
  `id_parametro` int(11) NOT NULL,
  `nombre_parametro` varchar(45) NOT NULL,
  `descripcion_parametro` varchar(200) NOT NULL,
  `tipo_parametro` varchar(45) NOT NULL,
  `formato_parametro` varchar(45) NOT NULL,
  `rango_desde_parametro` varchar(45) NOT NULL,
  `rango_hasta_parametro` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro_obtenido`
--

CREATE TABLE `parametro_obtenido` (
  `id_parametro_obtenido` int(11) NOT NULL,
  `id_item_observacion` int(11) NOT NULL,
  `id_parametro` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad_observacion`
--

CREATE TABLE `propiedad_observacion` (
  `id_propiedad_observacion` int(11) NOT NULL,
  `id_tipo_observacion` int(11) NOT NULL,
  `nombre_propiedad_observacion` varchar(48) NOT NULL,
  `descripcion_propiedad_observacion` varchar(200) NOT NULL,
  `tipo_propiedad_observacion` varchar(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `nombre_proyecto` varchar(48) NOT NULL,
  `descripcion_proyecto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `proyecto`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_parametro`
--

CREATE TABLE `proyecto_parametro` (
  `id_proyecto` int(11) NOT NULL,
  `id_parametro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;





-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_observacion`
--

CREATE TABLE `tipo_observacion` (
  `id_tipo_observacion` int(11) NOT NULL,
  `nombre_tipo_observacion` varchar(48) NOT NULL,
  `descripcion_tipo_observacion` varchar(200) NOT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id_unidad` int(11) NOT NULL,
  `nombre_unidad` varchar(45) NOT NULL,
  `descripcion_unidad` varchar(200) NOT NULL,
  `id_parametro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(45) NOT NULL,
  `organizacion_usuario` varchar(45) NOT NULL,
  `puesto_usuario` varchar(45) NOT NULL,
  `direccion_usuario` varchar(200) NOT NULL,
  `correo_usuario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_proyecto`
--

CREATE TABLE `usuario_proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `rol_usuario_proyecto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `item_observacion`
--
ALTER TABLE `item_observacion`
  ADD PRIMARY KEY (`id_item_observacion`),
  ADD KEY `id_item_observacion` (`id_item_observacion`),
  ADD KEY `id_observacion` (`id_observacion`);

--
-- Indices de la tabla `metadato_proyecto`
--
ALTER TABLE `metadato_proyecto`
  ADD PRIMARY KEY (`id_metadato_proyecto`),
  ADD KEY `id_metadato_proyecto` (`id_metadato_proyecto`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD PRIMARY KEY (`id_observacion`),
  ADD KEY `id_observacion` (`id_observacion`),
  ADD KEY `id_tipo_observacion` (`id_tipo_observacion`),
  ADD KEY `id_usuario` (`usuario_propietario_observacion`);

--
-- Indices de la tabla `parametro`
--
ALTER TABLE `parametro`
  ADD PRIMARY KEY (`id_parametro`),
  ADD KEY `id_parametro` (`id_parametro`);

--
-- Indices de la tabla `parametro_obtenido`
--
ALTER TABLE `parametro_obtenido`
  ADD PRIMARY KEY (`id_parametro_obtenido`),
  ADD KEY `id_parametro_obtenido` (`id_parametro_obtenido`),
  ADD KEY `id_item_observacion` (`id_item_observacion`),
  ADD KEY `id_parametro` (`id_parametro`);

--
-- Indices de la tabla `propiedad_observacion`
--
ALTER TABLE `propiedad_observacion`
  ADD PRIMARY KEY (`id_propiedad_observacion`),
  ADD KEY `id_propiedad_observacion` (`id_propiedad_observacion`),
  ADD KEY `id_tipo_observacion` (`id_tipo_observacion`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `proyecto_parametro`
--
ALTER TABLE `proyecto_parametro`
  ADD PRIMARY KEY (`id_proyecto`,`id_parametro`),
  ADD KEY `id_proyecto` (`id_proyecto`),
  ADD KEY `id_parametro` (`id_parametro`);

--
-- Indices de la tabla `tipo_observacion`
--
ALTER TABLE `tipo_observacion`
  ADD PRIMARY KEY (`id_tipo_observacion`),
  ADD KEY `id_tipo_observacion` (`id_tipo_observacion`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id_unidad`),
  ADD KEY `id_unidad` (`id_unidad`),
  ADD KEY `id_parametro` (`id_parametro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario_proyecto`
--
ALTER TABLE `usuario_proyecto`
  ADD PRIMARY KEY (`id_usuario`,`id_proyecto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `item_observacion`
--
ALTER TABLE `item_observacion`
  MODIFY `id_item_observacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370;

--
-- AUTO_INCREMENT de la tabla `metadato_proyecto`
--
ALTER TABLE `metadato_proyecto`
  MODIFY `id_metadato_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370;

--
-- AUTO_INCREMENT de la tabla `observacion`
--
ALTER TABLE `observacion`
  MODIFY `id_observacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `parametro`
--
ALTER TABLE `parametro`
  MODIFY `id_parametro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;

--
-- AUTO_INCREMENT de la tabla `parametro_obtenido`
--
ALTER TABLE `parametro_obtenido`
  MODIFY `id_parametro_obtenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370;

--
-- AUTO_INCREMENT de la tabla `propiedad_observacion`
--
ALTER TABLE `propiedad_observacion`
  MODIFY `id_propiedad_observacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `tipo_observacion`
--
ALTER TABLE `tipo_observacion`
  MODIFY `id_tipo_observacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `item_observacion`
--
ALTER TABLE `item_observacion`
  ADD CONSTRAINT `FK_Item_Observacion_Observacion` FOREIGN KEY (`id_observacion`) REFERENCES `observacion` (`id_observacion`);

--
-- Filtros para la tabla `metadato_proyecto`
--
ALTER TABLE `metadato_proyecto`
  ADD CONSTRAINT `FK_Metadato_Proyecto` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD CONSTRAINT `FK_Observacion_Tipo_Observacion` FOREIGN KEY (`id_tipo_observacion`) REFERENCES `tipo_observacion` (`id_tipo_observacion`),
  ADD CONSTRAINT `FK_Observacion_Usuario_Propietario` FOREIGN KEY (`usuario_propietario_observacion`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `propiedad_observacion`
--
ALTER TABLE `propiedad_observacion`
  ADD CONSTRAINT `FK_Propiedad_Observacion_Tipo_Observacion` FOREIGN KEY (`id_tipo_observacion`) REFERENCES `tipo_observacion` (`id_tipo_observacion`);

--
-- Filtros para la tabla `proyecto_parametro`
--
ALTER TABLE `proyecto_parametro`
  ADD CONSTRAINT `FK_Proyecto_Parametro_Parametro` FOREIGN KEY (`id_parametro`) REFERENCES `parametro` (`id_parametro`),
  ADD CONSTRAINT `FK_Proyecto_Parametro_Proyecto` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `tipo_observacion`
--
ALTER TABLE `tipo_observacion`
  ADD CONSTRAINT `FK_Tipo_Observacion_Proyecto` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD CONSTRAINT `FK_Unidad_Parametro` FOREIGN KEY (`id_parametro`) REFERENCES `parametro` (`id_parametro`);

--
-- Filtros para la tabla `usuario_proyecto`
--
ALTER TABLE `usuario_proyecto`
  ADD CONSTRAINT `FK_Usuario_Proyecto_Proyecto` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`),
  ADD CONSTRAINT `FK_Usuario_Proyecto_Usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
