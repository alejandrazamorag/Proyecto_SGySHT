
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
				Agregar nueva carrera
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
				<th>Clave</td>
				<th>Nombre</td>
				<th>Area de especialidad</td>
				<th>Estatus</td>
				<th>Editar</td>
			</tr>
			</thead>

			<?php 

			if(isset($_SESSION['ConsultaC'])){
				if($_SESSION['ConsultaC'] > 0){
					$IdCarrera=$_SESSION['ConsultaC'];


					$Consulta = "SELECT idCarreras, Clave, Nombre, AreaEspecialidad, Estatus FROM carreras where idCarreras='$IdCarrera';";

				}else{
					$Consulta = "SELECT idCarreras, Clave, Nombre, AreaEspecialidad, Estatus FROM carreras;";
				}
			}else{
				$Consulta = "SELECT idCarreras, Clave, Nombre, AreaEspecialidad, Estatus FROM carreras;";
			}

				//$result=mysqli_query($conexion,$sql);
			$Resultado = $Mysql->Consulta($Consulta);
			while($ver=mysqli_fetch_row($Resultado)){ 

				$datos=$ver[0]."||".
				$ver[1]."||".
				$ver[2]."||".
				$ver[3]."||".
				$ver[4];
				//echo $datos;
				?>

				<tr>
					<td><?php echo $ver[0] ?></td>
					<td><?php echo $ver[1] ?></td>
					<td><?php echo $ver[2] ?></td>
					<td><?php echo $ver[3] ?></td>
					<td><?php
					if($ver[4]==1){
						echo "Activo";
					}else if($ver[4]==0){
						echo "Inactivo";
					} ?>

				</td>
				<td>
					<button class="btn btn-success glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="VerDatosCarreraModificacion('<?php echo $datos ?>')">
						Modificar
					</button>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
	</div>
</div>
</div>