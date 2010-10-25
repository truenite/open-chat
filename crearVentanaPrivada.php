<?php

session_start();
if($_SESSION == null){
	header('Location: index.php');	
}
require("coneccion.php");
$fecha = $_SESSION['fechaPrivado'];
$query="SELECT * FROM chatprivado WHERE receptor = '".$_SESSION['usuario']."' and fecha > '".$fecha."' ORDER BY fecha;;";
$resultado=mysql_query($query);
if(!$resultado){
	exit("Ha ocurrido un error ".mysql_error());
}
if( mysql_num_rows($resultado) < 0){
	exit("Ha ocurrido un error ".mysql_error());
}
else{
	$script='';
	while($row=mysql_fetch_array($resultado)){
		$script.= "checarVentanaPrivada(\"".$row['emisor']."\",\"".$row['receptor']."\");";
	}
	echo $script;
}
mysql_close($db);



?>