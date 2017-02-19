<?php

	$controladorCentros = new controladorCentros(); 
	$controladorEspecialidades = new controladorEspecialidades();

	$resultadoCentros = $controladorCentros->index();
	$resultadoEspecialidades = $controladorEspecialidades->index();

	// aqui se lleva a cabo la creacion de un centro nuevo
	if(isset($_POST['crear'])){
		$r = $controladorCentros->crear($_POST['codigo'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['camas'], $_POST['especialidades']);
		if($r){
			echo "<script type='text/javascript'>";
  			echo "alert('Se ha registrado un nuevo centro');";
  			echo "window.location='index.php?cargar=centros_inicio'";
			echo "</script>";
		}else{
			echo "<script type='text/javascript'>";
  			echo "alertify.alert('El codigo introducido ya existe');";
  			
			echo "</script>";
		}
	}
	
?>
<!-- ///////////////////////////////////////////////////////////// -->
<!-- //// -->
<!-- // Seccions de Menu de Opciones // -->
<!-- //                                                   ============================                                                         // -->
<!-- //// -->
<!-- ////////////////////////// -->
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
	  			<a href="#nuevo" role="button" class="btn" data-toggle="modal" data-target="#ModalCrearCentro">Crear Centro</a>
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

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //                                                                                                                                        // -->
<!-- //                                                    Seccion de ventanas Modales                                                         // -->
<!-- //                                                    ===========================                                                         // -->
<!-- //                                                                                                                                        // -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- Modal de registro de Centro -->
<div class="modal fade" id="ModalCrearCentro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form action="" method="POST">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="ModalCrearCentro">Registrar Nuevo Centro</h4>
				</div>
				
				<div class="modal-body">
					<div class="row-fluid">
			            <div class="form-group">
			            	<label for="codigo">Codigo</label>
							<input type="text" class="form-control" id="codigo" name="codigo" maxlength="6"  placeholder="Codigo del Centro" required>
			            </div>
			            <div class="form-group">
			            	<label for="nombre">Nombre</label>
							<input type="text" class="form-control" id="nombre" name="nombre" onkeypress="return sololetras(event)" maxlength="50"  placeholder="Nombre del Centro" required>
			            </div>
			            <div class="form-group">
			            	<label for="direccion">Direccion</label>
							<input type="text" class="form-control" id="direccion" name="direccion" maxlength="60"  placeholder="Direccion del Centro" required> 
			            </div>
			            <div class="form-group">
			            	<label for="telefono">Telefono</label>
							<input type="text" class="form-control" id="telefono" name="telefono" onkeypress="return solonumeros(event)" maxlength="11"  placeholder="Telefono del Centro" required>
			            </div>
			            <div class="form-group">
			            	<label for="camas">Camas</label>
							<input type="number" class="form-control" id="camas" name="camas" value="<?php echo $row_centro['camas']; ?>"  min="0" max="100" maxlength="4" placeholder="Camas Disponibles" required>
			            </div>
			            <div class="form-group">
				            <fieldset>
			            		<legend>Especialidades del Centro:</legend>
								<?php while($row_especialidad = mysql_fetch_array($resultadoEspecialidades)): ?>
									<input type="checkbox" name="especialidades[]" id="especialidades" value="<?php echo $row_especialidad['id']; ?>">  <?php echo $row_especialidad['nombre']; ?> 
									<br><br>
								<?php endwhile; ?>
							</fieldset>
				        </div>
			        </div>
				</div>
				
				<div class="modal-footer">
			        <button class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
			       	<button class="btn btn-primary" type="submit" name="crear" value="crear"><strong><i class="icon-ok"></i>Guardar Registro</strong></button>
			    </div>

			</div>
		</form>
	</div>
</div>
<!-- Fin Modal de registro de Centro -->
<!-- Modal de Ayuda -->
<div class="modal fade" id="ModalAyuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<form action="recursos/Manual de usuario Admisitrador SGME.pdf" target="_blank" method="POST">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="ModalAyuda">Ayuda</h4>
				</div>
				
				<div class="modal-body">
					<div class="row-fluid">
			            <p>En este apartado podra visualizar todos los centros registrados en el sistema.</p>
			            <p><a class="btn btn-xs btn-success" href="#" role="button">Ver</a> Muestra la informacion completa del centro.</p> 
			            <p><a class="btn btn-xs btn-info" href="#" role="button">Editar</a> Permite editar la informacion del centro.</p> 
			            <p><a class="btn btn-xs btn-danger" href="#" role="button">Eliminar</a> Permite eliminar el Centro. </p>
			            <p>Tambien tiene la posibilidad de registrar un nuevo centro </p>
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
		<h3>Centros de Salud</h3>
		<hr>
		<table border="1" align="center" class="table table-striped">
			<thead>
				<th>Id</th>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Direccion</th>
				<th>Telefono</th>
				<th>Camas</th>
				<th>Opcion</th>
			</thead>
			<tbody>
				<?php while($row_centro = mysql_fetch_array($resultadoCentros)): ?>
					<tr>
						<td><?php echo $row_centro['id']; ?></td>
						<td><?php echo $row_centro['codigo']; ?></td>
						<td><?php echo $row_centro['nombre']; ?></td>
						<td><?php echo $row_centro['direccion']; ?></td>
						<td><?php echo $row_centro['telefono']; ?></td>
						<td><?php echo $row_centro['camas']; ?></td>
						<td>
							<a class="btn btn-xs btn-success" href="?cargar=centros_ver&id=<?php echo $row_centro['id']; ?>" role="button">Ver</a>
							<a class="btn btn-xs btn-info" href="?cargar=centros_editar&id=<?php echo $row_centro['id']; ?>" role="button">Editar</a>
							<!-- <a class="btn btn-xs btn-info" href="javascript:void(0);" data-toggle="modal" data-target="#ModalEditarCentro" onclick="editarCentro('<?php echo $row_centro['id']; ?>','ModalEditarCentro','vistas/centros/modal_editar.php');">Editar</a> -->
							<a class="btn btn-xs btn-danger" href="?cargar=centros_eliminar&id=<?php echo $row_centro['id']; ?>" role="button">Eliminar</a>
						</td>
					</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</div>
</div>