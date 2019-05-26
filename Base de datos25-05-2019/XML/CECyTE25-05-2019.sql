CREATE TABLE Domicilio (
  idDomicilio INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  CP VARCHAR(10) NULL,
  Calle VARCHAR(30) NULL,
  Numero VARCHAR(20) NULL,
  Colonia VARCHAR(50) NULL,
  Municipio VARCHAR(50) NULL,
  Localidad VARCHAR(50) NULL,
  Estado VARCHAR(50) NULL,
  TelefonoCasa VARCHAR(20) NULL,
  PRIMARY KEY(idDomicilio)
);

CREATE TABLE Plantel (
  idPlantel INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(100) NULL,
  Clave VARCHAR(10) NULL,
  Estado VARCHAR(10) NULL,
  Ciudad VARCHAR(10) NULL,
  NoPlantel INTEGER UNSIGNED NULL,
  LogoCECyTERioGrandeZac LONGBLOB NULL,
  LogoSeduzac LONGBLOB NULL,
  PRIMARY KEY(idPlantel)
);

CREATE TABLE ConceptoDePago (
  idConceptoDePago INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Monto DOUBLE NULL,
  NombreConcepto VARCHAR(30) NULL,
  PRIMARY KEY(idConceptoDePago)
);

CREATE TABLE ProblematicasCanalizacion (
  idProblematicasCanalizacion INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Problematica VARCHAR(30) NULL,
  PRIMARY KEY(idProblematicasCanalizacion)
);

CREATE TABLE Logotipos (
  idLogotipos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(50) NULL,
  Imagen LONGBLOB NULL,
  PRIMARY KEY(idLogotipos)
);

CREATE TABLE InformacionLaboral (
  idInformacionLaboral INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Estatus VARCHAR(1) NULL,
  Horas INTEGER UNSIGNED NULL,
  PRIMARY KEY(idInformacionLaboral)
);

CREATE TABLE PersonalTutores (
  idPersonalTutores INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  idPersonal INTEGER UNSIGNED NULL,
  idGrupos INTEGER UNSIGNED NULL,
  PRIMARY KEY(idPersonalTutores)
);

CREATE TABLE LugarNacimiento (
  idLugarNacimiento INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Pais VARCHAR(30) NULL,
  Estado VARCHAR(30) NULL,
  Localidad VARCHAR(30) NULL,
  Municipio VARCHAR(30) NULL,
  PRIMARY KEY(idLugarNacimiento)
);

CREATE TABLE Clausulas (
  idClausulas INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(idClausulas)
);

CREATE TABLE CargaHoraria (
  idCargaHoraria INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  HorasDescarga INTEGER UNSIGNED NULL,
  HorasAsesoria INTEGER UNSIGNED NULL,
  HorasFortalecimiento INTEGER UNSIGNED NULL,
  HorasTutorias INTEGER UNSIGNED NULL,
  IngresoMensualBruto DOUBLE NULL,
  IngresoMensualNeto DOUBLE NULL,
  TotalHoras INTEGER UNSIGNED NULL,
  CicloEscolar VARCHAR(4) NULL,
  PRIMARY KEY(idCargaHoraria)
);

CREATE TABLE Secundaria (
  idSecundaria INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Matricula VARCHAR(20) NULL,
  Nombre VARCHAR(100) NULL,
  Municipio VARCHAR(50) NULL,
  Estado VARCHAR(50) NULL,
  Pais VARCHAR(20) NULL,
  PRIMARY KEY(idSecundaria)
);

CREATE TABLE Carreras (
  idCarreras INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Clave VARCHAR(50) NULL,
  Nombre VARCHAR(50) NULL,
  AreaEspecialidad VARCHAR(50) NULL,
  Estatus BOOL NULL,
  PRIMARY KEY(idCarreras)
);

