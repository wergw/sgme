<?php 
	$controlador = new controladorUsuarios();
	if(isset($_GET['id'])){
		$row = $controlador->ver($_GET['id']);
	}else{
		header('Location: index.php?cargar=usuarios_inicio');
	}

	if(isset($_POST['enviar'])){
		  $controlador->editar($_GET['id'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono'], 
			 $_POST['perfil_id']);
			echo "<script type='text/javascript'>";
			echo "alert('Ha editado el usuario');";
  			echo "window.location='index.php?cargar=usuarios_inicio'";
			echo "</script>";
			
	}
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
	  			<a href="?cargar=usuarios_inicio">Volver</a>       
	        	<!--<a href="clases/cerrar_sesion.php">Crear Centro</a>-->
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
<form action="" method="POST">
	
	<div class="form-group">
		<label for="usuario">Usuario</label>
		<input type="text" class="form-control"  name="usuario" value="<?php echo $row['usuario']; ?>" disabled>
	</div>
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" name="nombre" onkeypress="return sololetras(event)" maxlength="25" value="<?php echo $row['persona_nombre']; ?>" required>
	</div>
	<div class="form-group">
		<label for="cedula">Cedula</label>
		<input type="text" class="form-control" name="cedula" value="<?php echo $row['persona_cedula']; ?>" disabled>
	</div>
	<div class="form-group">
		<label for="direccion">Dirección</label>
		<input type="text" class="form-control" name="direccion" maxlength="60" value="<?php echo $row['persona_direccion']; ?>" required>
	</div>
	<div class="form-group">
		<label for="telefono">Telefono</label>
		<input type="text" class="form-control" name="telefono" onkeypress="return solonumeros(event)" maxlength="15" value="<?php echo $row['persona_telefono']; ?>" required>
	</div>
	
	<div class="form-group">
		<label for="perfil_id">Tipo de Usuario</label>
								<select name="perfil_id" >
									<option value="1">Administrado</option>
									<option value="2">Paramedico</option>
									<option value="3">Recepcionista</option>
								</select>
		<input class="btn btn-default btn-success" type="submit" name="enviar" value="Editar">
		
	</div>	
</form>
