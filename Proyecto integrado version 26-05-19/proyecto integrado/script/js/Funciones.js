function AgregarNuevaCarrera(clave,nombre,area){

	cadena="clave=" + clave + 
	"&nombre=" + nombre +
	"&area=" + area;

	$.ajax({
		type:"GET",
		url:"./../../clases/tablasmodales/AgregarCarreras.php",
		data:cadena,
		success:function(carr){
			if(carr==1){
				$('#tabla').load('./../../clases/tablasmodales/TablaCarreras.php');
				$('#buscador').load('./../../clases/tablasmodales/BuscadorCarreras.php');
				alert("Carrera gregada con éxito!");
			}else{
				alert("Error, ya se encuentra creada la carrera");
			}
		}
	});

}

function VerDatosCarreraModificacion(datos){

	d=datos.split('||');
	var numero=d[4];
	$('#idu').val(d[0]);
	$('#claveu').val(d[1]);
	$('#nombreu').val(d[2]);
	$('#areau').val(d[3]);
	$("#estatusu").val(numero);
}



function ModificacionCarrera(){


	id=$('#idu').val();
	clave=$('#claveu').val();
	nombre=$('#nombreu').val();
	area=$('#areau').val();
	estatus=$('#estatusu').val();

	cadena= "id=" + id +
	"&clave=" + clave + 
	"&nombre=" + nombre +
	"&estatus=" + estatus+
	"&area=" + area;

	$.ajax({
		type:"GET",
		url:"./../../clases/tablasmodales/ModificarCarrera.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('./../../clases/tablasmodales/TablaCarreras.php');
				$('#buscador').load('./../../clases/tablasmodales/BuscadorCarreras.php');
				alert("Carrera actualizada con éxito!");
			}else{
				alert("Error al modificar carrera, ya se encuentra creada");
			}
		}
	});

}

function AgregarNuevaMateria(carreras,clave,nombre,componente,semestre){

	cadena="carreras=" + carreras + 
	"&clave=" + clave +
	"&nombre=" + nombre +
	"&componente=" + componente +
	"&semestre=" + semestre;

	$.ajax({
		type:"GET",
		url:"./../../clases/tablasmodales/AgregarMaterias.php",
		data:cadena,
		success:function(carr){
			if(carr==1){
				$('#tabla').load('./../../clases/tablasmodales/TablaMaterias.php');
				$('#buscador').load('./../../clases/tablasmodales/BuscadorMaterias.php');
				alert("Materia gregada con éxito!");
			}else{
				alert("Error, esta materia ya se encuentra con la carrera");
			}
		}
	});

}

function VerDatosMateriaModificacion(datosMat){

	dm=datosMat.split('||');
	var carreramat =dm[7];
	$("#carrerau").val(carreramat);
	$('#carrerau').change();
	$('#idu').val(dm[0]);
	$('#claveu').val(dm[2]);
	$('#nombreu').val(dm[3]);
	var componentemat =dm[4];
	$("#componenteu").val(componentemat);
	$('#componenteu').change();
	$('#semestreu').val(dm[5]);
	var estatusmat =dm[6];
	$("#estatusu").val(estatusmat);
	$('#estatusu').change();

}

function ModificacionMateria(){
	id=$('#idu').val();
	carrera=$('#carrerau').val();
	clave=$('#claveu').val();
	nombre=$('#nombreu').val();
	componente=$('#componenteu').val();
	semestre=$('#semestreu').val();
	estatus=$('#estatusu').val();

	cadena= "id=" + id +
	"&carrera=" + carrera + 
	"&clave=" + clave + 
	"&nombre=" + nombre +
	"&componente=" + componente+
	"&semestre=" + semestre+
	"&estatus=" + estatus;

	$.ajax({
		type:"GET",
		url:"./../../clases/tablasmodales/ModificarMateria.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('./../../clases/tablasmodales/TablaMaterias.php');
				$('#buscador').load('./../../clases/tablasmodales/BuscadorMaterias.php');
				alert("Materia actualizada con éxito!");
			}else{
				alert("Error al modificar materia, esta materia ya se encuentra con la carrera");
			}
		}
	});

}

