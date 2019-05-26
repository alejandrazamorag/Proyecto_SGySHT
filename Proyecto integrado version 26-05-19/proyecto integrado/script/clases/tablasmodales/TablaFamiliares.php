
<?php 
session_start();
require_once "../MySQLConector.php";
$Mysql = new MySQLConector();
$Mysql->Conectar();
?>
<div class="row">
	<div class="col-md-12">
		<caption>
			<button class="btn btn-success" data-toggle="modal" data-target="#modalNuevo">
				Agregar nuevo familiar
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</caption>
		<br>
		<br>
		<table class="table table-hover table-bordered table-responsive">
			<thead class="thead-light">
				<tr>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Fecha Nacimiento</th>
					<th>Profesion</th>
					<th>Lugar Trabajo</th>
					<th>Parentesco</th>
					<th>Telefono</th>
					<th>Tutor</th>
					<th>Justificantes</th>
					<th>Correo</th>
					<th>CP</th>
					<th>Calle</th>
					<th>Numero</th>
					<th>Colonia</th>
					<th>Municipio</th>
					<th>Localidad</th>
					<th>Estado</th>
					<th>Telefono Casa</th>
					<th>Estatus</th>
					<th>Editar</th>
				</tr>
			</thead>
			<?php 
			if(isset($_SESSION['consulta'])){
					//echo "<script type=\"text/javascript\">1(\"Fotos guardadas\");</script>";  
				if($_SESSION['consulta'] > 0){
						//echo "<script type=\"text/javascript\">2(\"Fotos guardadas\");</script>";  
					$idp=$_SESSION['consulta'];
					$Consulta="SELECT familiares.idFamiliares, familiares.Nombre, familiares.ApellidoP, familiares.ApellidoM, familiares.FechaNacimiento, familiares.Profesion, familiares.LugarTrabajo, familiares.Parentesco, familiares.Telefono, familiares.Tutor, familiares.Justificantes, familiares.Correo, domicilio.CP, domicilio.Calle, domicilio.Numero, domicilio.Colonia, domicilio.Municipio, domicilio.Localidad, domicilio.Estado, domicilio.TelefonoCasa, familiares.Estatus from familiares, domicilio WHERE familiares.Domicilio_idDomicilio = domicilio.idDomicilio and familiares.Alumno_idAlumno = '".$_SESSION['IdAlumnoCapturista']."';";
				}else{
						//echo "<script type=\"text/javascript\">3(\"Fotos guardadas\");</script>";  
					$Consulta="SELECT familiares.idFamiliares, familiares.Nombre, familiares.ApellidoP, familiares.ApellidoM, familiares.FechaNacimiento, familiares.Profesion, familiares.LugarTrabajo, familiares.Parentesco, familiares.Telefono, familiares.Tutor, familiares.Justificantes, familiares.Correo, domicilio.CP, domicilio.Calle, domicilio.Numero, domicilio.Colonia, domicilio.Municipio, domicilio.Localidad, domicilio.Estado, domicilio.TelefonoCasa, familiares.Estatus from familiares, domicilio WHERE familiares.Domicilio_idDomicilio = domicilio.idDomicilio and familiares.Alumno_idAlumno = '".$_SESSION['IdAlumnoCapturista']."';";
				}
			}else{
				$Consulta="SELECT familiares.idFamiliares, familiares.Nombre, familiares.ApellidoP, familiares.ApellidoM, familiares.FechaNacimiento, familiares.Profesion, familiares.LugarTrabajo, familiares.Parentesco, familiares.Telefono, familiares.Tutor, familiares.Justificantes, familiares.Correo, domicilio.CP, domicilio.Calle, domicilio.Numero, domicilio.Colonia, domicilio.Municipio, domicilio.Localidad, domicilio.Estado, domicilio.TelefonoCasa, familiares.Estatus from familiares, domicilio WHERE familiares.Domicilio_idDomicilio = domicilio.idDomicilio and familiares.Alumno_idAlumno = '".$_SESSION['IdAlumnoCapturista']."';";
					//echo "<script type=\"text/javascript\">alert(\"Fotos guardadas\");</script>";  
			}

			$Resultado = $Mysql->Consulta($Consulta);
			while($ver=mysqli_fetch_row($Resultado)){ 

				$datos=$ver[0]."||".
				$ver[1]."||".
				$ver[2]."||".
				$ver[3]."||".
				$ver[4]."||".
				$ver[5]."||".
				$ver[6]."||".
				$ver[7]."||".
				$ver[8]."||".
				$ver[9]."||".
				$ver[10]."||".
				$ver[11]."||".
				$ver[12]."||".
				$ver[13]."||".
				$ver[14]."||".
				$ver[15]."||".
				$ver[16]."||".
				$ver[17]."||".
				$ver[18]."||".
				$ver[19]."||".
				$ver[20];
				?>
				<tbody>
					<tr>
						<td><?php echo $ver[1] ?></td>
						<td><?php echo $ver[2] ?></td>
						<td><?php echo $ver[3] ?></td>
						<td><?php echo $ver[4] ?></td>
						<td><?php echo $ver[5] ?></td>
						<td><?php echo $ver[6] ?></td>
						<td><?php echo $ver[7] ?></td>
						<td><?php echo $ver[8] ?></td>
						<td><?php if($ver[9] == 1){ echo "Si"; } else { echo "No";} ?></td>
						<td><?php if($ver[10] == 1){ echo "Si"; } else { echo "No";} ?></td>
						<td><?php echo $ver[11] ?></td>
						<td><?php echo $ver[12] ?></td>
						<td><?php echo $ver[13] ?></td>
						<td><?php echo $ver[14] ?></td>
						<td><?php echo $ver[15] ?></td>
						<td><?php echo $ver[16] ?></td>
						<td><?php echo $ver[17] ?></td>
						<td><?php echo $ver[18] ?></td>
						<td><?php echo $ver[19] ?></td>
						<td><?php  if($ver[20] == 1){ echo "Activo"; } else { echo "Inactivo";}?></td>

						<td>
							<button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')" >
								Modificar
							</button>
						</td>
					</tr>
					<?php 
				}
				?>
			</tbody>
		</table>
		<br><br>
	</div>
</div>
