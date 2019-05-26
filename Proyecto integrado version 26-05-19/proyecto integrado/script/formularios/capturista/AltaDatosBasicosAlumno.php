<?php
if (!isset($_SESSION)) { session_start(); }
if (!isset ($_SESSION['LoggedinCAP']))
{
   echo "<script language='javascript'>window.location='LoginCE.php'</script>";
};
unset($_SESSION['consulta']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!--  meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="./../../../css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="./../../../css/select2.css">



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="./../../../js/jquery-3.3.1.js"></script>
	<script src="./../../../js/jquery-3.3.1.min.js"></script>
	<script src="./../../../js/jquery-3.3.1.slim.min.js"></script>
	<script src="./../../../js/popper.min.js"></script>
	<script src="./../../../js/bootstrap.min.js"></script>
  <script src="./../../../js/select2.js"></script>


	<!--Icono en pestaña-->
	<link rel="icon" type="image/vnd.microsoft.icon" href="../../../imagenes/Mapa.ico">

	<!--STYLOS-->
	<link rel="stylesheet" type="text/css" href="./../../../css/EstiloPiePagina.css">
    <link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuCapturista.css">

    <!--Iconos-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script>
      function soloNumeros(e){
         var key = window.Event ? e.which : e.keyCode
         return (key >= 48 && key <= 57)
     }

//Para decimales
function NumeroDecimal(e, field) {
	key = e.keyCode ? e.keyCode : e.which
  // backspace
  if (key == 8) return true
  // 0-9
if (key > 47 && key < 58) {
	if (field.value == "") return true
		regexp = /.[0-9]{2}$/
	return !(regexp.test(field.value))
}
  // .
  if (key == 46) {
  	if (field.value == "") return false
  		regexp = /^[0-9]+$/
  	return regexp.test(field.value)
  }
  // other key
  return false

}

function NumerosLetrasSinCaracteres(e) {
	tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
    	return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9\s]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function NumerosLetrasCorreo(e) {
	tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
    	return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9.,-_@]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


function NumerosLetras(e) {
	tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
    	return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9-_.,\s]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


//Se utiliza para que el campo de texto solo acepte letras
function soloLetras(e) {
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toString();
    letras = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 39, 46, 6, 44, 95 ,45]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false
    for(var i in especiales) {
    	if(key == especiales[i]) {
    		tecla_especial = true;
    		break;
    	}
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial){
      //alert('Tecla no aceptada');
      return false;
  }
}
</script>

