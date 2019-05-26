<?php 
if (!isset($_SESSION)) { session_start(); }
if (!isset ($_SESSION['LoggedinDocenteTutor']) && !isset ($_SESSION['IdDocenteTutor']) && !isset ($_SESSION['IdAlumnoDocenteTutor']))
{
   echo "<script language='javascript'>window.location='LoginDocenteTutor.php'</script>";
}
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="./../../../css/bootstrap.min.css">

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="../../../js/bootstrap.min.js"></script>
	<script src="../../../js/jquery.min.js"></script>

	<!--Icono en pestaña-->
	<link rel="icon" type="image/vnd.microsoft.icon" href="./../imagenes/Mapa.ico">

	<!--STYLOS-->
	<link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuLogin.css">
  <link rel="stylesheet" type="text/css" href="./../../../css/EstiloPiePagina.css">


	<!--Iconos-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<script language="javascript" type="text/javascript">
		function validar() {
    //obteniendo el valor que se puso en el campo text del formulario

    banderaRBTN = false;
    rbtEstado = document.getElementsByName('optradioMB');

    for(var i = 0; i < rbtEstado.length; i++){
    	if(rbtEstado[i].checked){
    		banderaRBTN = true;
    		break;
    	}
    }

    if(!banderaRBTN){
    	alert('Verifica motivos de baja Selecciona una opcion!');
    	return false;
    }

    Validacion = document.getElementById('OtroMotivo').disabled;
    if(Validacion == false){
    	miCampoTexto = document.getElementById("OtroMotivo").value;
    	if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
    		alert('Verifica el campo de Otro Motivo esta vacío!');
    		return false;
    	}
    }

    miCampoTexto = document.getElementById('ObservacionesTutor').value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo de Observaciones del Tutor esta vacío!');
        	return false;
        }else{
        	//alert(miCampoTexto);
        	AcuerdosRealizados = '';
        	CadenaObservacionesTutor = miCampoTexto.split('\n');
          //alert(CadenaObservacionesTutor);
          for (var i = 0; i < CadenaObservacionesTutor.length; i++) {
            //alert('AYYY');
            CadenaObservacionesTutor[i].trim();
            TamanoCadena = CadenaObservacionesTutor[i].length;
            //alert(TamanoCadena);
            primer = CadenaObservacionesTutor[i].substr(-TamanoCadena,1);
            //alert(primer);
            ultimo = CadenaObservacionesTutor[i].substr(-1);
            //alert(ultimo);
            
            if((primer == '-')&&(ultimo == '.')&&(TamanoCadena == 2)){
              //alert('-.');
              AcuerdosRealizados = AcuerdosRealizados + '';
          }else if((primer == '-')&&(ultimo == '-')){
              //alert('--');
              AcuerdosRealizados = AcuerdosRealizados + '';
          }else if((primer == '.')&&(ultimo == '.')){
              //alert('..');
              AcuerdosRealizados = AcuerdosRealizados + '';
          }else if((primer == '')&&(ultimo == '')){
              //alert('vacio');
              AcuerdosRealizados = AcuerdosRealizados + '';
          }else if((primer == '-')&&(ultimo > 0) && (TamanoCadena == 2)){
              //alert('Es numerooo');
              AcuerdosRealizados = AcuerdosRealizados + '';
          }else{
          	AcuerdosRealizados = "a";
          }
      }

      if(AcuerdosRealizados.length == 0){
      	alert('Observaciones de tutor no validas verifique por favor');
      	return false;
      }
  }

  miCampoTexto = document.getElementById('ObservacionHistorialPagos').value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo de Observaciones del Historial de pago esta vacío!');
        	return false;
        }else{
        	//alert(miCampoTexto);
        	ObservacionesHP = '';
        	CadenaObservacionesHistorialPagos = miCampoTexto.split('\n');
          //alert(CadenaObservacionesHistorialPagos);
          for (var i = 0; i < CadenaObservacionesHistorialPagos.length; i++) {
            //alert('AYYY');
            CadenaObservacionesHistorialPagos[i].trim();
            TamanoCadena = CadenaObservacionesHistorialPagos[i].length;
            //alert(TamanoCadena);
            primer = CadenaObservacionesHistorialPagos[i].substr(-TamanoCadena,1);
            //alert(primer);
            ultimo = CadenaObservacionesHistorialPagos[i].substr(-1);
            //alert(ultimo);
            
            if((primer == '-')&&(ultimo == '.')&&(TamanoCadena == 2)){
              //alert('-.');
              ObservacionesHP = ObservacionesHP + '';
          }else if((primer == '-')&&(ultimo == '-')){
              //alert('--');
              ObservacionesHP = ObservacionesHP + '';
          }else if((primer == '.')&&(ultimo == '.')){
              //alert('..');
              ObservacionesHP = ObservacionesHP + '';
          }else if((primer == '')&&(ultimo == '')){
              //alert('vacio');
              ObservacionesHP = ObservacionesHP + '';
          }else if((primer == '-')&&(ultimo > 0) && (TamanoCadena == 2)){
              //alert('Es numerooo');
              ObservacionesHP = ObservacionesHP + '';
          }else{
          	ObservacionesHP = "a";
          }
      }

      if(ObservacionesHP.length == 0){
      	alert('Observaciones del Historal de pagos no validas verifique por favor');
      	return false;
      }
  }


  return true;
}
</script>
<script>
	function myFunction(event) {
		var codigo=window.event.keyCode;
		var x = document.getElementById("ObservacionesTutor");
    //alert("soy " + codigo);

    if(codigo===190 || codigo===110){                 
    	x.value = document.getElementById("ObservacionesTutor").value+"\n-";
    }
}

