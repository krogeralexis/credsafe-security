-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 24, 2026 at 11:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `credsafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `detallereporte`
--

CREATE TABLE `detallereporte` (
  `id` int(11) NOT NULL,
  `id_reporte` int(11) DEFAULT NULL,
  `tipoRiesgo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `recomendacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detallereporte`
--

INSERT INTO `detallereporte` (`id`, `id_reporte`, `tipoRiesgo`, `descripcion`, `recomendacion`) VALUES
(1, 2, 'Longitud', 'La contraseña es demasiado corta.', 'Aumenta el tamaño a 8 o más caracteres.'),
(2, 2, 'Complejidad', 'Faltan letras mayúsculas.', 'Incluye al menos una letra en mayúscula (A-Z).'),
(3, 2, 'Complejidad', 'No se detectaron números.', 'Agrega dígitos numéricos (0-9).'),
(4, 2, 'Complejidad', 'Faltan caracteres especiales.', 'Usa símbolos como @, #, $, etc.'),
(5, 3, 'Longitud', 'La contraseña es demasiado corta.', 'Aumenta el tamaño a 8 o más caracteres.'),
(6, 3, 'Complejidad', 'Faltan letras mayúsculas.', 'Incluye al menos una letra en mayúscula (A-Z).'),
(7, 3, 'Complejidad', 'No se detectaron números.', 'Agrega dígitos numéricos (0-9).'),
(8, 3, 'Complejidad', 'Faltan caracteres especiales.', 'Usa símbolos como @, #, $, etc.'),
(9, 4, 'Longitud', 'La contraseña es demasiado corta.', 'Aumenta el tamaño a 8 o más caracteres.'),
(10, 4, 'Complejidad', 'Faltan letras mayúsculas.', 'Incluye al menos una letra en mayúscula (A-Z).'),
(11, 4, 'Complejidad', 'No se detectaron números.', 'Agrega dígitos numéricos (0-9).'),
(12, 4, 'Complejidad', 'Faltan caracteres especiales.', 'Usa símbolos como @, #, $, etc.'),
(13, 5, 'Longitud', 'La contraseña es demasiado corta.', 'Aumenta el tamaño a 8 o más caracteres.'),
(14, 5, 'Complejidad', 'Faltan letras mayúsculas.', 'Incluye al menos una letra en mayúscula (A-Z).'),
(15, 5, 'Complejidad', 'No se detectaron números.', 'Agrega dígitos numéricos (0-9).'),
(16, 5, 'Complejidad', 'Faltan caracteres especiales.', 'Usa símbolos como @, #, $, etc.'),
(17, 6, 'Longitud', 'La contraseña es demasiado corta.', 'Aumenta el tamaño a 8 o más caracteres.'),
(18, 6, 'Complejidad', 'Faltan letras mayúsculas.', 'Incluye al menos una letra en mayúscula (A-Z).'),
(19, 6, 'Complejidad', 'No se detectaron números.', 'Agrega dígitos numéricos (0-9).'),
(20, 6, 'Complejidad', 'Faltan caracteres especiales.', 'Usa símbolos como @, #, $, etc.'),
(21, 7, 'Longitud', 'La contraseña es demasiado corta.', 'Aumenta el tamaño a 8 o más caracteres.'),
(22, 9, 'Complejidad', 'Faltan letras mayúsculas.', 'Incluye al menos una letra en mayúscula (A-Z).'),
(23, 9, 'Complejidad', 'No se detectaron números.', 'Agrega dígitos numéricos (0-9).'),
(24, 9, 'Complejidad', 'Faltan caracteres especiales.', 'Usa símbolos como @, #, $, etc.'),
(25, 10, 'Longitud', 'La contraseña es demasiado corta.', 'Aumenta el tamaño a 8 o más caracteres.'),
(26, 10, 'Complejidad', 'Faltan letras mayúsculas.', 'Incluye al menos una letra en mayúscula (A-Z).'),
(27, 10, 'Complejidad', 'No se detectaron números.', 'Agrega dígitos numéricos (0-9).'),
(28, 10, 'Complejidad', 'Faltan caracteres especiales.', 'Usa símbolos como @, #, $, etc.');

-- --------------------------------------------------------

--
-- Table structure for table `intentologin`
--

CREATE TABLE `intentologin` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `resultado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reporte`
--

CREATE TABLE `reporte` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `score` tinyint(4) DEFAULT NULL,
  `nivelRiesgo` enum('1','2','3') DEFAULT NULL,
  `fechaGenerado` datetime DEFAULT NULL,
  `passwordMask` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reporte`
--

INSERT INTO `reporte` (`id`, `id_usuario`, `score`, `nivelRiesgo`, `fechaGenerado`, `passwordMask`) VALUES
(1, 5, 100, '1', '2026-06-24 17:17:44', NULL),
(2, 5, 0, '3', '2026-06-24 17:17:49', NULL),
(3, 5, 0, '3', '2026-06-24 17:24:38', NULL),
(4, 5, 0, '3', '2026-06-24 17:40:46', NULL),
(5, 5, 0, '3', '2026-06-24 17:43:30', NULL),
(6, 5, 0, '3', '2026-06-24 17:43:31', NULL),
(7, 5, 75, '2', '2026-06-24 17:43:35', NULL),
(8, 5, 100, '1', '2026-06-24 17:43:57', NULL),
(9, 5, 25, '3', '2026-06-24 18:02:13', 'e**********a'),
(10, 5, 0, '3', '2026-06-24 18:03:33', 'a**a'),
(11, 5, 100, '1', '2026-06-24 18:05:09', 'H****************************4');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lastLogin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `lastLogin`) VALUES
(1, 'sda@as.s', '$2y$10$7ma8ftBvXSelCi9xeSyxFOzE2ZhShicbG6/8.J.6Rdk3gmbBIcjNK', NULL),
(2, 'das@sd.a', '$2y$10$WOEWOKu.HfX98ctl9i.E9.LGeiqqXVoRneJDPJVA9SvHuhjsl3t36', NULL),
(3, 'asd@a.a', '$2y$10$9nmbmzSUGuCxtJQIwGDc..8saxMLVzPHQzgpapamIW8QB4bXaHJEG', NULL),
(5, 'das@asd.d', '$2y$10$heqca1sw55dWpHOsQAX0oewKybgayPUozajvRvGS4Oq22pH3KTlEm', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detallereporte`
--
ALTER TABLE `detallereporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_reporte` (`id_reporte`);

--
-- Indexes for table `intentologin`
--
ALTER TABLE `intentologin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_intentologin_usuario` (`id_usuario`);

--
-- Indexes for table `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reporte_user` (`id_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detallereporte`
--
ALTER TABLE `detallereporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `intentologin`
--
ALTER TABLE `intentologin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reporte`
--
ALTER TABLE `reporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detallereporte`
--
ALTER TABLE `detallereporte`
  ADD CONSTRAINT `fk_detalle_reporte` FOREIGN KEY (`id_reporte`) REFERENCES `reporte` (`id`);

--
-- Constraints for table `intentologin`
--
ALTER TABLE `intentologin`
  ADD CONSTRAINT `fk_intentologin_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `fk_reporte_user` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
