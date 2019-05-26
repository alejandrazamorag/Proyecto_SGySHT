function agregardatos(clave,nombre,area){

	cadena="clave=" + clave + 
			"&nombre=" + nombre +
			"&area=" + area;

	$.ajax({
		type:"GET",
		url:"./../../script/Clases/agregarDatos.php",
		data:cadena,
		success:function(carr){
			if(carr==1){
				$('#tabla').load('./../../script/Clases/tabla.php');
				$('#buscador').load('./../../script/Clases/buscador.php');
				alertify.success("agregado con exito :)");
				alertify.success(carr);
			}else{
				alertify.success(carr);
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function agregaform(datos){

	d=datos.split('||');
	var numero=d[4];
	$('#idu').val(d[0]);
	$('#claveu').val(d[1]);
	$('#nombreu').val(d[2]);
	$('#areau').val(d[3]);
	 $("#estatusu").val(numero);
}

function actualizaDatos(){


	id=$('#idu').val();
	clave=$('#claveu').val();
	nombre=$('#nombreu').val();
	area=$('#areau').val();
	estatus=$('#estatusu').val();

	cadena= "id=" + id +
			"&clave=" + clave + 
			"&nombre=" + nombre +
			"&estatus=" + estatus+
			"&area=" + area;

	$.ajax({
		type:"GET",
		url:"./../../script/Clases/actualizaDatos.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('./../../script/Clases/tabla.php');
				$('#buscador').load('./../../script/Clases/buscador.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"php/eliminarDatos.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('componentes/tabla.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}