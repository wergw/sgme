<style type="text/css">
            body {
                background-image: url(imagenes/background.png);
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
      <a class="navbar-brand" href="index.php">SGM</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li>                    
            <a href="clases/cerrar_sesion.php">Salir</a>
        </li>
        
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

<div class="container">
  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>REPORTES</h1>
    <p>Listado de reportes a consultar </p>
  </div>
</div> <!-- /container -->
<!-- Three columns of text below the carousel -->
<div class="container marketing">
  <div class="row">
    <div class="col-lg-4">
      <a href="reportes/reporte_camas_pdf.php" class="thumbnail">
        <img src="imagenes/icono_gestion_camas.png" alt="Generic placeholder image" width="50" height="50">
        <p class="text-center">Reporte de solicitudes de camas</p>
      </a>
    </div>
    <div class="col-lg-4">
      <a href="reportes/reporte_especialidad_pdf.php" class="thumbnail">
        <img src="imagenes/icono_especialidades.png" alt="Generic placeholder image" width="50" height="50">
        <p class="text-center">Reporte de solicitudes de especialidad</p>
      </a>
    </div>
    <div class="col-lg-4">
      <a href="reportes/reporte_paramedico_pdf.php" class="thumbnail">
        <img src="imagenes/icono_especialidades.png" alt="Generic placeholder image" width="50" height="50">
        <p class="text-center">Reporte de paramedicos</p>
      </a>
    </div>
    <br>
  </div>

  <div class="row">
    <div class="col-lg-4">
      <a href="reportes/reporte_centros_pdf.php" class="thumbnail">
        <img src="imagenes/icono_centros.png" alt="Generic placeholder image" width="50" height="50">
        <p class="text-center">Reporte de centros</p>
      </a>
    </div>
    <div class="col-lg-4">
      <a href="reportes/reporte_usuarios_pdf.php" class="thumbnail">
        <img src="imagenes/icono_usuarios.png" alt="Generic placeholder image" width="80" height="80">
        <p class="text-center">Reporte de usuario</p>
      </a>
    </div>
  </div>
  </div>
</div>