<?php 
session_start();

	include_once "../MySQLConector.php";
    $Mysql = new MySQLConector();
    $Mysql->Conectar();

	$Consulta ="SELECT * FROM `canalizacion` WHERE canalizacion.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."';";
	
	$Resultado = $Mysql->Consulta($Consulta);

 ?>

 <div class="row">
	<div class="col-sm-8"></div>
	<div class="col-sm-4">
		<label ><b>Buscador</b></label>
		<select id="buscadorvivo">
			<option value="0">Seleciona uno</option>
			<?php while($fila = $Resultado->fetch_assoc()){ ?>
				<option value="<?php echo $fila['idCanalizacion'] ?>">
					<?php echo $fila['Fecha']." ".$fila['Instancia'] ?>
				</option>
			<?php }?> 
		</select>
	</div>
</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#buscadorvivo').select2();

			$('#buscadorvivo').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#buscadorvivo').val(),
					url:'../../clases/tablasmodales/CrearSessionCanalizacionTutor.php',
					success:function(r){
						$('#tabla').load('../../clases/tablasmodales/TablaCanalizaciones.php');
					}
				});
			});
		});
	</script>