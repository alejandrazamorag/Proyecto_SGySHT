-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-05-2019 a las 02:19:19
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaintegral`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

DROP TABLE IF EXISTS `acciones`;
CREATE TABLE IF NOT EXISTS `acciones` (
  `idAcciones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Reportes_Folio` int(10) UNSIGNED NOT NULL,
  `Accion` text,
  PRIMARY KEY (`idAcciones`),
  KEY `Acciones_FKIndex1` (`Reportes_Folio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `idAlumno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Grupos_idGrupos` int(10) UNSIGNED NOT NULL,
  `LugarNacimiento_idLugarNacimiento` int(10) UNSIGNED NOT NULL,
  `Domicilio_idDomicilio` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL,
  `ApellidoP` varchar(20) DEFAULT NULL,
  `ApellidoM` varchar(20) DEFAULT NULL,
  `Fotografia` longblob,
  `SS` varchar(11) DEFAULT NULL,
  `CURP` varchar(18) DEFAULT NULL,
  `NC` varchar(14) DEFAULT NULL,
  `FechaNac` date DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `Estatus` varchar(1) DEFAULT NULL,
  `Telefono` varchar(10) DEFAULT NULL,
  `TelefonoEmergencia` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idAlumno`),
  KEY `Alumno_FKIndex1` (`Domicilio_idDomicilio`),
  KEY `Alumno_FKIndex2` (`LugarNacimiento_idLugarNacimiento`),
  KEY `Alumno_FKIndex4` (`Grupos_idGrupos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
