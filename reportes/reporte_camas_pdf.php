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
    <td colspan="4" bgcolor="skyblue"><CENTER><strong>REPORTE DE SOLICITUDES DE CAMAS</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
    
    <td><strong>CENTRO</strong></td>
    <td><strong>USUARIO</strong></td>
    <td><strong>FECHA DE SOLICITUD</strong></td>
    <td><strong>OBSERVACION</strong></td>

   
  </tr>';
  


$sql=mysql_query("SELECT c.nombre AS nombre_centro, p.nombre AS nombre_persona, op.fecha_solicitud, op.observacion_solicitud,
                    CASE op.status_operacion
                      WHEN 1 THEN 'Solicitud Nueva'
                      WHEN 2 THEN 'Cama asignada'
                      WHEN 3 THEN 'Solicitud Cancelada'
                    END AS status_texto
                    FROM operaciones op
                    INNER JOIN centros c ON c.id=op.centro_id
                    INNER JOIN usuarios u ON u.id=op.usuario_id_solicitud
                    INNER JOIN personas p ON u.persona_id=p.id;");
while($res = mysql_fetch_array($sql)){
$codigoHTML.='	
	<tr>
		
		<td>'.$res['nombre_centro'].'</td>
		<td>'.$res['nombre_persona'].'</td>
		<td>'.$res['fecha_solicitud'].'</td>
		<td>'.$res['observacion_solicitud'].'</td>


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
$dompdf->stream("Reporte_solicitud_camas_".date("d-m-Y_H-i").".pdf");
?>