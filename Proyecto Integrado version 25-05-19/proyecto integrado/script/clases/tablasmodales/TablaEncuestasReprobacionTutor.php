
<?php 
session_start();
require_once "../MySQLConector.php";
$Mysql = new MySQLConector();
$Mysql->Conectar();
?>
<div class="row">
	<div class="col-md-12">
		<br>
		<br>
		<div class="table-responsive">
			<table class="table table-hover table-bordered ">
				<thead class="thead-light">
					<tr>
						<th>Id</th>
						<th>Fecha</th>
						<th>Grupo Cursado</th>
						<th>Parcial</th>
						<th>Ver</th>
					</tr>
				</thead>
				<?php 
				if(isset($_SESSION['ConsultaEncR'])){
					if($_SESSION['ConsultaEncR'] > 0){
						$idp=$_SESSION['ConsultaEncR'];
						$Consulta="SELECT encuestareprobacion.idEncuestaReprobacion,CONCAT(grupos.Grado,'-',grupos.Grupo,' ',carreras.Nombre) AS GrupoCursado, encuestareprobacion.Fecha,encuestareprobacion.Parcial FROM encuestareprobacion INNER JOIN grupos ON encuestareprobacion.idGrupo=grupos.idGrupos INNER JOIN carreras ON grupos.Carreras_idCarreras=carreras.idCarreras WHERE encuestareprobacion.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' and encuestareprobacion.idEncuestaReprobacion = '".$idp."';";


					}else{
						$Consulta="SELECT encuestareprobacion.idEncuestaReprobacion,CONCAT(grupos.Grado,'-',grupos.Grupo,' ',carreras.Nombre) AS GrupoCursado, encuestareprobacion.Fecha,encuestareprobacion.Parcial FROM encuestareprobacion INNER JOIN grupos ON encuestareprobacion.idGrupo=grupos.idGrupos INNER JOIN carreras ON grupos.Carreras_idCarreras=carreras.idCarreras WHERE encuestareprobacion.Alumno_idAlumno= '".$_SESSION['IdAlumnoDocenteTutor']."';";
					}
				}else{
					$Consulta="SELECT encuestareprobacion.idEncuestaReprobacion,CONCAT(grupos.Grado,'-',grupos.Grupo,' ',carreras.Nombre) AS GrupoCursado, encuestareprobacion.Fecha,encuestareprobacion.Parcial FROM encuestareprobacion INNER JOIN grupos ON encuestareprobacion.idGrupo=grupos.idGrupos INNER JOIN carreras ON grupos.Carreras_idCarreras=carreras.idCarreras WHERE encuestareprobacion.Alumno_idAlumno='".$_SESSION['IdAlumnoDocenteTutor']."';";
					//echo "<script type=\"text/javascript\">alert(\"Fotos guardadas\");</script>";  
				}

				$Resultado = $Mysql->Consulta($Consulta);
				while($fila = $Resultado->fetch_assoc()){ ?>
					<tbody>
						<form action="njlnljn"  method="get">
							<tr>
								<td><?php echo"<input type=\"hidden\" name=\"idEncuestaReprobacion\" value=\"".$fila['idEncuestaReprobacion']."\"/>";?><?php echo $fila['idEncuestaReprobacion']?></td>
								<td><?php echo $fila['Fecha']?></td>
								<td><?php echo $fila['GrupoCursado']?></td>
								<td><?php echo $fila['Parcial']?></td>
								<?php echo "<td><a href=\"../../reportes/EncuestaReprobacion.php?idEncuestaReprobacion=".$fila['idEncuestaReprobacion']."\" target=\"_blank\"><button class=\"btn btn-success\">Mostrar</button></a></td>";?>
							</tr>
						</form>
						<?php 
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>