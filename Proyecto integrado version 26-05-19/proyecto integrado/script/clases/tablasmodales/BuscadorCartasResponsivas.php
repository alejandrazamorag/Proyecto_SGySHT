<?php 
	//require_once "../php/conexion.php";
	session_start();

	include_once "../SQLControlador.php";
    $Mysql = new MySQLConector();
    $Mysql->Conectar();
    $Consulta = "SELECT * FROM cartaresponsiva WHERE cartaresponsiva.Alumno_idAlumno = '".$_SESSION['IdAlumnoDocenteTutor']."';";
    $Resultado = $Mysql->Consulta($Consulta);

 ?>

<div class="row">
	<div class="col-sm-8"></div>
	<div class="col-sm-4">
		<label style="font-weight: bold;">Buscador</label>
		<select id="buscadorvivo" class="form-control input-sm">
			<option value="0">Seleciona uno</option>
			<?php
				while($ver=mysqli_fetch_row($Resultado)): 
			 ?>
				<option value="<?php echo $ver[0] ?>">
					<?php echo $ver[5]."-".$ver[9]?>
				</option>

			<?php endwhile; ?>

		</select>
	</div>
</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#buscadorvivo').select2();

			$('#buscadorvivo').change(function(){
				$.ajax({
					type:"GET",
					data:'Valor=' + $('#buscadorvivo').val(),
					url:'./../../../script/clases/tablasmodales/CrearSessionCartaResponsiva.php',
					success:function(r){
						$('#tabla').load('./../../../script/clases/tablasmodales/TablaCartasResponsivas.php');
					}
				});
			});
		});
	</script>