<!--Validar Cajas Vacias-->
<script language="javascript" type="text/javascript">
	function validar() {
  //obteniendo el valor que se puso en el campo text del formulario
  miCampoTexto = document.getElementById("NombreAlumno").value;
        //la condición
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo de texto Nombre(s) del Alumno esta vacio!');
        	return false;
        }

        miCampoTexto = document.getElementById("ApellidoP").value;
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo de texto Apellido Paterno del Alumno esta vacio!');
        	return false;
        }

        miCampoTexto = document.getElementById("ApellidoM").value;
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo de texto Apellido Materno del Alumno esta vacio!');
        	return false;
        }

        miCampoTexto = document.getElementById("CURP").value;
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo de texto CURP del Alumno esta vacio!');
        	return false;
        }

        miCampoTexto = document.getElementById("CURP").value;
        if (miCampoTexto.length < 18) {
        	alert('Verifica el campo de texto CURP del Alumno debe ser 18 caracteres no menos!');
        	return false;
        }

        var txtFecha = document.getElementById('FechaNacimiento').value;
        if(!isNaN(txtFecha)){
        	alert('Seleccione o intraduzca una fecha!');
        	return false;
        }

        miCampoTexto = document.getElementById("Correo").value;
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo Correo del Alumno esta vacio!');
        	return false;
        }

        var txtCorreo = document.getElementById("Correo").value;
        if(!(/\S+@\S+\.\S+/.test(txtCorreo))){
        	alert('Escriba un correo válido');
        	return false;
        }

        Validacion = document.getElementById('Paisl').disabled;
        if(Validacion == false){
        	miCampoTexto = document.getElementById("Paisl").value;
        	if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        		alert('Verifica el campo Pais del Lugar de Nacimiento esta vacio!');
        		return false;
        	}
        }

        Validacion = document.getElementById('Estadol').disabled;
        if(Validacion == false){
        	miCampoTexto = document.getElementById("Estadol").value;
        	if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        		alert('Verifica el campo Estado del Lugar de Nacimiento esta vacio!');
        		return false;
        	}
        }

        Validacion = document.getElementById('Localidadl').disabled;
        if(Validacion == false){
        	miCampoTexto = document.getElementById("Localidadl").value;
        	if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        		alert('Verifica el campo Localidad del Lugar de Nacimiento esta vacio!');
        		return false;
        	}
        }

        Validacion = document.getElementById('Municipiol').disabled;
        if(Validacion == false){
        	miCampoTexto = document.getElementById("Municipiol").value;
        	if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        		alert('Verifica el campo Localidad del Lugar de Nacimiento esta vacio!');
        		return false;
        	}
        }

        miCampoTexto = document.getElementById("CPd").value;
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo CP del Domicilio esta vacio!');
        	return false;
        }

        miCampoTexto = document.getElementById("Called").value;
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo Calle del Domicilio esta vacio!');
        	return false;
        }

        miCampoTexto = document.getElementById("Numerod").value;
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo Numero del Domicilio esta vacio!');
        	return false;
        }

        miCampoTexto = document.getElementById("Coloniad").value;
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo Colonia del Domicilio esta vacio!');
        	return false;
        }

        miCampoTexto = document.getElementById("Municipiod").value;
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo Municipio del Domicilio esta vacio!');
        	return false;
        }

        miCampoTexto = document.getElementById("Localidadd").value;
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo Localidad del Domicilio esta vacio!');
        	return false;
        }

        miCampoTexto = document.getElementById("Estadod").value;
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo de texto Estado del Domicilio esta vacio!');
        	return false;
        }

        Validacion = document.getElementById('Matricula').disabled;
        if(Validacion == false){
        	miCampoTexto = document.getElementById("Matricula").value;
        	if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        		alert('Verifica el campo Matricula de Secundaria de Procedencia esta vacio!');
        		return false;
        	}
        }

        Validacion = document.getElementById('Nombre').disabled;
        if(Validacion == false){
        	miCampoTexto = document.getElementById("Nombre").value;
        	if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        		alert('Verifica el campo Nombre de Secundaria de Procedencia esta vacio!');
        		return false;
        	}
        }

        Validacion = document.getElementById('Municipio').disabled;
        if(Validacion == false){
        	miCampoTexto = document.getElementById("Municipio").value;
        	if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        		alert('Verifica el campo Municipio de Secundaria de Procedencia esta vacio!');
        		return false;
        	}
        }

        Validacion = document.getElementById('Estado').disabled;
        if(Validacion == false){
        	miCampoTexto = document.getElementById("Estado").value;
        	if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        		alert('Verifica el campo Estado de Secundaria de Procedencia esta vacio!');
        		return false;
        	}
        }

        Validacion = document.getElementById('Pais').disabled;
        if(Validacion == false){
        	miCampoTexto = document.getElementById("Pais").value;
        	if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        		alert('Verifica el campo Pais de Secundaria de Procedencia esta vacio!');
        		return false;
        	}
        }

        miCampoTexto = document.getElementById("Promedio").value;
        if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        	alert('Verifica el campo Promedio de Secundaria de Procedencia esta vacio!');
        	return false;
        }


        Validacion = document.getElementById('Enfermedad').disabled;
        if(Validacion == false){
        	miCampoTexto = document.getElementById("Enfermedad").value;
        	if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        		alert('Verifica el campo ¿Padeces alguna enfermedad... de Datos Medicos esta vacio!');
        		return false;
        	}
        }

        banderaRBTN = false;
        rbtEstado = document.getElementsByName('Tratamiento');

        for(var i = 0; i < rbtEstado.length; i++){
        	if(rbtEstado[i].checked){
        		banderaRBTN = true;
        		break;
        	}
        }

        if(!banderaRBTN){
        	alert('Verifica Actualmente ¿recibes algún tratamiento .... de Datos Medicos 1 Selecciona una opcion!');
        	return false;
        }

        Validacion = document.getElementById('TipoTratamiento').disabled;
        if(Validacion == false){
        	miCampoTexto = document.getElementById("TipoTratamiento").value;
        	if (miCampoTexto.length == 0 || /^\s+$/.test(miCampoTexto)) {
        		alert('Verifica el campo ¿De que tipo? de Datos Medicos esta vacio!');
        		return false;
        	}
        }

        banderaRBTN = false;
        rbtEstado = document.getElementsByName('Tabaquismo');

        for(var i = 0; i < rbtEstado.length; i++){
        	if(rbtEstado[i].checked){
        		banderaRBTN = true;
        		break;
        	}
        }

        if(!banderaRBTN){
        	alert('Verifica Tabaquismo de Datos Medicos 1 Selecciona una opcion!');
        	return false;
        }

        banderaRBTN = false;
        rbtEstado = document.getElementsByName('Alcohol');

        for(var i = 0; i < rbtEstado.length; i++){
        	if(rbtEstado[i].checked){
        		banderaRBTN = true;
        		break;
        	}
        }

        if(!banderaRBTN){
        	alert('Verifica Alcoholismo de Datos Medicos 1 Selecciona una opcion!');
        	return false;
        }

        banderaRBTN = false;
        rbtEstado = document.getElementsByName('Drogas');

        for(var i = 0; i < rbtEstado.length; i++){
        	if(rbtEstado[i].checked){
        		banderaRBTN = true;
        		break;
        	}
        }

        if(!banderaRBTN){
        	alert('Verifica Drogadiccion de Datos Medicos 1 Selecciona una opcion!');
        	return false;
        }

        return true;
    }
