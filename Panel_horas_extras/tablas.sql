-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2020 a las 17:56:28
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `intranet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consolidado_horas`
--

CREATE TABLE `consolidado_horas` (
  `id_reporte` int(11) NOT NULL,
  `hora_extra_diu` float NOT NULL,
  `hora_extra_noct` float NOT NULL,
  `hora_extra_diu_dom` float NOT NULL,
  `hora_extra_noct_dom` float NOT NULL,
  `recargo_noct` float NOT NULL,
  `recargo_noct_dom` float NOT NULL,
  `recargo_diur_dom` float NOT NULL,
  `estado_jefe` int(11) NOT NULL,
  `estado_geren` int(11) NOT NULL,
  `estado_vice` int(11) DEFAULT NULL,
  `estado_ges_hu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_reporte`
--

CREATE TABLE `detalle_reporte` (
  `id_reporte` int(11) NOT NULL,
  `id_hora` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `nombre_dia` varchar(10) DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `horas_dia` decimal(10,0) DEFAULT NULL,
  `horas_extras` decimal(10,0) DEFAULT NULL,
  `horas_recargo` int(11) DEFAULT NULL,
  `actividad` varchar(50) DEFAULT NULL,
  `observaciones` varchar(50) DEFAULT NULL,
  `estado_jefe` int(11) NOT NULL,
  `estado_ges_hu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_horas`
--

CREATE TABLE `reporte_horas` (
  `id_reporte` int(111) NOT NULL,
  `estado_n` int(11) NOT NULL,
  `nombre_trabajador` varchar(100) NOT NULL,
  `mes` varchar(50) NOT NULL,
  `documento` varchar(20) NOT NULL,
  `proyecto` int(11) NOT NULL,
  `cargo` int(11) NOT NULL,
  `id_jefe` int(11) NOT NULL,
  `estado_jefe` int(11) NOT NULL,
  `estado_geren` int(11) NOT NULL,
  `estado_vice` int(11) NOT NULL,
  `estado_ges_hu` int(11) NOT NULL,
  `fecha_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consolidado_horas`
--
ALTER TABLE `consolidado_horas`
  ADD PRIMARY KEY (`id_reporte`);

--
-- Indices de la tabla `detalle_reporte`
--
ALTER TABLE `detalle_reporte`
  ADD PRIMARY KEY (`id_hora`);

--
-- Indices de la tabla `reporte_horas`
--
ALTER TABLE `reporte_horas`
  ADD PRIMARY KEY (`id_reporte`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_reporte`
--
ALTER TABLE `detalle_reporte`
  MODIFY `id_hora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reporte_horas`
--
ALTER TABLE `reporte_horas`
  MODIFY `id_reporte` int(111) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
