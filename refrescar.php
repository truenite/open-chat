<?php
session_start();
if($_SESSION == null){
	header('Location: index.php');	
}
if(isset($_SESSION['nivel']) && !isset($_GET['receptor']) && !isset($_GET['refrescar']) ){
	require("coneccion.php");
	
	//echo "sesion fecha antes del mensaje: ".$_SESSION['fecha'];
	$query=" SELECT  *,DATE_FORMAT(fecha, '%l:%i:%s %p') as nuevafecha FROM chat WHERE fecha > '".$_SESSION['fecha']."' ORDER BY fecha;";
	$resultado=mysql_query($query);
	if(!$resultado){
		exit("Ha ocurrido un error ".mysql_error());
	}
	if( mysql_num_rows($resultado) < 1){
		echo "nohaynuevos";
	}
	else{
		$texto='';
		$row = '';
		while($row = mysql_fetch_array($resultado) ){
			$nuevaoracion = $row['dato'];
			$fecha = $row['nuevafecha'];
			$texto.= "<label>(".$fecha.") &nbsp;&nbsp;". $nuevaoracion."</label><br />";
			$_SESSION['fecha'] = $row['fecha'];
		}
		echo $texto;
		
	}
	mysql_close($db);
}
else{
	if(isset($_SESSION['usuario']) && isset($_GET['emisor']) ){
		require("coneccion.php");
		//$fecha =date('Y-n-j G:i:s');
		$fecha= $_SESSION['fechaPrivado'];
		$query="SELECT *, DATE_FORMAT(fecha, '%l:%i %p') as nuevafecha FROM chatprivado WHERE fecha > '".$fecha."' and (emisor ='".$_GET['emisor']."' or receptor = '".$_GET['emisor']."') ORDER BY fecha;";

		$resultado=mysql_query($query);
		if(!$resultado){
			exit("Ha ocurrido un error ".mysql_error());
		}
		if( mysql_num_rows($resultado) < 0){
			echo "nohaynuevos";
		}
		else{
			$texto='';
			$row = '';
		
			while($row = mysql_fetch_array($resultado) ){
				$nuevaoracion = $row['dato'];
				$fecha =$row['nuevafecha'];
				$texto.= "<label>(".$fecha.") &nbsp;&nbsp;". $nuevaoracion."</label><br />";
				$_SESSION['fechaPrivado'] = $row['fecha'];
			}
			echo $texto;
		}
		mysql_close($db);
	}
	else{
		die("Error! Por favor, intenta de nuevo");
	}
}
?>