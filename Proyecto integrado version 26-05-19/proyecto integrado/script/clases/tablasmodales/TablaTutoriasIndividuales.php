
<?php 
session_start();
require_once "../MySQLConector.php";
$Mysql = new MySQLConector();
$Mysql->Conectar();
?>
<div class="row">
	<div class="col-md-12">
		<caption>
			<a href="../../formularios/docentetutor/AltaTutoriaIndividual.php"><button class="btn btn-success">
				Agregar Nueva Tutoria
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
						<th>No.Tutoria</th>
						<th>Fecha</th>
						<th>Horario</th>
						<th>Ver</th>
					</tr>
				</thead>
				<?php 
				if(isset($_SESSION['consulta'])){
					//echo "<script type=\"text/javascript\">1(\"Fotos guardadas\");</script>";  
					if($_SESSION['consulta'] > 0){
						//echo "<script type=\"text/javascript\">2(\"Fotos guardadas\");</script>";  
						$idp=$_SESSION['consulta'];
						$Consulta="SELECT * FROM `tutoriaindividual` WHERE tutoriaindividual.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' AND tutoriaindividual.idTutoriaIndividual = '".$idp."';";
					}else{
						//echo "<script type=\"text/javascript\">3(\"Fotos guardadas\");</script>";  
						$Consulta="SELECT * FROM `tutoriaindividual` WHERE tutoriaindividual.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."';";
					}
				}else{
					$Consulta="SELECT * FROM `tutoriaindividual` WHERE tutoriaindividual.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."';";
					//echo "<script type=\"text/javascript\">alert(\"Fotos guardadas\");</script>";  
				}

				$Resultado = $Mysql->Consulta($Consulta);
				while($ver=mysqli_fetch_array($Resultado)){ 

					$datos=$ver['idTutoriaIndividual']."||".
					$ver['Alumno_idAlumno']."||".
					$ver['NoTutoria']."||".
					$ver['FechaTutoria']."||".
					$ver['Horario']."||".
					$ver['ActividadesTareas'];
					

					?>
					<tbody>
						<tr>
							<td><?php echo $ver['idTutoriaIndividual'] ?></td>
							<td><?php echo $ver['NoTutoria'] ?></td>
							<td><?php echo $ver['FechaTutoria'] ?></td>
							<td><?php echo $ver['Horario'] ?></td>
							<?php echo"<td><a href=\"../../reportes/tutoriaindividual.php?idTutoriaIndividual=".$ver['idTutoriaIndividual']."\" target=\"_blank\"><button class=\"btn btn-success glyphicon glyphicon-pencil\">Mostrar</button></a></td>"?>
						</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
