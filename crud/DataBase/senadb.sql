-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2021 a las 18:19:49
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `senadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendices`
--

CREATE TABLE `aprendices` (
  `Id` int(11) NOT NULL,
  `IdTipoIdentificacion` int(11) DEFAULT NULL,
  `Identificacion` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  `Nombre` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `PrimerApellido` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `SegundoApellido` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Direccion` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `Telefono` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `IdFicha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `aprendices`
--

INSERT INTO `aprendices` (`Id`, `IdTipoIdentificacion`, `Identificacion`, `Nombre`, `PrimerApellido`, `SegundoApellido`, `Direccion`, `Telefono`, `IdFicha`) VALUES
(7, 1, '1131071206', 'JAIDER ALBERTO', 'ROCHA', 'REDONDO', 'VALLEDUPAR', '3167229984', 1),
(8, 2, '93011122', 'PABLO JOSE', 'FLORES', 'PINTO', 'MANAURE', '3224567895', 2),
(9, 3, '10001', 'MARIO ANDRES', 'AGUDELO', 'FERNANDEZ', 'VALLEDUPAR', '3132456347', 3),
(11, 4, '01234567', 'MANUEL ', 'PEREZ', 'CADENA', 'LA PAZ', '3245654327', 3),
(15, 4, '12345', 'PEDRO JULIO', 'LEON', 'BOTERO', 'PUEBLA', '2134567809', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `Id` int(11) NOT NULL,
  `NumeroFicha` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `IdModalidad` int(11) DEFAULT NULL,
  `IdPrograma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`Id`, `NumeroFicha`, `IdModalidad`, `IdPrograma`) VALUES
(1, '1962737', 1, 4),
(2, '1234567', 3, 5),
(3, '7654321', 3, 8),
(4, '1234354', 2, 7),
(5, '1862636', 1, 4),
(6, '1762735', 3, 4),
(7, '6654320', 2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad`
--

CREATE TABLE `modalidad` (
  `Id` int(11) NOT NULL,
  `NombreM` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `modalidad`
--

INSERT INTO `modalidad` (`Id`, `NombreM`) VALUES
(1, 'PRESENCIAL'),
(2, 'VIRTUAL'),
(3, 'SEMI-PRESENCIAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `Id` int(11) NOT NULL,
  `Codigo` int(20) DEFAULT NULL,
  `Nombre` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `idTipoPrograma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`Id`, `Codigo`, `Nombre`, `idTipoPrograma`) VALUES
(4, 1234, 'ADSI', 1),
(5, 12345, 'ALIMENTOS', 2),
(6, 123456, 'GANADERIA', 1),
(7, 4321, 'SISTEMAS', 3),
(8, 54321, 'COCINA', 4),
(9, 654321, 'CARPINTERIA', 1),
(11, 20302012, 'AUTOMOTRIZ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoidentificacion`
--

CREATE TABLE `tipoidentificacion` (
  `Id` int(11) NOT NULL,
  `NombreTipo` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipoidentificacion`
--

INSERT INTO `tipoidentificacion` (`Id`, `NombreTipo`) VALUES
(1, 'CC'),
(2, 'TI'),
(3, 'RC'),
(4, 'PEP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoprograma`
--

CREATE TABLE `tipoprograma` (
  `id` int(11) NOT NULL,
  `TipoNombre` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoprograma`
--

INSERT INTO `tipoprograma` (`id`, `TipoNombre`) VALUES
(1, 'TECNOLOGO'),
(2, 'TECNICO'),
(3, 'VIRTUAL'),
(4, 'ESPECIAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`Id`, `Nombre`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'INVITADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `Clave` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `IdTipoUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Nombre`, `Clave`, `IdTipoUsuario`) VALUES
(1, 'Admin', '1234', 1),
(2, 'root', '', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `aprendices_ficha` (`IdFicha`),
  ADD KEY `aprendices_TipoIdentificacion` (`IdTipoIdentificacion`) USING BTREE;

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Ficha_Modalidad` (`IdModalidad`),
  ADD KEY `Ficha_Programa` (`IdPrograma`);

--
-- Indices de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `idTipoPrograma` (`idTipoPrograma`);

--
-- Indices de la tabla `tipoidentificacion`
--
ALTER TABLE `tipoidentificacion`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tipoprograma`
--
ALTER TABLE `tipoprograma`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Usuario_TipoUsuario` (`IdTipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipoidentificacion`
--
ALTER TABLE `tipoidentificacion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tipoprograma`
--
ALTER TABLE `tipoprograma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD CONSTRAINT `Apredices_Ficha` FOREIGN KEY (`IdFicha`) REFERENCES `ficha` (`Id`),
  ADD CONSTRAINT `Apredices_TipoIdentificacion` FOREIGN KEY (`IdTipoIdentificacion`) REFERENCES `tipoidentificacion` (`Id`),
  ADD CONSTRAINT `aprendices_ficha` FOREIGN KEY (`IdFicha`) REFERENCES `ficha` (`Id`);

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `Ficha_Modalidad` FOREIGN KEY (`IdModalidad`) REFERENCES `modalidad` (`Id`),
  ADD CONSTRAINT `Ficha_Programa` FOREIGN KEY (`IdPrograma`) REFERENCES `programa` (`Id`);

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `programa_ibfk_1` FOREIGN KEY (`idTipoPrograma`) REFERENCES `tipoprograma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `Usuario_TipoUsuario` FOREIGN KEY (`IdTipoUsuario`) REFERENCES `tipousuario` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
