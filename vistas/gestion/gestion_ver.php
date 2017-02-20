<?php 
	$controladorCentros = new controladorCentros();

	if ($_GET['especialidad_id']!=-1){
	  $controladorEspecialidades = new controladorEspecialidades();
	  $row_especialidad = $controladorEspecialidades->ver($_GET['especialidad_id']);
	  $especialidad=$row_especialidad['nombre'];	
	}else{
	  $especialidad="Cualquier especialidad";
	}

	if(strlen($_GET['direccion'])==0){
		$direccion="Cualquier Ubicacion";
	}else{
		$direccion=$_GET['direccion'];
	}
	
	
	$resultado_disponibilidad = $controladorCentros->ver_disponibilidad($_GET['direccion'],$_GET['especialidad_id']);

?>
<!-- menu de opciones -->
<style type="text/css">
            body {
                background-image: url(imagenes/background2.png);
                background-repeat: repeat;
            }
</style>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	      <span class="sr-only"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="index.php"><img src="imagenes/logo.png" width="80" height="30"/></a>
	  </div>

	  <div id="navbar" class="navbar-collapse collapse">
	  	<ul class="nav navbar-nav">
	  		<li>      
	  			<a href="?cargar=gestion_inicio">Volver</a>
	      	</li>	
	  	</ul>
	    <ul class="nav navbar-nav navbar-right">
	    	
	       	<li>                    
				<a href="#nuevo" role="button" class="btn" data-toggle="modal" data-target="#ModalAyuda">Ayuda</a>
			</li>
	        <li>                    
				<a href="clases/cerrar_sesion.php">Salir</a>
	        </li>
	    </ul>
	  </div><!--/.nav-collapse -->
	</div>
</nav>
<!-- fin menu de opciones -->
<!-- Modal de Ayuda -->
<div class="modal fade" id="ModalAyuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form action="recursos/Manual de usuario Paramedico SGME.pdf" target="_blank" method="POST">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="ModalAyuda">Ayuda</h4>
				</div>
				
				<div class="modal-body">
					<div class="row-fluid">
			            <p>En este apartado podra visualizar todos los centros registrados en el sistema con las especificaciones de su busqueda.</p>
			            <p><a class="btn btn-xs btn-warning" href="#" role="button">Solicitar Cama</a> Solicita una cama en el centro.</p> 
			            <br>
			            <p>Para mas ayuda consulte el manual de usuario <input type="image" name="pdf" src="imagenes/pdf.png" width="30" height="30"/></p>
			        </div>
				</div>
				
				<div class="modal-footer">
			        <button class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
			    </div>

			</div>
		</form>
	</div>
</div>
<!-- Fin Modal de Ayuda -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //                                                                                                                                        // -->
<!-- //                                                    Seccion de tabla listado                                                            // -->
<!-- //                                                    ========================                                                            // -->
<!-- //                                                                                                                                        // -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="row-fluid">
	<div class="container">
		<h3>Centros de Salud con camas disponibles por ubicacion / especialidad</h3>
		<hr>
		<strong>Ubicacion: </strong><?php echo $direccion; ?>
		<br>
		<strong>Especialidad: </strong><?php echo $especialidad; ?>
		<hr>
		<?php if (mysql_num_rows($resultado_disponibilidad)==0){
			echo "<h4>No hay centros disponibles con el criterio seleccionado</h4>";
		}else{
		?>	
			<table border="1" align="center" class="table table-striped">
				<thead>
					<th>Id</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Camas disponibles</th>
					<th>Camas reservadas</th>
					<th>Opcion</th>
				</thead>
				<tbody>
					<?php while($row_centro = mysql_fetch_array($resultado_disponibilidad)): ?>
						<tr>
							<td align="center"><?php echo $row_centro['id']; ?></td>
							<td align="center"><?php echo $row_centro['codigo']; ?></td>
							<td align="center"><?php echo $row_centro['nombre']; ?></td>
							<td align="center"><?php echo $row_centro['direccion']; ?></td>
							<td align="center"><?php echo $row_centro['telefono']; ?></td>
							<td align="center"><?php echo $row_centro['camas_disponibles']; ?></td>
							<td align="center"><?php echo $row_centro['camas_reservadas']; ?></td>
							<td align="center">
								<?php echo "<a class='btn btn-xs btn-info' onclick='findCentro(".$row_centro['latitud'].",".$row_centro['longitud'].")' role='button'>MAP</a>"; ?>
								<a class="btn btn-xs btn-warning" href="?cargar=gestion_solicitar_cama&id=<?php echo $row_centro['id']; ?>" role="button">Solicitar Cama</a>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
			<br>
			<button class="btn btn-sm btn-info" onclick="findMe()">Mostrar tu ubicación</button>
		<?php
		}
		?>
	</div>
</div>



	<div id="map"></div>
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyG8l93tuqSuNQApKY0eHxRL-_yzvJq-8"></script>
	<script>
		function findMe(){
			var output = document.getElementById('map');

			// Verificar si soporta geolocalizacion
			if (navigator.geolocation) {
				output.innerHTML = "<p>Tu navegador soporta Geolocalizacion</p>";
			}else{
				output.innerHTML = "<p>Tu navegador no soporta Geolocalizacion</p>";
			}

			//Obtenemos latitud y longitud
			function localizacion(posicion){

				var latitude = posicion.coords.latitude;
				var longitude = posicion.coords.longitude;

				var imgURL = "https://maps.googleapis.com/maps/api/staticmap?center="+latitude+","+longitude+"&size=600x300&markers=color:red%7C"+latitude+","+longitude+"&key=AIzaSyDyG8l93tuqSuNQApKY0eHxRL-_yzvJq-8";

				output.innerHTML ="<img src='"+imgURL+"'>";
			}

			function error(){
				output.innerHTML = "<p>No se pudo obtener tu ubicación</p>";

			}

			navigator.geolocation.getCurrentPosition(localizacion,error);

		}

		function findCentro(latitud, longitud){
			var output = document.getElementById('map');

			// Verificar si soporta geolocalizacion
			if (navigator.geolocation) {
				output.innerHTML = "<p>Tu navegador soporta Geolocalizacion</p>";
			}else{
				output.innerHTML = "<p>Tu navegador no soporta Geolocalizacion</p>";
			}

			//Obtenemos latitud y longitud
			function localizacion(posicion){
				var latitude = latitud;
				var longitude = longitud;
				var imgURL = "https://maps.googleapis.com/maps/api/staticmap?center="+latitude+","+longitude+"&zoom=15&size=600x300&markers=color:bLue%7Clabel:H%7C"+latitude+","+longitude+"&key=AIzaSyDyG8l93tuqSuNQApKY0eHxRL-_yzvJq-8";
				output.innerHTML ="<img src='"+imgURL+"'>";
			}

			function error(){
				output.innerHTML = "<p>No se pudo obtener tu ubicación</p>";
			}

			navigator.geolocation.getCurrentPosition(localizacion,error);
		}


	</script>