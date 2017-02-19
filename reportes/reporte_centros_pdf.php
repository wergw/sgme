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
<script type="text/php"> 

        if ( isset($pdf) ) { 

          $font = Font_Metrics::get_font("helvetica", "bold"); 
          $pdf->page_text(72, 18, "Pagina: {PAGE_NUM} de {PAGE_COUNT}", $font, 12, array(0,0,0)); 

        } 

</script> 
<CENTER><img src="../imagenes/logo.png" alt="Generic placeholder image" width="350" height="180"></CENTER>
<CENTER><p class="text-center">SISTEMA DE GESTION MEDICA DE EMERGENCIA</p></CENTER>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4" bgcolor="skyblue"><CENTER><strong>LISTA DE CENTROS POR UBICACIÓN '.date("d-m-Y (H:i)").'</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
    
    <td><strong>CODIGO</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>DIRECCION</strong></td>
    <td><strong>TELEFONO</strong></td>
    <td><strong>CAMAS</strong></td>
   
  </tr>';
  


$sql=mysql_query("SELECT * FROM centros");
while($res = mysql_fetch_array($sql)){
$codigoHTML.='	
	<tr>
		
		<td>'.$res['codigo'].'</td>
		<td>'.$res['nombre'].'</td>
		<td>'.$res['direccion'].'</td>
		<td>'.$res['telefono'].'</td>
		<td>'.$res['camas'].'</td>											
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
$dompdf->stream("listado_de_centros_".date("d-m-Y_H-i").".pdf");
?>