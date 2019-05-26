
<?php 
session_start();
require_once "../MySQLConector.php";
$Mysql = new MySQLConector();
$Mysql->Conectar();
?>
<div class="row">
	<div class="col-md-12">
		<caption>
			<a class="btn btn-success" href='../docentetutor/AltaCartaCompromisoTutor.php'>
				Nueva Carta Compromiso
				<span class="glyphicon glyphicon-plus"></span>
			</a>
		</caption>
		<br>
		<br>
		<div class="table-responsive">
			<table class="table table-hover table-bordered ">
				<thead class="thead-light">
					<tr>
						<th>Id</th>
						<th>Fecha</th>
						<th>Motivo de Carta Compromiso</th>
						<th>Ver</th>
					</tr>
				</thead>
				<?php 
				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idp=$_SESSION['consulta'];
						$Consulta="SELECT alumno.Nombre AS NombreAlumno, alumno.ApellidoP AS ApellidoPAlumno, alumno.ApellidoM AS ApellidoMAlumno, cartacompromiso.idCartaCompromiso ,cartacompromiso.Fecha, cartacompromiso.AcuerdosRealizados, cartacompromiso.Motivo FROM alumno, cartacompromiso WHERE alumno.idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' AND cartacompromiso.Alumno_idAlumno = alumno.idAlumno and cartacompromiso.idCartaCompromiso = '".$idp."' ;";
					}else{
						$Consulta="SELECT alumno.Nombre AS NombreAlumno, alumno.ApellidoP AS ApellidoPAlumno, alumno.ApellidoM AS ApellidoMAlumno, cartacompromiso.idCartaCompromiso ,cartacompromiso.Fecha, cartacompromiso.AcuerdosRealizados, cartacompromiso.Motivo FROM alumno, cartacompromiso WHERE alumno.idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' AND cartacompromiso.Alumno_idAlumno = alumno.idAlumno ;";
					}
				}else{
					$Consulta="SELECT alumno.Nombre AS NombreAlumno, alumno.ApellidoP AS ApellidoPAlumno, alumno.ApellidoM AS ApellidoMAlumno, cartacompromiso.idCartaCompromiso ,cartacompromiso.Fecha, cartacompromiso.AcuerdosRealizados, cartacompromiso.Motivo FROM alumno, cartacompromiso WHERE alumno.idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' AND cartacompromiso.Alumno_idAlumno = alumno.idAlumno ;";
					//echo "<script type=\"text/javascript\">alert(\"Fotos guardadas\");</script>";  
				}

				$Resultado = $Mysql->Consulta($Consulta);
				while($fila = $Resultado->fetch_assoc()){ ?>
					<tbody>
						<form action="njlnljn"  method="get">
							<tr>
								<td><?php echo"<input type=\"hidden\" name=\"idCartaCompromiso\" value=\"".$fila['idCartaCompromiso']."\"/>";?><?php echo $fila['idCartaCompromiso']?></td>
								<td><?php echo $fila['Fecha']?></td>
								<td><?php echo $fila['Motivo']?></td>
								<?php echo "<td><a href=\"../../reportes/CartaCompromiso.php?idCartaCompromiso=".$fila['idCartaCompromiso']."\" target=\"_blank\"><button class=\"btn btn-success\">Mostrar</button></a></td>";?>
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