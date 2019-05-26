
<?php 
session_start();
require_once "../MySQLConector.php";
$Mysql = new MySQLConector();
$Mysql->Conectar();
?>
<div class="row">
	<div class="col-md-12">
		<caption>
			<a class="btn btn-success" href='../docentetutor/AgregarCartaResponsiva.php'>
				Nueva Carta responsiva
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
				if(isset($_SESSION['ConsultaCRes'])){
					if($_SESSION['ConsultaCRes'] > 0){
						$idp=$_SESSION['ConsultaCRes'];
						$Consulta="SELECT cartaresponsiva.idCartaResponsiva,cartaresponsiva.Fecha,cartaresponsiva.Asunto FROM cartaresponsiva WHERE cartaresponsiva.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."' and cartaresponsiva.idCartaResponsiva = '".$idp."';";


					}else{
						$Consulta="SELECT cartaresponsiva.idCartaResponsiva,cartaresponsiva.Fecha,cartaresponsiva.Asunto FROM cartaresponsiva WHERE cartaresponsiva.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."';";
					}
				}else{
					$Consulta="SELECT cartaresponsiva.idCartaResponsiva,cartaresponsiva.Fecha,cartaresponsiva.Asunto  FROM cartaresponsiva WHERE cartaresponsiva.Alumno_idAlumno='".$_SESSION['IdAlumnoDocenteTutor']."';";
					//echo "<script type=\"text/javascript\">alert(\"Fotos guardadas\");</script>";  
				}

				$Resultado = $Mysql->Consulta($Consulta);
				while($fila = $Resultado->fetch_assoc()){ ?>
					<tbody>
						<form action="njlnljn"  method="get">
							<tr>
								<td><?php echo"<input type=\"hidden\" name=\"idCartaResponsiva\" value=\"".$fila['idCartaResponsiva']."\"/>";?><?php echo $fila['idCartaResponsiva']?></td>
								<td><?php echo $fila['Fecha']?></td>
								<td><?php echo $fila['Asunto']?></td>
								<?php echo "<td><a href=\"../../reportes/CartaResponsiva.php?idCartaResponsiva=".$fila['idCartaResponsiva']."\" target=\"_blank\"><button class=\"btn btn-success\">Mostrar</button></a></td>";?>
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