<?php 
	$controlador = new controladorUsuarios();
	if(isset($_GET['id'])){
		$row = $controlador->ver($_GET['id']);
	}else{
		header('Location: index.php?cargar=usuarios_inicio');
	}

	if(isset($_POST['enviar'])){
		$controlador->eliminar($_GET['id']);
		echo "<script type='text/javascript'>";
  		echo "alert('Se ha eliminado el Usuario');";
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
<b>Usuario:</b> <?php echo $row['usuario']; ?>
<br><br>

<b>Nombre:</b> <?php echo $row['persona_nombre']; ?>
<br><br>

<b>Cedula:</b> <?php echo $row['persona_cedula']; ?>
<br><br>

<b>Dirección:</b> <?php echo $row['persona_direccion']; ?>
<br><br>

<b>Telefono:</b> <?php echo $row['persona_telefono']; ?>
<br><br>

<b>Tipo de Usuario:</b> <?php echo $row['perfil_nombre']; ?>
<br><br>
<form action="" method="POST">
¿Usted de verdad quiere eliminar el usuario?
	<input class="btn btn-xs btn-danger" type="submit" name="enviar" value="Eliminar">
</form>