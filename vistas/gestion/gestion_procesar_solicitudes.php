<?php 
	$controladorCentros = new controladorCentros();
	//me traigo el centro al que esta asociado el usuario $_SESSION['id']
	$centro_id = $controladorCentros->buscarCentro($_SESSION['id']);
	$row_centro = $controladorCentros->ver($centro_id);
	$status_operacion=1;
	//busco las solicitudes del centro
	$resultado_operaciones = $controladorCentros->listarOperacionesPorStatus($centro_id, $status_operacion);
	//$resultado_operaciones = $controladorCentros->listarOperaciones($centro_id);
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
	  			<!-- <a href="?cargar=gestion_inicio">Volver</a>-->
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
<div class="row-fluid">
	<div class="container">
		<h3>Gestion de Solicitudes de cama</h3>
		<hr>
		<form action="" method="POST">
			<b>Codigo:</b> <?php echo $row_centro['codigo']; ?>
			<br><br>
			<b>Nombre:</b> <?php echo $row_centro['nombre']; ?>
			<br><br>
			<b>Camas disponibles:</b> <?php echo $row_centro['camas']; ?>
			<br><br>
		</form>
		<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
		<!-- //                                                                                                  // -->
		<!-- //                                     Seccion de tabla listado                                     // -->
		<!-- //                                     ========================                                     // -->
		<!-- //                                                                                                  // -->
		<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
		<?php if (mysql_num_rows($resultado_operaciones)==0){
			echo "<h4>No hay solicitudes para procesar</h4>";
		}else{
		?>
			<table border="1" align="center" class="table table-striped">
				<thead>
					<th>ID</th>
					<th>Solicitante</th>
					<th>Fecha solicitud</th>
					<th>Observaciones</th>
					<!-- <th>Estado</th>-->
					<th>Opcion</th>
				</thead>
				<tbody>
					<?php while($row_operacion = mysql_fetch_array($resultado_operaciones)): ?>
						<tr>
							<td align="center"><?php echo $row_operacion['id']; ?></td>
							<td align="center"><?php echo $row_operacion['nombre']; ?></td>
							<td align="center"><?php echo $row_operacion['fecha_solicitud']; ?></td>
							<td align="center"><?php echo $row_operacion['observacion_solicitud']; ?></td>
							<!-- <td align="center"><?php echo $row_operacion['status_texto']; ?></td>-->
							<td align="center">
								<?php if($row_operacion['status_operacion']==1){?>
									<a class="btn btn-xs btn-success" href="?cargar=gestion_asignar_cama&id=<?php echo $row_operacion['id']; ?>" role="button">Asignar Cama</a>
									<a class="btn btn-xs btn-danger" href="?cargar=gestion_cancelar_cama&id=<?php echo $row_operacion['id']; ?>" role="button">Cancelar Solicitud</a>
								<?php } else {echo 'No Aplica';}?>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		<?php } //fin del mysql_num_rows ?>
	</div>
</div>