</script>
</head>

<body>
	<!--Inicio contenedor Cabecera-->
	<div class="container">
		<br>
		<?php include "../menus/MenuCapturista.php";
      MenuCapturista();?>

  </div>
  <!--Fin contenedor Cabecera-->

  <!--Inicio Contenedor medio-->
  <div class="container">
      <!--Poner titulo o nombre -->
      <br><center><h2> Datos Basicos del alumno... </h2></center>
      <!--Poner titulo o nombre -->

      <div class="row">
         <div class="col-sm-1"></div>
         <!--Inicio Contenido central-->
         <div class="col-sm-10">
            <!--Inicio de contenido de caja de texto--> 
            <?php if(!isset($_POST['NombreAlumno'])){?>
               <form action="AltaDatosBasicosAlumno.php" method="POST" onsubmit="return validar()">
                  <br>
                  <h4>Datos Alumno:</h4>
                  <b><i>Nombre(s):</i></b>
                  <input type="text" name="NombreAlumno"  class="form-control" id="NombreAlumno" placeholder="Nombre" onkeypress="return soloLetras(event);" maxlength="25">
                  <b><i>Apellido Paterno:</i></b>
                  <input type="text" name="ApellidoP" class="form-control" id="ApellidoP" placeholder="Apellido Paterno" onkeypress="return soloLetras(event);" maxlength="20">
                  <b><i>Apellido Materno:</i></b>
                  <input type="text" name="ApellidoM" class="form-control" id="ApellidoM" placeholder="Apellido Materno" onkeypress="return soloLetras(event);" maxlength="20">
                  <b><i>CURP:</i></b>
                  <input type="text" name="CURP" class="form-control" id="CURP" placeholder="CURP" maxlength="18" onKeyUp="this.value = this.value.toUpperCase();" onkeypress="return NumerosLetrasSinCaracteres(event);">
                  <b><i>Fecha Nacimiento:</i></b>
                  <input type="date" name="FechaNacimiento" class="form-control" id="FechaNacimiento" >
                  <b><i>Correo:</i></b>
                  <input type="email" name="Correo" class="form-control" id="Correo" placeholder="Correo" onkeypress="return NumerosLetrasCorreo(event);" maxlength="50">
                  <b><i>Sexo:</i></b>
                  <select name="Sexo" class="m-1 custom-select">
                     <option value="F">F</option>
                     <option value="M">M</option>
                 </select>
                 <b><i>Telefono Emergencia:</i></b>
                 <input type="text" name="TelefonoEmergencia" class="form-control" id="TelefonoEmergencia" placeholder="Telefono de Emergencia" onKeyPress="return soloNumeros(event)" maxlength="10">
                 <b><i>Numero Control:</i></b>
                 <input type="text" name="NC" class="form-control" id="NC" placeholder="Numero Control" maxlength="14" onKeyPress="return soloNumeros(event)" >
                 <b><i>Seguro Social:</i></b>
                 <input type="text" name="SS" class="form-control" id="SS" placeholder="Seguro Social" maxlength="11" onKeyPress="return soloNumeros(event)">
                 <br>
                 <h4>Grado y Grupo:</h4>
                 <?php
                 include_once "../../clases/MySQLConector.php";

                 $Mysql = new MySQLConector();
                 $Mysql->Conectar();

                 $Consulta = "SELECT * FROM grupos, carreras WHERE grupos.Carreras_idCarreras = carreras.idCarreras and grupos.Estatus = '1';";
                 $Resultado = $Mysql->Consulta($Consulta);
                 ?>
                 <select name="GradoGrupo" id="GradoGrupo" class="form-control input-sm"  > 
                     <?php
                     while ($fila = $Resultado->fetch_assoc()) { 
                        ?>

                        <?php 
                        echo " <option value=\"{$fila['idGrupos']}\">{$fila['Grado']}-{$fila['Grupo']}, {$fila['Nombre']}</option>";
                    }
                    ?>
                </select>
                <br>
                <br>
                <h4>Lugar de Nacimiento:</h4>
                <?php
                include_once "../../clases/MySQLConector.php";

                $Mysql = new MySQLConector();
                $Mysql->Conectar();

                $Consulta = "SELECT * FROM `lugarnacimiento`";
                $Resultado = $Mysql->Consulta($Consulta);
                ?>
                <select name="LugarNacimiento" id="LugarNacimiento" class="m-1 custom-select "> 
                 <?php
                 while ($fila = $Resultado->fetch_assoc()) { 
                    ?>

                    <?php 
                    echo " <option value=\"{$fila['idLugarNacimiento']}\">{$fila['Municipio']}, {$fila['Localidad']}, {$fila['Estado']}, {$fila['Pais']}</option>";
                }
                ?>
            </select>
            <div class="radio">  
             <i>Otro Lugar:</i>
             <input type="checkbox" name="OtroLugar" onclick="Paisl.disabled = Estadol.disabled = Localidadl.disabled = Municipiol.disabled = !this.checked"/> <br>
             <b>Pais</b>
             <input type="text" name="Paisl" id="Paisl" class="form-control input-sm" placeholder="Pais" onkeypress="return NumerosLetras(event);" disabled maxlength="30">
             <b>Estado</b>
             <input type="text" name="Estadol" id="Estadol" class="form-control input-sm" placeholder="Estado" onkeypress="return NumerosLetras(event);" disabled maxlength="30">
             <b>Municipio</b>
             <input type="text" name="Municipiol" id="Municipiol" class="form-control input-sm" placeholder="Municipio" onkeypress="return NumerosLetras(event);" disabled maxlength="30">
             <b>Localidad</b>
             <input type="text" name="Localidadl" id="Localidadl" class="form-control input-sm" placeholder="Localidad" onkeypress="return NumerosLetras(event);" disabled maxlength="30">
         </div>
         <br>
         <h4>Domicilio</h4>
         <b>CP</b>
         <input type="text" name="CPd" id="CPd" class="form-control input-sm" placeholder="CP" onKeyPress="return soloNumeros(event)" maxlength="5" >
         <b>Calle</b>
         <input type="text" name="Called" id="Called" class="form-control input-sm" placeholder="Calle" onkeypress="return NumerosLetras(event);" maxlength="30" >
         <b>Numero</b>
         <input type="text" name="Numerod" id="Numerod" class="form-control input-sm" placeholder="Numero" onkeypress="return NumerosLetras(event);" maxlength="20">
         <b>Colonia</b>
         <input type="text" name="Coloniad" id="Coloniad" class="form-control input-sm" placeholder="Colonia" onkeypress="return NumerosLetras(event);" maxlength="50" >
         <b>Municipio</b>
         <input type="text" name="Municipiod" id="Municipiod" class="form-control input-sm" placeholder="Municipio" onkeypress="return NumerosLetras(event);" maxlength="50" >
         <b>Localidad</b>
         <input type="text" name="Localidadd" id="Localidadd" class="form-control input-sm" placeholder="Localidad" onkeypress="return NumerosLetras(event);" maxlength="50" >
         <b>Estado</b>
         <input type="text" name="Estadod" id="Estadod" class="form-control input-sm" placeholder="Estado" onkeypress="return soloLetras(event);" maxlength="50">
         <b>Tel. Casa</b>
         <input type="text" name="TelCasad" id="TelCasad" class="form-control input-sm" placeholder="Tel. Casa" onKeyPress="return soloNumeros(event)" maxlength="10"> 
         <br>


         <h4>Escuela Secundaria Procedencia</h4>
         <b><i>Secundaria:</i></b>
         <?php
         include_once "../../clases/MySQLConector.php";

         $Mysql = new MySQLConector();
         $Mysql->Conectar();

         $Consulta = "SELECT * FROM `secundaria`";
         $Resultado = $Mysql->Consulta($Consulta);
         ?>
         <select name="Secundaria" id="Secundaria" class="form-control input-sm"  > 
             <?php
             while ($fila = $Resultado->fetch_assoc()) { 
                ?>

                <?php 
                echo " <option value=\"{$fila['idSecundaria']}\">{$fila['Nombre']}, {$fila['Municipio']}, {$fila['Estado']}, {$fila['Pais']}</option>";
            }
            ?>
        </select> 
        <div class="radio">  
         <i>Otra Secundaria:</i>
         <input type="checkbox" name="radSecundaria" onclick="Matricula.disabled = Nombre.disabled = Municipio.disabled = Estado.disabled = Pais.disabled = !this.checked"/> <br>
         <b>Matricula:</b><input type="text" name="Matricula" id="Matricula" disabled="disabled" class="form-control" placeholder="Matricula" onkeypress="return NumerosLetras(event);"  maxlength="20"/>
         <b>Nombre:</b><input type="text" name="Nombre" id="Nombre" disabled="disabled" class="form-control" placeholder="Nombre" onkeypress="return NumerosLetras(event);" maxlength="100"/>
         <b>Municipio:</b><input type="text" name="Municipio" id="Municipio" disabled="disabled" class="form-control" placeholder="Municipio" onkeypress="return NumerosLetras(event);"  maxlength="50"/>
         <b>Estado:</b><input type="text" name="Estado" id="Estado" disabled="disabled" class="form-control" placeholder="Estado" onkeypress="return soloLetras(event);" maxlength="50"/>
         <b>Pais:</b><input type="text" name="Pais" id="Pais" disabled="disabled" class="form-control" placeholder="Pais" onkeypress="return soloLetras(event);" maxlength="20"/>

     </div>
     <b><i>Promedio:</i></b>
     <input type="text" name="Promedio" class="form-control" id="Promedio" placeholder="Promedio" onkeypress="return NumeroDecimal(event, this);" >

     <br>
     <h4>Datos Medicos</h4>
     <b><i>¿Padeces alguna enfermedad o existe alguna condición fisica que te afecte?(odio, vista, enfermedad respiratoria, cardiaca, convulsiones, diabetes, asma, etc.)</i></b>
     <input type="text" name="Enfermedad" class="form-control" id="Enfermedad" placeholder="Escribe tu respuesta" onkeypress="return NumerosLetras(event);" >
     <b><i>Actualmente ¿recibes algún tratamiento médico psicólogico? ¿Lo has recibido alguna vez?</i></b>
     <div class="form-check-inline">
         Si <input class="m-2" type="radio" value="O" name="Tratamiento" id="Tratamiento"  onclick="TipoTratamiento.disabled = false" /></label>
         No <input class="m-2" type="radio" value="F" name="Tratamiento" id="Tratamiento"  onclick="TipoTratamiento.disabled = true"/></label>
     </div>
     <br>
     <b><i>¿De que tipo?</i></b>
     <input type="text" disabled name="TipoTratamiento" class="form-control" id="TipoTratamiento" placeholder="Escribe tu respuesta" onkeypress="return NumerosLetras(event);">
     <b><i>Tabaquismo:</i></b>
     Si <input class="m-2" type="radio" value="O" name="Tabaquismo" onclick=""/></label>
     No <input class="m-2" type="radio" value="F" name="Tabaquismo" onclick=""/></label>
     <b><i>Alcohol:</i></b>
     Si <input class="m-2" type="radio" value="O" name="Alcohol" onclick="" /></label>
     No <input class="m-2" type="radio" value="F" name="Alcohol" onclick=""/></label>
     <b><i>Drogas:</i></b>
     Si <input class="m-2" type="radio" value="O" name="Drogas" onclick="" /></label>
     No <input class="m-2" type="radio" value="F" name="Drogas" onclick=""/></label>

     <div class="form-inline"><b>Estatus: </b><b class="m-3">Activo</b>  </div>

     <!--Button-->
     <div class="form-group">
         <div class="col-xs-8 col-xs-offset-1">
            <button type="submit" class="btn btn-success glyphicon glyphicon-plus"> Guardar</button><br>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!--Fin Button-->
</form>
<?php 
}else{
   include_once "../../clases/SQLControlador.php";
   include_once "../../clases/Alumno.php";

   $Alumno = new Alumno();

   $NombreAlumno = $_POST['NombreAlumno'];
   $NombreAlumno = ucwords(strtolower($NombreAlumno));
   $ApellidoP = $_POST['ApellidoP'];
   $ApellidoP = ucwords(strtolower($ApellidoP));
   $ApellidoM = $_POST['ApellidoM'];
   $ApellidoM = ucwords(strtolower($ApellidoM));
   $CURP = $_POST['CURP'];
   $SS = $_POST['SS'];
   $NC =$_POST['NC'];
   $FechaNacimiento = $_POST['FechaNacimiento'];
   $Correo = $_POST['Correo'];
   $Sexo = $_POST['Sexo'];
   $TelefonoEmergencia = $_POST['TelefonoEmergencia'];

            //$Alunno->setGrupos_idGrupos($Grupos_idGrupos;
   $Alumno->setNombre($NombreAlumno);
   $Alumno->setApellidoP($ApellidoP);
   $Alumno->setApellidoM($ApellidoM);
   $Alumno->setSS($SS);
   $Alumno->setNC($NC);
   $Alumno->setCURP($CURP);
   $Alumno->setFechaNac($FechaNacimiento);
   $Alumno->setCorreo($Correo);
   $Alumno->setSexo($Sexo);
   $Alumno->setTelefonoEmergencia($TelefonoEmergencia);

   include_once "../../clases/HistorialAlumno.php";
   $HistorialAlumno = new HistorialAlumno;

   $Grupos_idGrupos = $_POST['GradoGrupo'];
   $Fecha = date("Y-m-d");

   $HistorialAlumno->setGrupos_idGrupos($Grupos_idGrupos);
   $HistorialAlumno->setFecha($Fecha);

            /*$SQLControlador = new SQLControlador();
            $SQLControlador->AltaAlumno($Alumno);*/
//-------------------------------------------------------------------------------------------------
            include_once "../../clases/LugarNacimiento.php";
            $LugarNacimiento = new lugarNacimiento();
            if(!empty($_POST['OtroLugar'])){
            	$Paisl =$_POST['Paisl'];
            	$Paisl = ucwords(strtolower($Paisl));
            	$Estadol = $_POST['Estadol'];
            	$Estadol = ucwords(strtolower($Estadol));
            	$Localidadl = $_POST['Localidadl'];
            	$Localidadl = ucwords(strtolower($Localidadl));
            	$Municipiol = $_POST['Municipiol'];
            	$Municipiol = ucwords(strtolower($Municipiol));
            	$LugarNacimiento->setPais($Paisl);
            	$LugarNacimiento->setEstado($Estadol);
            	$LugarNacimiento->setLocalidad($Localidadl);
            	$LugarNacimiento->setMunicipio($Municipiol);
            }else{
            	$idLugarNacimiento = $_POST['LugarNacimiento'];
            	$LugarNacimiento->setidLugarNacimiento($idLugarNacimiento);
            }

            /*$SQLControlador = new SQLControlador();
            $SQLControlador-> AgregarLugarNacimiento($LugarNacimiento);*/
//------------------------------------------------------------------------------------------------- 
            include_once "../../clases/Domicilio.php";
            $Domicilio = new Domicilio();

            $CP = $_POST['CPd'];
            $Calle = $_POST['Called'];
            $Calle = ucwords(strtolower($Calle));
            $Numero = $_POST['Numerod'];
            $Colonia = $_POST['Coloniad'];
            $Colonia = ucwords(strtolower($Colonia));
            $Municipio = $_POST['Municipiod'];
            $Municipio = ucwords(strtolower($Municipio));
            $Localidad = $_POST['Localidadd'];
            $Localidad = ucwords(strtolower($Localidad));
            $Estado = $_POST['Estadod'];
            $Estado = ucwords(strtolower($Estado));
            $TelefonoCasa = $_POST['TelCasad'];

            $Domicilio->setCP($CP);
            $Domicilio->setCalle($Calle);
            $Domicilio->setNumero($Numero);
            $Domicilio->setColonia($Colonia);
            $Domicilio->setMunicipio($Municipio);
            $Domicilio->setLocalidad($Localidad);
            $Domicilio->setEstado($Estado);
            $Domicilio->setTelefonoCasa($TelefonoCasa);

            /*$SQLControlador = new SQLControlador();
            $SQLControlador-> AgregarDomicilioAlumno($Domicilio,$Alumno);*/
//-------------------------------------------------------------------------------------------------   
            include_once "../../clases/Secundaria.php";
            $Secundaria = new Secundaria();
            include_once "../../clases/DatosEscolares.php";
            $DatosEscolares = new DatosEscolares();
            if(!empty($_POST['radSecundaria'])){
            	$Matricula =$_POST['Matricula'];
            	$Matricula = ucwords(strtolower($Matricula));
            	$Nombre = $_POST['Nombre'];
            	$Nombre = ucwords(strtolower($Nombre));
            	$Municipio = $_POST['Municipio'];
            	$Municipio = ucwords(strtolower($Municipio));
            	$Estado = $_POST['Estado'];
            	$Estado = ucwords(strtolower($Estado));
            	$Pais = $_POST['Pais'];
            	$Pais = ucwords(strtolower($Pais));

            	$Secundaria->setMatricula($Matricula);
            	$Secundaria->setNombre($Nombre);
            	$Secundaria->setMunicipio($Municipio);
            	$Secundaria->setEstado($Estado);
            	$Secundaria->setPais($Pais);

            }else{
            	$idSecundaria = $_POST['Secundaria'];
            	$Secundaria->setidSecundaria($idSecundaria);
            }

            $PromedioSecu = $_POST['Promedio'];
            $DatosEscolares->setPromedioSecu($PromedioSecu);

            /*$SQLControlador = new SQLControlador();
            $SQLControlador->AgregarSecundaria($Secundaria,$DatosEscolares);*/
//--------------------------------------------------------------------------------------------------
            include_once "../../clases/DatosMedicos.php";
            $DatosMedicos = new DatosMedicos();

            /*$Alumno_idAlumno = 2;*/

            $Enfermedad = $_POST['Enfermedad'];
            $Enfermedad = ucwords(strtolower($Enfermedad));


            $Tratamiento = $_POST['Tratamiento'];
            if($Tratamiento == 'O'){
            	$TipoTratamiento = "Si,". $_POST['TipoTratamiento']; 
            }elseif ($Tratamiento == 'F') {
            	$TipoTratamiento = "No";
            }
            $TipoTratamiento = ucwords(strtolower($TipoTratamiento));


            $Tabaquismo = $_POST['Tabaquismo'];
            if($Tabaquismo == 'O'){
            	$Tabaquismo = 1;
            }else{
            	$Tabaquismo = 0;
            }

            $Alcoholismo = $_POST['Alcohol'];
            if($Alcoholismo == 'O'){
            	$Alcoholismo = 1;
            }else{
            	$Alcoholismo = 0;
            }

            $Drogadiccion = $_POST['Drogas'];
            if($Drogadiccion == 'O'){
            	$Drogadiccion = 1;
            }else{
            	$Drogadiccion = 0;
            }

            //$DatosMedicos->setAlumno_idAlumno($Alumno_idAlumno);
            $DatosMedicos->setEnfermedad($Enfermedad);
            $DatosMedicos->setTratamiento($TipoTratamiento);
            $DatosMedicos->setTabaquismo($Tabaquismo);
            $DatosMedicos->setDrogadiccion($Drogadiccion);
            $DatosMedicos->setAlcoholismo($Alcoholismo);

            $SQLControlador = new SQLControlador();
            $SQLControlador->AltaDatosBasicosAlumno($Alumno,$LugarNacimiento,$Secundaria,$DatosEscolares,$DatosMedicos, $Domicilio,$HistorialAlumno);
//--------------------------------------------------------------------------------------------------
        }
        ?>
        <!--Fin de contenido de caja de texto--> 
    </div>
    <!--Fin Contenido central-->
    <!--Inicio de pie de pagina-->
    <?php include '../menus/PiePagina.php';?>

    <!--fin de pie de pagina-->
