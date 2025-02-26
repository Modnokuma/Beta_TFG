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
-- Base de datos: `dani_tfg_bd`
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
GRANT ALL PRIVILEGES ON `Dani_TFG_BD`.* TO `dani`@`localhost` WITH GRANT OPTION;

--
-- Base de datos: `Dani_TFG_BD`
--
DROP DATABASE IF EXISTS `Dani_TFG_BD`;
CREATE DATABASE IF NOT EXISTS `Dani_TFG_BD` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Dani_TFG_BD`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_observacion`
--

CREATE TABLE `item_observacion` (
  `id_item_observacion` int(11) NOT NULL,
  `id_observacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `item_observacion`
--

INSERT INTO `item_observacion` (`id_item_observacion`, `id_observacion`) VALUES
(1, 1),
(2, 1);

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

--
-- Volcado de datos para la tabla `metadato_proyecto`
--

INSERT INTO `metadato_proyecto` (`id_metadato_proyecto`, `nombre_metadato_proyecto`, `descripcion_metadato_proyecto`, `tipo_metadato_proyecto`, `id_proyecto`) VALUES
(1, 'agua', 'AGUA', 'Metadato de agua', 1),
(2, 'animal', 'ANIMAL', 'Metadato de animales', 2),
(3, 'aire', 'AIRE', 'Metadato de aire', 3);

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

--
-- Volcado de datos para la tabla `observacion`
--

INSERT INTO `observacion` (`id_observacion`, `nombre_observacion`, `descripcion_observacion`, `fecha_observacion`, `responsable_observacion`, `usuario_propietario_observacion`, `id_tipo_observacion`) VALUES
(1, 'Observacion 1', 'observacion...', '0000-00-00', 'Alguien1', 1, 1),
(2, 'Observacion 2', 'observacion...', '0000-00-00', 'Alguien2', 1, 2),
(3, 'Observacion 3', 'observacion..', '0000-00-00', 'alguien3', 1, 3),
(4, 'Observacion 4', 'observacion...', '0000-00-00', 'Alguien4', 1, 4);

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

--
-- Volcado de datos para la tabla `parametro`
--

INSERT INTO `parametro` (`id_parametro`, `nombre_parametro`, `descripcion_parametro`, `tipo_parametro`, `formato_parametro`, `rango_desde_parametro`, `rango_hasta_parametro`) VALUES
(1, 'Masa', 'Magnitud física que expresa la inercia o resistencia al cambio de movimiento de un cuerpo', 'Tipo 1', '', '', ''),
(2, 'Plomo', 'El plomo es un metal pesado de densidad relativa', 'Tipo 2', '', '', ''),
(3, 'Cloruro', 'Los cloruros son aniones derivados del cloruro de hidrógeno y son compuestos que llevan un átomo de cloro en estado de oxidación formal -1', 'Tipo 3', '', '', ''),
(373, 'Tercera prueba', 'descripción prueba', 'tipo prueba', '', '', '');

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

--
-- Volcado de datos para la tabla `parametro_obtenido`
--

INSERT INTO `parametro_obtenido` (`id_parametro_obtenido`, `id_item_observacion`, `id_parametro`, `valor`) VALUES
(1, 1, 1, 80),
(2, 2, 2, 1);

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

--
-- Volcado de datos para la tabla `propiedad_observacion`
--

INSERT INTO `propiedad_observacion` (`id_propiedad_observacion`, `id_tipo_observacion`, `nombre_propiedad_observacion`, `descripcion_propiedad_observacion`, `tipo_propiedad_observacion`) VALUES
(1, 1, 'prueba_prop_ob_1', 'desc_prueba_prop_ob_1', 'tipo_prueba_prop_ob_1'),
(2, 2, 'prueba_prop_ob_2', 'desc_prueba_prop_ob_1', 'tipo_prueba_prop_ob_2'),
(3, 3, 'prueba_prop_ob_3', 'desc_prueba_prop_ob_1', 'tipo_prueba_prop_ob_3'),
(4, 4, 'prueba_prop_ob_4', 'desc_prueba_prop_ob_1', 'tipo_prueba_prop_ob_4');

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

INSERT INTO `proyecto` (`id_proyecto`, `nombre_proyecto`, `descripcion_proyecto`) VALUES
(1, 'AQUA', 'Investigación de la calidad del agua en los embalses gallegos'),
(2, 'JAB', 'Control de la densidad de poblacion de jabalies en Galicia'),
(3, 'AIR', 'Investigación sobre la calidad del aire en la ciudad de Ourense'),
(4, 'PRUEBAEDIT', 'Es una prueba de un edit ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_parametro`
--

CREATE TABLE `proyecto_parametro` (
  `id_proyecto` int(11) NOT NULL,
  `id_parametro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `proyecto_parametro`
--

INSERT INTO `proyecto_parametro` (`id_proyecto`, `id_parametro`) VALUES
(1, 2),
(1, 3);

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

--
-- Volcado de datos para la tabla `tipo_observacion`
--

INSERT INTO `tipo_observacion` (`id_tipo_observacion`, `nombre_tipo_observacion`, `descripcion_tipo_observacion`, `id_proyecto`) VALUES
(1, 'agua1', 'Reconocimiento de la zona y muestras iniciales', 1),
(2, 'agua2', 'Primera recogidad de datos', 1),
(3, 'animal', 'Recogida de datos en las afueras de Ourense', 2),
(4, 'aire', 'Recogida estandard de datos', 3);

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

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id_unidad`, `nombre_unidad`, `descripcion_unidad`, `id_parametro`) VALUES
(1, 'Kg', 'Kilogramos, Unidad de peso y 1000 veces 1g', 1),
(2, 'Nueva unidad', 'descripcion prueba', 2),
(3, 'mg/L', 'ración de peso a volumen y se utiliza en el análisis de agua y aguas residuales', 3),
(81, 'Nueva unidad', 'descripcion prueba', 2),
(102, 'Nueva unidad', 'descripcion prueba', 3),
(106, 'Segunda prueba', 'descripción prueba', 3);

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

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `organizacion_usuario`, `puesto_usuario`, `direccion_usuario`, `correo_usuario`) VALUES
(1, 'Daniel', 'ESEI', 'alumno', 'Calle A Nº1 4ºD', 'dani@gmail.com'),
(2, 'Javi', 'ESEI', 'profesor', 'Calle B Nº2 1ºC', 'javi@javi.es'),
(3, 'prueba', 'prueba', 'prueba', 'prueba', 'prueba@prueba.es'),
(4, 'Erik', 'ESEI', 'alumno editado', 'PruebaEDIT', 'erik@gmail.com'),
(5, 'Jorge', 'ESEI', 'alumno', 'Calle D Nº3 7ºD', 'jorge@gmail.com'),
(6, 'hugo', 'ESEI', 'alumno', 'Calle D Nº3 7ºD', 'hugo@gmail.com'),
(7, 'Laura', 'ESEI', 'alumno', 'Calle R Nº6 2N', 'laura@gmail.com'),
(82, 'Andrea', 'ESEI', 'alumno', 'Calle R Nº6 2N', 'Andrea@gmail.com'),
(114, 'Samuel', 'ESEI', 'alumno', 'Calle Santo Domingo', 'Samuel@gmail.com');

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
-- Volcado de datos para la tabla `usuario_proyecto`
--

INSERT INTO `usuario_proyecto` (`id_proyecto`, `id_usuario`, `rol_usuario_proyecto`) VALUES
(1, 1, 'participante'),
(2, 2, 'responsable');

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
