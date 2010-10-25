<?php
session_start();
if($_SESSION == null){
	header('Location: index.php');	
}
if(isset($_GET['emisor']) && isset($_GET['receptor']) && isset($_GET['insertarTexto'])){
	$texto = $_SESSION['usuario'].": ".htmlspecialchars($_GET['insertarTexto'],ENT_QUOTES);
	require("coneccion.php");
	$fecha =date('Y-n-j G:i:s');
	$query="INSERT INTO chatprivado VALUES('".$_GET['emisor']."','".$_GET['receptor']."','$fecha','".$texto."',0,0)";
	$resultado=mysql_query($query);
	if(!$resultado){
		exit("Ha ocurrido un error ".mysql_error());
	}
	else "listo";
	mysql_close($db);
}
	
if(isset($_POST['insertarTexto'])){
	$texto = $_SESSION['usuario'].": ".htmlspecialchars($_POST['insertarTexto'],ENT_QUOTES);
	require("coneccion.php");
	$fecha =date('Y-n-j G:i:s');
	$query="INSERT INTO chat VALUES('".$fecha."',0,'".$texto."')";
	$resultado=mysql_query($query);
	if(!$resultado){
		exit("Ha ocurrido un error ".mysql_error());
	}
	else echo "listo";
	mysql_close($db);
}
?>