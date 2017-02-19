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
	  			<!-- <a href="?cargar=gestion_inicio">Volver</a>-->
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
		<form action="recursos/Manual de usuario Recepcinista SGME.pdf" target="_blank" method="POST">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="ModalAyuda">Ayuda</h4>
				</div>
				
				<div class="modal-body">
					<div class="row-fluid">
			            <p>En este apartado podra visualizar las solicitudes de camas en este centro</p>
			            <p><a class="btn btn-xs btn-success" href="#" role="button">Asignar Cama</a> Asigna la cama al solicitante</p> 
			            <p><a class="btn btn-xs btn-danger" href="#" role="button">Cancelar Solicitud</a>Cancela la solicitud</p>
			            <p>Para mas ayuda consulte el manual de usuario <input type="image" name="pdf" src="imagenes/pdf.png" width="30" height="30"/></p>
			            <p>Tambien tiene la posibilidad de registrar un paciente al sistema</p>
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
<br>
<br>
<br>

<div class="container">
		<h3>Registro de paciente</h3>
</div>
<br>	
<form class="form-horizontal">
    <div class="form-group">
        <label class="control-label col-xs-3">Nombre:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" maxlength="25" onkeypress="return sololetras(event)" placeholder="Nombre">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Apellido:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" maxlength="40" onkeypress="return sololetras(event)" placeholder="Apellido">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Cedula:</label>
        <div class="col-xs-9">
            <input type="text" class="form-control" maxlength="8" onkeypress="return solonumeros(event)" placeholder="Cedula">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3" >Telefono:</label>
        <div class="col-xs-9">
            <input type="tel" class="form-control" maxlength="11" onkeypress="return solonumeros(event)" placeholder="Telefono">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">F. Nacimiento:</label>
        <div class="col-xs-3">
            <input type="number" class="form-control" maxlength="2" placeholder="Dia">
        </div>
        <div class="col-xs-3">
            <select class="form-control">
                <option>Mes</option>
                <option value="1">Enero</option>
                <option value="1">Febrero</option>
                <option value="1">Marzo</option>
                <option value="1">Abril</option>
                <option value="1">Mayo</option>
                <option value="1">Junio</option>
                <option value="1">Julio</option>
                <option value="1">Agosto</option>
                <option value="1">Septiembre</option>
                <option value="1">Octubre</option>
                <option value="1">Noviembre</option>
                <option value="1">Diciembre</option>
            </select>
        </div>
        <div class="col-xs-3">
            <input type="number"  class="form-control" placeholder="Año">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Reporte:</label>
        <div class="col-xs-9">
            <textarea rows="3" class="form-control" placeholder="Reporte"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Genero:</label>
        <div class="col-xs-2">
            <label class="radio-inline">
                <input type="radio" name="genderRadios" value="male"> Maculino
            </label>
        </div>
        <div class="col-xs-2">
            <label class="radio-inline">
                <input type="radio" name="genderRadios" value="female"> Femenino
            </label>
        </div>
    </div>
    <
    <br>
    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            
            <a href="#" class="btn btn-success" id="simple_alert">Guardar</a>
            <input type="reset" class="btn btn-default" value="Limpiar">
        </div>
    </div>
</form>