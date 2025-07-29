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
(4, 'prueba', 'descripción prueba', 'tipo prueba', '', '', '');





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
(4, 'cuarta unidad', 'descripcion prueba', 2),
(5, 'quinta unidad', 'descripcion prueba', 3),
(6, 'sexta unidad' , 'descripción prueba', 3);

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
(8, 'Andrea', 'ESEI', 'alumno', 'Calle R Nº6 2N', 'Andrea@gmail.com'),
(9, 'Samuel', 'ESEI', 'alumno', 'Calle Santo Domingo', 'Samuel@gmail.com');


--
-- Índices para tablas volcadas
--



--
-- Indices de la tabla `parametro`
--
ALTER TABLE `parametro`
  ADD PRIMARY KEY (`id_parametro`),
  ADD KEY `id_parametro` (`id_parametro`);



--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`),
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
-- AUTO_INCREMENT de las tablas volcadas
--


--
-- AUTO_INCREMENT de la tabla `parametro`
--
ALTER TABLE `parametro`
  MODIFY `id_parametro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
-- Filtros para la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD CONSTRAINT `FK_Unidad_Parametro` FOREIGN KEY (`id_parametro`) REFERENCES `parametro` (`id_parametro`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