</div>
<!--Fin Contenedor medio-->

<!--Inicio de pie de pagina-->

<!--fin de pie de pagina-->
</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){
		$('#Secundaria').select2();
		$('#LugarNacimiento').select2();

		$('select').select2({    
			language: {
				noResults: function() {
					return "No hay resultado";        
				},
				searching: function() {
					return "Buscando..";
				}
			}
		});
	});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#NombreAlumno').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.\s]+/ig,"");
    }
});

    $('#ApellidoP').on('input', function (e) {
      if (!/^[ a-z0A-Z-9.\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.\s]+/ig,"");
    }
});

    $('ApellidoM').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.\s]+/ig,"");
    }
});
    
    $('#CURP').on('input', function (e) {
        if (!/^[ A-Z0-9\s]*$/i.test(this.value)) {
          this.value = this.value.replace(/[^A-Z0-9\s]+/ig,"");
      }
  });

    $('#Correo').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_"@?¿\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_"@?¿\s]+/ig,"");
    }
});

    $('#TelefonoEmergencia').on('input', function (e) {
        if (!/^[0-9]*$/i.test(this.value)) {
          this.value = this.value.replace(/[^0-9]+/ig,"");
      }
  });

    $('#NC').on('input', function (e) {
        if (!/^[0-9]*$/i.test(this.value)) {
          this.value = this.value.replace(/[^0-9]+/ig,"");
      }
  });

    $('#SS').on('input', function (e) {
        if (!/^[0-9]*$/i.test(this.value)) {
          this.value = this.value.replace(/[^0-9]+/ig,"");
      }
  });

    $('#Paisl').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
    }
});

    $('#Estadol').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
    }
});

    $('#Municipiol').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
    }
});

    $('#Localidadl').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
    }
});

    $('#CPd').on('input', function (e) {
        if (!/^[0-9]*$/i.test(this.value)) {
          this.value = this.value.replace(/[^0-9]+/ig,"");
      }
  });

    $('#Called').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
    }
});

    $('#Numerod').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
    }
});

    $('#Coloniad').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
    }
});

    $('#Municipiod').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
    }
});

    $('#Localidadd').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
    }
});

    $('#Estadod').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
    }
});

    $('#TelCasad').on('input', function (e) {
        if (!/^[0-9]*$/i.test(this.value)) {
          this.value = this.value.replace(/[^0-9]+/ig,"");
      }
  });

    $('#Matricula').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
    }
});
    $('#Nombre').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
    }
});

    $('#Municipio').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
    }
});

    $('#Estado').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
    }
});

    $('#Pais').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
    }
});

    $('#Promedio').on('input', function (e) {
        if (!/^[0-9.]*$/i.test(this.value)) {
          this.value = this.value.replace(/[^0-9]+/ig,"");
      }
  });

    $('#TipoTratamiento').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
    }
});

    $('#Enfermedad').on('input', function (e) {
      if (!/^[ a-zA-Z0-9.,-_\s]*$/i.test(this.value)) {
        this.value = this.value.replace(/[^a-zA-Z0-9.,-_\s]+/ig,"");
    }
});

});
</script>