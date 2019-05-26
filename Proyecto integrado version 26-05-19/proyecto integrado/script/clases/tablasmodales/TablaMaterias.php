
<?php 
if (!isset($_SESSION)) { session_start(); }


	//require_once "../php/conexion.php";
	//$conexion=conexion();

include_once "../SQLControlador.php";
$Mysql = new MySQLConector();
$Mysql->Conectar();

?>

	

<div class="row">
	<div class="col-sm-12">
		<!--<h2>Tabla de carreras</h2>-->
		<br>
		<caption>
			<button class="btn btn-success" data-toggle="modal" data-target="#modalNuevo">
				Agregar nueva materia
				<span class="glyphicon glyphicon-plus"></span>
			</button>
			<br>
			<div class="table-responsive">
			<table class="table table-hover table-bordered">
				<br>
			</caption>
			<thead class="thead-light">
			<tr>
				<th>Id</td>
				<th>Carrera</td>
				<th>Clave</td>
				<th>Nombre</td>
				<th>Componente</td>
				<th>Semestre</td>
					<th>Estatus</td>
						<th>Editar</td>
			</tr>
			</thead>

			<?php 

			if(isset($_SESSION['ConsultaM'])){
				if($_SESSION['ConsultaM'] > 0){
					$IdMateria=$_SESSION['ConsultaM'];
					$Consulta = "SELECT materia.idMateria, carreras.Nombre AS NombreCarrera, materia.Clave, materia.Nombre, materia.Componente, materia.Semestre, materia.Estatus, carreras.idCarreras FROM materia INNER JOIN carreras ON carreras.idCarreras =materia.Carreras_idCarreras where materia.idMateria='$IdMateria';";

				}else{
					$Consulta = "SELECT materia.idMateria, carreras.Nombre AS NombreCarrera, materia.Clave, materia.Nombre, materia.Componente, materia.Semestre, materia.Estatus, carreras.idCarreras FROM materia INNER JOIN carreras ON carreras.idCarreras =materia.Carreras_idCarreras;";
				}
			}else{
				$Consulta = "SELECT materia.idMateria, carreras.Nombre AS NombreCarrera, materia.Clave, materia.Nombre, materia.Componente, materia.Semestre, materia.Estatus, carreras.idCarreras  FROM materia INNER JOIN carreras ON carreras.idCarreras =materia.Carreras_idCarreras;";
			}
			$Resultado = $Mysql->Consulta($Consulta);
			while($ver=mysqli_fetch_row($Resultado)){ 

				$datosM=$ver[0]."||".
				$ver[1]."||".
				$ver[2]."||".
				$ver[3]."||".
				$ver[4]."||".
				$ver[5]."||".
				$ver[6]."||".
				$ver[7];
				//echo $datosM;
				?>

				<tr>
					<td><?php echo $ver[0] ?></td>
					<td><?php echo $ver[1] ?></td>
					<td><?php echo $ver[2] ?></td>
					<td><?php echo $ver[3] ?></td>
					<td><?php
					if($ver[4]=='B'){
						echo "Básico";
					}else if($ver[4]=='P'){
						echo "Profesional";
					} ?>
					<td><?php echo $ver[5] ?></td>
					<td><?php
					if($ver[6]==1){
						echo "Activo";
					}else if($ver[6]==0){
						echo "Inactivo";
					} ?>

				</td>
				<td>
					<button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="VerDatosMateriaModificacion('<?php echo $datosM ?>')">
						Modificar
					</button>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
	<br><br>
	</div>
</div>
</div>