function AgregarNuevoGrupo(asesor,carrera,grado,grupo,ciclo){

	cadena="asesor=" + asesor + 
	"&carrera=" + carrera +
	"&grado=" + grado +
	"&grupo=" + grupo +
	"&ciclo=" + ciclo;

	$.ajax({
		type:"GET",
		url:"./../../clases/tablasmodales/AgregarGrupos.php",
		data:cadena,
		success:function(carr){
			if(carr==1){
				$('#tabla').load('./../../clases/tablasmodales/TablaGrupos.php');
				$('#buscador').load('./../../clases/tablasmodales/BuscadorGrupos.php');
				alert("Grupo agregado con éxito!");
			}else if (carr==0){
				alert("Error ya se encuentra creado el grupo");
			}else if(carr==2){
				alert("Error ya se encuentra asignado el tutor");
			}else if(carr==3){
				alert("Error ya se encuentra asignado el grupo");
			}
		}
	});

}

function VerDatosGrupoModificacion(datosMat){

	dm=datosMat.split('||');
	$('#idu').val(dm[0]);
	var asesorgrup =dm[1];
	$("#asesoru").val(asesorgrup);
	$('#asesoru').change();
	var carreragrup =dm[3];
	$("#carrerau").val(carreragrup);
	$('#carrerau').change();
	
	$('#gradou').val(dm[5]);
	$('#grupou').val(dm[6]);
	
	$('#ciclou').val(dm[7]);
	var estatusgrup =dm[8];
	$("#estatusu").val(estatusgrup);
	$('#estatusu').change();

}
function ModificacionGrupo(){
	id=$('#idu').val();
	asesor=$('#asesoru').val();
	carrera=$('#carrerau').val();
	grado=$('#gradou').val();
	grupo=$('#grupou').val();
	ciclo=$('#ciclou').val();
	estatus=$('#estatusu').val();

	cadena= "id=" + id +
	"&asesor=" + asesor +
	"&carrera=" + carrera +  
	"&grado=" + grado +
	"&grupo=" + grupo+
	"&ciclo=" + ciclo+
	"&estatus=" + estatus;

	$.ajax({
		type:"GET",
		url:"./../../clases/tablasmodales/ModificarGrupos.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('./../../clases/tablasmodales/TablaGrupos.php');
				$('#buscador').load('./../../clases/tablasmodales/BuscadorGrupos.php');
				alert("Grupo actualizado con éxito !");
			}else if(r==0){
				alert("Error al modificar grupo");
			}else if (r==2) {
				alert("Error ya se encuentra asignado el tutor");
			}else if (r==3){
				alert("Error ya se encuentra asignado el grupo");
			}

		}
	});

}

function VerDocenteMateriaGrupo(datos){
	d=datos.split('||');
	$('#idu').val(d[0]);
	$('#carrerau').val(d[7]);
	$('#gradou').val(d[5]);
	$('#grupou').val(d[6]);
	$('#materiau').val(d[3]);
	var docente =d[1];
	$("#docenteu").val(docente);
	$('#docenteu').change();
}

function ModificacionMatereriaGrupoDocente(){
	id=$('#idu').val();
	docente=$('#docenteu').val();

	cadena= "id=" + id +
	"&docente=" + docente;

	$.ajax({
		type:"GET",
		url:"./../../clases/tablasmodales/ModificarMateriaGrupoDocentes.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('./../../clases/tablasmodales/TablaMateriaGruposDocentes.php');
				$('#buscador').load('./../../clases/tablasmodales/BuscadorMateriaGrupoDocente.php');
				alert("Se actualizado la asignación con éxito!");
			}else{
				alert("Error al asignar docente, materia, grupo");
			}

		}
	});

}

