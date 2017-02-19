<?php 
$controladorUsuarios = new controladorUsuarios();
$controladorCentros = new controladorCentros();  
	$resultadoUsuarios = $controladorUsuarios->index();
	$resultadoCentros = $controladorCentros->index();

	// aqui se lleva a cabo la creacion de una especialidad nueva

	if(isset($_POST['enviar'])){
		$r = $controladorUsuarios->crear($_POST['usuario'], $_POST['nombre'], $_POST['cedula'], $_POST['direccion'], $_POST['telefono'], 
			 $_POST['perfil_id'], $_POST['recepcionistas_centros']);
		
		if($r){
			header('Location: index.php?cargar=usuarios_inicio');
		}else{
			echo "<script type='text/javascript'>";
  			echo "alert('El Usuario se a registrado');";
  			echo "window.location='index.php?cargar=usuarios_inicio'";
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
	  			<a href="#nuevo" role="button" class="btn" data-toggle="modal" data-target="#ModalCrearCentro">Registrar Usuario</a>         
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
<!-- Modal de registro de Centro -->
<script>
function habilitarCombo(valor){
if(valor==3){
document.getElementById("perfil_id").disabled = false;
document.getElementById("centros").disabled = false; 
}
else {

document.getElementById("centros").disabled = true; 
}
}
</script>

<div class="modal fade" id="ModalCrearCentro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Registrar Nuevo Usuario</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST">
					<div class="modal-body">
						<div class="row-fluid">
				            <div class="form-group">
				            	<label for="usuario">Usuario</label>
								<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
				            </div>
				            <div class="form-group">
				            	<label for="nombre">Nombre y Apellido</label>
								<input type="text" class="form-control" id="nombre" onkeypress="return sololetras(event)" maxlength="35" name="nombre" placeholder="Nombre y Apellido del Usuario">
				            </div>
				                <div class="form-group">
				            	<label for="cedula">Cedula</label>
								<input type="text" class="form-control" id="cedula" onkeypress="return solonumeros(event)" maxlength="8"  name="cedula" placeholder="Cedula del Usuario">
				            </div>
				            <div class="form-group">
				            	<label for="direccion">Dirección</label>
								<input type="text" class="form-control" id="direccion" maxlength="60" name="direccion" placeholder="Dirección del Usuario">
				            </div>
				            <div class="form-group">
				            	<label for="telefono">Telefono</label>
								<input type="text" class="form-control" id="telefono" onkeypress="return solonumeros(event)" maxlength="15"  name="telefono" placeholder="Telefono del Usuario">
				            </div>
				            <div class="form-group">
				            	<label for="perfil_id">Tipo de Usuario</label>
								<select name="perfil_id" id="perfil_id" onchange="habilitarCombo(this.value);">
									<option value="0">Seleccionar</option>
									<option value="1">Administrado</option>
									<option value="2">Paramedico</option>
									<option value="3">Recepcionista</option>
								</select>
								<label for="centros">Centro</label>
								<select name="centros" id="centros" disabled="true">
									<option value="0">Seleccionar</option>
									<?php
									 while($row=mysql_fetch_array($resultadoCentros))
 									{?>
 									<option value="<?php echo $row['id']?>"><?php echo $row['nombre'];?></option>
 									<?php } ?>

								</select>
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
			            <p>En este apartado podra visualizar todos los usuarios registrados en el sistema .</p>
			            <p><a class="btn btn-xs btn-success" href="#" role="button">Ver</a> Muestra la informacion completa del usuario.</p> 
			            <p><a class="btn btn-xs btn-info" href="#" role="button">Editar</a> Permite editar los datos del usuario.</p> 
			            <p><a class="btn btn-xs btn-danger" href="#" role="button">Eliminar</a> Permite eliminar el usuario. </p>
			            <p>Tambien tiene la posibilidad de registrar un nuevo usuario</p>
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
<h3>Usuarios</h3>
<table border="1" align="center" class="table table-striped">
	<thead>
		<th>Id</th>
		<th>Usuario</th>
		<th>Nombre</th>
		<th>Tipo de Usuario</th>
		<th>Opcion</th>
		
	</thead>
	<tbody>
		<?php while($row = mysql_fetch_array($resultadoUsuarios)): ?>
			<tr>
				<td><?php echo $row['usuario_id']; ?></td>
				<td><?php echo $row['usuario']; ?></td>
				<td><?php echo $row['persona_nombre']; ?></td>
				<td><?php echo $row['perfil_nombre']; ?></td>
				
				<td>
					<a class="btn btn-xs btn-success" href="?cargar=usuarios_ver&id=<?php echo $row['usuario_id']; ?>">Ver</a>
					<a class="btn btn-xs btn-info" href="?cargar=usuarios_editar&id=<?php echo $row['usuario_id']; ?>">Editar</a>
					<a class="btn btn-xs btn-danger" href="?cargar=usuarios_eliminar&id=<?php echo $row['usuario_id']; ?>">Eliminar</a>
				</td>
			</tr>
		<?php endwhile; ?>
	</tbody>	
</table>