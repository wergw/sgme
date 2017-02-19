<?php
include './Connet.php';
$restorePoint=SGBD::limpiarCadena($_POST['restorePoint']);
$sql=explode(";",file_get_contents($restorePoint));
$totalErrors=0;
for($i = 0; $i < (count($sql)-1); $i++){
    if(SGBD::sql("$sql[$i];")){  }else{ $totalErrors++; }
}
if($totalErrors<=0){
	
	echo "<script type='text/javascript'>";
            echo "alert('Restauración completada con éxito');";
            echo "window.location='respaldo.php'";
            echo "</script>";
}else{
	echo "Ocurrio un error inesperado, no se pudo hacer la restauración completamente";
}