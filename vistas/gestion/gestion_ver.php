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
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	      <span class="sr-only"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="index.php">SGM</a>
	  </div>

	  <div id="navbar" class="navbar-collapse collapse">
	  	<ul class="nav navbar-nav">
	  		<li>      
	  			<a href="?cargar=gestion_inicio">Volver</a>
	      	</li>	
	  	</ul>
	    <ul class="nav navbar-nav navbar-right">
	    	
	       	<li>                    
				<a href="clases/cerrar_sesion.php">Seguridad</a>
			</li>
	        <li>                    
				<a href="clases/cerrar_sesion.php">Salir</a>
	        </li>
	    </ul>
	  </div><!--/.nav-collapse -->
	</div>
</nav>
<!-- fin menu de opciones -->
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
								<a class="btn btn-xs btn-warning" href="?cargar=gestion_solicitar_cama&id=<?php echo $row_centro['id']; ?>" role="button">Solicitar Cama</a>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		<?php
		}
		?>
	</div>
</div>