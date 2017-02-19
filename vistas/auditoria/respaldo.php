<!-- menu de opciones -->
<style type="text/css">
            body {
                background-image: url(../../imagenes/background2.png);
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
	    <a class="navbar-brand" href="../../index.php"><img src="../../imagenes/logo.png" width="80" height="30"/></a>
	  </div>

	  <div id="navbar" class="navbar-collapse collapse">
	  	<ul class="nav navbar-nav">
	  		<li>      
	  			<a href="../../?cargar=auditoria_inicio">Volver</a>       
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
<!-- Modal de Ayuda -->
<div class="modal fade" id="ModalAyuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="../../recursos/Manual de usuario Admisitrador SGME.pdf" target="_blank" method="POST">
      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="ModalAyuda">Ayuda</h4>
        </div>
        
        <div class="modal-body">
          <div class="row-fluid">
                  <p>En este apartado podra realizar una copia de la base de datos y/o restaurarla a una copia anteriormente realizada.</p>
			      <p><a class="btn btn-xs btn-info" href="#" role="button">Realizar copia de seguridad</a> Crea un respaldo de la base de datos actual.</p> 
			      <p><a class="btn btn-xs btn-success" href="#" role="button">Restaurar</a> Restaura la base de datos a una copia seleccionada</p>
                  <p>Para mas ayuda consulte el manual de usuario <input type="image" name="pdf" src="../../imagenes/pdf.png" width="30" height="30"/></p>
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
<?php
		include './Connet.php';
	?>
	
	<a class="btn btn-btn btn-info" href="./Backup.php">Realizar copia de seguridad</a>
	<form action="./Restore.php" method="POST"> <br>
		<label>Selecciona un punto de restauración</label><br>
		<select name="restorePoint">
			<option value="" disabled="" selected="">Selecciona un punto de restauración</option>
			<?php
				$ruta=BACKUP_PATH;
				if(is_dir($ruta)){
				    if($aux=opendir($ruta)){
				        while(($archivo = readdir($aux)) !== false){
				            if($archivo!="."&&$archivo!=".."){
				                $nombrearchivo=str_replace(".sql", "", $archivo);
				                $nombrearchivo=str_replace("-", ":", $nombrearchivo);
				                $ruta_completa=$ruta.$archivo;
				                if(is_dir($ruta_completa)){
				                }else{
				                    echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
				                }
				            }
				        }
				        closedir($aux);
				    }
				}else{
				    echo $ruta." No es ruta válida";
				}
			?>
		</select>
		<button type="submit" class="btn btn-btn btn-success" type="submit" >Restaurar</button>
	</form>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Sistema de gestion de camas de centros asistenciales</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/navbar-fixed-top.css">
        <link rel="stylesheet" href="css/alertify.core.css">
        <link rel="stylesheet" href="css/alertify.default.css">
        <script src="js/ie-emulation-modes-warning.js"></script>
        <script src="js/alertify.min.js"></script>
        <script src="js/jquery.js"></script>     
        <script src="js/notify.js"></script>   
  </head>
    <body> 
     <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="js/ie10-viewport-bug-workaround.js"></script>
        <script src="js/bootstrap-transition.js"></script>
        <script src="js/bootstrap-alert.js"></script>
        <script src="js/bootstrap-modal.js"></script>
        <script src="js/bootstrap-dropdown.js"></script>
        <script src="js/bootstrap-scrollspy.js"></script>
        <script src="js/bootstrap-tab.js"></script>
        <script src="js/bootstrap-tooltip.js"></script>
        <script src="js/bootstrap-popover.js"></script>
        <script src="js/bootstrap-button.js"></script>
        <script src="js/bootstrap-collapse.js"></script>
        <script src="js/bootstrap-carousel.js"></script>
        <script src="js/bootstrap-typeahead.js"></script>
        <!-- <script type="text/javascript" src="js/prototype.js"></script>-->
        <script type="text/javascript" src="js/eventos.js"></script>    
        <script src="js/notify.js"></script>
        <script src="js/alertify.min.js"></script>         
        <link rel="stylesheet" href="css/alertify.core.css">
        <link rel="stylesheet" href="css/alertify.default.css">
    </body>
</html>     	
