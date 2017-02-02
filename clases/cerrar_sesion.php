<?php
	session_start();
	var_dump(">>>>".$_SESSION['usuario']);
	if(isset($_SESSION['usuario'])){
		session_destroy();
		header("location:../login.php");
	}else{
		echo"operacion incorrecta".liga2(',javascript:history.back()','reintentar')."";
	}
?>