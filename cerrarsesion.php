<?php
session_start();	
if($_SESSION != null){
	$_SESSION['usuario'];
	$_SESSION['nivel'];
	$_SESSION['fecha'];
	session_destroy();
}
header("Location:index.php");
?>