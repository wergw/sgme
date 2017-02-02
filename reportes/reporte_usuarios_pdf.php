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
    <td colspan="3" bgcolor="skyblue"><CENTER><strong>LISTA DE USUARIOS</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
    
    <td><strong>NOMBRE</strong></td>
    <td><strong>USUARIO</strong></td>
    <td><strong>TIPO DE USUARIO</strong></td>
    
   
  </tr>';
  


$sql=mysql_query("SELECT p.nombre AS nombre_persona, u.usuario, pe.nombre AS perfil_nombre
                    FROM personas p                
                    INNER JOIN usuarios u ON u.persona_id=p.id
                    INNER JOIN perfiles pe ON pe.id=u.perfil_id");
while($res = mysql_fetch_array($sql)){
$codigoHTML.='	
	<tr>
		
		<td>'.$res['nombre_persona'].'</td>
		<td>'.$res['usuario'].'</td>
		<td>'.$res['perfil_nombre'].'</td>									
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
$dompdf->stream("Listado_de_usuarios".date("d-m-Y_H-i").".pdf");
?>