function agregarDatos(Nombre,ApellidoP,ApellidoM,FechaNacimiento,Profesion,LugarTrabajo,Parentesco,Telefono,Tutor,Justificantes,Correo,CP,Calle,Numero,Colonia,Municipio,Localidad,Estado,TelefonoCasa){

	cadena= "&Nombre=" + Nombre + 
	"&ApellidoP=" + ApellidoP +
	"&ApellidoM=" + ApellidoM +
	"&FechaNacimiento=" + FechaNacimiento +
	"&Profesion=" + Profesion +
	"&LugarTrabajo=" + LugarTrabajo +
	"&Parentesco=" + Parentesco +
	"&Telefono=" + Telefono +
	"&Tutor=" + Tutor +
	"&Justificantes=" + Justificantes +
	"&Correo=" + Correo +
	"&CP=" + CP +
	"&Calle=" + Calle +
	"&Numero=" + Numero +
	"&Colonia=" + Colonia +
	"&Municipio=" + Municipio +
	"&Localidad=" + Localidad +
	"&Estado=" + Estado +
	"&TelefonoCasa=" + TelefonoCasa ;

	$.ajax({
		type:"POST",
		url:"./../../clases/tablasmodales/AgregarDatosFamiliar.php",
		data:cadena,
		success:function(ad){
			if(ad==1){
				$('#tabla').load('../../clases/tablasmodales/TablaFamiliares.php');
				alert("Familiar agregado correctamente!");
			}else if(ad==4){
				alert("Familiar ya dado de alta");
			}else{
				alert("Error al ser Guardado");

			}
		}
		
	});

}

function agregaform(datos){
	
	d=datos.split('||');
	Parentesco = d[7];
	$('#idpersona').val(d[0]);
	$('#nombreu').val(d[1]);
	$('#apellidopaternou').val(d[2]);
	$('#apellidomaternou').val(d[3]);
	$('#fechanacimientou').val(d[4]);
	$('#profesionu').val(d[5]);
	$('#lugartrabajou').val(d[6]);
	$('#parentescou').val(d[7]);
	$('#telefonou').val(d[8]);
	if((Parentesco=='Madre')||(Parentesco=='Padre')){
		$("#Tutoru").prop("checked", true);
		$("#Justificantesu").prop("checked", true);
		$("#Tutoru").prop("disabled", true);
		$("#Justificantesu").prop("disabled", true);
	}else {
		$('#Tutoru').val([d[9]]);
		$('#Justificantesu').val([d[10]]);
		$("#Tutoru").prop("disabled", false);
		$("#Justificantesu").prop("disabled", false);
	}
	$('#emailu').val(d[11]);
	$('#CPu').val(d[12]);
	$('#Calleu').val(d[13]);
	$('#Numerou').val(d[14]);
	$('#Coloniau').val(d[15]);
	$('#Municipiou').val(d[16]);
	$('#Localidadu').val(d[17]);
	$('#Estadou').val(d[18]);
	$('#TelCasau').val(d[19]);
	$('#Estatus').val(d[20]);

}

function actualizaDatos(){

	Id=$('#idpersona').val();
	Nombre= $('#nombreu').val();
	ApellidoP=$('#apellidopaternou').val();
	ApellidoM=$('#apellidomaternou').val();
	FechaNacimiento=$('#fechanacimientou').val();
	Profesion=$('#profesionu').val();
	LugarTrabajo=$('#lugartrabajou').val();
	Parentesco=$('#parentescou').val();
	Telefono=$('#telefonou').val();
	Tutor=$('#Tutoru').prop('checked');
	if(Tutor == false){
		Tutor = '0';
	}else if (Tutor == true) {
		Tutor = '1';
	}
	Justificantes=$('#Justificantesu').prop('checked');
	if(Justificantes == false){
		Justificantes = '0';
	}else if (Justificantes == true) {
		Justificantes = '1';
	}
	Correo=$('#emailu').val();
	CP=$('#CPu').val();
	Calle=$('#Calleu').val();
	Numero=$('#Numerou').val();
	Colonia=$('#Coloniau').val();
	Municipio=$('#Municipiou').val();
	Localidad=$('#Localidadu').val();
	Estado=$('#Estadou').val();
	TelefonoCasa=$('#TelCasau').val();
	Estatus=$('#Estatus').val();

	cadena= "Id=" + Id +
	"&Nombre=" + Nombre + 
	"&ApellidoP=" + ApellidoP +
	"&ApellidoM=" + ApellidoM +
	"&FechaNacimiento=" + FechaNacimiento +
	"&Profesion=" + Profesion +
	"&LugarTrabajo=" + LugarTrabajo +
	"&Parentesco=" + Parentesco +
	"&Telefono=" + Telefono +
	"&Tutor=" + Tutor +
	"&Justificantes=" + Justificantes +
	"&Correo=" + Correo +
	"&CP=" + CP +
	"&Calle=" + Calle +
	"&Numero=" + Numero +
	"&Colonia=" + Colonia +
	"&Municipio=" + Municipio +
	"&Localidad=" + Localidad +
	"&Estado=" + Estado +
	"&TelefonoCasa=" + TelefonoCasa+
	"&Estatus=" + Estatus ;
	;

	$.ajax({
		type:"POST",
		url:"../../clases/tablasmodales/ActualizaDatosFamiliar.php",
		data:cadena,
		success:function(cd){
			if(cd==1){
				$('#tabla').load('../../clases/tablasmodales/TablaFamiliares.php');
				//alertify.success("agregado con exito :)");
				alert("Los cambios se han realizado correctamente!");
			}else{
				//alertify.error("Fallo el servidor :(");
				alert("Error al Actualizar información");
			}
		}
	});

}

