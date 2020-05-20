-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2020 a las 14:17:57
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `spComentariosByIdFunding` (IN `inId` INT)  NO SQL
SELECT * FROM `comentario` WHERE idFunding=inId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spContribucionByName` (IN `inNombre` VARCHAR(50))  NO SQL
SELECT * FROM `contribucion` WHERE contribucion.nombre=inNombre$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spDeleteVoto` (IN `inIdFunding` INT, IN `inIdUsuario` INT)  NO SQL
DELETE FROM `voto` WHERE idFunding=inIdFunding AND idUsuario=inIdUsuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spFundingById` (IN `inIdFunding` INT)  NO SQL
SELECT * FROM `crowdfunding` WHERE crowdfunding.id=inIdFunding$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spFundingByName` (IN `inNombre` VARCHAR(50))  NO SQL
SELECT * FROM `crowdfunding` WHERE crowdfunding.nombre=inNombre$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertComentario` (IN `inComentario` VARCHAR(250), IN `inIdUsuario` INT(11), IN `inIdFunding` INT(11))  NO SQL
INSERT INTO `comentario`(`comentario`, `idUsuario`, `idFunding`) VALUES (inComentario,inIdUsuario,inIdFunding)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertContribucion` (IN `inNombre` VARCHAR(50), IN `inPrecio` INT(11), IN `inDescripcion` VARCHAR(50), IN `inRecompensa` VARCHAR(50))  NO SQL
INSERT INTO `contribucion`(`nombre`, `precio`, `descripcion`, `recompensa`) VALUES (inNombre,inPrecio,inDescripcion,inRecompensa)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertFunding` (IN `inNombre` VARCHAR(50), IN `inDescripcion` VARCHAR(250), IN `inDineroO` INT(11), IN `inFechaFin` DATE, IN `inImagen` VARCHAR(50))  NO SQL
INSERT INTO `crowdfunding`(`nombre`, `descripcion`, `dineroO`, `fechaFin`, `imagen`) VALUES (inNombre,inDescripcion,inDineroO,inFechaFin,inImagen)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertPatrocinio` (IN `inIdUsuario` INT(11), IN `inIdFunding` INT(11), IN `inIdContribucion` INT(11), IN `inCVV` INT(3), IN `inNumero` INT(16), IN `inFechaCad` DATE, IN `inTitular` VARCHAR(64))  NO SQL
INSERT INTO `patrocinio`(`idUsuario`, `idFunding`, `idContribucion`, CVV, numero, fechaCad, titular) VALUES (inIdUsuario,inIdFunding,inIdContribucion, inCVV, inNumero, inFechaCad, inTitular)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertPregunta` (IN `inPregunta` VARCHAR(50), IN `inRespuesta` VARCHAR(250), IN `inIdFunding` INT)  NO SQL
INSERT INTO `pregunta`( `pregunta`, `respuesta`, `idFunding`) VALUES (inPregunta,inRespuesta,inIdFunding)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertVoto` (IN `inPositivo` INT, IN `inIdUsuario` INT, IN `inIdFunding` INT)  NO SQL
INSERT INTO `voto`(`positivo`, `idUsuario`, `idFunding`) VALUES (inPositivo,inIdUsuario,inIdFunding)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spLogin` (IN `inUsuario` VARCHAR(64), IN `inContrasena` VARCHAR(64))  NO SQL
SELECT * FROM usuario WHERE usuario=inUsuario AND contrasena=inContrasena$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spOrderByVoto` ()  NO SQL
SELECT SUM(positivo) AS ratioVoto, idFunding, crowdfunding.* FROM voto RIGHT JOIN crowdfunding ON idFunding=crowdfunding.id GROUP BY crowdfunding.id ORDER BY ratioVoto DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spPreguntasByFundingId` (IN `inIdFunding` INT)  NO SQL
SELECT * FROM `pregunta` WHERE idFunding=inIdFunding$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateVoto` (IN `inPositivo` INT, IN `inIdFunding` INT, IN `inIdUsuario` INT)  NO SQL
UPDATE `voto` SET `positivo`=inPositivo WHERE idFunding=inIdFunding AND idUsuario = inIdUsuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUsuarioById` (IN `inId` INT)  NO SQL
SELECT * FROM `usuario` WHERE id = inId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spVotosByIdFunding` (IN `inIdFunding` INT)  NO SQL
SELECT * FROM voto WHERE idFunding = inIdFunding$$

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

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `comentario`, `idUsuario`, `idFunding`) VALUES
(1, 'Un gran trabajo Markel.', 2, 4),
(2, 'adssadsda', 2, 4),
(3, '			asddassd', 2, 1),
(4, '			dsadsa', 2, 1),
(14, 'sdadsaas', 2, 16),
(15, 'dsasdds', 2, 3),
(16, 'dsasdds', 2, 3),
(17, 'sdads', 2, 3),
(18, 'sadds', 2, 3),
(19, '', 2, 3),
(20, '', 2, 3);

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

