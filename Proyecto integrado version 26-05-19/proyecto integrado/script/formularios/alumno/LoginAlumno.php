<?php
if (!isset($_SESSION)) { session_start(); }
if (isset ($_SESSION['LoggedinAlumno']) )
{
	echo "<script language='javascript'>window.location='InicioAlumno.php'</script>";
}
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
	<!--Icono en pestaña-->
	<link rel="icon" type="image/vnd.microsoft.icon" href="./../../../imagenes/Mapa.ico">
	<!--Iconos-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="./../../../css/bootstrap.min.css">
	<!--STYLOS-->
	<link rel="stylesheet" type="text/css" href="./../../../css/EstiloMenuLogin.css">
	<link rel="stylesheet" type="text/css" href="./../../../css/EstiloPiePagina.css">

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>  
	<script src="./../../../js/jquery-3.3.1.js"></script>
	<script src="./../../../js/jquery-3.3.1.min.js"></script>
	<script src="./../../../js/jquery-3.3.1.slim.min.js"></script>
	<script src="./../../../js/popper.min.js"></script>
	<script src="./../../../js/bootstrap.min.js"></script>
</head>


<body>
	<!--Inicio contenedor Cabecera-->
	<div class="container">
		<br>
		<?php include "../menus/MenuAlumno.php";
		MenuLoginAlumno();?>

	</div>
	<!--Fin contenedor Cabecera-->

	<!--Inicio Contenedor medio-->
	<div class="container" id="contenedor">
		<br>
		<!--Poner titulo o nombre -->
		<br><center><h2> Inicio de sesión Alumno </h2></center>
		<!--Poner titulo o nombre -->

		<div class="row">
			<!--Inicio de menu izquierdo-->

			<div class="col-sm-4">
				<!--<?php// include 'menu_izquierdo_alumno.php'?>-->
				<!--Fin inicio menu izquierdo-->
			</div>
			<!--Inicio Contenido central-->
			<div class="col-sm-4">
				<!--Inicio de contenido de caja de texto--> 
				<?php  
				if (!isset($_POST['Usuario']) | !isset($_POST['Contrasena'])) {      
					?>
					<form method="POST" action="loginalumno.php" class="form-horizontal">
						<br><br>
						<div class="form-group">
							<label for="formGroupExampleInput">Nombre de usuario</label>
							<input type="text" class="form-control" name=Usuario required placeholder="Ingresa tu usuario">
						</div>
						<br>
						<div class="form-group">
							<label for="formGroupExampleInput2">Contraseña</label>
							<input type=password class="form-control" name=Contrasena required placeholder="Ingresa tu contraseña">
						</div>
						<div class="col-xs-6">
							<input class="btn btn-success center-block " type="submit" name="Inicar" value="Iniciar sesión"></input>
						</div>
						<br><br><br><br>
					</form>

					<?php
				}
				else{
					$Usuario = $_POST['Usuario'];
					$Contrasena = md5($_POST['Contrasena']); 

					include_once "../../clases/SQLControlador.php";
					include_once "../../clases/UsuariosAlumnos.php";

					$Usuarios = new UsuariosAlumnos();
					$Usuarios -> setNombreUsuario($Usuario);
					$Usuarios -> setContrasena($Contrasena);

					$SQLControlador = new SQLControlador();
					if ($SQLControlador -> IniciarSesionAlumno($Usuarios)){
						$_SESSION['LoggedinAlumno'] = true;
						$_SESSION['IdUsuarioAlumno'] = $SQLControlador -> GetIdUsuarioAlumno($Usuarios);
						$_SESSION['NombreAlumno'] = $SQLControlador -> GetNombreAlumno($Usuarios);
						echo "<script language='javascript'>window.location = 'InicioAlumno.php'</script>";
					}else{
						echo "<script language='javascript'>alert('Usuario y/o Contraseña incorrectos')</script>";   
						echo "<script language='javascript'>window.location = './LoginAlumno.php'</script>";
					}
				}
				?>

				<!--Fin de contenido de caja de texto--> 
			</div>
			<div class="col-sm-4">
				<!--<?php// include 'menu_izquierdo_alumno.php'?>-->
				<!--Fin inicio menu izquierdo-->
			</div>
			<!--Fin Contenido central-->

		</div>
		<!--Fin Contenedor medio-->
		 <?php include "../menus/PiePagina.php";?>
		<!--Inicio de pie de pagina-->
		<div class="container">
			<!-- <?php //include 'pie_pagina.php';?>-->
			<!-- <?php// include 'pie_pagina1.php';?>-->
		</div>
		<!--fin de pie de pagina-->
	</body>
	</html>