function agregarDatosCanalizacion(idAlumno,idFamiliar,idProblematica,DescripcionBreve,Instancia,Fecha){

	cadena= "&idAlumno=" + idAlumno + 
	"&idFamiliar=" + idFamiliar +
	"&idProblematica=" + idProblematica +
	"&Descripcion=" + DescripcionBreve +
	"&Fecha=" + Fecha +
	"&Instancia=" + Instancia ;

	$.ajax({
		type:"POST",
		url:"../../clases/tablasmodales/AgregarCanalizacion.php",
		data:cadena,
		success:function(ad){
			if(ad==1){
				$('#tabla').load('../../clases/tablasmodales/TablaCanalizaciones.php');
				alert("Canalizacion agregada correctamente!");
			}else if(ad==4){
				alert("Familiar ya dado de alta");
			}else{
				alert("Error al ser Guardado");

			}
		}
		
	});

}

function agregaformCanalizacion(datos){
	
	d=datos.split('||');
	$('#idcanalizacionu').val(d['0']);
	$('#fechau').val(d['4']);
	$('#problematicau').val(d['7']);
	$('#tutorlegalu').val(d['1']+' '+d['2']+' '+d['3']);
	$('#descripcionbreveu').val(d['6']);
	$('#instanciau').val(d['5']);
	$('#estatusu').val(d['8']);
}

function actualizaDatosCanalizacion(){
	$IdC =$('#idcanalizacionu').val();
	$EstatusC =$('#estatusu').val();

	cadena= "idCanalizacion=" + $IdC +
	"&Estatus=" + $EstatusC ;


	$.ajax({
		type:"POST",
		url:"../../clases/tablasmodales/ActualizaDatosCanalizacion.php",
		data:cadena,
		success:function(c){
			alert(c);
			if(c==1){
				$('#tabla').load('../../clases/tablasmodales/TablaCanalizaciones.php');
				//alertify.success("agregado con exito :)");
				alert("Los cambios se han realizado correctamente!");
			}else{
				//alertify.error("Fallo el servidor :(");
				alert("Error al actualizar informacion");
			}
		}
	});
}

function agregarDatosTutoriaIndividual(idAlumno,idTutor,FechaTutoria,Horario,ActividadesTareas,Asistencia){

	cadena= "&idAlumno=" + idAlumno + 
	"&idTutor=" + idTutor +
	"&FechaTutoria=" + FechaTutoria +
	"&Horario=" + Horario +
	"&ActividadesTareas=" + ActividadesTareas +
	"&Asistencia=" + Asistencia;

	$.ajax({
		type:"POST",
		url:"../../clases/tablasmodales/AgregarTutoriaIndividual.php",
		data:cadena,
		success:function(ad){
			if(ad==1){
				$('#tabla').load('./../../clases/tablasmodales/TablaTutoriasIndividuales.php');
				alert("Tutoria agregada correctamente!");
			}else if(ad==4){
				alert("Familiar ya dado de alta");
			}else{
				alert("Error al ser Guardado");

			}
		}
		
	});

}


