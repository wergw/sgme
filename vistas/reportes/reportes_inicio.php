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
      <a class="navbar-brand" href="index.php"><img src="imagenes/logo.png" width="80" height="30"/></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
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

<div class="container">
  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>REPORTES</h1>
    <p>Listado de reportes a consultar </p>
  </div>
</div> <!-- /container -->
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
                  <p>En este apartado podra descargar el reporte que necesite</p>
                  <p>Reporte de solicitud de camas: Las personas que solicitaron camas y su status <img src="imagenes/icono_gestion_camas.png" alt="Generic placeholder image" width="25" height="25"></p>
                  <p>Reporte de paramedicos: Lista de paramedicos por ubicacion <img src="imagenes/icono_especialidades.png" alt="Generic placeholder image" width="25" height="25"></p>
                  <p>Reporte de centros: Lista de centros registrados en el sistema <img src="imagenes/icono_centros.png" alt="Generic placeholder image" width="25" height="25"></p>
                  <p>Reporte de usuarios: Lista de usuarios registrados en el sistema <img src="imagenes/icono_usuarios.png" alt="Generic placeholder image" width="25" height="25"></p>
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
<!-- Three columns of text below the carousel -->
<div class="container marketing">
  <div class="row">
    <div class="col-lg-6">
      <a href="reportes/reporte_camas_pdf.php" class="thumbnail">
        <img src="imagenes/icono_gestion_camas.png" alt="Generic placeholder image" width="50" height="50">
        <p class="text-center">Reporte de solicitudes de camas</p>
      </a>
    </div>
    <div class="col-lg-6">
      <a href="reportes/reporte_paramedico_pdf.php" class="thumbnail">
        <img src="imagenes/icono_especialidades.png" alt="Generic placeholder image" width="50" height="50">
        <p class="text-center">Reporte de paramedicos</p>
      </a>
    </div>
    <br>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <a href="reportes/reporte_centros_pdf.php" class="thumbnail">
        <img src="imagenes/icono_centros.png" alt="Generic placeholder image" width="50" height="50">
        <p class="text-center">Reporte de centros</p>
      </a>
    </div>
    <div class="col-lg-6">
      <a href="reportes/reporte_usuarios_pdf.php" class="thumbnail">
        <img src="imagenes/icono_usuarios.png" alt="Generic placeholder image" width="80" height="80">
        <p class="text-center">Reporte de usuario</p>
      </a>
    </div>
  </div>
  </div>
</div>