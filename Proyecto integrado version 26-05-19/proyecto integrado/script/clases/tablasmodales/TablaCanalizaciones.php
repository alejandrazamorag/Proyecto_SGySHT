
<?php 
session_start();
require_once "../MySQLConector.php";
$Mysql = new MySQLConector();
$Mysql->Conectar();
?>
<div class="row">
	<div class="col-md-12">
		<caption>
			<a href="../../formularios/docentetutor/AltaCanalizacionTutor.php"><button class="btn btn-success">
				Agregar Nueva Canalización
				<span class="glyphicon glyphicon-plus"></span>
			</button></a>
		</caption>
		<br>
		<br>
		<div class="table-responsive">
		<table class="table table-hover table-bordered ">
			<thead class="thead-light">
				<tr>
					<th>id</th>
					<th>Fecha</th>
					<th>Instancia</th>
					<th>Estatus</th>
					<th>Modificar</th>
					<th>Ver</th>
				</tr>
			</thead>
			<?php 
			if(isset($_SESSION['consulta'])){
					//echo "<script type=\"text/javascript\">1(\"Fotos guardadas\");</script>";  
				if($_SESSION['consulta'] > 0){
						//echo "<script type=\"text/javascript\">2(\"Fotos guardadas\");</script>";  
					$idp=$_SESSION['consulta'];
					$Consulta="SELECT canalizacion.idCanalizacion,canalizacion.ProblematicasCanalizacion_idProblematicasCanalizacion, canalizacion.Alumno_idAlumno, canalizacion.idFamiliar, canalizacion.Fecha, canalizacion.Descripcion, canalizacion.Instancia, canalizacion.Estatus AS EstatusCanalizacion, familiares.Nombre, familiares.ApellidoP, familiares.ApellidoM, problematicascanalizacion.idProblematicasCanalizacion, problematicascanalizacion.Problematica FROM `canalizacion`,familiares, problematicascanalizacion WHERE canalizacion.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' AND canalizacion.ProblematicasCanalizacion_idProblematicasCanalizacion = problematicascanalizacion.idProblematicasCanalizacion and canalizacion.idFamiliar = familiares.idFamiliares AND canalizacion.idCanalizacion = '".$idp."';";
				}else{
						//echo "<script type=\"text/javascript\">3(\"Fotos guardadas\");</script>";  
					$Consulta="SELECT canalizacion.idCanalizacion,canalizacion.ProblematicasCanalizacion_idProblematicasCanalizacion, canalizacion.Alumno_idAlumno, canalizacion.idFamiliar, canalizacion.Fecha, canalizacion.Descripcion, canalizacion.Instancia, canalizacion.Estatus AS EstatusCanalizacion, familiares.Nombre, familiares.ApellidoP, familiares.ApellidoM, problematicascanalizacion.idProblematicasCanalizacion, problematicascanalizacion.Problematica FROM `canalizacion`,familiares, problematicascanalizacion WHERE canalizacion.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' AND canalizacion.ProblematicasCanalizacion_idProblematicasCanalizacion = problematicascanalizacion.idProblematicasCanalizacion and canalizacion.idFamiliar = familiares.idFamiliares;";
				}
			}else{
				$Consulta="SELECT canalizacion.idCanalizacion,canalizacion.ProblematicasCanalizacion_idProblematicasCanalizacion, canalizacion.Alumno_idAlumno, canalizacion.idFamiliar, canalizacion.Fecha, canalizacion.Descripcion, canalizacion.Instancia, canalizacion.Estatus AS EstatusCanalizacion, familiares.Nombre, familiares.ApellidoP, familiares.ApellidoM, problematicascanalizacion.idProblematicasCanalizacion, problematicascanalizacion.Problematica FROM `canalizacion`,familiares, problematicascanalizacion WHERE canalizacion.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' AND canalizacion.ProblematicasCanalizacion_idProblematicasCanalizacion = problematicascanalizacion.idProblematicasCanalizacion and canalizacion.idFamiliar = familiares.idFamiliares";
					//echo "<script type=\"text/javascript\">alert(\"Fotos guardadas\");</script>";  
			}

			$Resultado = $Mysql->Consulta($Consulta);
			while($ver=mysqli_fetch_array($Resultado)){ 

				$datos=$ver['idCanalizacion']."||".
				$ver['Nombre']."||".
				$ver['ApellidoP']."||".
				$ver['ApellidoM']."||".
				$ver['Fecha']."||".
				$ver['Instancia']."||".
				$ver['Descripcion']."||".
				$ver['Problematica']."||".
				$ver['EstatusCanalizacion'];
	

				?>
				<tbody>
					<tr>
						<td><?php echo $ver['idCanalizacion'] ?></td>
						<td><?php echo $ver['Fecha'] ?></td>
						<td><?php echo $ver['Instancia'] ?></td>
						<td><?php  if($ver['EstatusCanalizacion'] == 1){ echo "Activo"; } else { echo "Inactivo";}?></td>
						<?php echo"<td><a href=\"../../formularios/docentetutor/CrearSessionTutor.php?idCanalizacion=".$ver['idCanalizacion']."\" ><button class=\"btn btn-success glyphicon glyphicon-pencil\">Modificar</button></a></td>"?>
						<?php echo"<td><a href=\"../../reportes/canalizacion.php?idCanalizacion=".$ver['idCanalizacion']."\" target=\"_blank\"><button class=\"btn btn-success glyphicon glyphicon-pencil\">Mostrar</button></a></td>"?>
					</tr>
					<?php 
				}
				?>
			</tbody>
		</table>

		</div>
		<br><br>
	</div>
</div>