function myFunctionHistorialPagos(event) {
	var codigo=window.event.keyCode;
	var x = document.getElementById("ObservacionHistorialPagos");
    //alert("soy " + codigo);

    if(codigo===190 || codigo===110){                 
    	x.value = document.getElementById("ObservacionHistorialPagos").value+"\n-";
    }
}
</script>
</head>

<script>
	function habilitar(value,caja)
	{
		if(value=='o')
		{
          // habilitamos
          document.getElementById(caja).disabled=false;
      }else if(value!='o'){
          // deshabilitamos
          document.getElementById(caja).disabled=true;
          document.getElementById(caja).value = "";


      }
  }
</script>
<script type="text/javascript">
	function NumerosLetras(e) {
		tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
    	return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9-_.,?)(¿@\s]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>
<body>
	<!--Inicio contenedor Cabecera-->
	<div class="container">
		<br>
		 <?php include "../menus/MenuDocenteTutor.php";
      MenuAlumnoDocenteSolicitidBaja();?>
	</div>
	<!--Fin contenedor Cabecera-->

	<!--Inicio Contenedor medio-->
	<div class="container">
		<!--Poner titulo o nombre -->
		<br><center><h2> Solicitud de baja </h2></center>
		<!--Poner titulo o nombre -->

		<div class="row">
			<!--Inicio Contenido central-->
			<div class="col-sm-1"></div>
			<?php 
			$idDirector = " ";
			$idCorAcademico = " ";
			$idCorAdministrativo = " ";
			$idTutor = " ";
			$Cont = 0;

			include_once "../../clases/MySQLConector.php";

			$Mysql = new MySQLConector();
			$Mysql->Conectar();
			$Consulta6 = "SELECT * FROM `personal` WHERE personal.idPersonal = '".$_SESSION['IdDocenteTutor']."'";
			$Resultado6 = $Mysql->Consulta($Consulta6);
			if($Resultado6)
				while ($fila6 = mysqli_fetch_array($Resultado6)){ 
					$idTutor = $fila6['idPersonal']; 
					$NombreTutor = $fila6['Nombre'] ." ". $fila6['ApellidoP'] ." ". $fila6['ApellidoM'];
				}

				$Consulta3 = "SELECT * FROM `personal` WHERE personal.Puesto = 'Coordinador Academico'";
				$Resultado3 = $Mysql->Consulta($Consulta3);
				if($Resultado3)
					while ($fila3 = mysqli_fetch_array($Resultado3)){ 
						$idCorAcademico = $fila3['idPersonal'];
						$NombreCorAcademico = $fila3['Nombre'] ." ". $fila3['ApellidoP'] ." ". $fila3['ApellidoM'];
					}

					$Mysql = new MySQLConector();
					$Mysql->Conectar();
					$Consulta4 = "SELECT * FROM `personal` WHERE personal.Puesto = 'Coordinador Administrativo'";
					$Resultado4 = $Mysql->Consulta($Consulta4);
					if($Resultado4)
						while ($fila4 = mysqli_fetch_array($Resultado4)){ 
							$idCorAdministrativo = $fila4['idPersonal'];
							$NombreCorAdministrativo = $fila4['Nombre'] ." ". $fila4['ApellidoP'] ." ". $fila4['ApellidoM'];
						}

						$Consulta5 = "SELECT * FROM `personal` WHERE personal.Puesto = 'Director del Plantel'";
						$Resultado5 = $Mysql->Consulta($Consulta5);
						if($Resultado5)
							while ($fila5 = mysqli_fetch_array($Resultado5)){ 
								$idDirector = $fila5['idPersonal'];
								$NombreDirector = $fila5['Nombre'] ." ". $fila5['ApellidoP'] ." ". $fila5['ApellidoM'];
							}


							$Consulta6 = "SELECT calificaciones.idCalificaciones,calificaciones.EXT, materia.Componente, 
							(CASE
							WHEN (materia.Componente='B')AND(calificaciones.EXT<6) THEN 'Esta reprobada'
							WHEN (materia.Componente='B')AND(calificaciones.EXT>=6) THEN 'Esta aprobada'
							WHEN (materia.Componente='P')AND(calificaciones.EXT<8) THEN 'Esta reprobada'
							WHEN (materia.Componente='P')AND(calificaciones.EXT>=8) THEN 'Esta aprobada'

							END) AS respuesta

							FROM calificaciones
							INNER JOIN  materiagruposdocentes ON materiagruposdocentes.idMateriaGruposDocentes= calificaciones.MateriaGruposDocentes_idMateriaGruposDocentes
							INNER JOIN materia ON materiagruposdocentes.Materia_idMateria= materia.idMateria 
							WHERE calificaciones.Alumno_idAlumno='".$_SESSION['IdAlumnoDocenteTutor']."'";
							$Resultado6 = $Mysql->Consulta($Consulta6);
							if($Resultado6)
								while ($fila6 = mysqli_fetch_array($Resultado6)){ 
									if($fila6['respuesta'] == "Esta reprobada"){
										$Cont++;
									}
								}


								?>
								<?php
								if (!isset($_POST['OtroMotivo'])&&!isset($_POST['ObservacionesTutor'])&&!isset($_POST['ObservacionHistorialPagos'])) {
									?>
									<div class="col-sm-10">
										<!--Inicio de contenido de caja de texto--> 
										<form method="POST" action="AltaSolicitudBajaTutor.php" onsubmit="return validar()" >
											<?php
											include_once "../../clases/MySQLConector.php";
											$Mysql = new MySQLConector();
											$Mysql->Conectar();

											$Consulta = "SELECT alumno.Grupos_idGrupos, alumno.Nombre, alumno.ApellidoP, alumno.ApellidoM, alumno.NC, grupos.Grado, grupos.Grupo, carreras.Nombre AS Carrera, domicilio.Calle, domicilio.Numero, domicilio.Localidad, domicilio.Municipio, alumno.Telefono, alumno.Correo, alumno.SS FROM alumno INNER JOIN grupos ON alumno.Grupos_idGrupos = grupos.idGrupos INNER JOIN carreras ON grupos.Carreras_idCarreras = carreras.idCarreras INNER JOIN domicilio ON alumno.Domicilio_idDomicilio = domicilio.idDomicilio WHERE alumno.idAlumno ='".$_SESSION['IdAlumnoDocenteTutor']."'";
											$Resultado = $Mysql->Consulta($Consulta);

											while ($fila = $Resultado->fetch_assoc()) {
												?>
												<hr>
												<div class="row">
													<div class="col-md-6">
														<b>Nombre del alumno:</b>
														<label for="NombreAlumno"><?php echo $fila['Nombre']?> <?php echo $fila['ApellidoP']?> <?php echo $fila['ApellidoM']?></label>
													</div>
													<div class="col-md-6">
														<b>Numero de control:</b> <label for="NC"><?php echo $fila['NC']?> </label>
													</div>
												</div>
												<div class="row">
													<div class="col-md-3">
														<b>Grado y Grupo:</b> <label for="Grado"> <?php echo $fila['Grado']?>-<?php echo $fila['Grupo']?> </label>
													</div>
													<div class="col-md-9">
														<b>Carrera que cursa:</b> <label for="Carrera"> <?php echo $fila['Carrera']?></label>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 list-inline">
														<b>Nombre Padre o Tutor:</b> 
														<select  name="Padre" class="m-1 custom-select"> 
															<?php
															include_once "../../clases/MySQLConector.php";

															$Mysql = new MySQLConector();
															$Mysql->Conectar();
															$Consulta2 = "SELECT familiares.idFamiliares, familiares.Nombre, familiares.ApellidoP, familiares.ApellidoM FROM familiares WHERE familiares.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' AND familiares.Tutor = '1';";
															$Resultado2 = $Mysql->Consulta($Consulta2);
															if($Resultado2)
																while ($fila2 = mysqli_fetch_array($Resultado2)){           
																	echo " <option value=\"{$fila2['idFamiliares']}\">{$fila2['Nombre']} {$fila2['ApellidoP']} {$fila2['ApellidoM']}</option>";
																}
																?>
															</select>
														</div>
													</div>
													<?php echo "<input type=\"hidden\" value=".$fila['Grupos_idGrupos']." id=\"idGrupo\" name=\"idGrupo\">" ?>
													<div class="row">
														<div class="col-md-3">
															<b>Calle:</b> <label for="Calle"><?php echo $fila['Calle']?> </label>
														</div>
														<div class="col-md-3">
															<b>Numero:</b> <label for="NumeroCasa"> <?php echo $fila['Numero']?> </label>
														</div>
														<div class="col-md-3">
															<b>Comunidad:</b> <label for="Comunidad"><?php echo $fila['Localidad']?> </label>
														</div>
														<div class="col-md-3">
															<b>Municipio:</b> <label for="Municipio"> <?php echo $fila['Municipio']?> </label>
														</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															<b>Telefono:</b> <label for="Telefono"> <?php echo $fila['Telefono']?> </label>
														</div>
														<div class="col-md-3">
															<b>Correo:</b> <label for="Correo"> <?php echo $fila['Correo']?></label>
														</div>
														<div class="col-md-3">
															<b>Num de SSA:</b> <label for="SSA"> <?php echo $fila['SS']?></label>
														</div>
														<div class="col-md-3">
															<b>Adeudo de Materias:</b> <label for="MateriasAdeudadas"> <?php echo $Cont ?></label>
														</div>
													</div>
												<?php }?>
												<div class="row">
													<div class="col-md-12">
														<div class=" form-check-inline form-inline">
															<b>Motivo de baja:</b>
															<input type="radio" class="m-2" name="optradioMB"  id="optradioMB" value="p"  onclick="habilitar(this.value,'OtroMotivo')" />Personal
															<input type="radio" class="m-2" name="optradioMB"  id="optradioMB" value="e"  onclick="habilitar(this.value,'OtroMotivo')"/>Economico
															<input type="radio" class="m-2" name="optradioMB"  id="optradioMB" value="a"  onclick="habilitar(this.value,'OtroMotivo')"/>Academico
															<input type="radio" class="m-2" name="optradioMB"  id="optradioMB" value="c"  onclick="habilitar(this.value,'OtroMotivo')"/>Cambio de Residencia
															<input type="radio" value="o"  class="m-2 form-check-input" name="optradioMB" id="optradioMB"  onclick="habilitar(this.value,'OtroMotivo')">Otra
														</div> 
														<input type="text" id="OtroMotivo" name="OtroMotivo" disabled class="m-2 form-control" placeholder="Describa"  onkeypress="return NumerosLetras(event);" />
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<h4>DATOS DE TUTOR</h4>
														<div class="flex-row">

															<b>Nombre del tutor: </b> <label for="NombreTutor"></label><?php echo $NombreTutor; ?></label>
														</div>
														<div class="flex-row">
															<b>Observaciones del tutor: </b> <textarea type="text" name="ObservacionesTutor" class="m-2 form-control" id="ObservacionesTutor" placeholder="Observaciones" onkeyup="myFunction(event)"  onkeypress="return NumerosLetras(event);">-</textarea>
														</div>
														<div class="flex-row">
															<b>Coordinación académica: </b> <label for=""><?php echo $NombreCorAcademico;  ?></label>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<h4>COORDINACIÓN ADMINISTRATIVA</h4>
														<div class="flex-row">
															<b>Observaciones del historial de pagos:</b> <textarea type="text" name="ObservacionHistorialPagos" id="ObservacionHistorialPagos" class="m-2 form-control" id="formGroupExampleInput" placeholder="Observaciones" onkeyup="myFunctionHistorialPagos(event)"  onkeypress="return NumerosLetras(event);">-</textarea>
														</div>
														<div class="flex-row">
															<b>Coordinadora Administrativa: </b><label for=""><?php echo $NombreCorAdministrativo; ?></label>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<h4>DIRECCIÓN</h4>
														<p align="justify">
															Una vez que se ha recabado la información del alumno y que las partes correspondientes realizaron las acciones
															pertinentes para evitar la baja, es importante señalar que después de haber realizado la presente solicitud es
															imposible la reincorporación del alumno a esta institución educativa.
														</p>
														<div class="flex-row">
															<b>Director del Plantel: </b><label for=""><?php echo $NombreDirector; ?></label>

														</div>
													</div>

												</div>
												<button type="submit" class="btn btn-success glyphicon glyphicon-plus"> Guardar</button><br><br>
												<br>
												<br>
											</form>     
											<!--Fin de contenido de caja de texto--> 

											<?php
										}else{

											$idFamiliares = $_POST['Padre'];
											$Alumno_idAlumno = $_SESSION['IdAlumnoDocenteTutor'];
											$Motivo = $_POST['optradioMB'];
											$idGrupo = $_POST['idGrupo'];

											if($Motivo == 'o'){
												$var = $_POST['OtroMotivo'];
											}elseif ($Motivo == 'p') {
												$var = "Personal";
											}elseif ($Motivo == 'e') {
												$var = "Economico";
											}elseif ($Motivo == 'a') {
												$var = "Academico";
											}elseif ($Motivo == 'c') {
												$var = "Cambio de Residencia";
											}
                //$Otro = $_POST['OtroMotivo'];

											$CadenaObservacionesTutor =explode("\n", $_POST['ObservacionesTutor']);
											$ObservacionesTutor = '';
											for ($i=0; $i < count($CadenaObservacionesTutor); $i++) {
												$CadenaObservacionesTutor[$i] = trim($CadenaObservacionesTutor[$i]);
												$primer = substr($CadenaObservacionesTutor[$i],0,1);
												$ultimo = substr($CadenaObservacionesTutor[$i], -1);
                    //print_r('Primer'.$primer);
                    //print_r('Ultimo'.$ultimo.'******');
												$TamanoCadena = strlen($CadenaObservacionesTutor[$i]);
                    //print_r($TamanoCadena);

												if((ord($primer) == 45)&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122)) || ((ord($ultimo)>= 48)&&(ord($ultimo) <= 57)) )){
													$ObservacionesTutor = $ObservacionesTutor.substr($CadenaObservacionesTutor[$i],0,$TamanoCadena).'.'.'|';
												}elseif ((((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122))))&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122))))) {
													$ObservacionesTutor = $ObservacionesTutor.'-'.substr($CadenaObservacionesTutor[$i],0,$TamanoCadena).'.'.'|';
												} elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena > 3)){
                      //print_r("-.");
													$ObservacionesTutor = $ObservacionesTutor.$CadenaObservacionesTutor[$i].'|';
												}elseif((ord($primer)== 45)&&(ord($ultimo)==45)){
                      //print_r("--");
													$ObservacionesTutor = $ObservacionesTutor;
												}elseif((ord($primer)== 46)&&(ord($ultimo)==46)){
                      //print_r("..");
													$ObservacionesTutor = $ObservacionesTutor;
												}elseif((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122)))&&(ord($ultimo)==46)){
													$ObservacionesTutor = $ObservacionesTutor.'-'.substr($CadenaObservacionesTutor[$i],0,$TamanoCadena).'|';
												}elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena == 3)){
                      //print_r("-.3");
													$ObservacionesTutor = $ObservacionesTutor;
												}elseif((ord($primer) == 00)&&(ord($ultimo) == 00)){
                      //print_r("vacio");
													$ObservacionesTutor = $ObservacionesTutor;
												}
                  //echo "<script language='javascript'>alert('".$ObservacionesTutor."')</script>";
											}

											$CadenaObservacionesHistorialPagos =explode("\n", $_POST['ObservacionHistorialPagos']);
											$ObservacionesHistorialPagos = '';
											for ($i=0; $i < count($CadenaObservacionesHistorialPagos); $i++) {
												$CadenaObservacionesHistorialPagos[$i] = trim($CadenaObservacionesHistorialPagos[$i]);
												$primer = substr($CadenaObservacionesHistorialPagos[$i],0,1);
												$ultimo = substr($CadenaObservacionesHistorialPagos[$i], -1);
                    //print_r('Primer'.$primer);
                    //print_r('Ultimo'.$ultimo.'******');
												$TamanoCadena = strlen($CadenaObservacionesHistorialPagos[$i]);
                    //print_r($TamanoCadena);

												if((ord($primer) == 45)&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122)) || ((ord($ultimo)>= 48)&&(ord($ultimo) <= 57)) )){
													print_r('a');
													$ObservacionesHistorialPagos = $ObservacionesHistorialPagos.substr($CadenaObservacionesHistorialPagos[$i],0,$TamanoCadena).'.'.'|';
												}elseif ((((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122))))&&(((ord($ultimo) >= 65) && (ord($ultimo) <= 90)) || ((ord($ultimo) >= 97) && (ord($ultimo) <= 122))))) {
													print_r('b');
													$ObservacionesHistorialPagos = $ObservacionesHistorialPagos.'-'.substr($CadenaObservacionesHistorialPagos[$i],0,$TamanoCadena).'.'.'|';
												} elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena > 3)){
                      //print_r("-.");
													$ObservacionesHistorialPagos = $ObservacionesHistorialPagos.$CadenaObservacionesHistorialPagos[$i].'|';
												}elseif((ord($primer)== 45)&&(ord($ultimo)==45)){
                      //print_r("--");
													$ObservacionesHistorialPagos = $ObservacionesHistorialPagos;
												}elseif((ord($primer)== 46)&&(ord($ultimo)==46)){
                      //print_r("..");
													$ObservacionesHistorialPagos = $ObservacionesHistorialPagos;
												}elseif((((ord($primer) >= 65) && (ord($primer) <= 90)) || ((ord($primer) >= 97) && (ord($primer) <= 122)))&&(ord($ultimo)==46)){
													$ObservacionesHistorialPagos = $ObservacionesHistorialPagos.'-'.substr($CadenaObservacionesHistorialPagos[$i],0,$TamanoCadena).'|';
												}elseif((ord($primer)== 45)&&(ord($ultimo)==46)&&($TamanoCadena == 3)){
                      //print_r("-.3");
													$ObservacionesHistorialPagos = $ObservacionesHistorialPagos;
												}elseif((ord($primer) == 00)&&(ord($ultimo) == 00)){
                      //print_r("vacio");
													$ObservacionesHistorialPagos = $ObservacionesHistorialPagos;
												}
                  //echo "<script language='javascript'>alert('".$ObservacionesHistorialPagos."')</script>";
											}


											include_once "../../clases/SQLControlador.php";
											include_once "../../clases/SolicitudBaja.php";

											$SolicitudBaja = new SolicitudBaja();

											$SolicitudBaja->setidFamiliares($idFamiliares);
											$SolicitudBaja->setidDocenteTutor($idTutor);
											$SolicitudBaja->setidCorAcademico($idCorAcademico);
											$SolicitudBaja->setidCorAdministrativo($idCorAdministrativo);
											$SolicitudBaja->setidDirector($idDirector);
											$SolicitudBaja->setidGrupo($idGrupo);
											$SolicitudBaja->setAlumno_idAlumno($Alumno_idAlumno);
											$SolicitudBaja->setMotivo($var);
											$SolicitudBaja->setObservacionesTutor($ObservacionesTutor);
											$SolicitudBaja->setObservacionesHistorialPagos($ObservacionesHistorialPagos);

											$SQLControlador = new SQLControlador();
											$SQLControlador->AgregarSolicitudBaja($SolicitudBaja);
										}
										?>
									</div>
									<!--Fin Contenido central-->
								</div>
								<!--Fin Contenedor medio-->

								<!--Inicio de pie de pagina-->
								<?php include '../menus/PiePagina.php';?>

								<!--fin de pie de pagina-->
							</body>
							</html>
							<script type="text/javascript">
								$(document).ready(function(){
									$('#OtroMotivo').on('input', function (e) {
										if (!/^[ a-z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
											this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
										}
									});

									$('#ObservacionesTutor').on('input', function (e) {
										if (!/^[ a-z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
											this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
										}
									});

									$('#ObservacionHistorialPagos').on('input', function (e) {
										if (!/^[ a-z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
											this.value = this.value.replace(/[^a-z0-9.,-_\s]+/ig,"");
										}
									});
								});
							</script>