--
-- Volcado de datos para la tabla `contribucion`
--

INSERT INTO `contribucion` (`id`, `nombre`, `precio`, `descripcion`, `recompensa`) VALUES
(1, 'Contribución Base', 20, 'La contribución mínima.', 'Un enorme aprobado.'),
(2, 'asdsda', 43, 'dsadsadsa', 'adsdsa'),
(3, 'saddsasd', 1, 'sdadsa', 'sdadsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crowdfunding`
--

CREATE TABLE `crowdfunding` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dineroR` int(11) NOT NULL,
  `dineroO` int(11) NOT NULL,
  `fechaFin` date NOT NULL,
  `imagen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `crowdfunding`
--

INSERT INTO `crowdfunding` (`id`, `nombre`, `descripcion`, `dineroR`, `dineroO`, `fechaFin`, `imagen`, `idUsuario`) VALUES
(1, 'importante', 'descripcion de algo importante', 200, 400, '2020-04-22', 'aaa', 2),
(2, 'secundario', 'descripcion de algo importante', 1, 333, '2020-04-23', '', 2),
(3, 'secundario', 'descripcion de algo secundario', 200, 300, '0000-00-00', '', 2),
(4, 'terciario', 'descripcion de algo terciario', 200, 300, '2020-04-01', '', 2),
(5, 'secundario', 'descripcion de algo secundario', 200, 300, '2020-04-30', '', 2),
(6, 'terciario', 'descripcion de algo terciario', 200, 300, '2020-04-01', '', 2),
(16, 'dsadsdsad', 'asdsdasda', 0, 10, '2020-05-20', 'dsasdas', 2);

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
  `idContribucion` int(11) NOT NULL,
  `CVV` int(3) NOT NULL,
  `numero` int(16) NOT NULL,
  `fechaCad` date NOT NULL,
  `titular` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `patrocinio`
--

INSERT INTO `patrocinio` (`id`, `idUsuario`, `idFunding`, `idContribucion`, `CVV`, `numero`, `fechaCad`, `titular`) VALUES
(1, 2, 1, 1, 0, 0, '0000-00-00', ''),
(2, 2, 1, 1, 0, 0, '0000-00-00', '');

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

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id`, `pregunta`, `respuesta`, `idFunding`) VALUES
(1, '¿Cuándo estará lista?', 'No lo se.', 4),
(2, 'asddsa', 'dsadsadsa', 3),
(3, 'asddsa', 'dsadsadsa', 3);

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
  `positivo` int(1) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idFunding` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `voto`
--

INSERT INTO `voto` (`id`, `positivo`, `idUsuario`, `idFunding`) VALUES
(1, 1, 2, 1),
(2, 1, 2, 1),
(4, 1, 2, 3),
(21, 1, 2, 5),
(22, -1, 2, 2),
(32, 0, 2, 16);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUsuario`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `contribucion`
--
ALTER TABLE `contribucion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `crowdfunding`
--
ALTER TABLE `crowdfunding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `patrocinio`
--
ALTER TABLE `patrocinio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `voto`
--
ALTER TABLE `voto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
-- Filtros para la tabla `crowdfunding`
--
ALTER TABLE `crowdfunding`
  ADD CONSTRAINT `crowdfunding_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

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
  ADD CONSTRAINT `patrocinio_ibfk_3` FOREIGN KEY (`id`) REFERENCES `contribucion` (`id`);

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
