-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2026 a las 20:15:59
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `credsafe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallereporte`
--

CREATE TABLE `detallereporte` (
  `id` int(11) NOT NULL,
  `id_reporte` int(11) DEFAULT NULL,
  `tipoRiesgo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `recomendacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallereporte`
--

INSERT INTO `detallereporte` (`id`, `id_reporte`, `tipoRiesgo`, `descripcion`, `recomendacion`) VALUES
(1, 3, 'Longitud', 'La contraseña es demasiado corta.', 'Aumenta el tamaño a 8 o más caracteres.'),
(2, 3, 'Complejidad', 'Faltan letras mayúsculas.', 'Incluye al menos una letra en mayúscula (A-Z).'),
(3, 3, 'Complejidad', 'No se detectaron números.', 'Agrega dígitos numéricos (0-9).'),
(4, 3, 'Complejidad', 'Faltan caracteres especiales.', 'Usa símbolos como @, #, $, etc.'),
(5, 9, 'Complejidad', 'Faltan caracteres especiales.', 'Usa símbolos como @, #, $, etc.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intentologin`
--

CREATE TABLE `intentologin` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `resultado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `intentologin`
--

INSERT INTO `intentologin` (`id`, `id_usuario`, `fecha`, `resultado`) VALUES
(1, 1, '2026-01-09 16:10:52', 1),
(2, 1, '2026-01-09 16:11:07', 0),
(3, 1, '2026-01-09 16:11:07', 1),
(4, 1, '2026-01-09 16:11:13', 0),
(5, 1, '2026-01-09 16:11:15', 0),
(6, 1, '2026-01-09 16:11:16', 0),
(7, 1, '2026-01-09 16:11:17', 0),
(8, 1, '2026-01-09 16:11:18', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `score` tinyint(4) DEFAULT NULL,
  `nivelRiesgo` enum('1','2','3') DEFAULT NULL,
  `fechaGenerado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`id`, `id_usuario`, `score`, `nivelRiesgo`, `fechaGenerado`) VALUES
(3, 0, 0, '3', '2026-01-09 16:04:02'),
(9, 1, 75, '2', '2026-01-09 16:12:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lastLogin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `lastLogin`) VALUES
(1, 'hola@gmail.com', '$2y$10$BJ84ubaY8geM5q7caukh.O6x.S3mwpW8KoO7QP7p53fKWhuO4deN.', '2026-01-09 16:11:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detallereporte`
--
ALTER TABLE `detallereporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reporte` (`id_reporte`);

--
-- Indices de la tabla `intentologin`
--
ALTER TABLE `intentologin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_intentologin_usuario` (`id_usuario`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reporte_user` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detallereporte`
--
ALTER TABLE `detallereporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `intentologin`
--
ALTER TABLE `intentologin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallereporte`
--
ALTER TABLE `detallereporte`
  ADD CONSTRAINT `fk_detalle_reporte` FOREIGN KEY (`id_reporte`) REFERENCES `reporte` (`id`);

--
-- Filtros para la tabla `intentologin`
--
ALTER TABLE `intentologin`
  ADD CONSTRAINT `fk_intentologin_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `fk_reporte_user` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
