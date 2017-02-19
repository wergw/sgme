<?php 
	$controladorEspecialidades = new controladorEspecialidades(); 
	$resultadoEspecialidades = $controladorEspecialidades->index();

	// aqui se lleva a cabo la creacion de una especialidad nueva
	
	if(isset($_POST['enviar'])){
		$r = $controladorEspecialidades->crear($_POST['codigo'], $_POST['nombre'], $_POST['status'], 
			 $_POST['observacion']);
		header('Location: index.php?cargar=especialidades_inicio');
		if($r){
			//echo "Se ha registrado una nueva especialidad";
			echo "<script type='text/javascript'>";
  			echo "alert('Se ha registrado una nueva especialidad');";
			echo "</script>";
		}else{
			echo "<script type='text/javascript'>";
  			echo "alertify.alert('El codigo introducido ya existe');";
			echo "</script>";
		}
	}
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
	  			<a href="#nuevo" role="button" class="btn" data-toggle="modal" data-target="#ModalCrearCentro">Registrar Especialidad</a>         
	        	<!--<a href="clases/cerrar_sesion.php">Crear Centro</a>-->
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
<!-- Modal de registro de especialidades -->
<div class="modal fade" id="ModalCrearCentro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Registrar Nueva Especialidad</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST">
					<div class="modal-body">
						<div class="row-fluid">
				            <div class="form-group">
				            	<label for="codigo">Codigo</label>
								<input type="text" class="form-control" id="codigo" name="codigo" maxlength="5" placeholder="Codigo de la Especialidad">
				            </div>
				            <div class="form-group">
				            	<label for="nombre">Nombre</label>
								<input type="text" class="form-control" id="nombre" name="nombre" onkeypress="return sololetras(event)" maxlength="20" placeholder="Nombre de la Especialidad">
				            </div>
				            
				            <div class="form-group">
				            	<label for="observacion">Observacion</label>
								<input type="text" class="form-control" id="observacion" name="observacion" maxlength="100" placeholder="Observaciones de la Especialidad">
				            </div>
				            
				        </div>
					</div>
					<div class="modal-footer">
				        <button class="btn" data-dismiss="modal" aria-hidden="true"><strong><i class="icon-remove"></i> Cerrar</strong></button>
				       	<button class="btn btn-primary" type="submit" name="enviar" value="Crear"><strong><i class="icon-ok"></i>Guardar Registro</strong></button>
				    </div>
				</form>
			</div>
		</div>
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
			            <p>En este apartado podra visualizar todas las especialidades registrada en el sistema .</p>
			            <p><a class="btn btn-xs btn-success" href="#" role="button">Ver</a> Muestra la informacion completa de la especialidad.</p> 
			            <p><a class="btn btn-xs btn-info" href="#" role="button">Editar</a> Permite editar la especialidad..</p> 
			            <p><a class="btn btn-xs btn-danger" href="#" role="button">Eliminar</a> Permite eliminar la especialidad. </p>
			            <p>Tambien tiene la posibilidad de registrar una nueva Especialidad</p>
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
<h3>Especialidades</h3>
<table border="1" align="center" class="table table-striped">
	<thead>
		<th>Id</th>
		<th>Codigo</th>
		<th>Nombre</th>
		
		<th>Opcion</th>
		
	</thead>
	<tbody>
		<?php while($row = mysql_fetch_array($resultadoEspecialidades)): ?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['codigo']; ?></td>
				<td><?php echo $row['nombre']; ?></td>
						
				<td>
					<a class="btn btn-xs btn-success" href="?cargar=especialidades_ver&id=<?php echo $row['id']; ?>">Ver</a>
					<a class="btn btn-xs btn-info" href="?cargar=especialidades_editar&id=<?php echo $row['id']; ?>">Editar</a>
					<a class="btn btn-xs btn-danger" href="?cargar=especialidades_eliminar&id=<?php echo $row['id']; ?>">Eliminar</a>
				</td>
			</tr>
		<?php endwhile; ?>
	</tbody>	
</table>