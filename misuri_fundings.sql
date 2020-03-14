-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-03-2020 a las 17:16:26
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `misuri_fundings`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spAllActualizaciones` ()  NO SQL
SELECT * FROM `actualizacion`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spAllComentarios` ()  NO SQL
SELECT * FROM `comentario`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spAllContribuciones` ()  NO SQL
SELECT * FROM `contribucion`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spAllCrowdfundings` ()  NO SQL
SELECT * FROM `crowdfunding`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spAllImagenes` ()  NO SQL
SELECT * FROM `galeria`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spAllPatrocinios` ()  NO SQL
SELECT * FROM `patrocinio`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spAllPreguntas` ()  NO SQL
SELECT * FROM `pregunta`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spAllUsuarios` ()  NO SQL
SELECT * FROM `usuario`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spAllVotos` ()  NO SQL
SELECT * FROM `voto`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spLogin` (IN `inUsuario` VARCHAR(64), IN `inContrasena` VARCHAR(64))  NO SQL
SELECT * FROM usuario WHERE usuario=inUsuario AND contrasena=inContrasena$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actualizacion`
--

CREATE TABLE `actualizacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `idFunding` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `comentario` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idFunding` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contribucion`
--

CREATE TABLE `contribucion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recompensa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crowdfunding`
--

CREATE TABLE `crowdfunding` (
  `id` int(11) NOT NULL,
  `nombre` int(50) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dineroR` int(11) NOT NULL,
  `dineroO` int(11) NOT NULL,
  `fechaFIn` date NOT NULL,
  `imagen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `imagen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idFunding` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patrocinio`
--

CREATE TABLE `patrocinio` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idFunding` int(11) NOT NULL,
  `idContribucion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respuesta` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idFunding` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `usuario`, `contrasena`, `email`) VALUES
(2, 'sdadsasda', 'sdsadds', 'pruebauser', '123', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voto`
--

CREATE TABLE `voto` (
  `id` int(11) NOT NULL,
  `positivo` tinyint(1) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idFunding` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actualizacion`
--
ALTER TABLE `actualizacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFunding` (`idFunding`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idFunding` (`idFunding`);

--
-- Indices de la tabla `contribucion`
--
ALTER TABLE `contribucion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crowdfunding`
--
ALTER TABLE `crowdfunding`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFunding` (`idFunding`);

--
-- Indices de la tabla `patrocinio`
--
ALTER TABLE `patrocinio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idFunding` (`idFunding`),
  ADD KEY `idContribucion` (`idContribucion`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFunding` (`idFunding`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `voto`
--
ALTER TABLE `voto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idFunding` (`idFunding`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actualizacion`
--
ALTER TABLE `actualizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contribucion`
--
ALTER TABLE `contribucion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `crowdfunding`
--
ALTER TABLE `crowdfunding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `patrocinio`
--
ALTER TABLE `patrocinio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `voto`
--
ALTER TABLE `voto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actualizacion`
--
ALTER TABLE `actualizacion`
  ADD CONSTRAINT `actualizacion_ibfk_1` FOREIGN KEY (`idFunding`) REFERENCES `crowdfunding` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idFunding`) REFERENCES `crowdfunding` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`idFunding`) REFERENCES `crowdfunding` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `patrocinio`
--
ALTER TABLE `patrocinio`
  ADD CONSTRAINT `patrocinio_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patrocinio_ibfk_2` FOREIGN KEY (`idFunding`) REFERENCES `crowdfunding` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patrocinio_ibfk_3` FOREIGN KEY (`idContribucion`) REFERENCES `contribucion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`idFunding`) REFERENCES `crowdfunding` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `voto`
--
ALTER TABLE `voto`
  ADD CONSTRAINT `voto_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `voto_ibfk_2` FOREIGN KEY (`idFunding`) REFERENCES `crowdfunding` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
