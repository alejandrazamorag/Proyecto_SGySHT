
<?php 
session_start();
require_once "../MySQLConector.php";
$Mysql = new MySQLConector();
$Mysql->Conectar();
?>
<div class="row">
	<div class="col-md-12">
		<caption>
			<a class="btn btn-success" href='../docentetutor/AltaSolicitudBajaTutor.php'>
				Nueva Solicitud de baja
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
						<th>Motivo Solicitud de baja</th>
						<th>Ver</th>
					</tr>
				</thead>
				<?php 
				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idp=$_SESSION['consulta'];
						$Consulta="SELECT * FROM solicitudbaja WHERE solicitudbaja.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' AND solicitudbaja.idSolicitudBaja = '".$idp."';";
					}else{
						$Consulta="SELECT * FROM solicitudbaja WHERE solicitudbaja.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."';";
					}
				}else{
					$Consulta="SELECT * FROM solicitudbaja WHERE solicitudbaja.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."';";
					//echo "<script type=\"text/javascript\">alert(\"Fotos guardadas\");</script>";  
				}

				$Resultado = $Mysql->Consulta($Consulta);
				while($fila = $Resultado->fetch_assoc()){ ?>
					<tbody>
							<tr>	
								<td><?php echo"<input type=\"hidden\" name=\"idSolicitudBaja\" value=\"".$fila['idSolicitudBaja']."\"/>";?><?php echo $fila['idSolicitudBaja']?></td>
								<td><?php echo $fila['Motivo']?></td>
								<?php echo"<td><a href=\"../../reportes/SolicitudBaja.php?idSolicitudBaja=".$fila['idSolicitudBaja']."\" target=\"_blank\"><button class=\"btn btn-success glyphicon glyphicon-pencil\">Mostrar</button></a></td>"?>
							</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
			<br><br><br><br><br><br><br>
		</div>
	</div>
</div>