CREATE TABLE IF NOT EXISTS `calificaciones` (
  `idCalificaciones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `MateriaGruposDocentes_idMateriaGruposDocentes` int(10) UNSIGNED NOT NULL,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `PrimerParcial` double DEFAULT NULL,
  `SegundoParcial` double DEFAULT NULL,
  `TercerParcial` double DEFAULT NULL,
  `EXT` double DEFAULT NULL,
  `idGrupo` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idCalificaciones`),
  KEY `Calificaciones_FKIndex1` (`Alumno_idAlumno`),
  KEY `Calificaciones_FKIndex2` (`MateriaGruposDocentes_idMateriaGruposDocentes`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canalizacion`
--

DROP TABLE IF EXISTS `canalizacion`;
CREATE TABLE IF NOT EXISTS `canalizacion` (
  `idCanalizacion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProblematicasCanalizacion_idProblematicasCanalizacion` int(10) UNSIGNED NOT NULL,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `idFamiliar` int(10) UNSIGNED DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Descripcion` text,
  `Instancia` text,
  `Estatus` tinyint(1) DEFAULT NULL,
  `idGrupo` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idCanalizacion`),
  KEY `Canalizacion_FKIndex1` (`Alumno_idAlumno`),
  KEY `Canalizacion_FKIndex2` (`ProblematicasCanalizacion_idProblematicasCanalizacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargahoraria`
--

DROP TABLE IF EXISTS `cargahoraria`;
CREATE TABLE IF NOT EXISTS `cargahoraria` (
  `idCargaHoraria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `HorasDescarga` int(10) UNSIGNED DEFAULT NULL,
  `HorasAsesoria` int(10) UNSIGNED DEFAULT NULL,
  `HorasFortalecimiento` int(10) UNSIGNED DEFAULT NULL,
  `HorasTutorias` int(10) UNSIGNED DEFAULT NULL,
  `IngresoMensualBruto` double DEFAULT NULL,
  `IngresoMensualNeto` double DEFAULT NULL,
  `TotalHoras` int(10) UNSIGNED DEFAULT NULL,
  `CicloEscolar` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`idCargaHoraria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE IF NOT EXISTS `carreras` (
  `idCarreras` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Clave` varchar(50) DEFAULT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `AreaEspecialidad` varchar(50) DEFAULT NULL,
  `Estatus` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idCarreras`),
  UNIQUE KEY `Nombre` (`Nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartacompromiso`
--

DROP TABLE IF EXISTS `cartacompromiso`;
CREATE TABLE IF NOT EXISTS `cartacompromiso` (
  `idCartaCompromiso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `idFamiliar` int(10) UNSIGNED DEFAULT NULL,
  `idPersonal` int(10) UNSIGNED DEFAULT NULL,
  `Lugar` varchar(20) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `AcuerdosRealizados` text,
  `Motivo` varchar(50) DEFAULT NULL,
  `idGrupo` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idCartaCompromiso`),
  KEY `CartaCompromiso_FKIndex1` (`Alumno_idAlumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartaresponsiva`
--

DROP TABLE IF EXISTS `cartaresponsiva`;
CREATE TABLE IF NOT EXISTS `cartaresponsiva` (
  `idCartaResponsiva` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `idFamiliares` int(10) UNSIGNED DEFAULT NULL,
  `idPersonal` int(10) UNSIGNED DEFAULT NULL,
  `Lugar` varchar(50) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Motivos` text,
  `CompromisosPadres` text,
  `CompromisosAlumnos` text,
  `Asunto` varchar(50) DEFAULT NULL,
  `idGrupo` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idCartaResponsiva`),
  KEY `CartaResponsiva_FKIndex1` (`Alumno_idAlumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clausulas`
--

DROP TABLE IF EXISTS `clausulas`;
CREATE TABLE IF NOT EXISTS `clausulas` (
  `idClausulas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idClausulas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comisiones`
--

DROP TABLE IF EXISTS `comisiones`;
CREATE TABLE IF NOT EXISTS `comisiones` (
  `idComisiones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Personal_idPersonal` int(10) UNSIGNED NOT NULL,
  `TipoComision` varchar(1) DEFAULT NULL,
  `Asunto` text,
  `Fecha` date DEFAULT NULL,
  `Descripcion` text,
  PRIMARY KEY (`idComisiones`),
  KEY `Comisiones_FKIndex1` (`Personal_idPersonal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptodepago`
--

DROP TABLE IF EXISTS `conceptodepago`;
CREATE TABLE IF NOT EXISTS `conceptodepago` (
  `idConceptoDePago` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Monto` double DEFAULT NULL,
  `NombreConcepto` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idConceptoDePago`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursospersonal`
--

DROP TABLE IF EXISTS `cursospersonal`;
CREATE TABLE IF NOT EXISTS `cursospersonal` (
  `idCursosPersonal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `EsudiosPersonal_idEsudiosPersonal` int(10) UNSIGNED NOT NULL,
  `Personal_idPersonal` int(10) UNSIGNED NOT NULL,
  `NombreEstudio` varchar(50) DEFAULT NULL,
  `ComprobanteEstudios` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCursosPersonal`),
  KEY `CursosDocentes_FKIndex1` (`Personal_idPersonal`),
  KEY `CursosDocentes_FKIndex2` (`EsudiosPersonal_idEsudiosPersonal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosescolares`
--

DROP TABLE IF EXISTS `datosescolares`;
CREATE TABLE IF NOT EXISTS `datosescolares` (
  `idDatosEscolares` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `Secundaria_idSecundaria` int(10) UNSIGNED NOT NULL,
  `PromedioSecu` double DEFAULT NULL,
  `OtrosEstudios` text,
  `RendimientoEscolar` char(1) DEFAULT NULL,
  `MateriaGustada` text,
  `MateriaDisgustada` text,
  `ReaccionPadres` text,
  `Espectativa` text,
  PRIMARY KEY (`idDatosEscolares`),
  KEY `DatosEscolares_FKIndex1` (`Secundaria_idSecundaria`),
  KEY `DatosEscolares_FKIndex2` (`Alumno_idAlumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosfamiliares`
--

DROP TABLE IF EXISTS `datosfamiliares`;
CREATE TABLE IF NOT EXISTS `datosfamiliares` (
  `idDatosFamiliares` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `NoHermanos` int(10) UNSIGNED DEFAULT NULL,
  `LugarOcupas` varchar(20) DEFAULT NULL,
  `OtrasPersonas` text,
  `ActualmenteVives` varchar(25) DEFAULT NULL,
  `SituacionFamiliar` text,
  `RelacionPadres` char(1) DEFAULT NULL,
  PRIMARY KEY (`idDatosFamiliares`),
  KEY `DatosFamiliares_FKIndex1` (`Alumno_idAlumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosmedicos`
--

DROP TABLE IF EXISTS `datosmedicos`;
CREATE TABLE IF NOT EXISTS `datosmedicos` (
  `idDatosMedicos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `Enfermedad` text,
  `Tratamiento` text,
  `Tabaquismo` tinyint(1) DEFAULT NULL,
  `Drogadiccion` tinyint(1) DEFAULT NULL,
  `Alcoholismo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idDatosMedicos`),
  KEY `DatosMedicos_FKIndex1` (`Alumno_idAlumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

DROP TABLE IF EXISTS `domicilio`;
CREATE TABLE IF NOT EXISTS `domicilio` (
  `idDomicilio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CP` varchar(10) DEFAULT NULL,
  `Calle` varchar(30) DEFAULT NULL,
  `Numero` varchar(20) DEFAULT NULL,
  `Colonia` varchar(50) DEFAULT NULL,
  `Municipio` varchar(50) DEFAULT NULL,
  `Localidad` varchar(50) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `TelefonoCasa` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idDomicilio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestareprobacion`
--

DROP TABLE IF EXISTS `encuestareprobacion`;
CREATE TABLE IF NOT EXISTS `encuestareprobacion` (
  `idEncuestaReprobacion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `MateriasReprobadas` text,
  `Parcial` int(10) UNSIGNED DEFAULT NULL,
  `Causas` text,
  `Sugerencia` text,
  `Compromisos` text,
  `Comentarios` text,
  `idGrupo` int(10) UNSIGNED DEFAULT NULL,
  `idTutor` int(10) UNSIGNED DEFAULT NULL,
  `idFamiliar` int(10) UNSIGNED DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`idEncuestaReprobacion`),
  KEY `EncuestaReprobacion_FKIndex1` (`Alumno_idAlumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

DROP TABLE IF EXISTS `estudios`;
CREATE TABLE IF NOT EXISTS `estudios` (
  `idEstudios` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Personal_idPersonal` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `TipoEstudio` int(10) UNSIGNED DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Institucion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idEstudios`),
  KEY `Estudios_FKIndex1` (`Personal_idPersonal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esudiospersonal`
--

DROP TABLE IF EXISTS `esudiospersonal`;
CREATE TABLE IF NOT EXISTS `esudiospersonal` (
  `idEsudiosPersonal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Personal_idPersonal` int(10) UNSIGNED NOT NULL,
  `NombreEstudio` varchar(50) DEFAULT NULL,
  `NivelEstudio` varchar(50) DEFAULT NULL,
  `ComprobanteEstudio` varchar(50) DEFAULT NULL,
  `Institucion` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idEsudiosPersonal`),
  KEY `EsudiosPersonal_FKIndex1` (`Personal_idPersonal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expectativanuevaform`
--

DROP TABLE IF EXISTS `expectativanuevaform`;
CREATE TABLE IF NOT EXISTS `expectativanuevaform` (
  `idExpectativaNuevaForm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `Atraccion` text,
  `Precupacion` text,
  `EstudioEs` varchar(10) DEFAULT NULL,
  `ProblemaCausa` text,
  `Preparado` char(1) DEFAULT NULL,
  `ValorarProfesor` text,
  PRIMARY KEY (`idExpectativaNuevaForm`),
  KEY `ExpectativaNuevaForm_FKIndex1` (`Alumno_idAlumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faltas`
--

DROP TABLE IF EXISTS `faltas`;
CREATE TABLE IF NOT EXISTS `faltas` (
  `idFaltas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Personal_idPersonal` int(10) UNSIGNED NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idFaltas`),
  KEY `Faltas_FKIndex1` (`Personal_idPersonal`),
  KEY `Faltas_FKIndex2` (`Personal_idPersonal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiares`
--

DROP TABLE IF EXISTS `familiares`;
CREATE TABLE IF NOT EXISTS `familiares` (
  `idFamiliares` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Domicilio_idDomicilio` int(10) UNSIGNED NOT NULL,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL,
  `ApellidoP` varchar(20) DEFAULT NULL,
  `ApellidoM` varchar(20) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Profesion` varchar(50) DEFAULT NULL,
  `LugarTrabajo` varchar(50) DEFAULT NULL,
  `Parentesco` varchar(15) DEFAULT NULL,
  `Telefono` varchar(10) DEFAULT NULL,
  `Tutor` tinyint(1) DEFAULT NULL,
  `Estatus` tinyint(1) DEFAULT NULL,
  `Justificantes` tinyint(1) DEFAULT NULL,
  `Validado` tinyint(1) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idFamiliares`),
  KEY `Familiares_FKIndex1` (`Alumno_idAlumno`),
  KEY `Familiares_FKIndex2` (`Domicilio_idDomicilio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `idGrupos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idAsesor` int(10) UNSIGNED DEFAULT NULL,
  `Carreras_idCarreras` int(10) UNSIGNED NOT NULL,
  `Grupo` char(1) DEFAULT NULL,
  `Grado` int(10) UNSIGNED DEFAULT NULL,
  `CicloEscolar` varchar(20) DEFAULT NULL,
  `Estatus` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idGrupos`),
  KEY `Grupos_FKIndex1` (`Carreras_idCarreras`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitosestudio`
--

DROP TABLE IF EXISTS `habitosestudio`;
CREATE TABLE IF NOT EXISTS `habitosestudio` (
  `idHabitosEstudio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `TiempoTarea` char(1) DEFAULT NULL,
  `TiempoEstudio` char(1) DEFAULT NULL,
  `TiempoLectura` char(1) DEFAULT NULL,
  `LugarEstudio` varchar(20) DEFAULT NULL,
  `EstimulacionEstudio` text,
  `MotivoAprender` char(1) DEFAULT NULL,
  `MotivoInteres` char(1) DEFAULT NULL,
  `MotivoSatisfaccion` char(1) DEFAULT NULL,
  `MotivoFracaso` char(1) DEFAULT NULL,
  `MotivoAgradecer` char(1) DEFAULT NULL,
  `MotivoPremio` char(1) DEFAULT NULL,
  `MotivoHacer` char(1) DEFAULT NULL,
  `TecnicasEstudio` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idHabitosEstudio`),
  KEY `HabitosEstudio_FKIndex1` (`Alumno_idAlumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

DROP TABLE IF EXISTS `historial`;
CREATE TABLE IF NOT EXISTS `historial` (
  `idHistorial` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Recibo_idFolio` int(10) UNSIGNED NOT NULL,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idHistorial`),
  KEY `Historial_FKIndex1` (`Recibo_idFolio`),
  KEY `Historial_FKIndex2` (`Alumno_idAlumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialalumno`
--

DROP TABLE IF EXISTS `historialalumno`;
CREATE TABLE IF NOT EXISTS `historialalumno` (
  `idHistorialAlumno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Grupos_idGrupos` int(10) UNSIGNED NOT NULL,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`idHistorialAlumno`),
  KEY `HistorialAlumno_FKIndex1` (`Alumno_idAlumno`),
  KEY `HistorialAlumno_FKIndex2` (`Grupos_idGrupos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacionlaboral`
--

DROP TABLE IF EXISTS `informacionlaboral`;
CREATE TABLE IF NOT EXISTS `informacionlaboral` (
  `idInformacionLaboral` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Estatus` varchar(1) DEFAULT NULL,
  `Horas` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idInformacionLaboral`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

DROP TABLE IF EXISTS `inventario`;
CREATE TABLE IF NOT EXISTS `inventario` (
  `idInventario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Personal_idPersonal` int(10) UNSIGNED NOT NULL,
  `FActulizacion` date DEFAULT NULL,
  `Area` varchar(50) DEFAULT NULL,
  `ConceptoDePago` varchar(50) DEFAULT NULL,
  `Categoria` varchar(50) DEFAULT NULL,
  `CodigoQR` longblob,
  `Descripcion` text,
  `EstadoFisico` char(1) DEFAULT NULL,
  `FechaIngreso` date DEFAULT NULL,
  `FechaRegistro` date DEFAULT NULL,
  `IdEstatus` varchar(20) DEFAULT NULL,
  `Imagen` longblob,
  `Marca` varchar(30) DEFAULT NULL,
  `Modelo` varchar(30) DEFAULT NULL,
  `NoFactura` varchar(15) DEFAULT NULL,
  `NoSerie` varchar(30) DEFAULT NULL,
  `Origenes` varchar(50) DEFAULT NULL,
  `Proveedores` varchar(50) DEFAULT NULL,
  `PrecioUnitario` double DEFAULT NULL,
  `TipoInventario` varchar(50) DEFAULT NULL,
  `Ubicacion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idInventario`),
  KEY `Productos_FKIndex1` (`Personal_idPersonal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `justificantes`
--

DROP TABLE IF EXISTS `justificantes`;
CREATE TABLE IF NOT EXISTS `justificantes` (
  `Folio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` varchar(10) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  `Dia` int(11) DEFAULT NULL,
  `Mes` varchar(10) DEFAULT NULL,
  `Anyo` int(11) DEFAULT NULL,
  PRIMARY KEY (`Folio`),
  KEY `Justificantes_FKIndex1` (`Alumno_idAlumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logotipos`
--

DROP TABLE IF EXISTS `logotipos`;
CREATE TABLE IF NOT EXISTS `logotipos` (
  `idLogotipos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Imagen` longblob,
  PRIMARY KEY (`idLogotipos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugarnacimiento`
--

DROP TABLE IF EXISTS `lugarnacimiento`;
CREATE TABLE IF NOT EXISTS `lugarnacimiento` (
  `idLugarNacimiento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Pais` varchar(30) DEFAULT NULL,
  `Estado` varchar(30) DEFAULT NULL,
  `Localidad` varchar(30) DEFAULT NULL,
  `Municipio` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idLugarNacimiento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE IF NOT EXISTS `materia` (
  `idMateria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Carreras_idCarreras` int(10) UNSIGNED NOT NULL,
  `Clave` varchar(50) DEFAULT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Componente` char(1) DEFAULT NULL,
  `Semestre` int(11) DEFAULT NULL,
  `Estatus` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idMateria`),
  KEY `Materia_FKIndex1` (`Carreras_idCarreras`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiagruposdocentes`
--

DROP TABLE IF EXISTS `materiagruposdocentes`;
CREATE TABLE IF NOT EXISTS `materiagruposdocentes` (
  `idMateriaGruposDocentes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Personal_idPersonal` int(10) UNSIGNED DEFAULT NULL,
  `Materia_idMateria` int(10) UNSIGNED NOT NULL,
  `idGrupo` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idMateriaGruposDocentes`),
  KEY `MateriaGruposDocentes_FKIndex1` (`Materia_idMateria`),
  KEY `MateriaGruposDocentes_FKIndex3` (`Personal_idPersonal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiassecureprobadas`
--

DROP TABLE IF EXISTS `materiassecureprobadas`;
CREATE TABLE IF NOT EXISTS `materiassecureprobadas` (
  `idMateriasSecuReprobadas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `Materias` text,
  `Motivo` text,
  PRIMARY KEY (`idMateriasSecuReprobadas`),
  KEY `MateriasSecuReprobadas_FKIndex1` (`Alumno_idAlumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivosjustificantes`
--

DROP TABLE IF EXISTS `motivosjustificantes`;
CREATE TABLE IF NOT EXISTS `motivosjustificantes` (
  `Justificantes_Folio` int(10) UNSIGNED NOT NULL,
  `Motivo` text,
  KEY `MotivosJustificantes_FKIndex1` (`Justificantes_Folio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

DROP TABLE IF EXISTS `notas`;
CREATE TABLE IF NOT EXISTS `notas` (
  `idNotas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `Asunto` varchar(50) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Observacion` text,
  `idPersonal` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idNotas`),
  KEY `Notas_FKIndex2` (`Alumno_idAlumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pases`
--

DROP TABLE IF EXISTS `pases`;
CREATE TABLE IF NOT EXISTS `pases` (
  `idPases` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Personal_idPersonal` int(10) UNSIGNED NOT NULL,
  `InicioHora` time DEFAULT NULL,
  `FinHora` time DEFAULT NULL,
  `Observaciones` text,
  `Motivo` text,
  `Fecha` date DEFAULT NULL,
  `TipoES` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idPases`),
  KEY `Pases_FKIndex1` (`Personal_idPersonal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `idPermisos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Personal_idPersonal` int(10) UNSIGNED NOT NULL,
  `Clausula` int(10) UNSIGNED DEFAULT NULL,
  `Asunto` text,
  `Documento` text,
  `Fecha` date DEFAULT NULL,
  `Observaciones` text,
  PRIMARY KEY (`idPermisos`),
  KEY `Permisos_FKIndex1` (`Personal_idPersonal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

DROP TABLE IF EXISTS `personal`;
CREATE TABLE IF NOT EXISTS `personal` (
  `idPersonal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CargaHoraria_idCargaHoraria` int(10) UNSIGNED NOT NULL,
  `InformacionLaboral_idInformacionLaboral` int(10) UNSIGNED NOT NULL,
  `LugarNacimiento_idLugarNacimiento` int(10) UNSIGNED NOT NULL,
  `Domicilio_idDomicilio` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(25) DEFAULT NULL,
  `ApellidoP` varchar(20) DEFAULT NULL,
  `ApellidoM` varchar(20) DEFAULT NULL,
  `NoEmpleado` int(10) UNSIGNED DEFAULT NULL,
  `CURP` varchar(18) DEFAULT NULL,
  `TelefonoCel` varchar(10) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `SS` varchar(11) DEFAULT NULL,
  `Departamento` varchar(30) DEFAULT NULL,
  `Puesto` varchar(30) DEFAULT NULL,
  `FechaIngreso` date DEFAULT NULL,
  PRIMARY KEY (`idPersonal`),
  KEY `Personal_FKIndex1` (`Domicilio_idDomicilio`),
  KEY `Personal_FKIndex2` (`LugarNacimiento_idLugarNacimiento`),
  KEY `Personal_FKIndex4` (`InformacionLaboral_idInformacionLaboral`),
  KEY `Personal_FKIndex5` (`CargaHoraria_idCargaHoraria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaltutores`
--

DROP TABLE IF EXISTS `personaltutores`;
CREATE TABLE IF NOT EXISTS `personaltutores` (
  `idPersonalTutores` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idPersonal` int(10) UNSIGNED DEFAULT NULL,
  `idGrupos` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idPersonalTutores`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantel`
--

DROP TABLE IF EXISTS `plantel`;
CREATE TABLE IF NOT EXISTS `plantel` (
  `idPlantel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `Clave` varchar(10) DEFAULT NULL,
  `Estado` varchar(10) DEFAULT NULL,
  `Ciudad` varchar(10) DEFAULT NULL,
  `NoPlantel` int(10) UNSIGNED DEFAULT NULL,
  `LogoCECyTERioGrandeZac` longblob,
  `LogoSeduzac` longblob,
  PRIMARY KEY (`idPlantel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

DROP TABLE IF EXISTS `privilegios`;
CREATE TABLE IF NOT EXISTS `privilegios` (
  `idPrivilegios` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Usuarios_idUsuarios` int(10) UNSIGNED NOT NULL,
  `TipoPrivilegio` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idPrivilegios`),
  KEY `Privilegios_FKIndex1` (`Usuarios_idUsuarios`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `problematicascanalizacion`
--

DROP TABLE IF EXISTS `problematicascanalizacion`;
CREATE TABLE IF NOT EXISTS `problematicascanalizacion` (
  `idProblematicasCanalizacion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Problematica` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idProblematicasCanalizacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

DROP TABLE IF EXISTS `recibo`;
CREATE TABLE IF NOT EXISTS `recibo` (
  `idFolio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ConceptoDePagoDePago_idConceptoDePago` int(10) UNSIGNED NOT NULL,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`idFolio`),
  KEY `Recibo_FKIndex1` (`ConceptoDePagoDePago_idConceptoDePago`),
  KEY `Recibo_FKIndex2` (`Alumno_idAlumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporteproductos`
--

DROP TABLE IF EXISTS `reporteproductos`;
CREATE TABLE IF NOT EXISTS `reporteproductos` (
  `idReporteProductos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Inventario_idInventario` int(10) UNSIGNED NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Folio` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idReporteProductos`),
  KEY `ReporteProductos_FKIndex1` (`Inventario_idInventario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

DROP TABLE IF EXISTS `reportes`;
CREATE TABLE IF NOT EXISTS `reportes` (
  `Folio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Personal_idPersonal` int(10) UNSIGNED NOT NULL,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `NoReporte` bit(1) DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Folio`),
  KEY `Reportes_FKIndex1` (`Alumno_idAlumno`),
  KEY `Reportes_FKIndex2` (`Personal_idPersonal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retardos`
--

DROP TABLE IF EXISTS `retardos`;
CREATE TABLE IF NOT EXISTS `retardos` (
  `idRetardos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Personal_idPersonal` int(10) UNSIGNED NOT NULL,
  `fecha` date DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idRetardos`),
  KEY `Retardos_FKIndex1` (`Personal_idPersonal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sanciones`
--

DROP TABLE IF EXISTS `sanciones`;
CREATE TABLE IF NOT EXISTS `sanciones` (
  `idSanciones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Reportes_Folio` int(10) UNSIGNED NOT NULL,
  `Sancion` text,
  PRIMARY KEY (`idSanciones`),
  KEY `Sanciones_FKIndex1` (`Reportes_Folio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secundaria`
--

DROP TABLE IF EXISTS `secundaria`;
CREATE TABLE IF NOT EXISTS `secundaria` (
  `idSecundaria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Matricula` varchar(20) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Municipio` varchar(50) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `Pais` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idSecundaria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudbaja`
--

DROP TABLE IF EXISTS `solicitudbaja`;
CREATE TABLE IF NOT EXISTS `solicitudbaja` (
  `idSolicitudBaja` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `idFamiliares` int(10) UNSIGNED DEFAULT NULL,
  `idDocenteTutor` int(10) UNSIGNED DEFAULT NULL,
  `idCorAcademico` int(10) UNSIGNED DEFAULT NULL,
  `idCorAdministrativo` int(10) UNSIGNED DEFAULT NULL,
  `idDirector` int(10) UNSIGNED DEFAULT NULL,
  `Motivo` text,
  `ObservacionesTutor` text,
  `ObservacionesHistorialPagos` text,
  `idGrupo` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idSolicitudBaja`),
  KEY `SolicitudBaja_FKIndex1` (`Alumno_idAlumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testaprendizaje`
--

DROP TABLE IF EXISTS `testaprendizaje`;
CREATE TABLE IF NOT EXISTS `testaprendizaje` (
  `idTestAprendizaje` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `Respuestas` varchar(36) DEFAULT NULL,
  `Visual` int(10) UNSIGNED DEFAULT NULL,
  `Auditivo` int(10) UNSIGNED DEFAULT NULL,
  `Kinestesico` int(10) UNSIGNED DEFAULT NULL,
  `Total` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idTestAprendizaje`),
  KEY `TestAprendizaje_FKIndex1` (`Alumno_idAlumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutoriaindividual`
--

DROP TABLE IF EXISTS `tutoriaindividual`;
CREATE TABLE IF NOT EXISTS `tutoriaindividual` (
  `idTutoriaIndividual` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `NoTutoria` int(10) UNSIGNED DEFAULT NULL,
  `FechaTutoria` date DEFAULT NULL,
  `Horario` text,
  `ActividadesTareas` text,
  `idTutor` int(10) UNSIGNED DEFAULT NULL,
  `idGrupo` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idTutoriaIndividual`),
  KEY `TutoriaIndividual_FKIndex1` (`Alumno_idAlumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuarios` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Personal_idPersonal` int(10) UNSIGNED NOT NULL,
  `NombreUsuario` varchar(20) DEFAULT NULL,
  `Contrasena` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUsuarios`),
  KEY `Usuarios_FKIndex1` (`Personal_idPersonal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosalumnos`
--

DROP TABLE IF EXISTS `usuariosalumnos`;
CREATE TABLE IF NOT EXISTS `usuariosalumnos` (
  `idUsuariosAlumnos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `NombreUsuario` varchar(20) DEFAULT NULL,
  `Contrasena` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUsuariosAlumnos`),
  KEY `UsuariosAlumnos_FKIndex1` (`Alumno_idAlumno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `yonoabandono`
--

DROP TABLE IF EXISTS `yonoabandono`;
CREATE TABLE IF NOT EXISTS `yonoabandono` (
  `idYoNoAbandono` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `MateriaGruposDocentes_idMateriaGruposDocentes` int(10) UNSIGNED NOT NULL,
  `Alumno_idAlumno` int(10) UNSIGNED NOT NULL,
  `Actividad` varchar(50) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Observaciones` text,
  `Parcial` int(11) DEFAULT NULL,
  `Comentario` text,
  PRIMARY KEY (`idYoNoAbandono`),
  KEY `YoNoAbandono_FKIndex1` (`Alumno_idAlumno`),
  KEY `YoNoAbandono_FKIndex2` (`MateriaGruposDocentes_idMateriaGruposDocentes`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
