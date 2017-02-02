<?php

		require_once("dompdf/dompdf_config.inc.php");
		$conexion=mysql_connect("localhost","user_sgme","123456");
		mysql_select_db("sgmdb",$conexion);


$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>

<CENTER><img src="../imagenes/logo.png" alt="Generic placeholder image" width="100" height="100"></CENTER>
<CENTER><p class="text-center">SISTEMA DE GESTION MEDICA DE EMERGENCIA</p></CENTER>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" bgcolor="skyblue"><CENTER><strong>PARAMEDICOS POR UBICACION</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
    
    <td><strong>CARGO</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>DIRECCION</strong></td>

   
  </tr>';
  


$sql=mysql_query("SELECT pe.nombre as nombre_perfil, p.nombre, p.direccion
                    FROM personas p                
                    INNER JOIN usuarios u ON u.persona_id=p.id
                    INNER JOIN perfiles pe ON pe.id=u.perfil_id
                    where pe.nombre='paramedico' 
                    order by p.direccion");
while($res = mysql_fetch_array($sql)){
$codigoHTML.='	
	<tr>
		
		<td>'.$res['nombre_perfil'].'</td>
		<td>'.$res['nombre'].'</td>
		<td>'.$res['direccion'].'</td>
										
	</tr>';
	
}
$codigoHTML.='
</table>
</body>
</html>';
$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_de_paramedicos_".date("d-m-Y_H-i").".pdf");
?>