CREATE TABLE Materia (
  idMateria INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Carreras_idCarreras INTEGER UNSIGNED NOT NULL,
  Clave VARCHAR(50) NULL,
  Nombre VARCHAR(50) NULL,
  Componente CHAR NULL,
  Semestre INT NULL,
  Estatus BOOL NULL,
  PRIMARY KEY(idMateria),
  INDEX Materia_FKIndex1(Carreras_idCarreras),
  FOREIGN KEY(Carreras_idCarreras)
    REFERENCES Carreras(idCarreras)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Grupos (
  idGrupos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  idAsesor INTEGER UNSIGNED NULL,
  Carreras_idCarreras INTEGER UNSIGNED NOT NULL,
  Grupo CHAR NULL,
  Grado INTEGER UNSIGNED NULL,
  CicloEscolar VARCHAR(20) NULL,
  Estatus BOOL NULL,
  PRIMARY KEY(idGrupos),
  INDEX Grupos_FKIndex1(Carreras_idCarreras),
  FOREIGN KEY(Carreras_idCarreras)
    REFERENCES Carreras(idCarreras)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Alumno (
  idAlumno INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Grupos_idGrupos INTEGER UNSIGNED NOT NULL,
  LugarNacimiento_idLugarNacimiento INTEGER UNSIGNED NOT NULL,
  Domicilio_idDomicilio INTEGER UNSIGNED NOT NULL,
  Nombre VARCHAR(25) NULL,
  ApellidoP VARCHAR(20) NULL,
  ApellidoM VARCHAR(20) NULL,
  Fotografia LONGBLOB NULL,
  SS VARCHAR(11) NULL,
  CURP VARCHAR(18) NULL,
  NC VARCHAR(14) NULL,
  FechaNac DATE NULL,
  Correo VARCHAR(50) NULL,
  Sexo VARCHAR(1) NULL,
  Estatus VARCHAR(1) NULL,
  Telefono VARCHAR(10) NULL,
  TelefonoEmergencia VARCHAR(10) NULL,
  PRIMARY KEY(idAlumno),
  INDEX Alumno_FKIndex1(Domicilio_idDomicilio),
  INDEX Alumno_FKIndex2(LugarNacimiento_idLugarNacimiento),
  INDEX Alumno_FKIndex4(Grupos_idGrupos),
  FOREIGN KEY(Domicilio_idDomicilio)
    REFERENCES Domicilio(idDomicilio)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(LugarNacimiento_idLugarNacimiento)
    REFERENCES LugarNacimiento(idLugarNacimiento)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Grupos_idGrupos)
    REFERENCES Grupos(idGrupos)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Personal (
  idPersonal INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  CargaHoraria_idCargaHoraria INTEGER UNSIGNED NOT NULL,
  InformacionLaboral_idInformacionLaboral INTEGER UNSIGNED NOT NULL,
  LugarNacimiento_idLugarNacimiento INTEGER UNSIGNED NOT NULL,
  Domicilio_idDomicilio INTEGER UNSIGNED NOT NULL,
  Nombre VARCHAR(25) NULL,
  ApellidoP VARCHAR(20) NULL,
  ApellidoM VARCHAR(20) NULL,
  NoEmpleado INTEGER UNSIGNED NULL,
  CURP VARCHAR(18) NULL,
  TelefonoCel VARCHAR(10) NULL,
  Correo VARCHAR(50) NULL,
  FechaNacimiento DATE NULL,
  RFC VARCHAR(13) NULL,
  SS VARCHAR(11) NULL,
  Departamento VARCHAR(30) NULL,
  Puesto VARCHAR(30) NULL,
  FechaIngreso DATE NULL,
  PRIMARY KEY(idPersonal),
  INDEX Personal_FKIndex1(Domicilio_idDomicilio),
  INDEX Personal_FKIndex2(LugarNacimiento_idLugarNacimiento),
  INDEX Personal_FKIndex4(InformacionLaboral_idInformacionLaboral),
  INDEX Personal_FKIndex5(CargaHoraria_idCargaHoraria),
  FOREIGN KEY(Domicilio_idDomicilio)
    REFERENCES Domicilio(idDomicilio)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(LugarNacimiento_idLugarNacimiento)
    REFERENCES LugarNacimiento(idLugarNacimiento)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(InformacionLaboral_idInformacionLaboral)
    REFERENCES InformacionLaboral(idInformacionLaboral)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(CargaHoraria_idCargaHoraria)
    REFERENCES CargaHoraria(idCargaHoraria)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE MateriasSecuReprobadas (
  idMateriasSecuReprobadas INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  Materias TEXT NULL,
  Motivo TEXT NULL,
  PRIMARY KEY(idMateriasSecuReprobadas),
  INDEX MateriasSecuReprobadas_FKIndex1(Alumno_idAlumno),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Notas (
  idNotas INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  Asunto VARCHAR(50) NULL,
  Fecha DATE NULL,
  Observacion TEXT NULL,
  idPersonal INTEGER UNSIGNED NULL,
  PRIMARY KEY(idNotas),
  INDEX Notas_FKIndex2(Alumno_idAlumno),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE UsuariosAlumnos (
  idUsuariosAlumnos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  NombreUsuario VARCHAR(20) NULL,
  Contrasena VARCHAR(50) NULL,
  PRIMARY KEY(idUsuariosAlumnos),
  INDEX UsuariosAlumnos_FKIndex1(Alumno_idAlumno),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Justificantes (
  Folio INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  Fecha DATE NULL,
  Hora VARCHAR(10) NULL,
  Estado BOOL NULL,
  Dia INT NULL,
  Mes VARCHAR(10) NULL,
  Anyo INT NULL,
  PRIMARY KEY(Folio),
  INDEX Justificantes_FKIndex1(Alumno_idAlumno),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Usuarios (
  idUsuarios INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Personal_idPersonal INTEGER UNSIGNED NOT NULL,
  NombreUsuario VARCHAR(20) NULL,
  Contrasena VARCHAR(50) NULL,
  PRIMARY KEY(idUsuarios),
  INDEX Usuarios_FKIndex1(Personal_idPersonal),
  FOREIGN KEY(Personal_idPersonal)
    REFERENCES Personal(idPersonal)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE TutoriaIndividual (
  idTutoriaIndividual INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  NoTutoria INTEGER UNSIGNED NULL,
  FechaTutoria DATE NULL,
  Horario TEXT NULL,
  ActividadesTareas TEXT NULL,
  idTutor INTEGER UNSIGNED NULL,
  idGrupo INTEGER UNSIGNED NULL,
  PRIMARY KEY(idTutoriaIndividual),
  INDEX TutoriaIndividual_FKIndex1(Alumno_idAlumno),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE SolicitudBaja (
  idSolicitudBaja INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  idFamiliares INTEGER UNSIGNED NULL,
  idDocenteTutor INTEGER UNSIGNED NULL,
  idCorAcademico INTEGER UNSIGNED NULL,
  idCorAdministrativo INTEGER UNSIGNED NULL,
  idDirector INTEGER UNSIGNED NULL,
  Motivo TEXT NULL,
  ObservacionesTutor TEXT NULL,
  ObservacionesHistorialPagos TEXT NULL,
  idGrupo INTEGER UNSIGNED NULL,
  PRIMARY KEY(idSolicitudBaja),
  INDEX SolicitudBaja_FKIndex1(Alumno_idAlumno),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Retardos (
  idRetardos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Personal_idPersonal INTEGER UNSIGNED NOT NULL,
  fecha DATE NULL,
  Activo BOOL NULL,
  PRIMARY KEY(idRetardos),
  INDEX Retardos_FKIndex1(Personal_idPersonal),
  FOREIGN KEY(Personal_idPersonal)
    REFERENCES Personal(idPersonal)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Permisos (
  idPermisos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Personal_idPersonal INTEGER UNSIGNED NOT NULL,
  Clausula INTEGER UNSIGNED NULL,
  Asunto TEXT NULL,
  Documento TEXT NULL,
  Fecha DATE NULL,
  Observaciones TEXT NULL,
  PRIMARY KEY(idPermisos),
  INDEX Permisos_FKIndex1(Personal_idPersonal),
  FOREIGN KEY(Personal_idPersonal)
    REFERENCES Personal(idPersonal)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Pases (
  idPases INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Personal_idPersonal INTEGER UNSIGNED NOT NULL,
  InicioHora TIME NULL,
  FinHora TIME NULL,
  Observaciones TEXT NULL,
  Motivo TEXT NULL,
  Fecha DATE NULL,
  TipoES VARCHAR(1) NULL,
  PRIMARY KEY(idPases),
  INDEX Pases_FKIndex1(Personal_idPersonal),
  FOREIGN KEY(Personal_idPersonal)
    REFERENCES Personal(idPersonal)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Privilegios (
  idPrivilegios INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Usuarios_idUsuarios INTEGER UNSIGNED NOT NULL,
  TipoPrivilegio INTEGER UNSIGNED NULL,
  PRIMARY KEY(idPrivilegios),
  INDEX Privilegios_FKIndex1(Usuarios_idUsuarios),
  FOREIGN KEY(Usuarios_idUsuarios)
    REFERENCES Usuarios(idUsuarios)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE TestAprendizaje (
  idTestAprendizaje INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  Respuestas VARCHAR(36) NULL,
  Visual INTEGER UNSIGNED NULL,
  Auditivo INTEGER UNSIGNED NULL,
  Kinestesico INTEGER UNSIGNED NULL,
  Total INTEGER UNSIGNED NULL,
  PRIMARY KEY(idTestAprendizaje),
  INDEX TestAprendizaje_FKIndex1(Alumno_idAlumno),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE EncuestaReprobacion (
  idEncuestaReprobacion INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  MateriasReprobadas TEXT NULL,
  Parcial INTEGER UNSIGNED NULL,
  Causas TEXT NULL,
  Sugerencia TEXT NULL,
  Compromisos TEXT NULL,
  Comentarios TEXT NULL,
  idGrupo INTEGER UNSIGNED NULL,
  idTutor INTEGER UNSIGNED NULL,
  idFamiliar INTEGER UNSIGNED NULL,
  Fecha DATE NULL,
  PRIMARY KEY(idEncuestaReprobacion),
  INDEX EncuestaReprobacion_FKIndex1(Alumno_idAlumno),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE DatosMedicos (
  idDatosMedicos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  Enfermedad TEXT NULL,
  Tratamiento TEXT NULL,
  Tabaquismo BOOL NULL,
  Drogadiccion BOOL NULL,
  Alcoholismo BOOL NULL,
  PRIMARY KEY(idDatosMedicos),
  INDEX DatosMedicos_FKIndex1(Alumno_idAlumno),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE EsudiosPersonal (
  idEsudiosPersonal INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Personal_idPersonal INTEGER UNSIGNED NOT NULL,
  NombreEstudio VARCHAR(50) NULL,
  NivelEstudio VARCHAR(50) NULL,
  ComprobanteEstudio VARCHAR(50) NULL,
  Institucion VARCHAR(60) NULL,
  PRIMARY KEY(idEsudiosPersonal),
  INDEX EsudiosPersonal_FKIndex1(Personal_idPersonal),
  FOREIGN KEY(Personal_idPersonal)
    REFERENCES Personal(idPersonal)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Estudios (
  idEstudios INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Personal_idPersonal INTEGER UNSIGNED NOT NULL,
  Nombre VARCHAR(50) NULL,
  TipoEstudio INTEGER UNSIGNED NULL,
  Fecha DATE NULL,
  Institucion VARCHAR(50) NULL,
  PRIMARY KEY(idEstudios),
  INDEX Estudios_FKIndex1(Personal_idPersonal),
  FOREIGN KEY(Personal_idPersonal)
    REFERENCES Personal(idPersonal)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE DatosFamiliares (
  idDatosFamiliares INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  NoHermanos INTEGER UNSIGNED NULL,
  LugarOcupas VARCHAR(20) NULL,
  OtrasPersonas TEXT NULL,
  ActualmenteVives VARCHAR(25) NULL,
  SituacionFamiliar TEXT NULL,
  RelacionPadres CHAR NULL,
  PRIMARY KEY(idDatosFamiliares),
  INDEX DatosFamiliares_FKIndex1(Alumno_idAlumno),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE CartaCompromiso (
  idCartaCompromiso INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  idFamiliar INTEGER UNSIGNED NULL,
  idPersonal INTEGER UNSIGNED NULL,
  Lugar VARCHAR(20) NULL,
  Fecha DATE NULL,
  AcuerdosRealizados TEXT NULL,
  Motivo VARCHAR(50) NULL,
  idGrupo INTEGER UNSIGNED NULL,
  PRIMARY KEY(idCartaCompromiso),
  INDEX CartaCompromiso_FKIndex1(Alumno_idAlumno),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Comisiones (
  idComisiones INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Personal_idPersonal INTEGER UNSIGNED NOT NULL,
  TipoComision VARCHAR(1) NULL,
  Asunto TEXT NULL,
  Fecha DATE NULL,
  Descripcion TEXT NULL,
  PRIMARY KEY(idComisiones),
  INDEX Comisiones_FKIndex1(Personal_idPersonal),
  FOREIGN KEY(Personal_idPersonal)
    REFERENCES Personal(idPersonal)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE CartaResponsiva (
  idCartaResponsiva INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  idFamiliares INTEGER UNSIGNED NULL,
  idPersonal INTEGER UNSIGNED NULL,
  Lugar VARCHAR(50) NULL,
  Fecha DATE NULL,
  Motivos TEXT NULL,
  CompromisosPadres TEXT NULL,
  CompromisosAlumnos TEXT NULL,
  Asunto VARCHAR(50) NULL,
  idGrupo INTEGER UNSIGNED NULL,
  PRIMARY KEY(idCartaResponsiva),
  INDEX CartaResponsiva_FKIndex1(Alumno_idAlumno),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE HabitosEstudio (
  idHabitosEstudio INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  TiempoTarea CHAR NULL,
  TiempoEstudio CHAR NULL,
  TiempoLectura CHAR NULL,
  LugarEstudio VARCHAR(20) NULL,
  EstimulacionEstudio TEXT NULL,
  MotivoAprender CHAR NULL,
  MotivoInteres CHAR NULL,
  MotivoSatisfaccion CHAR NULL,
  MotivoFracaso CHAR NULL,
  MotivoAgradecer CHAR NULL,
  MotivoPremio CHAR NULL,
  MotivoHacer CHAR NULL,
  TecnicasEstudio VARCHAR(10) NULL,
  PRIMARY KEY(idHabitosEstudio),
  INDEX HabitosEstudio_FKIndex1(Alumno_idAlumno),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Inventario (
  idInventario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Personal_idPersonal INTEGER UNSIGNED NOT NULL,
  FActulizacion DATE NULL,
  Area VARCHAR(50) NULL,
  ConceptoDePago VARCHAR(50) NULL,
  Categoria VARCHAR(50) NULL,
  CodigoQR LONGBLOB NULL,
  Descripcion TEXT NULL,
  EstadoFisico CHAR NULL,
  FechaIngreso DATE NULL,
  FechaRegistro DATE NULL,
  IdEstatus VARCHAR(20) NULL,
  Imagen LONGBLOB NULL,
  Marca VARCHAR(30) NULL,
  Modelo VARCHAR(30) NULL,
  NoFactura VARCHAR(15) NULL,
  NoSerie VARCHAR(30) NULL,
  Origenes VARCHAR(50) NULL,
  Proveedores VARCHAR(50) NULL,
  PrecioUnitario DOUBLE NULL,
  TipoInventario VARCHAR(50) NULL,
  Ubicacion VARCHAR(50) NULL,
  PRIMARY KEY(idInventario),
  INDEX Productos_FKIndex1(Personal_idPersonal),
  FOREIGN KEY(Personal_idPersonal)
    REFERENCES Personal(idPersonal)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE ExpectativaNuevaForm (
  idExpectativaNuevaForm INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  Atraccion TEXT NULL,
  Precupacion TEXT NULL,
  EstudioEs VARCHAR(10) NULL,
  ProblemaCausa TEXT NULL,
  Preparado CHAR NULL,
  ValorarProfesor TEXT NULL,
  PRIMARY KEY(idExpectativaNuevaForm),
  INDEX ExpectativaNuevaForm_FKIndex1(Alumno_idAlumno),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE HistorialAlumno (
  idHistorialAlumno INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Grupos_idGrupos INTEGER UNSIGNED NOT NULL,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  Fecha DATE NULL,
  PRIMARY KEY(idHistorialAlumno),
  INDEX HistorialAlumno_FKIndex1(Alumno_idAlumno),
  INDEX HistorialAlumno_FKIndex2(Grupos_idGrupos),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Grupos_idGrupos)
    REFERENCES Grupos(idGrupos)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Canalizacion (
  idCanalizacion INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ProblematicasCanalizacion_idProblematicasCanalizacion INTEGER UNSIGNED NOT NULL,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  idFamiliar INTEGER UNSIGNED NULL,
  Fecha DATE NULL,
  Descripcion TEXT NULL,
  Instancia TEXT NULL,
  Estatus BOOL NULL,
  idGrupo INTEGER UNSIGNED NULL,
  PRIMARY KEY(idCanalizacion),
  INDEX Canalizacion_FKIndex1(Alumno_idAlumno),
  INDEX Canalizacion_FKIndex2(ProblematicasCanalizacion_idProblematicasCanalizacion),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(ProblematicasCanalizacion_idProblematicasCanalizacion)
    REFERENCES ProblematicasCanalizacion(idProblematicasCanalizacion)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE CursosPersonal (
  idCursosPersonal INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  EsudiosPersonal_idEsudiosPersonal INTEGER UNSIGNED NOT NULL,
  Personal_idPersonal INTEGER UNSIGNED NOT NULL,
  NombreEstudio VARCHAR(50) NULL,
  ComprobanteEstudios VARCHAR(50) NULL,
  PRIMARY KEY(idCursosPersonal),
  INDEX CursosDocentes_FKIndex1(Personal_idPersonal),
  INDEX CursosDocentes_FKIndex2(EsudiosPersonal_idEsudiosPersonal),
  FOREIGN KEY(Personal_idPersonal)
    REFERENCES Personal(idPersonal)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(EsudiosPersonal_idEsudiosPersonal)
    REFERENCES EsudiosPersonal(idEsudiosPersonal)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE MateriaGruposDocentes (
  idMateriaGruposDocentes INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Personal_idPersonal INTEGER UNSIGNED NOT NULL,
  Materia_idMateria INTEGER UNSIGNED NOT NULL,
  idGrupo INTEGER UNSIGNED NULL,
  PRIMARY KEY(idMateriaGruposDocentes),
  INDEX MateriaGruposDocentes_FKIndex1(Materia_idMateria),
  INDEX MateriaGruposDocentes_FKIndex3(Personal_idPersonal),
  FOREIGN KEY(Materia_idMateria)
    REFERENCES Materia(idMateria)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Personal_idPersonal)
    REFERENCES Personal(idPersonal)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Familiares (
  idFamiliares INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Domicilio_idDomicilio INTEGER UNSIGNED NOT NULL,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  Nombre VARCHAR(25) NULL,
  ApellidoP VARCHAR(20) NULL,
  ApellidoM VARCHAR(20) NULL,
  FechaNacimiento DATE NULL,
  Profesion VARCHAR(50) NULL,
  LugarTrabajo VARCHAR(50) NULL,
  Parentesco VARCHAR(15) NULL,
  Telefono VARCHAR(10) NULL,
  Tutor BOOL NULL,
  Estatus BOOL NULL,
  Justificantes BOOL NULL,
  Validado BOOL NULL,
  Correo VARCHAR(50) NULL,
  PRIMARY KEY(idFamiliares),
  INDEX Familiares_FKIndex1(Alumno_idAlumno),
  INDEX Familiares_FKIndex2(Domicilio_idDomicilio),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Domicilio_idDomicilio)
    REFERENCES Domicilio(idDomicilio)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Faltas (
  idFaltas INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Personal_idPersonal INTEGER UNSIGNED NOT NULL,
  Fecha DATE NULL,
  Activo BOOL NULL,
  PRIMARY KEY(idFaltas),
  INDEX Faltas_FKIndex1(Personal_idPersonal),
  INDEX Faltas_FKIndex2(Personal_idPersonal),
  FOREIGN KEY(Personal_idPersonal)
    REFERENCES Personal(idPersonal)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Personal_idPersonal)
    REFERENCES Personal(idPersonal)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Reportes (
  Folio INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Personal_idPersonal INTEGER UNSIGNED NOT NULL,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  Fecha DATE NULL,
  Hora TIME NULL,
  NoReporte BIT NULL,
  Estado BOOL NULL,
  PRIMARY KEY(Folio),
  INDEX Reportes_FKIndex1(Alumno_idAlumno),
  INDEX Reportes_FKIndex2(Personal_idPersonal),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Personal_idPersonal)
    REFERENCES Personal(idPersonal)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE DatosEscolares (
  idDatosEscolares INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  Secundaria_idSecundaria INTEGER UNSIGNED NOT NULL,
  PromedioSecu DOUBLE NULL,
  OtrosEstudios TEXT NULL,
  RendimientoEscolar CHAR NULL,
  MateriaGustada TEXT NULL,
  MateriaDisgustada TEXT NULL,
  ReaccionPadres TEXT NULL,
  Espectativa TEXT NULL,
  PRIMARY KEY(idDatosEscolares),
  INDEX DatosEscolares_FKIndex1(Secundaria_idSecundaria),
  INDEX DatosEscolares_FKIndex2(Alumno_idAlumno),
  FOREIGN KEY(Secundaria_idSecundaria)
    REFERENCES Secundaria(idSecundaria)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Recibo (
  idFolio INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ConceptoDePagoDePago_idConceptoDePago INTEGER UNSIGNED NOT NULL,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  Fecha DATE NULL,
  PRIMARY KEY(idFolio),
  INDEX Recibo_FKIndex1(ConceptoDePagoDePago_idConceptoDePago),
  INDEX Recibo_FKIndex2(Alumno_idAlumno),
  FOREIGN KEY(ConceptoDePagoDePago_idConceptoDePago)
    REFERENCES ConceptoDePago(idConceptoDePago)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE MotivosJustificantes (
  Justificantes_Folio INTEGER UNSIGNED NOT NULL,
  Motivo TEXT NULL,
  INDEX MotivosJustificantes_FKIndex1(Justificantes_Folio),
  FOREIGN KEY(Justificantes_Folio)
    REFERENCES Justificantes(Folio)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE ReporteProductos (
  idReporteProductos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Inventario_idInventario INTEGER UNSIGNED NOT NULL,
  Fecha DATE NULL,
  Folio VARCHAR(10) NULL,
  PRIMARY KEY(idReporteProductos),
  INDEX ReporteProductos_FKIndex1(Inventario_idInventario),
  FOREIGN KEY(Inventario_idInventario)
    REFERENCES Inventario(idInventario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Sanciones (
  idSanciones INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Reportes_Folio INTEGER UNSIGNED NOT NULL,
  Sancion TEXT NULL,
  PRIMARY KEY(idSanciones),
  INDEX Sanciones_FKIndex1(Reportes_Folio),
  FOREIGN KEY(Reportes_Folio)
    REFERENCES Reportes(Folio)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Acciones (
  idAcciones INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Reportes_Folio INTEGER UNSIGNED NOT NULL,
  Accion TEXT NULL,
  PRIMARY KEY(idAcciones),
  INDEX Acciones_FKIndex1(Reportes_Folio),
  FOREIGN KEY(Reportes_Folio)
    REFERENCES Reportes(Folio)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Historial (
  idHistorial INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Recibo_idFolio INTEGER UNSIGNED NOT NULL,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idHistorial),
  INDEX Historial_FKIndex1(Recibo_idFolio),
  INDEX Historial_FKIndex2(Alumno_idAlumno),
  FOREIGN KEY(Recibo_idFolio)
    REFERENCES Recibo(idFolio)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Calificaciones (
  idCalificaciones INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  MateriaGruposDocentes_idMateriaGruposDocentes INTEGER UNSIGNED NOT NULL,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  PrimerParcial DOUBLE NULL,
  SegundoParcial DOUBLE NULL,
  TercerParcial DOUBLE NULL,
  EXT DOUBLE NULL,
  idGrupo INTEGER UNSIGNED NULL,
  PRIMARY KEY(idCalificaciones),
  INDEX Calificaciones_FKIndex1(Alumno_idAlumno),
  INDEX Calificaciones_FKIndex2(MateriaGruposDocentes_idMateriaGruposDocentes),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(MateriaGruposDocentes_idMateriaGruposDocentes)
    REFERENCES MateriaGruposDocentes(idMateriaGruposDocentes)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE YoNoAbandono (
  idYoNoAbandono INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  MateriaGruposDocentes_idMateriaGruposDocentes INTEGER UNSIGNED NOT NULL,
  Alumno_idAlumno INTEGER UNSIGNED NOT NULL,
  Actividad VARCHAR(50) NULL,
  Fecha DATE NULL,
  Observaciones TEXT NULL,
  Parcial INT NULL,
  Comentario TEXT NULL,
  PRIMARY KEY(idYoNoAbandono),
  INDEX YoNoAbandono_FKIndex1(Alumno_idAlumno),
  INDEX YoNoAbandono_FKIndex2(MateriaGruposDocentes_idMateriaGruposDocentes),
  FOREIGN KEY(Alumno_idAlumno)
    REFERENCES Alumno(idAlumno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(MateriaGruposDocentes_idMateriaGruposDocentes)
    REFERENCES MateriaGruposDocentes(idMateriaGruposDocentes)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


